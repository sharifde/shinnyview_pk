@php
    $route = Route::getCurrentRoute()->getName();
@endphp
<aside class="bg-theme-dark">
    <div class="px-3">
        <a href="{{ route('home') }}"><img src="{{ asset('images/whitelogo.png') }}" class="img-fluid" style="height:50px"
                alt="shinnyview" /></a>
    </div>
    <div class="px-3 mt-4 profile-user-info border-bottom-rgb pb-4">
        <div class="d-flex align-items-center">
            <div>
                <img src="{{ asset('images/testimonial/t3.png') }}" width="40px" height="40px" alt="username"
                    class="rounded-circle me-2" />
            </div>
            <div>
                <h5 class="text-white mb-1">{{ Auth::user()->name }}</h5>
                <p class="text-white mb-0">Admin</p>
            </div>
        </div>
    </div>
    <nav class="mt-3 profile-user-info">
        <ul class="mx-0 list-unstyled pb-2 border-bottom-rgb">
            <li class="mb-2">
                <a href="{{ route('admin.dashboard') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3">
                    <i class="bi bi-columns-gap me-3"></i> Dashboard
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('change-password') }}"
                    class="@if ($route == 'change-password') active @endif text-white text-decoration-none d-flex align-items-center px-3">
                    <i class="bi bi-key me-3"></i> Change Password
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('home') }}" class="text-white text-decoration-none d-flex align-items-center px-3">
                    <i class="bi bi-columns-gap me-3"></i> Home Website
                </a>
            </li>
            <?php
            $total_agents = DB::table('users')
                ->where('role_id', 2)
                ->count();
            $total_private_seller = DB::table('users')
                ->where('role_type', 'Private Seller')
                ->count();
            $total_properties = DB::table('properties')->count();
            ?>
            <li class="mb-2">
                <a href="{{ route('add.user') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3 @if ($route == 'add.user') active @endif">
                    <i class="bi bi-building me-3"></i> Add New Agent
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('user.agent') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3 @if ($route == 'user.agent') active @endif">
                    <i class="bi bi-building me-3"></i> All Agents ({{ $total_agents }})
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('package.request') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3 @if ($route == 'package.request') active @endif">
                    <i class="bi bi-building me-3"></i> Agent Package List &nbsp;(<sub class="text-danger">New</sub>)
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('admin.properties') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3 @if ($route == 'admin.properties') active @endif">
                    <i class="bi bi-building me-3"></i> All Properties ({{ $total_properties }})
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('user.private') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3 @if ($route == 'user.private') active @endif">
                    <i class="bi bi-building me-3"></i> All Private Seller ({{ $total_private_seller }})
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('application.investment') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3 @if ($route == 'application.investment') active @endif">
                    <i class="bi bi-building me-3"></i> Application form for <br> Investment
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('application.house') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3 @if ($route == 'application.house') active @endif">
                    <i class="bi bi-building me-3"></i> Application form for House & Plots
                </a>
            </li>
        </ul>
        {{-- projects --}}
        <ul class="mx-0 list-unstyled pb-2 border-bottom-rgb">
            <li class="mb-2">
                <a href="{{ route('admin.new.project') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3 @if ($route == 'admin.new.project') active @endif">
                    <i class="bi bi-bookmark-plus me-3"></i> Add New Project
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('admin.projects.list') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3 @if ($route == 'admin.projects.list') active @endif">
                    <i class="bi bi-bookmark-check me-3"></i> Projects List
                </a>
            </li>
        </ul>
        {{-- Advertisment --}}
        <ul class="mx-0 list-unstyled pb-2 border-bottom-rgb">
            <li class="mb-2">
                <a href="{{ route('new.advertisment') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3 @if ($route == 'new.advertisment') active @endif">
                    <i class="bi bi-file-fill me-3"></i> Add New Advertisment
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('admin.advertisment.list') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3 @if ($route == 'admin.advertisment.list') active @endif">
                    <i class="bi bi-file-plus-fill me-3"></i> Advertisment List
                </a>
            </li>
        </ul>
        {{-- prime dealers --}}
        <ul class="mx-0 list-unstyled pb-2 border-bottom-rgb">
            <li class="mb-2">
                <a href="{{ route('new.prime.dealer') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3 @if ($route == 'new.prime.dealer') active @endif">
                    <i class="bi bi-person-plus-fill me-3"></i> Add New Prime Dealer
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('admin.dealers.list') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3 @if ($route == 'admin.dealers.list') active @endif">
                    <i class="bi bi-person-fill me-3"></i> Prime Dealers List
                </a>
            </li>
        </ul>
        {{-- advert plan --}}
        <ul class="mx-0 list-unstyled pb-2 border-bottom-rgb">
            <li class="mb-2">
                <a href="{{ route('advert-plan') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3">
                    <i class="bi bi-bookmarks-fill me-3"></i> Add Advert Plans
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('advert.plan.list') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3">
                    <i class="bi bi-bookmarks-fill me-3"></i> Advert Plans List
                </a>
            </li>
        </ul>
        {{-- Package plan --}}
        <ul class="mx-0 list-unstyled pb-2 border-bottom-rgb">
            <li class="mb-2">
                <a href="{{ route('add.package.plan') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3">
                    <i class="bi bi-bookmarks-fill me-3"></i> Add Package Plans
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('package.plan.list') }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3">
                    <i class="bi bi-bookmarks-fill me-3"></i> Package Plans List
                </a>
            </li>
        </ul>
        {{-- email and number --}}
        <ul class="mx-0 list-unstyled pb-2 border-bottom-rgb">
            <li class="mb-2">
                <a href="tel:{{ Auth::user()->number }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3">
                    <i class="bi bi-telephone me-3"></i> {{ Auth::user()->number }}
                </a>
            </li>
            <li class="mb-2">
                <a href="mailto: {{ Auth::user()->email }}"
                    class="text-white text-decoration-none d-flex align-items-center px-3">
                    <i class="bi bi-envelope me-3"></i> {{ Auth::user()->email }}
                </a>
            </li>
        </ul>

    </nav>
</aside>
