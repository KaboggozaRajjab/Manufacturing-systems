<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sacco";

if(!$con = mysqli_connect($servername,$username,$password,$dbname)){
	die("failed to connect!");
}


?>