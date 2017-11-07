-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 07, 2017 at 11:33 AM
-- Server version: 5.7.15-log
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_regist`
--

-- --------------------------------------------------------

--
-- Table structure for table `teacher_logindata`
--

CREATE TABLE `teacher_logindata` (
  `id` int(11) NOT NULL,
  `pwd` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher_logindata`
--

INSERT INTO `teacher_logindata` (`id`, `pwd`) VALUES
(11111, 'pass@11111');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `id_time` int(11) NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'Gets the student''s ID, then stores it',
  `subject_id` varchar(6) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Gets the subject''s ID. Will be useful.',
  `time` varchar(5) COLLATE utf8_unicode_ci NOT NULL COMMENT 'time?'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `student_surname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `student_class` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `student_classno` int(11) NOT NULL,
  `year` varchar(4) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id_time`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `id_time` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
