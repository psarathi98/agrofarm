<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');




$servername = "localhost";
$usercheck = "root";
$passcheck = "";
$dbname = "mydb";


$conn = new mysqli($servername, $usercheck, $passcheck, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}




  //$user_check = $_POST['username'];
  //$pass_check= $_POST['passwordfield'];


/*if(isset($_POST['login'])) {
    $sql = mysqli_query($conn,
    "SELECT userid,pin FROM signuptable WHERE userid='"
    . $_POST["username"] . "' AND
    pin='" . $_POST["passwordfield"] . "'    ");

    $num = mysqli_num_rows($sql);
   
    if($num > 0) {
        $row = mysqli_fetch_array($sql);
        echo '<script>alert("Hey u have succesfully loggedin")</script>';
        header("Location: home.php");
        exit();
    }
    else {
        echo '<script>alert("Invalid user id or password!!")</script>';
    }
}*/


//testing

     
  $uname = $_POST["username"];
  $pin = $_POST["password"];
  $sql = "SELECT * FROM adminrecord where username = '$uname' and password = '$pin";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) === 1) {

    $row = mysqli_fetch_assoc($result);
    
    if ($row[‘username’] == $uname && $row[‘password’] == $pin) 
    {
        echo “loggedin";
    
    }    
  }
      
  
  


?>
    