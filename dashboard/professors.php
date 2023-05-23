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

$sql = "SELECT teacherID FROM teachers";
$result = $conn->query($sql);

$teacherID = array();
// Add default option to the start of the array
$teacherID[] = "Selecciona un profesor";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $teacherID[] = $row["teacherID"];
    }
    echo json_encode($teacherID);
} else {
    echo "0 results";
}

$conn->close();
?>
