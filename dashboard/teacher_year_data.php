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

$sql = "SELECT tg.teacherID, tg.year, AVG(tg.grade_profesor) as promedio
        FROM teacher_grades tg
        GROUP BY tg.teacherID, tg.year
        ORDER BY tg.teacherID, tg.year";

$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $teacherID = $row['teacherID'];
        $year = $row['year'];
        $average_grade = $row['promedio'];

        $data[$teacherID][$year] = $average_grade;
    }
} else {
    $data[] = array('message' => 'No data found');
}

echo json_encode($data);

$conn->close();
?>
