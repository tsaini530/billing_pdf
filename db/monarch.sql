-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 03, 2016 at 09:35 PM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 7.0.8-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monarch`
--

-- --------------------------------------------------------

--
-- Table structure for table `billorder`
--

CREATE TABLE `billorder` (
  `idorder` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `orderdate` date DEFAULT NULL,
  `total_price` int(10) DEFAULT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billorder`
--

INSERT INTO `billorder` (`idorder`, `name`, `mobile`, `address`, `orderdate`, `total_price`, `invoice_no`, `created_at`) VALUES
(1, 'tarun', '123456', 'master', '2016-09-17', 23, '1', '2016-09-17 17:16:15'),
(2, 'tar ashu', '8104008429', 'sdasadsdsadsd', '2016-09-23', 300, '2', '2016-09-23 17:33:59'),
(3, 'tarn sa', '865654564', 'dfsdfsdfdsf', '2016-09-23', 799, '6', '2016-10-03 16:04:19'),
(12, '', '', '', '2016-09-24', 0, '1', '2016-09-23 19:01:52'),
(13, 'lucky', '', 'smnksankljdas', '2016-09-24', 499, '2', '2016-09-23 19:10:42'),
(14, 'edsdc', '34345324', 'dfvdfvdfvdfv', '2016-09-24', 300, '3', '2016-09-23 19:12:21'),
(15, 'edsdc', '34345324', 'dfvdfvdfvdfv', '2016-10-02', 0, '4', '2016-10-02 14:21:44'),
(16, '', '', '', '2016-10-02', 0, '5', '2016-10-02 18:03:17'),
(17, '', '', '', '2016-10-02', 0, '5', '2016-10-02 18:04:16'),
(18, '', '', '', '2016-10-02', 0, '5', '2016-10-02 18:05:17'),
(19, '', '', '', '2016-10-02', 0, '5', '2016-10-02 18:05:29'),
(20, '', '', '', '2016-10-02', 0, '5', '2016-10-02 18:05:49'),
(21, '', '', '', '2016-10-02', 0, '5', '2016-10-02 18:05:56'),
(22, '', '', '', '2016-10-02', 0, '5', '2016-10-02 18:07:04'),
(23, '', '', '', '2016-10-02', 0, '5', '2016-10-02 18:07:28'),
(24, '', '', '', '2016-10-02', 0, '5', '2016-10-02 18:29:09'),
(25, '', '', '', '2016-10-02', 0, '6', '2016-10-02 18:29:52'),
(26, '', '', '', '2016-10-03', 0, '7', '2016-10-02 18:30:36'),
(27, '', '', '', '2016-10-03', 0, '7', '2016-10-02 18:30:43'),
(28, '', '', '', '2016-10-03', 0, '8', '2016-10-02 18:31:22'),
(29, '', '', '', '2016-10-03', 0, '9', '2016-10-02 18:32:41'),
(30, '', '', '', '2016-10-03', 0, '9', '2016-10-02 18:33:06'),
(31, '', '', '', '2016-10-03', 0, '9', '2016-10-02 18:33:52'),
(32, '', '', '', '2016-10-03', 0, '9', '2016-10-02 18:34:14'),
(33, '', '', '', '2016-10-03', 0, '10', '2016-10-02 18:34:36'),
(34, '', '', '', '2016-10-03', 0, '11', '2016-10-02 18:37:03'),
(35, '', '', '', '2016-10-03', 0, '10', '2016-10-02 18:38:06'),
(36, '', '', '', '2016-10-03', 0, '11', '2016-10-02 18:41:26'),
(37, '', '', '', '2016-10-03', 0, '11', '2016-10-02 18:41:52'),
(38, '', '', '', '2016-10-03', 0, '10', '2016-10-02 18:48:49'),
(39, '', '', '', '2016-10-03', 0, '10', '2016-10-02 18:50:21'),
(40, '', '', '', '2016-10-03', 0, '10', '2016-10-02 18:50:43'),
(41, '', '', '', '2016-10-03', 0, '11', '2016-10-02 18:52:08'),
(42, '', '', '', '2016-10-03', 0, '11', '2016-10-02 18:53:17'),
(43, '', '', '', '2016-10-03', 0, '11', '2016-10-02 18:53:41'),
(44, '', '', '', '2016-10-03', 0, '11', '2016-10-02 18:54:04'),
(45, '', '', '', '2016-10-03', 0, '12', '2016-10-02 18:55:20'),
(46, '', '', '', '2016-10-03', 0, '13', '2016-10-02 19:06:28'),
(47, '', '', '', '2016-10-03', 0, '13', '2016-10-02 19:10:09'),
(48, '', '', '', '2016-10-03', 0, '13', '2016-10-02 19:11:07'),
(49, '', '', '', '2016-10-03', 0, '13', '2016-10-02 19:11:14'),
(50, '', '', '', '2016-10-03', 0, '13', '2016-10-02 19:12:06'),
(51, '', '', '', '2016-10-03', 0, '13', '2016-10-02 19:13:12'),
(52, '', '', '', '2016-10-03', 0, '13', '2016-10-02 19:13:44'),
(53, '', '', '', '2016-10-03', 0, '13', '2016-10-02 19:23:22'),
(54, '', '', '', '2016-10-03', 0, '13', '2016-10-02 19:23:57'),
(55, '', '', '', '2016-10-03', 0, '13', '2016-10-02 19:24:40'),
(56, '', '', '', '2016-10-03', 0, '13', '2016-10-02 19:25:01'),
(57, '', '', '', '2016-10-03', 0, '13', '2016-10-02 19:25:24'),
(58, '', '', '', '2016-10-03', 0, '13', '2016-10-02 19:26:06'),
(59, '', '', '', '2016-10-03', 0, '13', '2016-10-02 19:26:44'),
(60, '', '', '', '2016-10-03', 0, '14', '2016-10-02 19:28:12'),
(61, '', '', '', '2016-10-03', 0, '14', '2016-10-02 19:29:05'),
(62, '', '', '', '2016-10-03', 0, '14', '2016-10-02 19:35:41'),
(63, '', '', '', '2016-10-03', 0, '14', '2016-10-02 19:36:09'),
(64, '', '', '', '2016-10-03', 0, '14', '2016-10-02 19:37:32'),
(65, '', '', '', '2016-10-03', 0, '14', '2016-10-02 19:42:05'),
(66, '', '', '', '2016-10-03', 0, '14', '2016-10-02 19:42:29'),
(67, '', '', '', '2016-10-03', 0, '14', '2016-10-02 19:43:28'),
(68, '', '', '', '2016-10-03', 0, '15', '2016-10-02 19:44:22'),
(69, '', '', '', '2016-10-03', 0, '15', '2016-10-02 19:50:38'),
(70, '', '', '', '2016-10-03', 0, '15', '2016-10-02 19:51:26'),
(71, '', '', '', '2016-10-03', 0, '15', '2016-10-02 19:52:19'),
(72, '', '', '', '2016-10-03', 0, '15', '2016-10-02 19:52:52'),
(73, '', '', '', '2016-10-03', 0, '16', '2016-10-02 19:53:23'),
(74, '', '', '', '2016-10-03', 0, '17', '2016-10-02 19:54:34'),
(75, '', '', '', '2016-10-03', 0, '18', '2016-10-02 19:56:54'),
(76, '', '', '', '2016-10-03', 0, '18', '2016-10-02 20:11:23'),
(77, '', '', '', '2016-10-03', 0, '18', '2016-10-02 20:12:14'),
(78, '', '', '', '2016-10-03', 0, '19', '2016-10-03 15:56:52'),
(79, '', '', '', '2016-10-03', 0, '19', '2016-10-03 15:57:31'),
(80, '', '', '', '2016-10-03', 0, '19', '2016-10-03 15:57:37'),
(81, '', '', '', '2016-10-03', 0, '19', '2016-10-03 15:58:25'),
(82, '', '', '', '2016-10-03', 0, '20', '2016-10-03 15:59:58'),
(83, '', '', '', '2016-10-03', 0, '20', '2016-10-03 16:01:27'),
(84, '', '', '', '2016-10-03', 0, '21', '2016-10-03 16:02:19'),
(85, '', '', '', '2016-10-03', 0, '21', '2016-10-03 16:02:40'),
(86, '', '', '', '2016-10-03', 0, '21', '2016-10-03 16:03:10'),
(87, '', '', '', '2016-10-03', 0, '21', '2016-10-03 16:03:21'),
(88, '', '', '', '2016-10-03', 0, '21', '2016-10-03 16:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invoice_name` varchar(20) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `invoice_name`, `value`) VALUES
(1, 'monarch', 22);

-- --------------------------------------------------------

--
-- Table structure for table `itemorder`
--

CREATE TABLE `itemorder` (
  `id` int(4) NOT NULL,
  `idorder` int(6) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `qty` int(4) NOT NULL,
  `price` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemorder`
--

INSERT INTO `itemorder` (`id`, `idorder`, `sku`, `qty`, `price`) VALUES
(1, 1, 'MAF-01', 1, 23),
(2, 2, 'MAF-02', 1, 300),
(3, 3, 'MAF-01', 1, 499),
(4, 3, 'MAF-02', 1, 300),
(5, 13, 'MAF-01', 1, 499),
(6, 14, 'MAF-02', 1, 300);

-- --------------------------------------------------------

--
-- Table structure for table `sku`
--

CREATE TABLE `sku` (
  `idsku` int(4) NOT NULL,
  `code` varchar(25) NOT NULL,
  `name` text NOT NULL,
  `mrp` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sku`
--

INSERT INTO `sku` (`idsku`, `code`, `name`, `mrp`) VALUES
(1, 'MAF-01', 'MONARCH ART AND FRAMES', '499.00'),
(2, 'MAF-02', 'Monarch Art and Frame', '300.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billorder`
--
ALTER TABLE `billorder`
  ADD PRIMARY KEY (`idorder`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemorder`
--
ALTER TABLE `itemorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sku`
--
ALTER TABLE `sku`
  ADD PRIMARY KEY (`idsku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billorder`
--
ALTER TABLE `billorder`
  MODIFY `idorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `itemorder`
--
ALTER TABLE `itemorder`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sku`
--
ALTER TABLE `sku`
  MODIFY `idsku` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
