drop table wiz_bbsinfo;

create table wiz_bbsinfo(

code char(30),				-- °Ô½ÃÆÇÄÚµå
title char(50),			-- Å¸ÀÌÆ²
titleimg char(40),		-- Å¸ÀÌÆ²ÀÌ¹ÌÁö

lpermi char(2),			-- ¸ñ·Ï±ÇÇÑ
rpermi char(2),			-- ÀÐ±â±ÇÇÑ
wpermi char(2),			-- ¾²±â±ÇÇÑ

skin char(20),				-- ½ºÅ²Å¸ÀÔ
usetype enum('Y','N'),	-- »ç¿ë¿©ºÎ
upfile enum('Y','N'),	-- ÆÄÀÏ¾÷·ÎµåÇã¿ë
comment enum('Y','N'),	-- µ«±ÛÇã¿ë
remail enum('Y','N'),	-- ´ä±Û¸ÞÀÏ¾Ë¸²
imgview enum('Y','N'),	-- Ã·ºÎÀÌ¹ÌÁö º¸±â
abuse text,					-- ±ÛÇÊÅÍ¸µ

rows int(3),				-- ÆäÀÌÁöÃâ·Â¼ö
lists int(3),				-- ¸®½ºÆ®Ãâ·Â¼ö
new int(3),					-- new±â°£¼³Á¤
hot int(3),					-- hotÁ¶È¸¼ö¼³Á¤
grp varchar(20),
unique(code)

);

--
-- Dumping data for table `wiz_bbsinfo`
--


/*!40000 ALTER TABLE `wiz_bbspro` DISABLE KEYS */;
INSERT INTO `wiz_bbsinfo` VALUES 
('qna','Au¹®°u´aº?','','','','','','Y','Y','Y','Y','Y','',12,12,1,100,NULL),
('free','AUA?°O½AÆC','','','','','','Y','Y','Y','Y','Y','',12,12,1,100,NULL),
('review','.oC°EA±a','','','','','','Y','Y','Y','Y','Y','',12,12,1,100,NULL),
('notice','°øAo.cC×','','','','','','Y','Y',NULL,'Y','Y','',12,12,1,100,NULL),
('faq','AUAOCI½A´AAu¹®','','','','','','Y''Y',NULL,NULL,'Y','',12,12,1,100,NULL),
('babycare','babycare','','','','','','Y','Y','Y','Y','Y','',12,12,1,100,NULL);


