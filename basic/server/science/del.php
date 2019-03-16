<?php 
        if(isset($_POST['submit'])) {
            $stdName = $_POST['stdName'];

            $query = "DELETE FROM science WHERE student_name='$stdName'";
            $result = mysqli_query($connect, $query);
            if($result) {
                echo  "<h4 style='color:red; text-align:center'>$stdName has been Deleted</h4>";
            }
        }
        if(isset($_POST['alldel'])) {

            $query = "DELETE FROM science";
            $result = mysqli_query($connect, $query);
            if($result) {
                echo  "<h4 style='color:red; text-align:center'>ALL Records Deleted</h4>";
            }
        }

?>