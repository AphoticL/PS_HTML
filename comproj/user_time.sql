-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Nov 06, 2017 at 05:31 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `user_time`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `time`
-- 

CREATE TABLE `time` (
  `id_time` int(11) NOT NULL auto_increment,
  `student_id` int(11) NOT NULL COMMENT 'Gets the student''s ID, then stores it',
  `subject_id` varchar(6) collate utf8_unicode_ci NOT NULL COMMENT 'Gets the subject''s ID. Will be useful.',
  `time` varchar(5) collate utf8_unicode_ci NOT NULL COMMENT 'time?',
  PRIMARY KEY  (`id_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `time`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `user`
-- 

CREATE TABLE `user` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `student_surname` varchar(50) collate utf8_unicode_ci NOT NULL,
  `student_class` varchar(5) collate utf8_unicode_ci NOT NULL,
  `student_classno` int(11) NOT NULL,
  `year` varchar(4) collate utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `user`
-- 

