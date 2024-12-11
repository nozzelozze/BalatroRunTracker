<?php
require API."DBService.php";
require UTILS."handleApiRequest.php";

class RunService
{
    public static function create()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        return [];
    }

    public static function get()
    {
        if (isset($_GET["id"]))
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
                RUNS.RunID = " . $_GET["id"]
            );
            return $res->fetch_assoc();
        }
        
        $res = DBService::getInstance()->connection->query("
        SELECT
            RUNS.RunID,
            RUNS.UserID,
            RUNS.Score,
            RUNS.SubmittedAt
        FROM
            RUNS
        JOIN
            USERS
        ON
            RUNS.UserID = USERS.UserID
        ");
        return $res->fetch_all(MYSQLI_ASSOC);
    }
}

handleApiRequest(
    function () 
    {
        return RunService::create();
    },
    function () 
    {
        return RunService::get();
    }
)


?>