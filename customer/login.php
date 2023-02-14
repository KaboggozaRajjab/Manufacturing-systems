<?php
	include("../config.php");
	$reqErr = $loginErr = "";
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		if(!empty($_POST['txtUsername']) && !empty($_POST['txtPassword']) && isset($_POST['login_type'])){
			session_start();
			$username = $_POST['txtUsername'];
			$password = $_POST['txtPassword'];
			$_SESSION['sessLogin_type'] = $_POST['login_type'];
        }
    }
            if(isset($_SESSION['customer_login'])) {
                if($_SESSION['customer_login'] == true) {
                    $id = $_SESSION['cus_id'];
                    $query_selectCustomer = "SELECT * FROM customer details WHERE cus_id='$id'";
                    $result_selectCustomer = mysqli_query($con,$query_selectCustomer);
                    $row_selectCustomer = mysqli_fetch_array($result_selectCustomer);
                    //$query_selectOrder = "SELECT * FROM orders ORDER BY order_id DESC LIMIT 5";
                    //$result_selectOrder = mysqli_query($con,$query_selectOrder);
                }

			if($_SESSION['sessLogin_type'] == "customer") {
				//if selected type is customer than check for valid manufacturer.
				$query_selectCustomer = "SELECT cus_id,username,password FROM customer details WHERE username='$username' AND password='$password'";
				$result = mysqli_query($con,$query_selectCustomer);
				$row = mysqli_fetch_array($result);
				if($row) {
					$_SESSION['customer_id'] =  $row['cus_id'];
					$_SESSION['sessUsername'] = $_POST['txtUsername'];
					$_SESSION['sessPassword'] = $_POST['txtPassword'];
					$_SESSION['customer_login'] = true;
					header('Location:customer/index.php');
				}
				else {
					$loginErr = "* Username or Password is incorrect.";
				}
			}

		}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Login </title>
	<link rel="stylesheet" href="style.css" >
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
	<link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" /> </head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class="login-box">
	
	<h1>LOGIN</h1>
	<form action="" method="POST" class="login-form">
	<ul class="form-list">
	<li>
		<div class="label-block"> <label for="login:username">Username</label> </div>
		<div class="input-box"> <input type="text" id="login:username" name="txtUsername" placeholder="Username" /> </div>
	</li>
	<li>
		<div class="label-block"> <label for="login:password">Password</label> </div>
		
		<div class="input-box"> <input type="password" id="login:password" name="txtPassword" placeholder="Password" />
		
	</li>
	<li>
		<div>
	
			<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" ></span>show password
		</div>
    </div>
	
	<li>
		<div class="label-block"> <label for="login:type">Login Type</label> </div>
		<div class="input-box">
		<select name="login_type" id="login:type">
		<option value="" disabled selected>-- Select Type --</option>
		<option value="customer">Customer</option>
		</select>
		</div>
	</li>
	<li>
	<div class="mb-3">
			<!-- <div class="float-end"> <a href="recoverpw.html" class="text-muted">Forgot password?</a> 
		</div> -->
	
		
		<div class="form-check">
			<input type="checkbox" class="form-check-input" id="auth-remember-check">
			<label class="form-check-label" for="auth-remember-check">Remember me</label>
		</div>
		<!-- <div class="mt-3 text-end">
			<button class="btn btn-primary w-sm waves-effect waves-light" type="submit" name="submit">Log In</button>
		</div> -->
	</li>
	<li>
		<input type="submit" value="Login" class="submit_button" /> <span class="error_message"> <?php echo $loginErr; echo $reqErr; ?> </span>
	</li>
	</ul>
	</form>
	<script src="assets/libs/jquery/jquery.min.js"></script>
	<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/libs/metismenu/metisMenu.min.js"></script>
	<script src="assets/libs/simplebar/simplebar.min.js"></script>
	<script src="assets/libs/node-waves/waves.min.js"></script>
	<script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
	<!-- App js -->
	<script src="assets/js/app.js"></script>
	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>