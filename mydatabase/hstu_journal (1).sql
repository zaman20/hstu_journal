-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2024 at 12:03 PM
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
-- Database: `hstu_journal`
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
-- Table structure for table `incompletes`
--

CREATE TABLE `incompletes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `classification` varchar(255) DEFAULT NULL,
  `reviewers` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `author_comment` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `abstract` varchar(255) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incompletes`
--

INSERT INTO `incompletes` (`id`, `author`, `type`, `classification`, `reviewers`, `language`, `author_comment`, `title`, `abstract`, `keyword`, `created_at`, `updated_at`) VALUES
(63, '1', 'Full Length Article', 'Cognitive Science', 'Mamun sir', 'No', 'dddddddd', 'FIrst paper', 'Computer Biology', 'computer,biology', '2024-02-17 10:08:11', '2024-02-17 04:08:31'),
(65, '1', 'Full Length Article', 'Clinical Trial', 'Mamun sir', 'No', 'nothing else', 'test paper 3', 'Medical paper', 'computer,biology', '2024-02-17 10:14:56', '2024-02-17 04:15:23'),
(66, '1', 'Full Length Article', 'Clinical Trial', 'Mamun sir', 'No', 'nothing else', 'test paper 3', 'Medical paper', 'computer,biology', '2024-02-17 10:16:07', '2024-02-17 04:16:16'),
(67, '1', 'Full Length Article', 'Clinical Trial', 'Nitu Mam', 'No', 'This is the comment', 'test paper 3', 'Computer Biology', 'computer,biology', '2024-02-17 10:17:12', '2024-02-17 04:17:57');

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
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_02_05_181750_create_users_table', 1),
(5, '2024_02_05_181816_create_papers_table', 1),
(6, '2024_02_07_202637_create_reviewers_table', 2),
(7, '2024_02_16_194025_create_incompletes_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `article_type` varchar(255) DEFAULT NULL,
  `files` varchar(255) DEFAULT NULL,
  `classification` varchar(255) DEFAULT NULL,
  `reviewers` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `author_comment` varchar(255) DEFAULT NULL,
  `editor_comment` varchar(2555) DEFAULT NULL,
  `reviewer_comment` varchar(2555) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `abstract` varchar(255) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `editor_file` varchar(255) DEFAULT NULL,
  `reviewer_file` varchar(2555) DEFAULT NULL,
  `selected_reviewer` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`id`, `author`, `article_type`, `files`, `classification`, `reviewers`, `language`, `author_comment`, `editor_comment`, `reviewer_comment`, `title`, `abstract`, `keyword`, `status`, `editor_file`, `reviewer_file`, `selected_reviewer`, `created_at`, `updated_at`) VALUES
(1, '1', 'Full Length Article', 'upload/Lecture06_unlocked.pdf', 'Biomedical Statistics', 'Mamun sir', 'Yes', 'No comments', 'Need more keyword', NULL, 'Test Paper 1', 'Computer Biology', 'computer,biology', 1, '', NULL, 0, NULL, '2024-02-07 14:12:08'),
(2, '3', 'Short Length', 'upload/Lecture04-unlocked.pdf', 'Clinical Trial', NULL, 'Yes', NULL, NULL, NULL, 'Test Paper 2', 'Medical paper', 'medical,paper', 1, '', NULL, 0, NULL, NULL),
(3, '1', 'Short Length', 'upload/Lecture04-unlocked.pdf', 'Clinical Trial', NULL, 'Yes', NULL, 'ddd', NULL, 'Test Paper 3', 'Medical paper', 'medical,paper', 2, 'upload/Project Report working.docx', NULL, 5, NULL, '2024-02-17 06:42:08'),
(4, '1', 'Short Length', 'upload/Lecture04-unlocked.pdf', 'Clinical Trial', NULL, 'Yes', NULL, NULL, NULL, 'Test Paper 4', 'Medical paper', 'medical,paper', 3, '', NULL, 5, NULL, '2024-02-10 11:26:12'),
(5, '3', 'Short Length', 'upload/Lecture04-unlocked.pdf', 'Clinical Trial', NULL, 'Yes', NULL, NULL, NULL, 'Test Paper 5', 'Medical paper', 'medical,paper', 4, '', NULL, 0, NULL, '2024-02-17 07:16:51'),
(6, '1', 'Short Length', 'upload/Lecture04-unlocked.pdf', 'Clinical Trial', NULL, 'Yes', NULL, NULL, NULL, 'Test Pape6 2', 'Medical paper', 'medical,paper', 0, '', NULL, 0, NULL, NULL),
(7, '1', 'Full Length Article', 'upload/4-1-Project(1).pdf', 'Computional Biology', 'Nitu Mam', 'Not Applicable', 'no comments', NULL, NULL, 'Test 10', 'Computer Biology', 'computer,biology', 0, NULL, NULL, NULL, '2024-02-17 10:19:56', '2024-02-17 10:19:56');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `created_at`, `updated_at`) VALUES
(1, 'iram', 'zamanador111@gmail.com', '1234', 'author', NULL, NULL),
(2, 'ador', 'adorzaman18@gmail.com', '1234', 'editor', '2024-02-07 16:14:35', '2024-02-07 16:14:35'),
(3, 'arju', 'arju@gmail.com', '1234', 'author', '2024-02-07 21:00:46', '2024-02-07 21:00:46'),
(5, 'Mamun sir', 'mamun@gmail.com', '1234', 'reviewer', '2024-02-08 12:37:22', '2024-02-08 12:37:22');

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
-- Indexes for table `incompletes`
--
ALTER TABLE `incompletes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incompletes`
--
ALTER TABLE `incompletes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `papers`
--
ALTER TABLE `papers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
