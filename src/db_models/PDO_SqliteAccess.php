<?php
declare(strict_types = 1);

use WghtTrackApp_ClassLib\DB_Models\Enums\DBIniFile_Enum;
use WghtTrackApp_ClassLib\DB_Models\Exceptions\DB_IniConfigException;
use WghtTrackApp_ClassLib\DB_Models\Interfaces\ICRUD;

abstract class PDO_SqliteAccess implements ICRUD{
    protected PDO $db = NULL;
    public function __construct(
        private string $configFilePath = ''
    )
    {
        
    }


    public function Connect(){

        if($dbIniFile = parse_ini_file($this->configFilePath)){
            if($connectionPath = $dbIniFile[DBIniFile_Enum::OPTIONS[6]]){
                $this->db = new \PDO("sqlite:" . $connectionPath);
            }else{
                throw new DB_IniConfigException();
            }
        }else{
            throw new PDOException("Failed to connect to sqlite file");
        }
    }
}