-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2021 at 04:49 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devtim`
--

-- --------------------------------------------------------

--
-- Table structure for table `he_notifications`
--

CREATE TABLE `he_notifications` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `time` text NOT NULL,
  `isread` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `he_posts`
--

CREATE TABLE `he_posts` (
  `id` int(11) NOT NULL,
  `slug` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `template` text NOT NULL,
  `type` text NOT NULL,
  `created` text NOT NULL,
  `author` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `he_users`
--

CREATE TABLE `he_users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `created` text NOT NULL,
  `realname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `he_users`
--

INSERT INTO `he_users` (`id`, `username`, `password`, `email`, `created`, `realname`) VALUES
(1, 'admin', '19cd66cb5d2a6f93b7adc4cfb7e01b82158f328bbec7b35c94578b4e1d00344342ec8c58d79379d65bb95d6ce9a26ab8707d22fa897be93bf5315db73707f2ef', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `he_notifications`
--
ALTER TABLE `he_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `he_posts`
--
ALTER TABLE `he_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `he_users`
--
ALTER TABLE `he_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `he_notifications`
--
ALTER TABLE `he_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `he_posts`
--
ALTER TABLE `he_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `he_users`
--
ALTER TABLE `he_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
