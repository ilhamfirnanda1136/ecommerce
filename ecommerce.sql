-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Mar 2021 pada 08.47
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
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` int(11) NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten_id` int(11) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `nama`, `avatar`, `alamat`, `uuid`, `email`, `username`, `password`, `gender`, `no_telp`, `kabupaten_id`, `provinsi_id`, `kode_pos`, `created_at`, `updated_at`) VALUES
(4, 'ilham jkt', NULL, 'daweaweaw', '77232994-20d1-4cda-a965-dc1f82d53b1f', 'hidupilham14@gmail.com', 'ilham1136', '$2y$10$227hbe3ekULLPH2Z977yReNZmFjd0lorgZvSaVIoff/130XkHwHyy', 1, '0865542', 3515, 35, '423424', '2021-03-16 00:45:08', '2021-03-16 00:45:08');

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
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `nama_kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kabupaten`
--

INSERT INTO `kabupaten` (`id`, `provinsi_id`, `nama_kabupaten`, `created_at`, `updated_at`) VALUES
(1101, 11, 'Kab. Simeulue', NULL, NULL),
(1102, 11, 'Kab. Aceh Singkil', NULL, NULL),
(1103, 11, 'Kab. Aceh Selatan', NULL, NULL),
(1104, 11, 'Kab. Aceh Tenggara', NULL, NULL),
(1105, 11, 'Kab. Aceh Timur', NULL, NULL),
(1106, 11, 'Kab. Aceh Tengah', NULL, NULL),
(1107, 11, 'Kab. Aceh Barat', NULL, NULL),
(1108, 11, 'Kab. Aceh Besar', NULL, NULL),
(1109, 11, 'Kab. Pidie', NULL, NULL),
(1110, 11, 'Kab. Bireuen', NULL, NULL),
(1111, 11, 'Kab. Aceh Utara', NULL, NULL),
(1112, 11, 'Kab. Aceh Barat Daya', NULL, NULL),
(1113, 11, 'Kab. Gayo Lues', NULL, NULL),
(1114, 11, 'Kab. Aceh Tamiang', NULL, NULL),
(1115, 11, 'Kab. Nagan Raya', NULL, NULL),
(1116, 11, 'Kab. Aceh Jaya', NULL, NULL),
(1117, 11, 'Kab. Bener Meriah', NULL, NULL),
(1118, 11, 'Kab. Pidie Jaya', NULL, NULL),
(1171, 11, 'Kota Banda Aceh', NULL, NULL),
(1172, 11, 'Kota Sabang', NULL, NULL),
(1173, 11, 'Kota Langsa', NULL, NULL),
(1174, 11, 'Kota Lhokseumawe', NULL, NULL),
(1175, 11, 'Kota Subulussalam', NULL, NULL),
(1201, 12, 'Kab. Nias', NULL, NULL),
(1202, 12, 'Kab. Mandailing Natal', NULL, NULL),
(1203, 12, 'Kab. Tapanuli Selatan', NULL, NULL),
(1204, 12, 'Kab. Tapanuli Tengah', NULL, NULL),
(1205, 12, 'Kab. Tapanuli Utara', NULL, NULL),
(1206, 12, 'Kab. Toba Samosir', NULL, NULL),
(1207, 12, 'Kab. Labuhan Batu', NULL, NULL),
(1208, 12, 'Kab. Asahan', NULL, NULL),
(1209, 12, 'Kab. Simalungun', NULL, NULL),
(1210, 12, 'Kab. Dairi', NULL, NULL),
(1211, 12, 'Kab. Karo', NULL, NULL),
(1212, 12, 'Kab. Deli Serdang', NULL, NULL),
(1213, 12, 'Kab. Langkat', NULL, NULL),
(1214, 12, 'Kab. Nias Selatan', NULL, NULL),
(1215, 12, 'Kab. Humbang Hasundutan', NULL, NULL),
(1216, 12, 'Kab. Pakpak Bharat', NULL, NULL),
(1217, 12, 'Kab. Samosir', NULL, NULL),
(1218, 12, 'Kab. Serdang Bedagai', NULL, NULL),
(1219, 12, 'Kab. Batu Bara', NULL, NULL),
(1220, 12, 'Kab. Padang Lawas Utara', NULL, NULL),
(1221, 12, 'Kab. Padang Lawas', NULL, NULL),
(1222, 12, 'Kab. Labuhan Batu Selatan', NULL, NULL),
(1223, 12, 'Kab. Labuhan Batu Utara', NULL, NULL),
(1224, 12, 'Kab. Nias Utara', NULL, NULL),
(1225, 12, 'Kab. Nias Barat', NULL, NULL),
(1271, 12, 'Kota Sibolga', NULL, NULL),
(1272, 12, 'Kota Tanjung Balai', NULL, NULL),
(1273, 12, 'Kota Pematang Siantar', NULL, NULL),
(1274, 12, 'Kota Tebing Tinggi', NULL, NULL),
(1275, 12, 'Kota Medan', NULL, NULL),
(1276, 12, 'Kota Binjai', NULL, NULL),
(1277, 12, 'Kota Padangsidimpuan', NULL, NULL),
(1278, 12, 'Kota Gunungsitoli', NULL, NULL),
(1301, 13, 'Kab. Kepulauan Mentawai', NULL, NULL),
(1302, 13, 'Kab. Pesisir Selatan', NULL, NULL),
(1303, 13, 'Kab. Solok', NULL, NULL),
(1304, 13, 'Kab. Sijunjung', NULL, NULL),
(1305, 13, 'Kab. Tanah Datar', NULL, NULL),
(1306, 13, 'Kab. Padang Pariaman', NULL, NULL),
(1307, 13, 'Kab. Agam', NULL, NULL),
(1308, 13, 'Kab. Lima Puluh Kota', NULL, NULL),
(1309, 13, 'Kab. Pasaman', NULL, NULL),
(1310, 13, 'Kab. Solok Selatan', NULL, NULL),
(1311, 13, 'Kab. Dharmasraya', NULL, NULL),
(1312, 13, 'Kab. Pasaman Barat', NULL, NULL),
(1371, 13, 'Kota Padang', NULL, NULL),
(1372, 13, 'Kota Solok', NULL, NULL),
(1373, 13, 'Kota Sawah Lunto', NULL, NULL),
(1374, 13, 'Kota Padang Panjang', NULL, NULL),
(1375, 13, 'Kota Bukittinggi', NULL, NULL),
(1376, 13, 'Kota Payakumbuh', NULL, NULL),
(1377, 13, 'Kota Pariaman', NULL, NULL),
(1401, 14, 'Kab. Kuantan Singingi', NULL, NULL),
(1402, 14, 'Kab. Indragiri Hulu', NULL, NULL),
(1403, 14, 'Kab. Indragiri Hilir', NULL, NULL),
(1404, 14, 'Kab. Pelalawan', NULL, NULL),
(1405, 14, 'Kab. S I A K', NULL, NULL),
(1406, 14, 'Kab. Kampar', NULL, NULL),
(1407, 14, 'Kab. Rokan Hulu', NULL, NULL),
(1408, 14, 'Kab. Bengkalis', NULL, NULL),
(1409, 14, 'Kab. Rokan Hilir', NULL, NULL),
(1410, 14, 'Kab. Kepulauan Meranti', NULL, NULL),
(1471, 14, 'Kota Pekanbaru', NULL, NULL),
(1473, 14, 'Kota D U M A I', NULL, NULL),
(1501, 15, 'Kab. Kerinci', NULL, NULL),
(1502, 15, 'Kab. Merangin', NULL, NULL),
(1503, 15, 'Kab. Sarolangun', NULL, NULL),
(1504, 15, 'Kab. Batang Hari', NULL, NULL),
(1505, 15, 'Kab. Muaro Jambi', NULL, NULL),
(1506, 15, 'Kab. Tanjung Jabung Timur', NULL, NULL),
(1507, 15, 'Kab. Tanjung Jabung Barat', NULL, NULL),
(1508, 15, 'Kab. Tebo', NULL, NULL),
(1509, 15, 'Kab. Bungo', NULL, NULL),
(1571, 15, 'Kota Jambi', NULL, NULL),
(1572, 15, 'Kota Sungai Penuh', NULL, NULL),
(1601, 16, 'Kab. Ogan Komering Ulu', NULL, NULL),
(1602, 16, 'Kab. Ogan Komering Ilir', NULL, NULL),
(1603, 16, 'Kab. Muara Enim', NULL, NULL),
(1604, 16, 'Kab. Lahat', NULL, NULL),
(1605, 16, 'Kab. Musi Rawas', NULL, NULL),
(1606, 16, 'Kab. Musi Banyuasin', NULL, NULL),
(1607, 16, 'Kab. Banyu Asin', NULL, NULL),
(1608, 16, 'Kab. Ogan Komering Ulu Selatan', NULL, NULL),
(1609, 16, 'Kab. Ogan Komering Ulu Timur', NULL, NULL),
(1610, 16, 'Kab. Ogan Ilir', NULL, NULL),
(1611, 16, 'Kab. Empat Lawang', NULL, NULL),
(1671, 16, 'Kota Palembang', NULL, NULL),
(1672, 16, 'Kota Prabumulih', NULL, NULL),
(1673, 16, 'Kota Pagar Alam', NULL, NULL),
(1674, 16, 'Kota Lubuklinggau', NULL, NULL),
(1701, 17, 'Kab. Bengkulu Selatan', NULL, NULL),
(1702, 17, 'Kab. Rejang Lebong', NULL, NULL),
(1703, 17, 'Kab. Bengkulu Utara', NULL, NULL),
(1704, 17, 'Kab. Kaur', NULL, NULL),
(1705, 17, 'Kab. Seluma', NULL, NULL),
(1706, 17, 'Kab. Mukomuko', NULL, NULL),
(1707, 17, 'Kab. Lebong', NULL, NULL),
(1708, 17, 'Kab. Kepahiang', NULL, NULL),
(1709, 17, 'Kab. Bengkulu Tengah', NULL, NULL),
(1771, 17, 'Kota Bengkulu', NULL, NULL),
(1801, 18, 'Kab. Lampung Barat', NULL, NULL),
(1802, 18, 'Kab. Tanggamus', NULL, NULL),
(1803, 18, 'Kab. Lampung Selatan', NULL, NULL),
(1804, 18, 'Kab. Lampung Timur', NULL, NULL),
(1805, 18, 'Kab. Lampung Tengah', NULL, NULL),
(1806, 18, 'Kab. Lampung Utara', NULL, NULL),
(1807, 18, 'Kab. Way Kanan', NULL, NULL),
(1808, 18, 'Kab. Tulangbawang', NULL, NULL),
(1809, 18, 'Kab. Pesawaran', NULL, NULL),
(1810, 18, 'Kab. Pringsewu', NULL, NULL),
(1811, 18, 'Kab. Mesuji', NULL, NULL),
(1812, 18, 'Kab. Tulang Bawang Barat', NULL, NULL),
(1813, 18, 'Kab. Pesisir Barat', NULL, NULL),
(1871, 18, 'Kota Bandar Lampung', NULL, NULL),
(1872, 18, 'Kota Metro', NULL, NULL),
(1901, 19, 'Kab. Bangka', NULL, NULL),
(1902, 19, 'Kab. Belitung', NULL, NULL),
(1903, 19, 'Kab. Bangka Barat', NULL, NULL),
(1904, 19, 'Kab. Bangka Tengah', NULL, NULL),
(1905, 19, 'Kab. Bangka Selatan', NULL, NULL),
(1906, 19, 'Kab. Belitung Timur', NULL, NULL),
(1971, 19, 'Kota Pangkal Pinang', NULL, NULL),
(2101, 21, 'Kab. Karimun', NULL, NULL),
(2102, 21, 'Kab. Bintan', NULL, NULL),
(2103, 21, 'Kab. Natuna', NULL, NULL),
(2104, 21, 'Kab. Lingga', NULL, NULL),
(2105, 21, 'Kab. Kepulauan Anambas', NULL, NULL),
(2171, 21, 'Kota B A T A M', NULL, NULL),
(2172, 21, 'Kota Tanjung Pinang', NULL, NULL),
(3101, 31, 'Kab. Kepulauan Seribu', NULL, NULL),
(3171, 31, 'Kota Jakarta Selatan', NULL, NULL),
(3172, 31, 'Kota Jakarta Timur', NULL, NULL),
(3173, 31, 'Kota Jakarta Pusat', NULL, NULL),
(3174, 31, 'Kota Jakarta Barat', NULL, NULL),
(3175, 31, 'Kota Jakarta Utara', NULL, NULL),
(3201, 32, 'Kab. Bogor', NULL, NULL),
(3202, 32, 'Kab. Sukabumi', NULL, NULL),
(3203, 32, 'Kab. Cianjur', NULL, NULL),
(3204, 32, 'Kab. Bandung', NULL, NULL),
(3205, 32, 'Kab. Garut', NULL, NULL),
(3206, 32, 'Kab. Tasikmalaya', NULL, NULL),
(3207, 32, 'Kab. Ciamis', NULL, NULL),
(3208, 32, 'Kab. Kuningan', NULL, NULL),
(3209, 32, 'Kab. Cirebon', NULL, NULL),
(3210, 32, 'Kab. Majalengka', NULL, NULL),
(3211, 32, 'Kab. Sumedang', NULL, NULL),
(3212, 32, 'Kab. Indramayu', NULL, NULL),
(3213, 32, 'Kab. Subang', NULL, NULL),
(3214, 32, 'Kab. Purwakarta', NULL, NULL),
(3215, 32, 'Kab. Karawang', NULL, NULL),
(3216, 32, 'Kab. Bekasi', NULL, NULL),
(3217, 32, 'Kab. Bandung Barat', NULL, NULL),
(3218, 32, 'Kab. Pangandaran', NULL, NULL),
(3271, 32, 'Kota Bogor', NULL, NULL),
(3272, 32, 'Kota Sukabumi', NULL, NULL),
(3273, 32, 'Kota Bandung', NULL, NULL),
(3274, 32, 'Kota Cirebon', NULL, NULL),
(3275, 32, 'Kota Bekasi', NULL, NULL),
(3276, 32, 'Kota Depok', NULL, NULL),
(3277, 32, 'Kota Cimahi', NULL, NULL),
(3278, 32, 'Kota Tasikmalaya', NULL, NULL),
(3279, 32, 'Kota Banjar', NULL, NULL),
(3301, 33, 'Kab. Cilacap', NULL, NULL),
(3302, 33, 'Kab. Banyumas', NULL, NULL),
(3303, 33, 'Kab. Purbalingga', NULL, NULL),
(3304, 33, 'Kab. Banjarnegara', NULL, NULL),
(3305, 33, 'Kab. Kebumen', NULL, NULL),
(3306, 33, 'Kab. Purworejo', NULL, NULL),
(3307, 33, 'Kab. Wonosobo', NULL, NULL),
(3308, 33, 'Kab. Magelang', NULL, NULL),
(3309, 33, 'Kab. Boyolali', NULL, NULL),
(3310, 33, 'Kab. Klaten', NULL, NULL),
(3311, 33, 'Kab. Sukoharjo', NULL, NULL),
(3312, 33, 'Kab. Wonogiri', NULL, NULL),
(3313, 33, 'Kab. Karanganyar', NULL, NULL),
(3314, 33, 'Kab. Sragen', NULL, NULL),
(3315, 33, 'Kab. Grobogan', NULL, NULL),
(3316, 33, 'Kab. Blora', NULL, NULL),
(3317, 33, 'Kab. Rembang', NULL, NULL),
(3318, 33, 'Kab. Pati', NULL, NULL),
(3319, 33, 'Kab. Kudus', NULL, NULL),
(3320, 33, 'Kab. Jepara', NULL, NULL),
(3321, 33, 'Kab. Demak', NULL, NULL),
(3322, 33, 'Kab. Semarang', NULL, NULL),
(3323, 33, 'Kab. Temanggung', NULL, NULL),
(3324, 33, 'Kab. Kendal', NULL, NULL),
(3325, 33, 'Kab. Batang', NULL, NULL),
(3326, 33, 'Kab. Pekalongan', NULL, NULL),
(3327, 33, 'Kab. Pemalang', NULL, NULL),
(3328, 33, 'Kab. Tegal', NULL, NULL),
(3329, 33, 'Kab. Brebes', NULL, NULL),
(3371, 33, 'Kota Magelang', NULL, NULL),
(3372, 33, 'Kota Surakarta', NULL, NULL),
(3373, 33, 'Kota Salatiga', NULL, NULL),
(3374, 33, 'Kota Semarang', NULL, NULL),
(3375, 33, 'Kota Pekalongan', NULL, NULL),
(3376, 33, 'Kota Tegal', NULL, NULL),
(3401, 34, 'Kab. Kulon Progo', NULL, NULL),
(3402, 34, 'Kab. Bantul', NULL, NULL),
(3403, 34, 'Kab. Gunung Kidul', NULL, NULL),
(3404, 34, 'Kab. Sleman', NULL, NULL),
(3471, 34, 'Kota Yogyakarta', NULL, NULL),
(3501, 35, 'Kab. Pacitan', NULL, NULL),
(3502, 35, 'Kab. Ponorogo', NULL, NULL),
(3503, 35, 'Kab. Trenggalek', NULL, NULL),
(3504, 35, 'Kab. Tulungagung', NULL, NULL),
(3505, 35, 'Kab. Blitar', NULL, NULL),
(3506, 35, 'Kab. Kediri', NULL, NULL),
(3507, 35, 'Kab. Malang', NULL, NULL),
(3508, 35, 'Kab. Lumajang', NULL, NULL),
(3509, 35, 'Kab. Jember', NULL, NULL),
(3510, 35, 'Kab. Banyuwangi', NULL, NULL),
(3511, 35, 'Kab. Bondowoso', NULL, NULL),
(3512, 35, 'Kab. Situbondo', NULL, NULL),
(3513, 35, 'Kab. Probolinggo', NULL, NULL),
(3514, 35, 'Kab. Pasuruan', NULL, NULL),
(3515, 35, 'Kab. Sidoarjo', NULL, NULL),
(3516, 35, 'Kab. Mojokerto', NULL, NULL),
(3517, 35, 'Kab. Jombang', NULL, NULL),
(3518, 35, 'Kab. Nganjuk', NULL, NULL),
(3519, 35, 'Kab. Madiun', NULL, NULL),
(3520, 35, 'Kab. Magetan', NULL, NULL),
(3521, 35, 'Kab. Ngawi', NULL, NULL),
(3522, 35, 'Kab. Bojonegoro', NULL, NULL),
(3523, 35, 'Kab. Tuban', NULL, NULL),
(3524, 35, 'Kab. Lamongan', NULL, NULL),
(3525, 35, 'Kab. Gresik', NULL, NULL),
(3526, 35, 'Kab. Bangkalan', NULL, NULL),
(3527, 35, 'Kab. Sampang', NULL, NULL),
(3528, 35, 'Kab. Pamekasan', NULL, NULL),
(3529, 35, 'Kab. Sumenep', NULL, NULL),
(3571, 35, 'Kota Kediri', NULL, NULL),
(3572, 35, 'Kota Blitar', NULL, NULL),
(3573, 35, 'Kota Malang', NULL, NULL),
(3574, 35, 'Kota Probolinggo', NULL, NULL),
(3575, 35, 'Kota Pasuruan', NULL, NULL),
(3576, 35, 'Kota Mojokerto', NULL, NULL),
(3577, 35, 'Kota Madiun', NULL, NULL),
(3578, 35, 'Kota Surabaya', NULL, NULL),
(3579, 35, 'Kota Batu', NULL, NULL),
(3601, 36, 'Kab. Pandeglang', NULL, NULL),
(3602, 36, 'Kab. Lebak', NULL, NULL),
(3603, 36, 'Kab. Tangerang', NULL, NULL),
(3604, 36, 'Kab. Serang', NULL, NULL),
(3671, 36, 'Kota Tangerang', NULL, NULL),
(3672, 36, 'Kota Cilegon', NULL, NULL),
(3673, 36, 'Kota Serang', NULL, NULL),
(3674, 36, 'Kota Tangerang Selatan', NULL, NULL),
(5101, 51, 'Kab. Jembrana', NULL, NULL),
(5102, 51, 'Kab. Tabanan', NULL, NULL),
(5103, 51, 'Kab. Badung', NULL, NULL),
(5104, 51, 'Kab. Gianyar', NULL, NULL),
(5105, 51, 'Kab. Klungkung', NULL, NULL),
(5106, 51, 'Kab. Bangli', NULL, NULL),
(5107, 51, 'Kab. Karang Asem', NULL, NULL),
(5108, 51, 'Kab. Buleleng', NULL, NULL),
(5171, 51, 'Kota Denpasar', NULL, NULL),
(5201, 52, 'Kab. Lombok Barat', NULL, NULL),
(5202, 52, 'Kab. Lombok Tengah', NULL, NULL),
(5203, 52, 'Kab. Lombok Timur', NULL, NULL),
(5204, 52, 'Kab. Sumbawa', NULL, NULL),
(5205, 52, 'Kab. Dompu', NULL, NULL),
(5206, 52, 'Kab. Bima', NULL, NULL),
(5207, 52, 'Kab. Sumbawa Barat', NULL, NULL),
(5208, 52, 'Kab. Lombok Utara', NULL, NULL),
(5271, 52, 'Kota Mataram', NULL, NULL),
(5272, 52, 'Kota Bima', NULL, NULL),
(5301, 53, 'Kab. Sumba Barat', NULL, NULL),
(5302, 53, 'Kab. Sumba Timur', NULL, NULL),
(5303, 53, 'Kab. Kupang', NULL, NULL),
(5304, 53, 'Kab. Timor Tengah Selatan', NULL, NULL),
(5305, 53, 'Kab. Timor Tengah Utara', NULL, NULL),
(5306, 53, 'Kab. Belu', NULL, NULL),
(5307, 53, 'Kab. Alor', NULL, NULL),
(5308, 53, 'Kab. Lembata', NULL, NULL),
(5309, 53, 'Kab. Flores Timur', NULL, NULL),
(5310, 53, 'Kab. Sikka', NULL, NULL),
(5311, 53, 'Kab. Ende', NULL, NULL),
(5312, 53, 'Kab. Ngada', NULL, NULL),
(5313, 53, 'Kab. Manggarai', NULL, NULL),
(5314, 53, 'Kab. Rote Ndao', NULL, NULL),
(5315, 53, 'Kab. Manggarai Barat', NULL, NULL),
(5316, 53, 'Kab. Sumba Tengah', NULL, NULL),
(5317, 53, 'Kab. Sumba Barat Daya', NULL, NULL),
(5318, 53, 'Kab. Nagekeo', NULL, NULL),
(5319, 53, 'Kab. Manggarai Timur', NULL, NULL),
(5320, 53, 'Kab. Sabu Raijua', NULL, NULL),
(5371, 53, 'Kota Kupang', NULL, NULL),
(6101, 61, 'Kab. Sambas', NULL, NULL),
(6102, 61, 'Kab. Bengkayang', NULL, NULL),
(6103, 61, 'Kab. Landak', NULL, NULL),
(6104, 61, 'Kab. Pontianak', NULL, NULL),
(6105, 61, 'Kab. Sanggau', NULL, NULL),
(6106, 61, 'Kab. Ketapang', NULL, NULL),
(6107, 61, 'Kab. Sintang', NULL, NULL),
(6108, 61, 'Kab. Kapuas Hulu', NULL, NULL),
(6109, 61, 'Kab. Sekadau', NULL, NULL),
(6110, 61, 'Kab. Melawi', NULL, NULL),
(6111, 61, 'Kab. Kayong Utara', NULL, NULL),
(6112, 61, 'Kab. Kubu Raya', NULL, NULL),
(6171, 61, 'Kota Pontianak', NULL, NULL),
(6172, 61, 'Kota Singkawang', NULL, NULL),
(6201, 62, 'Kab. Kotawaringin Barat', NULL, NULL),
(6202, 62, 'Kab. Kotawaringin Timur', NULL, NULL),
(6203, 62, 'Kab. Kapuas', NULL, NULL),
(6204, 62, 'Kab. Barito Selatan', NULL, NULL),
(6205, 62, 'Kab. Barito Utara', NULL, NULL),
(6206, 62, 'Kab. Sukamara', NULL, NULL),
(6207, 62, 'Kab. Lamandau', NULL, NULL),
(6208, 62, 'Kab. Seruyan', NULL, NULL),
(6209, 62, 'Kab. Katingan', NULL, NULL),
(6210, 62, 'Kab. Pulang Pisau', NULL, NULL),
(6211, 62, 'Kab. Gunung Mas', NULL, NULL),
(6212, 62, 'Kab. Barito Timur', NULL, NULL),
(6213, 62, 'Kab. Murung Raya', NULL, NULL),
(6271, 62, 'Kota Palangka Raya', NULL, NULL),
(6301, 63, 'Kab. Tanah Laut', NULL, NULL),
(6302, 63, 'Kab. Kota Baru', NULL, NULL),
(6303, 63, 'Kab. Banjar', NULL, NULL),
(6304, 63, 'Kab. Barito Kuala', NULL, NULL),
(6305, 63, 'Kab. Tapin', NULL, NULL),
(6306, 63, 'Kab. Hulu Sungai Selatan', NULL, NULL),
(6307, 63, 'Kab. Hulu Sungai Tengah', NULL, NULL),
(6308, 63, 'Kab. Hulu Sungai Utara', NULL, NULL),
(6309, 63, 'Kab. Tabalong', NULL, NULL),
(6310, 63, 'Kab. Tanah Bumbu', NULL, NULL),
(6311, 63, 'Kab. Balangan', NULL, NULL),
(6371, 63, 'Kota Banjarmasin', NULL, NULL),
(6372, 63, 'Kota Banjar Baru', NULL, NULL),
(6401, 64, 'Kab. Paser', NULL, NULL),
(6402, 64, 'Kab. Kutai Barat', NULL, NULL),
(6403, 64, 'Kab. Kutai Kartanegara', NULL, NULL),
(6404, 64, 'Kab. Kutai Timur', NULL, NULL),
(6405, 64, 'Kab. Berau', NULL, NULL),
(6409, 64, 'Kab. Penajam Paser Utara', NULL, NULL),
(6471, 64, 'Kota Balikpapan', NULL, NULL),
(6472, 64, 'Kota Samarinda', NULL, NULL),
(6474, 64, 'Kota Bontang', NULL, NULL),
(6501, 65, 'Kab. Malinau', NULL, NULL),
(6502, 65, 'Kab. Bulungan', NULL, NULL),
(6503, 65, 'Kab. Tana Tidung', NULL, NULL),
(6504, 65, 'Kab. Nunukan', NULL, NULL),
(6571, 65, 'Kota Tarakan', NULL, NULL),
(7101, 71, 'Kab. Bolaang Mongondow', NULL, NULL),
(7102, 71, 'Kab. Minahasa', NULL, NULL),
(7103, 71, 'Kab. Kepulauan Sangihe', NULL, NULL),
(7104, 71, 'Kab. Kepulauan Talaud', NULL, NULL),
(7105, 71, 'Kab. Minahasa Selatan', NULL, NULL),
(7106, 71, 'Kab. Minahasa Utara', NULL, NULL),
(7107, 71, 'Kab. Bolaang Mongondow Utara', NULL, NULL),
(7108, 71, 'Kab. Siau Tagulandang Biaro', NULL, NULL),
(7109, 71, 'Kab. Minahasa Tenggara', NULL, NULL),
(7110, 71, 'Kab. Bolaang Mongondow Selatan', NULL, NULL),
(7111, 71, 'Kab. Bolaang Mongondow Timur', NULL, NULL),
(7171, 71, 'Kota Manado', NULL, NULL),
(7172, 71, 'Kota Bitung', NULL, NULL),
(7173, 71, 'Kota Tomohon', NULL, NULL),
(7174, 71, 'Kota Kotamobagu', NULL, NULL),
(7201, 72, 'Kab. Banggai Kepulauan', NULL, NULL),
(7202, 72, 'Kab. Banggai', NULL, NULL),
(7203, 72, 'Kab. Morowali', NULL, NULL),
(7204, 72, 'Kab. Poso', NULL, NULL),
(7205, 72, 'Kab. Donggala', NULL, NULL),
(7206, 72, 'Kab. Toli-toli', NULL, NULL),
(7207, 72, 'Kab. Buol', NULL, NULL),
(7208, 72, 'Kab. Parigi Moutong', NULL, NULL),
(7209, 72, 'Kab. Tojo Una-una', NULL, NULL),
(7210, 72, 'Kab. Sigi', NULL, NULL),
(7271, 72, 'Kota Palu', NULL, NULL),
(7301, 73, 'Kab. Kepulauan Selayar', NULL, NULL),
(7302, 73, 'Kab. Bulukumba', NULL, NULL),
(7303, 73, 'Kab. Bantaeng', NULL, NULL),
(7304, 73, 'Kab. Jeneponto', NULL, NULL),
(7305, 73, 'Kab. Takalar', NULL, NULL),
(7306, 73, 'Kab. Gowa', NULL, NULL),
(7307, 73, 'Kab. Sinjai', NULL, NULL),
(7308, 73, 'Kab. Maros', NULL, NULL),
(7309, 73, 'Kab. Pangkajene Dan Kepulauan', NULL, NULL),
(7310, 73, 'Kab. Barru', NULL, NULL),
(7311, 73, 'Kab. Bone', NULL, NULL),
(7312, 73, 'Kab. Soppeng', NULL, NULL),
(7313, 73, 'Kab. Wajo', NULL, NULL),
(7314, 73, 'Kab. Sidenreng Rappang', NULL, NULL),
(7315, 73, 'Kab. Pinrang', NULL, NULL),
(7316, 73, 'Kab. Enrekang', NULL, NULL),
(7317, 73, 'Kab. Luwu', NULL, NULL),
(7318, 73, 'Kab. Tana Toraja', NULL, NULL),
(7322, 73, 'Kab. Luwu Utara', NULL, NULL),
(7325, 73, 'Kab. Luwu Timur', NULL, NULL),
(7326, 73, 'Kab. Toraja Utara', NULL, NULL),
(7371, 73, 'Kota Makassar', NULL, NULL),
(7372, 73, 'Kota Parepare', NULL, NULL),
(7373, 73, 'Kota Palopo', NULL, NULL),
(7401, 74, 'Kab. Buton', NULL, NULL),
(7402, 74, 'Kab. Muna', NULL, NULL),
(7403, 74, 'Kab. Konawe', NULL, NULL),
(7404, 74, 'Kab. Kolaka', NULL, NULL),
(7405, 74, 'Kab. Konawe Selatan', NULL, NULL),
(7406, 74, 'Kab. Bombana', NULL, NULL),
(7407, 74, 'Kab. Wakatobi', NULL, NULL),
(7408, 74, 'Kab. Kolaka Utara', NULL, NULL),
(7409, 74, 'Kab. Buton Utara', NULL, NULL),
(7410, 74, 'Kab. Konawe Utara', NULL, NULL),
(7471, 74, 'Kota Kendari', NULL, NULL),
(7472, 74, 'Kota Baubau', NULL, NULL),
(7501, 75, 'Kab. Boalemo', NULL, NULL),
(7502, 75, 'Kab. Gorontalo', NULL, NULL),
(7503, 75, 'Kab. Pohuwato', NULL, NULL),
(7504, 75, 'Kab. Bone Bolango', NULL, NULL),
(7505, 75, 'Kab. Gorontalo Utara', NULL, NULL),
(7571, 75, 'Kota Gorontalo', NULL, NULL),
(7601, 76, 'Kab. Majene', NULL, NULL),
(7602, 76, 'Kab. Polewali Mandar', NULL, NULL),
(7603, 76, 'Kab. Mamasa', NULL, NULL),
(7604, 76, 'Kab. Mamuju', NULL, NULL),
(7605, 76, 'Kab. Mamuju Utara', NULL, NULL),
(8101, 81, 'Kab. Maluku Tenggara Barat', NULL, NULL),
(8102, 81, 'Kab. Maluku Tenggara', NULL, NULL),
(8103, 81, 'Kab. Maluku Tengah', NULL, NULL),
(8104, 81, 'Kab. Buru', NULL, NULL),
(8105, 81, 'Kab. Kepulauan Aru', NULL, NULL),
(8106, 81, 'Kab. Seram Bagian Barat', NULL, NULL),
(8107, 81, 'Kab. Seram Bagian Timur', NULL, NULL),
(8108, 81, 'Kab. Maluku Barat Daya', NULL, NULL),
(8109, 81, 'Kab. Buru Selatan', NULL, NULL),
(8171, 81, 'Kota Ambon', NULL, NULL),
(8172, 81, 'Kota Tual', NULL, NULL),
(8201, 82, 'Kab. Halmahera Barat', NULL, NULL),
(8202, 82, 'Kab. Halmahera Tengah', NULL, NULL),
(8203, 82, 'Kab. Kepulauan Sula', NULL, NULL),
(8204, 82, 'Kab. Halmahera Selatan', NULL, NULL),
(8205, 82, 'Kab. Halmahera Utara', NULL, NULL),
(8206, 82, 'Kab. Halmahera Timur', NULL, NULL),
(8207, 82, 'Kab. Pulau Morotai', NULL, NULL),
(8271, 82, 'Kota Ternate', NULL, NULL),
(8272, 82, 'Kota Tidore Kepulauan', NULL, NULL),
(9101, 91, 'Kab. Fakfak', NULL, NULL),
(9102, 91, 'Kab. Kaimana', NULL, NULL),
(9103, 91, 'Kab. Teluk Wondama', NULL, NULL),
(9104, 91, 'Kab. Teluk Bintuni', NULL, NULL),
(9105, 91, 'Kab. Manokwari', NULL, NULL),
(9106, 91, 'Kab. Sorong Selatan', NULL, NULL),
(9107, 91, 'Kab. Sorong', NULL, NULL),
(9108, 91, 'Kab. Raja Ampat', NULL, NULL),
(9109, 91, 'Kab. Tambrauw', NULL, NULL),
(9110, 91, 'Kab. Maybrat', NULL, NULL),
(9171, 91, 'Kota Sorong', NULL, NULL),
(9401, 94, 'Kab. Merauke', NULL, NULL),
(9402, 94, 'Kab. Jayawijaya', NULL, NULL),
(9403, 94, 'Kab. Jayapura', NULL, NULL),
(9404, 94, 'Kab. Nabire', NULL, NULL),
(9408, 94, 'Kab. Kepulauan Yapen', NULL, NULL),
(9409, 94, 'Kab. Biak Numfor', NULL, NULL),
(9410, 94, 'Kab. Paniai', NULL, NULL),
(9411, 94, 'Kab. Puncak Jaya', NULL, NULL),
(9412, 94, 'Kab. Mimika', NULL, NULL),
(9413, 94, 'Kab. Boven Digoel', NULL, NULL),
(9414, 94, 'Kab. Mappi', NULL, NULL),
(9415, 94, 'Kab. Asmat', NULL, NULL),
(9416, 94, 'Kab. Yahukimo', NULL, NULL),
(9417, 94, 'Kab. Pegunungan Bintang', NULL, NULL),
(9418, 94, 'Kab. Tolikara', NULL, NULL),
(9419, 94, 'Kab. Sarmi', NULL, NULL),
(9420, 94, 'Kab. Keerom', NULL, NULL),
(9426, 94, 'Kab. Waropen', NULL, NULL),
(9427, 94, 'Kab. Supiori', NULL, NULL),
(9428, 94, 'Kab. Mamberamo Raya', NULL, NULL),
(9429, 94, 'Kab. Nduga', NULL, NULL),
(9430, 94, 'Kab. Lanny Jaya', NULL, NULL),
(9431, 94, 'Kab. Mamberamo Tengah', NULL, NULL),
(9432, 94, 'Kab. Yalimo', NULL, NULL),
(9433, 94, 'Kab. Puncak', NULL, NULL),
(9434, 94, 'Kab. Dogiyai', NULL, NULL),
(9435, 94, 'Kab. Intan Jaya', NULL, NULL),
(9436, 94, 'Kab. Deiyai', NULL, NULL),
(9471, 94, 'Kota Jayapura', NULL, NULL);

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
(7, '2021_03_13_074304_create_customer_table', 3),
(8, '2021_03_16_070107_create_provinsi_table', 4),
(9, '2021_03_16_071628_create_kabupaten_table', 5);

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
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id`, `nama_provinsi`, `created_at`, `updated_at`) VALUES
(11, 'Aceh', NULL, NULL),
(12, 'Sumatera Utara', NULL, NULL),
(13, 'Sumatera Barat', NULL, NULL),
(14, 'Riau', NULL, NULL),
(15, 'Jambi', NULL, NULL),
(16, 'Sumatera Selatan', NULL, NULL),
(17, 'Bengkulu', NULL, NULL),
(18, 'Lampung', NULL, NULL),
(19, 'Kepulauan Bangka Belitung', NULL, NULL),
(21, 'Kepulauan Riau', NULL, NULL),
(31, 'Dki Jakarta', NULL, NULL),
(32, 'Jawa Barat', NULL, NULL),
(33, 'Jawa Tengah', NULL, NULL),
(34, 'Di Yogyakarta', NULL, NULL),
(35, 'Jawa Timur', NULL, NULL),
(36, 'Banten', NULL, NULL),
(51, 'Bali', NULL, NULL),
(52, 'Nusa Tenggara Barat', NULL, NULL),
(53, 'Nusa Tenggara Timur', NULL, NULL),
(61, 'Kalimantan Barat', NULL, NULL),
(62, 'Kalimantan Tengah', NULL, NULL),
(63, 'Kalimantan Selatan', NULL, NULL),
(64, 'Kalimantan Timur', NULL, NULL),
(65, 'Kalimantan Utara', NULL, NULL),
(71, 'Sulawesi Utara', NULL, NULL),
(72, 'Sulawesi Tengah', NULL, NULL),
(73, 'Sulawesi Selatan', NULL, NULL),
(74, 'Sulawesi Tenggara', NULL, NULL),
(75, 'Gorontalo', NULL, NULL),
(76, 'Sulawesi Barat', NULL, NULL),
(81, 'Maluku', NULL, NULL),
(82, 'Maluku Utara', NULL, NULL),
(91, 'Papua Barat', NULL, NULL),
(94, 'Papua', NULL, NULL);

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
-- Indeks untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9472;

--
-- AUTO_INCREMENT untuk tabel `merk`
--
ALTER TABLE `merk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
