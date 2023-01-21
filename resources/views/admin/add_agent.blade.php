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
            <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Add New Agent
                <span class="txb-color">Form</span>
            </h5>
        </div>
        <form class="row px-4 py-4 form-main-wrap" action={{route('add.new.agent')}} id="agent" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="form-elements-wrap">
                    <label class="f-medium mb-2">
                        Full Name <sup class="text-danger">*</sup>
                    </label>
                    <div class="position-relative">
                        <input type="text" class="w-100" name="full_name" placeholder="Full name">
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
                        <input required type="email" class="w-100" placeholder="Email" name="email">
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
                        Phone No<sup class="text-danger">*</sup>
                    </label>
                    <div class="position-relative">
                        <input required type="number" class="w-100" placeholder="" name="phone">
                        <div
                            class="position-absolute field-icon d-flex
                            align-items-center justify-content-center">
                            <i class="bi bi-phone"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="form-elements-wrap">
                    <label class="f-medium mb-2">
                        Company Name<sup class="text-danger">*</sup>
                    </label>
                    <div class="position-relative">
                        <input required type="text" class="w-100" placeholder="" name="company">
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
                        Comapny Phone No<sup class="text-danger">*</sup>
                    </label>
                    <div class="position-relative">
                        <input required type="number" class="w-100" placeholder="" name="company_phone">
                        <div
                            class="position-absolute field-icon d-flex
                            align-items-center justify-content-center">
                            <i class="bi bi-phone"></i>
                        </div>
                    </div>
                </div>
            </div>

             <div class="col-md-6 col-lg-4 mb-4">
                <div class="form-elements-wrap">
                    <label class="f-medium mb-2">
                        City <sup class="text-danger">*</sup>
                    </label>
                    <div class="position-relative">
                        <input required type="text" class="w-100"  name="city">
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
                        Address <sup class="text-danger">*</sup>
                    </label>
                    <div class="position-relative">
                        <input required type="text" class="w-100"  name="address">
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
                        Password <sup class="text-danger">*</sup>
                    </label>
                    <div class="position-relative">
                        <input   type="password" placeholder="Password" class="w-100" name="password" />
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
                        Confirm Password <sup class="text-danger">*</sup>
                    </label>
                    <div class="position-relative">
                        <input   type="password" placeholder="Confirm Password" class="w-100" name="password_confirmation" />
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
                        Plans <sup class="text-danger">*</sup>
                    </label>
                    <div class="position-relative">
                        <select  class="w-100 border-0"  name="plan" required>
                            <option disabled selected> Plans  </option>
                            <option value="none"> None  </option>

                            @foreach($package as $p)
                            <option value="{{$p->id}}">
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
            <div class="text-end form-submit-btn col-12">
                <button type="submit" class="border-0 f-medium rounded-btn  px-3
                    py-2 bg-theme text-white" id="submit-trigger">
                    Add Agent
                </button>
            </div>
            {{-- <input type="hidden" value="{{$user->id}}" name="user_id"> --}}


            {{-- <input type="hidden"   wire:model="role_seller_id" /> --}}
        </form>
    </div>
</div>
</div>
@endsection
