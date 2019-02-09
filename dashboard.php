<?php 
    session_start();
    if(!isset($_SESSION['username'])) {
        $_SESSION['msg'] = 'you must log in first';
        header('location: login.php');
    }
    if(isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="sba.css" />
    <script src="main.js"></script>
</head>
<body>
    <div class = 'header'>
        <a href = './dashboard.php'>DASHBOARD</a>
        <a href = './sba.php'>S.B.A</a>
        <a href = './position.php'>POSITIONS</a>
    </div>
    <!-- notification message-->
    <?php 
        if(isset($_SESSION['success'])) {
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        };
        //logged in user information
        if(isset($_SESSION['username'])) {
            echo $_SESSION['username'];
            echo "<p><a href = 'dashboard.php?logout='1' style='color:red'>logout</a></p>";
        };
    
    ?>
    <main>
        <form action = './overall.php'><button class = 'overall'>OVERALL TOTAL SCORES</button></form>
    </main>

    <footer class = 'logo'>
        <img src='logo.jpg' alt='logo'/>
    </footer>

</body>
</html>