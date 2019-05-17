<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BDT edit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../student.css" />
</head>
<body>
    <?php 
        $connect = mysqli_connect('localhost','root','','sba3');

        include('../server/bdt/edit3.php');
    ?>

    <header>
        <h2>Edit Student Details</h2>
        <form action = './bdt3.php'><button class = 'std'>Return to SBA</button></form>
    </header>

    <form method = 'post' action = 'bdtEdit3.php' class = 'container'>
    <label>Student Name</label><br>
        <input name='stdName' type= 'text' value = '<?php echo $std ?>' required/><br>

        <label>Individual Test(max 15)</label><br>
        <input name= 'indTest' type ='number' min = '0' max = '15' step = 'any' value='<?php echo $ind ?>'/><br>

        <label>Class Test(max 15)</label><br>
        <input name= 'classTest' type = 'number' min = '0' max = '15' step = 'any' value='<?php echo $class ?>' /><br>

        <label>Group Work(max 15)</label><br>
        <input name='groupWork' type = 'number' min = '0' max = '15' step = 'any' value='<?php echo $group ?>' /><br>

        <label>Project(max 15)</label><br>
        <input name= 'project' type = 'number' min = '0' max = '15' step = 'any' value='<?php echo $pro ?>' /><br>

        <label>Exams Score(100%)</label><br>
        <input name='exams' type ='number' min = '0' max = '100' step = 'any' value='<?php echo $exams ?>' /><br>

        <button class ='save' type = 'submit' name = 'submit'><b>SAVE</b></button>
        <button class = 'reset' type = 'reset'><b>Reset</b></button>
    </form>

</body>
</html>