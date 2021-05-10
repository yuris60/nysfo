-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 04:34 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

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
(1, 13, 1, 0, 1, 0, 500000);

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
(1, 1, 'Facial Skin Care', 500000);

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
(1, 'Yuris Alkhalifi, Sp.DV', 'L', 'Karawang', '1997-04-21', 'Karawang', '089663920454', 'yurisalkhalifi1@gmail.com'),
(2, 'Kartika Puspita, Sp.A', 'P', 'Karawang', '2000-07-11', 'Karawang', '081212345678', 'kartikapuspita1107@gmail.com');

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

--
-- Dumping data for table `jadwal_dokter`
--

INSERT INTO `jadwal_dokter` (`id_jadwaldokter`, `id_dokter`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
(1, '1', 'Senin', '10:00:00', '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nm_member` varchar(30) NOT NULL,
  `alamat_member` text NOT NULL,
  `notelp_member` varchar(13) NOT NULL,
  `jk_member` enum('L','P') NOT NULL,
  `umur_member` int(11) NOT NULL,
  `email_member` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nm_member`, `alamat_member`, `notelp_member`, `jk_member`, `umur_member`, `email_member`) VALUES
(1, 'Yuris', 'Karawang', '089663920454', 'L', 23, 'yurisalkhalifi1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `nm_supplier` varchar(50) NOT NULL,
  `tgl_pembelian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `nm_supplier`, `tgl_pembelian`) VALUES
(1, 'PT ABC Indonesia', '2020-12-24'),
(2, 'PT Orange', '2020-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `nm_beautician` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_member`, `nama`, `alamat`, `no_telp`, `tgl_penjualan`, `id_dokter`, `nm_beautician`) VALUES
(1, 0, '', 'Karawang', '', '2020-12-25', 1, 'Kartika'),
(2, 0, '', 'Karawang', '', '2020-12-25', 2, 'Tio'),
(3, 1, '', 'Karawang', '', '2020-12-25', 1, 'Tio'),
(4, 1, 'Yuris', 'Karawang', '', '2020-12-25', 1, 'Neida'),
(5, 1, 'Yuris', 'Karawang', '089663920454', '2020-12-25', 2, 'Neida'),
(6, 0, '', '', '', '2020-12-25', 2, 'Ainun'),
(7, 0, 'Neida', 'Jakarta', '', '2020-12-25', 2, 'Ainun'),
(8, 0, 'Neida', 'Jakarta', '0812', '2020-12-25', 1, 'Ainun'),
(9, 0, '', '', '', '2020-12-25', 1, 'Neida'),
(10, 0, '', '', '', '2020-12-25', 2, 'Ainun'),
(11, 1, 'Yuris', 'Karawang', '089663920454', '2020-12-25', 1, 'Kartika'),
(12, 0, 'Neida', 'Jakarta', '0896', '2020-12-25', 2, 'Nelly'),
(13, 1, 'Yuris', 'Karawang', '089663920454', '2020-12-25', 2, 'Nila');

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
(1, 'Anti Aging', 101, 500000),
(2, 'Facial Tone', 100, 600000);

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
(1, 'Facial');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nm_user` varchar(30) NOT NULL,
  `akses` enum('Pemilik','Customer Service') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `nm_user`, `akses`) VALUES
(1, 'admin@gmail.com', '$2y$10$rRh9FBQOwsj.j4x9at8tx.V7/2QLKgcFyWCzsqrW3JztOfiA1FVrO', 'dr. Lina Wijaya', 'Pemilik'),
(2, 'cs@gmail.com', '$2y$10$BTuqWgEA2FbDW0BgxfbWXuYkjhLqdbsDy15K0x4b07U/bzQMYBerm', 'CS', 'Customer Service');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_detailpembelian`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detailpenjualan`),
  ADD KEY `id_penjualan` (`id_penjualan`);

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
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_detailpembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detailpenjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `detail_treatment`
--
ALTER TABLE `detail_treatment`
  MODIFY `id_detailtreatment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  MODIFY `id_jadwaldokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `id_treatment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
