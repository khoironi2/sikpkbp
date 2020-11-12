-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 12, 2020 at 10:20 AM
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

--
-- Dumping data for table `tbl_dokumentasi`
--

INSERT INTO `tbl_dokumentasi` (`id_dokumentasi`, `id_kegiatan`, `gambar_dokumentasi`, `deskripsi_dokumentasi`, `time_create_dokumentasi`, `time_update_dokumentasi`, `id_users`) VALUES
(1, 4, 'Foto-Penyerahan.jpg', 'galang bantuan', NULL, NULL, NULL);

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

--
-- Dumping data for table `tbl_donasi`
--

INSERT INTO `tbl_donasi` (`id_donasi`, `id_users`, `nominal_donasi`, `bukti_donasi`, `validasi_donasi`, `time_create_donasi`, `time_update_donasi`, `id_kegiatan`, `created_by`) VALUES
(1, 2, '350000', 'ok', 'sudah_tranfer', '2020-11-10 22:36:20', '2020-11-10 22:36:20', 1, NULL),
(2, 1, '800000', 'ok', 'sudah_tranfer', '2020-11-10 23:01:19', '2020-11-10 23:01:19', 2, NULL),
(3, NULL, '1000', NULL, 'sudah_tranfer', '2020-11-10 23:28:15', '2020-11-10 23:28:15', 3, 2),
(4, NULL, '1000', NULL, 'sudah_tranfer', '2020-11-10 23:30:40', '2020-11-10 23:30:40', 4, 2),
(5, 1, '2000000', 'ok', 'sudah_tranfer', '2020-11-10 23:39:42', '2020-11-10 23:39:42', 1, NULL),
(6, 1, '1500000', 'ok', 'sudah_tranfer', '2020-11-10 23:40:37', '2020-11-10 23:40:37', 1, NULL),
(7, 1, '900000', 'IMG-20180720-WA00061.jpg', 'terkonfirmasi', '2020-11-11 10:23:38', '2020-11-11 13:31:43', 3, NULL),
(8, 1, '90000000', NULL, 'belum_transfer', '2020-11-11 10:42:30', '2020-11-11 13:12:47', 2, NULL),
(9, 1, '90000000', 'IMG-20180720-WA0006.jpg', 'terkonfirmasi', '2020-11-11 10:59:35', '2020-11-11 13:28:35', 2, NULL);

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
  `id_users` int(11) DEFAULT NULL,
  `status_kegiatan` enum('aktif','belum_aktif') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `nama_kegiatan`, `time_pelakasanaan_kegiatan`, `gambar_kegiatan`, `deskripsi_kegitan`, `nominal_dana_kegiatan`, `time_create_kegiatan`, `time_update_kegiatan`, `id_users`, `status_kegiatan`) VALUES
(1, 'Sedekah Jalanan', '2020-11-20 00:00:00', 'uas.jpg', NULL, '3500000', NULL, NULL, NULL, 'aktif'),
(2, 'Kegiatan Amal', '2020-11-27 00:00:00', 'download.jpg', NULL, '8700000', NULL, NULL, NULL, 'aktif'),
(3, 'Mancing Mania', '2020-11-30 00:00:00', 'kapal_pniisi.jpg', NULL, '8400000', NULL, NULL, NULL, 'aktif'),
(4, 'Galang Bantuan Covid - 9', '2020-12-12 00:00:00', 'Foto-Penyerahan.jpg', NULL, '178600000', NULL, NULL, NULL, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laporan_donasi`
--

CREATE TABLE `tbl_laporan_donasi` (
  `id_laporan_donasi` int(11) NOT NULL,
  `id_kegiatan` int(11) DEFAULT NULL,
  `nama_file` varchar(256) NOT NULL,
  `file_laporan_donasi` varchar(255) DEFAULT NULL,
  `deskripsi_laporan_donasi` varchar(255) DEFAULT NULL,
  `time_create_laporan_donasi` datetime DEFAULT NULL,
  `time_update_laporan_donasi` datetime DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_laporan_donasi`
--

INSERT INTO `tbl_laporan_donasi` (`id_laporan_donasi`, `id_kegiatan`, `nama_file`, `file_laporan_donasi`, `deskripsi_laporan_donasi`, `time_create_laporan_donasi`, `time_update_laporan_donasi`, `id_users`) VALUES
(2, 4, 'laporan covd', '5231-12447-1-PB.pdf', 'laporan covid', NULL, NULL, 2);

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
  `time_update_users` datetime DEFAULT NULL,
  `alamat_users` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_users`, `name`, `telepon_users`, `email`, `password`, `level`, `time_login_users`, `time_logout_users`, `gambar_users`, `time_create_users`, `time_update_users`, `alamat_users`) VALUES
(1, 'khoironi', '085156587695', 'masrony37@gmail.com', '$2y$10$Iz1BhaHXYF8OMGkFUlPt3.TPB/W5bIP5i4AXDDERz/lNzJHF1rwR6', 'donatur', '2020-11-12 09:41:50', '2020-11-12 10:12:02', '235227181.png', '2020-11-10 16:51:42', NULL, 'Jl. Jambu Biji'),
(2, 'adeline', '0895634369096', 'akusaraadeline20@gmail.com', '$2y$10$.b3R/e1R/oUrpMCduMBJ0eJfdZygo/bzIYOZ/AAaBx73uGBOCBcZi', 'admin', '2020-11-12 10:12:19', '2020-11-12 10:12:41', 'admin.png', '2020-11-10 16:53:33', NULL, 'Jl. Jambu Batu'),
(3, 'ketua', '08512387434', 'ketua.adeline@gmail.com', '$2y$10$ixPVNjOqQCJmlaKqWb71IuhbE7IDDI7J1WDRKP4o6YgZpEogS8dT6', 'ketua', '2020-11-12 10:16:47', '2020-11-12 10:18:05', 'foto_bung_hatta.jpg', '2020-11-10 16:55:34', NULL, 'Jl. Jambu Batu');

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
  MODIFY `id_dokumentasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_donasi`
--
ALTER TABLE `tbl_donasi`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_laporan_donasi`
--
ALTER TABLE `tbl_laporan_donasi`
  MODIFY `id_laporan_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
