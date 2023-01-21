<?php
    use \App\Http\Controllers\globalC;
?>


<?php $__env->startSection('seo_title'); ?><?php echo e((isset($seo_title)) ? $seo_title : $seo_title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('seo_keywords'); ?><?php echo e((isset($seo->seo_keyword)) ? $seo->seo_keyword : 'plots, plot, housing, housing society, plotting, housing society islamabad, plot for sale in lahore, housing society lahore, plot sale in lahore'); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('seo_description'); ?><?php echo e((isset($seo_description)) ? $seo_description : $seo_description); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('seo_url'); ?><?php echo e(url()->current()); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('seo_image'); ?><?php echo e(asset('properties/gallery/'.$property_details->image)); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link href="<?php echo e(asset('libraries/slider/swiper.min.css')); ?>" rel="stylesheet" />
    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .gallery-slider .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .gallery-slider .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 6px;
        }

        .gallery-slider .swiper {
            width: 100%;
            height: 300px;
            margin-left: auto;
            margin-right: auto;
        }

        .gallery-slider .swiper-slide {
            background-size: cover;
            background-position: center;
            border-radius: 10px;
        }

        .gallery-slider.gallerySwiper2 {
            /* height: 450px; */
            height: 550px;
            width: 100%;
        }

        .gallery-slider.gallerySwiper {
            height: 100px;
            box-sizing: border-box;
            padding: 10px 0;
        }

        .gallery-slider.gallerySwiper .swiper-slide {
            width: 25%;
            height: 75px;
            opacity: 0.7;
            padding: 3px;
            cursor: pointer;
            
        }
        .gallery-slider.gallerySwiper .swiper-slide:hover {
            border: solid 2px #755623;
        }

        .gallery-slider.gallerySwiper .swiper-slide-thumb-active {
            opacity: 1;
            border: solid 2px #755623;
        }

        .gallery-slider.swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }


    </style>

    <!-- Filter and card Section Start -->

    
    <div class="property-single main-padding">
        <div class="container">
            <div class="row">
                        <?php if(auth()->guard()->check()): ?>
                           <?php if($property_details->status==0): ?>
                                <div class="alert alert-info" role="alert">
                                    This is the draft version the property has not been published yet.
                                </div>
                           <?php endif; ?>
                        <?php endif; ?>   
                
                <div class="left-details col-md-8 col-sm-8 col-xs-12">
                    <div class="bread-crumb">
                        <a href="<?php echo e(url('/')); ?>">Home</a> <i class="fas fa-angle-right"></i> <a href="<?php echo e(url()->previous()); ?>">Properties</a> <i class="fas fa-angle-right"></i> Details
                    </div>
                    <h1><?php echo e($property_details->name); ?></h1>
                    <div class="p-area"><?php if(isset($property_details->city_address)): ?><?php echo e($property_details->city_address); ?>,<?php endif; ?> <?php echo e($property_details->city); ?></div>

                    <?php if(isset($gallery) && count($gallery)>0): ?>
                    <div class="slider">
                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                            class="gallery-slider swiper gallerySwiper2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide s-main-image b-shadow">
                                    <div class="image">
                                        <img data-src="<?php echo e(asset('properties/gallery/'.$property_details->image)); ?>" class="pd-slider-image-center swiper-lazy" alt="Property Image"/>
                                        <?php if($property_details->featured == 1): ?>
                                            <div class="feature-d p-feature" <?php if($property_details->boost == 1): ?> style="left: 115px;" <?php endif; ?>><i class="fas fa-trophy"></i> Featured</div>
                                        <?php endif; ?>
                                        <?php if($property_details->boost == 1): ?>
                                            <div class="feature-d p-boosted"><i class="fas fa-angle-double-up"></i> Boosted</div>
                                        <?php endif; ?>
                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
                                    </div>
                                </div>
                                <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="swiper-slide s-main-image b-shadow">
                                        <div class="image">
                                            <img data-src="<?php echo e(asset('properties/gallery/'.$r->name)); ?>" class="pd-slider-image-center swiper-lazy" alt="Property Image"/>
                                            <?php if($property_details->featured == 1): ?>
                                                <div class="feature-d p-feature" <?php if($property_details->boost == 1): ?> style="left: 115px;" <?php endif; ?>><i class="fas fa-trophy"></i> Featured</div>
                                            <?php endif; ?>
                                            <?php if($property_details->boost == 1): ?>
                                                <div class="feature-d p-boosted"><i class="fas fa-angle-double-up"></i> Boosted</div>
                                            <?php endif; ?>
                                            <div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                    <div thumbsSlider="" class="swiper gallerySwiper gallery-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide b-shadow">
                                <img data-src="<?php echo e(asset('properties/gallery/'.$property_details->image)); ?>" class="swiper-lazy" alt="Property Image"/>
                                <div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
                            </div>
                            <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide b-shadow">
                                    <img data-src="<?php echo e(asset('properties/gallery/'.$r->name)); ?>" class="swiper-lazy" alt="Property Image"/>
                                    <div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="swiper-button-next  gallery-arrows"></div>
                        <div class="swiper-button-prev gallery-arrows"></div>
                    </div>


                    <!-- overview -->
                    <div class="pd-overview b-shadow">
                        <div class="ov-title">Overview</div>
                        <ul>
                            <li>
                                <?php if($property_details->property_type_id == '1'): ?>
                                    <i class="far fa-check-circle"></i> <?php echo e("Residential"); ?> 
                                <?php elseif($property_details->property_type_id == '2'): ?>
                                    <i class="far fa-check-circle"></i> <?php echo e("Commercial"); ?>

                                <?php else: ?>
                                    <i class="far fa-check-circle"></i> <?php echo e("Plot"); ?>

                                <?php endif; ?>
                            </li>
                            <li>
                                <?php if($property_details->purpose_id == '1'): ?> 
                                    <i class="far fa-check-circle"></i> <?php echo e("Sale"); ?> 
                                <?php elseif($property_details->purpose_id == '2'): ?> 
                                    <i class="far fa-check-circle"></i> <?php echo e("Rent"); ?> 
                                <?php else: ?> 
                                    <i class="far fa-check-circle"></i> <?php echo e("Lease"); ?>

                                <?php endif; ?>
                            </li>
                            <?php if(!empty($property_details->bedroom)): ?>
                                <li>
                                    <i class="far fa-check-circle"></i> <?php echo e($property_details->bedroom); ?> Beds
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($property_details->bath)): ?>
                                <li>
                                    <i class="far fa-check-circle"></i> <?php echo e($property_details->bath); ?> Bath
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($property_details->garage)): ?>
                                <li>
                                    <i class="far fa-check-circle"></i> <?php echo e($property_details->garage); ?> Garage
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($property_details->size)): ?>
                                <li>
                                    <i class="far fa-check-circle"></i> <?php echo e($property_details->size); ?> <?php echo e($property_details->area); ?>

                                </li>
                            <?php endif; ?>
                        </ul>            
                    </div>

                    <!-- features and Amenities -->
                    <?php
                        $features = globalC::parseToArray($property_details->property_feature);
                    ?>
                    <div class="pd-overview pd-feature b-shadow">
                        <div class="ov-title">Features and Amenities</div>
                        <ul>
                            <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><i class="fas fa-check"></i> <?php echo e($feature); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>


                    <!-- ad -->
                    <div class="google-add b-shadow">
                        <img src="<?php echo e(asset('images/ad.png')); ?>" alt="google Ad">
                    </div>

                    <!-- description -->
                    <div class="pd-overview pd-description b-shadow">
                        <div class="ov-title">Description</div>
                        <div class="desc">
                        <div class="title"><?php echo e($property_details->name); ?> - <?php echo e($property_details->city_address? $property_details->city_address :''); ?> <?php echo e($property_details->city? ','.$property_details->city :''); ?></div>
                        <div class="info"><?php echo nl2br(e($property_details->description)); ?></div>
                        </div>
						<?php if(isset($property_details->youtube_link) && $property_details->youtube_link !=''): ?>
						<?php
						
							 $url = $property_details->youtube_link;
						
							 $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
							 $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

							if (preg_match($longUrlRegex, $url, $matches)) {
								$youtube_id = $matches[count($matches) - 1];
							}

							if (preg_match($shortUrlRegex, $url, $matches)) {
								$youtube_id = $matches[count($matches) - 1];
							}
							$emburl = 'https://www.youtube.com/embed/' . $youtube_id ;
						
						?>
						
						<iframe width="350" height="300"  src="<?php if(isset($emburl)): ?> <?php echo e($emburl); ?> <?php endif; ?>"></iframe>
						<?php endif; ?>
						
                    </div>

                    <?php endif; ?>

                    
                    <div class="morgtage-calculator mt-5 mb-5">
                        <div class="form-header bg-theme">
                            <h2 class="f-bold py-3 pb-3 mb-0 px-4 text-white text-center">
                                Shinyview Mortgage Calculator
                            </h2>
                        </div>
                        <div class="form-morgtage-body p-4 border bg-white">
                            <form class="row">
                                <div class="col-12 mb-3">
                                    <div class="form-morgtage-field">
                                        <label class="w-100 mb-2">Interest Plan</label>
                                        <select class="w-100">
                                            <option selected disabled>
                                                Select
                                            </option>
                                            <option value="option 1">
                                                Plan 1
                                            </option>
                                            <option value="option 2">
                                                Plan 2
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="form-morgtage-field">
                                        <label class="w-100 mb-2">I am a ...</label>
                                        <select class="w-100">
                                            <option selected disabled>
                                                Select
                                            </option>
                                            <option value="sallaried">
                                                sallaried
                                            </option>
                                            <option value="else">
                                                Else
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="form-morgtage-field">
                                        <label class="w-100 mb-2">Property Price</label>
                                        <input type="text" class="w-100"  />
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="form-morgtage-field">
                                        <label class="w-100 mb-2">Down Payment</label>
                                        <input type="text" class="w-100"  />
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="form-morgtage-field d-flex align-items-center">
                                        <div class="svg-item">
                                            <svg width="100%" height="100%" viewBox="0 0 40 40" class="donut">
                                                <circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#fff"></circle>
                                                <circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3"></circle>
                                                <circle class="donut-segment donut-segment-2" cx="20" cy="20" r="15.91549430918954"
                                                fill="transparent" stroke-width="3" stroke-dasharray="10 90"
                                                stroke-dashoffset="25"></circle>
                                                <g class="donut-text donut-text-1">
                                                    <text y="50%" transform="translate(0, 2)">
                                                        <tspan x="50%" text-anchor="middle" class="donut-percent">10%</tspan>
                                                    </text>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="svg-item-text">
                                            <p class="mb-0">
                                                Lenders may expect more than a 10%<br />
                                                deposit at time, consider increasing your savings goal
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="form-morgtage-field">
                                        <label class="w-100 mb-2">Interest Rate</label>
                                        <input type="number" class="w-100" name="intrest_rate"  />
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="form-morgtage-field">
                                        <label class="w-100 mb-2">Loan Period</label>
                                        <input type="number" class="w-100" name="intrest_rate"  />
                                    </div>
                                </div>
                                <div class="col-12 mt-2 text-end">
                                    <button type="submit" class="px-3 d-inline-block
                                        text-white f-medium bg-theme-dark border-0
                                        align-items-center justify-content-center">
                                        Apply Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    
                    <!-- properties you may like -->
                    <div class="pm-like">
                        <div class="title">Properties you may Like</div>
                        <!-- detail card -->
                        <?php $__currentLoopData = $property_similar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="detail-card default-card">
                                <a href="<?php echo e(route('view-property',['ptype' => $ps->propertyType, 'stype' => $ps->purpose,'city' => $ps->city,'id' => $ps->id,'slug' => $ps->slug])); ?>" class=" b-shadow">
                                    <div class="image">
                                        <img src="<?php echo e(asset('properties/gallery/'.$ps->image)); ?>" alt="shinnyview product" />
                                        
                                        <?php if($property_details->featured == 1): ?>
                                            <div class="feature-d p-feature" <?php if($property_details->boost == 1): ?> style="left: 115px;" <?php endif; ?>><i class="fas fa-trophy"></i> Featured</div>
                                        <?php endif; ?>
                                        <?php if($property_details->boost == 1): ?>
                                            <div class="feature-d p-boosted"><i class="fas fa-angle-double-up"></i> Boosted</div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div class="ot-details">
                                        <div class="p-info">
                                            <div class="p-type p-house">House for Sale</div>
                                            <div class="price">PKR: <?php echo e(convertCurrency($ps->price)); ?></div>
                                            <div class="title"><?php echo e($ps->name); ?></div>
                                            <div class="b-info"><?php echo e($ps->city?$ps->city:''); ?></div>
                                            <div class="additional-info">
                                                <div class="a-features" <?php if(empty($ps->bedroom)): ?> style="width: 80%;" <?php endif; ?> title="<?php echo e($ps->size); ?> <?php echo e($ps->area); ?>"><i class="fas fa-vector-square"></i> <span><?php echo e($ps->size); ?> <?php echo e($ps->area); ?></span></div>
                                                <?php if($ps->bedroom): ?>
                                                    <div class="a-features"><i class="fas fa-bed"></i> <?php echo e($ps->bedroom); ?> Bed</div>
                                                <?php endif; ?>
                                                <?php if($ps->bath): ?>
                                                    <div class="a-features"><i class="fas fa-bath"></i> <?php echo e($ps->bath); ?> Bath</div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </a>  
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </div>

                
                <div class="col-md-4 col-sm-4 col-xs-12 right-details" id="right_side_section">

                    <!-- share -->
                    <div class="prop-share">
                        <div class="title">Share this Property</div>
                        <ul>
                            <li>
                                <a href="https://facebook.com/sharer/sharer.php/?u=<?php echo e(urlencode(url()->full())); ?>" target="_blank"><i class="fab fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/share/?url=<?php echo e(urlencode(url()->full())); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://wa.me/?text=<?php echo e(url()->full()); ?>" target="_blank"><i class="fab fa-whatsapp"></i></a>
                            </li>
                            
                        </ul>
                    </div>

                    <!-- quick actions -->
                    <div class="quick-actions r-default b-shadow">
                        <div class="title">Quick Actions</div>
                        <a href="//api.whatsapp.com/send?phone=92<?php echo e($property_details->number); ?>" title="<?php echo e($property_details->number); ?>" target="_blank" class="whatsapp">
                            <i class="fab fa-whatsapp"></i> Contact Seller
                        </a>
                        <a href="mailto:<?php echo e($property_details->email); ?>" title="<?php echo e($property_details->email); ?>" class="email">
                            <i class="fas fa-comment-dots"></i> Send Email
                        </a>
				<a href="tel:<?php echo e($property_details->number); ?>" title="<?php echo e($property_details->number); ?>" target="_blank" class="email">
                             <i class="fas fa-phone"></i> Regular Call
                        </a>
                        <div class="mention">Mention <span>shinnyview.com</span> when Call or Message to get a good deal.</div>
                    </div>

                    <!-- price -->
                    <div class="v-price r-default b-shadow">PKR: <?php echo e(convertCurrency($property_details->price)); ?></div>

                    <!-- dealer -->
                    <div class="p-dealer r-default b-shadow">
                        <div class="title">Dealer</div>
                        <div class="office-name"><?php echo e($property_details->company); ?></div>
                        <div class="d-name"><?php echo e($property_details->user_name); ?></div>
                        <div class="d-btn">
                            <a href="<?php echo e(route('dealer-single',['id' => $property_details->user_id])); ?>" class="btn">All Properties <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>

                    <!-- boosted -->
                    <div class="right-aadv r-default b-shadow">
                        <div class="title">
                        <div class="type boosted">
                            <i class="fas fa-angle-double-up"></i> Boosted
                        </div>
                            Boosted Properties
                        </div>

                        <?php $__currentLoopData = $property_boost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="p-detail">
                                <a href="<?php echo e(route('view-property',['ptype' => $pb->propertyType, 'stype' => $pb->purpose,'city' => $pb->city,'id' => $pb->id,'slug' => $pb->slug])); ?>">
                                    <div class="image">
                                        <img src="<?php echo e(asset('properties/gallery/'.$pb->image)); ?>" alt="property">
                                    </div>
                                    <div class="d-info">
                                        <div class="d-type"><?php echo e($pb->name); ?></div>
                                        <div class="d-title"><?php echo e($pb->city ? $pb->city : ''); ?></div>
                                        <div class="d-price"><?php echo e(convertCurrency($pb->price)); ?></div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <!-- featured -->
                    <div class="right-aadv r-default b-shadow">
                        <div class="title">
                        <div class="type featured">
                            <i class="fas fa-trophy"></i> Featured
                        </div>
                            Featured Properties
                        </div>

                        <?php $__currentLoopData = $featured_property; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="p-detail">
                                <a href="<?php echo e(route('view-property',['ptype' => $fp->propertyType, 'stype' => $fp->purpose,'city' => $fp->city,'id' => $fp->id,'slug' => $fp->slug])); ?>">
                                    <div class="image">
                                        <img src="<?php echo e(asset('properties/gallery/'.$fp->image)); ?>" alt="property">
                                    </div>
                                    <div class="d-info">
                                        <div class="d-type"><?php echo e($fp->name); ?></div>
                                        <div class="d-title"><?php echo e($fp->city ? $fp->city : ''); ?></div>
                                        <div class="d-price"><?php echo e(convertCurrency($fp->price)); ?></div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <!-- ad -->
                    <div class="google-add b-shadow">
                        <img src="<?php echo e(asset('images/ad.png')); ?>" alt="google Ad">
                    </div>

                </div>
                
           
            </div>
        </div>
    </div>
    
    <!-- Filter and card Section End -->
    <script src="<?php echo e(asset('libraries/slider/swiper.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('libraries/show-more/show_more_less.js')); ?>"></script>
    <script src="<?php echo e(asset('js/pages/property_detail.js')); ?>"></script>
    <script type="text/javascript">
    
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/frontend/property_detail.blade.php ENDPATH**/ ?>