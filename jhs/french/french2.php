<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>JHS2 French SBA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../subject.css" />
</head>
<style>
    table,th,tr,td{border:2px solid black;border-collapse:collapse;}
</style>
<body>
    <header class = 'header'>
        <a href = '../index.php'>HOME</a>
        <a href = '../sba/jhs2.php'>SBA</a>
        <a href = '../report.php'>REPORTS</a>
    </header>

    <main>
        <h1>French SBA</h1>
        <form action = './freStd2.php'><button class = 'std'>ADD student</button></form>
        <!-- <form action = './freEdit2.php'><button class = 'edit'>Edit</button></form> -->
        <form action='./fredel2.php'><button class = 'del'>Delete</button></form>
        <div class = 'count'>
        Class = JHS 2
            <span>
               <?php 
                    $connect = mysqli_connect('localhost','root','','sba2');
                    $sql = "SELECT COUNT(student_name) AS numStd FROM french";
                    $result = mysqli_query($connect, $sql);
                    while($row=mysqli_fetch_assoc($result)) {
                        echo "No. of Students = $row[numStd]";
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
                <form method = 'post' action = 'french2.php'>
                    <input type = 'search' name='stdSearch' placeholder='Enter Full Name' />
                    <button type='submit' name='search'>Search</button>
                    <button type='reload'>Reset</button>
                </form>
            </span>
        </div>
        
        <div style = 'overflow-x:auto'>
            <?php 
            include('../server/french/Serv2.php');

            mysqli_close($connect);
            
            ?>

        </div>
    </main>
    
</body>
</html>