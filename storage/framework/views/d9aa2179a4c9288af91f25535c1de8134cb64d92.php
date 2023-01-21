
<?php $__env->startSection('content'); ?>
    
    <!-- official-projects -->
    <div class="offical-projects  main-padding">
        <div class="container">
          <div class="row">
  
            <!-- main heading -->
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="project-titles">
                <div class="title">Active Projects</div>
                <div class="s-title">here's the list or our active projects</div>
              </div>
            </div>
  
            <!-- project details -->
            <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="project-default-card default-card">
                        <a href="<?php echo e(route('project-single', ['id' => $p->id])); ?>" class=" b-shadow">
                            <div class="image">
                                <img src="<?php echo e(asset($p->image)); ?>" alt="project-image">
                            </div>
                            
                            <div class="p-info">
                                <div class="project-logo">
                                    <img src="<?php echo e(asset($p->logo)); ?>" alt="logo">
                                </div>
                                <div class="project-info">
                                    <div class="price"><?php echo e($p->name); ?></div>
                                    
                                    <div class="title">PKR <?php echo e($p->min_price); ?> - <?php echo e($p->max_price); ?></div>
                                    <div class="b-info"><?php echo e($p->cityName); ?></div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-md-12 col-sm-12 col-xs-12"> 
                    <div class="p-empty b-shadow">No <span>Active Project</span> Found.</div>
                </div>
            <?php endif; ?>
  
  
          </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/frontend/projects/active-projects.blade.php ENDPATH**/ ?>