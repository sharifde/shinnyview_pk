
<div class="container">
    <style>
        .form-group-checkbox label:before{
            padding:7px !important;
        }
    </style>
    <form>
        <section class="log-sign-sec-mar">
            <div class="row log-sign-div d-flex bg-white">
                <div class="col-md-5 log-sign-clip-div"
                    style="background: url(<?php echo e(asset('images/login.jpg')); ?>) center center / cover white; height: 476px;">
                    <h1>Login</h1>
                    
                    <div class="log-line position-relative"></div>
                </div>
                <div
                    class="log-sign-input-div position-relative bg-white p-0 col-md-7 d-flex align-items-center justify-content-center">

                    <div class="col-lg-7 col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if(session()->has('message')): ?>
                                    <div class="alert alert-success">
                                        <?php echo e(session('message')); ?>

                                    </div>
                                <?php endif; ?>
                                <?php if(session()->has('error')): ?>
                                    <div class="alert alert-danger">
                                        <?php echo e(session('error')); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-12 mb-27">
                            <div class="log-input-div d-flex align-items-center px-3">
                                <img src="<?php echo e(asset('images/@-icon.png')); ?>" class="img-fluid" />
                                <input id="email" type="text" class="form-control form-bor text-right" placeholder="Email"
                                wire:model="email" aria-label="Email" />
                            </div>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger error text-right"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-12 mb-3">
                        <div class="log-input-div d-flex align-items-center px-3">
                            <img src="<?php echo e(asset('images/lock-icon.png')); ?>" class="img-fluid" />
                            <input id="password" type="password" class="form-control form-bor text-right" placeholder="Password"
                            wire:model="password" aria-label="Password" />
                            <button class="bg-transparent border-0 visible-password" type="button">
                                <i class="bi bi-eye"></i>
                            </button>
                            </div>
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger error text-right"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group-checkbox mb-4">
                            <input type="checkbox" id="privacy_policy" value="privacy_policy" name="package_due">
                            <label class="d-flex align-items-center" for="privacy_policy">
                                <span class="ps-1" style="font-size:12px !important">I have read and agree the Shinnyview T&C<span class="text-danger f-14">*</span></span>
                            </label>
                        </div>
                        <button type="submit" data-enable="privacy" class="text-white log-btn w-100 mb-3" wire:click.prevent="login">
                            Login <span
                            wire:target="login" disabled wire:loading.class="spinner-border spinner-border-sm"></span>
                        </button>
                        <div class="d-flex">
                            <a href="<?php echo e(route('forgot')); ?>" class="text-decoration-none ms-auto d-inline-block">
                                <p class="ms-auto log-p mb-0">Forgot Password?</p>
                            </a>
                        </div>
						<br>
						<div class="new-user">
								New User? <a style="color: #BC985F" href="<?php echo e(url('/client-signup')); ?>" class="link">Register as Individual Client</a>
								<br>
							    <a style="color:#1B1A2F; margin-left: 22%; font-weight: bolder" href="<?php echo e(url('/dealer-signup')); ?>" class="link">Register as Dealer</a>
							</div>
                    </div>
                </div>
            </div>
        </section>
    </form>

</div>
<?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/livewire/login.blade.php ENDPATH**/ ?>