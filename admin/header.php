<header>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a href="dashboard.php" class="navbar-brand">Home</a>
            <form class="d-flex">
               <a class="btn btn-outline-danger" href="../logout.php">  Logout</a>
            </form>
        </div>


    </nav>
    <div style="background: aquamarine; margin-left: 5%">
        Hi <small><?php echo $_SESSION['username'] . ' ,'  ?></small>
    </div>
</header>