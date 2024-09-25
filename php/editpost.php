<?php
include('connection.php');
?>



<style>
    .modal#statusSuccessModal .modal-content, 
.modal#statusErrorsModal .modal-content {
	border-radius: 30px;
}
.modal#statusSuccessModal .modal-content svg, 
.modal#statusErrorsModal .modal-content svg {
	width: 100px; 
	display: block; 
	margin: 0 auto;
}
.modal#statusSuccessModal .modal-content .path, 
.modal#statusErrorsModal .modal-content .path {
	stroke-dasharray: 1000; 
	stroke-dashoffset: 0;
}
.modal#statusSuccessModal .modal-content .path.circle, 
.modal#statusErrorsModal .modal-content .path.circle {
	-webkit-animation: dash 0.9s ease-in-out; 
	animation: dash 0.9s ease-in-out;
}
.modal#statusSuccessModal .modal-content .path.line, 
.modal#statusErrorsModal .modal-content .path.line {
	stroke-dashoffset: 1000; 
	-webkit-animation: dash 0.95s 0.35s ease-in-out forwards; 
	animation: dash 0.95s 0.35s ease-in-out forwards;
}
.modal#statusSuccessModal .modal-content .path.check, 
.modal#statusErrorsModal .modal-content .path.check {
	stroke-dashoffset: -100; 
	-webkit-animation: dash-check 0.95s 0.35s ease-in-out forwards; 
	animation: dash-check 0.95s 0.35s ease-in-out forwards;
}

@-webkit-keyframes dash { 
	0% {
		stroke-dashoffset: 1000;
	}
	100% {
		stroke-dashoffset: 0;
	}
}
@keyframes dash { 
	0% {
		stroke-dashoffset: 1000;
	}
	100%{
		stroke-dashoffset: 0;
	}
}
@-webkit-keyframes dash { 
	0% {
		stroke-dashoffset: 1000;
	}
	100% {
		stroke-dashoffset: 0;
	}
}
@keyframes dash { 
	0% {
		stroke-dashoffset: 1000;}
	100% {
		stroke-dashoffset: 0;
	}
}
@-webkit-keyframes dash-check { 
	0% {
		stroke-dashoffset: -100;
	}
	100% {
		stroke-dashoffset: 900;
	}
}
@keyframes dash-check {
	0% {
		stroke-dashoffset: -100;
	}
	100% {
		stroke-dashoffset: 900;
	}
}
.box00{
	width: 100px;
	height: 100px;
	border-radius: 50%;
}
</style>

<?php
$status = $statusMsg = ''; 

if(isset($_POST['update_btn']))
{
    $p_id = $_POST['edit_id'];
    $p_name = $_POST['pname'];
    $p_price = $_POST['price'];
    $query =  "UPDATE product SET productname ='$p_name', productprice ='$p_price' WHERE id='$p_id'";
    $stmt = mysqli_query($mysqli,$query);
    if ($stmt) { ?>
        <div class = "container p-5">
        <div class = "row">
            <div class="modal fade" id="statusSuccessModal" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false"> 
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document"> 
                            <div class="modal-content"> 
                                <div class="modal-body text-center p-lg-4"> 
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                                        <circle class="path circle" fill="none" stroke="#198754" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" />
                                        <polyline class="path check" fill="none" stroke="#198754" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 " /> 
                                    </svg> 
                                    <h4 class="text-success mt-3">Oh Yeah!</h4> 
                                    <p class="mt-3">You have successfully registered and logged in.</p>
                                    <button type="button" class="btn btn-sm mt-3 btn-success" data-bs-dismiss="modal">Ok</button> 
                                </div> 
                            </div> 
                        </div> 
            </div>
        </div>
    </div>
    
      <?php  } ?>
     
<? }
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