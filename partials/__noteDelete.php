<?php

require '__dbconnect.php';

session_start();
if (!(isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] == 'yes')) {
    header('location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $noteId = $_POST['noteId'];

    $sql_note_delete = "DELETE FROM `notes` WHERE `s_no` = '$noteId'";
    $result = mysqli_query($conn, $sql_note_delete);

    if($result)
    {
        header('location: ../notes.php?delete=success');
        exit;
    }
    else
    {
        header('location: ../notes.php?err=wrong');
        exit;
    }
}