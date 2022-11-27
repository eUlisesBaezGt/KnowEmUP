<!--get all data from form and insert into database-->
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


// CHECK IF ID ALREADY EXISTS
$sql = "SELECT * FROM knowemup.users WHERE studentID = '$id'";
$result = $conn->query($sql);

// IF ID ALREADY EXISTS
if ($result->num_rows > 0) {
    echo "ID already exists <br/>";
} else {
    // IF ID DOES NOT EXIST
    // INSERT DATA INTO DATABASE
    if ($id != '' || $user != '' || $carr != '' || $names != '' || $pass != '' || $sem != '') {
        $sql = "INSERT INTO users (studentID, progress_id, username, fname, lname, email, `password`, faculty, carreer, semester)
        VALUES ('$id','$progress_id', '$user', '$fname', '$lname', '$email', '$pass', 'ING', '$carr', '$sem')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error";
        }
    }
}

