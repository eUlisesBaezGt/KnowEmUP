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

// Get the subjects for the selected professor
$sqlSubjects = "SELECT Subject1, Subject2, Subject3 FROM teachers WHERE TeacherID = '$selectedProfessor'";
$resultSubjects = $conn->query($sqlSubjects);

$subjects = array();

if ($resultSubjects->num_rows > 0) {
    $row = $resultSubjects->fetch_assoc();
    $subjects = array($row['Subject1'], $row['Subject2'], $row['Subject3']);
}

$data = array();

foreach ($subjects as $subject) {
    $sql = "SELECT COUNT(*) AS count, AVG(grade_profesor) as grade FROM teacher_grades WHERE teacherID = '$selectedProfessor' AND subject = '$subject'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = array(
                'subject' => $subject,
                'grade' => $row['grade'],
                'count' => $row['count']
            );
        }
    }
}

echo json_encode($data);

$conn->close();
?>
