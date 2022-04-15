-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Apr 2022 pada 15.48
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

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_konten`
--
ALTER TABLE `tb_konten`
  ADD PRIMARY KEY (`id_konten`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_konten`
--
ALTER TABLE `tb_konten`
  MODIFY `id_konten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
