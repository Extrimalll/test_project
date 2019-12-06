<?php
require_once ("db.php");
    class Registr extends db{

    private $table;
        //из db.php

    function __construct($table){
        parent::__construct();
         $this->table = $table;
    }

//генерируем salt
    public function GenerateRandomString($length = 8){
        $chars = 'mokghmgofhjoifgSFNDSJNLFKSDLZ123456789';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        return $string;
    }
    //получение строки
    public function getCheckLogin($login){
		$user = $this->selectPDO($this->table,'*',"$login");
        if (count($user) > 0) return $user;
        else return 0;
    }
    //регистрация
    public function registr($salt,$pass,$image){
        $login = trim($_POST['login']);
        $family = trim($_POST['family']);
        $username = trim($_POST['username']);
        $age = trim($_POST['age']);
        $user = $this->insertPDO($this->table,'`login`, `password`, `salt`, `username`, `family`, `age`, `img`',
            "'$login', '$pass', '$salt', '$username', '$family', '$age', '$image'");
        if ($user == 1) return $user;
        else return 0;
    }

}


$user = new Registr('users');
//паттерн
$chr_en = "a-zA-Z0-9\s";
//берем название картинки
$image = basename ($_POST['image']);
//проверка по патерну
if (preg_match("/^[$chr_en]+$/", $_POST['login']) && preg_match("/^[$chr_en]+$/", $_POST['password'])){
    //сравнение двух паролей
    if ( $_POST['password'] === $_POST['passwordTwo']){
        $user->login = $_POST['login'];
        $user->login = $user->getCheckLogin($user->login);
        if($user->login == 0){
            $salt = $user->GenerateRandomString();
            //создание пароля через мд5
            $user->Password = md5($_POST['password'].$salt);
            $check = $user->registr($salt,$user->Password,$image);
        }
    }
}





