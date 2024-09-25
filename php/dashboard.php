<?php include('newnavbar.php');
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




  <div class="card-body" >

  

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
            <td><img src="data:image/jpeg;base64,<?php echo base64_encode($table['productimage']); ?>" width="170" height="140" /></td>

           
            <td>
                <form method="post" action="edit.php">
                   
                <input type="hidden" name="edit_id" value="<?php echo $table['id']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg></button>
                </form>
            </td>
            <td>
                <form method="post" action="editpost.php">
                <input type="hidden" name="delete_id" value="<?php echo $table['id']; ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg>
</button>
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

