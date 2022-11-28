<?php
session_start();

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

// RECEIVE DATA FROM FORM
$id_alumno = $_SESSION['id'];
$id_profesor = $_POST['profesor'];
$calif_alumno = $_POST['califAlumno'];
$calif_profesor = $_POST['califProfe'];


// CHECK IF THE USER HAS ALREADY QUALIFIED THE TEACHER
$sql1 = "SELECT * FROM knowemup.teacher_grades WHERE studentID = '$id_alumno' and teacherID = '$id_profesor'";
$result1 = $conn->query($sql1);

// IF ID ALREADY EXISTS

if ($result1->num_rows > 0) {
    echo '<script type="text/javascript">
    alert("Ya has evaluado a este profesor");
    window.location.href = "calif_alumno_prof.html";
    </script>';
} else {
    // IF NOT
    // INSERT DATA INTO DATABASE
    echo $id_alumno;
    echo $id_profesor;
    echo $calif_alumno;
    echo $calif_profesor;

    if ($id_alumno != '' || $id_profesor != '' || $calif_alumno != '' || $calif_profesor != '') {
        $sql = "INSERT INTO teacher_grades (teacherID, studentID, grade_alumno, grade_profesor)
            VALUES ('$id_profesor','$id_alumno', '$calif_alumno', $calif_profesor)";
        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript">
    alert("Docente evaluado");
    window.location.href = "calif_alumno_prof.html";
    </script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}




