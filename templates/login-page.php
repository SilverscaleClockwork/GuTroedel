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
        <h1>Loggen sie sich ein.</h1>
        <form action="" method="post">
            <ul>
                <li>
                    E-Mail: <input type="email" name="email" id="email-pl">
                </li>
                <li>    
                    Password: <input type="password" name="password" id="pwd-pl">
                </li>
                <li>
                    <input type="submit" value="Anmelden">
                </li>
                <input type="hidden" name="login" value=1>
            </ul>
        </form>
    </main>
</body>
</html>
