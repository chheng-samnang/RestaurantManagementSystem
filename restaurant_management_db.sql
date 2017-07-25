/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.11 : Database - restaurant_management_system
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`restaurant_management_system` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `restaurant_management_system`;

/*Table structure for table `tbl_balance` */

DROP TABLE IF EXISTS `tbl_balance`;

CREATE TABLE `tbl_balance` (
  `bal_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` varchar(50) NOT NULL,
  `open_bal_usd` decimal(18,2) NOT NULL,
  `open_bal_riel` int(11) NOT NULL,
  `exchange_rate` int(10) DEFAULT '0',
  `user_crea` varchar(20) NOT NULL,
  `date_crea` date NOT NULL,
  `user_updt` varchar(20) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`bal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_balance` */

insert  into `tbl_balance`(`bal_id`,`staff_id`,`open_bal_usd`,`open_bal_riel`,`exchange_rate`,`user_crea`,`date_crea`,`user_updt`,`date_updt`) values (23,'chheng.samnang',100.00,100000,4020,'admin','2017-01-04',NULL,NULL),(25,'chheng.samnang',200.00,800000,4020,'admin','2017-01-11',NULL,NULL);

/*Table structure for table `tbl_book` */

DROP TABLE IF EXISTS `tbl_book`;

CREATE TABLE `tbl_book` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `tab_id` int(11) NOT NULL,
  `phone` char(13) NOT NULL,
  `people` tinyint(4) NOT NULL,
  `time_book` time NOT NULL,
  `des` text,
  `status` int(1) DEFAULT '0',
  `user_crea` varchar(100) NOT NULL,
  `date_crea` date NOT NULL,
  `user_updt` varchar(100) NOT NULL,
  `date_updt` date NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_book` */

insert  into `tbl_book`(`book_id`,`customer_name`,`tab_id`,`phone`,`people`,`time_book`,`des`,`status`,`user_crea`,`date_crea`,`user_updt`,`date_updt`) values (78,'Chheng Samnang',1,'070893164',4,'19:30:00','',1,'admin','2017-01-09','admin','2017-04-21'),(79,'Chou Meng',1,'0122323232',5,'14:02:00','',1,'admin','2017-01-09','admin','2017-01-09'),(80,'chheng samnang',2,'070893164',5,'19:30:00','',1,'admin','2017-04-21','','0000-00-00');

/*Table structure for table `tbl_category` */

DROP TABLE IF EXISTS `tbl_category`;

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(150) CHARACTER SET latin1 NOT NULL,
  `cat_name_kh` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `desc` text CHARACTER SET latin1,
  `parent_id` int(11) NOT NULL,
  `user_crea` varchar(20) NOT NULL,
  `date_crea` date NOT NULL,
  `user_updt` varchar(20) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_category` */

insert  into `tbl_category`(`cat_id`,`cat_name`,`cat_name_kh`,`desc`,`parent_id`,`user_crea`,`date_crea`,`user_updt`,`date_updt`) values (1,'Food','អាហារ','<p>Test</p>',0,'0','2016-10-19','admin','2016-12-08'),(4,'Drink','ភេសជ្ជៈ','',0,'','2016-10-31','chheng.samnang','2016-10-31'),(5,'Dessert','បង្អែម','',0,'','2016-12-13',NULL,NULL);

/*Table structure for table `tbl_closeshift` */

DROP TABLE IF EXISTS `tbl_closeshift`;

CREATE TABLE `tbl_closeshift` (
  `clsft_id` int(11) NOT NULL AUTO_INCREMENT,
  `clsft_date` date NOT NULL,
  `staff_id` int(11) NOT NULL,
  `cash_usd` decimal(18,2) NOT NULL,
  `cash_riel` int(11) NOT NULL,
  `exchange_usd` decimal(18,2) NOT NULL,
  `exchange_riel` int(11) NOT NULL,
  `open_bal_usd` decimal(18,2) NOT NULL,
  `open_bal_riel` int(11) NOT NULL,
  `ending_bal_usd` decimal(18,2) NOT NULL,
  `ending_bal_riel` int(11) NOT NULL,
  `user_crea` varchar(20) NOT NULL,
  `date_crea` date NOT NULL,
  `user_updt` varchar(20) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`clsft_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_closeshift` */

/*Table structure for table `tbl_customer` */

DROP TABLE IF EXISTS `tbl_customer`;

CREATE TABLE `tbl_customer` (
  `cus_id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_name` varchar(150) NOT NULL,
  `desc` text,
  `discount` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `user_crea` varchar(20) NOT NULL,
  `date_crea` date NOT NULL,
  `user_updt` varchar(20) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`cus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_customer` */

insert  into `tbl_customer`(`cus_id`,`cus_name`,`desc`,`discount`,`count`,`user_crea`,`date_crea`,`user_updt`,`date_updt`) values (3,'General Customer','',0,0,'1','2016-11-01',NULL,NULL),(4,'VIP','',100,0,'1','2016-11-10',NULL,NULL),(5,'Bronze','',30,0,'1','2016-11-11',NULL,NULL);

/*Table structure for table `tbl_invoice_det` */

DROP TABLE IF EXISTS `tbl_invoice_det`;

CREATE TABLE `tbl_invoice_det` (
  `inv_det_id` int(11) NOT NULL AUTO_INCREMENT,
  `inv_id` varchar(100) NOT NULL,
  `m_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` decimal(18,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `total` decimal(18,2) DEFAULT NULL,
  PRIMARY KEY (`inv_det_id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_invoice_det` */

insert  into `tbl_invoice_det`(`inv_det_id`,`inv_id`,`m_id`,`qty`,`cost`,`discount`,`total`) values (12,'20170111085856',1,1,2.50,0,2.50),(13,'20170111085856',3,1,1.00,0,1.00),(14,'20170112071817',1,1,2.50,0,2.50),(15,'20170112071817',1,1,2.50,0,2.50),(16,'20170112071817',1,1,2.50,0,2.50),(17,'20170112071817',1,1,2.50,0,2.50),(18,'20170112071817',1,1,2.50,0,2.50),(19,'20170112071817',1,1,2.50,0,2.50),(20,'20170112071817',1,1,2.50,0,2.50),(21,'20170112071817',1,1,2.50,0,2.50),(22,'20170112071817',1,1,2.50,0,2.50),(23,'20170112071817',1,1,2.50,0,2.50),(24,'20170112071817',1,1,2.50,0,2.50),(25,'20170112071817',1,1,2.50,0,2.50),(26,'20170112071817',1,1,2.50,0,2.50),(27,'20170112071817',1,1,2.50,0,2.50),(28,'20170112071817',1,1,2.50,0,2.50),(29,'20170112071817',1,1,2.50,0,2.50),(30,'20170112071817',1,1,2.50,0,2.50),(31,'20170112071817',1,1,2.50,0,2.50),(32,'20170112071817',1,1,2.50,0,2.50),(33,'20170112071817',1,1,2.50,0,2.50),(34,'20170112071817',1,1,2.50,0,2.50),(35,'20170112071817',1,1,2.50,0,2.50),(36,'20170112071817',1,1,2.50,0,2.50),(37,'20170112071817',1,1,2.50,0,2.50),(38,'20170112071817',1,1,2.50,0,2.50),(39,'20170112071817',1,1,2.50,0,2.50),(40,'20170112071817',1,1,2.50,0,2.50),(41,'20170112071817',1,1,2.50,0,2.50),(42,'20170112071817',1,1,2.50,0,2.50),(43,'20170112071817',1,1,2.50,0,2.50),(44,'20170112071856',3,1,1.00,0,1.00),(45,'20170112071856',9,1,2.50,0,2.50),(46,'20170121082740',1,1,2.50,0,2.50),(47,'20170121082828',1,1,2.50,0,2.50),(48,'20170121082828',7,1,25.00,0,25.00),(49,'20170121082828',8,1,15.00,0,15.00),(50,'20170121083107',2,1,10.00,0,10.00),(51,'20170121083107',3,1,1.00,0,1.00),(52,'20170121083107',9,1,2.50,0,2.50),(53,'20170121090317',1,1,2.50,0,2.50),(54,'20170121095752',1,1,2.50,0,2.50),(55,'20170206090912',1,1,2.50,0,2.50),(56,'20170206090912',7,1,25.00,0,25.00),(57,'20170223081504',1,1,2.50,0,2.50),(58,'20170223081504',2,1,10.00,0,10.00),(59,'20170223081504',3,1,1.00,0,1.00),(60,'20170223081504',9,1,2.50,0,2.50),(61,'20170419091856',1,1,2.50,0,2.50),(62,'20170419091949',2,1,10.00,0,10.00),(63,'20170419091949',9,1,2.50,0,2.50),(64,'20170421121710',1,1,2.50,0,2.50),(65,'20170421121710',3,1,1.00,0,1.00),(66,'20170421121947',7,1,25.00,0,25.00),(67,'20170421122009',8,1,15.00,0,15.00);

/*Table structure for table `tbl_invoice_hdr` */

DROP TABLE IF EXISTS `tbl_invoice_hdr`;

CREATE TABLE `tbl_invoice_hdr` (
  `inv_id` varchar(100) NOT NULL,
  `inv_date` date NOT NULL,
  `tab_id` int(11) NOT NULL,
  `staff_id` varbinary(50) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `user_crea` varchar(20) NOT NULL,
  `date_crea` date NOT NULL,
  `user_updt` varchar(20) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  `paid` int(1) DEFAULT '0',
  PRIMARY KEY (`inv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_invoice_hdr` */

insert  into `tbl_invoice_hdr`(`inv_id`,`inv_date`,`tab_id`,`staff_id`,`discount`,`user_crea`,`date_crea`,`user_updt`,`date_updt`,`paid`) values ('20170111085856','2017-01-11',1,'',NULL,'chheng.samnang','2017-01-11',NULL,NULL,1),('20170112071817','2017-01-12',1,'',NULL,'admin','2017-01-12',NULL,NULL,1),('20170112071856','2017-01-12',1,'',NULL,'admin','2017-01-12',NULL,NULL,1),('20170121082740','2017-01-21',1,'',NULL,'admin','2017-01-21',NULL,NULL,1),('20170121082828','2017-01-21',1,'',NULL,'admin','2017-01-21',NULL,NULL,1),('20170121083107','2017-01-21',1,'',NULL,'admin','2017-01-21',NULL,NULL,1),('20170121090317','2017-01-21',1,'',NULL,'admin','2017-01-21',NULL,NULL,1),('20170121095752','2017-01-21',1,'',NULL,'admin','2017-01-21',NULL,NULL,1),('20170206090912','2017-02-06',1,'',NULL,'admin','2017-02-06',NULL,NULL,1),('20170223081504','2017-02-23',1,'',NULL,'admin','2017-02-23',NULL,NULL,1),('20170419091856','2017-04-19',1,'',NULL,'admin','2017-04-19',NULL,NULL,1),('20170419091949','2017-04-19',2,'',NULL,'admin','2017-04-19',NULL,NULL,1),('20170421121710','2017-04-21',3,'',NULL,'admin','2017-04-21',NULL,NULL,1),('20170421121947','2017-04-21',2,'',NULL,'admin','2017-04-21',NULL,NULL,1),('20170421122009','2017-04-21',2,'',NULL,'admin','2017-04-21',NULL,NULL,1);

/*Table structure for table `tbl_menu` */

DROP TABLE IF EXISTS `tbl_menu`;

CREATE TABLE `tbl_menu` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_name` varchar(150) NOT NULL,
  `m_name_kh` varchar(150) CHARACTER SET utf8 NOT NULL,
  `cat_id` int(11) NOT NULL,
  `price` decimal(18,2) NOT NULL,
  `desc` text,
  `desc_kh` text CHARACTER SET utf8,
  `img` varchar(200) DEFAULT NULL,
  `measure` varchar(100) DEFAULT NULL,
  `user_crea` varchar(20) NOT NULL,
  `date_crea` date NOT NULL,
  `user_updt` varchar(20) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_menu` */

insert  into `tbl_menu`(`m_id`,`m_name`,`m_name_kh`,`cat_id`,`price`,`desc`,`desc_kh`,`img`,`measure`,`user_crea`,`date_crea`,`user_updt`,`date_updt`) values (1,'Pork Rice','បាយសាច់ជ្រូក',1,2.50,'','','pork-on-rice.jpg','','1','2016-10-31',NULL,NULL),(2,'Hamburger','បឺហ្គឺ',1,10.00,'','','Burger2.png','','1','2016-11-07',NULL,NULL),(3,'Cocacola','កូកាកូឡា',4,1.00,'','','ps_mx_cc-regular-600.png','','1','2016-11-07',NULL,NULL),(4,'Barbeque','សាច់អាំង',1,5.00,'','','Barbeque.png','','1','2016-11-12',NULL,NULL),(5,'Beef Steak','ប៊ីស្ទឹក',1,12.00,'','','Beef_Steak.jpg','','admin','2016-11-12',NULL,NULL),(6,'French Fries','ដំឡូងបារាំង',1,6.00,'','','French_Fires.png','','admin','2016-11-12',NULL,NULL),(7,'Pizza','ភីហ្សា',1,25.00,'','','pizza.png','','admin','2016-11-12',NULL,NULL),(8,'Roasted Chicken','មាន់ដុត',1,15.00,'','','Roasted_Chicken.png','','admin','2016-11-12',NULL,NULL),(9,'Pan Cake','នំខេក',5,2.50,'','','pan_cake.png','','admin','2016-12-13','admin','2016-12-15');

/*Table structure for table `tbl_order_det` */

DROP TABLE IF EXISTS `tbl_order_det`;

CREATE TABLE `tbl_order_det` (
  `ord_det_id` int(11) NOT NULL AUTO_INCREMENT,
  `ord_id` varchar(100) NOT NULL,
  `m_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` decimal(18,2) NOT NULL,
  `discount` decimal(18,2) NOT NULL,
  `comment` text,
  `status` int(1) DEFAULT '0',
  PRIMARY KEY (`ord_det_id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_order_det` */

insert  into `tbl_order_det`(`ord_det_id`,`ord_id`,`m_id`,`qty`,`cost`,`discount`,`comment`,`status`) values (54,'20170111085842',1,1,2.50,0.00,'',1),(55,'20170111085842',3,1,1.00,0.00,'',1),(56,'20170112071722',1,1,2.50,0.00,'',1),(57,'20170112071722',1,1,2.50,0.00,'',1),(58,'20170112071722',1,1,2.50,0.00,'',1),(59,'20170112071722',1,1,2.50,0.00,'',1),(60,'20170112071722',1,1,2.50,0.00,'',1),(61,'20170112071722',1,1,2.50,0.00,'',1),(62,'20170112071722',1,1,2.50,0.00,'',1),(63,'20170112071722',1,1,2.50,0.00,'',1),(64,'20170112071722',1,1,2.50,0.00,'',1),(65,'20170112071722',1,1,2.50,0.00,'',1),(66,'20170112071722',1,1,2.50,0.00,'',1),(67,'20170112071722',1,1,2.50,0.00,'',1),(68,'20170112071722',1,1,2.50,0.00,'',1),(69,'20170112071722',1,1,2.50,0.00,'',1),(70,'20170112071722',1,1,2.50,0.00,'',1),(71,'20170112071722',1,1,2.50,0.00,'',1),(72,'20170112071722',1,1,2.50,0.00,'',1),(73,'20170112071722',1,1,2.50,0.00,'',1),(74,'20170112071722',1,1,2.50,0.00,'',1),(75,'20170112071722',1,1,2.50,0.00,'',1),(76,'20170112071722',1,1,2.50,0.00,'',1),(77,'20170112071722',1,1,2.50,0.00,'',1),(78,'20170112071722',1,1,2.50,0.00,'',1),(79,'20170112071722',1,1,2.50,0.00,'',1),(80,'20170112071722',1,1,2.50,0.00,'',1),(81,'20170112071722',1,1,2.50,0.00,'',1),(82,'20170112071722',1,1,2.50,0.00,'',1),(83,'20170112071722',1,1,2.50,0.00,'',1),(84,'20170112071722',1,1,2.50,0.00,'',1),(85,'20170112071722',1,1,2.50,0.00,'',1),(86,'20170112071843',3,1,1.00,0.00,'',1),(87,'20170112071843',9,1,2.50,0.00,'',1),(88,'20170121082724',1,1,2.50,0.00,'',1),(89,'20170121082816',1,1,2.50,0.00,'',1),(90,'20170121082816',7,1,25.00,0.00,'',1),(91,'20170121082816',8,1,15.00,0.00,'',1),(92,'20170121083050',2,1,10.00,0.00,'',1),(93,'20170121083050',3,1,1.00,0.00,'',1),(94,'20170121083050',9,1,2.50,0.00,'',1),(95,'20170121090303',1,1,2.50,0.00,'',1),(96,'20170121095733',1,1,2.50,0.00,'',1),(97,'20170206090902',1,1,2.50,0.00,'',1),(98,'20170206090902',7,1,25.00,0.00,'',1),(99,'20170223081442',1,1,2.50,0.00,'',1),(100,'20170223081442',2,1,10.00,0.00,'',1),(101,'20170223081442',3,1,1.00,0.00,'',1),(102,'20170223081442',9,1,2.50,0.00,'',1),(103,'20170419091745',1,1,2.50,0.00,'',1),(104,'20170419091745',2,1,10.00,0.00,'',1),(105,'20170419091745',9,1,2.50,0.00,'',1),(106,'20170421121524',1,1,2.50,0.00,'?????????',1),(107,'20170421121524',3,1,1.00,0.00,'????????',1),(108,'20170421121913',7,1,25.00,0.00,'',1),(109,'20170421121913',8,1,15.00,0.00,'',1);

/*Table structure for table `tbl_order_hdr` */

DROP TABLE IF EXISTS `tbl_order_hdr`;

CREATE TABLE `tbl_order_hdr` (
  `ord_id` varchar(100) NOT NULL,
  `ord_date` date NOT NULL,
  `tab_id` int(11) NOT NULL,
  `staff_id` varchar(30) NOT NULL,
  `user_crea` varchar(20) NOT NULL,
  `date_crea` date NOT NULL,
  `user_updt` varchar(20) NOT NULL,
  `date_updt` date NOT NULL,
  `paid` int(1) DEFAULT NULL,
  PRIMARY KEY (`ord_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_order_hdr` */

insert  into `tbl_order_hdr`(`ord_id`,`ord_date`,`tab_id`,`staff_id`,`user_crea`,`date_crea`,`user_updt`,`date_updt`,`paid`) values ('20170111085842','2017-01-11',2,'chheng.samnang','chheng.samnang','2017-01-11','','0000-00-00',1),('20170112071722','2017-01-12',2,'admin','admin','2017-01-12','','0000-00-00',1),('20170112071843','2017-01-12',2,'admin','admin','2017-01-12','','0000-00-00',1),('20170121082724','2017-01-21',2,'admin','admin','2017-01-21','','0000-00-00',1),('20170121082816','2017-01-21',2,'admin','admin','2017-01-21','','0000-00-00',1),('20170121083050','2017-01-21',2,'admin','admin','2017-01-21','','0000-00-00',1),('20170121090303','2017-01-21',2,'admin','admin','2017-01-21','','0000-00-00',1),('20170121095733','2017-01-21',2,'admin','admin','2017-01-21','','0000-00-00',1),('20170206090902','2017-02-06',2,'admin','admin','2017-02-06','','0000-00-00',1),('20170223081442','2017-02-23',2,'admin','admin','2017-02-23','','0000-00-00',1),('20170419091745','2017-04-19',2,'admin','admin','2017-04-19','','0000-00-00',1),('20170421121524','2017-04-21',3,'admin','admin','2017-04-21','','0000-00-00',1),('20170421121913','2017-04-21',2,'admin','admin','2017-04-21','','0000-00-00',1);

/*Table structure for table `tbl_permission` */

DROP TABLE IF EXISTS `tbl_permission`;

CREATE TABLE `tbl_permission` (
  `perm_id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `add` int(11) DEFAULT NULL,
  `edit` int(11) DEFAULT NULL,
  `delete` int(11) DEFAULT NULL,
  `form` varchar(50) NOT NULL,
  `user_crea` varchar(20) NOT NULL,
  `date_crea` date NOT NULL,
  `user_updt` varchar(20) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`perm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_permission` */

insert  into `tbl_permission`(`perm_id`,`user`,`add`,`edit`,`delete`,`form`,`user_crea`,`date_crea`,`user_updt`,`date_updt`) values (26,'chheng.samnang',1,0,0,'userController','admin','2016-11-04',NULL,NULL),(27,'chheng.samnang',1,0,0,'customer_C','admin','2016-11-04',NULL,NULL),(28,'chheng.samnang',1,0,0,'Menu_C','admin','2016-11-04',NULL,NULL),(29,'chheng.samnang',1,0,0,'table_C','admin','2016-11-04',NULL,NULL),(30,'chheng.samnang',1,0,0,'Position','admin','2016-11-04',NULL,NULL),(31,'chheng.samnang',1,0,0,'Category','admin','2016-11-04',NULL,NULL),(32,'chheng.samnang',1,0,0,'Balance','admin','2016-11-04',NULL,NULL),(33,'chheng.samnang',1,1,0,'staff','admin','2016-11-04','admin','2016-11-05');

/*Table structure for table `tbl_position` */

DROP TABLE IF EXISTS `tbl_position`;

CREATE TABLE `tbl_position` (
  `pos_id` int(11) NOT NULL AUTO_INCREMENT,
  `pos_name` varchar(150) NOT NULL,
  `pos_name_kh` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `des` text,
  `user_crea` varchar(20) NOT NULL,
  `date_crea` date NOT NULL,
  `user_updt` varchar(20) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`pos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_position` */

insert  into `tbl_position`(`pos_id`,`pos_name`,`pos_name_kh`,`des`,`user_crea`,`date_crea`,`user_updt`,`date_updt`) values (1,'System Admin','System Admin','test','1','2016-09-16','1','2016-09-16'),(5,'Cashier','បេឡា','','','0000-00-00',NULL,NULL);

/*Table structure for table `tbl_receipt` */

DROP TABLE IF EXISTS `tbl_receipt`;

CREATE TABLE `tbl_receipt` (
  `rec_id` int(11) NOT NULL AUTO_INCREMENT,
  `rec_no` varchar(100) DEFAULT NULL,
  `rec_date` date NOT NULL,
  `inv_id` int(11) NOT NULL,
  `ttl_usd` decimal(18,2) NOT NULL,
  `ttl_riel` int(11) NOT NULL,
  `cash_usd` decimal(18,2) NOT NULL,
  `cash_riel` int(11) NOT NULL,
  `exchange_usd` decimal(18,2) NOT NULL,
  `exchange_riel` int(11) NOT NULL,
  `ex_rate` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `user_crea` varchar(20) NOT NULL,
  `date_crea` date NOT NULL,
  `user_updt` varchar(20) NOT NULL,
  `date_updt` date NOT NULL,
  PRIMARY KEY (`rec_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_receipt` */

insert  into `tbl_receipt`(`rec_id`,`rec_no`,`rec_date`,`inv_id`,`ttl_usd`,`ttl_riel`,`cash_usd`,`cash_riel`,`exchange_usd`,`exchange_riel`,`ex_rate`,`status`,`user_crea`,`date_crea`,`user_updt`,`date_updt`) values (5,'1484125141906','2017-01-11',2147483647,3.50,14200,3.00,2140,0.00,0,4020,NULL,'chheng.samnang','2017-01-11','','0000-00-00'),(6,'1484205508529','2017-01-12',2147483647,75.00,301600,75.00,0,0.00,0,4020,NULL,'admin','2017-01-12','','0000-00-00'),(7,'1484205541618','2017-01-12',2147483647,3.50,14200,3.50,0,0.00,0,4020,NULL,'admin','2017-01-12','','0000-00-00'),(8,'1484987269165','2017-01-21',2147483647,2.50,10200,0.00,10200,0.00,0,4020,NULL,'admin','2017-01-21','','0000-00-00'),(9,'1484987314893','2017-01-21',2147483647,42.50,171000,0.00,171000,0.00,0,4020,NULL,'admin','2017-01-21','','0000-00-00'),(10,'1484989364688','2017-01-21',2147483647,13.50,54400,13.00,0,0.00,1900,4020,NULL,'admin','2017-01-21','','0000-00-00'),(11,'1484992633133','2017-01-21',2147483647,2.50,10200,2.00,0,0.00,1900,4020,NULL,'admin','2017-01-21','','0000-00-00'),(12,'1485015954649','2017-01-21',2147483647,2.50,10200,2.50,0,0.00,0,4020,NULL,'admin','2017-01-21','','0000-00-00'),(13,'1487837662891','2017-02-23',2147483647,27.50,110700,27.00,2100,0.00,0,4020,NULL,'admin','2017-02-23','','0000-00-00'),(14,'1487837709555','2017-02-23',2147483647,16.00,64400,16.00,0,0.00,0,4020,NULL,'admin','2017-02-23','','0000-00-00'),(15,'1492593548547','2017-04-19',2147483647,2.50,10200,2.00,2100,0.00,0,4020,NULL,'admin','2017-04-19','','0000-00-00'),(16,'1492593598958','2017-04-19',2147483647,12.50,50400,0.00,50400,0.00,100,4020,NULL,'admin','2017-04-19','','0000-00-00'),(17,'1492777044245','2017-04-21',2147483647,3.50,14200,3.00,2100,0.00,0,4020,NULL,'admin','2017-04-21','','0000-00-00'),(18,'1492777194908','2017-04-21',2147483647,25.00,100600,25.00,0,0.00,0,4020,NULL,'admin','2017-04-21','','0000-00-00'),(19,'1492777214635','2017-04-21',2147483647,15.00,60400,20.00,0,5.00,0,4020,NULL,'admin','2017-04-21','','0000-00-00');

/*Table structure for table `tbl_staff` */

DROP TABLE IF EXISTS `tbl_staff`;

CREATE TABLE `tbl_staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_code` varchar(100) DEFAULT NULL,
  `staff_name` varchar(150) CHARACTER SET latin1 NOT NULL,
  `staff_name_kh` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `sex` char(1) CHARACTER SET latin1 NOT NULL,
  `dob` date NOT NULL,
  `pob` text CHARACTER SET latin1,
  `pos_id` int(11) NOT NULL,
  `addr` text CHARACTER SET latin1,
  `phone` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `fb` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `status` int(11) NOT NULL,
  `img` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `user_crea` varchar(35) NOT NULL,
  `date_crea` date NOT NULL,
  `user_updt` varchar(35) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_staff` */

insert  into `tbl_staff`(`staff_id`,`user_code`,`staff_name`,`staff_name_kh`,`sex`,`dob`,`pob`,`pos_id`,`addr`,`phone`,`email`,`fb`,`status`,`img`,`user_crea`,`date_crea`,`user_updt`,`date_updt`) values (24,'chheng.samnang','Chheng Samnang','ឆេង សំណាង','m','2016-12-16','Phnom Penh',1,'<p>St.138, #184, Tek Laok II, Toul Kok, Phnom Penh</p>','070893164','samnang164@gmail.com','chheng samnang',1,'avatar_icon_by_astrolink247-d9xxs6r14.jpg','0','2016-12-16','admin','2016-12-16');

/*Table structure for table `tbl_sysdata` */

DROP TABLE IF EXISTS `tbl_sysdata`;

CREATE TABLE `tbl_sysdata` (
  `key_id` int(11) NOT NULL AUTO_INCREMENT,
  `key_type` varchar(100) NOT NULL,
  `key_code` varchar(100) NOT NULL,
  `key_data` varchar(100) NOT NULL,
  `key_data1` varchar(100) NOT NULL,
  `key_data2` varchar(100) NOT NULL,
  `key_desc` varchar(100) NOT NULL,
  `user_crea` varchar(30) NOT NULL,
  `date_crea` date NOT NULL,
  `user_updt` varchar(30) NOT NULL,
  `date_updt` date NOT NULL,
  PRIMARY KEY (`key_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_sysdata` */

insert  into `tbl_sysdata`(`key_id`,`key_type`,`key_code`,`key_data`,`key_data1`,`key_data2`,`key_desc`,`user_crea`,`date_crea`,`user_updt`,`date_updt`) values (1,'exrate','20161128022143','4020','','','','admin','2016-11-28','','0000-00-00'),(2,'expense','kh02','Ice','2','','2000','admin','2016-12-15','admin','2016-12-15'),(3,'expense','kh03','Water','2','6','','chheng.samnang','2016-12-15','','0000-00-00'),(4,'expense','kh04','Vegetable','10','0','25000','admin','2016-12-18','','0000-00-00'),(5,'expense','kh05','Ice','10','0','25000','admin','2016-12-21','','0000-00-00'),(6,'expense','kh06','Cocacola','24','12.5','0','chheng.samnang','2016-12-22','','0000-00-00'),(7,'expense','kh07','Ice','1','0','2500','chheng.samnang','2017-01-11','','0000-00-00');

/*Table structure for table `tbl_table` */

DROP TABLE IF EXISTS `tbl_table`;

CREATE TABLE `tbl_table` (
  `tab_id` int(11) NOT NULL AUTO_INCREMENT,
  `tab_name` varchar(50) NOT NULL,
  `sta` varchar(10) NOT NULL,
  `seats` int(11) DEFAULT NULL,
  `price` decimal(18,2) DEFAULT NULL,
  `user_crea` varchar(20) NOT NULL,
  `date_crea` date NOT NULL,
  `user_updt` varchar(20) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`tab_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_table` */

insert  into `tbl_table`(`tab_id`,`tab_name`,`sta`,`seats`,`price`,`user_crea`,`date_crea`,`user_updt`,`date_updt`) values (1,'T-001','Free',4,0.00,'1','2016-10-31','admin','2017-01-03'),(2,'T-002','Free',4,0.00,'1','2016-10-31','admin','2017-01-04'),(3,'T-003','Free',4,0.00,'1','2016-11-02','1','2016-11-22'),(4,'T-004','Free',4,0.00,'1','2016-11-18',NULL,NULL),(5,'T-005','Free',4,0.00,'1','2016-11-18',NULL,NULL),(6,'T-006','Free',4,0.00,'1','2016-11-18',NULL,NULL),(7,'T-007','Free',4,0.00,'1','2016-11-18',NULL,NULL),(8,'T-008','Free',4,0.00,'1','2016-11-18',NULL,NULL),(9,'T-009','Free',4,0.00,'1','2016-11-18',NULL,NULL),(10,'T-010','Free',4,0.00,'1','2016-11-18',NULL,NULL);

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userCode` varchar(50) NOT NULL,
  `userName` varchar(40) NOT NULL,
  `password` varchar(220) NOT NULL,
  `des` text,
  `status` int(11) NOT NULL,
  `user_crea` varchar(100) NOT NULL,
  `date_crea` date NOT NULL,
  `user_updt` varchar(100) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`user_id`,`userCode`,`userName`,`password`,`des`,`status`,`user_crea`,`date_crea`,`user_updt`,`date_updt`) values (5,'chheng.samnang','chheng samnang','40bd001563085fc35165329ea1ff5c5ecbdbbeef','<p>System Admin</p>',1,'chheng.samnang','2016-10-30',NULL,NULL),(6,'Admin','Adminstrator','40bd001563085fc35165329ea1ff5c5ecbdbbeef','<p>System default user</p>',1,'chheng.samnang','2016-11-01',NULL,NULL),(7,'Test','Test','356a192b7913b04c54574d18c28d46e6395428ab','',1,'chheng.samnang','2016-11-01',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
