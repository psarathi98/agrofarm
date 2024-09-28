<?php
session_start();
if(empty($_SESSION["username"])){
  header('location: ../index.php');
}
include('adminnavbar.php');
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">

  <div class="col-md-6 px-5">
    <label for="name" class="form-label mt-5">Procut name</label>
    <input type="text" class="form-control" name="pname">
  </div>
  <div class="col-md-6 px-5">
    <label for="price" class="form-label mt-3">Product price</label>
    <input type="number" class="form-control" name="pprice">
  </div>
  <div class="col-md-6 px-5">
    <label for="image" class="form-label mt-3">Product image</label>
    <input type="file" class="form-control" name="image"> 
  </div>
  
  <div class="col-12 px-5 mt-3">
    <input type="submit" name="uploadbtn" class="btn btn-success px-5"></>
  </div>
</form>
        




<?php
include('connection.php');?>


<?php

if(isset($_POST['uploadbtn']))
{
   
    $p_name = $_POST['pname'];
    $p_price = $_POST['pprice'];

    
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            
            $insert = $mysqli->query("INSERT into product (productname,productprice,productimage) VALUES ('$p_name','$p_price','$imgContent')"); 
            if($insert){
              echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
              <strong>Holy guacamole!</strong> product added successfully!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
               
            }else{ 
               echo '<div class="alert alert-danger" role="alert">
               File uploading failed try again! </div>'; 
            }  
        }else{ 
          echo '<div class="alert alert-danger" role="alert">
       Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload. </div>';
        } 
    }else{ 
      echo '<div class="alert alert-danger" role="alert">
     Please select an image file to upload. </div>'; 
    } 
} 
 
// Display status message 

?>

