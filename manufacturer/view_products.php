<?php
	include("../config.php");
	session_start();
	if(isset($_SESSION['manufacturer_login'])) {
			$query_selectProducts = "SELECT * FROM products,categories,unit WHERE products.pro_cat=categories.cat_id AND products.unit=unit.id ORDER BY pro_id";
			$result_selectProducts = mysqli_query($con,$query_selectProducts);
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				if(isset($_POST['chkId'])) {
					$chkId = $_POST['chkId'];
					foreach($chkId as $id) {
						$query_deleteProduct = "DELETE FROM products WHERE pro_id='$id'";
						$result = mysqli_query($con,$query_deleteProduct);
					}
					if(!$result) {
						echo "<script> alert(\"Can not delete the product which has been order by retailer\"); </script>";
						header('Refresh:0');
					}
					else {
						echo "<script> alert(\"Products Deleted Successfully\"); </script>";
						header('Refresh:0');
					}
				}
			}
		}
		else {
			header('Location:../index.php');
		}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <title>view product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
</head>
<body>
	<div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <!-- <img src="assets/images/logo-sm.png" alt="" height="22"> -->
                            </span>


                    </div>
                    <button type="button"
                        class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn"> <i
                            class="fa fa-fw fa-bars"></i> </button>
                    <!-- App Search-->
                    <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search..."> <span
                                class="uil-search"></span>
                        </div>
                    </form>
                </div>
                <div class="d-flex">
                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="uil-search"></i> </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-search-dropdown">
                            <form class="p-3">
                                <div class="m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..."
                                            aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"> <i class="uil-apps"></i> </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <div class="px-lg-2">
                                <div class="row g-0">
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#"> <img
                                                src="assets/images/brands/github.png" alt="Github"> <span>GitHub</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#"> <img
                                                src="assets/images/brands/bitbucket.png" alt="bitbucket">
                                            <span>Bitbucket</span> </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#"> <img
                                                src="assets/images/brands/dribbble.png" alt="dribbble">
                                            <span>Dribbble</span> </a>
                                    </div>
                                </div>
                                <div class="row g-0">
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#"> <img
                                                src="assets/images/brands/dropbox.png" alt="dropbox">
                                            <span>Dropbox</span> </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#"> <img
                                                src="assets/images/brands/mail_chimp.png" alt="mail_chimp"> <span>Mail
                                                Chimp</span> </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#"> <img
                                                src="assets/images/brands/slack.png" alt="slack"> <span>Slack</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            data-bs-toggle="fullscreen"> <i class="uil-minus-path"></i> </button>
                    </div>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="uil-bell"></i> <span
                                class="badge bg-danger rounded-pill">3</span> </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="m-0 font-size-16"> Notifications </h5>
                                    </div>
                                    <div class="col-auto"> <a href="#!" class="small"> Mark all as read</a> </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">
                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-xs"> <span
                                                    class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="uil-shopping-basket"></i>
                                                </span> </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Your order is placed</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">If several languages coalesce the grammar</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0 me-3"> <img src="assets/images/users/avatar-3.jpg"
                                                class="rounded-circle avatar-xs" alt="user-pic"> </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">James Lemire</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">It will seem like simplified English.</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-xs"> <span
                                                    class="avatar-title bg-success rounded-circle font-size-16">
                                                    <i class="uil-truck"></i>
                                                </span> </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Your item is shipped</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">If several languages coalesce the grammar</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0 me-3"> <img src="assets/images/users/avatar-4.jpg"
                                                class="rounded-circle avatar-xs" alt="user-pic"> </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Salena Layfield</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2 border-top">
                                <div class="d-grid">
                                    <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                        <i class="uil-arrow-circle-right me-1"></i> View More.. </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img class="rounded-circle header-profile-user" src="#" alt=""> <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">Manufacturer</span> <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i> </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item--><a class="dropdown-item" href="edit_profile.php"><i
                                    class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span
                                    class="align-middle">Edit Profile</span></a> 
                                    <a class="dropdown-item" href="logout.php">
                                        <i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span
                                    class="align-middle">Sign out</span></a>
                        </div>
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect"> <i class="uil-cog"></i> </button>
                        </div>
                    </div>
            </div>
        </header>
        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu" style="background-color:black ;">
            <!-- LOGO -->
            <div class="navbar-brand-box" style="background-color:black ;">
                <a href="dashboard.php" ><img style="width: 60%;" src="ghj.jpg"> </a>
                <!-- <h3> M&DS</h3> -->
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn"> <i class="fa fa-fw fa-bars"></i> </button>
            <div data-simplebar class="sidebar-menu-scroll" style="background-color:black;">
                <!--- Sidemenu -->
                <div id="sidebar-menu" >
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        
                        
                        
                        
                    <li>
							<a href="dashboard.php" > <i class="fas fa-dashboard"></i><span>Dashboard</span> </a>
							
						</li>
							<li>
							<a href="manage_stock.php" > <i class="uil-store"></i> <i class="fas fa-shopping-cart fa-3x"></i> <span>Manage stock</span> </a>
						</li>
							<li>
							<a href="view_unit.php" > <i class="uil-store"></i> <i class="fas fa-shopping-cart fa-3x"></i> <span>Manage unit</span> </a>
							
						</li>
							
						<li>
							<a href="view_category.php" > <i class="uil-store"></i> <i class="fas fa-shopping-cart fa-3x"></i> <span>Manage category</span> </a>
							
						</li>
						<li>
							<a href="javascript: void(0);" class="has-arrow waves-effect"><i class="uil-store"></i><i class="fas fa-shopping-cart fa-3x"></i></i> <span>Products</span> </a>
							<ul class="sub-menu" aria-expanded="false">
								<li><a href="add_product.php">Add Products</a></li>
								<li><a href="view_products.php">View Products</a></li>
								
							</ul>
						</li>
							
						<li>
							<a href="distributors.php" > <i class="uil-store"></i> <i class="fas fa-users fa-3x"></i> <span>Distributors</span> </a>
							
							
						</li>
							
						<li>
							<a href="retailers.php" > <i class="uil-store"></i> <i class="fas fa-users fa-3x"></i> <span>Retailers</span> </a>
							
							
						</li>
						
						<li>
							<a href="view_orders.php" > <i class="uil-store"></i> <i class="fas fa-shopping-cart fa-3x"></i> <span>Orders</span> </a>
							
							
						</li>
						<li>
							<a href="invoice.php" > <i class="uil-store"></i> <i class="fas fa-file-invoice fa-3x"></i><span>Invoices</span> </a>
							
						</li>
						
					</ul>
				</div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0"></h4>

                                <!-- <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Invoices</a></li>
                                        <li class="breadcrumb-item active">Retailers</li>
                                    </ol>
                                </div> -->

                            </div>
                        </div>
                    </div>
	
		            <div class="row">
                        <div class="col-lg-12">
                        <div class="table-responsive mb-4">

                        <table class="table table-centered datatable dt-responsive nowrap table-card-list"
                                    style="border-collapse: collapse; border-spacing: 0 12px; width: 100%;">
                            <h1>View Products</h1>
                            <form action="" method="POST" class="form">
                            
                                <tr>
                                    <th> <input type="checkbox" onClick="toggle(this)" /> </th>
                                    <th> Code </th>
                                    <th> Name </th>
                                    <th> Price </th>
                                    <th> Unit </th>
                                    <th> Category </th>
                                    <th> Quantity </th>
                                    <th> Edit </th>
                                    
                                </tr>
                                <?php $i=1; while($row_selectProducts = mysqli_fetch_array($result_selectProducts)) { ?>
                                <tr>
                                    <td> <input type="checkbox" name="chkId[]" value="<?php echo $row_selectProducts['pro_id']; ?>" /> </td>
                                    <td> <?php echo $row_selectProducts['pro_id']; ?> </td>
                                    <td> <?php echo $row_selectProducts['pro_name']; ?> </td>
                                    <td> <?php echo $row_selectProducts['pro_price']; ?> </td>
                                    <td> <?php echo $row_selectProducts['unit_name']; ?> </td>
                                    <td> <?php echo $row_selectProducts['cat_name']; ?> </td>
                                    <td> <?php if($row_selectProducts['quantity'] == NULL){ echo "N/A";} else {echo $row_selectProducts['quantity'];} ?> </td>
                                    <td> <a href="edit_product.php?id=<?php echo $row_selectProducts['pro_id']; ?>"><img src="../images/edit.png" alt="edit" /></a> </td>
                                </tr>
                                <?php $i++; } ?>
                        </table>
                            <input type="submit" value="Delete" class="submit_button"/>
                            </form>
	
	<div class="rightbar-overlay"></div>
            <!-- JAVASCRIPT -->
            <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
            <script src="assets/libs/jquery/jquery.min.js"></script>
            <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="assets/libs/metismenu/metisMenu.min.js"></script>
            <script src="assets/libs/simplebar/simplebar.min.js"></script>
            <script src="assets/libs/node-waves/waves.min.js"></script>
            <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
            <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
            <!-- apexcharts -->
            <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
            <script src="assets/js/pages/dashboard.init.js"></script>
            <!-- App js -->
            <script src="assets/js/app.js"></script>
            <!-- Required datatable js -->
            <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
            <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

            <!-- Responsive examples -->
            <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
            <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

            <!-- init js -->
            <script src="assets/js/pages/ecommerce-datatables.init.js"></script>
</body>
</html>