-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2021 at 12:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lrv_erfan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_profile`
--

CREATE TABLE `admin_profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_profile`
--

INSERT INTO `admin_profile` (`id`, `user_id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 4, 'Admin', '2021-04-14 13:45:22', '2021-04-14 13:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transactions_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `transactions_id`, `user_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 4, 1, 150000, '2021-04-11 07:30:30', '2021-04-12 07:47:49'),
(2, 1, 2, 4, 2, 150000, '2021-04-11 07:31:38', '2021-04-12 07:47:49'),
(3, NULL, 3, 4, 1, 150000, '2021-04-11 07:57:24', '2021-04-11 07:57:24'),
(5, 3, 2, 4, 1, 150000, '2021-04-12 22:23:30', '2021-04-12 22:30:53'),
(6, NULL, 2, 5, 1, 150000, '2021-04-14 07:07:45', '2021-04-14 07:07:45'),
(7, NULL, 2, 6, 1, 100000, '2021-04-14 07:09:54', '2021-04-14 07:09:54'),
(8, 4, 5, 3, 1, 150000, '2021-08-19 22:41:52', '2021-08-19 22:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Meja', '2021-04-08 13:47:17', '2021-08-19 22:06:19'),
(2, 'Kursi', '2021-04-08 13:47:17', '2021-08-19 22:06:32'),
(3, 'Lemari', '2021-04-08 13:47:55', '2021-08-19 22:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_06_06_084124_create_user_profiles_table', 1),
(4, '2020_06_06_091219_create_categories_table', 1),
(5, '2020_06_06_091722_create_products_table', 1),
(6, '2020_06_06_094938_create_transactions_table', 1),
(7, '2020_06_06_135929_create_promos_table', 1),
(8, '2020_06_06_140505_relation_promo_transaction', 1),
(9, '2020_06_06_140859_create_carts_table', 1),
(10, '2020_06_06_141810_create_vendors_table', 1),
(11, '2020_06_06_142013_create_payments_table', 1),
(12, '2020_06_06_142643_create_reviews_table', 1),
(13, '2020_06_13_061551_set_unique_username_users', 1),
(14, '2020_06_16_075909_create_pictures', 1),
(15, '2020_06_22_142436_drop_pictures', 1),
(16, '2020_06_22_142607_add_image_product', 1),
(17, '2020_07_05_134125_change_enum_promos_type', 1),
(18, '2020_07_07_154117_create_sliders', 1),
(19, '2020_07_22_051631_create_amount', 1),
(20, '2020_07_22_055620_status_payment', 1),
(21, '2020_07_27_062827_add_ongkir', 1),
(22, '2020_07_27_063251_add_tujuan', 1),
(23, '2020_07_27_070348_add_notrans', 1),
(24, '2020_07_27_195315_add_userid', 1),
(25, '2020_07_28_045345_admin_profile_faq', 1),
(26, '2020_07_28_050915_nullable_email', 1),
(27, '2020_07_28_061121_voucher_minimal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transactions_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `payment_date` date NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `transactions_id`, `vendor_id`, `payment_date`, `url`, `description`, `created_at`, `updated_at`, `status`, `user_id`) VALUES
(1, 1, 1, '2021-04-12', 'f164b0a0-9ba2-11eb-a24d-f0761cd06424.jpg', '', '2021-04-12 08:22:50', '2021-04-12 08:22:50', '0', 2),
(2, 3, 1, '2021-04-13', '73818c9a-9c19-11eb-a6be-f0761cd06424.jpg', '', '2021-04-12 22:31:09', '2021-04-12 22:31:09', '0', 2),
(3, 4, 1, '2021-08-20', '885b705c-0179-11ec-8f6f-f0761cd06424.jpg', '', '2021-08-19 22:43:23', '2021-08-19 22:43:23', '0', 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `qty`, `description`, `created_at`, `updated_at`, `images`) VALUES
(1, 1, 'Meja Classic', 1000000, 2, 'Awesome Product From Us', '2021-04-08 13:48:21', '2021-08-19 22:07:23', '80fa715a-0174-11ec-8ef2-f0761cd06424.jpg'),
(2, 2, 'Kursi Minimalis', 250000, 10, 'Description Product 2', '2020-04-08 08:43:31', '2021-08-19 22:10:15', 'e7527862-0174-11ec-8611-f0761cd06424.jpg'),
(3, 1, 'Meja Modern', 150000, 100, 'Description product 3', '2021-04-08 13:48:21', '2021-08-19 22:07:56', '94b4f850-0174-11ec-b803-f0761cd06424.jpg'),
(4, 1, 'Meja Kecil', 150000, 1, 'Description product 4', '2021-04-08 13:48:21', '2021-08-19 22:09:00', 'bab8b9c4-0174-11ec-8991-f0761cd06424.jpg'),
(5, 3, 'Lemari Pakaian', 150000, 1, 'Description product 4', '2021-04-08 13:48:21', '2021-08-19 22:11:03', '044ccdbe-0175-11ec-8282-f0761cd06424.jpg'),
(6, 1, 'Meja Komputer', 100000, 10, 'Produk Pilihan', '2021-04-14 06:48:34', '2021-08-19 22:14:17', '780c29fc-0175-11ec-803e-f0761cd06424.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `promos`
--

CREATE TABLE `promos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('public','birthday') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT 1,
  `percent` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `minimal` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promos`
--

INSERT INTO `promos` (`id`, `code`, `name`, `type`, `amount`, `percent`, `active`, `created_at`, `updated_at`, `minimal`) VALUES
(1, 'BM50', 'Diskon 50%', 'public', 100000, 0, 1, '2021-04-12 04:30:48', '2021-04-12 04:30:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `review`, `created_at`, `updated_at`) VALUES
(2, 1, 4, 'Barangnya Kek Tai', '2021-04-09 14:17:52', '2021-04-09 14:17:52'),
(3, 1, 4, 'Barangnya Kek Entut', '2021-04-09 14:17:52', '2021-04-09 14:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `amount` int(11) NOT NULL DEFAULT 0,
  `ongkir` int(11) NOT NULL DEFAULT 0,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `no_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `date`, `confirmed`, `status`, `created_at`, `updated_at`, `discount`, `amount`, `ongkir`, `tujuan`, `no_transaksi`) VALUES
(1, '2021-04-12', 1, '0', '2021-04-12 07:47:49', '2021-04-12 07:47:49', 100000, 450000, 110000, '', 'TR-20210412144749'),
(3, '2021-04-13', 1, '0', '2021-04-12 22:30:53', '2021-04-12 22:30:53', 0, 150000, 110000, 'Aceh Barat', 'TR-20210413053053'),
(4, '2021-08-20', 1, '0', '2021-08-19 22:43:02', '2021-08-19 22:43:02', 0, 150000, 12000, 'Sukoharjo', 'TR-20210820054302');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` enum('admin','member') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `roles`, `created_at`, `updated_at`) VALUES
(1, 'joni', 'joni@gmail.com', 'abcabc', 'member', '2021-04-09 14:16:29', '2021-04-09 14:16:29'),
(2, 'joni123', 'joni123@gmail.com', '$2y$10$/VHK/Mn0exxOXsZCx0lWeOuflN.g6yIcdV1uoUsY4Fj7pm6WdobnC', 'member', '2021-04-11 07:16:27', '2021-04-11 07:16:27'),
(3, 'wkwkwk', 'wkwkwk@gmail.com', '$2y$10$RveUF5SxYvD1FvPhxr9r9.9y2vi3oi8R/UskTgOD50G7Ipe7krxFu', 'member', '2021-04-11 07:50:32', '2021-04-11 07:50:32'),
(4, 'admin', 'admin@gmail.com', '$2y$10$dkEur35J/thZVNU1YZi0SeNA2Jr/ambJHK.uKzQ3nxnxEUhC003Tu', 'admin', '2021-04-14 06:45:02', '2021-04-14 06:45:02'),
(5, 'bagus', 'bagus123@gmail.com', '$2y$10$7UoHEZzcRWKmk/svhCR4huzGz6ypOa4GLDYQHJRsHXwD5e7z4C.92', 'member', '2021-08-19 22:41:24', '2021-08-19 22:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `name`, `date_of_birth`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 1, 'Joni Esmod', '2021-04-09', 'Wonosaren', '089673266623', '2021-04-09 14:17:10', '2021-04-09 14:17:10'),
(2, 2, 'Bagus Yanuar', '2021-04-08', 'Anu', '082983192', '2021-04-20 14:16:51', '2021-04-11 14:16:51'),
(3, 3, 'wkwkwkwk', '2021-04-05', 'wkwkwkwkwwk', '01281923123', '2021-04-11 07:50:32', '2021-04-11 07:50:32'),
(4, 5, 'bagus yanuar', '2021-08-01', 'wonosaren rt 04\r\njagalan', '0895422630233', '2021-08-19 22:41:24', '2021-08-19 22:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `number`, `created_at`, `updated_at`) VALUES
(1, 'BRI', '012391230', '2021-04-12 15:21:04', '2021-04-20 15:21:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_profile`
--
ALTER TABLE `admin_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_profile_user_id_foreign` (`user_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_transactions_id_foreign` (`transactions_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_transactions_id_foreign` (`transactions_id`),
  ADD KEY `payments_vendor_id_foreign` (`vendor_id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `promos_code_unique` (`code`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_profile`
--
ALTER TABLE `admin_profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `promos`
--
ALTER TABLE `promos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_profile`
--
ALTER TABLE `admin_profile`
  ADD CONSTRAINT `admin_profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_transactions_id_foreign` FOREIGN KEY (`transactions_id`) REFERENCES `transactions` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_transactions_id_foreign` FOREIGN KEY (`transactions_id`) REFERENCES `transactions` (`id`),
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `payments_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `user_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
