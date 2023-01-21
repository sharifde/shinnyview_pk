
<?php $__env->startSection('content'); ?>


    <!-- pricing -->
    <div class="pricing main-padding">
        <div class="container">
          <div class="row">
  
            <!-- main heading -->
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="project-titles">
                <div class="title">Packages</div>
              </div>
            </div>
            
            
			  <div class="pack-cont">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="price b-shadow">
                        <div class="top-title">
                            <div class="title"><a style="color: #97753f !important; font-weight: 800;" href="<?php echo e(route('packages-details')); ?>">Packages Plan</a></div>
                            <div class="p-price"><a style="color: #97753f !important" href="<?php echo e(route('packages-details')); ?>"><span>more details</span></a></div>
                        </div>
                        
                    </div>
                </div>
			  	
			  	<div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="price b-shadow">
                        <div class="top-title">
							<div class="title"><a style="color: #97753f !important; font-weight: 800;" href="<?php echo e(route('pricing')); ?>">Advert Plan</a></div>
                            <div class="p-price"><a style="color: #97753f !important" href="<?php echo e(route('pricing')); ?>"><span>more details</span></a></div>
                        </div>
                        
                    </div>
                </div>
			  </div>

            <!-- main heading -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="project-titles branch-title">
                  <div class="title">Payment Method</div>
                </div>
            </div>

            
            <div class="bank-details">
                
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="price b-shadow">
                        <div class="top-title">
                            <div class="title"><img style="height: 55px" src="<?php echo e(asset('images/meezan-bank.png')); ?>" alt="meezan-bank"></div>
                        </div>
                        <div class="price-info">
                            <ul>
                                <li><i class="bi bi-check"></i> Account No: 03030106534465</li>
                                <li><i class="bi bi-check"></i> Name: Shinnyview SMC PVT LTD</li>
                                <li><i class="bi bi-check"></i> Branch Code: (0303)</li>
                                <li><i class="bi bi-check"></i> Branch: F-7 Jinnah Supermarket-ISD</li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>

                
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="price b-shadow">
                        <div class="top-title">
                            <div class="title"><img style="height: 150px" src="<?php echo e(asset('images/easypasa.png')); ?>" alt="easypasa"></div>
                        </div>
                        <div class="price-info">
                            <ul>
                                <li><i class="bi bi-check"></i> Account No: 0330 69 69 69 8</li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>

                
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="price b-shadow">
                        <div class="top-title">
                            <div class="title">Instruction for Payment</div>
                        </div>
                        <div class="price-info">
                            <ul>
                                <li><i class="bi bi-check"></i> Transfer Actual Amount into our Business Account of Meezan Bank and EasyPasa Account</li>
                                <li><i class="bi bi-check"></i> Take a screenshot of the completed transaction</li>
                                <li><i class="bi bi-check"></i> WhatsApp the screenshot to: <a href="//api.whatsapp.com/send?phone=03306969698" target="_blank">03306969698</a></li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="price-contact">
                    <div class="d-btn">
                        <a href="<?php echo e(route('contact.us')); ?>" class="btn">Contact Us</a>
                    </div>
                </div>
            </div>
            
  
  
          </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
<script type="text/javascript">
    // $(document).ready(function(){
    //     // show popup
    //     $('.pricing .price .price-info ul li a.show-popup').on('click', function(){
    //             $('.price-popup').css('display','block');
    //     });
    //     // hide popup
    //     $('.popup .popup-content .icon').on('click', function(){
    //             $('.price-popup').css('display','none');
    //     });
    //     $('.popup .overlay').on('click', function(){
    //             $('.price-popup').css('display','none');
    //     });
        
    // });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/frontend/packages.blade.php ENDPATH**/ ?>