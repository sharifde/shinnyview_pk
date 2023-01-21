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

class PrimeDealerController extends Controller
{
    // getAddNewDealer
    public function getAddNewDealer()
    {

        return view('admin.prime-dealers.add-new-dealer');
    }

    // addNewDealer
    public function addNewDealer()
    {
        request()->validate([
            'd_name' => 'required',
            'd_image' => 'required|image',
            'phone_1' => 'required',
        ], [
            'd_name.required' => 'Dealer Name is required',
            'd_image.required' => 'Dealer Logo is Required',
            'phone_1.required' => 'Phone Number is required',
        ]);

        $dealerData = array(
            'name' => request()->d_name,
            'phone_1' => request()->phone_1,
            'phone_2' => request()->phone_2,
            'phone_3' => request()->phone_3,
            'status' => request()->status,
            'created_at' => time(),
            'updated_at' => time(),
        );

        $dealerID = DB::table('prime_dealers')->insertGetId($dealerData);

        if ($dealerID > 0) {

            //-------- Logo image Start --------
            $logo_name = 'prime-dealer/' . $dealerID . '/logo.jpg';
            $logo = request()->d_image;
            if ($logo = request()->d_image) {

                // $file = $request->file('image') ;
                $fileName = $logo->getClientOriginalName();
                $destinationPath = public_path() . '/prime-dealer/' . $dealerID . '/';
                $img =  $logo->move($destinationPath, $fileName);
                // return redirect('/uploadfile');
            }
            // $img = Image::make($logo->getRealPath())->encode('jpg', 50);
            // $logo = $img->stream();
            // // store to local
            // Storage::disk('local')->put($logo_name, $logo->__toString(), 'public');
            //-------- Logo image END --------

            DB::table('prime_dealers')->where('id', '=', $dealerID)->update(['logo' => 'prime-dealer/' . $dealerID . '/' . $fileName,]);
            return back()->with('success', 'successful');
        }
    }

    // admin.dealers.list
    public function getDealersList()
    {
        return view('admin.prime-dealers.dealers-list');
    }

    // dealerDetails
    public function dealerDetails(Request $request)
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

            $query = DB::table('prime_dealers')->select('id', 'name', 'logo', 'phone_1', 'phone_2', 'phone_3', 'status');

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
                width="35px" height="35px" alt="dealer logo"
            />';

                $d->phone_1 = $d->phone_1;
                $d->phone_2 = $d->phone_2;
                $d->phone_3 = $d->phone_3;

                $d->status = '<div class="form-check form-switch d-flex ps-0 align-items-center">
                <label class="form-check-label" for="userStatusrow2">OFF</label>
                <input class="form-check-input" onclick="updateStatus(' . $d->id . ')"  type="checkbox" id="userStatusrow1" ' . $status . ' >
                <label class="form-check-label" for="userStatusrow2">ON</label>
            </div>';
                $d->action = '
            <ul class="list-unstyled list-inline mb-0 action-bar">
                <li class="list-inline-item me-3">
                <a href="' . route('edit.dealer', $d->id) . '">

                    <button type="button" class="bg-transparent border-0 p-0"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                        <i class="bi bi-pencil text-secondary"></i>
                    </button>
                    </a>
                </li>
                <li class="list-inline-item me-3">
                    <button type="button" class="bg-transparent border-0 p-0"
                        data-bs-toggle="tooltip" onclick="deleteDealer(' . $d->id . ')" data-bs-placement="top" title="Delete">
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
        return view('admin.prime-dealers.dealers-list')->with('topbar', 'All Agents');
    }

    // getEditDealer
    public function getEditDealer(Request $r)
    {
        $id = $r->id;
        $dealer = DB::table('prime_dealers')->where('id', $id)->first();

        return view('admin.prime-dealers.edit-dealer', ['dealer' => $dealer]);
    }

    // updateDealerStatus
    public function updateDealerStatus(Request $r)
    {
        $id = $r->id;
        $dealer = DB::table('prime_dealers')->where('id', $id)->first();
        $status_result = $dealer->status == 'active' ? 'upcoming' : 'active';
        DB::table('prime_dealers')->where('id', $id)->update(array('status' => $status_result));
        return response()->json(['result' => true]);
    }

    // deleteDealer
    public function deleteDealer(Request $r)
    {
        $id = $r->id;
        DB::table('prime_dealers')->where('id', $id)->delete();
    }

    // updateDealerDetails
    public function updateDealerDetails()
    {
        request()->validate([
            'd_name' => 'required',
            'phone_1' => 'required',
        ], [
            'd_name.required' => 'Dealer Name is required',
            'phone_1.required' => 'Phone Number is required',
        ]);

        $dealerData = array(
            'name' => request()->d_name,
            'phone_1' => request()->phone_1,
            'phone_2' => request()->phone_2,
            'phone_3' => request()->phone_3,
            'status' => request()->status,
            'created_at' => time(),
            'updated_at' => time(),
        );

        // id
        $id = request()->dealerID;
        // update info
        DB::table('prime_dealers')->where('id', '=', $id)->update($dealerData);

        // update logo
        $logo = request()->d_image;
        if (!empty($logo)) {
            //-------- Logo Start --------
            $logo_name = 'prime-dealer/' . $id . '/logo.jpg';
            $logo = request()->d_image;
            $img = Image::make($logo->getRealPath())->encode('jpg', 50);
            $logo = $img->stream();
            // store to local
            Storage::disk('local')->put($logo_name, $logo->__toString(), 'public');
            //-------- Logo END --------

            DB::table('prime_dealers')->where('id', '=', $id)->update(['logo' => $logo_name,]);
        }
        return back()->with('success', 'successful');
    }
}
