-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2024 at 05:16 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `deepfakedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('jack_frost007', 'secure_password');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`username`, `password`) VALUES
('admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `confirm_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Email` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `phone`, `confirm_password`) VALUES
(3, '1@gamil.com', 'asdf', '2345', 'asdf'),
(2, 'asd@gmail.com', 'asdf', '1234', 'asdf'),
(4, 'ds@gmsil.com', 'ased', '8521', 'ased'),
(5, 'vighnesh9697@gmail.com', 'asdf', '1234', NULL),
(7, 'aladin', 'asdf', '1234', NULL),
(8, 'sara', 'asdf', '25893', NULL),
(9, 'luffy', 'asdf', '1234', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `moderator_login`
--

CREATE TABLE IF NOT EXISTS `moderator_login` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moderator_login`
--

INSERT INTO `moderator_login` (`username`, `password`) VALUES
('moderator', 'password');
