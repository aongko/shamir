-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2013 at 12:18 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shamir`
--

-- --------------------------------------------------------

--
-- Table structure for table `lt_city`
--

CREATE TABLE IF NOT EXISTS `lt_city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(50) NOT NULL,
  `user_input` varchar(50) DEFAULT NULL,
  `input_date` date DEFAULT NULL,
  `status_record` char(1) DEFAULT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lt_class_category`
--

CREATE TABLE IF NOT EXISTS `lt_class_category` (
  `class_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_category_name` varchar(50) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `user_input` varchar(50) DEFAULT NULL,
  `input_date` datetime DEFAULT NULL,
  `status_record` char(1) DEFAULT NULL,
  PRIMARY KEY (`class_category_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lt_discussion_category`
--

CREATE TABLE IF NOT EXISTS `lt_discussion_category` (
  `discussion_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `discussion_category_name` varchar(50) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `user_input` varchar(50) DEFAULT NULL,
  `input_date` datetime DEFAULT NULL,
  `status_record` char(1) DEFAULT NULL,
  PRIMARY KEY (`discussion_category_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lt_user_type`
--

CREATE TABLE IF NOT EXISTS `lt_user_type` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(50) NOT NULL,
  `user_input` varchar(50) DEFAULT NULL,
  `input_date` date DEFAULT NULL,
  `status_record` char(1) DEFAULT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ms_account`
--

CREATE TABLE IF NOT EXISTS `ms_account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `user_input` varchar(50) DEFAULT NULL,
  `input_date` datetime DEFAULT NULL,
  `status_record` char(1) DEFAULT NULL,
  PRIMARY KEY (`account_id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `user_type_id` (`user_type_id`),
  KEY `profile_id` (`profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ms_class`
--

CREATE TABLE IF NOT EXISTS `ms_class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(50) NOT NULL,
  `class_category_id` int(11) NOT NULL,
  `max_capacity` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `lecturer_id` int(11) NOT NULL,
  `front_image` varchar(250) NOT NULL,
  `user_input` varchar(50) DEFAULT NULL,
  `input_date` datetime DEFAULT NULL,
  `status_record` char(1) DEFAULT NULL,
  PRIMARY KEY (`class_id`),
  KEY `lecturer_id` (`lecturer_id`),
  KEY `class_category_id` (`class_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ms_profile`
--

CREATE TABLE IF NOT EXISTS `ms_profile` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `date_of_birth` datetime NOT NULL,
  `phone1` varchar(25) NOT NULL,
  `phone2` varchar(25) DEFAULT NULL,
  `address` varchar(250) NOT NULL,
  `email1` varchar(50) NOT NULL,
  `email2` varchar(50) DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `motto` varchar(250) DEFAULT NULL,
  `user_input` varchar(50) DEFAULT NULL,
  `input_date` datetime DEFAULT NULL,
  `status_record` char(1) DEFAULT NULL,
  PRIMARY KEY (`profile_id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ms_session`
--

CREATE TABLE IF NOT EXISTS `ms_session` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `session_name` varchar(50) NOT NULL,
  `session_number` int(11) NOT NULL,
  `front_image` varchar(250) DEFAULT NULL,
  `description` varchar(250) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `user_input` varchar(50) DEFAULT NULL,
  `input_date` datetime DEFAULT NULL,
  `status_record` char(1) DEFAULT NULL,
  PRIMARY KEY (`session_id`),
  KEY `class_id` (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tr_assignment`
--

CREATE TABLE IF NOT EXISTS `tr_assignment` (
  `assignment_id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `content` varchar(10000) NOT NULL,
  `file_id` int(11) DEFAULT NULL,
  `user_input` varchar(50) DEFAULT NULL,
  `input_date` datetime DEFAULT NULL,
  `status_record` char(1) DEFAULT NULL,
  PRIMARY KEY (`assignment_id`),
  KEY `created_by` (`created_by`),
  KEY `file_id` (`file_id`),
  KEY `session_id` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tr_assignment_detail`
--

CREATE TABLE IF NOT EXISTS `tr_assignment_detail` (
  `assignment_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `content` varchar(10000) DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL,
  `user_input` varchar(50) DEFAULT NULL,
  `input_date` datetime DEFAULT NULL,
  `status_record` char(1) DEFAULT NULL,
  PRIMARY KEY (`assignment_detail_id`),
  KEY `account_id` (`account_id`),
  KEY `file_id` (`file_id`),
  KEY `assignment_id` (`assignment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tr_class`
--

CREATE TABLE IF NOT EXISTS `tr_class` (
  `class_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_finish` datetime DEFAULT NULL,
  `last_accessed` datetime DEFAULT NULL,
  `user_input` varchar(50) DEFAULT NULL,
  `input_date` datetime DEFAULT NULL,
  `status_record` char(1) DEFAULT NULL,
  PRIMARY KEY (`class_id`),
  KEY `account_id` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tr_class_review`
--

CREATE TABLE IF NOT EXISTS `tr_class_review` (
  `class_review_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `content` varchar(250) NOT NULL,
  `user_input` varchar(50) DEFAULT NULL,
  `input_date` datetime DEFAULT NULL,
  `status_record` char(1) DEFAULT NULL,
  PRIMARY KEY (`class_review_id`),
  KEY `account_id` (`account_id`),
  KEY `class_id` (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tr_discussion`
--

CREATE TABLE IF NOT EXISTS `tr_discussion` (
  `discussion_id` int(11) NOT NULL AUTO_INCREMENT,
  `discussion_title` varchar(50) NOT NULL,
  `discussion_category_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `user_input` varchar(50) DEFAULT NULL,
  `input_date` datetime DEFAULT NULL,
  `status_record` char(1) DEFAULT NULL,
  PRIMARY KEY (`discussion_id`),
  KEY `created_by` (`created_by`),
  KEY `discussion_category_id` (`discussion_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tr_files`
--

CREATE TABLE IF NOT EXISTS `tr_files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(50) NOT NULL,
  `file_src` varchar(250) NOT NULL,
  `added_by` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  `user_input` varchar(50) DEFAULT NULL,
  `input_date` datetime DEFAULT NULL,
  `status_record` char(1) DEFAULT NULL,
  PRIMARY KEY (`file_id`),
  KEY `added_by` (`added_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tr_post`
--

CREATE TABLE IF NOT EXISTS `tr_post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `content` varchar(10000) NOT NULL,
  `user_input` varchar(50) DEFAULT NULL,
  `input_date` datetime DEFAULT NULL,
  `status_record` char(1) DEFAULT NULL,
  `discussion_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `discussion_id` (`discussion_id`),
  KEY `class_id` (`class_id`),
  KEY `account_id` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tr_rating`
--

CREATE TABLE IF NOT EXISTS `tr_rating` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `star` int(11) NOT NULL,
  `rate_date` datetime NOT NULL,
  `user_input` varchar(50) DEFAULT NULL,
  `input_date` datetime DEFAULT NULL,
  `status_record` char(1) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`rating_id`),
  KEY `account_id` (`account_id`),
  KEY `class_id` (`class_id`),
  KEY `session_id` (`session_id`),
  KEY `post_id` (`post_id`),
  KEY `video_id` (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tr_video`
--

CREATE TABLE IF NOT EXISTS `tr_video` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_name` varchar(50) NOT NULL,
  `video_url` varchar(250) NOT NULL,
  `added_by` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  `user_input` varchar(50) DEFAULT NULL,
  `input_date` datetime DEFAULT NULL,
  `status_record` char(1) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`video_id`),
  KEY `added_by` (`added_by`),
  KEY `session_id` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lt_class_category`
--
ALTER TABLE `lt_class_category`
  ADD CONSTRAINT `lt_class_category_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `lt_class_category` (`class_category_id`) ON UPDATE CASCADE;

--
-- Constraints for table `lt_discussion_category`
--
ALTER TABLE `lt_discussion_category`
  ADD CONSTRAINT `lt_discussion_category_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `lt_discussion_category` (`discussion_category_id`) ON UPDATE CASCADE;

--
-- Constraints for table `ms_account`
--
ALTER TABLE `ms_account`
  ADD CONSTRAINT `ms_account_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `ms_profile` (`profile_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ms_account_ibfk_2` FOREIGN KEY (`user_type_id`) REFERENCES `lt_user_type` (`user_type_id`) ON UPDATE CASCADE;

--
-- Constraints for table `ms_class`
--
ALTER TABLE `ms_class`
  ADD CONSTRAINT `ms_class_ibfk_1` FOREIGN KEY (`class_category_id`) REFERENCES `lt_class_category` (`class_category_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ms_class_ibfk_2` FOREIGN KEY (`lecturer_id`) REFERENCES `ms_account` (`account_id`) ON UPDATE CASCADE;

--
-- Constraints for table `ms_profile`
--
ALTER TABLE `ms_profile`
  ADD CONSTRAINT `ms_profile_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `lt_city` (`city_id`) ON UPDATE CASCADE;

--
-- Constraints for table `ms_session`
--
ALTER TABLE `ms_session`
  ADD CONSTRAINT `ms_session_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `ms_class` (`class_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tr_assignment`
--
ALTER TABLE `tr_assignment`
  ADD CONSTRAINT `tr_assignment_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `ms_session` (`session_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_assignment_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `ms_account` (`account_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_assignment_ibfk_3` FOREIGN KEY (`file_id`) REFERENCES `tr_files` (`file_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tr_assignment_detail`
--
ALTER TABLE `tr_assignment_detail`
  ADD CONSTRAINT `tr_assignment_detail_ibfk_1` FOREIGN KEY (`assignment_id`) REFERENCES `tr_assignment` (`assignment_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_assignment_detail_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `ms_account` (`account_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_assignment_detail_ibfk_3` FOREIGN KEY (`file_id`) REFERENCES `tr_files` (`file_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tr_class`
--
ALTER TABLE `tr_class`
  ADD CONSTRAINT `tr_class_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `ms_account` (`account_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tr_class_review`
--
ALTER TABLE `tr_class_review`
  ADD CONSTRAINT `tr_class_review_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `ms_class` (`class_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_class_review_ibfk_3` FOREIGN KEY (`account_id`) REFERENCES `ms_account` (`account_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tr_discussion`
--
ALTER TABLE `tr_discussion`
  ADD CONSTRAINT `tr_discussion_ibfk_1` FOREIGN KEY (`discussion_category_id`) REFERENCES `lt_discussion_category` (`discussion_category_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_discussion_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `ms_account` (`account_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tr_files`
--
ALTER TABLE `tr_files`
  ADD CONSTRAINT `tr_files_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `ms_account` (`account_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tr_post`
--
ALTER TABLE `tr_post`
  ADD CONSTRAINT `tr_post_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `ms_account` (`account_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_post_ibfk_2` FOREIGN KEY (`discussion_id`) REFERENCES `tr_discussion` (`discussion_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_post_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `ms_class` (`class_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tr_rating`
--
ALTER TABLE `tr_rating`
  ADD CONSTRAINT `tr_rating_ibfk_5` FOREIGN KEY (`video_id`) REFERENCES `tr_video` (`video_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_rating_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `ms_account` (`account_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_rating_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `ms_class` (`class_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_rating_ibfk_3` FOREIGN KEY (`session_id`) REFERENCES `ms_session` (`session_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_rating_ibfk_4` FOREIGN KEY (`post_id`) REFERENCES `tr_post` (`post_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tr_video`
--
ALTER TABLE `tr_video`
  ADD CONSTRAINT `tr_video_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `ms_session` (`session_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_video_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `ms_account` (`account_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
