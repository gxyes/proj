<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/clear.css">
    <link rel="stylesheet" href="css/seat.css">
    <title>Seat Selection</title>
    <link rel="icon" href="images/cinema.png">
    <script type="text/javascript">
        window.addEventListener('load', function() {
            let seats = document.getElementById('seats-main');
            let seatlist = document.createElement('div');
            for (let i = 1; i < 10; i++) {
                for (let t = 1; t < 9; t++) {
                    let n = Math.random();
                    if (n < 0.1) {
                        seatlist.innerHTML += `<div class="seat disableseat" data-num="${i}-${t}"></div>`;
                        
                    } else {
                        seatlist.innerHTML += `<div class="seat" data-num="${i}-${t}"></div>`;
                        
                    }
                }
            }
            seats.appendChild(seatlist);

            let pricenum = 0;
            // click
            seats.addEventListener('click', (e) => {
                    let btn = e.target;
                    let arr = [btn.className];
                    if (arr[0] == 'seat') {
                        btn.classList.add('ableseat');
                        let id = btn.getAttribute('data-num').split("-");
                        addbox(id);
                        pricenum++;
                        count();
                    } else {
                        if (arr.indexOf('ableseat')) {
                            let id = btn.getAttribute('data-num');
                            subbox(id);
                            btn.classList.remove('ableseat');
                            pricenum--;
                            count();
                        }
                    }
                })
            // add seats
            function addbox(id) {
                let box = document.getElementById('seatmini');
                let div = document.createElement('div');
                // hide
                let p = document.getElementById('tips');
                p.setAttribute('class', 'none');
                div.setAttribute('class', 'seat-num');
                div.setAttribute('id', `${id.join('-')}`);
                div.innerHTML = `
                Row ${id[0]} Seat ${id[1]}
                `;
                box.appendChild(div)
            }
            // delete
            function subbox(id) {
                let box = document.getElementById('seatmini');
                let div = document.getElementById(`${id}`);
                box.removeChild(div);

            }
            // total price
            function count() {
                let div = document.getElementById('pricemonry');
                price = Number(document.getElementById('price_one').innerHTML.split("$")[1]);
                console.log(price);
                total_price = (pricenum * price).toFixed(2);
                div.innerText = total_price;
                let num = div.innerText - 0;
                if (num != 0) {
                    let btn = document.getElementById('givemoney');
                    btn.classList.add('isable')
                } else {
                    let btn = document.getElementById('givemoney');
                    btn.classList.remove('isable');
                    let p = document.getElementById('tips');
                    p.classList.remove('none')
                }
            }
        })

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

        $movie_name = $_GET["Name"]; 
        $theatre_name = $_GET["Theatre"];
        $hall = $_GET["Hall"];
        $time = $_GET["Time"];
        $price = $_GET["Price"];
        // print_r($theatre_name);
        
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

    <!-- main -->
    <div class="container">
        <div class="nav-img"></div>
        <div class="main">
            <div class="seats-container">
                <div class="seatkinds">
                    <ul>
                        <li class="seatskind-model">
                            <img src="images/seat.png" alt="">Available
                        </li>
                        <li class="seatskind-model">
                            <img src="images/seatdisable.png" alt="">Saled
                        </li>
                        <li class="seatskind-model">
                            <img src="images/seat-readly.png" alt="">Selected
                        </li>
                    </ul>
                </div>
                <div class="screen"></div>
                <div class="seats-body">
                    <div class="seatnum">
                        <ul>
                            <li>1</li>
                            <li>2</li>
                            <li>3</li>
                            <li>4</li>
                            <li>5</li>
                            <li>6</li>
                            <li>7</li>
                            <li>8</li>
                            <li>9</li>
                        </ul>
                    </div>
                    <div class="seats" id="seats-main" onselectstart="return false;">
                    </div>
                </div>
            </div>
            <div class="data">
                <?php
                    $sql = "select * from movies";
                    $result = $db->query($sql);
                    $records=$result->fetch_assoc();
                    $movie_name = $records["Name"];
                    $movie_img_url = $records["URL"];
                    $movie_genre = $records['Type'];
                    $movie_duration = $records['Duration'];
                    
                    echo "<div class='movie-data'>";
                    echo "<img src='$movie_img_url' alt='' id='movieimg' style='width:100px'>";
                    echo "<div class='text'>";
                    echo "<p id='moviename' style='font-size:12px'>$movie_name</p>";
                    echo "<p>Genre: <span id='moviekind'>$movie_genre</span></p>";
                    echo "<p>Duration: <span class='time'>$movie_duration</span></p>";
                    echo "</div>";
                    echo "</div>";
                ?>
                <?php
                    echo "<div class='cinema-data'>";
                    echo "<p>Theatre: <span id='cinemaname'>$theatre_name</span></p>";
                    echo "<p>Hall: <span>$hall</span></p>";
                    echo "<p>Time: <span class='active'>$time</span></p>";
                    echo "<p>Price: <span id='price_one'>$$price</span></p>";
                    echo "</div>";
                ?>

                <?php
                    echo "<div class='price'>";
                    echo "<p>Seat(s)</p>";
                    echo "<div id='seatmini'><p id='tips'>Click on the left seats to select!</p></div>";
                    echo "</div>"
                ?>
                
                <?php
                    echo "<div class='countmoney'>";
                    echo "<span>Total price:</span>";
                    echo "<span>&nbsp&nbsp&nbsp$";
                    echo "<span id='pricemonry'>0</span>";
                    echo "</span></div>";
                ?>

                <?php
                    echo "<div class='user-data'>";
                    echo "<p>Username: <span>$current_user</span></p>";
                    echo "<a href='#' id='givemoney'>Confirm</a>";
                    echo "</div>";
                ?>
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

    <!-- <script src="js/ajax.js"></script>
    <script src="js/mock-min.js"></script>
    <script src="js/server.js"></script> -->
    <!-- <script src="js/selectionSeat.js"></script> -->

</body>

</html>