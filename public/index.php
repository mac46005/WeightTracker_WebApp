<?php
require '../vendor/autoload.php';
define('VIEW_PATH', __DIR__ . '/../src/views');
define('CONFIG_PATH', __DIR__ . '/../config');

use WghtTrackApp_ClassLib\App\Application;
use WghtTrackApp_ClassLib\App\Container;
use WghtTrackApp_ClassLib\Controllers\DataManagerController;
use WghtTrackApp_ClassLib\Controllers\HomeController;
use WghtTrackApp_ClassLib\DB_Models\Interfaces\IDBAccess;
use WghtTrackApp_ClassLib\DB_Models\WTSqliteAccess;
use WghtTrackApp_ClassLib\Models\TrackItem;

$iDatabase = new WTSqliteAccess(CONFIG_PATH . '/dbConn.ini');
$MyApplication = new Application(
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']]
);

$MyApplication::$router
    ->get('/', [\WghtTrackApp_ClassLib\Controllers\HomeController::class, 'index'])
    ->get('/data-manager',[\WghtTrackApp_ClassLib\Controllers\DataManagerController::class,'index'])
    ->get('/data-manager/view-item-form',[\WghtTrackApp_ClassLib\Controllers\DataManagerController::class,'viewItemForm'])
    ->post('/data-manager/delete',[DataManagerController::class,'delete']);

$MyApplication::$container
    ->set(HomeController::class,HomeController::class)
    ->set(DataManagerController::class,DataManagerController::class)
    ->set(
        IDBAccess::class, 
        function(Container $c){
            return new WTSqliteAccess(CONFIG_PATH . '/dbConn.ini');
        })
    ->set(TrackItem::class, TrackItem::class);
$MyApplication->run();

