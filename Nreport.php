<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>page tittle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="subject.css" />
</head>
<body>
    <header class = 'header'>
        <a href = './index.php'>HOME</a>
        <a href = './sba.php'>SBA</a>
        <a href = './report.php'>REPORTS</a>
    </header>
    <main>
        <h2>KUNSU ROMAN CATHOLIC BASIC SCHOOL</h2>
        <h3>P.O Box 53 Mankranso</h3>
        <h3>Motto: Obey And Be Free</h3>
        <h2>TERMINAL REPORT</h3>

        <?php 
            $connect = mysqli_connect('localhost','root','','sba');
            $sql = "SELECT 
            eng.student_name AS STUDENT
        FROM
            eng
        INNER JOIN science ON eng.student_name = science.student_name
        INNER JOIN maths ON maths.student_name = eng.student_name
        INNER JOIN social ON eng.student_name = social.student_name
        INNER JOIN rme ON eng.student_name = rme.student_name
        INNER JOIN bdt ON eng.student_name = bdt.student_name
        INNER JOIN ict ON eng.student_name = ict.student_name
        INNER JOIN gh ON eng.student_name = gh.student_name
        INNER JOIN french ON eng.student_name = french.student_name"; 

            $result = mysqli_query($connect, $sql);
            if(mysqli_num_rows($result) > 0) {
            
            while($row=mysqli_fetch_assoc) {
                echo $row['STUDENT'] ;
            }
        }

        ?>
    <main>    
    
</body>
</html>