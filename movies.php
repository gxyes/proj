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
    <?php
         $gbgenre = $_GET["gbgenre"];
         $gbregion = $_GET["gbregion"];
         $gbyear = $_GET["gbyear"];     
    ?>
    <script type="text/javascript">
        // var gbgenre="all_select";
        // var gbregion="all_select";
        // var gbyear="all_select";
        var gbgenre = `<?php echo $gbgenre?>`;
        var gbregion= `<?php echo $gbregion?>`;
        var gbyear = `<?php echo $gbyear?>`;
        console.log(gbregion)

        var selection = "You have selected " + gbgenre + " and " + gbregion + " and " + gbyear;
        
        window.addEventListener('load', function() {

            var selection_block = document.createElement("div");
            selection_block.setAttribute("style", "font-size:20px; line-height:50px; color: white");
            selection_block.innerHTML = selection;
            document.getElementById("movies-nav").appendChild(selection_block);

            if (gbgenre != '\'all_select\'') {
                var tab1 = document.getElementById(gbgenre.replace('\'', '').replace('\'', ''));
                tab1.setAttribute('class', 'tag-click active');
            }

            if (gbregion != '\'all_select\'') {
                var tab2 = document.getElementById(gbregion.replace('\'', '').replace('\'', ''));
                tab2.setAttribute('class', 'tag-click active');
            }

            if (gbyear != '\'all_select\'') {
                var tab3 = document.getElementById(gbyear.replace('\'', '').replace('\'', ''));
                tab3.setAttribute('class', 'tag-click active');
            }
        })
        

        function update(genre='none', region='none', year='none'){
            genre = genre||'none'; 
            region = region||'none'; 
            year = year||'none'; 

            if (genre != 'none') {
                gbgenre = genre;
                //console.log(String(genre));
            }
            if (region != 'none') {
                gbregion = region;
            }
            if (year != 'none') {
                gbyear = year;
            }
            console.log(gbgenre, gbregion, gbyear);
            window.location.href = 'movieList.php?Genre=' + gbgenre + '&Region=' + gbregion + '&Year=' + gbyear;
        }

        function selectGenre(genre) {
            //sconsole.log(genre);
            var tab = document.getElementById(genre);
            tab.setAttribute('class', 'tag-click active');
            genre = "'" + genre + "'";
            update(genre=genre, region=gbregion, year=gbyear);
        }

        function selectRegion(region) {
            // console.log(region);
            var tab = document.getElementById(region).parentNode;
            tab.setAttribute('class', 'tag-click active');
            region = "'" + region + "'";
            update(genre=gbgenre, region=region, year=gbyear);
        }

        function selectYear(year) {
            // console.log(year);
            var tab = document.getElementById(year).parentNode;
            tab.setAttribute('class', 'tag-click active');
            year = "'" + year + "'";
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
                    <li><a href="movieList.php?Genre='all_select'&Region='all_select'&Year='all_select'" class="nav-model active">Movie</a></li>
                    <li><a href="cinemaList.php?Category='all_select'&Region='all_select'&Special='all_select'" class="nav-model">Theatre</a></li>
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
                    <form action="search.php" method="post">
                        <input type="text" class="input" name="movie" placeholder="Search for movies">
                        <input class="submit" type="submit" value="">
                    </form>
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

    <!-- nav -->
    <div class="movies-nav" id="movies-nav">
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
                    Genre:
                </div>
                <ul class="tags">
                    <li class="tag-click" id='all_select', onclick=selectGenre(id)>
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
                        <a href="#">War</a>
                    </li>
                    <li class="tag-click" id='fantacy', onclick=selectGenre(id)>
                        <a href="#">Fantacy</a>
                    </li>
                    <li class="tag-click" id='sport', onclick=selectGenre(id)>
                        <a href="#">Sport</a>
                    </li>
                    <li class="tag-click" id='family', onclick=selectGenre(id)>
                        <a href="#">Family</a>
                    </li>
                    <li class="tag-click" id='history', onclick=selectGenre(id)>
                        <a href="#">History</a>
                    </li>
                    <li class="tag-click" id='documentary', onclick=selectGenre(id)>
                        <a href="#">Documentary</a>
                    </li>
                    <li class="tag-click" id='others', onclick=selectGenre(id)>
                        <a href="#">Others</a>
                    </li>
                </ul>
            </div>
            <div class="list-model">
                <div class="name">
                    Region:
                </div>
                <ul class="tags">
                    <li class="tag-click" id='all_select', onclick=selectRegion(id)>
                        <a href="#">ALL</a>
                    </li>
                    <li class="tag-click"  id='china', onclick=selectRegion(id)>
                        <a href="#">China</a>
                    </li>
                    <li class="tag-click"  id='us', onclick=selectRegion(id)>
                        <a href="#">United States</a>
                    </li>
                    <li class="tag-click"  id='korea', onclick=selectRegion(id)>
                        <a href="#">Korea</a>
                    </li>
                    <li class="tag-click"  id='japan', onclick=selectRegion(id)>
                        <a href="#">Japan</a>
                    </li>
                    <li class="tag-click"  id='tailand', onclick=selectRegion(id)>
                        <a href="#">Tailand</a>
                    </li>
                    <li class="tag-click"  id='india', onclick=selectRegion(id)>
                        <a href="#">India</a>
                    </li>
                    <li class="tag-click"  id='france', onclick=selectRegion(id)>
                        <a href="#">France</a>
                    </li>
                    <li class="tag-click"  id='uk', onclick=selectRegion(id)>
                        <a href="#">United Kingdom</a>
                    </li>
                    <li class="tag-click"  id='russia', onclick=selectRegion(id)>
                        <a href="#">Russia</a>
                    </li>
                    <li class="tag-click"  id='italy', onclick=selectRegion(id)>
                        <a href="#">Italy</a>
                    </li>
                    <li class="tag-click"  id='spain', onclick=selectRegion(id)>
                        <a href="#">Spain</a>
                    </li>
                    <li class="tag-click"  id='germany', onclick=selectRegion(id)>
                        <a href="#">Germany</a>
                    </li>
                    <li class="tag-click"  id='poland', onclick=selectRegion(id)>
                        <a href="#">Poland</a>
                    </li>
                    <li class="tag-click"  id='australia', onclick=selectRegion(id)>
                        <a href="#">Australia</a>
                    </li>
                    <li class="tag-click"  id='iran', onclick=selectRegion(id)>
                        <a href="#">Iran</a>
                    </li>
                    <li class="tag-click"  id='others', onclick=selectRegion(id)>
                        <a href="#">Others</a>
                    </li>
                </ul>
            </div>
            <div class="list-model">
                <div class="name">
                    Year:
                </div>
                <ul class="tags">
                    <li class="tag-click" id='all_select', onclick=selectYear(id)>
                        <a href="#">ALL</a>
                    </li>
                    <li class="tag-click" id='2020', onclick=selectYear(id)>
                        <a href="#">2020</a>
                    </li>
                    <li class="tag-click" id='2019', onclick=selectYear(id)>
                        <a href="#">2019</a>
                    </li>
                    <li class="tag-click" id='2018', onclick=selectYear(id)>
                        <a href="#">2018</a>
                    </li>
                    <li class="tag-click" id='2017', onclick=selectYear(id)>
                        <a href="#">2017</a>
                    </li>
                    <li class="tag-click" id='2016', onclick=selectYear(id)>
                        <a href="#">2016</a>
                    </li>
                    <li class="tag-click" id='2015', onclick=selectYear(id)>
                        <a href="#">2015</a>
                    </li>
                    <li class="tag-click" id='2014', onclick=selectYear(id)>
                        <a href="#">2014</a>
                    </li>
                    <li class="tag-click" id='2013', onclick=selectYear(id)>
                        <a href="#">2013</a>
                    </li>
                    <li class="tag-click" id='2012', onclick=selectYear(id)>
                        <a href="#">2012</a>
                    </li>
                    <li class="tag-click" id='2011', onclick=selectYear(id)>
                        <a href="#">2011</a>
                    </li>
                    <li class="tag-click" id='2010', onclick=selectYear(id)>
                        <a href="#">2010</a>
                    </li>
                    <li class="tag-click" id='90s', onclick=selectYear(id)>
                        <a href="#">90s</a>
                    </li>
                    <li class="tag-click" id='80s', onclick=selectYear(id)>
                        <a href="#">80s</a>
                    </li>
                    <li class="tag-click" id='70s', onclick=selectYear(id)>
                        <a href="#">70s</a>
                    </li>
                    <li class="tag-click" id='Others', onclick=selectYear(id)>
                        <a href="#">Others</a>
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
            // $exist = mysqli_query($success, "SHOW TABLES LIKE movielist");
            // if(mysqli_num_rows($exist==0)) {
                
            //     $combine_select_create = "create table movielist as select * from movies";
            //     $combine_result = $db->query($combine_select_create);
            // }
        
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
                $movie_genre = $records[$index]['Type'];
                $movie_year = $records[$index]['ShowTime'];
                $movie_region = $records[$index]['Region'];
                echo "<li class='othermovie-model'>";
                echo "<a href='loginMovieInfo.php?User=$current_user&Name=$movie_name'>";
                echo "<img alt='' src='$movie_img_url' style='width:160px; height:220px'>";
                echo "<p style='font-size: 14px'>$movie_name</p>";
                // echo "<p style='font-size: 14px'>$movie_genre, $movie_year, $movie_region</p>";
                echo "</a>";
                echo "<i>$movie_likes Likes</i>";
                echo "<i class='mix2d'></i>";
                echo "</li>";
            }
        ?>
        </ul>
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

    <!-- <script src="js/ajax.js"></script>
    <script src="js/mock-min.js"></script>
    <script src="js/server.js"></script>
    <script src="js/movies.js"></script> -->
</body>
</html>
