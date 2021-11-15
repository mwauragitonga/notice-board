<?php

function getConn(){
    // Connection variables
    $dbhost	= "localhost";	   // localhost or IP
    $dbuser	= "kelv";		  // database username
    $dbpass	= "12345";		     // database password
    $dbname	= "notice_board";    // database name
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if ($conn->connect_error) {
        die("ERROR: Unable to connect: " . $conn->connect_error);
    }else{
        return $conn;

    }
}
