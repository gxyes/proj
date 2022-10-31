<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/clear.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/login.css">
    <title>MovieFever</title>
    <link rel="icon" href="images/cinema.png">
    <script type="text/javascript">
        function tosign() {
            let login = document.querySelector('.login');
            let sign = document.querySelector('.sign');
            login.classList.add('disnone')
            sign.classList.remove('disnone')
        }

        function tologin() {
            let login = document.querySelector('.login');
            let sign = document.querySelector('.sign');
            sign.classList.add('disnone')
            login.classList.remove('disnone')
        }
        function login() {
            let username = document.getElementById('user').value;
            let userpaswd = document.getElementById('passwd').value;
            if (username != '') {
                window.location.href = "userValidate.php?Username=" + username + "&Password=" + userpaswd;
            } else {
                alert('Please enter your username!')
            }
        }
        function sign() {
            let username = document.getElementById('suser').value;
            let userpaswd = document.getElementById('spasswd').value;
            let userpaswdtwo = document.getElementById('spasswdtwo').value;
            if (username != '' && userpaswd == userpaswdtwo) {
                window.location.href = "userSignUp.php?Username=" + username + "&Password=" + userpaswd;
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
                    <li><a href="movieList.php?Genre='all_select'&Region='all_select'&Year='all_select'" class="nav-model">Movie</a></li>
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

    <div id="login_wrap">
        <div class="login ">
            <div id="status">
                <i style="top: 0; font-size:26px">Login</i>
            </div>
            <span>
            	<form action="post">
                        <p class="form"><input type="text" id="user" placeholder="Username"></p>
                        <p class="form"><input type="password" id="passwd" placeholder="Password"></p>
                        <input type="button" value="Login" class="btn"  style="margin-right: 20px;" onclick="login()">
                        <input type="button" value="To Sign Up" class="btn" id="btn1" onclick="tosign()">
                    </form>
            </span>
        </div>
        <div class="sign disnone">
            <div id="status">
                <i style="top: 0; font-size:26px">Sign Up</i>
            </div>
            <span>
            	<form action="post">
                        <p class="form"><input type="text" id="suser" placeholder="Username"></p>
                        <p class="form"><input type="password" id="spasswd" placeholder="Password"></p>
                        <p class="form"><input type="password" id="spasswdtwo" placeholder="Enter your password again"></p>
                        <input type="button" value="To Login" class="btn"   style="margin-right: 20px;" onclick="tologin()">
                        <input type="button" value="Sign Up" class="btn" id="btn2" onclick="sign()">
                    </form>
            </span>
        </div>
        <div class="login-img">
            <video src="media/login-video.mp4" autoplay controls></video>
            <div class="img">
            </div>
        </div>
    </div>
</body>
</html>