<?php
declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\DB_Models\Interfaces;

interface IQuery{
    function query($sql):mixed;
}