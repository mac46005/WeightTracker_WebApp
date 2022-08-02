<?php
declare(strict_types = 1);
namespace WghtTrackApp_ClassLib\DB_Models\Enums;

class DBIniFile_Enum{
    public const DRIVER = 'driver';
    public const HOST = 'host';
    public const PORT = 'port';
    public const SCHEMA = 'schema';
    public const USERNAME = 'username';
    public const PASSWORD = 'password';
    public const CONNECTION_PATH = 'connectionPath';
    public const OPTIONS = [
        0 => DBIniFile_Enum::DRIVER,
        1 => DBIniFile_Enum::HOST,
        2 => DBIniFile_Enum::PORT,
        3 => DBIniFile_Enum::SCHEMA,
        4 => DBIniFile_Enum::USERNAME,
        5 => DBIniFile_Enum::PASSWORD,
        6 => DBIniFile_Enum::CONNECTION_PATH
    ];
}