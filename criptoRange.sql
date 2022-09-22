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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

/*Data for the table `account` */

insert  into `account`(`pkey`,`username`,`phone`,`name`,`crypto`,`role`,`img`,`refkey`,`status`,`verification`,`verificationtime`,`password`) values 
(0,'admin',NULL,'yayan','0.4',1,'',NULL,1,NULL,'1655109344','0192023a7bbd73250516f069df18b500'),
(5,'yayan1',NULL,'Guru','1',2,'','0',0,NULL,'1655109344','0192023a7bbd73250516f069df18b500'),
(41,'coba','6281532380661','','0',2,'','5',1,'2058','1663352794','c3ec0f7b054e729c5a716c8125839829'),
(46,'ascascasca','scascasc','','0',2,'','41',0,'8982','1663353346','df3e6c4b0fbecc6ee25fe4d4867509b0'),
(47,'testing','testing','','1.4',2,'','41',1,'8439','1663420221','ae2b1fca515949e5d54fb22b8ed95575'),
(48,'coba123','coba123','','9980.1',2,'','47',1,'2330','1663429778','a3040f90cc20fa672fe31efcae41d2db'),
(49,'yyyyyyyyyy','yyyyyyyyyy','','60.1',2,'','41',1,'5827','1663484158','0bbc18cdea1c4aaa17777d441214774a'),
(50,'yuhu','yuhu','','1.01',2,'','41',1,'6940','1663783677','b7f68bb19bde0d7787e67053b4acd3b9');

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

/*Table structure for table `detail_account_farming` */

DROP TABLE IF EXISTS `detail_account_farming`;

CREATE TABLE `detail_account_farming` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `refkey` int(11) DEFAULT NULL,
  `farmingkey` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `profit` float DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `hour` int(11) DEFAULT '0',
  PRIMARY KEY (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `detail_account_farming` */

insert  into `detail_account_farming`(`pkey`,`refkey`,`farmingkey`,`time`,`profit`,`status`,`hour`) values 
(3,7,1,'1659033712',8.58219,1,8763),
(4,7,1,'1659033779',9.30137,1,8760),
(5,7,1,'1659033814',10.863,0,6),
(6,7,1,'1659033865',11.863,0,6),
(7,7,1,'1659033901',12.863,0,6),
(8,7,1,'1659033903',13.863,0,6),
(9,7,2,'1659033907',4919640,0,6),
(10,7,1,'1659359746',1.68493,0,6),
(11,1,1,'1662389357',0,0,0),
(12,1,1,'1662389360',0,0,0);

/*Table structure for table `farming` */

DROP TABLE IF EXISTS `farming`;

CREATE TABLE `farming` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `labelkey` int(255) DEFAULT NULL,
  `percentage` float DEFAULT '0',
  `price` float DEFAULT '0',
  `createon` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `farming` */

insert  into `farming`(`pkey`,`name`,`labelkey`,`percentage`,`price`,`createon`,`time`) values 
(1,'farming test',0,2000,123,1,'1658948377'),
(2,'tvb,l',2,1231210,123232,1,'1658948349');

/*Table structure for table `label` */

DROP TABLE IF EXISTS `label`;

CREATE TABLE `label` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `createon` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `icon` text,
  `label` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `label` */

insert  into `label`(`pkey`,`createon`,`time`,`icon`,`label`,`class`) values 
(2,1,'1658948563','<svg style=\"width:24px;height:24px\" viewBox=\"0 0 24 24\">\r\n    <path fill=\"currentColor\" d=\"M17.66 11.2C17.43 10.9 17.15 10.64 16.89 10.38C16.22 9.78 15.46 9.35 14.82 8.72C13.33 7.26 13 4.85 13.95 3C13 3.23 12.17 3.75 11.46 4.32C8.87 6.4 7.85 10.07 9.07 13.22C9.11 13.32 9.15 13.42 9.15 13.55C9.15 13.77 9 13.97 8.8 14.05C8.57 14.15 8.33 14.09 8.14 13.93C8.08 13.88 8.04 13.83 8 13.76C6.87 12.33 6.69 10.28 7.45 8.64C5.78 10 4.87 12.3 5 14.47C5.06 14.97 5.12 15.47 5.29 15.97C5.43 16.57 5.7 17.17 6 17.7C7.08 19.43 8.95 20.67 10.96 20.92C13.1 21.19 15.39 20.8 17.03 19.32C18.86 17.66 19.5 15 18.56 12.72L18.43 12.46C18.22 12 17.66 11.2 17.66 11.2M14.5 17.5C14.22 17.74 13.76 18 13.4 18.1C12.28 18.5 11.16 17.94 10.5 17.28C11.69 17 12.4 16.12 12.61 15.23C12.78 14.43 12.46 13.77 12.33 13C12.21 12.26 12.23 11.63 12.5 10.94C12.69 11.32 12.89 11.7 13.13 12C13.9 13 15.11 13.44 15.37 14.8C15.41 14.94 15.43 15.08 15.43 15.23C15.46 16.05 15.1 16.95 14.5 17.5H14.5Z\" />\r\n</svg>','HOT','bg-gradient-to-b from-orange-600 to-amber-800');

/*Table structure for table `logs_farming` */

DROP TABLE IF EXISTS `logs_farming`;

CREATE TABLE `logs_farming` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `refkey` int(11) DEFAULT NULL,
  `targetkey` int(11) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=480 DEFAULT CHARSET=latin1;

/*Data for the table `logs_farming` */

insert  into `logs_farming`(`pkey`,`refkey`,`targetkey`,`value`,`note`,`time`) values 
(268,7,7,'+ 0.28082191780822','farming test','1659348794'),
(269,6,7,'+ 0.34541095890411','refferal','1659348794'),
(270,27,7,'+ 34.574794520548','refferal','1659348794'),
(271,7,7,'+ 0.28082191780822','farming test','1659348794'),
(272,6,7,'+ 0.34541095890411','refferal','1659348794'),
(273,27,7,'+ 34.574794520548','refferal','1659348794'),
(274,7,7,'+ 0.28082191780822','farming test','1659348794'),
(275,6,7,'+ 0.34541095890411','refferal','1659348794'),
(276,27,7,'+ 34.574794520548','refferal','1659348794'),
(277,7,7,'+ 0.28082191780822','farming test','1659348794'),
(278,6,7,'+ 0.34541095890411','refferal','1659348794'),
(279,27,7,'+ 34.574794520548','refferal','1659348794'),
(280,7,7,'+ 0.28082191780822','farming test','1659348794'),
(281,6,7,'+ 0.34541095890411','refferal','1659348794'),
(282,27,7,'+ 34.574794520548','refferal','1659348794'),
(283,7,7,'+ 0.28082191780822','farming test','1659348794'),
(284,6,7,'+ 0.34541095890411','refferal','1659348794'),
(285,27,7,'+ 34.574794520548','refferal','1659348794'),
(286,7,7,'+ 173201.45059361','tvb,l','1659348794'),
(287,6,7,'+ 213037.78423014','refferal','1659348794'),
(288,27,7,'+ 21324562.597085','refferal','1659348794'),
(289,7,7,'+ 0.28082191780822','farming test','1659364177'),
(290,6,7,'+ 0.0028082191780822','refferal','1659364177'),
(291,27,7,'+ 0.0056164383561644','refferal','1659364177'),
(292,26,7,'+ 0.0084246575342466','refferal','1659364177'),
(293,7,7,'+ 0.28082191780822','farming test','1659364177'),
(294,6,7,'+ 0.0028082191780822','refferal','1659364177'),
(295,27,7,'+ 0.0056164383561644','refferal','1659364177'),
(296,26,7,'+ 0.0084246575342466','refferal','1659364177'),
(297,7,7,'+ 0.28082191780822','farming test','1659364177'),
(298,6,7,'+ 0.0028082191780822','refferal','1659364177'),
(299,27,7,'+ 0.0056164383561644','refferal','1659364177'),
(300,26,7,'+ 0.0084246575342466','refferal','1659364177'),
(301,7,7,'+ 0.28082191780822','farming test','1659364177'),
(302,6,7,'+ 0.0028082191780822','refferal','1659364177'),
(303,27,7,'+ 0.0056164383561644','refferal','1659364177'),
(304,26,7,'+ 0.0084246575342466','refferal','1659364177'),
(305,7,7,'+ 0.28082191780822','farming test','1659364177'),
(306,6,7,'+ 0.0028082191780822','refferal','1659364177'),
(307,27,7,'+ 0.0056164383561644','refferal','1659364177'),
(308,26,7,'+ 0.0084246575342466','refferal','1659364177'),
(309,7,7,'+ 0.28082191780822','farming test','1659364177'),
(310,6,7,'+ 0.0028082191780822','refferal','1659364177'),
(311,27,7,'+ 0.0056164383561644','refferal','1659364177'),
(312,26,7,'+ 0.0084246575342466','refferal','1659364177'),
(313,7,7,'+ 173201.45059361','tvb,l','1659364177'),
(314,6,7,'+ 1732.0145059361','refferal','1659364177'),
(315,27,7,'+ 3464.0290118721','refferal','1659364177'),
(316,26,7,'+ 5196.0435178082','refferal','1659364177'),
(317,7,7,'+ 0.28082191780822','farming test','1659364177'),
(318,6,7,'+ 0.0028082191780822','refferal','1659364177'),
(319,27,7,'+ 0.0056164383561644','refferal','1659364177'),
(320,26,7,'+ 0.0084246575342466','refferal','1659364177'),
(321,7,7,'+ 0.28082191780822','farming test','1659364183'),
(322,6,7,'+ 0.0028082191780822','refferal','1659364183'),
(323,27,7,'+ 0.0056164383561644','refferal','1659364183'),
(324,26,7,'+ 0.0084246575342466','refferal','1659364183'),
(325,7,7,'+ 0.28082191780822','farming test','1659364183'),
(326,6,7,'+ 0.0028082191780822','refferal','1659364183'),
(327,27,7,'+ 0.0056164383561644','refferal','1659364183'),
(328,26,7,'+ 0.0084246575342466','refferal','1659364183'),
(329,7,7,'+ 0.28082191780822','farming test','1659364183'),
(330,6,7,'+ 0.0028082191780822','refferal','1659364183'),
(331,27,7,'+ 0.0056164383561644','refferal','1659364183'),
(332,26,7,'+ 0.0084246575342466','refferal','1659364183'),
(333,7,7,'+ 0.28082191780822','farming test','1659364183'),
(334,6,7,'+ 0.0028082191780822','refferal','1659364183'),
(335,27,7,'+ 0.0056164383561644','refferal','1659364183'),
(336,26,7,'+ 0.0084246575342466','refferal','1659364183'),
(337,7,7,'+ 0.28082191780822','farming test','1659364183'),
(338,6,7,'+ 0.0028082191780822','refferal','1659364183'),
(339,27,7,'+ 0.0056164383561644','refferal','1659364183'),
(340,26,7,'+ 0.0084246575342466','refferal','1659364183'),
(341,7,7,'+ 0.28082191780822','farming test','1659364183'),
(342,6,7,'+ 0.0028082191780822','refferal','1659364183'),
(343,27,7,'+ 0.0056164383561644','refferal','1659364183'),
(344,26,7,'+ 0.0084246575342466','refferal','1659364183'),
(345,7,7,'+ 173201.45059361','tvb,l','1659364184'),
(346,6,7,'+ 1732.0145059361','refferal','1659364184'),
(347,27,7,'+ 3464.0290118721','refferal','1659364184'),
(348,26,7,'+ 5196.0435178082','refferal','1659364184'),
(349,7,7,'+ 0.28082191780822','farming test','1659364184'),
(350,6,7,'+ 0.0028082191780822','refferal','1659364184'),
(351,27,7,'+ 0.0056164383561644','refferal','1659364184'),
(352,26,7,'+ 0.0084246575342466','refferal','1659364184'),
(353,7,7,'+ 0.28082191780822','farming test','1659364367'),
(354,6,7,'+ 0.0028082191780822','refferal','1659364367'),
(355,27,7,'+ 0.0056164383561644','refferal','1659364367'),
(356,26,7,'+ 0.0084246575342466','refferal','1659364367'),
(357,7,7,'+ 0.28082191780822','farming test','1659364380'),
(358,6,7,'+ 0.0028082191780822','refferal','1659364380'),
(359,27,7,'+ 0.0056164383561644','refferal','1659364380'),
(360,26,7,'+ 0.0084246575342466','refferal','1659364380'),
(361,7,7,'+ 0.28082191780822','farming test','1659364387'),
(362,6,7,'+ 0.0028082191780822','refferal','1659364387'),
(363,27,7,'+ 0.0056164383561644','refferal','1659364387'),
(364,26,7,'+ 0.0084246575342466','refferal','1659364387'),
(365,7,7,'+ 0.28082191780822','farming test','1659364402'),
(366,6,7,'+ 0.0028082191780822','refferal','1659364402'),
(367,27,7,'+ 0.0056164383561644','refferal','1659364402'),
(368,26,7,'+ 0.0084246575342466','refferal','1659364402'),
(369,7,7,'+ 0.28082191780822','farming test','1659364402'),
(370,6,7,'+ 0.0028082191780822','refferal','1659364402'),
(371,27,7,'+ 0.0056164383561644','refferal','1659364402'),
(372,26,7,'+ 0.0084246575342466','refferal','1659364402'),
(373,7,7,'+ 0.28082191780822','farming test','1659364402'),
(374,6,7,'+ 0.0028082191780822','refferal','1659364402'),
(375,27,7,'+ 0.0056164383561644','refferal','1659364402'),
(376,26,7,'+ 0.0084246575342466','refferal','1659364402'),
(377,7,7,'+ 0.28082191780822','farming test','1659364402'),
(378,6,7,'+ 0.0028082191780822','refferal','1659364402'),
(379,27,7,'+ 0.0056164383561644','refferal','1659364402'),
(380,26,7,'+ 0.0084246575342466','refferal','1659364402'),
(381,7,7,'+ 0.28082191780822','farming test','1659364402'),
(382,6,7,'+ 0.0028082191780822','refferal','1659364402'),
(383,27,7,'+ 0.0056164383561644','refferal','1659364402'),
(384,26,7,'+ 0.0084246575342466','refferal','1659364402'),
(385,7,7,'+ 173201.45059361','tvb,l','1659364402'),
(386,6,7,'+ 1732.0145059361','refferal','1659364402'),
(387,27,7,'+ 3464.0290118721','refferal','1659364402'),
(388,26,7,'+ 5196.0435178082','refferal','1659364402'),
(389,7,7,'+ 0.28082191780822','farming test','1659364402'),
(390,6,7,'+ 0.0028082191780822','refferal','1659364402'),
(391,27,7,'+ 0.0056164383561644','refferal','1659364402'),
(392,26,7,'+ 0.0084246575342466','refferal','1659364402'),
(393,7,7,'+ 0.28082191780822','farming test','1659364410'),
(394,6,7,'+ 0.0028082191780822','refferal','1659364410'),
(395,27,7,'+ 0.0056164383561644','refferal','1659364410'),
(396,26,7,'+ 0.0084246575342466','refferal','1659364410'),
(397,7,7,'+ 0.28082191780822','farming test','1659364410'),
(398,6,7,'+ 0.0028082191780822','refferal','1659364410'),
(399,27,7,'+ 0.0056164383561644','refferal','1659364410'),
(400,26,7,'+ 0.0084246575342466','refferal','1659364410'),
(401,7,7,'+ 0.28082191780822','farming test','1659364410'),
(402,6,7,'+ 0.0028082191780822','refferal','1659364410'),
(403,27,7,'+ 0.0056164383561644','refferal','1659364410'),
(404,26,7,'+ 0.0084246575342466','refferal','1659364410'),
(405,7,7,'+ 0.28082191780822','farming test','1659364410'),
(406,6,7,'+ 0.0028082191780822','refferal','1659364410'),
(407,27,7,'+ 0.0056164383561644','refferal','1659364410'),
(408,26,7,'+ 0.0084246575342466','refferal','1659364410'),
(409,7,7,'+ 0.28082191780822','farming test','1659364410'),
(410,6,7,'+ 0.0028082191780822','refferal','1659364410'),
(411,27,7,'+ 0.0056164383561644','refferal','1659364410'),
(412,26,7,'+ 0.0084246575342466','refferal','1659364410'),
(413,7,7,'+ 173201.45059361','tvb,l','1659364410'),
(414,6,7,'+ 1732.0145059361','refferal','1659364410'),
(415,27,7,'+ 3464.0290118721','refferal','1659364410'),
(416,26,7,'+ 5196.0435178082','refferal','1659364410'),
(417,7,7,'+ 0.28082191780822','farming test','1659364410'),
(418,6,7,'+ 0.0028082191780822','refferal','1659364410'),
(419,27,7,'+ 0.0056164383561644','refferal','1659364410'),
(420,26,7,'+ 0.0084246575342466','refferal','1659364410'),
(421,7,7,'+ 0.28082191780822','farming test','1659364519'),
(422,6,7,'+ 0.0028082191780822','refferal','1659364519'),
(423,27,7,'+ 0.0056164383561644','refferal','1659364519'),
(424,26,7,'+ 0.0084246575342466','refferal','1659364519'),
(425,7,7,'+ 0.28082191780822','farming test','1659364519'),
(426,6,7,'+ 0.0028082191780822','refferal','1659364519'),
(427,27,7,'+ 0.0056164383561644','refferal','1659364519'),
(428,26,7,'+ 0.0084246575342466','refferal','1659364519'),
(429,7,7,'+ 0.28082191780822','farming test','1659364519'),
(430,6,7,'+ 0.0028082191780822','refferal','1659364519'),
(431,27,7,'+ 0.0056164383561644','refferal','1659364519'),
(432,26,7,'+ 0.0084246575342466','refferal','1659364519'),
(433,7,7,'+ 0.28082191780822','farming test','1659364519'),
(434,6,7,'+ 0.0028082191780822','refferal','1659364519'),
(435,27,7,'+ 0.0056164383561644','refferal','1659364519'),
(436,26,7,'+ 0.0084246575342466','refferal','1659364519'),
(437,7,7,'+ 173201.45059361','tvb,l','1659364519'),
(438,6,7,'+ 1732.0145059361','refferal','1659364519'),
(439,27,7,'+ 3464.0290118721','refferal','1659364519'),
(440,26,7,'+ 5196.0435178082','refferal','1659364519'),
(441,7,7,'+ 0.28082191780822','farming test','1659364519'),
(442,6,7,'+ 0.0028082191780822','refferal','1659364519'),
(443,27,7,'+ 0.0056164383561644','refferal','1659364519'),
(444,26,7,'+ 0.0084246575342466','refferal','1659364519'),
(445,7,7,'+ 0.28082191780822','farming test','1659364554'),
(446,6,7,'+ 0.0028082191780822','refferal','1659364554'),
(447,27,7,'+ 0.0056164383561644','refferal','1659364554'),
(448,26,7,'+ 0.0084246575342466','refferal','1659364554'),
(449,7,7,'+ 0.28082191780822','farming test','1659364554'),
(450,6,7,'+ 0.0028082191780822','refferal','1659364554'),
(451,27,7,'+ 0.0056164383561644','refferal','1659364554'),
(452,26,7,'+ 0.0084246575342466','refferal','1659364554'),
(453,7,7,'+ 0.28082191780822','farming test','1659364554'),
(454,6,7,'+ 0.0028082191780822','refferal','1659364554'),
(455,27,7,'+ 0.0056164383561644','refferal','1659364554'),
(456,26,7,'+ 0.0084246575342466','refferal','1659364554'),
(457,7,7,'+ 0.28082191780822','farming test','1659364554'),
(458,6,7,'+ 0.0028082191780822','refferal','1659364554'),
(459,27,7,'+ 0.0056164383561644','refferal','1659364554'),
(460,26,7,'+ 0.0084246575342466','refferal','1659364554'),
(461,7,7,'+ 173201.45059361','tvb,l','1659364554'),
(462,6,7,'+ 1732.0145059361','refferal','1659364554'),
(463,27,7,'+ 3464.0290118721','refferal','1659364554'),
(464,26,7,'+ 5196.0435178082','refferal','1659364554'),
(465,7,7,'+ 0.28082191780822','farming test','1659364554'),
(466,6,7,'+ 0.0028082191780822','refferal','1659364554'),
(467,27,7,'+ 0.0056164383561644','refferal','1659364554'),
(468,26,7,'+ 0.0084246575342466','refferal','1659364554'),
(469,7,7,'-10000','Widraw Filed','1659364972'),
(470,7,7,'+40,000','Top Up','1659366972'),
(471,7,7,'+40,000','Top Up','1659367453'),
(472,7,7,'+40,000','Top Up','1659367527'),
(473,7,7,'+40,000','Top Up','1659367555'),
(474,50,41,'-5','Admin Fee','1663785290'),
(475,50,41,'-1','Send','1663785290'),
(476,41,50,'+1','Receive','1663785290'),
(477,50,41,'-0','Admin Fee','1663785316'),
(478,50,41,'-1','Send','1663785316'),
(479,41,50,'+1','Receive','1663785316');

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
(1,1,'3'),
(2,2,'7.5'),
(3,3,'12.5');

/*Table structure for table `percentage_refferal` */

DROP TABLE IF EXISTS `percentage_refferal`;

CREATE TABLE `percentage_refferal` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `percentage` float DEFAULT NULL,
  PRIMARY KEY (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `percentage_refferal` */

insert  into `percentage_refferal`(`pkey`,`percentage`) values 
(18,1),
(21,2),
(22,3);

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
(1,'Crypto','testing','2345423','234532','Login Crypto','logo.png','Live','Live Streaming','0xA54F619C274Af9E0efDCeF6cd909d74514Fba120',0,10,'{\"1\":\"321\",\"2\":\"123\"}',0x307831306564343363373138373134656236336435616135376237386235343730346532353630323465,10,2,1000);

/*Table structure for table `range` */

DROP TABLE IF EXISTS `range`;

CREATE TABLE `range` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `refkey` int(11) DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pkey`,`count`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `range` */

insert  into `range`(`pkey`,`refkey`,`count`,`date`) values 
(1,5,2,'1661086799'),
(9,41,1,'1655816535'),
(10,47,1,'1661086799'),
(11,48,3,'1661086799'),
(12,49,4,'1661086799'),
(13,50,0,'1663783677');

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
  `transactionkey` int(11) DEFAULT NULL,
  `walletaddress` varchar(255) DEFAULT NULL,
  `crypto` float DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `widraw` */

insert  into `widraw`(`pkey`,`refkey`,`transactionkey`,`walletaddress`,`crypto`,`time`,`status`) values 
(1,7,469,'testing',10000,'1659364972',2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
