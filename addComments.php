<?php
    $user = $_POST["user"];
    $comment_movie = $_POST["movie_name"];
    $comments = $_POST["comments"];
    
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
    $like = 0;

    $sql = "insert into reviews values ('$comments', '$user', '$comment_movie', '$time', '$like') ";
    $result = $db->query($sql);
    echo '<script>alert("Your comment is successfully added!"); location="forum.php"</script>';
?>