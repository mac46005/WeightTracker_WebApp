<?php

declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\Exceptions;

class ViewNotFoundException extends \Exception{
    public function __construct(private string $viewPath = "")
    {
        parent::__construct("Error view not found!      Path:$viewPath");
    }
}