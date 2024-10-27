
<?php
include('connection.php');?>


<?php

if(isset($_POST['uploadbtn']))
{
   
    $p_name = $_POST['name'];
    $p_price = $_POST['price'];

    
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

