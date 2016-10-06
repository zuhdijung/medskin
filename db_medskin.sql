-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2016 at 11:53 AM
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
-- Table structure for table `ms_appointment`
--

CREATE TABLE IF NOT EXISTS `ms_appointment` (
  `id_appointment` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_member` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `date_appointment` date NOT NULL,
  `hour_appointment` time NOT NULL,
  `relation` tinyint(2) NOT NULL COMMENT '1: Self, 2: Other',
  `name` varchar(100) NOT NULL,
  `phone_number` varchar(14) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `love_it` tinyint(4) NOT NULL COMMENT '0:no love, 1: love it',
  `date_born` date NOT NULL,
  `description_disease` longtext NOT NULL,
  `status_appointment` tinyint(2) NOT NULL COMMENT '0: Pending, 1: Approved, 2: Canceled, 3: Done',
  `date_input` datetime NOT NULL,
  PRIMARY KEY (`id_appointment`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ms_appointment`
--

INSERT INTO `ms_appointment` (`id_appointment`, `id_member`, `id_doctor`, `date_appointment`, `hour_appointment`, `relation`, `name`, `phone_number`, `gender`, `love_it`, `date_born`, `description_disease`, `status_appointment`, `date_input`) VALUES
(1, 3, 2, '2016-09-30', '19:00:00', 1, 'Rani Putri Merliasari', '087889549681', 2, 1, '1995-08-17', 'Pusing Pala Barbie', 3, '2016-09-30 10:11:45'),
(2, 3, 2, '2016-10-03', '18:30:00', 1, 'Rani Putri Merliasari', '087889549681', 2, 1, '1995-08-17', 'Pala berbie pusyiiing lagi cin', 3, '2016-10-02 16:38:15'),
(3, 3, 2, '2016-10-05', '11:50:00', 1, 'Rani Putri Merliasari', '081234512345', 2, 0, '1995-08-17', 'pala berbie puciiing lagi cin', 2, '2016-10-04 09:56:59'),
(4, 3, 2, '2016-10-06', '13:00:00', 1, 'Rani Putri Merliasari', '081234512345', 2, 1, '1995-08-17', 'pening cekali palanya', 3, '2016-10-04 13:43:44'),
(5, 3, 2, '2016-10-27', '11:40:00', 1, 'Rani Putri Merliasari', '081234512345', 2, 0, '1995-08-17', 'atit gigi', 2, '2016-10-05 16:14:34'),
(6, 3, 2, '2016-10-07', '11:50:00', 1, 'Rani Putri Merliasari', '087889549681', 2, 0, '1995-08-17', 'Atit gigi', 0, '2016-10-06 11:17:32');

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
  `id_member` int(11) NOT NULL,
  `date_chatroom` datetime NOT NULL,
  PRIMARY KEY (`id_chatroom`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ms_chatroom`
--

INSERT INTO `ms_chatroom` (`id_chatroom`, `id_doctor`, `id_member`, `date_chatroom`) VALUES
(1, 2, 3, '2016-10-03 09:52:45');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `ms_comment`
--

INSERT INTO `ms_comment` (`id_comment`, `id_news`, `id_user`, `comment`, `date_comment`) VALUES
(1, 2, 2, 'ini berita apaan sih? Nggak jelas? hufth', '2016-09-28 10:58:59'),
(2, 2, 2, 'test comment doang', '2016-09-28 11:00:24'),
(3, 2, 2, 'test lagi', '2016-09-28 11:01:21'),
(4, 2, 2, 'test', '2016-09-28 11:05:32'),
(5, 2, 2, 'cuma test lagi', '2016-09-28 11:06:03'),
(6, 2, 2, 'just send comment here. wuzz', '2016-09-28 11:08:11'),
(7, 4, 2, 'Wah gula aren nya enak', '2016-09-28 13:24:40'),
(8, 2, 3, 'rani coba comment ya disini >_<', '2016-09-29 09:19:09'),
(9, 1, 3, 'ini beritanya apaan sih. gaje deh', '2016-09-29 09:21:47'),
(10, 4, 3, 'iyah enak banget niich', '2016-10-02 11:13:13'),
(11, 3, 2, 'ciee bisa diupdate', '2016-10-03 07:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `ms_fare`
--

CREATE TABLE IF NOT EXISTS `ms_fare` (
  `id_fare` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `consultation_fare` int(11) NOT NULL,
  `appointment_fare` int(11) NOT NULL,
  PRIMARY KEY (`id_fare`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ms_fare`
--

INSERT INTO `ms_fare` (`id_fare`, `id_user`, `consultation_fare`, `appointment_fare`) VALUES
(1, 2, 2500, 25000);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ms_news`
--

INSERT INTO `ms_news` (`id_news`, `id_doctor`, `image_news`, `title`, `news`, `date_news`, `view`) VALUES
(1, 2, 'assets/asset_default/image/a.png', 'Lorem Ipsum', ' Lorem ipsum dolor sil amet Lorem ipsum dolor sil ametLorem ipsum dolor sil amet Lorem ipsum dolor sil ametLorem ipsum dolor sil amet Lorem ipsum dolor sil amet', '2016-09-22 00:00:00', 0),
(2, 2, '', 'Efek Kebanyakan Makan Gula.\r\nEfek Kebanyakan Makan Gula adalah dapat menyebabkan obesitas lhoo.\r\nngg', 'Efek Kebanyakan Makan Gula.\r\nEfek Kebanyakan Makan Gula adalah dapat menyebabkan obesitas lhoo.\r\nnggak percaya? benar nggak percaya? saya sih juga nggak sih. hehe.', '2016-09-26 09:54:01', 0),
(3, 2, '', ' Coba Update berita lagi aja deh siapa tau nambah ..', ' Coba Update berita lagi aja deh siapa tau nambah rezeki. he he he. Coba Update berita lagi aja deh siapa tau nambah rezeki. he he he. Coba Update berita lagi aja deh siapa tau nambah rezeki. he he he. Coba Update berita lagi aja deh siapa tau nambah rezeki. he he he.', '2016-09-26 10:44:39', 0),
(4, 2, 'assets/images/news/fiedya_news_20160926104609.png', 'Test Update Berita test update berita. Test Update..', 'Test Update Berita test update berita. Test Update Berita test update berita. Test Update Berita test update berita.Test Update Berita test update berita. Test Update Berita test update berita.', '2016-09-26 10:46:09', 0),
(5, 2, 'assets/images/news/fiedya_news_20161003110347.jpg', 'Apa Penyebab penyakit Kulit yang paling utama?\r\nJa..', 'Apa Penyebab penyakit Kulit yang paling utama?\r\nJadi banyak yang tidak tahu kalau penyebabnya adalah ... kuman. iyah kuman. yang kecil-kecil tapi ngeselin itu. masa nggak tau? yaa payah.', '2016-10-03 11:03:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ms_notification`
--

CREATE TABLE IF NOT EXISTS `ms_notification` (
  `id_notification` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `notification` longtext NOT NULL,
  `link_notification` varchar(200) NOT NULL,
  `status_notification` tinyint(2) NOT NULL COMMENT '0: Unread, 1: Read',
  `date_notification` datetime NOT NULL,
  `notification_type` tinyint(2) NOT NULL COMMENT '1: Appointment, 2: News, 3: Comment',
  PRIMARY KEY (`id_notification`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `ms_notification`
--

INSERT INTO `ms_notification` (`id_notification`, `id_user`, `notification`, `link_notification`, `status_notification`, `date_notification`, `notification_type`) VALUES
(2, 3, 'dr. Fiedya Wati Kusuma, Sp.KK Just Submit a News. Check their profile right now.', 'view-profile/2', 1, '2016-10-03 11:03:47', 2),
(4, 2, 'Rani Putri Merliasari Make an appointment with you at 5 Oct 2016 11:50', '/appointment', 1, '2016-10-04 09:57:00', 1),
(5, 3, 'Sorry, dr. Fiedya Wati Kusuma, Sp.KK Just Canceled your appointment at 05 Oct 2016 11:50:00', '/appointment', 1, '2016-10-04 13:37:08', 1),
(7, 2, 'Rani Putri Merliasari Make an appointment with you at 06 Oct 2016 11:40', '/appointment', 1, '2016-10-04 13:43:44', 1),
(8, 3, 'Yippie, dr. Fiedya Wati Kusuma, Sp.KK Just approved your appointment in different time at 06 Oct 2016 11:40:00', '/appointment', 1, '2016-10-04 13:44:35', 1),
(9, 3, 'Yippie, dr. Fiedya Wati Kusuma, Sp.KK Just have done your appointment at 03 Oct 2016 18:30:00', '/appointment', 1, '2016-10-04 13:47:59', 1),
(10, 3, 'Yippie, dr. Fiedya Wati Kusuma, Sp.KK Just have done your appointment at 06 Oct 2016 13:00:00', '/appointment', 1, '2016-10-05 15:57:14', 1),
(11, 2, 'Rani Putri Merliasari Make an appointment with you at 27 Oct 2016 11:40', '/appointment', 1, '2016-10-05 16:14:34', 1),
(12, 2, 'How Dear, Rani Putri Merliasari Just Canceled their appointment at 27 Oct 2016 11:40:00', '/appointment', 1, '2016-10-05 16:14:53', 1),
(13, 2, 'How Sweet, Rani Putri Merliasari Just Love it your appointment at 30 Sep 2016 19:00:00', '/appointment', 1, '2016-10-05 16:20:59', 1),
(14, 2, 'How Sweet, Rani Putri Merliasari Just Love it your appointment at 03 Oct 2016 18:30:00', '/appointment', 1, '2016-10-05 16:21:56', 1),
(15, 2, 'How Sweet, Rani Putri Merliasari Just Love it your appointment at 06 Oct 2016 13:00:00', '/appointment', 1, '2016-10-05 16:22:05', 1),
(16, 2, 'Rani Putri Merliasari Make an appointment with you at 07 Oct 2016 11:50', '/appointment', 0, '2016-10-06 11:17:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ms_payment`
--

CREATE TABLE IF NOT EXISTS `ms_payment` (
  `id_payment` int(11) NOT NULL AUTO_INCREMENT,
  `name_payment` varchar(100) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `image_payment` varchar(200) NOT NULL,
  PRIMARY KEY (`id_payment`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ms_payment`
--

INSERT INTO `ms_payment` (`id_payment`, `name_payment`, `account_name`, `account_number`, `image_payment`) VALUES
(1, 'BCA', 'Dika Mardayani', '12424242', 'assets/images/bca-logo.png');

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
-- Table structure for table `ms_transaction`
--

CREATE TABLE IF NOT EXISTS `ms_transaction` (
  `id_transaction` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_payment` int(11) NOT NULL,
  `debit_credit` tinyint(1) NOT NULL COMMENT '0: Debit, 1: Credit',
  `nominal` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `transaction_type` tinyint(4) NOT NULL COMMENT '0: Top Up, 1: Consultation, 2: Appointment',
  `date_transaction` datetime NOT NULL,
  `status_transaction` tinyint(2) NOT NULL COMMENT '0: Pending, 1 : Approved, 2 : Rejected',
  PRIMARY KEY (`id_transaction`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ms_transaction`
--

INSERT INTO `ms_transaction` (`id_transaction`, `id_user`, `id_payment`, `debit_credit`, `nominal`, `description`, `transaction_type`, `date_transaction`, `status_transaction`) VALUES
(2, 3, 1, 0, 50000, 'Topup 50,000 use BCA payment', 0, '2016-10-06 08:29:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ms_user`
--

CREATE TABLE IF NOT EXISTS `ms_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(14) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `address` longtext NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `gender` tinyint(1) NOT NULL COMMENT '0:Not Set, 1: Male, 2: Female',
  `experience` longtext NOT NULL,
  `birthday` date NOT NULL,
  `permission` tinyint(1) NOT NULL COMMENT '1: Admin, 2: Doctor, 3: Pasien',
  `status_user` tinyint(1) NOT NULL COMMENT '0: Nonactive, 1: Active, 2: Banned',
  `date_register` datetime NOT NULL,
  `date_login` datetime NOT NULL,
  `love` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ms_user`
--

INSERT INTO `ms_user` (`id_user`, `username`, `password`, `email`, `phone_number`, `full_name`, `avatar`, `address`, `city`, `province`, `gender`, `experience`, `birthday`, `permission`, `status_user`, `date_register`, `date_login`, `love`, `amount`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'adminmedskin@gmail.com', '', 'adminmedskin', 'assets/images/user/cartoon-doctor-stethoscope-vector-illustration-30595681.jpg', 'admin', 'jakarta', 'Aceh', 0, 'Tidak  Ada', '0000-00-00', 1, 1, '2016-08-18 07:35:37', '0000-00-00 00:00:00', 1, 0),
(2, 'fiedya', 'a8f5f167f44f4964e6c998dee827110c', 'fiedya@gmail.com', '', 'dr. Fiedya Wati Kusuma, Sp.KK', '', '', 'Tangerang', 'Banten', 0, '', '0000-00-00', 2, 1, '2016-09-22 00:00:00', '0000-00-00 00:00:00', 3, 0),
(3, 'rani', 'a8f5f167f44f4964e6c998dee827110c', 'rpmhslg@gmail.com', '', 'Rani Putri Merliasari', '', '', '', '', 0, '', '1995-08-17', 3, 1, '2016-09-22 00:00:00', '0000-00-00 00:00:00', 0, 50000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
