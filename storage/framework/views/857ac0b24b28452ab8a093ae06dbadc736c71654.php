
<?php $__env->startSection('content'); ?>


<div class="py-4">
    <div class="bg-white card-body-content">
        <div class="search-form-header bg-theme-dark">
            <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Update
                <span class="txb-color">Profile</span>
            </h5>
        </div>
        <form class="row px-4 py-4 form-main-wrap"  action="<?php echo e(route('profile.update')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="col-md-12">
                <?php if(session()->has('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>
                <?php if(session()->has('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="form-elements-wrap">
                        <label class="f-medium mb-2">
                            Full Name <sup class="text-danger">*</sup>
                        </label>
                        <div class="position-relative">
                            <input type="text" class="w-100" name="name" placeholder="Full name" value="<?php echo e($agent_user->name); ?>" readonly >
                            <div
                                class="position-absolute field-icon d-flex
                                align-items-center justify-content-center">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                    </div>
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger error text-right"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
				
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="form-elements-wrap">
                        <label class="f-medium mb-2">
                            Email <span style="font-size: 11px;">(To Update Email, Please Contact Helpline Support)</span>
                        </label>
                        <div class="position-relative">
                            <input required type="email" class="w-100" disabled placeholder="Email" name="email" value="<?php echo e($agent_user->email); ?>">
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
                            <input type="text" class="w-100" name="phone" placeholder="Full name" value="<?php echo e($agent_user->company_phone_number); ?>" readonly disabled>
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
                            CNIC/Passport No.<sup class="text-danger">*</sup>
                        </label>
                        <div class="position-relative">
                            <input type="text" class="w-100" name="cnic" placeholder="CNIC/Passport No." value="<?php echo e($agent_user->cnic); ?>" readonly disabled>
                            <div
                                class="position-absolute field-icon d-flex
                                align-items-center justify-content-center">
                                <i class="bi bi-file"></i>
                            </div>
                        </div>
                    </div>
                    
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
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger error text-right"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                    <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger error text-right"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
                
            <div class="row">
                
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('agent.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/agent/edit_agent.blade.php ENDPATH**/ ?>