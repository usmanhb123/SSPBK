-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Mar 2021 pada 00.19
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rs_gunung_jati`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_absen`
--

CREATE TABLE `data_absen` (
  `id` int(11) NOT NULL,
  `tgl_absen` date NOT NULL,
  `users_id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_absen`
--

INSERT INTO `data_absen` (`id`, `tgl_absen`, `users_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(5, '2021-03-15', 3, '', '2021-03-02 20:50:30', '2021-02-15 01:06:23'),
(8, '2021-03-18', 1602863101, '', '2021-03-02 20:50:35', '2021-02-18 05:38:25'),
(9, '2021-03-18', 3, 'Absen Melalui Petugas', '2021-03-02 21:31:40', '2021-02-18 06:21:45'),
(10, '2021-03-15', 1602863101, '', '2021-03-02 21:33:37', '2021-02-18 05:38:25'),
(11, '2021-03-01', 1602863100, '', '2021-03-02 22:07:10', '2021-02-18 05:38:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_absen_operasi`
--

CREATE TABLE `data_absen_operasi` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `data_jadwal_operasi_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_absen_operasi`
--

INSERT INTO `data_absen_operasi` (`id`, `users_id`, `data_jadwal_operasi_id`, `created_at`, `updated_at`) VALUES
(1, 1602863100, 1614369135, '2021-02-26 19:56:11', '2021-02-18 06:38:38'),
(2, 1602863101, 1614369135, '2021-02-26 19:56:11', '2021-02-18 06:38:38'),
(3, 1602863100, 1614545814, '2021-02-28 14:01:24', '2021-02-28 14:01:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_berita`
--

CREATE TABLE `data_berita` (
  `id` int(11) NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `file` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jadwal`
--

CREATE TABLE `data_jadwal` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `data_shift_id` int(11) DEFAULT NULL,
  `data_ruangan_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_jadwal`
--

INSERT INTO `data_jadwal` (`id`, `users_id`, `data_shift_id`, `data_ruangan_id`, `created_at`, `updated_at`) VALUES
(1, 1602863100, 4, 1610612399, '2021-02-28 20:29:43', '2021-02-28 13:29:43'),
(2, 1602863104, 1, 1610612399, '2021-02-18 12:55:56', '2021-02-18 05:55:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jadwal_operasi`
--

CREATE TABLE `data_jadwal_operasi` (
  `id` int(11) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `umur` int(11) NOT NULL,
  `jk` varchar(30) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `catatan_pasien` text NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `data_penyakit_id` int(11) DEFAULT NULL,
  `data_ruangan_id` int(11) DEFAULT NULL,
  `ket` text NOT NULL,
  `email` text DEFAULT NULL,
  `verifikasi_selesai` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_jadwal_operasi`
--

INSERT INTO `data_jadwal_operasi` (`id`, `nama_pasien`, `umur`, `jk`, `alamat`, `catatan_pasien`, `tanggal`, `waktu`, `waktu_selesai`, `data_penyakit_id`, `data_ruangan_id`, `ket`, `email`, `verifikasi_selesai`, `created_at`, `updated_at`) VALUES
(1614369135, 'Susanto', 34, 'Laki Laki', 'ds...............................................', 'catatan...............................', '2021-03-02', '00:00:00', '23:58:00', 3, 1610612399, 'ket..........................', NULL, 1, '2021-02-26 12:52:15', '2021-02-26 13:00:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kebutuhan_operasi`
--

CREATE TABLE `data_kebutuhan_operasi` (
  `id` int(11) NOT NULL,
  `data_penyakit_id` int(11) NOT NULL,
  `catatan_kebutuhan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penyakit`
--

CREATE TABLE `data_penyakit` (
  `id` int(11) NOT NULL,
  `nama_penyakit` text NOT NULL,
  `level_penanganan_id` int(11) NOT NULL,
  `jenis_operasi_id` int(11) NOT NULL,
  `data_kebutuhan_operasi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_penyakit`
--

INSERT INTO `data_penyakit` (`id`, `nama_penyakit`, `level_penanganan_id`, `jenis_operasi_id`, `data_kebutuhan_operasi`, `created_at`, `updated_at`) VALUES
(3, 'Batu Ginjal', 1, 1, 'kebutuhan operasi\r\n1.\r\n2.', '2021-02-28 21:07:47', '2021-02-28 14:07:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_performance`
--

CREATE TABLE `data_performance` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `ket` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_qr`
--

CREATE TABLE `data_qr` (
  `id` int(11) NOT NULL,
  `qr` varchar(255) NOT NULL,
  `jenis_absen` int(11) NOT NULL,
  `data_jadwal_operasi_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_qr`
--

INSERT INTO `data_qr` (`id`, `qr`, `jenis_absen`, `data_jadwal_operasi_id`, `created_at`, `updated_at`) VALUES
(643, '1613655690', 2, 1610616226, '2021-02-18 06:41:30', '2021-02-18 06:41:30'),
(656, '1614546230', 2, 1614545814, '2021-02-28 14:03:50', '2021-02-28 14:03:50'),
(657, '1614674086', 1, NULL, '2021-03-02 01:34:46', '2021-03-02 01:34:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_ruangan`
--

CREATE TABLE `data_ruangan` (
  `id` int(11) NOT NULL,
  `nama_ruangan` varchar(100) NOT NULL,
  `ket` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_ruangan`
--

INSERT INTO `data_ruangan` (`id`, `nama_ruangan`, `ket`, `created_at`, `updated_at`) VALUES
(1610612399, 'R001', 'Ruangan 01', '2021-02-28 20:24:25', '2021-02-28 13:24:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_shift`
--

CREATE TABLE `data_shift` (
  `id` int(11) NOT NULL,
  `shift` text NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_shift`
--

INSERT INTO `data_shift` (`id`, `shift`, `jam_masuk`, `jam_keluar`, `created_at`, `updated_at`) VALUES
(3, 'Shift 1', '08:00:00', '16:00:00', '2021-02-28 13:26:57', '2021-02-28 13:26:57'),
(4, 'Shift 2', '16:01:00', '00:00:00', '2021-02-28 13:27:53', '2021-02-28 13:27:53'),
(5, 'Shift 3', '00:01:00', '07:59:00', '2021-02-28 13:28:40', '2021-02-28 13:28:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_jadwal_operasi`
--

CREATE TABLE `detail_jadwal_operasi` (
  `id` int(11) NOT NULL,
  `data_jadwal_operasi_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_jadwal_operasi`
--

INSERT INTO `detail_jadwal_operasi` (`id`, `data_jadwal_operasi_id`, `users_id`, `tanggal`, `created_at`, `updated_at`) VALUES
(1610700083, 1614369135, 1602863100, '2021-03-02', '2021-03-02 07:43:46', '2021-02-26 12:59:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kebutuhan`
--

CREATE TABLE `detail_kebutuhan` (
  `id` int(11) NOT NULL,
  `data_kebutuhan_operasi_id` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `jenis` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_operasi`
--

CREATE TABLE `jenis_operasi` (
  `id` int(11) NOT NULL,
  `jenis_operasi` varchar(255) NOT NULL,
  `ket` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_operasi`
--

INSERT INTO `jenis_operasi` (`id`, `jenis_operasi`, `ket`, `created_at`, `updated_at`) VALUES
(1, 'Operasi ringan', 'ringan', '2021-01-14 01:19:15', '2021-01-14 01:19:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_operasi`
--

CREATE TABLE `laporan_operasi` (
  `id` int(11) NOT NULL,
  `data_jadwal_operasi_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `catatan_operasi` text NOT NULL,
  `tahun` year(4) NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan_operasi`
--

INSERT INTO `laporan_operasi` (`id`, `data_jadwal_operasi_id`, `users_id`, `catatan_operasi`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 1614369135, 1602863100, 'laporan operasi', 2021, '2021-02-26 12:57:22', '2021-02-26 12:57:22'),
(2, 1614545814, 1602863100, 'laporan operasi\r\n1.\r\n2.\r\n3.\r\n4.', 2021, '2021-02-28 14:03:12', '2021-02-28 14:03:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_penaganan`
--

CREATE TABLE `level_penaganan` (
  `id` int(11) NOT NULL,
  `level_penanganan` varchar(255) NOT NULL,
  `ket` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level_penaganan`
--

INSERT INTO `level_penaganan` (`id`, `level_penanganan`, `ket`, `created_at`, `updated_at`) VALUES
(1, 'Menengah', 'menengah', '2021-01-14 01:19:02', '2021-01-14 01:19:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maps` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `forgot` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode_gelap` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `email_verified_at`, `telepon`, `password`, `alamat`, `maps`, `user_role_id`, `is_active`, `forgot`, `mode_gelap`, `created_at`, `updated_at`) VALUES
(3, 'Usman Habib Bahtiar', '1608129075-jm_denis.jpg', 'admin@gmail.com', '1', '0838371444', '$2y$10$/50MXxCKZpi1XjHqKWh3MOldLpj6wcRy4wFjJkXd85aVQyHk3pa7e', 'desa suci blok tenggeran mundu cirebon', NULL, 1, 1, NULL, 2, '2020-10-18 14:23:15', '2021-01-07 03:04:04'),
(1602863100, 'Dokter 1', 'user.webp', 'rezailyasa2@gmail.com', '1', '0838371444', '$2y$10$/50MXxCKZpi1XjHqKWh3MOldLpj6wcRy4wFjJkXd85aVQyHk3pa7e', 'desa suci blok tenggeran mundu cirebon', NULL, 6, 1, '1613648446', 2, '2020-10-08 14:23:15', '2021-03-01 20:56:37'),
(1602863101, 'Petugas Medis', '1602865993-eye-of-ubuntu.jpg', 'lenamagdalenaucic@gmail.com', '1', '0838371444', '$2y$10$/50MXxCKZpi1XjHqKWh3MOldLpj6wcRy4wFjJkXd85aVQyHk3pa7e', 'desa suci blok tenggeran mundu cirebon', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.4086722822273!2d108.61818912916553!3d-6.814210199692183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f04acde0ee93d%3A0x570909eb0cf5286!2sSMK%20BINA%20CENDEKIA%20CIREBON!5e0!3m2!1sid!2sid!4v1602688170070!5m2!1sid!2sid', 7, 1, NULL, 2, '2020-10-08 14:23:15', '2020-10-23 06:08:08'),
(1602863102, 'Petugas Kebersihan', '1602865993-eye-of-ubuntu.jpg', 'kebersihan@gmail.com', '1', '0838371444', '$2y$10$/50MXxCKZpi1XjHqKWh3MOldLpj6wcRy4wFjJkXd85aVQyHk3pa7e', 'desa suci blok tenggeran mundu cirebon', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.4086722822273!2d108.61818912916553!3d-6.814210199692183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f04acde0ee93d%3A0x570909eb0cf5286!2sSMK%20BINA%20CENDEKIA%20CIREBON!5e0!3m2!1sid!2sid!4v1602688170070!5m2!1sid!2sid', 8, 1, NULL, 2, '2020-10-08 14:23:15', '2020-10-23 06:08:08'),
(1602863104, 'Usman Habib Bahtiar', '1608129075-jm_denis.jpg', 'bangkarteamwork73@gmail.com', '1', '0838371444', '$2y$10$/50MXxCKZpi1XjHqKWh3MOldLpj6wcRy4wFjJkXd85aVQyHk3pa7e', 'desa suci blok tenggeran mundu cirebon', NULL, 6, 1, '1614326203', 2, '2020-10-18 14:23:15', '2021-02-26 00:56:43'),
(1614326491, 'Uoiuoo', 'user.webp', 'usmanhabibbahtiar@gmail.com', '1614326491', NULL, '$2y$10$sijiEBxnIg5OoueoORaso.AyD6tHWFKxT/KPiGHOMZzXOIsAOye5a', 'Belum Di Input', NULL, 2, 1, NULL, 1, '2021-02-26 01:01:31', '2021-02-26 01:01:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `user_menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `user_role_id`, `user_menu_id`, `created_at`, `updated_at`) VALUES
(63, 6, 12, '2021-01-15 07:10:48', '2021-01-15 07:10:48'),
(64, 6, 13, '2021-01-15 07:10:48', '2021-01-15 07:10:48'),
(68, 7, 12, '2021-02-18 05:18:12', '2021-02-18 05:18:12'),
(69, 7, 13, '2021-02-18 05:18:12', '2021-02-18 05:18:12'),
(70, 8, 12, '2021-02-18 05:18:24', '2021-02-18 05:18:24'),
(71, 8, 13, '2021-02-18 05:18:24', '2021-02-18 05:18:24'),
(85, 1, 6, '2021-03-02 13:11:09', '2021-03-02 13:11:09'),
(86, 1, 10, '2021-03-02 13:11:09', '2021-03-02 13:11:09'),
(87, 1, 11, '2021-03-02 13:11:09', '2021-03-02 13:11:09'),
(88, 1, 13, '2021-03-02 13:11:09', '2021-03-02 13:11:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `created_at`, `updated_at`) VALUES
(6, 'Dashboard Kepala Ruangan', '2020-08-31 02:04:06', '2021-03-01 19:55:40'),
(8, 'MenuManagement', '2020-08-31 02:04:39', '2020-08-31 02:04:39'),
(10, 'Settings', '2020-12-09 00:38:27', '2020-12-09 00:38:27'),
(11, 'Operasi', '2020-12-09 01:24:02', '2020-12-09 01:24:02'),
(12, 'Dashboard', '2021-01-15 07:05:34', '2021-01-15 07:05:34'),
(13, 'Rumah Sakit', '2021-01-15 07:07:25', '2021-01-15 07:07:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Kepala Ruangan', '2020-08-31 02:10:28', '2021-03-01 21:13:46'),
(2, 'Users', '2020-12-16 07:13:02', '2020-12-08 07:12:55'),
(4, 'Direktur', '2020-12-09 00:36:56', '2020-12-09 00:36:56'),
(5, 'Kepala Bedah', '2020-12-09 00:37:07', '2020-12-09 00:37:07'),
(6, 'Dokter', '2020-12-09 00:37:26', '2020-12-09 00:37:26'),
(7, 'Petugas Medis', '2020-12-09 00:37:43', '2020-12-09 00:37:43'),
(8, 'Petugas Kebersihan', '2020-12-09 00:37:53', '2020-12-09 00:37:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_subsub_menu`
--

CREATE TABLE `user_subsub_menu` (
  `id` int(11) NOT NULL,
  `user_sub_menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_subsub_menu`
--

INSERT INTO `user_subsub_menu` (`id`, `user_sub_menu_id`, `title`, `url`, `created_at`, `Updated_at`) VALUES
(2, 223, 'Dokter', '/data_dokter', '2020-12-09 01:01:31', '2020-12-09 01:01:31'),
(3, 223, 'Petugas Medis', '/petugas_medis', '2020-12-09 01:02:06', '2020-12-09 01:02:06'),
(4, 223, 'Petugas Kebersihan', '/petugas_kebersihan', '2020-12-09 01:02:58', '2020-12-09 01:02:58'),
(5, 229, 'Data Ruangan', '/data_ruangan', '2021-03-02 04:07:15', '2021-03-01 21:07:15'),
(6, 229, 'Data Shift', '/data_shift', '2020-12-09 09:40:25', '2020-12-09 01:20:01'),
(7, 229, 'Data Jadwal Kerja', '/data_jadwal_kerja', '2021-03-02 04:07:21', '2021-03-01 21:07:21'),
(8, 224, 'Level Penanganan', '/level_penanganan', '2020-12-09 09:40:01', '2020-12-09 01:28:47'),
(9, 224, 'Jenis Operasi', '/jenis_operasi', '2020-12-09 09:40:06', '2020-12-09 01:29:54'),
(10, 224, 'Data Penyakit', '/data_penyakit', '2020-12-09 09:40:09', '2020-12-09 01:31:05'),
(11, 224, 'Data Kebutuhan Operasi', '/data_kebutuhan_operasi', '2020-12-09 09:40:11', '2020-12-09 01:35:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `user_menu_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `user_menu_id`, `title`, `url`, `icon`, `created_at`, `updated_at`) VALUES
(1, 8, 'Menu', '/menu', 'fas fa-fw fa-book', NULL, '2020-08-30 11:21:17'),
(2, 8, 'SubMenu', '/sub_menu', 'fas fa-fw fa-book', NULL, '2020-08-30 11:14:48'),
(15, 6, 'Dashboard', '/KepalaRuangan', 'fas fa-fw fa-tachometer-alt', '2020-08-31 02:49:50', '2021-03-01 19:56:20'),
(16, 6, 'Role & Access', '/role', 'fas fa-fw fa-user-tag', '2020-08-31 02:50:52', '2020-08-31 02:50:52'),
(17, 8, 'SubSubMenu', '/sub_sub_menu', 'fas fa-fw fa-book', NULL, '2020-08-30 11:14:48'),
(222, 10, 'Data Absensi', '/data_absensi', 'fab fa-slideshare', '2020-12-09 00:39:31', '2020-12-10 01:18:03'),
(223, 10, 'Data Pegawai', '/data_pengguna', 'fas fa-users', '2020-12-09 00:47:30', '2020-12-10 01:15:13'),
(224, 10, 'Data Operasi', '/data_jadwal', 'fas fa-procedures', '2020-12-09 00:48:06', '2020-12-10 01:14:06'),
(228, 11, 'Setting Jadwal Operasi', '/jadwal_operasi', 'flaticon-calendar', '2020-12-09 01:27:26', '2021-03-02 13:13:56'),
(229, 10, 'Data Lain Lain', '/data_shift', 'flaticon-technology-1', '2020-12-09 01:28:25', '2020-12-10 01:22:29'),
(230, 11, 'Laporan Operasi', '/laporan_operasi', 'fas fa-chalkboard-teacher', '2020-12-09 01:38:13', '2020-12-10 01:24:04'),
(231, 11, 'Penilaian Performance', '/penilaian_performance', 'flaticon-analytics', '2020-12-09 01:38:52', '2020-12-10 01:21:11'),
(232, 6, 'User Verify', '/user_verify', 'fas fa-users', '2021-01-13 00:29:23', '2021-01-13 00:29:23'),
(233, 12, 'Dashboard', '/pegawai', 'fas fa-fw fa-tachometer-alt', '2021-01-15 07:06:13', '2021-03-01 20:54:45'),
(234, 13, 'Absen', '/absenHarian', 'fas fa-user-tag', '2021-01-15 07:08:36', '2021-03-01 20:55:32'),
(235, 13, 'Absen Operasi', '/absenOperasi', 'fas fa-procedures', '2021-01-15 07:10:01', '2021-03-01 20:54:19'),
(238, 13, 'Jadwal Operasi', '/pegawai/jadwaloperasi', 'flaticon-calendar', '2021-01-15 07:20:38', '2021-03-01 20:55:14'),
(239, 13, 'Penilaian Performance', '/penilaianperformancePegawai', 'flaticon-analytics', '2021-01-15 07:21:26', '2021-03-01 21:04:29');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_absen`
--
ALTER TABLE `data_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_absen_operasi`
--
ALTER TABLE `data_absen_operasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_berita`
--
ALTER TABLE `data_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_jadwal`
--
ALTER TABLE `data_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_jadwal_operasi`
--
ALTER TABLE `data_jadwal_operasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_kebutuhan_operasi`
--
ALTER TABLE `data_kebutuhan_operasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_penyakit`
--
ALTER TABLE `data_penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_performance`
--
ALTER TABLE `data_performance`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_qr`
--
ALTER TABLE `data_qr`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_ruangan`
--
ALTER TABLE `data_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_shift`
--
ALTER TABLE `data_shift`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_jadwal_operasi`
--
ALTER TABLE `detail_jadwal_operasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_kebutuhan`
--
ALTER TABLE `detail_kebutuhan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_operasi`
--
ALTER TABLE `jenis_operasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_operasi`
--
ALTER TABLE `laporan_operasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `level_penaganan`
--
ALTER TABLE `level_penaganan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `user_role_id` (`user_role_id`) USING BTREE;

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_access_menu_role_id_index` (`user_role_id`),
  ADD KEY `user_access_menu_menu_id_index` (`user_menu_id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_subsub_menu`
--
ALTER TABLE `user_subsub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_sub_menu` (`user_sub_menu_id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_menu_id` (`user_menu_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_absen`
--
ALTER TABLE `data_absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `data_absen_operasi`
--
ALTER TABLE `data_absen_operasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_berita`
--
ALTER TABLE `data_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_jadwal`
--
ALTER TABLE `data_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_jadwal_operasi`
--
ALTER TABLE `data_jadwal_operasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1614545815;

--
-- AUTO_INCREMENT untuk tabel `data_kebutuhan_operasi`
--
ALTER TABLE `data_kebutuhan_operasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_penyakit`
--
ALTER TABLE `data_penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_performance`
--
ALTER TABLE `data_performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_qr`
--
ALTER TABLE `data_qr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=658;

--
-- AUTO_INCREMENT untuk tabel `data_ruangan`
--
ALTER TABLE `data_ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1610612400;

--
-- AUTO_INCREMENT untuk tabel `data_shift`
--
ALTER TABLE `data_shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `detail_jadwal_operasi`
--
ALTER TABLE `detail_jadwal_operasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1610700090;

--
-- AUTO_INCREMENT untuk tabel `detail_kebutuhan`
--
ALTER TABLE `detail_kebutuhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_operasi`
--
ALTER TABLE `jenis_operasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `laporan_operasi`
--
ALTER TABLE `laporan_operasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `level_penaganan`
--
ALTER TABLE `level_penaganan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1614326492;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_subsub_menu`
--
ALTER TABLE `user_subsub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`user_role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`user_menu_id`) REFERENCES `user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`user_menu_id`) REFERENCES `user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
