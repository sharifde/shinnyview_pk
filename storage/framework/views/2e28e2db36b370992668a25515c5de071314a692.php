
<?php $__env->startSection('content'); ?>

    <div class="py-4">
        <div class="edit-project add-new-project bg-white card-body-content">
            <div class="search-form-header bg-theme-dark">
                <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Edit Project
                    <span class="txb-color">Basic Details</span>
                </h5>
            </div>
            <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <div class="alert-heading">Please correct error(s) and try again.</div>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <div class="alert-heading">Successful.</div>
                    <p>Project Successfully Added.</p>
                </div>
            <?php endif; ?>
            
            <div class="form-main-wrap px-5 py-4">
                <form class="form" action="<?php echo e(route('update.project.basic')); ?>" method="POST" id=""
                    enctype="multipart/form-data" class="w-100 mt-5 form-steps-main" id="form">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="projectID" value="<?php echo e($project->projectID); ?>">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Project Name
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" id="" name="p_name"
                                        value="<?php echo e($project->projectName); ?>" />
                                    <?php $__errorArgs = ['p_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Project Main Image
                                </label>
                                <div class="position-relative">
                                </div>
                                <div class="position-relative">
                                    <input type="file" data-index="0" class="img-preview-upload form-control"
                                        name="p_image" accept="image  " />
                                    <div class="output-img d-flex flex-wrap border mt-2 pt-2 px-2">
                                        
                                        <div class="me-2 mb-2 position-relative view-added-image">
                                            <span data-index="0" class="remove-btn-img position-absolute rounded-circle"
                                                type="button"><i class="bi bi-x-circle-fill"></i></span>
                                            <img width="70" height="70" src="<?php echo e(asset($project->projectImage)); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Developer Name
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" id="" name="d_name"
                                        value="<?php echo e($project->developer_name); ?>" />
                                    <?php $__errorArgs = ['d_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Developer Logo
                                </label>
                                <div class="position-relative">
                                    <input type="file" data-index="1" class="img-preview-upload form-control"
                                        name="d_image" accept="image  " />
                                    <div class="output-img d-flex flex-wrap border mt-2 pt-2 px-2">
                                        
                                        <div class="me-2 mb-2 position-relative view-added-image">
                                            <span data-index="1" class="remove-btn-img position-absolute rounded-circle"
                                                type="button"><i class="bi bi-x-circle-fill"></i></span>
                                            <img width="70" height="70" src="<?php echo e(asset($project->projectLogo)); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    City
                                </label>
                                <div class="position-relative">
                                    <select id="" class="w-100" name="city">
                                        <option value="">Select City</option>
                                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($c->id); ?>"
                                                <?php if($project->cityID == $c->id): ?> selected <?php endif; ?>><?php echo e($c->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Min Price
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" name="min_price"
                                        value="<?php echo e($project->min_price); ?>">
                                    <?php $__errorArgs = ['min_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Max Price
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" name="max_price"
                                        value="<?php echo e($project->max_price); ?>">
                                    <?php $__errorArgs = ['max_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Status
                                </label>
                                <div class="position-relative">
                                    <select name="status" id="" class="w-100">
                                        <option value="active" <?php if($project->status == 'active'): ?> selected <?php endif; ?>>Active
                                        </option>
                                        <option value="upcoming" <?php if($project->status == 'upcoming'): ?> selected <?php endif; ?>>Upcoming
                                        </option>
                                    </select>
                                    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-6 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Overview
                                </label>
                                <div class="position-relative">
                                    <textarea class="w-100 d-block" name="overview" cols="4" rows="6" value="<?php echo e(old('overview')); ?>"><?php echo e($project->overview); ?></textarea>
                                    <?php $__errorArgs = ['overview'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3 mt-4">
                            <div class="ms-auto form-submit-btn">
                                <button type="submit" class="border-0 f-medium rounded-btn px-3 py-2 bg-theme text-white"
                                    onclick="" style="width: 200px !important;">
                                    Update Basic Details
                                </button>
                            </div>
                        </div>


                    </div>

                </form>
            </div>


            
            <div class="search-form-header bg-theme-dark">
                <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Project
                    <span class="txb-color">Videos</span>
                </h5>
            </div>
            <div class="form-main-wrap px-5 py-4">
                <form class="form" action="<?php echo e(route('update.project.video')); ?>" method="POST" id=""
                    enctype="multipart/form-data" class="w-100 mt-5 form-steps-main" id="form">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="projectID" value="<?php echo e($project->projectID); ?>">
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Title
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" name="video_title">
                                    <?php $__errorArgs = ['video_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9 col-sm-8 col-xs-12 mt-3">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Video iframe
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" name="video_iframe">
                                    <?php $__errorArgs = ['video_iframe'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>


                        <div class="d-flex align-items-center mb-3 mt-4">
                            <div class="ms-auto form-submit-btn">
                                <button type="submit" class="border-0 f-medium rounded-btn px-3 py-2 bg-theme text-white"
                                    onclick="" style="width: 200px !important;">
                                    Update Video
                                </button>
                            </div>
                        </div>


                    </div>

                </form>
                
                <div class="project-table">
                    <table style="width: 50%;">
                        <tr>
                            <th>Title</th>
                            <th class="t-center">Video</th>
                            <th class="t-center">Action</th>
                        </tr>
                        <?php $__currentLoopData = $project_videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="tr-detail">
                                <td><?php echo e($pv->title); ?></td>
                                <td class="t-center">
                                    <?php echo $pv->video; ?>

                                </td>
                                <td class="t-center">
                                    <ul>
                                        <li>
                                            
                                            <i class="bi bi-trash text-danger"
                                                onclick="deleteVideo(<?php echo e($pv->id); ?>);"></i>
                                            
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </div>

            
            <div class="search-form-header bg-theme-dark">
                <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Project Gallery
                    <span class="txb-color">Images</span>
                </h5>
            </div>
            <div class="form-main-wrap px-5 py-4">
                <form class="form" action="<?php echo e(route('update.project.images')); ?>" method="POST" id=""
                    enctype="multipart/form-data" class="w-100 mt-5 form-steps-main" id="form">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="projectID" value="<?php echo e($project->projectID); ?>">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 mb-4">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Choose Images
                                </label>
                                <div class="position-relative">
                                    <input type="file" data-index="2" class="img-preview-upload form-control" multiple
                                        name="gallery_image[]" accept="image/*" data-required="required" />
                                    <div class="output-img d-flex flex-wrap border mt-2 pt-2 px-2">
                                        <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="me-2 mb-2 position-relative view-added-image">
                                                
                                                <img width="70" height="70" src="<?php echo e(asset($g->galleryImage)); ?>">
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                </div>
                                <?php $__errorArgs = ['gallery_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3 mt-4">
                            <div class="ms-auto form-submit-btn">
                                <button type="submit" class="border-0 f-medium rounded-btn px-3 py-2 bg-theme text-white"
                                    style="width: 200px !important;">
                                    Update Images
                                </button>
                            </div>
                        </div>


                    </div>

                </form>
                
                <div class="project-table">
                    <table style="width: 30%;">
                        <tr>
                            <th class="t-center">Image</th>
                            <th class="t-center">Action</th>
                        </tr>
                        <?php $__currentLoopData = $project_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="tr-detail">
                                <td class="t-center">
                                    <img src="<?php echo e(asset($pg->image)); ?>" alt="project-image"
                                        style="width: 50px; height: 50px;">
                                </td>
                                <td class="t-center">
                                    <ul>
                                        <li>
                                            
                                            <i class="bi bi-trash text-danger"
                                                onclick="deleteGalleryImage(<?php echo e($pg->id); ?>);"></i>
                                            
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </div>

            
            <div class="search-form-header bg-theme-dark">
                <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Project
                    <span class="txb-color">Features</span>
                </h5>
            </div>
            <div class="form-main-wrap px-5 py-4">
                <form class="form" action="<?php echo e(route('update.project.features')); ?>" method="POST" id=""
                    enctype="multipart/form-data" class="w-100 mt-5 form-steps-main" id="form">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="projectID" value="<?php echo e($project->projectID); ?>">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-elements-wrap">
                                <div class="form-group-checkbox me-3">
                                    
                                    <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="features-list">
                                            
                                            <input type="checkbox" id="<?php echo e($f->name); ?>" value="<?php echo e($f->id); ?>"
                                                name="project_feature[]">
                                            <label for="<?php echo e($f->name); ?>"><?php echo e($f->name); ?></label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3 mt-4">
                            <div class="ms-auto form-submit-btn">
                                <button type="submit" class="border-0 f-medium rounded-btn px-3 py-2 bg-theme text-white"
                                    style="width: 200px !important;">
                                    Update Features
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                
                <div class="project-add-new project-table">
                    <table style="width: 40%">
                        <tr>
                            <th>Feature List</th>
                            <th class="t-center">Action</th>
                        </tr>
                        <tr>
                            <td><input type="text" class="new-feature w-100" placeholder="New Feature Name.."></td>
                            <td class="t-center">
                                <ul>
                                    <li><i class="bi bi-plus-lg" onclick="addNewFeature();"></i></li>
                                </ul>
                            </td>
                        </tr>
                        <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="tr-detail">
                                <td><?php echo e($f->name); ?></td>
                                <td class="t-center">
                                    <ul>
                                        <li><i class="bi bi-trash text-danger"
                                                onclick="deleteFeature(<?php echo e($f->id); ?>);"></i></li>
                                    </ul>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>

            </div>

            
            <div class="search-form-header bg-theme-dark">
                <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Project
                    <span class="txb-color">Floor Plan</span>
                </h5>
            </div>
            <div class="form-main-wrap px-5 py-4" style="float: left; width: 100%;">
                <form class="form" action="<?php echo e(route('add.project.floor.plan')); ?>" method="POST" id=""
                    enctype="multipart/form-data" class="w-100 mt-5 form-steps-main" id="form">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="projectID" value="<?php echo e($project->projectID); ?>">
                    <div class="row">
                        <div class="col-md-2 col-sm-4 col-xs-12">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Select Floor Type
                                </label>
                                <div class="form-group-checkbox me-3">
                                    <select name="floor_type" id="" class="w-100">
                                        <?php $__currentLoopData = $floor_plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($fp->id); ?>"><?php echo e($fp->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-4 col-xs-12">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Floor Size
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" id="" name="floor_size"
                                        value="<?php echo e(old('floor_size')); ?>" />
                                    <?php $__errorArgs = ['floor_size'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-4 col-xs-12">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Price Range (Min - Max)
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" id="" name="price_range"
                                        value="<?php echo e(old('price_range')); ?>" placeholder="1.50 lac - 2.50 lac" />
                                    <?php $__errorArgs = ['price_range'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Floor Image
                                </label>
                                <div class="position-relative">
                                    <input type="file" data-index="3" class="img-preview-upload form-control"
                                        name="floor_image" accept="image  " />
                                    <div class="output-img d-flex flex-wrap border mt-2 pt-2 px-2 d-none">
                                        <div class="me-2 mb-2 position-relative view-added-image">
                                        </div>
                                    </div>
                                    <?php $__errorArgs = ['floor_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3 mt-4">
                            <div class="ms-auto form-submit-btn">
                                <button type="submit" class="border-0 f-medium rounded-btn px-3 py-2 bg-theme text-white"
                                    style="width: 200px !important;">
                                    Add Floor Plan
                                </button>
                            </div>
                        </div>


                    </div>

                </form>

                
                <div class="project-add-new project-table">
                    <table style="width: 25%; float: left; margin-right: 50px;">
                        <tr>
                            <th>Floor Plan</th>
                            <th class="t-center">Action</th>
                        </tr>
                        <tr>
                            <td><input type="text" class="new-floor-plan w-100" placeholder="New Floor Plan Name...">
                            </td>
                            <td class="t-center">
                                <ul>
                                    <li><i class="bi bi-plus-lg" onclick="addNewFloor();"></i></li>
                                </ul>
                            </td>
                        </tr>
                        <?php $__currentLoopData = $floor_plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($fp->name); ?></td>
                                <td class="t-center">
                                    <ul>
                                        <li><i class="bi bi-trash text-danger"
                                                onclick="deleteFloorPlan(<?php echo e($fp->id); ?>);"></i></li>
                                    </ul>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                    
                    <table style="width: 70%">
                        <tr>
                            <th class="t-center">Image</th>
                            <th class="t-center">Floor Type</th>
                            <th class="t-center">Size</th>
                            <th class="t-center">Price</th>
                            <th class="t-center">Action</th>
                        </tr>
                        <?php $__currentLoopData = $project_floor_plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td class="t-center">
                                    <img src="<?php echo e(asset($fp->image)); ?>" alt="floor_plan">
                                </td>
                                <td class="t-center"><?php echo e($fp->name); ?></td>
                                <td class="t-center"><?php echo e($fp->size); ?></td>
                                <td class="t-center"><?php echo e($fp->price); ?></td>
                                <td class="t-center">
                                    <ul>
                                        <li><i class="bi bi-trash text-danger"
                                                onclick="deleteProjectFloorPlan(<?php echo e($fp->id); ?>);"></i></li>
                                    </ul>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </div>

            
            <div class="search-form-header bg-theme-dark" style="float: left; width: 100%;">
                <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Project
                    <span class="txb-color">Payment Plan</span>
                </h5>
            </div>
            <div class="form-main-wrap px-5 py-4" style="float: left; width: 100%;">
                <form class="form" action="<?php echo e(route('add.project.payment.plan')); ?>" method="POST" id=""
                    enctype="multipart/form-data" class="w-100 mt-5 form-steps-main" id="form">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="projectID" value="<?php echo e($project->projectID); ?>">
                    <div class="row">

                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Title
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" id="" name="payment_title"
                                        value="<?php echo e(old('payment_title')); ?>" />
                                    <?php $__errorArgs = ['payment_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Price Range (Min - Max)
                                </label>
                                <div class="position-relative">
                                    <input type="text" class="w-100" id="" name="payment_range"
                                        value="<?php echo e(old('payment_range')); ?>" />
                                    <?php $__errorArgs = ['payment_range'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="form-elements-wrap">
                                <label class="f-medium mb-2">
                                    Payment Plan Image
                                </label>
                                <div class="position-relative">
                                    <input type="file" data-index="4" class="img-preview-upload form-control"
                                        name="payment_image" accept="image  " />
                                    <div class="output-img d-flex flex-wrap border mt-2 pt-2 px-2 d-none">
                                        <div class="me-2 mb-2 position-relative view-added-image">
                                        </div>
                                    </div>
                                    <?php $__errorArgs = ['payment_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-4 mt-4">
                            <div class="ms-auto form-submit-btn">
                                <button type="submit" class="border-0 f-medium rounded-btn px-3 py-2 bg-theme text-white"
                                    style="width: 200px !important;">
                                    Add Payment Plan
                                </button>
                            </div>
                        </div>


                    </div>

                </form>

                
                <div class="project-table">
                    
                    <table style="width: 50%">
                        <tr>
                            <th class="t-center">Image</th>
                            <th class="t-center">Title</th>
                            <th class="t-center">Price Range</th>
                            <th class="t-center">Action</th>
                        </tr>
                        <?php $__currentLoopData = $payment_plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="t-center">
                                    <img src="<?php echo e(asset('project/' . $project->projectID . '/' . $pp->image)); ?>"
                                        alt="payment_plan">
                                </td>
                                <td class="t-center"><?php echo e($pp->title); ?></td>
                                <td class="t-center"><?php echo e($pp->price); ?></td>
                                <td class="t-center">
                                    <ul>
                                        <li><i class="bi bi-trash text-danger"
                                                onclick="deleteProjectPaymentPlan(<?php echo e($pp->id); ?>);"></i></li>
                                    </ul>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>

            </div>


        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script type="text/javascript">
        // deleteGalleryImage
        function deleteGalleryImage(id) {

            postData = {
                "_token": "<?php echo e(csrf_token()); ?>",
                'id': id,
            }
            swal({
                    title: "Are you sure?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: window.livewire_app_url + '/admin/delete-gallery-image',
                            data: postData,
                            type: 'POST',
                            success: function(res) {
                                swal({
                                    title: "Your Data is Deleted!"
                                }).then(function() {
                                    location.reload();
                                });
                            },
                            error: function(jqXHR, exception) {
                                displayErrors(jqXHR, exception);
                            }
                        });
                    } else {
                        swal({
                            title: "Your Data is Not Deleted!"
                        });
                    }
                });
        }

        // addNewFeature 
        function addNewFeature() {
            var feature = $('.new-feature').val();
            postData = {
                "_token": "<?php echo e(csrf_token()); ?>",
                'feature': feature,
            }
            if (feature == '') {
                swal({
                    text: "Please Enter Feature Name to Add.."
                });
            } else {
                $.ajax({
                    url: window.livewire_app_url + '/admin/add-new-feature',
                    data: postData,
                    type: 'POST',
                    success: function(res) {
                        swal({
                            title: "Good job!",
                            text: "Feature Successfully Updated!",
                            icon: "success",
                        }).then(function() {
                            location.reload();
                        });
                    },
                    error: function(jqXHR, exception) {
                        displayErrors(jqXHR, exception);
                    }
                });
            }

        }

        // deleteFeature
        function deleteFeature(id) {

            postData = {
                "_token": "<?php echo e(csrf_token()); ?>",
                'id': id,
            }
            swal({
                    title: "Are you sure?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: window.livewire_app_url + '/admin/delete-feature',
                            data: postData,
                            type: 'POST',
                            success: function(res) {
                                swal({
                                    title: "Your Data is Deleted!"
                                }).then(function() {
                                    location.reload();
                                });
                            },
                            error: function(jqXHR, exception) {
                                displayErrors(jqXHR, exception);
                            }
                        });
                    } else {
                        swal({
                            title: "Your Data is Not Deleted!"
                        });
                    }
                });
        }

        // addNewFloor 
        function addNewFloor() {
            var floor = $('.new-floor-plan').val();
            postData = {
                "_token": "<?php echo e(csrf_token()); ?>",
                'floor': floor,
            }
            if (floor == '') {
                swal({
                    text: "Please Enter Floor Plan to Add.."
                });
            } else {
                $.ajax({
                    url: window.livewire_app_url + '/admin/add-new-floor',
                    data: postData,
                    type: 'POST',
                    success: function(res) {
                        swal({
                            title: "Good job!",
                            text: "Floor Plan Successfully Updated!",
                            icon: "success",
                        }).then(function() {
                            location.reload();
                        });
                    },
                    error: function(jqXHR, exception) {
                        displayErrors(jqXHR, exception);
                    }
                });
            }
        }

        // deleteProjectFloorPlan
        function deleteProjectFloorPlan(id) {
            postData = {
                "_token": "<?php echo e(csrf_token()); ?>",
                'id': id,
            }
            swal({
                    title: "Are you sure?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: window.livewire_app_url + '/admin/delete-project-floor',
                            data: postData,
                            type: 'POST',
                            success: function(res) {
                                swal({
                                    title: "Your Data is Deleted!"
                                }).then(function() {
                                    location.reload();
                                });
                            },
                            error: function(jqXHR, exception) {
                                displayErrors(jqXHR, exception);
                            }
                        });
                    } else {
                        swal({
                            title: "Your Data is Not Deleted!"
                        });
                    }
                });
        }

        // deleteProjectPaymentPlan
        function deleteProjectPaymentPlan(id) {
            postData = {
                "_token": "<?php echo e(csrf_token()); ?>",
                'id': id,
            }
            swal({
                    title: "Are you sure?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: window.livewire_app_url + '/admin/delete-project-payment-plan',
                            data: postData,
                            type: 'POST',
                            success: function(res) {
                                swal({
                                    title: "Your Data is Deleted!"
                                }).then(function() {
                                    location.reload();
                                });
                            },
                            error: function(jqXHR, exception) {
                                displayErrors(jqXHR, exception);
                            }
                        });
                    } else {
                        swal({
                            title: "Your Data is Not Deleted!"
                        });
                    }
                });
        }

        // deleteVideo
        function deleteVideo(id) {
            postData = {
                "_token": "<?php echo e(csrf_token()); ?>",
                'id': id,
            }
            swal({
                    title: "Are you sure?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: window.livewire_app_url + '/admin/delete-project-video',
                            data: postData,
                            type: 'POST',
                            success: function(res) {
                                swal({
                                    title: "Your Data is Deleted!"
                                }).then(function() {
                                    location.reload();
                                });
                            },
                            error: function(jqXHR, exception) {
                                displayErrors(jqXHR, exception);
                            }
                        });
                    } else {
                        swal({
                            title: "Your Data is Not Deleted!"
                        });
                    }
                });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/admin/projects/edit-project.blade.php ENDPATH**/ ?>