<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Delete</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../student.css" />
</head>
<body>
    <h1 style='text-align:center'>Delete Student</h1>
    <form action = './social.php'><button class = 'std'>Return to SBA</button></form>

    <form action='socdel.php' method='post' class='container'>
        <label>Student Name</label><br>
        <input name='stdName' type='text' required><br>
        <button type='submit' name='submit' class='del'>Delete</button><hr>
    </form>

    <form action='socdel.php' method='post' class='container'>
    <label>click on the button below to delete All records</label><br>
    <button type='submit' name='alldel' class='alldel'>Delete All</button>
    </form>



    <?php
        $connect = mysqli_connect('localhost','root','','sba');

        if(isset($_POST['submit'])) {
            $stdName = $_POST['stdName'];

            $query = "DELETE FROM social WHERE student_name='$stdName'";
            $result = mysqli_query($connect, $query);
            if($result) {
                echo $stdName. 'deleted';
            }else {
                mysqli_error($connect);
            }
        }
        if(isset($_POST['alldel'])) {

            $query = "DELETE FROM social";
            $result = mysqli_query($connect, $query);
            if($result) {
                echo  "<h4 style='color:red; text-align:center'>ALL Records Deleted</h4>";
            }
        }

    ?>

</body>
</html>