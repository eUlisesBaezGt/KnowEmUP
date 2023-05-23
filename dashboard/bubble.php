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

$data = array();

$sql = "SELECT teacherID, subject, year, AVG(grade) as avg_grade, COUNT(grade) as grade_count
FROM teacher_grades
GROUP BY teacherID, subject, year";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $data[] = array(
        'teacherID' => $row['teacherID'],
        'subject' => $row['subject'],
        'year' => $row['year'],
        'avg_grade' => $row['avg_grade'],
        'grade_count' => $row['grade_count']
    );
}


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Set the response headers
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Print out JSON-encoded string representation of the PHP array
echo json_encode($data);

$conn->close();
?>
