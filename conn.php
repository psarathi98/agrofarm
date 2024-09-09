<?php
session_start();
$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "mydb";

$connection = mysqli_connect($server_name,$db_username,$db_password,$db_name);
?>