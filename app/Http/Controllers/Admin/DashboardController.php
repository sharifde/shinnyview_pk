<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use DB;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['total_sale_property'] = Property::where('property_type_id',1)->count();
        $data['total_rent_property'] = Property::where('property_type_id',2)->count();
        $data['total_lease_property'] = Property::where('property_type_id',3)->count();
        $data['total_active_projects'] = DB::table('projects')->where('status','active')->count();
        $data['total_upcoming_projects'] = DB::table('projects')->where('status','upcoming')->count();
        $data['total_active_dealers'] = DB::table('prime_dealers')->where('status','active')->count();
        $data['total_inactive_dealers'] = DB::table('prime_dealers')->where('status','inactive')->count();
        return view('admin.dashboard',$data)->with('topbar', 'Dashboard');

    }


}
