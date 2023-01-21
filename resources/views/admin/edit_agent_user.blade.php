@extends('admin.layout')
@section('content')
<div class="py-4">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session()->has('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif
<div class="py-4">
    <div class="bg-white card-body-content">
        <div class="search-form-header bg-theme-dark">
            <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Edit Agent
                <span class="txb-color">Form</span>
            </h5>
        </div>
        <form class="row px-4 py-4 form-main-wrap" action={{route('update.agent')}} id="agent" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="form-elements-wrap">
                    <label class="f-medium mb-2">
                        Full Name <sup class="text-danger">*</sup>
                    </label>
                    <div class="position-relative">
                        <input type="text" class="w-100" name="full_name" placeholder="Full name" value="{{$user->name}}">
                        <div
                            class="position-absolute field-icon d-flex
                            align-items-center justify-content-center">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="form-elements-wrap">
                    <label class="f-medium mb-2">
                        Email <sup class="text-danger">*</sup>
                    </label>
                    <div class="position-relative">
                        <input required type="email" class="w-100" placeholder="Email" name="email" value="{{$user->email}}">
                        <div
                            class="position-absolute field-icon d-flex
                            align-items-center justify-content-center">
                            <i class="bi bi-envelope"></i>
                        </div>
                    </div>
                </div>
            </div>

             <div class="col-md-6 col-lg-4 mb-4">
                <div class="form-elements-wrap">
                    <label class="f-medium mb-2">
                        City 
                    </label>
                    <div class="position-relative">
                        <input required type="text" class="w-100"  name="city" value="{{$user->city}}">
                        <div
                            class="position-absolute field-icon d-flex
                            align-items-center justify-content-center">
                            <i class="bi bi-envelope"></i>
                        </div>
                    </div>
                </div>
            </div>
			
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="form-elements-wrap">
                    <label class="f-medium mb-2">
                        Address 
                    </label>
                    <div class="position-relative">
                        <input required type="text" class="w-100"  name="address" value="{{$user->address}}">
                        <div
                            class="position-absolute field-icon d-flex
                            align-items-center justify-content-center">
                            <i class="bi bi-envelope"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="form-elements-wrap">
                    <label class="f-medium mb-2">
                        Password 
                    </label>
                    <div class="position-relative">
                        <input   type="text" placeholder="Password" class="w-100" name="password" value="{{$user->confirm_password}}" />
                        <div
                            class="position-absolute field-icon d-flex
                            align-items-center justify-content-center">
                            <i class="bi bi-lock"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="form-elements-wrap">
                    <label class="f-medium mb-2">
                        Confirm Password 
                    </label>
                    <div class="position-relative">
                        <input   type="text" placeholder="Confirm Password" class="w-100" name="password_confirmation" value="{{$user->confirm_password}}" />
                        <div
                            class="position-absolute field-icon d-flex
                            align-items-center justify-content-center">
                            <i class="bi bi-lock"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="form-elements-wrap">
                    <label class="f-medium mb-2">
                        User Role <sup class="text-danger">*</sup>
                    </label>
                    <div class="position-relative">
                        <select required class="w-100 border-0"  name="role">

                            @foreach($role as $r)
                            <option <?php  if($user->role_id == $r->id) echo "selected"; ?> value="{{$r->id}}">
                                {{$r->name}}
                            </option>
                            @endforeach

                        </select>
                        <div
                            class="position-absolute field-icon d-flex
                            align-items-center justify-content-center">
                            <i class="bi bi-person-badge text-grey"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="form-elements-wrap">
                    <label class="f-medium mb-2">
                        Plans <sup class="text-danger">*</sup>
                    </label>
                    <div class="position-relative">
                        <select  class="w-100 border-0"  name="plan">
                            <option disabled selected> Plans  </option>
                            <option value="none"> None  </option>

                            @foreach($plan as $p)
                            <option <?php  if($p->id == $user->plan_id) echo "selected";?> value="{{$p->id}}">
                                {{$p->name}}
                            </option>
                            @endforeach
                        </select>
                        <div
                            class="position-absolute field-icon d-flex
                            align-items-center justify-content-center">
                            <i class="bi bi-tags text-grey"></i>
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-md-6 col-lg-4 mb-4">
                <div class="form-elements-wrap">
                    <label class="f-medium mb-2">
                        Mobile 
                    </label>
                    <div class="position-relative">
                        <input required type="number" class="w-100"  name="company_phone_number" value="{{$user->company_phone_number}}">
                        <div
                            class="position-absolute field-icon d-flex
                            align-items-center justify-content-center">
                            <i class="bi bi-envelope"></i>
                        </div>
                    </div>
                </div>
            </div>
			
			<div class="col-md-6 col-lg-4 mb-4">
                <div class="form-elements-wrap">
                    <label class="f-medium mb-2">
                        Company
                    </label>
                    <div class="position-relative">
                        <input required type="text" class="w-100"  name="company" value="{{$user->company}}">
                        <div
                            class="position-absolute field-icon d-flex
                            align-items-center justify-content-center">
                            <i class="bi bi-envelope"></i>
                        </div>
                    </div>
                </div>
            </div>
			
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="form-elements-wrap">
                    <label class="f-medium mb-2">
                        Image
                    </label>
                    <div class="position-relative">
                        <input type="file" data-index="0" class="img-preview-upload form-control"
                            name="photo" accept="image/*" />
                        <div class="output-img d-flex flex-wrap border mt-2 pt-2 px-2">
                            <input type="hidden" value="{{$user->image}}" name="photo_name" />
                            <div class="me-2 mb-2 position-relative view-added-image">
                            <span data-index="0" class="remove-btn-img position-absolute rounded-circle" type="button"><i class="bi bi-x-circle-fill"></i></span>
                            <img width="70" height="70" src="{{asset('images/profile_avatar/'.$user->image)}}">
                            </div>
                        </div>
                        </div>
                    </div>
            </div>
			
			
			
			
            <div class="text-end form-submit-btn col-12">
                <button type="submit" class="border-0 f-medium rounded-btn  px-3
                    py-2 bg-theme text-white" id="submit-trigger">
                    Update
                </button>
            </div>
            <input type="hidden" value="{{$user->id}}" name="user_id">


            {{-- <input type="hidden"   wire:model="role_seller_id" /> --}}
        </form>
    </div>
</div>
</div>
@endsection
