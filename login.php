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

        #formContainer {
            min-width: 40vw;
        }

        @media screen and (max-width: 650px) {
            #mainContainer {
                width: 90vw !important;
            }
        }
    </style>
</head>

<body>
    <?php
    require "partials/__navbar.php";

    if (isset($_GET['err']) and $_GET['err'] == 'email') {
        echo '<div class="alert alert-danger alert-dismissible fade show mx-2 border-rounded rounded-4" role="alert">
            <strong>Error!</strong> Email does not exist in our system, Please check your email and try again.
            <a href="login.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
            </div>';
    }
    if (isset($_GET['err']) and $_GET['err'] == 'password') {
        echo '<div class="alert alert-danger alert-dismissible fade show mx-2 border-rounded rounded-4" role="alert">
            <strong>Error!</strong> Password is incorrect, Please check your password and try again.
            <a href="login.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
            </div>';
    }
    if (isset($_GET['err']) and $_GET['err'] == 'wrong') {
        echo '<div class="alert alert-warning alert-dismissible fade show mx-2 border-rounded rounded-4" role="alert">
            <strong>Error!</strong> Something went wrong, Please try again later.
            <a href="login.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
            </div>';
    }
    ?>

    <div class="container shadow border-rounded rounded-5 my-4 d-flex justify-content-center align-items-center flex-column"
        id="mainContainer">
        <form class="d-flex flex-column" action="partials/__handleLogin.php" method="post">
            <div class="form-floating mb-3" id="formContainer">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email"
                    required>
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password"
                    required>
                <label for="floatingPassword">Password</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p class="mt-3 text-muted">Don't have an account, create one <a href="signUp.php"
                class="text-decoration-none">SignUp</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>