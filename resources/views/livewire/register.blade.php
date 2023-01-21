<div>
    <section class="log-sign-sec-mar">
        <div class="row log-sign-div d-flex">
            <div class="col-md-5 log-sign-clip-div"
                style="background: url({{ asset('images/banner2.webp') }}) center center / cover white;min-height: 476px;">
                <h1>Register</h1>
                <p class="position-absolute ps-2">Have already an Account? <a href="{{ route('login') }}">Login here</a>
                </p>
                <div class="log-line position-relative"></div>
            </div>
            <div
                class="log-sign-input-div position-relative bg-white px-0 py-5 col-md-7 d-flex align-items-center justify-content-center">
                {{-- <livewire:user-is-active :active="$active"/> --}}

                <div class="col-md-8 mx-auto col-12 px-4 px-md-0">
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
                    {{-- <ul class="col-12 list-unstyled row mb-0 ps-3">
                        <li class="custom_radio col-md-6">
                            <input type="radio" wire:click="seller" id="featured-1" data-type="private_seller"
                                name="featured">
                            <label for="featured-1">Signup as Private Seller</label>
                        </li>
                        <li class="custom_radio col-md-6 px-4">
                            <input type="radio" id="featured-2" data-type="dealership" wire:click="agent"
                                name="featured">
                            <label for="featured-2">Signup as Dealer</label>
                        </li>
                    </ul> --}}
                    <livewire:seller />
                    {{-- @if ($sellerFormVisible)
                        <livewire:seller />
                    @endif --}}
                    {{-- @if ($agentFormVisible)
                        <livewire:agent />
                    @endif --}}

                </div>
            </div>
        </div>
    </section>
</div>

