<?php

require '__dbconnect.php';

session_start();
if (!(isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] == 'yes')) {
    header('location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $userId = $_SESSION['userId'];

    $title = str_replace("<", "&lt;", $title);
    $title = str_replace(">", "&gt;", $title);
    $title = trim($title);

    $desc = str_replace("<", "&lt;", $desc);
    $desc = str_replace(">", "&gt;", $desc);
    $desc = trim($desc);    

    
    $title = mysqli_real_escape_string($conn, $title);
    $desc = mysqli_real_escape_string($conn, $desc);

    $sql_create_note = "INSERT INTO `notes` (`title`, `description`, `user_id`) VALUES ('$title', '$desc', '$userId')";

    $result = mysqli_query($conn, $sql_create_note);

    if($result)
    {
        header('location: ../notes.php?err=success');
        exit;
    }
    else
    {
        header('location: ../notes.php?err=wrong');
        exit;
    }
}

?>