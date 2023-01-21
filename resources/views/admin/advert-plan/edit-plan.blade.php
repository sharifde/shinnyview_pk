@extends('admin.layout')
@section('content')

    <div class="py-4">
        <div class="add-new-project bg-white card-body-content">
            <div class="search-form-header bg-theme-dark">
                <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Edit
                    <span class="txb-color">Advert Plan</span>
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
                    <p>Plan Successfully Updated.</p>
                </div>
            @endif
            <div class="form-main-wrap px-5 py-4">
                <form class="form" action="{{ route('update.plan.details') }}" method="POST"
                    enctype="multipart/form-data" class="w-100 mt-5 form-steps-main" id="form">
                    {{ csrf_field() }}
                    <input type="hidden" name="planID" value="{{ $plan->id }}">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Plan Name <sup class="text-danger">*</sup>
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" id="" name="name"
                                        value="{{ $plan->name }}" />
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Image <sup class="text-danger">*</sup>
                                </label>
                                <div class="position-relative">
                                    <input type="file" class="w-100" id="" name="image"
                                        value="{{ old('image') }}" />
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="output-img d-flex flex-wrap border mt-2 pt-2 px-2">
                                    {{-- <input type="hidden" value="{{$project->projectImage}}" name="p_image" />
                                <input type="hidden" value="" name="p_image" /> --}}
                                    <div class="me-2 mb-2 position-relative view-added-image">
                                        <span data-index="0" class="remove-btn-img position-absolute rounded-circle"
                                            type="button"><i class="bi bi-x-circle-fill"></i></span>
                                        <img width="70" height="70"
                                            src="{{ asset('advert-plans/' . $plan->id . '/' . $plan->image) }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Price <sup class="text-danger">*</sup>
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" name="price" value="{{ $plan->price }}">
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
                                    <input type="text" class="w-100" name="days" value="{{ $plan->days }}">
                                    @error('days')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Size <sup class="text-danger">*</sup>
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" name="size" value="{{ $plan->size }}">
                                    @error('size')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Design Name <sup class="text-danger">*</sup>
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" name="design_name"
                                        value="{{ $plan->design_name }}">
                                    @error('design_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Design Price <sup class="text-danger">*</sup>
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" name="design_price"
                                        value="{{ $plan->design_price }}">
                                    @error('design_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Color <sup class="text-danger">*</sup> <sup class="text-danger">color name or
                                        code(#FFF)</sup>
                                </label>
                                <div class="position-relative">
                                    <input type="color" class="w-100" name="color" value="{{ $plan->color }}">
                                    @error('color')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="d-flex align-items-center mb-3 mt-4">
                            <div class="ms-auto form-submit-btn">
                                <button type="submit" class="border-0 f-medium rounded-btn px-3 py-2 bg-theme text-white"
                                    style="width: 200px !important;">
                                    Update Plan Price
                                </button>
                            </div>
                        </div>


                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
