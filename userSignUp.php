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
    if ($num_records != 0) {
        // echo '<script>alert("This username has already existed!")</script>';
        // sleep(3);
        // header('location:login.php');
        echo '<script>alert("This username has already existed!"); location.href="login.php"</script>';
    } else {
        // echo '<script>alert("Finish! Please sign in!")</script>';
        // sleep(3);
        // header('location:login.php');
        $add_user_sql = "insert into users values ('$user', '$pwd', '')";
        $add_result = $db->query($add_user_sql);
        echo '<script>alert("Finish! Please sign in!"); location.href="login.php"</script>';
    }
    
?>