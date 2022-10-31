<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "moviefever";

    $db = new mysqli($servername, $username, $password, $databasename);

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Wrong!";
        exit;
    }

    $name = $_GET["User"];
    // $movie = $_GET["Movie"];

    $sql = "select * from currentUser";
    $result = $db->query($sql);
    $records=$result->fetch_assoc();
    $current_user = $records["Name"];

    // $user = $_GET["User"];
    // $name = $_GET["Name"];
    if ($current_user != "Null") {
        // header('location:moviedatas.php?Name='.$name.'');
        header('location:feedback.php?User='.$current_user.'');
    }
    else {
        header('location:login.php');
    }
?>