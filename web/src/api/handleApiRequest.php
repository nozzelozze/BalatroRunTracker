<?php

function handleApiRequest(
    callable $postHandler = null, 
    callable $getHandler = null, 
    callable $deleteHandler = null,
    callable $partialsHandler = null,
    )
{
    $acceptHeader = $_SERVER["HTTP_ACCEPT"] ?? "";

    if ($acceptHeader == "text/html")
    {
        if (!$partialsHandler)
        {
            http_response_code(406);
        } else
        {
            header("Content-Type: text/html");
            $response = $partialsHandler($_GET);
            echo $response;
        }
        return;
    }
    header("Content-Type: application/json");
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!isset($postHandler))
        {
            http_response_code(405);
        } else
        {
            $response = $postHandler($data);
            echo json_encode($response);
        }
    } else if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        if (!isset($getHandler))
        {
            http_response_code(405);
        } else
        {
            $response = $getHandler($_GET);
            echo json_encode($response);
        }
    } else if ($_SERVER["REQUEST_METHOD"] == "DELETE")
    {
        if (!isset($deleteHandler))
        {
            http_response_code(405);
        } else
        {
            $response = $deleteHandler();
            echo json_encode($response);
        }
    } else
    {
        http_response_code(405);
        echo json_encode([]);
    }
}

?>