<?php
declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\DB_Models\Enums;

class CRUD_Enum{
    public const CREATE = 'create';
    public const READ = 'read';
    public const WRITE = 'write';
    public const UPDATE = 'update';
    public const DELETE = 'delete';
    public const QUERY = 'query';
    public const OPERATION = 'operation';

    public const CRUD_OPs = [
        self::CREATE => 'create',
        self::READ => 'read',
        self::WRITE => 'write',
        self::UPDATE => 'update',
        self::DELETE => 'delete',
        self::QUERY => 'query',
        self::OPERATION => 'operation'
    ];
}