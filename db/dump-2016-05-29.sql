/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.5.5-10.1.10-MariaDB : Database - linhbui
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
  PRIMARY KEY (`id`),
  KEY `fk2_article_category_id` (`article_category_id`),
  CONSTRAINT `fk2_article_category_id` FOREIGN KEY (`article_category_id`) REFERENCES `article_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `article` */

insert  into `article`(`id`,`article_category_id`,`type`,`name`,`content`,`slug`,`old_slugs`,`description`,`image`,`image_path`,`page_title`,`meta_title`,`meta_keywords`,`meta_description`,`h1`,`view_count`,`like_count`,`comment_count`,`share_count`,`created_at`,`updated_at`,`created_by`,`updated_by`,`auth_alias`,`is_hot`,`position`,`status`,`long_description`,`published_at`,`is_active`) values (1,NULL,1,'Mốt thời trang năm 2016','<p>Thời trang v&agrave; l&agrave;m đẹp l&agrave; một trong những vấn đề được giới trẻ quan t&acirc;m rất nhiều bởi chỉ c&oacute; những yếu tố khiến bạn trở l&ecirc;n trẻ đẹp mới được c&aacute;c bạn trẻ quan t&acirc;m đến.Với thời trang, yếu tốt gi&uacute;p bạn trở l&ecirc;n trẻ đẹp, s&agrave;nh điệu, cuốn h&uacute;t chỉ l&agrave; mặc những bộ thời trang ph&ugrave; hợp, vừa vặn với th&acirc;n h&igrave;nh của ri&ecirc;ng m&igrave;nh.</p>\r\n\r\n<p>Nefertiti kh&ocirc;ng ngoại lệ, một h&atilde;ng thời trang c&oacute; tiếng từ trước đến nay chuy&ecirc;n về c&aacute;c thương hiệu thời trang nổi tiếng, hiện nay đang cung cấp những mặt h&agrave;ng s&agrave;nh điệu, sang trọng như: Thời trang c&ocirc;ng sở,&nbsp;ao so mi nu&hellip;Những bộ thời trang n&agrave;y sẽ gi&uacute;p bạn trở l&ecirc;n kh&aacute;c thường bởi vẻ đẹp cuốn h&uacute;t v&agrave; qu&yacute; ph&aacute;i tạo cho bạn sự tự tin trước khi đến văn ph&ograve;ng l&agrave;m việc cũng như đi dự sự kiện quan trọng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"http://localhost/linhbui.vn/frontend/web/images/2016/05/29/od/thoi-trang-cong-so-de.jpg\" style=\"box-sizing: border-box; color: rgb(0, 96, 175); text-decoration: none; background: 0px 0px;\"><img alt=\"thoi-trang-cong-so-dep\" class=\"alignnone size-full wp-image-5722\" src=\"http://localhost/linhbui.vn/frontend/web/images/2016/05/29/od/thoi-trang-cong-so-de.jpg\" style=\"border-style:initial; border-width:0px; box-sizing:border-box; height:964px; vertical-align:middle; width:600px\" /></a></p>\r\n\r\n<p>Chỉ c&oacute; những bộ thời trang s&agrave;nh điệu mới c&oacute; thể gi&uacute;p bạn lấy lại được v&oacute;c d&aacute;ng trẻ trung v&agrave; xinh đẹp, với bộ đầm m&agrave;u đỏ sẽ l&agrave;m nổi bật l&ecirc;n l&agrave;n da trắng hồng của bạn, tạo sự quyến rũ th&ecirc;m v&agrave;o đ&oacute; l&agrave; một v&agrave;i phụ kiện k&egrave;m theo đ&oacute; l&agrave; t&uacute;i cầm sẽ l&agrave;m cho bạn cảm thấy tự tin với th&acirc;n h&igrave;nh n&oacute;ng bỏng của m&igrave;nh hơn.</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"http://localhost/linhbui.vn/frontend/web/images/2016/05/29/od/thoi-trang-cong-so-dep-1.jpg\" style=\"box-sizing: border-box; color: rgb(0, 96, 175); text-decoration: none; background: 0px 0px;\"><img alt=\"thoi-trang-cong-so-dep-1\" class=\"alignnone size-full wp-image-5723\" src=\"http://localhost/linhbui.vn/frontend/web/images/2016/05/29/od/thoi-trang-cong-so-dep-1.jpg\" style=\"border-style:initial; border-width:0px; box-sizing:border-box; height:900px; vertical-align:middle; width:600px\" /></a></p>\r\n\r\n<p><a href=\"http://nefertiti.com.vn/home\" style=\"box-sizing: border-box; color: rgb(0, 96, 175); text-decoration: none; background: 0px 0px;\" title=\"ao vest nu\"><strong>Ao vest nu</strong></a>&nbsp;l&agrave; m&ocirc;t trong những bộ thời trang s&agrave;nh điệu nhất của Nefertiti chủ yếu gi&agrave;nh cho giới văn ph&ograve;ng c&ocirc;ng sở, n&oacute; gi&uacute;p cho bạn trở l&ecirc;n sang trọng v&agrave; qu&yacute; ph&aacute;i hơn rất nhiều.Chỉ với một bộ &aacute;o vest nữ bạn sẽ trở l&ecirc;n hấp dẫn hơn, tự tin hơn khi bước đến văn ph&ograve;ng l&agrave;m việc cũng như đi dự tiệc sinh nhật, hội&hellip;</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"http://localhost/linhbui.vn/frontend/web/images/2016/05/29/od/thoi-trang-cong-so-dep-2.jpg\" style=\"box-sizing: border-box; color: rgb(0, 96, 175); text-decoration: none; background: 0px 0px;\"><img alt=\"thoi-trang-cong-so-dep-2\" class=\"alignnone size-full wp-image-5724\" src=\"http://localhost/linhbui.vn/frontend/web/images/2016/05/29/od/thoi-trang-cong-so-dep-2.jpg\" style=\"border-style:initial; border-width:0px; box-sizing:border-box; height:900px; vertical-align:middle; width:600px\" /></a></p>\r\n\r\n<p>Sự thanh lịch lu&ocirc;n l&agrave;m cho vẻ đẹp của bạn trở l&ecirc;n hấp dẫn hơn rất nhiều cộng với n&agrave;n da trắng hồng sẽ gi&uacute;p bạn tr&agrave;n đầy tự tin</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"http://localhost/linhbui.vn/frontend/web/images/2016/05/29/od/thoi-trang-cong-so-dep-3.jpg\" style=\"box-sizing: border-box; color: rgb(0, 96, 175); text-decoration: none; background: 0px 0px;\"><img alt=\"thoi-trang-cong-so-dep-3\" class=\"alignnone size-full wp-image-5725\" src=\"http://localhost/linhbui.vn/frontend/web/images/2016/05/29/od/thoi-trang-cong-so-dep-3.jpg\" style=\"border-style:initial; border-width:0px; box-sizing:border-box; height:441px; vertical-align:middle; width:640px\" /></a></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"http://localhost/linhbui.vn/frontend/web/images/2016/05/29/od/thoi-trang-cong-so-dep-4.jpg\" style=\"box-sizing: border-box; color: rgb(0, 96, 175); text-decoration: none; background: 0px 0px;\"><img alt=\"thoi-trang-cong-so-dep-4\" class=\"alignnone size-full wp-image-5726\" src=\"http://localhost/linhbui.vn/frontend/web/images/2016/05/29/od/thoi-trang-cong-so-dep-4.jpg\" style=\"border-style:initial; border-width:0px; box-sizing:border-box; height:750px; vertical-align:middle; width:500px\" /></a></p>\r\n\r\n<p>Vẻ đẹp của bạn lu&ocirc;n tiềm ẩn ở b&ecirc;n trong bởi khi bạn biết c&aacute;ch l&agrave;m đẹp, mặc đẹp sẽ trở l&ecirc;n v&ocirc; c&ugrave;ng cuốn h&uacute;t v&agrave; s&agrave;nh điệu</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"http://localhost/linhbui.vn/frontend/web/images/2016/05/29/od/thoi-trang-cong-so-dep-5.jpg\" style=\"box-sizing: border-box; color: rgb(0, 96, 175); text-decoration: none; background: 0px 0px;\"><img alt=\"thoi-trang-cong-so-dep-5\" class=\"alignnone size-full wp-image-5727\" src=\"http://localhost/linhbui.vn/frontend/web/images/2016/05/29/od/thoi-trang-cong-so-dep-5.jpg\" style=\"border-style:initial; border-width:0px; box-sizing:border-box; height:1009px; vertical-align:middle; width:601px\" /></a></p>\r\n','mot-thoi-trang-nam-2016','','Những mẫu thời trang mới nhất, cho bạn phong cách trẻ trung, năng động','141870973953.jpg','/2016/05/29/od/','Mốt thời trang năm 2016','Mốt thời trang năm 2016','Mốt thời trang năm 2016, mot thoi trang nam 2016','Những mẫu thời trang mới nhất, cho bạn phong cách trẻ trung, năng động','Mốt thời trang năm 2016',0,0,0,0,1464515690,1464515760,'quyettv','quyettv','',0,0,0,NULL,1464515546,1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

insert  into `auth_item_child`(`parent`,`child`) values ('ADMIN','/*'),('ADMIN','/admin/*'),('ADMIN','/admin/assignment/*'),('ADMIN','/admin/assignment/assign'),('ADMIN','/admin/assignment/index'),('ADMIN','/admin/assignment/search'),('ADMIN','/admin/assignment/view'),('ADMIN','/admin/default/*'),('ADMIN','/admin/default/index'),('ADMIN','/admin/menu/*'),('ADMIN','/admin/menu/create'),('ADMIN','/admin/menu/delete'),('ADMIN','/admin/menu/index'),('ADMIN','/admin/menu/update'),('ADMIN','/admin/menu/view'),('ADMIN','/admin/permission/*'),('ADMIN','/admin/permission/assign'),('ADMIN','/admin/permission/create'),('ADMIN','/admin/permission/delete'),('ADMIN','/admin/permission/index'),('ADMIN','/admin/permission/search'),('ADMIN','/admin/permission/update'),('ADMIN','/admin/permission/view'),('ADMIN','/admin/role/*'),('ADMIN','/admin/role/assign'),('ADMIN','/admin/role/create'),('ADMIN','/admin/role/delete'),('ADMIN','/admin/role/index'),('ADMIN','/admin/role/search'),('ADMIN','/admin/role/update'),('ADMIN','/admin/role/view'),('ADMIN','/admin/route/*'),('ADMIN','/admin/route/assign'),('ADMIN','/admin/route/create'),('ADMIN','/admin/route/index'),('ADMIN','/admin/route/search'),('ADMIN','/admin/rule/*'),('ADMIN','/admin/rule/create'),('ADMIN','/admin/rule/delete'),('ADMIN','/admin/rule/index'),('ADMIN','/admin/rule/update'),('ADMIN','/admin/rule/view'),('ADMIN','/article/*'),('ADMIN','/article/create'),('ADMIN','/article/delete'),('ADMIN','/article/index'),('ADMIN','/article/update'),('ADMIN','/article/view'),('ADMIN','/base/*'),('ADMIN','/debug/*'),('ADMIN','/debug/default/*'),('ADMIN','/debug/default/db-explain'),('ADMIN','/debug/default/download-mail'),('ADMIN','/debug/default/index'),('ADMIN','/debug/default/toolbar'),('ADMIN','/debug/default/view'),('ADMIN','/gii/*'),('ADMIN','/gii/default/*'),('ADMIN','/gii/default/action'),('ADMIN','/gii/default/diff'),('ADMIN','/gii/default/index'),('ADMIN','/gii/default/preview'),('ADMIN','/gii/default/view'),('ADMIN','/site/*'),('ADMIN','/site/error'),('ADMIN','/site/index'),('ADMIN','/site/login'),('ADMIN','/site/logout'),('ADMIN','/user/*'),('ADMIN','/user/create'),('ADMIN','/user/delete'),('ADMIN','/user/index'),('ADMIN','/user/update'),('ADMIN','/user/view'),('SUPER WRITTER','/article-category/*'),('SUPER WRITTER','/article-category/create'),('SUPER WRITTER','/article-category/delete'),('SUPER WRITTER','/article-category/index'),('SUPER WRITTER','/article-category/update'),('SUPER WRITTER','/article-category/view'),('SUPER WRITTER','/product-category/*'),('SUPER WRITTER','/product-category/create'),('SUPER WRITTER','/product-category/delete'),('SUPER WRITTER','/product-category/index'),('SUPER WRITTER','/product-category/update'),('SUPER WRITTER','/product-category/view'),('SUPER WRITTER','WRITTER'),('WRITTER','/article-category/index'),('WRITTER','/article-category/view'),('WRITTER','/article/*'),('WRITTER','/article/create'),('WRITTER','/article/delete'),('WRITTER','/article/index'),('WRITTER','/article/update'),('WRITTER','/article/view'),('WRITTER','/base/*'),('WRITTER','/file/*'),('WRITTER','/file/ckeditor-upload-image'),('WRITTER','/gallery-image/*'),('WRITTER','/gallery-image/create'),('WRITTER','/gallery-image/delete'),('WRITTER','/gallery-image/index'),('WRITTER','/gallery-image/update'),('WRITTER','/gallery-image/view'),('WRITTER','/gallery/*'),('WRITTER','/gallery/create'),('WRITTER','/gallery/delete'),('WRITTER','/gallery/index'),('WRITTER','/gallery/update'),('WRITTER','/gallery/view'),('WRITTER','/info/index'),('WRITTER','/info/view'),('WRITTER','/product-category/index'),('WRITTER','/product-category/view'),('WRITTER','/product-file/*'),('WRITTER','/product-file/create'),('WRITTER','/product-file/delete'),('WRITTER','/product-file/index'),('WRITTER','/product-file/update'),('WRITTER','/product-file/view'),('WRITTER','/product-image/*'),('WRITTER','/product-image/create'),('WRITTER','/product-image/delete'),('WRITTER','/product-image/index'),('WRITTER','/product-image/update'),('WRITTER','/product-image/view'),('WRITTER','/product/*'),('WRITTER','/product/create'),('WRITTER','/product/delete'),('WRITTER','/product/index'),('WRITTER','/product/update'),('WRITTER','/product/view'),('WRITTER','/redirect-url/*'),('WRITTER','/redirect-url/create'),('WRITTER','/redirect-url/delete'),('WRITTER','/redirect-url/index'),('WRITTER','/redirect-url/update'),('WRITTER','/redirect-url/view'),('WRITTER','/seo-info/index'),('WRITTER','/seo-info/view'),('WRITTER','/site/*'),('WRITTER','/site/error'),('WRITTER','/site/index'),('WRITTER','/site/login'),('WRITTER','/site/logout'),('WRITTER','/slideshow-item/*'),('WRITTER','/slideshow-item/create'),('WRITTER','/slideshow-item/delete'),('WRITTER','/slideshow-item/index'),('WRITTER','/slideshow-item/update'),('WRITTER','/slideshow-item/view'),('WRITTER','/tag/index'),('WRITTER','/tag/view'),('WRITTER','/user-log/create'),('WRITTER','/user-log/view'),('WRITTER','/user/index'),('WRITTER','/user/update'),('WRITTER','/user/view'),('WRITTER','/video/*'),('WRITTER','/video/create'),('WRITTER','/video/delete'),('WRITTER','/video/index'),('WRITTER','/video/update'),('WRITTER','/video/view');

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

/*Data for the table `gallery` */

insert  into `gallery`(`id`,`name`,`slug`,`old_slugs`,`description`,`meta_description`,`meta_title`,`meta_keywords`,`page_title`,`h1`,`image`,`image_path`,`status`,`is_hot`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`,`published_at`,`view_count`,`comment_count`,`like_count`,`share_count`,`long_description`) values (4,'Album ảnh váy dạ hội','album-anh-vay-da-hoi',NULL,'','','Album ảnh váy dạ hội','Album ảnh váy dạ hội, album anh vay da hoi','Album ảnh váy dạ hội','Album ảnh váy dạ hội','800px-Mai_Phuong_Thuy_Vietnam_Festival_2008_in_Japan.jpg','/2016/05/29/py/',NULL,NULL,1,1464518399,'quyettv',NULL,NULL,1464518366,NULL,NULL,NULL,NULL,NULL);

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

/*Data for the table `gallery_image` */

insert  into `gallery_image`(`id`,`gallery_id`,`name`,`caption`,`image`,`image_path`,`position`) values (8,4,'','','france-wallpaper-25957-26641-hd-wallpapers.jpg','/2016/05/29/dy/',NULL),(9,4,'','','141870973953.jpg','/2016/05/29/ZA/',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `gallery_to_tag` */

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product` */

insert  into `product`(`id`,`name`,`code`,`slug`,`old_slugs`,`price`,`original_price`,`image`,`banner`,`image_path`,`details`,`description`,`long_description`,`page_title`,`h1`,`meta_title`,`meta_description`,`meta_keywords`,`is_hot`,`is_active`,`status`,`position`,`view_count`,`like_count`,`share_count`,`comment_count`,`published_at`,`created_at`,`updated_at`,`created_by`,`updated_by`,`available_quantity`,`order_quantity`,`sold_quantity`,`total_quantity`,`total_revenue`,`review_score`,`download_count`,`manufacturer`) values (1,'Áo dài trắng đính kim cương nhân tạo',NULL,'ao-dai-trang-dinh-kim-cuong-nhan-tao',NULL,0,0,'KOCIS_Korea_Hanbok-AoDai_FashionShow_03_(9766157012).jpg','','/2016/05/29/mQ/','<p><strong>&Aacute;o d&agrave;i</strong>&nbsp;l&agrave;&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Trang_ph%E1%BB%A5c\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Trang phục\">trang phục</a>&nbsp;truyền thống của&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Vi%E1%BB%87t_Nam\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Việt Nam\">Việt Nam</a>, mặc c&ugrave;ng với quần d&agrave;i, che th&acirc;n từ&nbsp;<a href=\"https://vi.wikipedia.org/wiki/C%E1%BB%95\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Cổ\">cổ</a>&nbsp;đến hoặc qu&aacute;&nbsp;<a href=\"https://vi.wikipedia.org/wiki/%C4%90%E1%BA%A7u_g%E1%BB%91i\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Đầu gối\">đầu gối</a>&nbsp;v&agrave; d&agrave;nh cho cả&nbsp;<a class=\"mw-disambig\" href=\"https://vi.wikipedia.org/wiki/Nam\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Nam\">nam</a>&nbsp;lẫn&nbsp;<a class=\"mw-redirect\" href=\"https://vi.wikipedia.org/wiki/N%E1%BB%AF\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Nữ\">nữ</a>&nbsp;nhưng hiện nay thường được biết đến nhiều hơn với tư c&aacute;ch l&agrave; trang phục nữ<sup><a href=\"https://vi.wikipedia.org/wiki/%C3%81o_d%C3%A0i#cite_note-1\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">[1]</a></sup>. &Aacute;o d&agrave;i thường được mặc v&agrave;o c&aacute;c dịp&nbsp;<a href=\"https://vi.wikipedia.org/wiki/L%E1%BB%85_h%E1%BB%99i\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Lễ hội\">lễ hội</a>,&nbsp;<a class=\"new\" href=\"https://vi.wikipedia.org/w/index.php?title=Tr%C3%ACnh_di%E1%BB%85n&amp;action=edit&amp;redlink=1\" style=\"text-decoration: none; color: rgb(165, 88, 88); background: none;\" title=\"Trình diễn (trang chưa được viết)\">tr&igrave;nh diễn</a>; hoặc tại những m&ocirc;i trường đ&ograve;i hỏi sự trang trọng, lịch sự; hoặc l&agrave; đồng phục&nbsp;<a class=\"new\" href=\"https://vi.wikipedia.org/w/index.php?title=N%E1%BB%AF_sinh&amp;action=edit&amp;redlink=1\" style=\"text-decoration: none; color: rgb(165, 88, 88); background: none;\" title=\"Nữ sinh (trang chưa được viết)\">nữ sinh</a>&nbsp;tại một số trường trung học cơ sở hay đại học; hoặc đại diện cho trang phục quốc gia trong c&aacute;c quan hệ quốc tế. C&aacute;c người đẹp Việt Nam hầu hết đều chọn &aacute;o d&agrave;i cho phần thi trang phục d&acirc;n tộc tại c&aacute;c cuộc thi sắc đẹp quốc tế<sup><a href=\"https://vi.wikipedia.org/wiki/%C3%81o_d%C3%A0i#cite_note-dantri-2\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">[2]</a></sup>.</p>\r\n\r\n<p>Trước đ&acirc;y, &aacute;o d&agrave;i thường được mặc kết hợp c&ugrave;ng với&nbsp;<a href=\"https://vi.wikipedia.org/wiki/N%C3%B3n_quai_thao\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Nón quai thao\">n&oacute;n quai thao</a>,&nbsp;<a href=\"https://vi.wikipedia.org/wiki/N%C3%B3n_l%C3%A1\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Nón lá\">n&oacute;n l&aacute;</a>, hay l&agrave;&nbsp;<a class=\"new\" href=\"https://vi.wikipedia.org/w/index.php?title=Kh%C4%83n_%C4%91%C3%B3ng&amp;action=edit&amp;redlink=1\" style=\"text-decoration: none; color: rgb(165, 88, 88); background: none;\" title=\"Khăn đóng (trang chưa được viết)\">khăn đ&oacute;ng</a>. Nhưng kiểu sơ khai nhất của chiếc &aacute;o d&agrave;i l&agrave; chiếc &aacute;o giao l&atilde;nh. Ch&uacute;a&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Nguy%E1%BB%85n_Ph%C3%BAc_Kho%C3%A1t\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Nguyễn Phúc Khoát\">Nguyễn Ph&uacute;c Kho&aacute;t</a>&nbsp;l&agrave; người được xem l&agrave; c&oacute; c&ocirc;ng s&aacute;ng chế chiếc &aacute;o d&agrave;i v&agrave; định h&igrave;nh chiếc &aacute;o d&agrave;i Việt Nam. Ch&iacute;nh do sự di cư của người&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Minh_H%C6%B0%C6%A1ng\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Minh Hương\">Minh Hương</a>&nbsp;m&agrave; ch&uacute;a Nguyễn Ph&uacute;c Kho&aacute;t đ&atilde; cho ra đời chiếc &aacute;o d&agrave;i giao l&atilde;nh để tạo n&eacute;t ri&ecirc;ng cho d&acirc;n tộc Việt.</p>\r\n\r\n<p>Từ &quot;&Aacute;o d&agrave;i&quot; (ao dai /ˈaʊ ˌdʌɪ/) được đưa nguy&ecirc;n bản v&agrave;o&nbsp;<a class=\"mw-redirect\" href=\"https://vi.wikipedia.org/wiki/T%E1%BB%AB_%C4%91i%E1%BB%83n_Oxford\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Từ điển Oxford\">từ điển Oxford</a>&nbsp;v&agrave; được giải th&iacute;ch l&agrave; một loại trang phục của phụ nữ Việt Nam với thiết kế hai t&agrave; &aacute;o trước v&agrave; sau d&agrave;i chấm mắt c&aacute; ch&acirc;n che b&ecirc;n ngo&agrave;i chiếc quần d&agrave;i.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"toc\" id=\"toc\" style=\"border: 1px solid rgb(170, 170, 170); padding: 7px; font-size: 13.3px; display: table; zoom: 1; color: rgb(37, 37, 37); font-family: sans-serif; background-color: rgb(249, 249, 249);\">\r\n<div id=\"toctitle\" style=\"direction: ltr; text-align: center;\">\r\n<h2>Mục lục</h2>\r\n&nbsp;<span style=\"font-size:12.502px\">&nbsp;[<a href=\"https://vi.wikipedia.org/wiki/%C3%81o_d%C3%A0i#\" id=\"togglelink\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">ẩn</a>]&nbsp;</span></div>\r\n\r\n<ul style=\"list-style-type:none\">\r\n	<li><a href=\"https://vi.wikipedia.org/wiki/%C3%81o_d%C3%A0i#L.E1.BB.8Bch_s.E1.BB.AD\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">1Lịch sử</a>\r\n\r\n	<ul style=\"list-style-type:none\">\r\n		<li><a href=\"https://vi.wikipedia.org/wiki/%C3%81o_d%C3%A0i#Th.E1.BB.9Di_ch.C3.BAa_Nguy.E1.BB.85n_Ph.C3.BAc_Kho.C3.A1t\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">1.1Thời ch&uacute;a Nguyễn Ph&uacute;c Kho&aacute;t</a></li>\r\n		<li><a href=\"https://vi.wikipedia.org/wiki/%C3%81o_d%C3%A0i#Th.E1.BB.9Di_vua_Minh_M.E1.BA.A1ng\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">1.2Thời vua Minh Mạng</a></li>\r\n		<li><a href=\"https://vi.wikipedia.org/wiki/%C3%81o_d%C3%A0i#.C3.81o_d.C3.A0i_Le_Mur\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">1.3&Aacute;o d&agrave;i Le Mur</a></li>\r\n		<li><a href=\"https://vi.wikipedia.org/wiki/%C3%81o_d%C3%A0i#.C3.81o_d.C3.A0i_L.C3.AA_Ph.E1.BB.95\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">1.4&Aacute;o d&agrave;i L&ecirc; Phổ</a></li>\r\n		<li><a href=\"https://vi.wikipedia.org/wiki/%C3%81o_d%C3%A0i#.22.C4.90.E1.BB.9Di_s.E1.BB.91ng_m.E1.BB.9Bi.22\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">1.5&quot;Đời sống mới&quot;</a></li>\r\n		<li><a href=\"https://vi.wikipedia.org/wiki/%C3%81o_d%C3%A0i#.C3.81o_d.C3.A0i_Tr.E1.BA.A7n_L.E1.BB.87_Xu.C3.A2n\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">1.6&Aacute;o d&agrave;i Trần Lệ Xu&acirc;n</a></li>\r\n		<li><a href=\"https://vi.wikipedia.org/wiki/%C3%81o_d%C3%A0i#.C3.81o_d.C3.A0i_v.E1.BB.9Bi_tay_gi.C3.A1c_l.C4.83ng\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">1.7&Aacute;o d&agrave;i với tay gi&aacute;c lăng</a></li>\r\n		<li><a href=\"https://vi.wikipedia.org/wiki/%C3%81o_d%C3%A0i#.C3.81o_d.C3.A0i_mini_ranglan\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">1.8&Aacute;o d&agrave;i mini ranglan</a></li>\r\n	</ul>\r\n	</li>\r\n	<li><a href=\"https://vi.wikipedia.org/wiki/%C3%81o_d%C3%A0i#M.E1.BB.99t_bi.E1.BB.83u_t.C6.B0.E1.BB.A3ng_c.E1.BB.A7a_Vi.E1.BB.87t_Nam\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">2Một biểu tượng của Việt Nam</a></li>\r\n	<li><a href=\"https://vi.wikipedia.org/wiki/%C3%81o_d%C3%A0i#.C3.81o_d.C3.A0i_trong_ngh.E1.BB.87_thu.E1.BA.ADt\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">3&Aacute;o d&agrave;i trong nghệ thuật</a>\r\n	<ul style=\"list-style-type:none\">\r\n		<li><a href=\"https://vi.wikipedia.org/wiki/%C3%81o_d%C3%A0i#Th.C6.A1_v.C4.83n\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">3.1Thơ văn</a></li>\r\n		<li><a href=\"https://vi.wikipedia.org/wiki/%C3%81o_d%C3%A0i#.C3.82m_nh.E1.BA.A1c\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">3.2&Acirc;m nhạc</a></li>\r\n		<li><a href=\"https://vi.wikipedia.org/wiki/%C3%81o_d%C3%A0i#H.E1.BB.99i_h.E1.BB.8Da\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">3.3Hội họa</a></li>\r\n		<li><a href=\"https://vi.wikipedia.org/wiki/%C3%81o_d%C3%A0i#Tr.C3.ACnh_di.E1.BB.85n\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">3.4Tr&igrave;nh diễn</a></li>\r\n	</ul>\r\n	</li>\r\n	<li><a href=\"https://vi.wikipedia.org/wiki/%C3%81o_d%C3%A0i#.C3.81o_d.C3.A0i_nam\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">4&Aacute;o d&agrave;i nam</a></li>\r\n	<li><a href=\"https://vi.wikipedia.org/wiki/%C3%81o_d%C3%A0i#H.C3.ACnh_.E1.BA.A3nh\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">5H&igrave;nh ảnh</a></li>\r\n	<li><a href=\"https://vi.wikipedia.org/wiki/%C3%81o_d%C3%A0i#Ch.C3.BA_th.C3.ADch\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">6Ch&uacute; th&iacute;ch</a></li>\r\n	<li><a href=\"https://vi.wikipedia.org/wiki/%C3%81o_d%C3%A0i#Xem_th.C3.AAm\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">7Xem th&ecirc;m</a></li>\r\n	<li><a href=\"https://vi.wikipedia.org/wiki/%C3%81o_d%C3%A0i#Li.C3.AAn_k.E1.BA.BFt_ngo.C3.A0i\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">8Li&ecirc;n kết ngo&agrave;i</a></li>\r\n</ul>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Lịch sử<span style=\"font-family:sans-serif; font-size:small\"><span style=\"color:rgb(85, 85, 85)\">[</span><a class=\"mw-editsection-visualeditor\" href=\"https://vi.wikipedia.org/w/index.php?title=%C3%81o_d%C3%A0i&amp;veaction=edit&amp;vesection=1\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Sửa đổi phần “Lịch sử”\">sửa</a><span style=\"color:rgb(85, 85, 85)\">&nbsp;|&nbsp;</span><a href=\"https://vi.wikipedia.org/w/index.php?title=%C3%81o_d%C3%A0i&amp;action=edit&amp;section=1\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Sửa đổi phần “Lịch sử”\">sửa m&atilde; nguồn</a><span style=\"color:rgb(85, 85, 85)\">]</span></span></h2>\r\n\r\n<p>Căn cứ theo những chứng liệu n&agrave;y, c&oacute; thể khẳng định chiếc &aacute;o d&agrave;i với h&igrave;nh thức cố định đ&atilde; ra đời v&agrave; ch&iacute;nh thức được c&ocirc;ng nhận l&agrave; quốc phục dưới triều ch&uacute;a Nguyễn Vũ Vương (<a href=\"https://vi.wikipedia.org/wiki/1739\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"1739\">1739</a>-<a href=\"https://vi.wikipedia.org/wiki/1765\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"1765\">1765</a>). V&agrave;o thời n&agrave;y, c&aacute;c văn bản tại Việt Nam d&ugrave;ng&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Ch%E1%BB%AF_H%C3%A1n\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Chữ Hán\">chữ H&aacute;n</a>&nbsp;hoặc&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Ch%E1%BB%AF_N%C3%B4m\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Chữ Nôm\">chữ N&ocirc;m</a><sup><a href=\"https://vi.wikipedia.org/wiki/%C3%81o_d%C3%A0i#cite_note-3\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">[3]</a></sup>.</p>\r\n\r\n<p>Một v&agrave;i t&agrave;i liệu quy kết việc ra đời của chiếc &aacute;o d&agrave;i quốc phục l&agrave; do những tham vọng ri&ecirc;ng tư của ch&uacute;a Nguyễn Ph&uacute;c Kho&aacute;t. Do muốn xưng vương v&agrave; t&aacute;ch rời&nbsp;<a href=\"https://vi.wikipedia.org/wiki/%C4%90%C3%A0ng_Trong\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Đàng Trong\">Đ&agrave;ng Trong</a>&nbsp;th&agrave;nh quốc gia ri&ecirc;ng, n&ecirc;n ban sắc dụ về ăn mặc như tr&ecirc;n cho kh&aacute;c đi, kh&ocirc;ng phải với người&nbsp;<a class=\"new\" href=\"https://vi.wikipedia.org/w/index.php?title=Kh%C3%A1ch_tr%C3%BA&amp;action=edit&amp;redlink=1\" style=\"text-decoration: none; color: rgb(165, 88, 88); background: none;\" title=\"Khách trú (trang chưa được viết)\">kh&aacute;ch tr&uacute;</a>&nbsp;m&agrave; với Bắc triều (trong quy định n&agrave;y đ&atilde; c&oacute; cả chỉ thị phụ nữ phải mặc quần hai ống). Năm 1744 cũng l&agrave; thời điểm đ&aacute;nh dấu sự xuất hiện của quần ch&acirc;n &aacute;o ch&iacute;t, bộ trang phục ban đầu &aacute;p dụng tại hai v&ugrave;ng Thuận H&oacute;a, Quảng Nam, về sau được phổ biến rộng r&atilde;i trong to&agrave;n quốc, từng bước trở th&agrave;nh quốc phục của triều Nguyễn.</p>\r\n\r\n<div class=\"thumb tright\" style=\"clear: right; float: right; margin: 0.5em 0px 1.3em 1.4em; width: auto; color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.4px;\">\r\n<div class=\"thumbinner\" style=\"border: 1px solid rgb(204, 204, 204); padding: 3px; font-size: 13.16px; text-align: center; width: 202px; background-color: rgb(249, 249, 249);\"><a class=\"image\" href=\"https://vi.wikipedia.org/wiki/T%E1%BA%ADp_tin:Gi%E1%BA%A3ng_h%E1%BB%8Dc_%C4%91%E1%BB%93.png\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\"><img alt=\"\" class=\"thumbimage\" src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Gi%E1%BA%A3ng_h%E1%BB%8Dc_%C4%91%E1%BB%93.png/200px-Gi%E1%BA%A3ng_h%E1%BB%8Dc_%C4%91%E1%BB%93.png\" style=\"background-color:rgb(255, 255, 255); border:1px solid rgb(204, 204, 204); height:228px; vertical-align:middle; width:200px\" /></a>\r\n\r\n<div class=\"thumbcaption\" style=\"border: none; line-height: 1.4em; padding: 3px; font-size: 12.3704px; overflow: hidden; word-wrap: break-word; text-align: left;\">\r\n<div class=\"magnify\" style=\"float: right; margin-left: 3px; margin-right: 0px;\">&nbsp;</div>\r\n<em>Giảng học đồ</em>&nbsp;vẽ c&aacute;ch trang phục của&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Ng%C6%B0%E1%BB%9Di_Vi%E1%BB%87t\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Người Việt\">người Việt</a>&nbsp;v&agrave;o&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Th%E1%BA%BF_k%E1%BB%B7_18\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Thế kỷ 18\">thế kỷ 18</a>&nbsp;ở&nbsp;<a href=\"https://vi.wikipedia.org/wiki/%C4%90%C3%A0ng_Ngo%C3%A0i\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Đàng Ngoài\">Đ&agrave;ng Ngo&agrave;i</a>&nbsp;mặc&nbsp;<a class=\"mw-redirect\" href=\"https://vi.wikipedia.org/wiki/%C3%81o_giao_l%C4%A9nh\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Áo giao lĩnh\">&aacute;o giao lĩnh</a>&nbsp;g&agrave;i b&ecirc;n phải</div>\r\n</div>\r\n</div>\r\n\r\n<p>Kh&ocirc;ng ai biết r&otilde; chiếc &aacute;o d&agrave;i nguy&ecirc;n thủy ra đời từ l&uacute;c n&agrave;o v&agrave; h&igrave;nh d&aacute;ng ra sao v&igrave; kh&ocirc;ng c&oacute; t&agrave;i liệu ghi nhận v&agrave; chưa c&oacute; nhiều người nghi&ecirc;n cứu. Y phục xa xưa nhất của&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Ng%C6%B0%E1%BB%9Di_Vi%E1%BB%87t\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Người Việt\">người Việt</a>, theo những h&igrave;nh khắc tr&ecirc;n mặt chiếc&nbsp;<a class=\"mw-redirect\" href=\"https://vi.wikipedia.org/wiki/Tr%E1%BB%91ng_%C4%91%E1%BB%93ng_Ng%E1%BB%8Dc_L%C5%A9\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Trống đồng Ngọc Lũ\">trống đồng Ngọc Lũ</a>&nbsp;c&aacute;ch nay khoảng v&agrave;i ngh&igrave;n năm cho thấy h&igrave;nh phụ nữ mặc trang phục với hai t&agrave; &aacute;o xẻ. Sử giả&nbsp;<a href=\"https://vi.wikipedia.org/wiki/%C4%90%C3%A0o_Duy_Anh\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Đào Duy Anh\">Đ&agrave;o Duy Anh</a>&nbsp;viết, &quot;Theo s&aacute;ch&nbsp;<a class=\"mw-redirect mw-disambig\" href=\"https://vi.wikipedia.org/wiki/S%E1%BB%AD_k%C3%BD\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Sử ký\">Sử k&yacute;</a>&nbsp;ch&eacute;p th&igrave; người&nbsp;<a href=\"https://vi.wikipedia.org/wiki/V%C4%83n_Lang\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Văn Lang\">Văn Lang</a>&nbsp;xưa, tức l&agrave; tổ ti&ecirc;n ta, mặc &aacute;o d&agrave;i về b&ecirc;n tả (h&igrave;nh thức&nbsp;<em>tả nhiệm</em>). Sử lại ch&eacute;p rằng ở&nbsp;<a class=\"mw-redirect\" href=\"https://vi.wikipedia.org/wiki/Th%E1%BA%BF_k%E1%BB%B7_th%E1%BB%A9_nh%E1%BA%A5t\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Thế kỷ thứ nhất\">thế kỷ thứ nhất</a>,&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Nh%C3%A2m_Di%C3%AAn\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Nhâm Diên\">Nh&acirc;m Di&ecirc;n</a>&nbsp;dạy cho d&acirc;n quận&nbsp;<a href=\"https://vi.wikipedia.org/wiki/C%E1%BB%ADu_Ch%C3%A2n\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Cửu Chân\">Cửu Ch&acirc;n</a>&nbsp;d&ugrave;ng kiểu quần &aacute;o theo&nbsp;<a class=\"mw-redirect mw-disambig\" href=\"https://vi.wikipedia.org/wiki/Ng%C6%B0%E1%BB%9Di_T%C3%A0u\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Người Tàu\">người T&agrave;u</a>. Theo những lời s&aacute;ch đ&oacute; ch&eacute;p th&igrave; ta c&oacute; thể suy luận rằng trước hồi&nbsp;<a href=\"https://vi.wikipedia.org/wiki/B%E1%BA%AFc_thu%E1%BB%99c\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Bắc thuộc\">Bắc thuộc</a>&nbsp;th&igrave; người Việt g&agrave;i &aacute;o về tay tr&aacute;i, m&agrave; sau bắt chước người Trung Quốc mới mặc &aacute;o g&agrave;i về tay phải&quot;<sup><a href=\"https://vi.wikipedia.org/wiki/%C3%81o_d%C3%A0i#cite_note-4\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">[4]</a></sup>.</p>\r\n\r\n<p>Kiểu sơ khai của chiếc &aacute;o d&agrave;i xưa nhất l&agrave;&nbsp;<a href=\"https://vi.wikipedia.org/wiki/%C3%81o_giao_l%C3%A3nh\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Áo giao lãnh\">&aacute;o giao l&atilde;nh</a>, tương tự như&nbsp;<a href=\"https://vi.wikipedia.org/wiki/%C3%81o_t%E1%BB%A9_th%C3%A2n\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Áo tứ thân\">&aacute;o tứ th&acirc;n</a>&nbsp;nhưng khi mặc th&igrave; hai th&acirc;n trước để giao nhau m&agrave; kh&ocirc;ng buộc lại. &Aacute;o mặc phủ ngo&agrave;i yếm l&oacute;t, v&aacute;y tơ đen, thắt lưng m&agrave;u bu&ocirc;ng thả. Xưa c&aacute;c b&agrave; c&aacute;c c&ocirc; b&uacute;i t&oacute;c tr&ecirc;n đỉnh đầu hoặc quấn quanh đầu, đội mũ l&ocirc;ng chim d&agrave;i; về sau bỏ mũ l&ocirc;ng chim để đội khăn, vấn khăn, đội n&oacute;n l&aacute;, n&oacute;n th&uacute;ng. Cổ nh&acirc;n xưa đi ch&acirc;n đất, về sau mang guốc gỗ, d&eacute;p, gi&agrave;y. V&igrave; phải l&agrave;m việc đồng &aacute;ng hoặc bu&ocirc;n b&aacute;n, chiếc &aacute;o giao l&atilde;nh được thu gọn lại th&agrave;nh kiểu &aacute;o tứ th&acirc;n (gồm bốn vạt nửa: vạt nửa trước phải, vạt nửa trước tr&aacute;i, vạt nửa sau phải, vạt nửa sau tr&aacute;i). &Aacute;o tứ th&acirc;n được mặc ra ngo&agrave;i v&aacute;y xắn quai cồng để tiện cho việc gồng g&aacute;nh nhưng vẫn kh&ocirc;ng l&agrave;m mất đi vẻ đẹp của người phụ nữ.</p>\r\n\r\n<p>&Aacute;o tứ th&acirc;n th&iacute;ch hợp cho người phụ nữ miền qu&ecirc; quanh năm cần c&ugrave; bươn chải, g&aacute;nh gồng th&aacute;o v&aacute;t. Với những phụ nữ tỉnh th&agrave;nh nh&agrave;n hạ hơn, muốn c&oacute; một kiểu &aacute;o d&agrave;i được c&aacute;ch t&acirc;n thế n&agrave;o đ&oacute; để giảm chế n&eacute;t d&acirc;n d&atilde; lao động v&agrave; gia tăng d&aacute;ng dấp trang trọng khu&ecirc; c&aacute;c. Thế l&agrave; ra đời&nbsp;<a class=\"new\" href=\"https://vi.wikipedia.org/w/index.php?title=%C3%81o_ng%C5%A9_th%C3%A2n&amp;action=edit&amp;redlink=1\" style=\"text-decoration: none; color: rgb(165, 88, 88); background: none;\" title=\"Áo ngũ thân (trang chưa được viết)\">&aacute;o ngũ th&acirc;n</a>&nbsp;với biến cải ở chỗ vạt nửa trước phải nay được thu b&eacute; lại trở th&agrave;nh vạt con; th&ecirc;m một vạt thứ năm be b&eacute; nằm ở dưới vạt trước. &Aacute;o ngũ th&acirc;n che k&iacute;n th&acirc;n h&igrave;nh kh&ocirc;ng để hở &aacute;o l&oacute;t. Mỗi vạt c&oacute; hai th&acirc;n nối sống (vị chi th&agrave;nh bốn) tượng trưng cho tứ cha mẫu, v&agrave; vạt con nằm dưới vạt trước ch&iacute;nh l&agrave; th&acirc;n thứ năm tượng trưng cho người mặc &aacute;o. Vạt con nối với hai vạt cả nhờ cổ &aacute;o c&oacute; b&acirc;u đệm, v&agrave; kh&eacute;p k&iacute;n nhờ năm chiếc khuy tượng trưng cho quan điểm về&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Ng%C5%A9_th%C6%B0%E1%BB%9Dng\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Ngũ thường\">ngũ thường</a>&nbsp;theo quan điểm&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Nho_gi%C3%A1o\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Nho giáo\">Nho gi&aacute;o</a>&nbsp;v&agrave;&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Ng%C5%A9_h%C3%A0nh\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Ngũ hành\">ngũ h&agrave;nh</a>&nbsp;theo triết học Đ&ocirc;ng phương.</p>\r\n\r\n<h3>Thời ch&uacute;a Nguyễn Ph&uacute;c Kho&aacute;t<span style=\"font-size:small\"><span style=\"color:rgb(85, 85, 85)\">[</span><a class=\"mw-editsection-visualeditor\" href=\"https://vi.wikipedia.org/w/index.php?title=%C3%81o_d%C3%A0i&amp;veaction=edit&amp;vesection=2\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Sửa đổi phần “Thời chúa Nguyễn Phúc Khoát”\">sửa</a><span style=\"color:rgb(85, 85, 85)\">&nbsp;|&nbsp;</span><a href=\"https://vi.wikipedia.org/w/index.php?title=%C3%81o_d%C3%A0i&amp;action=edit&amp;section=2\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Sửa đổi phần “Thời chúa Nguyễn Phúc Khoát”\">sửa m&atilde; nguồn</a><span style=\"color:rgb(85, 85, 85)\">]</span></span></h3>\r\n\r\n<div class=\"thumb tright\" style=\"clear: right; float: right; margin: 0.5em 0px 1.3em 1.4em; width: auto; color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.4px;\">\r\n<div class=\"thumbinner\" style=\"border: 1px solid rgb(204, 204, 204); padding: 3px; font-size: 13.16px; text-align: center; width: 202px; background-color: rgb(249, 249, 249);\"><a class=\"image\" href=\"https://vi.wikipedia.org/wiki/T%E1%BA%ADp_tin:Ao_ngu_than_on_postcard_dated_1904.JPG\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\"><img alt=\"\" class=\"thumbimage\" src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/Ao_ngu_than_on_postcard_dated_1904.JPG/200px-Ao_ngu_than_on_postcard_dated_1904.JPG\" style=\"background-color:rgb(255, 255, 255); border:1px solid rgb(204, 204, 204); height:250px; vertical-align:middle; width:200px\" /></a>\r\n\r\n<div class=\"thumbcaption\" style=\"border: none; line-height: 1.4em; padding: 3px; font-size: 12.3704px; overflow: hidden; word-wrap: break-word; text-align: left;\">\r\n<div class=\"magnify\" style=\"float: right; margin-left: 3px; margin-right: 0px;\">&nbsp;</div>\r\n&Aacute;o d&agrave;i ngũ th&acirc;n, khoảng năm 1900</div>\r\n</div>\r\n</div>\r\n\r\n<p>Chịu ảnh hưởng nặng của văn h&oacute;a&nbsp;<a class=\"mw-redirect\" href=\"https://vi.wikipedia.org/wiki/Trung_Hoa\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Trung Hoa\">Trung Hoa</a>, cho đến&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Th%E1%BA%BF_k%E1%BB%B7_16\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Thế kỷ 16\">thế kỷ 16</a>&nbsp;lối ăn mặc của người Việt Nam vẫn thường hay bắt chước lối của người phương Bắc, đặc biệt dưới thời c&aacute;c&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Ch%C3%BAa_Nguy%E1%BB%85n\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Chúa Nguyễn\">ch&uacute;a Nguyễn</a>&nbsp;xứ&nbsp;<a href=\"https://vi.wikipedia.org/wiki/%C4%90%C3%A0ng_Trong\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Đàng Trong\">Đ&agrave;ng Trong</a>&nbsp;do nhu cầu khai ph&aacute; khẩn hoang, đ&oacute;n nhận h&agrave;ng vạn người&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Minh_H%C6%B0%C6%A1ng\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Minh Hương\">Minh Hương</a>&nbsp;(c&ograve;n gọi l&agrave; người Kh&aacute;ch Tr&uacute; hay đọc trại th&agrave;nh &quot;cắc ch&uacute;&quot;) bất m&atilde;n với&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Nh%C3%A0_Thanh\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Nhà Thanh\">nh&agrave; Thanh</a>&nbsp;sang định cư lập nghiệp, mặc d&ugrave; người Việt cũng c&oacute; lối ăn mặc ri&ecirc;ng.</p>\r\n\r\n<p>Trước l&agrave;n s&oacute;ng x&acirc;m nhập mới n&agrave;y, để g&igrave;n giữ bản sắc văn h&oacute;a ri&ecirc;ng, Vũ Vương Nguyễn Ph&uacute;c Kho&aacute;t ban h&agrave;nh sắc dụ về ăn mặc cho to&agrave;n thể d&acirc;n ch&uacute;ng xứ Đ&agrave;ng Trong phải theo đ&oacute; thi h&agrave;nh. Trong sắc dụ đ&oacute;, người ta thấy lần đầu ti&ecirc;n sự định h&igrave;nh cơ bản của chiếc &aacute;o d&agrave;i Việt Nam, như sau: &quot;Thường phục th&igrave; đ&agrave;n &ocirc;ng, đ&agrave;n b&agrave; d&ugrave;ng &aacute;o cổ đứng ngắn tay, cửa ống tay rộng hoặc hẹp t&ugrave;y tiện. &Aacute;o th&igrave; hai b&ecirc;n n&aacute;ch trở xuống phải kh&acirc;u k&iacute;n liền, kh&ocirc;ng được xẻ mở. Duy đ&agrave;n &ocirc;ng kh&ocirc;ng muốn mặc &aacute;o cổ tr&ograve;n ống tay hẹp cho tiện khi l&agrave;m việc th&igrave; được ph&eacute;p...&quot; (s&aacute;ch&nbsp;<em>Đại Nam Thực lục</em>&nbsp;từ Th&aacute;i Tổ đến nay vừa đ&uacute;ng con số ấy, b&egrave;n thay đổi y phục, đổi phong tục, c&ugrave;ng d&acirc;n đổi mới, bắt đầu hạ lệnh cho nam nữ sĩ thứ trong nước, đều mặc &aacute;o nhu b&agrave;o, mặc quần, vấn khăn, tục gọi quần ch&acirc;n &aacute;o ch&iacute;t bắt đầu từ đ&acirc;y. Trang phục nh&agrave; cửa đồ d&ugrave;ng hơi giống thể chế Minh Thanh, thay đổi hết th&oacute;i cũ hủ lậu của Bắc H&agrave;, thay đổi quan phục tham khảo chế độ của c&aacute;c triều đại Trung Quốc, chế ra phẩm phục Thường triều, Đại triều, lấy l&agrave;m m&ocirc; thức, ban h&agrave;nh trong nước, văn chất đủ vẻ, trở th&agrave;nh nước &aacute;o mũ văn vật vậy!.</p>\r\n\r\n<p>Tổng hợp c&aacute;c ghi ch&eacute;p vừa rồi c&oacute; thể thấy, cải c&aacute;ch năm 1744 l&agrave; một cuộc cải c&aacute;ch lớn về y phục cung đ&igrave;nh ch&iacute;nh để đặt định y phục l&agrave; c&aacute;c s&aacute;ch Hội điển ghi ch&eacute;p điển chương chế độ của c&aacute;c triều đại H&aacute;n, Đường, Tống, Minh, Thanh v&agrave; đặc biệt l&agrave; Tam t&agrave;i đồ hội của Vương kỳ thời Minh. Năm 1744 cũng l&agrave; thời điểm đ&aacute;nh dấu sự xuất hiện của quần ch&acirc;n &aacute;o ch&iacute;t, bộ trang phục ban đầu &aacute;p dụng tại hai v&ugrave;ng Thuận H&oacute;a, Quảng Nam, về sau được phổ biến rộng r&atilde;i trong to&agrave;n quốc, từng bước trở th&agrave;nh quốc phục của triều Nguyễn.</p>\r\n','Áo dài trắng đính kim cương nhân tạo, chất liệu vải cao cấp, tôn lên vẻ đẹp người phụ nữ Việt',NULL,'Áo dài trắng đính kim cương nhân tạo','Áo dài trắng đính kim cương nhân tạo','Áo dài trắng đính kim cương nhân tạo','Áo dài trắng đính kim cương nhân tạo, chất liệu vải cao cấp, tôn lên vẻ đẹp người phụ nữ Việt','Áo dài trắng đính kim cương nhân tạo, ao dai trang dinh kim cuong nhan tao',0,1,0,0,0,0,0,0,1464511569,1464511581,1464512420,'quyettv','quyettv',0,0,0,0,0,0,0,'');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_category` */

insert  into `product_category`(`id`,`parent_id`,`slug`,`old_slugs`,`name`,`description`,`long_description`,`page_title`,`h1`,`meta_title`,`meta_description`,`meta_keywords`,`image`,`banner`,`image_path`,`is_hot`,`is_active`,`status`,`position`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (1,NULL,'ao-dai',NULL,'Áo dài',NULL,'','Áo dài','Áo dài','Áo dài','Bộ sưu tập áo dài','Áo dài, ao dai','','','/2016/05/29/xL/',0,1,0,1,1464510515,NULL,'quyettv',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_image` */

insert  into `product_image`(`id`,`product_id`,`image`,`image_path`,`color_code`,`name`,`caption`) values (1,1,'800px-Mai_Phuong_Thuy_Vietnam_Festival_2008_in_Japan.jpg','/2016/05/29/iD/',NULL,'Hoa hậu Mai Phương Thúy trong tà áo dài Việt Nam',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `slideshow_item` */

insert  into `slideshow_item`(`id`,`image`,`image_path`,`link`,`caption`,`position`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (1,'bnatsoft.com1435243417851.jpg','/2016/05/29/EQ/','','',NULL,1,1464519536,'quyettv',NULL,NULL);

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

insert  into `user`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`firstname`,`lastname`,`dob`,`alias`,`gender`,`image`,`image_path`) values (1,'quyettv','wlho-VRNjNyJbPA1OeITK-AxMa_X3rcx','$2y$13$gvo7VgiMIeC.Z7KXu8L5uuQaaad/fLraOQHwbrFz4upGay5VbhpGO',NULL,'quyettv@hdcgroup.vn',10,0,1455758218,'Quyết','',748130400,'',0,'13.jpg','/2016/02/16/Dk/');

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_log` */

insert  into `user_log`(`id`,`username`,`action`,`created_at`,`is_success`,`object_class`,`object_pk`) values (1,'quyettv','Create',1464510515,1,'ProductCategory',1),(2,'quyettv','Create',1464510542,0,'ProductCategory',NULL),(3,'quyettv','Create',1464511486,0,'Product',NULL),(4,'quyettv','Create',1464511581,1,'Product',1),(5,'quyettv','Create',1464511583,1,'ProductToProductCategory',1),(6,'quyettv','Update',1464511658,1,'Product',1),(7,'quyettv','Update',1464512420,1,'Product',1),(8,'quyettv','Delete',1464512422,1,'ProductToProductCategory',1),(9,'quyettv','Update',1464512444,0,'ProductCategory',1),(10,'quyettv','Create',1464512586,1,'ProductImage',1),(11,'quyettv','Update',1464512629,1,'ProductImage',1),(12,'quyettv','Delete',1464513478,1,'User',2),(13,'quyettv','Delete',1464513485,1,'User',6),(14,'quyettv','Delete',1464513488,1,'User',5),(15,'quyettv','Delete',1464513498,1,'User',4),(16,'quyettv','Delete',1464513505,1,'User',3),(17,'quyettv','Create',1464515690,1,'Article',1),(18,'quyettv','Create',1464515697,0,'ArticleToArticleCategory',NULL),(19,'quyettv','Update',1464515746,1,'Article',1),(20,'quyettv','Update',1464515760,1,'Article',1),(21,'quyettv','Create',1464518399,1,'Gallery',4),(22,'quyettv','Create',1464518420,1,'GalleryImage',8),(23,'quyettv','Create',1464518434,1,'GalleryImage',9),(24,'quyettv','Create',1464519536,1,'SlideshowItem',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `video` */

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `video_to_tag` */

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

/*Data for the table `widget` */

insert  into `widget`(`id`,`page_group_id`,`place`,`position`,`name`,`template`,`item_template`,`item_image_size`,`link_target`,`link_follow`,`style`,`object_class`,`sql_offset`,`sql_limit`,`sql_order_by`,`sql_where`,`status`,`is_active`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (1,0,1,1,'Bài viết mới nhất','<div class=\"topic box_event clearfix\" id=\"my-widget-1\">\r\n   [ITEMS]\r\n   [ADSENSE]\r\n</div>\r\n','<article class=\"result_event clearfix\">\r\n   [IMAGE URL]\r\n   <div class=\"title-news\">\r\n      [NAME URL]\r\n   </div>\r\n</article>',NULL,NULL,NULL,'#my-widget-1 article a {\r\n   overflow: hidden;\r\n   display: block;\r\n   font-weight:bold;\r\n}\r\n#my-widget-1 article img {\r\n   display: block;\r\n   width: 100%;\r\n}','Article',0,6,'id desc','',NULL,1,1462522194,1462863977,'quyettv','quyettv'),(2,NULL,1,1,'Xem tử vi theo tuổi','<div class=\"boxbor\">\r\n <div class=\"title\"><strong>[NAME]</strong></div>\r\n<ul class=\"list_col list-unstyle\">\r\n[ITEMS]\r\n</ul>\r\n</div>\r\n</div>','<li class=\"thumb clearfix\">\r\n[IMAGE URL]\r\n<h3 class=\"title-news\">[NAME URL]</h3>\r\n</li>',NULL,NULL,NULL,'.title-news {\r\n    font-weight:bold;\r\n}\r\n.list_col .thumb img {\r\n    float: left;\r\n    width: 25%;\r\n    margin: 0 8px 2px 0;\r\n    max-height: 60px;\r\n    overflow: hidden;\r\n}','Tag',NULL,12,'position asc','slug like \"%tu-vi-tuoi-%\"',NULL,1,1462864118,NULL,'quyettv',NULL);

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
