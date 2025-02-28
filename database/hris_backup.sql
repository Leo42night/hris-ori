/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 5.7.41 : Database - hris
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `akses_token` */

DROP TABLE IF EXISTS `akses_token`;

CREATE TABLE `akses_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jwtToken` text,
  `refreshToken` text,
  `last_generated` varchar(60) DEFAULT '',
  `tgl_expire` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107;

/*Table structure for table `aksesuser` */

DROP TABLE IF EXISTS `aksesuser`;

CREATE TABLE `aksesuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT '',
  `idmenu` int(11) NOT NULL,
  `proses` varchar(1) NOT NULL DEFAULT '0',
  `lihat` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=2456;

/*Table structure for table `aksesuser20220723` */

DROP TABLE IF EXISTS `aksesuser20220723`;

CREATE TABLE `aksesuser20220723` (
  `id` int(11) NOT NULL,
  `username` varchar(60) DEFAULT '',
  `idmenu` int(11) NOT NULL,
  `proses` varchar(1) NOT NULL DEFAULT '0',
  `lihat` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

/*Table structure for table `aksesuser20221130` */

DROP TABLE IF EXISTS `aksesuser20221130`;

CREATE TABLE `aksesuser20221130` (
  `id` int(11) NOT NULL,
  `username` varchar(60) DEFAULT '',
  `idmenu` int(11) NOT NULL,
  `proses` varchar(1) NOT NULL DEFAULT '0',
  `lihat` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

/*Table structure for table `aksesuser20240305` */

DROP TABLE IF EXISTS `aksesuser20240305`;

CREATE TABLE `aksesuser20240305` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT '',
  `idmenu` int(11) NOT NULL,
  `proses` varchar(1) NOT NULL DEFAULT '0',
  `lihat` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=1892;

/*Table structure for table `baseurl_api` */

DROP TABLE IF EXISTS `baseurl_api`;

CREATE TABLE `baseurl_api` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baseurl` varchar(160) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `baseurl_api20230731` */

DROP TABLE IF EXISTS `baseurl_api20230731`;

CREATE TABLE `baseurl_api20230731` (
  `id` int(11) NOT NULL,
  `baseurl` varchar(160) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `data_pegawai` */

DROP TABLE IF EXISTS `data_pegawai`;

CREATE TABLE `data_pegawai` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_capeg` varchar(10) DEFAULT '',
  `tgl_tetap` varchar(10) DEFAULT '',
  `title` varchar(30) DEFAULT '',
  `nama_lengkap` varchar(60) DEFAULT '',
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) ENGINE=InnoDB AUTO_INCREMENT=261;

/*Table structure for table `data_pegawai20220722` */

DROP TABLE IF EXISTS `data_pegawai20220722`;

CREATE TABLE `data_pegawai20220722` (
  `id` int(11) NOT NULL,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_capeg` varchar(10) DEFAULT '',
  `tgl_tetap` varchar(10) DEFAULT '',
  `title` varchar(30) DEFAULT '',
  `nama_lengkap` varchar(60) DEFAULT '',
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
  `jenis_dplk` varchar(2) DEFAULT '',
  `id_dplk` varchar(30) DEFAULT '',
  `bank_dplk` varchar(30) DEFAULT '',
  `no_bpjs_kes` varchar(30) DEFAULT '',
  `no_bpjs_tk` varchar(30) DEFAULT '',
  `bank_payroll` varchar(30) DEFAULT '',
  `an_payroll` varchar(60) DEFAULT '',
  `no_rek_payroll` varchar(30) DEFAULT '',
  `status_integrasi` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) ENGINE=InnoDB;

/*Table structure for table `data_pegawai20220804` */

DROP TABLE IF EXISTS `data_pegawai20220804`;

CREATE TABLE `data_pegawai20220804` (
  `id` int(11) NOT NULL,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_capeg` varchar(10) DEFAULT '',
  `tgl_tetap` varchar(10) DEFAULT '',
  `title` varchar(30) DEFAULT '',
  `nama_lengkap` varchar(60) DEFAULT '',
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) ENGINE=InnoDB;

/*Table structure for table `edata` */

DROP TABLE IF EXISTS `edata`;

CREATE TABLE `edata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `id_edata` int(11) NOT NULL DEFAULT '0',
  `tgl_export` varchar(30) DEFAULT '',
  `file_export` varchar(255) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=120;

/*Table structure for table `history_update` */

DROP TABLE IF EXISTS `history_update`;

CREATE TABLE `history_update` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tabel` varchar(120) DEFAULT '',
  `id_data` varchar(60) DEFAULT '',
  `tgl_perubahan` varchar(30) DEFAULT '',
  `user_perubahan` varchar(60) DEFAULT '',
  `tgl_update_sap` varchar(30) DEFAULT '',
  `user_update_sap` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9794;

/*Table structure for table `m_agama` */

DROP TABLE IF EXISTS `m_agama`;

CREATE TABLE `m_agama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_agama` varchar(3) DEFAULT '',
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `label` (`label`)
) ENGINE=InnoDB AUTO_INCREMENT=8;

/*Table structure for table `m_alasan_berhenti` */

DROP TABLE IF EXISTS `m_alasan_berhenti`;

CREATE TABLE `m_alasan_berhenti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `name` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `m_business_area` */

DROP TABLE IF EXISTS `m_business_area`;

CREATE TABLE `m_business_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2;

/*Table structure for table `m_cluster` */

DROP TABLE IF EXISTS `m_cluster`;

CREATE TABLE `m_cluster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16;

/*Table structure for table `m_company_code` */

DROP TABLE IF EXISTS `m_company_code`;

CREATE TABLE `m_company_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2;

/*Table structure for table `m_dahan_profesi` */

DROP TABLE IF EXISTS `m_dahan_profesi`;

CREATE TABLE `m_dahan_profesi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `kode_pohon_bisnis` varchar(2) DEFAULT '',
  `kode_pohon_profesi` varchar(5) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25;

/*Table structure for table `m_dahan_profesilama` */

DROP TABLE IF EXISTS `m_dahan_profesilama`;

CREATE TABLE `m_dahan_profesilama` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) DEFAULT '',
  `pohon_bisnis` varchar(200) DEFAULT '',
  `pohon_profesi` varchar(200) DEFAULT '',
  `dahan_profesi` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

/*Table structure for table `m_edata` */

DROP TABLE IF EXISTS `m_edata`;

CREATE TABLE `m_edata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_data` varchar(120) DEFAULT '',
  `nama_tabel` varchar(120) DEFAULT '',
  `nama_file` varchar(255) DEFAULT '',
  `nama_tabel_update` varchar(60) DEFAULT '',
  `url_api` varchar(250) DEFAULT '',
  `url` varchar(200) DEFAULT '',
  `status` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28;

/*Table structure for table `m_edata20221130` */

DROP TABLE IF EXISTS `m_edata20221130`;

CREATE TABLE `m_edata20221130` (
  `id` int(11) NOT NULL,
  `nama_data` varchar(120) DEFAULT '',
  `nama_tabel` varchar(120) DEFAULT '',
  `nama_file` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

/*Table structure for table `m_ee_group` */

DROP TABLE IF EXISTS `m_ee_group`;

CREATE TABLE `m_ee_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_ee_group` varchar(10) DEFAULT '',
  `ee_group` varchar(200) DEFAULT '',
  `keterangan` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8;

/*Table structure for table `m_ee_group20201010` */

DROP TABLE IF EXISTS `m_ee_group20201010`;

CREATE TABLE `m_ee_group20201010` (
  `id` int(11) NOT NULL,
  `id_ee_group` varchar(10) DEFAULT '',
  `label` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

/*Table structure for table `m_ee_subgroup` */

DROP TABLE IF EXISTS `m_ee_subgroup`;

CREATE TABLE `m_ee_subgroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_ee_subgroup` varchar(300) DEFAULT '',
  `ee_subgroup` varchar(200) DEFAULT '',
  `keterangan` varchar(200) DEFAULT '',
  `kode_ee_group` varchar(30) DEFAULT '',
  `ee_group` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38;

/*Table structure for table `m_ee_subgroup20201010` */

DROP TABLE IF EXISTS `m_ee_subgroup20201010`;

CREATE TABLE `m_ee_subgroup20201010` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

/*Table structure for table `m_gelar_belakang` */

DROP TABLE IF EXISTS `m_gelar_belakang`;

CREATE TABLE `m_gelar_belakang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 ROW_FORMAT=COMPACT;

/*Table structure for table `m_gelar_depan` */

DROP TABLE IF EXISTS `m_gelar_depan`;

CREATE TABLE `m_gelar_depan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 ROW_FORMAT=COMPACT;

/*Table structure for table `m_gol_darah` */

DROP TABLE IF EXISTS `m_gol_darah`;

CREATE TABLE `m_gol_darah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 ROW_FORMAT=COMPACT;

/*Table structure for table `m_grade` */

DROP TABLE IF EXISTS `m_grade`;

CREATE TABLE `m_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_grade` varchar(30) DEFAULT '',
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 ROW_FORMAT=COMPACT;

/*Table structure for table `m_grade20230117` */

DROP TABLE IF EXISTS `m_grade20230117`;

CREATE TABLE `m_grade20230117` (
  `id` int(11) NOT NULL,
  `kode_grade` varchar(30) DEFAULT '',
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB ROW_FORMAT=COMPACT;

/*Table structure for table `m_gradelama` */

DROP TABLE IF EXISTS `m_gradelama`;

CREATE TABLE `m_gradelama` (
  `id` int(11) NOT NULL,
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB ROW_FORMAT=COMPACT;

/*Table structure for table `m_jenis_alamat` */

DROP TABLE IF EXISTS `m_jenis_alamat`;

CREATE TABLE `m_jenis_alamat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3;

/*Table structure for table `m_jenis_asuransi` */

DROP TABLE IF EXISTS `m_jenis_asuransi`;

CREATE TABLE `m_jenis_asuransi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `name` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `m_jenis_award` */

DROP TABLE IF EXISTS `m_jenis_award`;

CREATE TABLE `m_jenis_award` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_award` varchar(4) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13;

/*Table structure for table `m_jenis_diklat` */

DROP TABLE IF EXISTS `m_jenis_diklat`;

CREATE TABLE `m_jenis_diklat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6446;

/*Table structure for table `m_jenis_dplk` */

DROP TABLE IF EXISTS `m_jenis_dplk`;

CREATE TABLE `m_jenis_dplk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `jenis_dplk` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4;

/*Table structure for table `m_jenis_hukuman` */

DROP TABLE IF EXISTS `m_jenis_hukuman`;

CREATE TABLE `m_jenis_hukuman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3;

/*Table structure for table `m_jenis_identitas` */

DROP TABLE IF EXISTS `m_jenis_identitas`;

CREATE TABLE `m_jenis_identitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_identitas` varchar(2) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12;

/*Table structure for table `m_jenis_jabatan` */

DROP TABLE IF EXISTS `m_jenis_jabatan`;

CREATE TABLE `m_jenis_jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9;

/*Table structure for table `m_jenis_jabatan20230303` */

DROP TABLE IF EXISTS `m_jenis_jabatan20230303`;

CREATE TABLE `m_jenis_jabatan20230303` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

/*Table structure for table `m_jenis_jabatanlama` */

DROP TABLE IF EXISTS `m_jenis_jabatanlama`;

CREATE TABLE `m_jenis_jabatanlama` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

/*Table structure for table `m_jenis_karya_tulis` */

DROP TABLE IF EXISTS `m_jenis_karya_tulis`;

CREATE TABLE `m_jenis_karya_tulis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_jenis` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3;

/*Table structure for table `m_jenis_kelamin` */

DROP TABLE IF EXISTS `m_jenis_kelamin`;

CREATE TABLE `m_jenis_kelamin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 ROW_FORMAT=COMPACT;

/*Table structure for table `m_jenis_keluarga` */

DROP TABLE IF EXISTS `m_jenis_keluarga`;

CREATE TABLE `m_jenis_keluarga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis_keluarga` varchar(10) DEFAULT '',
  `label` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8;

/*Table structure for table `m_jenis_lembaga` */

DROP TABLE IF EXISTS `m_jenis_lembaga`;

CREATE TABLE `m_jenis_lembaga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3;

/*Table structure for table `m_jenis_medsos` */

DROP TABLE IF EXISTS `m_jenis_medsos`;

CREATE TABLE `m_jenis_medsos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(160) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 ROW_FORMAT=COMPACT;

/*Table structure for table `m_jenis_organisasi` */

DROP TABLE IF EXISTS `m_jenis_organisasi`;

CREATE TABLE `m_jenis_organisasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_organisasi` varchar(3) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3;

/*Table structure for table `m_jenis_pelaksanaan` */

DROP TABLE IF EXISTS `m_jenis_pelaksanaan`;

CREATE TABLE `m_jenis_pelaksanaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7;

/*Table structure for table `m_jenis_pendidikan` */

DROP TABLE IF EXISTS `m_jenis_pendidikan`;

CREATE TABLE `m_jenis_pendidikan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(3) NOT NULL DEFAULT '',
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 ROW_FORMAT=COMPACT;

/*Table structure for table `m_jenis_sertifikat` */

DROP TABLE IF EXISTS `m_jenis_sertifikat`;

CREATE TABLE `m_jenis_sertifikat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3;

/*Table structure for table `m_jenjang_jabatan` */

DROP TABLE IF EXISTS `m_jenjang_jabatan`;

CREATE TABLE `m_jenjang_jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=159;

/*Table structure for table `m_jenjang_jabatan20230303` */

DROP TABLE IF EXISTS `m_jenjang_jabatan20230303`;

CREATE TABLE `m_jenjang_jabatan20230303` (
  `id` int(11) NOT NULL,
  `kode_jenis_jabatan` varchar(10) DEFAULT '',
  `kode` varchar(10) DEFAULT '',
  `label` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

/*Table structure for table `m_jenjang_jabatan20230807` */

DROP TABLE IF EXISTS `m_jenjang_jabatan20230807`;

CREATE TABLE `m_jenjang_jabatan20230807` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

/*Table structure for table `m_jenjang_jabatanlama` */

DROP TABLE IF EXISTS `m_jenjang_jabatanlama`;

CREATE TABLE `m_jenjang_jabatanlama` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

/*Table structure for table `m_judul_lms` */

DROP TABLE IF EXISTS `m_judul_lms`;

CREATE TABLE `m_judul_lms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(30) DEFAULT '',
  `label` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5602;

/*Table structure for table `m_kabupaten` */

DROP TABLE IF EXISTS `m_kabupaten`;

CREATE TABLE `m_kabupaten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kabupaten` varchar(4) DEFAULT '',
  `id_provinsi` varchar(3) DEFAULT '',
  `nama_kabupaten` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=515;

/*Table structure for table `m_kabupaten20221004` */

DROP TABLE IF EXISTS `m_kabupaten20221004`;

CREATE TABLE `m_kabupaten20221004` (
  `id` int(11) NOT NULL,
  `id_kabupaten` varchar(4) DEFAULT '',
  `id_provinsi` varchar(3) DEFAULT '',
  `nama_kabupaten` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

/*Table structure for table `m_keterangan_mutasi` */

DROP TABLE IF EXISTS `m_keterangan_mutasi`;

CREATE TABLE `m_keterangan_mutasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `name` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `m_keterangan_pendidikan` */

DROP TABLE IF EXISTS `m_keterangan_pendidikan`;

CREATE TABLE `m_keterangan_pendidikan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 ROW_FORMAT=COMPACT;

/*Table structure for table `m_keyb` */

DROP TABLE IF EXISTS `m_keyb`;

CREATE TABLE `m_keyb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=310;

/*Table structure for table `m_kode_diklat` */

DROP TABLE IF EXISTS `m_kode_diklat`;

CREATE TABLE `m_kode_diklat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(60) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5602;

/*Table structure for table `m_kompetensi` */

DROP TABLE IF EXISTS `m_kompetensi`;

CREATE TABLE `m_kompetensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kompetensi` varchar(10) DEFAULT '',
  `kompetensi` varchar(200) DEFAULT '',
  `inisial_kompetensi` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113;

/*Table structure for table `m_level_profesiensi` */

DROP TABLE IF EXISTS `m_level_profesiensi`;

CREATE TABLE `m_level_profesiensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_level` varchar(10) DEFAULT '',
  `label` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 ROW_FORMAT=COMPACT;

/*Table structure for table `m_level_sertifikasi` */

DROP TABLE IF EXISTS `m_level_sertifikasi`;

CREATE TABLE `m_level_sertifikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10;

/*Table structure for table `m_negara` */

DROP TABLE IF EXISTS `m_negara`;

CREATE TABLE `m_negara` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_negara` varchar(2) DEFAULT '',
  `nama_negara` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=242 ROW_FORMAT=COMPACT;

/*Table structure for table `m_nilai_talenta` */

DROP TABLE IF EXISTS `m_nilai_talenta`;

CREATE TABLE `m_nilai_talenta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(3) DEFAULT '',
  `label` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10;

/*Table structure for table `m_nki` */

DROP TABLE IF EXISTS `m_nki`;

CREATE TABLE `m_nki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_nki` varchar(10) DEFAULT '',
  `score_awal` double NOT NULL DEFAULT '0',
  `score_akhir` double NOT NULL DEFAULT '0',
  `keterangan` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5;

/*Table structure for table `m_nsk` */

DROP TABLE IF EXISTS `m_nsk`;

CREATE TABLE `m_nsk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_nsk` varchar(10) DEFAULT '',
  `score_awal` double NOT NULL DEFAULT '0',
  `score_akhir` double NOT NULL DEFAULT '0',
  `keterangan` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6;

/*Table structure for table `m_pekerjaan` */

DROP TABLE IF EXISTS `m_pekerjaan`;

CREATE TABLE `m_pekerjaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(160) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `label` (`label`)
) ENGINE=InnoDB AUTO_INCREMENT=5;

/*Table structure for table `m_penyelenggaraan` */

DROP TABLE IF EXISTS `m_penyelenggaraan`;

CREATE TABLE `m_penyelenggaraan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(3) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9;

/*Table structure for table `m_personal_area` */

DROP TABLE IF EXISTS `m_personal_area`;

CREATE TABLE `m_personal_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=16;

/*Table structure for table `m_personal_area20201010` */

DROP TABLE IF EXISTS `m_personal_area20201010`;

CREATE TABLE `m_personal_area20201010` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

/*Table structure for table `m_personal_sub_area` */

DROP TABLE IF EXISTS `m_personal_sub_area`;

CREATE TABLE `m_personal_sub_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personal_area` varchar(200) DEFAULT '',
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=143;

/*Table structure for table `m_personal_sub_area20201010` */

DROP TABLE IF EXISTS `m_personal_sub_area20201010`;

CREATE TABLE `m_personal_sub_area20201010` (
  `id` int(11) NOT NULL,
  `personal_area` varchar(200) DEFAULT '',
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

/*Table structure for table `m_pln_group` */

DROP TABLE IF EXISTS `m_pln_group`;

CREATE TABLE `m_pln_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14;

/*Table structure for table `m_pohon_bisnis` */

DROP TABLE IF EXISTS `m_pohon_bisnis`;

CREATE TABLE `m_pohon_bisnis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(2) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4;

/*Table structure for table `m_pohon_profesi` */

DROP TABLE IF EXISTS `m_pohon_profesi`;

CREATE TABLE `m_pohon_profesi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(5) DEFAULT '',
  `kode_pohon_bisnis` varchar(2) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18;

/*Table structure for table `m_pohon_profesinew` */

DROP TABLE IF EXISTS `m_pohon_profesinew`;

CREATE TABLE `m_pohon_profesinew` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pohon_bisnis` varchar(2) DEFAULT '',
  `pohon_bisnis` varchar(120) DEFAULT '',
  `kode_pohon_profesi` varchar(10) DEFAULT '',
  `pohon_profesi` varchar(160) DEFAULT '',
  `kode_dahan_profesi` varchar(10) DEFAULT '',
  `dahan_profesi` varchar(160) DEFAULT '',
  `no_nama_profesi` varchar(30) DEFAULT '',
  `kode_nama_profesi` varchar(30) DEFAULT '',
  `nama_profesi` varchar(160) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode_nama_profesi` (`kode_nama_profesi`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `m_pohon_profesinew20230807` */

DROP TABLE IF EXISTS `m_pohon_profesinew20230807`;

CREATE TABLE `m_pohon_profesinew20230807` (
  `id` int(11) NOT NULL,
  `kode_pohon_bisnis` varchar(2) DEFAULT '',
  `pohon_bisnis` varchar(120) DEFAULT '',
  `kode_pohon_profesi` varchar(10) DEFAULT '',
  `pohon_profesi` varchar(160) DEFAULT '',
  `kode_dahan_profesi` varchar(10) DEFAULT '',
  `dahan_profesi` varchar(160) DEFAULT '',
  `kode_nama_profesi` varchar(30) DEFAULT '',
  `nama_profesi` varchar(160) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode_nama_profesi` (`kode_nama_profesi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `m_pohon_profesinew20240117` */

DROP TABLE IF EXISTS `m_pohon_profesinew20240117`;

CREATE TABLE `m_pohon_profesinew20240117` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pohon_bisnis` varchar(2) DEFAULT '',
  `pohon_bisnis` varchar(120) DEFAULT '',
  `kode_pohon_profesi` varchar(10) DEFAULT '',
  `pohon_profesi` varchar(160) DEFAULT '',
  `kode_dahan_profesi` varchar(10) DEFAULT '',
  `dahan_profesi` varchar(160) DEFAULT '',
  `kode_nama_profesi` varchar(30) DEFAULT '',
  `nama_profesi` varchar(160) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode_nama_profesi` (`kode_nama_profesi`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `m_posisi_kunci` */

DROP TABLE IF EXISTS `m_posisi_kunci`;

CREATE TABLE `m_posisi_kunci` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(160) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `m_profesi` */

DROP TABLE IF EXISTS `m_profesi`;

CREATE TABLE `m_profesi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_profesi` varchar(30) DEFAULT '',
  `nama_profesi` varchar(200) DEFAULT '',
  `kode_dahan_profesi` varchar(30) DEFAULT '',
  `dahan_profesi` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84;

/*Table structure for table `m_profesi20221010` */

DROP TABLE IF EXISTS `m_profesi20221010`;

CREATE TABLE `m_profesi20221010` (
  `id` int(11) NOT NULL,
  `kode` varchar(30) DEFAULT '',
  `kode_pohon_bisnis` varchar(200) DEFAULT '',
  `kode_pohon_profesi` varchar(200) DEFAULT '',
  `kode_dahan_profesi` varchar(200) DEFAULT '',
  `profesi` varchar(250) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

/*Table structure for table `m_profesilama` */

DROP TABLE IF EXISTS `m_profesilama`;

CREATE TABLE `m_profesilama` (
  `id` int(11) NOT NULL,
  `kode` varchar(30) DEFAULT '',
  `pohon_bisnis` varchar(200) DEFAULT '',
  `pohon_profesi` varchar(200) DEFAULT '',
  `dahan_profesi` varchar(200) DEFAULT '',
  `profesi` varchar(250) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

/*Table structure for table `m_provinsi` */

DROP TABLE IF EXISTS `m_provinsi`;

CREATE TABLE `m_provinsi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_provinsi` varchar(3) DEFAULT '',
  `nama_provinsi` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35;

/*Table structure for table `m_provinsi20221004` */

DROP TABLE IF EXISTS `m_provinsi20221004`;

CREATE TABLE `m_provinsi20221004` (
  `id` int(11) NOT NULL,
  `id_provinsi` varchar(3) DEFAULT '',
  `nama_provinsi` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

/*Table structure for table `m_reason` */

DROP TABLE IF EXISTS `m_reason`;

CREATE TABLE `m_reason` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44;

/*Table structure for table `m_reason20221004` */

DROP TABLE IF EXISTS `m_reason20221004`;

CREATE TABLE `m_reason20221004` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

/*Table structure for table `m_reason_hukuman` */

DROP TABLE IF EXISTS `m_reason_hukuman`;

CREATE TABLE `m_reason_hukuman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_reason` varchar(2) DEFAULT '',
  `label` varchar(160) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6;

/*Table structure for table `m_result_hukuman` */

DROP TABLE IF EXISTS `m_result_hukuman`;

CREATE TABLE `m_result_hukuman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_result` varchar(2) DEFAULT '',
  `label` varchar(160) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19;

/*Table structure for table `m_satuan` */

DROP TABLE IF EXISTS `m_satuan`;

CREATE TABLE `m_satuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7;

/*Table structure for table `m_satuan_lama_pendidikan` */

DROP TABLE IF EXISTS `m_satuan_lama_pendidikan`;

CREATE TABLE `m_satuan_lama_pendidikan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7;

/*Table structure for table `m_satuan_lama_pendidikan20221004` */

DROP TABLE IF EXISTS `m_satuan_lama_pendidikan20221004`;

CREATE TABLE `m_satuan_lama_pendidikan20221004` (
  `id` int(11) NOT NULL,
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB ROW_FORMAT=COMPACT;

/*Table structure for table `m_sifat_diklat` */

DROP TABLE IF EXISTS `m_sifat_diklat`;

CREATE TABLE `m_sifat_diklat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4;

/*Table structure for table `m_stage_hukuman` */

DROP TABLE IF EXISTS `m_stage_hukuman`;

CREATE TABLE `m_stage_hukuman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_stage` varchar(2) DEFAULT '',
  `label` varchar(160) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8;

/*Table structure for table `m_status_hukuman` */

DROP TABLE IF EXISTS `m_status_hukuman`;

CREATE TABLE `m_status_hukuman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_status` varchar(2) DEFAULT '',
  `label` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9;

/*Table structure for table `m_status_integrasi` */

DROP TABLE IF EXISTS `m_status_integrasi`;

CREATE TABLE `m_status_integrasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_integrasi` varchar(1) DEFAULT '',
  `label` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3;

/*Table structure for table `m_status_kewarganegaraan` */

DROP TABLE IF EXISTS `m_status_kewarganegaraan`;

CREATE TABLE `m_status_kewarganegaraan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL DEFAULT '',
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 ROW_FORMAT=COMPACT;

/*Table structure for table `m_status_nikah` */

DROP TABLE IF EXISTS `m_status_nikah`;

CREATE TABLE `m_status_nikah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 ROW_FORMAT=COMPACT;

/*Table structure for table `m_stream` */

DROP TABLE IF EXISTS `m_stream`;

CREATE TABLE `m_stream` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22;

/*Table structure for table `m_subtype` */

DROP TABLE IF EXISTS `m_subtype`;

CREATE TABLE `m_subtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10;

/*Table structure for table `m_suku` */

DROP TABLE IF EXISTS `m_suku`;

CREATE TABLE `m_suku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 ROW_FORMAT=COMPACT;

/*Table structure for table `m_tingkat_acara` */

DROP TABLE IF EXISTS `m_tingkat_acara`;

CREATE TABLE `m_tingkat_acara` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(3) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4;

/*Table structure for table `m_tingkat_keahlian` */

DROP TABLE IF EXISTS `m_tingkat_keahlian`;

CREATE TABLE `m_tingkat_keahlian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(3) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  `bobot` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4;

/*Table structure for table `m_tingkat_pengalaman` */

DROP TABLE IF EXISTS `m_tingkat_pengalaman`;

CREATE TABLE `m_tingkat_pengalaman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4;

/*Table structure for table `m_tipe` */

DROP TABLE IF EXISTS `m_tipe`;

CREATE TABLE `m_tipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4;

/*Table structure for table `m_title` */

DROP TABLE IF EXISTS `m_title`;

CREATE TABLE `m_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(2) DEFAULT '',
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 ROW_FORMAT=COMPACT;

/*Table structure for table `m_udiklat` */

DROP TABLE IF EXISTS `m_udiklat`;

CREATE TABLE `m_udiklat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT '',
  `label` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11;

/*Table structure for table `master_grup` */

DROP TABLE IF EXISTS `master_grup`;

CREATE TABLE `master_grup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grup` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=16;

/*Table structure for table `masteruser` */

DROP TABLE IF EXISTS `masteruser`;

CREATE TABLE `masteruser` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=235 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

/*Table structure for table `masteruser20220723` */

DROP TABLE IF EXISTS `masteruser20220723`;

CREATE TABLE `masteruser20220723` (
  `id` bigint(20) NOT NULL,
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
) DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

/*Table structure for table `nodes` */

DROP TABLE IF EXISTS `nodes`;

CREATE TABLE `nodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grup` varchar(120) DEFAULT '',
  `parentId` varchar(3) DEFAULT '',
  `parentId2` varchar(3) DEFAULT '',
  `parentId3` varchar(3) DEFAULT '',
  `name` varchar(120) NOT NULL DEFAULT '',
  `icon` varchar(120) DEFAULT '',
  `url` varchar(120) DEFAULT '',
  `state` varchar(30) DEFAULT '',
  `urut` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=252;

/*Table structure for table `nodes20220723` */

DROP TABLE IF EXISTS `nodes20220723`;

CREATE TABLE `nodes20220723` (
  `id` int(11) NOT NULL,
  `grup` varchar(120) DEFAULT '',
  `parentId` varchar(3) DEFAULT '',
  `parentId2` varchar(3) DEFAULT '',
  `parentId3` varchar(3) DEFAULT '',
  `name` varchar(120) NOT NULL DEFAULT '',
  `icon` varchar(120) DEFAULT '',
  `url` varchar(120) DEFAULT '',
  `state` varchar(30) DEFAULT '',
  `urut` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

/*Table structure for table `nodes20221130` */

DROP TABLE IF EXISTS `nodes20221130`;

CREATE TABLE `nodes20221130` (
  `id` int(11) NOT NULL,
  `grup` varchar(120) DEFAULT '',
  `parentId` varchar(3) DEFAULT '',
  `parentId2` varchar(3) DEFAULT '',
  `parentId3` varchar(3) DEFAULT '',
  `name` varchar(120) NOT NULL DEFAULT '',
  `icon` varchar(120) DEFAULT '',
  `url` varchar(120) DEFAULT '',
  `state` varchar(30) DEFAULT '',
  `urut` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

/*Table structure for table `nodes20230804` */

DROP TABLE IF EXISTS `nodes20230804`;

CREATE TABLE `nodes20230804` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grup` varchar(120) DEFAULT '',
  `parentId` varchar(3) DEFAULT '',
  `parentId2` varchar(3) DEFAULT '',
  `parentId3` varchar(3) DEFAULT '',
  `name` varchar(120) NOT NULL DEFAULT '',
  `icon` varchar(120) DEFAULT '',
  `url` varchar(120) DEFAULT '',
  `state` varchar(30) DEFAULT '',
  `urut` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=204;

/*Table structure for table `nodes20240305` */

DROP TABLE IF EXISTS `nodes20240305`;

CREATE TABLE `nodes20240305` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grup` varchar(120) DEFAULT '',
  `parentId` varchar(3) DEFAULT '',
  `parentId2` varchar(3) DEFAULT '',
  `parentId3` varchar(3) DEFAULT '',
  `name` varchar(120) NOT NULL DEFAULT '',
  `icon` varchar(120) DEFAULT '',
  `url` varchar(120) DEFAULT '',
  `state` varchar(30) DEFAULT '',
  `urut` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=206;

/*Table structure for table `r_alamat` */
-- membuang struktur untuk table hrisori.rwyt_grade
CREATE TABLE IF NOT EXISTS `rwyt_grade` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel hrisori.rwyt_grade: ~0 rows (lebih kurang)

DROP TABLE IF EXISTS `r_alamat`;

CREATE TABLE `r_alamat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=129;

/*Table structure for table `r_atasan` */

DROP TABLE IF EXISTS `r_atasan`;

CREATE TABLE `r_atasan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=413;

/*Table structure for table `r_award` */

DROP TABLE IF EXISTS `r_award`;

CREATE TABLE `r_award` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=22 ROW_FORMAT=COMPACT;

/*Table structure for table `r_cluster` */

DROP TABLE IF EXISTS `r_cluster`;

CREATE TABLE `r_cluster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `assesment` varchar(250) DEFAULT '',
  `cluster` varchar(10) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

/*Table structure for table `r_diklat` */

DROP TABLE IF EXISTS `r_diklat`;

CREATE TABLE `r_diklat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=2253 ROW_FORMAT=COMPACT;

/*Table structure for table `r_diklat20230308` */

DROP TABLE IF EXISTS `r_diklat20230308`;

CREATE TABLE `r_diklat20230308` (
  `id` int(11) NOT NULL,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `jenis_diklat` varchar(10) DEFAULT '',
  `kode_diklat` varchar(160) DEFAULT '',
  `judul_diklat` varchar(250) DEFAULT '',
  `penyelenggaraan` varchar(10) DEFAULT '',
  `kode_profesi` varchar(10) DEFAULT '',
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
) ENGINE=InnoDB ROW_FORMAT=COMPACT;

/*Table structure for table `r_diklat_backup` */

DROP TABLE IF EXISTS `r_diklat_backup`;

CREATE TABLE `r_diklat_backup` (
  `id` int(11) NOT NULL,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `jenis_diklat` varchar(10) DEFAULT '',
  `kode_diklat` varchar(160) DEFAULT '',
  `judul_diklat` varchar(250) DEFAULT '',
  `penyelenggaraan` varchar(10) DEFAULT '',
  `kode_profesi` varchar(10) DEFAULT '',
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
) ENGINE=InnoDB ROW_FORMAT=COMPACT;

/*Table structure for table `r_diklat_penjenjangan` */

DROP TABLE IF EXISTS `r_diklat_penjenjangan`;

CREATE TABLE `r_diklat_penjenjangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=15 ROW_FORMAT=COMPACT;

/*Table structure for table `r_foto` */

DROP TABLE IF EXISTS `r_foto`;

CREATE TABLE `r_foto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `lokasi_foto` varchar(255) DEFAULT '',
  `nama_file` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41;

/*Table structure for table `r_grade` */

DROP TABLE IF EXISTS `r_grade`;

CREATE TABLE `r_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=333;

/*Table structure for table `r_grade20221017` */

DROP TABLE IF EXISTS `r_grade20221017`;

CREATE TABLE `r_grade20221017` (
  `id` int(11) NOT NULL,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `grade` varchar(120) DEFAULT '',
  `level_phdp` varchar(2) DEFAULT '',
  `kode_reason` varchar(10) DEFAULT '',
  `kode_subtype` varchar(10) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

/*Table structure for table `r_hukuman` */

DROP TABLE IF EXISTS `r_hukuman`;

CREATE TABLE `r_hukuman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=4 ROW_FORMAT=COMPACT;

/*Table structure for table `r_identitas` */

DROP TABLE IF EXISTS `r_identitas`;

CREATE TABLE `r_identitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `kode_identitas` varchar(2) DEFAULT '',
  `id_number` varchar(30) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=253;

/*Table structure for table `r_jabatan` */

DROP TABLE IF EXISTS `r_jabatan`;

CREATE TABLE `r_jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=638;

/*Table structure for table `r_jabatan20230303` */

DROP TABLE IF EXISTS `r_jabatan20230303`;

CREATE TABLE `r_jabatan20230303` (
  `id` int(11) NOT NULL,
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
) ENGINE=InnoDB;

/*Table structure for table `r_jabatanlama20220818` */

DROP TABLE IF EXISTS `r_jabatanlama20220818`;

CREATE TABLE `r_jabatanlama20220818` (
  `id` int(11) NOT NULL,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `id_ee_group` varchar(2) DEFAULT '',
  `ee_subgroup` varchar(120) DEFAULT '',
  `job_key` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `organisasi` varchar(200) DEFAULT '',
  `id_kabupaten` varchar(4) DEFAULT '',
  `jenis_jabatan` varchar(120) DEFAULT '',
  `jenjang_jabatan` varchar(120) DEFAULT '',
  `kode_profesi` varchar(30) DEFAULT '',
  `nama_profesi` varchar(160) DEFAULT '',
  `jenis_unit` varchar(160) DEFAULT '',
  `kelas_unit` varchar(60) DEFAULT '',
  `kode_daerah` varchar(30) DEFAULT '',
  `stream_business` varchar(60) DEFAULT '',
  `nip_atasan` varchar(30) DEFAULT '',
  `jabatan_atasan` varchar(160) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

/*Table structure for table `r_karya_tulis` */

DROP TABLE IF EXISTS `r_karya_tulis`;

CREATE TABLE `r_karya_tulis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=7;

/*Table structure for table `r_keahlian` */

DROP TABLE IF EXISTS `r_keahlian`;

CREATE TABLE `r_keahlian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `kode_profesi` varchar(30) DEFAULT '',
  `tingkat_keahlian` varchar(30) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3;

/*Table structure for table `r_keluarga` */

DROP TABLE IF EXISTS `r_keluarga`;

CREATE TABLE `r_keluarga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `id_jenis_keluarga` varchar(10) DEFAULT '',
  `no_urut` int(11) NOT NULL DEFAULT '1',
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
) ENGINE=InnoDB AUTO_INCREMENT=225;

/*Table structure for table `r_keyb` */

DROP TABLE IF EXISTS `r_keyb`;

CREATE TABLE `r_keyb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB;

/*Table structure for table `r_kompetensi` */

DROP TABLE IF EXISTS `r_kompetensi`;

CREATE TABLE `r_kompetensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `cluster` varchar(10) DEFAULT '',
  `kompetensi` varchar(10) DEFAULT '',
  `rating` varchar(200) DEFAULT '',
  `deskripsi` varchar(200) DEFAULT '',
  `presentase` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

/*Table structure for table `r_lembaga` */

DROP TABLE IF EXISTS `r_lembaga`;

CREATE TABLE `r_lembaga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=13;

/*Table structure for table `r_medsos` */

DROP TABLE IF EXISTS `r_medsos`;

CREATE TABLE `r_medsos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `jenis_medsos` varchar(10) DEFAULT '',
  `id_medsos` varchar(200) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=423 ROW_FORMAT=COMPACT;

/*Table structure for table `r_medsos20240219` */

DROP TABLE IF EXISTS `r_medsos20240219`;

CREATE TABLE `r_medsos20240219` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `jenis_medsos` varchar(10) DEFAULT '',
  `id_medsos` varchar(200) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=221 ROW_FORMAT=COMPACT;

/*Table structure for table `r_medsosafteredit` */

DROP TABLE IF EXISTS `r_medsosafteredit`;

CREATE TABLE `r_medsosafteredit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `jenis_medsos` varchar(10) DEFAULT '',
  `id_medsos` varchar(200) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=277 ROW_FORMAT=COMPACT;

/*Table structure for table `r_pemberhentian` */

DROP TABLE IF EXISTS `r_pemberhentian`;

CREATE TABLE `r_pemberhentian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

/*Table structure for table `r_pembicara` */

DROP TABLE IF EXISTS `r_pembicara`;

CREATE TABLE `r_pembicara` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=8 ROW_FORMAT=COMPACT;

/*Table structure for table `r_pendidikan` */

DROP TABLE IF EXISTS `r_pendidikan`;

CREATE TABLE `r_pendidikan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `lama_pendidikan` int(11) NOT NULL DEFAULT '0',
  `satuan_lama_pendidikan` varchar(60) DEFAULT '',
  `nilai` varchar(5) DEFAULT '',
  `kode_transaksi` varchar(120) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=183;

/*Table structure for table `r_pendidikan20221004` */

DROP TABLE IF EXISTS `r_pendidikan20221004`;

CREATE TABLE `r_pendidikan20221004` (
  `id` int(11) NOT NULL,
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
  `lama_pendidikan` int(11) NOT NULL DEFAULT '0',
  `satuan_lama_pendidikan` varchar(60) DEFAULT '',
  `nilai` varchar(5) DEFAULT '',
  `kode_transaksi` varchar(120) DEFAULT ''
) ENGINE=InnoDB;

/*Table structure for table `r_pendidikan20231003` */

DROP TABLE IF EXISTS `r_pendidikan20231003`;

CREATE TABLE `r_pendidikan20231003` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `lama_pendidikan` int(11) NOT NULL DEFAULT '0',
  `satuan_lama_pendidikan` varchar(60) DEFAULT '',
  `nilai` varchar(5) DEFAULT '',
  `kode_transaksi` varchar(120) DEFAULT '',
  `status_edit` varchar(1) NOT NULL DEFAULT '0',
  `tgl_edit` varchar(30) DEFAULT '',
  `user_edit` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=169;

/*Table structure for table `r_pengajar` */

DROP TABLE IF EXISTS `r_pengajar`;

CREATE TABLE `r_pengajar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB ROW_FORMAT=COMPACT;

/*Table structure for table `r_pengangkatan` */

DROP TABLE IF EXISTS `r_pengangkatan`;

CREATE TABLE `r_pengangkatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=227 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `r_pengangkatan20230810` */

DROP TABLE IF EXISTS `r_pengangkatan20230810`;

CREATE TABLE `r_pengangkatan20230810` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `r_pengangkatanlama` */

DROP TABLE IF EXISTS `r_pengangkatanlama`;

CREATE TABLE `r_pengangkatanlama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(16) DEFAULT '',
  `tgl_lahir` varchar(10) DEFAULT '',
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
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `r_penugasan` */

DROP TABLE IF EXISTS `r_penugasan`;

CREATE TABLE `r_penugasan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=4;

/*Table structure for table `r_position_management` */

DROP TABLE IF EXISTS `r_position_management`;

CREATE TABLE `r_position_management` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=410 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

/*Table structure for table `r_rekomendasi` */

DROP TABLE IF EXISTS `r_rekomendasi`;

CREATE TABLE `r_rekomendasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB ROW_FORMAT=COMPACT;

/*Table structure for table `r_sertifikat` */

DROP TABLE IF EXISTS `r_sertifikat`;

CREATE TABLE `r_sertifikat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=138;

/*Table structure for table `r_sertifikat20230810` */

DROP TABLE IF EXISTS `r_sertifikat20230810`;

CREATE TABLE `r_sertifikat20230810` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=32;

/*Table structure for table `r_sertifikat_backup` */

DROP TABLE IF EXISTS `r_sertifikat_backup`;

CREATE TABLE `r_sertifikat_backup` (
  `id` int(11) NOT NULL,
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
  `user_edit` varchar(60) DEFAULT ''
) ENGINE=InnoDB;

/*Table structure for table `r_struktur` */

DROP TABLE IF EXISTS `r_struktur`;

CREATE TABLE `r_struktur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lokasi_file` varchar(255) DEFAULT '',
  `nama_file` varchar(255) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `no_dokumen` varchar(160) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11;

/*Table structure for table `r_talenta` */

DROP TABLE IF EXISTS `r_talenta`;

CREATE TABLE `r_talenta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=1201;

/*Table structure for table `r_talentalama` */

DROP TABLE IF EXISTS `r_talentalama`;

CREATE TABLE `r_talentalama` (
  `id` int(11) NOT NULL,
  `nip` varchar(30) DEFAULT '',
  `start_date` varchar(10) DEFAULT '',
  `end_date` varchar(10) DEFAULT '',
  `nilai_talenta` varchar(3) DEFAULT '',
  `nki` double NOT NULL DEFAULT '0',
  `nsk` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB;

/*Table structure for table `r_urjab` */

DROP TABLE IF EXISTS `r_urjab`;

CREATE TABLE `r_urjab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lokasi_file` varchar(250) DEFAULT '',
  `nama_file` varchar(160) DEFAULT '',
  `no_dokumen` varchar(160) DEFAULT '',
  `keterangan` varchar(250) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 ROW_FORMAT=COMPACT;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
