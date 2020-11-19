<?php $__env->startSection('title','Universities'); ?>


<?php $__env->startSection('page_assets'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/sweetalert/sweetalert.css')); ?>">
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
                    <li class="breadcrumb-item active">All Universities</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>All Universities</strong></h2>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add-university')): ?>
                                    <a href="<?php echo e(route('admin.universities.create')); ?>" class="btn btn-primary">Add
                                        University</a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th width="10%">Logo</th>
                                    <th>Name</th>
                                    <th>Institution Type</th>
                                    <th>Founding Year</th>
                                    <th>Website</th>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['edit-university','delete-university'])): ?>
                                        <th>action</th>
                                    <?php endif; ?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $universities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $university): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><img src="<?php echo e($university->imagePath()); ?>" alt=""></td>
                                        <td><?php echo e($university->name); ?></td>
                                        <td><?php echo e($university->institution_type); ?></td>
                                        <td><?php echo e($university->founding_year); ?></td>
                                        <td><?php echo e($university->website); ?></td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['edit-university','delete-university'])): ?>
                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-university')): ?>
                                                    <a href="<?php echo e(route('admin.universities.edit',$university->id)); ?>"
                                                       title="Edit <?php echo e($university->name); ?>" class="mr-3"><i
                                                            class="fas fa-edit"></i></a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-university')): ?>
                                                    <form id="delete-university<?php echo e($university->id); ?>"
                                                          action="<?php echo e(route('admin.universities.destroy',$university->id)); ?>"
                                                          method="post" style="display: none;">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('delete'); ?>
                                                    </form>
                                                    <a href="#"
                                                       title="Delete <?php echo e($university->name); ?>"
                                                       onclick="deleteUniversity(<?php echo e($university->id); ?>)"><i
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
        function deleteUniversity(id) {
            swal({
                title: "Are you sure?",
                text: "You Want to Delete This University",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                document.getElementById('delete-university' + id).submit();
            });
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.control_panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Web_Developer\Php\Laravel\Admission Panel\hani-master\resources\views/Admin/University/index.blade.php ENDPATH**/ ?>