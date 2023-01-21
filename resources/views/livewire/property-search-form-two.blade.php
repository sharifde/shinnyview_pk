 {{-- <form class="w-100"  wire:submit.prevent="searchProperties">
    <div class="w-100">
        <div class="bg-theme-dark filter-header py-2 px-3">
            <h6 class="m-0 text-center text-white f-medium">Find New Property</h6>
        </div>
        <div class="filter-body py-4 px-3">
            <div class="search-bar position-relative in-group-field">
                <x-fields.select2 url="{{ route('property.cities') }}"
                value="{{ $city }}" selectedOption="{{ $cityName }}"
                name="city" placeholder="Search or Select City" class="w-100"/>
                <input type="text" class="w-100" placeholder="City" wire:model.defer="search" />
                <i class="bi bi-search position-absolute"></i>
            </div>
            <div class="col-12 mt-3">
                <div class="search-bar position-relative in-group-field">
                    <select class="w-100" wire:model.defer='propertyType'>
                        <option value="" selected>Property Type</option>
                        <option value="1">House </option>
                        <option value="2">Commerical </option>
                        <option value="3">Plot </option>
                    </select>
                    <i class="bi bi-sort-down-alt position-absolute"></i>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mt-3">
                    <div>
                        <div class="search-bar position-relative in-group-field">
                            <input type="number" class="w-100" placeholder="Min Price" minlength="3" wire:model.defer="minPrice"
                                 />
                            <i class="bi bi-tag position-absolute"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-3">
                    <div>
                        <div class="search-bar position-relative in-group-field">
                            <input type="number" class="w-100" placeholder="Max Price" minlength="3" wire:model.defer="maxPrice"
                                 />
                            <i class="bi bi-tag position-absolute"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 mt-3">
                    <div class="search-bar position-relative in-group-field">
                        <select class="w-100" wire:model.defer="bedRooms">
                            <option value="" selected disabled>Min Bed</option>
                            <option value="1">1 Bed</option>
                            <option value="2">2 Bed</option>
                            <option value="3">3 Bed</option>
                            <option value="4">4 Bed</option>
                            <option value="5">5 Bed</option>
                            <option value="6">6 Bed</option>
                            <option value="7">7 Bed</option>
                            <option value="8">8 Bed</option>
                            <option value="9">9 Bed</option>
                            <option value="10">10 Bed</option>
                        </select>
                        <img src="{{ asset('images/svg/bed.svg') }}" alt="bed" class="position-absolute"
                        width="20px" class="me-1" />
                    </div>
                </div>
                <div class="col-lg-6 col-12 mt-3">
                    <div class="search-bar position-relative in-group-field">
                        <select class="w-100" wire:model.defer="bathRooms">
                            <option value="" selected disabled>Min Bath</option>
                            <option value="1">1 Bath</option>
                            <option value="2">2 Bath</option>
                            <option value="3">3 Bath</option>
                            <option value="4">4 Bath</option>
                            <option value="5">5 Bath</option>
                            <option value="6">6 Bath</option>
                            <option value="7">7 Bath</option>
                            <option value="8">8 Bath</option>
                            <option value="9">9 Bath</option>
                            <option value="10">10 Bath</option>
                        </select>
                        <img src="{{ asset('images/svg/bed.svg') }}" alt="Bath" class="position-absolute"
                        width="20px" class="me-1" />
                    </div>
                </div>
                <label class="mt-3 f-medium">Area</label>
                <div class="col-lg-6 mt-2">
                    <div>
                        <div class="search-bar position-relative in-group-field">
                            <input type="text" class="w-100" placeholder="Min Area" minlength="1" wire:model.defer='minArea'
                                name="minArea"  />
                            <i class="bi bi-arrows-angle-expand position-absolute"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-2">
                    <div>
                        <div class="search-bar position-relative in-group-field">
                            <input type="text" class="w-100" placeholder="Max Area" minlength="1" wire:model.defer='maxArea'
                                name="maxArea"  />
                            <i class="bi bi-arrows-angle-contract position-absolute"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <button class="w-100 bg-theme text-white border-0 text-capitalize">Total {{$property_count}} properties
                        <span wire:target="searchProperties" wire:loading.class="spinner-border spinner-border-sm"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form> --}}

<form class="w-100 px-4"  wire:submit.prevent="searchProperties">
    <div class="w-100">
        <div class="filter-body py-4 px-3 row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="search-bar position-relative in-group-field">
                    <x-fields.select2 url="{{ route('property.cities') }}" value="{{ $city }}" selectedOption="{{ $cityName }}"
                    name="city" placeholder="Search or Select City" class="w-100"/>
                    {{-- <input type="text" class="w-100" placeholder="City" wire:model.defer="search" /> --}}
                    {{-- <i class="bi bi-search position-absolute"></i> --}}
                    {{-- <x-fields.select2 url="{{ route('property.cities') }}" value="{{ $city }}" selectedOption="{{ $cityName }}" name="city" placeholder="Search or Select City" class="w-100"/>
                    {{-- <input type="text" class="w-100" placeholder="City" wire:model.defer="search" />
                    <i class="bi bi-search position-absolute"></i> --}}
                </div>
                <div class="row">
                    {{-- Numbers of baths and beds --}}
                    <div class="mt-3 col-md-6">
                        <div class="search-bar position-relative in-group-field">
                            <select class="w-100" wire:model.defer="bedRooms">
                                <option value="" selected disabled>Bed</option>
                                <option value="1">1 Bed</option>
                                <option value="2">2 Bed</option>
                                <option value="3">3 Bed</option>
                                <option value="4">4 Bed</option>
                                <option value="5">5 Bed</option>
                                <option value="6">6 Bed</option>
                                <option value="7">7 Bed</option>
                                <option value="8">8 Bed</option>
                                <option value="9">9 Bed</option>
                                <option value="10">10 Bed</option>
                            </select>
                            <img src="{{ asset('images/svg/bed.svg') }}" alt="bed" class="position-absolute"
                            width="20px" class="me-1" />
                        </div>
                    </div>
                    <div class="mt-3 col-md-6">
                        <div class="search-bar position-relative in-group-field">
                            <select class="w-100" wire:model.defer="bathRooms">
                                <option value="" selected disabled>Bath</option>
                                <option value="1">1 Bath</option>
                                <option value="2">2 Bath</option>
                                <option value="3">3 Bath</option>
                                <option value="4">4 Bath</option>
                                <option value="5">5 Bath</option>
                                <option value="6">6 Bath</option>
                                <option value="7">7 Bath</option>
                                <option value="8">8 Bath</option>
                                <option value="9">9 Bath</option>
                                <option value="10">10 Bath</option>
                            </select>
                            <img src="{{ asset('images/svg/bed.svg') }}" alt="Bath" class="position-absolute"
                            width="20px" class="me-1" />
                        </div>
                    </div>
                    
                    {{-- Button --}}
                    {{-- <div class="mt-3 col-12">
                        <button class="w-100 bg-theme text-white border-0 text-capitalize">Total {{$property_count}} properties
                            <span wire:target="searchProperties" wire:loading.class="spinner-border spinner-border-sm"></span>
                        </button>
                    </div> --}}
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="row">
                    {{-- Property Type --}}
                    <div class="col-12">
                        <div class="search-bar position-relative in-group-field">
                            <select class="w-100" wire:model.defer='propertyType'>
                                <option value="" selected>Property Type</option>
                                <option value="1">House </option>
                                <option value="2">Commerical</option>
                                <option value="3">Plot</option>
                            </select>
                            <i class="bi bi-sort-down-alt position-absolute"></i>
                        </div>
                    </div>
                    {{-- Min Max Price --}}
                    <div class="col-md-6 mt-3">
                        <div class="search-bar position-relative in-group-field">
                            <input type="number" class="w-100" placeholder="Min Price" minlength="3" wire:model.defer="minPrice"
                            />
                            <i class="bi bi-tag position-absolute"></i>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="search-bar position-relative in-group-field">
                            <input type="number" class="w-100" placeholder="Max Price" minlength="3" wire:model.defer="maxPrice"
                            />
                            <i class="bi bi-tag position-absolute"></i>
                        </div>
                    </div>
                </div>
            </div>
            
                {{-- Button --}}
                <div class="col-md-6 mt-3" style="text-align: center;">
                    <button class="bg-theme text-white border-0 text-capitalize" style="width: 50%; margin: auto;">Total {{$property_count}} properties
                        <span wire:target="searchProperties" wire:loading.class="spinner-border spinner-border-sm"></span>
                    </button>
                </div>
                
        </div>
    </div>
</form>