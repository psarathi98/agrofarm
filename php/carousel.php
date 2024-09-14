<?php
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


$mytable = array();
$tableid = array();
$sql = " SELECT * FROM carouseltable ;";

 $result = $mysqli->query($sql);

 //Store table records into an array
 while( $row = $result->fetch_assoc() ) {
 $mytable[] = $row;
 }

?>


<?php
$servername = "localhost";
$username = "root"; // replace with your database username
$password = ""; // replace with your database password
$dbname = "adminrecord"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>




       
    

    <form method="get" action="carousel.php"> 
    <label for="cars">Choose a Motku</label>
    <select name="img" id="img">
    

    <?php foreach($mytable as $table)  { ?>

    <option value="<?php echo $table['cid']?>">Motki no <?php echo $table['cid']?></option>
 

    
    <?php } ?>
    </select>

    <br><br>
  <input type="submit" value="Submit">
    </form>


    <?php
if(isset($_GET['img']))
{
$val1=$_GET['img']; echo "bubu hu mein bubu";
$sql = "SELECT cimg FROM carouseltable WHERE cid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $val1);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the image path
 

     if ($row = $result->fetch_assoc()) { ?>
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['cimg']);?>" width="800" height="400" />

        <button type="button" class="btn btn-success" style="margin-top:10px" data-toggle="modal" data-target="#exampleModalCenter">Change</button>

<?php } }?>



  




   

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
                
                <input type="text" name="edit_id" value="<?php echo $val1; ?>"> 
				<button class="btn btn-success" type="submit" name="updatebtn1">Upload</button>

				</form>

							
			</div>

		</div>
	</div>
</div>


        
     
  
    

