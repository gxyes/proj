<?php
      //$genre='all_select';
       //$region='all_select';
        //$year='all_select';

    $genre = $_GET["Genre"];
    $region = $_GET["Region"];
    $year = $_GET["Year"];

    print_r($genre);
    print_r($region);
    print_r($year);
    

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

    //print_r($element);

    for ($index=0; $index<3; $index++) {
        if ($element[$index] != '\'all_select\'') {
            print_r($element[$index]);
            array_push($all_select_element_index, $index);
        }
    }
    //print_r($all_select_element_index);

    $genre_string = "Type = $genre and ";
    $region_string = "Region = $region and ";
    $year_string = "ShowTime = $year and ";

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
    // print_r($sql_string);
    $sql_string = rtrim($sql_string," and ");
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
    print_r($combine_select_create);
    $combine_result = $db->query($combine_select_create);

    header('location:movies.php?gbgenre='.$genre.'&gbregion='.$region.'&gbyear='.$year.'');
    
    //header('location:movies.php?gbgenre="'.$genre.'"&gbregion="'.$region.'"&gbyear="'.$year.'"');
?>