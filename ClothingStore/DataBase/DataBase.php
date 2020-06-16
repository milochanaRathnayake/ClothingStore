<?php
namespace DataBase;

use PDO;

class DataBase{
    private static $connection = null;
    private static $dsn = 'mysql:host=localhost;dbname=clothing_store;charset=UTF8';
    private static $user = 'admin';
    private static $password = 'password';
    private static $options = [
        PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
    ];
    private function __construct(){
        
    }
    
    public static function getConnection(){
        if(self::$connection == null){
            self::$connection = new PDO(self::$dsn,self::$user, self::$password, self::$options);
        }
        return self::$connection;
    }
}