<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');


ob_start();
session_start();


$servername = "localhost";
$usercheck = "u161634348_agrofarm";
$pincheck = "abAgro_farm@11";
$dbname = "u161634348_adminrecord";


$conn = new mysqli($servername, $usercheck, $pincheck, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



//testing
   
 
  if(isset($_POST['login']))  
  {
       
            
            $uname = $_POST["username"];
            $pin = $_POST["passwordfield"];
        
            $sql = "SELECT * FROM admin where userid = '$uname' OR emailid = '$uname'";
            $result = mysqli_query($conn, $sql);
            mysqli_fetch_all($result, MYSQLI_ASSOC);
             foreach($result as $user) {

       if (password_verify($pin, $user['password']))
        {
          $_SESSION['valid'] = true;
          $_SESSION['timeout'] = time();
          $_SESSION['username'] = $_POST['username'];
          $_SESSION['name'] = $user['name'];
          $_SESSION['sname'] = $user['surname'];
          
          echo "<script type='text/javascript'>alert('Hey admin We are redirecting you to admin page');
          location='adminHomepage.php';
          </script>";
      }
      else if(($user['userid'] == $uname) &&
          ($user['password'] != $pin)) {
            echo "<script type='text/javascript'>alert('wrong password');
            location='../login.php';
          </script>";
             
      }
      
  }
  
}

?>
    
