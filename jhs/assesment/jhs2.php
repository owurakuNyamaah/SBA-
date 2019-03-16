<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>jhs2 assesment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../sba.css" />
    <script src="main.js"></script>
</head>
<body>
    <h5 style='text-align:center'>JHS 2</h5>


    <main>
        <?php 
        $connect = mysqli_connect('localhost','root','','sba2'); 
        include('../server/assesment.php');
        mysqli_close($connect);
        ?>
    </main>



    


    
</body>
</html>