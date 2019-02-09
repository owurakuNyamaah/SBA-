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
    <header class = 'header'>
        <a href = '../dashboard.php'>DASHBOARD</a>
        <a href = '../sba.php'>S.B.A</a>
        <a href = '../position.php'>POSITIONS</a>
    </header>

    <main>
        <h1>BDT Positions</h1>
        <div style = 'overflow-x: auto;'>
            <?php 
                $connect = mysqli_connect('localhost','root','','sba');
                $query = "SELECT student_name, total_100 FROM bdt ORDER BY total_100 DESC";
                $result = mysqli_query($connect, $query);

                if(mysqli_num_rows($result) > 0 ) {
                    // echo "<script>digitize = n => {
                    //                 if(n=0){string(n)}
                    //                 else if(n=1 || (n%10 && n%100 !=11)) {
                    //                     `${string(n)}st`
                    //                 }
                    //                 else if(n=2 || (n%10 && n%100 !=12)) {
                    //                     `${string(n)}nd`
                    //                 }
                    //                 else if(n=3 || (n%10 && n%100 !=13)) {
                    //                     `${string(n)}rd`
                    //                 }
                    //                 else {
                    //                     `${string(n)}th`
                    //                 }
                    //             }
                    //     </script>"
                    echo "<table>
                            <tr>
                                <th>STUDENT NAME</th>
                                <th>TOTAL 100%</th>
                                <th>POSITION</th>
                            </tr>";
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>$row[student_name]</td>
                                <td>$row[total_100]</td>
                                <td id='position'></td>
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