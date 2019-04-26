-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2019 at 04:41 AM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TravelGuide`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `cat_name`) VALUES
(1, '2019-02-27 09:37:57', '2019-02-27 10:46:31', 'Stores'),
(3, '2019-02-27 10:46:47', '2019-02-27 10:46:47', 'Places'),
(4, '2019-02-27 10:46:55', '2019-02-27 10:46:55', 'Hotels'),
(5, '2019-03-01 02:50:01', '2019-03-01 02:50:01', 'ATM'),
(6, '2019-03-01 02:50:17', '2019-03-01 02:50:17', 'Restaurants'),
(7, '2019-03-01 02:50:51', '2019-03-01 02:50:51', 'Transportation');

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
(3, '2019_02_27_155814_create_categories_table', 2),
(4, '2019_02_27_163805_create_upload_details_table', 3);

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
-- Table structure for table `upload_details`
--

CREATE TABLE `upload_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `location_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upload_details`
--

INSERT INTO `upload_details` (`id`, `created_at`, `updated_at`, `location_name`, `category_id`, `image`, `location_detail`, `user_id`) VALUES
(8, '2019-02-28 21:08:16', '2019-02-28 21:08:16', 'Shwe Sar Yan Pagoda', 3, 'Shwe Sar Yan Pagoda.jpg', 'Shwe Saryan Pagoda was built by King Thuriya Sanda. and believed to have enshrined eight hair relics of Kakusana Buddha. the staff of Gonaguna Buddha. the emerald alms bowl of Kassapa Buddha and four tooth relics of Gautama Buddha. in addition to gold images. It was built on Thuna Pranta Hill. Gautama Buddha arrived in Thaton on the first waning moon day of Thadingyut of 105 Maha Sakarit. He was taking leave of Weluwun Monastery donated by the king after four months when the king implored Him and He gave the four tooth relics. They were enshrined in gold. silver and ruby caskets.\r\n\r\nThen Buddha was implored to give a name to the pagoda whereupon Buddha was said. to name it Shwe Saryan for its longevity. It is 251 feet night. with Mya Thein Tan Pagoda or Thagya Pagoda in the east. with Shwe Chegan Pagoda on its platform. and Pitakataik Pagoda in the north.', 2),
(9, '2019-03-01 02:53:53', '2019-03-01 02:53:53', 'Kaung Kaung Lay', 6, 'Kaung Kaung Lay.jpeg', 'Creative Digital Marketing in Myanmar. We provide solutions, not just services. Contact us. We formulate digital strategies, social content, and creative approach to grow your brands. YouTube Ads Services. Web Design & Development. SEM Services. Facebook Services. EDM Services.', 2),
(10, '2019-03-01 02:57:22', '2019-03-01 02:57:22', 'Ayawady', 5, 'Ayawady.png', 'Ayeyarwady Bank Ltd. is a private bank in Myanmar. AYA Bank was established on 2 July 2010 with the permission of the Central Bank of Myanmar. The AYA Bank\'s head office is located in the Rowe Building Kyauktada Township of Yangon. AYA Bank had 242 branches as of January 2019.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mg Mg', 'mgmg@gmail.com', NULL, '$2y$10$rpl3O7//KG07fgmIOinYge1YAspLtDO/Q3BPiTOBfxJSSTEaKOPHO', '3aB4qOduwFO6HESvDnetafwECeKXjKjgHDdDu4aBgblc378KAsrlhzqCKcsb', '2019-02-27 09:00:33', '2019-02-27 09:00:33'),
(2, 'Myint Moe Kyaw', 'myintmoekyaw1997@gmail.com', NULL, '$2y$10$Ovp91wvLyg6NoLrvIxLSROYCw1nSH7ObmZxIgrgxhBOPW5UkhyU0.', NULL, '2019-02-28 20:19:37', '2019-02-28 20:19:37'),
(3, 'Zin Zin', 'zz@gmail.com', NULL, '$2y$10$WlOKM7P0Ykyv1H4aOAFXH.oWFGhbCkQbb03/osfymo0mEldBA/b2C', 'RfPcHgY3Vb1TCqHLpI99nsMHElBCdHQMChAiJ8NxI2K6pSWh3Iw9A7fRUJWZ', '2019-04-25 22:09:39', '2019-04-25 22:09:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `upload_details`
--
ALTER TABLE `upload_details`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `upload_details`
--
ALTER TABLE `upload_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
