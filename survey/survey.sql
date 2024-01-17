-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 10:02 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `ans_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `ans` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `type` enum('text','radio') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question`, `type`) VALUES
(1, 'What is your gender?', 'text'),
(2, 'How old are you?', 'text'),
(3, 'What year are you currently studying in?', 'text'),
(4, 'What is the name of your University?', 'text'),
(5, 'Computer science is a field with a lot of job opportunities.', 'radio'),
(6, 'Computer Science allows students to solve complex problems using technology.', 'radio'),
(7, 'Computer science is a fast-growing field that is constantly evolving.', 'radio'),
(8, 'Computer science offers the chance to\r\nwork with cutting-edge technology.', 'radio'),
(9, 'Computer science is a lucrative career path with high earning potential.', 'radio'),
(10, 'Computer science allows students to\r\ncreate innovative and impactful products that can change people lives. ', 'radio'),
(11, 'Computer science is a challenging field.', 'radio'),
(12, 'Computer science skills are in high\r\ndemand across many industries, not just\r\ntech.', 'radio'),
(13, 'Computer science provides opportunities\r\nfor remote work and flexible schedules.', 'radio'),
(14, 'Computer science can be a rewarding field for those who enjoy problem-solving and\r\nlogical thinking.', 'radio');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
