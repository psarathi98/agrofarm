<?php
session_start();
if(empty($_SESSION["username"])){
  header('location: ../index.php');
}
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Dashboard
           
    </h6>
  </div>

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
$sql = " SELECT * FROM product ;";
$result = $mysqli->query($sql);

//Store table records into an array
while( $row = $result->fetch_assoc() ) {
$mytable[] = $row;
}
?>




  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <tr>
          
            <th>ID</th>
            <th> Name </th>
            <th> Price</th>
            <th>Image</th>
            
            <th>Edit </th>
            <th>Delete </th>
          </tr>

           

          <tr>

          <?php foreach($mytable as $table) { ?>
            <td><?php echo $table['id'];?></td>
            <td><?php echo $table['productname'];?></td>
            <td><?php echo $table['productprice'];?></td>
            <td><img src="data:image/jpeg;base64,<?php echo base64_encode($table['productimage']); ?>" width="250" height="150" /></td>

           
            <td>
                <form method="post" action="edit.php">
                   
                <input type="hidden" name="edit_id" value="<?php echo $table['id']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form method="post" action="editpost.php">
                <input type="hidden" name="delete_id" value="<?php echo $table['id']; ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
               </form>
            </td>

          </tr>
        
          <?php } ?>
     
    </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->




