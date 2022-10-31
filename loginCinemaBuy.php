<?php
    $user = $_GET["User"];
    $theatre_name = $_GET["Name"];
    $movie = $_GET["Movie"];
    if ($user != "Null") {
        header('location:cinemadatas.php?Name='.$theatre_name.'&Movie='.$movie.'');
    }
    else {
        header('location:login.php');
    }
?>