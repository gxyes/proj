<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/movies.css">
    <link rel="stylesheet" href="css/clear.css">
    <link rel="stylesheet" href="css/cinemas.css">
    <title>Choose Theatre</title>
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

        $name = $_GET["Name"];

        $sql = "select * from currentUser";
        $result = $db->query($sql);
        $records=$result->fetch_assoc();
        $current_user = $records["Name"];

        if ($_GET["current"]) {
            print_r($_GET["current"]);
        }
    ?>
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
                    <li><a href="movies.php" class="nav-model">Movie</a></li>
                    <li><a href="cinemas.php" class="nav-model">Theatre</a></li>
                    <li><a href="cinemas.html" class="nav-model">Forum</a></li>
                    <li><a href="cinemas.html" class="nav-model active">Shop</a></li>
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
    <!-- movie -->
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
                    <!-- <a href="#"><i></i> <span>Buy</span></a> -->
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

    <!-- cinemas -->
    <!-- <div class="movie-list">
        <div class="list-body">
            <div class="list-model">
                <div class="name">
                    Category:
                </div>
                <ul class="tags">
                    <li class="tag-click active">
                        <a href="#">ALL</a>
                    </li>
                    <li class="tag-click">
                        <a href="#">Ocean Theatre</a>
                    </li>
                    <li class="tag-click">
                        <a href="#">Wanda Cinemas</a>
                    </li>
                    <li class="tag-click">
                        <a ef="#">Others</a>
                    </li>
                </ul>
            </div>
            <div class="list-model">
                <div class="name">
                    Region:
                </div>
                <ul class="tags">
                    <li class="tag-click active">
                        <a href="#">ALL</a>
                    </li>
                    <li class="tag-click">
                        <a href="#">Tampines</a>
                    </li>
                    <li class="tag-click">
                        <a href="#">Woodlands</a>
                    </li>
                    <li class="tag-click">
                        <a href="#">Jurong East</a>
                    </li>
                    <li class="tag-click">
                        <a href="#">Jurong West</a>
                    </li>
                    <li class="tag-click">
                        <a href="#">Sengkang</a>
                    </li>
                    <li class="tag-click">
                        <a href="#">Bedok</a>
                    </li>
                    <li class="tag-click">
                        <a ref="#">Bukit Merah</a>
                    </li>
                    <li class="tag-click">
                        <a href="#">Queenstown</a>
                    </li>
                    <li class="tag-click">
                        <a href="#">Changi</a>
                    </li>
                </ul>
            </div>
            <div class="list-model">
                <div class="name">
                    Special:
                </div>
                <ul class="tags">
                    <li class="tag-click active">
                        <a href="#">ALL</a>
                    </li>
                    <li class="tag-click">
                        <a href="#">lMAX</a>
                    </li>
                    <li class="tag-click">
                        <a href="#">CGS</a>
                    </li>
                    <li class="tag-click">
                        <a href="#">Dolby Cinema</a>
                    </li>
                    <li class="tag-click">
                        <a href="#">RealD</a>
                    </li>
                    <li class="tag-click">
                        <a href="#">RealD6FL
                        </a>
                    </li>
                    <li class="tag-click">
                        <a ref="#">LUXE
                        </a>
                    </li>
                    <li class="tag-click">
                        <a href="#">4DX</a>
                    </li>
                    <li class="tag-click">
                        <a href="#">DTS:X</a>
                    </li>
                    <li class="tag-click">
                        <a href="#">4K</a>
                    </li>
                    <li class="tag-click">
                        <a ref="#">4D</a>
                    </li>
                    <li class="tag-click">
                        <a ef="#">CINITV</a>
                    </li>
                </ul>
            </div>
            <div class="list-model">
                <div class="name">
                    Service:
                </div>
                <ul class="tags">
                    <li class="tag-click active">
                        <a href="#">ALL</a>
                    </li>
                    <li class="tag-click">
                        <a href="#">Ticket Changeable</a>
                    </li>
                    <li class="tag-click">
                        <a href="#">Ticket Refundable</a>
                    </li>
                </ul>
            </div>
        </div>
    </div> -->

    <div class="cinemas-body" id="cinemas-body">
        <div class="intro">
            <div class="intro-text">
                <span>Theatres</span>
            </div>
        </div>
        <?php
            $sql = "select * from theatrelist";
            $result = $db->query($sql);
            $records=array();
            while($row=$result->fetch_assoc())
            {
                $records[]=$row;
            };
            $num_theatres = count($records);

            $sql_movies = "select * from movies";
            $result_movies = $db->query($sql_movies);
            $records_movies=array();
            while($row=$result_movies->fetch_assoc())
            {
                $records_movies[]=$row;
            };
            $num_movies = count($records_movies);

            for ($index=0; $index<$num_theatres; $index++) {
                $theatre_name = $records[$index]['Name'];
                $theatre_address = $records[$index]['Address'];
                $theatre_service = $records[$index]['Service'];
                $theatre_special = $records[$index]['Special'];
                $theatre_distance = $records[$index]['Distance'];
                $random_price = $records_movies[$index]['Price'];

                echo "<div class='cineam-model'>";

                echo "<div class='cineam-name'>";
                echo "<p><a href='#'>$theatre_name</a></p>";
                echo "<p>$theatre_address</p>";
                echo "<span class='hint'>$theatre_service</span>";
                echo "<span class='hint'>$theatre_special</span>";
                echo "</div>";

                echo "<div class='cineam-money'>";

                echo "<div class='price'>";
                echo "<p><span>From $$random_price</span></p>";
                echo "<p>$theatre_distance</p>";

                echo "</div>";

                echo "<div class='buy-btn'>";
                echo "<a href='cinemadatas.php?Name=$theatre_name&Movie=$movie_name'> Buy </a>";
                echo "</div>";

                echo "</div>";
                echo "</div>";
            }
        ?>

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
</body>

</html>