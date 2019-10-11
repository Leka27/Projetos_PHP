/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.7.27 : Database - php_atendimento
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`php_atendimento` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `php_atendimento`;

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `cliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_nome` varchar(150) DEFAULT '',
  `cliente_login` varchar(150) DEFAULT '',
  `cliente_senha` varchar(50) DEFAULT '',
  `cliente_cpf` varchar(20) DEFAULT '',
  `cliente_telefone` varchar(20) DEFAULT '',
  `cliente_data_nascimento` date DEFAULT NULL,
  `cliente_data_cadastro` date DEFAULT NULL,
  `cliente_flag_ativo` varchar(2) DEFAULT 'S',
  PRIMARY KEY (`cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `cliente` */

insert  into `cliente`(`cliente_id`,`cliente_nome`,`cliente_login`,`cliente_senha`,`cliente_cpf`,`cliente_telefone`,`cliente_data_nascimento`,`cliente_data_cadastro`,`cliente_flag_ativo`) values (1,'Admin','Admin','e3afed0047b08059d0fada10f400c1e5','050.440.639-39','(41)9999-9999','1995-09-27','2019-10-07','S');

/*Table structure for table `suporte` */

DROP TABLE IF EXISTS `suporte`;

CREATE TABLE `suporte` (
  `suporte_id` int(11) NOT NULL AUTO_INCREMENT,
  `suporte_nome` varchar(150) DEFAULT '',
  `suporte_login` varchar(150) DEFAULT '',
  `suporte_senha` varchar(50) DEFAULT '',
  `suporte_cpf` varchar(20) DEFAULT '',
  `suporte_telefone` varchar(20) DEFAULT '',
  `suporte_data_nascimento` date DEFAULT NULL,
  `suporte_data_cadastro` date DEFAULT NULL,
  `suporte_flag_ativo` varchar(2) DEFAULT 'S',
  PRIMARY KEY (`suporte_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `suporte` */

insert  into `suporte`(`suporte_id`,`suporte_nome`,`suporte_login`,`suporte_senha`,`suporte_cpf`,`suporte_telefone`,`suporte_data_nascimento`,`suporte_data_cadastro`,`suporte_flag_ativo`) values (1,'Admin','Admin','e3afed0047b08059d0fada10f400c1e5','050.440.639-39','(41)9999-9999','1995-09-27','2019-10-07','S');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
