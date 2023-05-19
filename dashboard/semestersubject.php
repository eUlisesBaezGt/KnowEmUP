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
for($semester = 1; $semester <= 8; $semester++){
    $sql = "SELECT COUNT(*) as total FROM subjects WHERE semester = '$semester';";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $data[] = array('semester' => $semester . '°', 'count' => $row['total']);
        }
    }else{
        $data[] = array('semester' => $semester . '°', 'count' => 0);
    }
}

echo json_encode($data);

$conn->close();
