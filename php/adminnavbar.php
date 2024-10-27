
<?php 
session_start();
if(empty($_SESSION["username"])){
  header('location: ../404.html');
}
include('connection.php');

if(isset($_POST['passwordeditbtn'])) {
    $user = $_POST['username'];
    $mail = $_POST['mailid'];
    $confirmpass = PASSWORD_HASH($_POST['confirmpassword'], PASSWORD_DEFAULT);
 
    $query = "UPDATE admin SET  password ='$confirmpass', emailid ='$mail' WHERE userid ='$user'";
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
                <ul class="sidebar-nav">
                    <li class="sidebar-item mt-4 ms-4">
                         <a href="adminHomepage.php" class="link-light">
                           <svg width="20px" height="20px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g fill="#ffffff" fill-rule="evenodd" clip-rule="evenodd"> <path d="M1 2.25C1 1.56 1.56 1 2.25 1h3.5C6.44 1 7 1.56 7 2.25v11.5C7 14.44 6.44 15 5.75 15h-3.5C1.56 15 1 14.44 1 13.75V2.25zm1.5.25v11h3v-11h-3zM9 2.25C9 1.56 9.56 1 10.25 1h3.5c.69 0 1.25.56 1.25 1.25v3.5C15 6.44 14.44 7 13.75 7h-3.5C9.56 7 9 6.44 9 5.75v-3.5zm1.5.25v3h3v-3h-3zM10.25 9C9.56 9 9 9.56 9 10.25v3.5c0 .69.56 1.25 1.25 1.25h3.5c.69 0 1.25-.56 1.25-1.25v-3.5C15 9.56 14.44 9 13.75 9h-3.5zm.25 4.5v-3h3v3h-3z"></path> </g> </g></svg>
                            Dashboard
                        </a>
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['name']?></span>
                                <img class="img-profile rounded-circle"
                                    src="../docs/images/logo/profile_small.png">
                                    
                            </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#profile">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle px-1" viewBox="0 0 16 16">
                                          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                          <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                        </svg>Profile</a>
                                    <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#resetpassword">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Setting</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout</a>
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

$sql = " SELECT * FROM admin ;";
$result = $mysqli->query($sql);

$mytable = array();

//Store table records into an array
while( $row = $result->fetch_assoc() ) {
$mytable[] = $row;
}
?>



<script>
    function matchPass()
    {
    if(document.form.oldpassword.value=="")
    {
        alert("Old Password Field is Empty !!");
        document.form.oldpassword.focus();
        return false;
    }
    
    else if(document.form.newpassword.value=="")
    {
        alert("New Password Field is Empty !!");
        document.form.newpassword.focus();
        return false;
    }
    else if(document.form.confirmpassword.value=="")
    {
        alert("Confirm Password Field is Empty !!");
        document.form.confirmpassword.focus();
        return false;
    }
    
    
    else if(document.form.newpassword.value!= document.form.confirmpassword.value)
    {
        alert("Password and Confirm Password Field do not match  !!");
        document.form.confirmpassword.focus();
        return false;
    }
    
    
    return true;
    }
</script>
        
 <!--- Reset Password Starting--->
 
<div class="modal fade" id="resetpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reset profile password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>

          <?php foreach($mytable as $table) { ?>


        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="post" name="form" onsubmit="return matchPass()">
            <div class="modal-body">
            
                <div class="form-group">
                    <label class="form-label mt-4"> Username </label>
                    <input type="text" name="username"  id="username" class="form-control" value="<?php echo $table['userid'] ?>" required>
                </div>
            
                <div class="form-group">
                    <label class="form-label mt-4"> Email </label>
                    <input type="text" name="mailid"  id="mailid" class="form-control" value="<?php echo $table['emailid'] ?>" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label mt-4">New Password</label>
                    <input type="password" name="newpassword" id="newpassword" class="form-control" placeholder="Enter new Password" required>
                </div>

                <div class="form-group">
                    <label class="form-label mt-4">Confirm Password</label>
                    <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password" required>
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

 <!--- Reset Password Ending--->

 <!--- Profile modal Starting--->
<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
          <?php foreach($mytable as $table) { ?>


        <form action=""  method="post" name="form" onsubmit="return matchPass()">
            <div class="modal-body">
            
                <div class="form-group">
                    <label class="form-label mt-4"> First Name </label>
                    <input type="text" name="name"  id="name" class="form-control" value="<?php echo $table['name'] ?>" disabled>
                </div>
                
                 <div class="form-group">
                    <label class="form-label mt-4"> Last Name </label>
                    <input type="text" name="sname"  id="sname" class="form-control" value="<?php echo $table['surname'] ?>" disabled>
                </div>
                
                <div class="form-group">
                    <label class="form-label mt-4"> Username </label>
                    <input type="text" name="username"  id="username" class="form-control" value="<?php echo $table['userid'] ?>" disabled>
                </div>
            
            
                <div class="form-group">
                    <label class="form-label mt-4"> Email </label>
                    <input type="email" name="mailid"  id="mailid" class="form-control" value="<?php echo $table['emailid'] ?>" disabled>
                </div>
                
           </div>
            <?php } ?>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            
       </form>

    </div>
  </div>
</div>

 <!--- Profile modal Ending--->               
            


