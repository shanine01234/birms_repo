<?php 
require_once('inc/header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bantayan Island Restobar</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/datatables.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .navbar-nav {
            display: flex;
            justify-content: center;
            width: 100%;
        }
        .nav-item {
            text-align: center;
            color: black !important;
            margin: 0 15px; /* Adjust the spacing here */
          
        }
        .nav-link, .nav-link i {
            color: black !important;
        }
        .navbar-toggler-icon {
        background-color: black; /* Sets the background color of the toggler icon */
    }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-light">
        <div class="container-fluid" style="background-color: transparent;"> 
            <a class="navbar-brand" href="#">
            <img src="img/logo.jpg" alt="" width="30" height="24">
                <span style="color: black;   ">Bantayan Island Restobar</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a class="nav-link" href="index.php">
                <i class="fas fa-home"></i> Home
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="restobar.php">
                <i class="fas fa-utensils"></i> Restobar
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="about.php">
                <i class="fas fa-info-circle"></i> About
            </a>
        </li>
        <li class="nav-item">
                        <a class="nav-link position-relative" href="cart.php">
                            <i class="fas fa-shopping-cart"></i> Cart
                            <span class="badge bg-danger position-absolute top-0 end-0"><?= $count_cart->num_rows ?? 0 ?></span>
                        </a>
                    </li>

                    <li class="nav-item">
            <a class="nav-link position-relative" href="orders.php" >
                <i class="fas fa-file"></i> Orders
                <span class="badge bg-danger position-absolute top-0 end-0"><?= $order_count->num_rows ?? 0 ?></span>
            </a>
        </li>

        <?php 
            if (isset($user_id)) {
                ?>
                  <li class="nav-item dropdown">
            <a class="nav-link" href="#" data-bs-toggle="dropdown">
            <i class="fas fa-user"></i> 
            <span class="d-flex align-items-center gap-2"><?= $_SESSION['name'] ?>
                <i class="fa fa-caret-down"></i></span>
            </a>

            <ul class="dropdown-menu">
                <li class="dropdown-item">
                    <a href="?logout" class="text-dark text-decoration-none"><i class="fa fa-sign-out"></i> Logout</a>
                </li>
            </ul>
        </li>

                <?php 
            }else{
                ?>
                  <li class="nav-item">
            <a class="nav-link" href="login.php">
                <i class="fas fa-user"></i> Login
            </a>
        </li>

                <?php 
            }
        ?>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="https://facebook.com" target="_blank">
                <i class="fab fa-facebook"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="https://instagram.com" target="_blank">
                <i class="fab fa-instagram"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="https://twitter.com" target="_blank">
                <i class="fab fa-twitter"></i>
            </a>
        </li>
    </ul>
</div>

        </div>
    </nav>
    <div class="container-fluid">
        <div class="row d-flex align-items-center justify-content-center" style="height: 100vh; width: 100%;">
            <div class="col-md-6 text-center">
                <h1>Welcome to Bantayan Island Restobar Management System</h1>
                <a href="restobar.php" class="btn btn-warning mt-2">Visit our RESTOBARS</a>
            </div>
        </div>
    </div>

    <style>
        body{
            background-image: url('img/photos/bantayan island.jpg');
            background-size:cover;
            height: 100%;
            width: 100%;
            h1{
  color: white;
}
        }
       
    </style>

    <!-- Bootstrap core JavaScript-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/datatables.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
