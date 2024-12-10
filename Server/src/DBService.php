<?php

class DBService
{
    private static $instance;

    private mysqli $connection;

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

    public function addUser(string $name): void
    {
        mysqli_query($this->connection, "INSERT INTO USERS (Username) VALUES ('$name');");
    }
}

?>