<?php

declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\Controllers;

use WghtTrackApp_ClassLib\App\View;

class HomeController{
    public function index(){
        return View::create_View('index');
    }
}