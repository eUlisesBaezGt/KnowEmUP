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

// DATA WILL BE A DICTIONARY
$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data['3ero'] = $row['tot3'];
    }
} else {
    echo "0 results";
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Set Content-Type to application/json
// header('Content-Type: application/json');

// Print out JSON-encoded string representation of the PHP array
// KEY IS SEMESTER NUMBER, VALUE IS NUMBER OF STUDENTS
echo json_encode($data);

