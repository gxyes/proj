<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/movies.css">
    <link rel="stylesheet" href="css/clear.css">
    <link rel="stylesheet" href="css/cinemas.css">
    <title>Theatre</title>
    <link rel="icon" href="images/cinema.png">
    <?php
        $gbcat = $_GET["gbcat"];
        $gbregion = $_GET["gbregion"];
        $gbspecial = $_GET["gbspecial"];     
    ?>
    <script type="text/javascript">
        var gbcat = `<?php echo $gbcat?>`;
        var gbregion= `<?php echo $gbregion?>`;
        var gbspecial = `<?php echo $gbspecial?>`;

        var selection = "You have selected " + gbcat + " and " + gbregion + " and " + gbspecial;
        
        window.addEventListener('load', function() {
            var selection_block = document.createElement("div");
            selection_block.setAttribute("style", "font-size:20px; line-height:50px; color: white");
            selection_block.innerHTML = selection;
            document.getElementById("cinema-nav").appendChild(selection_block);

            // if (gbcat == '\'all_select\'') {
            //     name = 'all_select_cat';
            //     var tab1 = document.getElementsByName(name)[0];
            //     tab1.setAttribute('class', 'tag-click active');
            // } else {
            //     var tab1 = document.getElementById(gbcat.replace('\'', '').replace('\'', ''));
            //     tab1.setAttribute('class', 'tag-click active');
            // }


            if (gbcat != '\'all_select\'') {
                var tab1 = document.getElementById(gbcat.replace('\'', '').replace('\'', ''));
                tab1.setAttribute('class', 'tag-click active');
            }

            if (gbregion != '\'all_select\'') {
                var tab2 = document.getElementById(gbregion.replace('\'', '').replace('\'', ''));
                tab2.setAttribute('class', 'tag-click active');
            }

            if (gbspecial != '\'all_select\'') {
                var tab3 = document.getElementById(gbspecial.replace('\'', '').replace('\'', ''));
                tab3.setAttribute('class', 'tag-click active');
            }
        })

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
            console.log(gbcat, gbregion, gbspecial);
            console.log(gbcat);
            window.location.href = 'cinemaList.php?Category=' + gbcat + '&Region=' + gbregion + '&Special=' + gbspecial;
        }

        function selectCat(category) {
            // console.log(category);
            var tab = document.getElementById(category);
            tab.setAttribute('class', 'tag-click active');
            category = "'" + category + "'";
            update(category=category, region=gbregion, special=gbspecial);
        }

        function selectRegion(region) {
            // console.log(region);
            var tab = document.getElementById(region);
            tab.setAttribute('class', 'tag-click active');
            region = "'" + region + "'";
            update(category=gbcat, region=region, special=gbspecial);
        }

        function selectSpecial(special) {
            // console.log(special);
            var tab = document.getElementById(special);
            tab.setAttribute('class', 'tag-click active');
            special = "'" + special + "'";
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

        // if ($_GET["current"]) {
        //     print_r($_GET["current"]);
        // }
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
                    <li><a href="movieList.php?Genre='all_select'&Region='all_select'&Year='all_select'" class="nav-model">Movie</a></li>
                    <li><a href="cinemaList.php?Category='all_select'&Region='all_select'&Special='all_select'" class="nav-model active">Theatre</a></li>
                    <li><a href="forum.php" class="nav-model">Forum</a></li>
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

    <div class="movies-nav" id="cinema-nav">
        <!-- <div class="nav-body">
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
        </div> -->
    </div>

    <!-- Category -->
    <div class="movie-list">
        <div class="list-body">
            <div class="list-model">
                <div class="name">
                    Category:
                </div>
                <ul class="tags">
                    <li class="tag-click" id="all_select" onclick=selectCat(id)>
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
                    <li class="tag-click" id="all_select" onclick=selectRegion(id)>
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
                    <li class="tag-click" id="all_select" onclick=selectSpecial(id)>
                        <a href="#">ALL</a>
                    </li>
                    <li class="tag-click" id="IMAX" onclick=selectSpecial(id)>
                        <a href="#">IMAX</a>
                    </li>
                    <li class="tag-click" id="CGS" onclick=selectSpecial(id)>
                        <a href="#">CGS</a>
                    </li>
                    <li class="tag-click" id="Dolby Cinema" onclick=selectSpecial(id)>
                        <a href="#">Dolby Cinema</a>
                    </li>
                    <li class="tag-click" id="RealD" onclick=selectSpecial(id)>
                        <a href="#">RealD</a>
                    </li>
                    <li class="tag-click" id="RealD6FL" onclick=selectSpecial(id)>
                        <a href="#">RealD6FL
                        </a>
                    </li>
                    <li class="tag-click" id="LUXE" onclick=selectSpecial(id)>
                        <a ref="#">LUXE
                        </a>
                    </li>
                    <li class="tag-click" id="4DX" onclick=selectSpecial(id)>
                        <a href="#">4DX</a>
                    </li>
                    <li class="tag-click" id="DTS:X" onclick=selectSpecial(id)>
                        <a href="#">DTS:X</a>
                    </li>
                    <li class="tag-click" id="4K" onclick=selectSpecial(id)>
                        <a href="#">4K</a>
                    </li>
                    <li class="tag-click" id="4D" onclick=selectSpecial(id)>
                        <a ref="#">4D</a>
                    </li>
                    <li class="tag-click" id="CINITV" onclick=selectSpecial(id)>
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
                echo "<a href='cinemadatas.php?Name=$theatre_name&Movie='''> Buy </a>";
                echo "</div>";

                echo "</div>";
                echo "</div>";
            }
        ?>

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