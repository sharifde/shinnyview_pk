<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use JWTAuth;

class ManageController extends Controller
{

    public function allProjects(Request $request)
    {

      $query = DB::table('projects')->where('status','=',$request->status)->get();

        foreach($query as $key => $q)
        {
          $images = DB::table('project_gallery')->where('project_id','=',$q->id)->get();
          $_imgs = [];
          if($images){
            
            foreach($images as $img) {
              $g_image_name = asset($img->image);
              $_imgs[] = $g_image_name;
            }
            
          }
          $query[$key]->images = $_imgs;

          $videos = DB::table('project_videos')->where('project_id','=',$q->id)->get();
          $_vids = [];
          if($videos){
            
            foreach($videos as $vid) {
              preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $vid->video, $match);
                
              $_vids[] = $match[0];
            }
            
          }
          $query[$key]->videos = $_vids;
          
            if($q->image !=''){
                $img_name = asset($q->image);
                
                $query[$key]->image = $img_name;
            }else{
                $query[$key]->image = '';
            }
            if($q->logo !=''){
              $logo_name = asset($q->logo);
              $query[$key]->logo = $logo_name;
            }else{
                $query[$key]->logo = '';
            }
        }
        
      return response()->json(['result' => true, 'data' => $query]);

    }

    public function allAdvertisements(Request $request)
    {

      $query = DB::table('advertisment')->where('status','=',$request->status)->get();
      
      foreach($query as $key => $q){
          if($q->logo !=''){
            $logo_name = asset($q->logo);
            $query[$key]->logo = $logo_name;
          }else{
              $query[$key]->logo = '';
          }
      }

      return response()->json(['result' => true, 'data' => $query]);

    }

    public function allPrimeDealers(Request $request)
    {

      $query = DB::table('prime_dealers')->where('status','=',$request->status)->get();

      foreach($query as $key => $q){
        if($q->logo !=''){
          $logo_name = asset($q->logo);
          $query[$key]->logo = $logo_name;
        }else{
            $query[$key]->logo = '';
        }
      }
      return response()->json(['result' => true, 'data' => $query]);

    }


}
