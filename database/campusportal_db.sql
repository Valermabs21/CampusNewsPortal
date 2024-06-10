-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 02:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campusportal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_comments`
--

CREATE TABLE `admin_comments` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_comments`
--

INSERT INTO `admin_comments` (`id`, `user_id`, `post_id`, `comment`, `date`) VALUES
(1, 79304, 1057, 'hi', '2024-06-02 21:25:17'),
(2, 1555215, 77147408, 'hello', '2024-06-02 21:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `admin_likes`
--

CREATE TABLE `admin_likes` (
  `id` int(11) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `contentid` bigint(20) DEFAULT NULL,
  `likes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_likes`
--

INSERT INTO `admin_likes` (`id`, `type`, `contentid`, `likes`) VALUES
(3, 'post', 1057, '[{\"userid\":79304,\"date\":\"2024-06-07 05:58:39\"}]'),
(4, 'post', 77147408, '[{\"userid\":79304,\"date\":\"2024-06-07 05:58:55\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `admin_posts`
--

CREATE TABLE `admin_posts` (
  `id` bigint(19) NOT NULL,
  `postid` bigint(19) NOT NULL,
  `userid` bigint(19) NOT NULL,
  `post` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `comments` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `share` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `has_image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_posts`
--

INSERT INTO `admin_posts` (`id`, `postid`, `userid`, `post`, `image`, `comments`, `likes`, `share`, `date`, `has_image`) VALUES
(1, 77147408, 754816375844329929, 'this is my first post', 'uploads/754816375844329929/n28XG6uu09H8liUjpg', 0, 1, 0, '2024-06-07 03:58:55', 1),
(2, 1057, 754816375844329929, 'this is my second post', '', 0, 1, 0, '2024-06-07 03:58:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cas_comments`
--

CREATE TABLE `cas_comments` (
  `id` int(11) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cas_comments`
--

INSERT INTO `cas_comments` (`id`, `post_id`, `user_id`, `comment`, `date`) VALUES
(4, 702772896, 1555215, 'hi', '2024-06-02 11:34:20'),
(5, 95585296823, 1555215, 'hello', '2024-06-02 11:35:14'),
(6, 702772896, 79304, 'hello', '2024-06-02 11:37:13'),
(7, 95585296823, 79304, 'wazzup', '2024-06-02 11:52:36'),
(8, 39132, 79304, 'pls like', '2024-06-02 12:03:36'),
(10, 702772896, 530152, 'hi', '2024-06-03 01:30:56'),
(11, 702772896, 646087844455539379, 'luh', '2024-06-03 04:41:03'),
(12, 27665683, 79304, 'hello\r\n', '2024-06-05 02:42:57'),
(13, 27665683, 3876760, 'rwererew', '2024-06-05 02:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `cas_likes`
--

CREATE TABLE `cas_likes` (
  `id` bigint(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `contentid` bigint(20) NOT NULL,
  `likes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cas_likes`
--

INSERT INTO `cas_likes` (`id`, `type`, `contentid`, `likes`) VALUES
(8, 'post', 39132, '[{\"userid\":79304,\"date\":\"2024-06-02 09:03:35\"}]'),
(9, 'post', 7989, '[{\"userid\":\"79304\",\"date\":\"2024-06-01 15:11:30\"}]'),
(10, 'post', 97546791174649729, '[{\"userid\":\"79304\",\"date\":\"2024-06-01 15:11:37\"}]'),
(11, 'post', 21762555424, '[{\"userid\":\"79304\",\"date\":\"2024-06-01 15:11:43\"}]'),
(12, 'post', 468804, '[{\"userid\":\"79304\",\"date\":\"2024-06-01 15:11:49\"}]'),
(13, 'post', 95585296823, '[{\"userid\":79304,\"date\":\"2024-06-04 08:07:21\"}]'),
(14, 'post', 702772896, '[{\"userid\":530152,\"date\":\"2024-06-03 03:30:18\"},{\"userid\":646087844455539379,\"date\":\"2024-06-03 06:40:56\"},{\"userid\":79304,\"date\":\"2024-06-05 03:07:34\"}]'),
(15, 'post', 27665683, '[{\"userid\":79304,\"date\":\"2024-06-05 04:42:33\"},{\"userid\":3876760,\"date\":\"2024-06-05 04:53:16\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `cas_posts`
--

CREATE TABLE `cas_posts` (
  `id` bigint(19) NOT NULL,
  `postid` bigint(19) NOT NULL,
  `userid` bigint(19) NOT NULL,
  `post` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `likes` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  `share` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `has_image` int(11) NOT NULL,
  `parent` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cas_posts`
--

INSERT INTO `cas_posts` (`id`, `postid`, `userid`, `post`, `image`, `likes`, `comments`, `share`, `date`, `has_image`, `parent`) VALUES
(22, 468804, 79304, 'This is my first post', '', 1, 0, 0, '2024-06-01 13:11:49', 0, 0),
(23, 21762555424, 79304, 'this is my second post', '', 1, 0, 0, '2024-06-01 13:11:43', 0, 0),
(24, 97546791174649729, 79304, 'this is my third post', '', 1, 0, 0, '2024-06-01 13:11:37', 0, 0),
(25, 7989, 79304, 'this is my forth post', '', 1, 0, 0, '2024-06-01 13:11:30', 0, 0),
(28, 39132, 79304, 'this is my fifth post', 'uploads/79304/yRu7gJ8IzOD8XNBjpg', 1, 0, 0, '2024-06-02 07:03:35', 1, 0),
(52, 95585296823, 79304, 'hi', '', 1, 0, 0, '2024-06-04 06:07:21', 0, 0),
(53, 702772896, 79304, 'hello', '', 3, 0, 0, '2024-06-05 01:07:34', 0, 0),
(54, 27665683, 79304, 'hi', '', 2, 0, 0, '2024-06-05 02:53:16', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ca_comments`
--

CREATE TABLE `ca_comments` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ca_comments`
--

INSERT INTO `ca_comments` (`id`, `user_id`, `post_id`, `comment`, `date`) VALUES
(4, 79304, 5544, 'hi', '2024-06-02 21:26:59'),
(5, 1555215, 64519871508841171, 'hello', '2024-06-02 21:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `ca_likes`
--

CREATE TABLE `ca_likes` (
  `id` int(11) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `contentid` bigint(20) DEFAULT NULL,
  `likes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ca_likes`
--

INSERT INTO `ca_likes` (`id`, `type`, `contentid`, `likes`) VALUES
(2, 'post', 5544, '[{\"userid\":79304,\"date\":\"2024-06-04 08:07:06\"}]'),
(3, 'post', 64519871508841171, '[{\"userid\":\"79304\",\"date\":\"2024-06-01 14:58:22\"}]'),
(4, 'post', 6749761, '[{\"userid\":79304,\"date\":\"2024-06-02 06:55:58\"}]'),
(5, 'post', 152493646268644185, '[]');

-- --------------------------------------------------------

--
-- Table structure for table `ca_posts`
--

CREATE TABLE `ca_posts` (
  `id` bigint(19) NOT NULL,
  `postid` bigint(19) NOT NULL,
  `userid` bigint(19) NOT NULL,
  `post` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `comments` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `share` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `has_image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ca_posts`
--

INSERT INTO `ca_posts` (`id`, `postid`, `userid`, `post`, `image`, `comments`, `likes`, `share`, `date`, `has_image`) VALUES
(1, 64519871508841171, 42664983, 'this is my first post', 'uploads/42664983/ED26SGJZmqlRXhWjpg', 0, 1, 0, '2024-06-01 12:58:22', 1),
(2, 5544, 42664983, 'this is my second post', '', 0, 1, 0, '2024-06-04 06:07:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cet_comments`
--

CREATE TABLE `cet_comments` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cet_comments`
--

INSERT INTO `cet_comments` (`id`, `user_id`, `post_id`, `comment`, `date`) VALUES
(1, 79304, 98250680657, 'hi', '2024-06-02 21:26:46'),
(2, 1555215, 98250680657, 'hello', '2024-06-02 21:28:43'),
(3, 646087844455539379, 98250680657, 'huy', '2024-06-03 12:41:27'),
(4, 79304, 75616, 'kkkk', '2024-06-03 12:43:51'),
(5, 3876760, 75616, 'asdfg', '2024-06-05 10:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `cet_likes`
--

CREATE TABLE `cet_likes` (
  `id` int(11) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `contentid` bigint(20) DEFAULT NULL,
  `likes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cet_likes`
--

INSERT INTO `cet_likes` (`id`, `type`, `contentid`, `likes`) VALUES
(3, 'post', 98250680657, '[{\"userid\":79304,\"date\":\"2024-06-02 09:03:43\"},{\"userid\":3876760,\"date\":\"2024-06-05 04:54:31\"}]'),
(4, 'post', 1020635725560, '[{\"userid\":79304,\"date\":\"2024-06-02 09:03:47\"}]'),
(5, 'post', 969188779807283216, '[{\"userid\":\"79304\",\"date\":\"2024-06-01 14:57:53\"}]'),
(6, 'post', 94457579797, '[{\"userid\":\"79304\",\"date\":\"2024-06-01 14:58:00\"}]'),
(7, 'post', 1993712, '[]'),
(8, 'post', 75616, '[{\"userid\":79304,\"date\":\"2024-06-03 06:43:55\"},{\"userid\":3876760,\"date\":\"2024-06-05 04:53:36\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `cet_posts`
--

CREATE TABLE `cet_posts` (
  `id` bigint(19) NOT NULL,
  `postid` bigint(19) NOT NULL,
  `userid` bigint(19) NOT NULL,
  `post` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `comments` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `share` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `has_image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cet_posts`
--

INSERT INTO `cet_posts` (`id`, `postid`, `userid`, `post`, `image`, `comments`, `likes`, `share`, `date`, `has_image`) VALUES
(1, 94457579797, 64981500, 'this is my first post', '', 0, 1, 0, '2024-06-01 12:58:00', 0),
(2, 969188779807283216, 64981500, 'this is my second post', '', 0, 1, 0, '2024-06-01 12:57:54', 0),
(3, 1020635725560, 64981500, 'this is my third post', '', 0, 1, 0, '2024-06-02 07:03:47', 0),
(4, 98250680657, 64981500, 'this is my forth post', 'uploads/64981500/Tl5CT7UZP8KoOTnjpg', 0, 2, 0, '2024-06-05 02:54:31', 1),
(9, 75616, 79304, 'ok', 'uploads/79304/JKvICkoeEO2EZmWjpg', 0, 2, 0, '2024-06-05 02:53:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ict_comments`
--

CREATE TABLE `ict_comments` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ict_comments`
--

INSERT INTO `ict_comments` (`id`, `user_id`, `post_id`, `comment`, `date`) VALUES
(1, 79304, 14472090643307171, 'hi', '2024-06-02 21:26:05'),
(2, 1555215, 55960756060411, 'hello', '2024-06-02 21:29:50'),
(3, 1555215, 14472090643307171, 'hi', '2024-06-04 12:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `ict_likes`
--

CREATE TABLE `ict_likes` (
  `id` int(11) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `contentid` bigint(20) DEFAULT NULL,
  `likes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ict_likes`
--

INSERT INTO `ict_likes` (`id`, `type`, `contentid`, `likes`) VALUES
(2, 'post', 14472090643307171, '[{\"userid\":\"79304\",\"date\":\"2024-06-01 14:57:23\"}]'),
(3, 'post', 55960756060411, '[{\"userid\":79304,\"date\":\"2024-06-02 15:14:27\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `ict_posts`
--

CREATE TABLE `ict_posts` (
  `id` bigint(19) NOT NULL,
  `postid` bigint(19) NOT NULL,
  `userid` bigint(19) NOT NULL,
  `post` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `comments` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `share` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `has_image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ict_posts`
--

INSERT INTO `ict_posts` (`id`, `postid`, `userid`, `post`, `image`, `comments`, `likes`, `share`, `date`, `has_image`) VALUES
(1, 55960756060411, 98596, 'this is my first post', 'uploads/98596/uEPLK7FziP1eKWLjpg', 0, 1, 0, '2024-06-02 13:14:27', 1),
(2, 14472090643307171, 98596, 'this is my second post', '', 0, 1, 0, '2024-06-01 12:57:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `osa_comments`
--

CREATE TABLE `osa_comments` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `osa_comments`
--

INSERT INTO `osa_comments` (`id`, `user_id`, `post_id`, `comment`, `date`) VALUES
(2, 79304, 25868, 'hi', '2024-06-02 21:25:26'),
(3, 1555215, 6678140, 'hello', '2024-06-02 21:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `osa_likes`
--

CREATE TABLE `osa_likes` (
  `id` int(11) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `contentid` bigint(20) DEFAULT NULL,
  `likes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `osa_likes`
--

INSERT INTO `osa_likes` (`id`, `type`, `contentid`, `likes`) VALUES
(2, 'post', 25868, '[{\"userid\":\"79304\",\"date\":\"2024-06-01 14:56:38\"}]'),
(3, 'post', 6678140, '[{\"userid\":\"79304\",\"date\":\"2024-06-01 14:56:23\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `osa_posts`
--

CREATE TABLE `osa_posts` (
  `id` bigint(19) NOT NULL,
  `postid` bigint(19) NOT NULL,
  `userid` bigint(19) NOT NULL,
  `post` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `comments` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `share` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `has_image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `osa_posts`
--

INSERT INTO `osa_posts` (`id`, `postid`, `userid`, `post`, `image`, `comments`, `likes`, `share`, `date`, `has_image`) VALUES
(1, 6678140, 7791, 'this is my first post', 'uploads/7791/fmb9avat8t1Oa28jpg', 0, 1, 0, '2024-06-01 12:56:23', 1),
(2, 25868, 7791, 'this is my second post', '', 0, 1, 0, '2024-06-01 12:56:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(19) NOT NULL,
  `userid` bigint(19) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(60) NOT NULL,
  `site` enum('admin','user') NOT NULL,
  `contact_number` char(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `username`, `email`, `password`, `site`, `contact_number`, `date`, `department`) VALUES
(1, 530152, 'Delfin', 'acromatic26@gmail.com', '1234', 'user', '9975179882', '2024-06-03 10:51:52', 'College of Engineering and Technology'),
(4, 79304, 'College of Arts and Sciences', 'bgmabs@gmail.com', '12345', 'admin', '9753903287', '2024-06-03 10:51:04', 'College of Arts and Sciences'),
(5, 64981500, 'College of Engineering and Technology', 'bgmabayo77@gmail.com', '12345', 'admin', '9753903287', '2024-06-03 10:59:47', 'College of Engineering and Technology'),
(6, 42664983, 'College of Agriculture', 'ca@gmail.com', '12345', 'admin', '9753903287', '2024-06-03 10:51:04', 'College of Agriculture'),
(7, 754816375844329929, 'Administration', 'administration@gmail.com', '12345', 'admin', '9753903287', '2024-06-03 10:51:04', 'Administration'),
(8, 7791, 'Office of Students Affairs', 'osa@gmail.com', '12345', 'admin', '9753903287', '2024-06-03 10:51:04', 'Office of Students Affairs'),
(9, 98596, 'Information and Communications Technology', 'ict@gmail.com', '12345', 'admin', '9753903287', '2024-06-03 10:51:04', 'Information and Communications Technology'),
(10, 68306570994704540, 'University Students Government', 'usg@gmail.com', '12345', 'admin', '9753903287', '2024-06-03 10:51:04', 'University Students Government'),
(17, 1555215, 'Valer Mabayo', 'valermabayo61@gmail.com', 'mabsta2199', 'user', '9753903287', '2024-06-03 10:51:52', 'College of Engineering and Technology'),
(19, 646087844455539379, 'trishaposadas', 'kaishakim1437@gmail.com', '54321', 'user', '9700833100', '2024-06-03 10:51:52', 'College of Engineering and Technology'),
(22, 3876760, 'van', 'roy.tagarao.9@gmail.com', '54321', 'user', '9753903827', '2024-06-05 02:52:22', 'College of Engineering and Technology');

-- --------------------------------------------------------

--
-- Table structure for table `usg_comments`
--

CREATE TABLE `usg_comments` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usg_comments`
--

INSERT INTO `usg_comments` (`id`, `user_id`, `post_id`, `comment`, `date`) VALUES
(2, 79304, 68907988943, 'hi', '2024-06-02 21:25:34'),
(3, 1555215, 96093928653755, 'hello', '2024-06-02 21:30:05');

-- --------------------------------------------------------

--
-- Table structure for table `usg_likes`
--

CREATE TABLE `usg_likes` (
  `id` int(11) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `contentid` bigint(20) DEFAULT NULL,
  `likes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usg_likes`
--

INSERT INTO `usg_likes` (`id`, `type`, `contentid`, `likes`) VALUES
(2, 'post', 68907988943, '[{\"userid\":\"79304\",\"date\":\"2024-06-01 14:57:02\"}]'),
(3, 'post', 96093928653755, '[{\"userid\":\"79304\",\"date\":\"2024-06-01 14:57:09\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `usg_posts`
--

CREATE TABLE `usg_posts` (
  `id` bigint(19) NOT NULL,
  `postid` bigint(19) NOT NULL,
  `userid` bigint(19) NOT NULL,
  `post` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `comments` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `share` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `has_image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usg_posts`
--

INSERT INTO `usg_posts` (`id`, `postid`, `userid`, `post`, `image`, `comments`, `likes`, `share`, `date`, `has_image`) VALUES
(1, 96093928653755, 68306570994704540, 'this is my first post', 'uploads/68306570994704540/jHzLsTyLflpUtZbjpg', 0, 1, 0, '2024-06-01 12:57:09', 1),
(2, 68907988943, 68306570994704540, 'this is my second post', '', 0, 1, 0, '2024-06-01 12:57:02', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_comments`
--
ALTER TABLE `admin_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `admin_likes`
--
ALTER TABLE `admin_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_posts`
--
ALTER TABLE `admin_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postid` (`postid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `cas_comments`
--
ALTER TABLE `cas_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cas_likes`
--
ALTER TABLE `cas_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `contentid` (`contentid`);

--
-- Indexes for table `cas_posts`
--
ALTER TABLE `cas_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postid` (`postid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `ca_comments`
--
ALTER TABLE `ca_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ca_likes`
--
ALTER TABLE `ca_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ca_posts`
--
ALTER TABLE `ca_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postid` (`postid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `cet_comments`
--
ALTER TABLE `cet_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cet_likes`
--
ALTER TABLE `cet_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cet_posts`
--
ALTER TABLE `cet_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postid` (`postid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `ict_comments`
--
ALTER TABLE `ict_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ict_likes`
--
ALTER TABLE `ict_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ict_posts`
--
ALTER TABLE `ict_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postid` (`postid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `osa_comments`
--
ALTER TABLE `osa_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `osa_likes`
--
ALTER TABLE `osa_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `osa_posts`
--
ALTER TABLE `osa_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postid` (`postid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`),
  ADD KEY `date` (`date`),
  ADD KEY `contact_number` (`contact_number`),
  ADD KEY `site` (`site`),
  ADD KEY `userid` (`userid`),
  ADD KEY `department` (`department`);

--
-- Indexes for table `usg_comments`
--
ALTER TABLE `usg_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `usg_likes`
--
ALTER TABLE `usg_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usg_posts`
--
ALTER TABLE `usg_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postid` (`postid`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_comments`
--
ALTER TABLE `admin_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_likes`
--
ALTER TABLE `admin_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_posts`
--
ALTER TABLE `admin_posts`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cas_comments`
--
ALTER TABLE `cas_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cas_likes`
--
ALTER TABLE `cas_likes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cas_posts`
--
ALTER TABLE `cas_posts`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `ca_comments`
--
ALTER TABLE `ca_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ca_likes`
--
ALTER TABLE `ca_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ca_posts`
--
ALTER TABLE `ca_posts`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cet_comments`
--
ALTER TABLE `cet_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cet_likes`
--
ALTER TABLE `cet_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cet_posts`
--
ALTER TABLE `cet_posts`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ict_comments`
--
ALTER TABLE `ict_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ict_likes`
--
ALTER TABLE `ict_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ict_posts`
--
ALTER TABLE `ict_posts`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `osa_comments`
--
ALTER TABLE `osa_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `osa_likes`
--
ALTER TABLE `osa_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `osa_posts`
--
ALTER TABLE `osa_posts`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `usg_comments`
--
ALTER TABLE `usg_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usg_likes`
--
ALTER TABLE `usg_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usg_posts`
--
ALTER TABLE `usg_posts`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_comments`
--
ALTER TABLE `admin_comments`
  ADD CONSTRAINT `admin_comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `admin_posts` (`postid`),
  ADD CONSTRAINT `admin_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`);

--
-- Constraints for table `cas_comments`
--
ALTER TABLE `cas_comments`
  ADD CONSTRAINT `cas_comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `cas_posts` (`postid`),
  ADD CONSTRAINT `cas_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`);

--
-- Constraints for table `ca_comments`
--
ALTER TABLE `ca_comments`
  ADD CONSTRAINT `ca_comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `ca_posts` (`postid`),
  ADD CONSTRAINT `ca_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`);

--
-- Constraints for table `cet_comments`
--
ALTER TABLE `cet_comments`
  ADD CONSTRAINT `cet_comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `cet_posts` (`postid`),
  ADD CONSTRAINT `cet_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`);

--
-- Constraints for table `ict_comments`
--
ALTER TABLE `ict_comments`
  ADD CONSTRAINT `ict_comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `ict_posts` (`postid`),
  ADD CONSTRAINT `ict_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`);

--
-- Constraints for table `osa_comments`
--
ALTER TABLE `osa_comments`
  ADD CONSTRAINT `osa_comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `osa_posts` (`postid`),
  ADD CONSTRAINT `osa_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`);

--
-- Constraints for table `usg_comments`
--
ALTER TABLE `usg_comments`
  ADD CONSTRAINT `usg_comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `usg_posts` (`postid`),
  ADD CONSTRAINT `usg_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
