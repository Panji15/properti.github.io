# Host: localhost  (Version 5.5.5-10.4.18-MariaDB)
# Date: 2021-08-14 14:57:35
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "tb_divisi"
#

DROP TABLE IF EXISTS `tb_divisi`;
CREATE TABLE `tb_divisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `divisi` varchar(100) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tb_divisi"
#

INSERT INTO `tb_divisi` VALUES (1,'Marketing','2021-07-09 00:00:00',NULL,NULL),(2,'Admin','2021-07-09 00:00:00',NULL,NULL);

#
# Structure for table "tb_jabatan"
#

DROP TABLE IF EXISTS `tb_jabatan`;
CREATE TABLE `tb_jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(100) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

#
# Data for table "tb_jabatan"
#

INSERT INTO `tb_jabatan` VALUES (1,'Sales','2021-07-09 00:00:00',NULL,NULL),(2,'Admin','2021-07-09 00:00:00',NULL,NULL);

#
# Structure for table "tb_jenis_spesifikasi"
#

DROP TABLE IF EXISTS `tb_jenis_spesifikasi`;
CREATE TABLE `tb_jenis_spesifikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `spesifikasi` varchar(100) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tb_jenis_spesifikasi"
#

INSERT INTO `tb_jenis_spesifikasi` VALUES (1,'Pondasi',NULL,NULL,NULL),(2,'Struktur',NULL,NULL,NULL),(3,'Besi',NULL,NULL,NULL),(4,'Kolom',NULL,NULL,NULL),(5,'Dinding',NULL,NULL,NULL),(6,'Lantai',NULL,NULL,NULL),(7,'Kusen',NULL,NULL,NULL),(8,'Plafon',NULL,NULL,NULL),(9,'Rangka',NULL,NULL,NULL),(10,'Atap',NULL,NULL,NULL),(11,'Listplank',NULL,NULL,NULL),(12,'Sanitari',NULL,NULL,NULL),(13,'Sertifikat',NULL,NULL,NULL),(14,'Listrik',NULL,NULL,NULL);

#
# Structure for table "tb_karyawan"
#

DROP TABLE IF EXISTS `tb_karyawan`;
CREATE TABLE `tb_karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `no_karyawan` varchar(20) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `divisi` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `img_karyawan` varchar(255) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tb_karyawan"
#

INSERT INTO `tb_karyawan` VALUES (1,'Nama Marketing','','1','1','',NULL,NULL,'./storage/karyawan/','2021-07-09 00:00:00','2021-08-13 11:05:08',NULL),(2,'Nama HRD','','2','2','',NULL,NULL,'./storage/karyawan/','2021-07-09 00:00:00','2021-08-13 10:59:23',NULL),(3,'Sujono','11223344','1','1','Jalan Raya',NULL,NULL,'./storage/karyawan/','2021-08-10 11:06:00','2021-08-10 11:49:33',NULL),(4,'Suparno Hidayat',NULL,'1','1','Jalan apa saja',NULL,NULL,NULL,'2021-08-12 11:06:00',NULL,NULL);

#
# Structure for table "tb_kavling"
#

DROP TABLE IF EXISTS `tb_kavling`;
CREATE TABLE `tb_kavling` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proyek` varchar(50) DEFAULT NULL,
  `kavling` varchar(50) DEFAULT NULL,
  `konsumen` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL COMMENT '1. On Proses; 2. Pondasi; 3. Bangunan Selesai dan Dinding',
  `progress` varchar(50) DEFAULT NULL,
  `indikator` varchar(50) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `create_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=314 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tb_kavling"
#

INSERT INTO `tb_kavling` VALUES (1,'1','A1','15','4','30','purple',NULL,'2021-08-13 05:07:34',NULL,'Nama HRD'),(3,'1','A2',NULL,'1','0','green','2021-07-07 10:15:43','2021-08-03 11:54:44',NULL,'admin'),(4,'1','A3','14','2','20','yellow','2021-07-08 09:51:42','2021-08-03 10:27:34',NULL,'admin'),(6,'1','A4','17','1','0','yellow','2021-07-08 10:04:41','2021-08-03 11:54:54',NULL,'admin'),(7,'1','A5',NULL,'1','0','green','2021-08-03 08:19:50','2021-08-03 11:54:59',NULL,'admin'),(8,'1','A6',NULL,'1','0','green','2021-08-03 08:20:34',NULL,NULL,'admin'),(9,'1','A7',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(10,'1','A8',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(11,'1','A9',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(12,'1','A10',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(13,'1','A11',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(14,'1','A12',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(15,'1','A13',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(16,'1','A14',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(17,'1','A15',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(18,'1','A16',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(19,'1','B1',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(20,'1','B2',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(21,'1','B3',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(22,'1','B4',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(23,'1','B5',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(24,'1','B6',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(25,'1','B7',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(26,'1','B8',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(27,'1','B9',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(28,'1','B10',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(29,'1','B11',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(30,'1','B12',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(31,'1','B13',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(32,'1','B14',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(33,'1','C1',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(34,'1','C2',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(35,'1','C3',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(36,'1','C4',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(37,'1','C5',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(38,'1','C6',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(39,'1','C7',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(40,'1','C8',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(41,'1','C9',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(42,'1','C10',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(43,'1','C11',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(44,'1','C12',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(45,'1','C13',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(46,'1','C14',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(47,'1','D1',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(48,'1','D2',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(49,'1','D3',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(50,'1','D4',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(51,'1','D5',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(52,'1','D6',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(53,'1','D7',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(54,'1','D8',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(55,'1','D9',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(56,'1','D10',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(57,'1','D11',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(58,'1','D12',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(59,'1','D13',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(60,'1','D14',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(61,'1','E1',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(62,'1','E2',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(63,'1','E3',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(64,'1','E4',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(65,'1','E5',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(66,'1','E6',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(67,'1','E7',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(68,'1','E8',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(69,'1','E9',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(70,'1','E10',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(71,'1','E11',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(72,'1','E12',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(73,'1','E13',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(74,'1','E14',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(75,'1','F1',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(76,'1','F2',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(77,'1','F3',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(78,'1','F4',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(79,'1','F5',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(80,'1','F6',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(81,'1','F7',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(82,'1','F8',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(83,'1','F9',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(84,'1','F10',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(85,'1','F11',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(86,'1','F12',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(87,'1','G1',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(88,'1','G2',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(89,'1','G3',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(90,'1','G4',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(91,'1','G5',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(92,'1','G6',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(93,'1','G7',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(94,'1','G8',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(95,'1','G9',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(96,'1','G10',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(97,'1','G11',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(98,'1','G12',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(99,'1','G13',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(100,'1','G14',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(101,'1','G15',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(102,'1','G16',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(103,'1','G17',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(104,'1','G18',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(105,'1','H1',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(106,'1','H2',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(107,'1','H3',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(108,'1','H4',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(109,'1','H5',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(110,'1','H6',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(111,'1','H7',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(112,'1','H8',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(113,'1','H9',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(114,'1','H10',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(115,'1','H11',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(116,'1','H12',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(117,'1','H13',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(118,'1','H14',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(119,'1','H15',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(120,'1','H16',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(121,'1','H17',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(122,'1','H18',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(123,'1','I1',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(124,'1','I2',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(125,'1','I3',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(126,'1','I4',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(127,'1','I5',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(128,'1','I6',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(129,'1','I7',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(130,'1','I8',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(131,'1','I9',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(132,'1','I10',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(133,'1','I11',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(134,'1','I12',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(135,'1','I13',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(136,'1','I14',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(137,'1','I15',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(138,'1','I16',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(139,'1','I17',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(140,'1','I18',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(141,'1','J1',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(142,'1','J2',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(143,'1','J3',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(144,'1','J4',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(145,'1','J5',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(146,'1','J6',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(147,'1','J7',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(148,'1','J8',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(149,'1','J9',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(150,'1','J10',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(151,'1','J11',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(152,'1','J12',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(153,'1','J13',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(154,'1','J14',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(155,'1','J15',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(156,'1','J16',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(157,'1','J17',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(158,'1','J18',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(159,'1','K1',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(160,'1','K2',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(161,'1','K3',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(162,'1','K4',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(163,'1','K5',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(164,'1','K6',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(165,'1','K7',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(166,'1','K8',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(167,'1','K9',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(168,'1','K10',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(169,'1','K11',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(170,'1','K12',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(171,'1','K13',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(172,'1','K14',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(173,'1','K15',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(174,'1','K16',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(175,'1','K17',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(176,'1','K18',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(177,'1','L1',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(178,'1','L2',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(179,'1','L3',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(180,'1','L4',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(181,'1','L5',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(182,'1','L6',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(183,'1','L7',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(184,'1','L8',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(185,'1','L9',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(186,'1','L10',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(187,'1','L11',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(188,'1','L12',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(189,'1','L13',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(190,'1','L14',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(191,'1','L15',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(192,'1','L16',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(193,'1','L17',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(194,'1','L18',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(195,'1','M1',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(196,'1','M2',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(197,'1','M3',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(198,'1','M4',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(199,'1','M5',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(200,'1','M6',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(201,'1','M7',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(202,'1','M8',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(203,'1','M9',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(204,'1','M10',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(205,'1','M11',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(206,'1','M12',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(207,'1','M13',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(208,'1','M14',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(209,'1','M15',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(210,'1','M16',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(211,'1','M17',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(212,'1','M18',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(213,'1','M19',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(214,'1','M20',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(215,'1','N1',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(216,'1','N2',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(217,'1','N3',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(218,'1','N4',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(219,'1','N5',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(220,'1','N6',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(221,'1','N7',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(222,'1','N8',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(223,'1','N9',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(224,'1','N10',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(225,'1','N11',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(226,'1','N12',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(227,'1','N13',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(228,'1','N14',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(229,'1','N15',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(230,'1','N16',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(231,'1','N17',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(232,'1','N18',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(233,'1','N19',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(234,'1','N20',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(235,'1','O1',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(236,'1','O2',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(237,'1','O3',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(238,'1','O4',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(239,'1','O5',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(240,'1','O6',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(241,'1','O7',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(242,'1','O8',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(243,'1','O9',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(244,'1','O10',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(245,'1','O11',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(246,'1','O12',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(247,'1','O13',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(248,'1','O14',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(249,'1','O15',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(250,'1','O16',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(251,'1','O17',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(252,'1','O18',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(253,'1','O19',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(254,'1','O20',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(255,'1','P1',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(256,'1','P2',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(257,'1','P3',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(258,'1','P4',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(259,'1','P5',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(260,'1','P6',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(261,'1','P7',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(262,'1','P8',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(263,'1','P9',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(264,'1','P10',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(265,'1','P11',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(266,'1','P12',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(267,'1','P13',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(268,'1','P14',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(269,'1','P15',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(270,'1','P16',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(271,'1','P17',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(272,'1','P18',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(273,'1','Q1',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(274,'1','Q2',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(275,'1','Q3',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(276,'1','Q4',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(277,'1','Q5',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(278,'1','Q6',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(279,'1','Q7',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(280,'1','Q8',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(281,'1','Q9',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(282,'1','Q10',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(283,'1','Q11',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(284,'1','Q12',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(285,'1','Q13',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(286,'1','Q14',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(287,'1','Q15',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(288,'1','Q16',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(289,'1','Q17',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(290,'1','Q18',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(291,'1','R1',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(292,'1','R2',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(293,'1','R3',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(294,'1','R4',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(295,'1','R5',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(296,'1','R6',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(297,'1','R7',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(298,'1','R8',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(299,'1','R9',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(300,'1','R10',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(301,'1','R11',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(302,'1','R12',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(303,'1','R13',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(304,'1','R14',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(305,'1','R15',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(306,'1','R16',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(307,'1','R17',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(308,'1','R18',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(309,'1','S1',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(310,'1','S2',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(311,'1','S3',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(312,'1','S4',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin'),(313,'1','S5',NULL,'1','0','green','2021-08-03 08:20:46',NULL,NULL,'admin');

#
# Structure for table "tb_konsumen"
#

DROP TABLE IF EXISTS `tb_konsumen`;
CREATE TABLE `tb_konsumen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proyek` varchar(100) DEFAULT NULL,
  `kavling` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `kontak` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `jumlah_pembayaran` int(11) DEFAULT NULL,
  `kurangan_pembayaran` int(11) DEFAULT NULL,
  `jangka_waktu` varchar(10) DEFAULT NULL,
  `nama_marketing` varchar(50) DEFAULT NULL,
  `kontak_marketing` varchar(20) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `create_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tb_konsumen"
#

INSERT INTO `tb_konsumen` VALUES (14,'1','4','Sugimin','4567890',NULL,120000000,45000000,NULL,'4','6785432','Test','2021-07-09 05:28:57','2021-08-13 05:46:15',NULL,NULL),(15,'1','1','Simiarti Handayani','0865458998',NULL,120000000,45000000,NULL,'3','0877121212','Test','2021-07-10 05:11:11','2021-08-13 05:46:33',NULL,NULL),(17,'1','6','Panji','4567890',NULL,234567,45678,NULL,'4','6785432','Test','2021-07-26 10:21:22','2021-08-13 05:45:56',NULL,'admin');

#
# Structure for table "tb_message"
#

DROP TABLE IF EXISTS `tb_message`;
CREATE TABLE `tb_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form` varchar(100) DEFAULT NULL,
  `to` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tb_message"
#

INSERT INTO `tb_message` VALUES (1,'Admin','Admin','Testing','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','2021-07-09 00:00:00',NULL,NULL),(2,'Admin','Admin','Telat bayar ','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','2021-08-12 00:00:00',NULL,NULL);

#
# Structure for table "tb_mitra"
#

DROP TABLE IF EXISTS `tb_mitra`;
CREATE TABLE `tb_mitra` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tb_mitra"
#


#
# Structure for table "tb_proyek"
#

DROP TABLE IF EXISTS `tb_proyek`;
CREATE TABLE `tb_proyek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_proyek` varchar(100) DEFAULT NULL,
  `jumlah_kavling` varchar(100) DEFAULT NULL,
  `sisa_kavling` varchar(100) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `luas` varchar(25) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `site_plan` varchar(255) DEFAULT NULL,
  `progress` varchar(50) DEFAULT NULL,
  `img_proyek` varchar(255) DEFAULT NULL,
  `create_by` varchar(100) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tb_proyek"
#

INSERT INTO `tb_proyek` VALUES (1,'Gran Urbano','100','98','Bekasi','100','Perumahan berkualitas  bersubsidi','application/views/site_plan_proyek/gran_urbano.php',NULL,'./storage/proyek/proyek10.jpg',NULL,NULL,'2021-08-13 04:37:36',NULL),(2,'Pelangi Serra','100','100','Bekasi','100','Test',NULL,NULL,'./storage/proyek/proyek7.jpg',NULL,NULL,'2021-07-19 10:22:42',NULL),(3,'Grand Palazzo','100','100','Bekasi','100','test',NULL,NULL,'./storage/proyek/proyek6.jpg',NULL,'2021-07-07 15:11:37','2021-07-19 08:48:49',NULL),(15,'Grand Testing','1090','1090','Bekasi','1000m','testing',NULL,NULL,'./storage/proyek/proyek13.jpg',NULL,'2021-07-30 09:19:22','2021-08-13 04:28:52',NULL),(16,'aesfrtgy','srtey','werty','strgy','ertreygr','ertyhtgrh',NULL,NULL,'./storage/proyek/proyek1.png',NULL,'2021-08-09 08:25:38',NULL,'2021-08-09 08:26:19');

#
# Structure for table "tb_spesifikasi"
#

DROP TABLE IF EXISTS `tb_spesifikasi`;
CREATE TABLE `tb_spesifikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proyek` varchar(100) DEFAULT NULL,
  `spesifikasi` varchar(100) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=841 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tb_spesifikasi"
#

INSERT INTO `tb_spesifikasi` VALUES (555,'16','2','rtyy','2021-08-09 08:25:38',NULL,NULL),(556,'16','3','edfrthyg','2021-08-09 08:25:38',NULL,NULL),(823,'15','1','adsafd','2021-08-13 04:28:52',NULL,NULL),(824,'15','2','adsafd','2021-08-13 04:28:52',NULL,NULL),(825,'15','9','adsafd','2021-08-13 04:28:52',NULL,NULL),(826,'15','4','sdf','2021-08-13 04:28:52',NULL,NULL),(827,'1','1','Batu Bata','2021-08-13 04:37:36',NULL,NULL),(828,'1','2','Beton Bertulang','2021-08-13 04:37:36',NULL,NULL),(829,'1','3','10 mm SNI','2021-08-13 04:37:36',NULL,NULL),(830,'1','4','15 x 15 cm','2021-08-13 04:37:36',NULL,NULL),(831,'1','5','Batu bata plester dan dicat','2021-08-13 04:37:37',NULL,NULL),(832,'1','6','Flur dalam, keramik teras depan','2021-08-13 04:37:37',NULL,NULL),(833,'1','7','Pintu depan panel (kayu kelas III, kamar double plywood)','2021-08-13 04:37:37',NULL,NULL),(834,'1','8','Gypsum','2021-08-13 04:37:37',NULL,NULL),(835,'1','9','Baja Ringan','2021-08-13 04:37:37',NULL,NULL),(836,'1','10','Multiroof','2021-08-13 04:37:37',NULL,NULL),(837,'1','11','Kalsiplank','2021-08-13 04:37:37',NULL,NULL),(838,'1','12','Kloset jongkok, Bak fiber','2021-08-13 04:37:37',NULL,NULL),(839,'1','13','Sertifikat Hak Milik (SHM)','2021-08-13 04:37:37',NULL,NULL),(840,'1','14','1300 watt','2021-08-13 04:37:37',NULL,NULL);

#
# Structure for table "tb_status"
#

DROP TABLE IF EXISTS `tb_status`;
CREATE TABLE `tb_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(100) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `create_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tb_status"
#

INSERT INTO `tb_status` VALUES (1,'Belum Terjual',NULL,NULL,NULL,NULL),(2,'Booking Fee/DP',NULL,NULL,NULL,NULL),(3,'Proses KPR',NULL,NULL,NULL,NULL),(4,'Proses PPJB CASH',NULL,NULL,NULL,NULL),(5,'Sudah Akad',NULL,NULL,NULL,NULL);

#
# Structure for table "tb_user"
#

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` varchar(10) DEFAULT NULL COMMENT '1. SuperAdmin, 2. Mitra, 3. Marketing',
  `date_added` datetime NOT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `img_user` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

#
# Data for table "tb_user"
#

INSERT INTO `tb_user` VALUES (23,'Sales','c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec','2','2','2021-08-10 09:13:48',NULL,NULL,'./storage/user/download3.png'),(24,'admin','c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec','2','1','2021-08-10 09:36:05','2021-08-12 10:26:40',NULL,'./storage/user/'),(26,'suparno','31bad802efa74226cb7636d47bc34e118b0e6541f12ccd2485fa0de801a14c24db68cc13acbe958c95280542588c3647bbd76c2cc1a4542047a2f947b5a3ee44','4','3','2021-08-12 10:03:58',NULL,'2021-08-12 10:18:08',NULL),(27,'suparno','31bad802efa74226cb7636d47bc34e118b0e6541f12ccd2485fa0de801a14c24db68cc13acbe958c95280542588c3647bbd76c2cc1a4542047a2f947b5a3ee44','4','3','2021-08-12 10:17:59',NULL,'2021-08-12 10:18:04',NULL);
