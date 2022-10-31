<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/moviedata.css">
    <link rel="stylesheet" href="css/clear.css">
    <title>Comments</title>
    <link rel="icon" href="images/cinema.png">
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
        $movie = $_GET["Movie"];

        $sql = "select * from currentUser";
        $result = $db->query($sql);
        $records=$result->fetch_assoc();
        $current_user = $records["Name"];

        // if ($_GET["current"]) {
        //     print_r($_GET["current"]);
        // }
    ?>
</head>

<body>
    <!-- header -->
    <header>
        <div class="header-body">
            <a href="index.php" class="logo">MovieFever</a>
            <div class="city">Jurong
                <span class="caret"></span>
            </div>
            <div class="city-list">
                <div class="now-city">
                    
                </div>
                <div class="citys">
                    <span class="icon"></span> failed to locate
                </div>
            </div>
            <div class="nav">
                <ul class="nav-list">
                    <li><a href="index.php" class="nav-model">Home</a></li>
                    <li><a href="movieList.php?Genre='all_select'&Region='all_select'&Year='all_select'" class="nav-model">Movie</a></li>
                    <li><a href="cinemaList.php?Category='all_select'&Region='all_select'&Special='all_select'" class="nav-model">Theatre</a></li>
                    <li><a href="forum.php" class="nav-model active">Forum</a></li>
                    <!-- <li><a href="cinemas.html" class="nav-model">Shop</a></li> -->
                </ul>
            </div>
            <div class="app-download">
                <a href="#">
                    <span class="phone"></span> App Download
                    <span class="caret"></span>

                    <div class="appcode">
                        <img src="images/phonecode.png" class="app-code"></img>
                        <p class="down-tip">Scan QR Code</p>
                        <p class="down-text">Download App</p>
                    </div>
                </a>
            </div>
            <div class="search">
                <div type="text" class="searchinput">
                    <form action="search.php" method="post">
                        <input type="text" class="input" name="movie" placeholder="Search for movies">
                        <input class="submit" type="submit" value="">
                    </form>
                </div>
            </div>
            <div class="userimg">
                <img src="images/login.png" style="width:40%;height:40%" alt="">
                <span class="caret"></span>
            </div>
            <div class="userlogin">
                <?php
                    if ($current_user == "Null") {
                        echo "<a href='login.php' class='notlogin' style='font-size: 12px'>Login/Sign Up</a>";
                    }
                    else {
                        echo "<div class='islogin nologin' style='font-size: 12px'>";
                        echo "<a href='personal.php'>Profile</a>";
                        echo "<a href='logout.php'>Log Out</a>";
                        echo "</div>";
                    }
                ?>
                <!-- <a href="login.php" class="notlogin" style="font-size: 12px">Login/Sign Up</a>
                <div class="islogin nologin" style="font-size: 12px">
                    <a href="personal.html">Profile</a>
                    <a href="index.html">Log Out</a>
                </div> -->
            </div>
    </header>
    <?php
        $sql_commends = "select * from reviews";
        $result_commends = $db->query($sql_commends);
        $records_commends=array();
        while($row=$result_commends->fetch_assoc())
        {
            $records_commends[]=$row;
        };
        $num_commends = count($records_commends);
    ?>

    <!-- Main -->
    <div class="container" style="margin-top: 20px;">
        <!-- Left -->
        <div class="main" style="width: 100%">
            <!-- Nav tab -->
            <div class="nav">
                <a href="index.php">
                    Home
                </a> >
                <a href="movies.php">
                    Movies
                </a> >
                <a href="#">
                    Leave Comments
            </div>
            <!-- Comment Form -->
            <div class="comment" style="margin-top: 90px;">
                <div class="intro" id="reviews" style="width: 100%">
                    <div class="intro-text" style="width: 100%">
                        <span>Leave Comments</span>
                    </div>
                </div>
                <div style="width: 100%">
                    <div style="margin-top: 20px;">
                        <!-- <form action='addComments.php?User='$current_user'&Movie='$movie'' method='$_POST' style='width: 100%;'> -->
                        <form action="addComments.php" method="POST" style="width: 100%;">
                            <h2 style="margin-bottom: 20px;">
                                Please leave your comments for 
                                <b><?php echo($movie);?></b>: 
                            </h2>
                            <br>
                            <input type="hidden" id="user" name="user" value="<?php echo($name); ?>">
                            <input type="hidden" id="movie_name" name="movie_name" value="<?php echo($movie); ?>">
                            <div style="margin-bottom: 20px;">
                                <textarea id="comments" name="comments" rows="40" cols="50" required placeholder="Comments..." style="border:1px solid black; box-shadow: 0 0 10px #719ECE; width: 80%; margin: auto;"></textarea>
                                <br>
                            </div>
                            <input type="submit" value="Submit" style="font-size: 30px;">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- bottom -->
    <div class="footer" style="visibility: visible;">
        <p class="friendly-links">
            <a href="index.php">Home</a>
            &nbsp; · &nbsp; 
            <a href="#" target="_blank">About MovieFever</a>
            &nbsp; · &nbsp; 
            <a href="mailto:guoxinying@xuefuguo.com" target="_blank">Contact Us</a>
            &nbsp; · &nbsp; 
            <a href="loginFeedback.php">Feedback</a>
        </p><br>
        <p class="friendly-links">
            Follow Us:&nbsp;&nbsp; 
            <a href="#" target="_blank">Facebook</a>
            &nbsp; · &nbsp; 
            <a href="#" target="_blank">Twitter</a>
            &nbsp; · &nbsp; 
            <a href="#" target="_blank">Instagram</a>
        </p><br>
        <p>
            &copy;<span class="my-footer-year">2022</span> MovieFever Pte Ltd. All rights reserved: No part of this website may be reproduced in any form without our written permission.</p><br>
    </div>
</body>

</html>