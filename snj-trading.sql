-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2017 at 03:51 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cquiz-master`
--

-- --------------------------------------------------------

--
-- Table structure for table `acl_phinxlog`
--

CREATE TABLE `acl_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acl_phinxlog`
--

INSERT INTO `acl_phinxlog` (`version`, `migration_name`, `start_time`, `end_time`) VALUES
(20141229162641, 'DbAcl', '2016-12-08 09:45:17', '2016-12-08 09:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE `acos` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `actived` tinyint(1) NOT NULL DEFAULT '1',
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `actived`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 0, 1, 320),
(2, 1, NULL, NULL, 'Error', 0, 2, 7),
(4, 1, NULL, NULL, 'Groups', 1, 8, 25),
(5, 4, 'quan', NULL, 'index', 1, 9, 10),
(6, 4, NULL, NULL, 'view', 1, 11, 12),
(7, 4, NULL, NULL, 'add', 1, 13, 14),
(8, 4, NULL, NULL, 'edit', 1, 15, 16),
(9, 4, NULL, NULL, 'delete', 1, 17, 18),
(11, 1, NULL, NULL, 'Pages', 0, 26, 59),
(12, 11, NULL, NULL, 'display', 0, 27, 28),
(14, 1, NULL, NULL, 'Users', 1, 60, 109),
(15, 14, NULL, NULL, 'index', 1, 61, 62),
(16, 14, NULL, NULL, 'view', 1, 63, 64),
(17, 14, NULL, NULL, 'add', 1, 65, 66),
(18, 14, NULL, NULL, 'edit', 1, 67, 68),
(19, 14, NULL, NULL, 'delete', 1, 69, 70),
(20, 14, NULL, NULL, 'login', 1, 71, 72),
(21, 14, NULL, NULL, 'logout', 1, 73, 74),
(23, 1, NULL, NULL, 'Acl', 0, 110, 111),
(24, 1, NULL, NULL, 'Bake', 0, 112, 113),
(33, 1, NULL, NULL, 'Migrations', 0, 114, 115),
(69, 14, NULL, NULL, 'permission', 0, 75, 76),
(86, 14, NULL, NULL, 'ActiveControler', 0, 77, 78),
(87, 1, NULL, NULL, 'Bootstrap', 0, 116, 117),
(92, 14, NULL, NULL, 'permissiondetails', 1, 79, 80),
(101, 14, NULL, NULL, 'changeLang', 1, 81, 82),
(111, 14, NULL, NULL, 'createpdf', 1, 83, 84),
(112, 14, NULL, NULL, 'exportexcel', 1, 85, 86),
(113, 14, NULL, NULL, 'resetaroaco', 1, 87, 88),
(114, 14, NULL, NULL, 'ImportExcel', 1, 89, 90),
(169, 2, NULL, NULL, 'isAuthorized', 1, 3, 4),
(170, 4, NULL, NULL, 'isAuthorized', 1, 19, 20),
(172, 11, NULL, NULL, 'isAuthorized', 1, 29, 30),
(179, 14, NULL, NULL, 'isAuthorized', 1, 91, 92),
(187, 2, NULL, NULL, 'changeLang', 1, 5, 6),
(188, 4, NULL, NULL, 'ajaxadd', 1, 21, 22),
(189, 4, NULL, NULL, 'changeLang', 1, 23, 24),
(192, 11, NULL, NULL, 'changeLang', 1, 31, 32),
(222, 1, NULL, NULL, 'Cashflows', 1, 118, 133),
(223, 222, NULL, NULL, 'index', 1, 119, 120),
(224, 222, NULL, NULL, 'view', 1, 121, 122),
(225, 222, NULL, NULL, 'add', 1, 123, 124),
(226, 222, NULL, NULL, 'edit', 1, 125, 126),
(227, 222, NULL, NULL, 'delete', 1, 127, 128),
(228, 222, NULL, NULL, 'isAuthorized', 1, 129, 130),
(229, 222, NULL, NULL, 'changeLang', 1, 131, 132),
(230, 1, NULL, NULL, 'Categories', 1, 134, 153),
(231, 230, NULL, NULL, 'index', 1, 135, 136),
(232, 230, NULL, NULL, 'view', 1, 137, 138),
(233, 230, NULL, NULL, 'add', 1, 139, 140),
(234, 230, NULL, NULL, 'edit', 1, 141, 142),
(235, 230, NULL, NULL, 'delete', 1, 143, 144),
(236, 230, NULL, NULL, 'isAuthorized', 1, 145, 146),
(237, 230, NULL, NULL, 'changeLang', 1, 147, 148),
(238, 1, NULL, NULL, 'Customers', 1, 154, 171),
(239, 238, NULL, NULL, 'index', 1, 155, 156),
(240, 238, NULL, NULL, 'view', 1, 157, 158),
(241, 238, NULL, NULL, 'add', 1, 159, 160),
(242, 238, NULL, NULL, 'edit', 1, 161, 162),
(243, 238, NULL, NULL, 'delete', 1, 163, 164),
(244, 238, NULL, NULL, 'search', 1, 165, 166),
(245, 238, NULL, NULL, 'isAuthorized', 1, 167, 168),
(246, 238, NULL, NULL, 'changeLang', 1, 169, 170),
(247, 1, NULL, NULL, 'Invoices', 1, 172, 197),
(248, 247, NULL, NULL, 'index', 1, 173, 174),
(249, 247, NULL, NULL, 'InvoiceDetail', 1, 175, 176),
(250, 247, NULL, NULL, 'view', 1, 177, 178),
(251, 247, NULL, NULL, 'add', 1, 179, 180),
(252, 247, NULL, NULL, 'edit', 1, 181, 182),
(253, 247, NULL, NULL, 'delete', 1, 183, 184),
(254, 247, NULL, NULL, 'ChangeInvoicesProducts', 1, 185, 186),
(255, 247, NULL, NULL, 'DeleteInvoiceProduct', 1, 187, 188),
(256, 247, NULL, NULL, 'SearchInvoices', 1, 189, 190),
(257, 247, NULL, NULL, 'SaveInfoInvoices', 1, 191, 192),
(258, 247, NULL, NULL, 'isAuthorized', 1, 193, 194),
(259, 247, NULL, NULL, 'changeLang', 1, 195, 196),
(260, 1, NULL, NULL, 'PartnerDeliverys', 1, 198, 215),
(261, 260, NULL, NULL, 'index', 1, 199, 200),
(262, 260, NULL, NULL, 'view', 1, 201, 202),
(263, 260, NULL, NULL, 'add', 1, 203, 204),
(264, 260, NULL, NULL, 'edit', 1, 205, 206),
(265, 260, NULL, NULL, 'delete', 1, 207, 208),
(266, 260, NULL, NULL, 'search', 1, 209, 210),
(267, 260, NULL, NULL, 'isAuthorized', 1, 211, 212),
(268, 260, NULL, NULL, 'changeLang', 1, 213, 214),
(269, 1, NULL, NULL, 'Payments', 1, 216, 231),
(270, 269, NULL, NULL, 'index', 1, 217, 218),
(271, 269, NULL, NULL, 'view', 1, 219, 220),
(272, 269, NULL, NULL, 'add', 1, 221, 222),
(273, 269, NULL, NULL, 'edit', 1, 223, 224),
(274, 269, NULL, NULL, 'delete', 1, 225, 226),
(275, 269, NULL, NULL, 'isAuthorized', 1, 227, 228),
(276, 269, NULL, NULL, 'changeLang', 1, 229, 230),
(277, 1, NULL, NULL, 'Products', 1, 232, 275),
(278, 277, NULL, NULL, 'index', 1, 233, 234),
(279, 277, NULL, NULL, 'view', 1, 235, 236),
(280, 277, NULL, NULL, 'add', 1, 237, 238),
(281, 277, NULL, NULL, 'edit', 1, 239, 240),
(282, 277, NULL, NULL, 'delete', 1, 241, 242),
(283, 277, NULL, NULL, 'addsomething', 1, 243, 244),
(284, 277, NULL, NULL, 'SearchProduct', 1, 245, 246),
(285, 277, NULL, NULL, 'PaginationProducts', 1, 247, 248),
(286, 277, NULL, NULL, 'PaginationProductSearch', 1, 249, 250),
(287, 277, NULL, NULL, 'DeleteImage', 1, 251, 252),
(288, 277, NULL, NULL, 'DeactiveProduct', 1, 253, 254),
(289, 277, NULL, NULL, 'SearchStocks', 1, 255, 256),
(290, 277, NULL, NULL, 'sales', 1, 257, 258),
(291, 277, NULL, NULL, 'isAuthorized', 1, 259, 260),
(292, 277, NULL, NULL, 'changeLang', 1, 261, 262),
(293, 1, NULL, NULL, 'Stocks', 1, 276, 301),
(294, 293, NULL, NULL, 'index', 1, 277, 278),
(295, 293, NULL, NULL, 'view', 1, 279, 280),
(296, 293, NULL, NULL, 'add', 1, 281, 282),
(297, 293, NULL, NULL, 'edit', 1, 283, 284),
(298, 293, NULL, NULL, 'delete', 1, 285, 286),
(299, 293, NULL, NULL, 'AddStocks', 1, 287, 288),
(300, 293, NULL, NULL, 'SearchStocks', 1, 289, 290),
(301, 293, NULL, NULL, 'StocksDetail', 1, 291, 292),
(302, 293, NULL, NULL, 'ChangeStocksProducts', 1, 293, 294),
(303, 293, NULL, NULL, 'DeleteStockProduct', 1, 295, 296),
(304, 293, NULL, NULL, 'isAuthorized', 1, 297, 298),
(305, 293, NULL, NULL, 'changeLang', 1, 299, 300),
(306, 1, NULL, NULL, 'Suppliers', 1, 302, 319),
(307, 306, NULL, NULL, 'index', 1, 303, 304),
(308, 306, NULL, NULL, 'view', 1, 305, 306),
(309, 306, NULL, NULL, 'add', 1, 307, 308),
(310, 306, NULL, NULL, 'edit', 1, 309, 310),
(311, 306, NULL, NULL, 'delete', 1, 311, 312),
(312, 306, NULL, NULL, 'search', 1, 313, 314),
(313, 306, NULL, NULL, 'isAuthorized', 1, 315, 316),
(314, 306, NULL, NULL, 'changeLang', 1, 317, 318),
(318, 11, NULL, NULL, 'index', 1, 33, 34),
(319, 11, NULL, NULL, 'search', 1, 35, 36),
(320, 11, NULL, NULL, 'categories', 1, 37, 38),
(321, 11, NULL, NULL, 'products', 1, 39, 40),
(322, 11, NULL, NULL, 'suppliers', 1, 41, 42),
(323, 277, NULL, NULL, 'suppliers', 1, 263, 264),
(324, 14, NULL, NULL, 'register', 1, 93, 94),
(325, 14, NULL, NULL, 'activeacc', 1, 95, 96),
(326, 230, NULL, NULL, 'recursion', 1, 149, 150),
(327, 11, NULL, NULL, 'categoriesParent', 1, 43, 44),
(328, 11, NULL, NULL, 'login', 1, 45, 46),
(329, 11, NULL, NULL, 'check_user', 1, 47, 48),
(330, 11, NULL, NULL, 'accounts', 1, 49, 50),
(331, 11, NULL, NULL, 'PersonalInformation', 1, 51, 52),
(332, 11, NULL, NULL, 'ProductsOfSuppliers', 1, 53, 54),
(333, 11, NULL, NULL, 'ViewCart', 1, 55, 56),
(334, 11, NULL, NULL, 'contacts', 1, 57, 58),
(335, 277, NULL, NULL, 'SupplierAddProduct', 1, 265, 266),
(336, 277, NULL, NULL, 'SupplierEditProduct', 1, 267, 268),
(337, 277, NULL, NULL, 'SupplierDeleteProduct', 1, 269, 270),
(338, 277, NULL, NULL, 'cart', 1, 271, 272),
(339, 277, NULL, NULL, 'RemoveItems', 1, 273, 274),
(340, 14, NULL, NULL, 'sendUserEmail', 1, 97, 98),
(341, 14, NULL, NULL, 'captcha', 1, 99, 100),
(342, 14, NULL, NULL, 'lostpassword', 1, 101, 102),
(343, 14, NULL, NULL, 'changepassword', 1, 103, 104),
(344, 14, NULL, NULL, 'check_user', 1, 105, 106),
(345, 14, NULL, NULL, 'ChangePasswordUser', 1, 107, 108),
(346, 230, NULL, NULL, 'SearchCategories', 1, 151, 152);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE `aros` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Groups', 1, 'Admin', 1, 6),
(2, NULL, 'Groups', 2, 'Manager', 7, 8),
(3, NULL, 'Groups', 3, 'Member', 9, 14),
(5, 1, 'Users', 2, 'quandv', 2, 3),
(6, 3, 'Users', 3, 'demo', 10, 11),
(15, NULL, 'Groups', 4, 'Customers', 15, 80),
(16, 1, 'Users', 5, 'admin', 4, 5),
(21, 15, 'Users', 6, 'customers', 78, 79),
(22, 15, 'Users', 9, 'quandv2', 16, 17),
(23, 15, 'Users', 10, 'demo2', 18, 19),
(24, 15, 'Users', 11, 'admin2', 20, 21),
(25, 15, 'Users', 12, 'quandv123', 22, 23),
(26, 15, 'Users', 13, 'quandv124', 24, 25),
(27, 15, 'Users', 14, 'customers123', 26, 27),
(28, 15, 'Users', 15, 'customers54', 28, 29),
(29, 15, 'Users', 16, 'customers5', 30, 31),
(30, 15, 'Users', 17, 'customers6', 32, 33),
(31, 15, 'Users', 18, 'customers1', 34, 35),
(32, 15, 'Users', 19, 'customers2', 36, 37),
(33, 15, 'Users', 20, 'customers8', 38, 39),
(34, 15, 'Users', 21, 'customers123', 40, 41),
(35, 15, 'Users', 22, 'customers1', 42, 43),
(36, 15, 'Users', 23, 'demo1', 44, 45),
(37, 15, 'Users', 24, 'demo2', 46, 47),
(38, 15, 'Users', 25, 'demo3', 48, 49),
(39, 15, 'Users', 26, 'demo2', 50, 51),
(40, 15, 'Users', 27, 'demo3', 52, 53),
(41, 15, 'Users', 28, 'demo1', 54, 55),
(42, 15, 'Users', 7, 'snj', 56, 57),
(43, 15, 'Users', 8, 'customers54', 58, 59),
(44, 15, 'Users', 9, 'customers1234', 60, 61),
(45, 15, 'Users', 10, 'customers12', 62, 63),
(46, 15, 'Users', 11, 'quandv1', 64, 65),
(47, 15, 'Users', 12, 'quandv123', 66, 67),
(48, 15, 'Users', 7, 'admin123', 68, 69),
(49, 15, 'Users', 8, 'customers54', 70, 71),
(50, 15, 'Users', 9, 'customer123', 72, 73),
(51, 15, 'Users', 10, 'customers22', 74, 75),
(52, 3, 'Users', 11, 'customers1', 12, 13),
(53, 15, 'Users', 12, 'customers1', 76, 77);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE `aros_acos` (
  `id` int(11) NOT NULL,
  `aro_id` int(11) NOT NULL,
  `aco_id` int(11) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cashflows`
--

CREATE TABLE `cashflows` (
  `id` int(5) NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `payer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receiver` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` decimal(15,0) NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cash_flow_statements`
--

CREATE TABLE `cash_flow_statements` (
  `id` int(5) NOT NULL,
  `opening_balance` int(10) DEFAULT NULL,
  `total_income` int(10) DEFAULT NULL,
  `total_outflow` int(10) DEFAULT NULL,
  `balance` int(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `thumbnails` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `lft` int(5) NOT NULL,
  `rght` int(5) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `picture`, `type`, `thumbnails`, `parent_id`, `lft`, `rght`, `created`, `modified`) VALUES
(1, 'Bussines', 'assets/images/apple.png', 0, NULL, 2, 56, 61, '2016-12-09 15:32:21', '2017-02-22 09:57:47'),
(2, 'Spare Part', 'thumbnails/26e716d3ec0fdf21bfae133ce0b56f40.jpg', 0, NULL, 0, 43, 62, '2016-12-09 15:37:35', '2017-02-22 09:52:25'),
(3, 'Store', 'assets/images/apple.png', 0, NULL, 0, 1, 4, '2016-12-16 16:28:48', '2017-02-22 09:53:18'),
(4, 'Leather', 'thumbnails/f4aaf64a182b9757d6996a6e05381e3b.jpg', 1, NULL, 0, 63, 66, '2016-12-16 16:30:04', '2017-02-22 09:58:47'),
(5, 'Ipad Mini', 'thumbnails/c2dd01a36e52988a2e2d1f648798d260.jpg', 0, NULL, 3, 2, 3, '2016-12-16 16:30:29', '2016-12-16 16:30:29'),
(6, 'M/E', 'thumbnails/f4aaf64a182b9757d6996a6e05381e3b.jpg', 0, NULL, 2, 44, 53, '2016-12-19 09:06:31', '2017-02-20 15:26:35'),
(7, 'Computers', 'assets/images/11.jpg', 0, NULL, 0, 5, 18, '2017-02-02 16:23:36', '2017-02-02 16:23:36'),
(9, 'Home & App', 'thumbnails/26e716d3ec0fdf21bfae133ce0b56f40.jpg', 0, NULL, 3, 57, 60, '2017-02-02 16:24:02', '2017-02-09 18:48:39'),
(14, 'Electronics', 'assets/images/cat-mega-thumb.png', 0, NULL, 7, 14, 15, '2017-02-02 16:25:40', '2017-02-21 16:06:45'),
(17, 'Food', 'assets/images/cat-mega-thumb.png', 0, NULL, 24, 48, 51, '2017-02-02 16:28:37', '2017-02-22 09:11:50'),
(18, 'Laptop', NULL, 0, NULL, 0, 27, 32, '2017-02-02 16:29:28', '2017-02-08 18:02:42'),
(19, 'G/E', NULL, 0, NULL, 2, 54, 55, '2017-02-02 16:29:52', '2017-02-20 15:27:07'),
(20, 'Women''s', NULL, 0, NULL, 9, 58, 59, '2017-02-02 16:30:01', '2017-02-02 16:30:01'),
(21, 'Phones', NULL, 0, NULL, 7, 6, 11, '2017-02-02 16:35:04', '2017-02-02 16:35:04'),
(22, 'Samsung', NULL, 0, NULL, 21, 7, 8, '2017-02-02 16:42:31', '2017-02-02 16:42:31'),
(23, 'Sony', NULL, 0, NULL, 21, 9, 10, '2017-02-02 16:42:37', '2017-02-02 16:42:37'),
(24, 'Iphone 6', NULL, 0, NULL, 6, 47, 52, '2017-02-02 19:18:04', '2017-02-21 16:54:46'),
(25, 'Iphone 7', NULL, 0, NULL, 17, 49, 50, '2017-02-02 19:18:09', '2017-02-22 09:34:59'),
(26, 'Dell', NULL, 0, NULL, 18, 30, 31, '2017-02-02 19:18:26', '2017-02-08 18:51:25'),
(27, 'Asus', NULL, 0, NULL, 18, 28, 29, '2017-02-02 19:18:31', '2017-02-02 19:18:31'),
(28, 'Shoe', NULL, 0, NULL, 7, 12, 13, '2017-02-06 08:27:17', '2017-02-09 18:51:11'),
(29, 'Motobike', NULL, 0, NULL, 0, 19, 20, '2017-02-06 08:27:46', '2017-02-06 08:27:46'),
(30, 'Car', NULL, 0, NULL, 0, 21, 22, '2017-02-06 08:28:18', '2017-02-06 08:28:18'),
(31, 'Football', NULL, 0, NULL, 7, 16, 17, '2017-02-06 10:25:49', '2017-02-22 09:41:52'),
(32, 'Tennis', NULL, 0, NULL, 0, 23, 24, '2017-02-06 10:35:23', '2017-02-06 10:35:23'),
(33, 'Cake', NULL, 0, NULL, 0, 25, 26, '2017-02-06 10:35:48', '2017-02-06 10:35:48'),
(34, 'Chicken', NULL, 0, NULL, 0, 41, 42, '2017-02-06 10:36:18', '2017-02-21 16:05:51'),
(35, 'Computers & Phones', NULL, 0, NULL, 0, 33, 34, '2017-02-09 00:04:40', '2017-02-22 09:45:27'),
(36, 'Baby&Toys', NULL, 0, NULL, 0, 35, 36, '2017-02-09 18:49:54', '2017-02-22 09:59:16'),
(37, 'Travel', NULL, 1, NULL, 0, 37, 38, '2017-02-09 18:50:18', '2017-02-09 18:50:18'),
(38, 'Heath', NULL, 1, NULL, 0, 39, 40, '2017-02-09 19:03:29', '2017-02-09 19:03:29'),
(39, 'Food', NULL, 1, NULL, 0, 45, 46, '2017-02-21 14:10:53', '2017-02-21 14:10:53'),
(40, 'test', NULL, 1, NULL, 0, 64, 65, '2017-02-21 14:44:27', '2017-02-21 23:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(5) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` tinyint(50) DEFAULT NULL,
  `descriptions` text COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(5) NOT NULL,
  `code` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_group` tinyint(2) DEFAULT NULL,
  `tel` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` int(1) DEFAULT '1',
  `tax_registration_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `code`, `name`, `customer_group`, `tel`, `address`, `location`, `date_of_birth`, `email`, `gender`, `tax_registration_number`, `note`, `created`, `modified`) VALUES
(1, '34324', 'Quan', 2, '0976459551', 'Ha Dong', 'HN', '2016-06-10', 'quandv.125@gmail.com', 1, '345345', 'note', '2016-12-22 16:18:54', '2016-12-22 20:41:35'),
(2, '34534', 'Customers', 1, '0976459551', '', 'HN', '2016-12-22', 'quandv.125@gmail.com', 1, '', 'test', '2016-12-22 17:42:14', '2016-12-22 17:42:14'),
(8, '123123', 'Dương Văn Quân', NULL, '0987301036', 'HN', '', '2016-04-05', 'quandv.125@gmail.com', 1, '', '', '2016-12-22 21:31:52', '2017-01-19 09:41:28'),
(9, '', 'A Quan', NULL, '0969208360', '', '', '2017-01-19', 'anhquan_ht125@yahoo.com.vn', 1, '', '', '2017-01-17 17:14:56', '2017-01-19 09:38:07');

-- --------------------------------------------------------

--
-- Table structure for table `debts`
--

CREATE TABLE `debts` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `supplier_id` int(5) DEFAULT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `stock_id` int(5) DEFAULT NULL,
  `invoice_id` int(5) DEFAULT NULL,
  `money` decimal(15,2) NOT NULL,
  `note` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(5) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Admin', '2016-12-09 09:04:53', '2016-12-09 09:04:53'),
(2, 'Manager', '2016-12-09 09:05:00', '2016-12-09 09:05:00'),
(3, 'Suppliers', '2016-12-09 09:05:13', '2016-12-09 09:05:13'),
(4, 'Customers', '2016-12-12 14:25:37', '2016-12-12 14:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `i18n`
--

CREATE TABLE `i18n` (
  `id` int(10) NOT NULL,
  `locale` varchar(6) NOT NULL,
  `model` varchar(255) NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) NOT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `actived` tinyint(1) DEFAULT NULL COMMENT 'default picture and show special',
  `group_id` int(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `path`, `thumbnail`, `actived`, `group_id`, `created`, `modified`) VALUES
(9, 10, 'products/1481875807_slide-3.jpg', 'thumbnails/cf1f0512619c6a26990a8080929da3af.jpg', NULL, NULL, '2016-12-16 15:10:07', '2016-12-16 15:10:07'),
(10, 10, 'products/1481875807_slide-4.jpg', 'thumbnails/9b3c3ca51b2c12f7368e62ba6e8026da.jpg', NULL, NULL, '2016-12-16 15:10:07', '2016-12-16 15:10:07'),
(11, 10, 'products/1481875807_slider_3.jpg', 'thumbnails/3ad84b3cbeb2f79fbee77eb9db8ff76a.jpg', NULL, NULL, '2016-12-16 15:10:07', '2016-12-16 15:10:07'),
(21, 17, 'products/95392_portfolio-panel3-thumbnail05.jpg', 'thumbnails/0f359d00ce8836ea4add0b6873109aaa.jpg', NULL, NULL, '2016-12-19 09:13:20', '2016-12-19 09:13:20'),
(22, 17, 'products/19761_portfolio-panel3-thumbnail06.jpg', 'thumbnails/16b010ec1524603671d58888ad6fbd55.jpg', NULL, NULL, '2016-12-19 09:13:20', '2016-12-19 09:13:20'),
(23, 17, 'products/61841_portfolio-panel3-thumbnail08.jpg', 'thumbnails/e7cb8cdbd0ec593a691a4d94e03b3ebd.jpg', NULL, NULL, '2016-12-19 09:13:20', '2016-12-19 09:13:20'),
(24, 17, 'products/15824_portfolio-panel3-thumbnail09.jpg', 'thumbnails/cf1f0512619c6a26990a8080929da3af.jpg', NULL, NULL, '2016-12-19 09:13:20', '2016-12-19 09:13:20'),
(25, 17, 'products/23359_widget-gallery-thumbnail01.jpg', 'thumbnails/fe704f09bdb274955398d904ff51fa24.jpg', NULL, NULL, '2016-12-19 09:13:20', '2016-12-19 09:13:20'),
(26, 18, 'products/58158_slider-img01.jpg', 'thumbnails/759dfe6c410f6b184352c259c3ea6b67.jpg', NULL, NULL, '2016-12-19 09:15:51', '2016-12-19 09:15:51'),
(27, 18, 'products/62763_slider-img02.jpg', 'thumbnails/2e43e418d20b46a0a21efa6177f0d8d7.jpg', NULL, NULL, '2016-12-19 09:15:51', '2016-12-19 09:15:51'),
(28, 18, 'products/19407_slider-img03.jpg', 'thumbnails/194e5844bd4e048597d9e8ecf7810dcc.jpg', NULL, NULL, '2016-12-19 09:15:52', '2016-12-19 09:15:52'),
(34, 8, 'products/83945_portfolio-panel3-thumbnail01.jpg', 'thumbnails/df1445b096610a9177ccc6d5eb74f466.jpg', NULL, NULL, '2016-12-19 09:22:22', '2016-12-19 09:22:22'),
(35, 20, 'products/95459_portfolio-panel3-thumbnail02.jpg', 'thumbnails/27b185f7cfde5fd5ae86e9fa71500510.jpg', NULL, NULL, '2016-12-19 09:22:22', '2016-12-19 09:22:22'),
(36, 20, 'products/67704_portfolio-panel3-thumbnail03.jpg', 'thumbnails/1b70450939c2b73afaeac4c0d3a42d29.jpg', NULL, NULL, '2016-12-19 09:22:22', '2016-12-19 09:22:22'),
(37, 20, 'products/15766_portfolio-panel3-thumbnail04.jpg', 'thumbnails/078ae2d697645e59c63fe95e2262c5de.jpg', NULL, NULL, '2016-12-19 09:22:22', '2016-12-19 09:22:22'),
(38, 20, 'products/59226_portfolio-panel3-thumbnail05.jpg', 'thumbnails/759dfe6c410f6b184352c259c3ea6b67.jpg', NULL, NULL, '2016-12-19 09:22:22', '2016-12-19 09:22:22'),
(39, 21, 'products/68192_block-content2-thumbnail04.jpg', 'thumbnails/69dc98d87ca439be77e59d39bddd53bc.jpg', NULL, NULL, '2016-12-19 09:25:54', '2016-12-19 09:25:54'),
(40, 21, 'products/18989_block-content2-thumbnail05.jpg', 'thumbnails/91e4693fb32896e1dc437bf6dd00c9a6.jpg', NULL, NULL, '2016-12-19 09:25:55', '2016-12-19 09:25:55'),
(41, 21, 'products/60495_block-content3-img.png', 'thumbnails/8ab245ba3edad39ceb165a1102e2ab2a.png', NULL, NULL, '2016-12-19 09:25:55', '2016-12-19 09:25:55'),
(42, 22, 'products/41996_about-us-page-bg-image.jpg', 'thumbnails/8ab245ba3edad39ceb165a1102e2ab2a.png', NULL, NULL, '2016-12-19 09:27:15', '2016-12-19 09:27:15'),
(43, 22, 'products/76093_about-us-page-image-set01.jpg', 'thumbnails/aa344341ce7723cf8a1bc40324b20952.jpg', NULL, NULL, '2016-12-19 09:27:15', '2016-12-19 09:27:15'),
(44, 22, 'products/47385_about-us-page-image-set02.jpg', 'thumbnails/4bec9d75c6bf1a5dc4bc0699807f0209.jpg', NULL, NULL, '2016-12-19 09:27:15', '2016-12-19 09:27:15'),
(45, 22, 'products/79163_about-us-page-image-set03.jpg', 'thumbnails/e78df2c8729c8e5fbf48017f89306fed.jpg', NULL, NULL, '2016-12-19 09:27:15', '2016-12-19 09:27:15'),
(50, 24, 'products/50010_apple-iwatch-mlc62-42mm-smart-watch-rose-gold-stone-band-nevorawholesale-1604-26-NEVORAWHOLESALE@1.jpg', 'thumbnails/c2dd01a36e52988a2e2d1f648798d260.jpg', NULL, NULL, '2016-12-19 15:39:43', '2016-12-19 15:39:43'),
(51, 24, 'products/71485_AppleWatch.jpeg', 'thumbnails/650798c5bc6bd72deadedbcda640fb94.jpeg', NULL, NULL, '2016-12-19 15:39:43', '2016-12-19 15:39:43'),
(52, 24, 'products/29471_iphone_4s_ios_7_hero.jpg', 'thumbnails/865aab3a96cb67f2ca4bc456f50025b8.jpg', NULL, NULL, '2016-12-19 15:39:43', '2016-12-19 15:39:43'),
(53, 24, 'products/23432_iwatch.jpg', 'thumbnails/6ab1925aecbb7266251f119a8cd63594.jpg', NULL, NULL, '2016-12-19 15:39:43', '2016-12-19 15:39:43'),
(58, 26, 'products/79734_blog-entry-thumbnail01.jpg', 'thumbnails/7ee3add92abe91417f1db14969f59fc4.jpg', NULL, NULL, '2016-12-19 15:56:13', '2016-12-19 15:56:13'),
(59, 26, 'products/42664_blog-entry-thumbnail02.jpg', 'thumbnails/cca32cf29351b7c5973f09a03654768f.jpg', NULL, NULL, '2016-12-19 15:56:13', '2016-12-19 15:56:13'),
(60, 26, 'products/94254_blog-entry-thumbnail03.jpg', 'thumbnails/a99b7dbeeeb21964be270fc7d7f5b9c2.jpg', NULL, NULL, '2016-12-19 15:56:13', '2016-12-19 15:56:13'),
(61, 26, 'products/65998_blog-featured-image01.jpg', 'thumbnails/63f6f2738cede2ba8a248c427f7913ab.jpg', NULL, NULL, '2016-12-19 15:56:13', '2016-12-19 15:56:13'),
(62, 26, 'products/65757_blog-featured-image02.jpg', 'thumbnails/4c61eeedb7a5841adf8f91c30374d96a.jpg', NULL, NULL, '2016-12-19 15:56:13', '2016-12-19 15:56:13'),
(63, 27, 'products/69822_home-team-bg-image.jpg', 'thumbnails/2818888aa728454bc811086c1b581f61.jpg', NULL, NULL, '2016-12-19 15:57:16', '2016-12-19 15:57:16'),
(65, 27, 'products/78483_portfolio06.jpg', 'thumbnails/93f50ec844aa07447be72e092e1897e2.jpg', NULL, NULL, '2016-12-19 15:57:17', '2016-12-19 15:57:17'),
(66, 27, 'products/21906_portfolio08.jpg', 'thumbnails/374c0a6ba74d7028a6ece0c7ba574e6d.jpg', NULL, NULL, '2016-12-19 15:57:17', '2016-12-19 15:57:17'),
(68, 27, 'products/20777_portfolio11.jpg', 'thumbnails/bcb198c68a52655133cd4680c3fe520e.jpg', NULL, NULL, '2016-12-19 15:57:17', '2016-12-19 15:57:17'),
(69, 27, 'products/64798_portfolio12.jpg', 'thumbnails/b6290dc6be625597c07144ee2748e515.jpg', NULL, NULL, '2016-12-19 15:57:18', '2016-12-19 15:57:18'),
(70, 27, 'products/86591_portfolio13.jpg', 'thumbnails/54c5084e3b3dafa6b745577561382592.jpg', NULL, NULL, '2016-12-19 15:57:18', '2016-12-19 15:57:18'),
(72, 27, 'products/56458_portfolio15.jpg', 'thumbnails/072ef3779bb0621fad01dd7f909e8588.jpg', NULL, NULL, '2016-12-19 15:57:19', '2016-12-19 15:57:19'),
(82, 30, 'products/74247_iw1.jpg', 'thumbnails/4b3fa2e51a859fda96d4a9a6668463a4.jpg', NULL, NULL, '2016-12-19 16:13:01', '2016-12-19 16:13:01'),
(83, 30, 'products/78949_iw2.jpeg', 'thumbnails/74ccda02025f1f31531cddfeb8ce1cc6.jpeg', NULL, NULL, '2016-12-19 16:13:02', '2016-12-19 16:13:02'),
(84, 30, 'products/96238_iw3.jpg', 'thumbnails/466588283c6f16ca5f16e262175ea55d.jpg', NULL, NULL, '2016-12-19 16:13:02', '2016-12-19 16:13:02'),
(85, 30, 'products/91590_iw4.jpg', 'thumbnails/5f5ffd630ca3caeb90dc3d2c99a0c53a.jpg', NULL, NULL, '2016-12-19 16:13:02', '2016-12-19 16:13:02'),
(86, 31, 'products/25416_iw1.jpg', 'thumbnails/6190007fb16331302157b8d5faf5018d.jpg', NULL, NULL, '2016-12-19 16:28:32', '2016-12-19 16:28:32'),
(87, 31, 'products/95414_iw2.jpeg', 'thumbnails/faafdbb9ffcb83f5179c9e7823506efd.jpeg', NULL, NULL, '2016-12-19 16:28:32', '2016-12-19 16:28:32'),
(88, 31, 'products/48652_iw3.jpg', 'thumbnails/668a00658e0487f38bebc1c48be78b1d.jpg', NULL, NULL, '2016-12-19 16:28:32', '2016-12-19 16:28:32'),
(89, 31, 'products/6272_iw4.jpg', 'thumbnails/9b77f12edc42fa26eab9d9e5144f2761.jpg', NULL, NULL, '2016-12-19 16:28:32', '2016-12-19 16:28:32'),
(90, 32, 'products/78653_iw1.jpg', 'thumbnails/b0c5d3670d372220b44b67f91bdd02e7.jpg', NULL, NULL, '2016-12-19 16:29:15', '2016-12-19 16:29:15'),
(91, 32, 'products/53034_iw2.jpeg', 'thumbnails/664071626c743f9b15cbc4737fb24d7d.jpeg', NULL, NULL, '2016-12-19 16:29:15', '2016-12-19 16:29:15'),
(92, 32, 'products/90195_iw3.jpg', 'thumbnails/34085b5b22c401ca34d9b20d609bd8f5.jpg', NULL, NULL, '2016-12-19 16:29:15', '2016-12-19 16:29:15'),
(93, 32, 'products/76709_iw4.jpg', 'thumbnails/46ea477fa30b347f29ec8ebf72b9ee74.jpg', NULL, NULL, '2016-12-19 16:29:16', '2016-12-19 16:29:16'),
(94, 33, 'products/94391_portfolio-carousel-item01.jpg', 'thumbnails/5a7202965419e5e2038b354a01e1e650.jpg', NULL, NULL, '2016-12-19 16:42:02', '2016-12-19 16:42:02'),
(95, 33, 'products/23154_portfolio-carousel-item02.jpg', 'thumbnails/04dd24fc8a26bce1c0ad8d780f7f80e2.jpg', NULL, NULL, '2016-12-19 16:42:02', '2016-12-19 16:42:02'),
(96, 33, 'products/94239_portfolio-carousel-item05.jpg', 'thumbnails/14c23efeab1f70b9175b7d85ff2426c3.jpg', NULL, NULL, '2016-12-19 16:42:02', '2016-12-19 16:42:02'),
(97, 33, 'products/59647_portfolio-panel3-thumbnail02.jpg', 'thumbnails/1bb57cd4dfd5f1380a7140f7cce84e56.jpg', NULL, NULL, '2016-12-19 16:42:02', '2016-12-19 16:42:02'),
(98, 33, 'products/62592_portfolio-panel3-thumbnail03.jpg', 'thumbnails/af95be5ed6bdf4878f6dc40d7323defd.jpg', NULL, NULL, '2016-12-19 16:42:02', '2016-12-19 16:42:02'),
(99, 34, 'products/77164_portfolio06.jpg', 'thumbnails/83b37a88f74da19054630e262c491dfe.jpg', NULL, NULL, '2016-12-19 16:43:02', '2016-12-19 16:43:02'),
(100, 34, 'products/53205_portfolio07.jpg', 'thumbnails/a98b9e355724304b1f8bad9122da6186.jpg', NULL, NULL, '2016-12-19 16:43:02', '2016-12-19 16:43:02'),
(101, 34, 'products/21323_portfolio08.jpg', 'thumbnails/b9695aa1290d4f70eba364d4c48c3697.jpg', NULL, NULL, '2016-12-19 16:43:03', '2016-12-19 16:43:03'),
(102, 34, 'products/32154_portfolio09.jpg', 'thumbnails/4f235f05906316eab43f0b703fddbcda.jpg', NULL, NULL, '2016-12-19 16:43:03', '2016-12-19 16:43:03'),
(103, 34, 'products/79886_portfolio10.jpg', 'thumbnails/662be783ac3f8ca02e62d0535b276ecc.jpg', NULL, NULL, '2016-12-19 16:43:03', '2016-12-19 16:43:03'),
(104, 35, 'products/75901_ip4.jpg', 'thumbnails/8ad997c7e8844cfb253d697ca77bd36c.jpg', NULL, NULL, '2016-12-21 17:14:10', '2016-12-21 17:14:10'),
(105, 30, 'products/87366_iw1.jpg', 'thumbnails/bbfb89317fc35dee65e1da8c824e9b07.jpg', NULL, NULL, '2016-12-21 17:25:39', '2016-12-21 17:25:39'),
(106, 30, 'products/79288_iw2.jpeg', 'thumbnails/fe645a58f0d8e912fd7bc8d990c2bcb4.jpeg', NULL, NULL, '2016-12-21 17:25:39', '2016-12-21 17:25:39'),
(107, 8, 'products/97223_iw1.jpg', 'thumbnails/b7eb7a75117a2d557677dc3ff7142aaf.jpg', NULL, NULL, '2016-12-21 17:25:50', '2016-12-21 17:25:50'),
(108, 8, 'products/81846_iw2.jpeg', 'thumbnails/acd47abba8085edd51b5faf237eb7228.jpeg', NULL, NULL, '2016-12-21 17:25:50', '2016-12-21 17:25:50'),
(109, 8, 'products/96879_quan.jpg', 'thumbnails/994e485ad20500ca26dfa955a3ce09b6.jpg', NULL, NULL, '2016-12-21 17:26:57', '2016-12-21 17:26:57'),
(110, 10, 'products/13361_slide-01.jpg', 'thumbnails/a7f05a393faa27a6e23acc8fdd7cd91d.jpg', NULL, NULL, '2016-12-21 19:33:16', '2016-12-21 19:33:16'),
(111, 37, 'products/4001_051112_0545_mtrng81.jpg', 'thumbnails/0545a91f095e532ac813d11bab3caab9.jpg', NULL, NULL, '2016-12-29 20:58:02', '2016-12-29 20:58:02'),
(112, 37, 'products/62830_dui.jpg', 'thumbnails/e242727adb2a8f4efe690e228a7e3633.jpg', NULL, NULL, '2016-12-29 20:58:03', '2016-12-29 20:58:03'),
(113, 39, 'products/16410_AndroidPIT-Samsung-galaxy-s7-edge-11-review-w782.jpg', 'thumbnails/725dc7b3684b064cb99c9637f899f5bd.jpg', NULL, NULL, '2016-12-29 21:05:55', '2016-12-29 21:05:55'),
(114, 39, 'products/87226_docomo-galaxy-s7-sc-02h-photo-review.jpg', 'thumbnails/9c6c704176c6d4a8377b46a41529cee6.jpg', NULL, NULL, '2016-12-29 21:05:55', '2016-12-29 21:05:55'),
(115, 39, 'products/60862_galaxy-s7-fecha-1060x596.jpg', 'thumbnails/23e00e605a5611536be8ffae460d7a11.jpg', NULL, NULL, '2016-12-29 21:05:55', '2016-12-29 21:05:55'),
(116, 39, 'products/48108_Samsung-Galaxy-S7-Edge-photos-16-840x560.jpg', 'thumbnails/2e8ea2918b6ec77f0825aae22ef1012d.jpg', NULL, NULL, '2016-12-29 21:05:55', '2016-12-29 21:05:55'),
(117, 39, 'products/187_Samsung-Galaxy-S7-water-resistance-DSC01927.jpg', 'thumbnails/b6063b03fb6a2b7d28eef751d86faf2b.jpg', NULL, NULL, '2016-12-29 21:05:56', '2016-12-29 21:05:56'),
(121, 38, 'products/28544_docomo-galaxy-s7-sc-02h-photo-review.jpg', 'thumbnails/6163a9606f7f66d3eaa6bf9cb0685e51.jpg', NULL, NULL, '2016-12-29 21:08:42', '2016-12-29 21:08:42'),
(122, 38, 'products/97309_galaxy-s7-fecha-1060x596.jpg', 'thumbnails/b917f92d73e79dea31f4e5a33db32626.jpg', NULL, NULL, '2016-12-29 21:08:42', '2016-12-29 21:08:42'),
(123, 38, 'products/97410_Samsung-Galaxy-S7-water-resistance-DSC01927.jpg', 'thumbnails/5a0f7529c245503a7e89d7b2e0ef6705.jpg', NULL, NULL, '2016-12-29 21:08:43', '2016-12-29 21:08:43'),
(124, 47, 'products/55341_apple (1).jpeg', 'thumbnails/45c49b13910ee7f244c03890ed0bde41.jpeg', NULL, NULL, '2017-01-11 09:44:56', '2017-01-11 09:44:56'),
(125, 47, 'products/10422_apple (5).jpg', 'thumbnails/22429072a20d96a26d517b5daac63f78.jpg', NULL, NULL, '2017-01-11 09:44:56', '2017-01-11 09:44:56'),
(126, 47, 'products/75208_apple (6).jpg', 'thumbnails/d011d9a7542278397932596fc7169ecc.jpg', NULL, NULL, '2017-01-11 09:44:57', '2017-01-11 09:44:57'),
(127, 48, 'products/8304_samsung (1).jpg', 'thumbnails/f110775fe951a5ad3c5a2474db21c8ac.jpg', NULL, NULL, '2017-01-11 10:14:32', '2017-01-11 10:14:32'),
(128, 48, 'products/53730_samsung (2).jpg', 'thumbnails/1b34d97f4fee71438d373c239cf727ab.jpg', NULL, NULL, '2017-01-11 10:14:32', '2017-01-11 10:14:32'),
(129, 48, 'products/59787_samsung (4).jpg', 'thumbnails/36752401fd77a433ee70976856b6788c.jpg', NULL, NULL, '2017-01-11 10:14:32', '2017-01-11 10:14:32'),
(132, 51, 'products/30674_samsung (1).jpg', 'thumbnails/0a1f3f9f0fb5ea77c5faf77ecc383c14.jpg', NULL, NULL, '2017-01-11 10:32:20', '2017-01-11 10:32:20'),
(133, 51, 'products/63868_samsung (2).jpg', 'thumbnails/88ffcca30a320d851db015a75b39a32c.jpg', NULL, NULL, '2017-01-11 10:32:20', '2017-01-11 10:32:20'),
(134, 51, 'products/99198_samsung (6).jpg', 'thumbnails/aa9b7cb949159a5f2ea515300de340cb.jpg', NULL, NULL, '2017-01-11 10:32:21', '2017-01-11 10:32:21'),
(135, 46, 'products/58100_asus_zenfone_3_deluxe_gold.jpg', 'thumbnails/7473b135d6cfd1dc12359a1aa571cafd.jpg', NULL, NULL, '2017-01-13 11:40:26', '2017-01-13 11:40:26'),
(136, 45, 'products/98630_laser.jpg', 'thumbnails/0a4be4d4a6b0b73b82e4f7efe0289143.jpg', NULL, NULL, '2017-01-13 11:40:37', '2017-01-13 11:40:37'),
(137, 44, 'products/58082_92201585041PM_635_xperia_z5.jpeg', 'thumbnails/3c888548f910b39f56c191dab3b29719.jpeg', NULL, NULL, '2017-01-13 11:40:47', '2017-01-13 11:40:47'),
(138, 43, 'products/8509_sony-xperia-z5-product.jpg', 'thumbnails/9e111a5d9e57f5d48bcebc7301814d25.jpg', NULL, NULL, '2017-01-13 11:40:59', '2017-01-13 11:40:59'),
(139, 42, 'products/59281_sony-xperia-z5-product-11.jpg', 'thumbnails/8ddbe82e6a63fc558122c2ccacf55133.jpg', NULL, NULL, '2017-01-13 11:41:12', '2017-01-13 11:41:12'),
(140, 41, 'products/31009_vePhGDwYMVPMxTylqL4WEC0yHnZh.jpg', 'thumbnails/532b6c384a471ee25f754e9c96fc731a.jpg', NULL, NULL, '2017-01-13 11:41:31', '2017-01-13 11:41:31'),
(141, 40, 'products/3583_92201585041PM_635_xperia_z5.jpeg', 'thumbnails/fc9fdc151a6d6170879b875634a836cd.jpeg', NULL, NULL, '2017-01-13 11:42:01', '2017-01-13 11:42:01'),
(142, 52, 'products/7978_11.jpg', 'thumbnails/2656c1e5ccda5f29dadfa163eef9c3aa.jpg', NULL, NULL, '2017-02-03 14:44:17', '2017-02-03 14:44:17'),
(143, 52, 'products/97825_12.jpg', 'thumbnails/00bf8ab631a6c5063d808513dbd2eb99.jpg', NULL, NULL, '2017-02-03 14:44:18', '2017-02-03 14:44:18'),
(144, 53, 'products/94105_thumb-box1.png', 'thumbnails/07ff15079390f1058ead74102d636866.png', NULL, NULL, '2017-02-07 16:48:06', '2017-02-07 16:48:06'),
(145, 53, 'products/63761_thumb-box2.png', 'thumbnails/ba107ecabfcec5f3f07fc971387596c8.png', NULL, NULL, '2017-02-07 16:48:06', '2017-02-07 16:48:06'),
(146, 57, 'products/92069_ad4.jpg', 'thumbnails/ad11071cd5d1f9fbdb04cc8e355227bd.jpg', NULL, NULL, '2017-02-07 17:47:14', '2017-02-07 17:47:14'),
(147, 56, 'products/35468_sl1.jpg', 'thumbnails/50d16b0694ab8df9afb5b854203f72a6.jpg', NULL, NULL, '2017-02-07 18:08:25', '2017-02-07 18:08:25'),
(148, 55, 'products/68845_sl2.jpg', 'thumbnails/b97fd02cc435d230ddb4b1f2baaa0b4d.jpg', NULL, NULL, '2017-02-07 18:08:45', '2017-02-07 18:08:45'),
(149, 54, 'products/19260_sl3.jpg', 'thumbnails/ccf4a1a66a9f5293b2a886b04d816eb8.jpg', NULL, NULL, '2017-02-07 18:09:01', '2017-02-07 18:09:01'),
(150, 58, 'products/65445_airblade.jpg', 'thumbnails/57582bd680d23559eeb957a6b2a0515c.jpg', NULL, NULL, '2017-02-09 09:04:46', '2017-02-09 09:04:46'),
(151, 58, 'products/75861_sl1.jpg', 'thumbnails/6269679f010541680039d661868576b6.jpg', NULL, NULL, '2017-02-09 09:04:46', '2017-02-09 09:04:46'),
(152, 58, 'products/90854_sl2.jpg', 'thumbnails/efdc32c398bfee1fbe69fc0155693f58.jpg', NULL, NULL, '2017-02-09 09:04:46', '2017-02-09 09:04:46'),
(153, 59, 'products/76023_11.jpg', 'thumbnails/26e716d3ec0fdf21bfae133ce0b56f40.jpg', NULL, NULL, '2017-02-09 09:11:26', '2017-02-09 09:11:26'),
(154, 59, 'products/38172_12.jpg', 'thumbnails/c00023641cb8cde864d17c36592bc5f3.jpg', NULL, NULL, '2017-02-09 09:11:26', '2017-02-09 09:11:26'),
(155, 59, 'products/4606_obuvki.jpg', 'thumbnails/fb47aa6d53ab802f96abdce0c1829f54.jpg', NULL, NULL, '2017-02-09 09:11:26', '2017-02-09 09:11:26'),
(156, 60, 'products/40711_samsung (1).jpg', 'thumbnails/2b2f8eea434736524345cf4247acb049.jpg', NULL, NULL, '2017-02-09 09:15:25', '2017-02-09 09:15:25'),
(157, 60, 'products/81363_samsung (2).jpg', 'thumbnails/9cf787e7a712a359a182b2fe0fe1230b.jpg', NULL, NULL, '2017-02-09 09:15:25', '2017-02-09 09:15:25'),
(158, 60, 'products/60920_samsung (4).jpg', 'thumbnails/7841c82baa8773d3fd2c3a18f23998a5.jpg', NULL, NULL, '2017-02-09 09:15:25', '2017-02-09 09:15:25'),
(159, 60, 'products/12241_samsung (5).jpg', 'thumbnails/c528bf0fe1456ec50de1179a91b79c5c.jpg', NULL, NULL, '2017-02-09 09:15:26', '2017-02-09 09:15:26'),
(160, 61, 'products/94318_airblade.jpg', 'thumbnails/f4aaf64a182b9757d6996a6e05381e3b.jpg', NULL, NULL, '2017-02-09 09:47:55', '2017-02-09 09:47:55'),
(161, 62, 'products/20041_samsung (4).jpg', 'thumbnails/8a460720be8cf9a94d9413fd8d6521da.jpg', NULL, NULL, '2017-02-10 17:51:00', '2017-02-10 17:51:00'),
(162, 62, 'products/98694_vePhGDwYMVPMxTylqL4WEC0yHnZh.jpg', 'thumbnails/e51f178ea3a2ef1547de294002e9c1ac.jpg', NULL, NULL, '2017-02-10 17:51:00', '2017-02-10 17:51:00'),
(163, 64, 'products/74283_4046131669309_01.JPG', 'thumbnails/6afd1c36f5892f6ab6608992d896750b.JPG', NULL, NULL, '2017-02-13 13:26:16', '2017-02-13 13:26:16'),
(164, 64, 'products/14191_4046131669309_03.JPG', 'thumbnails/a82d2cd24005126cbfb604064caa98ed.JPG', NULL, NULL, '2017-02-13 13:26:17', '2017-02-13 13:26:17'),
(165, 64, 'products/43833_4046131669637_01.JPG', 'thumbnails/87d17fe639540623746aa6bb9deaf941.JPG', NULL, NULL, '2017-02-13 13:26:17', '2017-02-13 13:26:17'),
(166, 64, 'products/60718_4046131669637_04.JPG', 'thumbnails/cb268988958df3443d66a0046618f607.JPG', NULL, NULL, '2017-02-13 13:26:17', '2017-02-13 13:26:17'),
(167, 65, 'products/17460_honda-lead-2016-6-768x721.jpg', 'thumbnails/d6952d46e7183f8178b4e31512335bdf.jpg', NULL, NULL, '2017-02-13 22:57:34', '2017-02-13 22:57:34'),
(168, 65, 'products/64155_honda-lead-2016-768x729.jpg', 'thumbnails/47de51f2e38e98655bc30a3ae557144f.jpg', NULL, NULL, '2017-02-13 22:57:34', '2017-02-13 22:57:34'),
(169, 66, 'products/7798_6272_iw4.jpg', 'thumbnails/d00b575d559d3b2dcc10c2397530792e.jpg', NULL, NULL, '2017-02-14 13:41:17', '2017-02-14 13:41:17'),
(170, 66, 'products/82886_10578_AppleWatch.jpeg', 'thumbnails/da60b73f0ae51994e2bb1f4a3cf87db1.jpeg', NULL, NULL, '2017-02-14 13:41:18', '2017-02-14 13:41:18'),
(171, 66, 'products/34720_14408_iw1.jpg', 'thumbnails/edfd22ce4b704cfca3c6e148bb5c9815.jpg', NULL, NULL, '2017-02-14 13:41:18', '2017-02-14 13:41:18'),
(172, 66, 'products/8075_25657_iw3.jpg', 'thumbnails/18a65985fff3c23ec9f38f44c650da2e.jpg', NULL, NULL, '2017-02-14 13:41:18', '2017-02-14 13:41:18'),
(173, 67, 'products/9397_giay-nu-dinh-dam-va-thoi-thuong-item-khong-the-thieu-trong-tu-do-mua-he-2.jpg', 'thumbnails/32e678f97a40bf393bcf7921f184ce7a.jpg', NULL, NULL, '2017-02-21 16:24:04', '2017-02-21 16:24:04');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(5) NOT NULL,
  `code` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(5) NOT NULL,
  `create_by` int(5) DEFAULT NULL,
  `status` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(5) DEFAULT NULL,
  `customer_id` int(5) NOT NULL,
  `outlet_id` int(5) DEFAULT NULL,
  `coupon_id` int(5) DEFAULT NULL,
  `payment_id` int(5) DEFAULT NULL,
  `partner_delivery_id` int(5) DEFAULT NULL,
  `total` decimal(15,2) NOT NULL,
  `customers_paid` decimal(15,2) NOT NULL,
  `money` decimal(15,2) NOT NULL,
  `return_money` decimal(15,2) NOT NULL,
  `discount` smallint(50) DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `code`, `user_id`, `create_by`, `status`, `type`, `customer_id`, `outlet_id`, `coupon_id`, `payment_id`, `partner_delivery_id`, `total`, `customers_paid`, `money`, `return_money`, `discount`, `note`, `created`, `modified`) VALUES
(1, '1', 3, 6, '1', NULL, 1, NULL, NULL, NULL, NULL, '45000.00', '42750.00', '42750.00', '0.00', 5, NULL, '2017-01-15 11:09:29', '2017-01-17 11:09:29'),
(2, '2', 5, 2, '1', NULL, 2, NULL, NULL, NULL, NULL, '7000000.00', '7000000.00', '7000000.00', '0.00', 0, NULL, '2017-01-19 11:11:32', '2017-01-17 11:11:32'),
(3, '3', 5, NULL, '1', NULL, 1, NULL, NULL, NULL, NULL, '5000.00', '4750.00', '23180.00', '0.00', 5, NULL, '2017-01-11 14:35:34', '2017-01-17 14:35:34'),
(4, '4', 2, NULL, '1', NULL, 8, NULL, NULL, NULL, NULL, '15000.00', '13500.00', '13500.00', '0.00', 10, NULL, '2017-01-12 14:39:15', '2017-01-17 14:39:15'),
(5, '5', 5, NULL, '1', NULL, 1, NULL, NULL, NULL, NULL, '8000000.00', '7600000.00', '18000000.00', '1000000.00', 5, NULL, '2017-01-23 16:31:03', '2017-01-17 16:31:03'),
(6, '6', 5, NULL, '1', NULL, 9, NULL, NULL, NULL, NULL, '3002111.00', '3002111.00', '23002111.00', '0.00', 0, NULL, '2017-01-17 17:15:03', '2017-01-17 17:15:03'),
(7, '7', 2, NULL, '1', NULL, 1, NULL, NULL, NULL, NULL, '8008000.00', '7207200.00', '7000000.00', '207200.00', 10, NULL, '2017-01-24 11:34:23', '2017-01-24 11:34:23'),
(8, '8', 2, NULL, '1', NULL, 1, NULL, NULL, NULL, NULL, '14800.00', '14800.00', '13000.00', '1800.00', 0, NULL, '2017-01-24 11:40:15', '2017-01-24 11:40:15'),
(9, '9', 6, NULL, '1', NULL, 9, NULL, NULL, NULL, NULL, '1350.00', '1282.50', '10451282.00', '0.00', 5, NULL, '2017-01-24 11:45:46', '2017-01-24 11:45:46'),
(10, '10', 2, NULL, '1', NULL, 1, NULL, NULL, NULL, NULL, '23000000.00', '22770000.00', '20000000.00', '2770000.00', 1, NULL, '2017-01-24 13:53:11', '2017-01-24 13:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_products`
--

CREATE TABLE `invoice_products` (
  `id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `invoice_id` int(5) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `quantity` int(50) NOT NULL DEFAULT '1',
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoice_products`
--

INSERT INTO `invoice_products` (`id`, `product_id`, `invoice_id`, `price`, `quantity`, `unit`, `created`, `modified`) VALUES
(1, 40, 1, '7000000.00', 1, NULL, '2017-01-17 11:11:32', '2017-01-17 11:11:32'),
(2, 21, 2, '8000000.00', 1, NULL, '2017-01-17 11:11:32', '2017-01-17 11:11:32'),
(6, 31, 3, '1000.00', 1, NULL, '2017-01-17 14:35:35', '2017-01-17 14:35:35'),
(7, 45, 4, '1000.00', 1, NULL, '2017-01-17 14:39:15', '2017-01-17 14:39:15'),
(8, 42, 4, '6000.00', 2, NULL, '2017-01-17 14:39:16', '2017-01-17 14:39:16'),
(9, 17, 4, '2000.00', 1, NULL, '2017-01-17 14:39:16', '2017-01-17 14:39:16'),
(10, 51, 5, '8000000.00', 1, NULL, '2017-01-17 16:31:03', '2017-01-17 16:31:03'),
(14, 47, 6, '3000000.00', 1, NULL, '2017-01-17 17:15:04', '2017-01-17 17:15:04'),
(15, 44, 6, '1111.00', 1, NULL, '2017-01-17 17:15:04', '2017-01-17 17:15:04'),
(16, 45, 6, '1000.00', 1, NULL, '2017-01-17 17:15:04', '2017-01-17 17:15:04'),
(17, 46, 7, '4000.00', 1, NULL, '2017-01-24 11:34:23', '2017-01-24 11:34:23'),
(18, 51, 7, '8000000.00', 1, NULL, '2017-01-24 11:34:23', '2017-01-24 11:34:23'),
(19, 21, 7, '4000.00', 1, NULL, '2017-01-24 11:34:23', '2017-01-24 11:34:23'),
(20, 17, 8, '2000.00', 3, NULL, '2017-01-24 11:40:15', '2017-01-24 11:40:15'),
(21, 27, 8, '3150.00', 2, NULL, '2017-01-24 11:40:15', '2017-01-24 11:40:15'),
(22, 26, 8, '2500.00', 1, NULL, '2017-01-24 11:40:15', '2017-01-24 11:40:15'),
(25, 38, 9, '350.00', 1, NULL, '2017-01-24 11:45:46', '2017-01-24 11:45:46'),
(26, 39, 9, '1000.00', 1, NULL, '2017-01-24 11:45:46', '2017-01-24 11:45:46'),
(27, 51, 10, '8000000.00', 2, NULL, '2017-01-24 13:53:11', '2017-01-24 13:53:11'),
(28, 48, 10, '12000000.00', 1, NULL, '2017-01-24 13:53:12', '2017-01-24 13:53:12'),
(29, 47, 10, '3000000.00', 1, NULL, '2017-01-24 13:53:12', '2017-01-24 13:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `event` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descriptions` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE `outlets` (
  `id` int(5) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `outlets`
--

INSERT INTO `outlets` (`id`, `name`, `tel`, `address`, `created`, `modified`) VALUES
(1, 'Center', '0976459551', 'Hà Đông - Hà Nội', '2016-12-16 09:30:42', NULL),
(2, 'chi nhanh 1', NULL, NULL, '2016-12-16 16:52:18', '2016-12-16 16:52:18'),
(3, 'chi nhanh 2', NULL, NULL, '2016-12-16 16:54:13', '2016-12-16 16:54:13'),
(4, 'Chi nhanh 3', NULL, NULL, '2016-12-16 16:54:29', '2016-12-16 16:54:29'),
(5, 'Chi nhanh 4', NULL, NULL, '2016-12-16 16:54:46', '2016-12-16 16:54:46'),
(6, 'Chi nhanh 5', NULL, NULL, '2016-12-16 16:56:19', '2016-12-16 16:56:19'),
(7, 'Chi nhanh 6', NULL, NULL, '2016-12-16 16:57:16', '2016-12-16 16:57:16'),
(8, 'Chi nhanh 7', '0988666444', 'Vân Đình - Ứng Hòa - Hà Nội', '2016-12-16 17:08:31', '2016-12-16 17:08:31');

-- --------------------------------------------------------

--
-- Table structure for table `partner_deliverys`
--

CREATE TABLE `partner_deliverys` (
  `id` int(5) NOT NULL,
  `code` int(5) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) DEFAULT '1',
  `tax_registration_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `partner_deliverys`
--

INSERT INTO `partner_deliverys` (`id`, `code`, `name`, `tel`, `address`, `location`, `fax`, `email`, `gender`, `tax_registration_number`, `note`, `created`, `modified`) VALUES
(1, 1, 'P1', '0976459551', 'HN', 'HN', NULL, 'quandv.125@gmail.com', 1, '345345', 'test', '2016-12-23 09:17:51', '2016-12-23 09:17:51'),
(2, 2, 'P2', '', '', '', NULL, '', 1, '', '', '2017-01-11 09:13:51', '2017-01-11 09:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(5) NOT NULL,
  `type` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(5) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `paid_amount` decimal(15,2) NOT NULL,
  `debt` decimal(15,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(5) NOT NULL,
  `sku` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categorie_id` int(2) NOT NULL,
  `outlet_id` int(2) DEFAULT NULL,
  `supplier_id` int(2) DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL,
  `actived` tinyint(1) NOT NULL DEFAULT '0',
  `status` int(2) DEFAULT NULL,
  `retail_price` decimal(15,2) DEFAULT NULL,
  `wholesale_price` decimal(15,2) DEFAULT NULL,
  `supply_price` decimal(15,2) DEFAULT NULL,
  `origin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(5) DEFAULT NULL,
  `maker_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serial_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stock_level` int(5) DEFAULT NULL,
  `unit` char(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'box, pack, crate',
  `variants` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'color, size',
  `rating` int(1) DEFAULT NULL,
  `short_description` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `stock_min` tinyint(50) DEFAULT NULL,
  `stock_max` tinyint(50) DEFAULT NULL,
  `ordering_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `product_name`, `categorie_id`, `outlet_id`, `supplier_id`, `user_id`, `actived`, `status`, `retail_price`, `wholesale_price`, `supply_price`, `origin`, `quantity`, `maker_name`, `type_model`, `serial_no`, `stock_level`, `unit`, `variants`, `rating`, `short_description`, `description`, `stock_min`, `stock_max`, `ordering_note`, `created`, `modified`) VALUES
(8, '223344', 'Ipad Mini', 24, 4, 1, NULL, 1, 1, '2.00', '450.00', '15.00', NULL, 5, NULL, NULL, NULL, 10, 'pack', NULL, NULL, '', 'this is description', 1, 10, 'this is order note', '2016-12-16 11:10:12', '2017-02-22 10:49:08'),
(10, '3123', 'Ipad Mini 3', 2, 7, 1, 2, 1, 1, '1500.00', '160.00', '900.00', NULL, NULL, NULL, NULL, NULL, 10, 'pack', NULL, NULL, NULL, 'test update product', 1, 10, NULL, '2016-12-16 15:10:06', '2016-12-21 19:33:16'),
(17, '5524', 'Iphone 6', 2, 1, 1, 2, 1, 0, '2000.00', '5000.00', '666.00', NULL, 1, NULL, NULL, NULL, 10, '', NULL, NULL, NULL, '', 1, 10, NULL, '2016-12-19 09:13:20', '2016-12-20 17:15:24'),
(18, '11534', 'Ipad Mini 5', 6, 5, 3, 2, 1, 1, '1000.00', '960.00', '900.00', NULL, 1, NULL, NULL, NULL, 10, 'pack', NULL, NULL, NULL, '', 1, 10, NULL, '2016-12-19 09:15:51', '2016-12-19 09:15:51'),
(20, '534', 'Iphone 5s', 5, 2, 1, 2, 1, 1, '350.00', '330.00', '300.00', NULL, 5, NULL, NULL, NULL, 10, 'pack', NULL, NULL, NULL, '', 1, 10, NULL, '2016-12-19 09:22:22', '2016-12-20 17:15:35'),
(21, '123456', 'zara', 3, 6, 3, 2, 1, 1, '4000.00', '4333.00', '2344.00', NULL, 8, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', 1, NULL, NULL, '2016-12-19 09:25:54', '2016-12-20 16:52:14'),
(22, '1234', 'LV', 2, 3, 1, 3, 1, 0, '700.00', '650.00', '600.00', NULL, NULL, NULL, NULL, NULL, 10, 'pack', NULL, NULL, NULL, 'test123', 1, 10, NULL, '2016-12-19 09:27:14', '2016-12-21 10:36:09'),
(24, '54524', 'iwatch', 4, 1, 1, 6, 1, 1, '2500.00', '2000.00', '1500.00', NULL, 1, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', 1, NULL, NULL, '2016-12-19 15:39:43', '2016-12-19 15:39:43'),
(26, '67533', 'canifa', 2, 1, 1, 5, 1, 1, '2500.00', '2000.00', '1500.00', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', 1, NULL, NULL, '2016-12-19 15:56:12', '2016-12-19 15:56:12'),
(27, '5675', 'canifa 2', 2, 1, 4, 5, 1, 1, '3150.00', '234.00', '6564.00', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', 1, NULL, NULL, '2016-12-19 15:57:16', '2016-12-21 11:13:24'),
(30, '34324', 'zara 1', 6, 1, 1, 5, 1, 1, '400.00', '350.00', '120.00', NULL, 1, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', 1, NULL, NULL, '2016-12-19 16:13:01', '2016-12-30 11:00:46'),
(31, '85675', 'zara 2', 5, 1, 4, 5, 1, 1, '1000.00', '330.00', '300.00', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', 1, NULL, NULL, '2016-12-19 16:28:31', '2016-12-19 16:28:31'),
(32, '45642', 'Iphone 61', 2, 1, 1, 6, 1, 1, '350.00', '960.00', '300.00', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', 1, NULL, NULL, '2016-12-19 16:29:15', '2016-12-19 16:29:15'),
(33, '23154', 'zara 5', 6, 1, 4, 3, 1, 1, '350.00', '330.00', '900.00', NULL, 6, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', 1, NULL, NULL, '2016-12-19 16:42:02', '2016-12-19 16:42:02'),
(34, '212341', 'zara 7', 6, 1, 4, 5, 1, 1, '232.00', '234.00', '222.00', NULL, 1, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', 1, NULL, NULL, '2016-12-19 16:43:02', '2016-12-19 16:43:02'),
(35, '1234', 'LV', 2, 3, 1, 5, 1, 1, '700.00', '650.00', '600.00', NULL, NULL, NULL, NULL, NULL, 10, 'pack', NULL, NULL, NULL, 'test123', 1, 10, NULL, '2016-12-21 17:14:10', '2016-12-21 17:14:10'),
(37, '85677', 'Samsung galaxy s6', 4, 5, 2, 6, 1, 1, '1000.00', NULL, '500.00', 'korea', 1, NULL, NULL, NULL, NULL, '', NULL, NULL, '', '', 1, NULL, NULL, '2016-12-29 19:45:39', '2017-02-13 11:55:41'),
(38, '85678', 'samsung galaxy s5', 4, 1, 1, 2, 1, 1, '350.00', '330.00', '300.00', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', 1, NULL, NULL, '2016-12-29 19:46:59', '2017-01-17 14:36:03'),
(39, '85679', 'samsung galaxy s7 EDGE', 2, 1, 1, 2, 1, 1, '1000.00', NULL, '600.00', NULL, 1, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', 1, NULL, NULL, '2016-12-29 19:47:48', '2016-12-29 21:05:55'),
(40, '85680', 'Samsung J5 prime', 5, 1, 3, 5, 1, 1, '7000000.00', '6000000.00', '4500000.00', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', 1, NULL, NULL, '2016-12-29 20:47:00', '2017-01-13 11:42:01'),
(41, '85681', 'HTC 10', 6, 1, 2, 2, 1, 1, '800.00', NULL, '700.00', NULL, 1, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', 1, NULL, NULL, '2016-12-30 14:35:45', '2017-01-13 11:41:30'),
(42, '85682', 'Sony Z1', 2, 1, 2, 3, 1, 1, '6000.00', '5000.00', '500.00', NULL, 1, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', 1, NULL, NULL, '2016-12-30 23:22:35', '2017-01-13 11:43:01'),
(43, '85683', 'sony z2', 2, 1, 2, 3, 1, 1, '5552.00', '4444.00', '600.00', NULL, 1, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', 1, NULL, NULL, '2016-12-30 23:24:11', '2017-01-13 11:43:14'),
(44, '85684', 'sony z3', 2, 1, 2, 3, 1, 1, '3000.00', '2000.00', '700.00', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', 1, NULL, NULL, '2016-12-30 23:24:43', '2017-01-19 09:22:07'),
(45, '85685', 'zendfone 1', 2, 1, 2, 3, 1, 1, '1000.00', '1400.00', '2000.00', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', 1, NULL, NULL, '2016-12-30 23:37:16', '2017-01-19 09:22:30'),
(46, '85686', 'zendfone 2', 2, 1, 2, 2, 1, 1, '4000.00', '2400.00', '1122.00', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', 1, NULL, NULL, '2016-12-30 23:38:42', '2017-01-13 11:40:26'),
(47, '85687', 'iwatch 25', 4, 6, 4, 2, 1, 1, '3000000.00', '2500.00', '2300.00', NULL, 10, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', 1, NULL, NULL, '2017-01-06 11:01:17', '2017-01-11 09:44:56'),
(48, '85688', 'Samsung Note 5', 5, 4, 3, 2, 1, 1, '12000000.00', '11000000.00', '10000000.00', NULL, NULL, NULL, NULL, NULL, 10, 'pack', NULL, NULL, NULL, 'tét', 1, 10, NULL, '2017-01-11 10:14:31', '2017-01-11 10:14:31');
INSERT INTO `products` (`id`, `sku`, `product_name`, `categorie_id`, `outlet_id`, `supplier_id`, `user_id`, `actived`, `status`, `retail_price`, `wholesale_price`, `supply_price`, `origin`, `quantity`, `maker_name`, `type_model`, `serial_no`, `stock_level`, `unit`, `variants`, `rating`, `short_description`, `description`, `stock_min`, `stock_max`, `ordering_note`, `created`, `modified`) VALUES
(51, '85689', 'Samsung Note 4', 2, 1, 2, 3, 1, 1, '8000000.00', '7500000.00', '6000000.00', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '<p>Description 1</p><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAIAAAADnC86AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAx9pVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDIxIDc5LjE1NDkxMSwgMjAxMy8xMC8yOS0xMTo0NzoxNiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RTZENzMxMkMzMkJFMTFFNTk1Mjg4MzFGRTVGRDM5QjAiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RTZENzMxMkIzMkJFMTFFNTk1Mjg4MzFGRTVGRDM5QjAiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIFdpbmRvd3MiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDowODc1NzZGQTk3RTYxMUU0OUM1N0Y2QUZGNEY3RTM4MCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDowODc1NzZGQjk3RTYxMUU0OUM1N0Y2QUZGNEY3RTM4MCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PlxUwkAAAAydSURBVHjaVFhZbFxXGb77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" data-filename="avatar1.png" style="width: 40px;"><p><br></p>', '<p>Description 2</p><p><br></p><img src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAABQAAD/4QNvaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjMtYzAxMSA2Ni4xNDU2NjEsIDIwMTIvMDIvMDYtMTQ6NTY6MjcgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6NjFCRkE5NDBFOUVBRTMxMTlDQUI4RENFQzY5MjIwNUQiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RjQ3QTZGODZFMjZFMTFFNTgxNEFCNjdFQzNBNUVDQjMiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RjQ3QTZGODVFMjZFMTFFNTgxNEFCNjdFQzNBNUVDQjMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoyREUzNDM2NEZBRDFFNTExQTczOUE4NUJGRTQ4MEUyMCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo2MUJGQTk0MEU5RUFFMzExOUNBQjhEQ0VDNjkyMjA1RCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6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" data-filename="bn2.jpg" style="width: 758px;"><p><br></p>', 1, NULL, NULL, '2017-01-11 10:32:20', '2017-02-07 15:44:22');
INSERT INTO `products` (`id`, `sku`, `product_name`, `categorie_id`, `outlet_id`, `supplier_id`, `user_id`, `actived`, `status`, `retail_price`, `wholesale_price`, `supply_price`, `origin`, `quantity`, `maker_name`, `type_model`, `serial_no`, `stock_level`, `unit`, `variants`, `rating`, `short_description`, `description`, `stock_min`, `stock_max`, `ordering_note`, `created`, `modified`) VALUES
(52, '85690', 'canifa 4', 2, 1, 2, 2, 1, 1, '6.00', '5.00', '1.50', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Máy in laser trắng đen\r\nKhay nạp giấy 150 trang\r\nĐộ phân giải 2400 x 600 dpi\r\nKết nối USB 2.0\r\nThiết kế nhỏ gọn và thời trang', '<h2 class="product-description__title" style="margin: 0px 0px 17px; padding: 0px; font-weight: 700; font-size: 16px; line-height: 2.4rem; color: rgb(64, 64, 64); font-family: Helvetica, Arial, sans-serif;"><br></h2>', 1, NULL, NULL, '2017-02-03 14:44:16', '2017-02-21 15:28:43'),
(53, '85691', 'iwatch', 2, NULL, 1, 5, 1, 1, '1000.00', NULL, NULL, 'Korea', 1, NULL, NULL, NULL, 1, '', NULL, NULL, '', '', 1, NULL, NULL, '2017-02-07 16:48:06', '2017-02-07 16:48:06'),
(54, '54-23A-21', 'iwatch 123', 2, 1, 1, 4, 1, 1, '3000.00', NULL, NULL, 'Korea', 1, NULL, NULL, NULL, 1, '', NULL, NULL, '', '', 1, NULL, NULL, '2017-02-07 16:50:46', '2017-02-07 18:09:01'),
(55, '54-23A-211', 'iwatch 1234', 2, 1, 1, 3, 1, 1, '6000.00', NULL, NULL, 'Korea', 1, NULL, NULL, NULL, 1, '', NULL, NULL, '', '', 1, NULL, NULL, '2017-02-07 16:52:31', '2017-02-07 18:08:45'),
(56, 'D54-23A-C21', 'canifa 123', 2, 1, 1, 2, 1, 1, '1000.00', NULL, NULL, 'Korea', 1, NULL, NULL, NULL, 1, '', NULL, NULL, '', '', 1, NULL, NULL, '2017-02-07 16:55:12', '2017-02-07 18:08:24'),
(57, 'Y45-453A', 'Wave 110', 19, 1, 1, 6, 1, 1, '1000.00', NULL, NULL, 'Korea', 1, NULL, NULL, NULL, 1, '', NULL, NULL, '', '', 1, NULL, NULL, '2017-02-07 17:47:13', '2017-02-13 11:51:13'),
(58, '1', 'Air Blade 2017', 29, 1, 3, 5, 1, 1, '2500.00', NULL, NULL, 'Korea', 1, NULL, NULL, NULL, 1, '', NULL, NULL, '', '<h3><strong>Đ&aacute;nh gi&aacute; Honda Airblade 2017 đen mờ</strong></h3>\r\n\r\n<p>V&agrave;o dịp mua sắm cuối năm, c&aacute;c h&atilde;ng xe đều tung ra những chi&ecirc;u thức chi&ecirc;u thị kh&aacute;ch h&agrave;ng, trong đ&oacute; c&oacute; thể kể đến l&agrave; tung ra h&agrave;ng loạt những d&ograve;ng xe cho từng phi&ecirc;n bản m&agrave;u kh&aacute;c nhau để người d&ugrave;ng chọn lựa dễ d&agrave;ng hơn.&nbsp;Theo Honda Việt Nam, kh&aacute;c biệt so với m&agrave;u sơn thường, m&agrave;u sơn đen mờ mới đem đến cho người d&ugrave;ng sức cuốn h&uacute;t v&agrave; tạo n&ecirc;n phong c&aacute;ch mạnh mẽ nhưng vẫn kh&ocirc;ng k&eacute;m phần lịch l&atilde;m.</p>\r\n\r\n<p><img alt="honda-air-blade-125cc-2017-den-mo-1" src="http://blogxe.vn/wp-content/uploads/2016/11/honda-air-blade-125cc-2017-den-mo-1.jpg" style="height:412px; width:660px" /></p>\r\n\r\n<p>Bề ngo&agrave;i, Honda Air Blade 125cc đen mờ b&ecirc;n cạnh m&agrave;u mới ấn tượng nhưng vẫn ch&uacute; trọng tạo điểm nhấn nhờ bộ tem xe v&agrave; logo sơn đỏ mới. Những đường viền đỏ chạy dọc vuốt nhọn tr&ecirc;n th&acirc;n v&agrave; yếm xe c&ugrave;ng họa tiết của bộ logo sơn đỏ v&agrave; logo Black Edition tạo th&ecirc;m n&eacute;t kh&aacute;c biệt. Đ&acirc;y hứa hẹn sẽ l&agrave; sự th&iacute;ch th&uacute; v&agrave; trải nghiệm mới của kh&aacute;ch h&agrave;ng, những người y&ecirc;u xe tr&ecirc;n khắp cả nước.</p>\r\n\r\n<p><img alt="honda-air-blade-125cc-2017-den-mo" src="http://blogxe.vn/wp-content/uploads/2016/11/honda-air-blade-125cc-2017-den-mo.jpg" style="height:420px; width:640px" /></p>\r\n\r\n<p>Một v&agrave;i tiện &iacute;ch nữa kh&ocirc;ng thay đổi qu&aacute; nhiều để người d&ugrave;ng kh&ocirc;ng bỡ ngỡ như hộc đồ dưới y&ecirc;n chứa 2 mũ bảo hiểm nửa đầu c&ugrave;ng vật dụng c&aacute; nh&acirc;n. Được k&iacute;ch hoạt hệ thống trang bị an to&agrave;n với kh&oacute;a đa năng, quanh ổ kh&oacute;a th&ecirc;m đ&egrave;n LED, xe cũng được t&iacute;ch hợp m&agrave;n h&igrave;nh LCD, c&ocirc;ng tắc mở y&ecirc;n v&agrave; b&igrave;nh xăng hay n&uacute;t bấm t&igrave;m vị tr&iacute; xe.&nbsp;Ch&acirc;n chống điện, hệ thống phanh kết hợp CBS. Hệ thống định vị gi&uacute;p dễ d&agrave;ng t&igrave;m xe trang bị tr&ecirc;n bản cao cấp v&agrave; sơn từ t&iacute;nh. AirBlade 2017 nằm c&ugrave;ng ph&acirc;n kh&uacute;c với Nouvo, nhưng Yamaha đ&atilde; khai tử d&ograve;ng xe n&agrave;y v&agrave; chuẩn bị ra mắt sản phẩm mới thay thế v&agrave;o th&aacute;ng 12. Theo dự kiến, Honda AirBlade bản đen mờ chắc chắn sẽ đ&aacute;p ứng mọi nguyện vọng của kh&aacute;ch h&agrave;ng khi muốn sở hữu một chiếc xe vừa kh&ocirc;ng thay đổi nhiều về ngoại h&igrave;nh, vừa đẹp mắt m&agrave; gi&aacute; cả cũng phải chăng.</p>\r\n', 1, NULL, NULL, '2017-02-09 09:04:46', '2017-02-17 14:31:13'),
(59, '1', 'Khan', 28, NULL, 1, 5, 1, 1, '1000.00', NULL, NULL, '', NULL, NULL, NULL, NULL, 1, '', NULL, NULL, '', '', 1, NULL, NULL, '2017-02-09 09:11:26', '2017-02-09 09:11:26'),
(60, '1', 'note 3', 22, NULL, 1, 5, 1, 1, '1000.00', NULL, NULL, '', NULL, NULL, NULL, NULL, 1, '', NULL, NULL, '', '', 1, NULL, NULL, '2017-02-09 09:15:25', '2017-02-09 09:15:25'),
(61, '1', 'Air Blade 2016', 2, NULL, 1, 5, 1, 0, '2500.00', NULL, NULL, '', NULL, NULL, NULL, NULL, 1, '', NULL, NULL, '', '', 1, NULL, NULL, '2017-02-09 09:47:55', '2017-02-09 09:47:55'),
(62, '5491', 'civic', 30, 1, 3, 5, 1, 0, '1000.00', NULL, NULL, 'Korea', 1, NULL, NULL, NULL, 1, '', NULL, NULL, '', '', 1, NULL, NULL, '2017-02-10 17:50:59', '2017-02-10 17:50:59'),
(64, '5675', 'SH 150i', 2, 2, 3, 6, 1, NULL, '1000.00', NULL, NULL, 'Korea', 10, NULL, NULL, NULL, 1, '', NULL, NULL, 'argue about petty and trivial matters. whenever the phone rings, they bicker over who must answer it', '<p><strong>Asus E403NA</strong>&nbsp;l&agrave; mẫu laptop thuộc d&ograve;ng VivoBook mới của Asus, sở hữu kiểu d&aacute;ng đẹp mắt với lớp vỏ kim loại nh&ocirc;m phay xước v&ocirc; c&ugrave;ng lịch l&atilde;m. Laptop&nbsp;<strong>Asus E403NA</strong>&nbsp;hướng đến t&iacute;nh cơ động cao, mỏng chỉ 17.9mm v&agrave; nhẹ chỉ 1.5Kg l&yacute; tưởng để mang theo b&ecirc;n bạn bất kỳ nơi đ&acirc;u. Một điểm đặc biệt của mẫu laptop mới n&agrave;y c&ograve;n nằm ở cổng USB 3.1 Type-C với k&iacute;ch thước nhỏ chỉ bằng 1/3 k&iacute;ch thước cổng USB th&ocirc;ng thường cho ph&eacute;p truyền tải dữ liệu với tốc độ nhanh ch&oacute;ng.</p>\r\n\r\n<p><img alt="Asus-E403NA" src="http://hcm.lazada.vn/static/content/Laptop/Asus-E403NA-body.jpg" /></p>\r\n\r\n<p><strong>Mỏng nhẹ v&agrave; phong c&aacute;ch</strong><br />\r\nLaptop&nbsp;<strong>Asus E403NA</strong>&nbsp;g&acirc;y ấn tượng với lớp vỏ ngo&agrave;i l&agrave;m từ chất liệu hợp kim nh&ocirc;m phay xước, mang lại vẻ hiện đại v&agrave; trang nh&atilde; cho thiết bị, đồng thời tạo cảm gi&aacute;c cứng c&aacute;p, chắc chắn. Với khối lượng chỉ 1.5 kg v&agrave; k&iacute;ch thước bề d&agrave;y chỉ 17.9 mm, đ&acirc;y l&agrave; chiếc laptop c&oacute; t&iacute;nh di động cao, cho ph&eacute;p người d&ugrave;ng dễ d&agrave;ng mang theo m&aacute;y b&ecirc;n m&igrave;nh để phục vụ cho mục đ&iacute;ch học tập v&agrave; l&agrave;m việc.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="Asus-E403NA" src="http://hcm.lazada.vn/static/content/Laptop/Asus-E403NA-01.jpg" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>H&igrave;nh ảnh tuyệt hảo với c&ocirc;ng nghệ Asus Splendid</strong><br />\r\n<strong>Asus E403NA</strong>&nbsp;sử dụng m&agrave;n h&igrave;nh 14 inch đạt chuẩn ph&acirc;n giải HD (1366x768 px). Sự c&oacute; mặt của c&ocirc;ng nghệ Asus Splendid cho ph&eacute;p người d&ugrave;ng t&ugrave;y chỉnh m&agrave;u sắc của h&igrave;nh ảnh sao ph&ugrave; hợp nhất với cảm nhận của mắt, từ đ&oacute; c&oacute; được những trải nghiệm thoải m&aacute;i v&agrave; dễ chịu.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="Asus-E403NA" src="http://hcm.lazada.vn/static/content/Laptop/Asus-E403NA-04.jpg" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Cổng USB 3.1 Type-C</strong><br />\r\nLaptop&nbsp;<strong>Asus E403NA</strong>&nbsp;đặc biệt được trang bị cổng USB 3.1 Type-C c&oacute; tốc độ truyền tải dữ liệu nhanh gấp 20 lần so với cổng USB 2.0 truyền thống. Ngo&agrave;i ra, n&oacute; c&ograve;n cho ph&eacute;p người d&ugrave;ng cắm d&acirc;y c&aacute;p v&agrave;o theo 2 đầu bất kỳ m&agrave; kh&ocirc;ng cần ph&acirc;n biệt như trước.</p>\r\n', 1, NULL, NULL, '2017-02-13 13:26:16', '2017-02-14 00:29:39'),
(65, '123123A', 'Honda Lead 135', 2, 2, 3, 6, 1, NULL, '100000.00', NULL, NULL, 'Korea', 10, 'Honda', '', '', 1, '', NULL, NULL, 'argue about petty and trivial matters. whenever the phone rings, they bicker over who must answer it', '<p><strong>Asus E403NA</strong>&nbsp;l&agrave; mẫu laptop thuộc d&ograve;ng VivoBook mới của Asus, sở hữu kiểu d&aacute;ng đẹp mắt với lớp vỏ kim loại nh&ocirc;m phay xước v&ocirc; c&ugrave;ng lịch l&atilde;m. Laptop&nbsp;<strong>Asus E403NA</strong>&nbsp;hướng đến t&iacute;nh cơ động cao, mỏng chỉ 17.9mm v&agrave; nhẹ chỉ 1.5Kg l&yacute; tưởng để mang theo b&ecirc;n bạn bất kỳ nơi đ&acirc;u. Một điểm đặc biệt của mẫu laptop mới n&agrave;y c&ograve;n nằm ở cổng USB 3.1 Type-C với k&iacute;ch thước nhỏ chỉ bằng 1/3 k&iacute;ch thước cổng USB th&ocirc;ng thường cho ph&eacute;p truyền tải dữ liệu với tốc độ nhanh ch&oacute;ng.</p>\r\n\r\n<p><img alt="Asus-E403NA" src="http://hcm.lazada.vn/static/content/Laptop/Asus-E403NA-body.jpg" /></p>\r\n\r\n<p><strong>Mỏng nhẹ v&agrave; phong c&aacute;ch</strong><br />\r\nLaptop&nbsp;<strong>Asus E403NA</strong>&nbsp;g&acirc;y ấn tượng với lớp vỏ ngo&agrave;i l&agrave;m từ chất liệu hợp kim nh&ocirc;m phay xước, mang lại vẻ hiện đại v&agrave; trang nh&atilde; cho thiết bị, đồng thời tạo cảm gi&aacute;c cứng c&aacute;p, chắc chắn. Với khối lượng chỉ 1.5 kg v&agrave; k&iacute;ch thước bề d&agrave;y chỉ 17.9 mm, đ&acirc;y l&agrave; chiếc laptop c&oacute; t&iacute;nh di động cao, cho ph&eacute;p người d&ugrave;ng dễ d&agrave;ng mang theo m&aacute;y b&ecirc;n m&igrave;nh để phục vụ cho mục đ&iacute;ch học tập v&agrave; l&agrave;m việc.</p>\r\n', 1, NULL, NULL, '2017-02-13 22:57:33', '2017-02-21 11:50:46'),
(66, '54-23A-2123', 'iwatch 5', 24, 1, 1, 5, 1, 1, '1000.00', NULL, NULL, 'Korea', 1, NULL, NULL, NULL, 1, '', NULL, NULL, '<p>contact us: 1111</p>\r\n', '<p>contact us: 2222</p>\r\n', 1, NULL, NULL, '2017-02-14 13:41:17', '2017-02-22 10:49:21'),
(67, '54-23A-21', 'iwatch12 quan', 7, NULL, 2, 6, 1, NULL, '1000.00', NULL, NULL, 'Korea', 10, '', '1', '1', 1, '', NULL, NULL, '<p>&nbsp;</p>\r\n\r\n<p>Remark/ Short Description</p>\r\n', '', 1, NULL, NULL, '2017-02-21 16:24:04', '2017-02-21 16:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(5) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` tinyint(50) DEFAULT NULL,
  `descriptions` text COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(5) NOT NULL,
  `code` int(5) NOT NULL,
  `user_id` int(5) DEFAULT NULL,
  `supplier_id` int(5) DEFAULT NULL,
  `total_quantity` int(5) DEFAULT NULL,
  `total_price` decimal(15,2) DEFAULT NULL,
  `discount_stock` tinyint(10) DEFAULT NULL,
  `final_price` decimal(15,2) DEFAULT NULL,
  `actions` tinyint(2) DEFAULT NULL,
  `payment` int(5) DEFAULT NULL,
  `tel` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `code`, `user_id`, `supplier_id`, `total_quantity`, `total_price`, `discount_stock`, `final_price`, `actions`, `payment`, `tel`, `address`, `note`, `created`, `modified`) VALUES
(6, 1, 2, 1, 2, '500.00', 5, '500.00', 1, 1, NULL, NULL, NULL, '2016-10-20 00:00:00', '2016-12-31 00:24:37'),
(7, 2, 3, 2, 16, '9200.00', 0, '9200.00', 1, 1, NULL, NULL, NULL, '2016-12-15 00:00:00', '2016-12-31 07:34:53'),
(8, 3, 2, 4, 0, '1500.00', 0, '1500.00', 1, 1, NULL, NULL, NULL, '2016-12-22 00:00:00', '2016-12-31 07:39:49'),
(9, 4, 5, 1, 0, '4000.00', 0, '4000.00', 1, 1, NULL, NULL, NULL, '2016-12-02 00:00:00', '2016-12-31 07:39:52'),
(10, 5, 6, 4, 0, '3000.00', 0, '3000.00', 1, 1, NULL, NULL, NULL, '2016-12-31 00:00:00', '2016-12-31 07:40:05'),
(11, 6, 6, 3, 2, '2500.00', 0, '2500.00', 1, 1, NULL, NULL, NULL, '2016-11-10 00:00:00', '2016-12-31 07:41:27'),
(12, 7, 3, 3, 3, '2100.00', 10, '1890.00', 1, 1, NULL, NULL, NULL, '2016-11-17 00:00:00', '2016-12-31 08:11:52'),
(13, 8, 6, 2, 10, '9000.00', 10, '8100.00', 1, 1, NULL, NULL, NULL, '2017-01-01 00:00:00', '2016-12-31 09:36:25'),
(14, 9, 5, 3, 15, '25000.00', 5, '23750.00', 1, 1, NULL, NULL, NULL, '2017-01-04 00:00:00', '2017-01-04 14:29:13'),
(15, 10, 2, 1, 15, '19000.00', 10, '17100.00', 1, 1, NULL, NULL, NULL, '2017-01-04 00:00:00', '2017-01-04 14:30:06'),
(16, 11, 2, 1, 4, '5000.00', 0, '5000.00', 1, 1, NULL, NULL, NULL, '2017-01-10 00:00:00', '2017-01-10 14:49:52'),
(18, 12, 2, 1, 1, '1000.00', 0, '1000.00', 1, 1, NULL, NULL, NULL, '2017-01-10 00:00:00', '2017-01-10 15:13:26'),
(19, 13, 2, 1, 4, '4000.00', 0, '4000.00', 1, 1, NULL, NULL, NULL, '2017-01-10 00:00:00', '2017-01-10 15:13:52'),
(20, 14, 2, 1, 1, '900.00', 5, '855.00', 1, 1, NULL, NULL, NULL, '2017-01-11 00:00:00', '2017-01-11 16:37:33'),
(21, 15, 5, 1, 27, '6689200.00', 0, '6689200.00', 1, 1, NULL, NULL, NULL, '2017-01-13 00:00:00', '2017-01-12 16:28:04'),
(22, 16, 6, 3, 20, '99940.00', 0, '99940.00', 1, 1, NULL, NULL, NULL, '2017-01-23 00:00:00', '2017-01-23 13:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `stock_products`
--

CREATE TABLE `stock_products` (
  `id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `stock_id` int(5) NOT NULL,
  `quantity` int(5) DEFAULT NULL,
  `discount` int(5) DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stock_products`
--

INSERT INTO `stock_products` (`id`, `product_id`, `stock_id`, `quantity`, `discount`, `price`, `created`, `modified`) VALUES
(4, 8, 6, 1, 10, NULL, '2016-12-31 00:24:37', '2016-12-31 00:24:37'),
(5, 30, 6, 1, 5, NULL, '2016-12-31 00:24:37', '2016-12-31 00:24:37'),
(6, 42, 7, 5, 0, NULL, '2016-12-31 07:34:53', '2016-12-31 07:34:53'),
(7, 39, 7, 10, 0, NULL, '2016-12-31 07:34:53', '2016-12-31 07:34:53'),
(8, 41, 7, 1, 0, NULL, '2016-12-31 07:34:53', '2016-12-31 07:34:53'),
(9, 24, 11, 1, 0, NULL, '2016-12-31 07:41:27', '2016-12-31 07:41:27'),
(10, 40, 11, 1, 0, NULL, '2016-12-31 07:41:28', '2016-12-31 07:41:28'),
(11, 10, 12, 1, 0, NULL, '2016-12-31 08:11:53', '2016-12-31 08:11:53'),
(14, 39, 13, 10, 10, '1000.00', '2016-12-31 09:36:25', '2016-12-31 09:36:25'),
(16, 39, 14, 5, 0, '1000.00', '2017-01-04 14:29:13', '2017-01-04 14:29:13'),
(18, 41, 15, 10, 5, '1000.00', '2017-01-04 14:30:06', '2017-01-04 14:30:06'),
(20, 39, 16, 1, 0, '1500.00', '2017-01-10 14:49:52', '2017-01-10 14:49:52'),
(24, 42, 16, 1, 0, '1000.00', '2017-01-10 14:49:52', '2017-01-10 14:49:52'),
(25, 30, 16, 1, 0, '2000.00', '2017-01-10 14:49:52', '2017-01-10 14:49:52'),
(26, 24, 16, 1, 0, '500.00', '2017-01-10 14:49:52', '2017-01-10 14:49:52'),
(28, 47, 18, 1, 0, '1000.00', '2017-01-10 15:13:26', '2017-01-10 15:13:26'),
(29, 47, 19, 4, 0, '1000.00', '2017-01-10 15:13:52', '2017-01-10 15:13:52'),
(31, 33, 20, 1, 0, '900.00', '2017-01-11 16:37:33', '2017-01-11 16:37:33'),
(32, 30, 21, 1, 0, '30000.00', '2017-01-12 16:28:04', '2017-01-12 16:28:04'),
(33, 43, 21, 10, 10, '500.00', '2017-01-12 16:28:04', '2017-01-12 16:28:04'),
(34, 18, 21, 1, 0, '900.00', '2017-01-12 16:28:04', '2017-01-12 16:28:04'),
(37, 41, 21, 1, 0, '700.00', '2017-01-12 16:28:04', '2017-01-12 16:28:04'),
(38, 37, 21, 1, 0, '500.00', '2017-01-12 16:28:04', '2017-01-12 16:28:04'),
(39, 39, 21, 1, 0, '600.00', '2017-01-12 16:28:04', '2017-01-12 16:28:04'),
(40, 42, 21, 1, 0, '500.00', '2017-01-12 16:28:04', '2017-01-12 16:28:04'),
(41, 34, 21, 10, 5, '700000.00', '2017-01-12 16:28:04', '2017-01-12 16:28:04'),
(42, 24, 21, 1, 0, '1500.00', '2017-01-12 16:28:04', '2017-01-12 16:28:04'),
(43, 8, 22, 5, 0, '15000.00', '2017-01-23 13:38:22', '2017-01-23 13:38:22'),
(44, 21, 22, 10, 0, '2344.00', '2017-01-23 13:38:22', '2017-01-23 13:38:22'),
(45, 20, 22, 5, 0, '300.00', '2017-01-23 13:38:22', '2017-01-23 13:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(5) NOT NULL,
  `code` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) DEFAULT '1',
  `tax_registration_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `code`, `name`, `tel`, `address`, `location`, `fax`, `email`, `gender`, `tax_registration_number`, `note`, `created`, `modified`) VALUES
(1, '1', 'Maker''s Name 1', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2016-12-16 17:20:36', '0000-00-00 00:00:00'),
(2, '2', 'Maker''s Name 2', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2016-12-16 17:22:20', '2016-12-16 17:22:20'),
(3, '3', 'Maker''s Name 3', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2016-12-16 17:25:39', '2016-12-16 17:25:39'),
(4, '4', 'Maker''s Name 4', '0976459551', 'HN', 'HN', NULL, 'quandv.125@gmail.com', 1, '345345', 'test', '2016-12-23 08:30:39', '2016-12-23 08:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(5) NOT NULL,
  `keyword` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` int(5) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatars` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `fullname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `actived` tinyint(1) DEFAULT '0',
  `code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_id` int(5) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `avatars`, `thumbnail`, `description`, `fullname`, `email`, `address`, `tel`, `fax`, `date_of_birth`, `actived`, `code`, `group_id`, `created`, `modified`) VALUES
(2, 'quandv', '$2y$10$P3xVRvzy9f1cd6bii4728u531Z943LGlnocUFWTP5Ea81YuzM/Xci', '', '', NULL, 'Dương Văn Quân', 'quandv.125@gmail.com', 'Hà Nội', '0976459551', NULL, '1991-04-05', 1, NULL, 1, '2016-12-09 09:06:26', '2016-12-14 11:31:04'),
(3, 'demo', '$2y$10$idi3fhJvB277FOB.LyTQnedaYSy2WfVd9niwmxkUhRwMFThiLz1V.', '', '', NULL, 'Demo', NULL, '', '', NULL, '2016-05-24', 1, NULL, 3, '2016-12-09 09:06:36', '2016-12-15 11:07:48'),
(5, 'admin', '$2y$10$hKMM6E4k8PVzZPgIB7zDJOkyWg7pYfoMiXCFBlQIzgcIPl4Ipa7fO', '', '', NULL, 'Admin', NULL, 'Hà Nội', '0976459551', NULL, '2016-12-20', 1, NULL, 1, '2016-12-14 11:11:14', '2017-02-10 16:22:25'),
(6, 'customers', '$2y$10$yBU6yPe.FHJRCDzANg3paOcbxdxxXiJqfmIxHPg0oHbRjGhobti/W', '', '', 'test 123456', 'KHang', 'quandv.125@gmail.com', 'Hà Nội1234', '0976459551', NULL, '1991-05-04', 1, NULL, 4, '2016-12-14 17:27:19', '2017-02-21 16:39:35'),
(12, 'customers1', '$2y$10$dfbWyNGKamVabzb87nDn9ubnzyYgZyxdhtLEw.l5yCCeHnA/kHY3O', NULL, NULL, 'test 123123', 'Dương Văn Quân', 'duongquan54@gmail.com', 'Ứng Hòa - Hà Nội', '0976459551', NULL, NULL, 1, NULL, 4, '2017-02-20 14:37:54', '2017-02-20 14:37:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acl_phinxlog`
--
ALTER TABLE `acl_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `acos`
--
ALTER TABLE `acos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lft` (`lft`,`rght`),
  ADD KEY `alias` (`alias`);

--
-- Indexes for table `aros`
--
ALTER TABLE `aros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lft` (`lft`,`rght`),
  ADD KEY `alias` (`alias`);

--
-- Indexes for table `aros_acos`
--
ALTER TABLE `aros_acos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aro_id` (`aro_id`,`aco_id`),
  ADD KEY `aco_id` (`aco_id`);

--
-- Indexes for table `cashflows`
--
ALTER TABLE `cashflows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cashusers` (`user_id`);

--
-- Indexes for table `cash_flow_statements`
--
ALTER TABLE `cash_flow_statements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debts`
--
ALTER TABLE `debts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_debtsinvoice` (`invoice_id`),
  ADD KEY `fk_debtsstock` (`stock_id`),
  ADD KEY `fk_debtscustomer` (`customer_id`),
  ADD KEY `fk_debtssupplier` (`supplier_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locale` (`locale`),
  ADD KEY `model` (`model`),
  ADD KEY `row_id` (`foreign_key`),
  ADD KEY `field` (`field`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_imgproducts` (`product_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invoutlet` (`outlet_id`),
  ADD KEY `fk_invcoupon` (`coupon_id`),
  ADD KEY `fk_invpartner_deliverys` (`partner_delivery_id`),
  ADD KEY `fk_invpayments` (`payment_id`),
  ADD KEY `fk_invusers` (`user_id`),
  ADD KEY `fk_invcustomers` (`customer_id`) USING BTREE;

--
-- Indexes for table `invoice_products`
--
ALTER TABLE `invoice_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invproducts` (`product_id`),
  ADD KEY `fk_invinvoices` (`invoice_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outlets`
--
ALTER TABLE `outlets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner_deliverys`
--
ALTER TABLE `partner_deliverys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_paycustomers` (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_outlets` (`outlet_id`),
  ADD KEY `fk_suppliers` (`supplier_id`),
  ADD KEY `fk_prodcate` (`categorie_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stkusers` (`user_id`),
  ADD KEY `stksupplier` (`supplier_id`);

--
-- Indexes for table `stock_products`
--
ALTER TABLE `stock_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_skproducts` (`product_id`),
  ADD KEY `fk_skstocks` (`stock_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagproducts` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usergroups` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acos`
--
ALTER TABLE `acos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;
--
-- AUTO_INCREMENT for table `aros`
--
ALTER TABLE `aros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `aros_acos`
--
ALTER TABLE `aros_acos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `cashflows`
--
ALTER TABLE `cashflows`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cash_flow_statements`
--
ALTER TABLE `cash_flow_statements`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `debts`
--
ALTER TABLE `debts`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `invoice_products`
--
ALTER TABLE `invoice_products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `outlets`
--
ALTER TABLE `outlets`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `partner_deliverys`
--
ALTER TABLE `partner_deliverys`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `stock_products`
--
ALTER TABLE `stock_products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cashflows`
--
ALTER TABLE `cashflows`
  ADD CONSTRAINT `fk_cashusers` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `debts`
--
ALTER TABLE `debts`
  ADD CONSTRAINT `fk_debtscustomer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `fk_debtsinvoice` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `fk_debtsstock` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`id`),
  ADD CONSTRAINT `fk_debtssupplier` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_imgproducts` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `fk_invcistomers` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `fk_invcoupon` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`),
  ADD CONSTRAINT `fk_invoutlet` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`),
  ADD CONSTRAINT `fk_invpartner_deliverys` FOREIGN KEY (`partner_delivery_id`) REFERENCES `partner_deliverys` (`id`),
  ADD CONSTRAINT `fk_invpayments` FOREIGN KEY (`payment_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `fk_invusers` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `invoice_products`
--
ALTER TABLE `invoice_products`
  ADD CONSTRAINT `fk_invinvoices` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `fk_invproducts` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_paycustomers` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_cate` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fk_outlets` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`),
  ADD CONSTRAINT `fk_prodcate` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fk_suppliers` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `fk_stkusers` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `stksupplier` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `stock_products`
--
ALTER TABLE `stock_products`
  ADD CONSTRAINT `fk_skproducts` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_skstocks` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`id`);

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tagproducts` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_usergroups` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
