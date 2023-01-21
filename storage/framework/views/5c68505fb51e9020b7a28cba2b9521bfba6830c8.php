
<?php $__env->startSection('content'); ?>
<link  rel="stylesheet" type="text/css" href="<?php echo e(asset('css/util.css')); ?>" />
<div class="col-lg-8 col-md-10 mx-auto py-5 my-md-4 px-3 px-md-0">
    <div class="search-property-form" style="max-width:100%;">
        <div class="search-form-header bg-theme-dark">
            <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Dealer Signup
                <span class="txb-color">Form</span>
            </h5>
        </div>
        <form class="w-100" method="POST" id="form-signup-dealer">
        <div class="w-100 mb-0 border-custom radius-y-12">
            <div class="progress-container pb-5">
                <ul class="progress-steps ps-0">
                    <li data-target="form_step_0" data-counter="1">Signup</li>
                    
                    
                    <li data-target="form_step_3" data-counter="2">Company Details</li>
                    <li data-target="form_step_4" data-counter="3">Packages</li>
                </ul>
            </div>
            <div class="px-sm-4 px-3 py-4 form-steps-main">
                <!-- Step 0 -->
                <div class="row form-steps-register d-flex active" id="form_step_0">
                    <div class="search-form-fields col-md-6 mb-3 search-form-request-cd">
                        <label class="f-medium">Name
                            <sup class="text-danger f-14">*</sup>
                            <span class="ms-auto float-end me-2 rtl-name">نام</span>
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
                        <label class="f-medium">Phone
                            <sup class="text-danger f-14">*</sup>
                            <span class="ms-auto float-end me-2 rtl-name">نمبر</span>
                        </label>
                        <input type='tel' id="phone" class="w-100" minlength="11"   required="required" name="number"/>
                        <span id="valid-msg" class="hide mt-2 text-success f-14">✓ Valid</span>
                        <span id="error-msg" class="hide text-danger mt-2 f-14"></span>
                    </div>
                    <div class="search-form-fields col-md-6 mb-3 search-form-request-cd">
                        <label class="f-medium">Password
                            <sup class="text-danger f-14">*</sup>
                            <span class="ms-auto float-end me-2 rtl-name">پاس ورڈ</span>
                        </label>
                        <input type="password" class="w-100" name="password" required="required" />
                    </div>
                    <div class="search-form-fields col-md-6 mb-3 search-form-request-cd">
                        <label class="f-medium">Applicant CNIC Number
                            <sup class="text-danger f-14"></sup>
                            <span class="ms-auto float-end me-2 rtl-name">شناختی کارڈ نمبر</span>
                        </label>
                        <input type="number" class="w-100" minlength="11"  name="cnic"/>
                    </div>
                    <div class="search-form-fields col-md-6 mb-3 search-form-request-cd">
                        <label class="f-medium">Date of Birth 
                            <span class="ms-auto float-end me-2 rtl-name">تاریخ</span></label>
                        </label>
                        <input type="date" class="w-100" name="date_birth"/>
                    </div>
                    <div class="search-form-fields col-md-6 mb-3 d-none">
                        <label class="f-medium">
                            Confirm Password
                            <sup class="text-danger f-14">*</sup>
                            <span class="ms-auto float-end me-2 rtl-name">پاس ورڈ کی تصدیق کریں</span>
                        </label>
                        <input type="Confirm Password" class="w-100" name="c_password" required="required" />
                    </div>

                    <div class="search-form-fields col-md-8 mx-auto d-none" id="search-form-request-cd">
                        <label class="f-medium">Enter Verification Code
                            <sup class="text-danger f-14">*</sup>
                            <span class="ms-auto float-end me-2 rtl-name">تصدیقی کوڈ درج کریں</span>
                        </label>
                        <input type="text" class="w-100" name="verification_code" id="verification_code" required="required" />
						<small style="color:orangered">If not found, Kindly check your spam/junk folder</small>
                        <!-- <a href="#" class="mt-2 text-end f-14 d-block text-decoration-none txb-color">Did'nt get the code? Resend</a> -->
                    </div>
                    
                </div>
                <!-- Step 1 -->
                
                <!-- Step 2 -->
                
                <!-- Step 3 -->
                <div class="row form-steps-register d-none" id="form_step_3">
                    <div class="search-form-fields col-md-6 mb-3">
                        <label class="f-medium">Company Name <sup class="text-danger f-14">*</sup>
                            <span class="ms-auto float-end me-2 rtl-name">کمپنی نام</span>
                        </label>
                        <input type="text" class="w-100" required="required" name="company_name" />
                    </div>
                    <div class="search-form-fields col-md-6 mb-3">
                        <label class="f-medium">Address<sup class="text-danger f-14">*</sup>
                            <span class="ms-auto float-end me-2 rtl-name">آفس کا پتہ</span>
                        </label>
                        <input type="text" class="w-100"  required="required" name="address" />
                    </div>
                    <div class="search-form-fields col-md-6 mb-3">
                        <label class="f-medium">Email(business optional)<span class="ms-auto float-end me-2 rtl-name">ای میل</span></label>
                        <input type="email" class="w-100"   name="user_email" />
                    </div>
                    <div class="search-form-fields col-md-6 mb-3">
                        <label class="f-medium">Package Start Date<sup class="text-danger f-14">*</sup>
                            <span class="ms-auto float-end me-2 rtl-name">تاریخ</span>
                        </label>
                        <input type="date" class="w-100"  required="required" name="reg_date"/>
                    </div>
                    <div class="search-form-fields col-md-6 mb-3">
                        <label class="f-medium">Website<span class="ms-auto float-end me-2 rtl-name">ویب سائٹ</span></label>
                        <input type="text" class="w-100"  name="website"/>
                    </div>
                    <div class="search-form-fields col-md-6 mb-3">
                        <label class="f-medium">Company Phone Number <sup class="text-danger f-14">*</sup>
                            <span class="ms-auto float-end me-2 rtl-name">کمپنی فون نمبر</span>
                        </label>
                        <input type="number" class="w-100" minlength="11"   required="required" name="company_phone_number	"/>
                    </div>
                    <div class="search-form-fields col-md-6 mb-3">
                        <label class="f-medium">Position
                            <sup class="text-danger f-14">*</sup>
                            <span class="ms-auto float-end me-2 rtl-name">عہدہ</span>
                        </label>
                        <input type="text" class="w-100"   required="required" name="position" />
                    </div>
                    <div class="search-form-fields col-md-6 mb-3">
                        <label class="f-medium">Signature<span class="ms-auto float-end me-2 rtl-name">
                            <sup class="text-danger f-14">*</sup>دستخط</span>
                        </label>
                        <input type="text" class="w-100"   required="required" name="signature" />
                    </div>
                    <div class="search-form-fields col-md-6 mb-3 group-radio-selection">
                        <label class="f-medium">Contract Type<sup class="text-danger f-14">*</sup><span class="ms-auto float-end me-2 rtl-name">معاہدہ کی نوعیت</span></label>
                        <div class="d-flex align-items-center">
                            <div class="form-group-checkbox me-3 mt-1">
                                <input type="radio" id="monthly" value="monthly" name="package_due">
                                <label for="monthly">Monthly (ماہانہ)</label>
                            </div>
                            <div class="form-group-checkbox me-3 mt-1">
                                <input type="radio" id="quarterly" value="quarterly" name="package_due">
                                <label for="quarterly">Quarterly (سہ ماہی)</label>
                            </div>
                            <div class="form-group-checkbox mt-1">
                                <input type="radio" id="yearly" value="yearly"  name="package_due">
                                <label for="yearly">Yearly (سالانہ)</label>
                            </div>
                        </div>
                    </div>
                    <div class="search-form-fields col-md-6 mb-3 group-radio-selection">
                        <label class="f-medium">Mode of Payment<sup class="text-danger f-14">*</sup><span class="ms-auto float-end me-2 rtl-name">ادائیگی کا طریقہ</span></label>
                        <div class="d-flex align-items-center">
                            <div class="form-group-checkbox me-3 mt-1">
                                <input type="radio" id="cash" value="Cash" name="payment_type">
                                <label for="cash">Cash (نقد / کیش)</label>
                            </div>
                            <div class="form-group-checkbox me-3 mt-1">
                                <input type="radio" id="bank_t" value="Bank Transfer" name="payment_type">
                                <label for="bank_t">Bank Transfer (بینک ٹرانسفر)</label>
                            </div>
                        </div>
                    </div>
                    <div class="search-form-fields col-md-12 mb-3">
                        <label class="f-medium">SECP or Professional Body Registration Number if any:
                            <span class="ms-auto float-end me-2 rtl-name">یا پروفیشنل باڈی سے رجسٹرڈ نمبر- اگر کوئی SECP</span>
                        </label>
                        <input type="text" class="w-100"  name="secp_registration" />
                    </div>
                    <div class="search-form-fields col-12 mb-3 group-check-selection">
                        <label class="f-medium">Please select ways you'd like to be connected<sup class="text-danger f-14">*</sup></label>
                        <div class="d-flex align-items-center">
                            <div class="form-group-checkbox me-3 mt-1">
                                <input type="checkbox" id="contact_Email" value="Email" name="contact_type[]">
                                <label for="contact_Email">Email (ای میل )</label>
                            </div>
                            <div class="form-group-checkbox me-3 mt-1">
                                <input type="checkbox" id="contact_sms" value="SMS" name="contact_type[]">
                                <label for="contact_sms">SMS (ایس ایم ایس)</label>
                            </div>
                            <div class="form-group-checkbox mt-1 me-3">
                                <input type="checkbox" id="contact_newsletter" value="Newsletter" name="contact_type[]">
                                <label for="contact_newsletter">Newsletter (نیوز لیٹر)</label>
                            </div>
                            <div class="form-group-checkbox mt-1">
                                <input type="checkbox" id="contact_telephone"  value="Telephone" name="contact_type[]">
                                <label for="contact_telephone">Telephone(فون نمبر)</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Step 4 -->
                <div class="row form-steps-register d-none" id="form_step_4">
                    <div class="package-table col-12 mb-3 group-radio-selection">
			     <table class="w-100" border-collpase="collapse">
                            <thead>
                                <tr>
                                    <th class="px-3 py-2" colspan="12">
                                        Please choose below packages based on your
                                        business model and it will describe the size of your company.
                                    </th>
                                </tr>
                            </thead>
								<tbody>
									<?php if($package_plan): ?>
									   <?php $i=0; ?>
										<?php $__currentLoopData = $package_plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p_plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($p_plan->name != 'Free'): ?>
								               <?php $i++; ?>
										<tr>
											<td class="py-2 px-3">
												<br>
												<p class="mb-3" style="margin-top: -10px;"><span style="background-color: <?php echo e($p_plan->color); ?>; padding: 4px 25px;"><b style="color:white"><?php echo e($p_plan->name); ?></b></span> You will get <b><?php echo e($p_plan->days); ?></b> Listings of your properties.<b style="float: right;">PKR: <?php echo e($p_plan->price); ?></b></p>
											</td>
											
											<td class="px-5 py-2">
												<div class="form-group-checkbox mb-2 text-center">
													<input type="radio" class="package" id="<?php echo e($p_plan->name); ?><?php echo e($p_plan->id); ?>" value="<?php echo e($p_plan->price); ?>" name="plan_id">
													<label for="<?php echo e($p_plan->name); ?><?php echo e($p_plan->id); ?>"></label>
													<input type="text" value="<?php echo e($p_plan->id); ?>" name="package_id[]">
													
												</div>
												
											</td>
										</tr>
											
											<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
							                              
								<textarea id="field_results" style="display: none" name="ads_id"></textarea>
								<tr>
									<th colspan="12" class="py-2 px-3" style="background-color: black; line-height: 35px">
                                        <strong style="color: white; float: left">Total</strong>
										<b id="price" style="float: right; color: white">Free</b>
                                    </th>
								</tr>
                            </tbody>
						</table>
                       <!--<table class="w-100" border-collpase="collapse">

                            <thead>
                                <tr>
                                    <th class="px-3 py-2" colspan="12">
                                        Please choose either A, B, C, D or E below packages based on your
                                        business model and it will describe the size of your company.
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td class="py-2 px-3">
                                        <p class="mb-3">A. <b>Basic Package</b>: you will get <b>15</b> Listings of your properties.</p>
                                        <p class="mb-0">B. <b>Silver Package</b>: you will get <b>40</b> Listings of your properties.  </p>
                                    </td>
                                    <td class="px-5 py-2">
                                        <div class="form-group-checkbox mb-2 text-center">
                                            <input type="radio" id="basic" value="2" name="plan_id">
                                            <label for="basic"></label>
                                        </div>
                                        <div class="form-group-checkbox  text-center">
                                            <input type="radio" id="silver" value="3"   name="plan_id">
                                            <label for="silver"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-3">
                                        <p class="mb-3">C. <b>Gold Package</b>: you will get <b>90</b> Listings of your properties.</p>
                                        <p class="mb-3">D. <b>Diamond Package</b>: you will get <b>170</b> Listings of your properties.</p>
                                        <p class="mb-0">E. <b>Platinum Package</b>: you will get <b>275</b> Listings of your properties.</p>
                                    </td>
                                    <td class="px-5 py-2">
                                        <div class="form-group-checkbox mb-2 text-center">
                                            <input type="radio" id="gold" value="4"  name="plan_id">
                                            <label for="gold"></label>
                                        </div>
                                        <div class="form-group-checkbox text-center">
                                            <input type="radio" id="diamond" value="5"  name="plan_id">
                                            <label for="diamond"></label>
                                        </div>
                                        <div class="form-group-checkbox mb-2 text-center">
                                            <input type="radio" id="platinum" value="6"  name="plan_id">
                                            <label for="platinum"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="12" class="py-2 px-3">
                                        Additional Adverting Mode:
                                    </th>
                                </tr>
                                <tr>
                                    <td class="py-2 px-3">
                                        <p class="mb-3">A. Main banner</p>
                                        <p class="mb-0">B. Right Side Banner</p>
                                    </td>
                                    <td class="px-5 py-2">
                                        <div class="form-group-checkbox mb-2 text-center">
                                            <input type="checkbox" id="advertise-main" value="Main banner" name="advertise[]">
                                            <label for="advertise-main"></label>
                                        </div>
                                        <div class="form-group-checkbox text-center">
                                            <input type="checkbox" id="advertise-side" value="Right side banner"  name="advertise[]">
                                            <label for="advertise-side"></label>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table> -->
                    </div>
                </div>
                <div class="d-flex align-items-center mb-3 mt-4">
                    <div class="form-submit-btn me-5">
                        <button type="button" class="border-0 f-medium rounded-btn px-md-5 px-3
                            py-2 bg-theme text-white d-none" id="prev-trigger">
                            <i class="bi bi-arrow-left me-1"></i> Prev
                        </button>
                    </div>
                    <div class="ms-auto form-submit-btn">
                        <button type="button" class="border-0 f-medium rounded-btn px-md-5 px-3
                            py-2 bg-theme text-white position-relative" id="next-trigger">
                            Next <i class="bi bi-arrow-right ms-1"></i>
                        </button>
                        <button type="submit" class="border-0 f-medium rounded-btn px-md-5 px-3
                            py-2 bg-theme text-white d-none" id="submit-trigger">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<script src="<?php echo e(asset('libraries/sweet-alert/sweet_alert_v2.min.js')); ?>"></script>
<script src="<?php echo e(asset('libraries/intel-validation/int_tel.js')); ?>"></script>

<script>
    var form_parents = $('.form-steps-main .form-steps-register'),
    is_verified = false,
    reg_email = "";
    verification_token = "";
    var input = document.querySelector("#phone");
    errorMsg = document.querySelector("#error-msg"),
    validMsg = document.querySelector("#valid-msg");
    // here, the index maps to the error code returned from getValidationError - see readme
    var errorMap = ["Invalid number", "Invalid country code", "Number is too short", "Number is too long", "Invalid number"];

    // initialise plugin
    var iti = window.intlTelInput(input, {
        utilsScript: "<?php echo e(asset('libraries/intel-validation/utils.js')); ?>",
        separateDialCode: true,
        allowDropdown:false,
        initialCountry:"PK",
        autoPlaceholder:"off"
    });

    var reset = function() {
    input.classList.remove("error");
    errorMsg.innerHTML = "";
    errorMsg.classList.add("hide");
    errorMsg.style.display="none";
    validMsg.classList.add("hide");
    validMsg.style.display="none";
    };

    // on blur: validate
    input.addEventListener('blur', function() {
    reset();
    if (input.value.trim()) {
        if (iti.isValidNumber()) {
        validMsg.classList.remove("hide");
        validMsg.style.display="block";
        } else {
        input.classList.add("error");
        var errorCode = iti.getValidationError();
        errorMsg.innerHTML = errorMap[errorCode];
        errorMsg.classList.remove("hide");
        errorMsg.style.display="block";
        }
    }
    });
    // on keyup / change flag: reset
    input.addEventListener('change', reset);
    input.addEventListener('keyup', reset);
    $('#next-trigger').click(function() {
        var activeStep = '.form-steps-main .form-steps-register.active';
        is_valid = 0;
        $(activeStep).find('input[required="required"]').each(function(){
            if($(this).is(":visible")){
                if ($(this).val().replace(/[\s]/, '') == '') {
                    $(this).addClass('border-danger');
                    is_valid;
                }else{
                    $("#second_name").val($("#first_name").val());
                    $("#second_email").val($("#register-email").val());
                    $("#second_phone").val($("#first_phone").val());

                    $(this).removeClass('border-danger');
                    is_valid++;
                }
            }
        })
        if(is_valid!==$(activeStep).find('input[required="required"]').filter(':visible').length){
            return;
        }else{
            is_valid = 0;
        }
        if($(activeStep).find('.group-radio-selection').length > 0) {
            $(activeStep).find('.group-radio-selection').each(function(){
                if($(this).find('input[type="radio"]:checked').length>0){
                    $(this).find('.radio-error').remove();
                    is_valid++;
                }else{
                    $('.radio-error').remove();
                    $(this).append('<p class="mb-0 text-danger mt-2 radio-error f-14">Please choose 1 option</p>');
                    is_valid--;
                }
            })
            if(is_valid!==$(activeStep).find('.group-radio-selection').length){
                return;
            }else{
                is_valid = 0;
            }
        }
        var id = $(activeStep).
        next().prop('id');
        var currentId = $(activeStep).prop('id');
        if($('#search-form-request-cd').is(":visible")){
            if(verification_token!==$('#search-form-request-cd input').val()){
                Swal.fire(
                    "",
                    "Verification code did'nt matched",
                    'error'
                )
                return;
            }
            is_verified = true;
            reg_email = $('#register-email').val();
            $(activeStep).
            next().removeClass('d-none').addClass('d-flex active').
            prev().removeClass('d-flex active').addClass('d-none');
            $('.progress-steps li[data-target='+currentId+']').addClass('active').prevAll().addClass('active');
        }else if($(form_parents).eq(0).hasClass('active')){
            if($(errorMsg).is(':visible')) return;
            if(is_verified==true && $('#register-email').val() == reg_email ){
                $(activeStep).
                next().removeClass('d-none').addClass('d-flex active').
                prev().removeClass('d-flex active').addClass('d-none');
                $('.progress-steps li[data-target='+currentId+']').addClass('active').prevAll().addClass('active');
                $('#prev-trigger').removeClass('d-none');
            }else{

                var formData = new FormData();
                formData.append('email', $('#register-email').val());
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "<?php echo e(route('dealer.verfication_code')); ?>",
                    type: "post",
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function(){
                        $('#next-trigger').addClass('loader-request').prop('disabled',true);
                    },
                    success: function( response ) {
                        Swal.fire(
                            'Verification Code',
                            response.message,
                            'success'
                        );
                        $('.search-form-request-cd').addClass("d-none").removeClass('d-block');
                        $('#search-form-request-cd').removeClass("d-none").addClass('d-block');
                        $('#next-trigger').removeClass('loader-request').prop('disabled',false);
                        $('#prev-trigger').removeClass('d-none');
                        verification_token = response.code;
                    },
                    error:function(response) {
                        $('#next-trigger').removeClass('loader-request').prop('disabled',false);
                        if(response.responseJSON.errors.email){
                            Swal.fire(
                                'Email',
                                response.responseJSON.errors.email[0],
                                'error'
                            )
                        }else{
                            Swal.fire(
                                'Oops',
                                'Something went woring',
                                'error'
                            )
                        }
                    }
                });

            }
        }else{
            if($(form_parents).eq(form_parents.length - 1).hasClass('active')){
                send_signup_request();
            }else {
                $(activeStep).
                next().removeClass('d-none').addClass('d-flex active').
                prev().removeClass('d-flex active').addClass('d-none');
                $('.progress-steps li[data-target='+currentId+']').addClass('active').prevAll().addClass('active');
            }
        }
    });
    $('#prev-trigger').click(function(){
        var id = $('.form-steps-main .form-steps-register.active').
        prev().prop('id');
        $('.form-steps-main .form-steps-register.active').
        prev().removeClass('d-none').addClass('d-flex active').
        next().removeClass('d-flex active').addClass('d-none');
        $('.progress-steps li[data-target='+id+']').addClass('active').nextAll().removeClass('active');
        if($(form_parents).eq(0).hasClass('active')){
            $('.search-form-request-cd').addClass("d-block").removeClass('d-none');
            $('#search-form-request-cd').removeClass("d-block").addClass('d-none');
            $('#prev-trigger').addClass('d-none');
            $('.progress-steps li').removeClass('active');
        }else{
            $('#prev-trigger').removeClass('d-none');
        }
        if($('#search-form-request-cd').is(":visible")){
            $('.search-form-request-cd').addClass("d-block").removeClass('d-none');
            $('#search-form-request-cd').removeClass("d-block").addClass('d-none');
            return;
        }
        $('#submit-trigger').addClass('d-none');
        $('#next-trigger').removeClass('d-none');
    });
    function send_signup_request() {
        $(".spinner-border-sm").show();
        var formData = new FormData($('#form-signup-dealer')[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "<?php echo e(route('store.dealer')); ?>" ,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function(){
                $('#next-trigger').addClass('loader-request').prop('disabled',true);
            },
            success: function( response ) {
                $(".spinner-border-sm").hide();
                $('#res_message').show();
                $('#res_message').html(response.message);
                Swal.fire({
                    text:'Thank you for submitting your registration as a dealer. Shinny View representative will contact you after review.',
                    icon:'success',
                    customClass: {
                    container: 'custom-text-style',
                    }
                })
                setTimeout(() => {
                    $('#next-trigger').removeClass('loader-request').prop('disabled',false);
                    window.location.href="<?php echo e(route('login')); ?>"
                }, 24000); 
            },
            error:function() {
                $('#next-trigger').removeClass('loader-request').prop('disabled',false);
                Swal.fire(
                    'Oops',
                    'Something went woring',
                    'error'
                )

            }
        });
    }
  
    $(function(){
      $(".package").click(function(){
			var package = $('input[name=plan_id]:checked').val();
			var total = parseInt(package);
		    if(total == 0 || isNaN(total)){
						$('#price').html('Free');
					}
					else{
						$('#price').html('PKR: ' + total);
					}
					
        });
	});    
	
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/frontend/dealer_register.blade.php ENDPATH**/ ?>