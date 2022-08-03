<?php
declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\DB_Models;

class WTSqliteAccess extends PDO_SqliteAccess{
    public function __construct(string $configFilePath)
    {
        parent::__construct($configFilePath);
    }

    public function readOne($id): mixed
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
    public function readAll(): mixed
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
        INSERT INTO entryItems(weight)
        VALUES ($obj->weight)
        SQL;

        $prepareStmt = $this->db->prepare($sql);
        $result = $prepareStmt->execute();
        
        return $result;
    }
    public function delete($id): bool
    {
        return FALSE;
    }
    public function update($object): bool
    {
        return FALSE;
    }

    public function query($sql): mixed
    {
        return FALSE;
    }
}