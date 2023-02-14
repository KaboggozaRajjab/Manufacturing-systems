<?php

include"config.php";
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
	<meta content="Themesbrand" name="author" />
	<script src="https://kit.fontawesome.com/78e0d6a352.js" crossorigin="anonymous"></script>
	<!-- App favicon -->
	<!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->
	<!-- Bootstrap Css -->
	<link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
	<!-- Icons Css -->
	<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<!-- App Css-->
	<link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
	<script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
	<link rel="stylesheet" href="style.css" >

</head>

<body>
	<!-- <body data-layout="horizontal" data-topbar="colored"> -->
	<!-- Begin page -->
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
					<button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn"> <i class="fa fa-fw fa-bars"></i> </button>
					<!-- App Search-->
					<form class="app-search d-none d-lg-block">
						<div class="position-relative">
							<input type="text" class="form-control" placeholder="Search..."> <span class="uil-search"></span> </div>
					</form>
				</div>
				<div class="d-flex">
					<div class="dropdown d-inline-block d-lg-none ms-2">
						<button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="uil-search"></i> </button>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
							<form class="p-3">
								<div class="m-0">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
										<div class="input-group-append">
											<button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					
					<div class="dropdown d-none d-lg-inline-block ms-1">
						<button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="uil-apps"></i> </button>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
							<div class="px-lg-2">
								<div class="row g-0">
									<div class="col">
										<a class="dropdown-icon-item" href="#"> <img src="assets/images/brands/github.png" alt="Github"> <span>GitHub</span> </a>
									</div>
									<div class="col">
										<a class="dropdown-icon-item" href="#"> <img src="assets/images/brands/bitbucket.png" alt="bitbucket"> <span>Bitbucket</span> </a>
									</div>
									<div class="col">
										<a class="dropdown-icon-item" href="#"> <img src="assets/images/brands/dribbble.png" alt="dribbble"> <span>Dribbble</span> </a>
									</div>
								</div>
								<div class="row g-0">
									<div class="col">
										<a class="dropdown-icon-item" href="#"> <img src="assets/images/brands/dropbox.png" alt="dropbox"> <span>Dropbox</span> </a>
									</div>
									<div class="col">
										<a class="dropdown-icon-item" href="#"> <img src="assets/images/brands/mail_chimp.png" alt="mail_chimp"> <span>Mail Chimp</span> </a>
									</div>
									<div class="col">
										<a class="dropdown-icon-item" href="#"> <img src="assets/images/brands/slack.png" alt="slack"> <span>Slack</span> </a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="dropdown d-none d-lg-inline-block ms-1">
						<button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen"> <i class="uil-minus-path"></i> </button>
					</div>
					<div class="dropdown d-inline-block">
						<button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="uil-bell"></i> <span class="badge bg-danger rounded-pill">3</span> </button>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
							<div class="p-3">
								<div class="row align-items-center">
									<div class="col">
										<h5 class="m-0 font-size-16"> Notifications </h5> </div>
									<div class="col-auto"> <a href="#!" class="small"> Mark all as read</a> </div>
								</div>
							</div>
							<div data-simplebar style="max-height: 230px;">
								<a href="" class="text-reset notification-item">
									<div class="d-flex align-items-start">
										<div class="flex-shrink-0 me-3">
											<div class="avatar-xs"> <span class="avatar-title bg-primary rounded-circle font-size-16">
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
										<div class="flex-shrink-0 me-3"> <img src="assets/images/users/avatar-3.jpg" class="rounded-circle avatar-xs" alt="user-pic"> </div>
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
											<div class="avatar-xs"> <span class="avatar-title bg-success rounded-circle font-size-16">
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
										<div class="flex-shrink-0 me-3"> <img src="" class="rounded-circle avatar-xs" alt="user-pic"> </div>
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
									<a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)"> <i class="uil-arrow-circle-right me-1"></i> View More.. </a>
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
							<a href="javascript: void(0);" class="has-arrow waves-effect"><i class="uil-store"></i><i class="fas fa-shopping-cart fa-3x"></i></i> <span>Distributors</span> </a>
							<ul class="sub-menu" aria-expanded="false">
								<li><a href="add_distributors.php">Add Distributor</a></li>
								<li><a href="distributors.php">View Distributors</a></li>
								
							</ul>
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
								<h4 class="mb-0">Dashboard</h4>
								
								</div>
							</div>
						</div>
					</div>
					<!-- end page title -->
					<div class="row">
						<div class="col-md-6 col-xl-3">
							<div class="card" style="background-color:aqua;">
							
								<div class="card-body">
									<div class="float-end mt-2">
										<i class="fas fa-users fa-3x"></i>
										<?php
										$querry=mysqli_query($con, "select * from retailer");
										$total=mysqli_num_rows($querry);
										
										?>
									</div>
									<div>
									<h4 class="mb-1 mt-1"><span data-plugin="counterup"><?php echo $total; ?></span></h4>
										<p class="text-muted mb-0">Retailers</p>
									</div>
									
								</div>
							</div>
						</div>
						<!-- end col-->
						
						<!-- end col-->
						<div class="col-md-6 col-xl-3">
							<div class="card" style="background-color:blue;">
								<div class="card-body">
									<div class="float-end mt-2">
										<i class="fas fa-users fa-3x"></i>
										<?php
										$querry=mysqli_query($con, "select * from distributor");
										$total=mysqli_num_rows($querry);
										
										?>
									</div>
									<div>
										<h4 class="mb-1 mt-1"><span data-plugin="counterup"><?php echo $total; ?></span></h4>
										<p class="text-muted mb-0">Distributors</p>
									</div>
									
								</div>
							</div>
						</div>
						<!-- end col-->
						<div class="col-md-6 col-xl-3">
							<div class="card" style="background-color:orange;">
								<div class="card-body">
									<div class="float-end mt-2">
										<i class="fas fa-users fa-3x"></i>
										
									</div>
									<div>
										<h4 class="mb-1 mt-1"> <span data-plugin="counterup"></span></h4>
										<p class="text-muted mb-0">Customers</p>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-md-6 col-xl-3">
							<div class="card" style="background-color:brown;">
								<div class="card-body">
									<div class="float-end mt-2">
										<i class="fa fa-product-hunt "></i> 
										<?php
										$querry=mysqli_query($con, "select * from products");
										$total=mysqli_num_rows($querry);
										
										?>
									</div>
									<div>
										<h4 class="mb-1 mt-1"><span data-plugin="counterup"><?php echo $total; ?></span></h4>
										<p class="text-muted mb-0">Products</p>
									</div>
									
								</div>
							</div>
						<!-- end col-->
					</div>
					<!-- end row-->
					<div class="row">
						
						</div>
						<!-- end col-->
						<div class="col-md-6 col-xl-3">
							<div class="card" style="background-color:maroon;">
								<div class="card-body">
									<div class="float-end mt-2">
										<i class="fas fa-shopping-cart fa-3x"></i>
										<?php
										$querry=mysqli_query($con, "select * from orders");
										$total=mysqli_num_rows($querry);
										
										?>
									</div>
									<div>
										<h4 class="mb-1 mt-1"><span data-plugin="counterup"><?php echo $total; ?></span></h4>
										<p class="text-muted mb-0">Orders</p>
									</div>
									
								</div>
							</div>
						</div>
						<!-- end col-->
						<div class="col-md-6 col-xl-3">
							<div class="card" style="background-color:green;">
								<div class="card-body">
									<div class="float-end mt-2">
										<i class="fas fa-file-invoice fa-3x"></i>
										<?php
										$querry=mysqli_query($con, "select * from invoice");
										$total=mysqli_num_rows($querry);
										
										?>
									</div>
									<div>
										<h4 class="mb-1 mt-1"><span data-plugin="counterup"><?php echo $total; ?></span></h4>
										<p class="text-muted mb-0">Invoices</p>
									</div>
									
								</div>
							</div>
						</div>
						<!-- end col-->
						<div class="col-md-6 col-xl-3">
							<div class="card" style="background-color:tan;">
								<div class="card-body">
									<div class="float-end mt-2">
										<i class="fas fa-users fa-3x"></i>
										<?php
										$querry=mysqli_query($con, "select * from wholesaler");
										$total=mysqli_num_rows($querry);
										
										?>
									</div>
									<div>
										<h4 class="mb-1 mt-1"><span data-plugin="counterup"><?php echo $total; ?></span></h4>
										<p class="text-muted mb-0">wholesalers</p>
									</div>
									
								</div>
							</div>
						</div>
						<!-- end col-->
					</div>
					<!-- end row-->
					
				<!-- container-fluid -->
			</div>
			<!-- End Page-content -->
			<footer class="footer">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-6">
							<script>
							document.write(new Date().getFullYear())
							</script> © stock management. </div>
						
					</div>
				</div>
			</footer>
		</div>
		<!-- end main content-->
	</div>
	<!-- END layout-wrapper -->
	<!-- Right Sidebar -->
	<div class="right-bar">
		<div data-simplebar class="h-100">
			<div class="rightbar-title d-flex align-items-center px-3 py-4">
				<h5 class="m-0 me-2">Settings</h5>
				<a href="javascript:void(0);" class="right-bar-toggle ms-auto"> <i class="mdi mdi-close noti-icon"></i> </a>
			</div>
			<!-- Settings -->
			<hr class="mt-0" />
			<h6 class="text-center mb-0">Choose Layouts</h6>
			<div class="p-4">
				<div class="mb-2"> <img src="assets/images/layouts/layout-1.jpg" class="img-thumbnail" alt="layout images"> </div>
				<div class="form-check form-switch mb-3">
					<input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked />
					<label class="form-check-label" for="light-mode-switch">Light Mode</label>
				</div>
				<div class="mb-2"> <img src="assets/images/layouts/layout-2.jpg" class="img-thumbnail" alt="layout images"> </div>
				<div class="form-check form-switch mb-3">
					<input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch" />
					<label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
				</div>
				<div class="mb-2"> <img src="assets/images/layouts/layout-3.jpg" class="img-thumbnail" alt="layout images"> </div>
				<div class="form-check form-switch mb-3">
					<input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch" />
					<label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
				</div>
				<div class="mb-2"> <img src="assets/images/layouts/layout-4.jpg" class="img-thumbnail" alt="layout images"> </div>
				<div class="form-check form-switch mb-5">
					<input class="form-check-input theme-choice" type="checkbox" id="dark-rtl-mode-switch">
					<label class="form-check-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
				</div>
			</div>
		</div>
		<!-- end slimscroll-menu-->
	</div>
	<!-- /Right-bar -->
	<!-- Right bar overlay-->
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
</body>

</html>