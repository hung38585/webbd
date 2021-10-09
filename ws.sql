-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2021 at 05:52 PM
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
-- Database: `ws`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `content`, `image`, `created_at`, `updated_at`) VALUES
(5, '<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>', 'samnl_3.jpg', '2021-09-05 06:57:17', '2021-10-09 07:26:00'),
(10, '<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>', 'samnl_2.jpg', '2021-10-03 02:08:37', '2021-10-09 07:25:54'),
(11, '<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>', 'samnl_1.jpg', '2021-10-03 02:09:06', '2021-10-09 07:25:47'),
(12, '<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>', 'samnl.jpg', '2021-10-03 02:09:47', '2021-10-09 07:24:56');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Danh mục 1', 'danh-muc-8', NULL, NULL, '2021-08-19 08:26:59', '2021-10-03 06:29:42'),
(2, 'Danh mục 2', 'danh-muc-7', NULL, NULL, '2021-08-19 08:28:15', '2021-10-03 06:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Thu Trang', 'Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.', 'v5_1.jpg', '2021-09-02 21:05:00', '2021-09-03 20:14:41'),
(4, 'LaLa', 'Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.', 'v1_5.jpg', '2021-09-02 23:13:52', '2021-09-03 20:14:35'),
(5, 'HuHu', 'Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.', 'v4_4.jpg', '2021-09-02 23:14:08', '2021-09-03 20:14:14'),
(6, 'HaHa', '<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>', 'v2_4.jpg', '2021-09-02 23:14:33', '2021-09-10 20:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `url`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 2, 'samnl_48.jpg', NULL, NULL, '2021-08-22 06:27:11', '2021-10-09 07:36:26'),
(4, 2, 'samnl_49.jpg', NULL, NULL, '2021-08-22 06:27:11', '2021-10-09 07:36:29'),
(7, 4, 'samnl_46.jpg', NULL, NULL, '2021-08-22 06:29:06', '2021-10-09 07:36:07'),
(8, 4, 'samnl_47.jpg', NULL, NULL, '2021-08-22 06:29:06', '2021-10-09 07:36:11'),
(11, 6, 'samnl_44.jpg', NULL, NULL, '2021-08-22 06:30:12', '2021-10-09 07:35:50'),
(12, 6, 'samnl_45.jpg', NULL, NULL, '2021-08-22 06:30:12', '2021-10-09 07:35:53'),
(14, 8, 'samnl_43.jpg', NULL, NULL, '2021-08-22 07:50:41', '2021-10-09 07:35:35'),
(17, 10, 'samnl_36.jpg', NULL, NULL, '2021-08-22 07:52:32', '2021-10-09 07:34:43'),
(18, 10, 'samnl_37.jpg', NULL, NULL, '2021-08-22 07:52:32', '2021-10-09 07:34:55'),
(19, 10, 'samnl_38.jpg', NULL, NULL, '2021-08-25 06:56:11', '2021-10-09 07:34:59'),
(20, 10, 'samnl_39.jpg', NULL, NULL, '2021-08-25 06:57:04', '2021-10-09 07:35:02'),
(22, 10, 'samnl_40.jpg', NULL, NULL, '2021-08-25 07:00:55', '2021-10-09 07:35:14'),
(23, 10, 'samnl_41.jpg', NULL, NULL, '2021-08-28 02:16:50', '2021-10-09 07:35:17'),
(24, 10, 'samnl_42.jpg', NULL, NULL, '2021-08-28 02:16:50', '2021-10-09 07:35:21'),
(25, 11, 'samnl_33.jpg', NULL, NULL, '2021-09-06 06:27:43', '2021-10-09 07:34:08'),
(26, 11, 'samnl_34.jpg', NULL, NULL, '2021-09-06 06:27:43', '2021-10-09 07:34:11'),
(27, 11, 'samnl_35.jpg', NULL, NULL, '2021-09-06 06:27:43', '2021-10-09 07:34:15'),
(28, 12, 'samnl_30.jpg', NULL, NULL, '2021-09-06 06:28:55', '2021-10-09 07:33:21'),
(29, 12, 'samnl_31.jpg', NULL, NULL, '2021-09-06 06:28:55', '2021-10-09 07:33:24'),
(30, 12, 'samnl_32.jpg', NULL, NULL, '2021-09-06 06:28:55', '2021-10-09 07:33:28'),
(31, 13, 'samnl_27.jpg', NULL, NULL, '2021-09-06 06:29:36', '2021-10-09 07:32:32'),
(32, 13, 'samnl_28.jpg', NULL, NULL, '2021-09-06 06:29:36', '2021-10-09 07:32:36'),
(33, 13, 'samnl_29.jpg', NULL, NULL, '2021-09-06 06:29:36', '2021-10-09 07:32:52'),
(34, 14, 'samnl_24.jpg', NULL, NULL, '2021-09-06 06:30:06', '2021-10-09 07:32:03'),
(35, 14, 'samnl_25.jpg', NULL, NULL, '2021-09-06 06:30:06', '2021-10-09 07:32:07'),
(36, 14, 'samnl_26.jpg', NULL, NULL, '2021-09-06 06:30:06', '2021-10-09 07:32:10'),
(37, 15, 'samnl_21.jpg', NULL, NULL, '2021-09-06 06:32:30', '2021-10-09 07:31:32'),
(38, 15, 'samnl_22.jpg', NULL, NULL, '2021-09-06 06:32:30', '2021-10-09 07:31:36'),
(39, 15, 'samnl_23.jpg', NULL, NULL, '2021-09-06 06:32:30', '2021-10-09 07:31:39'),
(40, 16, 'samnl_18.jpg', NULL, NULL, '2021-09-06 06:34:48', '2021-10-09 07:31:08'),
(41, 16, 'samnl_19.jpg', NULL, NULL, '2021-09-06 06:34:48', '2021-10-09 07:31:11'),
(42, 16, 'samnl_20.jpg', NULL, NULL, '2021-09-06 06:34:48', '2021-10-09 07:31:15'),
(43, 17, 'samnl_15.jpg', NULL, NULL, '2021-09-06 06:35:19', '2021-10-09 07:30:42'),
(44, 17, 'samnl_16.jpg', NULL, NULL, '2021-09-06 06:35:19', '2021-10-09 07:30:45'),
(45, 17, 'samnl_17.jpg', NULL, NULL, '2021-09-06 06:35:19', '2021-10-09 07:30:49'),
(46, 18, 'samnl_12.jpg', NULL, NULL, '2021-09-06 06:35:51', '2021-10-09 07:30:09'),
(47, 18, 'samnl_13.jpg', NULL, NULL, '2021-09-06 06:35:51', '2021-10-09 07:30:12'),
(48, 18, 'samnl_14.jpg', NULL, NULL, '2021-09-06 06:35:51', '2021-10-09 07:30:17'),
(49, 19, 'samnl_9.jpg', NULL, NULL, '2021-09-06 06:36:48', '2021-10-09 07:29:30'),
(50, 19, 'samnl_10.jpg', NULL, NULL, '2021-09-06 06:36:48', '2021-10-09 07:29:42'),
(51, 19, 'samnl_11.jpg', NULL, NULL, '2021-09-06 06:36:48', '2021-10-09 07:29:49'),
(52, 20, 'samnl_6.jpg', NULL, NULL, '2021-09-06 06:37:47', '2021-10-09 07:27:14'),
(53, 20, 'samnl_7.jpg', NULL, NULL, '2021-09-06 06:37:47', '2021-10-09 07:29:05'),
(54, 20, 'samnl_8.jpg', NULL, NULL, '2021-09-06 06:37:47', '2021-10-09 07:29:16'),
(55, 21, 'samnl_4.jpg', NULL, NULL, '2021-10-03 06:50:31', '2021-10-09 07:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `infomations`
--

CREATE TABLE `infomations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `infomations`
--

INSERT INTO `infomations` (`id`, `name`, `phone`, `mail`, `address`, `facebook`, `video`, `created_at`, `updated_at`) VALUES
(1, 'Sâm Ngọc Linh', '0123456789', 'web@gmail.com', '33 Xô Viết Nghệ Tĩnh, Đà Nẵng', 'https://www.facebook.com/', 'wed.mp4', NULL, '2021-10-09 07:21:50');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_08_222716_create_projects_table', 1),
(5, '2021_08_14_090908_create_categories_table', 1),
(6, '2021_08_14_091008_create_products_table', 1),
(8, '2021_08_14_091103_create_feedbacks_table', 1),
(9, '2021_08_14_092907_create_prodcut_details_table', 1),
(10, '2021_08_22_040115_create_images_table', 2),
(11, '2021_08_13_134340_create_product_types_table', 3),
(12, '2021_09_02_151241_create_feedbacks_table', 4),
(13, '2021_09_02_151332_create_feedback_table', 5),
(14, '2021_09_03_141153_create_infomations_table', 5),
(15, '2021_09_04_033255_create_services_table', 6),
(16, '2021_08_14_091031_create_abouts_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(3, 'Far far away, behind the word mountains', '<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>', 'samnl_52.jpg', 'far-far-away-behind-the-word-mountains', '2021-10-09 14:37:15', '2021-10-09 07:37:15'),
(6, '123213', '<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>', 'samnl_51.jpg', '123213', '2021-10-09 14:37:08', '2021-10-09 07:37:08'),
(7, '23123', '<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>', 'samnl_50.jpg', '23123', '2021-10-09 14:37:00', '2021-10-09 07:37:00'),
(8, 'haha hihi', '<p>123123123123211323113</p>\r\n\r\n<p><input alt=\"\" src=\"/ckfinder/userfiles/images/about.jpg\" style=\"width: 1200px; height: 1200px;\" type=\"image\" /></p>', 'samnl_53.jpg', 'haha-hihi', '2021-10-09 15:40:31', '2021-10-09 08:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_date` date NOT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total_amount`, `status`, `transaction_date`, `note`, `name`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(3, 5000000, '1', '2021-10-08', '12312', '45345', '1231231312', '345435', '2021-10-09 13:27:52', '2021-10-08 08:07:02'),
(4, 5000000, '2', '2021-10-08', '12312', '45345', '1231231312', '345435', '2021-10-09 13:34:49', '2021-10-08 08:09:34'),
(5, 4200000, '3', '2021-10-08', '234', '235', '1232342342', '235235', '2021-10-09 13:34:51', '2021-10-08 08:11:36'),
(6, 2667567, '3', '2021-10-09', '12313', 'hhihihi', '0123456789', '33 Xô Viết Nghệ tĩnh, Đà Nẵng', '2021-10-09 13:56:40', '2021-10-09 06:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 3, 16, 3, 1200000, '2021-10-08 08:07:02', '2021-10-08 08:07:02'),
(2, 3, 15, 1, 1400000, '2021-10-08 08:07:02', '2021-10-08 08:07:02'),
(3, 4, 16, 3, 1200000, '2021-10-08 08:09:34', '2021-10-08 08:09:34'),
(4, 4, 15, 1, 1400000, '2021-10-08 08:09:34', '2021-10-08 08:09:34'),
(5, 5, 19, 2, 2100000, '2021-10-08 08:11:36', '2021-10-08 08:11:36'),
(6, 6, 21, 1, 567567, '2021-10-09 06:29:28', '2021-10-09 06:29:28'),
(7, 6, 19, 1, 2100000, '2021-10-09 06:29:29', '2021-10-09 06:29:29');

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
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promotion` int(11) DEFAULT NULL,
  `isdisplay` tinyint(1) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `name`, `description`, `price`, `slug`, `promotion`, `isdisplay`, `category_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, '345', 'pro vi', 'For more straightforward sizing in CSS, we switch the global box-sizing value from content-box to border-box. This ensures padding does not affect the final computed width of an element, but it can cause problems with some third party software like Google Maps and Google Custom Search Engine.', 10000, 'pro-vi', 5000, 2, 1, NULL, NULL, '2021-08-22 06:27:11', '2021-08-22 06:27:11'),
(4, '345345', '464563534', 'For more straightforward sizing in CSS, we switch the global box-sizing value from content-box to border-box. This ensures padding does not affect the final computed width of an element, but it can cause problems with some third party software like Google Maps and Google Custom Search Engine.', 345345, '464563534', NULL, 2, 1, NULL, NULL, '2021-08-22 06:29:06', '2021-08-22 06:29:06'),
(6, '12312', 'ẻtretert', 'For more straightforward sizing in CSS, we switch the global box-sizing value from content-box to border-box. This ensures padding does not affect the final computed width of an element, but it can cause problems with some third party software like Google Maps and Google Custom Search Engine.', 123, 'etretert', NULL, 2, 1, NULL, NULL, '2021-08-22 06:30:12', '2021-08-22 06:30:12'),
(8, '123123', 'Váy cưới siêu siêu siêu đẹp nhất VI', 'For more straightforward sizing in CSS, we switch the global box-sizing value from content-box to border-box. This ensures padding does not affect the final computed width of an element, but it can cause problems with some third party software like Google Maps and Google Custom Search Engine.', 123123, 'vay-cuoi-sieu-sieu-sieu-dep-nhat-vi', NULL, 2, 1, NULL, NULL, '2021-08-22 07:50:41', '2021-08-25 07:34:38'),
(10, 'VC001', 'Váy cưới siêu đẹp VI', 'For more straightforward sizing in CSS, we switch the global box-sizing value from content-box to border-box. This ensures padding does not affect the final computed width of an element, but it can cause problems with some third party software like Google Maps and Google Custom Search Engine.', 20000000, 'vay-cuoi-sieu-dep-vi', 100000, 2, 1, NULL, NULL, '2021-08-22 07:52:32', '2021-08-25 07:06:19'),
(11, 'v001', 'Vest 01 vi', 'Vest 01 vi', 2000000, 'vest-01-vi', 100000, 2, 1, NULL, NULL, '2021-09-06 06:27:43', '2021-09-06 06:27:56'),
(12, 've02', 'Vest  02 VI', 'Vest  02 VI', 2300000, 'vest-02-vi', NULL, 2, 1, NULL, NULL, '2021-09-06 06:28:55', '2021-09-06 07:44:05'),
(13, 've003', 'Vest  03 VI', 'Vest  03 VI', 1500000, 'vest-03-vi', NULL, 2, 1, NULL, NULL, '2021-09-06 06:29:36', '2021-09-06 07:43:55'),
(14, 've04', 'Vest  04 VI', 'Vest  04 VI', 4300000, 'vest-04-vi', NULL, 2, 1, NULL, NULL, '2021-09-06 06:30:06', '2021-09-06 06:30:06'),
(15, 've05', 'Vest  05 VI', 'Vest  05 VI', 1400000, 'vest-05-vi', NULL, 2, 1, NULL, NULL, '2021-09-06 06:32:30', '2021-09-06 06:32:30'),
(16, 'ad01', 'Ao dai 01 VI', '<p>Ao dai 01 VI</p>', 2500000, 'ao-dai-01-vi', 1200000, 2, 1, NULL, NULL, '2021-09-06 06:34:48', '2021-09-25 08:02:48'),
(17, 'ad02', 'Ao dai 02 VI', '<p>Ao dai 02 VI</p>', 4800000, 'ao-dai-02-vi', NULL, 2, 1, NULL, NULL, '2021-09-06 06:35:19', '2021-09-25 08:02:29'),
(18, 'ad03', 'Ao dai 03 VI', 'Ao dai 03 VI', 1700000, 'ao-dai-03-vi', NULL, 2, 1, NULL, NULL, '2021-09-06 06:35:51', '2021-09-06 06:35:51'),
(19, 'ad04', 'Ao dai 04 VI', '<p>Ao dai 04 VI</p>', 2100000, 'ao-dai-04-vi', NULL, 2, 1, NULL, NULL, '2021-09-06 06:36:48', '2021-09-25 08:02:08'),
(20, 'ad05', 'Ao dai 05 VI', '<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>', 2300000, 'ao-dai-05-vi', 1200000, 2, 1, NULL, NULL, '2021-09-06 06:37:47', '2021-10-07 06:14:38'),
(21, '567567', '567567', '<p>345245435</p>', 567567, '567567', 567567, 1, 1, NULL, NULL, '2021-10-03 06:50:31', '2021-10-09 07:04:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `introduction` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` decimal(22,2) DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_vi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_vi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name_vi`, `name_en`, `description_vi`, `description_en`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Tổ chức sự kiện', 'WE ORGANIZED EVENTS', 'Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.', 'Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.', 'icon-calendar', '2021-09-03 21:47:00', '2021-09-03 22:15:26'),
(2, 'Chụp ảnh', 'PHOTOSHOOT', 'Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.', 'Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.', 'icon-camera', '2021-09-03 23:04:43', '2021-09-03 23:04:43'),
(3, 'Chỉnh sửa video', 'VIDEO EDITING', 'Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.', 'Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.', 'icon-video', '2021-09-03 23:05:11', '2021-09-03 23:05:11');

-- --------------------------------------------------------

--
-- Table structure for table `shares`
--

CREATE TABLE `shares` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shares`
--

INSERT INTO `shares` (`id`, `title`, `content`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'cẩm nang', '<p>&nbsp;</p>\r\n\r\n<p><input alt=\"123\" src=\"/ckfinder/userfiles/images/about.jpg\" style=\"border-style: solid; border-width: 1px; height: 400px; margin: 2px; width: 500px;\" type=\"image\" /></p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>', 'samnl_56.jpg', 'cam-nang', '2021-10-09 15:30:39', '2021-10-09 08:30:39'),
(3, 'cẩm nang 2 ha', '<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>', 'samnl_55.jpg', 'cam-nang-2-ha', '2021-10-09 14:38:04', '2021-10-09 07:38:04'),
(5, '1241241241', '<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>JANUARY 12, 2016 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>', 'samnl_54.jpg', '1241241241', '2021-10-09 14:37:58', '2021-10-09 07:37:58'),
(6, 'hshs rưerwerwer', '<p>2112412441</p>', 'samnl_57.jpg', 'hshs-ruerwerwer', '2021-10-09 14:38:17', '2021-10-09 07:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$2h0UYZof0sZkxPpZvhhSL.cCpWY/ZBB3fKg3w2YaGN1rVGvdCLl6G', NULL, '2021-09-08 06:00:43', '2021-09-08 07:30:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_product_id_foreign` (`product_id`);

--
-- Indexes for table `infomations`
--
ALTER TABLE `infomations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_product_code_unique` (`product_code`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shares`
--
ALTER TABLE `shares`
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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `infomations`
--
ALTER TABLE `infomations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shares`
--
ALTER TABLE `shares`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
