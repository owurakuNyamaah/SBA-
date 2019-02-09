<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../student.css" />
    <script src="main.js"></script>
</head>
<body>
    <header>
        <h3>Student Assesment Details</h3>
        <form action = 'french.php'><button class = 'std'>Return to SBA</button></form>
    </header>

    <form method = 'post' action = 'freStd.php' class = 'container'>
        <label>Student Name</label><br>
        <input name='stdName' type= 'text' required/><br>

        <label>Individual Test(max 15)</label><br>
        <input name= 'indTest' type ='number' min = '0' max = '15' step = 'any' required/><br>

        <label>Class Test(max 15)</label><br>
        <input name= 'classTest' type = 'number' min = '0' max = '15' step = 'any' required/><br>

        <label>Group Work(max 15)</label><br>
        <input name='groupWork' type = 'number' min = '0' max = '15'step = 'any' required/><br>

        <label>Project(max 15)</label><br>
        <input name= 'project' type = 'number' min = '0' max = '15' step = 'any' required/><br>

        <label>Total(total class score 60)</label><br>
        <input name='total60' type = 'number' min = '0' max = '60' step = 'any' required/><br>

        <label>Total 50%(total class score scaled to 50%)</label><br>
        <input name='total50' type ='number'min = '0' max = '50' step = 'any' required/><br>

        <label>Exams Score(100%)</label><br>
        <input name='exams' type ='number' min = '0' max = '100' step = 'any' required/><br>

        <label>Total 50% (thus exams scaled to 50%)</label><br>
        <input name='exams50' type ='number' min = '0' max = '50' step = 'any' required/><br>

        <label>Total 100% (class score scaled to 50% plus exams scaled to 50%)</label><br>
        <input name='total100' type ='number' min = '0' max = '100' step = 'any' required/><br>

        <button class ='save' type = 'submit' name = 'submit'><b>SAVE</b></button>
        <button class = 'reset' type = 'reset'><b>Reset</b></button>
    </form>

<?php 
$connect = mysqli_connect('localhost','root','','sba');

if(isset($_POST['submit'])) {
    $stdName = $_POST['stdName'];
    $indTest = $_POST['indTest'];
    $classTest = $_POST['classTest'];
    $groupWork = $_POST['groupWork'];
    $project = $_POST['project'];
    $total60 = $_POST['total60'];
    $total50 = $_POST['total50'];
    $exams = $_POST['exams'];
    $exams50 = $_POST['exams50'];
    $total100 = $_POST['total100'];

    $query = "INSERT INTO french(
            student_name,
            individual_test,
            class_test,
            group_work,
            project,
            total_60,
            total_50,
            exams,
            exams_50,
            total_100) 
        VALUES (
            '$stdName', 
            $indTest, 
            $classTest, 
            $groupWork, 
            $project, 
            $total60, 
            $total50, 
            $exams, 
            $exams50, 
            $total100)";
            
    $result = mysqli_query($connect, $query);
    if($result) {
        echo 'data inserted';
    }else {
        echo mysqli_error($connect);
    }

}
?>
    
</body>
</html>