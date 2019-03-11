<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>P3 French Delete</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../student.css" />
</head>
<body>
    <h1 style='text-align:center'>Delete Student</h1>
    <form action = './frep3.php'><button class = 'std'>Return to SBA</button></form>

    <form action='fredelp3.php' method='post' class='container'>
        <label>Student Name</label><br>
        <input name='stdName' type='text' required><br>
        <button type='submit' name='submit' class='del'>Delete</button><hr>
    </form>

    <form action='fredelp3.php' method='post' class='container'>
    <label>click on the button below to delete All records</label><br>
    <button type='submit' name='alldel' class='alldel'>Delete All</button>
    </form>

    <?php
        $connect = mysqli_connect('localhost','root','','p3sba');

        include('../server/french/del.php');
        mysqli_close($connect);

    ?>

    
</body>
</html>