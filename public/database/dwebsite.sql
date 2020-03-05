-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2020 at 11:07 AM
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
-- Database: `dwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paragraph` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `short_about`, `image`, `paragraph`, `facebook`, `twitter`, `youtube`, `linkedin`, `entry_by`, `created_at`, `updated_at`) VALUES
(1, 'Welcome to Sparrow', 'The standard Lorem Ipsum passage, used since the 1500s \"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in', '1583297998.jpg', '<p><span style=\"font-size: 14.4px;\">The standard Lorem Ipsum passage, used since the 1500s \"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud&nbsp;</span><span style=\"font-size: 14.4px; background-color: rgb(255, 255, 0);\">exercitation ullamco laboris nisi ut aliquip ex ea commodo consequa</span><span style=\"font-size: 14.4px;\">t. Duis aute irure dolor in </span></p><p><span style=\"font-size: 14.4px;\">reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\" Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC \"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\" 1914 translation by H. Rackham \"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\" Section 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC \"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum </span></p><p><span style=\"font-size: 14.4px;\">deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"</span></p>', 'https://www.facebook.com/', '#', '#', '#', 1, '2020-01-28 06:22:33', '2020-03-05 06:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int(8) DEFAULT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `date`, `title`, `view`, `image`, `details`, `entry_by`, `created_at`, `updated_at`) VALUES
(1, 6, '2020-03-04', 'Find Your Dream Real Estate', 1, '1583317679.jpg', '<p style=\"margin-bottom: 5px; font-size: 15px; line-height: 27px; color: rgb(83, 83, 83); font-family: Raleway, sans-serif;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five</p><p style=\"margin-bottom: 5px; font-size: 15px; line-height: 27px; color: rgb(83, 83, 83); font-family: Raleway, sans-serif;\">electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.But also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. But also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.more recently with desktop publishing</p><p style=\"margin-bottom: 5px; font-size: 15px; line-height: 27px; color: rgb(83, 83, 83); font-family: Raleway, sans-serif;\">essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. But also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.more recently with desktop publishing</p><p style=\"margin-bottom: 5px; font-size: 15px; line-height: 27px; color: rgb(83, 83, 83); font-family: Raleway, sans-serif;\">porem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.But also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.But also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. But also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.more recently with desktop publishing</p>', 1, '2020-03-04 10:27:59', '2020-03-04 10:27:59'),
(2, 12, '2020-03-04', 'Find Your Dream Real Estate', NULL, '1583317679.jpg', '<p style=\"margin-bottom: 5px; font-size: 15px; line-height: 27px; color: rgb(83, 83, 83); font-family: Raleway, sans-serif;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five</p><p style=\"margin-bottom: 5px; font-size: 15px; line-height: 27px; color: rgb(83, 83, 83); font-family: Raleway, sans-serif;\">electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.But also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. But also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.more recently with desktop publishing</p><p style=\"margin-bottom: 5px; font-size: 15px; line-height: 27px; color: rgb(83, 83, 83); font-family: Raleway, sans-serif;\">essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. But also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.more recently with desktop publishing</p><p style=\"margin-bottom: 5px; font-size: 15px; line-height: 27px; color: rgb(83, 83, 83); font-family: Raleway, sans-serif;\">porem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.But also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.But also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. But also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.more recently with desktop publishing</p>', 1, '2020-03-04 10:27:59', '2020-03-04 10:27:59'),
(3, 12, '2020-03-05', 'Lorem ipsum dolor sit amet', NULL, '1583382771.jpg', '<p style=\"-webkit-tap-highlight-color: transparent; margin-top: 1.5em; margin-bottom: 1.5em; color: rgb(123, 136, 152); font-size: 1.1875em; font-family: &quot;Mercury SSm A&quot;, &quot;Mercury SSm B&quot;, Georgia, Times, &quot;Times New Roman&quot;, &quot;Microsoft YaHei New&quot;, &quot;Microsoft Yahei&quot;, 微软雅黑, 宋体, SimSun, STXihei, 华文细黑, serif; line-height: 1.5; animation: 1000ms linear 0s 1 normal none running fadeInLorem;\"><span style=\"background-color: rgb(255, 255, 255); font-family: Arial;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim ut sem viverra aliquet. Quis risus sed vulputate odio ut enim blandit volutpat maecenas. A condimentum vitae sapien pellentesque habitant morbi tristique. Ornare quam viverra orci sagittis eu. Neque sodales ut etiam sit amet nisl. Id neque aliquam vestibulum morbi blandit cursus risus. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque elit. Senectus et netus et malesuada. Ante metus dictum at tempor commodo ullamcorper a. Libero id faucibus nisl tincidunt. Pulvinar etiam non quam lacus suspendisse faucibus interdum posuere lorem. Vel orci porta non pulvinar. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus. Egestas erat imperdiet sed euismod nisi porta lorem mollis aliquam.</span></p><p style=\"-webkit-tap-highlight-color: transparent; margin-top: 1.5em; margin-bottom: 1.5em; color: rgb(123, 136, 152); font-size: 1.1875em; font-family: &quot;Mercury SSm A&quot;, &quot;Mercury SSm B&quot;, Georgia, Times, &quot;Times New Roman&quot;, &quot;Microsoft YaHei New&quot;, &quot;Microsoft Yahei&quot;, 微软雅黑, 宋体, SimSun, STXihei, 华文细黑, serif; line-height: 1.5; animation: 1000ms linear 0s 1 normal none running fadeInLorem;\"><span style=\"background-color: rgb(255, 255, 255); font-family: Arial;\">In massa tempor nec feugiat nisl. Ante in nibh mauris cursus mattis molestie. Lorem ipsum dolor sit amet consectetur adipiscing elit. Ipsum nunc aliquet bibendum enim facilisis gravida neque convallis. Eros in cursus turpis massa tincidunt. Suspendisse potenti nullam ac tortor vitae purus. Fames ac turpis egestas integer eget aliquet nibh praesent. Eget aliquet nibh praesent tristique magna sit. Adipiscing commodo elit at imperdiet dui accumsan sit amet. Neque sodales ut etiam sit amet nisl purus in. Nulla malesuada pellentesque elit eget gravida cum sociis. Massa id neque aliquam vestibulum morbi blandit cursus risus. Vitae sapien pellentesque habitant morbi tristique senectus et netus. Nisl condimentum id venenatis a. Nec nam aliquam sem et. Nunc lobortis mattis aliquam faucibus purus in. Vel pharetra vel turpis nunc.</span></p>', 1, '2020-03-05 04:32:51', '2020-03-05 04:32:51'),
(4, 6, '2020-03-05', 'Maecenas pharetra convallis', 7, '1583383221.jpg', '<p style=\"-webkit-tap-highlight-color: transparent; margin-top: 1.5em; margin-bottom: 1.5em; color: rgb(123, 136, 152); font-size: 1.1875em; font-family: &quot;Mercury SSm A&quot;, &quot;Mercury SSm B&quot;, Georgia, Times, &quot;Times New Roman&quot;, &quot;Microsoft YaHei New&quot;, &quot;Microsoft Yahei&quot;, 微软雅黑, 宋体, SimSun, STXihei, 华文细黑, serif; line-height: 1.5; animation: 1000ms linear 0s 1 normal none running fadeInLorem;\"><span style=\"background-color: rgb(255, 255, 255); font-family: Arial;\">Scelerisque mauris pellentesque pulvinar pellentesque habitant morbi tristique. Eu augue ut lectus arcu bibendum at varius vel pharetra. Lacinia quis vel eros donec ac. Viverra accumsan in nisl nisi. Quam nulla porttitor massa id neque aliquam. Amet tellus cras adipiscing enim eu turpis egestas pretium aenean. Massa tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada. Sapien eget mi proin sed libero enim sed faucibus. Nunc non blandit massa enim nec dui nunc mattis. Ipsum faucibus vitae aliquet nec ullamcorper sit amet. Dui nunc mattis enim ut tellus elementum.</span></p><p style=\"-webkit-tap-highlight-color: transparent; margin-top: 1.5em; margin-bottom: 1.5em; color: rgb(123, 136, 152); font-size: 1.1875em; font-family: &quot;Mercury SSm A&quot;, &quot;Mercury SSm B&quot;, Georgia, Times, &quot;Times New Roman&quot;, &quot;Microsoft YaHei New&quot;, &quot;Microsoft Yahei&quot;, 微软雅黑, 宋体, SimSun, STXihei, 华文细黑, serif; line-height: 1.5; animation: 1000ms linear 0s 1 normal none running fadeInLorem;\"><span style=\"background-color: rgb(255, 255, 255); font-family: Arial;\">Maecenas pharetra convallis posuere morbi. Aliquam sem fringilla ut morbi tincidunt augue interdum. Lorem ipsum dolor sit amet consectetur adipiscing. Felis donec et odio pellentesque diam volutpat. Scelerisque purus semper eget duis at tellus at. Natoque penatibus et magnis dis parturient. Euismod nisi porta lorem mollis aliquam. Aliquet risus feugiat in ante metus dictum at. Et molestie ac feugiat sed lectus vestibulum mattis ullamcorper. Adipiscing elit duis tristique sollicitudin nibh sit amet. Rhoncus mattis rhoncus urna neque viverra justo nec ultrices. Cursus in hac habitasse platea dictumst quisque sagittis.</span></p>', 1, '2020-03-05 04:40:21', '2020-03-05 07:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entry_by` bigint(20) UNSIGNED NOT NULL,
  `category_type` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 for Active and 0 for Inavtive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `entry_by`, `category_type`, `category_name`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 'Mobile', 'ok', 1, '2020-03-02 12:03:56', '2020-03-02 12:49:45'),
(2, 1, '2', 'Apartment', 'ok', 1, '2020-03-02 12:52:41', '2020-03-02 12:52:41'),
(3, 1, '1', 'Food', NULL, 1, '2020-03-03 06:31:00', '2020-03-03 06:31:00'),
(4, 1, '2', 'Office', 'ok', 1, '2020-03-02 12:52:41', '2020-03-02 12:52:41'),
(5, 1, '2', 'House', 'ok', 1, '2020-03-02 12:52:41', '2020-03-02 12:52:41'),
(6, 1, '3', 'Single Family', NULL, 1, '2020-03-04 09:52:26', '2020-03-04 09:52:26'),
(12, 1, '3', 'Condo', NULL, 1, '2020-03-04 09:52:26', '2020-03-04 09:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `client_logos`
--

CREATE TABLE `client_logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_logos`
--

INSERT INTO `client_logos` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Good Clent', '1583226481.png', '2020-03-03 09:08:01', '2020-03-03 09:08:01'),
(2, 'gh', '1583226541.png', '2020-03-03 09:09:01', '2020-03-03 09:09:01'),
(3, 'gfjhgj', '1583226686.png', '2020-03-03 09:11:26', '2020-03-03 09:11:26'),
(4, 'gfjhgj', '1583226686.png', '2020-03-03 09:11:26', '2020-03-03 09:11:26'),
(5, 'gfjhgj', '1583226686.png', '2020-03-03 09:11:26', '2020-03-03 09:11:26'),
(6, 'gfjhgj', '1583226686.png', '2020-03-03 09:11:26', '2020-03-03 09:11:26'),
(7, 'gfjhgj', '1583226686.png', '2020-03-03 09:11:26', '2020-03-03 09:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo.png',
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `title`, `company_name`, `email`, `mobile`, `phone`, `logo`, `address`, `website`, `created_at`, `updated_at`) VALUES
(1, 'Sparrow', 'sparrow', 'info@sparrow.com', '01860-001807', '01860-001807', '1583152891.png', '62, Rambabu Road, Notun Bazar, Mymensingh-2200', 'https://sparrow.com', NULL, '2020-03-02 12:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `googlemap` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `title`, `logo`, `phone`, `fax`, `email`, `address`, `website`, `googlemap`, `entry_by`, `created_at`, `updated_at`) VALUES
(1, 'Sparrow', '1580189903.png', '01860001807', '018465454', 'info@sparrow.com', '62, Rambabu Road, Notun Bazar, Mymensingh-2200', 'http://127.0.0.1:8000/contact-us', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5123.841597070662!2d90.41087195939622!3d24.757652617502337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37564f91b7db155d%3A0x14b2d4bfe7dd000f!2sUS%20IT%20Solution%20LLC!5e0!3m2!1sen!2sbd!4v1583394343999!5m2!1sen!2sbd', 1, '2020-01-28 05:38:24', '2020-03-05 07:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `phone`, `email`, `subject`, `details`, `entry_by`, `created_at`, `updated_at`) VALUES
(1, 'Md. Rubel Rana', '01775034549', 'rubel.bu112@gmail.com', 'Purchase For Product', 'dfgfhfgh', NULL, '2020-03-04 08:18:01', '2020-03-04 08:18:01'),
(2, 'Md. Rubel Rana', '01775034549', 'rubel.bu112@gmail.com', 'Purchase For Product', 'fgfgfd', NULL, '2020-03-04 08:20:56', '2020-03-04 08:20:56'),
(3, 'Md. Rubel Rana', '01775034549', 'rubel.bu112@gmail.com', 'Purchase For Product', 'zfgfh', NULL, '2020-03-04 08:21:49', '2020-03-04 08:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `entry_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `category_id`, `title`, `image`, `entry_by`, `created_at`, `updated_at`) VALUES
(1, 2, 'Shuvo Noboborsho', '1583297952.jpg', 1, '2020-01-28 06:16:23', '2020-03-04 04:59:12'),
(2, 5, 'chareckter dhila', '1583218395.jpg', 1, '2020-03-03 06:53:16', '2020-03-03 06:53:16'),
(3, 2, 'chareckter dhila', '1583218265.jpg', 1, '2020-03-03 06:53:16', '2020-03-03 06:53:16'),
(4, 4, 'chareckter dhila', '1583217325.jpg', 1, '2020-03-03 06:53:16', '2020-03-03 06:53:16'),
(5, 2, 'chareckter dhila', '1513218395.jpg', 1, '2020-03-03 06:53:16', '2020-03-03 06:53:16'),
(6, 5, 'chareckter dhila', '1583238395.jpg', 1, '2020-03-03 06:53:16', '2020-03-03 06:53:16'),
(7, 2, 'chareckter dhila', '1583218795.jpg', 1, '2020-03-03 06:53:16', '2020-03-03 06:53:16'),
(8, 4, 'chareckter dhila', '1583218395.jpg', 1, '2020-03-03 06:53:16', '2020-03-03 06:53:16'),
(9, 4, 'chareckter dhila', '1583118395.jpg', 1, '2020-03-03 06:53:16', '2020-03-03 06:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone1` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_12_01_051744_entrust_setup_tables', 1),
(4, '2020_01_02_123707_create_sliders_table', 1),
(5, '2020_01_02_123720_create_abouts_table', 1),
(6, '2020_01_02_123747_create_w_products_table', 1),
(7, '2020_01_02_123802_create_reviews_table', 1),
(8, '2020_01_02_123815_create_industries_table', 1),
(9, '2020_01_02_123832_create_galleries_table', 1),
(10, '2020_01_02_123913_create_contacts_table', 1),
(11, '2020_01_05_131710_create_contact_us_table', 1),
(12, '2020_01_09_110922_create_companies_table', 1),
(13, '2020_03_02_174146_create_categories_table', 2),
(14, '2020_03_03_143318_create_client_logos_table', 3),
(15, '2020_03_03_153447_create_services_table', 4),
(16, '2020_03_04_152956_create_blogs_table', 5),
(17, '2020_03_05_154502_create_subscibes_table', 6);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'manage-users', 'Manage User', 'Manage User..', '2020-01-28 05:30:58', '2020-01-28 05:30:58'),
(2, 'create-user', 'Create User', 'Create User..', '2020-01-28 05:30:58', '2020-01-28 05:30:58'),
(3, 'read-user', 'Read User', 'Read User..', '2020-01-28 05:30:58', '2020-01-28 05:30:58'),
(4, 'update-user', 'Update User', 'Update User..', '2020-01-28 05:30:59', '2020-01-28 05:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `star` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `image`, `star`, `details`, `entry_by`, `created_at`, `updated_at`) VALUES
(1, 'Good Saffron Restaurant', '1581755148.png', '5', '\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"', 1, '2020-01-28 06:24:27', '2020-02-15 08:25:48'),
(2, 'Md. Rubel Rana', '1580192667.jpg', '5', '\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will,', 1, '2020-01-28 06:24:27', '2020-01-28 06:24:27');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'User', 'User', 'ok', '2020-01-28 05:55:42', '2020-01-28 05:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `icon`, `title`, `image`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 'fa-linkedin', 'Eget mi proin sed', '1583229673.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra suspendisse potenti nullam ac tortor vitae purus faucibus ornare. Sollicitudin nibh sit amet commodo. Pellentesque habitant morbi tristique senectus et netus. Cursus turpis massa tincidunt dui ut ornare. Gravida cum sociis natoque penatibus et magnis. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Cras fermentum odio eu feugiat pretium nibh ipsum consequat. Facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Tortor vitae purus faucibus ornare. Ut pharetra sit amet aliquam id diam maecenas ultricies mi. Imperdiet dui accumsan sit amet nulla facilisi. Et sollicitudin ac orci phasellus egestas tellus rutrum. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Sed blandit libero volutpat sed cras. Quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Et malesuada fames ac turpis egestas maecenas pharetra. Mi tempus imperdiet nulla malesuada pellentesque elit eget gravida. Libero nunc consequat interdum varius sit amet mattis vulputate enim. Dolor magna eget est lorem ipsum dolor sit amet.\r\n\r\nEget mi proin sed libero enim sed faucibus turpis. Neque ornare aenean euismod elementum nisi quis eleifend. Elit duis tristique sollicitudin nibh sit amet commodo nulla facilisi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis. Nunc mi ipsum faucibus vitae aliquet. Laoreet non curabitur gravida arcu ac. Rhoncus mattis rhoncus urna neque viverra. Morbi tincidunt ornare massa eget egestas purus viverra accumsan in. Neque volutpat ac tincidunt vitae semper quis lectus nulla. Aenean euismod elementum nisi quis eleifend. Dolor morbi non arcu risus quis varius quam quisque. Ut eu sem integer vitae justo eget magna fermentum iaculis. A diam sollicitudin tempor id eu nisl nunc mi. Rhoncus aenean vel elit scelerisque. Ut venenatis tellus in metus vulputate eu scelerisque felis. Eu ultrices vitae auctor eu augue ut lectus arcu. Amet porttitor eget dolor morbi. Posuere sollicitudin aliquam ultrices sagittis. Morbi non arcu risus quis varius quam quisque. Consequat mauris nunc congue nisi vitae suscipit tellus mauris a.\r\n\r\nScelerisque mauris pellentesque pulvinar pellentesque habitant. Morbi tincidunt ornare massa eget. Enim sit amet venenatis urna cursus eget. Aliquam ultrices sagittis orci a scelerisque purus semper. Eget gravida cum sociis natoque penatibus et. Volutpat sed cras ornare arcu. Mauris sit amet massa vitae tortor. Fermentum iaculis eu non diam phasellus vestibulum lorem sed. Enim ut sem viverra aliquet eget. Sit amet consectetur adipiscing elit. Tristique et egestas quis ipsum suspendisse ultrices gravida. Orci porta non pulvinar neque laoreet suspendisse interdum consectetur libero. Elementum facilisis leo vel fringilla est. Sapien faucibus et molestie ac feugiat.', 1, '2020-03-03 10:01:13', '2020-03-03 10:01:13'),
(2, 'fa-user', 'Eget mi proin sed', '1583229673.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra suspendisse potenti nullam ac tortor vitae purus faucibus ornare. Sollicitudin nibh sit amet commodo. Pellentesque habitant morbi tristique senectus et netus. Cursus turpis massa tincidunt dui ut ornare. Gravida cum sociis natoque penatibus et magnis. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Cras fermentum odio eu feugiat pretium nibh ipsum consequat. Facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Tortor vitae purus faucibus ornare. Ut pharetra sit amet aliquam id diam maecenas ultricies mi. Imperdiet dui accumsan sit amet nulla facilisi. Et sollicitudin ac orci phasellus egestas tellus rutrum. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Sed blandit libero volutpat sed cras. Quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Et malesuada fames ac turpis egestas maecenas pharetra. Mi tempus imperdiet nulla malesuada pellentesque elit eget gravida. Libero nunc consequat interdum varius sit amet mattis vulputate enim. Dolor magna eget est lorem ipsum dolor sit amet.\r\n\r\nEget mi proin sed libero enim sed faucibus turpis. Neque ornare aenean euismod elementum nisi quis eleifend. Elit duis tristique sollicitudin nibh sit amet commodo nulla facilisi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis. Nunc mi ipsum faucibus vitae aliquet. Laoreet non curabitur gravida arcu ac. Rhoncus mattis rhoncus urna neque viverra. Morbi tincidunt ornare massa eget egestas purus viverra accumsan in. Neque volutpat ac tincidunt vitae semper quis lectus nulla. Aenean euismod elementum nisi quis eleifend. Dolor morbi non arcu risus quis varius quam quisque. Ut eu sem integer vitae justo eget magna fermentum iaculis. A diam sollicitudin tempor id eu nisl nunc mi. Rhoncus aenean vel elit scelerisque. Ut venenatis tellus in metus vulputate eu scelerisque felis. Eu ultrices vitae auctor eu augue ut lectus arcu. Amet porttitor eget dolor morbi. Posuere sollicitudin aliquam ultrices sagittis. Morbi non arcu risus quis varius quam quisque. Consequat mauris nunc congue nisi vitae suscipit tellus mauris a.\r\n\r\nScelerisque mauris pellentesque pulvinar pellentesque habitant. Morbi tincidunt ornare massa eget. Enim sit amet venenatis urna cursus eget. Aliquam ultrices sagittis orci a scelerisque purus semper. Eget gravida cum sociis natoque penatibus et. Volutpat sed cras ornare arcu. Mauris sit amet massa vitae tortor. Fermentum iaculis eu non diam phasellus vestibulum lorem sed. Enim ut sem viverra aliquet eget. Sit amet consectetur adipiscing elit. Tristique et egestas quis ipsum suspendisse ultrices gravida. Orci porta non pulvinar neque laoreet suspendisse interdum consectetur libero. Elementum facilisis leo vel fringilla est. Sapien faucibus et molestie ac feugiat.', 1, '2020-03-03 10:01:13', '2020-03-03 10:01:13'),
(3, 'fa-user', 'Eget mi proin sed', '1583229673.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra suspendisse potenti nullam ac tortor vitae purus faucibus ornare. Sollicitudin nibh sit amet commodo. Pellentesque habitant morbi tristique senectus et netus. Cursus turpis massa tincidunt dui ut ornare. Gravida cum sociis natoque penatibus et magnis. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Cras fermentum odio eu feugiat pretium nibh ipsum consequat. Facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Tortor vitae purus faucibus ornare. Ut pharetra sit amet aliquam id diam maecenas ultricies mi. Imperdiet dui accumsan sit amet nulla facilisi. Et sollicitudin ac orci phasellus egestas tellus rutrum. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Sed blandit libero volutpat sed cras. Quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Et malesuada fames ac turpis egestas maecenas pharetra. Mi tempus imperdiet nulla malesuada pellentesque elit eget gravida. Libero nunc consequat interdum varius sit amet mattis vulputate enim. Dolor magna eget est lorem ipsum dolor sit amet.\r\n\r\nEget mi proin sed libero enim sed faucibus turpis. Neque ornare aenean euismod elementum nisi quis eleifend. Elit duis tristique sollicitudin nibh sit amet commodo nulla facilisi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis. Nunc mi ipsum faucibus vitae aliquet. Laoreet non curabitur gravida arcu ac. Rhoncus mattis rhoncus urna neque viverra. Morbi tincidunt ornare massa eget egestas purus viverra accumsan in. Neque volutpat ac tincidunt vitae semper quis lectus nulla. Aenean euismod elementum nisi quis eleifend. Dolor morbi non arcu risus quis varius quam quisque. Ut eu sem integer vitae justo eget magna fermentum iaculis. A diam sollicitudin tempor id eu nisl nunc mi. Rhoncus aenean vel elit scelerisque. Ut venenatis tellus in metus vulputate eu scelerisque felis. Eu ultrices vitae auctor eu augue ut lectus arcu. Amet porttitor eget dolor morbi. Posuere sollicitudin aliquam ultrices sagittis. Morbi non arcu risus quis varius quam quisque. Consequat mauris nunc congue nisi vitae suscipit tellus mauris a.\r\n\r\nScelerisque mauris pellentesque pulvinar pellentesque habitant. Morbi tincidunt ornare massa eget. Enim sit amet venenatis urna cursus eget. Aliquam ultrices sagittis orci a scelerisque purus semper. Eget gravida cum sociis natoque penatibus et. Volutpat sed cras ornare arcu. Mauris sit amet massa vitae tortor. Fermentum iaculis eu non diam phasellus vestibulum lorem sed. Enim ut sem viverra aliquet eget. Sit amet consectetur adipiscing elit. Tristique et egestas quis ipsum suspendisse ultrices gravida. Orci porta non pulvinar neque laoreet suspendisse interdum consectetur libero. Elementum facilisis leo vel fringilla est. Sapien faucibus et molestie ac feugiat.', 1, '2020-03-03 10:01:13', '2020-03-03 10:01:13'),
(4, 'fa-user', 'Eget mi proin sed', '1583229673.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra suspendisse potenti nullam ac tortor vitae purus faucibus ornare. Sollicitudin nibh sit amet commodo. Pellentesque habitant morbi tristique senectus et netus. Cursus turpis massa tincidunt dui ut ornare. Gravida cum sociis natoque penatibus et magnis. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Cras fermentum odio eu feugiat pretium nibh ipsum consequat. Facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Tortor vitae purus faucibus ornare. Ut pharetra sit amet aliquam id diam maecenas ultricies mi. Imperdiet dui accumsan sit amet nulla facilisi. Et sollicitudin ac orci phasellus egestas tellus rutrum. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Sed blandit libero volutpat sed cras. Quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Et malesuada fames ac turpis egestas maecenas pharetra. Mi tempus imperdiet nulla malesuada pellentesque elit eget gravida. Libero nunc consequat interdum varius sit amet mattis vulputate enim. Dolor magna eget est lorem ipsum dolor sit amet.\r\n\r\nEget mi proin sed libero enim sed faucibus turpis. Neque ornare aenean euismod elementum nisi quis eleifend. Elit duis tristique sollicitudin nibh sit amet commodo nulla facilisi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis. Nunc mi ipsum faucibus vitae aliquet. Laoreet non curabitur gravida arcu ac. Rhoncus mattis rhoncus urna neque viverra. Morbi tincidunt ornare massa eget egestas purus viverra accumsan in. Neque volutpat ac tincidunt vitae semper quis lectus nulla. Aenean euismod elementum nisi quis eleifend. Dolor morbi non arcu risus quis varius quam quisque. Ut eu sem integer vitae justo eget magna fermentum iaculis. A diam sollicitudin tempor id eu nisl nunc mi. Rhoncus aenean vel elit scelerisque. Ut venenatis tellus in metus vulputate eu scelerisque felis. Eu ultrices vitae auctor eu augue ut lectus arcu. Amet porttitor eget dolor morbi. Posuere sollicitudin aliquam ultrices sagittis. Morbi non arcu risus quis varius quam quisque. Consequat mauris nunc congue nisi vitae suscipit tellus mauris a.\r\n\r\nScelerisque mauris pellentesque pulvinar pellentesque habitant. Morbi tincidunt ornare massa eget. Enim sit amet venenatis urna cursus eget. Aliquam ultrices sagittis orci a scelerisque purus semper. Eget gravida cum sociis natoque penatibus et. Volutpat sed cras ornare arcu. Mauris sit amet massa vitae tortor. Fermentum iaculis eu non diam phasellus vestibulum lorem sed. Enim ut sem viverra aliquet eget. Sit amet consectetur adipiscing elit. Tristique et egestas quis ipsum suspendisse ultrices gravida. Orci porta non pulvinar neque laoreet suspendisse interdum consectetur libero. Elementum facilisis leo vel fringilla est. Sapien faucibus et molestie ac feugiat.', 1, '2020-03-03 10:01:13', '2020-03-03 10:01:13'),
(5, 'fa-user', 'Eget mi proin sed', '1583229673.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra suspendisse potenti nullam ac tortor vitae purus faucibus ornare. Sollicitudin nibh sit amet commodo. Pellentesque habitant morbi tristique senectus et netus. Cursus turpis massa tincidunt dui ut ornare. Gravida cum sociis natoque penatibus et magnis. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Cras fermentum odio eu feugiat pretium nibh ipsum consequat. Facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Tortor vitae purus faucibus ornare. Ut pharetra sit amet aliquam id diam maecenas ultricies mi. Imperdiet dui accumsan sit amet nulla facilisi. Et sollicitudin ac orci phasellus egestas tellus rutrum. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Sed blandit libero volutpat sed cras. Quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Et malesuada fames ac turpis egestas maecenas pharetra. Mi tempus imperdiet nulla malesuada pellentesque elit eget gravida. Libero nunc consequat interdum varius sit amet mattis vulputate enim. Dolor magna eget est lorem ipsum dolor sit amet.\r\n\r\nEget mi proin sed libero enim sed faucibus turpis. Neque ornare aenean euismod elementum nisi quis eleifend. Elit duis tristique sollicitudin nibh sit amet commodo nulla facilisi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis. Nunc mi ipsum faucibus vitae aliquet. Laoreet non curabitur gravida arcu ac. Rhoncus mattis rhoncus urna neque viverra. Morbi tincidunt ornare massa eget egestas purus viverra accumsan in. Neque volutpat ac tincidunt vitae semper quis lectus nulla. Aenean euismod elementum nisi quis eleifend. Dolor morbi non arcu risus quis varius quam quisque. Ut eu sem integer vitae justo eget magna fermentum iaculis. A diam sollicitudin tempor id eu nisl nunc mi. Rhoncus aenean vel elit scelerisque. Ut venenatis tellus in metus vulputate eu scelerisque felis. Eu ultrices vitae auctor eu augue ut lectus arcu. Amet porttitor eget dolor morbi. Posuere sollicitudin aliquam ultrices sagittis. Morbi non arcu risus quis varius quam quisque. Consequat mauris nunc congue nisi vitae suscipit tellus mauris a.\r\n\r\nScelerisque mauris pellentesque pulvinar pellentesque habitant. Morbi tincidunt ornare massa eget. Enim sit amet venenatis urna cursus eget. Aliquam ultrices sagittis orci a scelerisque purus semper. Eget gravida cum sociis natoque penatibus et. Volutpat sed cras ornare arcu. Mauris sit amet massa vitae tortor. Fermentum iaculis eu non diam phasellus vestibulum lorem sed. Enim ut sem viverra aliquet eget. Sit amet consectetur adipiscing elit. Tristique et egestas quis ipsum suspendisse ultrices gravida. Orci porta non pulvinar neque laoreet suspendisse interdum consectetur libero. Elementum facilisis leo vel fringilla est. Sapien faucibus et molestie ac feugiat.', 1, '2020-03-03 10:01:13', '2020-03-03 10:01:13'),
(6, 'fa-user', 'Eget mi proin sed', '1583229673.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra suspendisse potenti nullam ac tortor vitae purus faucibus ornare. Sollicitudin nibh sit amet commodo. Pellentesque habitant morbi tristique senectus et netus. Cursus turpis massa tincidunt dui ut ornare. Gravida cum sociis natoque penatibus et magnis. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Cras fermentum odio eu feugiat pretium nibh ipsum consequat. Facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Tortor vitae purus faucibus ornare. Ut pharetra sit amet aliquam id diam maecenas ultricies mi. Imperdiet dui accumsan sit amet nulla facilisi. Et sollicitudin ac orci phasellus egestas tellus rutrum. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Sed blandit libero volutpat sed cras. Quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Et malesuada fames ac turpis egestas maecenas pharetra. Mi tempus imperdiet nulla malesuada pellentesque elit eget gravida. Libero nunc consequat interdum varius sit amet mattis vulputate enim. Dolor magna eget est lorem ipsum dolor sit amet.\r\n\r\nEget mi proin sed libero enim sed faucibus turpis. Neque ornare aenean euismod elementum nisi quis eleifend. Elit duis tristique sollicitudin nibh sit amet commodo nulla facilisi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis. Nunc mi ipsum faucibus vitae aliquet. Laoreet non curabitur gravida arcu ac. Rhoncus mattis rhoncus urna neque viverra. Morbi tincidunt ornare massa eget egestas purus viverra accumsan in. Neque volutpat ac tincidunt vitae semper quis lectus nulla. Aenean euismod elementum nisi quis eleifend. Dolor morbi non arcu risus quis varius quam quisque. Ut eu sem integer vitae justo eget magna fermentum iaculis. A diam sollicitudin tempor id eu nisl nunc mi. Rhoncus aenean vel elit scelerisque. Ut venenatis tellus in metus vulputate eu scelerisque felis. Eu ultrices vitae auctor eu augue ut lectus arcu. Amet porttitor eget dolor morbi. Posuere sollicitudin aliquam ultrices sagittis. Morbi non arcu risus quis varius quam quisque. Consequat mauris nunc congue nisi vitae suscipit tellus mauris a.\r\n\r\nScelerisque mauris pellentesque pulvinar pellentesque habitant. Morbi tincidunt ornare massa eget. Enim sit amet venenatis urna cursus eget. Aliquam ultrices sagittis orci a scelerisque purus semper. Eget gravida cum sociis natoque penatibus et. Volutpat sed cras ornare arcu. Mauris sit amet massa vitae tortor. Fermentum iaculis eu non diam phasellus vestibulum lorem sed. Enim ut sem viverra aliquet eget. Sit amet consectetur adipiscing elit. Tristique et egestas quis ipsum suspendisse ultrices gravida. Orci porta non pulvinar neque laoreet suspendisse interdum consectetur libero. Elementum facilisis leo vel fringilla est. Sapien faucibus et molestie ac feugiat.', 1, '2020-03-03 10:01:13', '2020-03-03 10:01:13'),
(7, 'fa-user', 'Eget mi proin sed', '1583229673.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra suspendisse potenti nullam ac tortor vitae purus faucibus ornare. Sollicitudin nibh sit amet commodo. Pellentesque habitant morbi tristique senectus et netus. Cursus turpis massa tincidunt dui ut ornare. Gravida cum sociis natoque penatibus et magnis. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Cras fermentum odio eu feugiat pretium nibh ipsum consequat. Facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Tortor vitae purus faucibus ornare. Ut pharetra sit amet aliquam id diam maecenas ultricies mi. Imperdiet dui accumsan sit amet nulla facilisi. Et sollicitudin ac orci phasellus egestas tellus rutrum. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Sed blandit libero volutpat sed cras. Quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Et malesuada fames ac turpis egestas maecenas pharetra. Mi tempus imperdiet nulla malesuada pellentesque elit eget gravida. Libero nunc consequat interdum varius sit amet mattis vulputate enim. Dolor magna eget est lorem ipsum dolor sit amet.\r\n\r\nEget mi proin sed libero enim sed faucibus turpis. Neque ornare aenean euismod elementum nisi quis eleifend. Elit duis tristique sollicitudin nibh sit amet commodo nulla facilisi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis. Nunc mi ipsum faucibus vitae aliquet. Laoreet non curabitur gravida arcu ac. Rhoncus mattis rhoncus urna neque viverra. Morbi tincidunt ornare massa eget egestas purus viverra accumsan in. Neque volutpat ac tincidunt vitae semper quis lectus nulla. Aenean euismod elementum nisi quis eleifend. Dolor morbi non arcu risus quis varius quam quisque. Ut eu sem integer vitae justo eget magna fermentum iaculis. A diam sollicitudin tempor id eu nisl nunc mi. Rhoncus aenean vel elit scelerisque. Ut venenatis tellus in metus vulputate eu scelerisque felis. Eu ultrices vitae auctor eu augue ut lectus arcu. Amet porttitor eget dolor morbi. Posuere sollicitudin aliquam ultrices sagittis. Morbi non arcu risus quis varius quam quisque. Consequat mauris nunc congue nisi vitae suscipit tellus mauris a.\r\n\r\nScelerisque mauris pellentesque pulvinar pellentesque habitant. Morbi tincidunt ornare massa eget. Enim sit amet venenatis urna cursus eget. Aliquam ultrices sagittis orci a scelerisque purus semper. Eget gravida cum sociis natoque penatibus et. Volutpat sed cras ornare arcu. Mauris sit amet massa vitae tortor. Fermentum iaculis eu non diam phasellus vestibulum lorem sed. Enim ut sem viverra aliquet eget. Sit amet consectetur adipiscing elit. Tristique et egestas quis ipsum suspendisse ultrices gravida. Orci porta non pulvinar neque laoreet suspendisse interdum consectetur libero. Elementum facilisis leo vel fringilla est. Sapien faucibus et molestie ac feugiat.', 1, '2020-03-03 10:01:13', '2020-03-03 10:01:13'),
(8, 'fa-user', 'Eget mi proin sed', '1583229673.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra suspendisse potenti nullam ac tortor vitae purus faucibus ornare. Sollicitudin nibh sit amet commodo. Pellentesque habitant morbi tristique senectus et netus. Cursus turpis massa tincidunt dui ut ornare. Gravida cum sociis natoque penatibus et magnis. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Cras fermentum odio eu feugiat pretium nibh ipsum consequat. Facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Tortor vitae purus faucibus ornare. Ut pharetra sit amet aliquam id diam maecenas ultricies mi. Imperdiet dui accumsan sit amet nulla facilisi. Et sollicitudin ac orci phasellus egestas tellus rutrum. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Sed blandit libero volutpat sed cras. Quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Et malesuada fames ac turpis egestas maecenas pharetra. Mi tempus imperdiet nulla malesuada pellentesque elit eget gravida. Libero nunc consequat interdum varius sit amet mattis vulputate enim. Dolor magna eget est lorem ipsum dolor sit amet.\r\n\r\nEget mi proin sed libero enim sed faucibus turpis. Neque ornare aenean euismod elementum nisi quis eleifend. Elit duis tristique sollicitudin nibh sit amet commodo nulla facilisi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis. Nunc mi ipsum faucibus vitae aliquet. Laoreet non curabitur gravida arcu ac. Rhoncus mattis rhoncus urna neque viverra. Morbi tincidunt ornare massa eget egestas purus viverra accumsan in. Neque volutpat ac tincidunt vitae semper quis lectus nulla. Aenean euismod elementum nisi quis eleifend. Dolor morbi non arcu risus quis varius quam quisque. Ut eu sem integer vitae justo eget magna fermentum iaculis. A diam sollicitudin tempor id eu nisl nunc mi. Rhoncus aenean vel elit scelerisque. Ut venenatis tellus in metus vulputate eu scelerisque felis. Eu ultrices vitae auctor eu augue ut lectus arcu. Amet porttitor eget dolor morbi. Posuere sollicitudin aliquam ultrices sagittis. Morbi non arcu risus quis varius quam quisque. Consequat mauris nunc congue nisi vitae suscipit tellus mauris a.\r\n\r\nScelerisque mauris pellentesque pulvinar pellentesque habitant. Morbi tincidunt ornare massa eget. Enim sit amet venenatis urna cursus eget. Aliquam ultrices sagittis orci a scelerisque purus semper. Eget gravida cum sociis natoque penatibus et. Volutpat sed cras ornare arcu. Mauris sit amet massa vitae tortor. Fermentum iaculis eu non diam phasellus vestibulum lorem sed. Enim ut sem viverra aliquet eget. Sit amet consectetur adipiscing elit. Tristique et egestas quis ipsum suspendisse ultrices gravida. Orci porta non pulvinar neque laoreet suspendisse interdum consectetur libero. Elementum facilisis leo vel fringilla est. Sapien faucibus et molestie ac feugiat.', 1, '2020-03-03 10:01:13', '2020-03-03 10:01:13'),
(9, 'fa-user', 'Eget mi proin sed', '1583229673.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra suspendisse potenti nullam ac tortor vitae purus faucibus ornare. Sollicitudin nibh sit amet commodo. Pellentesque habitant morbi tristique senectus et netus. Cursus turpis massa tincidunt dui ut ornare. Gravida cum sociis natoque penatibus et magnis. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Cras fermentum odio eu feugiat pretium nibh ipsum consequat. Facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Tortor vitae purus faucibus ornare. Ut pharetra sit amet aliquam id diam maecenas ultricies mi. Imperdiet dui accumsan sit amet nulla facilisi. Et sollicitudin ac orci phasellus egestas tellus rutrum. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Sed blandit libero volutpat sed cras. Quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Et malesuada fames ac turpis egestas maecenas pharetra. Mi tempus imperdiet nulla malesuada pellentesque elit eget gravida. Libero nunc consequat interdum varius sit amet mattis vulputate enim. Dolor magna eget est lorem ipsum dolor sit amet.\r\n\r\nEget mi proin sed libero enim sed faucibus turpis. Neque ornare aenean euismod elementum nisi quis eleifend. Elit duis tristique sollicitudin nibh sit amet commodo nulla facilisi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis. Nunc mi ipsum faucibus vitae aliquet. Laoreet non curabitur gravida arcu ac. Rhoncus mattis rhoncus urna neque viverra. Morbi tincidunt ornare massa eget egestas purus viverra accumsan in. Neque volutpat ac tincidunt vitae semper quis lectus nulla. Aenean euismod elementum nisi quis eleifend. Dolor morbi non arcu risus quis varius quam quisque. Ut eu sem integer vitae justo eget magna fermentum iaculis. A diam sollicitudin tempor id eu nisl nunc mi. Rhoncus aenean vel elit scelerisque. Ut venenatis tellus in metus vulputate eu scelerisque felis. Eu ultrices vitae auctor eu augue ut lectus arcu. Amet porttitor eget dolor morbi. Posuere sollicitudin aliquam ultrices sagittis. Morbi non arcu risus quis varius quam quisque. Consequat mauris nunc congue nisi vitae suscipit tellus mauris a.\r\n\r\nScelerisque mauris pellentesque pulvinar pellentesque habitant. Morbi tincidunt ornare massa eget. Enim sit amet venenatis urna cursus eget. Aliquam ultrices sagittis orci a scelerisque purus semper. Eget gravida cum sociis natoque penatibus et. Volutpat sed cras ornare arcu. Mauris sit amet massa vitae tortor. Fermentum iaculis eu non diam phasellus vestibulum lorem sed. Enim ut sem viverra aliquet eget. Sit amet consectetur adipiscing elit. Tristique et egestas quis ipsum suspendisse ultrices gravida. Orci porta non pulvinar neque laoreet suspendisse interdum consectetur libero. Elementum facilisis leo vel fringilla est. Sapien faucibus et molestie ac feugiat.', 1, '2020-03-03 10:01:13', '2020-03-03 10:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `details`, `entry_by`, `created_at`, `updated_at`) VALUES
(1, 'Ipsum passages', '1583138073.jpg', 'Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 1, '2020-01-28 06:11:40', '2020-03-02 09:48:20'),
(2, 'Letraset sheets containing', '1583138350.jpg', 'Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2020-03-02 08:39:10', '2020-03-02 08:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `subscibes`
--

CREATE TABLE `subscibes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscibes`
--

INSERT INTO `subscibes` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'rubel.bu112@gmail.com', '2020-03-05 10:05:28', '2020-03-05 10:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user_default.png',
  `activation_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 for Active and 0 for Block',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `avatar`, `activation_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'US IT Solution', 'rubel.bu112@gmail.com', '2020-01-28 05:30:58', '$2y$12$8BUUQnKkpcwkdI9MB4YbS.aj59AErOJNSb9.NFtYjv7AdFCwbhDLK', 'user', 'user_default.png', 1, '47rFOOuuWJwsAAtp0J9o6axxGHtVe1ZeKcycqDD2tWsLA9Y2WUNMhXhZXNZr', '2020-01-28 05:30:58', '2020-01-28 05:32:42');

-- --------------------------------------------------------

--
-- Table structure for table `w_products`
--

CREATE TABLE `w_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `w_products`
--

INSERT INTO `w_products` (`id`, `category_id`, `title`, `image`, `details`, `details2`, `entry_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cashen Nut Salad', '1580192454.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra suspendisse potenti nullam ac tortor vitae purus faucibus ornare. Sollicitudin nibh sit amet commodo. Pellentesque habitant morbi tristique senectus et netus. Cursus turpis massa tincidunt dui ut ornare. Gravida cum sociis natoque penatibus et magnis. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Cras fermentum odio eu feugiat pretium nibh ipsum consequat. Facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Tortor vitae purus faucibus ornare. Ut pharetra sit amet aliquam id diam maecenas ultricies mi. Imperdiet dui accumsan sit amet nulla facilisi. Et sollicitudin ac orci phasellus egestas tellus rutrum. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Sed blandit libero volutpat sed cras. Quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Et malesuada fames ac turpis egestas maecenas pharetra. Mi tempus imperdiet nulla malesuada pellentesque elit eget gravida. Libero nunc consequat interdum varius sit amet mattis vulputate enim. Dolor magna eget est lorem ipsum dolor sit amet.\r\n\r\nEget mi proin sed libero enim sed faucibus turpis. Neque ornare aenean euismod elementum nisi quis eleifend. Elit duis tristique sollicitudin nibh sit amet commodo nulla facilisi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis. Nunc mi ipsum faucibus vitae aliquet. Laoreet non curabitur gravida arcu ac. Rhoncus mattis rhoncus urna neque viverra. Morbi tincidunt ornare massa eget egestas purus viverra accumsan in. Neque volutpat ac tincidunt vitae semper quis lectus nulla. Aenean euismod elementum nisi quis eleifend. Dolor morbi non arcu risus quis varius quam quisque. Ut eu sem integer vitae justo eget magna fermentum iaculis. A diam sollicitudin tempor id eu nisl nunc mi. Rhoncus aenean vel elit scelerisque. Ut venenatis tellus in metus vulputate eu scelerisque felis. Eu ultrices vitae auctor eu augue ut lectus arcu. Amet porttitor eget dolor morbi. Posuere sollicitudin aliquam ultrices sagittis. Morbi non arcu risus quis varius quam quisque. Consequat mauris nunc congue nisi vitae suscipit tellus mauris a.', 1, '2020-01-28 06:20:55', '2020-03-03 11:17:04'),
(2, 1, 'Masons Arms', '1583213934.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra suspendisse potenti nullam ac tortor vitae purus faucibus ornare. Sollicitudin nibh sit amet commodo. Pellentesque habitant morbi tristique senectus et netus. Cursus turpis massa tincidunt dui ut ornare. Gravida cum sociis natoque penatibus et magnis. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Cras fermentum odio eu feugiat pretium nibh ipsum consequat. Facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Tortor vitae purus faucibus ornare. Ut pharetra sit amet aliquam id diam maecenas ultricies mi. Imperdiet dui accumsan sit amet nulla facilisi. Et sollicitudin ac orci phasellus egestas tellus rutrum. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Sed blandit libero volutpat sed cras. Quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Et malesuada fames ac turpis egestas maecenas pharetra. Mi tempus imperdiet nulla malesuada pellentesque elit eget gravida. Libero nunc consequat interdum varius sit amet mattis vulputate enim. Dolor magna eget est lorem ipsum dolor sit amet.\r\n\r\nEget mi proin sed libero enim sed faucibus turpis. Neque ornare aenean euismod elementum nisi quis eleifend. Elit duis tristique sollicitudin nibh sit amet commodo nulla facilisi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis. Nunc mi ipsum faucibus vitae aliquet. Laoreet non curabitur gravida arcu ac. Rhoncus mattis rhoncus urna neque viverra. Morbi tincidunt ornare massa eget egestas purus viverra accumsan in. Neque volutpat ac tincidunt vitae semper quis lectus nulla. Aenean euismod elementum nisi quis eleifend. Dolor morbi non arcu risus quis varius quam quisque. Ut eu sem integer vitae justo eget magna fermentum iaculis. A diam sollicitudin tempor id eu nisl nunc mi. Rhoncus aenean vel elit scelerisque. Ut venenatis tellus in metus vulputate eu scelerisque felis. Eu ultrices vitae auctor eu augue ut lectus arcu. Amet porttitor eget dolor morbi. Posuere sollicitudin aliquam ultrices sagittis. Morbi non arcu risus quis varius quam quisque. Consequat mauris nunc congue nisi vitae suscipit tellus mauris a.', 1, '2020-03-03 05:38:55', '2020-03-03 11:17:15'),
(3, 3, 'Masons Arms', '1583213234.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the', NULL, 1, '2020-03-03 05:38:55', '2020-03-03 05:38:55'),
(4, 3, 'dolore magna aliqua.', '1583234083.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra suspendisse potenti nullam', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra suspendisse potenti nullam ac tortor vitae purus faucibus ornare. Sollicitudin nibh sit amet commodo. Pellentesque habitant morbi tristique senectus et netus. Cursus turpis massa tincidunt dui ut ornare. Gravida cum sociis natoque penatibus et magnis. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Cras fermentum odio eu feugiat pretium nibh ipsum consequat. Facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Tortor vitae purus faucibus ornare. Ut pharetra sit amet aliquam id diam maecenas ultricies mi. Imperdiet dui accumsan sit amet nulla facilisi. Et sollicitudin ac orci phasellus egestas tellus rutrum. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Sed blandit libero volutpat sed cras. Quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Et malesuada fames ac turpis egestas maecenas pharetra. Mi tempus imperdiet nulla malesuada pellentesque elit eget gravida. Libero nunc consequat interdum varius sit amet mattis vulputate enim. Dolor magna eget est lorem ipsum dolor sit amet.\r\n\r\nEget mi proin sed libero enim sed faucibus turpis. Neque ornare aenean euismod elementum nisi quis eleifend. Elit duis tristique sollicitudin nibh sit amet commodo nulla facilisi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis. Nunc mi ipsum faucibus vitae aliquet. Laoreet non curabitur gravida arcu ac. Rhoncus mattis rhoncus urna neque viverra. Morbi tincidunt ornare massa eget egestas purus viverra accumsan in. Neque volutpat ac tincidunt vitae semper quis lectus nulla. Aenean euismod elementum nisi quis eleifend. Dolor morbi non arcu risus quis varius quam quisque. Ut eu sem integer vitae justo eget magna fermentum iaculis. A diam sollicitudin tempor id eu nisl nunc mi. Rhoncus aenean vel elit scelerisque. Ut venenatis tellus in metus vulputate eu scelerisque felis. Eu ultrices vitae auctor eu augue ut lectus arcu. Amet porttitor eget dolor morbi. Posuere sollicitudin aliquam ultrices sagittis. Morbi non arcu risus quis varius quam quisque. Consequat mauris nunc congue nisi vitae suscipit tellus mauris a.', 1, '2020-03-03 11:14:43', '2020-03-03 11:14:43'),
(5, 3, 'ykjhkhjk', '1583234158.jpg', 'hjghj', 'ghjghjghhgjggjhhj', 1, '2020-03-03 11:15:59', '2020-03-03 11:15:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abouts_entry_by_foreign` (`entry_by`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_entry_by_foreign` (`entry_by`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`),
  ADD KEY `categories_entry_by_index` (`entry_by`);

--
-- Indexes for table `client_logos`
--
ALTER TABLE `client_logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_entry_by_foreign` (`entry_by`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_us_entry_by_foreign` (`entry_by`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_entry_by_foreign` (`entry_by`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `industries_entry_by_foreign` (`entry_by`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_entry_by_foreign` (`entry_by`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sliders_entry_by_foreign` (`entry_by`);

--
-- Indexes for table `subscibes`
--
ALTER TABLE `subscibes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `w_products`
--
ALTER TABLE `w_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `w_products_entry_by_foreign` (`entry_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `client_logos`
--
ALTER TABLE `client_logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscibes`
--
ALTER TABLE `subscibes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `w_products`
--
ALTER TABLE `w_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abouts`
--
ALTER TABLE `abouts`
  ADD CONSTRAINT `abouts_entry_by_foreign` FOREIGN KEY (`entry_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_entry_by_foreign` FOREIGN KEY (`entry_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_entry_by_foreign` FOREIGN KEY (`entry_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD CONSTRAINT `contact_us_entry_by_foreign` FOREIGN KEY (`entry_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_entry_by_foreign` FOREIGN KEY (`entry_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `industries`
--
ALTER TABLE `industries`
  ADD CONSTRAINT `industries_entry_by_foreign` FOREIGN KEY (`entry_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_entry_by_foreign` FOREIGN KEY (`entry_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_entry_by_foreign` FOREIGN KEY (`entry_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `w_products`
--
ALTER TABLE `w_products`
  ADD CONSTRAINT `w_products_entry_by_foreign` FOREIGN KEY (`entry_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
