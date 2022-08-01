<?php
declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\App\Enums;

class RouteParamsEnum{
    public const ROUTE = 'route';
    public const REQUEST_METHOD = 'request_method';
    public const CONTROLLER = 'controller';
    public const ACTION = 'action';
    public const PARAMETERS = 'params';

    public const OPTIONS = [
        self::ROUTE => self::ROUTE,
        self::REQUEST_METHOD => self::REQUEST_METHOD,
        self::CONTROLLER => self::CONTROLLER,
        self::ACTION => self::ACTION,
        self::PARAMETERS => self::PARAMETERS
    ];
}