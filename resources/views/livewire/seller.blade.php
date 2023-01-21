<div>
    <div>
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
    <form class="row" id="private_seller">
        <div class="col-lg-6 mb-27">
            <div class="log-input-div d-flex align-items-center px-3">
                <i class="bi bi-people"></i>
                <input type="text" wire:model="full_name" placeholder="Full name" value=""><br>
            </div>
            @error('full_name') <span
            class="text-danger error text-right">{{ $message }}</span>@enderror
        </div>


        <div class="col-lg-6 mb-27">
            <div class="log-input-div d-flex align-items-center px-3">
                <img src="{{ asset('images/@-icon.png') }}" class="img-fluid" />
                <input required type="email" placeholder="Email" wire:model="email" value=""><br>
            </div>
            @error('email') <span class="text-danger error text-right">{{ $message }}</span>@enderror

        </div>

        <div class="col-lg-6 mb-27">
            <div class="log-input-div d-flex align-items-center px-3">
                <img src="{{ asset('images/lock-icon.png') }}" class="img-fluid" />
                <input required type="password" wire:model="password" placeholder="Password"
                    value=""><br>
            </div>
            @error('password') <span
            class="text-danger error text-right">{{ $message }}</span>@enderror
        </div>


        <div class="col-lg-6 mb-27">
            <div class="log-input-div d-flex align-items-center px-3">
                <img src="{{ asset('images/lock-icon.png') }}" class="img-fluid" />
                <input required type="password" wire:model="password_confirmation"
                    placeholder="Confirm Password" value=""><br>
            </div>
            @error('password_confirmation') <span
            class="text-danger error text-right">{{ $message }}</span>@enderror
        </div>

        {{-- <input type="hidden"   wire:model="role_seller_id" /> --}}
        <div class="col-lg-12">
            <button type="submit" class="text-white log-btn w-100"
                wire:click.prevent="store">Sign up
                <span wire:target="store"
                    wire:loading.class="spinner-border spinner-border-sm"></span>

            </button>
        </div>
    </form>
</div>
