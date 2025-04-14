<?php
namespace App\Core;
class Router
{
    private $routes = [];
    private static $instance = null;

    public function addRoute($method, $path,$action)
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'action' => $action,
        ];
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Router();
        }
        return self::$instance;
    }

    public function dispatch($method, $path)
    {

        foreach ($this->routes as $route) {
            $parsedPath1 = parse_url($path, PHP_URL_PATH);
            $parsedPath2 = parse_url($route['path'], PHP_URL_PATH);
            if ($route['method'] === $method && $parsedPath1 === $parsedPath2) {
                list($controller, $method) = $route['action'];
                $controllerFile = APP_PATH . str_replace('\\', '/', $controller) . '.php';
                if (file_exists($controllerFile)) {
                    require_once $controllerFile;
                } else {
                    throw new \Exception("Controller file for $controller not found");
                }
                if (class_exists($controller)) {
                    $controllerInstance = new $controller();
                    if (method_exists($controllerInstance, $method)) {
                        return $controllerInstance->$method();
                    } else {
                        throw new \Exception("Method $method not found in controller $controller");
                    }
                } else {
                    throw new \Exception("Controller class $controller not found");
                }
            }
        }

        return null;
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function getRoute($method, $path)
    {
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && preg_match($route['path'], $path)) {
                return $route;
            }
        }

        return null;
    }

}