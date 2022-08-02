<?php

declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\DB_Models\Interfaces;

interface IReadOne{
    function readOne($id):mixed;
}