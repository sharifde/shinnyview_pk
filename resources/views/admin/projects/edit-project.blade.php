@extends('admin.layout')
@section('content')

    <div class="py-4">
        <div class="edit-project add-new-project bg-white card-body-content">
            <div class="search-form-header bg-theme-dark">
                <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Edit Project
                    <span class="txb-color">Basic Details</span>
                </h5>
            </div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <div class="alert-heading">Please correct error(s) and try again.</div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <div class="alert-heading">Successful.</div>
                    <p>Project Successfully Added.</p>
                </div>
            @endif
            {{-- project-basic details --}}
            <div class="form-main-wrap px-5 py-4">
                <form class="form" action="{{ route('update.project.basic') }}" method="POST" id=""
                    enctype="multipart/form-data" class="w-100 mt-5 form-steps-main" id="form">
                    {{ csrf_field() }}
                    <input type="hidden" name="projectID" value="{{ $project->projectID }}">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Project Name
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" id="" name="p_name"
                                        value="{{ $project->projectName }}" />
                                    @error('p_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Project Main Image
                                </label>
                                <div class="position-relative">
                                </div>
                                <div class="position-relative">
                                    <input type="file" data-index="0" class="img-preview-upload form-control"
                                        name="p_image" accept="image  " />
                                    <div class="output-img d-flex flex-wrap border mt-2 pt-2 px-2">
                                        {{-- <input type="hidden" value="{{$project->projectImage}}" name="p_image" />
                                    <input type="hidden" value="" name="p_image" /> --}}
                                        <div class="me-2 mb-2 position-relative view-added-image">
                                            <span data-index="0" class="remove-btn-img position-absolute rounded-circle"
                                                type="button"><i class="bi bi-x-circle-fill"></i></span>
                                            <img width="70" height="70" src="{{ asset($project->projectImage) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Developer Name
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" id="" name="d_name"
                                        value="{{ $project->developer_name }}" />
                                    @error('d_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Developer Logo
                                </label>
                                <div class="position-relative">
                                    <input type="file" data-index="1" class="img-preview-upload form-control"
                                        name="d_image" accept="image  " />
                                    <div class="output-img d-flex flex-wrap border mt-2 pt-2 px-2">
                                        {{-- <input type="hidden" value="{{$project->projectLogo}}" name="d_image" />
                                    <input type="hidden" value="" name="d_image" /> --}}
                                        <div class="me-2 mb-2 position-relative view-added-image">
                                            <span data-index="1" class="remove-btn-img position-absolute rounded-circle"
                                                type="button"><i class="bi bi-x-circle-fill"></i></span>
                                            <img width="70" height="70" src="{{ asset($project->projectLogo) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    City
                                </label>
                                <div class="position-relative">
                                    <select id="" class="w-100" name="city">
                                        <option value="">Select City</option>
                                        @foreach ($cities as $c)
                                            <option value="{{ $c->id }}"
                                                @if ($project->cityID == $c->id) selected @endif>{{ $c->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Min Price
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" name="min_price"
                                        value="{{ $project->min_price }}">
                                    @error('min_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Max Price
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" name="max_price"
                                        value="{{ $project->max_price }}">
                                    @error('max_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Status
                                </label>
                                <div class="position-relative">
                                    <select name="status" id="" class="w-100">
                                        <option value="active" @if ($project->status == 'active') selected @endif>Active
                                        </option>
                                        <option value="upcoming" @if ($project->status == 'upcoming') selected @endif>Upcoming
                                        </option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-6 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Overview
                                </label>
                                <div class="position-relative">
                                    <textarea class="w-100 d-block" name="overview" cols="4" rows="6" value="{{ old('overview') }}">{{ $project->overview }}</textarea>
                                    @error('overview')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3 mt-4">
                            <div class="ms-auto form-submit-btn">
                                <button type="submit" class="border-0 f-medium rounded-btn px-3 py-2 bg-theme text-white"
                                    onclick="" style="width: 200px !important;">
                                    Update Basic Details
                                </button>
                            </div>
                        </div>


                    </div>

                </form>
            </div>


            {{-- project videos --}}
            <div class="search-form-header bg-theme-dark">
                <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Project
                    <span class="txb-color">Videos</span>
                </h5>
            </div>
            <div class="form-main-wrap px-5 py-4">
                <form class="form" action="{{ route('update.project.video') }}" method="POST" id=""
                    enctype="multipart/form-data" class="w-100 mt-5 form-steps-main" id="form">
                    {{ csrf_field() }}
                    <input type="hidden" name="projectID" value="{{ $project->projectID }}">
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Title
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" name="video_title">
                                    @error('video_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9 col-sm-8 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Video iframe
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" name="video_iframe">
                                    @error('video_iframe')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="d-flex align-items-center mb-3 mt-4">
                            <div class="ms-auto form-submit-btn">
                                <button type="submit" class="border-0 f-medium rounded-btn px-3 py-2 bg-theme text-white"
                                    onclick="" style="width: 200px !important;">
                                    Update Video
                                </button>
                            </div>
                        </div>


                    </div>

                </form>
                {{-- Delete Gallery images --}}
                <div class="project-table">
                    <table style="width: 50%;">
                        <tr>
                            <th>Title</th>
                            <th class="t-center">Video</th>
                            <th class="t-center">Action</th>
                        </tr>
                        @foreach ($project_videos as $pv)
                            <tr class="tr-detail">
                                <td>{{ $pv->title }}</td>
                                <td class="t-center">
                                    {!! $pv->video !!}
                                </td>
                                <td class="t-center">
                                    <ul>
                                        <li>
                                            {{-- <a href="#" > --}}
                                            <i class="bi bi-trash text-danger"
                                                onclick="deleteVideo({{ $pv->id }});"></i>
                                            {{-- </a> --}}
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            {{-- gallery images --}}
            <div class="search-form-header bg-theme-dark">
                <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Project Gallery
                    <span class="txb-color">Images</span>
                </h5>
            </div>
            <div class="form-main-wrap px-5 py-4">
                <form class="form" action="{{ route('update.project.images') }}" method="POST" id=""
                    enctype="multipart/form-data" class="w-100 mt-5 form-steps-main" id="form">
                    {{ csrf_field() }}
                    <input type="hidden" name="projectID" value="{{ $project->projectID }}">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 mb-4">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Choose Images
                                </label>
                                <div class="position-relative">
                                    <input type="file" data-index="2" class="img-preview-upload form-control" multiple
                                        name="gallery_image[]" accept="image/*" data-required="required" />
                                    <div class="output-img d-flex flex-wrap border mt-2 pt-2 px-2">
                                        @foreach ($gallery as $g)
                                            <div class="me-2 mb-2 position-relative view-added-image">
                                                {{-- <span data-index="0" class="remove-btn-img position-absolute rounded-circle" type="button"><i class="bi bi-x-circle-fill"></i></span> --}}
                                                <img width="70" height="70" src="{{ asset($g->galleryImage) }}">
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                                @error('gallery_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3 mt-4">
                            <div class="ms-auto form-submit-btn">
                                <button type="submit" class="border-0 f-medium rounded-btn px-3 py-2 bg-theme text-white"
                                    style="width: 200px !important;">
                                    Update Images
                                </button>
                            </div>
                        </div>


                    </div>

                </form>
                {{-- Delete Gallery images --}}
                <div class="project-table">
                    <table style="width: 30%;">
                        <tr>
                            <th class="t-center">Image</th>
                            <th class="t-center">Action</th>
                        </tr>
                        @foreach ($project_gallery as $pg)
                            <tr class="tr-detail">
                                <td class="t-center">
                                    <img src="{{ asset($pg->image) }}" alt="project-image"
                                        style="width: 50px; height: 50px;">
                                </td>
                                <td class="t-center">
                                    <ul>
                                        <li>
                                            {{-- <a href="#" > --}}
                                            <i class="bi bi-trash text-danger"
                                                onclick="deleteGalleryImage({{ $pg->id }});"></i>
                                            {{-- </a> --}}
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            {{-- project features --}}
            <div class="search-form-header bg-theme-dark">
                <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Project
                    <span class="txb-color">Features</span>
                </h5>
            </div>
            <div class="form-main-wrap px-5 py-4">
                <form class="form" action="{{ route('update.project.features') }}" method="POST" id=""
                    enctype="multipart/form-data" class="w-100 mt-5 form-steps-main" id="form">
                    {{ csrf_field() }}
                    <input type="hidden" name="projectID" value="{{ $project->projectID }}">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-elements-wrap">
                                <div class="form-group-checkbox me-3">
                                    {{-- <input type="checkbox" id="Furnished" value="Furnished" <?php if (isset($property->property_feature)) {
                                        if (in_array('Furnished', json_decode($property->property_feature))) {
                                            echo 'checked';
                                        }
                                    } ?> name="property_feature[]"> --}}
                                    @foreach ($features as $f)
                                        <div class="features-list">
                                            {{-- <input type="checkbox" id="{{$f->name}}" value="{{$f->id}}" @if ($pf->feature_id == $f->id) checked @endif name="project_feature[]"> --}}
                                            <input type="checkbox" id="{{ $f->name }}" value="{{ $f->id }}"
                                                name="project_feature[]">
                                            <label for="{{ $f->name }}">{{ $f->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3 mt-4">
                            <div class="ms-auto form-submit-btn">
                                <button type="submit" class="border-0 f-medium rounded-btn px-3 py-2 bg-theme text-white"
                                    style="width: 200px !important;">
                                    Update Features
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                {{-- add new feature --}}
                <div class="project-add-new project-table">
                    <table style="width: 40%">
                        <tr>
                            <th>Feature List</th>
                            <th class="t-center">Action</th>
                        </tr>
                        <tr>
                            <td><input type="text" class="new-feature w-100" placeholder="New Feature Name.."></td>
                            <td class="t-center">
                                <ul>
                                    <li><i class="bi bi-plus-lg" onclick="addNewFeature();"></i></li>
                                </ul>
                            </td>
                        </tr>
                        @foreach ($features as $f)
                            <tr class="tr-detail">
                                <td>{{ $f->name }}</td>
                                <td class="t-center">
                                    <ul>
                                        <li><i class="bi bi-trash text-danger"
                                                onclick="deleteFeature({{ $f->id }});"></i></li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

            </div>

            {{-- project floor plan --}}
            <div class="search-form-header bg-theme-dark">
                <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Project
                    <span class="txb-color">Floor Plan</span>
                </h5>
            </div>
            <div class="form-main-wrap px-5 py-4" style="float: left; width: 100%;">
                <form class="form" action="{{ route('add.project.floor.plan') }}" method="POST" id=""
                    enctype="multipart/form-data" class="w-100 mt-5 form-steps-main" id="form">
                    {{ csrf_field() }}
                    <input type="hidden" name="projectID" value="{{ $project->projectID }}">
                    <div class="row">
                        <div class="col-md-2 col-sm-4 col-xs-12">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Select Floor Type
                                </label>
                                <div class="form-group-checkbox me-3">
                                    <select name="floor_type" id="" class="w-100">
                                        @foreach ($floor_plan as $fp)
                                            <option value="{{ $fp->id }}">{{ $fp->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-4 col-xs-12">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Floor Size
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" id="" name="floor_size"
                                        value="{{ old('floor_size') }}" />
                                    @error('floor_size')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-4 col-xs-12">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Price Range (Min - Max)
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" id="" name="price_range"
                                        value="{{ old('price_range') }}" placeholder="1.50 lac - 2.50 lac" />
                                    @error('price_range')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Floor Image
                                </label>
                                <div class="position-relative">
                                    <input type="file" data-index="3" class="img-preview-upload form-control"
                                        name="floor_image" accept="image  " />
                                    <div class="output-img d-flex flex-wrap border mt-2 pt-2 px-2 d-none">
                                        <div class="me-2 mb-2 position-relative view-added-image">
                                        </div>
                                    </div>
                                    @error('floor_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3 mt-4">
                            <div class="ms-auto form-submit-btn">
                                <button type="submit" class="border-0 f-medium rounded-btn px-3 py-2 bg-theme text-white"
                                    style="width: 200px !important;">
                                    Add Floor Plan
                                </button>
                            </div>
                        </div>


                    </div>

                </form>

                {{-- floor plan --}}
                <div class="project-add-new project-table">
                    <table style="width: 25%; float: left; margin-right: 50px;">
                        <tr>
                            <th>Floor Plan</th>
                            <th class="t-center">Action</th>
                        </tr>
                        <tr>
                            <td><input type="text" class="new-floor-plan w-100" placeholder="New Floor Plan Name...">
                            </td>
                            <td class="t-center">
                                <ul>
                                    <li><i class="bi bi-plus-lg" onclick="addNewFloor();"></i></li>
                                </ul>
                            </td>
                        </tr>
                        @foreach ($floor_plan as $fp)
                            <tr>
                                <td>{{ $fp->name }}</td>
                                <td class="t-center">
                                    <ul>
                                        <li><i class="bi bi-trash text-danger"
                                                onclick="deleteFloorPlan({{ $fp->id }});"></i></li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{-- project floor plan --}}
                    <table style="width: 70%">
                        <tr>
                            <th class="t-center">Image</th>
                            <th class="t-center">Floor Type</th>
                            <th class="t-center">Size</th>
                            <th class="t-center">Price</th>
                            <th class="t-center">Action</th>
                        </tr>
                        @foreach ($project_floor_plan as $fp)
                            <tr>

                                <td class="t-center">
                                    <img src="{{ asset($fp->image) }}" alt="floor_plan">
                                </td>
                                <td class="t-center">{{ $fp->name }}</td>
                                <td class="t-center">{{ $fp->size }}</td>
                                <td class="t-center">{{ $fp->price }}</td>
                                <td class="t-center">
                                    <ul>
                                        <li><i class="bi bi-trash text-danger"
                                                onclick="deleteProjectFloorPlan({{ $fp->id }});"></i></li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            {{-- project payment plan --}}
            <div class="search-form-header bg-theme-dark" style="float: left; width: 100%;">
                <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Project
                    <span class="txb-color">Payment Plan</span>
                </h5>
            </div>
            <div class="form-main-wrap px-5 py-4" style="float: left; width: 100%;">
                <form class="form" action="{{ route('add.project.payment.plan') }}" method="POST" id=""
                    enctype="multipart/form-data" class="w-100 mt-5 form-steps-main" id="form">
                    {{ csrf_field() }}
                    <input type="hidden" name="projectID" value="{{ $project->projectID }}">
                    <div class="row">

                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Title
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" id="" name="payment_title"
                                        value="{{ old('payment_title') }}" />
                                    @error('payment_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Price Range (Min - Max)
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" id="" name="payment_range"
                                        value="{{ old('payment_range') }}" />
                                    @error('payment_range')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Payment Plan Image
                                </label>
                                <div class="position-relative">
                                    <input type="file" data-index="4" class="img-preview-upload form-control"
                                        name="payment_image" accept="image  " />
                                    <div class="output-img d-flex flex-wrap border mt-2 pt-2 px-2 d-none">
                                        <div class="me-2 mb-2 position-relative view-added-image">
                                        </div>
                                    </div>
                                    @error('payment_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-4 mt-4">
                            <div class="ms-auto form-submit-btn">
                                <button type="submit" class="border-0 f-medium rounded-btn px-3 py-2 bg-theme text-white"
                                    style="width: 200px !important;">
                                    Add Payment Plan
                                </button>
                            </div>
                        </div>


                    </div>

                </form>

                {{-- project payment plan --}}
                <div class="project-table">
                    {{-- project payment plan --}}
                    <table style="width: 50%">
                        <tr>
                            <th class="t-center">Image</th>
                            <th class="t-center">Title</th>
                            <th class="t-center">Price Range</th>
                            <th class="t-center">Action</th>
                        </tr>
                        @foreach ($payment_plan as $pp)
                            <tr>
                                <td class="t-center">
                                    <img src="{{ asset('project/' . $project->projectID . '/' . $pp->image) }}"
                                        alt="payment_plan">
                                </td>
                                <td class="t-center">{{ $pp->title }}</td>
                                <td class="t-center">{{ $pp->price }}</td>
                                <td class="t-center">
                                    <ul>
                                        <li><i class="bi bi-trash text-danger"
                                                onclick="deleteProjectPaymentPlan({{ $pp->id }});"></i></li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

            </div>


        </div>
    </div>

@endsection

@push('js')
    <script type="text/javascript">
        // deleteGalleryImage
        function deleteGalleryImage(id) {

            postData = {
                "_token": "{{ csrf_token() }}",
                'id': id,
            }
            swal({
                    title: "Are you sure?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: window.livewire_app_url + '/admin/delete-gallery-image',
                            data: postData,
                            type: 'POST',
                            success: function(res) {
                                swal({
                                    title: "Your Data is Deleted!"
                                }).then(function() {
                                    location.reload();
                                });
                            },
                            error: function(jqXHR, exception) {
                                displayErrors(jqXHR, exception);
                            }
                        });
                    } else {
                        swal({
                            title: "Your Data is Not Deleted!"
                        });
                    }
                });
        }

        // addNewFeature 
        function addNewFeature() {
            var feature = $('.new-feature').val();
            postData = {
                "_token": "{{ csrf_token() }}",
                'feature': feature,
            }
            if (feature == '') {
                swal({
                    text: "Please Enter Feature Name to Add.."
                });
            } else {
                $.ajax({
                    url: window.livewire_app_url + '/admin/add-new-feature',
                    data: postData,
                    type: 'POST',
                    success: function(res) {
                        swal({
                            title: "Good job!",
                            text: "Feature Successfully Updated!",
                            icon: "success",
                        }).then(function() {
                            location.reload();
                        });
                    },
                    error: function(jqXHR, exception) {
                        displayErrors(jqXHR, exception);
                    }
                });
            }

        }

        // deleteFeature
        function deleteFeature(id) {

            postData = {
                "_token": "{{ csrf_token() }}",
                'id': id,
            }
            swal({
                    title: "Are you sure?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: window.livewire_app_url + '/admin/delete-feature',
                            data: postData,
                            type: 'POST',
                            success: function(res) {
                                swal({
                                    title: "Your Data is Deleted!"
                                }).then(function() {
                                    location.reload();
                                });
                            },
                            error: function(jqXHR, exception) {
                                displayErrors(jqXHR, exception);
                            }
                        });
                    } else {
                        swal({
                            title: "Your Data is Not Deleted!"
                        });
                    }
                });
        }

        // addNewFloor 
        function addNewFloor() {
            var floor = $('.new-floor-plan').val();
            postData = {
                "_token": "{{ csrf_token() }}",
                'floor': floor,
            }
            if (floor == '') {
                swal({
                    text: "Please Enter Floor Plan to Add.."
                });
            } else {
                $.ajax({
                    url: window.livewire_app_url + '/admin/add-new-floor',
                    data: postData,
                    type: 'POST',
                    success: function(res) {
                        swal({
                            title: "Good job!",
                            text: "Floor Plan Successfully Updated!",
                            icon: "success",
                        }).then(function() {
                            location.reload();
                        });
                    },
                    error: function(jqXHR, exception) {
                        displayErrors(jqXHR, exception);
                    }
                });
            }
        }

        // deleteProjectFloorPlan
        function deleteProjectFloorPlan(id) {
            postData = {
                "_token": "{{ csrf_token() }}",
                'id': id,
            }
            swal({
                    title: "Are you sure?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: window.livewire_app_url + '/admin/delete-project-floor',
                            data: postData,
                            type: 'POST',
                            success: function(res) {
                                swal({
                                    title: "Your Data is Deleted!"
                                }).then(function() {
                                    location.reload();
                                });
                            },
                            error: function(jqXHR, exception) {
                                displayErrors(jqXHR, exception);
                            }
                        });
                    } else {
                        swal({
                            title: "Your Data is Not Deleted!"
                        });
                    }
                });
        }

        // deleteProjectPaymentPlan
        function deleteProjectPaymentPlan(id) {
            postData = {
                "_token": "{{ csrf_token() }}",
                'id': id,
            }
            swal({
                    title: "Are you sure?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: window.livewire_app_url + '/admin/delete-project-payment-plan',
                            data: postData,
                            type: 'POST',
                            success: function(res) {
                                swal({
                                    title: "Your Data is Deleted!"
                                }).then(function() {
                                    location.reload();
                                });
                            },
                            error: function(jqXHR, exception) {
                                displayErrors(jqXHR, exception);
                            }
                        });
                    } else {
                        swal({
                            title: "Your Data is Not Deleted!"
                        });
                    }
                });
        }

        // deleteVideo
        function deleteVideo(id) {
            postData = {
                "_token": "{{ csrf_token() }}",
                'id': id,
            }
            swal({
                    title: "Are you sure?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: window.livewire_app_url + '/admin/delete-project-video',
                            data: postData,
                            type: 'POST',
                            success: function(res) {
                                swal({
                                    title: "Your Data is Deleted!"
                                }).then(function() {
                                    location.reload();
                                });
                            },
                            error: function(jqXHR, exception) {
                                displayErrors(jqXHR, exception);
                            }
                        });
                    } else {
                        swal({
                            title: "Your Data is Not Deleted!"
                        });
                    }
                });
        }
    </script>
@endpush
