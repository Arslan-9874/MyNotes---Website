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
    $noteId = $_POST['s_no'];

    $title = str_replace("<", "&lt;", $title);
    $title = str_replace(">", "&gt;", $title);
    $title = trim($title);

    $desc = str_replace("<", "&lt;", $desc);
    $desc = str_replace(">", "&gt;", $desc);
    $desc = trim($desc);

    
    $title = mysqli_real_escape_string($conn, $title);
    $desc = mysqli_real_escape_string($conn, $desc);

    $sql_update_note = "UPDATE `notes` SET `title` = '$title', `description` = '$desc' WHERE `s_no` = '$noteId'";

    $result = mysqli_query($conn, $sql_update_note);

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