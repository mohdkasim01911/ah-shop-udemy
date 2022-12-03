-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 02, 2022 at 06:17 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `udemys`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '2022-11-17 12:04:49', '$2y$10$MLYv.9CtKtM4hryN67FoC.fE/9ALYrvL77B8Fv920jHiUnecnVP4.', 'dmKk1TbaeLfkRkm3CkhRyDhP8wwblX4GUGhipB4NpNIuTFfNFAJT5HORsZdu', NULL, '202211191801mk.jpg', '2022-11-17 12:04:49', '2022-11-19 13:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `brand_models`
--

DROP TABLE IF EXISTS `brand_models`;
CREATE TABLE IF NOT EXISTS `brand_models` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_name_hin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_hin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand_models`
--

INSERT INTO `brand_models` (`id`, `brand_name_hin`, `brand_name_en`, `brand_slug_en`, `brand_slug_hin`, `brand_image`, `created_at`, `updated_at`) VALUES
(1, 'सैमसंग', 'Samsung', 'samsung', 'सैमसंग', 'upload/brand/1750552463195889.Samsung_logo.png', NULL, '2022-11-26 04:32:05'),
(2, 'सेब', 'Apple', 'apple', 'सेब', 'upload/brand/1750546750016441.Apple-Logo-PNG-Image-715x715.png', NULL, NULL),
(3, 'विवो', 'vivo', 'vivo', 'विवो', 'upload/brand/1750546795401425.vivo-Phone-logo.png', NULL, NULL),
(4, 'विपक्ष', 'oppp', 'oppp', 'विपक्ष', 'upload/brand/1750546853523732.Oppo-Logo.wine.png', NULL, NULL),
(5, 'हुवाई', 'huwei', 'huwei', 'हुवाई', 'upload/brand/1750546901720151.Huawei-Logo.wine.png', NULL, NULL),
(6, 'मील', 'Mi', 'mi', 'मील', 'upload/brand/1750546930909540.unnamed.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cat_name_hin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_slug_hin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name_hin`, `cat_name_en`, `cat_slug_en`, `cat_slug_hin`, `cat_icon`, `created_at`, `updated_at`) VALUES
(1, 'फैशन', 'Fashion', 'fashion', 'फैशन', 'fa fa-warning text-warning', NULL, NULL),
(2, 'इलेक्ट्रानिक्स', 'Electronics', 'electronics', 'इलेक्ट्रानिक्स', 'fa fa-shopping-cart text-success', NULL, NULL),
(3, 'प्यारा घर', 'Sweet Home', 'sweet-home', 'प्यारा-घर', 'fa fa-users text-danger', NULL, NULL),
(4, 'उपकरण', 'Appliances', 'appliances', 'उपकरण', 'fa fa-warning text-warning', NULL, NULL),
(5, 'सुंदरता', 'Beauty', 'beauty', 'सुंदरता', 'fa fa-users text-danger', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_11_17_165542_create_sessions_table', 1),
(7, '2022_11_17_171857_create_admins_table', 2),
(8, '2022_11_22_172443_create_brand_models_table', 3),
(9, '2022_11_26_111819_create_categories_table', 4),
(10, '2022_11_26_125137_create_sub_categories_table', 5),
(11, '2022_11_29_181107_create_subsub_categories_table', 6),
(12, '2022_12_02_143204_create_products_table', 7),
(13, '2022_12_02_144552_create_multiimages_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `multiimages`
--

DROP TABLE IF EXISTS `multiimages`;
CREATE TABLE IF NOT EXISTS `multiimages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `photo_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('student123kasim@gmail.com', '$2y$10$UC38guwbrCl/L1BZbeU5QOXmFmpz33/xx/pcbeBvm19vQ0enzR2t.', '2022-11-21 07:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_id` int(11) NOT NULL,
  `product_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_hin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_hin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_hin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size_hin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color_hin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_selling_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_discont_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc_hin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc_hin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thambnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `special_offer` int(11) DEFAULT NULL,
  `special_deals` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('hmIShdWIh5tFtlKrLXhOCHarniyKSizouk1UFbXb', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiNjJIYThhWFVBeVNIcFV3Q2NaWnlsSTJSVmxBcWtobUJWeHNXYkdDQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9zdWJzdWJjYXRlZ29yeS92aWV3Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjE5OiJwYXNzd29yZF9oYXNoX2FkbWluIjtzOjYwOiIkMnkkMTAkTUxZdi45Q3RLdE00aHJ5TjY3Rm9DLmZFLzlBTFlydkw3N0I4RnY5MjBqSGlVbmVjblZQNC4iO30=', 1670004991);

-- --------------------------------------------------------

--
-- Table structure for table `subsub_categories`
--

DROP TABLE IF EXISTS `subsub_categories`;
CREATE TABLE IF NOT EXISTS `subsub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_name_hin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_hin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subsub_categories`
--

INSERT INTO `subsub_categories` (`id`, `category_id`, `subcategory_id`, `subsubcategory_name_en`, `subsubcategory_name_hin`, `subsubcategory_slug_en`, `subsubcategory_slug_hin`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Mans Tshirt', 'मैन्स टीशर्ट', 'मैन्स-टीशर्ट', 'mans-tshirt', NULL, NULL),
(2, 1, 1, 'Mans Casual Shirts', 'मैन्स कैजुअल शर्ट्स', 'मैन्स-कैजुअल-शर्ट्स', 'mans-casual-shirts', NULL, NULL),
(3, 1, 1, 'Mans Kurtas', 'मैन्स कुर्ते', 'मैन्स-कुर्ते', 'mans-kurtas', NULL, NULL),
(4, 1, 2, 'Mans Jeans', 'मैन्स जीन्स', 'मैन्स-जीन्स', 'mans-jeans', NULL, NULL),
(5, 1, 2, 'Mans Trousers', 'पुरुषों की पतलून', 'पुरुषों-की-पतलून', 'mans-trousers', NULL, NULL),
(6, 1, 2, 'Mans Cargos', 'मैन्स कार्गोस', 'मैन्स-कार्गोस', 'mans-cargos', NULL, NULL),
(7, 1, 3, 'Mans Sports Shoes', 'पुरुषों के खेल के जूते', 'पुरुषों-के-खेल-के-जूते', 'mans-sports-shoes', NULL, '2022-12-02 12:30:22'),
(8, 1, 3, 'Mans Casual Shoes', 'मैन्स कैजुअल शूज', 'मैन्स-कैजुअल-शूज', 'mans-casual-shoes', NULL, NULL),
(9, 1, 3, 'Mans Formal Shoes', 'मैंस औपचारिक जूते', 'मैंस-औपचारिक-जूते', 'mans-formal-shoes', NULL, NULL),
(10, 1, 4, 'Women Flats', 'महिला फ्लैट', 'महिला-फ्लैट', 'women-flats', NULL, NULL),
(11, 1, 4, 'Women Heels', 'महिला ऊँची एड़ी के जूते', 'महिला-ऊँची-एड़ी-के-जूते', 'women-heels', NULL, NULL),
(12, 1, 4, 'Woman Sheakers', 'महिला शेखर', 'महिला-शेखर', 'woman-sheakers', NULL, NULL),
(13, 2, 5, 'Printers', 'प्रिंटर', 'प्रिंटर', 'printers', NULL, NULL),
(14, 2, 5, 'Monitors', 'मॉनिटर्स', 'मॉनिटर्स', 'monitors', NULL, NULL),
(15, 2, 5, 'Projectors', 'प्रोजेक्टर', 'प्रोजेक्टर', 'projectors', NULL, NULL),
(16, 2, 6, 'Plain Cases', 'सादा मामले', 'सादा-मामले', 'plain-cases', NULL, NULL),
(17, 2, 6, 'Designer Cases', 'डिजाइनर मामले', 'डिजाइनर-मामले', 'designer-cases', NULL, NULL),
(18, 2, 6, 'Screen Guards', 'स्क्रीन गार्ड', 'स्क्रीन-गार्ड', 'screen-guards', NULL, NULL),
(19, 2, 7, 'Gaming Mouse', 'गेमिंग माउस', 'गेमिंग-माउस', 'gaming-mouse', NULL, NULL),
(20, 2, 7, 'Gaming Keyboars', 'गेमिंग कीबोर्ड', 'गेमिंग-कीबोर्ड', 'gaming-keyboars', NULL, NULL),
(21, 2, 7, 'Gaming Mousepads', 'गेमिंग माउसपैड', 'गेमिंग-माउसपैड', 'gaming-mousepads', NULL, NULL),
(22, 3, 8, 'Bed Liners', 'बेड लाइनर्स', 'बेड-लाइनर्स', 'bed-liners', NULL, NULL),
(23, 3, 8, 'Bedsheets', 'चादरें', 'चादरें', 'bedsheets', NULL, NULL),
(24, 3, 8, 'Blankets', 'कंबल', 'कंबल', 'blankets', NULL, NULL),
(25, 3, 9, 'Tv Units', 'टीवी इकाइयां', 'टीवी-इकाइयां', 'tv-units', NULL, NULL),
(26, 3, 8, 'Dining Sets', 'डाइनिंग सेट', 'डाइनिंग-सेट', 'dining-sets', NULL, NULL),
(27, 3, 9, 'Coffee Tables', 'कॉफी टेबल्स', 'कॉफी-टेबल्स', 'coffee-tables', NULL, NULL),
(28, 3, 10, 'Lightings', 'रोशनी', 'रोशनी', 'lightings', NULL, NULL),
(29, 3, 10, 'Clocks', 'घड़ियाँ', 'घड़ियाँ', 'clocks', NULL, NULL),
(30, 3, 10, 'Wall Decor', 'दीवार की सजावट', 'दीवार-की-सजावट', 'wall-decor', NULL, NULL),
(31, 4, 11, 'Big Screen TVs', 'बिग स्क्रीन टीवी', 'बिग-स्क्रीन-टीवी', 'big-screen-tvs', NULL, NULL),
(32, 4, 11, 'Smart TVs', 'स्मार्ट टीवी', 'स्मार्ट-टीवी', 'smart-tvs', NULL, NULL),
(33, 4, 11, 'OLED TVs', 'ओएलईडी टीवी', 'ओएलईडी-टीवी', 'oled-tvs', NULL, NULL),
(34, 4, 12, 'Washer Dryers', 'वॉशर ड्रायर', 'वॉशर-ड्रायर', 'washer-dryers', NULL, NULL),
(35, 4, 12, 'Washer Only', 'केवल वॉशर', 'केवल-वॉशर', 'washer-only', NULL, NULL),
(36, 4, 12, 'Energy Efficient', 'ऊर्जा कुशल', 'ऊर्जा-कुशल', 'energy-efficient', NULL, NULL),
(37, 4, 13, 'Single Door', 'सिंगल डोर', 'सिंगल-डोर', 'single-door', NULL, '2022-12-02 12:42:52'),
(38, 4, 13, 'Double Door', 'डबल डोर', 'डबल-डोर', 'double-door', NULL, NULL),
(39, 4, 13, 'Mini Rerigerators', 'मिनी रिगरेटर्स', 'मिनी-रिगरेटर्स', 'mini-rerigerators', NULL, NULL),
(40, 5, 14, 'Eys Makeup', 'ईज़ मेकअप', 'ईज़-मेकअप', 'eys-makeup', NULL, NULL),
(41, 5, 14, 'Lip Makeup', 'लिप मेकअप', 'लिप-मेकअप', 'lip-makeup', NULL, NULL),
(42, 5, 14, 'Hair Care', 'बालों की देखभाल', 'बालों-की-देखभाल', 'hair-care', NULL, NULL),
(43, 5, 15, 'Beverages', 'पेय पदार्थ', 'पेय-पदार्थ', 'beverages', NULL, NULL),
(44, 5, 14, 'Chocolates', 'चॉकलेट', 'चॉकलेट', 'chocolates', NULL, NULL),
(45, 5, 14, 'Snacks', 'स्नैक्स', 'स्नैक्स', 'snacks', NULL, NULL),
(46, 5, 16, 'Baby Diapers', 'बेबी डायपर', 'बेबी-डायपर', 'baby-diapers', NULL, NULL),
(47, 5, 16, 'Baby Wipes', 'बेबी वाइप्स', 'बेबी-वाइप्स', 'baby-wipes', NULL, NULL),
(48, 5, 16, 'Baby Food', 'बेबी फूड', 'बेबी-फूड', 'baby-food', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcat_name_hin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcat_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcat_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcat_slug_hin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcat_name_hin`, `subcat_name_en`, `subcat_slug_en`, `subcat_slug_hin`, `created_at`, `updated_at`) VALUES
(1, '1', 'मैन्स टॉप वेयर', 'Mans Top Ware', 'मैन्स-टॉप-वेयर', 'mans-top-ware', NULL, NULL),
(2, '1', 'मैन्स बॉटम वेयर', 'Mans Bottom Ware', 'मैन्स-बॉटम-वेयर', 'mans-bottom-ware', NULL, NULL),
(3, '1', 'पुरुषों के जूते', 'Mans Footwear', 'पुरुषों-के-जूते', 'mans-footwear', NULL, NULL),
(4, '1', 'महिलाओं के जूते', 'Women Footwear', 'महिलाओं-के-जूते', 'women-footwear', NULL, NULL),
(5, '2', 'कंप्यूटर बाह्य उपकरणों', 'Computer Peripherals', 'कंप्यूटर-बाह्य-उपकरणों', 'computer-peripherals', NULL, NULL),
(6, '2', 'मोबाइल एक्सेसरी', 'Mobile Accessory', 'मोबाइल-एक्सेसरी', 'mobile-accessory', NULL, NULL),
(7, '2', 'गेमिंग', 'Gaming', 'गेमिंग', 'gaming', NULL, NULL),
(8, '3', 'गृह सामान', 'Home Furnishings', 'गृह-सामान', 'home-furnishings', NULL, NULL),
(9, '3', 'लिविंग रूम', 'Living Room', 'लिविंग-रूम', 'living-room', NULL, NULL),
(10, '3', 'घर की सजावट', 'Home Decor', 'घर-की-सजावट', 'home-decor', NULL, NULL),
(11, '4', 'टेलीविजन', 'Televisions', 'टेलीविजन', 'televisions', NULL, NULL),
(12, '4', 'वाशिंग मशीन', 'Washing Machines', 'वाशिंग-मशीन', 'washing-machines', NULL, NULL),
(13, '4', 'रेफ्रिजरेटर', 'Refrigerators', 'रेफ्रिजरेटर', 'refrigerators', NULL, NULL),
(14, '5', 'सौंदर्य और व्यक्तिगत देखभाल', 'Beauty and Personal Care', 'सौंदर्य-और-व्यक्तिगत-देखभाल', 'beauty-and-personal-care', NULL, NULL),
(15, '5', 'भोजन और पेय', 'Food and Drinks', 'भोजन-और-पेय', 'food-and-drinks', NULL, NULL),
(16, '5', 'खराब देखभाल', 'Bady Care', 'खराब-देखभाल', 'bady-care', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'kasim raza', 'student123kasim@gmail.com', '8304832483', NULL, '$2y$10$klD1xbjQTequ/2oGtSKR7.0Vdh0ZxrSLCabsAjbjJ2NTuOOHHfAZW', NULL, NULL, NULL, 'qo0cQKAym1Sw9fCmIo87c82FO5uVe1LxN3tDLtoJyokvTWCEqwaTRfg10KnF', NULL, '202211201637mk.jpg', '2022-11-17 11:33:06', '2022-11-21 12:36:59'),
(2, 'user', 'user@gmail.com', '8923244846', NULL, '$2y$10$bp9O.qFT9WVlIE5UwBbc/Ohpf5UlmKDsYhu75oHW22h1901FfCwcO', NULL, NULL, NULL, 'pLziyjmmAHQLBrDkKczk882Br6xcaYTR0lGRSg5v55WsBkDRuhqN1wEoxWD5', NULL, NULL, '2022-11-20 02:07:27', '2022-11-20 02:44:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
