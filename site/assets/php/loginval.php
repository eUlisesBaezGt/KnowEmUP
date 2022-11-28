<?php
session_start();

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

$sql = "SELECT * FROM knowemup.users WHERE studentID = '$id' AND `password` = '$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['id'] = $id;
    header("Location: calif_alumno_prof.html");
} else {
    header("Location: error2.html");
}

