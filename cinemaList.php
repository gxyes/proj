<?php
    $category = $_GET["Category"];
    $region = $_GET["Region"];
    $special = $_GET["Special"];

    print_r($category);

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
    $element = array($category, $region, $special);

    for ($index=0; $index<3; $index++) {
        if ($element[$index] != '\'all_select\'') {
            array_push($all_select_element_index, $index);
        }
    }
    //print_r($all_select_element_index);

    $category_string = "Category = $category and ";
    $region_string = "Region = $region and ";
    $special_string = "Special = $special and ";

    $sql_string = "";

    if (in_array(0, $all_select_element_index)) {
        $sql_string .= $category_string;
    }
    if (in_array(1, $all_select_element_index)) {
        $sql_string .= $region_string;
    }
    if (in_array(2, $all_select_element_index)) {
        $sql_string .= $special_string;
    }

    $sql_string = rtrim($sql_string," and ");
    $base = "select * from theatres where ";
    
    if (strlen($sql_string) != 0) {
        $select_sql = $base.$sql_string;
    }
    else {
        $select_sql = "select * from theatres";
    }

    $drop_sql = "drop table if exists theatrelist;";
    $drop_result = $db->query($drop_sql);

    print_r($select_sql);

    $combine_select_create = "create table theatrelist as ".$select_sql;
    $combine_result = $db->query($combine_select_create);

    print_r($combine_select_create);
    header('location:cinemas.php?gbcat='.$category.'&gbregion='.$region.'&gbspecial='.$special.'');
?>