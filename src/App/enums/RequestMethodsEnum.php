<?php
declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\App\Enums;

class RequestMethodsEnum{
    public const GET = 'get';
    public const POST = 'post';

    public const Methods = [
        0 => self::GET,
        2 => self::POST
    ];
}