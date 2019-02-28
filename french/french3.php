<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>JHS3 French SBA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../subject.css" />
</head>
<style>
    table,th,tr,td{border:2px solid black;border-collapse:collapse;}
</style>
<body>
    <header class = 'header'>
        <a href = '../index.php'>HOME</a>
        <a href = '../sba3.php'>SBA</a>
        <a href = '../report.php'>REPORTS</a>
    </header>

    
    <main>
        <h1>French SBA</h1>
        <form action = './freStd3.php'><button class = 'std'>ADD student</button></form>
        <form action = './freEdit3.php'><button class = 'edit'>Edit</button></form>
        <form action='./fredel3.php'><button class = 'del'>Delete</button></form>
        <div class = 'count'>
            <span>
               <?php 
                    $connect = mysqli_connect('localhost','root','','sba3');
                    $sql = "SELECT COUNT(student_name) AS numStd FROM french";
                    $result = mysqli_query($connect, $sql);
                    while($row=mysqli_fetch_assoc($result)) {
                        echo "Nummber of Students = $row[numStd]";
                    }
               ?> 
            </span>
            <span>
                <?php 
                    $sql = "SELECT ROUND(AVG(total_100),3) AS average FROM french";
                    $result = mysqli_query($connect, $sql);
                    while($row=mysqli_fetch_assoc($result)) {
                        echo "Average Score = $row[average]";
                    }
                ?>
            </span>
            <span>
                <form method = 'post' action = 'french.php'>
                    Search Student <input type = 'search' name='stdSearch' required/>
                    <button type='submit' name='search'>Search</button>
                </form>
            </span>
        </div>
        
        <div style = 'overflow-x:auto'>
            <?php 
                if(isset($_POST['search'])) {
                    $search = $_POST['stdSearch'];
                    $sql = "SELECT
                    student_name,
                    individual_test,
                    class_test,
                    group_work,
                    project,
                    total_60,
                    total_50,
                    exams,
                    exams_50,
                    total_100,
                    remarks,
                    position
                FROM
                    (
                    SELECT
                        student_name,
                        individual_test,
                        class_test,
                        group_work,
                        project,
                        total_60,
                        total_50,
                        exams,
                        exams_50,
                        total_100,
                    CASE WHEN total_100 >= 80 THEN 'EXCELLENT' 
                    WHEN total_100 >= 70 THEN 'VERY GOOD' 
                    WHEN total_100 >= 60 THEN 'GOOD' 
                    WHEN total_100 >= 50 THEN 'CREDIT' 
                    WHEN total_100 >= 40 THEN 'PASS' 
                    ELSE 'FAIL'
                END AS remarks,
                @curRank := IF(
                    @prev = total_100,
                    @curRank,
                    @incRank
                ) AS POSITION,
                @incRank := @incRank + 1,
                @prev := total_100
                FROM
                    french,
                    (
                    SELECT
                        @curRank := 0,
                        @prev := NULL,
                        @incRank := 1
                ) r
                ORDER BY
                    total_100
                DESC
                ) AS derived
                WHERE
                    student_name = '$search' ";
                    $result = mysqli_query($connect, $sql);
                    if(mysqli_num_rows($result) > 0 ) {
                        echo "<table>
                                <tr>
                                    <th>position</th>
                                    <th>NAME</th>
                                    <th>INDIVIDUAL TEST(15)</th>
                                    <th>CLASS TEST(15)</th>
                                    <th>GROUP WORK(15)</th>
                                    <th>PROJECT WORK(15)</th>
                                    <th>TOTAL(60)</th>
                                    <th>TOTAL 50%</th>
                                    <th>EXAMS</th>
                                    <th>EXAMS 50%</th>
                                    <th>TOTAL 100%</th>
                                    <th>REMARKS</th>
                                </tr>";
                        while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td style= 'color:red;text-align:center;'>";
                                $n = $row['position'];
                                if($n==1 || ($n%10==1 && $n%100 !=11)){echo $n.'<sup>st</sup>';}
                                else if($n==2 || ($n%10==2 && $n%100 !=12)) {echo $n.'<sup>nd</sup>';}
                                else if($n==3 || ($n%10==3 && $n%100 !=13)) {echo $n.'<sup>rd</sup>';}
                                else {echo $n.'<sup>th</sup>';}
                        echo  "</td>
                                <td>$row[student_name]</td>
                                    <td>$row[individual_test]</td>
                                    <td>$row[class_test]</td>
                                    <td>$row[group_work]</td>
                                    <td>$row[project]</td>
                                    <td>$row[total_60]</td>
                                    <td style='color:blue;'>$row[total_50]</td>
                                    <td>$row[exams]</td>
                                    <td style='color:blue;'>$row[exams_50]</td>
                                    <td style='color:red;'>$row[total_100]</td>
                                    <td>$row[remarks]</td>
                                </tr>";
                        }
                        echo "</table>";
                        }else {
                        echo "<table>
                            <tr>
                                <th>STUDENT NAME</th>
                                <th>INDIVIDUAL TEST(15)</th>
                                <th>CLASS TEST(15)</th>
                                <th>GROUP WORK(15)</th>
                                <th>PROJECT WORK(15)</th>
                                <th>TOTAL(60)</th>
                                <th>TOTAL 50%</th>
                                <th>EXAMS</th>
                                <th>EXAMS 50%</th>
                                <th>TOTAL 100%</th>
                                <th>REMARKS</th>
                            </tr>
                        </table>";
                        echo "<h1 style='padding:50px'>$search could not be found</h1>";
                    }
                }
                if(!isset($_POST['search'])) {
                    $query = "SELECT
                    student_name,
                    individual_test,
                    class_test,
                    group_work,
                    project,
                    total_60,
                    total_50,
                    exams,
                    exams_50,
                    total_100,
                    CASE 
                        WHEN total_100 >= 80 THEN 'EXCELLENT'
                        WHEN total_100 >= 70 THEN 'VERY GOOD' 
                        WHEN total_100 >= 60 THEN 'GOOD'
                        WHEN total_100 >= 50 THEN 'CREDIT' 
                        WHEN total_100 >= 40 THEN 'PASS'
                        ELSE 'FAIL'
                    END AS remarks,
                    @curRank := IF(
                                    @prev = total_100,
                                    @curRank,
                                    @incRank
                                ) AS position,
                                @incRank := @incRank + 1,
                                @prev := total_100
                            FROM
                                french,
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
                                <th>position</th>
                                <th>NAME</th>
                                <th>INDIVIDUAL TEST(15)</th>
                                <th>CLASS TEST(15)</th>
                                <th>GROUP WORK(15)</th>
                                <th>PROJECT WORK(15)</th>
                                <th>TOTAL(60)</th>
                                <th>TOTAL 50%</th>
                                <th>EXAMS</th>
                                <th>EXAMS 50%</th>
                                <th>TOTAL 100%</th>
                                <th>REMARKS</th>
                            </tr>";
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td style= 'color:red;text-align:center;'>";
                                $n = $row['position'];
                                if($n==1 || ($n%10==1 && $n%100 !=11)){echo $n.'<sup>st</sup>';}
                                else if($n==2 || ($n%10==2 && $n%100 !=12)) {echo $n.'<sup>nd</sup>';}
                                else if($n==3 || ($n%10==3 && $n%100 !=13)) {echo $n.'<sup>rd</sup>';}
                                else {echo $n.'<sup>th</sup>';}
                        echo  "</td>
                                <td>$row[student_name]</td>
                                <td>$row[individual_test]</td>
                                <td>$row[class_test]</td>
                                <td>$row[group_work]</td>
                                <td>$row[project]</td>
                                <td>$row[total_60]</td>
                                <td style='color:blue;'>$row[total_50]</td>
                                <td>$row[exams]</td>
                                <td style='color:blue;'>$row[exams_50]</td>
                                <td style='color:red;'>$row[total_100]</td>
                                <td>$row[remarks]</td>
                            </tr>";
                    }
                    echo "</table>";
                }else {
                    echo "<table>
                            <tr>
                                <th>NAME</th>
                                <th>INDIVIDUAL TEST(15)</th>
                                <th>CLASS TEST(15)</th>
                                <th>GROUP WORK(15)</th>
                                <th>PROJECT WORK(15)</th>
                                <th>TOTAL(60)</th>
                                <th>TOTAL 50%</th>
                                <th>EXAMS</th>
                                <th>EXAMS 50%</th>
                                <th>TOTAL 100%</th>
                                <th>REMARKS</th>
                            </tr>
                        </table>";
                    echo "<h1 style='padding:50px'>NO Student added</h1>";
                }
            }

            mysqli_close($connect);
            
            ?>

        </div>
    </main>
    
</body>
</html>