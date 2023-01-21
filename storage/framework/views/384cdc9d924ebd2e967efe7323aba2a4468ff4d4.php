
<?php $__env->startSection('content'); ?>
    <?php
        use App\Http\Controllers\globalC;
    ?>
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


    <!-- project single -->
    <div class="project-single property-single main-padding">
        <div class="container">
            <div class="row">

                <!-- left details -->
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="left-details">
                        <div class="bread-crumb">
                            <a href="<?php echo e(url('/')); ?>">Home</a> <i class="fas fa-angle-right"></i> <a
                                href="<?php echo e(route('active-projects')); ?>">Projects</a> <i class="fas fa-angle-right"></i>
                            <?php echo e($p->name); ?>

                        </div>
                        
                        
                        <div class="slider">
                            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                                class="gallery-slider swiper gallerySwiper2">
                                <div class="swiper-wrapper">

                                    <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="swiper-slide s-main-image b-shadow">
                                            <div class="image">
                                                <img src="<?php echo e(asset($r->image)); ?>" class="pd-slider-image-center swiper-lazy"
                                                    alt="Property Image" />
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
                                <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="swiper-slide b-shadow">
                                        <img src="<?php echo e(asset($r->image)); ?>" class="swiper-lazy" alt="Project Image" />
                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <div class="swiper-button-next  gallery-arrows"></div>
                            <div class="swiper-button-prev gallery-arrows"></div>
                        </div>

                        <!-- slider -->
                        

                        <!-- tabs  -->
                        <div class="project-tabs dealer-tabs b-shadow">
                            <?php if(count($project_video) > 0): ?>
                                <button class="active goto-videos">Videos</button>
                            <?php endif; ?>
                            <button class="goto-overview <?php if(count($project_video) == 0): ?> active <?php endif; ?>">Overview</button>
                            <button class="goto-features">Features &amp; Amenities</button>
                            <button class="goto-floor">Floor Plans</button>
                            <button class="goto-payment">Payment Plans</button>
                            
                        </div>

                        
                        <?php if(count($project_video) > 0): ?>
                            <div class="videos-section p-videos pd-overview b-shadow">
                                <div class="ov-title">Project Videos</div>
                                <div class="row">

                                    <?php $__currentLoopData = $project_video; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <div class="video">
                                                
                                                
                                                <?php echo $pv->video; ?>

                                                <div class="v-title"><?php echo e($pv->title); ?></div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- overview -->
                        <div class="overview-section pd-overview pd-description b-shadow">
                            <div class="ov-title">Overview</div>
                            <div class="desc">
                                <div class="info"><?php echo nl2br(e($p->overview)); ?></div>
                            </div>
                        </div>

                        <!-- features and Amenities -->
                        <div class="features-section pd-overview pd-feature b-shadow">
                            <div class="ov-title">Features and Amenities</div>
                            <ul>
                                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><i class="fas fa-check"></i> <?php echo e($f->name); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>

                        <?php $__currentLoopData = $floors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $floor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!-- floor plans 1 Bed -->
                            <div class="floor-section pd-overview b-shadow">
                                <div class="ov-title"><span><?php echo e($floor->name); ?></span></div>
                                <!-- project plan card -->
                                <?php echo e(globalC::getProjectFloors($floor->id)); ?>


                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        <!-- payment plans -->
                        <div class="payment-section pd-overview b-shadow">
                            <div class="ov-title">Payment Plan</div>
                            <!-- payment plan card -->
                            <?php $__currentLoopData = $payment_plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="pdetail-plan-card">
                                    <a href="<?php echo e(asset($pp->image)); ?>" data-fancybox="payment-plan">
                                        <div class="image">
                                            <img src="<?php echo e(asset($pp->image)); ?>" alt="property-plan">
                                        </div>
                                        <div class="btm-info">
                                            <div class="title"><?php echo e($pp->title); ?></div>
                                            <div class="type"><?php echo e($pp->price); ?></div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>


                        <!-- ad -->
                        

                        <!-- Project Properties -->
                        

                    </div>
                </div>

                <!-- right details -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="right-details">

                        <!-- share -->
                        <div class="prop-share">
                            <div class="title">Share this Property</div>
                            <ul>
                                <li>
                                    <a href="https://facebook.com/sharer/sharer.php/?u=<?php echo e(urlencode(url()->full())); ?>"
                                        target="_blank"><i class="fab fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/share/?url=<?php echo e(urlencode(url()->full())); ?>"
                                        target="_blank"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="https://wa.me/?text=<?php echo e(url()->full()); ?>" target="_blank"><i
                                            class="fab fa-whatsapp"></i></a>
                                </li>
                                
                            </ul>
                        </div>

                        <!-- developer -->
                        <div class="devel-basic-info quick-actions r-default b-shadow">
                            <div class="title">Developer</div>
                            <div class="devl-info">

                                <div class="image">
                                    <img src="<?php echo e(asset($p->logo)); ?>" alt="logo">
                                </div>
                                <div class="info">
                                    <div class="name"><?php echo e($p->name); ?></div>
                                    <div class="location"><?php echo e($p->cityName); ?></div>
                                </div>
                                <div class="c-numb">0330-6969698</div>
                            </div>
                            <a href="//api.whatsapp.com/send?phone=03306969698" title="0330-6969698" target="_blank"
                                class="whatsapp">
                                <i class="fab fa-whatsapp"></i> Contact Seller
                            </a>
                            <a href="mailto:info@shinnyview.com" title="info@shinnyview.com" class="email">
                                <i class="fas fa-comment-dots"></i> Send Email
                            </a>
                        </div>

                        <!-- price -->
                        <div class="v-price r-default b-shadow"><?php echo e($p->min_price); ?> - <?php echo e($p->max_price); ?></div>

                        <!-- recent projects -->
                        <div class="recent-projects right-aadv r-default b-shadow">
                            <div class="title">
                                <div class="type boosted">
                                    <i class="fas fa-briefcase"></i> Projects
                                </div>
                                Recent Projects
                            </div>

                            <?php $__currentLoopData = $recent_projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <div class="p-detail">
                                    <a href="<?php echo e(route('project-single', ['id' => $rp->id])); ?>">
                                        <div class="image">
                                            <img src="<?php echo e(asset($rp->image)); ?>" alt="property">
                                        </div>
                                        <div class="d-info">
                                            <div class="d-type"><?php echo e($rp->name); ?></div>
                                            <div class="d-title">PKR <?php echo e($rp->min_price); ?> - <?php echo e($rp->max_price); ?></div>
                                            <div class="d-price"><?php echo e($rp->cityName); ?></div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </div>

                        <!-- properties -->
                        <div class="right-aadv r-default b-shadow">
                            <div class="title">
                                <div class="type properties">
                                    <i class="fas fa-home"></i> Properties
                                </div>
                                Recent Properties
                            </div>

                            <?php $__currentLoopData = $recent_properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="p-detail">
                                    <a
                                        href="<?php echo e(route('view-property', ['ptype' => $rp->propertyType, 'stype' => $rp->purpose, 'city' => $rp->city, 'id' => $rp->id, 'slug' => $rp->slug])); ?>">
                                        <div class="image">
                                            <img src="<?php echo e(asset('properties/gallery/' . $rp->image)); ?>" alt="property">
                                        </div>
                                        <div class="d-info">
                                            <div class="d-type"><?php echo e($rp->name); ?></div>
                                            <div class="d-title"><?php echo e($rp->city ? $rp->city : ''); ?></div>
                                            <div class="d-price"><?php echo e(convertCurrency($rp->price)); ?></div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                        <!-- google ad -->
                        

                    </div>
                </div>

            </div>
        </div>
    </div>




    <script src="<?php echo e(asset('libraries/slider/swiper.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('libraries/show-more/show_more_less.js')); ?>"></script>
    <script src="<?php echo e(asset('js/pages/property_detail.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // ------------- PROJECT SINGLE TABS START -------------------
            // project tab active
            $('.project-tabs button').on('click', function() {
                $('.project-tabs button').removeClass('active');
                $(this).addClass('active');
            });
            // goto-videos
            $('.project-tabs button.goto-videos').on('click', function() {
                $('html, body').animate({
                    scrollTop: $(".videos-section").offset().top - 150
                }, 'fast');
            });
            // goto-overview
            $('.project-tabs button.goto-overview').on('click', function() {
                $('html, body').animate({
                    scrollTop: $(".overview-section").offset().top - 150
                }, 'fast');
            });
            // goto-features
            $('.project-tabs button.goto-features').on('click', function() {
                $('html, body').animate({
                    scrollTop: $(".features-section").offset().top - 150
                }, 'fast');
            });
            // goto-floor
            $('.project-tabs button.goto-floor').on('click', function() {
                $('html, body').animate({
                    scrollTop: $(".floor-section").offset().top - 150
                }, 'fast');
            });
            // goto-payment
            $('.project-tabs button.goto-payment').on('click', function() {
                $('html, body').animate({
                    scrollTop: $(".payment-section").offset().top - 150
                }, 'fast');
            });
            // goto-properties
            // $('.project-tabs button.goto-properties').on('click', function(){
            //     $('html, body').animate({
            //         scrollTop: $(".properties-section").offset().top - 150
            //     }, 'fast');
            // });
            // ------------- PROJECT SINGLE TABS END -------------------

            $(window).scroll(function() {
                var scrollPos = $(this).scrollTop();
                if (scrollPos > 700) {
                    $('.project-single .project-tabs').addClass('tab-sticky');
                } else {
                    $('.project-single .project-tabs').removeClass('tab-sticky');
                }
            });

        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/frontend/projects/project-single.blade.php ENDPATH**/ ?>