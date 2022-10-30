<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/clear.css">
    <link rel="stylesheet" href="css/cinemadatas.css">
    <!-- Icomoon Icon Fonts
	<link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/icons.css"> -->

    <title>Theatres</title>
    <link rel="icon" href="images/cinema.png">
    <script type="text/javascript">
        function changeMovie(id)
        {
            var id = Number(id) + 1;
            // console.log(id);

            var card_name = "movie" + String(id);
            var movie_card = document.getElementById(card_name);
            movie_card.style = "display:''";

            var session_name = "session" + String(id);
            var session_card = document.getElementById(session_name);
            session_card.style = "display:''";
            // console.log(session_card);

            var img = document.getElementById(String(id-1));
            img.style = "box-shadow: 3px 3px red, -1em 0 .4em olive";

            var today = document.getElementsByClassName("today")[0];
            var tmr = document.getElementsByClassName("tmr")[0];
            var tmr1 = document.getElementsByClassName("tmr1")[0];
            var tmr2 = document.getElementsByClassName("tmr2")[0];
            
            today.id = "today_" + id;
            tmr.id = "tmr_" + id;
            tmr1.id = "tmr1_" + id;
            tmr2.id = "tmr2_" + id;

            // var movie_name = document.getElementById(card_name).children[0].children[0].innerHTML;

            for (var i = 1; i <=6; i++)
            {
                if (i != id) {
                    // console.log("here");
                    var discard_card_name = "movie" + String(i);
                    var discard_movie_card = document.getElementById(discard_card_name);
                    discard_movie_card.style.display = "none";

                    var discard_session_name = "session" + String(i);
                    // console.log(discard_session_name);
                    var discard_session_card = document.getElementById(discard_session_name);
                    discard_session_card.style.display = "none";
                }
                if (i != id) {
                    var img = document.getElementById(String(i-1));
                    img.style = "";
                }
            }
        }
    </script>
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

        $sql = "select * from movies where Status='Now Showing'";
        $result = $db->query($sql);
        $records=array();
        while($row=$result->fetch_assoc())
        {
            $records[]=$row;
        };
        $num_movies = count($records);

        $selected_movie_index = 0;
        for ($index=0; $index<6; $index++) {
            $movie = $records[$index];
            if ($_GET["Movie"] == $movie["Name"]) {
                $selected_movie_index = $index;
            }
        }
    ?>
    <script language="javascript">
        window.addEventListener('load', function() {
            // today
            var day1 = new Date();
            day1.setTime(day1.getTime());
            var s1 = day1.getFullYear()+"-" + (day1.getMonth()+1) + "-" + day1.getDate();

            var today = document.getElementsByClassName("today")[0];
            // console.log(today);
            today.innerHTML = "Today  " + s1;

            // tomorrow
            var day2 = new Date();
            day2.setTime(day2.getTime()+24*60*60*1000);
            var s2 = day2.getFullYear()+"-" + (day2.getMonth()+1) + "-" + day2.getDate();

            var tomorrow = document.getElementsByClassName("tmr")[0];
            tomorrow.innerHTML = "Tomorrow  " + s2;
         
            // tomorrow + 1
            var day3 = new Date();
            day3.setTime(day3.getTime()+2*24*60*60*1000);
            var s3 = day3.getFullYear()+"-" + (day3.getMonth()+1) + "-" + day3.getDate();

            var tomorrow1 = document.getElementsByClassName("tmr1")[0];
            tomorrow1.innerHTML = s3;

            // tomorrow + 2
            var day4 = new Date();
            day4.setTime(day4.getTime()+3*24*60*60*1000);
            var s4 = day4.getFullYear()+"-" + (day4.getMonth()+1) + "-" + day4.getDate();

            var tomorrow2 = document.getElementsByClassName("tmr2")[0];
            tomorrow2.innerHTML = s4;

            var selected_movie = `<?php echo $_GET["Movie"]?>`;
        
            if (selected_movie != "") {
                var selected_movie_index = `<?php echo $selected_movie_index?>`;
                console.log(selected_movie_index);
                changeMovie(selected_movie_index);
            }
        });
    </script>
    <script type="text/javascript">
        function changeTimetable(id) {
            console.log(id);
            var date_list = ["today", "tmr", "tmr1", "tmr2"];
            id_index = Number(id.split("_")[1]);
            id = id.split("_")[0];

            var timetable_id = id + "_timetable";
            var timetable = document.getElementsByClassName(timetable_id)[id_index-1];        
            var session = timetable.parentElement.parentElement.id;
            timetable_id = timetable_id + "_" + session;

            console.log(timetable_id);
            timetable = document.getElementById(timetable_id);  
            timetable.style.display = 'block';

            for (i=0;i<date_list.length;i++){
                if (date_list[i] != id) {
                    var discard_timetable_id = date_list[i] + "_timetable";
                    var discard_timetable = document.getElementsByClassName(discard_timetable_id)[id_index-1];

                    var session = discard_timetable.parentElement.parentElement.id;
                    
                    discard_timetable_id = discard_timetable_id + "_" + session;
                    discard_timetable = document.getElementById(discard_timetable_id);
                    console.log(discard_timetable_id);
                    discard_timetable.style.display = 'none';
                }
            }            
        }
    </script>

</head>

<body>
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

        $name = $_GET['Name'];
        $selected_movie_name = "";
        // print_r($name);

        $sql = "select * from currentUser";
        $result = $db->query($sql);
        $records=$result->fetch_assoc();

        $current_user = $records["Name"];

        if ($_GET["current"]) {
            $current_user = $_GET["current"];
        }
        if ($_GET["Movie"]) {
            $selected_movie_name = $_GET["Movie"];
        }
    ?>
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
                    <li><a href="cinemaList.php?Category='all_select'&Region='all_select'&Special='all_select'" class="nav-model active">Theatre</a></li>
                    <!-- <li><a href="#" class="nav-model">Forum</a></li> -->
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

    <!-- main -->
    <div class="movie-top">
        <div class="movie-banner">
            <div class="movie-img">
                <img id="cinemaimg" src="https://p1.meituan.net/deal/201208/22/1_0822151022.jpg@292w_292h_1e_1c" alt="" id="movie-img">
            </div>
            <div class="movie-data">
                <div class="movie-name">
                    <?php
                        $sql = "select * from theatres where Name = '$name'";
                        $result = $db->query($sql);
                        $records = $result->fetch_assoc();
                        $address = $records["Address"];
                        $phone = $records["Phone"];
                        echo "<h2 class='name' id='cinemaname'>$name</h2>";
                        echo "<h2 class='othername' id='adress'>Address: $address</h2>";
                        echo "<p class='kind' id='phonenum'>Phone: $phone</p>";
                    ?>
                    <h2 class="name" id="cinemaname"></h2>
                    <h2 class="othername" id="adress"></h2>
                    <p class="kind" id="phonenum"></p>
                </div>
                <div class="movie-btn">
                    <p>Service:</p>
                    <?php
                        $sql = "select * from theatres where Name = '$name'";
                        $result = $db->query($sql);
                        $records = $result->fetch_assoc();
                        $service = $records["Service"];
                        echo "<p><span>Ticket</span><span> $service</span><p>";
                        echo "<p><span>3D</span><span> 3D Glasses Are Provided</span><p>";
                        echo "<p><span>Park</span><span> Free Car Park</span><p>";
                    ?>
                </div>
                
            </div>
        </div>
    </div>
    <div class="mian">
        <div class="contents">
            <div class="list_movie">
                <ul>
                    <?php
                        $sql = "select * from movies where Status='Now Showing'";
                        $result = $db->query($sql);
                        $records=array();
                        while($row=$result->fetch_assoc())
                        {
                            $records[]=$row;
                        };
                        $num_movies = count($records);

                        for ($index=0; $index<6; $index++)
                        {
                            $img_url = $records[$index]["URL"];
                            $movie_name = $records[$index]["Name"];
                            if ($index == 0) {
                                echo "<li class='activeimg' id='$index' onclick=changeMovie(id) style='box-shadow: 3px 3px red, -1em 0 .4em olive'><img id='movieimg' src='$img_url' alt='' style='width:100%; height:145px'></li>";
                            }
                            else {
                                echo "<li class='activeimg' id='$index' onclick=changeMovie(id)><img id='movieimg' src='$img_url' alt='' style='width:100%; height:145px'></li>";
                            }
                        }
                    ?>
                </ul>
            </div>

            <div class="nowmovie" id="movie1" style="display:''">
                <?php
                    $sql = "select * from movies where Status='Now Showing'";
                    $result = $db->query($sql);
                    $records=array();
                    while($row=$result->fetch_assoc())
                    {
                        $records[]=$row;
                    };
                    $num_movies = count($records);

                    $movie_1 = $records[0];
                    $movie_1_name = $movie_1["Name"];
                    $movie_1_likes = $movie_1["Likes"];
                    $movie_1_duration = $movie_1["Duration"];
                    $movie_1_genre = $movie_1["Type"];
                    $movie_1_character = $movie_1["Characters"];

                    echo "<div class='pf'>";
                    echo "<h3 id='moviename'>$movie_1_name</h3>";
                    echo "<p><span id='movienum'>$movie_1_likes</span><span> Likes</span></p>";
                    echo "</div>";

                    echo "<div class='xq'>";
                    echo "<div><span>Duration:</span><span> $movie_1_duration</span></div>";
                    echo "<div><span>Genre:</span><span> $movie_1_genre</span></div>";
                    echo "<div><span>Characters:</span><span> $movie_1_character</span></div>";
                    echo "</div>";

                ?>
            </div>

            <div class="nowmovie" id="movie2" style="display:none">
                <?php
                    $sql = "select * from movies where Status='Now Showing'";
                    $result = $db->query($sql);
                    $records=array();
                    while($row=$result->fetch_assoc())
                    {
                        $records[]=$row;
                    };
                    $num_movies = count($records);

                    $movie_2 = $records[1];
                    $movie_2_name = $movie_2["Name"];
                    $movie_2_likes = $movie_2["Likes"];
                    $movie_2_duration = $movie_2["Duration"];
                    $movie_2_genre = $movie_2["Type"];
                    $movie_2_character = $movie_2["Characters"];

                    echo "<div class='pf'>";
                    echo "<h3 id='moviename'>$movie_2_name</h3>";
                    echo "<p><span id='movienum'>$movie_2_likes</span><span> Likes</span></p>";
                    echo "</div>";

                    echo "<div class='xq'>";
                    echo "<div><span>Duration:</span><span> 11111</span></div>";
                    echo "<div><span>Genre:</span><span> $movie_2_genre</span></div>";
                    echo "<div><span>Characters:</span><span> $movie_2_character</span></div>";
                    echo "</div>";

                ?>
            </div>

            <div class="nowmovie" id="movie3" style="display:none">
                <?php
                    $sql = "select * from movies where Status='Now Showing'";
                    $result = $db->query($sql);
                    $records=array();
                    while($row=$result->fetch_assoc())
                    {
                        $records[]=$row;
                    };
                    $num_movies = count($records);

                    $movie_3 = $records[2];
                    $movie_3_name = $movie_3["Name"];
                    $movie_3_likes = $movie_3["Likes"];
                    $movie_3_duration = $movie_3["Duration"];
                    $movie_3_genre = $movie_3["Type"];
                    $movie_3_character = $movie_3["Characters"];

                    echo "<div class='pf'>";
                    echo "<h3 id='moviename'>$movie_3_name</h3>";
                    echo "<p><span id='movienum'>$movie_3_likes</span><span> Likes</span></p>";
                    echo "</div>";

                    echo "<div class='xq'>";
                    echo "<div><span>Duration:</span><span> 11111</span></div>";
                    echo "<div><span>Genre:</span><span> $movie_3_genre</span></div>";
                    echo "<div><span>Characters:</span><span> $movie_3_character</span></div>";
                    echo "</div>";
                ?>
            </div>

            <div class="nowmovie" id="movie4" style="display:none">
                <?php
                    $sql = "select * from movies where Status='Now Showing'";
                    $result = $db->query($sql);
                    $records=array();
                    while($row=$result->fetch_assoc())
                    {
                        $records[]=$row;
                    };
                    $num_movies = count($records);

                    $movie_4 = $records[3];
                    $movie_4_name = $movie_4["Name"];
                    $movie_4_likes = $movie_4["Likes"];
                    $movie_4_duration = $movie_4["Duration"];
                    $movie_4_genre = $movie_4["Type"];
                    $movie_4_character = $movie_4["Characters"];

                    echo "<div class='pf'>";
                    echo "<h3 id='moviename'>$movie_4_name</h3>";
                    echo "<p><span id='movienum'>$movie_4_likes</span><span> Likes</span></p>";
                    echo "</div>";

                    echo "<div class='xq'>";
                    echo "<div><span>Duration:</span><span> 11111</span></div>";
                    echo "<div><span>Genre:</span><span> $movie_4_genre</span></div>";
                    echo "<div><span>Characters:</span><span> $movie_4_character</span></div>";
                    echo "</div>";
                ?>
            </div>

            <div class="nowmovie" id="movie5" style="display:none">
                <?php
                    $sql = "select * from movies where Status='Now Showing'";
                    $result = $db->query($sql);
                    $records=array();
                    while($row=$result->fetch_assoc())
                    {
                        $records[]=$row;
                    };
                    $num_movies = count($records);

                    $movie_5 = $records[4];
                    $movie_5_name = $movie_5["Name"];
                    $movie_5_likes = $movie_5["Likes"];
                    $movie_5_duration = $movie_5["Duration"];
                    $movie_5_genre = $movie_5["Type"];
                    $movie_5_character = $movie_5["Characters"];

                    echo "<div class='pf'>";
                    echo "<h3 id='moviename'>$movie_5_name</h3>";
                    echo "<p><span id='movienum'>$movie_5_likes</span><span> Likes</span></p>";
                    echo "</div>";

                    echo "<div class='xq'>";
                    echo "<div><span>Duration:</span><span> 11111</span></div>";
                    echo "<div><span>Genre:</span><span> $movie_5_genre</span></div>";
                    echo "<div><span>Characters:</span><span> $movie_5_character</span></div>";
                    echo "</div>";
                ?>
            </div>

            <div class="nowmovie" id="movie6" style="display:none">
                <?php
                    $sql = "select * from movies where Status='Now Showing'";
                    $result = $db->query($sql);
                    $records=array();
                    while($row=$result->fetch_assoc())
                    {
                        $records[]=$row;
                    };
                    $num_movies = count($records);

                    $movie_6 = $records[5];
                    $movie_6_name = $movie_6["Name"];
                    $movie_6_likes = $movie_6["Likes"];
                    $movie_6_duration = $movie_6["Duration"];
                    $movie_6_genre = $movie_6["Type"];
                    $movie_6_character = $movie_6["Characters"];

                    echo "<div class='pf'>";
                    echo "<h3 id='moviename'>$movie_6_name</h3>";
                    echo "<p><span id='movienum'>$movie_6_likes</span><span> Likes</span></p>";
                    echo "</div>";

                    echo "<div class='xq'>";
                    echo "<div><span>Duration:</span><span> 11111</span></div>";
                    echo "<div><span>Genre:</span><span> $movie_6_genre</span></div>";
                    echo "<div><span>Characters:</span><span> $movie_6_character</span></div>";
                    echo "</div>";
                ?>
            </div>


            <div class="date_list">
                <ul>
                    <li>Time Slots:</li>
                    <li class="today" id="today_1" onclick=changeTimetable(id)>Today</li>
                    <li class="tmr" id="tmr_1" onclick=changeTimetable(id)>Tomorrow</li>
                    <li class="tmr1" id="tmr1_1" onclick=changeTimetable(id)>tmr1</li>
                    <li class="tmr2" id="tmr2_1" onclick=changeTimetable(id)>tmr2</li>
                </ul>
            </div>

            <div class="session" id="session1" style="display:''">
                <ul>
                    <li>
                        <span>Time</span>
                        <span>Region</span>
                        <span>Hall</span>
                        <span style="color: rgb(58, 58, 58);">Price ($)</span>
                        <span>Buy</span>
                    </li>
                    <?php
                        $sql = "select * from movies where Status='Now Showing'";
                        $result = $db->query($sql);
                        $records=array();
                        while($row=$result->fetch_assoc())
                        {
                            $records[]=$row;
                        };
                        $num_movies = count($records);
    
                        $movie_1 = $records[0];
                        $movie_1_name = $movie_1["Name"];
                        $movie_1_likes = $movie_1["Likes"];
                        $movie_1_duration = $movie_1["Duration"];
                        $movie_1_genre = $movie_1["Type"];
                        $movie_1_character = $movie_1["Characters"];
                        $movie_1_price = $movie_1["Price"];
                        $movie_1_region = $movie_1["Region"];

                        $query_today = "select * from movietimetable where Date='Today'";
                        $result_today = $db->query($query_today);
                        $records_today=array();
                        while($row=$result_today->fetch_assoc())
                        {
                            $records_today[]=$row;
                        };
                        $num_records_today = count($records_today);
                        
                        echo "<div class='today_timetable' id='today_timetable_session1' style='display:''>";
                        for ($index=0; $index<$num_records_today; $index++) {
                            $time = $records_today[$index]["Time"];
                            $hall = $records_today[$index]["Hall"];
                            
                            echo "<li>";
                            echo "<span>$time</span>";
                            echo "<span>$movie_1_region</span>";
                            echo "<span>$hall</span>";
                            echo "<span>$movie_1_price</span>";
                            echo "<span class='btn'><a href='selectionSeat.php?Name=$movie_1_name&Theatre=$name&Hall=$hall&Time=$time&Price=$movie_1_price&User=$current_user' style='color:white'>Buy</a></span>";
                            echo "</li>";
                        
                        }
                        echo "</div>";

                        $query_tomorrow = "select * from movietimetable where Date='Tomorrow'";
                        $result_tomorrow = $db->query($query_tomorrow);
                        $records_tomorrow=array();
                        while($row=$result_tomorrow->fetch_assoc())
                        {
                            $records_tomorrow[]=$row;
                        };
                        $num_records_tomorrow = count($records_tomorrow);
                        
                        echo "<div class='tmr_timetable' id='tmr_timetable_session1' style='display:none'>";
                        for ($index=0; $index<$num_records_tomorrow; $index++) {
                            $time = $records_tomorrow[$index]["Time"];
                            $hall = $records_tomorrow[$index]["Hall"];
                            
                            echo "<li>";
                            echo "<span>$time</span>";
                            echo "<span>$movie_1_region</span>";
                            echo "<span>$hall</span>";
                            echo "<span>$movie_1_price</span>";
                            echo "<span class='btn'><a href='selectionSeat.php?Name=$movie_1_name&Theatre=$name&Hall=$hall&Time=$time&Price=$movie_1_price&User=$current_user' style='color:white'>Buy</a></span>";
                            echo "</li>";
                        }
                        echo "</div>";

                        $query_tomorrow1 = "select * from movietimetable where Date='Tomorrow1'";
                        $result_tomorrow1 = $db->query($query_tomorrow1);
                        $records_tomorrow1=array();
                        while($row=$result_tomorrow1->fetch_assoc())
                        {
                            $records_tomorrow1[]=$row;
                        };
                        $num_records_tomorrow1 = count($records_tomorrow1);
                        
                        echo "<div class='tmr1_timetable' id='tmr1_timetable_session1' style='display:none'>";
                        for ($index=0; $index<$num_records_tomorrow1; $index++) {
                            $time = $records_tomorrow1[$index]["Time"];
                            $hall = $records_tomorrow1[$index]["Hall"];
                            
                            echo "<li>";
                            echo "<span>$time</span>";
                            echo "<span>$movie_1_region</span>";
                            echo "<span>$hall</span>";
                            echo "<span>$movie_1_price</span>";
                            echo "<span class='btn'><a href='selectionSeat.php?Name=$movie_1_name&Theatre=$name&Hall=$hall&Time=$time&Price=$movie_1_price&User=$current_user' style='color:white'>Buy</a></span>";
                            echo "</li>";
                        }
                        echo "</div>";

                        $query_tomorrow2 = "select * from movietimetable where Date='Tomorrow2'";
                        $result_tomorrow2 = $db->query($query_tomorrow2);
                        $records_tomorrow2=array();
                        while($row=$result_tomorrow2->fetch_assoc())
                        {
                            $records_tomorrow2[]=$row;
                        };
                        $num_records_tomorrow2 = count($records_tomorrow2);
                        
                        echo "<div class='tmr2_timetable' id='tmr2_timetable_session1' style='display:none'>";
                        for ($index=0; $index<$num_records_tomorrow2; $index++) {
                            $time = $records_tomorrow2[$index]["Time"];
                            $hall = $records_tomorrow2[$index]["Hall"];
                            
                            echo "<li>";
                            echo "<span>$time</span>";
                            echo "<span>$movie_1_region</span>";
                            echo "<span>$hall</span>";
                            echo "<span>$movie_1_price</span>";
                            echo "<span class='btn'><a href='selectionSeat.php?Name=$movie_1_name&Theatre=$name&Hall=$hall&Time=$time&Price=$movie_1_price&User=$current_user' style='color:white'>Buy</a></span>";
                            echo "</li>";
                        }
                        echo "</div>";
                    ?>             
                </ul>
            </div>

            <div class="session" id="session2" style="display:none">
                <ul>
                    <li>
                        <span>Time</span>
                        <span>Region</span>
                        <span>Hall</span>
                        <span style="color: rgb(58, 58, 58);">Price ($)</span>
                        <span>Buy</span>
                    </li>
                    <?php
                        $sql = "select * from movies where Status='Now Showing'";
                        $result = $db->query($sql);
                        $records=array();
                        while($row=$result->fetch_assoc())
                        {
                            $records[]=$row;
                        };
                        $num_movies = count($records);
    
                        $movie_1 = $records[1];
                        $movie_1_name = $movie_1["Name"];
                        $movie_1_likes = $movie_1["Likes"];
                        $movie_1_duration = $movie_1["Duration"];
                        $movie_1_genre = $movie_1["Type"];
                        $movie_1_character = $movie_1["Characters"];
                        $movie_1_price = $movie_1["Price"];
                        $movie_1_region = $movie_1["Region"];

                        $query_today = "select * from movietimetable where Date='Today'";
                        $result_today = $db->query($query_today);
                        $records_today=array();
                        while($row=$result_today->fetch_assoc())
                        {
                            $records_today[]=$row;
                        };
                        $num_records_today = count($records_today);
                        
                        echo "<div class='today_timetable' id='today_timetable_session2' style='display:''>";
                        for ($index=0; $index<$num_records_today; $index++) {
                            $time = $records_today[$index]["Time"];
                            $hall = $records_today[$index]["Hall"];
                            
                            echo "<li>";
                            echo "<span>$time</span>";
                            echo "<span>$movie_1_region</span>";
                            echo "<span>$hall</span>";
                            echo "<span>$movie_1_price</span>";
                            echo "<span class='btn'><a href='selectionSeat.php?Name=$movie_1_name&Theatre=$name&Hall=$hall&Time=$time&Price=$movie_1_price&User=$current_user' style='color:white'>Buy</a></span>";
                            echo "</li>";
                        
                        }
                        echo "</div>";

                        $query_tomorrow = "select * from movietimetable where Date='Tomorrow'";
                        $result_tomorrow = $db->query($query_tomorrow);
                        $records_tomorrow=array();
                        while($row=$result_tomorrow->fetch_assoc())
                        {
                            $records_tomorrow[]=$row;
                        };
                        $num_records_tomorrow = count($records_tomorrow);
                        
                        echo "<div class='tmr_timetable' id='tmr_timetable_session2' style='display:none'>";
                        for ($index=0; $index<$num_records_tomorrow; $index++) {
                            $time = $records_tomorrow[$index]["Time"];
                            $hall = $records_tomorrow[$index]["Hall"];
                            
                            echo "<li>";
                            echo "<span>$time</span>";
                            echo "<span>$movie_1_region</span>";
                            echo "<span>$hall</span>";
                            echo "<span>$movie_1_price</span>";
                            echo "<span class='btn'><a href='selectionSeat.php?Name=$movie_1_name&Theatre=$name&Hall=$hall&Time=$time&Price=$movie_1_price&User=$current_user' style='color:white'>Buy</a></span>";
                            echo "</li>";
                        }
                        echo "</div>";

                        $query_tomorrow1 = "select * from movietimetable where Date='Tomorrow1'";
                        $result_tomorrow1 = $db->query($query_tomorrow1);
                        $records_tomorrow1=array();
                        while($row=$result_tomorrow1->fetch_assoc())
                        {
                            $records_tomorrow1[]=$row;
                        };
                        $num_records_tomorrow1 = count($records_tomorrow1);
                        
                        echo "<div class='tmr1_timetable' id='tmr1_timetable_session2' style='display:none'>";
                        for ($index=0; $index<$num_records_tomorrow1; $index++) {
                            $time = $records_tomorrow1[$index]["Time"];
                            $hall = $records_tomorrow1[$index]["Hall"];
                            
                            echo "<li>";
                            echo "<span>$time</span>";
                            echo "<span>$movie_1_region</span>";
                            echo "<span>$hall</span>";
                            echo "<span>$movie_1_price</span>";
                            echo "<span class='btn'><a href='selectionSeat.php?Name=$movie_1_name&Theatre=$name&Hall=$hall&Time=$time&Price=$movie_1_price&User=$current_user' style='color:white'>Buy</a></span>";
                            echo "</li>";
                        }
                        echo "</div>";

                        $query_tomorrow2 = "select * from movietimetable where Date='Tomorrow2'";
                        $result_tomorrow2 = $db->query($query_tomorrow2);
                        $records_tomorrow2=array();
                        while($row=$result_tomorrow2->fetch_assoc())
                        {
                            $records_tomorrow2[]=$row;
                        };
                        $num_records_tomorrow2 = count($records_tomorrow2);
                        
                        echo "<div class='tmr2_timetable' id='tmr2_timetable_session2' style='display:none'>";
                        for ($index=0; $index<$num_records_tomorrow2; $index++) {
                            $time = $records_tomorrow2[$index]["Time"];
                            $hall = $records_tomorrow2[$index]["Hall"];
                            
                            echo "<li>";
                            echo "<span>$time</span>";
                            echo "<span>$movie_1_region</span>";
                            echo "<span>$hall</span>";
                            echo "<span>$movie_1_price</span>";
                            echo "<span class='btn'><a href='selectionSeat.php?Name=$movie_1_name&Theatre=$name&Hall=$hall&Time=$time&Price=$movie_1_price&User=$current_user' style='color:white'>Buy</a></span>";
                            echo "</li>";
                        }
                        echo "</div>";
                    ?>             
                </ul>
            </div>

            <div class="session" id="session3" style="display:none">
                <ul>
                    <li>
                        <span>Time</span>
                        <span>Region</span>
                        <span>Hall</span>
                        <span style="color: rgb(58, 58, 58);">Price ($)</span>
                        <span>Buy</span>
                    </li>
                    <?php
                        $sql = "select * from movies where Status='Now Showing'";
                        $result = $db->query($sql);
                        $records=array();
                        while($row=$result->fetch_assoc())
                        {
                            $records[]=$row;
                        };
                        $num_movies = count($records);
    
                        $movie_1 = $records[2];
                        $movie_1_name = $movie_1["Name"];
                        $movie_1_likes = $movie_1["Likes"];
                        $movie_1_duration = $movie_1["Duration"];
                        $movie_1_genre = $movie_1["Type"];
                        $movie_1_character = $movie_1["Characters"];
                        $movie_1_price = $movie_1["Price"];
                        $movie_1_region = $movie_1["Region"];

                        $query_today = "select * from movietimetable where Date='Today'";
                        $result_today = $db->query($query_today);
                        $records_today=array();
                        while($row=$result_today->fetch_assoc())
                        {
                            $records_today[]=$row;
                        };
                        $num_records_today = count($records_today);
                        
                        echo "<div class='today_timetable' id='today_timetable_session3' style='display:''>";
                        for ($index=0; $index<$num_records_today; $index++) {
                            $time = $records_today[$index]["Time"];
                            $hall = $records_today[$index]["Hall"];
                            
                            echo "<li>";
                            echo "<span>$time</span>";
                            echo "<span>$movie_1_region</span>";
                            echo "<span>$hall</span>";
                            echo "<span>$movie_1_price</span>";
                            echo "<span class='btn'><a href='selectionSeat.php?Name=$movie_1_name&Theatre=$name&Hall=$hall&Time=$time&Price=$movie_1_price&User=$current_user' style='color:white'>Buy</a></span>";
                            echo "</li>";
                        
                        }
                        echo "</div>";

                        $query_tomorrow = "select * from movietimetable where Date='Tomorrow'";
                        $result_tomorrow = $db->query($query_tomorrow);
                        $records_tomorrow=array();
                        while($row=$result_tomorrow->fetch_assoc())
                        {
                            $records_tomorrow[]=$row;
                        };
                        $num_records_tomorrow = count($records_tomorrow);
                        
                        echo "<div class='tmr_timetable' id='tmr_timetable_session3' style='display:none'>";
                        for ($index=0; $index<$num_records_tomorrow; $index++) {
                            $time = $records_tomorrow[$index]["Time"];
                            $hall = $records_tomorrow[$index]["Hall"];
                            
                            echo "<li>";
                            echo "<span>$time</span>";
                            echo "<span>$movie_1_region</span>";
                            echo "<span>$hall</span>";
                            echo "<span>$movie_1_price</span>";
                            echo "<span class='btn'><a href='selectionSeat.php?Name=$movie_1_name&Theatre=$name&Hall=$hall&Time=$time&Price=$movie_1_price&User=$current_user' style='color:white'>Buy</a></span>";
                            echo "</li>";
                        }
                        echo "</div>";

                        $query_tomorrow1 = "select * from movietimetable where Date='Tomorrow1'";
                        $result_tomorrow1 = $db->query($query_tomorrow1);
                        $records_tomorrow1=array();
                        while($row=$result_tomorrow1->fetch_assoc())
                        {
                            $records_tomorrow1[]=$row;
                        };
                        $num_records_tomorrow1 = count($records_tomorrow1);
                        
                        echo "<div class='tmr1_timetable' id='tmr1_timetable_session3' style='display:none'>";
                        for ($index=0; $index<$num_records_tomorrow1; $index++) {
                            $time = $records_tomorrow1[$index]["Time"];
                            $hall = $records_tomorrow1[$index]["Hall"];
                            
                            echo "<li>";
                            echo "<span>$time</span>";
                            echo "<span>$movie_1_region</span>";
                            echo "<span>$hall</span>";
                            echo "<span>$movie_1_price</span>";
                            echo "<span class='btn'><a href='selectionSeat.php?Name=$movie_1_name&Theatre=$name&Hall=$hall&Time=$time&Price=$movie_1_price&User=$current_user' style='color:white'>Buy</a></span>";
                            echo "</li>";
                        }
                        echo "</div>";

                        $query_tomorrow2 = "select * from movietimetable where Date='Tomorrow2'";
                        $result_tomorrow2 = $db->query($query_tomorrow2);
                        $records_tomorrow2=array();
                        while($row=$result_tomorrow2->fetch_assoc())
                        {
                            $records_tomorrow2[]=$row;
                        };
                        $num_records_tomorrow2 = count($records_tomorrow2);
                        
                        echo "<div class='tmr2_timetable' id='tmr2_timetable_session3' style='display:none'>";
                        for ($index=0; $index<$num_records_tomorrow2; $index++) {
                            $time = $records_tomorrow2[$index]["Time"];
                            $hall = $records_tomorrow2[$index]["Hall"];
                            
                            echo "<li>";
                            echo "<span>$time</span>";
                            echo "<span>$movie_1_region</span>";
                            echo "<span>$hall</span>";
                            echo "<span>$movie_1_price</span>";
                            echo "<span class='btn'><a href='selectionSeat.php?Name=$movie_1_name&Theatre=$name&Hall=$hall&Time=$time&Price=$movie_1_price&User=$current_user' style='color:white'>Buy</a></span>";
                            echo "</li>";
                        }
                        echo "</div>";
                    ?>             
                </ul>
            </div>

            <div class="session" id="session4" style="display:none">
                <ul>
                    <li>
                        <span>Time</span>
                        <span>Region</span>
                        <span>Hall</span>
                        <span style="color: rgb(58, 58, 58);">Price ($)</span>
                        <span>Buy</span>
                    </li>
                    <?php
                        $sql = "select * from movies where Status='Now Showing'";
                        $result = $db->query($sql);
                        $records=array();
                        while($row=$result->fetch_assoc())
                        {
                            $records[]=$row;
                        };
                        $num_movies = count($records);
    
                        $movie_1 = $records[3];
                        $movie_1_name = $movie_1["Name"];
                        $movie_1_likes = $movie_1["Likes"];
                        $movie_1_duration = $movie_1["Duration"];
                        $movie_1_genre = $movie_1["Type"];
                        $movie_1_character = $movie_1["Characters"];
                        $movie_1_price = $movie_1["Price"];
                        $movie_1_region = $movie_1["Region"];

                        $query_today = "select * from movietimetable where Date='Today'";
                        $result_today = $db->query($query_today);
                        $records_today=array();
                        while($row=$result_today->fetch_assoc())
                        {
                            $records_today[]=$row;
                        };
                        $num_records_today = count($records_today);
                        
                        echo "<div class='today_timetable' id='today_timetable_session4' style='display:''>";
                        for ($index=0; $index<$num_records_today; $index++) {
                            $time = $records_today[$index]["Time"];
                            $hall = $records_today[$index]["Hall"];
                            
                            echo "<li>";
                            echo "<span>$time</span>";
                            echo "<span>$movie_1_region</span>";
                            echo "<span>$hall</span>";
                            echo "<span>$movie_1_price</span>";
                            echo "<span class='btn'><a href='selectionSeat.php?Name=$movie_1_name&Theatre=$name&Hall=$hall&Time=$time&Price=$movie_1_price&User=$current_user' style='color:white'>Buy</a></span>";
                            echo "</li>";
                        
                        }
                        echo "</div>";

                        $query_tomorrow = "select * from movietimetable where Date='Tomorrow'";
                        $result_tomorrow = $db->query($query_tomorrow);
                        $records_tomorrow=array();
                        while($row=$result_tomorrow->fetch_assoc())
                        {
                            $records_tomorrow[]=$row;
                        };
                        $num_records_tomorrow = count($records_tomorrow);
                        
                        echo "<div class='tmr_timetable' id='tmr_timetable_session4' style='display:none'>";
                        for ($index=0; $index<$num_records_tomorrow; $index++) {
                            $time = $records_tomorrow[$index]["Time"];
                            $hall = $records_tomorrow[$index]["Hall"];
                            
                            echo "<li>";
                            echo "<span>$time</span>";
                            echo "<span>$movie_1_region</span>";
                            echo "<span>$hall</span>";
                            echo "<span>$movie_1_price</span>";
                            echo "<span class='btn'><a href='selectionSeat.php?Name=$movie_1_name&Theatre=$name&Hall=$hall&Time=$time&Price=$movie_1_price&User=$current_user' style='color:white'>Buy</a></span>";
                            echo "</li>";
                        }
                        echo "</div>";

                        $query_tomorrow1 = "select * from movietimetable where Date='Tomorrow1'";
                        $result_tomorrow1 = $db->query($query_tomorrow1);
                        $records_tomorrow1=array();
                        while($row=$result_tomorrow1->fetch_assoc())
                        {
                            $records_tomorrow1[]=$row;
                        };
                        $num_records_tomorrow1 = count($records_tomorrow1);
                        
                        echo "<div class='tmr1_timetable' id='tmr1_timetable_session4' style='display:none'>";
                        for ($index=0; $index<$num_records_tomorrow1; $index++) {
                            $time = $records_tomorrow1[$index]["Time"];
                            $hall = $records_tomorrow1[$index]["Hall"];
                            
                            echo "<li>";
                            echo "<span>$time</span>";
                            echo "<span>$movie_1_region</span>";
                            echo "<span>$hall</span>";
                            echo "<span>$movie_1_price</span>";
                            echo "<span class='btn'><a href='selectionSeat.php?Name=$movie_1_name&Theatre=$name&Hall=$hall&Time=$time&Price=$movie_1_price&User=$current_user' style='color:white'>Buy</a></span>";
                            echo "</li>";
                        }
                        echo "</div>";

                        $query_tomorrow2 = "select * from movietimetable where Date='Tomorrow2'";
                        $result_tomorrow2 = $db->query($query_tomorrow2);
                        $records_tomorrow2=array();
                        while($row=$result_tomorrow2->fetch_assoc())
                        {
                            $records_tomorrow2[]=$row;
                        };
                        $num_records_tomorrow2 = count($records_tomorrow2);
                        
                        echo "<div class='tmr2_timetable' id='tmr2_timetable_session4' style='display:none'>";
                        for ($index=0; $index<$num_records_tomorrow2; $index++) {
                            $time = $records_tomorrow2[$index]["Time"];
                            $hall = $records_tomorrow2[$index]["Hall"];
                            
                            echo "<li>";
                            echo "<span>$time</span>";
                            echo "<span>$movie_1_region</span>";
                            echo "<span>$hall</span>";
                            echo "<span>$movie_1_price</span>";
                            echo "<span class='btn'><a href='selectionSeat.php?Name=$movie_1_name&Theatre=$name&Hall=$hall&Time=$time&Price=$movie_1_price&User=$current_user' style='color:white'>Buy</a></span>";
                            echo "</li>";
                        }
                        echo "</div>";
                    ?>             
                </ul>
            </div>

            <div class="session" id="session5" style="display:none">
                <ul>
                    <li>
                        <span>Time</span>
                        <span>Region</span>
                        <span>Hall</span>
                        <span style="color: rgb(58, 58, 58);">Price ($)</span>
                        <span>Buy</span>
                    </li>
                    <?php
                        $sql = "select * from movies where Status='Now Showing'";
                        $result = $db->query($sql);
                        $records=array();
                        while($row=$result->fetch_assoc())
                        {
                            $records[]=$row;
                        };
                        $num_movies = count($records);
    
                        $movie_1 = $records[4];
                        $movie_1_name = $movie_1["Name"];
                        $movie_1_likes = $movie_1["Likes"];
                        $movie_1_duration = $movie_1["Duration"];
                        $movie_1_genre = $movie_1["Type"];
                        $movie_1_character = $movie_1["Characters"];
                        $movie_1_price = $movie_1["Price"];
                        $movie_1_region = $movie_1["Region"];

                        $query_today = "select * from movietimetable where Date='Today'";
                        $result_today = $db->query($query_today);
                        $records_today=array();
                        while($row=$result_today->fetch_assoc())
                        {
                            $records_today[]=$row;
                        };
                        $num_records_today = count($records_today);
                        
                        echo "<div class='today_timetable' id='today_timetable_session5' style='display:''>";
                        for ($index=0; $index<$num_records_today; $index++) {
                            $time = $records_today[$index]["Time"];
                            $hall = $records_today[$index]["Hall"];
                            
                            echo "<li>";
                            echo "<span>$time</span>";
                            echo "<span>$movie_1_region</span>";
                            echo "<span>$hall</span>";
                            echo "<span>$movie_1_price</span>";
                            echo "<span class='btn'><a href='selectionSeat.php?Name=$movie_1_name&Theatre=$name&Hall=$hall&Time=$time&Price=$movie_1_price&User=$current_user' style='color:white'>Buy</a></span>";
                            echo "</li>";
                        
                        }
                        echo "</div>";

                        $query_tomorrow = "select * from movietimetable where Date='Tomorrow'";
                        $result_tomorrow = $db->query($query_tomorrow);
                        $records_tomorrow=array();
                        while($row=$result_tomorrow->fetch_assoc())
                        {
                            $records_tomorrow[]=$row;
                        };
                        $num_records_tomorrow = count($records_tomorrow);
                        
                        echo "<div class='tmr_timetable' id='tmr_timetable_session5' style='display:none'>";
                        for ($index=0; $index<$num_records_tomorrow; $index++) {
                            $time = $records_tomorrow[$index]["Time"];
                            $hall = $records_tomorrow[$index]["Hall"];
                            
                            echo "<li>";
                            echo "<span>$time</span>";
                            echo "<span>$movie_1_region</span>";
                            echo "<span>$hall</span>";
                            echo "<span>$movie_1_price</span>";
                            echo "<span class='btn'><a href='selectionSeat.php?Name=$movie_1_name&Theatre=$name&Hall=$hall&Time=$time&Price=$movie_1_price&User=$current_user' style='color:white'>Buy</a></span>";
                            echo "</li>";
                        }
                        echo "</div>";

                        $query_tomorrow1 = "select * from movietimetable where Date='Tomorrow1'";
                        $result_tomorrow1 = $db->query($query_tomorrow1);
                        $records_tomorrow1=array();
                        while($row=$result_tomorrow1->fetch_assoc())
                        {
                            $records_tomorrow1[]=$row;
                        };
                        $num_records_tomorrow1 = count($records_tomorrow1);
                        
                        echo "<div class='tmr1_timetable' id='tmr1_timetable_session5' style='display:none'>";
                        for ($index=0; $index<$num_records_tomorrow1; $index++) {
                            $time = $records_tomorrow1[$index]["Time"];
                            $hall = $records_tomorrow1[$index]["Hall"];
                            
                            echo "<li>";
                            echo "<span>$time</span>";
                            echo "<span>$movie_1_region</span>";
                            echo "<span>$hall</span>";
                            echo "<span>$movie_1_price</span>";
                            echo "<span class='btn'><a href='selectionSeat.php?Name=$movie_1_name&Theatre=$name&Hall=$hall&Time=$time&Price=$movie_1_price&User=$current_user' style='color:white'>Buy</a></span>";
                            echo "</li>";
                        }
                        echo "</div>";

                        $query_tomorrow2 = "select * from movietimetable where Date='Tomorrow2'";
                        $result_tomorrow2 = $db->query($query_tomorrow2);
                        $records_tomorrow2=array();
                        while($row=$result_tomorrow2->fetch_assoc())
                        {
                            $records_tomorrow2[]=$row;
                        };
                        $num_records_tomorrow2 = count($records_tomorrow2);
                        
                        echo "<div class='tmr2_timetable' id='tmr2_timetable_session5' style='display:none'>";
                        for ($index=0; $index<$num_records_tomorrow2; $index++) {
                            $time = $records_tomorrow2[$index]["Time"];
                            $hall = $records_tomorrow2[$index]["Hall"];
                            
                            echo "<li>";
                            echo "<span>$time</span>";
                            echo "<span>$movie_1_region</span>";
                            echo "<span>$hall</span>";
                            echo "<span>$movie_1_price</span>";
                            echo "<span class='btn'><a href='selectionSeat.php?Name=$movie_1_name&Theatre=$name&Hall=$hall&Time=$time&Price=$movie_1_price&User=$current_user' style='color:white'>Buy</a></span>";
                            echo "</li>";
                        }
                        echo "</div>";
                    ?>             
                </ul>
            </div>

            <div class="session" id="session6" style="display:none">
                <ul>
                    <li>
                        <span>Time</span>
                        <span>Region</span>
                        <span>Hall</span>
                        <span style="color: rgb(58, 58, 58);">Price ($)</span>
                        <span>Buy</span>
                    </li>
                    <?php
                        $sql = "select * from movies where Status='Now Showing'";
                        $result = $db->query($sql);
                        $records=array();
                        while($row=$result->fetch_assoc())
                        {
                            $records[]=$row;
                        };
                        $num_movies = count($records);
    
                        $movie_1 = $records[5];
                        $movie_1_name = $movie_1["Name"];
                        $movie_1_likes = $movie_1["Likes"];
                        $movie_1_duration = $movie_1["Duration"];
                        $movie_1_genre = $movie_1["Type"];
                        $movie_1_character = $movie_1["Characters"];
                        $movie_1_price = $movie_1["Price"];
                        $movie_1_region = $movie_1["Region"];

                        $query_today = "select * from movietimetable where Date='Today'";
                        $result_today = $db->query($query_today);
                        $records_today=array();
                        while($row=$result_today->fetch_assoc())
                        {
                            $records_today[]=$row;
                        };
                        $num_records_today = count($records_today);
                        
                        echo "<div class='today_timetable' id='today_timetable_session6' style='display:''>";
                        for ($index=0; $index<$num_records_today; $index++) {
                            $time = $records_today[$index]["Time"];
                            $hall = $records_today[$index]["Hall"];
                            
                            echo "<li>";
                            echo "<span>$time</span>";
                            echo "<span>$movie_1_region</span>";
                            echo "<span>$hall</span>";
                            echo "<span>$movie_1_price</span>";
                            echo "<span class='btn'><a href='selectionSeat.php?Name=$movie_1_name&Theatre=$name&Hall=$hall&Time=$time&Price=$movie_1_price&User=$current_user' style='color:white'>Buy</a></span>";
                            echo "</li>";
                        
                        }
                        echo "</div>";

                        $query_tomorrow = "select * from movietimetable where Date='Tomorrow'";
                        $result_tomorrow = $db->query($query_tomorrow);
                        $records_tomorrow=array();
                        while($row=$result_tomorrow->fetch_assoc())
                        {
                            $records_tomorrow[]=$row;
                        };
                        $num_records_tomorrow = count($records_tomorrow);
                        
                        echo "<div class='tmr_timetable' id='tmr_timetable_session6' style='display:none'>";
                        for ($index=0; $index<$num_records_tomorrow; $index++) {
                            $time = $records_tomorrow[$index]["Time"];
                            $hall = $records_tomorrow[$index]["Hall"];
                            
                            echo "<li>";
                            echo "<span>$time</span>";
                            echo "<span>$movie_1_region</span>";
                            echo "<span>$hall</span>";
                            echo "<span>$movie_1_price</span>";
                            echo "<span class='btn'><a href='selectionSeat.php?Name=$movie_1_name&Theatre=$name&Hall=$hall&Time=$time&Price=$movie_1_price&User=$current_user' style='color:white'>Buy</a></span>";
                            echo "</li>";
                        }
                        echo "</div>";

                        $query_tomorrow1 = "select * from movietimetable where Date='Tomorrow1'";
                        $result_tomorrow1 = $db->query($query_tomorrow1);
                        $records_tomorrow1=array();
                        while($row=$result_tomorrow1->fetch_assoc())
                        {
                            $records_tomorrow1[]=$row;
                        };
                        $num_records_tomorrow1 = count($records_tomorrow1);
                        
                        echo "<div class='tmr1_timetable' id='tmr1_timetable_session6' style='display:none'>";
                        for ($index=0; $index<$num_records_tomorrow1; $index++) {
                            $time = $records_tomorrow1[$index]["Time"];
                            $hall = $records_tomorrow1[$index]["Hall"];
                            
                            echo "<li>";
                            echo "<span>$time</span>";
                            echo "<span>$movie_1_region</span>";
                            echo "<span>$hall</span>";
                            echo "<span>$movie_1_price</span>";
                            echo "<span class='btn'><a href='selectionSeat.php?Name=$movie_1_name&Theatre=$name&Hall=$hall&Time=$time&Price=$movie_1_price&User=$current_user' style='color:white'>Buy</a></span>";
                            echo "</li>";
                        }
                        echo "</div>";

                        $query_tomorrow2 = "select * from movietimetable where Date='Tomorrow2'";
                        $result_tomorrow2 = $db->query($query_tomorrow2);
                        $records_tomorrow2=array();
                        while($row=$result_tomorrow2->fetch_assoc())
                        {
                            $records_tomorrow2[]=$row;
                        };
                        $num_records_tomorrow2 = count($records_tomorrow2);
                        
                        echo "<div class='tmr2_timetable' id='tmr2_timetable_session6' style='display:none'>";
                        for ($index=0; $index<$num_records_tomorrow2; $index++) {
                            $time = $records_tomorrow2[$index]["Time"];
                            $hall = $records_tomorrow2[$index]["Hall"];
                            
                            echo "<li>";
                            echo "<span>$time</span>";
                            echo "<span>$movie_1_region</span>";
                            echo "<span>$hall</span>";
                            echo "<span>$movie_1_price</span>";
                            echo "<span class='btn'><a href='selectionSeat.php?Name=$movie_1_name&Theatre=$name&Hall=$hall&Time=$time&Price=$movie_1_price&User=$current_user' style='color:white'>Buy</a></span>";
                            echo "</li>";
                        }
                        echo "</div>";
                    ?>             
                </ul>
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
        <!-- <p class="friendly-links social-icons">
            <a href="#" target="_blank">Follow us</a>
            &nbsp; &nbsp;
            <a href="#"><i class="icon-instagram"></i></a>
            &nbsp; &nbsp;
            <a href="#"><i class="icon-facebook"></i></a>
        </p><br> -->
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

<!-- 
    <script src="js/ajax.js"></script>
    <script src="js/mock-min.js"></script>
    <script src="js/server.js"></script>
    <script src="js/cinemadatas.js"></script> -->
</body>

</html>