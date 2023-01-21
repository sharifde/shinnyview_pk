
<?php $__env->startSection('content'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount($application)->html();
} elseif ($_instance->childHasBeenRendered('D4eLPb4')) {
    $componentId = $_instance->getRenderedChildComponentId('D4eLPb4');
    $componentTag = $_instance->getRenderedChildComponentTagName('D4eLPb4');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('D4eLPb4');
} else {
    $response = \Livewire\Livewire::mount($application);
    $html = $response->html();
    $_instance->logRenderedChild('D4eLPb4', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<script>
    $(document).on('change','#parent-rel-select',function(){
        $('.child-drop-area').addClass('d-none');
        $('#'+$(this).val()).removeClass('d-none');
    })
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/frontend/application_form.blade.php ENDPATH**/ ?>