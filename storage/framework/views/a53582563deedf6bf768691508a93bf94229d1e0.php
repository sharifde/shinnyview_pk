
<?php $__env->startSection('content'); ?>
<div class="py-4">
    
    <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <div class="alert-heading">Please correct error(s) and try again.</div>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success">
                <div class="alert-heading">Successful.</div>
                <p>Password Successfully Added.</p>
            </div>
        <?php elseif($message = Session::get('unsuccess')): ?>
            <div class="alert alert-danger">
                <div class="alert-heading">Unsuccssful.</div>
                <p>Existing Password Not Matched.</p>
            </div>
        <?php endif; ?>



<div class="py-4 admin-change-pass">
    <div class="bg-white card-body-content">
        <div class="search-form-header bg-theme-dark">
            <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Change
                <span class="txb-color">Password</span>
            </h5>
        </div>
        <form class="row px-4 py-4 form-main-wrap" action=<?php echo e(route('update.password')); ?> id="" method="post" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="form-elements-wrap">
                    <label class="f-medium mb-2">
                        Current Password <sup class="text-danger">*</sup>
                    </label>
                    <div class="position-relative pass-field">
                        <input type="password" placeholder="Password" class="w-100" name="password" />
                        <button class="bg-transparent border-0 visible-password" type="button">
                            <i class="bi bi-eye"></i>
                        </button>
                        <div
                            class="position-absolute field-icon d-flex
                            align-items-center justify-content-center">
                            <i class="bi bi-lock"></i>
                        </div>
                       
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                            <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="form-elements-wrap">
                    <label class="f-medium mb-2">
                        Enter New Password <sup class="text-danger">*</sup>
                    </label>
                    <div class="position-relative pass-field">
                        <input type="password" placeholder="New Password" class="w-100" name="new_password" />
                        <button class="bg-transparent border-0 visible-password" type="button">
                            <i class="bi bi-eye"></i>
                        </button>
                        <div
                            class="position-absolute field-icon d-flex
                            align-items-center justify-content-center">
                            <i class="bi bi-lock"></i>
                        </div>
                        <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                            <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="form-elements-wrap">
                    <label class="f-medium mb-2">
                        Confirm Password <sup class="text-danger">*</sup>
                    </label>
                    <div class="position-relative pass-field">
                        <input type="password" placeholder="Confirm Password" class="w-100" name="password_confirmation" />
                        <button class="bg-transparent border-0 visible-password" type="button">
                            <i class="bi bi-eye"></i>
                        </button>
                        <div
                            class="position-absolute field-icon d-flex
                            align-items-center justify-content-center">
                            <i class="bi bi-lock"></i>
                        </div>
                        <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                            <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>
            <div class="text-end form-submit-btn col-12">
                <button type="submit" class="border-0 f-medium rounded-btn  px-3
                    py-2 bg-theme text-white" id="submit-trigger">
                    Update
                </button>
            </div>


            
        </form>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script type="text/javascript">

$(document).ready(function () {
    $('.visible-password').click(function(){
        var target = $(this).parent().find('input');
        if(target.attr('type')=="text"){
        target.attr('type','password');
        }else{
        target.attr('type','text');
        }
    });
});

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/admin/change-password.blade.php ENDPATH**/ ?>