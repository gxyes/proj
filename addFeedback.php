<?php
    $user = $_POST["user"];
    $feedback = $_POST["feedback"];
    
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
    date_default_timezone_set('Asia/Singapore');

    $time = date("Y-m-d H:i:s");// Get current time

    $sql = "insert into feedback values ('$feedback', '$user', '$time') ";
    $result = $db->query($sql);
    echo '<script>alert("Your feedback is successfully submitted!"); location="index.php"</script>';
?>