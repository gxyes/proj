<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/clear.css">
    <link rel="stylesheet" href="css/personal.css">
    <title>Profile</title>
    <link rel="icon" href="images/cinema.png">
    <script type="text/javascript">
        function changePwd(event) {
            var input_pwd = event.currentTarget.value;
            // console.log(input_pwd);
            window.location.href = "changePwd.php?Password=" + input_pwd;
            // var pos = myName.value.search(/^[A-Za-z]+(\s[A-Za-z]+){0,}/);
            
            // if (pos != 0) {
            //     alert("The name you entered (" + myName.value + 
            //             ") is not in the correct form. ");
            //     myName.focus();
            //     myName.select();
            //     return false;
            // } 
        }
    </script>
</head>

<body>
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
                    <li><a href="movieList.php?Genre='all_select'&Region='all_select'&Year='all_select'">Movie</a></li>
                    <li><a href="cinemaList.php?Category='all_select'&Region='all_select'&Special='all_select'" class="nav-model">Theatre</a></li>
                    <!-- <li><a href="#" class="nav-model">Forum</a></li> -->
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
            $current_user = $_GET["current"];
        }
    ?>

    <!-- main -->
    <div class="main">
        <div class="content">
            <div class="left">
                <ul>
                    <li>Profile</li>
                    <li class="activeli">Edit Profile</li>
                    <!-- <li id="info" onclick=changeBlock(id)>Personal Info</li> -->
                </ul>
            </div>
            

            <div class="ringht" id="info_block">

            <div class="top">
                    <p>Personal Info</p>
                </div>
                <ul>
                    <?php
                         $sql = "select * from users where Name='$current_user'";
                         $result = $db->query($sql);
                         $records=array();
                         while($row=$result->fetch_assoc())
                         {
                             $records[]=$row;
                         };
                         $num_users = count($records);  

                         for ($index=0; $index<$num_users; $index++) {
                            $user_name = $records[$index]["Name"];
                            $user_avatar_url = $records[$index]["URL"];


                            echo "<li>";

                            echo "<div class='tops'>";
                            echo "<p><span>Info Card</span></p>";
                            echo "</div>";

                            echo "<div class='bottoms'>";

                            echo "<div class='lefts'>";
                            echo "<i><img src='$user_avatar_url' alt=''></i>";
                            echo "<div class='name'>";
                            echo "<p style='font-size: 20px'>&nbsp&nbspName: $user_name</p>";
                            echo "<p style='font-size: 20px'>&nbspPassword: ********</p>";

                            echo "</div>";
                            echo "</div>";

                            echo "<div class='ringhts'>";
                            echo "<div><a id='pwd'>Change Password </a><input type='password' id='pwd-input' placeholder='Enter your new password'></div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</li>";
                         }              
                    ?>
                </ul>

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
    <script>
        var pwdNode = document.getElementById("pwd-input");
        pwdNode.addEventListener("change", changePwd, false);
    </script>
</body>

</html>