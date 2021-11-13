<?php

function getConn(){
    // Connection variables
    $dbhost	= "localhost";	   // localhost or IP
    $dbuser	= "root";		  // database username
    $dbpass	= "";		     // database password
    $dbname	= "notice_board";    // database name
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
return $conn;
}
