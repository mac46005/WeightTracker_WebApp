<?php

declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\Controllers;

use WghtTrackApp_ClassLib\App\Container;
use WghtTrackApp_ClassLib\App\View;
use WghtTrackApp_ClassLib\Models\User;

class SettingsController{
    public function __construct(private Container $container)
    {
        
    }

    /**
     * @method GET
     */
    public function MySettings(){
        // 1. Get User.ini file
        if($userIni = file(CONFIG_PATH . '/User.ini')){
            echo '<pre>';
            print_r($userIni);
            echo '</pre>';
        }
        
        // 2. Load information
        // 3. Send to view
        return View::create_View('/user-settings');
    }

    /**
     * @method POST
     */
    public function updateUser(){
        $user = $this->container->get(User::class);
        //1. put data in User.ini file

    }
}