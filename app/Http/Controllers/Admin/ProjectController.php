<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Filesystem\Filesystem;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Cache;
use DB;
use Redirect;

class ProjectController extends Controller
{
    //get new project
    public function getAddNewProject()
    {
        $cities = DB::table('cities')->select('id', 'name')->get();

        $data = array(
            'cities' => $cities,
        );

        return view('admin.projects.add-new-project', $data);
    }

    // addNewProject
    public function addNewProject()
    {
        request()->validate([
            'p_name' => 'required',
            'd_name' => 'required',
            'city' => 'required',
            'min_price' => 'required',
            'max_price' => 'required',
            'status' => 'required',
            'overview' => 'required',
            'p_image' => 'required|image',
            'd_image' => 'required|image',
        ], [
            'p_name.required' => 'Project Name is required',
            'd_name.required' => 'Developer Name is required',
            'city.required' => 'City is required',
            'min_price.required' => 'Min Price is required',
            'max_price.required' => 'Max Price is required',
            'status.required' => 'Status is required',
            'Overview.required' => 'Overview is required',
            'p_image.required' => 'Project Image is Required',
            'd_image.required' => 'Developer Logo is Required',
        ]);

        $projectData = array(
            'name' => request()->p_name,
            'developer_name' => request()->d_name,
            // 'image' => $file_name,
            'city_id' => request()->city,
            'overview' => request()->overview,
            'min_price' => request()->min_price,
            'max_price' => request()->max_price,
            'views' => 0,
            'status' => request()->status,
            'created_at' => time(),
            'updated_at' => time(),
        );

        $projectID = DB::table('projects')->insertGetId($projectData);

        if ($projectID > 0) {
            //-------- project image Start --------
            $file_name = 'project/' . $projectID . '/project-image.jpg';
            $file = request()->p_image;
            if ($file = request()->p_image) {

                // $file = $request->file('image') ;
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path() . '/project/' . $projectID . '/';
                $img =  $file->move($destinationPath, $fileName);
                // return redirect('/uploadfile');
            }
            if ($file = request()->d_image) {

                // $file = $request->file('image') ;
                $d_name = $file->getClientOriginalName();
                $d_destinations = public_path() . '/project/' . $projectID . '/';
                $d_img =  $file->move($d_destinations, $d_name);
                // return redirect('/uploadfile');
            }
            $file = request()->p_image->move(public_path('project/' . $projectID . '/project-image.jpg'));
            $img = Image::make($file->getRealPath())->encode('jpg', 50);
            insert watermark
            $watermark = Image::make(public_path('/images/webtop.png'));


            $img->resize(1000, null, function ($c) {
                $c->aspectRatio();
            });
            $img->insert($watermark, 'center', 5, 5);
            $image = $img->stream();
            store to local
            Storage::disk('local')->put($file_name, $image->__toString(), 'public');
            //-------- project image END --------

            //-------- Logo image Start --------
            // $logo_name = 'project/' . $projectID . '/developer-logo.jpg';
            // $logo = request()->d_image;
            // $img = Image::make($logo->getRealPath())->encode('jpg', 50);
            // // insert watermark
            // $watermark = Image::make(public_path('/images/webtop.png'));
            // $img->resize(100, null, function ($c) { $c->aspectRatio(); });
            // $img->insert($watermark, 'center', 5, 5);
            // $logo = $img->stream();
            // // store to local
            // Storage::disk('local')->put($logo_name, $logo->__toString(), 'public');
            //-------- Logo image END --------


            $projectImages = array(
                'image' => 'project/' . $projectID . '/' . $fileName,
                'logo' => 'project/' . $projectID . '/' . $d_name,
            );

            DB::table('projects')->where('id', '=', $projectID)->update($projectImages);
            return back()->with('success', 'successful');
        }
    }
    // getProjectsList
    public function getProjectsList()
    {
        return view('admin.projects.projects-list');
    }

    // projectDetails
    public function projectDetails(Request $request)
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

            $query = DB::table('projects')->select('id', 'name', 'logo', 'min_price', 'max_price', 'views', 'status');

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
                $d->picture = '<img class="rounded-circle me-2" src="' . $image . '"
                width="35px" height="35px" alt="Profile Image"
            />';

                $d->views = $d->views;
                $d->min_price = $d->min_price;
                $d->max_price = $d->max_price;

                $d->status = '<div class="form-check form-switch d-flex ps-0 align-items-center">
                <label class="form-check-label" for="userStatusrow2">OFF</label>
                <input class="form-check-input" onclick="updateStatus(' . $d->id . ')"  type="checkbox" id="userStatusrow1" ' . $status . ' >
                <label class="form-check-label" for="userStatusrow2">ON</label>
            </div>';
                $d->action = '
            <ul class="list-unstyled list-inline mb-0 action-bar">
                <li class="list-inline-item me-3">
                <a href="' . route('edit.project', $d->id) . '">

                    <button type="button" class="bg-transparent border-0 p-0"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                        <i class="bi bi-pencil text-secondary"></i>
                    </button>
                    </a>
                </li>
                <li class="list-inline-item me-3">
                    <button type="button" class="bg-transparent border-0 p-0"
                        data-bs-toggle="tooltip" onclick="deleteProject(' . $d->id . ')" data-bs-placement="top" title="Delete">
                        <i class="bi bi-trash text-danger"></i>
                    </button>
                </li>
                <li class="list-inline-item">
                    <a href="' . route('project-single', $d->id) . '" target="_blank">
                        <button type="button" class="bg-transparent border-0 p-0"
                            data-bs-toggle="tooltip" onclick="editProject(' . $d->id . ')" data-bs-placement="top" title="Show Detail">
                            <i class="bi bi-arrow-right-square text-grey"></i>
                        </button>
                    </a>
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
        return view('admin.projects.projects-list')->with('topbar', 'All Agents');
    }

    // updateProjectStatus
    public function updateProjectStatus(Request $r)
    {
        $id = $r->id;
        $projects = DB::table('projects')->where('id', $id)->first();
        $status_result = $projects->status == 'active' ? 'upcoming' : 'active';
        DB::table('projects')->where('id', $id)->update(array('status' => $status_result));
        return response()->json(['result' => true]);
    }

    // getEditProject
    public function getEditProject(Request $r)
    {
        $id = $r->id;

        $project = DB::table('projects as p')
            ->join('cities as c', 'p.city_id', '=', 'c.id')
            ->where('p.id', $id)
            ->select('p.id as projectID', 'p.name as projectName', 'p.developer_name', 'logo as projectLogo', 'p.image as projectImage', 'p.overview', 'p.min_price', 'p.max_price', 'p.status', 'c.id as cityID', 'c.name as cityName')
            ->first();

        // cities
        $cities = DB::table('cities')->select('id', 'name')->get();

        // project gallery
        $gallery = DB::table('project_gallery as pg')
            ->join('projects as p', 'pg.project_id', '=', 'p.id')
            ->where('p.id', $id)
            ->select('pg.image as galleryImage')
            ->get();

        // features
        $features = DB::table('features')->select('id', 'name')->get();

        // project features
        $project_features = DB::table('project_features')->where('project_id', $id)->select('feature_id')->get();

        // floor plan
        $floor_plan = DB::table('floor_plan')->select('id', 'name')->get();

        // gallery images
        $project_gallery = DB::table('project_gallery')->where('project_id', $id)->get();

        // project floor plan
        $project_floor_plan = DB::table('project_floor as pf')
            ->leftJoin('floor_plan as f', 'pf.floor_id', '=', 'f.id')
            ->where('pf.project_id', $id)
            ->select('pf.id', 'pf.image', 'pf.size', 'pf.price', 'f.name')
            ->get();

        // payment plan
        $payment_plan = DB::table('project_payment_plan')->where('project_id', $id)->get();

        // project video
        $project_videos = DB::table('project_videos')->where('project_id', $id)->get();


        $data = array(
            'project' => $project,
            'cities' => $cities,
            'features' => $features,
            'pf' => $project_features,
            'floor_plan' => $floor_plan,
            'gallery' => $gallery,
            'project_gallery' => $project_gallery,
            'project_floor_plan' => $project_floor_plan,
            'payment_plan' => $payment_plan,
            'project_videos' => $project_videos,
        );

        return view('admin.projects.edit-project', $data);
    }

    // updateProjectBasics
    public function updateProjectBasics()
    {
        request()->validate([
            'p_name' => 'required',
            'd_name' => 'required',
            'city' => 'required',
            'min_price' => 'required',
            'max_price' => 'required',
            'status' => 'required',
            'overview' => 'required',
        ], [
            'p_name.required' => 'Project Name is required',
            'd_name.required' => 'Developer Name is required',
            'city.required' => 'City is required',
            'min_price.required' => 'Min Price is required',
            'max_price.required' => 'Max Price is required',
            'status.required' => 'Status is required',
            'Overview.required' => 'Overview is required',
        ]);

        $projectData = array(
            'name' => request()->p_name,
            'developer_name' => request()->d_name,
            'city_id' => request()->city,
            'overview' => request()->overview,
            'min_price' => request()->min_price,
            'max_price' => request()->max_price,
            'status' => request()->status,
            'updated_at' => time(),
        );

        // id
        $id = request()->projectID;
        // update info
        DB::table('projects')->where('id', '=', $id)->update($projectData);

        // update project main image
        $file = request()->p_image;
        if (!empty($file)) {
            //-------- project image Start --------
            // $file_name = 'project/' . $id . '/project-image.jpg';
            // $img = Image::make($file->getRealPath())->encode('jpg', 50);
            // // insert watermark
            // $watermark = Image::make(public_path('/images/webtop.png'));
            // $img->resize(1000, null, function ($c) {
            //     $c->aspectRatio();
            // });
            // $img->insert($watermark, 'center', 5, 5);
            // $image = $img->stream();
            // // store to local
            // Storage::disk('local')->put($file_name, $image->__toString(), 'public');
            // //-------- project image END --------
            if ($file = request()->p_image) {

                // $file = $request->file('image') ;

                $fileName = $file->getClientOriginalName();

                $destinationPath =  public_path() . '/project/' . $id . '/';
                $img =  $file->move($destinationPath, $fileName);
                // return redirect('/uploadfile');
            }
            $projectImage = array(
                'image' => 'project' . '/' . $id . '/' . $fileName,
            );

            DB::table('projects')->where('id', '=', $id)->update($projectImage);
            // return back()->with('success', 'successful');
        }
        // update logo
        $logo = request()->d_image;
        if (!empty($logo)) {
            //-------- Logo image Start --------
            // $logo_name = 'project/' . $id . '/developer-logo.jpg';
            // $img = Image::make($logo->getRealPath())->encode('jpg', 50);
            // $logo = $img->stream();
            // // store to local
            // Storage::disk('local')->put($logo_name, $logo->__toString(), 'public');
            // //-------- Logo image END --------
            if ($file = request()->d_image) {

                // $file = $request->file('image') ;
                $d_name = $logo->getClientOriginalName();
                $d_destinations = public_path() . '/project/' . $id . '/';
                $d_img =  $logo->move($d_destinations, $d_name);
                // return redirect('/uploadfile');
            }
            $projectLogo = array(
                'logo' => 'project/' . $id . '/' . $d_name,
            );

            DB::table('projects')->where('id', '=', $id)->update($projectLogo);
        }
        return back()->with('success', 'successful');
    }

    // updateProjectImages
    public function updateProjectImages()
    {
        request()->validate([
            'gallery_image' => 'required',
        ], [
            'gallery_image.required' => 'Images is required',
        ]);

        // id
        $id = request()->projectID;

        $gallery = request()->file('gallery_image');
        if ($gallery) {
            foreach ($gallery as $images) {
                // random id
                $digits = 5;
                $random = rand(pow(10, $digits - 1), pow(10, $digits) - 1);

                $file_name = 'project/' . $id . '/gallery/image-' . $random . '.jpeg';
                $size = $images->getSize();
                $ip = $images->move(public_path('project/' . $id . '/gallery'), $file_name);
                $img = Image::make($ip);
                // insert watermark
                $watermark = Image::make(public_path('/images/webtop.png'));
                $img->resize(800, null, function ($c) {
                    $c->aspectRatio();
                });
                $img->insert($watermark, 'center', 5, 5);
                $image = $img->stream();
                // store to local
                Storage::disk('local')->put($file_name, $image->__toString(), 'public');

                $imageData = array(
                    'project_id' => $id,
                    'image' => $file_name,
                    'size' => $size,
                    'created_at' => time(),
                    'updated_at' => time(),
                );
                DB::table('project_gallery')->insert($imageData);
            }
            return back()->with('success', 'successful');
        }
    }

    // updateProjectFeatures
    public function updateProjectFeatures(Request $r)
    {
        // id
        $id = request()->projectID;

        // remove existing features
        DB::table('project_features')->where('project_id', $id)->delete();

        // add current features
        foreach ($r->project_feature as $feature) {
            $data = array(
                'project_id' => $id,
                'feature_id' => $feature,
                'status' => 'active',
                'created_at' => time(),
                'updated_at' => time(),
            );
            DB::table('project_features')->insert($data);
        }

        return back()->with('success', 'successful');
    }

    // addFloorPlan
    public function addFloorPlan()
    {
        // id
        $id = request()->projectID;

        request()->validate([
            'floor_type' => 'required',
            'floor_size' => 'required',
            'price_range' => 'required',
            'floor_image' => 'required',
        ], [
            'floor_type.required' => 'Floor Type is required',
            'floor_size.required' => 'Floor Size is required',
            'price_range.required' => 'Price Range is required',
            'floor_image.required' => 'Floor Image is required',
        ]);

        // random id
        // $digits = 5;
        // $random = rand(pow(10, $digits - 1), pow(10, $digits) - 1);

        //-------- floot plan image Start --------
        // $file_name = 'project/' . $id . '/floor-plan/image-' . $random . '.jpg';
        // $file = request()->floor_image;
        if ($file = request()->floor_image) {

            // $file = $request->file('image') ;
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/project/' . $id . '/';
            $img =  $file->move($destinationPath, $fileName);
            // return redirect('/uploadfile');
        }
        // $img = Image::make($file->getRealPath())->encode('jpg', 50);
        // insert watermark
        // $watermark = Image::make(public_path('/images/webtop.png'));
        // $img->resize(1000, null, function ($c) {
        //     $c->aspectRatio();
        // });
        // $img->insert($watermark, 'center', 5, 5);
        // $image = $img->stream();
        // // store to local
        // Storage::disk('local')->put($file_name, $image->__toString(), 'public');
        //-------- floot plan image END --------


        $data = array(
            'project_id' => $id,
            'image' => 'project/' . $id . '/' . $fileName,
            'floor_id' => request()->floor_type,
            'size' => request()->floor_size,
            'price' => request()->price_range,
            'created_at' => time(),
            'updated_at' => time(),
        );

        DB::table('project_floor')->insert($data);

        return back()->with('success', 'successful');
    }

    // addPaymentPlan
    public function addPaymentPlan()
    {
        // id
        $id = request()->projectID;

        request()->validate([
            'payment_title' => 'required',
            'payment_range' => 'required',
            'payment_image' => 'required',
        ], [
            'payment_title.required' => 'Payment Title is required',
            'payment_range.required' => 'Payment Range is required',
            'payment_image.required' => 'Payment Image is required',
        ]);

        // random id
        // $digits = 5;
        // $random = rand(pow(10, $digits - 1), pow(10, $digits) - 1);

        //-------- floot plan image Start --------
        // $file_name = 'project/' . $id . '/payment-plan/image-' . $random . '.jpg';
        $file = request()->payment_image;
        // $img = Image::make($file->getRealPath())->encode('jpg', 50);
        // // insert watermark
        // $watermark = Image::make(public_path('/images/webtop.png'));
        // $img->resize(1000, null, function ($c) {
        //     $c->aspectRatio();
        // });
        // $img->insert($watermark, 'center', 5, 5);
        // $image = $img->stream();
        // // store to local
        // Storage::disk('local')->put($file_name, $image->__toString(), 'public');
        //-------- floot plan image END --------
        
        if ($file=request()->payment_image) {

            // $file = $request->file('image') ;
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/project/' . $id . '/';
            $img =  $file->move($destinationPath, $fileName);
            // return redirect('/uploadfile');
        }

        $data = array(
            'project_id' => $id,
            'image' =>  $fileName,
            'title' => request()->payment_title,
            'price' => request()->payment_range,
            'status' => 'active',
            'created_at' => time(),
            'updated_at' => time(),
        );

        DB::table('project_payment_plan')->insert($data);

        return back()->with('success', 'successful');
    }

    // delete gallery image
    public function deleteGalleryImage(Request $r)
    {
        $id = $r->id;
        DB::table('project_gallery')->where('id', $id)->delete();
    }

    // addNewFeature
    public function addNewFeature(Request $r)
    {
        $feature = $r->feature;

        $data = array(
            'name' => $feature,
            'status' => 'active',
            'created_at' => time(),
            'updated_at' => time(),
        );

        DB::table('features')->insert($data);
        return 'success';
    }

    // deleteFeature
    public function deleteFeature(Request $r)
    {
        $id = $r->id;
        DB::table('features')->where('id', $id)->delete();
    }

    // addNewFloor
    public function addNewFloor(Request $r)
    {
        $floor = $r->floor;

        $data = array(
            'name' => $floor,
            'created_at' => time(),
            'updated_at' => time(),
        );

        DB::table('floor_plan')->insert($data);
        return 'success';
    }

    // deleteProjectFloor
    public function deleteProjectFloor(Request $r)
    {
        $id = $r->id;
        DB::table('project_floor')->where('id', $id)->delete();
    }

    // deleteProjectPaymentPlan
    public function deleteProjectPaymentPlan(Request $r)
    {
        $id = $r->id;
        DB::table('project_payment_plan')->where('id', $id)->delete();
    }

    // deleteEntireProject
    public function deleteEntireProject(Request $r)
    {
        $id = $r->id;
        // payment plan
        // return  dd($ee);
        File::deleteDirectory(public_path('project/' . $id));
        DB::table('project_payment_plan')->where('project_id', $id)->delete();
        // floor plan
        DB::table('project_floor')->where('project_id', $id)->delete();
        // gallery
        DB::table('project_gallery')->where('project_id', $id)->delete();
        // features
        DB::table('project_features')->where('project_id', $id)->delete();
        // video
        DB::table('project_videos')->where('project_id', $id)->delete();
        // project
        DB::table('projects')->where('id', $id)->delete();
    }

    // updateProjectVideo
    public function updateProjectVideo()
    {
        request()->validate([
            'video_title' => 'required',
            'video_iframe' => 'required',
        ], [
            'video_title.required' => 'Video Title is required',
            'video_iframe.required' => 'Video iframe is required',
        ]);

        $projectData = array(
            'project_id' => request()->projectID,
            'title' => request()->video_title,
            'video' => request()->video_iframe,
            'created_at' => time(),
            'updated_at' => time(),
        );

        DB::table('project_videos')->insert($projectData);
        return back()->with('success', 'successful');
    }

    // deleteProjectVideo
    public function deleteProjectVideo(Request $r)
    {
        $id = $r->id;
        DB::table('project_videos')->where('id', $id)->delete();
    }
}
