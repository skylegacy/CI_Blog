-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: skypony
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.16.04.1

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
-- Table structure for table `article_item`
--

DROP TABLE IF EXISTS `article_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_item` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(120) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8_unicode_ci,
  `tb_name` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'ainfo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_item`
--

LOCK TABLES `article_item` WRITE;
/*!40000 ALTER TABLE `article_item` DISABLE KEYS */;
INSERT INTO `article_item` VALUES (2,'宜蘭人故事館開幕(未經ckeditor格式化)','在地文化結合建築與工藝之美的宜蘭人故事館的修復，是活化舊議會市政推行最重要的政策之一，各界的幫忙也讓宜蘭故事館營運的方向得以更多元，加上每週五晚上7點舉辦的全國薩克斯風嘉年華競賽，集合所有好手在視聽教育館內同場競技，歡迎民眾一同參與和體驗\r\n ','ainfo'),(4,'編輯功能測試','<p>fckeditor success</p>\r\n\r\n<p>編輯功能同時修改tag</p>\r\n','ainfo'),(6,'國內外文化齊聚寰宇市集，在童玩節看見世界！','<p>2018宜蘭國際童玩藝術節今(7)日在冬山河親水公園盛大開幕，來自22國、29個團隊齊聚宜蘭，宛若一個小型聯合國；超大水域遊戲「飛魚海盜船」及琳瑯滿目的各項活動與展覽，將陪伴來訪的遊客們度過最難忘的暑假。宜蘭縣代理縣長陳金德、宜蘭縣議會議長陳文昌與一路伴隨童玩節成長的秘克琳神父等人一同歡迎世界各地的朋友們到童玩節「童心大進擊」。</p>\r\n','ainfo'),(7,'武荖坑溪戲水為何22年來未開放？','<p>陳金德縣長說，武荖坑溪也有「苦花」（魚名），前縣議員林正標還到武荖坑抓螃蟹，陳金麟鎮長也知道，20多年來沒有開放，主要是因為武荖坑太常發生事情， 現在把溪流整理得淺一些，大約在50公分以下，增設監視系統、廣播系統，另外設兩個醫護站，3個救生員據點。最重要的還是遊客要多注意安全，父母親不能疏於照顧小朋友，安全最重要。</p>\r\n\r\n<p>$array[&#39;description&#39;]$array[&#39;description&#39;]</p>\r\n','ainfo'),(8,'「35世代」多人樂在單身少子化趨勢將更明顯','<p>介於30到39歲間的35世代，有許多人樂在單身，除了有時間安排自己的生活，金錢方面也能自行掌控，台灣目前25到34歲間未婚人口就佔了6成，不過單身族該怎麼存錢，才能負擔起退休後的醫療費用是個問題，而不婚主義也導致少子化現象越趨明顯，將可能對未來的台灣社會形成一股壓力。 Alice</p>\r\n','ainfo'),(9,'新增功能測試','<p>ckeditor成功更新表單ckeditor成功更新表單</p>\r\n','ainfo'),(10,'fckeditor 測試','<h3>這是h3標籤</h3>\r\n\r\n<p>這是p標籤這是p標籤這是p標籤這是p標籤這是p標籤這是p標籤這是p標籤這是p標籤<br>\r\n這是p標籤這是p標籤這是p標籤這是p標籤這是p標籤</p>\r\n\r\n<p> </p>\r\n','ainfo'),(11,'無限級分類寫入','<h3>\"\"特殊字元輸入測試</h3>\r\n\r\n<p>運用樹資料結構</p>\r\n','ainfo'),(12,'多重無限級分類測試','<p>多重無限級分類 增刪修查 選取測試</p>\r\n','ainfo'),(13,'整合測試','<p>無限級分類增刪改讀</p>\r\n','ainfo'),(14,'前端ajax測試','<p>前端 或 後端</p>\r\n','ainfo'),(15,'網站漂不漂亮、時不時尚，對投資報酬率沒有太大關係。能帶來實質收入的是流量','<p>範例已清楚說明，研究網頁設計行情之前，你應該規劃內容行銷策略（並有效執行）。在這個<strong>內容為王</strong>年代，設計一些漂亮的網頁，並不能保證網站會有正向ROI。</p>\r\n\r\n<p> </p>\r\n','ainfo'),(16,'東奧正名','<p>請大家支持</p>\r\n','ainfo'),(17,'武舉人宅','<p>陳家古宅是武舉人宅，有登瀛書院</p>\r\n','ainfo');
/*!40000 ALTER TABLE `article_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cate_insec_article`
--

DROP TABLE IF EXISTS `cate_insec_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cate_insec_article` (
  `cateId` int(4) NOT NULL,
  `acleId` smallint(5) unsigned NOT NULL,
  `tb_name` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'iscCA',
  PRIMARY KEY (`cateId`,`acleId`),
  KEY `acleId` (`acleId`),
  CONSTRAINT `cate_insec_article_fk_1` FOREIGN KEY (`cateId`) REFERENCES `cate_tree` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cate_insec_article_fk_2` FOREIGN KEY (`acleId`) REFERENCES `article_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cate_insec_article`
--

LOCK TABLES `cate_insec_article` WRITE;
/*!40000 ALTER TABLE `cate_insec_article` DISABLE KEYS */;
INSERT INTO `cate_insec_article` VALUES (9,15,'iscCA'),(16,14,'iscCA'),(16,15,'iscCA'),(20,15,'iscCA'),(21,16,'iscCA'),(23,10,'iscCA'),(23,11,'iscCA'),(23,12,'iscCA'),(23,13,'iscCA'),(23,14,'iscCA'),(27,10,'iscCA'),(29,11,'iscCA'),(29,12,'iscCA'),(30,17,'iscCA'),(31,17,'iscCA');
/*!40000 ALTER TABLE `cate_insec_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cate_tree`
--

DROP TABLE IF EXISTS `cate_tree`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cate_tree` (
  `name` varchar(56) COLLATE utf8_unicode_ci NOT NULL,
  `lft` int(4) unsigned NOT NULL,
  `rgt` int(4) unsigned NOT NULL,
  `tb_name` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'cate',
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`lft`,`rgt`),
  UNIQUE KEY `onlydiffName` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cate_tree`
--

LOCK TABLES `cate_tree` WRITE;
/*!40000 ALTER TABLE `cate_tree` DISABLE KEYS */;
INSERT INTO `cate_tree` VALUES ('root',1,36,'cate',1,NULL),('經濟',34,35,'cate',9,1),('旅遊',22,33,'cate',12,1),('亞洲',27,32,'cate',13,12),('歐洲',25,26,'cate',14,12),('美洲',23,24,'cate',15,12),('台灣',30,31,'cate',16,13),('日本',28,29,'cate',17,13),('娛樂',20,21,'cate',20,1),('在地新聞',14,19,'cate',21,1),('宜蘭',15,16,'cate',22,21),('電腦科學',12,13,'cate',23,1),('羅東',17,18,'cate',24,21),('教會',6,11,'cate',26,1),('長老教會',9,10,'cate',27,26),('資料庫',7,8,'cate',29,23),('文化',2,5,'cate',30,1),('古宅',3,4,'cate',31,30);
/*!40000 ALTER TABLE `cate_tree` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_authority`
--

DROP TABLE IF EXISTS `member_authority`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_authority` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `auth_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tb_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'mauth',
  PRIMARY KEY (`id`,`tb_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_authority`
--

LOCK TABLES `member_authority` WRITE;
/*!40000 ALTER TABLE `member_authority` DISABLE KEYS */;
INSERT INTO `member_authority` VALUES (1,'users','mauth'),(2,'admin','mauth');
/*!40000 ALTER TABLE `member_authority` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_info`
--

DROP TABLE IF EXISTS `member_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_info` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `member_ac` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `member_pw` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `fk_member_auth` smallint(5) unsigned DEFAULT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tb_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'minfo',
  PRIMARY KEY (`id`,`tb_name`),
  UNIQUE KEY `member_ac` (`member_ac`,`member_pw`),
  UNIQUE KEY `member_pw` (`member_pw`),
  KEY `fk_member_auth` (`fk_member_auth`),
  CONSTRAINT `member_info_ibfk_1` FOREIGN KEY (`fk_member_auth`) REFERENCES `member_authority` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_info`
--

LOCK TABLES `member_info` WRITE;
/*!40000 ALTER TABLE `member_info` DISABLE KEYS */;
INSERT INTO `member_info` VALUES (1,'chenyd','Y3lkNDUwNTIy',1,'chenyd@gmail.com','彥斗','minfo'),(2,'Mia','bTM0',1,NULL,NULL,'minfo'),(3,'wohaha','MDc4ODYw',1,'wohaha@gmail.com','亞亞','minfo'),(7,'Liya','NDMyNTY=',1,'Liya@cc','Liya','minfo'),(8,'cherry','NDcyMQ==',1,'cherry@tt','cherry','minfo'),(9,'amila','YW04ODc=',1,'amila@rr','amila','minfo'),(11,'CharlieChen','NDQ5MDUyNzg=',1,'cc@gmail.com','CC','minfo'),(12,'HannahTang','NTIwMTMxNA==',1,'han@gmail.com','HH','minfo'),(13,'Saku','NDQ2Njc3ODg=',1,'Arlena@gmail.com','涵','minfo'),(14,'JenniferChang','ODIzMTc0MzI=',1,'wentin812@ig','張雯婷','minfo'),(15,'Dora','ZGQ0NTIzNTQ=',1,NULL,NULL,'minfo'),(17,'EllyTseng','ZXQ0MjM0NQ==',1,NULL,NULL,'minfo'),(18,'TsenLai','TDY2Ng==',1,NULL,NULL,'minfo'),(19,'Athena','QTQyNjY=',1,NULL,NULL,'minfo'),(20,'VanessaLin  ','Njc0MjQ0NTY=',1,'mmb510@ig','林豈彤','minfo'),(23,'LivyTsai ','NTkwNzEzMjQ=',1,'livyyyts_@ig','Livy蔡昀庭','minfo'),(25,'CindyHuang','Njk1NA==',1,'cindyqiuqiu@ig','波士頓','minfo'),(27,'Arlena26','NzcwMQ==',1,'Arlena26@gh','b','minfo'),(28,'Xiaoyuer','eGl5dTcxMzg5NDEy',1,'cdf@cc','小小','minfo'),(29,'SoloHan','czA3MjIzMTU0',1,'solo@mail.c','SoloHan','minfo'),(30,'Fairy','NDMwNzUyMzE=',1,'fairy@eer','雨䕕','minfo'),(31,'Suyu','NDIwMDc1NQ==',1,'suyuyuyu@ig','suyu','minfo'),(33,'Elissa','ZWxpc3NhOTIwMA==',1,'elissac__@ig.com','趙芸儷','minfo'),(34,'Alma','NDkzNzY2NjY=',1,'Alma@ig','Alma','minfo'),(35,'KatherineHan','YmFieTEwOTY=',1,'katherinebaby.hjx@ig','superlady17','minfo'),(36,'cin_cin_li','Y2MyOTUxNTQ4Nw==',1,'cin_cin_li@ig','馨馨','minfo'),(37,'skypony','cG9ueTA4MDY0NDk=',1,'pony@mail','pony','minfo'),(38,'anitachui','YW5pdGE1NDM3',1,'chui@mail','chui','minfo'),(39,'victoria lin','dnM1NTY2',1,'lin@mail','微多','minfo'),(40,'AngelaKuo','a3VvMTk5Nzk=',1,'angela820504@ig','郭鬼鬼 ','minfo');
/*!40000 ALTER TABLE `member_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(56) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tb_name` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'tg',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tagn_uni` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (3,'職場','tg'),(4,'社會','tg'),(5,'科技','tg'),(6,'觀點','tg'),(7,'在地','tg'),(9,'產業','tg'),(10,'活動','tg'),(11,'旅遊','tg'),(15,'生涯規劃','tg'),(16,'環保','tg'),(17,'陳氏鑑湖堂','tg');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags_insec_article`
--

DROP TABLE IF EXISTS `tags_insec_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags_insec_article` (
  `tagId` smallint(5) unsigned NOT NULL,
  `acleId` smallint(5) unsigned NOT NULL,
  `tb_name` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'iscTA',
  PRIMARY KEY (`tagId`,`acleId`),
  KEY `acleId` (`acleId`),
  CONSTRAINT `tags_insec_article_ibfk_1` FOREIGN KEY (`tagId`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tags_insec_article_ibfk_2` FOREIGN KEY (`acleId`) REFERENCES `article_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags_insec_article`
--

LOCK TABLES `tags_insec_article` WRITE;
/*!40000 ALTER TABLE `tags_insec_article` DISABLE KEYS */;
INSERT INTO `tags_insec_article` VALUES (3,4,'iscTA'),(3,12,'iscTA'),(4,2,'iscTA'),(4,6,'iscTA'),(4,16,'iscTA'),(5,4,'iscTA'),(5,9,'iscTA'),(5,10,'iscTA'),(5,11,'iscTA'),(5,12,'iscTA'),(5,13,'iscTA'),(5,14,'iscTA'),(5,15,'iscTA'),(6,2,'iscTA'),(6,7,'iscTA'),(6,15,'iscTA'),(7,7,'iscTA'),(9,14,'iscTA'),(9,15,'iscTA'),(10,2,'iscTA'),(16,8,'iscTA'),(17,17,'iscTA');
/*!40000 ALTER TABLE `tags_insec_article` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-12 13:22:41
