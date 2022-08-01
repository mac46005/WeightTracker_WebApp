<?php
declare(strict_types = 1);

use WghtTrackApp_ClassLib\DB_Models\Exceptions\DB_IniConfigException;

class PDO_SqliteAccess{
    public function Connect(string $configFile): PDO|NULL{
        $pdoConnection = NULL;
        if($dbIniFile = parse_ini_file($configFile)){
            if($connectionPath = $dbIniFile['connectionPath']){
                return new \PDO("sqlite:" . $connectionPath);
            }else{
                throw new DB_IniConfigException();
            }
        }else{
            throw new PDOException("Failed to connect to sqlite file");
        }
        return $pdoConnection;
    }
}