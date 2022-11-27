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

// RECEIVE DATA FROM FORM
$id = $_POST['fid'];
$user = $_POST['username'];
$carr = $_POST['career'];
$names = $_POST['Name'];
$pass = $_POST['password'];
$sem = $_POST['semester'];

$progress_id = 'prog_' . $id;
$names = explode(" ", $names);
$fname = $names[0];
$lname = $names[1];
$email = $id . '@up.edu.mx';


// CHECK IF ID STARTS WITH 0 AND HAS 7 DIGITS
if (strlen($id) == 7 && $id[0] == '0') {
    // CHECK IF ID IS ALREADY REGISTERED
    $sql = "SELECT * FROM knowemup.users WHERE studentID = '$id'";
    $result = $conn->query($sql);

    // IF ID ALREADY EXISTS
    if ($result->num_rows > 0) {
        header("Location: error.html");
    } else {
        // IF ID DOES NOT EXIST
        // CHECK SECURE PASSWORD
        if (!preg_match('/^(?=.*[A-Z])(?=.{8,})/', $pass)) {
            header("Location: error.html");
        } else {

            // INSERT DATA INTO DATABASE
            if ($id != '' || $user != '' || $carr != '' || $names != '' || $pass != '' || $sem != '') {
                $sql = "INSERT INTO users (studentID, progress_id, username, fname, lname, email, `password`, faculty, carreer, semester)
        VALUES ('$id','$progress_id', '$user', '$fname', '$lname', '$email', '$pass', 'ING', '$carr', '$sem')";
                if ($conn->query($sql) === TRUE) {
                    header("Location: login.html");
                } else {
                    header("Location: error.html");
                }
            }
        }
    }
} else {
    header("Location: error.html");
    exit();
}


