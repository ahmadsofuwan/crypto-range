/*
SQLyog Ultimate v12.5.1 (32 bit)
MySQL - 10.1.38-MariaDB : Database - crypto_range
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`crypto_range` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `crypto_range`;

/*Table structure for table `account` */

DROP TABLE IF EXISTS `account`;

CREATE TABLE `account` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `crypto` varchar(255) DEFAULT '0',
  `role` int(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `refkey` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `verification` varchar(255) DEFAULT NULL,
  `verificationtime` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

/*Data for the table `account` */

insert  into `account`(`pkey`,`username`,`phone`,`name`,`crypto`,`role`,`img`,`refkey`,`status`,`verification`,`verificationtime`,`password`) values 
(0,'admin',NULL,'yayan','0.4',1,'',NULL,1,NULL,'1655109344','0192023a7bbd73250516f069df18b500'),
(5,'yayan1',NULL,'Guru','1',2,'','0',0,NULL,'1655109344','0192023a7bbd73250516f069df18b500'),
(41,'coba','6281532380661','','2',2,'','5',1,'2058','1663352794','c3ec0f7b054e729c5a716c8125839829'),
(46,'ascascasca','scascasc','','0',2,'','41',0,'8982','1663353346','df3e6c4b0fbecc6ee25fe4d4867509b0'),
(47,'testing','testing','','1.4',2,'','41',1,'8439','1663420221','ae2b1fca515949e5d54fb22b8ed95575'),
(48,'coba123','coba123','','9980.1',2,'','47',1,'2330','1663429778','a3040f90cc20fa672fe31efcae41d2db'),
(49,'yyyyyyyyyy','yyyyyyyyyy','','60.1',2,'','41',1,'5827','1663484158','0bbc18cdea1c4aaa17777d441214774a'),
(50,'yuhu','yuhu','','1.01',2,'','41',1,'6940','1663783677','b7f68bb19bde0d7787e67053b4acd3b9'),
(51,'yuhu123','yuhu123','','890',2,'','41',1,'6765','1663856085','e30ab06807efd024559d76cbe84f96cf');

/*Table structure for table `claimtopup` */

DROP TABLE IF EXISTS `claimtopup`;

CREATE TABLE `claimtopup` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `refkey` int(11) DEFAULT NULL,
  `tx` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `claimtopup` */

insert  into `claimtopup`(`pkey`,`refkey`,`tx`,`time`) values 
(4,7,'0x6b6b798d87b04ee84a4143b8d4226705aed2a4707d7c33bcbf74393bb95d79fb','1659367555');

/*Table structure for table `logs` */

DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `targetkey` int(11) DEFAULT NULL,
  `refkey` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `logs` */

insert  into `logs`(`pkey`,`targetkey`,`refkey`,`time`,`note`,`value`) values 
(9,41,41,'1663874802','widraw filed','0'),
(10,41,41,'1663874959','widraw filed','-10');

/*Table structure for table `month_fee` */

DROP TABLE IF EXISTS `month_fee`;

CREATE TABLE `month_fee` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `range` int(11) DEFAULT NULL,
  `fee` varchar(255) DEFAULT '0',
  PRIMARY KEY (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `month_fee` */

insert  into `month_fee`(`pkey`,`range`,`fee`) values 
(1,1,'7'),
(2,2,'13.5'),
(3,3,'22.5');

/*Table structure for table `profile_company` */

DROP TABLE IF EXISTS `profile_company`;

CREATE TABLE `profile_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `titlelogin` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `menutitle` varchar(255) DEFAULT NULL,
  `walletAddress` varchar(255) DEFAULT NULL,
  `cryptotransactionfee` float DEFAULT '0',
  `minimumwidraw` float DEFAULT '0',
  `referral` varchar(255) DEFAULT NULL,
  `contract` varbinary(255) DEFAULT NULL,
  `feeactive` int(11) DEFAULT NULL,
  `twig` int(11) DEFAULT NULL,
  `onemonth` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `profile_company` */

insert  into `profile_company`(`id`,`name`,`alamat`,`telepon`,`phone`,`titlelogin`,`logo`,`title`,`menutitle`,`walletAddress`,`cryptotransactionfee`,`minimumwidraw`,`referral`,`contract`,`feeactive`,`twig`,`onemonth`) values 
(1,'Crypto','testing','2345423','234532','My MATIC','logo.png','Live','Live Streaming','0xA54F619C274Af9E0efDCeF6cd909d74514Fba120',0,10,'{\"1\":\"321\",\"2\":\"123\"}',0x307831306564343363373138373134656236336435616135376237386235343730346532353630323465,10,2,1000);

/*Table structure for table `range` */

DROP TABLE IF EXISTS `range`;

CREATE TABLE `range` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `refkey` int(11) DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pkey`,`count`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `range` */

insert  into `range`(`pkey`,`refkey`,`count`,`date`) values 
(1,5,2,'1661086799'),
(9,41,2,'1655816535'),
(10,47,1,'1661086799'),
(11,48,3,'1661086799'),
(12,49,4,'1661086799'),
(13,50,0,'1663783677'),
(14,51,0,'1663856085');

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  KEY `pkey` (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `role` */

insert  into `role`(`pkey`,`name`) values 
(1,'Super Admin'),
(2,'user');

/*Table structure for table `widraw` */

DROP TABLE IF EXISTS `widraw`;

CREATE TABLE `widraw` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `refkey` int(11) DEFAULT NULL,
  `walletaddress` varchar(255) DEFAULT NULL,
  `crypto` float DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `widraw` */

insert  into `widraw`(`pkey`,`refkey`,`walletaddress`,`crypto`,`time`,`status`) values 
(5,41,'sdsfdgfhgjghgfd',10,'1663873758',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
