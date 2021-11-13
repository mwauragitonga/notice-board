<?php
//including the database connection file
include_once("../assets/db/config.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--  Meta  -->
    <meta charset="UTF-8" />
    <title>Add Story</title>
    <!--  Styles  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../admin/css/main.css">
</head>
<?php
if ($_SESSION['logged_in'] == true) {
    //Display this header when user has logged in
    require_once('header.php');

} else {
    //redirect to login if user  is not logged in
    header('location: ../index.php');
}
?>
<body>
<section >
    <div class="container col-lg-8" style="margin-top: 10%">

    <form action="submitPost.php" method="POST">
        <div class="form-group">
            <label for="title">Post title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter title" required>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <input type="text" class="form-control" id="message" name= "message" placeholder="Enter Post Message" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>

</section>
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
                    url: '../load_data.php',
                    type: 'POST',
                    dataType: 'JSON',
                    success:function(html){
                        $('#show_more_main'+ID).remove();
                        $('.postList').append(html);
                    }
                });
            }
        });

    </script>
</footer>
</html>