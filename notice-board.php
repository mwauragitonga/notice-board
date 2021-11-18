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

    <title>Live Notice Board System</title>
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
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--  Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="./admin-dashboard.php">Notice Board </a></h1>

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section  class="d-flex align-items-center" >
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-9 text-center">
                <h1>Stories</h1>
            </div>
        </div>
        <div class="text-center">
        </div>
        <div class="row icon-boxes" id="stories_body" style="padding-top: 70px">
            <div  >

            </div>
        </div>
    </div>
</section>


<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
    </div>

    <div class="container d-md-flex py-4">

    </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<!--  Main JS File -->
<script src="assets/js/main.js"></script>

<script type="text/javascript">

    $(document).ready(function () {
        const container = document.getElementById('stories_body');
        //call function here every second
        $.ajax({
            type: "GET",
            url: "./load_data.php",
            dataType: "json"
        }).done(function (data) {
            //storing array in localStorage
            localStorage.clear();
            localStorage.setItem("stories", JSON.stringify(data));
            let content = '';

            for (let i = 0; i < data.length; i++) {
                //retrieve stored data
                var stored = JSON.parse(localStorage.getItem("stories"));
                // Construct card content
                content = '<div  class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">' +
                    '<div class="icon-box" ><div class="icon"><i class="ri-stack-line"></i></div>' +
                    '<h4 class="title"><a href="#"> ' + stored[i]["title"] + '</a></h4><h6>' + stored[i]["date_posted"] +'</h6>'+' <p class="description">' + stored[i]["message"] +
                    '</p></div></div>';

                container.innerHTML += content;


            }
        })

    });
    window.setInterval(function () {
        updateStories();
    }, 3000);

    function updateStories() {
        const container = document.getElementById('stories_body');
        let storiesStored = (JSON.parse(localStorage.getItem("stories")));
        $.ajax({
            type: "GET",
            url: "load_data.php",
            dataType: "json"
        }).done(function (data) {
            if (data.length === storiesStored.length) {
                console.log("no new data")
            } else {
                console.log("new data found")
                console.log(storiesStored)
                console.log(data)
                let content = '';
                container.innerHTML = '';
                for (let i = 0; i < data.length; i++) {

                    // Construct card content
                    content = '<div  class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" >' +
                        '<div class="icon-box" ><div class="icon"><i class="ri-stack-line"></i></div>' +
                        '<h4 class="title"><a href="#"> ' + data[i]["title"] + '</a></h4><h6>' + data[i]["date_posted"] +'</h6>'+' <p class="description">' + data[i]["message"] +
                        '</p></div></div>';
                    //append data to fields
                    container.innerHTML += content;

                }
            }

        })
    }

</script>

</body>

</html>