-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2024 at 11:11 AM
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
-- Database: `office-crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conversation_logs`
--

CREATE TABLE `conversation_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `note` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conversation_logs`
--

INSERT INTO `conversation_logs` (`id`, `customer_id`, `project_id`, `note`, `created_at`, `updated_at`) VALUES
(3, 15, 1, '<p>ADD</p>', '2024-09-22 18:48:42', '2024-09-22 18:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT 'status:0->primary-client 1->contact-client 2->wanted-client 3->our-client 4->manager-wanted-client 5->non-prospective-clients',
  `company_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_id`, `location_id`, `name`, `status`, `company_name`, `email`, `phone`, `designation`, `address`, `note`, `created_at`, `updated_at`) VALUES
(15, 'C-202402', 4, 'Pranto Das', 1, 'STITBD', 'prantochandrodas@gmail.com', '01724928794', 'Developer', 'saver', 'Stitbd developers', '2024-09-22 11:32:14', '2024-09-23 12:14:41'),
(17, 'C-202403', 3, 'Santo', 5, 'Putul Properties Limited', 'prantochandrodas@gmail.com', '01724934794', 'Laboris omnis id lor', 'saver', 'Et in id minus nequ', '2024-09-22 13:06:00', '2024-09-22 14:26:53'),
(19, 'C-202405', 3, 'Wade Duffy', 2, 'Jenkins and Pope Associates', 'gikyr@mailinator.com', '91', 'Quo consequatur Eos', 'Et sint enim sed vel', 'Eum pariatur Quidem', '2024-09-22 14:18:14', '2024-09-22 14:22:55'),
(20, 'C-202406', 4, 'Cedric Francis', 3, 'Leon Bishop Co', 'vyxazemoma@mailinator.com', '26', 'Aute suscipit archit', 'Quibusdam officiis n', 'Hic sunt dolorem mol', '2024-09-22 14:18:22', '2024-09-22 14:22:15'),
(21, 'C-202407', 3, 'Ankur Roy', 0, 'Roy Box Productions', NULL, '01671529529', NULL, NULL, NULL, '2024-09-23 15:18:25', '2024-09-23 15:18:25'),
(22, 'C-202408', 3, 'Shohid Khan Joy', 0, 'Edesh', NULL, '01838682390', NULL, NULL, NULL, '2024-09-23 15:23:40', '2024-09-23 15:23:40'),
(23, 'C-202409', 3, 'Golam Mostafa Milon', 0, 'Mojumder Group', NULL, '01819279708', NULL, NULL, NULL, '2024-09-23 15:27:30', '2024-09-23 15:27:30'),
(24, 'C-202410', 3, 'Hasan Molla', 0, NULL, NULL, '01771623040', NULL, NULL, NULL, '2024-09-23 15:29:46', '2024-09-23 15:29:46'),
(25, 'C-202411', 3, NULL, 0, 'Hajin Ltd', NULL, '01328700728', 'CEO', NULL, NULL, '2024-09-23 15:31:30', '2024-09-23 15:31:30'),
(26, 'C-202412', 3, 'Imroz Hossain', 0, 'Antrom Express', NULL, '01814659250', NULL, NULL, NULL, '2024-09-23 15:33:50', '2024-09-23 15:33:50'),
(27, 'C-202413', 3, 'Hiron Mahmud', 0, 'Hira Plastic Industries', NULL, '01711307514', NULL, NULL, 'Next week nok', '2024-09-23 15:37:03', '2024-09-23 15:38:17'),
(28, 'C-202414', 3, 'Kaisanur Rahaman', 0, NULL, NULL, '01755648189', NULL, NULL, NULL, '2024-09-23 15:40:33', '2024-09-23 15:40:33'),
(29, 'C-202415', 3, 'Akm Ahmed Islam', 0, NULL, NULL, '01819250309', NULL, NULL, 'Software Metting', '2024-09-23 15:43:36', '2024-09-23 15:43:36'),
(30, 'C-202416', 3, 'Nazrul Islam', 0, NULL, NULL, '01815609014', NULL, NULL, NULL, '2024-09-23 15:45:36', '2024-09-23 15:45:36'),
(31, 'C-202417', 3, 'Sagor', 0, 'Focus Apparels BD', NULL, '01711954279', NULL, NULL, NULL, '2024-09-23 15:49:12', '2024-09-23 15:49:12'),
(32, 'C-202418', 3, 'Ferdous', 0, 'Ecabm', NULL, '01613500118', NULL, NULL, NULL, '2024-09-23 15:52:04', '2024-09-23 15:52:04'),
(33, 'C-202419', 3, 'Rashed Bhai', 0, 'Sonagazi Kamil Madrasha', NULL, '01840474658', NULL, NULL, NULL, '2024-09-23 16:09:24', '2024-09-23 16:09:24'),
(34, 'C-202420', 3, 'Shariar Anwar Kavato', 0, NULL, NULL, '01322896410', NULL, NULL, NULL, '2024-09-23 16:10:59', '2024-09-23 16:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `customer_projects`
--

CREATE TABLE `customer_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_projects`
--

INSERT INTO `customer_projects` (`id`, `customer_id`, `project_id`, `status`, `note`, `created_at`, `updated_at`) VALUES
(82, 15, 1, 'purchased', 'adds', '2024-09-22 11:32:15', '2024-09-22 18:46:02'),
(84, 17, 1, NULL, 'Maiores mollit est', '2024-09-22 13:06:00', '2024-09-22 13:10:41'),
(86, 19, 3, NULL, 'Deleniti dicta sit', '2024-09-22 14:18:14', '2024-09-22 14:18:14'),
(87, 20, 2, NULL, 'Minim blanditiis sed', '2024-09-22 14:18:22', '2024-09-22 14:18:22'),
(88, 15, 1, NULL, NULL, '2024-09-22 18:46:02', '2024-09-22 18:46:02'),
(89, 21, 3, NULL, NULL, '2024-09-23 15:18:25', '2024-09-23 15:18:25'),
(90, 22, 4, NULL, NULL, '2024-09-23 15:23:40', '2024-09-23 15:23:40'),
(91, 23, 5, NULL, NULL, '2024-09-23 15:27:30', '2024-09-23 15:27:30'),
(92, 24, 6, NULL, NULL, '2024-09-23 15:29:46', '2024-09-23 15:29:46'),
(93, 25, 1, NULL, NULL, '2024-09-23 15:31:30', '2024-09-23 15:31:30'),
(94, 26, 4, NULL, NULL, '2024-09-23 15:33:50', '2024-09-23 15:33:50'),
(95, 27, 7, NULL, NULL, '2024-09-23 15:37:03', '2024-09-23 15:38:17'),
(96, 28, 8, NULL, NULL, '2024-09-23 15:40:33', '2024-09-23 15:40:33'),
(97, 29, 9, NULL, NULL, '2024-09-23 15:43:36', '2024-09-23 15:43:36'),
(98, 30, 10, NULL, NULL, '2024-09-23 15:45:36', '2024-09-23 15:45:36'),
(99, 31, 11, NULL, NULL, '2024-09-23 15:49:12', '2024-09-23 15:49:12'),
(100, 32, 12, NULL, NULL, '2024-09-23 15:52:04', '2024-09-23 15:52:04'),
(101, 33, 10, NULL, NULL, '2024-09-23 16:09:24', '2024-09-23 16:09:24'),
(102, 34, 13, NULL, NULL, '2024-09-23 16:10:59', '2024-09-23 16:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(3, 'Dhaka', NULL, '2024-09-21 14:25:24', '2024-09-21 15:27:06'),
(4, 'RANGPUR', NULL, '2024-09-21 14:25:56', '2024-09-21 14:25:56');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `division_id`, `description`, `created_at`, `updated_at`) VALUES
(3, 'none', 3, NULL, '2024-09-21 16:18:24', '2024-09-23 15:45:52'),
(4, 'Tikatoly, Wari', 3, NULL, '2024-09-21 16:18:39', '2024-09-21 16:18:39');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(21, '2024_09_17_094556_create_projects_table', 2),
(22, '2024_09_18_045500_create_customers_table', 2),
(23, '2024_09_18_045816_create_customer_projects_table', 2),
(24, '2024_09_21_040456_create_conversation_logs_table', 3),
(26, '2024_09_21_065353_create_divisions_table', 4),
(27, '2024_09_21_072711_create_locations_table', 5),
(28, '2024_09_21_084243_update_customer_table', 6),
(29, '2024_09_21_085632_update_customer_table', 7),
(34, '2024_09_21_102523_update_and_add_status', 8);

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Ecommerce site', '1726649719_17.png', 'Impedit tempora del', '2024-09-18 15:55:19', '2024-09-18 15:55:19'),
(2, 'Delivery site', '1726649739_30.png', 'Delivery', '2024-09-18 15:55:39', '2024-09-18 15:55:39'),
(3, 'Photograpy website', '1727079354_99.jpeg', 'none', '2024-09-21 13:24:55', '2024-09-23 15:15:54'),
(4, 'Courier Software', NULL, NULL, '2024-09-23 15:23:04', '2024-09-23 15:23:04'),
(5, 'Packaging Manufacturing Management', NULL, NULL, '2024-09-23 15:25:03', '2024-09-23 15:25:03'),
(6, 'Super Shop Software', NULL, NULL, '2024-09-23 15:28:19', '2024-09-23 15:28:19'),
(7, 'Manufacturing Saftware', NULL, NULL, '2024-09-23 15:34:50', '2024-09-23 15:34:50'),
(8, 'HR Pay roll Software', NULL, NULL, '2024-09-23 15:39:26', '2024-09-23 15:39:26'),
(9, 'None', NULL, NULL, '2024-09-23 15:42:30', '2024-09-23 15:42:30'),
(10, 'Education Management', NULL, NULL, '2024-09-23 15:44:37', '2024-09-23 15:44:37'),
(11, 'Fashion Shop Pos', NULL, NULL, '2024-09-23 15:47:34', '2024-09-23 15:47:34'),
(12, 'Real State Software', NULL, NULL, '2024-09-23 15:50:18', '2024-09-23 15:50:18'),
(13, 'Hospital Management', NULL, NULL, '2024-09-23 16:10:12', '2024-09-23 16:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('NdSfDxqnPzkvo6XGRhJPvpXslwRTkRIbTsmJUfyU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN2N2QU9sQUJxeTJxMThUejZzeXpudzZ3b0hCazB6ejZGZUM3TkM3cSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcmltYXJ5LWNsaWVudCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1727082660);

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
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `conversation_logs`
--
ALTER TABLE `conversation_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conversation_logs_customer_id_foreign` (`customer_id`),
  ADD KEY `conversation_logs_project_id_foreign` (`project_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_customer_id_unique` (`customer_id`),
  ADD KEY `customers_location_id_foreign` (`location_id`);

--
-- Indexes for table `customer_projects`
--
ALTER TABLE `customer_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_projects_customer_id_foreign` (`customer_id`),
  ADD KEY `customer_projects_project_id_foreign` (`project_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_division_id_foreign` (`division_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `conversation_logs`
--
ALTER TABLE `conversation_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `customer_projects`
--
ALTER TABLE `customer_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conversation_logs`
--
ALTER TABLE `conversation_logs`
  ADD CONSTRAINT `conversation_logs_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `conversation_logs_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_projects`
--
ALTER TABLE `customer_projects`
  ADD CONSTRAINT `customer_projects_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_projects_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
