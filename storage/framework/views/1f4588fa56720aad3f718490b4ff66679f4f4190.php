<div class="bg-theme py-2 px-4 topbar-header">
    <ul class="list-unstyled d-flex mb-0 align-items-center">
        <li class='text-white f-medium'>
            <!-- Current page name -->
            Dashboard
            
        </li>
        <li class='text-white f-medium' style="padding-left: 25px; color: #1b1a2f !important;">
            Contact Helpline Support
            <a href="tel:0330-6969698" class="text-decoration-none dash-contact">
                <p class="mt-3 mb-0">
                    
                    (+92 330 6969698)
                </p>
            </a>
        </li>
        <li class="ms-auto me-4">
            <a class="bg-theme-dark link-btn text-white
                text-decoration-none f-medium d-flex align-items-center
                justify-content-center" href="<?php echo e(route('create_property')); ?>">
                <i class="bi bi-plus me-2"></i> Add Property
            </a>
        </li>
        <li>
            <div class="dropdown">
                <button class="bg-none bg-transparent border-0" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                   <img src="<?php echo e(asset('images/testimonial/t3.png')); ?>"
                    width="35px" height="35px" alt="username" class="rounded-circle border" />
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item text-grey" href="<?php echo e(route('contact.us')); ?>"><i class="bi bi-person-circle me-2"></i> Support</a>
                    <a class="dropdown-item text-grey" href="<?php echo e(route('logout')); ?>"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
                </div>
            </div>
        </li>
    </ul>
</div><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/agent/components/top_bar.blade.php ENDPATH**/ ?>