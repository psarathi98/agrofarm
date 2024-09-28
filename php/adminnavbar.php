<?php 
include('connection.php');

if(isset($_POST['passwordeditbtn'])) {
    $user = $_POST['username'];
   
    $pass = $_POST['password'];
    $confirm_password = $_POST['confirmpassword'];
    

    $query = "UPDATE admin SET userid ='$user', password ='$pass'";
    $query_run = mysqli_query($mysqli, $query);
    
        if($query_run) 
        {
        
        
          echo '<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
          <strong>Holy guacamole!</strong> Password has been changed successfully!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }
        
        else { 
            echo "Error: ". $query. "<br>". mysqli_error($mysqli);
        }
        
    }     
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/adminpanel.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    

</head>
<body>
<div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="index.php">Agrofarm</a>
                </div>
                <ul class="sidebar-nav active">
                    <li class="sidebar-header">
                        Dashboard
                    </li>
                    <li class="sidebar-item mt-4">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="fa-solid fa-list pe-2"></i>
                            Products
                        </a>
                        <ul id="pages" class="sidebar-dropdown list collapse" data-bs-parent="#accordionsidebar">
                            <li class="sidebar-item mt-3">
                                <a href="dashboard.php" class="sidebar-link">view products</a>
                            </li>
                            <li class="sidebar-item mt-3">
                                <a href="newproduct.php" class="sidebar-link">Add new product</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item mt-3">
                        <a href="carousel.php" class="sidebar-link" ><i class="fas fa-fw fa-chart-area pe-2"></i>
                            carousel
                        </a>
                       
                   </li>

                    
                    
                    
                </ul>
            </div>
        </aside>
 <div class = "main">
 <nav class="navbar navbar-expand px-3 border-bottom">
                    <button class="btn" id="sidebar-toggle" type="button">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse navbar">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <i class="fa-regular fa-user h4"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item">Profile</a>
                                    <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#resetpassword">Setting</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

        
                <a href="#" class="theme-toggle">
                <i class="fa-regular fa-sun"></i>
                <i class="fa-regular fa-moon"></i>
            </a>
           <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/adminpanel.js"></script>
</body>
</html>

<?php
include('connection.php');

$sql = " SELECT * FROM admin ";
$result = $mysqli->query($sql);

?>


<script>
      function matchPass(){
        var firstpassword=document.form.password.value;
        var secondpassword=document.form.confirmpassword.value;
        
        if(firstpassword==secondpassword){
        return true;
        }
        else{
        alert("password must be same!");
        return false;
        }
        }
        
  </script>
    
<div class="modal fade" id="resetpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reset profile password</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

              <?php
                    // LOOP TILL END OF DATA
                    while($rows=$result->fetch_assoc())
                    {
              ?>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="form" onsubmit="return matchPass()" novalidate="true">
            <div class="modal-body">
            
                <div class="form-group">
                    <label class="form-label mt-4"> Username </label>
                    <input type="text" name="username" class="form-control" placeholder="Enter Username" value="<?php echo $rows['userid'] ?>">
                </div>
            
                <div class="form-group">
                    <label class="form-label mt-4">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password">
                </div>

                <div class="form-group">
                    <label class="form-label mt-4">Confirm Password</label>
                    <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
                </div>
            
           </div>
            <?php } ?>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="passwordeditbtn" class="btn btn-success">Save</button>
            </div>
            
       </form>

    </div>
  </div>
</div>
               
            


