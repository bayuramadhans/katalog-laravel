-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2019 at 05:32 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `katalog`
--

-- --------------------------------------------------------

--
-- Table structure for table `foto_produk`
--

CREATE TABLE `foto_produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_produk` int(11) NOT NULL,
  `file_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foto_produk`
--

INSERT INTO `foto_produk` (`id`, `id_produk`, `file_name`, `file_url`, `mime_type`, `created_at`, `updated_at`) VALUES
(1, 2, '1-5.jpg', '/foto/produk/2/Sandal Masjid101481576.jpg', 'jpg', '2019-12-17 16:31:29', '2019-12-17 16:31:29'),
(2, 2, '3-4.jpg', '/foto/produk/2/Sandal Masjid1837739574.jpg', 'jpg', '2019-12-17 16:31:29', '2019-12-17 16:31:29'),
(3, 3, 'hijacksandals-astro-sputnik-1.jpg', '/foto/produk/3/Sandal Pantai489044324.jpg', 'jpg', '2019-12-17 20:40:29', '2019-12-17 20:40:29'),
(4, 3, 'hijacksandals-astro-sputnik-4.jpg', '/foto/produk/3/Sandal Pantai589475593.jpg', 'jpg', '2019-12-17 20:40:29', '2019-12-17 20:40:29'),
(5, 4, 'hijacksandals-astro-sputnik-1.jpg', '/foto/produk/4/Sandal Pantai635963712.jpg', 'jpg', '2019-12-17 20:50:08', '2019-12-17 20:50:08'),
(6, 4, 'hijacksandals-astro-sputnik-4.jpg', '/foto/produk/4/Sandal Pantai1748501055.jpg', 'jpg', '2019-12-17 20:50:08', '2019-12-17 20:50:08'),
(7, 5, 'hijacksandals-astro-iris-1.jpg', '/foto/produk/5/Sandal Crock1391190077.jpg', 'jpg', '2019-12-17 20:51:14', '2019-12-17 20:51:14'),
(8, 5, 'hijacksandals-astro-iris-4.jpg', '/foto/produk/5/Sandal Crock477380769.jpg', 'jpg', '2019-12-17 20:51:14', '2019-12-17 20:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `isi_keranjang`
--

CREATE TABLE `isi_keranjang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_konsumen` int(10) UNSIGNED NOT NULL,
  `id_stok` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `isi_keranjang`
--

INSERT INTO `isi_keranjang` (`id`, `id_konsumen`, `id_stok`, `jumlah`, `total_harga`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 3, 150000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sandal', '2019-12-17 06:41:59', '2019-12-17 06:41:59', NULL),
(2, 'Sepatu', '2019-12-17 20:44:00', '2019-12-17 20:44:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkout_time` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`id`, `nama`, `email`, `alamat`, `kota`, `provinsi`, `kode_pos`, `no_telp`, `checkout_time`, `created_at`, `updated_at`) VALUES
(1, 'Ayun', 'ayun@ebis.com', 'Surabaya', 'Surabaya', 'Jawa Timur', '67895', '0812345678', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_11_28_033726_create_produk_table', 1),
(4, '2019_11_28_033737_create_ukuran_table', 1),
(5, '2019_11_28_033746_create_warna_table', 1),
(6, '2019_11_28_033809_create_stok_table', 1),
(7, '2019_11_28_034148_create_kategori_table', 1),
(8, '2019_12_14_053305_create_foto_produk_table', 1),
(9, '2019_12_17_130712_create_konsumen_table', 1),
(10, '2019_12_17_130731_create_isi_keranjang_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `harga_diskon` int(11) NOT NULL,
  `status_diskon` tinyint(1) NOT NULL,
  `status_jual` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `id_kategori`, `nama`, `deskripsi`, `harga`, `harga_diskon`, `status_diskon`, `status_jual`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 1, 'Sandal Masjid', 'Adem, nyaman dipakai, pas di kaki', 50000, 40000, 1, 1, NULL, '2019-12-17 16:31:29', '2019-12-17 16:31:29'),
(3, 1, 'Sandal Pantai', 'Adem, empuk, nyaman', 50000, 40000, 1, 1, '2019-12-17 20:42:52', '2019-12-17 20:40:28', '2019-12-17 20:42:52'),
(4, 1, 'Sandal Pantai', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus euismod egestas magna ac blandit. Etiam ac arcu urna. Vivamus imperdiet rhoncus lobortis. Proin nulla mauris, imperdiet sed laoreet vitae, rhoncus at nisi. In pharetra, diam a fringilla lacinia, neque leo cursus dolor, sed scelerisque nibh urna quis urna.', 50000, 40000, 1, 1, NULL, '2019-12-17 20:50:07', '2019-12-17 20:50:07'),
(5, 1, 'Sandal Crock', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus euismod egestas magna ac blandit. Etiam ac arcu urna. Vivamus imperdiet rhoncus lobortis. Proin nulla mauris, imperdiet sed laoreet vitae, rhoncus at nisi. In pharetra, diam a fringilla lacinia, neque leo cursus dolor, sed scelerisque nibh urna quis urna. Suspendisse sit amet tempus lorem, ac semper nisi. Morbi vel accumsan eros. Cras finibus enim turpis, nec elementum ex vulputate et. Integer porttitor orci quis', 50000, 20000, 1, 1, NULL, '2019-12-17 20:51:14', '2019-12-17 20:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_produk` int(10) UNSIGNED NOT NULL,
  `id_ukuran` int(10) UNSIGNED NOT NULL,
  `id_warna` int(10) UNSIGNED NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id`, `id_produk`, `id_ukuran`, `id_warna`, `stok`, `created_at`, `updated_at`) VALUES
(7, 2, 1, 1, 5, '2019-12-17 16:31:29', '2019-12-17 16:31:29'),
(8, 2, 2, 1, 0, '2019-12-17 16:31:29', '2019-12-17 16:31:29'),
(9, 2, 3, 1, 5, '2019-12-17 16:31:29', '2019-12-17 16:31:29'),
(10, 2, 1, 2, 0, '2019-12-17 16:31:29', '2019-12-17 16:31:29'),
(11, 2, 2, 2, 5, '2019-12-17 16:31:29', '2019-12-17 16:31:29'),
(12, 2, 3, 2, 0, '2019-12-17 16:31:29', '2019-12-17 16:31:29'),
(19, 4, 1, 1, 7, '2019-12-17 20:50:07', '2019-12-17 20:50:07'),
(20, 4, 2, 1, 0, '2019-12-17 20:50:07', '2019-12-17 20:50:07'),
(21, 4, 3, 1, 3, '2019-12-17 20:50:07', '2019-12-17 20:50:07'),
(22, 4, 1, 2, 0, '2019-12-17 20:50:08', '2019-12-17 20:50:08'),
(23, 4, 2, 2, 5, '2019-12-17 20:50:08', '2019-12-17 20:50:08'),
(24, 4, 3, 2, 0, '2019-12-17 20:50:08', '2019-12-17 20:50:08'),
(25, 5, 1, 1, 0, '2019-12-17 20:51:14', '2019-12-17 20:51:14'),
(26, 5, 2, 1, 5, '2019-12-17 20:51:14', '2019-12-17 20:51:14'),
(27, 5, 3, 1, 0, '2019-12-17 20:51:14', '2019-12-17 20:51:14'),
(28, 5, 1, 2, 5, '2019-12-17 20:51:14', '2019-12-17 20:51:14'),
(29, 5, 2, 2, 0, '2019-12-17 20:51:14', '2019-12-17 20:51:14'),
(30, 5, 3, 2, 0, '2019-12-17 20:51:14', '2019-12-17 20:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'XL', '2019-12-17 16:24:52', '2019-12-17 16:24:52'),
(2, 'L', '2019-12-17 16:24:57', '2019-12-17 16:24:57'),
(3, 'M', '2019-12-17 16:25:50', '2019-12-17 16:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'bayu', 'admin@ebis.com', NULL, '$2y$12$uIAlNb/EBqJPyzntI9zgX.7Hh/UDikIvumsNf8lxxsrF4lOqZzv6a', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`id`, `nama`, `hex`, `created_at`, `updated_at`) VALUES
(1, 'Soft Brown', '#d0b480', '2019-12-17 16:25:27', '2019-12-17 16:25:27'),
(2, 'Silver Metallic', '#c8c8c8', '2019-12-17 16:25:38', '2019-12-17 16:25:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isi_keranjang`
--
ALTER TABLE `isi_keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
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
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foto_produk`
--
ALTER TABLE `foto_produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `isi_keranjang`
--
ALTER TABLE `isi_keranjang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warna`
--
ALTER TABLE `warna`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
