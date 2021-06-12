-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 04:38 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pegawai_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `kode_area` int(3) UNSIGNED ZEROFILL NOT NULL,
  `nama_area` varchar(30) NOT NULL,
  `alamat_area` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`kode_area`, `nama_area`, `alamat_area`) VALUES
(001, 'Gedung 1 Pusat', 'Jl. Dipatiukur 35'),
(002, 'Gedung 2', 'Jl. Ir.H.Juanda 100'),
(003, 'Gedung 3', 'Jl. Ir.H.Juanda 21'),
(004, 'Gedung 4', 'Jl. Ir.H.Juanda 50'),
(005, 'Gedung 5', 'Jl.Malioboro no 10');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `kode_jabatan` int(2) UNSIGNED ZEROFILL NOT NULL,
  `nama_jabatan` varchar(20) NOT NULL,
  `gaji_pokok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`kode_jabatan`, `nama_jabatan`, `gaji_pokok`) VALUES
(01, 'EDP', 1500000),
(02, 'Pemasaran', 1200000),
(03, 'Produksi', 2000000),
(04, 'SDM', 2500000),
(05, 'Akunting', 1300000);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `NIP` char(6) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` enum('p','w') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `kode_jabatan` int(2) UNSIGNED ZEROFILL NOT NULL,
  `kode_area` int(3) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`NIP`, `nama`, `password`, `tgl_lahir`, `gender`, `alamat`, `kota`, `tgl_masuk`, `kode_jabatan`, `kode_area`) VALUES
('000000', 'Angel', '827ccb0eea8a706c4c34a16891f84e7b', '1997-06-17', 'w', 'jalan kenangan no 51', 'Medan', '2021-06-01', 01, 005),
('123456', 'Ikhlas', '827ccb0eea8a706c4c34a16891f84e7b', '1984-03-15', 'p', 'Jl. Sukamaju', 'Sukabumi', '2012-09-20', 05, 001),
('123457', 'Ilham', '827ccb0eea8a706c4c34a16891f84e7b', '1994-04-28', 'p', 'rancaekek', 'bandung', '2015-01-14', 03, 004),
('123458', 'Siti', '827ccb0eea8a706c4c34a16891f84e7b', '1998-06-18', 'w', 'Bojong Gede', 'Jakarta', '2019-06-13', 02, 004),
('admin', 'admin', 'eb9c7c38a7d8f86fbb795d260ee2a5b1', '2021-06-06', 'p', '-', '-', '2021-06-06', 01, 002);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`kode_area`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kode_jabatan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`NIP`),
  ADD UNIQUE KEY `NIP` (`NIP`),
  ADD KEY `kode_area_FK2` (`kode_area`),
  ADD KEY `kode_jabatan_FK1` (`kode_jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `kode_area` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `kode_jabatan` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `kode_area_FK2` FOREIGN KEY (`kode_area`) REFERENCES `area` (`kode_area`) ON DELETE CASCADE,
  ADD CONSTRAINT `kode_jabatan_FK1` FOREIGN KEY (`kode_jabatan`) REFERENCES `jabatan` (`kode_jabatan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
