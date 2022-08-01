<?php

declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\Models;

use DateTime;

class TrackItem{


    public function __construct(
        public int $id = 0,
        public float $weight = 0,
        public DateTime $dateTime = new DateTime('now')
    )
    {
        
    }
}