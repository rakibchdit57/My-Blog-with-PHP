-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2017 at 08:12 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(25, 'Tourism'),
(26, 'Native Armour'),
(27, 'Deer Of Africa');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(5) NOT NULL,
  `comment_post_id` int(5) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(2, 14, 'Rakib Chowdhury', 'rakib92@gmail.com', 'fkdsjfkdjfkdj', 'approved', '2017-06-13'),
(3, 14, 'Rakib Chowdhury', 'rakib92@gmail.com', 'Here is some content', 'unapproved', '2017-06-13'),
(10, 23, 'marium', 'marium@gmail.com', 'Hi Marium', 'approved', '2017-06-14'),
(22, 23, 'Jayed Khan', 'jayed@gmail.com', 'fkfkd dk fdkjf kdjf', 'approved', '2017-06-14'),
(40, 21, 'jalu', 'jalin@gmail.com', 'kdjfkldsjfkdjfl', 'unapproved', '2017-06-20'),
(41, 21, 'belu', 'belu@gmail.com', 'fkdjfdfkj', 'unapproved', '2017-06-20'),
(54, 14, 'Jahid', 'jahid@gmail.com', 'fkdjfkdjfkdjfjdfj', 'approved', '2017-06-21'),
(56, 14, 'Peter', 'peter@gmail.com', 'fjdksjfdjf', 'approved', '2017-06-21'),
(58, 21, 'Barbie Swasty', 'barswas@hotmail.com', 'fuck them in both ways', 'unapproved', '2017-06-22'),
(59, 27, 'jayyZ', 'raki22@g.com', 'bvcvbcvbcvb', 'unapproved', '2017-06-29'),
(60, 32, 'jallin', 'jahid@gmail.com', 'fkdjfkdf', 'unapproved', '2017-07-08'),
(61, 14, 'rakib', 'shonta@gmail.com', 'jkjjjfdsf', 'unapproved', '2017-07-11'),
(62, 14, 'Jarif ', 'jarif@hotmail.com', 'jfkldjfldjlfjd', 'unapproved', '2017-07-20'),
(63, 35, 'jallin', 'jarif@hotmail.com', 'lkjkljjklj', 'approved', '2017-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(10) NOT NULL,
  `post_category_id` int(10) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` varchar(255) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(14, 25, 'Tourism', 'Rakib Ch', '2017-09-23', 'me.JPG', '<p>Hi this is this is new post from myself</p>', 'tourism,rakib,Niladri', '7', 'published'),
(21, 27, 'Deer migration', 'Shamim Sarkar', '2017-09-23', 'deer.jpg', '<p>This post is about Deer Migration in Africa</p>', 'deer ,migration,africa', '4', 'draft'),
(23, 25, 'Macaw Bird', 'Marium Akhter', '2017-09-23', 'macaw.JPG', '<p>Macaw birds in Bangladesh</p>', 'Macaw,Tourism', '4', 'published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystring22'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(6, 'rico', '1234', 'tico', 'rudriguez', 'rak@gmail.com', '', 'admin', ''),
(7, 'dom', '1234', 'Dominic ', 'Torretto', 'dom@gmail.com', '', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
