<?php
// подключение к БД
session_start();
class db {
    public $pdo;
    function __construct($db='test', $host='mysql', $user='root', $password='pass') {
        try
        {
            $this->pdo = new PDO("mysql:host={$host};dbname={$db};charset=utf8", "{$user}", "{$password}");
            return $this->pdo;
        }
        catch (PDOException $e)
        {
            die( 'Ошибка подключения к БД'.$e->getMessage() );
        }
    }
    function selectPDO($db, $cols, $where='', $order='', $limit=''){
        $sql = $this->pdo->prepare("SELECT {$cols} FROM {$db} WHERE login = ?");
        $sql->execute(array($where));
        if ($where != ''){
            $row = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }else{
            $row = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
    }
    function insertPDO($db, $cols='', $values=''){
        if ($cols == ' ') echo 'Error';
        $sql = "INSERT INTO `{$db}` ({$cols}) VALUES ({$values})";
        $q= $this->pdo->query($sql);
        if ($q)return true;
            else return false;
    }
}