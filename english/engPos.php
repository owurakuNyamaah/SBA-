<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>bdt position</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../subject.css"/>
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
        <h1>English Positions</h1>
        <div style = 'overflow-x: auto;'>
            <?php 
                $connect = mysqli_connect('localhost','root','','sba');
                $query =  " SELECT
                                student_name,
                                total_100,
                                @curRank := IF(
                                    @prev = total_100,
                                    @curRank,
                                    @incRank
                                ) AS position,
                                @incRank := @incRank + 1,
                                @prev := total_100
                            FROM
                                eng,
                                (
                                SELECT
                                    @curRank := 0,
                                    @prev := NULL,
                                    @incRank := 1
                            ) r
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
                                <td style='color:red;text-align:center;'>$row[position]</td>
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
                            <tr>
                                <td>NO Student added</td>
                            </tr>
                        </table>";
                }

                mysqli_close($connect);
            
            ?>
        </div>
    </main>
          
</body>
</html>