<?php
@session_start();
// Массив доступных для выбора языков
$LangArray = array("ru", "ea");
// Язык по умолчанию
$DefaultLang = "ru";
if($_SESSION['NowLang']) {
    // Проверяем если выбранный язык доступен для выбора
    if(!in_array($_SESSION['NowLang'], $LangArray)) {
        // Неправильный выбор, возвращаем язык по умолчанию
        $_SESSION['NowLang'] = $DefaultLang;
    }
}
else {
    $_SESSION['NowLang'] = $DefaultLang;
}
// Выбранный язык отправлен скрипту через GET
$language = $_GET['lang'];
if($language) {
    // Проверяем если выбранный язык доступен для выбора
    if(!in_array($language, $LangArray)) {
        // Неправильный выбор, возвращаем язык по умолчанию
        $_SESSION['NowLang'] = $DefaultLang;
    }
    else {
        // Сохраняем язык в сессии
        $_SESSION['NowLang'] = $language;
    }
}
// Открываем текущий язык
$CurentLang = $_SESSION['NowLang'];
include_once ("language/".$CurentLang.".php");
if($_GET['lang'] == 'ru') {
    include './language/ru.php';
    $changeLang = 'eng';
}
elseif($_GET['lang'] == 'eng') {
    include './language/eng.php';
    $changeLang = 'ru';
}
if($_GET['lang'] == ''){
    $url  = "?lang=$DefaultLang";
    header("Location:$url");
}
$url= 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$url = $url[0];