<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="form.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php include('./server/server.php') ?>


    <form method = 'post' action = 'register.php'>
        <div class = 'container'>
            <h1 class = 'header'><b>Register</b><h1>
            <h5>Please fill out the form below to create an account</h5>
            <hr>

            <label><b>Username</b></label><br><?php echo $nameErr ?>
            <input type= 'text' name='user' placeholder='Enter username' value='<?php echo $name;?>' required/><br>

            <label><b>Email</b></label><br><?php echo $emailErr ?>
            <input type = 'text' name = 'email' placeholder = 'Enter email' value ='<?php echo $email;?>' required/><br>

            <label><b>Password</b></label><?php echo $passError; ?><br>
            <input type = 'password' name = 'password' placeholder = 'Enter password' required/><br>

            <label><b>Confirm Password</b></label><br>
            <input type = 'password' name = confirmPass placeholder = 'Reapeat password' required/><br>

            <button type = 'submit' name = 'register' class = 'regbutton'>SIGN UP</button>
        </div>
    </form>
    <div class = 'container login'>
        <p>Already have an account? <a href = './login.php'>Sign in</a>.</p>
    </div>

    
</body>
</html>