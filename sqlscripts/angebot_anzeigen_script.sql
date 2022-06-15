SELECT
tbl_angebot.erstell_datum 		AS 'Erstellungs Datum',
tbl_nutzer.nutzer_email 		AS 'Verkäufer Email',
tbl_nutzer.nutzer_telefon 		AS 'Verkäufer Telefon',
tbl_nutzer.nutzer_name 			AS 'Verkäufer Name',
tbl_nutzer.nutzer_nachname 		AS 'Verkäufer Nachname',
tbl_ware.waren_name 			AS 'Ware',
tbl_angebot.angebot_preis 		AS 'Preis',
tbl_ware.fk_zustand 			AS 'Zustand',
tbl_ware.waren_beschreibung 	AS 'Beschreibung',
ztbl_ware_tag.pk_fk_schlagwort 	AS 'Tags'
FROM tbl_angebot
INNER JOIN tbl_nutzer ON tbl_angebot.fk_id_nutzer = tbl_nutzer.pk_fk_id_nutzer
INNER JOIN tbl_ware ON tbl_angebot.fk_id_ware = tbl_ware.pk_id_ware
INNER JOIN ztbl_ware_tag ON tbl_ware.pk_id_ware = ztbl_ware_tag.pk_fk_id_ware
WHERE tbl_angebot.pk_id_handel = ?;