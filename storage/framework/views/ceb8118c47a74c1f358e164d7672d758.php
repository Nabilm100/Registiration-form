<?php  
// include "header.php";
?>
<?php 
// session_start(); 
// include ("DB_Ops.php");
// if($_SERVER["REQUEST_METHOD"]=="POST"){
//   if (isset($_POST['user_name'])&&isset($_POST['password'])) {

// 	function validate($data){
//       $data = trim($data);
// 	   return $data;
// 	}

// 	$user_name = validate($_POST['user_name']);
//   $password = validate($_POST['password']);
  
// 	$user_data = '&user_name='. $user_name .'&password='. $password;

// 	if (empty($user_name)) {
// 		header("Location: signup.php?error=User Name is required&$user_data");
// 	    exit();
// 	}else if(empty($password)){
//         header("Location: signup.php?error=Password is required&$user_data");
// 	    exit();
// 	}
	
// 	else{
//     echo "abl hash";
//     echo "abl hash";
// 		// hashing the password

//         $sql = "SELECT * FROM users WHERE user_name='$user_name' AND password='$password'";
// 		$result = mysqli_query($con, $sql);
        
//     echo "dsfsf";

//     if (mysqli_num_rows($result) === 1) {
//         $row = mysqli_fetch_assoc($result);
//         if ($row['user_name'] === $user_name && $row['password'] === $password) {
//             $_SESSION['user_name'] = $row['user_name'];
//             header("Location: index.php");
//             exit();
//         }else{
//             header("Location: login.php?error=Incorect User name or password");
//             exit();
//         }
//     }else{
//         header("Location: login.php?error=Incorect User name or password");
//         exit();
//     }
// 	}
	
// }else{
//   echo "abl";
// 	header("Location: login.php");
//   echo "b3d";
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
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="style/all.min.css">
</head>

<body class="main-col">
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-8">
                <div class="login-form main-col text-center p-5 ">
                    <h1 class="txt-col pb-4 "><?php echo e(trans('signup.Registration_webpage')); ?></h1>
                    <form method="POST" onsubmit="return validateForm()"  action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="text" name="user_name" id="user_name" placeholder='<?php echo e(trans('login.user_name')); ?>'
                            class="w-100 bg-transparent form-control text-white mb-3">
                        <input type="password" name="password" id="password" placeholder='<?php echo e(trans('login.password')); ?>'
                            class="w-100 bg-transparent form-control text-white mb-3">
                        <p id="signinalert"></p>
                        <?php if(Session :: has ('success') ): ?>
                        <p class="success success-col"> 
                            <?php echo e(Session :: get ('success')); ?>

                        </p>
                        <?php elseif(Session::has('error')): ?>
                        <p class="error text-danger">
                            <?php echo e(Session :: get ('error')); ?>

                        </p>
                        <?php endif; ?>

                        <button class="w-100  rounded btn btn-form" id="signupbtn"><?php echo e(trans('login.login')); ?></button>
                        <p class="text-white pt-4"><?php echo e(trans('login.haveNoAccount')); ?> <a href="<?php echo e(url('signup')); ?>" class="text-white"
                                id="signin"><?php echo e(trans('login.signUp')); ?></p>
                    </form>

                </div>
            </div>
        </div>

    </div>


    <script>
    function validateForm() {
        var user_name = document.getElementById("user_name").value;
        var password = document.getElementById("password").value;

        // Check if all fields are filled in
        if (user_name == "" || password == "") {
            document.getElementById("signinalert").innerHTML = "All inputs is required";
            document.getElementById("signinalert").style.color = 'red';
            return false;
        }

        // Check if full name only contains letters and spaces
        if (!user_name.match(/^[A-Za-z ]+$/)) {
            document.getElementById("signinalert").innerHTML = "user name can only contain letters and spaces";
            document.getElementById("signinalert").style.color = 'red';
            return false;
        }

        // Check if password meets requirements

        if (!password.match(/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/)) {
            document.getElementById("signinalert").innerHTML =
                "Minimum eight characters, at least one letter, one number and one special character";
            document.getElementById("signinalert").style.color = 'red';
            return false;
        }

        // If all validations pass, submit the form
        return true;
    }
    </script>


</body>

</html>



<!-- <?php 
// include "footer.php"
;?> --><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/laravel/Assignment2/resources/views/login.blade.php ENDPATH**/ ?>