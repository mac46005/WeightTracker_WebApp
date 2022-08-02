<?php

declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\Controllers;

use WghtTrackApp_ClassLib\App\Container;
use WghtTrackApp_ClassLib\App\View;
use WghtTrackApp_ClassLib\DB_Models\Interfaces\IDBAccess;

class DataManagerController{

    public function __construct(private Container $container, private IDBAccess $dbAccess)
    {
        
    }
    public function index(): View{
        return View::create_View('/datamanagerviews/index');
    }



    public function add(): View{
        return View::create_View('datamanagerviews/addEditView',[
            'status' => 'Add'
        ]);
    }
}