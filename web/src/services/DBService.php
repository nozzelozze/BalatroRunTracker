<?php

class DBService
{
    private static $instance;

    public mysqli $connection;

    private function __construct()
    {
        $servername = getenv("SQL_SERVERNAME");
        $username = getenv("SQL_USERNAME");
        $password = getenv("SQL_PASSWORD");
        $dbname = getenv("SQL_DBNAME");

        $this->connection = new mysqli($servername, $username, $password, $dbname);
    }

    public static function getInstance(): DBService
    {
        if (!isset(self::$instance))
        {
            self::$instance = new DBService();
        }
        return self::$instance;
    }
}

?>