<?php
declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\DB_Models;

<<<<<<< HEAD
use WghtTrackApp_ClassLib\DB_Models\PDO_SqliteAccess;

class WT_DBAccess_Sqlite extends PDO_SqliteAccess{

=======
use PDO_SqliteAccess;

class WghtTrck_DbAccessSqlite extends PDO_SqliteAccess{
>>>>>>> parent of 8c6befc (Testing out read function)
    public function __construct(string $configFilePath)
    {
        parent::__construct($configFilePath);
    }
<<<<<<< HEAD

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
=======
>>>>>>> parent of 8c6befc (Testing out read function)
}