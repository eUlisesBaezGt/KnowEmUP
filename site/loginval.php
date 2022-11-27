<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "knowemup";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// recieve data
$id = $_POST['fid'];
$pass = $_POST['pass'];
echo "ID: " . $id;
echo "PASS: " . $pass;

$sql = "SELECT * FROM knowemup.users WHERE studentID = '$id' AND `password` = '$pass'";
$result = $conn->query($sql);

//if ($result->num_rows > 0) {
//    echo "Login successful";
//} else {
//    header("Location: error2.html");
//}