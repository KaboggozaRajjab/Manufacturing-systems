<?php
	include("../config.php");
	include("../validate_data.php");
	session_start();
	if(isset($_SESSION['manufacturer_login'])) {
		if($_SESSION['manufacturer_login'] == true) {
			$id = $_GET['id'];
			$query_selectCategoryDetails = "SELECT * FROM categories WHERE cat_id='$id'";
			$result_selectCategoryDetails = mysqli_query($con,$query_selectCategoryDetails);
			$row_selectCategoryDetails = mysqli_fetch_array($result_selectCategoryDetails);
			$categoryName = $categoryDetails = "";
			$categoryNameErr = $requireErr = $confirmMessage = "";
			$categoryNameHolder = $categoryDetailsHolder = "";
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				if(!empty($_POST['txtCategoryName'])) {
					$categoryNameHolder = $_POST['txtCategoryName'];
					$categoryName = $_POST['txtCategoryName'];
				}
				if(!empty($_POST['txtCategoryDetails'])) {
					$categoryDetails = $_POST['txtCategoryDetails'];
					$categoryDetailsHolder = $_POST['txtCategoryDetails'];
				}
				if($categoryName != null) {
					$query_UpdateCategory = "UPDATE categories SET cat_name='$categoryName',cat_details='$categoryDetails' WHERE cat_id='$id'";
					if(mysqli_query($con,$query_UpdateCategory)) {
						echo "<script> alert(\"Category Updated Successfully\"); </script>";
						header('Refresh:0;url=view_category.php');
					}
					else {
						$requireErr = "Updating New Category Failed";
					}
				}
				else {
					$requireErr = "* Valid Category Name is required";
				}
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
	<title> Update Category </title>
	<link rel="stylesheet" href="../includes/main_style.css" >
	<meta charset="utf-8" />
    <title>scm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
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
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img
                                class="rounded-circle header-profile-user" src="#" alt="Header Avatar"> <span
                                class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">Manufacturer</span> <i
                                class="uil-angle-down d-none d-xl-inline-block font-size-15"></i> </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item--><a class="dropdown-item" href="#"><i
                                    class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span
                                    class="align-middle">View Profile</span></a>  <a class="dropdown-item" href="logout.php"><i
                                    class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span
                                    class="align-middle">Sign out</span></a>
                        </div>
                    </div>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect"> <i
                                class="uil-cog"></i> </button>
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
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">




                       <li>
                            <a href="dashboard.php" > <i class="fas fa-dashboard"></i><span>Dashboard</span> </a>
                            
                        </li>

                        <li>
                            <a href="edit_profile.php" ><i class="fas fa-users fa-3x"></i> <span>Edit profile</span> </a>
                            
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
                            <a href="view_product.php" > <i class="uil-store"></i> <i class="fas fa-shopping-cart fa-3x"></i> <span>View products</span> </a>
                            
                        </li>
                            <li>
                            <a href="add_product.php" > <i class="uil-store"></i> <i class="fas fa-shopping-cart fa-3x"></i> <span>Add Product</span> </a>
                            
                        </li>
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
                                
                                <!-- <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Invoices</a></li>
                                        <li class="breadcrumb-item active">Retailers</li>
                                    </ol>
                                </div> -->

                            </div>
                        </div>
                    </div>
	<section>
		<h1>Update Category</h1>
		<form action="" method="POST" class="form">
		<ul class="form-list">
		<li>
			<div class="label-block"> <label for="categoryName">Category Name</label> </div>
			<div class="input-box"> <input type="text" id="categoryName" name="txtCategoryName" placeholder="Category Name" value="<?php echo $row_selectCategoryDetails['cat_name']; ?>" required /> </div> <span class="error_message"><?php echo $categoryNameErr; ?></span>
		</li>
		<li>
			<div class="label-block"> <label for="categoryDetails">Details</label> </div>
			<div class="input-box"><textarea id="categoryDetails" name="txtCategoryDetails" placeholder="Details"><?php echo $row_selectCategoryDetails['cat_details']; ?></textarea> </div>
		</li>
		<li>
			<input type="submit" value="Update Category" class="submit_button" /> <span class="error_message"> <?php echo $requireErr; ?> </span><span class="confirm_message"> <?php echo $confirmMessage; ?> </span>
		</li>
		</ul>
		</form>
	</section>
	
</body>
</html>