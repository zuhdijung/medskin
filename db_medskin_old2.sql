-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Agu 2016 pada 10.25
-- Versi Server: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_medskin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_chat`
--

CREATE TABLE IF NOT EXISTS `ms_chat` (
  `id_chat` bigint(20) NOT NULL,
  `id_chatroom` bigint(20) NOT NULL,
  `chat` longtext NOT NULL,
  `status_chat` tinyint(1) NOT NULL COMMENT '1: Unread, 2: Read',
  `image_chat` varchar(200) NOT NULL,
  `date_chat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_chatroom`
--

CREATE TABLE IF NOT EXISTS `ms_chatroom` (
  `id_chatroom` bigint(20) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `date_chatroom` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_love`
--

CREATE TABLE IF NOT EXISTS `ms_love` (
  `id_love` bigint(20) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `date_love` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_medicalrecord`
--

CREATE TABLE IF NOT EXISTS `ms_medicalrecord` (
  `id_medicalrecord` bigint(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_medicalrecord` date NOT NULL,
  `anamesis` longtext NOT NULL,
  `check_result` longtext NOT NULL,
  `plan_to_do` longtext NOT NULL,
  `act_medical` longtext NOT NULL,
  `other_medical` longtext NOT NULL,
  `date_insert` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_news`
--

CREATE TABLE IF NOT EXISTS `ms_news` (
  `id_news` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `image_news` varchar(200) NOT NULL,
  `news` longtext NOT NULL,
  `date_news` datetime NOT NULL,
  `status_news` tinyint(4) NOT NULL COMMENT '1: Pending, 2: Published',
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_read_news`
--

CREATE TABLE IF NOT EXISTS `ms_read_news` (
  `id_read_news` int(11) NOT NULL,
  `id_news` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_read_news` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_user`
--

CREATE TABLE IF NOT EXISTS `ms_user` (
  `id_user` int(11) NOT NULL,
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
  `love` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_user`
--

INSERT INTO `ms_user` (`id_user`, `username`, `password`, `email`, `full_name`, `avatar`, `address`, `city`, `province`, `experience`, `birthday`, `permission`, `status_user`, `date_register`, `date_login`, `love`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'adminmedskin@gmail.com', 'adminmedskin', 'assets/images/user/cartoon-doctor-stethoscope-vector-illustration-30595681.jpg', 'admin', 'jakarta', 'Aceh', 'Tidak  Ada', '0000-00-00', 1, 1, '2016-08-18 07:35:37', '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ms_chat`
--
ALTER TABLE `ms_chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `ms_chatroom`
--
ALTER TABLE `ms_chatroom`
  ADD PRIMARY KEY (`id_chatroom`);

--
-- Indexes for table `ms_love`
--
ALTER TABLE `ms_love`
  ADD PRIMARY KEY (`id_love`);

--
-- Indexes for table `ms_medicalrecord`
--
ALTER TABLE `ms_medicalrecord`
  ADD PRIMARY KEY (`id_medicalrecord`);

--
-- Indexes for table `ms_news`
--
ALTER TABLE `ms_news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `ms_read_news`
--
ALTER TABLE `ms_read_news`
  ADD PRIMARY KEY (`id_read_news`);

--
-- Indexes for table `ms_user`
--
ALTER TABLE `ms_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ms_chat`
--
ALTER TABLE `ms_chat`
  MODIFY `id_chat` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ms_chatroom`
--
ALTER TABLE `ms_chatroom`
  MODIFY `id_chatroom` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ms_love`
--
ALTER TABLE `ms_love`
  MODIFY `id_love` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ms_medicalrecord`
--
ALTER TABLE `ms_medicalrecord`
  MODIFY `id_medicalrecord` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ms_news`
--
ALTER TABLE `ms_news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ms_read_news`
--
ALTER TABLE `ms_read_news`
  MODIFY `id_read_news` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ms_user`
--
ALTER TABLE `ms_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
