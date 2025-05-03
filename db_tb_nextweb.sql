-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2025 at 04:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tb_nextweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi_tender`
--

CREATE TABLE `evaluasi_tender` (
  `evaluasi_id` int(11) NOT NULL,
  `pengajuan_id` int(11) DEFAULT NULL,
  `nilai_teknis` decimal(5,2) DEFAULT NULL,
  `nilai_administrasi` decimal(5,2) DEFAULT NULL,
  `nilai_harga` decimal(5,2) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_tender`
--

CREATE TABLE `kategori_tender` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_tender`
--

CREATE TABLE `pengajuan_tender` (
  `pengajuan_id` int(11) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `tender_id` int(11) DEFAULT NULL,
  `tanggal_pengajuan` datetime NOT NULL,
  `status` enum('Diajukan','Ditolak','Diterima') DEFAULT 'Diajukan',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sertifikasi_tender`
--

CREATE TABLE `sertifikasi_tender` (
  `sertifikat_id` int(11) NOT NULL,
  `tender_id` int(11) DEFAULT NULL,
  `nama_sertifikat` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tender`
--

CREATE TABLE `tender` (
  `tender_id` int(11) NOT NULL,
  `nama_tender` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `nilai_pagu` decimal(15,2) DEFAULT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `nama_vendor` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evaluasi_tender`
--
ALTER TABLE `evaluasi_tender`
  ADD PRIMARY KEY (`evaluasi_id`),
  ADD KEY `fk_evaluasi_pengajuan` (`pengajuan_id`);

--
-- Indexes for table `kategori_tender`
--
ALTER TABLE `kategori_tender`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `pengajuan_tender`
--
ALTER TABLE `pengajuan_tender`
  ADD PRIMARY KEY (`pengajuan_id`),
  ADD KEY `fk_pengajuan_vendor` (`vendor_id`),
  ADD KEY `fk_pengajuan_tender` (`tender_id`);

--
-- Indexes for table `sertifikasi_tender`
--
ALTER TABLE `sertifikasi_tender`
  ADD PRIMARY KEY (`sertifikat_id`),
  ADD KEY `fk_tender` (`tender_id`);

--
-- Indexes for table `tender`
--
ALTER TABLE `tender`
  ADD PRIMARY KEY (`tender_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evaluasi_tender`
--
ALTER TABLE `evaluasi_tender`
  MODIFY `evaluasi_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_tender`
--
ALTER TABLE `kategori_tender`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuan_tender`
--
ALTER TABLE `pengajuan_tender`
  MODIFY `pengajuan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sertifikasi_tender`
--
ALTER TABLE `sertifikasi_tender`
  MODIFY `sertifikat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tender`
--
ALTER TABLE `tender`
  MODIFY `tender_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evaluasi_tender`
--
ALTER TABLE `evaluasi_tender`
  ADD CONSTRAINT `fk_evaluasi_pengajuan` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan_tender` (`pengajuan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan_tender`
--
ALTER TABLE `pengajuan_tender`
  ADD CONSTRAINT `fk_pengajuan_tender` FOREIGN KEY (`tender_id`) REFERENCES `tender` (`tender_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pengajuan_vendor` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sertifikasi_tender`
--
ALTER TABLE `sertifikasi_tender`
  ADD CONSTRAINT `fk_tender` FOREIGN KEY (`tender_id`) REFERENCES `tender` (`tender_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
