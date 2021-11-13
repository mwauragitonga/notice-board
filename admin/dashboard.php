<?php
//including the database connection file
include_once("../assets/db/config.php");
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title> Live Notice Board System</title>
    <link rel="stylesheet" type="text/css" href="../admin/css/style.css">
    <link rel="stylesheet" type="text/css" href="../admin/css/main.css">
</head>
<body>
<header>
    <div class="admin">
        <div class="logo">
            <img src="https://lh3.googleusercontent.com/fife/ABSRlIoGiXn2r0SBm7bjFHea6iCUOyY0N2SrvhNUT-orJfyGNRSMO2vfqar3R-xs5Z4xbeqYwrEMq2FXKGXm-l_H6QAlwCBk9uceKBfG-FjacfftM0WM_aoUC_oxRSXXYspQE3tCMHGvMBlb2K1NAdU6qWv3VAQAPdCo8VwTgdnyWv08CmeZ8hX_6Ty8FzetXYKnfXb0CTEFQOVF4p3R58LksVUd73FU6564OsrJt918LPEwqIPAPQ4dMgiH73sgLXnDndUDCdLSDHMSirr4uUaqbiWQq-X1SNdkh-3jzjhW4keeNt1TgQHSrzW3maYO3ryueQzYoMEhts8MP8HH5gs2NkCar9cr_guunglU7Zqaede4cLFhsCZWBLVHY4cKHgk8SzfH_0Rn3St2AQen9MaiT38L5QXsaq6zFMuGiT8M2Md50eS0JdRTdlWLJApbgAUqI3zltUXce-MaCrDtp_UiI6x3IR4fEZiCo0XDyoAesFjXZg9cIuSsLTiKkSAGzzledJU3crgSHjAIycQN2PH2_dBIa3ibAJLphqq6zLh0qiQn_dHh83ru2y7MgxRU85ithgjdIk3PgplREbW9_PLv5j9juYc1WXFNW9ML80UlTaC9D2rP3i80zESJJY56faKsA5GVCIFiUtc3EewSM_C0bkJSMiobIWiXFz7pMcadgZlweUdjBcjvaepHBe8wou0ZtDM9TKom0hs_nx_AKy0dnXGNWI1qftTjAg=w1920-h979-ft"
                 alt="">
        </div>
    </div>
    <div>
        <?php
        if ($_SESSION['logged_in'] == true) {
            //Display this header when user has logged in
            require_once('header.php');

        } else {
            //redirect to login if user  is not logged in
            header('location: ../index.php');
        }
        ?>
    </div>
    <div class="title">
        <h1><a href="addadminstory.php">Add Admin Story</a></h1>


    </div>

    <div>

    </div>


</body>
</html>