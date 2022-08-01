<?php

declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\Controllers;

use WghtTrackApp_ClassLib\App\View;

class HistoryController{
    public function index(): View{
        return View::create_View('/history/index');
    }
}