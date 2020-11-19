<?php $__env->startSection('title','Universities'); ?>


<?php $__env->startSection('page_assets'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/sweetalert/sweetalert.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Course Types</h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(URL('/')); ?>"><i class="zmdi zmdi-home"></i> Oreo</a>
                    </li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.course_types.index')); ?>">Course Types</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>All Course Types</strong></h2>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <button class="btn btn-primary" onclick="addType()">Add New Type</button>
                            </div>
                        </div>
                        <ul class="list-group">
                            <?php $__empty_1 = true; $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <li class="list-group-item"><?php echo e($type->name); ?>

                                    <span class="float-right">
                                        <a href="javascript:void(0)" onclick="editType(<?php echo e($type->id); ?>)"
                                           title="Edit <?php echo e($type->name); ?>" class="mr-3"><i class="fas fa-edit"></i></a>
                                            <form id="delete-course-type<?php echo e($type->id); ?>"
                                                  action="<?php echo e(route('admin.course_types.destroy',$type->id)); ?>"
                                                  method="post" style="display: none;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                            </form>
                                            <a href="#"
                                               title="Delete <?php echo e($type->name); ?>"
                                               onclick="deleteCourseType(<?php echo e($type->id); ?>)"><i
                                                    class="fas fa-trash"></i></a></span></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p>There is No Types</p>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_scripts'); ?>
    <script src="<?php echo e(asset('assets/plugins/sweetalert/sweetalert.min.js')); ?>"></script>
    <script>

        function addType() {
            swal({
                title: "Create Course Type",
                text: "Enter Type name :",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "Type Name"
            },function (inputValue) {
                if (inputValue === false) return false;
                if (inputValue === "") {
                    swal.showInputError("You need to write something!");
                    return false
                }
                if (inputValue.length < 3) {
                    swal.showInputError("The Name length must be Grater than 3 characters !");
                    return false
                }
                $.ajax({
                    url: `/admin/course_types`,
                    method: 'POST',
                    data: {
                        '_token': '<?php echo e(csrf_token()); ?>',
                        'name': `${inputValue}`
                    },
                    success(data) {
                        if (data['status']) {
                            swal('Success', data['message'], 'success');
                            setTimeout(function () {
                                location.reload()
                            }, 2000);
                        }
                    }
                });
            });
        }

        function editType(id) {
            swal({
                title: "Update Course Type",
                text: "Enter New Type name :",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "Type Name"
            }, function (inputValue) {
                if (inputValue === false) return false;
                if (inputValue === "") {
                    swal.showInputError("You need to write something!");
                    return false
                }
                if (inputValue.length < 3) {
                    swal.showInputError("The Name length must be Grater than 3 characters !");
                    return false
                }
                $.ajax({
                    url: `/admin/course_types/${id}`,
                    method: 'PUT',
                    data: {
                        '_token': '<?php echo e(csrf_token()); ?>',
                        '_method': 'PUT',
                        'name': `${inputValue}`
                    },
                    success(data) {
                        if (data['status']) {
                            swal('Success', data['message'], 'success');
                            setTimeout(function () {
                                location.reload()
                            }, 2000);
                        }
                    }
                });

            });
        }

        function deleteCourseType(id) {
            swal({
                title: "Are you sure?",
                text: "You Want to Delete This Course Type",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                document.getElementById('delete-course-type' + id).submit();
            });
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.control_panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Web_Developer\Php\Laravel\Admission Panel\hani-master\resources\views/Admin/CourseTypes/index.blade.php ENDPATH**/ ?>