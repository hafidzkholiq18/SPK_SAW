-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 02:22 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_aviga`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alternatif`
--

CREATE TABLE `tbl_alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `kode_alternatif` char(3) NOT NULL,
  `nama_alternatif` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_alternatif`
--

INSERT INTO `tbl_alternatif` (`id_alternatif`, `kode_alternatif`, `nama_alternatif`) VALUES
(1, 'A1', 'Ketoprak'),
(2, 'A2', 'Pecel Lele'),
(3, 'A3', 'Bubur Ayam'),
(4, 'A4', 'Lontong Sate'),
(5, 'A5', 'Capucino Cincau'),
(6, 'A6', 'Jeruk Peras'),
(7, 'A7', 'Bakwan Kawi'),
(8, 'A8', 'Sosis Bakar'),
(9, 'A9', 'Telor Gulung'),
(10, 'A10', 'Otak otak');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kecocokan`
--

CREATE TABLE `tbl_kecocokan` (
  `id_kecocokan` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `K1` float DEFAULT NULL,
  `K2` float DEFAULT NULL,
  `K3` float DEFAULT NULL,
  `K4` float DEFAULT NULL,
  `K5` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kecocokan`
--

INSERT INTO `tbl_kecocokan` (`id_kecocokan`, `id_alternatif`, `K1`, `K2`, `K3`, `K4`, `K5`) VALUES
(1, 1, 2, 2, 2, 3, 2),
(2, 2, 1, 1, 3, 2, 2),
(3, 3, 2, 2, 2, 2, 1),
(4, 4, 2, 3, 2, 2, 1),
(5, 5, 3, 3, 2, 2, 1),
(6, 6, 3, 3, 1, 1, 1),
(7, 7, 2, 3, 3, 2, 3),
(8, 8, 3, 3, 1, 3, 1),
(9, 9, 3, 3, 1, 1, 2),
(10, 10, 3, 3, 1, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` char(3) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `jenis_kriteria` enum('Benefit','Cost') NOT NULL,
  `bobot` int(11) NOT NULL,
  `keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `jenis_kriteria`, `bobot`, `keterangan`) VALUES
(1, 'C1', 'Modal Awal', 'Cost', 3, 'Modal awal untuk membuka sebuah usaha'),
(2, 'C2', 'Biaya Operasional', 'Cost', 1, 'lorem ipsum'),
(3, 'C3', 'Keuntungan Perbulan', 'Benefit', 1, 'lorem ipsum'),
(4, 'C4', 'Pesaing', 'Cost', 1, 'lorem ipsum'),
(5, 'C5', 'Peminat', 'Benefit', 4, 'lorem ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `C1` int(11) DEFAULT NULL,
  `C2` int(11) DEFAULT NULL,
  `C3` int(11) DEFAULT NULL,
  `C4` int(11) DEFAULT NULL,
  `C5` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `id_alternatif`, `C1`, `C2`, `C3`, `C4`, `C5`) VALUES
(1, 1, 3000000, 7000000, 4000000, 2, 50),
(2, 2, 4500000, 15000000, 5000000, 4, 52),
(3, 3, 2800000, 7000000, 4000000, 4, 34),
(4, 4, 3000000, 6000000, 3800000, 3, 35),
(5, 5, 2500000, 5000000, 3500000, 3, 32),
(6, 6, 2500000, 6000000, 2500000, 6, 35),
(7, 7, 2800000, 5000000, 5500000, 3, 80),
(8, 8, 2500000, 5000000, 3200000, 2, 40),
(9, 9, 2200000, 2000000, 2700000, 5, 60),
(10, 10, 2500000, 2000000, 2500000, 2, 60);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ranking`
--

CREATE TABLE `tbl_ranking` (
  `id_ranking` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `total_nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ranking`
--

INSERT INTO `tbl_ranking` (`id_ranking`, `id_alternatif`, `total_nilai`) VALUES
(1, 1, 5.67),
(2, 2, 8.17),
(3, 3, 4.5),
(4, 4, 4.33),
(5, 5, 3.83),
(6, 6, 4),
(7, 7, 7.33),
(8, 8, 3.33),
(9, 9, 5.33),
(10, 10, 4.67);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `password`) VALUES
(4, 'aviga', 'aviga@gmail.com', '$2y$10$HCxhex67EOKvuZPhbpxivOJeLJEkOntySuSdULfJ8hq2KESox410a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `tbl_kecocokan`
--
ALTER TABLE `tbl_kecocokan`
  ADD PRIMARY KEY (`id_kecocokan`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tbl_ranking`
--
ALTER TABLE `tbl_ranking`
  ADD PRIMARY KEY (`id_ranking`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_kecocokan`
--
ALTER TABLE `tbl_kecocokan`
  MODIFY `id_kecocokan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_ranking`
--
ALTER TABLE `tbl_ranking`
  MODIFY `id_ranking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
