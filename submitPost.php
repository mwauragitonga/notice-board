<?php
include './config.php';

session_start();

$conn = getConn();

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    /*
    Validate form data then insert to DB
    */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // validate data
    $title = test_input($_POST["title"]);
    $message = test_input($_POST["message"]);
}
function test_input($data) {
    $data = trim($data);
    return $data;
}

    // create insert query
    $query = "INSERT INTO posts ( message,title) VALUES ('$message', '$title')";

    if (mysqli_query($conn, $query)) {
        $result= '<div id="alert" class="alert alert-success alert-dismissible" role="alert">
        Story was posted to notice board successfully!</div>';
        $_SESSION['response_post'] = $result;

        header('location: adminaddstory.php');
    } else {
        $result = '<div id="alert" class="alert alert-danger alert-dismissible" role="alert">
  Failed! Story was not posted to notice board. </div>';
        $_SESSION['response_post'] = $result;

    }

    mysqli_close($conn);

?>