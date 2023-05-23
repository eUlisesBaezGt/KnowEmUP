<?php
$selectedProfessor = $_GET['teacher'];

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

$years = [2019, 2020, 2021, 2022, 2023];

foreach($years as $year){
    $sql = "SELECT AVG(grade) AS avg_grade FROM teacher_grades WHERE teacherID = '$selectedProfessor' AND year = $year";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = array(
                'year' => $year,
                'avg_grade' => $row['avg_grade']
            );
        }
    }
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Set the response headers
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

echo json_encode($data);

$conn->close();
?>
