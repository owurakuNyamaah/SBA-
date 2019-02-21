<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="subject.css" />
    <script src="main.js"></script>
</head>
<body>
    <div class = 'header'>
        <a href = './index.php'>HOME</a>
        <a href = './sba.php'>SBA</a>
        <a href = './position.php'>POSITIONS</a>
        <a href = './report.php'>REPORTS</a>
    </div>
    <h1 style='text-align:center'>Terminal Report</h1>
    
    <form action='report.php' method='post' class='container'>
        <label>Full Name</label><br>
        <input name='stdName' type='text' class='inputR' Placeholder='Enter student name' required/>
        <button type='submit' name='submit' class='report'>SEARCH</button><hr>
    </form>
    
    <?php 
    $connect = mysqli_connect('localhost','root','','sba');
    if(isset($_POST['submit'])) {
        $std = $_POST['stdName'];
        $engC = "SELECT total_50 FROM eng WHERE student_name = '$std' ";
        $engE = "SELECT exams_50 FROM eng WHERE student_name = '$std' ";
        $engT = "SELECT total_100 FROM eng WHERE student_name = '$std' ";
        $engR = "SELECT CASE WHEN total_100 >=80 THEN 'EXCELLENT'
                    WHEN total_100 >= 70 THEN 'VERY GOOD' 
                    WHEN total_100 >= 60 THEN 'GOOD'
                    WHEN total_100 >= 50 THEN 'CREDIT' 
                    WHEN total_100 >= 40 THEN 'PASS'
                    ELSE 'FAIL'
                END AS remarks FROM `eng` WHERE student_name = '$std'";
        $resultC = mysqli_query($connect, $engC);
        $resultE = mysqli_query($connect, $engE);
        $resultT = mysqli_query($connect, $engT);
        $resultR = mysqli_query($connect, $engR);

        $sciC = "SELECT total_50 FROM science WHERE student_name = '$std' ";
        $sciE = "SELECT exams_50 FROM science WHERE student_name = '$std' ";
        $sciT = "SELECT total_100 FROM science WHERE student_name = '$std' ";
        $sciR = "SELECT CASE WHEN total_100 >=80 THEN 'EXCELLENT'
                    WHEN total_100 >= 70 THEN 'VERY GOOD' 
                    WHEN total_100 >= 60 THEN 'GOOD'
                    WHEN total_100 >= 50 THEN 'CREDIT' 
                    WHEN total_100 >= 40 THEN 'PASS'
                    ELSE 'FAIL'
                END AS remarks FROM `science` WHERE student_name = '$std'";
        $qsciC = mysqli_query($connect, $sciC);
        $qsciE = mysqli_query($connect, $sciE);
        $qsciT = mysqli_query($connect, $sciT);
        $qsciR = mysqli_query($connect, $sciR);

        $mathsC = "SELECT total_50 FROM maths WHERE student_name = '$std' ";
        $mathsE = "SELECT exams_50 FROM maths WHERE student_name = '$std' ";
        $mathsT = "SELECT total_100 FROM maths WHERE student_name = '$std' ";
        $mathsR = "SELECT CASE WHEN total_100 >=80 THEN 'EXCELLENT'
                    WHEN total_100 >= 70 THEN 'VERY GOOD' 
                    WHEN total_100 >= 60 THEN 'GOOD'
                    WHEN total_100 >= 50 THEN 'CREDIT' 
                    WHEN total_100 >= 40 THEN 'PASS'
                    ELSE 'FAIL'
                END AS remarks FROM `maths` WHERE student_name = '$std'";
        $qmathsC = mysqli_query($connect, $mathsC);
        $qmathsE = mysqli_query($connect, $mathsE);
        $qmathsT = mysqli_query($connect, $mathsT);
        $qmathsR = mysqli_query($connect, $mathsR);


        $socC = "SELECT total_50 FROM social WHERE student_name = '$std' ";
        $socE = "SELECT exams_50 FROM social WHERE student_name = '$std' ";
        $socT = "SELECT total_100 FROM social WHERE student_name = '$std' ";
        $socR = "SELECT CASE WHEN total_100 >=80 THEN 'EXCELLENT'
                    WHEN total_100 >= 70 THEN 'VERY GOOD' 
                    WHEN total_100 >= 60 THEN 'GOOD'
                    WHEN total_100 >= 50 THEN 'CREDIT' 
                    WHEN total_100 >= 40 THEN 'PASS'
                    ELSE 'FAIL'
                END AS remarks FROM `social` WHERE student_name = '$std'";
        $qsocC = mysqli_query($connect, $socC);
        $qsocE = mysqli_query($connect, $socE);
        $qsocT = mysqli_query($connect, $socT);
        $qsocR = mysqli_query($connect, $socR);

        $ictC = "SELECT total_50 FROM ict WHERE student_name = '$std' ";
        $ictE = "SELECT exams_50 FROM ict WHERE student_name = '$std' ";
        $ictT = "SELECT total_100 FROM ict WHERE student_name = '$std' ";
        $ictR = "SELECT CASE WHEN total_100 >= 80 THEN 'EXCELLENT' 
                            WHEN total_100 >= 70 THEN 'VERY GOOD' 
                            WHEN total_100 >= 60 THEN 'GOOD' 
                            WHEN total_100 >= 50 THEN 'CREDIT'
                            WHEN total_100 >= 40 THEN 'PASS' 
                            ELSE 'FAIL' 
                            END AS remarks FROM ict WHERE student_name = '$std' ";
        $qictC = mysqli_query($connect, $ictC);
        $qictE = mysqli_query($connect, $ictE);
        $qictT = mysqli_query($connect, $ictT);
        $qictR = mysqli_query($connect, $ictR);

        $bdtC = "SELECT total_50 FROM bdt WHERE student_name = '$std' ";
        $bdtE = "SELECT exams_50 FROM bdt WHERE student_name = '$std' ";
        $bdtT = "SELECT total_100 FROM bdt WHERE student_name = '$std' ";
        $bdtR = "SELECT CASE WHEN total_100 >= 80 THEN 'EXCELLENT' 
                            WHEN total_100 >= 70 THEN 'VERY GOOD' 
                            WHEN total_100 >= 60 THEN 'GOOD' 
                            WHEN total_100 >= 50 THEN 'CREDIT'
                            WHEN total_100 >= 40 THEN 'PASS' 
                            ELSE 'FAIL' 
                            END AS remarks FROM bdt WHERE student_name = '$std' ";
        $qbdtC = mysqli_query($connect, $bdtC);
        $qbdtE = mysqli_query($connect, $bdtE);
        $qbdtT = mysqli_query($connect, $bdtT);
        $qbdtR = mysqli_query($connect, $bdtR);

        $rmeC = "SELECT total_50 FROM rme WHERE student_name = '$std' ";
        $rmeE = "SELECT exams_50 FROM rme WHERE student_name = '$std' ";
        $rmeT = "SELECT total_100 FROM rme WHERE student_name = '$std' ";
        $rmeR = "SELECT CASE WHEN total_100 >= 80 THEN 'EXCELLENT' 
                            WHEN total_100 >= 70 THEN 'VERY GOOD' 
                            WHEN total_100 >= 60 THEN 'GOOD' 
                            WHEN total_100 >= 50 THEN 'CREDIT'
                            WHEN total_100 >= 40 THEN 'PASS' 
                            ELSE 'FAIL' 
                            END AS remarks FROM rme WHERE student_name = '$std' ";
        $qrmeC = mysqli_query($connect, $rmeC);
        $qrmeE = mysqli_query($connect, $rmeE);
        $qrmeT = mysqli_query($connect, $rmeT);
        $qrmeR = mysqli_query($connect, $rmeR);

        $ghC = "SELECT total_50 FROM gh WHERE student_name = '$std' ";
        $ghE = "SELECT exams_50 FROM gh WHERE student_name = '$std' ";
        $ghT = "SELECT total_100 FROM gh WHERE student_name = '$std' ";
        $ghR = "SELECT CASE WHEN total_100 >= 80 THEN 'EXCELLENT' 
                            WHEN total_100 >= 70 THEN 'VERY GOOD' 
                            WHEN total_100 >= 60 THEN 'GOOD' 
                            WHEN total_100 >= 50 THEN 'CREDIT'
                            WHEN total_100 >= 40 THEN 'PASS' 
                            ELSE 'FAIL' 
                            END AS remarks FROM gh WHERE student_name = '$std' ";
        $qghC = mysqli_query($connect, $ghC);
        $qghE = mysqli_query($connect, $ghE);
        $qghT = mysqli_query($connect, $ghT);
        $qghR = mysqli_query($connect, $ghR);

        $freC = "SELECT total_50 FROM french WHERE student_name = '$std' ";
        $freE = "SELECT exams_50 FROM french WHERE student_name = '$std' ";
        $freT = "SELECT total_100 FROM french WHERE student_name = '$std' ";
        $freR = "SELECT CASE WHEN total_100 >= 80 THEN 'EXCELLENT' 
                            WHEN total_100 >= 70 THEN 'VERY GOOD' 
                            WHEN total_100 >= 60 THEN 'GOOD' 
                            WHEN total_100 >= 50 THEN 'CREDIT'
                            WHEN total_100 >= 40 THEN 'PASS' 
                            ELSE 'FAIL' 
                            END AS remarks FROM french WHERE student_name = '$std' ";
        $qfreC = mysqli_query($connect, $freC);
        $qfreE = mysqli_query($connect, $freE);
        $qfreT = mysqli_query($connect, $freT);
        $qfreR = mysqli_query($connect, $freR);

        $sum = "SELECT (eng.total_100+science.total_100+maths.total_100+social.total_100+rme.total_100+
        ict.total_100+gh.total_100+french.total_100) AS total FROM eng INNER JOIN science ON eng.student_name=science.student_name
        INNER JOIN maths ON maths.student_name=eng.student_name INNER JOIN social ON eng.student_name=social.student_name 
        INNER JOIN rme ON eng.student_name=rme.student_name INNER JOIN ict ON eng.student_name=ict.student_name INNER JOIN gh 
        ON eng.student_name=gh.student_name INNER JOIN french ON eng.student_name=french.student_name WHERE 
        eng.student_name='$std' ";
        $query = mysqli_query($connect, $sum);


        if(mysqli_num_rows($resultC) > 0 ||mysqli_num_rows($qsciC)>0 ||mysqli_num_rows($qmathsC)>0 ||mysqli_num_rows($qsocC)>0) {
            echo "<h1>$std</h1>";
            echo "<table>
            <tr>
                <th>SUBJECT</th>
                <th>CLASS SCORE</th>
                <th>EXAMS</th>
                <th>TOTAL</th>
                <th>REMARKS</th>
            </tr>";
    
            echo "<tr>
                <td>ENGLISH LANGUAGE</td>
                <td>";        
                while($row = mysqli_fetch_assoc($resultC)) {echo $row['total_50'];}
            echo "</td>
                <td>";
                while($row = mysqli_fetch_assoc($resultE)) {echo $row['exams_50'];}
            echo  "</td>
                <td>";
                while($row = mysqli_fetch_assoc($resultT)) {echo $row['total_100'];}
            echo "</td>
                <td>";
                while($row = mysqli_fetch_assoc($resultR)) {echo $row['remarks'];}
            echo "</td>
                </tr>";    
                
            echo "<tr>
            <td>INTEGRATED SCIENCE</td>
            <td>";        
            while($row = mysqli_fetch_assoc($qsciC)) {echo $row['total_50'];}
            echo "</td>
                <td>";
                while($row = mysqli_fetch_assoc($qsciE)) {echo $row['exams_50'];}
            echo  "</td>
                <td>";
                while($row = mysqli_fetch_assoc($qsciT)) {echo $row['total_100'];}
            echo "</td>
                <td>";
                while($row = mysqli_fetch_assoc($qsciR)) {echo $row['remarks'];}
            echo "</td>
                </tr>";     

                
            echo "<tr>
            <td>MATHEMATICS</td>
            <td>";        
            while($row = mysqli_fetch_assoc($qmathsC)) {echo $row['total_50'];}
            echo "</td>
                <td>";
                while($row = mysqli_fetch_assoc($qmathsE)) {echo $row['exams_50'];}
            echo  "</td>
                <td>";
                while($row = mysqli_fetch_assoc($qmathsT)) {echo $row['total_100'];}
            echo "</td>
                <td>";
                while($row = mysqli_fetch_assoc($qmathsR)) {echo $row['remarks'];}
            echo "</td>
                </tr>"; 
           
                
            echo "<tr>
            <td>SOCIAL STUDIES</td>
            <td>";        
            while($row = mysqli_fetch_assoc($qsocC)) {echo $row['total_50'];}
            echo "</td>
                <td>";
                while($row = mysqli_fetch_assoc($qsocE)) {echo $row['exams_50'];}
            echo  "</td>
                <td>";
                while($row = mysqli_fetch_assoc($qsocT)) {echo $row['total_100'];}
            echo "</td>
                <td>";
                while($row = mysqli_fetch_assoc($qsocR)) {echo $row['remarks'];}
            echo "</td>
                </tr>"; 
                
            echo "<tr>
                <td>ICT</td>
                <td>";
                while($row=mysqli_fetch_assoc($qictC)) {echo $row['total_50'];} 
            echo "</td>
                <td>";
                while($row=mysqli_fetch_assoc($qictE)) {echo $row['exams_50'];}
            echo "</td>
                <td>";
                while($row=mysqli_fetch_assoc($qictT)) {echo $row['total_100'];}
            echo "</td>
                <td>";
                while($row=mysqli_fetch_assoc($qictR)) {echo $row['remarks'];}
            echo "</td>
                </tr>";

            echo "<tr>
                <td>BDT</td>
                    <td>";
                    while($row=mysqli_fetch_assoc($qbdtC)) {echo $row['total_50'];} 
            echo "</td>
                <td>";
                while($row=mysqli_fetch_assoc($qbdtE)) {echo $row['exams_50'];}
            echo "</td>
                <td>";
                while($row=mysqli_fetch_assoc($qbdtT)) {echo $row['total_100'];}
            echo "</td>
                <td>";
                while($row=mysqli_fetch_assoc($qbdtR)) {echo $row['remarks'];}
            echo "</td>
                </tr>";

            echo "<tr>
                    <td>RME</td>
                    <td>";
                    while($row=mysqli_fetch_assoc($qrmeC)) {echo $row['total_50'];}
                echo "</td>
                    <td>";
                    while($row=mysqli_fetch_assoc($qrmeE)) {echo $row['exams_50'];}
                echo "</td>
                    <td>";
                    while($row=mysqli_fetch_assoc($qrmeT)) {echo $row['total_100'];}
                echo "</td>
                    <td>";
                    while($row=mysqli_fetch_assoc($qrmeR)) {echo $row['remarks'];}
                echo "</td>
                </tr>";

                echo "<tr>
                <td>GHANAIAN LANGUAGE</td>
                <td>";
                while($row=mysqli_fetch_assoc($qghC)) {echo $row['total_50'];}
                echo "</td>
                <td>";
                while($row=mysqli_fetch_assoc($qghE)) {echo $row['exams_50'];}
                echo "</td>
                <td>";
                while($row=mysqli_fetch_assoc($qghT)) {echo $row['total_100'];}
                echo "</td>
                <td>";
                while($row=mysqli_fetch_assoc($qghR)) {echo $row['remarks'];}
                echo "</td>
                </tr>";

                echo "<tr>
                <td>FRENCH</td>
                <td>";
                while($row=mysqli_fetch_assoc($qfreC)) {echo $row['total_50'];}
                echo "</td>
                <td>";
                while($row=mysqli_fetch_assoc($qfreE)) {echo $row['exams_50'];}
                echo "</td>
                <td>";
                while($row=mysqli_fetch_assoc($qfreT)) {echo $row['total_100'];}
                echo "</td>
                <td>";
                while($row=mysqli_fetch_assoc($qfreR)) {echo $row['remarks'];}
                echo "</td>
                </tr>";

                echo "<tr>
                    <td>TOTAL</td>
                    <td></td>
                    <td></td>
                    <td>";
                    while($row=mysqli_fetch_assoc($query)) {echo $row['total'];}
                echo "<td>";

            echo "</table>";

        }
        else{echo "<h1 style='padding:50px'>Student cannot be found</h1>";}



    }


    ?>
    
</body>
</html>