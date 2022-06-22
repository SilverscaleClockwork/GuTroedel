DROP DATABASE IF EXISTS GuTroedel;

CREATE DATABASE GuTroedel DEFAULT CHARSET=utf8;;
USE GuTroedel;

CREATE TABLE tbl_user
(
	pk_id_user int AUTO_INCREMENT PRIMARY KEY NOT NULL,
	password_salt char(16) NOT NULL,
	password_hash char(64) NOT NULL,
	super_user boolean NOT NULL
)
ENGINE = InnoDB;

CREATE TABLE tbl_nutzer
(
	pk_fk_id_nutzer int PRIMARY KEY NOT NULL,
	nutzer_email varchar(100) NOT NULL UNIQUE,
	nutzer_name varchar(20) NOT NULL,
	nutzer_nachname varchar(20) NOT NULL,
	nutzer_telefon varchar(20),
	FOREIGN KEY(pk_fk_id_nutzer)
		REFERENCES tbl_user(pk_id_user)
			ON UPDATE RESTRICT
			ON DELETE RESTRICT
)
ENGINE = InnoDB;

CREATE TABLE tbl_tag
(
	pk_schlagwort varchar(50) PRIMARY KEY NOT NULL
)
ENGINE = InnoDB;

CREATE TABLE tbl_zustand
(
	pk_zustand varchar(50) PRIMARY KEY NOT NULL
)
ENGINE = InnoDB;


CREATE TABLE tbl_ware
(
	pk_id_ware int AUTO_INCREMENT PRIMARY KEY NOT NULL,
	waren_name varchar(50) NOT NULL,
	waren_beschreibung varchar(2000) NOT NULL,
	
	fk_zustand varchar(50),
	FOREIGN KEY(fk_zustand)
		REFERENCES tbl_zustand(pk_zustand)
			ON UPDATE NO ACTION
			ON DELETE RESTRICT
)
ENGINE = InnoDB;

/*
TODO: tbl_bilder ans laufen kriegen.

CREATE TABLE tbl_bilder
(
	pk_id_bild int AUTO_INCREMENT PRIMARY KEY NOT NULL,
	ware_bild BLOB NOT NULL,
	fk_id_ware int NOT NULL,
	FOREIGN KEY(fk_id_ware)
		REFERENCES tbl_ware(pk_id_ware)
			ON UPDATE NO ACTION
			ON DELETE RESTRICT
)
ENGINE = InnoDB;
*/

-- Zwischentabelle um M zu N beziehung von tbl_ware und tbl_tag aufzulösen.
CREATE TABLE ztbl_ware_tag
(
	pk_fk_id_ware int NOT NULL,
	pk_fk_schlagwort varchar(50) NOT NULL,
	PRIMARY KEY(pk_fk_id_ware, pk_fk_schlagwort),
	FOREIGN KEY(pk_fk_schlagwort)
		REFERENCES tbl_tag(pk_schlagwort)
			ON UPDATE CASCADE
			ON DELETE RESTRICT,
	FOREIGN KEY(pk_fk_id_ware)
		REFERENCES tbl_ware(pk_id_ware)
			ON UPDATE CASCADE
			ON DELETE RESTRICT
)
ENGINE = InnoDB;

CREATE TABLE tbl_angebot
(
	pk_id_handel int AUTO_INCREMENT PRIMARY KEY NOT NULL,
	erstell_datum DATE NOT NULL,
	angebot_preis varchar(30) NOT NULL,
	fk_id_nutzer int NOT NULL,
	fk_id_ware int NOT NULL,
	FOREIGN KEY(fk_id_nutzer)
		REFERENCES tbl_nutzer(pk_fk_id_nutzer)
			ON UPDATE RESTRICT
			ON DELETE RESTRICT,
	FOREIGN KEY(fk_id_ware)
		REFERENCES tbl_ware(pk_id_ware)
			ON UPDATE RESTRICT
			ON DELETE RESTRICT
)
ENGINE = InnoDB;


