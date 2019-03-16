<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../subject.css" />
    <style>
        body {color:green;}
        table,th,tr,td{border:2px solid green;border-collapse:collapse;}
        tr th {background:none;color:green;}
    </style>
</head>
<body>
    <header>
    <h2 style='text-align:center;'>KUNSU R/C JUNIOR HIGH SCHOOL</h2>
    <h3 style='text-align:center;'>P.O Box 53 Mankranso</h3>
    <h3 style='text-align:center;'>Motto: Obey And Be Free</h3>
    <h2 style='text-align:center;background:green;color:white;width:250px;margin:0 30%;'>TERMINAL REPORT</h2>
    </header>

    
    <?php 
    $connect = mysqli_connect('localhost','root','','sba');
    include('../server/report.php');

    mysqli_close($connect);

    ?>
    
</body>
</html>