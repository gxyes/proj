<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/clear.css">
    <link rel="stylesheet" href="css/cinemadatas.css">
    <title>Theatres</title>
    <link rel="icon" href="images/cinema.png">
    <script type="text/javascript">
        function changeMovie(id)
        {
            var id = Number(id) + 1;
            console.log(id);
            var card_name = "movie" + String(id);
            var movie_card = document.getElementById(card_name);
            movie_card.style = "display:''";

            var img = document.getElementById(String(id-1));
            img.style = "box-shadow: 3px 3px red, -1em 0 .4em olive";

            for (var i = 1; i <=6; i++)
            {
                if (i != id) {
                    // console.log("here");
                    var discard_card_name = "movie" + String(i);
                    var discard_movie_card = document.getElementById(discard_card_name);
                    discard_movie_card.style.display = "none";
                }
                if (i != id) {
                    var img = document.getElementById(String(i-1));
                    img.style = "";
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

        $sql = "select * from currentUser";
        $result = $db->query($sql);
        $records=$result->fetch_assoc();
        $current_user = $records["Name"];

        if ($_GET["current"]) {
            $current_user = $_GET["current"];
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
                    <li><a href="movies.php" class="nav-model">Movie</a></li>
                    <li><a href="cinemas.php" class="nav-model active">Theatre</a></li>
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
                            echo "<li class='activeimg' id='$index' onclick=changeMovie(id)><img id='movieimg' src='$img_url' alt='' style='width:100%; height:145px'></li>";
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

            <!-- <div class="nowmovie" style="display:none">
                <div class="pf">
                    
                    <h3 id="moviename">
                        命运之夜-天之杯 第一章:恶兆之花
                    </h3>
                    <p>
                        <span id="movienum">8.4</span>
                        <span>分</span>
                    </p>
                </div>
                <div class="xq">
                    <div>
                        <span>时长 :</span>
                        <span>120分钟</span>
                    </div>
                    <div>
                        <span>类型 :</span>
                        <span id="moviekind">动画</span>
                    </div>
                    <div>
                        <span>主演 :</span>
                        <span id="moviestar">卫宫士郎,间桐樱,远坂凛</span>
                    </div>
                </div>
            </div> -->

            <div class="date_list">
                <ul>
                    <li>Time Slots:</li>
                    <li class="activeli">今天 7月15日</li>
                    <li>明天 7月16日</li>
                    <li>后天 7月17日</li>
                    <li>周六 7月18日</li>
                </ul>
            </div>
            <div class="session">
                <ul>
                    <li>
                        <span>放映时间</span>
                        <span>语言版本</span>
                        <span>放映厅</span>
                        <span style="color: rgb(58, 58, 58);">售价(元)</span>
                        <span>购票选座</span>
                    </li>
                    <li>
                        <span>13:45</span>
                        <span>日语2D</span>
                        <span>5号激光厅</span>
                        <span>￥66</span>
                        <span class="btn" onclick="jump()">购票选座</span>
                    </li>
                </ul>
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

<!-- 
    <script src="js/ajax.js"></script>
    <script src="js/mock-min.js"></script>
    <script src="js/server.js"></script>
    <script src="js/cinemadatas.js"></script> -->
</body>

</html>