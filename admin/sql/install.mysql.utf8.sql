DROP TABLE IF EXISTS `#__dwportfolio`;
 
CREATE TABLE `#__dwportfolio` (
	`id`       	INT(11)     NOT NULL AUTO_INCREMENT,
	`title` 	VARCHAR(25) NOT NULL,
	`published` tinyint(4) NOT NULL,
	`created` 	datetime,
	`menuitem` 	VARCHAR(25),
	`image`		VARCHAR(25),
	`catid`	    int(11)    NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;
/*
INSERT INTO `slths_content_types` (`type_id`, `type_title`, `type_alias`, `table`, `rules`, `field_mappings`, `router`, `content_history_options`) VALUES (NULL, 'DWPortfolio', 'com_dwportfolio.dwportfolio', '{
  "special": {
    "dbtable": "#__dwportfolio",
    "key": "id",
    "type": "DWPortfolio",
    "prefix": "DWPortfolioTable",
    "config": "array()"
  }
}', '', '{
    "common":{
        "core_content_item_id":"id",
        "core_title":"title",
        "core_state":"state",
        "core_alias":"alias",
        "core_created_time":"created",
        "core_access":"access",
        "core_params":"attribs",
        "core_language":"language",
        "core_images":"images",
        "core_ordering":"ordering",
        "core_catid":"catid",
    }
}', '', '    "formFile":"administrator\\/components\\/com_dwportfolio\\/models\\/forms\\/dwportfolio.xml",
    "convertToInt":[
        "ordering"
    ],
    "displayLookup":[
        {
            "sourceColumn":"catid",
            "targetTable":"#__categories",
            "targetColumn":"id",
            "displayColumn":"title"
        },
        {
            "sourceColumn":"created_by",
            "targetTable":"#__users",
            "targetColumn":"id",
            "displayColumn":"name"
        },
        {
            "sourceColumn":"access",
            "targetTable":"#__viewlevels",
            "targetColumn":"id",
            "displayColumn":"title"
        }
    ]

}');
*/