<?php 
        if(isset($_POST['submit'])) {  
            $stdName = $_POST['stdName'];
            if(!empty($_POST['indTest'])) {
                $indTest = $_POST['indTest'];
            }else {
                $query= "SELECT individual_test FROM science WHERE student_name='$stdName'";
                $result = mysqli_query($connect,$query);
                while($row=mysqli_fetch_assoc($result)) {
                    $indTest = $row['individual_test'];
                }
            }
            if(!empty($_POST['classTest'])) {
                $classTest = $_POST['classTest'];
            }else {
                $query= "SELECT class_test FROM science WHERE student_name='$stdName'";
                $result = mysqli_query($connect,$query);
                while($row=mysqli_fetch_assoc($result)) {
                    $classTest = $row['class_test'];
                }
            }

            if(!empty($_POST['groupWork'])) {
                $groupWork = $_POST['groupWork'];
            }else {
                $query= "SELECT group_work FROM science WHERE student_name='$stdName'";
                $result = mysqli_query($connect,$query);
                while($row=mysqli_fetch_assoc($result)) {
                    $groupWork = $row['group_work'];
                }
            }

            if(!empty($_POST['project'])) {
                $project = $_POST['project'];
            }else {
                $query= "SELECT project FROM science WHERE student_name='$stdName'";
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
                $query= "SELECT exams FROM science WHERE student_name='$stdName'";
                $result = mysqli_query($connect,$query);
                while($row=mysqli_fetch_assoc($result)) {
                    $exams = $row['exams'];
                }
            }
            $exams50 = $exams*0.50;
            $total100 = $total50+$exams50;
      
            if(!(empty($indTest)&empty($classTest)&empty($groupWork)&empty($project)&empty($exams))) {
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
            else {
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
        }

?>