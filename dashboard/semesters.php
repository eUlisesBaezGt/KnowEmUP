<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "root";
$dbname = "KnowEmUP";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// DATA WILL BE AN ARRAY OF DICTIONARIES
$data = array();

for ($semester = 1; $semester <= 8; $semester++) {
    $sql = "SELECT COUNT(*) as total FROM users WHERE semester = '$semester';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Each element in data is a dictionary with 'semester' and 'count' keys
            $data[] = array('semester' => $semester . '°', 'count' => $row['total']);
        }
    } else {
        $data[] = array('semester' => $semester . 'ero', 'count' => 0);
    }
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
