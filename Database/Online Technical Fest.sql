/*
SQLyog Community v12.04 (32 bit)
MySQL - 5.1.33-community : Database - devil
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`devil` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `devil`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `Username` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `Password` varchar(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `admin` */

LOCK TABLES `admin` WRITE;

insert  into `admin`(`Username`,`Password`) values ('12','12');

UNLOCK TABLES;

/*Table structure for table `event` */

DROP TABLE IF EXISTS `event`;

CREATE TABLE `event` (
  `Event_Key` int(11) NOT NULL,
  `Event_Name` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`Event_Key`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `event` */

LOCK TABLES `event` WRITE;

insert  into `event`(`Event_Key`,`Event_Name`) values (391993,'SPIDERWICK'),(651993,'ARTI-CODE'),(951994,'BUG 2 DEBUG'),(2221994,'X-COMWAR');

UNLOCK TABLES;

/*Table structure for table `register` */

DROP TABLE IF EXISTS `register`;

CREATE TABLE `register` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Fname` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `Lname` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `College` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `Course` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `Sem` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `Sid` int(11) NOT NULL,
  `Event` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `Mob` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `Email` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `Username` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `Password` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`UserID`,`Sid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `register` */

LOCK TABLES `register` WRITE;

insert  into `register`(`UserID`,`Fname`,`Lname`,`College`,`Course`,`Sem`,`Sid`,`Event`,`Mob`,`Email`,`Username`,`Password`,`Timestamp`) values (12,'GAURAV','KUMAR','IINTM','BCA','1st',1990302012,'ARTI-CODE','9582161515','rakeshsahani@live.in','ryu','123','2015-04-30 01:55:16'),(1,'a','a','a','aa','a',1,'a','aa','a','a','a','2015-04-17 00:14:58');

UNLOCK TABLES;

/*Table structure for table `result` */

DROP TABLE IF EXISTS `result`;

CREATE TABLE `result` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(30) DEFAULT NULL,
  `Event_Name` varchar(30) DEFAULT NULL,
  `Score` int(11) DEFAULT NULL,
  `Time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `result` */

LOCK TABLES `result` WRITE;

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
