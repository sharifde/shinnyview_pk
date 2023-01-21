@php
    use App\Http\Controllers\globalC;
@endphp
<div class="property-main-wrap">
    {{-- boosted properties --}}
    <div class="boost-properties pb-5" id="boost_property">
        <h3 class="f-bold py-3">
            <img src="{{ asset('images/lighting.png') }}" alt="boost property" height="25px" />
            {{-- Boosted Properties (<span class="txb-color">{{ $boost_count }}</span>) --}}
            Boosted Properties
        </h3>
            @if ($boost_count != 0)
            
                <div class="row">
                    @php($i=0)
                    @foreach ($properties as $key => $item)
                        @if ($item->boost == 1 && $i < 6)
                        <div class="col-md-6">
                            <div class="property-card bg-white mt-4 d-none d-md-block">
                                <div class="d-flex mx-0">
                                    <div class="px-0 border-end d-flex align-items-center  position-relative justify-content-center">
                                        <div class="card-image-box text-center position-relative listing-badges">
                                            <img src="{{asset('properties/gallery/'.$item->image)}}" class="h-100" alt="{{ $item->name }}" />
                                            <span class="featured text-white">Boost</span>
                                        </div>
                                        <div class="gallery-media-bar w-100 position-absolute">
                                            <ul class="w-fit-content mt-3 ms-auto me-3 mb-0 list-inline px-3 text-white py-1 black-rgb">
                                                {{-- <li class="d-inline-flex align-items-center  me-3 f-medium">
                                                    <i class="bi bi-camera-video f-17"></i>
                                                </li> --}}
                                                <li class="d-inline-flex align-items-center f-medium">
                                                    <i class="bi bi-image me-1 f-17"></i> 1/{{globalC::countGallery($item->id)}}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="flex-1 d-flex flex-column justify-content-between">
                                        <div class="p-4 property-detail-area">
                                            <h6 class="title txb-color f-bold mb-3">
                                                {{ $item->name }}
                                            </h6>
                                            <address class="mb-2">
                                                <p class="text-grey mb-0">
                                                    <i class="bi bi-geo-alt-fill text-danger me-1"></i>
                                                    {{ $item->city_name }}
                                                </p>
                                            </address>
                                            <div class="property-detail-info">
                                                <ul class="list-inline mb-2 py-2 list-availabe-things d-flex flex-wrap align-items-center">
                                                    @if ($item->bedroom > 0)    
                                                        <li class="list-inline-item f-normal">
                                                            <img src="{{ asset('images/svg/bed.svg') }}" alt="bed" height="20px"
                                                            class="me-1" />
                                                            {{ $item->bedroom }} Beds
                                                        </li>
                                                    @endif
                                                    @if ($item->bath > 0)
                                                        <li class="list-inline-item  f-normal">
                                                            <img src="{{ asset('images/svg/bath-tub.svg') }}" alt="bath" height="19px"
                                                                class="me-1" />
                                                            {{ $item->bath }} Bath
                                                        </li>
                                                    @endif
                                                    @if ($item->garage > 0)
                                                        <li class="list-inline-item  f-normal">
                                                            <img src="{{ asset('images/svg/garage.svg') }}" alt="garage" height="18px"
                                                                class="me-1" />
                                                            {{ $item->garage }} Garage
                                                        </li>
                                                    @endif
                                                    @if ($item->size > 0)
                                                        <li class="list-inline-item">
                                                            <img src="{{ asset('images/svg/selection.svg') }}" alt="garage" height="18px"
                                                            class="me-1" />
                                                            <span class="text-grey">{{ $item->size }} {{ $item->area }}</span>
                                                        </li>
                                                    @endif
                                                </ul>
                                                <p class="text-grey mb-0">
                                                    {{ $item->description }}
                                                </p>
                                            </div>

                                        </div>
                                        <div class="border-top row mx-0">
                                            <div class="col-12 px-4">
                                                <ul class="list-unstyled property-card-footer mb-0 w-100 d-flex align-items-center">
                                                    <li class="list-inline-item me-2 py-2">
                                                        <h6 class="mb-0 f-bold text-grey"><i class="bi bi-tag me-1 txb-color"></i>
                                                        PKR:  {{ convertCurrency($item->price) }}</h6>
                                                    </li>
                                                    <li class="list-inline-item ms-auto">
                                                        <a href="tel:{{$item->phone_num}}"
                                                            class="px-3 d-inline-flex f-medium text-decoration-none
                                                            align-items-center justify-content-center contact-lnk">
                                                            <i class="bi bi-telephone"></i>
                                                        </a>
                                                    </li>
                                                    <li class="py-2 list-inline-item">
                                                        <a href="{{ route('view-property',['ptype' => $item->propertyType, 'stype' => $item->purpose,'city' => $item->city_name,'id' => $item->id,'slug' => $item->slug]) }}"
                                                            class="px-3 d-inline-flex text-white f-medium text-decoration-none bg-theme
                                                            align-items-center justify-content-center">
                                                            More Info <i class="bi bi-arrow-right ms-2"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-md-none d-block mb-4 swiper-featured">
                                <div class="card">
                                    <a href="{{ route('view-property',['ptype' => $item->propertyType, 'stype' => $item->purpose,'city' => $item->city_name,'id' => $item->id,'slug' => $item->slug]) }}" class="d-block position-relative overflow-hidden listing-badges">
                                        <img class="prop-banner img-fluid" src="{{asset('properties/gallery/'.$item->image)}}" class="card-img-top"
                                        alt="{{ $item->name }}">
                                        <span class="featured text-white">Boost</span>
                                        <div class="gallery-media-bar w-100 position-absolute">
                                            <ul class="w-fit-content mt-3 ms-auto me-3 mb-0 list-inline px-3 text-white py-1 black-rgb">
                                                <li class="d-inline-flex align-items-center  me-3 f-medium">
                                                    <i class="bi bi-camera-video f-17"></i>
                                                </li>
                                                <li class="d-inline-flex align-items-center f-medium">
                                                    <i class="bi bi-image me-1 f-17"></i> 1/{{globalC::countGallery($item->id)}}
                                                </li>
                                            </ul>
                                        </div>
                                    </a>
                                    <div class="card-body p-0 border-top-grey">
                                        <div class="card-content-wrap">
                                            <h5 class="f-bold tx-color px-3 pt-3 mb-0">{{ $item->name }}</h5>
                                            <div class="card-text mb-0 px-3 mt-3 clearfix">
                                                <div class="float-start">
                                                    <i class="bi bi-geo-alt text-danger"></i> {{ $item->city_name ? $item->city_name : '' }}
                                                </div>
                                                <div class="float-end">
                                                    <i class="bi bi-tag"></i> PKR  {{ convertCurrency($item->price) }}
                                                </div>
                                            </div>
                                            <div class="card-prop-detail px-3">
                                                <ul class="list-unstyled mb-0 d-flex align-items-center flex-wrap">
                                                    <li class="mt-4 col-lg-4 col-6 align-self-center f-normal">
                                                        <img src="{{ asset('images/svg/selection.svg') }}" alt="area"
                                                        height="20px" class="me-2" />
                                                        {{ $item->size }}  {{ $item->area }}
                                                    </li>
                                                    @if($item->bedroom > 0)
                                                        <li class="mt-4 col-lg-4 col-6 align-self-center f-normal">
                                                            <img src="{{ asset('images/svg/bed.svg') }}" alt="bed" height="20px"
                                                                class="me-2" />
                                                            {{ $item->bedroom }} Beds
                                                        </li>
                                                    @endif
                                                    @if($item->bath > 0)
                                                        <li class="mt-4 col-lg-4 col-6 align-self-center f-normal">
                                                            <img src="{{ asset('images/svg/bath-tub.svg') }}" alt="bath"
                                                                height="20px" class="me-2" />
                                                            {{ $item->bath }} Bath
                                                        </li>
                                                    @endif
                                                    @if($item->garage > 0)
                                                        <li class="mt-4 col-lg-4 col-6 align-self-center f-normal">
                                                            <img src="{{ asset('images/svg/garage.svg') }}" alt="garage"
                                                                height="20px" class="me-2" />
                                                            {{ $item->garage }} Garage
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="view-detail-btn mt-4 border-top-grey">
                                            <a href="{{ route('view-property',['ptype' => $item->propertyType, 'stype' => $item->purpose,'city' => $item->city_name,'id' => $item->id,'slug' => $item->slug]) }}">
                                            <button class="border-0 bg-theme text-white w-100 f-medium">View Details</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php($i++)

                    @endforeach
                </div>
                @if ($boost_count > 6)
                    <div class="text-center mt-5">
                        <a class="d-inline-flex align-items-center view-all-btn text-decoration-none" href="{{route('search-filter-property')}}?searchType=<?php echo $searchType?>&searchTypeTwo=<?php echo $searchTypeTwo?>&searchTypeThree=<?php echo $searchTypeThree?>&city=<?php echo $city?>">
                            <span class="me-3">View All Property</span><i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                @endif
            @else
                <div class="no-record-found">
                    <p class="mb-0">No <span class="txb-color f-bold">Boosted Property</span>  Found</p>
                </div>
            @endif
    </div>
    <hr class="border-seprater mt-1" />

    {{-- featured properties --}}
    <div class="featured properties pb-5" id="featured_property">
        <div class="boost-properties">
            <h3 class="f-bold pt-md-4 pb-md-3 pb-5 pt-4 mb-0">
                <i class="bi bi-gear-wide-connected me-1 fs-23"></i>
                {{-- Featured Properties (<span class="txb-color">{{ $featured_count }}</span>) --}}
                Featured Properties
            </h3>
        </div>
        @if($featured_count != 0)
            <div class="row">
            @php($j=0)
            @foreach ($properties as $key =>$item)
                @if ($item->featured == 1  && $j < 6)
                <div class="col-md-6">
                        <div class="property-card bg-white mt-4 d-md-block d-none">
                            <div class="d-flex mx-0">
                                <div class="border-end d-flex align-items-center position-relative justify-content-center">
                                    <div class="card-image-box text-center position-relative listing-badges">
                                        <img src="{{asset('properties/gallery/'.$item->image)}}" class="h-100" alt="{{ $item->name }}"/>
                                        <span class="featured text-white">Featured</span>
                                    </div>
                                    <div class="gallery-media-bar w-100 position-absolute">
                                        <ul class="w-fit-content mt-3 ms-auto me-3 mb-0 list-inline px-3 text-white py-1 black-rgb">
                                            {{-- <li class="d-inline-flex align-items-center  me-3 f-medium">
                                                <i class="bi bi-camera-video f-17"></i>
                                            </li> --}}
                                            <li class="d-inline-flex align-items-center f-medium">
                                                <i class="bi bi-image me-1 f-17"></i> 1/{{globalC::countGallery($item->id)}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="flex-1 d-flex flex-column justify-content-between">
                                    <div class="p-4 property-detail-area">
                                        <h6 class="title txb-color f-bold mb-3">
                                            {{ $item->name }}
                                        </h6>
                                        <address class="mb-2">
                                            <p class="text-grey mb-0">
                                                <i class="bi bi-geo-alt-fill text-danger me-1"></i>
                                                {{ $item->city_name }}
                                            </p>
                                        </address>
                                        <div class="property-detail-info">
                                            <ul class="list-inline mb-2 py-2 list-availabe-things d-flex flex-wrap align-items-center">
                                                @if ($item->bedroom > 0)
                                                    <li class="list-inline-item f-normal">
                                                        <img src="{{ asset('images/svg/bed.svg') }}" alt="bed" height="20px"
                                                        class="me-1" />
                                                        {{ $item->bedroom }} Beds
                                                    </li>
                                                @endif
                                                @if ($item->bath > 0)
                                                    <li class="list-inline-item  f-normal">
                                                        <img src="{{ asset('images/svg/bath-tub.svg') }}" alt="bath" height="19px"
                                                        class="me-1" />
                                                        {{ $item->bath }} Bath
                                                    </li>
                                                @endif
                                                @if ($item->garage > 0)
                                                    <li class="list-inline-item  f-normal">
                                                        <img src="{{ asset('images/svg/garage.svg') }}" alt="garage" height="18px"
                                                        class="me-1" />
                                                        {{ $item->garage }} Garage
                                                    </li>
                                                @endif
                                                @if ($item->size > 0)
                                                    <li class="list-inline-item">
                                                        <img src="{{ asset('images/svg/selection.svg') }}" alt="garage" height="18px"
                                                        class="me-1" />
                                                        <span class="text-grey">{{ $item->size }} {{ $item->area }}</span>
                                                    </li>
                                                @endif
                                            </ul>
                                            <p class="text-grey mb-0">
                                                {{ $item->description }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="border-top row mx-0">
                                        <div class="col-12 px-4">
                                            <ul class="list-unstyled property-card-footer mb-0 w-100 d-flex align-items-center">
                                                <li class="list-inline-item me-2 py-2">
                                                    <h6 class="mb-0 f-bold text-grey"><i class="bi bi-tag me-1 txb-color"></i>
                                                        PKR: {{ convertCurrency($item->price) }}</h6>
                                                </li>
                                                <li class="list-inline-item ms-auto">
                                                        <a href="tel:{{$item->phone_num}}"
                                                            class="px-3 d-inline-flex f-medium text-decoration-none
                                                            align-items-center justify-content-center contact-lnk">
                                                            <i class="bi bi-telephone"></i>
                                                        </a>
                                                    </li>
                                                <li class="py-2 list-inline-item">
                                                    <a href="{{ route('view-property',['ptype' => $item->propertyType, 'stype' => $item->purpose,'city' => $item->city_name,'id' => $item->id,'slug' => $item->slug]) }}"
                                                        class="px-3 d-inline-flex text-white f-medium text-decoration-none bg-theme
                                                        align-items-center justify-content-center">
                                                        More Info <i class="bi bi-arrow-right ms-2"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-md-none d-block mb-4 swiper-featured w-100">
                        <div class="card">
                            <a href="{{ route('view-property',['ptype' => $item->propertyType, 'stype' => $item->purpose,'city' => $item->city_name,'id' => $item->id,'slug' => $item->slug]) }}" class="d-block position-relative overflow-hidden listing-badges">
                                <img class="prop-banner img-fluid" src="{{asset('properties/gallery/'.$item->image)}}" class="card-img-top"
                                alt="{{ $item->name }}">
                                <span class="featured text-white">Featured</span>
                                <div class="gallery-media-bar w-100 position-absolute">
                                    <ul class="w-fit-content mt-3 ms-auto me-3 mb-0 list-inline px-3 text-white py-1 black-rgb">
                                        <li class="d-inline-flex align-items-center  me-3 f-medium">
                                            <i class="bi bi-camera-video f-17"></i>
                                        </li>
                                        <li class="d-inline-flex align-items-center f-medium">
                                            <i class="bi bi-image me-1 f-17"></i> 1/{{globalC::countGallery($item->id)}}
                                        </li>
                                    </ul>
                                </div>
                            </a>
                            <div class="card-body p-0 border-top-grey">
                                <div class="card-content-wrap">
                                    <h5 class="f-bold tx-color px-3 pt-3 mb-0">{{ $item->name }}</h5>
                                    <div class="card-text mb-0 px-3 mt-3 clearfix">
                                        <div class="float-start">
                                            <i class="bi bi-geo-alt text-danger"></i> {{ $item->city_name ? $item->city_name : '' }}
                                        </div>
                                        <div class="float-end">
                                            <i class="bi bi-tag"></i> PKR  {{ convertCurrency($item->price) }}
                                        </div>
                                    </div>
                                    <div class="card-prop-detail px-3">
                                        <ul class="list-unstyled mb-0 d-flex align-items-center flex-wrap">
                                            <li class="mt-4 col-lg-4 col-6 align-self-center f-normal">
                                                <img src="{{ asset('images/svg/selection.svg') }}" alt="area"
                                                height="20px" class="me-2" />
                                                {{ $item->size }}  {{ $item->area }}
                                            </li>
                                            @if($item->bedroom)
                                            <li class="mt-4 col-lg-4 col-6 align-self-center f-normal">
                                                <img src="{{ asset('images/svg/bed.svg') }}" alt="bed" height="20px"
                                                    class="me-2" />
                                                {{ $item->bedroom }} Beds
                                            </li>
                                            @endif
                                            @if($item->bath)
                                            <li class="mt-4 col-lg-4 col-6 align-self-center f-normal">
                                                <img src="{{ asset('images/svg/bath-tub.svg') }}" alt="bath"
                                                    height="20px" class="me-2" />
                                                {{ $item->bath }} Bath
                                            </li>
                                            @endif
                                            @if($item->garage)
                                            <li class="mt-4 col-lg-4 col-6 align-self-center f-normal">
                                                <img src="{{ asset('images/svg/garage.svg') }}" alt="garage"
                                                    height="20px" class="me-2" />
                                                {{ $item->garage }} Garage
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="view-detail-btn mt-4 border-top-grey">
                                    <a href="{{ route('view-property',['ptype' => $item->propertyType, 'stype' => $item->purpose,'city' => $item->city_name,'id' => $item->id,'slug' => $item->slug]) }}">
                                    <button class="border-0 bg-theme text-white w-100 f-medium">View Details</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @php($j++)

            @endforeach
                    @if ($featured_count > 6)
                        
                        <div class="text-center mt-5 col-12">
                            <a class="d-inline-flex align-items-center view-all-btn text-decoration-none" href="{{route('search-filter-property')}}?searchType=<?php echo $searchType?>&searchTypeTwo=<?php echo $searchTypeTwo?>&searchTypeThree=<?php echo $searchTypeThree?>&city=<?php echo $city?>">
                                <span class="me-3">View All Property</span><i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    @endif
            </div>
        @else
            <div class="no-record-found">
                <p class="mb-0">No <span class="txb-color f-bold">Featured Property</span>  Found</p>
            </div>
        @endif

    </div>

    <hr class="border-seprater mt-1" />

    {{-- other properties --}}
    <div class="featured properties mb-4" id="other_property">
        <div class="boost-properties">
            <h3 class="f-bold pt-md-4 pb-md-3 pb-5 pt-4 mb-0 d-flex align-items-center">
                <i class="bi bi-list-ul me-2 pt-1" style="font-size:25px;"></i>
                {{-- Other Properties (<span class="txb-color">{{ $other_count }}</span>) --}}
                Other Properties
            </h3>
        </div>
        @if($other_count)
        <div class="row">
            @php($k=0)
            @foreach ($properties as $key => $item)
                @if ($item->featured != '1' && $item->boost != '1')
                    @if($k < 6)
                    <div class="col-md-6">
                        <div class="property-card bg-white mt-4 d-md-block d-none">
                            <div class="d-flex mx-0">
                                <div class="border-end d-flex align-items-center position-relative  justify-content-center">
                                    <div class="card-image-box text-center position-relative listing-badges">
                                        <img src="{{asset('properties/gallery/'.$item->image)}}" class="h-100" alt="{{ $item->name }}"/>
                                    </div>
                                    <div class="gallery-media-bar w-100 position-absolute">
                                        <ul class="w-fit-content mt-3 ms-auto me-3 mb-0 list-inline px-3 text-white py-1 black-rgb">
                                            {{-- <li class="d-inline-flex align-items-center  me-3 f-medium">
                                                <i class="bi bi-camera-video f-17"></i>
                                            </li> --}}
                                            <li class="d-inline-flex align-items-center f-medium">
                                                <i class="bi bi-image me-1 f-17"></i> 1/{{globalC::countGallery($item->id)}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="flex-1 d-flex flex-column justify-content-between">
                                    <div class="p-4 property-detail-area">
                                        <h6 class="title txb-color f-bold mb-3">
                                            {{ $item->name }}
                                        </h6>
                                        <address class="mb-2">
                                            <p class="text-grey mb-0">
                                                <i class="bi bi-geo-alt-fill text-danger me-1"></i>
                                                {{ $item->city_name }}
                                            </p>
                                        </address>
                                        <div class="property-detail-info">
                                            <ul class="list-inline mb-2 py-2 list-availabe-things d-flex flex-wrap align-items-center">
                                                @if ($item->bedroom > 0)
                                                    <li class="list-inline-item f-normal">
                                                        <img src="{{ asset('images/svg/bed.svg') }}" alt="bed" height="20px"
                                                        class="me-1" />
                                                        {{ $item->bedroom }} Beds
                                                    </li>
                                                @endif
                                                @if ($item->bath > 0)
                                                    <li class="list-inline-item  f-normal">
                                                        <img src="{{ asset('images/svg/bath-tub.svg') }}" alt="bath" height="19px"
                                                        class="me-1" />
                                                        {{ $item->bath }} Bath
                                                    </li>
                                                @endif
                                                @if ($item->garage > 0)
                                                    <li class="list-inline-item  f-normal">
                                                        <img src="{{ asset('images/svg/garage.svg') }}" alt="garage" height="18px"
                                                        class="me-1" />
                                                        {{ $item->garage }} Garage
                                                    </li>
                                                @endif
                                                @if ($item->size > 0)
                                                    <li class="list-inline-item">
                                                        <img src="{{ asset('images/svg/selection.svg') }}" alt="garage" height="18px"
                                                        class="me-1" />
                                                        <span class="text-grey">{{ $item->size }} {{ $item->area }}</span>
                                                    </li>
                                                @endif
                                            </ul>
                                            <p class="text-grey mb-0">
                                                {{ $item->description }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="border-top row mx-0">
                                        <div class="col-12 px-4">
                                            <ul class="list-unstyled property-card-footer mb-0 w-100 d-flex align-items-center">
                                                <li class="list-inline-item me-2 py-2">
                                                    <h6 class="mb-0 f-bold text-grey"><i class="bi bi-tag me-1 txb-color"></i>
                                                        PKR: {{ convertCurrency($item->price) }}</h6>
                                                </li>
                                                <li class="list-inline-item ms-auto">
                                                    <a href="tel:{{$item->phone_num}}"
                                                        class="px-3 d-inline-flex f-medium text-decoration-none
                                                        align-items-center justify-content-center contact-lnk">
                                                        <i class="bi bi-telephone"></i>
                                                    </a>
                                                </li>
                                                <li class="py-2 list-inline-item">
                                                    <a href="{{ route('view-property',['ptype' => $item->propertyType, 'stype' => $item->purpose,'city' => $item->city_name,'id' => $item->id,'slug' => $item->slug]) }}"
                                                        class="px-3 d-inline-flex text-white f-medium text-decoration-none bg-theme
                                                        align-items-center justify-content-center">
                                                        More Info <i class="bi bi-arrow-right ms-2"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-md-none d-block mb-4 w-100 swiper-featured">
                        <div class="card">
                            <a href="{{ route('view-property',['ptype' => $item->propertyType, 'stype' => $item->purpose,'city' => $item->city_name,'id' => $item->id,'slug' => $item->slug]) }}" class="d-block position-relative overflow-hidden listing-badges">
                                <img class="prop-banner img-fluid" src="{{asset('properties/gallery/'.$item->image)}}" class="card-img-top"
                                alt="{{ $item->name }}">
                                <span class="featured text-white">Featured</span>
                                <div class="gallery-media-bar w-100 position-absolute">
                                    <ul class="w-fit-content mt-3 ms-auto me-3 mb-0 list-inline px-3 text-white py-1 black-rgb">
                                        <li class="d-inline-flex align-items-center  me-3 f-medium">
                                            <i class="bi bi-camera-video f-17"></i>
                                        </li>
                                        <li class="d-inline-flex align-items-center f-medium">
                                            <i class="bi bi-image me-1 f-17"></i> 1/{{globalC::countGallery($item->id)}}
                                        </li>
                                    </ul>
                                </div>
                            </a>
                            <div class="card-body p-0 border-top-grey">
                                <div class="card-content-wrap">
                                    <h5 class="f-bold tx-color px-3 pt-3 mb-0">{{ $item->name }}</h5>
                                    <div class="card-text mb-0 px-3 mt-3 clearfix">
                                        <div class="float-start">
                                            <i class="bi bi-geo-alt text-danger"></i> {{ $item->city_name ? $item->city_name : '' }}
                                        </div>
                                        <div class="float-end">
                                            <i class="bi bi-tag"></i> PKR  {{ convertCurrency($item->price) }}
                                        </div>
                                    </div>
                                    <div class="card-prop-detail px-3">
                                        <ul class="list-unstyled mb-0 d-flex align-items-center flex-wrap">
                                            <li class="mt-4 col-lg-4 col-6 align-self-center f-normal">
                                                <img src="{{ asset('images/svg/selection.svg') }}" alt="area"
                                                height="20px" class="me-2" />
                                                {{ $item->size }}  {{ $item->area }}
                                            </li>
                                            @if($item->bedroom > 0)
                                            <li class="mt-4 col-lg-4 col-6 align-self-center f-normal">
                                                <img src="{{ asset('images/svg/bed.svg') }}" alt="bed" height="20px"
                                                    class="me-2" />
                                                {{ $item->bedroom }} Beds
                                            </li>
                                            @endif
                                            @if($item->bath > 0)
                                            <li class="mt-4 col-lg-4 col-6 align-self-center f-normal">
                                                <img src="{{ asset('images/svg/bath-tub.svg') }}" alt="bath"
                                                    height="20px" class="me-2" />
                                                {{ $item->bath }} Bath
                                            </li>
                                            @endif
                                            @if($item->garage > 0)
                                            <li class="mt-4 col-lg-4 col-6 align-self-center f-normal">
                                                <img src="{{ asset('images/svg/garage.svg') }}" alt="garage"
                                                    height="20px" class="me-2" />
                                                {{ $item->garage }} Garage
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="view-detail-btn mt-4 border-top-grey">
                                    <a href="{{ route('view-property',['ptype' => $item->propertyType, 'stype' => $item->purpose,'city' => $item->city_name,'id' => $item->id,'slug' => $item->slug]) }}">
                                    <button class="border-0 bg-theme text-white w-100 f-medium">View Details</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @php($k++)

                @endif
            @endforeach
        @else
            <div class="no-record-found">
                <p class="mb-0">No <span class="txb-color f-bold">Other Property</span>  Found</p>
            </div>
        @endif
    </div>
    {{--@if ($properties->count())
        <div class="mt-5 w-fit-content mx-auto">
            {{ $properties->onEachSide(1)->links() }}
        </div>
    @endif--}}
    @if ($other_count > 6)
        <div class="text-center mt-5 col-12">
            <a class="d-inline-flex align-items-center view-all-btn text-decoration-none" href="{{route('search-filter-property')}}?searchType=<?php echo $searchType?>&searchTypeTwo=<?php echo $searchTypeTwo?>&searchTypeThree=<?php echo $searchTypeThree?>&city=<?php echo $city?>">
                <span class="me-3">View All Property</span><i class="bi bi-arrow-right"></i>
            </a>
        </div>
    @endif
</div>