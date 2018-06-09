-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 09, 2018 at 08:18 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wifisocial`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisings`
--

CREATE TABLE `advertisings` (
  `id_advertising` int(10) UNSIGNED NOT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `media_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `id_device` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `advertisings`
--

INSERT INTO `advertisings` (`id_advertising`, `keyword`, `type`, `media_file`, `position`, `id_device`, `id_user`, `created_at`, `updated_at`) VALUES
(7, 'Banner de Bienvenida', '0', '56052.jpg', 1, 2, 2, '2016-11-16 05:48:14', '2018-06-09 22:23:29'),
(8, 'first', '0', '75471.jpg', 2, 2, 2, '2016-11-16 22:07:26', '2016-12-01 00:25:18'),
(9, 'second', '0', '34624.jpg', 2, 2, 2, '2016-11-16 22:07:50', '2016-12-01 00:42:04'),
(10, 'Fondo de pagina', '0', '52255.jpg', 3, 2, 2, '2016-11-17 06:31:05', '2016-12-01 01:08:52'),
(11, 'third', '0', '55417.jpg', 2, 2, 2, '2016-12-01 00:33:59', '2016-12-01 00:34:13'),
(12, 'four', '0', '47831.jpg', 2, 2, 2, '2016-12-01 00:34:30', '2016-12-01 00:34:30'),
(13, 'five', '0', '71598.jpg', 2, 2, 2, '2016-12-01 00:42:45', '2016-12-01 00:42:45'),
(14, 'colombia coffe', '1', '34346.mp4', 2, 2, 2, '2016-12-01 01:59:21', '2016-12-01 01:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `client_devices`
--

CREATE TABLE `client_devices` (
  `id_device` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `mac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `device_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `device_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `client_devices`
--

INSERT INTO `client_devices` (`id_device`, `id_user`, `mac`, `name`, `ip`, `device_username`, `device_password`, `created_at`, `updated_at`) VALUES
(2, 2, 'F4F26DF4ADA6', 'TP LINK 740N', '192.168.50.2', 'root', '', '2016-11-11 08:12:55', '2016-11-11 08:12:55'),
(3, 2, '30B5C20B390A', 'TP LINK 841ND', '192.168.50.3', '2', '', '2016-12-10 07:59:21', '2016-12-10 07:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `facebook_consumers`
--

CREATE TABLE `facebook_consumers` (
  `id_consumer` int(11) NOT NULL,
  `id_fb_user` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age_range` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `religion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `political` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lacation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hometown` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_token` text COLLATE utf8_unicode_ci NOT NULL,
  `mac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `google_consumers`
--

CREATE TABLE `google_consumers` (
  `id_consumer` int(11) NOT NULL,
  `id_goo_user` int(11) NOT NULL,
  `full_name` varchar(250) COLLATE utf8_bin NOT NULL,
  `profile_picture` varchar(250) COLLATE utf8_bin NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `id_user` int(11) NOT NULL,
  `mac` varchar(200) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `protected` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`, `protected`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '{\"_superadmin\":1}', 0, '2016-11-06 19:32:48', '2016-11-08 07:53:21'),
(4, 'Member', '{\"_member\":1}', 0, '2016-11-06 19:40:20', '2016-11-08 07:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `instagram_consumers`
--

CREATE TABLE `instagram_consumers` (
  `id_consumer` int(200) NOT NULL,
  `id_ig_user` varchar(250) CHARACTER SET latin1 NOT NULL,
  `full_name` varchar(200) CHARACTER SET latin1 NOT NULL,
  `profile_picture` varchar(250) CHARACTER SET latin1 NOT NULL,
  `website` varchar(250) CHARACTER SET latin1 NOT NULL,
  `bio` text CHARACTER SET latin1 NOT NULL,
  `username` varchar(250) CHARACTER SET latin1 NOT NULL,
  `access_token` text CHARACTER SET latin1 NOT NULL,
  `mac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 1),
(2, '2014_02_19_095545_create_users_table', 1),
(3, '2014_02_19_095623_create_user_groups_table', 1),
(4, '2014_02_19_095637_create_groups_table', 1),
(5, '2014_02_19_160516_create_permission_table', 1),
(6, '2014_02_26_165011_create_user_profile_table', 1),
(7, '2014_05_06_122145_create_profile_field_types', 1),
(8, '2014_05_06_122155_create_profile_field', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2016_11_06_171457_create_client_devices_table', 2),
(11, '2016_11_07_134509_create_facebook_consumers_table', 3),
(12, '2016_11_08_120137_create_advertisings_table', 4),
(13, '2016_11_08_121000_create_advertisings_table', 5),
(14, '2016_11_08_153445_create_advertisings_table', 6),
(15, '2016_11_08_154207_create_advertisings_table', 7),
(16, '2016_11_09_112205_create_portals_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `protected` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `description`, `permission`, `protected`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '_superadmin', 0, '2016-11-06 19:32:48', '2016-11-06 19:32:48'),
(6, 'member', '_member', 0, '2016-11-08 05:23:09', '2016-11-08 05:23:09');

-- --------------------------------------------------------

--
-- Table structure for table `portals`
--

CREATE TABLE `portals` (
  `id_portal` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_popup` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `close_popup_time` int(11) NOT NULL,
  `close_popup_time_seconds` int(11) NOT NULL,
  `redirect_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `access_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fb_page_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fb_page_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `share_action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `share_message` text COLLATE utf8_unicode_ci NOT NULL,
  `like_us_popup` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `close_popup_like_time` int(11) NOT NULL,
  `close_popup_like_time_seconds` int(11) NOT NULL,
  `id_device` int(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `css` text COLLATE utf8_unicode_ci,
  `connect_fb` int(20) NOT NULL DEFAULT '0',
  `connect_ig` int(20) NOT NULL DEFAULT '0',
  `connect_tw` int(20) NOT NULL DEFAULT '0',
  `connect_go` int(20) NOT NULL DEFAULT '0',
  `connect_wa` int(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `portals`
--

INSERT INTO `portals` (`id_portal`, `title`, `display_popup`, `close_popup_time`, `close_popup_time_seconds`, `redirect_url`, `access_code`, `fb_page_id`, `fb_page_name`, `share_action`, `share_message`, `like_us_popup`, `close_popup_like_time`, `close_popup_like_time_seconds`, `id_device`, `id_user`, `css`, `connect_fb`, `connect_ig`, `connect_tw`, `connect_go`, `connect_wa`, `created_at`, `updated_at`) VALUES
(2, 'Café Sorrento', '1', 0, 2, 'https://www.facebook.com/cafesorrentoarmenia', '5555', '1374285526139276', 'Café Sorrento', '1', 'share our site', '0', 0, 5, 2, 2, '', 1, 1, 1, 1, 0, '2016-11-17 07:27:57', '2018-06-09 22:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `portals_users_instagram`
--

CREATE TABLE `portals_users_instagram` (
  `id_ig_user` int(11) UNSIGNED NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_portal` int(10) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `profile_picture` varchar(250) NOT NULL,
  `website` varchar(250) NOT NULL,
  `bio` text NOT NULL,
  `username` varchar(250) NOT NULL,
  `access_token` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `portals_users_twitter`
--

CREATE TABLE `portals_users_twitter` (
  `id_tw_user` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `profile_picture` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(200) COLLATE utf8_bin NOT NULL,
  `username` varchar(200) COLLATE utf8_bin NOT NULL,
  `access_token` text COLLATE utf8_bin NOT NULL,
  `mac` varchar(200) COLLATE utf8_bin NOT NULL,
  `id_portal` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `profile_field`
--

CREATE TABLE `profile_field` (
  `id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(10) UNSIGNED NOT NULL,
  `profile_field_type_id` int(10) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_field_type`
--

CREATE TABLE `profile_field_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(3, 1, '::1', 0, 0, 0, NULL, NULL, NULL),
(4, 2, '::1', 0, 0, 0, NULL, NULL, NULL),
(5, 3, '::1', 0, 0, 0, NULL, NULL, NULL),
(6, 1, '181.60.34.243', 0, 0, 0, NULL, NULL, NULL),
(7, 3, '181.60.34.243', 5, 1, 0, '2016-11-16 04:19:46', '2016-11-16 04:19:46', NULL),
(8, 2, '181.60.34.243', 0, 0, 0, NULL, NULL, NULL),
(9, 1, '190.9.208.186', 0, 0, 0, NULL, NULL, NULL),
(10, 2, '181.51.186.112', 0, 0, 0, NULL, NULL, NULL),
(11, 1, '127.0.0.1', 1, 0, 0, '2018-06-09 20:07:57', NULL, NULL),
(12, 2, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(13, 3, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `token` char(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `platform` varchar(100) DEFAULT NULL,
  `id_fb_user` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`token`, `date`, `platform`, `id_fb_user`) VALUES
('1822783a5ceb082823786e098c55adacdb4b4ebb', '2018-06-09 18:09:01', 'facebook', '10154208364573131');

-- --------------------------------------------------------

--
-- Table structure for table `twitter_consumers`
--

CREATE TABLE `twitter_consumers` (
  `id_consumer` int(11) NOT NULL,
  `id_tw_user` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `profile_picture` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(200) COLLATE utf8_bin NOT NULL,
  `username` varchar(200) COLLATE utf8_bin NOT NULL,
  `access_token` text COLLATE utf8_bin NOT NULL,
  `mac` varchar(200) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `protected` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `activated`, `banned`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `protected`, `created_at`, `updated_at`) VALUES
(1, 'alex.rivera.ws@gmail.com', '$2y$10$tEnwYFHG3JmqXEDSfDtEKOblslP.3LTwOjZd38gB2lTY4si824Z.a', NULL, 1, 0, NULL, NULL, '2016-12-10 07:49:23', '$2y$10$6clMEZKKcZ97ipvI9Nd4yOTjqBoFqE6/SZsiFdEp018D7YYaMl2uC', NULL, 0, '2016-11-06 19:32:48', '2016-12-10 07:49:23'),
(2, 'client@gmail.com', '$2y$10$tEnwYFHG3JmqXEDSfDtEKOblslP.3LTwOjZd38gB2lTY4si824Z.a', '{\"_member\":1}', 1, 0, NULL, NULL, '2018-06-09 20:09:17', '$2y$10$8Qp9bEo7J1eKC64wXwyU4OZjAL86sNf22lHwn.Bh.qXvJaGtY.9ZG', NULL, 0, '2016-11-06 19:42:56', '2018-06-09 20:09:17'),
(3, 'admin@gmail.com', '$2y$10$tEnwYFHG3JmqXEDSfDtEKOblslP.3LTwOjZd38gB2lTY4si824Z.a', '{\"_superadmin\":1}', 1, 0, 'Uc8hhzjGBfkxAyk5DR4MfhowceUSVnA9VLbviYJ8LW', NULL, '2018-06-09 23:12:33', '$2y$10$BAXSoEx.PzCWM8UzX2h8zevdtGi37LetXSZHucQSXscFCbK/ARz2W', NULL, 0, '2016-11-10 04:20:59', '2018-06-09 23:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `users_devices_connections`
--

CREATE TABLE `users_devices_connections` (
  `id_device` int(11) NOT NULL,
  `id_fb_user` varchar(250) NOT NULL,
  `gw_address` varchar(250) NOT NULL,
  `gw_port` varchar(10) NOT NULL,
  `gw_id` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `mac` varchar(50) NOT NULL,
  `platform` varchar(200) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_devices_connections`
--

INSERT INTO `users_devices_connections` (`id_device`, `id_fb_user`, `gw_address`, `gw_port`, `gw_id`, `ip`, `mac`, `platform`, `date`) VALUES
(1, '3412492687', '10.0.0.1', '2060', 'F4F26DF4ADA6', '10.0.0.148', '58:7f:66:e2:b0:6c', 'instagram', '2016-12-09 06:56:25'),
(2, '3412492687', '10.0.0.1', '2060', 'F4F26DF4ADA6', '10.0.0.148', '58:7f:66:e2:b0:6c', 'instagram', '2016-12-09 08:38:48'),
(3, '381358448878489', '10.0.0.1', '2060', 'F4F26DF4ADA6', '10.0.0.160', '24:df:6a:d8:45:16', 'facebook', '2016-12-09 11:23:58'),
(4, '10154208364573131', '10.0.0.3', '2060', 'F4F26DF4ADA6', '10.0.0.176', '4c:66:41:8b:bf:a0', 'facebook', '2016-12-10 10:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES
(1, 1),
(2, 4),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vat` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` blob,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `code`, `vat`, `first_name`, `last_name`, `phone`, `state`, `city`, `country`, `zip`, `address`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 1, '1112768143', NULL, 'Jhon Alexander', 'Grisales Rivera', '3165053657', 'Quindio', 'Armenia', 'Colombia', '630001', 'cra 14 ', 0xffd8ffe000104a46494600010100000100010000fffe003b43524541544f523a2067642d6a7065672076312e3020287573696e6720494a47204a50454720763930292c207175616c697479203d2039300affdb0043000302020302020303030304030304050805050404050a070706080c0a0c0c0b0a0b0b0d0e12100d0e110e0b0b1016101113141515150c0f171816141812141514ffdb00430103040405040509050509140d0b0d1414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc000110800aa00aa03012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00fd52c514945002d149f951400b45251400b4527e545002d14945002d14945002d14955ef351b4d3d775d5d416ca7bcd2041fa9a00b345416b796f7d179b6d3c57119fe389c30fcc54d400b45251400b45251400b462928a005a28e6939a005fc68ef47349cd002d14735c6fc46f8c1e0ff0084da77dafc53af5ae96194b476ecfba79bfdc8c659bf018f5a00ecab8ff88df16fc25f0a34cfb6f89f5ab7d3548cc7013ba697b7c918cb1e78ce303b915f177c5eff00828b6a3ab89b4ff00d88d16d1be4fed6bf5592e0823e5648f954e78e771fa57c87e23f1b5f789f539f52d5afae754bd9c97966bb94c9230e8ea493dba8a872ec5247d97f133fe0a27aa5ec92db781b448f4eb61902fb540259d803f36d8c1da871cf25abc56eff006bbf8b37372647f195d87240cc71c4899ce50ed55036b0e0d7840d4c93feb006c81bbb6e1f75bf11c1a05f44465bee60feec9eabfc49f81e454ea3d0f7bff86c5f8b2eb85f185d84c31ff8f78376dfe21f73ef21fcc551d47f6b4f89cd0bc973e37bf8c2e19a44944680e386f940f9587e47a5782eb3e30b2d0e02cd21b8b963f2471f05881f2c99ede87d6aff0083be0c78dbe31dbc9acddda4da7785ed98333469c952377eea33f330c1fbe7e519e33d29a5d58686bea9fb457c57f8957d2691e18d63c51aedc14258a5d4f3b041ce76e48183d1cf27a578578b9fc447579d7c452df1d5158f9a9a8b309413cf21f915f6b782bc476ff09b4a5d3fc30d069b6e30d2030233cedfde9188cb1fa9e3b60715a7e21d67c17f1fe1fec2f1c595b59ea128f2ed356b6508d139e855baaf3d8e54f714d4d27b0ad73e0ef0b7c40f12780b544d47c3fad6a3a15f46415b9d3ee9e17fcd48c8f6afbdff0065eff82a6ea7637b67e1ff008ba1751d3e42234f12dac216783b033c6a30ebeaca030f4735f0cfc64f849aefc15f19cfa06b311ced135adc85212e216fbae3f50476208ae156678ce41fc315be8c93fa54d1f57b1f1069569a9e99790dfe9f7712cd6f756d2078e5461956561c10477ab95f929ff04ddfdafee3e1cf8a2cfe1b78a6fcc9e12d66611e9d3cefc69d76c785c9e91c84e08e81886e32c4feb50a86ac02d149cd1cd20168e68a4e680171462928a005c51f9525781fedb7f1f26fd9f3e05ea5ad69ee175dbe7161a793d52470497ff80a827ea4500723fb5c7ed6177f0f74e7f0d7c3d9ad2f3c572bbc3777d23a94d302e33c1fbd2927006085c1cf3815f9b9afd9f897c43a9cfaa6bbafdb5e6a170dbe5babdbb92491dbd4b1539fcebc17c41e32d63c47a84f7ba8ea37175713b97777909c92726b1649d9b92cc4fa9353663ba3df5f48b78b22e3c4da5c2bc8e1f771f89155dd7c3f03666f17c0c739fdd44a79ff00becd7875a185eee2170c56127e6350dd98d679444774618ed27b8ed458773dba6d5bc1f170de269d863188e2edf91aa92f88fc1449075bd4d989cefe00cfaffabaf16278a68e4673d7b52b7985cf5f6f0845ad24b77a4de4ba8a46416490aef0a79041030475f4afd4ef849f193c2dfb4678152f7c33a7368be38f0c59c70dee80e46f9ed9140c464637a8fe138055be5230c09fc9cf817e217d33c4f676cd968a690db321e855c71f9360fe15efff000c3e205cfc24f8f1e1dd7ac24686386f116e114e0490b1db221f62a587ebda9becc2da5cf64fda0be1eda693147e27d1d48d3af0fefa341858dcf2180ec0f4c762315f3b5d5e4ccc768e473c9afd0ffda43c1d0785bfb7eda58c1d0b57b59efadd071e5caa332c63d3e62ae3fde3e95f9cba95c9133a9e3071f8566934da63df53d435fb1ff86a1f82977e1abc3ff15ef8623375a3dc93f3dd44061a127be7017ebe59ec6be0778aea195a37ddbd490c8dc107d2beb2f0b78aee7c17e24b1d6accfef2ddc164071e621e194fd4123f1ae2ff006b5f01d9e89f1061f1169000d1bc4f00d4e02a30ab2b7fad5fcc87c76df8ed5ac1db4259e27a2de886ed7cc73091ebc107b1afdebfd87be3a37c7af801a26a97b7027f106999d2b556272cf34606d90faef428e4fa96f4afc1516eba844627189d7eeb773ed5f7c7fc1247e2b1f0d7c5cd4fc133cf8b3f11d813146cdff2f76e0bae3eb119bebb56b4623f5be8a28a80168fc2928a005a3f1a28a002bf3d3fe0b1570c9f0f7e1ec218857d46e98afae234c7f3afd0be6bf3a3fe0b20c4783fe1a8ce3fd36f4ffe39152607e5a382cb5195241f6a9870c403c1a571823b55a405720e3bfe54841c1e39a989ebc52331239a5602064391c546db92ac39c8f4a825e17149ab01d97c2119f19e97ff005fb1ff004af65d6b9f1c598ffa6cbfcebc6fe0efcde33d2ffebed7f90af65d506ef1e58ffd775ffd08543dcb5b1fb03fb4c783478c3e10eb5e5a17bcd3a26be871d48453e62fbe632e31dce2bf1eb5fc45a95c440e763b2e7e878afdd692359a364750e8c0ab2b0c823b835f8c9fb42f8193c05f13fc43a3a2796b69772471ff00b51827613f54da7f1aa64a3cbde4dc0a93dabacf12c2be3ffd9bf54b57024d4fc27769776e7f8becee4ee51ec32e4ffb8b5c43b127393d2bbef8153c53f8de5d0af087b1d7ac67d3e656e47cc8581c7afcb81fef54bd3519f2a16d8eb20e0835e99f01bc707e17fc6bf07f8b63731a69fa9db5d4db7f8a20e04abf8a171f8d79d6b1613e8dabdf69d70a567b49de0901eccac54fea2a6b16692389b760a3e07d3fce6b624fe95d1d5d432b6548c820f0452e47ad79dfece9e2c3e39f80bf0ff5d67f326bcd0ed1e66ce732889564ff00c78357a25400bc5191451400518a3f0a4fc28016bf38ff00e0b292edf0b7c345eff6bbe3ff008e435fa39f857e6eff00c1654ffc53df0cc63fe5e2fbff0041869303f2fd1f04d0cfb87b8a646324d2371903af7ad16c03f7e0714cce073eb4b803bf5a52322801a47351ca32b4f39cfd2a393a63d6a5ec076bf06573e35d307fd3d2ff00e835ecb7c99f883a7a9ef7083ff1e15e37f0548ff84e34cdc4002e8124ff00bb5e9f3f8aa2bcf1747acc5039d1ad6e501bbfeffcdd547a71d7dc7a8ce4f72d6c7ef2f6afcc9ff828d787068ff1a22bf48f0ba9d94370ce3a16c1871f9423f3afd27d075cb1f13e8961abe9970b77a75f409716f3a7478d802a7f235f0e7fc14fb45529e0cd48021dd2e2266f642840ff00c8a6ac83f3d6e3723100e00a7f83bc412683e35d1351276ad9dec5331e9c07048fcb3515d1224208e33593773fef8808073c102a0657fda6345ff846fe3b78bed1542a4979f6a50bd312aacb9ffc7ebcf2c642448abc1c6e1f5cd7b17ed764cff1334dd4cfccdaa6896778c7d4952bff00b2d78cd89db3b601f994ff002ad63b099fb91ff04def101d77f646f0946edba4d3a6bcb363ec2e24751ff7cba8afa6ff001af897fe0929aab5efece5adda39cb5a788a7007a2b5bdbb7f3dd5f6d52017f1a38a3f0a4a005e945149400b5f9b3ff05957ff00893fc335ebfbebe3fa455fa4b5f9a7ff000596976d8fc345ff00a69787f48a9319f98f1b1248a0f5f7a6c479229d9ab5b0842a7191d294024f5e290b67148ad8e3b53014e770a8a7381c76a933cd433b640a97b01d77c2cb27d4fc431da46fe5c93b491abff74988806bbdd5a75d5acaead20b77b2ba491227b50003bb112ec217a81e53104f1c8f5ae43e078cf8db4df5fb49ff00d166bd960b38a5f8b5a33f94a646bc894b6de4fce2b192bb2d6c7ebb7ecafe17d4fc1dfb3e782749d6237835186cb7c90ca0868c3bb48a8c0f208565041e98af9fff00e0a731eff07783db382b3dd7f286bed5e2be1aff00829eea9e5e8fe0db243f3ffa54aded93081ffa0b569b224fce7bd044b8f7eb4f1e0fd56f743b8d660b2f32c621233481d436d4281c85ce485f31338f5f6388ee9cbc849cf5a684d56eb46b916eb7d26950b6e9847b8c08c76e4b63819c27e4bed5204ffb5890bac7c3d623e63e0fd3f77d7f795e27647fd281cf04118fc2bdb7f6bd75b6f1af84ec48c3d9785f4f81d7d180738fd4578958b6eba5e98c123f2ab8ec23f59ffe08ff007864f85de3cb6cf116ad0c98ff007a1c7fec95f7fd7e78ff00c11e15c7827e23b10761bfb3c1f7f2e5cff4afd0da6c05a314945201734668a4a005cd7e66ff00c165f061f86c0f406ecffe8bafd32afcc8ff0082cb365fe1c27fb3767f54a4c0fccf8f93914e2339151a7c9fe14fdc3ae7356804dbc0e78a5c73c0c526e51c734d2e00a2e029c1350cfc0fc697ce5c9eb4d95c3af1eb49bd00effe068cf8e34cff00af97ff00d155edba52eef8bda08f5d420ffd182bc53e0573e39d37febe24ff00d135edde1f1bfe32f87475cea36e3ff222d64f72fec9fb7f9afce4ff008291f8845ffc44b3d3d30d1d858c30b67b4aecf211ff007c347f9d7e8dd7e45fed63e368fc67f12f5ad42390491dc5dcb2c4deb12e2285bf18e343f8d5bd883e77b939271dce6a6d1eeafafae2df41b4bb9561bdba54f213805df6a1f7e46011df029928ea4903df15d8fecf3e1e4d6be2fe8af23836960cfa84ee47ca8b129604ff00c0b68fc6a1e833cfff006bdd5a1d4be3f788d2323c9b31059a01dbcb85148ffbeb7579369aa2499881f754e3f1e2b53c7be211e2ff001bebfae48d96d46fe7bac1ec1e42c07e00d76dfb32f8023f893f1c3c0fe1e961f3ed352d62da1b98bb340240d37fe4356ad568267eb47fc1347e145c7c34fd9aecefefe1682ffc4d76fab947186580aaa439f6289bc7b495f57e6a3b7b78ad2de38208d6186250891c6bb55540c0000e807a5494805cd267eb4b49400bc514945002f15f995ff059481fccf87136d3e5edba5cf6ce53fc6bf4d2be69fdbe3f6729ff00686f830f06931897c45a2c86f6c500c9946312463dc8008f5db8ef498cfc2c3fad3490bc75aea351f873e24d3ae64865d16f0b212098e22c3f3159f278375c5193a3de8cfadbbff85174163118f4f5a69c9381d077ad56f0aeae3ae9979f4f21bfc2a37f0e6aa9d74fba1f585bfc29680667e1c74a09c0c76abcda1ea2a79b2b81f589bfc288b43d42e2511c5637123b7f088cd203b9f80a864f1ee98073fbe99bf010135ee5e0e88cff001cfc2f128c96d56d8003febaad79d7c19f0bc7e17175afead22daa5bc4d143bce373b7de6fa01f28f5cfb57d55fb07fc249fe2ff00c6587c626173e1bf0edc8b892e1d08592e17e68a3527a9ddb58fa05e7a8c9d4bda27e8e7c69f169f077c38d5aee190477f711fd8ed0e7044d27ca187fba097fa21afc80f897a8dbdfebf7925b05fb3ab88a2c723627ca3f967f1afbbbf6d1f8a8b1896c2da5060b20f69101fc772c3f7ae3d7cb42141eccc6bf3e7531f68918918c9e0629b642ee7397803c672553d38af60b9f11691e11fd9ff00c51e2cd334387c3f3dc69f1f866cdc4c5e5bc95f2679d9881c90c480071e563b5711e0fd32df51f18e93672695fdbcd34c224d34cad12cce7850ccbc85c904e31c03c8eb4cfdb5bc4563a66b1a17c32d15e25d2fc330f997690b1d86f241b9872493b41ee720c8c3b54eec67cc5e4a139e093e86bee3ff008250fc396d7ff6867d7648f75b78734c9eec39190b34d88117ea55e53ff01af88a0b1134a113afae7a57eca7fc12c3e14b782fe035df8aeea1f2efbc577a668d98609b48731c5f9b79cdf4615a927da1da93347e5452016938ff00228a280168a4c518a005a29314639a00f88ff6ecfd967c49e22ff8af7e1b2037d0c5b755d0eda042d72a092278976fcd2738651cb0008c9073f9bb3f8a3c4d1cac925f98dd495656b588107bff000d7eff0062be7efda03f62cf037c73171a8ac03c39e299013fdad6318c4cdff4da3e049f5e1bfdac7152d1499f9029e31f102f06f6263ead6b1fff001352af8cf5e1ff002ded9bdcdb27f857a87c73fd997c69f01b53f27c43a7799a6c8c56db57b4cbdacfec1b1f2b7fb2c01fa8e6bc91a0d94ac8b3417c75af47ce2c64fac1fe069b37c40d72488a9b4d38fb985bff008aaa2011d8548815baae295906a6569b7cda9f8c3495f13dc3c9a5c9790fda003e5aac1bc07db8e1485cf38afdbd96e3c31f05fe1be99e1af02416565035a6ed3d2ddc3c5144464dd48f93b873bb712779f5e6bf156ef4f82fedcc52ae3babaf553eb5dbfc31f8f3ae7c3ed3a4f06eb57aede1bbc650b77c978507010375f2bd53b1e7a67357d3421a3d8fe3178bbfe12bd75d6dd9db4eb5cc56ed27de939cb48deec4927eb8ed5e577b6e22527692c7a015e9f3f87c5f224f10f36270191d7956079041ee2babd13e1a68be09d1a5f1bfc409534ed16c86f8ed25fbf72dfc2bb7a9cf65ea7e959f315a18de11bdd3bf673f83579f12bc43a6598d76e4b43e1b82743f689a5752039c9e10024f007ca0f2772d7c09ad6a53f88756bdd5351ba3777f7933dc4f348496924625998fb924d7abfed01f19f54f8ebe303a9deeeb4d26cd4c1a6e9c1be4b68b3f9176c02c7e83a015e4a22496621402838c915ac510cedfe087c29d4fe2dfc4af0ff84748522f359b95b7de06e10c7d6495bd910331f606bfa0ef09f8634ff05786349f0fe9508b7d334bb48aceda21fc31c6a1547b9c0eb5f147fc131ff6589be1cf84a4f899e25b330ebfaedb88b4bb7997e6b5b1383bc8ecd2e01f6503fbc457dd83e954c42f6a2931ed47e14805a3fcf5a4c518a005c518a4a280171462928ef400b8a3149450051d7740d37c4fa45d697abd8dbea5a75d218e6b5ba8c3c722fa106bf3f7f689ff0082725fe9f3dd6b9f0bd8dfd8b1323f87ee24c4f0f7c43231c38ff65886f7635fa21452b0d3b1f82fad784f53f0eea53e9faa585ce9d7d036d96daea268a543e8558022a87d85fb035fba3e35f865e13f88f6ab6fe27f0f69fada28c235dc0acf1ffb8ff797f022bcbdff0061ef82d248cfff00086edc9ced5d4aec01ff0091695995cc8fc7bf29d4e0a9fcaa3bbd323d46d9a1993721e41eea7d47bd7ec14dfb0afc1699481e139233ea9a95d7f590d64dc7fc13ebe0fcc498f4ed4edb3ff3cb50638ffbe81a2cc2e8fcc5f83dfb40eb1fb3fbcb67a8e8b6fe26d15b26d1a73b64b67c1c6c7c1c03dd71ee08e73c67c63f8f5aefc63d5d6fb5cbc636f167ecba740a52dedc1feeae793eac724fd302bf57aebfe09cff00092ee178a45d68c6e3054de211f918cd70faaffc125fe115f4c5ed75bf15e9e09c98e3bbb775fc37439fd69d96e2b9f9093dccb7adb154aa93d07535fa0dfb087fc13d2efc4b79a77c41f89da6b5a683115b8d3740ba4c497cc39596653f762ee14f2fdc6dfbdf627c1cfd81fe0f7c17d420d4ec341935ed66021a2d435f945cbc4c3a3220558d483c860991d8d7d15557241502285500003000ed4b8a4a076a402d18a4ed45002d18a4a280171451dcd276a005c5147ad02800a28edf851de800a28a0500145140ed40051451fe34001a290d1de80168a43477a005a290d1e9400b45276a3b5002d145373401ffd9, '2016-11-06 19:32:48', '2016-11-06 19:39:21'),
(2, 2, '11127681432', NULL, 'Manuela', 'Rivera', '675303127', 'BU', 'Chile', 'Antofagasta', '09400', 'Calle', 0xffd8ffe000104a46494600010100000100010000fffe003b43524541544f523a2067642d6a7065672076312e3020287573696e6720494a47204a50454720763930292c207175616c697479203d2039300affdb0043000302020302020303030304030304050805050404050a070706080c0a0c0c0b0a0b0b0d0e12100d0e110e0b0b1016101113141515150c0f171816141812141514ffdb00430103040405040509050509140d0b0d1414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc000110800aa00aa03012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00fd52c514945002d149f951400b45251400b4527e545002d149484851924003a93400ea2b9cd6be23f857c3a1bfb4bc45a5d9b0ea92dd207ffbe739fd2bcfb5dfdad3e1c68bb962d567d5641fc1636ae7f56dabfad439c63bb3a69e1abd676a706fd133d928af90bc5bff00050bd1f4e2f1e89e199afa4e8ad7372100fa850dfa35792eadff00050bf88573725ad2c741d3e2cf11fd9e490fe24bff00415c33cc30f076e6bfa6a7d76178333ac5479fd9282fef34bf0d5fe07e8bd15f0f7c3cff008288de35d45078cbc3b6d35b31c35e686ccae9ee61909ddf830fa57d81e07f1f681f123408759f0e6a70ea7a7c9c6f88e191bbaba9e5587a100d7451c4d2affc3678d99e4598650d7d6e9d93d9ad63f7afd6c743452515d27822d14945002d18a4a280168a39a4e68017f1a3bd1cd25002d25791fc64fda47c3bf094b581ff0089aebe5722c217c08b2383237f0fd304fb00735f28f8cfe3ff00c44f898d2468f7f158b9c0b1d1e091508f42572cdff0226b9aa57853d1bd4f6b0b94e23131537eec5f57fa23ed5f197c67f06f8137a6abaedbadcaff00cba5b9f3a6cfa155c91f8e2bc37c61fb6dc51f991786b43ce38173a9be3ff21a1ffd9bf0af9a6dfe1ef8e756c7d97c2f7e037f15c288bf1f9c8ad28be0078e265f36f8e99a544392d777838ffbe41ae19e32fb3b1efd2cab03435ad3527ebfa2ff003373c49fb4df8f75e76dfe21b8b3424e23b1c40147a65707f326bcf758f881aceb39fb76af7977ebf68b877fe64ff9fd772e3e14685a613fdb7f147c37a763ef2473a39fd5c7f2aa1ff08e7c2778a68a0f892daa6a08a4ac306d8c391d972a727d8135cb3c44ad7d5fde7a54eb65d49a49a5e88e3afb5d4b550f2132b1e8a1b04d65410eb3e2e98c5691edb7ce19b3b225ff00798f5fa56735cd978859e5d1ee5aea046d877a7cea7d0e2bdf7e1bf88e29b4f16d6b3be902d40125af2c324fde51d003dce3a9f7af3e9c658aaae356565d8fba966784cbb02abe554d549bde4fecfcb7f4e9dd92fc2afd9fbc28fa6c97be31ba9a3b8ddb56395bca85d48c82b83b8fd4f14be39fd9a3c37ad4cd1f83f565b691b022fb43ef81dcf45271b9727f8b9ebd2ba9d53528f2c5e3dc4f7ed5cdb6a82c2f16ead375acea73be338fcfd457b31a54211e4513e12a63b34c456fac54af272edf67ee3e6af11786b53f036b771a56b364f61a8dbb6d9227e9f507a107b1e95de7c19f8d3adfc23f1447abe8f7042b616eace463e4ddc63f85c7afa3755fa641f56f8b3656df19bc302f8ac71f886c142bc9c02476627ba93c1f4e0f63bbe55ba4bcd2e7960961f2a68d8a3239c1520e08c57995e93a1353a6fd19fa16578f8e6986786c646fd2517afcfd1f4ec7ec97c2df89fa37c5bf085aebfa2cb98a4f926b7723ccb69401ba371ea3239e84104706bafafcaafd94be3dddfc21f1d412de4ac743be2b6fa9400923667e5940fef2124fb8dc3b8afd51b79e3ba8229e1916586450e9223655948c8208ea08af7b098858885deeb73f1fe23c8e59262f923ad396b17e5d9f9afc559925149cd1cd769f262d1cd149cd002e28c5251400b8af14fda4bf693d1fe02e8f08995af358ba04c1670b00c40ee49ced1ef83f43dbdaabf237f6cbf16ddf8a3e3e78afed32168ec2edac615ce42a4476f1f8827f1a96b9b41a7cba9bdacfedb9a90ba9ee74af06683697133b48f3dca3cf2b31392c5b2b93ee6b8bd67f6d2f89d7c196df55b5d354f6b4b28b8fc5958d78adc37cdede954257c566b0d457d9349626b4b7933d1f59f8d7f11f5ed3a4bebbf196ae612db4c71de3c40f3fdd420579fea5e21d475572f7b7d7376ffde9e5673fa9aa6f752083c9f31bcbceed99e335598f7ad553847648cf9e4f7612cccdc649aa7750f9f1b292791d41e47d2ac1a8cd3123df7f612b31e37f8b7068baa299575482e2de6623ef4f0a19164fa95520fa9626be9cf8b1f0d65f84dae5b6b165107862702481b3b268cf0c8d8ec4647b751c8af05ff82755a06f8e5e169403c5dea04fa7fc7bc82bee6fdab60497c3529206003cd7cb636928375e1a34cfa2c2569732a6f668f20f19786bfe116bab455779f47d4ad92fb4bba7e4c90ba860a7fda19c1ffeb8af3fd4afe3b6908d8cc7b003ad7d5769e071f127f655f0c00146a961a5473d9cadc1568d71b73e8cab8f4ce0f6af972e923164927caf2bfde23a0fa57a73564a5dd1f4596d6fad41c1ef1767fa3322c3c5926937a2e62b762cb90d1b8f96453f79187a115c67ed1de09b99ac34df19680eefa7dd058ae82a82cad83b18fbe03237ba67f8aba8bb803e4e31f4aea7e165ec1e218b57f036a7b5edf5385dacddf9f2e4032401f8071fee1f5ae492734e1f77affc13e9a856fa8d58e297d9f8bce3d7eedd7a1f21e8925c4332ca6e9b20f20e2bf53ff61df8a6de36f866fa05e4de66a1a032c4858f2d6cf931ff00df2432fb055afcecf12fc398b599efad600da6f8874f91a39ad94e0395386c7e5d3f2af62fd86bc6b71e05f8b7a4da5ddc3791a9b36973ab9eef8f2ff1f3153f335c383ace9d757eba3febd4fb0e2bcbe9e65944dc35943df8fc95fee71bfa9fa81451457d79fcca2d1f85251400b47e345140057e337ed2d3f9df1c3c7527aeb1747ff22b57eccf35f8b9fb4436ef8cbe353ebab5d7fe8d6a6b713d8f309d33939aa12c6338cf157e6c006a8cbebd6b6b224aad18cf534d6402a56a89db8a5629113003b542cc0363152bb64e2a061f38a896c33eb1ff008271b2ff00c2e4f0e02c0b34fa81c63d2193ff00af5f6cfed55ff22ccc07f74f7f6af87ffe09c4e3fe175785be5f99a6d4867d843257dc3fb558ff008a6662727e5380071f8d7cd63bf853ff0017f91ede13f8b0f43b7f81fa71d5ff00673f0fd886f2cdd692f006f4ddb867f5af8634495a4d1920b80e97d6ac6d2e63618dae9d3f31c7fc04d7df1fb3ba797f047c1cbff4e09fccd7c6ff0017340ff8447f686f1ae8488521d553fb5ed7e5e0b11e6b63d3accbf8577d65fbb84976fd11eee41557b7af49f5d7ee767f83bfc8e16e863239ac43aa4fe1ed6ac754b5389ed25599307a9539c7e2323f1adad443a927cbc03cf26b96d72560aa4a0ebdcd79ee4d3ba3edf9232567d4dbfda2f4e5d1fe20e9be29d31b165af5a477d1c8bd37e0061ffa09ff0081570f05ccb63e30d3f5cd3e536f23627da3a091486523df22bd1bc5513f8cff00668d2ef15b75e786f546b47623256193a0fd63af24d38dfc9a416520bdbce823623a82791f97f3ae0c54392af32ebafde7d8e4559e232f5467aba7783bf65a2fc1a3f64bc37ad45e23f0f697ab407f737f6b15d260ff000ba061fceb4723d6bca7f659d65b5af813e18676ccb6d1c968c0f6f2e57451ff007c85af56afafa72e78297747f3562e8fd5b135287f2c9afb9bff00802f1464514559c814628fc293f0a005afc55f8fcfbbe2f78c9bd755baff00d1ad5fb55f857e26fc7372ff00153c5adeba9dc9ff00c88d4e3f109ec79eca7f3aa72fd6adcdd2a94a7ad74324af21355d8f5c54f2545b7d6a4a22ef51b8cb7e1531514c65c9ace5b0cfaa3fe09bff0037c64f090c0cadc6a873ebfb87afb87f6a8e3c37293d0a919af877fe09c3325b7c5ef0dcb348228a27d524777600281039249f4e2bdc7f68bfda1f55f14eb571a668fe1c59b44888469a50fe7b64655b3c2a92013b3e62060b6d3c0f93cc2b423074dbf7a4dd97a5aefd11ef6120f9d54e896afd6e7d7ff00d047f05fc1a3fea1b11fcd735f3d7edab630e83f157e1978919322e5df4f9d87fcf3575e0fd44cf5eebfb34f89ec3c55f04bc2d358b96fb2da2595c46df7a29a3015d4fe3c8f5041ef5e4ff00f0507b255f863e1ed531fbcb4d61514fa6f89cff0038c57b73b3c326bb27f91a64f2b66918ff0033947ef525fe47ce3e28b39acafee2dde321a176888f420e2bcbfc51ad79170b68f01576276b678e3d6bddfe2c003c493cb1a10970a975f2f43e6287cfeb5e11e34bbb3b29f3346cb239daae79193edfd6bc792b49ab1fa9509f3d2854e64b63d07e0b4cde20f871f15b40382c74a1a8c299cfcf16589ffc756bc77c377776f0dfd9ec120688c8187f095e735ec1fb224cb7df14351d2c8f9751d12eed88f5c85ffebd792f84f51169acdc5b4d095fb4c6f1291d890719fc715cd8ad63097aafc7fe09efe492e4c462e8deff000cbef567ff00a49fa21fb08ead26a3f086fa1997cb961d4ddbcb3fc21e189f1f996afa3ff1af93ff00e09f9a98bdf0af8a2100831cd6ae41f531b21fd6335f5857d1e11f35083f23f0fe2387b3cdb10bfbd7fbd262fe347147e1495d87ce0bd28a2928016bf12fe361cfc4ef157fd84ee7ff0046357ed9d7e257c6c3ff001747c5a3d354b91ff915a9c7713d8e0261f5aa328ebd6af4fd2a84d9e6ba188ad27269a791e94b21f5a8d9bdea4a0278eb50bb60f5ed4f2d9aaf2b60fe159cb603e93fd846c2e35df19e9fa75a0dd757169ad4718dd8dccd6d20553e809e3f1af51d7fc796be17d4fc55a76a763e5de5f6a31dcc7753c4a8eb1792d1e33e5ab7cac3046e6c6e39da725b81ff008269c9237c6bf09f3fbbdda9f4f5f264afabbf6c2f85fe14bc91f5e9f484fed5e58cd13b2076f5650704f4e71938e49e2be2732c2a954fac5fbc5af2767a79dfef47d0e167cd1f61df55f97e475bfb02e817fa67c2dd6f51b963f64d535679ed73f75d551119d7d8b2b2ff00c02b4ff6f1b54b8f8093bc9d21d46de407d0e1d7ff0066af58f83b1243f093c148882351a2d9e140c01fb84af2ff00db98237ecfbaa2b9c03776dd7fdfafa454d53c2727689865adff0069d17fdf5f9d8f9bfe235c9dba2c8e183cda3d8c84139c836e9cff003af15f18e9e2f636b96b7b89a28ce0c8b1168d5802dc9c704019f615ee7f15952da4d161ddcc5a2d8c6ca474c4095e39af7892ff0049b396cecf5896c6de6f315e38860b79b1f96ebbbd1d40041eb8af25f2b9fbcd9fa85295558583a518b7a6fb5aecd9fd8fae235fda07418d7399a2b98cff00dfa63fd2b81d21ece0f889711483004f2c7196e9bb2c057a3fec6f6cb27ed03a13afcc6286e9dbd8794c3fa8af35d2a0b7d43e21dcc8f27988b3cb3a28ee4124572e23f850f57fa1f47955de6189bff243f391f6bffc13f5ff00d13c5e83b43607ff004a07f4afaf2be40ff827dfcf67e2f9318061d3c647affa41feb5f5f57d0e0bfdde3fd753f1be27ff0091bd7f55f92168c52515dc7cb0b9a334525002e6bf117e361ff8ba5e2e23fe82b75ffa35abf6eabf10fe347fc94ff161f5d52ebff46b5547713d8e166e9555d01e6ac4ecbea2abfde3c57408a92a006aab9c55eb8c28e6a84845414373c5412f53f4a971cfad433753cf6ace5b01f547fc133c1ff85d7e153fc3ff00133fc3f72ffe35f6b7ed71204d0d89e8011fcebe29ff008266861f1b7c3258614a6a5b7af27ca7cd7d9dfb5e31fec527b0073cf5af98c7ff000a5fe23dcc27f1a3e87bf7c265d9f0afc1abe9a3598ffc8095e39fb794be67c16b3b107125f6b56d6ea3b93b646ffd96bd97e158c7c2ff00080f4d1ecfff0044257827ed917cba978cfe16e81bc18d3509756b942320242148247718f33f2af66ae942de4bf41e531e6cca0fb36fee527fe478d7c61911fc5da8c71b2ecb62b6aa3d02285fe95e4daaf886fb4db2b8b0b796cbecf2f98ecb340b239df1189b86e3ee9e0e32a79045769e27bc9350beb9ba7c6fb990ca7279e4e6bcbfc45a54b737cb77e6a2a213945e7771d2bc3e76a6da763f518e1a0f0f0a538735adf8753d2ff63bb7163f1335ad5df0134ed0aea72dd97eeff406bc3bc2fa7bdceb735cbc9e5adac724a4af563b4d7b7fc1e56f0c7c22f8b1e20230cfa72e9b0b03c86932a7ff00462fe55e3ff0bb42baf10788a0b340512fe78ac028392ed2c8a807eb58626f6a705fd5d9ef64b68d5c6e25e8972aff00c062dbfccfd01fd82fc1d73a0fc1c6d6af2368a6d72e3ce895860fd9e35d8848f76121fa106be94cd57d3b4fb6d274fb6b1b3852dad2da358618625dab1a28c2a81d80000ab15f534a9aa50505d0fc0b30c5cb1f8aa98a92b73b6fd3b2f92b0b9a4cfd69692b53805e28a4a280178afc4cf8d16fe5fc4ef16861c8d56e863fedab57ed957e49fed9bf0c750f877f1a75e96481c69bab5c3dfd9cf8f95d643b9941f556247e14d3b307b1f37dcae327159d24a54f1c568de6e563d71595302493d2a8435ee491d6aabb924f34f9062a26a430de477a8e46c82734138a8a46c29a4d81f577fc133252ff001bfc3299e153523818ef0bd7d91fb60c8068ce982720fd2be2ff00f82675da43f1b3c36ee0205b6d4242deaa51d413f8f15f577ed7fe2bb2bdb736b0ca1dba1c77f4af97c7c97238df5e63dfc1c5fb54fc8fab7e177fc933f08ffd822d3ff44a57c83f1d75e3e28fda03c4d7b1c9bedf42d3e2d0edb1d3ce7cbcbf880d229fc2beb05d6a0f863f076df51d4fe48f45d1a26951b825a38546cfa960147b9af81ac5ef4db5c5c5fbf99a95e5ccba85eb9ef7129dcc0fd06063b1cd7ab89972c231feb63d6e1ec3f3d5ab886b45a2f9bbbfc12fbca1ab4926d60154e010326b99d6ad6c534db716f0b8bb393712337cade800f61deb7f52db79324531db0b37ef194fcc077c0ace4f0f2f883c4565a3696b288aea758a3f31b73aa93cb1c7a0c9fc2bcb8a6ef6eba1f7952518b4e574a377e5f3ee6b78f6f5bc13fb32685a5aab4777e24d49efe50bd5a14071fce3fcaa2fd8cbc373f89be31786629223f66b7ba6d49b8e82142ca7fefe6c1f8d73ff00b5378ba1d43e21a787ec0674fd06da3d3a1441f287032f8fc485ff0080d7d2bff04f4f0612be21f14cd16cf2a28f4a81b1fc4712cc3ff44d425edb1b18ada3fa7fc13aead4fecde19ab889692ab77f39bb2fba27da1da93347e5457d49f818b49c7f91451400b452628c5002d72fe3ff0086be1ef899a41d3bc41a6dbea100e504d187da7d464574f8a31cd26949598d369dd1f9a7f167e1b7c2ff0001f8b6f342f13f80353d1ae90968af34dbc7686e2227e5913736307d31c1c83c8af3abbf84bf0535727ecbe25d7f46739c2dddb89147e49fd6bf523e21fc31f0e7c52d10e97e23d352fadc7cd1c9f76585bfbc8e3953fa1ee0d7c4df19ff00625f11f8352e751f09bc9e25d2007636e17fd32207fd91c4807aaf3fecd79f3a5561ac26ec7d161a581c4a51a91e597e0ffcbd19f3c5d7ecb7e16d498ff637c51d26463f762bd87c93edfc47f9563df7ec61e32d864d2f54d03598ff0084dadf609ffbe940fd6a6b8b5686e1d2552ac8e4b2baf20aae306a9f90d01062f91c2a2878c9539ea791ed592a9596d2bfaa3ba794d17b5ce6357fd973e2768e0b4be16b89d077b49639b3f823135c86a9f063c7315a5c3cde1cd434e86304c973796ed1ac63b9e465be8335ecf67e2ff1169a4359ebda9c0a0b36c5bb72028e3a138ab37ff14fc65a8593d9deeb325dc4540649e242727a0ce39a72af5eda25f89ceb278b9692390f801e2a7f8697b73ab5bc6d68df64fb05aac846e48b21998ffb4cc33f89ed5f56fecbfe11bafda1fe23b6adab399742d0a48ee6e564c913c99263887b12a4b7b0c77af92752d343dd249297619e769c03ea302bf4b7e117c73f067857e0543268567696f716a8120d26d40469666048de475c60ee73ce1727938af230d4e188c43a951fc3d0fa8cd3289e5580a7cb173955d1497c2b6f2d5bf3b2567d8a7fb6278e46a9269de04b29731878eff550a7aa8398213f561bc8f4453debe7abddd0465776e3d589ee7b9ad4bd37ba86a17baaea52b5cea57f2b4f3cedc6e66ea71d80180076000acbbc81a6429b980fe75e855e6a92723a7014a9e0e8468ae9bf9bebfd76473d3dbdb4e259a72ed38c7922260147aeef5fa574de01b9b6f0268baf78f7504056c2dde2b18db9f3253f2f1f562abf42de95976be1d3a9ea29676cab087f9a473922351f79cff9ea40ae33e3e7c41491ac3c1fa647e5e9ba67cd3aa721e5e8149ee54139ff00699ab19cbd8c39feef53ba85096655e3868ded2779794574f9edf33cca0d525d7f5d7bdb92d3cf23b4d34a47de624927f135fae1fb3afc3f6f869f087c3fa44f1f97a83c3f6bbd046184f2fceca7dd7213fe022bf3ff00f638f8487e267c50d3cdcdbeed274b2350be2c32ac14feee33fef3e38eea1fd2bf5207d2af2aa3a4ab3eba2fd4e5e3ecc62e54b2ca4f487bd2f5da2be4aefee17b51498f6a3f0af7cfc845a3fcf5a4c518a005c518a4a280171462928ef400b8a3149450078cfc6efd96bc2bf18a09ef1625d13c46ca76ea76a83f787fe9aa701c7bf0defdabe04f8a5f063c51f08b576b5f10e9ed1c05d9a0bf8417b79c0181b5f1d7fd93823b8afd61aa1ae683a7789b4a9f4dd5ac60d46c275db2db5cc61d1c7b83584e9296ab467af84cc6a61fdc97bd1fcbd0fc6a9ac1d06d5e7858ff00a9fd2abb48430675c8c990e7d070b5fa15e3cfd82bc2fae5c4973e19d5eebc3aec59becd327daa00c47f0e5838fc58d7976a9ff04f5f15a86fb1788345b95f9401379b112a3b708ddeb9fd949743dc598e1e7aa95bd4f917e568bca9177a81ff008fb7391fcff3ae8fe1b78ce2f87fe268e5d4527bbd165cc732dbb61b1ea01e09070707d3823ad7aa7883f62cf8a9a106923d0a3d4d572dbec2ea37cb13d9490dc0f6af37d7fe1278afc32af1eb1e19d574f807c9beeece4440072cdb88c7e35e757c2cb9bdad3d248faecb33da3ecde0f14f9a94ba5f55e6bb35b9ef9a46a167e3140fa1cad7e181658f85936faed27f3c1354f57d3350b052f3591b68b76d324c475f603249f6af05f027c46f127c1ed4deef48903dacc3e649a30c31fcd4fd3f5e95d0f8d3f69ff15f8badd225486d7636f578e3dce1bd413c67f0c8a98e2e9a8daaa6a4ba1d53c8b1b2ac9e0daa945ed2bebf35dcf45f8a9e35d37e1278463d36ca41378af50412cc180dd6e3f8770ed8ea14fb7be7e64d0b4abdf12eb50c30452dede5d4c1238d0177964638000ea492696df4cd63c65ae47124375a96a77b261624569679dcf60392c4d7e8b7ec8ffb240f8551c5e2af15c31c9e29743f66b3043ae9ea460924706520e091c28240ce49ae551a99854496915fd7de7d054af84e0fc04a7524a75e7b2eadfe915fd6acf4ff00d9b3e0a43f04fe1dc1a7caa8fae5e9173a94cb839931c460f7541c0f53b8ff00157ac629281dabea6108d38a847647f3ee271357195a788acef293bb168c5276a2ace6168c5251400b8a28ee693b5002e28a3d68140051476fc28ef400514502800a28a076a002931c52d1fe3401cc7883e187843c54b20d5fc31a4ea2d27de7b8b38d9cff00c0b19fd6bcb352fd877e106a37a6e57c3b359e7ef436d7d32c67f02c71f862bde4d1deb29d2a753e38a7f23bf0f9862f09a61eaca3e8dafd4e33e1efc18f057c2b84af85fc3b67a548cbb5ae550bcee3d0cac4b91ed9c57694868ef5718a8ab45591cb56b54af3752ac9ca4fab6dbfbd8b4521a3d2a8c85a293b51da80168a29b9a00fffd9, '2016-11-06 19:42:56', '2016-11-06 19:44:37');
INSERT INTO `user_profile` (`id`, `user_id`, `code`, `vat`, `first_name`, `last_name`, `phone`, `state`, `city`, `country`, `zip`, `address`, `avatar`, `created_at`, `updated_at`) VALUES
(3, 3, '11127681438', NULL, 'Jhon Alexander', 'Rivera', '675303127', 'BU', 'Acapulco', 'Mexico', '09800', 'Calle', 0x89504e470d0a1a0a0000000d49484452000000aa000000aa08060000003d76d4820000200049444154789ced7d7b985d4771e7afcebd775e1a8d46233fe5f7035b08633cf203fc0007dbe40181248b2ec18b175812c8e7fdb2f11782bf2c9be57376215f42cc42806fb3210e061cc00609964780b018e2d8982cc69e6b1c231bdb91852dbf644996a579deb9f7d6fe714e7757d7e93ef7dc999134b255d29d734e7775757575755575f7791033e3301c86e50ed583cdc00b021a1b138020073d11b9fcf14d9d83c0d50b0ae8b0458d0337ea09184711f1e9004e65c6c9008e23d031001fc5a031028f30304c4403605481549e0c8080168366093cc9a0bd04ec067827404f82f004c0db006c65d0230076d061858ec2614535d0a857c1380be0f398702e80b301ac07304a2018d56330f2d756310b8e9461439417f98c3d44d802e03e66dc43a0bb19b89f366c6a1d38212c5f78f12a6aa3de07600398af60c2a5002e20600480d51ea344108ab5704843833422108aca808c1254dd7b19b80b8c7f26a25b019ec0f8e6e622193924e145a5a83c511f23c2ebc1fc46105d01f01810571607011b690bb13dcdd1c981c1a70c9fc3e44d1a0012bc30633708b712f04d80be8df14dbb17288a430e5ef08aca13f51122fe4d665c09e03210fa8833bd304a652f32a5332edd289f21965d43baf14cb99852a562819bb974a77f198eac52e8bb3f1432cb6bfac7b3e929ed26337e40849b99e96bb461d3dea596dd728217a4a2f2c4c68440af61e0dd44fc26660c0379071e72e83985e0bcb12b0b6415dba72f2b62715e480bcad00bda449864a66f10e10666be9d366c7ec14dca5e508aca8dfa2831de0ef0d500d6e5ac9c02cfa05a1ba9d35501a1b8deb552363d9982c8ce051201cbaa79d4e5b5728b7a1e04e87f03b8091b36ed8934fd90831786a236ea2732e31a80df0560348412b39e21a49c8246f243164e970bad02f402410b5a405fc01e066e04e8e3b461d3633d56bbece0d056d4c6c653017a3f18573130006b11c9b754108b49449031aa97af94415b401f94adb4859dbab8c52bbf1c81444c9b9695b16bbe0eb9b86596b7ca0003a059103ecfe00fd3f8e6474a165c7670682a6aa3be16c007187827c003215f6995abc88c8a3c395b17b15f1e3516e486c28c2c9f904eb6b4f9f3420c76384479de6d1afc72ba49924d3399cbea9a05e8b3ccfc41dab0f9c94091650d8796a236eac300ae65e6f712306cac956fb98a22d2908dcc3b52df82b267c1e482bf5f67be9c5fb7543069f965841ca2616aef6e4f658ceddb60e765004c12e1a300aec7f8a6c908a965078784a2f2443d01f15b08743d838f2f1de88574576842cea54b0b1822a5428598ee7b16545deb899a9c88716c2cc1af9342ed8f2c6944872d613b83ae05f0e54361eb3639d80c7485467d1d11be0bc6cd0c1cef34243b120517d953bb43b99e9211a424637c6b7aa08c34d9120ca19c64ac1ad9f88040f646949c72d8697a4adbd049ad1e39dab2a022e2871ee49a4600677cb2a0c576d247764dd667888e07f3cd047c178dfa3acdf27283e56b5127365641f43e66fe004043792bc770eecc3f4f21626282d7548865eaf377f5351ff9741f42f5950b45c26184beeb404c1845b8104ad16d63609a081f64e68fd086cdcbf2de8265a9a83c515f4f84cf30f305b94c0288458c58b4505a0801079fd14edd71d6c9dead7b7a55c0fd85c80bd7e2c78c319648c408b1ae21e90dc4ac291611a4b4ec5a48908b148fee62e03fd2f8a62d456c1e0c585e8adad89830e83d605c0f70b69ba42d651ec22a90b75a46bd652987416a27a9c8423afba52d97e629c45bde13846db8ab434bc0bfff8ae06bad3f41d3528953cbe43049c4d702f4b7cbe93edae5a3a8131bc740f429306f2c72d87ebafcdb3bf8aa4c2062bb97ef2b89ef68cbcc65ba612c86e76e41452cf8e9a50622da0ce6dfc386cdcbe2c69765a1a8dca89f43c026804f075237252d0513672e99ede4c52dae17744b68b3bd08ace646c2021b0ae8c8305c7d9eb8080228537f33edb7cb0962792030ebf79b6470a54c62f52a5999a849ca56e113e11100758c6fbab7a86507020efaac9f1b1bdf0ae63b98f974e4a6bf9c0a50a63183d8e5fbf3721f88f3fb425ebebeb2f587188577279339dafa59d3cbe3f9f4d8e995a12beb16fa2fe980c96b3381d2768ab6faf5b23d42944bebe4ecbf5fb1c1c9fae40e34ea6f0dcae400c2c1b3a88d7ac28ceb88f0dfb0df078cb682cb1018f06e3e5d7ae28b21d061c68788f0df0f56dc7a70147562e300801b00ba2a377bb5e7ec7c9d064fefc4acdf5b3917f474472da4dfe4ddd11e6d3100345f7a62647d77a07d364df16ebc89bcc5aa887f8f76843f4f08ec2e4da6e1834cbb6dfee7417837c637cd9690d892c28157d4467d84195f21c215cbd9c01d70384464c18c5b01bcf940dfa87d6015b5513f8ac1df22d07907aed2c3b0d4c0cc7783e80d34be69c781aaf3c04da61af5b50cfebe53d2d000299acd8470cbe271e03c44a7d741cbea18abb7575aba6c887f9d1f6a57515b43f577a3915e13e13c80bf8f898d6b0b082e291c188bdaa8af65c6f788b07eff5776180e1430630b885f47e3fbffb6c1fd6f5127ea4731f377cb29e9415a81380c0b82ac4fbf8b46fda8fd5dd7fe55d4467d84c1df22a2b36c9ab4e039ef4671ef168298f7ebc5e3e5f2d94f8b7943af6e5946ac51c66876e5c1d02962ba0b9d1c0f223f289f088f5c2c0f029dc5ccdf4263e3c802b82d0dfbcff54f6c1c60e09b447445cf65cbcc807b9d251f22b3ea2587c02a59f1d2d6c26833f3ad00de481b36ef97a5abfd63511bf584811b16a4a4403961f5aa742f462505e2db6565707ba04d44578070032636ee179dda5faeff3a025d159e50f7e0d2ba4dc88bf26393e65ef063f5ea72dd26ff45b474d9a2c9bc8753528e65db1ce3a70cdd0c88e92a105d5782ab9e61c95d3f3736be95405f003829beaf07f05b1bc2d5db56babca091735b217f172bafea61a88d77cd63595e4379211037a57834555be4c3ff393c5d47e02e1986d8e90bf0177a6d4b88d75c792fafc3cc6fa30d9b6f89347641b0b48adaa89f03e00e207d33c96178d1c22403afa625bceb6ae95c7fa33e066013b8849296752f070a3877b21f6877c9efd58d2f4770fc0d13b0098d8d634b457a6914b5b13101f029804ff76f7a904701fe7d6b22a3e8bc6c5019a9334827bb261fc779996ef516f112a7f13486717df5b5f868e597b08b86d2c49c2c027c535140bc109e634170010f453824f1703a804fa1515f121d5b228b4aef0178637a1e1354e8a7f35190aee984ca75abbb1bddac35c10114ab2bc64b76249fc67318c047aa97e37e3a163f4dd6e29bbc0eed4e37da1a626dee95e750fbbbf555114e4ee93782f93d9146f4048b57d489fa7a30ae0713ec0fe608d85b7f659e4d43244fa56bdaba0c23808778fdb1735d6721ef01dca2b24c9847059facbe06cf26c3e96820c2cae63eec9d6ca1d389b539d0b66ef5858eb1b686daa4cb97f945ca30e87a34ea8bde3a5f9ca24e6cac82f019640fe28158e8a71a855607d90d3cd2790897d13aaccb10c5f14c65c48e27c94b8c6eacae186fc1b2867e7a0ffd2dc938b6d211d9ddf88c57cc3e8a4b66b6a0dde9e0f9c9163a1d0eb7d9f06ecfbbd467f2745863cae7421e2d97489b88233c05eaccce89300ce03398a82feac3268b5354a2f701e6916606903e1661df7ec070e710e930e9eada14f2f0399f0f9d2ee9091a5e9ee427c09f2e17fc15e441d3678ffecf9263f0fdca9900119808c7cfefc25bf7de810aa76fa09eef00f736d760370603341c6d96bc7a3252ed80e0c9cb139a156ab396a5a46f41b5d7e345d14ae95f00c2fb422a541616be3cd5a8af03e31e004372d47acb810042cb79361d30faed8e3a2d46830af02403dde8023eed327569fa5dca3691e04faabf8e1db412046080e7f087bbbf81b1f63e00408712dcb4ea32fcacef040ca085ebe6bf8363795fbc9d21e885ef185eac9cc60979bf18383ad34c3897c6373dd843690b0bb2a83c514f00fc2f260c31c9819f6aa96ffb381c6aa5d87e1e325a1adf9eb34b6349975d7dba7ed2e71c4867bf2e9916e31301bec07e1b33d97c2f59871dc9b075876f9afc09d6b42701104084af0fbf12f7f79f0026c20cd570ffec2ab43a1d5bded5c9a2ae82f669b985f048f01e6d9f969592099cee0ae7e19fbbbe1922e0930b5d055860dcc06f01d365e699f73489e13fcb1b187632cf8edaac452681904a263694e533525ef9ac47cdb34a26cfe0993a2171e1e83a827e9aad3e6b9f6c8bf7bc93e23bcb9aa11abe5379a90ddf4e9edf81f3671f06287ddaf3defe53f1a3c17596ed235bcfe3ccb9ed787eb68555c35554abb25fb32fab185e8c46c0556b19ce59c8881c0d6356a6a4e4a6fad35bba33fdc8fe07e06c9d4a66c01500bf0540cfbb56bd6b77a33e4c44d7a7a344bc940b948d228aa4034c322f3b3265e9ba6ce4dce2eb3c91cf88e4b1e24d5901c9ab3d929fc7085c07eae4f4777b721af66120eb5fc6af4fdd9dcd6708fb68105f5df92adbfe159d59fccef3dfc350a70966c6f3932db45a1d514faa1c39f98664104a0fe1647c86f1248e4a27c5030b4b2be5a2640ca6ebb3d787f604bd2b2af3b50c1c6f6372fd43c1b53e4797f4a23a4265433829d3feb959254000b7a82dddf8331e810033d3ff417206ccb3f5a7cf3f8593e69f81591df9eef038a6a93fb54800deb2f78738a2bd1766363d4335fc63fb346c498ece6812a2b37eefc7f05639200c5ba15cbbd16651bf90a9cda77c59f8e74c389e99af458fd09ba236ea6b19782f0c9fdafc780a6140a70937a395c47b1459982f99275dabcc734356d52bdd798896769dac70d4b9ac5715b1a14f36bbde4a6bf04cb2d2a25d32fd80e56477328c9f0cbcc4921c9fdb8a97351fb3bc3651c50da3bf8ccdc317e1faeae5f8191f65e98621207bd126dd3c2b5fdd5e4f341a0742c6225cf2aa16f8a16b0640f45e4cd47b7adeaa3745657c0084e134f6300a235a661b91fd724b3f0a27b8c4e3f0c8d2957902c713023b1e38c6936c0b3bc3e0d122bf3ea873b3ac915376c16746f8eee4c43487082b7816eb9adb2deb3f1c5a8f1625602254d1c6eb27efc9f2d2f0e4eb2b5f896dd5a3b2090f61fbdc00e6e63b4a5e5236beecc2034f9511b210177979b1c2f1fa54ca9e95b1b52358c99887017c003d40f9c954a37e3a03efb42bfab29f34e4461885f1ba40711135aa21dc4e8e37912fe5ad2bb0d71448136458e070c0c26565fe353916e6fd592f9b7b1c15b44104b450c1c4c0a9366fc3ec56acee4c5a920fd58ec58f07ce8099ac9e38ff2c5e3ebb0d93680343407f2d011109fe09587916b0ea5ca07f2d800498df05ecbb0f78fe2700cfe7790cb52f06212fa2f3e478b074292f2f97fd4e6ad4afc7f8a6ad2538e865d6cf7f0cc2407e662d1a113ad76ff690e7049f46112d5d562abf5e6d30164fcecaa37402d7411c412f0682e729aae1491ab54ef78ce613a9d121e0d1dad1984a06c0601003af9cf93938b33a4c84ef0c9f6b8dd07067166f7ffe07e8430b0c6072da292b8880fee38013af06569c91e767cd65c0fc4ee0f1bf03f64ef86df3e4c1ae9fa0f3f26d8b2a6e4886a1f41406007e3f80770773159473fde9779cae72661ecaf5a81f85aee1ae3d372add8c2a6b02785d4f6ee7439b49c1a3dd8190e502ee50d32695e6d11772903c8b728fd158a6ebe9a7794e9a7fd676d8c37d6bb3e6115677a670426ba76def63d523f178f508dbfc5f999ac0aace94e595c1989c6ea761c0e069c0191f0a2ba981da11c0a97f0cacb9dce7df0b21c8978b969539c6fa22d72f45fd059bce8cab30513f31cebc83528acaccd78068c0ab2788e8f1e15b343931d265cc0050b2cac75bb10a23c9da2a7869ece76917ee957184485b598beb5befa7c87da87a88e730da99b293df5fd48eb4f44e6b3e8524b3ac04e0a703a758f22b3b33387fe61198ef03c889f454730038e58f80ca8ab00c3c20e0f8df45a7ff34d738e9d572f14d000afb21805b8ec80003d79421d95d511bf55180dee5e847d736d4b9e64be1c9ce45e83c94474aa148d1ef82ab68cb8f49587ed55a8add1ecae8e5e25a8beb67ecc28a2c97b1a6bd0fe0749fbe03c2b395115bdf71ad5da998086010fead768c65e5ace663a8722b9b60b118b78cc1137e03e83b42331307aaa0b3f62acccdeb011a904d282d4f30904e42a672e04aba507dc6efc2443df8b54509dd1535fdb6e8a8ab5bb9cadccdbc1c6b831f0298677342faae47bc574e8d7e59461f432f1c15a387c579be7dc8b7cdc3099d3bd84bfdb6d84867c6966d23c16432683959d3de678bb6906057c53d1e7f72f399544c441e794282fe635e8b5ea1baea6598eeac49c30647ccb54df69f4e93204332afdd81cdd51c5de87e1e65f0dbbbf15eaca88d7ac2e907708b5db76c80ad5fbb525d5e8cec6068a0f243a0270045bc85d2bcf340fba2e5299e9fc11c6af6bcdfceba094daaa16d2c3a80159d397066b9e7a8863972f3dbb1ce2438b344cc940d6e42d23f86a4bf076b2aa03a72868b7173ed822fd358fbb46d0ad189950bc3d5ddee0128cc64e0970064df200ab856fdb337e202f6ae2ccfbd4a5cc4e978ee27143238061dc4cc78e83cd48e103f2a3fe8f6832e016c77690815364ac1b614673889f04c1d4ad2dcac688d5bf02683d98faa2b03ed2907496d04cce984ac39df2950b432f443b2536543fd98eb435ac7ccaf29e4bb0b1bbf638987dcb274fdd2456777af7b2ec46eff49772f68db9f721926cd1e056d4dc373cf02c7e35ff24e8a2e023cea3044f1e8b93657aeca6d5b53932a36bb820e98dcc7d39a544dbd0f037ddc02a1935a4f005349367f1593360281dbd3ba31a5815b5396e43ea3acb9f116ea17959fbb36fd4b011a4236207833d22c9f880a97a9a28aca13f551667e93e7826da64c30a344b84eb94322f354f862e944dd7fa06c2c24c8b9a2000f825d6bd7bc3ac9983aff3ac78bc967789328c1e71037b324c674d26fb36bdc427f673ef538ccd89b0cc2acb5f6710bc39d59db88a72baba18199d199db056eeec9e59581d6be7fb3cf843118fba6db986b76f27d032df7d0b968bfdc75d4cb515a665e834c117e134fc4df5f15555422bc09f2f9fce00b19e033946324639e02e9b963a05cb03e59674eebf32c84ca8790a2eb8888b731d4a40c56217d051331b0c7de8b0a2460bb5405029ea98ec2641277705c6b97a5f1f3fee3d213133e99a888db98dbf1c3824686a13df928dad38f67169b2cdb7eccaafb22d0bec22dd81814c91300304c44bf192b1d77fd8c2bfdb822e64343319a3aea87c88231a8f6af9abeae333b46f90ae06a9cdcc36d0a8f42ed89f1eae71dc5fb6c973f571946cb6c0232636d6bb7353ebfa81d05a905eb9adbedf923b563b1b3ba0aceec58c631f3d857c1f3fb226d0e01636aeb4dd9dc41d063b6316baaac0439d70843813c58a585fa3ed8a7c8742e0c61456dd4c7187c59d86285ac4bd0a7ab630cafc8bf84ae4374437c15e196e11dca726bfc50fdeefa784e5d33215d767aaaeadcf8c9f3cfd86eda563b0ab3499fcd7bc5ec36f4218d6f3b20fce38a71840658bbb91bfb1ef828d06946daedc3f4b62f617e77c34f94fa6495b58db0ac3c06826deede9fa17c49952fcb5e6492838845e5d703e80be729283bf07a29a7f3bbe12e39947165c5b096f76210f3b64bb6d68eb679eb9a4fd8f3262ab8bfff247b3ddc99c1f9330f5b2e7eda7f0aee1938cde61b534c6034774de0f99f5e87cecc53f196b4a731f5d0df6066db2d087e73d01b971c5eba2a82d2fd584aa67d005e1fca082b2ad31bcb50ed5a7f91b1ebc67741fc772840820ecee8ecb01db5a5ff049bb7a6bd0f27b69eb57d78e7e04bdd721680d74ddd8b959cc6b80c60f3ca8bf090895733302299dfb305cffde40f30f9c0c7bc50a03dbd1dd35b6fc2733ffe4f9879e23bd9e44d3169ae85b2f5acacbdf4633908ea5e5e511bf53e10ae48f796b365946c39c5fcf435219056f02b43cf6cc5c97cbbb411a31be13746375aff12fc408473f8095be7b6dad178beb2c2aede5c38f3735beff6ea1afcacef44bbcab3926751df7b677a0f00115a54c5ad43afc868c36b0b11019d79cc3d731b3acde76cdadc8e3b30f3d857c0cd3d193f10e5ddcfced13c39c28b59bd3e2890fb52fc9871051af59c370f59d40d00d238c1cc291442ceda536fdeb90c3dc0cd656c0411a8c71bb00a3f679465cc8f7291d8428d390138b7f3382ad97a6a8792ec8efe94897366b76275db3c124df887e1f33147359bbfbef938de347997fd9ce631ed3d8272acc6781ac9c68b9f7fab8b0f2e660d6358834ceebaac5c63408431666cd0e97945655c112326639ca229ce5280ab2b5e27432aa55fbb8f17fe0275a88b64ad0b098d65f9119ec32b3a2e1efdd1e03a34510100d4d0c1af4eba7b44775557e21bc31778def892990770f59eefe0aae7ff09bfb1efc70be066f13039ddc66c33555623c7f41c0b922902f91a9308b93795e71495c197c688913742c371f25229ab6f01fc3a4373347d6f81c14b7720c9c3ef65fed7abb27a3c11f0bacecfedeac1beca107e34b8cee68fcf6dc519734fd8923f1e3803770ebe54d0629c3aff0cce99db862a0eca274801386535728c0de2d8fcb7bc2c33fa8c4b758eafa88d7a95882e28a415d2440a9eee17f02ca59a1f84068e744bb29c845e782e3b100dcd759d1d3883dd07eebebfe215d89bdd3d9500a8efbb13c39d19cbecd7872fc04f064e5f0067fb17a4653560ad6a2fd6a9042e011770c37f5795afa88cb3008c143a758ad7564eac0b8d5ef23c11853018f95d34e3faad6b112562cb0be1258b701b637ca73c6e6cdf6b7b7326e9c7d7865f694bacee4ce16dcfdf862ab7520e29c1b786cf4327e8580f2e38cb9a829c3b38289229ca29096104cc67c924edfacf0b532bbeee6d25a98ce32dce63712dbb333da7025cf7d20493c25e9d0b73587179a4e92fe9ecc4459d476dea7dfd27e3aeec51690078c9fcd3b872ef1df62eabd5ed49786fa15946609435dee7ee4516e67a214044de84ca33af0c3e371fedf9209f03935db91462d5344234f58cdec6a2e23c841fbb8ed5b318c8d549c095ed096c498ec11e0c0144f8daca57e1e8d61e9cdc7a1600f08ab96d187d6e124fd48ec0cb67b72d43157530399d8600037d9542bca05c4b0a9b99cf27e04673ad2dead9c19be20504ed0c07e2c3c004cb1e4d6cc97ebaa611bb0fc6e671a06cacf248b655fcdedc422c3288a6adc41c7eb7f52f4890dea9344f557c76f4723c5d714f619cd4da898b661eb48bfd8b85a5091cc25464cc4a4a167ad2db333329eed932c92a2a37ea0908eb3d6de936b50ba4918961c9448cce119839a35d0f255d9cfd84a8a6a6bcb975d582953b2fa6665bd6c6b31edf8e763c4ed73c6adc708c0c002feb3c9dc6ab191f93c9203e35fa2b782e29f380dec2a0408245521310377f5659a3b21035c52c5cac4ac27a4cb8bbfeed09318e226034552db18ac9f2aa089c62ea2525a74e2c1444d3ed3691928a42c8294e61b998c34f8fb98112c48bd1ee9e6fad3e317eadfd002e6f3f64b1f65586f080d85e2d8ef87b9f0dc4267fe523f0e27afcd50065107a36a3ee47c02808f663c0cef5134e378130399363b7ebba836a3a538ecd6ce30f6ec2a3836e3d8da7405ee8a8cb86caf9d72479e07c7eb9a3291faac3fde49a3011f0b6cedd786deb618019039d399cd67c4a950f9da7d70b9da4e8094f790af97ed4e094d56f37eb5bfe720c15c82d7de2d7acd37993a9535302a905226f019281d8b54993c11ea5168f3266896472ba7f1d22e33722445bb54d1b5794c0cdce1991bafd26f820698b6b2fb6a6d0d1975f02e0eded9fe0d5b35b509999c68a5231a991a97fed1f8b4b3b1e53fceea500d38f5d1a989f6029d979323521827947ad92a739a754277f08788aca271b05f51a408a82bece5540de515d7ada1153949c618d545be8bf62b8813ccd87d5298a7464373e72472dbff4704a6d1253ad36669b1454015924331f2a9d82e912726338fba303a96059863358251aea296b4cc60532097070b23913b37eb2f79169c351044591a28e58baa56b3aa18116aca7975028543e92aee5b7c86af2f489b062b08281be245346f92add549d288be5c972e0f2e444d5ce119430fcd726cb56c4e2489126de6bc0e29fee25991edac19294e551a7e7c1e9a45c9e5a1b783d5031b0b3e2b9f71170deaa33e0df17a9f00d9e6533a3c92a3fe89163a3419ecb7a55becd623f2d1455485a92b75c766cf48a74825456a38212d5a9a5e4c2ce25e0afa9480bc80adf4e74d9a41b1a9229175312bbf224fee9212ce37d40ec601919c9be357ae1c9202fa2ece41873ea5c3ff311369694042cff598398b2911c7054a499cae22a1bb39a128e4bf3b61c4b2f5310192a587c4b9b52297aefa577cae1c571b9774c05f2e0eab7e153aefdf68f5f2e3238f400cc5db21f16ad184c63bbd96607dee42b4f3177151abcb6328247cf1ca47aca5ab43dd657f950813c4c53debc75d0780baf20cb60c5289d533e3740d8cefa9da2128d4905f1e84a76bc6051485af0ed0b917c6108fa7992e497278d2481b218526430f271afb430b9fc1c32149be1f829165f4563ad029488b2661c670359aa9a6f59432aea5efea10c89b5a6ec3d51e00c0fe0cd5048d6c5eae84acb3aa4daea09966780240d3d917138f6f929e7fa19235ed3595847659472c28e8408d2a1188faf54dc1377e829dcb24fe202b05bbbb96c91afd36479fd28fa5280578da8475a5637685d180064ee96c853b50c5110cc5cb8582233ee9f82cb7bc88de6e8f2a3fd64a4ab938c179396062e44d1e0ed60856b09f63dd234fb9c7f2a91898d098387d3116c22a32c0067b69a6a46b38d976c20c61e75f3082e6565888d4b955f6e568ac529aebc619a0010397af2d97b73cd26e064081cd9723791b0f9acbf2b62f871eda2cc9ac9325a8a7e1e0b89a73f23036b6dc8d0ce64c9992c33cd35d6cc282b6775b047137613c67df329fdfe54aea34d19791678c729c3d5234bf8b4e5a40990ef8f755aa1cfd36b7b238b9095ec3f62ce3cbf942900f0b0792755d54890c00356984044fd451c679935b8f25c3907e5b9993967e5e5b5bd235fd0f79d0f7b37c6b0e0c5e593a5138a502430c9b542596fc6079bb2cea7e497ae6c7065f922326d315c29f9089ea5fb22b8306066ae6d2d248bd8c577bed2c2f93cb19d0430d2d8d056e8a8b0fc4e944b774f466474843099858c19e96b8a3c0949b9f9312ba0bcbc99c378511c8300fb4edeaa1500500d31eb9f0b46e1bb0c8de5469a8c5f8c49c9475a212adae5f963c8e1c696aefd85eaf4907a2eca14c2b931a978f24e76a3f4612ef3e9da91ba819777b02c79f7062a54ccda764a9e294c587e4e81d24ce70953a50969b351402907e1014c79726d619be70f1846eab000002000494441542ecb8f91b362cec4acfd7d1565b80c41192b031073a8aa216f2a7613b06c67c908332394ee34194efcf1e76f41153fb8108b57749e54567f3224d490453d260cb06638d23999b2a632cabb11d7e1949b84c9e1e12d73b0b29cc2e4b3c78bb0be0ccbb3a3e1acba55d6b9b6a83c67cbddb9dc50711a15dfd43072f4c78b9541ca6aa60981919676b95132c11f0b0401a15b04a5ee393919a3969e99f7ccb8be73f9422eb655ae5182dba0bdb07d124b774aef7915cee8d9c1023700a4db818b987d97e3d61cb5450e82d111b29ec50d311ba290ed4853b7f3294e392d9ba26e33f990cb7e3a1cf0cfa52f4adb2257033cd71a6a8eb0a8b6160e142059c6c942383d8bc4b902825bf6927d3cb1552eebb796d57edd85b349a39153bede6a4a4fc473f0dd605ad00d375f09cc7ebeb80fcad02281c5fe48b76ecef43f898ed2a3d68d111bf37926c03b83a8dbe15a1985fc25e5cb69146f992687c3de7970c7d1e34fca0e22353b2337f0588427ded295b7de082bf3f4d4b3899ed191c0812679be4f8d028963cb98304438338b2514d0dd5bc0365b7eddc58611845c8f9a7add6d7e404bd49d35c64d5aac8a0a66481c4930af634392adf74cb27896c9b3e2ac24c55ee71a2b213702cc6cd829a56f55cdb8214881fa3ce72c82c061852fdba7f714fc73b6a3c4f221dbaaab8bb80013b30ef425d652b99f23a8b7503d3c31e865c3e4cd5f56f20147e8b52f2be7d5660d09599ee44a80e93c539f79c9056b86327c025aa63deec669c6acb568d29cb3e8585797e53cbc36c85e5e8aab944ad0f02c9e90886fd55cbaee4bd22842d276e588fd10c1b22aced2019075bda78b24f25c73cc4fba79d6ed96cd67e4da6064210782c125ce2b9edc6e7506c2ada37a31aacd77410a64196bb59cf5b2fd6be867345dbac063415bf00c2f4fd063976e3a4a2a6bba3c25e407cc9af6a48a3abea9036052193bcb946db81db54ad81e43025f5f700037a43d206f00780a2d1acb9c2febb99f9056da41a23424600e59e0da0955c4e22977e3d10881f30a1110d64ad3f02c6b8c1fc8a651d66ef9656963e38d18dc7dc2feeaaf918333855274ee9cb2993eb93476f5cafa21e882f5fb59bdbcc94c37e56d7eb4978163fcb53f53485c8b984645439ef205af851fb6d780e77a9c805224137a683d12dc0941b0256a705cf46cd602c9236258b2584241424a2479b5014e4697156721afeee9b3769d264b083837d833c86fb70a1a99597261463a22e42096f592d47661f11c1bce6ae576651dd7c6ada4565d34d4d077039d043f6c95557e3e3383bde6c4c5a8c4bbdd2877da61aea565317740f9ae5db829cf7269c5d2520db6d597453674735fee318d963303919fd64b4ae8089a39edda240eb3b8161d99e6b9090f996f521925019cbc547b6d1db6435912b50df076a684f2e9ed565407900c1c69abe934f7c41c8a9f4e2a5d5a72c96284863eda90cbd223b8757363d1dd2e588a9b1a111706b011c16e4355dc3d453b3893827149644d0eab73c3187b0a619925338ad2614399ab496323ab3ed2eca5d4d8b7e4e972858b9faca56757d81fdca62385b04c5c69f54c546a3b21c3cf784de54b6e790c42896d85d9f29a7179b2f1b6764f52b0f1039bb6383c7f77291063088d7035506659099513ae44521db2e8ade7b778c58210c8b4d508ef278d8e44f22e8dbd908392fc416a77b772e3962daef7ad57c0be62463e8af2b4bcff302dee84676342491c6e594b1e650b4c5ba515f24cac98717ba1048b19bee32037b990dcc2f2c87092f3f37d89cb5ca3b8d9000874866983749c6c2c2991ea14e1323d428637c185b4c0e62f0348aac0d09940520b58ae0c2a83183af5d5a055e765a418f3cfdd87f6f476b821ae4b12f25952c17499ac17024a16f59400e40688c50b0e4661147c657dda94938fa23c61a899816fd648bd8d1b5babb8e5d6d647b6b029178ad3ac62935350b2330b06b2e7acb253636f7c22d949aee3a4cf8df59131efde10f0f6e104ba5340b70c94b6d3ac155b4baf8da9272587eb0f544b2e275f9cfa7ed0c8d9f016f1c5b9bd96a2694d61eae14f89669b0a3ce2a280124cf0b39ca6cdb290f307e6c46b925505e73dd5edc30a445d9cc6aced81e469f320b9bc1f759b19c9ceed09b3a204ef620c597b7edc5bbbcb9e6e6401b7530069b101217c56ca5838845da57287ca15d4e680bc7aed3eb73424baacf281d69bc96d50c7badd7933dba4cec6085978648d35ed03569c91779de2a8a13db70bfbeeff305a53db959cf237ad9baa72e2240614f9b0e58c681c99a52a114f0bd2619aa944bcde6260b6c9bfc82b2ab0d54d8e44636ca3848bf7042c7652440112650cae1b527e2343063bb67453382805d3b9b0452947ca5e36d4ccc0d4bac6a67dc69a293ec2ba6b8fdee0d3d533f27293d099039efd3670e41b004ae2cb50dc417be669cc3d7b2766b77f0b9df949cf0b183f21fbc9b3c0563e6a0bd3c497c141afc16d796b465d9dc6023bbecc75e88e5b069024d5ade6da2a2a331ef1b6d445271babef4dae8597d0e9ca8a6756da5e392b04859b95cdad590aba368974d314aea0edc94e9a2f93affc56666c5d03044fd2e8e55cbd68bb672523781c2a2b797ff28b98f9c59731d38c3516e0ce3cc0f33626764a1733075e69181beb8c05b92cabe6328491cb70be8974cd947b9362a07b39808a5ec5804815bfda37fc88c9b38a4a841dccd843c0a8b666b9704f590952e9ba7cce05081c69952842c37a23cf1a220c1c392f91ef65052cafd26fa7d481f668c25a46d2c386da67ce076b2d70bb8d99b98e70f9da26e6af8c7a59653083cdb3ad0633f4b87596ae8c16ab1a7cecbc63815706b938d55dfa8f8c8392bd40e74983e71e4519dfd421c2165991f911c17eba5e3391dbab56e5a5b377e3879ce5a17ce37c11e68c7479e85248df8442599a971ea061dbe31b9f1c4ee8daa249cbdb85cfa1810a06fbe542b894a8a325d4217fcc162659a6cb1107ddf3a69c4bb3f473fcba32ce734a3af0ee059179ece17afc6d1979e567ec6e867e91ef7d3e032636339aea5c83ddfd6582bdcdcfde875a7c74b4cd16a04b37a3cbd0728b54e4a54b1af97321bf20c8ba61ebe1acaddeab6872e792bea89b35afbe0c75fb58acf5e667daba5d2165f5a9f7020b1af41222724de517c95356d4e727cf11813c5dacfab9744fde07996b2968391ec81dd9b9111238a1b8848492380ae2ce7f6f55212b470454c78095eb81be63d375c6fd0c515d3f083004a0d2eca0138d7bba40a785f6cc53987fee5fd169ee56ab07ca272f09f8347558e23444e31240c93d9292eee9bb7d2795675ca7ba552661fa8d00c8dd58ecbf67c8046d24caa7993654d0415dffd1c0dab701ab2e00a8f805b2cb01cc4a42d9ebb2d0afcae6d654cbd0e5369a3bff1fa6feed7368cf3c6312c3ed88e68441062772ad204f8723e7e975a5da77b74cf15c3f33ee477623403ebc4e95cbdfa185b70c82ecda8e10865de23079691c28a80b6574712c595d261030720e70e65f02a3175a25d52eb00c84ca744b931f09eb4633a434f25a42af4aaa3f585644d73e2e1de39b2ae83bf2628c9ef731f4adc97dd2c9a7d713977133d7958e372f4826ab7d2bee97d99ea2d2864d2d10dde52630261e4dffda7b09b33c8923c78e49215956e458832a83708b6fee0bc8a8ac381d38f55aa0329435c20d08735d566943ca51264d2b5d0c77b1ca18036325b545d66d8f0dbafc97f6b2bcea0a8c9cf57ed446ce4caf4dfa22f9f5a751ddc1cebf1ccf770d9f7f83f735e2c007d1f89fa1948fbd2b1953ca54c9669e75bd609c5b021367e9c23383931a70d2ef03d49753504727bfff5f16ca28786837a8abc5ea82d78b37f09e29cadd4f507e6084e4444440d287e1975e03f2ee27f0a737a1c94e09ce4be76b0d02d13f6bec9ca212d1adc5bb10919534120732a34a6d8d91ecec2c5df027af89008c5e0cf4af4df316619d16122614d10875789132c62c7459bef4200d299dbe1f40e2c594db9c57868e43ff519798dad2bce0ea0505ce8bf2b4ba875634f2d749d2f7032d83fc97fb982700771f600cb488ed6e1260355337072c14985d398fa6c16100ab2feac64698b72e715c116e2cbf284488294e68c22315b4cce00be1e841d06d12556640384565f593211a2b1c78d7697f732e0d968aa69dff11d19e5affd05d9abfdcfa0e6dd8dce4c6c65b09784bd07c0b850c363f90173b8f81d5f7c153166c0d7b75af4b45ab171abdd22d138ff652bf84eacad3caf193b3483a80f3673640b93e777c263f18bee0c6a64e0f7d5d1a04fa660fb47b8b9ccbb870b312501be98679189608a8b62a9716ec29e30dd20b9db9e0faed543c49be1eca8fad987f1b4013405f6ed4d8299a4ef3aa0bb1003bddb7e9b1e5933c150d4f3df32cbef74f7762d7eee70ab0f63f10114e38ee58fcf2659760e5f0fefb0c8f84a956073f7a760edba75b18ebafe0a223fa71e440786d99b76f05df7f37d09c059d740670d679a04aa0db03c20eca3feb364f0d0abab22c64c59b95daf0b783f9b1b88627eadf21c2af2eaefa45c239b720b4b8ffe0435bf1a71ffe246667e7d09bb462b85a0665e8f983f2e8a38ec05f5cf73eac1eddbf5e60db640b1ffad91eec9ced583607aa846bce1cc18547f40bf6189defdc02febf5f01b803db9e53ce44f29eff0a1a5ae9b786dbd875dbbff32b0b89a057a52c23463b814e6e5df34bffe77521b4e81e24116e060b455d7c9896636c41c59971e3e7376376662eeb2833bca9bb60d94a44e5933b071cbd22fee54e1b01cfecd889cd5fff47bcfb1d6f0100ccb45bf8c4e313b87f6a97b7e579dcc030ae3961038eeb1f0600dcb9e709fcfdd35bb0af356f71fa920ade70c42978f3912ff1e2c65687f191079ec7ce39f1e42901b36dc6c77fbe172f191ec3119965e52df780bfbb091e22003cfa73f0576f04def607f998b46cdfc8715d66dc871c2d026954b939566530464d89f3d74098cc4fdd17098ba4c5cc7878eb2fc22b20ddea0bb5a55b7e8c5ea0fe87fe6d9b3dffeeee6db86dcf76ec9c9fc1eed6acfdfdebe44e7cf6c99f0100e63b1dfcd5e313f8c5ec5e0fe7e9e6146e7cf27e3c3eb7cfabfac1bdf3d83e235f96e660b6c5b873e79cbdeefc58acf028c5e1891f02cd39e4a04cc849ea172b17fa15024d57fb577c35961b57d40d9bf702f84637f20703a2cb3ae42fa0409dc7764c42f9a1f2fa5ca7753aced2ed6cce44b1f7b4d2ef4ab5b983c9f63c84c917588cddf3fef7a7f6cc77821481d4c03f279ff1df235618b592b4dac0d45e74851e26c9457229539628f9c6aa577d6e4f0c27aea829dc50b2ae030ad56a35aa5d7690cb347669b9795f243f543e3717cc167d4d7eade622a9930747023d95fac81306d2f8b0962438ba6f28bf12c2408d2a363c3070ec40256a9808c0da41f12ac7638e8f6002181804568dc5f32551b3b06d7913c230f7965ab9f89d11e2553fa58cec1120aa543f5dc44ae17d72cc7c3b811e04615da0c6bc21f0aee5f450158c7e69ac3b1011ce79f93adcddb8dfaf532ef07a05ba9cc7ca87dc5a617960c3d9ebedf965ab4fc4de56130f4cf97b2747f50de1df1f938ab34209fef4940bf1d5671fc64cdb7d9ba942842bc64ec2917d435ed95386ab387bb486fbf6ccc307c69abe0a2e3ed24da6e8d5bf06befb76a0dd8206baf40de199bf9e6b9af8dd0be9d53aa9b7d30517f7ea57ca98e78ce47cc0cc052879a8d63f92db8df278eeba3b3251ff03103e5e8c1402adc9a1f32ee5cff95270d6ffecceddb8ee2f3e81279eda6147b25c6a4ecf4b2c9589d2a4d2f2f9b0541d86ab75fcecf5f82f7ff81ef4f7f59568dbc2614fb3838f3ef8bca7acc70d56f0be978ee094e19a87cb3ffd17746ef91b603a8b75894017fd32e8cdbf0baaf872656e63d73f65b3fe7c24e2d2a5125b24f2cbc1c7f37a5cd1660049a5fa476b2efdca478bda5d4251378e82f02840a3e5d62b425342cd614c51555e64790a00e69a4ddcd3b81fcfeeda5d6a0f617f41922438e984b578f9fa339024dd22a9a50166c6a3532d3c31ddc6585f8233476aa8266199f2ec34b0f501f0dc2ce8c4d381b1a3823b506e794a3e7217d2ccd0b9ff7eddee0600e29af6d606569db2eac2cf156edb7757540068d4ff27c0efedcd5f6b3fa2d335ba097444832216f5307487a25b13c3f8a9a29aa82df444b201f934aec9f756f8d8e1a5b4e3f52695ca27d65cfad56bbaf157ca0430e3e360cc7a01b46188559ac5911caaa37cc0cb9e53ae3cb767cab0771802d0eb7d04dc9a492736906113db4febe45e4629d309e2067a17d6baf70298b7caa47d6d1ea0244233a90e7eac0c7fa51495366c7a0c449fb79cd80c566b64662899fc4848200396dc345be4cf6e2fc3de615802684f3d06d8f53d355364379fd72fff95658ccd720f7598d895328515669701a2cae7575ffc856d65f8eb21a8e23f0768d6d74c8affd4139a61bc2e349ef71e9b390c0158aaa7089a3b7377d6659198534ccfe567475dbd679b043ecbc4f4d04caa031f2ecb5f79451ddfbc158ccf6a2faecfbd28c0e4993827140984e46cd2767d1fdc9a2ccde261581874e6f761f6a95b339bc25697ec57feac5dc9dcbcf0a4648fee657ac6b5a76539c3675b8e894154b969f5255f7ca82c8f3d3d6fccc41f24d0550c0ce7826cd6a70cf59531972902707b199a73b52781ed9f019ff4fbbdb069a1db13990b7d1274b1b416526f5199c53edd3af5f0df81e7f766e5459d5ee7c0ceb0bc5835cd309cb86bf35238926b54d90c8d92e9a436f8c15e78ec693d85c6373f09e0a3393e35bff2c2042c16dff901bbb111517800c073b7034f45ef55f0ab8f4c2096eac6e7223abd3c45b090c151b64ce8d9ae225ea6b77e1e73cfdc06198fcab9b28b59a506ebf00dee5c2cf8a746951d0da3af49e5af565ffc85c74a35c850ef59688dfa3080071838deb546f12cddbd1d9681fc10d81d0c1fb7337c2e70fcbbbcd77f87a0dbb34dbdb477292daea6271fda5bca3aca4267f6594c3d7c039abbee720613c5f62798270c6671c71a7c7ab23630f2d25517de54e26603516e41a3bbb1f1ad04bad9f7d7c6972bcd358aea45e1c6353817e1e201c07f93567ace0066e713ccafd880daea7350193c0687d7587b046ea33df334e677df8be6aebb00ce6fafa620dd75515aac2c10b6600055fafec39ad76cfa7cafac2fec9d384c5f06e17740b8c2679e055f5a8933a6e573d2f66e10dd7286b3c8190a80815a0798bc0b53cffe8b1ac1f6ed9e00fc5704191cf67091a5191aa694c4f6078b1b2eb069ca75083e5c3b48fc85a2a6f98287a19f0576b2238f77f33262b672b4bc6631a2c18dbde7d4d52ecffcf79cf8edd0130e886b79f45b0aaaded63774c417730c948005595400e0c6c675c4b807842165fc9c3f509d9d0fc023d7d1519bbac9d966075333ed10822d6e28c6915cc7eaf7761683f104ae64b7ba6c47c5b022597677494e6a2271723eabbb1beeca8308dda42d8a931599393c9aad5407ce5dfdea5bb69467cac18237a7697cf38320fa2003f65383ee177b3096c491fd74e6009ef8890861a02fb1df59f237b9322b92156051d03ebeec05f712dfd008540c9507b6d72499cbe8b3ad2f4d23412b4f1f96becf83a9570c5ec8bafcf214c80b6e008a6b96fcc05d7b5566f9247862d146d926296fcb8e89c993ea9f2d54498185ba7e1846f82344f45bcc7c419a20335582f76e78560655754676f2dc64823b1e1c4033124a35e73b68b7399c79184a43b5c2b8e0b419ac1a6cc3da7fa39472792a4df18ee66f28d5022577d706c6fe72313c2ed8f55b68d4d783f1630686c308115f119b620af8c39b46f1e88e6a1a2f79eb72106e9145b441d22bdb099bf9028b493361b299cb01593979638cf5a58649f29bc20c365b83a642efb3dcc670b3d7cefc734a2901f30239b6134d576dda0c19a30a013265dfc732c88e4dd784ec84b350256babfb500ae1c4354d5cf75b3b5ca59637710df1d11015affa774fc99c643aa90dbe72ec929bbd979ef50a8bbf2f6d7cd316105f6bada4013b6112b321d279916376be735fe6de454f5b7765ce8da038c3336e09eee870591807ca94d8f3e6de5e75eacac8ba30b6f56754339f97e6ebafd2292f61fb9efd1f9c7bd40e263d27cb9fc963f6f93431a46d9f95913992272b3b889c50b17bb29a8b2842bfb43809f9c2d561f0c4963925d53f5eac92028b74fd0ee86f897039031bd34b931cc21596c7f717f097bb80ab5fb70f5ffad110e662ab28876149a0bfca78fd2bf6052694f96bd743e4af2e0a6f678a1155bed637bcf6af9782c7c5bb7e03131bc700fa3103a7ab1ae01e53865346aba8c62d014e639d16375b8c7d532d14b3c9a24cb9996e2cf2900b2f65709d2d348e5bbf71bb54941301dd1eff3a94c311dc3ccfe5d27b91a9c425a2add5fe95e78f5ef4f75ddf635606964e5101a0513f871977009cc5abbabb00db18abc0a1ee24a1d44259a528a3f25322d7e4151b85e572f45d9c18ad5f37b75b7a2c3f34f68a74c6cb33f16b848f10ff45b85236a17212850042329d54072f1d7bf5cd4b76fbdbd23e3b31bee95e22bc1b449da017918f739a96b970460880bd727d35c2c88a7452452a3b275d161f6133d59093b7ae4ebfd2cbd2cf29b13b957de77df11a10770e05e8598573b1a2c511e5bc703ecbf4c377f9f98efc4bc93c197878e477438066aebd829e9a42e4f84e65431daaf4fdde522a29b0d48a0a00e39b6e01e343393f22d6d7b20477e0eef9b56aaaac4e32d9cfea3ed9bcf4c317e22b25e29cf58f21262c191eb972de0dc2d9d1d04f8b64e7f62b27ee8b27e61a391ae93965f598afce984908db3ae08e2cdb6df83062338a4f560e9cc3313f4a79f66e2c715f847132157591e029eb1357af4b271028a9fde59ad77cb9e72dd26eb05f3e2b4284ff0ea653197c5514a930e220848252a3ac7b7518a0094af7a65d9db096c62284bc396793837419ccb1635789ac3764f5f4b78e12d9f3146988ce9e67b67ac1d0ab597e7911ee9b6bfd36229f0db6478210692fc1b3e0379fc71e0d4aaa5fae0d8efe49178a0b82a58d512534ea03ccf826c0572c35e9f916a7caba04bcebbe92d745fd58a68f5f4c4049e5b65affea37acbaf0c6e9fd427f7fde62c613f511107f1fc0792ed1d48c7c4fc77a3f906e955507f945932749925452a8bcced704726631c07708ca8abca87c57fe4ae0854669a89e2efc525299a8f4adba7cf5459f8dbe9267b1b05f1f44a70d9bf602f40600f75b376c20e84a228402e9260cd03124695fa8eb35c9362dd358136b128416bbd8cba68714bfabfbd41a60e269d838d52493a947b4c94d89cc65ca1fd9bac926e7cb99168478806b9717effb6d721fcd5064015052d952a98dbc617f2a29b09f2daa85898d6b19f43d00ee9d37d1e1ae3521a419ce5cccb73af930a017bfac623eafba98d5d7ec75b33c8b8813824bcc86644c5c25bd524fbc06bc152595872ad5fecb575f72cb7e7f5cf8c0bcda63c3e62709fc3a10df9ff7c1ded075d7be3181b7762368d46a496a59e59a5049a52000a4bf44eccf7df205629ea1a8ce45d8020ed527e7364501b63c8d295f20bca0d085eeb6a4b2a5521d38204a0a1c2845053265a5cb0188f535f6cd85b744251488e19b0f4f29d98501fa59dd2e90923675ba5e637bada8e53eaebb50e8a56c085707d8263514326473fe1c99801fcfc05b520bd5439589a43672f9ea4b6e3e602f5e3830ae5f4263e30833be42443daf06848205930ea4b7fded9b8adf18102bbfbfe040d77740802ab755fa467e6b7fc7a41a0e9c453530be792f81dec8e0f8a230472e393c3732e3bfaf9a60e58aa2a561864f61b17e3b36234c7ffef764cb1804cddb628c4837bef52f56468666d52f57fb57eff78953080ebca202c0864db3c4780780ff01a093cba7f025053c182bc4fe5a8295436165d55f8e2ba706453631e296553ddde984692eced775e33bc467ac3de850d2f717b5c1b12b472ffcf47e5927ed0607def52be0898d6f0570031179375e875e59189ef73b7c19a5cd353bd8377de8dc1fb87cc3049aa64affefad79cd97967c5bb4272e0eb6a2020037eae710b009e0ec164111c897e93d73973cbcd2986b763039dd5aa4657a6143b18893ad4975f0b7c75efdc583fe12b083e3fa15d0f8a67b017e25039bf3eb2a71700b0464d1655cd8df976078a81a5b61c9d3e992b63fa0647478e081aa5fabf4af3a7f392829b04c14150030be7937817e1bcc570388be194d76ac1fcd790facd8f3be3ec27016b352a4eba391d9a2a1fb82ab8b0ef3bc85168e1656771cf275d03425fdffb96fe5896f5e7dd16797e4a6e7a58065e1fa73d0a8af07f0190017e8acc07a76704349e71d6a31eb4101aa4c24d5c1778c5df285453fe3b4d4b07c2caa84f14d5bc0b818c0fb19f06699668e2a1755221b32de757f5f7c35e030d02c257d1fa80cadbd70392a29b05c2daa006ed4d701f824017683c05849ada831ab2a612eb829b0d03977cc7e17d18b0da9b2f52db4aca66376f9aab72795feabc75efdc505bf1ce240c0f2b4a802687cd38304fc0ac05782b11d10b703987d79867b1b095437aa30b1bf56b429e0e2c8fcbb5e5c4ebc5cd1b94cc9dff9c181baca6d36c4a6639ce355bd3beb49aa0cbca36fc531af5dee4a0a1c021655024fd48789f85a06bd97a22fbc280761cb0a84ad619a16b793fa9337313abd429c9790f52e57234d5352fd44d237f2e7ab2fbcb1a7573f1e4c38a414d5c2447d2d081f00e39d200c2c840433d06cc5ef0d28e3c497124a2f1997c40b401349eda6a4bae28363177faea797e82e07383415d540a37e2ac0ef07e82a70a6b0dda6ffd939235d7e6dcea7f7b33a2403bab049cb47c3fa7536cec2c977fdc5f6d5cacabf1b0dc3474e004da2ea1793eac09fafbee40ba5df99bfdce0d056540313f51319b886c0ef02c5be306880b3bfee2da3cd7956ca1a73b7e1fcf017ea0298d9fbaa166739cbda549a4452bd31a9aef8d8d8c59fdb56a2c0b2861786a21a68d44799f9ed205c4da0ec43c3a1452c08db933e196a9ec1f260917e3f5a3c90e15e3e569cd6b532aa3c4254f954d23772e3ea0b3fbd6c16ec170b2f2c4535d0a827005e03e0dd00de0466f71517f3563b712796b951da3cd602848300e7689d05956f612e9af648e8b670a57142518c8f47d3a0ca3f50a5ffd395fed11f8c5ef0d72fb89d8d17a6a20ae0898d2344f49b00ae64e6cb88d067155606abcab216ad5886e6dd0859c440f990b46393b6d084cef1452d50723b51f50b49ffeaafad7ed5a75e30d633042f7845f5a0511f03f07a30dec8842b081803f24ae24fb0421826d5bd17dfe516d942698d4dbe2ee3e39a819459ce3da0ca0f28a97e33a98dfcc3ea0b6fd8d9a5c52f18787129aa8446bd8f810d04be82199712e80206468c55cc2b6b1e740c1921488f0000010049444154e959beec82c404ca7e10c26c4c64a70607597947379906d15da0e4764afabf571d3cf2ae55e7fd5573a9447028c18b57511570a35e25e6f5005dc0e073417476b3d959bf6fba359a22c06a6150418b160684e134b836e23040c924405b00ba8fa8720f5507efaef4afb96fd5791f7d512aa686c38a5a0413f5646f73e5daf9f9b933d0699ecadc3901949c086e1d0524c780db23a0ca18c0c3e04e15e0c4c6950c10510794b4009a04b77783aa7b81ced3a0ca0e70673ba8f20b4a6a5b93bed147c0ededab5ff537f9c7720e0380c38aba68d8dbf893a4dddc8df6ec2ea033e7bff63ee94765600d2a7d631819ffb3c34ab80838aca887e19080ff0f8c4fb874cddf57bf0000000049454e44ae426082, '2016-11-10 04:20:59', '2016-11-10 22:40:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisings`
--
ALTER TABLE `advertisings`
  ADD PRIMARY KEY (`id_advertising`);

--
-- Indexes for table `client_devices`
--
ALTER TABLE `client_devices`
  ADD PRIMARY KEY (`id_device`),
  ADD UNIQUE KEY `mac` (`mac`),
  ADD KEY `client_devices_id_user_foreign` (`id_user`);

--
-- Indexes for table `facebook_consumers`
--
ALTER TABLE `facebook_consumers`
  ADD PRIMARY KEY (`id_consumer`);

--
-- Indexes for table `google_consumers`
--
ALTER TABLE `google_consumers`
  ADD PRIMARY KEY (`id_consumer`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_name_unique` (`name`);

--
-- Indexes for table `instagram_consumers`
--
ALTER TABLE `instagram_consumers`
  ADD PRIMARY KEY (`id_consumer`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portals`
--
ALTER TABLE `portals`
  ADD PRIMARY KEY (`id_portal`);

--
-- Indexes for table `portals_users_instagram`
--
ALTER TABLE `portals_users_instagram`
  ADD PRIMARY KEY (`id_ig_user`);

--
-- Indexes for table `portals_users_twitter`
--
ALTER TABLE `portals_users_twitter`
  ADD PRIMARY KEY (`id_tw_user`);

--
-- Indexes for table `profile_field`
--
ALTER TABLE `profile_field`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profile_field_profile_id_profile_field_type_id_unique` (`profile_id`,`profile_field_type_id`),
  ADD KEY `profile_field_profile_field_type_id_foreign` (`profile_field_type_id`);

--
-- Indexes for table `profile_field_type`
--
ALTER TABLE `profile_field_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`token`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `twitter_consumers`
--
ALTER TABLE `twitter_consumers`
  ADD PRIMARY KEY (`id_consumer`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_activation_code_index` (`activation_code`),
  ADD KEY `users_reset_password_code_index` (`reset_password_code`);

--
-- Indexes for table `users_devices_connections`
--
ALTER TABLE `users_devices_connections`
  ADD PRIMARY KEY (`id_device`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_profile_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisings`
--
ALTER TABLE `advertisings`
  MODIFY `id_advertising` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `client_devices`
--
ALTER TABLE `client_devices`
  MODIFY `id_device` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `facebook_consumers`
--
ALTER TABLE `facebook_consumers`
  MODIFY `id_consumer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `google_consumers`
--
ALTER TABLE `google_consumers`
  MODIFY `id_consumer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `instagram_consumers`
--
ALTER TABLE `instagram_consumers`
  MODIFY `id_consumer` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `portals`
--
ALTER TABLE `portals`
  MODIFY `id_portal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `portals_users_twitter`
--
ALTER TABLE `portals_users_twitter`
  MODIFY `id_tw_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile_field`
--
ALTER TABLE `profile_field`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile_field_type`
--
ALTER TABLE `profile_field_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `twitter_consumers`
--
ALTER TABLE `twitter_consumers`
  MODIFY `id_consumer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_devices_connections`
--
ALTER TABLE `users_devices_connections`
  MODIFY `id_device` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_devices`
--
ALTER TABLE `client_devices`
  ADD CONSTRAINT `client_devices_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile_field`
--
ALTER TABLE `profile_field`
  ADD CONSTRAINT `profile_field_profile_field_type_id_foreign` FOREIGN KEY (`profile_field_type_id`) REFERENCES `profile_field_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profile_field_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `user_profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
