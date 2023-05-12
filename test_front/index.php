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

$sql = "SELECT COUNT(*) FROM users
WHERE semester = '3';";
$result = $conn->query($sql);
$counter = 0;
$counter2 = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $counter += $row["grade_alumno"];
        $counter2 += $row["grade_profesor"];
    }
    $counter = $counter / $result->num_rows;
    $counter = $counter / 20;
    $counter2 = $counter2 / $result->num_rows;
}

// USE THIS 2 VARIABLES Para pasar datos de PHP a JavaScript, puedes usar json_encode() para convertir tus datos de PHP
// en una cadena JSON, y luego puedes imprimir esa cadena JSON en tu script de JavaScript. Aquí hay un ejemplo de
// cómo podrías hacerlo:

$data = [];
while ($row = $result->fetch_assoc()) {
    // Modify the following line according to your database structure
    $data[] = [3, $sql];
}

echo json_encode($data);

$conn->close();
?>

