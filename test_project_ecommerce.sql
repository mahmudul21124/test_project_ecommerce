-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2026 at 12:01 PM
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
-- Database: `test_project_ecommerce`
--

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_01_02_052501_create_permission_tables', 1),
(6, '2026_01_02_053825_create_products_table', 1),
(7, '2026_01_02_053832_create_orders_table', 1),
(8, '2026_01_02_053839_create_order_items_table', 1),
(9, '2026_01_07_173031_alter_orders_user_id_nullable', 2);

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
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','paid','shipped') NOT NULL DEFAULT 'pending',
  `session_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `status`, `session_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 15502.97, 'paid', NULL, '2026-01-07 11:33:55', '2026-01-07 11:33:55'),
(2, NULL, 15502.97, 'paid', NULL, '2026-01-07 11:36:00', '2026-01-07 11:36:00'),
(3, NULL, 7495.00, 'paid', NULL, '2026-01-07 11:36:34', '2026-01-07 11:36:34'),
(4, NULL, 3254.95, 'paid', NULL, '2026-01-07 11:40:01', '2026-01-07 11:40:01'),
(5, NULL, 750.00, 'paid', NULL, '2026-01-07 11:42:27', '2026-01-07 11:42:27'),
(6, NULL, 11753.96, 'paid', NULL, '2026-01-07 12:06:10', '2026-01-07 12:06:10'),
(7, 1, 1451.98, 'paid', NULL, '2026-01-07 12:06:42', '2026-01-07 12:06:42'),
(8, 1, 6001.98, 'paid', NULL, '2026-01-07 12:08:42', '2026-01-07 12:08:42'),
(9, 1, 4899.99, 'paid', NULL, '2026-01-07 12:23:15', '2026-01-07 12:23:15'),
(10, NULL, 3551.98, 'paid', NULL, '2026-01-07 12:24:31', '2026-01-07 12:24:31'),
(11, NULL, 2801.98, 'paid', NULL, '2026-01-07 12:27:36', '2026-01-07 12:27:36'),
(12, NULL, 800.99, 'paid', NULL, '2026-01-07 12:28:43', '2026-01-07 12:28:43'),
(13, NULL, 1500.00, 'paid', NULL, '2026-01-07 12:31:30', '2026-01-07 12:31:30'),
(14, NULL, 2801.98, 'paid', NULL, '2026-01-07 12:33:47', '2026-01-07 12:33:47'),
(15, NULL, 8903.96, 'paid', NULL, '2026-01-07 23:05:08', '2026-01-07 23:05:08'),
(16, NULL, 4400.00, 'paid', NULL, '2026-01-07 23:10:14', '2026-01-07 23:10:14'),
(17, NULL, 4400.00, 'paid', NULL, '2026-01-07 23:17:48', '2026-01-07 23:17:48'),
(18, NULL, 2800.00, 'paid', NULL, '2026-01-07 23:20:37', '2026-01-07 23:20:37'),
(19, NULL, 4004.95, 'paid', NULL, '2026-01-07 23:27:35', '2026-01-07 23:27:35'),
(20, NULL, 7951.98, 'paid', NULL, '2026-01-07 23:53:47', '2026-01-07 23:53:47'),
(21, 2, 4301.98, 'paid', NULL, '2026-01-08 04:58:39', '2026-01-08 04:58:39');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(1, 2, 9, 3, 2500.99, '2026-01-07 11:36:00', '2026-01-07 11:36:00'),
(2, 2, 2, 4, 2000.00, '2026-01-07 11:36:01', '2026-01-07 11:36:01'),
(3, 3, 3, 5, 1499.00, '2026-01-07 11:36:34', '2026-01-07 11:36:34'),
(4, 4, 8, 5, 650.99, '2026-01-07 11:40:01', '2026-01-07 11:40:01'),
(5, 5, 7, 1, 750.00, '2026-01-07 11:42:27', '2026-01-07 11:42:27'),
(6, 6, 9, 1, 2500.99, '2026-01-07 12:06:10', '2026-01-07 12:06:10'),
(7, 6, 7, 2, 750.00, '2026-01-07 12:06:11', '2026-01-07 12:06:11'),
(8, 6, 8, 1, 650.99, '2026-01-07 12:06:11', '2026-01-07 12:06:11'),
(9, 6, 10, 1, 800.99, '2026-01-07 12:06:11', '2026-01-07 12:06:11'),
(10, 6, 11, 1, 1400.99, '2026-01-07 12:06:11', '2026-01-07 12:06:11'),
(11, 6, 4, 2, 1450.00, '2026-01-07 12:06:11', '2026-01-07 12:06:11'),
(12, 6, 2, 1, 2000.00, '2026-01-07 12:06:11', '2026-01-07 12:06:11'),
(13, 7, 8, 1, 650.99, '2026-01-07 12:06:42', '2026-01-07 12:06:42'),
(14, 7, 10, 1, 800.99, '2026-01-07 12:06:42', '2026-01-07 12:06:42'),
(15, 8, 9, 2, 2500.99, '2026-01-07 12:08:42', '2026-01-07 12:08:42'),
(16, 8, 6, 1, 1000.00, '2026-01-07 12:08:43', '2026-01-07 12:08:43'),
(17, 9, 3, 1, 1499.00, '2026-01-07 12:23:16', '2026-01-07 12:23:16'),
(18, 9, 2, 1, 2000.00, '2026-01-07 12:23:16', '2026-01-07 12:23:16'),
(19, 9, 11, 1, 1400.99, '2026-01-07 12:23:16', '2026-01-07 12:23:16'),
(20, 10, 11, 2, 1400.99, '2026-01-07 12:24:31', '2026-01-07 12:24:31'),
(21, 10, 7, 1, 750.00, '2026-01-07 12:24:31', '2026-01-07 12:24:31'),
(22, 11, 11, 1, 1400.99, '2026-01-07 12:27:36', '2026-01-07 12:27:36'),
(23, 11, 7, 1, 750.00, '2026-01-07 12:27:36', '2026-01-07 12:27:36'),
(24, 11, 8, 1, 650.99, '2026-01-07 12:27:36', '2026-01-07 12:27:36'),
(25, 12, 10, 1, 800.99, '2026-01-07 12:28:44', '2026-01-07 12:28:44'),
(26, 13, 7, 2, 750.00, '2026-01-07 12:31:31', '2026-01-07 12:31:31'),
(27, 14, 11, 2, 1400.99, '2026-01-07 12:33:47', '2026-01-07 12:33:47'),
(28, 15, 7, 1, 750.00, '2026-01-07 23:05:08', '2026-01-07 23:05:08'),
(29, 15, 9, 3, 2500.99, '2026-01-07 23:05:08', '2026-01-07 23:05:08'),
(30, 15, 8, 1, 650.99, '2026-01-07 23:05:08', '2026-01-07 23:05:08'),
(31, 16, 7, 2, 750.00, '2026-01-07 23:10:14', '2026-01-07 23:10:14'),
(32, 16, 4, 2, 1450.00, '2026-01-07 23:10:14', '2026-01-07 23:10:14'),
(33, 17, 7, 2, 750.00, '2026-01-07 23:17:48', '2026-01-07 23:17:48'),
(34, 17, 4, 2, 1450.00, '2026-01-07 23:17:48', '2026-01-07 23:17:48'),
(35, 18, 5, 2, 900.00, '2026-01-07 23:20:37', '2026-01-07 23:20:37'),
(36, 18, 6, 1, 1000.00, '2026-01-07 23:20:37', '2026-01-07 23:20:37'),
(37, 19, 10, 5, 800.99, '2026-01-07 23:27:35', '2026-01-07 23:27:35'),
(38, 20, 10, 2, 800.99, '2026-01-07 23:53:47', '2026-01-07 23:53:47'),
(39, 20, 2, 1, 2000.00, '2026-01-07 23:53:47', '2026-01-07 23:53:47'),
(40, 20, 4, 3, 1450.00, '2026-01-07 23:53:47', '2026-01-07 23:53:47'),
(41, 21, 9, 1, 2500.99, '2026-01-08 04:58:39', '2026-01-08 04:58:39'),
(42, 21, 10, 1, 800.99, '2026-01-08 04:58:39', '2026-01-08 04:58:39'),
(43, 21, 6, 1, 1000.00, '2026-01-08 04:58:39', '2026-01-08 04:58:39');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Missha Soft Finish Sun Milk SPF50+ PA+++ 70ml', 'Missha Soft Finish Sun Milk একটি জনপ্রিয় কোরিয়ান সানস্ক্রিন যা ত্বকে দীর্ঘস্থায়ী সুরক্ষা দেয় সূর্যের ক্ষতিকর রশ্মি ও পরিবেশগত প্রভাব থেকে। এতে আছে ৬টি এসেন্স-কমপ্লেক্স এবং প্রাকৃতিক উদ্ভিজ্জ উপাদান, যা ত্বককে করে তোলে কোমল, সতেজ ও উজ্জ্বল।\r\n\r\nএই সান মিল্কে রয়েছে একটি ডাবল UV-ব্লকিং সিস্টেম যা ঘাম বা পানির স্পর্শেও নষ্ট হয় না, ফলে আপনি নিশ্চিত থাকতে পারেন সূর্য রশ্মি থেকে আপনার ত্বক সুরক্ষিত।\r\n\r\n✅ উপকারিতা (Benefits):\r\nহালকা স্কিন-টোন কারেকশন করে, ত্বকে দেয় ন্যাচারাল উজ্জ্বলতা\r\n\r\nSPF50+/PA+++ সুরক্ষা — দৈনন্দিন ব্যবহারের জন্য উপযোগী\r\n\r\nত্বকে তৈলাক্ত ভাব না রেখে দেয় ম্যাট ফিনিশ\r\n\r\nঘাম ও আর্দ্রতার মধ্যেও দীর্ঘস্থায়ী UV সুরক্ষা\r\n\r\nসংবেদনশীল ও তৈলাক্ত ত্বকের জন্য বিশেষভাবে উপযোগী\r\n\r\n⚠️ ব্যবহারের পরামর্শ (Extra Cautions):\r\nঝাঁকান: ব্যবহারের আগে ভালোভাবে ঝাঁকিয়ে নিন। বোতলের ভিতরে একটি ছোট বল থাকে যা উপাদানগুলো মিশাতে সাহায্য করে।\r\n\r\nক্লিনজার দিয়ে ধুয়ে নিন: ব্যবহারের আগে মুখ ভালোভাবে ধুয়ে পরিষ্কার রাখুন।\r\n\r\nময়েশ্চারাইজার ব্যবহার করুন: যদি আপনার ত্বক শুষ্ক হয়, তাহলে সানস্ক্রিন ব্যবহারের আগে ময়েশ্চারাইজার ব্যবহার করুন। এতে ত্বক শুষ্ক হবে না এবং সফট ম্যাট ফিনিশ দেবে।\r\n\r\n💰 বাংলাদেশে Missha Soft Finish Sun Milk-এর দাম:\r\nMissha Soft Finish Sun Milk একটি আন্তর্জাতিকভাবে জনপ্রিয় কোরিয়ান সানস্ক্রিন, যা বিশেষ করে তৈলাক্ত ও সংবেদনশীল ত্বকের জন্য উপযুক্ত। যদিও অনেক ওয়েবসাইটে এটি উচ্চ মূল্যে বিক্রি হয়, আমাদের কাছে আপনি এটি পাচ্ছেন সর্বনিম্ন মূল্যে।', 1650.00, 'products/Uv8mLX8sOCycD8q6FU567WnJab0pNTjsDUTZz6Uu.jpg', '2026-01-07 06:06:39', '2026-01-07 06:06:39'),
(2, 'COSRX Advanced Snail 96 Mucin Power Essence (100ml)', 'Product Information\r\n🧴 COSRX Advanced Snail 96 Mucin Power Essence কী?\r\nCOSRX Advanced Snail 96 Mucin Power Essence একটি আল্ট্রা-হাইড্রেটিং এসেন্স, যাতে রয়েছে ৯৬.৩% স্নেইল সিক্রেশন ফিল্ট্রেট। এটি শুষ্কতা, নিস্তেজতা এবং বয়সজনিত সমস্যাগুলোর সমাধান করে ত্বককে পুনরায় প্রাণবন্ত করে তোলে। নিয়মিত ব্যবহারে ত্বক হয় মসৃণ, উজ্জ্বল এবং কোমল।\r\n\r\n🌟 উপকারিতা (Benefits):\r\nত্বকের আর্দ্রতা ধরে রাখে ও হাইড্রেট করে\r\n\r\nত্বকের ইলাস্টিসিটি বাড়ায়\r\n\r\nরুক্ষ, ক্ষতিগ্রস্ত বা হাইপারপিগমেন্টেড ত্বক পুনরুদ্ধার করে\r\n\r\nবয়সের ছাপ, ফাইন লাইন ও বলিরেখা কমায়\r\n\r\nত্বককে উজ্জ্বল, প্রাণবন্ত ও কোমল করে তোলে\r\n\r\nস্কিন রিপেয়ার করে এবং পুষ্টি জোগায়\r\n\r\nদাগ ও বয়সের স্পট হালকা করে\r\n\r\nত্বকের কোষ পুনর্গঠন করে\r\n\r\n🧪 মূল উপাদান (Key Ingredients):\r\n🐌 Snail Secretion Filtrate (৯৬.৩%)\r\nত্বকের ময়েশ্চার বজায় রাখে, ক্ষতিগ্রস্ত ত্বক পুনর্গঠন করে এবং হাইড্রেট করে। ত্বকে দেয় স্বাস্থ্যকর উজ্জ্বলতা।\r\n\r\n💧 Sodium Hyaluronate\r\nহায়ালুরনিক অ্যাসিড সমৃদ্ধ এই উপাদান ত্বকের ভেতর পর্যন্ত আর্দ্রতা পৌঁছে দেয় এবং দীর্ঘস্থায়ী হাইড্রেশন নিশ্চিত করে।\r\n\r\n🧬 Arginine\r\nএকটি প্রাকৃতিক অ্যামিনো অ্যাসিড ও অ্যান্টি-অক্সিডেন্ট যা ত্বকের ইলাস্টিসিটি বাড়াতে সাহায্য করে এবং কোষের স্বাস্থ্য বজায় রাখে।', 2000.00, 'products/QEVYpaUPmnUs6Qp2PI4eLCkBlYQmXVnXyjFAZy8E.jpg', '2026-01-07 06:17:48', '2026-01-07 06:17:48'),
(3, 'Cosrx Salicylic Acid Daily Gentle Cleanser 150ml', 'Product Information\r\nCosrx Salicylic Acid Daily Gentle Cleanser – 150ml\r\nত্বক পরিষ্কারের জন্য ফেসওয়াশ বেছে নেওয়ার সময় মনে রাখতে হবে—সব ক্লিনজার সব ধরনের ত্বকের জন্য উপযোগী নয়। আপনার ত্বকের ধরন বা নির্দিষ্ট সমস্যা অনুযায়ী ফেসওয়াশ ব্যবহার করাই সবচেয়ে কার্যকর। বিশেষ করে যদি আপনার ত্বক ব্রণপ্রবণ হয়, তবে স্যালিসাইলিক অ্যাসিডযুক্ত ফেসওয়াশই হতে পারে আপনার সঠিক সমাধান।\r\n\r\nCosrx Salicylic Acid Daily Gentle Cleanser হল একটি জনপ্রিয় কোরিয়ান স্কিন কেয়ার ফেসওয়াশ, যা ব্রণ ও অতিরিক্ত তেল নিয়ন্ত্রণে অসাধারণ কার্যকর। এতে রয়েছে ০.৯% স্যালিসাইলিক অ্যাসিড এবং প্রাকৃতিক উপাদান, যা ত্বকের গভীরে প্রবেশ করে মৃত কোষ ও অতিরিক্ত সেবাম দূর করে, রোমছিদ্র খুলে দেয় এবং ব্রণের প্রদাহ কমায়। এটি ফোম টাইপের ক্লিনজার, যা প্রতিদিন সকালে ও রাতে ব্যবহারযোগ্য। এটি মুখের ময়লা, অতিরিক্ত তেল এবং মেকআপের অবশিষ্টাংশও নিখুঁতভাবে পরিষ্কার করে।\r\n\r\nএই ক্লিনজারটি সব ধরনের ত্বকের জন্য উপযোগী—শুষ্ক, তৈলাক্ত বা সেনসিটিভ স্কিন। নিয়মিত ব্যবহারে ত্বক হয় পরিষ্কার, সতেজ ও ব্রণমুক্ত। কোরিয়াসহ বিশ্বের হাজার হাজার স্কিন কেয়ারপ্রেমীর পছন্দের এই পণ্যটি এখন পাচ্ছেন আমাদের কাছে বাংলাদেশে সবচেয়ে সাশ্রয়ী দামে।\r\n\r\n👉 এখনই অর্ডার করুন এবং ত্বকের যত্ন নিন সবচেয়ে ভরসাযোগ্য কোরিয়ান ফর্মুলায়!', 1499.00, 'products/UbUQFEcNf8DkKDDnO1O6fBAPpw6PHN1SLpte0pc2.jpg', '2026-01-07 06:18:50', '2026-01-07 06:18:50'),
(4, 'COSRX Low pH Good Morning Gel Cleanser 150ml', 'Product Information\r\nব্রণ, লালচে ভাব, ত্বকের পানিশূন্যতা — এসব সমস্যায় আমরা কমবেশি সবাই ভুগি। অনেকেই ভালো ক্লিনজার বা ফেসওয়াশ বেছে নিতে পারেন না, বিশেষ করে যাদের ত্বক সংবেদনশীল। তবে COSRX Low pH Good Morning Gel Cleanser এমন একটি ক্লিনজার যা সব ধরণের ত্বকের জন্য উপযোগী, এমনকি সংবেদনশীল ত্বকের জন্যও নিরাপদ।\r\n\r\nএই জেল ক্লিনজারটি ত্বকের প্রাকৃতিক pH ব্যালেন্স বজায় রাখে (৫.৩-৬.৩), ত্বককে করে তোলে পরিষ্কার, সতেজ ও ব্রণমুক্ত। এটি সকালে ব্যবহারের জন্য আদর্শ হলেও দিনে ও রাতে দু\'বার ব্যবহার উপযোগী। এমনকি হালকা মেকআপ রিমুভার হিসেবেও এটি কাজ করে।\r\n\r\n🌟 উপকারিতা (Benefits):\r\n☑️ ত্বকের প্রাকৃতিক pH লেভেল বজায় রাখে (৫.৩-৬.৩)\r\n☑️ ত্বকের গভীরে জমে থাকা ময়লা ও ধুলাবালি পরিষ্কার করে\r\n☑️ টি ট্রি অয়েল ব্রণ কমায় এবং জীবাণুর বিরুদ্ধে কাজ করে\r\n☑️ অ্যান্টি-ইনফ্ল্যামেটরি উপাদান ত্বকের ফোলা ভাব বা প্রদাহ কমায়\r\n☑️ অতিরিক্ত তেল নিয়ন্ত্রণ করে এবং পোরস পরিষ্কার করে\r\n☑️ ত্বককে হাইড্রেটেড রাখে এবং শুষ্কতা দূর করে\r\n☑️ দিনে ও রাতে ব্যবহারের জন্য উপযুক্ত\r\n☑️ হালকা মেকআপ রিমুভার হিসেবেও ব্যবহার করা যায়\r\n\r\n🧪 মূল উপাদান (Key Ingredients):\r\n\r\n🔹 Tea Tree Oil: অ্যান্টি-ব্যাকটেরিয়াল হিসেবে কাজ করে, ব্রণ ও দাগ হালকা করে এবং প্রদাহ কমায়।\r\n🔹 BHA (Beta Hydroxy Acid): ত্বকের মৃত কোষ দূর করে এবং পোরস থেকে ক্লগিং কমিয়ে ত্বককে পরিষ্কার রাখে।\r\n🔹 Primrose Oil: ত্বককে নরম করে, হাইড্রেট করে এবং পুষ্টি জোগায়।', 1450.00, 'products/hmN6RBe4SiA2InM72lKMAs2ztXMo246VXPCepfZO.jpg', '2026-01-07 06:19:32', '2026-01-07 06:19:32'),
(5, 'Cosrx Salicylic Acid Daily Gentle Cleanser 50ml', 'Cosrx Salicylic Acid Daily Gentle Cleanser 50ml\r\nCOSRX-এর এই জনপ্রিয় ফেসিয়াল ক্লিনজারটি তৈরী করা হয়েছে বিশেষভাবে তৈলাক্ত ও ব্রণপ্রবণ ত্বকের যত্নে। এতে রয়েছে ০.৫% স্যালিসিলিক অ্যাসিড, যা ত্বকের গভীরে জমে থাকা তেল ও ময়লা দূর করে, পোরস পরিষ্কার করে এবং ত্বককে করে তুলবে মসৃণ ও পরিষ্কার।\r\nএই জেন্টল এক্সফোলিয়েটিং ক্লিনজারটি:\r\n\r\nত্বক থেকে ধীরে ধীরে ময়লা ও অতিরিক্ত তেল দূর করে\r\n\r\nব্রণ ও দাগ কমাতে সাহায্য করে\r\n\r\nত্বককে করে তোলে নরম, পরিষ্কার ও সতেজ—কোনো রুক্ষতা বা টান অনুভব ছাড়াই\r\n\r\nটি ট্রি লিফ অয়েল যুক্ত, যা প্রদাহ কমায় এবং জীবাণু প্রতিরোধ করে\r\n\r\nমাইক্রো ক্রিমি সোপ সিস্টেম ব্যবহার করে নিখুঁত ক্লিনজিং নিশ্চিত করে\r\n\r\n✅ উপকারিতা:\r\n\r\nপোরস পরিষ্কার করে: ক্রিমি ফেনার সাহায্যে ত্বকের গভীর থেকে ময়লা টেনে বের করে আনে\r\n\r\nন্যাচারাল BHA উপাদান: জমে থাকা তেল ভেঙে ফেলে, ত্বকে দেয় ফ্রেশ ফিনিশ\r\n\r\nসুসংগঠিত ও পরিষ্কার ত্বক: এক্সফোলিয়েশনের মাধ্যমে ব্ল্যাকহেড ও হোয়াইটহেড গঠনে বাধা দেয়\r\n\r\nত্বক উপযোগী এসেন্স: অতিরিক্ত সেবাম নিয়ন্ত্রণ করে এবং পোরসের ভিতরের ময়লা দূর করে', 900.00, 'products/7evaE7vu3VDBUZlg6UMIgh47V1sOwOjHb4DQuH2Y.jpg', '2026-01-07 06:20:40', '2026-01-07 06:20:40'),
(6, 'COSRX Advanced Snail 96 Mucin Power Essence 30ml', '🐌 COSRX Advanced Snail 96 Mucin Power Essence – 30ml\r\nত্বককে রিপেয়ার করুন প্রাকৃতিক স্নেইল মিউসিন দিয়ে!\r\nCOSRX Advanced Snail 96 Mucin Power Essence এমন একটি জনপ্রিয় কোরিয়ান স্কিন কেয়ার প্রোডাক্ট, যা তৈরি হয়েছে ৯৬% স্নেইল সিক্রেশন ফিলট্রেট (Snail Mucin) দিয়ে। এটি ত্বকের গভীরে গিয়ে রিপেয়ার করে, রুক্ষতা দূর করে এবং ত্বককে করে তোলে কোমল, উজ্জ্বল ও গ্লোয়িং।\r\n\r\nএই এসেন্সটি বিশেষভাবে উপকারী ত্বকের হালকা দাগ, ব্রণের দাগ, রেডনেস ও পানিশূন্যতা কমাতে। হালকা টেক্সচারের এই এসেন্স খুব সহজেই ত্বকে শোষিত হয় এবং নিয়মিত ব্যবহারে স্কিনের টোন ও টেক্সচার উজ্জ্বল ও মসৃণ হয়ে ওঠে।\r\n\r\n\r\n🌿 উপকারিতা:\r\n✅ ত্বকের ক্ষত রিপেয়ার করে\r\n✅ ব্রণ ও দাগ হালকা করে\r\n✅ ত্বককে গভীর থেকে হাইড্রেট করে\r\n✅ স্কিনে ন্যাচারাল গ্লো এনে দেয়\r\n✅ অয়েল ফ্রি ও সেনসিটিভ স্কিনের জন্য উপযোগী\r\n\r\n\r\n📦 ব্যবহারবিধি:\r\n১. মুখ ভালোভাবে ক্লিনজার দিয়ে পরিষ্কার করুন\r\n২. টোনার ব্যবহার করার পর, সামান্য পরিমাণ এসেন্স মুখে লাগান\r\n৩. আলতোভাবে ট্যাপ করে শোষণ করুন\r\n৪. এরপর ময়েশ্চারাইজার ব্যবহার করুন\r\n\r\n👉 দিনে ২ বার ব্যবহার করলে সবচেয়ে ভালো ফল পাওয়া যায়।\r\n\r\nএখনই অর্ডার করুন এই ভাইরাল কোরিয়ান স্কিন কেয়ার পণ্যটি, সাশ্রয়ী দামে!\r\n💯 100% অরিজিনাল প্রোডাক্ট | 📦 ক্যাশ অন ডেলিভারি | 🚚 সারা দেশে হোম ডেলিভারি', 1000.00, 'products/R13ZD4eVWoO3H8Skh4ipkudliuxDPXQgsQPNLSRz.jpg', '2026-01-07 06:21:18', '2026-01-07 06:21:18'),
(7, '3w Clinic Intensive Uv Sunblock Cream Spf50 Pa+++', 'Intrduction of 3w Clinic Sunblock Cream\r\n3w Clinic Intensive Uv Sunblock Cream Spf50 Pa+++ is a pleasant and effective way to protect yourself from sunburn, irritation, redness, discoloration, and signs of aging. It’s an all-in-one lightweight daily cream. It shields your skin against age-causing UVA and burn-causing UVB rays while also moisturizing and deflecting the radiation rays. This SPF50 / Pa + + + Sunblock contains aloe Vera extract, which absorbs fast into the skin for a non-greasy, velvety smooth feel that also serves as a great foundation for makeup. It absorbs swiftly into the skin for a non-greasy finish, brightens skin tone, improves skin elasticity, and smoothes and plumps the skin. It helps to reduce dark spots, eliminate acne scars, and hydrates the skin, making it suppler.\r\n\r\nBenefits\r\nProtects against harmful UVA/UVB rays\r\nAloe Vera extract is included.\r\nProtect yourself from sunburns and tanned skin.\r\nFight the signs of aging\r\nSkin inflammation is relieved.\r\nCreating a flawless makeup base\r\nIt’s non-greasy, light, and absorbs quickly.', 750.00, 'products/0TAJRScKr1RnCqR1exGhZS20ChVBdL1sCalI58nZ.jpg', '2026-01-07 06:22:06', '2026-01-07 06:22:06'),
(8, '3W Clinic Moringa Brightening Cool Soothing Gel 160ml', '3W Clinic Moringa Brightening Cool Soothing Gel 160ml\r\nExperience refreshing relief with 3W Clinic Moringa Brightening Cool Soothing Gel 160ml. This gel, enriched with aloe vera and moringa extract, instantly soothes and cools irritated or sunburned skin, providing a calming sensation. With hyaluronic acid, it deeply hydrates, leaving your skin soft, smooth, and supple.\r\n\r\nFormulated with moringa extract, this gel also helps to brighten and even out skin tone, reducing dark spots and blemishes for a radiant complexion. Chamomile and calendula extracts add anti-inflammatory benefits, helping to reduce redness and inflammation.\r\n\r\nBenefits:\r\nSoothes and Cools: Aloe vera and moringa extracts calm irritated skin.\r\nHydrates and Moisturizes: Hyaluronic acid deeply moisturizes, enhancing skin softness.\r\nBrightens Skin Tone: Moringa extract helps improve skin radiance.\r\nImproves Skin Texture: Leaves skin smooth and radiant.\r\nReduces Inflammation: Chamomile and calendula soothe and reduce redness.\r\nSuitable for All Skin Types', 650.99, 'products/zk4PVtxZGzlci8AQjwmjZWwfOocgnEP6wm734SCq.jpg', '2026-01-07 06:22:51', '2026-01-07 06:22:51'),
(9, 'Axis-Y Dark Spot Correcting Glow Cream 50ml', 'The Glow Cream goes beyond hydration. Its unique gel-to-water texture glides on effortlessly, providing deep, non-sticky moisture that instantly revitalizes your skin. Powered by Ceramide NP, it fortifies your skin barrier, defending against daily stressors and breakouts. Soothing Centella Asiatica Leaf Extract (CICA) and Houttuynia Cordata extracts ensure even the most sensitive skin feels calm and nourished.\r\n\r\nWhat truly distinguishes this cream is its potent brightening blend: 2% Alpha-Arbutin, 5% Niacinamide, and a water-soluble Vitamin C derivative. Together, they target the root cause of dark spots – melanin – revealing a clearer, more radiant complexion. Enhanced with a patented plant-based brightening ingredient, this cream delivers that coveted glow.\r\n\r\nClinically Proven Results:\r\nInstant Hydration: Achieve a remarkable 667% increase in skin surface moisture with just one application, and a 254% improvement in hydration up to the 15th layer of the stratum corneum within 5 minutes.**\r\n\r\nSurface Dark Spot Reduction: Enjoy a 31% reduction in surface dark spots (melanin) after two weeks when using the Glow Perfecting Trio – Glow Toner, Glow Serum & Glow Cream together.**\r\n\r\nDeep Dark Spot Reduction: Experience a 15% reduction in deep skin dark spots in just two weeks when using the Glow Perfecting Trio – 105% more effective than using the Glow Serum alone.**', 2500.99, 'products/AOSImlcJZh8RnFdRnXveJrfLuSUcEIOSrMO4C6w4.jpg', '2026-01-07 06:26:54', '2026-01-07 06:26:54'),
(10, 'Nivea Creme 150ml', 'Nivea Creame', 800.99, 'products/fgwSx61xWyQ4Qwuvauah0tbjegQXdA2g9LqrPNxL.png', '2026-01-07 06:27:35', '2026-01-07 06:27:35'),
(11, 'Nivea Cocoa Butter Body Lotion 400ml', 'Buy Nivea body lotion deep moisture serum with cocoa butter & vitamin E for dry skin online in Bangladesh from Savershall.com. The NIVEA Cocoa Butter Body lotion, a rich creamy formula, is infused with our Deep Moisture Serum, Cocoa Butter, and Vitamin E. It delivers intense moisture to dry skin for up to 48 hours, and leaves skin radiant and lightly scented after just one application. Treat yourself to a little extra care, you won’t regret it.', 1400.99, 'products/hs0kY5yklWgfmMQ3c60gCdFQgsKCfcAT7xKcKJH4.png', '2026-01-07 06:28:20', '2026-01-07 06:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2026-01-04 03:10:02', '2026-01-04 03:10:02'),
(2, 'Customer', 'web', '2026-01-04 03:10:02', '2026-01-04 03:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `address` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$2rJjqPaXFVgrWMWDMXVM7edtl8jA72XfuDkroxXXloylVMSVZBRHu', NULL, NULL, NULL, '2026-01-04 03:10:02', '2026-01-04 03:10:02'),
(2, 'Mahmudul Haque', 'mahmudul21124@gmail.com', NULL, '$2y$10$i0J0Q/U.vreVWcS2fXGUUuYa4syPPomuIdigqlPJLO6Vjj9J0APeu', NULL, NULL, NULL, '2026-01-08 00:32:21', '2026-01-08 00:32:21');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

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
