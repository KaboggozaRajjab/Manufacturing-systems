<?php
$serverName='localhost';
$username='root';
$password='';
$dbname='DW';

$connect=mysqli_connect($serverName,$username,$password,$dbname) or die(mysqli_error());
?>