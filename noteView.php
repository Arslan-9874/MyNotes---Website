<?php

session_start();
if (!(isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] == 'yes')) {
    header('location: notes.php');
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyNotes - Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        #mainContainer {
            min-height: 83vh;
            width: 90vw !important;
        }

        #formContainer {
            min-width: 40vw;
        }
    </style>
</head>

<body>
    <?php
    require "partials/__navbar.php";
    require "partials/__dbconnect.php";


    ?>

    <div class="container shadow border-rounded rounded-5 my-4 p-5 flex-column" id="mainContainer">

        <div style="min-height: 50vh">
            <?php

            $noteId = $_POST['noteId'];
            $sql_get_notes = "SELECT * FROM `notes` WHERE `s_no` = '$noteId'";
            $result = mysqli_query($conn, $sql_get_notes);

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<p class="mx-5 mt-5"><strong>Title: </strong>' . $row['title'] . ' </p>';
                echo '<p class="mx-5"><strong>Description: </strong> ' . $row['description'] . ' </p>';
            }


            ?>


        </div>
        <div class="text-center">
            <a href="notes.php"><button class="btn btn-primary">Go Back</button></a>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>