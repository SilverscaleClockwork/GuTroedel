[back][1]
# BKTroedel Installation Guide
Dies ist eine [Installationsanleitung](#installation) für BKTrödel auf einem Ubuntu System.
Natürlich kann BKTrödel auf jeglichen Systemen einbeschlossen FreeBSD installiert werden.


## Empfehlungen

- Wir empfehlen einen Admin nutzer in der sudo/wheel group anzulegen und den zugriff auf den Root nutzer soweit es geht zu verhindern (beispiel via /sbin/nologin).

- Es wäre von vorteil eine Firewall einzurichten um zugriffe auf lokale MySQL server zu verhindern.

- Eine einfachere installation ist möglich mit CentOS und VestaCP.


## Installation
1. Updaten sie APT
```sh
sudo apt update
```

2. Installieren sie Apache2 und PHP 
```sh
sudo apt install apache2 php libapache2-mod-php php-mysql
```

3. Installieren sie MariaDB
```sh
sudo apt install mariadb-server
```

4. Configurieren sie die sicherheits Einstellungen von MariaDB
```sh
sudo mysql_secure_installation
```

5. Entpacken sie das Projekt in /var/www

6. Lassen sie das Initialise SQL Script Laufen
```sh
mysql --user root --password < initialise.sql
```

7. BKTroedle sollte nun einsatzfähig sein, dies zu Prüfen registrieren sie sich als erstnutzer (super user).

[1]: /ReadMe.md "Back to ReadMe file"
