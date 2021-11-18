<?php
//including the database connection file
include_once("./config.php");
session_start();
if ($_SESSION['logged_in'] != true) {
    //redirect to login if user  is not logged in
    header('location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Live Notice Board System - Admin Add Story</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!--  Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
        <h1 class="logo"><a href="./admin-dashboard.php">Notice Board </a></h1>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="getstarted scrollto active" href="admin-dashboard.php">Home</a></li>
                <li><a class="getstarted scrollto" href="adminaddstory.php">Add Story</a></li>
                <li><a class="getstarted btn-danger" href="logout.php">Logout</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <?php
            if($_SESSION['response'] != null &&$_SESSION['response'] != '<div id="alert" class="alert alert-success" role="alert">Logged in successfully!</div>' ){
                $result = $_SESSION['response'];
                if(!empty($result)){echo $result; }
            }
            ?>
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-9 text-center">
                <h5>Welcome <b><?php echo $_SESSION['username'] . ','  ?></b></h5>
                <br>
                <h3>Add new story to notice board</h3>
                <br>

            </div>
        </div>
        <div class=" col-lg-10">

                <form action="submitPost.php" method="POST">
                    <div class="form-group">
                        <label for="title"><b>Post title</b></label>
                        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter title" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="message"><b>Message</b></label>
                        <input type="text" class="form-control" id="message" name= "message" placeholder="Enter Post Message" required>
                    </div>
                    <br>
                    <button type="submit"  class="btn-get-started">Add Story</button>
                </form>

        </div>

    </div>
</section>
<!-- End Hero -->


<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>
<footer>
    <script type="text/javascript">

        $(document).ready(function (){

            window.setInterval(function () {
                /// call function here every second
                updateNoticeBoard();
            }, 1000);
            function updateNoticeBoard() {
                // Send AJAX request
                $.ajax({
                    url: 'load_data.php',
                    type: 'POST',
                    dataType: 'JSON',
                });
            }
        });
        setTimeout(function () {

            // Closing the alert
            $('#alert').alert('close');
        }, 5000);
    </script>
</footer>

</html>