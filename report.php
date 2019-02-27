<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>page tittle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="subject.css" />
</head>
<style>
.jhs {
    margin:100px 200px;
}
.jhs form{
    background: #59253A;
    text-decoration: none;
    color: white;
    font-weight: bold;
    font-size: xx-large;
    padding: 50px;
    width: 100%;
    height: 65px;
    display: block;
    text-align:center;
    opacity: 0.85;
    margin-top:50px;
}
.jhs form input {
    padding:15px;
}
.jhs form button {
    padding:10px;
}

</style>
<body>
    <header class = 'header'>
        <a href = './index.php'>HOME</a>
        <a href = './Jsba.php'>SBA</a>
        <a href = './report.php'>REPORTS</a>
    </header>
    <h1 style='text-align:center;'>REPORTS</h1>

    <div class = 'jhs'>
        <form method='post' action='j1report.php'>
            <label><i>Search JHS 1 Reports</i></label>
            <input type='text' name = 'stdName' class='inputR' placeholder='Enter Full Name' required>
            <button type='submit' name='submit' class= 'report'>F i n d</button>
        </form>

        <form method='post' action='j2report.php'>
            <label><i>Search JHS 2 Reports</i></label>
            <input type='text' name = 'stdName' class='inputR' placeholder='Enter Full Name' required>
            <button type='submit' name='submit' class= 'report'>F i n d</button>
        </form>

        <form method = 'post' action = 'j3report.php'>
            <label><i>Search JHS 3 Reports</i></label>
            <input type='text' name = 'stdName' class='inputR' placeholder='Enter Full Name' required>
            <button type='submit' name='submit' class= 'report'>F i n d</button>
        </form>
    </div>
</body>
</html>