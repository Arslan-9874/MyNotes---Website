<?php
session_start();
if (!(isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] == 'yes')) {
  header('location: login.php');
  exit;
}


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" />
  <style>
    #mainContainer {
      min-height: 83vh;
      width: 90vw !important;
    }

    .dt-length label {
      margin-left: 0.5rem;
    }

    #myTable>colgroup>col:nth-child(1) {
      min-width: 15vw;
    }

    #myTable>colgroup>col:nth-child(3) {
      width: 25vw !important;
    }
  </style>
</head>

<body>

  <?php
  require "partials/__navbar.php";
  require "partials/__dbconnect.php";

  $userId = $_SESSION['userId'];
  $sql_user_name = "SELECT * FROM `user_details` WHERE `s_no` = '$userId'";
  $result = mysqli_query($conn, $sql_user_name);

  // while ($row = mysqli_fetch_assoc($result)) {
  //   // echo $row['f_name'] . " " . $row['l_name'];
  // }
  

  if (isset($_GET['err']) and $_GET['err'] == 'wrong') {
    echo '<div class="alert alert-danger alert-dismissible fade show mx-2 border-rounded rounded-4" role="alert">
        <strong>Error!</strong> Something went wrong, Please try again later.
        <a href="login.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
        </div>';
  }
  if (isset($_GET['err']) and $_GET['err'] == 'success') {
    echo '<div class="alert alert-success alert-dismissible fade show mx-2 border-rounded rounded-4" role="alert">
        <strong>Success</strong> Your note has been created successfully.
        <a href="notes.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
        </div>';
  }
  if (isset($_GET['delete']) and $_GET['delete'] == 'success') {
    echo '<div class="alert alert-danger alert-dismissible fade show mx-2 border-rounded rounded-4" role="alert">
        <strong>Deleted!</strong> Your note has been deleted successfully.
        <a href="notes.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
        </div>';
  }
  ?>

  <div class="container shadow border-rounded rounded-5 my-4 p-4 pt-1 flex-column" id="mainContainer">
    <?php

    while ($row = mysqli_fetch_assoc($result)) {
      // echo $row['f_name'] . " " . $row['l_name'];
      echo '<h2 class="my-4 text-center">Welcome, ' . $row['f_name'] . " " . $row['l_name'] . '</h2>';
    }

    ?>

    <p class="fs-5 my-4 text-start fw-semibold">Create new Note - </p>
    <form action="partials/__newNote.php" method="post">
      <div class="mb-3">
        <label for="title" class="form-label">Enter Title: </label>
        <input type="text" class="form-control" id="title" name="title" required>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Enter Description: </label>
        <textarea type="password" class="form-control" id="description" name="desc" required
          style="min-height: 20vh"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Create Note</button>
    </form>

    <hr class="my-4">

    <p class="fs-5 my-4 text-start fw-semibold">Here's the list of your Notes - </p>


    <table id="myTable" class="display">
      <thead>
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $userId = $_SESSION['userId'];
        $sql_get_notes = "SELECT * FROM `notes` WHERE `user_id` = '$userId'";
        $result = mysqli_query($conn, $sql_get_notes);

        while ($row = mysqli_fetch_assoc($result)) {


          $desc = $row['description'];
          if (strlen($desc) > 50) {
            $desc = substr($row['description'], 0, 100);
            $desc = $desc . '...';
          }


          echo '<tr>
            <td>' . $row['title'] . '</td>

            <td>' . $desc . '</td>

            <td>
            <form method="post">
            <input type="hidden" name="noteId" id="noteId" value="' . $row['s_no'] . '">
            <button type="submit" formaction="noteView.php" class="btn btn-outline-primary">View</button>
            <button type="submit" formaction="noteEdit.php" class="btn btn-outline-primary">Edit</button>
            <button type="submit" formaction="partials/__noteDelete.php" class="btn btn-outline-danger">Delete</button>
            </form>
            </td>
            </tr>';

        }

        ?>


      </tbody>
    </table>

  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
  <!-- <script src="https://cdn.datatables.net/2.0.8/js/dataTables.jqueryui.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script>
    // let table = new DataTable('#myTable');
    $('#myTable').DataTable({
      responsive: true,
      "order": [],
    });
  </script>
</body>

</html>