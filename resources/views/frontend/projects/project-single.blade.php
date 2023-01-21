@extends('frontend.app')
@section('content')
    @php
        use App\Http\Controllers\globalC;
    @endphp
    <link href="{{ asset('libraries/slider/swiper.min.css') }}" rel="stylesheet" />
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
                            <a href="{{ url('/') }}">Home</a> <i class="fas fa-angle-right"></i> <a
                                href="{{ route('active-projects') }}">Projects</a> <i class="fas fa-angle-right"></i>
                            {{ $p->name }}
                        </div>
                        {{-- <div class="pb-title">Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat. Vestibulum auctor dapibus neque.</div> --}}
                        {{-- old slider --}}
                        <div class="slider">
                            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                                class="gallery-slider swiper gallerySwiper2">
                                <div class="swiper-wrapper">

                                    @foreach ($gallery as $r)
                                        <div class="swiper-slide s-main-image b-shadow">
                                            <div class="image">
                                                <img src="{{ asset($r->image) }}" class="pd-slider-image-center swiper-lazy"
                                                    alt="Property Image" />
                                                <div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                        <div thumbsSlider="" class="swiper gallerySwiper gallery-slider">
                            <div class="swiper-wrapper">
                                @foreach ($gallery as $r)
                                    <div class="swiper-slide b-shadow">
                                        <img src="{{ asset($r->image) }}" class="swiper-lazy" alt="Project Image" />
                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="swiper-button-next  gallery-arrows"></div>
                            <div class="swiper-button-prev gallery-arrows"></div>
                        </div>

                        <!-- slider -->
                        {{-- <div class="slider">
                  <div class="s-main-image b-shadow">
                    <div class="image">
                      <img src="img/slide-large.png" alt="property-image">
  
                      <!-- slide left and right -->
                      <div class="slide-icons">
                        <div class="left">
                          <i class="s-icon fas fa-angle-left"></i>
                        </div>
                        <div class="right">
                          <i class="s-icon fas fa-angle-right"></i>
                        </div>
                      </div>
                      <!-- expand image -->
                      <div class="exp-img">
                        <i class="s-icon fas fa-expand-alt"></i>
                      </div>
                    </div>
                  </div>
  
                  <!-- slider images -->
                  <div class="slider-images">
                    <div class="s-images-list">
                      <ul>
                        <li class="active b-shadow"><img src="img/slide-large.png" alt="property-img"></li>
                        <li class="b-shadow"><img src="img/slide-large.png" alt="property-img"></li>
                        <li class="b-shadow"><img src="img/slide-large.png" alt="property-img"></li>
                        <li class="b-shadow"><img src="img/slide-large.png" alt="property-img"></li>
                        <li class="b-shadow"><img src="img/slide-large.png" alt="property-img"></li>
                        <li class="b-shadow"><img src="img/slide-large.png" alt="property-img"></li>
                      </ul>
                    </div>
                  </div>
  
  
                </div> --}}

                        <!-- tabs  -->
                        <div class="project-tabs dealer-tabs b-shadow">
                            @if (count($project_video) > 0)
                                <button class="active goto-videos">Videos</button>
                            @endif
                            <button class="goto-overview @if (count($project_video) == 0) active @endif">Overview</button>
                            <button class="goto-features">Features &amp; Amenities</button>
                            <button class="goto-floor">Floor Plans</button>
                            <button class="goto-payment">Payment Plans</button>
                            {{-- <button class="goto-properties">Properties</button> --}}
                        </div>

                        {{-- videos --}}
                        @if (count($project_video) > 0)
                            <div class="videos-section p-videos pd-overview b-shadow">
                                <div class="ov-title">Project Videos</div>
                                <div class="row">

                                    @foreach ($project_video as $pv)
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <div class="video">
                                                {{-- <iframe width="100%" height="100%" src="https://www.youtube.com/embed/Az6Kwni_Vok" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                                                {{-- <iframe src="https://www.youtube.com/watch?v=f9yRjhqh5uI&ab_channel=Property365" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> --}}
                                                {!! $pv->video !!}
                                                <div class="v-title">{{ $pv->title }}</div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        @endif

                        <!-- overview -->
                        <div class="overview-section pd-overview pd-description b-shadow">
                            <div class="ov-title">Overview</div>
                            <div class="desc">
                                <div class="info">{!! nl2br(e($p->overview)) !!}</div>
                            </div>
                        </div>

                        <!-- features and Amenities -->
                        <div class="features-section pd-overview pd-feature b-shadow">
                            <div class="ov-title">Features and Amenities</div>
                            <ul>
                                @foreach ($features as $f)
                                    <li><i class="fas fa-check"></i> {{ $f->name }}</li>
                                @endforeach
                            </ul>
                        </div>

                        @foreach ($floors as $floor)
                            <!-- floor plans 1 Bed -->
                            <div class="floor-section pd-overview b-shadow">
                                <div class="ov-title"><span>{{ $floor->name }}</span></div>
                                <!-- project plan card -->
                                {{ globalC::getProjectFloors($floor->id) }}

                            </div>
                        @endforeach


                        <!-- payment plans -->
                        <div class="payment-section pd-overview b-shadow">
                            <div class="ov-title">Payment Plan</div>
                            <!-- payment plan card -->
                            @foreach ($payment_plan as $pp)
                                <div class="pdetail-plan-card">
                                    <a href="{{ asset($pp->image) }}" data-fancybox="payment-plan">
                                        <div class="image">
                                            <img src="{{ asset($pp->image) }}" alt="property-plan">
                                        </div>
                                        <div class="btm-info">
                                            <div class="title">{{ $pp->title }}</div>
                                            <div class="type">{{ $pp->price }}</div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>


                        <!-- ad -->
                        {{--  <div class="google-add b-shadow">
                  <img src="{{asset('images/ad.png')}}" alt="google Ad">
                </div>  --}}

                        <!-- Project Properties -->
                        {{-- <div class="properties-section pm-like">
                  <div class="main-heading">
                    <h2>Project Properties</h2>
                    <a href="#">View All <i class="fas fa-angle-double-right"></i></a>
                  </div>
                  <!-- detail card -->
                  <div class="detail-card default-card">
                    <a href="#" class=" b-shadow">
                      <div class="image">
                        <img src="{{asset('public')}}/images/property.jpg" alt="property-image">
                        <div class="feature-d p-boosted"><i class="fas fa-angle-double-up"></i> Boosted</div>
                      </div>
                      <div class="ot-details">
                        <div class="p-info">
                          <div class="p-type p-house">House for Sale</div>
                          <div class="price">PKR: 1 Crore 85 Lakh</div>
                          <div class="title">1 Kanal House Avaiable for Sale is Islamabad</div>
                          <div class="b-info">Residential in Islamabad</div>
                          <div class="additional-info">
                            <div class="a-features"><i class="fas fa-vector-square"></i> 4 Marla</div>
                            <div class="a-features"><i class="fas fa-bed"></i> 4 Bed</div>
                            <div class="a-features"><i class="fas fa-bath"></i> 4 Bath</div>
                          </div>
                        </div>
                        
                      </div>
                    </a>  
                  </div>
  
  
                </div> --}}

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
                                    <a href="https://facebook.com/sharer/sharer.php/?u={{ urlencode(url()->full()) }}"
                                        target="_blank"><i class="fab fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/share/?url={{ urlencode(url()->full()) }}"
                                        target="_blank"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="https://wa.me/?text={{ url()->full() }}" target="_blank"><i
                                            class="fab fa-whatsapp"></i></a>
                                </li>
                                {{-- <li>
                      <a href="#"><i class="fab fa-pinterest"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="far fa-envelope"></i></a>
                    </li> --}}
                            </ul>
                        </div>

                        <!-- developer -->
                        <div class="devel-basic-info quick-actions r-default b-shadow">
                            <div class="title">Developer</div>
                            <div class="devl-info">

                                <div class="image">
                                    <img src="{{ asset($p->logo) }}" alt="logo">
                                </div>
                                <div class="info">
                                    <div class="name">{{ $p->name }}</div>
                                    <div class="location">{{ $p->cityName }}</div>
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
                        <div class="v-price r-default b-shadow">{{ $p->min_price }} - {{ $p->max_price }}</div>

                        <!-- recent projects -->
                        <div class="recent-projects right-aadv r-default b-shadow">
                            <div class="title">
                                <div class="type boosted">
                                    <i class="fas fa-briefcase"></i> Projects
                                </div>
                                Recent Projects
                            </div>

                            @foreach ($recent_projects as $rp)
                                {{-- p.id','p.name','p.image','c.name as cityName','p.min_price','p.max_price --}}
                                <div class="p-detail">
                                    <a href="{{ route('project-single', ['id' => $rp->id]) }}">
                                        <div class="image">
                                            <img src="{{ asset($rp->image) }}" alt="property">
                                        </div>
                                        <div class="d-info">
                                            <div class="d-type">{{ $rp->name }}</div>
                                            <div class="d-title">PKR {{ $rp->min_price }} - {{ $rp->max_price }}</div>
                                            <div class="d-price">{{ $rp->cityName }}</div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach


                        </div>

                        <!-- properties -->
                        <div class="right-aadv r-default b-shadow">
                            <div class="title">
                                <div class="type properties">
                                    <i class="fas fa-home"></i> Properties
                                </div>
                                Recent Properties
                            </div>

                            @foreach ($recent_properties as $rp)
                                <div class="p-detail">
                                    <a
                                        href="{{ route('view-property', ['ptype' => $rp->propertyType, 'stype' => $rp->purpose, 'city' => $rp->city, 'id' => $rp->id, 'slug' => $rp->slug]) }}">
                                        <div class="image">
                                            <img src="{{ asset('properties/gallery/' . $rp->image) }}" alt="property">
                                        </div>
                                        <div class="d-info">
                                            <div class="d-type">{{ $rp->name }}</div>
                                            <div class="d-title">{{ $rp->city ? $rp->city : '' }}</div>
                                            <div class="d-price">{{ convertCurrency($rp->price) }}</div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>

                        <!-- google ad -->
                        {{--  <div class="google-add">
                  <img src="{{asset('images/ad.png')}}" alt="">
                </div>  --}}

                    </div>
                </div>

            </div>
        </div>
    </div>




    <script src="{{ asset('libraries/slider/swiper.bundle.min.js') }}"></script>
    <script src="{{ asset('libraries/show-more/show_more_less.js') }}"></script>
    <script src="{{ asset('js/pages/property_detail.js') }}"></script>
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
@endsection
@push('js')
@endpush
