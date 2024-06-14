<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">MyNotes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>

            <?php

            if (isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] == 'yes') {
                echo '<a href="partials/__handleLogout.php"><button class="btn btn-outline-danger mx-2" type="submit">Logout</button></a>';
            } else {
                echo '<a href="login.php"><button class="btn btn-outline-success mx-2" type="submit">Login</button></a>
            <a href="signUp.php"><button class="btn btn-outline-success" type="submit">SignUp</button></a>';
            }

            ?>


        </div>
    </div>
</nav>