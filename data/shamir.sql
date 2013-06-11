-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2013 at 04:24 PM
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
  `input_date` datetime DEFAULT NULL,
  `status_record` char(1) DEFAULT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `lt_city`
--

INSERT INTO `lt_city` (`city_id`, `city_name`, `user_input`, `input_date`, `status_record`) VALUES
(1, 'Jakarta', 'ADMIN', '2013-06-09 00:00:00', 'A'),
(2, 'Bogor', 'ADMIN', '2013-06-09 00:00:00', 'A'),
(3, 'Depok', 'ADMIN', '2013-06-09 00:00:00', 'A'),
(4, 'Tangerang', 'ADMIN', '2013-06-09 00:00:00', 'A'),
(5, 'Bekasi', 'ADMIN', '2013-06-09 00:00:00', 'A'),
(6, 'Bandung', 'ADMIN', '2013-06-09 00:00:00', 'A'),
(7, 'Medan', 'ADMIN', '2013-06-09 00:00:00', 'A');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lt_class_category`
--

INSERT INTO `lt_class_category` (`class_category_id`, `class_category_name`, `parent_id`, `user_input`, `input_date`, `status_record`) VALUES
(1, 'Mathematics', NULL, 'ADMIN', '2013-06-09 19:00:07', 'A'),
(2, 'Physics', NULL, 'ADMIN', '2013-06-09 19:00:07', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `lt_discussion_category`
--

CREATE TABLE IF NOT EXISTS `lt_discussion_category` (
  `discussion_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `discussion_category_name` varchar(50) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `user_input` varchar(50) DEFAULT NULL,
  `input_date` datetime DEFAULT NULL,
  `status_record` char(1) DEFAULT NULL,
  PRIMARY KEY (`discussion_category_id`),
  KEY `parent_id` (`parent_id`),
  KEY `class_id` (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `lt_discussion_category`
--

INSERT INTO `lt_discussion_category` (`discussion_category_id`, `discussion_category_name`, `class_id`, `parent_id`, `user_input`, `input_date`, `status_record`) VALUES
(1, 'Kalkulus Forum', 1, NULL, 'ADMIN', '2013-06-11 18:00:33', 'A'),
(2, 'Integral', NULL, 1, 'ADMIN', '2013-06-11 18:13:05', 'A'),
(3, 'Aljabar linear Forum', 2, NULL, 'ADMIN', '2013-06-11 18:35:18', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `lt_user_type`
--

CREATE TABLE IF NOT EXISTS `lt_user_type` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(50) NOT NULL,
  `user_input` varchar(50) DEFAULT NULL,
  `input_date` datetime DEFAULT NULL,
  `status_record` char(1) DEFAULT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `lt_user_type`
--

INSERT INTO `lt_user_type` (`user_type_id`, `user_type`, `user_input`, `input_date`, `status_record`) VALUES
(1, 'Student', 'ADMIN', '2013-06-09 00:00:00', 'A'),
(2, 'Lecturer', 'ADMIN', '2013-06-09 00:00:00', 'A'),
(3, 'Admin', 'ADMIN', '2013-06-09 00:00:00', 'A'),
(4, 'Staff', 'ADMIN', '2013-06-09 00:00:00', 'A');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `ms_account`
--

INSERT INTO `ms_account` (`account_id`, `user_name`, `password`, `profile_id`, `user_type_id`, `user_input`, `input_date`, `status_record`) VALUES
(1, 'ADMIN', 'f865b53623b121fd34ee5426c792e5c33af8c227', 1, 3, 'ADMIN', '0000-00-00 00:00:00', 'A'),
(2, 'student1', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 2, 1, 'ADMIN', '0000-00-00 00:00:00', 'A'),
(3, 'student2', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 3, 1, 'ADMIN', '0000-00-00 00:00:00', 'A'),
(4, 'student3', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 4, 1, 'ADMIN', '0000-00-00 00:00:00', 'A'),
(5, 'student4', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 5, 1, 'ADMIN', '0000-00-00 00:00:00', 'A'),
(6, 'student5', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 6, 1, 'ADMIN', '0000-00-00 00:00:00', 'A'),
(7, 'lecturer1', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 7, 2, 'ADMIN', '0000-00-00 00:00:00', 'A'),
(8, 'lecturer2', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 8, 2, 'ADMIN', '0000-00-00 00:00:00', 'A'),
(9, 'lecturer3', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 9, 2, 'ADMIN', '0000-00-00 00:00:00', 'A'),
(10, 'lecturer4', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 10, 2, 'ADMIN', '0000-00-00 00:00:00', 'A'),
(11, 'lecturer5', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 11, 2, 'ADMIN', '0000-00-00 00:00:00', 'A'),
(12, 'DeimonDB', '03de6c570bfe24bfc328ccd7ca46b76eadaf4334', 12, 3, 'ADMIN', '2013-06-09 19:15:16', 'A'),
(13, 'aongko', 'bc23e740a2bfa341d89adb5b8df6bd1861d7d801', 13, 3, 'ADMIN', '2013-06-09 19:15:47', 'A');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ms_class`
--

INSERT INTO `ms_class` (`class_id`, `class_name`, `class_category_id`, `max_capacity`, `description`, `date_start`, `date_end`, `lecturer_id`, `front_image`, `user_input`, `input_date`, `status_record`) VALUES
(1, 'Kalkulus', 1, 300, 'deskripsi dari kelas Kalkulus', NULL, NULL, 7, 'kalkulus.jpg', 'ADMIN', '2013-06-09 19:08:08', 'A'),
(2, 'Aljabar Linear', 1, 300, 'deskripsi dari kelas Aljabar Linear', NULL, NULL, 8, 'aljabarlinear.jpg', 'ADMIN', '2013-06-09 19:08:08', 'A'),
(3, 'Mekanika 1', 2, 300, 'deskripsi dari kelas Mekanika 1', NULL, NULL, 9, 'mekanika1.jpg', 'ADMIN', '2013-06-09 19:08:08', 'A'),
(4, 'Mekanika 2', 2, 300, 'deskripsi dari kelas Mekanika 2', NULL, NULL, 10, 'mekanika2.jpg', 'ADMIN', '2013-06-09 19:08:08', 'A');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `ms_profile`
--

INSERT INTO `ms_profile` (`profile_id`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `phone1`, `phone2`, `address`, `email1`, `email2`, `city_id`, `motto`, `user_input`, `input_date`, `status_record`) VALUES
(1, 'Admin', NULL, NULL, '0000-00-00 00:00:00', '0123456789', NULL, 'Binus Kemanggisan', 'admin@shamir.com', NULL, 1, NULL, 'ADMIN', '2013-06-09 18:24:27', 'A'),
(2, 'Student', NULL, '1', '0000-00-00 00:00:00', '1000000001', NULL, 'Binus Kemanggisan', 'student1@email.com', NULL, 1, NULL, 'ADMIN', '2013-06-09 18:24:27', 'A'),
(3, 'Student', NULL, '2', '0000-00-00 00:00:00', '1000000002', NULL, 'Binus Kemanggisan', 'student2@email.com', NULL, 1, NULL, 'ADMIN', '2013-06-09 18:24:27', 'A'),
(4, 'Student', NULL, '3', '0000-00-00 00:00:00', '1000000003', NULL, 'Binus Kemanggisan', 'student3@email.com', NULL, 1, NULL, 'ADMIN', '2013-06-09 18:24:27', 'A'),
(5, 'Student', NULL, '4', '0000-00-00 00:00:00', '1000000004', NULL, 'Binus Kemanggisan', 'student4@email.com', NULL, 1, NULL, 'ADMIN', '2013-06-09 18:24:27', 'A'),
(6, 'Student', NULL, '5', '0000-00-00 00:00:00', '1000000005', NULL, 'Binus Kemanggisan', 'student5@email.com', NULL, 1, NULL, 'ADMIN', '2013-06-09 18:24:27', 'A'),
(7, 'Lecturer', NULL, '1', '0000-00-00 00:00:00', '2000000001', NULL, 'Binus Kemanggisan', 'lecturer1@shamir.com', NULL, 1, NULL, 'ADMIN', '2013-06-09 18:24:27', 'A'),
(8, 'Lecturer', NULL, '2', '0000-00-00 00:00:00', '2000000002', NULL, 'Binus Kemanggisan', 'lecturer2@shamir.com', NULL, 1, NULL, 'ADMIN', '2013-06-09 18:24:27', 'A'),
(9, 'Lecturer', NULL, '3', '0000-00-00 00:00:00', '2000000003', NULL, 'Binus Kemanggisan', 'lecturer3@shamir.com', NULL, 1, NULL, 'ADMIN', '2013-06-09 18:24:27', 'A'),
(10, 'Lecturer', NULL, '4', '0000-00-00 00:00:00', '2000000004', NULL, 'Binus Kemanggisan', 'lecturer4@shamir.com', NULL, 1, NULL, 'ADMIN', '2013-06-09 18:24:27', 'A'),
(11, 'Lecturer', NULL, '5', '0000-00-00 00:00:00', '2000000005', NULL, 'Binus Kemanggisan', 'lecturer5@shamir.com', NULL, 1, NULL, 'ADMIN', '2013-06-09 18:24:27', 'A'),
(12, 'Teddy', 'Budiono', 'Hermawan', '1993-05-14 00:00:00', '08126072607', NULL, 'Jln Badak No 16', 'caladbolg_student@hotmail.com', NULL, 7, NULL, 'ADMIN', '2013-06-09 19:12:46', 'A'),
(13, 'Andrew', NULL, 'Ongko', '1993-05-07 00:00:00', '08197255755', NULL, 'Jln Garuda No. 10', 'Andrew.Ongko@gmail.com', NULL, 7, NULL, 'ADMIN', '2013-06-09 19:12:46', 'A');

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
  PRIMARY KEY (`class_id`,`account_id`),
  KEY `account_id` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tr_class`
--

INSERT INTO `tr_class` (`class_id`, `account_id`, `date_start`, `date_finish`, `last_accessed`, `user_input`, `input_date`, `status_record`) VALUES
(1, 3, NULL, NULL, NULL, 'DeimonDB', '2013-06-09 19:24:38', NULL),
(1, 12, NULL, NULL, NULL, 'DeimonDB', '2013-06-09 19:45:32', NULL),
(1, 13, NULL, NULL, NULL, 'aongko', '2013-06-11 21:06:15', NULL),
(2, 12, NULL, NULL, NULL, 'DeimonDB', '2013-06-10 01:23:05', NULL),
(3, 12, NULL, NULL, NULL, 'DeimonDB', '2013-06-10 21:01:58', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tr_discussion`
--

INSERT INTO `tr_discussion` (`discussion_id`, `discussion_title`, `discussion_category_id`, `created_by`, `created_date`, `user_input`, `input_date`, `status_record`) VALUES
(1, 'Tester', 1, 12, '2013-06-11 18:48:32', 'ADMIN(DeimonDB)', '2013-06-11 18:48:32', 'A'),
(2, 'Waw', 1, 12, '2013-06-11 21:01:53', 'DeimonDB', '2013-06-11 21:01:53', 'A'),
(3, 'wooow', 1, 12, '2013-06-11 21:03:36', 'DeimonDB', '2013-06-11 21:03:36', 'A'),
(4, 'WTF?!', 1, 13, '2013-06-11 21:06:33', 'aongko', '2013-06-11 21:06:33', 'A');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tr_post`
--

INSERT INTO `tr_post` (`post_id`, `account_id`, `created_date`, `content`, `user_input`, `input_date`, `status_record`, `discussion_id`, `class_id`) VALUES
(1, 12, '2013-06-10 02:06:38', 'lheaaa', 'DeimonDB', '2013-06-10 03:02:11', 'A', NULL, 1),
(2, 12, '2013-06-10 03:15:37', 'nyihihihi', 'DeimonDB', '2013-06-10 03:15:37', 'A', NULL, 1),
(3, 12, '2013-06-10 03:16:34', 'hahahahahahha', 'DeimonDB', '2013-06-10 03:16:34', 'A', NULL, 1),
(4, 12, '2013-06-10 03:24:08', 'tes\r\n123\r\n456', 'DeimonDB', '2013-06-10 03:24:08', 'A', NULL, 1),
(5, 12, '2013-06-10 03:29:06', 'coba nambahin', 'DeimonDB', '2013-06-10 03:29:06', 'A', NULL, 2),
(6, 12, '2013-06-10 21:02:11', 'asfdasfsa', 'DeimonDB', '2013-06-10 21:02:11', 'A', NULL, 3),
(7, 12, '2013-06-10 21:05:32', 'hohoho', 'DeimonDB', '2013-06-10 21:05:32', 'A', NULL, 3),
(8, 12, '2013-06-11 19:25:09', 'hais', 'ADMIN(DeimonDB)', '2013-06-11 19:25:09', 'A', 1, NULL),
(9, 12, '2013-06-11 21:01:53', 'Fantastic Baby', 'DeimonDB', '2013-06-11 21:01:53', 'A', 2, NULL),
(10, 12, '2013-06-11 21:03:36', 'fantasticcccc\r\n', 'DeimonDB', '2013-06-11 21:03:36', 'A', 3, NULL),
(11, 13, '2013-06-11 21:06:33', 'apa ini?', 'aongko', '2013-06-11 21:06:33', 'A', 4, NULL);

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
  ADD CONSTRAINT `lt_discussion_category_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `lt_discussion_category` (`discussion_category_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lt_discussion_category_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `ms_class` (`class_id`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `tr_class_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `ms_class` (`class_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_class_ibfk_4` FOREIGN KEY (`account_id`) REFERENCES `ms_account` (`account_id`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `tr_rating_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `ms_account` (`account_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_rating_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `ms_class` (`class_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_rating_ibfk_3` FOREIGN KEY (`session_id`) REFERENCES `ms_session` (`session_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_rating_ibfk_4` FOREIGN KEY (`post_id`) REFERENCES `tr_post` (`post_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_rating_ibfk_5` FOREIGN KEY (`video_id`) REFERENCES `tr_video` (`video_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tr_video`
--
ALTER TABLE `tr_video`
  ADD CONSTRAINT `tr_video_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `ms_account` (`account_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_video_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `ms_session` (`session_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
