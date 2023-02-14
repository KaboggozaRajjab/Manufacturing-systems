<?php

session_start();

	include("connection.php");
	include("functions.php");
	
	$user_data = check_login($con);

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>member</title>
</head>
<body>
	<h2>WELCOME TO<br> STUDENTS' SACCO</h2>
</body>
</html>