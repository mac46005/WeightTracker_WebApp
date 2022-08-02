<?php
require '../vendor/autoload.php';
define('VIEW_PATH', __DIR__ . '/../src/views');
define('CONFIG_PATH', __DIR__ . '/../config');

use WghtTrackApp_ClassLib\App\Application;
use WghtTrackApp_ClassLib\Controllers\DataManagerController;
use WghtTrackApp_ClassLib\Controllers\HomeController;
use WghtTrackApp_ClassLib\DB_Models\WTSqliteAccess;

$iDatabase = new WTSqliteAccess(CONFIG_PATH . '/dbConn.ini');
$MyApplication = new Application(
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']]
);

$MyApplication::$router
    ->get('/', [\WghtTrackApp_ClassLib\Controllers\HomeController::class, 'index'])
    ->get('/data-manager',[\WghtTrackApp_ClassLib\Controllers\DataManagerController::class,'index'])
    ->get('/data-manager/add',[\WghtTrackApp_ClassLib\Controllers\DataManagerController::class,'add']);

$MyApplication::$container
    ->set(
        HomeController::class,HomeController::class
    )
    ->set(
        DataManagerController::class,DataManagerController::class
    );
$MyApplication->setDatabase($iDatabase);
$MyApplication->run();

