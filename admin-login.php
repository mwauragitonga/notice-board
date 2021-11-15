

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    // Connection info. file
    include './config.php';
    // Connection variables
   $conn =getConn();

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
         // validate data
        $username = test_input($_POST["username"]);
        $password = test_input($_POST["password"]);

    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Query sent to database
    $query = "SELECT username, password, user_id FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // Variable $row hold the result of the query
    $row = mysqli_fetch_assoc($result);
    if($row == null){
        echo "<div class='alert alert-danger mt-4' role='alert'>User Not Found. Try Again!
				<p><a href='index.php'><strong>Please try again!</strong></a></p></div>";
    }else{


    // Variable $hash hold the password hash on database
    $hash =$row ['password'];
    //verify password
    if (password_verify($_POST['password'], $hash)) {
//set session data
        session_start();

        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['start'] = time();
//redirect to dashboard
        header('location: dashboard.php');

    } else {
        echo "<div class='alert alert-danger mt-4' role='alert'>Invalid Credentials. Try Again!
				<p><a href='index.php'><strong>Please try again!</strong></a></p></div>";
    }
    }
    mysqli_close($conn);
    ?>
</div>

</body>

</html>