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
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.categories.index')); ?>">Categories</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>All Categories</strong></h2>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add-course-category')): ?>
                                    <button class="btn btn-primary" onclick="addCategory()">Add New Category</button>
                                <?php endif; ?>
                            </div>
                        </div>
                        <ul class="list-group">
                            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <li class="list-group-item"><?php echo e($category->name); ?>


                                    <span class="float-right">

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-course-category')): ?>
                                            <a href="javascript:void(0)" onclick="editCategory(<?php echo e($category->id); ?>)"
                                               title="Edit <?php echo e($category->name); ?>" class="mr-3"><i
                                                    class="fas fa-edit"></i></a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-course-category')): ?>
                                            <form id="delete-category<?php echo e($category->id); ?>"
                                                  action="<?php echo e(route('admin.categories.destroy',$category->id)); ?>"
                                                  method="post" style="display: none;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                            </form>
                                            <a href="#"
                                               title="Delete <?php echo e($category->name); ?>"
                                               onclick="deleteCategory(<?php echo e($category->id); ?>)"><i
                                                    class="fas fa-trash"></i></a>
                                        <?php endif; ?>

                                    </span>

                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p>There is No Categories</p>
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

        function addCategory() {
            swal({
                title: "Create Category",
                text: "Enter Category name :",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "Name"
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
                    url: `/admin/categories`,
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

        function editCategory(id) {
            swal({
                title: "Update Category",
                text: "Enter New name :",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "Name"
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
                    url: `/admin/categories/${id}`,
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

        function deleteCategory(id) {
            swal({
                title: "Are you sure?",
                text: "You Want to Delete This Category",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                document.getElementById('delete-category' + id).submit();
            });
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.control_panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Web_Developer\Php\Laravel\Admission Panel\hani-master\resources\views/Admin/Categories/index.blade.php ENDPATH**/ ?>