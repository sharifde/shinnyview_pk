
<?php $__env->startSection('content'); ?>

    <link  rel="stylesheet" type="text/css" href="<?php echo e(asset('css/util.css')); ?>" />
    <div class="py-4">
        <div class="bg-white card-body-content">
            <div class="search-form-header bg-theme-dark">
                <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Update Property
                    <span class="txb-color">Form</span>
                </h5>
            </div>
            <div class="form-main-wrap px-5 py-4">
                <div class="progress-container pb-5 mt-0">
                    <ul class="progress-steps ps-0">
                        <li data-target="form_step_0" data-counter="1">Function Type</li>
                        <li data-target="form_step_1" data-counter="2">Contact details</li>
                        <li data-target="form_step_2" data-counter="3">details & Features</li>
                        <li data-target="form_step_3" data-counter="4">Photo  and Price</li>
                    </ul>
                </div>
                <form class="w-100 mt-5 form-steps-main" method="POST" id="form" action="route<?php echo e('property.update.admin'); ?>">
                    <div class="row form-steps-register property-check-data active" id="form_step_0">
                        <div class="form-elements-wrap col-12">
                            <label class="f-medium mb-2">
                                Purpose <sup class="text-danger">*</sup>
                            </label>
                        </div>
                        <div class="col-12 mb-4 property-checkbox d-flex flex-wrap">
                            <div class="form-group-checkbox me-3 mt-1">
                                <input type="radio" id="for_sale" value="1" <?php if($property->purpose_id ==1): ?> checked <?php endif; ?> name="purpose_id">
                                <label for="for_sale">For Sale</label>
                            </div>
                            <div class="form-group-checkbox me-3 mt-1">
                                <input type="radio" id="for_rent" value="2"  <?php if($property->purpose_id ==2): ?> checked <?php endif; ?> name="purpose_id">
                                <label for="for_rent">For Rent</label>
                            </div>
                            <div class="form-group-checkbox me-3 mt-1">
                                <input type="radio" id="on_lease" value="3"  <?php if($property->purpose_id ==3): ?> checked <?php endif; ?> name="purpose_id">
                                <label for="on_lease">On Lease</label>
                            </div>
                        </div>
                        <div class="form-elements-wrap col-12 mt-3">
                            <label class="f-medium mb-2">
                                Purpose Type <sup class="text-danger">*</sup>
                            </label>
                        </div>
                        <div class="col-12 mb-4 property-checkbox parent-checkboxes d-flex flex-wrap">
                            <div class="form-group-checkbox me-3 mt-1">
                                <input type="radio" id="for_residential" value="1" <?php if($property->property_type_id ==1): ?> checked <?php endif; ?> name="property_type_id" data-type="home">
                                <label for="for_residential">Residential</label>
                            </div>
                            <div class="form-group-checkbox me-3 mt-1">
                                <input type="radio" id="for_commercial" value="2" <?php if($property->property_type_id ==2): ?> checked <?php endif; ?> name="property_type_id" data-type="commercial">
                                <label for="for_commercial">Commercial</label>
                            </div>
                            
                        </div>
                        <!-- For Home -->
                        <div class="col-xl-9 col-lg-10 property-check-buttons" id="property-check-home"  <?php if($property->property_type_id ==1): ?> style="display:block;" <?php else: ?> style="display:none;" <?php endif; ?>>
                            <div class="w-100 mb-4 property-checkbox d-flex flex-wrap">
                                <div class="form-group-checkbox me-3 mt-2">
                                    <input type="radio" id="House" value="1" <?php if($property->purpose_type_inner_id ==1): ?> checked <?php endif; ?>  name="purpose_type_inner_id">
                                    <label for="House">House</label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2">
                                    <input type="radio" id="Flat" value="2" <?php if($property->purpose_type_inner_id ==2): ?> checked <?php endif; ?>  name="purpose_type_inner_id">
                                    <label for="Flat">Flat</label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2">
                                    <input type="radio" id="Uper_Portion" value="3" <?php if($property->purpose_type_inner_id ==3): ?> checked <?php endif; ?>  name="purpose_type_inner_id">
                                    <label for="Uper_Portion">Uper Portion</label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2">
                                    <input type="radio" id="Lower_Portion" value="4" <?php if($property->purpose_type_inner_id ==4): ?> checked <?php endif; ?>  name="purpose_type_inner_id">
                                    <label for="Lower_Portion">Lower Portion</label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2">
                                    <input type="radio" id="Farm_House" value="5" <?php if($property->purpose_type_inner_id ==5): ?> checked <?php endif; ?>  name="purpose_type_inner_id">
                                    <label for="Farm_House">Farm House</label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2">
                                    <input type="radio" id="Penthouse" value="6" <?php if($property->purpose_type_inner_id ==6): ?> checked <?php endif; ?>  name="purpose_type_inner_id">
                                    <label for="Penthouse">Penthouse</label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2">
                                    <input type="radio" id="Residential_Plot"  value="16"  <?php if($property->purpose_type_inner_id == 16): ?> checked <?php endif; ?> name="purpose_type_inner_id">
                                    <label for="Residential_Plot"> Plot</label>
                                </div>

                                <div class="form-group-checkbox me-3 mt-2">
                                    <input type="radio" id="File" value="18"  <?php if($property->purpose_type_inner_id == 18): ?> checked <?php endif; ?> name="purpose_type_inner_id">
                                    <label for="File">File </label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2">
                                    <input type="radio" id="Room" value="7" <?php if($property->purpose_type_inner_id ==7): ?> checked <?php endif; ?>  name="purpose_type_inner_id">
                                    <label for="Room">Room</label>
                                </div>
                            </div>
                        </div>
                        <!-- For Commercial -->

                        <div class="col-xl-9 col-lg-10 property-check-buttons" id="property-check-commercial"  <?php if($property->property_type_id ==2): ?> style="display:block;" <?php else: ?> style="display:none;" <?php endif; ?>>
                            <div class="w-100 mb-4 property-checkbox d-flex flex-wrap">
                                <div class="form-group-checkbox me-3 mt-2">
                                    <input type="radio" id="Office" value="9" <?php if($property->purpose_type_inner_id ==9): ?> checked <?php endif; ?> name="purpose_type_inner_id">
                                    <label for="Office">Office </label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2">
                                    <input type="radio" id="Shop" value="10" <?php if($property->purpose_type_inner_id ==10): ?> checked <?php endif; ?>  name="purpose_type_inner_id">
                                    <label for="Shop">Shop</label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2">
                                    <input type="radio" id="Wharehose " value="11" <?php if($property->purpose_type_inner_id ==10): ?> checked <?php endif; ?>  name="purpose_type_inner_id">
                                    <label for="Wharehose ">Warehose </label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2">
                                    <input type="radio" id="factory" value="12" <?php if($property->purpose_type_inner_id ==12): ?> checked <?php endif; ?>  name="purpose_type_inner_id">
                                    <label for="factory">Factory</label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2">
                                    <input type="radio" id="Building " value="13" <?php if($property->purpose_type_inner_id ==13): ?> checked <?php endif; ?>  name="purpose_type_inner_id">
                                    <label for="Building ">Building </label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2">
                                    <input type="radio" id="Land" value="14" <?php if($property->purpose_type_inner_id ==14): ?> checked <?php endif; ?>  name="purpose_type_inner_id">
                                    <label for="Land ">Land </label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2">
                                    <input type="radio" id="Comercial_Plot"  value="16" <?php if($property->purpose_type_inner_id == 16): ?> checked <?php endif; ?> name="purpose_type_inner_id">
                                    <label for="Comercial_Plot">Plot </label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2">
                                    <input type="radio" id="File" value="18"  <?php if($property->purpose_type_inner_id == 18): ?> checked <?php endif; ?> name="purpose_type_inner_id">
                                    <label for="File">File </label>
                                </div>
                                <div class="form-group-checkbox me-3 mt-2">
                                    <input type="radio" id="Other" value="15" <?php if($property->purpose_type_inner_id ==14): ?> checked <?php endif; ?>  name="purpose_type_inner_id">
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
                                    class="form-select-list w-100">
                                    <?php $__currentLoopData = $province; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo  $property->province_id == $p->id? 'selected' :''?> value="<?php echo e($p->id); ?>"><?php echo e($p->name); ?></option>
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
                                    <select name="city_id"  id="select2-city" class="form-select-list w-100"  onchange="getAddress(this.value)" >
                                        
										 <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        	<option <?php echo  $property->city_id == $c->id? 'selected' :''?> value="<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>
                                    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                                    <select name="address_id" id="select2-address" class="form-select-list w-100"
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
                                    Email <sup class="text-danger">*</sup>
                                </label>
                                <div class="position-relative">
                                    <input type="email" class="w-100" name="email"  value="<?php echo e($property->email); ?>"   />
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
                                    <input type='tel' id="phone" class="w-100" name="phone_num" value="<?php echo e($property->phone_num); ?>"/>
                                    <span id="valid-msg" class="hide mt-2 text-success f-14">✓ Valid</span>
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
                                    <input type="text" class="w-100" id="name" name="name"
                                    value="<?php echo e($property->name); ?>" />
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
                                    Land Area <sup class="text-danger">*</sup>
                                </label>
                                <div class="position-relative d-flex flex-column-reverse">
                                    <select name="area" class="form-select-list w-100"  >
                                        <option selected disabled value="">Select Land Area</option>
                                        <option <?php echo  $property->area =='Square Feet'? 'selected' :''?> value="Square Feet">Square Feet</option>
                                        <option  <?php echo  $property->area =='Square Yards'? 'selected' :''?>value="Square Yards">Square Yards</option>
                                        <option <?php echo  $property->area =='Square Meters'? 'selected' :''?> value="Square Meters">Square Meters</option>
                                        <option <?php echo  $property->area =='Marla'? 'selected' :''?> value="Marla">Marla</option>
                                        <option <?php echo  $property->area =='Kanal'? 'selected' :''?> value="Kanal">Kanal</option>
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
                                    <input type="number" class="w-100" name="size" minlength="1"
                                         value="<?php echo e($property->size); ?>"/>
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
                        <div class="col mb-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Flooring Type
                                </label>
                                <div class="position-relative d-flex flex-column-reverse">
                                    <select name="flooring_type" class="form-select-list w-100">
                                        <option value="" selected disabled>Select Flooring</option>
                                        <option  <?php echo  $property->flooring_type =='Tiles'? 'selected' :''?> value="Tiles">Tiles</option>
                                        <option  <?php echo  $property->flooring_type =='Marble'? 'selected' :''?> value="Marble">Marble</option>
                                        <option  <?php echo  $property->flooring_type =='Wooden'? 'selected' :''?> value="Wooden">Wooden</option>
                                        <option  <?php echo  $property->flooring_type =='Chip'? 'selected' :''?> value="Chip">Chip</option>
                                        <option  <?php echo  $property->flooring_type =='Cement'? 'selected' :''?> value="Cement">Cement</option>
                                        <option  <?php echo  $property->flooring_type =='Other'? 'selected' :''?> value="Other">Other</option>
                                    </select>
                                    <div
                                        class="position-absolute field-icon d-flex
                                        align-items-center justify-content-center">
                                        <i class="bi bi-bricks"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Electricity Backup
                                </label>
                                <div class="position-relative d-flex flex-column-reverse">
                                    <select name="electriccity_backup" class="form-select-list w-100">
                                        <option value="" selected disabled>Select Backup</option>
                                        <option  <?php echo  $property->electriccity_backup =='None'? 'selected' :''?> value="None">None</option>
                                        <option  <?php echo  $property->electriccity_backup =='Generator'? 'selected' :''?> value="Generator">Generator</option>
                                        <option  <?php echo  $property->electriccity_backup =='Ups'? 'selected' :''?> value="Ups">UPS</option>
                                        <option  <?php echo  $property->electriccity_backup =='Solar'? 'selected' :''?> value="Solar">Solar</option>
                                        <option  <?php echo  $property->electriccity_backup =='Other'? 'selected' :''?> value="Other">Other</option>
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
                                    value="<?php echo e($property->bedroom); ?>" />
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
                                    maxlength="2" value="<?php echo e($property->bath); ?>"
                                         />
                                    <div
                                        class="position-absolute field-icon d-flex
                                    align-items-center justify-content-center">
                                        <img src="<?php echo e(asset('images/svg/bath-tub.svg')); ?>" alt="Bathroom" height="20px" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-3 airport">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Airport (Km)
                                </label>
                                <div class="position-relative">
                                    <input type="number" value="<?php echo e($property->airport_km); ?>" class="w-100" name="airport_km"
                                    />
                                    <div
                                        class="position-absolute field-icon d-flex
                                        align-items-center justify-content-center">
                                        <i class="bi bi-signpost"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 property-check-data col-12 mb-4">
                            <div class="form-elements-wrap">
                                <div class="property-checkbox d-flex flex-wrap">
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Furnished" value="Furnished" <?php if(isset($property->property_feature)){  if(in_array("Furnished", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="Furnished">Furnished</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="car_porch" value="Car Porch"  <?php if(isset($property->property_feature)){ if(in_array("Car Porch", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="car_porch">Car Porch</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Double_glazed_window" value="Double Glazed Window" <?php if(isset($property->property_feature)){ if(in_array("Double Glazed Window", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="Double_glazed_window">Double glazed window</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Central_Air_conditioning" value="Central Air conditioning" <?php if(isset($property->property_feature)){ if(in_array("Central Air conditioning", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="Central_Air_conditioning">Central Air-conditioning</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Central_Heating" value="Central Heating" <?php if(isset($property->property_feature)){ if(in_array("Central Heating", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="Central_Heating">Central Heating</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Garden" value="Garden" <?php if(isset($property->property_feature)){ if(in_array("Garden", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="Garden">Garden</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="garage" value="Garage" <?php if(isset($property->property_feature)){ if(in_array("Garage", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="garage">Garage</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Kitchens" value="Kitchens" <?php if(isset($property->property_feature)){ if(in_array("Kitchens", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="Kitchens">Kitchens</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Sitting_Room" value="Sitting Room" <?php if(isset($property->property_feature)){ if(in_array("Sitting Room", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="Sitting_Room">Sitting  Room</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Study_Room" value="Study Room" <?php if(isset($property->property_feature)){ if(in_array("Study Room", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="Study_Room">Study  Room</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Store_Room" value="Store Room" <?php if(isset($property->property_feature)){ if(in_array("Store Room", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="Store_Room">Store  Room</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Dinning_Room" value="Dinning Room" <?php if(isset($property->property_feature)){ if(in_array("Dinning Room", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="Dinning_Room">Dinning Room</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Laundry_Room" value="Laundry Room" <?php if(isset($property->property_feature)){ if(in_array("Laundry Room", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="Laundry_Room">Laundry Room</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Servant_Quarter" value="Servant Quarter" <?php if(isset($property->property_feature)){ if(in_array("Servant Quarter", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="Servant_Quarter">Servant Quarter</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Internet_Access" value="Internet Access" <?php if(isset($property->property_feature)){ if(in_array("Internet Access", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="Internet_Access">Internet Access</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Satellite_Cable_TV" value="Satellite Cable TV" <?php if(isset($property->property_feature)){ if(in_array("Satellite Cable TV", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="Satellite_Cable_TV">Satellite or Cable TV</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Intercom" value="Intercom" <?php if(isset($property->property_feature)){ if(in_array("Intercom", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="Intercom">Intercom</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="CCTV" value="CCTV" <?php if(isset($property->property_feature)){ if(in_array("CCTV", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="CCTV">CCTV</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Swimming_Pool" value="Swimming Pool" <?php if(isset($property->property_feature)){ if(in_array("Swimming Pool", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="Swimming_Pool">Swimming Pool</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Gym" value="Gym" <?php if(isset($property->property_feature)){ if(in_array("Gym", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="Gym">Gym</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Sauna" value="Sauna" <?php if(isset($property->property_feature)){ if(in_array("Sauna", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="Sauna">Sauna</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Jacuzzi" value="Jacuzzi" <?php if(isset($property->property_feature)){ if(in_array("Jacuzzi", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="Jacuzzi">Jacuzzi</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Schools" value="Schools" <?php if(isset($property->property_feature)){ if(in_array("Schools", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="Schools">Schools</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Hospital" value="Hospital" <?php if(isset($property->property_feature)){ if(in_array("Hospital", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="Hospital">Hospital</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Shopping_Centre" value="Shopping Centre" <?php if(isset($property->property_feature)){ if(in_array("Shopping Centre", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="Shopping_Centre">Shopping Centre</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Hotel" value="Hotel" <?php if(isset($property->property_feature)){ if(in_array("Hotel", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="Hotel">Hotel</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Cinema" value="Cinema" <?php if(isset($property->property_feature)){ if(in_array("Cinema", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="Cinema">Cinema</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Public_transport_services" value="Public Transport Services" <?php if(isset($property->property_feature)){ if(in_array("Public Transport Services", json_decode($property->property_feature))){ echo "checked"; }}?> name="property_feature[]">
                                        <label for="Public_transport_services">Public transport services</label>
                                    </div>
                                    <div class="form-group-checkbox me-3 mt-3">
                                        <input type="checkbox" id="Worship_Place" value="Worship Place" name="property_feature[]">
                                        <label for="Worship_Place">Worship Place</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row form-steps-register d-none" id="form_step_3">
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Price <sup class="text-danger">*</sup>
                                </label>
                                <div class="position-relative">
                                    <input type="text" value="<?php echo e($property->price); ?>" class="w-100" name="price"
                                    />
                                    <div
                                        class="position-absolute field-icon d-flex
                                        align-items-center justify-content-center">
                                        <i class="bi bi-cash-coin"></i>
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
                                        name="featured_image"   accept="image/*" />
                                    <div class="output-img d-flex flex-wrap border mt-2 pt-2 px-2">
                                        <div class="me-2 mb-2 position-relative view-added-image">

                                        <img width="50" height="50" src="<?php echo e(asset('properties/gallery/'.$property->image)); ?>" />
                                        <span data-index="0" class='remove-btn-img position-absolute rounded-circle' type='button'>
                                            <i class='bi bi-x-circle-fill'></i></span>
                                        </div>
                                    </div>
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
                                        name="gallery_image[]" accept="image/*" />

                                    <div class="output-img d-flex flex-wrap border mt-2 pt-2 px-2 ">
                                        <?php $__currentLoopData = $property->gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$fg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="me-2 mb-2 position-relative view-added-image">
                                        <input type="hidden" name="imagesdb[]" value="<?php echo e($fg->name); ?>">
                                        <img width="50" height="50" src="<?php echo e(asset('properties/gallery/'.$fg->name)); ?>" />
                                        <span data-index="<?php echo e($key); ?>" class='remove-btn-img position-absolute rounded-circle' type='button'>
                                            <i class='bi bi-x-circle-fill'></i></span>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Youtube Link
                                 </label>
                                <div class="position-relative">
                                    <input type="text" name="youtube_link" value="<?php echo e($property->youtube_link); ?>" placeholder="Youtube Link"
                                    class="img-preview-upload w-100" />
                                    <div
                                        class="position-absolute field-icon d-flex
                                        align-items-center justify-content-center">
                                        <i class="bi bi-youtube text-danger"></i>
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
                                    <textarea class="w-100 d-block" name="description" cols="4" rows="6"><?php echo e($property->description); ?></textarea>
                                    <div class="output-img d-flex flex-wrap border mt-2 pt-2 px-2 d-none">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo e($property->id); ?>" name="id">
                    <input type="hidden" value="<?php echo e($property->city_id); ?>" id="city_id">
                    <input type="hidden" value="<?php echo e($property->address_id); ?>" id="address_id">
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
                                Update
                                <span class="spinner-border spinner-border-sm" style="display: none"></span>

                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>










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
            }
        })
        function propertyType(id){
            if(id == 3){
                $(".bedroom").hide();
                $(".bathroom").hide();
                $(".garge").hide();
            }else{
                $(".bedroom").show();
                $(".bathroom").show();
                $(".garge").show();
            }
        }

    var form_parents = $('.form-steps-main .form-steps-register'),
    verification_token = "";
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



    </script>

    <script>
        function propertyType(id){
            if(id == 3){
                $(".bedroom").hide();
                $(".bathroom").hide();
                $(".garge").hide();
            }else{
                $(".bedroom").show();
                $(".bathroom").show();
                $(".garge").show();
            }
        }
        $( document ).ready(function() {
            getCity('<?php echo $property->province_id; ?>');
            getAddress('<?php echo $property->city_id; ?>');

        });
        function getCity(provincId) {
            $.ajax({
                url: "<?php echo e(route('province.admin.city')); ?>",
                type: "POST",
                data: {
                    province_id: provincId,
                    _token: "<?php echo e(csrf_token()); ?>"
                },
                success: function(response) {
                    let selected_ctiy = '';
                    if (response) {
                        var opts =
                        `<option disabled="" >Select City</option>`;
                        for (var i = 0; i < response.result.length; i++) {
                            if($("#city_id").val() == response.result[i].id){ selected_ctiy = 'selected';}else{ selected_ctiy = '';}
                            opts +=
                                `<option ${selected_ctiy} value="${response.result[i].id}">${response.result[i].name}</option>`;
                        }
                        $("#select2-city").html(opts);
                    }
                },
            });
        }

        function getAddress(cityId) {
            $.ajax({
                url: "<?php echo e(route('city.admin.address')); ?>",
                type: "POST",
                data: {
                    city_id: cityId,
                    _token: "<?php echo e(csrf_token()); ?>"
                },
                success: function(response) {
                    var selected = '';
                    if (response) {
                        var opts =
                        `<option  disabled="" >Select Address</option>`;
                        for (var i = 0; i < response.result.length; i++) {
                            if($("#address_id").val() == response.result[i].id){
                                  selected = 'selected';}else{ selected = '';}

                            opts +=
                                `<option ${selected} value="${response.result[i].id}">${response.result[i].name}</option>`;
                        }
                        $("#select2-address").html(opts);
                    }
                },
            });
        }
    </script>

        <script src="<?php echo e(asset('libraries/jquery-validations/validate.js')); ?>"></script>
        <script src="<?php echo e(asset('libraries/jquery-validations/additional.min.js')); ?>"></script>
    <script>
      $("#form").validate({

      rules: {
        name: {
          required: true,
          maxlength: 50
        },

      },
      messages: {
        name: {
          required: "Please Enter Name",
          maxlength: "Your last name maxlength should be 50 characters long."
        },

      },
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
          url: "<?php echo e(route('property.update.admin')); ?>" ,
          type: "POST",
          data: formData,
          processData: false,
         contentType: false,
          success: function( response ) {
              
            $(".spinner-border-sm").hide();
            swal({
                        title: `Your property has been updated successfully`,
                        icon: "success",
                        buttons: true,
                        dangerMode: false,
                    }).then(function() {
                        window.location.href = "<?php echo e(route('admin.properties')); ?>";
                });
            //   $('#res_message').show();
            //   $('#res_message').html(response.message);
            // //  document.getElementById("form").reset();
            //   setTimeout(function(){
            //   $('#res_message').hide();
            //   },10000);
          },error: function(e) {
               

            }
        });
       // e.preventDefault();

      }
    })

    </script>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/admin/edit_property.blade.php ENDPATH**/ ?>