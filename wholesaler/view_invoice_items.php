<?php
	require("../config.php");
	session_start();
	if(isset($_SESSION['wholesaler_login'])) {
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
	<title> View Invoice Details </title>
	<meta charset="utf-8" />
    <title>invoice</title>
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
	<link rel="stylesheet" href="../style.css" >
	
</head>
<body>
    <!-- <body data-layout="horizontal" data-topbar="colored"> -->
    <!-- Begin page -->
    
                
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img
                                class="rounded-circle header-profile-user" src="#" alt="Header Avatar"> <span
                                class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">wholesaler</span> <i
                                class="uil-angle-down d-none d-xl-inline-block font-size-15"></i> </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item--><a class="dropdown-item" href="edit_profile.php"><i
                                    class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span
                                    class="align-middle">Edit Profile</span></a>  <a class="dropdown-item" href="logout.php"><i
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
        <!-- ========== Left Sidebar Start ========== -->
		<div class="vertical-menu" style="background-color:black ;">
			<!-- LOGO -->
			<div class="navbar-brand-box"style="background-color:black ;">
				<a href="dashboard.php" ><img style="width: 60%;" src="ghj.jpg"> </a>
			</div>
			<button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn"> <i class="fa fa-fw fa-bars"></i> </button>
			<div data-simplebar class="sidebar-menu-scroll" style="background-color:black ;">
				<!--- Sidemenu -->
				<div id="sidebar-menu" >
					<!-- Left Menu Start -->
					<ul class="metismenu list-unstyled" id="side-menu">
						
						
						
						
						<li>
							<a href="dashboard.php" class="waves-effect"> <i class="uil-calender"></i> <span>Dashboard</span> </a>
						</li>
						
						
						
						<li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"> <i class="uil-store"></i> <span>Products</span> </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="manpro.php">Manage Products</a></li>
                                <li><a href="pro.php">Add Products</a></li>
                                
                            </ul>
                        </li>
						<li>
							<a href="orders.php" > <i class="uil-store"></i> <span>Orders</span> </a>
							
						</li>
						<li>
							<a href="invoice.php" > <i class="uil-store"></i> <span>Invoices</span> </a>
							
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
                  
				<div id="divToPrint" style="clear:both;" >
					<h1 style="text-align:center;">Sales Invoice</h1>
					<table class="table_infoFormat">
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
						<tr>
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
				</div>

            </div>
    </div>
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
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- init js -->
   <script src="assets/js/pages/ecommerce-datatables.init.js"></script>
	
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
	
</body>
</html>