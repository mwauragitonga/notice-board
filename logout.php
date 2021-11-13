/* Destroy current user session */

<?php
session_start();
session_unset($_SESSION['Username']);
session_destroy();

header('location: index.php');
?>