-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2020 at 03:11 AM
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
-- Database: `running_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkin` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `post_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `email`, `subject`, `checkin`, `created_at`, `updated_at`, `user_id`, `post_image`) VALUES
(1, 'Mohamed Amin', 'mohamedamin.tech@gmail.com', '<p>Drink on the Run</p>\r\n\r\n<p>Practice during your remaining long and semilong runs with the&nbsp;<a href=\"https://www.runnersworld.com/nutrition-weight-loss/g22803848/best-sports-drinks-for-runners/\" target=\"_blank\">sports drink</a>&nbsp;and energy gels you intend to refuel with during the race.</p>', '0000-00-00', '2020-02-28 19:46:27', '2020-10-27 10:50:56', 1, 'drink_1603803056.jpg'),
(2, 'Mohamed Amin', 'mohamedamin.tech@gmail.com', '<h2>Add Speed to Your Longest Long Run</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Four weeks out is when I do my longest run,&nbsp;says 2:13 marathoner Keith Dowling. &ldquo;I&rsquo;ll run up to 26 miles, with this twist: I do my usual easy long-run pace for most of it, but with eight miles left, I&rsquo;ll work down to six-minute pace and drop the pace every two miles to finish at five-minute pace.</p>', '0000-00-00', '2020-10-27 10:27:49', '2020-10-27 10:53:20', 1, 'run_2_1603803200.jpg'),
(3, 'Ahmed amin', 'ahmed@gmail.com', '<h2>Dress the Part</h2>\r\n\r\n<p>Please don&rsquo;t run the marathon in a cotton T-shirt, even if it&rsquo;s for a wonderful charity,&nbsp;implores Rodgers. You&rsquo;ll run so much easier in real running clothes, such as those made of Coolmax or nylon, than in a suffocating T-shirt.</p>\r\n\r\n<p>Once you&rsquo;ve picked your marathon outfit, make sure it doesn&rsquo;t irritate your skin. I normally race in my marathon clothes before the race to feel if they&rsquo;re comfortable,says Sara Wells, the 2', '0000-00-00', '2020-10-27 10:57:52', '2020-10-27 10:57:52', 2, 'cloths_1603803472.jpg');

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
(3, '2020_02_19_185442_accounts', 1),
(4, '2020_02_25_133013_insert_column_inside_accounts', 1),
(5, '2020_02_26_004934_add_post_image_inside_accounts', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohamed Amin', 'mohamedamin.tech@gmail.com', '$2y$10$jVTUqJZ3MJVEhgB73qtjyeUQS6XrIXTqQd9W9ZnC0UTGdBGLq6uda', 'UdXR9jNd73YwLdRXvHG2wvlJsXtFy9kexLIjPDrRyaX4YesJECqKymU4EbCP', '2020-02-28 19:40:28', '2020-02-28 19:40:28'),
(2, 'Ahmed amin', 'ahmed@gmail.com', '$2y$10$NBn64X47gvTE2jnByWmwDeBWmjkI/Op2BBi8xzdcXyoogdObKDYoG', NULL, '2020-10-27 10:55:06', '2020-10-27 10:55:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
