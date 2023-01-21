
<?php $__env->startSection('content'); ?>
    <link  rel="stylesheet" type="text/css" href="<?php echo e(asset('css/util.css')); ?>" />
	<?php
			use Illuminate\Support\Carbon;
	 		$data =  DB::table('package_plan')->where('id',Auth::user()->plan_id)->first();
					$to = \Carbon\Carbon::createFromFormat('Y-m-d', Auth::user()->plan_expired_date);
					$from = \Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
					$diff_in_days = $to->diffInDays($from);
	?>
	<?php if(Auth::user()->status == 1 &&  $diff_in_days >= 0): ?>
    <div class="py-4">
        <div class="bg-white card-body-content">
            <div class="search-form-header bg-theme-dark">
                <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Add Property
                    <span class="txb-color">Form</span>
                </h5>
            </div>
			<h6 class="mb-0 text px-4 py-3 text-center f-medium" style="color:red">Total Property Allowed: 
				<?php if($package): ?>
				(<?php echo e($total_sale_property+$total_rent_property+$total_lease_property); ?>/<?php echo e($package->property); ?>)
				<?php endif; ?>
			</h6>
				<?php
					$user_pro = $total_sale_property+$total_rent_property+$total_lease_property;
				?>
			<?php if($package): ?>
			
		   	<?php if($user_pro < $package->property): ?>
            <div class="form-main-wrap px-5 py-4">
                <div class="progress-container pb-5 mt-0">
                    <ul class="progress-steps ps-0">
                        <li data-target="form_step_0" data-counter="1">Function Type</li>
                        <li data-target="form_step_1" data-counter="2">Contact details</li>
                        <li data-target="form_step_2" data-counter="3">details & Features</li>
                        <li data-target="form_step_3" data-counter="4">Photo  and Price</li>
                    </ul>
                </div>
                <form class="w-100 mt-5 form-steps-main" method="POST" id="form">
                    <div class="row form-steps-register property-check-data active" id="form_step_0">
                        <div class="form-elements-wrap col-12">
                            <label class="f-medium mb-2">
                                Purpose <sup class="text-danger">*</sup>
                            </label>
                        </div>
                        <div class="col-12 mb-4 property-checkbox d-flex flex-wrap">
                            <div class="form-group-checkbox me-3 mt-1 p_purpose">
                                <input type="radio" id="for_sale" value="1" name="purpose_id">
                                <label for="for_sale">For Sale</label>
                            </div>
                            <div class="form-group-checkbox me-3 mt-1 p_purpose">
                                <input type="radio" id="for_rent" value="2" name="purpose_id">
                                <label for="for_rent">For Rent</label>
                            </div>
                            <div class="form-group-checkbox me-3 mt-1 p_purpose">
                                <input type="radio" id="on_lease" value="3" name="purpose_id">
                                <label for="on_lease">On Lease</label>
                            </div>
                        </div>
                        <div class="form-elements-wrap col-12 mt-3">
                            <label class="f-medium mb-2">
                                Purpose Type  <sup class="text-danger">*</sup>
                            </label>
                        </div>
                        <div class="col-12 mb-4 property-checkbox parent-checkboxes d-flex flex-wrap">
                            <div class="form-group-checkbox me-3 mt-1 p_type">
                                <input type="radio" id="for_residential" value="1" name="property_type_id" data-type="home">
                                <label for="for_residential">Residential</label>
                            </div>
                            <div class="form-group-checkbox me-3 mt-1 p_type">
                                <input type="radio" id="for_commercial" value="2" name="property_type_id" data-type="commercial">
                                <label for="for_commercial">Commercial</label>
                            </div>
                            
                        </div>
                        <!-- For Home -->
                        <div class="col-xl-9 col-lg-10 property-check-buttons" id="property-check-home" style="display:none;">
                            <div class="w-100 mb-4 property-checkbox d-flex flex-wrap">
                                <div class="form-group-checkbox me-3 mt-2 pp_type_inner">
                                    <input type="radio" id="House" value="1" name="purpose_type_inner_id">
                                    <label for="House">House</label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2 pp_type_inner">
                                    <input type="radio" id="Apartment" value="2" name="purpose_type_inner_id">
                                    <label for="Apartment">Apartment</label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2 pp_type_inner">
                                    <input type="radio" id="Uper_Portion" value="3" name="purpose_type_inner_id">
                                    <label for="Uper_Portion">Uper Portion</label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2 pp_type_inner">
                                    <input type="radio" id="Lower_Portion" value="4" name="purpose_type_inner_id">
                                    <label for="Lower_Portion">Lower Portion</label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2 pp_type_inner">
                                    <input type="radio" id="Farm_House" value="5" name="purpose_type_inner_id">
                                    <label for="Farm_House">Farm House</label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2 pp_type_inner">
                                    <input type="radio" id="Penthouse" value="6" name="purpose_type_inner_id">
                                    <label for="Penthouse">Penthouse</label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2 pp_type_inner">
                                    <input type="radio" id="Residential_Plot" data-required="required" value="16" name="purpose_type_inner_id">
                                    <label for="Residential_Plot"> Plot</label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2 pp_type_inner">
                                    <input type="radio" id="File" value="18" data-required="required" name="purpose_type_inner_id">
                                    <label for="File">File </label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2 pp_type_inner">
                                    <input type="radio" id="Room" value="7" name="purpose_type_inner_id">
                                    <label for="Room">Room</label>
                                </div>
                            </div>
                        </div>
                        <!-- For Commercial -->

                        <div class="col-xl-9 col-lg-10 property-check-buttons p-check-commercial" id="property-check-commercial" style="display:none;">
                            <div class="w-100 mb-4 property-checkbox d-flex flex-wrap">
                                <div class="form-group-checkbox me-3 mt-2 pp_type_inner">
                                    <input type="radio" id="Office " value="9" name="purpose_type_inner_id">
                                    <label for="Office ">Office </label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2 pp_type_inner">
                                    <input type="radio" id="Shop" value="10" name="purpose_type_inner_id">
                                    <label for="Shop">Shop</label>
                                </div>

                                <div class="form-group-checkbox me-3 mt-2 pp_type_inner">
                                    <input type="radio" id="warehouse " value="11" name="purpose_type_inner_id">
                                    <label for="warehouse ">Warehouse </label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2 pp_type_inner">
                                    <input type="radio" id="factory" value="12" name="purpose_type_inner_id">
                                    <label for="factory">Factory</label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2 pp_type_inner">
                                    <input type="radio" id="Building " value="13" name="purpose_type_inner_id">
                                    <label for="Building ">Building </label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2 pp_type_inner">
                                    <input type="radio" id="Land " value="14" name="purpose_type_inner_id">
                                    <label for="Land ">Land </label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2 pp_type_inner">
                                    <input type="radio" id="Comercial_Plot"  value="16" name="purpose_type_inner_id">
                                    <label for="Comercial_Plot">Plot </label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2 pp_type_inner">
                                    <input type="radio" id="File" value="18" data-required="required" name="purpose_type_inner_id">
                                    <label for="File">File </label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2 pp_type_inner">
                                    <input type="radio" id="Other" value="15" name="purpose_type_inner_id">
                                    <label for="Other">Other</label>
                                </div>
								 
                            </div>
                        </div>

                        <!-- For Plot -->

                        

                        <!-- <div class="col-12 mt-3 text-end">
                            <button type="submit"
                                class="border-0 bg-theme py-2
                            f-medium px-5 text-white">
                                Submit

                            </button>
                            <span class="spinner-border spinner-border-sm" style="display: none"></span>
                        </div> -->
                    </div>
                    <div class="row form-steps-register d-none" id="form_step_1">
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Province <sup class="text-danger">*</sup>
                                </label>
                                <div class="position-relative d-flex flex-column-reverse">
                                    <select name="province_id" id="select2-province" onchange="getCity(this.value)"
                                        class="form-select-list w-100" data-required="required">
                                        <option value="" selected disabled>Select Province</option>
                                        <?php $__currentLoopData = $province; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($p->id); ?>"><?php echo e($p->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                    <div
                                        class="position-absolute field-icon d-flex
                                    align-items-center justify-content-center">
                                        <i class="bi bi-pin-map"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    City <sup class="text-danger">*</sup>

                                </label>

                                <div class="position-relative d-flex flex-column-reverse">
                                    <select name="city_id"  id="select2-city" data-required="required" class="form-select-list w-100"  onchange="getAddress(this.value)" >
                                        

                                    </select>
                                    <div
                                        class="position-absolute field-icon d-flex
                                    align-items-center justify-content-center">
                                        <i class="bi bi-geo"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Address <sup class="text-danger">*</sup>
                                </label>
                                <div class="position-relative d-flex flex-column-reverse">
                                    <select name="address_id" id="select2-address" class="form-select-list w-100" data-required="required"
                                    >
                                       

                                    </select>
                                    <div
                                        class="position-absolute field-icon d-flex
                                    align-items-center justify-content-center">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Email <sup class="text-danger" >*</sup>
                                </label>
                                <div class="position-relative">
                                    <input type="email" class="w-100" name="email" data-required="required" value="<?php echo e(Auth::user()->email); ?>" readonly   />
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
                                    Phone Number <sup class="text-danger">*</sup>
                                </label>
                                <div class="position-relative">
                                    <input type='tel' id="phone" class="w-100" name="phone_num" data-required="required" value="<?php echo e(Auth::user()->company_phone_number); ?>" readonly />
                                    <span id="valid-msg" class="hide mt-2 text-success f-14">✓ Valid</span>
                                    <span id="error-msg" class="hide text-danger mt-2 f-14"></span>
                                </div>
                            </div>
                        </div>
						 <div class="col-md-6 col-lg-4 mb-4">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Posted by
                                </label>
                                <div class="position-relative">
                                    <input type='text' id="emp_name" class="w-100" name="emp_name" />
                                    <span id="error-msg" class="hide text-danger mt-2 f-14"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-steps-register d-none" id="form_step_2">
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Title of Property <sup class="text-danger">*</sup>
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" id="name" name="name" data-required="required"
                                            />
                                    <div
                                        class="position-absolute field-icon d-flex
                                    align-items-center justify-content-center">
                                        <i class="bi bi-card-heading"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Land Area</sup>
                                </label>
                                <div class="position-relative d-flex flex-column-reverse">
                                    <select name="area" class="form-select-list w-100" data-required="required" >
                                        <option selected disabled value="">Select Land Area</option>
                                        <option value="Square Feet">Square Feet</option>
                                        <option value="Square Yards">Square Yards</option>
                                        <option value="Square Meters">Square Meters</option>
                                        <option value="Marla">Marla</option>
                                        <option value="Kanal">Kanal</option>
                                    </select>
                                    <div
                                        class="position-absolute field-icon d-flex
                                    align-items-center justify-content-center">
                                        <i class="bi bi-bounding-box-circles"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Size
                                </label>
                                <div class="position-relative">
                                    <input type="number" class="w-100" name="size" minlength="1" data-required="required"
                                        />
                                    <div
                                        class="position-absolute field-icon d-flex
                                    align-items-center justify-content-center">
                                        <img src="<?php echo e(asset('images/svg/selection.svg')); ?>" alt="size" height="20px" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 py-4">
                            <h5 class="f-medium mb-0 heading-text text-capitalize">
                                property features
                            </h5>
                            <small class="text-danger f-13">(6 Features must be selected)</small>
                        </div>
                        <div class="col mb-3 flooring">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Flooring Type
                                </label>
                                <div class="position-relative d-flex flex-column-reverse">
                                    <select name="flooring_type" class="form-select-list w-100">
                                        <option value="" selected disabled>Select Flooring</option>
                                        <option value="Tiles">Tiles</option>
                                        <option value="Marble">Marble</option>
                                        <option value="Wooden">Wooden</option>
                                        <option value="Chip">Chip</option>
                                        <option value="Cement">Cement</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <div
                                        class="position-absolute field-icon d-flex
                                        align-items-center justify-content-center">
                                        <i class="bi bi-bricks"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-3 electricity">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Electricity Backup
                                </label>
                                <div class="position-relative d-flex flex-column-reverse">
                                    <select name="electriccity_backup" class="form-select-list w-100">
                                        <option value="" selected disabled>Select Backup</option>
                                        <option value="None">None</option>
                                        <option value="Generator">Generator</option>
                                        <option value="Ups">UPS</option>
                                        <option value="Solar">Solar</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <div
                                        class="position-absolute field-icon d-flex
                                        align-items-center justify-content-center">
                                        <i class="bi bi-battery-charging"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-3 bedroom">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Bedroom
                                </label>
                                <div class="position-relative">
                                    <input type="number" class="w-100" name="bedroom" minlength="1"
                                        />
                                    <div
                                        class="position-absolute field-icon d-flex
                                    align-items-center justify-content-center">
                                        <img src="<?php echo e(asset('images/svg/bed.svg')); ?>" alt="bedroom" height="25px" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-3 bathroom">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Bathroom
                                </label>
                                <div class="position-relative">
                                    <input type="number" class="w-100" name="bath" minlength="1"
                                    maxlength="2"
                                         />
                                    <div
                                        class="position-absolute field-icon d-flex
                                    align-items-center justify-content-center">
                                        <img src="<?php echo e(asset('images/svg/bath-tub.svg')); ?>" alt="Bathroom" height="20px" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 property-check-data col-12 mb-4" id="min-prop-checked">
                            <div class="form-elements-wrap">
                                <div class="property-checkbox d-flex flex-wrap">
                                    
                                    <div class="home-features d-flex flex-wrap">
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Furnished" value="furnished" name="property_feature[]">
                                            <label for="Furnished">Furnished</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="car_porch" value="car porch" name="property_feature[]">
                                            <label for="car_porch">Car Porch</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Double_glazed_window" value="Double glazed window" name="property_feature[]">
                                            <label for="Double_glazed_window">Double glazed window</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Central_Air_conditioning" value="Central Air conditioning" name="property_feature[]">
                                            <label for="Central_Air_conditioning">Central Air-conditioning</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Central_Heating" value="Central Heating" name="property_feature[]">
                                            <label for="Central_Heating">Central Heating</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Garden" value="Garden" name="property_feature[]">
                                            <label for="Garden">Garden</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Kitchens" value="Kitchens" name="property_feature[]">
                                            <label for="Kitchens">Kitchens</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Sitting_Room" value="Sitting Room" name="property_feature[]">
                                            <label for="Sitting_Room">Sitting  Room</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Study_Room" value="Study Room" name="property_feature[]">
                                            <label for="Study_Room">Study  Room</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Store_Room" value="Store Room" name="property_feature[]">
                                            <label for="Store_Room">Store  Room</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Dinning_Room" value="Dinning Room" name="property_feature[]">
                                            <label for="Dinning_Room">Dinning Room</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Laundry_Room" value="Laundry Room" name="property_feature[]">
                                            <label for="Laundry_Room">Laundry Room</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Servant_Quarter" value="Servant Quarter" name="property_feature[]">
                                            <label for="Servant_Quarter">Servant Quarter</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Internet_Access" value="Internet Access" name="property_feature[]">
                                            <label for="Internet_Access">Internet Access</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Satellite_Cable_TV" value="Satellite Cable TV" name="property_feature[]">
                                            <label for="Satellite_Cable_TV">Satellite or Cable TV</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Intercom" value="Intercom" name="property_feature[]">
                                            <label for="Intercom">Intercom</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="CCTV" value="CCTV" name="property_feature[]">
                                            <label for="CCTV">CCTV</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Swimming_Pool" value="Swimming Pool" name="property_feature[]">
                                            <label for="Swimming_Pool">Swimming Pool</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Gym" value="Gym" name="property_feature[]">
                                            <label for="Gym">Gym</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Sauna" value="Sauna" name="property_feature[]">
                                            <label for="Sauna">Sauna</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Jacuzzi" value="Jacuzzi" name="property_feature[]">
                                            <label for="Jacuzzi">Jacuzzi</label>
                                        </div>
                                    </div>
                                    
                                    <div class="nearest-places d-flex flex-wrap">
                                        <div class="np-title">Nearest Places</div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Schools" value="Schools" name="property_feature[]">
                                            <label for="Schools">Schools</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Hospital" value="Hospital" name="property_feature[]">
                                            <label for="Hospital">Hospital</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Shopping_Centre" value="Shopping Centre" name="property_feature[]">
                                            <label for="Shopping_Centre">Shopping Centre</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Hotel" value="Hotel" name="property_feature[]">
                                            <label for="Hotel">Hotel</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Cinema" value="Cinema" name="property_feature[]">
                                            <label for="Cinema">Cinema</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Public_transport_services" value="Public transport services" name="property_feature[]">
                                            <label for="Public_transport_services">Public transport services</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Mosque" value="Mosque" name="property_feature[]">
                                            <label for="Mosque">Mosque</label>
                                        </div>
                                        <div class="form-group-checkbox me-3 mt-3">
                                            <input type="checkbox" id="Park" value="Park" name="property_feature[]">
                                            <label for="Park">Park</label>
                                        </div>
                                        <div class="col-12 mb-3 airport">
                                            <div class="form-elements-wrap">
                                                <label class="f-medium mb-2">
                                                    Airport (Km)
                                                </label>
                                                <div class="position-relative">
                                                    <input type="number" class="w-100" name="airport_km"
                                                    />
                                                    <div
                                                        class="position-absolute field-icon d-flex
                                                        align-items-center justify-content-center">
                                                        <i class="bi bi-signpost"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row form-steps-register d-none" id="form_step_3">
                         <div class="col-md-6 col-lg-4 mb-4">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Youtube Link
                                 </label>
                                <div class="position-relative">
                                    <input type="text" name="youtube_link" placeholder="Youtube Link"
                                    class="img-preview-upload w-100" />
                                    <div
                                        class="position-absolute field-icon d-flex
                                        align-items-center justify-content-center">
                                        <i class="bi bi-youtube text-danger"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Main/Featured Images <sup class="text-danger">*</sup>
                                </label>
                                <div class="position-relative">
                                    <input type="file" data-index="0" class="img-preview-upload form-control"
                                        name="featured_image" data-required="required"  accept="image/*" />
                                    <div class="output-img d-flex flex-wrap border mt-2 pt-2 px-2 d-none">
                                    </div>
                                    <small class="text-danger f-13">(Only 1 Features Image)</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Gallery Images
                                </label>
                                <div class="position-relative">
                                    <input type="file" data-index="1" class="img-preview-upload form-control" multiple
                                        name="gallery_image[]" accept="image/*" data-required="required" />
                                    <div class="output-img d-flex flex-wrap border mt-2 pt-2 px-2 d-none">
                                    </div>
                                    <small class="text-danger f-13">(Max <?php echo e($package->picture); ?> Gallery Images)</small>
                                </div>
                            </div>
                        </div>
						<div class="col-md-6 col-lg-4 mb-4">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Property Price <sup class="text-danger">*</sup>
                                </label>
                                <div class="position-relative">
                                    <input type="number" class="w-100" name="price"
                                    data-required="required" />
                                    <div
                                        class="position-absolute field-icon d-flex
                                        align-items-center justify-content-center">
                                        <i class="bi bi-cash-coin"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-12 col-lg-10 col-xl-9 mb-4">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Description
                                </label>
                                <div class="position-relative">
                                    <textarea class="w-100 d-block" required name="description" placeholder="Please minium 5 words required" cols="4" rows="6"></textarea>
                                    <div class="output-img d-flex flex-wrap border mt-2 pt-2 px-2 d-none">
                                    </div>
                                </div>
                            </div>
                        </div>
					<!--	<hr style="border: 5px solid #BC985F;">
						<h3>Get More Reach On Your Ad!</h3>
						<div class="package-table col-12 mb-3 group-radio-selection">
                        <table class="w-100" border-collpase="collapse" style="border: 1px solid lightgrey;">

                            <thead>
                                <tr>
                                    <th class="px-3 py-2" colspan="12" style="background-color: lightgray">
                                        Additional Packages
                                    </th>
                                </tr>
                            </thead>
						
                            <tbody>
								<?php if(Auth::user()->role_type == 'Private Seller'): ?>
									<?php if($package_plan): ?>
									   <?php $i=0; ?>
										<?php $__currentLoopData = $package_plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p_plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($p_plan->name != 'Free'): ?>
								               <?php $i++; ?>
										<tr>
											<td class="py-2 px-3">
												<br>
												<p class="mb-3" style="margin-top: -10px;"><span style="background-color: <?php echo e($p_plan->color); ?>; padding: 4px 25px;"><b style="color:white"><?php echo e($p_plan->name); ?></b></span> You will get <b><?php echo e($p_plan->days); ?></b> Listings of your properties.<b style="float: right;">PKR: <?php echo e($p_plan->price); ?></b></p>
												
												<hr style="border: 0.2px solid #BC985F;">
											</td>
											
											<td class="px-5 py-2">
												<div class="form-group-checkbox mb-2 text-center">
													<input type="checkbox" class="package" id="<?php echo e($p_plan->name); ?><?php echo e($p_plan->id); ?>" value="<?php echo e($p_plan->price); ?>" name="plan_id">
													<label for="<?php echo e($p_plan->name); ?><?php echo e($p_plan->id); ?>"></label>
													<input type="text" value="<?php echo e($p_plan->id); ?>" name="package_id">
													
												</div>
												
											</td>
										</tr>
											
											<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								<?php endif; ?>
                              
								<hr style="border: 5px solid #BC985F;">
                                <tr>
                                    <th colspan="12" class="py-2 px-3" style="background-color: lightgray">
                                        Additional Adverting Mode:
                                    </th>
                                </tr>
						<?php if($advert_plan): ?>
						   <?php $i=0; ?>
							<?php $__currentLoopData = $advert_plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a_plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php $i++; ?>
								
                                <tr>
                                    <td class="py-2 px-3">
										<br>
                                        <p class="mb-3" style="margin-top:<?php //if($a_plan->name == 'Prime Dealer') echo '-10px'; elseif($a_plan->name == 'Prime Dealer') echo '-35px'?>"><span style="background-color: <?php //if($a_plan->name == 'Main Banner') echo 'deepskyblue;'; elseif($a_plan->name == 'Prime Dealer') echo 'forestgreen;';elseif($a_plan->name == 'Boost Property') echo 'purple;';elseif($a_plan->name == 'Feature Property') echo 'orangered;';?> padding: 4px 25px;"><b style="color:white"><?php echo e($a_plan->name); ?></b></span> Advertise your business <?php echo e($a_plan->name); ?> on our Home page<b style="float: right;">PKR: <?php echo e($a_plan->price); ?></b></p>
                                        <!--<p class="mb-0">B. Right Side Banner</p>-->
								<!--		<hr style="border: 0.2px solid #BC985F;">
                                    </td>
									
                                    <td class="px-5 py-2">
                                        <div class="form-group-checkbox mb-2 text-center">
                                            <input type="checkbox" class="addon" id="<?php echo e($a_plan->name); ?>" value="<?php echo e($a_plan->price.','.$a_plan->id); ?>" name="advertise">
                                            <label for="<?php echo e($a_plan->name); ?>"></label>
											<input type="hidden" value="<?php echo e($a_plan->id); ?>" name="advertise_id">
                                        </div>
                                       
                                    </td>
                                </tr>
								
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
                    </div>   -->
						
						<!--- -->
						
                        <span id="res_message" class="text-danger"></span>
                    </div>
                    <div class="d-flex align-items-center mb-3 mt-4">
                        <div class="form-submit-btn me-5">
                            <button type="button" class="border-0 f-medium rounded-btn  px-3
                                py-2 bg-theme text-white d-none" id="prev-trigger">
                                <i class="bi bi-arrow-left me-1"></i> Prev
                            </button>
                        </div>
                        <div class="ms-auto form-submit-btn">
                            <button type="button" class="border-0 f-medium rounded-btn px-3
                                py-2 bg-theme text-white position-relative" id="next-trigger">
                                Next <i class="bi bi-arrow-right ms-1"></i>
                            </button>
                            <button type="submit" class="border-0 f-medium rounded-btn  px-3
                                py-2 bg-theme text-white d-none" id="submit-trigger">
                                Submit
                                <span class="spinner-border spinner-border-sm" style="display: none"></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
		   <?php else: ?>
					<div class="row">
						<div class="col-md-12">
				 			<div class="alert alert-danger">
								<h5 class="mb-0 text px-4 py-3 text-center f-medium">
									Wow! you have posted all your free Shinny View Property Ads.
								</h5>
					 			<h6 class="mb-0 text px-4 py-3 text-center f-medium">
									Buy a new package or upgrade your existing Shinny View Property Package to continue your posting Ads. 
									<a href="<?php echo e(route('packages-details')); ?>">click here (Buy Now!)</a>
								</h6>
				 			</div>
						</div>
    				</div>	
			
		    <?php endif; ?>
		  <?php endif; ?>
        </div>
    </div>
	<?php else: ?>
	<div class="row">
            <div class="col-md-12">
                
				<div class="alert alert-danger">
					<h6><b>Your Shinny View Ad Posting Package is Expired!</b></h6>
					<hr>
					<p>Renew your package plan to continue accessing Ad posting and other benefits.</p>
					<small><a href="<?php echo e(route('packages-details')); ?>"><i>Click here</i></a> to buy new package.</small>
				</div>
            </div>
        </div>
	<?php endif; ?>
    <script src="<?php echo e(asset('libraries/intel-validation/int_tel.js')); ?>"></script>
    <script>
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

        $('.parent-checkboxes input').on('change',function(){
            if($(this).prop('checked')==true){
                var target = $(this).attr('data-type');
                $('.property-check-buttons').hide();
                $('#property-check-'+target).slideDown();
                // $('#property-check-'+target 'input').prop('checked')
                // filter for plots
                // if($(this).val() == '2') || $(this).val() == '3'){
                if($(this).val() == '2'){
                    $('.home-features').css({'visibility':'hidden','height':'0'});
                    $('.flooring').css({'display':'none'});
                    $('.electricity').css({'display':'none'});
                    $('.bedroom').css({'display':'none'});
                    $('.bathroom').css({'display':'none'});
                }else{
                    $('.home-features').css({'visibility':'visible','height':'auto'});
                    $('.flooring').css({'display':'block'});
                    $('.electricity').css({'display':'block'});
                    $('.bedroom').css({'display':'block'});
                    $('.bathroom').css({'display':'block'});
                }
            }
        });

        // filter for residential
        $('#property-check-home input').on('change',function(){
            console.log($(this).val());
            if($(this).prop('checked')==true){
                if($(this).val() == '16'){
                    $('.home-features').css({'visibility':'hidden','height':'0'});
                    $('.flooring').css({'display':'none'});
                    $('.electricity').css({'display':'none'});
                    $('.bedroom').css({'display':'none'});
                    $('.bathroom').css({'display':'none'});
                }else if($(this).val() == '18'){
                    $('.home-features').css({'visibility':'hidden','height':'0'});
                    $('.flooring').css({'display':'none'});
                    $('.electricity').css({'display':'none'});
                    $('.bedroom').css({'display':'none'});
                    $('.bathroom').css({'display':'none'});
                }else if($(this).val() == '7'){
                    $('.home-features').css({'visibility':'hidden','height':'0'});
                    $('.flooring').css({'display':'none'});
                    $('.electricity').css({'display':'none'});
                    $('.bedroom').css({'display':'none'});
                    $('.bathroom').css({'display':'none'});
                }else{
                    $('.home-features').css({'visibility':'visible','height':'auto'});
                    $('.flooring').css({'display':'block'});
                    $('.electricity').css({'display':'block'});
                    $('.bedroom').css({'display':'block'});
                    $('.bathroom').css({'display':'block'});
                }
            }
        });
        // $('#property-check-residential input').val() == '16'){
        //     $('.home-features').css({'visibility':'hidden','height':'0'});
        //             $('.flooring').css({'display':'none'});
        //             $('.electricity').css({'display':'none'});
        //             $('.bedroom').css({'display':'none'});
        //             $('.bathroom').css({'display':'none'});
        //             $('.airport').css({'max-width':'20%'});
        // }
        // $('#property-check-residential input').on('change',function(){
        //     if($(this).prop('checked')==true){
        //         if($(this).val() == '14'){
        //             $('.home-features').css({'visibility':'hidden','height':'0'});
        //             $('.flooring').css({'display':'none'});
        //             $('.electricity').css({'display':'none'});
        //             $('.bedroom').css({'display':'none'});
        //             $('.bathroom').css({'display':'none'});
        //             $('.airport').css({'max-width':'20%'});
        //         }else{
        //             $('.home-features').css({'visibility':'visible','height':'auto'});
        //             $('.flooring').css({'display':'block'});
        //             $('.electricity').css({'display':'block'});
        //             $('.bedroom').css({'display':'block'});
        //             $('.bathroom').css({'display':'block'});
        //             $('.airport').css({'max-width':'100%'});
        //         }
        //     }
        // });

        // function propertyType(id){
        //     if(id == 3){
        //         $(".bedroom").hide();
        //         $(".bathroom").hide();
        //         $(".garge").hide();
        //     }else{
        //         $(".bedroom").show();
        //         $(".bathroom").show();
        //         $(".garge").show();
        //     }
        // }

    var form_parents = $('.form-steps-main .form-steps-register'),
    verification_token = "";
    $('#next-trigger').click(function() {
        // $('.parent-checkboxes input').on('change',function(){
        //     if($(this).prop('checked')==true){
        if ($('input[name="purpose_id"]:checked').length) {
            if ($('input[name="property_type_id"]:checked').length) {
                if ($('input[name="purpose_type_inner_id"]:checked').length) {
                    var activeStep = '.form-steps-main .form-steps-register.active';
                    is_valid = 0;
                    $(activeStep).find('input[data-required="required"]').each(function(){
                        if($(this).is(":visible")){
                            if ($(this).val().replace(/[\s]/, '') == '') {
                                $(this).addClass('border-danger');
                                is_valid--;
                            }else{
                                $("#second_name").val($("#first_name").val());
                                $("#second_email").val($("#register-email").val());
                                $("#second_phone").val($("#first_phone").val());
                                $(this).removeClass('border-danger');
                                is_valid++;
                            }
                        }
                    })
                    if(is_valid!==$(activeStep).find('input[data-required="required"]').filter(':visible').length){
                        return;
                    }else{
                        is_valid = 0;
                    }
                    if($(form_parents).eq(2).hasClass('active')) {
                        if($(activeStep).find('input[type="checkbox"]:checked').length>=6){
                            $(activeStep).find('.radio-error').remove();
                        }else{
                            $('.radio-error').remove();
                            $('#min-prop-checked').prepend('<p class="mb-0 f-bold text-danger mt-1 pt-1 radio-error f-14">Please choose minimum 6 options</p>');
                            return;
                        }
                    }
                    var id = $(activeStep).
                    next().prop('id');
                    var currentId = $(activeStep).prop('id');
                    if($(form_parents).eq(form_parents.length - 1).hasClass('active')){
                        $('#next-trigger').addClass('d-none');
                        $('#submit-trigger').removeClass('d-none');
                        $('.progress-steps li[data-target='+currentId+']').addClass('active').prevAll().addClass('active');
                    }else{
                        $(activeStep).
                        next().removeClass('d-none').addClass('d-flex active').
                        prev().removeClass('d-flex active').addClass('d-none');
                        $('.progress-steps li[data-target='+currentId+']').addClass('active').prevAll().addClass('active');
                        $('#prev-trigger').removeClass('d-none');
                    }
                } else {
                    $('.pp_type_inner').addClass('border-danger');    
                }
                
            } else {
                $('.p_type').addClass('border-danger');
            }
            
        } else {
            $('.p_purpose').addClass('border-danger');
            if ($('input[name="property_type_id"]:checked').length) {                
            } else {
                $('.p_type').addClass('border-danger');
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

        function getCity(provincId) {
            $.ajax({
                url: "<?php echo e(route('province.city')); ?>",
                type: "POST",
                data: {
                    province_id: provincId,
                    _token: "<?php echo e(csrf_token()); ?>"
                },
                success: function(response) {
                    console.log(response);
                    if (response) {
                        var opts =
                        `<option value="Select a model" disabled="" selected="">Select City</option>`;
                        for (var i = 0; i < response.result.length; i++) {
                            opts +=
                                `<option value="${response.result[i].id}">${response.result[i].name}</option>`;
                        }
                        $("#select2-city").html(opts);
                    }
                },
            });
        }

        function getAddress(cityId) {
            $.ajax({
                url: "<?php echo e(route('city.address')); ?>",
                type: "POST",
                data: {
                    city_id: cityId,
                    _token: "<?php echo e(csrf_token()); ?>"
                },
                success: function(response) {
                    console.log(response);
                    if (response) {
                        var opts =
                        `<option value="Select a model" disabled="" selected="">Select Address</option>`;
                        for (var i = 0; i < response.result.length; i++) {
                            opts +=
                                `<option value="${response.result[i].id}">${response.result[i].name}</option>`;
                        }
                        $("#select2-address").html(opts);
                    }
                },
            });
        }
        // plot select then features will not display
        // if($('.p-type-plot input').val() == '3'){
        //     $('.home-features').css('display','none');
        // }
        $(function(){
            $("#results").click(function(){
                var val = $('input[name=street]:checked').val();
                if(val == 1) {
                    console.log('no');
                } else {
                    console.log('yes');
                }
            });
        });
		
		$(function(){
			
            $(".package").click(function(){
				
                var package = $('input[name=plan_id]:checked').val();
				var addon = $('input[name=advertise]:checked').val();
				
				if(typeof addon == 'undefined'){
					var total = package;
				}else{
					var addon = parseInt(0);
					var total = parseInt(package) + parseInt(addon);
				}
				if(isNaN(total)){
					addon = $('input[name=advertise]:checked').val();
					if(isNaN(addon)){
					var total = 0;
					}
					else{
						total = parseInt(addon);
					}
				}
				if(total == 0){
						$('#price').html('Free');
					}
					else{
						var add = $('#price').text();
						add = add.toString();
						add = add.replace(/[^\d.-]/g, '');
						if(add != ''){
							var total = parseInt(add) + parseInt(total);
						}
						$('#price').html('PKR: ' + total);
					}
				
                
            });
        });
		
		
		
		/*$(function(){
            $(".addon").click(function(){
				var adt;
                var package = $('input[name=plan_id]:checked').val();
				var addon =   $('input[name=advertise]:checked').val();
	
				if(typeof package == 'undefined'){
					var total = parseInt(addon);
				}else{
					var favorite = [];
					$.each($("input[name='advertise']:checked"), function(){
						var s = $(this).val();
						s = s.substring(0, s.indexOf(','));
						addon = favorite.push(parseInt(s));
						alert(addon);
						var t = addon;
						var adt = addon+t;
					});
					var total = parseInt(package)+parseInt(adt);
				}
				if(isNaN(total)){
					package = $('input[name=plan_id]:checked').val();
					if(isNaN(package)){
					var total = 0;
					}
					else{
						total = parseInt(package);
					}
				}
				
				$('#price').html('PKR ' + total);
				
                
            });
        });*/
		
		
		
		$(function(){
			    $(".addon").click(function(){
					//var checks = $('input[name=advertise]:checked').val();
					
					var favorite = []; var total = 0;
					$.each($("input[name='advertise']:checked"), function(){ 
						
						var o = ''; 
						var s = $(this).val();
						for (var i = s.length - 1; i >= 0; i--)
						o += s[i];
						s = o;
						s = s.substring(-5, s.indexOf(','));
						favorite.push(s);
						
					});
					//alert("My total are: " + parseInt(sum.join("")));
					
					$('#field_results').html(favorite.join(","));
					
					var a = 1; var b = 2; var c = 3; var d = 4; var total = 0; var vsums = favorite.join(",");
					if(a == favorite.join("")){
						total = 500;
					}
					if(b == favorite.join("")){
						total = 300;
					}
					if(c == favorite.join("")){
						total = 3000;
					}
					if(d == favorite.join("")){
						total = 250;
					}
					
					if(vsums == '1,2'){
						total = 800;
					}
					if(vsums == '1,3'){
						total = 3500;
					}
					if(vsums == '1,4'){
						total = 750;
					}
					if(vsums == '2,3'){
						total = 3300;
					}
					if(vsums == '2,4'){
						total = 550;
					}
					if(vsums == '1,2,3'){
						total = 3800;
					}
					if(vsums == '1,3,4'){
						total = 3750;
					}
					if(vsums == '2,3,4'){
						total = 3550;
					}
					if(vsums == '1,2,3,4'){
						total = 4050;
					}
					
					if(total == 0){
						$('#price').html('Free');
					}
					else{
						$('#price').html('PKR: ' + total);
					}
					
			});
        });
		
				
    </script>

        <script src="<?php echo e(asset('libraries/jquery-validations/validate.js')); ?>"></script>
        <script src="<?php echo e(asset('libraries/jquery-validations/additional.min.js')); ?>"></script>
    <script>
      $("#form").validate({

      rules: {
        // name: {
        //   required: true,
        //   maxlength: 50
        // },

      },
    //   messages: {
    //     name: {
    //       required: "Please Enter Name",
    //       maxlength: "Your last name maxlength should be 50 characters long."
    //     },

    //   },
      submitHandler: function(form) {
          $(".spinner-border-sm").show();
       var formData = new FormData(form);
       // alert(formData);
       var fd = new FormData();

       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //e.preventDefault();
       // $('#send_form').html('Sending..');
        $.ajax({
          url: "<?php echo e(route('store_property')); ?>" ,
          type: "POST",
          data: formData,
          processData: false,
         contentType: false,
          success: function( response ) {
              $(".spinner-border-sm").hide();
              if(response.status == false) {
                  swal("You Have to Buy Package to Add Property");
              } else {
                swal({
                    title: `Your property ad has been posted successfully, after verification will be live.`,
                    icon: "success",
                    buttons: true,
                    dangerMode: false,
                }).then(function() {
                    window.location.href = "<?php echo e(route('payments')); ?>";
                });
            }
            //   $('#res_message').show();
            //   $('#res_message').html(response.message);
            // //  document.getElementById("form").reset();
            //   setTimeout(function(){
            //   $('#res_message').hide();
            //   },10000);
          }
        });
       // e.preventDefault();

      }
    })

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('agent.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/agent/add_property.blade.php ENDPATH**/ ?>