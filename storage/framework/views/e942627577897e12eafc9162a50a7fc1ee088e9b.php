<div class="px-4 px-md-0">
<div class="col-lg-8 col-md-10 mx-auto py-5 my-md-4">
    <div class="search-property-form" style="max-width:100%;">
        <div class="search-form-header bg-theme-dark">
            <h5 class="mb-0 text-white px-md-4 px-2 py-3 f-medium">Application form for House
                <span class="txb-color">and Plots</span>
                <span class="rtl-name float-sm-end d-inline-block">
                    فارم برائے رہائشی پلاٹ اور گھر
                </span>
            </h5>
        </div>

        <form class="w-100" method="POST" id="form">
            <div class="w-100 mb-0 border-custom radius-y-12">
                <div class="px-4 py-4 form-steps-main">
                    <div class="row form-steps-register">
                        <div class="search-form-fields col-md-6 mb-3">
                            <label class="f-medium">Name <sup class="text-danger f-14">*</sup>
                                <span class="ms-auto float-end me-2 rtl-name">نام</span>
                            </label>
                            <input type="text" class="w-100" wire:model="full_name" name="full_name" />
                            <?php $__errorArgs = ['full_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger error text-right"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="search-form-fields col-md-6 mb-3">
                            <label class="f-medium">Email <sup class="text-danger f-14">*</sup>
                                <span class="ms-auto float-end me-2 rtl-name">ای میل</span>
                            </label>
                            <input type="email" class="w-100" wire:model="email" required name="email" />
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span
                            class="text-danger error text-right"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                        </div>
                        <div class="search-form-fields col-md-6 mb-3">
                            <label class="f-medium">CNIC<span class="ms-auto float-end me-2 rtl-name">شناختی کارڈ نمبر </span></label>
                            <input type="number" class="w-100" wire:model="cnic" name="cnic" />
                                                  </div>
                        <div class="search-form-fields col-md-6 mb-3">
                            <label class="f-medium">Gender <sup class="text-danger f-14">*</sup>
                                <span class="ms-auto float-end me-2 rtl-name">جنس </span>
                            </label>
                            <select class="w-100" wire:model="gender">
                                <option  value="" selected>
                                </option>
                                <option value="Male">
                                    Male
                                </option>
                                <option value="Female">
                                   Female
                                </option>
                                <option value="others">
                                   Others
                                </option>
                            </select>
                            <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span
                            class="text-danger error text-right"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="search-form-fields col-md-6 mb-3">
                            <label class="f-medium">Marital Status
                                <span class="ms-auto float-end me-2 rtl-name">ازدواجی حیثیت</span>
                            </label>
                            <select class="w-100" wire:model="status">
                                <option  value="" selected>
                                </option>
                                <option value="Married">
                                    Married
                                </option>
                                <option value="Single">
                                   Single
                                </option>
                            </select>
                            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span
                            class="text-danger error text-right"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="search-form-fields col-md-6 mb-3">
                            <label class="f-medium">Address<sup class="text-danger f-14">*</sup>
                                <span class="ms-auto float-end me-2 rtl-name">پتہ</span>
                            </label>
                            <input type="text" class="w-100" wire:model="address" required name="address" />
                            <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span
                            class="text-danger error text-right"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="search-form-fields col-md-6 mb-3">
                            <label class="f-medium">Phone Number <sup class="text-danger f-14">*</sup>
                                <span class="ms-auto float-end me-2 rtl-name">فون نمبر</span>
                            </label>
                            <input type="number" class="w-100" minlength="11" wire:model="mobile" required
                            name="mobile" />
                            <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span
                            class="text-danger error text-right"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="search-form-fields col-md-6 mb-3">
                            <label class="f-medium">Interested in<sup class="text-danger f-14">*</sup>
                                <span class="ms-auto float-end me-2 rtl-name">خریدنے کی دلچسپی</span>
                            </label>
                            <select class="w-100" id="parent-rel-select" wire:model="intrested_in">
                                <option value=""  selected>

                                </option>
                                <option value="sector_area">
                                    Sector Area  (ایریا منتخیب کریں)
                                </option>
                                <option value="society">
                                    Society (سوسائٹی)
                                </option>
                            </select>
                            <?php $__errorArgs = ['intrested_in'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span
                            class="text-danger error text-right"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <?php if($intrested_in == 'sector_area'): ?>
                        <div class="search-form-fields col-md-6 mb-3 child-drop-area" id="sector_area">
                            <label class="f-medium">Sector Area<sup class="text-danger f-14">*</sup>
                                <span class="ms-auto float-end me-2 rtl-name">ایریا منتخیب کریں</span>
                            </label>
                            <select class="w-100" wire:model="interested_in_details">
                                <option value="" selected disabled>

                                </option>
                                <option value="residential_property">
                                    Residential property (پراپرٹی | جائیداد ہائشی)
                                </option>
                                <option value="commercial_property">
                                    Commercial property (کمرشل پراپرٹی)
                                </option>
                                <option value="cash_plan">
                                    Full Cash plan (کیش پلان |  نقد)
                                </option>
                                <option value="Instalment_plan">
                                    Instalment plan  -  (قسط پلان)
                                </option>
                                <option>
                                    Price minimum to Max (قیمت کم – زیادہ )
                                </option>
                            </select>
                        </div>
                        <?php endif; ?>
                        <?php if($intrested_in == 'society'): ?>

                        <div class="search-form-fields col-md-6 mb-3  child-drop-area" id="society">
                            <label class="f-medium">Societies<sup class="text-danger f-14">*</sup>
                                <span class="ms-auto float-end me-2 rtl-name">سوسائٹی</span>
                            </label>
                            <select class="w-100" wire:model="interested_in_details">
                               <option value="" selected disabled>

                                </option>
                                <option value="rda">
                                    RDA (ر – ڈی – اے)
                                </option>
                                <option value="cda">
                                    CDA (سی – ڈی – اے)
                                </option>
                                <option value="private_society">
                                    Private Society (پرائیویٹ {نجی} سوسائٹی)
                                </option>
                            </select>
                        </div>
                        <?php endif; ?>
                        <div class="search-form-fields col-md-6 mb-3">
                            <label class="f-medium">Budget <sup class="text-danger f-14">*</sup>
                                <span class="ms-auto float-end me-2 rtl-name">بجٹ</span>
                            </label>
                            <input type="number" class="w-100"   wire:model="budget" required
                                name="budget" />
                                <?php $__errorArgs = ['budget'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span
                                class="text-danger error text-right"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="search-form-fields col-md-6 mb-3">
                            <label class="f-medium"></label>
                            <div class="d-flex align-items-center">
                                <div class="form-group-checkbox mt-2">
                                    <input type="checkbox" value="1" id="term_conditions" wire:model="accept_term">
                                    <label for="term_conditions">I Accept
                                        <a href="<?php echo e(route('terms.conditions')); ?>" class="text-decoration-none txb-color">Terms & Condition</a>
                                    </label>
                                    <?php $__errorArgs = ['accept_term'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span
                                    class="text-danger error text-right"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3 mt-4">
                        <div class="ms-auto form-submit-btn">
                            <button type="submit"
                                    class="border-0 f-medium rounded-btn px-5
                                py-2 bg-theme text-white"
                                    wire:click.prevent="store">
                                    Submit
                                    <span wire:target="store"
                                        wire:loading.class="spinner-border spinner-border-sm"></span>
                                </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php if(session()->has('message')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(session('message')); ?>

                                </div>
                            <?php endif; ?>
                            <?php if(session()->has('error')): ?>
                                <div class="alert alert-danger">
                                    <?php echo e(session('error')); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/livewire/application-house.blade.php ENDPATH**/ ?>