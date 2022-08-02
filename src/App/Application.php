<?php

declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\App;

use WghtTrackApp_ClassLib\DB_Models\Interfaces\IDBAccess;
use WghtTrackApp_ClassLib\App\Exceptions\RouteNotFoundException;

class Application{
    public static Router $router;
    private static IDBAccess $db;
    public static Container $container;
    //private static DB $db;

    public function __construct(protected array $request)
    {
        self::$container = new Container();
        self::$router = new Router(self::$container);
    }

    public static function db(){
        return static::$db;
    }
    
    // ['route','request_method',['controller_class_name','action']]
    // public function configureRoutes(array ...$routeList):self{
    //     $this->router->registerRoutes($routeList);
    //     return $this;
    // }

    public function setDatabase(IDBAccess $database){
        self::$db = $database;
        self::$container->set(IDBAccess::class, self::$db::class);


        
    }

    public function run(){
        try{
            self::$container->set(Container::class,function(){
                return self::$container;
            });

            echo self::$router->resolve($this->request['uri'],strtolower($this->request['method']));
        }catch(RouteNotFoundException $ex){
            http_response_code(404);

            //echo View::create_View('error/404');
            echo $ex;
        }
    }
}