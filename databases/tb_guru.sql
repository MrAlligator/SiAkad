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
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(9) NOT NULL,
  `nama_guru` varchar(20) NOT NULL,
  `jk_guru` varchar(12) NOT NULL,
  `tmptlahir` varchar(25) NOT NULL,
  `tgllahir` varchar(128) NOT NULL,
  `agama_guru` varchar(12) NOT NULL,
  `alamat_guru` text NOT NULL,
  `telp_guru` varchar(12) NOT NULL,
  `image_guru` varchar(128) NOT NULL DEFAULT 'default.png',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nip`, `nama_guru`, `jk_guru`, `tmptlahir`, `tgllahir`, `agama_guru`, `alamat_guru`, `telp_guru`, `image_guru`, `status`) VALUES
(6, '082727377', 'Rizki', 'Laki - Laki', 'Banyuwangi', '899157600', 'Islam', 'Prunggahan Kulon', '082331067312', 'default.png', 3),
(7, '082667734', 'Febrero Araya Kusuma', 'Laki - Laki', 'Banyuwangi', '917996400', 'Kristen', 'Banyuwangi', '082234156617', '60a6bc348a442705ae92118194a6ceee.png', 2),
(8, '57647184', 'Suprapto Adhi', 'Laki - Laki', 'Bondowoso', '560818800', 'Islam', 'Tangsil Wetan', '082334156617', '01f0f7f16e26c1fb5bc85268232deb76.png', 2),
(9, '8863992', 'Titik Rosanti', 'Perempuan', 'Nganjuk', '940111200', 'Islam', 'Madiun', '08235166182', '517b1f8cee129272ba2cda1553e38db6.png', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
