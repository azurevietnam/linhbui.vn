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
-- CREATE DATABASE /*!32312 IF NOT EXISTS*/`xemtuvi` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `xemtuvi`;

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

/*Data for the table `html_box` */

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

/*Data for the table `html_box_to_page_group` */

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

/*Data for the table `page_group` */

insert  into `page_group`(`id`,`name`,`route`,`url_regexp`,`url_params`) values (3,'Trang chủ','site/index',NULL,'{\"slug\":\"\",\"parent_slug\":\"\",\"category_slug\":\"\",\"parent_category_slug\":\"\"}'),(4,'Xem tử vi 2016','article-category/index',NULL,'{\"slug\":\"tu-vi-2016\",\"parent_slug\":\"\",\"category_slug\":\"\",\"parent_category_slug\":\"\"}');

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

/*Data for the table `seo_info` */

insert  into `seo_info`(`id`,`page_group_id`,`type`,`is_active`,`meta_title`,`meta_keywords`,`meta_description`,`h1`,`page_title`,`long_description`,`image`,`image_path`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (2,3,1,1,'Xem tử vi - Bói tử vi - Lá số tử vi - Tử vi vui trực tuyến miễn phí','Tử vi, Xem tử vi online, Tử vi trực tuyến miễn phí, tu vi, xem tu vi online, tu vi truc tuyen mien phi','Xem tử vi - Bói tử vi - Lá số tử vi - Tra cứu tử vi vui online miễn phí dành cho cá nhân, bạn có thể xem trước khi bắt đầu ngày làm việc để có thông tin hữu ích','Xem tử vi - Bói tử vi - Lá số tử vi - Tử vi vui trực tuyến miễn phí','Xem tử vi - Bói tử vi - Lá số tử vi - Tử vi vui trực tuyến miễn phí','','','/2016/05/10/Fs/',1462863868,'quyettv',NULL,NULL);

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

/*Data for the table `seo_info_to_page_group` */

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

/*Data for the table `widget` */

insert  into `widget`(`id`,`page_group_id`,`place`,`position`,`name`,`template`,`item_template`,`style`,`object_class`,`sql_offset`,`sql_limit`,`sql_order_by`,`sql_where`,`status`,`is_active`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (1,0,1,1,'Bài viết mới nhất','<div class=\"topic box_event clearfix\" id=\"my-widget-1\">\r\n   [ITEMS]\r\n   [ADSENSE]\r\n</div>\r\n','<article class=\"result_event clearfix\">\r\n   [IMAGE URL]\r\n   <div class=\"title-news\">\r\n      [NAME URL]\r\n   </div>\r\n</article>','#my-widget-1 article a {\r\n   overflow: hidden;\r\n   display: block;\r\n   font-weight:bold;\r\n}\r\n#my-widget-1 article img {\r\n   display: block;\r\n   width: 100%;\r\n}','Article',0,6,'id desc','',NULL,1,1462522194,1462863977,'quyettv','quyettv'),(2,NULL,1,1,'Xem tử vi theo tuổi','<div class=\"boxbor\">\r\n <div class=\"title\"><strong>[NAME]</strong></div>\r\n<ul class=\"list_col list-unstyle\">\r\n[ITEMS]\r\n</ul>\r\n</div>\r\n</div>','<li class=\"thumb clearfix\">\r\n[IMAGE URL]\r\n<h3 class=\"title-news\">[NAME URL]</h3>\r\n</li>','.title-news {\r\n    font-weight:bold;\r\n}\r\n.list_col .thumb img {\r\n    float: left;\r\n    width: 25%;\r\n    margin: 0 8px 2px 0;\r\n    max-height: 60px;\r\n    overflow: hidden;\r\n}','Tag',NULL,12,'position asc','slug like \"%tu-vi-tuoi-%\"',NULL,1,1462864118,NULL,'quyettv',NULL);

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

/*Data for the table `widget_to_page_group` */

insert  into `widget_to_page_group`(`id`,`widget_id`,`page_group_id`) values (2,1,3),(3,2,4);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
