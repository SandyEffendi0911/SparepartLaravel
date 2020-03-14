-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2020 at 04:47 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sparepart`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id` int(11) NOT NULL,
  `penjualan_id` int(11) NOT NULL,
  `kd_barang` varchar(191) NOT NULL,
  `nm_barang` varchar(191) NOT NULL,
  `harga_beli` decimal(8,2) NOT NULL,
  `diskon` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id`, `penjualan_id`, `kd_barang`, `nm_barang`, `harga_beli`, `diskon`, `qty`, `created_at`, `updated_at`) VALUES
(3, 2, '5d', 'Sparepart Honda CBR', '25000.00', 0, 2, '2019-10-02 20:58:52', '2019-10-02 20:58:52'),
(4, 2, '6y', 'Sparepart sonic', '25000.00', 0, 1, '2019-10-02 20:58:52', '2019-10-02 20:58:52'),
(5, 3, '5e', 'Sparepart Beat', '20000.00', 1, 2, '2019-10-03 05:41:05', '2019-10-03 05:41:05'),
(6, 4, '5d', 'Sparepart Honda CBR', '25000.00', 0, 3, '2019-10-03 06:08:30', '2019-10-03 06:08:30'),
(7, 5, '5e', 'Sparepart Ungu Janda', '50000.00', 1, 5, '2020-01-14 19:51:31', '2020-01-14 19:51:31'),
(8, 5, '6y', 'Sparepart Honda', '60000.00', 1, 1, '2020-01-14 19:51:31', '2020-01-14 19:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `mbarang`
--

CREATE TABLE `mbarang` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_barang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `harga_beli` decimal(8,2) NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mbarang`
--

INSERT INTO `mbarang` (`id`, `kode_barang`, `nama_barang`, `harga_jual`, `harga_beli`, `avatar`, `created_at`, `updated_at`) VALUES
(2, '3a', 'sparepart Beat', 20000, '10000.00', 'kakashi.ico', NULL, '2020-01-14 19:32:21'),
(3, '6a', 'Sparepart Scoopy', 25000, '10000.00', NULL, '2019-09-28 20:52:24', '2019-10-09 02:39:19'),
(4, '2a', 'Sparepart Vario', 20000, '10000.00', NULL, '2019-09-28 21:45:56', '2019-10-09 02:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_09_28_062328_create_sparepart_table', 1),
(4, '2019_09_28_082523_create_sparepart_table', 2),
(5, '2019_09_28_141840_create_sparepart_table', 3),
(6, '2019_09_29_123014_create_sparepart_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nm_pelanggan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `user_id`, `nm_pelanggan`, `image`, `jenis_kelamin`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(2, 2, 'Sandy Putra', NULL, 'L', '085263198131', 'Kayutanam', '2019-09-29 19:04:01', '2019-09-29 19:04:01'),
(4, 4, 'Dimas', NULL, 'L', '081267892150', 'Palabihan', '2019-09-30 03:37:01', '2019-09-30 03:37:01'),
(5, 5, 'Rahil', NULL, 'P', '081268892151', 'Kayutanam', '2019-10-02 04:47:53', '2019-10-02 04:47:53'),
(6, 6, 'Aidila Fatma', NULL, 'P', '081268892152', 'Pariaman', '2019-10-02 20:38:29', '2019-10-03 06:03:23'),
(7, 7, 'Wahyu', NULL, 'L', '081268892154', 'Padang', '2019-10-02 20:52:00', '2019-10-02 20:52:00'),
(8, 8, 'Saza Kurnia', NULL, 'P', '081265431121', 'Pesisir Selatan', '2019-10-08 19:09:50', '2019-10-08 19:09:50');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan_stock`
--

CREATE TABLE `pelanggan_stock` (
  `id` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `hpp` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(10) UNSIGNED NOT NULL,
  `kd_barang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_barang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hrg_pp` decimal(8,2) NOT NULL,
  `hrg_jual` decimal(8,2) NOT NULL,
  `diskon` int(11) NOT NULL,
  `banyak_stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `kd_barang`, `nm_barang`, `img`, `hrg_pp`, `hrg_jual`, `diskon`, `banyak_stock`, `created_at`, `updated_at`) VALUES
(7, '5d', 'Sparepart Beat Street', NULL, '50000.00', '40000.00', 2, 5, '2020-01-14 19:36:17', '2020-01-14 19:39:06'),
(8, '5e', 'Sparepart Ungu Janda', NULL, '40000.00', '50000.00', 1, 0, '2020-01-14 19:40:40', '2020-01-14 19:51:31'),
(9, '6y', 'Sparepart Honda', NULL, '40000.00', '60000.00', 1, 4, '2020-01-14 19:41:06', '2020-01-14 19:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `tpenjualan`
--

CREATE TABLE `tpenjualan` (
  `id` int(10) UNSIGNED NOT NULL,
  `tgl_faktur` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `no_faktur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `nama_konsumen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `ttl_hpp` int(11) NOT NULL,
  `harga_total` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tpenjualan`
--

INSERT INTO `tpenjualan` (`id`, `tgl_faktur`, `no_faktur`, `pelanggan_id`, `nama_konsumen`, `jumlah`, `harga_satuan`, `ttl_hpp`, `harga_total`, `created_at`, `updated_at`) VALUES
(2, '2019-10-03 03:58:51', 'FAK00002', 7, 'Wahyu', 3, 75000, 45000, '75000.00', '2019-10-02 20:58:51', '2019-10-02 20:58:52'),
(3, '2019-10-03 12:41:05', 'FAK00003', 5, 'Rahil', 2, 40000, 20000, '39600.00', '2019-10-03 05:41:05', '2019-10-03 05:41:05'),
(4, '2019-10-03 13:08:30', 'FAK00004', 6, 'Aidila Fatma', 3, 75000, 45000, '75000.00', '2019-10-03 06:08:30', '2019-10-03 06:08:30'),
(5, '2020-01-15 02:51:31', 'FAK00005', 2, 'Sandy Putra', 6, 310000, 240000, '303800.00', '2020-01-14 19:51:31', '2020-01-14 19:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verifiied_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verifiied_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Sandy', 'sandyeffendi0911@gmail.com', NULL, '$2y$10$xggoguPm4rWBkhoIeL8MzOB5LoHDkeaRby.oGDAA.797V2yD6QdDO', 'AWEZrDGyxsJiG8wBsRAVsYoiLAGO3H72Ztokfyc5x9i9u7Gt4qm0dyDpsuna', '2019-09-28 23:32:35', '2019-09-28 23:32:35'),
(2, 'customer', 'Sandy Putra', 'sandy@gmail.com', NULL, '$2y$10$SPfLL.SnvRJgdN4aCjqtLuj4VufnCzSWM8MmHmj9VJUNGmnMoalmW', 'ZbcS9ibKtYVcUTUZnz53t02Ibqj4Tie5DArH59tgsLCZWa2l5uhPwdGc5sSw', '2019-09-29 19:04:01', '2019-09-29 19:04:01'),
(4, 'customer', 'Dimas', 'dimas@gmail.com', NULL, '$2y$10$s.7hFMvCPVAwC5nFD0GlBOwG8nCwIdMxEQdvTBY66hDyEzI9AwX8K', '45gxFjbo4VCBVbo5L9dZPDU3rXQIf1vKow0lSMNuJbfq7LbDrX8Vy9iNyUNm', '2019-09-30 03:37:01', '2019-09-30 03:37:01'),
(5, 'customer', 'Rahil', 'rahil@gmail.com', NULL, '$2y$10$inoQ8mK8LALnk8nxj7QWAOl4sWjVyUfc6O/ISXbCPjoPvrjNm0dRq', 'KkO17uaXZ3989lpAY5YlMgM4Y8GGEMHED8emZkg4LIzB7sm5OBPHbn86PjVE', '2019-10-02 04:47:53', '2019-10-02 04:47:53'),
(6, 'customer', 'Dila', 'dila@gmail.com', NULL, '$2y$10$Yy6Gw5QCyS8dYmPTHtUJc.kPGk4w.AZc0jnqjHUjAKPimZsQeu8uu', 'iTD0aGzsYE3WQDhM9ogpA7ePQriJElws5Ajfr1nkdC1LYIlBJ17LxEOvPdOt', '2019-10-02 20:38:29', '2019-10-02 20:38:29'),
(7, 'customer', 'Wahyu', 'wahyu@gmail.com', NULL, '$2y$10$o7rvmWIeX5.bbXnhJIDkleB5swt8u2vemC4Od9hGCSaQq4fcSYDLa', 'xAW44VjovpbPKWVngwiqJJHKi7GhwqziX3jR8BKH4dKu30DaOnziFLVzNguk', '2019-10-02 20:52:00', '2019-10-02 20:52:00'),
(8, 'customer', 'Saza Kurnia', 'sazha@gmail.com', NULL, '$2y$10$sGznK0Foh/Q26RoNmTX8Sug6skwmaQZrO/xH1cakPTtLpzUL8eHpO', '6BNAueHovWJc5H7avihmV1P4w0zo2XDvm1GC120erHRL1lO0JdlAMcpo2QAi', '2019-10-08 19:09:50', '2019-10-08 19:09:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mbarang`
--
ALTER TABLE `mbarang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan_stock`
--
ALTER TABLE `pelanggan_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tpenjualan`
--
ALTER TABLE `tpenjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `mbarang`
--
ALTER TABLE `mbarang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pelanggan_stock`
--
ALTER TABLE `pelanggan_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tpenjualan`
--
ALTER TABLE `tpenjualan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
