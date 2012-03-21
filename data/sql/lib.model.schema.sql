
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- scope
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `scope`;

CREATE TABLE `scope`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(128) NOT NULL,
	`ip` VARCHAR(16),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `unique_name` (`name`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- link
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `link`;

CREATE TABLE `link`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`scope_id` INTEGER(11) NOT NULL,
	`url` VARCHAR(255) NOT NULL,
	`details` VARCHAR(64),
	`label` VARCHAR(32),
	`ip` VARCHAR(16),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `link_FI_1` (`scope_id`),
	CONSTRAINT `link_FK_1`
		FOREIGN KEY (`scope_id`)
		REFERENCES `scope` (`id`)
		ON UPDATE RESTRICT
		ON DELETE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
