<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use App\Models\Province;
use App\Models\City;
use App\Models\Address;
use App\Models\Gallery;
use App\Models\Package_plan;
use App\Models\Plan;
use App\Models\Package_subscribe;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PropertyStoreRequest;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use File;
use Monolog\Handler\IFTTTHandler;
use Symfony\Component\Console\Input\Input;
use JWTAuth;
use Validator;
use App\Http\Resources\PropertyCollection;
use App\Http\Resources\PropertyResource;

class PropertyController extends Controller
{

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'price' => 'required|integer',
            // 'bath' => 'required|integer',
            // 'bedroom' => 'required|integer',
            // 'garage' => 'required|integer',
            'featured_image' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        // if (Auth()->user()->ads == 0) {
        //     $msg = 'You have to buy a package to post ad.';
        //     return response()->json([
        //         'status' => false,
        //         'message' => $msg,
        //     ], 400);
        // }
        $currentDate = Carbon::now()->toDateString();
        $gallary = $request->file('gallery_image');
        $featured_image = $request->file('featured_image');
        try {
            if ($featured_image) {
                $feature_image = 'featured-' . $currentDate . '-' . uniqid() . '.' . $featured_image->getClientOriginalExtension();
                $ip = $featured_image->move(public_path('/properties/gallery'), $feature_image);
                $new_images = Image::make($ip);
                $new_images->insert(public_path('images/webtop.png'), 'center', 5, 5);
                $new_images->save();
            }
                $property = new Property();
                $property->name =  $request->name;
                $property->email =  $request->email;
                $property->phone_num =  $request->phone_num;
                $property->province_id =  $request->province_id;
                $property->city_id = $request->city_id;
                $property->address_id = $request->address_id;

                $property->purpose_id = $request->purpose_id;
                $property->property_type_id = $request->property_type_id;
                $property->purpose_type_inner_id = $request->purpose_type_inner_id;

                $property->flooring_type = $request->flooring_type;
                $property->electriccity_backup = $request->electriccity_backup;
                $property->airport_km = $request->airport_km;

                $property->price = $request->price;
                $property->area = $request->area;
                $property->bedroom = $request->bedroom;
                $property->bath = $request->bath;
                $property->garage = $request->garage;
                $property->size = $request->size;
                $property->plot_number = $request->plot_number;
                $property->youtube_link = $request->youtube_link;
                $property->description = $request->description;
                $property->status = 1;
                $property->user_id = Auth::user()->id;
                $property->property_feature =  json_encode( $request->property_feature);
                $property->image =  $feature_image;
                $property->save();
                if ($gallary) {
                    foreach ($gallary as $index=>$images) {
                        if($index < 8){
                            $galimage = 'gallary-' . $currentDate . '-' . uniqid() . '.' . $images->getClientOriginalExtension();
                            $size = $images->getSize();
                            $imagePath = 'properties/gallery/' . $galimage;
                            //$imagePathComplete = 'public/' . $imagePath;
                            $ip = $images->move(public_path('/properties/gallery'), $galimage);
                            $new_images = Image::make($ip);
                            $new_images->insert(public_path('/images/webtop.png'), 'center', 5, 5);
                            $new_images->save();

                            $gallery = new Gallery;
                            $gallery->property_id =  $property->id;
                            $gallery->name = $galimage;
                            $gallery->size = $size;
                            $gallery->save();
                        }

                    }
                }
                $user = Auth::user();
                // $user->ads = $user->ads - 1;
                $user->save();
                return response()->json([
                    'status' => true,
                    'message' => 'Successfully saved',
                ]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
        //     $image = $request->file('featured_image');
        //   $new_name = rand() . '.' . $image->getClientOriginalExtension();
        //  echo  $image->move(public_path('images'), $new_name);
        //die;

    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $data['province'] = Province::all();
        $data['propert_type'] = DB::table('property_type')->get();
        $data['property_purpose'] =  DB::table('property_purpose')->get();
        $data['province'] = Province::all();
        $data['property'] = new PropertyResource(Property::where('id', $id)->with('gallery')->with('city')->first());

        return response()->json(['result' => true, 'data' => $data]);
    }

    public function update(Request $request)
    {
        $rules = [
            'property_id' => 'required',
            'name' => 'required',
            'price' => 'required|integer',
            // 'bath' => 'required|integer',
            // 'bedroom' => 'required|integer',
            // 'garage' => 'required|integer',
            // 'featured_image' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $currentDate = Carbon::now()->toDateString();
        $gallary = $request->file('gallery_image');
        $featured_image = $request->file('featured_image');

        try {

            $property = Property::find($request->property_id);
            $property->name =  $request->name;
            $property->email =  $request->email;
            $property->phone_num =  $request->phone_num;
            $property->province_id =  $request->province_id;
            $property->city_id = $request->city_id;
            $property->address_id = $request->address_id;

            $property->purpose_id = $request->purpose_id;
            $property->property_type_id = $request->property_type_id;
            $property->purpose_type_inner_id = $request->purpose_type_inner_id;

            $property->flooring_type = $request->flooring_type;
            $property->electriccity_backup = $request->electriccity_backup;
            $property->airport_km = $request->airport_km;

            $property->price = $request->price;
            $property->area = $request->area;
            $property->bedroom = $request->bedroom;
            $property->bath = $request->bath;
            $property->garage = $request->garage;
            $property->size = $request->size;
            $property->plot_number = $request->plot_number;
            $property->youtube_link = $request->youtube_link;
            $property->description = $request->description;
            $property->property_feature =  json_encode( $request->property_feature);
            if ($featured_image) {
                $feature_image = 'featured-' . $currentDate . '-' . uniqid() . '.' . $featured_image->getClientOriginalExtension();
                $ip = $featured_image->move(public_path('/properties/gallery'), $feature_image);
                $new_images = Image::make($ip);
                $new_images->insert(public_path('images/webtop.png'), 'center', 5, 5);
                $new_images->save();
                $property->image =  $feature_image;

            }
            $property->save();
            // bring all the product images of that product
            $propimgs = Gallery::where('property_id', $request->property_id)->get();

            // then check whether a filename is missing in imgsdb if it is missing remove it from database and unlink it
            if($request->imagesdb){
                foreach ($propimgs as $pimg) {
                    if (!in_array($pimg->image, $request->imagesdb)) {
                        @unlink('public/properties/gallery/' . $pimg->image);
                        $pimg->delete();
                    }
                }
            }
            if ($gallary) {
                foreach ($gallary as $images) {
                    $galimage = 'gallary-' . $currentDate . '-' . uniqid() . '.' . $images->getClientOriginalExtension();
                    $size = $images->getSize();
                    $imagePath = 'properties/gallery/' . $galimage;
                    //$imagePathComplete = 'public/' . $imagePath;
                    $ip = $images->move(public_path('/properties/gallery'), $galimage);
                    $new_images = Image::make($ip);
                    $new_images->insert(public_path('/images/webtop.png'), 'center', 5, 5);
                    $new_images->save();

                    $gallery = new Gallery;
                    $gallery->property_id =  $request->property_id;
                    $gallery->name = $galimage;
                    $gallery->size = $size;
                    $gallery->save();
                }
            }
            return response()->json([
                'status' => true,
                'message' => 'Successfully updated',
            ]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
    public function destory(Request $request)
    {
        $property_id = $request->property_id;
        Property::where('id', $property_id)->delete();
        Gallery::where('property_id', $property_id)->delete();
        return response()->json(['result' => true]);
    }
    public function propertyPurposeCount()
    {
        $result = DB::table('property_purpose as pp')->get();
        foreach ($result as $key => $r) {
           $total_property = DB::table('properties as pp')
            ->where('purpose_id',  $r->id)
            ->count();
            $data [] = array('id'=> $r->id,'name'=> $r->name,'total'=> $total_property);
        }
        $user_property_count = DB::table('properties as pp')
        ->count();
        return response()->json(['result' => true, 'total_property_count'=>$user_property_count,'data' => $data]);
    }
    public function search(Request $request)
    {
        $search_type = $request->search_type;
        $city =  $request->city;
        $address_id = $request->address_id;
        $min_price =  $request->min_price;
        $max_price =  $request->max_price;
        $property_type =  $request->property_type;
        $bedroom =  $request->bedroom;
        $col = 'price';
        $cond = 'asc';
        $offset = !empty($request->offset) ? $request->offset : 0;

        // if($this->sortBy == 'Lowest Price'){
        //     $col = 'price';
        //     $cond = 'asc';
        // }else if($this->sortBy == 'Highest Price'){
        //     $col = 'price';
        //     $cond = 'desc';
        // }else{
        //     $col = 'created_at';
        //     $cond = 'desc';
        // }
        $query = Property::where('properties.status', 1)->select('properties.*','users.name as user_name','users.email as user_email',
        'users.number as user_phone_number','users.image as user_image','users.address as user_address','cities.name as city_name',
        'city_address.name as address_name','property_purpose.name as purpose_name','provinces.name as province_name'
        ,'property_type.name as property_type_name')
        ->leftjoin('provinces', 'properties.province_id', '=', 'provinces.id')
        ->leftjoin('users', 'properties.user_id', '=', 'users.id')
        ->leftjoin('cities', 'properties.city_id', '=', 'cities.id')
        // ----------------
        // ->leftjoin('city_address', 'city_address.city_id', '=', 'cities.id')
        // ----------------
        ->leftjoin('city_address', 'properties.address_id', '=', 'city_address.id')
        ->leftjoin('property_purpose', 'properties.purpose_id', '=', 'property_purpose.id')
        ->leftjoin('property_type', 'properties.property_type_id', '=', 'property_type.id')


        ->where('properties.status',  1);
        $query->when($search_type, function ($query, $search_type) {
            $query->where('properties.purpose_id', $search_type);
        });
        $query->when($city, function ($query, $city) {
            $query->where('properties.city_id', $city);
        });
        $query->when($address_id, function ($query, $address_id) {
            $query->where('properties.address_id', $address_id);
        });
        $query->when($property_type, function ($query, $property_type) {
            $query->where('properties.property_type_id', $property_type);
        });
        $query->when($bedroom, function ($query, $bedroom) {
            $query->where('properties.bedroom', $bedroom);
        });
        // $query->when($size, function ($query, $size) {
        //     $query->where('size', $size);
        // });
        $query->when($min_price, function ($query, $min_price) {
            return $query->where('properties.price', '>=', $min_price);
        });
        $query->when($max_price, function ($query, $max_price) {
            return $query->where('properties.price', '<=', $max_price);
        });
        $query->orderBy('properties.boost', 'desc');
        $query->orderBy($col, $cond);
        //$query->offset($offset)->limit(20);
        $respons =  new PropertyCollection($query->paginate(10));

        $result = [];
        // foreach ($queryResult as $data):
        //     $result[] = array(
        //         "name" =>  $data->name,
        //     "price" => $data->price,
        //     "area" => $data->area,
        //     "bedroom" => $data->bedroom,
        //     "bath" => $data->bath,
        //     "garage" => $data->garage,
        //     "size" => $data->size,
        //     "featured_image" => asset('public/properties/gallery/'.$data->featured_image)
        //     );
        // endforeach;

        return response()->json(['result' => $respons]);
    }
    public function getProvince(Request $request)
    {
        $result = Province::with('cityWithAddress')->get();
        return response()->json(['result' => $result]);
    }
    public function featuredProperty(){
        $query = Property::where('properties.status', 1)->select('properties.*','users.name as user_name','users.email as user_email',
        'users.number as user_phone_number','users.image as user_image','users.address as user_address','cities.name as city_name',
        'city_address.name as address_name','property_purpose.name as purpose_name','provinces.name as province_name'
        ,'property_type.name as property_type_name')
        ->leftjoin('provinces', 'properties.province_id', '=', 'provinces.id')
        ->leftjoin('users', 'properties.user_id', '=', 'users.id')
        ->leftjoin('cities', 'properties.city_id', '=', 'cities.id')
        ->leftjoin('city_address', 'properties.address_id', '=', 'city_address.id')
        ->leftjoin('property_purpose', 'properties.purpose_id', '=', 'property_purpose.id')
        ->leftjoin('property_type', 'properties.property_type_id', '=', 'property_type.id')
        ->where('featured', 1);
        $respons = PropertyResource::collection($query->offset(0)->limit(8)->get());
        return response()->json(['result' => $respons]);
    }
    public function boostProperty(){
        $query = Property::where('properties.status', 1)->select('properties.*','users.name as user_name','users.email as user_email',
        'users.number as user_phone_number','users.address as user_address','cities.name as city_name',
        'city_address.name as address_name','property_purpose.name as purpose_name','provinces.name as province_name'
        ,'property_type.name as property_type_name')
        ->leftjoin('provinces', 'properties.province_id', '=', 'provinces.id')
        ->leftjoin('users', 'properties.user_id', '=', 'users.id')
        ->leftjoin('cities', 'properties.city_id', '=', 'cities.id')
        ->leftjoin('city_address', 'properties.address_id', '=', 'city_address.id')
        ->leftjoin('property_purpose', 'properties.purpose_id', '=', 'property_purpose.id')
        ->leftjoin('property_type', 'properties.property_type_id', '=', 'property_type.id')
        ->where('boost', 1);
        $respons = PropertyResource::collection($query->offset(0)->limit(8)->get());
        return response()->json(['result' => $respons]);
    }
    public function allCity(){
        $query = City::All();
        $result = [];
        foreach($query as $q){
            if($q->image_name !=''){
                $img_name = asset('images/location-areas/'.$q->image_name);
            }else{
                $img_name = '';
            }
            $result[] = array('id'=>$q->id,'name'=>$q->name,'image'=>$img_name);
        }
        return response()->json(['result' => $result]);
    }


    public function allPackages()
    {

        $result = Package_plan::all();
        return response()->json(['result' => $result],200);

    }

    public function allAdvertPackages()
    {

      $result = DB::table('advert_plan')
       ->where('status','active')
         ->select('*')->get();

      return response()->json(['result' => $result],200);

    }

    public function storePackages(Request $request)
    {
        
        $package = json_decode($request->post('add-ons'));
        $quantity = json_decode($request->post('quantity'));

        $amt = $request->post('amt');
        $mytime = Carbon::now();
        $cdatetime = $mytime->toDateTimeString();
        foreach($package as $i => $item)
            {

             $data = array(

                    'plan_id'=>$package[$i],
                    'quantity'=> $quantity[$i],
                    'user_id'=> $request->post('user_id'),
                    'email'=>  $request->post('user_email'),
                    'type'=> $request->post('type'),
                    'status'=> 'inactive',
                    'is_approved'=> 'inactive',
                    'is_paid'=> 'inactive',
                    'buy_on'=> Carbon::now()->toDateString(),
                    'created_at'=> $cdatetime,
                    );
                    
                    Package_subscribe::insert($data);
        }

        return response()->json(['result' => 'Your request to buy the plan is submitted. Please pay the amount of '.$amt[0].'/- to confirm the package plan'],200);

    }

    public function boost(Request $request)
    {
        $result = Property::where('id', $request->property_id)->first();

        $boost_result =$result->boost == 1 ?'0':'1';
            Property::where('id', $request->property_id)->update(array('boost' => $boost_result));

        return response()->json(['result' => true]);
    }

    public function feature(Request $request)
    {
        $result = Property::where('id', $request->property_id)->first();

        $featured_result =$result->featured == 1 ?'0':'1';
        Property::where('id', $request->property_id)->update(array('featured' => $featured_result));

        return response()->json(['result' => true]);
    }

    

}
