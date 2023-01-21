<div class="bg-theme py-2 px-4 topbar-header">
    <ul class="list-unstyled d-flex mb-0 align-items-center">
        <li class='text-white f-medium'>
            <!-- Current page name -->
            {{(isset($topbar)) ? $topbar : ''}}
        </li>
        <li class="ms-auto me-4">
            {{-- <a class="bg-theme-dark link-btn text-white
                text-decoration-none f-medium d-flex align-items-center
                justify-content-center" href="#">
                <i class="bi bi-plus me-2"></i> Add Property
            </a> --}}
        </li>
        <li>
            <div class="dropdown">
                <button class="bg-none bg-transparent border-0" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                   <img src="{{asset('images/testimonial/t3.png')}}"
                    width="35px" height="35px" alt="username" class="rounded-circle border" />
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item text-grey" href="{{route('logout')}}"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
                </div>
            </div>
        </li>
    </ul>
</div>