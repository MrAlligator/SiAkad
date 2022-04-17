-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Apr 2022 pada 09.27
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
  `nip` varchar(128) NOT NULL,
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
(7, '0826677344', 'Febrero Araya Kusuma', 'Laki - Laki', 'Banyuwangi', '917996400', 'Kristen', 'Banyuwangi', '082234156617', '60a6bc348a442705ae92118194a6ceee.png', 2),
(8, '57647184', 'Suprapto Adhi', 'Laki - Laki', 'Bondowoso', '560818800', 'Islam', 'Tangsil Wetan', '082334156617', '01f0f7f16e26c1fb5bc85268232deb76.png', 2),
(9, '8863992', 'Titik Rosanti', 'Perempuan', 'Nganjuk', '940111200', 'Islam', 'Madiun', '08235166182', '517b1f8cee129272ba2cda1553e38db6.png', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `kode_mapel` varchar(20) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `jam` varchar(128) NOT NULL,
  `hari` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `kode_mapel`, `id_kelas`, `id_jurusan`, `nip`, `jam`, `hari`) VALUES
(1, 'M001', 1, 1, '57647184', '07:00 - 07:45', 'Senin'),
(3, 'M004', 2, 2, '082667734', '07:00 - 07-45', 'Selasa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'Teknik Komputer dan Jaringan'),
(2, 'Multimedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`) VALUES
(1, 'X'),
(2, 'XI'),
(3, 'XII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_konten`
--

CREATE TABLE `tb_konten` (
  `id_konten` int(11) NOT NULL,
  `jenis_konten` int(11) NOT NULL,
  `judul_konten` varchar(256) NOT NULL,
  `slug_konten` varchar(256) NOT NULL,
  `excerpt_konten` text NOT NULL,
  `body_konten` text NOT NULL,
  `image_konten` varchar(128) NOT NULL,
  `uploaded_at` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_konten`
--

INSERT INTO `tb_konten` (`id_konten`, `jenis_konten`, `judul_konten`, `slug_konten`, `excerpt_konten`, `body_konten`, `image_konten`, `uploaded_at`) VALUES
(1, 1, 'SMK Darussalam Akan Melaksanakan Akreditasi Pertama', 'smk-darussalam-akan-melaksanakan-akreditasi-pertama.html', '<div>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab debitis natus numquam commodi incidunt magnam aliquid blanditiis deleniti temporibus corrupti consectetur non, maxime fugiat iste dicta perferendis nobis tenetur quaerat!</div>', '<div style=\"text-align: justify;\">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste nisi, repellendus illo quo error iure saepe temporibus cum accusantium ea debitis beatae, consequatur alias, suscipit laborum cumque quaerat. Rerum deserunt mollitia earum sapiente accusamus minima quaerat, illo, excepturi enim tempore esse exercitationem vero vel aspernatur laborum impedit quod, unde soluta fugit. Nam consequatur sequi ea dolorum neque incidunt omnis illo laborum suscipit accusamus in officiis voluptatibus similique, dolorem vero reprehenderit totam atque mollitia. Qui deserunt unde fugit saepe explicabo neque! Eveniet repellendus dolorum ipsa tenetur suscipit cumque officiis, voluptatibus iure illo, provident culpa laborum temporibus ducimus repellat molestiae possimus odio vero in nam tempore inventore ratione esse. Necessitatibus ex adipisci tenetur ullam possimus. Corporis minus nihil libero hic, itaque accusantium quos dignissimos, temporibus earum aliquid facere quam. Minima, ipsam dolor sint dignissimos vitae aspernatur eaque? Velit voluptate excepturi placeat consequuntur deserunt est? Fugit fugiat accusantium magnam dolores aliquid doloribus sed quisquam modi itaque velit facilis dolorem, quos, accusamus est id harum. Ut, fuga quos eaque fugiat unde alias molestiae. Consequatur laboriosam deleniti excepturi, illo ducimus repellendus vitae voluptas nisi tenetur vel itaque magni dolorum, iste maxime iusto commodi reprehenderit delectus reiciendis nobis labore, aliquam voluptatem voluptates veritatis. Delectus ut placeat dicta quod consequuntur rem distinctio repellat, voluptatem nemo adipisci error, laboriosam unde eum perspiciatis inventore molestiae. Non quibusdam alias dolor, expedita odio sed accusantium nobis nulla reiciendis doloremque eius iure eveniet debitis rem incidunt commodi laudantium aliquam minima, ipsam unde, sapiente itaque. Incidunt, nulla voluptatum quia nisi tempora voluptatem tempore vel repellat repellendus consequuntur? A recusandae totam soluta accusantium, consectetur ducimus sunt, et cumque ad eos suscipit aspernatur quisquam nobis ullam voluptatibus laborum alias. Eveniet voluptatem, et eaque totam optio dolorum debitis necessitatibus maxime ab expedita officia veniam mollitia magnam sapiente temporibus? Error libero odio repellendus quae fuga adipisci laboriosam?</div>', '9b4b7e2898750b1233b476d890911647.jpg', '1650025188');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) NOT NULL,
  `kode_mapel` varchar(10) NOT NULL,
  `nama_mapel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `kode_mapel`, `nama_mapel`) VALUES
(1, 'M001', 'Matematika'),
(3, 'M002', 'Bahasa Indonesia'),
(4, 'M003', 'Fisika'),
(5, 'M004', 'Bahasa Inggris'),
(6, 'M005', 'Kesenian'),
(7, 'M006', 'PKN'),
(8, 'M007', 'Sejarah'),
(9, 'M008', 'Agama'),
(10, 'M009', 'Bahasa Jepang'),
(11, 'M010', 'Bahasa Jerman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_materi`
--

CREATE TABLE `tb_materi` (
  `id_materi` int(11) NOT NULL,
  `judul_materi` varchar(128) NOT NULL,
  `kode_mapel` varchar(128) NOT NULL,
  `file_name` varchar(128) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `uploaded_at` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_materi`
--

INSERT INTO `tb_materi` (`id_materi`, `judul_materi`, `kode_mapel`, `file_name`, `id_kelas`, `uploaded_by`, `uploaded_at`) VALUES
(1, 'Matematika Untuk kelas X', 'Matematika', 'matematika.pdf', 0, 21, '2563671888');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_media`
--

CREATE TABLE `tb_media` (
  `id_media` int(11) NOT NULL,
  `judul_media` varchar(128) NOT NULL,
  `jenis_media` int(11) NOT NULL,
  `file_name` varchar(128) NOT NULL,
  `uploaded_at` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) NOT NULL,
  `nis` varchar(6) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `kode_mapel` varchar(128) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `nilai_uh_1` int(3) NOT NULL,
  `nilai_uh_2` int(11) NOT NULL,
  `nilai_uh_3` int(11) NOT NULL,
  `nilai_uh_4` int(11) NOT NULL,
  `nilai_uts` int(3) NOT NULL,
  `nilai_uas` int(3) NOT NULL,
  `nilai_sikap` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `nis`, `id_kelas`, `id_jurusan`, `kode_mapel`, `nip`, `nilai_uh_1`, `nilai_uh_2`, `nilai_uh_3`, `nilai_uh_4`, `nilai_uts`, `nilai_uas`, `nilai_sikap`) VALUES
(1, 'n112', 0, 0, '', '', 0, 0, 0, 0, 0, 0, ''),
(2, 'n112', 0, 0, 'Matematika', '', 0, 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengajar`
--

CREATE TABLE `tb_pengajar` (
  `id_pengajar` int(11) NOT NULL,
  `kode_mapel` varchar(128) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nip` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengajar`
--

INSERT INTO `tb_pengajar` (`id_pengajar`, `kode_mapel`, `id_kelas`, `id_jurusan`, `nip`) VALUES
(1, 'M001', 1, 1, '57647184'),
(2, 'M001', 2, 2, '082667734'),
(3, 'M003', 2, 1, '082667734');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_prestasi`
--

CREATE TABLE `tb_prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `file_name` varchar(128) NOT NULL,
  `uploaded_at` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(9) NOT NULL,
  `nama_siswa` varchar(20) NOT NULL,
  `foto_siswa` varchar(128) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `jk_siswa` text NOT NULL,
  `agama_siswa` text NOT NULL,
  `tmptlhr_siswa` text NOT NULL,
  `tgllhr_siswa` varchar(128) NOT NULL,
  `alamat_siswa` text NOT NULL,
  `telp_siswa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nama_siswa`, `foto_siswa`, `id_kelas`, `id_jurusan`, `jk_siswa`, `agama_siswa`, `tmptlhr_siswa`, `tgllhr_siswa`, `alamat_siswa`, `telp_siswa`) VALUES
(19, 'n112', 'Rizki', 'index.jpg', 1, 1, 'Perempuan', 'Islam', 'Banyuwangi', '1650099827', 'Sukosari', '082412531771'),
(20, 'n113', 'Febrero Araya', 'index.jpg', 2, 1, 'Laki - Laki', 'Islam', 'Banyuwangi', '1650088761', 'Sukosari', '081234156112'),
(21, '', '', 'safafs', 0, 0, '', '', '', '', '', ''),
(22, '', 'safasf', 'asfafasfaf', 0, 0, '', '', '', '', '', ''),
(23, '', 'asf', '', 0, 0, '', '', '', '', '', ''),
(24, '', 'bsf', '', 0, 0, '', '', '', '', '', ''),
(25, '', 'bsf', '', 0, 0, '', '', '', '', '', ''),
(26, '', 'bsf', '', 0, 0, '', '', '', '', '', ''),
(27, '', 'bsf', '', 0, 0, '', '', '', '', '', ''),
(28, '', 'bsf', '', 0, 0, '', '', '', '', '', ''),
(29, '', 'bsf', '', 0, 0, '', '', '', '', '', ''),
(30, '', 'bsf', '', 0, 0, '', '', '', '', '', ''),
(31, '', 'bsf', '', 0, 0, '', '', '', '', '', ''),
(32, '', 'bsf', '', 0, 0, '', '', '', '', '', ''),
(33, 'N2022015', 'Rendy Pratama', '3921c76b4cc9c3a8ed3ea1cca7c65b23.png', 1, 2, 'Laki - Laki', 'Islam', 'Bondowoso', '1108162800', 'Bondowoso', '082441552676');

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
(5, 7, '0826677344', '$2y$10$jvPD1igWVReBhejXqo40i.V1lIYrXeCYcarShm2sWRIJ85BVbbHWS', '0826677344', 2),
(6, 8, '57647184', '$2y$10$eIzDXuKDi2eG74.rkZDIkeVXkhxV/sUe9MTQ.fLS/.wv8P5AZM/8m', '57647184', 2),
(7, 9, '8863992', '$2y$10$8u2OnfvPtKWjrGnmNZo/Lu0ZlYcBoJ26t.1RfoAHIifkW3jZrnG0i', '8863992', 3),
(8, 33, 'N2022015', 'N2022015', 'N2022015', 5);

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
  `pilihan_jurusan` int(11) NOT NULL,
  `image_pendaftar` varchar(128) NOT NULL,
  `verified_berkas_pendaftar` int(11) NOT NULL,
  `lolos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tmp_pendaftaran`
--

INSERT INTO `tmp_pendaftaran` (`id_pendaftaran`, `no_pendaftaran`, `asal_smp`, `nama_pendaftar`, `tmptlhr_pendaftar`, `tgllhr_pendaftar`, `jk_pendaftar`, `agama_pendaftar`, `alamat_pendaftar`, `telp_pendaftar`, `pilihan_jurusan`, `image_pendaftar`, `verified_berkas_pendaftar`, `lolos`) VALUES
(1, '1650063741', 'SMPN 5 Bondowoso', 'Marissa Aridya Pasha', 'Bondowoso', '100007366', 'Perempuan', 'Islam', 'Bondowoso', '081335267827', 1, 'decb9187649184072300dc45bc84a805.png', 1, 0),
(2, '1650093266', 'SMPN 5 Bondowoso', 'Rendy Pratama', 'Bondowoso', '1108162800', 'Laki - Laki', 'Islam', 'Bondowoso', '082441552676', 2, '3921c76b4cc9c3a8ed3ea1cca7c65b23.png', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_konten`
--
ALTER TABLE `tb_konten`
  ADD PRIMARY KEY (`id_konten`);

--
-- Indeks untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indeks untuk tabel `tb_media`
--
ALTER TABLE `tb_media`
  ADD PRIMARY KEY (`id_media`);

--
-- Indeks untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indeks untuk tabel `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tmp_pendaftaran`
--
ALTER TABLE `tmp_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_konten`
--
ALTER TABLE `tb_konten`
  MODIFY `id_konten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_materi`
--
ALTER TABLE `tb_materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_media`
--
ALTER TABLE `tb_media`
  MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  MODIFY `id_pengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tmp_pendaftaran`
--
ALTER TABLE `tmp_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
