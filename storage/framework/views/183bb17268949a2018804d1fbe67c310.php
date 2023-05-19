<?php

// session_start();
//     include("DB_Ops.php");

//     if (isset($_SESSION['user_name'])) {
// $user_data=check_login($con);
?>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration webpage</title>
    <link rel="stylesheet" href="style/media.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet"  href="<?php echo e(asset('css/all.min.css')); ?>">

</head>

<body class="main-col">
    <?php  
    // include "header.php";   
    ?>

    <div class=" container ">
        <div class=" row d-flex justify-content-center mt-5 ">
            <div class=" col-8">
                <div class="login-form main-col text-center p-5 ">
                    <h1 class="txt-col" id="username" style="direction: rtl"><?php echo e(trans('home.welcome')); ?> <?php echo e(Auth :: user()->user_name); ?></h1>
                </div>
            </div>
        </div>

        


    </div>

    
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>

<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/laravel/Assignment2/resources/views/home.blade.php ENDPATH**/ ?>