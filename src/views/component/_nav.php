<?php

use WghtTrackApp_ClassLib\DB_Models\Enums\CRUD_Enum;

?>
<nav>
    <div class="nav-container">
        <h4><a href="/">Weight Tracker</a></h4>
        <ul class="nav-menu">
            <li><a href="/data-manager">History</a></li>
            <li><a href="/data-manager/view-item-form?<?= CRUD_Enum::OPERATION?>=<?= CRUD_Enum::CREATE ?>&from=home">Record New</a></li>
        </ul>
    </div>
</nav>
