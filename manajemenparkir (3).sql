-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2025 at 03:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemenparkir`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id_log`, `id_user`, `username`, `action`, `ip_address`, `timestamp`) VALUES
(1, 4, 'test', 'User login', '::1', '2025-03-09 20:09:17'),
(2, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-09 20:14:56'),
(3, 4, 'test', 'User melihat CCTV', '::1', '2025-03-09 20:15:02'),
(4, 4, 'test', 'Melihat halaman log aktivitas', '::1', '2025-03-09 20:23:07'),
(5, 4, 'test', 'Melihat halaman log aktivitas', '::1', '2025-03-09 20:23:08'),
(6, 4, 'test', 'User melihat CCTV', '::1', '2025-03-09 20:24:01'),
(7, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-09 20:24:17'),
(8, 4, 'test', 'User melihat CCTV', '::1', '2025-03-09 20:24:27'),
(9, 4, 'test', 'Melihat halaman log aktivitas', '::1', '2025-03-09 20:24:29'),
(10, 4, 'test', 'User melihat Logs', '::1', '2025-03-09 20:46:22'),
(11, 4, 'test', 'User melihat Logs', '::1', '2025-03-09 20:56:49'),
(12, 4, 'test', 'User melihat Logs', '::1', '2025-03-09 20:57:37'),
(13, 4, 'test', 'User logout', '::1', '2025-03-09 20:57:58'),
(14, 3, 'tes', 'User login', '::1', '2025-03-09 20:58:12'),
(15, 3, 'tes', 'User mengakses dashboard', '::1', '2025-03-09 20:58:14'),
(16, 3, 'tes', 'User melihat Logs', '::1', '2025-03-09 20:58:54'),
(17, 3, 'tes', 'User melihat Logs', '::1', '2025-03-09 20:59:25'),
(18, 3, 'tes', 'User mengakses dashboard', '::1', '2025-03-09 20:59:33'),
(19, 3, 'tes', 'User melihat Logs', '::1', '2025-03-09 20:59:51'),
(20, 3, 'tes', 'User logout', '::1', '2025-03-09 21:09:22'),
(21, 4, 'test', 'User login', '::1', '2025-03-10 11:41:38'),
(22, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-10 11:41:39'),
(23, 4, 'test', 'User mengakses table User', '::1', '2025-03-10 11:41:54'),
(24, 4, 'test', 'User mengakses table User', '::1', '2025-03-10 11:42:08'),
(25, 4, 'test', 'User mengakses table User', '::1', '2025-03-10 11:52:07'),
(26, 4, 'test', 'User mengakses table User', '::1', '2025-03-10 11:52:12'),
(27, 4, 'test', 'User mengakses table User', '::1', '2025-03-10 11:52:44'),
(28, 4, 'test', 'User mengakses table User', '::1', '2025-03-10 11:52:49'),
(29, 4, 'test', 'User mengakses table User', '::1', '2025-03-10 12:06:34'),
(30, 4, 'test', 'User mengakses table User', '::1', '2025-03-10 12:06:39'),
(31, 4, 'test', 'User login', '::1', '2025-03-10 21:43:03'),
(32, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-10 21:43:06'),
(33, 4, 'test', 'User login', '::1', '2025-03-11 19:47:14'),
(34, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-11 19:47:17'),
(35, 4, 'test', 'User logout', '::1', '2025-03-11 19:48:31'),
(36, 25, NULL, 'User terdaftar dengan nama: test0', '::1', '2025-03-11 20:54:40'),
(37, 25, 'test0', 'User login', '::1', '2025-03-11 20:54:58'),
(38, 25, 'test0', 'User mengakses dashboard', '::1', '2025-03-11 20:55:00'),
(39, 25, 'test0', 'User melihat Logs', '::1', '2025-03-11 20:55:17'),
(40, 25, 'test0', 'User melihat Logs', '::1', '2025-03-11 21:01:41'),
(41, 25, 'test0', 'User melihat Logs', '::1', '2025-03-11 21:04:57'),
(42, 25, 'test0', 'User melihat Logs', '::1', '2025-03-11 21:07:11'),
(43, 25, 'test0', 'User melihat Logs', '::1', '2025-03-11 21:10:25'),
(44, 25, 'test0', 'User logout', '::1', '2025-03-11 21:10:39'),
(45, 4, 'test', 'User login', '::1', '2025-03-11 21:10:57'),
(46, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-11 21:11:00'),
(47, 4, 'test', 'User melihat Logs', '::1', '2025-03-11 21:11:07'),
(48, 4, 'test', 'User melihat Logs', '::1', '2025-03-11 21:11:54'),
(49, 4, 'test', 'User mengakses table User', '::1', '2025-03-11 21:32:55'),
(50, 4, 'test', 'User logout', '::1', '2025-03-11 22:06:43'),
(51, 4, 'test', 'User login', '::1', '2025-03-12 21:38:18'),
(52, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-12 21:38:20'),
(53, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-12 21:39:14'),
(54, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-12 21:39:32'),
(55, 4, 'test', 'User logout', '::1', '2025-03-12 22:08:54'),
(56, 4, 'test', 'User login', '::1', '2025-03-15 08:46:02'),
(57, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-15 08:46:02'),
(58, 4, 'test', 'User melihat Logs', '::1', '2025-03-15 08:50:10'),
(59, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-15 08:50:58'),
(60, 4, 'test', 'User mengakses table User', '::1', '2025-03-15 08:53:06'),
(61, 4, 'test', 'User logout', '::1', '2025-03-15 09:03:23'),
(62, 4, 'test', 'User login', '::1', '2025-03-15 09:11:57'),
(63, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-15 09:11:58'),
(64, 4, 'test', 'User logout', '::1', '2025-03-15 09:26:03'),
(65, 4, 'test', 'User login', '::1', '2025-03-16 09:14:28'),
(66, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-16 09:14:31'),
(67, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-16 09:15:05'),
(68, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-16 09:15:11'),
(69, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-16 09:18:30'),
(70, 4, 'test', 'User logout', '::1', '2025-03-16 09:26:51'),
(71, 25, 'test0', 'User login', '::1', '2025-03-16 09:43:16'),
(72, 25, 'test0', 'User mengakses dashboard', '::1', '2025-03-16 09:43:17'),
(73, 25, 'test0', 'User mengakses dashboard', '::1', '2025-03-16 09:44:48'),
(74, 25, 'test0', 'User mengakses table Restore User', '::1', '2025-03-16 09:44:53'),
(75, 25, 'test0', 'User logout', '::1', '2025-03-16 10:02:50'),
(76, 25, 'test0', 'User login', '::1', '2025-03-16 10:05:32'),
(77, 25, 'test0', 'User mengakses dashboard', '::1', '2025-03-16 10:05:32'),
(78, 25, 'test0', 'User mengakses table Restore User', '::1', '2025-03-16 10:08:32'),
(79, 25, 'test0', 'User mengakses table Restore User', '::1', '2025-03-16 10:08:56'),
(80, 25, 'test0', 'User mengakses table Restore User', '::1', '2025-03-16 10:09:08'),
(81, 25, 'test0', 'User mengakses table Restore User', '::1', '2025-03-16 10:12:43'),
(82, 25, 'test0', 'User mengakses dashboard', '::1', '2025-03-16 10:12:49'),
(83, 25, 'test0', 'User mengakses table Restore User', '::1', '2025-03-16 10:13:06'),
(84, 25, 'test0', 'User mengakses table Restore User', '::1', '2025-03-16 10:13:37'),
(85, 25, 'test0', 'User mengakses table Restore User', '::1', '2025-03-16 10:15:13'),
(86, 25, 'test0', 'User mengakses table Restore User', '::1', '2025-03-16 10:15:48'),
(87, 25, 'test0', 'User mengakses table Restore User', '::1', '2025-03-16 10:15:57'),
(88, 25, 'test0', 'User mengakses dashboard', '::1', '2025-03-16 10:16:03'),
(89, 25, 'test0', 'User mengakses table Restore User', '::1', '2025-03-16 10:17:17'),
(90, 25, 'test0', 'User mengakses dashboard', '::1', '2025-03-16 10:17:28'),
(91, 25, 'test0', 'User mengakses table Restore User', '::1', '2025-03-16 10:18:10'),
(92, 25, 'test0', 'User mengakses dashboard', '::1', '2025-03-16 10:18:14'),
(93, 25, 'test0', 'User mengakses table Restore User', '::1', '2025-03-16 10:18:41'),
(94, 25, 'test0', 'User mengakses table Restore User', '::1', '2025-03-16 10:19:05'),
(95, 25, 'test0', 'User mengakses dashboard', '::1', '2025-03-16 10:19:12'),
(96, 25, 'test0', 'User mengakses table Restore User', '::1', '2025-03-16 10:19:14'),
(97, 25, 'test0', 'User mengakses dashboard', '::1', '2025-03-16 10:19:18'),
(98, 25, 'test0', 'User mengakses dashboard', '::1', '2025-03-16 10:19:21'),
(99, 25, 'test0', 'User mengakses dashboard', '::1', '2025-03-16 10:19:30'),
(100, 25, 'test0', 'User mengakses dashboard', '::1', '2025-03-16 10:19:33'),
(101, 25, 'test0', 'User mengakses dashboard', '::1', '2025-03-16 10:20:48'),
(102, 25, 'test0', 'User logout', '::1', '2025-03-16 10:21:12'),
(103, 25, 'test0', 'User login', '::1', '2025-03-16 10:21:20'),
(104, 25, 'test0', 'User mengakses dashboard', '::1', '2025-03-16 10:21:21'),
(105, 25, 'test0', 'User mengakses dashboard', '::1', '2025-03-16 10:21:25'),
(106, 25, 'test0', 'User mengakses dashboard', '::1', '2025-03-16 10:22:28'),
(107, 25, 'test0', 'User mengakses table User', '::1', '2025-03-16 10:22:29'),
(108, 25, 'test0', 'User mengakses table User', '::1', '2025-03-16 10:22:51'),
(109, 25, 'test0', 'User mengakses dashboard', '::1', '2025-03-16 10:23:02'),
(110, 25, 'test0', 'User mengakses dashboard', '::1', '2025-03-16 10:26:53'),
(111, 26, NULL, 'User terdaftar dengan nama: Atrocitext', '::1', '2025-03-17 20:31:42'),
(112, 26, 'Atrocitext', 'User login', '::1', '2025-03-17 20:33:15'),
(113, 26, 'Atrocitext', 'User mengakses dashboard', '::1', '2025-03-17 20:33:17'),
(114, 26, 'Atrocitext', 'User melihat Logs', '::1', '2025-03-17 20:33:25'),
(115, 26, 'Atrocitext', 'User logout', '::1', '2025-03-17 20:37:25'),
(116, 3, 'tes', 'User login', '::1', '2025-03-17 20:37:39'),
(117, 3, 'tes', 'User mengakses dashboard', '::1', '2025-03-17 20:37:41'),
(118, 3, 'tes', 'User melihat Logs', '::1', '2025-03-17 20:39:32'),
(119, 3, 'tes', 'User melihat Logs', '::1', '2025-03-17 20:39:48'),
(120, 3, 'tes', 'User mengakses dashboard', '::1', '2025-03-17 20:40:19'),
(121, 3, 'tes', 'User logout', '::1', '2025-03-17 20:40:31'),
(122, 4, 'test', 'User login', '::1', '2025-03-17 20:44:27'),
(123, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-17 20:44:31'),
(124, 4, 'test', 'User logout', '::1', '2025-03-17 20:50:20'),
(125, 4, 'test', 'User login', '::1', '2025-03-17 21:00:27'),
(126, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-17 21:00:29'),
(127, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-17 21:01:44'),
(128, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-17 21:01:58'),
(129, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-17 21:02:46'),
(130, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-17 21:03:45'),
(131, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-17 21:05:18'),
(132, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-17 21:11:51'),
(133, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-17 21:12:52'),
(134, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-17 21:13:58'),
(135, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-17 21:15:21'),
(136, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-17 21:18:59'),
(137, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-17 21:20:41'),
(138, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-17 21:22:43'),
(139, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-17 21:23:26'),
(140, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-17 21:25:03'),
(141, 4, 'test', 'User logout', '::1', '2025-03-17 21:41:19'),
(142, 4, 'test', 'User login', '::1', '2025-03-17 22:10:53'),
(143, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-17 22:10:54'),
(144, 4, 'test', 'User logout', '::1', '2025-03-17 22:16:02'),
(145, 27, NULL, 'User terdaftar dengan nama: a', '::1', '2025-03-17 22:16:50'),
(146, 3, 'tes', 'User login', '::1', '2025-03-17 22:17:17'),
(147, 3, 'tes', 'User mengakses dashboard', '::1', '2025-03-17 22:17:18'),
(148, 3, 'tes', 'User melihat Logs', '::1', '2025-03-17 22:17:38'),
(149, 3, 'tes', 'User melihat Logs', '::1', '2025-03-17 22:17:40'),
(150, 3, 'tes', 'User logout', '::1', '2025-03-17 22:25:07'),
(151, 4, 'test', 'User login', '::1', '2025-03-17 22:25:21'),
(152, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-17 22:25:22'),
(153, 4, 'test', 'User mengakses table User', '::1', '2025-03-17 22:26:04'),
(154, 4, 'test', 'User melihat Logs', '::1', '2025-03-17 22:26:17'),
(155, 4, 'test', 'User mengakses table User', '::1', '2025-03-17 22:26:23'),
(156, 4, 'test', 'User logout', '::1', '2025-03-17 22:26:30'),
(157, 25, 'test0', 'User login', '::1', '2025-03-17 22:26:44'),
(158, 25, 'test0', 'User mengakses dashboard', '::1', '2025-03-17 22:26:46'),
(159, 25, 'test0', 'User mengakses table User', '::1', '2025-03-17 22:26:51'),
(160, 25, 'test0', 'User mengakses dashboard', '::1', '2025-03-17 22:27:04'),
(161, 25, 'test0', 'User mengakses table Restore User', '::1', '2025-03-17 22:27:10'),
(162, 25, 'test0', 'User melihat Logs', '::1', '2025-03-17 22:27:32'),
(163, 25, 'test0', 'User mengakses dashboard', '::1', '2025-03-17 22:40:58'),
(164, 25, 'test0', 'User logout', '::1', '2025-03-17 22:42:27'),
(165, 4, 'test', 'User login', '::1', '2025-03-17 22:51:44'),
(166, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-17 22:51:46'),
(167, 4, 'test', 'User logout', '::1', '2025-03-17 23:04:49'),
(168, 4, 'test', 'User login', '::1', '2025-03-23 10:31:30'),
(169, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-23 10:31:32'),
(170, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-23 10:43:34'),
(171, 4, 'test', 'User login', '::1', '2025-03-31 03:40:01'),
(172, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-31 03:40:02'),
(173, 4, 'test', 'User logout', '::1', '2025-03-31 03:54:31'),
(174, 4, 'test', 'User login', '::1', '2025-03-31 04:30:42'),
(175, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-31 04:30:42'),
(176, 4, 'test', 'User logout', '::1', '2025-03-31 04:52:58'),
(177, 4, 'test', 'User login', '::1', '2025-03-31 04:53:54'),
(178, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-31 04:53:55'),
(179, 4, 'test', 'User melihat CCTV', '::1', '2025-03-31 04:54:06'),
(180, 4, 'test', 'User melihat Logs', '::1', '2025-03-31 04:54:08'),
(181, 4, 'test', 'User melihat Logs', '::1', '2025-03-31 04:54:09'),
(182, 4, 'test', 'User melihat Logs', '::1', '2025-03-31 04:56:14'),
(183, 4, 'test', 'User melihat Logs', '::1', '2025-03-31 04:56:32'),
(184, 4, 'test', 'User melihat Logs', '::1', '2025-03-31 04:57:54'),
(185, 4, 'test', 'User melihat Logs', '::1', '2025-03-31 04:59:51'),
(186, 4, 'test', 'User melihat Logs', '::1', '2025-03-31 05:16:56'),
(187, 4, 'test', 'User melihat Logs', '::1', '2025-03-31 05:18:27'),
(188, 4, 'test', 'User melihat Logs', '::1', '2025-03-31 05:18:35'),
(189, 4, 'test', 'User melihat Logs', '::1', '2025-03-31 05:21:12'),
(190, 4, 'test', 'User melihat Logs', '::1', '2025-03-31 05:21:29'),
(191, 4, 'test', 'User melihat Logs', '::1', '2025-03-31 05:21:35'),
(192, 4, 'test', 'User melihat Logs', '::1', '2025-03-31 05:21:39'),
(193, 4, 'test', 'User melihat Logs', '::1', '2025-03-31 05:21:49'),
(194, 4, 'test', 'User melihat Logs', '::1', '2025-03-31 05:21:55'),
(195, 4, 'test', 'User melihat Logs', '::1', '2025-03-31 05:22:00'),
(196, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-31 05:30:24'),
(197, 4, 'test', 'User logout', '::1', '2025-03-31 06:33:24'),
(198, 4, 'test', 'User login', '::1', '2025-03-31 06:33:41'),
(199, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-31 06:33:43'),
(200, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-31 06:36:02'),
(201, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-31 06:36:58'),
(202, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-31 06:46:51'),
(203, 4, 'test', 'User logout', '::1', '2025-03-31 07:07:31'),
(204, 4, 'test', 'User login', '::1', '2025-03-31 07:07:43'),
(205, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-31 07:07:44'),
(206, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-31 07:12:53'),
(207, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-31 07:14:05'),
(208, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-31 07:17:33'),
(209, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-31 07:18:11'),
(210, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-31 07:21:10'),
(211, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-31 07:23:18'),
(212, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-31 07:26:04'),
(213, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-31 07:26:22'),
(214, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-31 07:26:24'),
(215, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-31 07:26:28'),
(216, 4, 'test', 'User logout', '::1', '2025-03-31 08:00:20'),
(217, 4, 'test', 'User login', '::1', '2025-03-31 08:00:31'),
(218, 4, 'test', 'User mengakses dashboard', '::1', '2025-03-31 08:00:32'),
(219, 4, 'test', 'User logout', '::1', '2025-03-31 08:16:33'),
(220, 4, 'test', 'User login', '::1', '2025-04-02 08:32:13'),
(221, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-02 08:32:14'),
(222, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-02 08:35:28'),
(223, 4, 'test', 'User logout', '::1', '2025-04-02 08:35:40'),
(224, 4, 'test', 'User login', '::1', '2025-04-04 04:27:07'),
(225, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-04 04:27:08'),
(226, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-04 04:32:00'),
(227, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-04 04:33:06'),
(228, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-04 04:36:05'),
(229, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-04 04:40:41'),
(230, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-04 04:40:58'),
(231, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-04 04:42:26'),
(232, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-04 04:43:50'),
(233, 25, 'test0', 'User login', '::1', '2025-04-05 11:35:40'),
(234, 25, 'test0', 'User mengakses dashboard', '::1', '2025-04-05 11:35:41'),
(235, 25, 'test0', 'User melihat CCTV', '::1', '2025-04-05 11:35:47'),
(236, 25, 'test0', 'User mengakses table User', '::1', '2025-04-05 11:38:37'),
(237, 25, 'test0', 'User mengakses table Restore User', '::1', '2025-04-05 11:40:12'),
(238, 25, 'test0', 'User mengakses table User', '::1', '2025-04-05 11:40:18'),
(239, 25, 'test0', 'User mengakses dashboard', '::1', '2025-04-05 11:40:25'),
(240, 25, 'test0', 'User mengakses table Restore User', '::1', '2025-04-05 11:40:28'),
(241, 25, 'test0', 'User mengakses table User', '::1', '2025-04-05 11:42:00'),
(242, 25, 'test0', 'User mengakses table Restore User', '::1', '2025-04-05 11:42:50'),
(243, 25, 'test0', 'User mengakses table User', '::1', '2025-04-05 11:42:58'),
(244, 25, 'test0', 'User mengakses table Restore User', '::1', '2025-04-05 11:43:03'),
(245, 25, 'test0', 'User logout', '::1', '2025-04-05 11:59:21'),
(246, 4, 'test', 'User login', '::1', '2025-04-05 12:00:11'),
(247, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-05 12:00:11'),
(248, 3, 'tes', 'User login', '::1', '2025-04-06 12:12:28'),
(249, 3, 'tes', 'User mengakses dashboard', '::1', '2025-04-06 12:12:29'),
(250, 3, 'tes', 'User melihat Logs', '::1', '2025-04-06 12:12:52'),
(251, 3, 'tes', 'User mengakses dashboard', '::1', '2025-04-06 12:12:59'),
(252, 3, 'tes', 'User melihat Logs', '::1', '2025-04-06 12:14:46'),
(253, 3, 'tes', 'User melihat Logs', '::1', '2025-04-06 12:15:16'),
(254, 3, 'tes', 'User mengakses dashboard', '::1', '2025-04-06 12:15:21'),
(255, 3, 'tes', 'User logout', '::1', '2025-04-06 12:26:51'),
(256, 25, 'test0', 'User login', '::1', '2025-04-06 12:27:12'),
(257, 25, 'test0', 'User mengakses dashboard', '::1', '2025-04-06 12:27:13'),
(258, 25, 'test0', 'User mengakses table User', '::1', '2025-04-06 12:33:28'),
(259, 25, 'test0', 'User mengakses dashboard', '::1', '2025-04-06 12:33:34'),
(260, 25, 'test0', 'User mengakses table User', '::1', '2025-04-06 12:35:52'),
(261, 25, 'test0', 'User mengakses dashboard', '::1', '2025-04-06 12:35:58'),
(262, 25, 'test0', 'User mengakses table User', '::1', '2025-04-06 12:36:47'),
(263, 25, 'test0', 'User mengakses dashboard', '::1', '2025-04-06 12:37:56'),
(264, 25, 'test0', 'User logout', '::1', '2025-04-06 12:39:45'),
(265, 4, 'test', 'User login', '::1', '2025-04-06 12:39:57'),
(266, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-06 12:39:57'),
(267, 4, 'test', 'User mengakses table User', '::1', '2025-04-06 12:40:05'),
(268, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-06 12:40:13'),
(269, 4, 'test', 'User mengakses table User', '::1', '2025-04-06 12:55:26'),
(270, 4, 'test', 'User logout', '::1', '2025-04-06 12:57:32'),
(271, 25, 'test0', 'User login', '::1', '2025-04-06 12:57:40'),
(272, 25, 'test0', 'User mengakses dashboard', '::1', '2025-04-06 12:57:41'),
(273, 25, 'test0', 'User mengakses table Restore User', '::1', '2025-04-06 12:57:45'),
(274, 25, 'test0', 'User mengakses table Restore User', '::1', '2025-04-06 12:57:59'),
(275, 25, 'test0', 'User melihat Logs', '::1', '2025-04-06 13:01:50'),
(276, 25, 'test0', 'User melihat CCTV', '::1', '2025-04-06 13:02:48'),
(277, 25, 'test0', 'User logout', '::1', '2025-04-06 13:20:53'),
(278, 4, 'test', 'User login', '::1', '2025-04-06 13:30:52'),
(279, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-06 13:30:52'),
(280, 4, 'test', 'User melihat Logs', '::1', '2025-04-06 13:30:58'),
(281, 4, 'test', 'User logout', '::1', '2025-04-06 13:32:35'),
(282, 3, 'tes', 'User login', '::1', '2025-04-06 13:34:45'),
(283, 3, 'tes', 'User mengakses dashboard', '::1', '2025-04-06 13:34:45'),
(284, 3, 'tes', 'User melihat Logs', '::1', '2025-04-06 13:34:51'),
(285, 3, 'tes', 'User logout', '::1', '2025-04-06 13:49:14'),
(286, 4, 'test', 'User login', '::1', '2025-04-06 13:49:26'),
(287, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-06 13:49:27'),
(288, 4, 'test', 'User logout', '::1', '2025-04-06 14:07:20'),
(289, 26, 'Atrocitext', 'User login', '::1', '2025-04-07 03:23:39'),
(290, 26, 'Atrocitext', 'User mengakses dashboard', '::1', '2025-04-07 03:23:42'),
(291, 26, 'Atrocitext', 'User logout', '::1', '2025-04-07 03:23:48'),
(292, 28, 'test', 'User  terdaftar dengan nama: test', '::1', '2025-04-07 03:27:55'),
(293, 28, 'test11', 'User login', '::1', '2025-04-07 03:28:38'),
(294, 28, 'test11', 'User mengakses dashboard', '::1', '2025-04-07 03:28:41'),
(295, 28, 'test11', 'User logout', '::1', '2025-04-07 03:28:52'),
(296, 4, 'test', 'User login', '::1', '2025-04-07 03:30:33'),
(297, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-07 03:30:36'),
(298, 4, 'test', 'User logout', '::1', '2025-04-07 03:43:04'),
(299, 3, 'tes', 'User login', '::1', '2025-04-07 03:43:16'),
(300, 3, 'tes', 'User mengakses dashboard', '::1', '2025-04-07 03:43:19'),
(301, 3, 'tes', 'User mengakses dashboard', '::1', '2025-04-07 03:44:19'),
(302, 3, 'tes', 'User logout', '::1', '2025-04-07 03:46:46'),
(303, 28, 'test11', 'User  terdaftar dengan nama: username', '::1', '2025-04-07 03:48:43'),
(304, 28, 'test11', 'User  terdaftar dengan nama: uasername', '::1', '2025-04-07 03:49:58'),
(305, 31, 'username', 'User  terdaftar dengan nama: username', '::1', '2025-04-07 03:51:10'),
(306, 31, 'username', 'User login', '::1', '2025-04-07 03:51:44'),
(307, 31, 'username', 'User mengakses dashboard', '::1', '2025-04-07 03:51:45'),
(308, 31, 'username', 'User melihat Logs', '::1', '2025-04-07 03:53:40'),
(309, 31, 'username', 'User logout', '::1', '2025-04-07 03:53:51'),
(310, 25, 'test0', 'User login', '::1', '2025-04-07 03:54:12'),
(311, 25, 'test0', 'User mengakses dashboard', '::1', '2025-04-07 03:54:13'),
(312, 25, 'test0', 'User mengakses table User', '::1', '2025-04-07 03:54:28'),
(313, 25, 'test0', 'User mengakses table User', '::1', '2025-04-07 03:54:43'),
(314, 25, 'test0', 'User mengakses table Restore User', '::1', '2025-04-07 03:54:54'),
(315, 25, 'test0', 'User mengakses table User', '::1', '2025-04-07 03:55:18'),
(316, 25, 'test0', 'User melihat Logs', '::1', '2025-04-07 03:58:29'),
(317, 25, 'test0', 'User melihat Logs', '::1', '2025-04-07 03:58:48'),
(318, 25, 'test0', 'User melihat Logs', '::1', '2025-04-07 03:58:56'),
(319, 25, 'test0', 'User melihat Logs', '::1', '2025-04-07 04:00:14'),
(320, 25, 'test0', 'User logout', '::1', '2025-04-07 04:00:19'),
(321, 4, 'test', 'User login', '::1', '2025-04-07 04:00:30'),
(322, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-07 04:00:30'),
(323, 4, 'test', 'User melihat Logs', '::1', '2025-04-07 04:00:43'),
(324, 4, 'test', 'User melihat Logs', '::1', '2025-04-07 04:01:02'),
(325, 4, 'test', 'User melihat Logs', '::1', '2025-04-07 04:01:11'),
(326, 4, 'test', 'User melihat CCTV', '::1', '2025-04-07 04:01:18'),
(327, 4, 'test', 'User melihat CCTV', '::1', '2025-04-07 04:02:18'),
(328, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-07 04:02:32'),
(329, 4, 'test', 'User logout', '::1', '2025-04-07 04:02:41'),
(330, 31, 'username', 'User login', '::1', '2025-04-07 04:04:06'),
(331, 31, 'username', 'User mengakses dashboard', '::1', '2025-04-07 04:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `activity_log_copy1`
--

CREATE TABLE `activity_log_copy1` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cctv`
--

CREATE TABLE `cctv` (
  `id_kamera` int(11) NOT NULL,
  `nama_kamera` varchar(255) NOT NULL,
  `stream_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parkir`
--

CREATE TABLE `parkir` (
  `id_parkir` int(11) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `status` enum('available','booked') DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parkir`
--

INSERT INTO `parkir` (`id_parkir`, `lokasi`, `status`) VALUES
(1, 'Parkir 1', 'booked'),
(2, 'Parkir 2', 'booked'),
(3, 'Parkir 3', 'booked'),
(4, 'Parkir 4', 'booked'),
(5, 'Parkir 5', 'booked'),
(6, 'Parkir 6', 'available'),
(7, 'Parkir 7', 'booked'),
(8, 'Parkir 8', 'booked'),
(9, 'Parkir 9', 'booked'),
(10, 'Parkir 10', 'booked'),
(11, 'Parkir 11', 'booked'),
(12, 'Parkir 12', 'available'),
(13, 'Parkir 13', 'available'),
(14, 'Parkir 14', 'available'),
(15, 'Parkir 15', 'booked'),
(16, 'Parkir 16', 'available'),
(17, 'Parkir 17', 'booked'),
(18, 'Parkir 18', 'available'),
(19, 'Parkir 19', 'booked'),
(20, 'Parkir 20', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `parkir_motor`
--

CREATE TABLE `parkir_motor` (
  `id_parkir` int(11) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `status` enum('available','booked') DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parkir_motor`
--

INSERT INTO `parkir_motor` (`id_parkir`, `lokasi`, `status`) VALUES
(1, 'Parkir 1', 'available'),
(2, 'Parkir 2', 'available'),
(3, 'Parkir 3', 'available'),
(4, 'Parkir 4', 'available'),
(5, 'Parkir 5', 'available'),
(6, 'Parkir 6', 'available'),
(7, 'Parkir 7', 'available'),
(8, 'Parkir 8', 'available'),
(9, 'Parkir 9', 'available'),
(10, 'Parkir 10', 'booked'),
(11, 'Parkir 11', 'booked'),
(12, 'Parkir 12', 'available'),
(13, 'Parkir 13', 'available'),
(14, 'Parkir 14', 'available'),
(15, 'Parkir 15', 'booked'),
(16, 'Parkir 16', 'available'),
(17, 'Parkir 17', 'available'),
(18, 'Parkir 18', 'available'),
(19, 'Parkir 19', 'booked'),
(20, 'Parkir 20', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(1, '13323@gmail.com', '11076f58119218ab4a6b5d0c8de9534bb4b2c5d5280ad061332fd7793fd6f4331ca3844d6ca4a32cf3eb3fd3cff264e63054', '2025-04-02 03:00:32');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_reservasi` int(11) DEFAULT NULL,
  `total_tagihan` decimal(10,2) DEFAULT NULL,
  `metode_pembayaran` enum('gopay','ovo','dana','bank') DEFAULT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_reservasi`, `total_tagihan`, `metode_pembayaran`, `bukti_pembayaran`, `status`) VALUES
(2, 17, NULL, '', 'uploads/1741834155_a3e637dbf381a83e3e08.png', 'Lunas'),
(3, 18, '600000.00', 'gopay', 'uploads/1742047376_327071e4787e686fab63.png', 'Lunas'),
(4, 19, '2000.00', 'dana', 'uploads/1742261908_5dafa534f4937e4d15dd.png', 'Lunas'),
(5, 20, '2000.00', '', 'uploads/1742267518_dfc9029df3b3afc719bb.png', 'Lunas'),
(6, 21, '48000.00', 'gopay', 'uploads/1742268001_c7923610a4f682c61f90.png', 'Lunas'),
(7, 22, '120000.00', 'ovo', 'uploads/1743872638_1999c5f297aaa69345d1.png', 'Lunas'),
(8, 23, '5000.00', 'ovo', 'uploads/1743959801_0345a47cebdd77bfca60.jpg', 'Lunas'),
(9, 24, '80000.00', 'ovo', 'uploads/1744015031_5e649d232def68e61949.png', 'Lunas'),
(10, 25, '10000.00', 'gopay', 'uploads/1744015987_d7ca3a041ff991377c6c.png', 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_app`
--

CREATE TABLE `pengaturan_app` (
  `id_pengaturan` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `logo` varchar(255) DEFAULT 'assets/img/default-logo.png',
  `logo_web` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaturan_app`
--

INSERT INTO `pengaturan_app` (`id_pengaturan`, `judul`, `logo`, `logo_web`) VALUES
(1, 'E-parkir', '1743759745_a7c078eb8db759f99009.png', '1743759829_e97215254eb0005146ad.png');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kendaraan` enum('mobil','motor') NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('0','1','2') NOT NULL DEFAULT '2',
  `delete_status` enum('0','1') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `nama`, `email`, `kendaraan`, `password`, `level`, `delete_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(3, 'tes', 'tes@gmail.com', 'mobil', 'c4ca4238a0b923820dcc509a6f75849b', '2', '0', '2025-03-31 13:51:22', NULL, '2025-04-07 08:55:17', NULL),
(4, 'test', 'tes@gm', 'motor', 'c4ca4238a0b923820dcc509a6f75849b', '1', '0', '2025-03-31 13:51:22', NULL, '2025-03-31 13:51:22', NULL),
(5, 'awg', 'aw@gmail', 'motor', 'c4ca4238a0b923820dcc509a6f75849b', '1', '0', '2025-03-31 13:51:22', NULL, '2025-03-31 13:51:22', NULL),
(7, 'hey', 'hey@gmail.com', 'mobil', '202cb962ac59075b964b07152d234b70', '2', '0', '2025-03-31 13:51:22', NULL, '2025-03-31 13:51:22', NULL),
(8, 'res', 'res@gmail', 'motor', 'c4ca4238a0b923820dcc509a6f75849b', '1', '0', '2025-03-31 13:51:22', NULL, '2025-03-31 13:51:22', NULL),
(9, 'Farsya', 'farsya@gmail.com', 'mobil', 'c4ca4238a0b923820dcc509a6f75849b', '2', '0', '2025-03-31 13:51:22', NULL, '2025-03-31 13:51:22', NULL),
(10, 'tess', 'tess@gmail.com', 'mobil', 'c4ca4238a0b923820dcc509a6f75849b', '2', '0', '2025-03-31 13:51:22', NULL, '2025-03-31 13:51:22', NULL),
(13, 'Sapi Bakar', 'sapi@gmail', 'motor', 'c4ca4238a0b923820dcc509a6f75849b', '1', '0', '2025-03-31 13:51:22', NULL, '2025-04-05 16:42:57', NULL),
(18, 'beh', 'beh@gmail.com', 'motor', 'c4ca4238a0b923820dcc509a6f75849b', '1', '0', '2025-03-31 13:51:22', NULL, '2025-03-31 13:51:22', NULL),
(19, 'rawr', 'rawr@gmail', 'mobil', 'c4ca4238a0b923820dcc509a6f75849b', '1', '0', '2025-03-31 13:51:22', NULL, '2025-03-31 13:51:22', NULL),
(20, 'wakakaf', 'wakaka@gmail', 'mobil', 'c4ca4238a0b923820dcc509a6f75849b', '1', '0', '2025-03-31 13:51:22', NULL, '2025-03-31 13:51:22', NULL),
(22, 'dwa', 'sd@g', 'mobil', 'c4ca4238a0b923820dcc509a6f75849b', '2', '0', '2025-03-31 13:51:22', NULL, '2025-03-31 13:51:22', NULL),
(23, 'wawa', 'wawa@gmail.com', 'mobil', 'c4ca4238a0b923820dcc509a6f75849b', '2', '0', '2025-03-31 13:51:22', NULL, '2025-03-31 13:51:22', NULL),
(25, 'test0', 'teo10@co.6', 'mobil', 'c4ca4238a0b923820dcc509a6f75849b', '0', '0', '2025-03-31 13:51:22', NULL, '2025-03-31 13:51:22', NULL),
(26, 'Atrocitext', 'atreum9@gmail.com', 'mobil', '827ccb0eea8a706c4c34a16891f84e7b', '1', '0', '2025-03-31 13:51:22', NULL, '2025-04-07 08:23:24', NULL),
(27, 'a', 'a@gmail.com', 'mobil', 'c4ca4238a0b923820dcc509a6f75849b', '1', '1', '2025-03-31 13:51:22', NULL, '2025-04-06 17:57:55', NULL),
(28, 'test11', 'abc@gmail.com', 'mobil', '1492c0f80ac57b167e0794e4d1624a80', '1', '0', '2025-04-06 20:27:54', 1, '2025-04-07 08:50:52', 1),
(31, 'username', 'kevin2288oof@gmail.com', 'mobil', 'c17ffb399b49fcc1f88d6e03f750771a', '2', '0', '2025-04-06 20:51:10', 1, '2025-04-07 09:03:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_parkir` int(11) DEFAULT NULL,
  `waktu_reservasi` datetime NOT NULL DEFAULT current_timestamp(),
  `awal_waktu_reservasi` datetime DEFAULT NULL,
  `akhir_waktu_reservasi` datetime DEFAULT NULL,
  `kendaraan` varchar(11) DEFAULT NULL,
  `total_tagihan` int(11) DEFAULT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `id_user`, `id_parkir`, `waktu_reservasi`, `awal_waktu_reservasi`, `akhir_waktu_reservasi`, `kendaraan`, `total_tagihan`, `bukti_pembayaran`, `status`) VALUES
(3, 19, 14, '2025-02-25 17:36:19', '2025-02-25 17:36:00', '2025-02-25 20:36:00', 'Mobil', 30000, 'uploads/1740479779_76d10fcf2aa964433ee1.png', 'Selesai'),
(4, 19, 18, '2025-02-25 17:37:39', '2025-02-25 17:37:00', '2025-02-25 21:37:00', 'Mobil', 40000, 'uploads/1740479859_26f602652fc09645083a.png', 'Terbayar'),
(5, 19, 1, '2025-02-25 17:42:33', '2025-02-25 17:42:00', '2025-02-25 21:42:00', 'Mobil', 40000, 'uploads/1740480153_202b252b63725190837b.png', 'Checked-in'),
(6, 9, 8, '2025-02-25 20:01:54', '2025-02-25 20:01:00', '2025-02-25 23:01:00', 'Mobil', 30000, 'uploads/1740488514_fd462195de9ec0147a2a.png', 'Terbayar'),
(7, 19, 2, '2025-02-25 20:54:54', '2025-02-25 09:54:00', '2025-02-25 20:00:00', 'Mobil', 110000, 'uploads/1740491694_93fcb8101c3048b01a3e.png', 'Selesai'),
(8, 19, 1, '2025-02-26 09:07:10', '2025-02-26 10:06:00', '2025-02-26 09:13:00', 'Motor', 0, 'uploads/1740535630_cc21942a7028ce94b19d.png', 'Terbayar'),
(9, 19, 2, '2025-02-26 09:07:58', '2025-02-26 09:07:00', '2025-02-27 09:28:00', 'Motor', 125000, 'uploads/1740535678_690eb130f0af7bcbce22.png', 'Selesai'),
(10, 24, 2, '2025-02-26 09:12:01', '2025-02-26 09:11:00', '2025-02-28 00:15:00', 'Motor', 200000, 'uploads/1740535921_c264a4f5b1ff642348b1.png', 'Terkonfirmasi'),
(11, 19, 2, '2025-02-26 09:29:01', '2025-02-26 09:28:00', '2025-02-26 10:28:00', 'Mobil', 10000, 'uploads/1740536941_b9886a2f5664a6475d9f.png', 'Terkonfirmasi'),
(12, 19, 8, '2025-02-26 09:57:07', '2025-02-26 09:57:00', '2025-02-26 11:57:00', 'Mobil', 20000, 'uploads/1740538627_4b66bf56c6751c3a900a.png', 'Terkonfirmasi'),
(13, 24, 1, '2025-02-26 09:58:42', '2025-02-26 09:00:00', '2025-02-26 09:03:00', 'Mobil', 10000, 'uploads/1740538722_b22a0abe3446089d23c0.png', 'Terkonfirmasi'),
(14, 24, 2, '2025-02-26 10:06:21', '2025-02-26 10:10:00', '2025-02-26 10:14:00', 'Mobil', 10000, 'uploads/1740539181_f3d887d28f202157f6e8.sql', 'Selesai'),
(15, 24, 1, '2025-02-26 10:11:10', '2025-02-26 10:14:00', '2025-02-26 10:16:00', 'Motor', 5000, 'uploads/1740539470_3c782de96be773ba4b78.png', 'Selesai'),
(16, 3, 20, '2025-03-03 20:20:08', '2025-03-04 09:19:00', '2025-03-04 11:19:00', 'Mobil', 10000, 'uploads/1741054808_c00d0d4078c078865f28.jpg', 'Terbayar'),
(17, 4, 4, '2025-03-12 21:49:15', '2025-03-01 09:48:00', '2025-03-04 09:49:00', 'Mobil', NULL, NULL, 'Terbayar'),
(18, 4, 10, '2025-03-15 09:02:56', '2025-03-07 21:02:00', '2025-03-12 21:02:00', 'Mobil', NULL, NULL, 'Terbayar'),
(19, 3, 19, '2025-03-17 20:38:28', '2025-03-18 08:38:00', '2025-03-18 09:38:00', 'Motor', NULL, NULL, 'Terbayar'),
(20, 4, 15, '2025-03-17 22:11:58', '2025-03-18 10:11:00', '2025-03-18 11:11:00', 'Motor', NULL, NULL, 'Terbayar'),
(21, 3, 2, '2025-03-17 22:20:01', '2025-03-18 10:18:00', '2025-03-19 10:18:00', 'Motor', NULL, NULL, 'Terbayar'),
(22, 4, 8, '2025-04-05 12:03:58', '2025-04-06 00:03:00', '2025-04-07 00:03:00', 'Mobil', NULL, NULL, 'Terbayar'),
(23, 3, 7, '2025-04-06 12:16:41', '2025-04-07 00:16:00', '2025-04-07 01:16:00', 'Mobil', NULL, NULL, 'Confirmed'),
(24, 4, 1, '2025-04-07 03:37:11', '2025-04-07 15:36:00', '2025-04-08 07:36:00', 'Mobil', NULL, NULL, 'Confirmed'),
(25, 31, 17, '2025-04-07 03:53:07', '2025-04-07 15:52:00', '2025-04-07 17:52:00', 'Mobil', NULL, NULL, 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi_motor`
--

CREATE TABLE `reservasi_motor` (
  `id_reservasi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_parkir` int(11) DEFAULT NULL,
  `waktu_reservasi` datetime NOT NULL DEFAULT current_timestamp(),
  `awal_waktu_reservasi` datetime DEFAULT NULL,
  `akhir_waktu_reservasi` datetime DEFAULT NULL,
  `kendaraan` varchar(11) DEFAULT NULL,
  `total_tagihan` int(11) DEFAULT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `activity_log_copy1`
--
ALTER TABLE `activity_log_copy1`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `cctv`
--
ALTER TABLE `cctv`
  ADD PRIMARY KEY (`id_kamera`);

--
-- Indexes for table `parkir`
--
ALTER TABLE `parkir`
  ADD PRIMARY KEY (`id_parkir`);

--
-- Indexes for table `parkir_motor`
--
ALTER TABLE `parkir_motor`
  ADD PRIMARY KEY (`id_parkir`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_reservasi` (`id_reservasi`);

--
-- Indexes for table `pengaturan_app`
--
ALTER TABLE `pengaturan_app`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- Indexes for table `reservasi_motor`
--
ALTER TABLE `reservasi_motor`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;

--
-- AUTO_INCREMENT for table `activity_log_copy1`
--
ALTER TABLE `activity_log_copy1`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;

--
-- AUTO_INCREMENT for table `cctv`
--
ALTER TABLE `cctv`
  MODIFY `id_kamera` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parkir`
--
ALTER TABLE `parkir`
  MODIFY `id_parkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `parkir_motor`
--
ALTER TABLE `parkir_motor`
  MODIFY `id_parkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengaturan_app`
--
ALTER TABLE `pengaturan_app`
  MODIFY `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reservasi_motor`
--
ALTER TABLE `reservasi_motor`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_reservasi`) REFERENCES `reservasi` (`id_reservasi`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
