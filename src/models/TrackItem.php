<?php

declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\Models;

use DateTime;

class TrackItem{

    public function __construct(
        public int $id = (isset($_POST['id']))? $_POST['id'] : 0,
        public float $weight = (isset($_POST['weight'])),
        public DateTime $dateTime = new DateTime('now')
    )
    {
        
    }
}