<!-- news letter -->

            <form class="row align-items-center" id="form_suscribe">
                <div class="title">News Letter</div>
                <div class="sub-title">Sign up for our newsletter to get up-to-date from us</div>
                <div class="l-sub b-shadow">
                    
                    <input type="email" wire:model="email" placeholder="Enter Your Email Address" required />
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger error text-right"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>



                    <div class="d-btn">
                    
                    <button type="submit" class="btn" wire:click.prevent="submit">Subscribe
                        <span wire:target="submit" wire:loading.class="spinner-border spinner-border-sm"></span>
                    </button>

                    </div>
                </div>
                <?php if(session()->has('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>
                <?php if(session()->has('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>

                <div class="btm-txt">we won't spam you or share your email address with public</div>
            </form>
        



<?php /**PATH E:\xampp\htdocs\shinnyview_pk\resources\views/livewire/subscribe.blade.php ENDPATH**/ ?>