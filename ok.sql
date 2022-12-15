-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2022 pada 14.42
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pusing`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_08_02_060036_users_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_alpha`
--

CREATE TABLE `t_alpha` (
  `id_alpha` bigint(255) NOT NULL,
  `nilai_alpha` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_alpha`
--

INSERT INTO `t_alpha` (`id_alpha`, `nilai_alpha`) VALUES
(45, 0.2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_balita`
--

CREATE TABLE `t_balita` (
  `id_balita` int(11) NOT NULL,
  `nama_balita` varchar(110) NOT NULL,
  `id_jenis_kelamin` int(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tb_lahir` varchar(100) NOT NULL,
  `bb_lahir` varchar(100) NOT NULL,
  `nama_ortu` varchar(110) NOT NULL,
  `id_puskes` int(11) NOT NULL,
  `kode_desa` varchar(110) NOT NULL,
  `alamat` varchar(110) NOT NULL,
  `tgl_pengukuran` date NOT NULL,
  `tb` float NOT NULL,
  `bb` float NOT NULL,
  `lila` varchar(100) NOT NULL,
  `hasil` enum('pendek','sangatpendek','normal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_balita`
--

INSERT INTO `t_balita` (`id_balita`, `nama_balita`, `id_jenis_kelamin`, `tgl_lahir`, `tb_lahir`, `bb_lahir`, `nama_ortu`, `id_puskes`, `kode_desa`, `alamat`, `tgl_pengukuran`, `tb`, `bb`, `lila`, `hasil`) VALUES
(41, 'SAIRA BULILANGO ', 2, '2019-09-07', '47', '2.8', 'eto bulilango ', 14, '321', 'ds. karya indah ', '2022-02-15', 79, 10, '0', 'pendek'),
(43, 'PUTRI INTAN PULUMUDUYO', 2, '2020-07-05', '3', '49', 'ALMA JAFAR?', 14, '322', 'BT', '2022-02-08', 72, 8, '0', 'sangatpendek'),
(44, 'ASKA FAIZAN NUSI', 1, '2019-09-02', '2.7', '47', 'Supandi nusi?', 14, '323', 'taluduyunu', '2022-02-10', 80, 9.7, '0', 'sangatpendek'),
(45, 'LOLAN NENTO', 2, '2020-02-12', '2.7', '47', 'oyan moigo?', 14, '321', 'roji', '2022-02-15', 76.8, 8.5, '0', 'sangatpendek'),
(46, 'SRI HIJRAH KARAMA', 2, '2019-06-04', '2.3', '47', 'siska adinu?', 14, '322', 'BT', '2022-02-08', 8.4, 76, '0', 'sangatpendek'),
(50, 'dandi', 1, '2022-11-17', '123', '100', 'labunga', 15, '4222', 'jln', '2022-11-17', 100, 10, '2', 'pendek'),
(51, 'dandi2', 1, '2022-11-17', '123', '100', 'labunga', 15, '4222', 'jln', '2022-11-17', 100, 10, '2', 'sangatpendek'),
(52, 'dandi', 1, '2022-12-02', '9897', '34', 'dakj', 14, '322', 'lkjhjk', '2022-12-02', 897, 43234, '0', 'pendek'),
(56, 'djalkdjak', 1, '2022-12-03', '3232,342', '3232,342', 'sdadas', 14, '322', 'hgjhgjg', '2022-12-03', 3232, 3232, '3232,342', 'pendek'),
(57, 'mantap', 1, '2022-12-05', '87987', '8909', 'abas', 14, '322', 'jlkjklj', '2022-12-05', 7687680, 78687, '76876', 'normal'),
(58, 'dandi', 1, '2022-12-05', '34.5', '34.5', 'hilen', 14, '322', 'pulubala', '2022-12-05', 34.5, 34.5, '34.5', 'pendek'),
(59, 'sjahdakjh', 1, '2022-12-05', '34.5', '34.5', 'hilen', 30, '501', 'jlkjk', '2022-12-05', 34.5, 34.5, '34.5', 'pendek');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_desa`
--

CREATE TABLE `t_desa` (
  `kd_desa` varchar(100) NOT NULL,
  `nama_desa` varchar(100) NOT NULL,
  `kd_kecamatan` varchar(110) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_desa`
--

INSERT INTO `t_desa` (`kd_desa`, `nama_desa`, `kd_kecamatan`, `latitude`, `longitude`) VALUES
('321', 'Karya Indah', '32', '0.6934950292847', '121.98051452636'),
('322', 'Buntulia Tengah', '32', '0.6646579437921', '121.98326110839'),
('323', 'taluduyunu', '32', '0.6481795331595', '121.98738098144'),
('4222', 'Dengilo Barat', '51', '0.6976145987557', '122.07664489746'),
('501', 'PAGUAT BARAT', '50', '0.5067377784118', '122.03269958496');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jenkel`
--

CREATE TABLE `t_jenkel` (
  `id_jk` int(11) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_jenkel`
--

INSERT INTO `t_jenkel` (`id_jk`, `jenis_kelamin`) VALUES
(1, 'laki-laki'),
(2, 'perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kecamatan`
--

CREATE TABLE `t_kecamatan` (
  `kd_kecamatan` varchar(100) NOT NULL,
  `no_kecamatan` varchar(255) NOT NULL,
  `nama_kecamatan` varchar(110) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `geojson` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_kecamatan`
--

INSERT INTO `t_kecamatan` (`kd_kecamatan`, `no_kecamatan`, `nama_kecamatan`, `latitude`, `longitude`, `geojson`) VALUES
('32', '0.32', 'Buntulia', '0.6046659759422', '121.55687251799', 'post-images/BUNTULIA.geojson'),
('50', '0.50', 'PAGUAT', '0.4998715882588', '122.04093933105', 'post-images/PAGUAT50.geojson'),
('51', '0.51', 'Dengilo', '0.6046659759422', '121.55687251799', 'post-images/DENGILO.geojson');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pravelensi`
--

CREATE TABLE `t_pravelensi` (
  `id_pravelensi` int(11) NOT NULL,
  `id_puskes` int(11) NOT NULL,
  `total_balita` varchar(255) NOT NULL,
  `pendek` varchar(255) NOT NULL,
  `sangat_pendek` varchar(255) NOT NULL,
  `total_pendek_sangat` varchar(255) NOT NULL,
  `tgl_input` date NOT NULL,
  `kd_desa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_pravelensi`
--

INSERT INTO `t_pravelensi` (`id_pravelensi`, `id_puskes`, `total_balita`, `pendek`, `sangat_pendek`, `total_pendek_sangat`, `tgl_input`, `kd_desa`) VALUES
(9, 14, '134', '5', '1', '6', '2022-12-05', '321'),
(10, 15, '500', '5', '5', '10', '2022-12-05', '4222'),
(12, 15, '5000', '400', '200', '600', '2022-12-05', '4222');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_prediksi`
--

CREATE TABLE `t_prediksi` (
  `id_prediksi` int(11) NOT NULL,
  `bln_thn` varchar(255) NOT NULL,
  `d_aktual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_prediksi`
--

INSERT INTO `t_prediksi` (`id_prediksi`, `bln_thn`, `d_aktual`) VALUES
(1, 'Agustus 2021', 368),
(2, 'Februari 2022', 157),
(11, 'maret 2022', 1222);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_puskes`
--

CREATE TABLE `t_puskes` (
  `id_puskes` int(11) NOT NULL,
  `nama_puskes` varchar(110) NOT NULL,
  `alamat` varchar(110) NOT NULL,
  `kd_kecamatan` varchar(110) NOT NULL,
  `latitude` varchar(110) NOT NULL,
  `longitude` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_puskes`
--

INSERT INTO `t_puskes` (`id_puskes`, `nama_puskes`, `alamat`, `kd_kecamatan`, `latitude`, `longitude`) VALUES
(14, 'Buntulia', 'jln.buntulia', '32', '0.7583563623983', '121.98116950961'),
(15, 'Dengilo', 'jln.dengilo', '51', '0.6718457750388', '122.07729075988'),
(30, 'puskesmas paguat', 'jln', '50', '0.4851092552485', '122.01137917570');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_puskesmas` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','bptd','dinkes','puskes') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_puskesmas`, `name`, `email`, `level`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(13, 15, 'Puskesmas Dengilo', 'dengilo@gmail.com', 'puskes', NULL, '$2y$10$80eChyp3Srn6N5WVTSll4evuld9dHbznZixwp4wNCufLVjqm0xD4u', NULL, '2022-10-15 22:54:05', '2022-12-01 09:58:13'),
(18, 0, 'Bappeda', 'Bappeda@gmail.com', 'bptd', NULL, '$2y$10$hniUE58K.oZajIx0rtkswO0sS6YfdF6R/gObUKXo/mnMF7x6SwDhq', NULL, '2022-10-20 22:57:33', '2022-10-20 22:57:33'),
(22, 0, 'Dinkes', 'dinkes@gmail.com', 'dinkes', NULL, '$2y$10$F7qDWvWzx3ln5m8tfV2x2uY/XpeOLKvGATJfvx.SiRof7vwC1lWiW', NULL, '2022-11-05 17:09:57', '2022-11-05 17:09:57'),
(30, 14, 'puskemas buntulia', 'buntulia@gmail.com', 'puskes', NULL, '$2y$10$Qg6TwjeoA24btcP.Ubvwgun2edNBFR3FV0SMXB3XlL7rC5LMYXQP2', NULL, '2022-11-05 21:15:59', '2022-11-05 21:15:59'),
(41, 30, 'puskesmas paguat', 'paguat@gmail.com', 'puskes', NULL, '$2y$10$SgR5TgchagvSYkQlkwMcSObol7.YS7WLVyD5QCxuInBJRWfa3DrFG', NULL, '2022-12-05 05:34:00', '2022-12-05 05:34:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `t_alpha`
--
ALTER TABLE `t_alpha`
  ADD PRIMARY KEY (`id_alpha`);

--
-- Indeks untuk tabel `t_balita`
--
ALTER TABLE `t_balita`
  ADD PRIMARY KEY (`id_balita`),
  ADD KEY `id_jenis_kelamin` (`id_jenis_kelamin`,`id_puskes`),
  ADD KEY `id_puskes` (`id_puskes`),
  ADD KEY `kode_desa` (`kode_desa`);

--
-- Indeks untuk tabel `t_desa`
--
ALTER TABLE `t_desa`
  ADD PRIMARY KEY (`kd_desa`),
  ADD KEY `kd_kecamatan` (`kd_kecamatan`);

--
-- Indeks untuk tabel `t_jenkel`
--
ALTER TABLE `t_jenkel`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indeks untuk tabel `t_kecamatan`
--
ALTER TABLE `t_kecamatan`
  ADD PRIMARY KEY (`kd_kecamatan`);

--
-- Indeks untuk tabel `t_pravelensi`
--
ALTER TABLE `t_pravelensi`
  ADD PRIMARY KEY (`id_pravelensi`),
  ADD KEY `id_puskes` (`id_puskes`),
  ADD KEY `kd_desa` (`kd_desa`);

--
-- Indeks untuk tabel `t_prediksi`
--
ALTER TABLE `t_prediksi`
  ADD PRIMARY KEY (`id_prediksi`);

--
-- Indeks untuk tabel `t_puskes`
--
ALTER TABLE `t_puskes`
  ADD PRIMARY KEY (`id_puskes`),
  ADD KEY `kd_kecamatan` (`kd_kecamatan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id_puskesmas` (`id_puskesmas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_balita`
--
ALTER TABLE `t_balita`
  MODIFY `id_balita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `t_jenkel`
--
ALTER TABLE `t_jenkel`
  MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_pravelensi`
--
ALTER TABLE `t_pravelensi`
  MODIFY `id_pravelensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `t_prediksi`
--
ALTER TABLE `t_prediksi`
  MODIFY `id_prediksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `t_puskes`
--
ALTER TABLE `t_puskes`
  MODIFY `id_puskes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_balita`
--
ALTER TABLE `t_balita`
  ADD CONSTRAINT `t_balita_ibfk_1` FOREIGN KEY (`id_puskes`) REFERENCES `t_puskes` (`id_puskes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_balita_ibfk_2` FOREIGN KEY (`id_jenis_kelamin`) REFERENCES `t_jenkel` (`id_jk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_balita_ibfk_3` FOREIGN KEY (`kode_desa`) REFERENCES `t_desa` (`kd_desa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_desa`
--
ALTER TABLE `t_desa`
  ADD CONSTRAINT `t_desa_ibfk_1` FOREIGN KEY (`kd_kecamatan`) REFERENCES `t_kecamatan` (`kd_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_pravelensi`
--
ALTER TABLE `t_pravelensi`
  ADD CONSTRAINT `t_pravelensi_ibfk_1` FOREIGN KEY (`kd_desa`) REFERENCES `t_desa` (`kd_desa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_pravelensi_ibfk_2` FOREIGN KEY (`id_puskes`) REFERENCES `t_puskes` (`id_puskes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_puskes`
--
ALTER TABLE `t_puskes`
  ADD CONSTRAINT `t_puskes_ibfk_1` FOREIGN KEY (`kd_kecamatan`) REFERENCES `t_kecamatan` (`kd_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
