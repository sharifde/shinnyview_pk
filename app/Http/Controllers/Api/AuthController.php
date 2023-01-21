<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Validator;
use App\Models\Property;
use App\Models\User;
use App\Models\Plan;
use App\Mail\ForgotEmail;
use App\Mail\VerificationCodeEmail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Mail;
use DB;
use App\Http\Resources\PropertyResource;


class AuthController extends Controller
{
    /**
     * AuthController constructor.
     */
    public function __construct()
    {
    }
    public function sendVerificationCode(Request $request)
    {
        $rules = [
            'email' => 'required|unique:users|email|max:255'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()), 400);
        }
        $num_str = sprintf("%06d", mt_rand(1, 999999));
        Mail::to($request->email)->send(new VerificationCodeEmail($num_str));
        return response()->json([
            'status' => true,
            'code' => $num_str,
            'message' => 'Your Verification code has been sent successfully to your email.'
        ], 200);
    }

    public function dealer_signup()
    {
        if (Auth::check()) {
            return redirect()->to('/');
        }

        $data['package_plan'] = DB::table('package_plan')->where('status', 'active')->get();

        return view('frontend.dealer_register', $data);
    }

    public function storeClient(request $request)
    {

        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->email,
            'mobile' => 'required|numeric',
            'password' => 'required|between:6,255',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        try {
            $name = $request->name;
            $email = $request->email;
            $mobile = $request->mobile;
            $cnic = $request->cnic;
            $password = Hash::make($request->password);

            $user = new User();
            $user->name =  $name;
            $user->email =  $email;
            $user->company_phone_number =  $mobile;
            $user->cnic =  $cnic;
            $user->password =  $password;
            $user->status =  1;
            $user->role_id = 2;
            $user->plan_id = 1;
            $plan_id = 1;
            $plan = DB::table('package_plan')->where('status', 'active')->where('id', $plan_id)->first();
            $user->ads =  $plan->property;


            //$plan = package_plan::find($plan_id);

            $today = new \Carbon\Carbon(Carbon::now());
            $user->plan_expired_date = $today->addDays($plan->days);
            $user->role_type = 'Private Seller';
            $user->created_at = new \Carbon\Carbon(Carbon::now());

            $record = $user->save();

            // if($record > 0){
            //
            // 	return back()->with('success', 'successful');
            // }
            //  else{
            // 	 return back()->with('error', 'please try again!');
            //  }

            return response()->json([
                'status' => true,
                'message' => 'Register successfully.'
            ], 200);
        } catch (\Exception $e) {
            // Anything that went wrong
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    public function storeDealer(Request $request)
    {
        //--- Validation Section
        $rules = [
            'name' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        try {
            $name = $request->name;
            $email = $request->email;
            $password = $request->password;
            $confirm_password = $request->password;
            $number = $request->number;
            $cnic = $request->cnic;
            $date_birth = $request->date_birth;
            $print_name = $request->print_name;
            $position = $request->position;
            $signature = $request->signature;
            $signature_date = $request->signature_date;
            $company_name = $request->company_name;
            $address = $request->address;
            $website = $request->website;
            $company_phone_number = $request->company_phone_number;
            $package_due = $request->package_due;
            $payment_type = $request->payment_type;
            $advertise = $request->advertise;
            $contact_type = $request->contact_type;
            $secp_registration = $request->secp_registration;
            $plan_id = $request->package_id;
            //  $plan_id = $plan_id[0];


            /////////////////////////////////////////

            $today = new \Carbon\Carbon(Carbon::now());
            $password = Hash::make($password);
            $plan = DB::table('package_plan')->where('status', 'active')->where('id', $plan_id)->first();
            $user = new User();
            $user->name =  $name;
            $user->email =  $email;
            $user->password =  $password;
            $user->confirm_password =  $confirm_password;
            $user->number =  $number;
            $user->cnic =  $cnic;
            $user->date_birth =  $date_birth;
            $user->print_name =  $print_name;
            $user->position =  $position;
            $user->signature =  $signature;
            $user->signature_date =  $signature_date;
            $user->company_name =  $company_name;
            $user->address =  $address;
            $user->website =  $website;
            $user->company_phone_number =  $company_phone_number;
            $user->package_due =  $package_due;
            $user->payment_type =  $payment_type;
            $user->advertise =  json_encode($advertise);
            $user->contact_type =  json_encode($contact_type);
            $user->secp_registration =  $secp_registration;
            $user->plan_id = $plan_id; //$plan->id;
            $user->ads =  $plan->property;
            $user->plan_expired_date = $today->addDays($plan->days);
            $user->role_id = 2;
            $user->status = 0;
            $user->role_type = 'Agent';
            $user->save();
            return response()->json([
                'status' => true,
                'message' => 'You account thas been successfully register, for account activation our Admin contact you.'
            ], 200);
        } catch (\Exception $e) {
            // Anything that went wrong
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * @param Request $request
     */
    public function login(Request $request)
    {
        try {
            if ($token = JWTAuth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = User::find(Auth::user()->id);
                // dd($user);
                // $plan = Plan::find(Auth::user()->plan_id);
                $plan = DB::table('package_plan')->where('status', 'active')->where('id', Auth::user()->plan_id)->first();
                // dd($plan);

                $user_data = array(
                    'id' => $user->id, 'name' => $user->name,
                    'email' => $user->email, 'phone' => $user->number,
                    'role_type' => $user->role_type,
                    'image' => asset('images/profile_avatar/' . $user->image), 'plan_name' => $plan->name, 'feature_property' => $plan->feature_property, 'boosted_property' => $plan->boosted_property, 'plan_ads' => $user->ads, 'plan_expire_date' => $user->plan_expired_date
                );

                return response()->json(['status' => true, 'user_info' => $user_data, 'access_token' => $token], 200)->header('Authorization', $token);
            } else {
                return response()->json(['status' => false, 'message' => 'Email or password is invalid.'], 400);
            }
        } catch (\Exception $e) {
            // Anything that went wrong
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'test' => 123
            ], 400);
        }
    }
    /**
     * @param Request $request
     */
    public function forgotPassword(Request $request)
    {
        try {
            $user = User::where('email',  $request->email)->first();
            if ($user) {
                Mail::to($user->email)->send(new ForgotEmail($user));

                return response()->json(['status' => true, 'message' => 'Your Password has send to your Email.'], 200);
            } else {
                return response()->json(['status' => false, 'message' => 'Your Email does not exist.'], 400);
            }
        } catch (\Exception $e) {
            // Anything that went wrong
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
    public function userPropertyCount()
    {
        // $data = DB::table('property_purpose as pp')->select(DB::raw('count(pp.id) as total'), 'pp.name')
        //     ->join('properties as p', 'pp.id', '=', 'p.purpose_id')
        //     ->where('user_id',  Auth::user()->id)
        //     ->groupBy('pp.id')
        //     ->get();
        $data = [];
        $result = DB::table('property_purpose as pp')->get();
        foreach ($result as $key => $r) {
            $total_property = DB::table('properties as pp')
                ->where('user_id',  Auth::user()->id)
                ->where('purpose_id',  $r->id)
                ->count();
            $data[] = array('id' => $r->id, 'name' => $r->name, 'total' => $total_property);
        }
        $user_property_count = DB::table('properties as pp')
            ->where('user_id',  Auth::user()->id)
            ->count();
        return response()->json(['result' => true, 'user_total_property_count' => $user_property_count, 'data' => $data]);
    }

    public function updateUser(Request $request)
    {
        $user_id = Auth::user()->id;
        $rules = array(
            'name' => 'required|min:3',
            'phone' => 'required|min:6',
            'email' => 'required|email|unique:users,email,' . $user_id,
            'password' => 'sometimes:min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'sometimes:min:6',
            'old_password' => 'sometimes:min:6'
        );

        $input = $request->all();
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        // if ($file = $request->file('photo'))
        // {
        //     $name = time().preg_replace('/\s+/', '', $file->getClientOriginalName());
        //     $file->move('assets/images/user/propics/',$name);
        //     $photo_name = $name;
        // }else{
        //     $photo_name = '';
        // }
        $current_password = Auth::User()->password;
        if (Hash::check($request->old_password, $current_password)) {
            $user = User::find(Auth::user()->id);
            $user->name = $request->name;
            $user->number = $request->phone;
            $user->email = $request->email;
            $user->confirm_password = $request->confirm_password;
            if (!empty($request->password)) {
                $user->password = bcrypt($request->password);
            }
            $user->save();
            $user = User::find(Auth::user()->id);
            // $plan = Plan::find(Auth::user()->plan_id);
            $plan = DB::table('package_plan')->where('status', 'active')->where('id', Auth::user()->plan_id)->first();
            $user_data = array(
                'id' => $user->id, 'name' => $user->name,
                'email' => $user->email, 'phone' => $user->number,
                'image' => asset('images/profile_avatar/' . $user->image), 'plan_name' => $plan->name, 'plan_ads' => $user->ads, 'plan_expire_date' => $user->plan_expired_date
            );
            return response()->json(['status' => true, 'message' => 'Your profile has been update successfully.', 'user_info' => $user_data], 200);
        } else {
            $error = array('current-password' => 'Please enter correct old password');
            return response()->json(array('error' => $error), 400);
        }
    }

    public function userProperty(Request $request)
    {
        // $search_type = $request->search_type;
        // $city =  $request->city;
        // $min_price =  $request->min_price;
        // $max_price =  $request->max_price;
        // $property_type =  $request->property_type;
        // $bedroom =  $request->bedroom;
        // $col = 'price';
        // $cond = 'asc';
        // $offset = !empty($request->offset) ? $request->offset : 0;
        $query = Property::where('properties.status', 1)->select(
            'properties.*',
            'users.name as user_name',
            'users.email as user_email',
            'users.number as user_phone_number',
            'users.image as user_image',
            'users.address as user_address',
            'cities.name as city_name',
            'city_address.name as address_name',
            'property_purpose.name as purpose_name',
            'provinces.name as province_name',
            'property_type.name as property_type_name',
            'properties.boost',
            'properties.featured'
        )
            ->leftjoin('provinces', 'properties.province_id', '=', 'provinces.id')
            ->leftjoin('users', 'properties.user_id', '=', 'users.id')
            ->leftjoin('cities', 'properties.city_id', '=', 'cities.id')
            ->leftjoin('city_address', 'properties.address_id', '=', 'city_address.id')
            ->leftjoin('property_purpose', 'properties.purpose_id', '=', 'property_purpose.id')
            ->leftjoin('property_type', 'properties.property_type_id', '=', 'property_type.id')


            ->where('user_id',  Auth::user()->id);

        $respons = PropertyResource::collection($query->get());
        return response()->json(['result' => $respons]);
    }
    /**
     * Get authenticated user
     */
    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $result = array(
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->number,
        );
        return response()->json([
            'success' => true,
            'data' => $result
        ], 200);
    }
    public function logout()
    {
        $this->guard()->logout();

        return response()->json([
            'status' => true,
            'msg' => 'Logged out Successfully.'
        ], 200);
    }
    /**
     * Refresh JWT token
     */
    public function refresh()
    {
        if ($token = $this->guard()->refresh()) {
            return response()
                ->json(['status' => true], 200)
                ->header('Authorization', $token);
        }
        return response()->json(['error' => 'refresh_token_error'], 401);
    }
    /**
     * Return auth guard
     */
    private function guard()
    {
        return Auth::guard();
    }
}
