-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  `publish` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 => Active, 0 => Not Active',
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci,
  `meta_description` text COLLATE utf8_unicode_ci,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `testimonials` (`id`, `title`, `name`, `image`, `description`, `lang`, `publish`, `published_time`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `alias`, `created`, `modified`) VALUES
(2,	'BBBB',	'Apurav',	'happy-married-couple.jpg',	'Great site..nice work',	'en',	NULL,	NULL,	1,	'as',	'asa',	'sasa',	NULL,	'2015-03-30 10:10:30',	'2015-06-15 07:15:20'),
(3,	'Demo Message',	'Demo Message',	'20140202114049-1013574_597486590272607_1480525542_n.jpg',	'Demo Message',	'en',	NULL,	NULL,	1,	'a',	'sasa',	'asasa',	NULL,	'2015-03-30 10:14:51',	'2015-03-30 11:53:51'),
(4,	'Wah ',	'Gareeb',	'slideshow-main-portrait-image-ds-photo-getty-article-110-35-86531644.jpg',	'If $text is longer than $length characters, this method truncates it at $length and adds a prefix consisting of \'ellipsis\', if defined. If \'exact\' is passed as false, the truncation will occur at the first whitespace after the point at which $length is exceeded. If \'html\' is passed as true, HTML tags will be respected and will not be cut off.',	'en',	NULL,	NULL,	1,	'as',	'asa',	'sa',	NULL,	'2015-03-30 11:35:36',	'2015-03-30 11:54:04'),
(5,	'Mailinator For testing',	'Mailinator',	'business-professional_600x315.jpg',	'You should do some profiling stuff(microtime should be enough) and \'\'drill down\'\' by eliminating code which isn\'t cause this slowness. only when you find it you should update your question with the source code and then we could help you speed it up ',	'en',	NULL,	NULL,	1,	'mailinator',	'mailinator',	'mailinator',	NULL,	'2015-03-30 11:39:11',	'2015-03-31 04:48:08'),
(6,	'Gmail',	'Gmail',	'7971_M_BusPro.gif',	'L uses a cryptographic system that uses two keys to encrypt data â€“ a public key known to everyone and a private or secret key known only to the recipient of the message. Both Netscape Navigator and Internet Explorer support SSL, and many Web sites use the protocol to obtain confidential user information, such as credit card numbers. By convention, URLs that require an SSL connection start with https: instead of http: - See more at: http://www.phpgenious.com/2009/03/redirect-to-https-ssl-in-php/#sthash.NYtd8LSh.dpuf',	'en',	NULL,	NULL,	1,	'gmail',	'gmail',	'gmail',	NULL,	'2015-03-30 11:43:36',	'2015-03-31 04:48:13'),
(8,	'fghfgh',	'dfghfgh',	'000407177alt5 - Copy.jpg',	'fghfg',	'en',	NULL,	NULL,	1,	'',	'',	'',	NULL,	'2015-03-31 04:48:25',	'2015-03-31 04:48:25'),
(7,	'fghf',	'Test',	'eve_online_t_shirt_new - Copy.jpg',	'fghfg',	'en',	NULL,	NULL,	1,	'',	'',	'',	NULL,	'2015-03-31 04:46:19',	'2015-03-31 04:46:19');

-- 2015-06-15 08:25:10
