<?php
require_once SERVICES."DBService.php";
require_once SERVICES."Service.php";

class CommentService extends Service
{
    public static function create($data = null)
    {
        $res = DBService::getInstance()->connection->query("
        INSERT INTO COMMENTS (UserID, RunID, Content)
        VALUES (1, " . intval($data["RunID"]) . ", '" . $data["Content"] . "')
    ");
    return $res;
    }
    
    public static function read($data = null)
    {
        if (isset($data["UserID"]))
        {
            $res = DBService::getInstance()->connection->query("
            SELECT
                COMMENTS.CommentID,
                COMMENTS.Content,
                COMMENTS.CreatedAt
                USERS.Username,
                USERS.UserID,
                COMMENTS.UserID
            FROM
                COMMENTS
            JOIN
                USERS
            ON
                COMMENTS.UserID = USERS.UserID
            WHERE
                COMMENTS.UserID = " . $data["UserID"]
            );
            return $res->fetch_all(MYSQLI_ASSOC);
        }
        if (isset($data["RunID"]))
        {
            $res = DBService::getInstance()->connection->query("
            SELECT
                COMMENTS.CommentID,
                COMMENTS.Content,
                COMMENTS.CreatedAt,
                USERS.Username,
                USERS.UserID
            FROM
                COMMENTS
            JOIN USERS ON COMMENTS.UserID = Users.UserID 
            WHERE
                COMMENTS.RunID = " . $data["RunID"]
            );
            return $res->fetch_all(MYSQLI_ASSOC);
        }
        
        $res = DBService::getInstance()->connection->query("
            SELECT
                COMMENTS.CommentID,
                COMMENTS.Content,
                COMMENTS.CreatedAt
            FROM
                COMMENTS
        ");
        return $res->fetch_all(MYSQLI_ASSOC);
    }
    public static function delete($data = null)
    {

    }
}

?>