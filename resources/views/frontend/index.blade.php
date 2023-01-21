@extends('frontend.app')
@php
    use App\Http\Controllers\globalC;
@endphp
@section('content')
    <link href="{{ asset('libraries/slider/swiper.min.css') }}" rel="stylesheet" />
    {{-- <div class="app-banner-home home banner-layer position-relative">
        <div class="row mx-0 h-100 py-5 align-items-center px-lg-5 px-3 position-relative">
            <div class="col-lg-6 px-lg-3 px-0 banner-caption">
                <h1 class="text-white f-alpha mb-0">Best <span class="txb-color">Place To Find <br /> </span>Properties</h1>
                <p class="text-white f-medium mb-4 mt-3 mt-lg-4 mb-4 mb-lg-0">Looking to Buy, Sell, Rent or Invest? We have you covered!</p>
            </div>
            <div class="col-lg-6 px-0 px-lg-5">
                <div class="search-property-form">
                    @livewire('property-search-form-one')
                </div>
            </div>
        </div>
    </div> --}}

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
                            <form method="get" action="{{ route('properties-listing') }}" class="property-filters">
                                <div style="margin: 10px 0px;">
                                    <div class="s-select">
                                        <select name="city" class="p-city search-select">
                                            @foreach ($cities as $c)
                                                <option class="cid" value="{{ $c->id }}">{{ $c->name}}
                                                </option>
                                            @endforeach
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
                                        @foreach ($purpose as $p)
                                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                                        @endforeach
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
                            <a href="{{ route('application.house_plot') }}" class="btn">Get Plots and House Application
                                Form</a>
                            <a href="{{ route('application.invest') }}" class="btn">Get Investment Application Form</a>
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
                                <a href="{{ route('contact.us') }}">Contact Us <i class="fas fa-angle-double-right"></i></a>
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
                            @if ($advertisment)
                                @foreach ($advertisment as $ads)
                                    <img class="mySlides" src="{{ asset($ads->logo) }}" style="width:100%">
                                @endforeach
                            @endif
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
                                <a href="{{ route('boost-properties') }}">View All <i
                                        class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-3">
                            <div class="slide-arrows">
                                @if (count($property_boosted) > 0)
                                    <button class="right-ch2"><i class="fas fa-angle-left"></i></button>
                                    <button class="left-ch2"><i class="fas fa-angle-right"></i></button>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

                <div class="swiper swiper-featured" id="swiper-featured2">
                    <div class="swiper-wrapper">
                        @foreach ($property_boosted as $pb)
                            <div class="swiper-slide">
                                <div class="card default-card">
                                    <a href="{{ route('view-property', ['ptype' => $pb->propertyType, 'stype' => $pb->purpose, 'city' => $pb->city, 'id' => $pb->id, 'slug' => $pb->slug]) }}"
                                        class=" b-shadow">
                                        <div class="image">
                                            <img src="{{ asset('properties/gallery/' . $pb->image) }}"
                                                alt="{{ $pb->name }}">
                                            <div class="feature-d p-boosted"><i class="fas fa-angle-double-up"></i>
                                                Boosted</div>
                                            <div class="p-type p-house">{{ $pb->property_type_name }} for Sale</div>
                                        </div>

                                        <div class="p-info">
                                            <div class="price">PKR: {{ convertCurrency($pb->price) }}</div>
                                            <div class="title">{{ $pb->name }}</div>
                                            <div class="b-info">{{ $pb->address }}, {{ $pb->city ? $pb->city : '' }}
                                            </div>
                                        </div>

                                        <div class="additional-info">
                                            <div class="a-features"
                                                @if (empty($pb->bedroom)) style="width: 80%;" @endif
                                                title="{{ $pb->size }} {{ $pb->area }}"><i
                                                    class="fas fa-vector-square"></i> <span>{{ $pb->size }}
                                                    {{ $pb->area }}</span></div>
                                            @if ($pb->bedroom)
                                                <div class="a-features"><i class="fas fa-bed"></i> {{ $pb->bedroom }}
                                                    Bed</div>
                                            @endif
                                            @if ($pb->bath)
                                                <div class="a-features"><i class="fas fa-bath"></i> {{ $pb->bath }}
                                                    Bath</div>
                                            @endif
                                        </div>
                                    </a>

                                </div>
                            </div>
                        @endforeach
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
                                <a href="{{ route('featured-properties') }}">View All <i
                                        class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-3">
                            <div class="slide-arrows">
                                @if (count($property_features) > 0)
                                    <button class="right-ch"><i class="fas fa-angle-left"></i></button>
                                    <button class="left-ch"><i class="fas fa-angle-right"></i></button>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

                <div class="swiper swiper-featured" id="swiper-featured">
                    <div class="swiper-wrapper">
                        @foreach ($property_features as $pf)
                            <div class="swiper-slide">
                                <div class="card default-card">
                                    <a href="{{ route('view-property', ['ptype' => $pf->propertyType, 'stype' => $pf->purpose, 'city' => $pf->city, 'id' => $pf->id, 'slug' => $pf->slug]) }}"
                                        class=" b-shadow">
                                        <div class="image">
                                            <img src="{{ asset('properties/gallery/' . $pf->image) }}"
                                                alt="{{ $pf->name }}">
                                            <div class="feature-d p-feature"><i class="fas fa-trophy"></i> Featured</div>
                                            <div class="p-type p-house">{{ $pf->property_type_name }} for
                                                {{ $pf->purpose }} </div>
                                        </div>

                                        <div class="p-info">
                                            <div class="price">PKR: {{ convertCurrency($pf->price) }}</div>
                                            <div class="title"> {{ $pf->name }}</div>
                                            <div class="b-info">
                                                @if (isset($pf->address))
                                                    {{ $pf->address }},
                                                @endif {{ $pf->city ? $pf->city : '' }}
                                            </div>
                                        </div>

                                        <div class="additional-info">
                                            <div class="a-features"
                                                @if (empty($pf->bedroom)) style="width: 80%;" @endif
                                                title="{{ $pf->size }} {{ $pf->area }}"><i
                                                    class="fas fa-vector-square"></i> <span>{{ $pf->size }}
                                                    {{ $pf->area }}</span></div>
                                            @if ($pf->bedroom)
                                                <div class="a-features"><i class="fas fa-bed"></i> {{ $pf->bedroom }}
                                                    Bed</div>
                                            @endif
                                            @if ($pf->bath)
                                                <div class="a-features"><i class="fas fa-bath"></i> {{ $pf->bath }}
                                                    Bath</div>
                                            @endif
                                        </div>
                                    </a>

                                </div>
                            </div>
                        @endforeach
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
                                <a href="{{ route('active-projects') }}">View All <i
                                        class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-3">

                        </div>

                        <!-- project details -->
                        @forelse ($projects as $p)
                            <!-- <h1>{{ $p->image }}</h1> -->
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <div class="project-default-card default-card">
                                    <a href="{{ route('project-single', ['id' => $p->id]) }}" class=" b-shadow">
                                        <div class="image">
                                            <img src="{{ asset($p->image) }}" alt="project-image">
                                        </div>

                                        <div class="p-info">
                                            <div class="project-logo">
                                                <img src="{{ asset($p->logo) }}" alt="logo">
                                            </div>
                                            <div class="project-info">
                                                <div class="price">{{ $p->name }}</div>
                                                {{-- <div class="title">PKR {{ convertCurrency($p->min_price) }} lac - 2.12 Cr</div> --}}
                                                <div class="title">PKR {{ $p->min_price }} - {{ $p->max_price }}</div>
                                                <div class="b-info">{{ $p->cityName }}</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="p-empty b-shadow">No <span>Active Project</span> Found.</div>
                            </div>
                        @endforelse

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
                                                                      {{--  <a href="#">View All <i class="fas fa-angle-double-right"></i></a>  --}}
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
                                                                      @foreach ($prime_dealers as $pd)
    <div class="swiper-slide"  style="width: 195px; !important">
                                                                            {{-- prime dealer --}}
                                                                            <div class="col-md-2 col-sm-3 col-xs-6 swiper-slide" style="width: 195px; !important">

                                                                              <div class="dealers b-shadow">
                                                                                <img class="slider-logos" src="{{ asset('storage/app') }}/{{ $pd->logo }}">
                                                                                
                                                                                <div class="prime-dealer-details">
                                                                                  <div class="name">{{ $pd->name }}</div>
                                                                                  <div class="pd-contact">
                                                                                    <div class="c-heading">Contact</div>
                                                                                    <ul>
                                                                                      <li>{{ $pd->phone_1 }}</li>
                                                                                      <li>{{ $pd->phone_2 }}</li>
                                                                                      <li>{{ $pd->phone_3 }}</li>
                                                                                    </ul>
                                                                                  </div>
                                                                                </div>

                                                                              </div>

                                                                            </div>
                                                                          </div>
    @endforeach
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
                            <img src="{{ asset('images/works/1.png') }}" alt="how it works">
                        </div>
                        <div class="title">1. Create Account</div>
                        <div class="desc">This is just a simple step, create your account using active email address.
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="h-work b-shadow">
                        <div class="image">
                            <img src="{{ asset('images/works/2.png') }}" alt="how it works">
                        </div>
                        <div class="title">1. Verify Email</div>
                        <div class="desc">Now verify your email address and visit shinnyview.com</div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="h-work b-shadow">
                        <div class="image">
                            <img src="{{ asset('images/works/3.png') }}" alt="how it works">
                        </div>
                        <div class="title">3. List Properties</div>
                        <div class="desc">Once email Verified. Add Properties for Sale in few Clicks</div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="h-work b-shadow">
                        <div class="image">
                            <img src="{{ asset('images/works/4.png') }}" alt="how it works">
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
                            {{--  <div class="slide-arrows">
                    <button><i class="fas fa-angle-left"></i></button>
                    <button><i class="fas fa-angle-right"></i></button>
                  </div>  --}}
                        </div>

                    </div>
                </div>

                <div class="col-md-2 col-sm-3 col-xs-6">
                    <div class="p-cities b-shadow">
                        <a href="{{ route('city-properties', ['id' => 1, 'name' => 'islamabad']) }}">
                            <div class="image">
                                <div class="overlay"></div>
                                <img src="{{ asset('images/location-areas/Islamabad.png') }}" alt="islamabad">
                                <div class="title">Islamabad</div>
                            </div>
                    </div>
                    </a>
                </div>

                <div class="col-md-2 col-sm-3 col-xs-6">
                    <div class="p-cities b-shadow">
                        <a href="{{ route('city-properties', ['id' => 3, 'name' => 'Karachi']) }}">
                            <div class="image">
                                <div class="overlay"></div>
                                <img src="{{ asset('images/location-areas/Karachi.png') }}" alt="Karachi">
                                <div class="title">Karachi</div>
                            </div>
                    </div>
                    </a>
                </div>

                <div class="col-md-2 col-sm-3 col-xs-6">
                    <div class="p-cities b-shadow">
                        <a href="{{ route('city-properties', ['id' => 4, 'name' => 'Lahore']) }}">
                            <div class="image">
                                <div class="overlay"></div>
                                <img src="{{ asset('images/location-areas/Lahore.png') }}" alt="Lahore">
                                <div class="title">Lahore</div>
                            </div>
                    </div>
                    </a>
                </div>


                <div class="col-md-2 col-sm-3 col-xs-6">
                    <div class="p-cities b-shadow">
                        <a href="{{ route('city-properties', ['id' => 5, 'name' => 'Quetta']) }}">
                            <div class="image">
                                <div class="overlay"></div>
                                <img src="{{ asset('images/location-areas/Quetta-Ziarat') }}.png" alt="Quetta-Ziarat">
                                <div class="title">Quetta Ziarat</div>
                            </div>
                    </div>
                    </a>
                </div>

                <div class="col-md-2 col-sm-3 col-xs-6">
                    <div class="p-cities b-shadow">
                        <a href="{{ route('city-properties', ['id' => 6, 'name' => 'Multan']) }}">
                            <div class="image">
                                <div class="overlay"></div>
                                <img src="{{ asset('images/location-areas/Multan.png') }}" alt="Multan">
                                <div class="title">Multan</div>
                            </div>
                    </div>
                    </a>
                </div>

                <div class="col-md-2 col-sm-3 col-xs-6">
                    <div class="p-cities b-shadow">
                        <a href="{{ route('city-properties', ['id' => 7, 'name' => 'Sialkot']) }}">
                            <div class="image">
                                <div class="overlay"></div>
                                <img src="{{ asset('images/location-areas/Sialkot.png') }}" alt="Sialkot">
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
                                <a href="{{ url('/') }}/blog">View All <i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- @foreach ($posts as $r)
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="default-card post-card">
                    <a href="{{url('/')}}/blog/{{$r->post_name}}" class=" b-shadow">
                    <div class="image">
                      @php
                        // return dd($r);
                      @endphp
                        <img src="{{globalC::getPostImage($r->ID)}}" alt="{{$r->post_title}}">
                    </div>
                    <div class="p-info">
                        
                        <div class="title">{{$r->post_title}}</div>
                        <div class="b-info">{{date('M d, Y', strtotime($r->post_date))}}</div>
                    </div>
                    </a>
                </div>
            </div>
            @endforeach --}}

            </div>
        </div>
    </div>


    <!-- news letter -->
    <div class="news-letter">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    @livewire('subscribe')
                </div>
            </div>
        </div>
    </div>


@endsection
@push('js')
    <!-- Newsletter Section end -->
    <script src="{{ asset('libraries/slider/swiper.bundle.min.js') }}"></script>
    <script type="text/javascript">
        let subscribe_url = "{{ route('subscribe') }}";
    </script>
    <script src="{{ asset('js/pages/home.js') }}"></script>
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
                    url: "{{ route('Autocomplte.getAutocompltehome') }}",
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
                        url: "{{ route('Autocomplte.getAutocompltehome') }}",
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
@endpush
