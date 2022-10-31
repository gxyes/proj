<?php
    $password_input = $_GET["Password"];
    print_r($password_input);

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

    $sql = "select * from currentUser";
    $result = $db->query($sql);
    $records=$result->fetch_assoc();
    $current_user = $records["Name"];

    // print_r($current_user);

    $sql_update = "update users set Password='$password_input' where Name='$current_user'";
    // print_r($sql_update);
    $result_update = $db->query($sql_update);
    echo '<script>alert("Successfully change your password! Please sign in again!"); location.href="logout.php"</script>';
?>