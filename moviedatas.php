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

        if ($_GET["current"]) {
            print_r($_GET["current"]);
        }
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
                    <li><a href="movieList.php?Genre='all_select'&Region='all_select'&Year='all_select'" class="nav-model active">Movie</a></li>
                    <li><a href="cinemaList.php?Category='all_select'&Region='all_select'&Special='all_select'" class="nav-model">Theatre</a></li>
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
    <?php
        $sql = "select * from movies where Name='$name'";
        $result = $db->query($sql);
        $records = $result->fetch_assoc();
        $movie_name = $records["Name"]; 
        $movie_img_url = $records["URL"]; 
        $movie_type = $records["Type"];
        $movie_region = $records["Region"];
        $movie_duration = $records["Duration"];
        $movie_likes = $records["Likes"]; 
        $movie_box_office = $records["Box"];
        $movie_trailer_url = $records["Trailer"]; 
        $movie_description = $records["Descriptions"];
        $movie_director = $records["Director"];

        $sql_director = "select * from directors where Name='$movie_director'";
        $result_director = $db->query($sql_director);
        $records_director = $result_director->fetch_assoc();
        $director_img = $records_director['URL'];

        $sql_actors = "select * from actors where Movie='$name'";
        $result_actors = $db->query($sql_actors);
        $records_actors=array();
        while($row=$result_actors->fetch_assoc())
        {
            $records_actors[]=$row;
        };
        $num_actors = count($records_actors);

        $sql_commends = "select * from reviews where Movie='$name'";
        $result_commends = $db->query($sql_commends);
        $records_commends=array();
        while($row=$result_commends->fetch_assoc())
        {
            $records_commends[]=$row;
        };
        $num_commends = count($records_commends);

        $sql_music = "select * from music where Movie='$name'";
        $result_music = $db->query($sql_music);
        $records_music=array();
        while($row=$result_music->fetch_assoc())
        {
            $records_music[]=$row;
        };
        $num_music = count($records_music);
    ?>

    <!-- Descriptions -->
    <div class="movie-top">
        <div class="movie-banner">
            <div class="movie-img">
                <?php
                    echo "<img src='$movie_img_url' alt='' id='movie-img'>"
                ?>
            </div>
            <div class="movie-data">
                <div class="movie-name">
                    <?php
                        echo "<h2 class='name' id='moviename' style='width:300px'>$movie_name</h2>";
                        echo "<h2 class='othername' id='englishname'>$movie_director</h2>";
                        echo "<p class='kind' id='kind'>$movie_type</p>";
                        echo "<p class='area' id='adress'>Region | $movie_region</p>";
                        echo "<p class='time' id='time'>Duration | $movie_duration</p>";
                    ?>
                </div>
                <div class="movie-btn" style="font-size: 12px;">
                    <a href="#"><i></i> <span>Like</span></a>
                    <a onclick=buyMovie()><i></i> <span>Buy</span></a>
                </div>
                <div class="watching">
                    <?php
                        echo "<p class='name'>Likes</p>";
                        echo "<p class='wantnum'>$movie_likes</p>";
                        echo "<p class='money'>Box Office</p>";
                        echo "<p class='num'>$movie_box_office<span>&nbsp millions</span></p>";
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Main -->
    <div class="container">
        <!-- Left -->
        <div class="main">
            <!-- Mav tab -->
            <div class="nav">
                <a href="index.php">
                    Home
                </a> >
                <a href="movies.php">
                    Movie
                </a> >
                <?php
                    echo "<a href='#'>$movie_name</a>"
                ?>
            </div>

            <!-- tab -->
            <div class="tab-contral">
                <a class="tab active" id="referral" style="font-size: 12px" href="#desctiptions">Descriptions</a>
                <a class="tab" id="actor" style="font-size: 12px" href="#casts">Casts</a>
                <a class="tab" id="awards" style="font-size: 12px" href="#image">Music/Album</a>
                <a class="tab" id="imgs" style="font-size: 12px" href="#reviews">Commands</a>
            </div>

            <div class="border"></div>

            <!-- Descriptions -->
            <div class="referral">
                <div class="intro" id="desctiptions">
                    Descriptions
                </div>
                <?php
                    echo "<p>$movie_description<p>"
                ?>
            </div>

            <!-- Casts -->
            <div class="actor">
                <div class="intro" id="casts">
                    <div class="intro-text">
                        <span>Casts</span>
                    </div>
                </div>
                <div class="director">
                    <p>Director</p>
                    <div class="director-img">
                        <?php
                            echo "<img src='$director_img' style='width:130px; height:170px' alt=''>";
                            echo "<p>$movie_director</p>";
                        ?>
                        <p></p>
                    </div>
                </div>
                <div class="starts">
                    <p>Actors</p>
                    <?php
                        for ($index=0; $index<$num_actors; $index++)
                        {
                            $actor_name = $records_actors[$index]["Name"]; 
                            $actor_img_url = $records_actors[$index]["URL"]; 
                            $actor_character = $records_actors[$index]["Characters"]; 
                        
                            echo "<div class='start'>";
                            echo "<img class='default-img' alt='' style='width:130px; height:170px; margin-left: 10px;' src='$actor_img_url'>";
                            echo "<p>$actor_name</p>";
                            echo "<p>$actor_character</p>";
                            echo "</div>";
                        };
                    ?>
                </div>
            </div>
        
            <!-- Music & Album -->
            <div class="images">
                <div class="intro" id="image">
                    <div class="intro-text">
                        <span>Album</span>
                    </div>
                </div>
                <?php
                    echo "<div class='grid-container'>";
                    echo "<div class='images-main'>";
                    echo "<a href='#'><img class='default-img' alt='' src='$movie_img_url'></a>";
                    echo "</div>";

                    // echo "<div class='images-aside'>";
                    echo "<div class='aside-img1'>";
                    echo "<a href='#'><img class='default-img' alt='' src='$movie_img_url'></a>";
                    echo "</div>";
                    
                    echo "<div class='aside-img2'>";
                    echo "<a href='#'><img class='default-img' alt='' src='$movie_img_url'></a>";
                    echo "</div>";

                    echo "<div class='aside-img3'>";
                    echo "<a href='#'><img class='default-img' alt='' src='$movie_img_url'></a>";
                    echo "</div>";
                    echo "</div>";
                ?>

            </div>
            <div class="music">
                <div class="intro">
                    <div class="intro-text">
                        <span>Music Soundtracks</span>
                    </div>
                </div>
                <div class="music-body">
                    <?php
                        for ($index=0; $index<$num_music; $index++)
                        {
                            $singer = $records_music[$index]["Singer"]; 
                            $mp3 = $records_music[$index]["URL"]; 
                            $music_name = $records_music[$index]["Name"];

                            echo "<div class='music-model' style='width:700px'>";
                            echo "<img class='film-music-icon' style='margin:10px' src='https://p0.meituan.net/scarlett/52ed06a649b14df78ebee02e9959c32911524.png@140w_140h_1e_1c' alt=''>";
                            echo "<div class='text'>";
                            echo "<div style='float:left; margin-right:30px'>";
                            echo "<p>$music_name</p>";
                            echo "<p>$singer</p>";
                            echo "</div>";
                            echo "<audio controls style='float:left'>";
                            echo "<source src='$mp3' type='audio/mpeg'>";
                            echo "</audio>";
                            echo "</div>";
                            echo "</div>";
                        }
                    ?>
                </div>
            </div>

            <!-- Reviews -->
            <div class="comment">
                <div class="intro" id="reviews">
                    <div class="intro-text">
                        <span>Reviews</span>
                        <span>
                            <a href="#">
                                Leave Comments
                            </a>
                        </span>
                    </div>
                </div>
                <div class="comment-body">
                    <ul>
                        <?php
                            for ($index=0; $index<$num_commends; $index++)
                            {
                                $user_name = $records_commends[$index]["User"]; 
                                $content = $records_commends[$index]["Content"]; 
                                $timestamp = $records_commends[$index]["Time"];
                                $likes = $records_commends[$index]["Likes"];

                                $sql_avatar = "select URL from users where Name='$user_name'";
                                $result_avatar = $db->query($sql_avatar);
                                $record_avatar = $result_avatar->fetch_assoc();
                                $avatar = $record_avatar["URL"];

                                echo "<li class='comment-model'>";

                                echo "<div class='comment-img'>";
                                echo "<img src='$avatar' alt=''>";
                                echo "</div>";

                                echo "<div class='comment-text'>";
                                echo "<div class='comment-main'>";;
                                echo "<span class='username'>$user_name</span>";
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

                                echo "</li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <!-- Box Office -->
            <div class="honor">
                <div class="intro">
                    <div class="intro-text">
                        <span>Box Office</span>
                    </div>
                </div>
                <div class="honor-body">
                    <div class="body-model">
                        <p>12.3</p>
                        <p>First Week (millions)</p>
                    </div>
                    <div class="body-model">
                        <?php
                            echo "<p>$movie_box_office</p>";
                        ?>
                        <p>Total (millions)</p>
                    </div>

                </div>
            </div>
        </div>
        <!-- Side -->
        <div class="aside">
            <!-- Trailer -->
            <div class="trailer">
                <div class="tab-contral">
                    <div class="tab active" id="trailer">Trailer</div>
                    <div class="tab" id="other">News</div>
                </div>
                <div class="border"></div>

                <div class="trailer-video">
                    <div class="referral">
                        <div class="intro">
                            Trailer
                        </div>
                    </div>
                    <?php
                        echo "<video src='$movie_trailer_url' controls autoplay></video>";
                    ?>
                </div>
            </div>
            <!-- Relevant Movies -->
            <div class="other-movie">
                <div class="referral">
                    <div class="intro">
                        Relevant Movies
                    </div>
                </div>
                <div class="other-movie-body">
                    <ul>
                        <?php
                            $sql = "select * from movies";
                            $result = $db->query($sql);
                            $records = array();
                            while($row=$result->fetch_assoc()) {
                                $records[]=$row;
                            };
                            $num_movies = count($records);

                            for ($index=0; $index<6; $index++)
                            {
                                $movie_name = $records[$index]["Name"]; 
                                $movie_img_url = $records[$index]["URL"]; 
                                $movie_likes = $records[$index]["Likes"]; 
                                echo "<li class='othermovie-model' style='width:300px'>";
                                echo "<a href='#'>";
                                echo "<img alt='' src='$movie_img_url' style='width:150px; margin-top:15px'>";
                                echo "<p style='font-size:12px'>$movie_name</p>";
                                echo "</a>";
                                echo "<i>$movie_likes Likes</i>";
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
            关于猫眼 :
            <a href="#" target="_blank">关于我们</a>
            <span></span>
            <a href="#" target="_blank">管理团队</a>
            <span></span>
            <a href="#" target="_blank">投资者关系</a> &nbsp;&nbsp;&nbsp;&nbsp; 友情链接 :
            <a href="#" data-query="utm_source=wwwmaoyan" target="_blank">美团网</a>
            <span></span>
            <a href="#" data-query="utm_source=wwwmaoyan">格瓦拉</a>
            <span></span>
            <a href="#" data-query="utm_source=wwwmaoyan" target="_blank">美团下载</a>
            <span></span>
            <a href="#" data-query="utm_source=maoyan_pc" target="_blank">欢喜首映</a>
        </p>
        <p class="friendly-links">
            商务合作邮箱：v@maoyan.com 客服电话：10105335 违法和不良信息举报电话：4006018900
        </p>
        <p class="friendly-links">
            用户投诉邮箱：tousujubao@meituan.com 舞弊线索举报邮箱：wubijubao@maoyan.com
        </p>
        <p class="friendly-links  credentials">
            <a href="#" target="_blank">中华人民共和国增值电信业务经营许可证 京B2-20190350</a>
            <span></span>
            <a href="#" target="_blank">营业性演出许可证 京演（机构）（2019）4094号</a>
        </p>
        <p class="friendly-links  credentials">
            <a href="#" target="_blank">广播电视节目制作经营许可证 （京）字第08478号</a>
            <span></span>
            <a href="#" target="_blank">网络文化经营许可证 京网文（2019）3837-369号 </a>
        </p>
        <p class="friendly-links  credentials">
            <a href="#" target="_blank">猫眼用户服务协议 </a>
            <span></span>
            <a href="#" target="_blank">猫眼平台交易规则总则 </a>
            <span></span>
            <a href="#" target="_blank">隐私政策 </a>
        </p>
        <p class="friendly-links  credentials">
            <a href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010102003232" target="_blank">京公网安备
            11010102003232号</a>
            <span></span>
            <a href="#/" target="_blank">京ICP备16022489号</a>
        </p>
        <p>北京猫眼文化传媒有限公司</p>
        <p>
            ©<span class="my-footer-year">2020</span> 猫眼电影 maoyan.com</p>
        <div class="certificate">
            <a href="#" target="_blank">
                <img src="http://p0.meituan.net/moviemachine/e54374ccf134d1f7b2c5b075a74fca525326.png">
            </a>
            <a href="#" target="_blank">
                <img src="http://p1.meituan.net/moviemachine/805f605d5cf1b1a02a4e3a5e29df003b8376.png">
            </a>
            <a href="h#" target="_blank">
                <img src="http://p0.meituan.net/scarlett/3cd2a9b7dc179531d20d27a5fd686e783787.png">
            </a>
        </div>
    </div>
</body>

</html>