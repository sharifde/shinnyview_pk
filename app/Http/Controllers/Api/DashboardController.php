<?php
namespace App\Http\Controllers\Agent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['total_sale_property'] = Property::where('property_type_id',1)->where('user_id',Auth::user()->id)->count();
        $data['total_rent_property'] = Property::where('property_type_id',2)->where('user_id',Auth::user()->id)->count();
        $data['total_lease_property'] = Property::where('property_type_id',3)->where('user_id',Auth::user()->id)->count();
        return view('agent.dashboard',$data);
    }

    public function add_property() {

        return view('agent.add_property');

    }
    public function profile() {
        $data['agent_user'] =  Auth::user();
        return view('agent.edit_agent',$data);

    }
    public function profileUpdate(Request $request)
    {
        $user = Auth::user();
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password){
            $this->validate($request,[
                'password' => 'min:6|confirmed',
            ]);
            $user->password = bcrypt($request->password);
        }

        // if($request->hasFile('profileImg')){

        //     $this->validate($request,[
        //         'profileImg' =>  'mimes:png',
        //     ]);
        //     $profileImg = $request->file('profileImg');
        //     $uploadProfilename = time() . '.' . $profileImg->getClientOriginalExtension();
        //     Image::make($profileImg)->resize(300, 300)->save( public_path('/uploads/uploads/' . $uploadProfilename ) );
        //     $user->profileImg = $uploadProfilename;
        // }

        $user->save();
        return redirect()->route('profile')->with('success', 'User data updated successfully');
    }

}
