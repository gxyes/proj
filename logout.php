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

    $sql = "update currentuser set Name='Null', Password='Null', URL='Null'";
    $result = $db->query($sql);
    header('location:index.php');
?>