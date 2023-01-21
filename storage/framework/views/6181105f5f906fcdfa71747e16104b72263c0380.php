
<?php
    use App\Http\Controllers\globalC;
?>
<?php $__env->startSection('content'); ?>
    <link href="<?php echo e(asset('libraries/slider/swiper.min.css')); ?>" rel="stylesheet" />
    

    <!-- hero-panel -->
    <div class="hero-panel">
        <div class="overlay">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="h-content">
                            <h1>Best Place To Find Properties</h1>
                            <h2>Looking to Buy, Sell, Rent or Invest? We have you covered!</h2>
                            <div class="text">Shinny view is Pakistan&apos;s largest online real estate portal and property
                                website. Find houses, plots and other properties to easily buy and sell.</div>
                        </div>

                        <div class="h-search">
                            <form method="get" action="<?php echo e(route('properties-listing')); ?>" class="property-filters">
                                <div style="margin: 10px 0px;">
                                    <div class="s-select">
                                        <select name="city" class="p-city search-select">
                                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option class="cid" value="<?php echo e($c->id); ?>"><?php echo e($c->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <i class="fas fa-angle-down"></i>
                                    </div>

                                    <div class="s-select shome" style="width: 62%">
                                        <input type="text" name="search" id="loc_search"
                                            placeholder="Search Location..." class="form-control">
                                    </div>
                                    <div id="loc_search_list"></div>
                                </div>
                                <div class="s-select">
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
                                            <option value="16">Plot</option>
                                            <option value="2">Apartment</option>
                                            <option value="5">Form House</option>
                                            <option value="9">Office</option>
                                            <option value="7">Room</option>
                                        </optgroup>
                                        <optgroup label="Commercial Properties">
                                            <option value="9">Office</option>
                                            <option value="16">Plot</option>
                                            <option value="10">Shop</option>
                                            <option value="13">Building</option>
                                            <option value="11">Warehouse</option>
                                        </optgroup>
                                    </select>
                                    <i class="fas fa-angle-down"></i>
                                </div>

                                <div class="s-select mb-margin">
                                    <input type="text" name="min" placeholder="Min Price" />
                                </div>
                                <div class="s-select mb-margin">
                                    <input type="text" name="max" placeholder="Max Price" />
                                </div>

                                <div class="d-btn mb-margin">
                                    <button class="btn">Search</button>
                                </div>
                            </form>
                        </div>

                        <div class="application-btns d-btn">
                            <a href="<?php echo e(route('application.house_plot')); ?>" class="btn">Get Plots and House Application
                                Form</a>
                            <a href="<?php echo e(route('application.invest')); ?>" class="btn">Get Investment Application Form</a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- advertisment -->
    <div class="addvert-banner main-padding">
        <div class="container">
            <div class="row">
                <!-- main heading -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">

                        <div class="col-md-8 col-sm-8 col-xs-9">
                            <div class="main-heading">
                                <h2>Advertise with Us</h2>
                                <a href="<?php echo e(route('contact.us')); ?>">Contact Us <i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-3">
                            <div class="slide-arrows">
                                <button><i class="fas fa-angle-left"></i></button>
                                <button><i class="fas fa-angle-right"></i></button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="image b-shadow">
                        <div class="w3-content w3-section" style="max-width:100%; max-height:100%">
                            <?php if($advertisment): ?>
                                <?php $__currentLoopData = $advertisment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <img class="mySlides" src="<?php echo e(asset($ads->logo)); ?>" style="width:100%">
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- boosted properties -->
    <div class="boosted-properties main-padding">
        <div class="container">
            <div class="row">

                <!-- main heading -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">

                        <div class="col-md-8 col-sm-8 col-xs-9">
                            <div class="main-heading">
                                <h2>Boosted Properties</h2>
                                <a href="<?php echo e(route('boost-properties')); ?>">View All <i
                                        class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-3">
                            <div class="slide-arrows">
                                <?php if(count($property_boosted) > 0): ?>
                                    <button class="right-ch2"><i class="fas fa-angle-left"></i></button>
                                    <button class="left-ch2"><i class="fas fa-angle-right"></i></button>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="swiper swiper-featured" id="swiper-featured2">
                    <div class="swiper-wrapper">
                        <?php $__currentLoopData = $property_boosted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide">
                                <div class="card default-card">
                                    <a href="<?php echo e(route('view-property', ['ptype' => $pb->propertyType, 'stype' => $pb->purpose, 'city' => $pb->city, 'id' => $pb->id, 'slug' => $pb->slug])); ?>"
                                        class=" b-shadow">
                                        <div class="image">
                                            <img src="<?php echo e(asset('properties/gallery/' . $pb->image)); ?>"
                                                alt="<?php echo e($pb->name); ?>">
                                            <div class="feature-d p-boosted"><i class="fas fa-angle-double-up"></i>
                                                Boosted</div>
                                            <div class="p-type p-house"><?php echo e($pb->property_type_name); ?> for Sale</div>
                                        </div>

                                        <div class="p-info">
                                            <div class="price">PKR: <?php echo e(convertCurrency($pb->price)); ?></div>
                                            <div class="title"><?php echo e($pb->name); ?></div>
                                            <div class="b-info"><?php echo e($pb->address); ?>, <?php echo e($pb->city ? $pb->city : ''); ?>

                                            </div>
                                        </div>

                                        <div class="additional-info">
                                            <div class="a-features"
                                                <?php if(empty($pb->bedroom)): ?> style="width: 80%;" <?php endif; ?>
                                                title="<?php echo e($pb->size); ?> <?php echo e($pb->area); ?>"><i
                                                    class="fas fa-vector-square"></i> <span><?php echo e($pb->size); ?>

                                                    <?php echo e($pb->area); ?></span></div>
                                            <?php if($pb->bedroom): ?>
                                                <div class="a-features"><i class="fas fa-bed"></i> <?php echo e($pb->bedroom); ?>

                                                    Bed</div>
                                            <?php endif; ?>
                                            <?php if($pb->bath): ?>
                                                <div class="a-features"><i class="fas fa-bath"></i> <?php echo e($pb->bath); ?>

                                                    Bath</div>
                                            <?php endif; ?>
                                        </div>
                                    </a>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- featured properties -->
    <div class="featured-properties main-padding">
        <div class="container">
            <div class="row">

                <!-- main heading -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">

                        <div class="col-md-8 col-sm-8 col-xs-9">
                            <div class="main-heading">
                                <h2>Featured Properties</h2>
                                <a href="<?php echo e(route('featured-properties')); ?>">View All <i
                                        class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-3">
                            <div class="slide-arrows">
                                <?php if(count($property_features) > 0): ?>
                                    <button class="right-ch"><i class="fas fa-angle-left"></i></button>
                                    <button class="left-ch"><i class="fas fa-angle-right"></i></button>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="swiper swiper-featured" id="swiper-featured">
                    <div class="swiper-wrapper">
                        <?php $__currentLoopData = $property_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide">
                                <div class="card default-card">
                                    <a href="<?php echo e(route('view-property', ['ptype' => $pf->propertyType, 'stype' => $pf->purpose, 'city' => $pf->city, 'id' => $pf->id, 'slug' => $pf->slug])); ?>"
                                        class=" b-shadow">
                                        <div class="image">
                                            <img src="<?php echo e(asset('properties/gallery/' . $pf->image)); ?>"
                                                alt="<?php echo e($pf->name); ?>">
                                            <div class="feature-d p-feature"><i class="fas fa-trophy"></i> Featured</div>
                                            <div class="p-type p-house"><?php echo e($pf->property_type_name); ?> for
                                                <?php echo e($pf->purpose); ?> </div>
                                        </div>

                                        <div class="p-info">
                                            <div class="price">PKR: <?php echo e(convertCurrency($pf->price)); ?></div>
                                            <div class="title"> <?php echo e($pf->name); ?></div>
                                            <div class="b-info">
                                                <?php if(isset($pf->address)): ?>
                                                    <?php echo e($pf->address); ?>,
                                                <?php endif; ?> <?php echo e($pf->city ? $pf->city : ''); ?>

                                            </div>
                                        </div>

                                        <div class="additional-info">
                                            <div class="a-features"
                                                <?php if(empty($pf->bedroom)): ?> style="width: 80%;" <?php endif; ?>
                                                title="<?php echo e($pf->size); ?> <?php echo e($pf->area); ?>"><i
                                                    class="fas fa-vector-square"></i> <span><?php echo e($pf->size); ?>

                                                    <?php echo e($pf->area); ?></span></div>
                                            <?php if($pf->bedroom): ?>
                                                <div class="a-features"><i class="fas fa-bed"></i> <?php echo e($pf->bedroom); ?>

                                                    Bed</div>
                                            <?php endif; ?>
                                            <?php if($pf->bath): ?>
                                                <div class="a-features"><i class="fas fa-bath"></i> <?php echo e($pf->bath); ?>

                                                    Bath</div>
                                            <?php endif; ?>
                                        </div>
                                    </a>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- active projects -->
    <div class="boosted-properties main-padding">
        <div class="container">
            <div class="row">

                <!-- main heading -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">

                        <div class="col-md-8 col-sm-8 col-xs-9">
                            <div class="main-heading">
                                <h2>Active Projects</h2>
                                <a href="<?php echo e(route('active-projects')); ?>">View All <i
                                        class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-3">

                        </div>

                        <!-- project details -->
                        <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <!-- <h1><?php echo e($p->image); ?></h1> -->
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <div class="project-default-card default-card">
                                    <a href="<?php echo e(route('project-single', ['id' => $p->id])); ?>" class=" b-shadow">
                                        <div class="image">
                                            <img src="<?php echo e(asset($p->image)); ?>" alt="project-image">
                                        </div>

                                        <div class="p-info">
                                            <div class="project-logo">
                                                <img src="<?php echo e(asset($p->logo)); ?>" alt="logo">
                                            </div>
                                            <div class="project-info">
                                                <div class="price"><?php echo e($p->name); ?></div>
                                                
                                                <div class="title">PKR <?php echo e($p->min_price); ?> - <?php echo e($p->max_price); ?></div>
                                                <div class="b-info"><?php echo e($p->cityName); ?></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="p-empty b-shadow">No <span>Active Project</span> Found.</div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- prime dealers -->
    <!--
                                                        <div class="prime-dealers main-padding">
                                                          <div class="container">
                                                            <div class="row"> -->
    <!-- main heading -->
    <!--<div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="row">
                                                                  
                                                                  <div class="col-md-8 col-sm-8 col-xs-9">
                                                                    <div class="main-heading">
                                                                      <h2>Prime Dealers</h2>
                                                                      
                                                                    </div>
                                                                  </div>

                                                                  <div class="col-md-4 col-sm-4 col-xs-3">
                                                                    <div class="slide-arrows">
                                                                      <button class="right-chb"><i class="fas fa-angle-left"></i></button>
                                                                      <button class="left-chb"><i class="fas fa-angle-right"></i></button>
                                                                    </div>
                                                                  </div>

                                                                </div>
                                                              </div> -->

    <!-- dealers -->
    <!-- <div class="swiper" id="swiper-container">
                                                                  <div class="swiper-wrapper">
                                                                      <?php $__currentLoopData = $prime_dealers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="swiper-slide"  style="width: 195px; !important">
                                                                            
                                                                            <div class="col-md-2 col-sm-3 col-xs-6 swiper-slide" style="width: 195px; !important">

                                                                              <div class="dealers b-shadow">
                                                                                <img class="slider-logos" src="<?php echo e(asset('storage/app')); ?>/<?php echo e($pd->logo); ?>">
                                                                                
                                                                                <div class="prime-dealer-details">
                                                                                  <div class="name"><?php echo e($pd->name); ?></div>
                                                                                  <div class="pd-contact">
                                                                                    <div class="c-heading">Contact</div>
                                                                                    <ul>
                                                                                      <li><?php echo e($pd->phone_1); ?></li>
                                                                                      <li><?php echo e($pd->phone_2); ?></li>
                                                                                      <li><?php echo e($pd->phone_3); ?></li>
                                                                                    </ul>
                                                                                  </div>
                                                                                </div>

                                                                              </div>

                                                                            </div>
                                                                          </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                  </div>
                                                              </div>

                                                            </div>
                                                          </div>
                                                        </div> -->

    <!-- how it works -->
    <div class="how-it-works main-padding">
        <div class="container">
            <div class="row">

                <!-- main heading -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="main-heading">
                                <h2>How it Works</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="h-work b-shadow">
                        <div class="image">
                            <img src="<?php echo e(asset('images/works/1.png')); ?>" alt="how it works">
                        </div>
                        <div class="title">1. Create Account</div>
                        <div class="desc">This is just a simple step, create your account using active email address.
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="h-work b-shadow">
                        <div class="image">
                            <img src="<?php echo e(asset('images/works/2.png')); ?>" alt="how it works">
                        </div>
                        <div class="title">1. Verify Email</div>
                        <div class="desc">Now verify your email address and visit shinnyview.com</div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="h-work b-shadow">
                        <div class="image">
                            <img src="<?php echo e(asset('images/works/3.png')); ?>" alt="how it works">
                        </div>
                        <div class="title">3. List Properties</div>
                        <div class="desc">Once email Verified. Add Properties for Sale in few Clicks</div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="h-work b-shadow">
                        <div class="image">
                            <img src="<?php echo e(asset('images/works/4.png')); ?>" alt="how it works">
                        </div>
                        <div class="title">4. Make a Deal</div>
                        <div class="desc">After Listing You&apos;ll receive Offers, Meet and make a with right People
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- popular cities -->
    <div class="popular-cities main-padding">
        <div class="container">
            <div class="row">
                <!-- main heading -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">

                        <div class="col-md-8 col-sm-8 col-xs-9">
                            <div class="main-heading">
                                <h2>Popular Cities</h2>
                                <!--<a href="#">View All <i class="fas fa-angle-double-right"></i></a>-->
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-3">
                            
                        </div>

                    </div>
                </div>

                <div class="col-md-2 col-sm-3 col-xs-6">
                    <div class="p-cities b-shadow">
                        <a href="<?php echo e(route('city-properties', ['id' => 1, 'name' => 'islamabad'])); ?>">
                            <div class="image">
                                <div class="overlay"></div>
                                <img src="<?php echo e(asset('images/location-areas/Islamabad.png')); ?>" alt="islamabad">
                                <div class="title">Islamabad</div>
                            </div>
                    </div>
                    </a>
                </div>

                <div class="col-md-2 col-sm-3 col-xs-6">
                    <div class="p-cities b-shadow">
                        <a href="<?php echo e(route('city-properties', ['id' => 3, 'name' => 'Karachi'])); ?>">
                            <div class="image">
                                <div class="overlay"></div>
                                <img src="<?php echo e(asset('images/location-areas/Karachi.png')); ?>" alt="Karachi">
                                <div class="title">Karachi</div>
                            </div>
                    </div>
                    </a>
                </div>

                <div class="col-md-2 col-sm-3 col-xs-6">
                    <div class="p-cities b-shadow">
                        <a href="<?php echo e(route('city-properties', ['id' => 4, 'name' => 'Lahore'])); ?>">
                            <div class="image">
                                <div class="overlay"></div>
                                <img src="<?php echo e(asset('images/location-areas/Lahore.png')); ?>" alt="Lahore">
                                <div class="title">Lahore</div>
                            </div>
                    </div>
                    </a>
                </div>


                <div class="col-md-2 col-sm-3 col-xs-6">
                    <div class="p-cities b-shadow">
                        <a href="<?php echo e(route('city-properties', ['id' => 5, 'name' => 'Quetta'])); ?>">
                            <div class="image">
                                <div class="overlay"></div>
                                <img src="<?php echo e(asset('images/location-areas/Quetta-Ziarat')); ?>.png" alt="Quetta-Ziarat">
                                <div class="title">Quetta Ziarat</div>
                            </div>
                    </div>
                    </a>
                </div>

                <div class="col-md-2 col-sm-3 col-xs-6">
                    <div class="p-cities b-shadow">
                        <a href="<?php echo e(route('city-properties', ['id' => 6, 'name' => 'Multan'])); ?>">
                            <div class="image">
                                <div class="overlay"></div>
                                <img src="<?php echo e(asset('images/location-areas/Multan.png')); ?>" alt="Multan">
                                <div class="title">Multan</div>
                            </div>
                    </div>
                    </a>
                </div>

                <div class="col-md-2 col-sm-3 col-xs-6">
                    <div class="p-cities b-shadow">
                        <a href="<?php echo e(route('city-properties', ['id' => 7, 'name' => 'Sialkot'])); ?>">
                            <div class="image">
                                <div class="overlay"></div>
                                <img src="<?php echo e(asset('images/location-areas/Sialkot.png')); ?>" alt="Sialkot">
                                <div class="title">Sialkot</div>
                            </div>
                    </div>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- popular from blogs -->
    <div class="p-blogs main-padding">
        <div class="container">
            <div class="row">

                <!-- main heading -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="main-heading">
                                <h2>Popular From Blogs</h2>
                                <a href="<?php echo e(url('/')); ?>/blog">View All <i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>

                    </div>
                </div>

                

            </div>
        </div>
    </div>


    <!-- news letter -->
    <div class="news-letter">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('subscribe')->html();
} elseif ($_instance->childHasBeenRendered('loaVGKM')) {
    $componentId = $_instance->getRenderedChildComponentId('loaVGKM');
    $componentTag = $_instance->getRenderedChildComponentTagName('loaVGKM');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('loaVGKM');
} else {
    $response = \Livewire\Livewire::mount('subscribe');
    $html = $response->html();
    $_instance->logRenderedChild('loaVGKM', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <!-- Newsletter Section end -->
    <script src="<?php echo e(asset('libraries/slider/swiper.bundle.min.js')); ?>"></script>
    <script type="text/javascript">
        let subscribe_url = "<?php echo e(route('subscribe')); ?>";
    </script>
    <script src="<?php echo e(asset('js/pages/home.js')); ?>"></script>
    <script>
        $(document).ready(() => {
            if (localStorage.getItem('application_form_popup') == null) {
                $('#application_form_popup').modal('show');
            }
            $('#application_form_popup').on('hidden.bs.modal', function(event) {
                localStorage.setItem('application_form_popup', false);
            });
        });
    </script>

    <script type="text/javascript">
        // jQuery wait till the page is fullt loaded
        $(document).ready(function() {
            // keyup function looks at the keys typed on the search box
            $('#loc_search').on('keyup', function() {
                // the text typed in the input field is assigned to a variable 
                var query = $(this).val();
                var cid = $('.cid').val();
                // call to an ajax function
                $.ajax({
                    // assign a controller function to perform search action - route name is search
                    url: "<?php echo e(route('Autocomplte.getAutocompltehome')); ?>",
                    // since we are getting data methos is assigned as GET
                    type: "GET",
                    // data are sent the server
                    data: {
                        'search': query,
                        cid: cid
                    },
                    // if search is succcessfully done, this callback function is called
                    success: function(data) {
                        // print the search results in the div called country_list(id)
                        $('#loc_search_list').html(data);
                    }
                })
                // end of ajax call
            });

            // initiate a click function on each search result
            $(document).on('click', 'li', function() {
                // declare the value in the input field to a variable
                var value = $(this).text();
                // assign the value to the search box
                $('#loc_search').val(value);
                // after click is done, search results segment is made empty
                $('#loc_search_list').html("");
            });
        });

        $(document).ready(function() {
            $("select").change(function() {
                var cid = $(this).val();
                $('#loc_search').on('keyup', function() {
                    // the text typed in the input field is assigned to a variable 
                    var query = $(this).val();
                    // call to an ajax function
                    $.ajax({
                        // assign a controller function to perform search action - route name is search
                        url: "<?php echo e(route('Autocomplte.getAutocompltehome')); ?>",
                        // since we are getting data methos is assigned as GET
                        type: "GET",
                        // data are sent the server
                        data: {
                            'search': query,
                            cid: cid
                        },
                        // if search is succcessfully done, this callback function is called
                        success: function(data) {
                            // print the search results in the div called country_list(id)
                            $('#loc_search_list').html(data);
                        }
                    })
                    // end of ajax call
                });

                // initiate a click function on each search result
                $(document).on('click', 'li', function() {
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\shinnyview_pk\resources\views/frontend/index.blade.php ENDPATH**/ ?>