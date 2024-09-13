<?php
// Include the database connection file
session_start();
if(empty($_SESSION["username"])){
  header('location: ../index.php');
}
require_once("connection.php");
require_once('includes/header.php'); 
require_once('includes/navbar.php'); 

$mytable = array();


?>


<div class="container-fluid">

<!-- DataTales Example -->
	<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Edit Admin Profile</h6>
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

			<form action ="editpost.php" method ="POST"  enctype='multipart/form-data'>
				<input type="hidden" name="edit_id" value="<?php echo $table['id'] ?>">
					<div class="form-group">
						<label> Name </label>
						<input type="text" name="pname" value = "<?php echo $table['productname']?>"class="form-control" placeholder="Enter Name">
					</div>
					<div class="form-group">
						<label> Price </label>
						<input type="text" name="price" value = "<?php echo $table['productprice']?>" class="form-control" placeholder="Enter Price">
					</div>

					<div class="form-group">
					<img src="data:image/jpeg;base64,<?php echo base64_encode($table['productimage']); ?>" width="250" height="150"/>
					</div>

					
					<a href="dashboard.php" class="btn btn-danger"> CANCEL </a>
										<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">
					Change
					</button>
					<button class="btn btn-success" type="submit" name="update_btn">Save changes</button>

					<!-- Modal -->
					

				<!-- Modal -->
					<div id="uploadModal" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">File upload form</h4>
						</div>
						<div class="modal-body">
							<!-- Form -->
							<form method='post' action='editpost.php' enctype="multipart/form-data">
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
			
			
		</div>
  	</div>
</div>
</div>

