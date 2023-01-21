
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
            <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Edit Agent
                <span class="txb-color">Form</span>
            </h5>
        </div>
        <form class="row px-4 py-4 form-main-wrap" action=<?php echo e(route('update.agent')); ?> id="agent" method="post" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="form-elements-wrap">
                    <label class="f-medium mb-2">
                        Full Name <sup class="text-danger">*</sup>
                    </label>
                    <div class="position-relative">
                        <input type="text" class="w-100" name="full_name" placeholder="Full name" value="<?php echo e($user->name); ?>">
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
                        <input required type="email" class="w-100" placeholder="Email" name="email" value="<?php echo e($user->email); ?>">
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
                        <input required type="text" class="w-100"  name="city" value="<?php echo e($user->city); ?>">
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
                        <input required type="text" class="w-100"  name="address" value="<?php echo e($user->address); ?>">
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
                        <input   type="text" placeholder="Password" class="w-100" name="password" value="<?php echo e($user->confirm_password); ?>" />
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
                        <input   type="text" placeholder="Confirm Password" class="w-100" name="password_confirmation" value="<?php echo e($user->confirm_password); ?>" />
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

                            <?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php  if($user->role_id == $r->id) echo "selected"; ?> value="<?php echo e($r->id); ?>">
                                <?php echo e($r->name); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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

                            <?php $__currentLoopData = $plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php  if($p->id == $user->plan_id) echo "selected";?> value="<?php echo e($p->id); ?>">
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
			<div class="col-md-6 col-lg-4 mb-4">
                <div class="form-elements-wrap">
                    <label class="f-medium mb-2">
                        Mobile 
                    </label>
                    <div class="position-relative">
                        <input required type="number" class="w-100"  name="company_phone_number" value="<?php echo e($user->company_phone_number); ?>">
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
                        <input required type="text" class="w-100"  name="company" value="<?php echo e($user->company); ?>">
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
                            <input type="hidden" value="<?php echo e($user->image); ?>" name="photo_name" />
                            <div class="me-2 mb-2 position-relative view-added-image">
                            <span data-index="0" class="remove-btn-img position-absolute rounded-circle" type="button"><i class="bi bi-x-circle-fill"></i></span>
                            <img width="70" height="70" src="<?php echo e(asset('images/profile_avatar/'.$user->image)); ?>">
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
            <input type="hidden" value="<?php echo e($user->id); ?>" name="user_id">


            
        </form>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/admin/edit_agent_user.blade.php ENDPATH**/ ?>