<?php

namespace App\Http\Controllers\Admin;

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

class PackagePlanController extends Controller
{
    //get
    public function index(){
        return view('admin.package-plan.addpackage-plan');
    }

    // addNewAdvertPlan
    public function savePackagePlan(request $r){
        request()->validate([
            'name' => 'required',
            'property' => 'required|numeric',
            'price' => 'required|numeric',
            'days' => 'required|numeric',
            'picture' => 'required|numeric',
			'video_link' => 'required|numeric',
			'feature_property' => 'required|numeric',
			'boosted_property' => 'required|numeric',
			'color' => 'required',
        ], [
            'name' => 'Package Name is required Alphabatic only',
            'property' => 'Property Name is required in number',
            'price' => 'Price is required in number',
            'days' => 'Days is required in number',
            'picture' => 'Picture is required in number',
			'video_link' => 'Videos Link is required in number',
			'feature_property' => 'Feature Property is required in number',
			'boosted_property' => 'Boosted Property is required in number',
			'color' => 'Color is required',
        ]);
        
        $packageData = array(
            'name' => request()->name,
            'property' => request()->property,
            'price' => request()->price,
            'days' => request()->days,
            'picture' => request()->picture,
            'video_link' => request()->video_link,
			'feature_property' => request()->feature_property,
            'boosted_property' => request()->boosted_property,
			'option1' => request()->option1,
			'option2' => request()->option2,
			'option3' => request()->option3,
			'color' => request()->color,
            'status' => 'active',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        );

        $planID = DB::table('package_plan')->insertGetId($packageData);
        
        if($planID > 0){

            return back()->with('success', 'successful');
        }
    }

    // getListing
    public function getListing(){
        return view('admin.package-plan.packageplans-list');
    }

    // getListingDetails
    public function getListingDetails(Request $request){

        if ($request->ajax()) {
            $role_id = request()->id;
            $_order = request('order');
            $_columns = request('columns');
            $order_by = $_columns[$_order[0]['column']]['name'];
            $order_dir = $_order[0]['dir'];
            $skip = request('start');
            $take = request('length');
            $search = request('search');

            $query = DB::table('package_plan')->select('id','name','property','price','days','picture','video_link','feature_property','boosted_property','color','status');

            $recordsTotal = $query->count();
            if (isset($search['value'])) {
                $query->where(function ($q) use ($search) {
                    $q->whereRaw(" name LIKE '%" . $search['value'] . "%'
                    ");
                });
            }
            $recordsFiltered = $query->count();
            $data = $query->orderBy($order_by, $order_dir)->skip($skip)->take($take)->get();
            foreach ($data as &$d) {
                // $image = asset('storage/app/'.$d->image);
                $status = $d->status == 'active' ? 'checked' : '';
            //     $d->image = '<img class="rounded-circle me-2" src="' . $image . '"
            //     width="35px" height="35px" alt="price plan"
            // />';

                $d->status = '<div class="form-check form-switch d-flex ps-0 align-items-center">
                <label class="form-check-label" for="userStatusrow2">OFF</label>
                <input class="form-check-input" onclick="updateStatus('.$d->id.')"  type="checkbox" id="userStatusrow1" ' . $status . ' >
                <label class="form-check-label" for="userStatusrow2">ON</label>
            </div>';
                $d->action = '
            <ul class="list-unstyled list-inline mb-0 action-bar">
                <li class="list-inline-item me-3">
                <a href="'.route('editpackage.plan',$d->id).'">

                    <button type="button" class="bg-transparent border-0 p-0"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                        <i class="bi bi-pencil text-secondary"></i>
                    </button>
                    </a>
                </li>
                <li class="list-inline-item me-3">
                    <button type="button" class="bg-transparent border-0 p-0"
                        data-bs-toggle="tooltip" onclick="deletePackage('.$d->id.')" data-bs-placement="top" title="Delete">
                        <i class="bi bi-trash text-danger"></i>
                    </button>
                </li>
            </ul>';
            }
            return [
                "draw" => request('draw'),
                "recordsTotal" => $recordsTotal,
                'recordsFiltered' => $recordsFiltered,
                "data" => $data,
            ];
        }
        // return view('admin.agent')->with('topbar', 'All Agents');
        return view('admin.package-plan.packageplans-list')->with('topbar', 'All Agents');
    }

    // updatePlanStatus
    public function updatePackagePlanStatus(Request $r){
        $id = $r->id;
        $plan = DB::table('package_plan')->where('id',$id)->first();
        $status_result = $plan->status == 'active' ? 'inactive':'active';
        DB::table('package_plan')->where('id',$id)->update(array('status' => $status_result));
        return response()->json(['result' => true]);
    }
	
	// updatePlanStatus
    public function updatePackagePlanStatusrequestapprove(Request $r){
        $id = $r->id;
        $plan = DB::table('package_subscribes')->where('id',$id)->first();
		$is_approve = $plan->is_approved == 'active' ? 'inactive':'active';
        DB::table('package_subscribes')->where('id',$id)->update(array('is_approved' => $is_approve));
        return response()->json(['result' => true]);
    }
	
	// updatePlanStatus
    public function updatePackagePlanStatusrequestispaid(Request $r){
        $id = $r->id;
        $plan = DB::table('package_subscribes')->where('id',$id)->first();
		$is_paid = $plan->is_paid == 'active' ? 'inactive':'active';
        DB::table('package_subscribes')->where('id',$id)->update(array('is_paid' => $is_paid));
        return response()->json(['result' => true]);
    }
	
	// updatePlanStatus
    public function updatePackagePlanStatusrequest(Request $r){
        $id = $r->id;
        $plan = DB::table('package_subscribes')->where('id',$id)->first();
		$status = $plan->status == 'active' ? 'inactive':'active';
        DB::table('package_subscribes')->where('id',$id)->update(array('status' => $status));
        return response()->json(['result' => true]);
    }

    // getEditPlan
    public function getEditPlan(Request $r){
        $id = $r->id;
        $plan = DB::table('package_plan')->where('id',$id)->first();

        return view('admin.package-plan.edit-packageplan',['plan' => $plan]);

    }
	
	 // deletePackage
    public function deletePackage(Request $r){
        $id = $r->id;
        DB::table('package_plan')->where('id',$id)->delete();
    }
	
	 // deletePackage
    public function deletePackagerequest(Request $r){
        $id = $r->id;
        DB::table('package_subscribes')->where('id',$id)->delete();
    }

    // updateDetails
    public function updateDetails(Request $r){
        request()->validate([
            'name' => 'required',
            'property' => 'required|numeric',
            'price' => 'required|numeric',
            'days' => 'required|numeric',
            'picture' => 'required|numeric',
			'video_link' => 'required|numeric',
			'feature_property' => 'required|numeric',
			'boosted_property' => 'required|numeric',
			'color' => 'required',
        ], [
            'name' => 'Package Name is required Alphabatic only',
            'property' => 'Property Name is required in number',
            'price' => 'Price is required in number',
            'days' => 'Days is required in number',
            'picture' => 'Picture is required in number',
			'video_link' => 'Videos Link is required in number',
			'feature_property' => 'Feature Property is required in number',
			'boosted_property' => 'Boosted Property is required in number',
			'color' => 'Color is required',
        ]);
        
        $packageData = array(
            'name' => request()->name,
            'property' => request()->property,
            'price' => request()->price,
            'days' => request()->days,
            'picture' => request()->picture,
            'video_link' => request()->video_link,
			'feature_property' => request()->feature_property,
            'boosted_property' => request()->boosted_property,
			'option1' => request()->option1,
			'option2' => request()->option2,
			'option3' => request()->option3,
			'color' => request()->color,
            'status' => 'active',
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
           
        );

        
        // id
        $id = request()->planID;
        
        // update info
        DB::table('package_plan')->where('id','=',$id)->update($packageData);

        return back()->with('success', 'successful');

    }

	// getRequest
    public function getrequest(){
		
							$data['package_request'] = DB::table('users')
			  				->select('users.name', 'package_subscribes.email', 'package_subscribes.plan_id','package_subscribes.type','package_subscribes.status','package_subscribes.is_approved','package_subscribes.is_paid', 'package_subscribes.buy_on')
			  				->join('package_subscribes','package_subscribes.email','=','users.email')
							->orderby('package_subscribes.id', 'desc')
							->limit(1000)
			  				->get();
		
        return view('admin.package-plan.package-request-list');
    }
	
	// getListingDetails
    public function getrequestDetails(Request $request){

        if ($request->ajax()) {
            $role_id = request()->id;
            $_order = request('order');
            $_columns = request('columns');
            $order_by = $_columns[$_order[0]['column']]['name'];
            $order_dir = $_order[0]['dir'];
            $skip = request('start');
            $take = request('length');
            $search = request('search');

            $query = DB::table('users')
			  				->select('package_subscribes.id', 'users.name', 'package_subscribes.email', 'package_subscribes.plan_id','package_subscribes.type','package_subscribes.status','package_subscribes.is_approved','package_subscribes.is_paid', 'package_subscribes.buy_on')
			  				->join('package_subscribes','package_subscribes.email','=','users.email')
							->orderby('package_subscribes.id', 'desc');

            $recordsTotal = $query->count();
            if (isset($search['value'])) {
                $query->where(function ($q) use ($search) {
                    $q->whereRaw(" package_subscribes.email LIKE '%" . $search['value'] . "%'
                    ");
                });
            }
            $recordsFiltered = $query->count();
            $data = $query->orderBy($order_by, $order_dir)->skip($skip)->take($take)->get();
            foreach ($data as &$d) {
                // $image = asset('storage/app/'.$d->image);
                $status = $d->status == 'active' ? 'checked' : '';
				$is_approved = $d->is_approved == 'active' ? 'checked' : '';
				$is_paid = $d->is_paid == 'active' ? 'checked' : '';
            //     $d->image = '<img class="rounded-circle me-2" src="' . $image . '"
            //     width="35px" height="35px" alt="price plan"
            // />';
				if($d->type == 'Package Plan'){
					$packages = DB::table('package_plan')
							->where('id', $d->plan_id)
			  				->first();
				}
				elseif($d->type == 'Advert Plan'){
					$packages = DB::table('advert_plan')
							->where('id', $d->plan_id)
			  				->first();
				}
                
			    // print_r($d->status );
                $pp= $packages->price ?? null;
				$d->plainname = $packages->name ?? null.'('.$pp.')';
				
                $d->status = '<div class="form-check form-switch d-flex ps-0 align-items-center">
                <label class="form-check-label" for="userStatusrow2">OFF</label>
                <input class="form-check-input" onclick="updateStatus('.$d->id.')"  type="checkbox" id="userStatusrow1" ' . $status . ' >
				
                <label class="form-check-label" for="userStatusrow2">ON</label>
            </div>';
				 $d->is_approved = '<div class="form-check form-switch d-flex ps-0 align-items-center">
                <label class="form-check-label" for="userStatusrow2">OFF</label>
                <input class="form-check-input" onclick="updateIsapprove('.$d->id.')"  type="checkbox" id="userStatusrow1" ' . $is_approved . ' >
				
                <label class="form-check-label" for="userStatusrow2">ON</label>
            </div>';
				 $d->is_paid = '<div class="form-check form-switch d-flex ps-0 align-items-center">
                <label class="form-check-label" for="userStatusrow2">OFF</label>
                <input class="form-check-input" onclick="updateIspaid('.$d->id.')"  type="checkbox" id="userStatusrow1" ' . $is_paid . ' >
				
                <label class="form-check-label" for="userStatusrow2">ON</label>
            </div>';
				
                $d->action = '
            <ul class="list-unstyled list-inline mb-0 action-bar">
                <!--<li class="list-inline-item me-3">
                <a href="'.route('editpackage.plan',$d->id).'">

                    <button type="button" class="bg-transparent border-0 p-0"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                        <i class="bi bi-pencil text-secondary"></i>
                    </button>
                    </a>
                </li>-->
                <li class="list-inline-item me-3">
                    <button type="button" class="bg-transparent border-0 p-0"
                        data-bs-toggle="tooltip" onclick="deletePackage('.$d->id.')" data-bs-placement="top" title="Delete">
                        <i class="bi bi-trash text-danger"></i>
                    </button>
                </li>
            </ul>';
            }
            return [
                // "draw" => request('draw'),
                "recordsTotal" => $recordsTotal,
                'recordsFiltered' => $recordsFiltered,
                "data" => $data,
            ];
        }
        // return view('admin.agent')->with('topbar', 'All Agents');
        return view('admin.package-plan.package-request-list')->with('topbar', 'All Agents');
    }


}
