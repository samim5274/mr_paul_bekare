-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 26, 2025 at 05:01 AM
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
-- Database: `bkmsdb`
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `facebook_id`, `google_id`, `github_id`, `password`, `photo`, `phone`, `address`, `dob`, `branch_id`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sabbir Hossain', 'sabbir@gmail.com', NULL, NULL, NULL, '$2y$12$MCADF4zAqdJJ4EDlDG4MTuIivOTeDvdW2Tr7tACjjX1xFi3KtJCam', 'user-1753961928.jpg', '1762141514', 'Dhaka', '1999-07-07', 1, 1, 1, '2025-07-20 10:29:17', '2025-08-07 05:24:34'),
(2, 'Hossain', 'sabbir2@gmail.com', NULL, NULL, NULL, '$2y$12$6wSniueGHC5jvKQkm0YO.O3sp6mJ1Entu7foD3teYIPU1TQzBJSfe', 'user-1754716873.png', '1762141514', 'Dhaka', '2005-08-03', 2, 3, 1, '2025-07-20 11:45:35', '2025-08-08 05:21:13'),
(4, 'Milon', 'sabbir3@gmail.com', NULL, NULL, NULL, '$2y$12$DABvMVjEPrL5nDbkWzXMTOuC1CD0moNcHkcqzGKJs9qWWnHEDHQde', NULL, '1762141514', 'Dhaka', '2005-08-03', 2, 4, 1, '2025-07-20 11:45:51', '2025-09-19 04:55:54'),
(5, 'Monir Hossain', 'monir@gmail.com', NULL, NULL, NULL, '$2y$12$MZDiecuA.sgUIlnlbe5uHOtX.c9sIu4a1qtNHfuZX4TLiKyIcxs0W', NULL, NULL, NULL, NULL, 1, 3, 1, '2025-08-07 05:29:52', '2025-08-07 05:52:38'),
(6, 'Rabby Hossain', 'rabby@gmail.com', NULL, NULL, NULL, '$2y$12$PIwkn6XvkE.Wlt8a8.DkruR1lpEV236fqv3u1AEf.XXfWQpMs5yJC', NULL, NULL, NULL, NULL, 1, 4, 0, '2025-08-07 05:48:33', '2025-08-07 05:52:32'),
(7, 'Mofiz Hossain', 'mofiz@gmail.com', NULL, NULL, NULL, '$2y$12$crS/EFHSYNMkEWJIuxdI.Os3Im1S/p0uovWPuBuBEY8WRLZW4Cov.', NULL, NULL, NULL, NULL, 1, 3, 1, '2025-08-07 05:49:30', '2025-08-07 05:50:44'),
(8, 'Asif Hossain', 'asif@gmail.com', NULL, NULL, NULL, '$2y$12$JLOxg0XgQF899xU.XSuexekbU/lAYROd6ov3WPAaD6a3Y9LfRSSVC', NULL, NULL, NULL, NULL, 0, 0, 1, '2025-09-18 14:02:50', '2025-09-18 14:03:12'),
(9, 'Akram Uddin', 'akram@gmail.com', NULL, NULL, NULL, '$2y$12$UnRRQpZ8fmrjDEIKs2dH6eqGiZRnHKwO9lci4ItsaQ8iVz0Jr5V.C', 'user-1758343098.png', '0176216474', NULL, '1998-09-12', 2, 2, 1, '2025-09-19 04:36:59', '2025-09-19 04:39:21');

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
(1, 'Main Branch', 'Gulshan, Dhaka', '01700000001', 1, '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(2, 'Uttara Branch', 'Uttara, Dhaka', '01700000002', 1, '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(3, 'Chittagong Branch', 'Agrabad, Chittagong', '01700000003', 1, '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(4, 'Main Branch', 'Gulshan, Dhaka', '01700000001', 1, '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(5, 'Uttara Branch', 'Uttara, Dhaka', '01700000002', 1, '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(6, 'Chittagong Branch', 'Agrabad, Chittagong', '01700000003', 1, '2025-09-25 15:24:09', '2025-09-25 15:24:09');

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
  `price` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `reg`, `date`, `user_id`, `product_id`, `branch_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 20250925010001, '2025-09-25', 1, 1, 1, 1, 40, '2025-09-25 15:25:12', '2025-09-25 15:25:12'),
(2, 20250925010001, '2025-09-25', 1, 2, 1, 1, 50, '2025-09-25 15:25:13', '2025-09-25 15:25:13'),
(3, 20250925010001, '2025-09-25', 1, 3, 1, 1, 40, '2025-09-25 15:25:13', '2025-09-25 15:25:13'),
(4, 20250925010001, '2025-09-25', 1, 4, 1, 1, 90, '2025-09-25 15:25:14', '2025-09-25 15:25:14'),
(5, 20250925010001, '2025-09-25', 1, 5, 1, 1, 80, '2025-09-25 15:25:15', '2025-09-25 15:25:15'),
(6, 20250925010002, '2025-09-25', 1, 5, 1, 1, 80, '2025-09-25 15:26:29', '2025-09-25 15:26:29'),
(7, 20250925010002, '2025-09-25', 1, 6, 1, 1, 160, '2025-09-25 15:26:30', '2025-09-25 15:26:30'),
(8, 20250925010002, '2025-09-25', 1, 9, 1, 1, 200, '2025-09-25 15:26:31', '2025-09-25 15:26:31'),
(9, 20250925010002, '2025-09-25', 1, 22, 1, 1, 150, '2025-09-25 15:26:32', '2025-09-25 15:26:32'),
(10, 20250925010002, '2025-09-25', 1, 33, 1, 1, 130, '2025-09-25 15:26:33', '2025-09-25 15:26:33'),
(11, 20250925010003, '2025-09-25', 1, 5, 1, 1, 80, '2025-09-25 15:46:01', '2025-09-25 15:46:01'),
(12, 20250925010003, '2025-09-25', 1, 6, 1, 1, 160, '2025-09-25 15:46:02', '2025-09-25 15:46:02'),
(13, 20250925010003, '2025-09-25', 1, 9, 1, 1, 200, '2025-09-25 15:46:03', '2025-09-25 15:46:03'),
(14, 20250925010003, '2025-09-25', 1, 10, 1, 1, 120, '2025-09-25 15:46:04', '2025-09-25 15:46:04');

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
(1, 'BREAD & BUNS', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(2, 'FAST FOOD ITEMS', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(3, 'TOAST & BISCUITS', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(4, 'STICK & PUFFS', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(5, 'CELEBRATION CAKE', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(6, 'SWEET', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(7, 'BREAD & BUNS', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(8, 'FAST FOOD ITEMS', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(9, 'TOAST & BISCUITS', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(10, 'STICK & PUFFS', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(11, 'CELEBRATION CAKE', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(12, 'SWEET', '2025-09-25 15:24:08', '2025-09-25 15:24:08');

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
(1, 'Mr. Paul Bakers', '150, BB Road, Suraiya Tower, narayangonj-1400', 'mrpaulbakers2025@gmail.com', '01675962338', 'https://bekare.deegau.com/', '2025-09-25 06:35:26', '2025-09-25 06:35:26');

-- --------------------------------------------------------

--
-- Table structure for table `due_collections`
--

CREATE TABLE `due_collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `reg` bigint(20) UNSIGNED DEFAULT NULL,
  `due` bigint(20) UNSIGNED DEFAULT NULL,
  `pay` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_date` date NOT NULL DEFAULT '2025-09-25',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `note` varchar(255) NOT NULL DEFAULT 'N/A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `due_collections`
--

INSERT INTO `due_collections` (`id`, `order_id`, `reg`, `due`, `pay`, `payment_date`, `user_id`, `note`, `created_at`, `updated_at`) VALUES
(1, 2, 20250925010002, 270, 20, '2025-09-25', 1, 'N/A', '2025-09-25 15:37:01', '2025-09-25 15:38:03');

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
(1, 'Food', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(2, 'Transport', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(3, 'Entertainment', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(4, 'Bills & Utilities', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(5, 'Health', '2025-09-25 06:35:26', '2025-09-25 06:35:26');

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
  `amount` int(11) NOT NULL,
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
  `price` int(11) NOT NULL,
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
(1, 1, 'Groceries', '2025-09-25 06:39:18', '2025-09-25 06:39:18'),
(2, 1, 'Restaurants', '2025-09-25 06:39:18', '2025-09-25 06:39:18'),
(3, 2, 'Bus', '2025-09-25 06:39:18', '2025-09-25 06:39:18'),
(4, 2, 'Taxi', '2025-09-25 06:39:18', '2025-09-25 06:39:18'),
(5, 3, 'Movies', '2025-09-25 06:39:18', '2025-09-25 06:39:18'),
(6, 3, 'Games', '2025-09-25 06:39:18', '2025-09-25 06:39:18'),
(7, 4, 'Electricity', '2025-09-25 06:39:18', '2025-09-25 06:39:18'),
(8, 4, 'Water', '2025-09-25 06:39:18', '2025-09-25 06:39:18'),
(9, 5, 'Medicine', '2025-09-25 06:39:18', '2025-09-25 06:39:18'),
(10, 5, 'Doctor', '2025-09-25 06:39:18', '2025-09-25 06:39:18');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2025_07_09_050619_create_categories_table', 1),
(7, '2025_07_09_051129_create_subcategories_table', 1),
(8, '2025_07_09_051306_create_products_table', 1),
(9, '2025_07_10_054037_create_payment_methods_table', 1),
(10, '2025_07_10_054038_create_admins_table', 1),
(11, '2025_07_10_054039_create_branches_table', 1),
(12, '2025_07_10_054040_create_orders_table', 1),
(13, '2025_07_10_054041_create_carts_table', 1),
(14, '2025_07_10_062043_create_stocks_table', 1),
(15, '2025_07_14_080418_create_purchasecarts_table', 1),
(16, '2025_07_14_095009_create_purchaseorders_table', 1),
(17, '2025_07_20_105349_create_excategories_table', 1),
(18, '2025_07_20_105356_create_exsubcategories_table', 1),
(19, '2025_07_20_105407_create_expenses_table', 1),
(20, '2025_08_09_101821_create_companies_table', 1),
(21, '2025_09_23_115550_create_due_collections_table', 1),
(22, '2025_09_23_153947_create_expired_products_table', 1);

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
  `total` bigint(20) UNSIGNED DEFAULT NULL,
  `discount` bigint(20) UNSIGNED DEFAULT NULL,
  `vat` bigint(20) UNSIGNED DEFAULT NULL,
  `payable` bigint(20) UNSIGNED DEFAULT NULL,
  `pay` bigint(20) UNSIGNED DEFAULT NULL,
  `due` bigint(20) DEFAULT NULL,
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
(1, '2025-09-25', 1, 1, 20250925010001, 300, 20, 45, 325, 325, 0, 1, 2, '0', 0, '2025-09-25 15:25:52', '2025-09-25 15:25:52'),
(2, '2025-09-25', 1, 1, 20250925010002, 720, 20, 108, 808, 538, 308, 1, 3, 'Samim Hossain', 1762164746, '2025-09-25 15:26:55', '2025-09-25 15:38:03'),
(3, '2025-09-25', 1, 1, 20250925010003, 560, 44, 84, 600, 500, 100, 1, 3, 'Monir Hossain', 1762164746, '2025-09-25 15:47:01', '2025-09-25 15:47:01');

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
(1, 'Cash', 'Cash Payment', 1, '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(2, 'Credit Card', 'Pay via credit/debit card', 1, '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(3, 'Bkash', 'Mobile banking payment', 1, '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(4, 'Nagad', 'Mobile banking payment', 1, '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(5, 'Rocket', 'Mobile banking payment', 1, '2025-09-25 06:35:26', '2025-09-25 06:35:26');

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
  `price` int(11) NOT NULL,
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
(1, 'Burger Bun', 7, 80, 40, 14, NULL, NULL, 1, '75gm (2pcs)', NULL, '2025-09-21', '2026-02-18', 'PRD001', '2025-09-25 15:24:09', '2025-09-25 15:25:12'),
(2, 'Tiffin Bun', 7, 81, 50, 47, NULL, NULL, 1, '105gm (4pcs)', NULL, '2025-09-22', '2026-05-09', 'PRD002', '2025-09-25 15:24:09', '2025-09-25 15:25:13'),
(3, 'Butter Bun', 7, 81, 40, 39, NULL, NULL, 1, '100gm', NULL, '2025-09-21', '2026-07-12', 'PRD003', '2025-09-25 15:24:09', '2025-09-25 15:25:13'),
(4, 'Family Bun', 7, 81, 90, 9, NULL, NULL, 1, '220gm', NULL, '2025-09-18', '2025-10-26', 'PRD004', '2025-09-25 15:24:09', '2025-09-25 15:25:14'),
(5, 'Sandwich Bread', 7, 82, 80, 37, NULL, NULL, 1, '400gm', NULL, '2025-09-19', '2026-06-19', 'PRD005', '2025-09-25 15:24:09', '2025-09-25 15:46:01'),
(6, 'Sandwich Bread', 7, 82, 160, 9, NULL, NULL, 1, '800gm', NULL, '2025-09-24', '2025-12-08', 'PRD006', '2025-09-25 15:24:09', '2025-09-25 15:46:02'),
(7, 'Milk Bread', 7, 82, 100, 13, NULL, NULL, 1, '400gm', NULL, '2025-09-21', '2025-11-26', 'PRD007', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(8, 'Raisins Sesame Roll', 7, 83, 90, 15, NULL, NULL, 1, 'N/A', NULL, '2025-09-21', '2025-12-01', 'PRD008', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(9, 'Sandwich Bread', 7, 84, 200, 18, NULL, NULL, 1, '1000gm', NULL, '2025-09-23', '2026-04-21', 'PRD009', '2025-09-25 15:24:09', '2025-09-25 15:46:03'),
(10, 'Chicken Cheese Burger', 8, 85, 120, 37, NULL, NULL, 1, 'N/A', NULL, '2025-09-19', '2026-07-21', 'PRD010', '2025-09-25 15:24:09', '2025-09-25 15:46:04'),
(11, 'Chicken Crispy Burger', 8, 85, 140, 17, NULL, NULL, 1, 'N/A', NULL, '2025-09-18', '2026-09-10', 'PRD011', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(12, 'Chicken Mexican Burger', 8, 85, 140, 5, NULL, NULL, 1, 'N/A', NULL, '2025-09-19', '2025-11-27', 'PRD012', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(13, 'Chicken Sub Burger', 8, 85, 130, 6, NULL, NULL, 1, 'N/A', NULL, '2025-09-21', '2026-02-24', 'PRD013', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(14, 'Chicken Baby Burger', 8, 85, 50, 19, NULL, NULL, 1, 'N/A', NULL, '2025-09-24', '2026-06-09', 'PRD014', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(15, 'Chicken Mini Burger', 8, 85, 50, 15, NULL, NULL, 1, 'N/A', NULL, '2025-09-19', '2026-07-10', 'PRD015', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(16, 'Chicken Pie', 8, 88, 70, 50, NULL, NULL, 1, 'N/A', NULL, '2025-09-20', '2026-01-17', 'PRD016', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(17, 'Chicken Bun', 8, 89, 80, 37, NULL, NULL, 1, 'N/A', NULL, '2025-09-22', '2026-07-05', 'PRD017', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(18, 'Chicken Patties', 8, 89, 80, 43, NULL, NULL, 1, 'N/A', NULL, '2025-09-22', '2025-12-28', 'PRD018', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(19, 'Vegetable Patties', 8, 89, 50, 14, NULL, NULL, 1, 'N/A', NULL, '2025-09-23', '2026-07-03', 'PRD019', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(20, 'Vegetable Roll', 8, 86, 40, 20, NULL, NULL, 1, 'N/A', NULL, '2025-09-20', '2026-07-16', 'PRD020', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(21, 'Shwarma Roll', 8, 86, 120, 17, NULL, NULL, 1, 'N/A', NULL, '2025-09-19', '2026-09-09', 'PRD021', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(22, 'Meduim Pizza', 8, 88, 150, 13, NULL, NULL, 1, 'N/A', NULL, '2025-09-20', '2026-05-26', 'PRD022', '2025-09-25 15:24:09', '2025-09-25 15:26:32'),
(23, 'Chicken Sandwich', 8, 87, 100, 43, NULL, NULL, 1, 'N/A', NULL, '2025-09-24', '2025-12-11', 'PRD023', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(24, 'Club Sandwich', 8, 87, 120, 48, NULL, NULL, 1, 'N/A', NULL, '2025-09-23', '2026-09-24', 'PRD024', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(25, 'Grill Sandwich', 8, 87, 100, 7, NULL, NULL, 1, 'N/A', NULL, '2025-09-23', '2026-04-30', 'PRD025', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(26, 'Sub Sandwich', 8, 87, 120, 40, NULL, NULL, 1, 'N/A', NULL, '2025-09-20', '2026-02-11', 'PRD026', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(27, 'Russian Roll', 8, 86, 80, 27, NULL, NULL, 1, 'N/A', NULL, '2025-09-18', '2025-11-19', 'PRD027', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(28, 'Plain Toast', 9, 90, 120, 35, NULL, NULL, 1, '400gm', NULL, '2025-09-23', '2026-07-30', 'PRD028', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(29, 'Butter Toast (White)', 9, 90, 120, 34, NULL, NULL, 1, '400gm', NULL, '2025-09-23', '2025-11-07', 'PRD029', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(30, 'Butter Toast (Mix)', 9, 90, 150, 24, NULL, NULL, 1, '400gm', NULL, '2025-09-18', '2025-11-12', 'PRD030', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(31, 'Bela Toast', 9, 90, 130, 15, NULL, NULL, 1, '400gm', NULL, '2025-09-18', '2026-02-26', 'PRD031', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(32, 'Sugar Free Toast', 9, 90, 130, 29, NULL, NULL, 1, '130gm', NULL, '2025-09-22', '2026-03-11', 'PRD032', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(33, 'Bread Toast', 9, 90, 130, 20, NULL, NULL, 1, '350gm', NULL, '2025-09-21', '2026-09-10', 'PRD033', '2025-09-25 15:24:09', '2025-09-25 15:26:33'),
(34, 'Finger Toast', 9, 90, 130, 45, NULL, NULL, 1, '350gm', NULL, '2025-09-23', '2026-05-03', 'PRD034', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(35, 'Orange Cookies', 9, 91, 600, 15, NULL, NULL, 1, '1kg', NULL, '2025-09-24', '2026-02-28', 'PRD035', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(36, 'Ovaltine Cookies', 9, 91, 600, 34, NULL, NULL, 1, '1kg', NULL, '2025-09-24', '2026-03-12', 'PRD036', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(37, 'Horlicks Cookies', 9, 91, 600, 47, NULL, NULL, 1, '1kg', NULL, '2025-09-24', '2026-03-18', 'PRD037', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(38, 'Salted Cookies', 9, 91, 500, 15, NULL, NULL, 1, '1kg', NULL, '2025-09-19', '2026-07-01', 'PRD038', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(39, 'Salted Milky', 9, 91, 550, 11, NULL, NULL, 1, '1kg', NULL, '2025-09-20', '2026-07-19', 'PRD039', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(40, 'Dry Cake', 9, 92, 600, 34, NULL, NULL, 1, '1kg', NULL, '2025-09-24', '2025-12-04', 'PRD040', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(41, 'Chocolate Dry Cake', 9, 92, 600, 45, NULL, NULL, 1, '1kg', NULL, '2025-09-23', '2026-01-12', 'PRD041', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(42, 'Nut Cookies', 9, 33, 600, 37, NULL, NULL, 1, '1kg', NULL, '2025-09-22', '2026-06-23', 'PRD042', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(43, 'Almond Cookies', 9, 33, 600, 36, NULL, NULL, 1, '1kg', NULL, '2025-09-23', '2026-05-30', 'PRD043', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(44, 'Raisins Cookies', 9, 33, 600, 39, NULL, NULL, 1, '1kg', NULL, '2025-09-24', '2025-11-11', 'PRD044', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(45, 'Love Cookies', 9, 93, 600, 8, NULL, NULL, 1, '1kg', NULL, '2025-09-22', '2025-11-02', 'PRD045', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(46, 'Cheese Puff', 9, 93, 600, 47, NULL, NULL, 1, '1kg', NULL, '2025-09-21', '2026-04-05', 'PRD046', '2025-09-25 15:24:09', '2025-09-25 15:24:09'),
(47, 'Sugar Puff', 9, 93, 500, 30, NULL, NULL, 1, '1kg', NULL, '2025-09-23', '2026-06-19', 'PRD047', '2025-09-25 15:24:09', '2025-09-25 15:40:46'),
(48, 'Spicy Puff', 9, 93, 480, 40, NULL, NULL, 1, '1kg', NULL, '2025-09-18', '2026-02-05', 'PRD048', '2025-09-25 15:24:09', '2025-09-25 15:24:09');

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
  `total` bigint(20) UNSIGNED DEFAULT NULL,
  `discount` bigint(20) UNSIGNED DEFAULT NULL,
  `vat` bigint(20) UNSIGNED DEFAULT NULL,
  `payable` bigint(20) UNSIGNED DEFAULT NULL,
  `pay` bigint(20) UNSIGNED DEFAULT NULL,
  `due` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
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
(1, 20250925010001, '2025-09-25', 1, 0, 1, 'Out', 1, '2025-09-25 15:25:12', '2025-09-25 15:25:12'),
(2, 20250925010001, '2025-09-25', 2, 0, 1, 'Out', 1, '2025-09-25 15:25:13', '2025-09-25 15:25:13'),
(3, 20250925010001, '2025-09-25', 3, 0, 1, 'Out', 1, '2025-09-25 15:25:13', '2025-09-25 15:25:13'),
(4, 20250925010001, '2025-09-25', 4, 0, 1, 'Out', 1, '2025-09-25 15:25:14', '2025-09-25 15:25:14'),
(5, 20250925010001, '2025-09-25', 5, 0, 1, 'Out', 1, '2025-09-25 15:25:15', '2025-09-25 15:25:15'),
(6, 20250925010002, '2025-09-25', 5, 0, 1, 'Out', 1, '2025-09-25 15:26:29', '2025-09-25 15:26:29'),
(7, 20250925010002, '2025-09-25', 6, 0, 1, 'Out', 1, '2025-09-25 15:26:30', '2025-09-25 15:26:30'),
(8, 20250925010002, '2025-09-25', 9, 0, 1, 'Out', 1, '2025-09-25 15:26:31', '2025-09-25 15:26:31'),
(9, 20250925010002, '2025-09-25', 22, 0, 1, 'Out', 1, '2025-09-25 15:26:32', '2025-09-25 15:26:32'),
(10, 20250925010002, '2025-09-25', 33, 0, 1, 'Out', 1, '2025-09-25 15:26:33', '2025-09-25 15:26:33'),
(11, 0, '2025-09-25', 47, 3, 0, 'In', 2, '2025-09-25 15:40:30', '2025-09-25 15:40:30'),
(12, 0, '2025-09-25', 47, 20, 0, 'In', 2, '2025-09-25 15:40:46', '2025-09-25 15:40:46'),
(13, 20250925010003, '2025-09-25', 5, 0, 1, 'Out', 1, '2025-09-25 15:46:01', '2025-09-25 15:46:01'),
(14, 20250925010003, '2025-09-25', 6, 0, 1, 'Out', 1, '2025-09-25 15:46:02', '2025-09-25 15:46:02'),
(15, 20250925010003, '2025-09-25', 9, 0, 1, 'Out', 1, '2025-09-25 15:46:03', '2025-09-25 15:46:03'),
(16, 20250925010003, '2025-09-25', 10, 0, 1, 'Out', 1, '2025-09-25 15:46:04', '2025-09-25 15:46:04');

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
(1, 1, 'Burger Bun', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(2, 1, 'Tiffin Bun', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(3, 1, 'Butter Bun', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(4, 1, 'Family Bun', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(5, 1, 'Sandwich Bread', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(6, 1, 'Milk Bread', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(7, 1, 'Raisin Roll', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(8, 1, 'Garlic Bread', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(9, 1, 'Croissant', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(10, 1, 'French Bread', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(11, 2, 'Chicken Cheese Burger', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(12, 2, 'Chicken Crispy Burger', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(13, 2, 'Chicken Mexican Burger', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(14, 2, 'Sub Burger', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(15, 2, 'Mini Burger', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(16, 2, 'Chicken Pie', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(17, 2, 'Chicken Bun', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(18, 2, 'Vegetable Patties', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(19, 2, 'Vegetable Roll', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(20, 2, 'Shwarma Roll', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(21, 2, 'Chicken Pizza', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(22, 2, 'Club Sandwich', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(23, 2, 'Grill Sandwich', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(24, 2, 'Russian Roll', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(25, 3, 'Plain Toast', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(26, 3, 'Butter Toast', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(27, 3, 'Mix Toast', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(28, 3, 'Bela Toast', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(29, 3, 'Sugar Free Toast', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(30, 3, 'Finger Toast', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(31, 3, 'Orange Cookies', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(32, 3, 'Ovaltine Cookies', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(33, 3, 'Nut Cookies', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(34, 3, 'Almond Cookies', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(35, 3, 'Dry Cake', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(36, 3, 'Chocolate Dry Cake', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(37, 4, 'Garlic Toast', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(38, 4, 'Garlic Stick', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(39, 4, 'Salty Stick', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(40, 4, 'Cheese Stick', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(41, 4, 'Butter Stick', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(42, 4, 'Sweet Puff', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(43, 4, 'Spicy Puff', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(44, 4, 'Sugar Puff', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(45, 4, 'Cheese Puff', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(46, 4, 'Milk Puff', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(47, 5, 'Vanilla Cake', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(48, 5, 'Premium Chocolate Cake', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(49, 5, 'Black Forest Cake', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(50, 5, 'Mocha Cake', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(51, 5, 'White Forest Cake', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(52, 5, 'Chocolate Fudge Cake', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(53, 5, 'Blueberry Cake', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(54, 5, 'Strawberry Cake', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(55, 5, 'Red Velvet Cake', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(56, 5, 'Pandan Cake', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(57, 5, 'Oreo Cake', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(58, 5, 'Lotus Cake', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(59, 5, 'Butterfly Cake', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(60, 6, 'Rosho Golla', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(61, 6, 'Kalo Jam', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(62, 6, 'Laal Mohon', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(63, 6, 'Spounge Sweet', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(64, 6, 'Lengcha', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(65, 6, 'Cream Chom Chom', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(66, 6, 'Tangali Chom Chom', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(67, 6, 'Roll Sondesh', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(68, 6, 'Katari Vog', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(69, 6, 'Golap Jam', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(70, 6, 'Mini Chom Chom', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(71, 6, 'Baby Sweet', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(72, 6, 'Toffy Sondesh', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(73, 6, 'Rosh Malai', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(74, 6, 'Kacha Chana', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(75, 6, 'Ghee Laddu', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(76, 6, 'Chocolate Laddu', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(77, 6, 'Misti Shorer Doi', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(78, 6, 'Milk Balushai', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(79, 6, 'Nimki', '2025-09-25 06:35:26', '2025-09-25 06:35:26'),
(80, 1, 'Burger Series', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(81, 1, 'Bun Series', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(82, 1, 'Bread Series', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(83, 1, 'Rolls & Croissant', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(84, 1, 'Special Breads', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(85, 2, 'Burger Items', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(86, 2, 'Roll Items', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(87, 2, 'Sandwich Items', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(88, 2, 'Pizza & Pie', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(89, 2, 'Special Fast Food', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(90, 3, 'Toast Items', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(91, 3, 'Cookies', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(92, 3, 'Dry Cakes', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(93, 3, 'Special Biscuits', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(94, 4, 'Stick Series', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(95, 4, 'Garlic & Cheese', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(96, 4, 'Puffs Sweet', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(97, 4, 'Puffs Spicy', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(98, 4, 'Special Puffs', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(99, 5, 'Chocolate Series', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(100, 5, 'Vanilla & Mocha', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(101, 5, 'Fruit Cakes', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(102, 5, 'Designer Cakes', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(103, 5, 'Premium Cakes', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(104, 6, 'Roshogolla & Jam', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(105, 6, 'Chom Chom Series', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(106, 6, 'Sondesh Items', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(107, 6, 'Laddu & Doi', '2025-09-25 15:24:08', '2025-09-25 15:24:08'),
(108, 6, 'Special Traditional', '2025-09-25 15:24:09', '2025-09-25 15:24:09');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `due_collections`
--
ALTER TABLE `due_collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

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
