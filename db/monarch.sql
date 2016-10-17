-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 17, 2016 at 05:36 PM
-- Server version: 5.6.33-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `monarch`
--

-- --------------------------------------------------------

--
-- Table structure for table `billorder`
--

CREATE TABLE IF NOT EXISTS `billorder` (
  `idorder` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `orderdate` date DEFAULT NULL,
  `total_price` int(10) DEFAULT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idorder`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_name` varchar(20) NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `invoice_name`, `value`) VALUES
(1, 'invoice_no', 8),
(2, 'tin', 2147483645);

-- --------------------------------------------------------

--
-- Table structure for table `itemorder`
--

CREATE TABLE IF NOT EXISTS `itemorder` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `idorder` int(6) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `qty` int(4) NOT NULL,
  `price` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sku`
--

CREATE TABLE IF NOT EXISTS `sku` (
  `idsku` int(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(25) NOT NULL,
  `name` text NOT NULL,
  `mrp` decimal(9,2) DEFAULT NULL,
  PRIMARY KEY (`idsku`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sku`
--

INSERT INTO `sku` (`idsku`, `code`, `name`, `mrp`) VALUES
(1, 'MAF-01', 'MONARCH ART AND FRAMES', 499.00),
(2, 'MAF-02', 'Monarch Art and Frame', 300.00),
(3, 'MAF-03', 'Monarch Art and Frame', 300.00);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
