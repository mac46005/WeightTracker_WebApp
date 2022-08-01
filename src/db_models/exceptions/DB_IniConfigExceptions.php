<?php

declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\DB_Models\Exceptions;
class DB_IniConfigException extends \Exception{
    protected $message = "Failed to read fron ini file.";
}