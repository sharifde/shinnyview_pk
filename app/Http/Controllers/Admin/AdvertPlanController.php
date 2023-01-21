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

class AdvertPlanController extends Controller
{
    //get
    public function get(){
        return view('admin.advert-plan.advert-plan');
    }

    // addNewAdvertPlan
    public function addNewAdvertPlan(request $r){
        request()->validate([
            'name' => 'required',
            'p_image' => 'required|image',
            'price' => 'required',
            'days' => 'required',
            'size' => 'required',
			'design_name' => 'required',
			'design_price' => 'required',
			'color' => 'required',
        ], [
            'name.required' => 'Plan Name is required',
            'p_image.required' => 'Plan Image is Required',
            'price.required' => 'Plan Price is required',
            'days.required' => 'Plan days is required',
            'size.required' => 'Plan size is required',
			'design_name.required' => 'Design Name is required',
			'design_price.required' => 'Design Price is required',
			'color.required' => 'color is required',
        ]);
        
        $planData = array(
            'name' => request()->name,
            'image' => request()->p_image,
            'price' => request()->price,
            'days' => request()->days,
            'size' => request()->size,
			'design_name' => request()->design_name,
			'design_price' => request()->design_price,
			'color' => request()->color,
            'status' => 'active',
            'created_at' => time(),
            'updated_at' => time(),
        );

        $planID = DB::table('advert_plan')->insertGetId($planData);
        
        if($planID > 0){

            //-------- Logo image Start --------
            // $logo_name = 'advert-plans/'.$planID.'/image.jpg';
            $logo = request()->p_image;
            // $img = Image::make($logo->getRealPath())->encode('jpg', 50);
            // $logo = $img->stream();
            // store to local
            // Storage::disk('local')->put($logo_name, $logo->__toString(), 'public');
            // -------- Logo image END --------
            if ( $logo = request()->p_image) {

                // $file = $request->file('image') ;

                $fileName = $logo->getClientOriginalName();

                $destinationPath =  public_path() . '/advert-plans/' . $planID . '/';
                $img =  $logo->move($destinationPath, $fileName);
                // return redirect('/uploadfile');
            }
            
            DB::table('advert_plan')->where('id','=',$planID)->update(['image' => $fileName ,]);
            return back()->with('success', 'successful');
        }
    }

    // getListing
    public function getListing(){
        return view('admin.advert-plan.plans-list');
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

            $query = DB::table('advert_plan')->select('id','name','image','price','days','size','design_price', 'design_name','color','status');

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
                <a href="'.route('edit.plan',$d->id).'">

                    <button type="button" class="bg-transparent border-0 p-0"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                        <i class="bi bi-pencil text-secondary"></i>
                    </button>
                    </a>
                </li>
                <li class="list-inline-item me-3">
                    <button type="button" class="bg-transparent border-0 p-0"
                        data-bs-toggle="tooltip" onclick="deleteAdvert('.$d->id.')" data-bs-placement="top" title="Delete">
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
        return view('admin.advert-plan.plans-list')->with('topbar', 'All Agents');
    }

    // updatePlanStatus
    public function updatePlanStatus(Request $r){
        $id = $r->id;
        $plan = DB::table('advert_plan')->where('id',$id)->first();
        $status_result = $plan->status == 'active' ? 'inactive':'active';
        DB::table('advert_plan')->where('id',$id)->update(array('status' => $status_result));
        return response()->json(['result' => true]);
    }

    // getEditPlan
    public function getEditPlan(Request $r){
        $id = $r->id;
        $plan = DB::table('advert_plan')->where('id',$id)->first();

        return view('admin.advert-plan.edit-plan',['plan' => $plan]);

    }
	
	 // deleteAdvert
    public function deleteAdvert(Request $r){
        $id = $r->id;
        DB::table('advert_plan')->where('id',$id)->delete();
    }

    // updateDetails
    public function updateDetails(Request $r){
        request()->validate([
            'name' => 'required',
            'price' => 'required',
            'days' => 'required',
            'size' => 'required',
			'design_name' => 'required',
			'design_price' => 'required',
			'color' => 'required',
        ], [
            'name.required' => 'Plan Name is required',
            'p_image.required' => 'Plan Image is Required',
            'price.required' => 'Plan Price is required',
            'days.required' => 'Plan days is required',
            'size.required' => 'Plan size is required',
			'design_name.required' => 'Design Name is required',
			'design_price.required' => 'Design Price is required',
			'color.required' => 'color is required',
        ]);
        
        $planData = array(
            'name' => request()->name,
            'price' => request()->price,
            'days' => request()->days,
            'size' => request()->size,
			'design_name' => request()->design_name,
			'design_price' => request()->design_price,
			'color' => request()->color,
            'status' => 'active',
            'created_at' => time(),
            'updated_at' => time(),
        );

        
        // id
        $id = request()->planID;
        
        // update info
        DB::table('advert_plan')->where('id','=',$id)->update($planData);

        // update logo
        $logo = request()->image;
        if(!empty($logo)){
            //-------- Image Start --------
            // $logo_name = 'advert-plans/'.$id.'/image.jpg';
            $logo = request()->image;
            // $img = Image::make($logo->getRealPath())->encode('jpg', 50);
            // $logo = $img->stream();
            // store to local
            // Storage::disk('local')->put($logo_name, $logo->__toString(), 'public');
            //-------- Image END --------
            if ( $logo = request()->image) {

                // $file = $request->file('image') ;

                $fileName = $logo->getClientOriginalName();

                $destinationPath =  public_path() . '/advert-plans/' . $id . '/';
                $img =  $logo->move($destinationPath, $fileName);
                // return redirect('/uploadfile');
            }

            DB::table('advert_plan')->where('id','=',$id)->update(['image' => $fileName,]);
        }
        return back()->with('success', 'successful');

    }



}
