<?php
declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\DB_Models;

class WT_SqlStatements{

    public static function selectTableNameCount_SQLStatement(string $tableName): string{
        return <<<SQL
        SELECT count(name) AS nameCount
        FROM sqlite_master
        WHERE type = 'table'
        AND name = "$tableName"
        SQL;

    }

    // public static function createTable(string $tableName,array ...$param):string{
    //     $sql = <<<SQL
    //     CREATE TABLE $tableName

    //     SQL;


    //     foreach($param as $item){
    //         foreach($item as $value){
    //             $sql .= ' ' . $value;
    //         }
    //         $sql .= ',';
    //     }
        
    //     str
    //     return $sql;
    // }


    
    ## INITAL SETUP
    public const CREATE_TABLE_EntryItems = <<<SQL
    CREATE TABLE entryItems (
                 id	INTEGER,
                 weight	NUMERIC,
                 timeStamp	TEXT,
                 PRIMARY KEY(id AUTOINCREMENT)
             )
    SQL;


    ## EntryItem
}
