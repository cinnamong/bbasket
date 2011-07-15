-- Table structure for table `wiz_bbs`
--

DROP TABLE IF EXISTS `wiz_bbs`;
CREATE TABLE `wiz_bbs` (
  `idx` int(10) default NULL,
  `code` varchar(30) default NULL,
  `prino` int(10) default NULL,
  `subno` int(5) default NULL,
  `depno` int(2) default NULL,
  `notice` char(1) default NULL,
  `name` varchar(20) default NULL,
  `email` varchar(50) default NULL,
  `subject` varchar(100) default NULL,
  `content` text,
  `ctype` enum('T','H') default NULL,
  `privacy` enum('Y','N') default NULL,
  `upfile` varchar(40) default NULL,
  `passwd` varchar(30) default NULL,
  `count` int(8) default NULL,
  `wdate` date default NULL,
  KEY `code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=euckr;

--
-- Dumping data for table `wiz_bbs`
--


/*!40000 ALTER TABLE `wiz_bbs` DISABLE KEYS */;
LOCK TABLES `wiz_bbs` WRITE;
INSERT INTO `wiz_bbs` VALUES (5,'notice',5,0,0,'','A§Ai¼.','help@wizshop.net','¼iCI¸o ¿ACA AØºnAß AO´I´U.','<P>¼i
CI¸o ¿ACA AØºnAß AO´I´U.</P>','','','','1111',0,'2004-04-20'),(1,'notice',1,0,0,'','A§Ai¼.','help@wizshop.net','>¼iCI¸o ¿ACA AØºnAß AO´I´U.','¼iCI¸o ¿ACA AØºnAß AO´I´U.\r\n<P>&nbsp;</P>','','','','1111',0,'2004-04-20'),(2,'notice',2,0,0,'','A§Ai¼.','help@wizshop.net','¼iCI¸o ¿ACA AØºnAß AO´I´U.','<P>¼iCI¸o ¿ACA AØºnAß AO´I´U.</P>','','','','1111',0,'2004-04-20'),(3,'notice',3,0,0,'','A§Ai¼.','help@wizshop.net','¼iCI¸o ¿ACA AØºnAß AO´I´U.','¼iCI¸o >¿ACA AØºnAß AO´I´U.\r\n<P>&nbsp;</P>','','','','1111',0,'2004-04-20'),(4,'notice',4,0,0,'','A§Ai¼.','help@wizshop.net','¼iCI¸o ¿ACA AØºnAß AO´I´U.','¼iCI¸o ¿ACA AØºnAß AO´I´U.\r\n<P>&nbsp;</P>','','','','1111',0,'2004-04-20'),(6,'notice',6,0,0,'','A§Ai¼.','help@wizshop.net','¼iCI¸o ¿ACA AØºnAß AO´I´U.','<P>¼iCI¸o ¿ACA AØºnAß AO´I´U.</P>','','','','1111',0,'2004-04-20');
UNLOCK TABLES;
/*!40000 ALTER TABLE `wiz_bbs` ENABLE KEYS */;


