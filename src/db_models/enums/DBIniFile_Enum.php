<?php
declare(strict_types = 1);
namespace WghtTrackApp_ClassLib\DB_Models\Enums;

class DBIniFile_Enum{
    public static const DRIVER = 'driver';
    public static const HOST = 'host';
    public static const PORT = 'port';
    public static const SCHEMA = 'schema';
    public static const USERNAME = 'username';
    public static const PASSWORD = 'password';
    public static const LIST = [
        0 => DBIniFile_Enum::DRIVER,
        1 => DBIniFile_Enum::HOST,
        2 => DBIniFile_Enum::PORT,
        3 => DBIniFile_Enum::SCHEMA,
        4 => DBIniFile_Enum::USERNAME,
        5 => DBIniFile_Enum::PASSWORD
    ];
}