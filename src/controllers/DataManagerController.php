<?php

declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\Controllers;

use WghtTrackApp_ClassLib\App\View;

class DataManagerController{
    public function index(): View{
        return View::create_View('/datamanagerviews/index');
    }

    public function add(): View{
        return View::create_View('datamanagerviews/addEditView');
    }
}