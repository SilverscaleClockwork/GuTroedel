<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $GLOBALS["title"] ?></title>
</head>

<body>
    <?= $GLOBALS["nav"] ?>
    <main>
        <p>Angebot erstellen</p>
        <kbd>Hier können Sie Angebote erstellen</kbd>

        <h1>Anzeige aufgeben</h1>
        <p>Wie möchten Sie Ihre Anzeige gestalten?
        <p>

        <!--<p><a href=C:\Users\Marissa\Pictures>Bild einfügen</a></p>-->

        <p><kbd>Ich biete</kbd></p>


        

        <form action="" method="post">
            <!--TODO Bild input-->
            <input type="text" class="titel" name="titel_ware" placeholder="Titel"><br><br>     <!--Name der Ware-->
            <label for="kategorie">Kategorien hinzufügen:</label>   <!--TODO: Zu einer  "Klapp-Tabelle" machen-->
            <ul>
                <li><input type="checkbox" class="kategorie" id="k_buch" name="kategorie_checkbox"> <label for="k_buch">Buch</label></li>
                <li><input type="checkbox" class="kategorie" id="k_taschenrechner" name="kategorie_checkbox"> <label for="k_taschenrechner">Taschenrechner</label></li>
                <li><input type="checkbox" class="kategorie" id="k_festplatte" name="kategorie_checkbox"> <label for="k_festplatte">Festplatte</label></li>
                <li><input type="checkbox" class="kategorie" id="k_itas" name="kategorie_checkbox"> <label for="k_itas">ITAs</label></li>
                <li><input type="checkbox" class="kategorie" id="k_etas" name="kategorie_checkbox"> <label for="k_etas">ETAs</label></li>
                <li><input type="checkbox" class="kategorie" id="k_gtas" name="kategorie_checkbox"> <label for="k_gtas">GTAs</label></li>
            </ul>
            <textarea class="discription" name="beschreibung_ware" rows="20" cols="100" placeholder="Beschreibung"></textarea><br><br> <!--Beschreibung der Ware-->
            <label for="zustand">Zustand des Produktes:</label> <!--Zustand der Ware-->
            <ul>
                <li><input type="radio" class="zustand" id="z_orginalverpackt" name="zustand_ware"> <label for="z_orginalverpackt">Orginalverpackt</label></li>
                <li><input type="radio" class="zustand" id="z_nie_verwendet" name="zustand_ware"> <label for="z_nie_verwendet">Nie Verwendet</label></li>
                <li><input type="radio" class="zustand" id="z_leichte_gebrauchsspuren" name="zustand_ware"> <label for="z_leichte_gebrauchsspuren">Leichte Gebrauchsspuren</label></li>
                <li><input type="radio" class="zustand" id="z_mittlere_gebrauchsspuren" name="zustand_ware"> <label for="z_mittlere_gebrauchsspuren">Mittlere Gebrauchsspuren</label></li>
                <li><input type="radio" class="zustand" id="z_starke_gebrauchsspuren" name="zustand_ware"> <label for="z_starke_gebrauchsspuren">Starke Gebrauchsspuren</label></li>
            </ul>
            <input type="text" class="price" name="preis_angebot" placeholder="Preis"><br><br> <!--Preis der Ware-->
            <input type="submit" value="Angebot erstellen">
        </form>

    </main>
</body>

</html>