<?php

declare(strict_types = 1);
namespace WghtTrackApp_ClassLib\DB_Models;

use PDO;

class PDO_Access extends PDO{
    public function __construct($file = 'my_setting.ini')
    {
        if (!$settings = parse_ini_file($file, TRUE)) throw new \Exception('Unable to open ' . $file . '.');
       
        $dns = $settings['database']['driver'] .
        ':host=' . $settings['database']['host'] .
        ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
        ';dbname=' . $settings['database']['schema'];
       
        parent::__construct($dns, $settings['database']['username'], $settings['database']['password']);
    }
}