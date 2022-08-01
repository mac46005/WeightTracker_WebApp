<?php
declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\DB_Models;

use WghtTrackApp_ClassLib\DB_Models\PDO_SqliteAccess;

class WT_DBAccess_Sqlite extends PDO_SqliteAccess{

    public function __construct(string $configFilePath)
    {

        parent::__construct($configFilePath);
    }

    public function readOne($id): mixed|bool
    {
        $sql = <<<SQL
        SELECT id,weight
        FROM entryItems
        WHERE id = $id
        SQL;
        try{
            $result = $this->db->query($sql);
            return $result;
        }catch(\PDOException $ex){
            throw $ex;
        }
        
        return FALSE;
    }
    public function readAll(): mixed|bool
    {
        $sql = <<<SQL
        SELECT id,weight
        FROM entryItems
        SQL;
        try{
            $result = $this->db->query($sql);
            return $result;
        }catch(\PDOException $ex){
            throw $ex;
        }
        return FALSE;
    }
    public function write($obj): bool
    {
        $sql = <<<SQL

        SQL;
        return FALSE;
    }
    public function delete($id): bool
    {
        return FALSE;
    }
    public function update($object): bool
    {
        return FALSE;
    }

    public function query($sql): mixed|bool
    {
        return FALSE;
    }
}