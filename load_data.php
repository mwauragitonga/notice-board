<?php
//including the database connection file
include_once("assets/db/config.php");
$conn = getConn();
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//echo date("F d, Y h:i:s A");
$sql = "SELECT * FROM posts ORDER BY date_posted DESC";
$result = mysqli_query($conn, $sql); // using mysqli_query
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
 echo json_encode ($data);


?>


