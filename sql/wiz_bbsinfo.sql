drop table wiz_bbsinfo;

create table wiz_bbsinfo(

code char(30),				-- �Խ����ڵ�
title char(50),			-- Ÿ��Ʋ
titleimg char(40),		-- Ÿ��Ʋ�̹���

lpermi char(2),			-- ��ϱ���
rpermi char(2),			-- �б����
wpermi char(2),			-- �������

skin char(20),				-- ��ŲŸ��
usetype enum('Y','N'),	-- ��뿩��
upfile enum('Y','N'),	-- ���Ͼ��ε����
comment enum('Y','N'),	-- �������
remail enum('Y','N'),	-- ��۸��Ͼ˸�
imgview enum('Y','N'),	-- ÷���̹��� ����
abuse text,					-- �����͸�

rows int(3),				-- ��������¼�
lists int(3),				-- ����Ʈ��¼�
new int(3),					-- new�Ⱓ����
hot int(3),					-- hot��ȸ������
grp varchar(20),
unique(code)

);

--
-- Dumping data for table `wiz_bbsinfo`
--


/*!40000 ALTER TABLE `wiz_bbspro` DISABLE KEYS */;
INSERT INTO `wiz_bbsinfo` VALUES 
('qna','Au���u�a�?','','','','','','Y','Y','Y','Y','Y','',12,12,1,100,NULL),
('free','AUA?�O�A�C','','','','','','Y','Y','Y','Y','Y','',12,12,1,100,NULL),
('review','.oC�EA�a','','','','','','Y','Y','Y','Y','Y','',12,12,1,100,NULL),
('notice','��Ao.cC�','','','','','','Y','Y',NULL,'Y','Y','',12,12,1,100,NULL),
('faq','AUAOCI�A�AAu��','','','','','','Y''Y',NULL,NULL,'Y','',12,12,1,100,NULL),
('babycare','babycare','','','','','','Y','Y','Y','Y','Y','',12,12,1,100,NULL);


