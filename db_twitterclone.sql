-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2023 at 07:27 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_twitterclone`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id_comments` int(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `image_url` varchar(55) NOT NULL,
  `id_user_tweeted` int(255) NOT NULL,
  `user_commenter` varchar(55) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id_comments`, `comment`, `image_url`, `id_user_tweeted`, `user_commenter`, `user_email`, `tags`) VALUES
(80, '#2\r\n', '', 131, 'collin', 'collin@gmail.com', '#2\r\n'),
(81, 'asghjk #jasn', '', 131, 'collin', 'collin@gmail.com', '#jasn'),
(82, 'asjnd', '', 131, 'collin', 'collin@gmail.com', ''),
(83, 'uh', '', 131, 'collin', 'collin@gmail.com', ''),
(84, 'ejbhfnjml,', '', 131, 'collin', 'collin@gmail.com', ''),
(85, '#jas\r\n', '', 132, 'collin', 'collin@gmail.com', '#jas\r\n'),
(86, '#ayam\r\n', '', 131, 'ayam', 'ayam@gmail.com', '#ayam\r\n'),
(87, '#kece\r\n\r\n', '', 132, 'ayam', 'ayam@gmail.com', '#kece\r\n\r\n'),
(88, 'KINDA SHESH #SHESH', '', 133, 'ayam', 'ayam@gmail.com', '#SHESH'),
(89, 'agydbn', '', 132, 'ayam', 'ayam@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE `tweets` (
  `id_tweets` int(255) NOT NULL,
  `captions` varchar(255) NOT NULL,
  `image_url` varchar(55) NOT NULL,
  `by_user` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `by_email` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`id_tweets`, `captions`, `image_url`, `by_user`, `tags`, `by_email`) VALUES
(131, 'aksdahdsasia #1', '', 'collin', '#1', 'collin@gmail.com'),
(132, 'hsud hausiasd i #oooo', '', 'collin', '#oooo', 'collin@gmail.com'),
(133, 'ajsbdas \r\n', 'maddog.jpeg', 'ayam', '', 'ayam@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `bio` text DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `email`, `password`, `bio`, `image`) VALUES
(49, 'collin', 'collin@gmail.com', 'bfb21ec168025e0c4629fd11bbf279fb', 'this user rather lazy to set the bio :(', 'asdahsd.png'),
(50, 'ayam', 'ayam@gmail.com', 'bffa783a022fe2d98692014dda6d7a4c', 'asdasdbn', 'Logo bg white.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comments`);

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id_tweets`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comments` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id_tweets` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
