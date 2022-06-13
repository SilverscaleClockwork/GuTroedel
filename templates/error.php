<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $GLOBALS["title"] ?></title>
</head>
<body>
    <?= $GLOBALS["nav"] ?>
    <main>
        <h1>Error <?= $GLOBALS["errno"] ?></h1>
        <p>
            <?= $GLOBALS["errmsg"] ?>
        </p>
    </main>
</body>
</html>
