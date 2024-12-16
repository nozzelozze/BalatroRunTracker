<?php
require_once SERVICES."DBService.php";
require_once SERVICES."Service.php";

class RunService extends Service
{
    public static function delete($data = null)
    {
        if (!isset($data["RunID"]))
        {
            return false;
        }
        $res = DBService::getInstance()->connection->query("
        DELETE FROM RUNS 
            WHERE RUNS.RunID = ".$data["RunID"]
        );
        return $res;
    }

    public static function create($data = null)
    {
        $res = DBService::getInstance()->connection->query("
        INSERT INTO RUNS (UserID, Score)
        VALUES (1, ".intval($data["Score"]).")");
        return $res;
    }

    public static function read($data = null)
    {
        if (isset($data["RunID"]))
        {
            $res = DBService::getInstance()->connection->query("
            SELECT
                RUNS.RunID,
                RUNS.UserID,
                USERS.Username,
                RUNS.Score,
                RUNS.SubmittedAt
            FROM
                RUNS
            JOIN
                USERS
            ON
                RUNS.UserID = USERS.UserID
            WHERE
                RUNS.RunID = " . $data["RunID"]
            );
            return $res->fetch_assoc();
        }
        if (isset($data["UserID"]))
        {
            $res = DBService::getInstance()->connection->query("
            SELECT
                RUNS.RunID,
                RUNS.UserID,
                USERS.Username,
                RUNS.Score,
                RUNS.SubmittedAt
            FROM
                RUNS
            JOIN
                USERS
            ON
                RUNS.UserID = USERS.UserID
            WHERE
                RUNS.UserID = " . $data["UserID"]
            );
            return $res->fetch_all(MYSQLI_ASSOC);
        }
        
        $res = DBService::getInstance()->connection->query("
        SELECT
            RUNS.RunID,
            RUNS.UserID,
            USERS.Username,
            RUNS.Score,
            RUNS.SubmittedAt
        FROM
            RUNS
        JOIN
            USERS
        ON
            RUNS.UserID = USERS.UserID "
         . (isset($data["orderBy"]) ? " ORDER BY " . $data["orderBy"] : "")
         . (isset($data["reverse"]) && $data["reverse"] == true ? " ASC" : " DESC")
        );
        return $res->fetch_all(MYSQLI_ASSOC);
    }

}

?>