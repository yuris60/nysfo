-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 10:30 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(109, 34, 0, 6, 0, 1, 60000);

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
(26, 2, 'Detox Platinum+Peeling AHA', 425000),
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
(46, 4, 'Aqua Peel', 330000);

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
  `level_pelanggan` enum('Agen','Distributor','Member','Reseller') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id_member` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `nm_beautician` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_member`, `nama`, `jk`, `alamat`, `no_telp`, `tgl_penjualan`, `id_dokter`, `nm_beautician`) VALUES
(10, 0, 'Ai ', 'P', 'Pasir Mukti ', '089503410888', '2021-05-19', 0, ''),
(11, 0, 'Lisna ', 'P', 'Patok Beusi ', '085771631365', '2021-05-19', 0, ''),
(12, 0, 'Yuli ', 'P', 'Tegal Sawah', '081289774302', '2021-05-19', 0, ''),
(13, 0, 'Heni ', 'P', 'Wadas ', '085887679557', '2021-05-19', 0, ''),
(14, 0, 'Yurim ', 'P', 'Tegal Sawah ', '0881024960172', '2021-05-19', 0, ''),
(15, 0, 'Nurfadilah ', 'P', 'Parung Mulya ', '08872637992', '2021-05-19', 0, ''),
(16, 0, 'Yati ', 'P', 'Adiarsa Timur ', '085777672339', '2021-05-20', 0, ''),
(17, 0, 'Hj. Narsih ', 'P', 'Sukaraja ', '081517447111', '2021-05-20', 0, 'Rini'),
(18, 0, 'Syahrul', 'L', 'Wadas ', '08987458655', '2021-05-20', 0, ''),
(19, 0, 'Thoriq', 'L', 'Tegal Sawah ', '087790794944', '2021-05-20', 0, ''),
(20, 0, 'Nengsih ', 'P', 'Johar', '085694091125', '2021-05-20', 0, ''),
(21, 0, 'Endah ', 'P', 'Bumi Taruno', '081381865321', '2021-05-21', 0, ''),
(22, 0, 'Juhaeriah ', 'P', 'Dsn.Kerajan', '08159280684', '2021-05-21', 0, ''),
(23, 0, 'Yeni', 'P', 'Ciampel ', '085813322546', '2021-05-21', 0, ''),
(24, 0, 'Euis Komala ', 'P', 'Bendasari II', '085819314711', '2021-05-21', 0, ''),
(25, 0, 'Eni Daryanti', 'P', 'Wadas ', '081586927492', '2021-05-22', 0, ''),
(26, 0, 'Rosinta ', 'P', 'Tempuran ', '08569145064', '2021-05-22', 0, ''),
(27, 0, 'Mala ', 'P', 'Rawamerta', '081288330610', '2021-05-22', 0, ''),
(28, 0, 'Kumala ', 'P', 'Per.Indo Alam ', '081381162848', '2021-05-22', 0, ''),
(29, 0, 'Linda ', 'P', 'Pasirkonci', '-', '2021-05-22', 0, ''),
(30, 0, 'Lulu ', 'P', 'Telagasari', '0895322331380', '2021-05-22', 0, ''),
(31, 0, 'Kesya ', 'P', 'BTA', '085773302401', '2021-05-22', 0, ''),
(32, 0, 'Siti Nursela ', 'P', 'Per. Taman Palumbon Asri ', '085692912228', '2021-05-24', 1, 'yuni'),
(33, 0, 'Lilis ', 'P', 'Klari', '085777989594', '2021-05-25', 0, ''),
(34, 0, 'lia widiayanti ', 'P', 'kosambi ', '082210312751', '2021-05-30', 0, '');

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
(1, 'KPC', 0, 60000),
(2, 'Dl-6 ++', 0, 105000),
(3, 'Dl-5', 1, 100000),
(4, 'NB-2 ++', 0, 90000),
(5, 'D50++', 0, 115000),
(6, 'KPC ++', 3, 60000),
(7, 'Moisturaizer', 8, 50000),
(8, 'C-Cream', 1, 80000),
(9, 'NB-1', 1, 80000),
(10, 'DL-5++', 3, 105000),
(11, 'KM-1', 3, 100000),
(12, 'NB-3', 1, 80000),
(13, 'NB-2', 1, 80000),
(14, 'D50', 3, 110000),
(15, 'Nutrisi Cream', 3, 95000),
(16, 'T3', 2, 165000),
(17, 'KMA-3', 0, 90000),
(18, 'Cream Leher', 6, 75000),
(19, 'DRL-Sb', 12, 60000),
(20, 'Cream Malam Acne', 3, 85000),
(21, 'Acne Lotion Premium', 10, 85000),
(22, 'Sunscreen Ivory', 6, 85000),
(23, 'DermoAcne', 12, 75000),
(24, 'SBP (Sunscreen Brightening Ping)', 2, 60000),
(25, 'BPM', 9, 80000),
(26, 'Eye Contour', 11, 75000),
(27, 'NB-1++', 0, 90000),
(28, 'NB-3++', 2, 90000),
(29, 'DL-6', 0, 100000),
(30, 'T4', 0, 165000),
(31, 'Hand Body Brightening', 7, 100000),
(32, 'Hand Body Instant', 4, 100000),
(33, 'Ping Lip', 1, 125000),
(35, 'Lotion Acne Mini', 7, 50000),
(36, 'Peel Off Mask Acne', 10, 75000),
(37, 'Peel Off Mask Whitening', 5, 95000),
(38, 'Rc Cream', 1, 80000),
(39, 'SBW Cream', 8, 60000),
(40, 'ACM Cream', 9, 85000),
(41, 'Intensive Eye Gel', 3, 85000),
(42, 'Loose Powder Acne Natural', 1, 90000),
(43, 'Loose Powder Acne Pink', 1, 90000),
(44, 'Serum Acne', 1, 65000),
(45, 'Serum Vit C', 56, 65000),
(46, 'Smothing White', 19, 175000),
(47, 'Skin Toner TTO (FressTop)', 1, 75000),
(48, 'Skin Toner Acne (FressTop)', 8, 75000),
(49, 'Skin Toner AHA (New)', 2, 50000),
(50, 'Skin Toner Acne', 9, 50000),
(51, 'Skin Toner Acne ( New)', 9, 50000),
(52, 'Facial Wash Brightening', 1, 70000),
(53, 'Peeling Body Sprai', 11, 100000),
(54, 'Cr.Flex Kecil', 5, 60000),
(56, 'Facial Wash (Nastyaderm)', 23, 70000),
(57, 'Skin Toner (Nastyaderm)', 25, 60000),
(58, 'Strenght Serum (Nastyaderm)', 1, 75000),
(59, 'Night Cream (NastyaDerm)', 2, 80000),
(60, 'Facial Wash Normal (New Produk)', 16, 75000),
(61, 'Facial Wash TTO (New Produk)', 13, 75000),
(62, 'Milk Cleanser (New Produk)', 9, 75000),
(63, 'Facial Wash Lemon (New Produk)', 10, 75000),
(64, 'Skin Toner AHA (New Produk)', 9, 75000),
(65, 'Skin Toner TTO (New Produk)', 43, 75000),
(66, 'Strength Serum Acne (Nastyaderm)', 97, 75000),
(67, 'Paket Glowing Nastyaderm (Day Cream pakai KPC Nbc)', 0, 196000),
(68, 'Cr. flex Acne kecil', 0, 60000),
(69, 'paket Flex Nastyaderm (day Cream BB cream)', 0, 196000),
(70, 'serum Glowing Nastyaderm Resseler', 0, 60000),
(71, 'oil control', 8, 85000);

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
(4, 'High Technology Treatment');

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
  MODIFY `id_detailpenjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `detail_treatment`
--
ALTER TABLE `detail_treatment`
  MODIFY `id_detailtreatment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `id_treatment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
