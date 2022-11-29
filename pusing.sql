-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Nov 2022 pada 11.46
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
  `id_alpha` varchar(255) NOT NULL,
  `nilai_alpha` decimal(2,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_alpha`
--

INSERT INTO `t_alpha` (`id_alpha`, `nilai_alpha`) VALUES
('45', '0.2');

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
  `tambah_kecamatan` varchar(255) NOT NULL,
  `hasil` enum('pendek','sangatpendek','normal') NOT NULL,
  `id_periode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_balita`
--

INSERT INTO `t_balita` (`id_balita`, `nama_balita`, `id_jenis_kelamin`, `tgl_lahir`, `tb_lahir`, `bb_lahir`, `nama_ortu`, `id_puskes`, `kode_desa`, `alamat`, `tgl_pengukuran`, `tb`, `bb`, `lila`, `tambah_kecamatan`, `hasil`, `id_periode`) VALUES
(41, 'SAIRA BULILANGO ', 2, '2019-09-07', '47', '2.8', 'eto bulilango ', 14, '321', 'ds. karya indah ', '2022-02-15', 79, 10, '0', 'Buntulia', 'sangatpendek', 3),
(43, 'PUTRI INTAN PULUMUDUYO', 2, '2020-07-05', '3', '49', 'ALMA JAFAR?', 14, '322', 'BT', '2022-02-08', 72, 8, '0', 'buntulia', 'sangatpendek', 3),
(44, 'ASKA FAIZAN NUSI', 1, '2019-09-02', '2.7', '47', 'Supandi nusi?', 14, '323', 'taluduyunu', '2022-02-10', 80, 9.7, '0', 'buntulia', 'sangatpendek', 3),
(45, 'LOLAN NENTO', 2, '2020-02-12', '2.7', '47', 'oyan moigo?', 14, '321', 'roji', '2022-02-15', 76.8, 8.5, '0', 'buntulia', 'sangatpendek', 3),
(46, 'SRI HIJRAH KARAMA', 2, '2019-06-04', '2.3', '47', 'siska adinu?', 14, '322', 'BT', '2022-02-08', 8.4, 76, '0', 'buntulia', 'sangatpendek', 3),
(47, 'RAHMAT THALIB GIASI', 1, '2021-12-17', '2.5', '47', 'merlin harun?', 14, '324', 'taluduyunu utara', '2022-02-16', 50.2, 3.4, '0', 'buntulia', 'sangatpendek', 3),
(48, 'ARKA PUTRA LAMATOWA', 1, '2021-11-15', '2.2', '47', 'fitri husain?', 14, '324', 'taluduyunu utara', '2022-02-14', 55, 5, '0', 'buntulia', 'pendek', 3),
(49, 'BILQIS ULTARA MARUF', 2, '2018-02-06', '2.5', '47', 'yunianti gani?', 14, '324', 'taluduyunu utara', '2022-02-16', 88, 14.5, '0', 'buntulia', 'normal', 3),
(50, 'dandi', 1, '2022-11-17', '123', '100', 'labunga', 15, '4222', 'jln', '2022-11-17', 100, 10, '2', 'dengilo', 'pendek', 3),
(51, 'dandi2', 1, '2022-11-17', '123', '100', 'labunga', 15, '4222', 'jln', '2022-11-17', 100, 10, '2', 'dengilo', 'sangatpendek', 3);

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
('324', 'Taluduyunu Utara', '32', '0.6358206899245', '121.99287414550'),
('4222', 'Dengilo Barat', '51', '0.6976145987557', '122.07664489746');

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
('10', '0.10', 'Popayato', '0.5149771969804', '122.05055236816', 'Popayato.geojson'),
('20', '0.20', 'Lemito', '0.6046659759422', '121.55687251799', 'Lemito.geojson'),
('32', '0.32', 'Buntulia', '0.6046659759422', '121.55687251799', 'Buntulia.geojson'),
('33', '0.33', 'Duhiadaa', '0.6046659759422', '121.55687251799', 'Duhiada.geojson'),
('50', '0.50', 'Paguat', '0.6046659759422', '121.55687251799', 'Paguat.geojson'),
('51', '0.51', 'Dengilo', '0.6046659759422', '121.55687251799', 'Dengilo.geojson');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_periode`
--

CREATE TABLE `t_periode` (
  `id_periode` int(11) NOT NULL,
  `nama_periode` varchar(255) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `jenis_periode` enum('sebaran','pravelensi') NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_periode`
--

INSERT INTO `t_periode` (`id_periode`, `nama_periode`, `tgl_awal`, `tgl_akhir`, `jenis_periode`, `status`) VALUES
(3, 'Februari', '2022-02-01', '2022-02-28', 'sebaran', '1'),
(5, 'september\r\n', '2022-09-01', '2022-09-30', 'pravelensi', '0');

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
(1, 'Agustus 2021', 568),
(2, 'Februari 2022', 157);

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
(15, 'Dengilo', 'jln.dengilo', '51', '0.6718457750388', '122.07729075988');

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
(13, 15, 'Puskesmas Dengilo', 'dengilo@gmail.com', 'puskes', NULL, '$2y$10$mnVhq1uR0dEsT7g1TtBWZ.6ENtp8BFmeIjL7QHeRivvwWOWZXSoqq', NULL, '2022-10-15 22:54:05', '2022-11-16 17:12:20'),
(18, 0, 'Bappeda', 'Bappeda@gmail.com', 'bptd', NULL, '$2y$10$hniUE58K.oZajIx0rtkswO0sS6YfdF6R/gObUKXo/mnMF7x6SwDhq', NULL, '2022-10-20 22:57:33', '2022-10-20 22:57:33'),
(22, 0, 'Dinkes', 'dinkes@gmail.com', 'dinkes', NULL, '$2y$10$F7qDWvWzx3ln5m8tfV2x2uY/XpeOLKvGATJfvx.SiRof7vwC1lWiW', NULL, '2022-11-05 17:09:57', '2022-11-05 17:09:57'),
(30, 14, 'puskemas buntulia', 'buntulia@gmail.com', 'puskes', NULL, '$2y$10$Qg6TwjeoA24btcP.Ubvwgun2edNBFR3FV0SMXB3XlL7rC5LMYXQP2', NULL, '2022-11-05 21:15:59', '2022-11-05 21:15:59'),
(33, 15, 'dandi', 'dandi@gmail.com', 'puskes', NULL, '$2y$10$Z1MncSyz0xoFh89u26ypFe27x0Xf0FKbpgch.TugCUYWojoI8Ue4m', NULL, '2022-11-16 17:11:21', '2022-11-16 17:11:21'),
(34, 14, 'Puskesmas Mekar', 'mekar@gmail.com', 'puskes', NULL, '$2y$10$4EsUbdYDUyIzx0kz7iK5tOQk9kBd71nBoW7uxFf/7Hx0XkIUQaveC', NULL, '2022-11-16 17:25:56', '2022-11-16 17:25:56');

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
  ADD KEY `kode_desa` (`kode_desa`),
  ADD KEY `id_periode` (`id_periode`);

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
-- Indeks untuk tabel `t_periode`
--
ALTER TABLE `t_periode`
  ADD PRIMARY KEY (`id_periode`);

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
  MODIFY `id_balita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `t_jenkel`
--
ALTER TABLE `t_jenkel`
  MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_periode`
--
ALTER TABLE `t_periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `t_prediksi`
--
ALTER TABLE `t_prediksi`
  MODIFY `id_prediksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_puskes`
--
ALTER TABLE `t_puskes`
  MODIFY `id_puskes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
