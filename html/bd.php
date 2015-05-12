<?php
class Database
{
    private static $dbName = 'yearbook2db';
    private static $dbHost = '104.41.1.8';
    private static $dbUsername = 'bd37c453562cbb';
    private static $dbUserPassword = '97020585';
     
    private static $cont  = null;
     
    public function __construct() {
        die('Init não permitido');
    }
     
    public static function connect()
    {
       // One connection through whole application
       if ( null == self::$cont )
       {     
            try
            {
              self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
              self::$cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e)
            {
              die($e->getMessage()); 
            }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>