-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2017 at 04:28 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anil`
--

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE `acos` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT '',
  `foreign_key` int(10) UNSIGNED DEFAULT NULL,
  `alias` varchar(255) DEFAULT '',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 204),
(4, 1, NULL, NULL, 'Pages', 6, 13),
(5, 4, NULL, NULL, '_admin_index', 7, 8),
(6, 4, NULL, NULL, '_admin_add', 9, 10),
(7, 4, NULL, NULL, '_admin_edit', 11, 12),
(8, 1, NULL, NULL, 'Users', 14, 25),
(9, 8, NULL, NULL, '_admin_index', 15, 16),
(10, 8, NULL, NULL, '_admin_add', 17, 18),
(11, 8, NULL, NULL, '_admin_edit', 19, 20),
(12, 8, NULL, NULL, '_admin_delete', 21, 22),
(13, 1, NULL, NULL, 'FullCalendar', 26, 29),
(14, 13, NULL, NULL, '_admin_index', 27, 28),
(15, 1, NULL, NULL, 'Events', 30, 39),
(16, 15, NULL, NULL, '_admin_index', 31, 32),
(17, 15, NULL, NULL, '_admin_add', 33, 34),
(18, 15, NULL, NULL, '_admin_edit', 35, 36),
(19, 15, NULL, NULL, '_admin_delete', 37, 38),
(20, 1, NULL, NULL, 'BlogPosts', 40, 49),
(21, 20, NULL, NULL, '_admin_index', 41, 42),
(22, 20, NULL, NULL, '_admin_add', 43, 44),
(23, 20, NULL, NULL, '_admin_edit', 45, 46),
(24, 20, NULL, NULL, '_admin_delete', 47, 48),
(25, 1, NULL, NULL, 'BlogPostCategories', 50, 59),
(26, 25, NULL, NULL, '_admin_index', 51, 52),
(27, 25, NULL, NULL, '_admin_add', 53, 54),
(28, 25, NULL, NULL, '_admin_edit', 55, 56),
(29, 25, NULL, NULL, '_admin_delete', 57, 58),
(30, 1, NULL, NULL, 'BlogPostComments', 60, 67),
(31, 30, NULL, NULL, '_admin_index', 61, 62),
(32, 30, NULL, NULL, '_admin_edit', 63, 64),
(33, 30, NULL, NULL, '_admin_delete', 65, 66),
(34, 1, NULL, NULL, 'Services', 68, 77),
(35, 34, NULL, NULL, '_admin_index', 69, 70),
(36, 34, NULL, NULL, '_admin_add', 71, 72),
(37, 34, NULL, NULL, '_admin_edit', 73, 74),
(38, 34, NULL, NULL, '_admin_delete', 75, 76),
(39, 1, NULL, NULL, 'Jobs', 78, 85),
(40, 39, NULL, NULL, '_admin_index', 79, 80),
(41, 39, NULL, NULL, '_admin_edit', 81, 82),
(42, 39, NULL, NULL, '_admin_delete', 83, 84),
(43, 1, NULL, NULL, 'JobUploads', 86, 95),
(44, 43, NULL, NULL, '_admin_index', 87, 88),
(45, 43, NULL, NULL, '_admin_add', 89, 90),
(46, 43, NULL, NULL, '_admin_edit', 91, 92),
(47, 43, NULL, NULL, '_admin_delete', 93, 94),
(48, 1, NULL, NULL, 'Teams', 96, 105),
(49, 48, NULL, NULL, '_admin_index', 97, 98),
(50, 48, NULL, NULL, '_admin_add', 99, 100),
(51, 48, NULL, NULL, '_admin_edit', 101, 102),
(52, 48, NULL, NULL, '_admin_delete', 103, 104),
(53, 1, NULL, NULL, 'TeamMembers', 106, 115),
(54, 53, NULL, NULL, '_admin_index', 107, 108),
(55, 53, NULL, NULL, '_admin_add', 109, 110),
(56, 53, NULL, NULL, '_admin_edit', 111, 112),
(57, 53, NULL, NULL, '_admin_delete', 113, 114),
(58, 1, NULL, NULL, 'Brands', 116, 125),
(59, 58, NULL, NULL, '_admin_index', 117, 118),
(60, 58, NULL, NULL, '_admin_add', 119, 120),
(61, 58, NULL, NULL, '_admin_edit', 121, 122),
(62, 58, NULL, NULL, '_admin_delete', 123, 124),
(63, 1, NULL, NULL, 'Testimonials', 126, 135),
(64, 63, NULL, NULL, '_admin_index', 127, 128),
(65, 63, NULL, NULL, '_admin_add', 129, 130),
(66, 63, NULL, NULL, '_admin_edit', 131, 132),
(67, 63, NULL, NULL, '_admin_delete', 133, 134),
(87, 1, NULL, NULL, 'Roles', 174, 183),
(88, 87, NULL, NULL, '_admin_index', 175, 176),
(89, 87, NULL, NULL, '_admin_add', 177, 178),
(90, 87, NULL, NULL, '_admin_edit', 179, 180),
(91, 87, NULL, NULL, '_admin_delete', 181, 182),
(92, 1, NULL, NULL, 'Faqs', 184, 193),
(93, 92, NULL, NULL, '_admin_index', 185, 186),
(94, 92, NULL, NULL, '_admin_add', 187, 188),
(95, 92, NULL, NULL, '_admin_edit', 189, 190),
(96, 92, NULL, NULL, '_admin_delete', 191, 192),
(97, 1, NULL, NULL, 'Settings', 194, 203),
(98, 97, NULL, NULL, '_admin_index', 195, 196),
(99, 97, NULL, NULL, '_admin_add', 197, 198),
(100, 97, NULL, NULL, '_admin_edit', 199, 200),
(101, 97, NULL, NULL, '_admin_delete', 201, 202),
(102, 8, NULL, NULL, '_admin_forgot_pass', 23, 24);

-- --------------------------------------------------------

--
-- Table structure for table `acos_old`
--

CREATE TABLE `acos_old` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT '',
  `foreign_key` int(10) UNSIGNED DEFAULT NULL,
  `alias` varchar(255) DEFAULT '',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acos_old`
--

INSERT INTO `acos_old` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 824),
(2, 1, NULL, NULL, 'Ajax', 2, 21),
(3, 2, NULL, NULL, 'showStatelist', 3, 4),
(4, 2, NULL, NULL, 'showCitylist', 5, 6),
(5, 2, NULL, NULL, 'is_login', 7, 8),
(6, 2, NULL, NULL, 'get_user', 9, 10),
(7, 2, NULL, NULL, 'send_mail', 11, 12),
(8, 2, NULL, NULL, 'outOfPageRangeRedirect', 13, 14),
(9, 2, NULL, NULL, 'download', 15, 16),
(10, 2, NULL, NULL, 'generateRandomString', 17, 18),
(11, 2, NULL, NULL, 'isAuthorized', 19, 20),
(12, 1, NULL, NULL, 'BlogPostComments', 22, 45),
(13, 12, NULL, NULL, 'comment', 23, 24),
(14, 12, NULL, NULL, 'admin_index', 25, 26),
(15, 12, NULL, NULL, 'admin_edit', 27, 28),
(16, 12, NULL, NULL, 'admin_delete', 29, 30),
(17, 12, NULL, NULL, 'is_login', 31, 32),
(18, 12, NULL, NULL, 'get_user', 33, 34),
(19, 12, NULL, NULL, 'send_mail', 35, 36),
(20, 12, NULL, NULL, 'outOfPageRangeRedirect', 37, 38),
(21, 12, NULL, NULL, 'download', 39, 40),
(22, 12, NULL, NULL, 'generateRandomString', 41, 42),
(23, 12, NULL, NULL, 'isAuthorized', 43, 44),
(24, 1, NULL, NULL, 'Dashboard', 46, 63),
(25, 24, NULL, NULL, 'admin_index', 47, 48),
(26, 24, NULL, NULL, 'is_login', 49, 50),
(27, 24, NULL, NULL, 'get_user', 51, 52),
(28, 24, NULL, NULL, 'send_mail', 53, 54),
(29, 24, NULL, NULL, 'outOfPageRangeRedirect', 55, 56),
(30, 24, NULL, NULL, 'download', 57, 58),
(31, 24, NULL, NULL, 'generateRandomString', 59, 60),
(32, 24, NULL, NULL, 'isAuthorized', 61, 62),
(33, 1, NULL, NULL, 'EmailTemplates', 64, 87),
(34, 33, NULL, NULL, 'admin_index', 65, 66),
(35, 33, NULL, NULL, 'admin_add', 67, 68),
(36, 33, NULL, NULL, 'admin_edit', 69, 70),
(37, 33, NULL, NULL, 'admin_delete', 71, 72),
(38, 33, NULL, NULL, 'is_login', 73, 74),
(39, 33, NULL, NULL, 'get_user', 75, 76),
(40, 33, NULL, NULL, 'send_mail', 77, 78),
(41, 33, NULL, NULL, 'outOfPageRangeRedirect', 79, 80),
(42, 33, NULL, NULL, 'download', 81, 82),
(43, 33, NULL, NULL, 'generateRandomString', 83, 84),
(44, 33, NULL, NULL, 'isAuthorized', 85, 86),
(45, 1, NULL, NULL, 'Faqs', 88, 111),
(46, 45, NULL, NULL, 'admin_index', 89, 90),
(47, 45, NULL, NULL, 'admin_add', 91, 92),
(48, 45, NULL, NULL, 'admin_edit', 93, 94),
(49, 45, NULL, NULL, 'admin_delete', 95, 96),
(50, 45, NULL, NULL, 'is_login', 97, 98),
(51, 45, NULL, NULL, 'get_user', 99, 100),
(52, 45, NULL, NULL, 'send_mail', 101, 102),
(53, 45, NULL, NULL, 'outOfPageRangeRedirect', 103, 104),
(54, 45, NULL, NULL, 'download', 105, 106),
(55, 45, NULL, NULL, 'generateRandomString', 107, 108),
(56, 45, NULL, NULL, 'isAuthorized', 109, 110),
(57, 1, NULL, NULL, 'FullCalendarApp', 112, 127),
(58, 57, NULL, NULL, 'is_login', 113, 114),
(59, 57, NULL, NULL, 'get_user', 115, 116),
(60, 57, NULL, NULL, 'send_mail', 117, 118),
(61, 57, NULL, NULL, 'outOfPageRangeRedirect', 119, 120),
(62, 57, NULL, NULL, 'download', 121, 122),
(63, 57, NULL, NULL, 'generateRandomString', 123, 124),
(64, 57, NULL, NULL, 'isAuthorized', 125, 126),
(65, 1, NULL, NULL, 'Homes', 128, 147),
(66, 65, NULL, NULL, 'index', 129, 130),
(67, 65, NULL, NULL, 'features', 131, 132),
(68, 65, NULL, NULL, 'is_login', 133, 134),
(69, 65, NULL, NULL, 'get_user', 135, 136),
(70, 65, NULL, NULL, 'send_mail', 137, 138),
(71, 65, NULL, NULL, 'outOfPageRangeRedirect', 139, 140),
(72, 65, NULL, NULL, 'download', 141, 142),
(73, 65, NULL, NULL, 'generateRandomString', 143, 144),
(74, 65, NULL, NULL, 'isAuthorized', 145, 146),
(75, 1, NULL, NULL, 'JobUploads', 148, 173),
(76, 75, NULL, NULL, 'index', 149, 150),
(77, 75, NULL, NULL, 'admin_index', 151, 152),
(78, 75, NULL, NULL, 'admin_add', 153, 154),
(79, 75, NULL, NULL, 'admin_edit', 155, 156),
(80, 75, NULL, NULL, 'admin_delete', 157, 158),
(81, 75, NULL, NULL, 'is_login', 159, 160),
(82, 75, NULL, NULL, 'get_user', 161, 162),
(83, 75, NULL, NULL, 'send_mail', 163, 164),
(84, 75, NULL, NULL, 'outOfPageRangeRedirect', 165, 166),
(85, 75, NULL, NULL, 'download', 167, 168),
(86, 75, NULL, NULL, 'generateRandomString', 169, 170),
(87, 75, NULL, NULL, 'isAuthorized', 171, 172),
(88, 1, NULL, NULL, 'Jobs', 174, 213),
(89, 88, NULL, NULL, 'view', 175, 176),
(90, 88, NULL, NULL, 'home', 177, 178),
(91, 88, NULL, NULL, 'changeLanguage', 179, 180),
(92, 88, NULL, NULL, 'admin_index', 181, 182),
(94, 88, NULL, NULL, 'admin_edit', 185, 186),
(95, 88, NULL, NULL, 'admin_delete', 187, 188),
(96, 88, NULL, NULL, 'enquery', 189, 190),
(97, 88, NULL, NULL, 'quick_enquiry', 191, 192),
(98, 88, NULL, NULL, 'quick_enquiry_modal', 193, 194),
(99, 88, NULL, NULL, 'enquiry_modal', 195, 196),
(100, 88, NULL, NULL, 'getCurlData', 197, 198),
(101, 88, NULL, NULL, 'is_login', 199, 200),
(102, 88, NULL, NULL, 'get_user', 201, 202),
(103, 88, NULL, NULL, 'send_mail', 203, 204),
(104, 88, NULL, NULL, 'outOfPageRangeRedirect', 205, 206),
(105, 88, NULL, NULL, 'download', 207, 208),
(106, 88, NULL, NULL, 'generateRandomString', 209, 210),
(107, 88, NULL, NULL, 'isAuthorized', 211, 212),
(108, 1, NULL, NULL, 'Pages', 214, 287),
(109, 108, NULL, NULL, 'view', 215, 216),
(110, 108, NULL, NULL, 'home', 217, 218),
(111, 108, NULL, NULL, 'changeLanguage', 219, 220),
(112, 108, NULL, NULL, 'admin_index', 221, 222),
(113, 108, NULL, NULL, 'admin_add', 223, 224),
(114, 108, NULL, NULL, 'admin_edit', 225, 226),
(116, 108, NULL, NULL, 'index', 229, 230),
(117, 108, NULL, NULL, 'who_we_are', 231, 232),
(118, 108, NULL, NULL, 'what_we_do', 233, 234),
(119, 108, NULL, NULL, 'jobs', 235, 236),
(120, 108, NULL, NULL, 'all_jobs', 237, 238),
(121, 108, NULL, NULL, 'contact_us', 239, 240),
(122, 108, NULL, NULL, 'specialist_services', 241, 242),
(123, 108, NULL, NULL, 'quality_assurance', 243, 244),
(124, 108, NULL, NULL, 'our_partners', 245, 246),
(125, 108, NULL, NULL, 'testimonials', 247, 248),
(126, 108, NULL, NULL, 'our_team', 249, 250),
(127, 108, NULL, NULL, 'buzz_hub', 251, 252),
(128, 108, NULL, NULL, 'buzz_team', 253, 254),
(129, 108, NULL, NULL, 'buzz_brokerage', 255, 256),
(130, 108, NULL, NULL, 'buzz_membership', 257, 258),
(131, 108, NULL, NULL, 'calendar', 259, 260),
(132, 108, NULL, NULL, 'admin_permission', 261, 262),
(133, 108, NULL, NULL, 'team_detail', 263, 264),
(134, 108, NULL, NULL, 'fb_check', 265, 266),
(135, 108, NULL, NULL, 'wall_post', 267, 268),
(136, 108, NULL, NULL, 'view_team', 269, 270),
(137, 108, NULL, NULL, 'view_jobs', 271, 272),
(138, 108, NULL, NULL, 'is_login', 273, 274),
(139, 108, NULL, NULL, 'get_user', 275, 276),
(140, 108, NULL, NULL, 'send_mail', 277, 278),
(141, 108, NULL, NULL, 'outOfPageRangeRedirect', 279, 280),
(142, 108, NULL, NULL, 'download', 281, 282),
(143, 108, NULL, NULL, 'generateRandomString', 283, 284),
(144, 108, NULL, NULL, 'isAuthorized', 285, 286),
(145, 1, NULL, NULL, 'Roles', 288, 311),
(146, 145, NULL, NULL, 'admin_index', 289, 290),
(147, 145, NULL, NULL, 'admin_add', 291, 292),
(148, 145, NULL, NULL, 'admin_edit', 293, 294),
(149, 145, NULL, NULL, 'admin_delete', 295, 296),
(150, 145, NULL, NULL, 'is_login', 297, 298),
(151, 145, NULL, NULL, 'get_user', 299, 300),
(152, 145, NULL, NULL, 'send_mail', 301, 302),
(153, 145, NULL, NULL, 'outOfPageRangeRedirect', 303, 304),
(154, 145, NULL, NULL, 'download', 305, 306),
(155, 145, NULL, NULL, 'generateRandomString', 307, 308),
(156, 145, NULL, NULL, 'isAuthorized', 309, 310),
(157, 1, NULL, NULL, 'Services', 312, 345),
(158, 157, NULL, NULL, 'view', 313, 314),
(159, 157, NULL, NULL, 'service_detail', 315, 316),
(160, 157, NULL, NULL, 'home', 317, 318),
(161, 157, NULL, NULL, 'changeLanguage', 319, 320),
(162, 157, NULL, NULL, 'admin_index', 321, 322),
(163, 157, NULL, NULL, 'admin_add', 323, 324),
(164, 157, NULL, NULL, 'admin_edit', 325, 326),
(165, 157, NULL, NULL, 'admin_delete', 327, 328),
(166, 157, NULL, NULL, 'admin_process', 329, 330),
(167, 157, NULL, NULL, 'is_login', 331, 332),
(168, 157, NULL, NULL, 'get_user', 333, 334),
(169, 157, NULL, NULL, 'send_mail', 335, 336),
(170, 157, NULL, NULL, 'outOfPageRangeRedirect', 337, 338),
(171, 157, NULL, NULL, 'download', 339, 340),
(172, 157, NULL, NULL, 'generateRandomString', 341, 342),
(173, 157, NULL, NULL, 'isAuthorized', 343, 344),
(174, 1, NULL, NULL, 'Settings', 346, 371),
(175, 174, NULL, NULL, 'admin_index', 347, 348),
(176, 174, NULL, NULL, 'admin_add', 349, 350),
(177, 174, NULL, NULL, 'admin_edit', 351, 352),
(178, 174, NULL, NULL, 'admin_delete', 353, 354),
(179, 174, NULL, NULL, 'get_support', 355, 356),
(180, 174, NULL, NULL, 'is_login', 357, 358),
(181, 174, NULL, NULL, 'get_user', 359, 360),
(182, 174, NULL, NULL, 'send_mail', 361, 362),
(183, 174, NULL, NULL, 'outOfPageRangeRedirect', 363, 364),
(184, 174, NULL, NULL, 'download', 365, 366),
(185, 174, NULL, NULL, 'generateRandomString', 367, 368),
(186, 174, NULL, NULL, 'isAuthorized', 369, 370),
(187, 1, NULL, NULL, 'SpecialCategories', 372, 403),
(188, 187, NULL, NULL, 'view', 373, 374),
(189, 187, NULL, NULL, 'home', 375, 376),
(190, 187, NULL, NULL, 'changeLanguage', 377, 378),
(191, 187, NULL, NULL, 'admin_index', 379, 380),
(192, 187, NULL, NULL, 'admin_add', 381, 382),
(193, 187, NULL, NULL, 'admin_edit', 383, 384),
(194, 187, NULL, NULL, 'admin_delete', 385, 386),
(195, 187, NULL, NULL, 'admin_process', 387, 388),
(196, 187, NULL, NULL, 'is_login', 389, 390),
(197, 187, NULL, NULL, 'get_user', 391, 392),
(198, 187, NULL, NULL, 'send_mail', 393, 394),
(199, 187, NULL, NULL, 'outOfPageRangeRedirect', 395, 396),
(200, 187, NULL, NULL, 'download', 397, 398),
(201, 187, NULL, NULL, 'generateRandomString', 399, 400),
(202, 187, NULL, NULL, 'isAuthorized', 401, 402),
(203, 1, NULL, NULL, 'SpecialServices', 404, 435),
(204, 203, NULL, NULL, 'view', 405, 406),
(205, 203, NULL, NULL, 'home', 407, 408),
(206, 203, NULL, NULL, 'changeLanguage', 409, 410),
(207, 203, NULL, NULL, 'admin_index', 411, 412),
(208, 203, NULL, NULL, 'admin_add', 413, 414),
(209, 203, NULL, NULL, 'admin_edit', 415, 416),
(210, 203, NULL, NULL, 'admin_delete', 417, 418),
(211, 203, NULL, NULL, 'admin_process', 419, 420),
(212, 203, NULL, NULL, 'is_login', 421, 422),
(213, 203, NULL, NULL, 'get_user', 423, 424),
(214, 203, NULL, NULL, 'send_mail', 425, 426),
(215, 203, NULL, NULL, 'outOfPageRangeRedirect', 427, 428),
(216, 203, NULL, NULL, 'download', 429, 430),
(217, 203, NULL, NULL, 'generateRandomString', 431, 432),
(218, 203, NULL, NULL, 'isAuthorized', 433, 434),
(219, 1, NULL, NULL, 'TeamMembers', 436, 459),
(220, 219, NULL, NULL, 'admin_index', 437, 438),
(221, 219, NULL, NULL, 'admin_add', 439, 440),
(222, 219, NULL, NULL, 'admin_edit', 441, 442),
(223, 219, NULL, NULL, 'admin_delete', 443, 444),
(224, 219, NULL, NULL, 'is_login', 445, 446),
(225, 219, NULL, NULL, 'get_user', 447, 448),
(226, 219, NULL, NULL, 'send_mail', 449, 450),
(227, 219, NULL, NULL, 'outOfPageRangeRedirect', 451, 452),
(228, 219, NULL, NULL, 'download', 453, 454),
(229, 219, NULL, NULL, 'generateRandomString', 455, 456),
(230, 219, NULL, NULL, 'isAuthorized', 457, 458),
(231, 1, NULL, NULL, 'Teams', 460, 483),
(232, 231, NULL, NULL, 'admin_index', 461, 462),
(233, 231, NULL, NULL, 'admin_add', 463, 464),
(234, 231, NULL, NULL, 'admin_edit', 465, 466),
(235, 231, NULL, NULL, 'admin_delete', 467, 468),
(236, 231, NULL, NULL, 'is_login', 469, 470),
(237, 231, NULL, NULL, 'get_user', 471, 472),
(238, 231, NULL, NULL, 'send_mail', 473, 474),
(239, 231, NULL, NULL, 'outOfPageRangeRedirect', 475, 476),
(240, 231, NULL, NULL, 'download', 477, 478),
(241, 231, NULL, NULL, 'generateRandomString', 479, 480),
(242, 231, NULL, NULL, 'isAuthorized', 481, 482),
(243, 1, NULL, NULL, 'Testimonials', 484, 507),
(244, 243, NULL, NULL, 'admin_index', 485, 486),
(245, 243, NULL, NULL, 'admin_add', 487, 488),
(246, 243, NULL, NULL, 'admin_edit', 489, 490),
(247, 243, NULL, NULL, 'admin_delete', 491, 492),
(248, 243, NULL, NULL, 'is_login', 493, 494),
(249, 243, NULL, NULL, 'get_user', 495, 496),
(250, 243, NULL, NULL, 'send_mail', 497, 498),
(251, 243, NULL, NULL, 'outOfPageRangeRedirect', 499, 500),
(252, 243, NULL, NULL, 'download', 501, 502),
(253, 243, NULL, NULL, 'generateRandomString', 503, 504),
(254, 243, NULL, NULL, 'isAuthorized', 505, 506),
(255, 1, NULL, NULL, 'Users', 508, 593),
(256, 255, NULL, NULL, 'auth_login', 509, 510),
(257, 255, NULL, NULL, 'auth_callback', 511, 512),
(258, 255, NULL, NULL, 'admin_index', 513, 514),
(259, 255, NULL, NULL, 'admin_user_earnings', 515, 516),
(260, 255, NULL, NULL, 'admin_detail_earning', 517, 518),
(261, 255, NULL, NULL, 'admin_add', 519, 520),
(262, 255, NULL, NULL, 'admin_edit', 521, 522),
(263, 255, NULL, NULL, 'admin_view', 523, 524),
(264, 255, NULL, NULL, 'admin_profile', 525, 526),
(265, 255, NULL, NULL, 'admin_reset_password', 527, 528),
(266, 255, NULL, NULL, 'admin_process', 529, 530),
(267, 255, NULL, NULL, 'admin_delete', 531, 532),
(268, 255, NULL, NULL, 'admin_login', 533, 534),
(269, 255, NULL, NULL, 'admin_logout', 535, 536),
(270, 255, NULL, NULL, 'admin_forgot_pass', 537, 538),
(271, 255, NULL, NULL, 'activate', 539, 540),
(272, 255, NULL, NULL, 'forgot', 541, 542),
(273, 255, NULL, NULL, 'reset', 543, 544),
(274, 255, NULL, NULL, 'admin_reset', 545, 546),
(275, 255, NULL, NULL, 'check_ipaddress', 547, 548),
(276, 255, NULL, NULL, 'check_invalidLogin', 549, 550),
(277, 255, NULL, NULL, 'register', 551, 552),
(278, 255, NULL, NULL, 'delete_all_cookies', 553, 554),
(279, 255, NULL, NULL, 'login', 555, 556),
(280, 255, NULL, NULL, 'invalidLoginEntry', 557, 558),
(281, 255, NULL, NULL, 'dashboard', 559, 560),
(282, 255, NULL, NULL, 'activities', 561, 562),
(283, 255, NULL, NULL, 'logout', 563, 564),
(284, 255, NULL, NULL, 'resend', 565, 566),
(285, 255, NULL, NULL, 'profile', 567, 568),
(286, 255, NULL, NULL, 'account_information', 569, 570),
(287, 255, NULL, NULL, 'security_settings', 571, 572),
(288, 255, NULL, NULL, 'add_sub_accounts', 573, 574),
(289, 255, NULL, NULL, 'new_password', 575, 576),
(290, 255, NULL, NULL, 'delete', 577, 578),
(291, 255, NULL, NULL, 'is_login', 579, 580),
(292, 255, NULL, NULL, 'get_user', 581, 582),
(293, 255, NULL, NULL, 'send_mail', 583, 584),
(294, 255, NULL, NULL, 'outOfPageRangeRedirect', 585, 586),
(295, 255, NULL, NULL, 'download', 587, 588),
(296, 255, NULL, NULL, 'generateRandomString', 589, 590),
(297, 255, NULL, NULL, 'isAuthorized', 591, 592),
(298, 1, NULL, NULL, 'AclExtras', 594, 595),
(299, 1, NULL, NULL, 'AclManager', 596, 625),
(300, 299, NULL, NULL, 'Acl', 597, 624),
(301, 300, NULL, NULL, 'drop', 598, 599),
(302, 300, NULL, NULL, 'admin_drop_perms', 600, 601),
(303, 300, NULL, NULL, 'admin_index', 602, 603),
(304, 300, NULL, NULL, 'admin_permissions', 604, 605),
(305, 300, NULL, NULL, 'admin_update_acos', 606, 607),
(306, 300, NULL, NULL, 'admin_update_aros', 608, 609),
(307, 300, NULL, NULL, 'is_login', 610, 611),
(308, 300, NULL, NULL, 'get_user', 612, 613),
(309, 300, NULL, NULL, 'send_mail', 614, 615),
(310, 300, NULL, NULL, 'outOfPageRangeRedirect', 616, 617),
(311, 300, NULL, NULL, 'download', 618, 619),
(312, 300, NULL, NULL, 'generateRandomString', 620, 621),
(313, 300, NULL, NULL, 'isAuthorized', 622, 623),
(314, 1, NULL, NULL, 'Authenticate', 626, 627),
(315, 1, NULL, NULL, 'Blog', 628, 733),
(316, 315, NULL, NULL, 'BlogPostCategories', 629, 654),
(317, 316, NULL, NULL, 'admin_index', 630, 631),
(318, 316, NULL, NULL, 'admin_view', 632, 633),
(319, 316, NULL, NULL, 'admin_add', 634, 635),
(320, 316, NULL, NULL, 'admin_edit', 636, 637),
(321, 316, NULL, NULL, 'admin_delete', 638, 639),
(322, 316, NULL, NULL, 'is_login', 640, 641),
(323, 316, NULL, NULL, 'get_user', 642, 643),
(324, 316, NULL, NULL, 'send_mail', 644, 645),
(325, 316, NULL, NULL, 'outOfPageRangeRedirect', 646, 647),
(326, 316, NULL, NULL, 'download', 648, 649),
(327, 316, NULL, NULL, 'generateRandomString', 650, 651),
(328, 316, NULL, NULL, 'isAuthorized', 652, 653),
(329, 315, NULL, NULL, 'BlogPostTags', 655, 680),
(330, 329, NULL, NULL, 'admin_index', 656, 657),
(331, 329, NULL, NULL, 'admin_view', 658, 659),
(332, 329, NULL, NULL, 'admin_add', 660, 661),
(333, 329, NULL, NULL, 'admin_edit', 662, 663),
(334, 329, NULL, NULL, 'admin_delete', 664, 665),
(335, 329, NULL, NULL, 'is_login', 666, 667),
(336, 329, NULL, NULL, 'get_user', 668, 669),
(337, 329, NULL, NULL, 'send_mail', 670, 671),
(338, 329, NULL, NULL, 'outOfPageRangeRedirect', 672, 673),
(339, 329, NULL, NULL, 'download', 674, 675),
(340, 329, NULL, NULL, 'generateRandomString', 676, 677),
(341, 329, NULL, NULL, 'isAuthorized', 678, 679),
(342, 315, NULL, NULL, 'BlogPosts', 681, 710),
(343, 342, NULL, NULL, 'index', 682, 683),
(344, 342, NULL, NULL, 'view', 684, 685),
(345, 342, NULL, NULL, 'admin_index', 686, 687),
(346, 342, NULL, NULL, 'admin_view', 688, 689),
(347, 342, NULL, NULL, 'admin_add', 690, 691),
(348, 342, NULL, NULL, 'admin_edit', 692, 693),
(349, 342, NULL, NULL, 'admin_delete', 694, 695),
(350, 342, NULL, NULL, 'is_login', 696, 697),
(351, 342, NULL, NULL, 'get_user', 698, 699),
(352, 342, NULL, NULL, 'send_mail', 700, 701),
(353, 342, NULL, NULL, 'outOfPageRangeRedirect', 702, 703),
(354, 342, NULL, NULL, 'download', 704, 705),
(355, 342, NULL, NULL, 'generateRandomString', 706, 707),
(356, 342, NULL, NULL, 'isAuthorized', 708, 709),
(357, 315, NULL, NULL, 'BlogSettings', 711, 732),
(358, 357, NULL, NULL, 'admin_index', 712, 713),
(359, 357, NULL, NULL, 'admin_view', 714, 715),
(360, 357, NULL, NULL, 'admin_edit', 716, 717),
(361, 357, NULL, NULL, 'is_login', 718, 719),
(362, 357, NULL, NULL, 'get_user', 720, 721),
(363, 357, NULL, NULL, 'send_mail', 722, 723),
(364, 357, NULL, NULL, 'outOfPageRangeRedirect', 724, 725),
(365, 357, NULL, NULL, 'download', 726, 727),
(366, 357, NULL, NULL, 'generateRandomString', 728, 729),
(367, 357, NULL, NULL, 'isAuthorized', 730, 731),
(368, 1, NULL, NULL, 'ExtAuth', 734, 735),
(369, 1, NULL, NULL, 'Facebook', 736, 737),
(370, 1, NULL, NULL, 'FullCalendar', 738, 817),
(371, 370, NULL, NULL, 'EventTypes', 739, 764),
(372, 371, NULL, NULL, 'index', 740, 741),
(373, 371, NULL, NULL, 'view', 742, 743),
(374, 371, NULL, NULL, 'add', 744, 745),
(375, 371, NULL, NULL, 'edit', 746, 747),
(376, 371, NULL, NULL, 'delete', 748, 749),
(377, 371, NULL, NULL, 'is_login', 750, 751),
(378, 371, NULL, NULL, 'get_user', 752, 753),
(379, 371, NULL, NULL, 'send_mail', 754, 755),
(380, 371, NULL, NULL, 'outOfPageRangeRedirect', 756, 757),
(381, 371, NULL, NULL, 'download', 758, 759),
(382, 371, NULL, NULL, 'generateRandomString', 760, 761),
(383, 371, NULL, NULL, 'isAuthorized', 762, 763),
(384, 370, NULL, NULL, 'Events', 765, 798),
(385, 384, NULL, NULL, 'admin_index', 766, 767),
(386, 384, NULL, NULL, 'admin_view', 768, 769),
(387, 384, NULL, NULL, 'admin_add', 770, 771),
(388, 384, NULL, NULL, 'admin_edit', 772, 773),
(389, 384, NULL, NULL, 'admin_delete', 774, 775),
(390, 384, NULL, NULL, 'admin_feed', 776, 777),
(391, 384, NULL, NULL, 'feed', 778, 779),
(392, 384, NULL, NULL, 'admin_update', 780, 781),
(393, 384, NULL, NULL, 'update', 782, 783),
(394, 384, NULL, NULL, 'is_login', 784, 785),
(395, 384, NULL, NULL, 'get_user', 786, 787),
(396, 384, NULL, NULL, 'send_mail', 788, 789),
(397, 384, NULL, NULL, 'outOfPageRangeRedirect', 790, 791),
(398, 384, NULL, NULL, 'download', 792, 793),
(399, 384, NULL, NULL, 'generateRandomString', 794, 795),
(400, 384, NULL, NULL, 'isAuthorized', 796, 797),
(401, 370, NULL, NULL, 'FullCalendar', 799, 816),
(402, 401, NULL, NULL, 'admin_index', 800, 801),
(403, 401, NULL, NULL, 'is_login', 802, 803),
(404, 401, NULL, NULL, 'get_user', 804, 805),
(405, 401, NULL, NULL, 'send_mail', 806, 807),
(406, 401, NULL, NULL, 'outOfPageRangeRedirect', 808, 809),
(407, 401, NULL, NULL, 'download', 810, 811),
(408, 401, NULL, NULL, 'generateRandomString', 812, 813),
(409, 401, NULL, NULL, 'isAuthorized', 814, 815),
(410, 1, NULL, NULL, 'HabtmCounterCache', 818, 819),
(411, 1, NULL, NULL, 'Upload', 820, 821),
(412, 1, NULL, NULL, 'Utils', 822, 823);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE `aros` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT '',
  `foreign_key` int(10) UNSIGNED DEFAULT NULL,
  `alias` varchar(255) DEFAULT '',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(11, NULL, 'Role', 20, '', 7, 8),
(2, NULL, 'Role', 1, 'Admin', 1, 2),
(3, NULL, 'Role', 3, 'BHCMS', 3, 4),
(4, NULL, 'Role', 2, 'FSCMS', 5, 6),
(12, NULL, 'Role', 21, '', 9, 10);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE `aros_acos` (
  `id` int(10) UNSIGNED NOT NULL,
  `aro_id` int(10) UNSIGNED NOT NULL,
  `aco_id` int(10) UNSIGNED NOT NULL,
  `_create` char(2) NOT NULL DEFAULT '0',
  `_read` char(2) NOT NULL DEFAULT '0',
  `_update` char(2) NOT NULL DEFAULT '0',
  `_delete` char(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 4, 3, '0', '0', '0', '0'),
(2, 4, 5, '1', '1', '1', '1'),
(3, 4, 6, '1', '1', '1', '1'),
(4, 4, 7, '1', '1', '1', '1'),
(5, 4, 9, '1', '1', '1', '1'),
(6, 4, 10, '1', '1', '1', '1'),
(7, 4, 11, '1', '1', '1', '1'),
(8, 4, 12, '1', '1', '1', '1'),
(9, 4, 14, '1', '1', '1', '1'),
(10, 4, 16, '1', '1', '1', '1'),
(11, 4, 17, '1', '1', '1', '1'),
(12, 4, 18, '1', '1', '1', '1'),
(13, 4, 19, '1', '1', '1', '1'),
(14, 4, 21, '1', '1', '1', '1'),
(15, 4, 22, '1', '1', '1', '1'),
(16, 4, 23, '1', '1', '1', '1'),
(17, 4, 24, '1', '1', '1', '1'),
(18, 4, 26, '1', '1', '1', '1'),
(19, 4, 27, '1', '1', '1', '1'),
(20, 4, 28, '1', '1', '1', '1'),
(21, 4, 29, '1', '1', '1', '1'),
(22, 4, 31, '1', '1', '1', '1'),
(23, 4, 32, '1', '1', '1', '1'),
(24, 4, 33, '1', '1', '1', '1'),
(25, 4, 35, '1', '1', '1', '1'),
(26, 4, 36, '1', '1', '1', '1'),
(27, 4, 37, '1', '1', '1', '1'),
(28, 4, 38, '1', '1', '1', '1'),
(29, 4, 40, '1', '1', '1', '1'),
(30, 4, 41, '1', '1', '1', '1'),
(31, 4, 42, '1', '1', '1', '1'),
(32, 4, 44, '1', '1', '1', '1'),
(33, 4, 45, '1', '1', '1', '1'),
(34, 4, 46, '1', '1', '1', '1'),
(35, 4, 47, '1', '1', '1', '1'),
(36, 4, 49, '1', '1', '1', '1'),
(37, 4, 50, '1', '1', '1', '1'),
(38, 4, 51, '1', '1', '1', '1'),
(39, 4, 52, '1', '1', '1', '1'),
(40, 4, 54, '1', '1', '1', '1'),
(41, 4, 55, '1', '1', '1', '1'),
(42, 4, 56, '1', '1', '1', '1'),
(43, 4, 57, '1', '1', '1', '1'),
(44, 4, 59, '1', '1', '1', '1'),
(45, 4, 60, '1', '1', '1', '1'),
(46, 4, 61, '1', '1', '1', '1'),
(47, 4, 62, '1', '1', '1', '1'),
(48, 4, 64, '1', '1', '1', '1'),
(49, 4, 65, '1', '1', '1', '1'),
(50, 4, 66, '1', '1', '1', '1'),
(51, 4, 67, '1', '1', '1', '1'),
(52, 4, 69, '1', '1', '1', '1'),
(53, 4, 70, '1', '1', '1', '1'),
(54, 4, 71, '1', '1', '1', '1'),
(55, 4, 72, '1', '1', '1', '1'),
(56, 4, 74, '1', '1', '1', '1'),
(57, 4, 75, '1', '1', '1', '1'),
(58, 4, 76, '1', '1', '1', '1'),
(59, 4, 77, '1', '1', '1', '1'),
(60, 4, 79, '1', '1', '1', '1'),
(61, 4, 80, '1', '1', '1', '1'),
(62, 4, 81, '1', '1', '1', '1'),
(63, 3, 3, '1', '1', '1', '1'),
(64, 3, 5, '1', '1', '1', '1'),
(65, 3, 6, '1', '1', '1', '1'),
(66, 3, 7, '1', '1', '1', '1'),
(67, 3, 9, '1', '1', '1', '1'),
(68, 3, 10, '1', '1', '1', '1'),
(69, 3, 11, '1', '1', '1', '1'),
(70, 3, 12, '1', '1', '1', '1'),
(71, 3, 14, '1', '1', '1', '1'),
(72, 3, 16, '1', '1', '1', '1'),
(73, 3, 17, '1', '1', '1', '1'),
(74, 3, 18, '1', '1', '1', '1'),
(75, 3, 19, '1', '1', '1', '1'),
(76, 3, 21, '1', '1', '1', '1'),
(77, 3, 22, '1', '1', '1', '1'),
(78, 3, 23, '1', '1', '1', '1'),
(79, 3, 24, '1', '1', '1', '1'),
(80, 3, 26, '1', '1', '1', '1'),
(81, 3, 27, '1', '1', '1', '1'),
(82, 3, 28, '1', '1', '1', '1'),
(83, 3, 29, '1', '1', '1', '1'),
(84, 3, 31, '1', '1', '1', '1'),
(85, 3, 32, '1', '1', '1', '1'),
(86, 3, 33, '1', '1', '1', '1'),
(87, 3, 35, '1', '1', '1', '1'),
(88, 3, 36, '1', '1', '1', '1'),
(89, 3, 37, '1', '1', '1', '1'),
(90, 3, 38, '1', '1', '1', '1'),
(91, 3, 40, '1', '1', '1', '1'),
(92, 3, 41, '1', '1', '1', '1'),
(93, 3, 42, '1', '1', '1', '1'),
(94, 3, 44, '1', '1', '1', '1'),
(95, 3, 45, '1', '1', '1', '1'),
(96, 3, 46, '1', '1', '1', '1'),
(97, 3, 47, '1', '1', '1', '1'),
(98, 3, 49, '1', '1', '1', '1'),
(99, 3, 50, '1', '1', '1', '1'),
(100, 3, 51, '1', '1', '1', '1'),
(101, 3, 52, '1', '1', '1', '1'),
(102, 3, 54, '1', '1', '1', '1'),
(103, 3, 55, '1', '1', '1', '1'),
(104, 3, 56, '1', '1', '1', '1'),
(105, 3, 57, '1', '1', '1', '1'),
(106, 3, 59, '1', '1', '1', '1'),
(107, 3, 60, '1', '1', '1', '1'),
(108, 3, 61, '1', '1', '1', '1'),
(109, 3, 62, '1', '1', '1', '1'),
(110, 3, 64, '1', '1', '1', '1'),
(111, 3, 65, '1', '1', '1', '1'),
(112, 3, 66, '1', '1', '1', '1'),
(113, 3, 67, '1', '1', '1', '1'),
(114, 3, 69, '1', '1', '1', '1'),
(115, 3, 70, '1', '1', '1', '1'),
(116, 3, 71, '1', '1', '1', '1'),
(117, 3, 72, '1', '1', '1', '1'),
(118, 3, 74, '1', '1', '1', '1'),
(119, 3, 75, '1', '1', '1', '1'),
(120, 3, 76, '1', '1', '1', '1'),
(121, 3, 77, '1', '1', '1', '1'),
(122, 3, 79, '1', '1', '1', '1'),
(123, 3, 80, '1', '1', '1', '1'),
(124, 3, 81, '1', '1', '1', '1'),
(125, 3, 83, '1', '1', '1', '1'),
(126, 3, 84, '1', '1', '1', '1'),
(127, 3, 85, '1', '1', '1', '1'),
(128, 3, 86, '1', '1', '1', '1'),
(129, 4, 83, '1', '1', '1', '1'),
(130, 4, 84, '1', '1', '1', '1'),
(131, 4, 85, '1', '1', '1', '1'),
(132, 4, 86, '1', '1', '1', '1'),
(133, 11, 5, '1', '1', '1', '1'),
(134, 11, 6, '1', '1', '1', '1'),
(135, 11, 7, '1', '1', '1', '1'),
(136, 11, 9, '1', '1', '1', '1'),
(137, 11, 10, '1', '1', '1', '1'),
(138, 11, 11, '1', '1', '1', '1'),
(139, 11, 12, '1', '1', '1', '1'),
(140, 11, 14, '1', '1', '1', '1'),
(141, 11, 16, '1', '1', '1', '1'),
(142, 11, 17, '1', '1', '1', '1'),
(143, 11, 18, '1', '1', '1', '1'),
(144, 11, 19, '1', '1', '1', '1'),
(145, 11, 21, '1', '1', '1', '1'),
(146, 11, 22, '1', '1', '1', '1'),
(147, 11, 23, '1', '1', '1', '1'),
(148, 11, 24, '1', '1', '1', '1'),
(149, 11, 26, '1', '1', '1', '1'),
(150, 11, 27, '1', '1', '1', '1'),
(151, 11, 28, '1', '1', '1', '1'),
(152, 11, 29, '1', '1', '1', '1'),
(153, 11, 31, '1', '1', '1', '1'),
(154, 11, 32, '1', '1', '1', '1'),
(155, 11, 33, '1', '1', '1', '1'),
(156, 11, 35, '1', '1', '1', '1'),
(157, 11, 36, '1', '1', '1', '1'),
(158, 11, 37, '1', '1', '1', '1'),
(159, 11, 38, '1', '1', '1', '1'),
(160, 11, 40, '1', '1', '1', '1'),
(161, 11, 41, '1', '1', '1', '1'),
(162, 11, 42, '1', '1', '1', '1'),
(163, 11, 44, '1', '1', '1', '1'),
(164, 11, 45, '1', '1', '1', '1'),
(165, 11, 46, '1', '1', '1', '1'),
(166, 11, 47, '1', '1', '1', '1'),
(167, 11, 49, '1', '1', '1', '1'),
(168, 11, 50, '1', '1', '1', '1'),
(169, 11, 51, '1', '1', '1', '1'),
(170, 11, 52, '1', '1', '1', '1'),
(171, 11, 54, '1', '1', '1', '1'),
(172, 11, 55, '1', '1', '1', '1'),
(173, 11, 56, '1', '1', '1', '1'),
(174, 11, 57, '1', '1', '1', '1'),
(175, 11, 59, '1', '1', '1', '1'),
(176, 11, 60, '1', '1', '1', '1'),
(177, 11, 61, '1', '1', '1', '1'),
(178, 11, 62, '1', '1', '1', '1'),
(179, 11, 64, '1', '1', '1', '1'),
(180, 11, 65, '1', '1', '1', '1'),
(181, 11, 66, '1', '1', '1', '1'),
(182, 11, 67, '1', '1', '1', '1'),
(183, 11, 74, '1', '1', '1', '1'),
(184, 11, 75, '1', '1', '1', '1'),
(185, 11, 76, '1', '1', '1', '1'),
(186, 11, 77, '1', '1', '1', '1'),
(187, 11, 79, '1', '1', '1', '1'),
(188, 11, 80, '1', '1', '1', '1'),
(189, 11, 81, '1', '1', '1', '1'),
(190, 11, 83, '1', '1', '1', '1'),
(191, 11, 84, '1', '1', '1', '1'),
(192, 11, 85, '1', '1', '1', '1'),
(193, 11, 86, '1', '1', '1', '1'),
(316, 4, 88, '1', '1', '1', '1'),
(317, 4, 89, '1', '1', '1', '1'),
(318, 4, 90, '1', '1', '1', '1'),
(319, 4, 91, '1', '1', '1', '1'),
(320, 4, 93, '1', '1', '1', '1'),
(321, 4, 94, '1', '1', '1', '1'),
(322, 4, 95, '1', '1', '1', '1'),
(323, 4, 96, '1', '1', '1', '1'),
(324, 4, 98, '1', '1', '1', '1'),
(325, 4, 99, '1', '1', '1', '1'),
(326, 4, 100, '1', '1', '1', '1'),
(327, 4, 101, '1', '1', '1', '1'),
(328, 12, 5, '0', '0', '0', '0'),
(329, 12, 6, '0', '0', '0', '0'),
(330, 12, 7, '0', '0', '0', '0'),
(331, 12, 9, '0', '0', '0', '0'),
(332, 12, 10, '0', '0', '0', '0'),
(333, 12, 11, '0', '0', '0', '0'),
(334, 12, 12, '0', '0', '0', '0'),
(335, 12, 14, '0', '0', '0', '0'),
(336, 12, 16, '0', '0', '0', '0'),
(337, 12, 17, '0', '0', '0', '0'),
(338, 12, 18, '0', '0', '0', '0'),
(339, 12, 19, '0', '0', '0', '0'),
(340, 12, 21, '0', '0', '0', '0'),
(341, 12, 22, '0', '0', '0', '0'),
(342, 12, 23, '0', '0', '0', '0'),
(343, 12, 24, '0', '0', '0', '0'),
(344, 12, 26, '0', '0', '0', '0'),
(345, 12, 27, '0', '0', '0', '0'),
(346, 12, 28, '0', '0', '0', '0'),
(347, 12, 29, '0', '0', '0', '0'),
(348, 12, 31, '0', '0', '0', '0'),
(349, 12, 32, '0', '0', '0', '0'),
(350, 12, 33, '0', '0', '0', '0'),
(351, 12, 35, '0', '0', '0', '0'),
(352, 12, 36, '0', '0', '0', '0'),
(353, 12, 37, '0', '0', '0', '0'),
(354, 12, 38, '0', '0', '0', '0'),
(355, 12, 40, '0', '0', '0', '0'),
(356, 12, 41, '0', '0', '0', '0'),
(357, 12, 42, '0', '0', '0', '0'),
(358, 12, 44, '0', '0', '0', '0'),
(359, 12, 45, '0', '0', '0', '0'),
(360, 12, 46, '0', '0', '0', '0'),
(361, 12, 47, '0', '0', '0', '0'),
(362, 12, 49, '0', '0', '0', '0'),
(363, 12, 50, '0', '0', '0', '0'),
(364, 12, 51, '0', '0', '0', '0'),
(365, 12, 52, '0', '0', '0', '0'),
(366, 12, 54, '0', '0', '0', '0'),
(367, 12, 55, '0', '0', '0', '0'),
(368, 12, 56, '0', '0', '0', '0'),
(369, 12, 57, '0', '0', '0', '0'),
(370, 12, 59, '0', '0', '0', '0'),
(371, 12, 60, '0', '0', '0', '0'),
(372, 12, 61, '0', '0', '0', '0'),
(373, 12, 62, '0', '0', '0', '0'),
(374, 12, 64, '0', '0', '0', '0'),
(375, 12, 65, '0', '0', '0', '0'),
(376, 12, 66, '0', '0', '0', '0'),
(377, 12, 67, '0', '0', '0', '0'),
(378, 12, 88, '0', '0', '0', '0'),
(379, 12, 89, '0', '0', '0', '0'),
(380, 12, 90, '0', '0', '0', '0'),
(381, 12, 91, '0', '0', '0', '0'),
(382, 12, 93, '0', '0', '0', '0'),
(383, 12, 94, '0', '0', '0', '0'),
(384, 12, 95, '0', '0', '0', '0'),
(385, 12, 96, '0', '0', '0', '0'),
(386, 12, 98, '0', '0', '0', '0'),
(387, 12, 99, '0', '0', '0', '0'),
(388, 12, 100, '0', '0', '0', '0'),
(389, 12, 101, '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos_old`
--

CREATE TABLE `aros_acos_old` (
  `id` int(10) UNSIGNED NOT NULL,
  `aro_id` int(10) UNSIGNED NOT NULL,
  `aco_id` int(10) UNSIGNED NOT NULL,
  `_create` char(2) NOT NULL DEFAULT '0',
  `_read` char(2) NOT NULL DEFAULT '0',
  `_update` char(2) NOT NULL DEFAULT '0',
  `_delete` char(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aros_acos_old`
--

INSERT INTO `aros_acos_old` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 2, 1, '1', '1', '1', '1'),
(2, 4, 1, '1', '1', '1', '1'),
(3, 3, 1, '1', '1', '1', '1'),
(1252, 8, 389, '1', '1', '1', '1'),
(1251, 8, 388, '1', '1', '1', '1'),
(6, 2, 2, '1', '1', '1', '1'),
(7, 4, 2, '1', '1', '1', '1'),
(8, 3, 2, '1', '1', '1', '1'),
(1250, 8, 387, '1', '1', '1', '1'),
(1249, 8, 385, '1', '1', '1', '1'),
(11, 2, 3, '1', '1', '1', '1'),
(12, 4, 3, '1', '1', '1', '1'),
(13, 3, 3, '1', '1', '1', '1'),
(1248, 8, 349, '1', '1', '1', '1'),
(1247, 8, 348, '1', '1', '1', '1'),
(16, 2, 4, '1', '1', '1', '1'),
(17, 4, 4, '1', '1', '1', '1'),
(18, 3, 4, '1', '1', '1', '1'),
(1246, 8, 347, '1', '1', '1', '1'),
(1245, 8, 345, '1', '1', '1', '1'),
(21, 2, 5, '1', '1', '1', '1'),
(22, 4, 5, '1', '1', '1', '1'),
(23, 3, 5, '1', '1', '1', '1'),
(1244, 8, 321, '1', '1', '1', '1'),
(1243, 8, 320, '1', '1', '1', '1'),
(26, 2, 6, '1', '1', '1', '1'),
(27, 4, 6, '1', '1', '1', '1'),
(28, 3, 6, '1', '1', '1', '1'),
(1242, 8, 319, '1', '1', '1', '1'),
(1241, 8, 317, '1', '1', '1', '1'),
(31, 2, 7, '1', '1', '1', '1'),
(32, 4, 7, '1', '1', '1', '1'),
(33, 3, 7, '1', '1', '1', '1'),
(1240, 8, 401, '1', '1', '1', '1'),
(1239, 8, 384, '1', '1', '1', '1'),
(36, 2, 8, '1', '1', '1', '1'),
(37, 4, 8, '1', '1', '1', '1'),
(38, 3, 8, '1', '1', '1', '1'),
(1238, 8, 371, '1', '1', '1', '1'),
(1237, 8, 357, '1', '1', '1', '1'),
(41, 2, 9, '1', '1', '1', '1'),
(42, 4, 9, '1', '1', '1', '1'),
(43, 3, 9, '1', '1', '1', '1'),
(1236, 8, 342, '1', '1', '1', '1'),
(1235, 8, 329, '1', '1', '1', '1'),
(46, 2, 10, '1', '1', '1', '1'),
(47, 4, 10, '1', '1', '1', '1'),
(48, 3, 10, '1', '1', '1', '1'),
(1234, 8, 316, '1', '1', '1', '1'),
(1233, 8, 300, '1', '1', '1', '1'),
(51, 2, 11, '1', '1', '1', '1'),
(52, 4, 11, '1', '1', '1', '1'),
(53, 3, 11, '1', '1', '1', '1'),
(1232, 8, 297, '1', '1', '1', '1'),
(1231, 8, 296, '1', '1', '1', '1'),
(56, 2, 12, '1', '1', '1', '1'),
(57, 4, 12, '1', '1', '1', '1'),
(58, 3, 12, '1', '1', '1', '1'),
(1230, 8, 295, '1', '1', '1', '1'),
(1229, 8, 294, '1', '1', '1', '1'),
(61, 2, 14, '1', '1', '1', '1'),
(62, 4, 14, '1', '1', '1', '1'),
(63, 3, 14, '1', '1', '1', '1'),
(1228, 8, 293, '1', '1', '1', '1'),
(1227, 8, 292, '1', '1', '1', '1'),
(66, 2, 15, '1', '1', '1', '1'),
(67, 4, 15, '1', '1', '1', '1'),
(68, 3, 15, '1', '1', '1', '1'),
(1226, 8, 291, '1', '1', '1', '1'),
(1225, 8, 290, '1', '1', '1', '1'),
(71, 2, 16, '1', '1', '1', '1'),
(72, 4, 16, '1', '1', '1', '1'),
(73, 3, 16, '1', '1', '1', '1'),
(1224, 8, 289, '1', '1', '1', '1'),
(1223, 8, 288, '1', '1', '1', '1'),
(76, 2, 13, '1', '1', '1', '1'),
(77, 4, 13, '1', '1', '1', '1'),
(78, 3, 13, '1', '1', '1', '1'),
(1222, 8, 287, '1', '1', '1', '1'),
(1221, 8, 286, '1', '1', '1', '1'),
(81, 2, 17, '1', '1', '1', '1'),
(82, 4, 17, '1', '1', '1', '1'),
(83, 3, 17, '1', '1', '1', '1'),
(1220, 8, 285, '1', '1', '1', '1'),
(1219, 8, 284, '1', '1', '1', '1'),
(86, 2, 18, '1', '1', '1', '1'),
(87, 4, 18, '1', '1', '1', '1'),
(88, 3, 18, '1', '1', '1', '1'),
(1218, 8, 283, '1', '1', '1', '1'),
(1217, 8, 282, '1', '1', '1', '1'),
(91, 2, 19, '1', '1', '1', '1'),
(92, 4, 19, '1', '1', '1', '1'),
(93, 3, 19, '1', '1', '1', '1'),
(1216, 8, 281, '1', '1', '1', '1'),
(1215, 8, 280, '1', '1', '1', '1'),
(96, 2, 20, '1', '1', '1', '1'),
(97, 4, 20, '1', '1', '1', '1'),
(98, 3, 20, '1', '1', '1', '1'),
(1214, 8, 279, '1', '1', '1', '1'),
(1213, 8, 278, '1', '1', '1', '1'),
(101, 2, 21, '1', '1', '1', '1'),
(102, 4, 21, '1', '1', '1', '1'),
(103, 3, 21, '1', '1', '1', '1'),
(1212, 8, 277, '1', '1', '1', '1'),
(1211, 8, 276, '1', '1', '1', '1'),
(106, 2, 22, '1', '1', '1', '1'),
(107, 4, 22, '1', '1', '1', '1'),
(108, 3, 22, '1', '1', '1', '1'),
(1210, 8, 275, '1', '1', '1', '1'),
(1209, 8, 274, '1', '1', '1', '1'),
(111, 2, 23, '1', '1', '1', '1'),
(112, 4, 23, '1', '1', '1', '1'),
(113, 3, 23, '1', '1', '1', '1'),
(1208, 8, 273, '1', '1', '1', '1'),
(1207, 8, 272, '1', '1', '1', '1'),
(116, 2, 24, '1', '1', '1', '1'),
(117, 4, 24, '1', '1', '1', '1'),
(118, 3, 24, '1', '1', '1', '1'),
(1206, 8, 271, '1', '1', '1', '1'),
(1205, 8, 270, '1', '1', '1', '1'),
(121, 2, 25, '1', '1', '1', '1'),
(122, 4, 25, '1', '1', '1', '1'),
(123, 3, 25, '1', '1', '1', '1'),
(1204, 8, 269, '1', '1', '1', '1'),
(1203, 8, 268, '1', '1', '1', '1'),
(126, 2, 26, '1', '1', '1', '1'),
(127, 4, 26, '1', '1', '1', '1'),
(128, 3, 26, '1', '1', '1', '1'),
(1202, 8, 267, '1', '1', '1', '1'),
(1201, 8, 266, '1', '1', '1', '1'),
(131, 2, 27, '1', '1', '1', '1'),
(132, 4, 27, '1', '1', '1', '1'),
(133, 3, 27, '1', '1', '1', '1'),
(1200, 8, 265, '1', '1', '1', '1'),
(1199, 8, 264, '1', '1', '1', '1'),
(136, 2, 28, '1', '1', '1', '1'),
(137, 4, 28, '1', '1', '1', '1'),
(138, 3, 28, '1', '1', '1', '1'),
(1198, 8, 263, '1', '1', '1', '1'),
(1197, 8, 262, '1', '1', '1', '1'),
(141, 2, 29, '1', '1', '1', '1'),
(142, 4, 29, '1', '1', '1', '1'),
(143, 3, 29, '1', '1', '1', '1'),
(1196, 8, 261, '1', '1', '1', '1'),
(146, 2, 30, '1', '1', '1', '1'),
(147, 4, 30, '1', '1', '1', '1'),
(148, 3, 30, '1', '1', '1', '1'),
(1195, 8, 260, '1', '1', '1', '1'),
(1194, 8, 259, '1', '1', '1', '1'),
(151, 2, 31, '1', '1', '1', '1'),
(152, 4, 31, '1', '1', '1', '1'),
(153, 3, 31, '1', '1', '1', '1'),
(1193, 8, 258, '1', '1', '1', '1'),
(1192, 8, 257, '1', '1', '1', '1'),
(156, 2, 32, '1', '1', '1', '1'),
(157, 4, 32, '1', '1', '1', '1'),
(158, 3, 32, '1', '1', '1', '1'),
(1191, 8, 256, '1', '1', '1', '1'),
(1190, 8, 254, '1', '1', '1', '1'),
(161, 2, 33, '1', '1', '1', '1'),
(162, 4, 33, '1', '1', '1', '1'),
(163, 3, 33, '1', '1', '1', '1'),
(1189, 8, 253, '1', '1', '1', '1'),
(1188, 8, 252, '1', '1', '1', '1'),
(166, 2, 34, '1', '1', '1', '1'),
(167, 4, 34, '1', '1', '1', '1'),
(168, 3, 34, '1', '1', '1', '1'),
(1187, 8, 251, '1', '1', '1', '1'),
(1186, 8, 250, '1', '1', '1', '1'),
(171, 2, 35, '1', '1', '1', '1'),
(172, 4, 35, '1', '1', '1', '1'),
(173, 3, 35, '1', '1', '1', '1'),
(1185, 8, 249, '1', '1', '1', '1'),
(1184, 8, 248, '1', '1', '1', '1'),
(176, 2, 36, '1', '1', '1', '1'),
(177, 4, 36, '1', '1', '1', '1'),
(178, 3, 36, '1', '1', '1', '1'),
(1183, 8, 247, '1', '1', '1', '1'),
(1182, 8, 246, '1', '1', '1', '1'),
(181, 2, 37, '1', '1', '1', '1'),
(182, 4, 37, '1', '1', '1', '1'),
(183, 3, 37, '1', '1', '1', '1'),
(1181, 8, 245, '1', '1', '1', '1'),
(1180, 8, 244, '1', '1', '1', '1'),
(186, 2, 38, '1', '1', '1', '1'),
(187, 4, 38, '1', '1', '1', '1'),
(188, 3, 38, '1', '1', '1', '1'),
(1179, 8, 242, '1', '1', '1', '1'),
(1178, 8, 241, '1', '1', '1', '1'),
(191, 2, 39, '1', '1', '1', '1'),
(192, 4, 39, '1', '1', '1', '1'),
(193, 3, 39, '1', '1', '1', '1'),
(1177, 8, 240, '1', '1', '1', '1'),
(1176, 8, 239, '1', '1', '1', '1'),
(196, 2, 40, '1', '1', '1', '1'),
(197, 4, 40, '1', '1', '1', '1'),
(198, 3, 40, '1', '1', '1', '1'),
(1175, 8, 238, '1', '1', '1', '1'),
(1174, 8, 237, '1', '1', '1', '1'),
(201, 2, 41, '1', '1', '1', '1'),
(202, 4, 41, '1', '1', '1', '1'),
(203, 3, 41, '1', '1', '1', '1'),
(1173, 8, 236, '1', '1', '1', '1'),
(1172, 8, 235, '1', '1', '1', '1'),
(206, 2, 42, '1', '1', '1', '1'),
(207, 4, 42, '1', '1', '1', '1'),
(208, 3, 42, '1', '1', '1', '1'),
(1171, 8, 234, '1', '1', '1', '1'),
(1170, 8, 233, '1', '1', '1', '1'),
(211, 2, 43, '1', '1', '1', '1'),
(212, 4, 43, '1', '1', '1', '1'),
(213, 3, 43, '1', '1', '1', '1'),
(1169, 8, 232, '1', '1', '1', '1'),
(1168, 8, 230, '1', '1', '1', '1'),
(216, 2, 44, '1', '1', '1', '1'),
(217, 4, 44, '1', '1', '1', '1'),
(218, 3, 44, '1', '1', '1', '1'),
(1167, 8, 229, '1', '1', '1', '1'),
(1166, 8, 228, '1', '1', '1', '1'),
(221, 2, 45, '1', '1', '1', '1'),
(222, 4, 45, '1', '1', '1', '1'),
(223, 3, 45, '1', '1', '1', '1'),
(1165, 8, 227, '1', '1', '1', '1'),
(1164, 8, 226, '1', '1', '1', '1'),
(226, 2, 46, '1', '1', '1', '1'),
(227, 4, 46, '1', '1', '1', '1'),
(228, 3, 46, '1', '1', '1', '1'),
(1163, 8, 225, '1', '1', '1', '1'),
(1162, 8, 224, '1', '1', '1', '1'),
(231, 2, 47, '1', '1', '1', '1'),
(232, 4, 47, '1', '1', '1', '1'),
(233, 3, 47, '1', '1', '1', '1'),
(1161, 8, 223, '1', '1', '1', '1'),
(1160, 8, 222, '1', '1', '1', '1'),
(236, 2, 48, '1', '1', '1', '1'),
(237, 4, 48, '1', '1', '1', '1'),
(238, 3, 48, '1', '1', '1', '1'),
(1159, 8, 221, '1', '1', '1', '1'),
(1158, 8, 220, '1', '1', '1', '1'),
(241, 2, 49, '1', '1', '1', '1'),
(242, 4, 49, '1', '1', '1', '1'),
(243, 3, 49, '1', '1', '1', '1'),
(1157, 8, 218, '1', '1', '1', '1'),
(1156, 8, 217, '1', '1', '1', '1'),
(246, 2, 50, '1', '1', '1', '1'),
(247, 4, 50, '1', '1', '1', '1'),
(248, 3, 50, '1', '1', '1', '1'),
(1155, 8, 216, '1', '1', '1', '1'),
(251, 2, 51, '1', '1', '1', '1'),
(252, 4, 51, '1', '1', '1', '1'),
(253, 3, 51, '1', '1', '1', '1'),
(1154, 8, 215, '1', '1', '1', '1'),
(1153, 8, 214, '1', '1', '1', '1'),
(256, 2, 52, '1', '1', '1', '1'),
(257, 4, 52, '1', '1', '1', '1'),
(258, 3, 52, '1', '1', '1', '1'),
(1152, 8, 213, '1', '1', '1', '1'),
(1151, 8, 212, '1', '1', '1', '1'),
(261, 2, 53, '1', '1', '1', '1'),
(262, 4, 53, '1', '1', '1', '1'),
(263, 3, 53, '1', '1', '1', '1'),
(1150, 8, 211, '1', '1', '1', '1'),
(1149, 8, 210, '1', '1', '1', '1'),
(266, 2, 54, '1', '1', '1', '1'),
(267, 4, 54, '1', '1', '1', '1'),
(268, 3, 54, '1', '1', '1', '1'),
(1148, 8, 209, '1', '1', '1', '1'),
(1147, 8, 208, '1', '1', '1', '1'),
(271, 2, 55, '1', '1', '1', '1'),
(272, 4, 55, '1', '1', '1', '1'),
(273, 3, 55, '1', '1', '1', '1'),
(1146, 8, 207, '1', '1', '1', '1'),
(1145, 8, 206, '1', '1', '1', '1'),
(276, 2, 56, '1', '1', '1', '1'),
(277, 4, 56, '1', '1', '1', '1'),
(278, 3, 56, '1', '1', '1', '1'),
(1144, 8, 205, '1', '1', '1', '1'),
(1143, 8, 204, '1', '1', '1', '1'),
(281, 2, 57, '1', '1', '1', '1'),
(282, 4, 57, '1', '1', '1', '1'),
(283, 3, 57, '1', '1', '1', '1'),
(1142, 8, 202, '1', '1', '1', '1'),
(1141, 8, 201, '1', '1', '1', '1'),
(286, 2, 58, '1', '1', '1', '1'),
(287, 4, 58, '1', '1', '1', '1'),
(288, 3, 58, '1', '1', '1', '1'),
(1140, 8, 200, '1', '1', '1', '1'),
(1139, 8, 199, '1', '1', '1', '1'),
(291, 2, 59, '1', '1', '1', '1'),
(292, 4, 59, '1', '1', '1', '1'),
(293, 3, 59, '1', '1', '1', '1'),
(1138, 8, 198, '1', '1', '1', '1'),
(1137, 8, 197, '1', '1', '1', '1'),
(296, 2, 60, '1', '1', '1', '1'),
(297, 4, 60, '1', '1', '1', '1'),
(298, 3, 60, '1', '1', '1', '1'),
(1136, 8, 196, '1', '1', '1', '1'),
(1135, 8, 195, '1', '1', '1', '1'),
(301, 2, 61, '1', '1', '1', '1'),
(302, 4, 61, '1', '1', '1', '1'),
(303, 3, 61, '1', '1', '1', '1'),
(1134, 8, 194, '1', '1', '1', '1'),
(1133, 8, 193, '1', '1', '1', '1'),
(306, 2, 62, '1', '1', '1', '1'),
(307, 4, 62, '1', '1', '1', '1'),
(308, 3, 62, '1', '1', '1', '1'),
(1132, 8, 192, '1', '1', '1', '1'),
(1131, 8, 191, '1', '1', '1', '1'),
(311, 2, 63, '1', '1', '1', '1'),
(312, 4, 63, '1', '1', '1', '1'),
(313, 3, 63, '1', '1', '1', '1'),
(1130, 8, 190, '1', '1', '1', '1'),
(1129, 8, 189, '1', '1', '1', '1'),
(316, 2, 64, '1', '1', '1', '1'),
(317, 4, 64, '1', '1', '1', '1'),
(318, 3, 64, '1', '1', '1', '1'),
(1128, 8, 188, '1', '1', '1', '1'),
(1127, 8, 186, '1', '1', '1', '1'),
(321, 2, 65, '1', '1', '1', '1'),
(322, 4, 65, '1', '1', '1', '1'),
(323, 3, 65, '1', '1', '1', '1'),
(1126, 8, 185, '1', '1', '1', '1'),
(1125, 8, 184, '1', '1', '1', '1'),
(326, 2, 66, '1', '1', '1', '1'),
(327, 4, 66, '1', '1', '1', '1'),
(328, 3, 66, '1', '1', '1', '1'),
(1124, 8, 183, '1', '1', '1', '1'),
(1123, 8, 182, '1', '1', '1', '1'),
(331, 2, 67, '1', '1', '1', '1'),
(332, 4, 67, '1', '1', '1', '1'),
(333, 3, 67, '1', '1', '1', '1'),
(1122, 8, 181, '1', '1', '1', '1'),
(1121, 8, 180, '1', '1', '1', '1'),
(336, 2, 68, '1', '1', '1', '1'),
(337, 4, 68, '1', '1', '1', '1'),
(338, 3, 68, '1', '1', '1', '1'),
(1120, 8, 179, '1', '1', '1', '1'),
(1119, 8, 178, '-1', '-1', '-1', '-1'),
(341, 2, 69, '1', '1', '1', '1'),
(342, 4, 69, '1', '1', '1', '1'),
(343, 3, 69, '1', '1', '1', '1'),
(1118, 8, 177, '-1', '-1', '-1', '-1'),
(1117, 8, 176, '-1', '-1', '-1', '-1'),
(346, 2, 70, '1', '1', '1', '1'),
(347, 4, 70, '1', '1', '1', '1'),
(348, 3, 70, '1', '1', '1', '1'),
(1116, 8, 175, '-1', '-1', '-1', '-1'),
(1115, 8, 173, '1', '1', '1', '1'),
(351, 2, 71, '1', '1', '1', '1'),
(352, 4, 71, '1', '1', '1', '1'),
(353, 3, 71, '1', '1', '1', '1'),
(1114, 8, 172, '1', '1', '1', '1'),
(1113, 8, 171, '1', '1', '1', '1'),
(356, 2, 72, '1', '1', '1', '1'),
(357, 4, 72, '1', '1', '1', '1'),
(358, 3, 72, '1', '1', '1', '1'),
(1112, 8, 170, '1', '1', '1', '1'),
(1111, 8, 169, '1', '1', '1', '1'),
(361, 2, 73, '1', '1', '1', '1'),
(362, 4, 73, '1', '1', '1', '1'),
(363, 3, 73, '1', '1', '1', '1'),
(1110, 8, 168, '1', '1', '1', '1'),
(1109, 8, 167, '1', '1', '1', '1'),
(366, 2, 74, '1', '1', '1', '1'),
(367, 4, 74, '1', '1', '1', '1'),
(368, 3, 74, '1', '1', '1', '1'),
(1108, 8, 166, '1', '1', '1', '1'),
(1107, 8, 165, '1', '1', '1', '1'),
(371, 2, 75, '1', '1', '1', '1'),
(372, 4, 75, '1', '1', '1', '1'),
(373, 3, 75, '1', '1', '1', '1'),
(1106, 8, 164, '1', '1', '1', '1'),
(1105, 8, 163, '1', '1', '1', '1'),
(376, 2, 77, '1', '1', '1', '1'),
(377, 4, 77, '1', '1', '1', '1'),
(378, 3, 77, '1', '1', '1', '1'),
(1104, 8, 162, '1', '1', '1', '1'),
(1103, 8, 161, '1', '1', '1', '1'),
(381, 2, 78, '1', '1', '1', '1'),
(382, 4, 78, '1', '1', '1', '1'),
(383, 3, 78, '1', '1', '1', '1'),
(1102, 8, 160, '1', '1', '1', '1'),
(1101, 8, 159, '1', '1', '1', '1'),
(386, 2, 79, '1', '1', '1', '1'),
(387, 4, 79, '1', '1', '1', '1'),
(388, 3, 79, '1', '1', '1', '1'),
(1100, 8, 158, '1', '1', '1', '1'),
(1099, 8, 156, '1', '1', '1', '1'),
(391, 2, 80, '1', '1', '1', '1'),
(392, 4, 80, '1', '1', '1', '1'),
(393, 3, 80, '1', '1', '1', '1'),
(1098, 8, 155, '1', '1', '1', '1'),
(1097, 8, 154, '1', '1', '1', '1'),
(396, 2, 76, '1', '1', '1', '1'),
(397, 4, 76, '1', '1', '1', '1'),
(398, 3, 76, '1', '1', '1', '1'),
(1096, 8, 153, '1', '1', '1', '1'),
(1095, 8, 152, '1', '1', '1', '1'),
(401, 2, 81, '1', '1', '1', '1'),
(402, 4, 81, '1', '1', '1', '1'),
(403, 3, 81, '1', '1', '1', '1'),
(1094, 8, 151, '1', '1', '1', '1'),
(1093, 8, 150, '1', '1', '1', '1'),
(406, 2, 82, '1', '1', '1', '1'),
(407, 4, 82, '1', '1', '1', '1'),
(408, 3, 82, '1', '1', '1', '1'),
(1092, 8, 149, '-1', '-1', '-1', '-1'),
(1091, 8, 148, '-1', '-1', '-1', '-1'),
(411, 2, 83, '1', '1', '1', '1'),
(412, 4, 83, '1', '1', '1', '1'),
(413, 3, 83, '1', '1', '1', '1'),
(1090, 8, 147, '-1', '-1', '-1', '-1'),
(1089, 8, 146, '-1', '-1', '-1', '-1'),
(416, 2, 84, '1', '1', '1', '1'),
(417, 4, 84, '1', '1', '1', '1'),
(418, 3, 84, '1', '1', '1', '1'),
(1088, 8, 144, '1', '1', '1', '1'),
(1087, 8, 143, '1', '1', '1', '1'),
(421, 2, 92, '1', '1', '1', '1'),
(422, 4, 92, '1', '1', '1', '1'),
(423, 3, 92, '1', '1', '1', '1'),
(1086, 8, 142, '1', '1', '1', '1'),
(1085, 8, 141, '1', '1', '1', '1'),
(1084, 8, 140, '1', '1', '1', '1'),
(1083, 8, 139, '1', '1', '1', '1'),
(431, 2, 94, '1', '1', '1', '1'),
(432, 4, 94, '1', '1', '1', '1'),
(433, 3, 94, '1', '1', '1', '1'),
(1082, 8, 138, '1', '1', '1', '1'),
(1081, 8, 137, '1', '1', '1', '1'),
(436, 2, 95, '1', '1', '1', '1'),
(437, 4, 95, '1', '1', '1', '1'),
(438, 3, 95, '1', '1', '1', '1'),
(1080, 8, 136, '1', '1', '1', '1'),
(1079, 8, 135, '1', '1', '1', '1'),
(441, 2, 112, '1', '1', '1', '1'),
(442, 4, 112, '1', '1', '1', '1'),
(443, 3, 112, '1', '1', '1', '1'),
(1078, 8, 134, '1', '1', '1', '1'),
(1077, 8, 133, '1', '1', '1', '1'),
(446, 2, 113, '1', '1', '1', '1'),
(447, 4, 113, '1', '1', '1', '1'),
(448, 3, 113, '1', '1', '1', '1'),
(1076, 8, 132, '1', '1', '1', '1'),
(1075, 8, 131, '1', '1', '1', '1'),
(451, 2, 114, '1', '1', '1', '1'),
(452, 4, 114, '1', '1', '1', '1'),
(453, 3, 114, '1', '1', '1', '1'),
(1074, 8, 130, '1', '1', '1', '1'),
(1073, 8, 129, '1', '1', '1', '1'),
(1072, 8, 128, '1', '1', '1', '1'),
(1071, 8, 127, '1', '1', '1', '1'),
(461, 2, 146, '1', '1', '1', '1'),
(462, 4, 146, '-1', '-1', '-1', '-1'),
(463, 3, 146, '-1', '-1', '-1', '-1'),
(1070, 8, 126, '1', '1', '1', '1'),
(1069, 8, 125, '1', '1', '1', '1'),
(466, 2, 147, '1', '1', '1', '1'),
(467, 4, 147, '-1', '-1', '-1', '-1'),
(468, 3, 147, '-1', '-1', '-1', '-1'),
(1068, 8, 124, '1', '1', '1', '1'),
(1067, 8, 123, '1', '1', '1', '1'),
(471, 2, 148, '1', '1', '1', '1'),
(472, 4, 148, '-1', '-1', '-1', '-1'),
(473, 3, 148, '-1', '-1', '-1', '-1'),
(1066, 8, 122, '1', '1', '1', '1'),
(1065, 8, 121, '1', '1', '1', '1'),
(476, 2, 149, '1', '1', '1', '1'),
(477, 4, 149, '-1', '-1', '-1', '-1'),
(478, 3, 149, '-1', '-1', '-1', '-1'),
(1064, 8, 120, '1', '1', '1', '1'),
(1063, 8, 119, '1', '1', '1', '1'),
(481, 2, 162, '1', '1', '1', '1'),
(482, 4, 162, '1', '1', '1', '1'),
(483, 3, 162, '1', '1', '1', '1'),
(1062, 8, 118, '1', '1', '1', '1'),
(1061, 8, 117, '1', '1', '1', '1'),
(486, 2, 163, '1', '1', '1', '1'),
(487, 4, 163, '1', '1', '1', '1'),
(488, 3, 163, '1', '1', '1', '1'),
(1060, 8, 116, '1', '1', '1', '1'),
(1059, 8, 114, '1', '1', '1', '1'),
(491, 2, 164, '1', '1', '1', '1'),
(492, 4, 164, '1', '1', '1', '1'),
(493, 3, 164, '1', '1', '1', '1'),
(1058, 8, 113, '1', '1', '1', '1'),
(1057, 8, 112, '1', '1', '1', '1'),
(496, 2, 165, '1', '1', '1', '1'),
(497, 4, 165, '1', '1', '1', '1'),
(498, 3, 165, '1', '1', '1', '1'),
(1056, 8, 111, '1', '1', '1', '1'),
(1055, 8, 110, '1', '1', '1', '1'),
(501, 2, 175, '1', '1', '1', '1'),
(502, 4, 175, '-1', '-1', '-1', '-1'),
(503, 3, 175, '-1', '-1', '-1', '-1'),
(1054, 8, 109, '1', '1', '1', '1'),
(1053, 8, 107, '1', '1', '1', '1'),
(506, 2, 176, '1', '1', '1', '1'),
(507, 4, 176, '-1', '-1', '-1', '-1'),
(508, 3, 176, '-1', '-1', '-1', '-1'),
(1052, 8, 106, '1', '1', '1', '1'),
(1051, 8, 105, '1', '1', '1', '1'),
(511, 2, 177, '1', '1', '1', '1'),
(512, 4, 177, '-1', '-1', '-1', '-1'),
(513, 3, 177, '-1', '-1', '-1', '-1'),
(1050, 8, 104, '1', '1', '1', '1'),
(1049, 8, 103, '1', '1', '1', '1'),
(516, 2, 178, '1', '1', '1', '1'),
(517, 4, 178, '-1', '-1', '-1', '-1'),
(518, 3, 178, '-1', '-1', '-1', '-1'),
(1048, 8, 102, '1', '1', '1', '1'),
(1047, 8, 101, '1', '1', '1', '1'),
(521, 2, 220, '1', '1', '1', '1'),
(522, 4, 220, '1', '1', '1', '1'),
(523, 3, 220, '1', '1', '1', '1'),
(1046, 8, 100, '1', '1', '1', '1'),
(1045, 8, 99, '1', '1', '1', '1'),
(526, 2, 221, '1', '1', '1', '1'),
(527, 4, 221, '1', '1', '1', '1'),
(528, 3, 221, '1', '1', '1', '1'),
(1044, 8, 98, '1', '1', '1', '1'),
(1043, 8, 97, '1', '1', '1', '1'),
(531, 2, 222, '1', '1', '1', '1'),
(532, 4, 222, '1', '1', '1', '1'),
(533, 3, 222, '1', '1', '1', '1'),
(1042, 8, 96, '1', '1', '1', '1'),
(1041, 8, 95, '1', '1', '1', '1'),
(536, 2, 223, '1', '1', '1', '1'),
(537, 4, 223, '1', '1', '1', '1'),
(538, 3, 223, '1', '1', '1', '1'),
(1040, 8, 94, '1', '1', '1', '1'),
(1039, 8, 92, '1', '1', '1', '1'),
(541, 2, 232, '1', '1', '1', '1'),
(542, 4, 232, '1', '1', '1', '1'),
(543, 3, 232, '1', '1', '1', '1'),
(1038, 8, 91, '1', '1', '1', '1'),
(1037, 8, 90, '1', '1', '1', '1'),
(546, 2, 233, '1', '1', '1', '1'),
(547, 4, 233, '1', '1', '1', '1'),
(548, 3, 233, '1', '1', '1', '1'),
(1036, 8, 89, '1', '1', '1', '1'),
(1035, 8, 87, '1', '1', '1', '1'),
(551, 2, 234, '1', '1', '1', '1'),
(552, 4, 234, '1', '1', '1', '1'),
(553, 3, 234, '1', '1', '1', '1'),
(1034, 8, 86, '1', '1', '1', '1'),
(1033, 8, 85, '1', '1', '1', '1'),
(556, 2, 235, '1', '1', '1', '1'),
(557, 4, 235, '1', '1', '1', '1'),
(558, 3, 235, '1', '1', '1', '1'),
(1032, 8, 84, '1', '1', '1', '1'),
(1031, 8, 83, '1', '1', '1', '1'),
(561, 2, 244, '1', '1', '1', '1'),
(562, 4, 244, '1', '1', '1', '1'),
(563, 3, 244, '1', '1', '1', '1'),
(1030, 8, 82, '1', '1', '1', '1'),
(1029, 8, 81, '1', '1', '1', '1'),
(566, 2, 245, '1', '1', '1', '1'),
(567, 4, 245, '1', '1', '1', '1'),
(568, 3, 245, '1', '1', '1', '1'),
(1028, 8, 80, '1', '1', '1', '1'),
(1027, 8, 79, '1', '1', '1', '1'),
(571, 2, 246, '1', '1', '1', '1'),
(572, 4, 246, '1', '1', '1', '1'),
(573, 3, 246, '1', '1', '1', '1'),
(1026, 8, 78, '1', '1', '1', '1'),
(1025, 8, 77, '1', '1', '1', '1'),
(576, 2, 247, '1', '1', '1', '1'),
(577, 4, 247, '1', '1', '1', '1'),
(578, 3, 247, '1', '1', '1', '1'),
(1024, 8, 76, '1', '1', '1', '1'),
(1023, 8, 74, '1', '1', '1', '1'),
(581, 2, 258, '1', '1', '1', '1'),
(582, 4, 258, '1', '1', '1', '1'),
(583, 3, 258, '1', '1', '1', '1'),
(1022, 8, 73, '1', '1', '1', '1'),
(1021, 8, 72, '1', '1', '1', '1'),
(586, 2, 261, '1', '1', '1', '1'),
(587, 4, 261, '1', '1', '1', '1'),
(588, 3, 261, '1', '1', '1', '1'),
(1020, 8, 71, '1', '1', '1', '1'),
(1019, 8, 70, '1', '1', '1', '1'),
(591, 2, 262, '1', '1', '1', '1'),
(592, 4, 262, '1', '1', '1', '1'),
(593, 3, 262, '1', '1', '1', '1'),
(1018, 8, 69, '1', '1', '1', '1'),
(1017, 8, 68, '1', '1', '1', '1'),
(596, 2, 267, '1', '1', '1', '1'),
(597, 4, 267, '1', '1', '1', '1'),
(598, 3, 267, '1', '1', '1', '1'),
(1016, 8, 67, '1', '1', '1', '1'),
(1015, 8, 66, '1', '1', '1', '1'),
(601, 2, 317, '1', '1', '1', '1'),
(602, 4, 317, '1', '1', '1', '1'),
(603, 3, 317, '1', '1', '1', '1'),
(1014, 8, 64, '1', '1', '1', '1'),
(1013, 8, 63, '1', '1', '1', '1'),
(606, 2, 319, '1', '1', '1', '1'),
(607, 4, 319, '1', '1', '1', '1'),
(608, 3, 319, '1', '1', '1', '1'),
(1012, 8, 62, '1', '1', '1', '1'),
(1011, 8, 61, '1', '1', '1', '1'),
(611, 2, 320, '1', '1', '1', '1'),
(612, 4, 320, '1', '1', '1', '1'),
(613, 3, 320, '1', '1', '1', '1'),
(1010, 8, 60, '1', '1', '1', '1'),
(1009, 8, 59, '1', '1', '1', '1'),
(616, 2, 321, '1', '1', '1', '1'),
(617, 4, 321, '1', '1', '1', '1'),
(618, 3, 321, '1', '1', '1', '1'),
(1008, 8, 58, '1', '1', '1', '1'),
(1007, 8, 56, '1', '1', '1', '1'),
(621, 2, 345, '1', '1', '1', '1'),
(622, 4, 345, '1', '1', '1', '1'),
(623, 3, 345, '1', '1', '1', '1'),
(1006, 8, 55, '1', '1', '1', '1'),
(1005, 8, 54, '1', '1', '1', '1'),
(626, 2, 347, '1', '1', '1', '1'),
(627, 4, 347, '1', '1', '1', '1'),
(628, 3, 347, '1', '1', '1', '1'),
(1004, 8, 53, '1', '1', '1', '1'),
(1003, 8, 52, '1', '1', '1', '1'),
(631, 2, 348, '1', '1', '1', '1'),
(632, 4, 348, '1', '1', '1', '1'),
(633, 3, 348, '1', '1', '1', '1'),
(1002, 8, 51, '1', '1', '1', '1'),
(1001, 8, 50, '1', '1', '1', '1'),
(636, 2, 349, '1', '1', '1', '1'),
(637, 4, 349, '1', '1', '1', '1'),
(638, 3, 349, '1', '1', '1', '1'),
(1000, 8, 49, '1', '1', '1', '1'),
(999, 8, 48, '1', '1', '1', '1'),
(641, 2, 385, '1', '1', '1', '1'),
(642, 4, 385, '1', '1', '1', '1'),
(643, 3, 385, '1', '1', '1', '1'),
(998, 8, 47, '1', '1', '1', '1'),
(997, 8, 46, '1', '1', '1', '1'),
(646, 2, 387, '1', '1', '1', '1'),
(647, 4, 387, '1', '1', '1', '1'),
(648, 3, 387, '1', '1', '1', '1'),
(996, 8, 44, '1', '1', '1', '1'),
(995, 8, 43, '1', '1', '1', '1'),
(651, 2, 388, '1', '1', '1', '1'),
(652, 4, 388, '1', '1', '1', '1'),
(653, 3, 388, '1', '1', '1', '1'),
(994, 8, 42, '1', '1', '1', '1'),
(993, 8, 41, '1', '1', '1', '1'),
(656, 2, 389, '1', '1', '1', '1'),
(657, 4, 389, '1', '1', '1', '1'),
(658, 3, 389, '1', '1', '1', '1'),
(992, 8, 40, '1', '1', '1', '1'),
(991, 8, 39, '1', '1', '1', '1'),
(990, 8, 38, '1', '1', '1', '1'),
(989, 8, 37, '1', '1', '1', '1'),
(988, 8, 36, '1', '1', '1', '1'),
(987, 8, 35, '1', '1', '1', '1'),
(986, 8, 34, '1', '1', '1', '1'),
(985, 8, 32, '1', '1', '1', '1'),
(984, 8, 31, '1', '1', '1', '1'),
(983, 8, 30, '1', '1', '1', '1'),
(982, 8, 29, '1', '1', '1', '1'),
(981, 8, 28, '1', '1', '1', '1'),
(980, 8, 27, '1', '1', '1', '1'),
(979, 8, 26, '1', '1', '1', '1'),
(978, 8, 25, '1', '1', '1', '1'),
(977, 8, 23, '1', '1', '1', '1'),
(976, 8, 22, '1', '1', '1', '1'),
(975, 8, 21, '1', '1', '1', '1'),
(974, 8, 20, '1', '1', '1', '1'),
(973, 8, 19, '1', '1', '1', '1'),
(972, 8, 18, '1', '1', '1', '1'),
(971, 8, 17, '1', '1', '1', '1'),
(970, 8, 16, '-1', '-1', '-1', '-1'),
(969, 8, 15, '-1', '-1', '-1', '-1'),
(968, 8, 14, '-1', '-1', '-1', '-1'),
(967, 8, 13, '1', '1', '1', '1'),
(966, 8, 11, '1', '1', '1', '1'),
(965, 8, 10, '1', '1', '1', '1'),
(964, 8, 9, '1', '1', '1', '1'),
(963, 8, 8, '1', '1', '1', '1'),
(962, 8, 7, '1', '1', '1', '1'),
(961, 8, 6, '1', '1', '1', '1'),
(960, 8, 5, '1', '1', '1', '1'),
(959, 8, 4, '1', '1', '1', '1'),
(958, 8, 3, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `summary` text,
  `body` longtext,
  `published` tinyint(1) NOT NULL,
  `sticky` tinyint(1) NOT NULL DEFAULT '0',
  `in_rss` tinyint(1) NOT NULL DEFAULT '1',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `slug`, `image`, `summary`, `body`, `published`, `sticky`, `in_rss`, `meta_title`, `meta_description`, `meta_keywords`, `created`, `modified`) VALUES
(18, 'Itâ€™s the taking part that counts', 'Its-the-taking-part-that-counts', 'imgpsh_fullsize (1).jpg', NULL, '<p><img src="http://192.168.100.97/sagar/frontier/pro/uploads/imgpsh_fullsize%20(1).jpg" alt="" width="250" height="250" /></p>\r\n<p>A group of Frontier staff and clients enjoyed a fantastic overnight stay in Birmingham for the Finals of the 2016 National Learning Disabilities Awards.</p>\r\n<p>We were extremely excited to have been shortlisted as the awards celebrate excellence in the support of people with learning disabilities and aim to pay tribute to those individuals or organisation who excel in providing quality care.</p>\r\n<p>The National Learning Disabilities Awards are organised by Care Talk and supported by the Department of Health, Association of Directors of Adult Social Services (ADASS), Social Care Institute for Excellence (SCIE) and Skills for Care and Voluntary Organisations Disability Group (VODG).</p>\r\n<p>Unfortunately, we didn&rsquo;t on this occasion but a great time was had by all and it was fantastic to be part of the finals and to have our work with our clients recognised.</p>', 1, 0, 1, 'Itâ€™s the taking part that counts', '', '', '2016-07-26 05:25:49', '2016-07-27 06:53:43'),
(37, 'Can Yoga help people with support needs?', 'can-yoga-help-people-with-support-needs', 'blog-banner-small.jpg', NULL, '<p><img src="http://192.168.100.97/sagar/frontier/pro/uploads/blog-img%20(1).jpg" alt="" width="796" height="398" /></p>\r\n<p>Frontier Support&rsquo;s new CEO, Rob Anscomb-Gates, explains his love of Yoga and his ambition to use it to help people with support needs such as Autism and Aspergers.</p>\r\n<p>&ldquo;I&rsquo;m a passionate yogi and have practiced for the past ten years. It actually started as a new year&rsquo;s resolution and was the only one that stuck!&nbsp; I went along to a local class and was extremely lucky to find an amazing teacher who embraced the &lsquo;yogic&rsquo; way of living; the most obvious characteristics being her generosity and kindness.&nbsp;So I was hooked.</p>\r\n<p>Like most people, I began practicing yoga mainly for the physical benefits of maintaining a good level of fitness and keeping my weight under control. However yoga is a bit like planting a seed and, bit by bit, you grow as you gain knowledge and awareness of the wider benefits. Today, I practice yoga primarily for my connection to others.&nbsp; It helps me to self-manage any stress I may feel, helps boost my confidence, improves my memory, relieves tension and helps me improve flexibility. But most importantly it&rsquo;s fun.</p>\r\n<p>I become a yoga teacher in March of this year and have taught a few classes already, balancing a full time role and finding a time to teach will be a challenge but I&rsquo;m hoping that in the New Year I can set up a regular class. My longer term ambition is to teach yoga to people with support needs such as Autism and a whole range of health issues and disabilities. I&rsquo;m really passionate about giving people the tools to self-manage rather than be reliant on a doctor to prescribe medication and I believe yoga is one possible vehicle of self-discovery.</p>', 1, 0, 1, '', '', '', '2016-09-16 10:41:06', '2016-09-16 10:45:51'),
(36, 'Frontier Support Hits Double Figures', 'frontier-support-hits-double-figures', 'rsz_10th_birthday_party.jpg', NULL, '<p><img src="http://192.168.100.97/sagar/frontier/pro/uploads/10th%20birthday%20party.jpg" alt="" width="2643" height="2238" />A great evening was enjoyed by around 100 staff, clients and families at the Croydon Conference Centre on Saturday 13th August to celebrate Frontier Support&rsquo;s 10th birthday.&nbsp; Guests were treated to a buffet meal followed by an evening of dancing and everyone left with a gift.&nbsp;</p>\r\n<p>Denise Doggett, CEO of Frontier Support, said: &ldquo;We&rsquo;re so proud of what we&rsquo;ve achieved over the past ten years and wanted, in the first instance, to celebrate the company&rsquo;s birthday with the people who make it all possible &ndash; our clients, their families and our staff.&nbsp; Some of our clients have been with us for many years and we&rsquo;ve seen them develop and grow with us so it was lovely to share the evening with them&rdquo;.</p>', 1, 0, 1, '', '', '', '2016-08-23 04:31:06', '2016-08-23 04:31:59'),
(38, 'Rio 2016 closing ceremony', 'rio-2016-closing-ceremony', 'img-small.jpg', NULL, '<p><img src="http://192.168.100.97/sagar/frontier/pro/uploads/iiiiii.png" alt="" width="799" height="532" /></p>\r\n<p>What an amazing Paralympics, team GB did us proud, with an amazing group of 264 athletes.&nbsp;Our team of athletes shone and surpassed the medal target.&nbsp;Overall Britain came second with a total score of 147 medals of these were 64 gold, 39 sliver and 44 bronze.</p>\r\n<p>The Paralympics are so important about raising the public profile of people with a range of different bodies&rsquo;<br />types and perceived limitations and showing the world how they as individuals have dedicated huge commitment<br />to being the best in their chosen sport.<br />It&rsquo;s about overlooking difference and seeing that everyone is able to big achievements to be<br />proud of...<br />The closing ceremony went out with a bang and was enjoyed by many of the people we support, some of whom went to their local pub to celebrate.<br />Looking forward to the next games in 2020, Tokyo here we come...</p>', 1, 0, 1, 'dasdsd', 'dds', 'dasdsd', '2016-09-20 13:47:56', '2016-09-20 13:59:40'),
(39, 'Transforming Care, Transforming lives ', 'transforming-care-transforming-lives', 'imgpsh_fullsize.jpg', NULL, '<p><span><img src="http://192.168.100.97/sagar/frontier/pro/uploads/9e0ee0718b620cbaf09b5bf6fa6281cd.jpg" alt="" width="849" height="565" /></span></p>\r\n<p><span>It''s a shocking fact that there are&nbsp;still&nbsp;hundreds of people with learning disabilities&nbsp;and challenging&nbsp;behaviour&nbsp;living in hospitals, sometimes for ten years or more, due to lack of suitable housing.&nbsp;Setting aside for one moment the inappropriateness of a person living in an institution when it''s not necessary, it has&nbsp;been suggested that the NHS could save over &pound;10 million a year if these people were able to move into suitable supported accommodation.</span></p>\r\n<p><span><span>At Frontier Support we provide care and support to vulnerable adults and our approach has always been about changing&nbsp;the&nbsp;lives of the people we support. Our relationship with&nbsp;Zetetick&nbsp;Housing allows people a greater choice about potential accommodation&nbsp;options. Just last month, we had&nbsp;a family, care manager and&nbsp;a member of our team shortlisting housing&nbsp;choices on the internet&nbsp;(good old Right Move!)&nbsp;and visiting three properties before deciding on ground floor flat with a garden in Balham, South London.</span></span></p>\r\n<p><span>In some professional mindsets a move from an Assessment and Treatment Centre to an individual tenancy in a flat of the person&rsquo;s own choosing is a step too far. But, at Frontier Support, we don&rsquo;t believe this is the case and&nbsp;anyway what&rsquo;s the alternative? &nbsp;People staying in a hospital setting?&nbsp;We provide supporting living ONLY, we don&rsquo;t support people in residential or hospital settings and never will.</span></p>\r\n<p><strong>A successful move</strong></p>\r\n<p>In order for any major move to happen there are a number of important factors to consider and plan for :</p>\r\n<ul>\r\n<li><span>The person MUST be at the center of all planning and preferably be actively involved. &nbsp;People who have been in a hospital will lack control about their&nbsp;environment</span></li>\r\n<li><span><span>Partnership working&nbsp;between stakeholders&nbsp;is critical&nbsp;with sharing of information and conversations&nbsp;based on open and transparent dialogue enabling a successful and positive move&nbsp;for&nbsp;the person</span></span></li>\r\n<li><span><span>C</span></span><span><span>hange of this scale requires time for the person&nbsp;to adjust.&nbsp;It&rsquo;s vital to any successful move out of a hospital setting to have a carefully planned transition. Key aspects of the transition will be around people building relationships and finding successful ways in working with and supporting the person. Including both pro-active and reactive strategies to keep everyone safe. There should also be a backup plan should the person struggle to adjust. The adjustment phase could be as simple as one day a week in the new environment and adding another day week by week building this up at the person&rsquo;s pace</span></span></li>\r\n</ul>\r\n<p><span><span><span>The transition phase can be a barrier for local authorities as care managers will be struggling to balance the limited finances available to them. &nbsp;However,&nbsp;if this&nbsp;was carefully planned, it will be&nbsp;more likely that a move will be successful and allow the person to continue living in an environment that they are happy with and were involved with choosing. Rushing such situations purely because of cost is unhelpful for the person and sets the person up to fail and&nbsp;or at worst being&nbsp;recalled into&nbsp;hospital and therefore costing more money. And that''s before we even start to consider the potential emotional damage.</span></span></span></p>\r\n<p><strong><span>Commitment to making it happen</span></strong></p>\r\n<p>I&rsquo;m proud to share that our team NEVER give up on a person, no matter how difficult the situation of crisis they may face in their lives. These are the times that people learn to trust one another in a real and meaningful way.</p>\r\n<p><strong><span>If you&rsquo;re a person looking for support, a parent trying to find&nbsp;support for a loved one or a care manager/commissioner struggling to find a workable solution then please get in touch&hellip;&hellip;</span></strong></p>', 1, 0, 1, '', '', '', '2016-09-26 10:43:03', '2016-09-26 10:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_categories`
--

CREATE TABLE `blog_post_categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `rss_channel_title` varchar(255) DEFAULT NULL,
  `rss_channel_description` text,
  `blog_post_count` int(11) NOT NULL DEFAULT '0',
  `under_blog_post_count` int(11) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_post_categories`
--

INSERT INTO `blog_post_categories` (`id`, `parent_id`, `lft`, `rght`, `name`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `rss_channel_title`, `rss_channel_description`, `blog_post_count`, `under_blog_post_count`, `created`, `modified`) VALUES
(5, NULL, 1, 2, 'frontier cat', 'front-cat', NULL, NULL, NULL, NULL, NULL, 2, 2, '2016-01-08 13:30:15', '2016-01-08 13:30:15'),
(6, NULL, 3, 4, 'buzz hub cat', 'buzz-hub', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2016-01-08 13:30:39', '2016-03-03 07:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_categories_blog_posts`
--

CREATE TABLE `blog_post_categories_blog_posts` (
  `blog_post_category_id` int(11) NOT NULL,
  `blog_post_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_post_categories_blog_posts`
--

INSERT INTO `blog_post_categories_blog_posts` (`blog_post_category_id`, `blog_post_id`) VALUES
(5, 18),
(5, 37);

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_comments`
--

CREATE TABLE `blog_post_comments` (
  `id` int(10) NOT NULL,
  `blog_post_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `comment` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_post_comments`
--

INSERT INTO `blog_post_comments` (`id`, `blog_post_id`, `name`, `email`, `comment`, `status`, `created`) VALUES
(3, 13, 'sagar jajoriya', 'sagar@gmail.com', '<p>first test comment</p>', 1, '2016-02-04 10:22:16'),
(4, 13, 'sagar', 'sagar@sagar.com', '<p>second test comment</p>', 1, '2016-02-04 10:23:15'),
(5, 13, 'shefali', 'dsf@djshf.com', '<p>hello</p>', 1, '2016-02-04 10:26:36'),
(6, 13, 'abcde', 'abcde@gmail.com', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', 1, '2016-02-04 10:55:55'),
(7, 9, 'abc', 'abc@abc.com', '<p>nice</p>', 1, '2016-02-04 10:57:05'),
(10, 15, 'Alka', 'alkabagga@yahoo.com', '<p>Test by Alka 02 June 2016</p>', 0, '2016-06-02 07:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_tags`
--

CREATE TABLE `blog_post_tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `rss_channel_title` varchar(255) DEFAULT NULL,
  `rss_channel_description` text,
  `blog_post_count` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_post_tags`
--

INSERT INTO `blog_post_tags` (`id`, `name`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `rss_channel_title`, `rss_channel_description`, `blog_post_count`, `created`, `modified`) VALUES
(1, 'tag', 'tag', 'aaaaaaaaa', 'vvvvvvvvvvvvvv', 'aaaaaaaaaaaa', 'aaaaaaaa', 'asdA', 0, '2015-12-16 07:05:47', '2015-12-16 07:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_tags_blog_posts`
--

CREATE TABLE `blog_post_tags_blog_posts` (
  `blog_post_tag_id` int(11) NOT NULL,
  `blog_post_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blog_settings`
--

CREATE TABLE `blog_settings` (
  `id` int(11) NOT NULL,
  `setting` varchar(255) NOT NULL,
  `setting_text` varchar(255) NOT NULL,
  `tip` varchar(255) DEFAULT NULL,
  `value` text,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_settings`
--

INSERT INTO `blog_settings` (`id`, `setting`, `setting_text`, `tip`, `value`, `modified`) VALUES
(1, 'meta_title', 'Meta Title', NULL, 'My New Blog', '2015-12-16 06:10:46'),
(2, 'meta_description', 'Meta Description', NULL, '', '0000-00-00 00:00:00'),
(3, 'meta_keywords', 'Meta Keywords', NULL, '', NULL),
(4, 'rss_channel_title', 'RSS Channel Title', NULL, 'My New Blog', NULL),
(5, 'rss_channel_description', 'RSS Channel Description', NULL, '', NULL),
(6, 'show_summary_on_post_view', 'Show post summary on post detail page?', '''Yes'' or ''No''', 'No', NULL),
(7, 'show_categories_on_post_view', 'Show post categories on post detail page?', '''Yes'' or ''No''', 'No', NULL),
(8, 'show_tags_on_post_view', 'Show post tags on post detail page?', '''Yes'' or ''No''', 'Yes', NULL),
(9, 'use_summary_or_body_on_post_index', 'Use the summary or the post body on the post index page?', '''Summary'' or ''Body''', 'Summary', NULL),
(10, 'use_summary_or_body_in_rss_feed', 'Use the summary or the post body in the RSS feed?', '''Summary'' or ''Body''', 'Body', NULL),
(11, 'published_format_on_post_index', 'Published date/time format on post index page', 'e.g. ''d M Y'' see php.net/date', '<\\s\\p\\a\\n \\c\\l\\a\\s\\s="\\d\\a\\y">d</\\s\\p\\a\\n> <\\s\\p\\a\\n \\c\\l\\a\\s\\s="\\m\\o\\n\\t\\h">M</\\s\\p\\a\\n> <\\s\\pa\\n \\c\\l\\a\\s\\s="\\y\\e\\a\\r">y</\\s\\p\\a\\n>', NULL),
(12, 'published_format_on_post_view', 'Published date/time format on post view page', 'e.g. ''d M Y'' see php.net/date', '<\\s\\p\\a\\n \\c\\l\\a\\s\\s="\\d\\a\\y">d</\\s\\p\\a\\n> <\\s\\p\\a\\n \\c\\l\\a\\s\\s="\\m\\o\\n\\t\\h">M</\\s\\p\\a\\n> <\\s\\p\\a\\n \\c\\l\\a\\s\\s="\\y\\e\\a\\r">y</\\s\\p\\a\\n>', NULL),
(13, 'og:site_name', 'Open Graph: Site Name', NULL, 'My New Blog', NULL),
(14, 'fb_admins', 'Facebook Admins', NULL, NULL, NULL),
(15, 'use_disqus', 'Use Disqus', '''Yes'' or ''No''', 'No', NULL),
(16, 'disqus_shortname', 'Disqus Shortname', NULL, NULL, NULL),
(17, 'disqus_developer', 'Disqus Developer Mode', '''Yes'' or ''No''', 'Yes', NULL),
(18, 'show_share_links', 'Show the share buttons on blog posts?', '''Yes'' or ''No''', 'Yes', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `image`, `status`, `created`, `modified`) VALUES
(1, 'b091041b6a9c7b39ba303f8d4c950e4a1483273502.png', 1, '2017-01-01 12:25:02', '2017-01-01 12:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `buzz_sessions`
--

CREATE TABLE `buzz_sessions` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buzz_sessions`
--

INSERT INTO `buzz_sessions` (`id`, `title`, `image`, `description`, `status`, `created`, `modified`) VALUES
(1, 'NUTRITIOUS COOKING', '160616Frontier-2.jpg', '<p>People with learning disabilities often have poorer diets and health than the rest of the population but it&rsquo;s important to remember that we are what we eat and a good nutritious diet can help with everything from fighting the common cold to lessening the likelihood of type two diabetes.</p>\r\n<p>Our cooking sessions focus on introducing new foods to support a healthier lifestyle and learning to cook them in healthier ways. This leads to increased independence and a better quality of life.</p>', 1, '2016-06-17 10:46:52', '2016-06-30 12:31:54'),
(2, 'IT & COMMUNICATION WORKSHOP', 'The-Buzzz-Hub-Still-0321.jpg', '<p>A great way to learn more about using smart phones, laptops and tablets to access the internet and communicate with friends and family via email and social media. These workshops also cover working with music and photos. The aim is to increase their confidence in using technology whilst educating participants about the need for safety and security.</p>', 1, '2016-06-17 10:47:17', '2016-06-17 10:47:17'),
(3, ' ART SESSIONS', '160216BuzzHub-12.jpg', '<p>These sessions use a wide range of art and creativity methods to aid communication and help participants to express their own ideas through subject matter that interests them. There&rsquo;s lots of scope for flexibility and individual creativity plus the session are a fun a relaxing way to work alongside others.</p>', 1, '2016-06-17 10:47:56', '2016-06-17 10:47:56'),
(4, 'MASSAGE AND REFLEXOLOGY', '160616Frontier-6.jpg', '<p>Our qualified staff can deliver reflexology sessions through the hands or feet in a treatment that stimulates corresponding areas of the body and promotes relaxation whilst relieving stress. Reflexology can also greatly improve circulation and has been proven to eliminate toxins and waste from the body.</p>\r\n<p>This is a great opportunity to experience massage in a relaxed environment. The client can pick their own essential oils or work with the therapist to choose something appropriate. They can also choose whether they listen to music during the massage, enjoy the silence or use the opportunity to chat to the therapist.</p>', 1, '2016-06-17 10:48:33', '2016-06-30 09:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `buzz_teams`
--

CREATE TABLE `buzz_teams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buzz_teams`
--

INSERT INTO `buzz_teams` (`id`, `name`, `image`, `description`, `status`, `created`, `modified`) VALUES
(1, 'Tracy Crockford', 'FSSHeadshot-20.jpg', '<p>I have worked with Frontier Support for three years as Deputy Head of Operations. Over the past year I&rsquo;ve really enjoyed being able to involve the people we support and Frontier staff in setting up the Buzzz Hub &ndash; a purpose designed environment in Croydon which provides a safe and welcoming space for people with Learning Disabilities, Asperger&rsquo;s, Autism, Challenging Behaviour, Physical Disabilities and Mental Health Issues.</p>\r\n<p>Over the past 30 years I&rsquo;ve worked in a wide range of support settings with different organisations working to enable individuals to access services and reach their potential and achieve their personal goals. I&rsquo;m passionate about social inclusion and supporting individuals to see that we all see the world in different ways.</p>\r\n<p>I love socialising, dancing, eating out and travelling. Also red wine and dark beer. My personal passions are seahorses, being treated like a princess at least once a day and all things purple. As those who know me will testify.</p>', 1, '2016-06-17 10:29:18', '2016-06-17 10:29:18'),
(2, 'Janet Neuwart', '160616Frontier-41.jpg', '<p>I&rsquo;ve been a Support Worker for five years. My role is to enable the people I work with to have fuller, happier and more independent lives. Working at the Buzzz Hub with an amazing team of like-minded people has made our Hub buzz with excitement and enthusiasm every day.</p>\r\n<p>I trained and qualified as a reflexologist in 2009. I&rsquo;m very passionate about using this holistic therapy and my work at the Buzzz Hub has given me the perfect opportunity to use my skills to help people. I have recently started a counselling course which will enable me to use counselling and holistic therapy in tandem and so further extend the range of services we can provide at the Buzzz Hub to support people&rsquo;s well-being.</p>\r\n<p>I love it when my family visit for a nice big dinner and we all sit around playing games and with a glass of wine. I love the Arts and going to Museums. I am quite a spiritual person, the change of seasons always puts a smile on my face with Autumn being my favourite time of year.</p>', 1, '2016-06-17 10:29:44', '2016-06-30 09:29:54'),
(3, 'Lukasz Birycki', '160616Frontier-49.jpg', '<p>I have been working in a care worker role for about six years now. Most recently I&rsquo;ve been involved with the Buzzz Hub. I am particularly interested in creating a safe and vibrant space for our users so they can socialise and develop their talents. I enjoy working with people and helping them to develop their talents. Healthy lifestyle and balanced diet are passions of mine so I&rsquo;m excited about the nutrition workshops that we run.</p>\r\n<p>Travelling is a mega passion of mine and I frequently try to get away to new and exciting destinations. I also enjoy going to the cinema to see independent movies. I ride my bicycle to most places and love having it as a way of keeping fit and healthy. I&rsquo;m a vegan so health and nutrition are big aspects of my life and I&rsquo;m a massive foodie.</p>', 1, '2016-06-17 10:30:08', '2016-07-04 05:45:10'),
(4, 'Dzhani Mehmad', '44.jpg', '<p>I have a degree in Psychology, and hope to do a Masters Degree in order to become a Psychologist.&nbsp; At the Buzzz Hub I am a session leader and it has been an amazing opportunity to put into practice everything I have learnt in my Psychology degree.&nbsp; I probably most enjoy leading the Gaming Night and IT sessions, because they enable me to mix my hobbies and work together.</p>\r\n<p>Outside of work I enjoy fishing, scuba diving and gaming.</p>\r\n<p>I ride my bicycle to most places and love having it as a way of keeping fit and healthy. I&rsquo;m a vegan so health and nutrition are big aspects of my life and I&rsquo;m a massive foodie.</p>', 1, '2016-06-17 10:30:33', '2016-07-01 05:32:16');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created`, `modified`) VALUES
(1, 'books', 1, '2016-10-25 17:56:00', '2016-10-26 06:06:36'),
(2, 'new', 1, '2017-01-01 16:03:02', '2017-01-01 16:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `summary` text,
  `category_id` int(11) NOT NULL,
  `sitelink_id` varchar(300) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `name`, `image`, `summary`, `category_id`, `sitelink_id`, `status`, `created`, `modified`) VALUES
(1, 'First Collection', 'ttttttttttttttt', 'teststststs', 1, '1', 1, '2017-01-01 17:01:52', '2017-01-01 17:05:28'),
(2, 'First Collection', 'ttttttttttttttt', 'teststststs', 1, '1,2', 1, '2017-01-01 17:03:39', '2017-01-01 17:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `status`, `created`, `modified`) VALUES
(1, 'india', 1, '2016-10-25 17:51:41', '2016-10-26 06:06:06'),
(2, 'pakistan', 1, '2016-10-26 04:56:56', '2016-10-26 05:47:50'),
(3, 'sri lanka', 1, '2016-10-26 05:48:23', '2016-10-26 05:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `fields` text NOT NULL,
  `from` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `title`, `subject`, `message`, `fields`, `from`, `created`, `modified`) VALUES
(2, 'AdminForgotPassword', 'Password Reset Request', '<p>Dear, [NAME]</p>\r\n<p>Please click on link given below to reset your password<br /> <a href="[RESET-CODE-LINK]">Click Here</a><br /> <br /> If you are not able to click the above link directly, please copy the link and paste in your browser''s address bar.<br /> [RESET-CODE-LINK]<br /> <br /> Best Wishes,<br /> <strong style="color: #333333; font-family: sans-serif, Arial, Verdana, ''Trebuchet MS''; font-size: 13px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 20.7999992370605px; orphans: auto; text-align: -webkit-left; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><img src="http://dothejob.in/frontier/uploads/logo2.jpg" alt="" width="162" height="46" /></strong></p>', '[NAME],[RESET-CODE-LINK],[SITEURL]', 'admin@gmail.com', '2014-10-31 08:39:41', '2016-01-19 09:42:49'),
(12, 'bbbbbbb', 'bbbbjjjjjj', '<p>ljkhlkj</p>', '', 'virender.saini@planetwebsolution.com', '2015-12-24 09:52:42', '2015-12-24 09:52:42');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_type_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `event_date` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `all_day` tinyint(1) NOT NULL DEFAULT '0',
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Scheduled',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_type_id`, `title`, `details`, `start`, `end`, `event_date`, `all_day`, `status`, `active`, `created`, `modified`) VALUES
(44, 0, 'demo', 'demo', '2016-07-15 13:15:00', '2016-07-16 19:00:00', '2016-07-15 13:15:00 to 2016-07-16 19:00:00', 0, 'Scheduled', 1, '2016-07-15', '2016-07-15'),
(32, 0, 'bbvvvvvvv', 'bbvvvvvvvvvvvvvvvvvvvvvvvvvvvv', '2016-01-20 22:00:00', '2016-01-21 09:00:00', '2016-01-20 22:00:00 to 2016-01-21 09:00:00', 0, 'Scheduled', 1, '2016-01-19', '2016-01-19'),
(30, 0, 'test', 'testtesttesttesttesttesttest', '2016-01-21 06:00:00', '2016-01-21 23:00:00', '2016-01-21 06:00:00 to 2016-01-21 23:00:00', 0, 'Scheduled', 1, '2016-01-14', '2016-01-20'),
(31, 0, 'vvvv', 'vvvvvvv', '2016-01-21 00:00:00', '2016-01-21 23:00:59', '2016-01-21 00:00:00 to 2016-01-21 23:00:59', 0, 'Scheduled', 1, '2016-01-19', '2016-01-21'),
(29, 0, 'test event', 'test event details', '2016-01-20 21:00:00', '2016-01-20 23:00:59', '2016-01-20 21:00:00 to 2016-01-20 23:00:59', 0, 'Scheduled', 1, '2016-01-14', '2016-01-19'),
(37, 0, 'Republic day function in year 2016', 'Republic day function in year 2016 Republic day function in year 2016... ', '2016-01-27 15:00:00', '2016-01-27 23:59:59', '2016-01-27 15:00:00 to 2016-01-27 23:59:59', 0, 'Scheduled', 1, '2016-01-21', '2016-01-27'),
(38, 0, 'final test', 'final testfinal testfinal testfinal test', '2016-01-22 06:00:00', '2016-01-22 23:00:59', '2016-01-22 06:00:00 to 2016-01-22 23:00:59', 0, 'Scheduled', 1, '2016-01-21', '2016-01-21'),
(39, 0, 'test event in Feb', 'test event in Feb test event in Feb test event in Feb test event in Feb test event in Feb test event in Feb', '2016-01-29 10:00:00', '2016-02-05 19:30:00', '2016-01-29 10:00:00 to 2016-02-05 19:30:00', 0, 'Scheduled', 1, '2016-01-21', '2016-07-15'),
(40, 0, 'Meeting with Shefali', 'At PWS discussing Frontier Siupport', '2016-01-22 14:00:00', '2016-01-22 16:59:00', '2016-01-22 14:00:00 to 2016-01-22 16:59:00', 0, 'Scheduled', 1, '2016-01-22', '2016-01-22'),
(41, 0, 'Redcap meeting on FS', 'Meeting with Shefali', '2016-02-08 10:00:00', '2016-02-08 11:59:59', '2016-02-08 10:00:00 to 2016-02-08 11:59:59', 0, 'Scheduled', 1, '2016-01-22', '2016-01-22'),
(42, 0, 'gdfg', 'dfgdfgdf', '2016-03-03 00:00:00', '2016-03-03 23:59:59', '2016-03-03 00:00:00 to 2016-03-03 23:59:59', 0, 'Scheduled', 1, '2016-03-03', '2016-03-03'),
(43, 0, 'sdfsd', 'fsfdsf', '2016-03-03 00:00:00', '2016-03-03 23:59:59', '2016-03-03 00:00:00 to 2016-03-03 23:59:59', 0, 'Scheduled', 1, '2016-03-03', '2016-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE `event_types` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `page_id`, `question`, `description`, `status`, `created`) VALUES
(6, 19, 'Are they safe?', '<p><strong class="safe-title">Safe : </strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2016-01-13 06:58:20'),
(7, 19, 'Are they effective?', '<p><strong class="safe-title">Effective : </strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2016-01-13 06:58:42'),
(8, 19, 'Are they caring?', '<p><strong class="safe-title">Caring : </strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2016-01-13 06:58:57'),
(9, 19, 'Are they responsive to people''s needs?', '<p><strong class="safe-title">Responsive : </strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2016-01-13 06:59:11'),
(10, 19, 'Are they well-led?', '<p><strong class="safe-title">Well-led : </strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2016-01-13 07:36:01'),
(11, 18, 'Case Study 1 ', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2016-02-02 12:55:30'),
(14, 18, 'Case Study 4', '<p>test</p>', 0, '2016-02-02 12:55:08'),
(12, 18, 'Case Study 2', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2016-01-29 05:45:44'),
(13, 18, 'Case Study 3', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2016-01-14 05:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(500) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `job_category_id` int(10) NOT NULL,
  `job_upload_id` int(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `cv_upload` varchar(100) NOT NULL,
  `comments` text NOT NULL,
  `company` varchar(255) NOT NULL,
  `request` tinyint(1) NOT NULL DEFAULT '0',
  `newsletter` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `email`, `job_category_id`, `job_upload_id`, `phone`, `cv_upload`, `comments`, `company`, `request`, `newsletter`, `created`, `modified`) VALUES
(149, 'avinesh', 'avineshmathur@gmail.com', 4, 0, '1234567890', '70d5373f52a78780ccb8b4a0204da4da1464870590.docx', 'test', '', 0, 0, '2016-06-02 12:29:50', '2016-06-02 12:29:50'),
(150, 'avinesh', 'avineshmathurhuj@gmail.com', 5, 0, '1234567890', '836bb69bfc3ca4496148646fca0cc4451464871243.docx', 'test', '', 0, 0, '2016-06-02 12:40:43', '2016-06-02 12:40:43'),
(147, 'sagar', 'sagar@gmail.com', 6, 0, '0123456789', '384cff0f0b2967ed14a7d05ceabfce081459146518.pdf', 'Hello ', '', 1, 0, '2016-03-28 06:28:38', '2016-03-28 06:28:38'),
(148, 'jjkj', 'kjhkhjk@ghfg.jghjh', 1, 0, '1234567890', '', 'khjkhj', 'khjhjkhjkhjkhjkhj', 1, 1, '2016-06-01 12:11:45', '2016-06-01 12:11:45'),
(151, 'avinesh', 'avinesh1mathur@gmail.com', 6, 0, '1234567890', 'f6cc990f42228353f4cf59e1abfe77c81464871468.docx', 'test', '', 0, 0, '2016-06-02 12:44:28', '2016-06-02 12:44:28'),
(152, 'avinesh', 'avineshmathur2@gmail.com', 1, 0, '1234567890', '', 'a', 'test', 1, 1, '2016-06-02 12:47:28', '2016-06-02 12:47:28'),
(153, 'avinesh', 'avineshmathur3@gmail.com', 1, 0, '1234567890', '', 'test', 'test', 0, 0, '2016-06-02 12:50:10', '2016-06-02 12:50:10'),
(154, 'test', 'avineshmathur3@gmail.com', 1, 0, '', '', '', '', 0, 0, '2016-06-02 12:59:49', '2016-06-02 12:59:49'),
(155, 'test', 'avineshmathur3@gmail.com', 1, 0, '0123456789', '', '', 'test', 0, 0, '2016-06-02 13:15:44', '2016-06-02 13:15:44'),
(156, 'Sagar', 'aaaaaaaaaa@aaaa.aaa', 1, 0, '', '', '', '', 0, 0, '2016-06-03 04:50:10', '2016-06-03 04:50:10'),
(157, 'uuuuu', 'uuuuuuuuu@uuuu.uuu', 2, 0, '1111111111', '', '', '', 1, 0, '2016-06-03 05:06:05', '2016-06-03 05:06:05'),
(158, 'fff', 'fffffffffffF@ffffff.ffff', 3, 0, '5555555555', '', 'dsadadasdad', 'dsadsaa', 1, 1, '2016-06-03 05:06:40', '2016-06-03 05:06:40'),
(159, 'lalit', 'lalit@gmail.com', 2, 0, '8787878787', '', 'test', 'abc', 0, 0, '2016-06-10 06:41:36', '2016-06-10 06:41:36'),
(160, 'tyty', 'tyty@gmail.com', 1, 0, '8787878787', '', 'testtt', 'ABC', 0, 0, '2016-06-10 06:43:38', '2016-06-10 06:43:38'),
(161, 'yuyuyu', 'yuyuyu@gmail.com', 3, 0, '8787878787', '', 'test', 'MNB', 1, 1, '2016-06-10 06:44:39', '2016-06-10 06:44:39'),
(162, 'uiuiui', 'lalitmangal2005@gmail.com', 1, 0, '8787878787', '', 'test comments', 'test abc', 1, 1, '2016-06-10 07:18:10', '2016-06-10 07:18:10'),
(164, 'sagar', 'sagar@gmail.com', 2, 0, '1478545896', '', 'hello', 'Sagar', 1, 1, '2016-06-10 12:25:26', '2016-06-10 12:25:26'),
(165, 'test name', 'testname@gmail.com', 1, 0, '8787878787', '', 'test comments', 'test com', 1, 1, '2016-06-10 13:31:28', '2016-06-10 13:31:28'),
(166, 'rtret', 'erteret@rete.com', 2, 0, '', '', '', '', 0, 0, '2016-06-10 13:32:11', '2016-06-10 13:32:11'),
(167, 'ertreretret', 'ertetret@eewr.com', 1, 0, '8787878787', '', '', 'test abc', 0, 0, '2016-06-10 13:33:06', '2016-06-10 13:33:06'),
(168, 'lalit', 'lalit@planetwebsolution.com', 5, 0, '9898989898', '00cd7c3f27a090aac419cca0825409a61465886273.pdf', 'test comments', '', 0, 0, '2016-06-14 06:37:53', '2016-06-14 06:37:53'),
(172, 'ddddddd', 'ffdfdfdsf@ssss.sss', 6, 0, '1111444447', '70551b47540bcccc2dba0dac113e26801468573122.docx', 'fsdfdsfdsfSDFs', '', 1, 0, '2016-07-15 08:58:42', '2016-07-15 08:58:42'),
(171, 'Alka', 'alkabagga@yahoo.com', 1, 0, '0798911233', '', 'Alka testing GE', 'CMC', 1, 1, '2016-07-01 10:19:53', '2016-07-01 10:19:53'),
(173, 'ddddddd', 'ffdfdfdsf@ssss.sss', 6, 0, '1111444447', 'a1cabc772a2f9c457b1805f1a71a6f201468573332.docx', 'fsdfdsfdsfSDFs', '', 1, 0, '2016-07-15 09:02:12', '2016-07-15 09:02:12'),
(174, 'ddddddd', 'ffdfdfdsf@ssss.sss', 6, 0, '1111444447', 'ed913c1e0c2ec322325062f2c8b1860a1468573354.docx', 'fsdfdsfdsfSDFs', '', 1, 0, '2016-07-15 09:02:34', '2016-07-15 09:02:34'),
(175, 'ddddddd', 'ffdfdfdsf@ssss.sss', 6, 0, '1111444447', '55d6bc8b8ce7ca1f5b7c728748294e911468573405.docx', 'fsdfdsfdsfSDFs', '', 1, 0, '2016-07-15 09:03:25', '2016-07-15 09:03:25'),
(176, 'ddddddd', 'ffdfdfdsf@ssss.sss', 6, 0, '1111444447', '69fd80deb47d096360e7b174631693c21468573528.docx', 'fsdfdsfdsfSDFs', '', 1, 0, '2016-07-15 09:05:28', '2016-07-15 09:05:28'),
(177, 'sagar', 'sagar@gmail.com', 4, 0, '1111555528', 'f037a2220fa8145d2695cffe813d1ee71468573896.docx', 'saddasdsdsasd', '', 1, 0, '2016-07-15 09:11:36', '2016-07-15 09:11:36'),
(178, 'sagar', 'sagar@gmail.com', 4, 0, '1111555528', 'c9b9d6445ba7c789f931217c953cab121468573923.docx', 'saddasdsdsasd', '', 1, 0, '2016-07-15 09:12:03', '2016-07-15 09:12:03'),
(179, 'sagar', 'sagar@gmail.com', 4, 0, '1111555528', 'a02441207f355e07f169043516a19baf1468573954.docx', 'saddasdsdsasd', '', 1, 0, '2016-07-15 09:12:34', '2016-07-15 09:12:34'),
(180, 'sagar', 'sagar@gmail.com', 6, 0, '1111444476', '2ab5d9db37ab926a94863a5e56b2fe0f1468574008.docx', 'dsadsadasdsad', '', 1, 0, '2016-07-15 09:13:28', '2016-07-15 09:13:28'),
(181, 'sagar', 'sagar@gmail.com', 6, 0, '1111444476', '85948dea34a2d219c4a2b9dc5bb898471468574175.docx', 'dsadsadasdsad', '', 1, 0, '2016-07-15 09:16:15', '2016-07-15 09:16:15'),
(182, 'sagar', 'sagar@gmail.com', 6, 0, '1111444476', '187db350fc9317357a64dd94450f86d01468574210.docx', 'dsadsadasdsad', '', 1, 0, '2016-07-15 09:16:50', '2016-07-15 09:16:50'),
(183, 'demo', 'demo@gmail.com', 5, 0, '1111444476', 'eb5a05a7a185cb72c9ef7da3d97cf3a01468574494.doc', 'demiakadbsajd d ksabdksa bdsakd', '', 1, 0, '2016-07-15 09:21:34', '2016-07-15 09:21:34'),
(184, 'demo', 'demo@gmail.com', 5, 0, '1111444476', '4c0be1f4cb757628ebc590ccfe3d50ae1468574636.docx', 'demiakadbsajd d ksabdksa bdsakd', '', 1, 0, '2016-07-15 09:23:56', '2016-07-15 09:23:56'),
(185, 'demo', 'demo@gmail.com', 5, 0, '1111444476', '5c81ca1603fc6ee4ae3742853683a0e41468574706.docx', 'demiakadbsajd d ksabdksa bdsakd', '', 1, 0, '2016-07-15 09:25:06', '2016-07-15 09:25:06'),
(186, 'sssssssssssssssss', 'dasasaaa@asdsaa.aaa', 6, 0, '1111111111', 'e0f32b08556903f9e684693a6e4ba0311468577888.docx', 'ddsadasdasd', '', 1, 0, '2016-07-15 10:18:08', '2016-07-15 10:18:08'),
(187, 'sssssssssssssssss', 'dasasaaa@asdsaa.aaa', 6, 0, '1111111111', 'a010231071632f533e18b5be1679e8d51468577927.docx', 'ddsadasdasd', '', 1, 0, '2016-07-15 10:18:47', '2016-07-15 10:18:47'),
(188, 'sssssssssssssssss', 'dasasaaa@asdsaa.aaa', 6, 0, '1111111111', '274c915e1fd4fa3870e59482ff96a4f31468577966.docx', 'ddsadasdasd', '', 1, 0, '2016-07-15 10:19:26', '2016-07-15 10:19:26'),
(189, 'sssssssssssss', 'ssddsasd@adadsaas.aaa', 5, 0, '1111444475', '1ba3b98c7e3ce2ad1bbbc92c9dbdcb5f1468578228.docx', 'daasdassaasdada', '', 1, 0, '2016-07-15 10:23:48', '2016-07-15 10:23:48'),
(190, 'sssssssssssss', 'ssddsasd@adadsaas.aaa', 5, 0, '1111444475', 'cc84bf836907978da33bcce2bbb01d241468578350.docx', 'daasdassaasdada', '', 1, 0, '2016-07-15 10:25:50', '2016-07-15 10:25:50'),
(191, 'sssssssssssss', 'ssddsasd@adadsaas.aaa', 5, 0, '1111444475', '66a7a50365a551a3b1925da5f050931f1468578430.docx', 'daasdassaasdada', '', 1, 0, '2016-07-15 10:27:10', '2016-07-15 10:27:10'),
(192, 'sagar', 'sager@jajoriya.com', 6, 0, '1234567892', 'a30700f3ae15e75184a9c3b6c98bd37b1468913101.pdf', 'asdsdsadsdsa', '', 1, 0, '2016-07-19 07:25:01', '2016-07-19 07:25:01'),
(193, 'sagar', 'sagar@gggg.sss', 4, 0, '1447774412', '239c69f1020e2e27472cb540f59c72121468913190.pdf', 'dsadasdsadas', '', 1, 0, '2016-07-19 07:26:30', '2016-07-19 07:26:30'),
(194, 'adsdsds', 'dadsadsdsa@sdasdsada.aaa', 6, 0, '1444222269', '6c72feba05acfefa6d807d6afc93a02b1468913770.pdf', 'adsadsadsadsad', '', 1, 0, '2016-07-19 07:36:10', '2016-07-19 07:36:10'),
(195, 'adsaadasd', 'adasdasd@adsadsadsad.aaa', 5, 0, '2222555548', 'c2c4137bcc8433f0865656b012cd3a9f1468913840.doc', 'sadsadasdsadasd', '', 1, 0, '2016-07-19 07:37:20', '2016-07-19 07:37:20'),
(196, 'dsaddsad', 'adsadsad@sadsadsdsa.aaa', 4, 0, '1255587489', '60d0ffbede0b19383b3810e0995f45f81468920908.docx', 'asdasdasd', '', 1, 0, '2016-07-19 09:35:08', '2016-07-19 09:35:08'),
(197, 'dsaddsad', 'dasddsadad@adadada.aaa', 4, 0, '1111222258', '2f50e857f19b0dc464784565d588600a1468921028.docx', 'sadsadsadsa', '', 1, 0, '2016-07-19 09:37:08', '2016-07-19 09:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `name`) VALUES
(1, 'General Enquiry'),
(2, 'Clinical Enquiry'),
(3, 'Buzzz Enquiry'),
(4, 'Care & Support'),
(5, 'Supported Employment'),
(6, 'Other Positions'),
(7, 'Graduate Opportunity');

-- --------------------------------------------------------

--
-- Table structure for table `job_uploads`
--

CREATE TABLE `job_uploads` (
  `id` int(10) NOT NULL,
  `job_category_id` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_uploads`
--

INSERT INTO `job_uploads` (`id`, `job_category_id`, `title`, `description`, `status`, `created`) VALUES
(2, '4', 'Care & Support', '<p>If you are enthusiastic, motivated and able to cope with demanding work with a positive, responsible and caring attitude then we&rsquo;d like to hear from you.</p>\r\n<p>You&rsquo;ll be expected to contribute towards the provision of a supportive, caring, environment within a framework that promotes anti-discriminatory practice and encourages independence with equal recognition of each individual''s rights, personal beliefs and choice, following the National Care Standards and FS Codes of Practise. You will support individuals using a person centred approach as detailed in the personal plan.</p>', 1, '2016-02-01 07:38:38'),
(5, '5', 'Supported Employment', '<p>Supported employment is part of our employment initiative designed to involve vulnerable adults in the society. It is dedicated to train employers about the learning profile of people with mental health issues, learning disabilities and other related issues. The project provides a structured programme of support for both employer and prospective employee.</p>', 1, '2016-02-01 07:41:01'),
(8, '6', 'Other Positions', '<p>If the job that you are looking for is not advertised on our website please do not hesitate to post your CV anyway. We might not have something today, but we may have a great opportunity tomorrow.</p>', 1, '2016-02-03 10:47:10'),
(9, '7', 'Graduate Opportunity', '<p><span>If the job that you are looking for is not advertised on our website please do not hesitate to post your CV anyway. We might not have something today, but we may have a great opportunity tomorrow.</span></p>', 1, '2016-08-22 09:41:25');

-- --------------------------------------------------------

--
-- Table structure for table `metas`
--

CREATE TABLE `metas` (
  `id` int(11) NOT NULL,
  `alias` varchar(32) DEFAULT NULL,
  `model` varchar(32) DEFAULT NULL,
  `foreign_key` int(11) NOT NULL DEFAULT '0',
  `controller` varchar(32) DEFAULT NULL,
  `action` varchar(64) DEFAULT NULL,
  `title` varchar(60) NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `created` mediumint(9) NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metas`
--

INSERT INTO `metas` (`id`, `alias`, `model`, `foreign_key`, `controller`, `action`, `title`, `keywords`, `description`, `created`, `updated`) VALUES
(15, NULL, 'Page', 15, NULL, NULL, '', '', '', 8388607, '2016-08-22 12:55:58'),
(16, NULL, 'Page', 16, NULL, NULL, 'Disability Care Providers | Frontier Support Services', '', 'We provide expert care and support for vulnerable young people, adults and families who face extremely challenging circumstances.', 8388607, '2016-09-23 12:25:37'),
(17, NULL, 'Page', 17, NULL, NULL, 'What We Do', '', '', 8388607, '2016-07-07 04:31:44'),
(18, NULL, 'Page', 18, NULL, NULL, 'Specialist Services', '', '', 8388607, '2016-06-02 09:46:46'),
(19, NULL, 'Page', 19, NULL, NULL, 'Quality Assurance', '', '', 8388607, '2016-07-27 05:18:36'),
(20, NULL, 'Page', 20, NULL, NULL, 'Registered Providers', '', '', 8388607, '2016-09-05 13:06:00'),
(21, NULL, 'Page', 21, NULL, NULL, 'Our Testimonials', '', '', 8388607, '2016-06-23 13:01:12'),
(22, NULL, 'Page', 22, NULL, NULL, 'Meet Our Team', '', '', 8388607, '2016-07-01 09:16:28'),
(23, NULL, 'Page', 23, NULL, NULL, 'Come Join Us', '', '', 8388607, '2016-08-05 07:02:04'),
(24, NULL, 'Page', 24, NULL, NULL, 'Just Contact Us', '', '', 8388607, '2016-06-14 06:16:41'),
(25, NULL, 'Page', 25, NULL, NULL, 'Buzz Hub header video', '', '', 8388607, '2016-08-05 07:01:04'),
(26, NULL, 'Page', 26, NULL, NULL, 'Buzz Hub', '', '', 8388607, '2016-06-17 10:49:57'),
(27, NULL, 'Page', 27, NULL, NULL, 'Buzz Team', '', '', 8388607, '2016-06-17 10:31:31'),
(28, NULL, 'Page', 28, NULL, NULL, 'Buzz Brokerage', '', '', 8388607, '2016-08-04 08:35:46'),
(31, NULL, 'Page', 31, NULL, NULL, 'Caring for Disabled Adults | Frontier Support Services', '', 'We provide specialist care and support to vulnerable adults with Learning Disabilities, Autism, Aspergers, Epilepsy, Mental Health conditions.', 8388607, '2016-08-04 06:49:19'),
(38, NULL, 'Page', 38, NULL, NULL, '', '', '', 8388607, '2016-02-03 10:05:07'),
(37, NULL, 'Page', 37, NULL, NULL, '', '', '', 8388607, '2016-02-03 10:04:57'),
(36, NULL, 'Page', 36, NULL, NULL, '', '', '', 8388607, '2016-02-03 10:04:43'),
(35, NULL, 'Page', 35, NULL, NULL, 'Buzz Membership', '', '', 8388607, '2016-02-08 09:26:17'),
(39, NULL, 'Page', 39, NULL, NULL, '', '', '', 8388607, '2016-02-04 06:40:39'),
(40, NULL, 'Page', 40, NULL, NULL, '', '', '', 8388607, '2016-02-04 06:43:38'),
(41, NULL, 'Page', 41, NULL, NULL, '', '', '', 8388607, '2016-02-04 06:42:15'),
(42, NULL, 'Page', 42, NULL, NULL, '', '', '', 8388607, '2016-03-03 06:20:37');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `role_id` varchar(50) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `role_id`, `title`, `slug`, `banner_image`, `short_description`, `description`, `status`, `created`, `modified`) VALUES
(15, NULL, 'Frontier Support home page header', 'frontier-home', '', '', '<p><iframe src="https://www.youtube.com/embed/SuyD7Z7AseM?rel=0" width="100%" height="368" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>\r\n<p>At Frontier Support we&rsquo;ve been providing specialist care and support to vulnerable adults in London and the South East since 2006. Our clients have a variety of needs including Learning Disabilities, Autism, Aspergers, Epilepsy, Mental &amp; Physical Health issues and Challenging Behaviour. We provide domiciliary care in the clients&rsquo; homes and also support them out in the community.</p>\r\n<p>&nbsp;</p>\r\n<p>We love what we do and our aim is to enable our clients to live active and socially inclusive lives incorporating routines, hobbies and learning of their choosing. These might include life skills such as managing their own money, cooking and doing their food shopping or perhaps taking part in a weekly club or class or even getting to the cinema.</p>\r\n<p>&nbsp;</p>\r\n<p>We are registered with the Care and Quality Commission as a Domiciliary Care Provider and we are experts in care and support for vulnerable adults. <strong>We were last inspected in 2016 and have been rated as Good; although we have appealed this as we would genuinely consider the service we deliver to be outstanding</strong>. We are not a Franchise or an Agency and all our support workers are employed directly by us. (Which makes for a happy team)&nbsp;</p>', 1, '2016-01-06 10:54:29', '2016-08-22 12:55:58'),
(16, NULL, 'Who We Are', 'who-we-are', '1a22cf119c06cada3af5a20dae5851de1467867154.jpg', '', '<p>Frontier Support was founded by a team of just five in 2006 to provide specialist care and support to vulnerable adults with a variety of needs including Learning Disabilities, Autism, Aspergers, Epilepsy, Mental &amp; Physical Health issues and Challenging Behaviour.</p>\r\n<p>Today, we have over 130 wonderful staff spread across support work, clinical care, supervision and management. The Frontier Support team is well established and comprised of skilled and caring professionals at every level. We are registered with the Care and Quality Commission (CQC) as a Domiciliary Care Provider. As we are not a Franchise or an Agency all our support workers are employed directly by us.</p>\r\n<p>As a company we have a clear structure that ensures our staff are best placed to deliver quality care to our clients whilst the support functions and management team (overseen by our Board) provide all the relevant checks and measures and continue to drive the business forward.</p>\r\n<p>We have an extremely robust staff training programme which ensures that our team members have all the tools required to help our clients live active and socially inclusive lives.</p>', 1, '2016-01-06 12:50:43', '2016-09-23 12:25:37'),
(17, NULL, 'What We Do', 'what-we-do', '0c05f4309d2ba71a8567d634ae2f40d61467865904.jpg', '', '<p>The care we provide at Frontier Support enables our clients to live active and socially inclusive lives incorporating routines, hobbies and learning of their choosing. We support them through domiciliary care in their homes and out in the community.</p>\r\n<p>The number of support hours is determined by the needs of the individual client. This can be anything from a few hours each week to care 24 hours a day. We are registered with the Care and Quality Commission (CQC) as a Domiciliary Care Provider and we&rsquo;re experts in care and support for vulnerable adults.</p>\r\n<p>We can help vulnerable adults struggling with a range of challenges.</p>', 1, '2016-01-06 13:02:41', '2016-07-07 04:31:44'),
(18, NULL, 'Special Services', 'specialist-services', '7fe95b7e5a6b64b0e21883afd47eab651452227570.jpg', 'We are flattered to have had some lovely people say some wonderful things about Frontier Support over the years. Some of those people are clients, some are families of clients, others are professionals that weâ€™ve worked alongside', '<div class="article-col">\r\n<div class="common-title">\r\n<h3>Specialist Services</h3>\r\n</div>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen.</p>\r\n</div>\r\n<div class="article-col">\r\n<div class="common-title">\r\n<h3>NAPPI</h3>\r\n</div>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n</div>\r\n<div class="article-col">\r\n<div class="common-title">\r\n<h3>BILD</h3>\r\n</div>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen.</p>\r\n</div>\r\n<div class="QA-banner margin-bot-50">\r\n<figure class="QA-banner-col"><img class="radius-3px" src="http://dothejob.in/frontier/uploads/services2.jpg" alt="" width="831" height="280" /></figure>\r\n</div>', 1, '2016-01-07 06:14:52', '2016-06-02 09:46:46'),
(19, NULL, 'Quality Assurance', 'quality-assurance', 'f54f1669c582a1a887c2ee8355e5646b1452227658.jpg', 'As a provider of care and support that may require helping people with their personal care we are required to be registered with the Care and Quality Commission, commonly known as CQC.', '<div class="article-col">\r\n<div class="common-title">\r\n<h3>Quality Assurance</h3>\r\n</div>\r\n<p>As a provider of care and support that may require helping people with their personal care we are required to be registered with the Care and Quality Commission, commonly known as CQC.</p>\r\n<p>More information about meeting the required standards can be found at www.cqc.org.uk To find information about our last inspection search in services in your home and then enter our company name or the following postcode CR2 6EB.</p>\r\n</div>\r\n<div class="QA-banner margin-bot-50">\r\n<div class="QA-banner-title">\r\n<div class="QA-banner-title-inner"><em>In addition to inspection by CQC we use the following to help obtain information about how we are performing :</em>\r\n<div class="right-curve">&nbsp;</div>\r\n<div class="left-curve">&nbsp;</div>\r\n</div>\r\n</div>\r\n<figure class="QA-banner-col"><img class="radius-3px" src="http://dothejob.in/frontier/uploads/care.jpg" alt="" width="831" height="280" /></figure>\r\n<div class="QA-banner-content">\r\n<ul>\r\n<li>Surveys</li>\r\n<li>Critical friend reviews ( people external to the company who provide us with an independent view.)</li>\r\n<li>Talking to our clients and relatives directly</li>\r\n<li>Feedback from professionals</li>\r\n<li>Review of complaints and complements</li>\r\n<li>Reviewing other data available to us</li>\r\n<li>Feedback from care and support staff</li>\r\n</ul>\r\n</div>\r\n</div>', 1, '2016-01-07 09:13:42', '2016-07-27 05:18:36'),
(20, NULL, 'Registered Providers', 'our-partners', 'bcb2e7b9e256a802688d272d721380181452227527.jpg', 'We are approved providers within a commissioning framework for a number of London boroughs but can work with all other local authorities under a spot purchasing agreement.', '<div class="partner-panel margin-bot-30 radius-3px">\r\n<figure><a href="http://www.lambeth.gov.uk" target="_blank"><img src="http://dothejob.in/frontier/uploads/partner-logo1.jpg" alt="" width="158" height="138" /></a></figure>\r\n<div class="partner-content"><a href="http://www.lambeth.gov.uk" target="_blank">www.lambeth.gov.uk</a></div>\r\n</div>\r\n<div class="partner-panel margin-bot-30 radius-3px">\r\n<figure><a href="http://www.croydon.gov.uk" target="_blank"><img src="http://dothejob.in/frontier/uploads/croydon.jpg" alt="" width="158" height="138" /></a></figure>\r\n<div class="partner-content"><a href="http://www.croydon.gov.uk" target="_blank">www.croydon.gov.uk</a></div>\r\n</div>\r\n<div class="partner-panel margin-bot-30 radius-3px">\r\n<figure><a href="http://www.wandsworth.gov.uk" target="_blank"><img src="http://dothejob.in/frontier/uploads/wandsworth.jpg" alt="" width="158" height="138" /></a></figure>\r\n<div class="partner-content"><a href="http://www.wandsworth.gov.uk" target="_blank">www.wandsworth.gov.uk</a></div>\r\n</div>\r\n<div class="partner-panel margin-bot-30 radius-3px">\r\n<figure><a href="http://www.Southwark.gov.uk"><img src="http://dothejob.in/frontier/uploads/southwark.jpg" alt="" width="158" height="138" /></a></figure>\r\n<div class="partner-content"><a href="http://www.Southwark.gov.uk">www.Southwark.gov.uk</a>&nbsp;</div>\r\n</div>\r\n<div class="partner-panel margin-bot-30 radius-3px">\r\n<figure><a href="http://www.lewisham.gov.uk/pages/default.aspx" target="_blank"><img src="http://dothejob.in/frontier/uploads/60.tmp.15590.0_1.gif" alt="" width="160" height="158" /></a></figure>\r\n<div class="partner-content"><a href="http://www.lewisham.gov.uk/pages/default.aspx" target="_blank">www.lewisham.gov.uk/pages/default.aspx</a></div>\r\n</div>', 1, '2016-01-07 10:29:49', '2016-09-05 13:06:00'),
(21, NULL, 'Our Testimonials', 'testimonials', 'e46b5bf6db4bb381d6929482ee8594ad1466686872.jpg', 'We are flattered to have had some lovely people say some wonderful things about Frontier Support over the years. Some of those people are clients, some are families of clients, others are professionals that weâ€™ve worked alongside.', '<p>We are flattered to have had some lovely people say some wonderful things about Frontier Support over the years. Some of those people are clients, some are families of clients, others are professionals that we&rsquo;ve worked alongside. Here&rsquo;s a selection of their kind words:</p>', 1, '2016-01-07 11:00:41', '2016-06-23 13:01:12'),
(22, NULL, 'Meet Our Team', 'our-team', 'e6568be61641aba4d8350697d089cae81465365404.jpg', '', '<p style="line-height: 26px;">We&rsquo;re extremely proud of the Frontier Support team. We&rsquo;ve been growing this group of dedicated and caring professionals since 2006 and we believe in rewarding their hard work with continuous investment in training and development. We couldn&rsquo;t possibly feature all 130 of them here so here&rsquo;s a small selection to showcase the calibre of our people across the various disciplines within the company.</p>', 1, '2016-01-07 13:34:11', '2016-07-01 09:16:28'),
(23, NULL, 'Come Join Us', 'job-with-us', 'ea9c73d38579da36ce4cf066d9bb97381465365489.jpg', '', '<p>Frontier Support Services is a growing organisation and we are happy to receive CVs from candidates wishing to be considered for a role with us.</p>\r\n<p>It&rsquo;s great if you have experience in the Care industry but it&rsquo;s not a requirement &ndash; the most important thing for us is to employ people with the right personal qualities who will see our clients as individuals and who can be part of our drive to empower them to live full and socially inclusive lives.</p>\r\n<p>That&rsquo;s why the members of our team have joined us from a wide range of backgrounds including a gas engineer, air hostess, firefighter, shop assistant, caf&eacute; owner and HGV driver.</p>\r\n<p>We believe in investing in our staff and actively support team members through a range of qualifications and training from achieving the new Care Certificate to specialist behaviour and management qualifications. All Frontier Support staff, regardless of contract hours, have the same opportunity to gain industry standard vocational and professional qualifications.</p>\r\n<p>We&rsquo;d also love to hear from people who are looking to do something fantastic with their gap year &ndash; perhaps before entering further education or a career in the public services. Our previous psychology graduates have gone on to work in the prison service and secondary school education and we have people go on to achieve successful nursing careers.</p>\r\n<p>Watch our short video to hear from some of the team about working at Frontier and some of the opportunities it has brought them.</p>\r\n<p><iframe class="video-frame" src="https://www.youtube.com/embed/6m6jomKw-Uo" width="100%" height="485" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>', 1, '2016-01-08 04:58:40', '2016-08-05 07:02:04'),
(25, NULL, 'Buzz Hub header video', 'buzz-video', '', '', '<p><iframe class="video-frame" src="https://www.youtube.com/embed/QT8ycwV5Af4" width="682" height="448" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>\r\n<p>The Buzzz Hub is our purpose designed environment in Croydon which provides a safe and welcoming space for people with Learning Disabilities, Asperger&rsquo;s, Autism, Challenging Behaviour, Physical Disabilities and Mental Health Issues.</p>\r\n<p>&nbsp;</p>\r\n<p>It&rsquo;s a place where people with special needs can be active and creative in a relaxed and supportive environment. People can come together to learn, develop skills and build relationships. We work with number of professionals and are looking to expand the services we provide.</p>\r\n<p>&nbsp;</p>\r\n<p>We currently offer Nutrition, IT &amp; Communications Workshop, Art Therapy and Massage &amp; Reflexology.</p>\r\n<p>&nbsp;</p>\r\n<p>We can accommodate groups of up to 10 including support staff and Frontier Support&rsquo;s Buzzz Hub is also available for hire. The purpose designed facilities include full wheelchair access, a sensory room, 65&rdquo; flat screen TV, kitchen facilities and a small meeting pod.</p>', 1, '2016-01-09 10:34:20', '2016-08-05 07:01:04'),
(26, NULL, 'Buzz Hub Home Page Content', 'buzz-home-page', '', 'The Buzzz Hub is our purpose designed environment in Croydon which provides a safe and welcoming space for people with Learning Disabilities, Aspergerâ€™s, Autism, Challenging Behaviour, Physical Disabilities and Mental Health Issues.', '', 1, '2016-01-09 10:51:39', '2016-06-17 10:49:57'),
(31, NULL, 'Frontier Support home page content', 'home-content', '', '', '<p>We have over 130 wonderful staff and we do our best to match support workers to our clients after fully assessing their needs. We&rsquo;re one of the few care providers to give staff permanent contracts and we encourage them all to seek professional qualifications. As a result, our staff turnover rate is far below the industry average, which means much better continuity of care and support for our clients.</p>\r\n<p>We&rsquo;re very proud to have a dedicated in-house trained clinical team with many years&rsquo; experience in the care and support field. Being able to call on this expertise rather than having to involve the NHS leads to faster decisions for the client and support that is much more responsive to their needs.</p>\r\n<p>The number of support hours each client receives is determined by their individual needs. It can be anything from a few hours each week to 24 hours a day. We are an Approved Care Provider for several London Boroughs and our services can be funded in a variety of ways:</p>\r\n<ul>\r\n<li>Social Care Funding</li>\r\n<li>Continuing NHS Care Funding</li>\r\n<li>Clients paying privately or using their Personal Independence Payments</li>\r\n</ul>\r\n<p>Our Head Office is in Croydon, where we also manage a purpose designed environment called the Buzzz Hub which provides a safe and welcoming space for vulnerable adults. We currently offer a range of workshops and can accommodate groups of up to 10 including support staff.</p>\r\n<p>In addition, our partnership with specialist housing provider, Zetetick Housing affords our clients a genuine choice of suitable accommodation in settings where they are not obliged to share. For some people this is often the first step in developing their independence.</p>', 1, '2016-01-12 05:48:22', '2016-08-04 06:49:19'),
(27, NULL, 'Buzz Team', 'buzz-team', '963bb6eea32caba613f3683bbc623dbe1454922557.jpg', '', '', 1, '2016-01-09 10:56:30', '2016-06-17 10:31:31'),
(24, NULL, 'Just Contact Us', 'contact-us', '41f40dbb455ffb256e72c95315d8d5801465365507.jpg', '', '', 1, '2016-01-08 05:12:21', '2016-06-14 06:16:41'),
(28, NULL, 'Buzz Brokerage', 'brokerage', 'beb2716e885ccbba76fd6322f913a1c81454993145.jpg', '', '<div class="common-title buzz-common-title">\r\n<h3>Buzzz Brokerage</h3>\r\n</div>\r\n<div class="brokerage-article">\r\n<p><img class="alignleft" src="http://dothejob.in/frontier/uploads/banner-1.jpg" alt="buzz brokerage-Disability care" width="250" height="200" />We are currently researching services that people would like to see in the Buzzz Hub. In the meantime, if you would like to take part in our existing sessions please get in touch.</p>\r\n<p>In addition, the Buzzz Hub facilities are also available for hire We can accommodate groups of up to 10 including support staff. The purpose designed facilities include full wheelchair access, a sensory room, 65&rdquo; flat screen TV, kitchen facilities and a small meeting pod.</p>\r\n</div>', 1, '2016-01-09 11:05:21', '2016-08-04 08:35:46'),
(35, NULL, 'Buzz Membership', 'buzz-membership', '343b1cab6d76608d8e08b2aa42b586971454923577.jpg', '', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s.</p>', 0, '2016-01-13 09:30:10', '2016-02-08 09:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `alias`, `created`, `updated`) VALUES
(1, 'Admin', 'admin', '2015-12-14 06:50:24', '2015-12-14 06:50:24'),
(2, 'FSCMS', 'FSCMS', '2015-12-14 06:50:37', '2015-12-14 06:50:37'),
(3, 'BHCMS', 'BHCMS', '2015-12-14 06:50:59', '2015-12-14 06:50:59'),
(20, 'demo', 'demo', '2016-06-15 10:28:51', '2016-06-15 10:28:51'),
(21, 'Fr', 'fr', '2016-07-20 05:00:17', '2016-07-20 05:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_description` longtext NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `image`, `short_description`, `description`, `status`, `created`, `modified`) VALUES
(12, 'Professionals', '6ffb825b2a1857abeb7b7d99ff35b0d21452086393.png', 'We are happy to receive referrals or have informal discussions regarding any areas of support for clients with a learning disability and additional needs.  Particularly those with high levels of support or wishing to return to borough.  Please call Lee Elkin on 07875 441464', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2016-01-06 13:19:53', '2016-06-09 07:55:27'),
(13, 'Families & Self Funders', '4dea860d2f5e60efd3ecfbc02ba7b74f1452086482.png', 'We are happy to work with families who have direct payments or personal independence payments.  We have a proven track record of working collaboratively with the families of our clients.  Please contact on Phil Coffey 07896 430884', '<p>Lorem ipsum dolor sit amet, consectetur adipisiciang elit. Ab quidem quam quo, commodi debitis et.Debitis porro libero delectus eligendi tempore expedita voluptates, nobis laboriosam odio iste, harum, accusantium, facilis</p>\r\n<p>Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper. Maecenas quis consequat libero, a feugiat eros.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab quidem quam quo, commodi debitis et. Debitis porro libero delectus eligendi tempore expedita voluptates, nobis laboriosam odio iste, harum, accusantium,Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe src="https://www.youtube.com/embed/cSTEB8cdQwo" width="830" height="448" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>', 1, '2016-01-06 13:21:22', '2016-06-14 07:44:32'),
(14, 'Autism', '02b522cb9b11a0dcc9fc49b69978891b1452086540.png', 'Specialist providers of 24 hour supported living for people with complex Autism.  Excellent track record where care & support relationships have previously broken down.  Also a unique relationship with Dr John Biddolph, Autism and Asperger Syndrome specialist.', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2016-01-06 13:22:20', '2016-05-27 10:23:09'),
(15, 'Transition', 'db7ed3bea5e0348bd2c6842a5135fa8d1452511900.png', 'Working with young vulnerable adults looking to move from, often, residential education to supported living.  Our strong clinical team and our partnership with specialist housing provider, Zetetik Housing, make us ideally equipped to help these clients.', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n<ul>\r\n<li>first</li>\r\n<li>second</li>\r\n</ul>\r\n<ol>\r\n<li>third</li>\r\n<li>fourth</li>\r\n</ol>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2016-01-11 11:31:40', '2016-05-27 10:23:26'),
(16, 'Aspergers', 'c40da056b343654a6e6ec6e49ae91b861452511975.png', 'Weâ€™ve built up an excellent team of staff experienced in Aspergerâ€™s support both in supported living and outreach settings.  We have a solid track record dating back to 2007 in sustaining consistent support.', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2016-01-11 11:32:55', '2016-05-27 10:23:43'),
(17, 'Learning Disability', 'e8a9bd3933c3f1b030f0510871d3be061452512029.png', 'Our excellent Clinical Team has helped to cement our reputation as a specialist provider to clients with a history of care and support relationships breaking down due to complex and enduring mental health issues.', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2016-01-11 11:33:49', '2016-05-27 10:24:01');
INSERT INTO `services` (`id`, `title`, `image`, `short_description`, `description`, `status`, `created`, `modified`) VALUES
(18, 'Challenging Behaviour', 'd44fb554405ce2fc87bb6179022286ac1452513502.png', 'We work with people who display culturally abnormal behaviour(s) of such intensity, frequency or duration that their physical safety is likely to be placed in jeopardy or their behaviour impacts their access to ordinary community facilities.', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2016-01-11 11:34:32', '2016-05-27 10:24:21'),
(19, 'Positive Behaviour Support', '2f917ba97b518dec226b30e075f16ac21452512150.png', 'Positive Behaviour Support is an evidence based approach with the main focus on increasing a personâ€™s quality of life and reducing the frequency and severity of their emitted behaviours.', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2016-01-11 11:35:50', '2016-06-09 07:56:10'),
(20, 'Physical Disability', '381f1c389307d7012432abc2bbac193e1452512182.png', 'Weâ€™re able to support people who, in addition to their learning disability or Autism, need support with any sort of physical disability.', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2016-01-11 11:36:22', '2016-06-09 07:56:25'),
(21, 'Mental Health', 'e60fa2d517c4cdc48bba61d627c713f91452512212.png', 'We have experience and expertise in supporting people with complex mental health needs and our clinical team work in close liaison with health services to enable people to remain in their homes.', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2016-01-11 11:36:52', '2016-06-09 07:56:46'),
(22, 'Outreach', '63a0933d6726725dd318b4a534f9088b1452512245.png', 'We support many clients with a range of needs in their own homes.  Our hours are flexible and determined by the personal circumstances of the client.  Our support includes help with practical living skills and developing a fully active social life.', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<ul>\r\n<li>sdfsdf sdfsdf sdfdsffds</li>\r\n<li>sdfdsf sdfsdfdsf dsfdsfdsf dff dff f</li>\r\n<li>sdfsdfsdf sdfsdfdsf</li>\r\n</ul>\r\n<ol>\r\n<li>sdfsdfsdfdsf</li>\r\n<li>sdfsfsdf</li>\r\n<li>sfsdfsdf</li>\r\n</ol>', 1, '2016-01-11 11:37:25', '2016-06-30 09:22:01'),
(23, 'Transition Care', '3e115d59cdf6fb770162b4fcbf21b3161471871661.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s. Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s.&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>', 1, '2016-08-22 13:13:00', '2016-08-22 13:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(20) NOT NULL,
  `key` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `input_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'text',
  `editable` tinyint(1) NOT NULL DEFAULT '1',
  `template` tinyint(1) NOT NULL DEFAULT '0',
  `weight` int(11) DEFAULT NULL,
  `params` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `title`, `description`, `input_type`, `editable`, `template`, `weight`, `params`) VALUES
(1, 'Site.email', 'sagar.jajoriya@planetwebsolution.com', '', '', '', 1, 0, 999, ''),
(2, 'Social.facebook_url', 'http://facebook.com', '', '', '', 0, 0, 999, ''),
(3, 'Social.tweeter_url', 'planetwebsol', '', '', 'text', 1, 0, NULL, ''),
(4, 'Site.copyright', 'Frontier | All rights reserved', '', '', '', 0, 0, 999, ''),
(5, 'Social.gplus_url', '#', '', '', 'text', 1, 0, NULL, ''),
(8, 'Site.title', 'Frontier', '', '', 'text', 1, 0, NULL, ''),
(15, 'Social.delicious', '#', '', '', 'text', 1, 0, NULL, ''),
(14, 'Social.rss', '#', '', '', 'text', 1, 0, NULL, ''),
(13, 'Social.linkedin', '#', '', '', 'text', 1, 0, NULL, ''),
(16, 'Site.owner', 'Frontier', '', '', 'text', 1, 0, NULL, ''),
(17, 'PromoCodeVideo', 'https://www.youtube.com/watch?v=zXzY27HyevA', '', '', 'text', 1, 0, NULL, ''),
(18, 'Site.paging', '3', '', '', 'text', 1, 0, NULL, ''),
(27, 'Payout.is_paypal', '1', '', '', 'text', 1, 0, NULL, ''),
(28, 'Payout.is_stripe', '1', '', '', 'text', 1, 0, NULL, ''),
(29, 'Social.instagram_url', 'https://instagram.com', '', '', 'text', 1, 0, NULL, ''),
(40, 'maxsignin_attends', '2', '', '', 'text', 1, 0, NULL, ''),
(39, 'maxsignup_attends', '1', '', '', 'text', 1, 0, NULL, ''),
(38, 'activationCode_expHours', '48', '', '', 'text', 1, 0, NULL, ''),
(41, 'Social.gplus', 'https://plus.google.com', '', '', 'text', 1, 0, NULL, ''),
(42, 'Site.contact', '+44 (0)20 8603 7230', '', '', 'text', 1, 0, NULL, ''),
(43, 'FrontierSupportServicesAddress', '<div itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">\r\n<p itemprop="streetAddress">27-29 Brighton Road</p>\r\n<p itemprop="addressLocality">South Croydon</p>\r\n<p itemprop="addressRegion">Surrey</p>\r\n<p itemprop="postalCode">CR2 6EB</p>\r\n</div>\r\n<p><strong>Phone :</strong> <span itemprop="telephone">+44 (0)20 8603 7230</span></p>', '', '', 'text', 1, 0, NULL, ''),
(44, 'BuzzzAddressHub', '<p>96D South End</p>\r\n<p>South Croydon</p>\r\n<p>Surrey</p>\r\n<p>CR0 1DQ</p>\r\n<p><strong>Phone :</strong> <span>+44 (0)20 8603 7230</span></p>', '', '', 'text', 1, 0, NULL, ''),
(45, 'HeadOfficeDirections', '<p>No more than 20 minutes from East Croydon station by buses 312 and 466. Alight at Upland Road, Whitgift School (Stop GH).<br />We are 2 minutes walk from the bus stop.</p>', '', '', 'text', 1, 0, NULL, ''),
(46, 'BuzzzHubDorection', '<p>No more than 15 minutes from East Croydon station by buses 119, 312 and 466. Alight at Aberdeen Road (Stop S) and the Buzzz Hub is 2 minutes walk from the bus stop.</p>', '', '', 'text', 1, 0, NULL, ''),
(47, 'Setting.youtube', 'https://www.youtube.com/channel/UCPnER_dCsUOuD7MmOb86vOA', '', '', 'text', 1, 0, NULL, ''),
(48, 'Social.youtube', 'https://www.youtube.com/channel/UCPnER_dCsUOuD7MmOb86vOA', '', '', 'text', 1, 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `sitelinks`
--

CREATE TABLE `sitelinks` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `description` text,
  `category_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sitelinks`
--

INSERT INTO `sitelinks` (`id`, `name`, `url`, `image`, `description`, `category_id`, `status`, `created`, `modified`) VALUES
(1, 'test', 'ggggg.com', 'f19c44d068fecac1d6d13a80df4f8e961483284975.jpg', 'ddddddddddd', 1, 1, '2017-01-01 15:36:15', '2017-01-01 15:36:15'),
(2, 'new one', 'test.com', 'c2839bed26321da8b466c80a032e47141483293251.jpg', 'ASDASDasdSD', 2, 1, '2017-01-01 17:54:11', '2017-01-01 17:54:11'),
(3, 'new one', 'test.com', 'ec56522bc9c2e15be17d11962eeec4531483293251.jpg', 'ASDASDasdSD', 2, 1, '2017-01-01 17:54:11', '2017-01-01 17:54:11');

-- --------------------------------------------------------

--
-- Table structure for table `site_routes`
--

CREATE TABLE `site_routes` (
  `id` int(11) NOT NULL,
  `slug` varchar(64) NOT NULL,
  `foreign_key` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_routes`
--

INSERT INTO `site_routes` (`id`, `slug`, `foreign_key`, `model`, `created`, `modified`) VALUES
(15, 'frontier-home', 15, 'Page', '2016-01-06 10:54:29', '2016-08-22 12:55:58'),
(16, 'who-we-are', 16, 'Page', '2016-01-06 12:50:43', '2016-09-23 12:25:37'),
(17, 'what-we-do', 17, 'Page', '2016-01-06 13:02:41', '2016-07-07 04:31:44'),
(18, 'specialist-services', 18, 'Page', '2016-01-07 06:14:52', '2016-06-02 09:46:46'),
(19, 'quality-assurance', 19, 'Page', '2016-01-07 09:13:42', '2016-07-27 05:18:36'),
(20, 'our-partners', 20, 'Page', '2016-01-07 10:29:49', '2016-09-05 13:06:00'),
(21, 'testimonials', 21, 'Page', '2016-01-07 11:00:41', '2016-06-23 13:01:12'),
(22, 'our-team', 22, 'Page', '2016-01-07 13:34:11', '2016-07-01 09:16:28'),
(23, 'job-with-us', 23, 'Page', '2016-01-08 04:58:40', '2016-08-05 07:02:04'),
(24, 'contact-us', 24, 'Page', '2016-01-08 05:12:21', '2016-06-14 06:16:41'),
(25, 'buzz-video', 25, 'Page', '2016-01-09 10:34:20', '2016-08-05 07:01:04'),
(26, 'buzz-home-page', 26, 'Page', '2016-01-09 10:51:39', '2016-06-17 10:49:57'),
(27, 'buzz-team', 27, 'Page', '2016-01-09 10:56:30', '2016-06-17 10:31:31'),
(28, 'brokerage', 28, 'Page', '2016-01-09 11:05:21', '2016-08-04 08:35:46'),
(31, 'home-content', 31, 'Page', '2016-01-12 05:48:22', '2016-08-04 06:49:19'),
(37, 'buzz-brokerage-video', 37, 'Page', '2016-02-03 09:35:10', '2016-02-03 10:04:57'),
(36, 'buzz-team-header-video', 36, 'Page', '2016-02-03 09:34:35', '2016-02-03 10:04:43'),
(35, 'buzz-membership', 35, 'Page', '2016-01-13 09:30:10', '2016-02-08 09:26:17'),
(38, 'buzz-membership-video', 38, 'Page', '2016-02-03 09:35:31', '2016-02-03 10:05:07'),
(39, 'buzz-team-video', 39, 'Page', '2016-02-03 10:09:22', '2016-02-04 06:40:39'),
(40, 'buzz-brokerage-header-video', 40, 'Page', '2016-02-03 10:11:34', '2016-02-04 06:43:38'),
(41, 'buzz-membership-header-video', 41, 'Page', '2016-02-03 10:12:18', '2016-02-04 06:42:15'),
(42, 'asdasd', 42, 'Page', '2016-03-03 06:17:17', '2016-03-03 06:20:37');

-- --------------------------------------------------------

--
-- Table structure for table `special_categories`
--

CREATE TABLE `special_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `special_categories`
--

INSERT INTO `special_categories` (`id`, `name`, `status`, `created`, `modified`) VALUES
(2, 'special category 2', 1, '2015-12-18 08:40:03', '2015-12-18 08:40:03'),
(3, 'special category 3', 1, '2015-12-18 08:40:10', '2015-12-18 08:40:10'),
(4, 'special category 4', 0, '2015-12-18 08:40:18', '2015-12-18 08:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `special_services`
--

CREATE TABLE `special_services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `special_category_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` longtext,
  `status` tinyint(1) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `special_services`
--

INSERT INTO `special_services` (`id`, `title`, `special_category_id`, `slug`, `image`, `body`, `status`, `meta_title`, `meta_description`, `meta_keywords`, `created`, `modified`) VALUES
(3, 'bvv', 4, 'vvvvvvvvvvv', '1a823d360930c25040dc978a2a992d6c1450423384.jpg', '<p>asdfsssssssssssssssssss</p>', 1, '', '', '', '2015-12-18 07:23:04', '2015-12-18 09:16:45'),
(4, 'asdfasdf', 2, 'dfdf', '2cd3dc3688ce46d75f267500065ce27d1450429815.jpg', '<p>asdfasdf</p>', 1, 'asdf', 'asdf', 'asdf', '2015-12-18 09:10:15', '2015-12-18 09:10:15'),
(5, 'asdfasdf', 2, 'sddddd', '2c9e32789033ce0178ee8da0b70dbfc21451553241.jpg', '<p>asdfsadf</p>', 1, '', '', '', '2015-12-31 09:14:01', '2015-12-31 09:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `title`, `description`, `image`, `status`, `created`) VALUES
(1, 'Care & Support Staff, Melanie Noel', '<p>It is the role of the Support worker to support adults with learning disabilities or mental health conditions in their day to day life by promoting independence and helping them to develop their skills and abilities. Also to act as an advocate for our clients and be a role model for appropriate behaviour.</p>', '3c4000876d4e5949d4262069b93b33f41467279969.jpg', 1, '2016-02-02 01:41:41'),
(2, 'Practice Leaders', '<p>The role of the Practice Leader is to ensure that all staff deliver personalised support in accordance with our clients Individual Support Plans, which form the basis of our contract with each individual. Also to assist the Compliance Manager in the development of the service objectives.</p>', 'a215a241f11cc4c3b39e76a2ae11f02d1467365020.jpg', 1, '2016-02-02 01:45:17'),
(9, 'Compliance Manager, Ahmad Kashiri', '<p>My duties as Compliance Manager are to plan, co-ordinate, and implement the quality management and quality improvement guidelines in clients&rsquo; homes.</p>\r\n<p>I also have to monitor, audit and provide assistance with any issues in the service that we provide. Furthermore, my day to day job consists of a variety of tasks such as preparing and presenting reports for the operations manager, ensuring our customers are receiving the highest level of care, making certain that staff have an understanding of all regulations, practices, and procedures within the domiciliary care sector. I also use my experience and judgement to improve quality throughout the services.</p>', '2b2ecbf2aeec35c788f76821213fa8b41464332863.jpg', 1, '2016-05-27 00:32:55'),
(10, 'Clinical Manager, Lee Elkin', '<p>The Clinical Team ensures high standards of client care at all times. It is their responsibility to encourage good practice and ensure that others do the same. As a team we are mindful of dignity, privacy and the cultural and religious needs of clients, staff and visitors at all times. We ensure that all patient care is assessed, planned, prioritised and of high quality, both physical and psychological delegating to support staff as required. As Clinical Team Leader I am also responsible for ensuring my own and others clinical practice is client-centred and evidence-based, in accordance CQC and company standards.</p>', '32d633517cd36c25ce7a8727091028081464332842.jpg', 1, '2016-05-27 00:33:49'),
(11, 'CEO, Denise Doggett', '<p>As the CEO of the company I am responsible for everything from the paper clip budget through to developing strategies for business growth. I control the direction of the company and decide budgets for all departments. My business goal is to target and initiate business partnerships with other companies and registered social care providers.</p>\r\n<p>I have a very self- driven personality, I drive the culture of Frontier Support and am the main decision maker and a co -owner of the business. My primary concern is to ensure that good practices are being employed throughout the company by identifying any risks and ensuring appropriate strategies are in place.</p>', 'fb393dae02a439b0c522cb2d7221fa1e1464332818.jpg', 1, '2016-05-27 00:34:26');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` int(10) NOT NULL,
  `team_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `team_id`, `name`, `picture`, `description`, `status`, `created`) VALUES
(1, 1, 'User 1', 'acb36a1a9710d91f1ac32cd46fc85de91454498739.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s, remaining essentially unchanged. It was popularised in the 1960s.</p>', 1, '2016-02-02 03:19:07'),
(4, 2, 'User 1', 'a5746ca10813568c7fa958275e1d43001454498914.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s, remaining essentially unchanged. It was popularised in the 1960s.</p>', 1, '2016-02-02 03:29:35'),
(7, 1, 'User 1', '39ccb633af631e39341b29e24cacd2051454498961.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s, remaining essentially unchanged. It was popularised in the 1960s.</p>', 1, '2016-02-02 03:30:36'),
(10, 1, 'User 1', '298e1b35e7f4ab4a0d04ae0c7546ba7e1454499385.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s, remaining essentially unchanged. It was popularised in the 1960s.</p>', 1, '2016-02-02 03:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) NOT NULL,
  `name` varchar(60) NOT NULL,
  `feedback` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `feedback`, `status`, `created`) VALUES
(1, 'Client Name', '<p>Lorem Ipsum is simply duacmmy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 0, '2016-02-03 07:16:33'),
(2, 'Client Name', '<p>Lorem Ipsum is simply duacmmy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 0, '2016-02-03 07:16:48'),
(3, 'Client Name', '<p>Lorem Ipsum is simply duacmmy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 0, '2016-02-03 07:17:01'),
(4, 'Client Name', '<p>Lorem Ipsum is simply duacmmy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 0, '2016-02-03 07:17:13'),
(5, 'Client Name', '<p>Lorem Ipsum is simply duacmmy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 0, '2016-02-03 07:17:31'),
(8, 'Client Name 1', '<p>adassadsadsadasdsad</p>', 0, '2016-02-09 00:29:26'),
(9, 'Dr John Biddulph', '<p>It has been my pleasure to work with the staff of Frontier Support in a consultancy role during the past five years. Inputs have included training, diagnostic assessment and representation of their service users at key meetings.</p>\r\n<p>The knowledge, understanding, skills, and sensitivity demonstrated by the FSS team serve to make a significant difference and enable service users to enjoy rewarding and fulfilling lives. I would consider the professionals at FSS to be the most sensitive and caring reflective practitioners I have ever had the pleasure to work with.</p>', 1, '2016-02-09 00:29:37'),
(10, 'Mrs. Freeda Bowden', '<p>I would like to say that I am very pleased with the care I get from Julie (FS staff) - to get my shopping is nothing too much for her.</p>\r\n<p>I couldn&rsquo;t ask for better.</p>', 1, '2016-06-02 07:53:12'),
(11, 'Merve Ozdas<br/>BSc, MSc, MBPsS', '<p>Whilst completing my MSc in Mental Health and Psychological Therapies, I was seeking for a role where I could implement my knowledge of mental health into practise. When I came across the Clinical Practise Leader role advertised at Frontier Support Services I was at most attracted towards the rich experience, networking and, flexibility Frontier was able to offer me. Having worked at Frontier Support Services for over a year, I engaged in challenging environments that foster constant development as a Practise Leader, while continuously gaining tangible knowledge and experience of mental illnesses. I believe Frontier has equipped me well to understand the importance of holding a holistic and person centred approach where we encourage our staff to use all the skills to ensure our service users maximise their potential and wellbeing. Frontier Support Services has supported and, equipped me well in beginning my new career pathway as an Assistant Psychologist in the NHS.</p>', 1, '2016-06-09 03:38:46'),
(12, 'LB Croydon', '<p>I would like to thank you and your staff for the support you&rsquo;ve provided in recent weeks.&nbsp; I have been impressed that everyone has been well informed about the issues and potential risks.&nbsp; I feel that every effort was made to occupy the client and give her the space to grieve for her Mother in her own time.&nbsp; Perhaps you might argue that you are just doing your job, but credit must be given where it is due and I believe the caring aspect of our job must be upheld and praised.&nbsp; So many thanks to you and your staff.</p>', 1, '2016-06-09 23:35:19'),
(13, 'Relative', '<p>With a lot of thanks and appreciation for all your hard work and the individual attention that our brother has received this year.</p>', 1, '2016-06-10 03:25:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `fname` varchar(40) NOT NULL COMMENT 'First Name',
  `mname` varchar(40) DEFAULT NULL,
  `lname` varchar(40) NOT NULL COMMENT 'Last Name',
  `image` varchar(250) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` text,
  `gender` mediumint(2) NOT NULL COMMENT '1 male, 2 female',
  `birthdate` date NOT NULL,
  `token` varchar(32) DEFAULT NULL COMMENT 'For Forgot  Password',
  `status` int(11) NOT NULL COMMENT 'Active / Inactive',
  `facebook_id` varchar(100) DEFAULT NULL,
  `google_id` varchar(100) DEFAULT NULL,
  `auth_token` text COMMENT 'For Social login',
  `device_id` varchar(255) DEFAULT NULL,
  `user_type` char(1) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_newsletter_subscribed` tinyint(1) NOT NULL,
  `is_updates` tinyint(1) NOT NULL,
  `activation_code` varchar(32) DEFAULT NULL,
  `activation_code_expiry` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_date` datetime NOT NULL,
  `ipaddress` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `email`, `username`, `password`, `fname`, `mname`, `lname`, `image`, `phone`, `address`, `gender`, `birthdate`, `token`, `status`, `facebook_id`, `google_id`, `auth_token`, `device_id`, `user_type`, `is_admin`, `is_newsletter_subscribed`, `is_updates`, `activation_code`, `activation_code_expiry`, `deleted`, `deleted_date`, `ipaddress`, `created`, `modified`) VALUES
(39, 1, 'virendersaini50@gmail.com', '', '471cde0e59c68cde2fa704a9f9fa1d85729019ca', 'admin', 'admin', 'admin', '09e0022ee297d9b4009cbc4ef4cb7bc61450869953.jpg', NULL, NULL, 0, '0000-00-00', NULL, 1, NULL, NULL, NULL, NULL, '', 1, 0, 0, NULL, NULL, 0, '2015-12-23 10:03:11', '', '2015-12-14 07:26:28', '2016-09-29 06:21:33'),
(67, 3, 'test@mail.com', '', 'c0853266e5666c23f846b082417d1ae836e07808', 'test', '', 'user', NULL, NULL, NULL, 2, '0000-00-00', NULL, 1, NULL, NULL, NULL, NULL, '', 1, 0, 0, NULL, NULL, 0, '0000-00-00 00:00:00', '', '2016-06-15 09:38:45', '2016-06-15 12:20:33'),
(68, 20, 'demo@gmail.com', '', 'f46e12933f02e5c44ecf3541534510d9023a1661', 'demo', '', 'user', NULL, NULL, NULL, 0, '0000-00-00', NULL, 1, NULL, NULL, NULL, NULL, '', 1, 0, 0, NULL, NULL, 0, '0000-00-00 00:00:00', '', '2016-06-15 10:29:20', '2016-06-15 10:29:20'),
(69, 3, 'lalit@planetwebsolution.com', '', 'f46e12933f02e5c44ecf3541534510d9023a1661', 'lalit', '', 'mangal', NULL, NULL, NULL, 1, '0000-00-00', NULL, 1, NULL, NULL, NULL, NULL, '', 1, 0, 0, NULL, NULL, 0, '0000-00-00 00:00:00', '', '2016-06-15 10:33:37', '2016-06-20 06:16:21'),
(71, 21, 'rtyrtyr@ewrewr.com', '', 'f46e12933f02e5c44ecf3541534510d9023a1661', 'rtyrtyr', 'tyrtyrty', 'rtyrty', NULL, NULL, NULL, 1, '0000-00-00', NULL, 1, NULL, NULL, NULL, NULL, '', 1, 0, 0, NULL, NULL, 0, '0000-00-00 00:00:00', '', '2016-06-15 11:07:55', '2016-06-15 11:07:55'),
(72, 21, 'sdfsdf@werewr.com', '', 'f46e12933f02e5c44ecf3541534510d9023a1661', 'sdfsdfsdfdsfsdf', 'sdfdsf', 'sdfsdfsdf', NULL, NULL, NULL, 2, '0000-00-00', NULL, 1, NULL, NULL, NULL, NULL, '', 1, 0, 0, NULL, NULL, 0, '0000-00-00 00:00:00', '', '2016-06-15 13:27:13', '2016-06-15 13:27:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acos`
--
ALTER TABLE `acos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acos_old`
--
ALTER TABLE `acos_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aros`
--
ALTER TABLE `aros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aros_acos`
--
ALTER TABLE `aros_acos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aros_acos_old`
--
ALTER TABLE `aros_acos_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_post_categories`
--
ALTER TABLE `blog_post_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `blog_post_categories_blog_posts`
--
ALTER TABLE `blog_post_categories_blog_posts`
  ADD PRIMARY KEY (`blog_post_category_id`,`blog_post_id`);

--
-- Indexes for table `blog_post_comments`
--
ALTER TABLE `blog_post_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_post_tags`
--
ALTER TABLE `blog_post_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `blog_post_tags_blog_posts`
--
ALTER TABLE `blog_post_tags_blog_posts`
  ADD PRIMARY KEY (`blog_post_tag_id`,`blog_post_id`);

--
-- Indexes for table `blog_settings`
--
ALTER TABLE `blog_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_text_UNIQUE` (`setting_text`),
  ADD UNIQUE KEY `setting_UNIQUE` (`setting`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buzz_sessions`
--
ALTER TABLE `buzz_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buzz_teams`
--
ALTER TABLE `buzz_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_types`
--
ALTER TABLE `event_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_uploads`
--
ALTER TABLE `job_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model` (`model`),
  ADD KEY `foreign_key` (`foreign_key`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_alias` (`alias`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Indexes for table `sitelinks`
--
ALTER TABLE `sitelinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_routes`
--
ALTER TABLE `site_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_categories`
--
ALTER TABLE `special_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_services`
--
ALTER TABLE `special_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`gender`,`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acos`
--
ALTER TABLE `acos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `acos_old`
--
ALTER TABLE `acos_old`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=413;
--
-- AUTO_INCREMENT for table `aros`
--
ALTER TABLE `aros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `aros_acos`
--
ALTER TABLE `aros_acos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=390;
--
-- AUTO_INCREMENT for table `aros_acos_old`
--
ALTER TABLE `aros_acos_old`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1253;
--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `blog_post_categories`
--
ALTER TABLE `blog_post_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `blog_post_comments`
--
ALTER TABLE `blog_post_comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `blog_post_tags`
--
ALTER TABLE `blog_post_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blog_settings`
--
ALTER TABLE `blog_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `buzz_sessions`
--
ALTER TABLE `buzz_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `buzz_teams`
--
ALTER TABLE `buzz_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `event_types`
--
ALTER TABLE `event_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;
--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `job_uploads`
--
ALTER TABLE `job_uploads`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `metas`
--
ALTER TABLE `metas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `sitelinks`
--
ALTER TABLE `sitelinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `site_routes`
--
ALTER TABLE `site_routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `special_categories`
--
ALTER TABLE `special_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `special_services`
--
ALTER TABLE `special_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
