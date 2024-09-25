<?php
// Include the database connection file
require_once("connection.php");
require_once('newnavbar.php'); 


$mytable = array();


?>



<!DOCTYPE html>
<lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.min.js"></script>-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
</head>


<body>


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

			<form id="myForm" method="get" action="edit.php" enctype='multipart/form-data'>
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
					<button class="btn btn-success m-1" type="submit" data-bs-toggle="modal" data-bs-target="#statusSuccessModal" name="update_btn">Save changes</button>

					<!-- Modal --><?php
					if(isset($_GET['update_btn']))
{
    $p_id = $_GET['edit_id'];
    $p_name = $_GET['pname'];
    $p_price = $_GET['price'];
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
    
      <?php  } } ?>

					

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



</body>
</html>

<?php
include('connection.php');
?>






