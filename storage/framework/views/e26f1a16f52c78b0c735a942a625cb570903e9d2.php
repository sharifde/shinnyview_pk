
<?php $__env->startSection('content'); ?>

<?php
use Illuminate\Support\Carbon;
 $data =  DB::table('package_plan')->where('id',Auth::user()->plan_id)->first();
                $to = \Carbon\Carbon::createFromFormat('Y-m-d', Auth::user()->plan_expired_date);
                $from = \Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
                $diff_in_days = $to->diffInDays($from);
?>

<?php if(Auth::user()->status == 1 &&  $diff_in_days > 0): ?>
<div class="row mt-4">
  <div class="col-md-6 col-lg-4 mb-4">
    <div class="bg-theme-dark dashboard-tile py-3 px-3 d-flex flex-wrap align-items-center">
      <div class="icon-tile rounded-circle d-flex me-3
        align-items-center justify-content-center">
        <i class="bi bi-receipt-cutoff text-white"></i>
      </div>
      <div class="ms-auto text-white text-end tile-detail">
        <h5 class="f-bold mb-0"><?php echo e($total_sale_property); ?></h5>
        <p class="mb-0 f-medium">Sales Properties</p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4 mb-4">
    <div class="bg-theme-dark dashboard-tile py-3 px-3 d-flex flex-wrap align-items-center">
      <div class="icon-tile rounded-circle d-flex me-3
        align-items-center justify-content-center">
        <i class="bi bi-key text-white"></i>
      </div>
      <div class="ms-auto text-white text-end tile-detail">
        <h5 class="f-bold mb-0"><?php echo e($total_rent_property); ?></h5>
        <p class="mb-0 f-medium">Rent Properties</p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4 mb-4">
    <div class="bg-theme-dark dashboard-tile py-3 px-3 d-flex flex-wrap align-items-center">
      <div class="icon-tile rounded-circle d-flex me-3
        align-items-center justify-content-center">
        <i class="bi bi-pencil-square text-white"></i>
      </div>
      <div class="ms-auto text-white text-end tile-detail">
        <h5 class="f-bold mb-0"><?php echo e($total_lease_property); ?></h5>
        <p class="mb-0 f-medium">Lease Properties</p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4 mb-4">
    <div class="bg-theme-dark dashboard-tile py-3 px-3 d-flex flex-wrap align-items-center">
      <div class="icon-tile rounded-circle d-flex me-3
        align-items-center justify-content-center">
        <i class="bi bi-building text-white"></i>
      </div>
      <div class="ms-auto text-white text-end tile-detail">
        <h5 class="f-bold mb-0"><?php echo e($total_sale_property+$total_rent_property+$total_lease_property); ?></h5>
        <p class="mb-0 f-medium">All Properties</p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4 mb-4">
    <div class="bg-theme-dark dashboard-tile py-3 px-3 d-flex flex-wrap align-items-center">
      <div class="icon-tile rounded-circle d-flex me-3
        align-items-center justify-content-center">
        <i class="bi bi-building text-white"></i>
      </div>
     <?php if(isset($package)): ?>
      <div class="ms-auto text-white text-end tile-detail">
        <h5 class="f-bold mb-0"><?php echo e($total_sale_property+$total_rent_property+$total_lease_property); ?>/<?php echo e($package->property); ?></h5>
        <p class="mb-0 f-medium">Posted Ads/Package Ads</p>
      </div>
     <?php endif; ?>
    </div>
  </div>
  <div class="col-md-6 col-lg-4 mb-4" style="display: none;">
    <div class="bg-theme-dark dashboard-tile py-3 px-3 d-flex flex-wrap align-items-center">
      <div class="icon-tile rounded-circle d-flex me-3
        align-items-center justify-content-center">
        <i class="bi bi-building text-white"></i>
      </div>
      <?php
      if( Auth::user()->plan_expired_date){
      $to = \Carbon\Carbon::createFromFormat('Y-m-d', Auth::user()->plan_expired_date);
      $from = \Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
      $diff_in_days = $to->diffInDays($from);
      ?>
    <?php if(isset($package)): ?>
      <div class="ms-auto text-white text-end tile-detail remaining-days dashboard-pkg-info">
        <h5 class="f-bold mb-0"> <span>Current Plan - </span><?php echo e($package->name); ?></h5>

        <h5 class="f-bold mb-0">Remaing Days <?php echo e($diff_in_days); ?></h5>

        
      </div>
    <?php endif; ?>
      <?php }?>
    </div>
  </div>
</div>
<?php elseif($diff_in_days <= 0): ?>
	<div class="row">
            <div class="col-md-12">
                
				<div class="alert alert-danger">
					<h6><b>Your Shinny View Ad Posting Package is Expired!</b></h6>
					<hr>
					<p>Renew your package plan to continue accessing Ad posting and other benefits.</p>
					<small><a href="<?php echo e(route('packages-details')); ?>"><i>Click here</i></a> to buy new package.</small>
				</div>
            </div>
        </div>
<?php elseif(Auth::user()->status == 0 && Auth::user()->role_type == 'Private Seller'): ?>
	 <div class="row">
            <div class="col-md-12">
                
                    <div class="alert alert-danger">
						<h6><b>Email not verified. Verification of Email account Pending!</b></h6>
						<hr>
						<p>Check your Email account or spam. Verify your email to Post Ads.</p>
						<small>If you not receive email <a href="#"><i>Click here</i></a> to resend verification link.</small>
                    </div>
            </div>
        </div>
<?php elseif(Auth::user()->status == 0 && Auth::user()->role_type == 'Agent'): ?>
	 <div class="row">
            <div class="col-md-12">
                
                    <div class="alert alert-danger">
						<h6><b>Payment verification Pending! or Account is suspended by Admin.</b></h6>
						<hr>
						<p>Send your payment details on our Whatsapp number. Verify your payment to Post Ads.</p>
						<small>Get payment information details and send your receipt on our whatsapp number <a href="<?php echo e(route('paymentdetails')); ?>"><i>Click here</i></a>.</small>
                    </div>
            </div>
        </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('agent.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/agent/dashboard.blade.php ENDPATH**/ ?>