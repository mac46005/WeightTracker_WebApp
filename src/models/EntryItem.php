<?php

declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\Models;

use DateTime;

class EntryItem{
    public DateTime $timeStamp;
    public function __construct(
        public int $id = 0,
        public float $weight = 0
        
    )
    {
        $this->id = (isset($_GET['id']))? $_REQUEST['id'] : $id;
        $this->weight = (isset($_REQUEST['weight']))? (float)$_REQUEST['weight'] : $weight;
        //$this->$timeStamp = ($timeStamp == "")? new DateTime('now') : new DateTime($timeStamp);
    }

    public function setTimeStamp($timeStamp){
        $this->timeStamp = new DateTime($timeStamp);
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