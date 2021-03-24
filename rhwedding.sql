-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2021 at 03:02 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rhwedding`
--
CREATE DATABASE IF NOT EXISTS `rhwedding` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `rhwedding`;

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

DROP TABLE IF EXISTS `auth_activation_attempts`;
CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', '2498ea16045c5d612b6a5d8cc570644c', '2021-02-09 04:17:55'),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', 'b44b37d6b6189a8e8ecc3d22ad749e0d', '2021-02-09 04:40:04'),
(3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', 'd8c70315ef7869c070d837b71b0e6243', '2021-02-09 08:01:53'),
(4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', '7cc1e3dbd514daaa56f34e158417c4f0', '2021-02-09 08:55:59'),
(5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', '7cc1e3dbd514daaa56f34e158417c4f0', '2021-02-09 08:56:14'),
(6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.72 Safari/537.36', '38104d53defd216884c16e28f09915ee', '2021-03-04 01:19:14'),
(7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.72 Safari/537.36', '73a17ad45c0cea060980456036622cc3', '2021-03-04 01:22:34'),
(8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.72 Safari/537.36', '76d396e5c10d7f9519d548ec0777a6fc', '2021-03-04 01:27:00'),
(9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.72 Safari/537.36', 'b28e656a31a38f442edaf201ad6b1a3c', '2021-03-04 01:30:14'),
(10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.72 Safari/537.36', '73a17ad45c0cea060980456036622cc3', '2021-03-04 01:30:46'),
(11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.72 Safari/537.36', '9a01a96cb28f2220231d066aae13503c', '2021-03-04 01:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

DROP TABLE IF EXISTS `auth_groups`;
CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`, `active`) VALUES
(1, 'Admin', 'Administrator', 1),
(2, 'Vendor', 'vendor partners', 1),
(3, 'User', 'Regular user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

DROP TABLE IF EXISTS `auth_groups_permissions`;
CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

DROP TABLE IF EXISTS `auth_groups_users`;
CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(1, 5),
(3, 4),
(3, 12);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

DROP TABLE IF EXISTS `auth_logins`;
CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-09 08:06:43', 1),
(2, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-09 08:28:10', 1),
(3, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-09 08:44:51', 1),
(4, '::1', 'muhamadarsal71@gmail.com', 6, '2021-02-09 08:56:14', 1),
(5, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-09 09:12:51', 1),
(6, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-09 09:17:34', 1),
(7, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-09 09:18:08', 1),
(8, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-09 09:18:40', 1),
(9, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-09 09:19:00', 1),
(10, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-09 09:20:32', 1),
(11, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-09 09:35:00', 1),
(12, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-09 10:02:25', 1),
(13, '::1', 'muhamadarsal71@gmail.com', 6, '2021-02-09 11:44:24', 1),
(14, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-09 11:45:03', 1),
(15, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-11 01:19:02', 1),
(16, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-13 01:26:06', 1),
(17, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-16 07:28:52', 1),
(18, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-19 08:59:14', 1),
(19, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-20 10:49:47', 1),
(20, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-20 22:39:52', 1),
(21, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-21 00:19:23', 1),
(22, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-21 01:32:53', 1),
(23, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-21 07:39:00', 1),
(24, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-24 00:33:46', 1),
(25, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-24 06:45:23', 1),
(26, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-24 10:26:47', 1),
(27, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-25 09:04:16', 1),
(28, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-02-28 08:01:50', 1),
(29, '::1', 'muhamadarsal71@gmail.com', 6, '2021-03-03 06:42:00', 1),
(30, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-03 06:42:55', 1),
(31, '::1', 'muhamadarsal71@gmail.com', 8, '2021-03-04 01:19:31', 1),
(32, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-04 01:20:21', 1),
(33, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-04 01:30:46', 1),
(34, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-04 01:48:03', 1),
(35, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-04 04:10:38', 1),
(36, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-04 06:31:29', 1),
(37, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-04 10:44:49', 1),
(38, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-05 09:54:14', 1),
(39, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-06 01:05:43', 1),
(40, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-06 22:04:06', 1),
(41, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-06 22:25:13', 1),
(42, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-08 02:04:41', 1),
(43, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-10 08:39:23', 1),
(44, '::1', 'muhamadarsaludin71@gmail.com', NULL, '2021-03-11 01:32:14', 0),
(45, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-11 01:32:32', 1),
(46, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-11 07:03:25', 1),
(47, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-13 00:23:29', 1),
(48, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-13 10:47:34', 1),
(49, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-13 22:19:23', 1),
(50, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-14 01:09:37', 1),
(51, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-15 09:36:32', 1),
(52, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-16 09:09:50', 1),
(53, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-16 10:48:31', 1),
(54, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-16 10:55:05', 1),
(55, '::1', 'muhamadarsal71@gmail.com', 12, '2021-03-16 10:56:27', 1),
(56, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-20 10:06:14', 1),
(57, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-21 22:25:45', 1),
(58, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-22 06:12:27', 1),
(59, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-22 23:01:44', 1),
(60, '::1', 'muhamadarsaludin71@gmail.com', NULL, '2021-03-23 02:33:10', 0),
(61, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-23 02:33:23', 1),
(62, '::1', 'arsal', NULL, '2021-03-23 09:37:13', 0),
(63, '::1', 'muhamadarsaludin71@gmail.com', NULL, '2021-03-23 09:39:57', 0),
(64, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-23 09:49:32', 1),
(65, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-23 22:30:35', 1),
(66, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-23 23:48:56', 1),
(67, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-24 05:39:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

DROP TABLE IF EXISTS `auth_permissions`;
CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

DROP TABLE IF EXISTS `auth_reset_attempts`;
CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

DROP TABLE IF EXISTS `auth_tokens`;
CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

DROP TABLE IF EXISTS `auth_users_permissions`;
CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

DROP TABLE IF EXISTS `cart_detail`;
CREATE TABLE `cart_detail` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `vendor_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `vendor_id`, `name`, `description`) VALUES
(1, 4, 'The Day', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1612863292, 1),
(2, '2021-02-14-180156', 'App\\Database\\Migrations\\Vendors', 'default', 'App', 1613361171, 2),
(3, '2021-02-14-181713', 'App\\Database\\Migrations\\VendorsServices', 'default', 'App', 1613361171, 2),
(4, '2021-02-14-182221', 'App\\Database\\Migrations\\VendorsLevel', 'default', 'App', 1613361171, 2),
(5, '2021-02-14-182655', 'App\\Database\\Migrations\\Services', 'default', 'App', 1613361171, 2),
(6, '2021-02-15-030514', 'App\\Database\\Migrations\\Products', 'default', 'App', 1613361171, 2),
(7, '2021-02-15-031357', 'App\\Database\\Migrations\\ProductsCategory', 'default', 'App', 1613361171, 2),
(8, '2021-02-15-031539', 'App\\Database\\Migrations\\Category', 'default', 'App', 1613361171, 2),
(9, '2021-02-15-031922', 'App\\Database\\Migrations\\ProductsImages', 'default', 'App', 1613361171, 2),
(10, '2021-02-15-032238', 'App\\Database\\Migrations\\ProductsReview', 'default', 'App', 1613361171, 2),
(11, '2021-02-15-033131', 'App\\Database\\Migrations\\Address', 'default', 'App', 1613361172, 2),
(12, '2021-02-16-151144', 'App\\Database\\Migrations\\UsersProfile', 'default', 'App', 1613488765, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `vendor_id` int(11) UNSIGNED NOT NULL,
  `product_service_id` int(11) UNSIGNED NOT NULL,
  `product_code` varchar(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_slug` varchar(255) DEFAULT NULL,
  `product_main_image` varchar(255) NOT NULL,
  `product_video` varchar(255) DEFAULT NULL,
  `product_description` text DEFAULT NULL,
  `product_sold` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `total_review` int(11) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `vendor_id`, `product_service_id`, `product_code`, `product_name`, `product_slug`, `product_main_image`, `product_video`, `product_description`, `product_sold`, `price`, `stock`, `total_review`, `active`, `created_at`, `updated_at`) VALUES
(11, 4, 5, 'PRD4202103003', 'Gaun Monalisa', NULL, '1.jpg', NULL, '<p><span style=\"color: #555555; font-family: \'Proxima Nova\', Helvetica, arial, sans-serif; font-size: 14px; letter-spacing: 0.2px; white-space: pre-wrap; background-color: #ffffff;\">Pre-order 2minggu</span></p>', NULL, 3000000, 10, NULL, 1, '2021-03-22 08:18:50', '2021-03-22 08:18:50'),
(14, 4, 5, 'PRD4202103004', 'Gaun Pesta ', NULL, '5376ac4139a84090db673da7e246956e.jpg_720x720q80.jpg_.jpg', NULL, '<p>Gaun elegant</p>', NULL, 650700, 1, NULL, 1, '2021-03-24 06:33:47', '2021-03-24 06:33:47'),
(15, 4, 5, 'PRD4202103005', 'Tuxedo', NULL, 'shintarotuxx2-Sk1Hc4BtU.jpg', NULL, '<p><span style=\"color: #555555; font-family: \'Proxima Nova\', Helvetica, arial, sans-serif; font-size: 14px; letter-spacing: 0.2px; white-space: pre-wrap;\">- Free consultation with our team - 1 Set bespoke suits (jacket and trouser) - 1 Tailor shirt (customized) - 1 pocket square</span></p>', NULL, 6705000, 1, NULL, 1, '2021-03-24 06:36:35', '2021-03-24 06:36:35'),
(16, 4, 5, 'PRD4202103006', 'Business Suit, Double Breasted', NULL, 'cf171dac-6804-45a9-b213-bbcea2c0931b-1-S1KHKNHtL.jpg', NULL, '<p><span style=\"color: #555555; font-family: \'Proxima Nova\', Helvetica, arial, sans-serif; font-size: 14px; letter-spacing: 0.2px; white-space: pre-wrap; background-color: #ffffff;\">- Free consultation with our team - 1 Set bespoke suits (jacket and trouser) - 1 Tailor shirt (customized) - 1 pocket square</span></p>', NULL, 6937500, 1, NULL, 1, '2021-03-24 06:38:42', '2021-03-24 06:38:42'),
(17, 4, 6, 'PRD4202103007', 'GoFotoVideo', NULL, 'gofotovideo.png', NULL, '<p><span style=\"color: #555555; font-family: \'Proxima Nova\', times, arial, serif; font-size: 14px; text-align: center; white-space: pre-wrap; background-color: #ffffff;\">Paket Corona 2020 IDR 6,5 jt Khusus Pemberkatan / Akad Nikah 1 Photographer 1 Videographer 5-15 Minutes Full HD Video 1 Album All Photos (Semua Photo Sudah Diedit via Adobe Lightroom, no fresh fram camera photos like others) Flexible Time</span></p>', NULL, 6500000, 1, NULL, 1, '2021-03-24 06:41:53', '2021-03-24 06:41:53'),
(18, 4, 6, 'PRD4202103008', 'Alissha Bride', NULL, 'alissha-bride.jpg', NULL, '<div class=\"pl-title f-p-14\" style=\"outline: none; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: calc(0.9em + 4px); font-family: \'Proxima Nova\', arial; vertical-align: baseline; letter-spacing: 0.05em; color: #555555; text-align: center; background-color: #ffffff;\">[BEST BUDGET] AMBER (FULL BRIDAL PACKAGE)</div>\r\n<div class=\"pl-price f-u-14 reg\" style=\"outline: none; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: \'Proxima Nova\', times, arial, serif; vertical-align: baseline; color: #555555; text-align: center; background-color: #ffffff;\"><span class=\"price\" style=\"outline: none; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bold; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: #eba1a1;\">IDR&nbsp;18.000.000&nbsp;</span>/&nbsp;package</div>\r\n<div class=\"pl-description\" style=\"outline: none; margin: 0px; padding: 20px 0px 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: \'Proxima Nova\', times, arial, serif; vertical-align: baseline; white-space: pre-wrap; color: #555555; text-align: center; background-color: #ffffff;\">Things that you got in Amber packages are: 1 \"Gold\" Class Wedding Gown (rented with accessories) + 1 \"Gold\" Class Wedding Gown* 1 Complete Groom\'s Suit (rented) Make-up &amp; Hair-do/Hijab for Wedding at Alissha - 1x Make-up &amp; Hair-do/Hijab for Bride and Groom - 1x Test Make-up for Bride at Pre-wedding - 1x Retouch for Bride at Alissha - 2 Make-ups &amp; Hair-dos/Hijab for Mother Pre-wedding Photoshoot - Full Day Unlimited Photoshoot - All File Photos - Indoor &amp; Outdoor (price w/o outdoor photosite permit) - Include pre-wed make-up - Include 2 gowns &amp; 1 suit for pre-wed photoshoot - Total of 20 edited photos - 1 album 20 x 25 - 1 canvas + photoframe 40 x 50 Serena / Baby Benz Wedding Car 3 Layers Wedding Cake Photos &amp; Videos Facilities - On the spot filming - Photographer + Videographer - 1 album</div>', NULL, 3300000, 1, NULL, 1, '2021-03-24 06:49:01', '2021-03-24 06:49:01'),
(19, 4, 6, 'PRD4202103009', 'Monchichi', NULL, 'monchichi.jpg', NULL, '<div class=\"pl-title f-p-14\" style=\"outline: none; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: calc(0.9em + 4px); font-family: \'Proxima Nova\', arial; vertical-align: baseline; letter-spacing: 0.05em; color: #555555; text-align: center; background-color: #ffffff;\">Full Service Package (Prewedding-Wedding) - Photo&amp;Video</div>\r\n<div class=\"pl-price f-u-14 reg\" style=\"outline: none; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: \'Proxima Nova\', times, arial, serif; vertical-align: baseline; color: #555555; text-align: center; background-color: #ffffff;\"><span class=\"price\" style=\"outline: none; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bold; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: #eba1a1;\">IDR&nbsp;50.000.000&nbsp;</span>/&nbsp;Package</div>\r\n<div class=\"pl-description\" style=\"outline: none; margin: 0px; padding: 20px 0px 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: \'Proxima Nova\', times, arial, serif; vertical-align: baseline; white-space: pre-wrap; color: #555555; text-align: center; background-color: #ffffff;\">Full Service , it\'s the most Favourite Package from us that our client take and make a deal :) Prewedding: - Photographer -Videographer - MUA &amp; Touch Up - 1 Album Exclusive (22 Pages) - 2 Canvas 60x90cm -Prewedding Clip - All File Copy</div>', NULL, 50000000, 1, NULL, 1, '2021-03-24 06:50:35', '2021-03-24 06:50:35'),
(20, 4, 6, 'PRD4202103010', 'Wedding Factory', NULL, 'wedding-factory.png', NULL, 'Silver Wedding Package\r\nIDR 8.800.000 / package\r\n- Full Day Documentation (No Hour Limitation) 2 Crew for Photo + 1 Crew for Video Cinematic\r\n- Full Video 1-2 Hours Duration\r\n- Cinematic Video for Instagram\r\n- Free All Raw Files\r\n- 25 Edit Photos\r\n- Free Canvas 60x40 Include Frame\r\n- Free 1 Album 20x30 [ 20 Pages ] Hard Cover', NULL, 8800000, 1, NULL, 1, '2021-03-24 08:00:26', '2021-03-24 08:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `products_category`
--

DROP TABLE IF EXISTS `products_category`;
CREATE TABLE `products_category` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

DROP TABLE IF EXISTS `products_images`;
CREATE TABLE `products_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `image`) VALUES
(15, 11, '3.jpg'),
(16, 11, '2.jpg'),
(17, 11, '9.jpg'),
(18, 11, '12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products_review`
--

DROP TABLE IF EXISTS `products_review`;
CREATE TABLE `products_review` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `transaction_id` int(11) UNSIGNED NOT NULL,
  `rating` int(1) DEFAULT NULL,
  `review` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) DEFAULT 1,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `active`, `description`) VALUES
(1, 'Venue', 1, ''),
(4, 'Decoration', 1, ''),
(6, 'Catering', 1, NULL),
(8, 'Dress & Attire', 1, NULL),
(9, 'Photograpy', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `transaction_code` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_pay` int(11) NOT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `transaction_exp_date` datetime DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `crated_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `event_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

DROP TABLE IF EXISTS `transaction_detail`;
CREATE TABLE `transaction_detail` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `note` text DEFAULT NULL,
  `cash` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `sub_total_payment` int(11) NOT NULL,
  `confirm` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'rizkyardi.ilhami06@gmail.com', 'rizkyardi', '$2y$10$G5j5k7jijPQRT344Lrt6Qukr8M.KhzktVz9R6Sg.2lPMRHDQjxDLy', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-02-09 04:16:46', '2021-02-09 04:17:59', NULL),
(4, 'rizky.mahasiswa@stmik-tasikmalaya.ac.id', 'rizkymhs', '$2y$10$o1VNfJulkKi79N8alnbUau.4hN8BU0CK4jj7L7h/hjfc83nkBuC52', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-02-09 04:38:59', '2021-02-09 04:40:05', NULL),
(5, 'muhamadarsaludin71@gmail.com', 'arsal', '$2y$10$jrA4SNtwP2SWzc6mGhup6.9mXkG1HH1n5q3CZL0EclnEoGKoJDxBi', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-02-09 08:00:49', '2021-02-09 08:01:53', NULL),
(12, 'muhamadarsal71@gmail.com', 'arsal71', '$2y$10$jD9H/47/Nn1QdyTnH6EfW.3yaD928XZo19B1E2Ae82QDvEmr0DZZK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-03-04 01:47:11', '2021-03-04 01:47:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_profile`
--

DROP TABLE IF EXISTS `users_profile`;
CREATE TABLE `users_profile` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `full_name` varchar(128) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT 'default.svg',
  `contact` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_profile`
--

INSERT INTO `users_profile` (`id`, `user_id`, `full_name`, `user_image`, `contact`, `address`, `city`, `province`, `postal_code`) VALUES
(1, 5, 'Muhamad Arsaludin', 'default.svg', '081292040869', 'Jl. Intan Permata IX No. 24 kota Tasikmalaya Jawa Barat', 'Tasikmalaya', 'Jawa Barat', '46153'),
(4, 12, 'arsal71', 'default.svg', NULL, NULL, NULL, NULL, NULL),
(5, 4, 'rizkymhs', 'default.svg', NULL, NULL, NULL, NULL, NULL),
(6, 1, 'rizkyardi', 'default.svg', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
CREATE TABLE `vendors` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `vendor_code` varchar(20) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `vendor_logo` varchar(255) NOT NULL DEFAULT 'default.png',
  `vendor_billboard` varchar(255) NOT NULL DEFAULT 'default.png',
  `vendor_level_id` int(11) UNSIGNED NOT NULL DEFAULT 1,
  `vendor_description` text DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `user_id`, `vendor_code`, `vendor_name`, `vendor_logo`, `vendor_billboard`, `vendor_level_id`, `vendor_description`, `active`, `created_at`, `updated_at`) VALUES
(2, 1, 'VND_0220210001', 'Grand Aston Bali', 'logo1.png', 'default.png', 4, NULL, 1, '2021-02-24 14:48:01', '2021-02-24 14:48:01'),
(3, 4, 'VND_0220210002', 'Sarovar', 'logo2.png', 'default.png', 1, NULL, 1, '2021-02-24 14:50:28', '2021-02-24 14:50:28'),
(4, 5, 'VND_0220210003', 'RH Wedding Planner', 'logo.png', 'rhvideo.mp4', 4, 'Official vendor from RH Wedding Planner', 1, '2021-03-03 19:45:09', '2021-03-03 19:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `vendors_level`
--

DROP TABLE IF EXISTS `vendors_level`;
CREATE TABLE `vendors_level` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendors_level`
--

INSERT INTO `vendors_level` (`id`, `name`, `description`) VALUES
(1, 'Classic', NULL),
(2, 'Silver', NULL),
(3, 'Gold', ''),
(4, 'Platinum', '');

-- --------------------------------------------------------

--
-- Table structure for table `vendors_services`
--

DROP TABLE IF EXISTS `vendors_services`;
CREATE TABLE `vendors_services` (
  `id` int(11) UNSIGNED NOT NULL,
  `vendor_id` int(11) UNSIGNED NOT NULL,
  `service_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendors_services`
--

INSERT INTO `vendors_services` (`id`, `vendor_id`, `service_id`) VALUES
(1, 2, 1),
(2, 3, 1),
(3, 4, 1),
(4, 4, 4),
(5, 4, 8),
(6, 4, 9),
(22, 4, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `product_service_id` (`product_service_id`);

--
-- Indexes for table `products_category`
--
ALTER TABLE `products_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products_review`
--
ALTER TABLE `products_review`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_code` (`transaction_code`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `vendor_level_id` (`vendor_level_id`);

--
-- Indexes for table `vendors_level`
--
ALTER TABLE `vendors_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors_services`
--
ALTER TABLE `vendors_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `service_id` (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products_category`
--
ALTER TABLE `products_category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products_review`
--
ALTER TABLE `products_review`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendors_level`
--
ALTER TABLE `vendors_level`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vendors_services`
--
ALTER TABLE `vendors_services`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `cart_detail_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`product_service_id`) REFERENCES `vendors_services` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `products_images`
--
ALTER TABLE `products_images`
  ADD CONSTRAINT `products_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_review`
--
ALTER TABLE `products_review`
  ADD CONSTRAINT `products_review_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_review_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD CONSTRAINT `transaction_detail_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `users_profile`
--
ALTER TABLE `users_profile`
  ADD CONSTRAINT `users_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_ibfk_1` FOREIGN KEY (`vendor_level_id`) REFERENCES `vendors_level` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vendors_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendors_services`
--
ALTER TABLE `vendors_services`
  ADD CONSTRAINT `vendors_services_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vendors_services_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
