<?php 

declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\Exceptions;

class RouteNotFoundException extends \Exception{
    protected $message = 'Route Not found!';
    public function __construct($action = null)
    {
        parent::__construct("Failed to process route.");
        echo '<pre>';
        print_r($action);
        echo '</pre>';
    }
}