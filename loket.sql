# Host: localhost  (Version: 5.5.5-10.1.9-MariaDB)
# Date: 2017-11-17 11:21:34
# Generator: MySQL-Front 5.3  (Build 4.187)

/*!40101 SET NAMES latin1 */;

#
# Structure for table "agenda"
#

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `agenda` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `file` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin2;

#
# Data for table "agenda"
#

INSERT INTO `agenda` VALUES (1,'Osis','agenda_1510110916.jpg'),(2,'Ga tau','agenda_1510111008.jpg'),(3,'Ini nama agenda','agenda_1510127207.jpg');

#
# Structure for table "instansi"
#

DROP TABLE IF EXISTS `instansi`;
CREATE TABLE `instansi` (
  `id_instansi` int(2) NOT NULL AUTO_INCREMENT,
  `instansi` varchar(50) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `logo` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_instansi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "instansi"
#

INSERT INTO `instansi` VALUES (1,'SMK Informatika Utama','021-321312','Jl. JCC Komplek PLN P2B TJBB No.61 Krukut Limo Depok','logo_1383876609.png');

#
# Structure for table "karyawan"
#

DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan` (
  `username` varchar(40) NOT NULL DEFAULT '',
  `nama` varchar(50) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `id_loket` int(3) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "karyawan"
#

INSERT INTO `karyawan` VALUES ('aaa','Aaaa','08967987568','Jl. Hkasdas','3b3690fba8bd08059eae130425396eb05ded1b7d','Penjaga',6),('aku','Aku','08384494040','asdas','3b3690fba8bd08059eae130425396eb05ded1b7d','Admin',NULL),('loket1','Loket 1','08984494040','aaa','3b3690fba8bd08059eae130425396eb05ded1b7d','Penjaga',6),('loket2','Loket 2','083823120','Jl. jalan','3b3690fba8bd08059eae130425396eb05ded1b7d','Penjaga',7),('loket3','Loket 3','08343294','Cinere','3b3690fba8bd08059eae130425396eb05ded1b7d','Penjaga',8),('loket4','Loket 4','083458345','Gandul','3b3690fba8bd08059eae130425396eb05ded1b7d','Penjaga',9);

#
# Structure for table "loket"
#

DROP TABLE IF EXISTS `loket`;
CREATE TABLE `loket` (
  `id_loket` int(3) NOT NULL AUTO_INCREMENT,
  `loket` varchar(40) DEFAULT NULL,
  `suara` varchar(150) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_loket`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

#
# Data for table "loket"
#

INSERT INTO `loket` VALUES (6,'1',NULL,0),(7,'2',NULL,0),(8,'3',NULL,0),(9,'4',NULL,0);

#
# Structure for table "text_jalan"
#

DROP TABLE IF EXISTS `text_jalan`;
CREATE TABLE `text_jalan` (
  `id_text` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(150) DEFAULT NULL,
  `img` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_text`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "text_jalan"
#

INSERT INTO `text_jalan` VALUES (1,'Nasir sayang saropahahaha','text_1510111034.png'),(2,'Saropah sayang alpi','text_1510111058.jpg'),(3,'alpi sayang maymunah','text_1510111073.jpg'),(4,'Karena kau buktikan untukku satu kisah tentang cinta','text_1510125601.png'),(5,'Ayu si tukang ngupil','text_1510127085.jpg');

#
# Structure for table "transaksi"
#

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `no_antrian` int(11) DEFAULT NULL,
  `id_loket` int(3) NOT NULL DEFAULT '0',
  `username` varchar(40) DEFAULT NULL,
  `tgl` int(8) unsigned zerofill DEFAULT '00000000',
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

#
# Data for table "transaksi"
#

INSERT INTO `transaksi` VALUES (19,1,8,'loket3',12112017),(20,2,6,'loket1',12112017),(21,3,6,'loket1',12112017),(22,4,0,NULL,12112017),(23,5,0,NULL,12112017),(24,6,0,NULL,12112017),(25,1,0,NULL,14112017),(26,2,0,NULL,14112017),(27,1,6,'loket1',16112017),(28,2,6,'loket1',16112017),(29,3,7,'loket2',16112017),(30,1,6,'loket1',17112017),(31,2,7,'loket2',17112017),(32,3,8,'loket3',17112017),(33,4,9,'loket4',17112017),(34,5,0,NULL,17112017),(35,6,0,NULL,17112017),(36,7,0,NULL,17112017),(37,8,0,NULL,17112017),(38,9,0,NULL,17112017),(39,10,0,NULL,17112017),(40,11,0,NULL,17112017),(41,12,0,NULL,17112017),(42,13,0,NULL,17112017),(43,14,0,NULL,17112017),(44,15,0,NULL,17112017),(45,16,0,NULL,17112017),(46,17,0,NULL,17112017),(47,18,0,NULL,17112017),(48,19,0,NULL,17112017),(49,20,0,NULL,17112017),(50,21,0,NULL,17112017),(51,22,0,NULL,17112017),(52,23,0,NULL,17112017),(53,24,0,NULL,17112017),(54,25,0,NULL,17112017),(55,26,0,NULL,17112017),(56,27,0,NULL,17112017),(57,28,0,NULL,17112017),(58,29,0,NULL,17112017);
