@php
    $route = Route::getCurrentRoute()->getName();
@endphp
<aside class="bg-theme-dark">
    <div class="px-3">
        <a href="{{ route('home') }}"><img src="{{ asset('images/whitelogo.png') }}" style="height: 50px"
                class="img-fluid" alt="shinnyview" /></a>
    </div>
    <div class="px-3 mt-4 profile-user-info border-bottom-rgb pb-4">
        <div class="d-flex align-items-center">
            <div>
                <img src="{{ asset('images/testimonial/t3.png') }}" width="40px" height="40px" alt="username"
                    class="rounded-circle me-2" />
            </div>
            <div>
                <h5 class="text-white mb-1">{{ Auth::user()->name }}</h5>
                <p class="text-white mb-0">{{ Auth::user()->role_type }}</p>
            </div>
        </div>
    </div>
    <nav class="mt-3 profile-user-info">
        <ul class="mx-0 list-unstyled pb-2 border-bottom-rgb">
            <li class="mb-2">
                <a href="{{ route('agent.dashboard') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3">
                    <i class="bi bi-columns-gap me-3"></i> Dashboard
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('home') }}" class="text-white text-decoration-none d-flex align-items-center px-3">
                    <i class="bi bi-house me-3"></i> Home
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('properties') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3 @if ($route == 'properties') active @endif">
                    <i class="bi bi-building me-3"></i> My Properties
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('edit.profile') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3 @if ($route == 'edit.profile') active @endif">
                    <i class="bi bi-person me-3"></i> Update Profile
                </a>
            </li>
        </ul>
        <!-- <ul class="mx-0 list-unstyled pb-2 border-bottom-rgb">
            <li class="mb-2">
                <a href="tel:{{ Auth::user()->number }}" class="text-white text-decoration-none d-flex align-items-center px-3">
                    <i class="bi bi-telephone me-3"></i> {{ Auth::user()->number }}
                </a>
            </li>
            <li class="mb-2">
                <a href="mailto: {{ Auth::user()->email }}" class="text-white text-decoration-none d-flex align-items-center px-3 dash-left-email">
                    <i class="bi bi-envelope me-3"></i> {{ Auth::user()->email }}
                </a>
            </li>
        </ul>-->
        <h6 class="px-3  my-2 txb-color">Advertisement / Packages</h6>
        <ul class="mx-0 list-unstyled pb-2 border-bottom-rgb">
            <li class="mb-2">
                <a href="{{ route('packagebuy') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3">
                    <i class="bi bi-layout-sidebar me-3"></i> Buy Package Plan
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('advertbuy') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3">
                    <i class="bi bi-card-image me-3"></i> Buy Advert Plan
                </a>
            </li>
        </ul>
        <h6 class="px-3  my-2 txb-color">Active Package</h6>
        <?php
        if( Auth::user()->plan_expired_date || Auth::user()->role_type == 'Agent'){

                $data =  DB::table('package_plan')->where('id',Auth::user()->plan_id)->first();
                $to = \Carbon\Carbon::createFromFormat('Y-m-d', Auth::user()->plan_expired_date);
                $from = \Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
                $diff_in_days = $to->diffInDays($from);
        ?>

        <ul class="mx-0 list-unstyled pb-2 border-bottom-rgb">
            <li class="mb-2">
                <a href="{{ route('packages-details') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3">
                    Package Plan <h6 class="px-3  my-2 txb-color">{{ $data->name }}</h4>
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('pricing') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3">

                    @if ($diff_in_days < 0 && Auth::user()->role_type != 'Private Seller')
                        <b style="color: firebrick; margin-top: -10px">{{ 'Your Package is Expired' }}</b>
                    @else
                        <span style="margin-top: -10px">Your Package Expire in <b
                                style="color:forestgreen">{{ ' ' . $diff_in_days }} Days</b></span>
                    @endif
                </a>
            </li>
        </ul>
        <?php 
		}
		elseif(Auth::user()->role_type == 'Private Seller'){
			
			$data =  DB::table('package_plan')->where('name', 'Free')->where('status', 'active')->first();	
		?>
        <ul class="mx-0 list-unstyled pb-2 border-bottom-rgb">
            <li class="mb-2">
                <a href="{{ route('packages-details') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3">
                    Package Plan:<h6 class="px-3  my-2 txb-color"><b
                            style="color:forestgreen">({{ $data->name }})</b></h6>
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('pricing') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3">
                    Valid for<b class="my-2 txb-color">&nbsp;{{ $data->days }}&nbsp; </b> days per Property
                </a>
            </li>
        </ul>
        <?php	
		}
		?>
    </nav>
</aside>
