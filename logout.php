<?php
	include("config.php");
	session_start();
	if(isset($_SESSION['admin_login']) || isset($_SESSION['manufacturer_login']) || isset($_SESSION['retailer_login']) || isset($_SESSION['distributor_login'])|| isset($_SESSION['wholesaler_login'])) {
		session_destroy();
		echo "<h1 style=\"color:#a11372\">Log Out Successful</h1>";
//		echo "<h2 style=\"color:#a11372\">You will be redirected to Login page in 3 seconds...</h2>";
		header('Refresh:2;url="index.php"');
	}
	else {
			header('Location:dwbi/index.php');
	}
?>