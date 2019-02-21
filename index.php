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
    <script src="imgScript.js"></script>
</head>
<body>
    <div class = 'header'>
        <a href = './index.php'>HOME</a>
        <a href = './sba.php'>SBA</a>
        <a href = './position.php'>POSITIONS</a>
        <a href = './report.php'>REPORTS</a>
    </div>
    <!-- notification message-->
    <div style='text-align:right;font-size:large;'>
        <?php 
            if(isset($_SESSION['success'])) {
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            };
            //logged in user information
            if(isset($_SESSION['username'])) {
                echo $_SESSION['username'] . "<span><a href = 'index.php?logout='1' style='color:red;padding:10px;'>logout</a>
                </span>";
            };
        ?>
    </div>
    <main>
        <h3 style='padding-left:15px'>SBA made simple and efficient</h3>
        <p>Student Based Assessment is an integral part of academia because it enables teachers to record and rank the 
            performance of their students. This website is designed to assist teachers to record and the rank the 
            terminal positions of their students with ease and efficiently.
        </p>
        <div>
            <img src = './images/A.jpg' alt='student pic' class = 'myslides'/>
            <img src = './images/1.jpg' alt='student pic' class = 'myslides'/>
            <img src = './images/2.jpg' alt='student pic' class = 'myslides'/>
            <img src = './images/3.jpg' alt='student pic' class = 'myslides'/>
            <img src = './images/4.jpg' alt='student pic' class = 'myslides'/>
            <img src = './images/6.jpg' alt='student pic' class = 'myslides'/>
        </div>
        <script>
            var slideIndex = 0;
            showslides();
            function showslides() {
                var i;
                var slides = document.getElementsByClassName('myslides');
                for(i=0; i < slides.length; i++) {
                    slides[i].style.display = 'none';
                }
                slideIndex++;
                if(slideIndex > slides.length) {
                    slideIndex = 1;
                }
                slides[slideIndex -1 ].style.display = 'block';
                setTimeout(showslides, 2000);
            }
        </script>
    </main>

    <footer class = 'footer'>
        <p>&copy; 2019 powered by <strong><i>#TnC</i></strong><p>
    </footer>


</body>
</html>