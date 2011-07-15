--Table Structure for table `wiz_bbspro`
--

DROP TABLE IF EXISTS `wiz_bbspro`;
CREATE TABLE `wiz_bbspro` (
  `code` varchar(30) default NULL,
  `title` varchar(50) default NULL,
  `titleimg` varchar(40) default NULL,
  `level` enum('AM','BM','CM','DM','EM') default NULL,
  `upfile` enum('Y','N') default NULL,
  `comment` enum('Y','N') default NULL,
  `remail` enum('Y','N') default NULL,
  `rows` int(3) default NULL,
  `lists` int(3) default NULL,
  `new` int(3) default NULL,
  `hot` int(3) default NULL,
  `prior` int(3) default NULL,
  `iscom` enum('Y','N') default NULL,
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=euckr;

--
-- Dumping data for table `wiz_bbspro`
--


/*!40000 ALTER TABLE `wiz_bbspro` DISABLE KEYS */;
LOCK TABLES `wiz_bbspro` WRITE;
INSERT INTO `wiz_bbspro` VALUES ('qna','Au���u�a�?','','EM','Y','Y','Y',12,12,1,100,2,'Y'),('free','AUA?�O�A�C','
','EM','Y','Y','Y',12,12,1,100,1,'Y'),('review','.oC�EA�a','','EM','Y','Y','Y',12,12,1,100,1,'Y'),('notice','��Ao.cC�','','AM','Y',NULL,'Y',12,12,1,100,NULL,'N'),('faq','AUAOCI�A�AAu��','','AM','Y',NULL,NULL,12,12,1,100,NULL,'N');
UNLOCK TABLES;
/*!40000 ALTER TABLE `wiz_bbspro` ENABLE KEYS */;


