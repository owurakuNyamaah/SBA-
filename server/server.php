<?php 
session_start();
//Register
$connect = mysqli_connect('localhost','root','','multilevel');
$name = $email = $password = $confirmPass = $nameErr = $emailErr = $passError = $pass = $unknown ='';
if(isset($_POST['register'])) {
    $name = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPass = $_POST['confirmPass'];
    

    if($password === $confirmPass) {
        $pass = md5($password);
        $sql = "INSERT INTO  user(username,email,password) VALUES ('$name','$email','$pass')";
        mysqli_query($connect, $sql);

        $_SESSION['username'] = $name;
        $_SESSION['success'] = 'welcome ';
        header('location: indexUser.php');
        
    }
    else{
        $passError = "<span style='color:red;padding-left:20px'>*Password do not match</span>";
    }

};

//login user
if(isset($_POST['signin'])) {
    $name = $_POST['user'];
    $pass = md5($_POST['pass']);
    $query = "SELECT * FROM user WHERE username = '$name' AND password = '$pass' ";
    $result = mysqli_query($connect, $query);

    if(mysqli_num_rows($result) == 1) {
        while($row = mysqli_fetch_assoc($result)) {
            $_SESSION['username'] = $name;
            $_SESSION['success'] = 'welcome  ';
            if($row['username']==$name && $row['password']==$pass && $row['type']=='admin'){
                header('location: index.php');
            }
            elseif($row['username']==$name && $row['password']==$pass && $row['type']=='user') {
                header('location: indexUser.php');
            }

        }
    }else {
        $unknown = "<span style='color:red;padding-left:30px'>*Invalid username/password</span>";
    }


}



mysqli_close($connect);







?>