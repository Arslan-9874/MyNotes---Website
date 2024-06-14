<?php
require "__dbconnect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $sql_check_user = "SELECT * from `user_details` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql_check_user);

    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ( password_verify($password, $row['password']) ) {
                session_start();
                $_SESSION['loggedIn'] = 'yes';
                $_SESSION['userId'] = $row['s_no'];
                header("location: ../notes.php");
                exit;
            } else {
                header("location: ../login.php?err=password");
                exit;
            }
        }
    } else {
        header("location: ../login.php?err=email");
        exit;
    }
}
else
{
    header("location: ../login.php?err=wrong");
        exit;
}
?>