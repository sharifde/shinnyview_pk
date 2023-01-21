<div>
    <div class="col-12">
        <h2 class="mt-3 f-bold text-uppercase">Contact
            <span class="txb-color">Form</span>
        </h2>
        <p class="mb-2 f-14 text-grey col-lg-11 col-12 px-0">
            We would love to hear your opinion about Shinny View – for example,
            if anything you really like about our website or if you're having any concerns
            please write to us. I consent with storage and handling of my data by Shinny View.
        </p>
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
        <form class="w-100" action="#" method="post">
            <?php echo csrf_field(); ?>
            <div class="row" style="width: 100%;">
                <div class="col-lg-6 mt-3">
                    <div class="search-bar position-relative in-group-field">
                        <input type="text" placeholder="Name" wire:model="name" class="w-100" required
                            minlength="3" />
                        <i class="bi bi-person position-absolute"></i>
                    </div>
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger error text-right"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col-lg-6 mt-3">
                    <div class="search-bar position-relative in-group-field">
                        <input type="email" placeholder="Email" class="w-100" wire:model="email" required />
                        <i class="bi bi-envelope position-absolute"></i>
                    </div>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger error text-right"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                </div>
                <div class="col-lg-6 mt-3">
                    <div class="search-bar position-relative in-group-field">
                        <input type="number" placeholder="Phone" wire:model="phone" class="w-100" required
                            minlength="11" />
                        <i class="bi bi-telephone position-absolute"></i>
                    </div>
                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger error text-right"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                </div>
                <div class="col-lg-6 mt-3">
                    <div class="search-bar position-relative in-group-field">
                        <select class="w-100" wire:model="subject">
                            <option value="" selected="">Subject</option>
                            <option value="Estate Agent">Estate Agent</option>
                            <option value="Private Seller">Private Seller</option>
                            <option value="Buyer">Buyer</option>
                            <option value="Join SV">Join SV</option>
                            <option value="Advertise with SV">Advertise with SV</option>
                        </select>
                        <i class="bi bi-building position-absolute"></i>
                    </div>
                    <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger error text-right"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                </div>
                <div class="col-lg-12 mt-3">
                    <div class="search-bar position-relative in-group-field">
                        <textarea type="text" rows="6" placeholder="Message" wire:model="message" class="w-100" required
                            minlength="3" minlength="4"></textarea>
                        <i class="bi bi-chat-dots position-absolute"></i>
                    </div>
                    <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger error text-right"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                </div>
                
                
                
                
                <div class="col-lg-12 mt-4 filter-body text-end">
                    <button class="bg-theme text-white px-5 border-0 text-capitalize"
                        wire:click.prevent="sendEmail">Submit
                        <span wire:target="sendEmail" wire:loading.class="spinner-border spinner-border-sm"></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/livewire/contact.blade.php ENDPATH**/ ?>