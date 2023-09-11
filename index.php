<?php
session_start();
if (isset($_COOKIE['token']) && !empty($_COOKIE['token']) || isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    header('Location: views/home.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>WorkTest | Task Manager</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" href="assets/imgs/checklist.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;1,100;1,500;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="assets/css/index.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar_top">
        <div class="container">
            <a class="navbar-brand brand_top" href="#">
                WorkTest | <span id="markTitle">Task Manager</span>
                <i class="fas fa-tasks" style="color:#e91e63"></i>

            </a>
        </div>
    </nav>
    <div class="container-fluid">
        <!-- <div class="row">
            <div class="col-12">
               
            </div>
        </div> -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-xl-12 col-lg-12 col-md-12">
                <div class="white-box">
                    <form id="login-form">
                        <h5 class=" mb-3 loginTitle animate__headShake animate__animated">Please,
                            Log In</h5>
                        <div class="mb-2">
                            <input type="email" onchange="formValidation('onchange')" class="form-control" name="email" placeholder="name@example.com">
                        </div>
                        <div class="mt-3 mb-3">
                            <span class=" alertsAuthEmail  animate__headShake animate__animated"></span>
                        </div>
                        <!-- <div class="mb-2">
                            <input type="password" onchange="formValidation('onchange')" class="form-control" name="password" placeholder="Password">
                        </div> -->
                        <div class="input-group mb-3">
                            <input type="password" id="password" class="form-control" placeholder="Password" name="password" aria-describedby="basic-addon2">
                            <span class="input-group-text" onclick="showPass()" id="basic-addon2"><i class="fas fa-eye"></i></span>
                        </div>
                        <div class="mt-3 mb-3">
                            <span class="alertsAuth  animate__headShake animate__animated"></span>
                        </div>
                        <div class="checkbox mb-3">
                            <label style="color:#b3b3b3">
                                <input type="checkbox" id="rememberme" name="rememberme"> Recuerdame
                                <input name="login" value="true" class="d-none">
                            </label>
                        </div>
                        <button class="w-100 btnSubmit btn btn-lg" style="background-color:#000000;color:whitesmoke" type="button" onclick="formValidation(false)">Sign
                            in</button>
                        <p class="mt-5 mb-3 text-muted">
                            <center><a id="register" class="options" href="#" onclick="activeSignUp()">Sign Up</a>
                            </center>
                            <!-- <center><a id="forgot-password" class="options" onclick="activeForgot()" href="#">Forgot password?</a></center> -->
                        </p>
                    </form>

                    <form id="reg-form" class="d-none">
                        <h5 class=" mb-3 loginTitle animate__headShake animate__animated">Create a new account</h5>
                        <div class="mb-2">
                            <input type="text" maxlength="20" class="form-control" name="name" placeholder="Username">
                        </div>
                        <div class="mb-2">
                            <input type="Email" class="form-control" name="email" placeholder="name@example.com">
                        </div>
                        <div class="mb-2">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="mb-2">
                            <input type="password" class="form-control" name="password_verify" placeholder="Confirm your password">
                        </div>
                        <div class="mt-3 mb-3">
                            <span class="alertsAuth  animate__headShake animate__animated"></span>
                        </div>
                        <div class="mb-2">
                            <input class="d-none" name="register">
                        </div>
                        <button class="w-100 btnSubmit btn btn-lg" style="background-color:#000000;color:whitesmoke" type="button" onclick="formValidationReg()">Go</button>
                        <p class="mt-5 mb-3 text-muted">
                            <center><a id="login" class="options" href="#" onclick="activeSignIn()">Sign in</a></center>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="brand_bottom" href="#">
        <div class="iam" onclick="window.location.href='https://www.linkedin.com/in/andresfontalvo/'">
            Designed and Developed By | <span id="markTitleBottom"> Andrés Fontalvo</span>
            <i class="fab fa-linkedin" style="color:black;margin-left:5px"></i>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="assets/js/index.js">
    </script>

</body>

</html>