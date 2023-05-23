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

$sql = "SELECT DISTINCT Subject1 AS Subject FROM teachers WHERE Subject1 IS NOT NULL AND Subject1 != '' UNION SELECT DISTINCT Subject2 FROM teachers WHERE Subject2 IS NOT NULL AND Subject2 != '' UNION SELECT DISTINCT Subject3 FROM teachers WHERE Subject3 IS NOT NULL AND Subject3 != ''";
$result = $conn->query($sql);

$subjects = array();
$subjects[] = "Selecciona una materia";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $subjects[] = $row['Subject'];
    }
}

echo json_encode($subjects);

$conn->close();
?>
