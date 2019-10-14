/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.7.27 : Database - AlexaDesk
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`AlexaDesk` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `AlexaDesk`;

/*Table structure for table `chamado` */

DROP TABLE IF EXISTS `chamado`;

CREATE TABLE `chamado` (
  `chamado_id` int(11) NOT NULL AUTO_INCREMENT,
  `chamado_descricao` text,
  `chamado_data_cadastro` date DEFAULT NULL,
  `chamado_data_finalizado` date DEFAULT NULL,
  `chamado_flag_status` varchar(2) DEFAULT 'P',
  `chamado_cliente_id` int(11) DEFAULT '0',
  `chamado_suporte_id` int(11) DEFAULT '0',
  `chamado_assunto` varchar(255) DEFAULT '',
  `chamado_motivo_id` int(11) DEFAULT '0',
  `chamado_data_inicio_atendimento` date DEFAULT NULL,
  PRIMARY KEY (`chamado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `chamado` */

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cliente` */

/*Table structure for table `motivo` */

DROP TABLE IF EXISTS `motivo`;

CREATE TABLE `motivo` (
  `motivo_id` int(11) NOT NULL AUTO_INCREMENT,
  `motivo_prioridade` varchar(150) DEFAULT '',
  `motivo_descricao` varchar(150) DEFAULT '',
  PRIMARY KEY (`motivo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `motivo` */

insert  into `motivo`(`motivo_id`,`motivo_prioridade`,`motivo_descricao`) values (1,'Baixa','Sem Motivo especifico'),(2,'Media','Duvida'),(3,'Baixa','Sugestao'),(4,'Alta','Reclamacao'),(5,'Baixa','Elogios'),(6,'Baixa','Outros'),(7,'Media','Servicos/Solicitacoes');

/*Table structure for table `suporte` */

DROP TABLE IF EXISTS `suporte`;

CREATE TABLE `suporte` (
  `suporte_id` int(11) NOT NULL AUTO_INCREMENT,
  `suporte_nome` varchar(150) DEFAULT '',
  `suporte_login` varchar(150) DEFAULT '',
  `suporte_senha` varchar(50) DEFAULT '',
  `suporte_data_cadastro` date DEFAULT NULL,
  `suporte_flag_ativo` varchar(2) DEFAULT 'S',
  `suporte_perfil_usuario` varchar(10) DEFAULT 'suporte',
  PRIMARY KEY (`suporte_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `suporte` */

insert  into `suporte`(`suporte_id`,`suporte_nome`,`suporte_login`,`suporte_senha`,`suporte_data_cadastro`,`suporte_flag_ativo`,`suporte_perfil_usuario`) values (1,'Root','root@email.com','MTIzNA==',NULL,'S','diretor');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
