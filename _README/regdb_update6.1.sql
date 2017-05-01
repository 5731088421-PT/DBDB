-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: regdb
-- ------------------------------------------------------
-- Server version	5.7.12-log

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
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity` (
  `aID` int(11) NOT NULL,
  `actName` varchar(45) DEFAULT NULL,
  `cat` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`aID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity`
--

LOCK TABLES `activity` WRITE;
/*!40000 ALTER TABLE `activity` DISABLE KEYS */;
INSERT INTO `activity` VALUES (1,'CU Firstdate','General','2014-07-20'),(2,'Welcome Freshmen 2014','Volunteer','2014-01-01'),(3,'Larngear camp 14th','General','2014-02-02'),(4,'Vishnukarmabutr camp 13th','Volunteer','2014-08-03'),(5,'Larngear camp 15th','General','2015-01-13'),(6,'Vishnukarmabutr camp 14th','Volunteer','2015-07-28'),(7,'Larngear camp 16th','General','2016-01-15'),(8,'Fundamental Engineering Tutorial By FE Camp 8','Volunteer','2016-02-02'),(9,'งานฟุตบอลประเพณีธรรมศาสตร์-จุฬาฯ ครั้งที่ 71','General','2016-02-21'),(10,'อบจ. ใส่ใจ ใกล้สอบปีการศึกษา 2559','General','2016-10-20');
/*!40000 ALTER TABLE `activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `award`
--

DROP TABLE IF EXISTS `award`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `award` (
  `awardID` int(11) NOT NULL AUTO_INCREMENT,
  `aName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`awardID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `award`
--

LOCK TABLES `award` WRITE;
/*!40000 ALTER TABLE `award` DISABLE KEYS */;
INSERT INTO `award` VALUES (1,'นิสิตเรียนดี ปีการศึกษา 2557'),(2,'นิสิตเรียนดี ปีการศึกษา 2558'),(3,'นิสิตเรียนดี ปีการศึกษา 2559'),(4,'นิสิตกิจกรรมดีเด่น ปีการศึกษา 2557'),(5,'นิสิตกิจกรรมดีเด่น ปีการศึกษา 2558'),(6,'นิสิตกิจกรรมดีเด่น ปีการศึกษา 2559'),(7,'วิทยานิพนธ์ดีเด่น'),(8,'นิสิตสร้างชื่อเสี่ยงให้มหาวิทยาลัย'),(9,'นิสิตจิตอาสาดีเด่น'),(10,'นิสิตกตัญญูดีเด่น');
/*!40000 ALTER TABLE `award` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `cID` varchar(7) NOT NULL,
  `cName` varchar(45) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  PRIMARY KEY (`cID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES ('0201106',' ART SCI FIND HAP',3),('2110101','COM PROG',3),('2110200',' DISCRETE STRUC',3),('2110215',' PROG METH I',3),('2110327',' ALGORITHM DESIGN',3),('2110594',' ADV TOP COMP IV',3),('2301107','CALCULUS I',3),('2302127','GEN CHEM I',3),('2304107','GEN PHYS I',3),('2304183','GEN PHYS LAB I',1),('2313213',' DIGITAL PHOTO',3);
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `earn_award`
--

DROP TABLE IF EXISTS `earn_award`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `earn_award` (
  `student_personalID` int(11) NOT NULL,
  `awardID` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`student_personalID`,`year`,`term`,`awardID`),
  KEY `earn_awardI_idx` (`awardID`),
  KEY `earn_term_idx` (`term`,`year`),
  CONSTRAINT `earn_awardID` FOREIGN KEY (`awardID`) REFERENCES `award` (`awardID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `earn_semester` FOREIGN KEY (`term`, `year`) REFERENCES `semester` (`term`, `year`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `earn_student_personalID` FOREIGN KEY (`student_personalID`) REFERENCES `student` (`personalID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `earn_award`
--

LOCK TABLES `earn_award` WRITE;
/*!40000 ALTER TABLE `earn_award` DISABLE KEYS */;
INSERT INTO `earn_award` VALUES (30000007,2,2,2015),(30000002,3,1,2016),(30000002,4,2,2014),(30000004,6,1,2015),(30000014,7,2,2014),(30000015,7,1,2015),(30000004,8,1,2015),(30000011,10,1,2016);
/*!40000 ALTER TABLE `earn_award` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enroll`
--

DROP TABLE IF EXISTS `enroll`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enroll` (
  `student_personalID` int(11) NOT NULL,
  `secNo` int(11) NOT NULL,
  `cID` varchar(7) NOT NULL,
  `term` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `attendance` int(11) DEFAULT NULL,
  `grade` float DEFAULT NULL,
  PRIMARY KEY (`student_personalID`,`secNo`,`cID`,`term`,`year`),
  KEY `enroll_secNo_idx` (`secNo`),
  KEY `enroll_semester_idx` (`year`,`term`),
  KEY `enroll_term` (`term`,`year`),
  KEY `enroll_cID_idx` (`cID`),
  KEY `enroll_sec_idx` (`secNo`,`cID`,`term`,`year`),
  CONSTRAINT `enroll_sec` FOREIGN KEY (`secNo`, `cID`, `term`, `year`) REFERENCES `section` (`secNo`, `cID`, `term`, `year`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `enroll_student_personalID` FOREIGN KEY (`student_personalID`) REFERENCES `student` (`personalID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enroll`
--

LOCK TABLES `enroll` WRITE;
/*!40000 ALTER TABLE `enroll` DISABLE KEYS */;
INSERT INTO `enroll` VALUES (30000001,1,'2301107',1,2015,80,4),(30000001,2,'2313213',1,2015,80,3),(30000002,1,'2110200',1,2015,100,4),(30000002,1,'2110594',2,2016,85,4),(30000002,1,'2301107',1,2015,90,4),(30000002,2,'2313213',1,2015,80,3.5),(30000002,3,'2110101',1,2014,100,2.5),(30000002,33,'2110215',1,2015,100,2.5),(30000003,1,'2301107',1,2015,95,3),(30000003,2,'2313213',1,2015,95,3),(30000003,3,'2110101',1,2015,100,3.5),(30000004,1,'2110200',1,2015,100,3.5),(30000004,1,'2301107',1,2015,89,4),(30000004,2,'2313213',1,2015,100,3.5),(30000004,3,'2110101',1,2015,100,3.5),(30000005,1,'2301107',1,2015,90,2),(30000006,1,'2110200',1,2015,90,2.5),(30000007,1,'2110594',2,2016,44,3),(30000007,2,'2302127',2,2014,32,2),(30000008,1,'2110594',2,2016,54,3.5),(30000009,1,'2110594',2,2016,31,4),(30000009,2,'2302127',2,2014,17,2),(30000010,1,'2110594',2,2016,80,4),(30000011,2,'2302127',2,2014,80,3.5),(30000012,1,'2110200',1,2015,88,1.5),(30000012,1,'2110594',2,2016,89,1),(30000012,3,'2304107',2,2016,95,4),(30000013,1,'2110200',1,2015,87,1.5),(30000014,1,'2301107',1,2015,80,1),(30000015,1,'2110594',2,2016,80,1),(30000016,1,'2301107',1,2015,90,2.5),(30000017,1,'2110200',1,2015,95,3),(30000017,1,'2110594',2,2016,95,3.5),(30000018,1,'2301107',1,2015,100,3),(30000019,1,'2110594',2,2016,80,4),(30000019,1,'2301107',1,2015,100,3),(30000019,2,'2302127',2,2014,100,3.5),(30000020,1,'2110200',1,2015,90,4);
/*!40000 ALTER TABLE `enroll` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faculty` (
  `fID` int(11) NOT NULL AUTO_INCREMENT,
  `faName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`fID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculty`
--

LOCK TABLES `faculty` WRITE;
/*!40000 ALTER TABLE `faculty` DISABLE KEYS */;
INSERT INTO `faculty` VALUES (21,'ENGINEERING'),(22,'ARTS'),(23,'SCIENCE'),(24,'POLITICAL SCIENCE'),(25,'ARCHITECTURE'),(26,'COMMERCE AND ACCOUNTANCY'),(27,'EDUCATION'),(28,'COMMUNICATION ARTS'),(29,'ECONOMICS'),(30,'MEDICINE');
/*!40000 ALTER TABLE `faculty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intermission`
--

DROP TABLE IF EXISTS `intermission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `intermission` (
  `student_personalID` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date DEFAULT NULL,
  PRIMARY KEY (`student_personalID`,`startDate`),
  CONSTRAINT `intermission_student_personalID` FOREIGN KEY (`student_personalID`) REFERENCES `student` (`personalID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intermission`
--

LOCK TABLES `intermission` WRITE;
/*!40000 ALTER TABLE `intermission` DISABLE KEYS */;
INSERT INTO `intermission` VALUES (30000002,'2012-02-04','2018-05-08'),(30000002,'2017-04-01','2017-08-01'),(30000004,'2012-05-05','2019-12-31'),(30000012,'2014-09-12','2014-09-13');
/*!40000 ALTER TABLE `intermission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `internship`
--

DROP TABLE IF EXISTS `internship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `internship` (
  `student_personalID` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `company` varchar(45) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`student_personalID`,`startDate`),
  CONSTRAINT `internship_student_personalID` FOREIGN KEY (`student_personalID`) REFERENCES `student` (`personalID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `internship`
--

LOCK TABLES `internship` WRITE;
/*!40000 ALTER TABLE `internship` DISABLE KEYS */;
INSERT INTO `internship` VALUES (30000002,'2015-02-17','2015-04-17','SQL','DDL Manager'),(30000002,'2017-03-10','2017-08-01','Google','janitor'),(30000005,'2016-10-18','2016-12-31','Microsoft','waiter'),(30000012,'2015-07-28','2016-01-13','Apple','CEO');
/*!40000 ALTER TABLE `internship` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `major`
--

DROP TABLE IF EXISTS `major`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `major` (
  `mID` int(11) NOT NULL,
  `mName` varchar(45) DEFAULT NULL,
  `creditRequired` int(11) DEFAULT NULL,
  `creditApprove` int(11) DEFAULT NULL,
  `creditGenHU` int(11) DEFAULT NULL,
  `creditGenSC` int(11) DEFAULT NULL,
  `creditGenSO` int(11) DEFAULT NULL,
  `creditGenIN` int(11) DEFAULT NULL,
  `fID` int(11) DEFAULT NULL,
  PRIMARY KEY (`mID`),
  KEY `major_fID_idx` (`fID`),
  CONSTRAINT `major_fID` FOREIGN KEY (`fID`) REFERENCES `faculty` (`fID`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `major`
--

LOCK TABLES `major` WRITE;
/*!40000 ALTER TABLE `major` DISABLE KEYS */;
INSERT INTO `major` VALUES (2101,'Civil',60,6,6,6,6,6,21),(2102,'Electrical',62,6,6,6,6,6,21),(2103,'Mechanical',57,6,6,6,6,6,21),(2104,'Industrial',55,6,6,6,6,6,21),(2105,'Chemical',65,6,6,6,6,6,21),(2106,'Petrolium',60,6,6,6,6,6,21),(2107,'Environmental',54,6,6,6,6,6,21),(2108,'Serway',55,6,6,6,6,6,21),(2109,'Material',56,6,6,6,6,6,21),(2110,'Computer',62,6,6,6,6,6,21),(2111,'Nuclear',61,6,6,6,6,6,21),(2201,'Thai',52,6,6,6,6,6,22),(2204,'History',56,6,6,6,6,6,22),(2301,'Math & Computer',62,6,6,6,6,6,23),(2304,'Physics',62,6,6,6,6,6,23),(2503,'City scape',63,6,6,6,6,6,25),(2505,'Interior',63,6,6,6,6,6,25),(2601,'Accounting',61,6,6,6,6,6,26),(2803,'Public relations',66,6,6,6,6,6,28),(2805,'Phototgraphy',51,6,6,6,6,6,28),(2900,'General',64,6,6,6,6,6,29);
/*!40000 ALTER TABLE `major` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monitor_project`
--

DROP TABLE IF EXISTS `monitor_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monitor_project` (
  `pID` int(11) NOT NULL,
  `teacher_personalID` int(11) NOT NULL,
  `student_personalID` int(11) NOT NULL,
  PRIMARY KEY (`pID`,`teacher_personalID`,`student_personalID`),
  KEY `monitor_student_personalID_idx` (`student_personalID`),
  KEY `monitor_teacher_personalID_idx` (`teacher_personalID`),
  CONSTRAINT `monitor_pID` FOREIGN KEY (`pID`) REFERENCES `project` (`pID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `monitor_student_personalID` FOREIGN KEY (`student_personalID`) REFERENCES `student` (`personalID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `monitor_teacher_personalID` FOREIGN KEY (`teacher_personalID`) REFERENCES `teacher` (`personalID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monitor_project`
--

LOCK TABLES `monitor_project` WRITE;
/*!40000 ALTER TABLE `monitor_project` DISABLE KEYS */;
INSERT INTO `monitor_project` VALUES (1,20000002,30000002),(2,20000002,30000010),(4,20000001,30000012),(3,20000010,30000013);
/*!40000 ALTER TABLE `monitor_project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participate`
--

DROP TABLE IF EXISTS `participate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participate` (
  `student_personalID` int(11) NOT NULL,
  `aID` int(11) NOT NULL,
  PRIMARY KEY (`student_personalID`,`aID`),
  KEY `participate_aID_idx` (`aID`),
  CONSTRAINT `participate_aID` FOREIGN KEY (`aID`) REFERENCES `activity` (`aID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `participate_student_personalID` FOREIGN KEY (`student_personalID`) REFERENCES `student` (`personalID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participate`
--

LOCK TABLES `participate` WRITE;
/*!40000 ALTER TABLE `participate` DISABLE KEYS */;
INSERT INTO `participate` VALUES (30000001,1),(30000011,2),(30000002,3),(30000002,4),(30000001,6),(30000003,7),(30000012,8),(30000002,10);
/*!40000 ALTER TABLE `participate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personnel` (
  `personalID` int(11) NOT NULL AUTO_INCREMENT,
  `fName` varchar(45) DEFAULT NULL,
  `lName` varchar(45) DEFAULT NULL,
  `gender` enum('M','F') DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `ADDR` varchar(80) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`personalID`)
) ENGINE=InnoDB AUTO_INCREMENT=1000000031 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personnel`
--

LOCK TABLES `personnel` WRITE;
/*!40000 ALTER TABLE `personnel` DISABLE KEYS */;
INSERT INTO `personnel` VALUES (10000001,'Nicole','Andrews','F','1994-05-14','nandrews0@ftc.gov','9 Karstens Point','0865883126'),(10000002,'Phillip','Moore','M','1993-05-04','pmoore1@pagesperso-orange.fr','13578 Village Trail','0885970182'),(10000003,'Carolyn','Ellis','F','1994-05-30','cellis2@creativecommons.org','92065 Dovetail Plaza','0814591418'),(10000004,'David','Jacobs','M','1997-12-24','djacobs3@spiegel.de','697 Hovde Road','0876888395'),(10000005,'Steven','Lee','M','1994-09-05','slee4@ftc.gov','7 Becker Terrace','0979056392'),(10000006,'Michelle','Matthews','F','1996-07-21','mmatthews5@prweb.com','0 Summit Terrace','0864620990'),(10000007,'Heather','Andrews','F','1997-02-10','handrews6@nyu.edu','7043 Lawn Park','0930391626'),(10000008,'Scott','Harris','M','1997-02-23','sharris7@amazon.co.uk','105 Aberg Alley','0880603207'),(10000009,'Samuel','Sims','M','1993-12-27','ssims8@blinklist.com','2231 Aberg Road','0986086990'),(10000010,'Elvis','Rollings','M','1995-09-07','el.r@eee.com','3 Rama IX','0974936392'),(20000001,'Angela','Reid','F','1996-09-07','areida@acquirethisname.com','28855 Westend Avenue','0960553452'),(20000002,'Anthony','Wood','M','1995-09-05','awoodb@globo.com','14 Evergreen Lane','0890244135'),(20000003,'Maria','Hernandez','F','1996-04-17','mhernandezc@simplemachines.org','9031 Merrick Trail','0911076101'),(20000004,'Brenda','Romero','F','1994-01-06','bromerod@seattletimes.com','25737 Moose Center','0974068615'),(20000005,'Elizabeth','Duncan','F','1993-06-19','eduncane@blog.com','24 Bartillon Road','0842502371'),(20000006,'Martin','Mason','M','1995-04-30','mmasonf@bizjournals.com','231 Maple Wood Street','0932634428'),(20000007,'Sandra','Webb','F','1996-02-22','swebbg@scientificamerican.com','255 Carberry Parkway','0826849335'),(20000008,'Evelyn','Reynolds','F','1996-10-18','ereynoldsh@wunderground.com','2680 Northland Circle','0882098683'),(20000009,'Antonio','Boyd','M','1995-05-20','aboydi@technorati.com','6 Jenna Terrace','0841811471'),(20000010,'Jimmy','Boyd','M','1994-08-23','jboydj@slashdot.org','3 Sundown Plaza','0842621995'),(30000001,'Maria','Mccoy','F','1996-12-19','mmccoyk@weather.com','0 Union Way','0953785318'),(30000002,'Brandon','Harris','M','1997-10-08','bharrisl@canalblog.com','5 Riverside Plaza','0842404950'),(30000003,'Katherine','Murphy','F','1996-09-07','kmurphym@noaa.gov','8 Holmberg Terrace','0879981349'),(30000004,'Howard','Dixon','M','1993-04-16','hdixonn@tinyurl.com','7700 Sutteridge Parkway','0993450178'),(30000005,'Phillip','Kelley','M','1996-10-16','pkelleyo@businessweek.com','3 Katie Lane','0976174847'),(30000006,'Gary','Freeman','M','1996-02-13','gfreemanp@last.fm','76894 Spenser Court','0951604794'),(30000007,'Ernest','Wheeler','M','1994-03-16','ewheelerq@who.int','11400 Sycamore Alley','0959492969'),(30000008,'Stephen','Roberts','M','1993-03-07','srobertsr@toplist.cz','652 Linden Avenue','0811725628'),(30000009,'Deborah','Lopez','F','1994-12-25','dlopezs@opensource.org','4216 Paget Road','0942144406'),(30000010,'Judy','Henry','F','1994-07-16','jhenryt@vistaprint.com','96 Larry Park','0873574271'),(30000011,'Wayne','Rooney','M','1996-04-05','manu_gogo@mymail.com','6 old trafford','0907556432'),(30000012,'Naomi','Watts','F','1994-12-30','nWatts@yautch.net','36 Stamford','0991133404'),(30000013,'Larry','Page','M','1995-06-13','notFound@outloook.com','10000 mountain view','0872645444'),(30000014,'Janifer','Lawrence','F','1995-06-14','jLawrence@hungerg.com','53 Boulevard','0838367711'),(30000015,'Vin','Bensil','F','1993-05-25','familyGuy@fastestmail.co.us','888 Family home','0831013301'),(30000016,'Bruce','Wayne','M','1995-04-04','imNotBatman@batmail.com','123 Gotham','0858033634'),(30000017,'Bruce','Lee','M','1997-10-04','bLee@ggmail.net','34 Golden bridge','0841177422'),(30000018,'Hermione','Granger','F','1996-11-28','hermG@her.com','89 Hogwarts','0816739877'),(30000019,'Mars','William','F','1995-01-01','mWilliam@tclub.com','77 Arlington','0927367733'),(30000020,'Mark','Suckerberg','M','1998-07-17','marky@myspace.com','10 Time square','0987875412');
/*!40000 ALTER TABLE `personnel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `pID` int(11) NOT NULL AUTO_INCREMENT,
  `pName` varchar(45) NOT NULL,
  `pStatus` varchar(45) NOT NULL,
  PRIMARY KEY (`pID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (1,'SQL Optimize','Open'),(2,'Nosql research','Open'),(3,'Business improve by computer','Close'),(4,'Self driving cae','Open');
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section` (
  `secNo` int(11) NOT NULL,
  `cID` varchar(7) NOT NULL,
  `term` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `accept_q` int(11) DEFAULT NULL,
  `time` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`secNo`,`cID`,`term`,`year`),
  KEY `sec_coursre_idx` (`cID`),
  KEY `sec_semester_idx` (`term`,`year`),
  CONSTRAINT `sec_course` FOREIGN KEY (`cID`) REFERENCES `course` (`cID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `sec_semester` FOREIGN KEY (`term`, `year`) REFERENCES `semester` (`term`, `year`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section`
--

LOCK TABLES `section` WRITE;
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
INSERT INTO `section` VALUES (1,'2110200',1,2015,200,'10.00-15.00'),(1,'2110594',2,2016,120,'9.30-11.00'),(1,'2301107',1,2015,50,'11.00-12.30'),(2,'2302127',2,2014,50,'9.30-12.30'),(2,'2313213',1,2015,80,'13.00-16.00'),(3,'2110101',1,2014,30,'13.00-16.00'),(3,'2110101',1,2015,200,'11.00-12.50'),(3,'2304107',2,2016,100,'10.00-12.00'),(33,'2110101',2,2016,100,'13.00-15.00'),(33,'2110215',1,2015,120,'8.00-11.00');
/*!40000 ALTER TABLE `section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `semester`
--

DROP TABLE IF EXISTS `semester`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `semester` (
  `term` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`term`,`year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semester`
--

LOCK TABLES `semester` WRITE;
/*!40000 ALTER TABLE `semester` DISABLE KEYS */;
INSERT INTO `semester` VALUES (1,2014),(1,2015),(1,2016),(2,2014),(2,2015),(2,2016);
/*!40000 ALTER TABLE `semester` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `personalID` int(11) NOT NULL,
  `salary` int(11) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`personalID`),
  CONSTRAINT `staff_personalID` FOREIGN KEY (`personalID`) REFERENCES `personnel` (`personalID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (10000001,10000,'Chief of Faculty of Engineering'),(10000002,10000,'Head of Computer Engineering'),(10000003,10000,'Accountant'),(10000004,10000,'Accountant'),(10000005,10000,'Accountant'),(10000006,20000,'Teaching assistant'),(10000007,20000,'Teaching assistant'),(10000008,20000,'Register staff'),(10000009,30000,'Register staff'),(10000010,30000,'Janitor');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `personalID` int(11) NOT NULL,
  `sID` varchar(10) NOT NULL,
  `isSick` enum('0','1') DEFAULT '0',
  `isPro` enum('0','1') DEFAULT '0',
  `behavior` int(11) DEFAULT '100',
  `advisorID` int(11) DEFAULT NULL,
  `mID` int(11) DEFAULT NULL,
  PRIMARY KEY (`personalID`),
  KEY `student_advisorID_idx` (`advisorID`),
  KEY `student_mID_idx` (`mID`),
  KEY `sID_idx` (`sID`) USING BTREE,
  CONSTRAINT `student_advisorID` FOREIGN KEY (`advisorID`) REFERENCES `teacher` (`personalID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `student_mID` FOREIGN KEY (`mID`) REFERENCES `major` (`mID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `student_personalID` FOREIGN KEY (`personalID`) REFERENCES `personnel` (`personalID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (30000001,'5738338621','0','0',22,20000001,2101),(30000002,'5736070421','1','1',55,20000001,2110),(30000003,'5737818021','0','0',51,20000003,2101),(30000004,'5733068421','1','0',39,20000004,2103),(30000005,'5731660923','0','1',4,20000005,2304),(30000006,'5731851923','0','0',62,20000006,2301),(30000007,'5738359525','1','0',24,20000007,2503),(30000008,'5738314628','0','0',28,20000008,2803),(30000009,'5735139421','0','1',26,20000009,2103),(30000010,'5737429926','0','0',34,20000004,2601),(30000011,'5627876521','0','0',12,20000001,2101),(30000012,'5648976825','1','0',98,20000001,2505),(30000013,'5698587626','0','0',50,20000003,2601),(30000014,'5837650921','0','0',32,20000002,2102),(30000015,'5830098721','0','0',54,20000002,2102),(30000016,'5831056528','0','1',47,20000008,2805),(30000017,'5907654522','1','0',1,20000009,2204),(30000018,'5937556321','0','1',35,20000010,2103),(30000019,'5930778722','0','1',42,20000007,2201),(30000020,'5976356529','0','0',76,20000001,2900);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `study_abroad`
--

DROP TABLE IF EXISTS `study_abroad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `study_abroad` (
  `yearEnd` int(11) NOT NULL,
  `student_personalID` int(11) NOT NULL,
  `university` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `faculty` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`yearEnd`,`student_personalID`),
  KEY `abroad_student_personalID_idx` (`student_personalID`),
  CONSTRAINT `abroad_student_personalID` FOREIGN KEY (`student_personalID`) REFERENCES `student` (`personalID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `study_abroad`
--

LOCK TABLES `study_abroad` WRITE;
/*!40000 ALTER TABLE `study_abroad` DISABLE KEYS */;
INSERT INTO `study_abroad` VALUES (2017,30000011,'MIT','United States','Business'),(2018,30000002,'Stanford','Unitied Kingdom','Engineering'),(2019,30000001,'Oxford','United kingdom','Science');
/*!40000 ALTER TABLE `study_abroad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teach`
--

DROP TABLE IF EXISTS `teach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teach` (
  `teacher_personalID` int(11) NOT NULL,
  `cID` varchar(7) NOT NULL,
  `secNo` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`teacher_personalID`,`year`,`term`,`secNo`,`cID`),
  KEY `teach_semester_idx` (`term`,`year`),
  KEY `teach_course_idx` (`secNo`,`cID`),
  KEY `teach_section_idx` (`term`,`year`,`secNo`,`cID`),
  CONSTRAINT `teach_sec` FOREIGN KEY (`term`, `year`, `secNo`, `cID`) REFERENCES `section` (`term`, `year`, `secNo`, `cID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `teach_teacher_personalID` FOREIGN KEY (`teacher_personalID`) REFERENCES `teacher` (`personalID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teach`
--

LOCK TABLES `teach` WRITE;
/*!40000 ALTER TABLE `teach` DISABLE KEYS */;
INSERT INTO `teach` VALUES (20000002,'2110101',3,1,2014),(20000001,'2110200',1,1,2015),(20000002,'2110200',1,1,2015),(20000002,'2110101',3,1,2015),(20000002,'2110215',33,1,2015),(20000004,'2313213',2,1,2015),(20000005,'2313213',2,1,2015),(20000006,'2313213',2,1,2015),(20000007,'2313213',2,1,2015),(20000009,'2313213',2,1,2015),(20000010,'2313213',2,1,2015),(20000004,'2302127',2,2,2014),(20000008,'2302127',2,2,2014),(20000001,'2110594',1,2,2016),(20000001,'2110101',33,2,2016),(20000002,'2110594',1,2,2016),(20000003,'2110594',1,2,2016),(20000006,'2110594',1,2,2016),(20000009,'2304107',3,2,2016),(20000010,'2304107',3,2,2016);
/*!40000 ALTER TABLE `teach` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher` (
  `personalID` int(11) NOT NULL,
  `tID` varchar(10) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `expert` varchar(45) DEFAULT NULL,
  `mID` int(11) DEFAULT NULL,
  PRIMARY KEY (`personalID`),
  KEY `teacher_mID_idx` (`mID`),
  CONSTRAINT `teacher_mID` FOREIGN KEY (`mID`) REFERENCES `major` (`mID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `teacher_personalID` FOREIGN KEY (`personalID`) REFERENCES `personnel` (`personalID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` VALUES (20000001,'210101',50132,'Database',2110),(20000002,'210202',52000,'Database',2110),(20000003,'210303',125000,'Data science',2103),(20000004,'260404',72000,'Managing',2601),(20000005,'220505',35000,'Thai',2201),(20000006,'290606',50000,'Economy',2900),(20000007,'210707',50000,'Electrical power',2102),(20000008,'210808',1500000,'Dam maker',2101),(20000009,'210909',20000,'Logistic',2104),(20000010,'211010',55000,'Computer',2110);
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `personalID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` enum('staff','teacher','executive') NOT NULL,
  PRIMARY KEY (`personalID`),
  UNIQUE KEY `username` (`username`),
  CONSTRAINT `users_personalID` FOREIGN KEY (`personalID`) REFERENCES `personnel` (`personalID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (10000001,'exec','exec','executive'),(10000002,'staff','staff','staff'),(20000001,'bank','bankbank','teacher'),(20000002,'test','tester','teacher');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'regdb'
--
/*!50003 DROP FUNCTION IF EXISTS `calGPA` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `calGPA`(id INTEGER,t INTEGER,y INTEGER) RETURNS float
BEGIN
DECLARE GPA FLOAT;
SET GPA = 0;
SELECT SUM(grade*credit)/SUM(credit) INTO GPA FROM enroll E,course C WHERE E.cID = C.cID AND E.student_personalID = id and term = t and year = y;
RETURN GPA;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getAge` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getAge`(d DATE) RETURNS int(11)
BEGIN
RETURN TIMESTAMPDIFF(YEAR,d,CURDATE());
RETURN 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `isNotEnd` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `isNotEnd`(endDate DATE) RETURNS int(11)
BEGIN
DECLARE st INTEGER;
SET st =0;
IF(endDate > NOW()) THEN
	SET st=1;
    ELSE
     SET st=0;
END IF;
RETURN st;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-30 17:41:35
