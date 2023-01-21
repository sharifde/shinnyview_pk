<div>
    <div class="search-form-header bg-theme-dark">
        <h3 class="mb-0 text-white px-md-4 px-3 py-3 text-center f-medium">Search properties anywhere in Pakistan
            {{-- <span class="txb-color">{{ $total_properties }}</span> --}}
        </h3>
    </div>
    <form class="w-100 mb-0" action="{{ url('/search-property') }}" method="get" >
        <ul class="list-unstyled d-flex row mb-3 mx-0 list-tabs">
            <li class="col text-center px-0">
                <label class="w-100">
                    <input type="radio" checked="checked" class="d-none" value="1" wire:model="searchType" name="searchType" />
                    <div class="tab-trigger py-2 w-100 px-3">For Sale</span>
                </label>
            </li>
            <li class="col text-center px-0">
                <label class="w-100">
                    <input type="radio" class="d-none" wire:model="searchType" value="2" name="searchType" />
                    <div class="tab-trigger py-2 w-100 px-3">To Rent</span>
                </label>
            </li>
            <li class="col text-center no-right px-0">
                <label class="w-100">
                    <input type="radio" class="d-none" wire:model="searchType" value="3" name="searchType" />
                    <div class="tab-trigger py-2 w-100 px-3">Lease</span>
                </label>
            </li>
        </ul>
        <div class="px-3">
            <div class="search-form-bar position-relative mb-3">
                <x-fields.select2 url="{{ route('property.cities') }}" value="{{ $city }}" selectedOption="{{ $city }}" name="city" placeholder="Search or Select City" class="w-100" required/>
                {{-- <input type="text" minlength="3" required class="w-100" wire:model="search" name="search"
                    placeholder="e.g Islamabad, Rawalpindi, Lahore, Karachi,Quetta" /> --}}
            </div>
            <div class="row">
                <div class="search-form-fields col-md-6 mb-3">
                    <label class="f-medium">Min Price</label>
                    <input type="number" class="w-100" minlength="2"  wire:model="minPrice" name="minPrice" />
                </div>
                <div class="search-form-fields col-md-6 mb-3">
                    <label class="f-medium">Max Price</label>
                    <input type="number" class="w-100" minlength="2"  wire:model="maxPrice" name="maxPrice"/>
                </div>
                <div class="search-form-fields col-md-6 mb-3">
                    <label class="f-medium">Property Type</label>
                    <select class="w-100" wire:model='propertyType' name="propertyType">
                        <option selected value="">Show All</option>
                        <option value="1">House</option>
                        <option value="2">Commercial</option>
                        <option value="3">Plot</option>
                    </select>
                </div>
                <div class="search-form-fields col-md-6 mb-4">
                    <label class="f-medium">Bed Rooms</label>
                    <input type="number" class="w-100" placeholder="+1"  wire:model="bedRooms" name="bedRooms"/>
                </div>
                <div class="d-flex flex-wrap align-items-center mb-4">
                    <div class="form-submit-btn flex-1 me-md-5 me-2">
                        <button type="submit" class="border-0 f-medium rounded-btn w-100 px-4 py-2 bg-theme-rgb text-white">
                            {{-- Search {{ $property_count }} Properties --}}
                            Search Properties
                        </button>
                    </div>
                    <div class="ms-auto form-clear-btn">
                        <button type="button" wire:click="resetForm()" class="border-0 f-medium bg-transparent txb-color" id="clear_form_data">
                            <i class="bi bi-arrow-counterclockwise"></i> Clear All
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>