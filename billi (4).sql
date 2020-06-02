-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 02, 2020 at 11:19 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_body`, `posted_by`, `posted_to`, `date_added`, `removed`, `post_id`) VALUES
(1, 'this is a test', 'ididier', 'boshibolba', '2020-02-13 04:07:07', 'no', 20),
(2, 'lets test', 'Boshibolba', 'Boshibolba', '2020-02-13 11:48:08', 'no', 20),
(3, 'comment test', 'Boshibolba', 'Boshibolba', '2020-02-13 11:50:11', 'no', 20),
(4, 'another comment test', 'Boshibolba', 'Boshibolba', '2020-02-13 11:51:31', 'no', 19),
(5, '	<div class=\'post_comment\' id=\'toggleComment$id\' style=\'display:none;\'>\r\n								<iframe src=\'../../comment_frame.php?post_id=$id\' id=\'comment_iframe\' frameborder=\'0\' scrolling=\'yes\'></iframe>\r\n							</div>	<div class=\'post_comment\' id=\'toggleComment$id\' style=\'display:none;\'>\r\n								<iframe src=\'../../comment_frame.php?post_id=$id\' id=\'comment_iframe\' frameborder=\'0\' scrolling=\'yes\'></iframe>\r\n							</div>	<div class=\'post_comment\' id=\'toggleComment$id\' style=\'display:none;\'>\r\n								<iframe src=\'../../comment_frame.php?post_id=$id\' id=\'comment_iframe\' frameborder=\'0\' scrolling=\'yes\'></iframe>\r\n							</div>	<div class=\'post_comment\' id=\'toggleComment$id\' style=\'display:none;\'>\r\n								<iframe src=\'../../comment_frame.php?post_id=$id\' id=\'comment_iframe\' frameborder=\'0\' scrolling=\'yes\'></iframe>\r\n							</div>	<div class=\'post_comment\' id=\'toggleComment$id\' style=\'display:none;\'>\r\n								<iframe src=\'../../comment_frame.php?post_id=$id\' id=\'comment_iframe\' frameborder=\'0\' scrolling=\'yes\'></iframe>\r\n							</div>', 'Boshibolba', 'Boshibolba', '2020-02-13 12:47:11', 'no', 20),
(6, '	<div class=\'post_comment\' id=\'toggleComment$id\' style=\'display:none;\'>\r\n								<iframe src=\'../../comment_frame.php?post_id=$id\' id=\'comment_iframe\' frameborder=\'0\' scrolling=\'yes\'></iframe>\r\n							</div>', 'Boshibolba', 'Boshibolba', '2020-02-13 12:47:57', 'no', 20),
(7, 'Wow!!!!', 'Boshibolba', 'Boshibolba', '2020-02-14 19:38:17', 'no', 19),
(8, 'Follow works', 'Ididier', 'Chandler_bing', '2020-02-15 16:13:03', 'no', 17),
(9, 'comment test', 'Ididier', 'Chandler_bing', '2020-02-19 08:24:31', 'no', 17),
(10, 'wow', 'Chandler_bing', 'Ididier', '2020-02-21 14:50:51', 'no', 21),
(11, 'test', 'Ididier', 'Ididier', '2020-02-25 16:40:32', 'no', 21),
(12, 'comment test', 'Ididier', 'Ididier', '2020-03-03 08:26:33', 'no', 21),
(13, 'yo', 'Ididier', 'Boshibolba', '2020-05-21 21:35:22', 'no', 20);

-- --------------------------------------------------------

--
-- Table structure for table `idea`
--

DROP TABLE IF EXISTS `idea`;
CREATE TABLE IF NOT EXISTS `idea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `comment` varchar(999) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `idea`
--

INSERT INTO `idea` (`id`, `title`, `comment`, `date`) VALUES
(1, 'test', 'hoppfuly', '2019-12-06'),
(2, 'test', 'shizzzle', '2019-12-06'),
(3, 'igor', 'lets see if this goes in the data base', '2019-12-06'),
(4, 'igor', 'another test', '2019-12-06'),
(5, 'Voyage', 'Faut voyager quand on fait des burn out', '2020-01-18');

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
) ENGINE=MyISAM AUTO_INCREMENT=257 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `username`, `post_id`) VALUES
(256, 'Ididier', 20),
(255, 'Ididier', 21),
(254, 'Ididier', 22);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `user_from` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL,
  `opened` varchar(3) NOT NULL,
  `viewed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_to`, `user_from`, `message`, `link`, `datetime`, `opened`, `viewed`) VALUES
(1, 'Boshibolba', 'Ididier', 'Igor Didier liked your post', 'post.php?id=31', '2020-03-20 18:24:30', 'no', 'no'),
(2, 'Boshibolba', 'Ididier', 'Igor Didier commented on your post', 'post.php?id=31', '2020-03-20 18:26:12', 'no', 'no'),
(3, 'Boshibolba', 'Chandler_bing', 'Chandler Bing commented on your post', 'post.php?id=31', '2020-03-21 11:57:39', 'no', 'no'),
(4, 'Ididier', 'Chandler_bing', 'Chandler Bing commented on a post you commented on', 'post.php?id=31', '2020-03-21 11:57:39', 'no', 'yes'),
(5, 'Boshibolba', 'Ididier', 'Igor Didier commented on your post', 'post.php?id=32', '2020-03-22 20:02:38', 'no', 'no'),
(6, 'Boshibolba', 'Ididier', 'Igor Didier liked your post', 'post.php?id=30', '2020-03-22 20:02:42', 'no', 'no'),
(7, 'Boshibolba', 'Ididier', 'Igor Didier liked your post', 'postpage.php?id=20', '2020-05-21 21:35:10', 'no', 'no'),
(8, 'Boshibolba', 'Ididier', 'Igor Didier commented on your post', 'postpage.php?id=20', '2020-05-21 21:35:22', 'no', 'no'),
(9, 'ididier', 'Ididier', 'Igor Didier commented on a post you commented on', 'postpage.php?id=20', '2020-05-21 21:35:22', 'no', 'yes');

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
  `user-closed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `likes` int(11) NOT NULL,
  `Users_liked` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `added_by`, `user_to`, `date_added`, `user-closed`, `deleted`, `likes`, `Users_liked`) VALUES
(1, 'This is a test', 'Ididier', 'none', '2020-02-03 16:47:30', 'no', 'no', 0, ','),
(2, 'post test ', 'Ididier', 'none', '2020-02-04 13:44:01', 'no', 'no', 0, ','),
(3, 'Test number 2', 'Ididier', 'none', '2020-02-04 13:58:47', 'no', 'no', 0, ','),
(4, 'date added test', 'Ididier', 'none', '2020-02-04 13:59:14', 'no', 'no', 0, ','),
(5, 'test', 'Ididier', 'none', '2020-02-04 14:07:19', 'no', 'no', 0, ','),
(6, 'tset', 'Ididier', 'none', '2020-02-04 14:07:25', 'no', 'no', 0, ','),
(7, 'gogogogo', 'Ididier', 'none', '2020-02-04 14:07:29', 'no', 'no', 0, ','),
(8, 'gogog', 'Test_account', 'none', '2020-02-07 08:19:14', 'no', 'no', 0, ','),
(9, 'lolalolololala', 'Test_account', 'none', '2020-02-07 08:19:22', 'no', 'no', 0, ','),
(10, 'test', 'Test_account', 'none', '2020-02-07 08:19:27', 'no', 'no', 0, ','),
(11, 'not working', 'Test_account', 'none', '2020-02-07 08:19:33', 'no', 'no', 0, ','),
(12, 'test', 'Test_account', 'none', '2020-02-10 14:42:34', 'no', 'no', 0, ','),
(13, 'load test', 'Test_account', 'none', '2020-02-10 14:42:40', 'no', 'no', 0, ','),
(14, 'load test 2', 'Test_account', 'none', '2020-02-10 14:42:49', 'no', 'no', 0, ','),
(15, 'load test 3', 'Test_account', 'none', '2020-02-10 14:42:55', 'no', 'no', 0, ','),
(16, 'This is a test', 'Ididier', 'none', '2020-02-11 17:55:26', 'no', 'no', 0, ','),
(18, 'this is the comment test', 'Boshibolba', 'none', '2020-02-13 11:02:49', 'no', 'no', 0, ','),
(19, 'Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow test!!!!Follow \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Boshibolba', 'none', '2020-02-13 11:09:59', 'no', 'no', 1, ','),
(20, 'phpphpphpphpphpphpphpphpphpphpphpphpphpphpphpphpphpphpphpphpphpphpphpphpphpphpphpphp', 'Boshibolba', 'none', '2020-02-13 11:26:12', 'no', 'no', 2, ','),
(21, 'test bro', 'Ididier', 'none', '2020-02-20 04:16:17', 'no', 'no', 1, ','),
(22, 'test', 'Ididier', 'none', '2020-03-03 09:23:25', 'no', 'no', 1, ',');

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
  `bio` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `num_posts`, `num_likes`, `num_follower`, `user_closed`, `follow_array`, `followers`, `bio`) VALUES
(16, 'Igor', 'Didier', 'Ididier', 'Igordidier69@gmail.com', '511e33b4b0fe4bf75aa3bbac63311e5a', '2020-01-23', 'assets/img/profile_pics/Ididieraf82a8f59e68dca97650899ee20a0ebfn.jpeg', 37, 0, 0, 'no', ',Boshibolba,Chandler_bing,', ',Chandler_bing,Boshibolba,Ididierq,Test,', 'igor lpb\r\nyo'),
(14, 'Chandler', 'Bing', 'Chandler_bing', 'Chander@yahoo.com', '511e33b4b0fe4bf75aa3bbac63311e5a', '2020-01-23', 'assets/img/profile_pics/Chandler_bing2878ae0f35910f012b8286eb4931dfa5n.jpeg', 2, 0, 0, 'no', ',Test_account,Ididier,', ',Test_account,Ididier,', ''),
(17, 'Igor', 'Didier', 'Ididierq', 'Igordidier69@qgmail.com', '511e33b4b0fe4bf75aa3bbac63311e5a', '2020-01-23', 'assets/img/profile_pics/Ididierqfd7ce97acb7495df1cb831a343e27ad7n.jpeg', 2, 0, 0, 'no', ',Ididier,', ',', ''),
(18, 'Boshi', 'Bolba', 'Boshibolba', 'Boshibolba@gmail.com', '511e33b4b0fe4bf75aa3bbac63311e5a', '2020-02-04', 'assets/img/profile_pics/Boshibolba03426257950e10daad3facd8031dd206n.jpeg', 3, 0, 0, 'no', ',,Ididier,', ',,Ididier,', ''),
(19, 'Boshi', 'Bolba', 'Boshibolbaq', 'Boshibolba@gmail.comq', '511e33b4b0fe4bf75aa3bbac63311e5a', '2020-02-05', 'assets/img/profile_pics/default/head_deep_blue.png', 0, 0, 0, 'no', ',', ',', ''),
(20, 'Test', 'Account', 'Test_account', 'Testaccount@gmail.com', '511e33b4b0fe4bf75aa3bbac63311e5a', '2020-02-06', 'assets/img/profile_pics/Test_account04036fe7820c7eb792e822d610aa8b38n.jpeg', 13, 0, 0, 'no', ',', ',', ''),
(21, 'Test', 'Test', 'Test', 'Test@gmail.com', '511e33b4b0fe4bf75aa3bbac63311e5a', '2020-03-03', 'assets/img/profile_pics/Testf1f32303756747cc4507515987930357n.jpeg', 0, 0, 0, 'no', ',Ididier,', ',', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
