<?php
    // database related
    // Create connection
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

    $year = $_GET['ShowTime'];
    $genre = $_GET['Genre'];
    $query = "select * from movies where Type = '.$genre.'";
    $result = $db->query($query);
    print_r($result);
    // echo ($current_price)
    // echo "var price='$current_price'";

    // $query_create = "drop table if exists movies_selected; create table movies_selected (Name varchar(255), Characters varchar(255),
    // Popular int,
    // URL varchar(255)




    // $coffee_name_category =  $_GET['coffee_name_category'];

    // $name = explode("-", $coffee_name_category)[0];
    // $category = explode("-", $coffee_name_category)[2];

    // $query = "update price set Price = '".$current_price."' where Name = '".$name."' and Category = '".$category."'";
    // $result = $db->query($query);
    // echo ($current_price)
    // echo "var price='$current_price'";
?>