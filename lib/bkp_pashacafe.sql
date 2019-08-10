-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ayampedas
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB-0+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Temporary table structure for view `billing`
--

DROP TABLE IF EXISTS `billing`;
/*!50001 DROP VIEW IF EXISTS `billing`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `billing` (
  `order_id` tinyint NOT NULL,
  `cat` tinyint NOT NULL,
  `qty` tinyint NOT NULL,
  `orderList_id` tinyint NOT NULL,
  `nama` tinyint NOT NULL,
  `harga` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `menuDropping`
--

DROP TABLE IF EXISTS `menuDropping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menuDropping` (
  `dropping_id` int(6) NOT NULL AUTO_INCREMENT,
  `droppingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `menu_id` int(3) unsigned zerofill DEFAULT NULL,
  `qty` int(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`dropping_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menuDropping`
--

LOCK TABLES `menuDropping` WRITE;
/*!40000 ALTER TABLE `menuDropping` DISABLE KEYS */;
/*!40000 ALTER TABLE `menuDropping` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`chikenspicy`@`localhost`*/ /*!50003 TRIGGER menuListStokAdd AFTER INSERT ON menuDropping
FOR EACH ROW
BEGIN
UPDATE menuList SET stok=stok+new.qty WHERE menu_id=new.menu_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `menuList`
--

DROP TABLE IF EXISTS `menuList`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menuList` (
  `menu_id` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `cat` enum('Makanan','Minuman','Camilan') DEFAULT 'Makanan',
  `nama` varchar(50) NOT NULL,
  `harga` int(5) NOT NULL DEFAULT '0',
  `diskon` float(5,2) DEFAULT '0.00',
  `photo` tinytext,
  `todayMenu` enum('0','1') DEFAULT '0',
  `stok` int(3) DEFAULT '0',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menuList`
--

LOCK TABLES `menuList` WRITE;
/*!40000 ALTER TABLE `menuList` DISABLE KEYS */;
INSERT INTO `menuList` VALUES (001,'Makanan','Chicken Spicy Cheese',10000,0.00,'mangkok.png','0',21),(002,'Makanan','Ayam Geprek Original',10000,0.00,'mangkok.png','0',22),(003,'Makanan','Ayam Geprek Cheese',10000,0.00,'mangkok.png','0',19),(004,'Makanan','Ayam Geprek Cream Cheese',10000,0.00,'mangkok.png','0',18),(005,'Makanan','Ayam Geprek Mozarella',10000,0.00,'mangkok.png','0',22),(006,'Makanan','Chicken Rice Bowl Blackpapper',10000,0.00,'mangkok.png','0',23),(007,'Makanan','Chicken Katsu Teriyaki',10000,0.00,'mangkok.png','0',23),(008,'Makanan','Chicken Cordon Blue',10000,0.00,'mangkok.png','0',22),(009,'Camilan','Chicken Burger Single Chicken',10000,0.00,'mangkok.png','0',24),(010,'Camilan','Chicken Burger Double Chicken',10000,0.00,'mangkok.png','0',25),(011,'Camilan','Zuppa Soup',10000,0.00,'mangkok.png','0',25),(012,'Camilan','Macharoni Schotel',10000,0.00,'mangkok.png','0',24),(013,'Camilan','Pop Corn',10000,0.00,'mangkok.png','0',25),(014,'Camilan','Sambosa',10000,0.00,'mangkok.png','0',25),(015,'Camilan','Sweet Canai',10000,0.00,'mangkok.png','0',25),(016,'Camilan','French Fries',10000,0.00,'mangkok.png','0',19),(017,'Camilan','Roti Bakar',10000,0.00,'mangkok.png','0',24),(018,'Camilan','Chicken Cheese Bals',10000,0.00,'mangkok.png','0',24),(019,'Camilan','Stick Ball Sosis',10000,0.00,'mangkok.png','0',25),(020,'Camilan','Pisang Bakar',10000,0.00,'mangkok.png','0',24),(021,'Camilan','Pisang Bakar Mozarella',10000,0.00,'mangkok.png','0',23),(022,'Camilan','Siomay Ayam',10000,0.00,'mangkok.png','0',25),(023,'Camilan','Sosis Blacpapper Cheese',10000,0.00,'mangkok.png','0',25),(024,'Camilan','Pancake',10000,0.00,'mangkok.png','0',24),(025,'Camilan','Sandwidch Omah All',10000,0.00,'mangkok.png','0',25),(026,'Camilan','Bread Toast Ice',10000,0.00,'mangkok.png','0',25),(027,'Minuman','Ice Tea',6000,0.00,'mangkok.png','0',22),(028,'Minuman','Jus',6000,0.00,'mangkok.png','0',23),(029,'Minuman','Lime Tea',6000,0.00,'mangkok.png','0',25),(030,'Camilan','Taro',10000,0.00,'mangkok.png','0',24),(031,'Minuman','Green Tea',6000,0.00,'mangkok.png','0',23),(032,'Minuman','Leci Tea',6000,0.00,'mangkok.png','0',25),(033,'Minuman','Stroberry Tea',6000,0.00,'mangkok.png','0',25),(034,'Minuman','Milk Tea',6000,0.00,'mangkok.png','0',24),(035,'Minuman','Ice Chocolate',6000,0.00,'mangkok.png','0',23),(036,'Minuman','Ice Coffe',6000,0.00,'mangkok.png','0',23),(037,'Minuman','Blue Ocean',6000,0.00,'mangkok.png','0',25),(038,'Minuman','Lime Squash',6000,0.00,'mangkok.png','0',25),(039,'Minuman','Deep Purple',6000,0.00,'mangkok.png','0',25),(040,'Minuman','Orange Mint Squash',6000,0.00,'mangkok.png','0',24),(041,'Minuman','Mojito Virgin',6000,0.00,'mangkok.png','0',25),(042,'Minuman','Mojito Strawberry',6000,0.00,'mangkok.png','0',25),(043,'Minuman','Hot Tea',6000,0.00,'mangkok.png','0',23),(044,'Minuman','Hot Chocolate',6000,0.00,'mangkok.png','0',22),(045,'Minuman','Kopi Tubruk',6000,0.00,'mangkok.png','0',22),(046,'Minuman','Kopi V60',6000,0.00,'mangkok.png','0',25),(047,'Minuman','Kopi French Press',6000,0.00,'mangkok.png','0',25),(048,'Minuman','Kopi Flat Bottom',6000,0.00,'mangkok.png','0',24),(049,'Minuman','Kopi Vietnam Drip',6000,0.00,'mangkok.png','0',25);
/*!40000 ALTER TABLE `menuList` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menuOrder`
--

DROP TABLE IF EXISTS `menuOrder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menuOrder` (
  `order_id` varchar(13) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `status` enum('unpaid','paid') DEFAULT 'unpaid',
  UNIQUE KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menuOrder`
--

LOCK TABLES `menuOrder` WRITE;
/*!40000 ALTER TABLE `menuOrder` DISABLE KEYS */;
INSERT INTO `menuOrder` VALUES ('10-170816-001','Basuki','paid'),('8-170817-001','Mr. Agus Tuslam','paid'),('09-170818-001','Dawinah','paid'),('01-170818-002','Sajali','paid'),('02-170818-003','Kardimin','paid'),('10-170914-001','japra','paid'),('09-171205-001','Oom Nunuk','paid');
/*!40000 ALTER TABLE `menuOrder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderList`
--

DROP TABLE IF EXISTS `orderList`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orderList` (
  `orderList_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(13) DEFAULT NULL,
  `menu_id` int(3) unsigned zerofill DEFAULT NULL,
  `orderList_status` enum('received','delivered') DEFAULT 'received',
  `qty` int(3) DEFAULT '1',
  PRIMARY KEY (`orderList_id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderList`
--

LOCK TABLES `orderList` WRITE;
/*!40000 ALTER TABLE `orderList` DISABLE KEYS */;
INSERT INTO `orderList` VALUES (1,'10-170816-001',003,'delivered',2),(2,'10-170816-001',001,'delivered',3),(3,'10-170816-001',037,'delivered',1),(4,'10-170816-001',044,'delivered',2),(5,'10-170816-001',036,'delivered',1),(6,'10-170816-001',029,'delivered',1),(7,'10-170816-001',024,'delivered',2),(8,'10-170816-001',020,'delivered',2),(9,'10-170816-001',021,'delivered',1),(10,'8-170817-001',008,'delivered',2),(11,'8-170817-001',007,'delivered',2),(12,'8-170817-001',031,'delivered',1),(14,'8-170817-001',049,'delivered',2),(15,'8-170817-001',031,'delivered',2),(16,'8-170817-001',016,'delivered',4),(18,'8-170817-001',030,'delivered',5),(19,'09-170818-001',007,'delivered',2),(20,'09-170818-001',006,'delivered',2),(21,'09-170818-001',001,'delivered',3),(22,'09-170818-001',031,'delivered',2),(23,'09-170818-001',036,'delivered',2),(26,'09-170818-001',045,'delivered',3),(27,'09-170818-001',016,'delivered',3),(28,'09-170818-001',020,'delivered',2),(29,'09-170818-001',017,'delivered',1),(30,'09-170818-001',030,'delivered',1),(31,'01-170818-002',003,'delivered',2),(32,'01-170818-002',001,'delivered',1),(33,'01-170818-002',044,'delivered',1),(34,'01-170818-002',028,'delivered',1),(35,'01-170818-002',034,'delivered',1),(36,'01-170818-002',016,'delivered',3),(37,'02-170818-003',004,'delivered',2),(38,'02-170818-003',040,'delivered',1),(39,'02-170818-003',048,'delivered',1),(40,'02-170818-003',009,'delivered',1),(41,'02-170818-003',018,'delivered',1),(42,'01-170818-002',024,'delivered',1),(53,'09-171205-001',003,'delivered',2),(54,'09-171205-001',004,'delivered',2),(55,'09-171205-001',043,'delivered',2),(56,'09-171205-001',035,'delivered',2),(57,'09-171205-001',012,'delivered',1),(58,'09-171205-001',020,'delivered',1),(59,'09-171205-001',021,'delivered',2);
/*!40000 ALTER TABLE `orderList` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`chikenspicy`@`localhost`*/ /*!50003 TRIGGER menuListStokReduce AFTER INSERT ON orderList
FOR EACH ROW 
BEGIN 
UPDATE menuList SET stok=stok-new.qty WHERE menu_id=new.menu_id; 
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `billing`
--

/*!50001 DROP TABLE IF EXISTS `billing`*/;
/*!50001 DROP VIEW IF EXISTS `billing`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`chikenspicy`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `billing` AS select `orderList`.`order_id` AS `order_id`,`menuList`.`cat` AS `cat`,`orderList`.`qty` AS `qty`,`orderList`.`orderList_id` AS `orderList_id`,`menuList`.`nama` AS `nama`,((`menuList`.`harga` * (1 - `menuList`.`diskon`)) * `orderList`.`qty`) AS `harga` from (`orderList` join `menuList`) where (`menuList`.`menu_id` = `orderList`.`menu_id`) */;
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

-- Dump completed on 2018-02-19 20:14:50
