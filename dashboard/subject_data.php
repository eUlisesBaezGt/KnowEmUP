<?php
$selectedSubject = $_GET['subject'];

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

$sql = "SELECT t.`teacherID`, AVG(g.grade_profesor) as avg_grade 
        FROM teachers t 
        JOIN teacher_grades g ON t.`teacherID` = g.teacherID 
        WHERE t.Subject1 = '$selectedSubject' OR t.Subject2 = '$selectedSubject' OR t.Subject3 = '$selectedSubject' 
        GROUP BY t.`teacherID`";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = array(
            'teacher' => $row['teacherID'],
            'avg_grade' => $row['avg_grade']
        );
    }
}

echo json_encode($data);

$conn->close();
?>
