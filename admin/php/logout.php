<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
echo "<script type='text/javascript'>alert('u have been successfully logged out');
</script>";
header('location: ../index.php');
?>