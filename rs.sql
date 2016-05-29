-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2016 at 09:18 AM
-- Server version: 5.7.12-0ubuntu1
-- PHP Version: 5.6.21-3+donate.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rs`
--

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `food_menu_id` int(11) NOT NULL,
  `price` text COLLATE utf32_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `food_menu_id`, `price`, `cover`) VALUES
(23, 'Black Coffee', 27, '500', 'c2.jpeg'),
(24, 'Cappuccino Coffee', 27, '1000', 'c1.jpeg'),
(25, 'Coffee', 27, '500', 'c3.jpeg'),
(26, 'Expresso ', 27, '1000', 'c.jpeg'),
(27, 'Max Plus', 26, '500', 'cc.jpeg'),
(28, 'Coca Cola', 26, '500', 'cc2.jpeg'),
(29, 'á€á€¼á€™á€¹á€šá€™á€¹á€Ÿá€„á€¹á€¸á€á€ºá€­á€´ (á¾á€€á€€á€¹)', 32, '1500', 't1.jpeg'),
(30, 'á€á€¼á€™á€¹á€šá€™á€¹á€Ÿá€„á€¹á€¸á€á€ºá€­á€´ (á€á€€á€¹)', 32, '1500', 't1.jpeg'),
(31, 'á€€á€€á€á€…á€¹á€±á€•á€«á€„á€¹á€¸', 29, '3000', 'ch3.jpeg'),
(32, 'á¾á€€á€€á€¹á€žá€¬á€¸á€Ÿá€„á€¹á€¸', 30, '1000', 'ccc1.jpeg'),
(33, 'á€á€€á€¹á€žá€¬á€¸á€Ÿá€„á€¹á€¸', 30, '1000', 'cn.jpeg'),
(34, 'á€±á€á€«á€€á€¹á€†á€¼á€²á€±á¾á€€á€¬á€¹(á€á€€á€¹)', 29, '1500', 'ch2.jpeg'),
(35, 'á€€á€¯á€”á€¹á€¸á€±á€˜á€¬á€„á€¹á‚€á€€á€®á€¸á€±á€€á€ºá€¬á€¹(á€á€€á€¹)', 29, '3000', 'cn1.jpeg'),
(36, 'á€™á€¯á€”á€¹á‚•á€Ÿá€„á€¹á€¸á€á€«á€¸(á€˜á€°á€¸á€±á¾á€€á€¬á€¹)', 31, '500', 't1.jpeg'),
(37, 'á€‘á€™á€„á€¹á€¸á€±á¾á€€á€¬á€¹(á¾á€€á€€á€¹á€¥á€±á¾á€€á€¬á€¹)', 31, '500', 't.jpeg'),
(38, 'á€á€«á€¸á€•á€á€¹á€±á¾á€€á€¬á€¹(á¾á€€á€€á€¹)', 29, '3000', 't4.jpeg'),
(39, 'á€žá€±á€˜á€¬á¤á€žá€®á€¸á€±á€‘á€¬á€„á€¹á€¸', 32, '1000', 't3.jpeg'),
(40, 'á€‘á€™á€„á€¹á€¸á€»á€–á€´', 30, '300', 't.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `food_menu`
--

CREATE TABLE `food_menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `food_menu`
--

INSERT INTO `food_menu` (`id`, `name`, `remark`) VALUES
(26, 'Cold Drink', 'cold drining'),
(27, 'Hot Drink', 'hot drinking'),
(29, 'á€á€›á€¯á€¯á€á€¹á€Ÿá€„á€¹á€¸á€œá€ºá€¬á€™á€ºá€¬á€¸', 'á€á€›á€¯á€á€¹á€Ÿá€„á€¹á€¸á€œá€ºá€¬á€™á€ºá€¬á€¸'),
(30, 'á€»á€™á€”á€¹á€™á€¬á€Ÿá€„á€¹á€¸á€œá€ºá€¬á€™á€ºá€¬á€¸', 'á€»á€™á€”á€¹á€™á€¬á€Ÿá€„á€¹á€¸á€œá€ºá€¬á€™á€ºá€¬á€¸\n'),
(31, 'á€”á€¶á€”á€€á€¹á€á€„á€¹á€¸á€…á€¬á€¸á€…á€¬á€™á€ºá€¬á€¸', 'á€”á€¶á€”á€€á€¹á€á€„á€¹á€¸á€…á€¬á€¸á€…á€¬á€™á€ºá€¬á€¸'),
(32, 'Thai Foods', 'thai foods');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `d_status` int(11) NOT NULL,
  `c_status` int(11) NOT NULL,
  `customer` text COLLATE utf32_unicode_ci NOT NULL,
  `o_f` text COLLATE utf32_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` date NOT NULL,
  `s_o_m` text COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user`, `d_status`, `c_status`, `customer`, `o_f`, `created_at`, `updated_at`, `s_o_m`) VALUES
(41, 'userone@gmail.com', 1, 1, '101', 'N', '2016-05-28 19:14:40', '2016-05-27', '2016-08'),
(42, 'userone@gmail.com', 1, 1, '101', '1', '2016-05-28 19:15:47', '2016-05-27', '2016-07'),
(43, 'userone@gmail.com', 1, 1, '102', '1', '2016-05-28 19:17:13', '2016-05-28', '2016-06'),
(44, 'user@r.com', 0, 0, '101', '1', '2016-05-28 21:59:34', '2016-05-28', '2016-03'),
(45, 'user@r.com', 0, 0, '105', '1', '2016-05-28 22:17:44', '2016-05-28', '2016-04'),
(46, 'user@r.com', 0, 0, '101', '1', '2016-05-28 22:57:55', '2016-05-28', '2016-01'),
(47, 'user@r.com', 0, 0, '101', '1', '2016-05-28 22:59:22', '2016-05-28', '2016-02'),
(48, 'user@r.com', 1, 0, '101', '1', '2016-05-29 07:58:29', '2016-05-29', '2016-05');

-- --------------------------------------------------------

--
-- Table structure for table `orders_item`
--

CREATE TABLE `orders_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `orders_item`
--

INSERT INTO `orders_item` (`id`, `order_id`, `food_id`, `qty`) VALUES
(147, 41, 25, 2),
(148, 41, 26, 2),
(149, 41, 27, 2),
(150, 42, 29, 2),
(151, 42, 30, 1),
(152, 43, 26, 2),
(153, 43, 27, 1),
(154, 44, 37, 3),
(155, 44, 32, 3),
(156, 45, 24, 1),
(157, 45, 25, 1),
(158, 45, 26, 1),
(159, 46, 26, 2),
(160, 46, 25, 2),
(161, 46, 27, 2),
(162, 47, 27, 4),
(163, 48, 23, 1),
(164, 48, 24, 1),
(165, 48, 25, 1),
(166, 48, 26, 2),
(167, 48, 27, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `urole` int(11) NOT NULL,
  `fName` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `lName` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `urole`, `fName`, `lName`, `email`, `password`, `cover`, `created_at`, `updated_at`) VALUES
(32, 1, 'admin', 'user', 'admin@r.com', '21232f297a57a5a743894a0e4a801fc3', 'IMG_20160219_122718.jpg', '2016-05-28 21:43:39', '2016-05-28 21:43:39'),
(33, 0, 'user', 'one', 'user@r.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'IMG_20160120_081431.jpg', '2016-05-28 21:56:47', '2016-05-28 21:56:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_menu`
--
ALTER TABLE `food_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_item`
--
ALTER TABLE `orders_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `food_menu`
--
ALTER TABLE `food_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `orders_item`
--
ALTER TABLE `orders_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
