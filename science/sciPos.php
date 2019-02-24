<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>bdt position</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../subject.css" />
    <script src="main.js"></script>
</head>
<body>
    <div class = 'header'>
        <a href = '../index.php'>HOME</a>
        <a href = '../sba.php'>SBA</a>
        <a href = '../position.php'>POSITIONS</a>
        <a href = '../report.php'>REPORTS</a>
    </div>

    <main>
        <h1>Integrated Science Positions</h1>
        <div style = 'overflow-x: auto;'>
            <?php 
                $connect = mysqli_connect('localhost','root','','sba');
                $query = "SELECT 
                            student_name,
                            total_100,
                            @curRank := IF(@prev = total_100,@curRank,@add) AS position,
                            @prev := total_100,
                            @add := @add + 1
                        FROM 
                            science,
                            (SELECT @curRank := 0, @prev := NULL, @add := 1) r
                        ORDER BY 
                            total_100
                        DESC";
                $result = mysqli_query($connect, $query);

                if(mysqli_num_rows($result) > 0 ) {
                    echo "<table>
                            <tr>
                                <th>STUDENT NAME</th>
                                <th>TOTAL 100%</th>
                                <th>POSITION</th>
                            </tr>";
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>$row[student_name]</td>
                                <td style='text-align:center;'>$row[total_100]</td>
                                <td style= 'color:red;text-align:center;'>";
                                $n = $row['position'];
                                if($n==1 || ($n%10==1 && $n%100 !=11)){echo $n.'<sup>st</sup>';}
                                else if($n==2 || ($n%10==2 && $n%100 !=12)) {echo $n.'<sup>nd</sup>';}
                                else if($n==3 || ($n%10==3 && $n%100 !=13)) {echo $n.'<sup>rd</sup>';}
                                else {echo $n.'<sup>th</sup>';}
                        echo    "</td>
                            </tr>";
                    }
                    echo "</table>";                     
                }
                else {
                    echo "<table>
                            <tr>
                                <th>STUDENT NAME</th>
                                <th>TOTAL 100%</th>
                            </tr>
                        </table>";
                    echo "<h1 style='padding:50px'>No student added</h1>";
                }

                mysqli_close($connect);
            
            ?>
        </div>
    </main>
          
</body>
</html>