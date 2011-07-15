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
-- Table structure for table `wiz_order`
--

DROP TABLE IF EXISTS `wiz_order`;
CREATE TABLE `wiz_order` (
  `orderid` varchar(20) NOT NULL default '',
  `basketid` varchar(32) default NULL,
  `send_id` varchar(20) default NULL,
  `send_name` varchar(20) default NULL,
  `send_tphone` varchar(14) default NULL,
  `send_hphone` varchar(14) default NULL,
  `send_email` varchar(50) default NULL,
  `send_post` varchar(7) default NULL,
  `send_address` varchar(80) default NULL,
  `demand` text,
  `message` text,
  `rece_name` varchar(20) default NULL,
  `rece_tphone` varchar(14) default NULL,
  `rece_hphone` varchar(14) default NULL,
  `rece_post` varchar(7) default NULL,
  `rece_address` varchar(80) default NULL,
  `pay_method` enum('PB','PC','PH','PI') default NULL,
  `account_name` varchar(20) default NULL,
  `account` varchar(80) default NULL,
  `reserve_use` int(10) default NULL,
  `reserve_price` int(10) default NULL,
  `deliver_price` int(10) default NULL,
  `deliver_num` varchar(32) default NULL,
  `discount_price` int(10) default NULL,
  `prd_price` int(10) default NULL,
  `total_price` int(10) default NULL,
  `status` varchar(2) default NULL,
  `order_date` datetime default NULL,
  `pay_date` datetime default NULL,
  `send_date` datetime default NULL,
  `cancel_date` datetime default NULL,
  `descript` text,
  PRIMARY KEY  (`orderid`),
  KEY `pay_method` (`pay_method`,`send_id`,`status`)
) ENGINE=MyISAM DEFAULT CHARSET=euckr;

--
-- Dumping data for table `wiz_order`
--


/*!40000 ALTER TABLE `wiz_order` DISABLE KEYS */;
LOCK TABLES `wiz_order` WRITE;
INSERT INTO `wiz_order` VALUES ('060513103258307','fa38af0504b35b19cfd39dcfe214d211','wizshop','위즈샵','02-586-3827','011-9406-3827','help@wizshop.co.kr','137-070','서울 서초구 서초동 1598-14번지 7층','','',' 위즈샵','02-586-3827','011-9406-3827','137-070','서울 서초구 서초동 1598-14번지 7층','PB','전체관리자','국민은행 484201-01-127831 위즈샵',0,0,0,'',0,2150000,2150000,'OY','2006-05-13 10:33:05','2006-05-13 10:34:23','0000-00-00 00:00:00','0000-00-00 00:00:00',''),('060601132544938','81501f13c0693f6794362c9466e75286','wizshop','위즈샵','02-586-3827','011-9406-3827','help@wizshop.co.kr','137-070','서울 서초구 서초동 1598-14번지 7층','','','위즈샵','02-586-3827','011-9406-3827','137-070','서울 서초구 서초동 1598-14번지 7층','PB','위즈샵','국민은행 484201-01-127831 위즈샵',12000,0,3000,'',0,9000,0,'OY','2006-06-01 13:25:59','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','');
UNLOCK TABLES;
/*!40000 ALTER TABLE `wiz_order` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

