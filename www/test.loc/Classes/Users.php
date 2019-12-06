<?php
require_once("db.php");

class Users extends db
{
    private $table;
    //из db.php
    function __construct($table)
    {
        parent::__construct();
        $this->table = $table;
    }
    //получение по логину
    function getUserLogin($login){
        $user = $this->selectPDO($this->table,'*',"$login");
        if (count($user) > 0) return $user;
        else return 0;
    }
}