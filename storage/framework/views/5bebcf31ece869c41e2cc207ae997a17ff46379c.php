<?php $__env->startSection('title','Universities'); ?>

<?php $__env->startSection('assets'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="site-hero site-sm-hero overlay" data-stellar-background-ratio="0.5"
             style="background-image: url(<?php echo e(asset('assets2/images/big_image_2.jpg')); ?>);">
        <div class="container">
            <div class="row align-items-center justify-content-center site-hero-sm-inner">
                <div class="col-md-7 text-center">

                    <div class="mb-5 element-animate">
                        <h1 class="mb-2">Universities</h1>
                        <p class="bcrumb"><a href="<?php echo e(route('home')); ?>">Home</a> <span
                                class="sep ion-android-arrow-dropright px-2"></span> <span
                                class="current">Universities</span></p>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <div class="site-section bg-light">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12 order-md-2">

                    <div class="row">
                        <?php $__currentLoopData = $universities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $university): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12 col-lg-12 mb-5">
                                <div class="block-19">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <a href="<?php echo e(route('universities.show',$university->id)); ?>"><img
                                                    src="<?php echo e($university->imagePath()); ?>" alt="Image"
                                                    class="img-fluid mt-3 ml-3"></a>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text">
                                                <h2 class="heading mt-4">
                                                    <?php echo e($university->name); ?>

                                                </h2>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="text">
                                                <div class="heading mt-3">
                                                    <div class="float-right">
                                                        <a href="<?php echo e(route('universities.show',$university->id)); ?>"
                                                           class="btn btn-primary" style="color: white;">Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="float-right">
                                                <a href="<?php echo e($university->website); ?>" class="mr-5"><?php echo e($university->website); ?></a>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="text">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h6 class="heading">Institution Type</h6>
                                                        <h2 class="heading"><?php echo e($university->institution_type); ?></h2>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <h6 class="heading">Founding Year</h6>
                                                        <h2 class="heading"><?php echo e($university->founding_year); ?></h2>
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
                                <?php echo e($universities->links()); ?>

                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-md-4 col-sm-12 order-md-1">










                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    

                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    


                </div>
                
            </div>
        </div>
    </div>






<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Web_Developer\Php\Laravel\Admission Panel\hani-master\resources\views/Home/universities.blade.php ENDPATH**/ ?>