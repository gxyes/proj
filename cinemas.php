<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/movies.css">
    <link rel="stylesheet" href="css/clear.css">
    <link rel="stylesheet" href="css/cinemas.css">
    <title>Cinema</title>
    <link rel="icon" href="images/cinema.png">
    <script type="text/javascript">
        var gbcat="all_select";
        var gbregion="all_select";
        var gbspecial="all_select";

        function update(category='none', region='none', special='none'){
            category = category||'none'; 
            region = region||'none'; 
            special = special||'none'; 

            if (category != 'none') {
                gbcat = category;
            }
            if (region != 'none') {
                gbregion = region;
            }
            if (special != 'none') {
                gbspecial = special;
            }
            // console.log(gbcat, gbregion, gbspecial);
            window.location.href = "cinemaList.php?Category=" + gbcat + "&Region=" + gbregion + "&Special=" + gbspecial;
        }

        function selectCat(category) {
            // console.log(category);
            update(category=category, region=gbregion, special=gbspecial);
        }

        function selectRegion(region) {
            // console.log(region);
            update(category=gbcat, region=region, special=gbspecial);
        }

        function selectSpecial(special) {
            // console.log(special);
            update(category=gbcat, region=gbregion, special=special);
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
        }
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
                    <li><a href="cinemas.php" class="nav-model active">Theatre</a></li>
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

    <!-- Category -->
    <div class="movie-list">
        <div class="list-body">
            <div class="list-model">
                <div class="name">
                    Category:
                </div>
                <ul class="tags">
                    <li class="tag-click active" id="none" onclick=selectCat(id)>
                        <a href="#">ALL</a>
                    </li>
                    <li class="tag-click" id="Ocean Theatre" onclick=selectCat(id)>
                        <a href="#">Ocean Theatre</a>
                    </li>
                    <li class="tag-click" id="Wanda Cinemas" onclick=selectCat(id)>
                        <a href="#">Wanda Cinemas</a>
                    </li>
                </ul>
            </div>
            <div class="list-model">
                <div class="name">
                    Region:
                </div>
                <ul class="tags">
                    <li class="tag-click active" id="none" onclick=selectRegion(id)>
                        <a href="#">ALL</a>
                    </li>
                    <li class="tag-click" id="Tampines" onclick=selectRegion(id)>
                        <a href="#">Tampines</a>
                    </li>
                    <li class="tag-click" id="Woodlands" onclick=selectRegion(id)>
                        <a href="#">Woodlands</a>
                    </li>
                    <li class="tag-click" id="Jurong East" onclick=selectRegion(id)>
                        <a href="#">Jurong East</a>
                    </li>
                    <li class="tag-click" id="Jurong West" onclick=selectRegion(id)>
                        <a href="#">Jurong West</a>
                    </li>
                    <li class="tag-click" id="Sengkang" onclick=selectRegion(id)>
                        <a href="#">Sengkang</a>
                    </li>
                    <li class="tag-click" id="Bedok" onclick=selectRegion(id)>
                        <a href="#">Bedok</a>
                    </li>
                    <li class="tag-click" id="Bukit Merah" onclick=selectRegion(id)>
                        <a ref="#">Bukit Merah</a>
                    </li>
                    <li class="tag-click" id="Queenstown" onclick=selectRegion(id)>
                        <a href="#">Queenstown</a>
                    </li>
                    <li class="tag-click" id="Changi" onclick=selectRegion(id)>
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
            <!-- <div class="list-model">
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
            </div> -->
        </div>
    </div>

    <!-- cinemas -->
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

            for ($index=0; $index<$num_theatres; $index++) {
                $theatre_name = $records[$index]['Name'];
                $theatre_address = $records[$index]['Address'];
                $theatre_service = $records[$index]['Service'];
                $theatre_special = $records[$index]['Special'];

                echo "<div class='cineam-model'>";

                echo "<div class='cineam-name'>";
                echo "<p><a href='#'>$theatre_name</a></p>";
                echo "<p>$theatre_address</p>";
                echo "<span class='hint'>$theatre_service</span>";
                echo "<span class='hint'>$theatre_special</span>";
                echo "</div>";

                echo "<div class='cineam-money'>";

                echo "<div class='price'>";
                echo "<p><span>$10</span></p>";
                echo "<p>6km</p>";

                echo "</div>";

                echo "<div class='buy-btn'>";
                echo "<a href='cinemadatas.php?Name=$theatre_name'> Buy </a>";
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