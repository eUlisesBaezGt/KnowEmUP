<!DOCTYPE html>
<html>

<head>
    <title>Insert Page page</title>
</head>

<body>
<center>
    <?php

    // servername => localhost
    // username => root
    // password => empty
    // database name => staff
    $conn = mysqli_connect("localhost", "root", "", "staff");

    // Check connection
    if ($conn === false) {
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }

    // Data input
    $f_id = $_REQUEST['f_id'];
    $user_name = $_REQUEST['user_name'];
    $carrer_ = $_REQUEST['carrer_'];
    $name_ = $_REQUEST['name_'];
    $pass_word = $_REQUEST['pass_word'];
    $semester_ = $_REQUEST['semester_'];

    // Performing insert query execution
    $sql = "INSERT INTO nombreTabla  VALUES ('$f_id',
            '$user_name','$carrer_','$name_','$pass_word','$semester_')";

    if (mysqli_query($conn, $sql)) {
        echo "<h3>data stored in a database successfully."
            . " Please browse your localhost php my admin"
            . " to view the updated data</h3>";

        echo nl2br("\n$f_id\n $user_name\n "
            . "$carrer_\n $name_\n $pass_word\n $semester_");
    } else {
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
    ?>
</center>
</body>

</html>