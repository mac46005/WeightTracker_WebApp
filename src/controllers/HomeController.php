<?php

declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\Controllers;

use WghtTrackApp_ClassLib\App\View;
use WghtTrackApp_ClassLib\DB_Models\Interfaces\IDBAccess;
use WghtTrackApp_ClassLib\DB_Models\WT_SqlStatements;
use WghtTrackApp_ClassLib\Models\EntryItem;

class HomeController{

    public function __construct(private IDBAccess $dbAccess)
    {
        
    }
    public function index(){
        $sql = <<<SQL
        XXX
        SQL;
        $pdoStatement = $this->dbAccess->query(WT_SqlStatements::$SELECT_RecentRecord);
        $recentRecord = $pdoStatement->fetchAll()[0];
        echo '<pre>';
        print_r($recentRecord);
        echo '</pre>';
        return View::create_View('index');
    }
}