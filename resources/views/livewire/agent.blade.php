<div>
    <form class="row" id="dealership">
        <div class="col-lg-6 mb-27">
            <div class="log-input-div d-flex align-items-center px-3">
                <i class="bi bi-person-fill text-grey"></i>
                <input type="text" wire:model="full_name" placeholder="Full name" value=""><br>
            </div>
            @error('full_name') <span class="text-danger error text-right">{{ $message }}</span>@enderror
        </div>
        <div class="col-lg-6 mb-27">
            <div class="log-input-div d-flex align-items-center px-3">
                <i class="bi bi-building text-grey"></i>
                <input type="text" wire:model="company_name" placeholder="Company name" value=""><br>
            </div>
            @error('company_name') <span
            class="text-danger error text-right">{{ $message }}</span>@enderror
        </div>
        <div class="col-lg-6 mb-27">
            <div class="log-input-div d-flex align-items-center px-3">
                <i class="bi bi-telephone-fill text-grey"></i>
                <input type="number" wire:model="company_phone_number" placeholder="Company phone number" value=""><br>
            </div>
            @error('company_phone_number') <span
            class="text-danger error text-right">{{ $message }}</span>@enderror
        </div>
        <div class="col-lg-6 mb-27">
            <div class="log-input-div d-flex align-items-center px-3">
                <img src="{{ asset('images/@-icon.png') }}" class="img-fluid" />
                <input type="email" wire:model="email" placeholder="Business email" value=""><br>
            </div>
            @error('email') <span
            class="text-danger error text-right">{{ $message }}</span>@enderror
        </div>
        <div class="col-lg-6 mb-27">
            <div class="log-input-div d-flex align-items-center px-3">
                <i class="bi bi-phone-fill text-grey"></i>
                <input type="number" wire:model="phone_number" placeholder="Phone number" value=""><br>
            </div>
            @error('phone_number') <span
            class="text-danger error text-right">{{ $message }}</span>@enderror
        </div>
        <div class="col-6">
            <div class="log-input-div d-flex align-items-center px-3">
                <i class="bi bi-geo-alt-fill text-grey"></i>
                <input type="text" wire:model="address" placeholder="Business address" value=""><br>
            </div>
            @error('address') <span
            class="text-danger error text-right">{{ $message }}</span>@enderror
        </div>
        <div class="col-lg-6 mb-27">
            <div class="log-input-div d-flex align-items-center px-3">
                <img src="{{ asset('images/lock-icon.png') }}" class="img-fluid" />
                <input type="password" wire:model="password" placeholder="Password" value=""><br>
            </div>
            @error('password') <span
            class="text-danger error text-right">{{ $message }}</span>@enderror
        </div>
        <div class="col-lg-6 mb-27">
            <div class="log-input-div d-flex align-items-center px-3">
                <img src="{{ asset('images/lock-icon.png') }}" class="img-fluid" />
                <input type="password" wire:model="password_confirmation" placeholder="Confirm Password"
                value=""><br>
            </div>
            @error('password_confirmation') <span
            class="text-danger error text-right">{{ $message }}</span>@enderror
        </div>
        <div class="col-12 mb-27">
            <div class="px-3">
                <label class="mt-0 mb-2 f-medium">Are you owner?</label>
            </div>
            <div class="log-input-div d-flex align-items-center px-3">
                <i class="bi bi-person-badge text-grey"></i>
                <select required class="w-100 border-0"  wire:model="are_you_owner">
                    <option selected disabled>
                        --Select--
                    </option>
                    <option value="owner/partner">
                        Owner/partner
                    </option>
                    <option value="director">
                        Director
                    </option>
                    <option value="Branch manager">
                        Branch Manager
                    </option>
                </select><br>
            </div>
        </div>
        @error('are_you_owner') <span
        class="text-danger error text-right">{{ $message }}</span>@enderror
        <div class="col-lg-6 mb-27 mb-4 pb-2">
            <div class="px-3">
                <label class="mt-0 mb-2 f-medium">Dealer ship</label>
            </div>
            <div class="px-3 row">
                <div class="form-group-checkbox  col-4 col-lg-6 mb-27">
                    <input type="checkbox" id="Houses"   value="Houses" wire:model="dealer_ship">
                    <label for="Houses">Houses</label>
                </div>
                <div class="form-group-checkbox col-4 col-lg-6 mb-27" >
                    <input type="checkbox" value="Comerial" id="Comerial" wire:model="dealer_ship">
                    <label for="Comerial">Comerial</label>
                </div>
                <div class="form-group-checkbox col-4 col-lg-6 mb-27" >
                    <input type="checkbox" value="Land/plo" id="land_plot" wire:model="dealer_ship">
                    <label for="land_plot">Land/plot</label>
                </div>
                <div class="form-group-checkbox col-4 col-lg-6 mb-27">
                    <input type="checkbox" value="Builder" id="builder"  wire:model="dealer_ship">
                    <label for="builder">Builder</label>
                </div>
            </div>
        </div>
        @error('dealer_ship') <span
        class="text-danger error text-right">{{ $message }}</span>@enderror
        <div class="col-lg-6 mb-27 mb-4 pb-2">
            <div class="px-3">
                <label class="mt-0 mb-2 f-medium">Dealer ship type</label>
            </div>
            <div class="px-3 row">
                <div class="form-group-checkbox  col-4 col-lg-6 mb-27">
                    <input type="checkbox" value="Rent" id="Rent" wire:model="dealer_ship_type">
                    <label for="Rent">Rent</label>
                </div>
                <div class="form-group-checkbox col-4 col-lg-6 mb-27" >
                    <input type="checkbox" value="Sell" id="Sell" wire:model="dealer_ship_type">
                    <label for="Sell">Sell</label>
                </div>
            </div>
        </div>
        @error('dealer_ship_type') <span
        class="text-danger error text-right">{{ $message }}</span>@enderror
        <div class="col-lg-12">
            <button type="submit" class="text-white log-btn w-100" wire:click.prevent="store">Sign up
                <span wire:target="store" wire:loading.class="spinner-border spinner-border-sm"></span>
            </button>

        </div>
    </form>
</div>
