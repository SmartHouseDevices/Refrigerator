-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: localhost
-- Χρόνος δημιουργίας: 15 Μαρ 2015 στις 14:54:37
-- Έκδοση διακομιστή: 5.5.41
-- Έκδοση PHP: 5.4.36-0+deb7u3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Βάση: `Refrigerator`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `Items`
--

CREATE TABLE IF NOT EXISTS `Items` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `barcode` bigint(12) NOT NULL,
  `name` varchar(32) NOT NULL,
  `type` varchar(32) NOT NULL DEFAULT 'none',
  `quantity` int(12) NOT NULL,
  `expire_date` date NOT NULL DEFAULT '0000-00-00',
  `insert_date` datetime NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`barcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
