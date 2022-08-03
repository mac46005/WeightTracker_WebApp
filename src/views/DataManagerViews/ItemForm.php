<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Edit Item</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/components/_nav.css">
    <link rel="stylesheet" href="/css/components/_forms.css">
    <link rel="stylesheet" href="/css/sections/addeditview.css">
</head>
<body>
    <div class="body-container">
        <?php

use WghtTrackApp_ClassLib\DB_Models\Enums\CRUD_Enum;

 include VIEW_PATH . '/component/_nav.php'; ?>

        <header>
            <div class="header-container">
                <h1><?= ($operation == CRUD_Enum::CREATE)? 'New Entry' : 'Updating' ?> Item</h1>
            </div>
        </header>

        <main>
            <div class="main-container">
                <form action="/submit-item-form?<?= CRUD_Enum::OPERATION?>=<?= $operation ?>&from=<?= $from ?>" method="POST">
                    <label for="weight">Set weight:</label>
                    <input type="text" name="weight" id="weight">
                    <input type="submit" value="Submit">
                </form>
            </div>
        </main>


    </div>
</body>
</html>