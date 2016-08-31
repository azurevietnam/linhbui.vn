/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.5.5-10.1.13-MariaDB : Database - linhbui
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`linhbui` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `linhbui`;

/*Table structure for table `adsense` */

DROP TABLE IF EXISTS `adsense`;

CREATE TABLE `adsense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `type` int(2) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `article` */

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_category_id` int(11) DEFAULT NULL,
  `type` smallint(2) DEFAULT NULL,
  `name` varchar(511) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(511) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `old_slugs` varchar(2000) COLLATE utf8_unicode_ci DEFAULT '',
  `description` varchar(511) COLLATE utf8_unicode_ci DEFAULT '',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `image_path` varchar(511) COLLATE utf8_unicode_ci DEFAULT '',
  `page_title` varchar(511) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `meta_title` varchar(511) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `meta_keywords` varchar(511) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `meta_description` varchar(511) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `h1` varchar(511) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `view_count` int(11) DEFAULT '0',
  `like_count` int(11) DEFAULT '0',
  `comment_count` int(11) DEFAULT '0',
  `share_count` int(11) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `is_hot` tinyint(1) DEFAULT '0',
  `position` smallint(4) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `long_description` text COLLATE utf8_unicode_ci,
  `published_at` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `customer_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_job` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk2_article_category_id` (`article_category_id`),
  CONSTRAINT `fk2_article_category_id` FOREIGN KEY (`article_category_id`) REFERENCES `article_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `article_category` */

DROP TABLE IF EXISTS `article_category`;

CREATE TABLE `article_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `old_slugs` varchar(2000) COLLATE utf8_unicode_ci DEFAULT '',
  `parent_id` int(11) DEFAULT NULL,
  `description` varchar(511) COLLATE utf8_unicode_ci DEFAULT '',
  `long_description` text COLLATE utf8_unicode_ci,
  `meta_title` varchar(511) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `meta_description` varchar(511) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `meta_keywords` varchar(511) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `h1` varchar(511) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `page_title` varchar(511) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `image` varchar(511) COLLATE utf8_unicode_ci DEFAULT '',
  `banner` varchar(511) COLLATE utf8_unicode_ci DEFAULT '',
  `image_path` varchar(511) COLLATE utf8_unicode_ci DEFAULT '',
  `status` tinyint(1) DEFAULT '0',
  `is_hot` tinyint(1) DEFAULT '0',
  `position` smallint(4) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_parent_idx` (`parent_id`),
  CONSTRAINT `fk_parent` FOREIGN KEY (`parent_id`) REFERENCES `article_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `article_to_article_category` */

DROP TABLE IF EXISTS `article_to_article_category`;

CREATE TABLE `article_to_article_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `article_category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`article_id`,`article_category_id`),
  KEY `fk_article_category_id_idx` (`article_category_id`),
  CONSTRAINT `fk_article_category_id` FOREIGN KEY (`article_category_id`) REFERENCES `article_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_article_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `article_to_tag` */

DROP TABLE IF EXISTS `article_to_tag`;

CREATE TABLE `article_to_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`article_id`,`tag_id`),
  KEY `fk_tag_id_idx` (`tag_id`),
  CONSTRAINT `fk2_article_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `auth_assignment` */

DROP TABLE IF EXISTS `auth_assignment`;

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `auth_item` */

DROP TABLE IF EXISTS `auth_item`;

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `auth_item_child` */

DROP TABLE IF EXISTS `auth_item_child`;

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `auth_rule` */

DROP TABLE IF EXISTS `auth_rule`;

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `contact` */

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `gallery` */

DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `old_slugs` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `h1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(4) DEFAULT NULL,
  `is_hot` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published_at` int(11) DEFAULT NULL,
  `view_count` int(11) DEFAULT NULL,
  `comment_count` int(11) DEFAULT NULL,
  `like_count` int(11) DEFAULT NULL,
  `share_count` int(11) DEFAULT NULL,
  `long_description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `gallery_image` */

DROP TABLE IF EXISTS `gallery_image`;

CREATE TABLE `gallery_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` smallint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gallery_id` (`gallery_id`),
  CONSTRAINT `fk_gallery_id` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `gallery_to_tag` */

DROP TABLE IF EXISTS `gallery_to_tag`;

CREATE TABLE `gallery_to_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`gallery_id`,`tag_id`),
  KEY `fk_tag_id_idx` (`tag_id`),
  CONSTRAINT `fk2_gallery_id` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk4_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `html_box` */

DROP TABLE IF EXISTS `html_box`;

CREATE TABLE `html_box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_group_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `place` smallint(2) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `is_active` smallint(1) DEFAULT NULL,
  `status` smallint(2) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk4_page_group_id` (`page_group_id`),
  CONSTRAINT `fk4_page_group_id` FOREIGN KEY (`page_group_id`) REFERENCES `page_group` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `html_box_to_page_group` */

DROP TABLE IF EXISTS `html_box_to_page_group`;

CREATE TABLE `html_box_to_page_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `html_box_id` int(11) NOT NULL,
  `page_group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk5_page_group_id` (`page_group_id`),
  KEY `fk_html_box_id` (`html_box_id`),
  CONSTRAINT `fk5_page_group_id` FOREIGN KEY (`page_group_id`) REFERENCES `page_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_html_box_id` FOREIGN KEY (`html_box_id`) REFERENCES `html_box` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `info` */

DROP TABLE IF EXISTS `info`;

CREATE TABLE `info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(4) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `status` smallint(4) DEFAULT NULL,
  `page_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `h1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `long_description` text COLLATE utf8_unicode_ci,
  `description` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `old_slugs` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`image_path`),
  UNIQUE KEY `UNIQUE2` (`slug`,`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `migration` */

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `page_group` */

DROP TABLE IF EXISTS `page_group`;

CREATE TABLE `page_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_regexp` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_params` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `old_slugs` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `original_price` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `banner` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `image_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `details` text COLLATE utf8_unicode_ci,
  `description` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `long_description` text COLLATE utf8_unicode_ci,
  `page_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `h1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_hot` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '0',
  `status` smallint(2) DEFAULT '0',
  `position` smallint(6) DEFAULT '0',
  `view_count` int(11) DEFAULT '0',
  `like_count` int(11) DEFAULT '0',
  `share_count` int(11) DEFAULT '0',
  `comment_count` int(11) DEFAULT '0',
  `published_at` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `available_quantity` int(11) DEFAULT '0',
  `order_quantity` int(11) DEFAULT '0',
  `sold_quantity` int(11) DEFAULT '0',
  `total_quantity` int(11) DEFAULT '0',
  `total_revenue` int(11) DEFAULT '0',
  `review_score` float NOT NULL DEFAULT '0',
  `download_count` int(11) DEFAULT '0',
  `manufacturer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `style` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `malterial` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_UNIQUE` (`slug`),
  UNIQUE KEY `code_UNIQUE` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `product_category` */

DROP TABLE IF EXISTS `product_category`;

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `old_slugs` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `long_description` text COLLATE utf8_unicode_ci,
  `page_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `h1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `banner` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `is_hot` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '0',
  `status` smallint(2) DEFAULT '0',
  `position` smallint(6) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk2_parent_idx` (`parent_id`),
  CONSTRAINT `fk2_parent` FOREIGN KEY (`parent_id`) REFERENCES `product_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `product_comment` */

DROP TABLE IF EXISTS `product_comment`;

CREATE TABLE `product_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(2023) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fbid` bigint(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `product_file` */

DROP TABLE IF EXISTS `product_file`;

CREATE TABLE `product_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_version` varchar(31) COLLATE utf8_unicode_ci NOT NULL,
  `product_ref_url` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extension` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_size` float DEFAULT NULL,
  `file_src` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `os_id` int(11) NOT NULL,
  `os_version` varchar(31) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk4_product_id` (`product_id`),
  CONSTRAINT `fk4_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `product_image` */

DROP TABLE IF EXISTS `product_image`;

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `image_path` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `color_code` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `caption` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_id_idx` (`product_id`),
  CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `product_to_product_category` */

DROP TABLE IF EXISTS `product_to_product_category`;

CREATE TABLE `product_to_product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`product_category_id`,`product_id`),
  KEY `fk_product_category_id_idx` (`product_category_id`),
  KEY `fk2_product_id_idx` (`product_id`),
  CONSTRAINT `fk2_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_product_category_id` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `product_to_tag` */

DROP TABLE IF EXISTS `product_to_tag`;

CREATE TABLE `product_to_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`product_id`,`tag_id`),
  KEY `fk_tag_id_idx` (`tag_id`),
  CONSTRAINT `fk2_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk3_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `redirect_url` */

DROP TABLE IF EXISTS `redirect_url`;

CREATE TABLE `redirect_url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_urls` text COLLATE utf8_unicode_ci NOT NULL,
  `to_url` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `status` smallint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `seo_info` */

DROP TABLE IF EXISTS `seo_info`;

CREATE TABLE `seo_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_group_id` int(11) DEFAULT NULL,
  `type` tinyint(1) DEFAULT '1',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `meta_title` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `h1` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `page_title` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `long_description` text COLLATE utf8_unicode_ci,
  `image` varchar(511) COLLATE utf8_unicode_ci DEFAULT '',
  `image_path` varchar(511) COLLATE utf8_unicode_ci DEFAULT '',
  `created_at` int(11) NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk3_page_group_id` (`page_group_id`),
  CONSTRAINT `fk3_page_group_id` FOREIGN KEY (`page_group_id`) REFERENCES `page_group` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `seo_info_to_page_group` */

DROP TABLE IF EXISTS `seo_info_to_page_group`;

CREATE TABLE `seo_info_to_page_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seo_info_id` int(11) NOT NULL,
  `page_group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`seo_info_id`,`page_group_id`),
  KEY `fk2_page_group_id` (`page_group_id`),
  CONSTRAINT `fk6_page_group_id` FOREIGN KEY (`page_group_id`) REFERENCES `page_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_seo_info_id` FOREIGN KEY (`seo_info_id`) REFERENCES `seo_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `site_param` */

DROP TABLE IF EXISTS `site_param`;

CREATE TABLE `site_param` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `slideshow_item` */

DROP TABLE IF EXISTS `slideshow_item`;

CREATE TABLE `slideshow_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `image_path` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `caption` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `tag` */

DROP TABLE IF EXISTS `tag`;

CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `old_slugs` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `h1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` smallint(4) DEFAULT NULL,
  `long_description` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_hot` tinyint(1) DEFAULT NULL,
  `status` smallint(2) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` int(11) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `user_log` */

DROP TABLE IF EXISTS `user_log`;

CREATE TABLE `user_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` int(11) NOT NULL,
  `is_success` tinyint(1) DEFAULT '0',
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `object_pk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_username` (`username`),
  CONSTRAINT `fk_username` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `video` */

DROP TABLE IF EXISTS `video`;

CREATE TABLE `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `old_slugs` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `source` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `h1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(4) DEFAULT NULL,
  `is_hot` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published_at` int(11) DEFAULT NULL,
  `view_count` int(11) DEFAULT NULL,
  `comment_count` int(11) DEFAULT NULL,
  `like_count` int(11) DEFAULT NULL,
  `share_count` int(11) DEFAULT NULL,
  `long_description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `video_to_tag` */

DROP TABLE IF EXISTS `video_to_tag`;

CREATE TABLE `video_to_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`video_id`,`tag_id`),
  KEY `fk_tag_id_idx` (`tag_id`),
  CONSTRAINT `fk3_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_video_id` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `widget` */

DROP TABLE IF EXISTS `widget`;

CREATE TABLE `widget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_group_id` int(11) DEFAULT NULL,
  `place` smallint(2) DEFAULT NULL,
  `position` smallint(2) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `template` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_template` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_image_size` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_target` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_follow` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `style` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sql_offset` int(11) DEFAULT NULL,
  `sql_limit` int(11) DEFAULT NULL,
  `sql_order_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sql_where` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(2) DEFAULT NULL,
  `is_active` smallint(1) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `widget_to_page_group` */

DROP TABLE IF EXISTS `widget_to_page_group`;

CREATE TABLE `widget_to_page_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `widget_id` int(11) NOT NULL,
  `page_group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`widget_id`,`page_group_id`),
  KEY `fk2_page_group_id` (`page_group_id`),
  CONSTRAINT `fk2_page_group_id` FOREIGN KEY (`page_group_id`) REFERENCES `page_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_widget_id` FOREIGN KEY (`widget_id`) REFERENCES `widget` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
