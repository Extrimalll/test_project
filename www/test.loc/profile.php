<?php
session_start();
require_once('language.php');
require_once('Classes/Users.php');
//проверка на присутствии сессии
if (isset($_SESSION['log']) && isset($_SESSION['hash'])){
    $auth = new Users('users');
    $select =$auth->getUserLogin($_SESSION['log']);
        //проверка на корректность данных
        if($select[0]['password'] == $_SESSION['hash']){
            echo $select[0]['img'];
            if ($select[0]['img'] != ''){
                $select[0]['img'];
            }else{
				$select[0]['img'] =  'noImage.jpg';
            }?>
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
        <div class="fl">
            <div class="welcome"><?=$lang['welcome']?>, <?=$select[0]['username']?></div>
                <article class="item">
                    <div class="photo">
                        <img class="personPhoto" alt="" src="./images/avatar/<?=$select[0]['img']?>">
                    </div>
                </article>
        </div>
        <div>
            <h4><?=$lang['regName']?> <?=$select[0]['username']?></h4>
            <h4><?=$lang['regFamily']?> <?=$select[0]['family']?></h4>
            <h4><?=$lang['regAge']?> <?=$select[0]['age']?></h4>
        </div>
		<div class="preExit">
            <a class="exit" href="out.php"><?=$lang['exit'];?></a>
        </div>
	    <div class="langProfile">
            <a class="changeProfile" href="<?=$url.'?lang='.$changeLang;?>"><?=$lang['language'];?>
		    <img src="./images/<?=$changeLang;?>.png" width="16px" alt=""></a>
        </div>
</div>


<script src="main.js"></script>
</body>

</html>
<?php }
}else{
    //редирект на главную странию
    header("Location: index.php");
}
