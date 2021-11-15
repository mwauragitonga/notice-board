<?php
//including the database connection file
include_once("./config.php");
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title> Live Notice Board System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>

    <div>
        <?php
        if ($_SESSION['logged_in'] == true) {
            //Display this header when user has logged in
            require_once('./header.php');

        } else {
            //redirect to login if user  is not logged in
            header('location: ./index.php');
        }
        ?>
    </div>

    <br>
    <br>
    <br>
    <div class="title">
        <h1><a href="addadminstory.php">Add Story</a></h1>


    </div>




</body>
</html>