<!-- news letter -->
{{-- <div class="news-letter">
    <div class="container">
      <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12"> --}}
            <form class="row align-items-center" id="form_suscribe">
                <div class="title">News Letter</div>
                <div class="sub-title">Sign up for our newsletter to get up-to-date from us</div>
                <div class="l-sub b-shadow">
                    {{-- <input type="text" placeholder="Enter Your Email Address"> --}}
                    <input type="email" wire:model="email" placeholder="Enter Your Email Address" required />
                    @error('email') <span class="text-danger error text-right">{{ $message }}</span>@enderror



                    <div class="d-btn">
                    {{-- <button class="btn">Subscribe</button> --}}
                    <button type="submit" class="btn" wire:click.prevent="submit">Subscribe
                        <span wire:target="submit" wire:loading.class="spinner-border spinner-border-sm"></span>
                    </button>

                    </div>
                </div>
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="btm-txt">we won't spam you or share your email address with public</div>
            </form>
        {{-- </div>

      </div>
    </div>
  </div> --}}



{{-- 






<div>
        <div class="text-center mail-icon-wrap d-flex align-items-center justify-content-center mx-auto">
            <i class="bi bi-envelope text-white"></i>
        </div>
        <div class="bg-theme py-5">
            <div class="container">
                <form class="row align-items-center" id="form_suscribe">
                    <div class="col-lg-5 col-xl-6 mb-4 mb-lg-0">
                        <div class="newletter-caption">
                            <h5 class="f-bold text-uppercase mb-2 f-alpha">News letter</h5>
                            <p class="mb-0 f-medium">Sign up for our newsletter to get up-to-date from us</p>
                        </div>
                    </div>
                    <div class="col-lg-7 col-xl-6">
                        <div class="newletter-caption position-relative">
                            <input type="email" wire:model="email" class="w-100 border-0" placeholder="Enter your email" required />
                            @error('email') <span class="text-danger error text-right">{{ $message }}</span>@enderror

                            <div class="submit-newsletter-btn position-absolute">
                                <button type="submit" class="text-uppercase border-0 bg-theme-dark text-white" wire:click.prevent="submit">subscribe

                                    <span
                            wire:target="submit" wire:loading.class="spinner-border spinner-border-sm"></span>
                                </button>
                            </div>
                            @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}