<?php

declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\Models;

use DateTime;

class EntryItem{

    public function __construct(
        public int $id = 0,
        public float $weight = 0,
        public DateTime $timeStamp = new DateTime('now')
    )
    {
        $this->id = (isset($_GET['id']))? $_GET['id'] : $id;
        $this->weight = (isset($_GET['weight']))? $_GET['weight'] : $weight;
    }

    public function __toString()
    {
        return <<<TOSTRING
        id: $this->id\n
        weight: $this->weight\n
        timeStamp: $this->timeStamp
        TOSTRING;
    }
}