# GuTrödel – gescheiterter Prototyp & Post-Mortem

> **Projekt-Status:** Fehlgeschlagen / Unvollständiger Code-Rest  
> **Kontext:** BK GuT (Berufskolleg für Gestaltung und Technik)  
> **Zeitfenster:** ~45 Stunden (10 Tage × 4,5 h)  
> **Tech-Stack:** Native PHP (ohne Frameworks, ohne externe Libraries, ohne AI)

## 📌 Ursachenanalyse des Scheiterns (Post-Mortem)

Ziel des Projekts war eine vollständige E-Commerce-Plattform (inkl. Marktplatz, Chat und Forum). Das Projekt ist gescheitert. 

Die primären Gründe für den Abbruch und den unvollständigen Zustand:

* **Fokus auf Integration statt Durchsatz:** Etwa die Hälfte der gesamten Entwicklungszeit wurde darauf verwendet, Teammitglieder ohne Web- und Git-Vorkenntnisse einzubinden, Abläufe zu erklären und Git-Workflows für das Schulnetzwerk zu dokumentieren (`/documentation/how-to-use-git-in-school.md`).
* **Wissenskluft & Blockade:** Trotz des Aufwands konnte die Wissenslücke bezüglich Templating, PHP und Versionierung in der verbleibenden Zeit nicht überbrückt werden.
* **Zeitnot im Alleingang:** Die verbleibende Zeit reichte nicht aus, um den komplexen Scope (Routing, Auth, Templating, Datenbank) als einzelne Person in Native PHP fertigzustellen.

## 🛠️ Was im Repository verbleibt
* **`/`** – Unvollständige Code-Fragmente (Ansätze von Templating & nicht funktionierendes Auth-System)
* **`/documentation/bktroedel-install-guide.md`** – Dokumentierter Setup-Versuch
* **`/documentation/how-to-use-git-in-school.md`** – Erstellter Leitfaden zur Git-Nutzung unter Schulnetzwerk-Bedingungen

## 💡 Erkenntnis
Dieses Repository dokumentiert das Scheitern eines Projekts an der Schnittstelle zwischen unrealistischem Scope, fehlenden Team-Grundlagen und dem Versuch, Integration vor reine Code-Produktion zu stellen. Es zeigt eindrücklich, dass Zeit, die in fehlende Fundamente investiert wird, bei der Umsetzung fehlt, wenn der zeitliche Rahmen keinen Spielraum lässt.
