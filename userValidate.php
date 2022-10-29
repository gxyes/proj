<?php
    $user = $_GET["Username"];
    $pwd = $_GET["Password"];

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

    $sql = "select * from users where Name='$user'";
    $result = $db->query($sql);
    $records = array();
    while($row=$result->fetch_assoc())
    {
        $records[]=$row;
    };

    $num_records = count($records);
    $database_pwd = $records[0]["Password"];
    if ($num_records != 0 && $database_pwd == $pwd) {
        $img_url = $records[0]["URL"];
        $update = "update currentUser set Name='$user', Password='$pwd', URL='$img_url'";
        $result_update = $db->query($update);
        header("location:index.php?current=$user");
    } else {
        echo '<script>alert("Wrong username or password!")</script>';
        header('location:login.php');
    };
    
?>