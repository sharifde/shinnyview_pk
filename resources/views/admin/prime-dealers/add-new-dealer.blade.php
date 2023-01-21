@extends('admin.layout')
@section('content')

<div class="py-4">
    <div class="add-new-project bg-white card-body-content">
        <div class="search-form-header bg-theme-dark">
            <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Add New
                <span class="txb-color">Prime Dealer</span>
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
                <p>Prime Dealer Successfully Added.</p>
            </div>
        @endif
        <div class="form-main-wrap px-5 py-4">
            <form class="form" action="{{ route('add.new.dealer') }}" method="POST" id="becomeDoctorForm" enctype="multipart/form-data" class="w-100 mt-5 form-steps-main" id="form">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-elements-wrap">
                            <label class="f-medium mb-2">
                               Dealer Name <sup class="text-danger">*</sup>
                            </label>
                            <div class="position-relative">
                                <input type="text" class="w-100" id="" name="d_name" value="{{ old('d_name')}}"/>
                                @error('d_name') 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> 
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-elements-wrap">
                            <label class="f-medium mb-2">
                               Logo <sup class="text-danger">*</sup>
                            </label>
                            <div class="position-relative">
                                <input type="file" class="w-100" id="" name="d_image" value="{{ old('d_image')}}"/>
                                @error('d_image') 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> 
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                        <div class="form-elements-wrap">
                            <label class="f-medium mb-2">
                                Phone Number 1 <sup class="text-danger">*</sup>
                            </label>
                            <div class="position-relative">
                                <input type="text" class="w-100" name="phone_1" value="{{ old('phone_1')}}">
                                @error('phone_1') 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                        <div class="form-elements-wrap">
                            <label class="f-medium mb-2">
                                Phone Number 2
                            </label>
                            <div class="position-relative">
                                <input type="text" class="w-100" name="phone_2" value="{{ old('phone_2')}}">
                                @error('phone_2') 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                        <div class="form-elements-wrap">
                            <label class="f-medium mb-2">
                                Phone Number 3
                            </label>
                            <div class="position-relative">
                                <input type="text" class="w-100" name="phone_3" value="{{ old('phone_3')}}">
                                @error('phone_3') 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                        <div class="form-elements-wrap">
                            <label class="f-medium mb-2">
                                Status <sup class="text-danger">*</sup>
                            </label>
                            <div class="position-relative">
                                <select name="status" id="" class="w-100">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                @error('status') 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="d-flex align-items-center mb-3 mt-4">
                        <div class="ms-auto form-submit-btn">
                            <button type="submit" class="border-0 f-medium rounded-btn px-3 py-2 bg-theme text-white" onclick="updateSEODetails()" style="width: 200px !important;">
                                Add New Dealer
                            </button>
                        </div>
                    </div>


                </div>

            </form>
        </div>
    </div>
</div>

@endsection