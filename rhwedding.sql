-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Apr 2021 pada 07.23
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_activation_attempts`
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
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`, `active`) VALUES
(1, 'Admin', 'Administrator', 1),
(2, 'Vendor', 'vendor partners', 1),
(3, 'User', 'Regular user', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(1, 5),
(2, 12),
(3, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
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
(67, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-24 05:39:03', 1),
(68, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-25 07:40:19', 1),
(69, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-26 03:32:14', 1),
(70, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-26 11:28:30', 1),
(71, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-27 04:38:33', 1),
(72, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-29 03:45:28', 1),
(73, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-29 03:47:04', 1),
(74, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-29 04:17:03', 1),
(75, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-29 05:36:19', 1),
(76, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-29 06:26:19', 1),
(77, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-29 06:41:58', 1),
(78, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-29 06:46:40', 1),
(79, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-29 06:47:02', 1),
(80, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-29 06:47:21', 1),
(81, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-29 06:52:04', 1),
(82, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-29 11:00:07', 1),
(83, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-29 11:32:16', 1),
(84, '::1', 'muhamadarsaludin71@gmail.com', NULL, '2021-03-29 11:51:39', 0),
(85, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-29 11:51:47', 1),
(86, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-29 12:26:06', 1),
(87, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-29 12:29:13', 1),
(88, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-29 18:49:32', 1),
(89, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-31 08:24:52', 1),
(90, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-03-31 21:48:15', 1),
(91, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-04-02 08:23:32', 1),
(92, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-04-03 02:25:17', 1),
(93, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-04-03 04:54:50', 1),
(94, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-04-04 22:40:38', 1),
(95, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-04-05 05:09:26', 1),
(96, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-04-06 01:05:24', 1),
(97, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-04-06 23:29:15', 1),
(98, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-04-07 22:19:35', 1),
(99, '::1', 'muhamadarsal71@gmail.com', 12, '2021-04-08 01:11:50', 1),
(100, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-04-08 01:37:31', 1),
(101, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-04-08 01:42:36', 1),
(102, '::1', 'muhamadarsal71@gmail.com', 12, '2021-04-08 01:55:25', 1),
(103, '::1', 'muhamadarsaludin71@gmail.com', NULL, '2021-04-08 02:00:58', 0),
(104, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-04-08 02:01:13', 1),
(105, '::1', 'muhamadarsal71@gmail.com', 12, '2021-04-08 04:13:38', 1),
(106, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-04-08 10:59:08', 1),
(107, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-04-09 07:45:51', 1),
(108, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-04-09 07:46:44', 1),
(109, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-04-09 07:48:47', 1),
(110, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-04-09 07:55:40', 1),
(111, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-04-10 09:58:14', 1),
(112, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-04-10 13:28:39', 1),
(113, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-04-11 08:41:15', 1),
(114, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-04-11 09:15:05', 1),
(115, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-04-11 09:30:36', 1),
(116, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-04-12 00:23:50', 1),
(117, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-04-13 23:03:28', 1),
(118, '::1', 'muhamadarsaludin71@gmail.com', 5, '2021-04-14 11:49:03', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

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
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 5, '2021-03-29 15:43:14', '2021-03-29 15:43:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `process_into_transaction` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `vendor_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `vendor_id`, `name`, `description`) VALUES
(1, 4, 'The Day', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

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
-- Dumping data untuk tabel `migrations`
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
-- Struktur dari tabel `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `message` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `message`, `link`, `created_at`) VALUES
(10, 5, 'New orders for Bussines suit require confirmation', '/transaction/confirm/TRA-607334CA2865F', '2021-04-12 13:15:15'),
(11, 5, 'New orders for Gaun Monalisa require confirmation', '/transaction/confirm/TRA-607334CA2865F', '2021-04-12 13:15:24'),
(12, 5, 'An order with code TRA-607334CA2865F is being processed', '/transaction/TRA-607334CA2865F', '2021-04-12 13:15:30'),
(13, 5, 'Order for Tuxedo has been approved', '/transaction/TRA-607331CC20089', '2021-04-12 13:15:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `vendor_id` int(11) UNSIGNED NOT NULL,
  `product_service_id` int(11) UNSIGNED NOT NULL,
  `product_code` varchar(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `product_main_image` varchar(255) NOT NULL,
  `product_video` varchar(255) DEFAULT NULL,
  `product_description` text DEFAULT NULL,
  `product_sold` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `total_review` int(11) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `vendor_id`, `product_service_id`, `product_code`, `product_name`, `slug`, `product_main_image`, `product_video`, `product_description`, `product_sold`, `price`, `total_review`, `active`, `created_at`, `updated_at`) VALUES
(28, 4, 9, '', 'Paket Prewedding', 'Paket-Prewedding.P-74982531', '7.jpg', NULL, '<p>test 2</p>', NULL, 4000000, NULL, 1, '2021-03-27 07:37:32', '2021-03-29 19:18:50'),
(29, 4, 8, '', 'Gaun Monalisa', 'Gaun-Monalisa.P-23967158', '1.jpg', NULL, '<p>Gaun elegan untuk acara pernikahaan</p>', NULL, 3000000, NULL, 1, '2021-03-29 19:21:48', '2021-03-29 19:21:48'),
(30, 4, 8, '', 'Tuxedo', 'Tuxedo.P-29687351', 'shintarotuxx2-Sk1Hc4BtU.jpg', NULL, '<p>Tuxedo pakaian formal pria</p>', NULL, 2000000, NULL, 1, '2021-03-29 19:25:03', '2021-03-29 19:25:03'),
(31, 4, 8, '', 'Bussines suit', 'Bussines-suit-P-98316745', 'cf171dac-6804-45a9-b213-bbcea2c0931b-1-S1KHKNHtL.jpg', NULL, '<p>Cocok untuk anda yang ingin berpenampilan elegan</p>', NULL, 2500000, NULL, 1, '2021-03-29 19:26:22', '2021-03-29 19:26:22'),
(32, 4, 9, '', 'Prewedding Paket Classic', 'Prewedding-Paket-Classic.P-03468597', '8.jpg', NULL, '<p>Paket termasuk :</p>\r\n<p>1. 2 Orang Crew</p>\r\n<p>2. 1x Technical Meeting</p>\r\n<p>3. Free Hard Coppy Foto Pilihan Ukuran 16RP + Frame</p>', NULL, 1500000, NULL, 1, '2021-03-29 19:31:09', '2021-03-29 19:31:09'),
(33, 4, 9, '', 'Photograpy Pernikahan By RH', 'Photograpy-Pernikahan-By-RH.P-30597261', 'product-3.jpg', NULL, '<p>Paket Termasuk:</p>\r\n<p>1. 2 Orang Crew</p>\r\n<p>2. 1x Technical Meeting</p>\r\n<p>3. Foto OTS untuk souvenir</p>\r\n<p>4. Album foto</p>\r\n<p>5. Free hard copy foto ukuran 16RP + Frame</p>\r\n<p>&nbsp;</p>', NULL, 5500000, NULL, 1, '2021-03-29 19:35:43', '2021-03-29 19:36:36'),
(34, 4, 9, '', 'Alissha Bride Photo', 'Alissha-Bride-Photo.P-89032476', 'alissha-bride.jpg', NULL, '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #7e7e7e; font-family: Nunito, -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px;\">Paket Termasuk:</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #7e7e7e; font-family: Nunito, -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px;\">1. 2 Orang Crew</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #7e7e7e; font-family: Nunito, -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px;\">2. 1x Technical Meeting</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #7e7e7e; font-family: Nunito, -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px;\">3. Album foto</p>', NULL, 2000000, NULL, 1, '2021-03-29 19:39:17', '2021-03-29 19:39:17'),
(37, 4, 8, '', 'Gaun Pesta', 'Gaun-Pesta.P-94670813', '5376ac4139a84090db673da7e246956e.jpg_720x720q80.jpg_.jpg', NULL, '<p>Keterangan :</p>\r\n<p>1. Pre Order H-20</p>\r\n<p>2. Pengukurang Badan&nbsp;</p>\r\n<p>3. Free cover gaun&nbsp;</p>\r\n<p>&nbsp;</p>', NULL, 4000000, NULL, 1, '2021-03-29 19:49:52', '2021-03-29 19:49:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products_category`
--

CREATE TABLE `products_category` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products_images`
--

CREATE TABLE `products_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `image`) VALUES
(28, 28, '8.jpg'),
(29, 28, 'product-4.jpg'),
(30, 28, '6.jpg'),
(31, 29, '3.jpg'),
(32, 29, '8_1.jpg'),
(33, 33, 'product-5.jpg'),
(34, 37, '1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products_review`
--

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
-- Struktur dari tabel `services`
--

CREATE TABLE `services` (
  `id` int(11) UNSIGNED NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `active` int(11) DEFAULT 1,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `services`
--

INSERT INTO `services` (`id`, `service_name`, `active`, `description`) VALUES
(1, 'Venue', 1, ''),
(4, 'Decoration', 1, ''),
(6, 'Catering', 1, NULL),
(8, 'Dress & Attire', 1, 'Tampil cantik di hari pernikahanmu'),
(9, 'Photograpy', 1, 'Abadikan momen terbaikmu!');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `transaction_code` varchar(20) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `total_pay` int(11) NOT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `transaction_exp_date` datetime DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `payment_status` tinyint(1) DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `event_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`id`, `transaction_code`, `user_id`, `total_pay`, `transaction_date`, `transaction_exp_date`, `payment_method`, `payment_date`, `payment_status`, `created_at`, `updated_at`, `event_date`, `event_time`, `event_address`) VALUES
(1, 'TRA-12050420210001', 4, 7000000, '2021-04-05 13:07:59', '2021-04-12 13:07:59', NULL, '2021-04-11 13:07:59', 1, '2021-04-05 13:07:59', '2021-04-05 13:07:59', '2021-06-14', '00:00:00', 'Indihiang, Tasikmalaya'),
(6, 'TRA-606FC3DA79B38', 5, 12000000, '2021-09-04 10:02:50', '2021-11-09 10:02:50', NULL, NULL, 0, '2021-04-09 10:02:50', '0000-00-00 00:00:00', '2021-04-15', '10:00:00', 'Jl. Intan Permata IX No. 24 kota Tasikmalaya Jawa Barat'),
(17, 'TRA-607331CC20089', 5, 2000000, '2021-12-04 00:28:44', '2021-11-12 00:28:44', NULL, NULL, 0, '2021-04-12 00:28:44', '0000-00-00 00:00:00', '2021-04-12', '12:28:00', 'Jl. Intan Permata IX No. 24 kota Tasikmalaya Jawa Barat'),
(20, 'TRA-6073337019C8F', 5, 5000000, '2021-12-04 00:35:44', '2021-11-12 00:35:44', NULL, NULL, 0, '2021-04-12 00:35:44', '0000-00-00 00:00:00', '2021-04-12', '12:35:00', 'Jl. Intan Permata IX No. 24 kota Tasikmalaya Jawa Barat'),
(21, 'TRA-607334CA2865F', 5, 5500000, '2021-12-04 00:41:30', '2021-11-12 00:41:30', NULL, NULL, 0, '2021-04-12 00:41:30', '0000-00-00 00:00:00', '2021-04-12', '00:41:00', 'Jl. Intan Permata IX No. 24 kota Tasikmalaya Jawa Barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `note` text DEFAULT NULL,
  `confirm` int(1) DEFAULT NULL,
  `reason_reject` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaction_detail`
--

INSERT INTO `transaction_detail` (`id`, `transaction_id`, `product_id`, `note`, `confirm`, `reason_reject`) VALUES
(1, 1, 28, NULL, 1, NULL),
(2, 1, 29, NULL, 1, NULL),
(3, 1, 30, 'Ini catatan pembelian', NULL, NULL),
(7, 6, 33, NULL, 1, NULL),
(8, 6, 37, NULL, NULL, NULL),
(9, 6, 31, NULL, NULL, NULL),
(24, 17, 30, NULL, 1, NULL),
(27, 20, 30, NULL, NULL, NULL),
(28, 20, 29, NULL, NULL, NULL),
(29, 21, 31, NULL, NULL, NULL),
(30, 21, 29, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'rizkyardi.ilhami06@gmail.com', 'rizkyardi', '$2y$10$G5j5k7jijPQRT344Lrt6Qukr8M.KhzktVz9R6Sg.2lPMRHDQjxDLy', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-02-09 04:16:46', '2021-02-09 04:17:59', NULL),
(4, 'rizky.mahasiswa@stmik-tasikmalaya.ac.id', 'rizkymhs', '$2y$10$o1VNfJulkKi79N8alnbUau.4hN8BU0CK4jj7L7h/hjfc83nkBuC52', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-02-09 04:38:59', '2021-02-09 04:40:05', NULL),
(5, 'muhamadarsaludin71@gmail.com', 'arsal', '$2y$10$jrA4SNtwP2SWzc6mGhup6.9mXkG1HH1n5q3CZL0EclnEoGKoJDxBi', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-02-09 08:00:49', '2021-02-09 08:01:53', NULL),
(12, 'muhamadarsal71@gmail.com', 'arsal71', '$2y$10$jD9H/47/Nn1QdyTnH6EfW.3yaD928XZo19B1E2Ae82QDvEmr0DZZK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-03-04 01:47:11', '2021-03-04 01:47:29', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_profile`
--

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
-- Dumping data untuk tabel `users_profile`
--

INSERT INTO `users_profile` (`id`, `user_id`, `full_name`, `user_image`, `contact`, `address`, `city`, `province`, `postal_code`) VALUES
(1, 5, 'Muhamad Arsaludin', 'default.svg', '081292040869', 'Jl. Intan Permata IX No. 24 kota Tasikmalaya Jawa Barat', 'Tasikmalaya', 'Jawa Barat', '46153'),
(4, 12, 'arsal71', 'default.svg', NULL, NULL, NULL, NULL, NULL),
(5, 4, 'Rizky Ardi', 'default.svg', NULL, NULL, NULL, NULL, NULL),
(6, 1, 'rizkyardi', 'default.svg', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `vendor_code` varchar(20) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `vendor_logo` varchar(255) NOT NULL DEFAULT 'default.png',
  `vendor_banner` varchar(255) DEFAULT NULL,
  `vendor_billboard` varchar(255) NOT NULL DEFAULT 'default.png',
  `vendor_level_id` int(11) UNSIGNED NOT NULL DEFAULT 1,
  `vendor_description` text DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `contact_vendor` varchar(12) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `vendor_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `vendors`
--

INSERT INTO `vendors` (`id`, `user_id`, `slug`, `vendor_code`, `vendor_name`, `vendor_logo`, `vendor_banner`, `vendor_billboard`, `vendor_level_id`, `vendor_description`, `active`, `contact_vendor`, `city`, `created_at`, `updated_at`, `vendor_address`) VALUES
(2, 1, 'Grand-Aston-Bali', 'VND_0220210001', 'Grand Aston Bali', 'logo1.png', NULL, 'default.png', 4, NULL, 1, '', NULL, '2021-02-24 14:48:01', '2021-02-24 14:48:01', NULL),
(3, 4, 'Sarovar', 'VND_0220210002', 'Sarovar', 'logo2.png', NULL, 'default.png', 1, NULL, 1, '', NULL, '2021-02-24 14:50:28', '2021-02-24 14:50:28', NULL),
(4, 5, 'RH-Wedding-Planner', 'VND_0220210003', 'RH Wedding Planner', 'logo.png', '1.jpg', 'rhvideo.mp4', 4, 'Official vendor from RH Wedding Planner', 1, '', NULL, '2021-03-03 19:45:09', '2021-03-03 19:45:09', NULL),
(7, 12, 'Fatmalia', 'VND202104005', 'Fatmalia', 'default.png', NULL, 'default.png', 1, NULL, 1, '08129038938', 'Tasikmalaya', '2021-04-08 04:26:32', '2021-04-08 04:26:32', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendors_level`
--

CREATE TABLE `vendors_level` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `vendors_level`
--

INSERT INTO `vendors_level` (`id`, `name`, `description`) VALUES
(1, 'Classic', NULL),
(2, 'Silver', NULL),
(3, 'Gold', ''),
(4, 'Platinum', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendors_services`
--

CREATE TABLE `vendors_services` (
  `id` int(11) UNSIGNED NOT NULL,
  `vendor_id` int(11) UNSIGNED NOT NULL,
  `service_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `vendors_services`
--

INSERT INTO `vendors_services` (`id`, `vendor_id`, `service_id`) VALUES
(1, 2, 1),
(2, 3, 1),
(3, 4, 1),
(4, 4, 4),
(5, 4, 8),
(6, 4, 9);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `product_service_id` (`product_service_id`);

--
-- Indeks untuk tabel `products_category`
--
ALTER TABLE `products_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeks untuk tabel `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `products_review`
--
ALTER TABLE `products_review`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_code` (`transaction_code`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `vendor_level_id` (`vendor_level_id`);

--
-- Indeks untuk tabel `vendors_level`
--
ALTER TABLE `vendors_level`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vendors_services`
--
ALTER TABLE `vendors_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `service_id` (`service_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `products_category`
--
ALTER TABLE `products_category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `products_review`
--
ALTER TABLE `products_review`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `vendors_level`
--
ALTER TABLE `vendors_level`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `vendors_services`
--
ALTER TABLE `vendors_services`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `cart_detail_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`product_service_id`) REFERENCES `services` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products_images`
--
ALTER TABLE `products_images`
  ADD CONSTRAINT `products_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products_review`
--
ALTER TABLE `products_review`
  ADD CONSTRAINT `products_review_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_review_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD CONSTRAINT `transaction_detail_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users_profile`
--
ALTER TABLE `users_profile`
  ADD CONSTRAINT `users_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_ibfk_1` FOREIGN KEY (`vendor_level_id`) REFERENCES `vendors_level` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vendors_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `vendors_services`
--
ALTER TABLE `vendors_services`
  ADD CONSTRAINT `vendors_services_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vendors_services_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
