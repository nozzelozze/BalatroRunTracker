<?php
require_once SERVICES . "DBService.php";
require_once SERVICES . "Service.php";

class CommentService extends Service
{
    public static function create($data = null)
    {
        $sql = DBService::getInstance()->connection;

        $content = $sql->real_escape_string($data["Content"]);
        $runID = intval($data["RunID"]);
        $userID = intval($data["UserID"]);

        $res = $sql->query("
            INSERT INTO COMMENTS (UserID, RunID, Content)
            VALUES ($userID, $runID, '$content')
        ");

        if (!$res)
        {
            return ["error" => $sql->error, "success" => false];
        }

        $commentID = $sql->insert_id;

        return ["success" => true, "result" => ["CommentID" => $commentID]];
    }


    public static function read($data = null)
    {
        $sql = DBService::getInstance()->connection;
        $query = "";

        if (isset($data["CommentID"]))
        {
            $commentID = intval($data["CommentID"]);
            $query = "
            SELECT
                COMMENTS.CommentID,
                COMMENTS.Content,
                COMMENTS.CreatedAt,
                USERS.Username,
                USERS.UserID,
                USERS.ProfilePictureIndex
            FROM
                COMMENTS
            JOIN
                USERS ON COMMENTS.UserID = USERS.UserID
            WHERE
                COMMENTS.CommentID = $commentID
        ";
        } else if (isset($data["UserID"]))
        {
            $userID = intval($data["UserID"]);
            $query = "
            SELECT
                COMMENTS.CommentID,
                COMMENTS.Content,
                COMMENTS.CreatedAt,
                USERS.Username,
                USERS.UserID,
                USERS.ProfilePictureIndex,
                COMMENTS.UserID AS CommentUserID
            FROM
                COMMENTS
            JOIN
                USERS ON COMMENTS.UserID = USERS.UserID
            WHERE
                COMMENTS.UserID = $userID
            ORDER BY COMMENTS.CreatedAt DESC
        ";
        } else if (isset($data["RunID"]))
        {
            $runID = intval($data["RunID"]);
            $query = "
            SELECT
                COMMENTS.CommentID,
                COMMENTS.Content,
                COMMENTS.CreatedAt,
                USERS.Username,
                USERS.UserID,
                USERS.ProfilePictureIndex
            FROM
                COMMENTS
            JOIN
                USERS ON COMMENTS.UserID = USERS.UserID
            WHERE
                COMMENTS.RunID = $runID
            ORDER BY COMMENTS.CreatedAt DESC
        ";
        } else
        {
            $query = "
            SELECT
                COMMENTS.CommentID,
                COMMENTS.Content,
                COMMENTS.CreatedAt
            FROM
                COMMENTS
        ";
        }

        $res = $sql->query($query);

        if (!$res)
        {
            return ["error" => $sql->error, "success" => false];
        }

        $rows = $res->fetch_all(MYSQLI_ASSOC);

        if (isset($data["CommentID"]))
        {
            if (count($rows) === 0) {
                return ["error" => "Comment not found", "success" => false];
            }
            return ["success" => true, "result" => $rows[0]];
        }

        return ["success" => true, "result" => $rows];
    }


    public static function delete($data = null)
    {
        $sql = DBService::getInstance()->connection;

        if (!isset($data["CommentID"]))
        {
            return ["error" => "CommentID is required", "success" => false];
        }

        $commentID = intval($data["CommentID"]);

        $res = $sql->query("
            DELETE FROM COMMENTS
            WHERE CommentID = $commentID
        ");

        if (!$res)
        {
            return ["error" => $sql->error, "success" => false];
        }

        if ($sql->affected_rows === 0)
        {
            return ["error" => "Comment does not exist or could not be deleted", "success" => false];
        }

        return ["success" => true, "result" => $res];
    }
}

?>