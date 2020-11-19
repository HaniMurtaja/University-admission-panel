<?php if(session()->has('errors')): ?>
    <div class="alert alert-danger fade show" role="alert">
        <div class="alert-text"><?php echo e(session("errors")->first()); ?></div>
        <div class="alert-close">
            <button type="button" class="close" style="margin-top: -1.25rem;"
                    data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="zmdi zmdi-close-circle"></i></span>
            </button>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH F:\Web_Developer\Php\Laravel\Admission Panel\hani-master\resources\views/admin_errors.blade.php ENDPATH**/ ?>