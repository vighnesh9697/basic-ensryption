-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2024 at 05:24 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `axion`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(30) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `stock_avaiable` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `price`, `stock_avaiable`) VALUES
(1, 'Pen', 10, 100);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `rating`) VALUES
(1, 5),
(2, 5),
(3, 1),
(4, 4),
(5, 4),
(6, 3),
(7, 1),
(8, 1),
(9, 4),
(10, 2),
(11, 2),
(12, 4),
(13, 4),
(14, 4);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Class` varchar(50) DEFAULT NULL,
  `Institution` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `Name`, `Class`, `Institution`) VALUES
(3, 'j vighnesh', 'MCA', 'SN IT'),
(0, 'ali', 'MCA', 'SNIT'),
(4, 'ravi', 'MCA', 'SNIT'),
(5, 'anandhan', 'MCA', 'SN IT'),
(6, 'remedy', 'BBA', 'SNIT'),
(7, '', 'MCA', 'SNIT');

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_files`
--

CREATE TABLE IF NOT EXISTS `uploaded_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_size` int(11) NOT NULL,
  `file_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `uploaded_files`
--

INSERT INTO `uploaded_files` (`id`, `file_name`, `file_path`, `file_size`, `file_type`) VALUES
(1, 'cart.php', 'uploads/cart.php', 7228, 'application/octet-stream'),
(2, 'Insulators.docx', 'uploads/Insulators.docx', 12330, 'application/vnd.openxmlformats-officedocument.word'),
(3, 'Insulators.docx', 'uploads/Insulators.docx', 12330, 'application/vnd.openxmlformats-officedocument.word');
