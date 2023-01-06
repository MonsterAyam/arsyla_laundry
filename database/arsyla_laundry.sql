-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jan 2023 pada 09.41
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gmc`
--
CREATE DATABASE IF NOT EXISTS `gmc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gmc`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jadwal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwals`
--

INSERT INTO `jadwals` (`id`, `jadwal`, `Harga`, `created_at`, `updated_at`) VALUES
(1, 'SIANG', 50000, '2022-07-20 04:51:33', '2022-07-20 04:51:33'),
(2, 'MALAM', 120000, '2022-07-20 04:51:33', '2022-07-20 04:51:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam_mains`
--

CREATE TABLE `jam_mains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lapangan_id` bigint(20) UNSIGNED NOT NULL,
  `jadwal_id` bigint(20) UNSIGNED NOT NULL,
  `jam_main` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jam_mains`
--

INSERT INTO `jam_mains` (`id`, `lapangan_id`, `jadwal_id`, `jam_main`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '13:00 s/d 14:00', 0, '2022-07-20 04:51:33', '2022-08-18 13:05:06'),
(2, 1, 1, '14:00 s/d 15:00', 0, '2022-07-20 04:51:33', '2022-08-18 13:05:06'),
(3, 1, 1, '15:00 s/d 16:00', 1, '2022-07-20 04:51:33', '2022-08-19 01:37:28'),
(4, 1, 1, '16:00 s/d 17:00', 0, '2022-07-20 04:51:33', '2022-08-18 13:05:06'),
(5, 1, 1, '17:00 s/d 18:00', 0, '2022-07-20 04:51:34', '2022-08-18 13:05:06'),
(6, 1, 2, '18:30 s/d 19:30', 0, '2022-07-20 04:51:34', '2022-08-18 13:05:06'),
(7, 1, 2, '19:30 s/d 20:30', 0, '2022-07-20 04:51:34', '2022-08-19 01:38:23'),
(8, 1, 2, '20:30 s/d 21:30', 0, '2022-07-20 04:51:34', '2022-08-18 13:05:06'),
(9, 1, 2, '21:30 s/d 22:30', 0, '2022-07-20 04:51:34', '2022-08-18 13:05:06'),
(10, 2, 1, '13:00 s/d 14:00', 0, '2022-07-25 10:08:21', '2022-08-18 13:05:06'),
(11, 2, 1, '14:00 s/d 15:00', 0, '0000-00-00 00:00:00', '2022-08-18 13:05:06'),
(12, 2, 1, '15:00 s/d 16:00', 0, NULL, '2022-08-18 13:05:06'),
(13, 2, 1, '16:00 s/d 17:00', 1, NULL, '2022-10-08 07:32:48'),
(14, 2, 1, '17:00 s/d 18:00', 0, NULL, '2022-08-18 13:05:06'),
(15, 2, 2, '18:30 s/d 19:30', 0, NULL, '2022-08-18 13:05:06'),
(16, 2, 2, '19:30 s/d 20:30', 0, NULL, '2022-08-19 01:38:23'),
(17, 2, 2, '20:30 s/d 21:30', 0, NULL, '2022-08-18 13:05:06'),
(18, 2, 2, '21:30 s/d 22:30', 0, NULL, '2022-08-18 13:05:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapangans`
--

CREATE TABLE `lapangans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_lapangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lapangans`
--

INSERT INTO `lapangans` (`id`, `kode_lapangan`, `image`, `active`, `created_at`, `updated_at`) VALUES
(1, 'lapangan 1', 'lapanganView-image/Ny0N0SR2nfNp1CVoemG5HbKqQCkUHYQDOL4Sfh02.jpg', '1', '2022-07-20 04:51:33', '2022-07-20 06:14:47'),
(2, 'Lapangan 2', 'lapangan-image/HhARKYuQrmPNp2bo1wxcwNPcPWWNY5CLuS65ORFg.jpg', '1', '2022-07-20 06:15:18', '2022-07-20 06:15:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapangan_images`
--

CREATE TABLE `lapangan_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lapangan_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lapangan_images`
--

INSERT INTO `lapangan_images` (`id`, `lapangan_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'lapanganView-image/zR6Qlbi6XBkFSymmjIeIH2h6OYUFwOIC2sCaTZxC.jpg', '2022-07-20 06:17:05', '2022-07-20 06:17:05'),
(2, 1, 'lapanganView-image/kVEZ1ogYGuNP7ixASVtQ8aTlsQ3ctruMSgvxTAAl.jpg', '2022-07-20 06:17:18', '2022-07-20 06:17:18'),
(3, 3, 'lapanganView-image/z3pB4m2ECKTjejCjDbGoreIrtr8gM8mEyQY2Ivad.jpg', '2022-07-24 09:16:22', '2022-07-24 09:16:22'),
(4, 3, 'lapanganView-image/YND4Ytmeu4ufmWlpbyv250jEIKLBAyuktBPWfhae.jpg', '2022-07-24 09:23:25', '2022-07-24 09:23:25'),
(5, 2, 'lapanganView-image/jkvl4j8vs735VsgmPGGOhTt8gBIVvO16tqyuUqgy.jpg', '2022-08-17 09:18:08', '2022-08-17 09:18:08'),
(6, 2, 'lapanganView-image/tX7psPqOmKQXPbqybhTqcxRz4q9dIQRk1iiePdMB.jpg', '2022-08-17 09:18:17', '2022-08-17 09:18:17');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_04_12_095430_create_transaksis_table', 1),
(7, '2022_06_16_123203_create_lapangans_table', 1),
(8, '2022_06_16_124053_create_jadwals_table', 1),
(9, '2022_06_23_050153_create_lapangan_images_table', 1),
(10, '2022_07_14_171215_create_jam_mains_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('alep123@gmail.com', '$2y$10$5KP7huVMmdhfVZirRgcnQOgseznM2zfW3W9UKq6j3QrsFuA8uF8P.', '2022-08-18 23:32:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Selesai','Belum Bayar') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum Bayar',
  `lapangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_main` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_main` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `batas_pembayaran` datetime DEFAULT NULL,
  `expired` date DEFAULT NULL,
  `pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksis`
--

INSERT INTO `transaksis` (`id`, `status`, `lapangan`, `waktu_main`, `jam_main`, `image`, `total_pembayaran`, `batas_pembayaran`, `expired`, `pelanggan`, `no_telp`, `created_at`, `updated_at`) VALUES
(67, 'Selesai', 'lapangan 1', 'SIANG', '13:00 s/d 14:00', 'bukti_pembayaran/Xc2kx5Lwp9P13B9FauCqt3nXoa58op3JjGfLamqV.jpg', 50000, '2022-08-17 18:29:43', '2022-08-18', 'alep wibu2', '12345678945', '2022-07-29 10:59:43', '2022-08-17 11:09:39'),
(68, 'Selesai', 'lapangan 1', 'SIANG', '14:00 s/d 15:00', 'bukti_pembayaran/cRL4JIgx7gbobXockk4cYG0Vb5lE30Ynobf3mH4N.jpg', 50000, '2022-08-17 18:30:33', '2022-08-18', 'alep wibu2', '121212121212', '2022-07-29 11:00:33', '2022-08-17 11:09:27'),
(69, 'Selesai', 'lapangan 1', 'SIANG', '15:00 s/d 16:00', 'bukti_pembayaran/iJUSRSetKW2npkLWtAYBReaSkibd8pyP5rec3TwT.jpg', 50000, '2022-08-17 18:31:05', '2022-08-18', 'alep wibu2', '1234562121', '2022-07-29 11:01:05', '2022-08-17 11:09:17'),
(70, 'Selesai', 'lapangan 1', 'SIANG', '16:00 s/d 17:00', 'bukti_pembayaran/PQacq1dAYztY2lyYfIqzSZcxopLsvzYrINRxfofO.jpg', 50000, '2022-08-17 18:32:03', '2022-08-18', 'alep wibu2', '1234156612', '2022-07-29 11:02:03', '2022-08-17 11:09:08'),
(71, 'Selesai', 'lapangan 1', 'SIANG', '17:00 s/d 18:00', 'bukti_pembayaran/MaARAu0h3zZ1XvOgJeSKcuEfDsZGez7o3vfASlDM.jpg', 50000, '2022-08-17 18:33:22', '2022-08-18', 'alep wibu2', '1234567899', '2022-07-29 11:03:22', '2022-08-17 11:08:55'),
(72, 'Selesai', 'lapangan 1', 'MALAM', '18:30 s/d 19:30', 'bukti_pembayaran/f1wSX0nMZzUH7xt9MHZILhjm8wSf8zPaOCWqY0Vk.jpg', 120000, '2022-08-17 18:34:04', '2022-08-18', 'alep wibu2', '123456121212', '2022-07-29 11:04:04', '2022-08-17 11:08:35'),
(73, 'Selesai', 'lapangan 1', 'MALAM', '19:30 s/d 20:30', 'bukti_pembayaran/Pec7sbnR54fm1QcOxlxvkKkamLYsQFGvSOwdaPh2.jpg', 120000, '2022-08-17 18:34:43', '2022-08-18', 'alep wibu2', '123213131212', '2022-07-29 11:04:43', '2022-08-17 11:08:22'),
(74, 'Selesai', 'lapangan 1', 'MALAM', '20:30 s/d 21:30', 'bukti_pembayaran/RMElENyy2ZglcEiHefo5zSwEplkHno1eWXoAMqH1.jpg', 120000, '2022-08-17 18:35:12', '2022-08-18', 'alep wibu2', '1234566122', '2022-07-29 11:05:12', '2022-08-17 11:08:13'),
(75, 'Selesai', 'lapangan 1', 'MALAM', '21:30 s/d 22:30', 'bukti_pembayaran/SG2NF0FV97tWACTAcesOqUXPC6ut5C8WtxpWbMX4.jpg', 120000, '2022-08-17 18:35:44', '2022-08-18', 'alep wibu2', '123131231313', '2022-07-29 11:05:44', '2022-08-17 11:07:58'),
(76, 'Selesai', 'Lapangan 2', 'SIANG', '13:00 s/d 14:00', 'bukti_pembayaran/ygEouYRWTQA8vQviO4U3CnDy70pamagqlfeks4Zn.jpg', 50000, '2022-08-17 18:47:13', '2022-08-18', 'alep wibu2', '1234561212', '2022-08-11 11:17:13', '2022-08-17 11:28:35'),
(77, 'Selesai', 'Lapangan 2', 'SIANG', '14:00 s/d 15:00', 'bukti_pembayaran/v1ViVaUR0KOjOLZnKsLEZaLvy8i0LaexJil0qzHR.jpg', 50000, '2022-08-17 18:47:58', '2022-08-18', 'alep wibu2', '1234564848', '2022-08-11 11:17:58', '2022-08-17 11:28:24'),
(78, 'Selesai', 'Lapangan 2', 'SIANG', '15:00 s/d 16:00', 'bukti_pembayaran/sfQEuQrWFnU5gffZ4DZzbjZaNS9MxCfrkwJQ94ao.jpg', 50000, '2022-08-17 18:51:29', '2022-08-18', 'alep wibu2', '123456789', '2022-08-11 11:21:29', '2022-08-17 11:28:15'),
(79, 'Selesai', 'Lapangan 2', 'SIANG', '16:00 s/d 17:00', 'bukti_pembayaran/xWyG7tuHw7iWL15AdEJiJkEuBNdvIHOfx1gaZUkq.jpg', 50000, '2022-08-17 18:53:18', '2022-08-18', 'alep wibu2', '123456789', '2022-08-11 11:23:18', '2022-08-17 11:28:04'),
(80, 'Selesai', 'Lapangan 2', 'SIANG', '17:00 s/d 18:00', 'bukti_pembayaran/DszDbvQTJTFkFrgPacB0E0eFvKMbRW9mNTjZC20K.jpg', 50000, '2022-08-17 18:53:55', '2022-08-18', 'alep wibu2', '123456789', '2022-08-11 11:23:55', '2022-08-17 11:27:54'),
(81, 'Selesai', 'Lapangan 2', 'MALAM', '18:30 s/d 19:30', 'bukti_pembayaran/8xBpY20AkOuVsnpQcavpyQ5QQScown0IDUtiQZnq.jpg', 120000, '2022-08-17 18:54:42', '2022-08-18', 'alep wibu2', '123345645646', '2022-08-11 11:24:42', '2022-08-17 11:27:46'),
(82, 'Selesai', 'Lapangan 2', 'MALAM', '19:30 s/d 20:30', 'bukti_pembayaran/G2F0sOyNF5suXNaRNhSurjzuMl2r86S3sVnEhbkz.jpg', 120000, '2022-08-17 18:55:16', '2022-08-18', 'alep wibu2', '12345645', '2022-08-11 11:25:16', '2022-08-17 11:27:36'),
(83, 'Selesai', 'Lapangan 2', 'MALAM', '20:30 s/d 21:30', 'bukti_pembayaran/E6iP5kE3HW4zILIAUwcapgO8JVI5pZVWUsXD1Iu8.jpg', 120000, '2022-08-17 18:55:43', '2022-08-18', 'alep wibu2', '123456789', '2022-08-11 11:25:44', '2022-08-17 11:27:27'),
(84, 'Selesai', 'Lapangan 2', 'MALAM', '21:30 s/d 22:30', 'bukti_pembayaran/4o5ec9ks9ell2Fl2FmyiCJOP2BlNltZKMWVL0ZoA.jpg', 120000, '2022-08-17 18:56:13', '2022-08-18', 'alep wibu2', '1234567779', '2022-08-11 11:26:13', '2022-08-17 11:27:17'),
(85, 'Selesai', 'lapangan 1', 'MALAM', '19:30 s/d 20:30', 'bukti_pembayaran/zFF2sAt1cYudSktUcMqb2iJgqtMDdRfeKagJYUzR.jpg', 120000, '2022-08-18 11:48:33', '2022-08-19', 'rahmat ramadhan', '082284976252', '2022-08-18 04:18:33', '2022-08-18 04:19:37'),
(87, 'Selesai', 'lapangan 1', 'SIANG', '15:00 s/d 16:00', 'bukti_pembayaran/Ao2FsIVXvMFh7feTM3spsiSu2s2fR9EjLrSSXcU8.jpg', 50000, '2022-08-19 09:07:27', '2022-08-20', 'rahmat pratama', '082284976252', '2022-08-19 01:37:28', '2022-08-19 01:38:35'),
(88, 'Selesai', 'Lapangan 2', 'SIANG', '16:00 s/d 17:00', 'bukti_pembayaran/T3DoNhJSqzTNSdjEYKSjeD6yqF6T066CZCLUQNxm.jpg', 50000, '2022-10-08 15:02:48', '2022-10-09', 'Akbar fadli', '082284976252', '2022-10-08 07:32:48', '2022-10-08 07:33:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_cashier` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `no_telp`, `address`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `is_admin`, `is_cashier`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Akbar fadli', 'akbar42@gmail.com', '082284976252', NULL, NULL, '$2y$10$isA21vRP7Vh7RyoqCPoQuOb6CXO.edcGKz5GhmwOA2/pqHXu9Gdza', NULL, NULL, NULL, 1, 0, NULL, '2022-07-20 04:51:33', '2022-07-20 09:22:32'),
(2, 'Rahmat', 'rahmat15@gmail.com', '0827828929', NULL, NULL, '$2y$10$lsg5.2YCrrec2JjjTxZ9xu1EAXmc/TKBkp8biWstTyhfvt.Np2JmS', NULL, NULL, NULL, 0, 1, NULL, '2022-07-20 05:04:42', '2022-07-20 08:11:51'),
(3, 'alep wibu2', 'alep123@gmail.com', '08767564333', NULL, NULL, '$2y$10$X61JFlt5H9D1MbhqsgUxY.4aXH77SJ8Xp1RzmErw3NP8FRpF34X8.', NULL, NULL, NULL, 0, 0, 'tYWpFRTtzgK3C2xzburqnStXPljlFj0CkAGBIYekY3CaudcWpQ8GQoIcZEHJ', '2022-07-20 09:33:36', '2022-08-18 11:15:42'),
(4, 'sintia', 'sintia123@gmail.com', '0822465478', 'simpang pulai', NULL, '$2y$10$N05bX0RIxQ1mJ5PFY3SKc.9PjB1UaWdKYX56KUXU5uKUfTupIjIKa', NULL, NULL, NULL, 0, 0, NULL, '2022-07-21 01:14:59', '2022-07-21 01:14:59'),
(15, 'Tania Astuti', 'kmanullang@example.com', '(+62) 684 2769 309', 'Psr. Basuki No. 687, Bandar Lampung 40152, Kaltim', '2022-07-25 11:11:13', '$2y$10$jaln0umdxxFz2n7qNerTK.c.EZb/h2xIuxHBAjCNlcRqFtTPZfbVK', NULL, NULL, NULL, 0, 0, 'hD1b5cxIWJBNzTGGxdjukfgzWlURfSMSKttZ5H61Q23qjZkN1YMoLRAyE7cp', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(16, 'Cakrabirawa Jamal Dabukke', 'jane76@example.org', '(+62) 362 0481 100', 'Ki. W.R. Supratman No. 215, Tanjungbalai 63730, Lampung', '2022-07-25 11:11:13', '$2y$10$Z0tcL3cS7gmIt/WBqqRf1.8kiJy5f..Ow1JbzDHgfaWmXuJCtvHiu', NULL, NULL, NULL, 0, 0, 'gRbqOizaolOsw3LVRC1B2Cl3fPCTO5PM8Jka2GU8Q2K0ouae80ws1OBC4CeP', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(17, 'Carla Ani Pudjiastuti M.Pd', 'rachel77@example.org', '0822 4134 952', 'Gg. Yos Sudarso No. 483, Banjar 31939, Jatim', '2022-07-25 11:11:13', '$2y$10$8IJe7NHd0rk1ckdmI872GOSYjTvuI6dZyYz/evrqoqEkIyjTk0chu', NULL, NULL, NULL, 0, 0, 'NEfYDWrhk5yrhruMLrEuSb7pUuqK7KGQz6fFWNPv5TMzKBrF5mMuQhP4sNBD', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(18, 'Dimas Siregar S.Farm', 'hlailasari@example.com', '(+62) 21 2131 4279', 'Gg. Wahidin Sudirohusodo No. 635, Samarinda 95426, Lampung', '2022-07-25 11:11:13', '$2y$10$kNIe9epCwvFgrxGWE.WP5OA4REnQxbvaKnUwZP6CSzaR/rL3KyYKm', NULL, NULL, NULL, 0, 0, 'UkcTrEjrwC', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(19, 'Asmuni Januar', 'ratna.safitri@example.com', '(+62) 743 3470 0128', 'Jln. Tangkuban Perahu No. 935, Bukittinggi 27073, Malut', '2022-07-25 11:11:13', '$2y$10$v3bJyc9YXQArtFHC8heBQuAzNE.YgGDBv7AARG8j39Qv1xHx0Ujxi', NULL, NULL, NULL, 0, 0, 'scLplxSsaJ', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(20, 'Ella Hastuti', 'wulan.wijayanti@example.org', '0992 8303 9833', 'Ds. Pasteur No. 210, Depok 51006, Sumsel', '2022-07-25 11:11:13', '$2y$10$Wgp.b9lDQrxBzydbk412JOe57ZIJzb8fO9VaPO7Pp47OcwaQqjjhC', NULL, NULL, NULL, 0, 0, 'xbsXbmWron', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(21, 'Sakti Hardiansyah', 'cahya05@example.com', '(+62) 872 773 151', 'Jln. Orang No. 239, Tual 55207, Sulut', '2022-07-25 11:11:13', '$2y$10$m27jx1y41c2R9wttqYVZ6eyylvSFKScebQnAeATtLjzb5fYbVq0r2', NULL, NULL, NULL, 0, 0, 'jkDJRYRnE6', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(23, 'Tedi Sitorus', 'purwanti.yani@example.com', '0514 8490 987', 'Psr. Bak Mandi No. 891, Palu 22574, Papua', '2022-07-25 11:11:13', '$2y$10$iDwVkFJHPDwdK7EsI3axj.uH9u3WTMZd07s/tZMrMwet92CuHggnK', NULL, NULL, NULL, 0, 0, 'gESaOMoxum', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(24, 'Tami Puji Suryatmi S.Kom', 'kmelani@example.com', '(+62) 684 3042 2540', 'Jr. Ki Hajar Dewantara No. 698, Palangka Raya 27264, Gorontalo', '2022-07-25 11:11:13', '$2y$10$6TsapVFLtSFWRryCYprLrOkJMZP39VVD3Ccp8SEB9TRGAx4/x6O4G', NULL, NULL, NULL, 0, 0, 'li6MuutR9d', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(25, 'Viman Firgantoro', 'samiah.handayani@example.com', '(+62) 920 7966 507', 'Gg. Bagas Pati No. 449, Cimahi 64451, Banten', '2022-07-25 11:11:13', '$2y$10$py8/rezJwH84qMFNfUDrkOLmMFs94AJUpsFzVVNgsUK1YkOL0J2oW', NULL, NULL, NULL, 0, 0, 'cWkYdn5D6l', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(26, 'Fitriani Usada S.Sos', 'gbudiman@example.net', '(+62) 580 2025 5006', 'Gg. Radio No. 996, Tegal 95664, Bengkulu', '2022-07-25 11:11:13', '$2y$10$IJtgx2lHPr3.8JmwZrRxmuLswrCEbylCHaDTiggPLkcYqoQRD1IDW', NULL, NULL, NULL, 0, 0, 'QL1PsXyuKr', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(27, 'Taswir Adika Mangunsong S.Gz', 'teddy.safitri@example.org', '0933 0889 031', 'Gg. Imam No. 31, Palu 55933, Bengkulu', '2022-07-25 11:11:13', '$2y$10$FN2rq6ANWw0pwTCHgkciheNmjFKUcjodLIw3nDhv5ZXcioDgQZiPW', NULL, NULL, NULL, 0, 0, 'UBxiEgHkyj', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(28, 'Rizki Latupono', 'tsitorus@example.net', '(+62) 783 7910 993', 'Jr. Kyai Gede No. 339, Tidore Kepulauan 54157, Kaltim', '2022-07-25 11:11:14', '$2y$10$ZjBaF.G461dHt28l7Fj9tOdli.nib0FDaNsViipZ5RRCb4.R8Nzie', NULL, NULL, NULL, 0, 0, 'O9OZH3GbZw', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(29, 'Aisyah Yunita Wastuti S.Psi', 'jono76@example.org', '0892 961 883', 'Jr. K.H. Maskur No. 575, Bogor 10846, NTT', '2022-07-25 11:11:14', '$2y$10$e0AuInyApkeLgTfIIZ.IPOE04RGE7RFA.NLF4JbVM2bj9KKARH49q', NULL, NULL, NULL, 0, 0, 'b5Uv94YSNu', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(30, 'Vicky Suartini', 'puspita.jarwi@example.net', '0395 2728 9904', 'Ki. Samanhudi No. 935, Jayapura 17090, Sulsel', '2022-07-25 11:11:14', '$2y$10$v6.EtVWMi8Z4o.NqXAIdMO3JGt1GhquTS5SxjQ3daQHWNJed2Yh0C', NULL, NULL, NULL, 0, 0, 'l3ax7Wnskr', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(31, 'Kawaya Jagaraga Wacana S.E.I', 'yolanda.cahya@example.com', '(+62) 334 8158 649', 'Jln. Industri No. 299, Binjai 53766, Kalteng', '2022-07-25 11:11:14', '$2y$10$uiknewEUc9bOFOaqq8m4tupY6lQhcHIePxjIHAO9sOmXhkzpIRd9.', NULL, NULL, NULL, 0, 0, 'X1g5ozwEZq', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(32, 'Maimunah Wulandari', 'elma67@example.com', '0227 0078 4927', 'Dk. Sadang Serang No. 368, Surabaya 34465, Papua', '2022-07-25 11:11:14', '$2y$10$lTgreqCjXs0kxphVhXBNG.khmWWIG35F6Yqf6e12cvM8eNmHdvBNa', NULL, NULL, NULL, 0, 0, 'q0IlSaFTfy', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(33, 'Wirda Rahayu', 'ooktaviani@example.org', '(+62) 389 2190 583', 'Gg. Samanhudi No. 281, Batam 56495, Kalsel', '2022-07-25 11:11:14', '$2y$10$aA1MKhEzzqvp/CB4.ELrz.5vqs.VzNq.ZZXbiwHvI7GzJGKtmZiou', NULL, NULL, NULL, 0, 0, 'BKrTf2yn0v', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(34, 'Cinthia Handayani', 'raina24@example.net', '(+62) 248 7399 8074', 'Gg. Gajah Mada No. 722, Tomohon 80132, Malut', '2022-07-25 11:11:14', '$2y$10$AGHLfpL/330DUYmhWZHSi.c3pWLHxdGhaYkL.IE5l/7luPnQRH1wq', NULL, NULL, NULL, 0, 0, 'utFTi0rQU2', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(35, 'Cinthia Irma Uyainah', 'esuryono@example.org', '0331 6963 740', 'Ki. Basoka No. 790, Kediri 16154, Aceh', '2022-07-25 11:11:14', '$2y$10$9aP8n2UFtiSM4PDf.tPqhux9puG7Zb/lDPdctbpZqbrrayr.MxY7C', NULL, NULL, NULL, 0, 0, 'ztPn00KlQ1', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(36, 'Banawa Pradipta', 'julia.palastri@example.net', '(+62) 261 5686 364', 'Ki. Bakaru No. 120, Mataram 85171, Papua', '2022-07-25 11:11:14', '$2y$10$XXRtK5BeVmZVpTFlZhJXbePQryF7zYA5jvzm9MKOvD97gP0aDBpNO', NULL, NULL, NULL, 0, 0, '1YXUkwZUFn', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(37, 'Yani Rahayu S.Gz', 'mujur57@example.net', '(+62) 669 3230 2729', 'Jln. Salam No. 959, Surakarta 19485, Jabar', '2022-07-25 11:11:14', '$2y$10$dDvzw9/gyjHmxnCtALURo.jK1ecXcjnPL4EbSZXHodqeCUz9JeTXy', NULL, NULL, NULL, 0, 0, 'Vhruhv0TW4', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(38, 'Winda Fujiati', 'faizah.nainggolan@example.com', '(+62) 726 8314 536', 'Dk. Flores No. 560, Bontang 77947, Jateng', '2022-07-25 11:11:14', '$2y$10$WlIcgucwIZTQVOZeYolFXuVptkn2AewgWe3gukmJGQtBY4njDlBjq', NULL, NULL, NULL, 0, 0, '8l1XEiMBkl', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(39, 'Ghaliyati Aryani', 'rosman96@example.org', '(+62) 813 6844 944', 'Jln. Veteran No. 527, Gorontalo 12127, Sulsel', '2022-07-25 11:11:14', '$2y$10$AofQ0OapwjDAnXBlCf/qWuLWUcm9W7/0Gp/JiGsYTfrO7t30klAb6', NULL, NULL, NULL, 0, 0, 'T5bBGB8jYb', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(40, 'Ghaliyati Zulaika', 'maulana.gambira@example.com', '0369 1288 8072', 'Gg. Ahmad Dahlan No. 894, Palu 67145, NTT', '2022-07-25 11:11:14', '$2y$10$U7X9ku7IatrDN6TCta7Bieq2EmNw4wIsnQoQ8elVLtaLwgUF8dTvC', NULL, NULL, NULL, 0, 0, 'ewTXGp1TXP', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(41, 'Tiara Padmasari', 'novitasari.suci@example.net', '(+62) 25 8951 6333', 'Jr. Bagis Utama No. 886, Kupang 77540, DKI', '2022-07-25 11:11:14', '$2y$10$cvNzf8oI4aAyIGLPRTDnaOGRNxm1QlU4Ctubp.ExPNKV8A/hsWalW', NULL, NULL, NULL, 0, 0, '7sut5Jb7ZJ', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(42, 'Embuh Dabukke', 'nababan.cinta@example.net', '0434 8893 455', 'Jln. HOS. Cjokroaminoto (Pasirkaliki) No. 177, Makassar 38745, DKI', '2022-07-25 11:11:14', '$2y$10$mSFpwugPXcPetVV1fcNhM.IfqYZbq2VMcN2t.L7SYn/w6NFBDfr7C', NULL, NULL, NULL, 0, 0, 'junOwrqJNJ', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(43, 'Diana Oktaviani', 'rahmawati.asman@example.org', '(+62) 25 5481 903', 'Ki. Moch. Toha No. 76, Bima 36277, DIY', '2022-07-25 11:11:15', '$2y$10$e0Cd.Z7wj30fvAs76FlNIOJ3ilAFpE43UaxbydGhcQkne7KDg.vae', NULL, NULL, NULL, 0, 0, 'emeaYFPEPD', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(44, 'Gandi Hutapea', 'kamila.yulianti@example.net', '0886 072 061', 'Ki. Basuki No. 394, Tanjung Pinang 32643, Kalsel', '2022-07-25 11:11:15', '$2y$10$f5qWi.1k4l4XPgqU06zPV.vXjs3oQ38aGtHWmwhaWmfKWEKajW3nG', NULL, NULL, NULL, 0, 0, 'T79pjbtlK4', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(45, 'Paris Rahimah', 'widya26@example.org', '0357 1198 5540', 'Dk. Abdul Rahmat No. 108, Sabang 96500, Kaltara', '2022-07-25 11:11:15', '$2y$10$stj.ZL22YAPhEqss.VsHiup6hK35m5AL.K6vm27RIAM9ViBeoeksu', NULL, NULL, NULL, 0, 0, '3za5hu8Bc7', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(46, 'Gasti Yolanda', 'zwasita@example.org', '(+62) 597 2465 5634', 'Gg. Yohanes No. 928, Tegal 42873, Babel', '2022-07-25 11:11:15', '$2y$10$1hsLUJ/qJaxDazgdbcXxfuV15c4AHw7oZFxVwWWoPw8AgJoqxJdI.', NULL, NULL, NULL, 0, 0, '0DENI4ficF', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(47, 'Omar Santoso', 'xyuliarti@example.com', '(+62) 540 5148 4397', 'Jr. Cikapayang No. 902, Padangsidempuan 74852, Sulsel', '2022-07-25 11:11:15', '$2y$10$duT4Cc7YIAU9pb.0AwjuM.vacJy50P1SLsRKPtoUzGT2grcPFHolO', NULL, NULL, NULL, 0, 0, 'SqNSB8XLt8', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(48, 'Karma Prayoga', 'ndabukke@example.com', '0766 8645 566', 'Ki. Ters. Jakarta No. 575, Tangerang 30207, Sumut', '2022-07-25 11:11:15', '$2y$10$dPZR.4zDGbWy50S4wGzvAOjspE4jSz4CIDXed79i3OACoX2daFDDC', NULL, NULL, NULL, 0, 0, 'yMjumc8Gd8', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(49, 'Yuni Elma Pertiwi S.Ked', 'prabawa01@example.com', '(+62) 566 3889 075', 'Dk. Sudiarto No. 970, Banjarmasin 32152, Pabar', '2022-07-25 11:11:15', '$2y$10$dSk2.KyH2cJQWzu42p7hgu4hRsARfM51GRSUyiktduTGxcsdQtdva', NULL, NULL, NULL, 0, 0, 'FuGKSsETyL', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(50, 'Najib Mandala', 'pangestu.darman@example.org', '0753 6973 057', 'Jln. Adisucipto No. 923, Ternate 51512, Sumut', '2022-07-25 11:11:15', '$2y$10$kkuzz1Ui8NU86QfcaewiTOrVuEV5hcB8vC9PQRYOYeOsUvKO80lfS', NULL, NULL, NULL, 0, 0, 'fFBXbOVlUj', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(51, 'Leo Dongoran', 'mulyanto.prabowo@example.org', '0646 6043 6256', 'Kpg. Bakaru No. 307, Bogor 24643, Banten', '2022-07-25 11:11:15', '$2y$10$yFnXmkrtPtL6aZSoRm3i/OQwzcFv2T1M42HZDFOT5aozkItNhCiI6', NULL, NULL, NULL, 0, 0, 'EuQq1Jze1Q', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(52, 'Hartana Danuja Januar', 'uchita36@example.com', '0330 2112 1011', 'Gg. Baik No. 544, Tebing Tinggi 46595, Maluku', '2022-07-25 11:11:15', '$2y$10$dsnblJeG8Ft3xuKmGXysC.VV8gB8N.nUgXqHda7LUQ3K/.uJsUXeS', NULL, NULL, NULL, 0, 0, 'AAGGcccNZx', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(53, 'Kamila Pertiwi', 'halima97@example.com', '(+62) 461 1974 854', 'Ds. Nanas No. 918, Banjarbaru 37312, Banten', '2022-07-25 11:11:15', '$2y$10$tYKbouaF8Js3Ek5JUVT2NupztJaW/Xl6xvPPvH.WuKOdBleERA03G', NULL, NULL, NULL, 0, 0, '8aTNRqVIUr', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(54, 'Ira Calista Wahyuni S.Sos', 'pranowo.harsanto@example.net', '(+62) 21 2996 6704', 'Gg. Bazuka Raya No. 572, Pekanbaru 25776, Banten', '2022-07-25 11:11:15', '$2y$10$tL0Np9ooFKgw2KjnBIdTou9DEJt1YGui14ZDMpS0zylDbFwV/gOL.', NULL, NULL, NULL, 0, 0, '4R5K3hYM3L', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(55, 'Gabriella Wijayanti S.Farm', 'hsinaga@example.com', '(+62) 857 385 057', 'Dk. PHH. Mustofa No. 503, Dumai 48136, Pabar', '2022-07-25 11:11:15', '$2y$10$y1szn8/5MUCxS3rJgd.Gtu7.WbLsOFf/b4M47sGJwxeR36VL2rumS', NULL, NULL, NULL, 0, 0, 'VmEPSr1wbV', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(56, 'Najwa Laila Sudiati', 'purnawati.jelita@example.org', '0826 545 648', 'Ds. Abang No. 581, Bontang 40718, Jabar', '2022-07-25 11:11:15', '$2y$10$8O98heUKORo1denYIK8Bv.614HZcB1y4HwaekqA69oANJTZLA0NcK', NULL, NULL, NULL, 0, 0, 'SO4ZhVMrEg', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(57, 'Michelle Mardhiyah', 'cengkal.rahayu@example.com', '0821 719 459', 'Ki. Kyai Gede No. 29, Tangerang Selatan 92975, NTB', '2022-07-25 11:11:15', '$2y$10$T7r4lcFYvVgVOopefsNOLOzI8.U6/RW20YFCGKj3JJxtNFHKIISjG', NULL, NULL, NULL, 0, 0, 'qIuedNW88Y', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(58, 'Candra Putra', 'mursinin.laksita@example.org', '(+62) 488 9531 1377', 'Jln. Yap Tjwan Bing No. 720, Surakarta 48142, Sulsel', '2022-07-25 11:11:15', '$2y$10$IXP.enio03XezzM320ymXuu/dPeBWzrwZmTn6TvUXUkZyGL3oSNW6', NULL, NULL, NULL, 0, 0, 'NC1GRyId5B', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(59, 'Siska Mayasari', 'mulyani.bajragin@example.com', '(+62) 528 0256 707', 'Psr. Dr. Junjunan No. 672, Dumai 33965, Aceh', '2022-07-25 11:11:15', '$2y$10$5DEPaeM4O1.7QhdXdQonh.DKz.D5lzT5JC.11Ydun.be3kQZdrAc.', NULL, NULL, NULL, 0, 0, 'qV2kJh6zak', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(60, 'Tania Nadia Yolanda M.TI.', 'jusamah@example.org', '0875 447 270', 'Dk. Banceng Pondok No. 995, Gunungsitoli 46602, Jatim', '2022-07-25 11:11:16', '$2y$10$LyeVw6Bif6cJvcX5gdqm3eiVFa/upO39nB.BRoVV1EZ9Od.Q01TLS', NULL, NULL, NULL, 0, 0, 'tsucmSca4R', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(61, 'Shania Pudjiastuti', 'ade.gunarto@example.com', '(+62) 745 0492 1348', 'Psr. B.Agam Dlm No. 457, Medan 17829, Jambi', '2022-07-25 11:11:16', '$2y$10$JPFTPt23Jq0.EtKAqQUPqeMTeG56frAE5J91Mm1s26AXaooToOd5m', NULL, NULL, NULL, 0, 0, '6s2ayo7xq2', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(62, 'Humaira Lestari M.TI.', 'uwahyuni@example.net', '(+62) 22 7108 0512', 'Ki. Supono No. 627, Singkawang 70734, Lampung', '2022-07-25 11:11:16', '$2y$10$AxMxu3ZvM/2RCwxdcvwPNOC1C9GAWcBg6rOMtiPuBpEpRlPRoShtK', NULL, NULL, NULL, 0, 0, 'aYRc90Qqoq', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(63, 'Elon Sitompul', 'jayadi.mayasari@example.com', '024 6091 6152', 'Psr. Nanas No. 586, Sibolga 56040, Bengkulu', '2022-07-25 11:11:16', '$2y$10$/s/ZAR30KYR7zYO8H9l/Yuk6dDexZCuW/78JZt7BJ3sA0746Kn6j.', NULL, NULL, NULL, 0, 0, '8MXo2pC0sI', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(64, 'Adika Dadap Mandala', 'maryadi11@example.com', '(+62) 25 4223 6217', 'Ki. Untung Suropati No. 875, Batu 42191, Kalteng', '2022-07-25 11:11:16', '$2y$10$3zvlyFvMNObRqNrltdQnZesW3SWy6pva41I00S4FG.6gKOPe7PmxS', NULL, NULL, NULL, 0, 0, '5tM4g3u9YP', '2022-07-25 11:11:16', '2022-07-25 11:11:16'),
(66, 'rahmat2', 'biawak@gmail.com', '087243682764', 'kumpehulu', NULL, '$2y$10$p2akJyLEu3WiKYi4cZfoYerqav5/7HJ/K5s79AkHIDGkTg/EwfCDe', NULL, NULL, NULL, 0, 0, NULL, '2022-08-17 09:23:25', '2022-08-17 09:23:25'),
(67, 'rahmat ramadhan', 'ramadhan123@gmail.com', '0822283782738', 'pallmerah', NULL, '$2y$10$rDI1Q.oztsLPk1qIxTPlieeBdKyK.4HRtfAkeVkB0QKeowhaEPgU6', NULL, NULL, NULL, 0, 0, NULL, '2022-08-18 04:16:25', '2022-08-18 04:16:25'),
(68, 'rahmat pratama', 'pratama123@gmail.com', '082284976252', 'pallmerah', NULL, '$2y$10$ySve31QhqDndSwE4hxW4w.rA4pr0HSklm8IdUnOFxSBzKdvjvpLqO', NULL, NULL, NULL, 0, 0, NULL, '2022-08-19 01:36:28', '2022-08-19 01:36:28');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jam_mains`
--
ALTER TABLE `jam_mains`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lapangans`
--
ALTER TABLE `lapangans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lapangan_images`
--
ALTER TABLE `lapangan_images`
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
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jam_mains`
--
ALTER TABLE `jam_mains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `lapangans`
--
ALTER TABLE `lapangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `lapangan_images`
--
ALTER TABLE `lapangan_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data untuk tabel `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2019-10-21 13:37:09', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indeks untuk tabel `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indeks untuk tabel `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indeks untuk tabel `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indeks untuk tabel `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indeks untuk tabel `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indeks untuk tabel `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indeks untuk tabel `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indeks untuk tabel `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indeks untuk tabel `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indeks untuk tabel `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `wak_laundry`
--
CREATE DATABASE IF NOT EXISTS `wak_laundry` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `wak_laundry`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pelanggan_id` bigint(20) UNSIGNED NOT NULL,
  `batas_waktu` datetime DEFAULT NULL,
  `status` enum('belum dibayar','salah input','sudah dibayar','diambil') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum dibayar',
  `tanggal_dibayar` datetime DEFAULT NULL,
  `grand_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `invoices`
--

INSERT INTO `invoices` (`id`, `pelanggan_id`, `batas_waktu`, `status`, `tanggal_dibayar`, `grand_total`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-06-15 18:36:00', 'salah input', '2022-12-12 08:12:21', 42000, '2022-06-14 04:37:05', '2022-12-12 01:12:21'),
(2, 1, '2022-06-15 19:11:00', 'diambil', '2022-12-18 09:12:47', 58000, '2022-06-14 05:11:28', '2022-12-18 02:39:47'),
(3, 1, '2022-11-14 07:30:00', 'diambil', '2022-11-13 06:11:36', 48000, '2022-11-12 23:30:54', '2022-11-12 23:39:36'),
(4, 3, '2022-12-18 15:59:00', 'sudah dibayar', '2022-12-17 08:12:26', 40000, '2022-12-17 01:59:26', '2022-12-17 01:59:26'),
(5, 3, '2022-12-18 16:02:00', 'sudah dibayar', '2022-12-17 09:12:44', 42000, '2022-12-17 02:02:36', '2022-12-17 02:55:44'),
(6, 3, '2022-12-19 15:31:00', 'sudah dibayar', '2022-12-20 05:12:21', 40000, '2022-12-18 01:31:26', '2022-12-19 22:56:21'),
(7, 1, '2022-12-31 14:29:00', 'sudah dibayar', '2022-12-30 08:12:54', 16000, '2022-12-29 23:30:06', '2022-12-30 01:33:54'),
(8, 1, '2022-12-31 16:34:00', 'belum dibayar', NULL, 16000, '2022-12-30 01:34:32', '2022-12-30 01:34:32'),
(9, 3, '2023-01-06 21:41:00', 'belum dibayar', NULL, 16000, '2023-01-05 07:41:59', '2023-01-05 07:41:59'),
(10, 1, '2023-01-06 21:42:00', 'belum dibayar', NULL, 28000, '2023-01-05 07:42:19', '2023-01-05 07:42:19'),
(11, 3, '2023-01-06 22:26:00', 'belum dibayar', NULL, 16000, '2023-01-05 08:26:22', '2023-01-05 08:26:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pengeluarans`
--

CREATE TABLE `jenis_pengeluarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis_pengeluaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_harga` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_pengeluarans`
--

INSERT INTO `jenis_pengeluarans` (`id`, `nama_jenis_pengeluaran`, `total_harga`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Sabun', 40000, '2 Jerigen Sabun', '2022-06-14 04:42:21', '2022-06-14 04:42:21'),
(2, 'Gas', 100000, '50 KG', '2022-06-15 04:47:57', '2022-06-14 04:47:57'),
(3, 'Wifi', 300000, 'Bayar Tagihan Wifi', '2022-06-14 04:49:54', '2022-06-14 04:49:54');

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
(4, '2022_06_09_150556_user_role', 1),
(5, '2022_06_10_071210_create_produks_table', 1),
(6, '2022_06_10_071526_create_jenis_pengeluarans_table', 1),
(7, '2022_06_10_071632_create_pelanggans_table', 1),
(8, '2022_06_10_071703_create_transaksis_table', 1),
(9, '2022_06_12_030829_create_invoices_table', 1);

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
-- Struktur dari tabel `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `nama_pelanggan`, `address`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 'Wibu', 'Mayang2', '0823123683', '2022-06-14 04:33:02', '2022-12-14 01:10:50'),
(3, 'akbar Fadli', 'kota baru', '082284976252', '2022-12-14 01:17:07', '2022-12-30 02:43:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `jenis_produk`, `kode`, `nama`, `harga_jual`, `created_at`, `updated_at`) VALUES
(1, 'SATUAN', 'Laundry Standar 1 Hari', 'Cuci Setrika 1 Hari', 8000, '2022-06-14 04:19:59', '2022-12-30 03:38:48'),
(2, 'SATUAN', 'Laundry Express 6 Jam', 'Cuci Setrika 6 Jam', 14000, '2022-06-14 04:20:41', '2022-12-30 03:39:03'),
(3, 'SATUAN', 'Laundry Express 3 Jam', 'Cuci Setrika 3 Jam', 18000, '2022-06-14 04:21:24', '2022-12-30 03:39:12'),
(4, 'SATUAN', 'Laundry Load 1 Hari', 'Cuci Lipat 1 Hari', 5000, '2022-06-14 04:21:53', '2023-01-05 07:38:10'),
(5, 'SATUAN', 'Laundry Setrika 1 Hari', 'Setrika 1 Hari', 6000, '2022-06-14 04:22:33', '2023-01-05 07:38:17'),
(6, 'SATUAN', 'Laundry Setrika 6 Jam', 'Setrika 6 jam', 10000, '2022-06-14 04:23:16', '2023-01-05 07:38:24'),
(7, 'SATUAN', 'Laundry Setrika 3 Jam', 'Setrika 3 Jam', 14000, '2022-06-14 04:24:07', '2023-01-05 07:38:31'),
(8, 'SATUAN', 'Laundry Setrika 1 Jam', 'Setrika 1 Jam', 20000, '2022-06-14 04:24:50', '2023-01-05 07:38:38'),
(9, 'SATUAN', 'Laundry Satuan 1 Hari', 'Cuci Setrika Baju/Celana', 10000, '2022-06-14 04:25:45', '2023-01-05 07:38:44'),
(10, 'SATUAN', 'Laundry Satuan 6 Jam', 'Cuci Setrika Baju/Celana 6 Jam', 15000, '2022-06-14 04:26:50', '2023-01-05 07:38:50'),
(11, 'SATUAN', 'Laundry Satuan 3 Jam', 'Cuci Setrika 3 Jam Baju/Celana', 20000, '2022-06-14 04:27:54', '2023-01-05 07:38:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `pelanggan_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `total_akhir` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksis`
--

INSERT INTO `transaksis` (`id`, `produk_id`, `pelanggan_id`, `invoice_id`, `qty`, `total_akhir`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 3, 42000, '2022-06-14 04:37:05', '2022-06-14 04:37:05'),
(2, 1, 1, 2, 2, 16000, '2022-06-14 05:11:28', '2022-06-14 05:11:28'),
(3, 2, 1, 2, 3, 42000, '2022-06-14 05:11:28', '2022-06-14 05:11:28'),
(4, 1, 1, 3, 6, 48000, '2022-11-12 23:30:54', '2022-11-12 23:30:54'),
(5, 1, 3, 4, 5, 40000, '2022-12-17 01:59:26', '2022-12-17 01:59:26'),
(6, 2, 3, 5, 3, 42000, '2022-12-17 02:02:36', '2022-12-17 02:02:36'),
(7, 1, 3, 6, 5, 40000, '2022-12-18 01:31:26', '2022-12-18 01:31:26'),
(8, 1, 1, 7, 2, 16000, '2022-12-29 23:30:06', '2022-12-29 23:30:06'),
(9, 1, 1, 8, 2, 16000, '2022-12-30 01:34:32', '2022-12-30 01:34:32'),
(10, 1, 3, 9, 2, 16000, '2023-01-05 07:41:59', '2023-01-05 07:41:59'),
(11, 2, 1, 10, 2, 28000, '2023-01-05 07:42:19', '2023-01-05 07:42:19'),
(12, 1, 3, 11, 2, 16000, '2023-01-05 08:26:22', '2023-01-05 08:26:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` tinyint(1) NOT NULL DEFAULT 0,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profil.jpg',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `name`, `email`, `address`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin', 'wak001@gmail.com', 'Kebun Kopi', NULL, '$2y$10$aX1Iql1Z64paBr//0a99/.hoLFG1x33ArSDBxZy5L9pZfi488bikK', '', NULL, '2022-06-14 04:13:54', '2023-01-05 07:36:48'),
(2, 0, 'kasir01', 'kasir01', 'alep123@gmail.com', 'Kota Baru', NULL, '$2y$10$6Lr4aYzg7OOgN4YwoW4Voui60/EPVkB5iPhN96e21TFvb9ooApEYa', 'profil.jpg', NULL, '2022-12-14 00:37:02', '2022-12-30 03:22:25'),
(3, 0, 'kasir02', 'Kasir02', 'kasir02@gmail.com', 'Kopi', NULL, '$2y$10$S7DPv2Dkqayu56OsWIxrXeeDFulatqhpGiMTkFO3b/L4AumQAcz7i', 'profil.jpg', NULL, '2022-12-30 03:23:06', '2022-12-30 03:23:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_roles`
--

INSERT INTO `user_roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2022-06-14 04:13:53', '2022-06-14 04:13:53'),
(2, 'Cashier', '2022-06-14 04:13:53', '2022-06-14 04:13:53');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_pengeluarans`
--
ALTER TABLE `jenis_pengeluarans`
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
-- Indeks untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_address_unique` (`address`);

--
-- Indeks untuk tabel `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `jenis_pengeluarans`
--
ALTER TABLE `jenis_pengeluarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
