@extends('agent.layout')
@section('content')
{{-- <div class="w-75">
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
</div> --}}

<div class="py-4">
    <div class="bg-white card-body-content">
        <div class="search-form-header bg-theme-dark">
            <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Update
                <span class="txb-color">Profile</span>
            </h5>
        </div>
        <form class="row px-4 py-4 form-main-wrap"  action="{{route('profile.update')}}" method="POST">
            @csrf
            <div class="col-md-12">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="form-elements-wrap">
                        <label class="f-medium mb-2">
                            Full Name <sup class="text-danger">*</sup>
                        </label>
                        <div class="position-relative">
                            <input type="text" class="w-100" name="name" placeholder="Full name" value="{{$agent_user->name}}" readonly >
                            <div
                                class="position-absolute field-icon d-flex
                                align-items-center justify-content-center">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                    </div>
                    @error('name') <span class="text-danger error text-right">{{ $message }}</span>@enderror
                </div>
				
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="form-elements-wrap">
                        <label class="f-medium mb-2">
                            Email <span style="font-size: 11px;">(To Update Email, Please Contact Helpline Support)</span>
                        </label>
                        <div class="position-relative">
                            <input required type="email" class="w-100" disabled placeholder="Email" name="email" value="{{$agent_user->email}}">
                            <div
                                class="position-absolute field-icon d-flex
                                align-items-center justify-content-center">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
			<div class="col-md-6 col-lg-4 mb-4">
                    <div class="form-elements-wrap">
                        <label class="f-medium mb-2">
                            Mobile <sup class="text-danger">*</sup>
                        </label>
                        <div class="position-relative">
                            <input type="text" class="w-100" name="phone" placeholder="Full name" value="{{$agent_user->company_phone_number}}" readonly disabled>
                            <div
                                class="position-absolute field-icon d-flex
                                align-items-center justify-content-center">
                                <i class="bi bi-phone"></i>
                            </div>
                        </div>
                    </div>
                    {{-- @error('name') <span class="text-danger error text-right">{{ $message }}</span>@enderror --}}
                </div>
			
			<div class="col-md-6 col-lg-4 mb-4">
                    <div class="form-elements-wrap">
                        <label class="f-medium mb-2">
                            CNIC/Passport No.<sup class="text-danger">*</sup>
                        </label>
                        <div class="position-relative">
                            <input type="text" class="w-100" name="cnic" placeholder="CNIC/Passport No." value="{{$agent_user->cnic}}" readonly disabled>
                            <div
                                class="position-absolute field-icon d-flex
                                align-items-center justify-content-center">
                                <i class="bi bi-file"></i>
                            </div>
                        </div>
                    </div>
                    {{-- @error('name') <span class="text-danger error text-right">{{ $message }}</span>@enderror --}}
                </div>

            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="form-elements-wrap">
                        <label class="f-medium mb-2">
                            New Password
                        </label>
                        <div class="position-relative">
                            <input type="password" placeholder="New Password" class="w-100" name="password" />
                            <div
                                class="position-absolute field-icon d-flex
                                align-items-center justify-content-center">
                                <i class="bi bi-lock"></i>
                            </div>
                        </div>
                    </div>
                    @error('password') <span class="text-danger error text-right">{{ $message }}</span>@enderror
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="form-elements-wrap">
                        <label class="f-medium mb-2">
                            Confirm New Password
                        </label>
                        <div class="position-relative">
                            <input type="password" placeholder="Confirm New Password" class="w-100" name="password_confirmation" />
                            <div
                                class="position-absolute field-icon d-flex
                                align-items-center justify-content-center">
                                <i class="bi bi-lock"></i>
                            </div>
                        </div>
                    </div>
                    @error('password_confirmation') <span class="text-danger error text-right">{{ $message }}</span>@enderror
                </div>
            </div>
                
            <div class="row">
                {{-- <input type="hidden"   wire:model="role_seller_id" /> --}}
                <div class="text-end form-submit-btn col-md-12 col-lg-8 mb-8">
                    <button type="submit"  class="border-0 f-medium rounded-btn  px-3 py-2 bg-theme text-white"
                        wire:click.prevent="update">Update
                        <span wire:target="update"
                            wire:loading.class="spinner-border spinner-border-sm"></span>

                    </button>
                </div>
            
            </div>
        </form>
    </div>
</div>
@endsection
