<?php

declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\App;

use WghtTrackApp_ClassLib\Controllers\HomeController;
use WghtTrackApp_ClassLib\DB_Models\Interfaces\ICRUD;
use WghtTrackApp_ClassLib\DB_Models\Interfaces\IDatabase;
use WghtTrackApp_ClassLib\DB_Models\Interfaces\IDBAccess;
use WghtTrackApp_ClassLib\DB_Models\WghtTrck_DbAccessSqlite;
use WghtTrackApp_ClassLib\Exceptions\RouteNotFoundException;
use WghtTrackApp_ClassLib\Models\WT_Config;

class Application{
    public static Router $router;
    private static IDBAccess $db = NULL;
    public static Container $container = new Container();
    //private static DB $db;

    public function __construct(protected array $request,IDBAccess $database = NULL)
    {
        //static::$db= new DB($config->db ??[]);
        if($database)
        static::$db = $database;
        
        self::$router = new Router(self::$container);
    }

    public static function db(){
        return static::$db;
    }
    

    public function run(){
        try{
            echo $this->router->resolve($this->request['uri'],strtolower($this->request['method']));
        }catch(RouteNotFoundException $ex){
            http_response_code(404);

            //echo View::create_View('error/404');
            echo $ex;
        }
    }
}