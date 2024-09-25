<?php
// submit.php
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "adminrecord";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the data from the POST request
$data1 = $_POST['data'];
$data2 = $_POST['data2'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO  (productname,productprice) VALUES (?,?)");
$stmt->bind_param("s", $data);

if ($stmt->execute()) {
    echo "Data submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
