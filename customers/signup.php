<?php

session_start();

	include("connection.php");
	include("functions.php");
	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$user_name = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];


		if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password,email) values ('$user_id','$user_name','$password','$email')";

			mysqli_query($con,$query);

			header("Location: login.php");
			die;


		}else{
			echo "Please feed in valid information!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login</title>

		<style type="text/css">

			body{
				margin: 0;
				padding: 0;
				background: white;
				height: 100vh;
				overflow: hidden;
			}
			.center{
				position: absolute;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				width: 400px;
				background: white;
				border-radius: 10px;
			}
			.center h1{
				text-align: center;
				padding: 0 0 20px 0;
				color: midnightblue;
				/*border-bottom: 1px solid silver;*/

			}
			.center form{
				padding: 0 40px;
				box-sizing: border-box;
			}
			.txt_field{
				position: relative;
				border-bottom: 2px solid midnightblue;
				margin: 30px 0;
			}
			.txt_field input{
				width: 100%;
				padding: 0 5px;
				height: 40px;
				font-size: 16px;
				border: none;
				background: none;
				outline: none;
			}
			.txt_field label{
				position: absolute;
				top: 50%;
				left: 5px;
				color: black;
				transform: translateY(-50%);
				font-size: 16px;
				pointer-events: none;
				transition: .5s;

			}
			.txt_field span::before{
				content: '';
				position: absolute;
				top: 40px;
				left: 0;
				width: 0%;
				height: 2px;
				background: midnightblue;
				transition: .5s;
			}
			.txt_field input:focus ~ label,
			.txt_field input:valid ~ label{
				top: -5px;
				color: midnightblue;
			}
			.txt_field input:focus ~ span::before,
			.txt_field input:valid ~ span::before{
					width: 100%;

			}
			.pass{
				margin: -5px 0 20px 5px;
				color: white;
				cursor: pointer;

			}
			input[type="submit"]{
				width: 100%;
				height: 50px;
				border: 1px solid;
				background: midnightblue;
				border-radius: 25px;
				font-size: 18px;
				color: white;
				font-weight: 700;
				cursor: pointer;
				outline: none;

			}
			.signup{
				margin: 30px 0;
				text-align: center;
				font-size: 16px;
				color: black;

			}
			.signup a{
				color: midnightblue;
				text-decoration: none;
			}
			.signup a:hover{
				text-decoration: underline;
				color: red;
				
			}

		</style>

</head>
<body>
	<div class="center">
		<h1>Welcome to Students Sacco<br>Create an Account</h1>
		<form method="POST">
			<div class="txt_field">
				<input type="text" name="username" required>
				<span></span>
				<label>Username</label>
			</div>
			<div class="txt_field">
				<input type="password" name="password" required>
				<span></span>
				<label>Password</label>
			</div>
			<div class="txt_field">
				<input type="email" name="email" required>
				<span></span>
				<label>Email Address</label>
			</div>
			
			<input type="submit" name='submit' value="Sign up">
			
		</form> 
	</div>

</body>
</html>