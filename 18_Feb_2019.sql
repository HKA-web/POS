-- MySQL dump 10.16  Distrib 10.1.29-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: example_penjualan
-- ------------------------------------------------------
-- Server version	10.1.29-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barang` (
  `kd_barang` char(4) NOT NULL,
  `nm_barang` varchar(200) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `diskon` int(3) NOT NULL,
  `stok` int(3) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `kd_kategori` char(3) NOT NULL,
  PRIMARY KEY (`kd_barang`),
  KEY `kd_kategori` (`kd_kategori`),
  CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kd_kategori`) REFERENCES `kategori` (`kd_kategori`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` VALUES ('B001','Bluespurple batik with bolero dress',80000,120000,10,17,'Elegan','K01'),('B002','Greenpink batik dress with bolero',80000,120000,10,1,'Elegan','K01'),('B003','Chifon Browngrey batik blouse',80000,125000,10,24,'keren','K01'),('B004','Brown print Batik dress',85000,135000,10,37,'Elegan','K01'),('B005','Green Dewi batik dress',80000,125000,10,28,'baru','K01'),('B006','Shine fuchsia batwing blouse',85000,85000,10,9,'baru','K01'),('B007','Purple leaves batik dress',70000,98000,10,4,'baru','K01'),('B008','Batwing white top',75000,110000,10,30,'baru','K02'),('B009','Black candy sifon',80000,120000,10,19,'baru','K02'),('B010','Tops Lace flower Red',75000,99000,10,13,'baru','K02'),('B011','Tops Lace flower Black',75000,99000,10,30,'baru','K02'),('B012','Tops Lace flower Grey',75000,99000,10,27,'baru','K02'),('B013','Knit Tunic Grey',90000,140000,10,11,'baru','K02'),('B014','Fuchsia flowR minidress',95000,130000,10,11,'baru','K03'),('B015','Blackline jeans minidress',90000,120000,10,20,'baru','K03'),('B016','Black midi Zipper with belt',90000,120000,10,30,'baru','K03'),('B017','Orange Polka ribbon minidress',75000,108000,10,68,'baru','K03'),('B018','Krancang Kebaya Purple',140000,185000,10,29,'baru','K04'),('B019','Krancang Kebaya Green',140000,185000,10,110,'baru','K04'),('B020','Krancang Kebaya Bronze',135000,185000,10,100,'baru','K04'),('B021','Krancang FlowR Line Purple',135000,185000,10,57,'baru','K04'),('B022','Gamis + Jilbab BlackPurple',135000,185000,10,99,'baru','K06'),('B023','Gamis   Jilbab BlackRed',135000,185000,10,201,'baru','K03'),('B024','Gamis   Jilbab BlackBlue',135000,185000,10,100,'baru','K03'),('B025','safir',200000,250000,25,21,'asdas','K05'),('B026','Pigora2',2000,3000,0,110,'baik','K06');
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori` (
  `kd_kategori` char(3) NOT NULL,
  `nm_kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES ('K01','Women Batik'),('K02','Women Blouse'),('K03','Women Dress'),('K04','Busana Muslim'),('K05','Moslem Blues'),('K06','Moslem Gamis');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembelian`
--

DROP TABLE IF EXISTS `pembelian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembelian` (
  `no_pembelian` char(7) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `kd_supplier` char(3) NOT NULL,
  `total` int(7) NOT NULL,
  `userid` varchar(20) NOT NULL,
  PRIMARY KEY (`no_pembelian`),
  KEY `kd_supplier` (`kd_supplier`),
  CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`kd_supplier`) REFERENCES `supplier` (`kd_supplier`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembelian`
--

LOCK TABLES `pembelian` WRITE;
/*!40000 ALTER TABLE `pembelian` DISABLE KEYS */;
INSERT INTO `pembelian` VALUES ('00001','2019-01-01','Ok','S03',4000,'2'),('00002','2019-02-04','OK','S01',1602000,'1'),('00003','2019-02-04','ok','S01',200000,'1');
/*!40000 ALTER TABLE `pembelian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembelian_item`
--

DROP TABLE IF EXISTS `pembelian_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembelian_item` (
  `no_pembelian` char(7) NOT NULL,
  `kd_barang` char(4) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `jumlah` int(3) NOT NULL,
  KEY `no_pembelian` (`no_pembelian`,`kd_barang`),
  KEY `kd_barang` (`kd_barang`),
  CONSTRAINT `pembelian_item_ibfk_1` FOREIGN KEY (`no_pembelian`) REFERENCES `pembelian` (`no_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pembelian_item_ibfk_2` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembelian_item`
--

LOCK TABLES `pembelian_item` WRITE;
/*!40000 ALTER TABLE `pembelian_item` DISABLE KEYS */;
INSERT INTO `pembelian_item` VALUES ('00001','B026',2000,2),('00002','B026',2000,1),('00002','B025',200000,8),('00003','B026',2000,100);
/*!40000 ALTER TABLE `pembelian_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penjualan`
--

DROP TABLE IF EXISTS `penjualan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penjualan` (
  `no_penjualan` char(7) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `pelanggan` varchar(60) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `total` int(7) NOT NULL,
  `userid` varchar(20) NOT NULL,
  PRIMARY KEY (`no_penjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penjualan`
--

LOCK TABLES `penjualan` WRITE;
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
INSERT INTO `penjualan` VALUES ('00001','2019-01-26','Umum','Lunas',3000,'1'),('00002','2019-02-03','Umum','Lunas',1503000,'1'),('00003','2019-02-04','Umum','Lunas',1687500,'1'),('00004','2019-02-04','Umum','Lunas',652500,'1'),('00005','2019-02-05','Umum','Lunas',88200,'1'),('00006','2019-02-10','Den Bagus','Lunas',1143900,'1'),('00007','2019-02-10','Fornite','Lunas',4830000,'1'),('00008','2019-02-10','Umum','Lunas',216000,'1'),('00009','2019-02-10','Umum','Lunas',187500,'1'),('00010','2019-02-10','Umum','Lunas',196200,'1'),('00011','2019-02-11','Umum','Lunas',108000,'1'),('00012','2019-02-11','Umum','Lunas',421200,'1'),('00013','0000-00-00','Umum','Lunas',108000,'1'),('00014','2019-02-18','Umum','Lunas',108000,'1'),('00015','2019-02-18','Umum','Lunas',184500,'1');
/*!40000 ALTER TABLE `penjualan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penjualan_item`
--

DROP TABLE IF EXISTS `penjualan_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penjualan_item` (
  `no_penjualan` char(7) NOT NULL,
  `kd_barang` char(4) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `jumlah` int(3) NOT NULL,
  KEY `kd_barang` (`kd_barang`),
  KEY `no_penjualan` (`no_penjualan`),
  CONSTRAINT `penjualan_item_ibfk_1` FOREIGN KEY (`no_penjualan`) REFERENCES `penjualan` (`no_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penjualan_item_ibfk_2` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penjualan_item`
--

LOCK TABLES `penjualan_item` WRITE;
/*!40000 ALTER TABLE `penjualan_item` DISABLE KEYS */;
INSERT INTO `penjualan_item` VALUES ('00001','B026',3000,1),('00002','B026',3000,1),('00002','B025',187500,8),('00003','B025',187500,9),('00004','b001',108000,2),('00004','b002',108000,3),('00004','b005',112500,1),('00005','b007',88200,1),('00006','b006',76500,1),('00006','b007',88200,2),('00006','b010',89100,10),('00007','b002',108000,10),('00007','b025',187500,20),('00008','b001',108000,1),('00008','b002',108000,1),('00009','b025',187500,1),('00010','b007',88200,1),('00010','b009',108000,1),('00011','b001',108000,1),('00012','b002',108000,1),('00012','b003',112500,1),('00012','b005',112500,1),('00012','b007',88200,1),('00013','B001',108000,1),('00014','b001',108000,1),('00015','b002',108000,1),('00015','b006',76500,1);
/*!40000 ALTER TABLE `penjualan_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier` (
  `kd_supplier` char(3) NOT NULL,
  `nm_supplier` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  PRIMARY KEY (`kd_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES ('S01','Indah Taylor','Wayabung, TuBa, Lampung','083123678209'),('S02','Jogja Fashion','Way Jepara, Lampung Timur','082212908212'),('S03','Bunafit Fashion','Bantul, Yogyakarta','085678920902');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmp_pembelian`
--

DROP TABLE IF EXISTS `tmp_pembelian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmp_pembelian` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `kd_barang` char(4) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `qty` int(3) NOT NULL,
  `userid` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kd_barang` (`kd_barang`),
  CONSTRAINT `tmp_pembelian_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp_pembelian`
--

LOCK TABLES `tmp_pembelian` WRITE;
/*!40000 ALTER TABLE `tmp_pembelian` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmp_pembelian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmp_penjualan`
--

DROP TABLE IF EXISTS `tmp_penjualan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmp_penjualan` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `kd_barang` char(4) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `qty` int(3) NOT NULL,
  `userid` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kd_barang` (`kd_barang`),
  CONSTRAINT `tmp_penjualan_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp_penjualan`
--

LOCK TABLES `tmp_penjualan` WRITE;
/*!40000 ALTER TABLE `tmp_penjualan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmp_penjualan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_login`
--

DROP TABLE IF EXISTS `user_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_login` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `userid` varchar(45) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` enum('Kasir','Admin') NOT NULL DEFAULT 'Kasir',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_login`
--

LOCK TABLES `user_login` WRITE;
/*!40000 ALTER TABLE `user_login` DISABLE KEYS */;
INSERT INTO `user_login` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','Bunafit Nugroho','Admin'),(2,'kasir','c7911af3adbd12a035b289556d96470a','Septi Suhesti','Kasir');
/*!40000 ALTER TABLE `user_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `view_beli`
--

DROP TABLE IF EXISTS `view_beli`;
/*!50001 DROP VIEW IF EXISTS `view_beli`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_beli` (
  `tahun` tinyint NOT NULL,
  `beli` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `view_jual`
--

DROP TABLE IF EXISTS `view_jual`;
/*!50001 DROP VIEW IF EXISTS `view_jual`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_jual` (
  `tahun` tinyint NOT NULL,
  `jual` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `view_labarugi`
--

DROP TABLE IF EXISTS `view_labarugi`;
/*!50001 DROP VIEW IF EXISTS `view_labarugi`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_labarugi` (
  `tahun` tinyint NOT NULL,
  `beli` tinyint NOT NULL,
  `jual` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view_beli`
--

/*!50001 DROP TABLE IF EXISTS `view_beli`*/;
/*!50001 DROP VIEW IF EXISTS `view_beli`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_beli` AS select substr(`pembelian`.`tgl_transaksi`,1,4) AS `tahun`,sum(`pembelian`.`total`) AS `beli` from `pembelian` group by year(`pembelian`.`tgl_transaksi`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_jual`
--

/*!50001 DROP TABLE IF EXISTS `view_jual`*/;
/*!50001 DROP VIEW IF EXISTS `view_jual`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_jual` AS select substr(`penjualan`.`tgl_transaksi`,1,4) AS `tahun`,sum(`penjualan`.`total`) AS `jual` from `penjualan` group by year(`penjualan`.`tgl_transaksi`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_labarugi`
--

/*!50001 DROP TABLE IF EXISTS `view_labarugi`*/;
/*!50001 DROP VIEW IF EXISTS `view_labarugi`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_labarugi` AS select `a`.`tahun` AS `tahun`,`a`.`beli` AS `beli`,`b`.`jual` AS `jual` from (`view_beli` `a` join `view_jual` `b` on((`a`.`tahun` = `b`.`tahun`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-18 20:36:05
