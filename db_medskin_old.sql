-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2016 at 01:24 PM
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
-- Table structure for table `ms_comment`
--

CREATE TABLE IF NOT EXISTS `ms_comment` (
  `id_comment` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_news` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `comment` longtext NOT NULL,
  `date_comment` datetime NOT NULL,
  PRIMARY KEY (`id_comment`)
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
  `image_news` varchar(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `news` longtext NOT NULL,
  `date_news` datetime NOT NULL,
  `view` int(11) NOT NULL,
  PRIMARY KEY (`id_news`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ms_news`
--

INSERT INTO `ms_news` (`id_news`, `id_doctor`, `image_news`, `title`, `news`, `date_news`, `view`) VALUES
(1, 2, 'assets/asset_default/image/a.png', 'Lorem Ipsum', ' Lorem ipsum dolor sil amet Lorem ipsum dolor sil ametLorem ipsum dolor sil amet Lorem ipsum dolor sil ametLorem ipsum dolor sil amet Lorem ipsum dolor sil amet', '2016-09-22 00:00:00', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ms_user`
--

INSERT INTO `ms_user` (`id_user`, `username`, `password`, `email`, `full_name`, `avatar`, `address`, `city`, `province`, `experience`, `birthday`, `permission`, `status_user`, `date_register`, `date_login`, `love`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'adminmedskin@gmail.com', 'adminmedskin', 'assets/images/user/cartoon-doctor-stethoscope-vector-illustration-30595681.jpg', 'admin', 'jakarta', 'Aceh', 'Tidak  Ada', '0000-00-00', 1, 1, '2016-08-18 07:35:37', '0000-00-00 00:00:00', 1),
(2, 'fiedya', 'a8f5f167f44f4964e6c998dee827110c', 'fiedya@gmail.com', 'dr. Fiedya Wati Kusuma, Sp.KK', '', '', 'Tangerang', 'Banten', '', '0000-00-00', 2, 1, '2016-09-22 00:00:00', '0000-00-00 00:00:00', 0),
(3, 'rani', 'a8f5f167f44f4964e6c998dee827110c', 'rpmhslg@gmail.com', 'Rani Putri Merliasari', '', '', '', '', '', '1995-08-17', 3, 1, '2016-09-22 00:00:00', '0000-00-00 00:00:00', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
