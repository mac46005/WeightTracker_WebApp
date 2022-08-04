<?php
declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\DB_Models;

use Composer\Autoload\ComposerStaticInit54ad5b20b7470b3981e27190b13ba9a1;

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


    ## EntryItem #######################################
    // readOne()
    // public static string $READONE_EntryItem = <<<SQL
    // SELECT id,weight
    //     FROM entryItems
    //     WHERE id = $id
    // SQL;


    // readAll()
    public const READALL_EntryItem = <<<SQL
    SELECT id,weight,timeStamp
    FROM entryItems
    SQL;

    // write()
    // public static string $WRITE_EntryItem = <<<SQL
    // INSERT INTO entryItems(weight,timeStamp)
    // VALUES ('$obj->weight', '${date('y-m-d h:m:s a')}')
    // SQL;
    public static function writeSqlStmt(string $tableName,array $colNames, array $colValues):string{

        $cols = implode(',',$colNames);

        
        $valFomatted = [];
        foreach($colValues as $value){
            $valFomatted[] = "'$value'";
        }
        $vals = implode(',', $valFomatted);



        $sql = <<<SQL
        INSERT INTO $tableName ($cols)
        VALUES ($vals)
        SQL;

        return $sql;
    }

    // delete()
    //public static string $DELETE_EntryItem = <<<SQL
    // DELETE entryItems
    // WHERE id = $id;
    // SQL;


    #####################################################
}
