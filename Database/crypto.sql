/*
SQLyog Ultimate v12.5.1 (32 bit)
MySQL - 10.1.38-MariaDB : Database - crypto
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`crypto` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `crypto`;

/*Table structure for table `account` */

DROP TABLE IF EXISTS `account`;

CREATE TABLE `account` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `saldo` varchar(255) DEFAULT '0',
  `cripto` varchar(255) DEFAULT '0',
  `role` int(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `refkey` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `verification` varchar(255) DEFAULT NULL,
  `verificationtime` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `account` */

insert  into `account`(`pkey`,`username`,`email`,`name`,`saldo`,`cripto`,`role`,`img`,`refkey`,`status`,`verification`,`verificationtime`,`password`) values 
(1,'admin',NULL,'yayan','25.7','0',1,'',NULL,1,NULL,'1655109344','0192023a7bbd73250516f069df18b500'),
(5,'yayan1',NULL,'Guru','27.1','0',2,'',NULL,0,NULL,'1655109344','0192023a7bbd73250516f069df18b500'),
(6,'yt',NULL,'yt','27.1','0',2,'',NULL,0,NULL,'1655109344','fa0ed5b5c600145bdd9a299952b99651'),
(7,'admin',NULL,'admin','9996299','0',2,'','6',1,'3958','1655109344','21232f297a57a5a743894a0e4a801fc3'),
(24,'ascasc','ascsc@mail.com','','27.1','0',2,'','7',1,'3958','1655109344','96f0f08c0188ba04898ce8cc465c19c4'),
(25,'ascasca','scascac@mail.com','','27.1','0',2,'','7',1,'9937','1655114948','96f0f08c0188ba04898ce8cc465c19c4'),
(26,'tttttt','tttttt@mail.com','','27.1','0',2,'','7',1,'3166','1655126500','bcc720f2981d1a68dbd66ffd67560c37'),
(27,'yayan','yayan@mail.com','','27.1','0',2,'','7',1,'6411','1655132728','0192023a7bbd73250516f069df18b500');

/*Table structure for table `account_bird_detail` */

DROP TABLE IF EXISTS `account_bird_detail`;

CREATE TABLE `account_bird_detail` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `refkey` int(11) DEFAULT NULL,
  `birdkey` int(11) DEFAULT NULL,
  `foodtime` varchar(255) DEFAULT '0',
  `merriedtime` varchar(255) DEFAULT '0',
  `gender` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `merried` int(11) DEFAULT '0',
  `price` varchar(255) DEFAULT NULL,
  KEY `pkey` (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=latin1;

/*Data for the table `account_bird_detail` */

insert  into `account_bird_detail`(`pkey`,`refkey`,`birdkey`,`foodtime`,`merriedtime`,`gender`,`status`,`merried`,`price`) values 
(186,27,20,'1656705639','1656770395',1,2,0,'0.1'),
(187,27,186,'0','0',0,0,0,NULL),
(188,27,186,'0','0',0,0,0,NULL),
(189,1,17,'1657209446','1657187835',1,1,0,NULL),
(190,7,22,'1657556407','1657556407',0,2,0,'12'),
(191,7,23,'1657556498','1657556498',0,2,0,'13'),
(192,7,24,'0','0',0,0,0,NULL),
(193,7,26,'0','0',0,0,0,NULL),
(194,7,25,'0','0',0,0,0,NULL),
(195,7,22,'1657556450','1657556450',0,1,0,NULL),
(196,7,23,'1657556509','1657556509',0,1,0,NULL),
(197,7,24,'0','0',0,0,0,NULL),
(198,7,25,'0','0',0,0,0,NULL),
(199,7,26,'0','0',0,0,0,NULL);

/*Table structure for table `bird` */

DROP TABLE IF EXISTS `bird`;

CREATE TABLE `bird` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `egg` varchar(255) DEFAULT NULL,
  `createon` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `merried` int(11) DEFAULT '0',
  `merriedfee` float DEFAULT '0',
  `minting` varchar(255) DEFAULT '0',
  `mintingfee` float DEFAULT '0',
  `food` int(11) DEFAULT NULL,
  `foodfee` float DEFAULT '0',
  `foodclaim` float DEFAULT '0',
  `maxmerried` int(11) DEFAULT NULL,
  KEY `pkey` (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `bird` */

insert  into `bird`(`pkey`,`name`,`level`,`price`,`img`,`egg`,`createon`,`time`,`merried`,`merriedfee`,`minting`,`mintingfee`,`food`,`foodfee`,`foodclaim`,`maxmerried`) values 
(22,'common',1,'50','1657555467.jpeg','1657634400.png',1,'1657634400',0,0,'0',0,NULL,0,0,NULL),
(23,'uncommon',2,'100','1657555486.jpeg','1657634546.png',1,'1657634546',0,0,'0',0,NULL,0,0,NULL),
(24,'rare',3,'200','1657555507.jpeg','1657634553.png',1,'1657634553',0,0,'0',0,NULL,0,0,NULL),
(25,'epic',4,'500','1657555536.jpeg','1657634563.png',1,'1657634563',0,0,'0',0,NULL,0,0,NULL),
(26,'legendary',5,'1000','1657555560.jpeg','1657634571.png',1,'1657634571',0,0,'0',0,NULL,0,0,NULL);

/*Table structure for table `head` */

DROP TABLE IF EXISTS `head`;

CREATE TABLE `head` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `createon` int(11) DEFAULT NULL,
  `html` longtext,
  `status` int(11) DEFAULT '0',
  KEY `pkey` (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `head` */

insert  into `head`(`pkey`,`name`,`time`,`createon`,`html`,`status`) values 
(1,'nama head','1648457125',1,'<style>\r\n        body {\r\n            background-color: #FFA20B;\r\n        }\r\n    </style>\r\n\r\n<!-- Start of LiveChat (www.livechatinc.com) code -->\r\n<script>\r\n    window.__lc = window.__lc || {};\r\n    window.__lc.license = 13477266;\r\n    ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:\"2.0\",on:function(){i([\"on\",c.call(arguments)])},once:function(){i([\"once\",c.call(arguments)])},off:function(){i([\"off\",c.call(arguments)])},get:function(){if(!e._h)throw new Error(\"[LiveChatWidget] You can\'t use getters before load.\");return i([\"get\",c.call(arguments)])},call:function(){i([\"call\",c.call(arguments)])},init:function(){var n=t.createElement(\"script\");n.async=!0,n.type=\"text/javascript\",n.src=\"https://cdn.livechatinc.com/tracking.js\",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))\r\n</script>\r\n<noscript><a href=\"https://www.livechatinc.com/chat-with/13477266/\" rel=\"nofollow\">Chat with us</a>, powered by <a href=\"https://www.livechatinc.com/?welcome\" rel=\"noopener nofollow\" target=\"_blank\">LiveChat</a></noscript>\r\n<!-- End of LiveChat code -->',0),
(2,'scasc','1648560839',1,'',0),
(3,'aaaaaa','1650321787',1,'<meta charset=\"utf-8\">',1);

/*Table structure for table `level` */

DROP TABLE IF EXISTS `level`;

CREATE TABLE `level` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `start` int(11) DEFAULT '10',
  `end` int(11) DEFAULT '30',
  `createon` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  KEY `pkey` (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `level` */

insert  into `level`(`pkey`,`name`,`start`,`end`,`createon`,`time`) values 
(2,'high',50,89,'1','1654956767'),
(3,'low',30,50,'1','1654954725'),
(4,'medium',70,80,'1','1654954736');

/*Table structure for table `merried_log` */

DROP TABLE IF EXISTS `merried_log`;

CREATE TABLE `merried_log` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `refkey` int(11) DEFAULT NULL,
  `birdkey` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  KEY `pkey` (`pkey`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `merried_log` */

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
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `profile_company` */

insert  into `profile_company`(`id`,`name`,`alamat`,`telepon`,`phone`,`titlelogin`,`logo`,`title`,`menutitle`) values 
(1,'Slot gacor','testing','2345423','234532','Login Love Egg','logo.png','Live','Live Streaming');

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
(2,'Admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
