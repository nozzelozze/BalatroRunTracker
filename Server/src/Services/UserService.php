<?php
require "./Services/DBService.php";

class UserService
{
    public static function addUser(string $name): void
    {
        DBService::getInstance()->connection->query("INSERT INTO USERS (Username) VALUES ('$name');");
    }

    public static function getUsers(): array
    {
        $result = DBService::getInstance()->connection->query("SELECT Username from USERS");
        
        $users = array();
        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                array_push($users, $row["Username"]);
            }
        }

        return $users;
    }
}

?>