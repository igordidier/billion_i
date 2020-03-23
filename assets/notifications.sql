-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 23, 2020 at 09:13 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billi`
--

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_to` varchar(50) NOT NULL,
  `user_from` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `link` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL,
  `opened` varchar(3) NOT NULL,
  `viewed` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_to`, `user_from`, `message`, `link`, `datetime`, `opened`, `viewed`) VALUES
(1, 'Boshibolba', 'Ididier', 'Igor Didier liked your post', 'post.php?id=31', '2020-03-20 18:24:30', 'no', 'no'),
(2, 'Boshibolba', 'Ididier', 'Igor Didier commented on your post', 'post.php?id=31', '2020-03-20 18:26:12', 'no', 'no'),
(3, 'Boshibolba', 'Chandler_bing', 'Chandler Bing commented on your post', 'post.php?id=31', '2020-03-21 11:57:39', 'no', 'no'),
(4, 'Ididier', 'Chandler_bing', 'Chandler Bing commented on a post you commented on', 'post.php?id=31', '2020-03-21 11:57:39', 'no', 'no'),
(5, 'Boshibolba', 'Ididier', 'Igor Didier commented on your post', 'post.php?id=32', '2020-03-22 20:02:38', 'no', 'no'),
(6, 'Boshibolba', 'Ididier', 'Igor Didier liked your post', 'post.php?id=30', '2020-03-22 20:02:42', 'no', 'no');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
