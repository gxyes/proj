<?php
    $user = $_GET["User"];
    $name = $_GET["Name"];
    if ($user != "Null") {
        header('location:moviedatas.php?Name='.$name.'');
    }
    else {
        header('location:login.php');
    }
?>