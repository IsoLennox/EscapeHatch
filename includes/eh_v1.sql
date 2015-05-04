-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 04, 2015 at 06:05 PM
-- Server version: 5.5.42-37.1
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ilennox_eh_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_details`
--

CREATE TABLE IF NOT EXISTS `account_details` (
  `account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'foreign key to ''users'' user_id',
  `email` varchar(60) NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `gender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE IF NOT EXISTS `blog_posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'foreign key to ''users'' user_id',
  `author` varchar(30) NOT NULL COMMENT 'username of author',
  `post_title` varchar(40) NOT NULL,
  `content` varchar(10000) DEFAULT NULL,
  `post_datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`post_id`, `user_id`, `author`, `post_title`, `content`, `post_datetime`) VALUES
(3, 2, '', 'New Post!', 'THE BEST POST!', '0000-00-00 00:00:00'),
(10, 4, 'rosemary', 'ROSEMARY', 'It''s Rosemary''s Christmas!', '0000-00-00 00:00:00'),
(13, 4, 'rosemary', 'I posted, too', 'I can write posts', '0000-00-00 00:00:00'),
(15, 4, 'rosemary', 'another post', 'Oh my!!', '0000-00-00 00:00:00'),
(16, 15, 'comet', 'fuck', 'profanity', '0000-00-00 00:00:00'),
(17, 15, 'comet', 'more possttss', '<p>Nefewhfoweijfweiofajweiofeaiwj</p>\r\n<p>html????</p>\r\n\r\n<h3>What</h3>', '0000-00-00 00:00:00'),
(18, 15, 'comet', 'wqeqeq', 'Im full of post.', '0000-00-00 00:00:00'),
(19, 15, 'comet', 'page?', 'what page?  ', '0000-00-00 00:00:00'),
(20, 15, 'comet', 'where is it?', 'Poor lost puppies', '0000-00-00 00:00:00'),
(21, 16, 'doubleShot', 'fuck', 'I posted.', '0000-00-00 00:00:00'),
(23, 18, 'bluebird', 'Hungry', 'I want a sandwich', '0000-00-00 00:00:00'),
(24, 17, 'teapot', 'TEAPOT FTW', 'LOOK AT MY SPOUT, BITCHES!!!!!', '0000-00-00 00:00:00'),
(25, 17, 'teapot', 'Strong', '<strong>YES.</strong>', '0000-00-00 00:00:00'),
(26, 17, 'teapot', 'image injection', '<img src="http://upload.wikimedia.org/wikipedia/commons/thumb/f/f7/Cup-o-coffee-simple.svg/400px-Cup-o-coffee-simple.svg.png"/>', '0000-00-00 00:00:00'),
(28, 20, 'Zora', 'Bubble Guppies', 'bu-bu-bu-bub-a-buh, bubble guppies!', '0000-00-00 00:00:00'),
(29, 21, 'default_test', 'DEFAULT POST', 'POSTING.', '0000-00-00 00:00:00'),
(31, 54, 'secret', 'Secret Post', 'Post test.', '0000-00-00 00:00:00'),
(33, 54, 'secret', 'HELLO WORLD', 'And Valeriya!', '0000-00-00 00:00:00'),
(34, 55, 'doobiebros69', '69', 'Hi guys,\r\n\r\nToday I 69', '0000-00-00 00:00:00'),
(35, 56, 'rperkins', 'First word', 'Is apparently supposed to be "fuck"\r\nThere is no spoon', '0000-00-00 00:00:00'),
(36, 56, 'rperkins', 'Styling', 'Pretty colors and effects make people think you''re smarter.  Science.  Math.  Not.  You''re a girl.  Fuck math.  Just make pretty things.', '0000-00-00 00:00:00'),
(37, 56, 'rperkins', 'Dishes', 'Do them.  \r\nAll of them.  Then vacuum.', '0000-00-00 00:00:00'),
(38, 56, 'rperkins', 'Females', 'Do them.', '0000-00-00 00:00:00'),
(39, 56, 'rperkins', 'what women are good for', '1.  Cooking.\r\n2.  Cleaning.\r\n3.  Vaginas.  ...did I spell that wrong?  I don''t want to google it to check the spelling.  Vagina. Ahhhhh.  ', '0000-00-00 00:00:00'),
(40, 1, 'ilennox', 'JELLO SHOTSSSS', 'Star Trek Style!!', '0000-00-00 00:00:00'),
(41, 1, 'ilennox', 'Hey there', 'Why not', '0000-00-00 00:00:00'),
(42, 60, 'Dark Legend', 'I''ve arrived', 'This Social Media site is not officially better than the rest now that i''m here. (That doesn''t sound cocky at all) BUT IT''S TRUE!!! ', '0000-00-00 00:00:00'),
(43, 60, 'Dark Legend', 'Feeling like Crap', 'SOOOO this weekend i''ve been sick and still feeling like ehhh. head hurts BUT other than that i''m good!', '0000-00-00 00:00:00'),
(44, 20, 'Zora', 'New Website', 'The new website is called "Arbytes".  I''ll post the link when I put it up on the server. probably next week some time.', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `business_card`
--

CREATE TABLE IF NOT EXISTS `business_card` (
  `card_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `background_photo` varchar(60) NOT NULL COMMENT 'for user to upload'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL COMMENT 'FK THEM',
  `contact_username` varchar(30) NOT NULL COMMENT 'Would be THEM',
  `contacts_with_id` int(11) NOT NULL COMMENT 'FK YOU',
  `contacts_with_username` varchar(30) NOT NULL COMMENT 'would be YOU'
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `contact_id`, `contact_username`, `contacts_with_id`, `contacts_with_username`) VALUES
(3, 16, 'doubleShot', 18, 'bluebird'),
(9, 17, 'teapot', 18, 'bluebird'),
(11, 18, 'bluebird', 1, 'ilennox'),
(14, 1, 'ilennox', 17, 'teapot'),
(15, 18, 'bluebird', 17, 'teapot'),
(16, 16, 'doubleShot', 17, 'teapot'),
(17, 15, 'comet', 17, 'teapot'),
(18, 17, 'teapot', 15, 'comet'),
(19, 16, 'doubleShot', 1, 'ilennox'),
(20, 17, 'teapot', 20, 'Zora'),
(22, 20, 'Zora', 21, 'default_test'),
(23, 1, 'ilennox', 20, 'Zora'),
(30, 17, 'teapot', 1, 'ilennox'),
(32, 21, 'default_test', 20, 'Zora'),
(33, 20, 'Zora', 17, 'teapot'),
(47, 20, 'Zora', 54, 'secret'),
(52, 20, 'Zora', 55, 'doobiebros69'),
(53, 55, 'doobiebros69', 20, 'Zora'),
(54, 20, 'Zora', 56, 'rperkins'),
(55, 17, 'teapot', 56, 'rperkins'),
(56, 4, 'rosemary', 56, 'rperkins'),
(58, 1, 'ilennox', 58, 'Tom'),
(59, 54, 'secret', 17, 'teapot'),
(60, 1, 'ilennox', 59, 'rebecca'),
(61, 18, 'bluebird', 60, 'Dark Legend'),
(62, 60, 'Dark Legend', 20, 'Zora');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'FK users user_id',
  `author` varchar(20) NOT NULL COMMENT 'username',
  `path` varchar(60) NOT NULL,
  `caption` varchar(250) NOT NULL,
  `pi` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `user_id`, `author`, `path`, `caption`, `pi`) VALUES
(31, 15, 'comet', 'uploads/15/pewn15.png', '', '0'),
(32, 15, 'comet', 'uploads/15/122.jpg', '', '1'),
(33, 15, 'comet', 'uploads/15/no.png', '', '0'),
(34, 15, 'comet', 'uploads/15/n1.png', '', '1'),
(35, 15, 'comet', 'uploads/15/n21.png', '', '1'),
(36, 15, 'comet', 'uploads/15/22.png', '', '1'),
(37, 15, 'comet', 'uploads/15/r3.png', '', '1'),
(38, 15, 'comet', 'uploads/15/r3.png', '', '1'),
(39, 15, 'comet', 'uploads/15/zz.png', '', '1'),
(40, 15, 'comet', 'uploads/15/zz.png', '', '1'),
(41, 15, 'comet', 'uploads/15/aaaa.png', '', '1'),
(42, 15, 'comet', 'uploads/15/a.jpg', '', '1'),
(44, 1, 'ilennox', 'uploads/1/a.jpg', '', '0'),
(51, 1, 'ilennox', 'uploads/1/d.png', 'Red lightning!', '0'),
(53, 1, 'ilennox', 'uploads/1/l23i.png', 'GO GREASE LIGHTNING!', '0'),
(56, 20, 'Zora', 'uploads/20/a.jpg', '', '1'),
(58, 50, 'zora_faulconer', 'uploads/50/a.jpg', '', '1'),
(59, 50, 'zora_faulconer', 'uploads/50/a.jpg', '', '1'),
(60, 50, 'zora_faulconer', 'uploads/50/lime.png', '', '1'),
(63, 1, 'ilennox', 'uploads/1/green.png', '', '0'),
(68, 54, 'secret', 'uploads/54/li.png', '', '0'),
(69, 54, 'secret', 'uploads/54/li.png', '', '0'),
(70, 54, 'secret', 'uploads/54/lime.png', '', '0'),
(71, 54, 'secret', 'uploads/54/a.jpg', '', '0'),
(72, 54, 'secret', 'uploads/54/techHubLogo.png', '', '0'),
(73, 54, 'secret', 'uploads/54/teechHubLogo.png', '', '1'),
(74, 55, 'doobiebros69', 'uploads/55/purple.png', '', '1'),
(75, 55, 'doobiebros69', 'uploads/55/purple.png', '', '1'),
(76, 55, 'doobiebros69', 'uploads/55/69-11.jpg', '', '1'),
(77, 55, 'doobiebros69', 'uploads/55/69-11.jpg', '', '1'),
(78, 17, 'teapot', 'uploads/17/teapot.jpg', '', '0'),
(79, 17, 'teapot', 'uploads/17/teapot.jpg', '', '1'),
(81, 56, 'rperkins', 'uploads/56/beautifulFace.png', 'I am a bad ass - climbing (falling off) rocks and shitdfgdgfdg', '1'),
(82, 56, 'rperkins', 'uploads/56/purple.png', 'I''m going to grape you in the mouth.', '0'),
(83, 17, 'teapot', 'uploads/17/a.jpg', '', '0'),
(84, 17, 'teapot', 'uploads/17/a.jpg', '', '0'),
(85, 1, 'ilennox', 'uploads/1/lime.png', '', '1'),
(88, 1, 'ilennox', 'uploads/1/backgrounds/purple.png', '', ''),
(89, 1, 'ilennox', 'uploads/1/backgrounds/purple.png', '', ''),
(90, 1, 'ilennox', 'uploads/1/backgrounds/later.png', '', ''),
(91, 1, 'ilennox', 'uploads/1/backgrounds/later.png', '', ''),
(92, 1, 'ilennox', 'uploads/1/sdf.png', '', '1'),
(93, 59, 'rebecca', 'uploads/59/teechHubLogo.png', '', '1'),
(94, 60, 'Dark Legend', 'uploads/60/10869411_10152694708836633_1392920153761565838_o.', '', '1'),
(95, 60, 'Dark Legend', 'uploads/60/Q Wants To Shag Animals.png', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'FK of ''users'' user_id',
  `subject_id` int(11) NOT NULL,
  `menu_name` varchar(30) NOT NULL,
  `position` int(3) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='"pages" are lists within a subject. subjects are...blog, media: any parent';

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE IF NOT EXISTS `post_comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL COMMENT 'FK to ''blog_post'' post_id',
  `user_id` int(11) NOT NULL COMMENT 'commenter',
  `comment_content` varchar(500) NOT NULL,
  `comment_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'foreign key to ''users'' user_id',
  `username` varchar(30) NOT NULL,
  `profile_content` varchar(10000) NOT NULL,
  `profile_img` mediumblob NOT NULL COMMENT 'path to img'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `user_id`, `username`, `profile_content`, `profile_img`) VALUES
(5, 8, 'new_profiler', 'I LOVE FOROF', ''),
(6, 1, 'ilennox', 'I haz a profile!  This is editable.', ''),
(7, 4, 'rosemary', 'YAY', ''),
(8, 15, 'comet', 'whaaaaaaaaaaaaaaaaaaaaaaat\r\nI''ve been doing this for ~19 years (almost)\r\n<strong>MEOW</strong>\r\n\r\nHappy birthday Jesus (Is that how it''s spelled?) wwwwwwwwwwwqwdqwd', 0x70617468),
(9, 16, 'doubleShot', 'Heyyyyyy \r\n', ''),
(10, 17, 'teapot', 'My profile', ''),
(12, 18, 'bluebird', 'I HAZ PROFILE', ''),
(13, 20, 'Zora', 'ZORA LOVES BUBBLES', ''),
(14, 21, 'default_test', 'DEFAULT PROFILE', ''),
(15, 50, 'zora_faulconer', 'NO PROFILE', ''),
(16, 54, 'secret', 'Secret Profile.', ''),
(17, 54, 'secret', 'Secret Profile.', ''),
(18, 55, 'doobiebros69', '<h1>6969696969</h1>', ''),
(19, 56, 'rperkins', 'Meow\r\nWheek\r\nabcdefghijklmnopqrstuvwxyzzzzzz\r\nYou should''ve registered two months ago with everyone else, not my fault all the classes are full.  YES, you do have to do the orientation, you not so special snowflake.', ''),
(20, 58, 'Tom', 'hkwhedw', ''),
(21, 59, 'rebecca', 'rgdfg', ''),
(22, 60, 'Dark Legend', 'I''m Zach! ', '');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(30) NOT NULL,
  `position` int(3) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `menu_name`, `position`, `visible`) VALUES
(1, 'Blog', 1, 1),
(2, 'Profile', 2, 1),
(3, 'Gallery', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `profile_img` varchar(60) NOT NULL DEFAULT 'uploads/default.png',
  `background_img` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `profile_img`, `background_img`) VALUES
(1, 'ilennox', '$2y$10$jGe/Hft8EJQfuF2kQVLAre8XzZjYN.07Et7xq52UBH13t.yR2kJeq', 'isolennox@gmail.com', 'uploads/1/sdf.png', 'uploads/1/backgrounds/yelhlow.png'),
(2, 'ilennox2', '$2y$10$UewxXAgF5Hjzd02DDVs6OuAOBUG/wu8ckBcR/Ww22zjgME48XVaEa', '', '', ''),
(4, 'rosemary', '$2y$10$er3OT/4uOPERJbQtEXA9neXzqj/O8flaG9xq.BlSRDr6rR0f1teN6', '', '', ''),
(5, 'new_profile_guy', '$2y$10$YAzy4NYKlZqJoTmAaWxMVuWJN0H2.CXU7xWblufeCKGe.OCOoNzLG', '', '', ''),
(15, 'comet', '$2y$10$WRW5Oj0Wux7Uvf4nLTA00ufoo2TMfOb/egjrIkInESAoLjBbNCZzy', 'isolennox@gmail.com', 'uploads/15/a.jpg', ''),
(16, 'doubleShot', '$2y$10$KOBBB4WvWt7f4.ji54cbvutHLJgaz.XyPBbVqj/O7RI8C/EF9iWpC', '', '', ''),
(17, 'teapot', '$2y$10$rgNtLG4LyCnqWad6i1iIy.GDIJXjWx3sXsLACyTY4cblR6VFYy46m', 'teapot@google.com', 'uploads/17/teapot.jpg', ''),
(18, 'bluebird', '$2y$10$JRz.R/yusDMZl7sV2SqJB.Xsza28ajjZkhB9IIIxy9VQat4cVeMGe', '', '', ''),
(19, 'newest!', '$2y$10$ViZqyqaffUGX58c3TQ2UdOnfkJM4a3CPzpYYQniqvv2P9ykdpjuU2', 'isolennox@gmail.com', '', ''),
(20, 'Zora', '$2y$10$pXUj58B3ERhGzY8hVhoEzOqsP8FHmDovBIFb16EqjqUc.wLk12aFq', 'isolennox@gmail.com', 'uploads/default.png', ''),
(21, 'default_test', '$2y$10$tqAkW.tAulVVbAL9nHnpKOpTSbFyLFi07fO2YZfGpM4Q636Zq3uv6', 'isolennox@gmail.com', 'uploads/default.png', ''),
(45, 'ilennox22', '$2y$10$WaLJzuD.s2loXDbgtwK2MuQsXyqz2AnFa/.gtevRH10T38RKr6ZyW', 'isolennox@gmail.com', 'uploads/default.png', ''),
(46, 'ilennox1', '$2y$10$XOtXDl67EkPD6KDvvkXQWeq8Y3/8Sw5QJJfPmyq/DFlvespW0DSlW', 'isolennox@gmail.com', 'uploads/default.png', ''),
(47, 'ilennox11', '$2y$10$cPpQILDkh3ZxoddGPcb52OB8c9JMzys0RSRFaYXhf7GtJM5vE4Mca', 'isolennox@gmail.com', 'uploads/default.png', ''),
(50, 'zora_faulconer', '$2y$10$iXYpSWwL1SR5N.eQTpGq3OCv55KoOhhXasn.SkroQM2hZHE8BC0K2', 'isolennox@gmail.com', 'uploads/default.png', ''),
(51, 'ilennox342', '$2y$10$mqvR5r2aIRFEjEDEiyvoWOG8Um884DInt9dTiak/OOQ5DCVbUzeE.', 'isolennox@gmail.com', 'uploads/default.png', ''),
(54, 'secret', '$2y$10$.FlB0Q2IkLKHRPvnVK/M9.mmAj9EKSIWbs4i.YsU/kPwGaN.R/n1q', 'isolennox@gmail.com', 'uploads/54/teechHubLogo.png', ''),
(55, 'doobiebros69', '$2y$10$RxZOF33Y4TPqjj.PZ6yZIu5PqJvqrpbFD.z8lEXjH4pkHhhjkT1zS', 'sincity@acdcfan.com', 'uploads/default.png', ''),
(56, 'rperkins', '$2y$10$OkkdbHlXYN.9SogU6E33i.4Ammq5SZej7buWu8n9gOMaoi01fbBDy', 'perkinsrosemaryl@gmail.com', 'uploads/default.png', ''),
(58, 'Tom', '$2y$10$gQZRFECaI/EdtFxO.2dsOuPGurdDMYFp2isUTew0EznIZ6ux8.lle', 'tom@gmail.com', 'uploads/default.png', ''),
(59, 'rebecca', '$2y$10$mZrG0yL8HH6ifPOLZl0J2OebIY/NCM/NTq.WMzYMXHO6uT45MRcaO', 'fgdfgd', 'uploads/59/teechHubLogo.png', ''),
(60, 'Dark Legend', '$2y$10$U2tHpUwKYGYwv92LDLXEA.GMwFx1YS4T532fdRU6thzZ1kwmgiBi6', 'zachauld@gmail.com', 'uploads/60/Q Wants To Shag Animals.png', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_details`
--
ALTER TABLE `account_details`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `business_card`
--
ALTER TABLE `business_card`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_details`
--
ALTER TABLE `account_details`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `business_card`
--
ALTER TABLE `business_card`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
