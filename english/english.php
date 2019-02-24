<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>English SBA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../subject.css" />
</head>
<body>
    <header class = 'header'>
        <a href = '../index.php'>HOME</a>
        <a href = '../sba.php'>SBA</a>
        <a href = '../position.php'>POSITIONS</a>
        <a href = '../report.php'>REPORTS</a>
    </header>
    
    <main>
        <h1>English Language S.B.A</h1>
        <form action = './engStd.php'><button class = 'std'>ADD student</button></form>
        <form action='engEdit.php'><button class= 'edit'>Edit</button></form>
        <form action='./engdel.php'><button class = 'del'>Delete</button></form>
        <div class = 'count'>
            <span>
            Number of Students =  <?php
                $connect = mysqli_connect('localhost','root','','sba');
                $sql = "SELECT COUNT(student_name) AS numStds FROM eng";
                $result = mysqli_query($connect, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    echo $row['numStds'];
                }
            ?>
            </span>
            <span>
                Average Score = <?php
                $sql = "SELECT ROUND(AVG(total_100),3) AS average FROM eng";  
                $result = mysqli_query($connect, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    echo $row['average'];
                }
            ?>
            </span>
            <span>
                <form method='post' action='english.php'>
                    Search Student:
                    <input type='search' name='stdSearch' required>
                    <button type ='submit' name='search'>Search</button>
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
                            CASE 
                                WHEN total_100 >= 80 THEN 'EXCELLENT' 
                                WHEN total_100 >= 70 THEN 'VERY GOOD' 
                                WHEN total_100 >= 60 THEN 'GOOD' 
                                WHEN total_100 >= 50 THEN 'CREDIT' 
                                WHEN total_100 >= 40 THEN 'PASS' 
                                ELSE 'FAIL'
                            END AS remarks
                            FROM
                                eng
                            WHERE
                                student_name = '$search' ";
                    $result = mysqli_query($connect, $sql);
                    if(mysqli_num_rows($result) > 0) {
                        echo "<table>
                                <tr>
                                    <th>NAME</th>
                                    <th>INDIVIDUAL TEST(15)</th>
                                    <th>CLASS TEST(15)</th>
                                    <th>GROUP WORK(15)</th>
                                    <th>PROJECT(15)</th>
                                    <th>TOTAL(60)</th>
                                    <th>TOTAL 50%</th>
                                    <th>EXAMS</th>
                                    <th>EXAMS 50%</th>
                                    <th>TOTAL 100%</th>
                                    <th>REMARKS</th>
                                </tr>";
                        while($row=mysqli_fetch_assoc($result)) {
                            echo "<tr>
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
                            echo "</table>";
                        } 
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
                END AS remarks
                FROM
                    `eng`";                

                $result = mysqli_query($connect, $query);
                
                if(mysqli_num_rows($result) > 0 ) {
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
                            </tr>";
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
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
                    echo "<h1 style='padding:50px;'>No Student Added</h1>";
                }
            }
    
            mysqli_close($connect);

            
            ?>
            
        </div>
    </main>

    
</body>
</html>