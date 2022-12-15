-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Des 2022 pada 14.09
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
(45, 0.4);

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
(76, 'PUTRI INTAN PULUMUDUYO ', 2, '2020-07-05', '3 ', '49 ', 'ALMA JAFAR ', 14, '322', 'BT ', '2022-02-08', 72, 8, '0', 'sangatpendek'),
(77, 'ASKA FAIZAN NUSI ', 1, '2019-09-02', '2.7 ', '47 ', 'Supandi nusi ', 14, '323', 'taluduyunu', '2022-02-10', 80, 9.7, '0', 'sangatpendek'),
(78, 'LOLAN NENTO ', 2, '2020-02-12', '2.7 ', '47 ', 'oyan moigo ', 14, '321', 'roji ', '2022-02-15', 76.8, 8.5, '0', 'sangatpendek'),
(79, 'SRI HIJRAH KARAMA ', 2, '2019-06-04', '2.3 ', '47 ', 'siska adinu ', 14, '322', 'BT ', '2022-02-08', 8.4, 76, '0', 'sangatpendek'),
(80, 'RAHMAT THALIB GIASI ', 1, '2021-12-17', '2.5 ', '47 ', 'merlin harun ', 14, '324', 'taluduyunu utara', '2022-02-16', 50.2, 3.4, '0', 'sangatpendek'),
(81, 'ARKA PUTRA LAMATOWA ', 1, '2021-11-15', '2.2 ', '47 ', 'fitri husain ', 14, '324', 'taluduyunu utara', '2022-02-14', 55, 5, '0', 'sangatpendek'),
(82, 'BILQIS ULTARA MARUF ', 2, '2018-02-06', '2.5 ', '47 ', 'yunianti gani ', 14, '324', 'taluduyunu utara', '2022-02-16', 88, 14.5, '0', 'sangatpendek'),
(83, 'Miranti rahman ', 2, '2017-07-19', '2.7 ', '0 ', 'ABDUL m rahman ', 14, '324', 'DUSUN BENDUNGAN  ', '2022-02-10', 96.4, 13.5, '0', 'pendek'),
(84, 'Moh tri tantu ', 1, '2018-01-23', '2.5 ', '0 ', 'Laila kansil ', 14, '325', 'DUSUN lamahu ', '2022-02-07', 92.5, 11.3, '0', 'pendek'),
(85, 'Kalil gibran husain ', 1, '2018-07-03', '3.5 ', '0 ', 'Fikran husain ', 14, '324', 'DUSUN MEKAR  ', '2022-02-14', 91.4, 11.2, '0', 'pendek'),
(86, 'RAISYA PUTRI MUSA ', 2, '2019-08-16', '3 ', '49 ', 'ABDUL RASID MUSA ', 14, '323', 'WAWAHU ', '2022-02-10', 80, 9.3, '0', 'pendek'),
(87, 'NABILA P ABDULLAH ', 2, '2018-04-09', '3 ', '49 ', 'salma noho ', 14, '322', 'dusun cempaka ', '2022-02-08', 93, 11.1, '0', 'pendek'),
(88, 'NAURA MOINTI ', 2, '2019-08-31', '2.9 ', '49 ', 'MOH ISKANDAR MOINTI ', 14, '323', 'TALUDUYUNU ', '2022-02-10', 80, 9.7, '0', 'pendek'),
(89, 'ELFRIANSYAH SYAMSU \n', 1, '2020-05-24', '2.8 ', '48 ', 'riyanti djafar ', 14, '322', 'bt ', '2022-02-08', 76.3, 10.3, '0', 'pendek'),
(90, 'SUCI RAHMAWATI LATIF ', 2, '2019-05-22', '47 ', '3.1 \n', 'HENDRIYANTO LATIF ', 15, '511', 'DESA HUTAMOPUTI DUSUN BUBALANGO ', '2022-02-08', 84, 10, '0', 'pendek'),
(91, 'QAYLA AQIFA RADJAK ', 2, '2020-05-05', '48 ', '2.9 ', 'JEFRI RADJAK ', 15, '512', 'DESA POPAYA DUSUN TUGU PANCASILA ', '2022-02-15', 76, 8, '0', 'pendek'),
(92, 'MOH ABID ALASKA MATANTU ', 1, '2020-05-06', '48 ', '2.9 ', 'RAHMAD MATANTU ', 15, '511', 'DESA HUTAMOPUTI DUSUN KAT ', '2022-02-08', 77.3, 8.5, '0', 'pendek'),
(93, 'ODELIA TUMEI ', 2, '2020-10-01', '50 ', '3.6 ', 'DAVIT TUMEI ', 15, '513', 'DESA KARANGETANG DUSUN TIKALA ', '2022-02-11', 72.5, 7.3, '0', 'pendek'),
(94, 'MOH. WILDAN TOLINGGI ', 1, '2020-10-03', '48 ', '3.3 ', 'RUSDIYANTO TOLINGGI ', 15, '514', 'DESA PADENGO DUSUN PEYATO ', '2022-02-09', 73.5, 9.4, '0', 'pendek'),
(95, 'ANGGARA C.B LASARUS ', 1, '2022-02-22', '48 ', '2.8 ', 'PAROME LASARUS ', 15, '513', 'DESA KARANGETANG DUSUN TIKALA ', '2022-02-22', 48, 2.8, '0', 'pendek'),
(96, 'RANDIKA A. POLUTU ', 1, '2022-02-17', '48 ', '3 ', 'RIAN POLUTU ', 15, '512', 'DESA POPAYA DUSUN TUGU PANCASILA ', '2022-02-17', 48, 3, '0', 'pendek'),
(97, 'dandi', 1, '2022-12-11', '34.5', '34.5', 'hilenn', 31, '201', 'jln', '2022-12-11', 34.5, 34.5, '0', 'pendek');

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
('201', 'LEMITO UTARA', '20', '0.6619115458012', '121.58638000488'),
('321', 'Karya Indah', '32', '0.6934950292847', '121.98051452636'),
('322', 'Buntulia Tengah', '32', '0.6646579437921', '121.98326110839'),
('323', 'taluduyunu', '32', '0.6481795331595', '121.98738098144'),
('324', 'taluduyunu utara', '32', '0.6976145987557', '122.07664489746'),
('325', 'SIPATANA', '32', '0.7127196557979', '121.94892883300'),
('501', 'PAGUAT BARAT', '50', '0.5067377784118', '122.03269958496'),
('511', 'HUTA MOPUTI', '51', '0.6687775379129', '122.07939147949'),
('512', 'POPAYA', '51', '0.6591651462894', '122.08763122558'),
('513', 'KARANGETANG', '51', '0.6371938961998', '122.08763122558'),
('514', 'PADENGO', '51', '0.6207153969631', '122.09312438964');

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
('10', '0.10', 'POPAYATO', '0.6303278611785', '121.49986267089', 'post-images/POPAYATO10.geojson'),
('20', '0.20', 'LEMITO', '0.6797631052738', '121.58363342285', 'post-images/LEMITO20.geojson'),
('30', '0.30', 'MARISA', '0.4682870226153', '121.95579528808', 'post-images/MARISA30.geojson'),
('31', '0.31', 'PATILANGIO', '0.7525418387094', '121.76902770996', 'post-images/PATILANGGIO31.geojson'),
('32', '0.32', 'BUNTULIA', '0.6046659759422', '121.55687251799', 'post-images/BUNTULIA32.geojson'),
('33', '0.33', 'DUHIADAA', '0.4833927027896', '121.89537048339', 'post-images/DUHIADAA33.geojson'),
('50', '0.50', 'PAGUAT', '0.4998715882588', '122.04093933105', 'post-images/PAGUAT50.geojson'),
('51', '0.51', 'DENGILO', '0.6046659759422', '121.55687251799', 'post-images/DENGILO51.geojson');

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
(10, 15, '500', '5', '5', '10', '2022-12-05', '324'),
(12, 15, '5000', '400', '200', '600', '2022-12-05', '324'),
(13, 15, '600', '200', '300', '500', '2022-12-07', '324'),
(14, 31, '400', '25', '10', '10', '2022-12-11', '201');

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
(14, 'Puskesmas Buntulia', 'jln.buntulia', '32', '0.7583563623983', '121.98116950961'),
(15, 'Puskesmas Dengilo', 'jln.dengilo', '51', '0.6718457750388', '122.07729075988'),
(30, 'puskesmas paguat', 'jln', '50', '0.4851092552485', '122.01137917570'),
(31, 'Puskesmas Lemito', 'jln', '20', '0.6416568140628', '121.58844567449');

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
(41, 30, 'puskesmas paguat', 'paguat@gmail.com', 'puskes', NULL, '$2y$10$SgR5TgchagvSYkQlkwMcSObol7.YS7WLVyD5QCxuInBJRWfa3DrFG', NULL, '2022-12-05 05:34:00', '2022-12-05 05:34:00'),
(42, 31, 'Puskesmas Lemito', 'lemito@gmail.com', 'puskes', NULL, '$2y$10$XwyR7EBPj5ycmkFubwP0B.3nqcJXVET7jUy7cbyTkuWcBseEKTl/G', NULL, '2022-12-11 03:31:39', '2022-12-11 03:31:39');

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
  MODIFY `id_balita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT untuk tabel `t_jenkel`
--
ALTER TABLE `t_jenkel`
  MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_pravelensi`
--
ALTER TABLE `t_pravelensi`
  MODIFY `id_pravelensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `t_prediksi`
--
ALTER TABLE `t_prediksi`
  MODIFY `id_prediksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `t_puskes`
--
ALTER TABLE `t_puskes`
  MODIFY `id_puskes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
