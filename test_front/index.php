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

$sql = "SELECT COUNT(*) as tot3 FROM users
WHERE semester = '3';";
$result = $conn->query($sql);

// USE THIS 2 VARIABLES Para pasar datos de PHP a JavaScript, puedes usar json_encode() para convertir tus datos de PHP
// en una cadena JSON, y luego puedes imprimir esa cadena JSON en tu script de JavaScript. Aquí hay un ejemplo de
// cómo podrías hacerlo:

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "0 results";
}
// Set Content-Type to application/json
header('Content-Type: application/json');

echo json_encode($data);

$conn->close();
?>

