<!DOCTYPE html>
<html lang="en">
<head>
    <!--  Meta  -->
    <meta charset="UTF-8"/>
    <title>Notice Board</title>
    <!--  Styles  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>

<?php
//including the database connection file
include_once("assets/db/config.php");
session_start();
$conn = getConn();
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//prepare query to fetch all available stories
$sql = "SELECT * FROM posts ORDER BY date_posted DESC";
$result = mysqli_query($conn, $sql); // using mysqli_query

?>
<section id="board">
    <div class="container col-lg-10" style="margin-top: 10%">
        <h1>Stories</h1>
        <div class="row">
            <?php
            while ($res = mysqli_fetch_array($result)) {

                //var_dump($res);?>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title"><span>title: </span><?php echo $res['title']; ?></h3>
                            <small class="card-subtitle mb-2 text-muted"><span>date posted: </span><?php echo $res['date_posted']; ?></small>
                            <br>
                            <br>
                            <p class="card-text"><?php echo $res['message']; ?></p>
<!--                            <a href="#"><span>created by: </span><?php /*echo $res['created_by']; */?></a>-->
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>

    </div>

</section>

</body>
<footer>
    <script type="text/javascript">
        $(document).ready(function (){
            location.reload();
        });
</script>
</footer>
</html>
