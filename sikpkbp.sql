-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 10, 2020 at 04:57 PM
-- Server version: 5.7.24
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikpkbp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokumentasi`
--

CREATE TABLE `tbl_dokumentasi` (
  `id_dokumentasi` int(11) NOT NULL,
  `id_kegiatan` int(11) DEFAULT NULL,
  `gambar_dokumentasi` varchar(255) DEFAULT NULL,
  `deskripsi_dokumentasi` varchar(255) DEFAULT NULL,
  `time_create_dokumentasi` datetime DEFAULT NULL,
  `time_update_dokumentasi` datetime DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donasi`
--

CREATE TABLE `tbl_donasi` (
  `id_donasi` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `nominal_donasi` varchar(255) DEFAULT NULL,
  `bukti_donasi` varchar(255) DEFAULT NULL,
  `validasi_donasi` enum('belum_transfer','sudah_tranfer','terkonfirmasi') DEFAULT NULL,
  `time_create_donasi` datetime DEFAULT NULL,
  `time_update_donasi` datetime DEFAULT NULL,
  `id_kegiatan` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `time_pelakasanaan_kegiatan` datetime DEFAULT NULL,
  `gambar_kegiatan` varchar(255) DEFAULT NULL,
  `deskripsi_kegitan` varchar(255) DEFAULT NULL,
  `nominal_dana_kegiatan` varchar(255) DEFAULT NULL,
  `time_create_kegiatan` datetime DEFAULT NULL,
  `time_update_kegiatan` datetime DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laporan_donasi`
--

CREATE TABLE `tbl_laporan_donasi` (
  `id_laporan_donasi` int(11) NOT NULL,
  `id_kegiatan` int(11) DEFAULT NULL,
  `file_laporan_donasi` varchar(255) DEFAULT NULL,
  `deskripsi_laporan_donasi` varchar(255) DEFAULT NULL,
  `time_create_laporan_donasi` datetime DEFAULT NULL,
  `time_update_laporan_donasi` datetime DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_users` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `telepon_users` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('donatur','admin','ketua') DEFAULT NULL,
  `time_login_users` datetime DEFAULT NULL,
  `time_logout_users` datetime DEFAULT NULL,
  `gambar_users` varchar(255) DEFAULT NULL,
  `time_create_users` datetime DEFAULT NULL,
  `time_update_users` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_users`, `name`, `telepon_users`, `email`, `password`, `level`, `time_login_users`, `time_logout_users`, `gambar_users`, `time_create_users`, `time_update_users`) VALUES
(1, 'khoironi', '085156587695', 'masrony37@gmail.com', '$2y$10$Iz1BhaHXYF8OMGkFUlPt3.TPB/W5bIP5i4AXDDERz/lNzJHF1rwR6', 'donatur', NULL, NULL, NULL, '2020-11-10 16:51:42', NULL),
(2, 'adeline', '0895634369096', 'akusaraadeline20@gmail.com', '$2y$10$.b3R/e1R/oUrpMCduMBJ0eJfdZygo/bzIYOZ/AAaBx73uGBOCBcZi', 'admin', NULL, NULL, NULL, '2020-11-10 16:53:33', NULL),
(3, 'ketua', '08512387434', 'ketua.adeline@gmail.com', '$2y$10$ixPVNjOqQCJmlaKqWb71IuhbE7IDDI7J1WDRKP4o6YgZpEogS8dT6', 'ketua', NULL, NULL, NULL, '2020-11-10 16:55:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dokumentasi`
--
ALTER TABLE `tbl_dokumentasi`
  ADD PRIMARY KEY (`id_dokumentasi`);

--
-- Indexes for table `tbl_donasi`
--
ALTER TABLE `tbl_donasi`
  ADD PRIMARY KEY (`id_donasi`);

--
-- Indexes for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tbl_laporan_donasi`
--
ALTER TABLE `tbl_laporan_donasi`
  ADD PRIMARY KEY (`id_laporan_donasi`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_dokumentasi`
--
ALTER TABLE `tbl_dokumentasi`
  MODIFY `id_dokumentasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_donasi`
--
ALTER TABLE `tbl_donasi`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_laporan_donasi`
--
ALTER TABLE `tbl_laporan_donasi`
  MODIFY `id_laporan_donasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
