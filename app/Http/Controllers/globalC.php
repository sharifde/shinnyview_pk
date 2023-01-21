<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class globalC extends Controller
{
    // parse to array
    public static function parseToArray($string) {
        $string = str_replace('"','', $string);
        $string = str_replace("[", "", $string);
        $string = str_replace("]", "", $string);
        return explode(',', $string);
    }

    // get post image
    public static function getPostImage($postid) {
        $postmeta = DB::connection('mysql_blog')->table('sb_postmeta')->select('meta_value')
        ->where('meta_key','_thumbnail_id')->where('post_id', $postid)
        ->orderby('meta_id', 'desc')->first();
        $post = DB::connection('mysql_blog')->table('sb_posts')->select('guid')->where('ID', $postmeta->meta_value)->first();
        return $post->guid;
    }

    // count gallery
    public static function countGallery($id){
        return DB::table('galleries')->where('property_id',$id)->count();
    }


    // get project floors
    public static function getProjectFloors($id) {
        $plans = DB::table('project_floor as pf')
        ->join('floor_plan as fp','pf.floor_id','=','fp.id')
        ->where('pf.floor_id',$id)
        ->select('pf.image','pf.size','pf.price','fp.name')
        ->get();

        return view('frontend.projects.components.floor-plan', ['plans' => $plans]);
    }

}
