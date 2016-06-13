
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 13, 2016 at 01:22 PM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u914435349_kenpa`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Mixed Nuts'),
(2, 'ChestNuts'),
(3, 'Soy Nuts'),
(4, 'Peanuts'),
(5, 'Cacao'),
(6, 'Almonds');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(12) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(100) NOT NULL,
  `product_id` int(12) NOT NULL,
  PRIMARY KEY (`image_id`),
  KEY `k_image_product_idx` (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image_name`, `product_id`) VALUES
(1, '1_01.jpg', 1),
(2, '2_01.jpg', 2),
(3, '3_01.jpg', 3),
(4, '4_01.jpg', 4),
(5, '5_01.jpg', 5),
(6, '6_01.jpg', 6),
(7, '7_01.jpg', 7),
(8, '8_01.jpg', 8),
(9, '9_01.jpg', 9),
(10, '10_01.jpg', 10),
(11, '11_01.jpg', 11),
(12, '12_01.jpg', 12),
(13, '13_01.jpg', 13),
(14, '14_01.jpg', 14),
(15, '15_01.jpg', 15);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(12) NOT NULL AUTO_INCREMENT,
  `product_sku` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `product_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `product_price` float DEFAULT NULL,
  `product_desc` text CHARACTER SET utf8,
  `category_id` int(11) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `is_new` tinyint(1) DEFAULT NULL,
  `is_sale` tinyint(1) DEFAULT '0',
  `is_featured` tinyint(1) DEFAULT '0',
  `is_recommended` tinyint(1) DEFAULT '0',
  `is_stock` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `ProductSKU_UNIQUE` (`product_sku`),
  KEY `fk_product_category_idx` (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_sku`, `product_name`, `product_price`, `product_desc`, `category_id`, `created_time`, `is_new`, `is_sale`, `is_featured`, `is_recommended`, `is_stock`) VALUES
(1, 'SKU1', 'Mixed Nuts (In Shell)', 100, 'Long Desc 1', 1, NULL, NULL, 0, 1, 0, 0),
(2, 'SKU2', 'Roasted Mixed Nuts (50% Less Salt)', 100, 'Long Desc 1', 1, NULL, NULL, 0, 1, 0, 0),
(3, 'SKU3', 'Roasted Mixed Nuts (Unsalted)', 100, 'Long Desc 1', 1, NULL, NULL, 0, 1, 0, 0),
(4, 'SKU4', 'Dried Chestnuts', 100, 'Long Desc 1', 2, NULL, NULL, 0, 1, 0, 0),
(5, 'SKU5', 'Fresh Chestnuts', 100, 'Long Desc 1', 2, NULL, NULL, 0, 1, 0, 0),
(6, 'SKU6', 'Organic Soy Beans', 100, 'Long Desc 1', 3, NULL, NULL, 0, 1, 0, 0),
(7, 'SKU7', 'Roasted Soy Beans (Salted, Whole)', 100, 'Long Desc 1', 3, NULL, NULL, 0, 0, 1, 0),
(8, 'SKU8', 'Supreme Roasted Mixed Nuts (Unsalted)', 100, 'Long Desc 1', 1, NULL, NULL, 0, 0, 1, 0),
(9, 'SKU9', 'Jumbo Raw Peanuts (In Shell)', 100, 'Long Desc 1', 4, NULL, NULL, 0, 0, 0, 0),
(10, 'SKU10', 'Raw Redskin Peanuts', 100, 'Long Desc 1', 4, NULL, NULL, 0, 0, 0, 0),
(11, 'SKU11', 'Raw Spanish Peanuts', 100, 'Long Desc 1', 4, NULL, NULL, 0, 0, 0, 0),
(12, 'SKU12', 'Organic Cacao Beans (Peeled)', 100, 'Long Desc 1', 5, NULL, NULL, 0, 0, 0, 0),
(13, 'SKU13', 'Organic Cacao Beans (Raw)', 100, 'Long Desc 1', 5, NULL, NULL, 0, 0, 0, 0),
(14, 'SKU14', 'Raw Almonds (No Shell)', 100, 'Long Desc 1', 6, NULL, NULL, 0, 0, 0, 0),
(15, 'SKU15', 'Roasted Almonds (50% Less Salt)', 100, 'Long Desc 1', 6, NULL, NULL, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user_password` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `user_firstname` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `user_lastname` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `user_city` varchar(90) CHARACTER SET utf8 DEFAULT NULL,
  `user_phone` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `user_country` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `user_address` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `user_address2` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `UserEmail_UNIQUE` (`user_email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `user_firstname`, `user_lastname`, `user_city`, `user_phone`, `user_country`, `user_address`, `user_address2`) VALUES
(1, 'admin@email.com', '123456', 'Dong', 'Nguyen', NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
