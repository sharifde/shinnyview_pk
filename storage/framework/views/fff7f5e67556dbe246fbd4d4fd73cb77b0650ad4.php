

<?php $__env->startSection('content'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('login')->html();
} elseif ($_instance->childHasBeenRendered('zII4AOb')) {
    $componentId = $_instance->getRenderedChildComponentId('zII4AOb');
    $componentTag = $_instance->getRenderedChildComponentTagName('zII4AOb');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('zII4AOb');
} else {
    $response = \Livewire\Livewire::mount('login');
    $html = $response->html();
    $_instance->logRenderedChild('zII4AOb', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/frontend/login.blade.php ENDPATH**/ ?>