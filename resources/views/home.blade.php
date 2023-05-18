<?php

// session_start();
//     include("DB_Ops.php");

//     if (isset($_SESSION['user_name'])) {
// $user_data=check_login($con);
?>
@include('header')
{{-- @if (Session :: has ('success')) --}}

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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet"  href="{{ asset('css/all.min.css') }}">

</head>

<body class="main-col">
    <?php  
    // include "header.php";   
    ?>

    <div class=" container ">
        <div class=" row d-flex justify-content-center mt-5 ">
            <div class=" col-8">
                <div class="login-form main-col text-center p-5 ">
                    <h1 class="txt-col" id="username" style="direction: rtl">{{ trans('home.welcome') }} {{Auth :: user()->user_name }}</h1>
                </div>
            </div>
        </div>

        


    </div>

    
    @include('footer')
</body>

</html>

