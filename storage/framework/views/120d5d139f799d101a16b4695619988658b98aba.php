
<?php $__env->startSection('content'); ?>
<div class="py-4">
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<?php if(session()->has('message')): ?>
<div class="alert alert-success">
    <?php echo e(session('message')); ?>

</div>
<?php endif; ?>
<div class="py-4">
    <div class="bg-white card-body-content">
        <div class="search-form-header bg-theme-dark">
            <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Add New Agent
                <span class="txb-color">Form</span>
            </h5>
        </div>
        <form class="row px-4 py-4 form-main-wrap" action=<?php echo e(route('add.new.agent')); ?> id="agent" method="post" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

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

                            <?php $__currentLoopData = $package; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($p->id); ?>">
                                <?php echo e($p->name); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            


            
        </form>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/admin/add_agent.blade.php ENDPATH**/ ?>