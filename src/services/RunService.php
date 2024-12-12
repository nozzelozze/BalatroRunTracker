<?php
require SERVICES."DBService.php";
require SERVICES."Service.php";

class RunService extends Service
{
    public static function create($data = null)
    {
        $res = DBService::getInstance()->connection->query("
        INSERT INTO RUNS (UserID, Score)
        VALUES (1, ".intval($data["Score"]).")");
        return $res;
    }

    public static function read($data = null)
    {
        if (isset($data["id"]))
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
                RUNS.RunID = " . $data["id"]
            );
            return $res->fetch_assoc();
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
        );
        return $res->fetch_all(MYSQLI_ASSOC);
    }
}

?>