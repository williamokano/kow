<?php
namespace Katapoka\Kow\Core;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;
use Katapoka\Kow\Core\Exceptions\MethodNotAllowedException;
use Katapoka\Kow\Core\Exceptions\RouteException;
use Katapoka\Kow\Core\Exceptions\RouteNotFoundException;

class Router
{
    private $routes = [];

    public function get($route, $handler)
    {
        $this->addRoute('GET', $route, $handler);
    }

    public function post($route, $handler)
    {
        $this->addRoute('POST', $route, $handler);
    }

    public function put($route, $handler)
    {
        $this->addRoute('PUT', $route, $handler);
    }

    public function delete($route, $handler)
    {
        $this->addRoute('DELETE', $route, $handler);
    }

    public function getAll()
    {
        return $this->routes;
    }

    public function addRoute($method, $route, $handler)
    {
        $this->routes[$method][] = [
            'route' => $route,
            'handler' => $handler
        ];
    }

    /**
     * @param $method
     * @param $path
     * @return array
     * @throws MethodNotAllowedException
     * @throws RouteException
     * @throws RouteNotFoundException
     */
    public function dispatch($method, $path)
    {
        $routeResponse = $this->getDispatcher()->dispatch($method, $path);

        return $this->processRouteInfo($routeResponse, $method, $path);
    }

    private function getDispatcher()
    {
        return simpleDispatcher(function (RouteCollector $r) {
            foreach ($this->routes as $verb => $routesInfo) {
                $this->registerRoutesToVerb($r, $verb, $routesInfo);
            }
        });
    }

    private function registerRoutesToVerb(RouteCollector $r, $verb, $routesInfo)
    {
        foreach ($routesInfo as $routeInfo) {
            $r->addRoute($verb, $routeInfo['route'], $routeInfo['handler']);
        }
    }

    /**
     * @param $routeInfo
     * @param $method
     * @param $path
     * @return array
     * @throws RouteNotFoundException
     * @throws MethodNotAllowedException
     * @throws RouteException
     */
    private function processRouteInfo($routeInfo, $method, $path)
    {
        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                throw new RouteNotFoundException($path);
            case Dispatcher::METHOD_NOT_ALLOWED:
                throw new MethodNotAllowedException($method, $path);
            case Dispatcher::FOUND:
                return array_slice($routeInfo, 1);
            default:
                throw new RouteException($path, "Unknown router state");
        }
    }
}
