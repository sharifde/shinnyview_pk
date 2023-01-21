<?php
    use \App\Http\Controllers\globalC;
?>


<?php $__env->startSection('seo_title'); ?><?php echo e((isset($seo_title)) ? $seo_title : $seo_title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('seo_keywords'); ?><?php echo e((isset($seo->seo_keyword)) ? $seo->seo_keyword : 'plots, plot, housing, housing society, plotting, housing society islamabad, plot for sale in lahore, housing society lahore, plot sale in lahore'); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('seo_description'); ?><?php echo e((isset($seo_description)) ? $seo_description : $seo_description); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('seo_url'); ?><?php echo e(url()->current()); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
  <!-- property-listing -->
  <div class="property-listing main-padding">
    <div class="container">
      <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
          <!-- search -->

          <div class="global-search h-search b-shadow bg-white properties-listing-page">
            <form method="get" action="<?php echo e(route('properties-listing')); ?>" class="property-filters">
			  <div style="margin: 10px 0px;">
					<div class="s-select s-large">
						 <select name="city" class="p-city search-select">
							<!--<option value="">Select City</option>-->
							<?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option class="cid" value="<?php echo e($c->id); ?>" <?php if(isset($scity) && $scity == $c->id): ?> selected="selected" <?php endif; ?>><?php echo e($c->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						 </select>
					  <i class="fas fa-angle-down"></i>
					</div>

					<div class="s-select s-loc">
					<input type="text" name="search" id="loc_search" placeholder="Search Location..." class="form-control" value="<?php if($c_search): ?> <?php echo e($c_search); ?><?php endif; ?>">
					</div>
					<div id="loc_search_list"></div>
				</div>

                <div class="s-select s-large">
                <select name="purpose" class="p-purpose search-select">
                    <option value="">Select Purpose</option>
                    <?php $__currentLoopData = $purpose; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($p->id); ?>" <?php if(isset($spurpose) && $spurpose == $p->id): ?> selected="selected" <?php endif; ?>><?php echo e($p->name); ?></option>
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
                        <option value="<?php echo e($b->bedroom); ?>" <?php if(isset($sbeds) && $sbeds == $b->bedroom): ?> selected="selected" <?php endif; ?>><?php echo e($b->bedroom); ?> Beds</option>
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
                <button class="btn">Search <?php if($p_count): ?> <b>(<?php echo e($p_count); ?>)</b> <?php endif; ?></button>
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
                            <div class="feature-d p-feature" <?php if($p->boost == 1): ?> style="left: 115px;" <?php endif; ?>><i class="fas fa-trophy"></i> Featured</div>
                        <?php endif; ?>
                        <?php if($p->boost == 1): ?>
                            <div class="feature-d p-boosted"><i class="fas fa-angle-double-up"></i> Boosted</div>
                        <?php endif; ?>
                        <div class="p-type <?php echo e(strtolower( str_replace(' ', '-', $p->property_type_name) )); ?>"><?php echo e($p->property_type_name); ?> for <?php echo e($p->purpose); ?> </div>
                    </div>
                    
                    <div class="p-info">
                        <div class="price">PKR: <?php echo e(convertCurrency($p->price)); ?></div>
                        <div class="title"> <?php echo e($p->name); ?></div>
                        <div class="b-info"> <?php if(isset($p->address)): ?><?php echo e($p->address); ?>,<?php endif; ?> <?php echo e($p->city); ?></div>
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

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	  <script type="text/javascript">
            // jQuery wait till the page is fullt loaded
            $(document).ready(function () {
                // keyup function looks at the keys typed on the search box
                $('#loc_search').on('keyup',function() {
                    // the text typed in the input field is assigned to a variable 
                    var query = $(this).val();
					var cid = $('.cid').val();
                    // call to an ajax function
                    $.ajax({
                        // assign a controller function to perform search action - route name is search
                        url:"<?php echo e(route('Autocomplte.getAutocomplte')); ?>",
                        // since we are getting data methos is assigned as GET
                        type:"GET",
                        // data are sent the server
                        data:{'search':query, cid: cid},
                        // if search is succcessfully done, this callback function is called
                        success:function (data) {
                            // print the search results in the div called country_list(id)
                            $('#loc_search_list').html(data);
                        }
                    })
                    // end of ajax call
                });

                // initiate a click function on each search result
                $(document).on('click', 'li', function(){
                    // declare the value in the input field to a variable
                    var value = $(this).text();
                    // assign the value to the search box
                    $('#loc_search').val(value);
                    // after click is done, search results segment is made empty
                    $('#loc_search_list').html("");
                });
            });
		  
		  $(document).ready(function() {
			$("select").change(function(){
				var cid = $(this).val();
						$('#loc_search').on('keyup',function() {
                    // the text typed in the input field is assigned to a variable 
                    var query = $(this).val();
                    // call to an ajax function
                    $.ajax({
                        // assign a controller function to perform search action - route name is search
                        url:"<?php echo e(route('Autocomplte.getAutocomplte')); ?>",
                        // since we are getting data methos is assigned as GET
                        type:"GET",
                        // data are sent the server
                        data:{'search':query, cid: cid},
                        // if search is succcessfully done, this callback function is called
                        success:function (data) {
                            // print the search results in the div called country_list(id)
                            $('#loc_search_list').html(data);
                        }
                    })
                    // end of ajax call
                });

                // initiate a click function on each search result
                $(document).on('click', 'li', function(){
                    // declare the value in the input field to a variable
                    var value = $(this).text();
                    // assign the value to the search box
                    $('#loc_search').val(value);
                    // after click is done, search results segment is made empty
                    $('#loc_search_list').html("");
                });
					
				});
		});
		  
        </script>


<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/frontend/properties_listing.blade.php ENDPATH**/ ?>