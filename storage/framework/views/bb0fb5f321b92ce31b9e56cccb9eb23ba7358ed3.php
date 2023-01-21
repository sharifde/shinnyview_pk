
<?php $__env->startSection('content'); ?>

<div class="w-75">
    <div class="row">
        <div class="col-md-12">
            <?php if(session()->has('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
            <?php if(session()->has('error')): ?>
                <div class="alert alert-danger">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="py-4">
    <div class="bg-white card-body-content">
        <div class="search-form-header bg-theme-dark">
            <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Payment
                <span class="txb-color">Method</span>
            </h5>
        </div>
		<div class="row pricing">
			<div class="col-lg-4 mb_30">
				<div class="card mb-5 mb-lg-0">
					<div class="card-body">
						<h5 class="card-title text-muted text-uppercase text-center"><div class="title"><img style="height: 55px" src="https://shinnyview.com/public/images/meezan-bank.png" alt="meezan-bank"></div></h5>
						
						<hr>
						<ul class="fa-ul">
							<li><span class="fa-li"><i class="fas fa-check"></i></span>Account No: 03030106534465</li>
							<li><span class="fa-li"><i class="fas fa-check"></i></span>Name: Shinnyview SMC PVT LTD</li>
							<li><span class="fa-li"><i class="fas fa-check"></i></span>Branch Code: (0303)</li>
							<li>
								<span class="fa-li"><i class="fas fa-check"></i></span>Branch: F-7 Jinnah Supermarket-ISD
							</li>
						</ul>
						
					</div>
				</div>
			</div>
					<div class="col-lg-4 mb_30">
						<div class="card mb-5 mb-lg-0">
							<div class="card-body">
								<h5 class="card-title text-muted text-uppercase text-center">
									<div class="title"><img style="height: 175px" src="https://shinnyview.com/public/images/easypasa.png" alt="easypaisa">
									</div>
								</h5>
								<hr>
								<ul class="fa-ul">
									<li><span class="fa-li"><i class="fas fa-check"></i></span>Account No: 0330 69 69 69 8</li>
									
							</div>
						</div>
					</div>
					<div class="col-lg-4 mb_30">
						<div class="card mb-5 mb-lg-0">
							<div class="card-body">
								<h5 class="card-title text-muted text-uppercase text-center" ><div class="title">Instruction for Payment</div></h5>
								
								<hr>
								<ul class="fa-ul">
									<li><span class="fa-li"><i class="fas fa-check"></i></span>Transfer Actual Amount into our Business Account of Meezan Bank and EasyPasa Account</li>
									<li><span class="fa-li"><i class="fas fa-check"></i></span>Take a screenshot of the completed transaction</li>
									<li><span class="fa-li"><i class="fas fa-check"></i></span>WhatsApp the screenshot to: <a href="//api.whatsapp.com/send?phone=03306969698" target="_blank">03306969698</a></li>
								</ul>
							</div>
						</div>
					</div>
					
		</div>
        
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('agent.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/agent/payment-method.blade.php ENDPATH**/ ?>