<?php
    if(isset($_POST['submit'])) {
        $stdName = $_POST['stdName'];
        $indTest = $_POST['indTest'];
        $classTest = $_POST['classTest'];
        $groupWork = $_POST['groupWork'];
        $project = $_POST['project'];
        $total60 = $indTest+$classTest+$groupWork+$project;
        $total50 = ($indTest+$classTest+$groupWork+$project) * 0.50;
        $exams = $_POST['exams'];
        $exams50 = $exams * 0.50;
        $total100 = $total50+$exams50; 
        
        $query = "INSERT INTO science(
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
            echo "<h4 style='color:green;text-align:center'>$stdName has been Added</h4>";
        }

    }

?>