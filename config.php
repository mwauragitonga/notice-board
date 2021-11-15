<?php

function getConn(){
    // Connection variables
    $dbhost	= "23.88.121.25";	   // localhost or IP
    $dbuser	= "kelv";		  // database username
    $dbpass	= "12345";		     // database password
    $dbname	= "notice_board";    // database name
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
return $conn;
}
