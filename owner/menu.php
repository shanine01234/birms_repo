<?php 
require_once('../inc/function.php');
include('process/restobar_proc.php');

if (!isset($_SESSION['owner_id'])) {
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BIRMS | Owner Menus</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/datatables.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">BIRMS Owner</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

          <!-- Nav Item - Dashboard -->
          <li class="nav-item ">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
    <a class="nav-link" href="sales.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span> Sales Dashboard</span></a>
</li>
        
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pages
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item ">
                <a class="nav-link" href="branch.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>My Branches</span></a>
            </li>

             <!-- Nav Item - Charts -->
             <li class="nav-item  active">
                <a class="nav-link" href="menu.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>My Menus</span></a>

            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="resto_details.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>My Restobar Details</span></a>
            </li>
            <li class="nav-item active">
                  <a class="nav-link" href="order.php">
                  <i class="fas fa-fw fa-table"></i>
                   <span>My Orders</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php 
                                $myrow = $oop->displayOwnerDets($_SESSION['owner_id']);
                                foreach($myrow as $row){
                                ?>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$row['firstname']." ".$row['lastname']?>r</span>
                                <img class="img-profile rounded-circle"
                                    src="../img/profiles/<?php if(empty($row['profile'])){ echo 'owner.png'; }else{ echo $row['profile'];}?>">
                                <?php 
                                }
                                ?>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">My Menu</h1>
                     
                    </div>

                    <!-- Content Row -->

                    <div class="row">
                        <div class="col-md-3">
                        <?php 
									if (isset($_GET['update'])) {
										$id = $_GET['update'];
										$myrow = $oop->displayMenuByID($id);
											foreach ($myrow as $rows){
											?>
											<form action="" method="POST" enctype="multipart/form-data">
												<div class="card shadow p-2">
													<span class="mb-3 text-center"><i class="align-middle" data-feather="edit"></i> Update Product</span>
													<label>Product name</label>
													<input type="text" name="product_name" value="<?=$rows['product_name']?>" class="form-control mb-1" required>
													<label>Product type</label>
													<select class="form-select mb-1" name="product_type" aria-label="Default select example" required>
														<option value="<?=$rows['product_type']?>" selected><?=$rows['product_type']?></option>
														<option value="Food">Food</option>
														<option value="Drinks">Drinks</option>
													</select>
													<label>Price</label>
													<input type="text" value="<?=$rows['price']?>" name="price" class="form-control mb-1" required>
													<label>Product Photo</label>
													<input type="text" name="id" value="<?=$rows['id']?>" style="display: none;">
													<input type="text" name="oldProductPhoto" value="<?=$rows['product_photo']?>" style="display: none;">
													<input type="file" accept="image/.png, .jpg, .jpeg" name="productPhoto" class="form-control mb-3">
													<button type="submit" class="btn btn-primary mb-1" name="updateProduct"><i class="align-middle" data-feather="check-circle"></i> Save</button>
													<a href="?" class="btn btn-info">Cancel</a>
												</div>
											</form>
											<?php
											}
									}else {
										?>
										<form action="" method="POST" enctype="multipart/form-data">
										<div class="card shadow p-2">
											<span class="mb-3 text-center"><i class="align-middle" data-feather="plus"></i> Add to Menu</span>
											<label>Product name</label>
											<input type="text" name="product_name" class="form-control mb-1" required>
											<label>Product type</label>
											<select class="form-select mb-1" name="product_type" aria-label="Default select example" required>
												<option value="Food">Food</option>
												<option value="Drinks">Drinks</option>
											</select>
											<label>Price</label>
											<input type="text" name="price" class="form-control mb-1" required>
											<label>Product Photo</label>
											<input type="file" accept="image/.png, .jpg, .jpeg" name="productPhoto" class="form-control mb-3" required>
											<button type="submit" class="btn btn-primary" name="addProduct"><i class="align-middle" data-feather="plus"></i> Add</button>
										</div>
										</form>
										<?php
									}
									?>
                        </div>
                        <div class="col">
                        <!-- Area Chart -->
                        <div class="card shadow mb-4 p-4 w-100">
                            <?=$msgAlert?>
                            <div class="data_table">
                                <table id="dashprint" class="table table-striped table-bordered">
                                    <thead class="table">
                                        <tr>
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Product Type</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $myrow = $oop->displayMenu($_SESSION['owner_id']);
                                        $k = 1;
                                        foreach($myrow as $row){
                                            ?>
                                            <tr>
                                                <td><?=$k++?></td>
                                                <td><?=$row['product_name']?></td>
                                                <td><?=$row['product_type']?></td>
                                                <td>₱<?=$row['price']?></td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#viewModal<?=$row['id']?>" class="btn btn-info "> <i class="fas fa-eye fa-sm fa-fw"></i></a>
                                                    <a href="?update=<?=$row['id']?>" class="btn btn-warning "> <i class="fas fa-edit fa-sm fa-fw"></i></a>
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal<?=$row['id']?>" class="btn btn-danger "> <i class="fas fa-trash fa-sm fa-fw"></i></a>
                                                </td>
                                            </tr>
                                            <!-- View Modal -->
                                            <div class="modal fade" id="viewModal<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">View</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <div class="row">
                                                            <div class="row p-4">
                                                               <center>
                                                               <img src="../img/product/<?=$row['product_photo']?>" style="width: 100%; height: 300px;">
                                                               </center> 
                                                            </div>
                                                            <div class="col-md-5 mt-2 detail-title">
                                                                <p>Product Name:</p>
                                                                <p>Product Type:</p>
                                                                <p>Price:</p>
                                                            </div>
                                                            <div class="col mt-2 details">
                                                                <p><?= $row['product_name']?></p>
                                                                <p><?= $row['product_type']?></p>
                                                                <p><?= $row['price']?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <!-- Delete Modal -->
                                             <div class="modal fade" id="deleteModal<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete this product?</p>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <form action="" method="POST"> 			
                                                        <input type="text" value="<?= $row['id']?>" name="id" style="display:none;">													
                                                        <button type="submit" name="deleteProduct" class="btn btn-danger"><i class="align-middle" data-feather="trash"></i> Yes</button>
                                                        </form>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                      
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Group &copy; BSIT</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="process/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
    <script src="../js/custom.js"></script>
    <script src="../js/datatables.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>