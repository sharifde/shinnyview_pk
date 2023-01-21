@extends('frontend.app')
@section('content')
<link  rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}" />

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
                <div class="alert-heading"><h2>Thank you for submitting your registration as an Individual Client.</h2></div>
				<p>Start Posting your free Ads.</p>
               <!-- <p>A verification Email has been sent to you. Please verify your Email and post your free Ads.</p>
				<small>If you have not received an email, please check your spam/junke email or for <a href="#"><b>resend click here</b></a>.</small>-->
            </div>
        @endif

<div class="col-lg-8 col-md-10 mx-auto py-5 my-md-4 px-3 px-md-0">
    <div class="search-property-form" style="max-width:100%;">
        <div class="search-form-header bg-theme-dark">
            <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Individual Client Signup
                <span class="txb-color">Form</span>
            </h5>
        </div>
        <form class="w-100" method="POST" id="form-signup-client" action="{{url('store-client')}}" >
			@csrf
        	<div class="w-100 mb-0 border-custom radius-y-12">
				<br>
                <div class="px-sm-4 px-3 py-4 form-steps-main">
				  <div class="row form-steps-register d-flex active">
						<div class="search-form-fields col-md-6 mb-3 search-form-request-cd">
							<label class="f-medium">Full Name
								<sup class="text-danger f-14">*</sup>
								<span class="ms-auto float-end me-2 rtl-name">پورا نام</span>
							</label>
							<input type="text" class="w-100" minlength="2"  id="first_name" required="required" name="name" />
						</div>

						<div class="search-form-fields col-md-6 mb-3 search-form-request-cd">
							<label class="f-medium">Email address
								<sup class="text-danger f-14">*</sup>
								<span class="ms-auto float-end me-2 rtl-name">ای میل</span>
							</label>
							<input type="email" class="w-100" id="register-email"   required="required" name="email"/>
						</div>
					  
					   <div class="search-form-fields col-md-6 mb-3 search-form-request-cd data-input">
							<label class="f-medium">Mobile
								<sup class="text-danger f-14">*</sup>
								<span class="ms-auto float-end me-2 rtl-name">موبائل نمبر</span>
							</label>
							<input type='tel' id="phone" class="w-100" minlength="11" maxlength="11"  required="required" name="mobile"/>
					   </div>
					  
					   <div class="search-form-fields col-md-6 mb-3 search-form-request-cd">
                        <label class="f-medium">Applicant CNIC/Passport Number
                            <sup class="text-danger f-14"></sup>
                            <span class="ms-auto float-end me-2 rtl-name">شناختی کارڈ/پاسپورٹ نمبر</span>
                        </label>
                        <input type="number" class="w-100" minlength="4" maxlength="4"  name="cnic"/>
                      </div>
					  
					  <div class="search-form-fields col-md-6 mb-3 search-form-request-cd">
                        <label class="f-medium">Password
                            <sup class="text-danger f-14">*</sup>
                            <span class="ms-auto float-end me-2 rtl-name">پاس ورڈ</span>
                        </label>
                        <input type="password" class="w-100" id="password" name="password" required="required" />
                      </div>
					 					  
					  <div class="search-form-fields col-md-6 mb-3 search-form-request-cd">
                        <label class="f-medium">
                            Confirm Password
                            <sup class="text-danger f-14">*</sup>
                            <span class="ms-auto float-end me-2 rtl-name">پاس ورڈ کی تصدیق کریں</span>
                        </label>
                        <input type="password" class="w-100" id="confirm_password" name="password_confirmation" required="required" />
                      </div>
					  
					   <div class="d-flex align-items-center mb-3 mt-4">
                          <div class="ms-auto form-submit-btn">
                              <button type="submit" class="border-0 f-medium rounded-btn px-md-5 px-3
                                  py-2 bg-theme text-white">
                                  Submit
                              </button>
                          </div>
					   </div>

				  </div>
			    </div>
			</div> 
        </form>
    </div>
</div>
<script src="{{asset('libraries/sweet-alert/sweet_alert_v2.min.js')}}"></script>
<script src="{{asset('libraries/intel-validation/int_tel.js')}}"></script>
@endsection
