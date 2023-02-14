<?php
// Include config file
require_once "connection.php";



//insert to the db
if(isset($_POST['submit'])){
	
  $Fname=$_POST['fname'];
  $Lname=$_POST['lname'];
  $Gender=$_POST['gender'];
  $Address=$_POST['address'];
  $phonenumber=$_POST['phone'];
  $Email=$_POST['email'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $Role=$_POST['role'];





$sql="INSERT INTO users (fname,lname,gender,address,phone,email,username,password,role) Values('$Fname','$Lname','$Gender','$Address','$phonenumber','$Email','$username','$password','$Role')";
$sql_query=mysqli_query($connect,$sql);
if($sql_query==TRUE){
//   echo "Registration Succesfully";
  header("Location:login.php"); 
}

else{
  echo mysqli_error($connect);
}
}


?>



<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>register</title>
	
	<!-- App favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">
	<!-- Bootstrap Css -->
	<link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
	<!-- Icons Css -->
	<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" /> </head>

<body class="authentication-bg">
	<div class="account-pages my-5 pt-sm-5">
		<div class="container">
			
			<div class="row align-items-center justify-content-center">
				<div class="col-md-8 col-lg-6 col-xl-5">
					<div class="card">
						<div class="card-body p-4">
							<div class="text-center mt-2">
								<h5 class="text-primary">Register Account</h5>
							
							</div>
							<div class="p-2 mt-4">
								<form action="" method="POST">
									<div class="mb-3">
										<label class="form-label" for="useremail">First name</label>
										<input type="text" class="form-control" name="fname" placeholder="Enter first name" required> </div>
									<div class="mb-3">
										<label class="form-label" for="username">Last name</label>
										<input type="text" class="form-control" name="lname" placeholder="Enter last name" required> 
									</div>
									<div class="mb-2">
									    <label class="form-label">Gender</label>
											<select class="form-control select2" name="gender">
												<option>select gender</option>
												<option>Female</option>
												<option>Male</option>

                                            </select>
										<!-- Gender:
						                <input type="radio" id="" name="gender" class="">Male
										<input type="radio" id="" name="gender" class="">Female -->
										
									</div>
									<div class="mb-3">
										<label class="form-label" for="username">Address</label>
										<input type="text" class="form-control" name="address" placeholder="address"> 
									</div>
									<div class="mb-3">
										<label class="form-label" for="username">Phone number</label>
										<input type="text" class="form-control" name="phone" placeholder="phone"> 
									</div>
									<div class="mb-3">
										<label class="form-label" for="useremail">Email</label>
										<input type="email" class="form-control" name="email" placeholder="Enter email"> </div>
									<div class="mb-3">
										<label class="form-label" for="username">Username</label>
										<input type="text" class="form-control" name="username" placeholder="Enter username" required> 
									</div>
									<div class="mb-3">
										<label class="form-label" for="userpassword">Password</label>
										<input type="password" class="form-control" name="password" placeholder="Enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required> 
									</div>
									<div class="mb-3">
										<label class="form-label" for="userpassword"> Confirm Password</label>
										<input type="password" class="form-control" name="password" placeholder="Confirm password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required> 
									</div>
								
									<div class="form-check">
										<input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
										<label class="form-check-label" for="acceptTerms">I agree and accept the terms and conditions</a></label>
										<div class="invalid-feedback">You must agree before submitting.</div>

									</div>
									<div class="mt-3 text-end">
										<button  type="submit" name="submit" class="btn btn-primary w-sm waves-effect waves-light ">Register Now</button>
                                    </div>
										<div class="col-12">
										<p class="small mb-0">Already have an account? <a href="index.php">Log in</a></p>
									</div>
									
								</form>
							</div>
						</div>
					</div>
					<!-- <div class="mt-5 text-center">
						<p>©
							<script>
							document.write(new Date().getFullYear())
							</script> Minible. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
					</div>
				</div> -->
			</div>
			<!-- end row -->
		</div>
		<!-- end container -->
	</div>
	<!-- JAVASCRIPT -->
	<script src="assets/libs/jquery/jquery.min.js"></script>
	<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/libs/metismenu/metisMenu.min.js"></script>
	<script src="assets/libs/simplebar/simplebar.min.js"></script>
	<script src="assets/libs/node-waves/waves.min.js"></script>
	<script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
	<!-- App js -->
	<script src="assets/js/app.js"></script>
</body>

</html>