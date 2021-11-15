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
    $created_by = test_input($_POST["user_id"]);

}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


    // create insert query
    $query = "INSERT INTO posts ( message,title, created_by) VALUES ('$message', '$title', '$created_by')";

    if (mysqli_query($conn, $query)) {
        echo "<div class='alert alert-success mt-4' role='alert'><h3>Your story has been added.</h3></div>";
        header('location: addadminstory.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);

?>