-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2022 at 08:05 AM
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
  `tgllahir` varchar(128) NOT NULL,
  `agama_guru` varchar(12) NOT NULL,
  `alamat_guru` text NOT NULL,
  `telp_guru` varchar(12) NOT NULL,
  `image_guru` varchar(128) NOT NULL DEFAULT 'default.png',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nip`, `nama_guru`, `jk_guru`, `tmptlahir`, `tgllahir`, `agama_guru`, `alamat_guru`, `telp_guru`, `image_guru`, `status`) VALUES
(6, '082727377', 'Rizki', 'Laki - Laki', 'Banyuwangi', '899157600', 'Islam', 'Prunggahan Kulon', '082331067312', 'default.png', 3),
(7, '082667734', 'Febrero Araya Kusuma', 'Laki - Laki', 'Banyuwangi', '917996400', 'Kristen', 'Banyuwangi', '082234156617', '60a6bc348a442705ae92118194a6ceee.png', 2),
(8, '57647184', 'Suprapto Adhi', 'Laki - Laki', 'Bondowoso', '560818800', 'Islam', 'Tangsil Wetan', '082334156617', '01f0f7f16e26c1fb5bc85268232deb76.png', 2),
(9, '8863992', 'Titik Rosanti', 'Perempuan', 'Nganjuk', '940111200', 'Islam', 'Madiun', '08235166182', '517b1f8cee129272ba2cda1553e38db6.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'Teknik Komputer dan Jaringan'),
(2, 'Multimedia'),
(3, 'Rekayasa Perangkat Lunak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`) VALUES
(1, 'X'),
(2, 'XI'),
(3, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konten`
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
-- Dumping data for table `tb_konten`
--

INSERT INTO `tb_konten` (`id_konten`, `jenis_konten`, `judul_konten`, `slug_konten`, `excerpt_konten`, `body_konten`, `image_konten`, `uploaded_at`) VALUES
(1, 1, 'SMK Darussalam Akan Melaksanakan Akreditasi Pertama', 'smk-darussalam-akan-melaksanakan-akreditasi-pertama.html', '<div>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab debitis natus numquam commodi incidunt magnam aliquid blanditiis deleniti temporibus corrupti consectetur non, maxime fugiat iste dicta perferendis nobis tenetur quaerat!</div>', '<div style=\"text-align: justify;\">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste nisi, repellendus illo quo error iure saepe temporibus cum accusantium ea debitis beatae, consequatur alias, suscipit laborum cumque quaerat. Rerum deserunt mollitia earum sapiente accusamus minima quaerat, illo, excepturi enim tempore esse exercitationem vero vel aspernatur laborum impedit quod, unde soluta fugit. Nam consequatur sequi ea dolorum neque incidunt omnis illo laborum suscipit accusamus in officiis voluptatibus similique, dolorem vero reprehenderit totam atque mollitia. Qui deserunt unde fugit saepe explicabo neque! Eveniet repellendus dolorum ipsa tenetur suscipit cumque officiis, voluptatibus iure illo, provident culpa laborum temporibus ducimus repellat molestiae possimus odio vero in nam tempore inventore ratione esse. Necessitatibus ex adipisci tenetur ullam possimus. Corporis minus nihil libero hic, itaque accusantium quos dignissimos, temporibus earum aliquid facere quam. Minima, ipsam dolor sint dignissimos vitae aspernatur eaque? Velit voluptate excepturi placeat consequuntur deserunt est? Fugit fugiat accusantium magnam dolores aliquid doloribus sed quisquam modi itaque velit facilis dolorem, quos, accusamus est id harum. Ut, fuga quos eaque fugiat unde alias molestiae. Consequatur laboriosam deleniti excepturi, illo ducimus repellendus vitae voluptas nisi tenetur vel itaque magni dolorum, iste maxime iusto commodi reprehenderit delectus reiciendis nobis labore, aliquam voluptatem voluptates veritatis. Delectus ut placeat dicta quod consequuntur rem distinctio repellat, voluptatem nemo adipisci error, laboriosam unde eum perspiciatis inventore molestiae. Non quibusdam alias dolor, expedita odio sed accusantium nobis nulla reiciendis doloremque eius iure eveniet debitis rem incidunt commodi laudantium aliquam minima, ipsam unde, sapiente itaque. Incidunt, nulla voluptatum quia nisi tempora voluptatem tempore vel repellat repellendus consequuntur? A recusandae totam soluta accusantium, consectetur ducimus sunt, et cumque ad eos suscipit aspernatur quisquam nobis ullam voluptatibus laborum alias. Eveniet voluptatem, et eaque totam optio dolorum debitis necessitatibus maxime ab expedita officia veniam mollitia magnam sapiente temporibus? Error libero odio repellendus quae fuga adipisci laboriosam?</div>', '9b4b7e2898750b1233b476d890911647.jpg', '1650025188');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) NOT NULL,
  `kode_mapel` varchar(10) NOT NULL,
  `nama_mapel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `kode_mapel`, `nama_mapel`) VALUES
(1, 'M001', 'Matematika'),
(2, 'M002', 'Bahasa Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `tb_materi`
--

CREATE TABLE `tb_materi` (
  `id_materi` int(11) NOT NULL,
  `judul_materi` varchar(128) NOT NULL,
  `kode_mapel` varchar(128) NOT NULL,
  `file_name` varchar(128) NOT NULL,
  `kelas` varchar(128) NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `uploaded_at` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_materi`
--

INSERT INTO `tb_materi` (`id_materi`, `judul_materi`, `kode_mapel`, `file_name`, `kelas`, `uploaded_by`, `uploaded_at`) VALUES
(1, 'Matematika Untuk kelas X', 'Matematika', 'matematika.pdf', 'X', 21, '2563671888');

-- --------------------------------------------------------

--
-- Table structure for table `tb_media`
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
-- Table structure for table `tb_nilai`
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
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `nis`, `id_kelas`, `id_jurusan`, `kode_mapel`, `nip`, `nilai_uh_1`, `nilai_uh_2`, `nilai_uh_3`, `nilai_uh_4`, `nilai_uts`, `nilai_uas`, `nilai_sikap`) VALUES
(1, 'n112', 0, 0, '', '', 0, 0, 0, 0, 0, 0, ''),
(2, 'n112', 0, 0, 'Matematika', '', 0, 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajar`
--

CREATE TABLE `tb_pengajar` (
  `id_pengajar` int(11) NOT NULL,
  `kode_mapel` varchar(128) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nip` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengajar`
--

INSERT INTO `tb_pengajar` (`id_pengajar`, `kode_mapel`, `id_kelas`, `id_jurusan`, `nip`) VALUES
(1, 'M001', 1, 1, '57647184');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prestasi`
--

CREATE TABLE `tb_prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `file_name` varchar(128) NOT NULL,
  `uploaded_at` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(9) NOT NULL,
  `nama_siswa` varchar(20) NOT NULL,
  `foto_siswa` varchar(128) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `jk_siswa` text NOT NULL,
  `agama_siswa` text NOT NULL,
  `tmptlhr_siswa` text NOT NULL,
  `tgllhr_siswa` date NOT NULL,
  `alamat_siswa` text NOT NULL,
  `telp_siswa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nama_siswa`, `foto_siswa`, `kelas`, `id_jurusan`, `jk_siswa`, `agama_siswa`, `tmptlhr_siswa`, `tgllhr_siswa`, `alamat_siswa`, `telp_siswa`) VALUES
(19, 'n112', 'Rizki', 'index.jpg', 'X', 0, 'Perempuan', 'Islam', 'Banyuwangi', '2019-12-01', 'Sukosari', '082412531771'),
(20, 'n113', 'Febrero Araya', 'index.jpg', 'XI', 0, 'Laki - Laki', 'Islam', 'Banyuwangi', '1999-02-09', 'Sukosari', '081234156112');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
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
-- Dumping data for table `tb_user`
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
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_konten`
--
ALTER TABLE `tb_konten`
  ADD PRIMARY KEY (`id_konten`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `tb_media`
--
ALTER TABLE `tb_media`
  ADD PRIMARY KEY (`id_media`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indexes for table `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_konten`
--
ALTER TABLE `tb_konten`
  MODIFY `id_konten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_materi`
--
ALTER TABLE `tb_materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_media`
--
ALTER TABLE `tb_media`
  MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  MODIFY `id_pengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
