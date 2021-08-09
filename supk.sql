-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2021 at 04:03 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supk`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_jawaban_ujian`
--

CREATE TABLE `data_jawaban_ujian` (
  `id` int(11) NOT NULL,
  `data_soal_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `data_soal_jawaban_id` int(11) DEFAULT NULL,
  `jawaban_essay` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_job_desk`
--

CREATE TABLE `data_job_desk` (
  `id` int(11) NOT NULL,
  `nama_posisi` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_nilai_ujian`
--

CREATE TABLE `data_nilai_ujian` (
  `id` int(11) NOT NULL,
  `setting_ujian_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `nilai_essay` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_soal`
--

CREATE TABLE `data_soal` (
  `id` int(11) NOT NULL,
  `master_soal_id` int(11) NOT NULL,
  `isi_soal` text NOT NULL,
  `file` varchar(200) DEFAULT NULL,
  `bobot_nilai` int(11) DEFAULT NULL,
  `kunci_jawaban` varchar(11) DEFAULT NULL,
  `type_soal` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_soal_jawaban`
--

CREATE TABLE `data_soal_jawaban` (
  `id` int(11) NOT NULL,
  `data_soal_id` int(11) NOT NULL,
  `isi_jawaban` text NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_token`
--

CREATE TABLE `data_token` (
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_ujian`
--

CREATE TABLE `data_ujian` (
  `id` int(11) NOT NULL,
  `data_job_desk_id` int(11) NOT NULL,
  `nama_ujian` varchar(100) NOT NULL,
  `deksripsi` text NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `master_soal_id` int(11) NOT NULL,
  `waktu_ujian` varchar(100) NOT NULL,
  `acak_soal` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `nilai_minimum` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `master_soal`
--

CREATE TABLE `master_soal` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `nik` varchar(110) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nik`, `name`, `image`, `email`, `email_verified_at`, `telepon`, `password`, `alamat`, `maps`, `user_role_id`, `is_active`, `forgot`, `mode_gelap`, `created_at`, `updated_at`) VALUES
(3, NULL, 'admin', 'user.webp', 'admin@gmail.com', '1', '0838371444', '$2y$10$/50MXxCKZpi1XjHqKWh3MOldLpj6wcRy4wFjJkXd85aVQyHk3pa7e', 'desa suci blok tenggeran mundu cirebon', NULL, 1, 1, NULL, 2, '2020-10-18 14:23:15', '2021-06-29 06:59:38'),
(1628514893, '2002002002000', 'peserta', 'user.webp', 'peserta@gmail.com', '1628514893', '0898989898', '$2y$10$sEqBekeUxRi55b3fsoZsHOwwdQgVPIn5r2gFXLAOwd0ev2r3yBRia', 'alamat', NULL, 2, 1, NULL, 0, '2021-08-10 00:14:53', '2021-08-10 00:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `user_menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `user_role_id`, `user_menu_id`, `created_at`, `updated_at`) VALUES
(104, 2, 14, '2021-06-05 21:24:15', '2021-06-05 21:24:15'),
(153, 1, 6, '2021-08-09 05:44:35', '2021-08-09 05:44:35'),
(154, 1, 26, '2021-08-09 05:44:35', '2021-08-09 05:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `created_at`, `updated_at`) VALUES
(6, 'Dashboard', '2020-08-31 02:04:06', '2021-03-02 16:30:19'),
(8, 'MenuManagement', '2020-08-31 02:04:39', '2020-08-31 02:04:39'),
(14, 'Home', '2021-06-05 21:21:14', '2021-06-05 21:21:14'),
(26, 'Data Master', '2021-08-09 05:26:25', '2021-08-09 05:29:17'),
(27, 'Test Masuk', '2021-08-09 05:41:59', '2021-08-09 05:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2020-08-31 02:10:28', '2021-03-01 21:13:46'),
(2, 'Peserta', '2020-12-16 07:13:02', '2020-12-08 07:12:55'),
(3, 'Manager', '2021-06-05 10:19:21', '2021-06-05 10:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_subsub_menu`
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
-- Dumping data for table `user_subsub_menu`
--

INSERT INTO `user_subsub_menu` (`id`, `user_sub_menu_id`, `title`, `url`, `created_at`, `Updated_at`) VALUES
(40, 283, 'Jadwal Ujian/Test', '/datajadwal', '2021-08-09 05:36:32', '2021-08-09 05:36:32'),
(41, 283, 'Master Soal', '/data_soal', '2021-08-08 19:59:41', '2021-08-09 06:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
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
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `user_menu_id`, `title`, `url`, `icon`, `created_at`, `updated_at`) VALUES
(1, 8, 'Menu', '/menu', 'sliders', NULL, '2020-08-30 11:21:17'),
(2, 8, 'SubMenu', '/sub_menu', 'sliders', NULL, '2020-08-30 11:14:48'),
(17, 8, 'SubSubMenu', '/sub_sub_menu', 'sliders', NULL, '2020-08-30 11:14:48'),
(279, 6, 'Dashboard', '/dashboardadmin', 'fas fa-tachometer-alt', '2021-08-09 05:24:55', '2021-08-09 05:57:35'),
(280, 26, 'Data Job Desk', '/datajobdesk', 'fas fa-user-tie', '2021-08-09 05:27:13', '2021-08-09 05:58:32'),
(281, 26, 'Data Peserta', '/data_peserta', 'fas fa-users', '2021-08-09 05:30:16', '2021-08-09 05:56:49'),
(282, 26, 'Data Hasil Test', '/datanilai', 'far fa-copy', '2021-08-09 05:32:33', '2021-08-09 05:59:03'),
(283, 26, 'Settings Ujian/Test', '/dataujian', 'far fa-edit', '2021-08-09 05:35:40', '2021-08-09 06:59:20'),
(284, 27, 'Daftar Test', '/daftartest', 'fas fa-book', '2021-08-09 05:42:57', '2021-08-09 05:42:57'),
(285, 27, 'Hasil Test', '/hasiltestpeserta', 'fas fa-book', '2021-08-09 05:43:49', '2021-08-09 05:43:49'),
(286, 26, 'Data Token', '/datatoken', 'fas fa-fax', '2021-08-10 00:21:57', '2021-08-10 00:23:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_job_desk`
--
ALTER TABLE `data_job_desk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_soal`
--
ALTER TABLE `data_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_job_desk_id` (`master_soal_id`);

--
-- Indexes for table `data_soal_jawaban`
--
ALTER TABLE `data_soal_jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_ujian`
--
ALTER TABLE `data_ujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `master_soal_id` (`master_soal_id`),
  ADD KEY `data_job_desk_id` (`data_job_desk_id`);

--
-- Indexes for table `master_soal`
--
ALTER TABLE `master_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `user_role_id` (`user_role_id`) USING BTREE;

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_access_menu_role_id_index` (`user_role_id`),
  ADD KEY `user_access_menu_menu_id_index` (`user_menu_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_subsub_menu`
--
ALTER TABLE `user_subsub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_sub_menu` (`user_sub_menu_id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_menu_id` (`user_menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_job_desk`
--
ALTER TABLE `data_job_desk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_ujian`
--
ALTER TABLE `data_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1628514894;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=481;

--
-- AUTO_INCREMENT for table `user_subsub_menu`
--
ALTER TABLE `user_subsub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=287;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`user_role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`user_menu_id`) REFERENCES `user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`user_menu_id`) REFERENCES `user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
