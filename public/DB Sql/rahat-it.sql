-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2020 at 08:21 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rahat-it`
--

-- --------------------------------------------------------

--
-- Table structure for table `demos`
--

CREATE TABLE `demos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_small` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `delete_temp` int(11) NOT NULL DEFAULT 0,
  `delete_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `demos`
--

INSERT INTO `demos` (`id`, `title`, `details`, `image`, `image_small`, `status`, `created_by`, `delete_temp`, `delete_by`, `created_at`, `updated_at`) VALUES
(2, 'What is Lorem Ipsum 2 ?', 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?', 'public/images/demo/original/kVX4B.jpg', 'public/images/demo/small/kVX4B.jpg', 1, 1, 0, NULL, '2020-07-23 01:01:51', '2020-07-23 01:15:22'),
(3, 'What is Lorem Ipsum?', '<p>What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and\r\n typesetting industry Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s when an unknown printer took a galley of type\r\n and scrambled it to make a type specimen book it has?</p>', 'public/images/demo/original/a66bE.jpg', 'public/images/demo/small/a66bE.jpg', 1, 1, 0, NULL, '2020-07-23 05:30:13', '2020-07-23 05:30:13'),
(4, 'Where can I get some 66 ?', '<p>What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and\r\n typesetting industry Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s when an unknown printer took a galley of type\r\n and scrambled it to make a type specimen book it has?</p>', 'public/images/demo/original/Fn1eZ.jpg', 'public/images/demo/small/Fn1eZ.jpg', 1, 1, 1, 1, '2020-07-23 05:31:26', '2020-07-23 05:33:30'),
(5, 'This is Promotion Title', 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and\r\n typesetting industry Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s when an unknown printer took a galley of type\r\n and scrambled it to make a type specimen book it has?', 'public/images/demo/original/jH42I.jpg', 'public/images/demo/small/jH42I.jpg', 1, 1, 0, NULL, '2020-07-23 05:32:53', '2020-07-23 05:32:53'),
(6, 'What is Loremll Ipsum?', 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and\r\n typesetting industry Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s when an unknown printer took a galley of type\r\n and scrambled it to make a type specimen book it has?', 'public/images/demo/original/saVtX.jpg', 'public/images/demo/small/saVtX.jpg', 1, 1, 0, NULL, '2020-07-23 05:33:20', '2020-07-23 07:28:03');

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
-- Table structure for table `hostings`
--

CREATE TABLE `hostings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_transfer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `control_panel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subdomain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `database` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_price` int(11) DEFAULT NULL,
  `final_price` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `publish_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hostings`
--

INSERT INTO `hostings` (`id`, `plan_name`, `storage`, `monthly_transfer`, `control_panel`, `domain`, `subdomain`, `email_account`, `database`, `old_price`, `final_price`, `status`, `created_by`, `publish_by`, `created_at`, `updated_at`) VALUES
(1, 'Plan - 1', '1 GB SSD Storage', '50 GB Data Transfer Monthly', 'cPanel Control Panel', '1 Addon Domain', 'Unlimited Sub Domains', 'Unlimited Email Accounts', 'Unlimited Databases', 2000, 1500, 0, 1, NULL, '2020-07-22 11:16:08', '2020-07-22 22:35:52'),
(2, 'Plan - 2', '3 GB SSD Storage', '80 GB Data Transfer Monthly', 'cPanel Control Panel', '3 Addon Domain', 'Unlimited Sub Domains', 'Unlimited Email Accounts', 'Unlimited Databases', 3000, 2500, 0, 1, NULL, '2020-07-22 22:41:07', '2020-07-22 23:20:28'),
(3, 'Plan - 3', '4 GB SSD Storage', '90 GB Data Transfer Monthly', 'cPanel Control Panel', '3 Addon Domain', 'Unlimited Sub Domains', 'Unlimited Email Accounts', 'Unlimited Databases', 4000, 3500, 1, 1, NULL, '2020-07-22 11:16:08', '2020-07-22 23:20:33'),
(4, 'Plan - 4', '5 GB SSD Storage', '90 GB Data Transfer Monthly', 'cPanel Control Panel', '6 Addon Domain', 'Unlimited Sub Domains', 'Unlimited Email Accounts', 'Unlimited Databases', 5000, 4500, 1, 1, NULL, '2020-07-22 22:41:07', '2020-07-22 23:20:22');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_22_104223_create_roles_table', 2),
(5, '2020_07_22_111544_create_role_user_table', 3),
(6, '2020_07_22_161535_create_hostings_table', 4),
(7, '2020_07_23_053611_create_demos_table', 5);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 1, '2020-07-22 04:52:09', '2020-07-22 04:52:09'),
(2, 'Edit', 1, '2020-07-22 05:10:08', '2020-07-22 05:10:08'),
(3, 'Add', 1, '2020-07-22 05:10:15', '2020-07-22 05:10:15'),
(4, 'Delete', 1, '2020-07-22 05:10:23', '2020-07-22 05:10:23'),
(9, 'Publish', 1, '2020-07-22 23:21:24', '2020-07-22 23:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(13, 3, 3, NULL, NULL),
(15, 4, 3, NULL, NULL),
(16, 2, 3, NULL, NULL),
(19, 9, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_small` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `image_small`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rahat', 'admin@gmail.com', 'public/images/users/original/Rahat_WJBnU.png', 'public/images/users/small/Rahat_WJBnU.png', NULL, '$2y$10$cR9fwRX2pyBUgp6O4Z6uTe5T7lVq/3p4EyuNETt/UVQYbAiD5A8MS', NULL, '2020-07-22 03:21:04', '2020-07-22 10:03:00'),
(3, 'Mr. Hasan', 'author@gmail.com', 'public/images/users/original/Mr._Hasan_x8z21.png', 'public/images/users/small/Mr._Hasan_x8z21.png', NULL, '$2y$10$hGPCP6E8R7tbmKySvxJLs.rlLqr9eVEesYnV/UP.sEqx.sw6A4Fvu', NULL, '2020-07-22 08:37:10', '2020-07-23 07:29:09'),
(4, 'View Only', 'view@gmail.com', 'public/images/users/original/View_Only_nBjgj.png', 'public/images/users/small/View_Only_nBjgj.png', NULL, '$2y$10$tzT/wfhDWRA9eqXCKCQQCudHUXeZ2uH6RKJELDZSVOdIYKPKOW90i', NULL, '2020-07-22 10:02:30', '2020-07-22 10:02:30'),
(5, 'Publisher', 'publish@gmail.com', 'public/images/users/original/Publisher_GzqKC.png', 'public/images/users/small/Publisher_GzqKC.png', NULL, '$2y$10$pNvZVFJ8/9iybcLmlo7hR.RodOsnzIIyr.Xhe4niqTmbWge0wxJ2.', NULL, '2020-07-23 07:29:02', '2020-07-23 07:29:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `demos`
--
ALTER TABLE `demos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostings`
--
ALTER TABLE `hostings`
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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `demos`
--
ALTER TABLE `demos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hostings`
--
ALTER TABLE `hostings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
