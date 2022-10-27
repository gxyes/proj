<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/clear.css">
    <title>Home</title>
    <link rel="icon" href="images/cinema.png">

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

        $sql = "select * from currentUser";
        $result = $db->query($sql);
        $records=$result->fetch_assoc();
        $current_user = $records["Name"];

        if ($_GET["current"]) {
            print_r($_GET["current"]);
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
                    <li><a href="index.php" class="nav-model active">Home</a></li>
                    <li><a href="movies.php" class="nav-model">Movie</a></li>
                    <li><a href="cinemas.php" class="nav-model">Theatre</a></li>
                    <li><a href="#" class="nav-model">Forum</a></li>
                    <li><a href="cinemas.html" class="nav-model">Shop</a></li>
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

    <!-- slider -->
    <div class="wrap" id="wrap">
        <ul class="content"></ul>
        <a href="javascript:;" class="prev">&#60;</a>
        <a href="javascript:;" class="next">&#62;</a>
    </div>

    <!-- contents -->
    <div class="container">
        <!-- Center -->
        <div class="main">
            <!-- On show -->
            <div class="hot-movie">
                <?php
                    $sql = "select * from movies where Status = 'Coming Soon'";
                    $result = $db->query($sql);
                    $records=array();
                    while($row=$result->fetch_assoc())
                    {
                        $records[]=$row;
                    };
                    $num_movies = count($records);
                ?>
                <h2>Now Showing</h2>
                <div class="movies" id="hotmovies">
                    <?php
                        for ($index=0; $index<$num_movies; $index++)
                        {
                            $movie_name = $records[$index]["Name"]; 
                            $movie_img_url = $records[$index]["URL"]; 
                            $movie_likes = $records[$index]["Likes"]; 
                            $movie_trailer_url = $records[$index]["Trailer"]; 
                            echo "<div class='movies-model'>";
                            echo "<a href='loginMovieInfo.php?User=$current_user&Name=$movie_name'><img style='width:100%; height:85%' src='$movie_img_url' alt='' srcset=''></a>";
                            echo "<a href='loginBuy.php?User=$current_user&Name=$movie_name'>Buy Ticket!</a>";
                            echo "</div>";

                        };
                    ?>
                </div>
            </div>

            <!-- Coming soon -->
            <div class="movie-box">
                <?php
                    $sql = "select * from movies where Status = 'Coming Soon'";
                    $result = $db->query($sql);
                    $records=array();
                    while($row=$result->fetch_assoc())
                    {
                        $records[]=$row;
                    };
                    $num_movies = count($records);
                ?>
                <div class="movie-header">
                    <h2>Coming Soon</h2>
                    <a href="#">
                        <?php
                            echo "<span>$num_movies Movies</span>" 
                        ?>
                    </a>
                </div>
                <div class="movies">
                    <?php
                        for ($index=0; $index<$num_movies; $index++)
                        {
                            $movie_name = $records[$index]["Name"]; 
                            $movie_img_url = $records[$index]["URL"]; 
                            $movie_likes = $records[$index]["Likes"]; 
                            $movie_trailer_url = $records[$index]["Trailer"]; 
                            echo "<div class='movies-model'>";
                            echo "<a href='loginMovieInfo.php?User=$current_user&Name=$movie_name'><img style='width:100%; height:80%' src='$movie_img_url' alt='' srcset=''></a>";
                            echo "<p>$movie_likes Likes</p>";
                            echo "<button onclick='alert('123')>Trailer</button>";
                            echo "<button onclick='alert('123')>Pre-Sale</button>";
                            echo "</div>";

                        };
                    ?>
                </div>
            </div>

            <!-- Popular Movies -->
            <div class="movie-box">
                <?php
                    $sql = "select * from movies where Status = 'Coming Soon'";
                    $result = $db->query($sql);
                    $records=array();
                    while($row=$result->fetch_assoc())
                    {
                        $records[]=$row;
                    };
                    $num_movies = count($records);
                ?>
                <div class="movie-header c hotmovie ">
                    <h2>Popular</h2>
                    <a href="#">
                        <?php
                            echo "<span>$num_movies Movies</span>" 
                        ?>
                    </a>
                </div>
                <div class="movies movies-hot">
                    <?php
                        for ($index=0; $index<$num_movies; $index++)
                        {
                            $movie_name = $records[$index]["Name"]; 
                            $movie_img_url = $records[$index]["URL"]; 
                            $movie_likes = $records[$index]["Likes"]; 
                            $movie_trailer_url = $records[$index]["Trailer"]; 
                            echo "<div class='movies-model'>";
                            echo "<a href='loginMovieInfo.php?User=$current_user&Name=$movie_name'><img style='width:100%; height:80%' src='$movie_img_url' alt='' srcset=''></a>";
                            echo "<p>$movie_likes Likes</p>";
                            echo "<button onclick='alert('123')>Trailer</button>";
                            echo "<button onclick='alert('123')>Pre-Sale</button>";
                            echo "</div>";

                        };
                    ?>
                </div>
            </div>

            <!-- Comedy -->
            <div class="movie-box">
                <?php
                    $sql = "select * from movies where Status = 'Coming Soon'";
                    $result = $db->query($sql);
                    $records=array();
                    while($row=$result->fetch_assoc())
                    {
                        $records[]=$row;
                    };
                    $num_movies = count($records);
                ?>
                <div class="movie-header">
                    <h2>Coming Soon</h2>
                    <a href="#">
                        <?php
                            echo "<span>$num_movies Movies</span>" 
                        ?>
                    </a>
                </div>
                <div class="movies">
                    <?php
                        $sql = "select * from movies where Status = 'Coming Soon'";
                        $result = $db->query($sql);
                        $records=array();
                        while($row=$result->fetch_assoc())
                        {
                            $records[]=$row;
                        };
                        $num_movies = count($records);
                        for ($index=0; $index<$num_movies; $index++)
                        {
                            $movie_name = $records[$index]["Name"]; 
                            $movie_img_url = $records[$index]["URL"]; 
                            $movie_likes = $records[$index]["Likes"]; 
                            $movie_trailer_url = $records[$index]["Trailer"]; 
                            echo "<div class='movies-model'>";
                            echo "<a href='loginMovieInfo.php?User=$current_user&Name=$movie_name'><img style='width:100%; height:80%' src='$movie_img_url' alt='' srcset=''></a>";
                            echo "<p>$movie_likes Likes</p>";
                            echo "<button onclick='alert('123')>Trailer</button>";
                            echo "<button onclick='alert('123')>Pre-Sale</button>";
                            echo "</div>";

                        };
                    ?>
                </div>
            </div>

            <!-- Action -->
            <div class="movie-box">
                <?php
                    $sql = "select * from movies where Status = 'Coming Soon'";
                    $result = $db->query($sql);
                    $records=array();
                    while($row=$result->fetch_assoc())
                    {
                        $records[]=$row;
                    };
                    $num_movies = count($records);
                ?>
                <div class="movie-header">
                    <h2>Coming Soon</h2>
                    <a href="#">
                        <?php
                            echo "<span>$num_movies Movies</span>" 
                        ?>
                    </a>
                </div>
                <div class="movies">
                    <?php
                        $sql = "select * from movies where Status = 'Coming Soon'";
                        $result = $db->query($sql);
                        $records=array();
                        while($row=$result->fetch_assoc())
                        {
                            $records[]=$row;
                        };
                        $num_movies = count($records);
                        for ($index=0; $index<$num_movies; $index++)
                        {
                            $movie_name = $records[$index]["Name"]; 
                            $movie_img_url = $records[$index]["URL"]; 
                            $movie_likes = $records[$index]["Likes"]; 
                            $movie_trailer_url = $records[$index]["Trailer"]; 
                            echo "<div class='movies-model'>";
                            echo "<a href='loginMovieInfo.php?User=$current_user&Name=$movie_name'><img style='width:100%; height:80%' src='$movie_img_url' alt='' srcset=''></a>";
                            echo "<p>$movie_likes Likes</p>";
                            echo "<button onclick='alert('123')>Trailer</button>";
                            echo "<button onclick='alert('123')>Pre-Sale</button>";
                            echo "</div>";

                        };
                    ?>
                </div>
            </div>
        </div>

        <!-- Side Bar -->
        <div class="aside">

            <!--  Most Popular (Likes) -->
            <div class="hope">
                <h2>Most Popular</h2>
                <div class="hope-body">
                    <ul class="hope-list">
                        <?php
                            $sql = "select * from movies";
                            $result = $db->query($sql);
                            $records=array();
                            // $movie_name=array();
                            // $movie_likes=array();
                            // $movie_showtime=array();
                            while($row=$result->fetch_assoc())
                            {
                                $records[]=$row;
                                // $movie_name[]=$row["Name"];
                                // $movie_likes[]=$row["Likes"];
                                // $movie_showtime[]=$row["ShowTime"];
                            };
                            $num_movies = count($records);
                            array_multisort(array_column($records, 'Likes'), SORT_DESC, $records); 
                        ?>
                        <li class="hope-item-top1">
                            <?php
                                $image = $records[0]['URL'];
                                $name = $records[0]['Name'];
                                $show_time = $records[0]['ShowTime'];
                                $likes =$records[0]['Likes'];
                                echo "<a href='loginMovieInfo.php?User=$current_user&Name=$name'>";
                                echo "<div class='hope-img'>";
                                echo "<img src='$image' alt='' style='width:100%;height:50%'>";
                                echo "</div>";
                                echo "<div class='hope-text'>";
                                echo "<p class='hope-name'>$name</p>";
                                echo "<p class='hope-time'>Date：$show_time</p>";
                                echo "<p class='hope-num'>$likes Likes</p>";
                                echo "</div>";
                                echo "</a>";
                            ?>
                        </li>
                        <li class="hope-item-top">
                            <?php
                                $image = $records[1]['URL'];
                                $name = $records[1]['Name'];
                                $show_time = $records[1]['ShowTime'];
                                $likes =$records[1]['Likes'];
                                echo "<a href='loginMovieInfo.php?User=$current_user&Name=$name'>";
                                echo "<div class='hope-img'>";
                                echo "<img src='$image' alt='' style='width:100%;height:100%'>";
                                echo "</div>";
                                echo "<p class='hope-name' style='font-size: 12px'>$name</p>";
                                echo "<p class='hope-num'>$likes Likes</p>";
                                echo "</a>";
                            ?> 
                        </li>
                        <li class="hope-item-top left">
                            <?php
                                $image = $records[2]['URL'];
                                $name = $records[2]['Name'];
                                $show_time = $records[2]['ShowTime'];
                                $likes =$records[2]['Likes'];
                                echo "<a href='loginMovieInfo.php?User=$current_user&Name=$name'>";
                                echo "<div class='hope-img'>";
                                echo "<img src='$image' alt='' style='width:100%;height:100%'>";
                                echo "</div>";
                                echo "<p class='hope-name' style='font-size: 12px'>$name</p>";
                                echo "<p class='hope-num'>$likes Likes</p>";
                                echo "</a>";
                            ?> 
                        </li>
                        <?php
                            for ($index=4; $index<=10; $index++)
                            {
                                $name = $records[$index-1]['Name'];
                                $likes =$records[$index-1]['Likes'];
                                echo "<li class='hope-item'>";
                                echo "<a href='loginMovieInfo.php?User=$current_user&Name=$name'>";
                                echo "<div class='index-box'>";
                                echo "<i class='index index-hot'>$index</i>";
                                echo "<span>$name</span>";
                                echo "</div>";
                                echo "<span class='hope-num'>$likes Likes</span>";
                            }
                        ?>
                    </ul>
                </div>
            </div>

            <!-- top10 box office -->
            <div class="top">
                <h2>TOP 10</h2>
                <?php
                    $sql = "select * from movies";
                    $result = $db->query($sql);
                    $records=array();
                    while($row=$result->fetch_assoc())
                    {
                        $records[]=$row;
                    };
                    $num_movies = count($records);
                    array_multisort(array_column($records, 'Box'), SORT_DESC, $records); 
                ?>
                <div class="toplist">
                    <ul class="topone">
                        <li class=" top-item-first clearfix">
                            <?php
                                $image = $records[0]['URL'];
                                $name = $records[0]['Name'];
                                $box = $records[0]['Box'];
                                echo "<a href='loginMovieInfo.php?User=$current_user&Name=$name'>";
                                echo "<div class='first-item clearfix'>";
                                echo "<img src='$image' alt='' style='width:100%;height:100%'>";
                                echo "</div>";
                                
                                echo "<p class='name'>$name</p>";
                                echo "<p class='money'>$box millions</p>";
                                echo "</a>";
                            ?>
                        </li>
                        <?php
                            for ($index=2; $index<=10; $index++)
                            {
                                $name = $records[$index-1]['Name'];
                                $likes =$records[$index-1]['Box'];
                                echo "<li class='top-item'>";
                                echo "<a href='loginMovieInfo.php?User=$current_user&Name=$name'>";
                                echo "<div class='index-box'>";
                                echo "<i class='index index-hot'>$index</i>";
                                echo "<span>$name</span>";
                                echo "</div>";
                                echo "<span class='index-money'>$box millions</span>";
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
            <a href="" target="_blank">京公网安备
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

    <script src="js/index_slider.js"></script>
</body>

</html>