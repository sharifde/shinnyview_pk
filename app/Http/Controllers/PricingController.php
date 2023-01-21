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

class PricingController extends Controller
{
    //getPricing
    public function getPricing(){
        $plans = DB::table('advert_plan')
				 ->where('status','active')
			     ->select('name','color','image','price','days','size','design_name', 'design_price')->get();

        $data = array(
            'plans' => $plans
        );

        return view('frontend.pricing.pricing-list',$data);
    }
}
