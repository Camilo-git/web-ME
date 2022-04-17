/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.21-MariaDB : Database - web_me
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`web_me` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

USE `web_me`;

/*Table structure for table `tbl_aulas` */

DROP TABLE IF EXISTS `tbl_aulas`;

CREATE TABLE `tbl_aulas` (
  `id` int(100) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `edificio` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `capacidad` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `comentario` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`nombre`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_aulas` */

insert  into `tbl_aulas`(`id`,`nombre`,`edificio`,`capacidad`,`comentario`) values 
(13,'A605','San Francisco','59','con su video-bean empotrado');

/*Table structure for table `tbl_auxiliares` */

DROP TABLE IF EXISTS `tbl_auxiliares`;

CREATE TABLE `tbl_auxiliares` (
  `cedula` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `celular` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direcion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_auxiliares` */

insert  into `tbl_auxiliares`(`cedula`,`nombre`,`celular`,`correo`,`direcion`) values 
('1032479967','German Camilo Bernal Muñoz','3104689209','gcbernal@unicesmag.edu.co','carrera 8e #16-09 praga');

/*Table structure for table `tbl_docentes` */

DROP TABLE IF EXISTS `tbl_docentes`;

CREATE TABLE `tbl_docentes` (
  `cedula` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cel` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `programa` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dependencia` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_docentes` */

insert  into `tbl_docentes`(`cedula`,`nombre`,`correo`,`cel`,`programa`,`dependencia`) values 
('1024788965','Nathalia Burbano','naburbano@unicesmag.edu.co','3105478965','derecho','acompañamiento');

/*Table structure for table `tbl_equipos` */

DROP TABLE IF EXISTS `tbl_equipos`;

CREATE TABLE `tbl_equipos` (
  `cod` int(100) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cantidad` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`nombre`),
  KEY `cod` (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_equipos` */

insert  into `tbl_equipos`(`cod`,`nombre`,`estado`,`cantidad`) values 
(16,'Portátil','activo','32'),
(0,'Video_Bean','activo','8');

/*Table structure for table `tbl_inventario` */

DROP TABLE IF EXISTS `tbl_inventario`;

CREATE TABLE `tbl_inventario` (
  `codigo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modelo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `comentario` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cat_equipo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigo`,`cat_equipo`),
  KEY `key` (`cat_equipo`),
  CONSTRAINT `cat_equipo` FOREIGN KEY (`cat_equipo`) REFERENCES `tbl_equipos` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_inventario` */

insert  into `tbl_inventario`(`codigo`,`marca`,`modelo`,`comentario`,`estado`,`cat_equipo`) values 
('32','Lenovo','2018','se encuent','activo','Portátil');

/*Table structure for table `tbl_tiket` */

DROP TABLE IF EXISTS `tbl_tiket`;

CREATE TABLE `tbl_tiket` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `h_salida` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `h_entrada` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nom_aux` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nom_docente` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cod_equipo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cod_inventario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_aula` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`,`nom_aux`,`nom_docente`,`cod_equipo`,`cod_inventario`,`nombre_aula`),
  KEY `key0` (`nom_aux`),
  KEY `key1` (`nom_docente`),
  KEY `key2` (`cod_equipo`),
  KEY `key3` (`nombre_aula`),
  KEY `key4` (`cod_inventario`),
  CONSTRAINT `cod_equipo` FOREIGN KEY (`cod_equipo`) REFERENCES `tbl_equipos` (`nombre`),
  CONSTRAINT `cod_inventario` FOREIGN KEY (`cod_inventario`) REFERENCES `tbl_inventario` (`codigo`),
  CONSTRAINT `nom_aula` FOREIGN KEY (`nombre_aula`) REFERENCES `tbl_aulas` (`nombre`),
  CONSTRAINT `nom_aux` FOREIGN KEY (`nom_aux`) REFERENCES `tbl_auxiliares` (`nombre`),
  CONSTRAINT `nom_docente` FOREIGN KEY (`nom_docente`) REFERENCES `tbl_docentes` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_tiket` */

insert  into `tbl_tiket`(`id`,`comentario`,`h_salida`,`h_entrada`,`nom_aux`,`nom_docente`,`cod_equipo`,`cod_inventario`,`nombre_aula`) values 
(1,'se realiza entrega a las 11:20','15/4/2022 5:22','15/4/2022 7:00','German Camilo Bernal Muñoz','Nathalia Burbano','Portátil','32','A605');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
