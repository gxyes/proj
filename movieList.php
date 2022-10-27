<?php
    $genre = $_GET["Genre"];
    $region = $_GET["Region"];
    $year = $_GET["Year"];

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

    $all_select_element_index = array();
    $element = array($genre, $region, $year);

    for ($index=0; $index<3; $index++) {
        if ($element[$index] != "all_select") {
            array_push($all_select_element_index, $index);
        }
    }
    print_r($all_select_element_index);

    $genre_string = "Type='$genre',";
    $region_string = "Region='$region',";
    $year_string = "ShowTime='$year',";

    $sql_string = "";

    if (in_array(0, $all_select_element_index)) {
        $sql_string .= $genre_string;
    }
    if (in_array(1, $all_select_element_index)) {
        $sql_string .= $region_string;
    }
    if (in_array(2, $all_select_element_index)) {
        $sql_string .= $year_string;
    }
    print_r($sql_string);
    $sql_string = rtrim($sql_string,",");
    $base = "select * from movies where ";
    
    if (strlen($sql_string) != 0) {
        $select_sql = $base.$sql_string;
    }
    else {
        $select_sql = "select * from movies";
    }

    $drop_sql = "drop table if exists movielist;";
    $drop_result = $db->query($drop_sql);

    $combine_select_create = "create table movielist as ".$select_sql;
    $combine_result = $db->query($combine_select_create);

    print_r($combine_select_create);
    // header('location:movies.php');
?>