<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
        <link rel="stylesheet"  href="<?php echo e(asset('css/all.min.css')); ?>">
</head>

<body>
    <header class="site-header">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
                <a class="navbar-brand text-white ms-4" href="#">Registration webpage</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                      <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a class="me-3 text-white" rel="alternate" hreflang="<?php echo e($localeCode); ?>" href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>">
                                 <?php echo e($properties['native']); ?> 
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               
                    </ul>
                    <form class="d-flex" action="<?php echo e(route('logout')); ?>" method="POST" >
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-outline-success me-4" type="submit"><?php echo e(trans('home.logout')); ?></button>
                    </form>
                </div>
            </div>
        </nav>
    </header><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/laravel/Assignment2/resources/views/header.blade.php ENDPATH**/ ?>