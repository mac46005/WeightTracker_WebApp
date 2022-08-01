<?php

use WghtTrackApp_ClassLib\App\Application;
use WghtTrackApp_ClassLib\App\Container;
use WghtTrackApp_ClassLib\App\Router;
use WghtTrackApp_ClassLib\Controllers\HomeController;
use WghtTrackApp_ClassLib\DB_Models\Interfaces\IDatabase;
use WghtTrackApp_ClassLib\DB_Models\WghtTrck_DbAccessSqlite;

require '../vendor/autoload.php';

define('VIEW_PATH',__DIR__ . '/../src/views');

// $router = new Router();
// define('CONFIG_PATH',__DIR__ . '/../config');
// $idatabase = new WghtTrck_DbAccessSqlite(CONFIG_PATH . '/dbConn.ini');
// $router
//     ->get('/', [\WghtTrackApp_ClassLib\Controllers\HomeController::class, 'index'])
//     ->get('/data-manager',[\WghtTrackApp_ClassLib\Controllers\DataManagerController::class,'index'])
//     ->get('/data-manager/add',[\WghtTrackApp_ClassLib\Controllers\DataManagerController::class,'add']);



$MyApplication = new Application(
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
    $idatabase
);

$MyApplication::$router
    ->get('/', [\WghtTrackApp_ClassLib\Controllers\HomeController::class, 'index'])
    ->get('/data-manager',[\WghtTrackApp_ClassLib\Controllers\DataManagerController::class,'index'])
    ->get('/data-manager/add',[\WghtTrackApp_ClassLib\Controllers\DataManagerController::class,'add']);

$MyApplication::$container->set(
    HomeController::class,
    function(Container $c){
        // Simulates a factory 
        // return new HomeController(
        //     $c->get(SERVICE)
        // );
    }
);

$MyApplication->run();

