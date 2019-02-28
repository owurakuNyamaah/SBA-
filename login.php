<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="form.css" />
</head>
<body>
    <?php include('server.php') ?>

    <form method = 'post' action = 'login.php'>
        <div class = 'container'>
            <h1 class = 'header'>Login</h1>
            <label><b>Username</b></label><?php echo $unknown; ?><br>
            <input type= 'text' name='user' placeholder='Enter username' required/><br>

            <label><b>Password</b></label><br>
            <input type = 'password' name = 'pass' placeholder = 'Enter password' required/><br>

            <button type = 'submit' name = 'signin' class = 'regbutton'>SIGN IN</button>
        </div>
        <div class = 'container login'>
                <p>Not yet a member? <a href = './register.php'>Register</a>.</p>
            </div>
    </form>


    
</body>
</html>