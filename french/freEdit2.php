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
        <form action = './french2.php'><button class = 'std'>Return to SBA</button></form>
    </header>

    <form method = 'post' action = 'freEdit2.php' class = 'container'>
        <label>Student Name</label><br>
        <input name='stdName' type= 'text' required placeholder="Enter Student's name"/><br>

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
        $connect = mysqli_connect('localhost','root','','sba2');

        if(isset($_POST['submit'])) {  
            $stdName = $_POST['stdName'];
            if(!empty($_POST['indTest'])) {
                $indTest = $_POST['indTest'];
            }else {
                $query= "SELECT individual_test FROM french WHERE student_name='$stdName'";
                $result = mysqli_query($connect,$query);
                while($row=mysqli_fetch_assoc($result)) {
                    $indTest = $row['individual_test'];
                }
            }
            if(!empty($_POST['classTest'])) {
                $classTest = $_POST['classTest'];
            }else {
                $query= "SELECT class_test FROM french WHERE student_name='$stdName'";
                $result = mysqli_query($connect,$query);
                while($row=mysqli_fetch_assoc($result)) {
                    $classTest = $row['class_test'];
                }
            }

            if(!empty($_POST['groupWork'])) {
                $groupWork = $_POST['groupWork'];
            }else {
                $query= "SELECT group_work FROM french WHERE student_name='$stdName'";
                $result = mysqli_query($connect,$query);
                while($row=mysqli_fetch_assoc($result)) {
                    $groupWork = $row['group_work'];
                }
            }

            if(!empty($_POST['project'])) {
                $project = $_POST['project'];
            }else {
                $query= "SELECT project FROM french WHERE student_name='$stdName'";
                $result = mysqli_query($connect,$query);
                while($row=mysqli_fetch_assoc($result)) {
                    $project = $row['project'];
                }
            }

            $total60 = $indTest+$classTest+$groupWork+$project;
            $total50 = $total60*0.50;

            if(!empty($_POST['exams'])) {
                $exams = $_POST['exams'];
            }else {
                $query= "SELECT exams FROM french WHERE student_name='$stdName'";
                $result = mysqli_query($connect,$query);
                while($row=mysqli_fetch_assoc($result)) {
                    $exams = $row['exams'];
                }
            }
            $exams50 = $exams*0.50;
            $total100 = $total50+$exams50;
      
            if(!(empty($indTest)&empty($classTest)&empty($groupWork)&empty($project)&empty($exams))) {
                $query = "UPDATE
                            french
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
            else {
                $query = "UPDATE
                            french
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
        }
        mysqli_close($connect);
            
    ?>



</body>
</html>