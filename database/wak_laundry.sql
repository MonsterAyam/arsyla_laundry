-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Des 2022 pada 10.41
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
-- Database: `wak_laundry`
--

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
(2, 1, '2022-06-15 19:11:00', 'belum dibayar', '2022-12-12 08:12:58', 58000, '2022-06-14 05:11:28', '2022-12-12 01:12:58'),
(3, 1, '2022-11-14 07:30:00', 'diambil', '2022-11-13 06:11:36', 48000, '2022-11-12 23:30:54', '2022-11-12 23:39:36'),
(4, 3, '2022-12-18 15:59:00', 'sudah dibayar', '2022-12-17 08:12:26', 40000, '2022-12-17 01:59:26', '2022-12-17 01:59:26'),
(5, 3, '2022-12-18 16:02:00', 'belum dibayar', NULL, 42000, '2022-12-17 02:02:36', '2022-12-17 02:02:36');

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
(3, 'akbar', 'kota baru', '082284976252', '2022-12-14 01:17:07', '2022-12-14 01:17:07');

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
(1, 'KILOAN', 'Mama Standar 1 Hari', 'Cuci Setrika 1 Hari', 8000, '2022-06-14 04:19:59', '2022-06-14 04:19:59'),
(2, 'KILOAN', 'Mama Express 6 Jam', 'Cuci Setrika 6 Jam', 14000, '2022-06-14 04:20:41', '2022-06-14 04:20:41'),
(3, 'KILOAN', 'Mama Express 3 Jam', 'Cuci Setrika 3 Jam', 18000, '2022-06-14 04:21:24', '2022-06-14 04:21:24'),
(4, 'KILOAN', 'Mama Load 1 Hari', 'Cuci Lipat 1 Hari', 5000, '2022-06-14 04:21:53', '2022-06-14 04:21:53'),
(5, 'KILOAN', 'Mama Setrika 1 Hari', 'Setrika 1 Hari', 6000, '2022-06-14 04:22:33', '2022-06-14 04:22:33'),
(6, 'KILOAN', 'Mama Setrika 6 Jam', 'Setrika 6 jam', 10000, '2022-06-14 04:23:16', '2022-06-14 04:23:16'),
(7, 'KILOAN', 'Mama Setrika 3 Jam', 'Setrika 3 Jam', 14000, '2022-06-14 04:24:07', '2022-06-14 04:24:07'),
(8, 'KILOAN', 'Mama Setrika 1 Jam', 'Setrika 1 Jam', 20000, '2022-06-14 04:24:50', '2022-06-14 04:24:50'),
(9, 'SATUAN', 'Mama Satuan 1 Hari', 'Cuci Setrika Baju/Celana', 10000, '2022-06-14 04:25:45', '2022-06-14 04:25:45'),
(10, 'SATUAN', 'Mama Satuan 6 Jam', 'Cuci Setrika Baju/Celana 6 Jam', 15000, '2022-06-14 04:26:50', '2022-06-14 04:26:50'),
(11, 'SATUAN', 'Mama Satuan 3 Jam', 'Cuci Setrika 3 Jam Baju/Celana', 20000, '2022-06-14 04:27:54', '2022-06-14 04:27:54'),
(12, 'SATUAN', 'Mama Selimut 1 Hari', 'Cuci Setrika Selimut 1 Hari', 20000, '2022-06-14 04:29:29', '2022-06-14 04:29:29');

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
(6, 2, 3, 5, 3, 42000, '2022-12-17 02:02:36', '2022-12-17 02:02:36');

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
(1, 1, 'wakOkto12', 'Okky Octora Firdana', 'wak001@gmail.com', 'Kebun Kopi', NULL, '$2y$10$aX1Iql1Z64paBr//0a99/.hoLFG1x33ArSDBxZy5L9pZfi488bikK', '', NULL, '2022-06-14 04:13:54', '2022-06-14 04:13:54'),
(2, 0, 'kasir01', 'kasir01', 'alep123@gmail.com', 'kota baru', NULL, '$2y$10$rcCZKYclTI7byMLZ5hygCu5FiROOq5Iy7h0zEz/0ovXrSs0dv4ssW', 'profil.jpg', NULL, '2022-12-14 00:37:02', '2022-12-14 00:37:02');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jenis_pengeluarans`
--
ALTER TABLE `jenis_pengeluarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
