
USE `linhbui`;

-- DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
  `old_slugs` VARCHAR(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` VARCHAR(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` VARCHAR(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_title` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `h1` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_path` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` SMALLINT(4) DEFAULT NULL,
  `is_hot` TINYINT(1) DEFAULT NULL,
  `is_active` TINYINT(1) DEFAULT NULL,
  `created_at` INT(11) NOT NULL,
  `created_by` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` INT(11) DEFAULT NULL,
  `updated_by` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published_at` INT(11) DEFAULT NULL,
  `view_count` INT(11) DEFAULT NULL,
  `comment_count` INT(11) DEFAULT NULL,
  `like_count` INT(11) DEFAULT NULL,
  `share_count` INT(11) DEFAULT NULL,
  `long_description` TEXT COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`slug`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- DROP TABLE IF EXISTS `gallery_image`;

CREATE TABLE `gallery_image` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` INT(11) NOT NULL,
  `name` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `caption` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_path` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` SMALLINT(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gallery_id` (`gallery_id`),
  CONSTRAINT `fk_gallery_id` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`)
) ENGINE=INNODB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



-- DROP TABLE IF EXISTS `video`;

CREATE TABLE `video` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
  `old_slugs` VARCHAR(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `source` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` VARCHAR(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` VARCHAR(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_title` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `h1` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_path` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` SMALLINT(4) DEFAULT NULL,
  `is_hot` TINYINT(1) DEFAULT NULL,
  `is_active` TINYINT(1) DEFAULT NULL,
  `created_at` INT(11) NOT NULL,
  `created_by` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` INT(11) DEFAULT NULL,
  `updated_by` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published_at` INT(11) DEFAULT NULL,
  `view_count` INT(11) DEFAULT NULL,
  `comment_count` INT(11) DEFAULT NULL,
  `like_count` INT(11) DEFAULT NULL,
  `share_count` INT(11) DEFAULT NULL,
  `long_description` TEXT COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`slug`)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
