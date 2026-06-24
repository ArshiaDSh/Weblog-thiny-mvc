-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2026 at 02:01 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+03:30";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` text COLLATE utf8_persian_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `url`, `created_at`, `updated_at`) VALUES
(7, 'public/admin/img/banner-images/2026-06-24-01-37-25.png', 'home', '2026-06-24 03:07:25', '2026-06-24 03:08:24'),
(8, 'public/admin/img/banner-images/2026-06-24-01-37-49.png', 'home', '2026-06-24 03:07:49', '2026-06-24 03:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(120) CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(13, 'news', '2022-06-29 12:39:45', '2022-07-06 22:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8_persian_ci NOT NULL,
  `status` enum('unseen','seen','approved') COLLATE utf8_persian_ci NOT NULL DEFAULT 'unseen',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `url`, `parent_id`, `created_at`, `updated_at`) VALUES
(9, 'Home', '#', NULL, '2022-07-01 22:05:02', '2026-06-24 03:25:27'),
(12, 'Contact us', '#', NULL, '2022-07-01 22:22:43', '2026-06-24 03:25:41'),
(13, 'New menu', '#', 12, '2022-07-01 22:23:07', '2026-06-24 03:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `summary` text COLLATE utf8_persian_ci NOT NULL,
  `body` text CHARACTER SET utf8 NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL,
  `cat_id` int(11) UNSIGNED NOT NULL,
  `image` text COLLATE utf8_persian_ci NOT NULL,
  `status` enum('enable','disable') COLLATE utf8_persian_ci NOT NULL DEFAULT 'disable',
  `selected` tinyint(4) NOT NULL DEFAULT 1,
  `breaking_news` tinyint(4) NOT NULL DEFAULT 1,
  `published_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `summary`, `body`, `view`, `user_id`, `cat_id`, `image`, `status`, `selected`, `breaking_news`, `published_at`, `created_at`, `updated_at`) VALUES
(19, 'Global Pandemic', '<p>&nbsp;Coronavirus Outbreak LIVE Updates: ICSE, CBSE Exams</p>\r\n\r\n<p>Postponed, 168 Trains</p>', '<p>&nbsp;Coronavirus Outbreak LIVE Updates: ICSE, CBSE Exams</p>\r\n\r\n<p>Postponed, 168 Trains</p><p>&nbsp;Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo alias atque fugiat quibusdam eos ipsa veniam cum modi amet facilis, illo eveniet sapiente quam vel in culpa, mollitia veritatis at facere excepturi! Repellat provident corporis fugiat voluptas repellendus sunt neque, debitis laudantium ab, perspiciatis omnis quia obcaecati voluptatibus similique enim a possimus quidem, aspernatur atque recusandae cumque. Delectus, ex veritatis, soluta perferendis amet autem exercitationem a, ipsam id reprehenderit nesciunt adipisci quibusdam laborum. Nesciunt voluptatum quam perferendis, atque porro reprehenderit eius voluptate sit necessitatibus recusandae sequi architecto doloremque ipsa qui natus, ducimus alias expedita, temporibus vel tempore! Repellat reiciendis quisquam illum vero aut beatae quia sit quos harum. Sapiente facere ipsum, ipsa nam tempora aliquid nesciunt deserunt quibusdam quidem hic sed qui reiciendis. Itaque corrupti ullam in quae molestiae, adipisci dolorem hic? Quidem optio, natus quam dicta perspiciatis debitis nisi illo repellendus sunt, necessitatibus, sapiente vitae vero eum. Quam, ipsum totam quibusdam qui non, tenetur quisquam ullam repudiandae rerum aspernatur at nisi sit aliquid saepe dignissimos nulla quaerat dolore est animi! Temporibus est aliquam voluptate enim officia autem repellendus consequatur soluta totam ad, inventore quod repudiandae nobis obcaecati quaerat necessitatibus a aliquid accusantium? Odio quasi porro voluptatem illum placeat facilis?</p>', 2, 8, 13, 'public/admin/img/post-images/2026-06-24-01-25-09.jpeg', 'enable', 2, 2, '2026-06-24 00:00:00', '2026-06-24 02:55:09', 2147483647),
(20, 'New news about something', '<p><strong>Here is a news about something that will intrest you</strong></p>\r\n\r\n<p><strong>Contact us in that case</strong></p>', '<p><strong>Here is a news about something that will intrest you</strong></p>\r\n\r\n<p><strong>Contact us in that case</strong></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo alias atque fugiat quibusdam eos ipsa veniam cum modi amet facilis, illo eveniet sapiente quam vel in culpa, mollitia veritatis at facere excepturi! Repellat provident corporis fugiat voluptas repellendus sunt neque, debitis laudantium ab, perspiciatis omnis quia obcaecati voluptatibus similique enim a possimus quidem, aspernatur atque recusandae cumque. Delectus, ex veritatis, soluta perferendis amet autem exercitationem a, ipsam id reprehenderit nesciunt adipisci quibusdam laborum. Nesciunt voluptatum quam perferendis, atque porro reprehenderit eius voluptate sit necessitatibus recusandae sequi architecto doloremque ipsa qui natus, ducimus alias expedita, temporibus vel tempore! Repellat reiciendis quisquam illum vero aut beatae quia sit quos harum. Sapiente facere ipsum, ipsa nam tempora aliquid nesciunt deserunt quibusdam quidem hic sed qui reiciendis. Itaque corrupti ullam in quae molestiae, adipisci dolorem hic? Quidem optio, natus quam dicta perspiciatis debitis nisi illo repellendus sunt, necessitatibus, sapiente vitae vero eum. Quam, ipsum totam quibusdam qui non, tenetur quisquam ullam repudiandae rerum aspernatur at nisi sit aliquid saepe dignissimos nulla quaerat dolore est animi! Temporibus est aliquam voluptate enim officia autem repellendus consequatur soluta totam ad, inventore quod repudiandae nobis obcaecati quaerat necessitatibus a aliquid accusantium? Odio quasi porro voluptatem illum placeat facilis?</p>', 0, 8, 13, 'public/admin/img/post-images/2026-06-24-01-28-20.jpeg', 'enable', 2, 2, '2026-06-24 00:00:00', '2026-06-24 02:58:20', 2147483647),
(21, 'Another news about something', '<p><strong>Protesters couldn&#39;t holdt them self&nbsp;<br />\r\nauthorites confims several casualities&nbsp;</strong></p>', '<p><strong>Protesters couldn&#39;t holdt them self&nbsp;<br />\r\nauthorites confims several casualities&nbsp;</strong></p><p><strong>Protesters couldn&#39;t holdt them self&nbsp;<br />\r\nauthorites confims several casualities&nbsp;</strong></p>\r\n\r\n<p>&nbsp;Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo alias atque fugiat quibusdam eos ipsa veniam cum modi amet facilis, illo eveniet sapiente quam vel in culpa, mollitia veritatis at facere excepturi! Repellat provident corporis fugiat voluptas repellendus sunt neque, debitis laudantium ab, perspiciatis omnis quia obcaecati voluptatibus similique enim a possimus quidem, aspernatur atque recusandae cumque. Delectus, ex veritatis, soluta perferendis amet autem exercitationem a, ipsam id reprehenderit nesciunt adipisci quibusdam laborum. Nesciunt voluptatum quam perferendis, atque porro reprehenderit eius voluptate sit necessitatibus recusandae sequi architecto doloremque ipsa qui natus, ducimus alias expedita, temporibus vel tempore! Repellat reiciendis quisquam illum vero aut beatae quia sit quos harum. Sapiente facere ipsum, ipsa nam tempora aliquid nesciunt deserunt quibusdam quidem hic sed qui reiciendis. Itaque corrupti ullam in quae molestiae, adipisci dolorem hic? Quidem optio, natus quam dicta perspiciatis debitis nisi illo repellendus sunt, necessitatibus, sapiente vitae vero eum. Quam, ipsum totam quibusdam qui non, tenetur quisquam ullam repudiandae rerum aspernatur at nisi sit aliquid saepe dignissimos nulla quaerat dolore est animi! Temporibus est aliquam voluptate enim officia autem repellendus consequatur soluta totam ad, inventore quod repudiandae nobis obcaecati quaerat necessitatibus a aliquid accusantium? Odio quasi porro voluptatem illum placeat facilis?</p>', 0, 8, 13, 'public/admin/img/post-images/2026-06-24-01-29-38.jpeg', 'enable', 2, 2, '2026-06-24 00:00:00', '2026-06-24 02:59:38', 2147483647),
(22, 'World cup already rusghing', '<p>With more than 4 months to world cup all tickets have been sold<br />\r\nFifa director stated that this wc would generate over 6B dollors!</p>', '<p>With more than 4 months to world cup all tickets have been sold<br />\r\nFifa director stated that this wc would generate over 6B dollors!</p><p>With more than 4 months to world cup all tickets have been sold<br />\r\nFifa director stated that this wc would generate over 6B dollors!</p>\r\n\r\n<p>&nbsp;Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo alias atque fugiat quibusdam eos ipsa veniam cum modi amet facilis, illo eveniet sapiente quam vel in culpa, mollitia veritatis at facere excepturi! Repellat provident corporis fugiat voluptas repellendus sunt neque, debitis laudantium ab, perspiciatis omnis quia obcaecati voluptatibus similique enim a possimus quidem, aspernatur atque recusandae cumque. Delectus, ex veritatis, soluta perferendis amet autem exercitationem a, ipsam id reprehenderit nesciunt adipisci quibusdam laborum. Nesciunt voluptatum quam perferendis, atque porro reprehenderit eius voluptate sit necessitatibus recusandae sequi architecto doloremque ipsa qui natus, ducimus alias expedita, temporibus vel tempore! Repellat reiciendis quisquam illum vero aut beatae quia sit quos harum. Sapiente facere ipsum, ipsa nam tempora aliquid nesciunt deserunt quibusdam quidem hic sed qui reiciendis. Itaque corrupti ullam in quae molestiae, adipisci dolorem hic? Quidem optio, natus quam dicta perspiciatis debitis nisi illo repellendus sunt, necessitatibus, sapiente vitae vero eum. Quam, ipsum totam quibusdam qui non, tenetur quisquam ullam repudiandae rerum aspernatur at nisi sit aliquid saepe dignissimos nulla quaerat dolore est animi! Temporibus est aliquam voluptate enim officia autem repellendus consequatur soluta totam ad, inventore quod repudiandae nobis obcaecati quaerat necessitatibus a aliquid accusantium? Odio quasi porro voluptatem illum placeat facilis?</p>', 1, 8, 13, 'public/admin/img/post-images/2026-06-24-01-36-23.jpeg', 'enable', 2, 2, '2026-06-24 00:00:00', '2026-06-24 03:04:24', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `saved_posts`
--

CREATE TABLE `saved_posts` (
  `id` int(11) NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(120) COLLATE utf8_persian_ci DEFAULT NULL,
  `description` text COLLATE utf8_persian_ci DEFAULT NULL,
  `keywords` text CHARACTER SET utf8 DEFAULT NULL,
  `logo` text COLLATE utf8_persian_ci DEFAULT NULL,
  `icon` text COLLATE utf8_persian_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `title`, `description`, `keywords`, `logo`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'News webisite', 'Hi, this is a news blog', 'new,webite,weblog', 'public/admin/img/setting/logo.png', 'public/admin/img/setting/icon.png', '2022-07-02 10:29:54', '2026-06-23 22:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(120) CHARACTER SET utf8 NOT NULL,
  `email` varchar(120) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `permission` enum('user','admin') CHARACTER SET utf8 NOT NULL DEFAULT 'user',
  `verify_token` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 => inactive , 1 => active',
  `forgot_token` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `forgot_token_expire` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `permission`, `verify_token`, `is_active`, `forgot_token`, `forgot_token_expire`, `created_at`, `updated_at`) VALUES
(8, 'admin', 'admin@gmail.com', '$2y$10$MeQUhTHoP/74zApf2CzIG.4kVcgu5fkYIgievoXhJK5ihfddwa8Rm', 'admin', NULL, 1, NULL, NULL, '2026-06-23 21:43:55', '2026-06-24 03:25:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`) USING BTREE,
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `saved_posts`
--
ALTER TABLE `saved_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id3` (`user_id`) USING BTREE,
  ADD KEY `post_id2` (`post_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `saved_posts`
--
ALTER TABLE `saved_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `post_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `parent_id` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `cat_id` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `saved_posts`
--
ALTER TABLE `saved_posts`
  ADD CONSTRAINT `post_id2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
