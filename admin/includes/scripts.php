  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>


  <?php


$connection = mysqli_connect("localhost","root","","signuppage");

if(isset($_POST['registerbtn']))
{   
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmpassword'];

    if($password === $confirm_password)
    {
        $query = "INSERT INTO signuptable (fullname,userid,mailid,pin,user_type) VALUES ('$name','$username','$email','$password','$utype')";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            echo "<script type='text/javascript'>alert('Admin has been added succcessfully.');
            location='../register.php';</script>"; 
        }
        else 
        {
            echo "<script type='text/javascript'>alert('Admin can't be added!!');
            location='../register.php';</script>"; 
        }
    }
    else 
    {
        echo "pass no match";
        $_SESSION['status'] =  "Password and Confirm Password Does not Match";
        header('Location: ../register.php');
    }

}

?>