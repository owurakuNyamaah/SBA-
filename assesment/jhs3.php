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
    <header class = 'header'>
        <a href = '../index.php'>HOME</a>
        <a href = '../sba/jhs3.php'>SBA</a>
        <a href = '../report.php'>REPORTS</a>
    </header>
    <main>
    <?php 
        $connect = mysqli_connect('localhost','root','','sba3'); 
        include('../server/assesment.php');
        mysqli_close($connect);
        ?>
    </main>



    


    
</body>
</html>