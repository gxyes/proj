<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/movies.css">
    <link rel="stylesheet" href="css/clear.css">
    <title>Movie</title>
    <link rel="icon" href="images/cinema.png">
    <script type="text/javascript">
        var gbgenre="all_select";
        var gbregion="all_select";
        var gbyear="all_select";

        function update(genre='none', region='none', year='none'){
            genre = genre||'none'; 
            region = region||'none'; 
            year = year||'none'; 

            if (genre != 'none') {
                gbgenre = genre;
            }
            if (region != 'none') {
                gbregion = region;
            }
            if (year != 'none') {
                gbyear = year;
            }
            // console.log(gbgenre, gbregion, gbyear);
            window.location.href = "movieList.php?Genre=" + gbgenre + "&Region=" + gbregion + "&Year=" + gbyear;
        }

        function selectGenre(genre) {
            // console.log(genre);
            update(genre=genre, region=gbregion, year=gbyear);
        }

        function selectRegion(region) {
            // console.log(region);
            update(genre=gbgenre, region=region, year=gbyear);
        }

        function selectYear(year) {
            // console.log(year);
            update(genre=gbgenre, region=gbregion, year=year);
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

        $sql = "select * from currentUser";
        $result = $db->query($sql);
        $records=$result->fetch_assoc();
        $current_user = $records["Name"];

        if ($_GET["current"]) {
            print_r($_GET["current"]);
        };
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
                    <li><a href="movies.php" class="nav-model active">Movie</a></li>
                    <li><a href="cinemas.php" class="nav-model">Theatre</a></li>
                    <li><a href="cinemas.html" class="nav-model">Forum</a></li>
                    <li><a href="cinemas.html" class="nav-model">Theatre</a></li>
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
                        echo "<a href='personal.html'>Profile</a>";
                        echo "<a href='logout.php'>Log Out</a>";
                        echo "</div>";
                    }
                ?>
            </div>
    </header>

    <!-- nav -->
    <div class="movies-nav">
        <div class="nav-body">
            <div class="hotshowing">
                <a href="#" class="active">
                    Now Showing
                </a>
            </div>
            <div class="willshow">
                <a href="#">
                    Comming Soon
                </a>
            </div>
            <div class="oldmovie">
                <a href="#">
                    Classic
                </a>
            </div>
        </div>
    </div>

    <!-- Category -->
    <div class="movie-list">
        <div class="list-body">
            <div class="list-model">
                <div class="name">
                    Genre:
                </div>
                <ul class="tags">
                    <li class="tag-click active" id='none', onclick=selectGenre(id)>
                        <a href="#">ALL</a>
                    </li>
                    <li class="tag-click" id='romance', onclick=selectGenre(id)>
                        <a href="#">Romance</a>
                    </li>
                    <li class="tag-click" id='comedy', onclick=selectGenre(id)>
                        <a href="#">Comedy</a>
                    </li>
                    <li class="tag-click" id='animation', onclick=selectGenre(id)>
                        <a href="#">Animation</a>
                    </li>
                    <li class="tag-click" id='drama', onclick=selectGenre(id)>
                        <a href="#">Drama</a>
                    </li>
                    <li class="tag-click" id='mystery', onclick=selectGenre(id)>
                        <a href="#">Mystery</a>
                    </li>
                    <li class="tag-click" id='thriller', onclick=selectGenre(id)>
                        <a href="#">Thriller</a>
                    </li>
                    <li class="tag-click" id='science-fiction', onclick=selectGenre(id)>
                        <a ref="#">Science-Fiction</a>
                    </li>
                    <li class="tag-click" id='action', onclick=selectGenre(id)>
                        <a href="#">Action</a>
                    </li>
                    <li class="tag-click" id='crime', onclick=selectGenre(id)>
                        <a ref="#">Crime</a>
                    </li>
                    <li class="tag-click" id='adventure', onclick=selectGenre(id)>
                        <a href="#">Adventure</a>
                    </li>
                    <li class="tag-click" id='war', onclick=selectGenre(id)>
                        <a ref="#">War</a>
                    </li>
                    <li class="tag-click" id='fantacy', onclick=selectGenre(id)>
                        <a ref="#">Fantacy</a>
                    </li>
                    <li class="tag-click" id='sport', onclick=selectGenre(id)>
                        <a ref="#">Sport</a>
                    </li>
                    <li class="tag-click" id='family', onclick=selectGenre(id)>
                        <a ref="#">Family</a>
                    </li>
                    <li class="tag-click" id='history', onclick=selectGenre(id)>
                        <a ref="#">History</a>
                    </li>
                    <li class="tag-click" id='documentary', onclick=selectGenre(id)>
                        <a ref="#">Documentary</a>
                    </li>
                    <li class="tag-click" id='others', onclick=selectGenre(id)>
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
                        <a href="#" id='none', onclick=selectRegion(id)>ALL</a>
                    </li>
                    <li class="tag-click">
                        <a href="#" id='china', onclick=selectRegion(id)>China</a>
                    </li>
                    <li class="tag-click">
                        <a href="#" id='us', onclick=selectRegion(id)>United States</a>
                    </li>
                    <li class="tag-click">
                        <a href="#" id='korea', onclick=selectRegion(id)>Korea</a>
                    </li>
                    <li class="tag-click">
                        <a href="#" id='japan', onclick=selectRegion(id)>Japan</a>
                    </li>
                    <li class="tag-click">
                        <a ref="#" id='tailand', onclick=selectRegion(id)>Tailand</a>
                    </li>
                    <li class="tag-click">
                        <a href="#" id='india', onclick=selectRegion(id)>India</a>
                    </li>
                    <li class="tag-click">
                        <a href="#" id='france', onclick=selectRegion(id)>France</a>
                    </li>
                    <li class="tag-click">
                        <a ref="#" id='uk', onclick=selectRegion(id)>United Kingdom</a>
                    </li>
                    <li class="tag-click">
                        <a href="#" id='russia', onclick=selectRegion(id)>Russia</a>
                    </li>
                    <li class="tag-click">
                        <a ref="#" id='italy', onclick=selectRegion(id)>Italy</a>
                    </li>
                    <li class="tag-click">
                        <a ref="#" id='spain', onclick=selectRegion(id)>Spain</a>
                    </li>
                    <li class="tag-click">
                        <a ref="#" id='germany', onclick=selectRegion(id)>Germany</a>
                    </li>
                    <li class="tag-click">
                        <a ref="#" id='poland', onclick=selectRegion(id)>Poland</a>
                    </li>
                    <li class="tag-click">
                        <a ref="#" id='australia', onclick=selectRegion(id)>Australia</a>
                    </li>
                    <li class="tag-click">
                        <a ref="#" id='iran', onclick=selectRegion(id)>Iran</a>
                    </li>
                    <li class="tag-click">
                        <a ef="#" id='others', onclick=selectRegion(id)>Others</a>
                    </li>
                </ul>
            </div>
            <div class="list-model">
                <div class="name">
                    Year:
                </div>
                <ul class="tags">
                    <li class="tag-click active">
                        <a href="#" id='all', onclick=selectYear(id)>ALL</a>
                    </li>
                    <li class="tag-click">
                        <a href="#" id='2020', onclick=selectYear(id)>2020</a>
                    </li>
                    <li class="tag-click">
                        <a href="#" id='2019', onclick=selectYear(id)>2019</a>
                    </li>
                    <li class="tag-click">
                        <a href="#" id='2018', onclick=selectYear(id)>2018</a>
                    </li>
                    <li class="tag-click">
                        <a href="#" id='2017', onclick=selectYear(id)>2017</a>
                    </li>
                    <li class="tag-click">
                        <a href="#" id='2016', onclick=selectYear(id)>2016</a>
                    </li>
                    <li class="tag-click">
                        <a href="#" id='2015', onclick=selectYear(id)>2015</a>
                    </li>
                    <li class="tag-click">
                        <a ref="#" id='2014', onclick=selectYear(id)>2014</a>
                    </li>
                    <li class="tag-click">
                        <a href="#" id='2013', onclick=selectYear(id)>2013</a>
                    </li>
                    <li class="tag-click">
                        <a href="#" id='2012', onclick=selectYear(id)>2012</a>
                    </li>
                    <li class="tag-click">
                        <a ref="#" id='2011', onclick=selectYear(id)>2011</a>
                    </li>
                    <li class="tag-click">
                        <a href="#" id='2010', onclick=selectYear(id)>2010</a>
                    </li>
                    <li class="tag-click">
                        <a ref="#" id='90s', onclick=selectYear(id)>90s</a>
                    </li>
                    <li class="tag-click">
                        <a ref="#" id='80s', onclick=selectYear(id)>80s</a>
                    </li>
                    <li class="tag-click">
                        <a ref="#" id='70s', onclick=selectYear(id)>70s</a>
                    </li>
                    <li class="tag-click">
                        <a ef="#" id='Others', onclick=selectYear(id)>Others</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Ranking methods -->
        <!-- <div class="sort">
            <div class="sort-model">
                <div class="sort-icon"></div>
                <span>Sort by popularity</span>
            </div>
            <div class="sort-model">
                <div class="sort-icon"></div>
                <span>Sort by time</span>
            </div>
            <div class="sort-model">
                <div class="sort-icon"></div>
                <span>Sort by number of comments</span>
            </div>
        </div> -->
    </div>


    <!-- Movies -->
    <div class="movies-body">
        <ul id="movies-body">
        <?php
            $exist = mysqli_query($success, "SHOW TABLES LIKE movielist");
            if(mysqli_num_rows($exist==0)) {
                
                $combine_select_create = "create table movielist as select * from movies";
                $combine_result = $db->query($combine_select_create);
            }
        
            $sql = "select * from movielist";
            $result = $db->query($sql);
            $records=array();
            while($row=$result->fetch_assoc())
            {
                $records[]=$row;
            };
            $num_movies = count($records);

            for ($index=0; $index<$num_movies; $index++) {
                $movie_name = $records[$index]['Name'];
                $movie_img_url = $records[$index]['URL'];
                $movie_likes = $records[$index]['Likes'];
                echo "<li class='othermovie-model'>";
                echo "<a href='loginMovieInfo.php?User=$current_user&Name=$movie_name'>";
                echo "<img alt='' src='$movie_img_url' style='width:150px'>";
                echo "<p>$movie_name</p>";
                echo "</a>";
                echo "<i>$movie_likes</i>";
                echo "<i class='mix2d'></i>";
                echo "</li>";
            }
        ?>
        </ul>
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

    <!-- <script src="js/ajax.js"></script>
    <script src="js/mock-min.js"></script>
    <script src="js/server.js"></script>
    <script src="js/movies.js"></script> -->
</body>
</html>