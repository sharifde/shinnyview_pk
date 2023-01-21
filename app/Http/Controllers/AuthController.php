<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\VerificationCodeEmail;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Plan;
use App\Models\Package_plan;
use App\Models\SingleUser;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AuthController extends Controller
{

    public function login()
    {
        if (Auth::check()) {
            return redirect()->to('/');
        }
        return view('frontend.login');
    }
    public function register()
    {
        if (Auth::check()) {
            return redirect()->to('/');
        }
        return view('frontend.register');
    }
    public function profile($username)
    {
        $user = User::where('username', $username)->first();
        $posts = $user->posts()->get();
        return view('frontend.profile', compact('user', 'posts'));
    }
    public function logout()
    {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/');
    }
    public function myprofileEdit()
    {
        return view('frontend.myprofile_edit');
    }
    public function dealer_signup()
    {
        if (Auth::check()) {
            return redirect()->to('/');
        }

        $data['package_plan'] = DB::table('package_plan')->where('status', 'active')->get();

        return view('frontend.dealer_register', $data);
    }
    public function client_signup()
    {
        if (Auth::check()) {
            return redirect()->to('/');
        }
        return view('frontend.dealer-single');
    }
    public function forgot()
    {
        return view('frontend.forgot');
    }
    public function sendVerificationCode(Request $request)
    {
        $rules = [
            'email' => 'required|unique:users|email|max:255'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()),400);
        }
        $num_str = sprintf("%06d", mt_rand(1, 999999));
        Mail::to($request->email)->send(new VerificationCodeEmail($num_str));
        return response()->json(['status' => true,
        'code' => $num_str,
        'message' =>'Your Verification code has been sent successfully to your email.'], 200);
        Mail::to($request->email)->send(new VerificationCodeEmail($num_str));
        return response()->json([
            'status' => true,
            'code' => $num_str,
            'message' => 'Your Verification code has been sent successfully to your email.'
        ], 200);
    }

    public function storeClient(request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->email,
            'mobile' => 'required|numeric',
            'password' => 'required|between:6,255|confirmed'
        ], [
            'name' => 'Full Name is required Alphabatic only',
            'email' => 'is required',
            'mobile' => 'Mobile number is required',
            'password' => 'Password and Confirmed password must match with min 8 char'
        ]);

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
        //$plan = package_plan::find($plan_id);

        $today = new \Carbon\Carbon(Carbon::now());
        $user->plan_expired_date = $today->addDays($plan->days);
        $user->role_type = 'Private Seller';
        $user->created_at = new \Carbon\Carbon(Carbon::now());

        $record = $user->save();

        if ($record > 0) {

            return back()->with('success', 'successful');
        } else {
            return back()->with('error', 'please try again!');
        }
    }

    public function storeDealer(Request $request)
    {
        //--- Validation Section
        // return  dd($request->all());
        $rules = [
            'name' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $confirm_password = $password;
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
        $plan_id = $plan_id[0];

        /////////////////////////////////////////

        $today = new \Carbon\Carbon(Carbon::now());
        $password = Hash::make($password);
        $plan = DB::table('package_plan')->where('status', 'active')->where('id', $plan_id)->first();
        //$plan = package_plan::find($plan_id);
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
        $user->company_phone_number =  $number;
        $user->number =  $number;
        $user->package_due =  $package_due;
        $user->payment_type =  $payment_type;
        $user->advertise =  json_encode($advertise);
        $user->contact_type =  json_encode($contact_type);
        $user->secp_registration =  $secp_registration;
        $user->plan_id = $plan_id; //$request->package_id;
        //$user->ads =  $plan->ads;
        $user->plan_expired_date = $today->addDays($plan->days);
        $user->role_id = 2;
        $user->status = 0;
        $user->role_type = 'Agent';
        $user->save();
    }
}
