
<?php $__env->startSection('content'); ?>


    <!-- pricing -->
    <div class="pricing main-padding">
        <div class="container">
          <div class="row">
  
            <!-- main heading -->
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="project-titles">
                <div class="title">Advert Plans</div>
              </div>
            </div>
			  
            
			<div class="container">
		         <div class="row pricing">
					<?php
					 $count = 0;
					 ?>
					<?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					 <?php $count++; ?>
					 <?php if($count == 4): ?>
					 	<hr style="margin-top: 20px">
					 <?php endif; ?>
					<div class="col-lg-4 mb_30">
						<div class="card mb-5 mb-lg-0">
							<div class="card-body">
								<h5 class="card-title text-muted text-uppercase text-center" style="color: <?php echo $row->color ?> !important"><?php echo e($row->name); ?></h5>
								<h6 class="card-price text-center">
									Rs <?php echo e($row->price); ?>

									<span class="period">/<?php echo e($row->days); ?><?php echo e('Days'); ?></span>
								</h6>
								<hr>
								<ul class="fa-ul">
									<li><span class="fa-li"><i class="fas fa-check"></i></span><?php echo e('Valid for '); ?><?php echo e($row->days); ?> <?php echo e('Days'); ?></li>
									<li><span class="fa-li"><i class="fas fa-check"></i></span><?php echo e('Size: '); ?><?php echo e($row->size); ?> </li>
									<li><span class="fa-li"><i class="fas fa-check"></i></span><?php echo e($row->design_name.': '); ?><?php echo e($row->design_price); ?> </li>
								</ul>
								<a href="<?php echo e(route('packages')); ?>" class="btn btn-block btn-primary" style="width: 100% !important; background: <?php echo $row->color ?>;">
									<?php if($row->name == 'Free'): ?>
									<?php echo e('Enroll Now'); ?>

									<?php else: ?>
									<?php echo e('Buy Now'); ?>

									<?php endif; ?>
								</a>
							</div>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		</div>
	</div>
			 
            <!-- main heading -->
            <!--<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="project-titles branch-title">
                  <div class="title">Buy Plan</div>
                </div>
            </div>-->

            
           <!-- <div class="bank-details">
                
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="price b-shadow">
                        <div class="top-title">
                            <div class="title"><img src="<?php echo e(asset('public')); ?>/images/meezan-bank.png" alt="meezan-bank"></div>
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
                            <div class="title"><img src="<?php echo e(asset('public')); ?>/images/easypasa.png" alt="easypasa"></div>
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
-->
            
            <!--<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="price-contact">
                    <div class="d-btn">
                        <a href="<?php echo e(route('contact.us')); ?>" class="btn">Contact Us</a>
                    </div>
                </div>
            </div>-->
            
  
  
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
<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/frontend/pricing/pricing-list.blade.php ENDPATH**/ ?>