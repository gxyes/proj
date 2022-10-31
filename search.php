<?php
    $movie = $_POST["movie"];
  
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

    if ($_GET["current"]) {
        print_r($_GET["current"]);
    }
    // date_default_timezone_set('Asia/Singapore');

    // $time = date("Y-m-d H:i:s");// Get current time
    // $like = 0;

    $sql = "insert into reviews values ('$comments', '$user', '$comment_movie', '$time', '$like') ";
    $result = $db->query($sql);

    header("location:loginMovieInfo.php?Name=$movie&User=$current_user");
    // echo '<script>location="moviedatas.php?Name='$movie'"</script>';
    // echo '<script>alert("Your comment is successfully added!"); location="forum.php"</script>';
?>