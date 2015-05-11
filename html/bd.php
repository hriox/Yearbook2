<?php
class Database
{
    private static $dbName = 'u879518409_year' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'u879518409_year';
    private static $dbUserPassword = 'year2014';
     
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