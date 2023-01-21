@extends('frontend.app')
@section('content')
    <link href="{{ asset('css/pages/propertyResult.css') }}" rel="stylesheet" />
    <div class="app-banner-home inner-page d-flex align-items-center justify-content-center p-5 banner-layer position-relative"
        style="background-image:url({{ asset('images/banner2.webp') }});">
        <div class="banner-caption">
            <h5 class="text-white f-alpha mb-0">
                View All Property <span class="txb-color"> List</span>
            </h5>
        </div>
    </div>
    <!-- Filter and card Section Start -->
    <div class="w-100 border-bottom">
        <div class="border-start bg-white h-100">
            @livewire('property-search-form-two', ['request' => request()->all()])
        </div>
    </div>
    <section class="px-4">
        <div class="row mx-0">
            <div class="col-12 py-4">
                @livewire('property-search-filter-result', ['request' => request()->all()])
            </div>
        </div>
    </section>
@endsection
