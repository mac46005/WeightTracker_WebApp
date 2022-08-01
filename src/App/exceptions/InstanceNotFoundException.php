<?php

declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\App\Exceptions;

use Psr\Container\NotFoundExceptionInterface;

class InstanceNotFoundException extends \Exception implements NotFoundExceptionInterface{
}