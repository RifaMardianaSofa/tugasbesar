-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2015 at 12:05 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `buku_dosen`
--

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(12, 1433327688, '::1', '33688'),
(13, 1433327824, '::1', '50635'),
(14, 1433327900, '::1', '86767'),
(15, 1433340109, '::1', '78011'),
(16, 1433386331, '::1', '63106'),
(17, 1433406989, '::1', '98854');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('e13827178121b237276f5820e20c5198', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:38.0) Gecko/20100101 Firefox/38.0', 1433411909, 'a:4:{s:9:"user_data";s:0:"";s:9:"logged_in";s:16:"aingLoginWebYeuh";s:8:"username";s:5:"admin";s:12:"nama_lengkap";s:13:"Administrator";}'),
('f4c2d05d73afc6f7ff1ac7edb24f788b', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:38.0) Gecko/20100101 Firefox/38.0', 1433411403, 'a:3:{s:9:"logged_in";s:16:"aingLoginWebYeuh";s:8:"username";s:5:"admin";s:12:"nama_lengkap";s:13:"Administrator";}');

-- --------------------------------------------------------

--
-- Table structure for table `hubungi`
--

CREATE TABLE IF NOT EXISTS `hubungi` (
  `id_hubungi` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `subjek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `pesan_balas` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_balas` datetime NOT NULL,
  `balas` enum('N','Y') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_hubungi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `hubungi`
--

INSERT INTO `hubungi` (`id_hubungi`, `nama`, `email`, `subjek`, `pesan`, `pesan_balas`, `tanggal`, `tanggal_balas`, `balas`) VALUES
(13, 'umar', 'umar@gmail.com', 'tanya buku', 'gimana nih kok gada sih buku pi', '', '2015-06-03', '0000-00-00 00:00:00', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE IF NOT EXISTS `tb_buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `isbn` char(30) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `edisi` smallint(6) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `dibaca` int(11) DEFAULT '0',
  `tgl_insert` datetime DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `judul`, `pengarang`, `penerbit`, `isbn`, `tahun`, `edisi`, `gambar`, `dibaca`, `tgl_insert`, `username`) VALUES
(8, 'Web Attack', 'Wildan', 'Informatika', '1509', 2015, 1, 'web_attack.ppt', 1, '2015-06-04 01:12:02', 'admin'),
(9, 'Strategi Kewirausahaan', 'Lilis ', 'Erlangga', '1507', 2011, 1, 'STRATEGI_KEWIRAUSAHAAN.pdf', 0, '2015-06-04 01:13:05', 'admin'),
(11, 'Algoritma Kriptografi', 'Faiz Kaffah', 'Informatika', '1503', 2011, 4, 'Algoritma_Kriptografi.ppt', 0, '2015-06-04 01:10:23', 'admin'),
(14, 'Pemograman Internet', 'Ichsan Taufik', 'Informatika', '1504', 2014, 3, 'Pemrograman_Internet_(7).ppt', 0, '2015-06-04 01:09:24', 'admin'),
(15, 'JQuery', 'Deden', 'Informatika', '1514', 2010, 2, 'modul_jquery.pdf', 0, '2015-06-04 01:14:43', 'admin'),
(16, 'User Interface', 'Deni Fauzi', 'Erlangga', '1505', 2009, 1, 'UI_slide.pdf', 0, '2015-06-04 01:22:15', 'admin'),
(17, 'Design Dialog', 'Deni Fauzi', 'Erlangga', '1506', 2014, 3, 'Design_Dialog.pdf', 0, '2015-06-04 01:24:41', 'admin'),
(18, 'Model Analisis', 'Wisnu Uriawan', 'Informatika', '1511', 2014, 1, 'Model_Analysis.ppt', 0, '2015-06-04 01:26:28', 'admin'),
(19, 'Software Analisis', 'Wisnu Uriawan', 'Informatika', '1502', 2013, 2, 'Software_Analysis.ppt', 0, '2015-06-04 01:27:44', 'admin'),
(20, 'Array', 'Muhammad Irfan', 'Informatika', '1501', 2011, 2, 'Pertemuan_6_Alstrukdata_Array.ppt', 2, '2015-06-04 01:29:13', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`, `id_session`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'didi.sonhaji@gmail.com', '085723310504', 'admin', 'N', '2ee8e19a65bcda25512d50d5144ee978');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
