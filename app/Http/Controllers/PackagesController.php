<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Cache;
use DB;
use Redirect;

class PackagesController extends Controller
{
    //Packages
    public function index(){
        
        return view('frontend.packages');
    }
	
	//getPricing
    public function packagedetail(){
        $plans = DB::table('package_plan')->where('status','active')->get();

        $data = array(
            'plans' => $plans
        );

        return view('frontend.pricing.packages-list',$data);
    }
}
