<?php
declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\DB_Models;

use PDO_SqliteAccess;

class WghtTrck_DbAccessSqlite extends PDO_SqliteAccess{
    public function __construct(string $configFilePath)
    {
        parent::__construct($configFilePath);
    }
}