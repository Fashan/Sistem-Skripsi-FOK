-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 03:23 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `skripsi`
--

CREATE TABLE `skripsi` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` bigint(20) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `abstrak` longtext NOT NULL,
  `file` varchar(50) DEFAULT NULL,
  `status_pem1` varchar(10) DEFAULT NULL,
  `status_pem2` varchar(10) DEFAULT NULL,
  `status_pnj1` varchar(10) DEFAULT NULL,
  `status_pnj2` varchar(10) DEFAULT NULL,
  `catatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skripsi`
--

INSERT INTO `skripsi` (`id`, `mahasiswa_id`, `judul`, `abstrak`, `file`, `status_pem1`, `status_pem2`, `status_pnj1`, `status_pnj2`, `catatan`) VALUES
(19, 53, 'Tuliskan Judul Skripsi Disini', 'papakan abstrak', NULL, 'ACC', 'ACC', 'ACC', 'belum ACC', 'lulus dengan revisi'),
(20, 55, 'sebuah judul pertama', 'sebuah abstrak', 'example.pdf', 'ACC', 'ACC', 'ACC', 'belum ACC', 'lulus dengan revisi 1 bulan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `skripsi`
--
ALTER TABLE `skripsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `skripsi`
--
ALTER TABLE `skripsi`
  ADD CONSTRAINT `skripsi_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
