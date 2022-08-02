<?php
require '../vendor/autoload.php';

define('VIEW_PATH', __DIR__ . '/../src/views');


use WghtTrackApp_ClassLib\App\Application;
use WghtTrackApp_ClassLib\App\Container;
use WghtTrackApp_ClassLib\Controllers\DataManagerController;
use WghtTrackApp_ClassLib\Controllers\HomeController;
use WghtTrackApp_ClassLib\DB_Models\WghtTrck_DBAccessSqlite;
use WghtTrackApp_ClassLib\DB_Models\WT_DBAccess_Sqlite;


$MyApplication = new Application(
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']]
);

$MyApplication::$router
    ->get('/', [\WghtTrackApp_ClassLib\Controllers\HomeController::class, 'index'])
    ->get('/data-manager',[\WghtTrackApp_ClassLib\Controllers\DataManagerController::class,'index'])
    ->get('/data-manager/add',[\WghtTrackApp_ClassLib\Controllers\DataManagerController::class,'add']);

$MyApplication::$container
    ->set(
        HomeController::class,
        function(Container $c){
            // Simulates a factory 
            // return new HomeController(
            //     $c->get(SERVICE)
            // );
            return new HomeController();
        }
    )
    ->set(
        DataManagerController::class,
        function(Container $c){
            return new DataManagerController();
        }
    );

$MyApplication->run();

