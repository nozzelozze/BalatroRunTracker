<?php

function handleApiRequest(Service $service)
{
    header("Content-Type: application/json");
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $response = $service::create($data);
        echo json_encode($response);
    } else if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $response = $service::read($_GET);
        echo json_encode($response);
    } else
    {
        http_response_code(405);
        echo json_encode([]);
    }
}

?>