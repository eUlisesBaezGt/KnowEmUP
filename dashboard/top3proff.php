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

$sql = "SELECT tg.teacherID, AVG(tg.grade) as promedio
        FROM teacher_grades tg
        GROUP BY tg.teacherID
        ORDER BY promedio DESC
        LIMIT 3;";

$result = $conn->query($sql);

$data = array();
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $data[] = array('teacherID' => $row['teacherID'], 'average_grade' => $row['promedio']);
    }
} else {
    $data[] = array('message' => 'No data found');
}

echo json_encode($data);

$conn->close();
?>
