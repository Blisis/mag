<?php
class Database{
    const HOST="localhost";
    const USER="root";
    const pass="";
    const db="mag";

    private static $instanta=null;

    private function __construct()
    {
        self::$instanta = new mysqli(self::HOST, self::USER, self::pass, self::db);

        if (self::$instanta->connect_errno) {
            self::$instanta = null;
            throw new Exception("Failed to connect to MySQL: (" . self::$instanta->connect_errno . ") " . self::$instanta->connect_error);
        }
    }

    public static function getInstatnta(){
        if(self::$instanta!==null){
            return self::$instanta;
        }else{
            new self();
            return self::$instanta;
        }
    }
}