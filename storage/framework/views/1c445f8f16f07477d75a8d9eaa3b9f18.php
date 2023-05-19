<?php $__env->startSection('content'); ?>

<?php 
// session_start(); 
// // include ("DB_Ops.php");
// if($_SERVER["REQUEST_METHOD"]=="POST"){
//   if (isset($_POST['full_name']) && isset($_POST['user_name'])
//     && isset($_POST['birthdate']) && isset($_POST['phone'])&& isset($_POST['address'])&& 
//     isset($_POST['password'])&& isset($_POST['confirm_password']) && isset($_POST['email'])) {

// 	function validate($data){
//       $data = trim($data);
// 	   return $data;
// 	}

// 	$full_name = validate($_POST['full_name']);
// 	$user_name = validate($_POST['user_name']);
//     $birthdate = validate($_POST['birthdate']);
// 	$phone = validate($_POST['phone']);
//   $address = validate($_POST['address']);
//   $password = validate($_POST['password']);
//   $confirm_password = validate($_POST['confirm_password']);
//   $email = validate($_POST['email']);
// 	$user_data = 'full_name='. $full_name. '&user_name='. $user_name . '&birthdate'.$birthdate.'&phone='. $phone.
//   '&address='. $address .'&password='. $password.'&confirm_password='. $confirm_password.'&email='. $email;

// 	if (empty($user_name)) {
// 		header("Location: signup.php?error=User Name is required&$user_data");
// 	    exit();
// 	}
//     else if(empty($full_name)){
//         header("Location: signup.php?error=full name is required&$user_data");
// 	    exit();
// 	}
//     else if(empty($birthdate)){
//         header("Location: signup.php?error=birthdate is required&$user_data");
// 	    exit();
// 	}
//     else if(empty($phone)){
//         header("Location: signup.php?error=phone is required&$user_data");
// 	    exit();
// 	}
//     else if(empty($address)){
//         header("Location: signup.php?error=address is required&$user_data");
// 	    exit();
// 	}
//     else if(empty($password)){
//         header("Location: signup.php?error=Password is required&$user_data");
// 	    exit();
// 	}
// 	else if(empty($confirm_password)){
//         header("Location: signup.php?error=Re Password is required&$user_data");
// 	    exit();
// 	}

// 	else if(empty($email)){
//         header("Location: signup.php?error=email is required&$user_data");
// 	    exit();
// 	}

// 	else if($password !== $confirm_password){
//         header("Location: signup.php?error=The confirmation password  does not match&$user_data");
// 	    exit();
// 	}

// 	else{

// 		// hashing the password
//         // $pass = md5($pass);
//         include "upload.php";
        
// 	    $sql = "SELECT * FROM users WHERE user_name='$user_name'";
// 		$result = mysqli_query($con, $sql);
        
// 		if (mysqli_num_rows($result) > 0) {
//       echo "akbr mn zero";
// 			header("Location: signup.php?error=The username is taken try another&$user_data");
// 	        exit();
// 		}else {
//           echo "insert";
//            $sql2 = "INSERT INTO users(full_name,user_name,birthdate,phone,address,password,email,user_image) VALUES('$full_name','$user_name','$birthdate','$phone','$address','$password','$email','$new_img_name')";
//            $result2 = mysqli_query($con, $sql2);
//            if ($result2) {
//             echo "tmam";
//            	 header("Location: signup.php?success=Your account has been created successfully");
// 	         exit();
//            }else {
//             echo "error";
// 	           	header("Location: signup.php?error=unknown error occurred&$user_data");
// 		        exit();
//            }
// 		}
// 	}
	
// }else{
// 	header("Location: signup.php");
// 	exit();
// }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" />

</head>


<body class="main-col">
    <div class="container">
        <div class="row d-flex justify-content-center mt-1">
            <div class="col-8">
                <div class="login-form main-col text-center p-5 ">
                    <h1 class="txt-col pb-4 "><?php echo e(trans('signup.Registration_webpage')); ?></h1>
                    <form method="POST"  onsubmit="return validateForm()" action="<?php echo e(route('signup')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type=" text" name="full_name" id="full_name" placeholder='<?php echo e(trans('signup.full_name')); ?>'
                            class="w-100 bg-transparent form-control text-white mb-3">
                        <input type="text" name="user_name" id="user_name" placeholder='<?php echo e(trans('login.user_name')); ?>'
                            class="w-100 bg-transparent form-control text-white mb-3">
                        <div class="d-flex">
                            <input type="date" name="birthdate" id="birthdate"
                                class="w-75 bg-transparent form-control text-white mb-3" placeholder="Birthday">
                            <button type="button" class="w-25 rounded btn btn-form h-100 ms-2"
                                onclick="getActor(birthdate.value)"><?php echo e(trans('signup.actors')); ?>

                            </button>

                        </div>
                        <ul id="actorsname" class="text-white">
                        </ul>
                        <input type=" tel" id="phone" name="phone"
                            class="w-100 bg-transparent form-control text-white mb-3" placeholder='<?php echo e(trans('signup.phone')); ?>'>

                        <input type="text" id="address" name="address"
                            class="w-100 bg-transparent form-control text-white mb-3" placeholder='<?php echo e(trans('signup.address')); ?>'>

                        <input type="password" name="password" id="password" placeholder='<?php echo e(trans('signup.password')); ?>'
                            class="w-100 bg-transparent form-control text-white mb-3">

                        <input type="password" id="confirm_password" name="confirm_password"
                        placeholder='<?php echo e(trans('signup.confirmPassword')); ?>' class="w-100 bg-transparent form-control text-white mb-3">
                        <input type="file" id="user_image" name="user_image"
                            class="w-100 bg-transparent form-control text-white mb-3">

                        <input type="email" name="email" id="email" placeholder='<?php echo e(trans('signup.email')); ?>'
                            class="w-100 bg-transparent form-control text-white my-2 mb-3">
                        <p id="signupalert"></p>
                        
                    
                        <?php if(Session :: has ('success') ): ?>
                        <p class="success success-col"> 
                            <?php echo e(Session :: get ('success')); ?>

                        </p>
                        <?php elseif($errors->has('full_name')): ?>
                        <p class="error text-danger">
                            <?php echo e($errors->first('full_name')); ?>

                        </p>
                        <?php elseif($errors->has('user_name')): ?>
                        <p class="error text-danger">
                            <?php echo e($errors->first('user_name')); ?>

                        </p>
                        <?php elseif($errors->has('birthdate')): ?>
                        <p class="error text-danger">
                            <?php echo e($errors->first('birthdate')); ?>

                        </p>
                        <?php elseif($errors->has('phone')): ?>
                        <p class="error text-danger">
                            <?php echo e($errors->first('phone')); ?>

                        </p>
                        <?php elseif($errors->has('address')): ?>
                        <p class="error text-danger">
                            <?php echo e($errors->first('address')); ?>

                        </p>
                        <?php elseif($errors->has('password')): ?>
                        <p class="error text-danger">
                            <?php echo e($errors->first('password')); ?>

                        </p>
                        <?php elseif($errors->has('confirm_password')): ?>
                        <p class="error text-danger">
                            <?php echo e($errors->first('confirm_password')); ?>

                        </p>
                        <?php elseif($errors->has('user_image')): ?>
                        <p class="error text-danger">
                            <?php echo e($errors->first('user_image')); ?>

                        </p>
                        
                        <?php elseif($errors->has('email')): ?>
                        <p class="error text-danger">
                            <?php echo e($errors->first('email')); ?>

                        </p>
                        <?php endif; ?>
                    

                        <button class="w-100  rounded btn btn-form" type="submit" name="submitptn" id="signupbtn"><?php echo e(trans('signup.signUp')); ?></button>
                        <p class="text-white pt-4"><?php echo e(trans('signup.haveAccount')); ?><a href="<?php echo e(url('login')); ?>" class="text-white"
                                id="signin"> <?php echo e(trans('signup.signIn')); ?></a></p>
                    </form>

                </div>
            </div>
        </div>

    </div>

    <script>
    function validateForm() {
        var fullName = document.getElementById("full_name").value;
        var user_name = document.getElementById("user_name").value;
        var birthdate = document.getElementById("birthdate").value;
        var phone = document.getElementById("phone").value;
        var address = document.getElementById("address").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm_password").value;

        var currentDate = new Date();
        currentDate = currentDate.toISOString();

        if (fullName == "" || user_name == "" || birthdate == "" || email == "" || password == "" || confirmPassword ==
            "" || address == "" || phone == "") {
            document.getElementById("signupalert").innerHTML = "All inputs is required";
            document.getElementById("signupalert").style.color = 'red';
            return false;
        }


        if (!fullName.match(/^[A-Za-z ]+$/)) {
            document.getElementById("signupalert").innerHTML = "Full name can only contain letters and spaces";
            document.getElementById("signupalert").style.color = 'red';
            return false;
        }
        if (!user_name.match(/^[A-Za-z ]+$/)) {
            document.getElementById("signupalert").innerHTML = "User name can only contain letters and spaces";
            document.getElementById("signupalert").style.color = 'red';
            return false;
        }
        if (!phone.match(/^01[0125][0-9]{8}$/)) {
            document.getElementById("signupalert").innerHTML = "Write your phone number correct";
            document.getElementById("signupalert").style.color = 'red';
            return false;
        }



        if (birthdate > currentDate) {
            document.getElementById("signupalert").innerHTML = "Birthdate is invalid";
            document.getElementById("signupalert").style.color = 'red';
            return false;
        }

        if (!email.match(/^\S+@\S+\.\S+$/)) {
            document.getElementById("signupalert").innerHTML = "Please enter a valid email address.";
            document.getElementById("signupalert").style.color = 'red';
            return false;
        }


        if (!password.match(/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/)) {
            document.getElementById("signupalert").innerHTML =
                "Minimum eight characters, at least one letter, one number and one special character";
            document.getElementById("signupalert").style.color = 'red';
            return false;
        }


        if (password != confirmPassword) {
            document.getElementById("signupalert").innerHTML = "Passwords do not match.";
            document.getElementById("signupalert").style.color = 'red';
            return false;
        }

        return true;
    }
    </script>

    <script src="<?php echo e(asset('js/API-Ops.js')); ?>"></script>
</body>

</html>

<?php $__env->stopSection(); ?>;
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/laravel/Assignment2/resources/views/signup.blade.php ENDPATH**/ ?>