<?php
declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\DB_Models\Interfaces;

interface IDelete{
    function delete($id):bool;
}