SELECT
tbl_angebot.erstell_datum 		AS 'Erstellungs Datum',
tbl_ware.waren_name 			AS 'Ware',
ztbl_ware_tag.pk_fk_schlagwort 	AS 'Tags',
tbl_ware.fk_zustand 			AS 'Zustand',
tbl_angebot.angebot_preis 		AS 'Preis'
FROM tbl_angebot
INNER JOIN tbl_ware ON tbl_angebot.fk_id_ware = tbl_ware.pk_id_ware
INNER JOIN ztbl_ware_tag ON tbl_ware.pk_id_ware = ztbl_ware_tag.pk_fk_id_ware
WHERE ztbl_ware_tag.pk_fk_schlagwort LIKE ? OR tbl_ware.waren_name LIKE ?;