<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mynotes";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn)
{
    echo "Error: ". mysqli_error($conn);
    die;
}

?>