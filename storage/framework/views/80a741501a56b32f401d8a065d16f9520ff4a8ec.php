<?php
    use \App\Http\Controllers\globalC;
?>



<?php $__env->startSection('content'); ?>
    
  <!-- property-listing -->
  <div class="property-listing main-padding">
    <div class="container">
      <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
          <!-- search -->

          <div class="global-search h-search b-shadow bg-white properties-listing-page">
            <form method="get" action="<?php echo e(route('properties-listing')); ?>" class="property-filters">
                <div class="s-select s-large">
                <select name="city" class="p-city search-select">
                    <option value="">Select City</option>
                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($c->id); ?>" <?php if(isset($cityid) && $cityid == $c->id): ?> selected="selected" <?php endif; ?>><?php echo e($c->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <i class="fas fa-angle-down"></i>
                </div>

                <div class="s-select s-large">
                <select name="purpose" class="p-purpose search-select">
                    <option value="">Select Purpose</option>
                    <?php $__currentLoopData = $purpose; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($p->id); ?>"><?php echo e($p->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <i class="fas fa-angle-down"></i>
                </div>
        
                <div class="s-select">
                    <select name="subtype" class="p-purpose search-select">
                        <option value="">Select Type</option>
                        <optgroup label="Residential Properties">
                            <option value="1">House</option>
                            <option value="2">Plot</option>
                            <option value="3">Apartment</option>
                            <option value="4">Form House</option>
                            <option value="5">Office</option>
                            <option value="6">Room</option>
                            <option value="10">On Lease</option>
                        </optgroup>
                        <optgroup label="Commercial Properties">
                            <option value="5">Office</option>
                            <option value="2">Plot</option>
                            <option value="7">Shop</option>
                            <option value="8">Building</option>
                            <option value="9">Warehouse</option>
                            <option value="10">On Lease</option>
                        </optgroup>
                        <optgroup label="Land">
                            <option value="11">Agriculture</option>
                            <option value="12">Industrial</option>
                        </optgroup>
                    </select>
                    <i class="fas fa-angle-down"></i>
                </div>

                <div class="s-select">
                <select name="beds" class="p-beds search-select">
                    <option value="">Select Beds</option>
                    <?php $__currentLoopData = $beds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($b->bedroom); ?>"><?php echo e($b->bedroom); ?> Beds</option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <i class="fas fa-angle-down"></i>
                </div>

                <div class="s-select">
                <select name="baths" class="p-baths search-select">
                    <option value="">Select Bath</option>
                    <?php $__currentLoopData = $bath; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($b->bath); ?>"><?php echo e($b->bath); ?> Baths</option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <i class="fas fa-angle-down"></i>
                </div>
        
                <div class="s-select s-input mb-margin">
                <input name="min" type="text" class="p-min" placeholder="Min Price">
                </div>
                <div class="s-select s-input mb-margin">
                <input name="max" type="text" class="p-max" placeholder="Max Price">
                </div>
        
                <div class="d-btn mb-margin">
                <button class="btn">Search</button>
                </div>
            </form>

          </div>
        </div>


        <div class="prop-list-data">

          <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-3 col-sm-4 col-xs-12">
              <div class="default-card">
                  <a href="<?php echo e(route('view-property',['ptype' => $p->propertyType, 'stype' => $p->purpose,'city' => $p->city,'id' => $p->id,'slug' => $p->slug])); ?>" class=" b-shadow">
                    <div class="image">
                        <img src="<?php echo e(asset('properties/gallery/'.$p->image)); ?>" alt="<?php echo e($p->name); ?>">
                        
                        <?php if($p->featured == 1): ?>
                            <div class="feature-d p-feature" <?php if($p->featured == 1): ?> style="left: 115px;" <?php endif; ?>><i class="fas fa-trophy"></i> Featured</div>
                        <?php endif; ?>
                        
                        <div class="p-type <?php echo e(strtolower( str_replace(' ', '-', $p->property_type_name) )); ?>"><?php echo e($p->property_type_name); ?> for <?php echo e($p->purpose); ?> </div>
                    </div>
                    
                    <div class="p-info">
                        <div class="price">PKR: <?php echo e(convertCurrency($p->price)); ?></div>
                        <div class="title"><?php if(isset($p->address)): ?><?php echo e($p->address); ?>,<?php endif; ?> <?php echo e($p->name); ?></div>
                        <div class="b-info"> <?php echo e($p->city); ?></div>
                    </div>
                    
                    <div class="additional-info">
                      <div class="a-features" <?php if(empty($p->bedroom)): ?> style="width: 80%;" <?php endif; ?> title="<?php echo e($p->size); ?> <?php echo e($p->area); ?>"><i class="fas fa-vector-square"></i> <span><?php echo e($p->size); ?> <?php echo e($p->area); ?></span></div>
                      <?php if($p->bedroom): ?>
                          <div class="a-features"><i class="fas fa-bed"></i> <?php echo e($p->bedroom); ?> Bed</div>
                      <?php endif; ?>
                      <?php if($p->bath): ?>
                          <div class="a-features"><i class="fas fa-bath"></i> <?php echo e($p->bath); ?> Bath</div>
                      <?php endif; ?>
                    </div>
                  </a>
              </div>
              </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($properties->hasPages()): ?>
            <div class="pagination-default">
                <?php echo e($properties->withQueryString()->onEachSide(1)->links()); ?>

            </div>
            <?php endif; ?>

        </div>

      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<script>
  // search property
  function searchProperty(el){
    var el_html = $(el).html();
    
    var postData = {
      "_token": "<?php echo e(csrf_token()); ?>",
      city: $('.p-city').val(),
      purpose: $('.p-purpose').val(),
      beds: $('.p-beds').val(),
      baths: $('.p-baths').val(),
      min: $('.p-min').val(),
      max: $('.p-max').val(),
    };
    $(el).html('Searching...');
    $.ajax({
        url: livewire_app_url + '/search-properties',
        data: postData,
        type: 'GET',
        success: function(res) {
            console.log(res);
            if(res != ""){
              $('.prop-list-data').html(res);
            } else {
              swal("Sorry, No Property found Please try different Criteria.");
            }
            $(el).html(el_html);
        },
        error: function (jqXHR, exception) {
            displayErrors(jqXHR, exception);
            $(el).html(el_html);
        }
    });
  }
</script>
<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/frontend/featured-property.blade.php ENDPATH**/ ?>