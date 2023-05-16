<?php
$servername = "127.0.0.1:8889";
$username = "root";
$password = "root";
$dbname = "KnowEmUP";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create an array to hold the results
$data = array();

// Query the database
$result = $conn->query("SELECT COUNT(*) as total FROM users");
if ($result->num_rows > 0) {
    $data['students'] = $result->fetch_assoc()['total'];
}

$result = $conn->query("SELECT COUNT(*) as total FROM teachers");
if ($result->num_rows > 0) {
    $data['teachers'] = $result->fetch_assoc()['total'];
}

$result = $conn->query("SELECT COUNT(*) as total FROM teacher_grades");
if ($result->num_rows > 0) {
    $data['grades'] = $result->fetch_assoc()['total'];
}

// Set the response headers
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Print out JSON-encoded string representation of the PHP array
echo json_encode($data);

$conn->close();
?>
