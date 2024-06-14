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

        <?php

        $noteId = $_POST['noteId'];
        $sql_get_notes = "SELECT * FROM `notes` WHERE `s_no` = '$noteId'";
        $result = mysqli_query($conn, $sql_get_notes);

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<input type="hidden" id="hiddenTitle" value="' . $row['title'] . '">';
            echo '<input type="hidden" id="hiddenDesc" value="' . $row['description'] . '">';
        }


        ?>


        <p class="fs-5 my-4 text-start fw-semibold">Edit your note - </p>
        <form action="partials/__noteEdit.php" method="post">
            <div>
                <input type="hidden" name="s_no" id="s_no" value="<?php echo $noteId; ?>">
                <div class="mb-3">
                    <label for="title" class="form-label">Note Title: </label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Note Description: </label>
                    <textarea type="password" class="form-control" id="description" name="desc" required
                        style="height: 30vh"></textarea>
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-outline-primary">Save Changes</button>
                <a href="notes.php" class="btn btn-outline-dark">Go Back</a>
            </div>
        </form>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script>

        let title = document.getElementById('hiddenTitle');
        let desc = document.getElementById('hiddenDesc');

        let newtitle = document.getElementById('title');
        let newdesc = document.getElementById('description');

        newtitle.value = title.value;
        newdesc.value = desc.value;

    </script>
</body>

</html>