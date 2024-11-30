-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 14, 2024 at 08:55 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `remedy`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(30) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `stock_available` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `product_name`, `price`, `stock_available`) VALUES
(6, 'ruler', 6, 351),
(3, 'Coconut', 66, 88),
(4, 'soap', 45, 3),
(5, 'candle', 20, 100);
