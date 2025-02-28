/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 5.7.41 : Database - organikplnt2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `absensi` */

DROP TABLE IF EXISTS `absensi`;

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
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
) AUTO_INCREMENT=138176;

/*Table structure for table `absensi_2025` */

DROP TABLE IF EXISTS `absensi_2025`;

CREATE TABLE `absensi_2025` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
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
) AUTO_INCREMENT=138340;

/*Table structure for table `aktivitas_harian` */

DROP TABLE IF EXISTS `aktivitas_harian`;

CREATE TABLE `aktivitas_harian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(10) DEFAULT '',
  `nip` varchar(20) DEFAULT '',
  `uraian` varchar(255) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `eviden` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=10906;

/*Table structure for table `atasan_langsung` */

DROP TABLE IF EXISTS `atasan_langsung`;

CREATE TABLE `atasan_langsung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=7;

/*Table structure for table `attempt` */

DROP TABLE IF EXISTS `attempt`;

CREATE TABLE `attempt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attempt` varchar(3) DEFAULT NULL,
  `nip` varchar(60) DEFAULT NULL,
  `locked` varchar(50) DEFAULT NULL,
  `tanggal` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=280 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `authentication_log` */

DROP TABLE IF EXISTS `authentication_log`;

CREATE TABLE `authentication_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `authenticatable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authenticatable_id` bigint(20) unsigned NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `login_at` timestamp NULL DEFAULT NULL,
  `logout_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `authentication_log_authenticatable_type_authenticatable_id_index` (`authenticatable_type`,`authenticatable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `beban_pph` */

DROP TABLE IF EXISTS `beban_pph`;

CREATE TABLE `beban_pph` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `beban_pph21` double NOT NULL DEFAULT '0',
  `kode` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode` (`kode`)
) AUTO_INCREMENT=2846 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `beban_pph21` */

DROP TABLE IF EXISTS `beban_pph21`;

CREATE TABLE `beban_pph21` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=19647;

/*Table structure for table `beban_pph21real` */

DROP TABLE IF EXISTS `beban_pph21real`;

CREATE TABLE `beban_pph21real` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=19647;

/*Table structure for table `biaya_restitusi` */

DROP TABLE IF EXISTS `biaya_restitusi`;

CREATE TABLE `biaya_restitusi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsppd` varchar(120) DEFAULT '',
  `idrestitusi` int(11) NOT NULL DEFAULT '0',
  `jenis_restitusi` varchar(200) DEFAULT '',
  `nilai` double NOT NULL DEFAULT '0',
  `keterangan` text,
  `approve1` varchar(255) DEFAULT '0',
  `approval1` varchar(100) DEFAULT NULL,
  `tanggal_approve1` date DEFAULT NULL,
  `keterangan_reject` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=108615;

/*Table structure for table `biaya_restitusidummy` */

DROP TABLE IF EXISTS `biaya_restitusidummy`;

CREATE TABLE `biaya_restitusidummy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsppd` varchar(120) DEFAULT '',
  `jenis_restitusi` varchar(200) DEFAULT '',
  `nilai` double NOT NULL DEFAULT '0',
  `keterangan` text,
  `lampiran` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=4985;

/*Table structure for table `biaya_sppd` */

DROP TABLE IF EXISTS `biaya_sppd`;

CREATE TABLE `biaya_sppd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=6;

/*Table structure for table `biaya_sppd1` */

DROP TABLE IF EXISTS `biaya_sppd1`;

CREATE TABLE `biaya_sppd1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
);

/*Table structure for table `biaya_sppd1dummy` */

DROP TABLE IF EXISTS `biaya_sppd1dummy`;

CREATE TABLE `biaya_sppd1dummy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=3586;

/*Table structure for table `bonus` */

DROP TABLE IF EXISTS `bonus`;

CREATE TABLE `bonus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=1493;

/*Table structure for table `bonus20210205` */

DROP TABLE IF EXISTS `bonus20210205`;

CREATE TABLE `bonus20210205` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=479;

/*Table structure for table `bonus20210803` */

DROP TABLE IF EXISTS `bonus20210803`;

CREATE TABLE `bonus20210803` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=477;

/*Table structure for table `bonus20210809` */

DROP TABLE IF EXISTS `bonus20210809`;

CREATE TABLE `bonus20210809` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=619;

/*Table structure for table `cuti` */

DROP TABLE IF EXISTS `cuti`;

CREATE TABLE `cuti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=1059;

/*Table structure for table `cuti_besar` */

DROP TABLE IF EXISTS `cuti_besar`;

CREATE TABLE `cuti_besar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `niptahun` varchar(60) DEFAULT '',
  `uang_cuti` double NOT NULL DEFAULT '0',
  `tgl_update` varchar(30) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `niptahun` (`niptahun`)
) ENGINE=MyISAM;

/*Table structure for table `cuti_tahunan` */

DROP TABLE IF EXISTS `cuti_tahunan`;

CREATE TABLE `cuti_tahunan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=1544;

/*Table structure for table `cuti_tahunan20231207` */

DROP TABLE IF EXISTS `cuti_tahunan20231207`;

CREATE TABLE `cuti_tahunan20231207` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `niptahun` varchar(60) DEFAULT '',
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
) AUTO_INCREMENT=1300;

/*Table structure for table `data_aktivitas` */

DROP TABLE IF EXISTS `data_aktivitas`;

CREATE TABLE `data_aktivitas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(10) DEFAULT '',
  `jam` varchar(8) DEFAULT '',
  `user` varchar(200) DEFAULT '',
  `aktivitas` mediumtext,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=118;

/*Table structure for table `data_keluarga` */

DROP TABLE IF EXISTS `data_keluarga`;

CREATE TABLE `data_keluarga` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `nama` varchar(200) DEFAULT '',
  `jenis_kelamin` varchar(1) DEFAULT '',
  `tgl_lahir` varchar(10) DEFAULT '',
  `hubungan_keluarga` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=135;

/*Table structure for table `data_keluargalama` */

DROP TABLE IF EXISTS `data_keluargalama`;

CREATE TABLE `data_keluargalama` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `nama` varchar(200) DEFAULT '',
  `nik` varchar(64) DEFAULT '',
  `tempat_lahir` varchar(200) DEFAULT '',
  `tgl_lahir` varchar(10) DEFAULT '',
  `jenis_kelamin` varchar(1) DEFAULT '',
  `pendidikan` varchar(120) DEFAULT '',
  `hubungan_keluarga` varchar(200) DEFAULT '',
  `no_bpjs` varchar(120) DEFAULT '',
  `perusahaan` varchar(255) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `tunggakan` varchar(20) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

/*Table structure for table `data_pegawai` */

DROP TABLE IF EXISTS `data_pegawai`;

CREATE TABLE `data_pegawai` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nip` varchar(120) DEFAULT '',
  `niplama` varchar(30) DEFAULT '',
  `jenis_mutasi` varchar(120) NOT NULL DEFAULT 'BARU',
  `jenis` varchar(120) DEFAULT '',
  `no_sk` varchar(200) DEFAULT '',
  `nama` varchar(200) DEFAULT '',
  `jenis_kelamin` varchar(1) DEFAULT '',
  `tempat_lahir` varchar(200) DEFAULT '',
  `tgl_lahir` varchar(10) DEFAULT '',
  `alamat` varchar(200) DEFAULT '',
  `alamat_domisili` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `divisi` varchar(200) DEFAULT '',
  `bidang` varchar(200) DEFAULT '',
  `sub_bidang` varchar(200) DEFAULT '',
  `region` varchar(200) DEFAULT '',
  `unit` varchar(200) DEFAULT '',
  `penempatan` varchar(200) DEFAULT '',
  `grade` varchar(20) DEFAULT '',
  `skala_grade` varchar(30) DEFAULT '',
  `pendidikan` varchar(120) DEFAULT '',
  `jurusan` varchar(200) DEFAULT '',
  `nik` varchar(300) DEFAULT '',
  `no_kk` varchar(300) DEFAULT '',
  `status` varchar(10) DEFAULT '',
  `telepon` varchar(250) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_capeg` varchar(10) DEFAULT '',
  `tgl_pegawai` varchar(10) DEFAULT '',
  `tgl_awal_pkwt` varchar(10) DEFAULT '',
  `tgl_akhir_pkwt` varchar(10) DEFAULT '',
  `tgl_awal_pkwtt` varchar(10) DEFAULT '',
  `tgl_awal_tugaskarya` varchar(10) DEFAULT '',
  `tgl_akhir_tugaskarya` varchar(10) DEFAULT '',
  `email` varchar(120) DEFAULT '',
  `email2` varchar(120) DEFAULT '',
  `agama` varchar(1) DEFAULT '',
  `gol_darah` varchar(10) DEFAULT '',
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
  `no_bpjs_kes` varchar(120) DEFAULT '',
  `tgl_bpjs_kes` varchar(10) DEFAULT '',
  `va_bpjs_kes` varchar(120) DEFAULT '',
  `no_bpjs_tk` varchar(120) DEFAULT '',
  `tgl_bpjs_tk` varchar(10) DEFAULT '',
  `va_bpjs_tk` varchar(120) DEFAULT '',
  `no_inhealth` varchar(200) DEFAULT '',
  `tgl_inhealth` varchar(10) DEFAULT '',
  `nama_bankdplk` varchar(60) DEFAULT '',
  `no_rekeningdplk` varchar(60) DEFAULT '',
  `no_cifdplk` varchar(30) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '1',
  `tgl_berhenti` varchar(10) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `password` varchar(255) DEFAULT NULL,
  `atasan_langsung` varchar(60) NOT NULL DEFAULT '',
  `atasan_atasan_langsung` varchar(60) DEFAULT '',
  `level_sppd` varchar(1) DEFAULT '',
  `akses` varchar(120) NOT NULL DEFAULT 'android',
  `kode_device` varchar(200) DEFAULT '',
  `userid` varchar(255) DEFAULT '',
  `welcome` varchar(1) NOT NULL DEFAULT '1',
  `foto` varchar(200) DEFAULT '',
  `approval_sdm` varchar(1) NOT NULL DEFAULT '0',
  `approval_pembayaran` varchar(1) NOT NULL DEFAULT '0',
  `approval_konsumsi` varchar(1) NOT NULL DEFAULT '0',
  `approval_keluhan` varchar(1) DEFAULT '0',
  `kasir` varchar(1) NOT NULL DEFAULT '0',
  `ttd` varchar(200) DEFAULT '',
  `kd_project_sap` varchar(60) DEFAULT '',
  `active_session_id` varchar(255) DEFAULT NULL,
  `session_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) AUTO_INCREMENT=377;

/*Table structure for table `data_pegawai20200125` */

DROP TABLE IF EXISTS `data_pegawai20200125`;

CREATE TABLE `data_pegawai20200125` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nip` varchar(120) DEFAULT '',
  `niplama` varchar(30) DEFAULT '',
  `jenis` varchar(120) DEFAULT '',
  `no_sk` varchar(200) DEFAULT '',
  `nama` varchar(200) DEFAULT '',
  `jenis_kelamin` varchar(1) DEFAULT '',
  `tempat_lahir` varchar(200) DEFAULT '',
  `tgl_lahir` varchar(10) DEFAULT '',
  `alamat` varchar(200) DEFAULT '',
  `alamat_domisili` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `divisi` varchar(200) DEFAULT '',
  `bidang` varchar(200) DEFAULT '',
  `sub_bidang` varchar(200) DEFAULT '',
  `region` varchar(200) DEFAULT '',
  `unit` varchar(200) DEFAULT '',
  `penempatan` varchar(200) DEFAULT '',
  `grade` varchar(20) DEFAULT '',
  `skala_grade` varchar(30) DEFAULT '',
  `pendidikan` varchar(120) DEFAULT '',
  `jurusan` varchar(200) DEFAULT '',
  `nik` varchar(120) DEFAULT '',
  `no_kk` varchar(250) DEFAULT '',
  `status` varchar(10) DEFAULT '',
  `telepon` varchar(64) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_capeg` varchar(10) DEFAULT '',
  `tgl_pegawai` varchar(10) DEFAULT '',
  `tgl_awal_pkwt` varchar(10) DEFAULT '',
  `tgl_akhir_pkwt` varchar(10) DEFAULT '',
  `tgl_awal_pkwtt` varchar(10) DEFAULT '',
  `tgl_awal_tugaskarya` varchar(10) DEFAULT '',
  `tgl_akhir_tugaskarya` varchar(10) DEFAULT '',
  `email` varchar(64) DEFAULT '',
  `agama` varchar(1) DEFAULT '',
  `gol_darah` varchar(10) DEFAULT '',
  `npwp` varchar(64) DEFAULT '',
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
  `no_bpjs_kes` varchar(120) DEFAULT '',
  `tgl_bpjs_kes` varchar(10) DEFAULT '',
  `va_bpjs_kes` varchar(120) DEFAULT '',
  `no_bpjs_tk` varchar(120) DEFAULT '',
  `tgl_bpjs_tk` varchar(10) DEFAULT '',
  `va_bpjs_tk` varchar(120) DEFAULT '',
  `no_inhealth` varchar(200) DEFAULT '',
  `tgl_inhealth` varchar(10) DEFAULT '',
  `nama_bankdplk` varchar(60) DEFAULT '',
  `no_rekeningdplk` varchar(60) DEFAULT '',
  `no_cifdplk` varchar(30) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '1',
  `tgl_berhenti` varchar(10) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `password` varchar(200) DEFAULT '',
  `format` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) AUTO_INCREMENT=305;

/*Table structure for table `data_pegawai20200127` */

DROP TABLE IF EXISTS `data_pegawai20200127`;

CREATE TABLE `data_pegawai20200127` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nip` varchar(120) DEFAULT '',
  `niplama` varchar(30) DEFAULT '',
  `jenis` varchar(120) DEFAULT '',
  `no_sk` varchar(200) DEFAULT '',
  `nama` varchar(200) DEFAULT '',
  `jenis_kelamin` varchar(1) DEFAULT '',
  `tempat_lahir` varchar(200) DEFAULT '',
  `tgl_lahir` varchar(10) DEFAULT '',
  `alamat` varchar(200) DEFAULT '',
  `alamat_domisili` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `divisi` varchar(200) DEFAULT '',
  `bidang` varchar(200) DEFAULT '',
  `sub_bidang` varchar(200) DEFAULT '',
  `region` varchar(200) DEFAULT '',
  `unit` varchar(200) DEFAULT '',
  `penempatan` varchar(200) DEFAULT '',
  `grade` varchar(20) DEFAULT '',
  `skala_grade` varchar(30) DEFAULT '',
  `pendidikan` varchar(120) DEFAULT '',
  `jurusan` varchar(200) DEFAULT '',
  `nik` varchar(120) DEFAULT '',
  `no_kk` varchar(250) DEFAULT '',
  `status` varchar(10) DEFAULT '',
  `telepon` varchar(64) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_capeg` varchar(10) DEFAULT '',
  `tgl_pegawai` varchar(10) DEFAULT '',
  `tgl_awal_pkwt` varchar(10) DEFAULT '',
  `tgl_akhir_pkwt` varchar(10) DEFAULT '',
  `tgl_awal_pkwtt` varchar(10) DEFAULT '',
  `tgl_awal_tugaskarya` varchar(10) DEFAULT '',
  `tgl_akhir_tugaskarya` varchar(10) DEFAULT '',
  `email` varchar(64) DEFAULT '',
  `agama` varchar(1) DEFAULT '',
  `gol_darah` varchar(10) DEFAULT '',
  `npwp` varchar(64) DEFAULT '',
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
  `no_bpjs_kes` varchar(120) DEFAULT '',
  `tgl_bpjs_kes` varchar(10) DEFAULT '',
  `va_bpjs_kes` varchar(120) DEFAULT '',
  `no_bpjs_tk` varchar(120) DEFAULT '',
  `tgl_bpjs_tk` varchar(10) DEFAULT '',
  `va_bpjs_tk` varchar(120) DEFAULT '',
  `no_inhealth` varchar(200) DEFAULT '',
  `tgl_inhealth` varchar(10) DEFAULT '',
  `nama_bankdplk` varchar(60) DEFAULT '',
  `no_rekeningdplk` varchar(60) DEFAULT '',
  `no_cifdplk` varchar(30) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '1',
  `tgl_berhenti` varchar(10) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `password` varchar(200) DEFAULT '',
  `format` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) AUTO_INCREMENT=305;

/*Table structure for table `data_pegawai20200131` */

DROP TABLE IF EXISTS `data_pegawai20200131`;

CREATE TABLE `data_pegawai20200131` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nip` varchar(120) DEFAULT '',
  `niplama` varchar(30) DEFAULT '',
  `jenis` varchar(120) DEFAULT '',
  `no_sk` varchar(200) DEFAULT '',
  `nama` varchar(200) DEFAULT '',
  `jenis_kelamin` varchar(1) DEFAULT '',
  `tempat_lahir` varchar(200) DEFAULT '',
  `tgl_lahir` varchar(10) DEFAULT '',
  `alamat` varchar(200) DEFAULT '',
  `alamat_domisili` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `divisi` varchar(200) DEFAULT '',
  `bidang` varchar(200) DEFAULT '',
  `sub_bidang` varchar(200) DEFAULT '',
  `region` varchar(200) DEFAULT '',
  `unit` varchar(200) DEFAULT '',
  `penempatan` varchar(200) DEFAULT '',
  `grade` varchar(20) DEFAULT '',
  `skala_grade` varchar(30) DEFAULT '',
  `pendidikan` varchar(120) DEFAULT '',
  `jurusan` varchar(200) DEFAULT '',
  `nik` varchar(120) DEFAULT '',
  `no_kk` varchar(250) DEFAULT '',
  `status` varchar(10) DEFAULT '',
  `telepon` varchar(64) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_capeg` varchar(10) DEFAULT '',
  `tgl_pegawai` varchar(10) DEFAULT '',
  `tgl_awal_pkwt` varchar(10) DEFAULT '',
  `tgl_akhir_pkwt` varchar(10) DEFAULT '',
  `tgl_awal_pkwtt` varchar(10) DEFAULT '',
  `tgl_awal_tugaskarya` varchar(10) DEFAULT '',
  `tgl_akhir_tugaskarya` varchar(10) DEFAULT '',
  `email` varchar(64) DEFAULT '',
  `agama` varchar(1) DEFAULT '',
  `gol_darah` varchar(10) DEFAULT '',
  `npwp` varchar(64) DEFAULT '',
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
  `no_bpjs_kes` varchar(120) DEFAULT '',
  `tgl_bpjs_kes` varchar(10) DEFAULT '',
  `va_bpjs_kes` varchar(120) DEFAULT '',
  `no_bpjs_tk` varchar(120) DEFAULT '',
  `tgl_bpjs_tk` varchar(10) DEFAULT '',
  `va_bpjs_tk` varchar(120) DEFAULT '',
  `no_inhealth` varchar(200) DEFAULT '',
  `tgl_inhealth` varchar(10) DEFAULT '',
  `nama_bankdplk` varchar(60) DEFAULT '',
  `no_rekeningdplk` varchar(60) DEFAULT '',
  `no_cifdplk` varchar(30) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '1',
  `tgl_berhenti` varchar(10) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `password` varchar(200) DEFAULT '',
  `format` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) AUTO_INCREMENT=305;

/*Table structure for table `data_pegawai20200201backup` */

DROP TABLE IF EXISTS `data_pegawai20200201backup`;

CREATE TABLE `data_pegawai20200201backup` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nip` varchar(120) DEFAULT '',
  `niplama` varchar(30) DEFAULT '',
  `jenis` varchar(120) DEFAULT '',
  `no_sk` varchar(200) DEFAULT '',
  `nama` varchar(200) DEFAULT '',
  `jenis_kelamin` varchar(1) DEFAULT '',
  `tempat_lahir` varchar(200) DEFAULT '',
  `tgl_lahir` varchar(10) DEFAULT '',
  `alamat` varchar(200) DEFAULT '',
  `alamat_domisili` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `divisi` varchar(200) DEFAULT '',
  `bidang` varchar(200) DEFAULT '',
  `sub_bidang` varchar(200) DEFAULT '',
  `region` varchar(200) DEFAULT '',
  `unit` varchar(200) DEFAULT '',
  `penempatan` varchar(200) DEFAULT '',
  `grade` varchar(20) DEFAULT '',
  `skala_grade` varchar(30) DEFAULT '',
  `pendidikan` varchar(120) DEFAULT '',
  `jurusan` varchar(200) DEFAULT '',
  `nik` varchar(120) DEFAULT '',
  `no_kk` varchar(250) DEFAULT '',
  `status` varchar(10) DEFAULT '',
  `telepon` varchar(64) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_capeg` varchar(10) DEFAULT '',
  `tgl_pegawai` varchar(10) DEFAULT '',
  `tgl_awal_pkwt` varchar(10) DEFAULT '',
  `tgl_akhir_pkwt` varchar(10) DEFAULT '',
  `tgl_awal_pkwtt` varchar(10) DEFAULT '',
  `tgl_awal_tugaskarya` varchar(10) DEFAULT '',
  `tgl_akhir_tugaskarya` varchar(10) DEFAULT '',
  `email` varchar(64) DEFAULT '',
  `agama` varchar(1) DEFAULT '',
  `gol_darah` varchar(10) DEFAULT '',
  `npwp` varchar(64) DEFAULT '',
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
  `no_bpjs_kes` varchar(120) DEFAULT '',
  `tgl_bpjs_kes` varchar(10) DEFAULT '',
  `va_bpjs_kes` varchar(120) DEFAULT '',
  `no_bpjs_tk` varchar(120) DEFAULT '',
  `tgl_bpjs_tk` varchar(10) DEFAULT '',
  `va_bpjs_tk` varchar(120) DEFAULT '',
  `no_inhealth` varchar(200) DEFAULT '',
  `tgl_inhealth` varchar(10) DEFAULT '',
  `nama_bankdplk` varchar(60) DEFAULT '',
  `no_rekeningdplk` varchar(60) DEFAULT '',
  `no_cifdplk` varchar(30) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '1',
  `tgl_berhenti` varchar(10) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `password` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) AUTO_INCREMENT=101;

/*Table structure for table `data_pegawai20200208` */

DROP TABLE IF EXISTS `data_pegawai20200208`;

CREATE TABLE `data_pegawai20200208` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nip` varchar(120) DEFAULT '',
  `niplama` varchar(30) DEFAULT '',
  `jenis` varchar(120) DEFAULT '',
  `no_sk` varchar(200) DEFAULT '',
  `nama` varchar(200) DEFAULT '',
  `jenis_kelamin` varchar(1) DEFAULT '',
  `tempat_lahir` varchar(200) DEFAULT '',
  `tgl_lahir` varchar(10) DEFAULT '',
  `alamat` varchar(200) DEFAULT '',
  `alamat_domisili` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `divisi` varchar(200) DEFAULT '',
  `bidang` varchar(200) DEFAULT '',
  `sub_bidang` varchar(200) DEFAULT '',
  `region` varchar(200) DEFAULT '',
  `unit` varchar(200) DEFAULT '',
  `penempatan` varchar(200) DEFAULT '',
  `grade` varchar(20) DEFAULT '',
  `skala_grade` varchar(30) DEFAULT '',
  `pendidikan` varchar(120) DEFAULT '',
  `jurusan` varchar(200) DEFAULT '',
  `nik` varchar(120) DEFAULT '',
  `no_kk` varchar(250) DEFAULT '',
  `status` varchar(10) DEFAULT '',
  `telepon` varchar(64) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_capeg` varchar(10) DEFAULT '',
  `tgl_pegawai` varchar(10) DEFAULT '',
  `tgl_awal_pkwt` varchar(10) DEFAULT '',
  `tgl_akhir_pkwt` varchar(10) DEFAULT '',
  `tgl_awal_pkwtt` varchar(10) DEFAULT '',
  `tgl_awal_tugaskarya` varchar(10) DEFAULT '',
  `tgl_akhir_tugaskarya` varchar(10) DEFAULT '',
  `email` varchar(64) DEFAULT '',
  `agama` varchar(1) DEFAULT '',
  `gol_darah` varchar(10) DEFAULT '',
  `npwp` varchar(64) DEFAULT '',
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
  `no_bpjs_kes` varchar(120) DEFAULT '',
  `tgl_bpjs_kes` varchar(10) DEFAULT '',
  `va_bpjs_kes` varchar(120) DEFAULT '',
  `no_bpjs_tk` varchar(120) DEFAULT '',
  `tgl_bpjs_tk` varchar(10) DEFAULT '',
  `va_bpjs_tk` varchar(120) DEFAULT '',
  `no_inhealth` varchar(200) DEFAULT '',
  `tgl_inhealth` varchar(10) DEFAULT '',
  `nama_bankdplk` varchar(60) DEFAULT '',
  `no_rekeningdplk` varchar(60) DEFAULT '',
  `no_cifdplk` varchar(30) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '1',
  `tgl_berhenti` varchar(10) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `password` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) AUTO_INCREMENT=101;

/*Table structure for table `data_pegawai20200307` */

DROP TABLE IF EXISTS `data_pegawai20200307`;

CREATE TABLE `data_pegawai20200307` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nip` varchar(120) DEFAULT '',
  `niplama` varchar(30) DEFAULT '',
  `jenis` varchar(120) DEFAULT '',
  `no_sk` varchar(200) DEFAULT '',
  `nama` varchar(200) DEFAULT '',
  `jenis_kelamin` varchar(1) DEFAULT '',
  `tempat_lahir` varchar(200) DEFAULT '',
  `tgl_lahir` varchar(10) DEFAULT '',
  `alamat` varchar(200) DEFAULT '',
  `alamat_domisili` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `divisi` varchar(200) DEFAULT '',
  `bidang` varchar(200) DEFAULT '',
  `sub_bidang` varchar(200) DEFAULT '',
  `region` varchar(200) DEFAULT '',
  `unit` varchar(200) DEFAULT '',
  `penempatan` varchar(200) DEFAULT '',
  `grade` varchar(20) DEFAULT '',
  `skala_grade` varchar(30) DEFAULT '',
  `pendidikan` varchar(120) DEFAULT '',
  `jurusan` varchar(200) DEFAULT '',
  `nik` varchar(120) DEFAULT '',
  `no_kk` varchar(250) DEFAULT '',
  `status` varchar(10) DEFAULT '',
  `telepon` varchar(64) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_capeg` varchar(10) DEFAULT '',
  `tgl_pegawai` varchar(10) DEFAULT '',
  `tgl_awal_pkwt` varchar(10) DEFAULT '',
  `tgl_akhir_pkwt` varchar(10) DEFAULT '',
  `tgl_awal_pkwtt` varchar(10) DEFAULT '',
  `tgl_awal_tugaskarya` varchar(10) DEFAULT '',
  `tgl_akhir_tugaskarya` varchar(10) DEFAULT '',
  `email` varchar(64) DEFAULT '',
  `agama` varchar(1) DEFAULT '',
  `gol_darah` varchar(10) DEFAULT '',
  `npwp` varchar(64) DEFAULT '',
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
  `no_bpjs_kes` varchar(120) DEFAULT '',
  `tgl_bpjs_kes` varchar(10) DEFAULT '',
  `va_bpjs_kes` varchar(120) DEFAULT '',
  `no_bpjs_tk` varchar(120) DEFAULT '',
  `tgl_bpjs_tk` varchar(10) DEFAULT '',
  `va_bpjs_tk` varchar(120) DEFAULT '',
  `no_inhealth` varchar(200) DEFAULT '',
  `tgl_inhealth` varchar(10) DEFAULT '',
  `nama_bankdplk` varchar(60) DEFAULT '',
  `no_rekeningdplk` varchar(60) DEFAULT '',
  `no_cifdplk` varchar(30) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '1',
  `tgl_berhenti` varchar(10) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `password` varchar(200) DEFAULT '',
  `atasan_langsung` varchar(60) NOT NULL DEFAULT '',
  `level_sppd` varchar(1) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) AUTO_INCREMENT=114;

/*Table structure for table `data_pegawai20200428(12)` */

DROP TABLE IF EXISTS `data_pegawai20200428(12)`;

CREATE TABLE `data_pegawai20200428(12)` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nip` varchar(120) DEFAULT '',
  `niplama` varchar(30) DEFAULT '',
  `jenis` varchar(120) DEFAULT '',
  `no_sk` varchar(200) DEFAULT '',
  `nama` varchar(200) DEFAULT '',
  `jenis_kelamin` varchar(1) DEFAULT '',
  `tempat_lahir` varchar(200) DEFAULT '',
  `tgl_lahir` varchar(10) DEFAULT '',
  `alamat` varchar(200) DEFAULT '',
  `alamat_domisili` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `divisi` varchar(200) DEFAULT '',
  `bidang` varchar(200) DEFAULT '',
  `sub_bidang` varchar(200) DEFAULT '',
  `region` varchar(200) DEFAULT '',
  `unit` varchar(200) DEFAULT '',
  `penempatan` varchar(200) DEFAULT '',
  `grade` varchar(20) DEFAULT '',
  `skala_grade` varchar(30) DEFAULT '',
  `pendidikan` varchar(120) DEFAULT '',
  `jurusan` varchar(200) DEFAULT '',
  `nik` varchar(120) DEFAULT '',
  `no_kk` varchar(250) DEFAULT '',
  `status` varchar(10) DEFAULT '',
  `telepon` varchar(64) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_capeg` varchar(10) DEFAULT '',
  `tgl_pegawai` varchar(10) DEFAULT '',
  `tgl_awal_pkwt` varchar(10) DEFAULT '',
  `tgl_akhir_pkwt` varchar(10) DEFAULT '',
  `tgl_awal_pkwtt` varchar(10) DEFAULT '',
  `tgl_awal_tugaskarya` varchar(10) DEFAULT '',
  `tgl_akhir_tugaskarya` varchar(10) DEFAULT '',
  `email` varchar(64) DEFAULT '',
  `agama` varchar(1) DEFAULT '',
  `gol_darah` varchar(10) DEFAULT '',
  `npwp` varchar(64) DEFAULT '',
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
  `no_bpjs_kes` varchar(120) DEFAULT '',
  `tgl_bpjs_kes` varchar(10) DEFAULT '',
  `va_bpjs_kes` varchar(120) DEFAULT '',
  `no_bpjs_tk` varchar(120) DEFAULT '',
  `tgl_bpjs_tk` varchar(10) DEFAULT '',
  `va_bpjs_tk` varchar(120) DEFAULT '',
  `no_inhealth` varchar(200) DEFAULT '',
  `tgl_inhealth` varchar(10) DEFAULT '',
  `nama_bankdplk` varchar(60) DEFAULT '',
  `no_rekeningdplk` varchar(60) DEFAULT '',
  `no_cifdplk` varchar(30) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '1',
  `tgl_berhenti` varchar(10) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `password` varchar(200) DEFAULT '',
  `atasan_langsung` varchar(60) NOT NULL DEFAULT '',
  `level_sppd` varchar(1) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) AUTO_INCREMENT=144;

/*Table structure for table `data_pegawai20210225` */

DROP TABLE IF EXISTS `data_pegawai20210225`;

CREATE TABLE `data_pegawai20210225` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nip` varchar(120) DEFAULT '',
  `niplama` varchar(30) DEFAULT '',
  `jenis_mutasi` varchar(120) NOT NULL DEFAULT 'BARU',
  `jenis` varchar(120) DEFAULT '',
  `no_sk` varchar(200) DEFAULT '',
  `nama` varchar(200) DEFAULT '',
  `jenis_kelamin` varchar(1) DEFAULT '',
  `tempat_lahir` varchar(200) DEFAULT '',
  `tgl_lahir` varchar(10) DEFAULT '',
  `alamat` varchar(200) DEFAULT '',
  `alamat_domisili` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `divisi` varchar(200) DEFAULT '',
  `bidang` varchar(200) DEFAULT '',
  `sub_bidang` varchar(200) DEFAULT '',
  `region` varchar(200) DEFAULT '',
  `unit` varchar(200) DEFAULT '',
  `penempatan` varchar(200) DEFAULT '',
  `grade` varchar(20) DEFAULT '',
  `skala_grade` varchar(30) DEFAULT '',
  `pendidikan` varchar(120) DEFAULT '',
  `jurusan` varchar(200) DEFAULT '',
  `nik` varchar(120) DEFAULT '',
  `no_kk` varchar(250) DEFAULT '',
  `status` varchar(10) DEFAULT '',
  `telepon` varchar(64) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_capeg` varchar(10) DEFAULT '',
  `tgl_pegawai` varchar(10) DEFAULT '',
  `tgl_awal_pkwt` varchar(10) DEFAULT '',
  `tgl_akhir_pkwt` varchar(10) DEFAULT '',
  `tgl_awal_pkwtt` varchar(10) DEFAULT '',
  `tgl_awal_tugaskarya` varchar(10) DEFAULT '',
  `tgl_akhir_tugaskarya` varchar(10) DEFAULT '',
  `email` varchar(64) DEFAULT '',
  `agama` varchar(1) DEFAULT '',
  `gol_darah` varchar(10) DEFAULT '',
  `npwp` varchar(64) DEFAULT '',
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
  `no_bpjs_kes` varchar(120) DEFAULT '',
  `tgl_bpjs_kes` varchar(10) DEFAULT '',
  `va_bpjs_kes` varchar(120) DEFAULT '',
  `no_bpjs_tk` varchar(120) DEFAULT '',
  `tgl_bpjs_tk` varchar(10) DEFAULT '',
  `va_bpjs_tk` varchar(120) DEFAULT '',
  `no_inhealth` varchar(200) DEFAULT '',
  `tgl_inhealth` varchar(10) DEFAULT '',
  `nama_bankdplk` varchar(60) DEFAULT '',
  `no_rekeningdplk` varchar(60) DEFAULT '',
  `no_cifdplk` varchar(30) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '1',
  `tgl_berhenti` varchar(10) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `password` varchar(200) DEFAULT '',
  `atasan_langsung` varchar(60) NOT NULL DEFAULT '',
  `level_sppd` varchar(1) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) AUTO_INCREMENT=176;

/*Table structure for table `data_pegawai20210520` */

DROP TABLE IF EXISTS `data_pegawai20210520`;

CREATE TABLE `data_pegawai20210520` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nip` varchar(120) DEFAULT '',
  `niplama` varchar(30) DEFAULT '',
  `jenis_mutasi` varchar(120) NOT NULL DEFAULT 'BARU',
  `jenis` varchar(120) DEFAULT '',
  `no_sk` varchar(200) DEFAULT '',
  `nama` varchar(200) DEFAULT '',
  `jenis_kelamin` varchar(1) DEFAULT '',
  `tempat_lahir` varchar(200) DEFAULT '',
  `tgl_lahir` varchar(10) DEFAULT '',
  `alamat` varchar(200) DEFAULT '',
  `alamat_domisili` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `divisi` varchar(200) DEFAULT '',
  `bidang` varchar(200) DEFAULT '',
  `sub_bidang` varchar(200) DEFAULT '',
  `region` varchar(200) DEFAULT '',
  `unit` varchar(200) DEFAULT '',
  `penempatan` varchar(200) DEFAULT '',
  `grade` varchar(20) DEFAULT '',
  `skala_grade` varchar(30) DEFAULT '',
  `pendidikan` varchar(120) DEFAULT '',
  `jurusan` varchar(200) DEFAULT '',
  `nik` varchar(120) DEFAULT '',
  `no_kk` varchar(250) DEFAULT '',
  `status` varchar(10) DEFAULT '',
  `telepon` varchar(64) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_capeg` varchar(10) DEFAULT '',
  `tgl_pegawai` varchar(10) DEFAULT '',
  `tgl_awal_pkwt` varchar(10) DEFAULT '',
  `tgl_akhir_pkwt` varchar(10) DEFAULT '',
  `tgl_awal_pkwtt` varchar(10) DEFAULT '',
  `tgl_awal_tugaskarya` varchar(10) DEFAULT '',
  `tgl_akhir_tugaskarya` varchar(10) DEFAULT '',
  `email` varchar(64) DEFAULT '',
  `agama` varchar(1) DEFAULT '',
  `gol_darah` varchar(10) DEFAULT '',
  `npwp` varchar(64) DEFAULT '',
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
  `no_bpjs_kes` varchar(120) DEFAULT '',
  `tgl_bpjs_kes` varchar(10) DEFAULT '',
  `va_bpjs_kes` varchar(120) DEFAULT '',
  `no_bpjs_tk` varchar(120) DEFAULT '',
  `tgl_bpjs_tk` varchar(10) DEFAULT '',
  `va_bpjs_tk` varchar(120) DEFAULT '',
  `no_inhealth` varchar(200) DEFAULT '',
  `tgl_inhealth` varchar(10) DEFAULT '',
  `nama_bankdplk` varchar(60) DEFAULT '',
  `no_rekeningdplk` varchar(60) DEFAULT '',
  `no_cifdplk` varchar(30) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '1',
  `tgl_berhenti` varchar(10) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `password` varchar(200) DEFAULT '',
  `atasan_langsung` varchar(60) NOT NULL DEFAULT '',
  `atasan_atasan_langsung` varchar(60) DEFAULT '',
  `level_sppd` varchar(1) DEFAULT '',
  `akses` varchar(120) NOT NULL DEFAULT 'android',
  `kode_device` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) AUTO_INCREMENT=183;

/*Table structure for table `data_pegawai20210628` */

DROP TABLE IF EXISTS `data_pegawai20210628`;

CREATE TABLE `data_pegawai20210628` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nip` varchar(120) DEFAULT '',
  `niplama` varchar(30) DEFAULT '',
  `jenis_mutasi` varchar(120) NOT NULL DEFAULT 'BARU',
  `jenis` varchar(120) DEFAULT '',
  `no_sk` varchar(200) DEFAULT '',
  `nama` varchar(200) DEFAULT '',
  `jenis_kelamin` varchar(1) DEFAULT '',
  `tempat_lahir` varchar(200) DEFAULT '',
  `tgl_lahir` varchar(10) DEFAULT '',
  `alamat` varchar(200) DEFAULT '',
  `alamat_domisili` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `divisi` varchar(200) DEFAULT '',
  `bidang` varchar(200) DEFAULT '',
  `sub_bidang` varchar(200) DEFAULT '',
  `region` varchar(200) DEFAULT '',
  `unit` varchar(200) DEFAULT '',
  `penempatan` varchar(200) DEFAULT '',
  `grade` varchar(20) DEFAULT '',
  `skala_grade` varchar(30) DEFAULT '',
  `pendidikan` varchar(120) DEFAULT '',
  `jurusan` varchar(200) DEFAULT '',
  `nik` varchar(120) DEFAULT '',
  `no_kk` varchar(250) DEFAULT '',
  `status` varchar(10) DEFAULT '',
  `telepon` varchar(64) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_capeg` varchar(10) DEFAULT '',
  `tgl_pegawai` varchar(10) DEFAULT '',
  `tgl_awal_pkwt` varchar(10) DEFAULT '',
  `tgl_akhir_pkwt` varchar(10) DEFAULT '',
  `tgl_awal_pkwtt` varchar(10) DEFAULT '',
  `tgl_awal_tugaskarya` varchar(10) DEFAULT '',
  `tgl_akhir_tugaskarya` varchar(10) DEFAULT '',
  `email` varchar(64) DEFAULT '',
  `agama` varchar(1) DEFAULT '',
  `gol_darah` varchar(10) DEFAULT '',
  `npwp` varchar(64) DEFAULT '',
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
  `no_bpjs_kes` varchar(120) DEFAULT '',
  `tgl_bpjs_kes` varchar(10) DEFAULT '',
  `va_bpjs_kes` varchar(120) DEFAULT '',
  `no_bpjs_tk` varchar(120) DEFAULT '',
  `tgl_bpjs_tk` varchar(10) DEFAULT '',
  `va_bpjs_tk` varchar(120) DEFAULT '',
  `no_inhealth` varchar(200) DEFAULT '',
  `tgl_inhealth` varchar(10) DEFAULT '',
  `nama_bankdplk` varchar(60) DEFAULT '',
  `no_rekeningdplk` varchar(60) DEFAULT '',
  `no_cifdplk` varchar(30) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '1',
  `tgl_berhenti` varchar(10) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `password` varchar(255) DEFAULT NULL,
  `atasan_langsung` varchar(60) NOT NULL DEFAULT '',
  `atasan_atasan_langsung` varchar(60) DEFAULT '',
  `level_sppd` varchar(1) DEFAULT '',
  `akses` varchar(120) NOT NULL DEFAULT 'android',
  `kode_device` varchar(200) DEFAULT '',
  `userid` varchar(255) DEFAULT '',
  `welcome` varchar(1) NOT NULL DEFAULT '1',
  `foto` varchar(200) DEFAULT '',
  `approval_sdm` varchar(1) NOT NULL DEFAULT '0',
  `approval_pembayaran` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) AUTO_INCREMENT=189;

/*Table structure for table `data_pegawai20240318` */

DROP TABLE IF EXISTS `data_pegawai20240318`;

CREATE TABLE `data_pegawai20240318` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nip` varchar(120) DEFAULT '',
  `niplama` varchar(30) DEFAULT '',
  `jenis_mutasi` varchar(120) NOT NULL DEFAULT 'BARU',
  `jenis` varchar(120) DEFAULT '',
  `no_sk` varchar(200) DEFAULT '',
  `nama` varchar(200) DEFAULT '',
  `jenis_kelamin` varchar(1) DEFAULT '',
  `tempat_lahir` varchar(200) DEFAULT '',
  `tgl_lahir` varchar(10) DEFAULT '',
  `alamat` varchar(200) DEFAULT '',
  `alamat_domisili` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `divisi` varchar(200) DEFAULT '',
  `bidang` varchar(200) DEFAULT '',
  `sub_bidang` varchar(200) DEFAULT '',
  `region` varchar(200) DEFAULT '',
  `unit` varchar(200) DEFAULT '',
  `penempatan` varchar(200) DEFAULT '',
  `grade` varchar(20) DEFAULT '',
  `skala_grade` varchar(30) DEFAULT '',
  `pendidikan` varchar(120) DEFAULT '',
  `jurusan` varchar(200) DEFAULT '',
  `nik` varchar(120) DEFAULT '',
  `no_kk` varchar(250) DEFAULT '',
  `status` varchar(10) DEFAULT '',
  `telepon` varchar(64) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_capeg` varchar(10) DEFAULT '',
  `tgl_pegawai` varchar(10) DEFAULT '',
  `tgl_awal_pkwt` varchar(10) DEFAULT '',
  `tgl_akhir_pkwt` varchar(10) DEFAULT '',
  `tgl_awal_pkwtt` varchar(10) DEFAULT '',
  `tgl_awal_tugaskarya` varchar(10) DEFAULT '',
  `tgl_akhir_tugaskarya` varchar(10) DEFAULT '',
  `email` varchar(64) DEFAULT '',
  `agama` varchar(1) DEFAULT '',
  `gol_darah` varchar(10) DEFAULT '',
  `npwp` varchar(64) DEFAULT '',
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
  `no_bpjs_kes` varchar(120) DEFAULT '',
  `tgl_bpjs_kes` varchar(10) DEFAULT '',
  `va_bpjs_kes` varchar(120) DEFAULT '',
  `no_bpjs_tk` varchar(120) DEFAULT '',
  `tgl_bpjs_tk` varchar(10) DEFAULT '',
  `va_bpjs_tk` varchar(120) DEFAULT '',
  `no_inhealth` varchar(200) DEFAULT '',
  `tgl_inhealth` varchar(10) DEFAULT '',
  `nama_bankdplk` varchar(60) DEFAULT '',
  `no_rekeningdplk` varchar(60) DEFAULT '',
  `no_cifdplk` varchar(30) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '1',
  `tgl_berhenti` varchar(10) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `password` varchar(255) DEFAULT NULL,
  `atasan_langsung` varchar(60) NOT NULL DEFAULT '',
  `atasan_atasan_langsung` varchar(60) DEFAULT '',
  `level_sppd` varchar(1) DEFAULT '',
  `akses` varchar(120) NOT NULL DEFAULT 'android',
  `kode_device` varchar(200) DEFAULT '',
  `userid` varchar(255) DEFAULT '',
  `welcome` varchar(1) NOT NULL DEFAULT '1',
  `foto` varchar(200) DEFAULT '',
  `approval_sdm` varchar(1) NOT NULL DEFAULT '0',
  `approval_pembayaran` varchar(1) NOT NULL DEFAULT '0',
  `approval_konsumsi` varchar(1) NOT NULL DEFAULT '0',
  `kasir` varchar(1) NOT NULL DEFAULT '0',
  `ttd` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) AUTO_INCREMENT=301;

/*Table structure for table `data_pegawai20240714` */

DROP TABLE IF EXISTS `data_pegawai20240714`;

CREATE TABLE `data_pegawai20240714` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nip` varchar(120) DEFAULT '',
  `niplama` varchar(30) DEFAULT '',
  `jenis_mutasi` varchar(120) NOT NULL DEFAULT 'BARU',
  `jenis` varchar(120) DEFAULT '',
  `no_sk` varchar(200) DEFAULT '',
  `nama` varchar(200) DEFAULT '',
  `jenis_kelamin` varchar(1) DEFAULT '',
  `tempat_lahir` varchar(200) DEFAULT '',
  `tgl_lahir` varchar(10) DEFAULT '',
  `alamat` varchar(200) DEFAULT '',
  `alamat_domisili` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `divisi` varchar(200) DEFAULT '',
  `bidang` varchar(200) DEFAULT '',
  `sub_bidang` varchar(200) DEFAULT '',
  `region` varchar(200) DEFAULT '',
  `unit` varchar(200) DEFAULT '',
  `penempatan` varchar(200) DEFAULT '',
  `grade` varchar(20) DEFAULT '',
  `skala_grade` varchar(30) DEFAULT '',
  `pendidikan` varchar(120) DEFAULT '',
  `jurusan` varchar(200) DEFAULT '',
  `nik` varchar(300) DEFAULT NULL,
  `no_kk` varchar(300) DEFAULT NULL,
  `status` varchar(10) DEFAULT '',
  `telepon` varchar(64) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_capeg` varchar(10) DEFAULT '',
  `tgl_pegawai` varchar(10) DEFAULT '',
  `tgl_awal_pkwt` varchar(10) DEFAULT '',
  `tgl_akhir_pkwt` varchar(10) DEFAULT '',
  `tgl_awal_pkwtt` varchar(10) DEFAULT '',
  `tgl_awal_tugaskarya` varchar(10) DEFAULT '',
  `tgl_akhir_tugaskarya` varchar(10) DEFAULT '',
  `email` varchar(120) DEFAULT '',
  `email2` varchar(120) DEFAULT '',
  `agama` varchar(1) DEFAULT '',
  `gol_darah` varchar(10) DEFAULT '',
  `npwp` varchar(64) DEFAULT '',
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
  `no_bpjs_kes` varchar(120) DEFAULT '',
  `tgl_bpjs_kes` varchar(10) DEFAULT '',
  `va_bpjs_kes` varchar(120) DEFAULT '',
  `no_bpjs_tk` varchar(120) DEFAULT '',
  `tgl_bpjs_tk` varchar(10) DEFAULT '',
  `va_bpjs_tk` varchar(120) DEFAULT '',
  `no_inhealth` varchar(200) DEFAULT '',
  `tgl_inhealth` varchar(10) DEFAULT '',
  `nama_bankdplk` varchar(60) DEFAULT '',
  `no_rekeningdplk` varchar(60) DEFAULT '',
  `no_cifdplk` varchar(30) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '1',
  `tgl_berhenti` varchar(10) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `password` varchar(255) DEFAULT NULL,
  `atasan_langsung` varchar(60) NOT NULL DEFAULT '',
  `atasan_atasan_langsung` varchar(60) DEFAULT '',
  `level_sppd` varchar(1) DEFAULT '',
  `akses` varchar(120) NOT NULL DEFAULT 'android',
  `kode_device` varchar(200) DEFAULT '',
  `userid` varchar(255) DEFAULT '',
  `welcome` varchar(1) NOT NULL DEFAULT '1',
  `foto` varchar(200) DEFAULT '',
  `approval_sdm` varchar(1) NOT NULL DEFAULT '0',
  `approval_pembayaran` varchar(1) NOT NULL DEFAULT '0',
  `approval_konsumsi` varchar(1) NOT NULL DEFAULT '0',
  `kasir` varchar(1) NOT NULL DEFAULT '0',
  `ttd` varchar(200) DEFAULT '',
  `kd_project_sap` varchar(60) DEFAULT '',
  `active_session_id` varchar(255) DEFAULT NULL,
  `session_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) AUTO_INCREMENT=305;

/*Table structure for table `data_pegawai20240909` */

DROP TABLE IF EXISTS `data_pegawai20240909`;

CREATE TABLE `data_pegawai20240909` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nip` varchar(120) DEFAULT '',
  `niplama` varchar(30) DEFAULT '',
  `jenis_mutasi` varchar(120) NOT NULL DEFAULT 'BARU',
  `jenis` varchar(120) DEFAULT '',
  `no_sk` varchar(200) DEFAULT '',
  `nama` varchar(200) DEFAULT '',
  `jenis_kelamin` varchar(1) DEFAULT '',
  `tempat_lahir` varchar(200) DEFAULT '',
  `tgl_lahir` varchar(10) DEFAULT '',
  `alamat` varchar(200) DEFAULT '',
  `alamat_domisili` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `divisi` varchar(200) DEFAULT '',
  `bidang` varchar(200) DEFAULT '',
  `sub_bidang` varchar(200) DEFAULT '',
  `region` varchar(200) DEFAULT '',
  `unit` varchar(200) DEFAULT '',
  `penempatan` varchar(200) DEFAULT '',
  `grade` varchar(20) DEFAULT '',
  `skala_grade` varchar(30) DEFAULT '',
  `pendidikan` varchar(120) DEFAULT '',
  `jurusan` varchar(200) DEFAULT '',
  `nik` varchar(300) DEFAULT NULL,
  `no_kk` varchar(300) DEFAULT NULL,
  `status` varchar(10) DEFAULT '',
  `telepon` varchar(64) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_capeg` varchar(10) DEFAULT '',
  `tgl_pegawai` varchar(10) DEFAULT '',
  `tgl_awal_pkwt` varchar(10) DEFAULT '',
  `tgl_akhir_pkwt` varchar(10) DEFAULT '',
  `tgl_awal_pkwtt` varchar(10) DEFAULT '',
  `tgl_awal_tugaskarya` varchar(10) DEFAULT '',
  `tgl_akhir_tugaskarya` varchar(10) DEFAULT '',
  `email` varchar(120) DEFAULT '',
  `email2` varchar(120) DEFAULT '',
  `agama` varchar(1) DEFAULT '',
  `gol_darah` varchar(10) DEFAULT '',
  `npwp` varchar(64) DEFAULT '',
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
  `no_bpjs_kes` varchar(120) DEFAULT '',
  `tgl_bpjs_kes` varchar(10) DEFAULT '',
  `va_bpjs_kes` varchar(120) DEFAULT '',
  `no_bpjs_tk` varchar(120) DEFAULT '',
  `tgl_bpjs_tk` varchar(10) DEFAULT '',
  `va_bpjs_tk` varchar(120) DEFAULT '',
  `no_inhealth` varchar(200) DEFAULT '',
  `tgl_inhealth` varchar(10) DEFAULT '',
  `nama_bankdplk` varchar(60) DEFAULT '',
  `no_rekeningdplk` varchar(60) DEFAULT '',
  `no_cifdplk` varchar(30) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '1',
  `tgl_berhenti` varchar(10) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `password` varchar(255) DEFAULT NULL,
  `atasan_langsung` varchar(60) NOT NULL DEFAULT '',
  `atasan_atasan_langsung` varchar(60) DEFAULT '',
  `level_sppd` varchar(1) DEFAULT '',
  `akses` varchar(120) NOT NULL DEFAULT 'android',
  `kode_device` varchar(200) DEFAULT '',
  `userid` varchar(255) DEFAULT '',
  `welcome` varchar(1) NOT NULL DEFAULT '1',
  `foto` varchar(200) DEFAULT '',
  `approval_sdm` varchar(1) NOT NULL DEFAULT '0',
  `approval_pembayaran` varchar(1) NOT NULL DEFAULT '0',
  `approval_konsumsi` varchar(1) NOT NULL DEFAULT '0',
  `kasir` varchar(1) NOT NULL DEFAULT '0',
  `ttd` varchar(200) DEFAULT '',
  `kd_project_sap` varchar(60) DEFAULT '',
  `active_session_id` varchar(255) DEFAULT NULL,
  `session_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) AUTO_INCREMENT=315;

/*Table structure for table `data_pegawailama` */

DROP TABLE IF EXISTS `data_pegawailama`;

CREATE TABLE `data_pegawailama` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nip` varchar(120) DEFAULT '',
  `niplama` varchar(30) DEFAULT '',
  `jenis_mutasi` varchar(120) NOT NULL DEFAULT 'BARU',
  `jenis` varchar(120) DEFAULT '',
  `no_sk` varchar(200) DEFAULT '',
  `nama` varchar(200) DEFAULT '',
  `jenis_kelamin` varchar(1) DEFAULT '',
  `tempat_lahir` varchar(200) DEFAULT '',
  `tgl_lahir` varchar(10) DEFAULT '',
  `alamat` varchar(200) DEFAULT '',
  `alamat_domisili` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `divisi` varchar(200) DEFAULT '',
  `bidang` varchar(200) DEFAULT '',
  `sub_bidang` varchar(200) DEFAULT '',
  `region` varchar(200) DEFAULT '',
  `unit` varchar(200) DEFAULT '',
  `penempatan` varchar(200) DEFAULT '',
  `grade` varchar(20) DEFAULT '',
  `skala_grade` varchar(30) DEFAULT '',
  `pendidikan` varchar(120) DEFAULT '',
  `jurusan` varchar(200) DEFAULT '',
  `nik` varchar(300) DEFAULT NULL,
  `no_kk` varchar(300) DEFAULT NULL,
  `status` varchar(10) DEFAULT '',
  `telepon` varchar(64) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_capeg` varchar(10) DEFAULT '',
  `tgl_pegawai` varchar(10) DEFAULT '',
  `tgl_awal_pkwt` varchar(10) DEFAULT '',
  `tgl_akhir_pkwt` varchar(10) DEFAULT '',
  `tgl_awal_pkwtt` varchar(10) DEFAULT '',
  `tgl_awal_tugaskarya` varchar(10) DEFAULT '',
  `tgl_akhir_tugaskarya` varchar(10) DEFAULT '',
  `email` varchar(120) DEFAULT '',
  `email2` varchar(120) DEFAULT '',
  `agama` varchar(1) DEFAULT '',
  `gol_darah` varchar(10) DEFAULT '',
  `npwp` varchar(64) DEFAULT '',
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
  `no_bpjs_kes` varchar(120) DEFAULT '',
  `tgl_bpjs_kes` varchar(10) DEFAULT '',
  `va_bpjs_kes` varchar(120) DEFAULT '',
  `no_bpjs_tk` varchar(120) DEFAULT '',
  `tgl_bpjs_tk` varchar(10) DEFAULT '',
  `va_bpjs_tk` varchar(120) DEFAULT '',
  `no_inhealth` varchar(200) DEFAULT '',
  `tgl_inhealth` varchar(10) DEFAULT '',
  `nama_bankdplk` varchar(60) DEFAULT '',
  `no_rekeningdplk` varchar(60) DEFAULT '',
  `no_cifdplk` varchar(30) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '1',
  `tgl_berhenti` varchar(10) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `password` varchar(255) DEFAULT NULL,
  `atasan_langsung` varchar(60) NOT NULL DEFAULT '',
  `atasan_atasan_langsung` varchar(60) DEFAULT '',
  `level_sppd` varchar(1) DEFAULT '',
  `akses` varchar(120) NOT NULL DEFAULT 'android',
  `kode_device` varchar(200) DEFAULT '',
  `userid` varchar(255) DEFAULT '',
  `welcome` varchar(1) NOT NULL DEFAULT '1',
  `foto` varchar(200) DEFAULT '',
  `approval_sdm` varchar(1) NOT NULL DEFAULT '0',
  `approval_pembayaran` varchar(1) NOT NULL DEFAULT '0',
  `approval_konsumsi` varchar(1) NOT NULL DEFAULT '0',
  `kasir` varchar(1) NOT NULL DEFAULT '0',
  `ttd` varchar(200) DEFAULT '',
  `kd_project_sap` varchar(60) DEFAULT '',
  `active_session_id` varchar(255) DEFAULT NULL,
  `session_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) AUTO_INCREMENT=315;

/*Table structure for table `data_pegawailama2` */

DROP TABLE IF EXISTS `data_pegawailama2`;

CREATE TABLE `data_pegawailama2` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nip` varchar(120) DEFAULT '',
  `niplama` varchar(30) DEFAULT '',
  `jenis_mutasi` varchar(120) NOT NULL DEFAULT 'BARU',
  `jenis` varchar(120) DEFAULT '',
  `no_sk` varchar(200) DEFAULT '',
  `nama` varchar(200) DEFAULT '',
  `jenis_kelamin` varchar(1) DEFAULT '',
  `tempat_lahir` varchar(200) DEFAULT '',
  `tgl_lahir` varchar(10) DEFAULT '',
  `alamat` varchar(200) DEFAULT '',
  `alamat_domisili` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `divisi` varchar(200) DEFAULT '',
  `bidang` varchar(200) DEFAULT '',
  `sub_bidang` varchar(200) DEFAULT '',
  `region` varchar(200) DEFAULT '',
  `unit` varchar(200) DEFAULT '',
  `penempatan` varchar(200) DEFAULT '',
  `grade` varchar(20) DEFAULT '',
  `skala_grade` varchar(30) DEFAULT '',
  `pendidikan` varchar(120) DEFAULT '',
  `jurusan` varchar(200) DEFAULT '',
  `nik` varchar(300) DEFAULT NULL,
  `no_kk` varchar(300) DEFAULT NULL,
  `status` varchar(10) DEFAULT '',
  `telepon` varchar(200) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_capeg` varchar(10) DEFAULT '',
  `tgl_pegawai` varchar(10) DEFAULT '',
  `tgl_awal_pkwt` varchar(10) DEFAULT '',
  `tgl_akhir_pkwt` varchar(10) DEFAULT '',
  `tgl_awal_pkwtt` varchar(10) DEFAULT '',
  `tgl_awal_tugaskarya` varchar(10) DEFAULT '',
  `tgl_akhir_tugaskarya` varchar(10) DEFAULT '',
  `email` varchar(120) DEFAULT '',
  `email2` varchar(120) DEFAULT '',
  `agama` varchar(1) DEFAULT '',
  `gol_darah` varchar(10) DEFAULT '',
  `npwp` varchar(200) DEFAULT '',
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
  `no_bpjs_kes` varchar(120) DEFAULT '',
  `tgl_bpjs_kes` varchar(10) DEFAULT '',
  `va_bpjs_kes` varchar(120) DEFAULT '',
  `no_bpjs_tk` varchar(120) DEFAULT '',
  `tgl_bpjs_tk` varchar(10) DEFAULT '',
  `va_bpjs_tk` varchar(120) DEFAULT '',
  `no_inhealth` varchar(200) DEFAULT '',
  `tgl_inhealth` varchar(10) DEFAULT '',
  `nama_bankdplk` varchar(60) DEFAULT '',
  `no_rekeningdplk` varchar(60) DEFAULT '',
  `no_cifdplk` varchar(30) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '1',
  `tgl_berhenti` varchar(10) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `password` varchar(255) DEFAULT NULL,
  `atasan_langsung` varchar(60) NOT NULL DEFAULT '',
  `atasan_atasan_langsung` varchar(60) DEFAULT '',
  `level_sppd` varchar(1) DEFAULT '',
  `akses` varchar(120) NOT NULL DEFAULT 'android',
  `kode_device` varchar(200) DEFAULT '',
  `userid` varchar(255) DEFAULT '',
  `welcome` varchar(1) NOT NULL DEFAULT '1',
  `foto` varchar(200) DEFAULT '',
  `approval_sdm` varchar(1) NOT NULL DEFAULT '0',
  `approval_pembayaran` varchar(1) NOT NULL DEFAULT '0',
  `approval_konsumsi` varchar(1) NOT NULL DEFAULT '0',
  `kasir` varchar(1) NOT NULL DEFAULT '0',
  `ttd` varchar(200) DEFAULT '',
  `kd_project_sap` varchar(60) DEFAULT '',
  `active_session_id` varchar(255) DEFAULT NULL,
  `session_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) AUTO_INCREMENT=315;

/*Table structure for table `data_pegawaisalah` */

DROP TABLE IF EXISTS `data_pegawaisalah`;

CREATE TABLE `data_pegawaisalah` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nip` varchar(120) DEFAULT '',
  `niplama` varchar(30) DEFAULT '',
  `jenis` varchar(120) DEFAULT '',
  `no_sk` varchar(200) DEFAULT '',
  `nama` varchar(200) DEFAULT '',
  `jenis_kelamin` varchar(1) DEFAULT '',
  `tempat_lahir` varchar(200) DEFAULT '',
  `tgl_lahir` varchar(10) DEFAULT '',
  `alamat` varchar(200) DEFAULT '',
  `alamat_domisili` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `divisi` varchar(200) DEFAULT '',
  `bidang` varchar(200) DEFAULT '',
  `sub_bidang` varchar(200) DEFAULT '',
  `region` varchar(200) DEFAULT '',
  `unit` varchar(200) DEFAULT '',
  `penempatan` varchar(200) DEFAULT '',
  `grade` varchar(20) DEFAULT '',
  `skala_grade` varchar(30) DEFAULT '',
  `pendidikan` varchar(120) DEFAULT '',
  `jurusan` varchar(200) DEFAULT '',
  `nik` varchar(120) DEFAULT '',
  `no_kk` varchar(250) DEFAULT '',
  `status` varchar(10) DEFAULT '',
  `telepon` varchar(64) DEFAULT '',
  `tgl_masuk` varchar(10) DEFAULT '',
  `tgl_capeg` varchar(10) DEFAULT '',
  `tgl_pegawai` varchar(10) DEFAULT '',
  `tgl_awal_pkwt` varchar(10) DEFAULT '',
  `tgl_akhir_pkwt` varchar(10) DEFAULT '',
  `tgl_awal_pkwtt` varchar(10) DEFAULT '',
  `tgl_awal_tugaskarya` varchar(10) DEFAULT '',
  `tgl_akhir_tugaskarya` varchar(10) DEFAULT '',
  `email` varchar(64) DEFAULT '',
  `agama` varchar(1) DEFAULT '',
  `gol_darah` varchar(10) DEFAULT '',
  `npwp` varchar(64) DEFAULT '',
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
  `no_bpjs_kes` varchar(120) DEFAULT '',
  `tgl_bpjs_kes` varchar(10) DEFAULT '',
  `va_bpjs_kes` varchar(120) DEFAULT '',
  `no_bpjs_tk` varchar(120) DEFAULT '',
  `tgl_bpjs_tk` varchar(10) DEFAULT '',
  `va_bpjs_tk` varchar(120) DEFAULT '',
  `no_inhealth` varchar(200) DEFAULT '',
  `tgl_inhealth` varchar(10) DEFAULT '',
  `nama_bankdplk` varchar(60) DEFAULT '',
  `no_rekeningdplk` varchar(60) DEFAULT '',
  `no_cifdplk` varchar(30) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '1',
  `tgl_berhenti` varchar(10) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `password` varchar(200) DEFAULT '',
  `format` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) AUTO_INCREMENT=330;

/*Table structure for table `data_project` */

DROP TABLE IF EXISTS `data_project`;

CREATE TABLE `data_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_project_sap` varchar(30) DEFAULT '',
  `nama_project` varchar(250) DEFAULT '',
  `status` varchar(10) NOT NULL DEFAULT 'tYES',
  PRIMARY KEY (`id`),
  UNIQUE KEY `kd_project_sap` (`kd_project_sap`)
) AUTO_INCREMENT=235 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `data_vendor` */

DROP TABLE IF EXISTS `data_vendor`;

CREATE TABLE `data_vendor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_vendor` varchar(30) DEFAULT '',
  `nama_vendor` varchar(250) DEFAULT '',
  `valid` varchar(10) NOT NULL DEFAULT 'tYES',
  PRIMARY KEY (`id`),
  UNIQUE KEY `kd_vendor` (`kd_vendor`)
) AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `eviden_restitusi` */

DROP TABLE IF EXISTS `eviden_restitusi`;

CREATE TABLE `eviden_restitusi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsppd` int(11) NOT NULL DEFAULT '0',
  `idrestitusi` int(11) NOT NULL DEFAULT '0',
  `lampiran` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4935 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `eviden_sppd` */

DROP TABLE IF EXISTS `eviden_sppd`;

CREATE TABLE `eviden_sppd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsppd` int(11) NOT NULL DEFAULT '0',
  `idrestitusi` int(11) NOT NULL DEFAULT '0',
  `lampiran` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2391 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `gaji` */

DROP TABLE IF EXISTS `gaji`;

CREATE TABLE `gaji` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=45939;

/*Table structure for table `gaji2` */

DROP TABLE IF EXISTS `gaji2`;

CREATE TABLE `gaji2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `kd_unit` varchar(5) DEFAULT '',
  `nip` varchar(30) NOT NULL DEFAULT '',
  `blth_nip` varchar(60) DEFAULT '',
  `grade` varchar(20) DEFAULT '',
  `gaji_dasar` double NOT NULL DEFAULT '0',
  `p1` double NOT NULL DEFAULT '0',
  `p21` double NOT NULL DEFAULT '0',
  `p22` double NOT NULL DEFAULT '0',
  `honorer` double NOT NULL DEFAULT '0',
  `honorarium` double NOT NULL DEFAULT '0',
  `tunj_perumahan` double NOT NULL DEFAULT '0',
  `tunj_transportasi` double NOT NULL DEFAULT '0',
  `tunj_pulsa` double NOT NULL DEFAULT '0',
  `pph21` double NOT NULL DEFAULT '0',
  `koperasi` double NOT NULL DEFAULT '0',
  `bprp` double NOT NULL DEFAULT '0',
  `bazis` double NOT NULL DEFAULT '0',
  `dana_pensiun` double NOT NULL DEFAULT '0',
  `bpjs_tk_pp` double NOT NULL DEFAULT '0',
  `bpjs_tk_kp` double NOT NULL DEFAULT '0',
  `bpjs_tk_kkp` double NOT NULL DEFAULT '0',
  `bpjs_tk_htp` double NOT NULL DEFAULT '0',
  `bpjs_tk_jhtk` double NOT NULL DEFAULT '0',
  `bpjs_tk_pk` double NOT NULL DEFAULT '0',
  `bpjs_kes_pp` double NOT NULL DEFAULT '0',
  `bpjs_kes_pk` double NOT NULL DEFAULT '0',
  `dplk_perusahaan` double NOT NULL DEFAULT '0',
  `dplk_pribadi` double NOT NULL DEFAULT '0',
  `nama_tvar1` varchar(200) DEFAULT '',
  `tvar1` double NOT NULL DEFAULT '0',
  `nama_tvar2` varchar(200) DEFAULT '',
  `tvar2` double NOT NULL DEFAULT '0',
  `nama_tvar3` varchar(200) DEFAULT '',
  `tvar3` double NOT NULL DEFAULT '0',
  `nama_pvar1` varchar(200) DEFAULT '',
  `pvar1` double NOT NULL DEFAULT '0',
  `nama_pvar2` varchar(200) DEFAULT '',
  `pvar2` double NOT NULL DEFAULT '0',
  `nama_pvar3` varchar(200) DEFAULT '',
  `pvar3` double NOT NULL DEFAULT '0',
  `aktif` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`),
  UNIQUE KEY `blth_nip` (`blth_nip`)
) ENGINE=MyISAM;

/*Table structure for table `gaji20200107` */

DROP TABLE IF EXISTS `gaji20200107`;

CREATE TABLE `gaji20200107` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(60) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `nama` varchar(200) DEFAULT '',
  `grade` varchar(60) DEFAULT '',
  `fungsi` varchar(120) DEFAULT '',
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
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=111;

/*Table structure for table `gaji20200108` */

DROP TABLE IF EXISTS `gaji20200108`;

CREATE TABLE `gaji20200108` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(60) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `nama` varchar(200) DEFAULT '',
  `grade` varchar(60) DEFAULT '',
  `fungsi` varchar(120) DEFAULT '',
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
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=128;

/*Table structure for table `gaji20200109fixgaji` */

DROP TABLE IF EXISTS `gaji20200109fixgaji`;

CREATE TABLE `gaji20200109fixgaji` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `nipblth` varchar(30) DEFAULT '',
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
) AUTO_INCREMENT=919;

/*Table structure for table `gaji20200125` */

DROP TABLE IF EXISTS `gaji20200125`;

CREATE TABLE `gaji20200125` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `nipblth` varchar(30) DEFAULT '',
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
) AUTO_INCREMENT=919;

/*Table structure for table `gaji20201229` */

DROP TABLE IF EXISTS `gaji20201229`;

CREATE TABLE `gaji20201229` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `tunjangan_kemahalan` double NOT NULL DEFAULT '0',
  `tunjangan_perumahan` double NOT NULL DEFAULT '0',
  `tunjangan_transportasi` double NOT NULL DEFAULT '0',
  `bantuan_pulsa` double NOT NULL DEFAULT '0',
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
) AUTO_INCREMENT=9479;

/*Table structure for table `gaji20220928` */

DROP TABLE IF EXISTS `gaji20220928`;

CREATE TABLE `gaji20220928` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `tunjangan_kemahalan` double NOT NULL DEFAULT '0',
  `tunjangan_perumahan` double NOT NULL DEFAULT '0',
  `tunjangan_transportasi` double NOT NULL DEFAULT '0',
  `bantuan_pulsa` double NOT NULL DEFAULT '0',
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
) AUTO_INCREMENT=22369;

/*Table structure for table `gaji20230823` */

DROP TABLE IF EXISTS `gaji20230823`;

CREATE TABLE `gaji20230823` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=31237;

/*Table structure for table `gaji_tunjangan` */

DROP TABLE IF EXISTS `gaji_tunjangan`;

CREATE TABLE `gaji_tunjangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(60) DEFAULT '',
  `tunjangan_transportasi` double NOT NULL DEFAULT '0',
  `tunjangan_perumahan` double NOT NULL DEFAULT '0',
  `bantuan_pulsa` double NOT NULL DEFAULT '0',
  `uang_cuti` double NOT NULL DEFAULT '0',
  `iks` double NOT NULL DEFAULT '0',
  `bonus` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

/*Table structure for table `gajibackfix2` */

DROP TABLE IF EXISTS `gajibackfix2`;

CREATE TABLE `gajibackfix2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `nipblth` varchar(30) DEFAULT '',
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
) AUTO_INCREMENT=849;

/*Table structure for table `gajibackupfixsampaijuni` */

DROP TABLE IF EXISTS `gajibackupfixsampaijuni`;

CREATE TABLE `gajibackupfixsampaijuni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `nipblth` varchar(30) DEFAULT '',
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
) AUTO_INCREMENT=540;

/*Table structure for table `gajilama` */

DROP TABLE IF EXISTS `gajilama`;

CREATE TABLE `gajilama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) NOT NULL DEFAULT '',
  `blth_nip` varchar(60) DEFAULT '',
  `grade` varchar(120) DEFAULT '',
  `skala_grade` varchar(30) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `p1` double NOT NULL DEFAULT '0',
  `p21` double NOT NULL DEFAULT '0',
  `p22` double NOT NULL DEFAULT '0',
  `honorer` double NOT NULL DEFAULT '0',
  `honorarium` double NOT NULL DEFAULT '0',
  `tunj_pph21` double NOT NULL DEFAULT '0',
  `tunj_perumahan` double NOT NULL DEFAULT '0',
  `tunj_kendaraan` double NOT NULL DEFAULT '0',
  `tunj_bbm` double NOT NULL DEFAULT '0',
  `tunj_komunikasi` double NOT NULL DEFAULT '0',
  `nama_tunjangan1` varchar(200) DEFAULT '',
  `tunjangan1` double NOT NULL DEFAULT '0',
  `nama_tunjangan2` varchar(200) DEFAULT '',
  `tunjangan2` double NOT NULL DEFAULT '0',
  `nama_tunjangan3` varchar(200) DEFAULT '',
  `tunjangan3` double NOT NULL DEFAULT '0',
  `nama_tunjangan4` varchar(200) DEFAULT '',
  `tunjangan4` double NOT NULL DEFAULT '0',
  `nama_tvar1` varchar(200) DEFAULT '',
  `tvar1` double NOT NULL DEFAULT '0',
  `nama_tvar2` varchar(200) DEFAULT '',
  `tvar2` double NOT NULL DEFAULT '0',
  `nama_tvar3` varchar(200) DEFAULT '',
  `tvar3` double NOT NULL DEFAULT '0',
  `potongan_pph21` double NOT NULL DEFAULT '0',
  `dana_pensiun` double NOT NULL DEFAULT '0',
  `nama_potongan1` varchar(200) DEFAULT '',
  `potongan1` double NOT NULL DEFAULT '0',
  `nama_potongan2` varchar(200) DEFAULT '',
  `potongan2` double NOT NULL DEFAULT '0',
  `nama_potongan3` varchar(200) DEFAULT '',
  `potongan3` double NOT NULL DEFAULT '0',
  `nama_potongan4` varchar(200) DEFAULT '',
  `potongan4` double NOT NULL DEFAULT '0',
  `nama_pvar1` varchar(200) DEFAULT '',
  `pvar1` double NOT NULL DEFAULT '0',
  `nama_pvar2` varchar(200) DEFAULT '',
  `pvar2` double NOT NULL DEFAULT '0',
  `nama_pvar3` varchar(200) DEFAULT '',
  `pvar3` double NOT NULL DEFAULT '0',
  `bpjs_tk_pp` double NOT NULL DEFAULT '0',
  `bpjs_tk_kp` double NOT NULL DEFAULT '0',
  `bpjs_tk_kkp` double NOT NULL DEFAULT '0',
  `bpjs_tk_htp` double NOT NULL DEFAULT '0',
  `bpjs_tk_jhtk` double NOT NULL DEFAULT '0',
  `bpjs_tk_pk` double NOT NULL DEFAULT '0',
  `bpjs_kes_pp` double NOT NULL DEFAULT '0',
  `bpjs_kes_pk` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blth_nip` (`blth_nip`)
) ENGINE=MyISAM;

/*Table structure for table `gajipph` */

DROP TABLE IF EXISTS `gajipph`;

CREATE TABLE `gajipph` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=1310;

/*Table structure for table `gajipph20200129` */

DROP TABLE IF EXISTS `gajipph20200129`;

CREATE TABLE `gajipph20200129` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `nipblth` varchar(30) DEFAULT '',
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
) AUTO_INCREMENT=1085;

/*Table structure for table `gajipph20200226` */

DROP TABLE IF EXISTS `gajipph20200226`;

CREATE TABLE `gajipph20200226` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `nipblth` varchar(30) DEFAULT '',
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
) AUTO_INCREMENT=1087;

/*Table structure for table `gajipph20200419` */

DROP TABLE IF EXISTS `gajipph20200419`;

CREATE TABLE `gajipph20200419` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=1309;

/*Table structure for table `hasil_indikator_kinerja` */

DROP TABLE IF EXISTS `hasil_indikator_kinerja`;

CREATE TABLE `hasil_indikator_kinerja` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_kpi_pusat` bigint(20) unsigned NOT NULL,
  `id_master_indikator_kinerja` bigint(20) unsigned NOT NULL,
  `keterangan_master_indikator_kinerja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hasil_indikator_kinerja_id_kpi_pusat_foreign` (`id_kpi_pusat`),
  KEY `hasil_indikator_kinerja_id_master_indikator_kinerja_foreign` (`id_master_indikator_kinerja`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `honorarium_eo` */

DROP TABLE IF EXISTS `honorarium_eo`;

CREATE TABLE `honorarium_eo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `nipblth` varchar(120) DEFAULT '',
  `honorarium` double NOT NULL DEFAULT '0',
  `pph21` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nipblth` (`nipblth`)
) ENGINE=MyISAM;

/*Table structure for table `ijin` */

DROP TABLE IF EXISTS `ijin`;

CREATE TABLE `ijin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=300;

/*Table structure for table `iklan` */

DROP TABLE IF EXISTS `iklan`;

CREATE TABLE `iklan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uraian` varchar(255) DEFAULT '',
  `foto` varchar(255) DEFAULT '',
  `paket_aplikasi` varchar(120) DEFAULT '',
  `link_aplikasi` varchar(200) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=11;

/*Table structure for table `iks` */

DROP TABLE IF EXISTS `iks`;

CREATE TABLE `iks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=2715;

/*Table structure for table `iks20210308` */

DROP TABLE IF EXISTS `iks20210308`;

CREATE TABLE `iks20210308` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=471;

/*Table structure for table `iks20210510` */

DROP TABLE IF EXISTS `iks20210510`;

CREATE TABLE `iks20210510` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=590;

/*Table structure for table `iks20211109` */

DROP TABLE IF EXISTS `iks20211109`;

CREATE TABLE `iks20211109` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=971;

/*Table structure for table `iks20220509` */

DROP TABLE IF EXISTS `iks20220509`;

CREATE TABLE `iks20220509` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=1263;

/*Table structure for table `jawaban` */

DROP TABLE IF EXISTS `jawaban`;

CREATE TABLE `jawaban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pertanyaan_id` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pertanyaan_id` (`pertanyaan_id`),
  CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`pertanyaan_id`) REFERENCES `pertanyaan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `jenis_acara` */

DROP TABLE IF EXISTS `jenis_acara`;

CREATE TABLE `jenis_acara` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=6;

/*Table structure for table `jenis_makanan` */

DROP TABLE IF EXISTS `jenis_makanan`;

CREATE TABLE `jenis_makanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=3;

/*Table structure for table `jenis_pegawai` */

DROP TABLE IF EXISTS `jenis_pegawai`;

CREATE TABLE `jenis_pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(200) DEFAULT '',
  `kd_kelompok` varchar(1) NOT NULL DEFAULT '1',
  `nama_kelompok` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=12;

/*Table structure for table `jenis_pegawailama` */

DROP TABLE IF EXISTS `jenis_pegawailama`;

CREATE TABLE `jenis_pegawailama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=12;

/*Table structure for table `jenis_sppd` */

DROP TABLE IF EXISTS `jenis_sppd`;

CREATE TABLE `jenis_sppd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_sppd` varchar(1) DEFAULT '',
  `nama_sppd` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=6;

/*Table structure for table `jenis_thr` */

DROP TABLE IF EXISTS `jenis_thr`;

CREATE TABLE `jenis_thr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenisthr` varchar(1) DEFAULT '',
  `nama_jenisthr` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `jenis_tujuan` */

DROP TABLE IF EXISTS `jenis_tujuan`;

CREATE TABLE `jenis_tujuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_tujuan` varchar(1) DEFAULT '',
  `nama_tujuan` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=4;

/*Table structure for table `kategori_pajak` */

DROP TABLE IF EXISTS `kategori_pajak`;

CREATE TABLE `kategori_pajak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(2) DEFAULT '',
  `batas_awal` double NOT NULL DEFAULT '0',
  `batas_akhir` double NOT NULL DEFAULT '0',
  `tarif` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `kategori_pegawai` */

DROP TABLE IF EXISTS `kategori_pegawai`;

CREATE TABLE `kategori_pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=MyISAM;

/*Table structure for table `kelebihan_bayar_rampung` */

DROP TABLE IF EXISTS `kelebihan_bayar_rampung`;

CREATE TABLE `kelebihan_bayar_rampung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=2312;

/*Table structure for table `kelebihan_bayar_rampungreal` */

DROP TABLE IF EXISTS `kelebihan_bayar_rampungreal`;

CREATE TABLE `kelebihan_bayar_rampungreal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=2307;

/*Table structure for table `kelebihan_bayar_rampungreallama` */

DROP TABLE IF EXISTS `kelebihan_bayar_rampungreallama`;

CREATE TABLE `kelebihan_bayar_rampungreallama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=2307;

/*Table structure for table `keluhan` */

DROP TABLE IF EXISTS `keluhan`;

CREATE TABLE `keluhan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip_pengeluh` varchar(20) NOT NULL,
  `keluhan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `kondisi_kesehatan` */

DROP TABLE IF EXISTS `kondisi_kesehatan`;

CREATE TABLE `kondisi_kesehatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `tanggal` varchar(10) DEFAULT '',
  `jam` varchar(8) DEFAULT '',
  `suhu` varchar(30) DEFAULT '',
  `kondisi` text,
  `jam2` varchar(8) DEFAULT '',
  `suhu2` varchar(30) DEFAULT '',
  `kondisi2` text,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=58418;

/*Table structure for table `konsumsi` */

DROP TABLE IF EXISTS `konsumsi`;

CREATE TABLE `konsumsi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pengajuan` varchar(60) DEFAULT '',
  `tgl_permintaan` varchar(10) DEFAULT '',
  `user_permintaan` varchar(60) DEFAULT '',
  `jenis_acara` varchar(200) DEFAULT '',
  `uraian_acara` varchar(250) DEFAULT '',
  `lokasi` varchar(250) DEFAULT '',
  `tgl_acara` varchar(10) DEFAULT '',
  `jam_mulai` varchar(5) DEFAULT '',
  `jam_selesai` varchar(5) DEFAULT '',
  `jumlah_peserta` int(11) NOT NULL DEFAULT '0',
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
) AUTO_INCREMENT=429;

/*Table structure for table `konsumsi20221125` */

DROP TABLE IF EXISTS `konsumsi20221125`;

CREATE TABLE `konsumsi20221125` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pengajuan` varchar(60) DEFAULT '',
  `tgl_permintaan` varchar(10) DEFAULT '',
  `user_permintaan` varchar(60) DEFAULT '',
  `jenis_acara` varchar(200) DEFAULT '',
  `uraian_acara` varchar(250) DEFAULT '',
  `lokasi` varchar(250) DEFAULT '',
  `tgl_acara` varchar(10) DEFAULT '',
  `jam_mulai` varchar(5) DEFAULT '',
  `jam_selesai` varchar(5) DEFAULT '',
  `jumlah_peserta` int(11) NOT NULL DEFAULT '0',
  `jenis_makanan` varchar(60) DEFAULT '',
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
) AUTO_INCREMENT=64;

/*Table structure for table `konsumsilama` */

DROP TABLE IF EXISTS `konsumsilama`;

CREATE TABLE `konsumsilama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_permintaan` varchar(30) DEFAULT '',
  `tanggal` varchar(10) DEFAULT '',
  `jam` varchar(8) DEFAULT '',
  `lokasi` varchar(255) DEFAULT '',
  `acara` text,
  `jumlah` double NOT NULL DEFAULT '0',
  `harga_satuan` double NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0',
  `pemesan` varchar(60) DEFAULT '',
  `approve1` varchar(1) NOT NULL DEFAULT '0',
  `approval1` varchar(60) DEFAULT '',
  `tgl_approve1` varchar(10) DEFAULT '',
  `alasan_reject1` varchar(255) DEFAULT '',
  `approve2` varchar(1) NOT NULL DEFAULT '0',
  `approval2` varchar(60) DEFAULT '',
  `tgl_approve2` varchar(10) DEFAULT '',
  `alasan_reject2` varchar(255) DEFAULT '',
  `approve3` varchar(1) NOT NULL DEFAULT '0',
  `approval3` varchar(60) DEFAULT '',
  `tgl_approve3` varchar(10) DEFAULT '',
  `alasan_reject3` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=14;

/*Table structure for table `kpi_pusat` */

DROP TABLE IF EXISTS `kpi_pusat`;

CREATE TABLE `kpi_pusat` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_kpi_pusat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `kunci_data` */

DROP TABLE IF EXISTS `kunci_data`;

CREATE TABLE `kunci_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) NOT NULL DEFAULT '',
  `kunci` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=12;

/*Table structure for table `libur_nasional` */

DROP TABLE IF EXISTS `libur_nasional`;

CREATE TABLE `libur_nasional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(10) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=119;

/*Table structure for table `log_aktivitas` */

DROP TABLE IF EXISTS `log_aktivitas`;

CREATE TABLE `log_aktivitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(30) DEFAULT '',
  `user` varchar(30) DEFAULT '',
  `nama` varchar(60) DEFAULT '',
  `aktivitas` text,
  `kode` varchar(250) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=32244;

/*Table structure for table `m_grade` */

DROP TABLE IF EXISTS `m_grade`;

CREATE TABLE `m_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_grade` varchar(30) DEFAULT '',
  `label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `mapping_pajak` */

DROP TABLE IF EXISTS `mapping_pajak`;

CREATE TABLE `mapping_pajak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=382;

/*Table structure for table `mapping_sptmasa` */

DROP TABLE IF EXISTS `mapping_sptmasa`;

CREATE TABLE `mapping_sptmasa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `kode` varchar(30) DEFAULT '',
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
) AUTO_INCREMENT=4913;

/*Table structure for table `mapping_sptmasa20241226` */

DROP TABLE IF EXISTS `mapping_sptmasa20241226`;

CREATE TABLE `mapping_sptmasa20241226` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `kode` varchar(30) DEFAULT '',
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
) AUTO_INCREMENT=2973;

/*Table structure for table `master_bantuan_mutasi` */

DROP TABLE IF EXISTS `master_bantuan_mutasi`;

CREATE TABLE `master_bantuan_mutasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=81;

/*Table structure for table `master_biaya_sppd` */

DROP TABLE IF EXISTS `master_biaya_sppd`;

CREATE TABLE `master_biaya_sppd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `batas_awal` varchar(10) DEFAULT '',
  `batas_akhir` varchar(10) DEFAULT '',
  `level_sppd` varchar(1) NOT NULL DEFAULT '',
  `konsumsi` double NOT NULL DEFAULT '0',
  `cuci_pakaian` double NOT NULL DEFAULT '0',
  `transportasi_lokal` double NOT NULL DEFAULT '0',
  `penginapan` double NOT NULL DEFAULT '0',
  `lumpsum_penginapan` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=15;

/*Table structure for table `master_biaya_sppd2` */

DROP TABLE IF EXISTS `master_biaya_sppd2`;

CREATE TABLE `master_biaya_sppd2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `batas_awal` varchar(10) DEFAULT '',
  `batas_akhir` varchar(10) DEFAULT '',
  `level_sppd` varchar(1) NOT NULL DEFAULT '',
  `konsumsi` double NOT NULL DEFAULT '0',
  `cuci_pakaian` double NOT NULL DEFAULT '0',
  `transportasi_lokal` double NOT NULL DEFAULT '0',
  `penginapan` double NOT NULL DEFAULT '0',
  `lumpsum_penginapan` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=15;

/*Table structure for table `master_biaya_sppd2lama` */

DROP TABLE IF EXISTS `master_biaya_sppd2lama`;

CREATE TABLE `master_biaya_sppd2lama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level_sppd` varchar(1) NOT NULL DEFAULT '',
  `konsumsi` double NOT NULL DEFAULT '0',
  `cuci_pakaian` double NOT NULL DEFAULT '0',
  `transportasi_lokal` double NOT NULL DEFAULT '0',
  `penginapan` double NOT NULL DEFAULT '0',
  `lumpsum_penginapan` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=8;

/*Table structure for table `master_biaya_sppdlama` */

DROP TABLE IF EXISTS `master_biaya_sppdlama`;

CREATE TABLE `master_biaya_sppdlama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level_sppd` varchar(1) NOT NULL DEFAULT '',
  `konsumsi` double NOT NULL DEFAULT '0',
  `cuci_pakaian` double NOT NULL DEFAULT '0',
  `transportasi_lokal` double NOT NULL DEFAULT '0',
  `penginapan` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=8;

/*Table structure for table `master_biaya_transportasi` */

DROP TABLE IF EXISTS `master_biaya_transportasi`;

CREATE TABLE `master_biaya_transportasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kota_asal` varchar(120) DEFAULT '',
  `kota_tujuan` varchar(120) DEFAULT '',
  `jenis_transportasi` varchar(120) DEFAULT '',
  `biaya` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

/*Table structure for table `master_divisi` */

DROP TABLE IF EXISTS `master_divisi`;

CREATE TABLE `master_divisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `divisi` varchar(160) DEFAULT '',
  `pejabat` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `divisi` (`divisi`)
) AUTO_INCREMENT=8;

/*Table structure for table `master_gaji` */

DROP TABLE IF EXISTS `master_gaji`;

CREATE TABLE `master_gaji` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=385;

/*Table structure for table `master_gaji20200131` */

DROP TABLE IF EXISTS `master_gaji20200131`;

CREATE TABLE `master_gaji20200131` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `tunjangan_kemahalan` double NOT NULL DEFAULT '0',
  `tunjangan_perumahan` double NOT NULL DEFAULT '0',
  `tunjangan_transportasi` double NOT NULL DEFAULT '0',
  `bantuan_pulsa` double NOT NULL DEFAULT '0',
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
  `bpjs_kes_pp` double NOT NULL DEFAULT '0',
  `bpjs_kes_pk` double NOT NULL DEFAULT '0',
  `pot_koperasi` double NOT NULL DEFAULT '0',
  `pot_bazis` double NOT NULL DEFAULT '0',
  `dplk_simponi` double NOT NULL DEFAULT '0',
  `pot_dplk_pribadi` double NOT NULL DEFAULT '0',
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
) AUTO_INCREMENT=923;

/*Table structure for table `master_gaji20200614` */

DROP TABLE IF EXISTS `master_gaji20200614`;

CREATE TABLE `master_gaji20200614` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `tunjangan_kemahalan` double NOT NULL DEFAULT '0',
  `tunjangan_perumahan` double NOT NULL DEFAULT '0',
  `tunjangan_transportasi` double NOT NULL DEFAULT '0',
  `bantuan_pulsa` double NOT NULL DEFAULT '0',
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
  `bpjs_kes_pp` double NOT NULL DEFAULT '0',
  `bpjs_kes_pk` double NOT NULL DEFAULT '0',
  `pot_koperasi` double NOT NULL DEFAULT '0',
  `pot_bazis` double NOT NULL DEFAULT '0',
  `dplk_simponi` double NOT NULL DEFAULT '0',
  `pot_dplk_pribadi` double NOT NULL DEFAULT '0',
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
) AUTO_INCREMENT=146;

/*Table structure for table `master_gaji20230823` */

DROP TABLE IF EXISTS `master_gaji20230823`;

CREATE TABLE `master_gaji20230823` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=250;

/*Table structure for table `master_gajilama` */

DROP TABLE IF EXISTS `master_gajilama`;

CREATE TABLE `master_gajilama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) NOT NULL DEFAULT '',
  `jenis` varchar(1) DEFAULT '',
  `grade` varchar(120) DEFAULT '',
  `skala_grade` varchar(30) DEFAULT '',
  `p1` double NOT NULL DEFAULT '0',
  `p21` double NOT NULL DEFAULT '0',
  `p22` double NOT NULL DEFAULT '0',
  `honorer` double NOT NULL DEFAULT '0',
  `honorarium` double NOT NULL DEFAULT '0',
  `tunj_pph21` double NOT NULL DEFAULT '0',
  `tunj_perumahan` double NOT NULL DEFAULT '0',
  `tunj_kendaraan` double NOT NULL DEFAULT '0',
  `tunj_bbm` double NOT NULL DEFAULT '0',
  `tunj_komunikasi` double NOT NULL DEFAULT '0',
  `nama_tunjangan1` varchar(200) DEFAULT '',
  `tunjangan1` double NOT NULL DEFAULT '0',
  `nama_tunjangan2` varchar(200) DEFAULT '',
  `tunjangan2` double NOT NULL DEFAULT '0',
  `nama_tunjangan3` varchar(200) DEFAULT '',
  `tunjangan3` double NOT NULL DEFAULT '0',
  `nama_tunjangan4` varchar(200) DEFAULT '',
  `tunjangan4` double NOT NULL DEFAULT '0',
  `potongan_pph21` double NOT NULL DEFAULT '0',
  `dana_pensiun` double NOT NULL DEFAULT '0',
  `nama_potongan1` varchar(200) DEFAULT '',
  `potongan1` double NOT NULL DEFAULT '0',
  `nama_potongan2` varchar(200) DEFAULT '',
  `potongan2` double NOT NULL DEFAULT '0',
  `nama_potongan3` varchar(200) DEFAULT '',
  `potongan3` double NOT NULL DEFAULT '0',
  `nama_potongan4` varchar(250) DEFAULT '',
  `potongan4` double NOT NULL DEFAULT '0',
  `bpjs_tk_pp` double NOT NULL DEFAULT '0',
  `bpjs_tk_kp` double NOT NULL DEFAULT '0',
  `bpjs_tk_kkp` double NOT NULL DEFAULT '0',
  `bpjs_tk_htp` double NOT NULL DEFAULT '0',
  `bpjs_tk_jhtk` double NOT NULL DEFAULT '0',
  `bpjs_tk_pk` double NOT NULL DEFAULT '0',
  `bpjs_kes_pp` double NOT NULL DEFAULT '0',
  `bpjs_kes_pk` double NOT NULL DEFAULT '0',
  `aktif` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) AUTO_INCREMENT=47;

/*Table structure for table `master_grade` */

DROP TABLE IF EXISTS `master_grade`;

CREATE TABLE `master_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grade` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=28;

/*Table structure for table `master_iki` */

DROP TABLE IF EXISTS `master_iki`;

CREATE TABLE `master_iki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iki` varchar(10) DEFAULT '',
  `nilai` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=5;

/*Table structure for table `master_isk` */

DROP TABLE IF EXISTS `master_isk`;

CREATE TABLE `master_isk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isk` varchar(10) DEFAULT '',
  `nilai` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=5;

/*Table structure for table `master_jenis` */

DROP TABLE IF EXISTS `master_jenis`;

CREATE TABLE `master_jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=12;

/*Table structure for table `master_kondisi` */

DROP TABLE IF EXISTS `master_kondisi`;

CREATE TABLE `master_kondisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kondisi` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=15;

/*Table structure for table `master_kota` */

DROP TABLE IF EXISTS `master_kota`;

CREATE TABLE `master_kota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kota` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=529;

/*Table structure for table `master_level` */

DROP TABLE IF EXISTS `master_level`;

CREATE TABLE `master_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(1) DEFAULT '',
  `uraian` varchar(250) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=8;

/*Table structure for table `master_mapping` */

DROP TABLE IF EXISTS `master_mapping`;

CREATE TABLE `master_mapping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kolom` varchar(60) CHARACTER SET utf8mb4 DEFAULT '',
  `kode_akun` varchar(30) CHARACTER SET utf8mb4 DEFAULT '',
  `nama_akun` varchar(160) CHARACTER SET utf8mb4 DEFAULT '',
  `item_no` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=93;

/*Table structure for table `master_pendidikan` */

DROP TABLE IF EXISTS `master_pendidikan`;

CREATE TABLE `master_pendidikan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pendidikan` varchar(60) DEFAULT '',
  `nama_pendidikan` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

/*Table structure for table `master_penempatan` */

DROP TABLE IF EXISTS `master_penempatan`;

CREATE TABLE `master_penempatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region` varchar(120) DEFAULT '',
  `penempatan` varchar(160) DEFAULT NULL,
  `lat` varchar(60) DEFAULT '',
  `lon` varchar(60) DEFAULT '',
  `waktu` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=66;

/*Table structure for table `master_penempatan20210520` */

DROP TABLE IF EXISTS `master_penempatan20210520`;

CREATE TABLE `master_penempatan20210520` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `penempatan` varchar(160) DEFAULT NULL,
  `lat` varchar(60) DEFAULT '',
  `lon` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=9;

/*Table structure for table `master_ptkp` */

DROP TABLE IF EXISTS `master_ptkp`;

CREATE TABLE `master_ptkp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(4) NOT NULL DEFAULT '',
  `ptkp` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=9;

/*Table structure for table `master_ptkp20200228` */

DROP TABLE IF EXISTS `master_ptkp20200228`;

CREATE TABLE `master_ptkp20200228` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(4) NOT NULL DEFAULT '',
  `ptkp` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=6;

/*Table structure for table `master_region` */

DROP TABLE IF EXISTS `master_region`;

CREATE TABLE `master_region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region` varchar(160) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=11;

/*Table structure for table `master_region20210520` */

DROP TABLE IF EXISTS `master_region20210520`;

CREATE TABLE `master_region20210520` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=9;

/*Table structure for table `master_restitusi` */

DROP TABLE IF EXISTS `master_restitusi`;

CREATE TABLE `master_restitusi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_restitusi` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama_restitusi` (`nama_restitusi`)
) AUTO_INCREMENT=7;

/*Table structure for table `master_sertifikat` */

DROP TABLE IF EXISTS `master_sertifikat`;

CREATE TABLE `master_sertifikat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_sertifikat` varchar(3) DEFAULT '',
  `nama_sertifikat` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

/*Table structure for table `master_transportasi` */

DROP TABLE IF EXISTS `master_transportasi`;

CREATE TABLE `master_transportasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transportasi` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `master_unit` */

DROP TABLE IF EXISTS `master_unit`;

CREATE TABLE `master_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_region` varchar(2) CHARACTER SET utf8 DEFAULT '',
  `kd_cabang` varchar(3) CHARACTER SET utf8 DEFAULT '',
  `kd_unitpln` varchar(4) CHARACTER SET utf8 DEFAULT '',
  `kd_unit` varchar(5) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `nama_unit` varchar(64) CHARACTER SET utf8 NOT NULL,
  `nama_kota` varchar(200) CHARACTER SET utf8 DEFAULT '',
  `kode_pos` varchar(10) CHARACTER SET utf8 DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `kd_unit` (`kd_unit`)
) ROW_FORMAT=DYNAMIC;

/*Table structure for table `masteruser` */

DROP TABLE IF EXISTS `masteruser`;

CREATE TABLE `masteruser` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `user_pass` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `nip` varchar(60) CHARACTER SET utf8 DEFAULT '',
  `hak_akses` varchar(1) CHARACTER SET utf8 NOT NULL DEFAULT '1',
  `admin` enum('yes','no') CHARACTER SET utf8 NOT NULL DEFAULT 'no',
  `admin_sdm` enum('yes','no') NOT NULL DEFAULT 'no',
  `admin_sppd` enum('yes','no') CHARACTER SET utf8 NOT NULL DEFAULT 'no',
  `admin_cuti` enum('yes','no') CHARACTER SET utf8 NOT NULL DEFAULT 'no',
  `admin_absensi` enum('yes','no') CHARACTER SET utf8 NOT NULL DEFAULT 'no',
  `admin_keuangan` enum('yes','no') CHARACTER SET utf8 NOT NULL DEFAULT 'no',
  `admin_pajak` enum('yes','no') CHARACTER SET utf8 NOT NULL DEFAULT 'no',
  `user_fullname` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `user_address` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `user_telepon` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `user_email` varchar(120) CHARACTER SET utf8 DEFAULT '',
  `aktif` varchar(1) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `foto` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `counter_login` int(11) NOT NULL DEFAULT '0',
  `lock` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`)
) AUTO_INCREMENT=4410 ROW_FORMAT=DYNAMIC;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `mutasi_pegawai` */

DROP TABLE IF EXISTS `mutasi_pegawai`;

CREATE TABLE `mutasi_pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=MyISAM;

/*Table structure for table `natura` */

DROP TABLE IF EXISTS `natura`;

CREATE TABLE `natura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=1621 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `natura20240207` */

DROP TABLE IF EXISTS `natura20240207`;

CREATE TABLE `natura20240207` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `blthnip` varchar(30) DEFAULT '',
  `cop` double NOT NULL DEFAULT '0',
  `fasilitas_hp` double NOT NULL DEFAULT '0',
  `reimburse_kesehatan` double NOT NULL DEFAULT '0',
  `asuransi_kesehatan` double NOT NULL DEFAULT '0',
  `sarana_kerja` double NOT NULL DEFAULT '0',
  `sppd_manual` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blth_nip` (`blthnip`)
) AUTO_INCREMENT=1017 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `nonaktif` */

DROP TABLE IF EXISTS `nonaktif`;

CREATE TABLE `nonaktif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '3',
  `tgl_berhenti` varchar(10) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `tgl_update` varchar(60) DEFAULT '',
  `petugas` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=88;

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `pejabat_laporan` */

DROP TABLE IF EXISTS `pejabat_laporan`;

CREATE TABLE `pejabat_laporan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=2;

/*Table structure for table `pejabat_sdm` */

DROP TABLE IF EXISTS `pejabat_sdm`;

CREATE TABLE `pejabat_sdm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(120) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=3;

/*Table structure for table `pendapatan_mutasi` */

DROP TABLE IF EXISTS `pendapatan_mutasi`;

CREATE TABLE `pendapatan_mutasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(60) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `niptahun` varchar(60) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `netto` double NOT NULL DEFAULT '0',
  `pph21` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=228;

/*Table structure for table `pendapatan_mutasi20250107` */

DROP TABLE IF EXISTS `pendapatan_mutasi20250107`;

CREATE TABLE `pendapatan_mutasi20250107` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(60) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `niptahun` varchar(60) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `netto` double NOT NULL DEFAULT '0',
  `pph21` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=154;

/*Table structure for table `pengikut_sppd` */

DROP TABLE IF EXISTS `pengikut_sppd`;

CREATE TABLE `pengikut_sppd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsppd` varchar(60) DEFAULT '',
  `nama` varchar(120) DEFAULT '',
  `hubungan` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=183;

/*Table structure for table `penilaian_iks` */

DROP TABLE IF EXISTS `penilaian_iks`;

CREATE TABLE `penilaian_iks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=MyISAM;

/*Table structure for table `perhitungan_pajak_khusus` */

DROP TABLE IF EXISTS `perhitungan_pajak_khusus`;

CREATE TABLE `perhitungan_pajak_khusus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) AUTO_INCREMENT=10;

/*Table structure for table `perhitungan_pajak_khususlama` */

DROP TABLE IF EXISTS `perhitungan_pajak_khususlama`;

CREATE TABLE `perhitungan_pajak_khususlama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) AUTO_INCREMENT=2;

/*Table structure for table `perhitungan_pajak_pesangon` */

DROP TABLE IF EXISTS `perhitungan_pajak_pesangon`;

CREATE TABLE `perhitungan_pajak_pesangon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) AUTO_INCREMENT=3;

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` char(64) NOT NULL,
  `abilities` text,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `token` (`token`)
) ENGINE=InnoDB AUTO_INCREMENT=2179 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `pertanyaan` */

DROP TABLE IF EXISTS `pertanyaan`;

CREATE TABLE `pertanyaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pertanyaan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `pesangon` */

DROP TABLE IF EXISTS `pesangon`;

CREATE TABLE `pesangon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `nipblth` varchar(60) DEFAULT '',
  `uang_pesangon` double NOT NULL DEFAULT '0',
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=5;

/*Table structure for table `pph` */

DROP TABLE IF EXISTS `pph`;

CREATE TABLE `pph` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
) AUTO_INCREMENT=31174;

/*Table structure for table `pph20200204` */

DROP TABLE IF EXISTS `pph20200204`;

CREATE TABLE `pph20200204` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=2453;

/*Table structure for table `pph20200226` */

DROP TABLE IF EXISTS `pph20200226`;

CREATE TABLE `pph20200226` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=3228;

/*Table structure for table `pph20200305` */

DROP TABLE IF EXISTS `pph20200305`;

CREATE TABLE `pph20200305` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=3513;

/*Table structure for table `pph20200305(jaga)` */

DROP TABLE IF EXISTS `pph20200305(jaga)`;

CREATE TABLE `pph20200305(jaga)` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=3513;

/*Table structure for table `pph20200307` */

DROP TABLE IF EXISTS `pph20200307`;

CREATE TABLE `pph20200307` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=3531;

/*Table structure for table `pph20200313` */

DROP TABLE IF EXISTS `pph20200313`;

CREATE TABLE `pph20200313` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=3535;

/*Table structure for table `pph20200418` */

DROP TABLE IF EXISTS `pph20200418`;

CREATE TABLE `pph20200418` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=4137;

/*Table structure for table `pph20200420` */

DROP TABLE IF EXISTS `pph20200420`;

CREATE TABLE `pph20200420` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=6325;

/*Table structure for table `pph20200429` */

DROP TABLE IF EXISTS `pph20200429`;

CREATE TABLE `pph20200429` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=8295;

/*Table structure for table `pph20210107` */

DROP TABLE IF EXISTS `pph20210107`;

CREATE TABLE `pph20210107` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=8296;

/*Table structure for table `pph20210108` */

DROP TABLE IF EXISTS `pph20210108`;

CREATE TABLE `pph20210108` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=15342;

/*Table structure for table `pph20210111` */

DROP TABLE IF EXISTS `pph20210111`;

CREATE TABLE `pph20210111` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=16072;

/*Table structure for table `pph20210112` */

DROP TABLE IF EXISTS `pph20210112`;

CREATE TABLE `pph20210112` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=16802;

/*Table structure for table `pph20210113` */

DROP TABLE IF EXISTS `pph20210113`;

CREATE TABLE `pph20210113` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=16948;

/*Table structure for table `pph20210130` */

DROP TABLE IF EXISTS `pph20210130`;

CREATE TABLE `pph20210130` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=18249;

/*Table structure for table `pph20210215` */

DROP TABLE IF EXISTS `pph20210215`;

CREATE TABLE `pph20210215` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=18264;

/*Table structure for table `pph20210222` */

DROP TABLE IF EXISTS `pph20210222`;

CREATE TABLE `pph20210222` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=18264;

/*Table structure for table `pph20210225` */

DROP TABLE IF EXISTS `pph20210225`;

CREATE TABLE `pph20210225` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=18411;

/*Table structure for table `pph20210226` */

DROP TABLE IF EXISTS `pph20210226`;

CREATE TABLE `pph20210226` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=18849;

/*Table structure for table `pph2022` */

DROP TABLE IF EXISTS `pph2022`;

CREATE TABLE `pph2022` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
) AUTO_INCREMENT=748;

/*Table structure for table `pph20220106` */

DROP TABLE IF EXISTS `pph20220106`;

CREATE TABLE `pph20220106` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=19537;

/*Table structure for table `pph20220202` */

DROP TABLE IF EXISTS `pph20220202`;

CREATE TABLE `pph20220202` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=22042;

/*Table structure for table `pph2022backup` */

DROP TABLE IF EXISTS `pph2022backup`;

CREATE TABLE `pph2022backup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
) AUTO_INCREMENT=749;

/*Table structure for table `pph20230104` */

DROP TABLE IF EXISTS `pph20230104`;

CREATE TABLE `pph20230104` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
) AUTO_INCREMENT=25803;

/*Table structure for table `pph20230111` */

DROP TABLE IF EXISTS `pph20230111`;

CREATE TABLE `pph20230111` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
) AUTO_INCREMENT=26177;

/*Table structure for table `pph20240109` */

DROP TABLE IF EXISTS `pph20240109`;

CREATE TABLE `pph20240109` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
) AUTO_INCREMENT=28803;

/*Table structure for table `pph21` */

DROP TABLE IF EXISTS `pph21`;

CREATE TABLE `pph21` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=92;

/*Table structure for table `pph2120191225` */

DROP TABLE IF EXISTS `pph2120191225`;

CREATE TABLE `pph2120191225` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_buat` varchar(10) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) NOT NULL DEFAULT '',
  `blth_nip` varchar(60) NOT NULL DEFAULT '',
  `status` varchar(4) DEFAULT '',
  `efektif` int(11) NOT NULL DEFAULT '0',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
  `gajib` double NOT NULL DEFAULT '0',
  `tunjangan_pph21` double NOT NULL DEFAULT '0',
  `tunjanganb` double NOT NULL DEFAULT '0',
  `lemburb` double NOT NULL DEFAULT '0',
  `jkkb` double NOT NULL DEFAULT '0',
  `jkmb` double NOT NULL DEFAULT '0',
  `brutob` double NOT NULL DEFAULT '0',
  `biaya_jabatanb` double NOT NULL DEFAULT '0',
  `premit` double NOT NULL DEFAULT '0',
  `thrt` double NOT NULL DEFAULT '0',
  `ikst` double NOT NULL DEFAULT '0',
  `bonust` double NOT NULL DEFAULT '0',
  `jpb` double NOT NULL DEFAULT '0',
  `jhtb` double NOT NULL DEFAULT '0',
  `jp_jhtb` double NOT NULL DEFAULT '0',
  `jp_jhtt` double NOT NULL DEFAULT '0',
  `brutot` double NOT NULL DEFAULT '0',
  `biaya_jabatant` double NOT NULL DEFAULT '0',
  `biaya_pengurangt` double NOT NULL DEFAULT '0',
  `nettot` double NOT NULL DEFAULT '0',
  `ptkp` double NOT NULL DEFAULT '0',
  `pkp` double NOT NULL DEFAULT '0',
  `ppht` double NOT NULL DEFAULT '0',
  `pph21` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blth_nip` (`blth_nip`)
) AUTO_INCREMENT=121;

/*Table structure for table `pph2120200109` */

DROP TABLE IF EXISTS `pph2120200109`;

CREATE TABLE `pph2120200109` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_buat` varchar(10) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) NOT NULL DEFAULT '',
  `blth_nip` varchar(60) NOT NULL DEFAULT '',
  `status` varchar(4) DEFAULT '',
  `efektif` int(11) NOT NULL DEFAULT '0',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
  `gajib` double NOT NULL DEFAULT '0',
  `tunjangan_pph21` double NOT NULL DEFAULT '0',
  `tunjanganb` double NOT NULL DEFAULT '0',
  `lemburb` double NOT NULL DEFAULT '0',
  `jkkb` double NOT NULL DEFAULT '0',
  `jkmb` double NOT NULL DEFAULT '0',
  `brutob` double NOT NULL DEFAULT '0',
  `biaya_jabatanb` double NOT NULL DEFAULT '0',
  `premit` double NOT NULL DEFAULT '0',
  `thrt` double NOT NULL DEFAULT '0',
  `ikst` double NOT NULL DEFAULT '0',
  `bonust` double NOT NULL DEFAULT '0',
  `varcostt` double NOT NULL DEFAULT '0',
  `brutob2` double NOT NULL DEFAULT '0',
  `biaya_jabatanb2` double NOT NULL DEFAULT '0',
  `jpb` double NOT NULL DEFAULT '0',
  `jhtb` double NOT NULL DEFAULT '0',
  `jp_jhtb` double NOT NULL DEFAULT '0',
  `biaya_pengurangb` double NOT NULL DEFAULT '0',
  `nettob` double NOT NULL DEFAULT '0',
  `nettot` double NOT NULL DEFAULT '0',
  `ptkp` double NOT NULL DEFAULT '0',
  `pkp` double NOT NULL DEFAULT '0',
  `ppht` double NOT NULL DEFAULT '0',
  `pph21` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blth_nip` (`blth_nip`)
) AUTO_INCREMENT=205;

/*Table structure for table `pph2120200201` */

DROP TABLE IF EXISTS `pph2120200201`;

CREATE TABLE `pph2120200201` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) NOT NULL DEFAULT '',
  `blth_nip` varchar(60) NOT NULL DEFAULT '',
  `status` varchar(4) DEFAULT '',
  `efektif` int(11) NOT NULL DEFAULT '0',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
  `gajib` double NOT NULL DEFAULT '0',
  `tunjangan_pph21` double NOT NULL DEFAULT '0',
  `tunjanganb` double NOT NULL DEFAULT '0',
  `lemburb` double NOT NULL DEFAULT '0',
  `jkkb` double NOT NULL DEFAULT '0',
  `jkmb` double NOT NULL DEFAULT '0',
  `brutob` double NOT NULL DEFAULT '0',
  `biaya_jabatanb` double NOT NULL DEFAULT '0',
  `premit` double NOT NULL DEFAULT '0',
  `thrt` double NOT NULL DEFAULT '0',
  `ikst` double NOT NULL DEFAULT '0',
  `bonust` double NOT NULL DEFAULT '0',
  `varcostt` double NOT NULL DEFAULT '0',
  `brutob2` double NOT NULL DEFAULT '0',
  `biaya_jabatanb2` double NOT NULL DEFAULT '0',
  `jpb` double NOT NULL DEFAULT '0',
  `jhtb` double NOT NULL DEFAULT '0',
  `jp_jhtb` double NOT NULL DEFAULT '0',
  `biaya_pengurangb` double NOT NULL DEFAULT '0',
  `nettob` double NOT NULL DEFAULT '0',
  `nettot` double NOT NULL DEFAULT '0',
  `ptkp` double NOT NULL DEFAULT '0',
  `pkp` double NOT NULL DEFAULT '0',
  `ppht` double NOT NULL DEFAULT '0',
  `pph21` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blth_nip` (`blth_nip`)
) AUTO_INCREMENT=97;

/*Table structure for table `pph21lama` */

DROP TABLE IF EXISTS `pph21lama`;

CREATE TABLE `pph21lama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_buat` varchar(10) DEFAULT '',
  `urut` int(11) NOT NULL DEFAULT '0',
  `blth` varchar(7) DEFAULT '',
  `kd_project` varchar(3) NOT NULL DEFAULT '',
  `kd_unit` varchar(5) DEFAULT '',
  `kd_kategori` varchar(3) DEFAULT '',
  `nip` varchar(30) NOT NULL DEFAULT '',
  `blth_nip` varchar(60) NOT NULL DEFAULT '',
  `status` varchar(4) DEFAULT '',
  `efektif` int(11) NOT NULL DEFAULT '0',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
  `gaji_pokok` double NOT NULL DEFAULT '0',
  `tunjangan` double NOT NULL DEFAULT '0',
  `tunjangan_lain` double NOT NULL DEFAULT '0',
  `jkk_jkm` double NOT NULL DEFAULT '0',
  `tantiem_bonus` double NOT NULL DEFAULT '0',
  `thr` double NOT NULL DEFAULT '0',
  `brutot` double NOT NULL DEFAULT '0',
  `biaya_jabatan1` double NOT NULL DEFAULT '0',
  `biaya_jabatan2` double NOT NULL DEFAULT '0',
  `jp` double NOT NULL DEFAULT '0',
  `jht` double NOT NULL DEFAULT '0',
  `nettob` double NOT NULL DEFAULT '0',
  `nettot` double NOT NULL DEFAULT '0',
  `ptkp` double NOT NULL DEFAULT '0',
  `pkp` double NOT NULL DEFAULT '0',
  `ppht` double NOT NULL DEFAULT '0',
  `pphb` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blth_nip` (`blth_nip`)
) ENGINE=MyISAM;

/*Table structure for table `pph21masa` */

DROP TABLE IF EXISTS `pph21masa`;

CREATE TABLE `pph21masa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
);

INSERT INTO `pph21masa` (
  `kpp`, `npwp`, `no_urut`, `nip`, `status`, `tahun`, `blth`, `blthnip`, 
  `masa_kerja`, `gaji`
) VALUES 
('KPP001', '123456789012345', '00000001', 'NIP001', 'Tetap', '2024', '2024-02', '2024-02-NIP001', 
 5, 10000000),

('KPP002', '987654321098765', '00000002', 'NIP002', 'Kontrak', '2024', '2024-02', '2024-02-NIP002', 
 3, 8000000),

('KPP003', '112233445566778', '00000003', 'NIP003', 'Tetap', '2024', '2024-02', '2024-02-NIP003', 
 7, 12000000);


/*Table structure for table `pph21masa20210105` */

DROP TABLE IF EXISTS `pph21masa20210105`;

CREATE TABLE `pph21masa20210105` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `pphb1_terutang` double NOT NULL DEFAULT '0',
  `pphb2_terutang` double NOT NULL DEFAULT '0',
  `pphb_terutang` double NOT NULL DEFAULT '0',
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
);

/*Table structure for table `pph21masa20210111` */

DROP TABLE IF EXISTS `pph21masa20210111`;

CREATE TABLE `pph21masa20210111` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `pphb1_terutang` double NOT NULL DEFAULT '0',
  `pphb2_terutang` double NOT NULL DEFAULT '0',
  `pphb_terutang` double NOT NULL DEFAULT '0',
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=14530;

/*Table structure for table `pph21masa20210203` */

DROP TABLE IF EXISTS `pph21masa20210203`;

CREATE TABLE `pph21masa20210203` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `pphb1_terutang` double NOT NULL DEFAULT '0',
  `pphb2_terutang` double NOT NULL DEFAULT '0',
  `pphb_terutang` double NOT NULL DEFAULT '0',
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=15245;

/*Table structure for table `pph21masa20210226` */

DROP TABLE IF EXISTS `pph21masa20210226`;

CREATE TABLE `pph21masa20210226` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `pphb1_terutang` double NOT NULL DEFAULT '0',
  `pphb2_terutang` double NOT NULL DEFAULT '0',
  `pphb_terutang` double NOT NULL DEFAULT '0',
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=16260;

/*Table structure for table `pph21masa20220106` */

DROP TABLE IF EXISTS `pph21masa20220106`;

CREATE TABLE `pph21masa20220106` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `pphb1_terutang` double NOT NULL DEFAULT '0',
  `pphb2_terutang` double NOT NULL DEFAULT '0',
  `pphb_terutang` double NOT NULL DEFAULT '0',
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=26026;

/*Table structure for table `pph21masa20220202` */

DROP TABLE IF EXISTS `pph21masa20220202`;

CREATE TABLE `pph21masa20220202` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `pphb1_terutang` double NOT NULL DEFAULT '0',
  `pphb2_terutang` double NOT NULL DEFAULT '0',
  `pphb_terutang` double NOT NULL DEFAULT '0',
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=28522;

/*Table structure for table `pph21masa20220810` */

DROP TABLE IF EXISTS `pph21masa20220810`;

CREATE TABLE `pph21masa20220810` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `pphb1_terutang` double NOT NULL DEFAULT '0',
  `pphb2_terutang` double NOT NULL DEFAULT '0',
  `pph_sistem` double NOT NULL DEFAULT '0',
  `pph_koreksi` double NOT NULL DEFAULT '0',
  `pphb_terutang` double NOT NULL DEFAULT '0',
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=31735;

/*Table structure for table `pph21masa20230104` */

DROP TABLE IF EXISTS `pph21masa20230104`;

CREATE TABLE `pph21masa20230104` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `pphb1_terutang` double NOT NULL DEFAULT '0',
  `pphb2_terutang` double NOT NULL DEFAULT '0',
  `pph_sistem` double NOT NULL DEFAULT '0',
  `pph_koreksi` double NOT NULL DEFAULT '0',
  `pphb_terutang` double NOT NULL DEFAULT '0',
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=35567;

/*Table structure for table `pph21masa20231010` */

DROP TABLE IF EXISTS `pph21masa20231010`;

CREATE TABLE `pph21masa20231010` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=41897;

/*Table structure for table `pph21masa20231224` */

DROP TABLE IF EXISTS `pph21masa20231224`;

CREATE TABLE `pph21masa20231224` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=44346;

/*Table structure for table `pph21masa20240107` */

DROP TABLE IF EXISTS `pph21masa20240107`;

CREATE TABLE `pph21masa20240107` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=44778;

/*Table structure for table `pph21masa20240109` */

DROP TABLE IF EXISTS `pph21masa20240109`;

CREATE TABLE `pph21masa20240109` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=45015;

/*Table structure for table `pph21masa20240109(2)` */

DROP TABLE IF EXISTS `pph21masa20240109(2)`;

CREATE TABLE `pph21masa20240109(2)` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=45419;

/*Table structure for table `pph21masa20240110(okt salah))` */

DROP TABLE IF EXISTS `pph21masa20240110(okt salah))`;

CREATE TABLE `pph21masa20240110(okt salah))` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=48983;

/*Table structure for table `pph21masa20241226` */

DROP TABLE IF EXISTS `pph21masa20241226`;

CREATE TABLE `pph21masa20241226` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=57971;

/*Table structure for table `pph21masareal` */

DROP TABLE IF EXISTS `pph21masareal`;

CREATE TABLE `pph21masareal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=60829;

/*Table structure for table `pph21tahunan` */

DROP TABLE IF EXISTS `pph21tahunan`;

CREATE TABLE `pph21tahunan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_buat` varchar(10) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(30) NOT NULL DEFAULT '',
  `blth_nip` varchar(60) NOT NULL DEFAULT '',
  `status` varchar(4) DEFAULT '',
  `efektif` int(11) NOT NULL DEFAULT '0',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
  `gajib` double NOT NULL DEFAULT '0',
  `tunjangan_pph21` double NOT NULL DEFAULT '0',
  `tunjanganb` double NOT NULL DEFAULT '0',
  `lemburb` double NOT NULL DEFAULT '0',
  `jkkb` double NOT NULL DEFAULT '0',
  `jkmb` double NOT NULL DEFAULT '0',
  `brutob` double NOT NULL DEFAULT '0',
  `biaya_jabatanb` double NOT NULL DEFAULT '0',
  `premit` double NOT NULL DEFAULT '0',
  `thrt` double NOT NULL DEFAULT '0',
  `ikst` double NOT NULL DEFAULT '0',
  `bonust` double NOT NULL DEFAULT '0',
  `varcostt` double NOT NULL DEFAULT '0',
  `brutob2` double NOT NULL DEFAULT '0',
  `biaya_jabatanb2` double NOT NULL DEFAULT '0',
  `jpb` double NOT NULL DEFAULT '0',
  `jhtb` double NOT NULL DEFAULT '0',
  `jp_jhtb` double NOT NULL DEFAULT '0',
  `biaya_pengurangb` double NOT NULL DEFAULT '0',
  `nettob` double NOT NULL DEFAULT '0',
  `nettot` double NOT NULL DEFAULT '0',
  `ptkp` double NOT NULL DEFAULT '0',
  `pkp` double NOT NULL DEFAULT '0',
  `ppht` double NOT NULL DEFAULT '0',
  `pph21` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blth_nip` (`blth_nip`)
) ENGINE=MyISAM;

/*Table structure for table `pph_bulan` */

DROP TABLE IF EXISTS `pph_bulan`;

CREATE TABLE `pph_bulan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(60) DEFAULT '',
  `kpp` varchar(60) DEFAULT '',
  `npwp` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
) AUTO_INCREMENT=38444;

/*Table structure for table `pph_bulan20200319` */

DROP TABLE IF EXISTS `pph_bulan20200319`;

CREATE TABLE `pph_bulan20200319` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
) AUTO_INCREMENT=5311;

/*Table structure for table `pphfixsebelumnya` */

DROP TABLE IF EXISTS `pphfixsebelumnya`;

CREATE TABLE `pphfixsebelumnya` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
  `tgl_proses` varchar(10) DEFAULT '',
  `petugas` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blthnip` (`blthnip`)
) AUTO_INCREMENT=3537;

/*Table structure for table `pphlock` */

DROP TABLE IF EXISTS `pphlock`;

CREATE TABLE `pphlock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
) AUTO_INCREMENT=1638;

/*Table structure for table `pphmanual` */

DROP TABLE IF EXISTS `pphmanual`;

CREATE TABLE `pphmanual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
) AUTO_INCREMENT=1177;

/*Table structure for table `pphmanual20240120` */

DROP TABLE IF EXISTS `pphmanual20240120`;

CREATE TABLE `pphmanual20240120` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
) AUTO_INCREMENT=1172;

/*Table structure for table `pphmanual20240219` */

DROP TABLE IF EXISTS `pphmanual20240219`;

CREATE TABLE `pphmanual20240219` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(200) DEFAULT '',
  `no_urut` varchar(8) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `status` varchar(30) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `blthnip` varchar(120) DEFAULT '',
  `blth_awal` varchar(7) DEFAULT '',
  `blth_akhir` varchar(7) DEFAULT '',
  `masa_kerja` int(11) NOT NULL DEFAULT '0',
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
) AUTO_INCREMENT=1176;

/*Table structure for table `promosi_pegawai` */

DROP TABLE IF EXISTS `promosi_pegawai`;

CREATE TABLE `promosi_pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=2;

/*Table structure for table `restore` */

DROP TABLE IF EXISTS `restore`;

CREATE TABLE `restore` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT '',
  `aktif` varchar(1) NOT NULL DEFAULT '3',
  `tgl_restore` varchar(10) DEFAULT '',
  `keterangan` varchar(255) DEFAULT '',
  `tgl_update` varchar(60) DEFAULT '',
  `petugas` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=26;

/*Table structure for table `riwayat_golongan` */

DROP TABLE IF EXISTS `riwayat_golongan`;

CREATE TABLE `riwayat_golongan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `tanggal` varchar(10) DEFAULT '',
  `golongan` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=344;

/*Table structure for table `riwayat_grade` */

DROP TABLE IF EXISTS `riwayat_grade`;

CREATE TABLE `riwayat_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `tanggal` varchar(10) DEFAULT '',
  `grade` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=305;

/*Table structure for table `riwayat_hukuman` */

DROP TABLE IF EXISTS `riwayat_hukuman`;

CREATE TABLE `riwayat_hukuman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `jenis_hukuman` varchar(120) DEFAULT '',
  `sejak` varchar(10) DEFAULT '',
  `sampai` varchar(10) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=4;

/*Table structure for table `riwayat_jabatan` */

DROP TABLE IF EXISTS `riwayat_jabatan`;

CREATE TABLE `riwayat_jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `jabatan` varchar(255) DEFAULT '',
  `unit` varchar(255) DEFAULT '',
  `sejak` varchar(10) DEFAULT '',
  `sampai` varchar(10) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=398;

/*Table structure for table `riwayat_kondite` */

DROP TABLE IF EXISTS `riwayat_kondite`;

CREATE TABLE `riwayat_kondite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `kondite` varchar(200) DEFAULT '',
  `tgl_mulai_penilaian` varchar(10) DEFAULT '',
  `tgl_akhir_penilaian` varchar(10) DEFAULT '',
  `talenta` varchar(120) DEFAULT '',
  `peringkat` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=751;

/*Table structure for table `riwayat_kursus_eksternal` */

DROP TABLE IF EXISTS `riwayat_kursus_eksternal`;

CREATE TABLE `riwayat_kursus_eksternal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `nama_kursus` varchar(200) DEFAULT '',
  `tgl_mulai` varchar(10) DEFAULT '',
  `tgl_selesai` varchar(10) DEFAULT '',
  `lembaga_pendidikan` varchar(200) DEFAULT '',
  `lokasi` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=425;

/*Table structure for table `riwayat_kursus_internal` */

DROP TABLE IF EXISTS `riwayat_kursus_internal`;

CREATE TABLE `riwayat_kursus_internal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `nama_kursus` varchar(200) DEFAULT '',
  `tgl_mulai` varchar(10) DEFAULT '',
  `tgl_selesai` varchar(10) DEFAULT '',
  `lembaga_pendidikan` varchar(200) DEFAULT '',
  `lokasi` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=641;

/*Table structure for table `riwayat_pekerjaan_sebelum` */

DROP TABLE IF EXISTS `riwayat_pekerjaan_sebelum`;

CREATE TABLE `riwayat_pekerjaan_sebelum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `instansi` varchar(200) DEFAULT '',
  `jabatan` varchar(255) DEFAULT '',
  `sejak` varchar(10) DEFAULT '',
  `sampai` varchar(10) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=11;

/*Table structure for table `riwayat_pendidikan` */

DROP TABLE IF EXISTS `riwayat_pendidikan`;

CREATE TABLE `riwayat_pendidikan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `pendidikan` varchar(120) DEFAULT '',
  `jurusan` varchar(200) DEFAULT '',
  `lembaga_pendidikan` varchar(200) DEFAULT '',
  `sejak` varchar(10) DEFAULT '',
  `sampai` varchar(10) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=184;

/*Table structure for table `riwayat_penghargaan` */

DROP TABLE IF EXISTS `riwayat_penghargaan`;

CREATE TABLE `riwayat_penghargaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `nama_penghargaan` varchar(200) DEFAULT '',
  `tanggal` varchar(10) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=11;

/*Table structure for table `riwayat_penugasan` */

DROP TABLE IF EXISTS `riwayat_penugasan`;

CREATE TABLE `riwayat_penugasan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `nama_penugasan` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `unit_kerja` varchar(200) DEFAULT '',
  `dari` varchar(64) DEFAULT '',
  `sampai` varchar(64) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

/*Table structure for table `riwayat_penugasan_khusus` */

DROP TABLE IF EXISTS `riwayat_penugasan_khusus`;

CREATE TABLE `riwayat_penugasan_khusus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `nama_penugasan` varchar(200) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  `unit` varchar(200) DEFAULT '',
  `sejak` varchar(10) DEFAULT '',
  `sampai` varchar(10) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=25;

/*Table structure for table `riwayat_profesi` */

DROP TABLE IF EXISTS `riwayat_profesi`;

CREATE TABLE `riwayat_profesi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `nama_profesi` varchar(200) DEFAULT '',
  `dari` varchar(64) DEFAULT '',
  `sampai` varchar(64) DEFAULT '',
  `sebutan_profesi` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

/*Table structure for table `riwayat_sertifikasi` */

DROP TABLE IF EXISTS `riwayat_sertifikasi`;

CREATE TABLE `riwayat_sertifikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `judul` varchar(200) DEFAULT '',
  `sejak` varchar(10) DEFAULT '',
  `sampai` varchar(10) DEFAULT '',
  `lembaga` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=229;

/*Table structure for table `riwayat_tenaga_harian` */

DROP TABLE IF EXISTS `riwayat_tenaga_harian`;

CREATE TABLE `riwayat_tenaga_harian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `unit` varchar(200) DEFAULT '',
  `sejak` varchar(10) DEFAULT '',
  `sampai` varchar(10) DEFAULT '',
  `golongan` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=4;

/*Table structure for table `riwayat_tugas_karya` */

DROP TABLE IF EXISTS `riwayat_tugas_karya`;

CREATE TABLE `riwayat_tugas_karya` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) DEFAULT '',
  `unit_kerja` varchar(200) DEFAULT '',
  `sejak` varchar(10) DEFAULT '',
  `sampai` varchar(10) DEFAULT '',
  `jabatan` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=10;

/*Table structure for table `rwyt_grade` */

DROP TABLE IF EXISTS `rwyt_grade`;

CREATE TABLE `rwyt_grade` (
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
) ENGINE=InnoDB AUTO_INCREMENT=328 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `setting_pph` */

DROP TABLE IF EXISTS `setting_pph`;

CREATE TABLE `setting_pph` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=3;

/*Table structure for table `setting_pph20200305` */

DROP TABLE IF EXISTS `setting_pph20200305`;

CREATE TABLE `setting_pph20200305` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `npwp_pemotong` varchar(120) DEFAULT '',
  `nama_pemotong` varchar(200) DEFAULT '',
  `npwp_pejabat` varchar(120) DEFAULT '',
  `nama_pejabat` varchar(200) DEFAULT '',
  `alamat` varchar(255) DEFAULT '',
  `alamat2` varchar(250) DEFAULT '',
  `telepon` varchar(200) DEFAULT '',
  `email` varchar(200) DEFAULT '',
  `path_ttd` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=2;

/*Table structure for table `setting_pph20250109` */

DROP TABLE IF EXISTS `setting_pph20250109`;

CREATE TABLE `setting_pph20250109` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpp` varchar(120) DEFAULT '',
  `npwp_pemotong` varchar(120) DEFAULT '',
  `nama_pemotong` varchar(200) DEFAULT '',
  `npwp_pejabat` varchar(120) DEFAULT '',
  `nama_pejabat` varchar(200) DEFAULT '',
  `alamat` varchar(255) DEFAULT '',
  `alamat2` varchar(250) DEFAULT '',
  `telepon` varchar(200) DEFAULT '',
  `email` varchar(200) DEFAULT '',
  `path_ttd` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=3;

/*Table structure for table `sppd` */

DROP TABLE IF EXISTS `sppd`;

CREATE TABLE `sppd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=5;

/*Table structure for table `sppd1` */

DROP TABLE IF EXISTS `sppd1`;

CREATE TABLE `sppd1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=6639;

/*Table structure for table `sppd120210303` */

DROP TABLE IF EXISTS `sppd120210303`;

CREATE TABLE `sppd120210303` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsppd` varchar(60) DEFAULT '',
  `tanggal` varchar(10) DEFAULT '',
  `tingkat_sppd` varchar(1) NOT NULL DEFAULT '1',
  `jenis_sppd` varchar(1) DEFAULT '',
  `level_sppd` varchar(1) DEFAULT '',
  `no_sppd` varchar(60) DEFAULT '',
  `nip` varchar(30) DEFAULT '',
  `nama` varchar(200) DEFAULT '',
  `grade` varchar(60) DEFAULT '',
  `jabatan` varchar(250) DEFAULT '',
  `maksud` text,
  `kedudukan` varchar(200) DEFAULT '',
  `tujuan` varchar(200) DEFAULT '',
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
  `approve2` varchar(1) NOT NULL DEFAULT '0',
  `approval2` varchar(120) DEFAULT '',
  `tgl_approve2` varchar(10) DEFAULT '',
  `bayar` varchar(1) NOT NULL DEFAULT '0',
  `tgl_bayar` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idsppd` (`idsppd`)
) AUTO_INCREMENT=3;

/*Table structure for table `sppd120211216` */

DROP TABLE IF EXISTS `sppd120211216`;

CREATE TABLE `sppd120211216` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsppd` varchar(60) DEFAULT '',
  `tanggal` varchar(10) DEFAULT '',
  `tingkat_sppd` varchar(1) NOT NULL DEFAULT '1',
  `jenis_sppd` varchar(1) DEFAULT '',
  `level_sppd` varchar(1) DEFAULT '',
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `idsppd` (`idsppd`)
) AUTO_INCREMENT=445;

/*Table structure for table `sppd120230328` */

DROP TABLE IF EXISTS `sppd120230328`;

CREATE TABLE `sppd120230328` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsppd` varchar(60) DEFAULT '',
  `tanggal` varchar(10) DEFAULT '',
  `tingkat_sppd` varchar(1) NOT NULL DEFAULT '1',
  `jenis_sppd` varchar(1) DEFAULT '',
  `level_sppd` varchar(1) DEFAULT '',
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `idsppd` (`idsppd`)
) AUTO_INCREMENT=2286;

/*Table structure for table `sppd120230328(2)` */

DROP TABLE IF EXISTS `sppd120230328(2)`;

CREATE TABLE `sppd120230328(2)` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsppd` varchar(60) DEFAULT '',
  `tanggal` varchar(10) DEFAULT '',
  `tingkat_sppd` varchar(1) NOT NULL DEFAULT '1',
  `jenis_sppd` varchar(1) DEFAULT '',
  `level_sppd` varchar(1) DEFAULT '',
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `idsppd` (`idsppd`)
) AUTO_INCREMENT=2992;

/*Table structure for table `sppd120230929` */

DROP TABLE IF EXISTS `sppd120230929`;

CREATE TABLE `sppd120230929` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsppd` varchar(60) DEFAULT '',
  `tanggal` varchar(10) DEFAULT '',
  `tingkat_sppd` varchar(1) NOT NULL DEFAULT '1',
  `jenis_sppd` varchar(1) DEFAULT '',
  `level_sppd` varchar(1) DEFAULT '',
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `idsppd` (`idsppd`)
) AUTO_INCREMENT=3169;

/*Table structure for table `sppd120231023` */

DROP TABLE IF EXISTS `sppd120231023`;

CREATE TABLE `sppd120231023` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsppd` varchar(60) DEFAULT '',
  `tanggal` varchar(10) DEFAULT '',
  `tingkat_sppd` varchar(1) NOT NULL DEFAULT '1',
  `jenis_sppd` varchar(1) DEFAULT '',
  `level_sppd` varchar(1) DEFAULT '',
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `idsppd` (`idsppd`)
) AUTO_INCREMENT=3311;

/*Table structure for table `sppd120231208` */

DROP TABLE IF EXISTS `sppd120231208`;

CREATE TABLE `sppd120231208` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsppd` varchar(60) DEFAULT '',
  `tanggal` varchar(10) DEFAULT '',
  `tingkat_sppd` varchar(1) NOT NULL DEFAULT '1',
  `jenis_sppd` varchar(1) DEFAULT '',
  `level_sppd` varchar(1) DEFAULT '',
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `idsppd` (`idsppd`)
) AUTO_INCREMENT=3607;

/*Table structure for table `sppd120231218` */

DROP TABLE IF EXISTS `sppd120231218`;

CREATE TABLE `sppd120231218` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `idsppd` (`idsppd`)
) AUTO_INCREMENT=3645;

/*Table structure for table `sppd120240402` */

DROP TABLE IF EXISTS `sppd120240402`;

CREATE TABLE `sppd120240402` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=4478;

/*Table structure for table `sppd1dummy` */

DROP TABLE IF EXISTS `sppd1dummy`;

CREATE TABLE `sppd1dummy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `docEntry` varchar(30) DEFAULT '',
  `docDate` varchar(10) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idsppd` (`idsppd`)
) AUTO_INCREMENT=3628;

/*Table structure for table `sub_jenis_sppd` */

DROP TABLE IF EXISTS `sub_jenis_sppd`;

CREATE TABLE `sub_jenis_sppd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_sub_sppd` varchar(60) DEFAULT '',
  `nama_sub_sppd` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=5;

/*Table structure for table `suplisi` */

DROP TABLE IF EXISTS `suplisi`;

CREATE TABLE `suplisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=1501;

/*Table structure for table `suplisi20200317` */

DROP TABLE IF EXISTS `suplisi20200317`;

CREATE TABLE `suplisi20200317` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `jumlah_suplisi` double NOT NULL DEFAULT '0',
  `keterangan` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=5;

/*Table structure for table `suplisi20220307` */

DROP TABLE IF EXISTS `suplisi20220307`;

CREATE TABLE `suplisi20220307` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `blthnip` varchar(60) DEFAULT '',
  `gaji` double NOT NULL DEFAULT '0',
  `tunjangan_posisi` double NOT NULL DEFAULT '0',
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
) AUTO_INCREMENT=401;

/*Table structure for table `suplisi20240207` */

DROP TABLE IF EXISTS `suplisi20240207`;

CREATE TABLE `suplisi20240207` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=1191;

/*Table structure for table `suplisi20240219` */

DROP TABLE IF EXISTS `suplisi20240219`;

CREATE TABLE `suplisi20240219` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=1199;

/*Table structure for table `suplisi20240311` */

DROP TABLE IF EXISTS `suplisi20240311`;

CREATE TABLE `suplisi20240311` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=1240;

/*Table structure for table `tanggapan` */

DROP TABLE IF EXISTS `tanggapan`;

CREATE TABLE `tanggapan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_keluhan` int(11) NOT NULL,
  `nip_penanggap` varchar(20) NOT NULL,
  `tanggapan` text NOT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tantiem` */

DROP TABLE IF EXISTS `tantiem`;

CREATE TABLE `tantiem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=9;

/*Table structure for table `template_varcost` */

DROP TABLE IF EXISTS `template_varcost`;

CREATE TABLE `template_varcost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=MyISAM;

/*Table structure for table `thr` */

DROP TABLE IF EXISTS `thr`;

CREATE TABLE `thr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=1647;

/*Table structure for table `thr20210205` */

DROP TABLE IF EXISTS `thr20210205`;

CREATE TABLE `thr20210205` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=883;

/*Table structure for table `thr20230103` */

DROP TABLE IF EXISTS `thr20230103`;

CREATE TABLE `thr20230103` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=1192;

/*Table structure for table `thrlama` */

DROP TABLE IF EXISTS `thrlama`;

CREATE TABLE `thrlama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_thr` varchar(1) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `tahun` varchar(4) DEFAULT '',
  `nip` varchar(30) NOT NULL DEFAULT '',
  `agama` varchar(5) DEFAULT '',
  `aktif` varchar(1) DEFAULT '',
  `tahunnip` varchar(30) DEFAULT '',
  `kd_unit` varchar(5) DEFAULT '',
  `gaji_grade` double NOT NULL DEFAULT '0',
  `honor` double NOT NULL DEFAULT '0',
  `umk` double NOT NULL DEFAULT '0',
  `koefisien` double NOT NULL DEFAULT '1',
  `gaji_umk` double NOT NULL DEFAULT '0',
  `perumahan` double NOT NULL DEFAULT '0',
  `transport` double NOT NULL DEFAULT '0',
  `tunjangan_keahlian` double NOT NULL DEFAULT '0',
  `tunjangan_jabatan` double NOT NULL DEFAULT '0',
  `tunjangan_daerah` double NOT NULL DEFAULT '0',
  `tunjangan_lain` double NOT NULL DEFAULT '0',
  `tunjangan_apresiasi` double NOT NULL DEFAULT '0',
  `kelebihan_jam_kerja` double NOT NULL DEFAULT '0',
  `tunjangan_masa_kerja` double NOT NULL DEFAULT '0',
  `delta` double NOT NULL DEFAULT '0',
  `thp` double NOT NULL DEFAULT '0',
  `jumlah_bulan` double NOT NULL DEFAULT '0',
  `jumlah_thr` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tahunnip` (`tahunnip`)
) ENGINE=MyISAM;

/*Table structure for table `tingkat_sppd` */

DROP TABLE IF EXISTS `tingkat_sppd`;

CREATE TABLE `tingkat_sppd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_tingkat` varchar(1) DEFAULT '',
  `nama_tingkat` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=5;

/*Table structure for table `tunjanganpph` */

DROP TABLE IF EXISTS `tunjanganpph`;

CREATE TABLE `tunjanganpph` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=521;

/*Table structure for table `tunjanganpph20200307` */

DROP TABLE IF EXISTS `tunjanganpph20200307`;

CREATE TABLE `tunjanganpph20200307` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=364;

/*Table structure for table `uang_sppd` */

DROP TABLE IF EXISTS `uang_sppd`;

CREATE TABLE `uang_sppd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blth_proses` varchar(7) DEFAULT '',
  `blth` varchar(7) DEFAULT '',
  `nip` varchar(60) DEFAULT '',
  `jumlah` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

/*Table structure for table `ubah_nip` */

DROP TABLE IF EXISTS `ubah_nip`;

CREATE TABLE `ubah_nip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `niplama` varchar(60) DEFAULT '',
  `nipbaru` varchar(60) DEFAULT '',
  `user` varchar(200) DEFAULT '',
  `waktu` varchar(120) DEFAULT '',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=5;

/*Table structure for table `varcost` */

DROP TABLE IF EXISTS `varcost`;

CREATE TABLE `varcost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=MyISAM;

/*Table structure for table `varcost2` */

DROP TABLE IF EXISTS `varcost2`;

CREATE TABLE `varcost2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_file` varchar(250) DEFAULT '',
  `blth_gaji` varchar(7) DEFAULT '',
  `nip` varchar(20) DEFAULT '',
  `blth_nip` varchar(20) DEFAULT '',
  `nama_tunjanganvar1` varchar(200) DEFAULT '',
  `tunjanganvar1` double NOT NULL DEFAULT '0',
  `nama_tunjanganvar2` varchar(200) DEFAULT '',
  `tunjanganvar2` double NOT NULL DEFAULT '0',
  `nama_tunjanganvar3` varchar(200) DEFAULT '',
  `tunjanganvar3` double NOT NULL DEFAULT '0',
  `nama_potonganvar1` varchar(200) DEFAULT '',
  `potonganvar1` double NOT NULL DEFAULT '0',
  `nama_potonganvar2` varchar(200) DEFAULT '',
  `potonganvar2` double NOT NULL DEFAULT '0',
  `nama_potonganvar3` varchar(200) DEFAULT '',
  `potonganvar3` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blth_nip` (`blth_nip`)
) ENGINE=MyISAM;

/*Table structure for table `version` */

DROP TABLE IF EXISTS `version`;

CREATE TABLE `version` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `os` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `winduan` */

DROP TABLE IF EXISTS `winduan`;

CREATE TABLE `winduan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) AUTO_INCREMENT=21;

/*Table structure for table `v_list_pajak` */

DROP TABLE IF EXISTS `v_list_pajak`;

/*!50001 DROP VIEW IF EXISTS `v_list_pajak` */;
/*!50001 DROP TABLE IF EXISTS `v_list_pajak` */;

/*!50001 CREATE TABLE  `v_list_pajak`(
 `blth` varchar(7) ,
 `nip` varchar(60) 
)*/;

/*Table structure for table `v_sppd` */

DROP TABLE IF EXISTS `v_sppd`;

/*!50001 DROP VIEW IF EXISTS `v_sppd` */;
/*!50001 DROP TABLE IF EXISTS `v_sppd` */;

/*!50001 CREATE TABLE  `v_sppd`(
 `id` int(11) ,
 `idsppd` varchar(60) ,
 `tanggal` varchar(10) ,
 `tingkat_sppd` varchar(1) ,
 `jenis_sppd` varchar(1) ,
 `level_sppd` varchar(1) ,
 `sub_jenis_sppd` varchar(30) ,
 `kd_project_sap` varchar(30) ,
 `nama_project_sap` varchar(250) ,
 `no_sppd` varchar(60) ,
 `nip` varchar(30) ,
 `nama` varchar(200) ,
 `grade` varchar(60) ,
 `jabatan` varchar(250) ,
 `maksud` text ,
 `agenda` text ,
 `kedudukan` varchar(200) ,
 `tujuan` varchar(200) ,
 `jarak` double ,
 `transportasi` varchar(200) ,
 `tgl_awal` varchar(10) ,
 `tgl_akhir` varchar(10) ,
 `hari` double ,
 `kota1a` varchar(200) ,
 `kota2a` varchar(200) ,
 `transporta` varchar(200) ,
 `kota1b` varchar(200) ,
 `kota2b` varchar(200) ,
 `transportb` varchar(200) ,
 `kota1c` varchar(200) ,
 `kota2c` varchar(200) ,
 `transportc` varchar(200) ,
 `kota1d` varchar(200) ,
 `kota2d` varchar(200) ,
 `transportd` varchar(200) ,
 `jenis_tujuan` varchar(200) ,
 `tgl_proses` varchar(10) ,
 `petugas` varchar(120) ,
 `approve1` varchar(1) ,
 `approval1` varchar(120) ,
 `tgl_approve1` varchar(10) ,
 `alasan_reject1` varchar(255) ,
 `approve2` varchar(1) ,
 `approval2` varchar(120) ,
 `tgl_approve2` varchar(10) ,
 `alasan_reject2` varchar(255) ,
 `validasi_biaya` varchar(1) ,
 `tgl_validasi` varchar(10) ,
 `approvesdm` varchar(1) ,
 `approvalsdm` varchar(60) ,
 `tgl_approvesdm` varchar(10) ,
 `alasan_rejectsdm` varchar(255) ,
 `approvebayar` varchar(1) ,
 `approvalbayar` varchar(120) ,
 `tgl_approvebayar` varchar(10) ,
 `alasan_rejectbayar` varchar(255) ,
 `bayar` varchar(1) ,
 `tgl_bayar` varchar(10) ,
 `editing` varchar(1) ,
 `validasi_restitusi` varchar(1) ,
 `tgl_validasi_restitusi` varchar(10) ,
 `bayar_restitusi` varchar(1) ,
 `tgl_bayar_restitusi` varchar(10) ,
 `restitusi` double 
)*/;

/*View structure for view v_list_pajak */

/*!50001 DROP TABLE IF EXISTS `v_list_pajak` */;
/*!50001 DROP VIEW IF EXISTS `v_list_pajak` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_list_pajak` AS select `gaji`.`blth` AS `blth`,`gaji`.`nip` AS `nip` from `gaji` where (`gaji`.`nip` <> '') union select `iks`.`blth` AS `blth`,`iks`.`nip` AS `nip` from `iks` where (`iks`.`nip` <> '') union select `bonus`.`blth` AS `blth`,`bonus`.`nip` AS `nip` from `bonus` where (`bonus`.`nip` <> '') union select `suplisi`.`blth` AS `blth`,`suplisi`.`nip` AS `nip` from `suplisi` where (`suplisi`.`nip` <> '') union select `honorarium_eo`.`blth` AS `blth`,`honorarium_eo`.`nip` AS `nip` from `honorarium_eo` where (`honorarium_eo`.`nip` <> '') union select `winduan`.`blth` AS `blth`,`winduan`.`nip` AS `nip` from `winduan` where (`winduan`.`nip` <> '') union select `pesangon`.`blth` AS `blth`,`pesangon`.`nip` AS `nip` from `pesangon` where (`pesangon`.`nip` <> '') union select `thr`.`blth` AS `blth`,`thr`.`nip` AS `nip` from `thr` where (`thr`.`nip` <> '') union select substr(`sppd`.`tgl_bayar`,1,7) AS `substr(tgl_bayar,1,7)`,`sppd`.`nip` AS `nip` from `sppd` where (`sppd`.`nip` <> '') union select `natura`.`blth` AS `blth`,`natura`.`nip` AS `nip` from `natura` where (`natura`.`nip` <> '') union select `tantiem`.`blth` AS `blth`,`tantiem`.`nip` AS `nip` from `tantiem` where (`tantiem`.`nip` <> '') union select substr(`sppd1`.`tgl_bayar`,1,7) AS `blth`,`sppd1`.`nip` AS `nip` from `sppd1` where ((`sppd1`.`nip` <> '') and (`sppd1`.`tgl_bayar` <> '')) group by `blth`,`sppd1`.`nip` */;

/*View structure for view v_sppd */

/*!50001 DROP TABLE IF EXISTS `v_sppd` */;
/*!50001 DROP VIEW IF EXISTS `v_sppd` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_sppd` AS select `a`.`id` AS `id`,`a`.`idsppd` AS `idsppd`,`a`.`tanggal` AS `tanggal`,`a`.`tingkat_sppd` AS `tingkat_sppd`,`a`.`jenis_sppd` AS `jenis_sppd`,`a`.`level_sppd` AS `level_sppd`,`a`.`sub_jenis_sppd` AS `sub_jenis_sppd`,`a`.`kd_project_sap` AS `kd_project_sap`,`a`.`nama_project_sap` AS `nama_project_sap`,`a`.`no_sppd` AS `no_sppd`,`a`.`nip` AS `nip`,`a`.`nama` AS `nama`,`a`.`grade` AS `grade`,`a`.`jabatan` AS `jabatan`,`a`.`maksud` AS `maksud`,`a`.`agenda` AS `agenda`,`a`.`kedudukan` AS `kedudukan`,`a`.`tujuan` AS `tujuan`,`a`.`jarak` AS `jarak`,`a`.`transportasi` AS `transportasi`,`a`.`tgl_awal` AS `tgl_awal`,`a`.`tgl_akhir` AS `tgl_akhir`,`a`.`hari` AS `hari`,`a`.`kota1a` AS `kota1a`,`a`.`kota2a` AS `kota2a`,`a`.`transporta` AS `transporta`,`a`.`kota1b` AS `kota1b`,`a`.`kota2b` AS `kota2b`,`a`.`transportb` AS `transportb`,`a`.`kota1c` AS `kota1c`,`a`.`kota2c` AS `kota2c`,`a`.`transportc` AS `transportc`,`a`.`kota1d` AS `kota1d`,`a`.`kota2d` AS `kota2d`,`a`.`transportd` AS `transportd`,`a`.`jenis_tujuan` AS `jenis_tujuan`,`a`.`tgl_proses` AS `tgl_proses`,`a`.`petugas` AS `petugas`,`a`.`approve1` AS `approve1`,`a`.`approval1` AS `approval1`,`a`.`tgl_approve1` AS `tgl_approve1`,`a`.`alasan_reject1` AS `alasan_reject1`,`a`.`approve2` AS `approve2`,`a`.`approval2` AS `approval2`,`a`.`tgl_approve2` AS `tgl_approve2`,`a`.`alasan_reject2` AS `alasan_reject2`,`a`.`validasi_biaya` AS `validasi_biaya`,`a`.`tgl_validasi` AS `tgl_validasi`,`a`.`approvesdm` AS `approvesdm`,`a`.`approvalsdm` AS `approvalsdm`,`a`.`tgl_approvesdm` AS `tgl_approvesdm`,`a`.`alasan_rejectsdm` AS `alasan_rejectsdm`,`a`.`approvebayar` AS `approvebayar`,`a`.`approvalbayar` AS `approvalbayar`,`a`.`tgl_approvebayar` AS `tgl_approvebayar`,`a`.`alasan_rejectbayar` AS `alasan_rejectbayar`,`a`.`bayar` AS `bayar`,`a`.`tgl_bayar` AS `tgl_bayar`,`a`.`editing` AS `editing`,`a`.`validasi_restitusi` AS `validasi_restitusi`,`a`.`tgl_validasi_restitusi` AS `tgl_validasi_restitusi`,`a`.`bayar_restitusi` AS `bayar_restitusi`,`a`.`tgl_bayar_restitusi` AS `tgl_bayar_restitusi`,sum(`b`.`nilai`) AS `restitusi` from (`sppd1` `a` left join `biaya_restitusi` `b` on((`a`.`idsppd` = `b`.`idsppd`))) group by `b`.`idsppd` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
