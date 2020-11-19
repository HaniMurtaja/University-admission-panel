<?php $__env->startSection('page_assets'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/sweetalert/sweetalert.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/image-picker.css')); ?>">

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Courses</h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(URL('/')); ?>"><i class="zmdi zmdi-home"></i> Oreo</a>
                    </li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.courses.index')); ?>">Courses</a></li>
                    <li class="breadcrumb-item active">Add Course</li>
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
                            <strong>Add Course</strong>
                            <small>
                                Enter Course Information
                            </small>
                        </h2>
                    </div>
                    <div class="body">

                        <?php echo $__env->make('admin_errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <form role="form" action="<?php echo e(route('admin.courses.store')); ?>" method="post" class="col-sm-12"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <label for="" class="label">Course Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Name"
                                               value="<?php echo e(old('name')); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group <?php $__errorArgs = ['fees'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <label for="" class="label">Course Fees</label>
                                        <input type="number" class="form-control" name="fees" placeholder="Fees"
                                               value="<?php echo e(old('fees')); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <label for="" class="label">Course Duration <span class="text-danger"
                                                                                          style="font-size: 12px">In Months</span></label>
                                        <input type="number" class="form-control" name="duration"
                                               placeholder="Duration" value="<?php echo e(old('duration')); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group <?php $__errorArgs = ['type_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <label for="" class="label">Course Type</label>
                                        <select name="type_id" class="form-control show-tick">
                                            <option value="0" selected disabled>Type</option>
                                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    value="<?php echo e($type->id); ?>" <?php echo e(old('type_id') == $type->id ? 'selected' : ''); ?>>
                                                    <?php echo e($type->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <label for="" class="label">Course Category</label>
                                        <select name="categories[]" multiple class="form-control z-index show-tick"
                                                data-live-search="true" tabindex="-98">
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $type->id ? 'selected' : ''); ?>>
                                                    <?php echo e($category->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="" class="label">University</label>
                                        <select name="university_id" value="<?php echo e(old('university_id')); ?>"
                                                class="form-control z-index show-tick <?php $__errorArgs = ['university_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                data-live-search="true" tabindex="-98">
                                            <option value="0" selected disabled>University</option>
                                            <?php $__currentLoopData = $universities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $university): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    value="<?php echo e($university->id); ?>" <?php echo e(old('university_id') == $university->id ? 'selected' : ''); ?>>
                                                    <?php echo e($university->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea class="form-control" name="description" cols="30" rows="5"
                                                  placeholder="description"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
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

<?php echo $__env->make('layouts.control_panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Web_Developer\Php\Laravel\Admission Panel\hani-master\resources\views/Admin/Courses/create.blade.php ENDPATH**/ ?>