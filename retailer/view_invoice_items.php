<?php
	require("config.php");
	session_start();
	if(isset($_SESSION['retailer_login'])) {
		if(isset($_GET['id'])){
			$invoice_id = $_GET['id'];
			$queryInvoiceItems = "SELECT *,invoice_items.quantity as quantity FROM invoice,invoice_items,products WHERE invoice.invoice_id='$invoice_id' AND invoice_items.product_id=products.pro_id AND invoice_items.invoice_id=invoice.invoice_id";
			$resultInvoiceItems = mysqli_query($con,$queryInvoiceItems);
			$querySelectInvoice = "SELECT * FROM invoice,retailer,distributor,area WHERE invoice_id='$invoice_id' AND invoice.retailer_id=retailer.retailer_id AND retailer.area_id=area.area_id AND invoice.dist_id=distributor.dist_id";
			$resultSelectInvoice = mysqli_query($con,$querySelectInvoice);
			$rowSelectInvoice = mysqli_fetch_array($resultSelectInvoice);
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
    <title>View Invoice Details</title>
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
	<script type="text/javascript">     
        function PrintDiv() {
			document.getElementById("signature").style.display = "block";
			document.getElementById("footer").style.display = "block";
			var divToPrint = document.getElementById('divToPrint');
			var popupWin = window.open('', '_blank', '');
			popupWin.document.open();
			popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
			document.getElementById("signature").style.display = "none";
			document.getElementById("footer").style.display = "none";
			popupWin.document.close();
		}
     </script>
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
                                class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">Admin</span> <i
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
		<div class="vertical-menu" style="background-color:black;">
			<!-- LOGO -->
			<div class="navbar-brand-box" style="background-color:black;">
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
							<a href="javascript: void(0);" class="has-arrow waves-effect"><i class="fa-brands fa-product-hunt fa-3x"></i></i> <span>Products</span> </a>
							<ul class="sub-menu" aria-expanded="false">
								<li><a href="products.php">View Products</a></li>
								
							</ul>
						</li>

						<li>
							<a href="orders.php" ><i class="fas fa-shopping-cart fa-3x"></i> <span>Orders</span> </a>
							
						</li>
						<li>
							<a href="invoice.php" > <i class="fas fa-file-invoice fa-3x"></i><span>Invoices</span> </a>
							
						</li>
						
					</ul>
				</div>
				<!-- Sidebar -->
			</div>
		</div>
		<!-- Left Sidebar End -->
		<div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
					<section>
						<div id="divToPrint" style="clear:both;" >
						<h1 style="text-align:center; padding: bottom 20px;">Sales Invoice</h1>
						<table class="table_infoFormat" >
							<tr>
								<td><b> Invoice No: </b></td>
								<td> <?php echo $rowSelectInvoice['invoice_id']; ?> </td>
							</tr>
							<tr>
								<td><b> Order No: </b></td>
								<td> <?php echo $rowSelectInvoice['order_id']; ?> </td>
							</tr>
							<tr>
								<td><b> Retailer: </b></td>
								<td> <?php echo $rowSelectInvoice['area_code']; ?> </td>
							</tr>
							<tr>
								<td><b> Distributor: </b></td>
								<td> <?php echo $rowSelectInvoice['dist_name']; ?> </td>
							</tr>
							<tr>
								<td><b> Date: </b></td>
								<td> <?php echo date("d-m-Y",strtotime($rowSelectInvoice['date'])); ?> </td>
							</tr>
							</table>
							<form action="" method="POST" class="form">
							<table class="table_invoiceFormat" style="margin-top:50px;">
								<tr style="background-color:aqua;">
									<th style="padding-right:25px;"> Sr. No. </th>
									<th style="padding-right:150px;"> Products </th>
									<th style="padding-right:30px;"> Unit Price </th>
									<th style="padding-right:30px;"> Quantity </th>
									<th> Amount </th>
								</tr>
								<?php $i=1; while($rowInvoiceItems = mysqli_fetch_array($resultInvoiceItems)) { ?>
								<tr>
									<td> <?php echo $i; ?> </td>
									<td> <?php echo $rowInvoiceItems['pro_name']; ?> </td>
									<td> <?php echo $rowInvoiceItems['pro_price']; ?> </td>
									<td> <?php echo $rowInvoiceItems['quantity']; ?> </td>
									<td> <?php echo $rowInvoiceItems['quantity']*$rowInvoiceItems['pro_price']; ?> </td>
								</tr>
								<?php $i++; } ?>
								<tr style="height:40px;vertical-align:bottom;">
									<td colspan="4" style="text-align:right;"><b> Grand Total: </b></td>
									<td>
									<?php
										mysqli_data_seek($resultInvoiceItems,0);
										$rowInvoiceItems = mysqli_fetch_array($resultInvoiceItems);
										echo $rowInvoiceItems['total_amount'];
									?>
									</td>
								</tr>
							</table><br/><br/>
		<b>Comments:</b> <br/> <?php echo $rowSelectInvoice['comments']; ?>
		<br/><br/><br/><br/><br/><br/>
			<p id="signature" style="float:right;display:none;">(Authorized Signatory)</p>
			<p id="footer" style="clear:both;display:none;padding-bottom:20px;text-align:center;">Thank you for your Bussiness!</p>
		</div>
		<input type="button" value="Print Invoice" class="submit_button" onclick="PrintDiv();" />
		</form>
	</section>
	
</body>
</html>