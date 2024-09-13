<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<form action="addaction.php" method="post" enctype="multipart/form-data">
 <div class="col-md-6">
    <label for="id" class="form-label">Procut id</label>
    <input type="number" class="form-control" name="pid">
  </div>
  <div class="col-md-6">
    <label for="name" class="form-label">Procut name</label>
    <input type="text" class="form-control" name="pname">
  </div>
  <div class="col-md-6">
    <label for="price" class="form-label">Product price</label>
    <input type="number" class="form-control" name="pprice">
  </div>
  <div class="col-md-6">
    <label for="image" class="form-label">Product image</label>
    <input type="file" class="form-control" name="image">  <!--https://getbootstrap.com/docs/5.0/forms/layout/-->
  </div>
  
  <div class="col-12">
    <input type="submit" name="uploadbtn" class="btn btn-primary">Upload</>
  </div>
</form>
        