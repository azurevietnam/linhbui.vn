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
CREATE DATABASE IF NOT EXISTS `xemtuvi` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `xemtuvi`;

/*Table structure for table `widget` */

DROP TABLE IF EXISTS `widget`;

CREATE TABLE `widget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `widget` */

insert  into `widget`(`id`,`place`,`position`,`name`,`template`,`item_template`,`style`,`object_class`,`sql_offset`,`sql_limit`,`sql_order_by`,`sql_where`,`status`,`is_active`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (1,1,1,'Bài viết mới nhất','<div class=\"topic box_event\" id=\"my-widget-1\">\r\n<div class=\"clearfix\">\r\n<h3>[NAME]</h3>\r\n[ITEMS]\r\n[ADS]\r\n</div>\r\n</div>\r\n\r\n','<article class=\"result_event clearfix\">\r\n[A IMG]\r\n<div class=\"title-news\">[A NAME]</div>\r\n</article>','#my-widget-1 article a {\r\n//    height: 92px;\r\n    overflow: hidden;\r\n    display: block;\r\n  font-weight:bold;\r\n}\r\n#my-widget-1 article img {\r\n    display: block;\r\n    width: 100%;\r\n}','Article',0,6,'id desc','fd',NULL,1,1462522194,1462585933,'quyettv','quyettv');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
