-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2023 at 08:03 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lottery`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(5, '2022_08_23_063007_create_permission_tables', 2),
(6, '2022_08_23_063031_create_posts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 17),
(1, 'App\\Models\\User', 18),
(1, 'App\\Models\\User', 19),
(1, 'App\\Models\\User', 20),
(3, 'App\\Models\\User', 25),
(3, 'App\\Models\\User', 26),
(3, 'App\\Models\\User', 27);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$RnfSYWGEA1LByC9EkEtjYeu07yLzWZ.lSuWw4.AXJBjAiwsXWU5va', '2022-10-06 01:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'permission-list', 'web', '2022-08-23 13:45:38', '2022-08-23 13:45:38'),
(2, 'permission-create', 'web', '2022-08-23 13:45:49', '2022-08-23 13:45:49'),
(3, 'permission-edit', 'web', '2022-08-23 13:45:58', '2022-08-23 13:45:58'),
(4, 'permission-delete', 'web', '2022-08-23 13:46:10', '2022-08-23 13:46:10'),
(5, 'role-list', 'web', '2022-08-23 13:46:29', '2022-08-23 13:46:29'),
(6, 'role-create', 'web', '2022-08-23 13:46:39', '2022-08-23 13:46:39'),
(7, 'role-edit', 'web', '2022-08-23 13:46:49', '2022-08-23 13:46:49'),
(8, 'role-delete', 'web', '2022-08-23 13:46:58', '2022-08-23 13:46:58'),
(9, 'user-list', 'web', '2022-08-23 13:47:19', '2022-08-23 13:47:19'),
(10, 'user-create', 'web', '2022-08-23 13:47:29', '2022-08-23 13:47:29'),
(11, 'user-edit', 'web', '2022-08-23 13:47:39', '2022-08-23 13:47:39'),
(12, 'user-delete', 'web', '2022-08-23 13:47:49', '2022-08-23 13:47:49'),
(41, 'category-list', 'web', '2022-08-24 06:28:41', '2022-08-24 06:28:41'),
(42, 'categorys-create', 'web', '2022-08-24 06:28:53', '2022-08-24 06:28:53'),
(43, 'categorys-edit', 'web', '2022-08-24 06:29:02', '2022-08-24 06:29:02'),
(44, 'categorys-delete', 'web', '2022-08-24 06:29:11', '2022-08-24 06:29:11'),
(73, 'shop-list', 'web', '2022-08-26 07:18:10', '2022-08-26 07:18:10'),
(74, 'shop-create', 'web', '2022-08-26 07:18:20', '2022-08-26 07:18:20'),
(75, 'shop-edit', 'web', '2022-08-26 07:18:29', '2022-08-26 07:18:29'),
(76, 'shop-delete', 'web', '2022-08-26 07:18:37', '2022-08-26 07:18:37'),
(77, 'product-list', 'web', '2022-08-28 23:43:37', '2022-08-28 23:43:37'),
(78, 'product-create', 'web', '2022-08-28 23:43:45', '2022-08-28 23:43:45'),
(79, 'product-edit', 'web', '2022-08-28 23:43:57', '2022-08-28 23:43:57'),
(80, 'product-delete', 'web', '2022-08-28 23:44:04', '2022-08-28 23:44:04'),
(81, 'vendors-list', 'web', '2022-08-29 03:41:34', '2022-08-29 03:41:34'),
(82, 'vendors-create', 'web', '2022-08-29 03:41:41', '2022-08-29 03:41:41'),
(83, 'vendors-edit', 'web', '2022-08-29 03:41:50', '2022-08-29 03:41:50'),
(84, 'vendors-delete', 'web', '2022-08-29 03:41:59', '2022-08-29 03:41:59'),
(85, 'color-list', 'web', '2022-08-30 03:38:00', '2022-08-30 03:38:00'),
(86, 'color-create', 'web', '2022-08-30 03:38:21', '2022-08-30 03:38:21'),
(87, 'color-edit', 'web', '2022-08-30 03:38:25', '2022-08-30 03:38:25'),
(88, 'color-delete', 'web', '2022-08-30 03:38:33', '2022-08-30 03:38:33'),
(89, 'size-list', 'web', '2022-08-30 03:39:02', '2022-08-30 03:39:02'),
(90, 'size-create', 'web', '2022-08-30 03:39:09', '2022-08-30 03:39:09'),
(91, 'size-edit', 'web', '2022-08-30 03:39:16', '2022-08-30 03:39:16'),
(92, 'size-delete', 'web', '2022-08-30 03:39:24', '2022-08-30 03:39:24'),
(93, 'brands-list', 'web', '2022-09-01 23:53:34', '2022-09-01 23:53:55'),
(94, 'brands-create', 'web', '2022-09-01 23:54:04', '2022-09-01 23:54:04'),
(95, 'brands-edit', 'web', '2022-09-01 23:54:11', '2022-09-01 23:54:11'),
(96, 'brands-delete', 'web', '2022-09-01 23:54:18', '2022-09-01 23:54:18'),
(97, 'sliders-list', 'web', '2022-09-02 04:10:24', '2022-09-02 04:10:24'),
(98, 'sliders-create', 'web', '2022-09-02 04:10:34', '2022-09-02 04:10:34'),
(99, 'sliders-edit', 'web', '2022-09-02 04:10:42', '2022-09-02 04:10:42'),
(100, 'sliders-delete', 'web', '2022-09-02 04:13:41', '2022-09-02 04:13:41'),
(101, 'order-list', 'web', '2022-09-13 00:22:32', '2022-09-13 00:22:32');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(11, 'App\\Models\\User', 27, 'MyApp', '51d7a375392808940ac47e480a0b0d379dc2a83b904fe948577be9191299a622', '[\"*\"]', '2022-09-19 07:48:51', '2022-09-19 07:42:25', '2022-09-19 07:48:51'),
(12, 'App\\Models\\User', 27, 'MyApp', '61ff722d09c1d13c0fd86ece0fa9a94f62da4b6b3abef345619f7d54f33fea4d', '[\"*\"]', '2022-09-19 08:12:52', '2022-09-19 07:59:15', '2022-09-19 08:12:52'),
(13, 'App\\Models\\User', 17, 'MyApp', 'f539d0abbe697b9033ab6f7d2c8c0137401bdd38a4787f1063e15240a70ffb99', '[\"*\"]', NULL, '2022-09-20 07:49:29', '2022-09-20 07:49:29'),
(14, 'App\\Models\\User', 17, 'MyApp', '2dc858e924f0cef1573c756e63f5c8a35be1e55b1d3a45f134559cd791eef9ea', '[\"*\"]', NULL, '2022-09-20 07:50:02', '2022-09-20 07:50:02'),
(15, 'App\\Models\\User', 17, 'MyApp', 'e66b32dfdf68ab85bea350958c1e2794479b84a2b076d658dac280ae29511460', '[\"*\"]', NULL, '2022-09-20 07:53:46', '2022-09-20 07:53:46'),
(16, 'App\\Models\\User', 26, 'MyApp', '935932439c9977c3661a9399e8050ca705097802efcd697b74f23e300c9b3119', '[\"*\"]', NULL, '2022-09-20 08:36:00', '2022-09-20 08:36:00'),
(17, 'App\\Models\\User', 26, 'MyApp', 'f007af76fe163025a143f0fc71416596c9bfa3eeb7b282a1ba558e24693147da', '[\"*\"]', NULL, '2022-09-21 23:38:13', '2022-09-21 23:38:13'),
(18, 'App\\Models\\User', 26, 'MyApp', 'f3de632a5436b482708d1d4829c7241dda21cb9c1ae194cc6fd24946d1102f70', '[\"*\"]', NULL, '2022-09-22 05:05:24', '2022-09-22 05:05:24'),
(19, 'App\\Models\\User', 26, 'MyApp', '257eb341d6484a4d2b905adf08d38b66492fc9e6c0f5de068bf09446c77ca51b', '[\"*\"]', '2022-09-22 06:20:01', '2022-09-22 05:20:32', '2022-09-22 06:20:01'),
(20, 'App\\Models\\User', 26, 'MyApp', '12edfc2426c03edff4534d49668a368dab2e5951be5dfededce311f2da568f05', '[\"*\"]', '2022-09-23 04:17:42', '2022-09-22 23:53:25', '2022-09-23 04:17:42'),
(21, 'App\\Models\\User', 26, 'MyApp', 'e381e399ef1a25affbede12c54ca16b123a9348c40a7cdb1d0ed3669cae87b62', '[\"*\"]', '2022-09-23 07:42:25', '2022-09-23 07:31:12', '2022-09-23 07:42:25'),
(22, 'App\\Models\\User', 26, 'MyApp', '641cbde539f2313b457527ab32994ffad8a5e71a4eda0f15f82979fb1bea6c04', '[\"*\"]', '2022-12-09 03:50:58', '2022-11-22 03:28:16', '2022-12-09 03:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', 17, '2022-08-23 13:49:38', '2022-08-26 06:23:40'),
(3, 'Shop', 'web', NULL, '2022-08-29 05:29:30', '2022-08-29 05:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(2, 3),
(3, 1),
(3, 3),
(4, 1),
(4, 3),
(5, 1),
(5, 3),
(6, 1),
(6, 3),
(7, 1),
(7, 3),
(8, 1),
(8, 3),
(9, 1),
(9, 3),
(10, 1),
(10, 3),
(11, 1),
(11, 3),
(12, 1),
(12, 3),
(41, 1),
(41, 3),
(42, 1),
(42, 3),
(43, 1),
(43, 3),
(44, 1),
(44, 3),
(73, 1),
(73, 3),
(74, 1),
(74, 3),
(75, 1),
(75, 3),
(76, 1),
(76, 3),
(77, 1),
(77, 3),
(78, 1),
(78, 3),
(79, 1),
(79, 3),
(80, 1),
(80, 3),
(81, 1),
(81, 3),
(82, 1),
(82, 3),
(83, 1),
(83, 3),
(84, 1),
(84, 3),
(85, 1),
(85, 3),
(86, 1),
(86, 3),
(87, 1),
(87, 3),
(88, 1),
(88, 3),
(89, 1),
(89, 3),
(90, 1),
(90, 3),
(91, 1),
(91, 3),
(92, 1),
(92, 3),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `points` int(255) NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `type` varchar(100) NOT NULL DEFAULT 'user',
  `shop_id` int(255) DEFAULT NULL,
  `shopname` varchar(255) DEFAULT NULL,
  `bannerimage` varchar(255) DEFAULT NULL,
  `otp` int(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contact`, `designation`, `address`, `type`, `shop_id`, `shopname`, `bannerimage`, `otp`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(17, 'Admin', 'admin@gmail.com', NULL, NULL, 'dsdsds', 'admin', NULL, NULL, NULL, 3817, 1, NULL, '$2y$10$TgbOAXCZkXo66PsmWkbkPevg7rgqCzCe4gUBDz82qbOaLO03RFcEy', NULL, '2022-08-18 13:42:25', '2022-08-24 06:07:12'),
(26, 'customer', 'ravi@gmail.com', '9780808060', NULL, 'dsds', 'customer', 26, 'Shop First', NULL, 1234, 1, NULL, '123456', NULL, '2022-08-29 06:38:16', '2022-08-29 06:40:46'),
(27, 'Agate', 'ggate@gmail.com', '9780808060', NULL, 'dasdsds', 'shop', 27, 'Shop Second', NULL, 0, 1, NULL, '$2y$10$tWR/ADN7v.j/uMaFksKFg.3cjN92zNdsRSL./CugHgP14tu3hnd/W', NULL, '2022-08-29 06:49:13', '2022-08-29 06:49:14'),
(28, 'Admin', 'admins@gmail.com', '8085210252', NULL, NULL, 'user', NULL, NULL, NULL, 7488, 1, NULL, '$2y$10$IB/z7FQOlR4CkQFHyn2Bw.V.R4ADKBW7SXZw4PNzO9EckytXk4U4.', NULL, NULL, NULL),
(29, 'customer', 'praveen.singh926@gmail.com', NULL, NULL, NULL, 'customer', NULL, NULL, NULL, 1234, 1, NULL, '$2y$10$SsdJtwKw6lPwA90kYlXJPe63fVHxRrMUJAxzI.i93epBePbm65ZR6', 'Mu9ot03PX0dS4uKRNGVZWq7n2fimfJPlvWkVBtP4U6jhfe1Zu9fuKt1geIeJ', NULL, '2022-10-20 02:07:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
