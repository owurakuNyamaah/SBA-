<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../subject.css" />
    <script src="main.js"></script>
</head>
<body>
    <header class = 'header'>
            <a href = '../index.php'>HOME</a>
            <a href = '../sba.php'>SBA</a>
            <a href = '../position.php'>POSITIONS</a>
    </header>
    
    <main>
        <h1>Social Studies SBA</h1>
        <form action = './socStd.php'><button class = 'std'>ADD student</button></form>
        <form action = './socEdit.php'><button class = 'edit'>Edit</button></form>
        <form action='./socdel.php'><button class = 'del'>Delete</button></form>
        <div class = 'count'>
            <span>
            <?php 
                 $connect = mysqli_connect('localhost','root','','sba');
                 $sql = "SELECT COUNT(student_name) AS numStd FROM social";
                 $result = mysqli_query($connect, $sql);
                 while($row = mysqli_fetch_assoc($result)) {
                     echo "Number of Student = $row[numStd]";
                 }
            ?>
            </span>
            <span>
            <?php 
                $sql = "SELECT ROUND(AVG(total_100), 3) AS average FROM social";
                $result = mysqli_query($connect, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    echo "Average Score = $row[average]";
                }
            ?>
            </span>
            <span>
                <form method='post' action='social.php'>
                    Search Student : <input type='search' name='stdSearch'/>
                    <button type='submit' name='search'>Search</button>
                </form>
            </span>
        </div>
        <div style='overflow-x:auto'>
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
                        `social`
                    WHERE student_name = '$search' ";
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
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>$row[student_name]</td>
                                    <td>$row[individual_test]</td>
                                    <td>$row[class_test]</td>
                                    <td>$row[group_work]</td>
                                    <td>$row[project]</td>
                                    <td>$row[total_60]</td>
                                    <td>$row[total_50]</td>
                                    <td>$row[exams]</td>
                                    <td>$row[exams_50]</td>
                                    <td>$row[total_100]</td>
                                    <td>$row[remarks]</td>
                                </tr>";
                        }
                        echo "</table>";
                    }else {
                        echo "<table>
                                <tr>
                                    <th>NAME</th>
                                    <th>INDIVIDUAL TEST</th>
                                    <th>CLASS TEST</th>
                                    <th>GROUP WORK</th>
                                    <th>PROJECT</th>
                                    <th>TOTAL(60)</th>
                                    <th>TOTAL 50%</th>
                                    <th>EXAMS</th>
                                    <th>EXAMS 50%</th>
                                    <th>TOTAL 100%</th>
                                    <th>REMARKS</th>
                                </tr>
                                </table>";
                        echo "<h1 style='padding:50px'>Search not found</h1>";
                    }
                }
                if(!isset($_POST['search'])) {
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
                        social";
                    $result = mysqli_query($connect, $sql);
                    if(mysqli_num_rows($result) > 0) {
                        echo "<table>
                                <tr>
                                    <th>NAME</th>
                                    <th>INDIVIDUAL TEST</th>
                                    <th>CLASS TEST</th>
                                    <th>GROUP WORK</th>
                                    <th>PROJECT</th>
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
                                    <td>$row[total_50]</td>
                                    <td>$row[exams]</td>
                                    <td>$row[exams_50]</td>
                                    <td>$row[total_100]</td>
                                    <td>$row[remarks]</td>
                                </tr>";
                        }
                        echo "</table>";
                    }else {
                        echo "<table>
                                <tr>
                                    <th>NAME</th>
                                    <th>INDIVIDUAL TEST</th>
                                    <th>CLASS TEST</th>
                                    <th>GROUP WORK</th>
                                    <th>PROJECT</th>
                                    <th>TOTAL(60)</th>
                                    <th>TOTAL 50%</th>
                                    <th>EXAMS</th>
                                    <th>EXAMS 50%</th>
                                    <th>TOTAL 100%</th>
                                    <th>REMARKS</th>
                                </tr>";
                        echo "<h1 style='padding:50px'>ZERO student added</h1>";
                    }

                }
                ?>
        
        </div>

    </main>
    
</body>
</html>