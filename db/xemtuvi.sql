/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.26 : Database - xemtuvi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`xemtuvi` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `xemtuvi`;

/*Table structure for table `article` */

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_category_id` int(11) DEFAULT NULL,
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
  PRIMARY KEY (`id`),
  KEY `fk2_article_category_id` (`article_category_id`),
  CONSTRAINT `fk2_article_category_id` FOREIGN KEY (`article_category_id`) REFERENCES `article_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `article` */

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

/*Data for the table `article_category` */

insert  into `article_category`(`id`,`name`,`slug`,`old_slugs`,`parent_id`,`description`,`long_description`,`meta_title`,`meta_description`,`meta_keywords`,`h1`,`page_title`,`image`,`banner`,`image_path`,`status`,`is_hot`,`position`,`created_at`,`updated_at`,`created_by`,`updated_by`,`is_active`) values (2,'Tin','tin-tuc','',NULL,'','','Tin tức','','Tin tức, tin tuc','Tin tức','Tin tức','','','/2016/04/19/Rb/',1,0,3,1461052364,NULL,'quyettv',NULL,1);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `article_to_article_category` */

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

/*Data for the table `article_to_tag` */

/*Table structure for table `auth_assignment` */

DROP TABLE IF EXISTS `auth_assignment`;

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_assignment` */

insert  into `auth_assignment`(`item_name`,`user_id`,`created_at`) values ('ADMIN','1',1452756262),('ADMIN','3',1461296776),('SUPER WRITTER','2',1461311101),('SUPER WRITTER','4',1461311206),('WRITTER','5',1461318376),('WRITTER','6',1461318369);

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

/*Data for the table `auth_item` */

insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('/*',2,NULL,NULL,NULL,1452681631,1452681631),('/admin/*',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/assignment/*',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/assignment/assign',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/assignment/index',2,NULL,NULL,NULL,1452755712,1452755712),('/admin/assignment/revoke',2,NULL,NULL,NULL,1461296360,1461296360),('/admin/assignment/search',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/assignment/view',2,NULL,NULL,NULL,1452756200,1452756200),('/admin/default/*',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/default/index',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/menu/*',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/menu/create',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/menu/delete',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/menu/index',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/menu/update',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/menu/view',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/permission/*',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/permission/assign',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/permission/create',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/permission/delete',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/permission/index',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/permission/remove',2,NULL,NULL,NULL,1461296360,1461296360),('/admin/permission/search',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/permission/update',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/permission/view',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/role/*',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/role/assign',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/role/create',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/role/delete',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/role/index',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/role/remove',2,NULL,NULL,NULL,1461296360,1461296360),('/admin/role/search',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/role/update',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/role/view',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/route/*',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/route/assign',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/route/create',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/route/index',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/route/refresh',2,NULL,NULL,NULL,1461296360,1461296360),('/admin/route/remove',2,NULL,NULL,NULL,1461296360,1461296360),('/admin/route/search',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/rule/*',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/rule/create',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/rule/delete',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/rule/index',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/rule/update',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/rule/view',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/user/*',2,NULL,NULL,NULL,1461296360,1461296360),('/admin/user/activate',2,NULL,NULL,NULL,1461296360,1461296360),('/admin/user/change-password',2,NULL,NULL,NULL,1461296360,1461296360),('/admin/user/delete',2,NULL,NULL,NULL,1461296360,1461296360),('/admin/user/index',2,NULL,NULL,NULL,1461296360,1461296360),('/admin/user/login',2,NULL,NULL,NULL,1461296360,1461296360),('/admin/user/logout',2,NULL,NULL,NULL,1461296360,1461296360),('/admin/user/request-password-reset',2,NULL,NULL,NULL,1461296360,1461296360),('/admin/user/reset-password',2,NULL,NULL,NULL,1461296360,1461296360),('/admin/user/signup',2,NULL,NULL,NULL,1461296360,1461296360),('/admin/user/view',2,NULL,NULL,NULL,1461296360,1461296360),('/article-category/*',2,NULL,NULL,NULL,1461296360,1461296360),('/article-category/create',2,NULL,NULL,NULL,1461296360,1461296360),('/article-category/delete',2,NULL,NULL,NULL,1461296360,1461296360),('/article-category/index',2,NULL,NULL,NULL,1461296360,1461296360),('/article-category/update',2,NULL,NULL,NULL,1461296360,1461296360),('/article-category/view',2,NULL,NULL,NULL,1461296360,1461296360),('/article/*',2,NULL,NULL,NULL,1452762763,1452762763),('/article/create',2,NULL,NULL,NULL,1452762763,1452762763),('/article/delete',2,NULL,NULL,NULL,1452762763,1452762763),('/article/index',2,NULL,NULL,NULL,1452762763,1452762763),('/article/update',2,NULL,NULL,NULL,1452762763,1452762763),('/article/view',2,NULL,NULL,NULL,1452762763,1452762763),('/base/*',2,NULL,NULL,NULL,1452756221,1452756221),('/debug/*',2,NULL,NULL,NULL,1452756221,1452756221),('/debug/default/*',2,NULL,NULL,NULL,1452756221,1452756221),('/debug/default/db-explain',2,NULL,NULL,NULL,1452756221,1452756221),('/debug/default/download-mail',2,NULL,NULL,NULL,1452756221,1452756221),('/debug/default/index',2,NULL,NULL,NULL,1452756221,1452756221),('/debug/default/toolbar',2,NULL,NULL,NULL,1452756221,1452756221),('/debug/default/view',2,NULL,NULL,NULL,1452756221,1452756221),('/file/*',2,NULL,NULL,NULL,1461296360,1461296360),('/file/ckeditor-upload-image',2,NULL,NULL,NULL,1461296360,1461296360),('/gallery-image/*',2,NULL,NULL,NULL,1461296360,1461296360),('/gallery-image/create',2,NULL,NULL,NULL,1461296360,1461296360),('/gallery-image/delete',2,NULL,NULL,NULL,1461296360,1461296360),('/gallery-image/index',2,NULL,NULL,NULL,1461296360,1461296360),('/gallery-image/update',2,NULL,NULL,NULL,1461296360,1461296360),('/gallery-image/view',2,NULL,NULL,NULL,1461296360,1461296360),('/gallery/*',2,NULL,NULL,NULL,1461296360,1461296360),('/gallery/create',2,NULL,NULL,NULL,1461296360,1461296360),('/gallery/delete',2,NULL,NULL,NULL,1461296360,1461296360),('/gallery/index',2,NULL,NULL,NULL,1461296360,1461296360),('/gallery/update',2,NULL,NULL,NULL,1461296360,1461296360),('/gallery/view',2,NULL,NULL,NULL,1461296360,1461296360),('/gii/*',2,NULL,NULL,NULL,1452756221,1452756221),('/gii/default/*',2,NULL,NULL,NULL,1452756221,1452756221),('/gii/default/action',2,NULL,NULL,NULL,1452756221,1452756221),('/gii/default/diff',2,NULL,NULL,NULL,1452756221,1452756221),('/gii/default/index',2,NULL,NULL,NULL,1452756221,1452756221),('/gii/default/preview',2,NULL,NULL,NULL,1452756221,1452756221),('/gii/default/view',2,NULL,NULL,NULL,1452756221,1452756221),('/info/*',2,NULL,NULL,NULL,1461296360,1461296360),('/info/create',2,NULL,NULL,NULL,1461296360,1461296360),('/info/delete',2,NULL,NULL,NULL,1461296360,1461296360),('/info/index',2,NULL,NULL,NULL,1461296360,1461296360),('/info/update',2,NULL,NULL,NULL,1461296360,1461296360),('/info/view',2,NULL,NULL,NULL,1461296360,1461296360),('/product-category/*',2,NULL,NULL,NULL,1461296360,1461296360),('/product-category/create',2,NULL,NULL,NULL,1461296360,1461296360),('/product-category/delete',2,NULL,NULL,NULL,1461296360,1461296360),('/product-category/index',2,NULL,NULL,NULL,1461296360,1461296360),('/product-category/update',2,NULL,NULL,NULL,1461296360,1461296360),('/product-category/view',2,NULL,NULL,NULL,1461296360,1461296360),('/product-file/*',2,NULL,NULL,NULL,1461296360,1461296360),('/product-file/create',2,NULL,NULL,NULL,1461296360,1461296360),('/product-file/delete',2,NULL,NULL,NULL,1461296360,1461296360),('/product-file/index',2,NULL,NULL,NULL,1461296360,1461296360),('/product-file/update',2,NULL,NULL,NULL,1461296360,1461296360),('/product-file/view',2,NULL,NULL,NULL,1461296360,1461296360),('/product-image/*',2,NULL,NULL,NULL,1461296360,1461296360),('/product-image/create',2,NULL,NULL,NULL,1461296360,1461296360),('/product-image/delete',2,NULL,NULL,NULL,1461296360,1461296360),('/product-image/index',2,NULL,NULL,NULL,1461296360,1461296360),('/product-image/update',2,NULL,NULL,NULL,1461296360,1461296360),('/product-image/view',2,NULL,NULL,NULL,1461296360,1461296360),('/product/*',2,NULL,NULL,NULL,1461296360,1461296360),('/product/create',2,NULL,NULL,NULL,1461296360,1461296360),('/product/delete',2,NULL,NULL,NULL,1461296360,1461296360),('/product/index',2,NULL,NULL,NULL,1461296360,1461296360),('/product/update',2,NULL,NULL,NULL,1461296360,1461296360),('/product/view',2,NULL,NULL,NULL,1461296360,1461296360),('/redirect-url/*',2,NULL,NULL,NULL,1461296360,1461296360),('/redirect-url/create',2,NULL,NULL,NULL,1461296360,1461296360),('/redirect-url/delete',2,NULL,NULL,NULL,1461296360,1461296360),('/redirect-url/index',2,NULL,NULL,NULL,1461296360,1461296360),('/redirect-url/update',2,NULL,NULL,NULL,1461296360,1461296360),('/redirect-url/view',2,NULL,NULL,NULL,1461296360,1461296360),('/seo-info/*',2,NULL,NULL,NULL,1461296360,1461296360),('/seo-info/create',2,NULL,NULL,NULL,1461296360,1461296360),('/seo-info/delete',2,NULL,NULL,NULL,1461296360,1461296360),('/seo-info/index',2,NULL,NULL,NULL,1461296360,1461296360),('/seo-info/update',2,NULL,NULL,NULL,1461296360,1461296360),('/seo-info/view',2,NULL,NULL,NULL,1461296360,1461296360),('/site/*',2,NULL,NULL,NULL,1452756221,1452756221),('/site/error',2,NULL,NULL,NULL,1452756221,1452756221),('/site/index',2,NULL,NULL,NULL,1452756221,1452756221),('/site/login',2,NULL,NULL,NULL,1452756221,1452756221),('/site/logout',2,NULL,NULL,NULL,1452756221,1452756221),('/slideshow-item/*',2,NULL,NULL,NULL,1461296360,1461296360),('/slideshow-item/create',2,NULL,NULL,NULL,1461296360,1461296360),('/slideshow-item/delete',2,NULL,NULL,NULL,1461296360,1461296360),('/slideshow-item/index',2,NULL,NULL,NULL,1461296360,1461296360),('/slideshow-item/update',2,NULL,NULL,NULL,1461296360,1461296360),('/slideshow-item/view',2,NULL,NULL,NULL,1461296360,1461296360),('/tag/*',2,NULL,NULL,NULL,1461296360,1461296360),('/tag/create',2,NULL,NULL,NULL,1461296360,1461296360),('/tag/delete',2,NULL,NULL,NULL,1461296360,1461296360),('/tag/index',2,NULL,NULL,NULL,1461296360,1461296360),('/tag/update',2,NULL,NULL,NULL,1461296360,1461296360),('/tag/view',2,NULL,NULL,NULL,1461296360,1461296360),('/test/*',2,NULL,NULL,NULL,1461296360,1461296360),('/test/index',2,NULL,NULL,NULL,1461296360,1461296360),('/test/migrate-product-category',2,NULL,NULL,NULL,1461296360,1461296360),('/user-log/*',2,NULL,NULL,NULL,1461296360,1461296360),('/user-log/create',2,NULL,NULL,NULL,1461296360,1461296360),('/user-log/delete',2,NULL,NULL,NULL,1461296360,1461296360),('/user-log/index',2,NULL,NULL,NULL,1461296360,1461296360),('/user-log/update',2,NULL,NULL,NULL,1461296360,1461296360),('/user-log/view',2,NULL,NULL,NULL,1461296360,1461296360),('/user/*',2,NULL,NULL,NULL,1452756221,1452756221),('/user/create',2,NULL,NULL,NULL,1452756221,1452756221),('/user/delete',2,NULL,NULL,NULL,1452756221,1452756221),('/user/index',2,NULL,NULL,NULL,1452756221,1452756221),('/user/update',2,NULL,NULL,NULL,1452756221,1452756221),('/user/view',2,NULL,NULL,NULL,1452756221,1452756221),('/video/*',2,NULL,NULL,NULL,1461296360,1461296360),('/video/create',2,NULL,NULL,NULL,1461296360,1461296360),('/video/delete',2,NULL,NULL,NULL,1461296360,1461296360),('/video/index',2,NULL,NULL,NULL,1461296360,1461296360),('/video/update',2,NULL,NULL,NULL,1461296360,1461296360),('/video/view',2,NULL,NULL,NULL,1461296360,1461296360),('ADMIN',2,NULL,NULL,NULL,1452681715,1452762771),('SUPER WRITTER',2,NULL,NULL,NULL,1461311014,1461311027),('WRITTER',2,NULL,NULL,NULL,1461296280,1461306910);

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

/*Data for the table `auth_item_child` */

insert  into `auth_item_child`(`parent`,`child`) values ('ADMIN','/*'),('ADMIN','/admin/*'),('ADMIN','/admin/assignment/*'),('ADMIN','/admin/assignment/assign'),('ADMIN','/admin/assignment/index'),('ADMIN','/admin/assignment/search'),('ADMIN','/admin/assignment/view'),('ADMIN','/admin/default/*'),('ADMIN','/admin/default/index'),('ADMIN','/admin/menu/*'),('ADMIN','/admin/menu/create'),('ADMIN','/admin/menu/delete'),('ADMIN','/admin/menu/index'),('ADMIN','/admin/menu/update'),('ADMIN','/admin/menu/view'),('ADMIN','/admin/permission/*'),('ADMIN','/admin/permission/assign'),('ADMIN','/admin/permission/create'),('ADMIN','/admin/permission/delete'),('ADMIN','/admin/permission/index'),('ADMIN','/admin/permission/search'),('ADMIN','/admin/permission/update'),('ADMIN','/admin/permission/view'),('ADMIN','/admin/role/*'),('ADMIN','/admin/role/assign'),('ADMIN','/admin/role/create'),('ADMIN','/admin/role/delete'),('ADMIN','/admin/role/index'),('ADMIN','/admin/role/search'),('ADMIN','/admin/role/update'),('ADMIN','/admin/role/view'),('ADMIN','/admin/route/*'),('ADMIN','/admin/route/assign'),('ADMIN','/admin/route/create'),('ADMIN','/admin/route/index'),('ADMIN','/admin/route/search'),('ADMIN','/admin/rule/*'),('ADMIN','/admin/rule/create'),('ADMIN','/admin/rule/delete'),('ADMIN','/admin/rule/index'),('ADMIN','/admin/rule/update'),('ADMIN','/admin/rule/view'),('SUPER WRITTER','/article-category/*'),('SUPER WRITTER','/article-category/create'),('SUPER WRITTER','/article-category/delete'),('SUPER WRITTER','/article-category/index'),('WRITTER','/article-category/index'),('SUPER WRITTER','/article-category/update'),('SUPER WRITTER','/article-category/view'),('WRITTER','/article-category/view'),('ADMIN','/article/*'),('WRITTER','/article/*'),('ADMIN','/article/create'),('WRITTER','/article/create'),('ADMIN','/article/delete'),('WRITTER','/article/delete'),('ADMIN','/article/index'),('WRITTER','/article/index'),('ADMIN','/article/update'),('WRITTER','/article/update'),('ADMIN','/article/view'),('WRITTER','/article/view'),('ADMIN','/base/*'),('WRITTER','/base/*'),('ADMIN','/debug/*'),('ADMIN','/debug/default/*'),('ADMIN','/debug/default/db-explain'),('ADMIN','/debug/default/download-mail'),('ADMIN','/debug/default/index'),('ADMIN','/debug/default/toolbar'),('ADMIN','/debug/default/view'),('WRITTER','/file/*'),('WRITTER','/file/ckeditor-upload-image'),('WRITTER','/gallery-image/*'),('WRITTER','/gallery-image/create'),('WRITTER','/gallery-image/delete'),('WRITTER','/gallery-image/index'),('WRITTER','/gallery-image/update'),('WRITTER','/gallery-image/view'),('WRITTER','/gallery/*'),('WRITTER','/gallery/create'),('WRITTER','/gallery/delete'),('WRITTER','/gallery/index'),('WRITTER','/gallery/update'),('WRITTER','/gallery/view'),('ADMIN','/gii/*'),('ADMIN','/gii/default/*'),('ADMIN','/gii/default/action'),('ADMIN','/gii/default/diff'),('ADMIN','/gii/default/index'),('ADMIN','/gii/default/preview'),('ADMIN','/gii/default/view'),('WRITTER','/info/index'),('WRITTER','/info/view'),('SUPER WRITTER','/product-category/*'),('SUPER WRITTER','/product-category/create'),('SUPER WRITTER','/product-category/delete'),('SUPER WRITTER','/product-category/index'),('WRITTER','/product-category/index'),('SUPER WRITTER','/product-category/update'),('SUPER WRITTER','/product-category/view'),('WRITTER','/product-category/view'),('WRITTER','/product-file/*'),('WRITTER','/product-file/create'),('WRITTER','/product-file/delete'),('WRITTER','/product-file/index'),('WRITTER','/product-file/update'),('WRITTER','/product-file/view'),('WRITTER','/product-image/*'),('WRITTER','/product-image/create'),('WRITTER','/product-image/delete'),('WRITTER','/product-image/index'),('WRITTER','/product-image/update'),('WRITTER','/product-image/view'),('WRITTER','/product/*'),('WRITTER','/product/create'),('WRITTER','/product/delete'),('WRITTER','/product/index'),('WRITTER','/product/update'),('WRITTER','/product/view'),('WRITTER','/redirect-url/*'),('WRITTER','/redirect-url/create'),('WRITTER','/redirect-url/delete'),('WRITTER','/redirect-url/index'),('WRITTER','/redirect-url/update'),('WRITTER','/redirect-url/view'),('WRITTER','/seo-info/index'),('WRITTER','/seo-info/view'),('ADMIN','/site/*'),('WRITTER','/site/*'),('ADMIN','/site/error'),('WRITTER','/site/error'),('ADMIN','/site/index'),('WRITTER','/site/index'),('ADMIN','/site/login'),('WRITTER','/site/login'),('ADMIN','/site/logout'),('WRITTER','/site/logout'),('WRITTER','/slideshow-item/*'),('WRITTER','/slideshow-item/create'),('WRITTER','/slideshow-item/delete'),('WRITTER','/slideshow-item/index'),('WRITTER','/slideshow-item/update'),('WRITTER','/slideshow-item/view'),('WRITTER','/tag/index'),('WRITTER','/tag/view'),('WRITTER','/user-log/create'),('WRITTER','/user-log/view'),('ADMIN','/user/*'),('ADMIN','/user/create'),('ADMIN','/user/delete'),('ADMIN','/user/index'),('WRITTER','/user/index'),('ADMIN','/user/update'),('WRITTER','/user/update'),('ADMIN','/user/view'),('WRITTER','/user/view'),('WRITTER','/video/*'),('WRITTER','/video/create'),('WRITTER','/video/delete'),('WRITTER','/video/index'),('WRITTER','/video/update'),('WRITTER','/video/view'),('SUPER WRITTER','WRITTER');

/*Table structure for table `auth_rule` */

DROP TABLE IF EXISTS `auth_rule`;

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_rule` */

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

/*Data for the table `info` */

/*Table structure for table `migration` */

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migration` */

insert  into `migration`(`version`,`apply_time`) values ('m000000_000000_base',1452583193),('m130524_201442_init',1452583674);

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_UNIQUE` (`slug`),
  UNIQUE KEY `code_UNIQUE` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product` */

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
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_category` */

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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_file` */

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
) ENGINE=InnoDB AUTO_INCREMENT=173 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_image` */

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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_to_product_category` */

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

/*Data for the table `product_to_tag` */

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

/*Data for the table `redirect_url` */

/*Table structure for table `seo_info` */

DROP TABLE IF EXISTS `seo_info`;

CREATE TABLE `seo_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `seo_info` */

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `slideshow_item` */

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tag` */

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`firstname`,`lastname`,`dob`,`alias`,`gender`,`image`,`image_path`) values (1,'quyettv','wlho-VRNjNyJbPA1OeITK-AxMa_X3rcx','$2y$13$gvo7VgiMIeC.Z7KXu8L5uuQaaad/fLraOQHwbrFz4upGay5VbhpGO',NULL,'quyettv@hdcgroup.vn',10,0,1455758218,'Quyết','',748130400,'',0,'13.jpg','/2016/02/16/Dk/'),(2,'congnt','CuvcNkEE17jkm4v87fndEKTjnLv9ZlTj','$2y$13$SAGOSLwQZkW3lQdVRb/Ubu5YKv35kIb0i5bssGzEoWIcqZ8G.1mXa',NULL,'congnt@hdcgroup.vn',10,1461296628,1461296628,'Thành Công','Nguyễn',-28800,'Nguyễn Thành Công',NULL,'','/2016/04/22/PW/'),(3,'cuongnm','FxKlRZ0WjU94HymoWMj7yRHjZvCx-yqv','$2y$13$kFpegS4WiV5SBmxqDspOE.Rzi6WWw0Kvk/hw7tulKYP2zEbjY3I/e',NULL,'cuongnm@hdcgroup.vn',10,1461296766,1461296766,'Cường','Ngô',-28800,'Cường Ngô',NULL,'','/2016/04/22/xQ/'),(4,'huonglt','kB4nETEkVcKfFhZMGXeTcV9c1JsVv_5Z','$2y$13$nwx2kpXA6Ho3yorcQU1Q3ubbMaFC6i6dQVTzUKGYCe4S7uM3ZODAi',NULL,'huonglt@hdcgroup.vn',10,1461311171,1461311171,'Hương','Lê',-28800,'Hương Lê',NULL,'','/2016/04/22/wG/'),(5,'huongtt','9Zob8u9HJy4p9vojpu_gqYVzBfc6-92O','$2y$13$CvZfuneGcRio6srSzhnO/.j6bPSQdZhw/aaC1XW5LztJrV5I0bgL6',NULL,'huongtt@hdcgroup.vn',10,1461318262,1461318938,'Hương','Trần',-28800,'Hương Trần',NULL,'','/2016/04/22/qm/'),(6,'huongntl','qpUVyJdeVnrI94G3Me-y_toozjoW873f','$2y$13$2qNtAynfAtjA9GpwBdDsg.Om3pM1f6yM3de9xrUZXlOKMu8XlgrbS',NULL,'huongntl@hdcgroup.vn',10,1461318358,1461318358,'Hương','Nguyễn',-28800,'Hương Nguyễn',NULL,'','/2016/04/22/mZ/');

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
) ENGINE=InnoDB AUTO_INCREMENT=963 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_log` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
