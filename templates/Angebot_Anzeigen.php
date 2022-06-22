<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $GLOBALS["title"] ?></title>
</head>
<body>
    <?= $GLOBALS["nav"] ?>
    <main>
        <h1><?= $GLOBALS["titel_ware"] ?></h1><br><br>
        <p><?= $GLOBALS["beschreibung_ware"] ?></p>
        <p><?= $GLOBALS["zustand_ware"] ?></p>
        <p><?= $GLOBALS["kategorie_checkbox"] ?></p>
        <p><?= $GLOBALS["preis_angebot"] ?></p>
        <p><?= $GLOBALS["vorname"] ?> <?= $GLOBALS["nachname"] ?></p>
        <p><?= $GLOBALS["email"] ?></p>
        <p><?= $GLOBALS["telefon"] ?></p>
        <p><?= $GLOBALS["erstell_datum"] ?></p>

        <form action="" method="post">

        </form>

         

    </main>
    
</body>
</html>