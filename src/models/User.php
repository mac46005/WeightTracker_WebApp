<?php

declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\Models;

class User{
    public function __construct(
        public string $firstName = "",
        public string $lastName = "",
        public float $goalWeight = 0
    )
    {
        $this->firstName = (isset($_GET['firstName']))? $_GET['firstName'] : "";
        $this->lastName = (isset($_GET['lastName']))? $_GET['lastName'] : "";
        $this->goalWeight = (isset($_GET['weight']))? $_GET['weight'] : "";
    }
}