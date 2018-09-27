/*
SQLyog Ultimate v11.21 (64 bit)
MySQL - 5.5.21 : Database - db_sims
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_sims` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_sims`;

/*Table structure for table `barang_ref` */

DROP TABLE IF EXISTS `barang_ref`;

CREATE TABLE `barang_ref` (
  `barang_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `barang_kode` varchar(50) NOT NULL,
  `barang_nama` varchar(50) DEFAULT NULL,
  `barang_sub_kelompok_barang_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`barang_id`),
  UNIQUE KEY `uk_barang` (`barang_kode`),
  KEY `FK_barang_sub_kelompok` (`barang_sub_kelompok_barang_id`),
  KEY `FK_barang_user` (`user_id`),
  CONSTRAINT `FK_barang_sub_kelompok` FOREIGN KEY (`barang_sub_kelompok_barang_id`) REFERENCES `sub_kelompok_barang_ref` (`sub_kelompok_barang_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_barang_user` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `barang_ref` */

insert  into `barang_ref`(`barang_id`,`barang_kode`,`barang_nama`,`barang_sub_kelompok_barang_id`,`user_id`) values (2,'','Coklat',3,1);

/*Table structure for table `brand_ref` */

DROP TABLE IF EXISTS `brand_ref`;

CREATE TABLE `brand_ref` (
  `brand_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `brand_kode` varchar(50) NOT NULL,
  `brand_nama` varchar(50) NOT NULL,
  `brand_keterangan` text,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`brand_id`),
  UNIQUE KEY `uk_brand` (`brand_nama`),
  KEY `FK_brand_user` (`user_id`),
  CONSTRAINT `FK_brand_user` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `brand_ref` */

insert  into `brand_ref`(`brand_id`,`brand_kode`,`brand_nama`,`brand_keterangan`,`user_id`) values (1,'MR','Mauripan','Produk Pengembang Kue',1),(2,'BB','Blue Band','Mentega',1);

/*Table structure for table `gudang_ref` */

DROP TABLE IF EXISTS `gudang_ref`;

CREATE TABLE `gudang_ref` (
  `gudang_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gudang_kode` varchar(50) NOT NULL,
  `gudang_nama` varchar(50) NOT NULL,
  `gudang_keterangan` text,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`gudang_id`),
  UNIQUE KEY `uk_gudang` (`gudang_kode`),
  KEY `FK_gudang_user` (`user_id`),
  CONSTRAINT `FK_gudang_user` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `gudang_ref` */

insert  into `gudang_ref`(`gudang_id`,`gudang_kode`,`gudang_nama`,`gudang_keterangan`,`user_id`) values (3,'GD-001','Gudang 1','Penyimpanan Barang Cair',1);

/*Table structure for table `inv_barang` */

DROP TABLE IF EXISTS `inv_barang`;

CREATE TABLE `inv_barang` (
  `inv_barang_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `inv_barang_kode` varchar(20) NOT NULL,
  `inv_barang_nama` varchar(50) NOT NULL,
  `inv_barang_barang_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`inv_barang_id`),
  KEY `FK_inv_barang_barang` (`inv_barang_barang_id`),
  KEY `FK_inv_barang_user` (`user_id`),
  CONSTRAINT `FK_inv_barang_barang` FOREIGN KEY (`inv_barang_barang_id`) REFERENCES `barang_ref` (`barang_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_inv_barang_user` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `inv_barang` */

insert  into `inv_barang`(`inv_barang_id`,`inv_barang_kode`,`inv_barang_nama`,`inv_barang_barang_id`,`user_id`) values (1,'CKL-001','Kualitas Super',2,1),(2,'CKL-002','Kualitas Sedang',2,1),(4,'CKL-003','Kualitas Rendah',2,1);

/*Table structure for table `jabatan_ref` */

DROP TABLE IF EXISTS `jabatan_ref`;

CREATE TABLE `jabatan_ref` (
  `jabatan_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `jabatan_kode` varchar(50) NOT NULL,
  `jabatan_nama` varchar(50) NOT NULL,
  `jabatan_keterangan` text,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`jabatan_id`),
  UNIQUE KEY `uk_jabatan` (`jabatan_nama`),
  KEY `FK_jabatan_user` (`user_id`),
  CONSTRAINT `FK_jabatan_user` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `jabatan_ref` */

insert  into `jabatan_ref`(`jabatan_id`,`jabatan_kode`,`jabatan_nama`,`jabatan_keterangan`,`user_id`) values (1,'ADM','Administrator','Bertugas mengelola segala administrasi kantor',1),(2,'DRV','Driver','Bertugas melakukan pengiriman barang ke konsumen',1);

/*Table structure for table `kelompok_barang_ref` */

DROP TABLE IF EXISTS `kelompok_barang_ref`;

CREATE TABLE `kelompok_barang_ref` (
  `kelompok_barang_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kelompok_barang_kode` varchar(50) NOT NULL,
  `kelompok_barang_nama` varchar(50) DEFAULT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`kelompok_barang_id`),
  UNIQUE KEY `uk_kelompok_barang` (`kelompok_barang_kode`),
  KEY `FK_kelompok_barang_user` (`user_id`),
  CONSTRAINT `FK_kelompok_barang_user` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `kelompok_barang_ref` */

insert  into `kelompok_barang_ref`(`kelompok_barang_id`,`kelompok_barang_kode`,`kelompok_barang_nama`,`user_id`) values (1,'KL001','Padat',1),(2,'KL002','Cair',1),(3,'KL003','Tepung',1);

/*Table structure for table `kondisi_barang_ref` */

DROP TABLE IF EXISTS `kondisi_barang_ref`;

CREATE TABLE `kondisi_barang_ref` (
  `kondisi_barang_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kondisi_barang_kode` varchar(50) NOT NULL,
  `kondisi_barang_nama` varchar(50) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`kondisi_barang_id`),
  UNIQUE KEY `uk_kondisi` (`kondisi_barang_nama`),
  KEY `FK_kondisi_user` (`user_id`),
  CONSTRAINT `FK_kondisi_user` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `kondisi_barang_ref` */

insert  into `kondisi_barang_ref`(`kondisi_barang_id`,`kondisi_barang_kode`,`kondisi_barang_nama`,`user_id`) values (1,'A','Baik',1),(2,'C','Cacat',1),(3,'R','Rusak',1);

/*Table structure for table `konsumen_ref` */

DROP TABLE IF EXISTS `konsumen_ref`;

CREATE TABLE `konsumen_ref` (
  `konsumen_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `konsumen_kode` varchar(50) NOT NULL,
  `konsumen_nama` varchar(50) NOT NULL,
  `konsumen_nama_pemilik` varchar(50) DEFAULT NULL,
  `konsumen_telp` varchar(50) NOT NULL,
  `konsumen_alamat` text,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`konsumen_id`),
  KEY `FK_konsumen_user` (`user_id`),
  CONSTRAINT `FK_konsumen_user` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `konsumen_ref` */

insert  into `konsumen_ref`(`konsumen_id`,`konsumen_kode`,`konsumen_nama`,`konsumen_nama_pemilik`,`konsumen_telp`,`konsumen_alamat`,`user_id`) values (1,'SJ','Subur Jaya','Budiman','0274 123456','Yogyakarta',1);

/*Table structure for table `konversi_satuan_ref` */

DROP TABLE IF EXISTS `konversi_satuan_ref`;

CREATE TABLE `konversi_satuan_ref` (
  `konv_satuan_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `konv_satuan_kode` varchar(20) NOT NULL,
  `konv_satuan_nama` varchar(50) NOT NULL,
  `konv_satuan_nilai` int(11) NOT NULL,
  `konv_satuan_satuan_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`konv_satuan_id`),
  KEY `FK_konv_satuan_satuan` (`konv_satuan_satuan_id`),
  KEY `FK_konv_satuan_user` (`user_id`),
  CONSTRAINT `FK_konv_satuan_satuan` FOREIGN KEY (`konv_satuan_satuan_id`) REFERENCES `satuan_ref` (`satuan_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_konv_satuan_user` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `konversi_satuan_ref` */

insert  into `konversi_satuan_ref`(`konv_satuan_id`,`konv_satuan_kode`,`konv_satuan_nama`,`konv_satuan_nilai`,`konv_satuan_satuan_id`,`user_id`) values (1,'KG-GR','Gram',1000,1,1);

/*Table structure for table `pegawai_ref` */

DROP TABLE IF EXISTS `pegawai_ref`;

CREATE TABLE `pegawai_ref` (
  `pegawai_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pegawai_kode` varchar(50) DEFAULT NULL,
  `pegawai_nama` varchar(100) NOT NULL,
  `pegawai_jabatan_id` int(11) unsigned NOT NULL,
  `pegawai_gender` enum('Laki - Laki','Perempuan') NOT NULL,
  `pegawai_agama` enum('Islam','Kristen','Katholik','Hindu','Budha') NOT NULL,
  `pegawai_status_kawin` enum('Menikah','Belum Menikah') DEFAULT NULL,
  `pegawai_tempat_lahir` varchar(100) DEFAULT NULL,
  `pegawai_tanggal_lahir` date DEFAULT NULL,
  `pegawai_kontak` varchar(50) DEFAULT NULL,
  `pegawai_email` varchar(50) DEFAULT NULL,
  `pegawai_alamat` text,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`pegawai_id`),
  KEY `FK_pegawai_jabatan` (`pegawai_jabatan_id`),
  KEY `FK_pegawai_user` (`user_id`),
  CONSTRAINT `FK_pegawai_jabatan` FOREIGN KEY (`pegawai_jabatan_id`) REFERENCES `jabatan_ref` (`jabatan_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_pegawai_user` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pegawai_ref` */

/*Table structure for table `satuan_ref` */

DROP TABLE IF EXISTS `satuan_ref`;

CREATE TABLE `satuan_ref` (
  `satuan_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `satuan_kode` varchar(20) NOT NULL,
  `satuan_nama` varchar(50) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`satuan_id`),
  UNIQUE KEY `uk_satuan` (`satuan_nama`),
  KEY `FK_satuan_user` (`user_id`),
  CONSTRAINT `FK_satuan_user` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `satuan_ref` */

insert  into `satuan_ref`(`satuan_id`,`satuan_kode`,`satuan_nama`,`user_id`) values (1,'KG','Kilogram',1);

/*Table structure for table `sub_kelompok_barang_ref` */

DROP TABLE IF EXISTS `sub_kelompok_barang_ref`;

CREATE TABLE `sub_kelompok_barang_ref` (
  `sub_kelompok_barang_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sub_kelompok_barang_kode` varchar(50) NOT NULL,
  `sub_kelompok_barang_nama` varchar(50) DEFAULT NULL,
  `sub_kelompok_kelompok_barang_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`sub_kelompok_barang_id`),
  UNIQUE KEY `uk_sub_kelompok_barang` (`sub_kelompok_barang_kode`),
  KEY `FK_sub_kelompok_barang_kelompok` (`sub_kelompok_kelompok_barang_id`),
  KEY `FK_sub_kelompok_barang_user` (`user_id`),
  CONSTRAINT `FK_sub_kelompok_barang_kelompok` FOREIGN KEY (`sub_kelompok_kelompok_barang_id`) REFERENCES `kelompok_barang_ref` (`kelompok_barang_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_sub_kelompok_barang_user` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `sub_kelompok_barang_ref` */

insert  into `sub_kelompok_barang_ref`(`sub_kelompok_barang_id`,`sub_kelompok_barang_kode`,`sub_kelompok_barang_nama`,`sub_kelompok_kelompok_barang_id`,`user_id`) values (3,'PDT-001','Sub Padat',1,1);

/*Table structure for table `supplier_ref` */

DROP TABLE IF EXISTS `supplier_ref`;

CREATE TABLE `supplier_ref` (
  `supplier_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_kode` varchar(50) NOT NULL,
  `supplier_nama` varchar(50) NOT NULL,
  `supplier_telp` varchar(50) NOT NULL,
  `supplier_alamat` text,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`supplier_id`),
  KEY `FK_supplier_user` (`user_id`),
  CONSTRAINT `FK_supplier_user` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `supplier_ref` */

insert  into `supplier_ref`(`supplier_id`,`supplier_kode`,`supplier_nama`,`supplier_telp`,`supplier_alamat`,`user_id`) values (1,'SP-001','PT Gamatechno Indonesia','0274 566161','Yogyakarta',1);

/*Table structure for table `tb_groups` */

DROP TABLE IF EXISTS `tb_groups`;

CREATE TABLE `tb_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tb_groups` */

insert  into `tb_groups`(`id`,`name`,`description`) values (1,'admin','Administrator'),(2,'members','General User');

/*Table structure for table `tb_harga` */

DROP TABLE IF EXISTS `tb_harga`;

CREATE TABLE `tb_harga` (
  `id_harga` int(30) NOT NULL AUTO_INCREMENT,
  `harga` decimal(7,0) DEFAULT NULL,
  `uid` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_harga`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `tb_harga` */

insert  into `tb_harga`(`id_harga`,`harga`,`uid`) values (1,'11000',7),(2,'6000',7),(3,'300000',7),(4,'30000',1),(5,'11000',1),(6,'51000',1),(7,'6000',1),(8,'21000',9),(9,'7000',7),(10,'6000',9),(11,'11000',9),(12,'6000',10),(13,'11000',10);

/*Table structure for table `tb_login_attempts` */

DROP TABLE IF EXISTS `tb_login_attempts`;

CREATE TABLE `tb_login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_login_attempts` */

/*Table structure for table `tb_menu` */

DROP TABLE IF EXISTS `tb_menu`;

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) NOT NULL,
  `icon` varchar(40) NOT NULL,
  `link` varchar(30) NOT NULL,
  `parent` int(11) NOT NULL,
  `role` enum('Administrator','Admin') DEFAULT 'Admin',
  `order` int(11) DEFAULT NULL,
  `aktif` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

/*Data for the table `tb_menu` */

insert  into `tb_menu`(`id_menu`,`nama_menu`,`icon`,`link`,`parent`,`role`,`order`,`aktif`) values (1,'Dashboard','fa fa-dashboard','dashboard',0,'Admin',1,'Y'),(2,'Master','fa fa-suitcase','#',0,'Admin',9,'Y'),(4,'Pelanggan','fa fa-user text-aqua','pelanggan',2,'Admin',1,'Y'),(5,'Nominal','fa fa-usd text-aqua','nominal',2,'Admin',2,'Y'),(6,'Harga','fa  fa-usd text-aqua','harga',2,'Admin',3,'Y'),(12,'Transaksi','fa fa-th-list','#',0,'Admin',8,'Y'),(13,'Tambah Baru','fa fa-shopping-cart text-aqua','transaksi/create',12,'Admin',2,'Y'),(14,'Semua','fa fa-minus-square text-aqua','transaksi',12,'Admin',1,'Y'),(16,'Lunas','fa fa-th-large text-aqua','transaksi/lunas',12,'Admin',3,'Y'),(22,'Seting','fa fa-gears','#',0,'Administrator',7,'Y'),(23,'Menu seting','fa  fa-bars text-aqua','menu',22,'Administrator',1,'Y'),(24,'User Seting','fa fa-users text-aqua','auth/member',22,'Administrator',2,'Y'),(26,'Group Member','fa  fa-bars text-aqua','groups',22,'Admin',3,'Y'),(27,'Hutang','fa fa-sticky-note-o text-aqua','transaksi/hutang',12,'Admin',4,'Y'),(28,'Manajemen Referensi','fa fa-navicon','#',0,'Admin',2,'Y'),(29,'Manajemen Barang','fa fa-cubes','#',0,'Admin',3,'Y'),(30,'Transaksi Pembelian','fa fa-calculator','#',0,'Admin',4,'Y'),(31,'Transaksi Penjualan','fa fa-calculator','#',0,'Admin',5,'Y'),(32,'Laporan','fa fa-book','#',0,'Admin',6,'Y'),(33,'Satuan','fa fa-calculator text-aqua','satuan',28,'Admin',4,'Y'),(34,'Konversi Satuan','fa fa-calculator text-aqua','konversiSatuan',28,'Admin',5,'Y'),(35,'Konsumen','fa fa-user text-aqua','konsumen',28,'Admin',9,'Y'),(36,'Supplier','fa fa-truck text-aqua','supplier',28,'Admin',10,'Y'),(37,'Kondisi Barang','fa fa-puzzle-piece text-aqua','kondisiBarang',28,'Admin',6,'Y'),(38,'Kodefikasi Barang','fa fa-qrcode text-aqua','kodefikasiBarang',28,'Admin',3,'Y'),(39,'Brand','fa fa-trademark text-aqua','brand',28,'Admin',7,'Y'),(40,'Jabatan','fa fa-briefcase text-aqua','jabatan',28,'Admin',8,'Y'),(41,'Inventarisasi Barang','fa fa-cube text-aqua','invBarang',29,'Admin',1,'Y'),(42,'Pengelolaan Stok','fa fa-cubes text-aqua','#',29,'Admin',2,'Y'),(43,'Order','fa fa-edit text-aqua','#',30,'Admin',1,'Y'),(44,'Penerimaan Barang','fa fa-handshake-o text-aqua','#',30,'Admin',2,'Y'),(45,'Pesanan','fa fa-shopping-cart text-aqua','#',31,'Admin',1,'Y'),(46,'Pengiriman Barang','fa fa-truck text-aqua','#',31,'Admin',2,'Y'),(47,'Pembelian','fa fa-money text-aqua','#',32,'Admin',1,'Y'),(48,'Penjualan','fa fa-money text-aqua','#',32,'Admin',2,'Y'),(49,'Stok','fa fa-cube text-aqua','#',32,'Admin',3,'Y'),(50,'Pegawai','fa fa-users text-aqua','pegawai',28,'Admin',11,'Y'),(51,'Kelompok barang','fa fa-navicon text-aqua','kelompokBarang',28,'Admin',1,'Y'),(52,'Sub Kelompok Barang','fa fa-navicon text-aqua','subKelompokBarang',28,'Admin',2,'Y'),(53,'Gudang','fa fa-building-o text-aqua','gudang',28,'Admin',NULL,'Y');

/*Table structure for table `tb_nominal` */

DROP TABLE IF EXISTS `tb_nominal`;

CREATE TABLE `tb_nominal` (
  `id_nominal` int(30) NOT NULL AUTO_INCREMENT,
  `nominal` varchar(12) DEFAULT NULL,
  `uid` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_nominal`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tb_nominal` */

insert  into `tb_nominal`(`id_nominal`,`nominal`,`uid`) values (1,'2 Ribu',1),(2,'5 Ribu',1),(3,'20 Ribu',1),(4,'10 Ribu',1),(5,'10 ribu',7),(6,'10 ribu',9),(7,'6 ribu',9),(8,'5 ribu',9),(9,'10 ribu',10),(10,'5 ribu',10);

/*Table structure for table `tb_pelanggan` */

DROP TABLE IF EXISTS `tb_pelanggan`;

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(50) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telpn` varchar(15) DEFAULT NULL,
  `uid` int(50) DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pelanggan` */

insert  into `tb_pelanggan`(`id_pelanggan`,`nama_pelanggan`,`alamat`,`no_telpn`,`uid`) values (2,'Leny Yuliani','Pekajangan Buaran','0898989',7),(3,'Arif Rahman','Buaran Pekalongan','08989780989',7),(4,'Danang','Wiradesa','0867676767',1),(5,'Agga','Bligo','089787878',1),(6,'Inva','Bojong','08989786',7),(7,'ely','pekalongan','089898',9),(8,'andre','pekalongan','0898978678',10);

/*Table structure for table `tb_transaksi` */

DROP TABLE IF EXISTS `tb_transaksi`;

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(50) NOT NULL AUTO_INCREMENT,
  `kode_transaksi` varchar(15) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_nominal` int(30) DEFAULT NULL,
  `id_harga` int(30) DEFAULT NULL,
  `status` enum('LUNAS','HUTANG') DEFAULT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `tgl_tempo` datetime NOT NULL,
  `tgl_bayar` datetime DEFAULT NULL,
  `uid` int(30) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tb_transaksi` */

insert  into `tb_transaksi`(`id_transaksi`,`kode_transaksi`,`no_telp`,`id_pelanggan`,`id_nominal`,`id_harga`,`status`,`tgl_transaksi`,`tgl_tempo`,`tgl_bayar`,`uid`) values (1,'71605001','8967677',2,5,1,'LUNAS','2016-05-16 11:46:38','0000-00-00 00:00:00','2016-05-16 11:46:38',7),(2,'71605002','2147483647',6,5,1,'HUTANG','2016-05-23 11:05:00','0000-00-00 00:00:00','0000-00-00 00:00:00',7),(3,'91605001','0',7,6,11,'LUNAS','2016-05-16 11:48:59','0000-00-00 00:00:00','2016-05-16 11:48:59',9),(4,'91605002','8989',7,7,8,'HUTANG','2016-05-16 11:49:12','0000-00-00 00:00:00','0000-00-00 00:00:00',9),(5,'101605001','2147483647',8,9,13,'LUNAS','2016-05-16 11:51:33','0000-00-00 00:00:00','2016-05-16 11:51:33',10),(6,'101605501','2147483647',8,9,13,'HUTANG','2016-05-16 11:51:51','0000-00-00 00:00:00','0000-00-00 00:00:00',10),(7,'101605551','808978678',8,10,12,'LUNAS','2016-05-16 11:53:04','0000-00-00 00:00:00','2016-05-16 11:53:04',10),(8,'11605001','2147483647',4,2,7,'LUNAS','2016-05-16 12:30:28','0000-00-00 00:00:00','2016-05-16 12:30:28',1),(9,'11605002','89786786',5,4,5,'HUTANG','2016-05-16 12:30:47','0000-00-00 00:00:00','0000-00-00 00:00:00',1),(10,'11605003','2147483647',4,2,7,'LUNAS','2016-05-21 08:46:18','0000-00-00 00:00:00','2016-05-21 08:46:18',1),(11,'11605004','2147483647',1,2,7,'LUNAS','2016-05-25 09:01:32','0000-00-00 00:00:00','2016-05-25 09:01:32',1),(12,'11605005','6850898989787',4,4,5,'HUTANG','2016-05-25 09:45:10','0000-00-00 00:00:00','0000-00-00 00:00:00',1),(13,'11605006','6850898989',5,4,5,'LUNAS','2016-05-25 10:01:28','0000-00-00 00:00:00','2016-05-25 10:01:28',1),(14,'11605007','0950898989787',4,2,7,'LUNAS','2016-05-25 10:16:48','0000-00-00 00:00:00','2016-05-25 10:16:48',1),(15,'11605008','+6850898989787',4,3,5,'LUNAS','2016-05-25 10:19:08','0000-00-00 00:00:00','2016-05-25 10:19:08',1);

/*Table structure for table `tb_users` */

DROP TABLE IF EXISTS `tb_users`;

CREATE TABLE `tb_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `tb_users` */

insert  into `tb_users`(`id`,`ip_address`,`username`,`password`,`salt`,`email`,`activation_code`,`forgotten_password_code`,`forgotten_password_time`,`remember_code`,`created_on`,`last_login`,`active`,`first_name`,`last_name`,`company`,`phone`) values (1,'127.0.0.1','administrator','$2y$08$Kpso52jO/ld.bHeDSE5hPO2x9qsIdnVhEVlgFqrZ3c8TIq6zuNLze','','admin@admin.com','86ed629d0fc67b65fa78a1f7b776dd9c56032abb',NULL,NULL,'G.WaoqYoZ/Zq6l6VddiHGe','0000-00-00 00:00:00','2018-09-22 08:22:53',1,'Administrator','utama','PT Andini','0'),(7,'::1','member2','$2y$08$PR5Bshqw/ICo9/3X/9Sdn.DbdNP9D0efVQhpSxLfEEblKvbUV/DqG',NULL,'mara@gmail.com',NULL,NULL,NULL,NULL,'2016-05-13 11:41:01','2016-05-20 11:30:08',1,'mara','andre','PT Andini','0898989'),(8,'::1','coba saja','$2y$08$rrhYyW215HV/K5WoH1E2CuH.6buDwe4EsQRYGyMqj641f6x15qm5q',NULL,'coba@gmail.com','219de4ce2713319e792fb6011ee6e2a87a88bd08',NULL,NULL,NULL,'2016-07-26 13:49:12',NULL,0,'coba','saja','PT Andini',NULL);

/*Table structure for table `tb_users_groups` */

DROP TABLE IF EXISTS `tb_users_groups`;

CREATE TABLE `tb_users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `tb_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

/*Data for the table `tb_users_groups` */

insert  into `tb_users_groups`(`id`,`user_id`,`group_id`) values (37,1,1),(38,1,2),(34,7,2),(39,8,2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
