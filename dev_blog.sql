-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2020 at 02:11 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Java', 'Java_1598994300.png', '2020-07-14 16:35:43', '2020-09-01 19:05:00'),
(2, 'Laravel', 'Laravel_1598994411.jpg', '2020-07-14 16:36:05', '2020-09-01 19:06:51'),
(3, 'HTML', 'HTML_1598995169.png', '2020-07-17 19:00:06', '2020-09-01 19:19:29'),
(5, 'JavaScript', 'javascript_1598995030.jpg', '2020-07-17 19:00:39', '2020-09-01 19:17:10'),
(6, 'PHP', 'PHP_1598995075.png', '2020-07-22 12:06:22', '2020-09-01 19:17:55'),
(7, 'Mysql', 'Mysql_1598994064.png', '2020-07-22 12:07:24', '2020-09-01 19:01:04'),
(8, 'Angular', 'Angular_1598993231.png', '2020-09-01 18:47:11', '2020-09-01 18:47:11'),
(9, 'Software engineering', 'SWE_1599268589.jpg', '2020-09-04 23:16:29', '2020-09-04 23:16:29'),
(10, 'Databases', 'databases_1599268914.jpg', '2020-09-04 23:21:54', '2020-09-04 23:21:54'),
(13, 'Operating systems', 'operating systems_1599270206.jpg', '2020-09-04 23:30:27', '2020-09-04 23:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_06_29_143814_create_posts_table', 2),
(5, '2020_06_30_104542_create_categories_table', 3),
(7, '2020_08_02_124607_create_tags_table', 4),
(8, '2020_08_02_130543_post_tag_table', 5),
(10, '2020_08_06_125820_create_profiles_table', 6),
(12, '2020_08_17_123106_create_settings_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subject` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `subject`, `img_url`, `user_id`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 2, 'Laravel is theoretical web development technology.', 'password_1595579641.png', 11, 'No-title', '2020-07-24 06:34:01', '2020-08-02 10:40:05', NULL),
(5, 1, 'second post for me.', 'noimage.jpg', 11, 'No-title', '2020-07-24 07:01:11', '2020-07-27 11:55:40', NULL),
(7, 1, 'I love Mysql. I love Mysql. I love Mysql. I love Mysql. I love Mysql. I love Mysql. I love Mysql. I love Mysql. I love Mysql. I love Mysql. I love Mysql. I love Mysql. I love Mysql. I love Mysql. I love Mysql. I love Mysql. updated', 'JavaScript_1596371591.png', 11, 'mohamed-amin-khaled', '2020-07-27 07:49:02', '2020-08-02 10:40:55', '2020-08-02 10:40:55'),
(8, 1, 'I love JavaScript, I love JavaScript, I love JavaScript, I love JavaScript, I love JavaScript, I love JavaScript, I love JavaScript, I love JavaScript, I love JavaScript, I love JavaScript, I love JavaScript, I love JavaScript, I love JavaScript, edit 2nd time.', 'JavaScript_1595855411.png', 11, 'javascript-post', '2020-07-27 11:03:02', '2020-08-02 10:40:28', NULL),
(9, 2, 'how can scene add Label to VBox on another scene in the same stage and show this update immediately', 'noimage.jpg', 22, 'java-web', '2020-08-03 10:34:21', '2020-08-03 10:42:15', '2020-08-03 10:42:15'),
(10, 2, 'how can scene add Label to VBox on another scene in the same stage and show this update immediately', 'noimage.jpg', 22, 'java-web', '2020-08-03 10:36:38', '2020-08-03 10:42:22', '2020-08-03 10:42:22'),
(11, 1, 'how can scene add Label to VBox on another scene in the same stage and show this update immediately', 'noimage.jpg', 22, 'java-web', '2020-08-03 10:42:56', '2020-08-03 10:42:56', NULL),
(12, 2, 'I want to be a good web developer.', 'Laravel_1599199529.jpg', 11, 'web-design', '2020-09-04 04:05:30', '2020-09-04 04:05:30', NULL),
(13, 1, 'JavaFX is a good framework', 'Java_1599202164.png', 11, 'javafx-graphics', '2020-09-04 04:49:24', '2020-09-04 04:49:24', NULL),
(14, 7, 'Mysql is easy to learn.', 'Mysql_1599204182.png', 43, 'mysql', '2020-09-04 05:23:02', '2020-09-04 05:23:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 10, 6, NULL, NULL),
(2, 11, 5, NULL, NULL),
(3, 11, 6, NULL, NULL),
(4, 12, 7, NULL, NULL),
(5, 12, 9, NULL, NULL),
(6, 12, 10, NULL, NULL),
(7, 13, 8, NULL, NULL),
(8, 13, 9, NULL, NULL),
(9, 14, 7, NULL, NULL),
(10, 14, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL,
  `avatar` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `avatar`, `facebook`, `twitter`, `github`, `about`, `created_at`, `updated_at`) VALUES
(3, 11, 'avatar.png', NULL, NULL, NULL, NULL, '2020-08-09 11:28:11', '2020-08-09 11:28:11'),
(11, 22, 'avatar.png', NULL, NULL, NULL, NULL, '2020-08-09 12:25:00', '2020-08-09 12:25:00'),
(17, 28, 'avatar.png', NULL, NULL, NULL, NULL, '2020-08-15 08:08:10', '2020-08-15 08:08:10'),
(18, 29, 'avatar.png', NULL, NULL, NULL, NULL, '2020-08-17 06:50:07', '2020-08-17 06:50:07'),
(19, 30, 'avatar.png', NULL, NULL, NULL, NULL, '2020-08-17 08:20:55', '2020-08-17 08:20:55'),
(20, 31, 'avatar.png', NULL, NULL, NULL, NULL, '2020-09-03 11:24:54', '2020-09-03 11:24:54'),
(21, 32, 'avatar.png', NULL, NULL, NULL, NULL, '2020-09-03 11:34:12', '2020-09-03 11:34:12'),
(32, 43, 'avatar.png', NULL, NULL, NULL, NULL, '2020-09-03 12:28:12', '2020-09-03 12:28:12');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `blog_name`, `phone_number`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Developers Blog', '01027648297', 'Mohamedamin.tech@gmail.com', 'Albehera - Egypt', NULL, '2020-08-20 12:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'Laravel_5.7', '2020-08-06 07:35:30', '2020-08-06 07:35:30', NULL),
(8, 'JavaFX', '2020-08-06 07:35:47', '2020-08-06 07:35:47', NULL),
(9, 'CSS 3', '2020-08-06 07:35:59', '2020-08-06 07:35:59', NULL),
(10, 'JavaScript', '2020-08-06 07:36:19', '2020-08-06 07:36:19', NULL),
(11, 'Java database', '2020-09-04 23:52:34', '2020-09-04 23:56:51', '2020-09-04 23:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `admin`, `email`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(11, 'mohamed amin', 'on', 'mohamedamin.tech@gmail.com', '$2y$10$cE50cqnhPZTAsrvrZpwKvuikvcot7Zv7Cys2bVionHG9jsX2ZZiQK', '2020-08-27 12:48:28', 'NjZsZEYOCkc0BAlXvvFJuyPKVCME5cYlRQ0ej1juVW5y7KS3r1UzWdXTfBFf', '2020-08-09 11:28:11', '2020-10-11 10:20:37'),
(22, 'ahmed amin', 'off', 'ahmed@gmail.com', '$2y$10$0k5XYCDMb.NYN5OVuKo2.eOXYJWZdLxlgw/9zsyx2VDtjGHiGaCQu', NULL, NULL, '2020-08-09 12:24:59', '2020-08-09 12:24:59'),
(28, 'ahmed hamed', 'off', 'aboamin7292@gmail.com', '$2y$10$jRw8LeKnwuaprR8Th3jsouxJe6/DRJLAAXmzZuI0JVu2Cht5K6pKi', NULL, NULL, '2020-08-15 08:08:10', '2020-08-17 10:27:03'),
(29, 'Mahmoud Khaled', 'off', 'mahmoudkhaled@gmail.com', '$2y$10$Gca4cOIXM5tyBhUaH26LKOJ1xD.kFGaAXlLWRI4ekZRo2yYznDHK.', NULL, NULL, '2020-08-17 06:50:05', '2020-08-17 06:50:05'),
(30, 'mostafa hegazy', 'on', 'mostafa@gmail.com', '$2y$10$FR1FEv2HoWG/g1l0r.jj0.Z5ltRDnhogSPMg613ej5n/XIHdE5rwC', NULL, NULL, '2020-08-17 08:20:55', '2020-08-17 08:20:55'),
(31, 'ahmed adel', 'off', 'ahmedadel@gmail.com', '$2y$10$OAnsNFyJurUBlSTf3qZEfeFsmNW.5WDswImBsLcnbMFJWkjqeDjWa', '2020-09-06 21:26:51', NULL, '2020-09-03 11:24:54', '2020-09-06 21:26:51'),
(32, 'mohamed adel', 'off', 'mohamedadel@gmail.com', '$2y$10$m2r5Tc4DIj6D/0FQGwmL1en2FMB2axTcPOVUdhyUYVc.NpxYD9uBe', NULL, NULL, '2020-09-03 11:34:12', '2020-09-03 11:34:12'),
(43, 'eslam hamdy', 'off', 'eslam@gmail.com', '$2y$10$j/mHoIlPFF93FZ882NJ45udS5tztrGPw804fhbhZyVUOr1KJwm6QC', '2020-09-04 05:20:56', NULL, '2020-09-03 12:28:12', '2020-09-04 05:20:56');

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`,`tag_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
