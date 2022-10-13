-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Okt 2022 pada 10.16
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
  `kecamatan` varchar(255) NOT NULL,
  `hasil` enum('pendek','sangatpendek','normal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_balita`
--

INSERT INTO `t_balita` (`id_balita`, `nama_balita`, `id_jenis_kelamin`, `tgl_lahir`, `tb_lahir`, `bb_lahir`, `nama_ortu`, `id_puskes`, `kode_desa`, `alamat`, `tgl_pengukuran`, `tb`, `bb`, `lila`, `kecamatan`, `hasil`) VALUES
(11, 'bagus', 1, '2022-08-10', '30', '14', 'hilen kelo', 5, '132', 'jln', '2022-08-10', 92, 13, '1', 'dengilo', 'pendek'),
(12, 'dandimointti', 1, '2022-08-10', '30', '14', 'hilen', 4, '322', 'jln ', '2022-08-10', 92, 13, '1', 'popayato', 'normal'),
(13, 'dandi rivaldi mointti', 1, '2022-08-10', '30', '14', 'hilen', 4, '322', 'jln ', '2022-08-10', 92, 13, '1', 'popayato', 'sangatpendek'),
(16, 'dandi rivaldi mointti', 1, '2022-08-10', '30', '14', 'hilen', 4, '323', 'jln ', '2022-08-10', 92, 13, '1', 'popayato', 'sangatpendek'),
(17, 'meri yunus saputri', 2, '2022-08-23', '100', '8', 'abas', 4, '323', 'pulubala', '2022-08-23', 150, 90, '1', 'popayato', 'pendek'),
(19, 'tya', 2, '2022-10-02', '80', '8', 'hilenn', 4, '323', 'jln semangka', '2022-10-03', 200, 100, '1', 'popayato', 'sangatpendek');

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
('132', 'Dengilo utara1', '51', '0.6046659759422', '121.55687251799'),
('322', 'buntulia utara', '32', '0.6840972480444', '121.47311865190'),
('323', 'buntulia barat', '32', '0.7612099818717', '121.93202018737'),
('501', 'popayato utara', '10', '0.7612099818717', '121.93202018737');

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
  `nama_kecamatan` varchar(110) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_kecamatan`
--

INSERT INTO `t_kecamatan` (`kd_kecamatan`, `nama_kecamatan`, `latitude`, `longitude`) VALUES
('10', 'Popayato', '0.5149771969804', '122.05055236816'),
('20', 'Lemito', '0.6046659759422', '121.55687251799'),
('30', 'Marisa', '0.6046659759422', '121.55687251799'),
('32', 'Buntulia', '0.6046659759422', '121.55687251799'),
('33', 'Duhiadaa', '0.6046659759422', '121.55687251799'),
('50', 'Paguat', '0.6046659759422', '121.55687251799'),
('51', 'Dengilo', '0.6046659759422', '121.55687251799');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_periode`
--

CREATE TABLE `t_periode` (
  `id_periode` int(11) NOT NULL,
  `nama_periode` varchar(255) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `jenis_periode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_periode`
--

INSERT INTO `t_periode` (`id_periode`, `nama_periode`, `tgl_awal`, `tgl_akhir`, `jenis_periode`) VALUES
(1, 'maret 2022', '2022-08-03', '2022-09-03', 'sebaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_puskes`
--

CREATE TABLE `t_puskes` (
  `id_puskes` int(11) NOT NULL,
  `nama_puskes` varchar(110) NOT NULL,
  `alamat` varchar(110) NOT NULL,
  `kd_kecamatan` varchar(110) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `latitude` varchar(110) NOT NULL,
  `longitude` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_puskes`
--

INSERT INTO `t_puskes` (`id_puskes`, `nama_puskes`, `alamat`, `kd_kecamatan`, `status`, `latitude`, `longitude`) VALUES
(4, 'buntulia', 'jln semangka', '32', '0', '0.7612099818717', '121.93202018737'),
(5, 'dengilo', 'jln', '51', '0', '0.6923363997240', '122.18045711517'),
(8, 'popayato', 'jln trans', '10', '0', '0.6870581948166', '122.22041130065');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `level`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'puskes', 'puskes@gmail.com', 'puskes', NULL, '$2y$10$G.gB/CX0aJndtUQyFAopkuBjwosM7OozAmIniKQoAKvt.TXfDboSu', NULL, '2022-08-01 22:01:38', '2022-10-04 19:32:05'),
(4, 'dinkes', 'dinkes@gmail.com', 'dinkes', NULL, '$2y$10$G.gB/CX0aJndtUQyFAopkuBjwosM7OozAmIniKQoAKvt.TXfDboSu', NULL, '2022-08-02 09:17:57', '2022-08-02 09:17:57'),
(6, 'bptd', 'bptd@gmail.com', 'bptd', NULL, '$2y$10$G.gB/CX0aJndtUQyFAopkuBjwosM7OozAmIniKQoAKvt.TXfDboSu', NULL, '2022-08-02 09:17:57', '2022-08-02 09:17:57');

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
-- Indeks untuk tabel `t_periode`
--
ALTER TABLE `t_periode`
  ADD PRIMARY KEY (`id_periode`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `id_balita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `t_jenkel`
--
ALTER TABLE `t_jenkel`
  MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_periode`
--
ALTER TABLE `t_periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_puskes`
--
ALTER TABLE `t_puskes`
  MODIFY `id_puskes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_balita`
--
ALTER TABLE `t_balita`
  ADD CONSTRAINT `t_balita_ibfk_2` FOREIGN KEY (`id_puskes`) REFERENCES `t_puskes` (`id_puskes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_balita_ibfk_3` FOREIGN KEY (`id_jenis_kelamin`) REFERENCES `t_jenkel` (`id_jk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_balita_ibfk_4` FOREIGN KEY (`kode_desa`) REFERENCES `t_desa` (`kd_desa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_desa`
--
ALTER TABLE `t_desa`
  ADD CONSTRAINT `t_desa_ibfk_1` FOREIGN KEY (`kd_kecamatan`) REFERENCES `t_kecamatan` (`kd_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_puskes`
--
ALTER TABLE `t_puskes`
  ADD CONSTRAINT `t_puskes_ibfk_1` FOREIGN KEY (`kd_kecamatan`) REFERENCES `t_kecamatan` (`kd_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
