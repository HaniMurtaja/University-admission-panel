<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/morrisjs/morris.min.css')); ?>"/>
    <!-- Custom Css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/color_skins.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <?php echo $__env->yieldContent('page_assets'); ?>
    <script>

    </script>
</head>

<body
    class="theme-cyan">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="<?php echo e(asset('assets/images/logo.svg')); ?>" width="48" height="48"
                                 alt="Oreo"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- Top Bar -->
<nav class="navbar p-l-5 p-r-5">
    <ul class="nav navbar-nav navbar-left">
        <li>
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="/"><img src="<?php echo e(asset('assets/images/logo.svg')); ?>"
                                                      width="30" alt="Oreo"><span
                        class="m-l-10">Oreo</span></a>
            </div>
        </li>
        <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a>
        </li>
        <li class="float-right">
            <form action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;" id="logout-form">
                <?php echo csrf_field(); ?>
            </form>
            <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="mega-menu" data-close="true"><i
                    class="zmdi zmdi-power mr-4"></i></a>

            
            
        </li>
    </ul>
</nav>
<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="tab-content mt-5">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info">
                            <div class="image">
                                <a href="">
                                    
                                </a>
                            </div>
                            <div class="detail">
                                <h4><?php echo e(auth()->user()->name); ?></h4>
                            </div>
                        </div>
                    </li>

                    <?php
                        use Illuminate\Support\Facades\Request;
                        $url = Request::path();
                    ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard')): ?>
                        <li class="<?php echo e(str_contains($url,'dashboard') ? 'active':''); ?> open"><a
                                href="<?php echo e(route('admin.dashboard')); ?>"><i
                                    class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                    <?php endif; ?>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show-students')): ?>
                        <li class="<?php echo e(str_contains($url,'students') ? 'active':''); ?> open"><a
                                href="<?php echo e(route('admin.students.index')); ?>"><i
                                    class="fas fa-user-graduate"></i><span>Students</span></a></li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['show-universities','add-university'])): ?>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="fas fa-university"></i>
                                <span>Universities</span>
                            </a>
                            <ul class="ml-menu">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show-universities')): ?>
                                    <li class='<?php echo e(str_contains($url,'universities') ? 'active':''); ?>'><a
                                            href="<?php echo e(route('admin.universities.index')); ?>">All Universities</a></li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add-university')): ?>
                                    <li><a href="<?php echo e(route('admin.universities.create')); ?>">Add University</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['show-courses','add-course'])): ?>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="fas fa-book"></i>
                                <span>Courses</span>
                            </a>
                            <ul class="ml-menu">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show-courses')): ?>
                                    <li class='<?php echo e(str_contains($url,'courses') ? 'active':''); ?>'><a
                                            href="<?php echo e(route('admin.courses.index')); ?>">All Courses</a></li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add-course')): ?>
                                    <li><a href="<?php echo e(route('admin.courses.create')); ?>">Add Course</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show-course-types')): ?>
                        <li class="<?php echo e(str_contains($url,'course_types') ? 'active':''); ?> open"><a
                                href="<?php echo e(route('admin.course_types.index')); ?>"><i
                                    class="fas fa-list"></i><span>Course Types</span></a></li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show-course-categories')): ?>
                        <li class="<?php echo e(str_contains($url,'categories') ? 'active':''); ?> open"><a
                                href="<?php echo e(route('admin.categories.index')); ?>"><i
                                    class="zmdi zmdi-collection-item"></i><span>Course Categories</span></a></li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show-users')): ?>
                        <li class="<?php echo e(str_contains($url,'users') ? 'active':''); ?> open"><a
                                href="<?php echo e(route('admin.users.index')); ?>"><i
                                    class="fas fa-users"></i><span>Users</span></a></li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['show-roles','add-role'])): ?>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="fas fa-user-tag"></i>
                                <span>Roles</span>
                            </a>
                            <ul class="ml-menu">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show-roles')): ?>
                                    <li class='<?php echo e(str_contains($url,'roles') ? 'active':''); ?>'><a
                                            href="<?php echo e(route('admin.roles.index')); ?>">All Roles</a></li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add-role')): ?>
                                    <li><a href="<?php echo e(route('admin.roles.create')); ?>">Add Role</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="tab-pane stretchLeft" id="user">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info m-b-20 p-b-15">
                            <div class="image"><a href="profile.html"><img src="assets/images/profile_av.jpg"
                                                                           alt="User"></a></div>
                            <div class="detail">
                                <h4>Dr. Charlotte</h4>
                                <small>Neurologist</small>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a title="facebook" href="#"><i class="zmdi zmdi-facebook"></i></a>
                                    <a title="twitter" href="#"><i class="zmdi zmdi-twitter"></i></a>
                                    <a title="instagram" href="#"><i class="zmdi zmdi-instagram"></i></a>
                                </div>
                                <div class="col-4 p-r-0">
                                    <h5 class="m-b-5">18</h5>
                                    <small>Exp</small>
                                </div>
                                <div class="col-4">
                                    <h5 class="m-b-5">125</h5>
                                    <small>Awards</small>
                                </div>
                                <div class="col-4 p-l-0">
                                    <h5 class="m-b-5">148</h5>
                                    <small>Clients</small>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <small class="text-muted">Location: </small>
                        <p>795 Folsom Ave, Suite 600 San Francisco, CADGE 94107</p>
                        <hr>
                        <small class="text-muted">Email address: </small>
                        <p>Charlotte@example.com</p>
                        <hr>
                        <small class="text-muted">Phone: </small>
                        <p>+ 202-555-0191</p>
                        <hr>
                        <small class="text-muted">Website: </small>
                        <p>dr.charlotte.com/ </p>
                        <hr>
                        <ul class="list-unstyled">
                            <li>
                                <div>Colorectal Surgery</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-blue " role="progressbar" aria-valuenow="89"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 89%"><span class="sr-only">62% Complete</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div>Endocrinology</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-green " role="progressbar" aria-valuenow="56"
                                         aria-valuemin="0" aria-valuemax="100" style="  width: 56%"><span
                                            class="sr-only">87% Complete</span></div>
                                </div>
                            </li>
                            <li>
                                <div>Dermatology</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-amber" role="progressbar" aria-valuenow="78"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 78%"><span class="sr-only">32% Complete</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div>Neurophysiology</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-blush" role="progressbar" aria-valuenow="43"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 43%"><span class="sr-only">56% Complete</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>
<section class="content home">

    <?php echo $__env->yieldContent('content'); ?>

</section>
<!-- Jquery Core Js -->
<script src="<?php echo e(asset('assets/bundles/libscripts.bundle.js')); ?>"></script>

<script src="<?php echo e(asset('assets/bundles/vendorscripts.bundle.js')); ?>"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="<?php echo e(asset('assets/bundles/morrisscripts.bundle.js')); ?>"></script><!-- Morris Plugin Js -->



<script src="<?php echo e(asset('assets/bundles/mainscripts.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/bootstrap-notify/bootstrap-notify.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/pages/ui/notifications.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/pages/index.js')); ?>"></script>
<script>
    $('li.active').parent('.ml-menu').siblings().click();
    $('li.active').parent('.ml-menu').parent().addClass('active');
</script>
<?php echo $__env->make('success_notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('page_scripts'); ?>
</body>
</html>
<?php /**PATH F:\Web_Developer\Php\Laravel\Admission Panel\hani-master\resources\views/layouts/control_panel_layout.blade.php ENDPATH**/ ?>