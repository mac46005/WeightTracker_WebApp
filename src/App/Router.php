<?php

declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\App;

use WghtTrackApp_ClassLib\App\Enums\RequestMethodsEnum;
use WghtTrackApp_ClassLib\App\Enums\RouteParamsEnum;
use WghtTrackApp_ClassLib\Exceptions\RouteNotFoundException;

class Router{
    private array $routes;

    public function __construct(private Container $container)
    {
        
    }
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

    /**
     * Currently set as ['route','request_method',['controller_class_name','action']]
     */
    public function registerRoutes(array ...$routeList){
        foreach($routeList as $routeItem){
            if(isset($routeItem[RouteParamsEnum::REQUEST_METHOD])){
                if($routeItem[RouteParamsEnum::REQUEST_METHOD] == RequestMethodsEnum::GET){
                    $this->get($routeItem[RouteParamsEnum::ROUTE],[$routeItem[RouteParamsEnum::CONTROLLER],$routeItem[RouteParamsEnum::ACTION]]);
                }else if($routeItem[RouteParamsEnum::REQUEST_METHOD] == RequestMethodsEnum::POST){
                    $this->post($routeItem[RouteParamsEnum::ROUTE],[$routeItem[RouteParamsEnum::CONTROLLER],$routeItem[RouteParamsEnum::ACTION]]);
                }
            }
        }
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
            [ $class, $method] = $action;

            if(class_exists($class)){
                $class = new $class();
                //$class = $this->container->get($class);
                if(method_exists($class, $method)){
                    return call_user_func_array([$class,$method], []);
                }
            }
        }

        throw new RouteNotFoundException($action);
    }
}