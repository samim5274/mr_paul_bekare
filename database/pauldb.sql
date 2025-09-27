-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 27, 2025 at 02:37 PM
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `facebook_id`, `google_id`, `github_id`, `password`, `photo`, `phone`, `address`, `dob`, `branch_id`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sabbir Hossain', 'sabbir@gmail.com', NULL, NULL, NULL, '$2y$12$MCADF4zAqdJJ4EDlDG4MTuIivOTeDvdW2Tr7tACjjX1xFi3KtJCam', 'user-1758881259.png', '1762141514', 'Dhaka', '1999-07-07', 1, 1, 1, '2025-07-19 22:29:17', '2025-09-26 04:07:39'),
(2, 'Hossain', 'sabbir2@gmail.com', NULL, NULL, NULL, '$2y$12$6wSniueGHC5jvKQkm0YO.O3sp6mJ1Entu7foD3teYIPU1TQzBJSfe', 'user-1754716873.png', '1762141514', 'Dhaka', '2005-08-03', 2, 3, 1, '2025-07-19 23:45:35', '2025-08-07 17:21:13'),
(4, 'Milon', 'sabbir3@gmail.com', NULL, NULL, NULL, '$2y$12$DABvMVjEPrL5nDbkWzXMTOuC1CD0moNcHkcqzGKJs9qWWnHEDHQde', NULL, '1762141514', 'Dhaka', '2005-08-03', 2, 4, 1, '2025-07-19 23:45:51', '2025-09-18 16:55:54'),
(5, 'Monir Hossain', 'monir@gmail.com', NULL, NULL, NULL, '$2y$12$MZDiecuA.sgUIlnlbe5uHOtX.c9sIu4a1qtNHfuZX4TLiKyIcxs0W', NULL, NULL, NULL, NULL, 1, 3, 1, '2025-08-06 17:29:52', '2025-08-06 17:52:38'),
(6, 'Rabby Hossain', 'rabby@gmail.com', NULL, NULL, NULL, '$2y$12$PIwkn6XvkE.Wlt8a8.DkruR1lpEV236fqv3u1AEf.XXfWQpMs5yJC', NULL, NULL, NULL, NULL, 1, 4, 0, '2025-08-06 17:48:33', '2025-08-06 17:52:32'),
(7, 'Mofiz Hossain', 'mofiz@gmail.com', NULL, NULL, NULL, '$2y$12$crS/EFHSYNMkEWJIuxdI.Os3Im1S/p0uovWPuBuBEY8WRLZW4Cov.', NULL, NULL, NULL, NULL, 1, 3, 1, '2025-08-06 17:49:30', '2025-08-06 17:50:44'),
(8, 'Asif Hossain', 'asif@gmail.com', NULL, NULL, NULL, '$2y$12$JLOxg0XgQF899xU.XSuexekbU/lAYROd6ov3WPAaD6a3Y9LfRSSVC', NULL, NULL, NULL, NULL, 0, 0, 1, '2025-09-18 02:02:50', '2025-09-18 02:03:12'),
(9, 'Akram Uddin', 'akram@gmail.com', NULL, NULL, NULL, '$2y$12$UnRRQpZ8fmrjDEIKs2dH6eqGiZRnHKwO9lci4ItsaQ8iVz0Jr5V.C', 'user-1758343098.png', '0176216474', NULL, '1998-09-12', 2, 2, 1, '2025-09-18 16:36:59', '2025-09-18 16:39:21');

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
(1, 'Main Branch', 'Gulshan, Dhaka', '01700000001', 1, '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(2, 'Uttara Branch', 'Uttara, Dhaka', '01700000002', 1, '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(3, 'Chittagong Branch', 'Agrabad, Chittagong', '01700000003', 1, '2025-09-27 12:27:46', '2025-09-27 12:27:46');

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
(1, 'BREAD & BUNS', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(2, 'FAST FOOD ITEMS', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(3, 'TOAST & BISCUITS', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(4, 'STICK & PUFFS', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(5, 'CELEBRATION CAKE', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(6, 'SWEET', '2025-09-27 12:27:46', '2025-09-27 12:27:46');

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
(1, 'Mr. Paul Bakers', '150, BB Road, Suraiya Tower, narayangonj-1400', 'mrpaulbakers2025@gmail.com', '01675962338', 'https://bekare.deegau.com/', '2025-09-27 12:27:46', '2025-09-27 12:27:46');

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
  `payment_date` date NOT NULL DEFAULT '2025-09-27',
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
(1, 'Food', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(2, 'Transport', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(3, 'Entertainment', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(4, 'Bills & Utilities', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(5, 'Health', '2025-09-27 12:27:46', '2025-09-27 12:27:46');

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
(1, 1, 'Groceries', '2025-09-27 12:28:06', '2025-09-27 12:28:06'),
(2, 1, 'Restaurants', '2025-09-27 12:28:06', '2025-09-27 12:28:06'),
(3, 2, 'Bus', '2025-09-27 12:28:06', '2025-09-27 12:28:06'),
(4, 2, 'Taxi', '2025-09-27 12:28:06', '2025-09-27 12:28:06'),
(5, 3, 'Movies', '2025-09-27 12:28:06', '2025-09-27 12:28:06'),
(6, 3, 'Games', '2025-09-27 12:28:06', '2025-09-27 12:28:06'),
(7, 4, 'Electricity', '2025-09-27 12:28:06', '2025-09-27 12:28:06'),
(8, 4, 'Water', '2025-09-27 12:28:06', '2025-09-27 12:28:06'),
(9, 5, 'Medicine', '2025-09-27 12:28:06', '2025-09-27 12:28:06'),
(10, 5, 'Doctor', '2025-09-27 12:28:06', '2025-09-27 12:28:06');

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
(22, '2025_09_23_153947_create_expired_products_table', 1),
(23, '2025_09_27_123207_create_factory_stocks_table', 1),
(24, '2025_09_27_164041_create_purchase_returns_table', 1);

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
(1, 'Cash', 'Cash Payment', 1, '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(2, 'Credit Card', 'Pay via credit/debit card', 1, '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(3, 'Bkash', 'Mobile banking payment', 1, '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(4, 'Nagad', 'Mobile banking payment', 1, '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(5, 'Rocket', 'Mobile banking payment', 1, '2025-09-27 12:27:46', '2025-09-27 12:27:46');

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
(1, 'Burger Bun', 1, 1, 40.00, 37, NULL, NULL, 1, '75gm (2pcs)', NULL, '2025-09-20', '2025-12-02', 'PRD001', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(2, 'Tiffin Bun', 1, 2, 50.00, 35, NULL, NULL, 1, '105gm (4pcs)', NULL, '2025-09-25', '2026-08-15', 'PRD002', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(3, 'Butter Bun', 1, 2, 40.00, 19, NULL, NULL, 1, '100gm', NULL, '2025-09-26', '2026-08-19', 'PRD003', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(4, 'Family Bun', 1, 2, 90.00, 40, NULL, NULL, 1, '220gm', NULL, '2025-09-26', '2026-09-11', 'PRD004', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(5, 'Sandwich Bread', 1, 3, 80.00, 15, NULL, NULL, 1, '400gm', NULL, '2025-09-24', '2026-01-18', 'PRD005', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(6, 'Sandwich Bread', 1, 3, 160.00, 41, NULL, NULL, 1, '800gm', NULL, '2025-09-21', '2026-02-23', 'PRD006', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(7, 'Milk Bread', 1, 3, 100.00, 31, NULL, NULL, 1, '400gm', NULL, '2025-09-26', '2025-12-14', 'PRD007', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(8, 'Raisins Sesame Roll', 1, 4, 90.00, 30, NULL, NULL, 1, 'N/A', NULL, '2025-09-25', '2025-11-05', 'PRD008', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(9, 'Sandwich Bread', 1, 5, 200.00, 23, NULL, NULL, 1, '1000gm', NULL, '2025-09-22', '2026-08-31', 'PRD009', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(10, 'Chicken Cheese Burger', 2, 6, 120.00, 49, NULL, NULL, 1, 'N/A', NULL, '2025-09-24', '2026-07-04', 'PRD010', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(11, 'Chicken Crispy Burger', 2, 6, 140.00, 27, NULL, NULL, 1, 'N/A', NULL, '2025-09-20', '2025-12-29', 'PRD011', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(12, 'Chicken Mexican Burger', 2, 6, 140.00, 27, NULL, NULL, 1, 'N/A', NULL, '2025-09-22', '2026-01-05', 'PRD012', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(13, 'Chicken Sub Burger', 2, 6, 130.00, 44, NULL, NULL, 1, 'N/A', NULL, '2025-09-25', '2026-07-25', 'PRD013', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(14, 'Chicken Baby Burger', 2, 6, 50.00, 47, NULL, NULL, 1, 'N/A', NULL, '2025-09-21', '2026-08-10', 'PRD014', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(15, 'Chicken Mini Burger', 2, 6, 50.00, 21, NULL, NULL, 1, 'N/A', NULL, '2025-09-21', '2026-05-05', 'PRD015', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(16, 'Chicken Pie', 2, 9, 70.00, 29, NULL, NULL, 1, 'N/A', NULL, '2025-09-21', '2026-01-06', 'PRD016', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(17, 'Chicken Bun', 2, 10, 80.00, 29, NULL, NULL, 1, 'N/A', NULL, '2025-09-21', '2025-12-15', 'PRD017', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(18, 'Chicken Patties', 2, 10, 80.00, 46, NULL, NULL, 1, 'N/A', NULL, '2025-09-22', '2026-03-27', 'PRD018', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(19, 'Vegetable Patties', 2, 10, 50.00, 12, NULL, NULL, 1, 'N/A', NULL, '2025-09-23', '2026-04-01', 'PRD019', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(20, 'Vegetable Roll', 2, 7, 40.00, 30, NULL, NULL, 1, 'N/A', NULL, '2025-09-20', '2026-05-15', 'PRD020', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(21, 'Shwarma Roll', 2, 7, 120.00, 24, NULL, NULL, 1, 'N/A', NULL, '2025-09-20', '2026-04-24', 'PRD021', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(22, 'Meduim Pizza', 2, 9, 150.00, 37, NULL, NULL, 1, 'N/A', NULL, '2025-09-20', '2025-10-30', 'PRD022', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(23, 'Chicken Sandwich', 2, 8, 100.00, 17, NULL, NULL, 1, 'N/A', NULL, '2025-09-20', '2025-12-10', 'PRD023', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(24, 'Club Sandwich', 2, 8, 120.00, 36, NULL, NULL, 1, 'N/A', NULL, '2025-09-20', '2026-04-05', 'PRD024', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(25, 'Grill Sandwich', 2, 8, 100.00, 32, NULL, NULL, 1, 'N/A', NULL, '2025-09-20', '2026-09-14', 'PRD025', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(26, 'Sub Sandwich', 2, 8, 120.00, 47, NULL, NULL, 1, 'N/A', NULL, '2025-09-23', '2026-01-14', 'PRD026', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(27, 'Russian Roll', 2, 7, 80.00, 15, NULL, NULL, 1, 'N/A', NULL, '2025-09-22', '2026-08-13', 'PRD027', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(28, 'Plain Toast', 3, 11, 120.00, 33, NULL, NULL, 1, '400gm', NULL, '2025-09-25', '2026-07-01', 'PRD028', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(29, 'Butter Toast (White)', 3, 11, 120.00, 9, NULL, NULL, 1, '400gm', NULL, '2025-09-20', '2026-02-11', 'PRD029', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(30, 'Butter Toast (Mix)', 3, 11, 150.00, 50, NULL, NULL, 1, '400gm', NULL, '2025-09-22', '2026-08-27', 'PRD030', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(31, 'Bela Toast', 3, 11, 130.00, 16, NULL, NULL, 1, '400gm', NULL, '2025-09-22', '2026-01-31', 'PRD031', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(32, 'Sugar Free Toast', 3, 11, 130.00, 48, NULL, NULL, 1, '130gm', NULL, '2025-09-23', '2026-03-02', 'PRD032', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(33, 'Bread Toast', 3, 11, 130.00, 21, NULL, NULL, 1, '350gm', NULL, '2025-09-26', '2025-11-25', 'PRD033', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(34, 'Finger Toast', 3, 11, 130.00, 7, NULL, NULL, 1, '350gm', NULL, '2025-09-22', '2026-09-12', 'PRD034', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(35, 'Orange Cookies', 3, 12, 600.00, 11, NULL, NULL, 1, '1kg', NULL, '2025-09-24', '2026-09-01', 'PRD035', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(36, 'Ovaltine Cookies', 3, 12, 600.00, 20, NULL, NULL, 1, '1kg', NULL, '2025-09-24', '2026-09-19', 'PRD036', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(37, 'Horlicks Cookies', 3, 12, 600.00, 22, NULL, NULL, 1, '1kg', NULL, '2025-09-21', '2026-09-10', 'PRD037', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(38, 'Salted Cookies', 3, 12, 500.00, 33, NULL, NULL, 1, '1kg', NULL, '2025-09-24', '2026-02-03', 'PRD038', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(39, 'Salted Milky', 3, 12, 550.00, 15, NULL, NULL, 1, '1kg', NULL, '2025-09-24', '2025-11-06', 'PRD039', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(40, 'Dry Cake', 3, 14, 600.00, 33, NULL, NULL, 1, '1kg', NULL, '2025-09-20', '2026-09-04', 'PRD040', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(41, 'Chocolate Dry Cake', 3, 14, 600.00, 18, NULL, NULL, 1, '1kg', NULL, '2025-09-20', '2026-07-23', 'PRD041', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(42, 'Nut Cookies', 3, 13, 600.00, 40, NULL, NULL, 1, '1kg', NULL, '2025-09-22', '2026-02-04', 'PRD042', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(43, 'Almond Cookies', 3, 13, 600.00, 25, NULL, NULL, 1, '1kg', NULL, '2025-09-25', '2026-09-04', 'PRD043', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(44, 'Raisins Cookies', 3, 13, 600.00, 13, NULL, NULL, 1, '1kg', NULL, '2025-09-24', '2026-03-28', 'PRD044', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(45, 'Love Cookies', 3, 15, 600.00, 28, NULL, NULL, 1, '1kg', NULL, '2025-09-23', '2026-03-29', 'PRD045', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(46, 'Cheese Puff', 3, 15, 600.00, 41, NULL, NULL, 1, '1kg', NULL, '2025-09-25', '2026-04-09', 'PRD046', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(47, 'Sugar Puff', 3, 15, 500.00, 45, NULL, NULL, 1, '1kg', NULL, '2025-09-25', '2026-07-09', 'PRD047', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(48, 'Spicy Puff', 3, 15, 480.00, 45, NULL, NULL, 1, '1kg', NULL, '2025-09-22', '2026-04-23', 'PRD048', '2025-09-27 12:27:46', '2025-09-27 12:27:46');

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
(1, 1, 'Burger Series', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(2, 1, 'Bun Series', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(3, 1, 'Bread Series', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(4, 1, 'Rolls & Croissant', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(5, 1, 'Special Breads', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(6, 2, 'Burger Items', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(7, 2, 'Roll Items', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(8, 2, 'Sandwich Items', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(9, 2, 'Pizza & Pie', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(10, 2, 'Special Fast Food', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(11, 3, 'Toast Items', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(12, 3, 'Cookies', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(13, 3, 'Nut Cookies', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(14, 3, 'Dry Cakes', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(15, 3, 'Special Biscuits', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(16, 4, 'Stick Series', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(17, 4, 'Garlic & Cheese', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(18, 4, 'Puffs Sweet', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(19, 4, 'Puffs Spicy', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(20, 4, 'Special Puffs', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(21, 5, 'Chocolate Series', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(22, 5, 'Vanilla & Mocha', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(23, 5, 'Fruit Cakes', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(24, 5, 'Designer Cakes', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(25, 5, 'Premium Cakes', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(26, 6, 'Roshogolla & Jam', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(27, 6, 'Chom Chom Series', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(28, 6, 'Sondesh Items', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(29, 6, 'Laddu & Doi', '2025-09-27 12:27:46', '2025-09-27 12:27:46'),
(30, 6, 'Special Traditional', '2025-09-27 12:27:46', '2025-09-27 12:27:46');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
