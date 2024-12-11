<?php

function handleApiRequest(callable $postHandler, callable $getHandler)
{
    header("Content-Type: application/json");
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $response = $postHandler();
        echo json_encode($response);
    } else if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $response = $getHandler();
        echo json_encode($response);
    } else
    {
        http_response_code(405);
        echo json_encode(["error" => "Invalid request method"]);
    }
}

?>