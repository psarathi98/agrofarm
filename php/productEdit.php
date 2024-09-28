<?php
// Include the database connection file
require_once("connection.php");
require_once('adminnavbar.php'); 


$mytable = array();


?>





<div class="container-fluid">

<!-- DataTales Example -->
	<div class="card shadow mb-4 mt-5 ml-2 mr-5">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Edit Products</h6>
	</div>
		<div class="card-body">
			<?php
							
				if(isset($_POST['edit_btn']))
				{
					$id = $_POST['edit_id'];
					$query = "SELECT * FROM product WHERE id = '$id'";
					$query_run = mysqli_query($mysqli, $query);

                    while( $row = $query_run->fetch_assoc() ) {
                        $mytable[] = $row;
                        }
                    }
                    ?>

                    <?php
                        foreach($mytable as $table)  {?>

			<form id="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype='multipart/form-data'>
				<input type="hidden" name="edit_id" value="<?php echo $table['id'] ?>">
					<div class="form-group">
						<label> Name </label>
						<input type="text" name="pname" value = "<?php echo $table['productname']?>"class="form-control mt-2" placeholder="Enter Name">
					</div>
					<div class="form-group">
						<label class="form-label mt-4"> Price </label>
						<input type="text" class="form-control" name="price" value = "<?php echo $table['productprice']?>" class="form-control mt-2" placeholder="Enter Price">
					</div>

					<div class="form-group">
					<img src="data:image/jpeg;base64,<?php echo base64_encode($table['productimage']); ?>" width="200" height="150"/>
					</div>

					
					<a href="dashboard.php" class="btn btn-danger"> CANCEL </a>
										<!-- Button trigger modal -->
					<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#uploadModal">
					Change
					</button>
					<button class="btn btn-success m-1" type="submit" name="update_btn">Save changes</button>

					
    
					

				<!-- Modal -->
					<div id="uploadModal" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal">&times;</button>
							<h4 class="modal-title">File upload</h4>
						</div>
						<div class="modal-body">
							<!-- Form -->
							<form id="myForm" enctype="multipart/form-data">
							Select file : <input type='file' name='image' id='file' class='form-control' ><br>
							<button class="btn btn-success" type="submit" name="updatebtn">Upload</button>

							</form>

							<!-- Preview-->
							<div id='preview'></div>
						</div>
					
						</div>

					</div>
					</div>


                    
					
				</form>
					<?php
					}
			
			?>
			
			<div id="message"></div>
			
		</div>
  	</div>
</div>





<?php
include('connection.php');


if(isset($_POST['update_btn']))
{
    $p_id = $_POST['edit_id'];
    $p_name = $_POST['pname'];
    $p_price = $_POST['price'];
    $query =  "UPDATE product SET productname ='$p_name', productprice ='$p_price' WHERE id='$p_id'";
    $stmt = mysqli_query($mysqli,$query);
    if ($stmt) { 
        
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
		<strong>Holy guacamole!</strong> Data updated successfully!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>';
	  header('Refresh: 5; url=dashboard.php');
exit();
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
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
          <strong>Hey admin</strong> data updated successfully!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
            }else{ 
				'<div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
				<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
				<strong>Hey admin</strong> file uploaded failed! please try again
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>';
            }  
        }else{ 
			'<div class="alert alert-warning d-flex align-items-center alert-dismissible fade show" role="alert">
			<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
			<strong>Hey admin</strong> Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload!!
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>';
        } 
    }else{ 
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
          <strong>Hey admin</strong> please select an image file to upload!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
    } 
} 
 
// Display status message 

?>

