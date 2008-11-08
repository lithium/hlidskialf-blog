
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;


CREATE TABLE `user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(32),
	`password` VARCHAR(32),
	`real_name` VARCHAR(255),
	`email` VARCHAR(255),
	`enabled` INTEGER,
	`access` TINYINT default 12,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `uniqusername` (`username`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- post
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `post`;


CREATE TABLE `post`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`created_at` DATETIME,
	`slug` VARCHAR(255),
	`title` VARCHAR(255),
	`byline` VARCHAR(128),
	`posted_at` DATETIME,
	`body` TEXT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `uniqslug` (`slug`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tag
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tag`;


CREATE TABLE `tag`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`created_at` DATETIME,
	`name` VARCHAR(32),
	`description` TEXT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `uniqname` (`name`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- post_tag
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `post_tag`;


CREATE TABLE `post_tag`
(
	`post_id` INTEGER,
	`tag_id` INTEGER,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `uniqa` (`post_id`, `tag_id`),
	CONSTRAINT `post_tag_FK_1`
		FOREIGN KEY (`post_id`)
		REFERENCES `post` (`id`)
		ON DELETE CASCADE,
	INDEX `post_tag_FI_2` (`tag_id`),
	CONSTRAINT `post_tag_FK_2`
		FOREIGN KEY (`tag_id`)
		REFERENCES `tag` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- actionlog
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `actionlog`;


CREATE TABLE `actionlog`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`who` VARCHAR(255),
	`what` VARCHAR(255),
	`where` VARCHAR(255),
	`why` VARCHAR(255),
	`when` DATETIME,
	`from` VARCHAR(32),
	PRIMARY KEY (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
