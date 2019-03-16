<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>overall positions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../subject.css" />
</head>
<style>
    table,th,tr,td{border:2px solid black;border-collapse:collapse;}
    tr th {background:black;color:white;}
</style>
<body>
    
    <main>
        <h1>TOTAL SCORES </h1>

        <div style = 'overflow-x:auto'>
            <?php 
            $connect = mysqli_connect('localhost','root','','sba');

            include('../server/overall.php');

            mysqli_close($connect);

            
            ?>
            
        </div>
    </main>

    
</body>
</html>