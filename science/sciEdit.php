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
        <h2>Edit Student Details</h2>
        <form action = './science.php'><button class = 'std'>Return to SBA</button></form>
    </header>

    <form method = 'post' action = 'sciEdit.php' class = 'container'>
        <label>Student Name</label><br>
        <input name='stdName' type= 'text' required/><br>

        <label>Individual Test(max 15)</label><br>
        <input name= 'indTest' type ='number' min = '0' max = '15' step = 'any' required/><br>

        <label>Class Test(max 15)</label><br>
        <input name= 'classTest' type = 'number' min = '0' max = '15' step = 'any' required/><br>

        <label>Group Work(max 15)</label><br>
        <input name='groupWork' type = 'number' min = '0' max = '15' step = 'any' required/><br>

        <label>Project(max 15)</label><br>
        <input name= 'project' type = 'number' min = '0' max = '15' step = 'any' required/><br>

        <label>Exams Score(100%)</label><br>
        <input name='exams' type ='number' min = '0' max = '100' step = 'any' required/><br>

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
            $total60 = $indTest+$classTest+$groupWork+$project;
            $total50 = $total60*0.50;
            $exams = $_POST['exams'];
            $exams50 = $exams*0.50;
            $total100 = $total50+$exams50;
            
            $query = "UPDATE
                science
            SET
                individual_test = $indTest,
                class_test = $classTest,
                group_work = $groupWork,
                project = $project,
                total_60 = $total60,
                total_50 = $total50,
                exams = $exams,
                exams_50 = $exams50,
                total_100 = $total100
            WHERE
            student_name = '$stdName'";

            $result = mysqli_query($connect, $query);
            if($result) {
                echo "<h4 style='color:green;text-align:center'>$stdName's data has been Updated</h4>";
            }
        
        }
        mysqli_close($connect);
        
    
    
    
    
    ?>
