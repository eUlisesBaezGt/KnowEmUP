<?php
$selectedProfessor = $_GET['professor'];

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
$avg_grades = array();

// Get the average grade for year (no matter the subject) for each year year in list years = [2019, 2020, 2021, 2022, 2023]
for ($year = 2019; $year <= 2023; $year++)  {
    $sql = "SELECT AVG(grade) AS avg_grade FROM teacher_grades WHERE teacherID = '$selectedProfessor' AND year = '$year'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $avg_grade = $row['avg_grade'];
    $avg_grades[] = $avg_grade;
}


echo json_encode($avg_grades);

$conn->close();
?>

