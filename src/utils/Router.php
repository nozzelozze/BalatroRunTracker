<?php

class Router
{
    private array $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function route($route)
    {
        if (array_key_exists($route, $this->routes))
        {
            $this->routes[$route]();
        } else
        {
            http_response_code(404);
            include VIEWS."404/index.php";
        }
    }
}


?>