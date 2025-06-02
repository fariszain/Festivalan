-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2025 at 10:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `v3festivalan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `schedule_start` datetime NOT NULL,
  `schedule_end` datetime DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `event_category` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending_approval',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `title`, `description`, `schedule_start`, `schedule_end`, `location`, `event_category`, `image_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'yoyo', 'yoyoyoyo', '2025-12-12 08:00:00', '2025-12-13 02:00:00', 'USK', 'Musik & Konser', 'event_posters/Xgx9urzpNDMZvP0Gkfs20WK8yVkBKOhfVkqMMrva.png', 'approved', '2025-06-01 21:18:48', '2025-06-01 23:37:55'),
(2, 1, 'roro', 'roroooooo', '2011-12-12 08:08:00', '2025-12-12 02:21:00', 'awfaw', 'Workshop & Pelatihan', 'event_posters/9H6KyxCmve6xo6ryvFiQI5xVAuk02qKIqJdQNmgz.png', 'pending_approval', '2025-06-01 22:45:13', '2025-06-01 22:45:13'),
(3, 1, 'PDH DAY', '<p>PDH DAY adalah inisiatif mingguan yang bertujuan untuk memperkuat identitas dan kebersamaan mahasiswa Festivalan. Setiap Senin, seluruh civitas akademika diajak untuk mengenakan Pakaian Dinas Harian (PDH) sebagai simbol profesionalisme dan semangat belajar. Acara ini juga sering diisi dengan kegiatan-kegiatan kecil seperti diskusi tematik atau sesi sharing inspiratif di berbagai sudut kampus.</p>', '2025-06-12 09:00:00', NULL, 'Lingkungan Kampus Festivalan', 'Kegiatan Kampus', 'pdhday.jpg', 'approved', '2025-06-01 23:23:04', '2025-06-01 23:23:04'),
(4, 1, 'Buka Puasa Bersama', '<p>Dalam rangka menyambut bulan suci Ramadhan dan mempererat tali silaturahmi antar mahasiswa, UKM Kerohanian Islam Festivalan akan mengadakan acara Buka Puasa Bersama. Acara ini akan diisi dengan tausiyah, pembacaan ayat suci Al-Quran, doa bersama, dan tentunya hidangan berbuka puasa. Mari kita manfaatkan momen ini untuk meningkatkan keimanan dan kebersamaan.</p>', '2025-07-02 17:00:00', '2025-07-02 19:00:00', 'Aula Utama Kampus Festivalan', 'Acara Sosial & Keagamaan', 'bukber.jpg', 'approved', '2025-06-01 23:23:04', '2025-06-01 23:23:04'),
(5, 1, 'Peer Teaching : Belajar Bareng', '<p>Kesulitan memahami mata kuliah tertentu? Atau ingin memperdalam pemahamanmu? Program Peer Teaching hadir sebagai solusi! Di sini, kamu bisa belajar dari teman sebaya yang sudah lebih menguasai materi dalam suasana yang santai dan interaktif. Segera daftarkan dirimu sebagai peserta atau bahkan sebagai tutor jika kamu merasa mampu!</p>', '2025-06-16 10:00:00', '2025-06-16 12:00:00', 'Ruang Diskusi Fakultas & Perpustakaan Pusat', 'Akademik & Workshop', 'peerteaching.jpg', 'pending_approval', '2025-06-01 23:23:04', '2025-06-01 23:23:04'),
(6, 4, 'melukis', 'melukis indah', '2025-12-15 08:00:00', '2026-01-01 12:00:00', 'blang padang', 'Musik & Konser', 'event_posters/1Kfb8Sqy2jnHyW0zhUMNXxyGBv878oxYHxG9qUXa.jpg', 'approved', '2025-06-02 00:31:04', '2025-06-02 00:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `event_user`
--

CREATE TABLE `event_user` (
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_user`
--

INSERT INTO `event_user` (`event_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-06-01 23:45:16', '2025-06-01 23:45:16'),
(4, 1, '2025-06-01 23:32:17', '2025-06-01 23:32:17'),
(4, 4, '2025-06-02 00:28:07', '2025-06-02 00:28:07'),
(6, 4, '2025-06-02 00:43:41', '2025-06-02 00:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '0001_01_01_000000_create_users_table', 1),
(9, '0001_01_01_000001_create_cache_table', 1),
(10, '0001_01_01_000002_create_jobs_table', 1),
(11, '2025_06_01_170504_add_role_npm_nip_to_users_table', 1),
(12, '2025_06_01_202637_add_username_phone_bio_avatar_to_users_table', 1),
(13, '2025_06_02_031954_create_sessions_table', 1),
(14, '2025_06_02_040553_create_events_table', 1),
(15, '2025_06_02_055645_create_event_user_pivot_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('D39GY1ncit7t2OlrOX8e45DzihKa9oOKAbmGtnwO', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWVROMFJDbmVCR3NOQXVUaXA5YXdNWWpOZzM1M1dFS1pQWTRrZVJsMiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9CZXJhbmRhIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1748850221);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('mahasiswa','admin') NOT NULL DEFAULT 'mahasiswa',
  `npm` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `role`, `npm`, `nip`, `phone_number`, `bio`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'l', 'lala', 'l@gmail.com', 'mahasiswa', '2308107010039', NULL, NULL, NULL, NULL, NULL, '$2y$12$4ZG5r//D48AptGgYbCCexOd0n5a9/Cq6Ry3ly7CxobCKzTDC96b0.', NULL, '2025-06-01 21:18:06', '2025-06-01 21:18:06'),
(2, 'admin', 'admin ganteng', 'admin@gmail.com', 'admin', NULL, '11071273', NULL, NULL, NULL, NULL, '$2y$12$1VLl.u8t0JGl0xAyTIsmMO7GymyGy3PXtMDQqD7KDldpny4RGZqLa', NULL, '2025-06-01 22:43:51', '2025-06-01 22:43:51'),
(3, 'a', 'aa', 'a@gmail.com', 'admin', NULL, '110712789', NULL, NULL, NULL, NULL, '$2y$12$Zdbmt2VHQX/KudCx/36sc.Is0Ejsw70dhKE.VsLa6NSJF1IbZ3KZa', NULL, '2025-06-01 23:35:21', '2025-06-01 23:35:21'),
(4, 'faris zain as shadiq', 'faris', 'faris@gmail.com', 'mahasiswa', '2308107010050', NULL, NULL, NULL, NULL, NULL, '$2y$12$JvLsw6tghXMBg0YW/0EdW.kU2VqAifLm.YXyaVCgefHmGCucsVrW2', NULL, '2025-06-02 00:27:40', '2025-06-02 00:27:40'),
(5, 'adminyangbaru2', 'adminyangbaruuu2', 'adminbaruu2@gmail.com', 'admin', NULL, '11071273', '088141', 'faris', NULL, NULL, '$2y$12$0be/Mt5cTMsN6lqGanBh6OStfMAA.AWeXjcJ.pZ0NJwk6RjJF1hXW', NULL, '2025-06-02 00:34:06', '2025-06-02 00:42:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_user_id_foreign` (`user_id`);

--
-- Indexes for table `event_user`
--
ALTER TABLE `event_user`
  ADD PRIMARY KEY (`event_id`,`user_id`),
  ADD KEY `event_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_user`
--
ALTER TABLE `event_user`
  ADD CONSTRAINT `event_user_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
