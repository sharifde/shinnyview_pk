<div>
    <form>
        <section class="log-sign-sec-mar">
            <div class="row log-sign-div d-flex bg-white">
                <div class="col-md-5 log-sign-clip-div"
                    style="background: url({{ asset('images/banner2x.webp') }}) center center / cover white; height: 476px;">
                    <h1>Forgot</h1>
                    <div class="log-line position-relative"></div>
                </div>
                <div class="log-sign-input-div position-relative bg-white p-0 col-md-7 d-flex align-items-center justify-content-center">
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
                        <div class="col-12 log-input-div d-flex align-items-center px-3 mb-27">
                            <img src="{{ asset('images/@-icon.png') }}" class="img-fluid" />
                            <input type="text" class="form-control form-bor text-right" placeholder="Email"
                                wire:model="email" aria-label="Email">
                        </div>
                        @error('email') <span class="text-danger error text-right">{{ $message }}</span>@enderror
                        <button type="submit" class="text-white log-btn w-100 mb-3" wire:click.prevent="submit">
                            Submit<span
                            wire:target="submit" wire:loading.class="spinner-border spinner-border-sm"></span></button>
						<p class="position-absolute ps-2">Not a member ? <a href="{{ route('login') }}"><b style="color: #0C0741">Login or Signup here</b></a></p>

                    </div>
                </div>
            </div>
        </section>
    </form>

</div>
