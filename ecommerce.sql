-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Mar 2021 pada 03.48
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` int(11) NOT NULL,
  `banner_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Struktur dari tabel `merk`
--

CREATE TABLE `merk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_merk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `merk`
--

INSERT INTO `merk` (`id`, `nama_merk`, `created_at`, `updated_at`) VALUES
(1, 'Infinix', '2021-02-26 20:40:43', '2021-03-04 20:03:57'),
(2, 'Vivo', '2021-02-26 20:42:44', '2021-02-26 20:42:44'),
(3, 'Oppo', '2021-02-26 20:42:58', '2021-02-26 20:42:58'),
(4, 'Xiaomi', NULL, '2021-03-04 20:03:26'),
(5, 'Realme', '2021-03-04 20:00:03', '2021-03-04 20:00:03');

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
(4, '2021_02_24_060951_create_produk_table', 1),
(5, '2021_02_24_061039_create_merk_table', 1),
(6, '2021_03_05_023206_create_banner_table', 2),
(7, '2021_03_13_074304_create_customer_table', 3);

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
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_produk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `merk_id` int(11) NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spesifikasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `no_produk`, `uuid`, `merk_id`, `nama_produk`, `spesifikasi`, `warna`, `gambar`, `keterangan`, `harga`, `stok`, `created_at`, `updated_at`) VALUES
(10, 'PRO00001', 'd3ff5ed3-8bb4-447d-9b9e-538d68213bb6', 5, 'Realme 7 pro', 'Ukuran Layar: Super AMOLED 6.4 inches\r\nChipset: Qualcomm SM7125 Snapdragon 720G (8 nm)\r\nOS: Android 10, Realme UI\r\nRAM: 8GB\r\nMemori internal: 128GB\r\nUkuran HP: 160.9 x 74.3 x 8.7 mm\r\nBerat HP: 182 g\r\nKamera depan: 32 MP, f/2.5 (wide)\r\nKamera belakang: 64 MP, f/1.8 (wide) + 8 MP, f/2.3(ultrawide) + 2 MP, f/2.4, (macro) + 2 MP, f/2.4, (depth)\r\nBaterai: Li-Po 4500 mAh\r\nPilihan Warna: Mirror Blue, Mirror Silver\r\nTanggal Rilis: September 2020', 'Biru', 'gambar-2021-ca0bc3Realme_7_Pro_th_L_1.jpg', 'NOTE : REALME PASTI REPACK, UNTUK PENGAKTIFAN GARANSI, MEMBELI BERARTI SETUJU', 4999000, 10, '2021-03-04 20:46:25', '2021-03-04 20:46:36'),
(11, 'PRO00002', '2b39c3be-a0bc-4f56-9965-300eb1f8f176', 5, 'Realme 7i', 'Spec Lengkap\r\nDISPLAY	Type	IPS LCD capacitive touchscreen, 16M colors\r\nSize	6.5 inches, 102.0 cm2\r\nResolution	720 x 1600 pixels, 20:9 ratio (~270 ppi density)\r\n 90Hz refresh rate\r\nPLATFORM	OS	Android 10, Realme UI\r\nChipset	Qualcomm SM6115 Snapdragon 662 (11 nm)\r\nCPU	Octa-core (4x2.0 GHz Kryo 260 Gold & 4x1.8 GHz Kryo 260 Silver)\r\nGPU	Adreno 610\r\nMEMORY	Card slot	microSDXC (dedicated slot)\r\nInternal	128GB 8GB RAM\r\nMAIN CAMERA	Quad	64 MP, f/1.8, 26mm (wide), 1/1.73\", 0.8µm, PDAF\r\n8 MP, f/2.3, 119˚, 16mm (ultrawide), 1/4.0\", 1.12µm\r\n2 MP, f/2.4, (macro)\r\n2 MP, f/2.4, (depth)\r\nFeatures	LED flash, HDR, panorama\r\nVideo	4K@30fps, 1080p@30/60fps, gyro-EIS\r\nSELFIE CAMERA	Single	16 MP, f/2.1, 26mm (wide), 1/3.1\", 1.0µm\r\nFeatures	HDR\r\nVideo	1080p@30/120fps\r\nSOUND	Loudspeaker	Yes\r\n3.5mm jack	Yes\r\nCOMMS	WLAN	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot\r\nBluetooth	5.0, A2DP, LE\r\nGPS	Yes, with A-GPS, GLONASS, BDS\r\nRadio	Unspecified\r\nUSB	2.0, Type-C 1.0 reversible connector, USB On-The-Go\r\nFEATURES	Sensors	Fingerprint (rear-mounted), accelerometer, gyro, proximity\r\nBATTERY	Type	Li-Po 5000 mAh, non-removable\r\nCharging	Fast charging 18W', 'Biru', 'gambar-2021-b134b5pic_Realme_7i_blue4_190920180911_ll.jpg.jpg', 'Realme 7i Paten', 3199000, 5, '2021-03-04 20:52:03', '2021-03-04 21:07:05'),
(12, 'PRO00003', 'ac7369d7-3386-414c-8a34-7cd3a1e8e62a', 5, 'Realme C17', 'Prosesor : Snapdragon 460 Processor\r\nCPU : Octa-core CPU\r\nSistem Operasi : Android 10\r\nKamera Belakang : 13MP + 8MP + 2MP + 2MP\r\nBaterai : 5000mAh\r\nRAM 6GB ROM 256GB', 'biru', 'gambar-2021-f81541Realme_C17_th_L_1.jpg', 'Semua produk, sebelum dikirim akan kami buka segel box untuk mengambil kartu garansi bagian penjualnya  dan mendaftar garansi elektronik (ini wajib ya kak).Kartu garansi untuk pembeli tetap ada dalam Box untuk claim ke servis center.', 2799000, 3, '2021-03-04 20:55:57', '2021-03-04 20:55:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'hidupilham14@gmail.com', 'superadmin', NULL, '$2y$10$rse5Z/VJkwgpXE1MMHoF4OX2uFc6E5kSj65lhzw9YB2isTbb0UE6C', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_email_unique` (`email`),
  ADD UNIQUE KEY `customer_username_unique` (`username`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `merk`
--
ALTER TABLE `merk`
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
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_produk` (`no_produk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `banner`
--
ALTER TABLE `banner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `merk`
--
ALTER TABLE `merk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
