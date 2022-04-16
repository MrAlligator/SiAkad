-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Apr 2022 pada 09.21
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.15

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
-- Struktur dari tabel `tmp_pendaftaran`
--

CREATE TABLE `tmp_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `no_pendaftaran` varchar(128) NOT NULL,
  `asal_smp` varchar(128) NOT NULL,
  `nama_pendaftar` varchar(128) NOT NULL,
  `tmptlhr_pendaftar` varchar(128) NOT NULL,
  `tgllhr_pendaftar` varchar(128) NOT NULL,
  `jk_pendaftar` varchar(128) NOT NULL,
  `agama_pendaftar` varchar(128) NOT NULL,
  `alamat_pendaftar` text NOT NULL,
  `telp_pendaftar` varchar(128) NOT NULL,
  `image_pendaftar` varchar(128) NOT NULL,
  `verified_berkas_pendaftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tmp_pendaftaran`
--

INSERT INTO `tmp_pendaftaran` (`id_pendaftaran`, `no_pendaftaran`, `asal_smp`, `nama_pendaftar`, `tmptlhr_pendaftar`, `tgllhr_pendaftar`, `jk_pendaftar`, `agama_pendaftar`, `alamat_pendaftar`, `telp_pendaftar`, `image_pendaftar`, `verified_berkas_pendaftar`) VALUES
(1, '1650063741', 'SMPN 5 Bondowoso', 'Marissa Aridya Pasha', 'Bondowoso', '100007366', 'Perempuan', 'Islam', 'Bondowoso', '081335267827', 'decb9187649184072300dc45bc84a805.png', 1),
(2, '1650093266', 'SMPN 5 Bondowoso', 'Rendy Pratama', 'Bondowoso', '1108162800', 'Laki - Laki', 'Islam', 'Bondowoso', '082441552676', '3921c76b4cc9c3a8ed3ea1cca7c65b23.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tmp_pendaftaran`
--
ALTER TABLE `tmp_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tmp_pendaftaran`
--
ALTER TABLE `tmp_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
