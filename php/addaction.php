<?php
session_start();
if(empty($_SESSION["username"])){
  header('location: ../index.php');
}
include('connection.php');?>


<?php
$status = $statusMsg = ''; 
if(isset($_POST['uploadbtn']))
{
    $p_id = $_POST['pid'];
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
            
            $insert = $mysqli->query("INSERT into product (id,productname,productprice,productimage) VALUES ('$p_id','$p_name','$p_price','$imgContent')"); 
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg; 
?>

