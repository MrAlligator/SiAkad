-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Apr 2022 pada 07.52
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
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `id_konek` int(11) NOT NULL,
  `username_user` varchar(128) NOT NULL,
  `password_user` varchar(128) NOT NULL,
  `viewpassword_user` varchar(128) NOT NULL,
  `status_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_konek`, `username_user`, `password_user`, `viewpassword_user`, `status_user`) VALUES
(1, 0, 'admin', '$2y$10$GIZ9fhk1/9NWFIr2dVaU4.N35ox2LKfOjLwc7RrNf3obVYsSl/NXC', 'admin', 1),
(3, 22, 'N115', '$2y$10$BLHCpGYi3WmezvP.0HciGuVUKAj9DCwb4gNwS.h4YcdKiMnNHHaKy', 'N115', 5),
(4, 0, 'N172', '$2y$10$vsjvCVY8zGYy4A6t9gA2dekQcF5GA6BZV3fB98f1TwjPIFxWcgYZa', 'N172', 5),
(5, 0, '0826677344', '$2y$10$jvPD1igWVReBhejXqo40i.V1lIYrXeCYcarShm2sWRIJ85BVbbHWS', '0826677344', 2),
(6, 0, '57647184', '$2y$10$eIzDXuKDi2eG74.rkZDIkeVXkhxV/sUe9MTQ.fLS/.wv8P5AZM/8m', '57647184', 2),
(7, 0, '8863992', '$2y$10$8u2OnfvPtKWjrGnmNZo/Lu0ZlYcBoJ26t.1RfoAHIifkW3jZrnG0i', '8863992', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
