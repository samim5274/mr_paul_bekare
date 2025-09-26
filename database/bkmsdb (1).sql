-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2025 at 03:50 PM
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
(1, 'Sabbir Hossain', 'sabbir@gmail.com', NULL, NULL, NULL, '$2y$12$MCADF4zAqdJJ4EDlDG4MTuIivOTeDvdW2Tr7tACjjX1xFi3KtJCam', 'user-1753961928.jpg', '1762141514', 'Dhaka', '1999-07-07', 1, 1, 1, '2025-07-20 16:29:17', '2025-08-07 11:24:34'),
(2, 'Hossain', 'sabbir2@gmail.com', NULL, NULL, NULL, '$2y$12$6wSniueGHC5jvKQkm0YO.O3sp6mJ1Entu7foD3teYIPU1TQzBJSfe', 'user-1754716873.png', '1762141514', 'Dhaka', '2005-08-03', 2, 3, 1, '2025-07-20 17:45:35', '2025-08-08 11:21:13'),
(4, 'Milon', 'sabbir3@gmail.com', NULL, NULL, NULL, '$2y$12$DABvMVjEPrL5nDbkWzXMTOuC1CD0moNcHkcqzGKJs9qWWnHEDHQde', NULL, '1762141514', 'Dhaka', '2005-08-03', 2, 4, 1, '2025-07-20 17:45:51', '2025-09-19 10:55:54'),
(5, 'Monir Hossain', 'monir@gmail.com', NULL, NULL, NULL, '$2y$12$MZDiecuA.sgUIlnlbe5uHOtX.c9sIu4a1qtNHfuZX4TLiKyIcxs0W', NULL, NULL, NULL, NULL, 1, 3, 1, '2025-08-07 11:29:52', '2025-08-07 11:52:38'),
(6, 'Rabby Hossain', 'rabby@gmail.com', NULL, NULL, NULL, '$2y$12$PIwkn6XvkE.Wlt8a8.DkruR1lpEV236fqv3u1AEf.XXfWQpMs5yJC', NULL, NULL, NULL, NULL, 1, 4, 0, '2025-08-07 11:48:33', '2025-08-07 11:52:32'),
(7, 'Mofiz Hossain', 'mofiz@gmail.com', NULL, NULL, NULL, '$2y$12$crS/EFHSYNMkEWJIuxdI.Os3Im1S/p0uovWPuBuBEY8WRLZW4Cov.', NULL, NULL, NULL, NULL, 1, 3, 1, '2025-08-07 11:49:30', '2025-08-07 11:50:44'),
(8, 'Asif Hossain', 'asif@gmail.com', NULL, NULL, NULL, '$2y$12$JLOxg0XgQF899xU.XSuexekbU/lAYROd6ov3WPAaD6a3Y9LfRSSVC', NULL, NULL, NULL, NULL, 0, 0, 1, '2025-09-18 20:02:50', '2025-09-18 20:03:12'),
(9, 'Akram Uddin', 'akram@gmail.com', NULL, NULL, NULL, '$2y$12$UnRRQpZ8fmrjDEIKs2dH6eqGiZRnHKwO9lci4ItsaQ8iVz0Jr5V.C', 'user-1758343098.png', '0176216474', NULL, '1998-09-12', 2, 2, 1, '2025-09-19 10:36:59', '2025-09-19 10:39:21');

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
(1, 'Main Branch', 'Gulshan, Dhaka', '01700000001', 1, '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(2, 'Uttara Branch', 'Uttara, Dhaka', '01700000002', 1, '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(3, 'Chittagong Branch', 'Agrabad, Chittagong', '01700000003', 1, '2025-09-20 09:28:58', '2025-09-20 09:28:58');

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
(65, 20250924010001, '2025-09-24', 1, 2, 1, 1, 100, '2025-09-24 06:29:08', '2025-09-24 06:29:08'),
(66, 20250924010001, '2025-09-24', 1, 3, 1, 1, 120, '2025-09-24 06:29:10', '2025-09-24 06:29:10'),
(67, 20250924010001, '2025-09-24', 1, 4, 1, 1, 80, '2025-09-24 06:29:12', '2025-09-24 06:29:12'),
(68, 20250924010001, '2025-09-24', 1, 5, 1, 1, 180, '2025-09-24 06:29:13', '2025-09-24 06:29:13'),
(69, 20250924010001, '2025-09-24', 1, 6, 1, 1, 120, '2025-09-24 06:29:15', '2025-09-24 06:29:15'),
(70, 20250924010002, '2025-09-24', 1, 4, 1, 3, 80, '2025-09-24 06:31:28', '2025-09-24 06:31:32');

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
(1, 'Bread', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(2, 'Cakes', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(3, 'Cookies & Biscuits', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(4, 'Pastry', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(5, 'Snacks', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(6, 'Sweets', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(7, 'Dairy Items', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(8, 'Beverages', '2025-09-20 09:28:58', '2025-09-20 09:28:58');

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
(1, 'Mr. Paul Bakers', '150, BB Road, Suraiya Tower,  Narayangonj-1400', 'mrpaulbakers2025@gmail.com', '01675962338', 'https://bekare.deegau.com', '2025-09-20 09:28:58', '2025-09-20 09:28:58');

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
  `payment_date` date NOT NULL DEFAULT '2025-09-23',
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
(1, 'Food', '2025-09-20 11:18:05', '2025-09-20 11:18:05'),
(2, 'Transport', '2025-09-20 11:18:05', '2025-09-20 11:18:05'),
(3, 'Entertainment', '2025-09-20 11:18:05', '2025-09-20 11:18:05'),
(4, 'Bills & Utilities', '2025-09-20 11:18:05', '2025-09-20 11:18:05'),
(5, 'Healths', '2025-09-20 11:18:05', '2025-09-20 13:01:45');

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

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `catId`, `subcatId`, `userId`, `date`, `amount`, `remark`, `created_at`, `updated_at`) VALUES
(7, 1, 2, 1, '2025-09-21', 300, 'N/A', '2025-09-21 06:33:08', '2025-09-21 06:33:08');

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

--
-- Dumping data for table `expired_products`
--

INSERT INTO `expired_products` (`id`, `product_id`, `name`, `price`, `quantity`, `expired_at`, `created_at`, `updated_at`) VALUES
(6, 2, 'Vanilla Cupcake', 100, 80, '2025-09-23', '2025-09-24 04:48:01', '2025-09-24 04:48:01'),
(7, 3, 'Chocolate Donut', 120, 80, '2025-09-24', '2025-09-24 04:48:01', '2025-09-24 04:48:01');

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
(1, 1, 'Groceries', '2025-09-20 11:18:21', '2025-09-20 11:18:21'),
(2, 1, 'Restaurants', '2025-09-20 11:18:21', '2025-09-20 11:18:21'),
(3, 2, 'Bus', '2025-09-20 11:18:21', '2025-09-20 11:18:21'),
(4, 2, 'Taxi', '2025-09-20 11:18:21', '2025-09-20 11:18:21'),
(5, 3, 'Movies', '2025-09-20 11:18:21', '2025-09-20 11:18:21'),
(6, 3, 'Games', '2025-09-20 11:18:21', '2025-09-20 11:18:21'),
(7, 4, 'Electricity', '2025-09-20 11:18:21', '2025-09-20 11:18:21'),
(8, 4, 'Water', '2025-09-20 11:18:21', '2025-09-20 11:18:21'),
(9, 5, 'Medicine', '2025-09-20 11:18:21', '2025-09-20 11:18:21'),
(10, 5, 'Doctor', '2025-09-20 11:18:21', '2025-09-20 11:18:21');

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
(35, '2025_09_23_115550_create_due_collections_table', 2),
(36, '2025_09_23_153947_create_expired_products_table', 2);

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
(26, '2025-09-24', 1, 1, 20250924010001, 600, 50, 90, 640, 500, 140, 1, 3, 'samim', 1762164746, '2025-09-24 06:29:35', '2025-09-24 06:29:35'),
(27, '2025-09-24', 1, 1, 20250924010002, 240, 50, 24, 214, 214, 0, 1, 2, '0', 0, '2025-09-24 06:31:52', '2025-09-24 06:31:52');

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
(1, 'Cash', 'Cash Payment', 1, '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(2, 'Credit Card', 'Pay via credit/debit card', 1, '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(3, 'Bkash', 'Mobile banking payment', 1, '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(4, 'Nagad', 'Mobile banking payment', 1, '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(5, 'Rocket', 'Mobile banking payment', 1, '2025-09-20 09:28:58', '2025-09-20 09:28:58');

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
(2, 'Vanilla Cupcake', 2, 7, 100, 99, 'Soft and moist individual cake with sweet vanilla flavor and creamy topping.', 'FD-1752485052.jpg', 1, '1 pcs', 'Flour, Sugar, Eggs, Vanilla essence, Butter, Baking powder', '2025-09-24', '2025-09-30', 'PROD002', '2025-07-13 09:24:12', '2025-09-24 06:29:08'),
(3, 'Chocolate Donut', 4, 15, 120, 99, 'Ring-shaped fried dough topped with rich chocolate glaze.', 'FD-1752485100.jpg', 1, '1 pcs', 'Flour, Cocoa powder, Sugar, Yeast, Milk, Butter, Chocolate glaze', '2025-09-24', '2025-09-30', 'PROD003', '2025-07-13 09:25:00', '2025-09-24 06:29:10'),
(4, 'Chicken Patties', 5, 19, 80, 96, 'Crispy puff stuffed with spicy chicken filling, ideal for snacks.', 'FD-1752485151.jpg', 1, '1 pcs', 'Flour, Butter, Chicken, Onion, Garlic, Spices', '2025-09-24', '2025-09-30', 'PROD004', '2025-07-13 09:25:51', '2025-09-24 06:31:32'),
(5, 'Red Velvet Slice', 2, 6, 180, 99, 'Moist red cake slice layered with smooth cream cheese frosting.', 'FD-1752485194.jpg', 1, '1 pcs', 'Flour, Cocoa, Buttermilk, Vinegar, Sugar, Eggs, Cream cheese frosting', '2025-09-24', '2025-09-30', 'PROD005', '2025-07-13 09:26:34', '2025-09-24 06:29:13'),
(6, 'Cheese Bun', 1, 4, 120, 99, 'Soft and fluffy bun filled or topped with melted cheese.', 'FD-1752485249.jpg', 1, '1 pcs', 'Flour, Yeast, Milk, Sugar, Cheese, Butter', '2025-09-24', '2025-09-30', 'PROD006', '2025-07-13 09:27:29', '2025-09-24 06:29:15'),
(7, 'Butter Croissant', 4, 15, 140, 100, 'Flaky and buttery French-style crescent-shaped pastry.', 'FD-1752485306.jpg', 1, '1 pcs', 'Laminated dough (Flour, Butter), Yeast, Sugar, Salt', '2025-09-24', '2025-09-30', 'PROD007', '2025-07-13 09:28:26', '2025-09-24 06:28:50'),
(8, 'Veg Sandwich', 6, 25, 80, 100, 'Fresh sandwich packed with vegetables and creamy dressing.', 'FD-1752485357.jpg', 1, '10 pcs', 'Bread, Tomato, Cucumber, Lettuce, Cheese, Mayonnaise', '2025-09-24', '2025-09-30', 'PROD008', '2025-07-13 09:29:17', '2025-09-24 06:28:47'),
(9, 'Chocolate Cookie', 3, 12, 100, 100, 'Crispy outside, chewy inside, loaded with chocolate chips.', 'FD-1752485413.jpg', 1, '1 pcs', 'Flour, Butter, Eggs, Chocolate chips, Baking soda, Sugar', '2025-09-24', '2025-09-30', 'PROD009', '2025-07-13 09:30:13', '2025-09-24 06:28:48'),
(10, 'Garlic Bread', 1, 2, 160, 100, 'Toasted bread slices flavored with garlic butter and herbs.', 'FD-1752485456.jpg', 1, '1 pcs', 'Flour, Garlic, Butter, Herbs, Yeast, Salt', '2025-09-24', '2025-09-30', 'PROD010', '2025-07-13 09:30:56', '2025-09-24 06:28:53'),
(11, 'Birthday Cake', 2, 5, 420, 100, 'Classic round cake decorated with cream, ideal for celebrations.', 'FD-1752485498.jpg', 1, '1 LB', 'Flour, Eggs, Sugar, Butter, Milk, Cream, Flavoring, Food color', '2025-09-24', '2025-09-30', 'PROD011', '2025-07-13 09:31:38', '2025-09-24 06:28:55');

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

--
-- Dumping data for table `purchasecarts`
--

INSERT INTO `purchasecarts` (`id`, `date`, `time`, `user_id`, `chalan_reg`, `product_id`, `branch`, `order_qty`, `ready_qty`, `delivery_qty`, `status`, `remark`, `unit_price`, `total_price`, `unit`, `created_at`, `updated_at`) VALUES
(18, '2025-09-24', '12:24:56', 1, 250924000100000001, 2, 1, 100, 100, 100, 2, 'N/A', 100, 100, '1 pcs', '2025-09-24 06:24:56', '2025-09-24 06:28:38'),
(19, '2025-09-24', '12:24:58', 1, 250924000100000001, 3, 1, 100, 100, 100, 2, 'N/A', 120, 120, '1 pcs', '2025-09-24 06:24:58', '2025-09-24 06:28:40'),
(20, '2025-09-24', '12:25:00', 1, 250924000100000001, 4, 1, 100, 100, 100, 2, 'N/A', 80, 80, '1 pcs', '2025-09-24 06:25:00', '2025-09-24 06:28:42'),
(21, '2025-09-24', '12:25:01', 1, 250924000100000001, 5, 1, 100, 100, 100, 2, 'N/A', 180, 180, '1 pcs', '2025-09-24 06:25:01', '2025-09-24 06:28:43'),
(22, '2025-09-24', '12:25:03', 1, 250924000100000001, 6, 1, 100, 100, 100, 2, 'N/A', 120, 120, '1 pcs', '2025-09-24 06:25:03', '2025-09-24 06:28:46'),
(23, '2025-09-24', '12:25:05', 1, 250924000100000001, 7, 1, 100, 100, 100, 2, 'N/A', 140, 140, '1 pcs', '2025-09-24 06:25:05', '2025-09-24 06:28:50'),
(24, '2025-09-24', '12:25:06', 1, 250924000100000001, 8, 1, 100, 100, 100, 2, 'N/A', 80, 80, '10 pcs', '2025-09-24 06:25:06', '2025-09-24 06:28:47'),
(25, '2025-09-24', '12:25:08', 1, 250924000100000001, 9, 1, 100, 100, 100, 2, 'N/A', 100, 100, '1 pcs', '2025-09-24 06:25:08', '2025-09-24 06:28:48'),
(26, '2025-09-24', '12:25:10', 1, 250924000100000001, 10, 1, 100, 100, 100, 2, 'N/A', 160, 160, '1 pcs', '2025-09-24 06:25:10', '2025-09-24 06:28:53'),
(27, '2025-09-24', '12:25:12', 1, 250924000100000001, 11, 1, 100, 100, 100, 2, 'N/A', 420, 420, '1 LB', '2025-09-24 06:25:12', '2025-09-24 06:28:55');

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

--
-- Dumping data for table `purchaseorders`
--

INSERT INTO `purchaseorders` (`id`, `date`, `delivary_date`, `time`, `user_id`, `branch`, `chalan_reg`, `total`, `discount`, `vat`, `payable`, `pay`, `due`, `status`, `created_at`, `updated_at`) VALUES
(6, '2025-09-24', NULL, '12:25:34', 1, 1, 250924000100000001, 1500, 0, 0, 1500, 0, 1500, 4, '2025-09-24 06:25:34', '2025-09-24 06:28:30');

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
(82, 250924000100000001, '2025-09-24', 2, 100, 0, 'In from Factory.', 2, '2025-09-24 06:28:38', '2025-09-24 06:28:38'),
(83, 250924000100000001, '2025-09-24', 3, 100, 0, 'In from Factory.', 2, '2025-09-24 06:28:40', '2025-09-24 06:28:40'),
(84, 250924000100000001, '2025-09-24', 4, 100, 0, 'In from Factory.', 2, '2025-09-24 06:28:42', '2025-09-24 06:28:42'),
(85, 250924000100000001, '2025-09-24', 5, 100, 0, 'In from Factory.', 2, '2025-09-24 06:28:43', '2025-09-24 06:28:43'),
(86, 250924000100000001, '2025-09-24', 6, 100, 0, 'In from Factory.', 2, '2025-09-24 06:28:46', '2025-09-24 06:28:46'),
(87, 250924000100000001, '2025-09-24', 8, 100, 0, 'In from Factory.', 2, '2025-09-24 06:28:47', '2025-09-24 06:28:47'),
(88, 250924000100000001, '2025-09-24', 9, 100, 0, 'In from Factory.', 2, '2025-09-24 06:28:48', '2025-09-24 06:28:48'),
(89, 250924000100000001, '2025-09-24', 7, 100, 0, 'In from Factory.', 2, '2025-09-24 06:28:50', '2025-09-24 06:28:50'),
(90, 250924000100000001, '2025-09-24', 10, 100, 0, 'In from Factory.', 2, '2025-09-24 06:28:53', '2025-09-24 06:28:53'),
(91, 250924000100000001, '2025-09-24', 11, 100, 0, 'In from Factory.', 2, '2025-09-24 06:28:55', '2025-09-24 06:28:55'),
(92, 20250924010001, '2025-09-24', 2, 0, 1, 'Out', 1, '2025-09-24 06:29:08', '2025-09-24 06:29:08'),
(93, 20250924010001, '2025-09-24', 3, 0, 1, 'Out', 1, '2025-09-24 06:29:10', '2025-09-24 06:29:10'),
(94, 20250924010001, '2025-09-24', 4, 0, 1, 'Out', 1, '2025-09-24 06:29:12', '2025-09-24 06:29:12'),
(95, 20250924010001, '2025-09-24', 5, 0, 1, 'Out', 1, '2025-09-24 06:29:13', '2025-09-24 06:29:13'),
(96, 20250924010001, '2025-09-24', 6, 0, 1, 'Out', 1, '2025-09-24 06:29:15', '2025-09-24 06:29:15'),
(97, 20250924010002, '2025-09-24', 4, 0, 3, 'Out', 1, '2025-09-24 06:31:28', '2025-09-24 06:31:32');

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
(1, 1, 'White Bread', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(2, 1, 'Brown Bread', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(3, 1, 'Multigrain Bread', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(4, 1, 'Buns & Rolls', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(5, 2, 'Birthday Cake', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(6, 2, 'Wedding Cake', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(7, 2, 'Cupcakes', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(8, 2, 'Cheese Cake', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(9, 2, 'Chocolate Cake', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(10, 3, 'Chocolate Chip Cookies', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(11, 3, 'Butter Cookies', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(12, 3, 'Oatmeal Cookies', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(13, 3, 'Digestive Biscuits', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(14, 4, 'Cream Pastry', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(15, 4, 'Fruit Pastry', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(16, 4, 'Black Forest Pastry', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(17, 4, 'Éclair', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(18, 5, 'Patties', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(19, 5, 'Pies', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(20, 5, 'Sandwiches', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(21, 5, 'Chicken Roll', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(22, 5, 'Samosa', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(23, 6, 'Donuts', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(24, 6, 'Brownies', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(25, 6, 'Muffins', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(26, 6, 'Gulab Jamun', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(27, 7, 'Fresh Cream', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(28, 7, 'Butter', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(29, 7, 'Cheese', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(30, 7, 'Milk Shake', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(31, 8, 'Tea', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(32, 8, 'Coffee', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(33, 8, 'Juice', '2025-09-20 09:28:58', '2025-09-20 09:28:58'),
(34, 8, 'Soft Drinks', '2025-09-20 09:28:58', '2025-09-20 09:28:58');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `due_collections`
--
ALTER TABLE `due_collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `excategories`
--
ALTER TABLE `excategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `expired_products`
--
ALTER TABLE `expired_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `purchasecarts`
--
ALTER TABLE `purchasecarts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
