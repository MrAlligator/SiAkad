-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 09:19 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_newsmk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(9) NOT NULL,
  `nama_guru` varchar(20) NOT NULL,
  `jk_guru` varchar(12) NOT NULL,
  `tmptlahir` varchar(25) NOT NULL,
  `tgllahir` date NOT NULL,
  `agama_guru` varchar(12) NOT NULL,
  `alamat_guru` text NOT NULL,
  `telp_guru` varchar(12) NOT NULL,
  `status` varchar(12) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nip`, `nama_guru`, `jk_guru`, `tmptlahir`, `tgllahir`, `agama_guru`, `alamat_guru`, `telp_guru`, `status`, `username`, `password`) VALUES
(4, '123456789', 'Mila Marda Fatmawati', 'Perempuan', 'Bondowoso', '2000-03-02', 'Islam', 'Sukosari', '081234156112', 'guru', '123456789', '1234567890'),
(6, '082727377', 'Rizki', 'Laki - Laki', 'Banyuwangi', '1998-06-30', 'Islam', 'Prunggahan Kulon', '082331067312', 'karyawan', '0827273772', '0827273772');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(9) NOT NULL,
  `nama_siswa` varchar(20) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `jk_siswa` text NOT NULL,
  `agama_siswa` text NOT NULL,
  `tmptlhr_siswa` text NOT NULL,
  `tgllhr_siswa` date NOT NULL,
  `alamat_siswa` text NOT NULL,
  `telp_siswa` text NOT NULL,
  `status` varchar(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nama_siswa`, `kelas`, `jk_siswa`, `agama_siswa`, `tmptlhr_siswa`, `tgllhr_siswa`, `alamat_siswa`, `telp_siswa`, `status`, `username`, `password`) VALUES
(19, 'n112', 'Rizki', 'X', 'Perempuan', 'Islam', 'Banyuwangi', '2019-12-01', 'Sukosari', '082412531771', 'siswa', 'n112', 'n112'),
(20, 'n113', 'Febrero Araya', 'XI', 'Laki - Laki', 'Islam', 'Banyuwangi', '1999-02-09', 'Sukosari', '081234156112', 'siswa', 'n113', 'n113');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
