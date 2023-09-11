<?php
require '../controllers/sessionVerify.php';
?>

<!doctype html>
<html lang="en">

<head>
    <title>WorkTest | Task Manager</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="theme-color" content="#000000">
    <link rel="icon" href="../assets/imgs/checklist.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="../assets/css/home.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;1,100;1,500;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <?php
    require_once '../required_components/modalNewRequire.php';
    require_once '../required_components/modalEditRequire.php';
    require_once '../required_components/modalEditProgress.php';
    ?>
    <nav class="navbar navbar_top">
        <div class="container">
            <a class="navbar-brand brand_top" href="#">
                WorkTest | <span id="markTitle">Task Manager</span>
                <i class="fas fa-tasks" style="color:#e91e63"></i>
            </a>
            <div class="menu">
                <div class="dropdown">
                    <button class="dropdown-toggle" style="background-color:transparent;border:none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span style="visibility: hidden;">Dropdown button</span><i class="fas fa-bars"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user" style="color:gray;margin-right:5px"></i> <?php echo $username ?></a></li>
                        <li class="dropdown-divider"><a class="dropdown-item" href="#"></a></li>
                        <li><a class="dropdown-item" href="../controllers/closeSession.php"><i class="fas fa-sign-out-alt" style="color:gray;margin-right:5px"></i>Log out</a></li>
                    </ul>
                </div>
            </div>
        </div>|
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="tasks dropzone mb-3">
                    <div class="title_box moveTask">
                        <h1 class="h1_title">Tasks <span title="Create a new task" style="float:right;color:#e91e71"> <i data-bs-toggle="modal" data-bs-target="#exampleModal" class="fas fa-plus"></i></span></h1>
                        <hr>
                        <?php
                        require_once('../required_components/requestsCard.php');
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="tasks dropzone mb-3">
                    <div class="title_box moveTask">
                        <h1 class="h1_title">Pending <span title="Pending tasks" style="float:right;color:#ff5722"> <i class="fas fa-spinner"></i></span></h1>
                        <hr>
                        <?php
                        require_once('../required_components/progressCard.php');
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="tasks dropzone mb-3">
                    <div class="title_box moveTask">
                        <h1 class="h1_title">Finished <span title="Finished tasks" style="float:right;color:#4caf50"> <i class="fas fa-check"></i></span></h1>
                        <hr>
                        <?php
                        require_once('../required_components/finishedCard.php');
                        ?>
                    </div>
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
    <script src="../assets/js/home.js">
    </script>
</body>

</html>