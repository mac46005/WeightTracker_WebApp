<?php

use WghtTrackApp_ClassLib\App\Application;
use WghtTrackApp_ClassLib\App\Router;

require '../vendor/autoload.php';

define('VIEW_PATH',__DIR__ . '/../src/views');
$router = new Router();

$router
    ->get('/', [\WghtTrackApp_ClassLib\Controllers\HomeController::class, 'index'])
    ->get('/history',[\WghtTrackApp_ClassLib\Controllers\HistoryController::class,'index']);



(new Application(
    $router,
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']]
))->run();