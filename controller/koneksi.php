<?php
class Database {
    private static $dbName = 'humanika' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = 'rizalex';
    private static $con = null;
    public function __construct() {
        die('Init function is not allowed');
    }
    public static function connect() {
        if ( null == self::$con ) {
            try {
                self::$con =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName,
                        self::$dbUsername, self::$dbUserPassword);
            }
            catch(PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$con;
    }
    public static function disconnect() {
        self::$con = null;
    }
    public static function htgrows() {
    }
}

?>
