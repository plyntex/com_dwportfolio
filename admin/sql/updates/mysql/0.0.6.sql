DROP TABLE IF EXISTS `#__dwportfolio`;
 
CREATE TABLE `#__dwportfolio` (
	`id`       	INT(11)     NOT NULL AUTO_INCREMENT,
	`title` 	VARCHAR(25) NOT NULL,
	`published` tinyint(4) NOT NULL,
	`created` 	datetime,
	`menuitem` 	VARCHAR(25),
	`image`		VARCHAR(25),
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;
 