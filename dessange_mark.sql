-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2017 at 05:58 PM
-- Server version: 10.0.32-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dessange_mark`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslevel`
--

CREATE TABLE `accesslevel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accesslevel`
--

INSERT INTO `accesslevel` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'Sales');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('68a14e911391c557c5e1391030661948', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.100 Safari/537.36', 1501655141, 'a:6:{s:9:\"user_data\";s:0:\"\";s:2:\"id\";s:1:\"1\";s:5:\"email\";s:25:\"master@willnevergrowup.in\";s:4:\"name\";s:6:\"Wohlig\";s:11:\"accesslevel\";s:1:\"1\";s:9:\"logged_in\";s:4:\"true\";}'),
('2a6826f0bf24dc74122b04f0ec8ff350', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.100 Safari/537.36', 1501659686, 'a:6:{s:9:\"user_data\";s:0:\"\";s:2:\"id\";s:1:\"1\";s:5:\"email\";s:25:\"master@willnevergrowup.in\";s:4:\"name\";s:6:\"Wohlig\";s:11:\"accesslevel\";s:1:\"1\";s:9:\"logged_in\";s:4:\"true\";}'),
('547db8d80ba4352dfc28c00c85d0f55a', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.100 Safari/537.36', 1501660147, 'a:6:{s:9:\"user_data\";s:0:\"\";s:2:\"id\";s:1:\"1\";s:5:\"email\";s:25:\"master@willnevergrowup.in\";s:4:\"name\";s:6:\"Wohlig\";s:11:\"accesslevel\";s:1:\"1\";s:9:\"logged_in\";s:4:\"true\";}'),
('92f0d520d3adff42a8d3da37c1b08b73', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.100 Safari/537.36', 1501676595, 'a:6:{s:9:\"user_data\";s:0:\"\";s:2:\"id\";s:1:\"1\";s:5:\"email\";s:25:\"master@willnevergrowup.in\";s:4:\"name\";s:6:\"Wohlig\";s:11:\"accesslevel\";s:1:\"1\";s:9:\"logged_in\";s:4:\"true\";}'),
('7b4ead4ad98e3e7a99a1726c3c08b8ea', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.100 Safari/537.36', 1501732045, 'a:6:{s:9:\"user_data\";s:0:\"\";s:2:\"id\";s:1:\"1\";s:5:\"email\";s:25:\"master@willnevergrowup.in\";s:4:\"name\";s:6:\"Wohlig\";s:11:\"accesslevel\";s:1:\"1\";s:9:\"logged_in\";s:4:\"true\";}'),
('f3504edbf9016a0df10a22f0a0a0f478', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.100 Safari/537.36', 1501734624, 'a:6:{s:9:\"user_data\";s:0:\"\";s:2:\"id\";s:1:\"1\";s:5:\"email\";s:25:\"master@willnevergrowup.in\";s:4:\"name\";s:6:\"Wohlig\";s:11:\"accesslevel\";s:1:\"1\";s:9:\"logged_in\";s:4:\"true\";}'),
('d2cae7ff0fbe5e83557e171e3d1eed6e', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.100 Safari/537.36', 1501753052, ''),
('c65f61e4710a263e4b8bc596bf699a1c', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.100 Safari/537.36', 1501753054, ''),
('305e6d9b6a9ca936f36aa16a32d2a7d6', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.100 Safari/537.36', 1501822309, 'a:6:{s:9:\"user_data\";s:0:\"\";s:2:\"id\";s:1:\"1\";s:5:\"email\";s:25:\"master@willnevergrowup.in\";s:4:\"name\";s:6:\"Wohlig\";s:11:\"accesslevel\";s:1:\"1\";s:9:\"logged_in\";s:4:\"true\";}');

-- --------------------------------------------------------

--
-- Table structure for table `fynx_cart`
--

CREATE TABLE `fynx_cart` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `design` varchar(255) NOT NULL,
  `json` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fynx_cart`
--

INSERT INTO `fynx_cart` (`id`, `user`, `quantity`, `product`, `timestamp`, `design`, `json`) VALUES
(2, 10, 1, '7', '2016-01-19 12:12:42', '', ''),
(3, 10, 1, '6', '2016-01-19 12:21:38', '', ''),
(4, 9, 1, '6', '2016-01-19 12:24:01', '', ''),
(5, 9, 2, '8', '2016-01-19 12:25:39', '', ''),
(10, 15, 1, '7', '2016-01-19 14:20:06', '', ''),
(11, 15, 3, '6', '2016-01-19 14:21:52', '', ''),
(24, 20, 1, '9', '2016-01-20 05:33:58', '', ''),
(25, 19, 1, '6', '2016-01-20 05:39:34', '', ''),
(28, 21, 2, '6', '2016-01-20 09:39:43', '', ''),
(29, 21, 1, '7', '2016-01-20 09:39:29', '', ''),
(30, 22, 1, '7', '2016-01-20 09:53:40', '', ''),
(41, 27, 1, '21', '2016-02-24 06:00:07', '', ''),
(42, 29, 1, '21', '2016-03-03 11:15:29', '', ''),
(47, 33, 1, '10', '2016-03-08 11:18:17', '', ''),
(48, 33, 1, '11', '2016-03-08 11:18:27', '', ''),
(62, 34, 5, '49', '2016-03-11 13:01:25', '', ''),
(64, 34, 5, '6', '2016-03-11 13:10:27', '', ''),
(73, 34, 6, '31', '2016-03-12 07:38:30', '', ''),
(78, 48, 10, '10', '2016-03-12 13:35:43', '', ''),
(81, 47, 12, '49', '2016-03-12 13:57:15', '', ''),
(84, 47, 50, '48', '2016-03-12 14:25:48', '', ''),
(89, 49, 1, '48', '2016-03-17 05:03:22', '', ''),
(96, 49, 1, '31', '2016-03-17 05:03:33', '', ''),
(98, 55, 1, '31', '2016-04-20 06:52:36', '', ''),
(125, 60, 2, '21', '2016-03-23 10:52:40', '', ''),
(129, 61, 5, '6', '2016-03-23 15:00:45', '', ''),
(130, 63, 3, '21', '2016-03-23 15:14:15', '', ''),
(131, 64, 6, '56', '2016-03-24 21:39:52', '', ''),
(142, 59, 4, '21', '2016-03-28 10:40:08', '', ''),
(149, 0, 2, '9', '2016-03-30 10:08:19', '', ''),
(150, 0, 2, '6', '2016-03-30 10:09:13', '', ''),
(153, 0, 3, '12', '2016-03-30 10:14:53', '', ''),
(158, 0, 2, '21', '2016-03-30 14:52:03', '', ''),
(159, 0, 3, '22', '2016-03-30 14:52:03', '', ''),
(162, 0, 3, '22', '2016-03-30 15:29:26', '', ''),
(163, 0, 6, '25', '2016-03-30 15:29:26', '', ''),
(164, 0, 2, '171', '2016-03-30 15:29:26', '', ''),
(165, 0, 3, '22', '2016-03-30 15:29:35', '', ''),
(166, 0, 6, '25', '2016-03-30 15:29:35', '', ''),
(167, 0, 2, '171', '2016-03-30 15:29:35', '', ''),
(171, 70, 2, '6', '2016-03-30 15:43:12', '', ''),
(178, 0, 3, '21', '2016-03-31 06:48:45', '', ''),
(179, 0, 4, '128', '2016-03-31 06:48:45', '', ''),
(180, 0, 2, '146', '2016-03-31 06:48:45', '', ''),
(181, 0, 2, '22', '2016-03-31 06:48:45', '', ''),
(182, 0, 3, '6', '2016-04-01 10:01:04', '', ''),
(183, 0, 3, '9', '2016-04-01 10:01:04', '', ''),
(184, 0, 3, '10', '2016-04-01 10:01:04', '', ''),
(185, 0, 3, '7', '2016-04-01 10:01:04', '', ''),
(190, 0, 1, '128', '2016-04-02 09:19:08', '', ''),
(191, 0, 1, '128', '2016-04-02 09:19:21', '', ''),
(192, 0, 1, '128', '2016-04-02 09:21:43', '', ''),
(196, 0, 1, '128', '2016-04-02 10:11:35', '', ''),
(199, 50, 2, '7', '2016-04-04 05:52:24', '', ''),
(200, 71, 3, '6', '2016-04-04 06:18:30', '', ''),
(201, 72, 3, '11', '2016-04-04 08:09:17', '', ''),
(202, 72, 1, '126', '2016-04-04 08:09:17', '', ''),
(210, 74, 2, '102', '2016-04-05 09:31:08', '', ''),
(211, 0, 2, '58', '2016-04-05 09:32:12', '', ''),
(212, 0, 2, '112', '2016-04-05 09:33:12', '', ''),
(214, 30, 1, '128', '2016-04-08 08:29:09', '', ''),
(219, 78, 4, '96', '2016-04-05 13:10:28', '', ''),
(220, 78, 5, '91', '2016-04-05 13:10:28', '', ''),
(223, 30, 2, '6', '2016-04-05 13:17:17', '', ''),
(231, 79, 0, '2', '2016-04-06 10:23:16', '', ''),
(234, 79, 1, '9', '2016-04-06 10:36:00', '', ''),
(235, 79, 2, '128', '2016-04-06 10:36:00', '', ''),
(237, 50, 3, '1', '2016-04-07 05:46:26', '', ''),
(241, 80, 1, '129', '2016-04-07 12:15:35', '', ''),
(256, 87, 0, '3', '2016-04-07 14:37:38', '', ''),
(257, 87, 1, '1', '2016-04-07 14:38:54', '', ''),
(259, 50, 2, '3', '2016-04-08 06:10:06', '', ''),
(262, 88, 1, '6', '2016-04-08 08:34:05', '', ''),
(265, 89, 1, '6', '2016-04-08 08:37:45', '', ''),
(267, 90, 2, '6', '2016-04-08 08:54:12', '', ''),
(268, 91, 2, '135', '2016-04-08 09:03:59', '', ''),
(269, 50, 1, '6', '2016-04-08 09:12:43', '', ''),
(270, 50, 13, '9', '2016-04-08 10:21:39', '', ''),
(271, 50, 1, '11', '2016-04-08 10:21:57', '', ''),
(272, 92, 1, '6', '2016-04-08 16:25:40', '', ''),
(275, 84, 2, '1', '2016-04-09 07:59:04', '', ''),
(276, 95, 1, '128', '2016-04-13 15:29:30', '', ''),
(277, 95, 1, '130', '2016-04-13 15:29:30', '', ''),
(278, 95, 1, '129', '2016-04-13 15:29:30', '', ''),
(279, 95, 1, '122', '2016-04-13 15:29:30', '', ''),
(304, 97, 2, '129', '2016-04-20 05:52:12', '', ''),
(333, 65, 1, '122', '2016-04-20 07:14:30', '', ''),
(338, 99, 1, '128', '2016-04-20 12:57:34', '', ''),
(339, 101, 1, '114', '2016-04-21 04:15:24', '', ''),
(341, 102, 1, '128', '2016-04-21 10:39:42', '', ''),
(343, 52, 5, '6', '2016-04-21 14:12:47', '', ''),
(344, 55, 1, '129', '2016-04-22 10:37:33', '', ''),
(355, 96, 2, '36', '2016-04-27 13:32:46', '', ''),
(356, 105, 1, '176', '2016-04-27 17:47:53', '', ''),
(357, 106, 1, '106', '2016-04-30 13:56:41', '', ''),
(362, 1, 2, '176', '2016-05-11 07:25:16', '', ''),
(376, 29, 1, '4', '2016-06-03 09:51:12', '', ''),
(377, 57, 7, '4', '2016-06-14 06:32:22', '', ''),
(381, 39, 1, '86', '2016-06-07 12:06:29', '', ''),
(383, 98, 1, '113', '2016-08-04 09:42:37', '', ''),
(388, 110, 2, '135', '2016-08-09 11:31:38', '', ''),
(392, 115, 2, '57', '2017-02-10 11:43:34', '', ''),
(395, 66, 1, '165', '2017-02-23 07:50:46', '', ''),
(396, 66, 1, '86', '2017-02-23 07:51:39', '', ''),
(397, 116, 10, '3', '2017-03-07 16:15:56', '', ''),
(398, 117, 1, '129', '2017-03-07 16:24:28', '', ''),
(399, 118, 1, '129', '2017-03-07 16:24:56', '', ''),
(400, 118, 1, '129', '2017-03-07 16:25:21', '', ''),
(401, 118, 1, '129', '2017-03-07 16:25:23', '', ''),
(406, 123, 1, '11', '2017-04-28 07:41:24', '', ''),
(407, 124, 1, '237', '2017-05-09 10:52:32', '', ''),
(408, 125, 1, '237', '2017-05-09 10:52:57', '', ''),
(409, 124, 1, '238', '2017-05-09 10:59:21', '', ''),
(410, 124, 1, '237', '2017-05-09 11:25:49', '', ''),
(411, 124, 1, '265', '2017-05-09 11:25:49', '', ''),
(412, 124, 1, '238', '2017-05-09 11:49:13', '', ''),
(414, 140, 1, '234', '2017-07-12 21:28:38', '', ''),
(415, 143, 1, '19', '2017-07-28 11:10:40', '', ''),
(416, 56, 1, '234', '2017-08-04 10:29:30', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fynx_wishlist`
--

CREATE TABLE `fynx_wishlist` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `design` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fynx_wishlist`
--

INSERT INTO `fynx_wishlist` (`id`, `user`, `product`, `timestamp`, `design`, `quantity`) VALUES
(4, 9, '6', '2016-01-19 13:27:14', '', ''),
(11, 19, '9', '2016-01-20 05:00:44', '', ''),
(14, 20, '6', '2016-01-20 05:31:01', '', '1'),
(15, 20, '7', '2016-01-20 05:33:34', '', '1'),
(16, 20, '8', '2016-01-20 05:33:49', '', '1'),
(17, 20, '9', '2016-01-20 05:34:01', '', '1'),
(21, 13, '', '2016-01-20 06:30:50', '', '1'),
(29, 21, '8', '2016-01-20 06:56:06', '', '1'),
(30, 21, '9', '2016-01-20 06:57:02', '', '1'),
(32, 21, '6', '2016-01-20 09:20:53', '', '1'),
(36, 27, '21', '2016-02-24 06:00:08', '', '1'),
(41, 34, '10', '2016-03-12 05:18:56', '', '1'),
(42, 34, '49', '2016-03-12 05:38:53', '', '1'),
(43, 34, '21', '2016-03-12 05:55:12', '', '1'),
(44, 34, '34', '2016-03-12 08:46:39', '', '6'),
(51, 50, '6', '2016-03-17 12:15:51', '', '1'),
(53, 57, '38', '2016-03-23 13:44:20', '', '1'),
(59, 63, '21', '2016-03-23 15:09:13', '', '1'),
(60, 63, '22', '2016-03-23 15:09:23', '', '1'),
(61, 63, '23', '2016-03-23 15:09:27', '', '1'),
(62, 63, '24', '2016-03-23 15:09:31', '', '1'),
(71, 89, '6', '2016-04-08 08:37:22', '', '1'),
(74, 30, '1', '2016-04-27 12:34:16', '', '1'),
(75, 105, '130', '2016-04-27 17:46:15', '', '1'),
(77, 109, '128', '2016-07-27 09:21:06', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `location_brandlocation`
--

CREATE TABLE `location_brandlocation` (
  `id` int(11) NOT NULL,
  `brand` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location_locationimage`
--

CREATE TABLE `location_locationimage` (
  `id` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `locationimage` varchar(255) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logintype`
--

CREATE TABLE `logintype` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logintype`
--

INSERT INTO `logintype` (`id`, `name`) VALUES
(1, 'Facebook'),
(2, 'Twitter'),
(3, 'Email'),
(4, 'Google');

-- --------------------------------------------------------

--
-- Table structure for table `mark_brand`
--

CREATE TABLE `mark_brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `salonexp` varchar(255) NOT NULL,
  `mainimage` varchar(255) NOT NULL,
  `collectionname` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `videourl` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mark_brandimages`
--

CREATE TABLE `mark_brandimages` (
  `id` int(11) NOT NULL,
  `brand` int(11) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mark_brandproducts`
--

CREATE TABLE `mark_brandproducts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `brand` int(11) NOT NULL,
  `content` text NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mark_careers`
--

CREATE TABLE `mark_careers` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `ctc` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `mailat` varchar(255) NOT NULL,
  `order` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mark_contactus`
--

CREATE TABLE `mark_contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mark_contactus`
--

INSERT INTO `mark_contactus` (`id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'Test', 'test@test.com', '8989898989', 'demo message');

-- --------------------------------------------------------

--
-- Table structure for table `mark_franchise`
--

CREATE TABLE `mark_franchise` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `franchise` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mark_media`
--

CREATE TABLE `mark_media` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mark_overview`
--

CREATE TABLE `mark_overview` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `linktype` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `isactive` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `keyword`, `url`, `linktype`, `parent`, `isactive`, `order`, `icon`) VALUES
(1, 'users', '', '', 'site/viewusers', 1, 0, 1, 1, 'icon-user'),
(2, 'Brands', '', '', 'site/viewbrand', 1, 0, 1, 2, 'icon-dashboard'),
(3, 'Packages', '', '', 'site/viewpackage', 1, 0, 1, 3, 'icon-dashboard'),
(4, 'Dashboard', '', '', 'site/index', 1, 0, 1, 0, 'icon-dashboard'),
(5, 'Create Company', '', '', 'site/createcompany', 1, 0, 1, 4, 'icon-dashboard'),
(6, 'Brand Locations', '', '', 'site/viewbrandlocation', 1, 0, 1, 3, 'icon-dashboard'),
(7, 'Careers', '', '', 'site/viewcareers', 1, 0, 1, 4, 'icon-dashboard'),
(8, 'Contact Us', '', '', 'site/viewcontactus', 1, 0, 1, 5, 'icon-dashboard'),
(9, 'Franchise', '', '', 'site/viewfranchise', 1, 0, 1, 6, 'icon-dashboard'),
(10, 'Media', '', '', 'site/viewmedia', 1, 0, 1, 7, 'icon-dashboard'),
(11, 'Overview', '', '', 'site/viewoverview', 1, 0, 1, 9, 'icon-dashboard');

-- --------------------------------------------------------

--
-- Table structure for table `menuaccess`
--

CREATE TABLE `menuaccess` (
  `menu` int(11) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuaccess`
--

INSERT INTO `menuaccess` (`menu`, `access`) VALUES
(1, 1),
(2, 1),
(4, 1),
(5, 2),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE `orderstatus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipping'),
(4, 'Delivered'),
(5, 'Cancel');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'Disable'),
(2, 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id`, `name`, `logo`) VALUES
(1, 'Dessange Mumbai', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `accesslevel` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `socialid` varchar(255) NOT NULL,
  `logintype` varchar(255) NOT NULL,
  `json` text NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `billingaddress` text NOT NULL,
  `billingcity` varchar(255) NOT NULL,
  `billingstate` varchar(255) NOT NULL,
  `billingcountry` varchar(255) NOT NULL,
  `billingcontact` varchar(255) NOT NULL,
  `billingpincode` varchar(255) NOT NULL,
  `shippingaddress` text NOT NULL,
  `shippingcity` varchar(255) NOT NULL,
  `shippingcountry` varchar(255) NOT NULL,
  `shippingstate` varchar(255) NOT NULL,
  `shippingpincode` varchar(255) NOT NULL,
  `shippingname` varchar(255) NOT NULL,
  `shippingcontact` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `credit` varchar(255) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `registrationno` varchar(255) NOT NULL,
  `vatnumber` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `dob` date NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json`, `firstname`, `lastname`, `phone`, `billingaddress`, `billingcity`, `billingstate`, `billingcountry`, `billingcontact`, `billingpincode`, `shippingaddress`, `shippingcity`, `shippingcountry`, `shippingstate`, `shippingpincode`, `shippingname`, `shippingcontact`, `currency`, `credit`, `companyname`, `registrationno`, `vatnumber`, `country`, `fax`, `gender`, `facebook`, `google`, `twitter`, `street`, `address`, `dob`, `city`, `state`, `pincode`) VALUES
(14, 'Wohlig', 'a63526467438df9566c508027d9cb06b', 'wohlig@wohlig.com', 1, '0000-00-00 00:00:00', 1, '1.jpg', '', '', 'Email', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', 0, '', '', '', '', '', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `onuser` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `onuser`, `status`, `description`, `timestamp`) VALUES
(1, 1, 1, 'User Address Edited', '2014-05-12 06:50:21'),
(2, 1, 1, 'User Details Edited', '2014-05-12 06:51:43'),
(3, 1, 1, 'User Details Edited', '2014-05-12 06:51:53'),
(4, 4, 1, 'User Created', '2014-05-12 06:52:44'),
(5, 4, 1, 'User Address Edited', '2014-05-12 12:31:48'),
(6, 23, 2, 'User Created', '2014-10-07 06:46:55'),
(7, 24, 2, 'User Created', '2014-10-07 06:48:25'),
(8, 25, 2, 'User Created', '2014-10-07 06:49:04'),
(9, 26, 2, 'User Created', '2014-10-07 06:49:16'),
(10, 27, 2, 'User Created', '2014-10-07 06:52:18'),
(11, 28, 2, 'User Created', '2014-10-07 06:52:45'),
(12, 29, 2, 'User Created', '2014-10-07 06:53:10'),
(13, 30, 2, 'User Created', '2014-10-07 06:53:33'),
(14, 31, 2, 'User Created', '2014-10-07 06:55:03'),
(15, 32, 2, 'User Created', '2014-10-07 06:55:33'),
(16, 33, 2, 'User Created', '2014-10-07 06:59:32'),
(17, 34, 2, 'User Created', '2014-10-07 07:01:18'),
(18, 35, 2, 'User Created', '2014-10-07 07:01:50'),
(19, 34, 2, 'User Details Edited', '2014-10-07 07:04:34'),
(20, 18, 2, 'User Details Edited', '2014-10-07 07:05:11'),
(21, 18, 2, 'User Details Edited', '2014-10-07 07:05:45'),
(22, 18, 2, 'User Details Edited', '2014-10-07 07:06:03'),
(23, 7, 6, 'User Created', '2014-10-17 06:22:29'),
(24, 7, 6, 'User Details Edited', '2014-10-17 06:32:22'),
(25, 7, 6, 'User Details Edited', '2014-10-17 06:32:37'),
(26, 8, 6, 'User Created', '2014-11-15 12:05:52'),
(27, 9, 6, 'User Created', '2014-12-02 10:46:36'),
(28, 9, 6, 'User Details Edited', '2014-12-02 10:47:34'),
(29, 4, 6, 'User Details Edited', '2014-12-03 10:34:49'),
(30, 4, 6, 'User Details Edited', '2014-12-03 10:36:34'),
(31, 4, 6, 'User Details Edited', '2014-12-03 10:36:49'),
(32, 8, 6, 'User Details Edited', '2014-12-03 10:47:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesslevel`
--
ALTER TABLE `accesslevel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `fynx_cart`
--
ALTER TABLE `fynx_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fynx_wishlist`
--
ALTER TABLE `fynx_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_brandlocation`
--
ALTER TABLE `location_brandlocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_locationimage`
--
ALTER TABLE `location_locationimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logintype`
--
ALTER TABLE `logintype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark_brand`
--
ALTER TABLE `mark_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark_brandimages`
--
ALTER TABLE `mark_brandimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark_brandproducts`
--
ALTER TABLE `mark_brandproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark_careers`
--
ALTER TABLE `mark_careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark_contactus`
--
ALTER TABLE `mark_contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark_franchise`
--
ALTER TABLE `mark_franchise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark_media`
--
ALTER TABLE `mark_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark_overview`
--
ALTER TABLE `mark_overview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menuaccess`
--
ALTER TABLE `menuaccess`
  ADD UNIQUE KEY `menu` (`menu`,`access`);

--
-- Indexes for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesslevel`
--
ALTER TABLE `accesslevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fynx_cart`
--
ALTER TABLE `fynx_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=417;
--
-- AUTO_INCREMENT for table `fynx_wishlist`
--
ALTER TABLE `fynx_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `location_brandlocation`
--
ALTER TABLE `location_brandlocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `location_locationimage`
--
ALTER TABLE `location_locationimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logintype`
--
ALTER TABLE `logintype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mark_brand`
--
ALTER TABLE `mark_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mark_brandimages`
--
ALTER TABLE `mark_brandimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mark_brandproducts`
--
ALTER TABLE `mark_brandproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mark_careers`
--
ALTER TABLE `mark_careers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mark_contactus`
--
ALTER TABLE `mark_contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mark_franchise`
--
ALTER TABLE `mark_franchise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mark_media`
--
ALTER TABLE `mark_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mark_overview`
--
ALTER TABLE `mark_overview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
