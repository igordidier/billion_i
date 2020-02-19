-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 19, 2020 at 10:12 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `num_posts` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `num_follower` int(11) NOT NULL,
  `follow_array` text NOT NULL,
  `followers` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `num_posts`, `num_likes`, `num_follower`, `follow_array`, `followers`) VALUES
(16, 'Igor', 'Didier', 'Ididier', 'Igordidier69@gmail.com', '511e33b4b0fe4bf75aa3bbac63311e5a', '2020-01-23', 'assets/img/profile_pics/default/head_deep_blue.png', 21, 0, 0, ',Chandler_bing,', ',chandler_bing,boshibolba,'),
(14, 'Chandler', 'Bing', 'Chandler_bing', 'Chander@yahoo.com', '511e33b4b0fe4bf75aa3bbac63311e5a', '2020-01-23', 'assets/img/profile_pics/default/head_deep_blue.png', 2, 0, 0, ',ididier,', ',ididier,'),
(17, 'Igor', 'Didier', 'Ididierq', 'Igordidier69@qgmail.com', '511e33b4b0fe4bf75aa3bbac63311e5a', '2020-01-23', 'assets/img/profile_pics/default/head_alizarin.png', 0, 0, 0, ',', ','),
(18, 'Boshi', 'Bolba', 'Boshibolba', 'Boshibolba@gmail.com', '511e33b4b0fe4bf75aa3bbac63311e5a', '2020-02-04', 'assets/img/profile_pics/default/head_alizarin.png', 3, 0, 0, ',ididier,', ','),
(19, 'Boshi', 'Bolba', 'Boshibolbaq', 'Boshibolba@gmail.comq', '511e33b4b0fe4bf75aa3bbac63311e5a', '2020-02-05', 'assets/img/profile_pics/default/head_deep_blue.png', 0, 0, 0, ',', ','),
(20, 'Test', 'Account', 'Test_account', 'Testaccount@gmail.com', '511e33b4b0fe4bf75aa3bbac63311e5a', '2020-02-06', 'assets/img/profile_pics/default/head_alizarin.png', 13, 0, 0, ',', ',');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
