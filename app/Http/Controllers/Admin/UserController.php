<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use App\Models\Role;
use App\Models\Plan;
use App\Models\Package_plan;
use Validator;
use Illuminate\Support\Carbon;
use Auth;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function agent(Request $request)
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
            $query = User::query();
            $query->where("role_type", 'Agent');
            $recordsTotal = $query->count();
            if (isset($search['value'])) {
                $query->where(function ($q) use ($search) {
                    $q->whereRaw(" email LIKE '%" . $search['value'] . "%'
                    OR number LIKE '%" . $search['value'] . "%'
                    OR company LIKE '%" . $search['value'] . "%'
                    ");
                });
            }
            $recordsFiltered = $query->count();
            $data = $query->orderBy($order_by, $order_dir)->skip($skip)->take($take)->get();
            foreach ($data as &$d) {
                $result_plan = Package_plan::where('id', $d->plan_id)->first();

                if ($d->image == '') {
                    $image = asset('images/testimonial/t3.png');
                } else {

                    $image = asset('images/profile_avatar/' . $d->image);
                }
                $d->package = $result_plan ? $result_plan->title : '';
                $status = $d->status == 1 ? 'checked' : '';
                $d->picture = '<img class="rounded-circle me-2" src="' . $image . '"
                width="35px" height="35px" alt="Profile Image"
            />';

                $d->status = '<div class="form-check form-switch d-flex ps-0 align-items-center">
                <label class="form-check-label" for="userStatusrow2">OFF</label>
                <input class="form-check-input" onclick="updateStatus(' . $d->id . ')"  type="checkbox" id="userStatusrow1" ' . $status . ' >
                <label class="form-check-label" for="userStatusrow2">ON</label>
            </div>';
                $d->action = '
            <ul class="list-unstyled list-inline mb-0 action-bar">
                <li class="list-inline-item me-3">
                <a href="' . route('edit.user', $d->id) . '">

                    <button type="button" class="bg-transparent border-0 p-0"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                        <i class="bi bi-pencil text-secondary"></i>
                    </button>
                    </a>
                </li>
                <li class="list-inline-item me-3">
                    <button type="button" class="bg-transparent border-0 p-0"
                        data-bs-toggle="tooltip" onclick="deleteUser(' . $d->id . ')" data-bs-placement="top" title="Delete">
                        <i class="bi bi-trash text-danger"></i>
                    </button>
                </li>
                <li class="list-inline-item">
                    <button type="button" class="bg-transparent border-0 p-0"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Show Detail">
                        <i class="bi bi-arrow-right-square text-grey"></i>
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
        return view('admin.agent')->with('topbar', 'All Agents');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function privateSeller(Request $request)
    {

        //  return  dd($request->all());
        if ($request->ajax()) {
            $role_id = request()->id;
            $_order = request('order');
            $_columns = request('columns');
            $order_by = $_columns[$_order[0]['column']]['name'];
            $order_dir = $_order[0]['dir'];
            $skip = request('start');
            $take = request('length');
            $search = request('search');
            $query = User::query();
            $query->where("role_type", 'Private Seller');
            $recordsTotal = $query->count();
            if (isset($search['value'])) {
                $query->where(function ($q) use ($search) {
                    $q->whereRaw("name LIKE '%" . $search['value'] . "%' ");
                });
            }
            $recordsFiltered = $query->count();
            $data = $query->orderBy($order_by, $order_dir)->skip($skip)->take($take)->get();
            foreach ($data as &$d) {
                // $image = asset('public/images/profile_avatar/'.$d->image);
                if ($d->image == '') {
                    $image = asset('images/testimonial/t3.png');
                } else {

                    $image = asset('images/profile_avatar/' . $d->image);
                }
                $status = $d->status == 1 ? 'checked' : '';
                $d->picture = '<img class="rounded-circle me-2" src="' . $image . '"
                width="35px" height="35px" alt="Profile Image"
            />';

                $d->status = '<div class="form-check form-switch d-flex ps-0 align-items-center">
                <label class="form-check-label" for="userStatusrow2">OFF</label>
                <input class="form-check-input" onclick="updateStatus(' . $d->id . ')"  type="checkbox" id="userStatusrow1" ' . $status . ' >
                <label class="form-check-label" for="userStatusrow2">ON</label>
            </div>';
                $d->action = '
            <ul class="list-unstyled list-inline mb-0 action-bar">
                <li class="list-inline-item me-3">
                <a href="' . route('edit.user', $d->id) . '">

                    <button type="button" class="bg-transparent border-0 p-0"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                        <i class="bi bi-pencil text-secondary"></i>
                    </button>
                    </a>
                </li>
                <li class="list-inline-item me-3">
                    <button type="button" class="bg-transparent border-0 p-0"
                        data-bs-toggle="tooltip" onclick="deleteUser(' . $d->id . ')" data-bs-placement="top" title="Delete">
                        <i class="bi bi-trash text-danger"></i>
                    </button>
                </li>
                <li class="list-inline-item">
                    <button type="button" class="bg-transparent border-0 p-0"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Show Detail">
                        <i class="bi bi-arrow-right-square text-grey"></i>
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
        return view('admin.private_seller')->with('topbar', 'All Private Sellers');
    }

    public function edit($id)
    {
        $data['user'] = User::find($id);
        $data['role'] = Role::get();
        $data['plan'] = DB::table('package_plan')->where('status', 'active')->get();
        if ($data['user']->role_id == 2  &&  $data['user']->role_type == 'Private Seller') {
            // return  dd('if');
            return view('admin.edit_seller_user', $data);
        } else {
            // return  dd('else');
            return view('admin.edit_agent_user', $data);
        }
    }

    // add Agent
    public function addAgent()
    {
        // $data['user'] = User::find($id);
        $data['role'] = Role::get();
        $data['package'] = DB::table('package_plan')->where('status', 'active')->get();
        // return dd( $data);

        return view('admin.add_agent', $data);
    }
    // addNewAgent
    public function addNewAgent(Request $request)
    {
        // return dd( $request->all());
        $rules = [
            'full_name' => 'required|max:25',
            'email' => 'unique:users,email,' . $request->user_id,
            'phone' => 'required',
            'plan' => 'required',
            'company' => 'required',
            'company_phone' => 'required',
            'password' => 'sometimes:min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'sometimes:min:6',
        ];
        //  return dd($rules);
        $input = $request->all();
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return  redirect()->back()->withErrors($validator);
        }

        $today = new \Carbon\Carbon(Carbon::now());

        // $user = User::findOrFail($request->user_id);
        $user = new User();
        $user->name = $request->full_name;
        $user->email = $request->email;
        $user->city = $request->city;
        $user->number = $request->phone;
        $user->address = $request->address;
        $user->company = $request->company;
        $user->company_phone_number = $request->company_phone;
        $user->role_id = 2;
        // $user->image = 'default_profile.jpeg';
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
            $user->confirm_password = $request->password;
        }

        if (!empty($request->plan) && $request->plan != 'none') {
            //$plan = Plan::find($request->plan);
            $plan = DB::table('package_plan')->where('status', 'active')->where('id', $request->plan)->first();
            $user->plan_id = $request->plan; //$plan->id;
            $user->ads = $plan->property;
            $user->plan_expired_date = $today->addDays($plan->days);
            $user->role_type = 'Agent';
        }
        if ($request->plan == 'none') {
            $user->plan_id = 0;
            $user->ads = 0;
            $user->plan_expired_date = Null;
        }

        $user->save();
        return  redirect()->back()->with('message', 'New Profile Successfully Added');
    }


    public function updatePrivateSeller(Request $request)
    {

        $rules = [
            'full_name' => 'required|max:25',
            'email' => 'unique:users,email,' . $request->user_id,
            'password' => 'sometimes:min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'sometimes:min:6',
        ];
        $input = $request->all();

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return  redirect()->back()->withErrors($validator);
        }
        if ($file = $request->file('photo')) {
            $name = time() . preg_replace('/\s+/', '', $file->getClientOriginalName());
            $file->move('images/profile_avatar/', $name);

            $photo_name = $name;
        } else {
            $photo_name = $request->photo_name;
        }
        $today = new \Carbon\Carbon(Carbon::now());
        $user = User::findOrFail($request->user_id);
        $user->name = $request->full_name;
        $user->email = $request->email;
        $user->role_id = 2;
        $user->image = $photo_name;
        // $user->city = $request->city;
        // $user->address = $request->address;

        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
        if (!empty($request->plan)) {
            $plan = Package_plan::find($request->plan);
            $user->plan_id = $plan->id;
            $user->ads =  $plan->property;
            $user->plan_expired_date = $today->addDays($plan->days);
        }
        $user->save();
        return  redirect()->back()->with('message', 'Your Profile has been updated successfully');
    }
    public function updateAgent(Request $request)
    {

        $rules = [
            'full_name' => 'required|max:25',
            'email' => 'unique:users,email,' . $request->user_id,
            'password' => 'sometimes:min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'sometimes:min:6',
            'company' => 'required'
        ];
        $input = $request->all();
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return  redirect()->back()->withErrors($validator);
        }
        if ($file = $request->file('photo')) {
            $name = time() . preg_replace('/\s+/', '', $file->getClientOriginalName());
            $file->move(public_path('/images/profile_avatar'), $name);

            $photo_name = $name;
        } else {
            $photo_name = $request->photo_name;
        }
        $today = new \Carbon\Carbon(Carbon::now());

        $user = User::findOrFail($request->user_id);

        $user->name = $request->full_name;
        $user->email = $request->email;
        $user->city = $request->city;
        $user->company = $request->company;
        $user->address = $request->address;
        if ($request->role == 3) {
            $user->role_id = 2;
        } else {
            $user->role_id =$request->role;
        }
        $user->company_phone_number = $request->company_phone_number;
        $user->image = $photo_name;
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
            $user->confirm_password = $request->password;
        }
        if (!empty($request->plan) && $request->plan != 'none') {
            //$plan = Plan::find($request->plan);
            $plan = DB::table('package_plan')->where('status', 'active')->where('id', $request->plan)->first();
            $user->plan_id = $request->plan;
            $user->ads = $plan->property; //$plan->ads;
            $user->plan_expired_date = $today->addDays($plan->days);
        }
        if ($request->plan == 'none') {
            $user->plan_id = 0;
            $user->ads = 0;
            $user->plan_expired_date = Null;
        }

        $user->save();
        return  redirect()->back()->with('message', 'Your Profile has been updated successfully');
    }
    public function updateStatus(Request $request)
    {
        $user_id = $request->id;
        $result = User::where('id', $user_id)->first();
        $status_result = $result->status == 1 ? '0' : '1';
        User::where('id', $user_id)->update(array('status' => $status_result));
        return response()->json(['result' => true]);
    }
    public function destory(Request $request)
    {
        $user_id = $request->id;
        User::where('id', $user_id)->delete();
        return response()->json(['result' => true]);
    }

    // get change password
    public function getChangePassword()
    {
        return view('admin.change-password');
    }

    // update password
    public function updatePassword()
    {
        $id = Auth::user()->id;

        request()->validate([
            'password' => 'required',
            'new_password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        ], [
            'password.required' => 'Current Password is Required',
            'new_password.required' => 'New Password is Required',
        ]);

        $existing_password = DB::table('users')->where('id', $id)->select('confirm_password')->first();

        if (request()->password == $existing_password->confirm_password) {
            $new_password = bcrypt(request()->new_password);

            $updateData = array(
                'password' => $new_password,
                'confirm_password' => request()->new_password
            );
            DB::table('users')
                ->where('id', $id)
                ->update($updateData);

            return back()->with('success', 'Password Successfully Updated.');
        } else {
            return back()->with('unsuccess', 'Existing Password Not Matched.');
        }
    }
}
