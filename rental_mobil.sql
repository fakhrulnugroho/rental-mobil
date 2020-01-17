-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2020 at 06:57 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`id`, `nama`, `username`, `password`, `foto`) VALUES
(4, 'Administrator', 'admin', '$2y$10$tf2VKfD.kjhXFc16fbaNY.EvtMhvhb8iYFWvHVr5MURTg443VwmIm', 'administrator-1579273408.png'),
(5, 'Fakhrul Fanani Nugroho', 'nugrohoff', '$2y$10$MzYgUN41HVHtmLixc40jxuBwXbstCYqeCxMTitlUsTcEIO8KdN.Su', 'fakhrul-fanani-nugroho-1579279638.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_bayar`
--

CREATE TABLE `tbl_jenis_bayar` (
  `id` int(11) NOT NULL,
  `jenis_bayar` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jenis_bayar`
--

INSERT INTO `tbl_jenis_bayar` (`id`, `jenis_bayar`) VALUES
(3, 'Cash'),
(4, 'Kredit');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_merk`
--

CREATE TABLE `tbl_merk` (
  `id` int(11) NOT NULL,
  `merk` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_merk`
--

INSERT INTO `tbl_merk` (`id`, `merk`) VALUES
(8, 'Toyota'),
(9, 'Suzuki');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mobil`
--

CREATE TABLE `tbl_mobil` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `warna` varchar(20) DEFAULT NULL,
  `no_polisi` varchar(10) DEFAULT NULL,
  `jumlah_kursi` int(1) DEFAULT NULL,
  `tahun_beli` int(4) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `id_merk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mobil`
--

INSERT INTO `tbl_mobil` (`id`, `nama`, `warna`, `no_polisi`, `jumlah_kursi`, `tahun_beli`, `gambar`, `id_merk`) VALUES
(13, 'Toyota Kijang Innova', 'Putih', 'R 6788 KM', 6, 2019, 'toyota-kijang-innova-1577631464.png', NULL),
(14, 'Toyota Kijang Innova', 'Abu Abu', 'R 1309 KN', 7, 2018, 'toyota-kijang-innova-1579004786.png', 8),
(15, 'Suzuki All New Ertiga', 'Putih', 'R 1739 KN', 8, 2018, 'suzuki-all-new-ertiga-1579279546.png', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemesan`
--

CREATE TABLE `tbl_pemesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pemesan`
--

INSERT INTO `tbl_pemesan` (`id`, `nama`, `alamat`, `jenis_kelamin`, `foto`) VALUES
(6, 'Fakhrul', 'Sidareja', 'L', 'fakhrul-1579004931.jpg'),
(7, 'Fanani', 'Sidareja', 'L', 'fanani-1579275545.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perjalanan`
--

CREATE TABLE `tbl_perjalanan` (
  `id` int(11) NOT NULL,
  `asal` varchar(20) DEFAULT NULL,
  `tujuan` varchar(20) DEFAULT NULL,
  `jarak` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_perjalanan`
--

INSERT INTO `tbl_perjalanan` (`id`, `asal`, `tujuan`, `jarak`) VALUES
(3, 'Cilacap', 'Jogjakarta', 300),
(4, 'Cilacap', 'Ciamis', 70);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id` int(11) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `id_pemesan` int(11) DEFAULT NULL,
  `id_mobil` int(11) DEFAULT NULL,
  `id_perjalanan` int(11) DEFAULT NULL,
  `id_jenis_bayar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id`, `harga`, `tgl_pinjam`, `tgl_kembali`, `id_pemesan`, `id_mobil`, `id_perjalanan`, `id_jenis_bayar`) VALUES
(1, 1000000, '2020-01-01', '2020-01-04', NULL, 13, NULL, NULL),
(6, 2000000, '2020-01-17', '2020-01-20', 6, 14, 3, 3),
(8, 1500000, '2020-01-18', '2020-01-21', 7, 15, 4, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jenis_bayar`
--
ALTER TABLE `tbl_jenis_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_merk`
--
ALTER TABLE `tbl_merk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_mobil_ibfk_2` (`id_merk`);

--
-- Indexes for table `tbl_pemesan`
--
ALTER TABLE `tbl_pemesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_perjalanan`
--
ALTER TABLE `tbl_perjalanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pemesan` (`id_pemesan`),
  ADD KEY `id_mobil` (`id_mobil`),
  ADD KEY `id_perjalanan` (`id_perjalanan`),
  ADD KEY `id_jenis_bayar` (`id_jenis_bayar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_jenis_bayar`
--
ALTER TABLE `tbl_jenis_bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_merk`
--
ALTER TABLE `tbl_merk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_pemesan`
--
ALTER TABLE `tbl_pemesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_perjalanan`
--
ALTER TABLE `tbl_perjalanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  ADD CONSTRAINT `tbl_mobil_ibfk_2` FOREIGN KEY (`id_merk`) REFERENCES `tbl_merk` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD CONSTRAINT `tbl_pesanan_ibfk_1` FOREIGN KEY (`id_pemesan`) REFERENCES `tbl_pemesan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pesanan_ibfk_2` FOREIGN KEY (`id_mobil`) REFERENCES `tbl_mobil` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pesanan_ibfk_3` FOREIGN KEY (`id_perjalanan`) REFERENCES `tbl_perjalanan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pesanan_ibfk_4` FOREIGN KEY (`id_jenis_bayar`) REFERENCES `tbl_jenis_bayar` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
