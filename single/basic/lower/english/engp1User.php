<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>English SBA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../subject.css" />
</head>
<style>
    table,th,tr,td{border:2px solid black;border-collapse:collapse;}
</style>
<body>

    <main>
        <h1>English Language S.B.A</h1>
        <div class = 'count'>
        Class......
            <span>
            <?php
                $connect = mysqli_connect('localhost','root','','p1sba');
                $sql = "SELECT COUNT(student_name) AS numStd FROM eng";
                $result = mysqli_query($connect, $sql);
                while($row=mysqli_fetch_assoc($result)) {
                    echo "No. of Students = $row[numStd]";
                }
           ?> 
        </span>
        <span>
            <?php 
                $sql = "SELECT ROUND(AVG(total_100),3) AS average FROM eng";
                $result = mysqli_query($connect, $sql);
                while($row=mysqli_fetch_assoc($result)) {
                    echo "Average Score = $row[average]";
                }
            ?>
        </span>
        <span>
                <form method = 'post' action = 'engp1User.php'>
                    <input type = 'search' name='stdSearch' placeholder='Enter Full Name' required/>
                    <button type='submit' name='search'>Search</button>
                </form>
            </span>

        </div>

        <div style = 'overflow-x:auto'>
            <?php 
                include('../server/english/Serv.php');
        ?>
        </div>
    </main>

    
</body>
</html>