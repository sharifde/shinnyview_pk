
<?php $__env->startSection('content'); ?>


<div class="py-4">
    <div class="bg-white card-body-content">
        <div class="search-form-header bg-theme-dark">
            <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Buy Advertisment
                <span class="txb-color">Plan</span>
            </h5>
        </div>
        <form class="row px-4 py-4 form-main-wrap"  action="<?php echo e(route('packagestore')); ?>" method="POST">
            <?php echo csrf_field(); ?>
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
            	<div class="row">
					<?php if($packages): ?>
					   <?php $i=0; ?>
						<?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p_plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($p_plan->name != 'Free'): ?>
							   <?php $i++; ?>
						<tr>
							<td class="py-2 px-3">
								<br>
								<p class="mb-3"><span style="background-color: <?php echo e($p_plan->color); ?>; padding: 4px 25px;"><b style="color:white"><?php echo e($p_plan->name); ?></b></span> You will get <b><?php echo e($p_plan->property); ?></b> Listings of your properties <b style="float: right;">PKR: <?php echo e($p_plan->price); ?></b> for <?php echo e($p_plan->days); ?> days
								</p>
								   <div style="width: 55px; margin-left: 60%; margin-top: -33px; padding: 2px 16px; margin-bottom: 17px;" >	
									<label class="f-medium">
												Qty 
											</label>
											<input style="width: 50px" type="number" value="1" placeholder="Quantity" name="quantity[]" >
										 </div>
										<label class="f-medium" style="margin-left: 80%; margin-top: -6%;">
												Choose Plan 
											</label>
										<div id="checker" style="margin-left: 50%; margin-top:-4%">
										<input style="margin-top: -1.5%; margin-left: 34%;" type="checkbox" name="add-ons[]" id="add-dj" data-price="<?php echo e($p_plan->price); ?>" value="<?php echo e($p_plan->id); ?>" >
										</div>
										<hr style="border: 0.2px solid #BC985F;">
										 
										<input type="hidden" name="type" value="Package Plan">
										<input type="hidden" id="amt" class="container" name="amt[]" >
                                    </td>
						</tr>

							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
					<textarea id="field_results" style="display: none" name="ads_id"></textarea>
								<div class="search-form-header bg-theme-dark" style="padding: 10px 25px; margin-top: -16px;">
									<strong style="color: white; float: left">Total</strong>
										<b id="result" class="container" style="color: white; margin-left: 84%;">0</b>
								</div>
				
               
            </div>
                
                    <button style="margin-left:88%; margin-top: 30px" type="submit"  class="border-0 f-medium rounded-btn  px-3 py-2 bg-theme text-white" id="checkBtn">Buy Now</button>
          
        </form>
    </div>
</div>

<script>
	
	$(document).ready(function() {
  function validate() {
    var sum = 0;
    sum += +$('#go input:checked').data('price') || 0;
    sum += +$('#place option:selected').data('price') || 0;
    //loop through checked checkbox
    $('#checker input:checked').each(function() {
      sum += +$(this).data('price') //get dataprice add in sum
    })


    $('#result').html( sum === 0 ? '' : 'PKR: ' + sum );
	  $('#amt').val( sum === 0 ? '' : 'Rs: ' + sum );
  }
  validate();

  $('#go input, #place, #checker input').on('change', function() {
    validate();
  });

});
	
$(document).ready(function () {
    $('#checkBtn').click(function() {
      checked = $("input[type=checkbox]:checked").length;

      if(!checked) {
        alert("You must check at least one checkbox.");
        return false;
      }

    });
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('agent.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/agent/package-buy.blade.php ENDPATH**/ ?>