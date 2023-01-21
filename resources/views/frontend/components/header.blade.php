{{-- @include('frontend.components.topbar') --}}

{{--  mobile nav  --}}
<div class="mobile-nav">
    <div class="mobile-nav--head">
        <a href="{{url('agent/property/create')}}" class="m-header--btn"><i class="fa fa-plus"></i> Add
            Property</a>
        <div class="m-header--close">X</div>
    </div>
    <ul>
        <li><a href="{{url('/')}}">Home</a></li>
        <li><a href="{{url('properties/list')}}">Properties</a></li>
        <li><a href="{{url('for-sale/1/properties')}}">For Sale</a></li>
        <li><a href="{{url('for-rent/2/properties')}}">For Rent</a></li>
        <li><a href="{{url('on-lease/3/properties')}}">On Lease</a></li>
        <li><a href="{{url('active-projects')}}">Projects</a></li>
        <li><a href="{{url('packages')}}">Packages</a></li>
        <li><a href="{{url('blog')}}">Blog</a></li>
        <li><a href="{{url('login')}}">Login</a></li>
    </ul>
</div>

<header class="header">
    <div class="d-flex flex-wrap align-items-center">
        {{-- <div class="container-fluid">
            <div class="row"> --}}

        {{-- <div class="col-md-3 col-sm-2 col-xs-6"> --}}
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" width="170px" alt="ShinnyView" />
            </a>
        </div>
        {{-- </div> --}}

        <div class="m-nav-cta"><i class="fa fa-bars"></i></div>

        {{-- <div class="col-md-5 col-sm-7">
                    <div class="main-menu"> --}}
        <span class="main-menu  m-auto">
            <ul class="list-unstyled m-auto list-inline mb-0">
                <li class="list-inline-item d-lg-inline-block d-none">
                    <a href="{{ route('home') }}"
                        class=" position-relative text-decoration-none d-block py-4 tx-color f-medium">
                        Home
                    </a>
                </li>
                <li class="list-inline-item d-lg-inline-block d-none">
                    <a href="{{ route('properties-listing') }}"
                        class=" position-relative text-decoration-none d-block py-4 tx-color f-medium">Properties</a>
                </li>
                <li class="list-inline-item mega-dropdown-btn d-lg-inline-block d-none">
                    <a href="{{ route('type-properties', ['type' => 'for-sale', 'id' => 1]) }}"
                        class="position-relative  text-decoration-none d-block py-4 tx-color f-medium">
                        For Sale <i class="bi bi-chevron-down f-14"></i>
                    </a>
                    <div class="position-absolute mega-drodpown-menu w-100 py-4 black-rgb-dark">
                        <div class="w-fit-content mx-auto d-flex">
                            <ul class="sub-menu-items list-unstyled me-5 mb-0">
                                <li class="mb-2 me-0">
                                    <a href="#" class="text-decoration-none mega-menu-link f-bold">
                                        Residential Properties
                                    </a>
                                </li>
                                <ul class="mb-0 list-unstyled list-inline">
                                    <li class="mb-0 mt-2 list-inline-item me-0">
                                        <a href="{{ route('sale-properties', ['id' => 1, 'type' => 'residential', 'sid' => 1, 'subtype' => 'house-for-sale']) }}"
                                            class="text-decoration-none mega-menu-link">
                                            <i class="bi bi-chevron-double-right me-2"></i> House For Sale
                                        </a>
                                    </li>
                                    <li class="mb-0 me-0  mt-2 list-inline-item">
                                        <a href="{{ route('sale-properties', ['id' => 1, 'type' => 'residential', 'sid' => 2, 'subtype' => 'apartment-for-sale']) }}"
                                            class="text-decoration-none mega-menu-link">
                                            <i class="bi bi-chevron-double-right me-2"></i> Apartment For Sale
                                        </a>
                                    </li>
                                </ul>
                                <ul class="mb-0 list-unstyled list-inline">
                                    <li class="mb-0 mt-2 list-inline-item me-0">
                                        <a href="{{ route('sale-properties', ['id' => 1, 'type' => 'residential', 'sid' => 16, 'subtype' => 'plot-for-sale']) }}"
                                            class="text-decoration-none mega-menu-link">
                                            <i class="bi bi-chevron-double-right me-2"></i> Plot For Sale
                                        </a>
                                    </li>
                                    <li class="mb-0 me-0  mt-2 list-inline-item">
                                        <a href="{{ route('sale-properties', ['id' => 1, 'type' => 'residential', 'sid' => 5, 'subtype' => 'form-house-for-sale']) }}"
                                            class="text-decoration-none mega-menu-link">
                                            <i class="bi bi-chevron-double-right me-2"></i> Farm House For Sale
                                        </a>
                                    </li>
                                </ul>
                            </ul>
                            <ul class="sub-menu-items list-unstyled mb-0 me-5">
                                <li class="mb-2 me-0">
                                    <a href="#" class="text-decoration-none mega-menu-link f-bold">
                                        Commercial Properties
                                    </a>
                                </li>
                                <ul class="mb-0 list-unstyled list-inline">
                                    <li class="mb-0 mt-2 list-inline-item me-0">
                                        <a href="{{ route('sale-properties', ['id' => 2, 'type' => 'commercial', 'sid' => 9, 'subtype' => 'office-for-sale']) }}"
                                            class="text-decoration-none mega-menu-link">
                                            <i class="bi bi-chevron-double-right me-2"></i> Office For Sale
                                        </a>
                                    </li>
                                    <li class="mb-0 me-0  mt-2 list-inline-item">
                                        <a href="{{ route('sale-properties', ['id' => 2, 'type' => 'commercial', 'sid' => 10, 'subtype' => 'shop-for-sale']) }}"
                                            class="text-decoration-none mega-menu-link">
                                            <i class="bi bi-chevron-double-right me-2"></i> Shop For Sale
                                        </a>
                                    </li>
                                    <li class="mb-0 me-0  mt-2 list-inline-item">
                                        <a href="{{ route('sale-properties', ['id' => 2, 'type' => 'commercial', 'sid' => 11, 'subtype' => 'warehouse-for-sale']) }}"
                                            class="text-decoration-none mega-menu-link">
                                            <i class="bi bi-chevron-double-right me-2"></i> Warehouse For Sale
                                        </a>
                                    </li>
                                </ul>
                                <ul class="mb-0 list-unstyled list-inline">
                                    <li class="mb-0 mt-2 list-inline-item me-0">
                                        <a href="{{ route('sale-properties', ['id' => 2, 'type' => 'commercial', 'sid' => 16, 'subtype' => 'plot-for-sale']) }}"
                                            class="text-decoration-none mega-menu-link">
                                            <i class="bi bi-chevron-double-right me-2"></i> Plot For Sale
                                        </a>
                                    </li>
                                    <li class="mb-0 me-0  mt-2 list-inline-item">
                                        <a href="{{ route('sale-properties', ['id' => 2, 'type' => 'commercial', 'sid' => 13, 'subtype' => 'building-for-sale']) }}"
                                            class="text-decoration-none mega-menu-link">
                                            <i class="bi bi-chevron-double-right me-2"></i> Building For Sale
                                        </a>
                                    </li>
                                </ul>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="list-inline-item mega-dropdown-btn d-lg-inline-block d-none">
                    <a href="{{ route('type-properties', ['type' => 'for-rent', 'id' => 2]) }}"
                        class="position-relative  text-decoration-none d-block py-4 tx-color f-medium">
                        For Rent <i class="bi bi-chevron-down f-14"></i>
                    </a>
                    <div class="position-absolute mega-drodpown-menu w-100 py-4 black-rgb-dark">
                        <div class="w-fit-content mx-auto d-flex">
                            <ul class="sub-menu-items list-unstyled me-5 mb-0">
                                <li class="mb-2 me-0">
                                    <a href="#" class="text-decoration-none mega-menu-link f-bold">
                                        Residential Properties
                                    </a>
                                </li>
                                <ul class="mb-0 list-unstyled list-inline">
                                    <li class="mb-0 mt-2 list-inline-item me-0">
                                        <a href="{{ route('rent-properties', ['id' => 1, 'type' => 'residential', 'sid' => 1, 'subtype' => 'house-for-rent']) }}"
                                            class="text-decoration-none mega-menu-link">
                                            <i class="bi bi-chevron-double-right me-2"></i> House For Rent
                                        </a>
                                    </li>
                                    <li class="mb-0 me-0  mt-2 list-inline-item">
                                        <a href="{{ route('rent-properties', ['id' => 1, 'type' => 'residential', 'sid' => 2, 'subtype' => 'apartment-for-rent']) }}"
                                            class="text-decoration-none mega-menu-link">
                                            <i class="bi bi-chevron-double-right me-2"></i> Apartment For Rent
                                        </a>
                                    </li>
                                </ul>
                                <ul class="mb-0 list-unstyled list-inline">
                                    <li class="mb-0 mt-2 list-inline-item me-0">
                                        <a href="{{ route('rent-properties', ['id' => 1, 'type' => 'residential', 'sid' => 7, 'subtype' => 'room-for-rent']) }}"
                                            class="text-decoration-none mega-menu-link">
                                            <i class="bi bi-chevron-double-right me-2"></i> Room For Rent
                                        </a>
                                    </li>
                                    <li class="mb-0 me-0  mt-2 list-inline-item">
                                        <a href="{{ route('rent-properties', ['id' => 1, 'type' => 'residential', 'sid' => 5, 'subtype' => 'farm-house-for-sale']) }}"
                                            class="text-decoration-none mega-menu-link">
                                            <i class="bi bi-chevron-double-right me-2"></i> Farm House For Rent
                                        </a>
                                    </li>
                                </ul>
                            </ul>
                            <ul class="sub-menu-items list-unstyled mb-0 me-5">
                                <li class="mb-2 me-0">
                                    <a href="#" class="text-decoration-none mega-menu-link f-bold">
                                        Commercial Properties
                                    </a>
                                </li>
                                <ul class="mb-0 list-unstyled list-inline">
                                    <li class="mb-0 mt-2 list-inline-item me-0">
                                        <a href="{{ route('rent-properties', ['id' => 2, 'type' => 'commercial', 'sid' => 9, 'subtype' => 'office-for-rent']) }}"
                                            class="text-decoration-none mega-menu-link">
                                            <i class="bi bi-chevron-double-right me-2"></i> Office For Rent
                                        </a>
                                    </li>
                                    <li class="mb-0 me-0  mt-2 list-inline-item">
                                        <a href="{{ route('rent-properties', ['id' => 2, 'type' => 'commercial', 'sid' => 10, 'subtype' => 'shop-for-rent']) }}"
                                            class="text-decoration-none mega-menu-link">
                                            <i class="bi bi-chevron-double-right me-2"></i> Shop For Rent
                                        </a>
                                    </li>
                                </ul>
                                <ul class="mb-0 list-unstyled list-inline">
                                    <li class="mb-0 me-0  mt-2 list-inline-item">
                                        <a href="{{ route('rent-properties', ['id' => 2, 'type' => 'commercial', 'sid' => 13, 'subtype' => 'building-for-rent']) }}"
                                            class="text-decoration-none mega-menu-link">
                                            <i class="bi bi-chevron-double-right me-2"></i> Building For Rent
                                        </a>
                                    </li>
                                    <li class="mb-0 me-0  mt-2 list-inline-item">
                                        <a href="{{ route('rent-properties', ['id' => 2, 'type' => 'commercial', 'sid' => 11, 'subtype' => 'ware-house-for-rent']) }}"
                                            class="text-decoration-none mega-menu-link">
                                            <i class="bi bi-chevron-double-right me-2"></i> Warehouse For Rent
                                        </a>
                                    </li>
                                </ul>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="list-inline-item mega-dropdown-btn mega-dropdown-btn-main d-lg-inline-block d-none">
                    <a href="{{ route('type-properties', ['type' => 'on-lease', 'id' => 3]) }}"
                        class="text-decoration-none position-relative d-block py-4 tx-color f-medium">
                        On Lease <i class="bi bi-chevron-down f-14"></i>
                    </a>
                    <div
                        class="position-absolute mega-dropdown-btn-content mega-drodpown-menu mega-menu-offset w-100 py-4 black-rgb-dark">
                        <div class="w-fit-content d-flex">
                            <ul class="sub-menu-items list-unstyled me-5 mb-0">
                                <ul class="mb-0 list-unstyled list-inline">
                                    <li class="mb-0 mt-2 list-inline-item me-0">
                                        <a href="{{ route('lease-properties', ['id' => 1, 'type' => 'residential-lease']) }}"
                                            class="text-decoration-none mega-menu-link">
                                            <i class="bi bi-chevron-double-right me-2"></i> Residential Lease
                                        </a>
                                    </li>
                                    <li class="mb-0 me-0  mt-2 list-inline-item">
                                        <a href="{{ route('lease-properties', ['id' => 2, 'type' => 'commercial-lease']) }}"
                                            class="text-decoration-none mega-menu-link">
                                            <i class="bi bi-chevron-double-right me-2"></i> Commercial Lease
                                        </a>
                                    </li>
                                </ul>
                            </ul>
                        </div>
                    </div>
                </li>
                {{--  <li class="list-inline-item mega-dropdown-btn mega-dropdown-btn-main d-lg-inline-block d-none">
                                <a href="#" class="text-decoration-none position-relative d-block py-4 tx-color f-medium">
                                    Land  <i class="bi bi-chevron-down f-14"></i>
                                </a>
                                <div class="position-absolute mega-drodpown-menu mega-dropdown-btn-content w-100 py-4 black-rgb-dark">
                                    <div class="w-fit-content d-flex">
                                        <ul class="sub-menu-items list-unstyled me-5 mb-0">
                                            <ul class="mb-0 list-unstyled list-inline">
                                                <li class="mb-0 mt-2 list-inline-item me-0">
                                                    <a href="{{route('properties-listing')}}?type=agriculture-land" class="text-decoration-none mega-menu-link">
                                                        <i class="bi bi-chevron-double-right me-2"></i> Agriculture Land
                                                    </a>
                                                </li>
                                                <li class="mb-0 me-0  mt-2 list-inline-item">
                                                    <a href="{{route('properties-listing')}}?type=industrial-land" class="text-decoration-none mega-menu-link">
                                                        <i class="bi bi-chevron-double-right me-2"></i> Industrial Land
                                                    </a>
                                                </li>
                                            </ul>
                                        </ul>
                                    </div>
                                </div>
                            </li>  --}}
                <li class="list-inline-item mega-dropdown-btn mega-dropdown-btn-main d-lg-inline-block d-none">
                    <a href="#" class="text-decoration-none position-relative d-block py-4 tx-color f-medium">
                        Projects <i class="bi bi-chevron-down f-14"></i>
                    </a>
                    <div
                        class="position-absolute mega-dropdown-btn-content mega-drodpown-menu mega-menu-offset w-100 py-4 black-rgb-dark">
                        <div class="w-fit-content d-flex">
                            <ul class="sub-menu-items list-unstyled me-5 mb-0">
                                <ul class="mb-0 list-unstyled list-inline">
                                    <li class="mb-0 mt-2 list-inline-item me-0">
                                        <a href="{{ route('active-projects') }}"
                                            class="text-decoration-none mega-menu-link">
                                            <i class="bi bi-chevron-double-right me-2"></i> Active Projects
                                        </a>
                                    </li>
                                    <li class="mb-0 me-0  mt-2 list-inline-item">
                                        <a href="{{ url('/upcoming-projects') }}"
                                            class="text-decoration-none mega-menu-link">
                                            <i class="bi bi-chevron-double-right me-2"></i> Upcoming Projects
                                        </a>
                                    </li>
                                </ul>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="list-inline-item mega-dropdown-btn mega-dropdown-btn-main d-lg-inline-block d-none">
                    <a href="{{ route('packages') }}"
                        class="text-decoration-none position-relative d-block py-4 tx-color f-medium">
                        Packages
                    </a>
                </li>
                <li class="list-inline-item mega-dropdown-btn mega-dropdown-btn-main d-lg-inline-block d-none">
                    <a href="{{ url('/') }}/blog"
                        class="text-decoration-none position-relative d-block py-4 tx-color f-medium">
                        Blog
                    </a>
                </li>
                {{-- <li class="list-inline-item d-lg-inline-block d-none">
                                <a href="{{route('search-property')}}?searchType=2" class="text-decoration-none d-block py-4 tx-color f-medium position-relative">
                                Valuation
                                </a>
                            </li> --}}
            </ul>
        </span>
        {{-- </div>
                </div> --}}

        <span class="main-menu">
            <ul class="list-unstyled mb-0 ms-auto list-inline d-flex align-items-center">


                @if (Auth::check())
                @else
                    <!-- <li class="login">
                                    <a href="{{ url('/dealer-signup') }}">Register</a>
                                </li> -->
                    <li class="list-inline-item">
                        <a href="{{ route('login') }}" class="text-decoration-none tx-color f-bold account-link">
                            Register or Login
                        </a>
                    </li>
                @endif
                <li class="join">
                    <a href="{{ route('create_property') }}"><i class="fas fa-plus"></i> Add Property</a>
                </li>
                <li class="list-inline-item">
                    @if (Auth::check())
                        <div class="dropdown">
                            <button class="bg-none bg-transparent border-0" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="{{ asset('images/testimonial/t3.png') }}" width="35px" height="35px"
                                    alt="username" class="rounded-circle border" />
                            </button>
                            <?php
                            if (Auth::user()->role_id == 1) {
                                $dashboard_url = 'admin.dashboard';
                            } elseif (Auth::user()->role_id == 2) {
                                $dashboard_url = 'agent.dashboard';
                            } else {
                                $dashboard_url = 'private-seller/dashboard';
                            }
                            ?>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item text-grey" href="{{ route($dashboard_url) }}"><i
                                        class="bi bi-person-circle me-2"></i> Dashboard</a>
                                <a class="dropdown-item text-grey" href="{{ route('logout') }}"><i
                                        class="bi bi-box-arrow-right me-2"></i> Logout</a>
                            </div>
                        </div>
                    @else
                        {{-- <a href="{{route('login')}}" class="text-decoration-none tx-color f-bold account-link">
                                    Login
                                </a> --}}
                    @endif
                </li>
                {{-- <li class="list-inline-item">
                            @if (Auth::check())
                            <div class="dropdown">
                                <button class="bg-none bg-transparent border-0" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{asset('images/testimonial/t3.png')}}"
                                    width="35px" height="35px" alt="username" class="rounded-circle border" />
                                </button>
                                    <?php
                                    if (Auth::user()->role_id == 1) {
                                        $dashboard_url = 'admin.dashboard';
                                    } elseif (Auth::user()->role_id == 2) {
                                        $dashboard_url = 'agent.dashboard';
                                    } else {
                                        $dashboard_url = 'private-seller/dashboard';
                                    }
                                    ?>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item text-grey" href="{{route($dashboard_url)}}"><i class="bi bi-person-circle me-2"></i> Dashboard</a>
                                    <a class="dropdown-item text-grey" href="{{route('logout')}}"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
                                </div>
                            </div>
                        @else
                            <a href="{{route('login')}}" class="text-decoration-none tx-color f-bold account-link">
                                <i class="bi bi-person-fill"></i> My Account
                            </a>
                            @endif
                        </li> --}}
                {{-- <li class="list-inline-item me-3 d-none-1286">
                            <a href="{{url('/dealer-signup')}}" class="position-relative text-decoration-none
                            border-0 bg-theme-dark text-white rounded-btn px-4 py-2 f-medium h-auto d-block op-1">
                            Register as Dealer
                            </a>
                        </li>
                        <li class="list-inline-item me-4 d-none-1286">
                            <a href="{{route('create_property')}}" class="position-relative text-decoration-none
                            border-0 bg-theme-dark text-danger rounded-btn px-4 py-2 f-medium h-auto d-block op-1">
                            Sell Your Property
                            </a>
                        </li>
                        <li class="list-inline-item d-mlg-1286 d-none">
                            <div class="dropdown">
                                <button class="bg-none bg-transparent border-0 d-flex align-items-center fs-23" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-list"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item text-grey" href="{{route('dealer.signup')}}}}">Register as Dealer</a>
                                    <a class="dropdown-item text-grey" href="{{route('create_property')}}">Sell Your Property</a>
                                </div>
                            </div>
                        </li>
                        <li class="list-inline-item d-lg-none d-md-inline-block">
                            <button class="bg-none bg-transparent border-0 d-flex align-items-center mns-btn"
                                id="mobile-menu-switch" type="button">
                                <i class="bi bi-list"></i>
                            </button>
                        </li>
                        <li class="list-inline-item">
                            @if (Auth::check())
                            <div class="dropdown">
                                <button class="bg-none bg-transparent border-0" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{asset('images/testimonial/t3.png')}}"
                                    width="35px" height="35px" alt="username" class="rounded-circle border" />
                                </button>
                                    <?php
                                    if (Auth::user()->role_id == 1) {
                                        $dashboard_url = 'admin.dashboard';
                                    } elseif (Auth::user()->role_id == 2) {
                                        $dashboard_url = 'agent.dashboard';
                                    } else {
                                        $dashboard_url = 'private-seller/dashboard';
                                    }
                                    ?>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item text-grey" href="{{route($dashboard_url)}}"><i class="bi bi-person-circle me-2"></i> Dashboard</a>
                                    <a class="dropdown-item text-grey" href="{{route('logout')}}"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
                                </div>
                            </div>
                        @else
                            <a href="{{route('login')}}" class="text-decoration-none tx-color f-bold account-link">
                                <i class="bi bi-person-fill"></i> My Account
                            </a>
                            @endif
                        </li> --}}
            </ul>
        </span>


        {{-- </div>
        </div> --}}
    </div>
</header>
@include('frontend.components.responsive_navbar')
