<?php

namespace App;

class Router
{
    private array $routes = [];

    public function add(string $method, string $path, callable $handler)
    {
        $this->routes[$method][$path] = $handler;
    }

    public function dispatch(string $method, string $uri)
    {
        // Отрезаем query string
        $path = parse_url($uri, PHP_URL_PATH);

        if (isset($this->routes[$method][$path])) {
            return call_user_func($this->routes[$method][$path]);
        }

        http_response_code(404);
        echo "Page not found";
        exit;
    }
}