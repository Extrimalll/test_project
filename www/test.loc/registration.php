<?php
require_once('language.php');
?>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title><?=$lang['reg'];?></title>
</head>
<body>
    <div class="auth">
        <form action="#" class="formAuth" method="post">
            <div class="pRegistr">
                <div class="fifty">
                    <label><b><?=$lang['regLogin'];?></b></label>
                    <div>
                        <input type="text" name="loginReg" placeholder="<?=$lang['writeLogin'];?>" >
                    </div>
                    <div id="pswd_info_log">
                        <h4><?=$lang['checkLogin'];?></h4>
                        <ul>
                            <li id="Logletter"><?=$lang['LogLetter'];?></li>
                            <li id="Loglength"><?=$lang['LogLength'];?></li>
                        </ul>
                    </div>
                </div>
                <div class="fiftyr">
                    <label><b><?=$lang['regName'];?></b></label>
                    <input type="text" name="nameUser" placeholder="<?=$lang['regNameInput'];?>" >
                </div>
                <div id="pswd_info_user">
                    <h4><?=$lang['checkUsername'];?></h4>
                    <ul>
                        <li id="Nameletter"><?=$lang['checkUsernameLength'];?></li>
                    </ul>
                </div>
            </div>

            <div class="pRegistr">
                <div class="fifty">
                    <label><b><?=$lang['regPass'];?></b></label>
                    <div><input type="password" placeholder="<?=$lang['writePass'];?>" name="passwordReg" ></div>
                    <div id="pswd_info">
                        <h4><?=$lang['checkPass'];?></h4>
                        <ul>
                            <li id="letter"><?=$lang['PassLetter'];?></li>
                            <li id="length"><?=$lang['LogLength'];?></li>
                        </ul>
                    </div>
                </div>
                <div class="fiftyr">
                    <label><b><?=$lang['regFamily'];?></b></label>
                    <div><input type="text" placeholder="<?=$lang['regFamilyInput'];?>" name="family" ></div>
                </div>
                <div id="pswd_info_family">
                    <h4><?=$lang['checkfamily'];?></h4>
                    <ul>
                        <li id="Famletter"><?=$lang['checkfamilyLength'];?></li>
                    </ul>
                </div>
            </div>
            <div class="pRegistr">
                <div class="fifty">
                    <label><b><?=$lang['regPassRepeat'];?></b></label>
                    <div><input type="password" placeholder="<?=$lang['regPassRepeat'];?>" name="passwordTwo" ></div>
                    <div id="pswd_info_pass">
                        <h4><?=$lang['checkPass'];?></h4>
                        <ul>
                            <li id="letterTwo"><?=$lang['PassLetter'];?></li>
                            <li id="lengthTwo"><?=$lang['LogLength'];?></li>
                            <li id="repeatTwo"><?=$lang['regPassRepeat'];?></li>
                        </ul>
                    </div>
                </div>
                <div class="fiftyr">
                    <label><b><?=$lang['regAge'];?></b></label>
                    <div><input type="number" placeholder="<?=$lang['regAgeInput'];?>" name="age" ></div>
                </div>
                <div id="pswd_info_age">
                    <h4><?=$lang['checkAge'];?></h4>
                    <ul>
                        <li id="AgeLetter"><?=$lang['checkAgeMore'];?></li>
                    </ul>
                </div>
            </div>
            <label class="fileContainer">
                <?=$lang['selectedImage'];?>
            <input type="file" accept=".txt,image/*" name="image">
            </label>
            <a href="#" class="upload_files button"><?=$lang['preloadImage'];?></a>
            <div class="ajax-reply"></div>
            <?php
            echo '<div class="ajax-reply">';
            echo $lang['image'];
            echo '</div>';
            echo '<div class="error">';
            echo $lang['errorReg'];
            echo '</div>';
            echo '<div class="goodReg">';
            echo $lang['goodReg'];
            echo '</div>';
            ?>
            <div><input type="" name="reg" value="<?=$lang['registration'];?>" id="reg"></div>
            <div class="botm"><a href="index.php?lang=<?=$_GET['lang'];?>" id="auth"><?=$lang['ifReg'];?></a></div>
        </form>
        <a class="changeLangReg" href="<?=$url.'?lang='.$changeLang;?>"><?=$lang['language'];?>
        <img src="./images/<?=$changeLang;?>.png" width="16px" alt=""></a>
    </div>


    <script src="main.js"></script>
</body>

</html>

