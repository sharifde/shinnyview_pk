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

class ProjectsController extends Controller
{
    // get projects
    public function getProjects(){

        $active_projects = DB::table('projects as p')
        ->join('cities as c','p.city_id','c.id')
        ->where('p.status','active')
        ->select('p.id','p.name','p.developer_name','p.logo','p.image','c.name as cityName','p.overview','p.min_price','p.max_price')
        ->Paginate(8);

        $upcoming_projects = DB::table('projects as p')
        ->join('cities as c','p.city_id','c.id')
        ->where('p.status','upcoming')
        ->select('p.id','p.name','p.developer_name','p.logo','p.image','c.name as cityName','p.overview','p.min_price','p.max_price')
        ->Paginate(8);

        $data = array(
            'active_projects' => $active_projects,
            'upcoming_projects' => $upcoming_projects,
        );

        return view('frontend.projects.projects',$data);
    }

    //getActiveProjects
    public function getActiveProjects(){

        $projects = DB::table('projects as p')
        ->join('cities as c','p.city_id','c.id')
        ->where('p.status','active')
        ->select('p.id','p.name','p.developer_name','p.logo','p.image','c.name as cityName','p.overview','p.min_price','p.max_price')
        ->get();

        $data = array(
            'projects' => $projects,
        );

        return view('frontend.projects.active-projects',$data);
    }

    // getProjectSingle
    public function getProjectSingle(Request $r){
        $id = $r->id;

        // project
        $p = DB::table('projects as p')
        ->join('cities as c','p.city_id','c.id')
        ->where('p.id',$id)
        ->where('p.status','active')
        ->select('p.id','p.name','p.developer_name','p.logo','p.image','c.name as cityName','p.overview','p.min_price','p.max_price')
        ->first();

        // recent projects
        $recent_projects = DB::table('projects as p')
        ->join('cities as c','p.city_id','c.id')
        ->where('p.status','active')
        ->where('p.id', '!=', $id)
        ->select('p.id','p.name','p.image','c.name as cityName','p.min_price','p.max_price')
        ->offset(0)
        ->limit(2)
        ->inRandomOrder()
        ->get();
        
        // floors
        $floors = DB::table('floor_plan as fp')
        ->leftjoin('project_floor as pf','pf.floor_id','fp.id')
        ->where('pf.project_id',$id)
        ->select('fp.id', 'fp.name')
        ->distinct()
        ->get();

        // view increment
        DB::table('projects')->where('id',$id)->increment('views',1);

        // gallery
        $gallery = DB::table('project_gallery')
        ->where('project_id',$id)
        ->select('image')
        ->get();

        // project features
        $features = DB::table('project_features as pf')
        ->join('features as f','pf.feature_id','=','f.id')
        ->where('pf.project_id',$id)
        ->select('f.name')
        ->get();

        // project payment plan
        $payment_plan = DB::table('project_payment_plan')->where('project_id',$id)->select('image','title','price')->get();

        // recent properties
        $recent_properties = DB::table('properties as p')
        ->join('cities as c','p.city_id','=','c.id')
        ->join('property_purpose as pp','p.purpose_id','pp.id')
        ->join('property_type as pt','p.property_type_id','pt.id')
        ->select('p.id','p.name','p.slug','p.image','p.price','c.name as city','pt.name as propertyType','pp.name as purpose')
        ->inRandomOrder()
        ->offset(0)
        ->limit(2)
        ->get();

        // project video
        $project_video = DB::table('project_videos')->where('project_id',$id)->get();
        
        return view('frontend.projects.project-single', ['p' => $p, 'floors' => $floors, 'gallery' => $gallery, 'features' => $features, 'payment_plan' => $payment_plan, 'recent_projects' => $recent_projects, 'recent_properties' => $recent_properties, 'project_video' => $project_video]);
    }

    // getUpcomingProjects
    public function getUpcomingProjects(){

        $projects = DB::table('projects as p')
        ->join('cities as c','p.city_id','c.id')
        ->where('p.status','upcoming')
        ->select('p.id','p.name','p.developer_name','p.logo','p.image','c.name as cityName','p.overview','p.min_price','p.max_price')
        ->get();

        $data = array(
            'projects' => $projects,
        );

        return view('frontend.projects.upcoming-projects',$data);
    }


}
