<?php
require_once SERVICES . "DBService.php";
require_once SERVICES . "Service.php";

class UserService extends Service
{
    public static function create($data = null)
    {

    }
    public static function read($data = null)
    {
        $sql = DBService::getInstance()->connection;
        $query = "";

        if (isset($data["id"]))
        {
            $query = "
            SELECT 
                u.UserID, 
                u.Username,
                u.CreatedAt,
                u.IsAdmin,
                u.ProfilePictureIndex,
                MAX(r.Ante) AS HighestAnte, 
                MAX(r.BestHand) AS BestHand, 
                COUNT(r.RunID) AS RunsCompleted,
                (SELECT COUNT(*) FROM FOLLOWS f1 WHERE f1.FollowingID = u.UserID) AS FollowersCount,
                (SELECT COUNT(*) FROM FOLLOWS f2 WHERE f2.FollowerID = u.UserID) AS FollowingCount
            FROM 
                USERS u
            LEFT JOIN 
                RUNS r ON u.UserID = r.UserID
            WHERE 
                u.UserID = " . intval($data["id"]) ." 
            GROUP BY 
                u.UserID, u.Username
            ";
        } else
        {
            $query = "SELECT Username, UserID FROM USERS";
        }

        $res = $sql->query($query);
        if (!$res)
        {
            return ["error" => $sql->error, "success" => false];
        }
        if ($res->num_rows <= 0)
        {
            return ["error" => "User doesn't exist", "success" => false];
        }

        if (isset($data["id"]))
        {
            return ["success" => true, "result" => $res->fetch_assoc()];
        }

        return ["success" => true, "result" => $res->fetch_all(MYSQLI_ASSOC)];
    }

    public static function delete($data = null)
    {

    }

}

?>