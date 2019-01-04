/*
SQLyog Ultimate v12.4.1 (64 bit)
MySQL - 10.1.10-MariaDB : Database - smartrehab
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`smartrehab` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `smartrehab`;

/*Table structure for table `agama` */

DROP TABLE IF EXISTS `agama`;

CREATE TABLE `agama` (
  `id_agama` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `nama_agama` varchar(10) NOT NULL,
  PRIMARY KEY (`id_agama`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `agama` */

insert  into `agama`(`id_agama`,`nama_agama`) values 
(1,'ISLAM'),
(2,'PROTESTAN'),
(3,'KATOLIK'),
(4,'HINDU'),
(5,'BUDDHA'),
(6,'KONG HU CU');

/*Table structure for table `frekuensi` */

DROP TABLE IF EXISTS `frekuensi`;

CREATE TABLE `frekuensi` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `frekuensi` */

insert  into `frekuensi`(`id`,`keterangan`) values 
(1,'COBA-COBA'),
(2,'TERATUR PAKAI'),
(3,'REKREASI'),
(4,'SITUASIONAL');

/*Table structure for table `jenis_narkoba` */

DROP TABLE IF EXISTS `jenis_narkoba`;

CREATE TABLE `jenis_narkoba` (
  `id_jenis_narkoba` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nama_narkoba` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_narkoba`),
  UNIQUE KEY `nama_narkoba` (`nama_narkoba`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `jenis_narkoba` */

insert  into `jenis_narkoba`(`id_jenis_narkoba`,`nama_narkoba`) values 
(23,'Amfetamin(Ekstasi) uhu'),
(22,'Amfetamin(Ekstasi) uhuy'),
(4,'Amfetamin(Ekstasi)cuhuy'),
(21,'Amfetamin(Ekstasiiiii)'),
(25,'anggrek'),
(6,'Benzodiazepin/BDZ'),
(2,'Heroin'),
(24,'Heroinxyz'),
(7,'Inhalansia'),
(9,'Kodein'),
(5,'Kokain'),
(14,'LSD'),
(13,'MDMA'),
(17,'Metakualon'),
(16,'Metamfetamin'),
(11,'Methadon'),
(1,'Morfin'),
(12,'Naltrexon'),
(19,'nambah'),
(20,'ope'),
(3,'Opium(Ganja,Shabu)'),
(10,'Petidin'),
(8,'Solven'),
(15,'STP'),
(26,'testtest'),
(18,'Zat-zat lain(thinner dsb.)');

/*Table structure for table `konseling` */

DROP TABLE IF EXISTS `konseling`;

CREATE TABLE `konseling` (
  `id_konseling` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `konseling_ke` tinyint(1) unsigned DEFAULT NULL,
  `id_pasien` tinyint(1) unsigned DEFAULT NULL,
  `id_konselor` tinyint(2) unsigned DEFAULT NULL,
  `masalah_motivasi` text,
  `hal_yg_menghambat_penyelesaian` text,
  `hal_yg_mendukung_penyelesaian` text,
  `rencana_tindak_lanjut` text,
  `tanggal_kedatangan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_konseling`),
  KEY `id_pasien` (`id_pasien`),
  KEY `id_konselor` (`id_konselor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `konseling` */

insert  into `konseling`(`id_konseling`,`konseling_ke`,`id_pasien`,`id_konselor`,`masalah_motivasi`,`hal_yg_menghambat_penyelesaian`,`hal_yg_mendukung_penyelesaian`,`rencana_tindak_lanjut`,`tanggal_kedatangan`,`update_on`) values 
(1,1,2,1,'TEST','TEST','TEST','TEST','2018-09-17 19:50:03',NULL);

/*Table structure for table `pasien` */

DROP TABLE IF EXISTS `pasien`;

CREATE TABLE `pasien` (
  `id_pasien` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `id` varchar(15) NOT NULL,
  `jenis_id` enum('KTP','SIM','KTM','PELAJAR') DEFAULT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` enum('LAKI-LAKI','PEREMPUAN') DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(27) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` tinytext,
  `id_provinsi` tinyint(2) unsigned DEFAULT NULL,
  `id_agama` tinyint(1) unsigned DEFAULT NULL,
  `suku` varchar(20) DEFAULT NULL,
  `goldar` enum('A','B','AB','O') DEFAULT NULL,
  `pend_terakhir` enum('SD','SMP','SMA','S1','S2','S3') DEFAULT NULL,
  `pekerjaan` varchar(20) DEFAULT NULL,
  `menikah` tinyint(1) DEFAULT NULL,
  `nama_pasangan` varchar(30) DEFAULT NULL,
  `nama_ayah` varchar(30) DEFAULT NULL,
  `nama_ibu` varchar(30) DEFAULT NULL,
  `nomer_telp_keluarga` varchar(20) DEFAULT NULL,
  `alamat_keluarga` tinytext,
  `id_sumber_pasien` tinyint(1) unsigned DEFAULT NULL,
  `id_sumber_biaya` tinyint(1) unsigned DEFAULT NULL,
  `no_rekam_medis` varchar(20) DEFAULT NULL,
  `mulai_pakai` varchar(20) DEFAULT NULL,
  `terakhir_pakai` varchar(20) DEFAULT NULL,
  `cara_pakai` tinytext,
  `frekuensi` tinytext,
  `pernah_rehabilitasi` tinyint(1) DEFAULT NULL,
  `tempat_rehabilitasi` tinytext,
  `status_rawat` enum('JALAN','INAP') DEFAULT NULL,
  `lama_rawat` tinytext,
  `email` varchar(40) DEFAULT NULL,
  `tanggal_kedatangan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `notif_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sudah_verifikasi` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_pasien`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_pasien` (`id_pasien`),
  KEY `id_pasien_2` (`id_pasien`),
  KEY `id_sumber_pasien` (`id_sumber_pasien`),
  KEY `id_sumber_biaya` (`id_sumber_biaya`),
  KEY `id_agama` (`id_agama`),
  KEY `id_provinsi` (`id_provinsi`),
  CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`id_sumber_pasien`) REFERENCES `sumber_pasien` (`id_sumber_pasien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pasien_ibfk_2` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id_agama`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pasien_ibfk_3` FOREIGN KEY (`id_sumber_biaya`) REFERENCES `sumber_biaya` (`id_sumber_biaya`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pasien_ibfk_4` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id_provinsi`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `pasien` */

insert  into `pasien`(`id_pasien`,`id`,`jenis_id`,`nama`,`jenis_kelamin`,`no_telp`,`tempat_lahir`,`tgl_lahir`,`alamat`,`id_provinsi`,`id_agama`,`suku`,`goldar`,`pend_terakhir`,`pekerjaan`,`menikah`,`nama_pasangan`,`nama_ayah`,`nama_ibu`,`nomer_telp_keluarga`,`alamat_keluarga`,`id_sumber_pasien`,`id_sumber_biaya`,`no_rekam_medis`,`mulai_pakai`,`terakhir_pakai`,`cara_pakai`,`frekuensi`,`pernah_rehabilitasi`,`tempat_rehabilitasi`,`status_rawat`,`lama_rawat`,`email`,`tanggal_kedatangan`,`update_on`,`notif_status`,`sudah_verifikasi`) values 
(1,'120983091283091','SIM','testAja','LAKI-LAKI','09809809','','0000-00-00','',NULL,3,'JAWA','A','SMA','JKJKJKJKJKJK',0,NULL,'','','','',2,3,NULL,'16/09/2018','16/09/2018','','REKREASI',0,NULL,NULL,NULL,'','2018-09-16 13:51:39','2018-09-16 14:04:26',1,0),
(2,'09890809809809','KTP','sUGENG','PEREMPUAN','0912830918230','sjfhskjfhkdj','2017-04-04','kjhjkhkjhkjhkjh',11,3,'kjhkjhkjh','A','SMA','jhkjhkjhj',0,'','kjhkjhkjhk','hgjhgjhgjh','8098098098','jkjhkjhkjhkjhljhkjhkjhlkjhkj kjh kjhkj kjh lkjh kljh lkj',2,3,'','&lt;div style=','&lt;div style=','kgfghfgfgh','hjghjkgjh',0,'',NULL,'','sjhkajhdkj@kjshkjdfh.com','2018-09-16 14:06:53','2018-09-17 20:26:23',0,0);

/*Table structure for table `pasien_narkoba` */

DROP TABLE IF EXISTS `pasien_narkoba`;

CREATE TABLE `pasien_narkoba` (
  `id_pasien` tinyint(3) unsigned NOT NULL,
  `id_narkoba` tinyint(2) unsigned NOT NULL,
  KEY `id_pasien` (`id_pasien`),
  KEY `id_narkoba` (`id_narkoba`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pasien_narkoba` */

insert  into `pasien_narkoba`(`id_pasien`,`id_narkoba`) values 
(1,11),
(1,19),
(1,20),
(2,2),
(2,9),
(2,13);

/*Table structure for table `pengguna` */

DROP TABLE IF EXISTS `pengguna`;

CREATE TABLE `pengguna` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tipe` tinyint(1) NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nip` (`nip`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `pengguna` */

insert  into `pengguna`(`id`,`username`,`email`,`password`,`name`,`tipe`,`last_login`,`nip`) values 
(1,'stf28','stef@gmail.com','$2y$10$i5v46fIGMc.p/1h50gj7Zeeqat6mJj8jLfFix553IU9r0emJoSmiC','step step',0,NULL,NULL),
(2,'ptgs1','ptgs1@bnn.com','$2y$10$USLEYSz0A/BSQ0TsFtG27eu2bD771vp0oG/NViyB5nUnXqB45BL6W','petugas1',1,NULL,NULL),
(3,'knslr1','knslr1@bnn.com','$2y$10$TMs/oKts18f5LKDMPNNqye8pn1XtqnptAGuQ.fqGS0na6ev3JIn5y','Konselor 1',2,NULL,NULL),
(4,'test_ptgs1','test_ptgs1@bnn.com','$2y$10$1A86Kehf9xoxc1SGrYqu9e7eJfm/TF6QdHhaJBC2AhONAzcbXUKe6','Penguji_Petugas',1,NULL,NULL),
(5,'bah','bah@bnn.com','$2y$10$ZYrWFzsyxQhTJTs9P9lEreQpaN6nwb/NONiAmBEn4KU5W5sAqdbmO','Baharudin',2,NULL,'9023809432');

/*Table structure for table `pimpinan` */

DROP TABLE IF EXISTS `pimpinan`;

CREATE TABLE `pimpinan` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(20) DEFAULT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `pimpinan` */

insert  into `pimpinan`(`id`,`jabatan`,`nama`,`nip`) values 
(1,'Kasi Rehabilitasi','Test','1234567890');

/*Table structure for table `provinsi` */

DROP TABLE IF EXISTS `provinsi`;

CREATE TABLE `provinsi` (
  `id_provinsi` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `nama_provinsi` varchar(27) DEFAULT NULL,
  PRIMARY KEY (`id_provinsi`),
  UNIQUE KEY `nama_provinsi` (`nama_provinsi`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `provinsi` */

insert  into `provinsi`(`id_provinsi`,`nama_provinsi`) values 
(1,'Aceh'),
(17,'Bali'),
(16,'Banten'),
(7,'Bengkulu'),
(14,'DI Yogyakarta'),
(11,'DKI Jakarta'),
(29,'Gorontalo'),
(5,'Jambi'),
(12,'Jawa Barat'),
(13,'Jawa Tengah'),
(15,'Jawa Timur'),
(20,'Kalimantan Barat'),
(22,'Kalimantan Selatan'),
(21,'Kalimantan Tengah'),
(23,'Kalimantan Timur'),
(24,'Kalimantan Utara'),
(9,'Kepulauan Bangka Belitung'),
(10,'Kepulauan Riau'),
(8,'Lampung'),
(31,'Maluku'),
(32,'Maluku Utara'),
(18,'Nusa Tenggara Barat'),
(19,'Nusa Tenggara Timur'),
(33,'Papua'),
(34,'Papua Barat'),
(4,'Riau'),
(30,'Sulawesi Barat'),
(27,'Sulawesi Selatan'),
(26,'Sulawesi Tengah'),
(28,'Sulawesi Tenggara'),
(25,'Sulawesi Utara'),
(3,'Sumatra Barat'),
(6,'Sumatra Selatan'),
(2,'Sumatra Utara');

/*Table structure for table `sumber_biaya` */

DROP TABLE IF EXISTS `sumber_biaya`;

CREATE TABLE `sumber_biaya` (
  `id_sumber_biaya` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(8) NOT NULL,
  PRIMARY KEY (`id_sumber_biaya`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `sumber_biaya` */

insert  into `sumber_biaya`(`id_sumber_biaya`,`keterangan`) values 
(1,'BNN'),
(2,'KEMENKES'),
(3,'KEMENSOS'),
(4,'LAPAS'),
(5,'MANDIRI');

/*Table structure for table `sumber_pasien` */

DROP TABLE IF EXISTS `sumber_pasien`;

CREATE TABLE `sumber_pasien` (
  `id_sumber_pasien` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_sumber_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `sumber_pasien` */

insert  into `sumber_pasien`(`id_sumber_pasien`,`keterangan`) values 
(1,'SUKARELA'),
(2,'PROSES HUKUM'),
(3,'VONIS HUKUM'),
(4,'WBP'),
(5,'PENJANGKAUAN');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
