<?php
$selectedProfessor = $_GET['professor'];

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

$sql = "SELECT COUNT(*) AS count, AVG(grade_profesor) as grade FROM teacher_grades WHERE teacherID = '$selectedProfessor'";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = array(
            'grade' => $row['grade'],
            'count' => $row['count']
        );
    }
}

echo json_encode($data);

$conn->close();
?>
