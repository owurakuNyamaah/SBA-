<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>P6 assesment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../sba.css" />
</head>
<body>
    <h5 style='text-align:center'>P 6</h5>


    <main>
        <?php 
        $connect = mysqli_connect('localhost','root','','p6sba'); 
        include('../server/assesmentp4-6.php');
        mysqli_close($connect);
        ?>
    </main>



    


    
</body>
</html>