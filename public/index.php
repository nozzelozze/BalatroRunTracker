<?php
include "../src/utils/constants.php";
require UTILS . "Router.php";

ob_start();

$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$parts = array_filter(explode("/", $url));
$apiRoutes = [
    "runs" => fn() => include API . "runs.php",
    "logout" => fn() => include API . "logout.php",
    "login" => fn() => include API . "login.php",
    "comments" => fn() => include API . "comments.php"
];

$apiRouter = new Router($apiRoutes);

$i = "/index.php";
$routes = [
    "" => fn() => include VIEWS . "index" . $i,
    "login" => fn() => include VIEWS . "login" . $i,
    "signup" => fn() => include VIEWS . "signup" . $i,
    "user" => fn() => include VIEWS . "user" . $i,
    "run" => fn() => include VIEWS . "run" . $i,
    "submit" => fn() => include VIEWS . "submit" . $i,
    "api" => fn() => $apiRouter->route(array_values($parts)[1])
];

$router = new Router($routes);

$base = isset(array_values($parts)[0]) ? array_values($parts)[0] : "";

$router->route($base);

if (!($base === "api")) {
    $content = ob_get_clean();
    include UI . "layout.php";
} else {
    ob_end_flush();
}   

?>