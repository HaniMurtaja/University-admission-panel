<?php $__env->startSection('page_assets'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/sweetalert/sweetalert.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/image-picker.css')); ?>">

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Universities</h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(URL('/')); ?>"><i class="zmdi zmdi-home"></i> Oreo</a>
                    </li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.universities.index')); ?>">Universities</a></li>
                    <li class="breadcrumb-item active">Add University</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Add University</strong>
                            <small>
                                Enter University Information
                            </small>
                        </h2>
                    </div>
                    <div class="body">

                        <?php echo $__env->make('admin_errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <form role="form" action="<?php echo e(route('admin.universities.store')); ?>" method="post" class="col-sm-12"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row col-md-3 col-sm-12 float-left">
                                <div class="col-sm-12">
                                    <div class="">
                                        <p>University Logo</p>
                                        <div class="img-picker">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 clearfix col-lg-9 col-sm-12 float-right">
                                <div class="col-md-6 col-sm-12">
                                    <label>University Name</label>
                                    <div class="input-group <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo e(old('name')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>Founding Year</label>
                                    <div class="input-group <?php $__errorArgs = ['founding_year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <input type="number" step="0.5" name="founding_year" class="form-control"
                                               placeholder="Year" value="<?php echo e(old('founding_year')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 mt-5">
                                    <label>Institution Type</label>
                                    <div class="input-group <?php $__errorArgs = ['institution_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <input type="text" name="institution_type" class="form-control"
                                               placeholder="Institution Type" value="<?php echo e(old('institution_type')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 mt-5">
                                    <label>Website URL</label>
                                    <div class="input-group <?php $__errorArgs = ['website'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <input type="text" name="website" class="form-control"
                                               placeholder="URL" value="<?php echo e(old('website')); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix col-sm-12">
                                <div class="col-sm-12">
                                    <div class="form-group mt-5 <?php $__errorArgs = ['about'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <label>About University</label>
                                        <textarea name="about" class="form-control" rows="5"
                                                  placeholder="About"><?php echo e(old('about')); ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-round float-right">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>



<?php $__env->startSection('page_scripts'); ?>
    <script src="<?php echo e(asset('assets/plugins/sweetalert/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/image-picker.js')); ?>"></script>


    <script>
        $('.has-danger').keypress(function () {
            $(this).removeClass('has-danger');
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.control_panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Web_Developer\Php\Laravel\Admission Panel\hani-master\resources\views/Admin/University/create.blade.php ENDPATH**/ ?>