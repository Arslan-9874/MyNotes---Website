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


    if (isset($_GET['err']) and $_GET['err'] == 'username') {
        echo '<div class="alert alert-danger alert-dismissible fade show mx-2 border-rounded rounded-4" role="alert">
            <strong>Error!</strong> Username contains blank spaces.
            <a href="signUp.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
            </div>';
    }
    if (isset($_GET['err']) and $_GET['err'] == 'password') {
        echo '<div class="alert alert-danger alert-dismissible fade show mx-2 border-rounded rounded-4" role="alert">
            <strong>Error!</strong> Passwords does not match.
            <a href="signUp.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
            </div>';
    }
    if (isset($_GET['err']) and $_GET['err'] == 'email') {
        echo '<div class="alert alert-danger alert-dismissible fade show mx-2 border-rounded rounded-4" role="alert">
            <strong>Error!</strong> Email already in use, please try using a different email.
            <a href="signUp.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
            </div>';
    }
    if (isset($_GET['err']) and $_GET['err'] == 'wrong') {
        echo '<div class="alert alert-warning alert-dismissible fade show mx-2 border-rounded rounded-4" role="alert">
            <strong>Error!</strong> Something Went Wrong, Please try again later.
            <a href="signUp.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
            </div>';
    }
    if (isset($_GET['err']) and $_GET['err'] == 'insertSuccess') {
        echo '<div class="alert alert-success alert-dismissible fade show mx-2 border-rounded rounded-4" role="alert">
            <strong>Success!</strong> User has been registered Successfully, Please Login.
            <a href="signUp.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
            </div>';
    }
    ?>

    <div class="container shadow border-rounded rounded-5 my-4 d-flex justify-content-center align-items-center flex-column p-4"
        id="mainContainer">
        <form class="d-flex flex-column" action="partials/__handleSignup.php" method="post">
            <div class="form-floating mb-2 d-flex" id="formContainer">
                <div class="form-floating me-2">
                    <input type="text" class="form-control" id="floatingFName" placeholder="Arslan" name="FName"
                        required>
                    <label for="floatingFName" maxlength="255">First Name</label>
                </div>
                <div class="form-floating ms-2">
                    <input type="text" class="form-control" id="floatingName" placeholder="Khan" name="LName" required>
                    <label for="floatingLName" maxlength="255">Last Name</label>
                </div>
            </div>

            <div class="form-floating mb-2" id="formContainer">

                <input type="text" class="form-control" id="floatinguserName" placeholder="arslan001" name="username"
                    required>
                <label for="floatinguserName" maxlength="255" aria-describedby="usernameRequirements">Username</label>
                <div id="usernameRequirements" class="form-text">Username won't should not contain any blank spaces
                </div>

                <div id="username_availability_response"></div>

            </div>
            <div class="form-floating mb-2" id="formContainer">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email"
                    required>
                <label for="floatingInput" maxlength="255">Email address</label>
            </div>
            <div class="form-floating mb-2">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                    aria-describedby="PasswordRequirements" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    name="password" maxlength="255" required>
                <label for="floatingPassword">Password</label>
                <div id="PasswordRequirements" class="form-text">Password must be of 8 or more characters. And contain -
                </div>
                <div id="PasswordRequirements" class="form-text">At least one symbol, one Uppercase and one lowercase
                    character.</div>
            </div>
            <div class="form-floating mb-2">
                <input type="password" class="form-control" id="floatingcPassword" placeholder="Confirm Password"
                    name="cpassword" maxlength="255" required>
                <label for="floatingcPassword">Confirm Password</label>
            </div>
            <button type="submit" class="btn btn-primary">SignUp</button>
        </form>
        <p class="my-3 text-muted">Already have an account? <a href="login.php" class="text-decoration-none">Login</a>
        </p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $("#floatinguserName").keyup(function () {
                var username = $(this).val().trim();
                if (username != '') {
                    $.ajax({
                        url: 'partials/__username_availability_checker.php',
                        type: 'post',
                        data: { username: username },
                        success: function (response) {
                            $('#username_availability_response').html(response);
                        }
                    });
                } else {
                    $("#username_availability_response").html("");
                }
            });
        });
    </script>
</body>

</html>