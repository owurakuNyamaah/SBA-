<?php 
    if(isset($_POST['submit'])) {
        $stdName = $_POST['stdName'];
        if(!empty($_POST['indTest'])) {
            $indTest = $_POST['indTest'];
        }else {
            $indTest = 0;
        }
        if(!empty($_POST['classTest'])) {
            $classTest = $_POST['classTest'];
        }else {
            $classTest = 0;
        }
        if(!empty($_POST['groupWork'])) {
            $groupWork = $_POST['groupWork'];
        }else {
            $groupWork = 0;
        }
        if(!empty($_POST['project'])) {
            $project = $_POST['project'];
        }else {
            $project = 0;
        }
        $total60 = $indTest+$classTest+$groupWork+$project;
        $total50 = ($indTest+$classTest+$groupWork+$project) * 0.50;
        if(!empty($_POST['exams'])) {
            $exams = $_POST['exams'];
        }else {
            $exams = 0;
        }
        $exams50 = $exams * 0.50;
        $total100 = $total50+$exams50; 

        $query = "INSERT INTO citizen (student_name,individual_test,class_test,group_work,project,total_60,total_50,exams,exams_50,total_100) 
        VALUES ('$stdName', $indTest, $classTest, $groupWork, $project, $total60, $total50, $exams, $exams50, $total100)";
        $result = mysqli_query($connect, $query);
        if($result) {
            echo "<h4 style='color:green;text-align:center'>$stdName has been Added</h4>";
        }
    }
?>