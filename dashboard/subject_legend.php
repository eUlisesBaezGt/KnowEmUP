<?php
$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "KnowEmUP";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT subject_code, subject_meaning FROM subject_legend";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[$row['subject_code']] = $row['subject_meaning'];
    }
}

echo json_encode($data);

$conn->close();
?>
