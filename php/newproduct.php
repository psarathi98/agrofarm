<?php
session_start();
if(empty($_SESSION["username"])){
  header('location: ../404.html');
}
include('adminnavbar.php');
?>

<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
  <symbol id="check-circle-fill" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

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
              echo '<div class="alert alert-success  fade show mx-auto p-2 w-40 " height="20" role="alert">
              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#check-circle-fill"/></svg>
              <strong>Great!</strong> New item added successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
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

