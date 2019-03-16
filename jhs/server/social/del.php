<?php 
        if(isset($_POST['submit'])) {
            $stdName = $_POST['stdName'];

            $query = "DELETE FROM social WHERE student_name='$stdName'";
            $result = mysqli_query($connect, $query);
            if($result) {
                echo "<h4 style='color:red; text-align:center'>$stdName Has Been Deleted</h4>";
            }else {
                mysqli_error($connect);
            }
        }
        if(isset($_POST['alldel'])) {

            $query = "DELETE FROM social";
            $result = mysqli_query($connect, $query);
            if($result) {
                echo  "<h4 style='color:red; text-align:center'>ALL Records Deleted</h4>";
            }
        }

?>