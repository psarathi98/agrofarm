<?php
include('connection.php');
?>



<?php
$status = $statusMsg = ''; 

if(isset($_POST['update_btn']))
{
    $p_id = $_POST['edit_id'];
    $p_name = $_POST['pname'];
    $p_price = $_POST['price'];
    $query =  "UPDATE product SET productname ='$p_name', productprice ='$p_price' WHERE id='$p_id'";
    $stmt = mysqli_query($mysqli,$query);
    if ($stmt) { 
        
        $status = 'success'; 
        $statusMsg = 'Data updated successfully' ;
    }  
    
}
else if(isset($_POST['updatebtn']))
{

    $p_id = $_POST['edit_id'];
    $p_name = $_POST['pname'];
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
            
            $insert =  "UPDATE product SET id = '$p_id', productname ='$p_name', productprice ='$p_price', productimage ='$imgContent' WHERE id='$p_id'";
            $query_run = mysqli_query($mysqli, $insert);
            if($query_run){ 
                $status = 'success'; 
                $statusMsg = 'Data updated successfully' ;
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



<?php //delete.php
require_once('connection.php');

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM product WHERE id='$id' ";
    $query_run = mysqli_query($mysqli, $query);

    if($query_run)
    {
        echo "<script type='text/javascript'>alert('RECORD DELETED!!.');
        location='dashboard.php';</script>"; 
    }
    else
    {
        echo "<script type='text/javascript'>alert('Can't be DELETED!!.');
        location='dashboard.php';</script>"; 
    }    
}
?>