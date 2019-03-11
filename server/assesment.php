<?php
        $query ="SELECT
        eng.student_name
    FROM
        eng
    INNER JOIN science ON eng.student_name = science.student_name
    INNER JOIN maths ON maths.student_name = eng.student_name
    INNER JOIN social ON eng.student_name = social.student_name
    INNER JOIN rme ON eng.student_name = rme.student_name
    INNER JOIN ict ON eng.student_name = ict.student_name
    INNER JOIN bdt ON eng.student_name = bdt.student_name
    INNER JOIN gh ON eng.student_name = gh.student_name
    INNER JOIN french ON eng.student_name = french.student_name
    WHERE
        (
            eng.total_100 + science.total_100 + maths.total_100 + social.total_100 + rme.total_100 + ict.total_100 + 
            bdt.total_100 + gh.total_100 + french.total_100
        ) =(
        SELECT
            MAX(
                eng.total_100 + science.total_100 + maths.total_100 + social.total_100 + rme.total_100 + ict.total_100 + 
                bdt.total_100 + gh.total_100 + french.total_100
            )
        FROM
            eng
        INNER JOIN science ON eng.student_name = science.student_name
        INNER JOIN maths ON maths.student_name = eng.student_name
        INNER JOIN social ON eng.student_name = social.student_name
        INNER JOIN rme ON eng.student_name = rme.student_name
        INNER JOIN ict ON eng.student_name = ict.student_name
        INNER JOIN bdt ON eng.student_name = bdt.student_name
        INNER JOIN gh ON eng.student_name = gh.student_name
        INNER JOIN french ON eng.student_name = french.student_name
    )";
        $result = mysqli_query($connect, $query);
        echo "<h3 style='text-align:center;'>OVERALL BEST STUDENT IS  "; 
        while($row=mysqli_fetch_assoc($result)){echo $row['student_name'];}
        echo "</h3>"
?>

    <div class='perform'>
        <div class='row'>
        <div class = 'col-1'>
        <h3>ENGLISH</h3>
        <ul style='list-style-type:square'>
        <?php
        $sql1 = "SELECT ROUND(MAX(exams),1) AS exams FROM eng";
        $result1 = mysqli_query($connect, $sql1); 
        echo "<li>Exams Highest score = "; while($row=mysqli_fetch_assoc($result1)){echo $row['exams'];}
        echo "</li>";

        $sql2 = "SELECT ROUND(MIN(exams),1) AS exams FROM eng";
        $result2 = mysqli_query($connect, $sql2); 
        echo "<li>Exams Lowest score = "; while($row=mysqli_fetch_assoc($result2)){echo $row['exams'];}
        echo "</li>";

        $sql3 = "SELECT COUNT(total_100) AS pass FROM eng WHERE total_100 >= 40 ";
        $result3 = mysqli_query($connect, $sql3); 
        echo "<li>Number of students who passed = "; while($row=mysqli_fetch_assoc($result3)){echo $row['pass'];}
        echo "</li>";

        $sql4 = "SELECT COUNT(total_100) AS failed FROM eng WHERE total_100 <= 40 ";
        $result4 = mysqli_query($connect, $sql4); 
        echo "<li>Number of students who failed = "; while($row=mysqli_fetch_assoc($result4)){echo $row['failed'];}
        echo "</li>";

        $sql5 = "SELECT student_name FROM eng WHERE total_100 = (SELECT MAX(total_100) FROM eng)  ";
        $result5 = mysqli_query($connect, $sql5); 
        echo "<li>Best Student is "; while($row=mysqli_fetch_assoc($result5)){echo $row['student_name'];}
        echo "</li>";

        ?>
        </ul>


        <h3>MATHEMATICS</h3>
        <ul>
        <?php 
        $sql1 = "SELECT ROUND(MAX(exams),1) AS exams FROM maths";
        $result1 = mysqli_query($connect, $sql1); 
        echo "<li>Exams Highest score = "; while($row=mysqli_fetch_assoc($result1)){echo $row['exams'];}
        echo "</li>";

        $sql2 = "SELECT ROUND(MIN(exams),1) AS exams FROM maths";
        $result2 = mysqli_query($connect, $sql2); 
        echo "<li>Exams Lowest score = "; while($row=mysqli_fetch_assoc($result2)){echo $row['exams'];}
        echo "</li>";

        $sql3 = "SELECT COUNT(total_100) AS pass FROM maths WHERE total_100 >= 40 ";
        $result3 = mysqli_query($connect, $sql3); 
        echo "<li>Number of students who passed = "; while($row=mysqli_fetch_assoc($result3)){echo $row['pass'];}
        echo "</li>";

        $sql4 = "SELECT COUNT(total_100) AS failed FROM maths WHERE total_100 <= 40 ";
        $result4 = mysqli_query($connect, $sql4); 
        echo "<li>Number of students who failed = "; while($row=mysqli_fetch_assoc($result4)){echo $row['failed'];}
        echo "</li>";

        $sql5 = "SELECT student_name FROM maths WHERE total_100 = (SELECT MAX(total_100) FROM maths)  ";
        $result5 = mysqli_query($connect, $sql5); 
        echo "<li>Best Student is "; while($row=mysqli_fetch_assoc($result5)){echo $row['student_name'];}
        echo "</li>";
        ?>
        </ul>

        <h3>INTEGRATED SCIENCE</h3>
        <ul>
        <?php 
        $sql1 = "SELECT ROUND(MAX(exams),1) AS exams FROM science";
        $result1 = mysqli_query($connect, $sql1); 
        echo "<li>Exams Highest score = "; while($row=mysqli_fetch_assoc($result1)){echo $row['exams'];}
        echo "</li>";

        $sql2 = "SELECT ROUND(MIN(exams),1) AS exams FROM science";
        $result2 = mysqli_query($connect, $sql2); 
        echo "<li>Exams Lowest score = "; while($row=mysqli_fetch_assoc($result2)){echo $row['exams'];}
        echo "</li>";

        $sql3 = "SELECT COUNT(total_100) AS pass FROM science WHERE total_100 >= 40 ";
        $result3 = mysqli_query($connect, $sql3); 
        echo "<li>Number of students who passed = "; while($row=mysqli_fetch_assoc($result3)){echo $row['pass'];}
        echo "</li>";

        $sql4 = "SELECT COUNT(total_100) AS failed FROM science WHERE total_100 <= 40 ";
        $result4 = mysqli_query($connect, $sql4); 
        echo "<li>Number of students who failed = "; while($row=mysqli_fetch_assoc($result4)){echo $row['failed'];}
        echo "</li>";

        $sql5 = "SELECT student_name FROM science WHERE total_100 = (SELECT MAX(total_100) FROM science)  ";
        $result5 = mysqli_query($connect, $sql5); 
        echo "<li>Best Student is "; while($row=mysqli_fetch_assoc($result5)){echo $row['student_name'];}
        echo "</li>";
        ?>
        </ul>

        <h3>SOCIAL STUDIES</h3>
        <ul>
        <?php 
        $sql1 = "SELECT ROUND(MAX(exams),1) AS exams FROM social";
        $result1 = mysqli_query($connect, $sql1); 
        echo "<li>Exams Highest score = "; while($row=mysqli_fetch_assoc($result1)){echo $row['exams'];}
        echo "</li>";

        $sql2 = "SELECT ROUND(MIN(exams),1) AS exams FROM social";
        $result2 = mysqli_query($connect, $sql2); 
        echo "<li>Exams Lowest score = "; while($row=mysqli_fetch_assoc($result2)){echo $row['exams'];}
        echo "</li>";

        $sql3 = "SELECT COUNT(total_100) AS pass FROM social WHERE total_100 >= 40 ";
        $result3 = mysqli_query($connect, $sql3); 
        echo "<li>Number of students who passed = "; while($row=mysqli_fetch_assoc($result3)){echo $row['pass'];}
        echo "</li>";

        $sql4 = "SELECT COUNT(total_100) AS failed FROM social WHERE total_100 <= 40 ";
        $result4 = mysqli_query($connect, $sql4); 
        echo "<li>Number of students who failed = "; while($row=mysqli_fetch_assoc($result4)){echo $row['failed'];}
        echo "</li>";

        $sql5 = "SELECT student_name FROM social WHERE total_100 = (SELECT MAX(total_100) FROM social)  ";
        $result5 = mysqli_query($connect, $sql5); 
        echo "<li>Best Student is "; while($row=mysqli_fetch_assoc($result5)){echo $row['student_name'];}
        echo "</li>";
        ?>
        </ul>

        <h3>GHANAIAN LANGUAGE</h3>
        <ul>
        <?php 
        $sql1 = "SELECT ROUND(MAX(exams),1) AS exams FROM gh";
        $result1 = mysqli_query($connect, $sql1); 
        echo "<li>Exams Highest score = "; while($row=mysqli_fetch_assoc($result1)){echo $row['exams'];}
        echo "</li>";

        $sql2 = "SELECT ROUND(MIN(exams),1) AS exams FROM gh";
        $result2 = mysqli_query($connect, $sql2); 
        echo "<li>Exams Lowest score = "; while($row=mysqli_fetch_assoc($result2)){echo $row['exams'];}
        echo "</li>";

        $sql3 = "SELECT COUNT(total_100) AS pass FROM gh WHERE total_100 >= 40 ";
        $result3 = mysqli_query($connect, $sql3); 
        echo "<li>Number of students who passed = "; while($row=mysqli_fetch_assoc($result3)){echo $row['pass'];}
        echo "</li>";

        $sql4 = "SELECT COUNT(total_100) AS failed FROM gh WHERE total_100 <= 40 ";
        $result4 = mysqli_query($connect, $sql4); 
        echo "<li>Number of students who failed = "; while($row=mysqli_fetch_assoc($result4)){echo $row['failed'];}
        echo "</li>";

        $sql5 = "SELECT student_name FROM gh WHERE total_100 = (SELECT MAX(total_100) FROM gh)  ";
        $result5 = mysqli_query($connect, $sql5); 
        echo "<li>Best Student is "; while($row=mysqli_fetch_assoc($result5)){echo $row['student_name'];}
        echo "</li>";
        ?>
        </ul>

        </div>

        <div class = 'col-2'>
        <h3>INFORMATION AND COMMUNICATION TECHNOLOGY</h3>
        <ul>
        <?php 
        $sql1 = "SELECT ROUND(MAX(exams),1) AS exams FROM ict";
        $result1 = mysqli_query($connect, $sql1); 
        echo "<li>Exams Highest score = "; while($row=mysqli_fetch_assoc($result1)){echo $row['exams'];}
        echo "</li>";

        $sql2 = "SELECT ROUND(MIN(exams),1) AS exams FROM social";
        $result2 = mysqli_query($connect, $sql2); 
        echo "<li>Exams Lowest score = "; while($row=mysqli_fetch_assoc($result2)){echo $row['exams'];}
        echo "</li>";

        $sql3 = "SELECT COUNT(total_100) AS pass FROM ict WHERE total_100 >= 40 ";
        $result3 = mysqli_query($connect, $sql3); 
        echo "<li>Number of students who passed = "; while($row=mysqli_fetch_assoc($result3)){echo $row['pass'];}
        echo "</li>";

        $sql4 = "SELECT COUNT(total_100) AS failed FROM ict WHERE total_100 <= 40 ";
        $result4 = mysqli_query($connect, $sql4); 
        echo "<li>Number of students who failed = "; while($row=mysqli_fetch_assoc($result4)){echo $row['failed'];}
        echo "</li>";

        $sql5 = "SELECT student_name FROM ict WHERE total_100 = (SELECT MAX(total_100) FROM ict)  ";
        $result5 = mysqli_query($connect, $sql5); 
        echo "<li>Best Student is "; while($row=mysqli_fetch_assoc($result5)){echo $row['student_name'];}
        echo "</li>";
        ?>
        </ul>

        <h3>RELIGIOUS AND MORAL EDUCATION</h3>
        <ul>
        <?php 
        $sql1 = "SELECT ROUND(MAX(exams),1) AS exams FROM rme";
        $result1 = mysqli_query($connect, $sql1); 
        echo "<li>Exams Highest score = "; while($row=mysqli_fetch_assoc($result1)){echo $row['exams'];}
        echo "</li>";

        $sql2 = "SELECT ROUND(MIN(exams),1) AS exams FROM rme";
        $result2 = mysqli_query($connect, $sql2); 
        echo "<li>Exams Lowest score = "; while($row=mysqli_fetch_assoc($result2)){echo $row['exams'];}
        echo "</li>";

        $sql3 = "SELECT COUNT(total_100) AS pass FROM rme WHERE total_100 >= 40 ";
        $result3 = mysqli_query($connect, $sql3); 
        echo "<li>Number of students who passed = "; while($row=mysqli_fetch_assoc($result3)){echo $row['pass'];}
        echo "</li>";

        $sql4 = "SELECT COUNT(total_100) AS failed FROM rme WHERE total_100 <= 40 ";
        $result4 = mysqli_query($connect, $sql4); 
        echo "<li>Number of students who failed = "; while($row=mysqli_fetch_assoc($result4)){echo $row['failed'];}
        echo "</li>";

        $sql5 = "SELECT student_name FROM rme WHERE total_100 = (SELECT MAX(total_100) FROM rme)  ";
        $result5 = mysqli_query($connect, $sql5); 
        echo "<li>Best Student is "; while($row=mysqli_fetch_assoc($result5)){echo $row['student_name'];}
        echo "</li>";
        ?>
        </ul>

        <h3>BDT</h3>
        <ul>
        <?php 
        $sql1 = "SELECT ROUND(MAX(exams),1) AS exams FROM bdt";
        $result1 = mysqli_query($connect, $sql1); 
        echo "<li>Exams Highest score = "; while($row=mysqli_fetch_assoc($result1)){echo $row['exams'];}
        echo "</li>";

        $sql2 = "SELECT ROUND(MIN(exams),1) AS exams FROM bdt";
        $result2 = mysqli_query($connect, $sql2); 
        echo "<li>Exams Lowest score = "; while($row=mysqli_fetch_assoc($result2)){echo $row['exams'];}
        echo "</li>";

        $sql3 = "SELECT COUNT(total_100) AS pass FROM bdt WHERE total_100 >= 40 ";
        $result3 = mysqli_query($connect, $sql3); 
        echo "<li>Number of students who passed = "; while($row=mysqli_fetch_assoc($result3)){echo $row['pass'];}
        echo "</li>";

        $sql4 = "SELECT COUNT(total_100) AS failed FROM bdt WHERE total_100 <= 40 ";
        $result4 = mysqli_query($connect, $sql4); 
        echo "<li>Number of students who failed = "; while($row=mysqli_fetch_assoc($result4)){echo $row['failed'];}
        echo "</li>";

        $sql5 = "SELECT student_name FROM bdt WHERE total_100 = (SELECT MAX(total_100) FROM bdt)  ";
        $result5 = mysqli_query($connect, $sql5); 
        echo "<li>Best Student is "; while($row=mysqli_fetch_assoc($result5)){echo $row['student_name'];}
        echo "</li>";
        ?>
        </ul>

        <h3>FRENCH</h3>
        <ul>
        <?php 
        $sql1 = "SELECT ROUND(MAX(exams),1) AS exams FROM french";
        $result1 = mysqli_query($connect, $sql1); 
        echo "<li>Exams Highest score = "; while($row=mysqli_fetch_assoc($result1)){echo $row['exams'];}
        echo "</li>";

        $sql2 = "SELECT ROUND(MIN(exams),1) AS exams FROM french";
        $result2 = mysqli_query($connect, $sql2); 
        echo "<li>Exams Lowest score = "; while($row=mysqli_fetch_assoc($result2)){echo $row['exams'];}
        echo "</li>";

        $sql3 = "SELECT COUNT(total_100) AS pass FROM french WHERE total_100 >= 40 ";
        $result3 = mysqli_query($connect, $sql3); 
        echo "<li>Number of students who passed = "; while($row=mysqli_fetch_assoc($result3)){echo $row['pass'];}
        echo "</li>";

        $sql4 = "SELECT COUNT(total_100) AS failed FROM french WHERE total_100 <= 40 ";
        $result4 = mysqli_query($connect, $sql4); 
        echo "<li>Number of students who failed = "; while($row=mysqli_fetch_assoc($result4)){echo $row['failed'];}
        echo "</li>";

        $sql5 = "SELECT student_name FROM french WHERE total_100 = (SELECT MAX(total_100) FROM french)  ";
        $result5 = mysqli_query($connect, $sql5); 
        echo "<li>Best Student is "; while($row=mysqli_fetch_assoc($result5)){echo $row['student_name'];}
        echo "</li>;
        </ul>"

?>