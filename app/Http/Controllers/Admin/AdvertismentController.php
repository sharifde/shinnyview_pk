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
use Illuminate\Filesystem\Filesystem;

class AdvertismentController extends Controller
{
    // getAddNewAdvertisment
    public function getAddNewAdvertisment()
    {

        return view('admin.advertisment.add-new-advertisment');
    }

    // addNewAdvertisment
    public function addNewAdvertisment()
    {

        request()->validate([
            'ad_name' => 'required',
            'd_image' => 'required|image',
            'status' => 'required',
        ], [
            'ad_name.required' => 'Advertisment Name is required',
            'd_image.required' => 'Advertisment Banner is Required',
            'status.required' => 'Status is required',
        ]);

        $advertismentData = array(
            'name' => request()->ad_name,
            'status' => request()->status,
            'created_at' => time(),
            'updated_at' => time(),
        );

        $adID = DB::table('advertisment')->insertGetId($advertismentData);

        if ($adID > 0) {

            //-------- Logo image Start --------
            // $logo_name = 'advertisment/' . $adID . '/banner.jpg';
            // $logo = request()->d_image;
            // $img = Image::make($logo->getRealPath())->encode('jpg', 50);
            // $logo = $img->stream();
            // store to local
            // Storage::disk('local')->put($logo_name, $logo->__toString(), 'public');
            //-------- Logo image END --------
            if ($logo = request()->d_image) {

                // $file = $request->file('image') ;
                $fileName = $logo->getClientOriginalName();
                $destinationPath = public_path() . '/advertisment/' . $adID . '/';
                $img =  $logo->move($destinationPath, $fileName);
                // return redirect('/uploadfile');
            }


            DB::table('advertisment')->where('id', '=', $adID)->update(['logo' => 'advertisment/' . $adID . '/' . $fileName,]);
            return back()->with('success', 'successful');
        }
    }

    // admin.advertisment.list
    public function getadvertismentList()
    {
        return view('admin.advertisment.advertisment-list');
    }

    // dealerDetails
    public function advDetails(Request $request)
    {

        if ($request->ajax()) {
            $role_id = request()->id;
            $_order = request('order');
            $_columns = request('columns');
            $order_by = $_columns[$_order[0]['column']]['name'];
            $order_dir = $_order[0]['dir'];
            $skip = request('start');
            $take = request('length');
            $search = request('search');
            // $query = User::query();

            $query = DB::table('advertisment')->select('id', 'name', 'logo', 'status');

            // $query->where("role_id", 2);
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
                // $result_plan = Plan::where('id',$d->plan_id)->first();
                $image = asset($d->logo);
                // <img src="{{asset('storage/app')}}/{{ $p->logo }}" alt="logo">
                // $d->package = $result_plan? $result_plan->title:'';
                $status = $d->status == 'active' ? 'checked' : '';
                $d->logo = '<img class="rounded-circle me-2" src="' . $image . '"
                width="35px" height="35px" alt="banner"
            />';


                $d->status = '<div class="form-check form-switch d-flex ps-0 align-items-center">
                <label class="form-check-label" for="userStatusrow2">OFF</label>
                <input class="form-check-input" onclick="updateStatus(' . $d->id . ')"  type="checkbox" id="userStatusrow1" ' . $status . ' >
                <label class="form-check-label" for="userStatusrow2">ON</label>
            </div>';
                $d->action = '
            <ul class="list-unstyled list-inline mb-0 action-bar">
                <li class="list-inline-item me-3">
                <a href="' . route('edit.advertisment', $d->id) . '">

                    <button type="button" class="bg-transparent border-0 p-0"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                        <i class="bi bi-pencil text-secondary"></i>
                    </button>
                    </a>
                </li>
                <li class="list-inline-item me-3">
                    <button type="button" class="bg-transparent border-0 p-0"
                        data-bs-toggle="tooltip" onclick="deleteAdvertisment(' . $d->id . ')" data-bs-placement="top" title="Delete">
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
        return view('admin.advertisment.list')->with('topbar', 'All Agents');
    }



    // getEditAdvertisment
    public function getEditAdvertisment(Request $r)
    {
        $id = $r->id;
        $advertisment = DB::table('advertisment')->where('id', $id)->first();

        return view('admin.advertisment.edit-advertisment', ['advertisment' => $advertisment]);
    }

    // updateAdvsStatus
    public function updateAdvsStatus(Request $r)
    {
        $id = $r->id;
        $dealer = DB::table('advertisment')->where('id', $id)->first();
        $status_result = $dealer->status == 'active' ? 'upcoming' : 'active';
        DB::table('advertisment')->where('id', $id)->update(array('status' => $status_result));
        return response()->json(['result' => true]);
    }

    // deleteAdvertisment
    public function deleteAdvertisment(Request $r)
    {
        $id = $r->id;
        File::deleteDirectory(public_path('advertisment/'.$id));
        DB::table('advertisment')->where('id', $id)->delete();
    }

    // updateDealerDetails
    public function updateAdvertismentDetails()
    {


        request()->validate([
            'ad_name' => 'required',
            'status' => 'required',
            //'logo' => 'required',
        ], [
            'ad_name.required' => 'Banner Name is required',
            'status.required' => 'Status is required',
            //'logo.required' => 'Banner is required',
        ]);

        $advertismentData = array(
            'name' => request()->ad_name,
            'status' => request()->status,
            'created_at' => time(),
            'updated_at' => time(),
        );

        // id
        $id = request()->dealerID;
        // update info
        DB::table('advertisment')->where('id', '=', $id)->update($advertismentData);

        // update logo
        $logo = request()->d_image;
        if (!empty($logo)) {
            //-------- Logo Start --------
            // $logo_name = 'advertisment/' . $id . '/logo.jpg';
            // $logo = request()->d_image;
            // $img = Image::make($logo->getRealPath())->encode('jpg', 50);
            // $logo = $img->stream();
            // // store to local
            // Storage::disk('local')->put($logo_name, $logo->__toString(), 'public');
            //-------- Logo END --------
            if ($logo = request()->d_image) {

                // $file = $request->file('image') ;
                $fileName = $logo->getClientOriginalName();
                $destinationPath = public_path() . '/advertisment/' . $id . '/';
                $img =  $logo->move($destinationPath, $fileName);
                // return redirect('/uploadfile');
            }

            DB::table('advertisment')->where('id', '=', $id)->update(['logo' => 'advertisment/' . $id . '/' . $fileName,]);
        }
        return back()->with('success', 'successful');
    }
}
