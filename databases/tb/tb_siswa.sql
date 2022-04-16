-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Apr 2022 pada 07.51
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
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(9) NOT NULL,
  `nama_siswa` varchar(20) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `jk_siswa` text NOT NULL,
  `agama_siswa` text NOT NULL,
  `tmptlhr_siswa` text NOT NULL,
  `tgllhr_siswa` varchar(128) NOT NULL,
  `alamat_siswa` text NOT NULL,
  `telp_siswa` text NOT NULL,
  `image_siswa` varchar(128) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nama_siswa`, `kelas`, `jk_siswa`, `agama_siswa`, `tmptlhr_siswa`, `tgllhr_siswa`, `alamat_siswa`, `telp_siswa`, `image_siswa`) VALUES
(19, 'n112', 'Rizki Widya Pratama', 'X', 'Laki - Laki', 'Islam', 'Banyuwangi', '899157600', 'Semanding', '082331067312', 'd3f400045ebca9e36c9c19350db3a103.png'),
(20, 'n113', 'Febrero Araya', 'XI', 'Laki - Laki', 'Islam', 'Banyuwangi', '960242400', 'Sukosari', '081234156112', 'default.png'),
(22, 'N115', 'Fabryzal Adam Pramud', 'XI', 'Laki - Laki', 'Hindu', 'Bondowoso', '960242400', 'Bondowoso', '08234516715', '56fd1d49fb9bdc603ad715b852ecae6d.png'),
(23, 'N172', 'Febiola Putri', 'XII', 'Perempuan', 'Islam', 'Banyuwangi', '960242400', 'Genteng Kulon', '08231451667', '7f62f06701ae69886a7e203683984cc4.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
