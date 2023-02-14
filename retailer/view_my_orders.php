<?php
	require("../config.php");
	include("../validate_data.php");
	session_start();
	if(isset($_SESSION['retailer_login'])) {
		if(isset($_SESSION['retailer_login']) == true && isset($_SESSION['retailer_id'])) {
			$retailer_id = $_SESSION['retailer_id'];
			$error = "";
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				if(isset($_POST['cmbFilter'])) {
					if(!empty($_POST['txtId'])) {
						$result = validate_number($_POST['txtId']);
						if($result == 1) {
							$order_id = $_POST['txtId'];
							$query_selectOrder = "SELECT * FROM orders,retailer,area WHERE orders.retailer_id=retailer.retailer_id AND retailer.area_id=area.area_id AND order_id='$order_id' AND orders.retailer_id='$retailer_id'";
							$result_selectOrder = mysqli_query($con,$query_selectOrder);
							$row_selectOrder = mysqli_fetch_array($result_selectOrder);
							if(empty($row_selectOrder)){
							   $error = "* No order was found with this ID";
							}
							else {
								mysqli_data_seek($result_selectOrder,0);
							}
						}
						else {
							$error = "* Invalid ID";
						}
					}
					else if(!empty($_POST['txtDate'])) {
						$date = $_POST['txtDate'];
						$query_selectOrder = "SELECT * FROM orders,retailer,area WHERE orders.retailer_id=retailer.retailer_id AND retailer.area_id=area.area_id AND date='$date' AND orders.retailer_id='$retailer_id'";
						$result_selectOrder = mysqli_query($con,$query_selectOrder);
						$row_selectOrder = mysqli_fetch_array($result_selectOrder);
						if(empty($row_selectOrder)){
						   $error = "* No order was found with the selected Date";
						}
						else {
							mysqli_data_seek($result_selectOrder,0);
						}
						
					}
					else if(!empty($_POST['cmbStatus'])) {
						if($_POST['cmbStatus'] == "zero") {
							$status = 0;
						}
						else {
							$status = $_POST['cmbStatus'];
						}
						$query_selectOrder = "SELECT * FROM orders,retailer,area WHERE orders.retailer_id=retailer.retailer_id AND retailer.area_id=area.area_id AND status='$status' AND orders.retailer_id='$retailer_id' ORDER BY approved,order_id DESC";
						$result_selectOrder = mysqli_query($con,$query_selectOrder);
						$row_selectOrder = mysqli_fetch_array($result_selectOrder);
						if(empty($row_selectOrder)){
						   $error = "* No order was found";
						}
						else {
							mysqli_data_seek($result_selectOrder,0);
						}
					}
					else if(!empty($_POST['cmbApproved'])) {
						if($_POST['cmbApproved'] == "zero") {
							$approved = 0;
						}
						else {
							$approved = $_POST['cmbApproved'];
						}
						$query_selectOrder = "SELECT * FROM orders,retailer,area WHERE orders.retailer_id=retailer.retailer_id AND retailer.area_id=area.area_id AND approved='$approved' AND orders.retailer_id='$retailer_id' ORDER BY order_id DESC";
						$result_selectOrder = mysqli_query($con,$query_selectOrder);
						$row_selectOrder = mysqli_fetch_array($result_selectOrder);
						if(empty($row_selectOrder)){
						   $error = "* No order was found";
						}
						else {
							mysqli_data_seek($result_selectOrder,0);
						}
					}
					else {
						$error = "* Please enter the data to search for.";
					}
				}
				else {
					$error = "Please choose an option to search for.";
				}
			}
			else {
				$query_selectOrder = "SELECT * FROM orders WHERE retailer_id='$retailer_id'";
				$result_selectOrder = mysqli_query($con,$query_selectOrder);
			}
		}
		else {
			header('Location:../index.php');
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
	<title>dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
	<meta content="Themesbrand" name="author" />
	<script src="https://kit.fontawesome.com/78e0d6a352.js" crossorigin="anonymous"></script>
	<!-- App favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">
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
						<button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img class="rounded-circle header-profile-user" src="#" alt=""> <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">Retailer</span> <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i> </button>
						<div class="dropdown-menu dropdown-menu-end">
							<!-- item--><a class="dropdown-item" href="#"><i
									class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span
									class="align-middle">View Profile</span></a> 
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
							<a href="javascript: void(0);" class="has-arrow waves-effect"> <i class=" fas fa-users fa-3x"></i> <span>Manufacturers</span> </a>
							<ul class="sub-menu" aria-expanded="false">
								<li><a href="manufacturers.php">View Manufacturers</a></li>
								
							</ul>
						</li>
						<li>
							<a href="javascript: void(0);" class="has-arrow waves-effect"><i class="fas fa-users fa-3x"></i> <span>Distributors</span> </a>
							<ul class="sub-menu" aria-expanded="false">
								<li><a href="distributors.php">View Distributors</a></li>
								
							</ul>
						</li>
						<li>
							<a href="javascript: void(0);" class="has-arrow waves-effect">  <i class="fas fa-users fa-3x"></i></i> <span>wholesalers</span> </a>
							<ul class="sub-menu" aria-expanded="false">
								<li><a href="wholesaler.php">View wholesalers</a></li>
								
							</ul>
						</li>
						
						<li>
							<a href="javascript: void(0);" class="has-arrow waves-effect"><i class="fa-brands fa-product-hunt fa-3x"></i></i> <span>Products</span> </a>
							<ul class="sub-menu" aria-expanded="false">
								<li><a href="add_products.php">Add Products</a></li>
								<li><a href="products.php">View Products</a></li>
								
							</ul>
						</li>
                        <li>
							<a href="javascript: void(0);" class="has-arrow waves-effect"><i class="fas fa-shopping-cart fa-3x"></i> <span>orders</span> </a>
							<ul class="sub-menu" aria-expanded="false">
								<li><a href="view_my_orders.php">my orders</a></li>
								<li><a href="order_items.php">New order</a></li>
								
							</ul>
						</li>
						
						<li>
							<a href="invoice.php" > <i class="fas fa-file-invoice fa-3x"></i><span>Invoices</span> </a>
							
						</li>
						
					</ul>
				</div>
				<!-- Sidebar -->
			</div>
		</div>

	<div class="main-content">
			<div class="page-content">
				<div class="container-fluid">
					<!-- start page title -->
					
                    <h1>My Orders</h1>
                    
                    
                    <form action="" method="POST" class="form">
                    <table class="table table-centered datatable dt-responsive nowrap table-card-list"
                                    style="border-collapse: collapse; border-spacing: 0 12px; width: 100%;">
                        <tr>
                            <th> Order ID </th>
                            <th> Date </th>
                            <th> Approved </th>
                            <th> Status </th>
                            <th> Details </th>
                        </tr>
                        <?php $i=1; while($row_selectOrder = mysqli_fetch_array($result_selectOrder)) { ?>
                        <tr>
                        
                            <td> <?php echo $row_selectOrder['order_id']; ?> </td>
                            
                            <td> <?php echo date("d-m-Y",strtotime($row_selectOrder['date'])); ?> </td>
                            <td>
                                <?php
                                    if($row_selectOrder['approved'] == 0) {
                                        echo "Not Approved";
                                    }
                                    else {
                                        echo "Approved";
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    if($row_selectOrder['status'] == 0) {
                                        echo "Pending";
                                    }
                                    else {
                                        echo "Completed";
                                    }
                                ?>
                            </td>
                            <td> <a href="view_order_items.php?id=<?php echo $row_selectOrder['order_id']; ?>">Details</a> </td>
                        </tr>
                        <?php $i++; } ?>
                    </table>
                    </form>
            
                
                <script type="text/javascript">
                    $('#cmbFilter').change(function() {
                        var selected = $(this).val();
                        if(selected == "id"){
                            $('#txtId').show();
                            $('#datepicker').hide();
                            $('#cmbStatus').hide();
                            $('#cmbApproved').hide();
                        }
                        else if (selected == "date"){
                            $('#txtId').hide();
                            $('#datepicker').show();
                            $('#cmbStatus').hide();
                            $('#cmbApproved').hide();
                        }
                        else if (selected == "status"){
                            $('#txtId').hide();
                            $('#datepicker').hide();
                            $('#cmbStatus').show();
                            $('#cmbApproved').hide();
                        }
                        else if (selected == "approved"){
                            $('#txtId').hide();
                            $('#datepicker').hide();
                            $('#cmbStatus').hide();
                            $('#cmbApproved').show();
                        }
                    });
                </script>
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