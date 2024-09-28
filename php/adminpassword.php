
<?php 
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
   
    $pass = $_POST['password'];
    $confirm_password = $_POST['confirmpassword'];
    

    $query = "UPDATE admin SET userid ='$user', password ='$pass'";
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
