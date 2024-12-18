<?php
require_once SERVICES."DBService.php";
require_once SERVICES."Service.php";

class UserService extends Service
{
    public static function create($data = null)
    {

    }
    public static function read($data = null)
    {
        if (isset($data["id"]))
        {
            $res = DBService::getInstance()->connection->query("
            SELECT 
                Username, 
                CreatedAt,
                HighestAnte,
                HighestScore,
                RunsCompleted,
                MostUsedJoker
            from 
                USERS WHERE USERS.UserID = ".$data["id"]
            );
            return $res->fetch_assoc();
        }
        $res = DBService::getInstance()->connection->query("SELECT Username from USERS");
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public static function delete($data = null)
    {

    }

}

?>