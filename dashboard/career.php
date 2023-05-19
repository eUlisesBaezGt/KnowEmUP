<?php
$servername = "localhost:8889";
$username = "root";
$password = "root";
$dbname = "KnowEmUP";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = array();

// Use a query to select all distinct careers from the users table
$careers_sql = "SELECT DISTINCT carreer FROM users;";
$careers_result = $conn->query($careers_sql);

// For each distinct career, get the count of users
while ($carreer = $careers_result->fetch_assoc()) {
    $escaped_carreer = $conn->real_escape_string($carreer['carreer']);
    $count_sql = "SELECT COUNT(*) as total FROM users WHERE carreer = '".$escaped_carreer."';";
    $count_result = $conn->query($count_sql);
    $count_row = $count_result->fetch_assoc();

    $data[] = array('carreer' => $carreer['carreer'], 'count' => $count_row['total']);
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Set the response headers
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Print out JSON-encoded string representation of the PHP array
echo json_encode($data);

$conn->close();
?>
