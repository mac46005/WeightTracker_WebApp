<?php

declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\Controllers;

use WghtTrackApp_ClassLib\App\Container;
use WghtTrackApp_ClassLib\App\View;
use WghtTrackApp_ClassLib\DB_Models\Interfaces\IDBAccess;
use WghtTrackApp_ClassLib\DB_Models\WT_SqlStatements;
use WghtTrackApp_ClassLib\Models\EntryItem;

class HomeController{

    public function __construct(private Container $container, private IDBAccess $dbAccess)
    {
        
    }
    public function index(){
        $sql = <<<SQL
        XXX
        SQL;
        $pdoStatement = $this->dbAccess->query(WT_SqlStatements::$SELECT_RecentRecord);

        $entryList = $this->dbAccess->readAll();

        [$weight,$timeStamp] = $pdoStatement->fetchAll()[0];
        return View::create_View('index',['weight'=> $weight,'timeStamp' => $timeStamp,'entryList' => $entryList]);
    }
}