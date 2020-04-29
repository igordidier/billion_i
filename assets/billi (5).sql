-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 29, 2020 at 12:52 PM
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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_body` text NOT NULL,
  `posted_by` varchar(60) NOT NULL,
  `posted_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `removed` varchar(3) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_body`, `posted_by`, `posted_to`, `date_added`, `removed`, `post_id`) VALUES
(1, 'Comment test', 'Ididier', 'Ididier', '2020-02-14 15:20:01', 'no', 25),
(2, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'Ididier', 'Ididier', '2020-02-14 15:23:05', 'no', 27),
(3, 'cool', 'Boshibolba', 'Boshibolba', '2020-03-02 20:05:00', 'no', 31),
(4, 'test', 'Ididier', 'Ididier', '2020-03-20 18:19:19', 'no', 29),
(5, 'note test', 'Ididier', 'Boshibolba', '2020-03-20 18:25:43', 'no', 31),
(6, 'note test', 'Ididier', 'Boshibolba', '2020-03-20 18:26:12', 'no', 31),
(7, 'note test', 'Chandler_bing', 'Boshibolba', '2020-03-21 11:57:39', 'no', 31),
(8, 'yo', 'Ididier', 'Boshibolba', '2020-03-22 20:02:38', 'no', 32),
(9, 'nice post', 'Chandler_bing', 'Ididier', '2020-03-25 23:25:09', 'no', 29);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=135 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `username`, `post_id`) VALUES
(125, 'Ididier', 25),
(124, 'Ididier', 24),
(126, 'Ididier', 32),
(127, 'Ididier', 31),
(128, 'Ididier', 30),
(129, 'Chandler_bing', 29),
(130, 'Chandler_bing', 28),
(131, 'Chandler_bing', 25),
(134, 'Chandler_bing', 19),
(133, 'Chandler_bing', 23),
(132, 'Chandler_bing', 24),
(120, 'Ididier', 29),
(119, 'Boshibolba', 30),
(114, 'Boshibolba', 31),
(118, 'Boshibolba', 29);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_to` varchar(50) NOT NULL,
  `user_from` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL,
  `opened` varchar(3) NOT NULL,
  `viewed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_to`, `user_from`, `body`, `date`, `opened`, `viewed`, `deleted`) VALUES
(2, 'Ididier', 'Test_account', 'hi', '2020-04-03 00:00:00', 'yes', 'no', 'no'),
(3, 'Test_account', 'ididier', 'hey', '2020-04-09 00:00:00', 'no', 'no', 'no'),
(4, 'ididier', 'Test_account', 'how are you', '2020-04-10 00:00:00', 'yes', 'no', 'no'),
(5, 'Test_account', 'Ididier', 'ftest', '2020-04-29 12:52:28', 'no', 'no', 'no'),
(6, 'Test_account', 'Ididier', 'etet', '2020-04-29 12:52:31', 'no', 'no', 'no'),
(7, 'ididier', 'Ididier', 'yo\r\n', '2020-04-29 12:56:34', 'yes', 'no', 'no'),
(8, 'ididier', 'Ididier', 'yo\r\n', '2020-04-29 12:56:39', 'yes', 'no', 'no'),
(9, 'Test_account', 'Ididier', 'time test', '2020-04-29 12:58:28', 'no', 'no', 'no'),
(10, 'Test_account', 'Ididier', 'test', '2020-04-29 14:46:53', 'no', 'no', 'no');

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_to`, `user_from`, `message`, `link`, `datetime`, `opened`, `viewed`) VALUES
(1, 'Boshibolba', 'Ididier', 'Igor Didier liked your post', 'post.php?id=31', '2020-03-20 18:24:30', 'no', 'yes'),
(2, 'Boshibolba', 'Ididier', 'Igor Didier commented on your post', 'post.php?id=31', '2020-03-20 18:26:12', 'no', 'yes'),
(3, 'Boshibolba', 'Chandler_bing', 'Chandler Bing commented on your post', 'post.php?id=31', '2020-03-21 11:57:39', 'no', 'yes'),
(4, 'Ididier', 'Chandler_bing', 'Chandler Bing commented on a post you commented on', 'post.php?id=31', '2020-03-21 11:57:39', 'no', 'yes'),
(5, 'Boshibolba', 'Ididier', 'Igor Didier commented on your post', 'post.php?id=32', '2020-03-22 20:02:38', 'no', 'yes'),
(6, 'Boshibolba', 'Ididier', 'Igor Didier liked your post', 'post.php?id=30', '2020-03-22 20:02:42', 'no', 'yes'),
(7, 'Ididier', 'Chandler_bing', 'Chandler Bing liked your post', 'post.php?id=29', '2020-03-25 23:24:52', 'no', 'no'),
(8, 'Ididier', 'Chandler_bing', 'Chandler Bing liked your post', 'post.php?id=28', '2020-03-25 23:24:56', 'no', 'no'),
(9, 'Ididier', 'Chandler_bing', 'Chandler Bing liked your post', 'post.php?id=25', '2020-03-25 23:24:57', 'no', 'no'),
(10, 'Ididier', 'Chandler_bing', 'Chandler Bing liked your post', 'post.php?id=24', '2020-03-25 23:24:58', 'no', 'no'),
(11, 'Ididier', 'Chandler_bing', 'Chandler Bing liked your post', 'post.php?id=23', '2020-03-25 23:24:59', 'no', 'no'),
(12, 'Ididier', 'Chandler_bing', 'Chandler Bing liked your post', 'post.php?id=19', '2020-03-25 23:25:01', 'no', 'no'),
(13, 'Ididier', 'Chandler_bing', 'Chandler Bing commented on your post', 'post.php?id=29', '2020-03-25 23:25:09', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` text NOT NULL,
  `added_by` varchar(60) NOT NULL,
  `user_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `likes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `added_by`, `user_to`, `date_added`, `user_closed`, `deleted`, `likes`) VALUES
(1, 'this is a test', 'Ididier', 'none', '2020-01-30 12:16:08', 'no', 'no', 0),
(7, 'Hello every one ', 'Billion_i', 'none', '2020-02-04 20:16:26', 'no', 'no', 0),
(6, 'add test', 'Boshibolba', 'none', '2020-02-03 23:32:53', 'no', 'no', 0),
(11, 'fleet\nsoil\nfastidious\nreporter\ntheater\nindex finger\nfresh\nred\ngirlfriend\nfence\namber\nfrozen\nindulge\ntelevision\napplied\nfailure\ndrawing\nsport\naunt\nbean\ncolor\ninvisible\nmovie\nmail carrier\nspontaneous\npain\nconfront\nflood\nbasket\nslap\nfolk music\nbucket\nfuel\ncompete\ngene\npony\nexport\nsupport\nrich\npigeon\nmodule\nafford\nraid\ndrag\nexcavation\nanswer\nconfession\nhandy\nfather\ntreatment', 'Boshibolba', 'none', '2020-02-05 17:45:19', 'no', 'no', 0),
(12, 'fleet soil fastidious reporter theater index finger fresh red girlfriend fence amber frozen indulge television applied failure drawing sport aunt bean color invisible movie mail carrier spontaneous pain confront flood basket slap folk music bucket fuel compete gene pony export support rich pigeon module afford raid drag excavation answer confession handy father treatmentfleet soil fastidious reporter theater index finger fresh red girlfriend fence amber frozen indulge television applied failure drawing sport aunt bean color invisible movie mail carrier spontaneous pain confront flood basket slap folk music bucket fuel compete gene pony export support rich pigeon module afford raid drag excavation answer confession handy father treatment', 'Boshibolba', 'none', '2020-02-05 17:50:34', 'no', 'no', 0),
(16, 'fleet soil fastidious reporter theater index finger fresh red girlfriend fence amber frozen indulge television applied failure drawing sport aunt bean color invisible movie mail carrier spontaneous pain confront flood basket slap folk music bucket fuel compete gene pony export support rich pigeon module afford raid drag excavation answer confession handy father treatmentfleet soil fastidious reporter theater index finger fresh red girlfriend fence amber frozen indulge television applied failure drawing sport aunt bean color invisible movie mail carrier spontaneous pain confront flood basket slap folk music bucket fuel compete gene pony export support rich pigeon module afford raid drag excavation answer confession handy father treatmentflee', 'Boshibolba', 'none', '2020-02-05 18:18:08', 'no', 'no', 0),
(17, 'Every thing seems to working long text to with a limite of 750 characters it\'s great ', 'Ididier', 'none', '2020-02-05 18:28:59', 'no', 'no', 0),
(18, 'Every thing seems to working long text to with a limite of 750 characters it\'s great\n\nEvery thing seems to working long text to with a limite of 750 characters it\'s great\n\nEvery thing seems to working long text to with a limite of 750 characters it\'s great\n\n', 'Ididier', 'none', '2020-02-05 18:29:06', 'no', 'no', 0),
(19, 'this is a test', 'Ididier', 'none', '2020-02-05 22:04:01', 'no', 'no', 1),
(30, 'post test', 'Boshibolba', 'none', '2020-02-21 18:54:42', 'no', 'no', 2),
(31, 'post', 'Boshibolba', 'none', '2020-02-28 18:08:53', 'no', 'no', 2),
(32, 'fsf', 'Boshibolba', 'none', '2020-03-02 16:27:41', 'no', 'no', 1),
(23, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'Ididier', 'none', '2020-02-07 19:07:43', 'no', 'no', 1),
(24, '    display: flex;\r\n    justify-content: center;\r\n    align-items: center;\r\n    padding: 15px;\r\n    font-family: sans-serif;\r\n    font-size: 20px;\r\n    text-align: center;    display: flex;\r\n    justify-content: center;\r\n    align-items: center;\r\n    padding: 15px;\r\n    font-family: sans-serif;\r\n    font-size: 20px;\r\n    text-align: center;    display: flex;\r\n    justify-content: center;\r\n    align-items: center;\r\n    padding: 15px;\r\n    font-family: sans-serif;\r\n    font-size: 20px;\r\n    text-align: center;    display: flex;\r\n    justify-content: center;\r\n    align-items: center;\r\n    padding: 15px;\r\n    font-family: sans-serif;\r\n    font-size: 20px;\r\n    text-align: center;    display: flex;\r\n    justify-content: center;\r\n    align-items: center;\r\n    padding: 15px', 'Ididier', 'none', '2020-02-07 19:08:56', 'no', 'no', 2),
(25, 'display: flex; justify-content: center; align-items: center; padding: 15px; font-family: sans-serif; font-size: 20px; text-align: center; display: flex; justify-content: center; align-items: center; padding: 15px; font-family: sans-serif; font-size: 20px; text-align: center; dis\r\nplay: flex; justify-content: center; align-items: center; padding: 15px; font-family: sans-serif; font-size: 20px; text-align: center; display: flex; justify-content: center; align-items: center; padding: 15px', 'Ididier', 'none', '2020-02-11 23:18:59', 'no', 'no', 1),
(28, 'this post', 'Ididier', 'none', '2020-02-20 19:42:48', 'no', 'no', 1),
(29, 'post', 'Ididier', 'none', '2020-02-20 19:44:27', 'no', 'no', 3);

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
  `user_closed` varchar(4) NOT NULL,
  `follow_array` text NOT NULL,
  `followers` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `num_posts`, `num_likes`, `num_follower`, `user_closed`, `follow_array`, `followers`) VALUES
(16, 'Igor', 'Didier', 'Ididier', 'Igordidier69@gmail.com', '511e33b4b0fe4bf75aa3bbac63311e5a', '2020-01-23', 'assets/img/profile_pics/ididier.jpg', 21, 0, 0, 'no', ',Chandler_bing,boshibolba,Boshibolba,', ',Chandler_bing,boshibolba,Boshibolba,'),
(14, 'Chandler', 'Bing', 'Chandler_bing', 'Chander@yahoo.com', '511e33b4b0fe4bf75aa3bbac63311e5a', '2020-01-23', 'assets/img/profile_pics/default/head_deep_blue.png', 2, 0, 0, 'no', ',Ididier,', ',Ididier,'),
(17, 'Igor', 'Didier', 'Ididierq', 'Igordidier69@qgmail.com', '511e33b4b0fe4bf75aa3bbac63311e5a', '2020-01-23', 'assets/img/profile_pics/default/head_alizarin.png', 0, 0, 0, 'no', ',', ','),
(18, 'Boshi', 'Bolba', 'Boshibolba', 'Boshibolba@gmail.com', '511e33b4b0fe4bf75aa3bbac63311e5a', '2020-02-04', 'assets/img/profile_pics/Boshibolba03f4fe359a7ebfa153dce6a51671f490n.jpeg', 6, 0, 0, 'no', ',Ididier,', ',Ididier,Ididier,'),
(19, 'Boshi', 'Bolba', 'Boshibolbaq', 'Boshibolba@gmail.comq', '511e33b4b0fe4bf75aa3bbac63311e5a', '2020-02-05', 'assets/img/profile_pics/default/head_deep_blue.png', 0, 0, 0, 'no', ',', ','),
(20, 'Test', 'Account', 'Test_account', 'Testaccount@gmail.com', '511e33b4b0fe4bf75aa3bbac63311e5a', '2020-02-06', 'assets/img/profile_pics/default/head_alizarin.png', 13, 0, 0, 'no', ',', ','),
(21, 'Qdqdqd', 'Qdqdqd', 'Qdqdqd', 'Qdqzd@qdzd.com', 'ee9a7cd89f313e57d2194dea5dd5563e', '2020-03-02', 'assets/img/profile_pics/default/head_alizarin.png', 0, 0, 0, 'no', ',', ',');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
