<?php 
 $std = $_GET['StdName'];
 $ind = $_GET['indTest'];
 $class = $_GET['classTest'];
 $group = $_GET['groupWork'];
 $pro = $_GET['project'];
 $exams = $_GET['exams'];

    if(isset($_POST['submit'])) {
            $stdName = $_POST['stdName'];
            $query = "SELECT student_name FROM eng WHERE student_name='$stdName' ";
            $result = mysqli_query($connect, $query);
            if(mysqli_num_rows($result)>0) {
                if(!empty($_POST['indTest'])) {
                    $indTest = $_POST['indTest'];
                }else {
                    $sql = "SELECT individual_test FROM eng WHERE student_name='$stdName' ";
                    $result = mysqli_query($connect, $sql);
                    while($row=mysqli_fetch_assoc($result)) {
                        $indTest = $row['individual_test'];
                    }
                }
                if(!empty($_POST['classTest'])) {
                    $classTest = $_POST['classTest'];
                }else {
                    $sql = "SELECT class_test FROM eng WHERE student_name= '$stdName' ";
                    $result = mysqli_query($connect,$sql);
                    while($row=mysqli_fetch_assoc($result)) {
                        $classTest = $row['class_test'];
                    }
                }
                if(!empty($_POST['groupWork'])) {
                    $groupWork = $_POST['groupWork'];
                }else {
                    $sql = "SELECT group_work FROM eng WHERE student_name = '$stdName' ";
                    $result = mysqli_query($connect,$sql);
                    while($row=mysqli_fetch_assoc($result)){
                        $groupWork = $row['group_work'];
                    }
                }
                if(!empty($_POST['project'])) {
                    $project = $_POST['project'];
                }else {
                    $sql = "SELECT project FROM eng WHERE student_name = '$stdName' ";
                    $result= mysqli_query($connect, $sql);
                    while($row=mysqli_fetch_assoc($result)) {
                        $project = $row['project'];
                    }
                }

                $total60 = $indTest+$classTest+$groupWork+$project;
                $total50 = $total60*0.50;

                if(!empty($_POST['exams'])) {
                    $exams = $_POST['exams'];
                }else {
                    $sql = "SELECT exams FROM eng WHERE student_name = '$stdName' ";
                    $result = mysqli_query($connect, $sql);
                    while($row=mysqli_fetch_assoc($result)) {
                        $exams = $row['exams'];
                    }
                }

                $exams50 = $exams*0.50;
                $total100 = $total50+$exams50;

                if(!(empty($indTest)&empty($classTest)&empty($groupWork)&empty($project)&empty($exams))) {
                    $query = "UPDATE
                        eng
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
                        // echo "<h4 style='color:green;text-align:center'>$stdName's data has been Updated</h4>";
                        return header('location:./engp4.php');
                    }
                }
                else {
                    $query = "UPDATE
                        eng
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
                        // echo "<h4 style='color:green;text-align:center'>$stdName's data has been Updated</h4>";
                        return header('location:./engp4.php');
                    }
                }
            } else {
                // echo "<h4 style='color:red;text-align:center'>$stdName does not exist</h4>";
                // echo "<h4 style='color:red;text-align:center'>Add student before you can edit</h4>";
                return header('location:./engp4.php');
            }
        }
?>