<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

ob_start();
session_start();


$servername = "localhost";
$usercheck = "root";
$pincheck = "";
$dbname = "adminrecord";


$conn = new mysqli($servername, $usercheck, $pincheck, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}






//testing

     
  $uname = $_POST["username"];
  $pin = $_POST["passwordfield"];

  $sql = "SELECT * FROM admin";
  $result = mysqli_query($conn, $sql);
  mysqli_fetch_all($result, MYSQLI_ASSOC);

   
  foreach($result as $user) {
  if(isset($_POST['login']))  
  {
      if(($user['userid'] == $uname) &&
        ($user['password'] == $pin)) 
        {
          $_SESSION['valid'] = true;
          $_SESSION['timeout'] = time();
          $_SESSION['username'] = $_POST['username'];
          echo "Sessions variables are set";
          echo "<script type='text/javascript'>alert('Hey admin We are redirecting you to admin page');
          location='homepage.php';
          </script>";
      }
      else if(($user['userid'] == $uname) &&
          ($user['pin'] == $password)) {
            echo "<script type='text/javascript'>alert('wrong userid or password');
            location='../login.php';
          </script>";
             
      }
      
  }
  
}

?>
    
