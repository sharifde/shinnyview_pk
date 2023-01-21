@php
    $route = Route::getCurrentRoute()->getName();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:image" content="{{ asset('/') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('images/favicon-32x32.png') }}" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @if ($route != 'view-property')
        <title>{{ isset($title) ? $title : "Shinnyview.com is Pakistan's Best Property Website." }} </title>
        <meta name="description"
            content={{ isset($description) ? $description : "Shinnyview.com is Pakistan's Best Property Website, Allowing You to Buy, Rent, and Sell Properties across Pakistan." }}>
    @endif

    @if ($route == 'view-property')
        <title>@yield('seo_title') </title>
        <meta name="description" content="@yield('seo_description')">
        <meta name="keywords" content="@yield('seo_keywords')">
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="@yield('seo_title')" />
        <meta property="og:description" content="@yield('seo_description')" />
        <meta property="og:url" content="@yield('seo_url')" />
        <meta property="og:site_name" content="shinnyview.com" />
        <meta property="og:image" content="@yield('seo_image')" />
        <meta name="twitter:card" content="summary_large_image" />
    @endif
    <link rel="alternate" hreflang="x-default" href="https://www.shinnyview.com/" />
    <link rel="alternate" hreflang="en-pk" href="https://www.shinnyview.com/" />
    <link rel="alternate" hreflang="ur-pk" href="https://www.shinnyview.com/" />
    <link rel="stylesheet" href="{{ asset('libraries/bootstrap/bootstrap.min.css?v=1') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css?v=' . time()) }}" />
    <link rel="stylesheet" href="{{ asset('css/responsive.css?v=' . time()) }}" />
    <script src="{{ asset('libraries/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('libraries/bootstrap/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/app.js?v=2') }}"></script>
    <link href="{{ asset('libraries/select2/select2.min.css') }}" rel="stylesheet" />
    @stack('css')
    {{-- NEW LINKS --}}
    <link rel="icon" type="image/x-icon" href="img/favicon-16x16.png">
    <link rel="stylesheet" href="{{ asset('public') }}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/style.css">
    <link rel="stylesheet" href="{{ asset('public') }}/libraries/select2/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />
    {{-- NEW LINKS END --}}
    @livewireStyles
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-190366535-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-190366535-1');
    </script>
    <script type="application/ld+json">
            {"@context":"https://schema.org","@type":"Organization","name":
            "Shinny View","description":"Shinny View, Pakistan's best property portal | Pakistan's best real estate website | No.1 Property Portal in Pakistan | best property portal in Pakistan.
            We provide high-quality service to buyers, sellers,
            landlords, and real estate 
            agents in Karachi, Lahore, Islamabad, Rawalpindi, Peshawar, and all over Pakistan. Shinny View provides high-quality properties like commercial and residential plots, lands, markets, villas, apartments, bungalows, and houses for sale, buy, and rent.
            "
             ,"url":"https://shinnyview.com","sameAs":
            ["https://www.instagram.com/shinnyview_official",
            "https://www.facebook.com/ShinnyView.PK",
            "https://twitter.com/shinnyview",
            "https://www.pinterest.com/shinny_view/",
            "https://www.youtube.com/channel/UCISLz0PnooSqUirtFnbP6AA"],
            "telephone":"+92 330 6969698","foundingDate":"2021",
            "image":
            {"@type":"ImageObject","url":"https://www.shinnyview.com/images/logo.png"},
            "logo":{"@type":"ImageObject","url":"https://www.shinnyview.com/images/logo.png"},"address":
            {"@type":"PostalAddress",
            "streetAddress":"First Floor, Office No 13,
            VIP Plaza,
            I-8 Markaz","addressLocality":"Islamabad","addressRegion":"Federal",
            "postalCode":"44000","addressCountry":{"@type":"Country","name":"Pakistan"}}}
        </script>


</head>

<body>
    <div class="main-app-wrap">
        @include('frontend.components.header')
        <div>
            @yield('content')
        </div>
        {{-- whatsapp icon --}}
        <div class="d-whatsapp-icon">
            <a href="//api.whatsapp.com/send?phone=00923306969698" target="_blank">
                <i class="bi bi-whatsapp"></i>
            </a>
        </div>
        @include('frontend.components.footer')
    </div>
    <script src="{{ asset('libraries/select2/select2.min.js') }}"></script>
    <script src="{{ asset('libraries/jquery-validations/validate.js') }}"></script>
    <script src="{{ asset('libraries/jquery-validations/additional.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public') }}/libraries/sweet-alert/sweet_alert.min.js"></script>


    @livewireScripts
    @stack('js')
    <script>
        window.livewire_app_url = "{{ url('/') }}";
        $(document).ready(function() {
            // mobile header
            $('.header .burger-menu .icon').on('click', function() {
                $('.header .burger-menu .mb-items').slideToggle('fast');
            });

            //----------- select search Start -------------------
            $('.search-select').select2({
                width: 'resolve'
            });
            // hide icon
            $('b[role="presentation"]').hide();
            //----------- select search End -------------------

        });

        // sticky header
        $(window).scroll(function() {
            var scrollPos = $(this).scrollTop();
            if (scrollPos > 100) {
                $('.header').addClass('sticky');
            } else {
                $('.header').removeClass('sticky');
            }
        });
    </script>
</body>

</html>
