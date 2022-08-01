<?php

use WghtTrackApp_ClassLib\App\Application;
use WghtTrackApp_ClassLib\App\Router;

require '../vendor/autoload.php';

define('VIEW_PATH',__DIR__ . '/../src/views');
$router = new Router();

$router
    ->get('/', [\WghtTrackApp_ClassLib\Controllers\HomeController::class, 'index'])
    ->get('/data-manager',[\WghtTrackApp_ClassLib\Controllers\DataManagerController::class,'index'])
    ->get('/data-manager/add',[\WghtTrackApp_ClassLib\Controllers\DataManagerController::class,'add']);



(new Application(
    $router,
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']]
))->run();