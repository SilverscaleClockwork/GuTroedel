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
        <h1>Registrieren sie sich hier.</h1>
        <form action="" method="post">
            <ul>
                <li>
                    Vorname: <input type="text" name="vorname" id="vorname-pl">
                </li>
                <li>
                    Nachname: <input type="text" name="nachname" id="nachname-pl">
                </li>
                <li>
                    E-Mail*: <input type="email" name="email" id="email-pl">
                </li>
                <li>    
                    Password*: <input type="password" name="password" id="pwd-pl">
                </li>
                <li>
                    <input type="submit" value="Anmelden">
                </li>
                <input type="hidden" name="register" value=1>
            </ul>
        </form>
    </main>
</body>
</html>
