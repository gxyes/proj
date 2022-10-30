<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/moviedata.css">
    <link rel="stylesheet" href="css/clear.css">
    <title>Details</title>
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

        $name = $_GET["Name"];

        $sql = "select * from currentUser";
        $result = $db->query($sql);
        $records=$result->fetch_assoc();
        $current_user = $records["Name"];

        // if ($_GET["current"]) {
        //     print_r($_GET["current"]);
        // }
    ?>
    <script type="text/javascript">
        function buyMovie() {
            var current_user = `<?php echo $current_user?>`;
            var movie_name = `<?php echo $name?>`;
            // console.log(movie_name);
            window.location.href = "loginBuy.php?User=" + current_user + "&Name=" + movie_name;
        }
    </script>
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
                    <input type="text" class="input" placeholder="Search for movies">
                    <input class="submit" type="submit" value="">
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
                    Forum
                </a>
            </div>
            <!-- Reviews -->
            <div class="comment">
                <div class="intro" id="reviews" style="width: 100%">
                    <div class="intro-text" style="width: 100%">
                        <span>Reviews</span>
                        <span style="float: right;">
                            <a href="#">
                                Leave Comments
                            </a>
                        </span>
                    </div>
                </div>
                <div class="comment-body" style="width: 100%">
                    <ul>
                        <?php
                            for ($index=0; $index<$num_commends; $index++)
                            {
                                $user_name = $records_commends[$index]["User"]; 
                                $content = $records_commends[$index]["Content"]; 
                                $timestamp = $records_commends[$index]["Time"];
                                $likes = $records_commends[$index]["Likes"];
                                $movie_name = $records_commends[$index]["Movie"];

                                // Get avatar
                                $sql_avatar = "select URL from users where Name='$user_name'";
                                $result_avatar = $db->query($sql_avatar);
                                $record_avatar = $result_avatar->fetch_assoc();
                                $avatar = $record_avatar["URL"];

                                // Get movie poster
                                $sql_poster = "select URL from movies where Name='$movie_name'";
                                $result_poster = $db->query($sql_poster);
                                $record_poster = $result_poster->fetch_assoc();
                                $poster = $record_poster["URL"];

                                echo "<li class='comment-model' style='margin-bottom: 10px;'>";

                                // Comment container start
                                echo "<div>";

                                // Movie name and poster
                                echo "<div style='margin-right: 10px; float: left; width: 20%; text-align: center;'>";
                                echo "<img style='width: 100%; display: inline-block;' src='$poster' alt=''><br>";
                                echo "<p class='name' id='moviename' style='display: inline-block;'>$movie_name</p>";
                                echo "</div>";
                                // Comment details
                                echo "<div class='comment-text' style='width: 800px; float: right;'>";
                                echo "<div class='comment-main'>";
                                echo "<span>";
                                echo "<img class='comment-img' src='$avatar' alt='' style='margin-right: 10px;'>";
                                echo "<span class='username'>$user_name</span>";
                                echo "</span>";
                                echo "<div>";
                                echo "<span>";
                                echo "<span class='comment-time'>$timestamp &nbsp&nbsp</span>";
                                echo "<span class='comment-level'></span>";
                                echo "</span>";
                                echo "<a href='#'><i class='zan'></i><span>$likes</span></a>";
                                echo "</div>";
                                echo "</div>";
                                echo "<p>$content</p>";
                                echo "</div>";

                                // Comment container end
                                echo "</div>";

                                echo "</li>";
                            }
                        ?>
                    </ul>
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