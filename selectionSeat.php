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
        print_r($theatre_name);
        
        $sql = "select * from currentUser";
        $result = $db->query($sql);
        $records=$result->fetch_assoc();
        $current_user = $records["Name"];

        if ($_GET["User"]) {
            $current_user = $_GET["User"];
        }

        // // Get all seats bought from the bookings database
        // $sql_seats_bought = "select * from bookings where Name = '$movie_name'";
        // $result_seats_bought = $db->query($sql_seats_bought);
        // $records_seats_bought=array();
        // while($row=$result_seats_bought->fetch_assoc())
        // {
        //     $records_seats_bought[]=$row;
        // };
        // $num_bookings = count($records_seats_bought); 

        // // Since some bookings contains several seats, we need to separate them
        // $all_seats_bought = array();
        // $seats_list = array();
        // for ($index=0; $index < $num_bookings; $index++) {
        //     $seats = explode(" ", $records_seats_bought[$index]);
        //     $num_seats = count($seats); 
        //     for ($seats_index=0; $seats_index < $num_seats; $seats_index++) {

        //     }
        // }
        
    ?>
    
    <script type="text/javascript">
        window.addEventListener('load', function() {
            let seats = document.getElementById('seats-main');
            let seatlist = document.createElement('div');
            // Decide if a seat is available
            for (let row = 1; row < 10; row++) {
                for (let col = 1; col < 9; col++) {
                    let n = Math.random();
                    if (n < 0.1) {
                        seatlist.innerHTML += `<div class="seat disableseat" data-num="${row}-${col}"></div>`;
                        
                    } else {
                        seatlist.innerHTML += `<div class="seat" data-num="${row}-${col}"></div>`;
                        
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
                // div.innerHTML = `Row ${id[0]} Seat ${id[1]}`;
                div.innerHTML = `${id[0]}-${id[1]}`;
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
        function addBooking() {
            var day1 = new Date();
            day1.setTime(day1.getTime());
            var s1 = day1.getFullYear()+"-" + (day1.getMonth()+1) + "-" + day1.getDate();
            var seats = document.getElementsByClassName("seat-num");
            var seats_string = "";

            for (i=0;i<seats.length;i++){
                seats_string += seats[i].innerHTML;
                seats_string += " ";
            }
            // console.log(seats_string);

            var booking_date = s1;
            var booking_total_price = total_price;
            var booking_movie_name = `<?php echo $movie_name?>`;
            var booking_movie_hall = `<?php echo $hall?>`;
            var booking_movie_time = `<?php echo $time?>`;
            var booking_movie_theatre = `<?php echo $theatre_name?>`;
            var booking_movie_user = `<?php echo $current_user?>`;
            var booking_seats = seats_string;

            window.location.href =  "addBookingConfirm.php?Date=" + booking_date + "&Price=" + booking_total_price + "&Movie=" + booking_movie_name
            + "&User=" + booking_movie_user + "&Hall=" + booking_movie_hall + "&Time=" + booking_movie_time + "&Theatre=" + booking_movie_theatre + "&Seat=" + booking_seats;               
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
                            <img src="images/seatdisable.png" alt="">Sold
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
            <!-- Ticket info on the right -->
            <div class="data">
                <?php
                    $sql = "select * from movies where Name='$movie_name'";
                    $result = $db->query($sql);
                    $records=$result->fetch_assoc();
                    // $movie_name = $records["Name"];
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
                    echo "<a href='#' onclick=addBooking() id='givemoney'>Confirm</a>";
                    echo "</div>";
                ?>
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
    <script src="js/server.js"></script> -->
    <!-- <script src="js/selectionSeat.js"></script> -->

</body>

</html>