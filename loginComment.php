<?php
    $user = $_GET["User"];
    $name = $_GET["Name"];
    if ($user != "Null") {
        // header('location:moviedatas.php?Name='.$name.'');
        header('location:leavecomments.php?User='.$current_user.'&Movie='.$name.'');
    }
    else {
        header('location:login.php');
    }
?>