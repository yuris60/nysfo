-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2021 at 04:29 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_beautycare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nm_admin` varchar(30) NOT NULL,
  `akses` enum('Pemilik','Customer Service') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nm_admin`, `akses`) VALUES
(1, 'admin', '$2y$10$rRh9FBQOwsj.j4x9at8tx.V7/2QLKgcFyWCzsqrW3JztOfiA1FVrO', 'dr. Lina Wijaya', 'Pemilik'),
(2, 'cs', '$2y$10$BTuqWgEA2FbDW0BgxfbWXuYkjhLqdbsDy15K0x4b07U/bzQMYBerm', 'CS', 'Customer Service');

-- --------------------------------------------------------

--
-- Table structure for table `detail_paket`
--

CREATE TABLE `detail_paket` (
  `id_detailpaket` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_detailpembelian` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty_beli` int(11) NOT NULL,
  `harga_beli` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detailpenjualan` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_detailtreatment` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty_treatment` int(11) NOT NULL,
  `qty_produk` int(11) NOT NULL,
  `total_penjualan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detailpenjualan`, `id_penjualan`, `id_detailtreatment`, `id_produk`, `qty_treatment`, `qty_produk`, `total_penjualan`) VALUES
(1, 1, 0, 45, 0, 1, 65000),
(2, 1, 0, 52, 0, 1, 70000),
(3, 2, 0, 46, 0, 1, 175000),
(4, 3, 0, 5, 0, 1, 115000),
(5, 3, 0, 45, 0, 1, 65000),
(6, 4, 0, 6, 0, 1, 60000),
(7, 4, 0, 4, 0, 1, 90000),
(8, 5, 0, 53, 0, 1, 100000),
(9, 5, 0, 45, 0, 1, 65000),
(10, 5, 0, 13, 0, 1, 80000),
(11, 5, 0, 47, 0, 1, 75000),
(12, 5, 0, 52, 0, 1, 70000),
(13, 6, 25, 0, 1, 0, 500000),
(14, 7, 0, 1, 0, 1, 60000),
(15, 8, 0, 1, 0, 1, 60000),
(16, 8, 0, 55, 0, 1, 75000),
(17, 8, 0, 54, 0, 1, 60000),
(18, 9, 0, 47, 0, 1, 75000),
(19, 9, 0, 45, 0, 1, 65000),
(20, 9, 0, 17, 0, 1, 90000),
(21, 9, 0, 15, 0, 1, 95000),
(22, 9, 0, 1, 0, 1, 60000),
(23, 10, 0, 56, 0, 1, 70000),
(24, 10, 0, 8, 0, 1, 80000),
(25, 10, 0, 39, 0, 1, 60000),
(26, 11, 0, 45, 0, 2, 130000),
(27, 11, 0, 60, 0, 1, 75000),
(28, 12, 16, 0, 1, 0, 480000),
(29, 12, 0, 15, 0, 1, 95000),
(30, 12, 0, 28, 0, 1, 90000),
(31, 12, 0, 46, 0, 1, 175000),
(32, 12, 0, 65, 0, 1, 75000),
(33, 13, 0, 15, 0, 1, 95000),
(34, 13, 33, 0, 1, 0, 195000),
(35, 13, 0, 58, 0, 1, 75000),
(36, 14, 34, 0, 1, 0, 285000),
(38, 14, 0, 20, 0, 1, 85000),
(39, 15, 0, 6, 0, 1, 60000),
(40, 15, 0, 4, 0, 1, 90000),
(41, 16, 0, 7, 0, 1, 50000),
(42, 16, 0, 15, 0, 1, 95000),
(43, 16, 0, 14, 0, 1, 110000),
(44, 17, 6, 0, 1, 0, 115000),
(45, 18, 0, 38, 0, 1, 80000),
(46, 18, 0, 17, 0, 1, 90000),
(47, 18, 0, 61, 0, 1, 75000),
(48, 19, 0, 44, 0, 1, 65000),
(49, 20, 0, 54, 0, 1, 60000),
(50, 21, 0, 6, 0, 1, 60000),
(51, 22, 15, 0, 1, 0, 245000),
(52, 22, 0, 28, 0, 1, 90000),
(53, 22, 0, 6, 0, 1, 60000),
(54, 22, 0, 15, 0, 1, 95000),
(55, 22, 0, 8, 0, 1, 80000),
(56, 22, 0, 64, 0, 1, 75000),
(57, 22, 0, 60, 0, 1, 75000),
(58, 22, 0, 58, 0, 1, 75000),
(59, 23, 0, 1, 0, 1, 60000),
(60, 23, 0, 9, 0, 1, 80000),
(61, 23, 0, 45, 0, 1, 65000),
(62, 24, 34, 0, 1, 0, 285000),
(63, 24, 0, 5, 0, 1, 115000),
(64, 24, 0, 15, 0, 1, 95000),
(65, 24, 0, 58, 0, 2, 150000),
(66, 24, 0, 64, 0, 1, 75000),
(67, 24, 0, 61, 0, 1, 75000),
(68, 25, 0, 45, 0, 1, 65000),
(69, 25, 0, 8, 0, 1, 80000),
(70, 25, 0, 54, 0, 1, 60000),
(71, 25, 0, 20, 0, 1, 85000),
(72, 25, 0, 17, 0, 1, 90000),
(73, 26, 0, 61, 0, 1, 75000),
(74, 26, 0, 17, 0, 1, 90000),
(76, 26, 0, 20, 0, 1, 85000),
(78, 26, 0, 40, 0, 1, 85000),
(79, 27, 0, 20, 0, 1, 85000),
(80, 27, 34, 0, 1, 0, 285000),
(81, 27, 0, 58, 0, 1, 75000),
(82, 26, 0, 66, 0, 1, 75000),
(83, 28, 35, 0, 1, 0, 330000),
(84, 28, 0, 66, 0, 1, 75000),
(85, 28, 0, 61, 0, 1, 75000),
(86, 28, 0, 24, 0, 1, 60000),
(87, 28, 0, 17, 0, 1, 90000),
(88, 28, 0, 41, 0, 1, 85000),
(89, 29, 0, 67, 0, 1, 196000),
(90, 29, 33, 0, 1, 0, 195000),
(91, 30, 0, 45, 0, 1, 65000),
(92, 30, 0, 7, 0, 1, 50000),
(93, 30, 0, 8, 0, 1, 80000),
(94, 30, 0, 9, 0, 1, 80000),
(95, 31, 34, 0, 1, 0, 285000),
(96, 31, 0, 56, 0, 1, 70000),
(97, 31, 0, 17, 0, 1, 90000),
(98, 31, 0, 66, 0, 1, 75000),
(99, 31, 0, 20, 0, 1, 85000),
(100, 31, 0, 65, 0, 1, 75000),
(101, 31, 0, 39, 0, 1, 60000),
(102, 32, 34, 0, 1, 0, 285000),
(103, 32, 0, 68, 0, 1, 60000),
(105, 33, 0, 69, 0, 1, 196000),
(106, 33, 0, 70, 0, 1, 60000),
(107, 34, 0, 71, 0, 1, 85000),
(108, 34, 0, 9, 0, 1, 80000),
(109, 34, 0, 6, 0, 1, 60000),
(111, 36, 33, 0, 1, 0, 195000),
(112, 36, 0, 54, 0, 1, 60000),
(113, 37, 33, 0, 1, 0, 195000),
(115, 37, 0, 27, 0, 1, 90000),
(116, 37, 0, 45, 0, 1, 65000),
(117, 37, 0, 61, 0, 1, 75000),
(119, 37, 0, 8, 0, 1, 80000),
(120, 37, 0, 65, 0, 1, 70000),
(121, 37, 0, 72, 0, 1, 85000),
(122, 38, 0, 54, 0, 1, 60000),
(123, 39, 0, 61, 0, 1, 75000),
(124, 39, 0, 71, 0, 1, 85000),
(125, 39, 0, 68, 0, 1, 60000),
(126, 39, 0, 73, 0, 1, 90000),
(128, 39, 0, 74, 0, 1, 85000),
(129, 39, 34, 0, 1, 0, 285000),
(130, 41, 34, 0, 1, 0, 285000),
(131, 41, 0, 46, 0, 1, 175000),
(132, 43, 0, 12, 0, 1, 80000),
(133, 43, 0, 45, 0, 1, 65000),
(134, 43, 0, 64, 0, 1, 70000),
(135, 43, 0, 30, 0, 1, 170000),
(136, 43, 0, 15, 0, 1, 95000),
(137, 43, 0, 52, 0, 1, 70000),
(138, 44, 0, 15, 0, 2, 190000),
(139, 44, 0, 47, 0, 1, 75000),
(140, 44, 26, 0, 1, 0, 425000),
(141, 45, 0, 17, 0, 1, 90000),
(142, 45, 0, 56, 0, 1, 70000),
(143, 46, 0, 60, 0, 1, 75000),
(144, 46, 0, 64, 0, 1, 70000),
(145, 46, 0, 1, 0, 1, 60000),
(146, 46, 0, 13, 0, 1, 80000),
(147, 46, 0, 54, 0, 1, 60000),
(148, 47, 0, 60, 0, 1, 75000),
(149, 47, 0, 1, 0, 1, 60000),
(151, 48, 0, 76, 0, 1, 85000),
(152, 48, 0, 73, 0, 1, 90000),
(153, 49, 33, 0, 1, 0, 195000),
(154, 49, 0, 1, 0, 1, 60000),
(155, 50, 0, 45, 0, 1, 65000),
(156, 50, 0, 14, 0, 1, 110000),
(157, 51, 4, 0, 1, 0, 95000),
(158, 52, 0, 60, 0, 1, 75000),
(159, 52, 0, 64, 0, 1, 70000),
(160, 52, 0, 45, 0, 1, 65000),
(161, 52, 0, 9, 0, 1, 80000),
(162, 52, 0, 1, 0, 1, 60000),
(163, 53, 0, 56, 0, 1, 70000),
(164, 54, 1, 0, 1, 0, 150000),
(165, 55, 0, 14, 0, 1, 110000),
(166, 56, 33, 0, 1, 0, 195000),
(167, 57, 4, 0, 1, 0, 95000),
(168, 58, 0, 1, 0, 1, 60000),
(169, 58, 0, 9, 0, 1, 80000),
(170, 59, 0, 56, 0, 1, 70000),
(171, 59, 0, 64, 0, 1, 70000),
(172, 59, 0, 58, 0, 1, 75000),
(173, 59, 0, 8, 0, 1, 80000),
(174, 59, 0, 15, 0, 1, 95000),
(175, 59, 0, 54, 0, 1, 60000),
(176, 61, 33, 0, 1, 0, 195000),
(177, 62, 33, 0, 1, 0, 195000),
(178, 62, 0, 56, 0, 1, 70000),
(179, 63, 0, 11, 0, 1, 100000),
(180, 64, 0, 11, 0, 1, 100000),
(181, 64, 0, 56, 0, 1, 70000),
(182, 64, 0, 64, 0, 1, 70000),
(183, 64, 0, 45, 0, 1, 65000),
(184, 64, 0, 72, 0, 1, 85000),
(186, 66, 34, 0, 1, 0, 285000),
(187, 66, 0, 77, 0, 1, 70000),
(188, 66, 0, 78, 0, 1, 75000),
(189, 66, 0, 79, 0, 1, 85000),
(190, 66, 0, 80, 0, 1, 90000),
(191, 66, 0, 81, 0, 1, 60000),
(192, 66, 0, 74, 0, 1, 85000),
(193, 66, 0, 17, 0, 1, 90000),
(194, 66, 0, 83, 0, 1, 100000),
(195, 66, 0, 84, 0, 1, 30000),
(196, 67, 28, 0, 1, 0, 525000),
(197, 67, 0, 30, 0, 1, 170000),
(198, 67, 0, 61, 0, 1, 75000),
(199, 67, 0, 17, 0, 1, 90000),
(201, 67, 0, 37, 0, 1, 95000),
(202, 67, 0, 45, 0, 1, 65000),
(203, 67, 0, 77, 0, 1, 70000),
(204, 67, 0, 9, 0, 1, 80000),
(205, 67, 0, 62, 0, 1, 75000),
(206, 68, 33, 0, 1, 0, 195000),
(207, 68, 0, 63, 0, 1, 75000),
(208, 68, 0, 45, 0, 1, 65000),
(209, 70, 31, 0, 1, 0, 330000),
(210, 71, 34, 0, 1, 0, 285000),
(211, 71, 0, 86, 0, 1, 50000),
(214, 73, 47, 0, 1, 0, 480000),
(215, 73, 0, 8, 0, 1, 80000),
(216, 73, 0, 54, 0, 1, 60000),
(217, 72, 34, 0, 1, 0, 285000),
(218, 72, 0, 79, 0, 1, 85000),
(219, 72, 0, 77, 0, 1, 70000),
(220, 72, 0, 68, 0, 1, 60000),
(221, 72, 0, 80, 0, 1, 90000),
(222, 72, 0, 17, 0, 1, 90000),
(223, 72, 0, 74, 0, 1, 85000),
(236, 75, 34, 0, 1, 0, 285000),
(237, 75, 48, 0, 1, 0, 50000),
(238, 75, 49, 0, 1, 0, 15000),
(248, 76, 47, 0, 1, 0, 530000),
(249, 77, 47, 0, 1, 0, 530000),
(250, 77, 0, 56, 0, 1, 70000),
(251, 77, 0, 79, 0, 1, 85000),
(252, 77, 0, 17, 0, 1, 90000),
(253, 77, 0, 74, 0, 1, 85000),
(254, 77, 0, 80, 0, 1, 90000),
(255, 77, 0, 81, 0, 1, 60000),
(256, 77, 0, 83, 0, 1, 100000),
(257, 77, 0, 36, 0, 1, 75000),
(258, 77, 0, 87, 0, 1, 50000),
(263, 80, 51, 0, 1, 0, 850000),
(264, 79, 51, 0, 1, 0, 850000),
(265, 78, 51, 0, 1, 0, 850000),
(266, 80, 0, 15, 0, 1, 95000),
(267, 81, 0, 89, 0, 1, 75000),
(268, 82, 35, 0, 1, 0, 330000),
(269, 82, 0, 61, 0, 1, 75000),
(270, 82, 0, 80, 0, 1, 90000),
(271, 82, 0, 74, 0, 1, 85000),
(272, 82, 0, 93, 0, 1, 60000),
(273, 82, 0, 94, 0, 1, 60000),
(274, 84, 34, 0, 1, 0, 285000),
(276, 84, 0, 61, 0, 1, 75000),
(277, 84, 0, 74, 0, 1, 85000),
(280, 84, 0, 17, 0, 1, 90000),
(281, 85, 0, 6, 0, 1, 60000),
(282, 85, 0, 4, 0, 1, 90000),
(283, 86, 0, 6, 0, 1, 60000),
(284, 86, 0, 4, 0, 1, 90000),
(285, 86, 0, 95, 0, 1, 75000),
(287, 91, 53, 0, 1, 0, 75000),
(288, 90, 52, 0, 1, 0, 75000),
(289, 92, 16, 0, 1, 0, 480000),
(292, 92, 0, 91, 0, 1, 60000),
(293, 92, 0, 83, 0, 1, 100000),
(294, 93, 16, 0, 1, 0, 480000),
(295, 93, 0, 8, 0, 1, 80000),
(296, 93, 0, 15, 0, 1, 95000),
(297, 94, 0, 80, 0, 1, 90000),
(298, 94, 0, 62, 0, 1, 75000),
(299, 94, 0, 93, 0, 1, 60000),
(300, 94, 0, 74, 0, 1, 85000),
(301, 95, 0, 65, 0, 1, 70000),
(302, 95, 0, 27, 0, 1, 90000),
(303, 95, 0, 1, 0, 1, 60000),
(304, 96, 0, 79, 0, 1, 85000),
(305, 96, 0, 77, 0, 1, 70000),
(306, 96, 0, 74, 0, 1, 85000),
(307, 96, 0, 73, 0, 1, 90000),
(308, 96, 0, 93, 0, 1, 60000),
(309, 96, 0, 17, 0, 1, 90000),
(310, 97, 34, 0, 1, 0, 285000),
(312, 97, 0, 17, 0, 1, 90000),
(313, 98, 37, 0, 1, 0, 265000),
(314, 98, 0, 77, 0, 1, 70000),
(315, 98, 0, 57, 0, 1, 60000),
(316, 98, 0, 95, 0, 1, 75000),
(317, 98, 0, 8, 0, 1, 80000),
(318, 98, 0, 97, 0, 1, 85000),
(319, 98, 0, 15, 0, 1, 95000),
(320, 99, 33, 0, 1, 0, 195000),
(321, 99, 0, 56, 0, 1, 70000),
(322, 99, 0, 57, 0, 1, 60000),
(323, 99, 0, 95, 0, 1, 75000),
(324, 99, 0, 8, 0, 1, 80000),
(325, 99, 0, 98, 0, 1, 85000),
(326, 99, 0, 100, 0, 1, 95000),
(327, 100, 0, 8, 0, 1, 80000),
(328, 100, 0, 1, 0, 1, 60000),
(329, 100, 0, 89, 0, 1, 75000),
(330, 101, 0, 100, 0, 1, 95000),
(331, 101, 0, 31, 0, 1, 100000),
(332, 101, 0, 53, 0, 1, 100000),
(333, 101, 0, 101, 0, 1, 100000),
(334, 102, 35, 0, 1, 0, 330000),
(335, 102, 0, 93, 0, 1, 60000),
(337, 102, 0, 78, 0, 1, 75000),
(338, 102, 0, 80, 0, 1, 90000),
(339, 103, 54, 0, 1, 0, 95000),
(340, 104, 54, 0, 1, 0, 95000),
(341, 105, 33, 0, 1, 0, 195000),
(342, 105, 0, 95, 0, 1, 75000),
(343, 105, 0, 1, 0, 1, 60000),
(344, 106, 1, 0, 1, 0, 150000),
(345, 107, 37, 0, 1, 0, 265000),
(346, 108, 0, 1, 0, 1, 60000),
(347, 108, 0, 13, 0, 1, 80000),
(348, 108, 0, 56, 0, 1, 70000),
(349, 108, 0, 64, 0, 1, 70000),
(350, 108, 0, 89, 0, 1, 75000),
(351, 108, 0, 7, 0, 1, 50000),
(352, 109, 0, 56, 0, 1, 70000),
(353, 109, 0, 79, 0, 1, 90000),
(354, 109, 0, 30, 0, 1, 170000),
(355, 109, 0, 8, 0, 1, 80000),
(356, 109, 0, 9, 0, 1, 80000),
(357, 109, 0, 7, 0, 1, 50000),
(358, 109, 0, 89, 0, 1, 75000),
(360, 110, 0, 93, 0, 1, 60000),
(361, 110, 0, 91, 0, 1, 60000),
(362, 110, 0, 78, 0, 1, 75000),
(363, 110, 0, 79, 0, 1, 90000),
(364, 110, 34, 0, 1, 0, 285000),
(365, 111, 34, 0, 1, 0, 285000),
(366, 111, 0, 93, 0, 1, 60000),
(367, 111, 0, 91, 0, 1, 60000),
(368, 111, 0, 78, 0, 1, 75000),
(369, 111, 0, 79, 0, 1, 90000),
(370, 111, 0, 17, 0, 1, 90000),
(371, 112, 0, 64, 0, 1, 70000),
(372, 113, 34, 0, 1, 0, 285000),
(373, 114, 33, 0, 1, 0, 195000),
(374, 114, 0, 56, 0, 1, 70000),
(375, 114, 0, 57, 0, 1, 60000),
(376, 114, 0, 95, 0, 1, 75000),
(377, 114, 0, 100, 0, 1, 95000),
(378, 114, 0, 1, 0, 1, 60000),
(379, 114, 0, 10, 0, 1, 105000),
(381, 115, 0, 9, 0, 3, 240000),
(382, 115, 0, 27, 0, 2, 180000),
(383, 115, 0, 11, 0, 1, 100000),
(384, 118, 0, 60, 0, 1, 75000),
(385, 118, 0, 79, 0, 1, 90000),
(386, 118, 0, 1, 0, 1, 60000),
(387, 118, 0, 17, 0, 1, 90000),
(388, 119, 33, 0, 1, 0, 195000),
(389, 119, 0, 95, 0, 1, 85000),
(390, 120, 0, 8, 0, 1, 85000),
(391, 120, 0, 95, 0, 1, 85000),
(392, 120, 0, 64, 0, 1, 70000),
(393, 120, 0, 5, 0, 1, 115000),
(394, 121, 0, 77, 0, 1, 70000),
(395, 121, 0, 79, 0, 1, 90000),
(396, 121, 0, 17, 0, 1, 90000),
(397, 121, 0, 95, 0, 1, 85000),
(398, 121, 0, 74, 0, 1, 85000),
(399, 121, 0, 91, 0, 1, 60000),
(400, 121, 0, 93, 0, 1, 60000),
(401, 122, 1, 0, 1, 0, 150000),
(402, 123, 0, 56, 0, 1, 70000),
(403, 123, 0, 95, 0, 1, 85000),
(404, 123, 0, 68, 0, 1, 60000),
(405, 123, 0, 72, 0, 1, 85000),
(406, 124, 15, 0, 1, 0, 245000),
(407, 124, 0, 95, 0, 2, 170000),
(408, 124, 0, 89, 0, 1, 75000),
(409, 124, 0, 91, 0, 1, 60000),
(410, 124, 0, 64, 0, 1, 70000),
(411, 124, 0, 56, 0, 2, 140000),
(412, 124, 0, 8, 0, 1, 85000),
(413, 124, 0, 7, 0, 1, 50000),
(414, 124, 0, 100, 0, 1, 95000),
(415, 124, 0, 72, 0, 1, 85000),
(416, 125, 1, 0, 1, 0, 150000),
(417, 126, 1, 0, 1, 0, 150000),
(418, 126, 0, 95, 0, 1, 85000),
(419, 126, 0, 8, 0, 1, 85000),
(420, 127, 15, 0, 1, 0, 245000),
(421, 127, 0, 95, 0, 1, 85000),
(422, 127, 0, 96, 0, 1, 90000),
(423, 128, 26, 0, 1, 0, 425000),
(424, 128, 0, 17, 0, 1, 90000),
(425, 128, 0, 79, 0, 1, 90000),
(426, 128, 0, 80, 0, 1, 90000),
(427, 129, 1, 0, 1, 0, 150000),
(428, 129, 0, 18, 0, 1, 75000),
(429, 130, 2, 0, 1, 0, 95000),
(431, 131, 35, 0, 1, 0, 330000),
(432, 132, 35, 0, 1, 0, 330000),
(433, 133, 0, 95, 0, 1, 85000),
(434, 133, 0, 89, 0, 1, 75000),
(435, 133, 0, 56, 0, 1, 70000),
(436, 133, 0, 57, 0, 1, 60000),
(437, 133, 0, 98, 0, 1, 75000),
(438, 133, 0, 59, 0, 1, 80000),
(439, 134, 0, 77, 0, 1, 70000),
(440, 134, 0, 78, 0, 1, 75000),
(441, 134, 0, 79, 0, 1, 90000),
(442, 134, 0, 80, 0, 1, 90000),
(443, 134, 0, 68, 0, 1, 60000),
(444, 134, 0, 74, 0, 1, 85000),
(445, 134, 0, 17, 0, 1, 90000),
(446, 135, 0, 56, 0, 1, 70000),
(447, 135, 0, 57, 0, 1, 60000),
(449, 135, 0, 6, 0, 1, 60000),
(450, 135, 0, 4, 0, 1, 90000),
(451, 135, 0, 95, 0, 1, 85000),
(452, 135, 0, 8, 0, 1, 85000),
(453, 136, 0, 77, 0, 1, 70000),
(454, 136, 0, 79, 0, 1, 90000),
(455, 136, 0, 78, 0, 1, 75000),
(456, 136, 0, 96, 0, 1, 90000),
(457, 136, 0, 74, 0, 1, 85000),
(458, 136, 0, 80, 0, 1, 90000),
(459, 136, 0, 93, 0, 1, 60000),
(460, 136, 55, 0, 1, 0, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_treatment`
--

CREATE TABLE `detail_treatment` (
  `id_detailtreatment` int(11) NOT NULL,
  `id_treatment` int(11) NOT NULL,
  `nm_treatment` varchar(30) NOT NULL,
  `harga_treatment` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_treatment`
--

INSERT INTO `detail_treatment` (`id_detailtreatment`, `id_treatment`, `nm_treatment`, `harga_treatment`) VALUES
(1, 1, 'Facial 5 in 1', 150000),
(2, 1, 'Facial Detox + Totok + 02', 95000),
(3, 1, 'Facial Coffee + Totok + 02', 95000),
(4, 1, 'Facial White Chocolate + Totok', 95000),
(5, 1, 'Facial Yogurt + Totok + 02', 95000),
(6, 1, 'Facial Biasa + Totok + Serum', 115000),
(7, 1, 'Facial Calm &amp; Cool+Totok', 130000),
(8, 1, 'Facial Pusifying + Totok + 02', 130000),
(9, 1, 'Facial Cacao Mask + Totok + 02', 130000),
(10, 1, 'Facial Charcoal + Totok + 02', 130000),
(11, 1, 'Facial Mask Gold+Totok+Serum', 135000),
(12, 1, 'Facial Colagen + Totok', 150000),
(13, 1, 'Facial Colagen Gold', 180000),
(14, 1, 'Facial Peel Off+Totok+Serum', 185000),
(15, 2, 'Totok+Peeling AHA', 245000),
(16, 2, 'Peeling Clarifying+Peeling AHA', 480000),
(17, 2, 'Totok+Peeling+Clarifying', 335000),
(18, 2, 'Totok+Peeling Bluepeel Radian', 380000),
(19, 2, 'Microdermabrasi+Facial Glowing', 185000),
(20, 2, 'Microdermabrasi+Masker Colagen', 235000),
(21, 2, 'Microdermabrasi+peeling Clarif', 420000),
(22, 2, 'Microdermabrasi+Detox Platinum', 365000),
(23, 2, 'Microdermabrasi+Masker Gold Co', 258000),
(24, 2, 'Radio Frequency (RF)+totok', 400000),
(25, 2, 'Radio Frequency+Totok+Masker C', 500000),
(26, 2, 'Detox Platinum+Peeling AHA', 460000),
(27, 2, 'Facial Aqua Peel+Totok', 385000),
(28, 2, 'Facial Aqua Peel+Peeling Aha', 525000),
(29, 2, 'Facial Aqua Peel+Totok Colagen', 430000),
(30, 2, 'Ultrasonic+Totok', 185000),
(31, 2, 'Ultrasonic+Peeling AHA', 330000),
(32, 2, 'Microdermabrasi+Ultrasonic+Ser', 270000),
(33, 3, 'Peeling AHA', 195000),
(34, 3, 'Peeling Clarifying', 285000),
(35, 3, 'Peeling Blue Peel Radian', 330000),
(36, 3, 'Peeling Acayberry', 125000),
(37, 3, 'Detok Platinum', 265000),
(38, 3, 'Facial Aqua Peel', 330000),
(39, 4, 'Radio Frequency (RF)', 330000),
(40, 4, 'Microdermabration + Vit C', 135000),
(41, 4, 'Microdermabration + Collagen', 235000),
(42, 4, 'Ultrasound + vit c', 135000),
(43, 4, 'Ultrasound + Collagen', 235000),
(44, 4, 'BB Glow + Collagen', 230000),
(45, 4, 'BB Glow + Collagen + Oksigen', 265000),
(46, 4, 'Aqua Peel', 330000),
(47, 2, 'Peeling Kombinasi + totok', 530000),
(48, 6, 'Masker Detox', 50000),
(49, 6, 'Extrecsi', 15000),
(50, 4, 'Microdermabrasi + Peeling AHA', 380000),
(51, 4, 'Infus Glowing', 850000),
(52, 1, 'FACIAL SULFUR', 75000),
(53, 1, 'Facial Vit.C', 75000),
(54, 1, 'Facial Glowing', 95000),
(55, 3, 'Peeling Acne', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nm_dokter` varchar(50) NOT NULL,
  `jk_dokter` enum('L','P') NOT NULL,
  `tempatlahir_dokter` varchar(30) NOT NULL,
  `tanggallahir_dokter` date NOT NULL,
  `alamat_dokter` text NOT NULL,
  `notelp_dokter` varchar(13) NOT NULL,
  `email_dokter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nm_dokter`, `jk_dokter`, `tempatlahir_dokter`, `tanggallahir_dokter`, `alamat_dokter`, `notelp_dokter`, `email_dokter`) VALUES
(1, 'Lina Nuryani', 'P', 'Semarang', '1972-08-11', 'Dayeuh Luhur', '082249526006', 'Linanuryani72@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_dokter`
--

CREATE TABLE `jadwal_dokter` (
  `id_jadwaldokter` int(11) NOT NULL,
  `id_dokter` varchar(50) NOT NULL,
  `hari` varchar(13) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `notifikasi` enum('Menyimpan Data','Memperbaharui Data','Menghapus Data') NOT NULL,
  `tabel` varchar(20) NOT NULL,
  `waktu_simpan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `id_admin`, `notifikasi`, `tabel`, `waktu_simpan`) VALUES
(1, 1, 'Menyimpan Data', 'Detail Penjualan', '2021-06-01 10:40:15'),
(2, 1, 'Menghapus Data', 'Detail Penjualan', '2021-06-01 10:40:28'),
(3, 2, 'Menyimpan Data', 'Penjualan', '2021-06-05 10:21:36'),
(4, 2, 'Menghapus Data', 'Penjualan', '2021-06-05 10:21:58'),
(5, 2, 'Menyimpan Data', 'Penjualan', '2021-06-05 10:22:37'),
(6, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-05 05:23:08'),
(7, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-05 05:23:25'),
(8, 2, 'Menyimpan Data', 'Penjualan', '2021-06-05 12:59:59'),
(9, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-05 08:00:17'),
(10, 2, 'Memperbaharui Data', 'Produk', '2021-06-05 08:00:46'),
(11, 2, 'Memperbaharui Data', 'Produk', '2021-06-05 08:00:50'),
(12, 2, 'Memperbaharui Data', 'Produk', '2021-06-05 08:00:56'),
(13, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-05 08:01:16'),
(14, 2, 'Memperbaharui Data', 'Produk', '2021-06-05 08:01:46'),
(15, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-05 08:02:05'),
(16, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-05 08:02:25'),
(17, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-05 08:02:39'),
(18, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-05 08:02:54'),
(19, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-05 08:03:11'),
(20, 1, 'Menghapus Data', 'Detail Penjualan', '2021-06-05 08:03:23'),
(21, 2, 'Memperbaharui Data', 'Produk', '2021-06-05 08:04:01'),
(22, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-05 08:04:31'),
(23, 1, 'Menghapus Data', 'Detail Penjualan', '2021-06-05 08:14:07'),
(24, 2, 'Menyimpan Data', 'Produk', '2021-06-05 08:15:05'),
(25, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-05 08:15:20'),
(26, 2, 'Menyimpan Data', 'Penjualan', '2021-06-05 13:30:00'),
(27, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-05 08:30:12'),
(28, 2, 'Menyimpan Data', 'Penjualan', '2021-06-05 13:54:15'),
(29, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-05 08:54:35'),
(30, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-05 08:55:08'),
(31, 2, 'Memperbaharui Data', 'Produk', '2021-06-05 08:55:50'),
(32, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-05 08:56:06'),
(33, 2, 'Menyimpan Data', 'Produk', '2021-06-05 08:57:30'),
(34, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-05 08:57:57'),
(35, 2, 'Memperbaharui Data', 'Produk', '2021-06-05 08:58:32'),
(36, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-05 08:58:53'),
(37, 2, 'Menyimpan Data', 'Produk', '2021-06-05 08:59:30'),
(38, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-05 08:59:54'),
(39, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-05 09:00:08'),
(40, 1, 'Menghapus Data', 'Detail Penjualan', '2021-06-05 09:08:21'),
(41, 2, 'Menyimpan Data', 'Penjualan', '2021-06-05 14:41:28'),
(42, 2, 'Menyimpan Data', 'Penjualan', '2021-06-05 15:53:20'),
(43, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-05 10:53:41'),
(44, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-05 10:53:57'),
(45, 2, 'Menyimpan Data', 'Penjualan', '2021-06-06 12:49:03'),
(46, 2, 'Menyimpan Data', 'Penjualan', '2021-06-08 10:50:57'),
(47, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-08 05:51:15'),
(48, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-08 05:51:31'),
(49, 2, 'Memperbaharui Data', 'Produk', '2021-06-08 05:52:06'),
(50, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-08 05:52:29'),
(51, 2, 'Memperbaharui Data', 'Produk', '2021-06-08 05:52:49'),
(52, 2, 'Memperbaharui Data', 'Produk', '2021-06-08 05:53:18'),
(53, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-08 05:53:34'),
(54, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-08 05:54:06'),
(55, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-08 05:54:20'),
(56, 2, 'Menyimpan Data', 'Penjualan', '2021-06-09 10:23:18'),
(57, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-09 05:24:35'),
(58, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-09 05:25:15'),
(59, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-09 05:26:17'),
(60, 2, 'Menghapus Data', 'Penjualan', '2021-06-09 10:27:41'),
(61, 2, 'Menyimpan Data', 'Penjualan', '2021-06-09 10:30:27'),
(62, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-09 05:30:51'),
(63, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-09 05:31:25'),
(64, 2, 'Menyimpan Data', 'Produk', '2021-06-09 05:33:31'),
(65, 2, 'Menghapus Data', 'Produk', '2021-06-09 05:33:54'),
(66, 2, 'Menyimpan Data', 'Penjualan', '2021-06-09 12:08:18'),
(67, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-09 07:21:18'),
(68, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-09 07:22:05'),
(69, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-09 07:22:28'),
(70, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-09 07:22:49'),
(71, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-09 07:23:19'),
(72, 2, 'Menyimpan Data', 'Penjualan', '2021-06-09 13:32:22'),
(73, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-09 08:34:47'),
(74, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-09 08:39:02'),
(75, 2, 'Menyimpan Data', 'Penjualan', '2021-06-09 14:53:08'),
(76, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-09 09:53:45'),
(77, 2, 'Menyimpan Data', 'Produk', '2021-06-09 09:55:04'),
(78, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-09 09:55:31'),
(79, 1, 'Menghapus Data', 'Detail Penjualan', '2021-06-09 09:55:46'),
(80, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-09 09:56:19'),
(81, 2, 'Memperbaharui Data', 'Produk', '2021-06-10 04:17:06'),
(82, 2, 'Memperbaharui Data', 'Produk', '2021-06-10 04:17:54'),
(83, 2, 'Menyimpan Data', 'Penjualan', '2021-06-10 09:19:28'),
(84, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-10 04:20:50'),
(85, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-10 04:21:15'),
(86, 2, 'Menghapus Data', 'Penjualan', '2021-06-10 09:23:14'),
(87, 2, 'Menyimpan Data', 'Penjualan', '2021-06-10 14:50:59'),
(88, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-10 09:55:05'),
(89, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-10 09:55:34'),
(90, 2, 'Menyimpan Data', 'Penjualan', '2021-06-10 15:22:09'),
(91, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-10 10:24:32'),
(92, 2, 'Menyimpan Data', 'Penjualan', '2021-06-10 18:12:14'),
(93, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-10 13:14:54'),
(94, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-10 13:16:03'),
(95, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-10 13:16:41'),
(96, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-10 13:18:18'),
(97, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-10 13:19:15'),
(98, 2, 'Menyimpan Data', 'Penjualan', '2021-06-10 18:24:34'),
(99, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-10 13:27:32'),
(100, 2, 'Menyimpan Data', 'Penjualan', '2021-06-10 18:30:12'),
(101, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-10 13:31:30'),
(102, 2, 'Menyimpan Data', 'Penjualan', '2021-06-11 11:09:56'),
(103, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-11 06:10:26'),
(104, 2, 'Menyimpan Data', 'Penjualan', '2021-06-11 12:05:08'),
(105, 2, 'Menyimpan Data', 'Penjualan', '2021-06-11 12:06:19'),
(106, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-11 07:08:57'),
(107, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-11 07:10:37'),
(108, 2, 'Menyimpan Data', 'Penjualan', '2021-06-11 12:35:19'),
(109, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-11 07:36:48'),
(110, 2, 'Memperbaharui Data', 'Produk', '2021-06-11 07:38:36'),
(111, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-11 07:39:23'),
(112, 2, 'Menyimpan Data', 'Penjualan', '2021-06-11 13:37:29'),
(113, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-11 09:15:45'),
(114, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-11 09:16:08'),
(115, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-11 09:16:26'),
(116, 2, 'Memperbaharui Data', 'Produk', '2021-06-11 09:16:52'),
(117, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-11 09:17:08'),
(118, 2, 'Memperbaharui Data', 'Produk', '2021-06-11 09:17:31'),
(119, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-11 09:17:51'),
(120, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-11 09:18:07'),
(121, 2, 'Menyimpan Data', 'Penjualan', '2021-06-11 15:22:58'),
(122, 2, 'Menghapus Data', 'Penjualan', '2021-06-11 15:23:28'),
(123, 2, 'Menyimpan Data', 'Penjualan', '2021-06-11 15:23:59'),
(124, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-11 10:44:50'),
(125, 2, 'Menyimpan Data', 'Penjualan', '2021-06-11 16:32:00'),
(126, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-11 11:33:26'),
(127, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-11 11:35:11'),
(128, 2, 'Menyimpan Data', 'Penjualan', '2021-06-11 17:01:56'),
(129, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-11 12:02:17'),
(130, 2, 'Menyimpan Data', 'Penjualan', '2021-06-11 17:12:41'),
(131, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-11 12:13:42'),
(132, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-11 12:14:00'),
(133, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-11 12:14:18'),
(134, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-11 12:14:36'),
(135, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-11 12:15:03'),
(136, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-11 12:15:31'),
(137, 1, 'Menghapus Data', 'Detail Penjualan', '2021-06-11 12:15:48'),
(138, 2, 'Menyimpan Data', 'Penjualan', '2021-06-11 17:39:41'),
(139, 2, 'Menghapus Data', 'Penjualan', '2021-06-11 17:41:04'),
(140, 2, 'Menyimpan Data', 'Penjualan', '2021-06-18 11:41:33'),
(141, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-18 06:43:16'),
(142, 2, 'Menyimpan Data', 'Produk', '2021-06-18 06:45:59'),
(143, 2, 'Menyimpan Data', 'Produk', '2021-06-18 06:46:24'),
(144, 2, 'Menyimpan Data', 'Produk', '2021-06-18 06:46:45'),
(145, 2, 'Menyimpan Data', 'Produk', '2021-06-18 06:47:13'),
(146, 2, 'Menyimpan Data', 'Produk', '2021-06-18 06:47:38'),
(147, 2, 'Menyimpan Data', 'Produk', '2021-06-18 06:48:03'),
(148, 2, 'Menyimpan Data', 'Produk', '2021-06-18 06:48:35'),
(149, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-18 06:49:04'),
(150, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-18 06:49:15'),
(151, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-18 06:49:30'),
(152, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-18 06:49:47'),
(153, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-18 06:49:58'),
(154, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-18 06:50:14'),
(155, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-18 06:50:39'),
(156, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-18 06:50:55'),
(157, 2, 'Menyimpan Data', 'Produk', '2021-06-18 06:51:23'),
(158, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-18 06:51:45'),
(159, 2, 'Menyimpan Data', 'Penjualan', '2021-06-18 16:14:32'),
(160, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-18 11:16:20'),
(161, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-18 11:17:22'),
(162, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-18 11:17:48'),
(163, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-18 11:18:56'),
(164, 2, 'Memperbaharui Data', 'Produk', '2021-06-18 11:20:55'),
(165, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-18 11:21:32'),
(166, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-18 11:22:41'),
(167, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-18 11:23:25'),
(168, 1, 'Menghapus Data', 'Detail Penjualan', '2021-06-18 11:23:41'),
(169, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-18 11:24:14'),
(170, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-18 11:25:07'),
(171, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-18 11:25:36'),
(172, 2, 'Menghapus Data', 'Penjualan', '2021-06-18 16:28:32'),
(173, 2, 'Menyimpan Data', 'Penjualan', '2021-06-18 16:31:00'),
(174, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-18 11:31:28'),
(175, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-18 11:33:22'),
(176, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-18 11:33:50'),
(177, 2, 'Menghapus Data', 'Penjualan', '2021-06-18 16:34:25'),
(178, 2, 'Menyimpan Data', 'Penjualan', '2021-06-18 17:30:41'),
(179, 2, 'Menghapus Data', 'Penjualan', '2021-06-18 17:30:56'),
(180, 2, 'Menyimpan Data', 'Penjualan', '2021-06-18 17:32:11'),
(181, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-18 12:33:35'),
(182, 2, 'Menghapus Data', 'Penjualan', '2021-06-18 17:38:41'),
(183, 2, 'Menyimpan Data', 'Penjualan', '2021-06-21 11:28:04'),
(184, 2, 'Menyimpan Data', 'Penjualan', '2021-06-21 11:28:59'),
(185, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 06:29:29'),
(186, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 06:29:43'),
(187, 2, 'Menghapus Data', 'Detail Penjualan', '2021-06-21 06:32:20'),
(188, 2, 'Menghapus Data', 'Detail Penjualan', '2021-06-21 06:32:29'),
(189, 2, 'Menyimpan Data', 'Detail Treatment', '2021-06-21 06:33:33'),
(190, 2, 'Memperbaharui Data', 'Detail Treatment', '2021-06-21 06:34:45'),
(191, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 06:35:03'),
(192, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 06:35:13'),
(193, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 06:35:24'),
(194, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 06:35:50'),
(195, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 06:36:06'),
(196, 2, 'Menghapus Data', 'Produk', '2021-06-21 06:36:55'),
(197, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 06:37:17'),
(198, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 06:37:31'),
(199, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 06:37:59'),
(200, 2, 'Memperbaharui Data', 'Produk', '2021-06-21 06:38:24'),
(201, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 06:38:52'),
(202, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 06:39:20'),
(203, 2, 'Menghapus Data', 'Produk', '2021-06-21 06:39:55'),
(204, 2, 'Menyimpan Data', 'Penjualan', '2021-06-21 14:07:37'),
(205, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:07:50'),
(206, 2, 'Menyimpan Data', 'Treatment', '2021-06-21 09:08:24'),
(207, 2, 'Menyimpan Data', 'Detail Treatment', '2021-06-21 09:09:08'),
(208, 2, 'Menyimpan Data', 'Detail Treatment', '2021-06-21 09:10:16'),
(209, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:10:46'),
(210, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:10:55'),
(211, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:11:12'),
(212, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:11:25'),
(213, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:11:41'),
(214, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:11:57'),
(215, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:12:08'),
(216, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:12:21'),
(217, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:12:34'),
(218, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:12:46'),
(219, 2, 'Menghapus Data', 'Detail Penjualan', '2021-06-21 09:14:31'),
(220, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:14:45'),
(221, 2, 'Menghapus Data', 'Detail Penjualan', '2021-06-21 09:15:49'),
(222, 2, 'Menghapus Data', 'Detail Penjualan', '2021-06-21 09:16:01'),
(223, 2, 'Menghapus Data', 'Detail Penjualan', '2021-06-21 09:16:14'),
(224, 2, 'Menyimpan Data', 'Penjualan', '2021-06-21 14:17:41'),
(225, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:17:52'),
(226, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:18:01'),
(227, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:18:10'),
(228, 2, 'Menyimpan Data', 'Produk', '2021-06-21 09:19:04'),
(229, 2, 'Menyimpan Data', 'Produk', '2021-06-21 09:19:38'),
(230, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:19:56'),
(231, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:20:05'),
(232, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:20:23'),
(233, 1, 'Menghapus Data', 'Detail Penjualan', '2021-06-21 09:20:29'),
(234, 2, 'Memperbaharui Data', 'Produk', '2021-06-21 09:21:02'),
(235, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:21:19'),
(236, 2, 'Menghapus Data', 'Penjualan', '2021-06-21 14:23:49'),
(237, 2, 'Menghapus Data', 'Detail Penjualan', '2021-06-21 09:33:51'),
(238, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:35:00'),
(239, 2, 'Menghapus Data', 'Treatment', '2021-06-21 09:37:06'),
(240, 2, 'Memperbaharui Data', 'Detail Treatment', '2021-06-21 09:38:17'),
(241, 2, 'Menghapus Data', 'Detail Penjualan', '2021-06-21 09:38:26'),
(242, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:38:36'),
(243, 2, 'Menghapus Data', 'Detail Penjualan', '2021-06-21 09:46:17'),
(244, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:46:49'),
(245, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:47:37'),
(246, 1, 'Menghapus Data', 'Detail Penjualan', '2021-06-21 09:48:03'),
(247, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:48:37'),
(248, 2, 'Menghapus Data', 'Detail Penjualan', '2021-06-21 09:48:54'),
(249, 2, 'Menyimpan Data', 'Penjualan', '2021-06-21 14:49:17'),
(250, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:49:35'),
(251, 2, 'Menghapus Data', 'Penjualan', '2021-06-21 14:50:20'),
(252, 2, 'Menyimpan Data', 'Penjualan', '2021-06-21 14:52:44'),
(253, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:53:30'),
(254, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:53:42'),
(255, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:53:55'),
(256, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:54:07'),
(257, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:54:23'),
(258, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:54:36'),
(259, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:54:54'),
(260, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:55:10'),
(261, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:55:25'),
(262, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:56:08'),
(263, 2, 'Memperbaharui Data', 'Produk', '2021-06-21 09:56:38'),
(264, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-21 09:57:05'),
(265, 1, 'Menghapus Data', 'Detail Penjualan', '2021-06-21 09:59:24'),
(266, 1, 'Menghapus Data', 'Detail Penjualan', '2021-06-21 09:59:34'),
(267, 1, 'Menghapus Data', 'Detail Penjualan', '2021-06-21 09:59:43'),
(268, 1, 'Menghapus Data', 'Detail Penjualan', '2021-06-21 09:59:51'),
(269, 1, 'Menghapus Data', 'Detail Penjualan', '2021-06-21 10:00:02'),
(270, 1, 'Menghapus Data', 'Detail Penjualan', '2021-06-21 10:00:12'),
(271, 1, 'Menghapus Data', 'Detail Penjualan', '2021-06-21 10:29:04'),
(272, 1, 'Menghapus Data', 'Detail Penjualan', '2021-06-21 10:29:18'),
(273, 1, 'Menghapus Data', 'Detail Penjualan', '2021-06-21 10:29:29'),
(274, 1, 'Menghapus Data', 'Detail Penjualan', '2021-06-21 10:29:41'),
(275, 1, 'Menghapus Data', 'Detail Penjualan', '2021-06-21 10:30:00'),
(276, 2, 'Menghapus Data', 'Detail Penjualan', '2021-06-21 10:30:12'),
(277, 2, 'Menghapus Data', 'Penjualan', '2021-06-21 15:30:17'),
(278, 2, 'Menyimpan Data', 'Penjualan', '2021-06-22 16:38:50'),
(279, 2, 'Menyimpan Data', 'Penjualan', '2021-06-22 16:39:33'),
(280, 2, 'Menyimpan Data', 'Penjualan', '2021-06-22 16:40:02'),
(281, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-22 11:40:18'),
(282, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-22 11:40:34'),
(283, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-22 11:41:40'),
(284, 2, 'Menghapus Data', 'Treatment', '2021-06-22 11:42:29'),
(285, 2, 'Menyimpan Data', 'Detail Treatment', '2021-06-22 11:43:09'),
(286, 2, 'Memperbaharui Data', 'Detail Treatment', '2021-06-22 11:43:46'),
(287, 2, 'Menyimpan Data', 'Detail Treatment', '2021-06-23 06:09:43'),
(288, 2, 'Menghapus Data', 'Detail Penjualan', '2021-06-23 06:10:02'),
(289, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-23 06:12:49'),
(290, 1, 'Menghapus Data', 'Detail Penjualan', '2021-06-23 06:13:14'),
(291, 2, 'Menghapus Data', 'Detail Penjualan', '2021-06-23 06:13:21'),
(292, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-23 06:13:34'),
(293, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-23 06:14:10'),
(294, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-06-23 06:53:07'),
(295, 2, 'Menyimpan Data', 'Penjualan', '2021-07-01 15:59:54'),
(296, 2, 'Menyimpan Data', 'Produk', '2021-07-01 11:00:30'),
(297, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-01 11:00:53'),
(298, 2, 'Menyimpan Data', 'Penjualan', '2021-07-03 12:15:57'),
(299, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-03 07:16:27'),
(300, 2, 'Menyimpan Data', 'Produk', '2021-07-03 07:17:30'),
(301, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-03 07:18:39'),
(302, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-03 07:19:05'),
(303, 2, 'Menyimpan Data', 'Produk', '2021-07-03 07:21:01'),
(304, 2, 'Menyimpan Data', 'Produk', '2021-07-03 07:21:33'),
(305, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-03 07:22:30'),
(306, 2, 'Memperbaharui Data', 'Produk', '2021-07-03 07:23:19'),
(307, 2, 'Menyimpan Data', 'Produk', '2021-07-03 07:24:00'),
(308, 2, 'Menyimpan Data', 'Produk', '2021-07-03 07:24:29'),
(309, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-03 07:25:11'),
(310, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-03 07:25:27'),
(311, 2, 'Menghapus Data', 'Produk', '2021-07-03 07:32:11'),
(312, 2, 'Menghapus Data', 'Produk', '2021-07-03 07:32:38'),
(313, 2, 'Menyimpan Data', 'Penjualan', '2021-07-03 14:21:11'),
(314, 2, 'Menghapus Data', 'Penjualan', '2021-07-03 14:22:35'),
(315, 2, 'Menyimpan Data', 'Penjualan', '2021-07-03 14:23:34'),
(316, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-03 09:24:00'),
(317, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-03 09:24:26'),
(318, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-03 09:24:54'),
(319, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-03 09:25:14'),
(320, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-03 09:25:30'),
(321, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-03 09:25:53'),
(322, 2, 'Memperbaharui Data', 'Produk', '2021-07-03 09:40:24'),
(323, 2, 'Memperbaharui Data', 'Produk', '2021-07-03 09:42:26'),
(324, 2, 'Memperbaharui Data', 'Produk', '2021-07-03 09:43:19'),
(325, 2, 'Memperbaharui Data', 'Produk', '2021-07-03 09:43:43'),
(326, 2, 'Memperbaharui Data', 'Produk', '2021-07-03 09:43:58'),
(327, 2, 'Memperbaharui Data', 'Produk', '2021-07-03 09:44:24'),
(328, 2, 'Memperbaharui Data', 'Produk', '2021-07-03 09:44:46'),
(329, 2, 'Memperbaharui Data', 'Produk', '2021-07-03 09:45:17'),
(330, 2, 'Memperbaharui Data', 'Produk', '2021-07-03 09:45:50'),
(331, 2, 'Memperbaharui Data', 'Produk', '2021-07-03 09:46:32'),
(332, 2, 'Menghapus Data', 'Produk', '2021-07-03 09:46:49'),
(333, 2, 'Menghapus Data', 'Produk', '2021-07-03 09:48:03'),
(334, 2, 'Memperbaharui Data', 'Produk', '2021-07-03 09:49:12'),
(335, 2, 'Menghapus Data', 'Produk', '2021-07-03 09:49:42'),
(336, 2, 'Memperbaharui Data', 'Produk', '2021-07-03 09:50:25'),
(337, 1, 'Menghapus Data', 'Detail Penjualan', '2021-07-03 10:06:09'),
(338, 1, 'Menghapus Data', 'Detail Penjualan', '2021-07-03 10:06:24'),
(339, 1, 'Menghapus Data', 'Detail Penjualan', '2021-07-03 10:06:43'),
(340, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-03 10:07:39'),
(341, 2, 'Menyimpan Data', 'Penjualan', '2021-07-03 15:36:38'),
(342, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-03 10:37:24'),
(343, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-03 10:38:02'),
(344, 2, 'Menyimpan Data', 'Penjualan', '2021-07-03 15:40:31'),
(345, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-03 10:41:16'),
(346, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-03 10:41:40'),
(347, 2, 'Menyimpan Data', 'Produk', '2021-07-03 10:42:45'),
(348, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-03 10:43:12'),
(349, 2, 'Menyimpan Data', 'Penjualan', '2021-07-03 15:46:45'),
(350, 2, 'Menyimpan Data', 'Penjualan', '2021-07-03 16:03:28'),
(351, 2, 'Menyimpan Data', 'Penjualan', '2021-07-03 16:06:51'),
(352, 2, 'Memperbaharui Data', 'Produk', '2021-07-04 09:10:33'),
(353, 2, 'Memperbaharui Data', 'Produk', '2021-07-04 09:11:08'),
(354, 2, 'Memperbaharui Data', 'Produk', '2021-07-04 09:11:42'),
(355, 2, 'Memperbaharui Data', 'Produk', '2021-07-04 09:12:03'),
(356, 2, 'Memperbaharui Data', 'Produk', '2021-07-04 09:12:20'),
(357, 2, 'Memperbaharui Data', 'Produk', '2021-07-04 09:12:42'),
(358, 2, 'Memperbaharui Data', 'Produk', '2021-07-04 09:13:03'),
(359, 2, 'Memperbaharui Data', 'Produk', '2021-07-04 09:13:33'),
(360, 2, 'Memperbaharui Data', 'Produk', '2021-07-04 09:14:58'),
(361, 2, 'Memperbaharui Data', 'Produk', '2021-07-04 09:15:18'),
(362, 2, 'Memperbaharui Data', 'Produk', '2021-07-04 09:15:41'),
(363, 2, 'Memperbaharui Data', 'Produk', '2021-07-04 09:16:24'),
(364, 2, 'Menghapus Data', 'Produk', '2021-07-04 09:17:58'),
(365, 2, 'Menghapus Data', 'Produk', '2021-07-04 09:19:33'),
(366, 2, 'Menghapus Data', 'Produk', '2021-07-04 09:19:44'),
(367, 2, 'Memperbaharui Data', 'Produk', '2021-07-04 09:28:45'),
(368, 2, 'Memperbaharui Data', 'Produk', '2021-07-04 12:19:03'),
(369, 2, 'Memperbaharui Data', 'Produk', '2021-07-04 12:21:24'),
(370, 2, 'Menyimpan Data', 'Penjualan', '2021-07-05 11:06:28'),
(371, 2, 'Menyimpan Data', 'Penjualan', '2021-07-05 11:07:24'),
(372, 2, 'Menyimpan Data', 'Treatment', '2021-07-05 06:09:28'),
(373, 2, 'Menyimpan Data', 'Detail Treatment', '2021-07-05 06:10:38'),
(374, 2, 'Menyimpan Data', 'Detail Treatment', '2021-07-05 06:41:18'),
(375, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-05 06:41:57'),
(376, 2, 'Menghapus Data', 'Detail Penjualan', '2021-07-05 06:42:04'),
(377, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-05 06:42:25'),
(378, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-05 06:44:08'),
(379, 2, 'Menyimpan Data', 'Penjualan', '2021-07-05 12:27:42'),
(380, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-05 07:28:24'),
(381, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-05 07:50:59'),
(382, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-05 07:51:38'),
(383, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-05 07:51:51'),
(384, 1, 'Menghapus Data', 'Detail Penjualan', '2021-07-05 07:51:59'),
(385, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-05 07:52:34'),
(386, 1, 'Menghapus Data', 'Detail Penjualan', '2021-07-05 07:56:54'),
(387, 2, 'Menyimpan Data', 'Penjualan', '2021-07-05 13:26:00'),
(388, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-05 08:26:19'),
(389, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-05 08:26:35'),
(390, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-05 08:26:57'),
(391, 2, 'Menyimpan Data', 'Penjualan', '2021-07-05 14:03:18'),
(392, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-05 09:03:35'),
(393, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-05 09:03:57'),
(394, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-05 09:04:12'),
(395, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-05 09:04:33'),
(396, 2, 'Menyimpan Data', 'Penjualan', '2021-07-05 14:13:06'),
(397, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-05 09:13:56'),
(398, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-05 09:15:17'),
(399, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-05 09:15:45'),
(400, 2, 'Menyimpan Data', 'Penjualan', '2021-07-05 16:15:24'),
(401, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-05 11:15:48'),
(402, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-05 11:16:10'),
(403, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-05 11:16:31'),
(404, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-05 11:17:24'),
(405, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-05 11:17:55'),
(406, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-05 11:18:16'),
(407, 2, 'Menyimpan Data', 'Penjualan', '2021-07-06 11:29:21'),
(408, 2, 'Menyimpan Data', 'Produk', '2021-07-06 06:29:59'),
(409, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-06 06:30:51'),
(410, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-06 06:31:08'),
(411, 1, 'Menghapus Data', 'Detail Penjualan', '2021-07-06 07:05:11'),
(412, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-06 07:05:34'),
(413, 2, 'Menyimpan Data', 'Penjualan', '2021-07-06 15:41:02'),
(414, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-06 10:41:38'),
(415, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-06 10:42:07'),
(416, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-06 10:42:26'),
(417, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-06 10:42:49'),
(418, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-06 10:43:06'),
(419, 2, 'Menyimpan Data', 'Produk', '2021-07-06 10:45:07'),
(420, 2, 'Menyimpan Data', 'Produk', '2021-07-06 10:46:09'),
(421, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-06 10:46:36'),
(422, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-06 10:46:55'),
(423, 2, 'Menyimpan Data', 'Penjualan', '2021-07-06 16:20:07'),
(424, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-06 11:27:59'),
(425, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-06 11:28:28'),
(426, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-06 11:29:11'),
(427, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-06 11:29:36'),
(428, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-06 11:31:10'),
(429, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-06 11:31:29'),
(430, 2, 'Menyimpan Data', 'Produk', '2021-07-06 11:32:23'),
(431, 2, 'Menghapus Data', 'Produk', '2021-07-06 11:33:23'),
(432, 2, 'Menyimpan Data', 'Produk', '2021-07-06 11:33:55'),
(433, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-06 11:34:24'),
(434, 2, 'Menyimpan Data', 'Penjualan', '2021-07-09 11:30:41'),
(435, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-09 06:31:36'),
(436, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-09 06:32:44'),
(437, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-09 06:34:20'),
(438, 2, 'Menyimpan Data', 'Produk', '2021-07-09 06:36:43'),
(439, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-09 06:37:03'),
(440, 2, 'Menyimpan Data', 'Penjualan', '2021-07-10 12:56:50'),
(441, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-10 07:57:59'),
(442, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-10 08:00:18'),
(443, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-10 08:00:45'),
(444, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-10 08:01:15'),
(445, 1, 'Menghapus Data', 'Detail Penjualan', '2021-07-10 08:01:38'),
(446, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-10 08:02:10'),
(447, 2, 'Menyimpan Data', 'Penjualan', '2021-07-10 14:39:43'),
(448, 2, 'Menyimpan Data', 'Penjualan', '2021-07-10 14:40:51'),
(449, 2, 'Menyimpan Data', 'Detail Treatment', '2021-07-10 09:42:44'),
(450, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-10 09:43:43'),
(451, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-10 09:45:08'),
(452, 2, 'Menyimpan Data', 'Penjualan', '2021-07-11 11:17:21'),
(453, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-11 06:18:03'),
(454, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-11 06:33:56'),
(455, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-11 06:35:03'),
(456, 2, 'Menyimpan Data', 'Penjualan', '2021-07-11 12:35:55'),
(457, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-11 07:37:07'),
(458, 2, 'Menyimpan Data', 'Produk', '2021-07-11 07:54:43'),
(459, 2, 'Memperbaharui Data', 'Produk', '2021-07-11 07:55:05'),
(460, 2, 'Menyimpan Data', 'Penjualan', '2021-07-11 15:39:54'),
(461, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-11 10:40:30'),
(462, 2, 'Memperbaharui Data', 'Produk', '2021-07-12 05:06:15'),
(463, 2, 'Menyimpan Data', 'Produk', '2021-07-12 05:06:55'),
(464, 2, 'Memperbaharui Data', 'Produk', '2021-07-12 05:07:43'),
(465, 2, 'Memperbaharui Data', 'Produk', '2021-07-12 05:08:14'),
(466, 2, 'Menyimpan Data', 'Produk', '2021-07-12 05:08:52'),
(467, 2, 'Menyimpan Data', 'Produk', '2021-07-12 05:11:12'),
(468, 2, 'Menyimpan Data', 'Produk', '2021-07-12 05:11:42'),
(469, 2, 'Menyimpan Data', 'Penjualan', '2021-07-12 11:50:36'),
(470, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-12 06:52:57'),
(471, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-12 06:53:58'),
(472, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-12 06:54:23'),
(473, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-12 06:54:57'),
(474, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-12 06:55:27'),
(475, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-12 06:55:50'),
(476, 2, 'Menyimpan Data', 'Penjualan', '2021-07-14 10:14:32'),
(477, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 05:15:28'),
(478, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 05:15:47'),
(479, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 05:16:07'),
(480, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 05:16:23'),
(481, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 05:16:41'),
(482, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 05:17:04'),
(483, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 05:17:25'),
(484, 2, 'Menyimpan Data', 'Penjualan', '2021-07-14 10:28:28'),
(485, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 05:45:42'),
(486, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 05:45:57'),
(487, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 05:46:12'),
(488, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 05:46:44'),
(489, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 05:47:01'),
(490, 2, 'Menghapus Data', 'Detail Penjualan', '2021-07-14 05:47:29'),
(491, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 05:47:50'),
(492, 2, 'Menghapus Data', 'Penjualan', '2021-07-14 10:49:42'),
(493, 2, 'Menyimpan Data', 'Penjualan', '2021-07-14 10:50:28'),
(494, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 05:50:46'),
(495, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 05:50:59'),
(496, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 05:51:12'),
(497, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 05:51:33'),
(498, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 05:51:47'),
(499, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 06:15:51'),
(500, 2, 'Menyimpan Data', 'Penjualan', '2021-07-14 12:06:51'),
(501, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 07:07:28'),
(502, 2, 'Menyimpan Data', 'Penjualan', '2021-07-14 13:52:55'),
(503, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 08:53:15'),
(504, 2, 'Menghapus Data', 'Penjualan', '2021-07-14 13:54:47'),
(505, 2, 'Menyimpan Data', 'Penjualan', '2021-07-14 15:39:25'),
(506, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 10:39:43'),
(507, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 10:40:04'),
(508, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 10:40:19'),
(509, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 10:40:47'),
(510, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 10:57:04'),
(511, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 10:57:49'),
(512, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 10:58:13'),
(513, 2, 'Menyimpan Data', 'Penjualan', '2021-07-14 16:30:20'),
(514, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 11:31:00'),
(515, 5, 'Menghapus Data', 'Detail Penjualan', '2021-07-14 11:31:14'),
(516, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 11:31:41'),
(517, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 11:31:56'),
(518, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-14 11:32:14'),
(519, 2, 'Menyimpan Data', 'Penjualan', '2021-07-15 09:35:31'),
(520, 2, 'Menyimpan Data', 'Penjualan', '2021-07-15 09:37:37'),
(521, 2, 'Menyimpan Data', 'Penjualan', '2021-07-15 10:27:37'),
(522, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-15 06:10:30'),
(523, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-15 06:10:59'),
(524, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-15 06:12:19'),
(525, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-15 06:12:58'),
(526, 2, 'Memperbaharui Data', 'Produk', '2021-07-15 06:18:37'),
(527, 2, 'Memperbaharui Data', 'Produk', '2021-07-15 06:18:55'),
(528, 2, 'Memperbaharui Data', 'Produk', '2021-07-15 09:06:57'),
(529, 2, 'Menyimpan Data', 'Penjualan', '2021-07-15 14:07:57'),
(530, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-15 09:08:26'),
(531, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-15 09:08:46'),
(532, 2, 'Menyimpan Data', 'Produk', '2021-07-15 11:08:57'),
(533, 2, 'Menghapus Data', 'Produk', '2021-07-15 11:09:11'),
(534, 2, 'Menghapus Data', 'Produk', '2021-07-15 11:09:27'),
(535, 2, 'Menyimpan Data', 'Produk', '2021-07-15 11:10:01'),
(536, 2, 'Memperbaharui Data', 'Produk', '2021-07-15 11:10:25'),
(537, 2, 'Menghapus Data', 'Produk', '2021-07-15 11:11:11'),
(538, 2, 'Memperbaharui Data', 'Produk', '2021-07-15 11:11:47'),
(539, 2, 'Menyimpan Data', 'Penjualan', '2021-07-17 13:23:42'),
(540, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-17 08:24:03'),
(541, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-17 08:24:22'),
(542, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-17 08:24:41'),
(543, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-17 08:24:55'),
(544, 2, 'Menyimpan Data', 'Penjualan', '2021-07-22 13:14:27'),
(545, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-22 08:15:32'),
(546, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-22 08:15:51'),
(547, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-22 08:16:39'),
(548, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-22 08:17:13'),
(549, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-22 08:18:06'),
(550, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-22 08:18:45'),
(551, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-22 08:19:08'),
(552, 2, 'Menyimpan Data', 'Penjualan', '2021-07-22 15:45:49'),
(553, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-22 10:46:27'),
(554, 2, 'Menyimpan Data', 'Penjualan', '2021-07-22 17:40:49'),
(555, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-22 12:41:50'),
(556, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-22 12:42:32'),
(557, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-22 12:42:58'),
(558, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-22 12:43:23'),
(559, 2, 'Menyimpan Data', 'Penjualan', '2021-07-25 10:19:39'),
(560, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-25 05:20:13'),
(561, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-25 05:20:46'),
(562, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-25 05:21:45'),
(563, 2, 'Menghapus Data', 'Penjualan', '2021-07-25 10:53:18'),
(564, 2, 'Menyimpan Data', 'Penjualan', '2021-07-25 10:54:43'),
(565, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-25 05:55:15'),
(566, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-25 05:55:37'),
(567, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-25 05:55:55'),
(568, 2, 'Menyimpan Data', 'Penjualan', '2021-07-25 12:48:37'),
(569, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-25 07:49:35'),
(570, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-25 07:49:50'),
(571, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-25 07:50:03'),
(572, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-25 07:50:21'),
(573, 2, 'Menyimpan Data', 'Penjualan', '2021-07-25 13:42:54'),
(574, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-25 08:44:31'),
(575, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-25 08:45:01'),
(576, 2, 'Memperbaharui Data', 'Detail Treatment', '2021-07-25 08:49:01'),
(577, 2, 'Menyimpan Data', 'Penjualan', '2021-07-27 10:14:46'),
(578, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-27 05:15:26'),
(579, 2, 'Menyimpan Data', 'Penjualan', '2021-07-29 15:22:07'),
(580, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-29 10:22:36'),
(581, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-31 10:00:32'),
(582, 2, 'Menghapus Data', 'Detail Penjualan', '2021-07-31 10:00:56'),
(583, 2, 'Menyimpan Data', 'Penjualan', '2021-07-31 15:01:51'),
(584, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-07-31 10:02:07'),
(585, 2, 'Menyimpan Data', 'Penjualan', '2021-08-02 13:59:59'),
(586, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-02 09:00:23'),
(587, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-02 09:00:39'),
(588, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-02 09:01:09'),
(589, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-02 09:01:27'),
(590, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-02 09:01:39'),
(591, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-02 09:02:39'),
(592, 2, 'Menyimpan Data', 'Penjualan', '2021-08-02 16:19:18'),
(593, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-02 11:20:38'),
(594, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-02 11:21:04'),
(595, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-02 11:21:29'),
(596, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-02 11:21:50'),
(597, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-02 11:22:21'),
(598, 2, 'Memperbaharui Data', 'Produk', '2021-08-02 11:24:42'),
(599, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-02 11:25:33'),
(600, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-02 11:26:03'),
(601, 2, 'Menyimpan Data', 'Penjualan', '2021-08-06 11:01:30'),
(602, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-06 06:13:04'),
(603, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-06 06:16:55'),
(604, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-06 06:17:13'),
(605, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-06 06:17:29'),
(606, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-06 06:17:42'),
(607, 1, 'Menghapus Data', 'Detail Penjualan', '2021-08-06 06:17:54'),
(608, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-06 06:18:14'),
(609, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-06 06:18:26'),
(610, 2, 'Menyimpan Data', 'Penjualan', '2021-08-06 12:12:59'),
(611, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-06 07:13:25'),
(612, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-06 07:13:39'),
(613, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-06 07:14:05'),
(614, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-06 07:14:21'),
(615, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-06 07:14:47'),
(616, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-06 07:15:06'),
(617, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-06 07:15:23'),
(618, 2, 'Menyimpan Data', 'Detail Treatment', '2021-08-06 07:17:07'),
(619, 2, 'Memperbaharui Data', 'Detail Treatment', '2021-08-06 07:18:03'),
(620, 2, 'Menyimpan Data', 'Detail Penjualan', '2021-08-06 07:18:36');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `nm_paket` varchar(20) NOT NULL,
  `harga_paket` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nm_pelanggan` varchar(30) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `notelp_pelanggan` varchar(13) NOT NULL,
  `jk_pelanggan` enum('L','P') NOT NULL,
  `umur_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `jenis_pelanggan` enum('Agen','Distributor','Member','Pasien','Reseller') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nm_pelanggan`, `alamat_pelanggan`, `notelp_pelanggan`, `jk_pelanggan`, `umur_pelanggan`, `email_pelanggan`, `jenis_pelanggan`) VALUES
(1, 'Abdallah ', 'Pasir Mukti ', '0', 'L', 0, '0', 'Pasien'),
(2, 'Adi', 'Ciranggon', '0881323000000', 'L', 0, '0', 'Pasien'),
(3, 'Agil Winasih', 'Kondang Jaya', '0', 'P', 0, '0', 'Pasien'),
(4, 'Ai ', 'Pasir Mukti ', '089503410888', 'P', 0, '0', 'Pasien'),
(5, 'Andini', 'Sukamulya', '0', 'P', 0, '0', 'Pasien'),
(6, 'ani', 'kaliwedi', '081287399163', 'P', 0, '0', 'Pasien'),
(7, 'Anisah ', 'Pasir Mukti ', '0', 'P', 0, '0', 'Pasien'),
(8, 'Bidan Atin', 'Dayeuh Luhur', '0', 'P', 0, '0', 'Pasien'),
(9, 'Dery', 'Rawa Merta', '08138407337', 'L', 0, '0', 'Pasien'),
(10, 'Dewi', 'Tegak Sawal ', '0', 'P', 0, '0', 'Pasien'),
(11, 'DEWI', 'ckm', '0', 'P', 0, '0', 'Pasien'),
(12, 'Diana', 'Sari Indah', '081356110553', 'P', 0, '0', 'Pasien'),
(13, 'Dina', 'CKM', '08999262199', 'P', 0, '0', 'Pasien'),
(14, 'Emilia', 'Sukatani', '0895320000000', 'P', 0, '0', 'Pasien'),
(15, 'Endah ', 'Bumi Taruno', '081381865321', 'P', 0, '0', 'Pasien'),
(16, 'Endang', 'P.Gria Jahra', '08128673855', 'P', 0, '0', 'Pasien'),
(17, 'Eni Daryanti', 'Wadas ', '081586927492', 'P', 0, '0', 'Pasien'),
(18, 'erik', 'johar', '0', 'L', 0, '0', 'Pasien'),
(19, 'Erna', 'Kota mekar cieampel', '082122441909', 'P', 0, '0', 'Pasien'),
(20, 'Euis Komala ', 'Bendasari II', '085819314711', 'P', 0, '0', 'Pasien'),
(21, 'Flora', 'Jati Rasa Timur', '082818930051', 'P', 0, '0', 'Pasien'),
(22, 'Frida', 'Pundong', '081283004456', 'P', 0, '0', 'Pasien'),
(23, 'Gina', 'kosambi', '0', 'P', 0, '0', 'Pasien'),
(24, 'heni', 'asrama koding ', '082258102604', 'P', 0, '0', 'Pasien'),
(25, 'HJ Endah', 'ckm', '085811492855', 'P', 0, '0', 'Pasien'),
(26, 'Hj. itoh', '', '0', 'P', 0, '0', 'Pasien'),
(27, 'Hj. Narsih ', 'Sukaraja ', '081517447111', 'P', 0, '0', 'Pasien'),
(28, 'Hj.itoh ', 'Teluk Jambe ', '089685363624', 'P', 0, '0', 'Pasien'),
(29, 'Ida', 'Lamaran', '081299662741', 'P', 0, '0', 'Pasien'),
(30, 'Ida wardani', 'Gading elok 1', '0', 'L', 0, '0', 'Pasien'),
(31, 'iis', 'Palumbonsari', '085694032085', 'P', 0, '0', 'Pasien'),
(32, 'iis', 'teluk jambe', '0', 'P', 0, '0', 'Pasien'),
(33, 'ITA FITRA', 'Poponcol', '082311115334', 'P', 0, '0', 'Pasien'),
(34, 'Juhaeriah ', 'Dsn.Kerajan', '08159280684', 'P', 0, '0', 'Pasien'),
(35, 'JULI', 'Sukatani', '089635025030', 'L', 0, '0', 'Pasien'),
(36, 'Kesya ', 'BTA', '085773302401', 'P', 0, '0', 'Pasien'),
(37, 'Kumala', 'Perumahan Indo Alam', '081381162848', 'P', 0, '0', 'Pasien'),
(38, 'lia widiayanti ', 'kosambi ', '082210312751', 'P', 0, '0', 'Pasien'),
(39, 'Lilis', 'Sukadana teluk jambe', '085888307975', 'P', 0, '0', 'Pasien'),
(40, 'Lilis ', 'Klari', '085777989594', 'P', 0, '0', 'Pasien'),
(41, 'Linda ', 'Pasirkonci', '0', 'P', 0, '0', 'Pasien'),
(42, 'Lisna ', 'Patok Beusi ', '085771631365', 'P', 0, '0', 'Pasien'),
(43, 'Lulu ', 'Telagasari', '0895322000000', 'P', 0, '0', 'Pasien'),
(44, 'Ma Rini', 'cengkong', '081315504990', 'P', 0, '0', 'Pasien'),
(45, 'Mala ', 'Rawamerta', '081288330610', 'P', 0, '0', 'Pasien'),
(46, 'MARYANI', 'TUPAREV', '081288157554', 'P', 0, '0', 'Pasien'),
(47, 'Maryani Lubis ', 'Desa Kerajan', '085770457068', 'P', 0, '0', 'Pasien'),
(48, 'Mawar', 'Klari', '081380758632', 'P', 0, '0', 'Pasien'),
(49, 'mersi', 'palumbon sari', '0812135000000', 'P', 0, '0', 'Pasien'),
(50, 'Nafisya', 'KP (Kepuh)', '085211012751', 'P', 0, '0', 'Pasien'),
(51, 'Najwal ', 'Cilebar', '082110213213', 'P', 0, '0', 'Pasien'),
(52, 'neng', 'kalibuaya', '081510812097', 'P', 0, '0', 'Pasien'),
(53, 'Nengsih ', 'Johar', '085694091125', 'P', 0, '0', 'Pasien'),
(54, 'Ninik', 'Sukawargi', '085715646608', 'P', 0, '0', 'Pasien'),
(55, 'Nisa Aprianingsih', 'Pasirjengkol', '085719100790', 'P', 0, '0', 'Pasien'),
(56, 'Nomi', 'Sukamulya ', '0', 'P', 0, '0', 'Pasien'),
(57, 'Nurfadilah', 'Paning Mulya', '08872637992', 'P', 0, '0', 'Pasien'),
(58, 'nurfiah', 'klaster mutiara lamaran', '082124587114', 'P', 0, '0', 'Pasien'),
(59, 'Nurfitri', 'Cibungur', '082194990587', 'P', 0, '0', 'Pasien'),
(60, 'Nurul Hikmah', 'Gadimgn Elok', '085219438732', 'P', 0, '0', 'Pasien'),
(61, 'Putri Amelia ', 'desa kerajan ', '089522168069', 'P', 0, '0', 'Pasien'),
(62, 'Ria Heriawati', 'per.Graha Puspa', '085710698420', 'P', 0, '0', 'Pasien'),
(63, 'Rian', 'Ciranggon', '085813233239', 'L', 0, '0', 'Pasien'),
(64, 'Riris ', 'Sari indah ', '081316246795', 'P', 0, '0', 'Pasien'),
(65, 'Rischa', 'Cibungur Sari', '089671142187', 'P', 0, '0', 'Pasien'),
(66, 'Rosinta ', 'Tempuran ', '08569145064', 'P', 0, '0', 'Pasien'),
(67, 'Runita', 'Per. Graha Asri', '0896480000000', 'P', 0, '0', 'Pasien'),
(68, 'Santi', 'Majalaya', '0', 'P', 0, '0', 'Pasien'),
(69, 'Siti Nursela ', 'Per. Taman Palumbon Asri ', '085692912228', 'P', 0, '0', 'Pasien'),
(70, 'Siti Rohma', 'Lemah Abang', '0', 'P', 0, '0', 'Pasien'),
(71, 'Syahrul', 'Wadas ', '08987458655', 'L', 0, '0', 'Pasien'),
(72, 'Syifa', 'Jl Panda 4 D3 No75 Cikarang Barat', '081282758706', 'P', 0, '0', 'Pasien'),
(73, 'Syifa', 'Lamaran/pasir jengkol', '0', 'P', 0, '0', 'Pasien'),
(74, 'Tari', 'Lamaran ', '085694091125', 'P', 0, '0', 'Pasien'),
(75, 'Tati', 'Perumahan Sari Indah Permai', '081285542261', 'P', 0, '0', 'Pasien'),
(76, 'Tesa', 'Graha Asri', '085692505664', 'P', 0, '0', 'Pasien'),
(77, 'Thoriq', 'Tegal Sawah ', '087790794944', 'L', 0, '0', 'Pasien'),
(78, 'Titin', 'Lamaran / Pasir Jengkol', '081214051531', 'P', 0, '0', 'Pasien'),
(79, 'Titin', 'Griya Kondang Asri', '081290863782', 'P', 0, '0', 'Pasien'),
(80, 'Tubagus', 'Telagasari', '083895343839', 'L', 0, '0', 'Pasien'),
(81, 'Tyas', 'Dayeuh Luhur', '085693397932', 'P', 0, '0', 'Pasien'),
(82, 'Ude Haniya', 'Kp.Waluya ', '085890310686', 'P', 0, '0', 'Pasien'),
(83, 'Umay', 'Cilebar ', '082110213213', 'P', 0, '0', 'Pasien'),
(84, 'Uun Unayah', 'Simargalih', '08872637992', 'P', 0, '0', 'Pasien'),
(85, 'Vevi', 'Per.Buana Taman Sari', '085707368383', 'P', 0, '0', 'Pasien'),
(86, 'Wida', 'Telagasari', '0', 'P', 0, '0', 'Pasien'),
(87, 'Yanti', 'Pundong', '0', 'P', 0, '0', 'Pasien'),
(88, 'YATI', 'DIPO BARAT', '082125813747', 'P', 0, '0', 'Pasien'),
(89, 'Yati ', 'Adiarsa Timur ', '085777672339', 'P', 0, '0', 'Pasien'),
(90, 'Yefi', 'Per. Taman Palumbon Sari', '081214015171', 'P', 0, '0', 'Pasien'),
(91, 'Yeni', 'Ciampel ', '085813322546', 'P', 0, '0', 'Pasien'),
(92, 'yeni ', 'pundong', '0', 'P', 0, '0', 'Pasien'),
(93, 'Yuli', 'Tegal Sawah', '0', 'P', 0, '0', 'Pasien'),
(94, 'yulia', 'Semar Galih', '0', 'P', 0, '0', 'Pasien'),
(95, 'Yurim ', 'Tegal Sawah ', '0881025000000', 'P', 0, '0', 'Pasien');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `nm_supplier` varchar(50) NOT NULL,
  `tgl_pembelian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `nm_beautician` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_pelanggan`, `tgl_penjualan`, `id_dokter`, `nm_beautician`) VALUES
(10, 4, '2021-05-19', 0, ''),
(11, 42, '2021-05-19', 0, ''),
(12, 93, '2021-05-19', 0, ''),
(13, 24, '2021-05-19', 0, ''),
(14, 95, '2021-05-19', 0, ''),
(15, 57, '2021-05-19', 0, ''),
(16, 88, '2021-05-20', 0, ''),
(17, 27, '2021-05-20', 0, 'Rini'),
(18, 71, '2021-05-20', 0, ''),
(19, 77, '2021-05-20', 0, ''),
(20, 53, '2021-05-20', 0, ''),
(21, 15, '2021-05-21', 0, ''),
(22, 34, '2021-05-21', 0, ''),
(23, 91, '2021-05-21', 0, ''),
(24, 20, '2021-05-21', 0, ''),
(25, 17, '2021-05-22', 0, ''),
(26, 66, '2021-05-22', 0, ''),
(27, 45, '2021-05-22', 0, ''),
(28, 37, '2021-05-22', 0, ''),
(29, 41, '2021-05-22', 0, ''),
(30, 43, '2021-05-22', 0, ''),
(31, 36, '2021-05-22', 0, ''),
(32, 69, '2021-05-24', 1, 'yuni'),
(33, 40, '2021-05-25', 0, ''),
(34, 38, '2021-05-30', 0, ''),
(36, 74, '2021-06-05', 1, 'Tiara'),
(37, 82, '2021-06-05', 1, 'Tiara'),
(38, 28, '2021-06-05', 0, ''),
(40, 78, '2021-06-05', 1, 'Tiara'),
(41, 89, '2021-06-05', 1, 'Tiara '),
(42, 6, '2021-06-06', 1, ''),
(43, 64, '2021-06-08', 0, ''),
(45, 37, '2021-06-09', 0, ''),
(46, 75, '2021-06-09', 0, ''),
(47, 22, '2021-06-09', 0, ''),
(48, 21, '2021-06-09', 0, ''),
(50, 49, '2021-06-10', 0, ''),
(51, 60, '2021-06-10', 0, 'Tiara'),
(52, 72, '2021-06-10', 0, ''),
(53, 90, '2021-06-10', 0, ''),
(54, 81, '2021-06-10', 0, ''),
(55, 59, '2021-06-11', 0, ''),
(56, 83, '2021-06-11', 0, ''),
(57, 51, '2021-06-11', 0, ''),
(58, 19, '2021-06-11', 0, ''),
(59, 8, '2021-06-11', 0, ''),
(61, 80, '2021-06-11', 0, 'Tiara'),
(62, 44, '2021-06-11', 0, 'syifa'),
(63, 25, '2021-06-11', 0, ''),
(64, 54, '2021-06-11', 0, ''),
(66, 77, '2021-06-18', 1, 'Syifa'),
(71, 79, '2021-06-19', 1, 'Sifa'),
(72, 61, '2021-06-21', 1, 'tiara, syifa '),
(73, 47, '2021-06-21', 1, 'tiara, Syifa '),
(77, 55, '2021-06-21', 1, 'Sifa'),
(78, 1, '2021-06-22', 1, 'Syifa'),
(79, 4, '2021-06-22', 1, 'Syifa'),
(80, 7, '2021-06-22', 1, 'Syifa'),
(81, 24, '2021-07-01', 0, ''),
(82, 78, '2021-07-03', 1, 'Tiara/Sifa'),
(84, 48, '2021-07-03', 1, 'sifa'),
(85, 94, '2021-07-03', 1, 'Lidiya'),
(86, 57, '2021-07-03', 1, 'Lidiya'),
(87, 84, '2021-07-03', 1, 'lidiya'),
(88, 13, '2021-07-03', 1, 'Lidiya'),
(89, 29, '2021-07-03', 1, 'Sifa'),
(90, 14, '2021-07-05', 1, 'Tiara'),
(91, 35, '2021-07-05', 1, 'Tiara'),
(92, 55, '2021-07-05', 1, 'Tiara'),
(93, 33, '2021-07-05', 1, 'Tiara'),
(94, 21, '2021-07-05', 1, 'lidiya'),
(95, 16, '2021-07-05', 0, 'lidiya'),
(96, 3, '2021-07-05', 1, 'lidiya'),
(97, 12, '2021-07-06', 1, 'sifa'),
(98, 63, '2021-07-06', 1, 'sifa'),
(99, 2, '2021-07-06', 1, 'sifa,tiara'),
(100, 67, '2021-07-08', 0, ''),
(101, 86, '2021-07-09', 1, 'Tiara'),
(102, 65, '2021-07-10', 1, 'tiara'),
(103, 56, '2021-07-10', 1, 'Tiara'),
(104, 5, '2021-07-10', 1, 'Tiara'),
(105, 70, '2021-07-11', 1, 'syifa'),
(106, 10, '2021-07-11', 1, 'Syifa'),
(107, 9, '2021-07-11', 1, 'sifa'),
(108, 58, '2021-07-12', 0, ''),
(109, 52, '2021-07-14', 0, ''),
(111, 11, '2021-07-14', 1, 'Sifa'),
(112, 22, '2021-07-14', 0, ''),
(114, 50, '2021-07-14', 1, 'Sifa'),
(115, 68, '2021-07-14', 0, ''),
(116, 30, '2021-07-15', 1, 'Tiara'),
(117, 73, '2021-07-15', 1, 'syifa'),
(118, 88, '2021-07-15', 1, 'TIARA'),
(119, 46, '2021-07-15', 1, 'TIARA'),
(120, 93, '2021-07-17', 0, ''),
(121, 76, '2021-07-22', 1, ''),
(122, 31, '2021-07-22', 0, 'Syifa'),
(123, 39, '2021-07-22', 0, ''),
(124, 62, '2021-07-23', 1, 'tiara'),
(125, 85, '2021-07-23', 1, 'Syifa'),
(127, 17, '2021-07-25', 0, 'Tiara'),
(128, 55, '2021-07-25', 1, 'Sifa'),
(129, 23, '2021-07-25', 0, ''),
(130, 18, '2021-07-27', 1, 'syifa'),
(131, 26, '2021-07-29', 0, ''),
(133, 32, '2021-08-02', 0, ''),
(134, 77, '2021-08-02', 0, ''),
(135, 92, '2021-08-06', 0, ''),
(136, 87, '2021-08-06', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `jns_produk` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_produk` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `jns_produk`, `stok`, `harga_produk`) VALUES
(2, 'DL-6 ++', 100, 105000),
(3, 'DL-5', 10, 100000),
(4, 'NB-2 ++', 9, 90000),
(5, 'D50++', 9, 115000),
(6, 'KPC ++', 99, 60000),
(7, 'Moisturaizer', 7, 50000),
(8, 'C-Cream', 1, 85000),
(9, 'NB-1', 96, 80000),
(10, 'DL-5++', 99, 105000),
(11, 'KM-1', 0, 100000),
(12, 'NB-3', 20, 80000),
(13, 'NB-2', 9, 80000),
(14, 'D50', 100, 110000),
(15, 'Nutrisi Cream', 0, 95000),
(16, 'T3', 100, 170000),
(17, 'KMA-3', 93, 90000),
(18, 'Cream Leher', 5, 75000),
(19, 'DRL-Sb', 12, 60000),
(20, 'Cream Malam Acne', 3, 85000),
(21, 'Acne Lotion Premium', 10, 85000),
(22, 'Sunscreen Ivory', 6, 85000),
(23, 'DermoAcne', 12, 75000),
(24, 'SBP (Sunscreen Brightening Ping)', 2, 60000),
(25, 'BPM', 9, 80000),
(26, 'Eye Contour', 11, 75000),
(27, 'NB-1++', 100, 90000),
(28, 'NB-3++', 2, 90000),
(29, 'DL-6', 10, 100000),
(30, 'T4', 1, 170000),
(31, 'Hand Body Brightening', 6, 100000),
(32, 'Hand Body Instant', 4, 100000),
(33, 'Ping Lip', 1, 125000),
(35, 'Lotion Acne Mini', 7, 50000),
(36, 'Peel Off Mask Acne', 9, 75000),
(37, 'Peel Off Mask Whitening', 4, 95000),
(38, 'Rc Cream', 1, 80000),
(39, 'SBW Cream', 8, 60000),
(40, 'ACM Cream', 9, 85000),
(41, 'Intensive Eye Gel', 3, 85000),
(42, 'Loose Powder Acne Natural', 1, 90000),
(43, 'Loose Powder Acne Pink', 1, 90000),
(44, 'Serum Acne', 100, 65000),
(45, 'Serum Vit C', 49, 65000),
(46, 'Smothing White', 18, 175000),
(47, 'Skin Toner TTO (FressTop)', 20, 75000),
(48, 'Skin Toner Acne (FressTop)', 8, 75000),
(52, 'Facial Wash Brightening', 0, 70000),
(53, 'Peeling Body Sprai', 10, 100000),
(56, 'Facial Wash (Nastyaderm)', 8, 70000),
(57, 'Skin Toner (Nastyaderm)', 20, 60000),
(58, 'Strenght Serum (Nastyaderm)', 100, 75000),
(59, 'Night Cream (NastyaDerm)', 1, 80000),
(60, 'Facial Wash Normal (New Produk)', 12, 75000),
(61, 'Facial Wash TTO (New Produk)', 8, 75000),
(62, 'Milk Cleanser (NBC)', 7, 75000),
(63, 'Facial Wash Lemon (New Produk)', 9, 75000),
(64, 'Skin Toner AHA (New Produk)', 36, 70000),
(65, 'Skin Toner TTO (New Produk)', 41, 70000),
(66, 'Strength Serum Acne (Nastyaderm)', 97, 75000),
(67, 'Paket Glowing Nastyaderm (Day Cream pakai KPC Nbc)', 0, 196000),
(68, 'Cr. flex Acne kecil', 4, 60000),
(69, 'paket Flex Nastyaderm (day Cream BB cream)', 0, 196000),
(72, 'T2', 4, 85000),
(73, 'Night Cream Acne Clearing (Nastyaderm)', 9, 90000),
(74, 'Sunscreen Acne Natural', 98, 85000),
(76, 'Sunscreen Acne White', 9, 85000),
(77, 'Facial Wash TTO Ndk', 42, 70000),
(78, 'Serum Acne Ndk', 44, 75000),
(79, 'Oil Control', 92, 90000),
(80, 'Acne Clearing Ndk', 71, 90000),
(81, 'Acne Totol', 6, 60000),
(83, 'Obat minum', 12, 100000),
(84, 'Masker detox', 4, 30000),
(85, 'masker detox', 1, 50000),
(86, 'masker detox', 10, 50000),
(88, 'Extrecsi', 20, 15000),
(89, 'serum vit c Nastyaderm', 5, 75000),
(91, 'vit. cream flek kecil', 15, 60000),
(93, 'vit. cream acne kecil', 12, 60000),
(95, 'Serum Glowing', 290, 85000),
(96, 'KMA-3', 48, 90000),
(97, 'day cream natural', 19, 75000),
(98, 'day cream white', 18, 75000),
(100, 'Nutrisi Cream', 46, 95000),
(101, 'bodySerum', 9, 100000),
(102, 'Acne Premium Gel', 100, 95000),
(103, 'Milk Cleanser NastyaDerm', 100, 60000),
(104, 'Day Cream BB Cream', 100, 75000),
(105, 'Sunscreen Acne White NASTYADERM', 100, 75000),
(106, 'Sunscreen Natural NastyaDerm', 100, 75000),
(108, 'KPC', 100, 65000);

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `id_treatment` int(11) NOT NULL,
  `jns_treatment` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`id_treatment`, `jns_treatment`) VALUES
(1, 'Facial'),
(2, 'Combination Treatment'),
(3, 'Rejuvenation Treatment'),
(4, 'High Technology Treatment'),
(7, 'FACIAL SULFUR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detail_paket`
--
ALTER TABLE `detail_paket`
  ADD PRIMARY KEY (`id_detailpaket`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_detailpembelian`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detailpenjualan`);

--
-- Indexes for table `detail_treatment`
--
ALTER TABLE `detail_treatment`
  ADD PRIMARY KEY (`id_detailtreatment`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD PRIMARY KEY (`id_jadwaldokter`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`id_treatment`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_paket`
--
ALTER TABLE `detail_paket`
  MODIFY `id_detailpaket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_detailpembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detailpenjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=461;

--
-- AUTO_INCREMENT for table `detail_treatment`
--
ALTER TABLE `detail_treatment`
  MODIFY `id_detailtreatment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  MODIFY `id_jadwaldokter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=621;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `id_treatment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
