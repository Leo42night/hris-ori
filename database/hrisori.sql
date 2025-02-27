-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- membuang struktur untuk table hrisori.absensi
CREATE TABLE IF NOT EXISTS `absensi` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'id ini diberi komentar',
  `nip` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '' COMMENT 'nip ini diberi komentar',
  `region` varchar(60) DEFAULT '',
  `penempatan` varchar(60) DEFAULT '',
  `tgl_absen` varchar(10) DEFAULT '',
  `jam_masuk` varchar(8) DEFAULT '',
  `lat_masuk` varchar(30) DEFAULT '',
  `lon_masuk` varchar(30) DEFAULT '',
  `jarak_masuk` double NOT NULL DEFAULT '0',
  `keterangan_masuk` varchar(255) DEFAULT '',
  `eviden_masuk` varchar(255) DEFAULT '',
  `approve1` varchar(1) NOT NULL DEFAULT '0',
  `approval1` varchar(60) DEFAULT '',
  `tgl_approve1` varchar(60) DEFAULT '',
  `jam_pulang` varchar(8) DEFAULT '',
  `lat_pulang` varchar(30) DEFAULT '',
  `lon_pulang` varchar(30) DEFAULT '',
  `jarak_pulang` double NOT NULL DEFAULT '0',
  `keterangan_pulang` varchar(255) DEFAULT '',
  `eviden_pulang` varchar(255) DEFAULT '',
  `approve2` varchar(1) NOT NULL DEFAULT '0',
  `approval2` varchar(60) DEFAULT '',
  `tgl_approve2` varchar(60) DEFAULT '',
  `nip_tanggal` varchar(30) NOT NULL DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `kota` varchar(100) DEFAULT NULL,
  `durasi` varchar(10) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='nama tabel absensi ini diberi komentar';

-- Membuang data untuk tabel hrisori.absensi: 10 rows
/*!40000 ALTER TABLE `absensi` DISABLE KEYS */;
INSERT INTO `absensi` (`id`, `nip`, `region`, `penempatan`, `tgl_absen`, `jam_masuk`, `lat_masuk`, `lon_masuk`, `jarak_masuk`, `keterangan_masuk`, `eviden_masuk`, `approve1`, `approval1`, `tgl_approve1`, `jam_pulang`, `lat_pulang`, `lon_pulang`, `jarak_pulang`, `keterangan_pulang`, `eviden_pulang`, `approve2`, `approval2`, `tgl_approve2`, `nip_tanggal`, `status`, `kota`, `durasi`) VALUES
	(1, '7719002PCN', 'KANTOR PUSAT', 'KANTOR PUSAT', '2020-03-21', '22:09:11', '', '', 0, '', '', '1', 'system', '21/03/2020 22:09:13', '22:09:11', '', '', 0, '', '', '1', 'system', '21/03/2020 22:09:15', '7719002PCN.2020-03-21', '', NULL, ''),
	(2, '7719002PCN', 'KANTOR PUSAT', 'KANTOR PUSAT', '2020-03-23', '13:41:07', '-1.2378688', '116.9117279', 4289, '', '', '1', 'system', 'Hari ini : 23/03/2020 13:41:07', '13:41:12', '-1.2378688', '116.9117279', 4289, '', '', '1', 'system', 'Hari ini : 23/03/2020 13:41:12', '7719002PCN.2020-03-23', '', NULL, ''),
	(3, '9619016ZTY', 'KANTOR PUSAT', 'KANTOR PUSAT', '2020-03-27', '07:06:21', '-1.2439015', '116.8723902', 478, '', '', '1', 'system', 'Hari ini : 27/03/2020 07:06:21', '', '', '', 0, '', '', '0', '', '', '9619016ZTY.2020-03-27', 'WFH', NULL, ''),
	(4, '7719002PCN', 'KANTOR PUSAT', 'KANTOR PUSAT', '2020-03-26', '21:30:52', '-1.237872', '116.9117466', 4291, '', '', '1', 'system', 'Hari ini : 26/03/2020 21:30:52', '', '', '', 0, '', '', '0', '', '', '7719002PCN.2020-03-26', 'WFH', NULL, ''),
	(5, 'HONOR06', 'KANTOR PUSAT', 'KANTOR PUSAT', '2020-03-26', '07:26:10', '-1.2527256', '116.8680529', 1561, '', '', '1', 'system', 'Hari ini : 26/03/2020 07:26:10', '17:26:18', '-1.2527041', '116.8682418', 1551, '', '', '1', 'system', 'Hari ini : 26/03/2020 17:26:18', 'HONOR06.2020-03-26', 'WFH', NULL, '10:00'),
	(6, '7905007TRK', 'KANTOR PUSAT', 'KANTOR PUSAT', '2020-03-26', '07:35:50', '-1.2500004', '116.8809492', 1433, '', '', '1', 'system', 'Hari ini : 26/03/2020 07:35:50', '07:37:32', '-1.2500004', '116.8809492', 1433, '', '', '1', 'system', 'Hari ini : 26/03/2020 07:37:32', '7905007TRK.2020-03-26', 'WFO', NULL, '00:02'),
	(7, '9619016ZTY', 'KANTOR PUSAT', 'KANTOR PUSAT', '2020-03-26', '07:46:13', '-1.2433574', '116.8717366', 441, '', '', '1', 'system', 'Hari ini : 26/03/2020 07:46:13', '20:08:48', '-1.2443389', '116.8728466', 519, '', '', '1', 'system', 'Hari ini : 26/03/2020 20:08:48', '9619016ZTY.2020-03-26', 'WFO', NULL, '12:23'),
	(8, '9519012ZTY', 'KANTOR PUSAT', 'KANTOR PUSAT', '2020-03-26', '07:46:29', '-1.2433267', '116.8715383', 446, '', '', '1', 'system', 'Hari ini : 26/03/2020 07:46:29', '20:02:43', '-1.2433623', '116.8717151', 442, '', '', '1', 'system', 'Hari ini : 26/03/2020 20:02:43', '9519012ZTY.2020-03-26', 'WFO', NULL, '12:16'),
	(9, '9519012ZTY', 'KANTOR PUSAT', 'KANTOR PUSAT', '2020-03-27', '07:11:39', '-1.2432914', '116.8716007', 440, '', '', '1', 'system', 'Hari ini : 27/03/2020 07:11:39', '', '', '', 0, '', '', '0', '', '', '9519012ZTY.2020-03-27', 'WFH', NULL, ''),
	(10, 'HONOR06', 'KANTOR PUSAT', 'KANTOR PUSAT', '2020-03-27', '07:25:04', '-1.2527103', '116.8681991', 1554, '', '', '1', 'system', 'Hari ini : 27/03/2020 07:25:04', '00:58:28', '-1.2676558', '116.8336559', 5393, '', '', '1', 'system', 'Hari ini : 27/03/2020 00:58:28', 'HONOR06.2020-03-27', 'WFH', NULL, '-6:-27');
/*!40000 ALTER TABLE `absensi` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.aksesuser
CREATE TABLE IF NOT EXISTS `aksesuser` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT '',
  `idmenu` int NOT NULL,
  `proses` varchar(1) NOT NULL DEFAULT '0',
  `lihat` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.aksesuser: 252 rows
/*!40000 ALTER TABLE `aksesuser` DISABLE KEYS */;
INSERT INTO `aksesuser` (`id`, `username`, `idmenu`, `proses`, `lihat`) VALUES
	(252, 'sandy', 252, '1', '1'),
	(251, 'sandy', 251, '1', '1'),
	(250, 'sandy', 250, '1', '1'),
	(249, 'sandy', 249, '1', '1'),
	(248, 'sandy', 248, '1', '1'),
	(247, 'sandy', 247, '1', '1'),
	(246, 'sandy', 246, '1', '1'),
	(245, 'sandy', 245, '1', '1'),
	(244, 'sandy', 244, '1', '1'),
	(243, 'sandy', 243, '1', '1'),
	(242, 'admin', 242, '1', '1'),
	(241, 'admin', 240, '1', '1'),
	(240, 'admin', 239, '1', '1'),
	(239, 'admin', 238, '1', '1'),
	(238, 'admin', 237, '1', '1'),
	(237, 'sandy', 242, '1', '1'),
	(236, 'sandy', 240, '1', '1'),
	(235, 'sandy', 239, '1', '1'),
	(234, 'sandy', 238, '1', '1'),
	(233, 'admin', 195, '1', '1'),
	(232, 'admin', 191, '1', '1'),
	(231, 'admin', 224, '1', '1'),
	(230, 'admin', 190, '1', '1'),
	(229, 'admin', 189, '1', '1'),
	(228, 'admin', 188, '1', '1'),
	(227, 'admin', 187, '1', '1'),
	(226, 'admin', 186, '1', '1'),
	(225, 'admin', 167, '1', '1'),
	(224, 'admin', 185, '1', '1'),
	(223, 'admin', 166, '1', '1'),
	(222, 'admin', 234, '1', '1'),
	(221, 'admin', 165, '1', '1'),
	(220, 'admin', 164, '1', '1'),
	(219, 'admin', 225, '1', '1'),
	(218, 'admin', 163, '1', '1'),
	(217, 'admin', 162, '1', '1'),
	(216, 'admin', 160, '1', '1'),
	(215, 'admin', 212, '1', '1'),
	(214, 'admin', 159, '1', '1'),
	(213, 'admin', 158, '1', '1'),
	(212, 'admin', 157, '1', '1'),
	(211, 'admin', 156, '1', '1'),
	(210, 'admin', 153, '1', '1'),
	(209, 'admin', 150, '1', '1'),
	(208, 'admin', 152, '1', '1'),
	(207, 'admin', 149, '1', '1'),
	(206, 'admin', 144, '1', '1'),
	(205, 'admin', 143, '1', '1'),
	(204, 'admin', 210, '1', '1'),
	(203, 'admin', 141, '1', '1'),
	(202, 'admin', 211, '1', '1'),
	(201, 'admin', 213, '1', '1'),
	(200, 'admin', 140, '1', '1'),
	(199, 'admin', 226, '1', '1'),
	(198, 'admin', 230, '1', '1'),
	(197, 'admin', 229, '1', '1'),
	(196, 'admin', 228, '1', '1'),
	(195, 'admin', 198, '1', '1'),
	(194, 'admin', 227, '1', '1'),
	(193, 'admin', 196, '1', '1'),
	(192, 'admin', 201, '1', '1'),
	(191, 'admin', 200, '1', '1'),
	(190, 'admin', 231, '1', '1'),
	(189, 'admin', 232, '1', '1'),
	(188, 'admin', 233, '1', '1'),
	(187, 'admin', 235, '1', '1'),
	(186, 'admin', 236, '1', '1'),
	(185, 'admin', 168, '1', '1'),
	(184, 'admin', 203, '1', '1'),
	(183, 'admin', 223, '1', '1'),
	(182, 'admin', 222, '1', '1'),
	(181, 'admin', 27, '1', '1'),
	(180, 'admin', 114, '1', '1'),
	(179, 'admin', 112, '1', '1'),
	(178, 'admin', 111, '1', '1'),
	(177, 'admin', 11, '1', '1'),
	(176, 'admin', 10, '1', '1'),
	(175, 'admin', 5, '1', '1'),
	(174, 'admin', 69, '1', '1'),
	(173, 'admin', 68, '1', '1'),
	(172, 'admin', 67, '1', '1'),
	(171, 'admin', 66, '1', '1'),
	(170, 'admin', 65, '1', '1'),
	(169, 'admin', 64, '1', '1'),
	(168, 'admin', 63, '1', '1'),
	(167, 'admin', 62, '1', '1'),
	(166, 'admin', 61, '1', '1'),
	(165, 'admin', 60, '1', '1'),
	(164, 'admin', 59, '1', '1'),
	(163, 'admin', 58, '1', '1'),
	(162, 'sandy', 237, '1', '1'),
	(161, 'sandy', 236, '1', '1'),
	(160, 'sandy', 235, '1', '1'),
	(159, 'sandy', 234, '1', '1'),
	(158, 'sandy', 233, '1', '1'),
	(157, 'sandy', 232, '1', '1'),
	(156, 'sandy', 231, '1', '1'),
	(155, 'sandy', 230, '1', '1'),
	(154, 'sandy', 229, '1', '1'),
	(153, 'sandy', 228, '1', '1'),
	(152, 'sandy', 227, '1', '1'),
	(151, 'sandy', 226, '1', '1'),
	(150, 'sandy', 225, '1', '1'),
	(149, 'sandy', 224, '1', '1'),
	(148, 'sandy', 223, '1', '1'),
	(147, 'sandy', 222, '1', '1'),
	(146, 'sandy', 221, '1', '1'),
	(145, 'sandy', 220, '1', '1'),
	(144, 'sandy', 219, '1', '1'),
	(143, 'sandy', 213, '1', '1'),
	(142, 'sandy', 210, '1', '1'),
	(141, 'sandy', 212, '1', '1'),
	(140, 'sandy', 211, '1', '1'),
	(139, 'sandy', 209, '1', '1'),
	(138, 'sandy', 207, '1', '1'),
	(137, 'sandy', 208, '1', '1'),
	(136, 'sandy', 205, '1', '1'),
	(135, 'sandy', 204, '1', '1'),
	(134, 'sandy', 203, '1', '1'),
	(133, 'sandy', 202, '0', '0'),
	(132, 'sandy', 201, '1', '1'),
	(131, 'sandy', 200, '1', '1'),
	(130, 'sandy', 198, '1', '1'),
	(129, 'sandy', 197, '1', '1'),
	(128, 'sandy', 196, '1', '1'),
	(127, 'sandy', 195, '1', '1'),
	(126, 'sandy', 191, '1', '1'),
	(125, 'sandy', 190, '1', '1'),
	(124, 'sandy', 189, '1', '1'),
	(123, 'sandy', 188, '1', '1'),
	(122, 'sandy', 187, '1', '1'),
	(121, 'sandy', 186, '1', '1'),
	(120, 'sandy', 185, '1', '1'),
	(119, 'sandy', 193, '1', '1'),
	(118, 'sandy', 192, '1', '1'),
	(117, 'sandy', 183, '1', '1'),
	(116, 'sandy', 182, '1', '1'),
	(115, 'sandy', 181, '1', '1'),
	(114, 'sandy', 180, '1', '1'),
	(113, 'sandy', 171, '1', '1'),
	(112, 'sandy', 170, '1', '1'),
	(111, 'sandy', 169, '0', '0'),
	(110, 'sandy', 168, '1', '1'),
	(109, 'sandy', 167, '1', '1'),
	(108, 'sandy', 166, '1', '1'),
	(107, 'sandy', 165, '1', '1'),
	(106, 'sandy', 164, '1', '1'),
	(105, 'sandy', 163, '1', '1'),
	(104, 'sandy', 162, '1', '1'),
	(103, 'sandy', 160, '1', '1'),
	(102, 'sandy', 159, '1', '1'),
	(101, 'sandy', 158, '1', '1'),
	(100, 'sandy', 157, '1', '1'),
	(99, 'sandy', 156, '1', '1'),
	(98, 'sandy', 153, '1', '1'),
	(97, 'sandy', 152, '1', '1'),
	(96, 'sandy', 150, '1', '1'),
	(95, 'sandy', 149, '1', '1'),
	(94, 'sandy', 144, '1', '1'),
	(93, 'sandy', 143, '1', '1'),
	(92, 'sandy', 141, '1', '1'),
	(91, 'sandy', 140, '1', '1'),
	(90, 'sandy', 138, '1', '1'),
	(89, 'sandy', 137, '1', '1'),
	(88, 'sandy', 136, '1', '1'),
	(87, 'sandy', 135, '1', '1'),
	(86, 'sandy', 118, '1', '1'),
	(85, 'sandy', 134, '1', '1'),
	(84, 'sandy', 133, '1', '1'),
	(83, 'sandy', 132, '1', '1'),
	(82, 'sandy', 131, '0', '0'),
	(81, 'sandy', 130, '1', '1'),
	(80, 'sandy', 129, '1', '1'),
	(79, 'sandy', 128, '1', '1'),
	(78, 'sandy', 115, '1', '1'),
	(77, 'sandy', 126, '1', '1'),
	(76, 'sandy', 125, '1', '1'),
	(75, 'sandy', 124, '1', '1'),
	(74, 'sandy', 123, '1', '1'),
	(73, 'sandy', 122, '1', '1'),
	(72, 'sandy', 98, '1', '1'),
	(71, 'sandy', 97, '1', '1'),
	(70, 'sandy', 105, '1', '1'),
	(69, 'sandy', 104, '1', '1'),
	(68, 'sandy', 99, '1', '1'),
	(67, 'sandy', 95, '1', '1'),
	(66, 'sandy', 101, '1', '1'),
	(65, 'sandy', 100, '1', '1'),
	(64, 'sandy', 103, '1', '1'),
	(63, 'sandy', 102, '1', '1'),
	(62, 'sandy', 93, '1', '1'),
	(61, 'sandy', 92, '1', '1'),
	(60, 'sandy', 91, '1', '1'),
	(59, 'sandy', 90, '1', '1'),
	(58, 'sandy', 89, '1', '1'),
	(57, 'sandy', 83, '1', '1'),
	(56, 'sandy', 85, '1', '1'),
	(55, 'sandy', 120, '1', '1'),
	(54, 'sandy', 119, '1', '1'),
	(53, 'sandy', 117, '1', '1'),
	(52, 'sandy', 116, '1', '1'),
	(51, 'sandy', 86, '1', '1'),
	(50, 'sandy', 114, '0', '1'),
	(49, 'sandy', 113, '0', '1'),
	(48, 'sandy', 112, '1', '1'),
	(47, 'sandy', 111, '0', '1'),
	(46, 'sandy', 110, '1', '1'),
	(45, 'sandy', 109, '1', '1'),
	(44, 'sandy', 88, '1', '1'),
	(43, 'sandy', 84, '1', '1'),
	(42, 'sandy', 108, '1', '1'),
	(41, 'sandy', 107, '1', '1'),
	(40, 'sandy', 106, '1', '1'),
	(39, 'sandy', 79, '1', '1'),
	(38, 'sandy', 82, '1', '1'),
	(37, 'sandy', 81, '1', '1'),
	(36, 'sandy', 78, '1', '1'),
	(35, 'sandy', 16, '1', '1'),
	(34, 'sandy', 15, '1', '1'),
	(33, 'sandy', 14, '1', '1'),
	(32, 'sandy', 13, '1', '1'),
	(31, 'sandy', 43, '1', '1'),
	(30, 'sandy', 42, '1', '1'),
	(29, 'sandy', 40, '1', '1'),
	(28, 'sandy', 39, '1', '1'),
	(27, 'sandy', 38, '0', '1'),
	(26, 'sandy', 36, '1', '1'),
	(25, 'sandy', 56, '0', '1'),
	(24, 'sandy', 55, '0', '1'),
	(23, 'sandy', 54, '0', '1'),
	(22, 'sandy', 11, '0', '1'),
	(21, 'sandy', 10, '0', '1'),
	(20, 'sandy', 5, '0', '1'),
	(19, 'sandy', 50, '1', '1'),
	(18, 'sandy', 48, '1', '1'),
	(17, 'sandy', 47, '1', '1'),
	(16, 'sandy', 32, '1', '1'),
	(15, 'sandy', 27, '1', '1'),
	(14, 'sandy', 77, '1', '1'),
	(13, 'sandy', 71, '0', '1'),
	(12, 'sandy', 70, '1', '1'),
	(11, 'sandy', 73, '0', '1'),
	(10, 'sandy', 69, '1', '1'),
	(9, 'sandy', 68, '1', '1'),
	(8, 'sandy', 65, '1', '1'),
	(7, 'sandy', 64, '1', '1'),
	(6, 'sandy', 63, '1', '1'),
	(5, 'sandy', 62, '1', '1'),
	(4, 'sandy', 61, '1', '1'),
	(3, 'sandy', 60, '1', '1'),
	(2, 'sandy', 59, '1', '1'),
	(1, 'sandy', 58, '1', '1');
/*!40000 ALTER TABLE `aksesuser` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.akses_token
CREATE TABLE IF NOT EXISTS `akses_token` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jwtToken` text,
  `refreshToken` text,
  `last_generated` varchar(60) DEFAULT '',
  `tgl_expire` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.akses_token: ~0 rows (lebih kurang)
INSERT INTO `akses_token` (`id`, `jwtToken`, `refreshToken`, `last_generated`, `tgl_expire`) VALUES
	(1, 'eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJwbG50YXJha2FuIiwiaWRfcGxuX2dyb3VwIjoiZjdhY2JiMTUtMzMzYS00ZTU5LWE4YWUtZjUzMmJkZGUxMWZlIiwicm9sZSI6W3siaWQiOiJmZDBkOGZhNC0yMjI3LTQ0ZTItYjdlZi0wYTM1ZDkwMjI0ZjgiLCJuYW1lIjoiQWRtaW4gQVAiLCJrZXRlcmFuZ2FuIjoiQW5hayBQZXJ1c2FoYWFuIiwiaXNBY3RpdmUiOnRydWV9XSwia29kZV9wbG5fZ3JvdXAiOiIxMDA2IiwiaWRfdXNlciI6ImEwMTE0ZjRkLWMxMzAtNGU5Yy05ZGIxLTBiMGQ5MmExOTIwZSIsInR5cGUiOiJhY2Nlc3MiLCJuaXAiOiIiLCJmdWxsbmFtZSI6IiIsImV4cCI6MTcwODQyODcwMiwiaWF0IjoxNzA4Mzk5OTAyLCJlbWFpbCI6InBsbnRhcmFrYW5AZ21haWlsLmNvbSIsInVzZXJuYW1lIjoicGxudGFyYWthbiIsInN0YXR1cyI6IkFETUlOX0FQIn0.dR_unwWHAZ0N2k_drovl0rlyZDnTDa_16M5OxxrWuzg', 'eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJwbG50YXJha2FuIiwidHlwZSI6InJlZnJlc2giLCJleHAiOjE3MDg0OTExNzQsImlhdCI6MTcwODQwNDc3NH0.uzvpwzs_x_NHwIgg0RN9OpYpYAxoLWx4rTxioFxdoWM', '2024-02-20 13:10:44', '2024-02-20 21:10:44');

-- membuang struktur untuk table hrisori.aktivitas_harian
CREATE TABLE IF NOT EXISTS `aktivitas_harian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(10) DEFAULT '',
  `nip` varchar(20) DEFAULT '',
  `uraian` varchar(255) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `eviden` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.aktivitas_harian: 0 rows
/*!40000 ALTER TABLE `aktivitas_harian` DISABLE KEYS */;
/*!40000 ALTER TABLE `aktivitas_harian` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.atasan_langsung
CREATE TABLE IF NOT EXISTS `atasan_langsung` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.atasan_langsung: 0 rows
/*!40000 ALTER TABLE `atasan_langsung` DISABLE KEYS */;
/*!40000 ALTER TABLE `atasan_langsung` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.attempt
CREATE TABLE IF NOT EXISTS `attempt` (
  `id` int NOT NULL AUTO_INCREMENT,
  `attempt` varchar(3) DEFAULT NULL,
  `nip` varchar(60) DEFAULT NULL,
  `locked` varchar(50) DEFAULT NULL,
  `tanggal` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.attempt: ~0 rows (lebih kurang)

-- membuang struktur untuk table hrisori.authentication_log
CREATE TABLE IF NOT EXISTS `authentication_log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `authenticatable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `authenticatable_id` bigint unsigned NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `login_at` timestamp NULL DEFAULT NULL,
  `logout_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `authentication_log_authenticatable_type_authenticatable_id_index` (`authenticatable_type`,`authenticatable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel hrisori.authentication_log: ~0 rows (lebih kurang)

-- membuang struktur untuk table hrisori.baseurl_api
CREATE TABLE IF NOT EXISTS `baseurl_api` (
  `id` int NOT NULL AUTO_INCREMENT,
  `baseurl` varchar(160) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.baseurl_api: ~0 rows (lebih kurang)
INSERT INTO `baseurl_api` (`id`, `baseurl`) VALUES
	(1, 'http://10.1.85.223:7071');

-- membuang struktur untuk table hrisori.beban_pph
CREATE TABLE IF NOT EXISTS `beban_pph` (
  `id` int NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `beban_pph21` double NOT NULL DEFAULT '0',
  `kode` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode` (`kode`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.beban_pph: 10 rows
/*!40000 ALTER TABLE `beban_pph` DISABLE KEYS */;
INSERT INTO `beban_pph` (`id`, `blth`, `nip`, `beban_pph21`, `kode`) VALUES
	(1, '2023-09', '0123001PRO', 114500, '2023-090123001PRO'),
	(2, '2023-09', '0222003PRO', 0, '2023-090222003PRO'),
	(3, '2023-09', '6220002PRO', 1345750, '2023-096220002PRO'),
	(4, '2023-09', '6320006PRO', 2295250, '2023-096320006PRO'),
	(5, '2023-09', '6610430HPI', 727000, '2023-096610430HPI'),
	(6, '2023-09', '6692077Z', 2716875, '2023-096692077Z'),
	(7, '2023-09', '6793082D', 51454444, '2023-096793082D'),
	(8, '2023-09', '6793121Z', 14210000, '2023-096793121Z'),
	(9, '2023-09', '6794003E', 16599359, '2023-096794003E'),
	(10, '2023-09', '6805003TRK', 3475625, '2023-096805003TRK');
/*!40000 ALTER TABLE `beban_pph` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.beban_pph21
CREATE TABLE IF NOT EXISTS `beban_pph21` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kpp` varchar(120) DEFAULT '',
  `npwp` varchar(15) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` double NOT NULL DEFAULT '0',
  `gaji` double NOT NULL DEFAULT '0',
  `tunjangan_pph` double NOT NULL DEFAULT '0',
  `tunjangan_variable` double NOT NULL DEFAULT '0',
  `honorarium` double NOT NULL DEFAULT '0',
  `benefit` double NOT NULL DEFAULT '0',
  `natuna` double NOT NULL DEFAULT '0',
  `beban_pph21` double NOT NULL DEFAULT '0',
  `bonus_thr` double NOT NULL DEFAULT '0',
  `brutob` double NOT NULL DEFAULT '0',
  `biaya_jabatanb` double NOT NULL DEFAULT '0',
  `iuran_pensiunb` double NOT NULL DEFAULT '0',
  `brutot` double NOT NULL DEFAULT '0',
  `biaya_jabatant` double NOT NULL DEFAULT '0',
  `iuran_pensiunt` double NOT NULL DEFAULT '0',
  `biaya_pengurangt` double NOT NULL DEFAULT '0',
  `nettot` double NOT NULL DEFAULT '0',
  `brutot_total` double NOT NULL DEFAULT '0',
  `biaya_jabatant_total` double NOT NULL DEFAULT '0',
  `iuran_pensiunt_total` double NOT NULL DEFAULT '0',
  `biaya_pengurangt_total` double NOT NULL DEFAULT '0',
  `nettot_total` double NOT NULL DEFAULT '0',
  `nettot_sebelumnya` double NOT NULL DEFAULT '0',
  `nettot_akhir` double NOT NULL DEFAULT '0',
  `ptkp` double NOT NULL DEFAULT '0',
  `pkp` double NOT NULL DEFAULT '0',
  `ppht` double NOT NULL DEFAULT '0',
  `ppht_sebelumnya` double NOT NULL DEFAULT '0',
  `ppht_terutang` double NOT NULL DEFAULT '0',
  `pphb1_terutang` double NOT NULL DEFAULT '0',
  `pphb2_terutang` double NOT NULL DEFAULT '0',
  `pph_sistem` double NOT NULL DEFAULT '0',
  `pph_koreksi` double NOT NULL DEFAULT '0',
  `pphb_terutang` double NOT NULL DEFAULT '0',
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  `blth_gaji` varchar(10) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.beban_pph21: 2 rows
/*!40000 ALTER TABLE `beban_pph21` DISABLE KEYS */;
/*!40000 ALTER TABLE `beban_pph21` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.biaya_restitusi
CREATE TABLE IF NOT EXISTS `biaya_restitusi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idsppd` varchar(120) DEFAULT '',
  `jenis_restitusi` varchar(200) DEFAULT '',
  `nilai` double NOT NULL DEFAULT '0',
  `keterangan` text,
  `lampiran` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.biaya_restitusi: ~10 rows (lebih kurang)
INSERT INTO `biaya_restitusi` (`id`, `idsppd`, `jenis_restitusi`, `nilai`, `keterangan`, `lampiran`) VALUES
	(1, '2021000043', 'Tiket Pesawat', 1200000, 'Balikpapan - Makassar', './assets/restitusi/2021000043/restitusi-202100004311622629923.zip'),
	(2, '2021000043', 'Tiket Taksi Darat', 60000, 'Makassar - Parepare', ''),
	(3, '2021000043', 'Pemeriksaan Kesehatan', 150000, 'Balikpapan', ''),
	(4, '2021000043', 'Tiket Taksi Darat', 60000, 'Parepare - Makassar', ''),
	(5, '2021000043', 'Tiket Pesawat', 1200000, 'Makassar - Balikpapan', ''),
	(6, '2021000043', 'Pemeriksaan Kesehatan', 250000, 'Makassar', ''),
	(7, '2021000044', '', 0, NULL, ''),
	(8, '2021000045', '', 0, NULL, ''),
	(9, '2021000046', '', 0, NULL, ''),
	(10, '2021000047', '', 0, NULL, '');

-- membuang struktur untuk table hrisori.biaya_restitusidummy
CREATE TABLE IF NOT EXISTS `biaya_restitusidummy` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idsppd` varchar(120) DEFAULT '',
  `jenis_restitusi` varchar(200) DEFAULT '',
  `nilai` double NOT NULL DEFAULT '0',
  `keterangan` text,
  `lampiran` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.biaya_restitusidummy: 0 rows
/*!40000 ALTER TABLE `biaya_restitusidummy` DISABLE KEYS */;
/*!40000 ALTER TABLE `biaya_restitusidummy` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.biaya_sppd
CREATE TABLE IF NOT EXISTS `biaya_sppd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idsppd` varchar(120) NOT NULL DEFAULT '',
  `transport1a` double NOT NULL DEFAULT '0',
  `transport1b` double NOT NULL DEFAULT '0',
  `transport1c` double NOT NULL DEFAULT '0',
  `transport1d` double NOT NULL DEFAULT '0',
  `transportasi_lokal1` double NOT NULL DEFAULT '0',
  `konsumsi1` double NOT NULL DEFAULT '0',
  `laundry1` double NOT NULL DEFAULT '0',
  `penginapan1` double NOT NULL DEFAULT '0',
  `transport2a` double NOT NULL DEFAULT '0',
  `transport2b` double NOT NULL DEFAULT '0',
  `transport2c` double NOT NULL DEFAULT '0',
  `transport2d` double NOT NULL DEFAULT '0',
  `transportasi_lokal2` double NOT NULL DEFAULT '0',
  `konsumsi2` double NOT NULL DEFAULT '0',
  `laundry2` double NOT NULL DEFAULT '0',
  `penginapan2` double NOT NULL DEFAULT '0',
  `transport3a` double NOT NULL DEFAULT '0',
  `transport3b` double NOT NULL DEFAULT '0',
  `transport3c` double NOT NULL DEFAULT '0',
  `transport3d` double NOT NULL DEFAULT '0',
  `transportasi_lokal3` double NOT NULL DEFAULT '0',
  `konsumsi3` double NOT NULL DEFAULT '0',
  `laundry3` double NOT NULL DEFAULT '0',
  `penginapan3` double NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idsppd` (`idsppd`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.biaya_sppd: 3 rows
/*!40000 ALTER TABLE `biaya_sppd` DISABLE KEYS */;
INSERT INTO `biaya_sppd` (`id`, `idsppd`, `transport1a`, `transport1b`, `transport1c`, `transport1d`, `transportasi_lokal1`, `konsumsi1`, `laundry1`, `penginapan1`, `transport2a`, `transport2b`, `transport2c`, `transport2d`, `transportasi_lokal2`, `konsumsi2`, `laundry2`, `penginapan2`, `transport3a`, `transport3b`, `transport3c`, `transport3d`, `transportasi_lokal3`, `konsumsi3`, `laundry3`, `penginapan3`, `total`) VALUES
	(1, '2020000001', 0, 0, 0, 0, 300000, 720000, 80000, 1200000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2300000),
	(2, '2020000002', 0, 0, 0, 0, 300000, 360000, 80000, 700000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1440000),
	(3, '2020000003', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
/*!40000 ALTER TABLE `biaya_sppd` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.biaya_sppd1
CREATE TABLE IF NOT EXISTS `biaya_sppd1` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idsppd` varchar(120) DEFAULT '',
  `transportasi` double NOT NULL DEFAULT '0',
  `transporta` double NOT NULL DEFAULT '0',
  `transportb` double NOT NULL DEFAULT '0',
  `transportc` double NOT NULL DEFAULT '0',
  `transportd` double NOT NULL DEFAULT '0',
  `total_transport` double NOT NULL DEFAULT '0',
  `transportasi_lokal` double NOT NULL DEFAULT '0',
  `airport_tax` double NOT NULL DEFAULT '0',
  `hari_konsumsi1` double NOT NULL DEFAULT '0',
  `persen_konsumsi1` double NOT NULL DEFAULT '0',
  `nilai_konsumsi1` double NOT NULL DEFAULT '0',
  `total_konsumsi1` double NOT NULL DEFAULT '0',
  `hari_laundry1` double NOT NULL DEFAULT '0',
  `persen_laundry1` double NOT NULL DEFAULT '0',
  `nilai_laundry1` double NOT NULL DEFAULT '0',
  `total_laundry1` double NOT NULL DEFAULT '0',
  `hari_penginapan1` double NOT NULL DEFAULT '0',
  `persen_penginapan1` double NOT NULL DEFAULT '0',
  `nilai_penginapan1` double NOT NULL DEFAULT '0',
  `total_penginapan1` double NOT NULL DEFAULT '0',
  `hari_konsumsi2` double NOT NULL DEFAULT '0',
  `persen_konsumsi2` double NOT NULL DEFAULT '0',
  `nilai_konsumsi2` double NOT NULL DEFAULT '0',
  `total_konsumsi2` double NOT NULL DEFAULT '0',
  `hari_laundry2` double NOT NULL DEFAULT '0',
  `persen_laundry2` double NOT NULL DEFAULT '0',
  `nilai_laundry2` double NOT NULL DEFAULT '0',
  `total_laundry2` double NOT NULL DEFAULT '0',
  `hari_penginapan2` double NOT NULL DEFAULT '0',
  `persen_penginapan2` double NOT NULL DEFAULT '0',
  `nilai_penginapan2` double NOT NULL DEFAULT '0',
  `total_penginapan2` double NOT NULL DEFAULT '0',
  `hari_pegawai` double NOT NULL DEFAULT '0',
  `persen_pegawai` double NOT NULL DEFAULT '0',
  `nilai_pegawai` double NOT NULL DEFAULT '0',
  `total_pegawai` double NOT NULL DEFAULT '0',
  `keluarga` double NOT NULL DEFAULT '0',
  `hari_keluarga` double NOT NULL DEFAULT '0',
  `persen_keluarga` double NOT NULL DEFAULT '0',
  `nilai_keluarga` double NOT NULL DEFAULT '0',
  `total_keluarga` double NOT NULL DEFAULT '0',
  `pengantar` double NOT NULL DEFAULT '0',
  `hari_pengantar` double NOT NULL DEFAULT '0',
  `persen_pengantar` double NOT NULL DEFAULT '0',
  `nilai_pengantar` double NOT NULL DEFAULT '0',
  `total_pengantar` double NOT NULL DEFAULT '0',
  `hari_suamiistri` double NOT NULL DEFAULT '0',
  `persen_suamiistri` double NOT NULL DEFAULT '0',
  `nilai_suamiistri` double NOT NULL DEFAULT '0',
  `total_suamiistri` double NOT NULL DEFAULT '0',
  `anak` double NOT NULL DEFAULT '0',
  `hari_anak` double NOT NULL DEFAULT '0',
  `persen_anak` double NOT NULL DEFAULT '0',
  `nilai_anak` double NOT NULL DEFAULT '0',
  `total_anak` double NOT NULL DEFAULT '0',
  `berat_pengepakan` double NOT NULL DEFAULT '0',
  `nilai_pengepakan` double NOT NULL DEFAULT '0',
  `total_pengepakan` double NOT NULL DEFAULT '0',
  `kurs_ln` double NOT NULL DEFAULT '0',
  `transporta_ln` double NOT NULL DEFAULT '0',
  `transportb_ln` double NOT NULL DEFAULT '0',
  `transportc_ln` double NOT NULL DEFAULT '0',
  `transportd_ln` double NOT NULL DEFAULT '0',
  `transportasi_lokal_ln` double NOT NULL DEFAULT '0',
  `airport_tax_ln` double NOT NULL DEFAULT '0',
  `hari_lumpsum` double NOT NULL DEFAULT '0',
  `nilai_lumpsum` double NOT NULL DEFAULT '0',
  `hari_pegawai_ln` double NOT NULL DEFAULT '0',
  `persen_pegawai_ln` double NOT NULL DEFAULT '0',
  `nilai_pegawai_ln` double NOT NULL DEFAULT '0',
  `hari_keluarga_ln` double NOT NULL DEFAULT '0',
  `persen_keluarga_ln` double NOT NULL DEFAULT '0',
  `nilai_keluarga_ln` double NOT NULL DEFAULT '0',
  `hari_pengantar_ln` double NOT NULL DEFAULT '0',
  `persen_pengantar_ln` double NOT NULL DEFAULT '0',
  `nilai_pengantar_ln` double NOT NULL DEFAULT '0',
  `baju_hangat_ln` double NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idsppd` (`idsppd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.biaya_sppd1: ~11 rows (lebih kurang)
INSERT INTO `biaya_sppd1` (`id`, `idsppd`, `transportasi`, `transporta`, `transportb`, `transportc`, `transportd`, `total_transport`, `transportasi_lokal`, `airport_tax`, `hari_konsumsi1`, `persen_konsumsi1`, `nilai_konsumsi1`, `total_konsumsi1`, `hari_laundry1`, `persen_laundry1`, `nilai_laundry1`, `total_laundry1`, `hari_penginapan1`, `persen_penginapan1`, `nilai_penginapan1`, `total_penginapan1`, `hari_konsumsi2`, `persen_konsumsi2`, `nilai_konsumsi2`, `total_konsumsi2`, `hari_laundry2`, `persen_laundry2`, `nilai_laundry2`, `total_laundry2`, `hari_penginapan2`, `persen_penginapan2`, `nilai_penginapan2`, `total_penginapan2`, `hari_pegawai`, `persen_pegawai`, `nilai_pegawai`, `total_pegawai`, `keluarga`, `hari_keluarga`, `persen_keluarga`, `nilai_keluarga`, `total_keluarga`, `pengantar`, `hari_pengantar`, `persen_pengantar`, `nilai_pengantar`, `total_pengantar`, `hari_suamiistri`, `persen_suamiistri`, `nilai_suamiistri`, `total_suamiistri`, `anak`, `hari_anak`, `persen_anak`, `nilai_anak`, `total_anak`, `berat_pengepakan`, `nilai_pengepakan`, `total_pengepakan`, `kurs_ln`, `transporta_ln`, `transportb_ln`, `transportc_ln`, `transportd_ln`, `transportasi_lokal_ln`, `airport_tax_ln`, `hari_lumpsum`, `nilai_lumpsum`, `hari_pegawai_ln`, `persen_pegawai_ln`, `nilai_pegawai_ln`, `hari_keluarga_ln`, `persen_keluarga_ln`, `nilai_keluarga_ln`, `hari_pengantar_ln`, `persen_pengantar_ln`, `nilai_pengantar_ln`, `baju_hangat_ln`, `total`) VALUES
	(1, '2025000001', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(2, '2025000002', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(3, '2025000003', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(4, '2025000004', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(5, '2025000005', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(6, '2025000006', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(7, '2025000007', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(8, '2025000008', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(9, '2025000009', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(11, '2025000010', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- membuang struktur untuk table hrisori.bonus
CREATE TABLE IF NOT EXISTS `bonus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `niptahun` varchar(60) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_pegawai` varchar(10) DEFAULT '',
  `jumlah_bulan` double NOT NULL DEFAULT '0',
  `p1` double NOT NULL DEFAULT '0',
  `p21` double NOT NULL DEFAULT '0',
  `p22` double NOT NULL DEFAULT '0',
  `koefisien` double NOT NULL DEFAULT '0',
  `bonus` double NOT NULL DEFAULT '0',
  `ppht_upah` double NOT NULL DEFAULT '0',
  `ppht_upah_bonus` double NOT NULL DEFAULT '0',
  `pph21` double NOT NULL DEFAULT '0',
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  `keterangan` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `niptahun` (`niptahun`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.bonus: 9 rows
/*!40000 ALTER TABLE `bonus` DISABLE KEYS */;
INSERT INTO `bonus` (`id`, `blth`, `tahun`, `nip`, `niptahun`, `tgl_masuk`, `tgl_pegawai`, `jumlah_bulan`, `p1`, `p21`, `p22`, `koefisien`, `bonus`, `ppht_upah`, `ppht_upah_bonus`, `pph21`, `tgl_proses`, `petugas`, `keterangan`) VALUES
	(1, '2020-12', '2019', '8017001TRK', '2019.8017001TRK', '2017-12-01', '2017-12-01', 0, 9488506, 2506000, 2870000, 0, 26252366.064777, 0, 0, 0, '2020-12-31', 'hary', ''),
	(2, '2020-12', '2019', '7410021TRK', '2019.7410021TRK', '2011-01-04', '2011-01-04', 0, 6487728, 2389800, 1816000, 0, 17263794, 0, 0, 0, '2020-12-31', 'hary', ''),
	(3, '2020-12', '2019', '8110015TRK', '2019.8110015TRK', '2011-01-04', '2011-01-04', 0, 6437163, 2389800, 1816000, 0, 18143571, 0, 0, 0, '2020-12-31', 'hary', ''),
	(4, '2020-12', '2019', '9219004ZTY', '2019.9219004ZTY', '2019-04-01', '2019-04-01', 0, 6013530, 800000, 1596000, 0, 16551000, 0, 0, 0, '2020-12-31', 'hary', ''),
	(5, '2020-12', '2019', '8010035TRK', '2019.8010035TRK', '2011-01-04', '2011-01-04', 0, 8016195, 2506000, 2870000, 0, 22725729, 0, 0, 0, '2020-12-31', 'hary', ''),
	(6, '2020-12', '2019', '9219005ZTY', '2019.9219005ZTY', '2019-04-01', '2019-04-01', 0, 6013530, 593600, 1135000, 0, 16551000, 0, 0, 0, '2020-12-31', 'hary', ''),
	(7, '2020-12', '2019', '8212543HPI', '2019.8212543HPI', '2019-07-01', '2019-07-01', 0, 2803560, 424000, 1064000, 0, 2787953.1376518, 0, 0, 0, '2020-12-31', 'hary', ''),
	(8, '2020-12', '2019', '7212537HPI', '2019.7212537HPI', '2019-07-01', '2019-07-01', 0, 3110349, 424000, 1064000, 0, 3093034.3041498, 0, 0, 0, '2020-12-31', 'hary', ''),
	(9, '2020-12', '2019', '8010036TRK', '2019.8010036TRK', '2011-01-04', '2011-01-04', 0, 9276741, 2389800, 3796000, 0, 26239071, 0, 0, 0, '2020-12-31', 'hary', '');
/*!40000 ALTER TABLE `bonus` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.cuti
CREATE TABLE IF NOT EXISTS `cuti` (
  `id` int NOT NULL AUTO_INCREMENT,
  `periode_awal` varchar(10) DEFAULT '',
  `periode_akhir` varchar(10) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `tgl_pengajuan` varchar(10) DEFAULT '',
  `jenis_cuti` varchar(120) DEFAULT '',
  `tgl_awal` varchar(10) DEFAULT '',
  `tgl_akhir` varchar(10) DEFAULT '',
  `hari` double NOT NULL DEFAULT '0',
  `keperluan_cuti` varchar(255) DEFAULT '',
  `alamat` varchar(255) DEFAULT '',
  `telepon` varchar(60) DEFAULT '',
  `approve1` varchar(1) DEFAULT '0',
  `approval1` varchar(120) DEFAULT NULL,
  `tgl_approve1` varchar(160) DEFAULT NULL,
  `alasan_reject1` varchar(255) DEFAULT '',
  `approve2` varchar(1) NOT NULL DEFAULT '0',
  `approval2` varchar(60) DEFAULT '',
  `tgl_approve2` varchar(10) DEFAULT '',
  `alasan_reject2` varchar(255) DEFAULT '',
  `tgl_update` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.cuti: 9 rows
/*!40000 ALTER TABLE `cuti` DISABLE KEYS */;
INSERT INTO `cuti` (`id`, `periode_awal`, `periode_akhir`, `nip`, `tgl_pengajuan`, `jenis_cuti`, `tgl_awal`, `tgl_akhir`, `hari`, `keperluan_cuti`, `alamat`, `telepon`, `approve1`, `approval1`, `tgl_approve1`, `alasan_reject1`, `approve2`, `approval2`, `tgl_approve2`, `alasan_reject2`, `tgl_update`, `petugas`) VALUES
	(1, '2023-01-12', '2024-01-12', '8105027TRK', '2023-03-10', '', '2023-03-13', '2023-03-14', 2, 'Keperluan keluarga', 'Bakungan Siswidipuran RT 05 RW 10 Boyolali', '082153129411', '2', '6793082D', '2023-03-29', '', '0', '', '', '', '', ''),
	(2, '', '', '8610445Z', '2021-03-08', 'Cuti Tahunan', '2021-03-08', '2021-03-10', 3, '-', '-', '-', '1', 'by sistem', '2021-03-08', '', '1', 'by sistem', '2021-03-08', '', '', ''),
	(3, '', '', '8610445Z', '2021-05-27', 'Cuti Tahunan', '2021-05-27', '2021-05-28', 2, '-', '-', '-', '1', 'by sistem', '2021-05-27', '', '1', 'by sistem', '2021-05-27', '', '', ''),
	(4, '', '', '8017001TRK', '2021-02-15', 'Cuti Tahunan', '2021-02-15', '2021-02-17', 3, '-', '-', '-', '1', 'by sistem', '2021-02-15', '', '1', 'by sistem', '2021-02-15', '', '', ''),
	(5, '', '', '8010038TRK', '2021-05-27', 'Cuti Tahunan', '2021-05-27', '2021-06-02', 4, '-', '-', '-', '1', 'by sistem', '2021-05-27', '', '1', 'by sistem', '2021-05-27', '', '', ''),
	(6, '', '', '8610009TRK', '2021-05-06', 'Cuti Tahunan', '2021-05-06', '2021-05-31', 12, '-', '-', '-', '1', 'by sistem', '2021-05-06', '', '1', 'by sistem', '2021-05-06', '', '', ''),
	(7, '', '', '8610009TRK', '2021-06-02', 'Cuti Tahunan', '2021-06-02', '2021-06-30', 12, '-', '-', '-', '1', 'by sistem', '2021-06-02', '', '1', 'by sistem', '2021-06-02', '', '', ''),
	(8, '', '', '8610009TRK', '2021-07-01', 'Cuti Tahunan', '2021-07-01', '2021-07-05', 4, '-', '-', '-', '1', 'by sistem', '2021-07-01', '', '1', 'by sistem', '2021-07-01', '', '', ''),
	(9, '', '', '7910008TRK', '2021-01-25', 'Cuti Tahunan', '2021-07-15', '2021-07-23', 5, 'Keperluan vaksin dan keluarga', '-mataram', '-081350486257', '1', 'by sistem', '2021-01-25', '', '1', 'by sistem', '2021-01-25', '', '', '');
/*!40000 ALTER TABLE `cuti` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.cuti_besar
CREATE TABLE IF NOT EXISTS `cuti_besar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `niptahun` varchar(60) DEFAULT '',
  `uang_cuti` double NOT NULL DEFAULT '0',
  `tgl_update` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `niptahun` (`niptahun`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.cuti_besar: ~0 rows (lebih kurang)

-- membuang struktur untuk table hrisori.cuti_tahunan
CREATE TABLE IF NOT EXISTS `cuti_tahunan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `niptahun` varchar(120) DEFAULT NULL,
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_pegawai` varchar(10) DEFAULT '',
  `masa_kerja` double NOT NULL DEFAULT '0',
  `gaji` double NOT NULL DEFAULT '0',
  `koefisien` double NOT NULL DEFAULT '0',
  `uang_cuti` double NOT NULL DEFAULT '0',
  `ppht_upah` double NOT NULL DEFAULT '0',
  `ppht_upah_cuti` double NOT NULL DEFAULT '0',
  `pph21` double NOT NULL DEFAULT '0',
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  `keterangan` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `niptahun` (`niptahun`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.cuti_tahunan: 8 rows
/*!40000 ALTER TABLE `cuti_tahunan` DISABLE KEYS */;
INSERT INTO `cuti_tahunan` (`id`, `blth`, `tahun`, `nip`, `niptahun`, `tgl_masuk`, `tgl_pegawai`, `masa_kerja`, `gaji`, `koefisien`, `uang_cuti`, `ppht_upah`, `ppht_upah_cuti`, `pph21`, `tgl_proses`, `petugas`, `keterangan`) VALUES
	(1, '2020-12', '2020', '7205009TRK', '2020.7205009TRK', '2005-01-12', '2005-01-12', 15, 6494942, 0, 6494942, 0, 0, 0, '2020-12-31', 'hary', ''),
	(2, '2020-04', '2020', '7410021TRK', '2020.7410021TRK', '2011-01-04', '2011-01-04', 9, 6487728, 0, 5754598, 0, 0, 0, '2020-12-31', 'hary', ''),
	(3, '2020-04', '2020', '8110015TRK', '2020.8110015TRK', '2011-01-04', '2011-01-04', 9, 6437163, 0, 6047857, 0, 0, 0, '2020-12-31', 'hary', ''),
	(4, '2020-04', '2020', '9219004ZTY', '2020.9219004ZTY', '2019-04-01', '2019-04-01', 1, 6013530, 0, 5517000, 0, 0, 0, '2020-12-31', 'hary', ''),
	(5, '2020-04', '2020', '8010035TRK', '2020.8010035TRK', '2011-01-04', '2011-01-04', 9, 8016195, 0, 7575243, 0, 0, 0, '2020-12-31', 'hary', ''),
	(6, '2020-04', '2020', '9219005ZTY', '2020.9219005ZTY', '2019-04-01', '2019-04-01', 1, 6013530, 0, 5517000, 0, 0, 0, '2020-12-31', 'hary', ''),
	(7, '2020-04', '2020', '8010036TRK', '2020.8010036TRK', '2011-01-04', '2011-01-04', 9, 9276741, 0, 8746357, 0, 0, 0, '2020-12-31', 'hary', ''),
	(8, '2020-04', '2020', '8010038TRK', '2020.8010038TRK', '2011-01-04', '2011-01-04', 9, 7809210, 0, 6927333, 0, 0, 0, '2020-12-31', 'hary', '');
/*!40000 ALTER TABLE `cuti_tahunan` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.data_aktivitas
CREATE TABLE IF NOT EXISTS `data_aktivitas` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(10) DEFAULT '',
  `jam` varchar(8) DEFAULT '',
  `user` varchar(200) DEFAULT '',
  `aktivitas` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.data_aktivitas: 10 rows
/*!40000 ALTER TABLE `data_aktivitas` DISABLE KEYS */;
INSERT INTO `data_aktivitas` (`id`, `tanggal`, `jam`, `user`, `aktivitas`) VALUES
	(1, '2019-07-26', '22:33:02', 'sandy', 'Penambahan data pegawai dengan NIP : 1212121, Nama : TES'),
	(2, '2019-07-26', '23:19:57', 'sandy', 'Update data pegawai dengan NIP : , Nama : '),
	(3, '2019-07-26', '23:22:01', 'sandy', 'Update data pegawai dengan NIP : 1212121, Nama : TES'),
	(4, '2019-07-26', '23:22:47', 'sandy', 'Update data pegawai dengan NIP : 1212121, Nama : TES'),
	(5, '2019-07-26', '23:24:14', 'sandy', 'Update data pegawai dengan NIP : 1212121, Nama : TES'),
	(6, '2019-07-26', '23:25:40', 'sandy', 'Update data pegawai dengan NIP : 1212121, Nama : TES'),
	(7, '2019-07-26', '23:27:13', 'sandy', 'Update data pegawai dengan NIP : 1212121, Nama : TES'),
	(8, '2019-07-26', '23:28:23', 'sandy', 'Update data pegawai dengan NIP : 1212121, Nama : TES'),
	(9, '2019-07-26', '23:29:14', 'sandy', 'Update data pegawai dengan NIP : 1212121, Nama : TES'),
	(10, '2019-07-26', '23:29:43', 'sandy', 'Update data pegawai dengan NIP : 1212121, Nama : TES');
/*!40000 ALTER TABLE `data_aktivitas` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.data_keluarga
CREATE TABLE IF NOT EXISTS `data_keluarga` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `nama` varchar(200) DEFAULT '',
  `jenis_kelamin` varchar(1) DEFAULT '',
  `tgl_lahir` varchar(10) DEFAULT '',
  `hubungan_keluarga` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.data_keluarga: 9 rows
/*!40000 ALTER TABLE `data_keluarga` DISABLE KEYS */;
INSERT INTO `data_keluarga` (`id`, `nip`, `nama`, `jenis_kelamin`, `tgl_lahir`, `hubungan_keluarga`) VALUES
	(1, '7719002PCN', 'Ayu', 'P', '1988-11-11', 'Istri'),
	(2, '7719002PCN', 'Aisyah Nur Jannah', 'P', '2008-12-25', 'Anak Ke 2'),
	(3, '7719002PCN', 'Ghina Nur Khalishah', 'P', '2018-02-20', 'Anak Ke 4'),
	(4, '7719002PCN', 'Adyansyah', 'L', '2005-01-22', 'Anak Ke 1'),
	(5, '7719002PCN', 'Sanika Khaulatunnisa', 'P', '2013-01-26', 'Anak Ke 3'),
	(6, '9219008ZTY', 'HUSNUL KHOTIMAH', 'P', '1993-12-29', 'Istri'),
	(7, '6793163Z', 'COKORDA ISTRI ASTINI', 'P', '1973-03-09', 'Istri'),
	(8, '6793163Z', 'I GEDE NGURAH EKA DHARMAYUDHA', 'L', '1998-10-05', 'Anak Ke 1'),
	(9, '6793163Z', 'I MADE NGURAH CHANDRA MARUTHA', 'L', '2000-07-16', 'Anak Ke 2');
/*!40000 ALTER TABLE `data_keluarga` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.data_pegawai
CREATE TABLE IF NOT EXISTS `data_pegawai` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `grade` varchar(20) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_capeg` varchar(10) DEFAULT '',
  `tgl_tetap` varchar(10) DEFAULT '',
  `title` varchar(30) DEFAULT '',
  `nama` varchar(200) DEFAULT '' COMMENT 'use in get_atasan_langsung',
  `gelar_depan` varchar(30) DEFAULT '',
  `gelar_belakang` varchar(30) DEFAULT '',
  `know_as` varchar(120) DEFAULT '',
  `tempat_lahir` varchar(120) DEFAULT '',
  `tgl_lahir` varchar(10) DEFAULT '',
  `kode_negara` varchar(2) DEFAULT '',
  `jenis_kelamin` varchar(30) DEFAULT '',
  `id_agama` varchar(3) DEFAULT '',
  `status_nikah` varchar(30) DEFAULT '',
  `tgl_nikah` varchar(10) DEFAULT '',
  `status_warganegara` varchar(30) DEFAULT '',
  `gol_darah` varchar(10) DEFAULT '',
  `suku` varchar(60) DEFAULT '',
  `telepon_utama` varchar(30) DEFAULT '',
  `telepon_cadangan1` varchar(30) DEFAULT '',
  `telepon_cadangan2` varchar(30) DEFAULT '',
  `telepon_cadangan3` varchar(30) DEFAULT '',
  `telepon_darurat` varchar(30) DEFAULT '',
  `jenis_dplk` varchar(200) DEFAULT '',
  `id_dplk` varchar(30) DEFAULT '',
  `bank_dplk` varchar(30) DEFAULT '',
  `no_bpjs_kes` varchar(30) DEFAULT '',
  `no_bpjs_tk` varchar(30) DEFAULT '',
  `bank_payroll` varchar(30) DEFAULT '',
  `an_payroll` varchar(60) DEFAULT '',
  `no_rek_payroll` varchar(30) DEFAULT '',
  `status_integrasi` varchar(1) NOT NULL DEFAULT '0',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '1',
  `tgl_berhenti` varchar(10) DEFAULT '',
  `atasan_langsung` varchar(60) NOT NULL DEFAULT '',
  `atasan_atasan_langsung` varchar(60) DEFAULT '',
  `level_sppd` varchar(1) DEFAULT '',
  `jenis_mutasi` varchar(120) NOT NULL DEFAULT 'BARU',
  `jenis` varchar(120) DEFAULT '',
  `no_sk` varchar(200) DEFAULT '',
  `alamat` varchar(200) DEFAULT '',
  `alamat_domisili` varchar(200) DEFAULT '',
  `divisi` varchar(200) DEFAULT '',
  `bidang` varchar(200) DEFAULT '',
  `sub_bidang` varchar(200) DEFAULT '',
  `region` varchar(200) DEFAULT '',
  `unit` varchar(200) DEFAULT '',
  `penempatan` varchar(200) DEFAULT '',
  `skala_grade` varchar(30) DEFAULT '',
  `pendidikan` varchar(120) DEFAULT '',
  `jurusan` varchar(200) DEFAULT '',
  `nik` varchar(300) DEFAULT '',
  `no_kk` varchar(300) DEFAULT '',
  `status` varchar(10) DEFAULT '',
  `telepon` varchar(250) DEFAULT '',
  `tgl_pegawai` varchar(10) DEFAULT '',
  `tgl_awal_pkwt` varchar(10) DEFAULT '',
  `tgl_akhir_pkwt` varchar(10) DEFAULT '',
  `tgl_awal_pkwtt` varchar(10) DEFAULT '',
  `tgl_awal_tugaskarya` varchar(10) DEFAULT '',
  `tgl_akhir_tugaskarya` varchar(10) DEFAULT '',
  `email` varchar(120) DEFAULT '',
  `email2` varchar(120) DEFAULT '',
  `agama` varchar(1) DEFAULT '',
  `npwp` varchar(250) DEFAULT '',
  `kpp` varchar(120) DEFAULT '',
  `nama_bank` varchar(120) DEFAULT '',
  `no_rekening` varchar(64) DEFAULT '',
  `nama_rekening` varchar(200) DEFAULT '',
  `nama_bank2` varchar(120) DEFAULT '',
  `no_rekening2` varchar(120) DEFAULT '',
  `nama_rekening2` varchar(200) DEFAULT '',
  `ibu_kandung` varchar(255) DEFAULT '',
  `baju` varchar(20) DEFAULT '',
  `celana` varchar(20) DEFAULT '',
  `sepatu` varchar(20) DEFAULT '',
  `tgl_bpjs_kes` varchar(10) DEFAULT '',
  `va_bpjs_kes` varchar(120) DEFAULT '',
  `tgl_bpjs_tk` varchar(10) DEFAULT '',
  `va_bpjs_tk` varchar(120) DEFAULT '',
  `no_inhealth` varchar(200) DEFAULT '',
  `tgl_inhealth` varchar(10) DEFAULT '',
  `nama_bankdplk` varchar(60) DEFAULT '',
  `no_rekeningdplk` varchar(60) DEFAULT '',
  `no_cifdplk` varchar(30) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `password` varchar(255) DEFAULT NULL,
  `akses` varchar(120) NOT NULL DEFAULT 'android',
  `kode_device` varchar(200) DEFAULT '',
  `userid` varchar(255) DEFAULT '',
  `welcome` varchar(1) NOT NULL DEFAULT '1',
  `foto` varchar(200) DEFAULT '',
  `approval_sdm` varchar(1) NOT NULL DEFAULT '0',
  `approval_pembayaran` varchar(1) NOT NULL DEFAULT '0',
  `approval_konsumsi` varchar(1) NOT NULL DEFAULT '0',
  `kasir` varchar(1) NOT NULL DEFAULT '0',
  `kd_project_sap` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.data_pegawai: ~10 rows (lebih kurang)
INSERT INTO `data_pegawai` (`id`, `nip`, `jabatan`, `grade`, `start_date`, `end_date`, `tgl_masuk`, `tgl_capeg`, `tgl_tetap`, `title`, `nama`, `gelar_depan`, `gelar_belakang`, `know_as`, `tempat_lahir`, `tgl_lahir`, `kode_negara`, `jenis_kelamin`, `id_agama`, `status_nikah`, `tgl_nikah`, `status_warganegara`, `gol_darah`, `suku`, `telepon_utama`, `telepon_cadangan1`, `telepon_cadangan2`, `telepon_cadangan3`, `telepon_darurat`, `jenis_dplk`, `id_dplk`, `bank_dplk`, `no_bpjs_kes`, `no_bpjs_tk`, `bank_payroll`, `an_payroll`, `no_rek_payroll`, `status_integrasi`, `status_edit`, `tgl_edit`, `user_edit`, `aktif`, `tgl_berhenti`, `atasan_langsung`, `atasan_atasan_langsung`, `level_sppd`, `jenis_mutasi`, `jenis`, `no_sk`, `alamat`, `alamat_domisili`, `divisi`, `bidang`, `sub_bidang`, `region`, `unit`, `penempatan`, `skala_grade`, `pendidikan`, `jurusan`, `nik`, `no_kk`, `status`, `telepon`, `tgl_pegawai`, `tgl_awal_pkwt`, `tgl_akhir_pkwt`, `tgl_awal_pkwtt`, `tgl_awal_tugaskarya`, `tgl_akhir_tugaskarya`, `email`, `email2`, `agama`, `npwp`, `kpp`, `nama_bank`, `no_rekening`, `nama_rekening`, `nama_bank2`, `no_rekening2`, `nama_rekening2`, `ibu_kandung`, `baju`, `celana`, `sepatu`, `tgl_bpjs_kes`, `va_bpjs_kes`, `tgl_bpjs_tk`, `va_bpjs_tk`, `no_inhealth`, `tgl_inhealth`, `nama_bankdplk`, `no_rekeningdplk`, `no_cifdplk`, `keterangan`, `password`, `akses`, `kode_device`, `userid`, `welcome`, `foto`, `approval_sdm`, `approval_pembayaran`, `approval_konsumsi`, `kasir`, `kd_project_sap`) VALUES
	(1, '6793163Z', '', '', '1967-12-24', '9999-12-31', '1993-02-06', '1993-02-06', '1994-07-03', 'T1', 'I KETUT WIRIANA', 'GD8', '', 'Ir. I KETUT WIRIANA', 'MATARAM', '1967-12-24', 'ID', 'JK1', 'HND', 'SN2', '1998-12-31', 'SK1', '', 'BALI', '62811111724', '', '', '', '', 'JDPLK1', '', '', '0001770994506', '16003726268', 'BNI', 'I KETUT WIRIANA', '0001729328', '1', '0', '', '', '1', '', '', '', '', 'BARU', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'android', '', '', '1', '', '0', '0', '0', '0', ''),
	(2, '93151332ZY', '', '', '1993-07-07', '2024-05-31', '2015-07-01', '2015-07-01', '2015-07-01', 'T2', 'NI MADE MERTA KARTIKA SARI', '', 'GB5', 'NI MADE MERTA KARTIKA SARI', 'DENPASAR', '1993-07-07', 'ID', 'JK2', 'HND', 'SN2', '2018-07-20', 'SK1', '', 'BALI', '087761821842', '', '', '', '', 'JDPLK3', '800373401', 'BNI', '0002106594088', '16003457211', 'BNI', 'NI MADE MERTA KARTIKA SARI', '1424569762', '1', '0', '', '', '1', '', '', '', '', 'BARU', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'android', '', '', '1', '', '0', '0', '0', '0', ''),
	(3, '9720004ZTY', '', '', '1997-09-10', '9999-12-31', '2020-11-01', '2020-11-01', '2020-11-01', 'T1', 'ABDUL MALIK', '', 'GB5', 'ABDUL MALIK GB5', 'MAROS', '1997-09-10', 'ID', 'JK1', 'ISL', 'SN1', '', 'SK1', '', 'BUGIS', '082395235023', '', '', '', '', 'JDPLK3', '804545490', 'BNI', '0002041428284', '20088670904', 'BNI', 'ABD. MALIK', '1133366615', '1', '0', '', '', '1', '', '', '', '', 'BARU', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'android', '', '', '1', '', '0', '0', '0', '0', ''),
	(4, '6691029E', '', '', '1966-10-10', '9999-12-31', '1991-04-01', '1994-05-01', '1997-07-01', 'T1', 'ABDUL HARIS DAUD', '', 'GB103', 'ABDUL HARIS DAUD S.T.', 'GORONTALO', '1966-10-10', 'ID', 'JK1', 'ISL', 'SN2', '1991-10-05', 'SK1', '', 'GORONTALO', '085256335785', '', '', '', '', 'JDPLK1', '', '', '0002137969574', '16003782493', 'BRI', 'ABDUL HARIS DAUD', '517901003407508', '1', '0', '', '', '1', '', '', '', '', 'BARU', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'android', '', '', '1', '', '0', '0', '0', '0', ''),
	(5, '8017001TRK', '', '', '1980-01-28', '9999-12-31', '2017-03-01', '2017-03-01', '2017-03-01', 'T1', 'ADE JANUAR SUCIADI', '', 'GB103', 'ADE JANUAR SUCIADI S.T.', 'SUKABUMI', '1980-01-28', 'ID', 'JK1', 'ISL', 'SN2', '2016-09-02', 'SK1', '', 'SUNDA', '082112019399', '', '', '', '', 'JDPLK3', '802681038', 'BNI', '0001129338652', '02K00161376', 'BNI', 'ADE JANUAR SUCIADI', '0381218457', '1', '0', '', '', '1', '', '', '', '', 'BARU', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'android', '', '', '1', '', '0', '0', '0', '0', ''),
	(6, '7410021TRK', '', '', '1974-08-23', '9999-12-31', '2011-04-01', '2011-04-01', '2011-04-01', 'T1', 'ADRI HARYANTO', '', 'GB5', 'ADRI HARYANTO A.Md.', 'SAMARINDA', '1974-08-23', 'ID', 'JK1', 'ISL', 'SN2', '2001-01-12', 'SK1', '', 'BANJAR', '081350536952', '', '', '', '', 'JDPLK3', '795196801', 'BNI', '0001131983763', '06S20050214', 'BNI', 'ADRI HARYANTO', '0673679438', '1', '0', '', '', '1', '', '', '', '', 'BARU', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'android', '', '', '1', '', '0', '0', '0', '0', ''),
	(7, '9420009ZTY', '', '', '1994-02-20', '9999-12-31', '2020-11-01', '2020-11-01', '2020-11-01', 'T1', 'AFIF ASYKAR AMIR', '', 'GB103', 'AFIF ASYKAR AMIR S.T.', 'UJUNG PANDANG', '1994-02-20', 'ID', 'JK1', 'ISL', 'SN1', '', 'SK1', '', 'BUGIS', '085343647509', '', '', '', '', 'JDPLK3', '804595453', 'BNI', '0000127421561', '20088670946', 'BNI', 'AFIF ASYKAR AMIR', '1133679163', '1', '0', '', '', '1', '', '', '', '', 'BARU', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'android', '', '', '1', '', '0', '0', '0', '0', ''),
	(8, '92171742ZY', '', '', '1992-02-22', '2024-05-31', '2017-09-01', '2017-09-01', '2017-09-01', 'T1', 'AGIL FRASSETYO', '', 'GB65', 'AGIL FRASSETYO SE', 'JAKARTA', '1992-02-22', 'ID', 'JK1', 'ISL', 'SN1', '', 'SK1', '', 'JAKARTA', '082231844631', '', '', '', '', 'JDPLK3', '802394770', 'BNI', '0000039326916', '17044742975', 'BRI', 'AGIL FRASSETYO', '123701006656504', '1', '0', '', '', '1', '', '', '', '', 'BARU', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'android', '', '', '1', '', '0', '0', '0', '0', ''),
	(9, '8110015TRK', '', '', '1981-04-19', '9999-12-31', '2011-04-01', '2011-04-01', '2011-04-01', 'T1', 'AGUNG SEDAYU', '', 'GB5', 'AGUNG SEDAYU A.Md.', 'MALANG', '1981-04-19', 'ID', 'JK1', 'ISL', 'SN3', '2006-05-19', 'SK1', '', 'JAWA', '081346231482', '', '', '', '', 'JDPLK3', '795344797', 'BNI', '0001131988397', '06S20050594', 'BRI', 'AGUNG SEDAYU', '18301019012507', '1', '0', '', '', '1', '', '', '', '', 'BARU', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'android', '', '', '1', '', '0', '0', '0', '0', ''),
	(10, '8509719Z', '', '', '1985-10-01', '2024-02-28', '2009-12-01', '2009-12-01', '2009-12-01', 'T1', 'AINUL YAQIN', '', 'GB89', 'AINUL YAQIN S.M.', 'BANYUWANGI', '1985-10-01', 'ID', 'JK1', 'ISL', 'SN2', '2011-09-11', 'SK1', '', 'JAWA', '085213530546', '', '', '', '', 'JDPLK1', '', '', '0002614708629', '16003740137', 'BSI', 'AINUL YAQIN', '2101985558', '1', '0', '', '', '1', '', '', '', '', 'BARU', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'android', '', '', '1', '', '0', '0', '0', '0', '');

-- membuang struktur untuk table hrisori.data_project
CREATE TABLE IF NOT EXISTS `data_project` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kd_project_sap` varchar(30) DEFAULT '',
  `nama_project` varchar(250) DEFAULT '',
  `status` varchar(10) NOT NULL DEFAULT 'tYES',
  PRIMARY KEY (`id`),
  UNIQUE KEY `kd_project_sap` (`kd_project_sap`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.data_project: 10 rows
/*!40000 ALTER TABLE `data_project` DISABLE KEYS */;
INSERT INTO `data_project` (`id`, `kd_project_sap`, `nama_project`, `status`) VALUES
	(1, 'KAL1_2400_03_0005', 'O&M PLTD SANGGAU & KETAPANG (UIKL)', 'tYES'),
	(2, 'KAL1_2400_03_0014', 'O&M UPDK KAPUAS', 'tYES'),
	(3, 'KAL1_2400_08_0001', 'OP GI UP3B SISTEM KALBAR', 'tYES'),
	(4, 'KAL1_2400_08_0002', 'GROUND PATROL UP3B SISTEM KALBAR', 'tYES'),
	(5, 'KAL1_2400_08_0003', 'GROUND PATROL KALBAR KINERJA', 'tYES'),
	(6, 'KAL1_2400_08_0004', 'OP GI KALBAR KINERJA', 'tYES'),
	(7, 'KAL1_6800_00_0012', 'SEWA PEMBANGKIT BALAI KARANGAN 2000 KW', 'tYES'),
	(8, 'KAL1_6800_03_0006', 'O&M PLTD SANGGAU & KETAPANG (UIW)', 'tYES'),
	(9, 'KAL1_6800_10_0007', 'O&M DISTRIBUSI PONTIANAK', 'tYES'),
	(10, 'KAL1_6800_10_0009', 'O&M DISTRIBUSI KETAPANG', 'tYES');
/*!40000 ALTER TABLE `data_project` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.data_vendor
CREATE TABLE IF NOT EXISTS `data_vendor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kd_vendor` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '',
  `nama_vendor` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '',
  `valid` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'tYES',
  PRIMARY KEY (`id`),
  UNIQUE KEY `kd_vendor` (`kd_vendor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.data_vendor: ~0 rows (lebih kurang)
INSERT INTO `data_vendor` (`id`, `kd_vendor`, `nama_vendor`, `valid`) VALUES
	(1, 'VE00000001', 'VENDOR LAINNYA BERELASI', 'tYES');

-- membuang struktur untuk table hrisori.edata
CREATE TABLE IF NOT EXISTS `edata` (
  `id` int NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `id_edata` int NOT NULL DEFAULT '0',
  `tgl_export` varchar(30) DEFAULT '',
  `file_export` varchar(255) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.edata: ~10 rows (lebih kurang)
INSERT INTO `edata` (`id`, `blth`, `id_edata`, `tgl_export`, `file_export`, `petugas`) VALUES
	(1, '2022-09', 1, '2022-09-28 09:18:27', 'datacsv/2022-09/PERSONALDATA_PLNT_20220928.csv', '9219008ZTY'),
	(2, '2022-09', 10, '2022-09-27 09:16:57', 'datacsv/2022-09/AWARDS_PLNT_20220927.csv', '9722002PRO'),
	(3, '2022-09', 2, '2022-09-28 10:46:33', 'datacsv/2022-09/ALAMAT_PLNT_20220928.csv', '9219008ZTY'),
	(4, '2022-09', 3, '2022-09-28 11:31:25', 'datacsv/2022-09/KELUARGA_PLNT_20220928.csv', '9722002PRO'),
	(5, '2022-09', 4, '2022-09-27 09:16:57', 'datacsv/2022-09/PENDIDIKAN_PLNT_20220927.csv', '9722002PRO'),
	(6, '2022-09', 5, '2022-10-04 10:01:55', 'datacsv/2022-10/RIWAYATGRADE_PLNT_20221004.csv', '9219008ZTY'),
	(7, '2022-09', 6, '2022-09-29 15:47:37', 'datacsv/2022-09/RIWAYATJABATAN_PLNT_20220929.csv', '9722002PRO'),
	(8, '2022-09', 7, '2022-09-29 15:57:43', 'datacsv/2022-09/RIWAYATTALENTA_PLNT_20220929.csv', '9219008ZTY'),
	(9, '2022-09', 8, '2022-09-27 09:16:57', 'datacsv/2022-09/SERTIFIKASIKOMPETENSI_PLNT_20220927.csv', '9722002PRO'),
	(10, '2022-09', 9, '2022-09-27 09:16:57', 'datacsv/2022-09/GRIEVANCES_PLNT_20220927.csv', '9722002PRO');

-- membuang struktur untuk table hrisori.eviden_restitusi
CREATE TABLE IF NOT EXISTS `eviden_restitusi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idsppd` int NOT NULL DEFAULT '0',
  `idrestitusi` int NOT NULL DEFAULT '0',
  `lampiran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.eviden_restitusi: ~9 rows (lebih kurang)
INSERT INTO `eviden_restitusi` (`id`, `idsppd`, `idrestitusi`, `lampiran`) VALUES
	(1, 2021000043, 1, './sipeg/assets/restitusi/2021000043/restitusi-202100004311622629923.zip'),
	(2, 2021000388, 366, './sipeg/assets/restitusi/2021000388/restitusi-20210003883661643338613.pdf'),
	(3, 2021000389, 367, './sipeg/assets/restitusi/2021000389/restitusi-20210003893671643339448.pdf'),
	(4, 2021000394, 372, './sipeg/assets/restitusi/2021000394/restitusi-20210003943721643245731.pdf'),
	(5, 2021000430, 408, './sipeg/assets/restitusi/2021000430/restitusi-20210004304081643247501.pdf'),
	(6, 2021000431, 409, './sipeg/assets/restitusi/2021000431/restitusi-20210004314091643248206.pdf'),
	(7, 2021000436, 414, './sipeg/assets/restitusi/2021000436/restitusi-20210004364141643248986.pdf'),
	(8, 2021000437, 415, './sipeg/assets/restitusi/2021000437/restitusi-20210004374151643261156.pdf'),
	(9, 2021000438, 416, './sipeg/assets/restitusi/2021000438/restitusi-20210004384161643341086.pdf');

-- membuang struktur untuk table hrisori.eviden_sppd
CREATE TABLE IF NOT EXISTS `eviden_sppd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idsppd` int NOT NULL DEFAULT '0',
  `idrestitusi` int NOT NULL DEFAULT '0',
  `lampiran` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.eviden_sppd: ~0 rows (lebih kurang)

-- membuang struktur untuk table hrisori.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel hrisori.failed_jobs: ~0 rows (lebih kurang)

-- membuang struktur untuk table hrisori.gaji
CREATE TABLE IF NOT EXISTS `gaji` (
  `id` int NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `nipblth` varchar(30) DEFAULT '',
  `npwp` varchar(15) DEFAULT '',
  `kpp` varchar(120) DEFAULT '',
  `gaji_dasar` double NOT NULL DEFAULT '0',
  `honorarium` double NOT NULL DEFAULT '0',
  `honorer` double NOT NULL DEFAULT '0',
  `tarif_grade` double NOT NULL DEFAULT '0',
  `tunjangan_posisi` double NOT NULL DEFAULT '0',
  `p21b` double NOT NULL DEFAULT '0',
  `tunjangan_kemahalan` double NOT NULL DEFAULT '0',
  `tunjangan_perumahan` double NOT NULL DEFAULT '0',
  `tunjangan_transportasi` double NOT NULL DEFAULT '0',
  `bantuan_pulsa` double NOT NULL DEFAULT '0',
  `tunjangan_kompetensi` double NOT NULL DEFAULT '0',
  `dplk_persero` double NOT NULL DEFAULT '0',
  `dplk_simponi_pr` double NOT NULL DEFAULT '0',
  `lembur` double NOT NULL DEFAULT '0',
  `nama_tunjangan1` varchar(200) DEFAULT '',
  `tunjangan1` double NOT NULL DEFAULT '0',
  `nama_tunjangan2` varchar(200) DEFAULT '',
  `tunjangan2` double NOT NULL DEFAULT '0',
  `nama_tunjangan3` varchar(200) DEFAULT '',
  `tunjangan3` double NOT NULL DEFAULT '0',
  `nama_tunjangan4` varchar(200) DEFAULT '',
  `tunjangan4` double NOT NULL DEFAULT '0',
  `bpjs_tk_pp` double NOT NULL DEFAULT '0',
  `bpjs_tk_kp` double NOT NULL DEFAULT '0',
  `bpjs_tk_kkp` double NOT NULL DEFAULT '0',
  `bpjs_tk_htp` double NOT NULL DEFAULT '0',
  `bpjs_tk_jhtk` double NOT NULL DEFAULT '0',
  `bpjs_tk_pk` double NOT NULL DEFAULT '0',
  `bpjs_kes_pp` double NOT NULL DEFAULT '0',
  `bpjs_kes_pk` double NOT NULL DEFAULT '0',
  `total_pendapatan` double NOT NULL DEFAULT '0',
  `bpjs_pr` double NOT NULL DEFAULT '0',
  `benefit` double NOT NULL DEFAULT '0',
  `pendapatan_benefit` double NOT NULL DEFAULT '0',
  `pot_koperasi` double NOT NULL DEFAULT '0',
  `pot_bazis` double NOT NULL DEFAULT '0',
  `dplk_simponi` double NOT NULL DEFAULT '0',
  `pot_dplk_pribadi` double NOT NULL DEFAULT '0',
  `cop_kendaraan` double NOT NULL DEFAULT '0',
  `iuran_peserta` double NOT NULL DEFAULT '0',
  `brpr` double NOT NULL DEFAULT '0',
  `sewa_mess` double NOT NULL DEFAULT '0',
  `qurban` double NOT NULL DEFAULT '0',
  `arisan` double NOT NULL DEFAULT '0',
  `nama_potongan1` varchar(200) DEFAULT '',
  `potongan1` double NOT NULL DEFAULT '0',
  `nama_potongan2` varchar(200) DEFAULT '',
  `potongan2` double NOT NULL DEFAULT '0',
  `nama_potongan3` varchar(200) DEFAULT '',
  `potongan3` double NOT NULL DEFAULT '0',
  `nama_potongan4` varchar(200) DEFAULT '',
  `potongan4` double NOT NULL DEFAULT '0',
  `total_potongan` double NOT NULL DEFAULT '0',
  `pph21` double NOT NULL DEFAULT '0',
  `upah_bersih` double NOT NULL DEFAULT '0',
  `format` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nipblth` (`nipblth`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.gaji: 5 rows
/*!40000 ALTER TABLE `gaji` DISABLE KEYS */;
INSERT INTO `gaji` (`id`, `blth`, `nip`, `nipblth`, `npwp`, `kpp`, `gaji_dasar`, `honorarium`, `honorer`, `tarif_grade`, `tunjangan_posisi`, `p21b`, `tunjangan_kemahalan`, `tunjangan_perumahan`, `tunjangan_transportasi`, `bantuan_pulsa`, `tunjangan_kompetensi`, `dplk_persero`, `dplk_simponi_pr`, `lembur`, `nama_tunjangan1`, `tunjangan1`, `nama_tunjangan2`, `tunjangan2`, `nama_tunjangan3`, `tunjangan3`, `nama_tunjangan4`, `tunjangan4`, `bpjs_tk_pp`, `bpjs_tk_kp`, `bpjs_tk_kkp`, `bpjs_tk_htp`, `bpjs_tk_jhtk`, `bpjs_tk_pk`, `bpjs_kes_pp`, `bpjs_kes_pk`, `total_pendapatan`, `bpjs_pr`, `benefit`, `pendapatan_benefit`, `pot_koperasi`, `pot_bazis`, `dplk_simponi`, `pot_dplk_pribadi`, `cop_kendaraan`, `iuran_peserta`, `brpr`, `sewa_mess`, `qurban`, `arisan`, `nama_potongan1`, `potongan1`, `nama_potongan2`, `potongan2`, `nama_potongan3`, `potongan3`, `nama_potongan4`, `potongan4`, `total_potongan`, `pph21`, `upah_bersih`, `format`) VALUES
	(1, '2020-01', '9219004ZTY', '2020-01.9219004ZTY', '640797049017000', 'BALIKPAPAN', 0, 0, 0, 5517000, 800000, 0, 1596000, 0, 0, 0, 0, 0, 220680, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 55170, 16551, 49101, 204129, 110340, 55170, 220680, 55170, 7913000, 545631, 766311, 8679311, 0, 0, 331020, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 551700, 159679, 7361300, ''),
	(2, '2020-01', '9219005ZTY', '2020-01.9219005ZTY', '916433436130000', 'BALIKPAPAN', 0, 0, 0, 5517000, 764000, 0, 1110000, 0, 0, 0, 0, 0, 220680, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 55170, 16551, 49101, 204129, 110340, 55170, 220680, 55170, 7391000, 545631, 766311, 8157311, 0, 0, 331020, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 551700, 134883, 6839300, ''),
	(3, '2020-01', '9319001ZTY', '2020-01.9319001ZTY', '842970865005000', 'BALIKPAPAN', 0, 0, 0, 4533000, 424000, 0, 1408000, 0, 0, 0, 0, 0, 181320, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 45330, 13599, 40344, 167721, 90660, 45330, 181320, 45330, 6365000, 448314, 629634, 6994634, 0, 0, 271980, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 453300, 84579, 5911700, ''),
	(4, '2020-01', '9319006ZTY', '2020-01.9319006ZTY', '757679154303000', 'BALIKPAPAN', 0, 0, 0, 5517000, 800000, 0, 1596000, 0, 0, 0, 0, 0, 220680, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 55170, 16551, 49101, 204129, 110340, 55170, 220680, 55170, 7913000, 545631, 766311, 8679311, 0, 0, 331020, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 551700, 159679, 7361300, ''),
	(5, '2020-01', '9519002ZTY', '2020-01.9519002ZTY', '816977474522000', 'TARAKAN', 0, 0, 0, 4533000, 424000, 0, 1064000, 0, 0, 0, 0, 0, 181320, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 45330, 13599, 40344, 167721, 90660, 45330, 181320, 45330, 6021000, 448314, 629634, 6650634, 0, 0, 271980, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 453300, 68238, 5567700, '');
/*!40000 ALTER TABLE `gaji` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.gajipph
CREATE TABLE IF NOT EXISTS `gajipph` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `nipblth` varchar(200) DEFAULT '',
  `gaji_dasar` double NOT NULL DEFAULT '0',
  `honorarium` double NOT NULL DEFAULT '0',
  `honorer` double NOT NULL DEFAULT '0',
  `tarif_grade` double NOT NULL DEFAULT '0',
  `tunjangan_posisi` double NOT NULL DEFAULT '0',
  `tunjangan_kemahalan` double NOT NULL DEFAULT '0',
  `tunjangan_perumahan` double NOT NULL DEFAULT '0',
  `tunjangan_transportasi` double NOT NULL DEFAULT '0',
  `bantuan_pulsa` double NOT NULL DEFAULT '0',
  `total_pendapatan` double NOT NULL DEFAULT '0',
  `dplk_persero` double NOT NULL DEFAULT '0',
  `dplk_simponi` double NOT NULL DEFAULT '0',
  `bpjs_pr` double NOT NULL DEFAULT '0',
  `benefit` double NOT NULL DEFAULT '0',
  `pendapatan_benefit` double NOT NULL DEFAULT '0',
  `total_potongan` double NOT NULL DEFAULT '0',
  `pph21` double NOT NULL DEFAULT '0',
  `upah_bersih` double NOT NULL DEFAULT '0',
  `format` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nipblth` (`nipblth`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.gajipph: 6 rows
/*!40000 ALTER TABLE `gajipph` DISABLE KEYS */;
INSERT INTO `gajipph` (`id`, `kpp`, `blth`, `nip`, `nipblth`, `gaji_dasar`, `honorarium`, `honorer`, `tarif_grade`, `tunjangan_posisi`, `tunjangan_kemahalan`, `tunjangan_perumahan`, `tunjangan_transportasi`, `bantuan_pulsa`, `total_pendapatan`, `dplk_persero`, `dplk_simponi`, `bpjs_pr`, `benefit`, `pendapatan_benefit`, `total_potongan`, `pph21`, `upah_bersih`, `format`) VALUES
	(1, 'BALIKPAPAN', '2019-12', '9419017ZTY', '2019-12.9419017ZTY', 0, 0, 0, 4533000, 424000, 925000, 0, 0, 0, 5882000, 0, 453300, 493644, 946944, 6828944, 453300, 74232, 5428700, ''),
	(2, 'BALIKPAPAN', '2019-12', '9419014ZTY', '2019-12.9419014ZTY', 0, 0, 0, 5517000, 800000, 1596000, 0, 0, 0, 7913000, 0, 551700, 600801, 1152501, 9065501, 551700, 197295, 7361300, ''),
	(3, 'BALIKPAPAN', '2019-12', '9419013ZTY', '2019-12.9419013ZTY', 0, 0, 0, 5517000, 800000, 1596000, 0, 0, 0, 7913000, 0, 551700, 600801, 1152501, 9065501, 551700, 197295, 7361300, ''),
	(4, 'BALIKPAPAN', '2019-12', '9419007ZTY', '2019-12.9419007ZTY', 0, 0, 0, 4533000, 424000, 925000, 0, 0, 0, 5882000, 0, 453300, 493644, 946944, 6828944, 453300, 74232, 5428700, ''),
	(5, 'BALIKPAPAN', '2019-12', '9319006ZTY', '2019-12.9319006ZTY', 0, 0, 0, 5517000, 800000, 1596000, 0, 0, 0, 7913000, 0, 551700, 600801, 1152501, 9065501, 551700, 164412, 7361300, ''),
	(6, 'BALIKPAPAN', '2019-12', '9319001ZTY', '2019-12.9319001ZTY', 0, 0, 0, 4533000, 424000, 925000, 0, 0, 0, 5882000, 0, 453300, 493644, 946944, 6828944, 453300, 61860, 5428700, '');
/*!40000 ALTER TABLE `gajipph` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.gaji_tunjangan
CREATE TABLE IF NOT EXISTS `gaji_tunjangan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(60) DEFAULT '',
  `tunjangan_transportasi` double NOT NULL DEFAULT '0',
  `tunjangan_perumahan` double NOT NULL DEFAULT '0',
  `bantuan_pulsa` double NOT NULL DEFAULT '0',
  `uang_cuti` double NOT NULL DEFAULT '0',
  `iks` double NOT NULL DEFAULT '0',
  `bonus` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.gaji_tunjangan: 0 rows
/*!40000 ALTER TABLE `gaji_tunjangan` DISABLE KEYS */;
/*!40000 ALTER TABLE `gaji_tunjangan` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.hasil_indikator_kinerja
CREATE TABLE IF NOT EXISTS `hasil_indikator_kinerja` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_kpi_pusat` bigint unsigned NOT NULL,
  `id_master_indikator_kinerja` bigint unsigned NOT NULL,
  `keterangan_master_indikator_kinerja` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hasil_indikator_kinerja_id_kpi_pusat_foreign` (`id_kpi_pusat`),
  KEY `hasil_indikator_kinerja_id_master_indikator_kinerja_foreign` (`id_master_indikator_kinerja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel hrisori.hasil_indikator_kinerja: ~0 rows (lebih kurang)

-- membuang struktur untuk table hrisori.history_update
CREATE TABLE IF NOT EXISTS `history_update` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_tabel` varchar(120) DEFAULT '',
  `id_data` varchar(60) DEFAULT '',
  `tgl_perubahan` varchar(30) DEFAULT '',
  `user_perubahan` varchar(60) DEFAULT '',
  `tgl_update_sap` varchar(30) DEFAULT '',
  `user_update_sap` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.history_update: ~10 rows (lebih kurang)
INSERT INTO `history_update` (`id`, `nama_tabel`, `id_data`, `tgl_perubahan`, `user_perubahan`, `tgl_update_sap`, `user_update_sap`, `status`, `keterangan`) VALUES
	(1, 'r_jabatan', '53', '2022-12-05 10:54:30', '9219008ZTY', '2022-12-05 11:37:31', '9722002PRO', '500', 'Internal Server Error'),
	(2, 'r_jabatan', '196', '2022-12-05 11:26:09', '9219008ZTY', '2022-12-05 11:37:31', '9722002PRO', '500', 'Internal Server Error'),
	(3, 'r_jabatan', '53', '2022-12-05 10:54:30', '9219008ZTY', '2022-12-05 11:39:02', '9722002PRO', '500', 'Internal Server Error'),
	(4, 'r_jabatan', '196', '2022-12-05 11:26:09', '9219008ZTY', '2022-12-05 11:39:02', '9722002PRO', '500', 'Internal Server Error'),
	(5, 'r_jabatan', '53', '2022-12-05 10:54:30', '9219008ZTY', '2022-12-05 11:40:00', '9722002PRO', '500', 'Internal Server Error'),
	(6, 'r_alamat', '46', '2022-12-05 11:42:44', '9722002PRO', '2022-12-05 11:42:49', '9722002PRO', '200', 'Sukses'),
	(7, 'r_alamat', '46', '2022-12-05 11:48:45', '9722002PRO', '2022-12-05 11:49:01', '9722002PRO', '200', 'Sukses'),
	(8, 'data_pegawai', '38', '2022-12-05 11:54:55', '9722002PRO', '2022-12-05 11:55:08', '9722002PRO', '500', 'Internal Server Error'),
	(9, 'data_pegawai', '38', '2022-12-05 11:56:48', '9722002PRO', '2022-12-05 11:57:02', '9722002PRO', '500', 'Internal Server Error'),
	(10, 'data_pegawai', '38', '2022-12-05 11:56:48', '9722002PRO', '2022-12-05 11:58:24', '9722002PRO', '200', 'Sukses');

-- membuang struktur untuk table hrisori.honorarium_eo
CREATE TABLE IF NOT EXISTS `honorarium_eo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `nipblth` varchar(120) DEFAULT '',
  `honorarium` double NOT NULL DEFAULT '0',
  `pph21` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nipblth` (`nipblth`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.honorarium_eo: ~0 rows (lebih kurang)

-- membuang struktur untuk table hrisori.ijin
CREATE TABLE IF NOT EXISTS `ijin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(60) DEFAULT '',
  `tgl_pengajuan` varchar(10) DEFAULT '',
  `jenis_ijin` varchar(255) DEFAULT NULL,
  `tgl_awal` varchar(10) DEFAULT '',
  `tgl_akhir` varchar(10) DEFAULT '',
  `hari` double NOT NULL DEFAULT '0',
  `alasan_ijin` varchar(255) DEFAULT '',
  `eviden` varchar(200) DEFAULT '',
  `approve1` varchar(1) NOT NULL DEFAULT '0',
  `approval1` varchar(120) DEFAULT '',
  `tgl_approve1` varchar(160) DEFAULT '',
  `alasan_reject1` varchar(255) DEFAULT '',
  `approve2` varchar(1) NOT NULL DEFAULT '0',
  `approval2` varchar(60) DEFAULT '',
  `tgl_approve2` varchar(10) DEFAULT '',
  `alasan_reject2` varchar(255) DEFAULT '',
  `tgl_update` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.ijin: 6 rows
/*!40000 ALTER TABLE `ijin` DISABLE KEYS */;
INSERT INTO `ijin` (`id`, `nip`, `tgl_pengajuan`, `jenis_ijin`, `tgl_awal`, `tgl_akhir`, `hari`, `alasan_ijin`, `eviden`, `approve1`, `approval1`, `tgl_approve1`, `alasan_reject1`, `approve2`, `approval2`, `tgl_approve2`, `alasan_reject2`, `tgl_update`, `petugas`) VALUES
	(1, '9017011HPI', '2021-07-12', 'Ijin Sakit', '2021-07-12', '2021-07-13', 1, 'Berobat ke dokter kandungan, karena mengalami pendarahan di usia kehamilan 8 minggu', '', '2', '7007312HPI', '2021-07-20', '', '2', '6220002PRO', '2021-11-12', '', '', ''),
	(2, '8509719Z', '2021-07-19', 'Ijin Sakit', '2021-07-15', '2021-07-28', 14, 'Positif covid', '', '2', '7802008R', '2021-07-22', '', '0', '', '', '', '', ''),
	(3, '9520013ZTY', '2021-07-29', 'Ijin Lainnya', '2021-07-29', '2021-07-30', 2, 'ijin wfh tidak dilokasi kantor', '', '2', '8509719Z', '2021-07-29', '', '2', '7802008R', '2021-08-06', '', '', ''),
	(4, '8619010PCN', '2021-07-31', 'Ijin Lainnya', '', '', 0, '', '', '2', '6220001PRO', '2021-10-08', '', '2', '6793163Z', '2023-05-04', '', '', ''),
	(5, '9116001HPI', '2021-08-03', 'Ijin Sakit', '2021-08-03', '2021-08-03', 1, 'Tidak enak badan', '', '2', '8217005HPI', '2021-08-03', '', '2', '6320006PRO', '2021-10-25', '', '', ''),
	(6, '9319008PCN', '2021-08-08', 'Ijin Sakit', '2021-08-07', '2021-08-09', 3, 'Terjangkit demam berdarah', '1628426995917.jpg', '2', '6685054F', '2021-08-09', '', '2', '6793163Z', '2023-05-04', '', '', '');
/*!40000 ALTER TABLE `ijin` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.iklan
CREATE TABLE IF NOT EXISTS `iklan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uraian` varchar(255) DEFAULT '',
  `foto` varchar(255) DEFAULT '',
  `paket_aplikasi` varchar(120) DEFAULT '',
  `link_aplikasi` varchar(200) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.iklan: 6 rows
/*!40000 ALTER TABLE `iklan` DISABLE KEYS */;
INSERT INTO `iklan` (`id`, `uraian`, `foto`, `paket_aplikasi`, `link_aplikasi`, `aktif`) VALUES
	(1, '', 'iklan3.png', '', '', '0'),
	(2, '', 'iklan2.png', '', '', '0'),
	(3, '', 'iklan-1627650235.jpeg', 'com.icon.pln123', 'https://play.google.com/store/apps/details?id=com.icon.pln123', '0'),
	(4, '', 'iklan-1702458616.png', '', '', '1'),
	(5, '', 'iklan-1702458672.png', '', '', '1'),
	(6, '', 'iklan-1702458704.png', '', '', '1');
/*!40000 ALTER TABLE `iklan` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.iks
CREATE TABLE IF NOT EXISTS `iks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `semester` varchar(1) DEFAULT '1',
  `nip` varchar(30) DEFAULT '',
  `nipsemester` varchar(60) DEFAULT '',
  `grade` varchar(60) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_pegawai` varchar(10) DEFAULT '',
  `jumlah_bulan` double NOT NULL DEFAULT '0',
  `nki` double NOT NULL DEFAULT '0',
  `simbol_nki` varchar(10) DEFAULT '',
  `nsk` double NOT NULL DEFAULT '0',
  `simbol_nsk` varchar(10) DEFAULT '',
  `simbol_kinerja` varchar(2) DEFAULT '',
  `nsk_rata` double NOT NULL DEFAULT '0',
  `nko` double NOT NULL DEFAULT '0',
  `nkk` double NOT NULL DEFAULT '0',
  `a` double NOT NULL DEFAULT '0',
  `b` double NOT NULL DEFAULT '0',
  `c` double NOT NULL DEFAULT '0',
  `iki` double NOT NULL DEFAULT '0',
  `isk` double NOT NULL DEFAULT '0',
  `nsk_a` double NOT NULL DEFAULT '0',
  `nko_b` double NOT NULL DEFAULT '0',
  `nkk_c` double NOT NULL DEFAULT '0',
  `phi` double NOT NULL DEFAULT '0',
  `p1` double NOT NULL DEFAULT '0',
  `p21` double NOT NULL DEFAULT '0',
  `p22` double NOT NULL DEFAULT '0',
  `jumlah` double NOT NULL DEFAULT '0',
  `p31_bruto` double NOT NULL DEFAULT '0',
  `jks` double NOT NULL DEFAULT '0',
  `jtmk` double NOT NULL DEFAULT '0',
  `jkp` double NOT NULL DEFAULT '0',
  `faktor_pengurang` double NOT NULL DEFAULT '0',
  `p31_netto` double NOT NULL DEFAULT '0',
  `pot_bazis` double NOT NULL DEFAULT '0',
  `p31` double NOT NULL DEFAULT '0',
  `ppht_upah` double NOT NULL DEFAULT '0',
  `ppht_upah_iks` double NOT NULL DEFAULT '0',
  `pph21` double NOT NULL DEFAULT '0',
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(250) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.iks: 10 rows
/*!40000 ALTER TABLE `iks` DISABLE KEYS */;
INSERT INTO `iks` (`id`, `blth`, `tahun`, `semester`, `nip`, `nipsemester`, `grade`, `tgl_masuk`, `tgl_pegawai`, `jumlah_bulan`, `nki`, `simbol_nki`, `nsk`, `simbol_nsk`, `simbol_kinerja`, `nsk_rata`, `nko`, `nkk`, `a`, `b`, `c`, `iki`, `isk`, `nsk_a`, `nko_b`, `nkk_c`, `phi`, `p1`, `p21`, `p22`, `jumlah`, `p31_bruto`, `jks`, `jtmk`, `jkp`, `faktor_pengurang`, `p31_netto`, `pot_bazis`, `p31`, `ppht_upah`, `ppht_upah_iks`, `pph21`, `tgl_proses`, `petugas`, `keterangan`) VALUES
	(1, '2020-08', '2020', '2', '6685054F', '6685054F.2020.2', 'System 1', '', '', 0, 0, '', 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12649377, 0, 0, 0, 0, 0, 0, 0, 12649377, 0, 0, 0, '2020-09-08', 'hary', ''),
	(2, '2020-08', '2020', '2', '7905008D', '7905008D.2020.2', 'Optimization 4', '', '', 0, 0, '', 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 27314824, 0, 0, 0, 0, 0, 0, 0, 27314824, 0, 0, 0, '2020-09-08', 'hary', ''),
	(3, '2020-08', '2020', '2', '6793082D', '6793082D.2020.2', 'Optimization 4', '', '', 0, 0, '', 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 21848605, 0, 0, 0, 0, 0, 0, 0, 21848605, 0, 0, 0, '2020-09-08', 'hary', ''),
	(4, '2020-08', '2020', '2', '8209759Z', '8209759Z.2020.2', 'System 4', '', '', 0, 0, '', 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 18535852, 0, 0, 0, 0, 0, 0, 0, 18535852, 0, 0, 0, '2020-09-08', 'hary', ''),
	(5, '2020-08', '2020', '2', '8017001TRK', '8017001TRK.2020.2', 'Specific 2', '', '', 0, 0, '', 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9768340, 0, 0, 0, 0, 0, 0, 0, 9768340, 0, 0, 0, '2020-09-08', 'hary', ''),
	(6, '2020-08', '2020', '2', '8410002TRK', '8410002TRK.2020.2', 'Specific 2', '', '', 0, 0, '', 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8177321, 0, 0, 0, 0, 0, 0, 0, 8177321, 0, 0, 0, '2020-09-08', 'hary', ''),
	(7, '2020-08', '2020', '2', '8610009TRK', '8610009TRK.2020.2', 'Basic 2', '', '', 0, 0, '', 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10017164, 0, 0, 0, 0, 0, 0, 0, 10017164, 0, 0, 0, '2020-09-08', 'hary', ''),
	(8, '2020-08', '2020', '2', '8610011TRK', '8610011TRK.2020.2', 'Basic 2', '', '', 0, 0, '', 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9718993, 0, 0, 0, 0, 0, 0, 0, 9718993, 0, 0, 0, '2020-09-08', 'hary', ''),
	(9, '2020-08', '2020', '2', '8010038TRK', '8010038TRK.2020.2', 'Specific 4', '', '', 0, 0, '', 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4035579, 0, 0, 0, 0, 0, 0, 0, 4035579, 0, 0, 0, '2020-09-08', 'hary', ''),
	(10, '2020-08', '2020', '2', '8110015TRK', '8110015TRK.2020.2', 'Basic 2', '', '', 0, 0, '', 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5457008, 0, 0, 0, 0, 0, 0, 0, 5457008, 0, 0, 0, '2020-09-08', 'hary', '');
/*!40000 ALTER TABLE `iks` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.jawaban
CREATE TABLE IF NOT EXISTS `jawaban` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pertanyaan_id` int NOT NULL,
  `jawaban` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pertanyaan_id` (`pertanyaan_id`),
  CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`pertanyaan_id`) REFERENCES `pertanyaan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.jawaban: ~0 rows (lebih kurang)

-- membuang struktur untuk table hrisori.jenis_acara
CREATE TABLE IF NOT EXISTS `jenis_acara` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.jenis_acara: 5 rows
/*!40000 ALTER TABLE `jenis_acara` DISABLE KEYS */;
INSERT INTO `jenis_acara` (`id`, `jenis`) VALUES
	(1, 'Rapat'),
	(2, 'Diklat'),
	(3, 'Non Diklat'),
	(4, 'Senam Pagi'),
	(5, 'BOD');
/*!40000 ALTER TABLE `jenis_acara` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.jenis_makanan
CREATE TABLE IF NOT EXISTS `jenis_makanan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.jenis_makanan: 2 rows
/*!40000 ALTER TABLE `jenis_makanan` DISABLE KEYS */;
INSERT INTO `jenis_makanan` (`id`, `jenis`) VALUES
	(1, 'Makanan Ringan'),
	(2, 'Makanan Berat');
/*!40000 ALTER TABLE `jenis_makanan` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.jenis_pegawai
CREATE TABLE IF NOT EXISTS `jenis_pegawai` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis` varchar(200) DEFAULT '',
  `kd_kelompok` varchar(1) NOT NULL DEFAULT '1',
  `nama_kelompok` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.jenis_pegawai: 10 rows
/*!40000 ALTER TABLE `jenis_pegawai` DISABLE KEYS */;
INSERT INTO `jenis_pegawai` (`id`, `jenis`, `kd_kelompok`, `nama_kelompok`) VALUES
	(2, 'KOMISARIS', '2', 'DIREKSI, DEKOM & PROHIRE'),
	(3, 'KOMITE AUDIT', '2', 'DIREKSI, DEKOM & PROHIRE'),
	(4, 'ORGANIK', '1', 'PEGAWAI ORGANIK & TUGAS KARYA'),
	(5, 'PLN', '2', 'DIREKSI, DEKOM & PROHIRE'),
	(6, 'SEKDEKOM', '2', 'DIREKSI, DEKOM & PROHIRE'),
	(7, 'TUGAS KARYA', '1', 'PEGAWAI ORGANIK & TUGAS KARYA'),
	(8, 'TUGAS KERJA', '1', 'PEGAWAI ORGANIK & TUGAS KARYA'),
	(9, 'DIREKSI', '2', 'DIREKSI, DEKOM & PROHIRE'),
	(10, 'OJT', '2', 'DIREKSI, DEKOM & PROHIRE'),
	(11, 'PROHIRE', '2', 'DIREKSI, DEKOM & PROHIRE');
/*!40000 ALTER TABLE `jenis_pegawai` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.jenis_sppd
CREATE TABLE IF NOT EXISTS `jenis_sppd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kd_sppd` varchar(1) DEFAULT '',
  `nama_sppd` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.jenis_sppd: 5 rows
/*!40000 ALTER TABLE `jenis_sppd` DISABLE KEYS */;
INSERT INTO `jenis_sppd` (`id`, `kd_sppd`, `nama_sppd`) VALUES
	(1, '1', 'SPPD Biasa'),
	(2, '2', 'SPPD Pengobatan'),
	(3, '3', 'SPPD Pindah'),
	(4, '4', 'SPPD Lokal'),
	(5, '5', 'SPPD Porseni');
/*!40000 ALTER TABLE `jenis_sppd` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.jenis_thr
CREATE TABLE IF NOT EXISTS `jenis_thr` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenisthr` varchar(1) DEFAULT '',
  `nama_jenisthr` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.jenis_thr: ~4 rows (lebih kurang)
INSERT INTO `jenis_thr` (`id`, `jenisthr`, `nama_jenisthr`) VALUES
	(1, '1', 'THR IDUL FITRI'),
	(2, '2', 'THR NATAL'),
	(3, '3', 'THR NYEPI'),
	(4, '4', 'THR WAISAK');

-- membuang struktur untuk table hrisori.jenis_tujuan
CREATE TABLE IF NOT EXISTS `jenis_tujuan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kd_tujuan` varchar(1) DEFAULT '',
  `nama_tujuan` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.jenis_tujuan: 3 rows
/*!40000 ALTER TABLE `jenis_tujuan` DISABLE KEYS */;
INSERT INTO `jenis_tujuan` (`id`, `kd_tujuan`, `nama_tujuan`) VALUES
	(1, '1', 'Ibukota Propinsi'),
	(2, '2', 'Bukan Ibukota Propinsi'),
	(3, '3', 'Luar Wilayah Kaltimra');
/*!40000 ALTER TABLE `jenis_tujuan` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.kategori_pajak
CREATE TABLE IF NOT EXISTS `kategori_pajak` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kategori` varchar(2) DEFAULT '',
  `batas_awal` double NOT NULL DEFAULT '0',
  `batas_akhir` double NOT NULL DEFAULT '0',
  `tarif` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.kategori_pajak: 10 rows
/*!40000 ALTER TABLE `kategori_pajak` DISABLE KEYS */;
INSERT INTO `kategori_pajak` (`id`, `kategori`, `batas_awal`, `batas_akhir`, `tarif`) VALUES
	(1, 'A', 0, 5400000, 0),
	(2, 'A', 5400000, 5650000, 0.25),
	(3, 'A', 5650000, 5950000, 0.5),
	(4, 'A', 5950000, 6300000, 0.75),
	(5, 'A', 6300000, 6750000, 1),
	(6, 'A', 6750000, 7500000, 1.25),
	(7, 'A', 7500000, 8550000, 1.5),
	(8, 'A', 8550000, 9650000, 1.75),
	(9, 'A', 9650000, 10050000, 2),
	(10, 'A', 10050000, 10350000, 2.25);
/*!40000 ALTER TABLE `kategori_pajak` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.kategori_pegawai
CREATE TABLE IF NOT EXISTS `kategori_pegawai` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kd_kategori` varchar(3) DEFAULT '',
  `nama_kategori` varchar(200) DEFAULT '',
  `resiko_pekerjaan` varchar(1) NOT NULL DEFAULT '0',
  `bpjs_tk_pp` double NOT NULL DEFAULT '2',
  `bpjs_tk_kp` double NOT NULL DEFAULT '0.3',
  `bpjs_tk_kkp` double NOT NULL DEFAULT '1.27',
  `bpjs_tk_htp` double NOT NULL DEFAULT '3.7',
  `bpjs_tk_jhtk` double NOT NULL DEFAULT '2',
  `bpjs_tk_pk` double NOT NULL DEFAULT '1',
  `bpjs_kes_pp` double DEFAULT '4',
  `bpjs_kes_pk` double NOT NULL DEFAULT '1',
  `status` varchar(1) NOT NULL DEFAULT '2',
  `kode_jabatan` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.kategori_pegawai: 0 rows
/*!40000 ALTER TABLE `kategori_pegawai` DISABLE KEYS */;
/*!40000 ALTER TABLE `kategori_pegawai` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.kelebihan_bayar_rampung
CREATE TABLE IF NOT EXISTS `kelebihan_bayar_rampung` (
  `id` int NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `ppht` double NOT NULL DEFAULT '0',
  `ppht_sebelumnya` double NOT NULL DEFAULT '0',
  `ppht_mutasi` double NOT NULL DEFAULT '0',
  `ppht_tantiem` double NOT NULL DEFAULT '0',
  `selisih` double NOT NULL DEFAULT '0',
  `blthnip` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.kelebihan_bayar_rampung: ~8 rows (lebih kurang)
INSERT INTO `kelebihan_bayar_rampung` (`id`, `blth`, `nip`, `ppht`, `ppht_sebelumnya`, `ppht_mutasi`, `ppht_tantiem`, `selisih`, `blthnip`) VALUES
	(1, '2024-12', '9319008PCN', 30771750, 31848302, 0, 0, -1076552, '2024-12.9319008PCN'),
	(2, '2024-12', '9319006ZTY', 74644000, 77797267, 0, 0, -3153267, '2024-12.9319006ZTY'),
	(3, '2024-12', '9319001ZTY', 36114750, 43463723, 0, 0, -7348973, '2024-12.9319001ZTY'),
	(4, '2024-12', '9318942ZY', 47686000, 50571488, 0, 0, -2885488, '2024-12.9318942ZY'),
	(5, '2024-12', '9318139ZY', 46980000, 49883787, 0, 0, -2903787, '2024-12.9318139ZY'),
	(6, '2024-12', '93173965ZY', 58605500, 57426959, 0, 0, 1178541, '2024-12.93173965ZY'),
	(7, '2024-12', '93172114ZY', 74663750, 2709141, 53923750, 0, 18030859, '2024-12.93172114ZY'),
	(8, '2024-12', '93171068ZY', 102776200, 107794958, 0, 0, -5018758, '2024-12.93171068ZY');

-- membuang struktur untuk table hrisori.keluhan
CREATE TABLE IF NOT EXISTS `keluhan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip_pengeluh` varchar(20) NOT NULL,
  `keluhan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.keluhan: ~0 rows (lebih kurang)

-- membuang struktur untuk table hrisori.kondisi_kesehatan
CREATE TABLE IF NOT EXISTS `kondisi_kesehatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `tanggal` varchar(10) DEFAULT '',
  `jam` varchar(8) DEFAULT '',
  `suhu` varchar(30) DEFAULT '',
  `kondisi` text,
  `jam2` varchar(8) DEFAULT '',
  `suhu2` varchar(30) DEFAULT '',
  `kondisi2` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.kondisi_kesehatan: 7 rows
/*!40000 ALTER TABLE `kondisi_kesehatan` DISABLE KEYS */;
INSERT INTO `kondisi_kesehatan` (`id`, `nip`, `tanggal`, `jam`, `suhu`, `kondisi`, `jam2`, `suhu2`, `kondisi2`) VALUES
	(1, '8510210Z', '2021-07-20', '10:05:22', '', 'Sehat Tanpa Gejala', '', '', NULL),
	(2, '8017001TRK', '2021-07-20', '05:55:44', '', 'Sehat Tanpa Gejala', '', '', NULL),
	(3, '9419003PRO', '2021-07-20', '10:46:57', '', 'Tidak ada keluhan', '', '', NULL),
	(4, '7905008D', '2021-07-20', '13:35:33', '', 'Tidak ada keluhan', '', '', NULL),
	(5, '7719002PCN', '2021-07-20', '13:59:33', '', 'Batuk / Pilek', '', '', NULL),
	(6, '9419003PRO', '2021-07-21', '07:23:03', '', 'Tidak ada keluhan', '', '', NULL),
	(7, '7905008D', '2021-07-21', '07:25:03', '', 'Tidak ada keluhan', '', '', NULL);
/*!40000 ALTER TABLE `kondisi_kesehatan` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.konsumsi
CREATE TABLE IF NOT EXISTS `konsumsi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_pengajuan` varchar(60) DEFAULT '',
  `tgl_permintaan` varchar(10) DEFAULT '',
  `user_permintaan` varchar(60) DEFAULT '',
  `jenis_acara` varchar(200) DEFAULT '',
  `uraian_acara` varchar(250) DEFAULT '',
  `lokasi` varchar(250) DEFAULT '',
  `tgl_acara` varchar(10) DEFAULT '',
  `jam_mulai` varchar(5) DEFAULT '',
  `jam_selesai` varchar(5) DEFAULT '',
  `jumlah_peserta` int NOT NULL DEFAULT '0',
  `jenis_makanan` varchar(250) DEFAULT NULL,
  `uraian_makanan` varchar(250) DEFAULT '',
  `uraian_minuman` varchar(250) DEFAULT '',
  `harga_satuan_makanan` double NOT NULL DEFAULT '0',
  `jumlah_harga_makanan` double NOT NULL DEFAULT '0',
  `harga_satuan_minuman` double NOT NULL DEFAULT '0',
  `jumlah_harga_minuman` double NOT NULL DEFAULT '0',
  `total_harga` double NOT NULL DEFAULT '0',
  `approve1` varchar(1) NOT NULL DEFAULT '0',
  `tgl_approve1` varchar(10) DEFAULT '',
  `approval1` varchar(120) DEFAULT '',
  `alasan_reject1` varchar(250) DEFAULT '',
  `approve2` varchar(1) NOT NULL DEFAULT '0',
  `tgl_approve2` varchar(10) DEFAULT NULL,
  `approval2` varchar(120) DEFAULT '',
  `alasan_reject2` varchar(250) DEFAULT '',
  `approve3` varchar(1) NOT NULL DEFAULT '0',
  `tgl_approve3` varchar(10) DEFAULT NULL,
  `approval3` varchar(120) DEFAULT '',
  `alasan_reject3` varchar(250) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.konsumsi: 8 rows
/*!40000 ALTER TABLE `konsumsi` DISABLE KEYS */;
INSERT INTO `konsumsi` (`id`, `no_pengajuan`, `tgl_permintaan`, `user_permintaan`, `jenis_acara`, `uraian_acara`, `lokasi`, `tgl_acara`, `jam_mulai`, `jam_selesai`, `jumlah_peserta`, `jenis_makanan`, `uraian_makanan`, `uraian_minuman`, `harga_satuan_makanan`, `jumlah_harga_makanan`, `harga_satuan_minuman`, `jumlah_harga_minuman`, `total_harga`, `approve1`, `tgl_approve1`, `approval1`, `alasan_reject1`, `approve2`, `tgl_approve2`, `approval2`, `alasan_reject2`, `approve3`, `tgl_approve3`, `approval3`, `alasan_reject3`) VALUES
	(1, '0001/KONSUMSI/MUM/2021', '2021-11-20', '7719002PCN', 'Non Diklat', 'Tes Lembur', 'Kantor', '2021-11-20', '23:00', '23:50', 1, 'Makanan Berat', 'Nasi Goreng', 'Es Teh', 25000, 25000, 5000, 5000, 30000, '2', '2021-11-20', '8510210Z', '', '2', '2021-11-20', '7905006R2', '', '2', '2021-11-21', '6793082D', ''),
	(2, '0002/KONSUMSI/MUM/2021', '2021-11-22', '7905006R2', 'Rapat', 'Pembahasan kajian risiko AI Gedung Baru sesuai format baru Div PFM', 'Gedung 1 lt 3', '2021-11-22', '17:30', '20:00', 4, 'Makanan Ringan', 'Kue/gorengan', 'Kopi', 0, 0, 0, 0, 0, '2', '2022-06-06', '6793082D', '', '0', NULL, '8206607Z', '', '0', NULL, '6793082D', ''),
	(3, '0003/KONSUMSI/MUM/2021', '2021-11-30', '8017001TRK', '', '', 'Gedung 1 ruang rapat bangkanai', '', '', '', 0, '', '', '', 0, 0, 0, 0, 0, '2', '2021-11-30', '7905008D', '', '0', NULL, '8206607Z', '', '0', NULL, '6793082D', ''),
	(6, '0004/KONSUMSI/MUM/2021', '2021-12-14', '8017001TRK', '', '', 'Gedung 1', '', '', '', 0, '', '', '', 0, 0, 0, 0, 0, '2', '2021-12-14', '7905008D', '', '0', NULL, '8206607Z', '', '0', NULL, '6793082D', ''),
	(7, '0005/KONSUMSI/MUM/2021', '2021-12-20', '8017001TRK', '', '', 'RR RENPUS Gedung 2', '', '', '', 0, '', '', '', 0, 0, 0, 0, 0, '2', '2021-12-24', '7905008D', '', '0', NULL, '8206607Z', '', '0', NULL, '6793082D', ''),
	(8, '0006/KONSUMSI/MUM/2021', '2021-12-20', '8017001TRK', '', '', 'RR RENPUS Gedung 2', '', '', '', 0, '', '', '', 0, 0, 0, 0, 0, '2', '2021-12-24', '7905008D', '', '0', NULL, '8206607Z', '', '0', NULL, '6793082D', ''),
	(9, '0007/KONSUMSI/MUM/2021', '2021-12-20', '8017001TRK', '', '', 'Gedung 2', '', '', '', 0, '', '', '', 0, 0, 0, 0, 0, '2', '2021-12-24', '7905008D', '', '0', NULL, '8206607Z', '', '0', NULL, '6793082D', ''),
	(10, '0008/KONSUMSI/MUM/2021', '2021-12-20', '8017001TRK', '', '', 'Gedung 2', '', '', '', 0, '', '', '', 0, 0, 0, 0, 0, '2', '2021-12-24', '7905008D', '', '0', NULL, '8206607Z', '', '0', NULL, '6793082D', '');
/*!40000 ALTER TABLE `konsumsi` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.kpi_pusat
CREATE TABLE IF NOT EXISTS `kpi_pusat` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `bulan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_kpi_pusat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel hrisori.kpi_pusat: ~0 rows (lebih kurang)

-- membuang struktur untuk table hrisori.kunci_data
CREATE TABLE IF NOT EXISTS `kunci_data` (
  `id` int NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) NOT NULL DEFAULT '',
  `kunci` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.kunci_data: 11 rows
/*!40000 ALTER TABLE `kunci_data` DISABLE KEYS */;
INSERT INTO `kunci_data` (`id`, `blth`, `kunci`) VALUES
	(1, '2020-01', '1'),
	(2, '2020-02', '1'),
	(3, '2020-03', '1'),
	(4, '2020-04', '1'),
	(5, '2020-05', '1'),
	(6, '2020-06', '1'),
	(7, '2020-07', '1'),
	(8, '2020-08', '1'),
	(9, '2020-09', '1'),
	(10, '2020-10', '1'),
	(11, '2020-11', '1');
/*!40000 ALTER TABLE `kunci_data` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.libur_nasional
CREATE TABLE IF NOT EXISTS `libur_nasional` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(10) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.libur_nasional: 8 rows
/*!40000 ALTER TABLE `libur_nasional` DISABLE KEYS */;
INSERT INTO `libur_nasional` (`id`, `tanggal`, `keterangan`) VALUES
	(3, '2021-01-01', 'Tahun Baru 2021'),
	(4, '2021-02-12', 'Tahun Baru Imlek'),
	(5, '2021-03-11', 'Isra\' Mi\'raj Nabi Muhammad SAW'),
	(6, '2021-03-14', 'Hari Raya Nyepi'),
	(7, '2021-04-02', 'Wafat Yesus Kristus'),
	(8, '2021-05-01', 'Hari Buruh'),
	(9, '2021-05-13', 'Kenaikan Isa Al Masih'),
	(10, '2021-05-14', 'Hari Raya Idul Fitri 1442 H');
/*!40000 ALTER TABLE `libur_nasional` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.log_aktivitas
CREATE TABLE IF NOT EXISTS `log_aktivitas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(30) DEFAULT '',
  `user` varchar(30) DEFAULT '',
  `nama` varchar(60) DEFAULT '',
  `aktivitas` text,
  `kode` varchar(250) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.log_aktivitas: 9 rows
/*!40000 ALTER TABLE `log_aktivitas` DISABLE KEYS */;
INSERT INTO `log_aktivitas` (`id`, `tanggal`, `user`, `nama`, `aktivitas`, `kode`) VALUES
	(2, '2020-08-06 07:45:13', 'sandy', 'Sandy Pare', 'Login', '2020-08-06 07:45:13-sandy-Login'),
	(3, '2020-08-06 08:44:23', 'sandy', 'Sandy Pare', 'Login', '2020-08-06 08:44:23-sandy-Login'),
	(4, '2020-08-06 08:46:44', 'sandy', 'Sandy Pare', 'Logout', '2020-08-06 08:46:44-sandy-Logout'),
	(5, '2020-08-07 02:23:59', 'priska', 'Priska', 'Login', '2020-08-07 02:23:59-priska-Login'),
	(6, '2020-08-07 03:41:19', 'hary', 'Hary Utama', 'Login', '2020-08-07 03:41:19-hary-Login'),
	(7, '2020-08-07 08:33:14', '8314005HPI', 'RIDUANSYAH', 'Logout', '2020-08-07 08:33:14-8314005HPI-Logout'),
	(8, '2020-08-07 09:14:48', 'priska', 'Priska', 'Login', '2020-08-07 09:14:48-priska-Login'),
	(9, '2020-08-07 09:27:08', 'sandy', 'Sandy Pare', 'Login', '2020-08-07 09:27:08-sandy-Login'),
	(10, '2020-08-07 09:28:33', 'sandy', 'Sandy Pare', 'Logout', '2020-08-07 09:28:33-sandy-Logout');
/*!40000 ALTER TABLE `log_aktivitas` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.mapping_pajak
CREATE TABLE IF NOT EXISTS `mapping_pajak` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `kode_departemen` varchar(30) DEFAULT '',
  `kode_project` varchar(30) DEFAULT '',
  `honorarium` varchar(30) DEFAULT '',
  `honorer` varchar(30) DEFAULT '',
  `tarif_grade` varchar(30) DEFAULT '',
  `tunjangan_posisi` varchar(30) DEFAULT '',
  `p21b` varchar(30) DEFAULT '',
  `p22b` varchar(30) DEFAULT '',
  `tunjangan_kemahalan` varchar(30) DEFAULT '',
  `tunjangan_perumahan` varchar(30) DEFAULT '',
  `tunjangan_transportasi` varchar(30) DEFAULT '',
  `bantuan_pulsa` varchar(30) DEFAULT '',
  `tunjangan_kompetensi` varchar(30) DEFAULT '',
  `dplk_persero` varchar(30) DEFAULT '',
  `dplk_simponi_pr` varchar(30) DEFAULT '',
  `bpjs_tk_pp` varchar(30) DEFAULT '',
  `bpjs_tk_kp` varchar(30) DEFAULT '',
  `bpjs_tk_kkp` varchar(30) DEFAULT '',
  `bpjs_tk_htp` varchar(30) DEFAULT '',
  `bpjs_kes_pp` varchar(30) DEFAULT '',
  `cop` varchar(30) DEFAULT '',
  `fasilitas_hp` varchar(30) DEFAULT '',
  `reimburse_kesehatan` varchar(30) DEFAULT '',
  `asuransi_kesehatan` varchar(30) DEFAULT '',
  `sarana_kerja` varchar(30) DEFAULT '',
  `sppd_manual` varchar(30) DEFAULT '',
  `asuransi_purna_jabatan` varchar(30) DEFAULT '',
  `medical_checkup` varchar(30) DEFAULT '',
  `beban_pph21` varchar(30) DEFAULT '',
  `thr` varchar(30) DEFAULT '',
  `cuti` varchar(30) DEFAULT '',
  `cuti_besar` varchar(30) DEFAULT '',
  `winduan` varchar(30) DEFAULT '',
  `iks` varchar(30) DEFAULT '',
  `ikp` varchar(30) DEFAULT '',
  `sppd_pusat` varchar(30) DEFAULT '',
  `sppd_region` varchar(30) DEFAULT '',
  `sppd_mutasi` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.mapping_pajak: 10 rows
/*!40000 ALTER TABLE `mapping_pajak` DISABLE KEYS */;
INSERT INTO `mapping_pajak` (`id`, `nip`, `kode_departemen`, `kode_project`, `honorarium`, `honorer`, `tarif_grade`, `tunjangan_posisi`, `p21b`, `p22b`, `tunjangan_kemahalan`, `tunjangan_perumahan`, `tunjangan_transportasi`, `bantuan_pulsa`, `tunjangan_kompetensi`, `dplk_persero`, `dplk_simponi_pr`, `bpjs_tk_pp`, `bpjs_tk_kp`, `bpjs_tk_kkp`, `bpjs_tk_htp`, `bpjs_kes_pp`, `cop`, `fasilitas_hp`, `reimburse_kesehatan`, `asuransi_kesehatan`, `sarana_kerja`, `sppd_manual`, `asuransi_purna_jabatan`, `medical_checkup`, `beban_pph21`, `thr`, `cuti`, `cuti_besar`, `winduan`, `iks`, `ikp`, `sppd_pusat`, `sppd_region`, `sppd_mutasi`) VALUES
	(1, '9219004ZTY', 'MAPA', 'MAPA_7500_03_0011', '', '', '6201100000', '6201200000', '6201200000', '6202330000', '6201200000', '', '', '6401052000', '', '', '6202250000', '6202240000', '6202230000', '6202220000', '', '6202210000', '', '6401052000', '6202300000', '', '', '', '', '6202300000', '6202260000', '6202180000', '6202110000', '6202120000', '6202130000', '6201300000', '6201400000', '6401031000', '5109114000', '6202340000'),
	(2, '9219005ZTY', 'SUL1', 'SUL1_7300_10_0006', '', '', '6201100000', '6201200000', '6201200000', '6202330000', '6201200000', '', '', '6401052000', '', '', '6202250000', '6202240000', '6202230000', '6202220000', '', '6202210000', '', '6401052000', '6202300000', '', '', '', '', '6202300000', '6202260000', '6202180000', '6202110000', '6202120000', '6202130000', '6201300000', '6201400000', '6401031000', '5109114000', '6202340000'),
	(3, '9319001ZTY', 'SUL2', 'SUL2_7400_10_0018', '', '', '6201100000', '6201200000', '6201200000', '6202330000', '6201200000', '', '', '6401052000', '', '', '6202250000', '6202240000', '6202230000', '6202220000', '', '6202210000', '', '6401052000', '6202300000', '', '', '', '', '6202300000', '6202260000', '6202180000', '6202110000', '6202120000', '6202130000', '6201300000', '6201400000', '6401031000', '5109114000', '6202340000'),
	(4, '9319006ZTY', 'SUL1', 'SUL1_7300_10_0001', '', '', '6201100000', '6201200000', '6201200000', '6202330000', '6201200000', '', '', '6401052000', '', '', '6202250000', '6202240000', '6202230000', '6202220000', '', '6202210000', '', '6401052000', '6202300000', '', '', '', '', '6202300000', '6202260000', '6202180000', '6202110000', '6202120000', '6202130000', '6201300000', '6201400000', '6401031000', '5109114000', '6202340000'),
	(5, '9519002ZTY', 'KAL3', 'KAL3_7200_10_0013', '', '', '6201100000', '6201200000', '6201200000', '6202330000', '6201200000', '', '', '6401052000', '', '', '6202250000', '6202240000', '6202230000', '6202220000', '', '6202210000', '', '6401052000', '6202300000', '', '', '', '', '6202300000', '6202260000', '6202180000', '6202110000', '6202120000', '6202130000', '6201300000', '6201400000', '6401031000', '5109114000', '6202340000'),
	(6, '9519003ZTY', 'KAL1', 'KAL1_6800_10_0013', '', '', '6201100000', '6201200000', '6201200000', '6202330000', '6201200000', '', '', '6401052000', '', '', '6202250000', '6202240000', '6202230000', '6202220000', '', '6202210000', '', '6401052000', '6202300000', '', '', '', '', '6202300000', '6202260000', '6202180000', '6202110000', '6202120000', '6202130000', '6201300000', '6201400000', '6401031000', '5109114000', '6202340000'),
	(7, '9219007PCN', 'NUSA', 'NUSA_7700_02_0003', '', '', '5104200110', '5104200120', '5104200120', '5104200370', '5104200120', '', '', '5109117000', '', '', '5104200290', '5104200280', '5104200270', '5104200260', '5104200240', '5104200250', '', '6401052000', '5104200340', '5104200290', '', '', '', '5104200340', '5104200300', '5104200220', '5104200150', '5104200160', '5104200170', '5104200130', '5104200140', '', '5109114000', '5104200380'),
	(8, '9419007ZTY', 'KAL3', 'KAL3_7200_10_0028', '', '', '6201100000', '6201200000', '6201200000', '6202330000', '6201200000', '', '', '6401052000', '', '', '6202250000', '6202240000', '6202230000', '6202220000', '', '6202210000', '', '6401052000', '6202300000', '', '', '', '', '6202300000', '6202260000', '6202180000', '6202110000', '6202120000', '6202130000', '6201300000', '6201400000', '6401031000', '5109114000', '6202340000'),
	(9, '9219008ZTY', 'PUST', 'PUST_KPUS_13_0000', '', '', '6201100000', '6201200000', '6201200000', '6202330000', '6201200000', '', '', '6401052000', '', '', '6202250000', '6202240000', '6202230000', '6202220000', '', '6202210000', '', '6401052000', '6202300000', '', '', '', '', '6202300000', '6202260000', '6202180000', '6202110000', '6202120000', '6202130000', '6201300000', '6201400000', '6401031000', '5109114000', '6202340000'),
	(10, '9219011ZTY', 'SUL2', 'SUL2_7400_10_0019', '', '', '6201100000', '6201200000', '6201200000', '6202330000', '6201200000', '', '', '6401052000', '', '', '6202250000', '6202240000', '6202230000', '6202220000', '', '6202210000', '', '6401052000', '6202300000', '', '', '', '', '6202300000', '6202260000', '6202180000', '6202110000', '6202120000', '6202130000', '6201300000', '6201400000', '6401031000', '5109114000', '6202340000');
/*!40000 ALTER TABLE `mapping_pajak` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.mapping_sptmasa
CREATE TABLE IF NOT EXISTS `mapping_sptmasa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `kode` varchar(30) DEFAULT '',
  `kode_departemen` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '',
  `kode_project` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '',
  `honorarium` varchar(30) DEFAULT '',
  `honorer` varchar(30) DEFAULT '',
  `tarif_grade` varchar(30) DEFAULT '',
  `tunjangan_posisi` varchar(30) DEFAULT '',
  `p21b` varchar(30) DEFAULT '',
  `p22b` varchar(30) DEFAULT '',
  `tunjangan_kemahalan` varchar(30) DEFAULT '',
  `tunjangan_perumahan` varchar(30) DEFAULT '',
  `tunjangan_transportasi` varchar(30) DEFAULT '',
  `bantuan_pulsa` varchar(30) DEFAULT '',
  `tunjangan_kompetensi` varchar(30) DEFAULT '',
  `dplk_persero` varchar(30) DEFAULT '',
  `dplk_simponi_pr` varchar(30) DEFAULT '',
  `bpjs_tk_pp` varchar(30) DEFAULT '',
  `bpjs_tk_kp` varchar(30) DEFAULT '',
  `bpjs_tk_kkp` varchar(30) DEFAULT '',
  `bpjs_tk_htp` varchar(30) DEFAULT '',
  `bpjs_kes_pp` varchar(30) DEFAULT '',
  `cop` varchar(30) DEFAULT '',
  `fasilitas_hp` varchar(30) DEFAULT '',
  `reimburse_kesehatan` varchar(30) DEFAULT '',
  `asuransi_kesehatan` varchar(30) DEFAULT '',
  `sarana_kerja` varchar(30) DEFAULT '',
  `sppd_manual` varchar(30) DEFAULT '',
  `asuransi_purna_jabatan` varchar(30) DEFAULT '',
  `medical_checkup` varchar(30) DEFAULT '',
  `beban_pph21` varchar(30) DEFAULT '',
  `thr` varchar(30) DEFAULT '',
  `cuti` varchar(30) DEFAULT '',
  `cuti_besar` varchar(30) DEFAULT '',
  `winduan` varchar(30) DEFAULT '',
  `iks` varchar(30) DEFAULT '',
  `ikp` varchar(30) DEFAULT '',
  `sppd_pusat` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '',
  `sppd_region` varchar(30) DEFAULT '',
  `sppd_mutasi` varchar(30) DEFAULT '',
  `bruto` double NOT NULL DEFAULT '0',
  `pph21` double NOT NULL DEFAULT '0',
  `akun_honorarium` varchar(30) DEFAULT '',
  `akun_honorer` varchar(30) DEFAULT '',
  `akun_tarif_grade` varchar(30) DEFAULT '',
  `akun_tunjangan_posisi` varchar(30) DEFAULT '',
  `akun_p21b` varchar(30) DEFAULT '',
  `akun_p22b` varchar(30) DEFAULT '',
  `akun_tunjangan_kemahalan` varchar(30) DEFAULT '',
  `akun_tunjangan_perumahan` varchar(30) DEFAULT '',
  `akun_tunjangan_transportasi` varchar(30) DEFAULT '',
  `akun_bantuan_pulsa` varchar(30) DEFAULT '',
  `akun_tunjangan_kompetensi` varchar(30) DEFAULT '',
  `akun_dplk_persero` varchar(30) DEFAULT '',
  `akun_dplk_simponi_pr` varchar(30) DEFAULT '',
  `akun_bpjs_tk_pp` varchar(30) DEFAULT '',
  `akun_bpjs_tk_kp` varchar(30) DEFAULT '',
  `akun_bpjs_tk_kkp` varchar(30) DEFAULT '',
  `akun_bpjs_tk_htp` varchar(30) DEFAULT '',
  `akun_bpjs_kes_pp` varchar(30) DEFAULT '',
  `akun_cop` varchar(30) DEFAULT '',
  `akun_fasilitas_hp` varchar(30) DEFAULT '',
  `akun_reimburse_kesehatan` varchar(30) DEFAULT '',
  `akun_asuransi_kesehatan` varchar(30) DEFAULT '',
  `akun_sarana_kerja` varchar(30) DEFAULT '',
  `akun_sppd_manual` varchar(30) DEFAULT '',
  `akun_asuransi_purna_jabatan` varchar(30) DEFAULT '',
  `akun_medical_checkup` varchar(30) DEFAULT '',
  `akun_beban_pph21` varchar(30) DEFAULT '',
  `akun_thr` varchar(30) DEFAULT '',
  `akun_cuti` varchar(30) DEFAULT '',
  `akun_cuti_besar` varchar(30) DEFAULT '',
  `akun_winduan` varchar(30) DEFAULT '',
  `akun_iks` varchar(30) DEFAULT '',
  `akun_ikp` varchar(30) DEFAULT '',
  `akun_sppd_pusat` varchar(30) DEFAULT '',
  `akun_sppd_region` varchar(30) DEFAULT '',
  `akun_sppd_mutasi` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode` (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.mapping_sptmasa: ~6 rows (lebih kurang)
INSERT INTO `mapping_sptmasa` (`id`, `blth`, `nip`, `kode`, `kode_departemen`, `kode_project`, `honorarium`, `honorer`, `tarif_grade`, `tunjangan_posisi`, `p21b`, `p22b`, `tunjangan_kemahalan`, `tunjangan_perumahan`, `tunjangan_transportasi`, `bantuan_pulsa`, `tunjangan_kompetensi`, `dplk_persero`, `dplk_simponi_pr`, `bpjs_tk_pp`, `bpjs_tk_kp`, `bpjs_tk_kkp`, `bpjs_tk_htp`, `bpjs_kes_pp`, `cop`, `fasilitas_hp`, `reimburse_kesehatan`, `asuransi_kesehatan`, `sarana_kerja`, `sppd_manual`, `asuransi_purna_jabatan`, `medical_checkup`, `beban_pph21`, `thr`, `cuti`, `cuti_besar`, `winduan`, `iks`, `ikp`, `sppd_pusat`, `sppd_region`, `sppd_mutasi`, `bruto`, `pph21`, `akun_honorarium`, `akun_honorer`, `akun_tarif_grade`, `akun_tunjangan_posisi`, `akun_p21b`, `akun_p22b`, `akun_tunjangan_kemahalan`, `akun_tunjangan_perumahan`, `akun_tunjangan_transportasi`, `akun_bantuan_pulsa`, `akun_tunjangan_kompetensi`, `akun_dplk_persero`, `akun_dplk_simponi_pr`, `akun_bpjs_tk_pp`, `akun_bpjs_tk_kp`, `akun_bpjs_tk_kkp`, `akun_bpjs_tk_htp`, `akun_bpjs_kes_pp`, `akun_cop`, `akun_fasilitas_hp`, `akun_reimburse_kesehatan`, `akun_asuransi_kesehatan`, `akun_sarana_kerja`, `akun_sppd_manual`, `akun_asuransi_purna_jabatan`, `akun_medical_checkup`, `akun_beban_pph21`, `akun_thr`, `akun_cuti`, `akun_cuti_besar`, `akun_winduan`, `akun_iks`, `akun_ikp`, `akun_sppd_pusat`, `akun_sppd_region`, `akun_sppd_mutasi`) VALUES
	(1, '2024-09', '8206607Z', '2024-09-8206607Z', 'PUST', 'PUST_KPUS_13_0000', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '5247000', '0', '0', '0', '0', '0', '0', '9400000', '0', '65580000', 80227000, 6034050, '', '', '6201100000', '6201200000', '6201200000', '6202330000', '6201200000', '', '', '6401052000', '', '6202190000', '', '6202240000', '6202230000', '6202220000', '', '6202210000', '', '6401052000', '6202300000', '', '', '', '', '6202300000', '6202260000', '6202180000', '6202110000', '6202120000', '6202130000', '6201300000', '6201400000', '6401031000', '5109114000', '6202340000'),
	(2, '2024-08', '6220002PRO', '2024-08-6220002PRO', 'MAPA', 'MAPA_KREG_13_0000', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1975000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1975000, 0, '', '5109111000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6401018000', '6401052000', '6401018000', '6401018000', '6401018000', '6401018000', '6401018000', '6401018000', '5109111000', '5109111000', '', '', '1107109000', '', '', '', '', ''),
	(3, '2024-09', '8309076Z', '2024-09-8309076Z', 'NUSA', 'NUSA_KREG_13_0000', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '71250', '0', '0', '0', '0', '0', '0', '0', '1425000', '0', 1496250, 74813, '', '', '6201100000', '6201200000', '6201200000', '6202330000', '6201200000', '', '', '6401052000', '', '6202190000', '', '6202240000', '6202230000', '6202220000', '', '6202210000', '', '6401052000', '6202300000', '', '', '', '', '6202300000', '6202260000', '6202180000', '6202110000', '6202120000', '6202130000', '6201300000', '6201400000', '6401031000', '5109114000', '6202340000'),
	(4, '2024-08', '9219005ZTY', '2024-08-9219005ZTY', 'SUL1', 'SUL1_7300_10_0006', '0', '0', '8597000', '3605000', '4391000', '', '1470000', '0', '0', '750000', '0', '0', '343880', '171940', '25791', '76513', '318089', '343880', '0', '0', '0', '0', '0', '0', '0', '0', '5988430', '0', '0', '0', '0', '12824796.500967', '0', '0', '1750000', '0', 40166290.500967, 0, '', '', '6201100000', '6201200000', '6201200000', '6202330000', '6201200000', '', '', '6401052000', '', '', '6202250000', '6202240000', '6202230000', '6202220000', '', '6202210000', '', '6401052000', '6202300000', '', '', '', '', '6202300000', '6202260000', '6202180000', '6202110000', '6202120000', '6202130000', '6201300000', '6201400000', '6401031000', '5109114000', '6202340000'),
	(5, '2024-08', '9319001ZTY', '2024-08-9319001ZTY', 'SUL2', 'SUL2_7400_10_0018', '0', '0', '7070000', '3405000', '800000', '', '1260000', '0', '0', '500000', '0', '0', '282800', '141400', '21210', '62923', '261590', '282800', '0', '0', '0', '0', '0', '0', '0', '0', '4702803', '0', '0', '0', '0', '10981710.333034', '0', '0', '0', '0', 29369246.333034, 0, '', '', '6201100000', '6201200000', '6201200000', '6202330000', '6201200000', '', '', '6401052000', '', '', '6202250000', '6202240000', '6202230000', '6202220000', '', '6202210000', '', '6401052000', '6202300000', '', '', '', '', '6202300000', '6202260000', '6202180000', '6202110000', '6202120000', '6202130000', '6201300000', '6201400000', '6401031000', '5109114000', '6202340000'),
	(6, '2024-08', '9219004ZTY', '2024-08-9219004ZTY', 'MAMA', '', '0', '0', '8347000', '3605000', '4391000', '', '1911000', '0', '0', '750000', '0', '0', '333880', '166940', '25041', '74288', '308839', '333880', '0', '0', '0', '0', '0', '0', '0', '0', '6456132', '0', '0', '0', '0', '11389730.466113', '0', '0', '0', '0', 37616951.466113, 0, '', '', '6201100000', '6201200000', '6201200000', '6202330000', '6201200000', '', '', '6401052000', '', '', '6202250000', '6202240000', '6202230000', '6202220000', '', '6202210000', '', '6401052000', '6202300000', '', '', '', '', '6202300000', '6202260000', '6202180000', '6202110000', '6202120000', '6202130000', '6201300000', '6201400000', '6401031000', '5109114000', '6202340000');

-- membuang struktur untuk table hrisori.masteruser
CREATE TABLE IF NOT EXISTS `masteruser` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL DEFAULT '',
  `user_pass` varchar(80) DEFAULT '',
  `superadmin` varchar(1) NOT NULL DEFAULT '0',
  `user_email` varchar(60) DEFAULT '',
  `user_fullname` varchar(80) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '1',
  `foto` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel hrisori.masteruser: 2 rows
/*!40000 ALTER TABLE `masteruser` DISABLE KEYS */;
INSERT INTO `masteruser` (`id`, `user_name`, `user_pass`, `superadmin`, `user_email`, `user_fullname`, `jabatan`, `aktif`, `foto`) VALUES
	(2, 'admin', '123456', '1', 'aaa@a.a', 'addd', 'ad', '1', 'ada'),
	(1, 'sandy', '123456', '1', 'aaa@a.a', 'aasds', 'aa', '1', 'aaaa');
/*!40000 ALTER TABLE `masteruser` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.master_bantuan_mutasi
CREATE TABLE IF NOT EXISTS `master_bantuan_mutasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jarak_awal` double NOT NULL DEFAULT '0',
  `jarak_akhir` double NOT NULL DEFAULT '0',
  `tarif` double NOT NULL DEFAULT '0',
  `status` varchar(5) DEFAULT '',
  `level1` double NOT NULL DEFAULT '0',
  `level2` double NOT NULL DEFAULT '0',
  `level3` double NOT NULL DEFAULT '0',
  `level4` double NOT NULL DEFAULT '0',
  `level5` double NOT NULL DEFAULT '0',
  `level6` double NOT NULL DEFAULT '0',
  `level7` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.master_bantuan_mutasi: 10 rows
/*!40000 ALTER TABLE `master_bantuan_mutasi` DISABLE KEYS */;
INSERT INTO `master_bantuan_mutasi` (`id`, `jarak_awal`, `jarak_akhir`, `tarif`, `status`, `level1`, `level2`, `level3`, `level4`, `level5`, `level6`, `level7`) VALUES
	(1, 20, 250, 17500, 'K3', 21437500, 19250000, 19250000, 19250000, 17500000, 17500000, 17500000),
	(2, 20, 250, 17500, 'K2', 17500000, 15750000, 15750000, 15750000, 14000000, 14000000, 14000000),
	(3, 20, 250, 17500, 'K1', 13562500, 12250000, 12250000, 12250000, 10937500, 10937500, 10937500),
	(4, 20, 250, 17500, 'TK3', 16625000, 14875000, 14875000, 14875000, 13125000, 13125000, 13125000),
	(5, 20, 250, 17500, 'TK2', 12687500, 11375000, 11375000, 11375000, 10500000, 10500000, 10500000),
	(6, 20, 250, 17500, 'TK1', 8750000, 7875000, 7875000, 7875000, 7000000, 7000000, 7000000),
	(7, 20, 250, 17500, 'K0', 9625000, 8750000, 8750000, 8750000, 7875000, 7875000, 7875000),
	(8, 20, 250, 17500, 'TK0', 4812500, 4375000, 4375000, 4375000, 3937500, 3937500, 3937500),
	(9, 251, 500, 20000, 'K3', 24500000, 22000000, 22000000, 22000000, 20000000, 20000000, 20000000),
	(10, 251, 500, 20000, 'K2', 20000000, 18000000, 18000000, 18000000, 16000000, 16000000, 16000000);
/*!40000 ALTER TABLE `master_bantuan_mutasi` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.master_biaya_sppd
CREATE TABLE IF NOT EXISTS `master_biaya_sppd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `batas_awal` varchar(10) DEFAULT '',
  `batas_akhir` varchar(10) DEFAULT '',
  `level_sppd` varchar(1) NOT NULL DEFAULT '',
  `konsumsi` double NOT NULL DEFAULT '0',
  `cuci_pakaian` double NOT NULL DEFAULT '0',
  `transportasi_lokal` double NOT NULL DEFAULT '0',
  `penginapan` double NOT NULL DEFAULT '0',
  `lumpsum_penginapan` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.master_biaya_sppd: 10 rows
/*!40000 ALTER TABLE `master_biaya_sppd` DISABLE KEYS */;
INSERT INTO `master_biaya_sppd` (`id`, `batas_awal`, `batas_akhir`, `level_sppd`, `konsumsi`, `cuci_pakaian`, `transportasi_lokal`, `penginapan`, `lumpsum_penginapan`) VALUES
	(1, '2018-01-01', '2023-06-31', '1', 300000, 40000, 300000, 800000, 0),
	(2, '2018-01-01', '2023-06-31', '2', 270000, 40000, 300000, 700000, 0),
	(3, '2018-01-01', '2023-06-31', '3', 240000, 40000, 300000, 600000, 0),
	(4, '2018-01-01', '2023-06-31', '4', 210000, 40000, 300000, 500000, 0),
	(5, '2018-01-01', '2023-06-31', '5', 180000, 40000, 300000, 450000, 0),
	(6, '2018-01-01', '2023-06-31', '6', 150000, 40000, 300000, 400000, 0),
	(7, '2018-01-01', '2023-06-31', '7', 120000, 40000, 300000, 350000, 0),
	(8, '2023-07-01', '2050-12-31', '1', 600000, 55000, 500000, 2000000, 1200000),
	(9, '2023-07-01', '2050-12-31', '2', 440000, 50000, 500000, 1750000, 1050000),
	(10, '2023-07-01', '2050-12-31', '3', 385000, 50000, 500000, 1500000, 900000);
/*!40000 ALTER TABLE `master_biaya_sppd` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.master_biaya_transportasi
CREATE TABLE IF NOT EXISTS `master_biaya_transportasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kota_asal` varchar(120) DEFAULT '',
  `kota_tujuan` varchar(120) DEFAULT '',
  `jenis_transportasi` varchar(120) DEFAULT '',
  `biaya` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.master_biaya_transportasi: ~0 rows (lebih kurang)

-- membuang struktur untuk table hrisori.master_divisi
CREATE TABLE IF NOT EXISTS `master_divisi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `divisi` varchar(160) DEFAULT '',
  `pejabat` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `divisi` (`divisi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.master_divisi: 7 rows
/*!40000 ALTER TABLE `master_divisi` DISABLE KEYS */;
INSERT INTO `master_divisi` (`id`, `divisi`, `pejabat`) VALUES
	(1, 'DIVISI RENBANGIT', '6592053Z'),
	(2, 'DIVISI OPERASI', '6592053Z'),
	(3, 'DIVISI SDM & UMUM', '7702003R2'),
	(4, 'DIVISI KEUANGAN', '7702003R2'),
	(5, 'DIVISI HUKUM, KEPATUHAN & MANAJEMEN RESIKO', '6793163Z'),
	(6, 'CORPORATE SECRETARY', '6793163Z'),
	(7, 'SATUAN PENGAWAS INTERN', '6793163Z');
/*!40000 ALTER TABLE `master_divisi` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.master_gaji
CREATE TABLE IF NOT EXISTS `master_gaji` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `jenis` varchar(200) DEFAULT '',
  `grade` varchar(60) DEFAULT '',
  `skala_grade` varchar(120) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `gaji_dasar` double NOT NULL DEFAULT '0',
  `honorarium` double NOT NULL DEFAULT '0',
  `honorer` double NOT NULL DEFAULT '0',
  `tarif_grade` double NOT NULL DEFAULT '0',
  `tunjangan_posisi` double NOT NULL DEFAULT '0',
  `p21b` double NOT NULL DEFAULT '0',
  `tunjangan_kemahalan` double NOT NULL DEFAULT '0',
  `tunjangan_perumahan` double NOT NULL DEFAULT '0',
  `tunjangan_transportasi` double NOT NULL DEFAULT '0',
  `bantuan_pulsa` double NOT NULL DEFAULT '0',
  `tunjangan_kompetensi` double NOT NULL DEFAULT '0',
  `dplk_persero` double NOT NULL DEFAULT '0',
  `dplk_simponi_pr` double NOT NULL DEFAULT '0',
  `nama_tunjangan1` varchar(200) DEFAULT '',
  `tunjangan1` double NOT NULL DEFAULT '0',
  `nama_tunjangan2` varchar(200) DEFAULT '',
  `tunjangan2` double NOT NULL DEFAULT '0',
  `nama_tunjangan3` varchar(200) DEFAULT '',
  `tunjangan3` double NOT NULL DEFAULT '0',
  `nama_tunjangan4` varchar(200) DEFAULT '',
  `tunjangan4` double NOT NULL DEFAULT '0',
  `bpjs_tk_pp` double NOT NULL DEFAULT '0',
  `bpjs_tk_kp` double NOT NULL DEFAULT '0',
  `bpjs_tk_kkp` double NOT NULL DEFAULT '0',
  `bpjs_tk_htp` double NOT NULL DEFAULT '0',
  `bpjs_tk_jhtk` double NOT NULL DEFAULT '0',
  `bpjs_tk_pk` double NOT NULL DEFAULT '0',
  `rp_bpjs_tk_pp` double NOT NULL DEFAULT '0',
  `rp_bpjs_tk_kp` double NOT NULL DEFAULT '0',
  `rp_bpjs_tk_kkp` double NOT NULL DEFAULT '0',
  `rp_bpjs_tk_htp` double NOT NULL DEFAULT '0',
  `rp_bpjs_tk_jhtk` double NOT NULL DEFAULT '0',
  `rp_bpjs_tk_pk` double NOT NULL DEFAULT '0',
  `bpjs_kes_pp` double NOT NULL DEFAULT '0',
  `bpjs_kes_pk` double NOT NULL DEFAULT '0',
  `pot_koperasi` double NOT NULL DEFAULT '0',
  `pot_bazis` double NOT NULL DEFAULT '0',
  `dplk_simponi` double NOT NULL DEFAULT '0',
  `pot_dplk_pribadi` double NOT NULL DEFAULT '0',
  `cop_kendaraan` double NOT NULL DEFAULT '0',
  `iuran_peserta` double NOT NULL DEFAULT '0',
  `brpr` double NOT NULL DEFAULT '0',
  `sewa_mess` double NOT NULL DEFAULT '0',
  `qurban` double NOT NULL DEFAULT '0',
  `arisan` double NOT NULL DEFAULT '0',
  `nama_potongan1` varchar(200) DEFAULT '',
  `potongan1` double NOT NULL DEFAULT '0',
  `nama_potongan2` varchar(200) DEFAULT '',
  `potongan2` double NOT NULL DEFAULT '0',
  `nama_potongan3` varchar(200) DEFAULT '',
  `potongan3` double NOT NULL DEFAULT '0',
  `nama_potongan4` varchar(200) DEFAULT '',
  `potongan4` double NOT NULL DEFAULT '0',
  `aktif` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.master_gaji: 10 rows
/*!40000 ALTER TABLE `master_gaji` DISABLE KEYS */;
INSERT INTO `master_gaji` (`id`, `nip`, `jenis`, `grade`, `skala_grade`, `jabatan`, `gaji_dasar`, `honorarium`, `honorer`, `tarif_grade`, `tunjangan_posisi`, `p21b`, `tunjangan_kemahalan`, `tunjangan_perumahan`, `tunjangan_transportasi`, `bantuan_pulsa`, `tunjangan_kompetensi`, `dplk_persero`, `dplk_simponi_pr`, `nama_tunjangan1`, `tunjangan1`, `nama_tunjangan2`, `tunjangan2`, `nama_tunjangan3`, `tunjangan3`, `nama_tunjangan4`, `tunjangan4`, `bpjs_tk_pp`, `bpjs_tk_kp`, `bpjs_tk_kkp`, `bpjs_tk_htp`, `bpjs_tk_jhtk`, `bpjs_tk_pk`, `rp_bpjs_tk_pp`, `rp_bpjs_tk_kp`, `rp_bpjs_tk_kkp`, `rp_bpjs_tk_htp`, `rp_bpjs_tk_jhtk`, `rp_bpjs_tk_pk`, `bpjs_kes_pp`, `bpjs_kes_pk`, `pot_koperasi`, `pot_bazis`, `dplk_simponi`, `pot_dplk_pribadi`, `cop_kendaraan`, `iuran_peserta`, `brpr`, `sewa_mess`, `qurban`, `arisan`, `nama_potongan1`, `potongan1`, `nama_potongan2`, `potongan2`, `nama_potongan3`, `potongan3`, `nama_potongan4`, `potongan4`, `aktif`) VALUES
	(1, '9219004ZTY', 'ORGANIK', 'Specific 3', '', 'PLT MANAGER UNIT LAYANAN MALUKU', 0, 0, 0, 7354000, 3605000, 4391000, 1911000, 0, 0, 750000, 0, 0, 4, '', 0, '', 0, '', 0, '', 0, 2, 0.3, 0.89, 3.7, 2, 1, 0, 0, 0, 0, 0, 0, 4, 1, 150000, 0, 6, 0, 0, 0, 0, 0, 0, 0, 'Iuran SP', 50000, '', 0, '', 0, '', 0, '1'),
	(2, '9219005ZTY', 'ORGANIK', 'Specific 2', '', 'PLT MANAGER AREA PALU DAN LUWUK', 0, 0, 0, 7943000, 3605000, 4391000, 1470000, 0, 0, 750000, 0, 0, 4, '', 0, '', 0, '', 0, '', 0, 2, 0.3, 0.89, 3.7, 2, 1, 0, 0, 0, 0, 0, 0, 4, 1, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 'Iuran SP', 50000, '', 0, '', 0, '', 0, '1'),
	(3, '9319001ZTY', 'ORGANIK', 'Basic 1', '', 'PLT TEAM LEADER SITE MAKASSAR UTARA', 0, 0, 0, 6116000, 3405000, 800000, 1260000, 0, 0, 500000, 0, 0, 4, '', 0, '', 0, '', 0, '', 0, 2, 0.3, 0.89, 3.7, 2, 1, 0, 0, 0, 0, 0, 0, 4, 1, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 'Iuran SP', 50000, '', 0, '', 0, '', 0, '1'),
	(4, '9319006ZTY', 'ORGANIK', 'Specific 3', '', 'PLT MANAGER UNIT LAYANAN MANADO, TAHUNA DAN KOTAMOBAGU', 0, 0, 0, 7354000, 3805000, 4957000, 1680000, 0, 0, 750000, 0, 0, 4, '', 0, '', 0, '', 0, '', 0, 2, 0.3, 0.89, 3.7, 2, 1, 0, 0, 0, 0, 0, 0, 4, 1, 100000, 0, 6, 0, 0, 0, 0, 0, 0, 0, 'Iuran SP', 50000, '', 0, '', 0, '', 0, '1'),
	(5, '9519002ZTY', 'ORGANIK', 'Basic 1', '', 'PLT TEAM LEADER SITE MELAK DAN KOTABANGUN', 0, 0, 0, 6044000, 3205000, 1443000, 1288000, 0, 0, 500000, 0, 0, 4, '', 0, '', 0, '', 0, '', 0, 2, 0.3, 0.89, 3.7, 2, 1, 0, 0, 0, 0, 0, 0, 4, 1, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 'Iuran SP', 50000, '', 0, '', 0, '', 0, '1'),
	(6, '9519003ZTY', 'ORGANIK', 'Basic 1', '', 'PLT MANAGER SITE SINGKAWANG', 0, 0, 0, 6185000, 3405000, 1443000, 1449000, 0, 0, 500000, 0, 0, 4, '', 0, '', 0, '', 0, '', 0, 2, 0.3, 0.89, 3.7, 2, 1, 0, 0, 0, 0, 0, 0, 4, 1, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, '1'),
	(7, '9219007PCN', 'TUGAS KERJA', 'Basic 1', '', 'PLT MANAGER PEMBANGKIT PRATAMA TALIWANG', 0, 0, 0, 4914000, 3405000, 1443000, 1449000, 0, 0, 500000, 0, 0, 4, '', 0, '', 0, '', 0, '', 0, 2, 0.3, 0.89, 3.7, 2, 1, 0, 0, 0, 0, 0, 0, 4, 1, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, '1'),
	(8, '9419007ZTY', 'ORGANIK', 'Basic 1', '', 'PLT SUPERVISOR OPERASI', 0, 0, 0, 5924000, 3405000, 1443000, 1449000, 0, 0, 500000, 0, 0, 4, '', 0, '', 0, '', 0, '', 0, 2, 0.3, 0.89, 3.7, 2, 1, 0, 0, 0, 0, 0, 0, 4, 1, 50000, 0, 6, 0, 0, 0, 0, 0, 0, 0, 'Iuran SP', 50000, '', 0, '', 0, '', 0, '1'),
	(9, '9219008ZTY', 'ORGANIK', 'Specific 2', '01', 'PLT ASSISTANT MANAGER TALENTA DAN KINERJA SDM', 0, 0, 0, 7783000, 3605000, 2791000, 1470000, 0, 0, 750000, 0, 0, 4, '', 0, '', 0, '', 0, '', 0, 2, 0.3, 0.89, 3.7, 2, 1, 0, 0, 0, 0, 0, 0, 4, 1, 100000, 0, 6, 0, 0, 0, 0, 0, 0, 0, 'Iuran SP', 50000, '', 0, '', 0, '', 0, '1'),
	(10, '9219011ZTY', 'ORGANIK', 'Specific 3', '', 'PLT MANAGER UNIT LAYANAN MAMUJU DAN PALOPO', 0, 0, 0, 7045000, 3605000, 4391000, 1691000, 0, 0, 750000, 0, 0, 4, '', 0, '', 0, '', 0, '', 0, 2, 0.3, 0.89, 3.7, 2, 1, 0, 0, 0, 0, 0, 0, 4, 1, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 'Iuran SP', 50000, '', 0, '', 0, '', 0, '1');
/*!40000 ALTER TABLE `master_gaji` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.master_grade
CREATE TABLE IF NOT EXISTS `master_grade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `grade` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.master_grade: 27 rows
/*!40000 ALTER TABLE `master_grade` DISABLE KEYS */;
INSERT INTO `master_grade` (`id`, `grade`) VALUES
	(1, 'Basic 4a'),
	(2, 'Basic 4b'),
	(3, 'Basic 4c'),
	(4, 'Basic 4d'),
	(5, 'Basic 4e'),
	(6, 'Basic 3'),
	(7, 'Basic 2'),
	(8, 'Basic 1'),
	(9, 'Specific 4'),
	(10, 'Specific 3'),
	(11, 'Specific 2'),
	(12, 'Specific 1'),
	(13, 'System 4'),
	(14, 'System 3'),
	(15, 'System 2'),
	(16, 'System 1'),
	(17, 'Optimization 4'),
	(18, 'Optimization 3'),
	(19, 'Optimization 2'),
	(20, 'Optimization 1'),
	(21, 'Advanced 3'),
	(22, 'Advanced 2'),
	(23, 'Advanced 1'),
	(24, 'Integration 3'),
	(25, 'Integration 2'),
	(26, 'Integration 1'),
	(27, 'Non Grade');
/*!40000 ALTER TABLE `master_grade` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.master_grup
CREATE TABLE IF NOT EXISTS `master_grup` (
  `id` int NOT NULL AUTO_INCREMENT,
  `grup` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.master_grup: 10 rows
/*!40000 ALTER TABLE `master_grup` DISABLE KEYS */;
INSERT INTO `master_grup` (`id`, `grup`) VALUES
	(1, 'DASHBOARD'),
	(2, 'KEPEGAWAIAN'),
	(3, 'SPPD'),
	(4, 'CUTI'),
	(5, 'ABSENSI'),
	(6, 'KONSUMSI'),
	(11, 'PAYROLL'),
	(8, 'PENDAPATAN NON RUTIN'),
	(9, 'PERPAJAKAN'),
	(10, 'ADMIN');
/*!40000 ALTER TABLE `master_grup` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.master_iki
CREATE TABLE IF NOT EXISTS `master_iki` (
  `id` int NOT NULL AUTO_INCREMENT,
  `iki` varchar(10) DEFAULT '',
  `nilai` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.master_iki: 4 rows
/*!40000 ALTER TABLE `master_iki` DISABLE KEYS */;
INSERT INTO `master_iki` (`id`, `iki`, `nilai`) VALUES
	(1, 'KOM-1', 1.2),
	(2, 'KOM-2', 1),
	(3, 'KOM-3', 0.9),
	(4, 'KOM-4', 0.8);
/*!40000 ALTER TABLE `master_iki` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.master_isk
CREATE TABLE IF NOT EXISTS `master_isk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `isk` varchar(10) DEFAULT '',
  `nilai` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.master_isk: 4 rows
/*!40000 ALTER TABLE `master_isk` DISABLE KEYS */;
INSERT INTO `master_isk` (`id`, `isk`, `nilai`) VALUES
	(1, 'OS', 1.2),
	(2, 'ER', 1.1),
	(3, 'MR', 1),
	(4, 'NI', 0.9);
/*!40000 ALTER TABLE `master_isk` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.master_jenis
CREATE TABLE IF NOT EXISTS `master_jenis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.master_jenis: 11 rows
/*!40000 ALTER TABLE `master_jenis` DISABLE KEYS */;
INSERT INTO `master_jenis` (`id`, `jenis`) VALUES
	(1, 'BOD'),
	(2, 'HONOR'),
	(3, 'KOMISARIS'),
	(4, 'KOMITE AUDIT'),
	(5, 'OJT'),
	(6, 'ORGANIK'),
	(7, 'PLN'),
	(8, 'PROHIRE'),
	(9, 'SEKDEKOM'),
	(10, 'TUGAS KARYA'),
	(11, 'TUGAS KERJA');
/*!40000 ALTER TABLE `master_jenis` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.master_kondisi
CREATE TABLE IF NOT EXISTS `master_kondisi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kondisi` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.master_kondisi: 14 rows
/*!40000 ALTER TABLE `master_kondisi` DISABLE KEYS */;
INSERT INTO `master_kondisi` (`id`, `kondisi`) VALUES
	(1, 'Tidak ada keluhan'),
	(2, 'Demam'),
	(3, 'Batuk / Pilek'),
	(4, 'Kelelahan'),
	(5, 'Rasa Tidak Nyaman dan Nyeri Otot'),
	(6, 'Sakit Tenggorokan'),
	(7, 'Diare'),
	(8, 'Sakit Kepala'),
	(9, 'Hilangnya Indra Perasa'),
	(10, 'Hilangnya Indra Penciuman'),
	(11, 'Sesak Nafas'),
	(12, 'Nyeri Dada'),
	(13, 'Nafsu Makan Berkurang'),
	(14, 'Isolasi Mandiri');
/*!40000 ALTER TABLE `master_kondisi` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.master_kota
CREATE TABLE IF NOT EXISTS `master_kota` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kota` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.master_kota: 30 rows
/*!40000 ALTER TABLE `master_kota` DISABLE KEYS */;
INSERT INTO `master_kota` (`id`, `kota`) VALUES
	(1, 'Aceh Barat'),
	(2, 'Aceh Barat Daya'),
	(3, 'Aceh Besar'),
	(4, 'Aceh Jaya'),
	(5, 'Aceh Selatan'),
	(6, 'Aceh Singkil'),
	(7, 'Aceh Tamiang'),
	(8, 'Aceh Tengah'),
	(9, 'Aceh Tenggara'),
	(10, 'Aceh Timur'),
	(11, 'Aceh Utara'),
	(12, 'Bener Meriah'),
	(13, 'Bireuen'),
	(14, 'Gayo Lues'),
	(15, 'Nagan Raya'),
	(16, 'Pidie'),
	(17, 'Pidie Jaya'),
	(18, 'Simeulue'),
	(19, 'Banda Aceh'),
	(20, 'Langsa'),
	(21, 'Lhokseumawe'),
	(22, 'Sabang'),
	(23, 'Subulussalam'),
	(24, 'Asahan'),
	(25, 'Batubara'),
	(26, 'Dairi'),
	(27, 'Deli Serdang'),
	(28, 'Humbang Hasundutan'),
	(29, 'Karo'),
	(30, 'Labuhanbatu');
/*!40000 ALTER TABLE `master_kota` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.master_level
CREATE TABLE IF NOT EXISTS `master_level` (
  `id` int NOT NULL AUTO_INCREMENT,
  `level` varchar(1) DEFAULT '',
  `uraian` varchar(250) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.master_level: 7 rows
/*!40000 ALTER TABLE `master_level` DISABLE KEYS */;
INSERT INTO `master_level` (`id`, `level`, `uraian`) VALUES
	(1, '1', 'Direksi'),
	(2, '2', 'Manajemen Atas / Fungsional I'),
	(3, '3', 'Manajemen Menengah / Fungsional II'),
	(4, '4', 'Manajemen Dasar / Fungsional III'),
	(5, '5', 'Supervisor Atas / Fungional IV'),
	(6, '6', 'Supervisor Dasar / Fungsional V'),
	(7, '7', 'Fungsional VI');
/*!40000 ALTER TABLE `master_level` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.master_mapping
CREATE TABLE IF NOT EXISTS `master_mapping` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kolom` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '',
  `kode_akun` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '',
  `nama_akun` varchar(160) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '',
  `item_no` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.master_mapping: 10 rows
/*!40000 ALTER TABLE `master_mapping` DISABLE KEYS */;
INSERT INTO `master_mapping` (`id`, `kolom`, `kode_akun`, `nama_akun`, `item_no`) VALUES
	(1, 'tarif_grade', '6201100000', 'Pay For Person (P1) - Usaha', ''),
	(2, 'tarif_grade', '5104200110', 'Pay For Person (P1) - BPP', ''),
	(3, 'tarif_grade', '1107109000', 'AMC_GAJI', ''),
	(4, 'honorarium', '6401012000', 'Gaji Direksi & Komisaris', ''),
	(5, 'honorarium', '6401019000', 'Honorarium Organ Dewan Komisaris', ''),
	(6, 'honorer', '6401021000', 'Honorarium Peg. PKWT Ktr Pst', ''),
	(7, 'honorer', '5109111000', 'HONOR_BPP', ''),
	(8, 'tunjangan_posisi', '6201200000', 'Pay For Position (P2) - Usaha', ''),
	(9, 'p21b', '6201200000', 'Pay For Position (P2) - Usaha', ''),
	(10, 'tunjangan_kemahalan', '6201200000', 'Pay For Position (P2) - Usaha', '');
/*!40000 ALTER TABLE `master_mapping` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.master_pendidikan
CREATE TABLE IF NOT EXISTS `master_pendidikan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pendidikan` varchar(60) DEFAULT '',
  `nama_pendidikan` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.master_pendidikan: 0 rows
/*!40000 ALTER TABLE `master_pendidikan` DISABLE KEYS */;
/*!40000 ALTER TABLE `master_pendidikan` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.master_penempatan
CREATE TABLE IF NOT EXISTS `master_penempatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `region` varchar(120) DEFAULT '',
  `penempatan` varchar(160) DEFAULT NULL,
  `lat` varchar(60) DEFAULT '',
  `lon` varchar(60) DEFAULT '',
  `waktu` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.master_penempatan: 10 rows
/*!40000 ALTER TABLE `master_penempatan` DISABLE KEYS */;
INSERT INTO `master_penempatan` (`id`, `region`, `penempatan`, `lat`, `lon`, `waktu`) VALUES
	(1, 'KANTOR PUSAT', 'KANTOR PUSAT', '-1.2650413814650743', '116.87735920427188', 'WITA'),
	(2, 'REGION KALBAR', 'REGION KALBAR', '-0.083875', '109.368202', 'WIB'),
	(3, 'REGION KALSELTENG', 'REGION KALSELTENG', '-3.440786', '114.829004', 'WITA'),
	(4, 'REGION KALTIMRA', 'REGION KALTIMRA', '-1.266129', '116.834564', 'WITA'),
	(5, 'REGION SULUTENGGO', 'REGION SULUTENGGO', '1.457654', '124.833122', 'WITA'),
	(6, 'REGION SULSELRABAR', 'REGION SULSELRABAR', '-5.17033', '119.429923', 'WITA'),
	(7, 'REGION NUSA TENGGARA', 'REGION NUSA TENGGARA', '-8.580216', '116.094536', 'WITA'),
	(8, 'REGION MALUKU - PAPUA', 'REGION MALUKU - PAPUA', '-2.568716', '140.690282', 'WIT'),
	(9, 'REGION KALSELTENG', 'PLTMG BANGKANAI', '-0.622303', '115.135196', 'WITA'),
	(10, 'REGION KALTIMRA', 'AREA BERAU', '2.1438045', '117.5034943', 'WITA');
/*!40000 ALTER TABLE `master_penempatan` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.master_ptkp
CREATE TABLE IF NOT EXISTS `master_ptkp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(4) NOT NULL DEFAULT '',
  `ptkp` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.master_ptkp: 8 rows
/*!40000 ALTER TABLE `master_ptkp` DISABLE KEYS */;
INSERT INTO `master_ptkp` (`id`, `status`, `ptkp`) VALUES
	(1, 'TK0', 54000000),
	(2, 'K0', 58500000),
	(3, 'K1', 63000000),
	(4, 'K2', 67500000),
	(5, 'K3', 72000000),
	(6, 'TK1', 58500000),
	(7, 'TK2', 63000000),
	(8, 'TK3', 67500000);
/*!40000 ALTER TABLE `master_ptkp` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.master_region
CREATE TABLE IF NOT EXISTS `master_region` (
  `id` int NOT NULL AUTO_INCREMENT,
  `region` varchar(160) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.master_region: 10 rows
/*!40000 ALTER TABLE `master_region` DISABLE KEYS */;
INSERT INTO `master_region` (`id`, `region`) VALUES
	(1, 'KANTOR PUSAT'),
	(2, 'REGION KALBAR'),
	(3, 'REGION KALSELTENG'),
	(4, 'REGION KALTIMRA'),
	(5, 'REGION SULUTENGGO'),
	(6, 'REGION SULSELRABAR'),
	(7, 'REGION NUSA TENGGARA'),
	(8, 'REGION MALUKU - PAPUA'),
	(9, 'KANTOR PERWAKILAN PLNT'),
	(10, 'KANTOR PERWAKILAN PLNT JAKARTA');
/*!40000 ALTER TABLE `master_region` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.master_restitusi
CREATE TABLE IF NOT EXISTS `master_restitusi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_restitusi` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama_restitusi` (`nama_restitusi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.master_restitusi: 5 rows
/*!40000 ALTER TABLE `master_restitusi` DISABLE KEYS */;
INSERT INTO `master_restitusi` (`id`, `nama_restitusi`) VALUES
	(5, 'Lainnya'),
	(4, 'Pemeriksaan Kesehatan'),
	(1, 'Tiket Pesawat'),
	(2, 'Tiket Taksi Darat'),
	(3, 'Tiket Taksi Laut');
/*!40000 ALTER TABLE `master_restitusi` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.master_sertifikat
CREATE TABLE IF NOT EXISTS `master_sertifikat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kd_sertifikat` varchar(3) DEFAULT '',
  `nama_sertifikat` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.master_sertifikat: 0 rows
/*!40000 ALTER TABLE `master_sertifikat` DISABLE KEYS */;
/*!40000 ALTER TABLE `master_sertifikat` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.master_transportasi
CREATE TABLE IF NOT EXISTS `master_transportasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `transportasi` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.master_transportasi: 3 rows
/*!40000 ALTER TABLE `master_transportasi` DISABLE KEYS */;
INSERT INTO `master_transportasi` (`id`, `transportasi`) VALUES
	(1, 'Pesawat Udara'),
	(2, 'Taxi Darat'),
	(3, 'Taxi Laut');
/*!40000 ALTER TABLE `master_transportasi` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.master_unit
CREATE TABLE IF NOT EXISTS `master_unit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kd_region` varchar(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT '',
  `kd_cabang` varchar(3) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT '',
  `kd_unitpln` varchar(4) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT '',
  `kd_unit` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `nama_unit` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nama_kota` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT '',
  `kode_pos` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `kd_unit` (`kd_unit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel hrisori.master_unit: 0 rows
/*!40000 ALTER TABLE `master_unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `master_unit` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel hrisori.migrations: ~0 rows (lebih kurang)

-- membuang struktur untuk table hrisori.mutasi_pegawai
CREATE TABLE IF NOT EXISTS `mutasi_pegawai` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) NOT NULL DEFAULT '',
  `tgl_mutasi` varchar(10) DEFAULT '',
  `kd_region` varchar(2) DEFAULT '',
  `kd_cabang` varchar(3) DEFAULT '',
  `kd_unitpln` varchar(4) DEFAULT '',
  `kd_unit` varchar(5) DEFAULT '',
  `kd_kategori` varchar(2) DEFAULT '',
  `kd_jenis` varchar(2) DEFAULT '',
  `no_spk` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `honor` double NOT NULL DEFAULT '0',
  `umk` double NOT NULL DEFAULT '0',
  `koefisien` double NOT NULL DEFAULT '1',
  `upah_pokok` double NOT NULL DEFAULT '0',
  `transport` double NOT NULL DEFAULT '0',
  `tunjangan_profesi` double NOT NULL DEFAULT '0',
  `tunjangan_jabatan` double NOT NULL DEFAULT '0',
  `tunjangan_pph21` double NOT NULL DEFAULT '0',
  `nama_tunjangan1` varchar(200) DEFAULT '',
  `tunjangan1` double NOT NULL DEFAULT '0',
  `nama_tunjangan2` varchar(200) DEFAULT '',
  `tunjangan2` double NOT NULL DEFAULT '0',
  `nama_tunjangan3` varchar(200) DEFAULT '',
  `tunjangan3` double NOT NULL DEFAULT '0',
  `nama_tunjangan4` varchar(200) DEFAULT '',
  `tunjangan4` double NOT NULL DEFAULT '0',
  `nama_tunjangan5` varchar(200) DEFAULT '',
  `tunjangan5` double NOT NULL DEFAULT '0',
  `nama_tunjangan6` varchar(200) DEFAULT '',
  `tunjangan6` double NOT NULL DEFAULT '0',
  `nama_tunjangan7` varchar(200) DEFAULT '',
  `tunjangan7` double NOT NULL DEFAULT '0',
  `potongan_pph21` double NOT NULL DEFAULT '0',
  `nama_potongan1` varchar(200) DEFAULT '',
  `potongan1` double NOT NULL DEFAULT '0',
  `nama_potongan2` varchar(200) DEFAULT '',
  `potongan2` double NOT NULL DEFAULT '0',
  `nama_potongan3` varchar(200) DEFAULT '',
  `potongan3` double NOT NULL DEFAULT '0',
  `nama_potongan4` varchar(200) DEFAULT '',
  `potongan4` double NOT NULL DEFAULT '0',
  `nama_potongan5` varchar(200) DEFAULT '',
  `potongan5` double NOT NULL DEFAULT '0',
  `nama_potongan6` varchar(200) DEFAULT '',
  `potongan6` double NOT NULL DEFAULT '0',
  `nama_potongan7` varchar(200) DEFAULT '',
  `potongan7` double NOT NULL DEFAULT '0',
  `bpjs_tk_pp` double NOT NULL DEFAULT '0',
  `bpjs_tk_kp` double NOT NULL DEFAULT '0',
  `bpjs_tk_kkp` double NOT NULL DEFAULT '0',
  `bpjs_tk_htp` double NOT NULL DEFAULT '0',
  `bpjs_tk_jhtk` double NOT NULL DEFAULT '0',
  `bpjs_tk_pk` double NOT NULL DEFAULT '0',
  `bpjs_kes_pp` double NOT NULL DEFAULT '0',
  `bpjs_kes_pk` double NOT NULL DEFAULT '0',
  `dplk` double NOT NULL DEFAULT '0',
  `kd_regionl` varchar(2) DEFAULT '',
  `kd_cabangl` varchar(3) DEFAULT '',
  `kd_unitplnl` varchar(4) DEFAULT '',
  `kd_unitl` varchar(5) DEFAULT '',
  `kd_kategoril` varchar(3) DEFAULT '',
  `kd_jenisl` varchar(2) DEFAULT '',
  `no_spkl` varchar(200) DEFAULT '',
  `jabatanl` varchar(200) DEFAULT '',
  `honorl` double NOT NULL DEFAULT '0',
  `umkl` double NOT NULL DEFAULT '0',
  `koefisienl` double NOT NULL DEFAULT '0',
  `upah_pokokl` double NOT NULL DEFAULT '0',
  `transportl` double NOT NULL DEFAULT '0',
  `tunjangan_profesil` double NOT NULL DEFAULT '0',
  `tunjangan_jabatanl` double NOT NULL DEFAULT '0',
  `tunjangan_pph21l` double NOT NULL DEFAULT '0',
  `nama_tunjangan1l` varchar(200) DEFAULT '',
  `tunjangan1l` double NOT NULL DEFAULT '0',
  `nama_tunjangan2l` varchar(200) DEFAULT '',
  `tunjangan2l` double NOT NULL DEFAULT '0',
  `nama_tunjangan3l` varchar(200) DEFAULT '',
  `tunjangan3l` double NOT NULL DEFAULT '0',
  `nama_tunjangan4l` varchar(200) DEFAULT '',
  `tunjangan4l` double NOT NULL DEFAULT '0',
  `nama_tunjangan5l` varchar(200) DEFAULT '',
  `tunjangan5l` double NOT NULL DEFAULT '0',
  `nama_tunjangan6l` varchar(200) DEFAULT '',
  `tunjangan6l` double NOT NULL DEFAULT '0',
  `nama_tunjangan7l` varchar(200) DEFAULT '',
  `tunjangan7l` double NOT NULL DEFAULT '0',
  `potongan_pph21l` double NOT NULL DEFAULT '0',
  `nama_potongan1l` varchar(200) NOT NULL DEFAULT '',
  `potongan1l` double NOT NULL DEFAULT '0',
  `nama_potongan2l` varchar(200) NOT NULL DEFAULT '',
  `potongan2l` double NOT NULL DEFAULT '0',
  `nama_potongan3l` varchar(200) NOT NULL DEFAULT '',
  `potongan3l` double NOT NULL DEFAULT '0',
  `nama_potongan4l` varchar(200) NOT NULL DEFAULT '',
  `potongan4l` double NOT NULL DEFAULT '0',
  `nama_potongan5l` varchar(200) NOT NULL DEFAULT '',
  `potongan5l` double NOT NULL DEFAULT '0',
  `nama_potongan6l` varchar(200) NOT NULL DEFAULT '',
  `potongan6l` double NOT NULL DEFAULT '0',
  `nama_potongan7l` varchar(200) NOT NULL DEFAULT '',
  `potongan7l` double NOT NULL DEFAULT '0',
  `bpjs_tk_ppl` double NOT NULL DEFAULT '0',
  `bpjs_tk_kpl` double NOT NULL DEFAULT '0',
  `bpjs_tk_kkpl` double NOT NULL DEFAULT '0',
  `bpjs_tk_htpl` double NOT NULL DEFAULT '0',
  `bpjs_tk_jhtkl` double NOT NULL DEFAULT '0',
  `bpjs_tk_pkl` double NOT NULL DEFAULT '0',
  `bpjs_kes_ppl` double NOT NULL DEFAULT '0',
  `bpjs_kes_pkl` double NOT NULL DEFAULT '0',
  `dplkl` double NOT NULL DEFAULT '0',
  `tgl_update` varchar(30) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  `approve` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.mutasi_pegawai: 0 rows
/*!40000 ALTER TABLE `mutasi_pegawai` DISABLE KEYS */;
/*!40000 ALTER TABLE `mutasi_pegawai` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.m_agama
CREATE TABLE IF NOT EXISTS `m_agama` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_agama` varchar(3) DEFAULT '',
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `label` (`label`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_agama: ~7 rows (lebih kurang)
INSERT INTO `m_agama` (`id`, `id_agama`, `label`) VALUES
	(1, 'ISL', 'Islam'),
	(2, 'PRT', 'Protestan'),
	(3, 'KTL', 'Katholik'),
	(4, 'HND', 'Hindu'),
	(5, 'BDH', 'Budha'),
	(6, 'KHC', 'Khonghucu'),
	(7, 'LLN', 'Lain-lain');

-- membuang struktur untuk table hrisori.m_alasan_berhenti
CREATE TABLE IF NOT EXISTS `m_alasan_berhenti` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `name` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.m_alasan_berhenti: ~15 rows (lebih kurang)
INSERT INTO `m_alasan_berhenti` (`id`, `kode`, `name`) VALUES
	(1, 'AB01', 'PHK Karena Perjanjian Bersama'),
	(2, 'AB02', 'Pensiun Normal'),
	(3, 'AB03', 'Mutasi kembali KE AP/SH'),
	(4, 'AB04', 'PHK dengan Hormat'),
	(5, 'AB05', 'Pensiun Dini'),
	(6, 'AB06', 'Mengundurkan Diri'),
	(7, 'AB07', 'Tewas'),
	(8, 'AB08', 'Mutasi Organik AP'),
	(9, 'AB09', 'PHK Karena PHI'),
	(10, 'AB10', 'PHK tidak Hormat'),
	(11, 'AB11', 'Meninggal'),
	(12, 'AB12', 'Pensiun Direksi'),
	(13, 'AB13', 'PKWT Kontrak Selesai'),
	(14, 'AB14', 'Mutasi kembali KE Holding'),
	(15, 'AB15', 'Mutasi kembali KE CP');

-- membuang struktur untuk table hrisori.m_business_area
CREATE TABLE IF NOT EXISTS `m_business_area` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_business_area: ~0 rows (lebih kurang)
INSERT INTO `m_business_area` (`id`, `kode`, `label`) VALUES
	(1, '1201', 'Non Holding');

-- membuang struktur untuk table hrisori.m_cluster
CREATE TABLE IF NOT EXISTS `m_cluster` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_cluster: ~15 rows (lebih kurang)
INSERT INTO `m_cluster` (`id`, `kode`, `label`) VALUES
	(1, 'MC2', 'INTERPERSONAL SKILL'),
	(2, 'MC1', 'INTRAPERSONAL SKILL'),
	(3, 'MC3', 'BUSINESS SKILL / MANAJEMEN SKILLS'),
	(4, 'MC4', 'LEADERSHIP SKILL'),
	(5, 'MC5', 'LEADERSHIP SKILL/MAKING OTHER SUCCEED'),
	(6, 'MC6', 'MANAGING THE BUSINESS'),
	(7, 'MC7', 'PERSONAL ASPECT'),
	(8, 'MC8', 'LEADING BUSINESS'),
	(9, 'MC9', 'LEADING PEOPLE AND ORGANIZATION'),
	(10, 'MC10', 'CHARACTER'),
	(11, 'MC11', 'COMPETENCY'),
	(12, 'MC12', 'COMPETITIVENESS'),
	(13, 'MC13', 'PA'),
	(14, 'MC14', 'COMPETENCIES'),
	(15, 'MC15', 'LEADERSHIP SKILL');

-- membuang struktur untuk table hrisori.m_company_code
CREATE TABLE IF NOT EXISTS `m_company_code` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_company_code: ~0 rows (lebih kurang)
INSERT INTO `m_company_code` (`id`, `kode`, `label`) VALUES
	(1, '1200', 'Non Holding');

-- membuang struktur untuk table hrisori.m_dahan_profesi
CREATE TABLE IF NOT EXISTS `m_dahan_profesi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `kode_pohon_bisnis` varchar(2) DEFAULT '',
  `kode_pohon_profesi` varchar(5) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_dahan_profesi: ~24 rows (lebih kurang)
INSERT INTO `m_dahan_profesi` (`id`, `kode`, `kode_pohon_bisnis`, `kode_pohon_profesi`, `label`) VALUES
	(1, '1.1.1', '1', '1.1', 'Energi Primer'),
	(2, '1.1.2', '1', '1.1', 'Pembangkit'),
	(3, '1.2.1', '1', '1.2', 'Operasi Sistem'),
	(4, '1.2.2', '1', '1.2', 'Transmisi'),
	(5, '1.3.1', '1', '1.3', 'Distribusi'),
	(6, '1.4.1', '1', '1.4', 'Niaga dan Manajemen Pelanggan'),
	(7, '2.1.1', '2', '2.1', 'Produksi Peralatan Ketenagalistrikan'),
	(8, '2.2.1', '2', '2.2', 'K2, K3, Keamanan dan Lingkungan'),
	(9, '2.3.1', '2', '2.3', 'Enjiniring dan Konstruksi Sipil'),
	(10, '2.3.2', '2', '2.3', 'Enjiniring dan Konstruksi Mekanikal'),
	(11, '2.3.3', '2', '2.3', 'Enjiniring dan Konstruksi Elektrikal'),
	(12, '2.3.4', '2', '2.3', 'Perijinan, Pertanahan dan ROW'),
	(13, '2.3.5', '2', '2.3', 'Manajemen Proyek'),
	(14, '2.3.6', '2', '2.3', 'Enjiniring Penunjang'),
	(15, '2.4.1', '2', '2.4', 'Penelitian dan Pengembangan'),
	(16, '2.5.1', '2', '2.5', 'Pembelajaran'),
	(17, '2.6.1', '2', '2.6', 'Sertifikasi'),
	(18, '3.1.1', '3', '3.1', 'Supply Chain Management'),
	(19, '3.2.1', '3', '3.2', 'Regulatory and Compliance'),
	(20, '3.3.1', '3', '3.3', 'Teknologi Informasi'),
	(21, '3.4.1', '3', '3.4', 'SDM'),
	(22, '3.5.1', '3', '3.5', 'Keuangan'),
	(23, '3.6.1', '3', '3.6', 'Komunikasi, CSR dan Pengelolaan Kantor'),
	(24, '3.7.1', '3', '3.7', 'Manajemen Perusahaan');

-- membuang struktur untuk table hrisori.m_edata
CREATE TABLE IF NOT EXISTS `m_edata` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_data` varchar(120) DEFAULT '',
  `nama_tabel` varchar(120) DEFAULT '',
  `nama_file` varchar(255) DEFAULT '',
  `nama_tabel_update` varchar(60) DEFAULT '',
  `url_api` varchar(250) DEFAULT '',
  `url` varchar(200) DEFAULT '',
  `status` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_edata: ~27 rows (lebih kurang)
INSERT INTO `m_edata` (`id`, `nama_data`, `nama_tabel`, `nama_file`, `nama_tabel_update`, `url_api`, `url`, `status`) VALUES
	(1, 'Personal Data', 'data_pegawai', 'PERSONALDATA_PLNTARAKAN', 'h_data_pegawai', 'http://10.1.85.207:7071/api/personal-data/save', 'update_pegawai.php', '1'),
	(2, 'Data Alamat', 'r_alamat', 'ALAMAT_PLNTARAKAN', 'h_alamat', 'http://10.1.85.207:7071/api/alamat/save', 'update_alamat.php', '1'),
	(3, 'Data Keluarga', 'r_keluarga', 'KELUARGA_PLNTARAKAN', 'h_keluarga', 'http://10.1.85.207:7071/api/keluarga/save', 'update_keluarga.php', '1'),
	(4, 'Pendidikan', 'r_pendidikan', 'PENDIDIKAN_PLNTARAKAN', 'h_pendidikan', 'http://10.1.85.207:7071/api/pendidikan/save', 'update_pendidikan.php', '1'),
	(5, 'Grade', 'r_grade', 'RIWAYATGRADE_PLNTARAKAN', 'h_grade', 'http://10.1.85.207:7071/api/riwayatGrade/save', 'update_grade.php', '1'),
	(6, 'Jabatan', 'r_jabatan', 'RIWAYATJABATAN_PLNTARAKAN', 'h_jabatan', 'http://10.1.85.207:7071/api/riwayat-jabatan/save', 'update_jabatan.php', '1'),
	(7, 'Talenta', 'r_talenta', 'RIWAYATTALENTA_PLNTARAKAN', 'h_talenta', 'http://10.1.85.207:7071/api/riwayatTalenta/save', 'update_talenta.php', '1'),
	(8, 'Sertifikat Kompetensi', 'r_sertifikat', 'SERTIFIKASIKOMPETENSI_PLNTARAKAN', 'h_sertifikat', 'http://10.1.85.207:7071/api/sertifikat-kompetensi/save-batch', 'update_sertifikat.php', '1'),
	(9, 'Grievances', 'r_hukuman', 'GRIEVANCES_PLNTARAKAN', 'h_hukuman', 'http://10.1.85.207:7071/api/grievances/save-batch', 'update_hukuman.php', '1'),
	(10, 'Awards', 'r_award', 'AWARDS_PLNTARAKAN', 'h_award', 'http://10.1.85.207:7071/api/awards/save-batch', 'update_award.php', '1'),
	(11, 'Identitas Lainnya', 'r_identitas', 'IDENTITASLAINNYA_PLNTARAKAN', 'h_identitas', 'http://10.1.85.207:7071/api/identitasLainnya/save', 'update_identitas.php', '1'),
	(12, 'Karya Tulis', 'r_karya_tulis', 'KARYATULIS_PLNTARAKAN', 'h_karya_tulis', 'http://10.1.85.207:7071/api/karya-tulis/save-batch', 'update_karyatulis.php', '1'),
	(13, 'Keahlian', 'r_keahlian', 'KEAHLIAN_PLNTARAKAN', 'h_keahlian', 'http://10.1.85.207:7071/api/keahlian/save-batch', 'update_keahlian.php', '1'),
	(14, 'Keanggotaan Lembaga', 'r_lembaga', 'KEANGGOTAANLEMBAGA_PLNTARAKAN', 'h_lembaga', 'http://10.1.85.207:7071/api/keanggotaanLembaga/save-batch', 'update_lembaga.php', '1'),
	(15, 'Media Sosial', 'r_medsos', 'MEDIASOSIAL_PLNTARAKAN', 'h_medsos', 'http://10.1.85.207:7071/api/media-sosial/save', 'update_medsos.php', '1'),
	(16, 'Pembicara', 'r_pembicara', 'PEMBICARA_PLNTARAKAN', 'h_pembicara', 'http://10.1.85.207:7071/api/pembicara/save-batch', 'update_pembicara.php', '1'),
	(17, 'Riwayat Atasan', 'r_atasan', 'RIWAYATATASAN_PLNTARAKAN', 'h_atasan', 'http://10.1.85.207:7071/api/riwayatAtasan/save', 'update_atasan.php', '1'),
	(18, 'Uraian Jabatan', 'r_urjab', 'URAIANJABATAN_PLNTARAKAN', 'h_urjab', 'http://10.1.85.207:7071/api/uraian-jabatan/save', '', '0'),
	(19, 'Struktur Organisasi', 'r_struktur', 'STRUKTURORGANISASI_PLNTARAKAN', 'h_struktur', 'http://10.1.85.207:7071/api/strukturOrganisasi/save', '', '0'),
	(20, 'Foto', 'r_foto', 'FOTO_PLNTARAKAN', 'h_foto', 'http://10.1.85.207:7071/api/foto/save', '', '0'),
	(21, 'Penugasan Lain', 'r_penugasan', 'PENUGASANLAIN_PLNTARAKAN', 'h_penugasan', 'http://10.1.85.207:7071/api/penugasan/save', 'update_penugasan.php', '1'),
	(22, 'Pengajar', 'r_pengajar', 'PENGAJAR_PLNTARAKAN', 'h_pengajar', 'http://10.1.85.207:7071/api/pengajar/save-batch', 'update_pengajar.php', '1'),
	(23, 'Diklat Penjenjangan', 'r_diklat_penjenjangan', 'DIKLATPENJENJANGAN_PLNTARAKAN', 'h_diklat_penjenjangan', 'http://10.1.85.207:7071/api/diklatPenjenjangan/save-batch', 'update_diklatp.php', '1'),
	(24, 'Position Management', 'r_position_management', 'POSITIONMANAGEMEN_PLNTARAKAN', '', 'http://10.1.85.207:7071/api/position-management/save', 'update_pmanagement.php', '1'),
	(25, 'Diklat', 'r_diklat', 'DIKLAT_PLNTARAKAN', 'h_diklat', 'http://10.1.85.207:7071/api/diklat/save-batch', 'update_diklat.php', '1'),
	(26, 'Pengangkatan', 'r_pengangkatan', 'PENGANGKATANPEGAWAI_PLNTARAKAN', 'h_pengangkatan', '', 'update_pengangkatan.php', '1'),
	(27, 'Pemberhentian', 'r_pemberhentian', 'PEMBERHENTIANPEGAWAI_PLNTARAKAN', 'h_pemberhentian', '', 'update_pemberhentian.php', '1');

-- membuang struktur untuk table hrisori.m_ee_group
CREATE TABLE IF NOT EXISTS `m_ee_group` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_ee_group` varchar(10) DEFAULT '',
  `ee_group` varchar(200) DEFAULT '',
  `keterangan` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_ee_group: ~7 rows (lebih kurang)
INSERT INTO `m_ee_group` (`id`, `kode_ee_group`, `ee_group`, `keterangan`) VALUES
	(1, 'EE3', 'Berhenti', ''),
	(2, 'EE2', 'Pensiun', ''),
	(3, 'EE4', 'Permanen', ''),
	(4, '0', 'Direksi', 'DIREKSI'),
	(5, '1', 'Holding', 'Holding PLN'),
	(6, '8', 'Non Holding', 'Anak Perusahaan'),
	(7, 'EE1', 'Aktif', '');

-- membuang struktur untuk table hrisori.m_ee_subgroup
CREATE TABLE IF NOT EXISTS `m_ee_subgroup` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_ee_subgroup` varchar(300) DEFAULT '',
  `ee_subgroup` varchar(200) DEFAULT '',
  `keterangan` varchar(200) DEFAULT '',
  `kode_ee_group` varchar(30) DEFAULT '',
  `ee_group` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_ee_subgroup: ~10 rows (lebih kurang)
INSERT INTO `m_ee_subgroup` (`id`, `kode_ee_subgroup`, `ee_subgroup`, `keterangan`, `kode_ee_group`, `ee_group`) VALUES
	(1, 'EESG2', 'ORG AP TK KE AP LAIN', 'Pegawai PKWTT AP yang tugas karya ke AP Lainnya. Contoh Fulan pegawai PKWTT PJB tugas karya ke IP, maka PJB melaporkan datanya Fulan dengan ee sub grup ORG AP TK KE AP LAIN', '8', 'Non Holding'),
	(2, 'EES9', 'Organik Non HCMS', '', 'EE1', 'Aktif'),
	(3, 'EES10', 'Organik HCMS', '', 'EE1', 'Aktif'),
	(4, 'EES13', 'TKWT', '', 'EE1', 'Aktif'),
	(5, 'EES5', 'Organik Non HCMS', '', '0', 'Direksi'),
	(6, 'EES6', 'Organik HCMS', '', '0', 'Direksi'),
	(7, 'EES49', 'TK Kembali', '', '8', 'Non Holding'),
	(8, 'EESG17', 'PEG AP LAIN DIREKSI', 'Direksi di AP tersebut diduduki oleh PKWTT AP Lain. Contoh Jabatan Direksi di IP dijabat oleh pegawai PKWTT PJB', '0', 'Direksi'),
	(9, 'EESG16', 'NON PLN DIREKSI AP', 'Pegawai luar PLN Group yang tugas karya ke AP dan menduduki jabatan Direksi AP', '0', 'Direksi'),
	(10, 'EESG15', 'PEG HOLDING DIREKSI CP', 'Pegawai PKWTT Holding yang tugas karya ke CP dan menduduki jabatan Direksi CP', '0', 'Direksi');

-- membuang struktur untuk table hrisori.m_gelar_belakang
CREATE TABLE IF NOT EXISTS `m_gelar_belakang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Membuang data untuk tabel hrisori.m_gelar_belakang: ~103 rows (lebih kurang)
INSERT INTO `m_gelar_belakang` (`id`, `kode`, `label`) VALUES
	(1, 'GB1', 'AhT'),
	(2, 'GB2', 'Ak.MM'),
	(3, 'GB3', 'AT'),
	(4, 'GB4', 'A.Ma.'),
	(5, 'GB5', 'A.Md.'),
	(6, 'GB6', 'A.P.'),
	(7, 'GB7', 'BA'),
	(8, 'GB8', 'BBA'),
	(9, 'GB9', 'Bc.Ak'),
	(10, 'GB10', 'BC.Ec'),
	(11, 'GB11', 'BC.Hk'),
	(12, 'GB12', 'BE'),
	(13, 'GB13', 'BEE'),
	(14, 'GB14', 'BSc.'),
	(15, 'GB15', 'B.Ac'),
	(16, 'GB16', 'CPMA'),
	(17, 'GB17', 'Dipl. Ec,'),
	(18, 'GB18', 'DIPL.H'),
	(19, 'GB19', 'DIPL.ING'),
	(20, 'GB20', 'DIPL.P'),
	(21, 'GB21', 'DIPL.PH'),
	(22, 'GB22', 'DIPL.PM'),
	(23, 'GB23', 'D.E.S.S'),
	(24, 'GB24', 'MA'),
	(25, 'GB25', 'MAP'),
	(26, 'GB26', 'MAppCom'),
	(27, 'GB27', 'MBA.'),
	(28, 'GB28', 'MBI'),
	(29, 'GB29', 'MEng.Sc.'),
	(30, 'GB30', 'MH'),
	(31, 'GB31', 'MIM'),
	(32, 'GB32', 'MIT'),
	(33, 'GB33', 'MM.'),
	(34, 'GB34', 'MPM'),
	(35, 'GB35', 'MS'),
	(36, 'GB36', 'MSBA'),
	(37, 'GB37', 'MSc.'),
	(38, 'GB38', 'MSc.EE'),
	(39, 'GB39', 'MSE'),
	(40, 'GB40', 'MSM'),
	(41, 'GB41', 'M. Com'),
	(42, 'GB42', 'M.Ag'),
	(43, 'GB43', 'M.ENG'),
	(44, 'GB44', 'M.ENG.Sc'),
	(45, 'GB45', 'M.E.M.'),
	(46, 'GB46', 'M.Hum'),
	(47, 'GB47', 'M.H.'),
	(48, 'GB48', 'M.K3'),
	(49, 'GB49', 'M.Kes'),
	(50, 'GB50', 'M.Kn'),
	(51, 'GB51', 'M.Kom'),
	(52, 'GB52', 'M.MT'),
	(53, 'GB53', 'M.M.'),
	(54, 'GB54', 'M.P'),
	(55, 'GB55', 'M.Pd'),
	(56, 'GB56', 'M.PHIL'),
	(57, 'GB57', 'M.Psi.'),
	(58, 'GB58', 'M.Psi.,Psikolog'),
	(59, 'GB59', 'M.Si'),
	(60, 'GB60', 'M.Sn'),
	(61, 'GB61', 'M.T.'),
	(62, 'GB62', 'PhD'),
	(63, 'GB63', 'QIA.'),
	(64, 'GB64', 'SAB'),
	(65, 'GB65', 'SE'),
	(66, 'GB66', 'SE. Ak.'),
	(67, 'GB67', 'SH'),
	(68, 'GB68', 'SH.CN.'),
	(69, 'GB69', 'Sm.Ak'),
	(70, 'GB70', 'Sm.Ek'),
	(71, 'GB71', 'Sm.Hk'),
	(72, 'GB72', 'Sp.Notaria'),
	(73, 'GB73', 'SST'),
	(74, 'GB74', 'S. Ked'),
	(75, 'GB75', 'S. Pd'),
	(76, 'GB76', 'S.AB.'),
	(77, 'GB77', 'S.ADM'),
	(78, 'GB78', 'S.Ag'),
	(79, 'GB79', 'S.Ak.'),
	(80, 'GB80', 'S.Hut'),
	(81, 'GB81', 'S.H.Int'),
	(82, 'GB82', 'S.IP'),
	(83, 'GB83', 'S.I.A'),
	(84, 'GB84', 'S.I.Kom.'),
	(85, 'GB85', 'S.KM'),
	(86, 'GB86', 'S.Kom.'),
	(87, 'GB87', 'S.Mb'),
	(88, 'GB88', 'S.Mn'),
	(89, 'GB89', 'S.M.'),
	(90, 'GB90', 'S.Pd'),
	(91, 'GB91', 'S.Pi'),
	(92, 'GB92', 'S.Pn'),
	(93, 'GB93', 'S.Psi'),
	(94, 'GB94', 'S.Pt'),
	(95, 'GB95', 'S.S'),
	(96, 'GB96', 'S.Si'),
	(97, 'GB97', 'S.Sn'),
	(98, 'GB98', 'S.Sos'),
	(99, 'GB99', 'S.ST'),
	(100, 'GB100', 'S.TP'),
	(101, 'GB101', 'S.Tr'),
	(102, 'GB102', 'S.Tr.AB'),
	(103, 'GB103', 'S.T.');

-- membuang struktur untuk table hrisori.m_gelar_depan
CREATE TABLE IF NOT EXISTS `m_gelar_depan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Membuang data untuk tabel hrisori.m_gelar_depan: ~12 rows (lebih kurang)
INSERT INTO `m_gelar_depan` (`id`, `kode`, `label`) VALUES
	(1, 'GD1', 'Dra.'),
	(2, 'GD2', 'Drs.'),
	(3, 'GD3', 'Drs. Ak.'),
	(4, 'GD4', 'Drs. Ir.'),
	(5, 'GD5', 'DR.'),
	(6, 'GD6', 'dr.'),
	(7, 'GD7', 'DR. Ir.'),
	(8, 'GD8', 'Ir.'),
	(9, 'GD9', 'Ir. Drs.'),
	(10, 'GD10', 'Ir. DR.'),
	(11, 'GD11', 'Prof.'),
	(12, 'GD12', 'Prof. Ir.');

-- membuang struktur untuk table hrisori.m_gol_darah
CREATE TABLE IF NOT EXISTS `m_gol_darah` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Membuang data untuk tabel hrisori.m_gol_darah: ~8 rows (lebih kurang)
INSERT INTO `m_gol_darah` (`id`, `kode`, `label`) VALUES
	(1, 'GOLD1', 'A+'),
	(2, 'GOLD2', 'A-'),
	(3, 'GOLD3', 'B+'),
	(4, 'GOLD4', 'B-'),
	(5, 'GOLD5', 'O+'),
	(6, 'GOLD6', 'O-'),
	(7, 'GOLD7', 'AB+'),
	(8, 'GOLD8', 'AB-');

-- membuang struktur untuk table hrisori.m_grade
CREATE TABLE IF NOT EXISTS `m_grade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_grade` varchar(30) DEFAULT '',
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Membuang data untuk tabel hrisori.m_grade: ~24 rows (lebih kurang)
INSERT INTO `m_grade` (`id`, `kode_grade`, `label`) VALUES
	(1, 'GRD2', 'INTEGRATION 2'),
	(2, 'GRD3', 'INTEGRATION 3'),
	(3, 'GRD4', 'ADVANCED 1'),
	(4, 'GRD5', 'ADVANCED 2'),
	(5, 'GRD6', 'ADVANCED 3'),
	(6, 'GRD7', 'OPTIMIZATION 1'),
	(7, 'GRD8', 'OPTIMIZATION 2'),
	(8, 'GRD9', 'OPTIMIZATION 3'),
	(9, 'GRD11', 'SYSTEM 1'),
	(10, 'GRD12', 'SYSTEM 2'),
	(11, 'GRD13', 'SYSTEM 3'),
	(12, 'GRD14', 'SYSTEM 4'),
	(13, 'GRD15', 'SPECIFIC 1'),
	(14, 'GRD16', 'SPECIFIC 2'),
	(15, 'GRD17', 'SPECIFIC 3'),
	(16, 'GRD18', 'SPECIFIC 4'),
	(17, 'GRD19', 'BASIC 1'),
	(18, 'GRD20', 'BASIC 2'),
	(19, 'GRD21', 'BASIC 3'),
	(20, 'GRD22', 'BASIC 4E'),
	(21, 'GRD23', 'BASIC 4D'),
	(22, 'GRD24', 'BASIC 4C'),
	(23, 'GRD25', 'BASIC 4B'),
	(24, 'GRD26', 'BASIC 4A');

-- membuang struktur untuk table hrisori.m_jenis_alamat
CREATE TABLE IF NOT EXISTS `m_jenis_alamat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_jenis_alamat: ~2 rows (lebih kurang)
INSERT INTO `m_jenis_alamat` (`id`, `kode`, `label`) VALUES
	(1, 'JA1', 'Alamat Domisili'),
	(2, 'JA2', 'Alamat KTP');

-- membuang struktur untuk table hrisori.m_jenis_asuransi
CREATE TABLE IF NOT EXISTS `m_jenis_asuransi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `name` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.m_jenis_asuransi: ~2 rows (lebih kurang)
INSERT INTO `m_jenis_asuransi` (`id`, `kode`, `name`) VALUES
	(1, 'JA01', 'Dana Pensiun'),
	(2, 'JA02', 'DPLK');

-- membuang struktur untuk table hrisori.m_jenis_award
CREATE TABLE IF NOT EXISTS `m_jenis_award` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_award` varchar(4) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_jenis_award: ~12 rows (lebih kurang)
INSERT INTO `m_jenis_award` (`id`, `kode_award`, `label`) VALUES
	(1, '9002', 'PNGHRGAAN TKT INTERNASIONAL (INOVASI)'),
	(2, '9003', 'PNGHRGAAN TKT KEMENTRIAN/NAS (INOVASI)'),
	(3, '9004', 'PNGHRGAAN TKT KORPORAT (INOVASI)'),
	(4, '9005', 'PNGHRGAAN TKT UNIT (INOVASI)'),
	(5, '9006', 'PNGHRGAAN TKT REGIONAL (INOVASI)'),
	(6, '9007', 'ACHIEVEMENT'),
	(7, '9008', 'TELADAN AWARD'),
	(8, '9009', 'TERIMA KASIH AWARD'),
	(9, '9010', 'Penghargaan Inovasi'),
	(10, '9011', 'Penghargaan Pegawai Teladan'),
	(11, '9012', 'Penghargaan Lain-lain'),
	(12, '9001', 'PENGHARGAAN WINDUAN');

-- membuang struktur untuk table hrisori.m_jenis_diklat
CREATE TABLE IF NOT EXISTS `m_jenis_diklat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_jenis_diklat: ~10 rows (lebih kurang)
INSERT INTO `m_jenis_diklat` (`id`, `kode`, `label`) VALUES
	(1, 'JD2', 'Kursus Eksternal PLN Group'),
	(2, 'A', 'Pembelajaran Seleksi Pegawai Baru'),
	(3, 'B', 'Pembelajaran Profesi'),
	(4, 'D', 'Pembelajaran Penunjang'),
	(5, 'E', 'Pembelajaran Pembekalan Masa Purna Bakti'),
	(6, 'F', 'Pembelajaran Inisiatif Stratejik Korporat'),
	(7, 'JD1', 'Kursus Internal PLN Group'),
	(8, 'C', 'Pembelajaran Penjenjangan'),
	(9, '1030014', 'ADMINISTRASI KONTRAK'),
	(10, '1030015', 'MANAJEMEN PEMBELIAN');

-- membuang struktur untuk table hrisori.m_jenis_dplk
CREATE TABLE IF NOT EXISTS `m_jenis_dplk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `jenis_dplk` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_jenis_dplk: ~3 rows (lebih kurang)
INSERT INTO `m_jenis_dplk` (`id`, `kode`, `jenis_dplk`) VALUES
	(1, 'JDPLK1', 'DANA PENSIUN PLN'),
	(2, 'JDPLK2', 'DANA PENSIUN AP'),
	(3, 'JDPLK3', 'NON DANA PENSIUN PLN GROUP');

-- membuang struktur untuk table hrisori.m_jenis_hukuman
CREATE TABLE IF NOT EXISTS `m_jenis_hukuman` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_jenis_hukuman: ~2 rows (lebih kurang)
INSERT INTO `m_jenis_hukuman` (`id`, `kode`, `label`) VALUES
	(1, 'JG2', 'DISCIPLINE'),
	(2, 'JG1', 'GRIEVANCE');

-- membuang struktur untuk table hrisori.m_jenis_identitas
CREATE TABLE IF NOT EXISTS `m_jenis_identitas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_identitas` varchar(2) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_jenis_identitas: ~11 rows (lebih kurang)
INSERT INTO `m_jenis_identitas` (`id`, `kode_identitas`, `label`) VALUES
	(1, '1', '1 - Identity Card (KTP)'),
	(2, '2', '2 - Passport'),
	(3, '3', '3 - Drivers License - Type A'),
	(4, '4', '4 - Drivers License - Type A Umum'),
	(5, '5', '5 - Drivers License - Type B1'),
	(6, '6', '6 - Drivers License - Type B1 Umum'),
	(7, '7', '7 - Drivers License - Type B2'),
	(8, '8', '8 - Drivers License - Type C'),
	(9, '9', '9 - Drivers License - Type C Umum'),
	(10, '10', '10 - No KK'),
	(11, '11', '11 - No NPWP');

-- membuang struktur untuk table hrisori.m_jenis_jabatan
CREATE TABLE IF NOT EXISTS `m_jenis_jabatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_jenis_jabatan: ~8 rows (lebih kurang)
INSERT INTO `m_jenis_jabatan` (`id`, `kode`, `label`) VALUES
	(1, 'JB2', 'FUNGSIONAL'),
	(2, 'JB4', 'Manajerial dan Supervisori'),
	(3, 'JB5', 'Keteknisan dan Operatif'),
	(4, 'JB1', 'STRUKTURAL'),
	(5, 'JB3', 'KEPAKARAN'),
	(6, 'JB6', 'Generalis'),
	(7, 'JB7', 'Fungsional Specialis'),
	(8, 'JB8', 'Fungsional Kepakaran');

-- membuang struktur untuk table hrisori.m_jenis_karya_tulis
CREATE TABLE IF NOT EXISTS `m_jenis_karya_tulis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_jenis` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_jenis_karya_tulis: ~2 rows (lebih kurang)
INSERT INTO `m_jenis_karya_tulis` (`id`, `kode_jenis`, `label`) VALUES
	(1, 'JKT1', 'Ilmiah'),
	(2, 'JKT2', 'Non Ilmiah');

-- membuang struktur untuk table hrisori.m_jenis_kelamin
CREATE TABLE IF NOT EXISTS `m_jenis_kelamin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Membuang data untuk tabel hrisori.m_jenis_kelamin: ~2 rows (lebih kurang)
INSERT INTO `m_jenis_kelamin` (`id`, `kode`, `label`) VALUES
	(1, 'JK1', 'Male'),
	(2, 'JK2', 'Female');

-- membuang struktur untuk table hrisori.m_jenis_keluarga
CREATE TABLE IF NOT EXISTS `m_jenis_keluarga` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_jenis_keluarga` varchar(10) DEFAULT '',
  `label` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_jenis_keluarga: ~7 rows (lebih kurang)
INSERT INTO `m_jenis_keluarga` (`id`, `id_jenis_keluarga`, `label`) VALUES
	(1, '1', '1 - Istri/Suami'),
	(2, '2', '2 - Anak'),
	(3, '9001', '9001 - Istri/Suami (Mantan)'),
	(4, '9002', '9002 - Ayah'),
	(5, '9003', '9003 - Ibu'),
	(6, '9004', '9004 - Anak Angkat'),
	(7, '9005', '9005 - Anak Tiri');

-- membuang struktur untuk table hrisori.m_jenis_lembaga
CREATE TABLE IF NOT EXISTS `m_jenis_lembaga` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_jenis_lembaga: ~2 rows (lebih kurang)
INSERT INTO `m_jenis_lembaga` (`id`, `kode`, `label`) VALUES
	(1, 'JLS1', 'INTERNAL PLN GROUP'),
	(2, 'JLS2', 'EKSTERNAL PLN GROUP');

-- membuang struktur untuk table hrisori.m_jenis_medsos
CREATE TABLE IF NOT EXISTS `m_jenis_medsos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(160) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Membuang data untuk tabel hrisori.m_jenis_medsos: ~27 rows (lebih kurang)
INSERT INTO `m_jenis_medsos` (`id`, `kode`, `label`) VALUES
	(1, 'JMS2', 'Email Korporat'),
	(2, 'JMS1', 'Email Lainnya'),
	(3, 'JMS3', 'Facebook'),
	(4, 'JMS4', 'LinkedIn'),
	(5, 'JMS8', 'Pinterest'),
	(6, 'JMS9', 'Line'),
	(7, 'JMS10', 'Blog'),
	(8, 'JMS11', 'Youtube'),
	(9, 'JMS12', 'Tiktok'),
	(10, 'JMS5', 'Instagram'),
	(11, 'JMS6', 'Whatsapp'),
	(12, 'JMS7', 'Telegram'),
	(13, 'JMS13', 'Netpass'),
	(14, 'JMS14', 'TSO1'),
	(15, 'JMS15', 'Fax'),
	(16, 'JMS16', 'Voice Mail'),
	(17, 'JMS17', 'Credit Card Number(s)'),
	(18, 'JMS18', 'First telephone number at work'),
	(19, 'JMS19', 'Private E-Mail Address'),
	(20, 'JMS20', 'Blackberry'),
	(21, 'JMS21', 'Cell Phone'),
	(22, 'JMS22', 'Health Insurance Organization'),
	(23, 'JMS23', 'E-Mail for Dematerialized Communication'),
	(24, 'JMS24', 'Car phone/other mobile phone'),
	(25, 'JMS25', 'Pager'),
	(26, 'JMS26', 'Twitter'),
	(27, 'USRAD', 'USERNAME ACTIVE DIRECTORY');

-- membuang struktur untuk table hrisori.m_jenis_organisasi
CREATE TABLE IF NOT EXISTS `m_jenis_organisasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_organisasi` varchar(3) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_jenis_organisasi: ~2 rows (lebih kurang)
INSERT INTO `m_jenis_organisasi` (`id`, `kode_organisasi`, `label`) VALUES
	(1, 'JO1', 'Profesional/pekerjaan'),
	(2, 'JO2', 'Non Formal');

-- membuang struktur untuk table hrisori.m_jenis_pelaksanaan
CREATE TABLE IF NOT EXISTS `m_jenis_pelaksanaan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_jenis_pelaksanaan: ~4 rows (lebih kurang)
INSERT INTO `m_jenis_pelaksanaan` (`id`, `kode`, `label`) VALUES
	(3, 'jplk01', 'PENUGASAN'),
	(4, 'jplk02', 'ITN'),
	(5, 'jplk03', 'LNA'),
	(6, 'jplk04', 'EKSTERNAL');

-- membuang struktur untuk table hrisori.m_jenis_pendidikan
CREATE TABLE IF NOT EXISTS `m_jenis_pendidikan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(3) NOT NULL DEFAULT '',
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Membuang data untuk tabel hrisori.m_jenis_pendidikan: ~29 rows (lebih kurang)
INSERT INTO `m_jenis_pendidikan` (`id`, `kode`, `label`) VALUES
	(1, 'Z1', 'Z1 - Otodidak / SD Tidak'),
	(2, 'Z2', 'Z2 - Sekolah Dasar'),
	(3, 'Z3', 'Z3 - Sekolah Teknik'),
	(4, 'Z4', 'Z4 - SMEP'),
	(5, 'Z5', 'Z5 - SMP'),
	(6, 'Z6', 'Z6 - SLTP Lainnya'),
	(7, 'Z7', 'Z7 - STM'),
	(8, 'Z8', 'Z8 - SMEA'),
	(9, 'Z9', 'Z9 - SMA'),
	(10, 'ZA', 'ZA - SLTA Lainnya'),
	(11, 'ZB', 'ZB - D1 Teknik'),
	(12, 'ZC', 'ZC - D1 Non Teknik'),
	(13, 'ZD', 'ZD - D2 Teknik'),
	(14, 'ZE', 'ZE - D2 Non Teknik'),
	(15, 'ZF', 'ZF - SM/Program D3 Teknik'),
	(16, 'ZG', 'ZG - SM/Program D3 NT'),
	(17, 'ZH', 'ZH - AKABRI'),
	(18, 'ZI', 'ZI - S1 Teknik'),
	(19, 'ZJ', 'ZJ - S1 Non Teknik'),
	(20, 'ZK', 'ZK - Program S2 Teknik'),
	(21, 'ZL', 'ZL - Program S2 Non Tekni'),
	(22, 'ZM', 'ZM - Program S3 Teknik'),
	(23, 'ZN', 'ZN - Program S3 Non Tekni'),
	(24, 'ZO', 'ZO - Kursus Internal PLN Group'),
	(25, 'ZP', 'ZP - Kursus Eksternal PLN Grou'),
	(26, 'ZS', 'ZS - D4 Teknik'),
	(27, 'ZT', 'ZT - D4 Non Teknik'),
	(28, 'ZU', 'ZU - SMK'),
	(29, 'ZR', 'ZR - Sharing Knowledge');

-- membuang struktur untuk table hrisori.m_jenis_sertifikat
CREATE TABLE IF NOT EXISTS `m_jenis_sertifikat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_jenis_sertifikat: ~2 rows (lebih kurang)
INSERT INTO `m_jenis_sertifikat` (`id`, `kode`, `label`) VALUES
	(1, '2', 'WORKSHOP'),
	(2, '1', 'DIKLAT');

-- membuang struktur untuk table hrisori.m_jenjang_jabatan
CREATE TABLE IF NOT EXISTS `m_jenjang_jabatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_jenjang_jabatan: ~10 rows (lebih kurang)
INSERT INTO `m_jenjang_jabatan` (`id`, `kode`, `label`) VALUES
	(1, 'JJ2', 'MANAJEMEN MENENGAH'),
	(2, 'JJ1', 'MANAJEMEN ATAS'),
	(3, 'JJ3', 'MANAJEMEN DASAR'),
	(4, 'JJ4', 'SUPERVISORI ATAS'),
	(5, 'JJ5', 'SUPERVISORI DASAR'),
	(6, 'JJ6', 'FUNGSIONAL I'),
	(7, 'JJ7', 'FUNGSIONAL II'),
	(8, 'JJ8', 'FUNGSIONAL III'),
	(9, 'JJ9', 'FUNGSIONAL IV'),
	(10, 'JJ10', 'FUNGSIONAL V');

-- membuang struktur untuk table hrisori.m_judul_lms
CREATE TABLE IF NOT EXISTS `m_judul_lms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(30) DEFAULT '',
  `label` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_judul_lms: ~10 rows (lebih kurang)
INSERT INTO `m_judul_lms` (`id`, `kode`, `label`) VALUES
	(1, 'B.1.42.16.001.3.16R0.IC', 'PELAKSANAAN KONSTRUKSI ROLLER COMPACTED CONCRETE (RCC) UNTUK BENDUNGAN'),
	(2, 'B.1.42.14.001.3.16R1.IC', '(NON AKTIF) PERIZINAN PEMBANGUNAN INFRASTRUKTUR KETENAGALISTRIKAN'),
	(3, 'B.2.48.14.001.3.14R0.IC', 'PRICING INDEPENDENT POWER PRODUCER (IPP)'),
	(4, 'B.1.48.15.001.3.15R0.IC', '(NON AKTIF) PENGELOLAAN CASH CARD, A2K DAN SIP2A'),
	(5, 'B.1.48.14.001.2.18R1.IC', 'MANAJEMEN KEUANGAN UNTUK PELAKSANA'),
	(6, 'B.1.48.14.002.2.14R0.IC', 'PENGANTAR PERPAJAKAN'),
	(7, 'B.1.48.16.001.2.16R0.IC', 'CAPITAL BUDGETING WITH RISK'),
	(8, 'D.1.44.15.001.3.15R0.IC', 'WORKSHOP MONITORING LAPORAN KEUANGAN DI SAP'),
	(9, 'B.1.48.14.003.3.19R2.IC', 'BANK GARANSI DAN APLIKASINYA'),
	(10, 'D.1.32.16.001.3.16R0.IC', 'WORKSHOP MARKETING FOR SALES IMPROVEMENT');

-- membuang struktur untuk table hrisori.m_kabupaten
CREATE TABLE IF NOT EXISTS `m_kabupaten` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_kabupaten` varchar(4) DEFAULT '',
  `id_provinsi` varchar(3) DEFAULT '',
  `nama_kabupaten` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_kabupaten: ~10 rows (lebih kurang)
INSERT INTO `m_kabupaten` (`id`, `id_kabupaten`, `id_provinsi`, `nama_kabupaten`) VALUES
	(1, '1102', '11', 'Kabupaten Aceh Singkil'),
	(2, '1103', '11', 'Kabupaten Aceh Selatan'),
	(3, '1104', '11', 'Kabupaten Aceh Tenggara'),
	(4, '1105', '11', 'Kabupaten Aceh Timur'),
	(5, '1106', '11', 'Kabupaten Aceh Tengah'),
	(6, '1107', '11', 'Kabupaten Aceh Barat'),
	(7, '1108', '11', 'Kabupaten Aceh Besar'),
	(8, '1109', '11', 'Kabupaten Pidie'),
	(9, '1110', '11', 'Kabupaten Bireuen'),
	(10, '1111', '11', 'Kabupaten Aceh Utara');

-- membuang struktur untuk table hrisori.m_keterangan_mutasi
CREATE TABLE IF NOT EXISTS `m_keterangan_mutasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `name` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.m_keterangan_mutasi: ~9 rows (lebih kurang)
INSERT INTO `m_keterangan_mutasi` (`id`, `kode`, `name`) VALUES
	(1, 'KM01', 'PKWT'),
	(2, 'KM02', 'PENGANGKATAN S3'),
	(3, 'KM03', 'PENGANGKATAN S2'),
	(4, 'KM04', 'PENGANGKATAN S1'),
	(5, 'KM05', 'PENGANGKATAN D3'),
	(6, 'KM06', 'PENGANGKATAN SMA/SMK'),
	(7, 'KM07', 'Mutasi Dari Organik SH/AP'),
	(8, 'KM08', 'Mutasi Dari Organik CP'),
	(9, 'KM09', 'Mutasi dari Dari Organik Holding');

-- membuang struktur untuk table hrisori.m_keterangan_pendidikan
CREATE TABLE IF NOT EXISTS `m_keterangan_pendidikan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Membuang data untuk tabel hrisori.m_keterangan_pendidikan: ~4 rows (lebih kurang)
INSERT INTO `m_keterangan_pendidikan` (`id`, `kode`, `label`) VALUES
	(1, 'KP1', 'Dasar Pengangkatan'),
	(2, 'KP2', 'Penyesuaian Golongan'),
	(3, 'KP3', 'Diakui'),
	(4, 'KP4', 'Dicatat');

-- membuang struktur untuk table hrisori.m_keyb
CREATE TABLE IF NOT EXISTS `m_keyb` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_keyb: ~10 rows (lebih kurang)
INSERT INTO `m_keyb` (`id`, `kode`, `label`) VALUES
	(1, 'KB2', 'Bekerja dengan integritas'),
	(2, 'KB3', 'Berani Melakukan Intervensi'),
	(3, 'KB4', 'Berempati dengan kekhawatiran orang lain'),
	(4, 'KB5', 'Berkomitmen untuk bertindak'),
	(5, 'KB1', 'Antisipasi'),
	(6, 'KB6', 'Berkomunikasi untuk melibatkan orang lain'),
	(7, 'KB7', 'Berkontribusi untuk pencapaian tujuan'),
	(8, 'KB8', 'Bersama - sama menetapkan rencana pengembangan - Secara bersama - sama mengidentifikasi peluang pengembangan melalui pengamatan atau pembinaan, pelatihan, lokakarya, seminar, yang akan membantu indivi'),
	(9, 'KB9', 'Bertindak dengan risiko yang terukur'),
	(10, 'KB10', 'Berupaya menampilkan sikap positif saat menghadapi situasi yang kurang menarik atau kurang menyenangkan');

-- membuang struktur untuk table hrisori.m_kode_diklat
CREATE TABLE IF NOT EXISTS `m_kode_diklat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(60) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_kode_diklat: ~10 rows (lebih kurang)
INSERT INTO `m_kode_diklat` (`id`, `kode`, `label`) VALUES
	(1, 'B.1.42.14.001.3.16R1.IC', '(NON AKTIF) PERIZINAN PEMBANGUNAN INFRASTRUKTUR KETENAGALISTRIKAN'),
	(2, 'B.1.42.16.001.3.16R0.IC', 'PELAKSANAAN KONSTRUKSI ROLLER COMPACTED CONCRETE (RCC) UNTUK BENDUNGAN'),
	(3, 'B.2.48.14.001.3.14R0.IC', 'PRICING INDEPENDENT POWER PRODUCER (IPP)'),
	(4, 'B.1.48.15.001.3.15R0.IC', '(NON AKTIF) PENGELOLAAN CASH CARD, A2K DAN SIP2A'),
	(5, 'B.1.48.14.001.2.18R1.IC', 'MANAJEMEN KEUANGAN UNTUK PELAKSANA'),
	(6, 'B.1.48.14.002.2.14R0.IC', 'PENGANTAR PERPAJAKAN'),
	(7, 'B.1.48.16.001.2.16R0.IC', 'CAPITAL BUDGETING WITH RISK'),
	(8, 'D.1.44.15.001.3.15R0.IC', 'WORKSHOP MONITORING LAPORAN KEUANGAN DI SAP'),
	(9, 'B.1.48.14.003.3.19R2.IC', 'BANK GARANSI DAN APLIKASINYA'),
	(10, 'D.1.32.16.001.3.16R0.IC', 'WORKSHOP MARKETING FOR SALES IMPROVEMENT');

-- membuang struktur untuk table hrisori.m_kompetensi
CREATE TABLE IF NOT EXISTS `m_kompetensi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_kompetensi` varchar(10) DEFAULT '',
  `kompetensi` varchar(200) DEFAULT '',
  `inisial_kompetensi` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_kompetensi: ~10 rows (lebih kurang)
INSERT INTO `m_kompetensi` (`id`, `kode_kompetensi`, `kompetensi`, `inisial_kompetensi`) VALUES
	(1, 'KOMP1', 'ACHIEVEMENT ORIENTATION', 'ACH'),
	(2, 'KOMP2', 'BUILDING TRUST', 'BTR'),
	(3, 'KOMP3', 'CONTINUOUS LEARNING', 'CLE'),
	(4, 'KOMP4', 'BUILDING PARTNERSHIP', 'BPA'),
	(5, 'KOMP5', 'INFLUENCING', 'INF'),
	(6, 'KOMP6', 'ANALYSIS AND JUDGEMENT', 'AAJ'),
	(7, 'KOMP7', 'BUSINESS ACUMEN', 'BAC'),
	(8, 'KOMP8', 'CUSTOMER FOCUS', 'CFO'),
	(9, 'KOMP9', 'DECISION MAKING', 'DCM'),
	(10, 'KOMP10', 'PLANNING AND ORGANIZING', 'PNO');

-- membuang struktur untuk table hrisori.m_level_profesiensi
CREATE TABLE IF NOT EXISTS `m_level_profesiensi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_level` varchar(10) DEFAULT '',
  `label` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Membuang data untuk tabel hrisori.m_level_profesiensi: ~6 rows (lebih kurang)
INSERT INTO `m_level_profesiensi` (`id`, `kode_level`, `label`) VALUES
	(1, 'LP1', '1 - Concept'),
	(2, 'LP2', '2 - Understanding'),
	(3, 'LP3', '3 - Applying'),
	(4, 'LP4', '4 - Analizing'),
	(5, 'LP5', '5 - Evaluating'),
	(6, 'LP6', '6 - Creating');

-- membuang struktur untuk table hrisori.m_level_sertifikasi
CREATE TABLE IF NOT EXISTS `m_level_sertifikasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_level_sertifikasi: ~9 rows (lebih kurang)
INSERT INTO `m_level_sertifikasi` (`id`, `kode`, `label`) VALUES
	(1, 'LS1', '1'),
	(2, 'LS2', '2'),
	(3, 'LS3', '3'),
	(4, 'LS4', '4'),
	(5, 'LS5', '5'),
	(6, 'LS6', '6'),
	(7, 'LS7', '7'),
	(8, 'LS8', '8'),
	(9, 'LS9', '9');

-- membuang struktur untuk table hrisori.m_negara
CREATE TABLE IF NOT EXISTS `m_negara` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_negara` varchar(2) DEFAULT '',
  `nama_negara` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Membuang data untuk tabel hrisori.m_negara: ~10 rows (lebih kurang)
INSERT INTO `m_negara` (`id`, `kode_negara`, `nama_negara`) VALUES
	(1, 'AD', 'AD - Andorra'),
	(2, 'AE', 'AE - Utd.Arab Emir.'),
	(3, 'AF', 'AF - Afghanistan'),
	(4, 'AG', 'AG - Antigua/Barbuda'),
	(5, 'AI', 'AI - Anguilla'),
	(6, 'AL', 'AL - Albania'),
	(7, 'AM', 'AM - Armenia'),
	(8, 'AN', 'AN - Dutch Antilles'),
	(9, 'AO', 'AO - Angola'),
	(10, 'AQ', 'AQ - Antarctica');

-- membuang struktur untuk table hrisori.m_nilai_talenta
CREATE TABLE IF NOT EXISTS `m_nilai_talenta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(3) DEFAULT '',
  `label` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_nilai_talenta: ~9 rows (lebih kurang)
INSERT INTO `m_nilai_talenta` (`id`, `kode`, `label`) VALUES
	(1, 'LBS', 'LBS - Luar Biasa'),
	(2, 'POT', 'POT - Potensial'),
	(3, 'SPO', 'SPO - Sangat Potensial'),
	(4, 'PPS', 'PPS - Perlu Penyesuaian'),
	(5, 'OPT', 'OPT - Optimal'),
	(6, 'SOP', 'SOP - Sangat Optimal'),
	(7, 'SPP', 'SPP - Sangat Perlu Perhatian'),
	(8, 'KPO', 'KPO - Kandidat Potensial'),
	(9, 'PPE', 'PPE - Perlu Perhatian');

-- membuang struktur untuk table hrisori.m_nki
CREATE TABLE IF NOT EXISTS `m_nki` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_nki` varchar(10) DEFAULT '',
  `score_awal` double NOT NULL DEFAULT '0',
  `score_akhir` double NOT NULL DEFAULT '0',
  `keterangan` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_nki: ~4 rows (lebih kurang)
INSERT INTO `m_nki` (`id`, `kode_nki`, `score_awal`, `score_akhir`, `keterangan`) VALUES
	(1, 'KOM-1', 401, 500, 'Kompetensi Sangat Istimewa'),
	(2, 'KOM-2', 301, 400, 'Kompetensi Istimewa'),
	(3, 'KOM-3', 201, 300, 'Kompetensi Rata-rata'),
	(4, 'KOM-4', 0, 200, 'Kompetensi Kurang Ditampilkan');

-- membuang struktur untuk table hrisori.m_nsk
CREATE TABLE IF NOT EXISTS `m_nsk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_nsk` varchar(10) DEFAULT '',
  `score_awal` double NOT NULL DEFAULT '0',
  `score_akhir` double NOT NULL DEFAULT '0',
  `keterangan` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_nsk: ~5 rows (lebih kurang)
INSERT INTO `m_nsk` (`id`, `kode_nsk`, `score_awal`, `score_akhir`, `keterangan`) VALUES
	(1, 'OS', 401, 500, 'Pencapaian Luar Biasa (Outstanding)'),
	(2, 'ER', 301, 400, 'Melampaui Harapan (Exceeds Requirements)'),
	(3, 'MR', 201, 300, 'Memenuhi Persyaratan (Meet Requirements)'),
	(4, 'NI', 101, 200, 'Perlu Pengembangan (Need Improvement)'),
	(5, 'MG', 0, 100, 'Pencapaian Minimum (Marginal)');

-- membuang struktur untuk table hrisori.m_pekerjaan
CREATE TABLE IF NOT EXISTS `m_pekerjaan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `label` varchar(160) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `label` (`label`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_pekerjaan: ~4 rows (lebih kurang)
INSERT INTO `m_pekerjaan` (`id`, `label`) VALUES
	(1, 'BELUM BEKERJA'),
	(2, 'IBU RUMAH TANGGA'),
	(4, 'PEGAWAI PLN'),
	(3, 'WIRASWASTA');

-- membuang struktur untuk table hrisori.m_penyelenggaraan
CREATE TABLE IF NOT EXISTS `m_penyelenggaraan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(3) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_penyelenggaraan: ~8 rows (lebih kurang)
INSERT INTO `m_penyelenggaraan` (`id`, `kode`, `label`) VALUES
	(1, 'ICT', 'In Class Training (ICT)'),
	(2, 'IHT', 'In House Training (IHT)'),
	(3, 'EL', 'E Learning'),
	(4, 'EW', 'Web Binar'),
	(5, 'EM', 'Mobile Learning'),
	(6, 'BL', 'BLENDED LEARNING'),
	(7, 'XT', 'EKSTERNAL/TAMBAHAN'),
	(8, 'DL', 'DIGITAL LEARNING');

-- membuang struktur untuk table hrisori.m_personal_area
CREATE TABLE IF NOT EXISTS `m_personal_area` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode` (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_personal_area: ~15 rows (lebih kurang)
INSERT INTO `m_personal_area` (`id`, `kode`, `label`) VALUES
	(1, '1230', 'PT PLN TARAKAN'),
	(2, '1231', 'REGION KALIMANTAN 1'),
	(3, '1232', 'REGION KALIMANTAN 2'),
	(4, '1233', 'REGION KALIMANTAN 3'),
	(5, '1234', 'REGION SULAWESI 1'),
	(6, '1235', 'REGION SULAWESI 2'),
	(7, '1236', 'REGION NUSA TENGGARA'),
	(8, '1237', 'REGION MALUKU DAN PAPUA'),
	(9, '1238', 'UNIT PELAKSANA KALIMANTAN 1'),
	(10, '1239', 'UNIT PELAKSANA KALIMANTAN 2'),
	(11, '1241', 'UNIT PELAKSANA KALIMANTAN 3'),
	(12, '1242', 'UNIT PELAKSANA SULAWESI 1'),
	(13, '1243', 'UNIT PELAKSANA SULAWESI 2'),
	(14, '1244', 'UNIT PELAKSANA NUSA TENGGARA'),
	(15, '1245', 'UNIT PELAKSANA MALUKU DAN PAPUA');

-- membuang struktur untuk table hrisori.m_personal_sub_area
CREATE TABLE IF NOT EXISTS `m_personal_sub_area` (
  `id` int NOT NULL AUTO_INCREMENT,
  `personal_area` varchar(200) DEFAULT '',
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode` (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_personal_sub_area: ~10 rows (lebih kurang)
INSERT INTO `m_personal_sub_area` (`id`, `personal_area`, `kode`, `label`) VALUES
	(1, '1231', '1238', 'AREA PONTIANAK DAN SINGKAWANG'),
	(2, '1231', '1239', 'AREA SANGGAU'),
	(3, '1231', '1240', 'AREA KETAPANG'),
	(4, '1232', '1241', 'AREA BANJARMASIN'),
	(5, '1232', '1242', 'AREA PALANGKARAYA'),
	(6, '1232', '1243', 'AREA BARABAI'),
	(7, '1232', '1244', 'AREA KUALA KAPUAS'),
	(8, '1233', '1245', 'AREA BALIKPAPAN'),
	(9, '1233', '1246', 'AREA SAMARINDA DAN BONTANG'),
	(10, '1233', '1247', 'AREA KALIMANTAN UTARA');

-- membuang struktur untuk table hrisori.m_pln_group
CREATE TABLE IF NOT EXISTS `m_pln_group` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_pln_group: ~13 rows (lebih kurang)
INSERT INTO `m_pln_group` (`id`, `kode`, `label`) VALUES
	(1, '1000', 'PT PLN (PERSERO)'),
	(2, '1001', 'PT INDONESIA POWER'),
	(3, '1002', 'PT PJB'),
	(4, '1003', 'PT INDONESIA COMNET PLUS'),
	(5, '1004', 'PT PLN BATAM'),
	(6, '1005', 'PT PLN ENJINIRING'),
	(7, '1006', 'PT PLN TARAKAN'),
	(8, '1007', 'PT PLN BATUBARA'),
	(9, '1008', 'PT BAG'),
	(10, '1009', 'PT HALEYORA POWER'),
	(11, '1010', 'PT PLN GAS GEOTHERMAL'),
	(12, '1011', 'PT ENERGY MANAGEMENT INDONESIA'),
	(13, '1012', 'PT MANDAU CIPTA TENAGA NUSANTARA');

-- membuang struktur untuk table hrisori.m_pohon_bisnis
CREATE TABLE IF NOT EXISTS `m_pohon_bisnis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(2) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_pohon_bisnis: ~3 rows (lebih kurang)
INSERT INTO `m_pohon_bisnis` (`id`, `kode`, `label`) VALUES
	(1, '1', 'Usaha Penyediaan Tenaga Listrik'),
	(2, '2', 'Penunjang Ketenagalistrikan'),
	(3, '3', 'Penunjang Korporat');

-- membuang struktur untuk table hrisori.m_pohon_profesi
CREATE TABLE IF NOT EXISTS `m_pohon_profesi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(5) DEFAULT '',
  `kode_pohon_bisnis` varchar(2) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_pohon_profesi: ~17 rows (lebih kurang)
INSERT INTO `m_pohon_profesi` (`id`, `kode`, `kode_pohon_bisnis`, `label`) VALUES
	(1, '1.1', '1', 'Pembangkitan'),
	(2, '1.2', '1', 'Transmisi'),
	(3, '1.3', '1', 'Distribusi'),
	(4, '1.4', '1', 'Niaga dan Manajemen Pelanggan'),
	(5, '2.1', '2', 'Produksi Peralatan Ketenagalistrikan'),
	(6, '2.2', '2', 'K2, K3, Keamanan dan Lingkungan'),
	(7, '2.3', '2', 'Manajemen Proyek, Enjiniring dan Konstruksi'),
	(8, '2.4', '2', 'Penelitian dan Pengembangan'),
	(9, '2.5', '2', 'Pembelajaran'),
	(10, '2.6', '2', 'Sertifikasi'),
	(11, '3.1', '3', 'Supply Chain Management'),
	(12, '3.2', '3', 'Regulatory and compliance'),
	(13, '3.3', '3', 'Teknologi Informasi'),
	(14, '3.4', '3', 'SDM'),
	(15, '3.5', '3', 'Keuangan'),
	(16, '3.6', '3', 'Komunikasi, CSR dan Pengelolaan Kantor'),
	(17, '3.7', '3', 'Manajemen Perusahaan');

-- membuang struktur untuk table hrisori.m_pohon_profesinew
CREATE TABLE IF NOT EXISTS `m_pohon_profesinew` (
  `id` int NOT NULL,
  `kode_pohon_bisnis` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '',
  `pohon_bisnis` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '',
  `kode_pohon_profesi` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '',
  `pohon_profesi` varchar(160) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '',
  `kode_dahan_profesi` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '',
  `dahan_profesi` varchar(160) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '',
  `no_nama_profesi` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '',
  `kode_nama_profesi` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '',
  `nama_profesi` varchar(160) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel hrisori.m_pohon_profesinew: ~10 rows (lebih kurang)
INSERT INTO `m_pohon_profesinew` (`id`, `kode_pohon_bisnis`, `pohon_bisnis`, `kode_pohon_profesi`, `pohon_profesi`, `kode_dahan_profesi`, `dahan_profesi`, `no_nama_profesi`, `kode_nama_profesi`, `nama_profesi`) VALUES
	(1, '1', 'USAHA PENYEDIAAN TENAGA LISTRIK', '1.1', 'Strategi dan Pengembangan Bisnis', '1.1.1', 'Strategi Korporat dan Bisnis', '1.1.1.1', 'STR 1.1.1.1', 'Perencanaan Korporat'),
	(2, '1', 'USAHA PENYEDIAAN TENAGA LISTRIK', '1.1', 'Strategi dan Pengembangan Bisnis', '1.1.1', 'Strategi Korporat dan Bisnis', '1.1.1.2', 'STR 1.1.1.2', 'Perencanaan Sistem Ketenagalistrikan'),
	(3, '1', 'USAHA PENYEDIAAN TENAGA LISTRIK', '1.1', 'Strategi dan Pengembangan Bisnis', '1.1.1', 'Strategi Korporat dan Bisnis', '1.1.1.3', 'STR 1.1.1.3', 'Pengembangan dan Strategi Bisnis'),
	(4, '1', 'USAHA PENYEDIAAN TENAGA LISTRIK', '1.1', 'Strategi dan Pengembangan Bisnis', '1.1.1', 'Strategi Korporat dan Bisnis', '1.1.1.4', 'STR 1.1.1.4', 'Portofolio Manajemen'),
	(5, '1', 'USAHA PENYEDIAAN TENAGA LISTRIK', '1.1', 'Strategi dan Pengembangan Bisnis', '1.1.2', 'Transisi Energi dan Keberlanjutan', '1.1.2.1', 'TEK 1.1.2.1', 'Manajemen Transisi Energi'),
	(6, '1', 'USAHA PENYEDIAAN TENAGA LISTRIK', '1.1', 'Strategi dan Pengembangan Bisnis', '1.1.2', 'Transisi Energi dan Keberlanjutan', '1.1.2.2', 'TEK 1.1.2.2', 'Perubahan Iklim'),
	(7, '1', 'USAHA PENYEDIAAN TENAGA LISTRIK', '1.1', 'Strategi dan Pengembangan Bisnis', '1.1.2', 'Transisi Energi dan Keberlanjutan', '1.1.2.3', 'TEK 1.1.2.3', 'Pengembangan Berkelanjutan'),
	(8, '1', 'USAHA PENYEDIAAN TENAGA LISTRIK', '1.1', 'Strategi dan Pengembangan Bisnis', '1.1.3', 'Manajemen Aset', '1.1.3.1', 'MAS 1.1.3.1', 'Strategic Asset Management'),
	(9, '1', 'USAHA PENYEDIAAN TENAGA LISTRIK', '1.1', 'Strategi dan Pengembangan Bisnis', '1.1.3', 'Manajemen Aset', '1.1.3.2', 'MAS 1.1.3.2', 'Asset Value Realization'),
	(10, '1', 'USAHA PENYEDIAAN TENAGA LISTRIK', '1.1', 'Strategi dan Pengembangan Bisnis', '1.1.4', 'Manajemen Perubahan dan Kinerja', '1.1.4.1', 'MPK 1.1.4.1', 'Manajemen Kinerja');

-- membuang struktur untuk table hrisori.m_posisi_kunci
CREATE TABLE IF NOT EXISTS `m_posisi_kunci` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(160) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.m_posisi_kunci: ~4 rows (lebih kurang)
INSERT INTO `m_posisi_kunci` (`id`, `kode`, `label`) VALUES
	(1, 'PK1', 'Posisi Kunci 1'),
	(2, 'PK2', 'Posisi Kunci 2'),
	(3, 'PK3', 'Posisi Kunci 3'),
	(4, 'PK4', 'Posisi Kunci 4');

-- membuang struktur untuk table hrisori.m_profesi
CREATE TABLE IF NOT EXISTS `m_profesi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_profesi` varchar(30) DEFAULT '',
  `nama_profesi` varchar(200) DEFAULT '',
  `kode_dahan_profesi` varchar(30) DEFAULT '',
  `dahan_profesi` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_profesi: ~10 rows (lebih kurang)
INSERT INTO `m_profesi` (`id`, `kode_profesi`, `nama_profesi`, `kode_dahan_profesi`, `dahan_profesi`) VALUES
	(1, 'TRS 1.2.1.1', 'Perencanaan Sistem Tenaga', '1.2.1', 'Operasi Sistem'),
	(2, 'KIT 1.1.1.1', 'Perencanaan Energi', '1.1.1', 'Energi Primer'),
	(3, 'KIT 1.1.1.2', 'Manajemen Energi', '1.1.1', 'Energi Primer'),
	(4, 'KIT 1.1.2.1', 'Perencanaan Pembangkitan', '1.1.2', 'Pembangkit'),
	(5, 'KIT 1.1.2.2', 'Enjiniring Pembangkitan', '1.1.2', 'Pembangkit'),
	(6, 'KIT 1.1.2.3', 'Operasi Pembangkitan', '1.1.2', 'Pembangkit'),
	(7, 'KIT 1.1.2.4', 'Pemeliharaan Pembangkitan', '1.1.2', 'Pembangkit'),
	(8, 'KIT 1.1.2.5', 'Manajemen Pembangkitan', '1.1.2', 'Pembangkit'),
	(9, 'TRS 1.2.1.2', 'Operasi Sistem Tenaga', '1.2.1', 'Operasi Sistem'),
	(10, 'TRS 1.2.1.3', 'Transaksi Energi Listrik', '1.2.1', 'Operasi Sistem');

-- membuang struktur untuk table hrisori.m_provinsi
CREATE TABLE IF NOT EXISTS `m_provinsi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_provinsi` varchar(3) DEFAULT '',
  `nama_provinsi` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_provinsi: ~10 rows (lebih kurang)
INSERT INTO `m_provinsi` (`id`, `id_provinsi`, `nama_provinsi`) VALUES
	(1, '11', 'Aceh'),
	(2, '12', 'Sumatera Utara'),
	(3, '13', 'Sumatera Barat'),
	(4, '14', 'Riau'),
	(5, '15', 'Jambi'),
	(6, '16', 'Sumatera Selatan'),
	(7, '17', 'Bengkulu'),
	(8, '18', 'Lampung'),
	(9, '19', 'Kepulauan Bangka Belitung'),
	(10, '21', 'Kepulauan Riau');

-- membuang struktur untuk table hrisori.m_reason
CREATE TABLE IF NOT EXISTS `m_reason` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_reason: ~10 rows (lebih kurang)
INSERT INTO `m_reason` (`id`, `kode`, `label`) VALUES
	(1, 'RG1', 'Pengangkatan'),
	(2, 'RG2', 'Pembinaan Skala'),
	(3, 'RG3', 'Kenaikan Level Kompetensi'),
	(4, 'RG4', 'Kenaikan Level Kompetensi Dan Skala'),
	(5, 'RG5', 'Kenaikan Grade & Grade Khusus'),
	(6, 'RG6', 'Kenaikan Grade'),
	(7, 'RG7', 'Kenaikan Level Kompetensi (Khusus)'),
	(8, 'RG8', 'Kenaikan Level Kompetensi (Khusus) Promosi Jabatan'),
	(9, 'RG9', 'Kenaikan Grade Khusus'),
	(10, 'RG10', 'Kenaikan Berkala');

-- membuang struktur untuk table hrisori.m_reason_hukuman
CREATE TABLE IF NOT EXISTS `m_reason_hukuman` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_reason` varchar(2) DEFAULT '',
  `label` varchar(160) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_reason_hukuman: ~5 rows (lebih kurang)
INSERT INTO `m_reason_hukuman` (`id`, `kode_reason`, `label`) VALUES
	(1, '1', 'PP10'),
	(2, '2', 'LISTRIK'),
	(3, '3', 'MANGKIR'),
	(4, '4', 'PEMALSUAN'),
	(5, '5', 'LAIN-LAIN');

-- membuang struktur untuk table hrisori.m_result_hukuman
CREATE TABLE IF NOT EXISTS `m_result_hukuman` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_result` varchar(2) DEFAULT '',
  `label` varchar(160) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_result_hukuman: ~18 rows (lebih kurang)
INSERT INTO `m_result_hukuman` (`id`, `kode_result`, `label`) VALUES
	(1, '1', '01 - SURAT PERINGATAN'),
	(2, '2', '02 - TURUN 1 PERINGKAT'),
	(3, '3', '03 - TURUN 2 PERINGKAT'),
	(4, '4', '04 - TURUN 3 PERINGKAT'),
	(5, '5', '05 - TURUN 4 PERINGKAT'),
	(6, '6', '06 - TURUN 5 PERINGKAT'),
	(7, '7', '07 - PHK DENGAN HORMAT'),
	(8, '8', '08 - PHK TIDAK HORMAT'),
	(9, '9', '09 - SP RINGAN'),
	(10, '10', '10 - SP KE-1'),
	(11, '11', '11 - SP KE-2'),
	(12, '12', '12 - SP KE-3 DAN TERAKHIR'),
	(13, '13', '13 - SP KE-2 DAN TERAKHIR'),
	(14, '14', '14 - SP KE-1 DAN TERAKHIR'),
	(15, '15', '15 - PHK KARENA PB'),
	(16, '16', '16 - PHK KARENA PHI'),
	(17, '17', '17 - PHK KARENA PIDANA'),
	(18, '18', '18 - TINDAK SELA');

-- membuang struktur untuk table hrisori.m_satuan
CREATE TABLE IF NOT EXISTS `m_satuan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_satuan: ~6 rows (lebih kurang)
INSERT INTO `m_satuan` (`id`, `kode`, `label`) VALUES
	(1, 'SL2', 'Weeks'),
	(2, 'SL3', 'Months'),
	(3, 'SL4', 'Years'),
	(4, 'SL5', 'Semester'),
	(5, 'SL6', 'Classes'),
	(6, 'SL1', 'Days');

-- membuang struktur untuk table hrisori.m_satuan_lama_pendidikan
CREATE TABLE IF NOT EXISTS `m_satuan_lama_pendidikan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_satuan_lama_pendidikan: ~6 rows (lebih kurang)
INSERT INTO `m_satuan_lama_pendidikan` (`id`, `kode`, `label`) VALUES
	(1, 'SL2', 'Weeks'),
	(2, 'SL3', 'Months'),
	(3, 'SL4', 'Years'),
	(4, 'SL5', 'Semester'),
	(5, 'SL6', 'Classes'),
	(6, 'SL1', 'Days');

-- membuang struktur untuk table hrisori.m_sifat_diklat
CREATE TABLE IF NOT EXISTS `m_sifat_diklat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_sifat_diklat: ~3 rows (lebih kurang)
INSERT INTO `m_sifat_diklat` (`id`, `kode`, `label`) VALUES
	(1, 'sdk01', 'KHUSUS'),
	(2, 'sdk02', 'UMUM'),
	(3, 'sdk03', 'EKSTERNAL/GABUNGAN');

-- membuang struktur untuk table hrisori.m_stage_hukuman
CREATE TABLE IF NOT EXISTS `m_stage_hukuman` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_stage` varchar(2) DEFAULT '',
  `label` varchar(160) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_stage_hukuman: ~7 rows (lebih kurang)
INSERT INTO `m_stage_hukuman` (`id`, `kode_stage`, `label`) VALUES
	(1, '1', '1 - TP2DP'),
	(2, '2', '2 - TPK'),
	(3, '3', '3 - Bagian SDM'),
	(4, '4', '4 - GM/BOD'),
	(5, '5', '5 - DEPNAKER'),
	(6, '6', '6 - Tim Investigasi'),
	(7, '7', '7 - PPHI');

-- membuang struktur untuk table hrisori.m_status_hukuman
CREATE TABLE IF NOT EXISTS `m_status_hukuman` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_status` varchar(2) DEFAULT '',
  `label` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_status_hukuman: ~8 rows (lebih kurang)
INSERT INTO `m_status_hukuman` (`id`, `kode_status`, `label`) VALUES
	(1, '1', '1 - Menunggu Konfirmasi'),
	(2, '2', '2 - Dibatalkan'),
	(3, '3', '3 - Dalam Perundingan'),
	(4, '4', '4 - Diputuskan'),
	(5, '5', '5 - Dalam Proses Diskusi'),
	(6, '6', '6 - Diselesaikan'),
	(7, '7', '7 - Keberatan'),
	(8, '8', '8 - Tindak Sela');

-- membuang struktur untuk table hrisori.m_status_integrasi
CREATE TABLE IF NOT EXISTS `m_status_integrasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_integrasi` varchar(1) DEFAULT '',
  `label` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_status_integrasi: ~2 rows (lebih kurang)
INSERT INTO `m_status_integrasi` (`id`, `kode_integrasi`, `label`) VALUES
	(1, '0', 'Non Integrasi'),
	(2, '1', 'Integrasi');

-- membuang struktur untuk table hrisori.m_status_kewarganegaraan
CREATE TABLE IF NOT EXISTS `m_status_kewarganegaraan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL DEFAULT '',
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Membuang data untuk tabel hrisori.m_status_kewarganegaraan: ~2 rows (lebih kurang)
INSERT INTO `m_status_kewarganegaraan` (`id`, `kode`, `label`) VALUES
	(1, 'SK1', 'WNI'),
	(2, 'SK2', 'WNA');

-- membuang struktur untuk table hrisori.m_status_nikah
CREATE TABLE IF NOT EXISTS `m_status_nikah` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Membuang data untuk tabel hrisori.m_status_nikah: ~5 rows (lebih kurang)
INSERT INTO `m_status_nikah` (`id`, `kode`, `label`) VALUES
	(1, 'SN1', 'Lajang'),
	(2, 'SN2', 'Kawin'),
	(3, 'SN3', 'Dd/Jnd'),
	(4, 'SN4', 'PtsHub'),
	(5, 'SN5', 'Lain');

-- membuang struktur untuk table hrisori.m_stream
CREATE TABLE IF NOT EXISTS `m_stream` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_stream: ~21 rows (lebih kurang)
INSERT INTO `m_stream` (`id`, `kode`, `label`) VALUES
	(1, 'STR1', 'Business and Commercial'),
	(2, 'STR2', 'CEO Office'),
	(3, 'STR3', 'Core Business PT Cirata Karya Lestrari'),
	(4, 'STR4', 'Core Business PT PJB Investasi (Supervisori Atas)'),
	(5, 'STR5', 'Corporate Research and Knowledge'),
	(6, 'STR6', 'Corporate Planning and Performance'),
	(7, 'STR7', 'Corporate and Technical Services'),
	(8, 'STR8', 'Electricity Project and Development'),
	(9, 'STR9', 'Electricity Generation, Transmission, and Distribution'),
	(10, 'STR10', 'Electricity Generation and Transmission'),
	(11, 'STR11', 'Expertise'),
	(12, 'STR12', 'Internal Control and Compliance'),
	(13, 'STR13', 'Strategic Electricity Planning'),
	(14, 'STR14', 'Distribution and Commercial'),
	(15, 'STR15', 'Domestic'),
	(16, 'STR16', 'Global'),
	(17, 'STR17', 'Intelegensi Umum'),
	(18, 'STR18', 'Internal Control and Compliance'),
	(19, 'STR19', 'Site Manager - Waskita Karya'),
	(20, 'STR20', 'Strategic Electricity Planning'),
	(21, 'STR21', 'SKD 2021');

-- membuang struktur untuk table hrisori.m_subtype
CREATE TABLE IF NOT EXISTS `m_subtype` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_subtype: ~9 rows (lebih kurang)
INSERT INTO `m_subtype` (`id`, `kode`, `label`) VALUES
	(1, '0', '0 - Basic contract'),
	(2, '1', '1 - Increase basic contract'),
	(3, '2', '2 - Comparable domestic pay'),
	(4, '3', '3 - Refund of costs in foreign currency'),
	(5, '4', '4 - Local weighting allowance'),
	(6, '8', '8 - Riwayat Gaji Dasar'),
	(7, '9', '9 - Riwayat Gaji Pokok'),
	(8, 'ST1', 'Grade'),
	(9, 'ST2', 'Grade Phdp');

-- membuang struktur untuk table hrisori.m_suku
CREATE TABLE IF NOT EXISTS `m_suku` (
  `id` int NOT NULL AUTO_INCREMENT,
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Membuang data untuk tabel hrisori.m_suku: ~18 rows (lebih kurang)
INSERT INTO `m_suku` (`id`, `label`) VALUES
	(1, 'ACEH'),
	(2, 'AMBON'),
	(3, 'BALI'),
	(4, 'BANGSA'),
	(5, 'BANJAR'),
	(6, 'BATAK'),
	(7, 'BETAWI'),
	(8, 'BUGIS'),
	(9, 'GORONTALO'),
	(10, 'JAKARTA'),
	(11, 'JAWA'),
	(12, 'MELAYU'),
	(13, 'MINAHASA'),
	(14, 'MINANG'),
	(15, 'PALEMBANG'),
	(16, 'RIAU'),
	(17, 'SUNDA'),
	(18, 'TIMOR');

-- membuang struktur untuk table hrisori.m_tingkat_acara
CREATE TABLE IF NOT EXISTS `m_tingkat_acara` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(3) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_tingkat_acara: ~3 rows (lebih kurang)
INSERT INTO `m_tingkat_acara` (`id`, `kode`, `label`) VALUES
	(1, 'TA1', 'Organisasi Kerja'),
	(2, 'TA2', 'Nasional'),
	(3, 'TA3', 'Internasional');

-- membuang struktur untuk table hrisori.m_tingkat_keahlian
CREATE TABLE IF NOT EXISTS `m_tingkat_keahlian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(3) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  `bobot` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_tingkat_keahlian: ~3 rows (lebih kurang)
INSERT INTO `m_tingkat_keahlian` (`id`, `kode`, `label`, `bobot`) VALUES
	(1, 'TK1', 'Exceed', 3),
	(2, 'TK2', 'Mid', 2),
	(3, 'TK3', 'Below', 1);

-- membuang struktur untuk table hrisori.m_tingkat_pengalaman
CREATE TABLE IF NOT EXISTS `m_tingkat_pengalaman` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_tingkat_pengalaman: ~3 rows (lebih kurang)
INSERT INTO `m_tingkat_pengalaman` (`id`, `kode`, `label`) VALUES
	(1, 'TP1', 'Exceed'),
	(2, 'TP2', 'Mid'),
	(3, 'TP3', 'Below');

-- membuang struktur untuk table hrisori.m_tipe
CREATE TABLE IF NOT EXISTS `m_tipe` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_tipe: ~3 rows (lebih kurang)
INSERT INTO `m_tipe` (`id`, `kode`, `label`) VALUES
	(1, 'TP1', 'Pemimpin Unit'),
	(2, 'TP2', 'Non Pemimpin Unit'),
	(3, 'TP3', 'Fungsional');

-- membuang struktur untuk table hrisori.m_title
CREATE TABLE IF NOT EXISTS `m_title` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(2) DEFAULT '',
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Membuang data untuk tabel hrisori.m_title: ~2 rows (lebih kurang)
INSERT INTO `m_title` (`id`, `kode`, `label`) VALUES
	(1, 'T1', 'Bpk'),
	(2, 'T2', 'Ibu');

-- membuang struktur untuk table hrisori.m_udiklat
CREATE TABLE IF NOT EXISTS `m_udiklat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.m_udiklat: ~10 rows (lebih kurang)
INSERT INTO `m_udiklat` (`id`, `kode`, `label`) VALUES
	(1, '8211', 'Bogor'),
	(2, '8212', 'Jakarta'),
	(3, '8213', 'Semarang'),
	(4, '8214', 'Pandaan'),
	(5, '8215', 'Tuntungan'),
	(6, '8216', 'Makassar'),
	(7, '8217', 'Suralaya'),
	(8, '8218', 'Padang'),
	(9, '8219', 'Banjarbaru'),
	(10, '8220', 'Palembang');

-- membuang struktur untuk table hrisori.natura
CREATE TABLE IF NOT EXISTS `natura` (
  `id` int NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `blthnip` varchar(30) DEFAULT '',
  `cop` double NOT NULL DEFAULT '0',
  `fasilitas_hp` double NOT NULL DEFAULT '0',
  `reimburse_kesehatan` double NOT NULL DEFAULT '0',
  `asuransi_kesehatan` double NOT NULL DEFAULT '0',
  `sarana_kerja` double NOT NULL DEFAULT '0',
  `sppd_manual` double NOT NULL DEFAULT '0',
  `asuransi_purna_jabatan` double NOT NULL DEFAULT '0',
  `medical_checkup` double NOT NULL DEFAULT '0',
  `non_rutin_penyesuaian` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blth_nip` (`blthnip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.natura: 10 rows
/*!40000 ALTER TABLE `natura` DISABLE KEYS */;
INSERT INTO `natura` (`id`, `blth`, `nip`, `blthnip`, `cop`, `fasilitas_hp`, `reimburse_kesehatan`, `asuransi_kesehatan`, `sarana_kerja`, `sppd_manual`, `asuransi_purna_jabatan`, `medical_checkup`, `non_rutin_penyesuaian`) VALUES
	(1, '2023-09', '8206607Z', '2023-09.8206607Z', 0, 0, 1500000, 225500, 0, 0, 0, 0, 0),
	(2, '2023-09', '6793082D', '2023-09.6793082D', 0, 0, 1500000, 0, 0, 0, 0, 0, 0),
	(3, '2023-09', '7191109M', '2023-09.7191109M', 325600473, 0, 0, 0, 0, 0, 0, 0, 0),
	(4, '2023-09', '9419013ZTY', '2023-09.9419013ZTY', 0, 8000000, 0, 225500, 0, 0, 0, 0, 0),
	(5, '2023-09', '7902024F', '2023-09.7902024F', 0, 15000000, 0, 0, 0, 0, 0, 0, 0),
	(6, '2023-10', '7702003R2', '2023-10.7702003R2', 0, 0, 0, 3198000, 0, 0, 0, 0, 0),
	(7, '2023-10', '7191109M', '2023-10.7191109M', 4764000, 30303000, 0, 2398500, 0, 0, 0, 0, 0),
	(8, '2023-10', '6993207Z', '2023-10.6993207Z', 4975500, 48840000, 0, 2398500, 0, 0, 0, 0, 0),
	(9, '2023-10', '8815012HPI', '2023-10.8815012HPI', 0, 0, 0, 1037600, 0, 0, 0, 0, 0),
	(10, '2023-10', '8017001TRK', '2023-10.8017001TRK', 0, 0, 0, 1297000, 0, 0, 0, 0, 0);
/*!40000 ALTER TABLE `natura` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.nodes
CREATE TABLE IF NOT EXISTS `nodes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `grup` varchar(120) DEFAULT '',
  `parentId` varchar(3) DEFAULT '',
  `parentId2` varchar(3) DEFAULT '',
  `parentId3` varchar(3) DEFAULT '',
  `name` varchar(120) NOT NULL DEFAULT '',
  `icon` varchar(120) DEFAULT '',
  `url` varchar(120) DEFAULT '',
  `state` varchar(30) DEFAULT '',
  `urut` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.nodes: 84 rows
/*!40000 ALTER TABLE `nodes` DISABLE KEYS */;
INSERT INTO `nodes` (`id`, `grup`, `parentId`, `parentId2`, `parentId3`, `name`, `icon`, `url`, `state`, `urut`) VALUES
	(227, 'HXMS-API', '0', '', '', 'Export CSV', 'fa fa-database green', 'edata.php', '', 2),
	(226, 'HXMS-API', '0', '', '', 'Rest API', 'fa fa-database green', 'edata2.php', '', 1),
	(225, 'PERPAJAKAN', '0', '', '', 'Beban PPh', 'fa fa-star green', 'bebanpph.php', '', 1),
	(224, 'PAYROLL', '', '184', '', 'Natura', 'fa fa-star green', 'natura.php', '', 8),
	(223, 'KEPEGAWAIAN', '0', '', '', 'Pemberhentian', 'fa fa-user red', 'pemberhentian.php', '', 3),
	(222, 'KEPEGAWAIAN', '0', '', '', 'Pengangkatan', 'fa fa-user green', 'pengangkatan.php', '', 2),
	(237, 'PAYROLL', '', '194', '', 'Laporan Payroll', 'fa fa-star green', 'lappay.php', '', 3),
	(238, 'SPPD', '', '139', '', 'SPPD Siap Bayar', 'fa fa-credit-card blue', 'siapbayar.php', '', 3),
	(239, 'MASTER', '0', '', '', 'Data Vendor', 'fa fa-database green', 'vendor.php', '', 3),
	(213, 'SPPD', '', '139', '', 'Validasi SPPD', 'fa fa-credit-card blue', 'valsppd.php', '', 2),
	(212, 'ABSENSI', '', '161', '', 'Pengaturan Absensi', 'fa fa-cog red', 'device.php', '', 1),
	(211, 'SPPD', '', '139', '', 'Restitusi', 'fa fa-credit-card blue', 'restitusi.php', '', 4),
	(210, 'SPPD', '', '139', '', 'Pembayaran SPPD', 'fa fa-credit-card blue', 'sppdbayar.php', '', 5),
	(167, 'PERPAJAKAN', '0', '', '', 'Pengaturan KPP', 'fa fa-cog red', 'kpp.php', '', 6),
	(166, 'PERPAJAKAN', '0', '', '', 'Kartu Penghailan', 'fa fa-star green', 'kartupenghasilan.php', '', 5),
	(165, 'PERPAJAKAN', '0', '', '', 'SPT Tahunan', 'fa fa-star green', 'spt.php', '', 3),
	(144, 'SPPD', '', '142', '', 'Bantuan Mutasi', 'fa fa-plane blue', 'mbantuan.php', '', 2),
	(143, 'SPPD', '', '142', '', 'Biaya SPPD', 'fa fa-plane blue', 'mbiaya.php', '', 1),
	(139, 'SPPD', '0', '', '', 'DATA SPPD', 'fa', '', 'opened', 1),
	(198, 'PAYROLL', '', '194', '', 'Lock Payroll', 'fa fa-star green', 'lockpayroll.php', '', 4),
	(148, 'CUTI', '0', '', '', 'DATA CUTI', 'fa', '', 'opened', 1),
	(196, 'PAYROLL', '', '194', '', 'Proses Payroll', 'fa fa-star green', 'payroll.php', '', 2),
	(149, 'CUTI', '', '148', '', 'Rincian Cuti', 'fa fa-calendar-minus blue', 'rcuti.php', '', 2),
	(150, 'CUTI', '', '148', '', 'Sisa Cuti Tahunan', 'fa fa-calendar-minus blue', 'mcuti.php', '', 3),
	(152, 'CUTI', '', '151', '', 'Rincian Izin', 'fa fa-calendar-minus blue', 'rijin.php', '', 5),
	(240, 'PEGAWAI', '0', '', '', 'Pengaturan Email & Telp', 'fa fa-envelope red', 'settingemail.php', '', 4),
	(140, 'SPPD', '', '139', '', 'Rincian SPPD', 'fa fa-plane blue', 'sppd.php', '', 1),
	(114, 'DASHBOARD', '0', '', '', 'pendidikan', 'fa fa-tachometer-alt blue', 'd_pendidikan.php', '', 6),
	(112, 'DASHBOARD', '0', '', '', 'Jenjang Jabatan', 'fa fa-tachometer-alt blue', 'd_jenjang_jabatan.php', '', 5),
	(111, 'DASHBOARD', '0', '', '', 'Jenis Kelamin', 'fa fa-tachometer-alt blue', 'd_jenis_kelamin.php', '', 4),
	(203, 'KEPEGAWAIAN', '0', '', '', 'Pos.Management', 'fa fa-user green', 'pmanagement.php', '', 4),
	(200, 'PAYROLL', '', '199', '', 'Kartu', 'fa fa-star green', 'kpenghasilan.php', '', 1),
	(195, 'PAYROLL', '', '194', '', 'Master Gaji', 'fa fa-star green', 'mgaji.php', '', 1),
	(163, 'KONSUMSI', '0', '', '', 'Pengajuan Konsumsi', 'fa fa-glass-cheers blue', 'konsumsi.php', '', 1),
	(161, 'ABSENSI', '0', '', '', 'Setting', 'fa', '', 'opened', 7),
	(162, 'ABSENSI', '', '161', '', 'Libur Nasional', 'fa fa-calendar-alt red', 'libur.php', '', 2),
	(160, 'ABSENSI', '', '155', '', 'Monitoring Izin', 'fa fa-calendar-minus blue', 'monizin.php', '', 6),
	(159, 'ABSENSI', '', '155', '', 'Monitoring Cuti', 'fa fa-calendar-minus blue', 'moncuti.php', '', 5),
	(158, 'ABSENSI', '', '155', '', 'Monitoring SPPD', 'fa fa-plane blue', 'monsppd.php', '', 4),
	(157, 'ABSENSI', '', '155', '', 'Rekap Absensi', 'fa fa-clock blue', 'rekapabsen.php', '', 3),
	(156, 'ABSENSI', '', '155', '', 'Absensi Harian', 'fa fa-clock blue', 'absensih.php', '', 2),
	(155, 'ABSENSI', '0', '', '', 'Monitoring', 'fa', '', 'opened', 1),
	(189, 'PAYROLL', '', '184', '', 'IKS', 'fa fa-star green', 'tiks.php', '', 5),
	(191, 'PAYROLL', '', '184', '', 'Tunj. Winduan', 'fa fa-star green', 'twinduan.php', '', 7),
	(190, 'PAYROLL', '', '184', '', 'IKP', 'fa fa-star green', 'tikp.php', '', 6),
	(151, 'CUTI', '0', '', '', 'DATA IZIN', 'fa', '', 'opened', 4),
	(185, 'PAYROLL', '', '184', '', 'Pend. Mutasi', 'fa fa-star green', 'pmutasi.php', '', 1),
	(184, 'PAYROLL', '0', '', '', 'NON RUTIN', 'fa', '', 'opened', 2),
	(199, 'PAYROLL', '0', '', '', 'PENGHASILAN', 'fa', '', 'opened', 3),
	(186, 'PAYROLL', '', '184', '', 'Suplisi', 'fa fa-star green', 'suplisi.php', '', 2),
	(194, 'PAYROLL', '0', '', '', 'PAYROLL', 'fa', '', 'opened', 1),
	(187, 'PAYROLL', '', '184', '', 'THR', 'fa fa-star green', 'thr.php', '', 3),
	(188, 'PAYROLL', '', '184', '', 'Tunj. Cuti', 'fa fa-star green', 'tcuti.php', '', 4),
	(168, 'KEPEGAWAIAN', '0', '', '', 'Data Master', 'fa fa-database green', 'master.php', '', 5),
	(58, 'ADMIN', '0', '', '', 'User Role', 'fa fa-user blue', 'masteruser.php', '', 1),
	(201, 'PAYROLL', '', '199', '', 'Rekap', 'fa fa-star green', 'rpenghasilan.php', '', 2),
	(153, 'CUTI', '', '151', '', 'Rekapitulasi Izin', 'fa fa-calendar-minus blue', 'mijin.php', '', 6),
	(164, 'PERPAJAKAN', '0', '', '', 'SPT Masa', 'fa fa-star green', 'sptmasa.php', '', 2),
	(27, 'KEPEGAWAIAN', '0', '', '', 'Personal Data', 'fa fa-user green', 'kepegawaian.php', '', 1),
	(142, 'SPPD', '0', '', '', 'DATA MASTER', 'fa', '', 'opened', 3),
	(141, 'SPPD', '', '139', '', 'Pembayaran Resitusi', 'fa fa-credit-card blue', 'restitusibayar.php', '', 6),
	(10, 'DASHBOARD', '0', '', '', 'Status Pegawai', 'fa fa-tachometer-alt blue', 'd_status.php', '', 2),
	(11, 'DASHBOARD', '0', '', '', 'Jenis Jabatan', 'fa fa-tachometer-alt blue', 'd_level_jabatan.php', '', 3),
	(5, 'DASHBOARD', '0', '', '', 'Berdasarkan Unit', 'fa fa-tachometer-alt blue', 'd_unit.php', '', 1),
	(228, 'SAP-API', '0', '', '', 'Lumpsum SPPD', 'fa fa-database green', 'apinvoice1.php', '', 1),
	(229, 'SAP-API', '0', '', '', 'Restitusi SPPD', 'fa fa-database green', 'apinvoice2.php', '', 2),
	(230, 'SAP-API', '0', '', '', 'Payroll', 'fa fa-database green', 'apinvoice3.php', '', 3),
	(231, 'PEGAWAI', '0', '', '', 'Data Pegawai', 'fa fa-user green', 'pegawai.php', '', 1),
	(232, 'PEGAWAI', '0', '', '', 'Pegawai Non Aktif', 'fa fa-user red', 'nonaktif.php', '', 2),
	(233, 'PEGAWAI', '0', '', '', 'Restore Pegawai', 'fa fa-user blue', 'restore.php', '', 3),
	(234, 'PERPAJAKAN', '0', '', '', 'SPT Tahunan Manual', 'fa fa-star green', 'sptmanual.php', '', 4),
	(235, 'MASTER', '0', '', '', 'Data Project', 'fa fa-database green', 'project.php', '', 1),
	(236, 'MASTER', '0', '', '', 'Master Penempatan', 'fa fa-database green', 'mpenempatan.php', '', 2),
	(241, 'SPPD', '0', '', '', 'APPROVAL', 'fa', '', 'opened', 2),
	(242, 'SPPD', '', '241', '', 'Monitoring Approval', 'fa fa-check-circle red', 'dataapproval.php', '', 1),
	(243, 'PAYROLL', '', '184', '', 'Pesangon', 'fa fa-star green', 'tpesangon.php', '', 9),
	(244, 'PERPAJAKAN', '0', '', '', 'Master Mapping', 'fa fa-database green', 'mapping.php', '', 7),
	(245, 'PERPAJAKAN', '0', '', '', 'Mapping Pajak', 'fa fa-cog red', 'mappingpajak.php', '', 8),
	(246, 'ABSENSI', '', '155', '', 'Rekap Kehadiran', 'fa fa-clock blue', 'rekapkehadiran.php', '', 3),
	(247, 'SPPD', '', '142', '', 'Master Kota', 'fa fa-plane blue', 'mkota.php', '', 3),
	(248, 'PERPAJAKAN', '0', '', '', 'List Pajak Tanpa PTKP', 'fa fa-database green', 'tanpaptkp.php', '', 9),
	(249, 'PERPAJAKAN', '0', '', '', 'Netto & PPh Mutasi Masuk', 'fa fa-database green', 'datamutasi.php', '', 11),
	(250, 'PERPAJAKAN', '0', '', '', 'Netto & PPh Mutasi Keluar', 'fa fa-database green', 'datamutasi2.php', '', 11),
	(251, 'PAYROLL', '', '184', '', 'Tantiem', 'fa fa-star green', 'tantiem.php', '', 10);
/*!40000 ALTER TABLE `nodes` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.nonaktif
CREATE TABLE IF NOT EXISTS `nonaktif` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '3',
  `tgl_berhenti` varchar(10) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `tgl_update` varchar(60) DEFAULT '',
  `petugas` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.nonaktif: 10 rows
/*!40000 ALTER TABLE `nonaktif` DISABLE KEYS */;
INSERT INTO `nonaktif` (`id`, `nip`, `aktif`, `tgl_berhenti`, `keterangan`, `tgl_update`, `petugas`) VALUES
	(1, '6594245B', '3', '2018-12-31', '-', '2020-05-08 21:09:09', 'sandy'),
	(2, '6694015W', '3', '2018-12-31', '-', '2020-05-08 21:09:41', 'sandy'),
	(3, '7810024TRK', '6', '2019-01-01', 'TK KE PCN', '2020-05-12 09:20:56', 'hary'),
	(4, '8916003HPI', '4', '2020-05-01', 'KEMBALI KE PCN', '2020-05-13 08:48:15', 'hary'),
	(5, '8912369HPI', '4', '2020-01-01', 'KEMBALI KE PCN', '2020-05-13 08:48:40', 'hary'),
	(6, '8610006TRK', '2', '2018-12-31', 'RESIGN', '2020-05-13 08:49:23', 'hary'),
	(7, '8005005TRK', '6', '2019-01-01', 'TK KE PCN', '2020-05-13 08:50:00', 'hary'),
	(8, '5310440HPI', '4', '2020-01-01', 'KEMBALI KE PCN', '2020-05-13 08:50:47', 'hary'),
	(9, '6810034TRK', '2', '2018-01-31', 'RESIGN', '2020-05-13 08:51:27', 'hary'),
	(10, '7610020TRK', '2', '2018-12-31', '-', '2020-05-13 08:52:02', 'hary');
/*!40000 ALTER TABLE `nonaktif` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel hrisori.password_reset_tokens: ~0 rows (lebih kurang)

-- membuang struktur untuk table hrisori.pejabat_laporan
CREATE TABLE IF NOT EXISTS `pejabat_laporan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.pejabat_laporan: 1 rows
/*!40000 ALTER TABLE `pejabat_laporan` DISABLE KEYS */;
INSERT INTO `pejabat_laporan` (`id`, `nama`, `jabatan`, `aktif`) VALUES
	(1, 'ZUL', 'DIREKTUR KEUANGAN DAN ADMINISTRASI', '1');
/*!40000 ALTER TABLE `pejabat_laporan` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.pejabat_sdm
CREATE TABLE IF NOT EXISTS `pejabat_sdm` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(120) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.pejabat_sdm: 2 rows
/*!40000 ALTER TABLE `pejabat_sdm` DISABLE KEYS */;
INSERT INTO `pejabat_sdm` (`id`, `nama`, `jabatan`) VALUES
	(1, 'YAINUS SHOLEH', 'VP Adm. SDM & Talenta'),
	(2, 'AL KAUTSAR', 'PLT MANAGER ADMINISTRASI SDM DAN UMUM');
/*!40000 ALTER TABLE `pejabat_sdm` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.pendapatan_mutasi
CREATE TABLE IF NOT EXISTS `pendapatan_mutasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(60) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `niptahun` varchar(60) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `netto` double NOT NULL DEFAULT '0',
  `pph21` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.pendapatan_mutasi: 8 rows
/*!40000 ALTER TABLE `pendapatan_mutasi` DISABLE KEYS */;
INSERT INTO `pendapatan_mutasi` (`id`, `nip`, `tahun`, `niptahun`, `blth_awal`, `blth_akhir`, `netto`, `pph21`) VALUES
	(1, '6793082D', '2019', '2019.6793082D', '2019-01', '2019-07', 414813860, 72472835),
	(2, '6610430HPI', '2019', '2019.6610430HPI', '2019-01', '2019-06', 153257712, 8538550),
	(3, '7602004ICP', '2020', '2020.7602004ICP', '2020-01', '2020-07', 490119020, 60189778),
	(4, '6691029E', '2020', '2020.6691029E', '2020-01', '2020-06', 202875170, 27825650),
	(5, '8106323Z', '2020', '2020.8106323Z', '2020-01', '2020-06', 175090783, 19713618),
	(6, '8611098Z', '2020', '2020.8611098Z', '2020-01', '2020-08', 170459533, 15485597),
	(7, '9418045ZY', '2020', '2020.9418045ZY', '2020-01', '2020-11', 129192071, 7051609),
	(8, '8207216Z', '2020', '2020.8207216Z', '2020-01', '2020-07', 158927566, 15016220);
/*!40000 ALTER TABLE `pendapatan_mutasi` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.pengikut_sppd
CREATE TABLE IF NOT EXISTS `pengikut_sppd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idsppd` varchar(60) DEFAULT '',
  `nama` varchar(120) DEFAULT '',
  `hubungan` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.pengikut_sppd: 11 rows
/*!40000 ALTER TABLE `pengikut_sppd` DISABLE KEYS */;
INSERT INTO `pengikut_sppd` (`id`, `idsppd`, `nama`, `hubungan`) VALUES
	(2, '2020000002', 'Putri Ayu Kresnawaty', 'istri'),
	(3, '2020000002', 'M. AbiyyiQois Sussanto', 'anak'),
	(4, '2020000002', 'M. Alkhalifi Dzikri Hady', 'anak'),
	(5, '2021000113', 'FITRIA', 'istri'),
	(6, '2021000113', 'SHOFIYAH', 'anak'),
	(7, '2021000113', 'ZHAFIRA', 'anak'),
	(8, '2021000095', 'A SRIWAHYUNI', 'istri'),
	(9, '2021000095', 'SYAFWAN ALFURQON', 'anak'),
	(10, '2021000156', 'JENIFER PUTRI', 'istri');
/*!40000 ALTER TABLE `pengikut_sppd` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.penilaian_iks
CREATE TABLE IF NOT EXISTS `penilaian_iks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` varchar(4) DEFAULT '',
  `semester` varchar(1) DEFAULT '1',
  `nip` varchar(30) DEFAULT '',
  `nipsemester` varchar(60) DEFAULT '',
  `grade` varchar(60) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_pegawai` varchar(10) DEFAULT '',
  `jumlah_bulan` double NOT NULL DEFAULT '0',
  `nki` double NOT NULL DEFAULT '0',
  `simbol_nki` varchar(10) DEFAULT '',
  `nsk` double NOT NULL DEFAULT '0',
  `simbol_nsk` varchar(10) DEFAULT '',
  `simbol_kinerja` varchar(2) DEFAULT '',
  `nsk_rata` double NOT NULL DEFAULT '0',
  `nko` double NOT NULL DEFAULT '0',
  `nkk` double NOT NULL DEFAULT '0',
  `a` double NOT NULL DEFAULT '0',
  `b` double NOT NULL DEFAULT '0',
  `c` double NOT NULL DEFAULT '0',
  `iki` double NOT NULL DEFAULT '0',
  `isk` double NOT NULL DEFAULT '0',
  `nsk_a` double NOT NULL DEFAULT '0',
  `nko_b` double NOT NULL DEFAULT '0',
  `nkk_c` double NOT NULL DEFAULT '0',
  `phi` double NOT NULL DEFAULT '0',
  `jks` double NOT NULL DEFAULT '0',
  `jtmk` double NOT NULL DEFAULT '0',
  `jkp` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.penilaian_iks: 0 rows
/*!40000 ALTER TABLE `penilaian_iks` DISABLE KEYS */;
/*!40000 ALTER TABLE `penilaian_iks` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.perhitungan_pajak_khusus
CREATE TABLE IF NOT EXISTS `perhitungan_pajak_khusus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.perhitungan_pajak_khusus: 8 rows
/*!40000 ALTER TABLE `perhitungan_pajak_khusus` DISABLE KEYS */;
INSERT INTO `perhitungan_pajak_khusus` (`id`, `nip`) VALUES
	(2, '6692071Z'),
	(3, '6692077Z'),
	(1, '6793121Z'),
	(6, '6794003E'),
	(7, '6993227Z'),
	(4, '7393043P'),
	(5, '9014113ZY'),
	(8, 'KOM23001');
/*!40000 ALTER TABLE `perhitungan_pajak_khusus` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.perhitungan_pajak_pesangon
CREATE TABLE IF NOT EXISTS `perhitungan_pajak_pesangon` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.perhitungan_pajak_pesangon: ~0 rows (lebih kurang)
INSERT INTO `perhitungan_pajak_pesangon` (`id`, `nip`) VALUES
	(1, '6811001TRK');

-- membuang struktur untuk table hrisori.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` char(64) NOT NULL,
  `abilities` text,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `token` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.personal_access_tokens: ~0 rows (lebih kurang)

-- membuang struktur untuk table hrisori.pertanyaan
CREATE TABLE IF NOT EXISTS `pertanyaan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pertanyaan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.pertanyaan: ~0 rows (lebih kurang)

-- membuang struktur untuk table hrisori.pesangon
CREATE TABLE IF NOT EXISTS `pesangon` (
  `id` int NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `nipblth` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '',
  `uang_pesangon` double NOT NULL DEFAULT '0',
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.pesangon: ~3 rows (lebih kurang)
INSERT INTO `pesangon` (`id`, `blth`, `nip`, `nipblth`, `uang_pesangon`, `tgl_proses`, `petugas`) VALUES
	(2, '2024-07', '6811001TRK', '2024-07.6811001TRK', 99345907, '2024-08-08', '9219008ZTY'),
	(3, '2024-08', '6220002PRO', '2024-08.6220002PRO', 39500000, '2024-09-09', '9219008ZTY'),
	(4, '2024-12', '6805003TRK', '2024-12.6805003TRK', 238977921, '2024-12-27', '9219008ZTY');

-- membuang struktur untuk table hrisori.pph
CREATE TABLE IF NOT EXISTS `pph` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int NOT NULL DEFAULT '0',
  `gaji` double NOT NULL DEFAULT '0',
  `tunjangan_pph` double NOT NULL DEFAULT '0',
  `tunjangan_variable` double NOT NULL DEFAULT '0',
  `honorarium` double NOT NULL DEFAULT '0',
  `benefit` double NOT NULL DEFAULT '0',
  `natuna` double NOT NULL DEFAULT '0',
  `beban_pph21` double NOT NULL DEFAULT '0',
  `bonus_thr` double NOT NULL DEFAULT '0',
  `brutob` double NOT NULL DEFAULT '0',
  `biaya_jabatanb` double NOT NULL DEFAULT '0',
  `iuran_pensiunb` double NOT NULL DEFAULT '0',
  `brutot` double NOT NULL DEFAULT '0',
  `biaya_jabatant` double NOT NULL DEFAULT '0',
  `iuran_pensiunt` double NOT NULL DEFAULT '0',
  `biaya_pengurangt` double NOT NULL DEFAULT '0',
  `nettot` double NOT NULL DEFAULT '0',
  `nettot_sebelumnya` double NOT NULL DEFAULT '0',
  `nettot_akhir` double NOT NULL DEFAULT '0',
  `ptkp` double NOT NULL DEFAULT '0',
  `pkp` double NOT NULL DEFAULT '0',
  `ppht` double NOT NULL DEFAULT '0',
  `ppht_sebelumnya` double NOT NULL DEFAULT '0',
  `ppht_terutang` double NOT NULL DEFAULT '0',
  `pph_sistem` double NOT NULL DEFAULT '0',
  `pph_koreksi` double NOT NULL DEFAULT '0',
  `pphb_terutang` double NOT NULL DEFAULT '0',
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.pph: 9 rows
/*!40000 ALTER TABLE `pph` DISABLE KEYS */;
INSERT INTO `pph` (`id`, `kpp`, `no_urut`, `nip`, `status`, `tahun`, `blth`, `blthnip`, `blth_awal`, `blth_akhir`, `masa_kerja`, `gaji`, `tunjangan_pph`, `tunjangan_variable`, `honorarium`, `benefit`, `natuna`, `beban_pph21`, `bonus_thr`, `brutob`, `biaya_jabatanb`, `iuran_pensiunb`, `brutot`, `biaya_jabatant`, `iuran_pensiunt`, `biaya_pengurangt`, `nettot`, `nettot_sebelumnya`, `nettot_akhir`, `ptkp`, `pkp`, `ppht`, `ppht_sebelumnya`, `ppht_terutang`, `pph_sistem`, `pph_koreksi`, `pphb_terutang`, `tgl_proses`, `petugas`) VALUES
	(1, 'BALIKPAPAN', '00000130', 'KOMDIT03', 'K0', '2019', '2019-12', '2019-12.KOMDIT03.BALIKPAPAN', '2019-01', '2019-12', 12, 21000000, 0, 48000000, 85000000, 0, 0, 0, 10500000, 0, 0, 0, 164500000, 6000000, 0, 6000000, 158500000, 0, 158500000, 58500000, 100000000, 10000000, 7438968, 2561032, 2561032, 0, 2561032, '2020-04-24', 'priska'),
	(2, 'BALIKPAPAN', '00000129', 'KOMDIT02', 'K0', '2019', '2019-12', '2019-12.KOMDIT02.BALIKPAPAN', '2019-01', '2019-12', 12, 22000000, 0, 0, 80000000, 0, 0, 0, 11000000, 0, 0, 0, 113000000, 5650000, 0, 5650000, 107350000, 0, 107350000, 58500000, 48850000, 2442500, 2283586, 158914, 158914, 0, 158914, '2020-04-24', 'priska'),
	(3, 'BALIKPAPAN', '00000126', 'KOM02', 'K0', '2019', '2019-12', '2019-12.KOM02.BALIKPAPAN', '2019-01', '2019-12', 12, 0, 0, 86040000, 341750000, 0, 0, 0, 172090000, 0, 0, 0, 599880000, 6000000, 0, 6000000, 593880000, 0, 593880000, 67500000, 526380000, 102914000, 57363000, 45551000, 45551000, 0, 45551000, '2020-04-24', 'priska'),
	(4, 'BALIKPAPAN', '00000127', 'KOM03', 'K0', '2019', '2019-12', '2019-12.KOM03.BALIKPAPAN', '2019-01', '2019-12', 12, 0, 0, 1000000, 102000000, 0, 0, 0, 8000000, 0, 0, 0, 111000000, 5550000, 0, 5550000, 105450000, 0, 105450000, 58500000, 46950000, 2347500, 2711802, 0, 0, 0, 0, '2020-04-24', 'priska'),
	(5, 'BALIKPAPAN', '00000128', 'KOMDIT01', 'TK0', '2019', '2019-12', '2019-12.KOMDIT01.BALIKPAPAN', '2019-01', '2019-12', 12, 22000000, 0, 0, 80000000, 0, 0, 0, 8000000, 0, 0, 0, 110000000, 5500000, 0, 5500000, 104500000, 0, 104500000, 67500000, 37000000, 1850000, 2494886, 0, 0, 0, 0, '2020-04-24', 'priska'),
	(6, 'BALIKPAPAN', '00000125', 'KOM01', 'K1', '2019', '2019-12', '2019-12.KOM01.BALIKPAPAN', '2019-01', '2019-10', 10, 0, 0, 78000000, 315000000, 0, 0, 0, 223200000, 0, 0, 0, 616200000, 6000000, 0, 6000000, 610200000, 0, 610200000, 63000000, 547200000, 109160000, 55995000, 53165000, 53165000, 0, 53165000, '2020-04-24', 'priska'),
	(7, 'BALIKPAPAN', '00000124', 'HONOR3', 'K0', '2019', '2019-12', '2019-12.HONOR3.BALIKPAPAN', '2019-10', '2019-12', 3, 22000000, 0, 11250000, 11000000, 0, 0, 0, 0, 0, 0, 0, 44250000, 2212500, 0, 2212500, 42037500, 0, 42037500, 58500000, 0, 0, 4246470, 0, 0, 0, 0, '2020-04-24', 'priska'),
	(8, 'BALIKPAPAN', '00000123', 'HONOR09', 'TK0', '2019', '2019-12', '2019-12.HONOR09.BALIKPAPAN', '2019-12', '2019-12', 1, 6500000, 0, 1500000, 0, 707850, 0, 0, 0, 0, 0, 0, 8707850, 435393, 195000, 630393, 8077457, 0, 8077457, 54000000, 0, 0, 185711, 0, 0, 0, 0, '2020-04-24', 'priska'),
	(9, 'BALIKPAPAN', '00000122', 'HONOR08', 'K0', '2019', '2019-12', '2019-12.HONOR08.BALIKPAPAN', '2019-10', '2019-12', 3, 16000000, 0, 7500000, 8000000, 0, 0, 0, 0, 0, 0, 0, 31500000, 1575000, 0, 1575000, 29925000, 0, 29925000, 58500000, 0, 0, 2042352, 0, 0, 0, 0, '2020-04-24', 'priska');
/*!40000 ALTER TABLE `pph` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.pphlock
CREATE TABLE IF NOT EXISTS `pphlock` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int NOT NULL DEFAULT '0',
  `gaji` double NOT NULL DEFAULT '0',
  `tunjangan_pph` double NOT NULL DEFAULT '0',
  `tunjangan_variable` double NOT NULL DEFAULT '0',
  `honorarium` double NOT NULL DEFAULT '0',
  `benefit` double NOT NULL DEFAULT '0',
  `natuna` double NOT NULL DEFAULT '0',
  `beban_pph21` double NOT NULL DEFAULT '0',
  `bonus_thr` double NOT NULL DEFAULT '0',
  `brutob` double NOT NULL DEFAULT '0',
  `biaya_jabatanb` double NOT NULL DEFAULT '0',
  `iuran_pensiunb` double NOT NULL DEFAULT '0',
  `brutot` double NOT NULL DEFAULT '0',
  `biaya_jabatant` double NOT NULL DEFAULT '0',
  `iuran_pensiunt` double NOT NULL DEFAULT '0',
  `biaya_pengurangt` double NOT NULL DEFAULT '0',
  `nettot` double NOT NULL DEFAULT '0',
  `nettot_sebelumnya` double NOT NULL DEFAULT '0',
  `nettot_akhir` double NOT NULL DEFAULT '0',
  `ptkp` double NOT NULL DEFAULT '0',
  `pkp` double NOT NULL DEFAULT '0',
  `ppht` double NOT NULL DEFAULT '0',
  `ppht_sebelumnya` double NOT NULL DEFAULT '0',
  `ppht_terutang` double NOT NULL DEFAULT '0',
  `pph_sistem` double NOT NULL DEFAULT '0',
  `pph_koreksi` double NOT NULL DEFAULT '0',
  `pphb_terutang` double NOT NULL DEFAULT '0',
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.pphlock: 0 rows
/*!40000 ALTER TABLE `pphlock` DISABLE KEYS */;
/*!40000 ALTER TABLE `pphlock` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.pphmanual
CREATE TABLE IF NOT EXISTS `pphmanual` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int NOT NULL DEFAULT '0',
  `gaji` double NOT NULL DEFAULT '0',
  `tunjangan_pph` double NOT NULL DEFAULT '0',
  `tunjangan_variable` double NOT NULL DEFAULT '0',
  `honorarium` double NOT NULL DEFAULT '0',
  `benefit` double NOT NULL DEFAULT '0',
  `natuna` double NOT NULL DEFAULT '0',
  `bonus_thr` double NOT NULL DEFAULT '0',
  `brutob` double NOT NULL DEFAULT '0',
  `biaya_jabatanb` double NOT NULL DEFAULT '0',
  `iuran_pensiunb` double NOT NULL DEFAULT '0',
  `brutot` double NOT NULL DEFAULT '0',
  `biaya_jabatant` double NOT NULL DEFAULT '0',
  `iuran_pensiunt` double NOT NULL DEFAULT '0',
  `biaya_pengurangt` double NOT NULL DEFAULT '0',
  `nettot` double NOT NULL DEFAULT '0',
  `nettot_sebelumnya` double NOT NULL DEFAULT '0',
  `nettot_akhir` double NOT NULL DEFAULT '0',
  `ptkp` double NOT NULL DEFAULT '0',
  `pkp` double NOT NULL DEFAULT '0',
  `ppht` double NOT NULL DEFAULT '0',
  `ppht_sebelumnya` double NOT NULL DEFAULT '0',
  `ppht_terutang` double NOT NULL DEFAULT '0',
  `pph_sistem` double NOT NULL DEFAULT '0',
  `pph_koreksi` double NOT NULL DEFAULT '0',
  `pphb_terutang` double NOT NULL DEFAULT '0',
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.pphmanual: 9 rows
/*!40000 ALTER TABLE `pphmanual` DISABLE KEYS */;
INSERT INTO `pphmanual` (`id`, `kpp`, `no_urut`, `nip`, `status`, `tahun`, `blth`, `blthnip`, `blth_awal`, `blth_akhir`, `masa_kerja`, `gaji`, `tunjangan_pph`, `tunjangan_variable`, `honorarium`, `benefit`, `natuna`, `bonus_thr`, `brutob`, `biaya_jabatanb`, `iuran_pensiunb`, `brutot`, `biaya_jabatant`, `iuran_pensiunt`, `biaya_pengurangt`, `nettot`, `nettot_sebelumnya`, `nettot_akhir`, `ptkp`, `pkp`, `ppht`, `ppht_sebelumnya`, `ppht_terutang`, `pph_sistem`, `pph_koreksi`, `pphb_terutang`, `tgl_proses`, `petugas`) VALUES
	(1, 'BALIKPAPAN', '00000181', '65180000', 'K2', '2022', '2022-12', '2022-12.65180000', '2022-07', '2022-07', 1, 0, 0, 0, 0, 0, 0, 3426470, 0, 0, 0, 3426470, 171324, 0, 171324, 3255146, 0, 3255146, 67500000, 0, 0, 0, 0, 0, 0, 0, '2023-01-04', 'sani'),
	(2, 'TARAKAN', '00000004', '8319006PCN', 'K0', '2022', '2022-12', '2022-12.8319006PCN', '2022-01', '2022-12', 12, 54696953, 0, 22393595, 0, 4454387, 0, 66044684, 0, 0, 0, 147589619, 6000000, 2400000, 8400000, 139189619, 0, 139189619, 58500000, 80689000, 6103350, 0, 6103350, 6103350, 0, 6103350, '2023-01-04', 'sani'),
	(3, 'TARAKAN', '00000003', '7119005PCN', 'K0', '2022', '2022-12', '2022-12.7119005PCN', '2022-01', '2022-12', 12, 54696953, 0, 22393595, 0, 4454387, 0, 68057876, 0, 0, 0, 149602811, 6000000, 2400000, 8400000, 141202811, 0, 141202811, 58500000, 82702000, 6405300, 0, 6405300, 6405300, 0, 6405300, '2023-01-04', 'sani'),
	(4, 'TARAKAN', '00000002', '7210013TRK', 'K1', '2022', '2022-12', '2022-12.7210013TRK', '2022-01', '2022-12', 12, 82155708, 0, 56258964, 0, 7378346, 0, 114654888, 0, 0, 0, 260447906, 6000000, 2400000, 8400000, 252047906, 0, 252047906, 63000000, 189047000, 22357050, 0, 22357050, 22357050, 0, 22357050, '2023-01-04', 'sani'),
	(5, 'TARAKAN', '00000001', '6610023TRK', 'K2', '2022', '2022-12', '2022-12.6610023TRK', '2022-01', '2022-10', 10, 73013859, 0, 21702047, 0, 5355500, 0, 112543624, 0, 0, 0, 212615030, 5000000, 2400000, 7400000, 205215030, 0, 205215030, 67500000, 137715000, 14657250, 0, 14657250, 14657250, 0, 14657250, '2023-01-04', 'sani'),
	(6, 'BALIKPAPAN', '00000180', '9720012ZTY', 'TK0', '2022', '2022-12', '2022-12.9720012ZTY', '2022-01', '2022-12', 12, 57252000, 0, 30599000, 0, 4716492, 0, 72437728, 0, 0, 0, 165005220, 6000000, 2400000, 8400000, 156605220, 0, 156605220, 54000000, 102605000, 9390750, 0, 9390750, 9390750, 0, 9390750, '2023-01-04', 'sani'),
	(7, 'BALIKPAPAN', '00000179', '7702003R2', 'K3', '2022', '2022-12', '2022-12.7702003R2', '2022-01', '2022-12', 12, 0, 0, 304624500, 939133125, 16114596, 0, 61582500, 0, 0, 0, 1321454721, 6000000, 2400000, 8400000, 1313054721, 0, 1313054721, 72000000, 1241054000, 316316200, 0, 316316200, 316316200, 0, 316316200, '2023-01-04', 'sani'),
	(8, 'BALIKPAPAN', '00000178', '6606268HPI', 'TK0', '2022', '2022-12', '2022-12.6606268HPI', '2022-01', '2022-09', 9, 33720669, 0, 28815584, 19551084, 19551084, 0, 84477203, 0, 0, 0, 186115624, 4500000, 2400000, 6900000, 179215624, 0, 179215624, 54000000, 125215000, 12782250, 0, 12782250, 12782250, 0, 12782250, '2023-01-04', 'sani'),
	(9, 'BALIKPAPAN', '00000177', '7510005TRK', 'K3', '2022', '2022-12', '2022-12.7510005TRK', '2022-01', '2022-12', 12, 137242800, 0, 110344400, 0, 11403482, 0, 200563078, 0, 0, 0, 459553760, 6000000, 2400000, 8400000, 451153760, 0, 451153760, 72000000, 379153000, 63788250, 0, 63788250, 63788250, 0, 63788250, '2023-01-04', 'sani');
/*!40000 ALTER TABLE `pphmanual` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.pph_bulan
CREATE TABLE IF NOT EXISTS `pph_bulan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(60) DEFAULT '',
  `kpp` varchar(60) DEFAULT '',
  `npwp` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int NOT NULL DEFAULT '0',
  `gaji` double NOT NULL DEFAULT '0',
  `tunjangan_pph` double NOT NULL DEFAULT '0',
  `tunjangan_variable` double NOT NULL DEFAULT '0',
  `honorarium` double NOT NULL DEFAULT '0',
  `benefit` double NOT NULL DEFAULT '0',
  `natuna` double NOT NULL DEFAULT '0',
  `bonus_thr` double NOT NULL DEFAULT '0',
  `brutob` double NOT NULL DEFAULT '0',
  `biaya_jabatanb` double NOT NULL DEFAULT '0',
  `iuran_pensiunb` double NOT NULL DEFAULT '0',
  `brutot` double NOT NULL DEFAULT '0',
  `biaya_jabatant` double NOT NULL DEFAULT '0',
  `iuran_pensiunt` double NOT NULL DEFAULT '0',
  `biaya_pengurangt` double NOT NULL DEFAULT '0',
  `nettot` double NOT NULL DEFAULT '0',
  `nettot_sebelumnya` double NOT NULL DEFAULT '0',
  `nettot_akhir` double NOT NULL DEFAULT '0',
  `ptkp` double NOT NULL DEFAULT '0',
  `pkp` double NOT NULL DEFAULT '0',
  `ppht` double NOT NULL DEFAULT '0',
  `ppht_sebelumnya` double NOT NULL DEFAULT '0',
  `ppht_terutang` double NOT NULL DEFAULT '0',
  `pphb_terutang` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.pph_bulan: 8 rows
/*!40000 ALTER TABLE `pph_bulan` DISABLE KEYS */;
INSERT INTO `pph_bulan` (`id`, `nip`, `kpp`, `npwp`, `status`, `tahun`, `blth`, `blth_awal`, `blth_akhir`, `masa_kerja`, `gaji`, `tunjangan_pph`, `tunjangan_variable`, `honorarium`, `benefit`, `natuna`, `bonus_thr`, `brutob`, `biaya_jabatanb`, `iuran_pensiunb`, `brutot`, `biaya_jabatant`, `iuran_pensiunt`, `biaya_pengurangt`, `nettot`, `nettot_sebelumnya`, `nettot_akhir`, `ptkp`, `pkp`, `ppht`, `ppht_sebelumnya`, `ppht_terutang`, `pphb_terutang`) VALUES
	(1, '8913553HPI', '', '', 'TK0', '2020', '2020-02', '2020-01', '2020-12', 12, 2598000, 0, 2778600, 0, 179002, 0, 0, 5659522, 282976, 77940, 67914264, 3395712, 935280, 4330992, 63583272, 0, 63583272, 54000000, 9583000, 479150, 1771, 477379, 39782),
	(2, '8710458HPI', '', '', 'TK0', '2020', '2020-02', '2020-01', '2020-12', 12, 2895578, 0, 2778600, 0, 199506, 0, 0, 5989507, 299475, 86868, 71874084, 3593700, 1042416, 4636116, 67237968, 0, 67237968, 54000000, 13237000, 661850, 16708, 645142, 53762),
	(3, '8507344HPI', '', '', 'TK0', '2020', '2020-02', '2020-01', '2020-12', 12, 3184300, 0, 1164000, 0, 219398, 0, 0, 4695070, 234754, 95529, 56340840, 2817048, 1146348, 3963396, 52377444, 0, 52377444, 54000000, 0, 0, 0, 0, 0),
	(4, '8314001BJM', '', '', 'TK0', '2020', '2020-02', '2020-01', '2020-12', 12, 3060569, 0, 2778600, 0, 210873, 0, 0, 6172465, 308623, 91817, 74069580, 3703476, 1101804, 4805280, 69264300, 0, 69264300, 54000000, 15264000, 763200, 24992, 738208, 61517),
	(5, '8307439HPI', '', '', 'TK0', '2020', '2020-02', '2020-01', '2020-12', 12, 3320000, 0, 3028600, 0, 228748, 0, 0, 6710148, 335507, 99600, 80521776, 4026084, 1195200, 5221284, 75300492, 0, 75300492, 54000000, 21300000, 1065000, 38013, 1026987, 85582),
	(6, 'HONOR06', '', '', 'TK0', '2020', '2020-02', '2020-01', '2020-12', 12, 5300000, 0, 1500000, 0, 365170, 0, 0, 7377170, 368859, 159000, 88526040, 4426308, 1908000, 6334308, 82191732, 0, 82191732, 54000000, 28191000, 1409550, 112296, 1297254, 108105),
	(7, 'HONOR07', '', '', 'TK0', '2020', '2020-02', '2020-01', '2020-12', 12, 5300000, 0, 1500000, 0, 365170, 0, 0, 7377170, 368859, 159000, 88526040, 4426308, 1908000, 6334308, 82191732, 0, 82191732, 54000000, 28191000, 1409550, 112296, 1297254, 108105),
	(8, '9519012ZTY', '', '', 'TK0', '2020', '2020-02', '2020-01', '2020-12', 12, 4533000, 0, 1507000, 0, 493644, 0, 0, 6714964, 335748, 200000, 80579568, 4028976, 2400000, 6428976, 74150592, 0, 74150592, 54000000, 20150000, 1007500, 69142, 938358, 78197);
/*!40000 ALTER TABLE `pph_bulan` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.promosi_pegawai
CREATE TABLE IF NOT EXISTS `promosi_pegawai` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tgl_promosi` varchar(10) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `no_sk` varchar(120) DEFAULT '',
  `jenislama` varchar(120) DEFAULT '',
  `jabatanlama` varchar(200) DEFAULT '',
  `gradelama` varchar(60) DEFAULT '',
  `skala_gradelama` varchar(60) DEFAULT '',
  `jenis` varchar(120) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `grade` varchar(60) DEFAULT '',
  `skala_grade` varchar(60) DEFAULT '',
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.promosi_pegawai: 0 rows
/*!40000 ALTER TABLE `promosi_pegawai` DISABLE KEYS */;
/*!40000 ALTER TABLE `promosi_pegawai` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.restore
CREATE TABLE IF NOT EXISTS `restore` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '3',
  `tgl_restore` varchar(10) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `tgl_update` varchar(60) DEFAULT '',
  `petugas` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.restore: 10 rows
/*!40000 ALTER TABLE `restore` DISABLE KEYS */;
INSERT INTO `restore` (`id`, `nip`, `aktif`, `tgl_restore`, `keterangan`, `tgl_update`, `petugas`) VALUES
	(1, 'KOM01', '1', '2020-09-01', 'pembayaran tantiem', '2020-10-07 08:36:28', 'hary'),
	(2, 'KOM02', '1', '2020-09-01', 'pembayaran tantiem', '2020-10-07 08:38:20', 'hary'),
	(3, '6610430HPI', '1', '2021-07-21', 'Belum ada pengganti, proses payroll', '2021-07-21 07:26:24', 'sani'),
	(4, 'HONOR04', '1', '2021-08-03', 'proses pajak - ikp 2020', '2021-08-03 15:36:07', 'sani'),
	(5, 'HONOR01', '1', '2021-08-03', 'proses pajak - ikp 2020', '2021-08-03 15:36:54', 'sani'),
	(6, '8013085PWK', '1', '2022-03-07', 'Proses Pajak - suplisi 2020 & 2021', '2022-03-07 09:07:49', 'sani'),
	(7, '8010035TRK', '1', '2021-10-01', 'Proses Pajak - IKI 2021', '2021-11-09 08:48:34', 'hary'),
	(8, '6510027TRK', '1', '2021-10-01', 'Proses Pajak - IKI 2021', '2021-11-09 08:48:57', 'hary'),
	(9, '8410002TRK', '1', '2022-01-20', 'Mutasi ke Regkal 3', '2022-01-20 07:02:43', 'sani'),
	(10, '7212537HPI', '1', '2022-03-07', 'Proses Pajak - suplisi 2020 & 2021', '2022-03-07 09:08:46', 'sani');
/*!40000 ALTER TABLE `restore` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.riwayat_golongan
CREATE TABLE IF NOT EXISTS `riwayat_golongan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `tanggal` varchar(10) DEFAULT '',
  `golongan` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.riwayat_golongan: 10 rows
/*!40000 ALTER TABLE `riwayat_golongan` DISABLE KEYS */;
INSERT INTO `riwayat_golongan` (`id`, `nip`, `tanggal`, `golongan`) VALUES
	(1, '7719002PCN', '2019-10-01', 'COBA'),
	(2, '6793163Z', '2019-07-01', 'INT03-28'),
	(3, '6793163Z', '2019-01-01', 'ADV01-28'),
	(4, '6793163Z', '2018-01-01', 'ADV02-28'),
	(5, '6793163Z', '2017-01-01', 'ADV02-27'),
	(6, '6793163Z', '2016-01-01', 'ADV03-27'),
	(7, '6793163Z', '2014-01-01', 'ADV03-26'),
	(8, '6793163Z', '2013-07-01', 'OPT01-26'),
	(9, '6793163Z', '2013-01-01', 'OPT02-26'),
	(10, '6793163Z', '2012-01-01', 'OPT02-25');
/*!40000 ALTER TABLE `riwayat_golongan` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.riwayat_grade
CREATE TABLE IF NOT EXISTS `riwayat_grade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `tanggal` varchar(10) DEFAULT '',
  `grade` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.riwayat_grade: 10 rows
/*!40000 ALTER TABLE `riwayat_grade` DISABLE KEYS */;
INSERT INTO `riwayat_grade` (`id`, `nip`, `tanggal`, `grade`) VALUES
	(1, '7719002PCN', '2019-10-01', 'BASIC02'),
	(2, '9219008ZTY', '2019-11-01', 'SPECIFIC 04'),
	(3, '6793163Z', '2019-07-01', 'INT03-'),
	(4, '6793163Z', '2019-01-01', 'ADV01-'),
	(5, '6793163Z', '2017-01-01', 'ADV02-'),
	(6, '6793163Z', '2014-07-01', 'ADV03-14'),
	(7, '6793163Z', '2014-01-01', 'OPT01-14'),
	(8, '6793163Z', '2013-07-01', 'OPT01-13'),
	(9, '6793163Z', '2013-01-01', 'OPT02-13'),
	(10, '6793163Z', '2012-01-01', 'OPT02-12');
/*!40000 ALTER TABLE `riwayat_grade` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.riwayat_hukuman
CREATE TABLE IF NOT EXISTS `riwayat_hukuman` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `jenis_hukuman` varchar(120) DEFAULT '',
  `sejak` varchar(10) DEFAULT '',
  `sampai` varchar(10) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.riwayat_hukuman: 3 rows
/*!40000 ALTER TABLE `riwayat_hukuman` DISABLE KEYS */;
INSERT INTO `riwayat_hukuman` (`id`, `nip`, `jenis_hukuman`, `sejak`, `sampai`) VALUES
	(1, '7719002PCN', 'TES', '2021-07-01', '2021-07-02'),
	(2, '6691029E', 'SURAT PERINGATAN TERTULIS PERTAMA', '2018-03-01', '2018-08-31'),
	(3, '8102002E', 'SURAT PERINGATAN TERTULIS PERTAMA', '2016-03-01', '2016-05-31');
/*!40000 ALTER TABLE `riwayat_hukuman` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.riwayat_jabatan
CREATE TABLE IF NOT EXISTS `riwayat_jabatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `jabatan` varchar(255) DEFAULT '',
  `unit` varchar(255) DEFAULT '',
  `sejak` varchar(10) DEFAULT '',
  `sampai` varchar(10) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.riwayat_jabatan: 10 rows
/*!40000 ALTER TABLE `riwayat_jabatan` DISABLE KEYS */;
INSERT INTO `riwayat_jabatan` (`id`, `nip`, `jabatan`, `unit`, `sejak`, `sampai`) VALUES
	(1, '7719002PCN', 'STAF IT', 'PLNT KANTOR PUSAT', '2020-01-01', ''),
	(2, '9219008ZTY', 'ASSISTANT OFFICER KINERJA PEGAWAI', 'PLN TARAKAN', '2019-11-01', '2021-11-15'),
	(3, '6793163Z', 'PEGAWAI/ STAFF', 'PEGAWAI/ STAFF', '1993-06-02', '1994-03-06'),
	(4, '6793163Z', 'AHLI MUDA II PERENCANAAN SISTEM DISTRIBUSI', 'PT PLN (PERSERO) DISTRIBUSI JAWA BARAT', '1994-03-07', '1994-06-30'),
	(5, '6793163Z', 'KEPALA SEKSI PENERAAN', 'BAGIAN DISTRIBUSI CABANG BOGOR PT PLN (PERSERO) DISTRIBUSI JAWA BARAT', '1994-07-01', '1995-01-01'),
	(6, '6793163Z', 'KEPALA SEKSI PENGENDALIAN KONSTRUKSI', 'BAGIAN KONSTRUKSI CABANG BOGOR PT PLN (PERSERO) DISTRIBUSI JAWA BARAT', '1995-01-02', '1996-03-31'),
	(7, '6793163Z', 'KEPALA RANTING CITEUREUP ', 'CABANG BOGOR PT PLN (PERSERO) DISTRIBUSI JAWA BARAT', '1996-04-01', '2001-02-14'),
	(8, '6793163Z', 'AHLI MUDA MANAJER UPP LEUWILIANG ', 'UNIT PELAYANAN PELANGGAN LEUWILIANG CABANG BOGOR PT PLN (PERSERO) UNIT BISNIS DISTRIBUSI JAWA BARAT DAN BVANTEN', '2001-02-15', '2002-07-04'),
	(9, '6793163Z', 'MANAJER UNIT JARINGAN KARAWANG', 'AREA PELAYANAN DAN JARINGAN KARAWANG PT PLN (PERSERO) DISTRIBUSI JAWA BARAT DAN BANTEN', '2002-07-05', '2005-01-12'),
	(10, '6793163Z', 'MANAJER UNI T PELAYANAN DAN JARINGAN KOSAMBI', 'AREA PELAYANAN DAN JARINGAN KARAWANG PT PLN (PERSERO) DISTRIBUSI JAWA BARAT DAN BANTEN', '2005-01-13', '2005-10-12');
/*!40000 ALTER TABLE `riwayat_jabatan` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.riwayat_kondite
CREATE TABLE IF NOT EXISTS `riwayat_kondite` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `kondite` varchar(200) DEFAULT '',
  `tgl_mulai_penilaian` varchar(10) DEFAULT '',
  `tgl_akhir_penilaian` varchar(10) DEFAULT '',
  `talenta` varchar(120) DEFAULT '',
  `peringkat` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.riwayat_kondite: 10 rows
/*!40000 ALTER TABLE `riwayat_kondite` DISABLE KEYS */;
INSERT INTO `riwayat_kondite` (`id`, `nip`, `kondite`, `tgl_mulai_penilaian`, `tgl_akhir_penilaian`, `talenta`, `peringkat`) VALUES
	(1, '7719002PCN', '', '2020-01-01', '2020-06-30', 'SANGAT POTENSIAL', 'BASIC02'),
	(2, '9219008ZTY', '', '2020-01-01', '2020-06-30', 'SANGAT POTENSIAL', '-'),
	(3, '9219008ZTY', '', '2020-07-01', '2020-12-31', 'SANGAT POTENSIAL', '-'),
	(4, '9219008ZTY', '', '2021-01-01', '2021-06-30', 'SANGAT POTENSIAL', '-'),
	(5, '6793163Z', '', '2021-01-01', '2021-06-30', 'OPTIMAL', 'INT03'),
	(6, '6793163Z', '', '2020-07-01', '2020-12-31', 'OPTIMAL', 'INT03'),
	(7, '6793163Z', '', '2020-01-01', '2020-06-30', 'OPTIMAL', 'INT03'),
	(8, '6793163Z', '', '2019-07-01', '2019-12-31', 'SANGAT POTENSIAL', 'INT03'),
	(9, '6793163Z', '', '2019-01-01', '2019-06-30', 'SANGAT POTENSIAL', 'ADV01'),
	(10, '6793163Z', '', '2018-07-01', '2018-12-31', 'SANGAT POTENSIAL', 'ADV02');
/*!40000 ALTER TABLE `riwayat_kondite` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.riwayat_kursus_eksternal
CREATE TABLE IF NOT EXISTS `riwayat_kursus_eksternal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `nama_kursus` varchar(200) DEFAULT '',
  `tgl_mulai` varchar(10) DEFAULT '',
  `tgl_selesai` varchar(10) DEFAULT '',
  `lembaga_pendidikan` varchar(200) DEFAULT '',
  `lokasi` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.riwayat_kursus_eksternal: 10 rows
/*!40000 ALTER TABLE `riwayat_kursus_eksternal` DISABLE KEYS */;
INSERT INTO `riwayat_kursus_eksternal` (`id`, `nip`, `nama_kursus`, `tgl_mulai`, `tgl_selesai`, `lembaga_pendidikan`, `lokasi`) VALUES
	(1, '7719002PCN', 'Advanced Codeigniter', '2021-03-04', '2021-03-11', 'Coba', 'Lokasi Coba'),
	(2, '6793163Z', 'HEALTH SECRET SAVE OUR LF', '2010-03-04', '2010-03-04', 'THE INTEGRATED HEALTH CENTER', 'THE INTEGRATED HEALTH CENTER'),
	(3, '6793163Z', 'TOT PENDALAMAN MATERI PEMBACAAN METER FOT TOC', '2003-01-16', '2003-01-18', 'UDIKLAT JAKARTA/ JAKARTA', 'UDIKLAT JAKARTA/ JAKARTA'),
	(4, '6793163Z', 'MANAJEMEN QOLBU PPMQ)', '2002-04-19', '2002-04-21', 'DARUT TAUHID/ BANDUNG', 'DARUT TAUHID/ BANDUNG'),
	(5, '6793163Z', 'TATA USAHA PELANGGAN AUDITING FUNGSI 1 S/D 6', '2002-04-10', '2002-04-12', 'UDIKLAT JAKARTA/ JAKARTA', 'UDIKLAT JAKARTA/ JAKARTA'),
	(6, '6793163Z', 'PEMBEKALAN CALON MANAJER UPP', '2001-08-20', '2001-08-25', 'UDIKLAT JAKARTA/ JAKARTA', 'UDIKLAT JAKARTA/ JAKARTA'),
	(7, '6793163Z', 'TEKNIK NEGOISASI DALAM BISNIS', '2001-04-16', '2001-04-18', 'MULTI TRAINING CENTER/ JAKARTA', 'MULTI TRAINING CENTER/ JAKARTA'),
	(8, '6793163Z', 'PROBLEM SOLVING AND DECISION MAKING', '2000-11-06', '2000-11-10', 'UDIKLAT JAKARTA/ JAKARTA', 'UDIKLAT JAKARTA/ JAKARTA'),
	(9, '6793163Z', 'PROBLEM SOLVING & DECISION MAKING (PSDM)', '2000-11-06', '2000-11-10', 'PLN UDIKLAT JAKARTA/ JAKARTA', 'PLN UDIKLAT JAKARTA/ JAKARTA'),
	(10, '6793163Z', 'PELAYANAN PRIMA', '2000-10-22', '2000-10-22', 'UDIKLAT BOGOR/ BOGOR', 'UDIKLAT BOGOR/ BOGOR');
/*!40000 ALTER TABLE `riwayat_kursus_eksternal` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.riwayat_kursus_internal
CREATE TABLE IF NOT EXISTS `riwayat_kursus_internal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `nama_kursus` varchar(200) DEFAULT '',
  `tgl_mulai` varchar(10) DEFAULT '',
  `tgl_selesai` varchar(10) DEFAULT '',
  `lembaga_pendidikan` varchar(200) DEFAULT '',
  `lokasi` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.riwayat_kursus_internal: 8 rows
/*!40000 ALTER TABLE `riwayat_kursus_internal` DISABLE KEYS */;
INSERT INTO `riwayat_kursus_internal` (`id`, `nip`, `nama_kursus`, `tgl_mulai`, `tgl_selesai`, `lembaga_pendidikan`, `lokasi`) VALUES
	(3, '7719002PCN', 'Diklat PLNT', '2021-03-01', '2021-03-15', 'UDIKLAT MAKASSAR', 'MAKASSAR'),
	(4, '9219008ZTY', 'WORKSHOP PSAK 24 PLN GROUP', '2021-09-06', '2021-09-07', 'UPDL Jakarta', 'Jakarta'),
	(5, '6793163Z', 'QUALIFIED RISK GOVERNANCE PROFESIONAL (QRGP)', '2021-03-26', '2021-03-26', 'LEMBAGA SERTIFIKASI PROFESI MITRA KALYANA SEJAHTERA (LSP MKS)', 'LEMBAGA SERTIFIKASI PROFESI MITRA KALYANA SEJAHTERA (LSP MKS)'),
	(6, '6793163Z', 'ASPEK HUKUM DALAM PENGELOLAAN BUMN', '2020-12-15', '2020-12-18', 'PERTAMINA TRAINING & CONSULTING', 'PERTAMINA TRAINING & CONSULTING'),
	(7, '6793163Z', 'AWARENESS GOVERNANCE, RISK, COMPLIANCE (GRC)', '2020-09-17', '2020-09-18', 'CIPTA KARAKTER', 'CIPTA KARAKTER'),
	(8, '6793163Z', 'BOD DAN BOC PLN GROUP GATHERING; "MENJAGA SUSTAINABILITY DI ERA NEW NORMAL DENGAN BERPEDOMAN PADA PRINSIP GCG"', '2020-07-11', '2020-07-11', 'PT PLN KANTOR PUSAT', 'PT PLN KANTOR PUSAT'),
	(9, '6793163Z', 'WORKSHOP CORPORATION, MERGER & ACQUISITION AND MANAGING SUBSIDIARIES', '2019-11-25', '2019-11-29', 'PRASETIYA MULIA EXECUTIVE LEARNING INSTITUTE', 'PRASETIYA MULIA EXECUTIVE LEARNING INSTITUTE'),
	(10, '6793163Z', 'TOT MANAJEMEN RISIKO DASAR UNTUK MANAJER', '2015-11-23', '2015-11-24', 'UDIKLAT BOGOR/ BOGOR', 'UDIKLAT BOGOR/ BOGOR');
/*!40000 ALTER TABLE `riwayat_kursus_internal` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.riwayat_pekerjaan_sebelum
CREATE TABLE IF NOT EXISTS `riwayat_pekerjaan_sebelum` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `instansi` varchar(200) DEFAULT '',
  `jabatan` varchar(255) DEFAULT '',
  `sejak` varchar(10) DEFAULT '',
  `sampai` varchar(10) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.riwayat_pekerjaan_sebelum: 10 rows
/*!40000 ALTER TABLE `riwayat_pekerjaan_sebelum` DISABLE KEYS */;
INSERT INTO `riwayat_pekerjaan_sebelum` (`id`, `nip`, `instansi`, `jabatan`, `sejak`, `sampai`) VALUES
	(1, '7719002PCN', 'PLN ULP NUNUKAN', 'PENGOLAHAN DATA', '2002-02-01', '2019-07-31'),
	(2, '9219008ZTY', 'PT WELL HARVEST WINNING ALUMINA REFINERY', 'TEAM LEADER OPERASIONAL A', '2015-08-23', '2016-08-23'),
	(3, '9219008ZTY', 'PT BANK RAKYAT INDONESIA (PERSERO), TBK', 'CUSTOMER SERVICE KANTOR CABANG UTAMA PONTIANAK', '2017-02-06', '2019-01-07'),
	(4, '7802008R', 'KANTOR AKUNTAN PUBLI', 'JUNIOR AUDITOR', '2000-01-01', '2001-10-31'),
	(5, '7302002H3', 'KOP SUMBER ENERGI-TEKNISI JARDIS & ADM TU DI SROEBOBO', 'KOP SUMBER ENERGI-TEKNISI JARDIS & ADM TU DI SROEBOBO', '1996-07-15', '2001-07-15'),
	(6, '7904009F', 'PT FAJAR MAS MURNI', 'SPARE PART & SERV.ENG', '2002-06-01', '2002-12-01'),
	(7, '7904009F', 'PT PAN UNITED', 'MANAGEMENT TRAINEE', '2002-01-01', '2002-02-01'),
	(8, '8711454HPI', 'CV DIYOHARA', 'ADMINISTRASI KANTOR', '2006-01-01', '2007-01-31'),
	(9, '8711454HPI', 'CV BUANA ARTHA', 'KURIR', '2007-01-01', '2009-01-31'),
	(10, '8711454HPI', 'PT MITRA INSAN UTAMA', 'SUPERVISOR', '2011-01-01', '2013-12-31');
/*!40000 ALTER TABLE `riwayat_pekerjaan_sebelum` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.riwayat_pendidikan
CREATE TABLE IF NOT EXISTS `riwayat_pendidikan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `pendidikan` varchar(120) DEFAULT '',
  `jurusan` varchar(200) DEFAULT '',
  `lembaga_pendidikan` varchar(200) DEFAULT '',
  `sejak` varchar(10) DEFAULT '',
  `sampai` varchar(10) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.riwayat_pendidikan: 8 rows
/*!40000 ALTER TABLE `riwayat_pendidikan` DISABLE KEYS */;
INSERT INTO `riwayat_pendidikan` (`id`, `nip`, `pendidikan`, `jurusan`, `lembaga_pendidikan`, `sejak`, `sampai`) VALUES
	(3, '7719002PCN', 'SD', '-', 'SD Negeri 52 Parepare', '1984-01-02', '1990-01-03'),
	(4, '7719002PCN', 'SMP', '-', 'SMP Negeri 6 Parepare', '1991-01-01', '1993-01-01'),
	(5, '7719002PCN', 'SMA', 'IPA', 'SMA Negeri 1 Parepare', '1994-01-01', '1997-01-01'),
	(6, '9219008ZTY', 'SD', '-', 'SD NEGERI 29 PONTIANAK', '1999-07-01', NULL),
	(7, '9219008ZTY', 'SMP', '-', 'SMP NEGERI 2 PONTIANAK', '2004-07-01', NULL),
	(8, '9219008ZTY', 'SMA', 'IPA', 'SMA NEGERI 4 PONTIANAK', '2007-07-01', NULL),
	(9, '9219008ZTY', 'S1', 'TEKNIK INDUSTRI', 'UNIVERSITAS TANJUNGPURA', '2010-07-01', NULL),
	(10, '6793163Z', 'SD', '-', 'SD NEGERI 1 MATARAM', '1975-01-01', '1980-12-31');
/*!40000 ALTER TABLE `riwayat_pendidikan` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.riwayat_penghargaan
CREATE TABLE IF NOT EXISTS `riwayat_penghargaan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `nama_penghargaan` varchar(200) DEFAULT '',
  `tanggal` varchar(10) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.riwayat_penghargaan: 10 rows
/*!40000 ALTER TABLE `riwayat_penghargaan` DISABLE KEYS */;
INSERT INTO `riwayat_penghargaan` (`id`, `nip`, `nama_penghargaan`, `tanggal`) VALUES
	(1, '7719002PCN', 'TES', '2021-07-17'),
	(2, '6793082D', 'KESETIAAN KERJA 2 (DUA) WINDU PT PLN (PERSERO) WIL KALTIM', '2009-05-10'),
	(3, '6793082D', '-', '2017-10-27'),
	(4, '7095008B', 'KESETIAAN KERJA 2 (DUA) WINDU PT PLN (WILAYAH LAMPUNG)', '2009-04-01'),
	(5, '6691029E', 'KESETIAAN KERJA 2 (DUA) WINDU PT PLN (PERSERO)', '2007-04-01'),
	(6, '7904009F', 'KESETIAAN KERJA 2 (DUA) WINDU GENERAL MANAGER', '2020-01-01'),
	(7, '8105027TRK', 'INHOUSE TRAINING BUDAYA PERUSAHAAN DAN PEDOMAN PERILAKU, ANGKATAN III', '2006-04-01'),
	(8, '7110039TRK', 'INHOUSE TRAINING BUDAYA PERUSAHAAN DAN PEDOMAN PERILAKU ANGKATAN III', '2006-04-13'),
	(9, '7905007TRK', 'PELAYARAN ESG-SII PROFESIONAL, MEMBANGKITKAN 3 DIMENSI KECERDASAN : INTELEKTUAL, SPIRITUAL, DAN EMOSIONAL (IESQ)', '2006-04-13'),
	(10, '7702011E', 'KESETIAAN KERJA 2 (DUA) WINDU PT PLN (PERSERO)', '2018-11-01');
/*!40000 ALTER TABLE `riwayat_penghargaan` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.riwayat_penugasan
CREATE TABLE IF NOT EXISTS `riwayat_penugasan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `nama_penugasan` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `unit_kerja` varchar(200) DEFAULT '',
  `dari` varchar(64) DEFAULT '',
  `sampai` varchar(64) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.riwayat_penugasan: 0 rows
/*!40000 ALTER TABLE `riwayat_penugasan` DISABLE KEYS */;
/*!40000 ALTER TABLE `riwayat_penugasan` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.riwayat_penugasan_khusus
CREATE TABLE IF NOT EXISTS `riwayat_penugasan_khusus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `nama_penugasan` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `unit` varchar(200) DEFAULT '',
  `sejak` varchar(10) DEFAULT '',
  `sampai` varchar(10) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.riwayat_penugasan_khusus: 10 rows
/*!40000 ALTER TABLE `riwayat_penugasan_khusus` DISABLE KEYS */;
INSERT INTO `riwayat_penugasan_khusus` (`id`, `nip`, `nama_penugasan`, `jabatan`, `unit`, `sejak`, `sampai`) VALUES
	(1, '7719002PCN', 'TES', 'TES', 'TES', '2021-06-01', '2021-06-30'),
	(2, '6592053Z', 'PEJABAT PELAKSANA TUGAS', 'PLT MANAJER PRODUKSI', 'PT PLN (PERSERO) PEMBANGKITAN SUMATERA BAGIAN UTARA', '2013-06-05', '9999-12-31'),
	(3, '6592053Z', '-', '-', '-', '1998-08-12', '1998-12-31'),
	(4, '6793082D', 'PEJABAT PELAKSANA TUGAS (PLT)', 'PLT DEPUTI MANAJER PENGEMBANGAN SDM', 'KANTOR WILAYAH', '2013-02-01', '2013-12-31'),
	(5, '6793082D', 'TIM COMMUNITY OF PRACTICE (COP)', 'CHAMPION SDM DAN ADMINISTRASI', 'PT PLN (PERSERO) AP2B SISTEM KALTIM', '2009-11-06', '2011-12-31'),
	(6, '6793082D', 'TIM PELAKSANA P3L', 'SEKRETARIS KTR AP2B', 'PLN WILAYAH KALIMANTAN TIMUR', '2010-04-27', '2011-01-30'),
	(7, '6793082D', 'PROGRAM PARTISIPASI PEMBERDAYAAN LINGKUNGAN (P3L)', 'KETUA', 'PT PLN (PERSERO) AP2B SISTEM KALTIM', '2010-03-01', '2011-01-05'),
	(8, '6793082D', 'TIM RENCANA KERJA DAN ANGGARAN PERUSAHAAN (RKAP) T', 'KOORDINATOR BAGIAN SDM DAN ADM', 'PT PLN (PERSERO) AP2B SISTEM KALTIM', '2010-04-01', '2011-01-01'),
	(9, '6793082D', 'TIM EFFICIENCY DRIVE PROGRAM', 'KOORDINATOR BAGIAN SDM DAN ADM', 'PT PLN (PERSERO) AP2B SISTEM KALTIM', '2010-03-31', '2010-12-31'),
	(10, '6793082D', 'TIM IMPLEMENTASI SISTEM MANAJEMEN MUTU ISO 9001 :08', 'KOORDINATOR SDM & ADMINISTRASI', 'PT PLN (PERSERO) AP2B SISTEM KALTIM', '2010-05-27', '2010-12-31');
/*!40000 ALTER TABLE `riwayat_penugasan_khusus` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.riwayat_profesi
CREATE TABLE IF NOT EXISTS `riwayat_profesi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `nama_profesi` varchar(200) DEFAULT '',
  `dari` varchar(64) DEFAULT '',
  `sampai` varchar(64) DEFAULT '',
  `sebutan_profesi` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.riwayat_profesi: 0 rows
/*!40000 ALTER TABLE `riwayat_profesi` DISABLE KEYS */;
/*!40000 ALTER TABLE `riwayat_profesi` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.riwayat_sertifikasi
CREATE TABLE IF NOT EXISTS `riwayat_sertifikasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `judul` varchar(200) DEFAULT '',
  `sejak` varchar(10) DEFAULT '',
  `sampai` varchar(10) DEFAULT '',
  `lembaga` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.riwayat_sertifikasi: 9 rows
/*!40000 ALTER TABLE `riwayat_sertifikasi` DISABLE KEYS */;
INSERT INTO `riwayat_sertifikasi` (`id`, `nip`, `judul`, `sejak`, `sampai`, `lembaga`) VALUES
	(1, '7719002PCN', 'Tes 1', '2021-01-01', '', 'Tes 1'),
	(2, '7702003R2', 'PENGADAAN BARANG/ JASA PT', '2016-10-25', '2016-10-25', 'UNIT SERTIFIKASI'),
	(3, '7802008R', 'UJI PORTOFOLIO KOMPETENSI SPE TO SYS', '2012-11-26', '2012-12-26', '-'),
	(4, '8106323Z', 'SERTIFIKAT KOMPETENSI', '2016-08-01', '2016-08-04', 'KEMENAKER RI'),
	(5, '7302002H3', 'SERTIFIKAT KOMPETENSI', '2019-01-22', '2022-01-25', 'PT LISAN NUSANTARA SATU'),
	(6, '88111121Z', 'SERTIFIKAT KOMPETENSI', '2015-09-21', '2015-09-22', 'PT PLN (PERSERO) PUSDIKLAT'),
	(7, '88111121Z', 'SERTIFIKAT KOMPETENSI', '2015-04-27', '2015-04-27', 'PLN PUSDIKLAT UNIT SERTIFIKASI'),
	(8, '88111121Z', 'SERTIFIKAT KOMPETENSI', '2015-03-30', '2015-03-31', 'PLN PUSDIKLAT UNIT SERTIFIKASI'),
	(9, '7905006R2', 'PENGADAAN BARANG DAN JASA', '2012-02-22', '2012-02-24', 'UDIKLAT PADANG');
/*!40000 ALTER TABLE `riwayat_sertifikasi` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.riwayat_tenaga_harian
CREATE TABLE IF NOT EXISTS `riwayat_tenaga_harian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `unit` varchar(200) DEFAULT '',
  `sejak` varchar(10) DEFAULT '',
  `sampai` varchar(10) DEFAULT '',
  `golongan` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.riwayat_tenaga_harian: 3 rows
/*!40000 ALTER TABLE `riwayat_tenaga_harian` DISABLE KEYS */;
INSERT INTO `riwayat_tenaga_harian` (`id`, `nip`, `unit`, `sejak`, `sampai`, `golongan`) VALUES
	(1, '7719002PCN', 'KANTOR PCN PUSAT', '2018-02-01', '2020-09-30', 'IT'),
	(2, '6793082D', 'TERAMPIL II KEPEGAWAIAN PADA SEKSI KEPEGAWAIAN BAGIAN ADMINISTRASI CABANG SAMARINDA PT PLN (PERSERO) WILAYAH VI', '1993-05-10', '1998-10-22', '-'),
	(3, '6691029E', 'CABANG GORONTALO CABANG PT PLN (PERSERO) WILAYAH SULAWESI UTARA, SULAWESI TENGAH DAN GORONTALO', '1991-04-01', '1997-06-30', 'TERAMPIL II/JURU II PENYULUH PEMASARAN ');
/*!40000 ALTER TABLE `riwayat_tenaga_harian` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.riwayat_tugas_karya
CREATE TABLE IF NOT EXISTS `riwayat_tugas_karya` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `unit_kerja` varchar(200) DEFAULT '',
  `sejak` varchar(10) DEFAULT '',
  `sampai` varchar(10) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.riwayat_tugas_karya: 9 rows
/*!40000 ALTER TABLE `riwayat_tugas_karya` DISABLE KEYS */;
INSERT INTO `riwayat_tugas_karya` (`id`, `nip`, `unit_kerja`, `sejak`, `sampai`, `jabatan`) VALUES
	(1, '7719002PCN', 'KANTOR PUSAT PLN TARAKAN', '2020-01-01', '', 'JUNIOR ANALYST TEKNOLOGI INFORMASI'),
	(2, '6793163Z', '-', '2019-03-12', '9999-12-31', 'SENIOR SPECIALIST I PERENCANAAN KEUANGAN'),
	(3, '6793163Z', '-', '2011-08-01', '2014-07-31', 'SII TATA NIAGA'),
	(4, '7702003R2', '-', '2019-03-12', '9999-12-31', 'ANALYST KEUANGAN (PLT DIREKTUR KEUANGAN)'),
	(5, '7702003R2', '-', '2012-12-01', '2015-11-30', 'ANALYST KEMITRAAN DAN UKM'),
	(6, '7905008D', 'PEMBENTUKAN CHANGE AGENT PROGRAM', '2016-03-01', '2019-02-28', '-'),
	(7, '8105027TRK', 'PT PAGUNTA CAHAYA NUSANTARA AREA KALIMANTAN BARAT', '2018-02-01', '2020-12-31', 'JUNIOR OFFICER ADMINISTRASI DAN UMUM'),
	(8, '8410002TRK', 'PT PAGUNTAKA CAHAYA NUSANTARA', '2021-03-01', '2024-02-29', 'MANAJER SDM DAN ADMINISTRASI'),
	(9, '92161372ZY', 'PT PLN TARAKAN', '2023-04-01', '2026-03-01', 'ASSISTANT MANAGER SISTEM DAN TEKNOLOGI INFORMASI');
/*!40000 ALTER TABLE `riwayat_tugas_karya` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.r_alamat
CREATE TABLE IF NOT EXISTS `r_alamat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `jenis_alamat` varchar(60) DEFAULT '',
  `rumah_atas_nama` varchar(120) DEFAULT '',
  `alamat_lengkap` text,
  `id_provinsi` varchar(3) DEFAULT '',
  `id_kabupaten` varchar(4) DEFAULT '',
  `kode_pos` varchar(20) DEFAULT '',
  `negara` varchar(60) DEFAULT '',
  `jarak` double NOT NULL DEFAULT '0',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.r_alamat: ~10 rows (lebih kurang)
INSERT INTO `r_alamat` (`id`, `nip`, `start_date`, `end_date`, `jenis_alamat`, `rumah_atas_nama`, `alamat_lengkap`, `id_provinsi`, `id_kabupaten`, `kode_pos`, `negara`, `jarak`, `status_edit`, `tgl_edit`, `user_edit`) VALUES
	(1, '9619015ZTY', '2021-07-01', '9999-12-31', 'JA2', 'MUHAMMAD ANDENI SAPUTRA', 'PLTU PUNAGAYA', '16', '7304', '92352', 'ID', 0, '0', '', ''),
	(2, '9619016ZTY', '2019-12-01', '9999-12-31', 'JA2', 'EBEN RONITUA SITOMPUL', 'JL. DI. Panjaitan Lrg. Pegagan', '16', '1671', '76114', 'ID', 0, '0', '', ''),
	(3, '9419017ZTY', '2019-12-01', '9999-12-31', 'JA2', 'AMMAR SYAFIQ EL QOSSAM', 'KOMP PLTMG BANGKANAI', '62', '6210', '73852', 'ID', 0, '0', '', ''),
	(4, '6691029E', '2020-07-01', '9999-12-31', 'JA2', 'ABDUL HARIS DAUD', 'JLN. JAKARTA KEL. HUANGOBOTU', '71', '7502', '96138', 'ID', 0, '0', '', ''),
	(5, '93171068ZY', '1993-11-22', '9999-12-31', 'JA2', '-', 'JL JATI 3 NO 66 ', '14', '1471', '20228', 'ID', 0, '0', '', ''),
	(6, '8106323Z', '2020-07-01', '9999-12-31', 'JA2', 'ERMIN SRI WULANDARI', 'JL.PATRIOT PERUM PLN RAPAK INDAH SMD', '64', '6472', '75126', 'ID', 0, '0', '', ''),
	(7, '8207216Z', '2020-08-01', '9999-12-31', 'JA2', 'DJOKO DWI ATMONO', 'JL MT HARYONO GANG PLN BLOK E NO 6', '64', '6471', '76114', 'ID', 0, '0', '', ''),
	(8, '8611098Z', '2020-09-01', '9999-12-31', 'JA2', 'ARIEF SUKO PRANOTO', 'JL TELAGA SARI II', '64', '6471', '76111', 'ID', 0, '0', '', ''),
	(9, '7602004ICP', '2020-08-01', '9999-12-31', 'JA2', 'IRAWAN HERNANDA', 'KOMPLEK PERTAMINA JALAN PERTAMINA RAYA BLOK L 12 CIPUTAT TANGERANG', '36', '3603', '15412', 'ID', 0, '0', '', ''),
	(10, '9620001ZTY', '2020-10-01', '9999-12-31', 'JA2', 'IRVAN YUBRATA', 'JL. MT HARYONO GANG. PLN', '64', '6471', '76114', 'ID', 0, '0', '', '');

-- membuang struktur untuk table hrisori.r_atasan
CREATE TABLE IF NOT EXISTS `r_atasan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date_jabatan` varchar(10) NOT NULL DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `jabatan_atasan` varchar(200) DEFAULT '',
  `nip_atasan` varchar(30) DEFAULT '',
  `nama_atasan` varchar(160) DEFAULT '',
  `kode_posisi` varchar(120) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.r_atasan: ~9 rows (lebih kurang)
INSERT INTO `r_atasan` (`id`, `nip`, `start_date_jabatan`, `start_date`, `end_date`, `jabatan_atasan`, `nip_atasan`, `nama_atasan`, `kode_posisi`, `status_edit`, `tgl_edit`, `user_edit`) VALUES
	(1, '8206444Z', '2019-01-01', '2023-07-01', '2023-07-30', 'DIREKTUR UTAMA PT PLN TARAKAN', '6793163Z', 'I KETUT WIRIANA', 'PLNT0001', '1', '2024-02-19 02:48:33', '9219008ZTY'),
	(2, '8711868Z', '2020-12-01', '2020-12-01', '9999-12-31', 'PLT MANAGER PERENCANAAN DAN ENJINIRING PADA BIDANG PERENCANAAN DAN ENJINIRING DIVISI PERENCANAAN DAN PENGEMBANGAN USAHA PT PLN TARAKAN', '8510210Z', 'GALIH HONGGO BASKORO', '', '0', '', ''),
	(3, '9418045ZY', '2022-08-01', '2023-02-01', '9999-12-31', 'TEAM LEADER OPERASI', '92141043ZY', 'MENTARY BUNGA', 'PLNT0183', '1', '2024-02-19 03:53:06', '9219008ZTY'),
	(4, '7902024F', '2019-01-01', '2023-07-01', '2023-07-31', 'DIREKTUR UTAMA PT PLN TARAKAN', '6793163Z', 'I KETUT WIRIANA', 'PLNT0001', '1', '2024-02-19 02:50:05', '9219008ZTY'),
	(5, '9920014ZTY', '2021-06-01', '2020-12-01', '2022-12-31', 'PLT ASSISTANT MANAGER KEUANGAN DAN PENDAPATAN', '7510005TRK', 'YUSUF SAEFUDIN', '37425913', '1', '2024-02-20 12:10:39', '9219008ZTY'),
	(6, '9620015ZTY', '2021-06-01', '2020-12-01', '2022-12-01', 'PLT ASSISTANT MANAGER KEUANGAN DAN PENDAPATAN', '7510005TRK', 'YUSUF SAEFUDIN', '37425913', '1', '2023-08-07 20:03:30', '9219008ZTY'),
	(7, '6793163Z', '2019-01-01', '2019-01-01', '9999-12-31', 'KOMISARIS UTAMA PT PLN TARAKAN', '6793121Z', 'EMAN PRIYONO WASITO ADI', '', '0', '', ''),
	(8, '6592053Z', '2019-01-01', '2019-01-01', '9999-12-31', 'DIREKTUR UTAMA PT PLN TARAKAN', '6793163Z', 'I KETUT WIRIANA', '', '0', '', ''),
	(9, '93151064ZY', '2021-06-01', '2021-01-01', '2023-12-31', 'ASSISTANT MANAGER PELAYANAN HC DAN HI', '9219008ZTY', 'HARY UTAMA', 'PLNT0086', '1', '2024-02-19 04:14:35', '9219008ZTY');

-- membuang struktur untuk table hrisori.r_award
CREATE TABLE IF NOT EXISTS `r_award` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `kode_award` varchar(4) DEFAULT '',
  `uraian_award` text,
  `no_sk_penghargaan` varchar(120) DEFAULT '',
  `tgl_sk_penghargaan` varchar(10) DEFAULT '',
  `tingkat_acara` varchar(10) DEFAULT '',
  `diberikan_oleh` varchar(160) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Membuang data untuk tabel hrisori.r_award: ~16 rows (lebih kurang)
INSERT INTO `r_award` (`id`, `nip`, `start_date`, `end_date`, `kode_award`, `uraian_award`, `no_sk_penghargaan`, `tgl_sk_penghargaan`, `tingkat_acara`, `diberikan_oleh`, `status_edit`, `tgl_edit`, `user_edit`) VALUES
	(1, '6793082D', '2009-05-10', '2009-05-10', '9001', 'KESETIAAN KERJA 2 (DUA) WINDU PT PLN (PERSERO) WILAYAH KALTIMRA', '-', '1900-01-01', 'TA1', '', '0', '', ''),
	(2, '6691029E', '2007-04-01', '2007-04-01', '9001', 'PENGHARGAAN KESETIAAN KERJA 2 (DUA) WINDU PT PLN (PERSERO)', '-', '1900-01-01', 'TA1', '', '0', '', ''),
	(3, '6793163Z', '2022-12-05', '9999-12-31', '9012', 'JUARA KE-2 UNIT BENCHMARK IMPLEMENTASI BUDAYA KATEGORI ANAK PERUSAHAAN DAN SUB HOLDING', 'PT PLN (PERSERO)', '2022-12-05', 'TA2', '', '0', '', ''),
	(4, '9315638ZY', '2022-01-01', '2022-12-31', '9012', 'Best Risk Implementer Anak Perusahaan', '63046/MRK.00.04/E01000400/2022', '2023-10-27', 'TA1', 'PT PLN (Persero)', '1', '2023-10-11 17:38:37', 'sandy'),
	(5, '9215907ZY', '2023-08-11', '2023-08-11', '9007', 'Pengelolaan O & M Distribusi Terbaik Tahun 2022 di Seluruh Wilayah Kerja PT PLN Tarakan', '-', '2023-08-11', 'TA1', 'PT PLN Tarakan', '1', '2023-10-19 12:02:27', '9219008ZTY'),
	(6, '9215907ZY', '2023-07-10', '2023-07-10', '9007', 'Kinerja Kehandalan Jaringan Distribusi Terbaik di Kalselteng', '-', '2023-07-10', 'TA1', 'PT PLN (Persero) UP3 Banjarmasin', '1', '2023-10-19 11:48:13', '9219008ZTY'),
	(7, '9215907ZY', '2023-05-19', '2023-05-19', '9007', 'Juara 1 Pengelolaan Service Point Iconnet Nasional Triwulan 1 Tahun 2023', '-', '2023-05-19', 'TA1', 'PT PLN Icon+', '1', '2023-10-19 11:52:55', '9219008ZTY'),
	(8, '9215907ZY', '2023-05-14', '2023-05-14', '9007', 'Juara Kompetensi Keandalan Jaringan Distribusi Cluster A, B dan C (Seluruh Cluster Pengelolaan Pelayanan Teknik ULP) ', '-', '2023-05-14', 'TA1', 'PT PLN (Persero) UID Kalselteng', '1', '2023-10-19 12:01:18', '9219008ZTY'),
	(9, '9215907ZY', '2023-02-17', '2023-02-17', '9007', 'Pengelolaan O & M Distribusi Terbaik Tahun 2022 di Seluruh Wilayah Kerja PT PLN Tarakan', '-', '2023-02-17', 'TA1', 'PT PLN Tarakan', '1', '2023-10-19 12:03:14', '9219008ZTY'),
	(10, '9215907ZY', '2023-02-08', '2023-02-08', '9007', 'Juara 1 Bidang Distribusi Bulan K3 Tahun 2023 - Lomba Ketangkasan Tim Pemeliharaan Jaringan Distribusi', '-', '2023-02-08', 'TA1', 'PT PLN (Persero) UID Kalselteng', '1', '2023-10-19 12:08:40', '9219008ZTY'),
	(11, '9215907ZY', '2023-02-08', '2023-02-08', '9007', 'Penghargaan Pengelolaan K3L Bidang Distribusi', '-', '2023-02-08', 'TA1', 'PT PLN (Persero) UID Kalselteng', '1', '2023-10-19 15:23:45', '9219008ZTY'),
	(12, '9215907ZY', '2022-10-27', '2022-10-27', '9007', 'Juara 1 Implementasi OMYO tingkat Nasional Skala ULP Yantek ULP Martapura UP3 Banjarmasin)', '-', '2022-10-27', 'TA1', 'PT PLN (Persero) Kantor Pusat', '1', '2023-10-19 15:25:32', '9219008ZTY'),
	(13, '9215907ZY', '2022-07-05', '2022-07-05', '9007', 'Keandalan Jaringan Distribusi Terbaik Semester 1 Tahun 2022', '-', '2022-07-05', 'TA1', 'PT PLN (Persero) UID Kalselteng', '1', '2023-10-19 15:27:16', '9219008ZTY'),
	(14, '9215907ZY', '2015-11-30', '2015-11-30', '9007', 'Implementasi Project Management Office (PMO) Terbaik kepada PT PLN (Persero) Unit Induk Pembangunan IX', '-', '2015-11-30', 'TA1', 'PT PLN (Persero)', '1', '2023-10-19 15:29:07', '9219008ZTY'),
	(15, '9215907ZY', '2015-10-16', '2015-10-16', '9007', '4th Runner Up PLN English Olympiad Tahun 2015 dalam rangka HLN ke-70', '-', '2015-10-16', '', 'PT PLN (Persero)', '1', '2023-10-19 15:30:43', '9219008ZTY'),
	(16, '7095008B', '2017-04-01', '2017-04-01', '9001', 'KESETIAAN KERJA 3 (TIGA) WINDU', '-', '2017-04-01', 'TA1', 'PT PLN (PERSERO)', '0', '', '');

-- membuang struktur untuk table hrisori.r_cluster
CREATE TABLE IF NOT EXISTS `r_cluster` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `assesment` varchar(250) DEFAULT '',
  `cluster` varchar(10) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.r_cluster: ~0 rows (lebih kurang)

-- membuang struktur untuk table hrisori.r_diklat
CREATE TABLE IF NOT EXISTS `r_diklat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `jenis_diklat` varchar(10) DEFAULT '',
  `kode_diklat` varchar(160) DEFAULT '',
  `judul_diklat` varchar(250) DEFAULT '',
  `penyelenggaraan` varchar(10) DEFAULT '',
  `kode_profesi` varchar(30) DEFAULT '',
  `level_profesiensi` varchar(10) DEFAULT '',
  `nama_institusi` varchar(160) DEFAULT '',
  `kota_institusi` varchar(10) DEFAULT '',
  `kota_lainnya` varchar(120) DEFAULT '',
  `negara_institusi` varchar(2) DEFAULT '',
  `lama_diklat` varchar(10) DEFAULT '',
  `satuan_diklat` varchar(60) DEFAULT '',
  `nilai` varchar(10) DEFAULT '',
  `grade_nilai` varchar(30) DEFAULT '',
  `jenis_pelaksanaan` varchar(30) DEFAULT '',
  `jenis_sertifikasi` varchar(30) DEFAULT '',
  `sifat_diklat` varchar(30) DEFAULT '',
  `konfirmasi_kehadiran` varchar(30) DEFAULT '',
  `keterangan_lulus` varchar(120) DEFAULT '',
  `kode_sertifikat` varchar(160) DEFAULT '',
  `tgl_terbit` varchar(10) DEFAULT '',
  `tgl_selesai` varchar(10) DEFAULT '',
  `udiklat` varchar(10) DEFAULT '',
  `keterangan_realisasi` varchar(160) DEFAULT '',
  `keterangan_penyelesaian` varchar(160) DEFAULT '',
  `kode_dahan_profesi` varchar(30) DEFAULT '',
  `dahan_profesi` varchar(200) DEFAULT '',
  `kode_transaksi` varchar(160) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Membuang data untuk tabel hrisori.r_diklat: ~10 rows (lebih kurang)
INSERT INTO `r_diklat` (`id`, `nip`, `start_date`, `end_date`, `jenis_diklat`, `kode_diklat`, `judul_diklat`, `penyelenggaraan`, `kode_profesi`, `level_profesiensi`, `nama_institusi`, `kota_institusi`, `kota_lainnya`, `negara_institusi`, `lama_diklat`, `satuan_diklat`, `nilai`, `grade_nilai`, `jenis_pelaksanaan`, `jenis_sertifikasi`, `sifat_diklat`, `konfirmasi_kehadiran`, `keterangan_lulus`, `kode_sertifikat`, `tgl_terbit`, `tgl_selesai`, `udiklat`, `keterangan_realisasi`, `keterangan_penyelesaian`, `kode_dahan_profesi`, `dahan_profesi`, `kode_transaksi`, `status_edit`, `tgl_edit`, `user_edit`) VALUES
	(1, '93163299ZY', '2021-08-10', '2021-08-13', 'JD1', 'B.1.321.18.001.3.21R1.IC', 'MANAJEMEN RISIKO FUNDAMENTAL UNTUK SUPERVISOR ATAS', 'IHT', '', '', 'UPDL BANJARBARU', '6372', '', 'ID', '3', 'SL1', '88.40', 'B', 'jplk01', '', '', 'ID', 'Lulus', 'B.1.321.18.001.3.21R1.IC.10.21.03.93163299ZY', '2021-08-26', '2021-08-26', '8219', 'Terealisasi', 'Selesai', '', '', '', '1', '', ''),
	(2, '91162462ZY', '2022-03-17', '2022-03-17', 'JD1', 'B.1.321.19.014.3.19R0.IC', 'KETRAMPILAN PERSONAL', 'IHT', '', '', 'UPDL BANJARBARU', '6372', '', 'ID', '1', 'SL1', '-', '-', 'jplk02', '', '', 'ID', '-', '-', '', '', '8219', 'Tidak Terealisasikan', 'Tidak Selesai', '', '', '', '1', '', ''),
	(3, '93151064ZY', '2021-05-04', '2021-05-07', 'JD1', 'B.1.341.20.004.3.20R0.DL', 'PENGAWASAN ASPEK KETENAGAKERJAAN PADA KONTRAK ALIH DAYA (DIGITAL LEARNING)', 'DL', '', '', 'UPDL BANJARBARU', '6372', '', 'ID', '3', 'SL1', '-', '-', 'jplk02', '', '', 'ID', 'Tidak Lulus', '', '2021-05-11', '2021-05-11', '8219', 'Terealisasi', 'Selesai', '', '', '', '1', '', ''),
	(4, '7904009F', '2021-08-18', '2021-08-31', 'JD1', 'B.1.112.20.011.3.20R0.DL', 'MANAJEMEN ASET PEMBANGKIT (DL)', 'DL', '', '', 'UPDL BANJARBARU', '6372', '', 'ID', '13', 'SL1', '-', '-', 'jplk02', '', '', 'ID', 'Tidak Lulus', '', '2021-09-03', '2021-09-03', '8219', 'Terealisasi', 'Selesai', '', '', '', '1', '', ''),
	(5, '8105010TRK', '2022-11-09', '2022-11-11', 'JD1', 'B.1.341.20.023.3.20R0.DL', 'MANAJEMEN SDM DASAR LEVEL SUPERVISORY ATAS / FUNGSIONAL IV (DIGITAL LEARNING)', 'DL', '', '', 'UPDL BANJARBARU', '6372', '', 'ID', '2', 'SL1', '74.50', 'D', 'jplk01', '', '', 'ID', 'Lulus', 'B.1.341.20.023.3.20R0.DL.10.22.07.8105010TRK', '2022-12-01', '2022-12-01', '8219', 'Terealisasi', 'Selesai', '', '', '', '1', '', ''),
	(6, '8106323Z', '2018-01-15', '2018-01-26', 'JD1', 'B.1.12.11.003.3.11R0.IC', 'TATA KELOLA PEMBANGKIT', 'ICT', '', '', 'UPDL BANJARBARU', '6372', '', 'ID', '11', 'SL1', '-', '-', 'jplk02', '', '', 'ID', 'Tidak Lulus', '', '2018-01-31', '2018-01-31', '8219', 'Terealisasi', 'Selesai', '', '', '', '1', '', ''),
	(7, '9219005ZTY', '2022-07-04', '2022-07-15', 'JD1', 'B.1.12.13.002.3.19R1.DL', 'K3 PLTD', 'DL', '', '', 'UPDL BANJARBARU', '6372', '', 'ID', '11', 'SL1', '86.50', 'B', 'jplk02', '', '', 'ID', 'Lulus', 'B.1.12.13.002.3.19R1.DL.10.22.01.9219005ZTY', '2022-07-23', '2022-07-23', '8219', 'Terealisasi', 'Selesai', '', '', '', '1', '', ''),
	(8, '9620006ZTY', '2022-09-19', '2022-09-22', 'JD1', 'B.1.21.14.006.2.14R0.DL', 'PENGENALAN SISTEM SCADA DAN TELEKOMUNIKASI', 'DL', '', '', 'UPDL BANJARBARU', '6372', '', 'ID', '3', 'SL1', '-', '-', 'jplk02', '', '', 'ID', 'Tidak Lulus', '', '2022-10-28', '2022-10-28', '8219', 'Terealisasi', 'Selesai', '', '', '', '1', '', ''),
	(9, '7802008R', '2018-03-26', '2018-03-27', 'JD1', 'B.1.49.13.001.2.13R0.IC', 'MANAJEMEN PERUBAHAN LEVEL MD/FIII PERSYARATAN', 'ICT', '', '', 'UPDL BANJARBARU', '6372', '', 'ID', '1', 'SL1', '77.50', 'C', 'jplk01', '', '', 'ID', 'Lulus', 'B.1.49.13.001.2.13R0.IC.10.18.02.7802008R', '2018-04-02', '2018-04-02', '8219', 'Terealisasi', 'Selesai', '', '', '', '1', '', ''),
	(10, '6890008S', '2018-11-16', '2018-11-19', 'JD1', 'B.1.49.13.001.2.13R0.IC', 'MANAJEMEN PERUBAHAN LEVEL MD/FIII PERSYARATAN PEMBELAJARAN EE/SSE III', 'ICT', '', '', 'UPDL BANJARBARU', '6372', '', 'ID', '3', 'SL1', '84.20', 'B', 'jplk01', '', '', 'ID', 'Lulus', 'B.1.49.13.001.2.13R0.IC.10.18.05.6890008S', '2018-11-26', '2018-11-26', '8219', 'Terealisasi', 'Selesai', '', '', '', '1', '', '');

-- membuang struktur untuk table hrisori.r_diklat_penjenjangan
CREATE TABLE IF NOT EXISTS `r_diklat_penjenjangan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `jenis_diklat` varchar(10) DEFAULT '',
  `kode_diklat` varchar(160) DEFAULT '',
  `judul_diklat` varchar(250) DEFAULT '',
  `udiklat` varchar(10) DEFAULT '',
  `kode_profesi` varchar(10) DEFAULT '',
  `level_profesiensi` varchar(10) DEFAULT '',
  `grade_nilai` varchar(30) DEFAULT '',
  `nilai` varchar(10) DEFAULT '',
  `keterangan_lulus` varchar(120) DEFAULT '',
  `keterangan_penyelesaian` varchar(160) DEFAULT '',
  `kode_sertifikat` varchar(160) DEFAULT '',
  `tgl_terbit` varchar(10) DEFAULT '',
  `tgl_selesai` varchar(10) DEFAULT '',
  `kode_transaksi` varchar(160) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Membuang data untuk tabel hrisori.r_diklat_penjenjangan: ~14 rows (lebih kurang)
INSERT INTO `r_diklat_penjenjangan` (`id`, `nip`, `start_date`, `end_date`, `jenis_diklat`, `kode_diklat`, `judul_diklat`, `udiklat`, `kode_profesi`, `level_profesiensi`, `grade_nilai`, `nilai`, `keterangan_lulus`, `keterangan_penyelesaian`, `kode_sertifikat`, `tgl_terbit`, `tgl_selesai`, `kode_transaksi`, `status_edit`, `tgl_edit`, `user_edit`) VALUES
	(1, '6793163Z', '2014-07-21', '2015-11-16', 'C', '', 'Executive Education I', '', '', '', '', '', '', '', '', '', '', '', '0', '', ''),
	(2, '6793163Z', '2012-07-12', '2013-01-11', 'C', '', 'Executive Education II', '', '', '', '', '', '', '', '', '', '', '', '0', '', ''),
	(3, '7702003R2', '2020-10-13', '2021-02-03', 'C', 'C.1.341.21.033.5.21R0.IC', 'EXECUTIVE EDUCATION II', '8212', '', '', '', '', '', '', '', '', '', '', '0', '', ''),
	(4, '7702003R2', '2021-10-18', '2022-10-13', 'C', 'C.1.341.21.034.6.21R0.IC', 'EXECUTIVE EDUCATION I', '8212', '', '', 'B', '89.26', 'LULUS', '', 'C.2.47.16.001.4.16R0.IC', '', '', '', '0', '', ''),
	(5, '7702011E', '2021-11-01', '2022-04-13', 'C', 'C.2.341.21.008.1.21R0.IC', 'SUPERVISORY EDUCATION I', '8212', '', '', '', '', 'LULUS', '', '', '', '', '', '0', '', ''),
	(6, '8106323Z', '2022-01-24', '2022-05-17', 'C', 'C.1.341.21.034.6.21R0.IC', 'EXECUTIVE EDUCATION I', '8212', '', '', '', '', 'LULUS', '', '', '', '', '', '0', '', ''),
	(7, '8207216Z', '2022-03-07', '2022-06-27', 'C', 'C.1.341.21.032.4.21R0.IC', 'EXECUTIVE EDUCATION III', '', '', '', '', '', '', '', '', '', '', '', '0', '', ''),
	(8, '8509719Z', '2022-01-27', '2022-06-07', 'C', 'C.1.341.21.032.4.21R0.IC', 'EXECUTIVE EDUCATION III', '8212', '', '', '', '', '', '', '', '', '', '', '0', '', ''),
	(9, '8510210Z', '2022-01-24', '2022-05-17', 'C', 'C.1.341.21.032.4.21R0.IC', 'EXECUTIVE EDUCATION III', '8212', '', '', '', '', 'LULUS', '', '', '', '', '', '0', '', ''),
	(10, '93163366ZY', '2020-10-12', '2021-04-09', 'C', 'C.1.341.21.086.4.21R0.IC', 'SUPERVISORY EDUCATION I', '8219', '', '', '', '', '', '', '', '', '', '', '0', '', ''),
	(11, '93163299ZY', '2021-08-05', '2022-01-24', 'C', 'C.1.341.21.086.4.21R0.IC', 'SUPERVISORY EDUCATION I', '8219', '', '', '', '', 'LULUS', '', '', '', '', '', '0', '', ''),
	(12, '8017001TRK', '2022-09-05', '2022-12-19', 'C', 'C.2.47.12.001.2.16R1.IC', 'EXECUTIVE EDUCATION III', '', '', '', '', '', '', '', '', '', '', '', '0', '', ''),
	(13, '8410002TRK', '2022-07-21', '2022-11-22', 'C', 'C.1.341.21.086.4.21R0.IC', 'SUPERVISORY EDUCATION I', '', '', '', '', '', '', '', '', '', '', '', '0', '', ''),
	(14, '7095008B', '2014-09-22', '2015-02-03', '12130050', 'C.2.47.12.001.2.16R1.IC', 'DIKLAT PENJENJANGAN SYSTEM  TO OPTIMIZATION', '8211', '', '', '', '', '', '', '', '', '', '', '1', '2024-01-11 09:35:09', '9219008ZTY');

-- membuang struktur untuk table hrisori.r_foto
CREATE TABLE IF NOT EXISTS `r_foto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `lokasi_foto` varchar(255) DEFAULT '',
  `nama_file` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.r_foto: ~40 rows (lebih kurang)
INSERT INTO `r_foto` (`id`, `nip`, `lokasi_foto`, `nama_file`) VALUES
	(1, '6691029E', '', '6691029E.jpg'),
	(2, '7410021TRK', '', '7410021TRK.jpg'),
	(3, '9420009ZTY', '', '9420009ZTY.jpg'),
	(4, '92171742ZY', '', '92171742ZY.jpg'),
	(5, '8509719Z', '', '8509719Z.jpg'),
	(6, '8206607Z', '', '8206607Z.jpg'),
	(7, '9420002ZTY', '', '9420002ZTY.jpg'),
	(8, '9720005ZTY', '', '9720005ZTY.jpg'),
	(9, '88111121Z', '', '88111121Z.jpg'),
	(10, '8711868Z', '', '8711868Z.jpg'),
	(11, '8611098Z', '', '8611098Z.jpg'),
	(12, '9315638ZY', '', '9315638ZY.jpg'),
	(13, '9317002TRK', '', '9317002TRK.jpg'),
	(14, '9619016ZTY', '', '9619016ZTY.jpg'),
	(15, '8610009TRK', '', '8610009TRK.jpg'),
	(16, '8106323Z', '', '8106323Z.jpg'),
	(17, '9620015ZTY', '', '9620015ZTY.jpg'),
	(18, '8510210Z', '', '8510210Z.jpg'),
	(19, '9219008ZTY', '', '9219008ZTY.jpg'),
	(20, '7602004ICP', '', '7602004ICP.jpg'),
	(21, '9620001ZTY', '', '9620001ZTY.jpg'),
	(22, '9520013ZTY', '', '9520013ZTY.jpg'),
	(23, '9920014ZTY', '', '9920014ZTY.jpg'),
	(24, '9620006ZTY', '', '9620006ZTY.jpg'),
	(25, '9419013ZTY', '', '9419013ZTY.jpg'),
	(26, '7905007TRK', '', '7905007TRK.jpg'),
	(27, '9319006ZTY', '', '9319006ZTY.jpg'),
	(28, '7805025TRK', '', '7805025TRK.jpg'),
	(29, '8610011TRK', '', '8610011TRK.jpg'),
	(30, '93163366ZY ', '', '93163366ZY .jpg'),
	(31, '9519009ZTY', '', '9519009ZTY.jpg'),
	(32, '93151064ZY', '', '93151064ZY.jpg'),
	(33, '8105027TRK', '', '8105027TRK.jpg'),
	(34, '6805003TRK', '', '6805003TRK.jpg'),
	(35, '7095008B', '', '7095008B.jpg'),
	(36, '8205016TRK', '', '8205016TRK.jpg'),
	(37, '6793082D', '', '6793082D.jpg'),
	(38, '7510005TRK', '', '7510005TRK.jpg'),
	(39, '7702003R2', '', '7702003R2.jpg'),
	(40, '9720012ZTY', '', '9720012ZTY.jpg');

-- membuang struktur untuk table hrisori.r_grade
CREATE TABLE IF NOT EXISTS `r_grade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `grade` varchar(120) DEFAULT '',
  `level_phdp` varchar(2) DEFAULT '',
  `kode_reason` varchar(10) DEFAULT '',
  `kode_subtype` varchar(10) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.r_grade: ~10 rows (lebih kurang)
INSERT INTO `r_grade` (`id`, `nip`, `start_date`, `end_date`, `grade`, `level_phdp`, `kode_reason`, `kode_subtype`, `status_edit`, `tgl_edit`, `user_edit`) VALUES
	(1, '9720004ZTY', '2020-11-01', '2022-12-31', 'GRD20', '0', '', 'ST1', '0', '', ''),
	(2, '9820011ZTY', '2020-12-01', '2022-12-31', 'GRD20', '0', '', 'ST1', '0', '', ''),
	(3, '7493179D', '2020-07-01', '2022-09-30', 'GRD13', '33', '0', 'ST1', '0', '', ''),
	(4, '7095008B', '2023-01-01', '9999-12-31', 'GRD73', '24', 'RG9', 'ST1', '1', '2023-07-25 11:42:44', 'sandy'),
	(5, '8102002E', '2021-01-01', '2022-06-30', 'GRD16', '14', '', 'ST1', '1', '2023-08-07 12:04:10', '9219008ZTY'),
	(6, '8105027TRK', '2017-07-01', '2020-06-30', 'GRD20', '0', 'RG6', 'ST1', '1', '2023-10-20 17:39:46', '9219008ZTY'),
	(7, '6691029E', '2019-01-01', '2021-12-31', 'GRD12', '27', '', 'ST1', '0', '', ''),
	(8, '6805003TRK', '2019-07-01', '2022-12-31', 'GRD19', '0', '', 'ST1', '0', '', ''),
	(9, '6691029E', '2022-01-01', '2022-09-30', 'GRD11', '27', '', 'ST1', '0', '', ''),
	(10, '6793163Z', '2023-01-01', '9999-12-31', 'GRD57', '30', 'RG14', '8', '1', '2023-07-25 11:47:10', '9219008ZTY');

-- membuang struktur untuk table hrisori.r_hukuman
CREATE TABLE IF NOT EXISTS `r_hukuman` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `jenis_grievances` varchar(10) DEFAULT '',
  `reason_grievances` varchar(10) DEFAULT '',
  `nip_atasan` varchar(30) DEFAULT '',
  `nama_atasan` varchar(60) DEFAULT '',
  `status_grievances` varchar(10) DEFAULT '',
  `stage_grievances` varchar(10) DEFAULT '',
  `result_grievances` varchar(10) DEFAULT '',
  `rupiah` double NOT NULL DEFAULT '0',
  `no_sk_hukuman` varchar(120) DEFAULT '',
  `tgl_sk_hukuman` varchar(10) DEFAULT '',
  `pasal_pelanggaran` text,
  `hukuman` text,
  `keterangan` text,
  `no_sk_terkait` varchar(200) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Membuang data untuk tabel hrisori.r_hukuman: ~3 rows (lebih kurang)
INSERT INTO `r_hukuman` (`id`, `nip`, `start_date`, `end_date`, `jenis_grievances`, `reason_grievances`, `nip_atasan`, `nama_atasan`, `status_grievances`, `stage_grievances`, `result_grievances`, `rupiah`, `no_sk_hukuman`, `tgl_sk_hukuman`, `pasal_pelanggaran`, `hukuman`, `keterangan`, `no_sk_terkait`, `status_edit`, `tgl_edit`, `user_edit`) VALUES
	(1, '93163366ZY', '2020-01-01', '2020-06-30', 'JG2', '5', '', '', '4', '4', '10', 0, '009.K/SDM.06.02/GM UIP KALBAGTIM/2020/', '2019-12-20', 'Pasal 5 ayat 20 Peraturan Disiplin Pegawai pada Lampiran Perjanjian Kerja Bersama antara PT PLN (Per', 'SP 1 dengan Kriteria Talenta PPS 1 Semester', 'Sanksi disiplin sedang berupa Peringatan Tertulis Pertama yang berlaku selama 6 (enam) bulan', 'PKB NOMOR 140-1.PJ/040/DIR/201', '0', '', ''),
	(2, '8711868Z', '2020-01-01', '2020-06-30', 'JG2', '5', '', '', '4', '4', '10', 0, '901.K/SDM.06.02/GM UIP KALBAGTIM/2019/', '2019-12-20', 'Pasal 5 ayat 20 Peraturan Disiplin Pegawai pada Lampiran Perjanjian Kerja Bersama antara PT PLN (Per', 'SP 1 dengan Kriteria Talenta PPS 1 Semester', 'Sanksi disiplin sedang berupa Peringatan Tertulis Pertama yang berlaku selama 6 (enam) bulan', 'PKB NOMOR 140-1.PJ/040/DIR/201', '0', '', ''),
	(3, '6691029E', '2018-03-01', '2018-08-01', 'JG2', '5', '', '', '4', '4', '10', 0, '0206/SDM.06.02/GM.WSUTG/2018/', '2018-02-26', 'PASAL 5 POIN 21', 'HUKUMAN DISIPLIN SEDANG', 'PERINGATAN TERTULIS PERTAMA BERLAKU 6 BULAN DAN TALENTA PPS', 'PKB NOMOR 140-1.PJ/040/DIR/201', '0', '', '');

-- membuang struktur untuk table hrisori.r_identitas
CREATE TABLE IF NOT EXISTS `r_identitas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `kode_identitas` varchar(2) DEFAULT '',
  `id_number` varchar(30) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.r_identitas: ~10 rows (lebih kurang)
INSERT INTO `r_identitas` (`id`, `nip`, `start_date`, `end_date`, `kode_identitas`, `id_number`, `status_edit`, `tgl_edit`, `user_edit`) VALUES
	(1, '6793163Z', '2019-01-01', '9999-12-31', '1', '2171102412679004', '0', '', ''),
	(2, '9519012ZTY', '2021-12-01', '9999-12-31', '11', '842975260702000', '0', '', ''),
	(3, '9419013ZTY', '2021-09-01', '9999-12-31', '1', '1671082506940013', '0', '', ''),
	(4, '9419013ZTY', '2021-09-01', '9999-12-31', '11', '900163189301000', '0', '', ''),
	(5, '9419014ZTY', '2021-03-01', '9999-12-31', '1', '3573041501940005', '0', '', ''),
	(6, '6793163Z', '2019-01-01', '9999-12-31', '11', '144151362803000', '0', '', ''),
	(7, '9419014ZTY', '2021-03-01', '9999-12-31', '11', '763087160652000', '0', '', ''),
	(8, '6592053Z', '2019-01-01', '9999-12-31', '1', '3578230309650002', '0', '', ''),
	(9, '9619015ZTY', '2021-07-01', '9999-12-31', '1', '1671142112960007', '0', '', ''),
	(10, '9619015ZTY', '2021-07-01', '9999-12-31', '11', '908891773306000', '0', '', '');

-- membuang struktur untuk table hrisori.r_jabatan
CREATE TABLE IF NOT EXISTS `r_jabatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `ee_group` varchar(10) DEFAULT '',
  `ee_subgroup` varchar(120) DEFAULT '',
  `job_key` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `kota_organisasi` varchar(10) DEFAULT '',
  `jenis_jabatan` varchar(120) DEFAULT '',
  `jenjang_jabatan` varchar(120) DEFAULT '',
  `kode_profesi` varchar(30) DEFAULT '',
  `nama_profesi` varchar(160) DEFAULT '',
  `jenis_unit` varchar(160) DEFAULT '',
  `kelas_unit` varchar(60) DEFAULT '',
  `kode_daerah` varchar(30) DEFAULT '',
  `stream_business` varchar(60) DEFAULT '',
  `achievements` varchar(160) DEFAULT '',
  `tupoksi` varchar(160) DEFAULT '',
  `company_code` varchar(160) DEFAULT '',
  `business_area` varchar(160) DEFAULT '',
  `personal_area` varchar(10) DEFAULT '',
  `personal_sub_area` varchar(10) DEFAULT '',
  `level_organisasi1` varchar(160) DEFAULT '',
  `level_organisasi2` varchar(160) DEFAULT '',
  `level_organisasi3` varchar(160) DEFAULT '',
  `level_organisasi4` varchar(160) DEFAULT '',
  `level_organisasi5` varchar(160) DEFAULT '',
  `level_organisasi6` varchar(160) DEFAULT '',
  `level_organisasi7` varchar(160) DEFAULT '',
  `level_organisasi8` varchar(160) DEFAULT '',
  `level_organisasi9` varchar(160) DEFAULT '',
  `level_organisasi10` varchar(160) DEFAULT '',
  `level_organisasi11` varchar(160) DEFAULT '',
  `level_organisasi12` varchar(160) DEFAULT '',
  `level_organisasi13` varchar(160) DEFAULT '',
  `level_organisasi14` varchar(160) DEFAULT '',
  `level_organisasi15` varchar(160) DEFAULT '',
  `tingkat_pengalaman` varchar(10) DEFAULT '',
  `jenis_jabatan_ap` varchar(10) DEFAULT '',
  `jenjang_jabatan_ap` varchar(160) DEFAULT '',
  `kode_posisi` varchar(160) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.r_jabatan: ~10 rows (lebih kurang)
INSERT INTO `r_jabatan` (`id`, `nip`, `start_date`, `end_date`, `ee_group`, `ee_subgroup`, `job_key`, `jabatan`, `kota_organisasi`, `jenis_jabatan`, `jenjang_jabatan`, `kode_profesi`, `nama_profesi`, `jenis_unit`, `kelas_unit`, `kode_daerah`, `stream_business`, `achievements`, `tupoksi`, `company_code`, `business_area`, `personal_area`, `personal_sub_area`, `level_organisasi1`, `level_organisasi2`, `level_organisasi3`, `level_organisasi4`, `level_organisasi5`, `level_organisasi6`, `level_organisasi7`, `level_organisasi8`, `level_organisasi9`, `level_organisasi10`, `level_organisasi11`, `level_organisasi12`, `level_organisasi13`, `level_organisasi14`, `level_organisasi15`, `tingkat_pengalaman`, `jenis_jabatan_ap`, `jenjang_jabatan_ap`, `kode_posisi`, `status_edit`, `tgl_edit`, `user_edit`) VALUES
	(1, '7205006TRK', '2019-01-01', '2021-08-01', '8', 'EESG1', '', 'PLT MANAGER AREA PALOPO DAN MAMUJU PADA REGION SULAWESI 2 PT PLN TARAKAN', '7373', 'JB1', 'JJ4', 'DST 1.7.1.4', '', 'AREA', '', '', '', '', '', '1200', '1201', '1235', '1253', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'JB1', 'JJ4', '37426189', '0', '', ''),
	(2, '7205009TRK', '2020-02-01', '2022-09-30', '8', 'EESG1', '', 'PLT MANAGER AREA KETAPANG', '6106', 'JB1', 'JJ4', 'DST 1.7.1.4', '', 'AREA', '', '', '', '', '', '1200', '1201', '1231', '1240', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'JB1', 'JJ4', '37425973', '0', '', ''),
	(3, '7205009TRK', '2022-10-01', '2022-12-31', '8', 'EESG1', '', 'PLT MANAGER BAGIAN K3 DAN LINGKUNGAN', '6171', 'JB1', 'JJ4', 'K3L 2.6.1.1', '', 'UNIT PELAKSANA', '', '', '', '', '', '1200', '1201', '1231', '', 'PT PLN TARAKAN', 'REGION KALIMANTAN 1', 'BAGIAN K3 DAN LINGKUNGAN', '', '', '', '', '', '', '', '', '', '', '', '', '', 'JB1', 'JJ4', '37425949', '0', '', ''),
	(4, '6592053Z', '2019-01-01', '2022-09-30', '0', 'EESG16', '', 'DIREKTUR OPERASI DAN PENGEMBANGAN USAHA PADA PT PLN TARAKAN', '6471', 'JB1', 'JJ2', 'DST 1.7.1.4', '', 'PUSAT', '', '', '', '', '', '1200', '1201', '1230', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'JB1', 'JJ2', '30270340', '0', '', ''),
	(5, '6592053Z', '2022-10-01', '2023-08-02', '0', 'EESG16', '', 'DIREKTUR OPERASI DAN PENGEMBANGAN USAHA PADA PT PLN TARAKAN', '6471', 'JB1', 'MM-20', 'DST 1.7.1.4', '', 'PUSAT', '', '', '', '', '', '1200', '1201', '1230', '1303', 'PT PLN TARAKAN', 'DIREKTORAT OPERASI DAN PENGEMBANGAN USAHA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'JB1', 'JJ36', '30270340', '0', '', ''),
	(6, '7904009F', '2022-03-01', '2022-09-30', '1', 'EESG12', '', 'VICE PRESIDENT OPERASI PADA PT PLN TARAKAN', '6471', 'JB1', 'JJ2', 'DST 1.7.1.1', '', 'PUSAT', '', '', '', '', '', '1200', '1201', '1230', '1303', 'PT PLN TARAKAN', 'DIREKTORAT OPERASI DAN PENGEMBANGAN USAHA', 'DIVISI OPERASI', '', '', '', '', '', '', '', '', '', '', '', '', '', 'JB1', 'JJ2', '37425892', '0', '', ''),
	(7, '6610023TRK', '2021-07-01', '2022-10-31', '8', 'EESG1', '', 'JUNIOR OFFICER ADMINISTRASI PADA SEKSI OPERASI AREA KALIMANTAN UTARA', '6571', 'JB2', 'JJ11', 'SDM 2.1.1.3', '', 'AREA', '', '', '', '', '', '1200', '1201', '1233', '1265', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'JB2', 'JJ11', '37426081', '0', '', ''),
	(8, '8207216Z', '2022-10-01', '2023-04-30', '1', 'EESG12', '', 'MANAGER DISTRIBUSI DAN PELAYANAN PELANGGAN PADA DIVISI OPERASI PT PLN TARAKAN', '6471', 'JB1', 'MD-16', 'DST 1.7.1.4', '', 'PUSAT', '', '', '', '', '', '1200', '1201', '1230', '1303', 'PT PLN TARAKAN', 'DIREKTORAT OPERASI DAN PENGEMBANGAN USAHA', 'DIVISI OPERASI', 'BIDANG DISTRIBUSI DAN PELAYANAN PELANGGAN', '', '', '', '', '', '', '', '', '', '', '', '', 'JB1', 'MD-16', '37425901', '0', '', ''),
	(9, '7904009F', '2022-10-01', '2023-12-31', '1', 'EESG12', 'PLNND_VP_OP', 'VICE PRESIDENT OPERASI', '6471', 'JB1', 'MM-18', 'DST 1.7.1.1', '', 'PUSAT', '', '', '', '', '', '1200', '1201', '1230', '1303', 'PT PLN TARAKAN', 'DIREKTORAT OPERASI DAN PENGEMBANGAN USAHA', 'DIVISI OPERASI', '', '', '', '', '', '', '', '', '', '', '', '', '', 'JB1', 'MM-18', 'PLNT0007', '0', '', ''),
	(10, '7905006R2', '2021-07-01', '2022-07-31', '1', 'EESG12', '', 'ASSISTANT MANAGER ADMINISTRASI UMUM PADA BIDANG ADMINISTRASI SDM DAN UMUM DIVISI SDM DAN UMUM PT PLN TARAKAN', '6471', 'JB1', 'JJ4', 'MPU 2.5.2.1', '', 'PUSAT', '', '', '', '', '', '1200', '1201', '1230', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'JB1', 'JJ4', '37425935', '0', '', '');

-- membuang struktur untuk table hrisori.r_karya_tulis
CREATE TABLE IF NOT EXISTS `r_karya_tulis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `judul` varchar(250) DEFAULT '',
  `media_publikasi` varchar(250) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `kode_jenis` varchar(10) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.r_karya_tulis: ~6 rows (lebih kurang)
INSERT INTO `r_karya_tulis` (`id`, `nip`, `start_date`, `end_date`, `judul`, `media_publikasi`, `tahun`, `kode_jenis`, `status_edit`, `tgl_edit`, `user_edit`) VALUES
	(1, '6793163Z', '2016-01-01', '2016-12-30', 'Peningkatan Manajemen Transaksi Energi Listrik Dalam Upaya Perbaikan Kinerja Susut PLN DJBB Menuju Implementasi Performance Base Regulation', '', '2017', 'JKT1', '0', '', ''),
	(2, '8510210Z', '2021-01-01', '2021-12-31', 'MENDEWASAKAN PENGELOLAAN BATU BARA PLTU', 'INTERNAL', '2021', 'JKT1', '0', '', ''),
	(3, '8510210Z', '2021-03-01', '2021-12-31', 'LOMBA KARYA INOVASI SISTEM MANAJEMEN KONTRAK DAN INVOICE', 'PLN GRUP', '2021', 'JKT1', '0', '', ''),
	(4, '8106323Z', '2021-01-01', '2021-12-31', 'LOMBA KARYA INOVASI SAFETY ON ESSENTIALS', 'PLN GROUP', '2021', 'JKT1', '0', '', ''),
	(5, '9215907ZY', '2021-07-01', '2021-07-01', 'Analisis Pengaruh Beban Kerja dan Corporate University Training terhadap Kinerja Karyawan', 'Jurnal Sosial dan Teknologi', '2021', 'JKT1', '1', '2023-10-20 09:53:33', '9219008ZTY'),
	(6, '9215907ZY', '2014-07-01', '2014-07-01', 'Analisis Risiko Operasional pada Divisi Bengkel PT XYZ Branch Office Malang', 'Jurnal Rekayasa dan Manajemen Sistem Industri', '2014', 'JKT1', '1', '2023-10-20 09:54:52', '9219008ZTY');

-- membuang struktur untuk table hrisori.r_keahlian
CREATE TABLE IF NOT EXISTS `r_keahlian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `kode_profesi` varchar(30) DEFAULT '',
  `tingkat_keahlian` varchar(30) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.r_keahlian: ~2 rows (lebih kurang)
INSERT INTO `r_keahlian` (`id`, `nip`, `start_date`, `end_date`, `kode_profesi`, `tingkat_keahlian`, `status_edit`, `tgl_edit`, `user_edit`) VALUES
	(1, '9219008ZTY', '2022-12-01', '2022-12-05', 'SDM 3.4.1.1', 'TK2', '0', '', ''),
	(2, '9219008ZTY', '2022-12-01', '2022-12-05', 'KCP 3.6.1.5', 'TK2', '0', '', '');

-- membuang struktur untuk table hrisori.r_keluarga
CREATE TABLE IF NOT EXISTS `r_keluarga` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `id_jenis_keluarga` varchar(10) DEFAULT '',
  `no_urut` int NOT NULL DEFAULT '1',
  `nama` varchar(200) DEFAULT '',
  `jenis_kelamin` varchar(10) DEFAULT '',
  `tempat_lahir` varchar(60) DEFAULT '',
  `tgl_lahir` varchar(10) DEFAULT '',
  `id_agama` varchar(4) DEFAULT '',
  `pekerjaan` varchar(200) DEFAULT '',
  `pln_group` varchar(10) DEFAULT 'TIDAK',
  `kode_perusahaan` varchar(4) DEFAULT '',
  `nip_keluarga` varchar(30) DEFAULT '',
  `status_warganegara` varchar(10) DEFAULT '',
  `jenis_alamat` varchar(30) DEFAULT '',
  `alamat` text,
  `id_provinsi` varchar(3) DEFAULT '',
  `id_kabupaten` varchar(4) DEFAULT '',
  `kode_pos` varchar(10) DEFAULT '',
  `no_kk` varchar(30) DEFAULT '',
  `nik` varchar(30) DEFAULT '',
  `npwp` varchar(15) DEFAULT '',
  `telepon` varchar(30) DEFAULT '',
  `gol_darah` varchar(10) DEFAULT '',
  `no_bpjs_kes` varchar(60) DEFAULT '',
  `status_fasilitas_kesehatan` varchar(120) DEFAULT '',
  `no_akta` varchar(120) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.r_keluarga: ~10 rows (lebih kurang)
INSERT INTO `r_keluarga` (`id`, `nip`, `start_date`, `end_date`, `id_jenis_keluarga`, `no_urut`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `id_agama`, `pekerjaan`, `pln_group`, `kode_perusahaan`, `nip_keluarga`, `status_warganegara`, `jenis_alamat`, `alamat`, `id_provinsi`, `id_kabupaten`, `kode_pos`, `no_kk`, `nik`, `npwp`, `telepon`, `gol_darah`, `no_bpjs_kes`, `status_fasilitas_kesehatan`, `no_akta`, `status_edit`, `tgl_edit`, `user_edit`) VALUES
	(1, '6793163Z', '1973-03-09', '9999-12-31', '1', 1, 'COKORDA ISTRI ASTINI', 'JK2', 'SURABAYA', '1973-03-09', 'HND', 'WIRASWASTA', 'TIDAK', '', '', 'SK1', 'JA2', 'KOMPLEK CIGADUNG INDAH, NO.2', '32', '', '40191', '3273181206150001', '2171104903739012', '', '', '', '0002452982578', '', '', '0', '', ''),
	(2, '8610009TRK', '1986-04-19', '9999-12-31', '1', 1, 'MUNATI', 'JK2', 'TARAKAN', '1986-04-19', 'ISL', '', '', '', '', 'SK1', 'JA2', 'JL. SWARAN RT 12 KEL KARANG HARAPAN JUATA', '65', '', '77111', '', '', '', '', '', '', '', '', '0', '', ''),
	(3, '8610009TRK', '2012-04-26', '9999-12-31', '2', 1, 'DIMAS ARYASATYA DZAKIIR', 'JK1', 'TARAKAN', '2012-04-26', 'ISL', '', '', '', '', 'SK1', 'JA2', 'JL. SWARAN RT 12 KEL KARANG HARAPAN JUATA', '65', '', '77111', '', '', '', '', '', '0001298981621', '', '', '0', '', ''),
	(4, '6793163Z', '1998-10-05', '9999-12-31', '2', 1, 'I GEDE NGURAH EKA DHARMAYUDHA', 'JK1', 'BOGOR', '1998-10-05', 'HND', 'BELUM BEKERJA', 'TIDAK', '', '', 'SK1', 'JA2', 'KOMPLEK CIGADUNG INDAH, NO.2', '32', '', '40191', '3273181206150001', '2171100510989004', '', '', '', '0002452982736', '', '', '0', '', ''),
	(5, '6793163Z', '2000-07-16', '9999-12-31', '2', 2, 'I MADE NGURAH CHANDRA MARUTHA', 'JK1', 'BOGOR', '2000-07-16', 'HND', 'BELUM BEKERJA', 'TIDAK', '', '', 'SK1', 'JA2', 'KOMPLEK CIGADUNG INDAH, NO.2', '32', '', '40191', '3273181206150001', '2171101607009007', '', '', '', '0002452982916', '', '', '0', '', ''),
	(6, '6793163Z', '2001-12-14', '9999-12-31', '2', 3, 'I NYOMAN NGURAH SURYA JAYA', 'JK1', 'BOGOR', '2001-12-14', 'HND', 'BELUM BEKERJA', 'TIDAK', '', '', 'SK1', 'JA2', 'KOMPLEK CIGADUNG INDAH, NO.2', '32', '', '40191', '3273181206150001', '2171101412019008', '', '', '', '0002452983118', '', '', '0', '', ''),
	(7, '6592053Z', '1969-11-08', '9999-12-31', '1', 1, 'IKE ANDARII RETNO', 'JK2', 'LUMAJANG', '1969-11-08', 'ISL', 'IBU RUMAH TANGGA', 'TIDAK', '', '', 'SK1', 'JA2', 'GRAHA KEBON SARI LVK.X/40 RT/RW. 007/003KEL/KEBON SARI', '35', '', '60233', '3578232706120009', '3578234811690003', '', '', '', '0002138168081', '', '', '0', '', ''),
	(8, '6592053Z', '1996-08-26', '9999-12-31', '2', 1, 'TONY ARYANTARA PRIHARSO', 'JK1', 'PEKANBARU', '1996-08-26', 'ISL', 'BELUM BEKERJA', 'TIDAK', '', '', 'SK1', 'JA2', 'GRAHA KEBON SARI LVK.X/40 RT/RW. 007/003KEL/KEBON SARI', '35', '', '60233', '3578232706120009', '3578232608960002', '', '', '', '0002998978007', '', '', '0', '', ''),
	(9, '8610009TRK', '2022-01-10', '9999-12-31', '2', 2, 'DAANIA ARSYILA HUMAIRAH', 'JK2', 'BALIKPAPAN', '2022-01-10', 'ISL', '', '', '', '', 'SK1', 'JA2', 'JL. SWARAN RT 12 KEL KARANG HARAPAN JUATA', '65', '', '77111', '', '', '', '', '', '', '', '', '0', '', ''),
	(10, '6592053Z', '1999-08-20', '9999-12-31', '2', 2, 'DEVITA AYU NUR FAJRINA', 'JK2', 'PEKANBARU', '1999-08-20', 'ISL', 'BELUM BEKERJA', 'TIDAK', '', '', 'SK1', 'JA2', 'GRAHA KEBON SARI LVK.X/40 RT/RW. 007/003KEL/KEBON SARI', '35', '', '60233', '3578232706120009', '3578236008990003', '', '', '', '0002138197972', '', '', '0', '', '');

-- membuang struktur untuk table hrisori.r_keyb
CREATE TABLE IF NOT EXISTS `r_keyb` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `kompetensi` varchar(250) DEFAULT '',
  `detail_kyb` varchar(10) DEFAULT '',
  `nilai` varchar(160) DEFAULT '',
  `assignment` varchar(160) DEFAULT '',
  `selft` varchar(160) DEFAULT '',
  `training` varchar(160) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '1',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.r_keyb: ~0 rows (lebih kurang)

-- membuang struktur untuk table hrisori.r_kompetensi
CREATE TABLE IF NOT EXISTS `r_kompetensi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `cluster` varchar(10) DEFAULT '',
  `kompetensi` varchar(10) DEFAULT '',
  `rating` varchar(200) DEFAULT '',
  `deskripsi` varchar(200) DEFAULT '',
  `presentase` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.r_kompetensi: ~0 rows (lebih kurang)

-- membuang struktur untuk table hrisori.r_lembaga
CREATE TABLE IF NOT EXISTS `r_lembaga` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `nama_organisasi` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `uraian_kegiatan` text,
  `kode_organisasi` varchar(3) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.r_lembaga: ~12 rows (lebih kurang)
INSERT INTO `r_lembaga` (`id`, `nip`, `start_date`, `end_date`, `nama_organisasi`, `jabatan`, `uraian_kegiatan`, `kode_organisasi`, `status_edit`, `tgl_edit`, `user_edit`) VALUES
	(1, '92161372ZY', '2023-12-19', '2024-12-19', 'Masyarakat Energi Terbarukan Indonesia', 'Anggota', 'Masyarakat Energi Terbarukan Indonesia / Indonesia Renewable Energy Society (METI/IRES) merupakan sebuah organisasi nirlaba (Nonprofit Organization/NPO) yang secara aktif mempromosikan pemanfaatan Energi Terbarukan untuk meningkatkan keamanan energi, meningkatkan akses energi, dan mengurangi emisi gas rumah kaca di Indonesia.', 'JO2', '0', '', ''),
	(2, '9219008ZTY', '2020-07-01', '2022-08-16', 'KOPERASI SUMBER RIZKI KITA', 'SEKRETARIS', '', 'JO2', '0', '', ''),
	(3, '6793163Z', '2016-01-01', '2019-12-31', 'BINROH HINDU', 'KETUA', 'Kegiatan Pembinaan Kerohanian Hindu bagi Pegawai PLN dan keluarganya', 'JO2', '0', '', ''),
	(4, '6793163Z', '2018-01-01', '2022-06-30', 'Forum Alumni KMHDI', 'KETUA PRESIDIUM', 'Koordinasi dan komunikasi serta pemberdayaan sesama Alumni KMHDI se Indonesia', 'JO2', '0', '', ''),
	(5, '9219004ZTY', '2021-01-01', '2022-08-16', 'KOPERASI SUMBER RIZKI KITA', 'KETUA', '', 'JO2', '0', '', ''),
	(6, '7702003R2', '2016-08-01', '2022-08-16', 'Ikatan Akuntan Publik Indonesia (IAPI)', 'ANGGOTA', 'Organisasi Profesi Akuntan Publik', 'JO2', '0', '', ''),
	(7, '7702003R2', '2014-08-01', '2022-08-16', 'Ikatan Akuntan Indonesia (IAI)', 'ANGGOTA', 'Organisasi Profesi Akuntan Indonesia', 'JO2', '0', '', ''),
	(8, '7702003R2', '2021-01-01', '2022-08-16', 'Indonesian Risk Management Professional Association (IRMAPA)', 'ANGGOTA', 'Organisasi Profesi Manajemen Risiko', 'JO2', '0', '', ''),
	(9, '8610011TRK', '2019-07-01', '2020-12-31', 'SUMBER RIZKI KITA', 'KETUA', '', 'JO2', '0', '', ''),
	(10, '8205016TRK', '2021-01-01', '9999-12-31', 'SUMBER RIZKI KITA', 'KETUA II', '', 'JO2', '0', '', ''),
	(11, '7510005TRK', '2019-07-01', '9999-12-31', 'KOPERASI SUMBER RIZKI KITA', 'PENGAWAS', '', 'JO2', '0', '', ''),
	(12, '9720005ZTY', '2022-01-01', '9999-12-31', 'KOPERASI SUMBER RIZKI KITA', 'BENDAHARA', '', 'JO2', '0', '', '');

-- membuang struktur untuk table hrisori.r_medsos
CREATE TABLE IF NOT EXISTS `r_medsos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `jenis_medsos` varchar(10) DEFAULT '',
  `id_medsos` varchar(200) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Membuang data untuk tabel hrisori.r_medsos: ~9 rows (lebih kurang)
INSERT INTO `r_medsos` (`id`, `nip`, `start_date`, `end_date`, `jenis_medsos`, `id_medsos`, `status_edit`, `tgl_edit`, `user_edit`) VALUES
	(1, '6793163Z', '2019-01-01', '9999-12-31', 'JMS2', 'ketut.wiriana@pln-t.co.id', '0', '', ''),
	(2, '6592053Z', '2019-01-01', '9999-12-31', 'JMS2', 'antonos@pln-t.co.id', '0', '', ''),
	(3, '7702003R2', '2019-01-01', '9999-12-31', 'JMS2', 'zulhendri@pln-t.co.id', '0', '', ''),
	(4, '7493179D', '2019-01-01', '9999-12-31', 'JMS1', 'zhits.trk@gmail.com', '0', '', ''),
	(5, '7905008D', '2019-01-01', '9999-12-31', 'JMS2', 'ronikarua@pln-t.co.id', '0', '', ''),
	(6, '7905008D', '2019-01-01', '9999-12-31', 'JMS5', '@ronikarua', '0', '', ''),
	(7, '7905008D', '2019-01-01', '9999-12-31', 'JMS3', 'Roni Karua', '0', '', ''),
	(8, '6793082D', '2019-08-01', '9999-12-31', 'JMS2', 'yainus.sholeh@pln-t.co.id', '0', '', ''),
	(10, '8017001TRK', '2019-01-01', '9999-12-31', 'JMS2', 'januar@pln-t.co.id', '0', '', '');

-- membuang struktur untuk table hrisori.r_pemberhentian
CREATE TABLE IF NOT EXISTS `r_pemberhentian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(16) DEFAULT '',
  `tgl_lahir` varchar(10) DEFAULT '',
  `jenis_kelamin` varchar(10) DEFAULT '',
  `person_grade` varchar(10) DEFAULT '',
  `phdp_terakhir` varchar(10) DEFAULT '',
  `agama` varchar(10) DEFAULT '',
  `nik` varchar(16) DEFAULT '',
  `npwp` varchar(15) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_capeg` varchar(10) DEFAULT '',
  `tgl_tetap` varchar(10) DEFAULT '',
  `tgl_berhenti` varchar(10) DEFAULT '',
  `alasan_berhenti` varchar(10) DEFAULT '',
  `dplk_dapen` varchar(10) DEFAULT '',
  `bank_dplk` varchar(30) DEFAULT '',
  `no_peserta` varchar(30) DEFAULT '',
  `no_bpjs_kes` varchar(30) DEFAULT '',
  `no_bpjs_tk` varchar(30) DEFAULT '',
  `tahun_pemberhentian` varchar(4) DEFAULT '',
  `kode_pln_group` varchar(10) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=COMPACT;

-- Membuang data untuk tabel hrisori.r_pemberhentian: ~2 rows (lebih kurang)
INSERT INTO `r_pemberhentian` (`id`, `nip`, `tgl_lahir`, `jenis_kelamin`, `person_grade`, `phdp_terakhir`, `agama`, `nik`, `npwp`, `tgl_masuk`, `tgl_capeg`, `tgl_tetap`, `tgl_berhenti`, `alasan_berhenti`, `dplk_dapen`, `bank_dplk`, `no_peserta`, `no_bpjs_kes`, `no_bpjs_tk`, `tahun_pemberhentian`, `kode_pln_group`, `status_edit`, `tgl_edit`, `user_edit`) VALUES
	(1, '6610023TRK', '1966-10-10', 'JK1', 'GRD19', '0', 'ISL', '6473021010660010', '578770216723000', '2011-04-01', '2011-04-01', '2011-04-01', '2022-10-31', 'AB02', 'JA02', 'BNI', '795410695', '0001131979061', '06S20050602', '2022', '1006', '1', '2023-08-07 00:24:55', '9219008ZTY'),
	(2, '6610029TRK', '1966-11-24', 'JK1', 'GRD19', '0', 'ISL', '6473042411660001', '578770323723000', '2011-04-01', '2011-04-01', '2011-04-01', '2022-11-30', 'AB02', 'JA02', 'BNI', '795196843', '0001131983807', '06S20050263', '2022', '1006', '1', '2023-08-07 00:26:03', '9219008ZTY');

-- membuang struktur untuk table hrisori.r_pembicara
CREATE TABLE IF NOT EXISTS `r_pembicara` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `judul_acara` varchar(250) DEFAULT '',
  `kode_penyelenggaraan` varchar(3) DEFAULT '',
  `lokasi` varchar(200) DEFAULT '',
  `peserta` varchar(200) DEFAULT '',
  `tingkat_acara` varchar(3) DEFAULT '',
  `kode_dahan_profesi` varchar(10) DEFAULT '',
  `dahan_profesi` varchar(200) DEFAULT '',
  `kode_diklat` varchar(30) DEFAULT '',
  `judul_diklat` varchar(250) DEFAULT '',
  `udiklat` varchar(30) DEFAULT '',
  `jenis_pelaksanaan` varchar(30) DEFAULT '',
  `jenis_sertifikasi` varchar(30) DEFAULT '',
  `sifat_diklat` varchar(30) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Membuang data untuk tabel hrisori.r_pembicara: ~6 rows (lebih kurang)
INSERT INTO `r_pembicara` (`id`, `nip`, `start_date`, `end_date`, `judul_acara`, `kode_penyelenggaraan`, `lokasi`, `peserta`, `tingkat_acara`, `kode_dahan_profesi`, `dahan_profesi`, `kode_diklat`, `judul_diklat`, `udiklat`, `jenis_pelaksanaan`, `jenis_sertifikasi`, `sifat_diklat`, `status_edit`, `tgl_edit`, `user_edit`) VALUES
	(1, '6793163Z', '2014-01-01', '2014-01-02', 'Perencanaan Pembangunan Kelistrikan di Daerah Jawa Barat', 'XT', 'BANDUNG', 'INSTANSI', 'TA2', '2.3.3', 'Enjiniring dan Konstruksi Elektrikal', '', '', '', '', '', '', '0', '', ''),
	(2, '6793163Z', '2017-01-02', '2017-01-03', 'Perencanaan dan Pembangunan Insfrastruktur di Wilayah DKI Jakarta', 'XT', 'JAKARTA', 'DINAS TERKAIT', 'TA2', '', '', '', '', '', '', '', '', '0', '', ''),
	(3, '7702003R2', '2021-01-01', '2021-01-01', 'Diklat Valuasi', 'EW', 'Udiklat Jakarta', 'Pegawai PLN dan Anak Perusahaan', 'TA1', '2.5.1', 'Pembelajaran', '', '', '', '', '', '', '1', '2023-10-11 17:19:30', '9219008ZTY'),
	(4, '9315638ZY', '2023-08-24', '2023-08-24', 'Sosialisasi Materi Gratifikasi/Cos, Sistem WBS dan LHKPN', 'EW', 'Kantor Pusat PLN Tarakan', 'Pegawai Anak Perusahaan', 'TA1', '2.2.2', '', '', '', '', 'jplk04', '1', 'sdk01', '1', '2023-10-05 12:00:55', 'sandy'),
	(5, '9215907ZY', '2023-07-25', '2023-07-25', 'Launching Program Budaya - Tema Yantek Optimization For Support KPI (Unit)', 'BL', 'Kantor Pusat PLN Tarakan', 'Seluruh Pegawai PLN Tarakan', 'TA1', '1.8.1', '', 'A.1.1.21.003.2.21R0.IC', '', '', 'jplk01', '2', 'sdk01', '1', '2023-10-19 16:27:10', '9219008ZTY'),
	(6, '9215907ZY', '2023-04-18', '2023-04-18', 'Knowledge Sharing Pengendalian RPT dan RCT melalui Kombinasi Command Center Optimization dan Yantek optimization', 'IHT', 'Banjarmasin', 'Pegawai dan Tenaga Kerja PLN Tarakan', 'TA1', '1.3.1', 'Distribusi', '', 'Modifikasi SOP Command Center untuk mendongkrak Performa Yantek Optimization dan Mengendalikan RPT - RCT secara Komunal di Kalsel dan kalteng', '', 'jplk01', '2', 'sdk01', '1', '2023-10-20 09:51:34', '9219008ZTY');

-- membuang struktur untuk table hrisori.r_pendidikan
CREATE TABLE IF NOT EXISTS `r_pendidikan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `keterangan_pendidikan` varchar(30) DEFAULT '',
  `jenis_pendidikan` varchar(3) DEFAULT '',
  `jurusan` varchar(160) DEFAULT '',
  `nama_institusi` varchar(200) DEFAULT '',
  `kota_institusi` varchar(120) DEFAULT '',
  `kota_institusi_lainnya` varchar(160) DEFAULT '',
  `negara_institusi` varchar(2) DEFAULT '',
  `lama_pendidikan` int NOT NULL DEFAULT '0',
  `satuan_lama_pendidikan` varchar(60) DEFAULT '',
  `nilai` varchar(5) DEFAULT '',
  `kode_transaksi` varchar(120) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.r_pendidikan: ~10 rows (lebih kurang)
INSERT INTO `r_pendidikan` (`id`, `nip`, `start_date`, `end_date`, `keterangan_pendidikan`, `jenis_pendidikan`, `jurusan`, `nama_institusi`, `kota_institusi`, `kota_institusi_lainnya`, `negara_institusi`, `lama_pendidikan`, `satuan_lama_pendidikan`, `nilai`, `kode_transaksi`, `status_edit`, `tgl_edit`, `user_edit`) VALUES
	(1, '6805003TRK', '1983-07-01', '1986-06-30', 'KP1', 'Z9', 'IPS', 'SMA PGRI 1', '3524', '', 'ID', 3, 'SL4', '', '', '0', '', ''),
	(2, '6592053Z', '1986-01-01', '1991-12-31', 'KP1', 'ZI', 'S1 TEKNIK LISTRIK', 'UNIVERSITAS BRAWIJAYA', '3573', '', 'ID', 3, 'SL4', '', '', '0', '', ''),
	(3, '7110039TRK', '1996-07-01', '1998-06-30', 'KP1', 'ZF', 'TEKNIK MESIN', 'STTI', '3171', '', 'ID', 3, 'SL4', '', '', '0', '', ''),
	(4, '7205006TRK', '1993-07-01', '2001-06-30', 'KP1', 'ZJ', 'MANAJEMEN HASIL HUTAN', 'UNIVERSITAS PATTIMURA', '8171', '', 'ID', 8, 'SL4', '', '', '0', '', ''),
	(5, '8711868Z', '2005-07-01', '2008-06-30', 'KP1', 'ZF', 'D3 SIPIL (BANGUNAN)', 'POLITEKNIK NEGERI JAKARTA', '3171', '', 'ID', 3, 'SL4', '', '', '0', '', ''),
	(6, '7205009TRK', '1989-07-01', '1992-06-30', 'KP1', 'Z7', 'TEKNIK LISTRIK', 'STM PGRI', '3517', '', 'ID', 3, 'SL4', '', '', '0', '', ''),
	(7, '7208028TRK', '1989-07-01', '1992-06-30', 'KP1', 'Z9', 'IPS', 'SMA NEGERI 1', '3302', '', 'ID', 3, 'SL4', '', '', '0', '', ''),
	(8, '7210013TRK', '2010-07-01', '2011-06-30', 'KP1', 'ZC', 'MANAJEMEN INFORMATIKA', 'STMIK PPKIA', '6571', '', 'ID', 1, 'SL4', '', '', '0', '', ''),
	(9, '9315638ZY', '2011-01-01', '2014-01-01', 'KP1', 'ZG', 'D3 ADMINISTRASI NEGARA', 'UNIVERSITAS GADJAH MADA', '3471', '', 'ID', 4, 'SL4', '', '', '0', '', ''),
	(10, '7410021TRK', '2007-07-01', '2010-06-30', 'KP1', 'ZF', 'TEKNIK LISTRIK', 'UNIVERSITAS MULAWARMAN', '6472', '', 'ID', 3, 'SL4', '', '', '0', '', '');

-- membuang struktur untuk table hrisori.r_pengajar
CREATE TABLE IF NOT EXISTS `r_pengajar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `kode_dahan_profesi` varchar(30) DEFAULT '',
  `dahan_profesi` varchar(200) DEFAULT '',
  `kode_diklat` varchar(160) DEFAULT '',
  `judul_diklat` varchar(250) DEFAULT '',
  `udiklat` varchar(10) DEFAULT '',
  `jenis_pelaksanaan` varchar(30) DEFAULT '',
  `jenis_sertifikasi` varchar(30) DEFAULT '',
  `sifat_diklat` varchar(30) DEFAULT '',
  `penyelenggaraan` varchar(10) DEFAULT '',
  `keterangan_pengajar` varchar(200) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.r_pengajar: ~0 rows (lebih kurang)

-- membuang struktur untuk table hrisori.r_pengangkatan
CREATE TABLE IF NOT EXISTS `r_pengangkatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(16) DEFAULT '',
  `tgl_lahir` varchar(10) DEFAULT '',
  `jenis_kelamin` varchar(10) DEFAULT '',
  `person_grade` varchar(10) DEFAULT '',
  `agama` varchar(10) DEFAULT '',
  `nik` varchar(16) DEFAULT '',
  `npwp` varchar(15) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_capeg` varchar(10) DEFAULT '',
  `tgl_tetap` varchar(10) DEFAULT '',
  `keterangan_mutasi` varchar(10) DEFAULT '',
  `tahun_pengangkatan` varchar(4) DEFAULT '',
  `kode_pln_group` varchar(10) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.r_pengangkatan: ~10 rows (lebih kurang)
INSERT INTO `r_pengangkatan` (`id`, `nip`, `tgl_lahir`, `jenis_kelamin`, `person_grade`, `agama`, `nik`, `npwp`, `tgl_masuk`, `tgl_capeg`, `tgl_tetap`, `keterangan_mutasi`, `tahun_pengangkatan`, `kode_pln_group`, `status_edit`, `tgl_edit`, `user_edit`) VALUES
	(1, '6793163Z', '1967-12-24', 'JK1', '-', 'HND', '2171102412679004', '144151362803000', '1993-02-06', '1993-02-06', '1994-07-03', 'KM04', '1994', '1006', '1', '2023-08-07 15:46:00', '9219008ZTY'),
	(2, '93151332ZY', '1993-07-07', 'JK2', 'GRD18', 'HND', '5103054707930003', '728734948905000', '2015-07-01', '2015-07-01', '2015-07-01', '', '2015', '1006', '0', '2023-08-04 12:27:50', 'sandy'),
	(3, '9720004ZTY', '1997-09-10', 'JK1', 'GRD20', 'ISL', '7309041009970001', '938585650809000', '2020-11-01', '2020-11-01', '2020-11-01', 'KM05', '2020', '1006', '1', '2023-08-08 14:32:07', '9219008ZTY'),
	(4, '6691029E', '1966-10-10', 'JK1', 'GRD12', 'ISL', '7571041010660001', '077213304822000', '1991-04-01', '1994-05-01', '1997-07-01', '', '1997', '1006', '0', '2023-08-04 12:27:50', 'sandy'),
	(5, '8017001TRK', '1980-01-28', 'JK1', 'GRD14', 'ISL', '3202012801800003', '727640112405000', '2017-03-01', '2017-03-01', '2017-03-01', '', '2017', '1006', '0', '2023-08-04 12:27:50', 'sandy'),
	(6, '7410021TRK', '1974-08-23', 'JK1', 'GRD19', 'ISL', '6473022308740003', '578770455723000', '2011-04-01', '2011-04-01', '2011-04-01', '', '2011', '1006', '0', '2023-08-04 12:27:50', 'sandy'),
	(7, '9420009ZTY', '1994-02-20', 'JK1', 'GRD18', 'ISL', '7371132002940001', '926347139805000', '2020-11-01', '2020-11-01', '2020-11-01', 'KM04', '2020', '1006', '1', '2023-08-08 14:33:46', '9219008ZTY'),
	(8, '92171742ZY', '1992-02-22', 'JK1', 'GRD17', 'ISL', '3603282202920004', '713614600451000', '2017-09-01', '2017-09-01', '2017-09-01', '', '2017', '1006', '0', '2023-08-04 12:27:50', 'sandy'),
	(9, '8110015TRK', '1981-04-19', 'JK1', 'GRD18', 'ISL', '6473011904810005', '578770240723000', '2011-04-01', '2011-04-01', '2011-04-01', '', '2011', '1006', '0', '2023-08-04 12:27:50', 'sandy'),
	(10, '8509719Z', '1985-10-01', 'JK1', 'GRD18', 'ISL', '6471050110850006', '666846746825000', '2009-12-01', '2009-12-01', '2009-12-01', '', '2009', '1006', '0', '2023-08-04 12:27:50', 'sandy');

-- membuang struktur untuk table hrisori.r_penugasan
CREATE TABLE IF NOT EXISTS `r_penugasan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `tupoksi` text,
  `peran` text,
  `penugasan` text,
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.r_penugasan: ~3 rows (lebih kurang)
INSERT INTO `r_penugasan` (`id`, `nip`, `start_date`, `end_date`, `tupoksi`, `peran`, `penugasan`, `status_edit`, `tgl_edit`, `user_edit`) VALUES
	(1, '9219008ZTY', '2022-12-01', '9999-12-31', 'Membuat Usulan RKAP Biaya Kepegawaian', 'PIC Divisi SDM dan Umum', 'Tim RKAP', '0', '', ''),
	(2, '8510210Z', '2022-01-01', '9999-12-31', 'Memonitoring Pembuatan Buku RKAP dan Program Kerja RKAP', 'Sekretaris Tim', 'Tim RKAP', '0', '', ''),
	(3, '9015371ZY', '2023-01-01', '9999-12-31', 'Menyiapkan data usulan RKAP Biaya Pos 53 dan 54', 'PIC Div SDM dan Umum', 'Tim RKAP 2024-2025', '0', '', '');

-- membuang struktur untuk table hrisori.r_position_management
CREATE TABLE IF NOT EXISTS `r_position_management` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_posisi` varchar(8) DEFAULT '',
  `nama_posisi` varchar(250) DEFAULT '',
  `status` varchar(120) NOT NULL DEFAULT 'Active',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '9999-12-31',
  `nip` varchar(30) DEFAULT '',
  `job_key` varchar(200) DEFAULT '',
  `job_level` varchar(200) DEFAULT '',
  `ftk` varchar(1) NOT NULL DEFAULT '1',
  `posisi_kunci` varchar(30) DEFAULT '',
  `kode_posisi_atasan` varchar(8) DEFAULT '',
  `nama_posisi_atasan` varchar(250) DEFAULT '',
  `pln_group` varchar(30) NOT NULL DEFAULT '1006',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=COMPACT;

-- Membuang data untuk tabel hrisori.r_position_management: ~9 rows (lebih kurang)
INSERT INTO `r_position_management` (`id`, `kode_posisi`, `nama_posisi`, `status`, `start_date`, `end_date`, `nip`, `job_key`, `job_level`, `ftk`, `posisi_kunci`, `kode_posisi_atasan`, `nama_posisi_atasan`, `pln_group`, `status_edit`, `tgl_edit`, `user_edit`) VALUES
	(2, '30270099', 'DIREKTUR UTAMA', 'ACTIVE', '2017-08-01', '9999-12-31', '6793163Z', 'DIRUT', 'Struktural - Manajemen Atas', '1', 'PK1', 'NO_MANAG', 'NO_MANAGER', '1006', '0', '', ''),
	(3, '37425857', 'JUNIOR OFFICER ADMINISTRASI', 'ACTIVE', '2020-01-01', '9999-12-31', '', 'JO ADM', 'Fungsional - Fungsional VI', '1', 'PK1', '30270099', 'DIREKTUR UTAMA', '1006', '0', '', ''),
	(4, '30276967', 'JUNIOR ANALYST MANAJEMEN RISIKO', 'ACTIVE', '2021-01-01', '9999-12-31', '', 'JA MRO', 'Fungsional - Fungsional VI', '1', 'PK1', '37425871', 'ASSISTANT ANALYST MANAJEMEN RISIKO', '1006', '0', '', ''),
	(5, '37425868', 'VICE PRESIDENT HUKUM KEPATUHAN DAN MANAJEMEN RISIKO', 'ACTIVE', '2020-01-01', '9999-12-31', '7602004ICP', 'MAN HKMR', 'Struktural - Manajemen Dasar', '1', 'PK1', '30270099', 'DIREKTUR UTAMA', '1006', '0', '', ''),
	(6, '37420015', 'ASSISTANT MANAGER HUKUM', 'ACTIVE', '2021-01-01', '9999-12-31', '7905007TRK', 'AMN HUK', 'Struktural - Supervisori Atas', '1', 'PK1', '37425868', 'VICE PRESIDENT HUKUM KEPATUHAN DAN MANAJEMEN RISIKO', '1006', '0', '', ''),
	(7, '37425869', 'ASSISTANT ANALYST HUKUM', 'ACTIVE', '2020-01-01', '9999-12-31', '', 'AS HKM', 'Fungsional - Fungsional V', '1', 'PK1', '37420015', 'ASSISTANT MANAGER HUKUM', '1006', '0', '', ''),
	(8, '37420016', 'ASSISTANT MANAGER KEPATUHAN DAN MANAJEMEN RISIKO', 'ACTIVE', '2021-01-01', '9999-12-31', '', 'AMN KEP MR', 'Struktural - Supervisori Atas', '1', 'PK1', '37425868', 'VICE PRESIDENT HUKUM KEPATUHAN DAN MANAJEMEN RISIKO', '1006', '0', '', ''),
	(9, '37425870', 'ASSISTANT ANALYST KEPATUHAN', 'ACTIVE', '2020-01-01', '9999-12-31', '', 'AS KEP', 'Fungsional - Fungsional V', '1', 'PK1', '37420016', 'ASSISTANT MANAGER KEPATUHAN DAN MANAJEMEN RISIKO', '1006', '0', '', ''),
	(10, '37425871', 'ASSISTANT ANALYST MANAJEMEN RISIKO', 'ACTIVE', '2020-01-01', '9999-12-31', '9315638ZY', 'AS MNR', 'Fungsional - Fungsional V', '1', 'PK1', '37420016', 'ASSISTANT MANAGER KEPATUHAN DAN MANAJEMEN RISIKO', '1006', '0', '', '');

-- membuang struktur untuk table hrisori.r_rekomendasi
CREATE TABLE IF NOT EXISTS `r_rekomendasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `assesment` varchar(200) DEFAULT '',
  `jabatan_target` varchar(200) DEFAULT '',
  `tipe` varchar(10) DEFAULT '',
  `stream` varchar(10) DEFAULT '',
  `rekomendasi_kompetensi` varchar(250) DEFAULT '',
  `rekomendasi_psikolog` varchar(250) DEFAULT '',
  `rekomendasi_gabungan` varchar(250) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '1',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.r_rekomendasi: ~0 rows (lebih kurang)

-- membuang struktur untuk table hrisori.r_sertifikat
CREATE TABLE IF NOT EXISTS `r_sertifikat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `jenis_lembaga` varchar(60) DEFAULT '',
  `judul_sertifikasi` varchar(120) DEFAULT '',
  `no_sertifikasi` varchar(160) DEFAULT '',
  `kode_profesi_sertifikasi` varchar(30) DEFAULT '',
  `profesi_sertifikasi` varchar(120) DEFAULT '',
  `level_profesiensi` varchar(10) DEFAULT '',
  `nama_institusi` varchar(160) DEFAULT '',
  `kota_institusi` varchar(120) DEFAULT '',
  `kota_institusi_sertifikasi` varchar(60) DEFAULT '',
  `negara_institusi` varchar(2) DEFAULT '',
  `tgl_mulai` varchar(10) DEFAULT '',
  `tgl_selesai` varchar(10) DEFAULT '',
  `nilai_sertifikasi` varchar(30) DEFAULT '',
  `level_sertifikasi` varchar(10) DEFAULT '',
  `lama_sertifikasi` double NOT NULL DEFAULT '0',
  `satuan_sertifikasi` varchar(30) DEFAULT '',
  `tgl_expire` varchar(10) DEFAULT '',
  `kode_transaksi` varchar(160) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.r_sertifikat: ~10 rows (lebih kurang)
INSERT INTO `r_sertifikat` (`id`, `nip`, `start_date`, `end_date`, `jenis_lembaga`, `judul_sertifikasi`, `no_sertifikasi`, `kode_profesi_sertifikasi`, `profesi_sertifikasi`, `level_profesiensi`, `nama_institusi`, `kota_institusi`, `kota_institusi_sertifikasi`, `negara_institusi`, `tgl_mulai`, `tgl_selesai`, `nilai_sertifikasi`, `level_sertifikasi`, `lama_sertifikasi`, `satuan_sertifikasi`, `tgl_expire`, `kode_transaksi`, `status_edit`, `tgl_edit`, `user_edit`) VALUES
	(1, '6592053Z', '2023-03-06', '2023-03-06', 'JLS2', 'PEMELIHARAAN PEMBANGKIT', '2606.1.08.P056.03.2023', '', '', '', 'LEMBAGA SERTIFIKASI KOMPETENSI PPSDM KEBTKE', '', '3173', 'ID', '2023-03-06', '2023-03-06', '', '', 3, 'SL4', '2026-03-06', '', '0', '', ''),
	(2, '8017001TRK', '2023-03-27', '2023-03-27', 'JLS2', 'PEMELIHARAAN TRANSMISI', '2889.1.08.T054.03.2023', '', '', '', 'LEMBAGA SERTIFIKASI KOMPETENSI PPSDM KEBTKE', '', '3173', 'ID', '2023-03-27', '2023-03-27', '', '', 3, 'SL4', '2026-03-27', '', '1', '2023-08-10 17:37:53', 'sandy'),
	(3, '9519002ZTY', '2023-03-06', '2023-03-06', 'JLS2', 'PEMELIHARAAN PEMBANGKIT', '2602.1.08.P054.03.2023', '', '', '', 'LEMBAGA SERTIFIKASI KOMPETENSI PPSDM KEBTKE', '', '3173', 'ID', '2023-03-06', '2023-03-06', '', '', 3, 'SL4', '2026-03-06', '', '1', '2023-08-10 17:37:53', 'sandy'),
	(4, '7410021TRK', '2023-03-27', '2023-03-27', 'JLS2', 'PEMELIHARAAN TRANSMISI', '2890.1.08.T054.03.2023', '', '', '', 'LEMBAGA SERTIFIKASI KOMPETENSI PPSDM KEBTKE', '', '3173', 'ID', '2023-03-27', '2023-03-27', '', '', 3, 'SL4', '2026-03-27', '', '1', '2023-08-10 17:37:53', 'sandy'),
	(5, '7510037TRK', '2023-03-06', '2023-03-06', 'JLS2', 'PEMELIHARAAN PEMBANGKIT', '2604.1.08.P054.03.2023', '', '', '', 'LEMBAGA SERTIFIKASI KOMPETENSI PPSDM KEBTKE', '', '3173', 'ID', '2023-03-06', '2023-03-06', '', '', 3, 'SL4', '2026-03-06', '', '1', '2023-08-10 17:37:53', 'sandy'),
	(6, '9519012ZTY', '2023-03-27', '2023-03-27', 'JLS2', 'PEMELIHARAAN TRANSMISI', '2891.1.08.T054.03.2023', '', '', '', 'LEMBAGA SERTIFIKASI KOMPETENSI PPSDM KEBTKE', '', '3173', 'ID', '2023-03-27', '2023-03-27', '', '', 3, 'SL4', '2026-03-27', '', '1', '2023-08-10 17:37:53', 'sandy'),
	(7, '9319006ZTY', '2023-03-06', '2023-03-06', 'JLS2', 'PEMELIHARAAN PEMBANGKIT', '2605.1.08.P054.03.2023', '', '', '', 'LEMBAGA SERTIFIKASI KOMPETENSI PPSDM KEBTKE', '', '3173', 'ID', '2023-03-06', '2023-03-06', '', '', 3, 'SL4', '2026-03-06', '', '1', '2023-08-10 17:37:53', 'sandy'),
	(8, '7805025TRK', '2023-03-06', '2023-03-06', 'JLS2', 'PEMELIHARAAN PEMBANGKIT', '2607.1.08.P056.03.2023', '', '', '', 'LEMBAGA SERTIFIKASI KOMPETENSI PPSDM KEBTKE', '', '3173', 'ID', '2023-03-06', '2023-03-06', '', '', 3, 'SL4', '2026-03-06', '', '1', '2023-08-10 17:37:53', 'sandy'),
	(9, '7210013TRK', '2023-03-27', '2023-03-27', 'JLS2', 'PEMELIHARAAN TRANSMISI', '2892.1.08.T054.03.2023', '', '', '', 'LEMBAGA SERTIFIKASI KOMPETENSI PPSDM KEBTKE', '', '3173', 'ID', '2023-03-27', '2023-03-27', '', '', 3, 'SL4', '2026-03-27', '', '1', '2023-08-10 17:37:53', 'sandy'),
	(10, '8710001TRK', '2020-08-10', '2020-08-10', 'JLS2', 'PEMELIHARAAN DISTRIBUSI', 'H084.0.22.D043.08.2020', '', '', '', 'LEMBAGA SERTIFIKASI KOMPETENSI PPSDM KEBTKE', '', '3173', 'ID', '2020-08-10', '2020-08-10', '', '', 3, 'SL4', '2023-08-10', '', '1', '2023-08-10 17:37:53', 'sandy');

-- membuang struktur untuk table hrisori.r_struktur
CREATE TABLE IF NOT EXISTS `r_struktur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lokasi_file` varchar(255) DEFAULT '',
  `nama_file` varchar(255) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `no_dokumen` varchar(160) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.r_struktur: ~10 rows (lebih kurang)
INSERT INTO `r_struktur` (`id`, `lokasi_file`, `nama_file`, `keterangan`, `no_dokumen`) VALUES
	(1, '', '1. 001.P.DIR-TRK.2020 ORGANISASI & TATA KERJA PLNT.pdf', '', ''),
	(2, '', '2. 2021.08.18-Pdir.008 PERUBAHAN ke-1 PERDIR NO.001 TTG ORG & TATA KERJA PLNT', '', ''),
	(3, '', '3. 024.P.DIR.2021_Perdir Perubahan ke-2 Organisasi Kantor Pusat', '', ''),
	(4, '', '2021.08.18-Pdir.008-SUSUNAN ORG & FORMASI JBTN PADA PLNT REGKAL 1', '', ''),
	(5, '', '2021.08.18-Pdir.009-SUSUNAN ORG & FORMASI JBTN PADA PLNT REGKAL 2', '', ''),
	(6, '', '2021.08.18-Pdir.010-SUSUNAN ORG & FORMASI JBTN PADA PLNT REGKAL 3', '', ''),
	(7, '', '2021.08.18-Pdir.011-SUSUNAN ORG & FORMASI JBTN PADA PLNT REGSUL 1', '', ''),
	(8, '', '2021.08.18-Pdir.012-SUSUNAN ORG & FORMASI JBTN PADA PLNT REGSUL 2', '', ''),
	(9, '', '2021.08.18-Pdir.013-SUSUNAN ORG & FORMASI JBTN PADA PLNT REGNUSRA', '', ''),
	(10, '', '2021.08.18-Pdir.014-SUSUNAN ORG & FORMASI JBTN PADA PLNT REGMP ', '', '');

-- membuang struktur untuk table hrisori.r_talenta
CREATE TABLE IF NOT EXISTS `r_talenta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `nilai_talenta` varchar(3) DEFAULT '',
  `nki` double NOT NULL DEFAULT '0',
  `kode_nki` varchar(10) DEFAULT '',
  `nsk` double NOT NULL DEFAULT '0',
  `kode_nsk` varchar(10) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.r_talenta: ~10 rows (lebih kurang)
INSERT INTO `r_talenta` (`id`, `nip`, `start_date`, `end_date`, `nilai_talenta`, `nki`, `kode_nki`, `nsk`, `kode_nsk`, `status_edit`, `tgl_edit`, `user_edit`) VALUES
	(1, '93151064ZY', '2021-01-01', '2021-06-30', 'OPT', 358, 'KOM-2', 305, 'MR', '0', '', ''),
	(2, '8810008D2', '2021-01-01', '2021-06-30', 'POT', 328, 'KOM-3', 300, 'MR', '0', '', ''),
	(3, '9315638ZY', '2021-01-01', '2021-06-30', 'POT', 400, 'KOM-2', 300, 'MR', '0', '', ''),
	(4, '9216503ZY', '2021-01-01', '2021-06-30', 'POT', 389, 'KOM-4', 293, 'MG', '0', '', ''),
	(5, '8510210Z', '2021-01-01', '2021-06-30', 'OPT', 388, 'KOM-4', 301, 'MG', '0', '', ''),
	(6, '8710001TRK', '2011-01-01', '2011-06-30', 'OPT', 0, 'KOM-4', 0, 'MG', '0', '', ''),
	(7, '8710001TRK', '2011-07-01', '2011-12-31', 'POT', 0, 'KOM-4', 0, 'MG', '0', '', ''),
	(8, '8710001TRK', '2012-01-01', '2012-06-30', 'OPT', 0, 'KOM-4', 0, 'MG', '0', '', ''),
	(9, '8710001TRK', '2012-07-01', '2012-12-31', 'OPT', 0, 'KOM-4', 0, 'MG', '0', '', ''),
	(10, '8710001TRK', '2013-01-01', '2013-06-30', 'POT', 0, 'KOM-4', 0, 'MG', '0', '', '');

-- membuang struktur untuk table hrisori.r_urjab
CREATE TABLE IF NOT EXISTS `r_urjab` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lokasi_file` varchar(250) DEFAULT '',
  `nama_file` varchar(160) DEFAULT '',
  `no_dokumen` varchar(160) DEFAULT '',
  `keterangan` varchar(250) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Membuang data untuk tabel hrisori.r_urjab: ~10 rows (lebih kurang)
INSERT INTO `r_urjab` (`id`, `lokasi_file`, `nama_file`, `no_dokumen`, `keterangan`) VALUES
	(1, '', '1. 001.P.DIR-TRK.2020 ORGANISASI & TATA KERJA PLNT.pdf', '', ''),
	(2, '', '2. 2021.08.18-Pdir.008 PERUBAHAN ke-1 PERDIR NO.001 TTG ORG & TATA KERJA PLNT', '', ''),
	(3, '', '3. 024.P.DIR.2021_Perdir Perubahan ke-2 Organisasi Kantor Pusat', '', ''),
	(4, '', '2021.08.18-Pdir.008-SUSUNAN ORG & FORMASI JBTN PADA PLNT REGKAL 1', '', ''),
	(5, '', '2021.08.18-Pdir.009-SUSUNAN ORG & FORMASI JBTN PADA PLNT REGKAL 2', '', ''),
	(6, '', '2021.08.18-Pdir.010-SUSUNAN ORG & FORMASI JBTN PADA PLNT REGKAL 3', '', ''),
	(7, '', '2021.08.18-Pdir.011-SUSUNAN ORG & FORMASI JBTN PADA PLNT REGSUL 1', '', ''),
	(8, '', '2021.08.18-Pdir.012-SUSUNAN ORG & FORMASI JBTN PADA PLNT REGSUL 2', '', ''),
	(9, '', '2021.08.18-Pdir.013-SUSUNAN ORG & FORMASI JBTN PADA PLNT REGNUSRA', '', ''),
	(10, '', '2021.08.18-Pdir.014-SUSUNAN ORG & FORMASI JBTN PADA PLNT REGMP ', '', '');

-- membuang struktur untuk table hrisori.setting_pph
CREATE TABLE IF NOT EXISTS `setting_pph` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kpp` varchar(120) DEFAULT '',
  `npwp_pemotong` varchar(120) DEFAULT '',
  `npwp_pemotong15` varchar(15) DEFAULT '',
  `npwp_pemotong16` varchar(16) DEFAULT '',
  `nitku_pemotong` varchar(30) DEFAULT NULL,
  `nama_pemotong` varchar(200) DEFAULT '',
  `npwp_pejabat` varchar(120) DEFAULT '',
  `nama_pejabat` varchar(200) DEFAULT '',
  `alamat` varchar(255) DEFAULT '',
  `alamat2` varchar(250) DEFAULT '',
  `telepon` varchar(200) DEFAULT '',
  `email` varchar(200) DEFAULT '',
  `path_ttd` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.setting_pph: 2 rows
/*!40000 ALTER TABLE `setting_pph` DISABLE KEYS */;
INSERT INTO `setting_pph` (`id`, `kpp`, `npwp_pemotong`, `npwp_pemotong15`, `npwp_pemotong16`, `nitku_pemotong`, `nama_pemotong`, `npwp_pejabat`, `nama_pejabat`, `alamat`, `alamat2`, `telepon`, `email`, `path_ttd`) VALUES
	(1, 'BALIKPAPAN', '021364245721001', '', '', NULL, 'PT PELAYANAN LISTRIK NASIONAL TARAKAN', '480722305732000', 'DINA SHOFWATI', 'Jl. MT. Haryono Komplek Balikpapan Baru A5 Nomor 1-5', 'Balikpapan - Kalimantan Timur', '0542-8506674', 'plntarakan@pln-t.co.id', './assets/ttd/ttd-1705389132.png'),
	(2, 'TARAKAN', '021364245723001', '', '', NULL, 'PT PELAYANAN LISTRIK NASIONAL TARAKAN', '480722305732000', 'DINA SHOFWATI', 'Jl. MT. Haryono Komplek Balikpapan Baru A5 Nomor 1-5', 'Balikpapan - Kalimantan Timur', '0542-8506674', 'plntarakan@pln-t.co.id', './assets/ttd/ttd-1705389093.png');
/*!40000 ALTER TABLE `setting_pph` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.sppd
CREATE TABLE IF NOT EXISTS `sppd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idsppd` varchar(60) DEFAULT '',
  `tanggal` varchar(10) DEFAULT '',
  `jenis_sppd` varchar(1) DEFAULT '',
  `level_sppd` varchar(1) DEFAULT '',
  `no_sppd` varchar(60) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `nama` varchar(200) DEFAULT '',
  `grade` varchar(60) DEFAULT '',
  `jabatan` varchar(250) DEFAULT '',
  `maksud1` text,
  `kedudukan1` varchar(120) DEFAULT '',
  `tujuan1` varchar(120) DEFAULT '',
  `tgl_awal1` varchar(10) DEFAULT '',
  `tgl_akhir1` varchar(10) DEFAULT '',
  `hari1` double NOT NULL DEFAULT '0',
  `kota11a` varchar(120) DEFAULT '',
  `kota12a` varchar(120) DEFAULT '',
  `transport1a` varchar(1) DEFAULT '',
  `kota11b` varchar(120) DEFAULT '',
  `kota12b` varchar(120) DEFAULT '',
  `transport1b` varchar(1) DEFAULT '',
  `kota11c` varchar(120) DEFAULT '',
  `kota12c` varchar(120) DEFAULT '',
  `transport1c` varchar(1) DEFAULT '',
  `kota11d` varchar(120) DEFAULT '',
  `kota12d` varchar(120) DEFAULT '',
  `transport1d` varchar(1) DEFAULT '',
  `jenis_tujuan1` varchar(1) DEFAULT '',
  `maksud2` text,
  `kedudukan2` varchar(120) DEFAULT '',
  `tujuan2` varchar(120) DEFAULT '',
  `tgl_awal2` varchar(10) DEFAULT '',
  `tgl_akhir2` varchar(10) DEFAULT '',
  `hari2` double DEFAULT '0',
  `kota21a` varchar(120) DEFAULT '',
  `kota22a` varchar(120) DEFAULT '',
  `transport2a` varchar(1) DEFAULT '',
  `kota21b` varchar(120) DEFAULT '',
  `kota22b` varchar(120) DEFAULT '',
  `transport2b` varchar(1) DEFAULT '',
  `kota21c` varchar(120) DEFAULT '',
  `kota22c` varchar(120) DEFAULT '',
  `transport2c` varchar(1) DEFAULT '',
  `kota21d` varchar(120) DEFAULT '',
  `kota22d` varchar(120) DEFAULT '',
  `transport2d` varchar(1) DEFAULT '',
  `jenis_tujuan2` varchar(1) DEFAULT '',
  `maksud3` text,
  `kedudukan3` varchar(120) DEFAULT '',
  `tujuan3` varchar(120) DEFAULT '',
  `tgl_awal3` varchar(10) DEFAULT '',
  `tgl_akhir3` varchar(10) DEFAULT '',
  `hari3` double DEFAULT '0',
  `kota31a` varchar(120) DEFAULT '',
  `kota32a` varchar(120) DEFAULT '',
  `transport3a` varchar(1) DEFAULT '',
  `kota31b` varchar(120) DEFAULT '',
  `kota32b` varchar(120) DEFAULT '',
  `transport3b` varchar(1) DEFAULT '',
  `kota31c` varchar(120) DEFAULT '',
  `kota32c` varchar(120) DEFAULT '',
  `transport3c` varchar(1) DEFAULT '',
  `kota31d` varchar(120) DEFAULT '',
  `kota32d` varchar(120) DEFAULT '',
  `transport3d` varchar(1) DEFAULT '',
  `jenis_tujuan3` varchar(1) DEFAULT '',
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  `approve1` varchar(1) NOT NULL DEFAULT '0',
  `approval1` varchar(120) DEFAULT '',
  `tgl_approve1` varchar(10) DEFAULT '',
  `approve2` varchar(1) NOT NULL DEFAULT '0',
  `approval2` varchar(120) DEFAULT '',
  `tgl_approve2` varchar(10) DEFAULT '',
  `bayar` varchar(1) NOT NULL DEFAULT '0',
  `tgl_bayar` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idsppd` (`idsppd`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.sppd: 3 rows
/*!40000 ALTER TABLE `sppd` DISABLE KEYS */;
INSERT INTO `sppd` (`id`, `idsppd`, `tanggal`, `jenis_sppd`, `level_sppd`, `no_sppd`, `nip`, `nama`, `grade`, `jabatan`, `maksud1`, `kedudukan1`, `tujuan1`, `tgl_awal1`, `tgl_akhir1`, `hari1`, `kota11a`, `kota12a`, `transport1a`, `kota11b`, `kota12b`, `transport1b`, `kota11c`, `kota12c`, `transport1c`, `kota11d`, `kota12d`, `transport1d`, `jenis_tujuan1`, `maksud2`, `kedudukan2`, `tujuan2`, `tgl_awal2`, `tgl_akhir2`, `hari2`, `kota21a`, `kota22a`, `transport2a`, `kota21b`, `kota22b`, `transport2b`, `kota21c`, `kota22c`, `transport2c`, `kota21d`, `kota22d`, `transport2d`, `jenis_tujuan2`, `maksud3`, `kedudukan3`, `tujuan3`, `tgl_awal3`, `tgl_akhir3`, `hari3`, `kota31a`, `kota32a`, `transport3a`, `kota31b`, `kota32b`, `transport3b`, `kota31c`, `kota32c`, `transport3c`, `kota31d`, `kota32d`, `transport3d`, `jenis_tujuan3`, `tgl_proses`, `petugas`, `approve1`, `approval1`, `tgl_approve1`, `approve2`, `approval2`, `tgl_approve2`, `bayar`, `tgl_bayar`) VALUES
	(2, '2020000001', '2020-01-24', '1', '3', '001.SPPD/MUM.00.07/PLN-TRK/2020', 'HONOR02', 'ARIADI SULISTYANTO', 'Non Grade', '', 'Menghadiri undangan rapat Dekom dan Direksi PLNT; Menghadiri undangan RUPS RKAP PLNT Th. 2020', 'Balikpapan', 'Jakarta', '2020-01-29', '2020-01-31', 3, 'Balikpapan', 'Jakarta', '1', '', '', '', '', '', '', '', '', '', '3', '', 'Jakarta', '', '', '', 0, 'Jakarta', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '2020-02-09', '', '1', '6793163Z', '2020-02-09', '0', '', '', '0', ''),
	(3, '2020000002', '2020-02-09', '1', '7', '001.SPPD/MUM.00.07/PLN-TRK/2020', '7719002PCN', 'SANDY', 'Basic 2', 'STAFF', 'coba saja', 'Balikpapan', 'Jakarta', '2020-02-10', '2020-02-12', 3, 'Balikpapan', 'Jakarta', '1', '', '', '', '', '', '', '', '', '', '3', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '2020-02-09', '', '1', '8209759Z', '2020-02-09', '0', '', '', '0', ''),
	(4, '2020000003', '', '1', '4', '001.SPPD/MUM.00.07/PLN-TRK/2020', '6793082D', 'YAINUS SHOLEH', 'Optimization 4', 'VICE PRESIDENT ADMINISTRASI SDM DAN TALENTA', 'Diklat', 'Balikpapan', 'Surabaya', '2020-02-13', '2020-02-15', 3, 'Balikpapan', 'Surabaya', '1', '', '', '', '', '', '', '', '', '', '3', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '2020-02-13', '', '0', '7702003R2', '', '0', '', '', '0', '');
/*!40000 ALTER TABLE `sppd` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.sppd1
CREATE TABLE IF NOT EXISTS `sppd1` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idsppd` varchar(60) DEFAULT '',
  `tanggal` varchar(10) DEFAULT '',
  `tingkat_sppd` varchar(1) NOT NULL DEFAULT '1',
  `jenis_sppd` varchar(1) DEFAULT '',
  `level_sppd` varchar(1) DEFAULT '',
  `sub_jenis_sppd` varchar(30) DEFAULT '',
  `kd_project_sap` varchar(30) DEFAULT '',
  `nama_project_sap` varchar(250) DEFAULT '',
  `no_sppd` varchar(60) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `nama` varchar(200) DEFAULT '',
  `grade` varchar(60) DEFAULT '',
  `jabatan` varchar(250) DEFAULT '',
  `maksud` text,
  `agenda` text,
  `kedudukan` varchar(200) DEFAULT '',
  `tujuan` varchar(200) DEFAULT '',
  `jarak` double NOT NULL DEFAULT '0',
  `transportasi` varchar(200) DEFAULT '',
  `tgl_awal` varchar(10) DEFAULT '',
  `tgl_akhir` varchar(10) DEFAULT '',
  `hari` double DEFAULT '0',
  `kota1a` varchar(200) DEFAULT '',
  `kota2a` varchar(200) DEFAULT '',
  `transporta` varchar(200) DEFAULT '',
  `kota1b` varchar(200) DEFAULT '',
  `kota2b` varchar(200) DEFAULT '',
  `transportb` varchar(200) DEFAULT '',
  `kota1c` varchar(200) DEFAULT '',
  `kota2c` varchar(200) DEFAULT '',
  `transportc` varchar(200) DEFAULT '',
  `kota1d` varchar(200) DEFAULT '',
  `kota2d` varchar(200) DEFAULT '',
  `transportd` varchar(200) DEFAULT '',
  `jenis_tujuan` varchar(200) DEFAULT '',
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  `approve1` varchar(1) NOT NULL DEFAULT '0',
  `approval1` varchar(120) DEFAULT '',
  `tgl_approve1` varchar(10) DEFAULT '',
  `alasan_reject1` varchar(255) DEFAULT '',
  `approve2` varchar(1) NOT NULL DEFAULT '0',
  `approval2` varchar(120) DEFAULT '',
  `tgl_approve2` varchar(10) DEFAULT '',
  `alasan_reject2` varchar(255) DEFAULT '',
  `validasi_biaya` varchar(1) NOT NULL DEFAULT '0',
  `tgl_validasi` varchar(10) DEFAULT '',
  `approvesdm` varchar(1) NOT NULL DEFAULT '0',
  `approvalsdm` varchar(60) DEFAULT '',
  `tgl_approvesdm` varchar(10) DEFAULT '',
  `alasan_rejectsdm` varchar(255) DEFAULT '',
  `approvebayar` varchar(1) NOT NULL DEFAULT '0',
  `approvalbayar` varchar(120) DEFAULT '',
  `tgl_approvebayar` varchar(10) DEFAULT '',
  `alasan_rejectbayar` varchar(255) DEFAULT '',
  `bayar` varchar(1) NOT NULL DEFAULT '0',
  `tgl_bayar` varchar(10) NOT NULL DEFAULT '',
  `editing` varchar(1) NOT NULL DEFAULT '0',
  `validasi_restitusi` varchar(1) NOT NULL DEFAULT '0',
  `tgl_validasi_restitusi` varchar(10) DEFAULT '',
  `bayar_restitusi` varchar(1) NOT NULL DEFAULT '0',
  `tgl_bayar_restitusi` varchar(10) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idsppd` (`idsppd`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.sppd1: ~6 rows (lebih kurang)
INSERT INTO `sppd1` (`id`, `idsppd`, `tanggal`, `tingkat_sppd`, `jenis_sppd`, `level_sppd`, `sub_jenis_sppd`, `kd_project_sap`, `nama_project_sap`, `no_sppd`, `nip`, `nama`, `grade`, `jabatan`, `maksud`, `agenda`, `kedudukan`, `tujuan`, `jarak`, `transportasi`, `tgl_awal`, `tgl_akhir`, `hari`, `kota1a`, `kota2a`, `transporta`, `kota1b`, `kota2b`, `transportb`, `kota1c`, `kota2c`, `transportc`, `kota1d`, `kota2d`, `transportd`, `jenis_tujuan`, `tgl_proses`, `petugas`, `approve1`, `approval1`, `tgl_approve1`, `alasan_reject1`, `approve2`, `approval2`, `tgl_approve2`, `alasan_reject2`, `validasi_biaya`, `tgl_validasi`, `approvesdm`, `approvalsdm`, `tgl_approvesdm`, `alasan_rejectsdm`, `approvebayar`, `approvalbayar`, `tgl_approvebayar`, `alasan_rejectbayar`, `bayar`, `tgl_bayar`, `editing`, `validasi_restitusi`, `tgl_validasi_restitusi`, `bayar_restitusi`, `tgl_bayar_restitusi`) VALUES
	(6639, 'S001', '2025-01-01', '1', '1', 'B', 'Sub-A', 'P001', 'Project A', 'SPPD001', 'NIP001', 'Nama A', 'Grade A', 'Jabatan A', 'Maksud A', 'Agenda A', 'Kedudukan A', 'Tujuan A', 10, 'Transportasi A', '2025-01-01', '2025-01-05', 5, 'Kota1a', 'Kota2a', 'Transporta', 'Kota1b', 'Kota2b', 'Transportb', 'Kota1c', 'Kota2c', 'Transportc', 'Kota1d', 'Kota2d', 'Transportd', 'Jenis A', '2025-01-01', 'Petugas A', '0', '9720004ZTY', '2025-01-02', 'Alasan Reject1 A', '0', '7410021TRK', '2025-01-03', 'Alasan Reject2 A', '0', '2025-01-04', '0', '9420009ZTY', '2025-01-05', 'Alasan Rejectsdm A', '0', '92171742ZY', '2025-01-06', 'Alasan Rejectbayar A', '0', '2025-01-07', '0', '0', '2025-01-08', '0', '2025-01-09'),
	(6640, 'S002', '2025-02-01', '2', '2', 'C', 'Sub-B', 'P002', 'Project B', 'SPPD002', 'NIP002', 'Nama B', 'Grade B', 'Jabatan B', 'Maksud B', 'Agenda B', 'Kedudukan B', 'Tujuan B', 20, 'Transportasi B', '2025-02-01', '2025-02-05', 5, 'Kota1a', 'Kota2a', 'Transporta', 'Kota1b', 'Kota2b', 'Transportb', 'Kota1c', 'Kota2c', 'Transportc', 'Kota1d', 'Kota2d', 'Transportd', 'Jenis B', '2025-02-01', 'Petugas B', '1', 'Approval1 B', '2025-02-02', 'Alasan Reject1 B', '0', 'Approval2 B', '2025-02-03', 'Alasan Reject2 B', '1', '2025-02-04', '1', 'Approvalsdm B', '2025-02-05', 'Alasan Rejectsdm B', '0', 'Approvalbayar B', '2025-02-06', 'Alasan Rejectbayar B', '0', '2025-02-07', '1', '0', '2025-02-08', '1', '2025-02-09'),
	(6641, 'S003', '2025-03-01', '3', '3', 'D', 'Sub-C', 'P003', 'Project C', 'SPPD003', 'NIP003', 'Nama C', 'Grade C', 'Jabatan C', 'Maksud C', 'Agenda C', 'Kedudukan C', 'Tujuan C', 30, 'Transportasi C', '2025-03-01', '2025-03-05', 5, 'Kota1a', 'Kota2a', 'Transporta', 'Kota1b', 'Kota2b', 'Transportb', 'Kota1c', 'Kota2c', 'Transportc', 'Kota1d', 'Kota2d', 'Transportd', 'Jenis C', '2025-03-01', 'Petugas C', '0', 'Approval1 C', '2025-03-02', 'Alasan Reject1 C', '1', 'Approval2 C', '2025-03-03', 'Alasan Reject2 C', '0', '2025-03-04', '0', 'Approvalsdm C', '2025-03-05', 'Alasan Rejectsdm C', '1', 'Approvalbayar C', '2025-03-06', 'Alasan Rejectbayar C', '1', '2025-03-07', '0', '0', '2025-03-08', '0', '2025-03-09'),
	(6643, '2025000002', '2025-02-11', '1', '1', '', 'DIKLAT', 'KAL1_2400_03_0005', 'O&M PLTD SANGGAU & KETAPANG (UIKL)', '0002.SPPD/MUM.00.07/PLN-TRK/2025', '6691029E', 'ABDUL HARIS DAUD', '', 'Jabatan1', 'MaksudPerjalananDinas1', 'AgendaKegiatan1', 'Aceh Barat Daya', 'Aceh Besar', 2, 'Pesawat Udara', '2025-02-12', '2025-02-13', 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '0', '', '', '', '0', '', '0', '', '', '', '0', '', '', '', '0', '', '0', '0', '', '0', ''),
	(6644, '2025000003', '2025-02-11', '2', '2', '', '', 'KAL1_2400_03_0014', 'O&M UPDK KAPUAS', '0003.SPPD/MUM.00.07/PLN-TRK/2025', '9720004ZTY', 'ABDUL MALIK', '', 'Jabatan2', 'MaksudPerjalananDinas2', 'AgendaKegiatan2', 'Dairi', 'Aceh Jaya', 3, 'Pesawat Udara', '2025-02-12', '2025-02-20', 9, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '6691029E', '', '', '0', '9720004ZTY', '', '', '0', '', '0', '', '', '', '0', '', '', '', '0', '', '0', '0', '', '0', ''),
	(6647, '2025000006', '2025-02-13', '', '', '', '', '', '', '0006.SPPD/MUM.00.07/PLN-TRK/2025', '', '', '', '', '', '', '', '', 23, '', '', '', 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '0', '', '', '', '0', '', '0', '', '', '', '0', '', '', '', '0', '', '0', '0', '', '0', ''),
	(6648, '2025000007', '2025-02-13', '', '', '', '', '', '', '0007.SPPD/MUM.00.07/PLN-TRK/2025', '', '', '', '', '', '', '', '', 3, '', '', '', 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '0', '', '', '', '0', '', '0', '', '', '', '0', '', '', '', '0', '', '0', '0', '', '0', ''),
	(6646, '2025000005', '2025-02-13', '1', '1', '', 'NON-DIKLAT', 'KAL1_2400_03_0005', 'O&M PLTD SANGGAU & KETAPANG (UIKL)', '0005.SPPD/MUM.00.07/PLN-TRK/2025', '6691029E', 'ABDUL HARIS DAUD', '', 'Jabatan1', '1', '1', 'Pidie Jaya,Sabang', 'Lhokseumawe,Langsa', 3, 'Pesawat Udara,Taxi Darat', '2025-02-26', '2025-02-28', 3, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '0', '', '', '', '0', '', '0', '', '', '', '0', '', '', '', '0', '', '0', '0', '', '0', ''),
	(6649, '2025000008', '2025-02-13', '', '', '', '', '', '', '0008.SPPD/MUM.00.07/PLN-TRK/2025', '6793163Z', 'I KETUT WIRIANA', '', '', '', '', '', '', 1, '', '', '', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '0', '', '', '', '0', '', '0', '', '', '', '0', '', '', '', '0', '', '0', '0', '', '0', ''),
	(6650, '2025000009', '2025-02-13', '', '', '', '', '', '', '0009.SPPD/MUM.00.07/PLN-TRK/2025', '92171742ZY', 'AGIL FRASSETYO', '', '', '', '', '', '', 22, '', '', '', 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '0', '', '', '', '0', '', '0', '', '', '', '0', '', '', '', '0', '', '0', '0', '', '0', ''),
	(6652, '2025000010', '2025-02-14', '', '', '', '', '', '', '0010.SPPD/MUM.00.07/PLN-TRK/2025', '9420009ZTY', 'AFIF ASYKAR AMIR', '', '', '', '', '', '', 4, '', '', '', 4, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '0', '', '', '', '0', '', '0', '', '', '', '0', '', '', '', '0', '', '0', '0', '', '0', '');

-- membuang struktur untuk table hrisori.sub_jenis_sppd
CREATE TABLE IF NOT EXISTS `sub_jenis_sppd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kd_sub_sppd` varchar(60) DEFAULT '',
  `nama_sub_sppd` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.sub_jenis_sppd: 2 rows
/*!40000 ALTER TABLE `sub_jenis_sppd` DISABLE KEYS */;
INSERT INTO `sub_jenis_sppd` (`id`, `kd_sub_sppd`, `nama_sub_sppd`) VALUES
	(1, 'DIKLAT', 'DIKLAT'),
	(2, 'NON-DIKLAT', 'NON DIKLAT');
/*!40000 ALTER TABLE `sub_jenis_sppd` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.suplisi
CREATE TABLE IF NOT EXISTS `suplisi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `blthnip` varchar(60) DEFAULT '',
  `gaji` double NOT NULL DEFAULT '0',
  `tunjangan_posisi` double NOT NULL DEFAULT '0',
  `p21b` double NOT NULL DEFAULT '0',
  `tunjangan_kemahalan` double NOT NULL DEFAULT '0',
  `tunjangan_perumahan` double NOT NULL DEFAULT '0',
  `tunjangan_transportasi` double NOT NULL DEFAULT '0',
  `bantuan_pulsa` double NOT NULL DEFAULT '0',
  `cuti` double NOT NULL DEFAULT '0',
  `thr` double NOT NULL DEFAULT '0',
  `iks` double NOT NULL DEFAULT '0',
  `bonus` double NOT NULL DEFAULT '0',
  `winduan` double NOT NULL DEFAULT '0',
  `honorarium_eo` double NOT NULL DEFAULT '0',
  `jumlah_suplisi` double NOT NULL DEFAULT '0',
  `keterangan` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.suplisi: 9 rows
/*!40000 ALTER TABLE `suplisi` DISABLE KEYS */;
INSERT INTO `suplisi` (`id`, `blth`, `nip`, `blthnip`, `gaji`, `tunjangan_posisi`, `p21b`, `tunjangan_kemahalan`, `tunjangan_perumahan`, `tunjangan_transportasi`, `bantuan_pulsa`, `cuti`, `thr`, `iks`, `bonus`, `winduan`, `honorarium_eo`, `jumlah_suplisi`, `keterangan`) VALUES
	(1, '2019-07', '6793163Z', '2019-07.6793163Z', 48000000, 0, 0, 0, 6000000, 0, 0, 0, 16000000, 0, 0, 0, 0, 70000000, 'SUPLISI DARI JAN-2019 S/D JUN-2019'),
	(2, '2019-07', '7702003R2', '2019-07.7702003R2', 61800000, 0, 0, 0, 6000000, 0, 0, 0, 20600000, 0, 0, 0, 0, 88400000, 'SUPLISI DARI JAN-2019 S/D JUN-2019'),
	(3, '2019-07', '6592053Z', '2019-07.6592053Z', 40800000, 0, 0, 0, 6000000, 0, 0, 0, 13600000, 0, 0, 0, 0, 60400000, 'SUPLISI DARI JAN-2019 S/D JUN-2019'),
	(4, '2019-07', 'KOM02', '2019-07.KOM02', 21300000, 0, 0, 0, 0, 3888000, 0, 0, 0, 0, 0, 0, 0, 25188000, 'SUPLISI DARI JAN-2019 S/D JUN-2019'),
	(5, '2019-05', '9219004ZTY', '2019-05.9219004ZTY', 2517000, 800000, 0, 1596000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4913000, 'SUPLISI PENGANGKATAN PEGAWAI ANGKATAN 61'),
	(6, '2019-07', 'KOM01', '2019-07.KOM01', 21600000, 0, 0, 0, 0, 4320000, 0, 0, 0, 0, 0, 0, 0, 25920000, 'SUPLISI DARI JAN-2019 S/D JUN-2019'),
	(7, '2019-04', '8010035TRK', '2019-04.8010035TRK', 5120309, 0, 0, 0, 0, 0, 0, 512031, 0, 0, 0, 0, 0, 5632340, 'SUPLISI GRADE DARI JULI 2018 S/D April 2019'),
	(8, '2019-04', '7905008D', '2019-04.7905008D', 9086748, 0, 0, 0, 0, 0, 0, 908675, 0, 0, 0, 0, 0, 9995423, 'SUPLISI GRADE DARI JULI 2018 S/D April 2019'),
	(9, '2019-04', '7510005TRK', '2019-04.7510005TRK', 6127649, 0, 0, 0, 0, 0, 0, 612765, 0, 0, 0, 0, 0, 6740414, 'SUPLISI GRADE DARI JULI 2018 S/D April 2019');
/*!40000 ALTER TABLE `suplisi` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.tanggapan
CREATE TABLE IF NOT EXISTS `tanggapan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_keluhan` int NOT NULL,
  `nip_penanggap` varchar(20) NOT NULL,
  `tanggapan` text NOT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.tanggapan: ~0 rows (lebih kurang)

-- membuang struktur untuk table hrisori.tantiem
CREATE TABLE IF NOT EXISTS `tantiem` (
  `id` int NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `niptahun` varchar(60) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_pegawai` varchar(10) DEFAULT '',
  `jumlah_bulan` double NOT NULL DEFAULT '0',
  `gaji` double NOT NULL DEFAULT '0',
  `koefisien` double NOT NULL DEFAULT '0',
  `tantiem` double NOT NULL DEFAULT '0',
  `ppht_upah` double NOT NULL DEFAULT '0',
  `ppht_upah_tantiem` double NOT NULL DEFAULT '0',
  `pph21` double NOT NULL DEFAULT '0',
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  `keterangan` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `niptahun` (`niptahun`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.tantiem: ~8 rows (lebih kurang)
INSERT INTO `tantiem` (`id`, `blth`, `tahun`, `nip`, `niptahun`, `tgl_masuk`, `tgl_pegawai`, `jumlah_bulan`, `gaji`, `koefisien`, `tantiem`, `ppht_upah`, `ppht_upah_tantiem`, `pph21`, `tgl_proses`, `petugas`, `keterangan`) VALUES
	(1, '2024-09', '2023', '6794003E', '2024-6794003E', '', '', 0, 0, 0, 120000000, 12000000, 12000000, 12000000, '', '', ''),
	(2, '2024-09', '2023', '6793163Z', '2024-6793163Z', '', '', 0, 0, 0, 472000000, 87000000, 87000000, 87000000, '', '', ''),
	(3, '2024-09', '2023', '6993207Z', '2024-6993207Z', '', '', 0, 0, 0, 328000000, 51000000, 51000000, 51000000, '', '', ''),
	(4, '2024-09', '2023', '6592053Z', '2024-6592053Z', '', '', 0, 0, 0, 401200000, 69300000, 69300000, 69300000, '', '', ''),
	(5, '2024-09', '2023', '7191109M', '2024-7191109M', '', '', 0, 0, 0, 278800000, 38700000, 38700000, 38700000, '', '', ''),
	(6, '2024-09', '2023', '7702003R2', '2024-7702003R2', '', '', 0, 0, 0, 680000000, 148000000, 148000000, 148000000, '', '', ''),
	(7, '2024-09', '2023', '6793121Z', '2024-6793121Z', '', '', 0, 0, 0, 259200000, 33800000, 33800000, 33800000, '', '', ''),
	(8, '2024-09', '2023', '6993227Z', '2024-6993227Z', '', '', 0, 0, 0, 100800000, 9120000, 9120000, 9120000, '', '', '');

-- membuang struktur untuk table hrisori.template_varcost
CREATE TABLE IF NOT EXISTS `template_varcost` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kd_region` varchar(2) DEFAULT '',
  `kd_cabang` varchar(3) DEFAULT '',
  `blth_gaji` varchar(10) DEFAULT '',
  `nama_file` varchar(200) DEFAULT '',
  `tgl_update` varchar(30) DEFAULT '',
  `petugas` varchar(30) DEFAULT '',
  `approve` varchar(1) NOT NULL DEFAULT '0',
  `status` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama_file` (`nama_file`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.template_varcost: 0 rows
/*!40000 ALTER TABLE `template_varcost` DISABLE KEYS */;
/*!40000 ALTER TABLE `template_varcost` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.thr
CREATE TABLE IF NOT EXISTS `thr` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenisthr` varchar(1) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `niptahun` varchar(30) DEFAULT '',
  `agama` varchar(1) DEFAULT '',
  `aktif` varchar(1) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_berhenti` varchar(10) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `jumlah_bulan` double NOT NULL DEFAULT '0',
  `p1` double NOT NULL DEFAULT '0',
  `koefisien` double NOT NULL DEFAULT '0',
  `thr` double NOT NULL DEFAULT '0',
  `ppht_upah` double NOT NULL DEFAULT '0',
  `ppht_upah_thr` double NOT NULL DEFAULT '0',
  `pph21` double NOT NULL DEFAULT '0',
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `niptahun` (`niptahun`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.thr: 7 rows
/*!40000 ALTER TABLE `thr` DISABLE KEYS */;
INSERT INTO `thr` (`id`, `jenisthr`, `blth`, `tahun`, `nip`, `niptahun`, `agama`, `aktif`, `tgl_masuk`, `tgl_berhenti`, `blth_awal`, `blth_akhir`, `jumlah_bulan`, `p1`, `koefisien`, `thr`, `ppht_upah`, `ppht_upah_thr`, `pph21`, `tgl_proses`, `petugas`) VALUES
	(1, '1', '2021-04', '2021', '7110039TRK', '2021.7110039TRK', 'I', '1', '', '', '', '', 0, 7633356, 0, 15266712, 0, 0, 0, '2021-05-05', 'sani'),
	(2, '1', '2021-04', '2021', '8105027TRK', '2021.8105027TRK', 'I', '1', '', '', '', '', 0, 5877534, 0, 11755068, 0, 0, 0, '2021-05-05', 'sani'),
	(3, '1', '2021-04', '2021', '8010035TRK', '2021.8010035TRK', 'I', '1', '', '', '', '', 0, 8016195, 0, 16032390, 0, 0, 0, '2021-05-05', 'sani'),
	(4, '1', '2021-04', '2021', '8010036TRK', '2021.8010036TRK', 'I', '1', '', '', '', '', 0, 9276741, 0, 18553482, 0, 0, 0, '2021-05-05', 'sani'),
	(5, '1', '2021-04', '2021', '7510014TRK', '2021.7510014TRK', 'I', '1', '', '', '', '', 0, 6291378, 0, 12582756, 0, 0, 0, '2021-05-05', 'sani'),
	(6, '1', '2021-04', '2021', '7510037TRK', '2021.7510037TRK', 'I', '1', '', '', '', '', 0, 9094505, 0, 18189010, 0, 0, 0, '2021-05-05', 'sani'),
	(7, '1', '2021-04', '2021', '7910008TRK', '2021.7910008TRK', 'I', '1', '', '', '', '', 0, 6834399, 0, 13668798, 0, 0, 0, '2021-05-05', 'sani');
/*!40000 ALTER TABLE `thr` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.tingkat_sppd
CREATE TABLE IF NOT EXISTS `tingkat_sppd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kd_tingkat` varchar(1) DEFAULT '',
  `nama_tingkat` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.tingkat_sppd: 2 rows
/*!40000 ALTER TABLE `tingkat_sppd` DISABLE KEYS */;
INSERT INTO `tingkat_sppd` (`id`, `kd_tingkat`, `nama_tingkat`) VALUES
	(1, '1', 'Dalam Negeri'),
	(2, '2', 'Luar Negeri');
/*!40000 ALTER TABLE `tingkat_sppd` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.tunjanganpph
CREATE TABLE IF NOT EXISTS `tunjanganpph` (
  `id` int NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `nipblth` varchar(60) DEFAULT '',
  `tunjangan_transportasi` double NOT NULL DEFAULT '0',
  `tunjangan_perumahan` double NOT NULL DEFAULT '0',
  `bantuan_pulsa` double NOT NULL DEFAULT '0',
  `uang_cuti` double NOT NULL DEFAULT '0',
  `iks` double NOT NULL DEFAULT '0',
  `bonus` double NOT NULL DEFAULT '0',
  `honorarium_eo` double NOT NULL DEFAULT '0',
  `thr` double NOT NULL DEFAULT '0',
  `uang_winduan` double NOT NULL DEFAULT '0',
  `tantiem` double NOT NULL DEFAULT '0',
  `pph21` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nipblth` (`nipblth`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.tunjanganpph: 10 rows
/*!40000 ALTER TABLE `tunjanganpph` DISABLE KEYS */;
INSERT INTO `tunjanganpph` (`id`, `blth`, `nip`, `nipblth`, `tunjangan_transportasi`, `tunjangan_perumahan`, `bantuan_pulsa`, `uang_cuti`, `iks`, `bonus`, `honorarium_eo`, `thr`, `uang_winduan`, `tantiem`, `pph21`) VALUES
	(1, '2019-01', '7905008D', '2019-01.7905008D', 0, 3000000, 1000000, 11358435, 0, 0, 8000000, 0, 0, 0, 0),
	(2, '2019-01', '6793163Z', '2019-01.6793163Z', 7500000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(3, '2019-01', '6592053Z', '2019-01.6592053Z', 7500000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(4, '2019-01', '7702003R2', '2019-01.7702003R2', 7500000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(5, '2019-01', '6685054F', '2019-01.6685054F', 0, 3000000, 1000000, 0, 0, 0, 0, 0, 0, 0, 0),
	(6, '2019-02', '6592053Z', '2019-02.6592053Z', 7500000, 0, 2000000, 20310000, 0, 0, 0, 0, 0, 0, 0),
	(7, '2019-02', '6793163Z', '2019-02.6793163Z', 7500000, 0, 2000000, 21804000, 0, 0, 0, 62000000, 0, 0, 0),
	(8, '2019-02', '7702003R2', '2019-02.7702003R2', 7500000, 0, 2000000, 0, 0, 0, 0, 0, 0, 0, 0),
	(9, '2019-02', '7905008D', '2019-02.7905008D', 0, 3000000, 1000000, 0, 0, 0, 8000000, 0, 0, 0, 0),
	(10, '2019-02', '7208028TRK', '2019-02.7208028TRK', 0, 0, 0, 0, 0, 0, 1050000, 0, 0, 0, 0);
/*!40000 ALTER TABLE `tunjanganpph` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.uang_sppd
CREATE TABLE IF NOT EXISTS `uang_sppd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `blth_proses` varchar(7) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `jumlah` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.uang_sppd: 0 rows
/*!40000 ALTER TABLE `uang_sppd` DISABLE KEYS */;
/*!40000 ALTER TABLE `uang_sppd` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.ubah_nip
CREATE TABLE IF NOT EXISTS `ubah_nip` (
  `id` int NOT NULL AUTO_INCREMENT,
  `niplama` varchar(60) DEFAULT '',
  `nipbaru` varchar(60) DEFAULT '',
  `user` varchar(200) DEFAULT '',
  `waktu` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel hrisori.ubah_nip: 4 rows
/*!40000 ALTER TABLE `ubah_nip` DISABLE KEYS */;
INSERT INTO `ubah_nip` (`id`, `niplama`, `nipbaru`, `user`, `waktu`) VALUES
	(1, '7718001A2L', '7718001A2L2', 'sandy', '2019-12-16 20:11:21'),
	(2, '7718001A2L2', '7718001A2L3', 'sandy', '2019-12-16 20:20:17'),
	(3, '7718001A2L3', '7718001A2L', 'sandy', '2019-12-16 20:20:27'),
	(4, '7292118JA', '7292118TRK', 'david', '2020-03-11 13:35:05');
/*!40000 ALTER TABLE `ubah_nip` ENABLE KEYS */;

-- membuang struktur untuk table hrisori.varcost
CREATE TABLE IF NOT EXISTS `varcost` (
  `id` int NOT NULL AUTO_INCREMENT,
  `blth_gaji` varchar(7) DEFAULT '',
  `nip` varchar(20) DEFAULT '',
  `blth_nip` varchar(20) DEFAULT '',
  `nama_tunjanganvar1` varchar(200) DEFAULT '',
  `tunjanganvar1` double NOT NULL DEFAULT '0',
  `nama_tunjanganvar2` varchar(200) DEFAULT '',
  `tunjanganvar2` double NOT NULL DEFAULT '0',
  `nama_tunjanganvar3` varchar(200) DEFAULT '',
  `tunjanganvar3` double NOT NULL DEFAULT '0',
  `nama_tunjanganvar4` varchar(250) DEFAULT '',
  `tunjanganvar4` double NOT NULL DEFAULT '0',
  `nama_potonganvar1` varchar(200) DEFAULT '',
  `potonganvar1` double NOT NULL DEFAULT '0',
  `nama_potonganvar2` varchar(200) DEFAULT '',
  `potonganvar2` double NOT NULL DEFAULT '0',
  `nama_potonganvar3` varchar(200) DEFAULT '',
  `potonganvar3` double NOT NULL DEFAULT '0',
  `nama_potonganvar4` varchar(250) DEFAULT '',
  `potonganvar4` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blth_nip` (`blth_nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.varcost: ~0 rows (lebih kurang)

-- membuang struktur untuk table hrisori.version
CREATE TABLE IF NOT EXISTS `version` (
  `id` int NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `os` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.version: ~0 rows (lebih kurang)

-- membuang struktur untuk view hrisori.v_list_pajak
-- Membuat tabel sementara untuk menangani kesalahan ketergantungan VIEW
CREATE TABLE `v_list_pajak` (
	`blth` VARCHAR(7) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`nip` VARCHAR(60) NULL COLLATE 'utf8mb4_0900_ai_ci'
) ENGINE=MyISAM;

-- membuang struktur untuk view hrisori.v_sppd
-- Membuat tabel sementara untuk menangani kesalahan ketergantungan VIEW
CREATE TABLE `v_sppd` (
	`id` INT(10) NOT NULL,
	`idsppd` VARCHAR(60) NULL COLLATE 'latin1_swedish_ci',
	`tanggal` VARCHAR(10) NULL COLLATE 'latin1_swedish_ci',
	`jenis_sppd` VARCHAR(1) NULL COLLATE 'latin1_swedish_ci',
	`level_sppd` VARCHAR(1) NULL COLLATE 'latin1_swedish_ci',
	`no_sppd` VARCHAR(60) NULL COLLATE 'latin1_swedish_ci',
	`nip` VARCHAR(30) NULL COLLATE 'latin1_swedish_ci',
	`nama` VARCHAR(200) NULL COLLATE 'latin1_swedish_ci',
	`grade` VARCHAR(60) NULL COLLATE 'latin1_swedish_ci',
	`jabatan` VARCHAR(250) NULL COLLATE 'latin1_swedish_ci',
	`maksud` TEXT NULL COLLATE 'latin1_swedish_ci',
	`kedudukan` VARCHAR(120) NULL COLLATE 'latin1_swedish_ci',
	`tujuan` VARCHAR(120) NULL COLLATE 'latin1_swedish_ci',
	`tgl_awal` VARCHAR(10) NULL COLLATE 'latin1_swedish_ci',
	`tgl_akhir` VARCHAR(10) NULL COLLATE 'latin1_swedish_ci',
	`hari` DOUBLE NOT NULL,
	`kota1a` VARCHAR(120) NULL COLLATE 'latin1_swedish_ci',
	`kota2a` VARCHAR(120) NULL COLLATE 'latin1_swedish_ci',
	`transporta` VARCHAR(1) NULL COLLATE 'latin1_swedish_ci',
	`kota1b` VARCHAR(120) NULL COLLATE 'latin1_swedish_ci',
	`kota2b` VARCHAR(120) NULL COLLATE 'latin1_swedish_ci',
	`transportb` VARCHAR(1) NULL COLLATE 'latin1_swedish_ci',
	`kota1c` VARCHAR(120) NULL COLLATE 'latin1_swedish_ci',
	`kota2c` VARCHAR(120) NULL COLLATE 'latin1_swedish_ci',
	`transportc` VARCHAR(1) NULL COLLATE 'latin1_swedish_ci',
	`kota1d` VARCHAR(120) NULL COLLATE 'latin1_swedish_ci',
	`kota2d` VARCHAR(120) NULL COLLATE 'latin1_swedish_ci',
	`transportd` VARCHAR(1) NULL COLLATE 'latin1_swedish_ci',
	`jenis_tujuan` VARCHAR(1) NULL COLLATE 'latin1_swedish_ci',
	`tgl_proses` VARCHAR(10) NULL COLLATE 'latin1_swedish_ci',
	`petugas` VARCHAR(120) NULL COLLATE 'latin1_swedish_ci',
	`approve1` VARCHAR(1) NOT NULL COLLATE 'latin1_swedish_ci',
	`approval1` VARCHAR(120) NULL COLLATE 'latin1_swedish_ci',
	`tgl_approve1` VARCHAR(10) NULL COLLATE 'latin1_swedish_ci',
	`approve2` VARCHAR(1) NOT NULL COLLATE 'latin1_swedish_ci',
	`approval2` VARCHAR(120) NULL COLLATE 'latin1_swedish_ci',
	`tgl_approve2` VARCHAR(10) NULL COLLATE 'latin1_swedish_ci',
	`bayar` VARCHAR(1) NOT NULL COLLATE 'latin1_swedish_ci',
	`tgl_bayar` VARCHAR(10) NOT NULL COLLATE 'latin1_swedish_ci',
	`restitusi` DOUBLE NULL
) ENGINE=MyISAM;

-- membuang struktur untuk table hrisori.winduan
CREATE TABLE IF NOT EXISTS `winduan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `niptahun` varchar(60) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_pegawai` varchar(10) DEFAULT '',
  `masa_kerja` double NOT NULL DEFAULT '0',
  `p1` double NOT NULL DEFAULT '0',
  `p21` double NOT NULL DEFAULT '0',
  `p22` double NOT NULL DEFAULT '0',
  `koefisien` double NOT NULL DEFAULT '0',
  `winduan` double NOT NULL DEFAULT '0',
  `ppht_upah` double NOT NULL DEFAULT '0',
  `ppht_upah_winduan` double NOT NULL DEFAULT '0',
  `pph21` double NOT NULL DEFAULT '0',
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(200) DEFAULT '',
  `keterangan` varchar(250) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.winduan: ~5 rows (lebih kurang)
INSERT INTO `winduan` (`id`, `blth`, `tahun`, `nip`, `niptahun`, `tgl_masuk`, `tgl_pegawai`, `masa_kerja`, `p1`, `p21`, `p22`, `koefisien`, `winduan`, `ppht_upah`, `ppht_upah_winduan`, `pph21`, `tgl_proses`, `petugas`, `keterangan`) VALUES
	(1, '2021-02', '2021', '7905008D', '2021.7905008D', '2005-01-01', '2005-01-01', 0, 15329860, 3805200, 6031000, 2, 30659720, 0, 0, 0, '2021-03-08', 'hary', ''),
	(2, '2021-07', '2021', '6691029E', '2021.6691029E', '2020-07-01', '', 0, 12698000, 3631600, 4195000, 0, 38094000, 0, 0, 0, '2021-08-03', 'sani', ''),
	(3, '2021-12', '2021', '7905007TRK', '2021.7905007TRK', '2005-01-12', '2005-01-12', 0, 6800948, 2506000, 2870000, 2, 13152672, 0, 0, 0, '2021-12-25', 'hary', ''),
	(4, '2021-12', '2021', '7605011TRK', '2021.7605011TRK', '2005-01-12', '2005-01-12', 0, 6667888, 2389800, 1816000, 2, 12989884, 0, 0, 0, '2021-12-25', 'hary', ''),
	(5, '2021-12', '2021', '7805025TRK', '2021.7805025TRK', '2005-01-12', '2005-01-12', 0, 6772307, 2389800, 1816000, 2, 13210990, 0, 0, 0, '2021-12-25', 'hary', '');

-- membuang struktur untuk view hrisori.v_list_pajak
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `v_list_pajak`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_list_pajak` AS select `gaji`.`blth` AS `blth`,`gaji`.`nip` AS `nip` from `gaji` where (`gaji`.`nip` <> '') union select `iks`.`blth` AS `blth`,`iks`.`nip` AS `nip` from `iks` where (`iks`.`nip` <> '') union select `bonus`.`blth` AS `blth`,`bonus`.`nip` AS `nip` from `bonus` where (`bonus`.`nip` <> '') union select `suplisi`.`blth` AS `blth`,`suplisi`.`nip` AS `nip` from `suplisi` where (`suplisi`.`nip` <> '') union select `honorarium_eo`.`blth` AS `blth`,`honorarium_eo`.`nip` AS `nip` from `honorarium_eo` where (`honorarium_eo`.`nip` <> '') union select `winduan`.`blth` AS `blth`,`winduan`.`nip` AS `nip` from `winduan` where (`winduan`.`nip` <> '') union select `thr`.`blth` AS `blth`,`thr`.`nip` AS `nip` from `thr` where (`thr`.`nip` <> '') union select substr(`sppd`.`tgl_bayar`,1,7) AS `blth`,`sppd`.`nip` AS `nip` from `sppd` where (`sppd`.`nip` <> '') union select `natura`.`blth` AS `blth`,`natura`.`nip` AS `nip` from `natura` where (`natura`.`nip` <> '') union select substr(`sppd`.`tgl_bayar`,1,7) AS `blth`,`sppd`.`nip` AS `nip` from `sppd` where ((`sppd`.`nip` <> '') and (`sppd`.`tgl_bayar` <> '')) group by `blth`,`sppd`.`nip`;

-- membuang struktur untuk view hrisori.v_sppd
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `v_sppd`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_sppd` AS select `a`.`id` AS `id`,`a`.`idsppd` AS `idsppd`,`a`.`tanggal` AS `tanggal`,`a`.`jenis_sppd` AS `jenis_sppd`,`a`.`level_sppd` AS `level_sppd`,`a`.`no_sppd` AS `no_sppd`,`a`.`nip` AS `nip`,`a`.`nama` AS `nama`,`a`.`grade` AS `grade`,`a`.`jabatan` AS `jabatan`,`a`.`maksud1` AS `maksud`,`a`.`kedudukan1` AS `kedudukan`,`a`.`tujuan1` AS `tujuan`,`a`.`tgl_awal1` AS `tgl_awal`,`a`.`tgl_akhir1` AS `tgl_akhir`,`a`.`hari1` AS `hari`,`a`.`kota11a` AS `kota1a`,`a`.`kota12a` AS `kota2a`,`a`.`transport1a` AS `transporta`,`a`.`kota11b` AS `kota1b`,`a`.`kota12b` AS `kota2b`,`a`.`transport1b` AS `transportb`,`a`.`kota11c` AS `kota1c`,`a`.`kota12c` AS `kota2c`,`a`.`transport1c` AS `transportc`,`a`.`kota11d` AS `kota1d`,`a`.`kota12d` AS `kota2d`,`a`.`transport1d` AS `transportd`,`a`.`jenis_tujuan1` AS `jenis_tujuan`,`a`.`tgl_proses` AS `tgl_proses`,`a`.`petugas` AS `petugas`,`a`.`approve1` AS `approve1`,`a`.`approval1` AS `approval1`,`a`.`tgl_approve1` AS `tgl_approve1`,`a`.`approve2` AS `approve2`,`a`.`approval2` AS `approval2`,`a`.`tgl_approve2` AS `tgl_approve2`,`a`.`bayar` AS `bayar`,`a`.`tgl_bayar` AS `tgl_bayar`,sum(`b`.`nilai`) AS `restitusi` from (`sppd` `a` left join `biaya_restitusi` `b` on((`a`.`idsppd` = `b`.`idsppd`))) group by `a`.`idsppd`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
