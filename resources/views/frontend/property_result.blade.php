@extends('frontend.app')
@section('content')
    <link href="{{ asset('css/pages/propertyResult.css') }}" rel="stylesheet" />
    <div class="app-banner-home inner-page d-flex align-items-center justify-content-center p-5 banner-layer position-relative"
        style="background-image:url({{ asset('images/banner2.webp') }});">
        <div class="banner-caption">
            <h1 class="text-white f-alpha mb-0">
                Property <span class="txb-color"> List</span>
            </h1>
        </div>
    </div>
    {{-- <div class="bg-white">
        @livewire('property-dropdown-filter', ['searchType' => request()->searchType])
    </div> --}}
    <!-- Filter and card Section Start -->
    {{--<div class="w-100 border-bottom">
        <div class="border-start bg-white h-100">
            @livewire('property-search-form-two', ['request' => request()->all()])
        </div>
    </div>--}}
    <div class="p-list-menu px-4 py-3" id="quick-links">
        <ul class="list-unstyled list-inline d-flex align-items-center justify-content-center px-3  mb-0 scroll-event-btns">
            <li class="list-inline-item me-3">
                <a href="#boost_property" class="text-decoration-none d-flex align-items-center justify-content-center">
                    <img src="{{asset('images/lighting.png')}}" class="me-2" alt="boost property" height="20px">
                    <span>Boost Properties</span>
                </a>
            </li>
            <li class="list-inline-item me-3">
                <a href="#featured_property" class="text-decoration-none d-flex align-items-center justify-content-center">
                    <i class="bi bi-gear-wide-connected me-2"></i>
                    <span>Featured Properties</span>
                </a>
            </li>
            <li class="list-inline-item me-3">
                <a href="#other_property" class="text-decoration-none d-flex align-items-center justify-content-center">
                    <i class="bi bi-list-ul me-2"></i>
                    <span>Other Properties</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="px-4">
        <div class="row mx-0">
            <div class="col-12">

                @livewire('property-search-result', ['request' => request()->all(),'data'=>$data])

            </div>
        </div>
    </section>
    <!-- Filter and card Section End -->
    <script>
        $(window).scroll(function(){
            if($(window).scrollTop() > $('#quick-links').position().top){
                $('#quick-links').addClass('sticky-position');
            }else{
                $('#quick-links').removeClass('sticky-position');
            }
        });
        $('#quick-links a').click(function(e){
            e.preventDefault();
            var dataSrc = $(this).attr('href');
            $(window).scrollTop($(dataSrc).position().top - $('#quick-links').outerHeight());

        })
    </script>
@endsection
