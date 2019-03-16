<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>P4 Student form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../student.css" />
</head>
<body>
    <header>
        <h2>Edit Student Details</h2>
        <form action = './frep4.php'><button class = 'std'>Return to SBA</button></form>
    </header>

    <form method = 'post' action = 'freEditp4.php' class = 'container'>
        <label>Student Name</label><br>
        <input name='stdName' type= 'text' required placeholder = 'Enter Full Name'/><br>

        <label>Individual Test(max 15)</label><br>
        <input name= 'indTest' type ='number' min = '0' max = '15' step = 'any'/><br>

        <label>Class Test(max 15)</label><br>
        <input name= 'classTest' type = 'number' min = '0' max = '15' step = 'any'/><br>

        <label>Group Work(max 15)</label><br>
        <input name='groupWork' type = 'number' min = '0' max = '15' step = 'any'/><br>

        <label>Project(max 15)</label><br>
        <input name= 'project' type = 'number' min = '0' max = '15' step = 'any'/><br>

        <label>Exams Score(100%)</label><br>
        <input name='exams' type ='number' min = '0' max = '100' step = 'any'/><br>

        <button class ='save' type = 'submit' name = 'submit'><b>SAVE</b></button>
        <button class = 'reset' type = 'reset'><b>Reset</b></button>
    </form>

    <?php 
        $connect = mysqli_connect('localhost','root','','p4sba');

        include('../server/french/edit.php');
        mysqli_close($connect);
            
    ?>



</body>
</html>