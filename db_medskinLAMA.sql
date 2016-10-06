-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2016 at 08:28 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_medskin`
--

-- --------------------------------------------------------

--
-- Table structure for table `ms_chat`
--

CREATE TABLE IF NOT EXISTS `ms_chat` (
  `id_chat` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_chatroom` bigint(20) NOT NULL,
  `chat` longtext NOT NULL,
  `status_chat` tinyint(1) NOT NULL COMMENT '1: Unread, 2: Read',
  `image_chat` varchar(200) NOT NULL,
  `date_chat` datetime NOT NULL,
  PRIMARY KEY (`id_chat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ms_chatroom`
--

CREATE TABLE IF NOT EXISTS `ms_chatroom` (
  `id_chatroom` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_doctor` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `date_chatroom` datetime NOT NULL,
  PRIMARY KEY (`id_chatroom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ms_love`
--

CREATE TABLE IF NOT EXISTS `ms_love` (
  `id_love` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_doctor` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `date_love` date NOT NULL,
  PRIMARY KEY (`id_love`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ms_medicalrecord`
--

CREATE TABLE IF NOT EXISTS `ms_medicalrecord` (
  `id_medicalrecord` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `date_medicalrecord` date NOT NULL,
  `anamesis` longtext NOT NULL,
  `check_result` longtext NOT NULL,
  `plan_to_do` longtext NOT NULL,
  `act_medical` longtext NOT NULL,
  `other_medical` longtext NOT NULL,
  `date_insert` datetime NOT NULL,
  PRIMARY KEY (`id_medicalrecord`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ms_news`
--

CREATE TABLE IF NOT EXISTS `ms_news` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `id_doctor` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `image_news` varchar(200) NOT NULL,
  `news` longtext NOT NULL,
  `date_news` datetime NOT NULL,
  `status_news` tinyint(4) NOT NULL COMMENT '1: Pending, 2: Published',
  `view` int(11) NOT NULL,
  PRIMARY KEY (`id_news`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ms_read_news`
--

CREATE TABLE IF NOT EXISTS `ms_read_news` (
  `id_read_news` int(11) NOT NULL AUTO_INCREMENT,
  `id_news` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_read_news` datetime NOT NULL,
  PRIMARY KEY (`id_read_news`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ms_user`
--

CREATE TABLE IF NOT EXISTS `ms_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `address` longtext NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `experience` longtext NOT NULL,
  `birthday` date NOT NULL,
  `permission` tinyint(1) NOT NULL COMMENT '1: Admin, 2: Doctor, 3: Pasien',
  `status_user` tinyint(1) NOT NULL COMMENT '0: Nonactive, 1: Active, 2: Banned',
  `date_register` datetime NOT NULL,
  `date_login` datetime NOT NULL,
  `love` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
