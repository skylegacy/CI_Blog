-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: skypony
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_item`
--

LOCK TABLES `article_item` WRITE;
/*!40000 ALTER TABLE `article_item` DISABLE KEYS */;
INSERT INTO `article_item` VALUES (2,'宜蘭人故事館開幕(未經ckeditor格式化)','在地文化結合建築與工藝之美的宜蘭人故事館的修復，是活化舊議會市政推行最重要的政策之一，各界的幫忙也讓宜蘭故事館營運的方向得以更多元，加上每週五晚上7點舉辦的全國薩克斯風嘉年華競賽，集合所有好手在視聽教育館內同場競技，歡迎民眾一同參與和體驗\r\n ','ainfo'),(4,'編輯功能測試','<p>fckeditor success</p>\r\n\r\n<p>編輯功能同時修改tag</p>\r\n','ainfo'),(6,'國內外文化齊聚寰宇市集，在童玩節看見世界！','<p>2018宜蘭國際童玩藝術節今(7)日在冬山河親水公園盛大開幕，來自22國、29個團隊齊聚宜蘭，宛若一個小型聯合國；超大水域遊戲「飛魚海盜船」及琳瑯滿目的各項活動與展覽，將陪伴來訪的遊客們度過最難忘的暑假。宜蘭縣代理縣長陳金德、宜蘭縣議會議長陳文昌與一路伴隨童玩節成長的秘克琳神父等人一同歡迎世界各地的朋友們到童玩節「童心大進擊」。</p>\r\n','ainfo'),(7,'武荖坑溪戲水為何22年來未開放？','<p>陳金德縣長說，武荖坑溪也有「苦花」（魚名），前縣議員林正標還到武荖坑抓螃蟹，陳金麟鎮長也知道，20多年來沒有開放，主要是因為武荖坑太常發生事情， 現在把溪流整理得淺一些，大約在50公分以下，增設監視系統、廣播系統，另外設兩個醫護站，3個救生員據點。最重要的還是遊客要多注意安全，父母親不能疏於照顧小朋友，安全最重要。</p>\r\n\r\n<p>$array[&#39;description&#39;]$array[&#39;description&#39;]</p>\r\n','ainfo'),(8,'「35世代」多人樂在單身少子化趨勢將更明顯','<p>介於30到39歲間的35世代，有許多人樂在單身，除了有時間安排自己的生活，金錢方面也能自行掌控，台灣目前25到34歲間未婚人口就佔了6成，不過單身族該怎麼存錢，才能負擔起退休後的醫療費用是個問題，而不婚主義也導致少子化現象越趨明顯，將可能對未來的台灣社會形成一股壓力。 Alice</p>\r\n','ainfo'),(9,'新增功能測試','<p>ckeditor成功更新表單ckeditor成功更新表單</p>\r\n','ainfo'),(10,'fckeditor 測試','<h3>這是h3標籤</h3>\r\n<p>這是p標籤這是p標籤這是p標籤這是p標籤這是p標籤這是p標籤這是p標籤這是p標籤<br>這是p標籤這是p標籤這是p標籤這是p標籤這是p標籤<p>','ainfo'),(11,'specialchars2','<h3>\"\"特殊字元輸入測試</h3>\r\n\r\n<p>\"\"2135rrfgvdscsjflfjf</p>\r\n','ainfo');
/*!40000 ALTER TABLE `article_item` ENABLE KEYS */;
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
INSERT INTO `member_info` VALUES (50,'sfdf','sdfddsfdfy',1,'sdfsdfsf@gmail.com','sdfsdf','minfo'),(51,'sfsd','a3VvMTk5Nzk=',1,'angela820504@ig','sdf ','minfo');
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (3,'職場','tg'),(4,'社會','tg'),(5,'科技','tg'),(6,'觀點','tg'),(7,'在地','tg'),(9,'產業','tg'),(10,'活動','tg'),(11,'旅遊','tg'),(12,'gospel','tg'),(14,'八卦','tg'),(15,'生涯規劃','tg'),(16,'環保','tg');
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
INSERT INTO `tags_insec_article` VALUES (3,4,'iscTA'),(4,2,'iscTA'),(5,4,'iscTA'),(5,9,'iscTA'),(5,10,'iscTA'),(5,11,'iscTA'),(6,2,'iscTA'),(6,7,'iscTA'),(7,6,'iscTA'),(7,7,'iscTA'),(10,2,'iscTA'),(11,6,'iscTA'),(16,8,'iscTA');
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

-- Dump completed on 2018-07-24 15:23:13
