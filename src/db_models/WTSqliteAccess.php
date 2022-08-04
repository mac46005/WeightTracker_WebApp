<?php
declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\DB_Models;

class WTSqliteAccess extends PDO_SqliteAccess{
    public function __construct(string $configFilePath)
    {
        parent::__construct($configFilePath);
        $this->initialSetup();
    }

    public function readOne($id): mixed
    {
        try{
            $result = $this->db->query(WT_SqlStatements::$READONE_EntryItem);
            return $result;
        }catch(\PDOException $ex){
            throw $ex;
        }
        
        return FALSE;
    }
    public function readAll(): mixed
    {
        try{
            $result = $this->db->query(WT_SqlStatements::READALL_EntryItem);
            return $result;
        }catch(\PDOException $ex){
            throw $ex;
        }
        return FALSE;
    }
    public function write($obj): bool
    {
        try{
            $prepareStmt = $this->db->prepare(WT_SqlStatements::writeSqlStmt('entryItems',['weight','timeStamp'],[$obj->weight,date('m/d/Y h:m:s a')]));
            $result = $prepareStmt->execute();
            return $result;
        }catch(\PDOException $ex){
            throw $ex;
        }
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


    public function initialSetup(){
        $this->Connect();
        $pdoStatement = $this->db->query(WT_SqlStatements::selectTableNameCount_SQLStatement('entryItems'));

        $result = $pdoStatement->fetchAll()[0]['nameCount'];
        if($result == 0){
            $this->db->exec(WT_SqlStatements::CREATE_TABLE_EntryItems);
        }
    }
}