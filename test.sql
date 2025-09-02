-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2025 at 11:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

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
-- Table structure for table `kartu_daerah`
--

CREATE TABLE `kartu_daerah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zona` varchar(255) NOT NULL,
  `akses` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporans`
--

CREATE TABLE `laporans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keluar` varchar(255) DEFAULT NULL,
  `keperluan` varchar(255) DEFAULT NULL,
  `identitas` varchar(255) DEFAULT NULL,
  `daerah` varchar(255) DEFAULT NULL,
  `nokartu` varchar(255) DEFAULT NULL,
  `nopol` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tujuan_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporans`
--

INSERT INTO `laporans` (`id`, `name`, `alamat`, `jumlah`, `keluar`, `keperluan`, `identitas`, `daerah`, `nokartu`, `nopol`, `status`, `tujuan_id`, `created_at`, `updated_at`) VALUES
(1, 'Ilham Kematian', 'UPT Yogyakarta', 1, '13:33', 'Kunjungan UPT PLN Semarang', 'KTP', '1-Terbatas', 'Roda 4', 'AB8977K', 'nonaktif', NULL, '2025-08-27 06:33:53', '2025-08-27 06:33:53'),
(2, 'Haedar Suwiji', 'UPT Yogyakarta', 1, '09:27', 'Rapat Koordinasi Bulanan', 'SIM', '2-Tertutup', 'Roda 4', 'H6633KL', 'nonaktif', NULL, '2025-08-28 02:27:03', '2025-08-28 02:27:03'),
(3, 'Rio', 'Mitra teknik', 1, '14:55', 'Cek cctv', 'KTP', '1-Terlarang', 'Roda 2', 'H1223BY', 'nonaktif', NULL, '2025-08-28 07:55:33', '2025-08-28 07:55:33'),
(4, 'Romi', 'PT. Rofan', 1, '16:15', 'Survey portal', 'KTP', '2-Tertutup', 'Roda 2', 'H1234HY', 'nonaktif', NULL, '2025-08-28 09:15:22', '2025-08-28 09:15:22'),
(5, 'KDM (Kevin De Mulyadi)', 'Jawa Barat', 1, '09:02', 'Sidak Tempat Usaha', 'SIM', '2-Terbatas', 'Roda 2', 'B6123L', 'nonaktif', NULL, '2025-08-30 02:02:43', '2025-08-30 02:02:43'),
(6, 'Rose Brand', 'PT Mencari Jati diri', 20, '10:55', 'Setor Tepung Beras 1Kg', 'KTP', '1-Tertutup', 'Roda 4', 'H5655J', 'nonaktif', NULL, '2025-08-30 03:55:54', '2025-08-30 03:55:54'),
(7, 'Ismail bin Mail', 'Kampung Durian Runtuh', 20, '11:47', 'Study Tour', 'Lainnya', '2-Tertutup', 'Lainnya', 'AT6346H', 'nonaktif', 'UPT - Wahyu Julaehah', '2025-08-30 04:47:15', '2025-08-30 04:47:15'),
(8, 'Huda Formulir', 'UPT Karanganyar', 1, '11:54', 'Pengecekan CCTV', 'SIM', '1-Terlarang', 'Roda 2', 'AA7348J', 'nonaktif', 'UP2B - Mikail Rohman (IT Staff)', '2025-08-30 04:54:50', '2025-08-30 04:54:50'),
(9, 'Wahyu Supriyadi', 'UPT Surakarta', 1, '11:55', 'Kunjungan UPT PLN Semarang', 'KTP', '1-Terbatas', 'Roda 2', 'H6633KL', 'nonaktif', '', '2025-08-30 04:55:17', '2025-08-30 04:55:17'),
(10, 'Wawan, Surawan, Setiawan', 'Disnaker Semarang', 3, '12:01', 'Menemui pak Yogi', 'KTP', '1-Terlarang', 'Roda 4', 'H8855YQ', 'nonaktif', '', '2025-08-30 05:01:29', '2025-08-30 05:01:29'),
(11, 'Sulaiman WIjaya', 'Banyumas', 1, '12:05', 'Kunjungan UPT PLN Semarang', 'SIM', '1-Terlarang', 'Roda 4', 'H9342L', 'nonaktif', '', '2025-08-30 05:05:14', '2025-08-30 05:05:14'),
(12, 'Wahyudi sampokong', 'UPT Tegal', 2, '12:05', 'Mengambil Minum', 'SIM', '1-Terlarang', 'Roda 2', 'HD2912H', 'nonaktif', '', '2025-08-30 05:05:22', '2025-08-30 05:05:22'),
(13, 'Wildan, Sulaiman, Hilmi, Cahya, Budi', 'UPT Pekalongan', 5, '12:08', 'Rapat Koordinasi Bulanan', 'KTP', '1-Terlarang', 'Roda 4', 'G2920NV', 'nonaktif', '', '2025-08-30 05:08:00', '2025-08-30 05:08:00'),
(14, 'Istrinya Pak Wahyu', 'UPT Sragen', 1, '13:43', 'Menjemput Jam 3 Pagi', 'SIM', '1-Tertutup', 'Roda 2', 'H5558KL', 'nonaktif', 'UPT - Wahyu Julaehah (Security)', '2025-08-30 06:43:53', '2025-08-30 06:43:53'),
(15, 'Crocodile', 'Roblox Online', 2, '14:14', 'Menjemur Pisang', 'SIM', '2-Terlarang', 'Roda 4', 'AD6622PO', 'nonaktif', 'UP2B - Simpanini Bananini', '2025-08-30 07:14:19', '2025-08-30 07:14:19'),
(16, 'Randa', 'jalan', 3, '11:43', 'memasang barrier gate', 'KTP', '2-Terbatas', 'Roda 4', 'H444TS', 'nonaktif', 'UP2B - Zamoy Cihuy', '2025-09-01 04:43:30', '2025-09-01 04:43:30'),
(17, 'Tio Wirawan, Budi Santoso', 'UPT Klaten', 2, '13:53', 'Kunjungan Industri', 'SIM', '1-Tertutup', 'Roda 4', 'H5568K', 'nonaktif', 'UPT - Wildan Sulaiman', '2025-09-01 06:53:59', '2025-09-01 06:53:59'),
(18, 'Wahyu Supriyadi', 'UPT Surakarta', 1, '11:10', 'Kunjungan UPT PLN Semarang', 'KTP', '2-Tertutup', 'Roda 4', 'H6633KL', 'nonaktif', '', '2025-09-02 04:10:54', '2025-09-02 04:10:54');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_08_15_085433_create_submissions_table', 1),
(6, '2025_08_23_084811_create_kartu_daerah_table', 2),
(7, '2025_08_23_091023_create_kartus_table', 3),
(9, '2025_08_25_160827_create_zones_table', 4),
(10, '2025_08_26_095230_add_timestamps_to_zones_table', 5),
(11, '2025_08_27_133003_create_laporans_table', 6),
(12, '2025_08_28_091104_add_archive_fields_to_submissions_table', 7),
(13, '2025_08_28_100923_create_settings_table', 8),
(14, '2025_08_28_105154_create_tujuans_table', 9),
(15, '2025_08_28_105337_add_tujuan_id_to_submissions_table', 10),
(16, '2025_08_28_133117_add_tujuan_to_submissions_table', 11),
(17, '2025_08_29_143819_add_id_kartu_to_submissions_table', 12),
(18, '2025_08_30_110924_add_tujuan_id_to_laporans_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'landing_title', 'Selamat Datang di UPT & UP2B Kabupaten Semarang', '2025-08-28 03:20:27', '2025-08-28 07:25:43'),
(2, 'landing_description', '\"Listrik untuk Kehidupan yang Lebih Baik\"', '2025-08-28 03:20:27', '2025-09-01 03:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tujuan_id` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `keluar` varchar(5) DEFAULT NULL,
  `keperluan` varchar(255) NOT NULL,
  `identitas` varchar(255) NOT NULL,
  `daerah` varchar(255) NOT NULL,
  `id_kartu` varchar(10) DEFAULT NULL,
  `nokartu` varchar(255) NOT NULL,
  `nopol` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('pending','aktif','nonaktif') NOT NULL DEFAULT 'pending',
  `is_archived` tinyint(1) NOT NULL DEFAULT 0,
  `archived_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `tujuan_id`, `name`, `alamat`, `jumlah`, `keluar`, `keperluan`, `identitas`, `daerah`, `id_kartu`, `nokartu`, `nopol`, `created_at`, `updated_at`, `status`, `is_archived`, `archived_at`, `deleted_at`) VALUES
(30, '', 'Wahyu Supriyadi', 'UPT Surakarta', '1', '11:10', 'Kunjungan UPT PLN Semarang', 'KTP', '2-Tertutup', '0857067491', 'Roda 4', 'H6633KL', '2025-08-23 05:00:05', '2025-09-02 09:12:55', 'nonaktif', 1, '2025-09-02 04:10:54', '2025-09-02 09:12:55'),
(31, '', 'Ilham, Samsudin', 'UPT Yogyakarta', '2', NULL, 'Rapat Koordinasi Bulanan', 'SIM', '', NULL, 'Roda 4', 'AB8977K', '2025-08-23 05:00:50', '2025-08-26 07:06:23', 'pending', 0, NULL, NULL),
(32, '', 'Wildan, Sulaiman, Hilmi, Cahya, Budi', 'UPT Pekalongan', '5', '12:08', 'Rapat Koordinasi Bulanan', 'KTP', '1-Terlarang', '0761966905', 'Roda 4', 'G2920NV', '2025-08-23 05:01:47', '2025-08-30 06:07:05', 'nonaktif', 1, '2025-08-30 05:08:00', '2025-08-30 06:07:05'),
(35, '', 'Wahyudi sampokong', 'UPT Tegal', '2', '12:05', 'Mengambil Minum', 'SIM', '1-Terlarang', '0761966905', 'Roda 2', 'HD2912H', '2025-08-23 06:24:14', '2025-08-30 06:07:05', 'nonaktif', 1, '2025-08-30 05:05:22', '2025-08-30 06:07:05'),
(36, '', 'Sulaiman WIjaya', 'Banyumas', '1', '12:05', 'Kunjungan UPT PLN Semarang', 'SIM', '1-Terlarang', '0761966905', 'Roda 4', 'H9342L', '2025-08-23 06:30:22', '2025-08-30 06:07:05', 'nonaktif', 1, '2025-08-30 05:05:14', '2025-08-30 06:07:05'),
(44, '', 'Wawan, Surawan, Setiawan', 'Disnaker Semarang', '3', '12:01', 'Menemui pak Yogi', 'KTP', '1-Terlarang', '0761966905', 'Roda 4', 'H8855YQ', '2025-08-23 06:51:15', '2025-08-30 06:07:05', 'nonaktif', 1, '2025-08-30 05:01:29', '2025-08-30 06:07:05'),
(45, '', 'Wahyu Supriyadi', 'UPT Surakarta', '1', '11:55', 'Kunjungan UPT PLN Semarang', 'KTP', '1-Terbatas', '0502586642', 'Roda 2', 'H6633KL', '2025-08-25 04:29:56', '2025-08-30 06:07:05', 'nonaktif', 1, '2025-08-30 04:55:17', '2025-08-30 06:07:05'),
(51, '', 'Suep Suwirno', 'UPT Tegal', '2', NULL, 'Laporan Mingguan', 'SIM', '1-Tertutup', NULL, 'R2', 'AD3842LK', '2025-08-27 01:47:06', '2025-08-29 07:44:45', 'aktif', 0, NULL, '2025-08-29 07:44:45'),
(52, '', 'Haedar Suwiji', 'UPT Yogyakarta', '1', '09:27', 'Rapat Koordinasi Bulanan', 'SIM', '2-Tertutup', NULL, 'Roda 4', 'H6633KL', '2025-08-27 01:53:25', '2025-08-28 08:20:22', 'nonaktif', 1, '2025-08-28 02:27:03', '2025-08-28 08:20:22'),
(61, '', 'Bakin', 'jl jalan', '1', '14:13', 'membobok', 'KTP', '2-Terbatas', NULL, 'Roda 2', 'H6678S', '2025-08-27 03:12:03', '2025-08-28 08:20:22', 'nonaktif', 0, NULL, '2025-08-28 08:20:22'),
(62, '', 'Mikiil', 'Mangkeng', '1', '15:26', 'Jalan²', 'KTP', '2-Terlarang', NULL, 'Roda 2', 'H7836', '2025-08-27 03:12:09', '2025-08-28 08:20:22', 'nonaktif', 0, NULL, '2025-08-28 08:20:22'),
(63, '', 'Dmn uhuy', 'Mayjend city', '1', '15:23', 'Bongkar muat', 'KTP', '1-Terlarang', NULL, 'Roda 2', 'H 31 AQ', '2025-08-27 03:14:28', '2025-08-28 08:20:22', 'nonaktif', 0, NULL, '2025-08-28 08:20:22'),
(64, '1', 'sad', 'asdas', '1', NULL, 'sad', 'KTP', '', NULL, 'Roda 4', 'ASDAS', '2025-08-28 06:17:10', '2025-08-28 06:57:12', 'pending', 0, NULL, '2025-08-28 06:57:12'),
(65, '1', 'yudi', 'ydui', '1', NULL, 'ydui', 'KTP', '', NULL, 'Roda 4', 'SDF', '2025-08-28 06:22:38', '2025-08-28 06:57:10', 'pending', 0, NULL, '2025-08-28 06:57:10'),
(66, '1', 'ad', 'ad', '1', NULL, 'asd', 'SIM', '', NULL, 'Roda 4', 'ADSA', '2025-08-28 06:33:18', '2025-08-28 06:57:08', 'pending', 0, NULL, '2025-08-28 06:57:08'),
(67, 'UP2B - UP2B - 2', 'ghj', 'hjg', '5', NULL, 'ghj', 'SIM', '', NULL, 'Roda 4', 'JGH', '2025-08-28 06:44:09', '2025-08-28 06:57:06', 'pending', 0, NULL, '2025-08-28 06:57:06'),
(68, 'UPT - 1', 'mikail', 'mikail', '2', NULL, 'mikail', 'KTP', '', NULL, 'Lainnya', 'AS', '2025-08-28 06:49:20', '2025-08-28 06:57:04', 'pending', 0, NULL, '2025-08-28 06:57:04'),
(69, '1', 'hfghf', 'ghfgh', '4', NULL, 'ghgfh', 'KTP', '', NULL, 'Lainnya', 'GFH', '2025-08-28 06:51:44', '2025-08-28 06:57:01', 'pending', 0, NULL, '2025-08-28 06:57:01'),
(70, '2', 'sdsad', 'asdasd', '3', NULL, 'asdas', 'SIM', '', NULL, 'Roda 4', 'DSA', '2025-08-28 06:54:33', '2025-08-28 06:56:59', 'pending', 0, NULL, '2025-08-28 06:56:59'),
(71, 'UPT - Yogi Andreas (Staff P3K)', 'ukuik', 'kiiuik', '7', NULL, 'ikiu', 'KTP', '', NULL, 'Lainnya', 'YTJT', '2025-08-28 06:54:59', '2025-08-28 06:56:57', 'pending', 0, NULL, '2025-08-28 06:56:57'),
(72, 'UP2B - Mikail Rohman (IT Staff)', 'Huda Formulir', 'UPT Karanganyar', '1', '11:54', 'Pengecekan CCTV', 'SIM', '1-Terlarang', '0761966905', 'Roda 2', 'AA7348J', '2025-08-28 06:57:49', '2025-08-30 06:07:05', 'nonaktif', 1, '2025-08-30 04:54:50', '2025-08-30 06:07:05'),
(73, 'UPT - Wahyu Julaehah (Security)', 'Istrinya Pak Wahyu', 'UPT Sragen', '1', '13:43', 'Menjemput Jam 3 Pagi', 'SIM', '1-Tertutup', '0490088563', 'Roda 2', 'H5558KL', '2025-08-28 07:24:57', '2025-09-01 04:05:02', 'nonaktif', 1, '2025-08-30 06:43:53', '2025-09-01 04:05:02'),
(74, 'UP2B - Mikail Rohman (IT Staff)', 'Romi', 'PT. Rofan', '1', '16:15', 'Survey portal', 'SIM', '2-Tertutup', NULL, 'R2', 'H1234HY', '2025-08-28 07:48:59', '2025-08-29 07:44:41', 'nonaktif', 1, '2025-08-28 09:15:22', '2025-08-29 07:44:41'),
(75, 'UPT - Yogi Andreas (Staff P3K)', 'Rio', 'Mitra teknik', '1', '14:55', 'Cek cctv', 'KTP', '1-Terlarang', NULL, 'Roda 2', 'H1223BY', '2025-08-28 07:54:33', '2025-08-28 08:20:22', 'nonaktif', 1, '2025-08-28 07:55:33', '2025-08-28 08:20:22'),
(76, 'UPT - Wildan Sulaiman (Staff Akuntan)', 'Robi Darwis', 'UPT Klaten', '2', '11:34', 'Ambil mangkok', 'SIM', '2-Tertutup', '0857067491', 'Roda 4', 'FG4422H', '2025-08-29 02:23:54', '2025-08-30 04:51:25', 'nonaktif', 0, NULL, '2025-08-30 04:51:25'),
(77, 'UPT - Yogi Andreas (Staff P3K)', 'Suep Husainiq', 'Klaten', '1', '11:27', 'Jenguk Yogi', 'SIM', '2-Terlarang', '0497418323', 'Roda 4', 'H4578K', '2025-08-29 04:15:16', '2025-08-30 04:51:25', 'nonaktif', 0, NULL, '2025-08-30 04:51:25'),
(78, 'UP2B - Mikail Rohman', 'robi', 'hed', '2', NULL, 'whedwhed', 'SIM', '1-Terbatas', NULL, 'Roda 4', 'FER64563Y', '2025-08-29 04:23:54', '2025-08-29 07:44:17', 'aktif', 0, NULL, '2025-08-29 07:44:17'),
(79, 'UPT - Wahyu Julaehah', 'Ismail bin Mail', 'Kampung Durian Runtuh', '20', '11:47', 'Study Tour', 'Lainnya', '2-Tertutup', '0857067491', 'Lainnya', 'AT6346H', '2025-08-29 08:01:15', '2025-08-30 04:51:25', 'nonaktif', 1, '2025-08-30 04:47:15', '2025-08-30 04:51:25'),
(80, 'UP2B - Zamoy Cihuy', 'Susilo', 'UPT Trenggalek', '2', NULL, 'Mencabut Bulu Ayam', 'SIM', '', NULL, 'Roda 4', 'H6346J', '2025-08-29 08:14:34', '2025-08-29 08:55:15', 'pending', 0, NULL, '2025-08-29 08:55:15'),
(81, 'UPT - Wildan Sulaiman', 'Jaliteng', 'Orang Jauh', '1', NULL, 'Menemukan Pesta Siaga', 'SIM', '', NULL, 'Roda 2', 'H7789J', '2025-08-29 08:22:02', '2025-08-29 08:55:12', 'pending', 0, NULL, '2025-08-29 08:55:12'),
(82, 'UP2B - Mikail Rohman', 'Suep', 'Suep', '1', NULL, 'Tidur', 'SIM', '', NULL, 'Roda 4', 'H5578Y', '2025-08-29 08:23:00', '2025-08-29 08:55:09', 'pending', 0, NULL, '2025-08-29 08:55:09'),
(83, 'UP2B - Zamoy Cihuy', 'Mikail suherman', 'Pt Mitra Teknik', '2', '11:14', 'Magang', 'SIM', '2-Terbatas', '0761024665', 'Lainnya', 'H6282H', '2025-08-29 08:29:39', '2025-08-30 04:51:25', 'nonaktif', 0, NULL, '2025-08-30 04:51:25'),
(84, 'UPT - Yogi Andreas', 'Wahyu', 'Wahyu', '1', NULL, 'Gshs', 'SIM', '', NULL, 'Lainnya', 'YA7383J', '2025-08-29 08:31:07', '2025-08-29 08:55:07', 'pending', 0, NULL, '2025-08-29 08:55:07'),
(85, 'UPT - Wahyu Julaehah', 'sukamto', 'sukamto', '2', NULL, 'gdf', 'SIM', '', NULL, 'Roda 2', 'SDF436', '2025-08-29 08:31:52', '2025-08-29 08:55:04', 'pending', 0, NULL, '2025-08-29 08:55:04'),
(86, 'UP2B - Zamoy Cihuy', 'toyy', 'tu', '5', NULL, 'ghhh', 'KTP', '', NULL, 'Roda 4', 'TRRTH', '2025-08-29 08:40:52', '2025-08-29 08:55:01', 'pending', 0, NULL, '2025-08-29 08:55:01'),
(87, 'UP2B - Zamoy Cihuy', 'Yoitop', 'Klaten', '1', NULL, 'Hiking', 'SIM', '', NULL, 'Roda 4', 'H6373J', '2025-08-29 08:41:52', '2025-08-29 08:54:57', 'pending', 0, NULL, '2025-08-29 08:54:57'),
(88, 'UP2B - Zamoy Cihuy', 'Rose Brand', 'PT Mencari Jati diri', '20', '10:55', 'Setor Tepung Beras 1Kg', 'KTP', '1-Tertutup', '0490088563', 'Roda 4', 'H5655J', '2025-08-29 08:54:40', '2025-08-30 04:51:25', 'nonaktif', 1, '2025-08-30 03:55:54', '2025-08-30 04:51:25'),
(89, 'UPT - Yogi Andreas', 'KDM (Kevin De Mulyadi)', 'Jawa Barat', '1', '09:02', 'Sidak Tempat Usaha', 'SIM', '2-Terbatas', '0761024665', 'Roda 2', 'B6123L', '2025-08-29 08:56:42', '2025-08-30 04:51:25', 'nonaktif', 1, '2025-08-30 02:02:43', '2025-08-30 04:51:25'),
(90, 'UPT - Wahyu Julaehah', 'a', 'b', '1', '11:11', 'c', 'KTP', '1-Terbatas', '0502586642', 'Roda 2', 'H1234Y', '2025-08-30 02:34:20', '2025-08-30 04:51:25', 'nonaktif', 0, NULL, '2025-08-30 04:51:25'),
(91, 'UPT - Wahyu Julaehah', 'Ilyas bin Suyas', 'Mangkang Kulon', '1', NULL, 'Mengambil Minum', 'SIM', '', NULL, 'Roda 4', 'H8889L', '2025-08-30 06:52:10', '2025-08-30 06:52:10', 'pending', 0, NULL, NULL),
(92, 'UPT - Yogi Andreas', 'sulaiman', 'johar', '1', NULL, 'rosok', 'SIM', '', NULL, 'Roda 2', 'AHAHA', '2025-08-30 06:56:15', '2025-08-30 06:56:15', 'pending', 0, NULL, NULL),
(93, 'UP2B - Zamoy Cihuy', 'Kurir Jeente', 'PT Jeente Indonesia', '1', NULL, 'Mengantar Paket', 'SIM', '', NULL, 'Roda 4', 'B0909U', '2025-08-30 07:07:10', '2025-08-30 07:07:10', 'pending', 0, NULL, NULL),
(94, 'UPT - Wildan Sulaiman', 'Rudi Habibie', 'Australia', '2', NULL, 'Study Kelistrikan', 'Lainnya', '', NULL, 'Roda 4', 'G1267P', '2025-08-30 07:09:26', '2025-08-30 07:09:26', 'pending', 0, NULL, NULL),
(95, 'UP2B - Simpanini Bananini', 'Crocodile', 'Roblox Online', '2', '14:14', 'Menjemur Pisang', 'SIM', '2-Terlarang', '0497418323', 'Roda 4', 'AD6622PO', '2025-08-30 07:13:12', '2025-09-01 04:05:02', 'nonaktif', 1, '2025-08-30 07:14:19', '2025-09-01 04:05:02'),
(96, 'UP2B - Zamoy Cihuy', 'Randa', 'jalan', '3', '11:43', 'memasang barrier gate', 'KTP', '2-Terbatas', '0761024665', 'Roda 4', 'H444TS', '2025-08-30 07:21:57', '2025-09-01 07:16:16', 'nonaktif', 1, '2025-09-01 04:43:30', '2025-09-01 07:16:16'),
(97, 'UPT - Wildan Sulaiman', 'Bakinn', 'Jalan ²', '10', NULL, 'Demo', 'KTP', '1-Terbatas', '0502586642', 'Lainnya', 'H7899P', '2025-09-01 04:42:04', '2025-09-01 06:59:52', 'aktif', 0, NULL, NULL),
(98, 'UPT - Wildan Sulaiman', 'Tio Wirawan, Budi Santoso', 'UPT Klaten', '2', '13:53', 'Kunjungan Industri', 'SIM', '1-Tertutup', '0490088563', 'Roda 4', 'H5568K', '2025-09-01 06:39:34', '2025-09-01 07:16:16', 'nonaktif', 1, '2025-09-01 06:53:59', '2025-09-01 07:16:16'),
(99, 'UPT - Muhammad Arrifin', 'Ilyas Jago Catur', 'Mangkang Kulon', '1', NULL, 'Magang Teknisi', 'Lainnya', '', NULL, 'Roda 2', 'H5272NN', '2025-09-02 03:32:44', '2025-09-02 03:32:44', 'pending', 0, NULL, NULL),
(100, 'UPT - Sudarsono', 'Ismail bin Mukhlis', 'Mitra Teknik', '1', NULL, 'Magang', 'SIM', '', NULL, 'Roda 2', 'H7675L', '2025-09-02 03:36:19', '2025-09-02 03:36:19', 'pending', 0, NULL, NULL),
(101, 'UP2B - Ismail bin Mail', 'Ronaldo siuuuu', 'Portugal', '1', NULL, 'Jumpa fans', 'Lainnya', '', NULL, 'Roda 4', 'H6666K', '2025-09-02 03:37:21', '2025-09-02 03:37:21', 'pending', 0, NULL, NULL),
(102, 'UPT - Pelopor Opor', 'Bina Garut', 'Garut Kota', '1', NULL, 'Memasak Nasi', 'SIM', '', NULL, 'Roda 2', 'E7373Y', '2025-09-02 04:44:12', '2025-09-02 04:44:12', 'pending', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tujuans`
--

CREATE TABLE `tujuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit` enum('UPT','UP2B') NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tujuans`
--

INSERT INTO `tujuans` (`id`, `unit`, `nama`, `jabatan`, `created_at`, `updated_at`) VALUES
(1, 'UPT', 'Yogi Pamungkas', NULL, '2025-08-27 04:20:15', '2025-09-02 04:15:01'),
(2, 'UP2B', 'Mikail Rohman', 'IT Staff', '2025-08-26 04:20:15', '2025-08-27 04:20:15'),
(3, 'UPT', 'Wahyu Julaehah', 'Security', '2025-08-28 07:14:57', '2025-08-28 07:14:57'),
(4, 'UP2B', 'Zamoy Cihuy', 'Teknisi Robot', '2025-08-29 01:59:03', '2025-08-29 01:59:03'),
(5, 'UPT', 'Wildan Sulaiman', 'Staff Akuntan', '2025-08-29 01:59:36', '2025-08-29 01:59:36'),
(6, 'UP2B', 'Simpanini Bananini', 'Programmer AI', '2025-08-30 07:11:13', '2025-08-30 07:11:13'),
(7, 'UPT', 'Muhammad Arrifin', 'Administrasi', '2025-08-30 07:18:22', '2025-08-30 07:18:22'),
(8, 'UP2B', 'Ismail bin Mail', 'Assisten Manajer', '2025-08-30 07:18:55', '2025-08-30 07:18:55'),
(9, 'UPT', 'Rudi Rudian', NULL, '2025-09-01 02:01:21', '2025-09-01 02:01:21'),
(12, 'UPT', 'Pelopor Opor', NULL, '2025-09-01 02:31:39', '2025-09-01 02:31:39'),
(13, 'UP2B', 'Roti Aokawokwk', NULL, '2025-09-01 02:31:39', '2025-09-01 02:31:39'),
(14, 'UPT', 'Sindoro Anjalina', NULL, '2025-09-01 02:31:39', '2025-09-02 04:15:11'),
(15, 'UPT', 'Sumbing Belimbing', NULL, '2025-09-01 02:31:39', '2025-09-02 04:15:21'),
(16, 'UPT', 'Siti Rinjani', NULL, '2025-09-01 07:04:58', '2025-09-02 04:15:29'),
(17, 'UP2B', 'Bagus Setiabudi', NULL, '2025-09-01 07:04:58', '2025-09-01 07:04:58'),
(18, 'UPT', 'Romo Sudarsono', NULL, '2025-09-01 07:04:58', '2025-09-02 04:15:42'),
(20, 'UP2B', 'Suep Sudirmojo', NULL, '2025-09-02 04:20:28', '2025-09-02 04:20:28'),
(21, 'UPT', 'Sonya Sony', NULL, '2025-09-02 04:20:28', '2025-09-02 04:20:28'),
(22, 'UP2B', 'Marcheng Racing', NULL, '2025-09-02 04:20:28', '2025-09-02 04:20:28'),
(23, 'UPT', 'Rahmat Tahalu', NULL, '2025-09-02 04:20:28', '2025-09-02 04:20:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Admin', 'user', 'admin@gmail.com', NULL, '$2y$12$2doNvg5ffWE7VGet6LKBL.crww/zABd4vty6/RMFD.86trZ9f.N7S', 'GuqI4GB3ft9xTlvhHLBlMVoLQmOY6groYuge551MuJdBViLj2Ln2qPFDe8Qu', '2025-08-27 04:51:29', '2025-08-28 09:18:06'),
(5, 'Yogi', 'user', 'yogi@gmail.com', NULL, '$2y$12$HPBwNcf/R0mY2Z1gXE09MuNCYz9dVJJz6tEMVUg83AcZp44IjaHPC', NULL, '2025-08-27 05:21:41', '2025-08-27 05:21:41'),
(6, 'Salman Alfarisi', 'user', 'salman@gmail.com', NULL, '$2y$12$wV3OLp8FoeH.xG.6dtUmAuzzpYwFoFOSvErtckAUvcWzIFc2YRqCm', NULL, '2025-08-27 06:19:55', '2025-08-28 09:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(11) NOT NULL,
  `nomor` char(5) NOT NULL,
  `id_kartu` varchar(255) NOT NULL,
  `zona` enum('Terbatas','Tertutup','Terlarang') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `nomor`, `id_kartu`, `zona`, `created_at`, `updated_at`) VALUES
(5, '001', '0490088563', 'Tertutup', '2025-08-26 03:01:18', '2025-08-26 03:01:18'),
(6, '002', '0857067491', 'Tertutup', '2025-08-26 03:01:29', '2025-08-26 03:01:29'),
(7, '001', '0502586642', 'Terbatas', '2025-08-26 03:01:41', '2025-08-26 03:01:41'),
(8, '002', '0761024665', 'Terbatas', '2025-08-26 03:01:46', '2025-08-26 03:01:46'),
(9, '001', '0761966905', 'Terlarang', '2025-08-26 03:02:00', '2025-08-26 03:02:00'),
(10, '002', '0497418323', 'Terlarang', '2025-08-26 03:02:05', '2025-08-26 03:02:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kartu_daerah`
--
ALTER TABLE `kartu_daerah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporans`
--
ALTER TABLE `laporans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporans_tujuan_id_foreign` (`tujuan_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submissions_tujuan_id_foreign` (`tujuan_id`),
  ADD KEY `submissions_id_kartu_index` (`id_kartu`);

--
-- Indexes for table `tujuans`
--
ALTER TABLE `tujuans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `zona_nomor_unique` (`zona`,`nomor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporans`
--
ALTER TABLE `laporans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tujuans`
--
ALTER TABLE `tujuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
