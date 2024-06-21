-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2024 at 01:12 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `username`, `message`, `timestamp`) VALUES
(5, 'user1', 'Hi, how are u doing?', '2024-06-21 08:56:51'),
(6, 'user2', 'Im fine thanks', '2024-06-21 08:57:01'),
(7, 'user1', 'I cant do a single **** on my assignment', '2024-06-21 08:58:59'),
(24, 'user1', '****', '2024-06-21 09:24:02'),
(25, 'user3', 'what?', '2024-06-21 09:26:29'),
(26, 'user2', '****', '2024-06-21 10:24:41'),
(27, 'user1', 'Test offensive words', '2024-06-21 10:59:57'),
(28, 'user1', '****', '2024-06-21 11:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `offensive_words`
--

CREATE TABLE `offensive_words` (
  `id` int(11) NOT NULL,
  `word` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offensive_words`
--

INSERT INTO `offensive_words` (`id`, `word`) VALUES
(4, 'shit'),
(5, 'bastard'),
(6, 'bitch'),
(7, 'asshole'),
(8, 'nigga'),
(9, 'stupid'),
(10, 'idiot'),
(11, 'fool'),
(12, 'dumb'),
(13, 'bullshit'),
(14, 'ass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offensive_words`
--
ALTER TABLE `offensive_words`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `offensive_words`
--
ALTER TABLE `offensive_words`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
