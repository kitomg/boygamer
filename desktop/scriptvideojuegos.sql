/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 8.1.0 : Database - videojuegos
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`videojuegos` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `videojuegos`;

/*Table structure for table `compania` */

DROP TABLE IF EXISTS `compania`;

CREATE TABLE `compania` (
  `ID_Compania` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Compania`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `compania` */

insert  into `compania`(`ID_Compania`,`Nombre`) values 
(1,'Blizzard');

/*Table structure for table `genero` */

DROP TABLE IF EXISTS `genero`;

CREATE TABLE `genero` (
  `ID_Genero` int NOT NULL AUTO_INCREMENT,
  `Tematica` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Genero`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `genero` */

insert  into `genero`(`ID_Genero`,`Tematica`) values 
(1,'Acción'),
(2,'Aventura'),
(3,'Estrategia'),
(4,'RPG'),
(5,'Deportes');

/*Table structure for table `juegos` */

DROP TABLE IF EXISTS `juegos`;

CREATE TABLE `juegos` (
  `CODIGO` int NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(255) NOT NULL,
  `FECHA_LANZAMIENTO` date NOT NULL,
  `COMPANIA` int NOT NULL,
  `GENERO` int NOT NULL,
  `PLATAFORMA` int NOT NULL,
  `LINK` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CODIGO`),
  KEY `COMPANIA` (`COMPANIA`),
  KEY `GENERO` (`GENERO`),
  KEY `PLATAFORMA` (`PLATAFORMA`),
  CONSTRAINT `juegos_ibfk_1` FOREIGN KEY (`COMPANIA`) REFERENCES `compania` (`ID_Compania`),
  CONSTRAINT `juegos_ibfk_2` FOREIGN KEY (`GENERO`) REFERENCES `genero` (`ID_Genero`),
  CONSTRAINT `juegos_ibfk_3` FOREIGN KEY (`PLATAFORMA`) REFERENCES `plataforma` (`ID_Plataforma`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `juegos` */

insert  into `juegos`(`CODIGO`,`NOMBRE`,`FECHA_LANZAMIENTO`,`COMPANIA`,`GENERO`,`PLATAFORMA`,`LINK`) values 
(1,'Super Mario Bros.','1985-09-13',1,1,1,NULL),
(5,'Facere nulla ut nequ','2011-04-07',1,1,1,NULL),
(6,'jkohohjo','2023-09-05',1,1,1,NULL),
(7,'At id similique aute','1976-04-27',1,3,1,NULL),
(8,'Et dolorem vitae hic','1987-07-20',1,4,4,NULL),
(9,'Et ea ut maiores eli','1982-10-05',1,5,3,NULL),
(10,'dc','1973-02-25',1,1,5,NULL),
(11,'Lorem id necessitati','1978-10-22',1,4,3,NULL),
(12,'Aut elit qui et iru','2013-02-10',1,3,2,NULL),
(13,'DALEEEEEEE','1979-11-08',1,2,3,NULL),
(14,'Neque nostrum aliqui','1988-10-28',1,5,2,NULL),
(15,'Dolor qui dolores en','2013-04-02',1,4,4,NULL),
(16,'Assumenda sed magnam','1979-12-28',1,5,3,''),
(17,'Ad est dolor nostrud','1985-06-14',1,3,3,''),
(18,'Voluptatum possimus','1998-08-19',1,3,5,''),
(19,'Voluptatibus sint cu','1982-06-08',1,5,4,''),
(20,'marito','2001-08-11',1,2,2,''),
(21,'Et ut nostrum est ma','2021-04-20',1,3,4,''),
(22,'Et ut nostrum est ma','2021-04-20',1,3,4,''),
(23,'Sequi omnis nihil nu','1990-09-23',1,3,2,''),
(24,'Deleniti ullam esse','1988-07-17',1,5,3,''),
(25,'Consequatur dolorum','1979-11-14',1,4,5,''),
(26,'Est et tempore quod','1975-09-23',1,2,3,''),
(27,'Est et tempore quod','1975-09-23',1,2,3,''),
(28,'Quia do corporis vol','1977-03-12',1,2,1,''),
(29,'aaaaaaaaaaa','1991-02-07',1,4,1,''),
(30,'bbbbbbbb','1979-09-20',1,2,5,NULL),
(31,'central','2013-10-01',1,3,5,NULL),
(33,'safasfasfasf','2023-09-27',1,1,1,''),
(34,'7777777777','2003-12-22',1,5,3,''),
(35,'Sint Nam est fugiat','2009-12-08',1,2,2,'www.gmail.com');

/*Table structure for table `plataforma` */

DROP TABLE IF EXISTS `plataforma`;

CREATE TABLE `plataforma` (
  `ID_Plataforma` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Plataforma`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `plataforma` */

insert  into `plataforma`(`ID_Plataforma`,`Nombre`) values 
(1,'Windows'),
(2,'Mobil'),
(3,'Nintendo Switch'),
(4,'PlayStation'),
(5,'Xbox');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) NOT NULL,
  `Contrasena` varchar(350) NOT NULL,
  `Administrador` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `usuario` */

insert  into `usuario`(`Id`,`Nombre`,`Contrasena`,`Administrador`) values 
(6,'Franco','1234',1),
(7,'Nicolas','6789',1),
(8,'Gustavo','1238',1),
(9,'Matias','6749',1),
(12,'detaquito','mas17',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
