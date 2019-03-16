<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>JHS1 Social SBA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../subject.css" />
</head>
<style>
    table,th,tr,td{border:2px solid black;border-collapse:collapse;}
</style>
<body>

    <main>
        <h1>Social Studies SBA</h1>
        <div class = 'count'>
        Class = JHS 1
            <span>
               <?php 
                    $connect = mysqli_connect('localhost','root','','sba');
                    $sql = "SELECT COUNT(student_name) AS numStd FROM social";
                    $result = mysqli_query($connect, $sql);
                    while($row=mysqli_fetch_assoc($result)) {
                        echo "No. of Students = $row[numStd]";
                    }
               ?> 
            </span>
            <span>
                <?php 
                    $sql = "SELECT ROUND(AVG(total_100),3) AS average FROM social";
                    $result = mysqli_query($connect, $sql);
                    while($row=mysqli_fetch_assoc($result)) {
                        echo "Average Score = $row[average]";
                    }
                ?>
            </span>
            <span>
                <form method = 'post' action = 'socialUser.php'>
                    <input type = 'search' name='stdSearch' placeholder='Enter Full Name' required/>
                    <button type='submit' name='search'>Search</button>
                </form>
            </span>
        </div>
        <div style='overflow-x:auto'>
                <?php 
                include('../server/social/Serv.php');
                mysqli_close($connect);
                ?>
        
        </div>

    </main>
    
</body>
</html>