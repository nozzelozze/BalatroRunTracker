<?php
require_once SERVICES . "DBService.php";
require_once SERVICES . "Service.php";

class FollowService extends Service
{
    public static function create($data = null)
    {
        if (!isset($data["FollowerID"]) || !isset($data["FollowingID"]))
        {
            return ["success" => false, "error" => "FollowerID or FollowingID is not set."];
        }
    
        $followerID = intval($data["FollowerID"]);
        $followingID = intval($data["FollowingID"]);
    
        $sql = DBService::getInstance()->connection;
        $query = "
            INSERT INTO Follows (FollowerID, FollowingID)
            VALUES ($followerID, $followingID);
        ";
    
        $res = $sql->query($query);
    
        if (!$res)
        {
            return ["error" => $sql->error, "success" => false];
        }
    
        // Return the result
        return ["success" => true, "result" => $res];
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
        if (!isset($data["FollowerID"]) && !isset($data["FollowingID"]))
        {
            return ["success" => false, "error" => "FollowerID or FollowingID is not set."];
        }
        $sql = DBService::getInstance()->connection;
        
        $followerID = intval($data["FollowerID"]);
        $followingID = intval($data["FollowingID"]);
        $query = "
        DELETE FROM Follows
        WHERE FollowerID = $followerID AND FollowingID = $followingID;
        ";

        $res = $sql->query($query);

        if (!$res)
        {
            return ["error" => $sql->error, "success" => false];
        }

        return ["success" => true, "result" => $res];
    }
}

?>