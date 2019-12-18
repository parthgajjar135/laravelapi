-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2019 at 10:05 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mylaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mobile` bigint(20) NOT NULL,
  `dob` date NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_active`, `created_at`, `updated_at`) VALUES
(1, 'Mobile', 1, '2019-11-21 10:26:06', '2019-11-21 10:26:06'),
(2, 'Laptop', 1, '2019-11-21 10:27:35', '2019-11-21 10:27:53'),
(3, 'TV', 0, '2019-11-21 10:28:21', '2019-11-21 10:28:21');

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
(28, '2014_10_12_000000_create_users_table', 1),
(29, '2014_10_12_100000_create_password_resets_table', 1),
(30, '2019_08_19_000000_create_failed_jobs_table', 1),
(31, '2019_11_15_062531_create_category_table', 1),
(32, '2019_11_19_092958_create_categories_table', 1),
(33, '2019_11_19_094626_create_sub_categories_table', 1),
(34, '2019_11_20_085954_create_products_table', 2),
(35, '2019_11_25_093002_create_orders_table', 3),
(36, '2019_11_25_093149_create_order_details_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ord_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `ord_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_no` bigint(20) NOT NULL,
  `ship_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `user_id`, `ord_status`, `ship_name`, `ship_no`, `ship_address`, `created_at`, `updated_at`) VALUES
(2, 1, 'pending', 'Paresh', 9090909090, 'Amdavad', '2019-11-25 18:30:00', '2019-11-25 18:30:00'),
(3, 1, 'pendin', 'jayesh', 909090909, 'bhavnagar', '2019-11-25 18:30:00', '2019-11-26 03:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `od_id` bigint(20) UNSIGNED NOT NULL,
  `ord_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_qty` bigint(20) NOT NULL,
  `product_price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`od_id`, `ord_id`, `product_id`, `product_qty`, `product_price`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 2, 15000, '2019-11-26 03:28:42', '2019-11-26 03:28:42');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` bigint(20) NOT NULL,
  `product_qty` bigint(20) NOT NULL,
  `subcat_id` bigint(20) UNSIGNED NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_details`, `product_price`, `product_qty`, `subcat_id`, `product_image`, `created_at`, `updated_at`) VALUES
(1, 'Sony Bravia W662F 125.7cm (50 inch) Full HD LED Smart TV  (KLV-50W662F)', 'Supported Apps: Netflix|Prime Video|Youtube\r\nOperating System: Linux based\r\nResolution: Full HD 1920 x 1080 Pixels\r\nSound Output: 10 W\r\nRefresh Rate: 50 Hz', 49999, 5, 2, 'sony-klv-50w662f-original-imaf98nwzauqrjzr.jpeg', '2019-11-21 11:37:16', '2019-11-21 11:37:16'),
(2, 'Redmi Note 8 Pro (Shadow Black, 128 GB)  (8 GB RAM)', '8 GB RAM | 128 GB ROM | Expandable Upto 128 GB\r\n16.59 cm (6.53 inch) Full HD+ Display\r\n64MP + 8MP\r\n4500 mAh Battery', 19997, 10, 1, 'mi-redmi-note-8-pro-mzb8307in-original-imafhgsasvw2wseg.jpeg', '2019-11-21 11:47:53', '2019-11-21 11:47:53'),
(3, 'OPPO F11 Pro (Aurora Green, 128 GB)  (6 GB RAM)', '6 GB RAM | 128 GB ROM | Expandable Upto 256 GB\r\n16.51 cm (6.5 inch) Full HD+ Display\r\n48MP + 5MP | 16MP Front Camera\r\n4000 mAh Li-polymer Battery\r\nMediaTek Helio P70 Octa Core 2.1 GHz Processor', 19990, 20, 3, 'f11-pro-128-d-cph1969-oppo-6-original-imafec8hzfzyg79e.jpeg', '2019-11-21 11:51:36', '2019-11-21 11:51:36'),
(4, 'Apple MacBook Pro Core i5 8th Gen - (8 GB/512 GB SSD/Mac OS Mojave) MV972HN  (13.3 inch, Space Grey, 1.37 kg)', 'Stylish & Portable Thin and Light Laptop\r\n13.3 inch Quad HD LED Backlit IPS Retina Display (True Tone Technology, Wide Color (P3), 500 nits Brightness)\r\nLight Laptop without Optical Disk Drive', 169990, 10, 8, 'apple-na-thin-and-light-laptop-original-imafgwev6abfznds.jpeg', '2019-11-21 11:55:02', '2019-11-21 11:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `subcat_id` bigint(20) UNSIGNED NOT NULL,
  `subcat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `subcat_active` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`subcat_id`, `subcat_name`, `cat_id`, `subcat_active`, `created_at`, `updated_at`) VALUES
(1, 'Redmi', 1, 1, '2019-11-21 10:35:49', '2019-11-21 10:35:49'),
(2, 'Sony', 2, 0, '2019-11-21 10:36:42', '2019-11-21 10:36:42'),
(3, 'Oppo', 1, 1, '2019-11-21 10:37:27', '2019-11-21 10:37:27'),
(4, 'Redmi', 3, 0, '2019-11-21 10:40:10', '2019-11-21 10:40:10'),
(5, 'Sony', 3, 1, '2019-11-21 10:40:53', '2019-11-21 10:40:53'),
(6, 'Vivo', 1, 1, '2019-11-21 10:41:25', '2019-11-21 10:41:25'),
(8, 'Apple', 2, 1, '2019-11-21 11:53:01', '2019-11-21 11:53:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_admin_email_unique` (`admin_email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`od_id`),
  ADD KEY `order_details_ord_id_foreign` (`ord_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_subcat_id_foreign` (`subcat_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`subcat_id`),
  ADD KEY `sub_categories_cat_id_foreign` (`cat_id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `ord_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `od_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `subcat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ord_id_foreign` FOREIGN KEY (`ord_id`) REFERENCES `orders` (`ord_id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_subcat_id_foreign` FOREIGN KEY (`subcat_id`) REFERENCES `sub_categories` (`subcat_id`);

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
