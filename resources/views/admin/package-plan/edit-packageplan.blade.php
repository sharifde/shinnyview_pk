@extends('admin.layout')
@section('content')

<div class="py-4">
    <div class="add-new-project bg-white card-body-content">
        <div class="search-form-header bg-theme-dark">
            <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Edit
                <span class="txb-color">Package Plan</span>
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
                <p>Package Plan Successfully Updated.</p>
            </div>
        @endif
        <div class="form-main-wrap px-5 py-4">
            <form class="form" action="{{ route('update.packageplan.details') }}" method="POST" enctype="multipart/form-data" class="w-100 mt-5 form-steps-main" id="form">
                {{ csrf_field() }}
                <input type="hidden" name="planID" value="{{$plan->id}}">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-elements-wrap">
                            <label class="f-medium mb-2">
                               Package Name <sup class="text-danger">*</sup>
                            </label>
                            <div class="position-relative">
                                <input type="text" class="w-100" id="" name="name" value="{{$plan->name}}"/>
                                @error('name') 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> 
                        </div>
                    </div>

                   <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                        <div class="form-elements-wrap">
                            <label class="f-medium mb-2">
                                Property <sup class="text-danger">*</sup>
                            </label>
                            <div class="position-relative">
                                <input type="number" min="0" class="w-100" name="property" value="{{$plan->property}}">
                                @error('property') 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                        <div class="form-elements-wrap">
                            <label class="f-medium mb-2">
                                Price <sup class="text-danger">*</sup>
                            </label>
                            <div class="position-relative">
                                <input type="text" class="w-100" name="price" value="{{$plan->price}}">
                                @error('price') 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                        <div class="form-elements-wrap">
                            <label class="f-medium mb-2">
                                Days <sup class="text-danger">*</sup>
                            </label>
                            <div class="position-relative">
                                <input type="text" class="w-100" name="days" value="{{$plan->days}}">
                                @error('days') 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                        <div class="form-elements-wrap">
                            <label class="f-medium mb-2">
                                Pictures  <sup class="text-danger">*</sup>
                            </label>
                            <div class="position-relative">
                                <input type="number" min="0" class="w-100" name="picture" value="{{$plan->picture}}">
                                @error('picture') 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                   <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                        <div class="form-elements-wrap">
                            <label class="f-medium mb-2">
                                Videos Link <sup class="text-danger">*</sup> <sup class="text-danger">0 unlimited videos url</sup>
                            </label>
                            <div class="position-relative">
                                <input type="number" min="0" class="w-100" name="video_link" value="{{$plan->video_link}}">
                                @error('video_link') 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
					
					<div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                        <div class="form-elements-wrap">
                            <label class="f-medium mb-2">
                                Featured Property
                            </label>
                            <div class="position-relative">
                                <input type="number" min="0" class="w-100" name="feature_property" value="{{$plan->boosted_property}}">
                                @error('feature_property') 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
					
					<div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                        <div class="form-elements-wrap">
                            <label class="f-medium mb-2">
                               	Boosted Property
                            </label>
                            <div class="position-relative">
                                <input type="number" min="0" class="w-100" name="boosted_property" value="{{$plan->boosted_property}}">
                                @error('boosted_property') 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
					
					<div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                        <div class="form-elements-wrap">
                            <label class="f-medium mb-2">
                               	Offer1
                            </label>
                            <div class="position-relative">
                                <input type="text" min="0" class="w-100" name="option1" value="{{$plan->option1}}">
                                @error('option1') 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
					
					<div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                        <div class="form-elements-wrap">
                            <label class="f-medium mb-2">
                               	Offer2
                            </label>
                            <div class="position-relative">
                                <input type="text" min="0" class="w-100" name="option2" value="{{$plan->option2}}">
                                @error('option2') 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
					
					<div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                        <div class="form-elements-wrap">
                            <label class="f-medium mb-2">
                               	Offer3
                            </label>
                            <div class="position-relative">
                                <input type="text" min="0" class="w-100" name="option3" value="{{$plan->option3}}">
                                @error('option3') 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
					
					<div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                        <div class="form-elements-wrap">
                            <label class="f-medium mb-2">
                               	Color<sup class="text-danger">*</sup> <sup class="text-danger"> color name or code(#FFF)</sup>
                            </label>
                            <div class="position-relative">
                                <input type="text" min="0" class="w-100" name="color" value="{{$plan->color}}">
                                @error('color') 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="d-flex align-items-center mb-3 mt-4">
                        <div class="ms-auto form-submit-btn">
                            <button type="submit" class="border-0 f-medium rounded-btn px-3 py-2 bg-theme text-white" style="width: 200px !important;">
                                Update Package
                            </button>
                        </div>
                    </div>


                </div>

            </form>
        </div>
    </div>
</div>

@endsection