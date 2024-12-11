<?php
include "../src/utils/constants.php";
 
ob_start();

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$routes = [
    "/" => "index/index.php",
    "/login" => "login/index.php",
    "/signup" => "signup/index.php",
];

$api = [
    "/api/runs" => "runs.php"
];

if (array_key_exists($uri, $routes))
{
    include VIEWS.$routes[$uri];


    $content = ob_get_clean();
    include ROOT."layout.php";

} else if (array_key_exists($uri, $api))
{
    include API.$api[$uri];
} else
{
    http_response_code(404);
    include VIEWS."404/index.php";


    $content = ob_get_clean();
    include ROOT . "layout.php";
    
}


?>