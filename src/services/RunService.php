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
    
        $userID = intval($data["UserID"]);
        $runName = $sql->real_escape_string($data["RunName"]);
        $runDescription = $sql->real_escape_string($data["RunDescription"]);
        $bestHand = intval($data["BestHand"]);
        $mostPlayedHand = $sql->real_escape_string($data["MostPlayedHand"]);
        $cardsPlayed = intval($data["CardsPlayed"]);
        $cardsDiscarded = intval($data["CardsDiscarded"]);
        $cardsPurchased = intval($data["CardsPurchased"]);
        $timesRerolled = intval($data["TimesRerolled"]);
        $seed = $sql->real_escape_string($data["Seed"]);
        $ante = intval($data["Ante"]);
        $round = intval($data["Round"]);
        $defeatedBy = $sql->real_escape_string($data["DefeatedBy"]);
    
        $query = "
            INSERT INTO RUNS (
                UserID, 
                RunName,
                RunDescription,
                BestHand,
                MostPlayedHand,
                CardsPlayed,
                CardsDiscarded,
                CardsPurchased,
                TimesRerolled,
                Seed,
                Ante,
                Round,
                DefeatedBy
            ) VALUES (
                $userID,
                '$runName',
                '$runDescription',
                $bestHand,
                '$mostPlayedHand',
                $cardsPlayed,
                $cardsDiscarded,
                $cardsPurchased,
                $timesRerolled,
                '$seed',
                $ante,
                $round,
                '$defeatedBy'
            )
        ";
    
        $res = $sql->query($query);
    
        if (!$res) {
            return ["error" => $sql->error, "success" => false];
        }
    
        return ["success" => true, "result" => $sql->insert_id];
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
                RUNS.RunName,
                RUNS.RunDescription,
                RUNS.BestHand,
                RUNS.MostPlayedHand,
                RUNS.CardsPlayed,
                RUNS.CardsDiscarded,
                RUNS.CardsPurchased,
                RUNS.TimesRerolled,
                RUNS.Seed,
                RUNS.Ante,
                RUNS.Round,
                RUNS.DefeatedBy
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
                RUNS.RunName,
                RUNS.RunDescription,
                RUNS.BestHand,
                RUNS.MostPlayedHand,
                RUNS.CardsPlayed,
                RUNS.CardsDiscarded,
                RUNS.CardsPurchased,
                RUNS.TimesRerolled,
                RUNS.Seed,
                RUNS.Ante,
                RUNS.Round,
                RUNS.DefeatedBy
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
                RUNS.RunName,
                RUNS.RunDescription,
                RUNS.BestHand,
                RUNS.MostPlayedHand,
                RUNS.CardsPlayed,
                RUNS.CardsDiscarded,
                RUNS.CardsPurchased,
                RUNS.TimesRerolled,
                RUNS.Seed,
                RUNS.Ante,
                RUNS.Round,
                RUNS.DefeatedBy
            FROM
                RUNS
            JOIN
                USERS
            ON
                RUNS.UserID = USERS.UserID ";
            if (isset($data["orderBy"]) && !empty($data["orderBy"]))
            {
                $orderBy = $sql->real_escape_string($data["orderBy"]);
                $direction = (isset($data["reverse"]) && $data["reverse"] == true) ? "ASC" : "DESC";
                $query .= " ORDER BY $orderBy $direction";
            }
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