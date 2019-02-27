<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="subject.css" />
    <script src="EngStd.php"></script>
</head>
<style>
    table,th,tr,td{border:2px solid black;border-collapse:collapse;}
    tr th {background:black;color:white;}
</style>
<body>
    <header class = 'header'>
        <a href = './index.php'>HOME</a>
        <a href = './sba3.php'>SBA</a>
        <a href = './report.php'>REPORTS</a>
    </header>

    
    <main>
        <h1>TOTAL SCORES </h1>

        <div style = 'overflow-x:auto'>
            <?php 
                $connect = mysqli_connect('localhost','root','','sba3');
                
                $query = "SELECT
                *,
                @current := IF(@prev = TOTAL, @current, @add) AS POSITION,
                @prev := TOTAL,
                @add := @add +1
            FROM
                (
                SELECT
                    @current := 0,
                    @prev := NULL,
                    @add := 1
            ) r,
            (
                SELECT
                    *,
                    (
                        ENGLISH + SCIENCE + MATHS + SOCIAL + ICT + BDT + RME + GH + FRENCH
                    ) AS TOTAL
                FROM
                    (
                    SELECT
                        eng.student_name AS STUDENT,
                        eng.total_100 AS ENGLISH,
                        science.total_100 AS SCIENCE,
                        maths.total_100 AS MATHS,
                        social.total_100 AS SOCIAL,
                        ict.total_100 AS ICT,
                        bdt.total_100 AS BDT,
                        rme.total_100 AS RME,
                        gh.total_100 AS GH,
                        french.total_100 AS FRENCH
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
                ) AS DT
            GROUP BY
                STUDENT
            ) AS DERIVED
            ORDER BY
                TOTAL
            DESC";
                            
                $result = mysqli_query($connect, $query);
                
                if(mysqli_num_rows($result) > 0 ) {
                    echo "<table>
                            <tr>
                                <th>NAME</th>
                                <th>ENGLISH</th>
                                <th>SCIENCE</th>
                                <th>MATHS</th>
                                <th>SOCIAL</th>
                                <th>ICT</th>
                                <th>BDT</th>
                                <th>RME</th>
                                <th>GH</th>
                                <th>FRENCH</th>
                                <th>TOTAL</th>
                                <th>POSITION</th>
                            </tr>";
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>$row[STUDENT]</td>
                                <td>$row[ENGLISH]</td>
                                <td>$row[SCIENCE]</td>
                                <td>$row[MATHS]</td>
                                <td>$row[SOCIAL]</td>
                                <td>$row[ICT]</td>
                                <td>$row[BDT]</td>
                                <td>$row[RME]</td>
                                <td>$row[GH]</td>
                                <td>$row[FRENCH]</td>
                                <td style='color:blue;text-align:center;'>$row[TOTAL]</td>
                                <td style= 'color:red;text-align:center;'>";
                                $n = $row['POSITION'];
                                if($n==1 || ($n%10==1 && $n%100 !=11)){echo $n.'<sup>st</sup>';}
                                else if($n==2 || ($n%10==2 && $n%100 !=12)) {echo $n.'<sup>nd</sup>';}
                                else if($n==3 || ($n%10==3 && $n%100 !=13)) {echo $n.'<sup>rd</sup>';}
                                else {echo $n.'<sup>th</sup>';}
                        echo    "</td>
                            </tr>";
                    }
                    echo "</table>";
                    
                }else {
                    echo "<table>
                            <tr>
                                <th>NAME</th>
                                <th>ENGLISH</th>
                                <th>MATHS</th>
                                <th>SCIENCE</th>
                                <th>SOCIAL</th>
                                <th>GH</th>
                                <th>BDT</th>
                                <th>FRENCH</th>
                                <th>ICT</th>
                                <th>RME</th>
                                <th>TOTAL</th>
                                <th>POSITION</th>
                            </tr>
                        </table>";
                    echo "<h1 style='padding:50px'>SBA not complete</h1>";
                }

            mysqli_close($connect);
            
            ?>
            
        </div>
    </main>

    
</body>
</html>