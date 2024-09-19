<?php
include('newnavbar.php');
?>

<form action="addaction.php" method="post" enctype="multipart/form-data">
 <div class="col-md-6 px-5">
    <label for="id" class="form-label mt-5">Product id</label>
    <input type="disable" class="form-control" name="pid">
  </div>
  <div class="col-md-6 px-5">
    <label for="name" class="form-label">Procut name</label>
    <input type="text" class="form-control" name="pname">
  </div>
  <div class="col-md-6 px-5">
    <label for="price" class="form-label">Product price</label>
    <input type="number" class="form-control" name="pprice">
  </div>
  <div class="col-md-6 px-5">
    <label for="image" class="form-label">Product image</label>
    <input type="file" class="form-control" name="image">  <!--https://getbootstrap.com/docs/5.0/forms/layout/-->
  </div>
  
  <div class="col-12 px-5 mt-3">
    <input type="submit" name="uploadbtn" class="btn btn-success px-5"></>
  </div>
</form>
        