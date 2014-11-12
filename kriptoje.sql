-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 21, 2014 at 01:44 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kriptoje`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `korisnici_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `korisnici_email` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `korisnici_lozinka` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`korisnici_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`korisnici_id`, `korisnici_email`, `korisnici_lozinka`) VALUES
(1, 'vterescenko@gmail.com', '*@#E10ADC3949BA59ABBE56E057F20F883E'),
(2, 'vterescenkoa@gmail.com', '*@#E10ADC3949BA59ABBE56E057F20F883E'),
(3, 'nekiasd@gmail.com', '*@#E10ADC3949BA59ABBE56E057F20F883E'),
(4, 'nekimail@gmail.com', '*@#E10ADC3949BA59ABBE56E057F20F883E'),
(5, 'adjudic@gmail.com', '*@#015ED62FE031AD4895B025C92A5A83AA');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
