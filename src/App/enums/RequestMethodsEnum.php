<?php
declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\App\Enums;

class RequestMethodsEnum{
    public static const GET = 'get';
    public static const POST = 'post';

    public static const Methods = [
        0 => self::GET,
        2 => self::POST
    ];
}