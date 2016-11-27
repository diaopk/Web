-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: web_project
-- ------------------------------------------------------
-- Server version	5.7.9

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `name` varchar(20) NOT NULL,
  `pass` char(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('admin','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `callback`
--

DROP TABLE IF EXISTS `callback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `callback` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `fn` varchar(20) NOT NULL,
  `ln` varchar(40) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `question` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `callback`
--

LOCK TABLES `callback` WRITE;
/*!40000 ALTER TABLE `callback` DISABLE KEYS */;
INSERT INTO `callback` VALUES (1,'Tony','Frain','3530876303396','Tony.Frain@gmail.com',' Also it is great to see the owner on the property and participating in the operation of the facility.'),(2,'Parker','Murphy','3530876303396','Parker.Murphy@gmail.com','Also it is great to see the owner on the property and participating in the operation of the facility.');
/*!40000 ALTER TABLE `callback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class` (
  `class_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class`
--

LOCK TABLES `class` WRITE;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` VALUES (1,'Yoga'),(2,'Spin'),(3,'Tone'),(4,'Zumba');
/*!40000 ALTER TABLE `class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class_booking`
--

DROP TABLE IF EXISTS `class_booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class_booking` (
  `member_id` mediumint(8) unsigned NOT NULL,
  `class_id` mediumint(8) unsigned NOT NULL,
  `time` varchar(40) NOT NULL,
  KEY `member_id` (`member_id`),
  KEY `class_id` (`class_id`),
  KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class_booking`
--

LOCK TABLES `class_booking` WRITE;
/*!40000 ALTER TABLE `class_booking` DISABLE KEYS */;
INSERT INTO `class_booking` VALUES (3,1,'mon from 6.30am to 9.30am'),(2,4,'thu from 3.30pm to 6.30pm'),(7,1,'sat from 9.30pm to 11.00pm');
/*!40000 ALTER TABLE `class_booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `fn` varchar(20) NOT NULL,
  `ln` varchar(40) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (1,'Steve','Jerry','3536962368896','Steve.Jerry@gmail.com','Trophy fits my needs better than any gym I have belonged to.  I think the staff is extremely friendly and helpful, and the trainers are excellent. The ownership/management is constantly looking to upgrade and provide the latest in exercise equipment and technique.  I also enjoy the clientele which consists of a wide range of age groups and exercise regiment.  I think this is the best workout/exercise value in Dallas.','2016-04-29 07:27:41'),(2,'Parker','Murphy','3536968965596','Parker.Murphy@gmail.com','I have been actively exercising for over 20 years and have been a member of various gyms. Trophy Fitness Club is by far the best one.  I frequent the club at least 4 – 5 times a week and I have never had a bad experience.  The staff is helpful and friendly, the locker rooms are always clean and I never have to wait to use any equipment. In addition, I have a personal trainer that looks out for my best interests and customizes workouts for me.  Because of him, I am in the best shape of my life.','2016-04-29 07:29:44'),(3,'Jack','Thomas','3539653695569','Jack.Thomas@gmail.com','I’ve been a member of [Trophy Fitness Club Downtown] for a little over 3 years.  As a working mother of three sons, trying to find the time to workout has been my biggest challenge. [Trophy] has been perfect answer for me. Because of the location, I’m able to walk over to the gym everyday at lunch and fit in my workouts.  While the gym is contemporary in its decor, it still has a community feeling to it.  The staff members are always welcoming,','2016-04-29 08:24:50'),(5,'Jack','Thomas','3536598698569','Jack.Thomas@gmail.com','This new daily routine put on the white boards by Trophy are a godsend.  I’m only 2 weeks in, but the duration (takes me no more than 40 minutes to complete) and the intensity (mixture of strength and aerobics on the “Strength Training” side of the board) proved perfect for me to get back into things.','2016-05-01 05:54:37');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `fn` varchar(20) NOT NULL,
  `ln` varchar(40) NOT NULL,
  `dob` date NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` char(40) NOT NULL,
  `register_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (1,'Conor','Aron','1984-07-26','3538705632259','conor.Aron@gmail.com','f7c3bc1d808e04732adf679965ccc34ca7ae3441','2016-04-29 05:51:59'),(2,'Steve','Jerry','1986-07-18','3536359875563','Steve.Jerry@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','2016-04-29 05:55:41'),(3,'Parker','Murphy','1990-02-06','3536984562236','Parker.Murphy@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','2016-04-29 06:04:36'),(4,'Anderson','Omer','1984-08-17','3539845696632','Anderson.Omer@gmail.com','444528fc68f99ea0f4fe027cb6cbd262f2a707fe','2016-04-29 06:13:41'),(5,'Java','Script','1988-04-05','3536963236698','Java.Scipt@gmail.com','97ef30b919ff7e5d7fdc19967a31387fa22ce42e','2016-04-29 06:14:58'),(6,'Jon','Duckett','1976-07-15','3536325698856','Jon.Duckett@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','2016-04-29 08:21:29'),(7,'Jack','Thomas','1990-06-09','3536985694412','Jack.Thomas@gmail.com','daf230e6102719d9a554dbcfe024dea9b0cb91ea','2016-04-29 08:22:55'),(8,'Tony','Frain','1995-01-31','3536236584412','Tony.Frain@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','2016-05-01 06:34:20');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membership`
--

DROP TABLE IF EXISTS `membership`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `membership` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `content` varchar(500) NOT NULL,
  `price` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membership`
--

LOCK TABLES `membership` WRITE;
/*!40000 ALTER TABLE `membership` DISABLE KEYS */;
INSERT INTO `membership` VALUES (1,'New Membership Specials','Offer available at select clubs only. Requires 12-month commitment and may include a one-time initiation fee from $0 to $149 plus first and last months’ dues paid at time of enrollment. Recurring $39.99 annual fee and additional restrictions apply',30),(2,'Student Special','Restrictions apply. Must be a member in good standing. Offer valide on 50-minute personal training sessions. Sessions must be used within 6 months. Also avaiable in club',40),(3,'Gold','You may bring your own lock and secure your valuables in a locker at Thomas Jefferson, Barcroft, or Fairlington for each workout session. Coin lockers are available at Thomas Jefferson. Lockers in the Thomas',57),(4,'Platinum','Experience a variety of amenities and group exercise classes at no charge. See how 24 Hour Fitness can help you achieve a healthier and happier lifestyle. Restrictions apply. Click offer for complete details',49);
/*!40000 ALTER TABLE `membership` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonies`
--

DROP TABLE IF EXISTS `testimonies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonies` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `feedback_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `feedback_id` (`feedback_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonies`
--

LOCK TABLES `testimonies` WRITE;
/*!40000 ALTER TABLE `testimonies` DISABLE KEYS */;
INSERT INTO `testimonies` VALUES (1,2);
/*!40000 ALTER TABLE `testimonies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timetable`
--

DROP TABLE IF EXISTS `timetable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `timetable` (
  `time` varchar(40) NOT NULL,
  `class_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`time`),
  KEY `class_id` (`class_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timetable`
--

LOCK TABLES `timetable` WRITE;
/*!40000 ALTER TABLE `timetable` DISABLE KEYS */;
INSERT INTO `timetable` VALUES ('mon from 6.30am to 9.30am',1),('mon from 3.30pm to 6.30pm',2),('mon from 6.30pm to 9.30pm',3),('tue from 9.30am to 0.30pm',4),('tue from 3.30pm to 6.30pm',2),('tue from 9.30pm to 11.00pm',1),('wed from 6.30am to 9.30am',1),('wed from 3.30pm to 6.30pm',2),('wed from 6.30pm to 9.30pm',4),('thu from 6.30am to 9.30am',1),('thu from 9.30am to 0.30pm',4),('thu from 3.30pm to 6.30pm',4),('thu from 6.30pm to 9.30pm',3),('fri from 1.30pm to 3.30pm',2),('fri from 6.30pm to 9.30pm',4),('fri from 9.30pm to 11.00pm',1),('sat from 6.30am to 9.30am',1),('sat from 3.30pm to 6.30pm',4),('sat from 6.30pm to 9.30pm',3),('sat from 9.30pm to 11.00pm',1);
/*!40000 ALTER TABLE `timetable` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-01  7:57:41
