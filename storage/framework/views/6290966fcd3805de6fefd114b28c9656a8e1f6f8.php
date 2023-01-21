 <!-- Mobile nav -->
 <div class="mobile d-lg-none d-block">
     <div class="mainContainer position-relative mn-flex">
         <div class="mainMenu">
               <div class="position-absolute cancel-popup-btn">
                  <button type="button" class="bg-transparent border-0">
                     <i class="bi bi-x-lg"></i>
                  </button>
               </div>
               <ul class="px-0 w-100 mb-2">
                  <li>
                     <a href="<?php echo e(route('home')); ?>">Home</a>
                  </li>
               </ul>
             <div class="accordion w-100" id="accordionMenu">
                  <div class="accordion-item">
                     <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                           data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                           For Sale
                        </button>
                     </h2>
                     <div id="collapseOne" class="accordion-collapse collapse inner-responsive-collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionMenu">
                        <div class="accordion-body">
                           <h5 class="text-start mb-2">
                              <a href="#" class="text-decoration-none tx-color inner-link">Residential Properties</a>
                           </h5>
                           <ul class="inner-menu list-unstyled mb-3">
                              <li class="inner-parent mb-1">
                                 <a href="<?php echo e(url('/residential/house-for-sale')); ?>" class="text-decoration-none tx-color inner-link">
                                    <i class="bi bi-chevron-double-right me-2 txb-color"></i>House For Sale
                                 </a>
                              </li>
                              <li class="inner-parent mb-1">
                                 <a href="<?php echo e(url('/residential/apartment-for-sale')); ?>" class="text-decoration-none tx-color inner-link">
                                    <i class="bi bi-chevron-double-right me-2 txb-color"></i>Apartment For Sale
                                 </a>
                              </li>
                              <li class="inner-parent mb-1">
                                 <a href="<?php echo e(url('/residential/plot-for-sale')); ?>" class="text-decoration-none tx-color inner-link">
                                    <i class="bi bi-chevron-double-right me-2 txb-color"></i>Plot For Sale
                                 </a>
                              </li>
                              <li class="inner-parent mb-1">
                                 <a href="<?php echo e(url('/residential/farmhouse-for-sale')); ?>" class="text-decoration-none tx-color inner-link">
                                    <i class="bi bi-chevron-double-right me-2 txb-color"></i>Farm House For Sale
                                 </a>
                              </li>
                           </ul>
                           <h5 class="text-start mb-2">
                              <a href="#" class="text-decoration-none tx-color inner-link"> Commercial  Properties
                              </a>
                           </h5>
                           <ul class="inner-menu list-unstyled mb-0">
                              <li class="inner-parent mb-1">
                                 <a href="<?php echo e(url('/commercial/office-for-sale')); ?>" class="text-decoration-none tx-color inner-link">
                                    <i class="bi bi-chevron-double-right me-2 txb-color"></i>Office For Sale
                                 </a>
                              </li>
                              <li class="inner-parent mb-1">
                                 <a href="<?php echo e(url('/commercial/shop-for-sale')); ?>" class="text-decoration-none tx-color inner-link">
                                    <i class="bi bi-chevron-double-right me-2 txb-color"></i>Shop For Sale
                                 </a>
                              </li>
                              <li class="inner-parent mb-1">
                                 <a href="<?php echo e(url('/commercial/warehouse-for-sale')); ?>" class="text-decoration-none tx-color inner-link">
                                    <i class="bi bi-chevron-double-right me-2 txb-color"></i>Plot For Sale
                                 </a>
                              </li>
                              <li class="inner-parent mb-1">
                                 <a href="<?php echo e(url('/commercial/plot-for-sale')); ?>" class="text-decoration-none tx-color inner-link">
                                    <i class="bi bi-chevron-double-right me-2 txb-color"></i>Warehouse For Sale
                                 </a>
                              </li>
                              <li class="inner-parent mb-1">
                                 <a href="<?php echo e(url('/commercial/builing-for-sale')); ?>" class="text-decoration-none tx-color inner-link">
                                    <i class="bi bi-chevron-double-right me-2 txb-color"></i>Building For Sale
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                 <div class="accordion-item">
                     <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                           data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                           For Rent
                        </button>
                     </h2>
                     <div id="collapseTwo" class="accordion-collapse inner-responsive-collapse  collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionMenu">
                        <div class="accordion-body">
                           <h5 class="text-start mb-2">
                              <a href="#" class="text-decoration-none tx-color inner-link">Residential Properties</a>
                           </h5>
                           <ul class="inner-menu list-unstyled mb-3">
                              <li class="inner-parent mb-1">
                                 <a href="<?php echo e(url('/residential/house-for-rent')); ?>" class="text-decoration-none tx-color inner-link">
                                    <i class="bi bi-chevron-double-right me-2 txb-color"></i>House For Rent
                                 </a>
                              </li>
                              <li class="inner-parent mb-1">
                                 <a href="<?php echo e(url('/residential/apartment-for-rent')); ?>" class="text-decoration-none tx-color inner-link">
                                    <i class="bi bi-chevron-double-right me-2 txb-color"></i>Apartment For Rent
                                 </a>
                              </li>
                              <li class="inner-parent mb-1">
                                 <a href="<?php echo e(url('/residential/room-for-rent')); ?>" class="text-decoration-none tx-color inner-link">
                                    <i class="bi bi-chevron-double-right me-2 txb-color"></i>Room For Rent
                                 </a>
                              </li>
                              <li class="inner-parent mb-1">
                                 <a href="<?php echo e(url('/residential/farmhouse-for-rent')); ?>" class="text-decoration-none tx-color inner-link">
                                    <i class="bi bi-chevron-double-right me-2 txb-color"></i>Farm House For Rent
                                 </a>
                              </li>
                           </ul>
                           <h5 class="text-start mb-2">
                              <a href="#" class="text-decoration-none tx-color inner-link">Commercial Properties For Rent</a>
                           </h5>
                           <ul class="inner-menu list-unstyled mb-0">
                              <li class="inner-parent mb-1">
                                 <a href="<?php echo e(url('/commercial/office-for-rent')); ?>" class="text-decoration-none tx-color inner-link">
                                    <i class="bi bi-chevron-double-right me-2 txb-color"></i>Office For Rent
                                 </a>
                              </li>
                              <li class="inner-parent mb-1">
                                 <a href="<?php echo e(url('/commercial/shop-for-rent')); ?>" class="text-decoration-none tx-color inner-link">
                                    <i class="bi bi-chevron-double-right me-2 txb-color"></i>Shop For Rent
                                 </a>
                              </li>
                              <li class="inner-parent mb-1">
                                 <a href="<?php echo e(url('/commercial/building-for-rent')); ?>" class="text-decoration-none tx-color inner-link">
                                    <i class="bi bi-chevron-double-right me-2 txb-color"></i>Building For Rent
                                 </a>
                              </li>
                              <li class="inner-parent mb-1">
                                 <a href="<?php echo e(url('/commercial/warehouse-for-rent')); ?>" class="text-decoration-none tx-color inner-link">
                                    <i class="bi bi-chevron-double-right me-2 txb-color"></i>Warehouse For Rent
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </div>
                 </div>
                 <div class="accordion-item">
                     <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                           data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                           On Lease
                        </button>
                     </h2>
                     <div id="collapseThree" class="accordion-collapse collapse  inner-responsive-collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionMenu">
                        <div class="accordion-body">
                           <ul class="inner-menu list-unstyled mb-3">
                              <li class="inner-parent mb-1">
                                 <a href="<?php echo e(url('/residential/lease')); ?>" class="text-decoration-none tx-color inner-link">
                                    <i class="bi bi-chevron-double-right me-2 txb-color"></i>Residential Lease
                                 </a>
                              </li>
                              <li class="inner-parent mb-1">
                                 <a href="<?php echo e(url('/commercial/lease')); ?>" class="text-decoration-none tx-color inner-link">
                                    <i class="bi bi-chevron-double-right me-2 txb-color"></i>Commercial Lease
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="accordion-item">
                     <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                           data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                           Land
                        </button>
                     </h2>
                     <div id="collapseFour" class="accordion-collapse collapse inner-responsive-collapse" aria-labelledby="headingFour"
                        data-bs-parent="#accordionMenu">
                        <div class="accordion-body">
                           <ul class="inner-menu list-unstyled mb-0">
                              <li class="inner-parent mb-1">
                                 <a href="<?php echo e(url('/commercial/land')); ?>" class="text-decoration-none tx-color inner-link">
                                    <i class="bi bi-chevron-double-right me-2 txb-color"></i>Agricultural Land
                                 </a>
                              </li>
                              <li class="inner-parent mb-1">
                                 <a href="<?php echo e(url('/commercial/land')); ?>" class="text-decoration-none tx-color inner-link">
                                    <i class="bi bi-chevron-double-right me-2 txb-color"></i>Industrial Land
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
              </div>
               <ul class="px-0 w-100">
                  
                  <li  class="mb-2">
                     <a href="<?php echo e(url('/')); ?>/blog" target="_blank">Blogs</a>
                  </li>
                  <li  class="mb-2">
                     <a href="<?php echo e(route('dealer.signup')); ?>">Register as Dealer</a>
                  </li>
                  <li  class="mb-2">
                     <a href="<?php echo e(route('create_property')); ?>">Sell Your Property</a>
                  </li>
               </ul>
           </div>
        </div>
     </div>
 <!-- Mobile nav end --><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/frontend/components/responsive_navbar.blade.php ENDPATH**/ ?>