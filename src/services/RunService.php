<?php
require_once SERVICES."DBService.php";
require_once SERVICES."Service.php";

class RunService extends Service
{
    public static function delete($data = null)
    {
        $sql = DBService::getInstance()->connection;
        $res = $sql->query("
        DELETE FROM RUNS 
            WHERE RUNS.RunID = ".$data["RunID"]
        );
        if (!$res)
        {
            return ["error" => $sql->error, "success" => false];
        }
        return $res;
    }

    public static function create($data = null)
    {
        $sql = DBService::getInstance()->connection;

        $res = $sql->query("
        INSERT INTO RUNS (UserID, Score)
        VALUES (1, ".intval($data["Score"]).")");
        if (!$res)
        {
            return ["error" => $sql->error, "success" => false];
        }

        return ["success" => true, "result" => $res];
    }

    public static function read($data = null)
    {
        $sql = DBService::getInstance()->connection;
        $query = "";
    
        if (isset($data["RunID"]))
        {
            $query = "
            SELECT
                RUNS.RunID,
                RUNS.UserID,
                USERS.Username,
                RUNS.Score,
                RUNS.SubmittedAt,
                RUNS.MostPlayedHand,
                RUNS.BestHand,
                RUNS.RunName,
                RUNS.CardsPlayed,
                RUNS.Ante,
                RUNS.RunDescription
            FROM
                RUNS
            JOIN
                USERS
            ON
                RUNS.UserID = USERS.UserID
            WHERE
                RUNS.RunID = " . intval($data["RunID"]);
        } else if (isset($data["UserID"]))
        {
            $query = "
            SELECT
                RUNS.RunID,
                RUNS.UserID,
                USERS.Username,
                RUNS.Score,
                RUNS.SubmittedAt,
                RUNS.MostPlayedHand,
                RUNS.BestHand,
                RUNS.RunName,
                RUNS.CardsPlayed,
                RUNS.Ante,
                RUNS.RunDescription
            FROM
                RUNS
            JOIN
                USERS
            ON
                RUNS.UserID = USERS.UserID
            WHERE
                RUNS.UserID = " . intval($data["UserID"]);
        } else
        {
            $query = "
            SELECT
                RUNS.RunID,
                RUNS.UserID,
                USERS.Username,
                RUNS.Score,
                RUNS.SubmittedAt,
                RUNS.MostPlayedHand,
                RUNS.BestHand,
                RUNS.RunName,
                RUNS.CardsPlayed,
                RUNS.Ante,
                RUNS.RunDescription
            FROM
                RUNS
            JOIN
                USERS
            ON
                RUNS.UserID = USERS.UserID "
                . (isset($data["orderBy"]) ? " ORDER BY " . $sql->real_escape_string($data["orderBy"]) : "")
                . (isset($data["reverse"]) && $data["reverse"] == true ? " ASC" : " DESC");
        }
    
        $res = $sql->query($query);
        if (!$res)
        {
            return ["error" => $sql->error, "success" => false];
        }
    
        if (isset($data["RunID"]))
        {
            if ($res->num_rows <= 0)
            {
                return ["error" => "Run doesn't exist", "success" => false];
            }

            return ["success" => true, "result" => $res->fetch_assoc()];
        }
    
        return ["success" => true, "result" => $res->fetch_all(MYSQLI_ASSOC)];
    }

}

?>