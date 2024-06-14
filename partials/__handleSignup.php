<?php

require '__dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['FName'];
    $lname = $_POST['LName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $fname = str_replace("<", "&lt;", $fname);
    $fname = str_replace(">", "&gt;", $fname);

    $lname = str_replace("<", "&lt;", $lname);
    $lname = str_replace(">", "&gt;", $lname);

    $username = str_replace("<", "&lt;", $username);
    $username = str_replace(">", "&gt;", $username);

    $email = str_replace("<", "&lt;", $email);
    $email = str_replace(">", "&gt;", $email);

    $password = str_replace("<", "&lt;", $password);
    $password = str_replace(">", "&gt;", $password);

    $cpassword = str_replace("<", "&lt;", $cpassword);
    $cpassword = str_replace(">", "&gt;", $cpassword);

    if (str_contains($username, ' ')) {
        header("location: ../signUp.php?err=username");
        exit;
    }

    if ($password != $cpassword) {
        header("location: ../signUp.php?err=password");
        exit;
    }

    $sql_check_email = "SELECT `email` from `user_details` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql_check_email);

    if (mysqli_num_rows($result)) {
        header("location: ../signUp.php?err=email");
        exit;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    // Admin@001 - Arslan Khan

    $sql_insert_user = "INSERT into `user_details` ( `f_name`, `l_name`, `username`, `email`, `password`) VALUES ('$fname', '$lname', '$username', '$email', '$password')";
    $result = mysqli_query($conn, $sql_insert_user);

    if($result)
    {
        header("location: ../signUp.php?err=insertSuccess");
        exit;
    }
    else
    {
        header("location: ../signUp.php?err=wrong");
        exit;
    }
}

?>