<?php
session_start();
if(empty($_SESSION["username"])){
  header('location: ../index.php');
}
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<?php
$user = 'root';
$password = '';

// Database name is geeksforgeeks
$database = 'adminrecord';

// Server is localhost with
// port number 3306
$servername='localhost';
$mysqli = new mysqli($servername, $user,
        $password, $database);

// Checking for connections

if ($mysqli->connect_error)
{
      die('Connect Error (' .
      $mysqli->connect_errno . ') '.
      $mysqli->connect_error);
}
$temp = 0;

$result = $mysqli->query("SELECT * FROM carouseltable"); 
?>


<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="height:10%; width:20%; margin-left:50px">
    View carousel
  </button>
  

 <div class="collapse" id="collapseExample" style="margin-top: 100px; margin-left: 30px;">
    <?php if($result->num_rows > 0){ ?> 
        <div class="gallery"> 
            <?php while($row = $result->fetch_assoc()){ ?> 
                
                <input type="hidden" name="edit_id" value="<?php echo $row['cid']; $temp = $row['cid'] ?>">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['cimg']); ?>" width="800" height="400" /> 
            <?php } ?> 
        </div> 
    <?php }else{ ?> 
        <p class="status error">Image(s) not found...</p> 
    <?php } ?>
       
        <button type="button" class="btn btn-success" style="margin-top:10px" data-toggle="modal" data-target="#exampleModalCenter">Change</button>
    
</div>


 

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">

			<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			
			</div>
			<div class="modal-body">
				<!-- Form -->
			    <form method='post' action='carouseledit.php' enctype="multipart/form-data">
				Select file : <input type='file' name='image' id='file' class='form-control' ><br>
                
                <input type="hidden" name="edit_id" value="<?php echo $temp; ?>"> 
				<button class="btn btn-success" type="submit" name="updatebtn1">Upload</button>

				</form>

							
			</div>

		</div>
	</>

</d>

        
     
  
    

