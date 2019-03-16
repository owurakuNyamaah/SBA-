<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="subject.css" />
</head>
<style>
.jhs {
    margin:10px 15px;
}

.jhs form{
    background: #59253A;
    text-decoration: none;
    color: white;
    font-weight: bold;
    font-size: x-large;
    padding: 20px;
    width: 100%;
    height: 65px;
    display: block;
    opacity: 0.85;
    margin:50px 0;
}
.jhs form input {
    padding:15px;
}
.jhs form button {
    padding:10px;
}
@media (min-width:48em) {
    .jhs {
        margin:10px 200px;
    }
    .jhs form{
        font-size: xx-large;
        padding: 50px;
        text-align:center;
    }
}
    
</style>
<body>
    <header class = 'header'>
        <a href = './indexUser.php'>HOME</a>
        <a href = './sba/jhs1.php'>SBA</a>
        <a href = './reportUser.php'>REPORTS</a>
    </header>
    <h1 style='text-align:center;'>REPORTS</h1>

    <div class = 'jhs'>

        <form method='post' action='./report/jhs1.php'>
            <label><i>Search J.H.S Reports</i></label>
            <input type='text' name = 'stdName' class='inputR' placeholder='Enter Full Name' required>
            <button type='submit' name='submit' class= 'report'>F i n d</button>
        </form>

    </div>
</body>
</html>