<?php $__env->startSection('title','Courses'); ?>

<?php $__env->startSection('assets'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="site-hero site-sm-hero overlay" data-stellar-background-ratio="0.5"
             style="background-image: url(<?php echo e(asset('assets2/images/big_image_2.jpg')); ?>);">
        <div class="container">
            <div class="row align-items-center justify-content-center site-hero-sm-inner">
                <div class="col-md-7 text-center">
                    <div class="mb-5 element-animate">
                        <h1 class="mb-2">Courses</h1>
                        <p class="bcrumb"><a href="<?php echo e(route('home')); ?>">Home</a> <span
                                class="sep ion-android-arrow-dropright px-2"></span> <span
                                class="current">Courses</span></p>
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="mb-5 element-animate">
                        <div class="block-17">
                            <h2 class="heading text-center mb-4">Find Courses That Suits You</h2>
                            <form action="<?php echo e(route('courses')); ?>" method="get" class="d-block d-lg-flex mb-4">
                                <div class="fields d-block d-lg-flex">
                                    <div class="textfield-search one-third">
                                        <input type="text" name="search" class="form-control"
                                               placeholder="Keyword search...">
                                    </div>
                                    <div class="select-wrap one-third">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="course_type" id="" class="form-control">
                                            <label for="">hello</label>
                                            <option value="0">Course Type</option>
                                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="select-wrap one-third">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="university" id="" class="form-control">
                                            <option value="0">University</option>
                                            <?php $__currentLoopData = $universities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $university): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($university->id); ?>"><?php echo e($university->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <input type="submit" class="search-submit btn btn-primary" value="Search">
                            </form>
                            
                            
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>


    <div class="site-section bg-light">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-sm-12 order-md-2">

                    <div class="row">
                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12 col-lg-12 mb-5">
                                <div class="block-19">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <a href="<?php echo e(route('universities.show',$course->university->id)); ?>"><img
                                                    src="<?php echo e($course->university->imagePath()); ?>" alt="Image"
                                                    class="img-fluid mt-3 ml-3"></a>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text">
                                                <h2 class="heading mt-4">
                                                    <?php echo e($course->university->name); ?>

                                                </h2>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="text">
                                                <div class="heading mt-3">
                                                    <div class="float-right">
                                                        <a href="<?php echo e(route('courses.show',$course->id)); ?>"
                                                           class="btn btn-primary" style="color: white;">Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h2 class="heading ml-3"><?php echo e($course->name); ?></h2>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="text">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <h6 class="heading">Course Type</h6>
                                                        <h2 class="heading"><?php echo e($course->type->name); ?></h2>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <h6 class="heading">Tuition Fees</h6>
                                                        <h2 class="heading"><?php echo e($course->fees); ?></h2>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <h6 class="heading">Duration</h6>
                                                        <h2 class="heading"><?php echo e($course->duration); ?> <?php echo e($course->duration > 1 ?"Months": 'Month'); ?></h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="row mb-5">
                        <div class="col-md-12 text-center">
                            <div class="block-27">
                                <?php echo e($courses->links()); ?>

                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-md-4 col-sm-12 order-md-1">

                    <div class="block-24 mb-5">
                        <h3 class="heading">Course Types</h3>
                        <ul>
                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="/courses?type=<?php echo e($type->id); ?>"><?php echo e($type->name); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>





















































                </div>
                
            </div>
        </div>
    </div>






<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Web_Developer\Php\Laravel\Admission Panel\hani-master\resources\views/Home/courses.blade.php ENDPATH**/ ?>