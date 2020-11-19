<?php $__env->startSection('title','Home'); ?>

<?php $__env->startSection('assets'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="site-hero overlay" data-stellar-background-ratio="0.5"
             style="background-image: url(<?php echo e(asset('assets2/images/big_image_2.jpg')); ?>);">
        <div class="container">
            <div class="row align-items-center justify-content-center site-hero-inner">
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
                                            <?php $__currentLoopData = $course_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Web_Developer\Php\Laravel\Admission Panel\hani-master\resources\views/home.blade.php ENDPATH**/ ?>