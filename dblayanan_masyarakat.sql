-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 05:15 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblayanan_masyarakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbadmin`
--

CREATE TABLE `tbadmin` (
  `id` int(11) NOT NULL,
  `username` varchar(6) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbadmin`
--

INSERT INTO `tbadmin` (`id`, `username`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tbaspirasi`
--

CREATE TABLE `tbaspirasi` (
  `id_pelaporan` int(11) NOT NULL,
  `id` varchar(5) NOT NULL,
  `nik` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(300) NOT NULL,
  `laporan` varchar(300) NOT NULL,
  `gambar` varchar(300) NOT NULL,
  `jenis_aspirasi` enum('Keamanan','Kebersihan','Keadilan') NOT NULL,
  `status` enum('Belum di Proses','Sudah di Proses') NOT NULL,
  `ratting` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbaspirasi`
--

INSERT INTO `tbaspirasi` (`id_pelaporan`, `id`, `nik`, `tanggal`, `lokasi`, `laporan`, `gambar`, `jenis_aspirasi`, `status`, `ratting`) VALUES
(1, 'E8KwC', 317909090, '2022-11-17', 'kelas 12 tel 8', 'AC mati dan Wifi lemot', '', 'Kebersihan', 'Sudah di Proses', 'Sangat Bagus'),
(2, 'qk9QO', 317909090, '2022-11-17', 'tel 6', 'hp hilang', 'pengumpulan backend.pdf', 'Keadilan', 'Belum di Proses', 'Sangat Bagus'),
(3, 'eN3cl', 317909000, '2022-11-02', 'tel 1', 'ac rusak', 'Desain tanpa judul (6).png', 'Kebersihan', 'Belum di Proses', 'Buruk'),
(4, '5lCUK', 317909000, '2022-11-11', 'bahrbf', 'jet', 'memprediksi masa depan bukanlah sihir, itu kecerdasan buatan (40).png', 'Keamanan', 'Belum di Proses', 'Sangat Bagus');

-- --------------------------------------------------------

--
-- Table structure for table `tbulasan`
--

CREATE TABLE `tbulasan` (
  `id` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `ulasan` varchar(300) NOT NULL,
  `gambar` varchar(300) NOT NULL,
  `status` enum('Belum di Proses','Sudah di Proses') NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbulasan`
--

INSERT INTO `tbulasan` (`id`, `nik`, `ulasan`, `gambar`, `status`, `tanggal`) VALUES
(1, 317909090, 'bagus', '', 'Belum di Proses', '2022-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `nik` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`nik`, `username`, `password`) VALUES
(317909000, 'aura', 123),
(317909090, 'Aura Ramadhani', 12345);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbadmin`
--
ALTER TABLE `tbadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbaspirasi`
--
ALTER TABLE `tbaspirasi`
  ADD PRIMARY KEY (`id_pelaporan`),
  ADD KEY `fknik` (`nik`);

--
-- Indexes for table `tbulasan`
--
ALTER TABLE `tbulasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbadmin`
--
ALTER TABLE `tbadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbaspirasi`
--
ALTER TABLE `tbaspirasi`
  MODIFY `id_pelaporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbulasan`
--
ALTER TABLE `tbulasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `nik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317909091;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbaspirasi`
--
ALTER TABLE `tbaspirasi`
  ADD CONSTRAINT `fknik` FOREIGN KEY (`nik`) REFERENCES `tbuser` (`nik`);

--
-- Constraints for table `tbulasan`
--
ALTER TABLE `tbulasan`
  ADD CONSTRAINT `nik` FOREIGN KEY (`nik`) REFERENCES `tbuser` (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
