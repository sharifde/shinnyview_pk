
<?php $__env->startSection('content'); ?>

    <div class="py-4">
        <div class="add-new-project bg-white card-body-content">
            <div class="search-form-header bg-theme-dark">
                <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Edit
                    <span class="txb-color">Advert Plan</span>
                </h5>
            </div>
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
                    <p>Plan Successfully Updated.</p>
                </div>
            <?php endif; ?>
            <div class="form-main-wrap px-5 py-4">
                <form class="form" action="<?php echo e(route('update.plan.details')); ?>" method="POST"
                    enctype="multipart/form-data" class="w-100 mt-5 form-steps-main" id="form">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="planID" value="<?php echo e($plan->id); ?>">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Plan Name <sup class="text-danger">*</sup>
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" id="" name="name"
                                        value="<?php echo e($plan->name); ?>" />
                                    <?php $__errorArgs = ['name'];
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

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Image <sup class="text-danger">*</sup>
                                </label>
                                <div class="position-relative">
                                    <input type="file" class="w-100" id="" name="image"
                                        value="<?php echo e(old('image')); ?>" />
                                    <?php $__errorArgs = ['image'];
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
                                <div class="output-img d-flex flex-wrap border mt-2 pt-2 px-2">
                                    
                                    <div class="me-2 mb-2 position-relative view-added-image">
                                        <span data-index="0" class="remove-btn-img position-absolute rounded-circle"
                                            type="button"><i class="bi bi-x-circle-fill"></i></span>
                                        <img width="70" height="70"
                                            src="<?php echo e(asset('advert-plans/' . $plan->id . '/' . $plan->image)); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Price <sup class="text-danger">*</sup>
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" name="price" value="<?php echo e($plan->price); ?>">
                                    <?php $__errorArgs = ['price'];
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

                        <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Days <sup class="text-danger">*</sup>
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" name="days" value="<?php echo e($plan->days); ?>">
                                    <?php $__errorArgs = ['days'];
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

                        <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Size <sup class="text-danger">*</sup>
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" name="size" value="<?php echo e($plan->size); ?>">
                                    <?php $__errorArgs = ['size'];
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

                        <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Design Name <sup class="text-danger">*</sup>
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" name="design_name"
                                        value="<?php echo e($plan->design_name); ?>">
                                    <?php $__errorArgs = ['design_name'];
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

                        <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Design Price <sup class="text-danger">*</sup>
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" name="design_price"
                                        value="<?php echo e($plan->design_price); ?>">
                                    <?php $__errorArgs = ['design_price'];
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

                        <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Color <sup class="text-danger">*</sup> <sup class="text-danger">color name or
                                        code(#FFF)</sup>
                                </label>
                                <div class="position-relative">
                                    <input type="color" class="w-100" name="color" value="<?php echo e($plan->color); ?>">
                                    <?php $__errorArgs = ['color'];
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


                        <div class="d-flex align-items-center mb-3 mt-4">
                            <div class="ms-auto form-submit-btn">
                                <button type="submit" class="border-0 f-medium rounded-btn px-3 py-2 bg-theme text-white"
                                    style="width: 200px !important;">
                                    Update Plan Price
                                </button>
                            </div>
                        </div>


                    </div>

                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/admin/advert-plan/edit-plan.blade.php ENDPATH**/ ?>