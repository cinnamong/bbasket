-- MySQL dump 10.9
--
-- Host: localhost    Database: brownbasket3
-- ------------------------------------------------------
-- Server version	4.1.13a-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `wiz_basket`
--

DROP TABLE IF EXISTS `wiz_basket`;
CREATE TABLE `wiz_basket` (
  `idx` int(10) NOT NULL auto_increment,
  `basketid` char(32) default NULL,
  `prdcode` char(10) default NULL,
  `prdname` char(100) default NULL,
  `prdimg` char(30) default NULL,
  `prdprice` int(10) default NULL,
  `prdreserve` int(10) default NULL,
  `opttitle` char(50) default NULL,
  `optcode` char(50) default NULL,
  `opttitle2` char(50) default NULL,
  `optcode2` char(50) default NULL,
  `opttitle3` char(50) default NULL,
  `optcode3` char(50) default NULL,
  `amount` int(5) default NULL,
  `wdate` datetime default NULL,
  `status` char(2) default NULL,
  PRIMARY KEY  (`idx`)
) ENGINE=MyISAM DEFAULT CHARSET=euckr;

--
-- Dumping data for table `wiz_basket`
--


/*!40000 ALTER TABLE `wiz_basket` DISABLE KEYS */;
LOCK TABLES `wiz_basket` WRITE;
INSERT INTO `wiz_basket` VALUES (8,'c3bbc56d3f11045e300c25a85d6c06ad','0509080018','[쿨독옴므]밀라노포인트가디건','0509080018_R.jpg',29800,2980,'','','','','','',1,'2006-03-29 13:30:48',''),(9,'90976b07d5ca304808289b740d32f21f','0509080021','실버 큐티플라이 다이아 목걸이','0509080021_R.jpg',10000,1000,'','','','','','',1,'2006-03-29 13:54:39',''),(10,'90976b07d5ca304808289b740d32f21f','0509080014','[월튼레이디스-기획특가상품]캘리후드짚업점퍼','0509080014_R.jpg',99000,9900,'','','','','','',2,'2006-03-29 13:54:39',''),(11,'3377015b2d06aa27858913a570fc5b0d','0509080017','[COOLDOG]베이직코듀로이패딩점퍼','0509080017_R.jpg',350000,35000,'','','','','','',1,'2006-03-29 13:59:30',''),(12,'d06f6ad11e1c7fcc7f09749a3a34445e','0509080007','[삼성] DM-Z45/MCE1 + 19LCD (P4 531(3.0G)/ 512MB/ 160G/ DVD-Dual)','0509080007_R.jpg',1800000,180000,'','','','','','',1,'2006-04-10 16:17:05',''),(13,'fa38af0504b35b19cfd39dcfe214d211','0509080006','[보상판매][삼성] DM-Z45/K290 + 17LCD (P4 515(2.93G)/ 512MB/ 160G/ COMBO)','0509080006_R.jpg',2150000,215000,'','','','','','',1,'2006-05-13 10:33:05','OY'),(14,'81501f13c0693f6794362c9466e75286','0509080020','[월튼-기획특가상품]일러스트라운드티셔츠','0509080020_R.jpg',9000,900,'','','','','','',1,'2006-06-01 13:25:59','');
UNLOCK TABLES;
/*!40000 ALTER TABLE `wiz_basket` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

