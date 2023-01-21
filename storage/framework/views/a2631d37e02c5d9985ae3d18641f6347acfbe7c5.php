<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta property="og:image" content="<?php echo e(asset('/')); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ShinnyView.com</title>
        <link rel="stylesheet" href="<?php echo e(asset('libraries/bootstrap/bootstrap.min.css')); ?>" />
        <link rel="shortcut icon" type="image/jpg" href="<?php echo e(asset('/images/favicon.jpeg')); ?>"/>
        <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>" />
	  <link rel="stylesheet" href="<?php echo e(asset('css')); ?>/external-style.css">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

        <script src="<?php echo e(asset('libraries/jquery/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('libraries/bootstrap/bootstrap.bundle.js')); ?>"></script>
        <script src="<?php echo e(asset('libraries/sweet-alert/sweet_alert.min.js')); ?>"></script>
        <link href="<?php echo e(asset('libraries/select2/select2.min.css')); ?>" rel="stylesheet" />

        <?php echo $__env->yieldPushContent('css'); ?>
        <?php echo \Livewire\Livewire::styles(); ?>

    </head>
    <body>
        <div class="d-flex">
            <?php echo $__env->make('agent.components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="flex-1">
                <?php echo $__env->make('agent.components.top_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="px-4 page-body-content">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>
        <script src="<?php echo e(asset('libraries/select2/select2.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/admin.js')); ?>"></script>
        <?php echo \Livewire\Livewire::scripts(); ?>

        <?php echo $__env->yieldPushContent('js'); ?>
        <script>
            window.livewire_app_url="<?php echo e(url('/')); ?>";
        </script>
    </body>
</html><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/agent/layout.blade.php ENDPATH**/ ?>