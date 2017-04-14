CREATE TABLE `menus` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`menu_id_superior` INT(11) NULL DEFAULT NULL,
	`descricao` VARCHAR(40) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FK_MENU_SUPERIOR` (`menu_id_superior`),
	CONSTRAINT `FK_MENU_SUPERIOR` FOREIGN KEY (`menu_id_superior`) REFERENCES `menus` (`id`)
)
ENGINE=InnoDB;

INSERT INTO `menus` (`id`, `menu_id_superior`, `descricao`) VALUES (1, NULL, 'Menu 1');
INSERT INTO `menus` (`id`, `menu_id_superior`, `descricao`) VALUES (2, NULL, 'Menu 2');
INSERT INTO `menus` (`id`, `menu_id_superior`, `descricao`) VALUES (3, 1, 'Menu 1.1');
INSERT INTO `menus` (`id`, `menu_id_superior`, `descricao`) VALUES (4, 3, 'Menu 1.1.1');
INSERT INTO `menus` (`id`, `menu_id_superior`, `descricao`) VALUES (5, 4, 'Menu 1.1.1.1');
INSERT INTO `menus` (`id`, `menu_id_superior`, `descricao`) VALUES (6, 1, 'Menu 1.2');
INSERT INTO `menus` (`id`, `menu_id_superior`, `descricao`) VALUES (7, 2, 'Menu 2.1');
INSERT INTO `menus` (`id`, `menu_id_superior`, `descricao`) VALUES (8, 2, 'Menu 2.2');