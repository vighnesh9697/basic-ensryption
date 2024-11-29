-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 13, 2024 at 07:03 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `azazel`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'remis229', 'CqT6VUBtdeAafgitGjW9bcxJnj9Lu7MpMz7pXPk+pj0='),
(2, 'vigghnesh9697@gmail.com', 'Qhkuq4+Y336R1s3WhDJep2ZrR9j1Mr2u+/hRvETpylw='),
(3, 'asdf', 'Qhkuq4+Y336R1s3WhDJep2ZrR9j1Mr2u+/hRvETpylw='),
(4, 'asdf', 'Qhkuq4+Y336R1s3WhDJep2ZrR9j1Mr2u+/hRvETpylw='),
(5, 'asdf', 'CqT6VUBtdeAafgitGjW9bcxJnj9Lu7MpMz7pXPk+pj0='),
(6, 'coconut', 'CqT6VUBtdeAafgitGjW9bcxJnj9Lu7MpMz7pXPk+pj0=');

-- --------------------------------------------------------

--
-- Table structure for table `user_files`
--

CREATE TABLE IF NOT EXISTS `user_files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_files`
--

INSERT INTO `user_files` (`file_id`, `username`, `file_path`) VALUES
(1, 'asdf', 'uploads/IMG_1054.JPG'),
(2, 'coconut', 'uploads/coconut.jpeg');
