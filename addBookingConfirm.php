<?php
    $booking_movie_name = $_GET["Movie"];
    $booking_date = $_GET["Date"];;
    $booking_total_price = $_GET["Price"];
    $booking_movie_hall = $_GET["Hall"];
    $booking_movie_time = $_GET["Time"];
    $booking_movie_theatre = $_GET["Theatre"];
    $booking_movie_user = $_GET["User"];
    $booking_seats = $_GET["Seat"];
    
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

    $sql = "insert into bookings values ('$booking_movie_name', '$booking_date', '$booking_total_price', '$booking_movie_hall', '$booking_movie_time', '$booking_movie_theatre', '$booking_movie_user', '$booking_seats') ";
    $result = $db->query($sql);
    echo '<script>alert("Your booking is successfully added!"); location="personal.php"</script>';
?>