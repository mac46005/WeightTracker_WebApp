<?php

declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\App;

use WghtTrackApp_ClassLib\Exceptions\RouteNotFoundException;

class Router{
    private array $routes;

    public function register(string $requestMethod, string $route, callable|array $action,array $params = []): self{
        $this->routes[$requestMethod][$route] = $action;
        $this->routes[$requestMethod]['params'] = $params;

        return $this;
    }

    public function get(string $route, callable|array $action,array $params = []): self{
        return $this->register('get',$route,$action,$params);
    }
    public function post(string $route, callable|array $action,array $params = []): self{
        return $this->register('post',$route,$action,$params);
    }

    public function routes(): array{
        return $this->routes;
    }

    public function resolve(string $requestUri, string $requestMethod){
        $route = explode('?', $requestUri)[0];
        $action = $this->routes[$requestMethod][$route] ?? null;

        if(! $action){
            throw new \WghtTrackApp_ClassLib\Exceptions\RouteNotFoundException();
        }

        if(is_callable($action)){
            return call_user_func($action);
        }

        if(is_array($action)){
            [$class,$method] = $action;

            if(class_exists($class)){
                $class = new $class();

                if(method_exists($class, $method)){
                    return call_user_func_array([$class,$method], []);
                }
            }
        }

        throw new RouteNotFoundException($action);
    }
}