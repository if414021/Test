/*
SQLyog Community v12.12 (64 bit)
MySQL - 10.1.19-MariaDB : Database - kpgw
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kpgw` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `kpgw`;

/*Table structure for table `hrdx_pegawai` */

DROP TABLE IF EXISTS `hrdx_pegawai`;

CREATE TABLE `hrdx_pegawai` (
  `pegawai_id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_old_id` varchar(20) DEFAULT NULL,
  `nama` varchar(135) DEFAULT NULL,
  `nip` varchar(45) DEFAULT NULL,
  `kpt_no` varchar(10) DEFAULT NULL,
  `kbk_id` varchar(20) DEFAULT NULL,
  `ref_kbk_id` int(11) DEFAULT NULL,
  `alias` varchar(9) DEFAULT NULL,
  `posisi` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(60) DEFAULT NULL,
  `tgl_lahir` varchar(60) DEFAULT NULL,
  `agama_id` int(11) DEFAULT NULL,
  `jenis_kelamin_id` int(11) DEFAULT NULL,
  `golongan_darah_id` int(11) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `telepon` varchar(45) DEFAULT NULL,
  `alamat` blob,
  `alamat_libur` varchar(150) DEFAULT NULL,
  `kecamatan` varchar(150) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `kabupaten_id` int(11) DEFAULT NULL,
  `kode_pos` varchar(15) DEFAULT NULL,
  `no_ktp` varchar(255) DEFAULT NULL,
  `email` text,
  `ext_num` char(30) DEFAULT NULL,
  `study_area_1` varchar(50) DEFAULT NULL,
  `study_area_2` varchar(50) DEFAULT NULL,
  `jabatan` char(1) DEFAULT NULL,
  `jabatan_akademik_id` int(11) DEFAULT NULL,
  `gbk_1` int(11) DEFAULT NULL,
  `gbk_2` int(11) DEFAULT NULL,
  `status_ikatan_kerja_pegawai_id` int(11) DEFAULT NULL,
  `status_akhir` char(1) DEFAULT NULL,
  `status_aktif_pegawai_id` int(11) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `nama_bapak` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `status_marital_id` int(11) DEFAULT NULL,
  `nama_p` varchar(50) DEFAULT NULL,
  `tgl_lahir_p` date DEFAULT NULL,
  `tmp_lahir_p` varchar(50) DEFAULT NULL,
  `pekerjaan_ortu` varchar(100) DEFAULT NULL,
  `kuota_cuti_tahunan` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `struktur_jabatan_id` int(11) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`pegawai_id`),
  KEY `Const_pegawai_user` (`user_id`),
  KEY `Const_pegawai_role` (`role_id`),
  KEY `Const_pegawai_jabatan` (`struktur_jabatan_id`),
  KEY `Const_pegawai_kuota` (`kuota_cuti_tahunan`),
  CONSTRAINT `Const_pegawai_jabatan` FOREIGN KEY (`struktur_jabatan_id`) REFERENCES `inst_struktur_jabatan` (`struktur_jabatan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Const_pegawai_role` FOREIGN KEY (`role_id`) REFERENCES `sysx_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Const_pegawai_user` FOREIGN KEY (`user_id`) REFERENCES `sysx_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `hrdx_pegawai` */

insert  into `hrdx_pegawai`(`pegawai_id`,`profile_old_id`,`nama`,`nip`,`kpt_no`,`kbk_id`,`ref_kbk_id`,`alias`,`posisi`,`tempat_lahir`,`tgl_lahir`,`agama_id`,`jenis_kelamin_id`,`golongan_darah_id`,`hp`,`telepon`,`alamat`,`alamat_libur`,`kecamatan`,`kota`,`kabupaten_id`,`kode_pos`,`no_ktp`,`email`,`ext_num`,`study_area_1`,`study_area_2`,`jabatan`,`jabatan_akademik_id`,`gbk_1`,`gbk_2`,`status_ikatan_kerja_pegawai_id`,`status_akhir`,`status_aktif_pegawai_id`,`tanggal_masuk`,`tanggal_keluar`,`nama_bapak`,`nama_ibu`,`status`,`status_marital_id`,`nama_p`,`tgl_lahir_p`,`tmp_lahir_p`,`pekerjaan_ortu`,`kuota_cuti_tahunan`,`user_id`,`role_id`,`struktur_jabatan_id`,`deleted`,`deleted_at`,`deleted_by`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (37,NULL,'Amos Sitorus','11414029',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'if414029@students.del.ac.id',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,12,41,1,10,0,NULL,NULL,NULL,NULL,NULL,NULL),(38,NULL,'Nepy Gulo','11414019',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'if414019@students.del.ac.id',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,42,2,9,0,NULL,NULL,NULL,NULL,NULL,NULL),(39,NULL,'Eduardo Silalahi','11414021',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'if414021@students.del.ac.id',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,12,43,3,2,0,NULL,NULL,NULL,NULL,NULL,NULL),(40,NULL,'Dina','11414010',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'if414010@students.del.ac.id',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,12,44,4,4,0,NULL,NULL,NULL,NULL,NULL,NULL),(41,NULL,'Rodes Sirait','11414025',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'if414025@students.del.ac.id',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,12,45,2,6,0,NULL,NULL,NULL,NULL,NULL,NULL),(42,NULL,'Rikky Salo','11414008',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'if414008@students.del.ac.id',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,12,46,2,9,0,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `hrdx_r_kuota_cuti_tahunan` */

DROP TABLE IF EXISTS `hrdx_r_kuota_cuti_tahunan`;

CREATE TABLE `hrdx_r_kuota_cuti_tahunan` (
  `kuota_cuti_tahunan_id` int(11) NOT NULL AUTO_INCREMENT,
  `lama_bekerja_min` int(11) DEFAULT NULL,
  `lama_bekerja_max` int(11) DEFAULT NULL,
  `kuota` varchar(20) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`kuota_cuti_tahunan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `hrdx_r_kuota_cuti_tahunan` */

insert  into `hrdx_r_kuota_cuti_tahunan`(`kuota_cuti_tahunan_id`,`lama_bekerja_min`,`lama_bekerja_max`,`kuota`,`satuan`,`deleted`,`deleted_at`,`deleted_by`,`updated_at`,`updated_by`,`created_at`,`created_by`) values (1,NULL,NULL,'10 Hari',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL),(2,NULL,NULL,'11 Hari',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL),(3,NULL,NULL,'12 Hari',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL),(4,NULL,NULL,'13 Hari',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL),(5,NULL,NULL,'14 Hari',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL),(6,NULL,NULL,'15 Hari',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL),(7,NULL,NULL,'16 Hari',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `inst_struktur_jabatan` */

DROP TABLE IF EXISTS `inst_struktur_jabatan`;

CREATE TABLE `inst_struktur_jabatan` (
  `struktur_jabatan_id` int(11) NOT NULL AUTO_INCREMENT,
  `instansi_id` int(11) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `inisial` varchar(45) DEFAULT NULL,
  `is_multi_tenant` tinyint(1) DEFAULT '0',
  `is_unit` tinyint(1) DEFAULT '0',
  `deleted` tinyint(1) DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `updated_by` varbinary(32) DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`struktur_jabatan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `inst_struktur_jabatan` */

insert  into `inst_struktur_jabatan`(`struktur_jabatan_id`,`instansi_id`,`jabatan`,`parent`,`inisial`,`is_multi_tenant`,`is_unit`,`deleted`,`deleted_at`,`deleted_by`,`updated_by`,`created_by`) values (1,NULL,'Rektor',NULL,NULL,0,0,0,NULL,NULL,NULL,NULL),(2,NULL,'Wakil Rektor Bidang Keuangan dan Sumber Daya\r',NULL,NULL,0,0,0,NULL,NULL,NULL,NULL),(3,NULL,'Wakil Rektor Bidang Kemitraan, Penelitian dan Perencanaan, Pengembangan',NULL,NULL,0,0,0,NULL,NULL,NULL,NULL),(4,NULL,'Wakil Rektor Bidang Akademik dan Kemahasiswaan',NULL,NULL,0,0,0,NULL,NULL,NULL,NULL),(5,NULL,'Koord Akademik dan Kemahasiswaan\r\n',NULL,NULL,0,0,0,NULL,NULL,NULL,NULL),(6,NULL,'Ka.Prodi Teknik Informatika\r\n',NULL,NULL,0,0,0,NULL,NULL,NULL,NULL),(7,NULL,'Ka.Prodi Sistem Informasi\r\n',NULL,NULL,0,0,0,NULL,NULL,NULL,NULL),(8,NULL,'Ka.Prodi Teknik Elektro\r\n',NULL,NULL,0,0,0,NULL,NULL,NULL,NULL),(9,NULL,'Dosen',NULL,NULL,0,0,0,NULL,NULL,NULL,NULL),(10,0,'HRD',0,NULL,0,0,0,NULL,NULL,NULL,NULL),(11,NULL,'Sekretaris/Staff Administrasi',NULL,NULL,0,0,0,NULL,NULL,NULL,NULL),(12,NULL,'Asisten Dosen',NULL,NULL,0,0,0,NULL,NULL,NULL,NULL),(13,NULL,'Staff Perpustakaan',NULL,NULL,0,0,0,NULL,NULL,NULL,NULL),(14,NULL,'Staff Kerohanian',NULL,NULL,0,0,0,NULL,NULL,NULL,NULL),(15,NULL,'Staff Keuangan',NULL,NULL,0,0,0,NULL,NULL,NULL,NULL),(16,NULL,'Staff Inventory',NULL,NULL,0,0,0,NULL,NULL,NULL,NULL),(18,NULL,'Staff LPPM',NULL,NULL,0,0,0,NULL,NULL,NULL,NULL),(19,NULL,'Staff Maintenance Teknik',NULL,NULL,0,0,0,NULL,NULL,NULL,NULL),(20,NULL,'Staff Duktek',NULL,NULL,0,0,0,NULL,NULL,NULL,NULL),(21,NULL,'Staff WR3',NULL,NULL,0,0,0,NULL,NULL,NULL,NULL),(22,NULL,'Dokter Keluarga',NULL,NULL,0,0,0,NULL,NULL,NULL,NULL),(23,NULL,'Suster Klinik',NULL,NULL,0,0,0,NULL,NULL,NULL,NULL),(24,NULL,'Bapak Asrama',NULL,NULL,0,0,0,NULL,NULL,NULL,NULL),(25,NULL,'Ibu Asrama',NULL,NULL,0,0,0,NULL,NULL,NULL,NULL),(26,NULL,'Abang Asrama',NULL,NULL,0,0,0,NULL,NULL,NULL,NULL),(27,NULL,'Ibu Asrama',NULL,NULL,0,0,0,NULL,NULL,NULL,NULL);

/*Table structure for table `kpgw_laporan` */

DROP TABLE IF EXISTS `kpgw_laporan`;

CREATE TABLE `kpgw_laporan` (
  `laporan_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `surat_tugas_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `file_laporan` text,
  `tanggal_pelaporan` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`laporan_id`),
  KEY `Const_laporan_tugas` (`surat_tugas_id`),
  KEY `Const_laporan_user` (`user_id`),
  CONSTRAINT `Const_laporan_tugas` FOREIGN KEY (`surat_tugas_id`) REFERENCES `kpgw_surat_tugas` (`surat_tugas_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Const_laporan_user` FOREIGN KEY (`user_id`) REFERENCES `sysx_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpgw_laporan` */

/*Table structure for table `kpgw_r_kategori_surat_cuti` */

DROP TABLE IF EXISTS `kpgw_r_kategori_surat_cuti`;

CREATE TABLE `kpgw_r_kategori_surat_cuti` (
  `kategori_surat_cuti_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `desc` varchar(30) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`kategori_surat_cuti_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `kpgw_r_kategori_surat_cuti` */

insert  into `kpgw_r_kategori_surat_cuti`(`kategori_surat_cuti_id`,`desc`,`deleted`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values (1,'Cuti Tahunan',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'Cuti Nikah',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'Cuti Melahirkan',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'Cuti Kelahiran',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'Cuti Kedukaan',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'Cuti Kesukaan',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'Cuti di luar tanggungan',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'Izin',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'Sakit',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'Izin di luar tanggungan',NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `kpgw_r_kategori_surat_tugas` */

DROP TABLE IF EXISTS `kpgw_r_kategori_surat_tugas`;

CREATE TABLE `kpgw_r_kategori_surat_tugas` (
  `kategori_surat_tugas_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `desc` varchar(30) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`kategori_surat_tugas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `kpgw_r_kategori_surat_tugas` */

insert  into `kpgw_r_kategori_surat_tugas`(`kategori_surat_tugas_id`,`desc`,`deleted`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values (1,'Akademik',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'Undangan',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'Kepanitiaan',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'LPPM',NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `kpgw_r_signer` */

DROP TABLE IF EXISTS `kpgw_r_signer`;

CREATE TABLE `kpgw_r_signer` (
  `signer_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `desc` varchar(30) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`signer_id`),
  KEY `Const_signer_user` (`user_id`),
  CONSTRAINT `Const_signer_user` FOREIGN KEY (`user_id`) REFERENCES `sysx_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `kpgw_r_signer` */

insert  into `kpgw_r_signer`(`signer_id`,`desc`,`user_id`,`deleted`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values (1,'SDM',43,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'LPPM',44,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `kpgw_r_supir` */

DROP TABLE IF EXISTS `kpgw_r_supir`;

CREATE TABLE `kpgw_r_supir` (
  `supir_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `desc` varchar(30) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`supir_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpgw_r_supir` */

/*Table structure for table `kpgw_r_transportasi` */

DROP TABLE IF EXISTS `kpgw_r_transportasi`;

CREATE TABLE `kpgw_r_transportasi` (
  `transportasi_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `desc` varchar(30) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`transportasi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `kpgw_r_transportasi` */

insert  into `kpgw_r_transportasi`(`transportasi_id`,`desc`,`deleted`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values (1,'Kendaraan Del',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'Kendaraan Umum',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'None',NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `kpgw_surat_cuti` */

DROP TABLE IF EXISTS `kpgw_surat_cuti`;

CREATE TABLE `kpgw_surat_cuti` (
  `surat_cuti_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `user_id` int(11) DEFAULT NULL,
  `atasan_pegawai` int(11) DEFAULT NULL,
  `kategori_surat_cuti_id` int(11) DEFAULT NULL,
  `tanggal_berangkat` datetime DEFAULT NULL,
  `tanggal_kembali` datetime DEFAULT NULL,
  `alasan` varchar(255) DEFAULT NULL,
  `pengalihan_tugas` varchar(255) DEFAULT NULL,
  `jumlah_cuti` int(11) DEFAULT NULL,
  `status_approvingAtasan` varchar(20) DEFAULT NULL,
  `status_approvingWR` varchar(20) DEFAULT NULL,
  `status_broadcast` varchar(20) DEFAULT NULL,
  `tanda_tangan_id` int(11) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`surat_cuti_id`),
  KEY `Const_cuti_user` (`user_id`),
  KEY `Const_cuti_kategori` (`kategori_surat_cuti_id`),
  KEY `Const_cuti_pegawai` (`atasan_pegawai`),
  KEY `COnst_cuti_tanda_tangan` (`tanda_tangan_id`),
  CONSTRAINT `COnst_cuti_tanda_tangan` FOREIGN KEY (`tanda_tangan_id`) REFERENCES `sysx_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Const_cuti_kategori` FOREIGN KEY (`kategori_surat_cuti_id`) REFERENCES `kpgw_r_kategori_surat_cuti` (`kategori_surat_cuti_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Const_cuti_pegawai` FOREIGN KEY (`atasan_pegawai`) REFERENCES `sysx_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Const_cuti_user` FOREIGN KEY (`user_id`) REFERENCES `sysx_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `kpgw_surat_cuti` */

insert  into `kpgw_surat_cuti`(`surat_cuti_id`,`user_id`,`atasan_pegawai`,`kategori_surat_cuti_id`,`tanggal_berangkat`,`tanggal_kembali`,`alasan`,`pengalihan_tugas`,`jumlah_cuti`,`status_approvingAtasan`,`status_approvingWR`,`status_broadcast`,`tanda_tangan_id`,`deleted`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values (16,42,45,2,'2017-06-08 02:30:01','2017-06-10 14:30:01','jk','ju',3,'Approved','Final_Approving','Not Submitted Yet',43,NULL,'2017-06-07 00:00:00','nepy123',NULL,NULL,NULL,NULL);

/*Table structure for table `kpgw_surat_tugas` */

DROP TABLE IF EXISTS `kpgw_surat_tugas`;

CREATE TABLE `kpgw_surat_tugas` (
  `surat_tugas_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `user_id` int(11) DEFAULT NULL,
  `kategori_surat_tugas_id` int(11) DEFAULT NULL,
  `transportasi_id` int(11) DEFAULT NULL,
  `supir_id` int(11) DEFAULT NULL,
  `signer_id` int(11) DEFAULT NULL,
  `tanggal_berangkat` datetime DEFAULT NULL,
  `tanggal_kembali` datetime DEFAULT NULL,
  `tanggal_mulai` datetime DEFAULT NULL,
  `tanggal_selesai` datetime DEFAULT NULL,
  `alasan_tugas` varchar(255) DEFAULT NULL,
  `tujuan` varchar(50) DEFAULT NULL,
  `rute_berangkat` varchar(50) DEFAULT NULL,
  `rute_kembali` varchar(50) DEFAULT NULL,
  `allowance` varchar(50) DEFAULT NULL,
  `lokasi_inap` varchar(30) DEFAULT NULL,
  `dosen_pendamping` varchar(50) DEFAULT NULL,
  `transportasi_berangkat` int(11) DEFAULT NULL,
  `transportasi_kembali` int(11) DEFAULT NULL,
  `kebutuhan_khusus` varchar(255) DEFAULT NULL,
  `tanggal_pengajuan` datetime DEFAULT NULL,
  `rincian_perjalanan_berangkat` varchar(255) DEFAULT NULL,
  `rincian_perjalanan_kembali` varchar(255) DEFAULT NULL,
  `status_approvingHRD` varchar(20) DEFAULT 'Requesting',
  `status_approvingWR` varchar(20) DEFAULT 'Waiting',
  `status_laporan` varchar(20) DEFAULT NULL,
  `status_broadcast` varchar(20) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`surat_tugas_id`),
  KEY `Const_tugas_user` (`user_id`),
  KEY `Const_tugas_kategori` (`kategori_surat_tugas_id`),
  KEY `Const_tugas_transportasi` (`transportasi_id`),
  KEY `Const_tugas_supir` (`supir_id`),
  KEY `Const_tugas_signer` (`signer_id`),
  KEY `Const_tugas_berangkat` (`transportasi_berangkat`),
  KEY `Const_tugas_kembali` (`transportasi_kembali`),
  CONSTRAINT `Const_tugas_berangkat` FOREIGN KEY (`transportasi_berangkat`) REFERENCES `kpgw_r_transportasi` (`transportasi_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Const_tugas_kategori` FOREIGN KEY (`kategori_surat_tugas_id`) REFERENCES `kpgw_r_kategori_surat_tugas` (`kategori_surat_tugas_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Const_tugas_kembali` FOREIGN KEY (`transportasi_kembali`) REFERENCES `kpgw_r_transportasi` (`transportasi_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Const_tugas_signer` FOREIGN KEY (`signer_id`) REFERENCES `kpgw_r_signer` (`signer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Const_tugas_supir` FOREIGN KEY (`supir_id`) REFERENCES `kpgw_r_supir` (`supir_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Const_tugas_transportasi` FOREIGN KEY (`transportasi_id`) REFERENCES `kpgw_r_transportasi` (`transportasi_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Const_tugas_user` FOREIGN KEY (`user_id`) REFERENCES `sysx_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `kpgw_surat_tugas` */

insert  into `kpgw_surat_tugas`(`surat_tugas_id`,`user_id`,`kategori_surat_tugas_id`,`transportasi_id`,`supir_id`,`signer_id`,`tanggal_berangkat`,`tanggal_kembali`,`tanggal_mulai`,`tanggal_selesai`,`alasan_tugas`,`tujuan`,`rute_berangkat`,`rute_kembali`,`allowance`,`lokasi_inap`,`dosen_pendamping`,`transportasi_berangkat`,`transportasi_kembali`,`kebutuhan_khusus`,`tanggal_pengajuan`,`rincian_perjalanan_berangkat`,`rincian_perjalanan_kembali`,`status_approvingHRD`,`status_approvingWR`,`status_laporan`,`status_broadcast`,`deleted`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values (26,42,1,NULL,NULL,2,'2017-06-06 09:00:49','2017-06-10 09:00:49','2017-06-06 13:00:49','2017-06-09 09:00:49','Karya Ilmiah.','Medan','IT Del - Medan','Medan - IT Del',NULL,'Medan Hotel','45',1,2,'Testing','2017-06-05 00:00:00','Tes','Tes','Approved','Final_Approving','Not Submitted Yet','Sudah Di-broadcast',NULL,'2017-06-05 00:00:00','nepy123',NULL,NULL,NULL,NULL),(28,42,2,NULL,NULL,NULL,'2017-06-07 06:30:34','2017-06-10 07:30:34','2017-06-07 14:25:34','2017-06-09 06:05:34','Tes','Medan','IT Del - Medan','Medan - IT Del',NULL,'Medan Hotel','46',1,2,'Tes','2017-06-06 00:00:00','Tes','Tes','Approved','Waiting','Not Submitted Yet','Not Submitted Yet',NULL,'2017-06-06 00:00:00','nepy123',NULL,NULL,NULL,NULL),(29,42,2,NULL,NULL,NULL,'2017-06-08 06:30:18','2017-06-13 10:25:18','2017-06-09 10:05:18','2017-06-12 08:25:18','Tes','Medan','IT Del - Medan','Medan - IT Del',NULL,'Medan Hotel','46',1,2,'Tes','2017-06-07 00:00:00','Tes','Tes','Reject','Waiting','Not Submitted Yet','Not Submitted Yet',NULL,'2017-06-07 00:00:00','nepy123','2017-06-07 00:00:00','nepy123',NULL,NULL),(33,41,1,NULL,NULL,NULL,'2017-06-08 16:05:17','2017-06-29 14:25:17','2017-06-09 02:10:17','2017-06-10 13:45:17','dsa','dsa','IT Del - Medan','dsa',NULL,'dsa','',1,2,'dsa','2017-06-07 00:00:00','dsa','dsa','Approved','Waiting','Not Submitted Yet','Not Submitted Yet',NULL,'2017-06-07 00:00:00','amos123',NULL,NULL,NULL,NULL),(34,41,2,NULL,NULL,NULL,'2017-06-08 10:30:35','2017-06-23 16:45:36','2017-06-09 16:10:36','2017-06-22 16:00:36','dsa','dsa','dsa','dsa',NULL,'dsa','',1,2,'dsa','2017-06-07 00:00:00','dsa','dsa','Reject','Waiting','Not Submitted Yet','Not Submitted Yet',NULL,'2017-06-07 00:00:00','amos123',NULL,NULL,NULL,NULL);

/*Table structure for table `migration` */

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `migration` */

insert  into `migration`(`version`,`apply_time`) values ('m000000_000000_base',1491806037),('m130524_201442_init',1491806051);

/*Table structure for table `sysx_role` */

DROP TABLE IF EXISTS `sysx_role`;

CREATE TABLE `sysx_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `sysx_role` */

insert  into `sysx_role`(`role_id`,`parent_id`,`name`,`desc`,`created_at`,`updated_at`,`created_by`,`updated_by`,`deleted`,`deleted_at`,`deleted_by`) values (1,NULL,NULL,'HRD',NULL,NULL,NULL,NULL,0,NULL,NULL),(2,NULL,NULL,'Pegawai',NULL,NULL,NULL,NULL,0,NULL,NULL),(3,NULL,NULL,'WR2',NULL,NULL,NULL,NULL,0,NULL,NULL),(4,NULL,NULL,'WR3',NULL,NULL,NULL,NULL,0,NULL,NULL);

/*Table structure for table `sysx_user` */

DROP TABLE IF EXISTS `sysx_user`;

CREATE TABLE `sysx_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) DEFAULT NULL,
  `sysx_key` varchar(32) DEFAULT NULL,
  `authentication_method_id` int(11) DEFAULT '1',
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

/*Data for the table `sysx_user` */

insert  into `sysx_user`(`user_id`,`profile_id`,`sysx_key`,`authentication_method_id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`created_by`,`updated_by`,`deleted`,`deleted_at`,`deleted_by`) values (41,NULL,NULL,1,'amos123','Peo4uOQfTegh5LvXpDpSZGqDmc5k7s-S','$2y$13$Oo9inLfX/JQFx9SlHFgdvejgNQSCx0w.zUwK6s2ERZz1UCoF8A01a',NULL,'if414029@students.del.ac.id',10,NULL,NULL,NULL,NULL,0,NULL,NULL),(42,NULL,NULL,1,'nepy123','q35YUSAGJFQ2ZNtHbCpqV77YPiuI58lF','$2y$13$8hjuvCMS6Crqs74Y28Ahn.p6H2a55Zz7cAzBXN5xIZwTFG17sUJmC',NULL,'if414019@students.del.ac.id',10,NULL,NULL,NULL,NULL,0,NULL,NULL),(43,NULL,NULL,1,'eduardo123','WfGTlMeW93dRHXua5n6h7S6_Q-YIvVXi','$2y$13$AK7IfXdlZ6Sedvqt67z/t.Jz1C0hchLYK8A1i9cERjm4Y4KFndFoa',NULL,'if414021@students.del.ac.id',10,NULL,NULL,NULL,NULL,0,NULL,NULL),(44,NULL,NULL,1,'dina123','Fur9HST4tz_j7k3EY5WNBo2H5vGA3jIp','$2y$13$wdRyItJPOn9w.1A04ECuc.bybUlFZk/.JC79JDpWqT64CA20S3yrW',NULL,'if414010@students.del.ac.id',10,NULL,NULL,NULL,NULL,0,NULL,NULL),(45,NULL,NULL,1,'rodes123','D_VA8yWr1iFvZKRChC8fh4yuOVcrXNOi','$2y$13$o68NAls8JaJdUapHk5d/eekilXD5dOL7d2L6nz1oBsYPDbosRF/Um',NULL,'if414025@students.del.ac.id',10,NULL,NULL,NULL,NULL,0,NULL,NULL),(46,NULL,NULL,1,'rikky123','1uhZDDBhLuftA9lGWAozmIV_IAPrzLf1','$2y$13$cWfqFF4Wa5euzKQifD1gyuYz/xq1TJgM0iF6yc5wFPxue2eXMhXVi',NULL,'if414008@students.del.ac.id',10,NULL,NULL,NULL,NULL,0,NULL,NULL),(47,NULL,NULL,1,'REKTOR123','SR8PkijG_hnrvS7MAhe3d8SpUT5OPdCF','$2y$13$DdsaGGeZ.1rxxiFxX4P2/OrANlf6pTRDIu3Vxy0.HXFtFLZ4PNkrG',NULL,'if414029@students.del.ac.id',10,NULL,NULL,NULL,NULL,0,NULL,NULL),(48,NULL,NULL,1,'Tes','d-4tei2-aQPwmBQqBd2KlrlIPL_I5sUf','$2y$13$JoW7IVJXfHFWmav8Op2VS.73Wtn25fQ2UWcauEnqRiZtJ5rt3aHv.',NULL,'if414001@students.del.ac.id',10,NULL,NULL,NULL,NULL,0,NULL,NULL),(49,NULL,NULL,1,'teste','8o-wEllR6q1AGoY921TwKCs-C-0PtBgs','$2y$13$PPQdjmw.Hbb3IQ9FKb.hS.ani/2DAQDnEZq9IaelJxBPs/grto.HK',NULL,'if414010@students.del.ac.id',10,NULL,NULL,NULL,NULL,0,NULL,NULL),(50,NULL,NULL,1,'dsafag','gM2pI7Nt8ujNhkpyk9lJzp0GHzcI9zsW','$2y$13$X4LcKFtzAUoidMlTUlVZ2uWBoaxEUqq8tNHkyOQfRYPYs01uidMlK',NULL,'if414010@students.del.ac.id',10,NULL,NULL,NULL,NULL,0,NULL,NULL),(51,NULL,NULL,1,'fsafasf','AUph7AbpGlBGJmrDeT-3VPj90jV8GMSM','$2y$13$UqWdRCwQrC24KIDEQrrvje7N.eCs28W3ZrbJ3AA7jnfoYfkc6W7R6',NULL,'if414029@students.del.ac.id',10,NULL,NULL,NULL,NULL,0,NULL,NULL),(52,NULL,NULL,1,'dsadsa','qr9jLQO8Vtbpu_HWlRzPfEce9_H_Ce3K','$2y$13$dUYgVmDSpbs1A68/KpPNluRz87mctw75PtcTDMm.mOPXA.E1qZXOK',NULL,'if414029@students.del.ac.id',10,NULL,NULL,NULL,NULL,0,NULL,NULL),(53,NULL,NULL,1,'rqqrda','qGY6jVnRJ7FewpzxDBfQG0vyMah6EkET','$2y$13$bfwfa5r3HbrsORZeXBRoqeMLSi3xTkPNcTQIMeyV2HWUY2RwiTmL.',NULL,'if414029@students.del.ac.id',10,NULL,NULL,NULL,NULL,0,NULL,NULL);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`) values (1,'admin','bNq5pAfXbJ4PYeaKvxE3uv8wQTeZAsMA','$2y$13$OG6xPUtBPuVKvUwrnIisa.olgZcdM25ujJxrqNDL6TnFEvDDxl1Yq',NULL,'admin@gmail.com',10,1492681402,1492681402);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
