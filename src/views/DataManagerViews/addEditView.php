<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Edit Item</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/components/_nav.css">
</head>
<body>
    <div class="body-container">
        <?php include VIEW_PATH . '/component/_nav.php'; ?>

        <header>
            <div class="header-container">
                <h1>Add/Edit Items</h1>
            </div>
        </header>

        <main>
            <div class="main-container">
                <form action="">
                    <label for="weight">New weight:</label>
                    <input type="text" name="weight" id="weight">
                </form>
            </div>
        </main>


    </div>
</body>
</html>