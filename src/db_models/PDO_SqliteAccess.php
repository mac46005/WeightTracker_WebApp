<?php
declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\DB_Models;

use WghtTrackApp_ClassLib\DB_Models\Enums\DBIniFile_Enum;
use WghtTrackApp_ClassLib\DB_Models\Exceptions\DB_IniConfigException;
use WghtTrackApp_ClassLib\DB_Models\Interfaces\ICRUD;
use WghtTrackApp_ClassLib\DB_Models\Interfaces\IDBAccess;

abstract class PDO_SqliteAccess implements IDBAccess{
    protected ?\PDO $db = NULL;
    public function __construct(
        protected string $configFilePath = ''
    )
    {
        $this->Connect();
    }
    public function Connect(){
        
        if($dbIniFile = parse_ini_file($this->configFilePath)){
            
            
            if($filePath = $dbIniFile[DBIniFile_Enum::OPTIONS[6]]){
                $this->db = new \PDO("sqlite:" . __DIR__. '/../'. $filePath);
            }else{
                
                throw new DB_IniConfigException();
            }
        }else{
            throw new \PDOException("Failed to connect to sqlite file");
        }
    }
    public function __destruct()
    {
    }
}