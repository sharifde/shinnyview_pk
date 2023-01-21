
<?php $__env->startSection('content'); ?>


    <!-- pricing -->
    <div class="pricing main-padding">
        <div class="container">
          <div class="row">
  
            <!-- main heading -->
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="project-titles">
                <div class="title">Packages Plans</div>
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

									<span class="period">/<?php echo e($row->days); ?>&nbsp;<?php echo e('Days'); ?></span>
								</h6>
								<hr>
								<ul class="fa-ul">
									<li><span class="fa-li"><i class="fas fa-check"></i></span><?php echo e($row->property); ?> <?php echo e(' Property Allowed'); ?></li>
									<li><span class="fa-li"><i class="fas fa-check"></i></span><?php echo e('Valid for '); ?><?php echo e($row->days); ?> <?php echo e('Days'); ?></li>
									<li><span class="fa-li"><i class="fas fa-check"></i></span><?php echo e($row->picture); ?> <?php echo e(' Property Pictures Allowed'); ?></li>
									<li>
										<?php if($row->video_link > 0): ?>
										<span class="fa-li"><i class="fas fa-check"></i></span><?php echo e($row->video_link); ?> <?php echo e(' Property Videos Link are Allowed'); ?>

										<?php else: ?>
										<span class="fa-li"><i class="fas fa-times"></i></span><?php echo e('Property Videos Link are not Allowed'); ?>

										<?php endif; ?>
									</li>
									<li>
										<?php if($row->feature_property > 0): ?>
										<span class="fa-li"><i class="fas fa-check"></i></span>
										<?php echo e($row->feature_property.' Featured Property Allowed'); ?>

										<?php else: ?>
										<span class="fa-li"><i class="fas fa-times"></i></span>
										<?php echo e('Featured Property not Allowed'); ?>

										<?php endif; ?>
									</li>
									<li>
										<?php if($row->boosted_property > 0): ?>
										<span class="fa-li"><i class="fas fa-check"></i></span>
										<?php echo e($row->feature_property.' Boosted Property Allowed'); ?>

										<?php else: ?>
										<span class="fa-li"><i class="fas fa-times"></i></span>
										<?php echo e('Boosted Property not Allowed'); ?>

										<?php endif; ?>
									</li>
									<li>
										<?php if($row->option1): ?>
										<span class="fa-li"><i class="fas fa-check"></i></span>
										<?php echo e($row->option1); ?>

										<?php endif; ?>
									</li>
									<li>
										<?php if($row->option2): ?>
										<span class="fa-li"><i class="fas fa-check"></i></span>
										<?php echo e($row->option2); ?>

										<?php endif; ?>
									</li>
									<li>
										<?php if($row->option3): ?>
										<span class="fa-li"><i class="fas fa-check"></i></span>
										<?php echo e($row->option3); ?>

										<?php endif; ?>
									</li>
								</ul>
								<a href="<?php if(isset(Auth::user()->id)) { echo route('packages');}else {echo route('login');}?>" class="btn btn-block btn-primary" style="width: 100% !important; background: <?php echo $row->color ?>; <?php if($row->name == 'Free' && isset(Auth::user()->id)) { echo 'display:none';}?>">
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

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/frontend/pricing/packages-list.blade.php ENDPATH**/ ?>