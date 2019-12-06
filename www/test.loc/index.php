<?php
session_start();
require_once('language.php');
require_once('Classes/Users.php');

?>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title><?=$lang['main'];?></title>
</head>
<body>
    <div class="auth">
        <form action="#" class="formAuth" method="post">
            <label><b><?=$lang['login'];?></b></label>
            <div><input type="text" name="login" placeholder="<?=$lang['writeLogin'];?>" ></div>
            <div id="pswd_info_log">
                <h4><?=$lang['checkLogin'];?></h4>
                <ul>
                    <li id="Logletter"><?=$lang['LogLetter'];?></li>
                    <li id="Loglength"><?=$lang['LogLength'];?></li>
                </ul>
            </div>
            <label><b><?=$lang['Pass'];?></b></label>
            <div><input type="password" placeholder="<?=$lang['writePass'];?>" name="password" ></div>
            <div id="pswd_info">
                <h4><?=$lang['checkPass'];?></h4>
                <ul>
                    <li id="letter"><?=$lang['PassLetter'];?></li>
                    <li id="length"><?=$lang['LogLength'];?></li>
                </ul>
            </div>
            <div class="badAuth">Неверные данные!</div>
            <div><input type="" name="Auth" value="<?=$lang['signIn'];?>" id="signIn"></div>
            <div><a class="registration" href="registration.php?lang=<?=$_GET['lang'];?>"><?=$lang['registration'];?></a></div>
        </form>
        <a class="changeLang" href="<?=$url.'?lang='.$changeLang;?>"><?=$lang['language'];?>
        <img src="./images/<?=$changeLang;?>.png" width="16px" alt=""></a>
    </div>


    <script src="main.js"></script>
</body>

</html>

