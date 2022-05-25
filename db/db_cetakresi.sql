/*
SQLyog Community
MySQL - 10.4.22-MariaDB : Database - db_cetakresi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(35) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `profilename` varchar(30) DEFAULT NULL,
  `gender` enum('Male','Fimale') DEFAULT NULL,
  `profileimg` varchar(100) DEFAULT NULL,
  `wa` varchar(15) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `profileaddress` varchar(300) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `sts_aktif` tinyint(4) DEFAULT 1 COMMENT '1=aktif 2=blokir',
  `last_login` datetime DEFAULT NULL,
  `_cid` int(10) DEFAULT NULL,
  `_ctime` datetime DEFAULT NULL,
  `_uid` int(10) DEFAULT NULL,
  `_utime` datetime DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=147 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`username`,`password`,`level`,`profilename`,`gender`,`profileimg`,`wa`,`email`,`profileaddress`,`ip`,`sts_aktif`,`last_login`,`_cid`,`_ctime`,`_uid`,`_utime`) values 
(2,'super','1b3231655cebb7a1f783eddf27d254ca',1,'IRONMAN','Male','fileadmin_29012022180822.png','0852 3334 1122','robot@mail.net','USA','::1',1,'2022-05-24 18:23:47',NULL,NULL,NULL,NULL),
(14,'admin','21232f297a57a5a743894a0e4a801fc3',2,'Zai Hery Firmansyah','Male','fileadmin_17022021091211.png','0852 2096 9224','zaiheryf@gmail.com','Indonesia','::1',1,'2022-05-25 13:32:22',NULL,NULL,NULL,NULL),
(145,'cepi','21232f297a57a5a743894a0e4a801fc3',2,'Cepi Cahyana','Male','fileadmin_08092021155318.png','0852 2128 8210','cahyanacepi@gmail.com',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `data_menu` */

DROP TABLE IF EXISTS `data_menu`;

CREATE TABLE `data_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_menu` int(11) DEFAULT NULL,
  `nama_menu` varchar(150) DEFAULT NULL,
  `kode_kategori` int(100) DEFAULT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `diskon` varchar(10) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `bintang` varchar(15) DEFAULT NULL,
  `nourut` int(5) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `_cid` int(10) DEFAULT NULL,
  `_ctime` datetime DEFAULT NULL,
  `_uid` int(10) DEFAULT NULL,
  `_utime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `data_menu` */

insert  into `data_menu`(`id`,`kode_menu`,`nama_menu`,`kode_kategori`,`nama_kategori`,`deskripsi`,`harga`,`diskon`,`foto`,`bintang`,`nourut`,`status`,`_cid`,`_ctime`,`_uid`,`_utime`) values 
(5,3,'bistik asik',2,'Makanan','oke',15000,'10','filemenu_24052022174913.jpg',NULL,3,'Publish',14,'2022-05-24 05:49:13',14,'2022-05-24 05:49:19'),
(2,1,'Dingin empuk',1,'Minuman','enak nyoss',1000,'','filemenu_17052022153637.jpeg',NULL,2,'Publish',14,'0000-00-00 00:00:00',14,'2022-05-17 03:36:58');

/*Table structure for table `data_pegawai` */

DROP TABLE IF EXISTS `data_pegawai`;

CREATE TABLE `data_pegawai` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_pegawai` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(150) DEFAULT NULL,
  `noktp` varchar(20) DEFAULT NULL,
  `jenis_kelamin` enum('Male','Fimale') DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jabatan` varchar(60) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tgl_awalmasukkerja` date DEFAULT NULL,
  `tgl_berakhirkerja` date DEFAULT NULL,
  `status_kerja` varchar(50) DEFAULT NULL,
  `_cid` int(10) DEFAULT NULL,
  `_ctime` datetime DEFAULT NULL,
  `_uid` int(10) DEFAULT NULL,
  `_utime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `data_pegawai` */

insert  into `data_pegawai`(`id`,`kode_pegawai`,`nama_lengkap`,`noktp`,`jenis_kelamin`,`tgl_lahir`,`jabatan`,`foto`,`no_hp`,`email`,`alamat`,`tgl_awalmasukkerja`,`tgl_berakhirkerja`,`status_kerja`,`_cid`,`_ctime`,`_uid`,`_utime`) values 
(6,NULL,'asdfasd','2147483647______','Male','0000-00-00','2','foto_14102021110249.jpg','8568 568_ ____','zaiheryf@gmail.com','zzz','0000-00-00','0000-00-00','2',14,'2021-10-14 11:02:49',NULL,NULL);

/*Table structure for table `main_konfig` */

DROP TABLE IF EXISTS `main_konfig`;

CREATE TABLE `main_konfig` (
  `id_konfig` int(10) unsigned NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `value` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `main_konfig` */

insert  into `main_konfig`(`id_konfig`,`nama`,`value`) values 
(1,'Loggo','filea_29012022170423.png'),
(2,'Favicon','fileb_29012022163954.png'),
(3,'loggo_login','filec_29012022164321.png'),
(4,'loggo_admin','filed_29012022164321.png'),
(5,'Project Date','29/01/2022'),
(6,'Client Name','zai'),
(8,'Product By','zai.web.id'),
(7,'Aplication Name','Aplikasi Cetak Resi'),
(9,'Copyright','zai.web.id'),
(10,'Record log','10000'),
(11,'Version','1.0.0'),
(12,'Power',NULL),
(13,'Title Name','Aplikasi Cetak Resi'),
(14,'Header Name','Aplikasi Cetak Resi');

/*Table structure for table `main_level` */

DROP TABLE IF EXISTS `main_level`;

CREATE TABLE `main_level` (
  `id_level` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code_level` int(5) DEFAULT NULL,
  `levelname` varchar(25) NOT NULL,
  `direct` text DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `control` text DEFAULT NULL,
  `_ctime` datetime DEFAULT NULL,
  `_cid` int(11) DEFAULT NULL,
  `_utime` datetime DEFAULT NULL,
  `_uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

/*Data for the table `main_level` */

insert  into `main_level`(`id_level`,`code_level`,`levelname`,`direct`,`ket`,`control`,`_ctime`,`_cid`,`_utime`,`_uid`) values 
(1,1,'super','super/dashboard','Robot',NULL,NULL,NULL,'2022-01-29 11:03:02',2),
(2,2,'admin','dashboard','Direksi',NULL,NULL,NULL,'2022-05-11 14:40:56',2);

/*Table structure for table `main_log` */

DROP TABLE IF EXISTS `main_log`;

CREATE TABLE `main_log` (
  `id_log` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) DEFAULT NULL,
  `nama_user` varchar(56) DEFAULT NULL,
  `level` int(5) DEFAULT NULL,
  `levelname` varchar(50) DEFAULT NULL,
  `table_updated` varchar(25) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `aksi` text NOT NULL,
  `tgl` datetime DEFAULT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

/*Data for the table `main_log` */

insert  into `main_log`(`id_log`,`id_admin`,`nama_user`,`level`,`levelname`,`table_updated`,`ip`,`aksi`,`tgl`) values 
(14,2,'IRONMAN',1,'super','admin','::1','Login','2022-01-29 16:51:30'),
(15,2,'IRONMAN',1,'super','admin','::1','Login','2022-01-29 16:58:20'),
(13,2,'IRONMAN',1,'super','admin','::1','Login','2022-01-29 16:46:22'),
(5,2,'IRONMAN',1,NULL,'admin',NULL,'Login','2022-01-27 13:43:12'),
(6,2,'IRONMAN',1,NULL,'admin',NULL,'Login','2022-01-27 15:11:46'),
(7,2,'IRONMAN',1,NULL,'admin',NULL,'Login','2022-01-27 15:13:50'),
(8,2,'IRONMAN',1,NULL,'admin',NULL,'Login','2022-01-27 15:14:39'),
(9,2,'IRONMAN',1,NULL,'admin',NULL,'Login','2022-01-29 09:54:10'),
(10,2,'IRONMAN',1,NULL,'admin','::1','Login','2022-01-29 13:51:21'),
(11,2,'IRONMAN',1,NULL,'admin','::1','Login','2022-01-29 13:55:07'),
(12,2,'IRONMAN',1,'super','admin','::1','Login','2022-01-29 15:05:34'),
(16,2,'IRONMAN',1,'super','admin','::1','Login','2022-01-29 17:01:58'),
(17,2,'IRONMAN',1,'super','admin','::1','Login','2022-01-29 17:04:15'),
(18,2,'IRONMAN',1,'super','admin','::1','Login','2022-01-29 17:05:03'),
(19,2,'IRONMAN',1,'super','admin','::1','Login','2022-05-11 14:26:14'),
(20,14,'Zai Hery Firmansyah',2,'admin','admin','::1','Login','2022-05-11 14:29:20'),
(21,2,'IRONMAN',1,'super','admin','::1','Login','2022-05-11 14:29:35'),
(22,2,'IRONMAN',1,'super','admin','::1','Login','2022-05-12 08:17:35'),
(23,14,'Zai Hery Firmansyah',2,'admin','admin','::1','Login','2022-05-12 08:37:20'),
(24,14,'Zai Hery Firmansyah',2,'admin','admin','::1','Login','2022-05-12 10:58:11'),
(25,2,'IRONMAN',1,'super','admin','::1','Login','2022-05-12 11:00:51'),
(26,14,'Zai Hery Firmansyah',2,'admin','admin','::1','Login','2022-05-12 11:17:44'),
(27,2,'IRONMAN',1,'super','admin','::1','Login','2022-05-12 13:23:41'),
(28,14,'Zai Hery Firmansyah',2,'admin','admin','::1','Login','2022-05-12 13:24:02'),
(29,14,'Zai Hery Firmansyah',2,'admin','admin','::1','Login','2022-05-17 14:24:32'),
(30,14,'Zai Hery Firmansyah',2,'admin','admin','::1','Login','2022-05-17 14:42:04'),
(31,14,'Zai Hery Firmansyah',2,'admin','admin','::1','Login','2022-05-17 15:07:34'),
(32,2,'IRONMAN',1,'super','admin','::1','Login','2022-05-24 17:48:15'),
(33,14,'Zai Hery Firmansyah',2,'admin','admin','::1','Login','2022-05-24 17:48:37'),
(34,2,'IRONMAN',1,'super','admin','::1','Login','2022-05-24 18:16:27'),
(35,14,'Zai Hery Firmansyah',2,'admin','admin','::1','Login','2022-05-24 18:22:09'),
(36,2,'IRONMAN',1,'super','admin','::1','Login','2022-05-24 18:23:47'),
(37,14,'Zai Hery Firmansyah',2,'admin','admin','::1','Login','2022-05-24 18:26:14'),
(38,14,'Zai Hery Firmansyah',2,'admin','admin','::1','Login','2022-05-25 13:32:22');

/*Table structure for table `main_menu` */

DROP TABLE IF EXISTS `main_menu`;

CREATE TABLE `main_menu` (
  `id_menu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) DEFAULT NULL,
  `level` enum('1','2') DEFAULT NULL,
  `id_main` int(11) DEFAULT 0,
  `dropdown` varchar(10) DEFAULT NULL,
  `icon` varchar(25) DEFAULT NULL,
  `hak_akses` int(11) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  `target` varchar(10) DEFAULT NULL,
  `_ctime` datetime DEFAULT NULL,
  `_cid` int(10) DEFAULT NULL,
  `_utime` datetime DEFAULT NULL,
  `_uid` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;

/*Data for the table `main_menu` */

insert  into `main_menu`(`id_menu`,`nama`,`level`,`id_main`,`dropdown`,`icon`,`hak_akses`,`link`,`target`,`_ctime`,`_cid`,`_utime`,`_uid`) values 
(1,'Dashboard','1',0,'no','fas fa-tachometer-alt',1,'super/dashboard','direct','2019-12-06 17:08:21',2,NULL,NULL),
(2,'User Group','1',0,'no','fas fa-star',1,'super/manajemen','direct','2019-12-06 17:08:54',2,'2019-12-07 11:38:46',2),
(3,'Data user','1',0,'no','fas fa-users',1,'super/data_user','direct','2019-12-06 17:27:07',2,'2019-12-07 20:39:29',2),
(4,'Data Log','1',0,'no','fas fa-key',1,'super/data_log','direct','2019-12-07 11:30:13',2,'2019-12-07 21:01:23',2),
(5,'Config App','1',0,'no','fas fa-cog',1,'super/config_app','direct','2019-12-07 11:31:27',2,'2019-12-07 11:33:48',2),
(25,'Dashboard','1',0,'no',' flaticon-imac',2,'dashboard','direct','2020-12-08 07:30:24',2,'2022-05-24 18:23:57',2),
(98,'Input Resi','1',0,'no',' flaticon-signs-2',2,'input_resi','direct','2021-09-09 05:45:32',2,'2022-05-24 18:25:59',2),
(104,'Laporan','1',0,'yes','flaticon-analytics',2,'#','direct','2022-05-12 08:20:19',2,'2022-05-24 18:19:45',2),
(105,'Laporan Satu','2',104,'no','#',2,'lap','direct','2022-05-12 08:21:08',2,'2022-05-24 18:19:58',2),
(106,'Laporan dua','2',104,'no','#',2,'lap','direct','2022-05-12 08:22:39',2,'2022-05-24 18:20:06',2),
(107,'Konfigurasi Menu','1',0,'no','flaticon-settings',2,'setting_menu','direct','2022-05-12 08:34:29',2,'2022-05-12 11:06:42',2),
(99,'Data Resi','1',0,'no','flaticon-box-2',2,'data_resi','direct','2021-09-17 15:51:55',2,'2022-05-24 18:26:03',2);

/*Table structure for table `tm_kategorimenu` */

DROP TABLE IF EXISTS `tm_kategorimenu`;

CREATE TABLE `tm_kategorimenu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tm_kategorimenu` */

insert  into `tm_kategorimenu`(`id`,`kode`,`nama`) values 
(1,1,'Minuman'),
(2,2,'Makanan');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
