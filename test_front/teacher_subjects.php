<!-- THIS FILE OBTAINS THE AVERAGE TEACHER_GRADE AND STUDENT GRADE FOR EACH SUBJECT OF EVERY PROFESSOR -->
<?php
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

// SUBJECTS DICITONARY
$subjects = array();

// GET ALL SUBJECTS
$sql = "SELECT * FROM subjects;";
