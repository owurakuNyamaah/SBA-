<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="subject.css" />
    <style>
        body {color:green;}
        table,th,tr,td{border:2px solid green;border-collapse:collapse;}
        tr th {background:none;color:green;}
    </style>
</head>
<body>
    <header class = 'header'>
        <a href = './index.php'>HOME</a>
        <a href = './Jsba.php'>SBA</a>
        <a href = './report.php'>REPORTS</a>
    </header>
    <form action='report.php' method='post' class='container'>
        <label>Full Name</label>
        <input name='stdName' type='text' class='inputR' Placeholder="Enter student's name" required/>
        <button type='submit' name='submit' class='report'>SEARCH</button><hr>
    </form>
    <h2 style='text-align:center;'>KUNSU R/C JUNIOR HIGH SCHOOL</h2>
    <h3 style='text-align:center;'>P.O Box 53 Mankranso</h3>
    <h3 style='text-align:center;'>Motto: Obey And Be Free</h3>
    
    <h2 style='text-align:center;background:green;color:white;width:250px;margin:0 30%;'>TERMINAL REPORT</h2>

    
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
        $engP = "SELECT
                    student_name,
                    position
                FROM
                    (
                    SELECT
                        student_name,
                        total_100,
                        @curRank := IF(@prev = total_100, @curRank, @inc) AS position,
                        @prev := total_100,
                        @inc := @inc + 1
                    FROM
                        eng,
                        (
                        SELECT
                            @curRank := 0,
                            @prev := NULL,
                            @inc := 1
                    ) r
                ORDER BY total_100 DESC
                ) AS eg
                WHERE
                    student_name = '$std'";
    $resultC = mysqli_query($connect, $engC);
        $resultE = mysqli_query($connect, $engE);
        $resultT = mysqli_query($connect, $engT);
        $resultR = mysqli_query($connect, $engR);
        $resultP = mysqli_query($connect, $engP);

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
        $sciP = "SELECT 
                    student_name,
                    position
                FROM (SELECT 
                    student_name,
                    total_100,
                    @current := IF(@prev = total_100,@current,@add) AS position,
                    @prev := total_100,
                    @add := @add + 1
                FROM science,(SELECT @current:=0, @prev=NULL, @add:=1) r
                ORDER BY total_100 DESC) AS sci
                WHERE student_name = '$std' ";
        $qsciC = mysqli_query($connect, $sciC);
        $qsciE = mysqli_query($connect, $sciE);
        $qsciT = mysqli_query($connect, $sciT);
        $qsciR = mysqli_query($connect, $sciR);
        $qsciP = mysqli_query($connect, $sciP);

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
        $mathsP = "SELECT student_name, position 
                    FROM (SELECT student_name,total_100,@current:=IF(@prev=total_100,@current,@add) AS position,
                    @prev:=total_100,@add:=@add+1 
                    FROM maths,(SELECT @current:=0,@prev:=NULL,@add:=1) r
                    ORDER BY total_100 DESC) AS mat
                    WHERE student_name='$std' ";
        $qmathsC = mysqli_query($connect, $mathsC);
        $qmathsE = mysqli_query($connect, $mathsE);
        $qmathsT = mysqli_query($connect, $mathsT);
        $qmathsR = mysqli_query($connect, $mathsR);
        $qmathsP =mysqli_query($connect, $mathsP);


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
        $socP = "SELECT student_name,position 
                FROM (SELECT student_name,total_100,@current:=IF(@prev=total_100,@current,@add) AS position,
                @prev:=total_100,@add:=@add+1
                FROM social,(SELECT @current:=0,@prev:=NULL,@add:=1) r
                ORDER BY total_100 DESC) AS soc
                WHERE student_name = '$std' ";
        $qsocC = mysqli_query($connect, $socC);
        $qsocE = mysqli_query($connect, $socE);
        $qsocT = mysqli_query($connect, $socT);
        $qsocR = mysqli_query($connect, $socR);
        $qsocP = mysqli_query($connect, $socP);

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
        $ictP = "SELECT student_name,position 
                FROM (SELECT student_name,total_100,@current:=IF(@prev=total_100,@current,@add) AS position,
                @prev:=total_100,@add:=@add+1
                FROM ict,(SELECT @current:=0,@prev:=NULL,@add:=1) r
                ORDER BY total_100 DESC) AS ict
                WHERE student_name='$std' ";
        $qictC = mysqli_query($connect, $ictC);
        $qictE = mysqli_query($connect, $ictE);
        $qictT = mysqli_query($connect, $ictT);
        $qictR = mysqli_query($connect, $ictR);
        $qictP = mysqli_query($connect, $ictP);


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
        $bdtP = "SELECT student_name,position 
                FROM (SELECT student_name,total_100,@current:=IF(@prev=total_100,@current,@add) AS position,
                @prev:=total_100,@add:=@add+1
                FROM bdt,(SELECT @current:=0,@prev:=NULL,@add:=1) r
                ORDER BY total_100 DESC) as bdt
                WHERE student_name='$std' ";
        $qbdtC = mysqli_query($connect, $bdtC);
        $qbdtE = mysqli_query($connect, $bdtE);
        $qbdtT = mysqli_query($connect, $bdtT);
        $qbdtR = mysqli_query($connect, $bdtR);
        $qbdtP = mysqli_query($connect, $bdtP);

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
        $rmeP = "SELECT student_name,position
                FROM (SELECT student_name,total_100,@current:=IF(@prev=total_100,@current,@add) AS position,
                @prev:=total_100,@add:=@add+1
                FROM rme,(SELECT @current:=0,@prev:=NULL,@add:=1) r
                ORDER BY total_100 DESC) AS rme
                WHERE student_name='$std' ";
        $qrmeC = mysqli_query($connect, $rmeC);
        $qrmeE = mysqli_query($connect, $rmeE);
        $qrmeT = mysqli_query($connect, $rmeT);
        $qrmeR = mysqli_query($connect, $rmeR);
        $qrmeP = mysqli_query($connect, $rmeP);

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
        $ghP = "SELECT student_name, position
                FROM (SELECT student_name,total_100,@current:=IF(@prev=total_100,@current,@add) AS position,
                @prev:=total_100,@add:=@add+1
                FROM gh,(SELECT @current:=0,@prev:=NULL,@add:=1) r
                ORDER BY total_100 DESC) AS gh
                WHERE student_name='$std' ";

        $qghC = mysqli_query($connect, $ghC);
        $qghE = mysqli_query($connect, $ghE);
        $qghT = mysqli_query($connect, $ghT);
        $qghR = mysqli_query($connect, $ghR);
        $qghP = mysqli_query($connect, $ghP);

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
        $freP = "SELECT student_name, position
                FROM (SELECT student_name,total_100,@current:=IF(@prev=total_100,@current,@add) AS position,
                @prev:=total_100,@add:=@add+1
                FROM french,(SELECT @current:=0,@prev:=NULL,@add:=1) r
                ORDER BY total_100 DESC) AS fre
                WHERE student_name='$std' ";
        $qfreC = mysqli_query($connect, $freC);
        $qfreE = mysqli_query($connect, $freE);
        $qfreT = mysqli_query($connect, $freT);
        $qfreR = mysqli_query($connect, $freR);
        $qfreP = mysqli_query($connect, $freP);

        $sum = "SELECT (eng.total_100+science.total_100+maths.total_100+social.total_100+rme.total_100+bdt.total_100+
        ict.total_100+gh.total_100+french.total_100) AS total FROM eng INNER JOIN science ON eng.student_name=science.student_name
        INNER JOIN maths ON maths.student_name=eng.student_name INNER JOIN social ON eng.student_name=social.student_name 
        INNER JOIN rme ON eng.student_name=rme.student_name INNER JOIN bdt on eng.student_name=bdt.student_name 
        INNER JOIN ict ON eng.student_name=ict.student_name INNER JOIN gh ON eng.student_name=gh.student_name 
        INNER JOIN french ON eng.student_name=french.student_name WHERE eng.student_name='$std' ";
        $query = mysqli_query($connect, $sum);

        $position = "SELECT POSITION FROM (
            SELECT STUDENT,TOTAL,@current := IF(@prev = TOTAL, @current, @add) AS POSITION,@prev := TOTAL,@add := @add +1
            FROM(
            SELECT @current := 0,@prev := NULL,@add := 1) r,(SELECT STUDENT,(ENGLISH + SCIENCE + MATHS + SOCIAL + ICT + 
                    BDT + RME + GH + FRENCH) AS TOTAL
            FROM(
            SELECT eng.student_name AS STUDENT,eng.total_100 AS ENGLISH,science.total_100 AS SCIENCE,
                    maths.total_100 AS MATHS,social.total_100 AS SOCIAL,ict.total_100 AS ICT,bdt.total_100 AS BDT,
                    rme.total_100 AS RME,gh.total_100 AS GH,french.total_100 AS FRENCH
            FROM
                `eng`
            INNER JOIN science ON eng.student_name = science.student_name
            INNER JOIN maths ON eng.student_name = maths.student_name
            INNER JOIN social ON eng.student_name = social.student_name
            INNER JOIN ict ON eng.student_name = ict.student_name
            INNER JOIN bdt ON eng.student_name = bdt.student_name
            INNER JOIN rme ON eng.student_name = rme.student_name
            INNER JOIN gh ON eng.student_name = gh.student_name
            INNER JOIN french ON eng.student_name = french.student_name
            ) AS derived_join
            GROUP BY
                STUDENT
            ) AS derived_total
            ORDER BY
                TOTAL
            DESC) AS derived_position WHERE STUDENT='$std' ";
            $qpos = mysqli_query($connect, $position);


        if(mysqli_num_rows($resultC) > 0 ||mysqli_num_rows($qsciC)>0 ||mysqli_num_rows($qmathsC)>0 ||mysqli_num_rows($qsocC)>0) {
            echo "<div class='reportHead'>
                    <p>Name of Student :<big style='color:blue;padding:0 20px'><b>$std</b></big>Year............................................</p>
                    <p>Class......................................................................Term.............................................</p>
                    <p>No. on Roll............................................................."; echo "Position :<big style='color:red;padding:0 15px;'><b>";
                    while($row=mysqli_fetch_assoc($qpos)){
                        $n = $row['POSITION'];
                        if($n==1 || ($n%10==1 && $n%100 !=11)){echo $n.'st';}
                        else if($n==2 || ($n%10==2 && $n%100 !=12)) {echo $n.'nd';}
                        else if($n==3 || ($n%10==3 && $n%100 !=13)) {echo $n.'rd';}
                        else {echo $n.'th';}
                    } echo "</b></big></p>
                    <p>Next Term Begins.......................................................Date.............................................</p>
                </div>";
            echo "<table>
            <tr>
                <th>SUBJECT</th>
                <th>CLASS SCORE 50%</th>
                <th>EXAMS SCORE 50%</th>
                <th>TOTAL 100%</th>
                <th>POSITION IN SUBJECT</th>
                <th>REMARKS</th>
            </tr>";
    
            echo "<tr>
                <td>English Language</td>
                <td style='color:blue;text-align:center;'>";        
                while($row = mysqli_fetch_assoc($resultC)) {echo $row['total_50'];}
            echo "</td>
                <td style='color:blue;text-align:center;'>";        
                while($row = mysqli_fetch_assoc($resultE)) {echo $row['exams_50'];}
            echo  "</td>
                <td style='color:red;text-align:center;'>";
                while($row = mysqli_fetch_assoc($resultT)) {echo $row['total_100'];}
            echo "</td>
                <td style='color:blue;text-align:center;'>";
                while($row = mysqli_fetch_assoc($resultP)) {
                    $n = $row['position'];
                    if($n==1 || ($n%10==1 && $n%100 !=11)){echo $n.'<sup>st</sup>';}
                    else if($n==2 || ($n%10==2 && $n%100 !=12)) {echo $n.'<sup>nd</sup>';}
                    else if($n==3 || ($n%10==3 && $n%100 !=13)) {echo $n.'<sup>rd</sup>';}
                    else {echo $n.'<sup>th</sup>';}
                }
            echo "</td>
                <td style='color:red;text-align:center;'>";
                while($row = mysqli_fetch_assoc($resultR)) {echo $row['remarks'];}
            echo "</td>
                </tr>";    
                
            echo "<tr>
                <td>Integrated Science</td>
                <td style='color:blue;text-align:center;'>";        
                while($row = mysqli_fetch_assoc($qsciC)) {echo $row['total_50'];}
            echo "</td>
                <td style='color:blue;text-align:center;'>";        
            while($row = mysqli_fetch_assoc($qsciE)) {echo $row['exams_50'];}
            echo  "</td>
                <td style='color:red;text-align:center;'>";
                while($row = mysqli_fetch_assoc($qsciT)) {echo $row['total_100'];}
            echo "</td>
                <td style='color:blue;text-align:center;'>";        
                while($row = mysqli_fetch_assoc($qsciP)) {
                    $n = $row['position'];
                    if($n==1 || ($n%10==1 && $n%100 !=11)){echo $n.'<sup>st</sup>';}
                    else if($n==2 || ($n%10==2 && $n%100 !=12)) {echo $n.'<sup>nd</sup>';}
                    else if($n==3 || ($n%10==3 && $n%100 !=13)) {echo $n.'<sup>rd</sup>';}
                    else {echo $n.'<sup>th</sup>';}
                }
            echo "</td>
                <td style='color:red;text-align:center;'>";
                while($row = mysqli_fetch_assoc($qsciR)) {echo $row['remarks'];}
            echo "</td>
                </tr>";     

                
            echo "<tr>
                <td>Mathematics</td>
                <td style='color:blue;text-align:center;'>";        
                while($row = mysqli_fetch_assoc($qmathsC)) {echo $row['total_50'];}
            echo "</td>
                <td style='color:blue;text-align:center;'>";        
                while($row = mysqli_fetch_assoc($qmathsE)) {echo $row['exams_50'];}
            echo  "</td>
                <td style='color:red;text-align:center;'>";
                while($row = mysqli_fetch_assoc($qmathsT)) {echo $row['total_100'];}
            echo "</td>
                <td style='color:blue;text-align:center;'>";        
                while($row = mysqli_fetch_assoc($qmathsP)) {
                    $n = $row['position'];
                    if($n==1 || ($n%10==1 && $n%100 !=11)){echo $n.'<sup>st</sup>';}
                    else if($n==2 || ($n%10==2 && $n%100 !=12)) {echo $n.'<sup>nd</sup>';}
                    else if($n==3 || ($n%10==3 && $n%100 !=13)) {echo $n.'<sup>rd</sup>';}
                    else {echo $n.'<sup>th</sup>';}
                }
            echo "</td>
                <td style='color:red;text-align:center;'>";
                while($row = mysqli_fetch_assoc($qmathsR)) {echo $row['remarks'];}
            echo "</td>
                </tr>"; 
           
                
            echo "<tr>
                <td>Social Studies</td>
                <td style='color:blue;text-align:center;'>";        
                while($row = mysqli_fetch_assoc($qsocC)) {echo $row['total_50'];}
            echo "</td>
                <td style='color:blue;text-align:center;'>";        
                while($row = mysqli_fetch_assoc($qsocE)) {echo $row['exams_50'];}
            echo  "</td>
                <td style='color:red;text-align:center;'>";
                while($row = mysqli_fetch_assoc($qsocT)) {echo $row['total_100'];}
            echo "</td>
                <td style='color:blue;text-align:center;'>";        
                while($row = mysqli_fetch_assoc($qsocP)) {
                    $n = $row['position'];
                    if($n==1 || ($n%10==1 && $n%100 !=11)){echo $n.'<sup>st</sup>';}
                    else if($n==2 || ($n%10==2 && $n%100 !=12)) {echo $n.'<sup>nd</sup>';}
                    else if($n==3 || ($n%10==3 && $n%100 !=13)) {echo $n.'<sup>rd</sup>';}
                    else {echo $n.'<sup>th</sup>';}
                }
            echo "</td>
                <td style='color:red;text-align:center;'>";
                while($row = mysqli_fetch_assoc($qsocR)) {echo $row['remarks'];}
            echo "</td>
                </tr>"; 
                
            echo "<tr>
                <td>Information & communication Technology</td>
                <td style='color:blue;text-align:center;'>";        
                while($row=mysqli_fetch_assoc($qictC)) {echo $row['total_50'];} 
            echo "</td>
                <td style='color:blue;text-align:center;'>";        
                while($row=mysqli_fetch_assoc($qictE)) {echo $row['exams_50'];}
            echo "</td>
                <td style='color:red;text-align:center;'>";
                while($row=mysqli_fetch_assoc($qictT)) {echo $row['total_100'];}
            echo "</td>
                <td style='color:blue;text-align:center;'>";        
                while($row=mysqli_fetch_assoc($qictP)) {
                    $n = $row['position'];
                    if($n==1 || ($n%10==1 && $n%100 !=11)){echo $n.'<sup>st</sup>';}
                    else if($n==2 || ($n%10==2 && $n%100 !=12)) {echo $n.'<sup>nd</sup>';}
                    else if($n==3 || ($n%10==3 && $n%100 !=13)) {echo $n.'<sup>rd</sup>';}
                    else {echo $n.'<sup>th</sup>';}
                }
            echo "</td>
                <td style='color:red;text-align:center;'>";
                while($row=mysqli_fetch_assoc($qictR)) {echo $row['remarks'];}
            echo "</td>
                </tr>";

            echo "<tr>
                <td>Basic Design & Technology</td>
                <td style='color:blue;text-align:center;'>";        
                while($row=mysqli_fetch_assoc($qbdtC)) {echo $row['total_50'];} 
            echo "</td>
                <td style='color:blue;text-align:center;'>";        
                while($row=mysqli_fetch_assoc($qbdtE)) {echo $row['exams_50'];}
            echo "</td>
                <td style='color:red;text-align:center;'>";
                while($row=mysqli_fetch_assoc($qbdtT)) {echo $row['total_100'];}
            echo "</td>
                <td style='color:blue;text-align:center;'>";        
                while($row=mysqli_fetch_assoc($qbdtP)) {
                    $n = $row['position'];
                    if($n==1 || ($n%10==1 && $n%100 !=11)){echo $n.'<sup>st</sup>';}
                    else if($n==2 || ($n%10==2 && $n%100 !=12)) {echo $n.'<sup>nd</sup>';}
                    else if($n==3 || ($n%10==3 && $n%100 !=13)) {echo $n.'<sup>rd</sup>';}
                    else {echo $n.'<sup>th</sup>';}
                }
            echo "</td>
                <td style='color:red;text-align:center;'>";
                while($row=mysqli_fetch_assoc($qbdtR)) {echo $row['remarks'];}
            echo "</td>
                </tr>";

            echo "<tr>
                    <td>Religious & Moral Education</td>
                    <td style='color:blue;text-align:center;'>";        
                    while($row=mysqli_fetch_assoc($qrmeC)) {echo $row['total_50'];}
                echo "</td>
                    <td style='color:blue;text-align:center;'>";        
                    while($row=mysqli_fetch_assoc($qrmeE)) {echo $row['exams_50'];}
                echo "</td>
                    <td style='color:red;text-align:center;'>";
                    while($row=mysqli_fetch_assoc($qrmeT)) {echo $row['total_100'];}
                echo "</td>
                    <td style='color:blue;text-align:center;'>";        
                    while($row=mysqli_fetch_assoc($qrmeP)) {
                        $n = $row['position'];
                        if($n==1 || ($n%10==1 && $n%100 !=11)){echo $n.'<sup>st</sup>';}
                        else if($n==2 || ($n%10==2 && $n%100 !=12)) {echo $n.'<sup>nd</sup>';}
                        else if($n==3 || ($n%10==3 && $n%100 !=13)) {echo $n.'<sup>rd</sup>';}
                        else {echo $n.'<sup>th</sup>';}    
                    }
                echo "</td>
                    <td style='color:red;text-align:center;'>";
                    while($row=mysqli_fetch_assoc($qrmeR)) {echo $row['remarks'];}
                echo "</td>
                </tr>";

                echo "<tr>
                    <td>Ghanaian Language</td>
                    <td style='color:blue;text-align:center;'>";        
                    while($row=mysqli_fetch_assoc($qghC)) {echo $row['total_50'];}
                echo "</td>
                    <td style='color:blue;text-align:center;'>";        
                    while($row=mysqli_fetch_assoc($qghE)) {echo $row['exams_50'];}
                echo "</td>
                    <td style='color:red;text-align:center;'>";
                    while($row=mysqli_fetch_assoc($qghT)) {echo $row['total_100'];}
                echo "</td>
                    <td style='color:blue;text-align:center;'>";        
                    while($row=mysqli_fetch_assoc($qghP)) {
                        $n = $row['position'];
                        if($n==1 || ($n%10==1 && $n%100 !=11)){echo $n.'<sup>st</sup>';}
                        else if($n==2 || ($n%10==2 && $n%100 !=12)) {echo $n.'<sup>nd</sup>';}
                        else if($n==3 || ($n%10==3 && $n%100 !=13)) {echo $n.'<sup>rd</sup>';}
                        else {echo $n.'<sup>th</sup>';}    
                    }   
                echo "</td>
                    <td style='color:red;text-align:center;'>";
                    while($row=mysqli_fetch_assoc($qghR)) {echo $row['remarks'];}
                echo "</td>
                </tr>";

                echo "<tr>
                    <td>French</td>
                    <td style='color:blue;text-align:center;'>";        
                    while($row=mysqli_fetch_assoc($qfreC)) {echo $row['total_50'];}
                echo "</td>
                    <td style='color:blue;text-align:center;'>";        
                    while($row=mysqli_fetch_assoc($qfreE)) {echo $row['exams_50'];}
                echo "</td>
                    <td style='color:red;text-align:center;'>";
                    while($row=mysqli_fetch_assoc($qfreT)) {echo $row['total_100'];}
                echo "</td>
                    <td style='color:blue;text-align:center;'>";        
                    while($row=mysqli_fetch_assoc($qfreP)) {
                        $n = $row['position'];
                        if($n==1 || ($n%10==1 && $n%100 !=11)){echo $n.'<sup>st</sup>';}
                        else if($n==2 || ($n%10==2 && $n%100 !=12)) {echo $n.'<sup>nd</sup>';}
                        else if($n==3 || ($n%10==3 && $n%100 !=13)) {echo $n.'<sup>rd</sup>';}
                        else {echo $n.'<sup>th</sup>';}    
                    }
                echo "</td>
                    <td style='color:red;text-align:center;'>";
                    while($row=mysqli_fetch_assoc($qfreR)) {echo $row['remarks'];}
                echo "</td>
                </tr>";

                echo "<tr>
                    <td>TOTAL</td>
                    <td></td>
                    <td></td>
                    <td style='color:red;text-align:center;'>";
                    while($row=mysqli_fetch_assoc($query)) {echo $row['total'];}
                echo "</td>
                    <td></td>
                    <td></td>";


            echo "</table>";

            echo "<div class='reportHead'>
                    <p>Attendance........................... Out of................................. Promoted to...............................................</p>
                    <p>Conduct..................................................................................................................................</p>
                    <p>Interest..................................................................................................................................</p>
                    <p>Class Teacher's Remark....................................................................................................................</p>
                    <p>Head's Remark.............................................................................................................................</p>
                    <p>.....................................................Signature.........................................................................</p>
                </div>
                <hr>
                <div class='marks'>
                    <span>80 and above   =    EXCELLENT</span>
                    <span>70 - 79        =    VERY GOOD</span>
                    <span>60 - 69        =    GOOD</span>
                    <span>50 - 59        =    CREDIT</span>
                    <span>40 - 49        =    PASS</span>
                    <span>Below 40       =    FAIL</span>
                </div>";

        }
        else{echo "<h1 style='padding:50px'>$std does not exist</h1>";}

    }

    mysqli_close($connect);

    ?>
    
</body>
</html>