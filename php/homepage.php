<?php
session_start();
if(empty($_SESSION["username"])){
  header('location: ../index.php');
}
include('includes/header.php'); 
include('includes/navbar.php'); 
?>




<div class="container">
  <div>
    <h1 class="type">welcome<?php echo $_SESSION['username']?></h1>
  </div>

  <a href="dashboard.php"><button type="button" class="btn btn-primary">View Stocks</button></a>
  <a href = "newproduct.php"><button type="button" class="btn btn-secondary">ADD NEW STOCKS</button></a>
  <a href="carousel.php"><button type="button" class="btn btn-dark">View carousel</button></a>


</div>

