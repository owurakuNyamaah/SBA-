<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>P6 RME SBA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../subject.css" />
    <script src="main.js"></script>
</head>
<style>
    table,th,tr,td{border:2px solid black;border-collapse:collapse;}
</style>
<body>
    <header class = 'header'>
        <a href = '../index.php'>HOME</a>
        <a href = '../sba/p6.php'>SBA</a>
        <a href = '../report.php'>REPORTS</a>
    </header>

    <main>
        <h1>Religious and Moral Education SBA</h1>
        <form action = './rmeStdp6.php'><button class = 'std'>ADD student</button></form>
        <form action = './rmeEditp6.php'><button class = 'edit'>Edit</button></form>
        <form action='./rmedelp6.php'><button class = 'del'>Delete</button></form>
        <div class = 'count'>
        Class = P 6
            <span>
               <?php 
                    $connect = mysqli_connect('localhost','root','','p6sba');
                    $sql = "SELECT COUNT(student_name) AS numStd FROM rme";
                    $result = mysqli_query($connect, $sql);
                    while($row=mysqli_fetch_assoc($result)) {
                        echo "No. of Students = $row[numStd]";
                    }
               ?> 
            </span>
            <span>
                <?php 
                    $sql = "SELECT ROUND(AVG(total_100),3) AS average FROM rme";
                    $result = mysqli_query($connect, $sql);
                    while($row=mysqli_fetch_assoc($result)) {
                        echo "Average Score = $row[average]";
                    }
                ?>
            </span>
            <span>
                <form method = 'post' action = 'rmep6.php'>
                    <input type = 'search' name='stdSearch' placeholder='Enter Full Name' required/>
                    <button type='submit' name='search'>Search</button>
                </form>
            </span>
        </div>
        <div style = 'overflow-x:auto'>
            <?php 

            include('../server/rme/Serv.php');
            mysqli_close($connect);
            
            ?>
        </div>
    </main>
    
</body>
</html>