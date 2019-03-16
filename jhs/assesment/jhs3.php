<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>jhs3 assesment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../sba.css" />
    <script src="main.js"></script>
</head>
<body>

    <main>
    <h5 style='text-align:center'>JHS 3</h5>
    <?php 
        $connect = mysqli_connect('localhost','root','','sba3'); 
        include('../server/assesment.php');
        mysqli_close($connect);
        ?>
    </main>



    


    
</body>
</html>