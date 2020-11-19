<?php $__env->startSection('title','Universities'); ?>


<?php $__env->startSection('page_assets'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/sweetalert/sweetalert.css')); ?>">
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
                    <li class="breadcrumb-item active">All Courses</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>All Courses</strong></h2>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <a href="<?php echo e(route('admin.courses.create')); ?>" class="btn btn-primary">Add New Course</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>University</th>
                                    <th>Type</th>
                                    <th>Categories</th>
                                    <th>Duration</th>
                                    <th>Fees</th>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['edit-course','delete-course'])): ?>
                                        <th>action</th>
                                    <?php endif; ?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($course->name); ?></td>
                                        <td><?php echo e($course->university->name); ?></td>
                                        <td><?php echo e($course->type->name); ?></td>
                                        <td>
                                            <?php $__currentLoopData = $course->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($category->name); ?> <?php if(!$loop->last): ?>, <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td><?php echo e($course->duration); ?> <?php echo e($course->duration > 1 ? 'Months' : 'Month'); ?></td>
                                        <td><?php echo e($course->fees); ?></td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['edit-course','delete-course'])): ?>
                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-course')): ?>
                                                    <a href="<?php echo e(route('admin.courses.edit',$course->id)); ?>"
                                                       title="Edit <?php echo e($course->name); ?>" class="mr-3"><i
                                                            class="fas fa-edit"></i></a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-course')): ?>
                                                    <form id="delete-course<?php echo e($course->id); ?>"
                                                          action="<?php echo e(route('admin.courses.destroy',$course->id)); ?>"
                                                          method="post" style="display: none;">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('delete'); ?>
                                                    </form>
                                                    <a href="#"
                                                       title="Delete <?php echo e($course->name); ?>"
                                                       onclick="deleteCourse(<?php echo e($course->id); ?>)"><i
                                                            class="fas fa-trash"></i></a>
                                                <?php endif; ?>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_scripts'); ?>
    <script src="<?php echo e(asset('assets/plugins/sweetalert/sweetalert.min.js')); ?>"></script>
    <script>
        function deleteCourse(id) {
            swal({
                title: "Are you sure?",
                text: "You Want to Delete This Course",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                document.getElementById('delete-course' + id).submit();
            });
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.control_panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Web_Developer\Php\Laravel\Admission Panel\hani-master\resources\views/Admin/Courses/index.blade.php ENDPATH**/ ?>