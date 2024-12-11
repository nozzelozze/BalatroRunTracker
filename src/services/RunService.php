<?php
require SERVICES."DBService.php";

class RunService
{
    public static function submitRun(int $score)
    {
        
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $response = [];
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>