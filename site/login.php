<?php
# GET ID & PASSWORD FROM FORM
$id = $_POST['form3Example3'];
$pw = $_POST['form3Example4'];

# CHECK ID & PASSWORD
if ($id == 'admin' && $pw == '1234') {
    echo 'Login Success';
    /*# SET SESSION
    session_start();
    $_SESSION['form3Example3'] = $id;
    $_SESSION['form3Example4'] = $pw;
    # REDIRECT TO MAIN PAGE
    header('Location: index.html');*/
} else {
    echo 'Login Failed';
    # REDIRECT TO LOGIN PAGE
    /*header('Location: login.html');*/
}
