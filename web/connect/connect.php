<?php 
$dbSevername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "site_ic";
//mysql_connect($dbSevername, $dbUsername, $dbPassword);
//mysql_select_db($dbName);
$conn = mysqli_connect($dbSevername, $dbUsername, $dbPassword, $dbName);