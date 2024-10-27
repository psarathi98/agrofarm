



<?php 
session_start();
if(empty($_SESSION["username"])){
  header('location: ../404.html');
}
include('connection.php');

if(isset($_POST['passwordeditbtn'])) {
    $user = $_POST['username'];
   
    $newpass = PASSWORD_HASH($_POST['newpassword'], PASSWORD_DEFAULT);
 
    $query = "UPDATE admin SET userid ='$user', password ='$newpass'";
    $query_run = mysqli_query($mysqli, $query);
    
        if($query_run) 
        {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> Password has been changed successfully!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        
        else { 
            echo "Error: ". $query. "<br>". mysqli_error($mysqli);
        }
        
    }     
?>
