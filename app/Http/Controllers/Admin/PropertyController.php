<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use App\Models\Province;
use App\Models\City;
use App\Models\Address;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PropertyStoreRequest;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use File;
use Monolog\Handler\IFTTTHandler;
use Symfony\Component\Console\Input\Input;

class PropertyController extends Controller
{
    public function getProperties(Request $request)
    {

        // return dd($request->all());
        if ($request->ajax()) {
            $_order = request('order');
            $_columns = request('columns');
            $order_by = $_columns[$_order[0]['column']]['name'];
            $order_dir = $_order[0]['dir'];
            $skip = request('start');
            $take = request('length');
            $search = request('search');
            // $query = Property::query();
            $query = DB::table('properties as p')
                ->join('cities as c', 'p.city_id', '=', 'c.id')
                ->join('city_address as ca', 'ca.id', 'p.address_id')
                ->join('users as u', 'u.id', 'p.user_id')
                ->join('property_purpose as pp', 'p.purpose_id', 'pp.id')
                ->join('property_type as pt', 'p.property_type_id', 'pt.id')
                ->select('u.plan_expired_date as expired_on', 'u.email', 'p.email', 'p.boost', 'p.featured', 'p.status', 'p.id', 'p.name', 'u.image', 'u.company', 'u.city as user_city', 'p.description', 'p.phone_num', 'p.slug', 'p.image', 'p.price', 'p.area', 'p.garage', 'p.bedroom', 'p.bath', 'p.size', 'p.is_admin', 'c.name as city', 'pp.name as purpose', 'pt.name as propertyType', 'ca.name as city_address');
            // $query->where("user_id", Auth::user()->id);


            $recordsTotal = $query->count();

            if (isset($search['value'])) {
                $query->where(function ($q) use ($search) {
                    $q->whereRaw("p.email LIKE '%" . $search['value'] . "%' ");
                });
            }
            $recordsFiltered = $query->count();

            $data = $query->orderBy($order_by, $order_dir)->skip($skip)->take($take)->get();

            foreach ($data as $d) {
                $image = asset('properties/gallery/' . $d->image);
                $status = $d->is_admin == 1 ? 'checked' : '';
                $featured = $d->featured == 1 ? 'checked' : '';
                $boost = $d->boost == 1 ? 'checked' : '';
                $d->image = '<img class="rounded-circle me-2" src="' . $image . '"
                width="35px" height="35px" alt="Property Image"
            />';

                $d->is_admin = '<div class="form-check form-switch d-flex ps-0 align-items-center">
                <label class="form-check-label" for="userStatusrow2">OFF</label>
                <input class="form-check-input" type="checkbox" onclick="updateStatus(' . $d->id . ')" id="userStatusrow1" ' . $status . ' >
                <label class="form-check-label" for="userStatusrow2">ON</label>
            </div>';
                $d->featured = '<div class="form-check form-switch d-flex ps-0 align-items-center">
            <label class="form-check-label" for="userStatusrow2">OFF</label>
            <input class="form-check-input" type="checkbox" onclick="updateFeaturedAndBoostStatus(' . $d->id . ',1)" id="userStatusrow1" ' . $featured . ' >
            <label class="form-check-label" for="userStatusrow2">ON</label>
        </div>';
                $d->boost = '<div class="form-check form-switch d-flex ps-0 align-items-center">
        <label class="form-check-label" for="userStatusrow2">OFF</label>
        <input class="form-check-input" type="checkbox" onclick="updateFeaturedAndBoostStatus(' . $d->id . ',2)" id="userStatusrow1" ' . $boost . ' >
        <label class="form-check-label" for="userStatusrow2">ON</label>
    </div>';
                $d->action = '
            <ul class="list-unstyled list-inline mb-0">
                <li class="list-inline-item me-3">
                    <a href="' . route('admin.edit.property', $d->id) . '">
                    <button type="button" class="bg-transparent border-0 p-0"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                        <i class="bi bi-pencil text-secondary"></i>
                    </button>
                    </a>
                </li>
                <a href="javascript:;" onclick="deletePropertyConfirm(' . $d->id . ')"
                <li class="list-inline-item me-3">
                    <button type="button" class="bg-transparent border-0 p-0"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                        <i class="bi bi-trash text-danger"></i>
                    </button>
                </li>
                </a>
                <a target="_blank" href="' . route('view-propertybyadmin', ['ptype' => $d->propertyType, 'stype' => $d->purpose, 'city' => $d->city, 'id' => $d->id, 'slug' => $d->slug]) . '">
                <li class="list-inline-item">
                    <button type="button" class="bg-transparent border-0 p-0"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Show Detail">
                        <i class="bi bi-eye text-grey"></i>
                    </button>
                </li>
                </a>
                <a target="_blank" href="' . route('admin.get.seo', $d->id) . '" style="margin-left: 12px;">
                <li class="list-inline-item">
                    <button type="button" class="bg-transparent border-0 p-0"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit SEO Tags">
                        <i class="bi bi-tags text-grey"></i>
                    </button>
                </li>
                </a>
            </ul>';
            }
            return [
                "draw" => request('draw'),
                "recordsTotal" => $recordsTotal,
                'recordsFiltered' => $recordsFiltered,
                "data" => $data,
            ];
        }
        return view('admin.properties')->with('topbar', 'All Properties');
    }

    // edit
    public function edit($id)
    {
        $data['province'] = Province::all();
        $data['propert_type'] = DB::table('property_type')->get();
        $data['property_purpose'] =  DB::table('property_purpose')->get();
        $data['province'] = Province::all();
        $data['property'] = Property::where('id', $id)->with('gallery')->with('city')->first();
        $propertyinfo     = Property::where('id', $id)->first();
        $province_id = $propertyinfo->province_id;
        $data['cities'] = DB::table('cities')->where('province_id', $province_id)->get();
        return view('admin.edit_property', $data);
    }
    public function update(PropertyStoreRequest $request)
    {
        $validated = $request->validated();
        $currentDate = Carbon::now()->toDateString();
        $gallary = $request->file('gallery_image');
        $featured_image = $request->file('featured_image');
        try {

            if ($validated) {
                $property = Property::find($request->id);
                $property->name =  $request->name;
                $property->email =  $request->email;
                $property->phone_num =  $request->phone_num;
                $property->province_id =  $request->province_id;
                $property->city_id = $request->city_id;
                $property->address_id = $request->address_id;

                $property->purpose_id = $request->purpose_id;
                $property->property_type_id = $request->property_type_id;

                if (isset($featured_image)) {
                    $feature_image = 'featured-' . $currentDate . '-' . uniqid() . '.jpeg';
                    // $feature_image->insert(('images/webtop.png'), 'center', 5, 5);
                    $ip =  $featured_image->move(public_path('/properties/gallery'), $feature_image);
                    $new_images = Image::make($ip);
                    $new_images->insert(public_path('/images/webtop.png'), 'center', 5, 5);
                    $new_images->save(public_path('/properties/gallery/' . $feature_image), 50);
                    $property->image = $feature_image;
                }

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
                $property->property_feature =  json_encode($request->property_feature);
                //$property->user_id = Auth::user()->id;
                $property->save();
                // bring all the product images of that product
                $propimgs = Gallery::where('property_id', $request->id)->get();
                // then check whether a filename is missing in imgsdb if it is missing remove it from database and unlink it
                //print_r($request->imagesdb.'nnnxx').'xxx<br>';
                foreach ($propimgs as $pimg) {
                    if (isset($request->imagesdb)) {
                        if (!in_array($pimg->name, $request->imagesdb)) {
                            @unlink('public/properties/gallery/' . $pimg->name);
                            $pimg->delete();
                        }
                    }
                }

                if ($gallary != '') {

                    foreach ($gallary as $images) {
                        $galimage = 'gallary-' . $currentDate . '-' . uniqid() . '.jpeg';
                        $size = $images->getSize();
                        //$imagePathComplete = 'public/' . $imagePath;
                        $ip = $images->move(public_path('/properties/gallery'), $galimage);
                        $new_images = Image::make($ip);
                        $new_images->insert(public_path('images/webtop.png'), 'center', 5, 5);
                        $new_images->save(public_path('/properties/gallery/' . $galimage), 50);
                        $new_images->save();
                        //  $propertyimage->save();
                        $gallery = new Gallery;
                        $gallery->property_id =  $request->id;
                        $gallery->name = $galimage;
                        $gallery->size = $size;
                        $gallery->save();
                    }
                }

                return response()->json([
                    'status' => true,
                    'message' => 'Updated Successfully',
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'error',
                ]);
            }
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
        $property_id = $request->all();
        Property::where('id', $property_id)->delete();
        Gallery::where('property_id', $property_id)->delete();
        return response()->json(['result' => true]);
    }
    public function updateStatus(Request $request)
    {
        $property_id = $request->id;
        $bit = $request->bit;
        $result = Property::where('id', $property_id)->first();
        $status_result = $result->is_admin == 1 ? '0' : '1';
        Property::where('id', $property_id)->update(array('is_admin' => $status_result, 'status' => $status_result));

        return response()->json(['result' => true]);
    }
    public function updateFeaturedAndBoostStatus(Request $request)
    {
        $property_id = $request->id;
        $bit = $request->bit;
        $result = Property::where('id', $property_id)->first();
        if ($bit == 1) {
            $featured_result = $result->featured == 1 ? '0' : '1';
            Property::where('id', $property_id)->update(array('featured' => $featured_result));
        } else {
            $boost_result = $result->boost == 1 ? '0' : '1';
            Property::where('id', $property_id)->update(array('boost' => $boost_result));
        }

        return response()->json(['result' => true]);
    }
    public function loadCity(Request $request)
    {
        $province_id = $request->province_id;
        $result = City::where('province_id', $province_id)->get();
        return response()->json(['result' => $result]);
    }
    public function loadAddress(Request $request)
    {
        $province_id = $request->city_id;
        $result = Address::where('city_id', $province_id)->get();
        return response()->json(['result' => $result]);
    }
}
