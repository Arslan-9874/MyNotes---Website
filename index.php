<?php

session_start();
if (isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] == 'yes') {
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
            width: 70vw !important;
        }

        @media screen and (max-width: 650px) {
            #mainContainer {
                width: 90vw !important;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <?php
    require "partials/__navbar.php";
    ?>

    <div class="container shadow border-rounded rounded-5 my- d-flex justify-content-center align-items-center flex-column my-4"
        id="mainContainer">
        <h2 class="fw-semibold fs-2">Welcome to MyNotes</h2>
        <p class="mt-2 fs-5">Please Login or SignUp to continue</p>
        <div>
            <a href="login.php"><button class="btn btn-outline-primary my-1 mx-2 px-5">Login</button></a>
            <a href="signUp.php"><button class="btn btn-outline-primary my-1 mx-2 px-5">SignUp</button></a>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>