<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SeoController extends Controller
{
    //getSeoPage
    public function getSeoPage(Request $r){
        $id = $r->id;

        $property = DB::table('properties')
        ->select('id','name','description')
        ->where('id',$id)
        ->first();

        $seo = DB::table('property_seo')->where('property_id',$id)->first();
        
        $data = array(
            'property' => $property,
            'seo' => $seo,
        );

        return view('admin.seo.seo-page',$data);
    }

    // updateSeoDetails
    public function updateSeoDetails(Request $r){
        $id = $r->id;
        $title = $r->title;
        $tags = $r->tags;
        $description = $r->description;

        $c = DB::table('property_seo')->where('property_id',$id)->count();

        $seoData = array(
            'property_id' => $id,
            'seo_title' => $title,
            'seo_description' => $description,
            'seo_keyword' => $tags,
        );

        if($c > 0){
            DB::table('property_seo')->where('property_id',$id)->update($seoData);
        } else {
            DB::table('property_seo')->insert($seoData);
        }
    }
}
