-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2013 at 07:44 AM
-- Server version: 5.1.36-community-log
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(100) NOT NULL,
  `subject_id` varchar(100) NOT NULL,
  `teacher_id` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `course_id`, `subject_id`, `teacher_id`, `student_id`) VALUES
(5, 'BSIS 3B', 'Fundamentals of Business Management', '1', 0),
(4, 'BSIS -3A', 'Fundamentals of Business Management', '1', 13),
(7, 'BSIS -3A', 'DBMS', '2', 13),
(9, 'BSIS 3B', 'Fundamentals of Business Management', '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `cys` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `major` varchar(100) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `cys`, `department`, `major`) VALUES
(5, 'BSIS -3A', 'CIT', ''),
(6, 'BSIS 3B', 'College of Industrial Technology', 'None'),
(7, 'BSIS 3C', 'College of Industrial Technology', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `dep_id` int(11) NOT NULL AUTO_INCREMENT,
  `incharge` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  PRIMARY KEY (`dep_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dep_id`, `incharge`, `title`, `department`) VALUES
(4, 'Dr. Antonio Derajah', 'Dean', 'College of Industrial Technology'),
(5, 'Prof. Luisa Tejada', 'Dean', 'School of Arts And Sciences'),
(6, 'hmmm ', 'Dean', 'College of Education');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `floc` varchar(500) NOT NULL,
  `fdatein` varchar(200) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `floc`, `fdatein`, `fdesc`, `teacher_id`, `class_id`, `fname`) VALUES
(18, 'uploads/2640_File_CHAPTER 2.docx', '2013-03-24 14:38:20', 'i dont know', 1, 4, 'chapter 2'),
(17, 'uploads/2682_File_Chapter1.docx', '2013-03-24 13:40:58', 'i dont know', 1, 4, 'chapter 1'),
(26, 'uploads/3079_File_chapter_2_sausa.docx', '2013-03-25 08:47:16', 'Searching the Web', 2, 7, 'Chapter 2 - Searching the Web'),
(29, 'uploads/7258_File_INPUTTING DATA IN OTHER WAYS.docx', '2013-03-25 08:50:19', 'Inputting Data in Other Ways', 2, 7, 'Chapter 3B - Inputting Data in Other Ways'),
(25, 'uploads/8728_File_lesson1a.docx', '2013-03-25 08:46:46', 'Computer in our World', 2, 7, 'Chapter 1 - Computer in our World'),
(28, 'uploads/4322_File_fnal doc.chap.3.docx', '2013-03-25 08:49:42', 'The Keyboard and Mouse', 2, 7, 'Chapter 3A - The Keyboard and Mouse'),
(30, 'uploads/9448_File_Chapter 4B.docx', '2013-03-25 08:55:30', 'Printing', 2, 7, 'Chapter 4B-printing');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `cys` varchar(100) NOT NULL,
  `subject_id` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `firstname`, `lastname`, `middle_name`, `cys`, `subject_id`, `teacher_id`, `username`, `password`, `location`) VALUES
(17, 'Christian', 'Sausa', 'Ambot', '', '', 0, 'Christian', 'Sausa', 'uploads/letra-n-md.png'),
(15, 'Brian Paul', 'Sablan', 'jkl', '', '', 0, 'xiaboh', 'xiaboh', 'uploads/images (3).jpg'),
(16, 'Sherwin', 'Laylon', 'b', '', '', 0, 'Sherwin', 'agi', 'uploads/443px-Rasmus_Lerdorf_cropped.jpg'),
(13, 'john kevin', 'lorayna', 'amos', 'BSIS -3A', 'DBMS', 2, '100175', 'teph', 'uploads/735067_452259954828103_1940229060_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_code` varchar(100) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_title`, `category`) VALUES
(5, 'IS 123', 'Fundamentals of Business Management', 'Major'),
(7, 'IS 301', 'DBMS', 'Major');

-- --------------------------------------------------------

--
-- Table structure for table `sws`
--

CREATE TABLE IF NOT EXISTS `sws` (
  `sws_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `cys` varchar(100) NOT NULL,
  `subject_id` varchar(100) NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`sws_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `sws`
--

INSERT INTO `sws` (`sws_id`, `student_id`, `teacher_id`, `cys`, `subject_id`, `class_id`) VALUES
(9, 17, 2, 'BSIS -3A', 'DBMS', 7),
(8, 16, 2, 'BSIS -3A', 'DBMS', 7),
(7, 13, 2, 'BSIS -3A', 'DBMS', 7),
(10, 17, 2, 'BSIS -3A', 'DBMS', 9),
(11, 16, 2, 'BSIS -3A', 'DBMS', 9);

-- --------------------------------------------------------

--
-- Table structure for table `sy`
--

CREATE TABLE IF NOT EXISTS `sy` (
  `sy_id` int(11) NOT NULL AUTO_INCREMENT,
  `sy` varchar(100) NOT NULL,
  PRIMARY KEY (`sy_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sy`
--

INSERT INTO `sy` (`sy_id`, `sy`) VALUES
(3, '2012-2013'),
(5, 't');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `username`, `password`, `firstname`, `lastname`, `middlename`, `department`, `student_id`, `location`) VALUES
(1, 'jk', 'jk', 'Jomar', 'Pabuaya', 'smith', 'College of Industrial Technology', 0, 'uploads/images (3).jpg'),
(2, 'chaw', 'pan', 'Charito', 'Puray', 'dela tore', 'College of Industrial Technology', 0, 'uploads/images (3).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_student`
--

CREATE TABLE IF NOT EXISTS `teacher_student` (
  `teacher_student_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  PRIMARY KEY (`teacher_student_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `teacher_student`
--

INSERT INTO `teacher_student` (`teacher_student_id`, `teacher_id`, `student_id`) VALUES
(8, 2, 17),
(7, 2, 16);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_suject`
--

CREATE TABLE IF NOT EXISTS `teacher_suject` (
  `teacher_subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`teacher_subject_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `teacher_suject`
--

INSERT INTO `teacher_suject` (`teacher_subject_id`, `subject_id`, `teacher_id`) VALUES
(12, 5, 2),
(11, 7, 2),
(6, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `firstname`, `lastname`) VALUES
(4, 'john', 'smith', 'john ', 'smith'),
(5, 'sv', 'sv', 'stephanie', 'villanueva'),
(6, 'jkev', 'jkev', 'john kevin', 'lorayna'),
(7, 'jk', 'jkdjakjk', 'jkdkajkj', 'jkjak');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
