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
<body>
    <header class = 'header'>
        <a href = './index.php'>HOME</a>
        <a href = './sba.php'>SBA</a>
        <a href = './position.php'>POSITIONS</a>
    </header>
    
    <main>
        <h1>TOTAL SCORES </h1>

        <div style = 'overflow-x:auto'>
            <?php 
                $connect = mysqli_connect('localhost','root','','sba');
                $query = 
                "SELECT
                    eng.student_name,
                    eng.total_100 AS ENGLISH,
                    science.total_100 AS SCIENCE,
                    maths.total_100 AS MATHS,
                    social.total_100 AS SOCIAL,
                    ict.total_100 AS ICT,
                    bdt.total_100 AS BDT,
                    rme.total_100 AS RME,
                    gh.total_100 AS GH,
                    french.total_100 AS FRENCH,
                    (eng.total_100 + science.total_100 + maths.total_100 + social.total_100 + ict.total_100 + 
                    bdt.total_100 + rme.total_100 + gh.total_100 + french.total_100) AS TOTAL
                FROM
                    eng
                LEFT JOIN science ON eng.student_name = science.student_name
                LEFT JOIN maths ON eng.student_name = maths.student_name
                LEFT JOIN social ON eng.student_name = social.student_name
                LEFT JOIN ict ON eng.student_name = ict.student_name
                LEFT JOIN bdt ON eng.student_name = bdt.student_name
                LEFT JOIN rme ON eng.student_name = rme.student_name
                LEFT JOIN gh ON eng.student_name = gh.student_name
                LEFT JOIN french ON eng.student_name = french.student_name
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
                            </tr>";
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>$row[student_name]</td>
                                <td>$row[ENGLISH]</td>
                                <td>$row[SCIENCE]</td>
                                <td>$row[MATHS]</td>
                                <td>$row[SOCIAL]</td>
                                <td>$row[ICT]</td>
                                <td>$row[BDT]</td>
                                <td>$row[RME]</td>
                                <td>$row[GH]</td>
                                <td>$row[FRENCH]</td>
                                <td>$row[TOTAL]</td>
                            </tr>" ;        
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
                            </tr>
                            <tr>
                                <td>ZERO students added</td>
                            </tr>
                        </table>";
                }

            mysqli_close($connect);
            
            ?>
            
        </div>
    </main>

    
</body>
</html>