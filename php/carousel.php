<?php
include('newnavbar.php');

?>

<?php
$user = 'root';
$password = '';

// Database name is geeksforgeeks
$database = 'adminrecord';

// Server is localhost with
// port number 3306
$servername='localhost';
$conn = mysqli_connect($servername, $user,
        $password, $database);

// Checking for connections

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$mytable = array();
$tableid = array();
$sql = " SELECT * FROM carouseltable ;";

 $result = $conn->query($sql);

 //Store table records into an array
 while( $row = $result->fetch_assoc() ) {
 $mytable[] = $row;
 }

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
</head>
<body>
<div class="d-grid mx-auto px-5 ">
  <label for="dropdown" class="px-5 mt-5">Choose Carousel</label>
  <span class="px-3"></span>
  <button class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
    --select--
  </button>
  <form method="get" action="carousel.php">
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    
  <?php foreach($mytable as $table)  { ?>
    <li><button class="dropdown-item" type="submit" value="<?php echo $table['cid']?>" name="img" id="img" >carousel<?php echo $table['cid']?></button></li>
    <?php } ?>
  </ul>
  </form>
</div>

  </body>
</html>


    <?php
if(isset($_GET['img']))
{
$val1=$_GET['img']; 
$sql = "SELECT cimg FROM carouseltable WHERE cid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $val1);
    $stmt->execute();
    $result1 = $stmt->get_result();

    // Fetch the image path
 

     if ($row = $result1->fetch_assoc()) { ?>
     <div class="d-grid mx-auto mt-5">
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['cimg']);?>" width="800" height="400"/>
     </div>
      
     <div class="d-grid gap-2 col-2 mx-auto mt-5">
  <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Change here</button>
  
</div>
<?php } }?>


   

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">

			<!-- Modal content-->
		<div class="modal-content">
			
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">&times;</button>
			
			</div>
			
			<div class="modal-body">
				<!-- Form -->
			    <form method='post' action='carouseledit.php' enctype="multipart/form-data">
				Select file : <input type='file' name='image' id='file' class='form-control' ><br>
                
                <input type="hidden" name="edit_id" value="<?php echo $val1; ?>"> 
				        <button class="btn btn-success" type="submit" name="updatebtn1">Upload</button>

				</form>
							
			</div>

		</div>
	</div>
</div>


        
     
  
    

