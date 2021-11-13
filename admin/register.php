<!doctype html>
<html lang="en">
<head>
    <title>Create account</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>

<div class="container">

    <?php

    include '../assets/db/config.php';
    $conn = getConn();
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // validate data
        $username = test_input($_POST["username"]);
        $password = test_input($_POST["password"]);
        $cpassword = test_input($_POST["confPassword"]);

    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Query to check if the username exist
    $checkUsername = "SELECT * FROM users WHERE username = 'username' ";

    // Variable $result hold the connection data and the query
    $result = $conn->query($checkUsername);
    // Variable $count hold the result of the query
    $count = mysqli_num_rows($result);
    // If count == 1 that means the username is already on the database
    if ($count == 1) {
        echo "<div class='alert alert-warning mt-4' role='alert'>
					<p>That Username already exist. Login Instead</p>
					<p><a href='../index.php'>Please login here</a></p>
				</div>";
    } else {

        /*
        If the username don't exist, the data from the form is sent to the
        database and the account is created
        */
        // check if  password match
        if ($password == $cpassword) {

            // The password_hash() function convert the password in a hash before send it to the database
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            // Query to save username and Password hash to the database
            $query = "INSERT INTO users (username, password) VALUES ('$username', '$passwordHash')";

            if (mysqli_query($conn, $query)) {
                echo "<div class='alert alert-success mt-4' role='alert'><h3>Your account has been created.</h3>
		<a class='btn btn-outline-primary' href='../index.php' role='button'>Login</a></div>";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "<div class='alert alert-warning mt-4' role='alert'>
					<p>The passwords do not match</p>
					<p><a href='../register.php'>Try again here</a></p>
				</div>";
        }
    }
    mysqli_close($conn);
    ?>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
</body>
</html>