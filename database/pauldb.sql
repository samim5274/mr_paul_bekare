-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 11, 2025 at 10:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pauldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `github_id` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `role` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `otp` varchar(255) DEFAULT NULL,
  `otp_expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `facebook_id`, `google_id`, `github_id`, `password`, `photo`, `phone`, `address`, `dob`, `branch_id`, `role`, `status`, `created_at`, `updated_at`, `otp`, `otp_expires_at`) VALUES
(1, 'Shamim Hossain', 'cse.shamim.cub@gmail.com', NULL, NULL, NULL, '$2y$12$tyqDoJKBUQtqWOgNHfr4VuDtCyojukeg0Xun7w2dciI1BaA1f47Tu', 'user-1764476567.png', NULL, NULL, NULL, 1, 1, 1, '2025-11-08 04:29:39', '2025-12-04 06:05:59', '196284', '2025-12-04 06:15:59'),
(2, 'Shamim Hossain', 'admin@admin.com', NULL, NULL, NULL, '$2y$12$tnfhTckKXMW3SFdQuonSGunxa7rmoEQlqcX9ur7TzXen/174XwkpW', 'user-1764830654.png', NULL, NULL, NULL, 1, 1, 1, '2025-11-12 10:01:01', '2025-12-04 06:44:14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `manager_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `location`, `phone`, `manager_id`, `created_at`, `updated_at`) VALUES
(1, 'Main Branch', 'Gulshan, Dhaka', '01700000001', 1, '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(2, 'Uttara Branch', 'Uttara, Dhaka', '01700000002', 1, '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(3, 'Chittagong Branch', 'Agrabad, Chittagong', '01700000003', 1, '2025-11-08 04:24:57', '2025-11-08 04:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `branch_transfers`
--

CREATE TABLE `branch_transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `reason` text DEFAULT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reg` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `reg`, `date`, `user_id`, `product_id`, `branch_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 20251108010001, '2025-11-08', 1, 1, 1, 1, 40.00, '2025-11-08 05:29:12', '2025-11-08 05:29:12'),
(2, 20251108010001, '2025-11-08', 1, 2, 1, 1, 50.00, '2025-11-08 05:29:13', '2025-11-08 05:29:13'),
(3, 20251108010002, '2025-11-08', 1, 1, 1, 1, 40.00, '2025-11-08 08:36:07', '2025-11-08 08:36:07'),
(4, 20251108010002, '2025-11-08', 1, 2, 1, 1, 50.00, '2025-11-08 08:36:08', '2025-11-08 08:36:08'),
(5, 20251108010003, '2025-11-08', 1, 1, 1, 1, 40.00, '2025-11-08 08:39:11', '2025-11-08 08:39:11'),
(6, 20251108010003, '2025-11-08', 1, 2, 1, 1, 50.00, '2025-11-08 08:39:11', '2025-11-08 08:39:11'),
(7, 20251108010003, '2025-11-08', 1, 3, 1, 1, 40.00, '2025-11-08 08:39:12', '2025-11-08 08:39:12'),
(8, 20251108010004, '2025-11-08', 1, 1, 1, 1, 40.00, '2025-11-08 09:00:39', '2025-11-08 09:00:39'),
(9, 20251108010004, '2025-11-08', 1, 2, 1, 1, 50.00, '2025-11-08 09:00:40', '2025-11-08 09:00:40'),
(10, 20251108010004, '2025-11-08', 1, 3, 1, 1, 40.00, '2025-11-08 09:00:40', '2025-11-08 09:00:40'),
(11, 20251108010005, '2025-11-08', 1, 1, 1, 1, 40.00, '2025-11-08 09:09:05', '2025-11-08 09:09:05'),
(12, 20251108010005, '2025-11-08', 1, 2, 1, 1, 50.00, '2025-11-08 09:09:05', '2025-11-08 09:09:05'),
(13, 20251108010005, '2025-11-08', 1, 3, 1, 1, 40.00, '2025-11-08 09:09:06', '2025-11-08 09:09:06'),
(14, 20251108010006, '2025-11-08', 1, 1, 1, 1, 40.00, '2025-11-08 09:09:22', '2025-11-08 09:09:22'),
(15, 20251108010006, '2025-11-08', 1, 2, 1, 1, 50.00, '2025-11-08 09:09:22', '2025-11-08 09:09:22'),
(16, 20251108010006, '2025-11-08', 1, 3, 1, 1, 40.00, '2025-11-08 09:09:22', '2025-11-08 09:09:22'),
(17, 20251108010007, '2025-11-08', 1, 1, 1, 1, 40.00, '2025-11-08 09:14:17', '2025-11-08 09:14:17'),
(18, 20251108010007, '2025-11-08', 1, 2, 1, 1, 50.00, '2025-11-08 09:14:18', '2025-11-08 09:14:18'),
(19, 20251108010007, '2025-11-08', 1, 3, 1, 1, 40.00, '2025-11-08 09:14:18', '2025-11-08 09:14:18'),
(20, 20251108010008, '2025-11-08', 1, 1, 1, 1, 40.00, '2025-11-08 10:41:03', '2025-11-08 10:41:03'),
(21, 20251108010008, '2025-11-08', 1, 3, 1, 1, 40.00, '2025-11-08 10:41:04', '2025-11-08 10:41:04'),
(22, 20251108010008, '2025-11-08', 1, 2, 1, 1, 50.00, '2025-11-08 10:41:05', '2025-11-08 10:41:05'),
(23, 20251108010009, '2025-11-08', 1, 1, 1, 1, 40.00, '2025-11-08 10:43:31', '2025-11-08 10:43:31'),
(24, 20251108010009, '2025-11-08', 1, 2, 1, 1, 50.00, '2025-11-08 10:43:32', '2025-11-08 10:43:32'),
(25, 20251108010009, '2025-11-08', 1, 3, 1, 1, 40.00, '2025-11-08 10:43:32', '2025-11-08 10:43:32'),
(26, 20251108010010, '2025-11-08', 1, 1, 1, 1, 40.00, '2025-11-08 10:46:43', '2025-11-08 10:46:43'),
(27, 20251108010010, '2025-11-08', 1, 2, 1, 1, 50.00, '2025-11-08 10:46:43', '2025-11-08 10:46:43'),
(28, 20251108010010, '2025-11-08', 1, 3, 1, 1, 40.00, '2025-11-08 10:46:44', '2025-11-08 10:46:44'),
(29, 20251108010011, '2025-11-08', 1, 1, 1, 1, 40.00, '2025-11-08 10:53:41', '2025-11-08 10:53:41'),
(30, 20251108010011, '2025-11-08', 1, 2, 1, 1, 50.00, '2025-11-08 10:53:42', '2025-11-08 10:53:42'),
(31, 20251108010011, '2025-11-08', 1, 3, 1, 1, 40.00, '2025-11-08 10:53:43', '2025-11-08 10:53:43'),
(32, 20251108010012, '2025-11-08', 1, 1, 1, 1, 40.00, '2025-11-08 11:01:21', '2025-11-08 11:01:21'),
(33, 20251108010012, '2025-11-08', 1, 2, 1, 1, 50.00, '2025-11-08 11:01:22', '2025-11-08 11:01:22'),
(34, 20251108010012, '2025-11-08', 1, 3, 1, 1, 40.00, '2025-11-08 11:01:22', '2025-11-08 11:01:22'),
(35, 20251108010013, '2025-11-08', 1, 1, 1, 1, 40.00, '2025-11-08 11:03:17', '2025-11-08 11:03:17'),
(36, 20251108010013, '2025-11-08', 1, 2, 1, 1, 50.00, '2025-11-08 11:03:17', '2025-11-08 11:03:17'),
(37, 20251108010013, '2025-11-08', 1, 3, 1, 1, 40.00, '2025-11-08 11:03:18', '2025-11-08 11:03:18'),
(38, 20251108010014, '2025-11-08', 1, 1, 1, 1, 40.00, '2025-11-08 11:17:02', '2025-11-08 11:17:02'),
(39, 20251108010014, '2025-11-08', 1, 2, 1, 1, 50.00, '2025-11-08 11:17:02', '2025-11-08 11:17:02'),
(40, 20251108010014, '2025-11-08', 1, 3, 1, 1, 40.00, '2025-11-08 11:17:03', '2025-11-08 11:17:03'),
(41, 20251108010015, '2025-11-08', 1, 1, 1, 1, 40.00, '2025-11-08 11:17:20', '2025-11-08 11:17:20'),
(42, 20251108010016, '2025-11-08', 1, 1, 1, 1, 40.00, '2025-11-08 12:02:07', '2025-11-08 12:02:07'),
(43, 20251108010016, '2025-11-08', 1, 3, 1, 1, 40.00, '2025-11-08 12:02:08', '2025-11-08 12:02:08'),
(44, 20251108010017, '2025-11-08', 1, 1, 1, 1, 40.00, '2025-11-08 12:02:28', '2025-11-08 12:02:28'),
(45, 20251108010017, '2025-11-08', 1, 2, 1, 1, 50.00, '2025-11-08 12:02:28', '2025-11-08 12:02:28'),
(46, 20251108010017, '2025-11-08', 1, 3, 1, 1, 40.00, '2025-11-08 12:02:29', '2025-11-08 12:02:29'),
(47, 20251108010018, '2025-11-08', 1, 1, 1, 1, 40.00, '2025-11-08 12:17:34', '2025-11-08 12:17:34'),
(48, 20251108010018, '2025-11-08', 1, 2, 1, 1, 50.00, '2025-11-08 12:17:35', '2025-11-08 12:17:35'),
(49, 20251108010018, '2025-11-08', 1, 3, 1, 1, 40.00, '2025-11-08 12:17:36', '2025-11-08 12:17:36'),
(50, 20251111010019, '2025-11-11', 1, 1, 1, 1, 40.00, '2025-11-11 06:19:26', '2025-11-11 06:19:26'),
(51, 20251111010019, '2025-11-11', 1, 2, 1, 1, 50.00, '2025-11-11 06:19:27', '2025-11-11 06:19:27'),
(52, 20251111010019, '2025-11-11', 1, 3, 1, 1, 40.00, '2025-11-11 06:19:27', '2025-11-11 06:19:27'),
(53, 20251111010019, '2025-11-11', 1, 4, 1, 1, 90.00, '2025-11-11 06:20:02', '2025-11-11 06:20:02'),
(54, 20251111010019, '2025-11-11', 1, 5, 1, 1, 80.00, '2025-11-11 06:20:03', '2025-11-11 06:20:03'),
(55, 20251111010019, '2025-11-11', 1, 6, 1, 1, 160.00, '2025-11-11 06:20:03', '2025-11-11 06:20:03'),
(59, 20251211020020, '2025-12-11', 2, 1, 1, 1, 40.00, '2025-12-11 04:24:11', '2025-12-11 04:24:11'),
(60, 20251211020020, '2025-12-11', 2, 2, 1, 1, 50.00, '2025-12-11 04:24:11', '2025-12-11 04:24:11'),
(61, 20251211020020, '2025-12-11', 2, 3, 1, 1, 40.00, '2025-12-11 04:24:12', '2025-12-11 04:24:12'),
(62, 20251211020020, '2025-12-11', 2, 4, 1, 1, 90.00, '2025-12-11 04:24:13', '2025-12-11 04:24:13'),
(63, 20251211020020, '2025-12-11', 2, 5, 1, 1, 80.00, '2025-12-11 04:24:13', '2025-12-11 04:24:13'),
(64, 20251211020020, '2025-12-11', 2, 6, 1, 1, 160.00, '2025-12-11 04:24:14', '2025-12-11 04:24:14'),
(65, 20251211020020, '2025-12-11', 2, 7, 1, 1, 100.00, '2025-12-11 04:24:14', '2025-12-11 04:24:14'),
(66, 20251211020020, '2025-12-11', 2, 8, 1, 1, 90.00, '2025-12-11 04:24:15', '2025-12-11 04:24:15'),
(67, 20251211020020, '2025-12-11', 2, 9, 1, 1, 200.00, '2025-12-11 04:24:15', '2025-12-11 04:24:15'),
(68, 20251211020021, '2025-12-11', 2, 1, 1, 10, 40.00, '2025-12-11 04:34:21', '2025-12-11 04:34:32'),
(69, 20251211020021, '2025-12-11', 2, 2, 1, 50, 50.00, '2025-12-11 04:34:22', '2025-12-11 04:34:30'),
(70, 20251211020021, '2025-12-11', 2, 6, 1, 10, 160.00, '2025-12-11 04:34:23', '2025-12-11 04:34:33'),
(71, 20251211020021, '2025-12-11', 2, 5, 1, 10, 80.00, '2025-12-11 04:34:24', '2025-12-11 04:34:37'),
(72, 20251211020021, '2025-12-11', 2, 4, 1, 10, 90.00, '2025-12-11 04:34:24', '2025-12-11 04:34:35'),
(73, 20251211020021, '2025-12-11', 2, 9, 1, 10, 200.00, '2025-12-11 04:34:25', '2025-12-11 04:34:34'),
(74, 20251211020021, '2025-12-11', 2, 8, 1, 10, 90.00, '2025-12-11 04:34:25', '2025-12-11 04:34:38'),
(75, 20251211020021, '2025-12-11', 2, 7, 1, 10, 100.00, '2025-12-11 04:34:26', '2025-12-11 04:34:39');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'BREAD & BUNS', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(2, 'FAST FOOD ITEMS', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(3, 'TOAST & BISCUITS', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(4, 'STICK & PUFFS', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(5, 'CELEBRATION CAKE', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(6, 'SWEET', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(14, 'DRINKS', '2025-12-02 07:26:17', '2025-12-02 08:14:03');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `address`, `email`, `phone`, `website`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Paul Bakers', '150, BB Road, Suraiya Tower, Narayangonj-1400', 'mrpaulbakers2025@gmail.com', '01675962338', 'https://bekare.deegau.com/', '2025-11-08 04:24:57', '2025-11-08 04:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `due_collections`
--

CREATE TABLE `due_collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `reg` bigint(20) UNSIGNED DEFAULT NULL,
  `due` decimal(12,2) DEFAULT NULL,
  `pay` decimal(12,2) DEFAULT NULL,
  `payment_date` date NOT NULL DEFAULT '2025-11-08',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `note` varchar(255) NOT NULL DEFAULT 'N/A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `excategories`
--

CREATE TABLE `excategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `excategories`
--

INSERT INTO `excategories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Food', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(2, 'Transport', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(3, 'Entertainment', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(4, 'Bills & Utilities', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(5, 'Health', '2025-11-08 04:24:57', '2025-11-08 04:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catId` bigint(20) UNSIGNED NOT NULL,
  `subcatId` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `remark` text NOT NULL DEFAULT 'N/A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expired_products`
--

CREATE TABLE `expired_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `expired_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exsubcategories`
--

CREATE TABLE `exsubcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exsubcategories`
--

INSERT INTO `exsubcategories` (`id`, `cat_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Groceries', '2025-11-08 04:24:59', '2025-11-08 04:24:59'),
(2, 1, 'Restaurants', '2025-11-08 04:24:59', '2025-11-08 04:24:59'),
(3, 2, 'Bus', '2025-11-08 04:24:59', '2025-11-08 04:24:59'),
(4, 2, 'Taxi', '2025-11-08 04:24:59', '2025-11-08 04:24:59'),
(5, 3, 'Movies', '2025-11-08 04:24:59', '2025-11-08 04:24:59'),
(6, 3, 'Games', '2025-11-08 04:24:59', '2025-11-08 04:24:59'),
(7, 4, 'Electricity', '2025-11-08 04:24:59', '2025-11-08 04:24:59'),
(8, 4, 'Water', '2025-11-08 04:24:59', '2025-11-08 04:24:59'),
(9, 5, 'Medicine', '2025-11-08 04:24:59', '2025-11-08 04:24:59'),
(10, 5, 'Doctor', '2025-11-08 04:24:59', '2025-11-08 04:24:59');

-- --------------------------------------------------------

--
-- Table structure for table `factory_stocks`
--

CREATE TABLE `factory_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `reason` text DEFAULT NULL,
  `return_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `factory_stocks`
--

INSERT INTO `factory_stocks` (`id`, `user_id`, `product_id`, `quantity`, `price`, `reason`, `return_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 6, 89, 14240.00, 'N/A', '2025-12-11', 1, '2025-12-11 04:51:14', '2025-12-11 04:51:14'),
(2, 2, 1, 9, 360.00, 'N/A', '2025-12-11', 1, '2025-12-11 04:52:40', '2025-12-11 04:52:40');

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
(49, '2014_10_12_000000_create_users_table', 1),
(50, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(51, '2014_10_12_100000_create_password_resets_table', 1),
(52, '2019_08_19_000000_create_failed_jobs_table', 1),
(53, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(54, '2025_07_09_050619_create_categories_table', 1),
(55, '2025_07_09_051129_create_subcategories_table', 1),
(56, '2025_07_09_051306_create_products_table', 1),
(57, '2025_07_10_054037_create_payment_methods_table', 1),
(58, '2025_07_10_054038_create_admins_table', 1),
(59, '2025_07_10_054039_create_branches_table', 1),
(60, '2025_07_10_054040_create_orders_table', 1),
(61, '2025_07_10_054041_create_carts_table', 1),
(62, '2025_07_10_062043_create_stocks_table', 1),
(63, '2025_07_14_080418_create_purchasecarts_table', 1),
(64, '2025_07_14_095009_create_purchaseorders_table', 1),
(65, '2025_07_20_105349_create_excategories_table', 1),
(66, '2025_07_20_105356_create_exsubcategories_table', 1),
(67, '2025_07_20_105407_create_expenses_table', 1),
(68, '2025_08_09_101821_create_companies_table', 1),
(69, '2025_09_23_115550_create_due_collections_table', 1),
(70, '2025_09_23_153947_create_expired_products_table', 1),
(71, '2025_09_27_123207_create_factory_stocks_table', 1),
(72, '2025_09_27_164041_create_purchase_returns_table', 1),
(73, '2025_12_04_111518_add_otp_admins_table', 2),
(76, '2025_12_11_122040_create_branch_transfers_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `reg` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  `discount` decimal(12,2) DEFAULT NULL,
  `vat` decimal(12,2) DEFAULT NULL,
  `payable` decimal(12,2) DEFAULT NULL,
  `pay` decimal(12,2) DEFAULT NULL,
  `due` decimal(12,2) DEFAULT NULL,
  `paymentMethod` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `customerName` varchar(255) NOT NULL DEFAULT '0',
  `customerPhone` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`, `user_id`, `branch_id`, `reg`, `total`, `discount`, `vat`, `payable`, `pay`, `due`, `paymentMethod`, `status`, `customerName`, `customerPhone`, `created_at`, `updated_at`) VALUES
(1, '2025-11-08', 1, 1, 20251108010001, 90.00, 0.00, 0.00, 90.00, 90.00, 0.00, 1, 2, '0', 0, '2025-11-08 05:29:17', '2025-11-08 05:29:17'),
(2, '2025-11-08', 1, 1, 20251108010002, 90.00, 0.00, 0.00, 90.00, 90.00, 0.00, 1, 2, '0', 0, '2025-11-08 08:36:42', '2025-11-08 08:36:42'),
(3, '2025-11-08', 1, 1, 20251108010003, 130.00, 0.00, 0.00, 130.00, 130.00, 0.00, 1, 2, '0', 0, '2025-11-08 08:39:26', '2025-11-08 08:39:26'),
(4, '2025-11-08', 1, 1, 20251108010004, 130.00, 0.00, 0.00, 130.00, 100.00, 30.00, 1, 3, 'shamim', 1762164746, '2025-11-08 09:00:49', '2025-11-08 09:00:49'),
(5, '2025-11-08', 1, 1, 20251108010005, 130.00, 0.00, 0.00, 130.00, 100.00, 30.00, 1, 3, 'shamim', 1762164746, '2025-11-08 09:09:15', '2025-11-08 09:09:15'),
(6, '2025-11-08', 1, 1, 20251108010006, 130.00, 0.00, 0.00, 130.00, 100.00, 30.00, 1, 3, 'shamim', 1762164746, '2025-11-08 09:09:30', '2025-11-08 09:09:30'),
(7, '2025-11-08', 1, 1, 20251108010007, 130.00, 0.00, 0.00, 130.00, 100.00, 30.00, 1, 3, 'Samim', 1762164746, '2025-11-08 09:14:29', '2025-11-08 09:14:29'),
(8, '2025-11-08', 1, 1, 20251108010008, 130.00, 0.00, 0.00, 130.00, 100.00, 30.00, 1, 3, 'shamim', 1762164746, '2025-11-08 10:41:13', '2025-11-08 10:41:13'),
(9, '2025-11-08', 1, 1, 20251108010009, 130.00, 0.00, 0.00, 130.00, 100.00, 30.00, 1, 3, 'shamim', 1762164746, '2025-11-08 10:43:41', '2025-11-08 10:43:41'),
(10, '2025-11-08', 1, 1, 20251108010010, 130.00, 0.00, 0.00, 130.00, 100.00, 30.00, 1, 3, 'shamim', 1762164746, '2025-11-08 10:46:52', '2025-11-08 10:46:52'),
(11, '2025-11-08', 1, 1, 20251108010011, 130.00, 0.00, 0.00, 130.00, 100.00, 30.00, 1, 3, 'shamim', 1762164746, '2025-11-08 10:53:51', '2025-11-08 10:53:51'),
(12, '2025-11-08', 1, 1, 20251108010012, 130.00, 0.00, 0.00, 130.00, 130.00, 0.00, 1, 2, '0', 0, '2025-11-08 11:01:26', '2025-11-08 11:01:26'),
(13, '2025-11-08', 1, 1, 20251108010013, 130.00, 0.00, 0.00, 130.00, 130.00, 0.00, 1, 2, '0', 0, '2025-11-08 11:03:21', '2025-11-08 11:03:21'),
(14, '2025-11-08', 1, 1, 20251108010014, 130.00, 0.00, 0.00, 130.00, 130.00, 0.00, 1, 2, '0', 0, '2025-11-08 11:17:06', '2025-11-08 11:17:06'),
(15, '2025-11-08', 1, 1, 20251108010015, 40.00, 0.00, 0.00, 40.00, 40.00, 0.00, 1, 2, '0', 0, '2025-11-08 11:17:23', '2025-11-08 11:17:23'),
(16, '2025-11-08', 1, 1, 20251108010016, 80.00, 0.00, 0.00, 80.00, 80.00, 0.00, 1, 2, '0', 0, '2025-11-08 12:02:12', '2025-11-08 12:02:12'),
(17, '2025-11-08', 1, 1, 20251108010017, 130.00, 0.00, 0.00, 130.00, 130.00, 0.00, 1, 2, '0', 0, '2025-11-08 12:02:33', '2025-11-08 12:02:33'),
(18, '2025-11-08', 1, 1, 20251108010018, 130.00, 0.00, 0.00, 130.00, 10.00, 120.00, 1, 3, 'shamim', 1762164746, '2025-11-08 12:17:43', '2025-11-08 12:17:43'),
(19, '2025-11-11', 1, 1, 20251111010019, 460.00, 15.00, 69.00, 514.00, 500.00, 14.00, 1, 3, 'Biswajit', 1762164746, '2025-11-11 06:20:14', '2025-11-11 06:20:14'),
(20, '2025-12-11', 2, 1, 20251211020020, 850.00, 0.00, 0.00, 850.00, 850.00, 0.00, 1, 2, '0', 0, '2025-12-11 04:33:31', '2025-12-11 04:33:31'),
(21, '2025-12-11', 2, 1, 20251211020021, 10100.00, 100.00, 1515.00, 11515.00, 1000.00, 10515.00, 1, 3, 'Shamim Hossain', 1762164746, '2025-12-11 04:34:59', '2025-12-11 04:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cash', 'Cash Payment', 1, '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(2, 'Credit Card', 'Pay via credit/debit card', 1, '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(3, 'Bkash', 'Mobile banking payment', 1, '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(4, 'Nagad', 'Mobile banking payment', 1, '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(5, 'Rocket', 'Mobile banking payment', 1, '2025-11-08 04:24:57', '2025-11-08 04:24:57');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  `size` varchar(255) DEFAULT NULL,
  `ingredients` varchar(255) DEFAULT NULL,
  `manufactured` date DEFAULT NULL,
  `expired` date DEFAULT NULL,
  `sku` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `subcategory_id`, `price`, `stock`, `description`, `image`, `availability`, `size`, `ingredients`, `manufactured`, `expired`, `sku`, `created_at`, `updated_at`) VALUES
(1, 'Burger Bun', 1, 1, 40.00, 80, NULL, NULL, 1, '75gm (2pcs)', NULL, '2025-11-05', '2025-12-31', 'PRD001', '2025-11-08 04:24:57', '2025-12-11 08:54:50'),
(2, 'Tiffin Bun', 1, 2, 50.00, 20, NULL, NULL, 1, '105gm (4pcs)', NULL, '2025-11-03', '2026-02-28', 'PRD002', '2025-11-08 04:24:57', '2025-12-11 08:54:53'),
(3, 'Butter Bun', 1, 2, 40.00, 99, NULL, NULL, 1, '100gm', NULL, '2025-11-06', '2026-09-06', 'PRD003', '2025-11-08 04:24:57', '2025-12-11 04:24:12'),
(4, 'Family Bun', 1, 2, 90.00, 89, NULL, NULL, 1, '220gm', NULL, '2025-11-06', '2026-07-11', 'PRD004', '2025-11-08 04:24:57', '2025-12-11 04:34:35'),
(5, 'Sandwich Bread', 1, 3, 80.00, 89, NULL, NULL, 1, '400gm', NULL, '2025-11-06', '2026-09-30', 'PRD005', '2025-11-08 04:24:57', '2025-12-11 04:34:37'),
(6, 'Sandwich Bread', 1, 3, 160.00, 300, NULL, NULL, 1, '800gm', NULL, '2025-11-07', '2026-11-02', 'PRD006', '2025-11-08 04:24:57', '2025-12-11 08:54:59'),
(7, 'Milk Bread', 1, 3, 100.00, 89, NULL, NULL, 1, '400gm', NULL, '2025-11-05', '2026-01-02', 'PRD007', '2025-11-08 04:24:57', '2025-12-11 04:34:39'),
(8, 'Raisins Sesame Roll', 1, 4, 90.00, 89, NULL, NULL, 1, 'N/A', NULL, '2025-11-07', '2026-07-28', 'PRD008', '2025-11-08 04:24:57', '2025-12-11 04:34:38'),
(9, 'Sandwich Bread', 1, 5, 200.00, 89, NULL, NULL, 1, '1000gm', NULL, '2025-11-06', '2026-03-13', 'PRD009', '2025-11-08 04:24:57', '2025-12-11 04:34:34'),
(10, 'Chicken Cheese Burger', 2, 6, 120.00, 0, NULL, NULL, 1, 'N/A', NULL, '2025-11-03', '2026-04-25', 'PRD010', '2025-11-08 04:24:57', '2025-11-11 06:19:57'),
(11, 'Chicken Crispy Burger', 2, 6, 140.00, 0, NULL, NULL, 1, 'N/A', NULL, '2025-11-07', '2026-04-20', 'PRD011', '2025-11-08 04:24:57', '2025-11-11 06:19:55'),
(12, 'Chicken Mexican Burger', 2, 6, 140.00, 0, NULL, NULL, 1, 'N/A', NULL, '2025-11-06', '2026-10-27', 'PRD012', '2025-11-08 04:24:57', '2025-11-30 04:29:31'),
(13, 'Chicken Sub Burger', 2, 6, 130.00, 0, NULL, NULL, 1, 'N/A', NULL, '2025-11-04', '2026-10-30', 'PRD013', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(14, 'Chicken Baby Burger', 2, 6, 50.00, 0, NULL, NULL, 1, 'N/A', NULL, '2025-11-02', '2025-12-15', 'PRD014', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(15, 'Chicken Mini Burger', 2, 6, 50.00, 0, NULL, NULL, 1, 'N/A', NULL, '2025-11-01', '2026-01-21', 'PRD015', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(16, 'Chicken Pie', 2, 9, 70.00, 0, NULL, NULL, 1, 'N/A', NULL, '2025-11-07', '2026-05-03', 'PRD016', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(17, 'Chicken Bun', 2, 10, 80.00, 0, NULL, NULL, 1, 'N/A', NULL, '2025-11-06', '2026-04-22', 'PRD017', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(18, 'Chicken Patties', 2, 10, 80.00, 0, NULL, NULL, 1, 'N/A', NULL, '2025-11-04', '2026-07-09', 'PRD018', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(19, 'Vegetable Patties', 2, 10, 50.00, 0, NULL, NULL, 1, 'N/A', NULL, '2025-11-07', '2026-09-24', 'PRD019', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(20, 'Vegetable Roll', 2, 7, 40.00, 0, NULL, NULL, 1, 'N/A', NULL, '2025-11-04', '2026-10-13', 'PRD020', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(21, 'Shwarma Roll', 2, 7, 120.00, 0, NULL, NULL, 1, 'N/A', NULL, '2025-11-05', '2026-06-05', 'PRD021', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(22, 'Meduim Pizza', 2, 9, 150.00, 0, NULL, NULL, 1, 'N/A', NULL, '2025-11-03', '2026-07-02', 'PRD022', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(23, 'Chicken Sandwich', 2, 8, 100.00, 0, NULL, NULL, 1, 'N/A', NULL, '2025-11-03', '2026-05-14', 'PRD023', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(24, 'Club Sandwich', 2, 8, 120.00, 0, NULL, NULL, 1, 'N/A', NULL, '2025-11-03', '2026-07-04', 'PRD024', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(25, 'Grill Sandwich', 2, 8, 100.00, 0, NULL, NULL, 1, 'N/A', NULL, '2025-11-01', '2026-10-11', 'PRD025', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(26, 'Sub Sandwich', 2, 8, 120.00, 0, NULL, NULL, 1, 'N/A', NULL, '2025-11-03', '2026-10-03', 'PRD026', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(27, 'Russian Roll', 2, 7, 80.00, 0, NULL, NULL, 1, 'N/A', NULL, '2025-11-05', '2026-03-11', 'PRD027', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(28, 'Plain Toast', 3, 11, 120.00, 0, NULL, NULL, 1, '400gm', NULL, '2025-11-03', '2026-03-26', 'PRD028', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(29, 'Butter Toast (White)', 3, 11, 120.00, 0, NULL, NULL, 1, '400gm', NULL, '2025-11-04', '2026-09-12', 'PRD029', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(30, 'Butter Toast (Mix)', 3, 11, 150.00, 0, NULL, NULL, 1, '400gm', NULL, '2025-11-02', '2026-04-18', 'PRD030', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(31, 'Bela Toast', 3, 11, 130.00, 0, NULL, NULL, 1, '400gm', NULL, '2025-11-05', '2026-01-27', 'PRD031', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(32, 'Sugar Free Toast', 3, 11, 130.00, 0, NULL, NULL, 1, '130gm', NULL, '2025-11-06', '2026-08-25', 'PRD032', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(33, 'Bread Toast', 3, 11, 130.00, 0, NULL, NULL, 1, '350gm', NULL, '2025-11-04', '2026-02-04', 'PRD033', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(34, 'Finger Toast', 3, 11, 130.00, 0, NULL, NULL, 1, '350gm', NULL, '2025-11-01', '2026-01-22', 'PRD034', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(35, 'Orange Cookies', 3, 12, 600.00, 0, NULL, NULL, 1, '1kg', NULL, '2025-11-07', '2026-10-28', 'PRD035', '2025-11-08 04:24:57', '2025-11-30 04:29:43'),
(36, 'Ovaltine Cookies', 3, 12, 600.00, 0, NULL, NULL, 1, '1kg', NULL, '2025-11-05', '2026-07-04', 'PRD036', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(37, 'Horlicks Cookies', 3, 12, 600.00, 0, NULL, NULL, 1, '1kg', NULL, '2025-11-05', '2026-08-18', 'PRD037', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(38, 'Salted Cookies', 3, 12, 500.00, 0, NULL, NULL, 1, '1kg', NULL, '2025-11-05', '2026-09-15', 'PRD038', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(39, 'Salted Milky', 3, 12, 550.00, 0, NULL, NULL, 1, '1kg', NULL, '2025-11-05', '2026-10-13', 'PRD039', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(40, 'Dry Cake', 3, 14, 600.00, 0, NULL, NULL, 1, '1kg', NULL, '2025-11-06', '2026-08-14', 'PRD040', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(41, 'Chocolate Dry Cake', 3, 14, 600.00, 0, NULL, NULL, 1, '1kg', NULL, '2025-11-05', '2026-10-28', 'PRD041', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(42, 'Nut Cookies', 3, 13, 600.00, 0, NULL, NULL, 1, '1kg', NULL, '2025-11-01', '2026-01-25', 'PRD042', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(43, 'Almond Cookies', 3, 13, 600.00, 0, NULL, NULL, 1, '1kg', NULL, '2025-11-01', '2026-05-12', 'PRD043', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(44, 'Raisins Cookies', 3, 13, 600.00, 0, NULL, NULL, 1, '1kg', NULL, '2025-11-04', '2026-04-12', 'PRD044', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(45, 'Love Cookies', 3, 15, 600.00, 0, NULL, NULL, 1, '1kg', NULL, '2025-11-01', '2026-01-24', 'PRD045', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(46, 'Cheese Puff', 3, 15, 600.00, 0, NULL, NULL, 1, '1kg', NULL, '2025-11-03', '2026-10-07', 'PRD046', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(47, 'Sugar Puff', 3, 15, 500.00, 0, NULL, NULL, 1, '1kg', NULL, '2025-11-01', '2026-07-31', 'PRD047', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(48, 'Spicy Puff', 3, 15, 480.00, 0, NULL, NULL, 1, '1kg', NULL, '2025-11-02', '2026-08-26', 'PRD048', '2025-11-08 04:24:57', '2025-11-08 04:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `purchasecarts`
--

CREATE TABLE `purchasecarts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `chalan_reg` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `branch` int(11) NOT NULL DEFAULT 0,
  `order_qty` int(11) NOT NULL DEFAULT 1,
  `ready_qty` int(11) NOT NULL DEFAULT 0,
  `delivery_qty` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `remark` varchar(255) DEFAULT NULL,
  `unit_price` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorders`
--

CREATE TABLE `purchaseorders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `delivary_date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `branch` int(11) NOT NULL DEFAULT 0,
  `chalan_reg` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  `discount` decimal(12,2) DEFAULT NULL,
  `vat` decimal(12,2) DEFAULT NULL,
  `payable` decimal(12,2) DEFAULT NULL,
  `pay` decimal(12,2) DEFAULT NULL,
  `due` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_returns`
--

CREATE TABLE `purchase_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reg` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reg` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `stockIn` int(11) NOT NULL DEFAULT 0,
  `stockOut` int(11) NOT NULL DEFAULT 0,
  `remark` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `reg`, `date`, `product_id`, `stockIn`, `stockOut`, `remark`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, '2025-11-08', 1, 10, 0, 'In from factory', 2, '2025-11-08 05:29:07', '2025-11-08 05:29:07'),
(2, 0, '2025-11-08', 2, 10, 0, 'In from factory', 2, '2025-11-08 05:29:09', '2025-11-08 05:29:09'),
(3, 20251108010001, '2025-11-08', 1, 0, 1, 'Out', 1, '2025-11-08 05:29:12', '2025-11-08 05:29:12'),
(4, 20251108010001, '2025-11-08', 2, 0, 1, 'Out', 1, '2025-11-08 05:29:13', '2025-11-08 05:29:13'),
(5, 20251108010002, '2025-11-08', 1, 0, 1, 'Out', 1, '2025-11-08 08:36:07', '2025-11-08 08:36:07'),
(6, 20251108010002, '2025-11-08', 2, 0, 1, 'Out', 1, '2025-11-08 08:36:08', '2025-11-08 08:36:08'),
(7, 0, '2025-11-08', 3, 100, 0, 'In from factory', 2, '2025-11-08 08:39:01', '2025-11-08 08:39:01'),
(8, 0, '2025-11-08', 1, 50, 0, 'In from factory', 2, '2025-11-08 08:39:05', '2025-11-08 08:39:05'),
(9, 0, '2025-11-08', 2, 50, 0, 'In from factory', 2, '2025-11-08 08:39:08', '2025-11-08 08:39:08'),
(10, 20251108010003, '2025-11-08', 1, 0, 1, 'Out', 1, '2025-11-08 08:39:11', '2025-11-08 08:39:11'),
(11, 20251108010003, '2025-11-08', 2, 0, 1, 'Out', 1, '2025-11-08 08:39:11', '2025-11-08 08:39:11'),
(12, 20251108010003, '2025-11-08', 3, 0, 1, 'Out', 1, '2025-11-08 08:39:12', '2025-11-08 08:39:12'),
(13, 20251108010004, '2025-11-08', 1, 0, 1, 'Out', 1, '2025-11-08 09:00:39', '2025-11-08 09:00:39'),
(14, 20251108010004, '2025-11-08', 2, 0, 1, 'Out', 1, '2025-11-08 09:00:40', '2025-11-08 09:00:40'),
(15, 20251108010004, '2025-11-08', 3, 0, 1, 'Out', 1, '2025-11-08 09:00:40', '2025-11-08 09:00:40'),
(16, 20251108010005, '2025-11-08', 1, 0, 1, 'Out', 1, '2025-11-08 09:09:05', '2025-11-08 09:09:05'),
(17, 20251108010005, '2025-11-08', 2, 0, 1, 'Out', 1, '2025-11-08 09:09:05', '2025-11-08 09:09:05'),
(18, 20251108010005, '2025-11-08', 3, 0, 1, 'Out', 1, '2025-11-08 09:09:06', '2025-11-08 09:09:06'),
(19, 20251108010006, '2025-11-08', 1, 0, 1, 'Out', 1, '2025-11-08 09:09:22', '2025-11-08 09:09:22'),
(20, 20251108010006, '2025-11-08', 2, 0, 1, 'Out', 1, '2025-11-08 09:09:22', '2025-11-08 09:09:22'),
(21, 20251108010006, '2025-11-08', 3, 0, 1, 'Out', 1, '2025-11-08 09:09:22', '2025-11-08 09:09:22'),
(22, 20251108010007, '2025-11-08', 1, 0, 1, 'Out', 1, '2025-11-08 09:14:17', '2025-11-08 09:14:17'),
(23, 20251108010007, '2025-11-08', 2, 0, 1, 'Out', 1, '2025-11-08 09:14:18', '2025-11-08 09:14:18'),
(24, 20251108010007, '2025-11-08', 3, 0, 1, 'Out', 1, '2025-11-08 09:14:18', '2025-11-08 09:14:18'),
(25, 20251108010008, '2025-11-08', 1, 0, 1, 'Out', 1, '2025-11-08 10:41:03', '2025-11-08 10:41:03'),
(26, 20251108010008, '2025-11-08', 3, 0, 1, 'Out', 1, '2025-11-08 10:41:04', '2025-11-08 10:41:04'),
(27, 20251108010008, '2025-11-08', 2, 0, 1, 'Out', 1, '2025-11-08 10:41:05', '2025-11-08 10:41:05'),
(28, 20251108010009, '2025-11-08', 1, 0, 1, 'Out', 1, '2025-11-08 10:43:31', '2025-11-08 10:43:31'),
(29, 20251108010009, '2025-11-08', 2, 0, 1, 'Out', 1, '2025-11-08 10:43:32', '2025-11-08 10:43:32'),
(30, 20251108010009, '2025-11-08', 3, 0, 1, 'Out', 1, '2025-11-08 10:43:32', '2025-11-08 10:43:32'),
(31, 20251108010010, '2025-11-08', 1, 0, 1, 'Out', 1, '2025-11-08 10:46:43', '2025-11-08 10:46:43'),
(32, 20251108010010, '2025-11-08', 2, 0, 1, 'Out', 1, '2025-11-08 10:46:43', '2025-11-08 10:46:43'),
(33, 20251108010010, '2025-11-08', 3, 0, 1, 'Out', 1, '2025-11-08 10:46:44', '2025-11-08 10:46:44'),
(34, 20251108010011, '2025-11-08', 1, 0, 1, 'Out', 1, '2025-11-08 10:53:41', '2025-11-08 10:53:41'),
(35, 20251108010011, '2025-11-08', 2, 0, 1, 'Out', 1, '2025-11-08 10:53:42', '2025-11-08 10:53:42'),
(36, 20251108010011, '2025-11-08', 3, 0, 1, 'Out', 1, '2025-11-08 10:53:43', '2025-11-08 10:53:43'),
(37, 20251108010012, '2025-11-08', 1, 0, 1, 'Out', 1, '2025-11-08 11:01:21', '2025-11-08 11:01:21'),
(38, 20251108010012, '2025-11-08', 2, 0, 1, 'Out', 1, '2025-11-08 11:01:22', '2025-11-08 11:01:22'),
(39, 20251108010012, '2025-11-08', 3, 0, 1, 'Out', 1, '2025-11-08 11:01:22', '2025-11-08 11:01:22'),
(40, 20251108010013, '2025-11-08', 1, 0, 1, 'Out', 1, '2025-11-08 11:03:17', '2025-11-08 11:03:17'),
(41, 20251108010013, '2025-11-08', 2, 0, 1, 'Out', 1, '2025-11-08 11:03:17', '2025-11-08 11:03:17'),
(42, 20251108010013, '2025-11-08', 3, 0, 1, 'Out', 1, '2025-11-08 11:03:18', '2025-11-08 11:03:18'),
(43, 20251108010014, '2025-11-08', 1, 0, 1, 'Out', 1, '2025-11-08 11:17:02', '2025-11-08 11:17:02'),
(44, 20251108010014, '2025-11-08', 2, 0, 1, 'Out', 1, '2025-11-08 11:17:02', '2025-11-08 11:17:02'),
(45, 20251108010014, '2025-11-08', 3, 0, 1, 'Out', 1, '2025-11-08 11:17:03', '2025-11-08 11:17:03'),
(46, 20251108010015, '2025-11-08', 1, 0, 1, 'Out', 1, '2025-11-08 11:17:20', '2025-11-08 11:17:20'),
(47, 20251108010016, '2025-11-08', 1, 0, 1, 'Out', 1, '2025-11-08 12:02:07', '2025-11-08 12:02:07'),
(48, 20251108010016, '2025-11-08', 3, 0, 1, 'Out', 1, '2025-11-08 12:02:08', '2025-11-08 12:02:08'),
(49, 20251108010017, '2025-11-08', 1, 0, 1, 'Out', 1, '2025-11-08 12:02:28', '2025-11-08 12:02:28'),
(50, 20251108010017, '2025-11-08', 2, 0, 1, 'Out', 1, '2025-11-08 12:02:28', '2025-11-08 12:02:28'),
(51, 20251108010017, '2025-11-08', 3, 0, 1, 'Out', 1, '2025-11-08 12:02:29', '2025-11-08 12:02:29'),
(52, 20251108010018, '2025-11-08', 1, 0, 1, 'Out', 1, '2025-11-08 12:17:34', '2025-11-08 12:17:34'),
(53, 20251108010018, '2025-11-08', 2, 0, 1, 'Out', 1, '2025-11-08 12:17:35', '2025-11-08 12:17:35'),
(54, 20251108010018, '2025-11-08', 3, 0, 1, 'Out', 1, '2025-11-08 12:17:36', '2025-11-08 12:17:36'),
(55, 20251111010019, '2025-11-11', 1, 0, 1, 'Out', 1, '2025-11-11 06:19:26', '2025-11-11 06:19:26'),
(56, 20251111010019, '2025-11-11', 2, 0, 1, 'Out', 1, '2025-11-11 06:19:27', '2025-11-11 06:19:27'),
(57, 20251111010019, '2025-11-11', 3, 0, 1, 'Out', 1, '2025-11-11 06:19:27', '2025-11-11 06:19:27'),
(58, 0, '2025-11-11', 4, 100, 0, 'In from factory', 2, '2025-11-11 06:19:38', '2025-11-11 06:19:38'),
(59, 0, '2025-11-11', 5, 100, 0, 'In from factory', 2, '2025-11-11 06:19:41', '2025-11-11 06:19:41'),
(60, 0, '2025-11-11', 6, 100, 0, 'In from factory', 2, '2025-11-11 06:19:44', '2025-11-11 06:19:44'),
(61, 0, '2025-11-11', 7, 100, 0, 'In from factory', 2, '2025-11-11 06:19:47', '2025-11-11 06:19:47'),
(62, 0, '2025-11-11', 8, 100, 0, 'In from factory', 2, '2025-11-11 06:19:50', '2025-11-11 06:19:50'),
(63, 0, '2025-11-11', 9, 100, 0, 'In from factory', 2, '2025-11-11 06:19:53', '2025-11-11 06:19:53'),
(64, 0, '2025-11-11', 11, 100, 0, 'In from factory', 2, '2025-11-11 06:19:55', '2025-11-11 06:19:55'),
(65, 0, '2025-11-11', 10, 100, 0, 'In from factory', 2, '2025-11-11 06:19:57', '2025-11-11 06:19:57'),
(66, 20251111010019, '2025-11-11', 4, 0, 1, 'Out', 1, '2025-11-11 06:20:02', '2025-11-11 06:20:02'),
(67, 20251111010019, '2025-11-11', 5, 0, 1, 'Out', 1, '2025-11-11 06:20:03', '2025-11-11 06:20:03'),
(68, 20251111010019, '2025-11-11', 6, 0, 1, 'Out', 1, '2025-11-11 06:20:03', '2025-11-11 06:20:03'),
(72, 0, '2025-11-30', 1, 1, 0, 'In from factory', 2, '2025-11-30 04:29:11', '2025-11-30 04:29:11'),
(73, 0, '2025-11-30', 12, 1000, 0, 'In from factory', 2, '2025-11-30 04:29:31', '2025-11-30 04:29:31'),
(74, 0, '2025-11-30', 35, 200, 0, 'In from factory', 2, '2025-11-30 04:29:43', '2025-11-30 04:29:43'),
(75, 0, '2025-12-02', 1, 1, 0, 'In from factory', 2, '2025-12-02 06:58:08', '2025-12-02 06:58:08'),
(76, 0, '2025-12-02', 1, 1, 0, 'In from factory', 2, '2025-12-02 06:58:27', '2025-12-02 06:58:27'),
(77, 0, '2025-12-09', 1, 100, 0, 'In from factory', 2, '2025-12-09 09:43:27', '2025-12-09 09:43:27'),
(78, 0, '2025-12-09', 2, 100, 0, 'In from factory', 2, '2025-12-09 09:43:30', '2025-12-09 09:43:30'),
(79, 0, '2025-12-09', 4, 100, 0, 'In from factory', 2, '2025-12-09 09:43:33', '2025-12-09 09:43:33'),
(80, 0, '2025-12-09', 5, 100, 0, 'In from factory', 2, '2025-12-09 09:43:36', '2025-12-09 09:43:36'),
(81, 0, '2025-12-11', 1, 100, 0, 'In from factory', 2, '2025-12-11 04:23:24', '2025-12-11 04:23:24'),
(82, 0, '2025-12-11', 1, 100, 0, 'In from factory', 2, '2025-12-11 04:23:37', '2025-12-11 04:23:37'),
(83, 0, '2025-12-11', 2, 100, 0, 'In from factory', 2, '2025-12-11 04:23:41', '2025-12-11 04:23:41'),
(84, 0, '2025-12-11', 3, 100, 0, 'In from factory', 2, '2025-12-11 04:23:44', '2025-12-11 04:23:44'),
(85, 0, '2025-12-11', 4, 100, 0, 'In from factory', 2, '2025-12-11 04:23:47', '2025-12-11 04:23:47'),
(86, 0, '2025-12-11', 5, 100, 0, 'In from factory', 2, '2025-12-11 04:23:52', '2025-12-11 04:23:52'),
(87, 0, '2025-12-11', 6, 1000, 0, 'In from factory', 2, '2025-12-11 04:23:56', '2025-12-11 04:23:56'),
(88, 0, '2025-12-11', 7, 100, 0, 'In from factory', 2, '2025-12-11 04:24:00', '2025-12-11 04:24:00'),
(89, 0, '2025-12-11', 8, 100, 0, 'In from factory', 2, '2025-12-11 04:24:04', '2025-12-11 04:24:04'),
(90, 0, '2025-12-11', 9, 100, 0, 'In from factory', 2, '2025-12-11 04:24:07', '2025-12-11 04:24:07'),
(91, 20251211020020, '2025-12-11', 1, 0, 1, 'Out', 1, '2025-12-11 04:24:11', '2025-12-11 04:24:11'),
(92, 20251211020020, '2025-12-11', 2, 0, 1, 'Out', 1, '2025-12-11 04:24:11', '2025-12-11 04:24:11'),
(93, 20251211020020, '2025-12-11', 3, 0, 1, 'Out', 1, '2025-12-11 04:24:12', '2025-12-11 04:24:12'),
(94, 20251211020020, '2025-12-11', 4, 0, 1, 'Out', 1, '2025-12-11 04:24:13', '2025-12-11 04:24:13'),
(95, 20251211020020, '2025-12-11', 5, 0, 1, 'Out', 1, '2025-12-11 04:24:13', '2025-12-11 04:24:13'),
(96, 20251211020020, '2025-12-11', 6, 0, 1, 'Out', 1, '2025-12-11 04:24:13', '2025-12-11 04:24:13'),
(97, 20251211020020, '2025-12-11', 7, 0, 1, 'Out', 1, '2025-12-11 04:24:14', '2025-12-11 04:24:14'),
(98, 20251211020020, '2025-12-11', 8, 0, 1, 'Out', 1, '2025-12-11 04:24:15', '2025-12-11 04:24:15'),
(99, 20251211020020, '2025-12-11', 9, 0, 1, 'Out', 1, '2025-12-11 04:24:15', '2025-12-11 04:24:15'),
(100, 20251211020021, '2025-12-11', 1, 0, 10, 'Out', 1, '2025-12-11 04:34:21', '2025-12-11 04:34:32'),
(101, 20251211020021, '2025-12-11', 2, 0, 50, 'Out', 1, '2025-12-11 04:34:22', '2025-12-11 04:34:30'),
(102, 20251211020021, '2025-12-11', 6, 0, 10, 'Out', 1, '2025-12-11 04:34:23', '2025-12-11 04:34:33'),
(103, 20251211020021, '2025-12-11', 5, 0, 10, 'Out', 1, '2025-12-11 04:34:24', '2025-12-11 04:34:37'),
(104, 20251211020021, '2025-12-11', 4, 0, 10, 'Out', 1, '2025-12-11 04:34:24', '2025-12-11 04:34:35'),
(105, 20251211020021, '2025-12-11', 9, 0, 10, 'Out', 1, '2025-12-11 04:34:25', '2025-12-11 04:34:34'),
(106, 20251211020021, '2025-12-11', 8, 0, 10, 'Out', 1, '2025-12-11 04:34:25', '2025-12-11 04:34:38'),
(107, 20251211020021, '2025-12-11', 7, 0, 10, 'Out', 1, '2025-12-11 04:34:26', '2025-12-11 04:34:39'),
(108, 0, '2025-12-11', 6, 0, 89, 'factory Return', 4, '2025-12-11 04:51:14', '2025-12-11 04:51:14'),
(109, 0, '2025-12-11', 1, 0, 9, 'factory Return', 4, '2025-12-11 04:52:40', '2025-12-11 04:52:40'),
(110, 0, '2025-12-11', 1, 0, 10, 'factory Return', 4, '2025-12-11 06:35:45', '2025-12-11 06:35:45'),
(117, 80635, '2025-12-11', 6, 0, 500, 'Branch Transfer', 4, '2025-12-11 06:52:38', '2025-12-11 06:52:38'),
(118, 62640, '2025-12-11', 1, 0, 10, 'Branch Transfer', 4, '2025-12-11 08:54:50', '2025-12-11 08:54:50'),
(119, 38975, '2025-12-11', 2, 0, 10, 'Branch Transfer', 4, '2025-12-11 08:54:53', '2025-12-11 08:54:53'),
(120, 61377, '2025-12-11', 6, 0, 100, 'Branch Transfer', 4, '2025-12-11 08:54:59', '2025-12-11 08:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Burger Series', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(2, 1, 'Bun Series', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(3, 1, 'Bread Series', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(4, 1, 'Rolls & Croissant', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(5, 1, 'Special Breads', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(6, 2, 'Burger Items', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(7, 2, 'Roll Items', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(8, 2, 'Sandwich Items', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(9, 2, 'Pizza & Pie', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(10, 2, 'Special Fast Food', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(11, 3, 'Toast Items', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(12, 3, 'Cookies', '2025-11-08 04:24:57', '2025-12-02 08:22:01'),
(13, 3, 'Nut Cookies', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(14, 3, 'Dry Cakes', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(15, 3, 'Special Biscuits', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(16, 4, 'Stick Series', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(17, 4, 'Garlic & Cheese', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(18, 4, 'Puffs Sweet', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(19, 4, 'Puffs Spicy', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(20, 4, 'Special Puffs', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(21, 5, 'Chocolate Series', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(22, 5, 'Vanilla & Mocha', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(23, 5, 'Fruit Cakes', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(24, 5, 'Designer Cakes', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(25, 5, 'Premium Cakes', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(26, 6, 'Roshogolla & Jam', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(27, 6, 'Chom Chom Series', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(28, 6, 'Sondesh Items', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(29, 6, 'Laddu & Doi', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(30, 6, 'Special Traditional', '2025-11-08 04:24:57', '2025-11-08 04:24:57'),
(31, 14, 'Soft Drinks', '2025-12-02 07:26:32', '2025-12-02 07:26:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_transfers`
--
ALTER TABLE `branch_transfers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_transfers_product_id_foreign` (`product_id`),
  ADD KEY `branch_transfers_user_id_foreign` (`user_id`),
  ADD KEY `branch_transfers_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_email_unique` (`email`);

--
-- Indexes for table `due_collections`
--
ALTER TABLE `due_collections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `due_collections_order_id_foreign` (`order_id`),
  ADD KEY `due_collections_user_id_foreign` (`user_id`);

--
-- Indexes for table `excategories`
--
ALTER TABLE `excategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_catid_foreign` (`catId`),
  ADD KEY `expenses_subcatid_foreign` (`subcatId`),
  ADD KEY `expenses_userid_foreign` (`userId`);

--
-- Indexes for table `expired_products`
--
ALTER TABLE `expired_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expired_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `exsubcategories`
--
ALTER TABLE `exsubcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exsubcategories_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `factory_stocks`
--
ALTER TABLE `factory_stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `factory_stocks_product_id_foreign` (`product_id`),
  ADD KEY `factory_stocks_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_reg_unique` (`reg`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_methods_name_unique` (`name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `purchasecarts`
--
ALTER TABLE `purchasecarts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `purchaseorders_chalan_reg_unique` (`chalan_reg`),
  ADD KEY `purchaseorders_user_id_foreign` (`user_id`);

--
-- Indexes for table `purchase_returns`
--
ALTER TABLE `purchase_returns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_returns_user_id_foreign` (`user_id`),
  ADD KEY `purchase_returns_product_id_foreign` (`product_id`),
  ADD KEY `purchase_returns_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_product_id_foreign` (`product_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `branch_transfers`
--
ALTER TABLE `branch_transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `due_collections`
--
ALTER TABLE `due_collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `excategories`
--
ALTER TABLE `excategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expired_products`
--
ALTER TABLE `expired_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exsubcategories`
--
ALTER TABLE `exsubcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `factory_stocks`
--
ALTER TABLE `factory_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `purchasecarts`
--
ALTER TABLE `purchasecarts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_returns`
--
ALTER TABLE `purchase_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branch_transfers`
--
ALTER TABLE `branch_transfers`
  ADD CONSTRAINT `branch_transfers_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `branch_transfers_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `branch_transfers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `due_collections`
--
ALTER TABLE `due_collections`
  ADD CONSTRAINT `due_collections_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `due_collections_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_catid_foreign` FOREIGN KEY (`catId`) REFERENCES `excategories` (`id`),
  ADD CONSTRAINT `expenses_subcatid_foreign` FOREIGN KEY (`subcatId`) REFERENCES `exsubcategories` (`id`),
  ADD CONSTRAINT `expenses_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `admins` (`id`);

--
-- Constraints for table `expired_products`
--
ALTER TABLE `expired_products`
  ADD CONSTRAINT `expired_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `exsubcategories`
--
ALTER TABLE `exsubcategories`
  ADD CONSTRAINT `exsubcategories_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `excategories` (`id`);

--
-- Constraints for table `factory_stocks`
--
ALTER TABLE `factory_stocks`
  ADD CONSTRAINT `factory_stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `factory_stocks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`);

--
-- Constraints for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  ADD CONSTRAINT `purchaseorders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `purchase_returns`
--
ALTER TABLE `purchase_returns`
  ADD CONSTRAINT `purchase_returns_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `purchase_returns_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `purchase_returns_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
