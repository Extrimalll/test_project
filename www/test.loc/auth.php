<?php
require_once("./Classes/db.php");
require_once("./Classes/Users.php");
//проверка логина и пароля
if( isset($_POST['login']) && isset($_POST['password']) ){
    $loginPost = trim($_POST['login']);
    $password = trim($_POST['password']);
    $user = new Users('users');
    $login = $user->getUserLogin($loginPost);
	$salt = $login[0]['salt'];
	$newPass = md5($password.$salt);
	//проверка на корректность данных
	if($newPass == $login[0]['password'] ){
		$_SESSION['log'] = $login[0]['login'];
        $_SESSION['hash'] = $newPass;
        echo 'good';
    }
}