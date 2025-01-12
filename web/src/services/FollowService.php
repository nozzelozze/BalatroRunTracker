<?php
require_once SERVICES . "DBService.php";
require_once SERVICES . "Service.php";

class FollowService extends Service
{
    public static function create($data = null)
    {
    }


    public static function read($data = null)
    {
        if (!isset($data["FollowerID"]) && !isset($data["FollowingID"]))
        {
            return ["success" => false, "error" => "FollowerID nor FollowingID is set."];
        }
        $sql = DBService::getInstance()->connection;
        $query = "";

        if (isset($data["FollowerID"]))
        {
            $followerID = intval($data["FollowerID"]);
            $query = "
                SELECT u.UserID, u.Username, u.ProfilePictureIndex
                FROM Users u
                JOIN Follows f ON u.UserID = f.FollowingID
                WHERE f.FollowerID = $followerID;
            ";
        } else if (isset($data["FollowingID"]))
        {
            $followingID = intval($data["FollowingID"]);
            $query = "
                SELECT u.UserID, u.Username, u.ProfilePictureIndex
                FROM Users u
                JOIN Follows f ON u.UserID = f.FollowerID
                WHERE f.FollowingID = $followingID;
            ";
        }

        $res = $sql->query($query);

        if (!$res)
        {
            return ["error" => $sql->error, "success" => false];
        }

        $rows = $res->fetch_all(MYSQLI_ASSOC);

        return ["success" => true, "result" => $rows];
    }


    public static function delete($data = null)
    {
    }
}

?>