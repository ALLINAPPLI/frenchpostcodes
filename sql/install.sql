SET NAMES utf8;

DROP TABLE IF EXISTS `frenchcodeposte`;
CREATE TABLE `frenchcodeposte` (
`id` int(8) NOT NULL AUTO_INCREMENT,
`Code_commune_INSEE` VARCHAR(255) NOT NULL DEFAULT '',
`Nom_commune` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'City.',
`Code_postal` varchar(255) NOT NULL DEFAULT '0' COMMENT 'Postal / ZIP code.',
`Ligne_5` VARCHAR(255) NULL,
`Libellé_d_acheminement` VARCHAR(255) NOT NULL DEFAULT '',
`coordonnees_gps` VARCHAR(255) NOT NULL DEFAULT '',
PRIMARY KEY (`id`)
)ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Dumping data for table `frenchcodeposte`
--

-- BULK INSERT frenchcodeposte
-- FROM 'laposte_hexasmal.csv'
-- WITH
-- (
--     FIELDTERMINATOR = ';',  
--     ROWTERMINATOR = '\n',
-- ]

-- LOAD DATA LOCAL INFILE 'laposte_hexasmal.csv'
-- INTO TABLE frenchcodeposte
-- FIELDS TERMINATED BY ';'
-- ENCLOSED BY ''
-- LINES TERMINATED BY '/n'
-- IGNORE 1 ROWS;


-- INSERT INTO frenchcodeposte VALUES
-- ('02547','LA NEUVILLE HOUSSET',02250,'','LA NEUVILLE HOUSSET','49.7881379377/3.73171627307')
