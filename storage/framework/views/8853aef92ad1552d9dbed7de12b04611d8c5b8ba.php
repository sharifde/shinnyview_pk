<?php
    $route = Route::getCurrentRoute()->getName();
?>
<aside class="bg-theme-dark">
    <div class="px-3">
        <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('images/whitelogo.png')); ?>" class="img-fluid" style="height:50px"
                alt="shinnyview" /></a>
    </div>
    <div class="px-3 mt-4 profile-user-info border-bottom-rgb pb-4">
        <div class="d-flex align-items-center">
            <div>
                <img src="<?php echo e(asset('images/testimonial/t3.png')); ?>" width="40px" height="40px" alt="username"
                    class="rounded-circle me-2" />
            </div>
            <div>
                <h5 class="text-white mb-1"><?php echo e(Auth::user()->name); ?></h5>
                <p class="text-white mb-0">Admin</p>
            </div>
        </div>
    </div>
    <nav class="mt-3 profile-user-info">
        <ul class="mx-0 list-unstyled pb-2 border-bottom-rgb">
            <li class="mb-2">
                <a href="<?php echo e(route('admin.dashboard')); ?>"
                    class="text-white text-decoration-none d-flex align-items-center px-3">
                    <i class="bi bi-columns-gap me-3"></i> Dashboard
                </a>
            </li>
            <li class="mb-2">
                <a href="<?php echo e(route('change-password')); ?>"
                    class="<?php if($route == 'change-password'): ?> active <?php endif; ?> text-white text-decoration-none d-flex align-items-center px-3">
                    <i class="bi bi-key me-3"></i> Change Password
                </a>
            </li>
            <li class="mb-2">
                <a href="<?php echo e(route('home')); ?>" class="text-white text-decoration-none d-flex align-items-center px-3">
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
                <a href="<?php echo e(route('add.user')); ?>"
                    class="text-white text-decoration-none d-flex align-items-center px-3 <?php if($route == 'add.user'): ?> active <?php endif; ?>">
                    <i class="bi bi-building me-3"></i> Add New Agent
                </a>
            </li>
            <li class="mb-2">
                <a href="<?php echo e(route('user.agent')); ?>"
                    class="text-white text-decoration-none d-flex align-items-center px-3 <?php if($route == 'user.agent'): ?> active <?php endif; ?>">
                    <i class="bi bi-building me-3"></i> All Agents (<?php echo e($total_agents); ?>)
                </a>
            </li>
            <li class="mb-2">
                <a href="<?php echo e(route('package.request')); ?>"
                    class="text-white text-decoration-none d-flex align-items-center px-3 <?php if($route == 'package.request'): ?> active <?php endif; ?>">
                    <i class="bi bi-building me-3"></i> Agent Package List &nbsp;(<sub class="text-danger">New</sub>)
                </a>
            </li>
            <li class="mb-2">
                <a href="<?php echo e(route('admin.properties')); ?>"
                    class="text-white text-decoration-none d-flex align-items-center px-3 <?php if($route == 'admin.properties'): ?> active <?php endif; ?>">
                    <i class="bi bi-building me-3"></i> All Properties (<?php echo e($total_properties); ?>)
                </a>
            </li>
            <li class="mb-2">
                <a href="<?php echo e(route('user.private')); ?>"
                    class="text-white text-decoration-none d-flex align-items-center px-3 <?php if($route == 'user.private'): ?> active <?php endif; ?>">
                    <i class="bi bi-building me-3"></i> All Private Seller (<?php echo e($total_private_seller); ?>)
                </a>
            </li>
            <li class="mb-2">
                <a href="<?php echo e(route('application.investment')); ?>"
                    class="text-white text-decoration-none d-flex align-items-center px-3 <?php if($route == 'application.investment'): ?> active <?php endif; ?>">
                    <i class="bi bi-building me-3"></i> Application form for <br> Investment
                </a>
            </li>
            <li class="mb-2">
                <a href="<?php echo e(route('application.house')); ?>"
                    class="text-white text-decoration-none d-flex align-items-center px-3 <?php if($route == 'application.house'): ?> active <?php endif; ?>">
                    <i class="bi bi-building me-3"></i> Application form for House & Plots
                </a>
            </li>
        </ul>
        
        <ul class="mx-0 list-unstyled pb-2 border-bottom-rgb">
            <li class="mb-2">
                <a href="<?php echo e(route('admin.new.project')); ?>"
                    class="text-white text-decoration-none d-flex align-items-center px-3 <?php if($route == 'admin.new.project'): ?> active <?php endif; ?>">
                    <i class="bi bi-bookmark-plus me-3"></i> Add New Project
                </a>
            </li>
            <li class="mb-2">
                <a href="<?php echo e(route('admin.projects.list')); ?>"
                    class="text-white text-decoration-none d-flex align-items-center px-3 <?php if($route == 'admin.projects.list'): ?> active <?php endif; ?>">
                    <i class="bi bi-bookmark-check me-3"></i> Projects List
                </a>
            </li>
        </ul>
        
        <ul class="mx-0 list-unstyled pb-2 border-bottom-rgb">
            <li class="mb-2">
                <a href="<?php echo e(route('new.advertisment')); ?>"
                    class="text-white text-decoration-none d-flex align-items-center px-3 <?php if($route == 'new.advertisment'): ?> active <?php endif; ?>">
                    <i class="bi bi-file-fill me-3"></i> Add New Advertisment
                </a>
            </li>
            <li class="mb-2">
                <a href="<?php echo e(route('admin.advertisment.list')); ?>"
                    class="text-white text-decoration-none d-flex align-items-center px-3 <?php if($route == 'admin.advertisment.list'): ?> active <?php endif; ?>">
                    <i class="bi bi-file-plus-fill me-3"></i> Advertisment List
                </a>
            </li>
        </ul>
        
        <ul class="mx-0 list-unstyled pb-2 border-bottom-rgb">
            <li class="mb-2">
                <a href="<?php echo e(route('new.prime.dealer')); ?>"
                    class="text-white text-decoration-none d-flex align-items-center px-3 <?php if($route == 'new.prime.dealer'): ?> active <?php endif; ?>">
                    <i class="bi bi-person-plus-fill me-3"></i> Add New Prime Dealer
                </a>
            </li>
            <li class="mb-2">
                <a href="<?php echo e(route('admin.dealers.list')); ?>"
                    class="text-white text-decoration-none d-flex align-items-center px-3 <?php if($route == 'admin.dealers.list'): ?> active <?php endif; ?>">
                    <i class="bi bi-person-fill me-3"></i> Prime Dealers List
                </a>
            </li>
        </ul>
        
        <ul class="mx-0 list-unstyled pb-2 border-bottom-rgb">
            <li class="mb-2">
                <a href="<?php echo e(route('advert-plan')); ?>"
                    class="text-white text-decoration-none d-flex align-items-center px-3">
                    <i class="bi bi-bookmarks-fill me-3"></i> Add Advert Plans
                </a>
            </li>
            <li class="mb-2">
                <a href="<?php echo e(route('advert.plan.list')); ?>"
                    class="text-white text-decoration-none d-flex align-items-center px-3">
                    <i class="bi bi-bookmarks-fill me-3"></i> Advert Plans List
                </a>
            </li>
        </ul>
        
        <ul class="mx-0 list-unstyled pb-2 border-bottom-rgb">
            <li class="mb-2">
                <a href="<?php echo e(route('add.package.plan')); ?>"
                    class="text-white text-decoration-none d-flex align-items-center px-3">
                    <i class="bi bi-bookmarks-fill me-3"></i> Add Package Plans
                </a>
            </li>
            <li class="mb-2">
                <a href="<?php echo e(route('package.plan.list')); ?>"
                    class="text-white text-decoration-none d-flex align-items-center px-3">
                    <i class="bi bi-bookmarks-fill me-3"></i> Package Plans List
                </a>
            </li>
        </ul>
        
        <ul class="mx-0 list-unstyled pb-2 border-bottom-rgb">
            <li class="mb-2">
                <a href="tel:<?php echo e(Auth::user()->number); ?>"
                    class="text-white text-decoration-none d-flex align-items-center px-3">
                    <i class="bi bi-telephone me-3"></i> <?php echo e(Auth::user()->number); ?>

                </a>
            </li>
            <li class="mb-2">
                <a href="mailto: <?php echo e(Auth::user()->email); ?>"
                    class="text-white text-decoration-none d-flex align-items-center px-3">
                    <i class="bi bi-envelope me-3"></i> <?php echo e(Auth::user()->email); ?>

                </a>
            </li>
        </ul>

    </nav>
</aside>
<?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/admin/components/sidebar.blade.php ENDPATH**/ ?>