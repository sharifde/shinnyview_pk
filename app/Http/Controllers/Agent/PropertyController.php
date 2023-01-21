<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Package_subscribe;
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
use Session;
use Monolog\Handler\IFTTTHandler;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth()->user()->status == 1) {
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
                    ->select('p.boost', 'p.featured', 'p.is_admin', 'p.status', 'p.id', 'p.name', 'u.image', 'u.company', 'u.city as user_city', 'p.description', 'p.phone_num', 'p.slug', 'p.image', 'p.price', 'p.area', 'p.garage', 'p.bedroom', 'p.bath', 'p.size', 'c.name as city', 'pp.name as purpose', 'pt.name as propertyType', 'ca.name as city_address');

                $package_allow = DB::table('users')
                    ->select('users.id', 'users.plan_expired_date', 'package_plan.name', 'package_plan.feature_property', 'package_plan.boosted_property')
                    ->join('package_plan', 'package_plan.id', '=', 'users.plan_id')
                    ->where('users.status', 1)->where('users.email', Auth::user()->email)->first();

                $plan_expire = $package_allow->plan_expired_date;

                $additional_advert = DB::table('package_subscribes')
                    ->select('id', 'email', 'plan_id', 'buy_on')
                    //->join('package_plan','package_plan.id','=','users.plan_id')
                    ->where('type', 'Advert Plan')
                    ->where('email', Auth::user()->email)
                    ->where('status', 'active')
                    ->where('is_approved', 'active')
                    ->where('is_paid', 'active')
                    ->where('buy_on', '<', $plan_expire)
                    ->orderby('id', 'desc')
                    ->get();

                $additional_plan = DB::table('package_subscribes')
                    ->select('id', 'email', 'plan_id', 'buy_on')
                    //->join('package_plan','package_plan.id','=','users.plan_id')
                    ->where('type', 'Package Plan')
                    ->where('email', Auth::user()->email)
                    ->where('status', 'active')
                    ->where('is_approved', 'active')
                    ->where('is_paid', 'active')
                    ->where('buy_on', '<', $plan_expire)
                    ->orderby('id', 'desc')
                    ->first();
                $b_addon = 0;

                $f_addon = 0;

                if (isset($additional_advert)) {


                    foreach ($additional_advert as $add_advert) {

                        $p_id = $add_advert->plan_id;

                        $advert_aditional_package = DB::table('advert_plan')
                            ->where('id', $p_id)->where('status', 'active')
                            ->first();

                        $advert_name = $advert_aditional_package->name;

                        if (isset($advert_name) && ($advert_name == 'Boost Property')) {
                            $advert_type = 'boosted';
                            $b_addon = $advert_aditional_package->design_price;
                        } elseif (isset($advert_name) && ($advert_name == 'Feature Property')) {
                            $advert_type = 'featured';
                            $f_addon = $advert_aditional_package->design_price;
                        }
                    }
                }

                $user_feature = DB::table('properties')
                    ->where('email', Auth::user()->email)
                    ->where('featured', 1)
                    ->count();
                $user_boost = DB::table('properties')
                    ->where('email', Auth::user()->email)
                    ->where('boost', 1)
                    ->count();

                $query->where("p.email", Auth::user()->email);
                $recordsTotal = $query->count();
                if (isset($search['value'])) {
                    $query->where(function ($q) use ($search) {
                        $q->whereRaw("name LIKE '%" . $search['value'] . "%' ");
                    });
                }
                $recordsFiltered = $query->count();
                $data = $query->orderBy($order_by, $order_dir)->skip($skip)->take($take)->get();

                foreach ($data as $d) {
                    $image = asset('properties/gallery/' . $d->image);
                    $status = $d->status == 1 ? 'checked' : '';
                    $featured = $d->featured == 1 ? 'checked' : '';
                    $boost = $d->boost == 1 ? 'checked' : '';
                    $admin_verify = $d->is_admin;
                    $d->image = '<img class="rounded-circle me-2" src="' . $image . '"
                width="35px" height="35px" alt="Property Image"
            />';
                    if ($admin_verify == 1) {
                        $d->status = '<div class="form-check form-switch d-flex ps-0 align-items-center">
                <label class="form-check-label" for="userStatusrow2">OFF</label>
                <input class="form-check-input" type="checkbox" onclick="updateStatus(' . $d->id . ')" id="userStatusrow1" ' . $status . ' >
                <label class="form-check-label" for="userStatusrow2">ON</label>
            </div>';
                    } elseif ($admin_verify == 0) {

                        $d->status = '<div class="form-check form-switch d-flex ps-0 align-items-center">
								      <label class="form-check-label" for="userStatusrow2" style="color:red">Pending from Admin</label>
								  </div>';
                    }
                    if (isset($package_allow)) {
                        if ($d->featured == 0) {

                            $total_package = $package_allow->feature_property + $f_addon;

                            if ($user_feature < $total_package) {
                                $d->featured = '<div class="form-check form-switch d-flex ps-0 align-items-center" style="margin-left: 3em !important;">
           					  
								<input class="form-check-input" type="checkbox" onclick="updateFeaturedConfirm(' . $d->id . ',1)" id="userStatusrow1" ' . $featured . ' >
								<label class="form-check-label" for="userStatusrow2">' . 'ON' . '</label>
							</div>';
                            } else {
                                $d->featured = '<a href="' . route('advertbuy') . '"> Buy New Feature Plan </a>';
                            }
                        } elseif ($d->featured == 1) {
                            $d->featured = '<b style="color:#BC985F">Featured Property</b>';
                        }

                        if ($d->boost == 0) {

                            $total_package = $package_allow->boosted_property + $b_addon;

                            if ($user_boost < $total_package) {
                                $d->boost = '<div class="form-check form-switch d-flex ps-0 align-items-center" style="margin-left: 3em !important;">
        
        					<input class="form-check-input" type="checkbox" onclick="updateBoostConfirm(' . $d->id . ',2)" id="userStatusrow1" ' . $boost . ' >
        					<label class="form-check-label" for="userStatusrow2">ON</label>
    						</div>';
                            } else {
                                $d->boost = '<a href="' . route('advertbuy') . '"> Buy New Boost Plan </a>';
                            }
                        } elseif ($d->boost == 1) {
                            $d->boost = '<b style="color:#BC985F">Boosted Property</b>';
                        }
                    }
                    $d->action = '
            <ul class="list-unstyled list-inline mb-0">
               <!-- <li class="list-inline-item me-3">
                    <a href="' . route('edit.property', $d->id) . '">
                    <button type="button" class="bg-transparent border-0 p-0"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                        <i class="bi bi-pencil text-secondary"></i>
                    </button>
                    </a>
                </li>-->
                <a href="javascript:;" onclick="deletePropertyConfirm(' . $d->id . ')"
                <li class="list-inline-item me-3">
                    <button type="button" class="bg-transparent border-0 p-0"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                        <i class="bi bi-trash text-danger"></i>
                    </button>
                </li>
                </a>
                <a target="_blank" href="' . route('view-property', ['ptype' => $d->propertyType, 'stype' => $d->purpose, 'city' => $d->city, 'id' => $d->id, 'slug' => $d->slug]) . '">
                <li class="list-inline-item">
                    <button type="button" class="bg-transparent border-0 p-0"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Show Detail">
                        <i class="bi bi-eye text-grey"></i>
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
            $record['advert_package'] = DB::table('users')
                ->select('users.id', 'package_plan.name', 'package_plan.feature_property', 'package_plan.boosted_property')
                ->join('package_plan', 'package_plan.id', '=', 'users.plan_id')
                ->where('users.status', 1)->where('users.id', Auth::user()->id)->first();

            $record['user_feature'] = DB::table('properties')
                ->where('email', Auth::user()->email)
                ->where('featured', 1)
                ->count();
            $record['user_boost'] = DB::table('properties')
                ->where('email', Auth::user()->email)
                ->where('boost', 1)
                ->count();

            $package_allow = DB::table('users')
                ->select('users.id', 'users.plan_expired_date', 'package_plan.name', 'package_plan.feature_property', 'package_plan.boosted_property')
                ->join('package_plan', 'package_plan.id', '=', 'users.plan_id')
                ->where('users.status', 1)->where('users.email', Auth::user()->email)->first();

            $plan_expire = $package_allow->plan_expired_date;

            $additional_advert = DB::table('package_subscribes')
                ->select('id', 'email', 'plan_id', 'buy_on')
                //->join('package_plan','package_plan.id','=','users.plan_id')
                ->where('type', 'Advert Plan')
                ->where('email', Auth::user()->email)
                ->where('status', 'active')
                ->where('is_approved', 'active')
                ->where('is_paid', 'active')
                ->where('buy_on', '<', $plan_expire)
                ->orderby('id', 'desc')
                ->get();

            $b_addon = 0;

            $f_addon = 0;

            if (isset($additional_advert)) {


                foreach ($additional_advert as $add_advert) {

                    $p_id = $add_advert->plan_id;

                    $advert_aditional_package = DB::table('advert_plan')
                        ->where('id', $p_id)->where('status', 'active')
                        ->first();

                    $advert_name = $advert_aditional_package->name;

                    if (isset($advert_name) && ($advert_name == 'Boost Property')) {
                        $advert_type = 'boosted';
                        $b_addon = $advert_aditional_package->design_price;
                    } elseif (isset($advert_name) && ($advert_name == 'Feature Property')) {
                        $advert_type = 'featured';
                        $f_addon = $advert_aditional_package->design_price;
                    }
                }
            }

            $record['b_addon'] = $b_addon;

            $record['f_addon'] = $f_addon;


            return view('agent.my_properties', $record);
        } elseif (Auth()->user()->status == 0) {
            return redirect('agent/dashboard');
        }
    }

    public function create()
    {
        if (Auth()->user()->status == 1) {
            $data['province'] = Province::all();
            $data['propert_type'] = DB::table('property_type')->get();
            $data['property_purpose'] =  DB::table('property_purpose')->get();
            $data['province'] = Province::all();
            $data['total_sale_property'] = Property::where('property_type_id', 1)->where('user_id', Auth::user()->id)->count();
            $data['total_rent_property'] = Property::where('property_type_id', 2)->where('user_id', Auth::user()->id)->count();
            $data['total_lease_property'] = Property::where('property_type_id', 3)->where('user_id', Auth::user()->id)->count();

            if (Auth::user()->role_type == 'Agent') {

                $data['package'] = DB::table('package_plan')->where('status', 'active')->where('id', Auth::user()->plan_id)->first();
            } elseif (Auth::user()->role_type == 'Private Seller') {
                $data['package'] = DB::table('package_plan')->where('status', 'active')->first();
            }

            $data['package_plan'] = DB::table('package_plan')->where('status', 'active')->get();

            $data['advert_plan'] = DB::table('advert_plan')->where('status', 'active')->get();

            return view('agent.add_property', $data);
        } elseif (Auth()->user()->status == 0) {
            return redirect('agent/dashboard');
        }
    }

    public function store(Request $request)
    {
        //$validator = $request->validated();
        if (Auth()->user()->plan_id == 0) {
            $msg = 'You have to Buy a Package to post Ad.';
            return response()->json([
                'status' => false,
                'message' => $msg,
            ]);
        }
        $currentDate = Carbon::now()->toDateString();
        $gallary = $request->file('gallery_image');
        //echo count($gallary);
        $featured_image = $request->file('featured_image');
        // try {
            if ($featured_image) {
                $feature_image = 'featured-' . $currentDate . '-' . uniqid() . '.jpeg';
                $img = Image::make($featured_image->getRealPath())->encode('jpg', 50);
                $watermark = Image::make(public_path('images/webtop.png'));
                $img->insert($watermark, 'center', 5, 5);
                $image = $img->stream();
                $filePath = 'shinnyview/properties/gallery/' .  $feature_image;
                $ip= Storage::disk('s3')->put($filePath, $image);
               
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
            $property->status = 0;
            $property->emp_name = $request->emp_name;
            if ($request->ads_id) {
                $property->advertise_req = $request->ads_id;
            }
            $property->user_id = Auth::user()->id;
            $property->property_feature =  json_encode($request->property_feature);
            $property->image =  $feature_image;
            $property->save();
            if ($gallary) {
                foreach ($gallary as $index => $images) {
                    if ($index < 8) {
                        $galimage = 'gallary-' . $currentDate . '-' . uniqid() . '.jpeg';
                        $size = $images->getSize();
                        $imagePath = 'properties/gallery/' . $galimage;
                        //$imagePathComplete = 'public/' . $imagePath;
                        $ip = $images->move(public_path('/properties/gallery'), $galimage);
                        $new_images = Image::make($ip);
                        $new_images->insert(public_path('/images/webtop.png'), 'center', 5, 5);
                        $new_images->save(public_path('/properties/gallery/' . $galimage), 50);
                        $gallery = new Gallery;
                        $gallery->property_id =  $property->id;
                        $gallery->name = $galimage;
                        $gallery->size = $size;
                        $gallery->save();
                    }
                }
            }
            $user = Auth::user();
            //$user->ads = $user->ads - 1;
            $user->package = $request->package_id;

            $user->save();
            return response()->json([
                'status' => true,
                'message' => 'Successfully saved',
            ]);
        // } catch (\Exception $e) {
        //     \Log::error($e);
        //     return response()->json([
        //         'status' => false,
        //         'message' => $e->getMessage(),
        //     ]);
        // }
        //     $image = $request->file('featured_image');
        //   $new_name = rand() . '.' . $image->getClientOriginalExtension();
        //  echo  $image->move(public_path('images'), $new_name);
        //die;
    }
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
        return view('agent.edit_property', $data);
    }

    public function update(PropertyStoreRequest $request)
    {
        $validated = $request->validated();
        $currentDate = Carbon::now()->toDateString();
        $gallary = $request->file('gallery_image');
        $featured_image = $request->file('featured_image');
        try {
            if ($featured_image) {
                $feature_image = 'featured-' . $currentDate . '-' . uniqid() . '.jpeg';
                $feature_image->insert(('images/webtop.png'), 'center', 5, 5);
                $ip =  $featured_image->move(public_path('/properties/gallery'), $feature_image);
                $new_images = Image::make($ip);
                $new_images->insert(public_path('/images/webtop.png'), 'center', 5, 5);
                $new_images->save(public_path('/properties/gallery/' . $feature_image), 50);
            }
            if ($validated) {
                $property = Property::find($request->id);
                $property->name =  $request->name;
                $property->email =  $request->email;
                $property->phone_num =  $request->phone_num;
                $property->province_id =  $request->province_id;
                $property->city_id = $request->city_id;
                $property->address_id = $request->address_id;

                if (isset($featured_image)) {
                    $feature_image = 'featured-' . $currentDate . '-' . uniqid() . '.jpeg';
                    // $feature_image->insert(('images/webtop.png'), 'center', 5, 5);
                    $ip =  $featured_image->move(public_path('/properties/gallery'), $feature_image);
                    $new_images = Image::make($ip);
                    $new_images->insert(public_path('/images/webtop.png'), 'center', 5, 5);
                    $new_images->save(public_path('/properties/gallery/' . $feature_image), 50);
                    $property->image = $feature_image;
                }

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
                $property->property_feature =  json_encode($request->property_feature);
                $property->user_id = Auth::user()->id;
                $property->save();
                // bring all the product images of that product
                $propimgs = Gallery::where('property_id', $request->id)->get();
                // then check whether a filename is missing in imgsdb if it is missing remove it from database and unlink it
                foreach ($propimgs as $pimg) {
                    if (!in_array($pimg->name, $request->imagesdb)) {
                        @unlink('public/properties/gallery/' . $pimg->name);
                        $pimg->delete();
                    }
                }
                if ($gallary) {
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
                    'message' => 'Successfully updated',
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
        $status_result = $result->status == 1 ? '0' : '1';
        Property::where('id', $property_id)->update(array('status' => $status_result));

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

    public function showProperites()
    {
        return view('agent.my_properties');
    }

    public function paymentMehtod()
    {
        $result = Property::where('email', Auth::user()->email)->orderBy('id', 'desc')->first();
        if ($result->advertise_req) {
            return view('agent.payment-method');
        } else {
            return view('agent.my_properties');
        }
    }

    public function paymentdetails()
    {

        return view('agent.payment-method');
    }

    public function advertbuy()
    {
        $data['adverts'] = DB::table('advert_plan')->where('status', 'active')->get();

        return view('agent.advert-buy', $data);
    }
    public function packagebuy()
    {
        $data['packages'] = DB::table('package_plan')->where('status', 'active')->get();

        return view('agent.package-buy', $data);
    }

    public function packagestore(Request $request)
    {
        $package = $request->get('add-ons');
        $amt = $request->get('amt');
        $mytime = Carbon::now();
        $cdatetime = $mytime->toDateTimeString();
        foreach ($package as $i => $item) {

            $data = array(

                'plan_id' => $package[$i],
                'quantity' => $request->get('quantity')[$i],
                'user_id' => Auth::user()->id,
                'email' => Auth::user()->email,
                'type' => $request->get('type'),
                'status' => 'inactive',
                'is_approved' => 'inactive',
                'is_paid' => 'inactive',
                'buy_on' => Carbon::now()->toDateString(),
                'created_at' => $cdatetime,
            );
            Package_subscribe::insert($data);
        }


        return redirect()->route('paymentdetails')->with('success', 'Your request to buy the plan is submitted. Please pay the amount of ' . $amt[0] . '/- to confirm the package plan.');
    }
}
