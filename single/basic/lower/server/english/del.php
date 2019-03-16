<?php
        if(isset($_POST['submit'])) {
            $stdName = $_POST['stdName'];

            $query = "DELETE FROM eng WHERE student_name='$stdName'";
            $result = mysqli_query($connect, $query);
            if($result) {
                echo "<h4 style='color:red; text-align:center'>$stdName  Deleted</h6>";
            }
        }

        if(isset($_POST['alldel'])) {

            $query = "DELETE FROM eng";
            $result = mysqli_query($connect, $query);
            if($result) {
                echo  "<h4 style='color:red; text-align:center'>ALL Records Deleted</h4>";
            }
        }
?>