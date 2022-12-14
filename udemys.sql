-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 24, 2022 at 07:31 AM
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
(1, 'admin', 'admin@gmail.com', '2022-11-17 12:04:49', '$2y$10$MLYv.9CtKtM4hryN67FoC.fE/9ALYrvL77B8Fv920jHiUnecnVP4.', 'WCwe4ZcmLGxQl2b0T2eO00NSH8VRzpPSx9ZW9XQ2nHzUJIFaOPOVU2SinsUr', NULL, '202211191801mk.jpg', '2022-11-17 12:04:49', '2022-11-19 13:26:16');

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
(1, '??????????????????', 'Samsung', 'samsung', '??????????????????', 'upload/brand/1750552463195889.Samsung_logo.png', NULL, '2022-11-26 04:32:05'),
(2, '?????????', 'Apple', 'apple', '?????????', 'upload/brand/1750546750016441.Apple-Logo-PNG-Image-715x715.png', NULL, NULL),
(3, '????????????', 'vivo', 'vivo', '????????????', 'upload/brand/1750546795401425.vivo-Phone-logo.png', NULL, NULL),
(4, '??????????????????', 'oppp', 'oppp', '??????????????????', 'upload/brand/1750546853523732.Oppo-Logo.wine.png', NULL, NULL),
(5, '???????????????', 'huwei', 'huwei', '???????????????', 'upload/brand/1750546901720151.Huawei-Logo.wine.png', NULL, NULL),
(6, '?????????', 'Mi', 'mi', '?????????', 'upload/brand/1750546930909540.unnamed.png', NULL, NULL);

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
(1, '????????????', 'Fashion', 'fashion', '????????????', 'fa fa-warning text-warning', NULL, NULL),
(2, '??????????????????????????????????????????', 'Electronics', 'electronics', '??????????????????????????????????????????', 'fa fa-shopping-cart text-success', NULL, NULL),
(3, '?????????????????? ??????', 'Sweet Home', 'sweet-home', '??????????????????-??????', 'fa fa-users text-danger', NULL, NULL),
(4, '???????????????', 'Appliances', 'appliances', '???????????????', 'fa fa-warning text-warning', NULL, NULL),
(5, '?????????????????????', 'Beauty', 'beauty', '?????????????????????', 'fa fa-users text-danger', NULL, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(13, '2022_12_02_144552_create_multiimages_table', 7),
(14, '2022_12_08_104915_create_sliders_table', 8),
(15, '2022_12_24_072310_create_wishlists_table', 9);

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
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multiimages`
--

INSERT INTO `multiimages` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(12, 4, 'upload/products/multimage/1751659232613602.IMG_20201213_191851.jpg', '2022-12-08 09:43:41', NULL),
(11, 3, 'upload/products/multimage/1751659138182000.IMG-20180815-WA0020.jpg', '2022-12-08 09:42:11', NULL),
(10, 3, 'upload/products/multimage/1751659137919562.IMG-20180815-WA0019.jpg', '2022-12-08 09:42:11', NULL),
(9, 3, 'upload/products/multimage/1751659137685181.IMG-20180815-WA0018.jpg', '2022-12-08 09:42:10', NULL),
(5, 2, 'upload/products/multimage/1751134479411093.l-thmaskgreen-s-the-fashionplus-original-imafy6gsrbxgxyqb.webp', '2022-12-02 14:42:57', NULL),
(6, 2, 'upload/products/multimage/1751134479700837.m-thmaskgreen-s-thefashionplus-original-imagfrwt7ae2vw2j.webp', '2022-12-02 14:42:58', NULL),
(7, 2, 'upload/products/multimage/1751134480016482.l-thmaskgreen-s-the-fashionplus-original-imafy6gsabbe2fug.webp', '2022-12-02 14:42:58', NULL),
(8, 2, 'upload/products/multimage/1751134480300886.m-thmaskgreen-s-thefashionplus-original-imagfrwteg6pgy8f.webp', '2022-12-02 14:42:58', NULL),
(13, 4, 'upload/products/multimage/1751659233318454.IMG_20201213_200032.jpg', '2022-12-08 09:43:42', NULL),
(14, 4, 'upload/products/multimage/1751659234075242.IMG_20201213_200042.jpg', '2022-12-08 09:43:43', NULL),
(15, 5, 'upload/products/multimage/1751659310532643.IMG_20210107_100046.jpg', '2022-12-08 09:44:56', NULL),
(16, 5, 'upload/products/multimage/1751659311445326.IMG_20210107_100824.jpg', '2022-12-08 09:44:57', NULL),
(17, 5, 'upload/products/multimage/1751659312092877.IMG_20210107_100847.jpg', '2022-12-08 09:44:57', NULL),
(18, 6, 'upload/products/multimage/1751659476891207.IMG_20201214_181856.jpg', '2022-12-08 09:47:36', NULL),
(19, 6, 'upload/products/multimage/1751659478845792.IMG_20201214_181940.jpg', '2022-12-08 09:47:37', NULL),
(20, 6, 'upload/products/multimage/1751659480790526.IMG_20201214_182044.jpg', '2022-12-08 09:47:39', NULL),
(21, 7, 'upload/products/multimage/1751659564587821.IMG_20210108_175450.jpg', '2022-12-08 09:48:58', NULL),
(22, 7, 'upload/products/multimage/1751659565473915.IMG_20210108_175530.jpg', '2022-12-08 09:48:59', NULL),
(23, 7, 'upload/products/multimage/1751659566116114.IMG_20210108_175903.jpg', '2022-12-08 09:48:59', NULL),
(24, 8, 'upload/products/multimage/1751659632691340.IMG_20210108_174926.jpg', '2022-12-08 09:50:03', NULL),
(25, 8, 'upload/products/multimage/1751659633574353.IMG-20200817-WA0006.jpg', '2022-12-08 09:50:03', NULL),
(26, 8, 'upload/products/multimage/1751659633746114.IMG-20200817-WA0007.jpg', '2022-12-08 09:50:04', NULL);

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
  `product_selling_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_discont_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc_hin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc_hin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thambnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `special_offer` int(11) DEFAULT NULL,
  `special_deals` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `product_name_en`, `product_name_hin`, `product_slug_en`, `product_slug_hin`, `product_code`, `product_qty`, `product_tags_en`, `product_tags_hin`, `product_size_en`, `product_size_hin`, `product_color_en`, `product_color_hin`, `product_selling_price`, `product_discont_price`, `short_desc_en`, `short_desc_hin`, `long_desc_en`, `long_desc_hin`, `product_thambnail`, `hot_deals`, `featured`, `special_offer`, `special_deals`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 2, 6, 'test1', 'dsf', 'test1', 'dsf', '123', '2', 'cron neck', 'cron neck', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', '300', '100', 'dksfsdk', 'zxmc nxc', '<p>czxcszxzxzx</p>', '<p>zxczxc</p>', 'upload/products/thumbnails/1751659137443995.IMG-20180815-WA0031.jpg', 1, 1, NULL, 1, 1, '2022-12-12 10:29:44', '2022-12-12 10:29:44'),
(4, 2, 1, 3, 9, 'saasd', 'sadasd', 'saasd', 'sadasd', '12455', '1221', 'test', 'test', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', '3455', '123', 'dsfsdfsa', 'sadasd', '<p>sadasd</p>', '<p>asdasd</p>', 'upload/products/thumbnails/1751659231848769.IMG_20201213_200033.jpg', 1, 1, NULL, 1, 1, '2022-12-08 09:43:41', NULL),
(5, 3, 3, 10, 29, 'were', 'wewer', 'were', 'wewer', '2345', '454', 'round neck', 'round neck', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', '233', '123', 'sfdfsf', 'sdfsdf', '<p>zXzx</p>', '<p>asasd</p>', 'upload/products/thumbnails/1751659309419231.IMG_20201213_201753_Bokeh.jpg', NULL, 1, NULL, NULL, 1, '2022-12-12 10:29:08', '2022-12-12 10:29:08'),
(6, 2, 2, 5, 13, 'asdasd', 'aasd', 'asdasd', 'aasd', '1234', '2', 'round neck', 'round neck', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', '499', '100', 'sdfsdf', 'sdfsdf', '<p>sadasd</p>', '<p>asdas</p>', 'upload/products/thumbnails/1751659475810026.IMG_20201213_201753_Bokeh.jpg', NULL, 1, 1, 1, 1, '2022-12-12 10:27:50', '2022-12-12 10:27:50'),
(7, 3, 2, 6, 16, 'qwwqewq', 'asdasd', 'qwwqewq', 'asdasd', '5678', '3', 'test', 'test', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', '1234', '44', 'aasd', 'adasd', '<p>sdasd</p>', '<p>adasd</p>', 'upload/products/thumbnails/1751659563786111.IMG_20201214_181211.jpg', 1, 1, 1, NULL, 1, '2022-12-08 09:48:57', NULL),
(8, 5, 1, 2, 6, 'sdadd', 'asdad', 'sdadd', 'asdad', '3456', '0', 'test', 'test', NULL, 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', '12345', '456', 'zasxsd', 'asdasdas', '<p>sadsad</p>', '<p>asdas</p>', 'upload/products/thumbnails/1751659631701951.IMG20201012213525_00.jpg', NULL, 1, 1, 1, 1, '2022-12-10 12:59:42', '2022-12-10 12:59:42'),
(2, 1, 1, 1, 1, 'Men mask Solid Hooded Neck Dark Green T-Shirt', '????????? ??????????????? ??????????????? ??????????????? ????????? ??????????????? ??????????????? ??????-????????????', 'men-mask-solid-hooded-neck-dark-green-t-shirt', '?????????-???????????????-???????????????-???????????????-?????????-???????????????-???????????????-??????-????????????', '123', '4', 'round neck', 'round neck', NULL, 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', '599', '199', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less', '?????? ?????? ???????????? ????????? ?????? ????????????????????? ???????????? ?????? ?????? ???????????? ??????????????? ?????? ??????????????? ?????? ??????????????? ????????? ?????? ???????????? ?????? ??????????????? ????????????????????? ?????? ?????????????????? ?????? ?????????????????? ??????????????? ??????????????? ?????? ??????????????? ???????????? ?????? ??????????????? ?????? ?????? ?????? ??????????????? ????????????????????? ?????? ???????????? ?????? ?????? ????????????????????? ??????????????? ??????,', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)</p>', '<pre>\r\n?????? ?????? ???????????? ????????? ?????? ????????????????????? ???????????? ?????? ?????? ???????????? ??????????????? ?????? ??????????????? ?????? ??????????????? ????????? ?????? ???????????? ?????? ??????????????? ????????????????????? ?????? ?????????????????? ?????? ?????????????????? ??????????????? ??????????????? ?????? ??????????????? ???????????? ?????? ??????????????? ?????? ?????? ?????? ??????????????? ????????????????????? ?????? ???????????? ?????? ?????? ????????????????????? ??????????????? ??????, ?????? &#39;????????????????????? ????????????, ????????????????????? ????????????&#39; ?????? ??????????????? ???????????? ?????? ?????????????????? ??????, ??????????????? ?????? ??????????????? ???????????????????????? ???????????? ??????????????? ????????? ?????? ???????????????????????? ??????????????????????????? ??????????????? ?????? ????????? ????????? ??????????????? ?????? ???????????? ???????????????????????? ???????????? ????????????????????? ?????? ????????? ????????? ??????????????? ??????????????? ?????? ??????????????? ???????????? ?????????, ?????? &#39;??????????????? ???????????????&#39; ?????? ????????? ?????? ?????? ????????? ?????????????????? ?????? ????????? ??????????????? ?????? ????????? ?????? ???????????? ??????????????????????????? ?????????????????? ????????? ???????????? ?????????????????? ????????? ?????? ????????????????????? ?????????????????? ????????? ?????????, ?????????-????????? ???????????????????????? ??????, ?????????-????????? ???????????????????????? ?????? (???????????????????????? ?????????????????? ?????? ????????? ?????????)</pre>', 'upload/products/thumbnails/1751134479140975.m-thmaskgreen-s-thefashionplus-original-imagfrwteg6pgy8f.webp', NULL, NULL, 1, NULL, 1, '2022-12-12 10:28:43', '2022-12-12 10:28:43');

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
('Jsvg31bWRJULHVwWwl4lQdcEv5PmxCfe6v4VF3Xx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNEJLUTRBTTk4NmRXQ1pwUldFUDlTUmNxMnNNS28wYUNjeURURG8wRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NDoiY2FydCI7YToxOntzOjc6ImRlZmF1bHQiO086Mjk6IklsbHVtaW5hdGVcU3VwcG9ydFxDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjA6e31zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fX19', 1671821216),
('kokIPzzsnNFc0yD3MaL9bA4RDbwS7yROQnGztzCo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidG9VYTh2aEFYSGtSajhsZFEwQ1I1MFJUM3FIQmtuRWR0Z1VQb0h1eCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1671866076);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slider_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_image`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'upload/slider/1751645973364311.bf384e8c71ac4bb0f54891ecf2295b9a.jpg', 'slider update check', 'this is test slider', 1, NULL, '2022-12-08 06:12:56'),
(3, 'upload/slider/1751651155842679.0d3f9452916609.5921c4e206fcc.jpg', 'second', 'this is second slider', 1, NULL, NULL),
(4, 'upload/slider/1751651770423033.ecommerce_women_s_clothing_banner_template_27_1200x628.jpg', 'third', 'this is third slider check texr', 1, NULL, NULL);

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
(1, 1, 1, 'Mans Tshirt', '??????????????? ??????????????????', '???????????????-??????????????????', 'mans-tshirt', NULL, NULL),
(2, 1, 1, 'Mans Casual Shirts', '??????????????? ?????????????????? ??????????????????', '???????????????-??????????????????-??????????????????', 'mans-casual-shirts', NULL, NULL),
(3, 1, 1, 'Mans Kurtas', '??????????????? ??????????????????', '???????????????-??????????????????', 'mans-kurtas', NULL, NULL),
(4, 1, 2, 'Mans Jeans', '??????????????? ???????????????', '???????????????-???????????????', 'mans-jeans', NULL, NULL),
(5, 1, 2, 'Mans Trousers', '????????????????????? ?????? ???????????????', '?????????????????????-??????-???????????????', 'mans-trousers', NULL, NULL),
(6, 1, 2, 'Mans Cargos', '??????????????? ?????????????????????', '???????????????-?????????????????????', 'mans-cargos', NULL, NULL),
(7, 1, 3, 'Mans Sports Shoes', '????????????????????? ?????? ????????? ?????? ????????????', '?????????????????????-??????-?????????-??????-????????????', 'mans-sports-shoes', NULL, '2022-12-02 12:30:22'),
(8, 1, 3, 'Mans Casual Shoes', '??????????????? ?????????????????? ?????????', '???????????????-??????????????????-?????????', 'mans-casual-shoes', NULL, NULL),
(9, 1, 3, 'Mans Formal Shoes', '???????????? ????????????????????? ????????????', '????????????-?????????????????????-????????????', 'mans-formal-shoes', NULL, NULL),
(10, 1, 4, 'Women Flats', '??????????????? ???????????????', '???????????????-???????????????', 'women-flats', NULL, NULL),
(11, 1, 4, 'Women Heels', '??????????????? ???????????? ???????????? ?????? ????????????', '???????????????-????????????-????????????-??????-????????????', 'women-heels', NULL, NULL),
(12, 1, 4, 'Woman Sheakers', '??????????????? ????????????', '???????????????-????????????', 'woman-sheakers', NULL, NULL),
(13, 2, 5, 'Printers', '?????????????????????', '?????????????????????', 'printers', NULL, NULL),
(14, 2, 5, 'Monitors', '????????????????????????', '????????????????????????', 'monitors', NULL, NULL),
(15, 2, 5, 'Projectors', '??????????????????????????????', '??????????????????????????????', 'projectors', NULL, NULL),
(16, 2, 6, 'Plain Cases', '???????????? ???????????????', '????????????-???????????????', 'plain-cases', NULL, NULL),
(17, 2, 6, 'Designer Cases', '????????????????????? ???????????????', '?????????????????????-???????????????', 'designer-cases', NULL, NULL),
(18, 2, 6, 'Screen Guards', '????????????????????? ???????????????', '?????????????????????-???????????????', 'screen-guards', NULL, NULL),
(19, 2, 7, 'Gaming Mouse', '?????????????????? ????????????', '??????????????????-????????????', 'gaming-mouse', NULL, NULL),
(20, 2, 7, 'Gaming Keyboars', '?????????????????? ?????????????????????', '??????????????????-?????????????????????', 'gaming-keyboars', NULL, NULL),
(21, 2, 7, 'Gaming Mousepads', '?????????????????? ?????????????????????', '??????????????????-?????????????????????', 'gaming-mousepads', NULL, NULL),
(22, 3, 8, 'Bed Liners', '????????? ?????????????????????', '?????????-?????????????????????', 'bed-liners', NULL, NULL),
(23, 3, 8, 'Bedsheets', '??????????????????', '??????????????????', 'bedsheets', NULL, NULL),
(24, 3, 8, 'Blankets', '????????????', '????????????', 'blankets', NULL, NULL),
(25, 3, 9, 'Tv Units', '???????????? ?????????????????????', '????????????-?????????????????????', 'tv-units', NULL, NULL),
(26, 3, 8, 'Dining Sets', '????????????????????? ?????????', '?????????????????????-?????????', 'dining-sets', NULL, NULL),
(27, 3, 9, 'Coffee Tables', '???????????? ??????????????????', '????????????-??????????????????', 'coffee-tables', NULL, NULL),
(28, 3, 10, 'Lightings', '???????????????', '???????????????', 'lightings', NULL, NULL),
(29, 3, 10, 'Clocks', '?????????????????????', '?????????????????????', 'clocks', NULL, NULL),
(30, 3, 10, 'Wall Decor', '??????????????? ?????? ???????????????', '???????????????-??????-???????????????', 'wall-decor', NULL, NULL),
(31, 4, 11, 'Big Screen TVs', '????????? ????????????????????? ????????????', '?????????-?????????????????????-????????????', 'big-screen-tvs', NULL, NULL),
(32, 4, 11, 'Smart TVs', '????????????????????? ????????????', '?????????????????????-????????????', 'smart-tvs', NULL, NULL),
(33, 4, 11, 'OLED TVs', '?????????????????? ????????????', '??????????????????-????????????', 'oled-tvs', NULL, NULL),
(34, 4, 12, 'Washer Dryers', '???????????? ??????????????????', '????????????-??????????????????', 'washer-dryers', NULL, NULL),
(35, 4, 12, 'Washer Only', '???????????? ????????????', '????????????-????????????', 'washer-only', NULL, NULL),
(36, 4, 12, 'Energy Efficient', '??????????????? ????????????', '???????????????-????????????', 'energy-efficient', NULL, NULL),
(37, 4, 13, 'Single Door', '??????????????? ?????????', '???????????????-?????????', 'single-door', NULL, '2022-12-02 12:42:52'),
(38, 4, 13, 'Double Door', '????????? ?????????', '?????????-?????????', 'double-door', NULL, NULL),
(39, 4, 13, 'Mini Rerigerators', '???????????? ???????????????????????????', '????????????-???????????????????????????', 'mini-rerigerators', NULL, NULL),
(40, 5, 14, 'Eys Makeup', '????????? ???????????????', '?????????-???????????????', 'eys-makeup', NULL, NULL),
(41, 5, 14, 'Lip Makeup', '????????? ???????????????', '?????????-???????????????', 'lip-makeup', NULL, NULL),
(42, 5, 14, 'Hair Care', '??????????????? ?????? ??????????????????', '???????????????-??????-??????????????????', 'hair-care', NULL, NULL),
(43, 5, 15, 'Beverages', '????????? ??????????????????', '?????????-??????????????????', 'beverages', NULL, NULL),
(44, 5, 14, 'Chocolates', '??????????????????', '??????????????????', 'chocolates', NULL, NULL),
(45, 5, 14, 'Snacks', '?????????????????????', '?????????????????????', 'snacks', NULL, NULL),
(46, 5, 16, 'Baby Diapers', '???????????? ???????????????', '????????????-???????????????', 'baby-diapers', NULL, NULL),
(47, 5, 16, 'Baby Wipes', '???????????? ??????????????????', '????????????-??????????????????', 'baby-wipes', NULL, NULL),
(48, 5, 16, 'Baby Food', '???????????? ?????????', '????????????-?????????', 'baby-food', NULL, NULL);

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
(1, '1', '??????????????? ????????? ????????????', 'Mans Top Ware', '???????????????-?????????-????????????', 'mans-top-ware', NULL, NULL),
(2, '1', '??????????????? ???????????? ????????????', 'Mans Bottom Ware', '???????????????-????????????-????????????', 'mans-bottom-ware', NULL, NULL),
(3, '1', '????????????????????? ?????? ????????????', 'Mans Footwear', '?????????????????????-??????-????????????', 'mans-footwear', NULL, NULL),
(4, '1', '????????????????????? ?????? ????????????', 'Women Footwear', '?????????????????????-??????-????????????', 'women-footwear', NULL, NULL),
(5, '2', '???????????????????????? ??????????????? ?????????????????????', 'Computer Peripherals', '????????????????????????-???????????????-?????????????????????', 'computer-peripherals', NULL, NULL),
(6, '2', '?????????????????? ????????????????????????', 'Mobile Accessory', '??????????????????-????????????????????????', 'mobile-accessory', NULL, NULL),
(7, '2', '??????????????????', 'Gaming', '??????????????????', 'gaming', NULL, NULL),
(8, '3', '????????? ???????????????', 'Home Furnishings', '?????????-???????????????', 'home-furnishings', NULL, NULL),
(9, '3', '?????????????????? ?????????', 'Living Room', '??????????????????-?????????', 'living-room', NULL, NULL),
(10, '3', '?????? ?????? ???????????????', 'Home Decor', '??????-??????-???????????????', 'home-decor', NULL, NULL),
(11, '4', '????????????????????????', 'Televisions', '????????????????????????', 'televisions', NULL, NULL),
(12, '4', '?????????????????? ????????????', 'Washing Machines', '??????????????????-????????????', 'washing-machines', NULL, NULL),
(13, '4', '?????????????????????????????????', 'Refrigerators', '?????????????????????????????????', 'refrigerators', NULL, NULL),
(14, '5', '????????????????????? ?????? ??????????????????????????? ??????????????????', 'Beauty and Personal Care', '?????????????????????-??????-???????????????????????????-??????????????????', 'beauty-and-personal-care', NULL, NULL),
(15, '5', '???????????? ?????? ?????????', 'Food and Drinks', '????????????-??????-?????????', 'food-and-drinks', NULL, NULL),
(16, '5', '???????????? ??????????????????', 'Bady Care', '????????????-??????????????????', 'bady-care', NULL, NULL);

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
(1, 'kasim raza', 'student123kasim@gmail.com', '8304832483', NULL, '$2y$10$klD1xbjQTequ/2oGtSKR7.0Vdh0ZxrSLCabsAjbjJ2NTuOOHHfAZW', NULL, NULL, NULL, 'wOIflbJ2hF8DKcYd5mvf4Pz5kxglfdziHsJoF5QKf5c4nIBlmOGclYnx9YjZ', NULL, '202211201637mk.jpg', '2022-11-17 11:33:06', '2022-11-21 12:36:59'),
(2, 'user', 'user@gmail.com', '8923244846', NULL, '$2y$10$bp9O.qFT9WVlIE5UwBbc/Ohpf5UlmKDsYhu75oHW22h1901FfCwcO', NULL, NULL, NULL, 'pLziyjmmAHQLBrDkKczk882Br6xcaYTR0lGRSg5v55WsBkDRuhqN1wEoxWD5', NULL, NULL, '2022-11-20 02:07:27', '2022-11-20 02:44:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
