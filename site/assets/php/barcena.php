<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "knowemup";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM knowemup.teacher_grades WHERE teacherID = 'Gerardo Bárcena'";
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
    echo '<script type="text/javascript">
    alert("Los estudiantes le dan: ' . $counter . '★' . ' y los estudiantes de sus clases obtienen: ' . $counter2 . '/100' . '");
    history.back();
    </script>';
} else {
    echo '<script type="text/javascript">
    history.back();
    alert("No hay resultados");
    </script>';
}
$conn->close();