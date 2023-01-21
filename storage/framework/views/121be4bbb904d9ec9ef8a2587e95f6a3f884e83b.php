
<?php $__env->startSection('content'); ?>
    
    <Section class="px-lg-5 px-4  py-5 my-md-4 detail-content-site s-page-contents">
        <div class="col-lg-10 mx-auto">
            <div class="caption-body pb-5">
                <div class="px-lg-5 pt-4 pt-lg-5 px-4">
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="p-4 contact-info-box">
                                <h2 class="mb-3 f-bold text-uppercase">Main <span class="txb-color">Office</span></h2>
                                <address>
                                    <p class="f-medium d-flex">
                                        <i class="bi bi-geo-alt text-danger me-2"></i>
                                        First Floor, Office no 13, VIP Plaza I-8 Markaz, <br />Islamabad
                                    </p>
                                </address>
                                <a href="mailto:info@shinnyview.com" class="d-block text-decoration-none my-3">
                                    <p class="mb-0 text-grey">
                                        <i class="bi bi-envelope me-2 txb-color"></i>
                                        info@shinnyview.com
                                    </p>
                                </a>
                                <div class="iti__flag iti__pk"></div>
                                <a href="tel:0330-6969698" class="d-block text-decoration-none mt-3">
                                    <p class="mt-3 text-grey mb-0">
                                        <i class="bi bi-telephone me-2 tx-color"></i>
                                        <img src="<?php echo e(asset('images/pakistan.png')); ?>" alt="" class="c-flag-img">
                                        +92 330 6969698
                                    </p>
                                </a>
                                <a href="https://www.shinnyview.com" target="_blank"  class="d-block text-decoration-none mt-3">
                                    <p class="mt-3 text-grey mb-0">
                                        <i class="bi bi-globe me-2 tx-color"></i>
                                        www.shinnyview.com
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="p-4 contact-info-box">
                                <h2 class="mb-3 f-bold text-uppercase">Head <span class="txb-color">Office</span></h2>
                                <address>
                                    <p class="f-medium d-flex">
                                        <i class="bi bi-geo-alt text-danger me-2"></i>
                                        6-9 The Square, Stockley Park, UB11 1FW London <br />United Kingdom
                                    </p>
                                </address>
                                <a href="mailto:info@shinnyview.com" class="d-block text-decoration-none my-3">
                                    <p class="mb-0 text-grey">
                                        <i class="bi bi-envelope me-2 txb-color"></i>
                                        info@shinnyview.com
                                    </p>
                                </a>
                                <a href="tel:020 3290 2948" class="d-block text-decoration-none mt-3">
                                    <p class="mt-3 text-grey mb-0">
                                        <i class="bi bi-telephone me-2 tx-color"></i>
                                        <img src="<?php echo e(asset('images/uk.png')); ?>" alt="" class="c-flag-img">
                                        020 3290 2948
                                    </p>
                                </a>
                                
                            </div>
                        </div>
                        <div style="width: 100%; float: left;">
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('contact')->html();
} elseif ($_instance->childHasBeenRendered('49npyNv')) {
    $componentId = $_instance->getRenderedChildComponentId('49npyNv');
    $componentTag = $_instance->getRenderedChildComponentTagName('49npyNv');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('49npyNv');
} else {
    $response = \Livewire\Livewire::mount('contact');
    $html = $response->html();
    $_instance->logRenderedChild('49npyNv', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </Section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/frontend/contact_us.blade.php ENDPATH**/ ?>