/*
SQLyog Ultimate v9.50 
MySQL - 5.5.5-10.4.14-MariaDB : Database - fuzzy_knn
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`fuzzy_knn` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `fuzzy_knn`;

/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `user` varchar(16) NOT NULL,
  `pass` varchar(16) NOT NULL,
  `level` varchar(16) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_admin` */

insert  into `tb_admin`(`user`,`pass`,`level`) values ('admin','admin','admin'),('user','user','user');

/*Table structure for table `tb_gejala` */

DROP TABLE IF EXISTS `tb_gejala`;

CREATE TABLE `tb_gejala` (
  `kode_gejala` varchar(16) NOT NULL,
  `nama_gejala` varchar(255) NOT NULL DEFAULT '',
  `bobot` double NOT NULL DEFAULT 0,
  PRIMARY KEY (`kode_gejala`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_gejala` */

insert  into `tb_gejala`(`kode_gejala`,`nama_gejala`,`bobot`) values ('G001','Nafsu makan kelinci hias berkurang.',0.8),('G002','Kotoran kelinci potong dan hias menjadi berair dan lembek.',0.4),('G003','Kelinci potong dan hias terlihat tidak seperti biasanya dan lebih banyak diam di dalam kandang.',0.6),('G004','Kelinci kelinci hias suka menggoyang goyangkan kepala dan menggaruk telinganya.',0.6),('G005','Permukaan dalam telinga kelinci kelinci hias berwarna kekuningan bersisik.',0.4),('G006','Kelinci kelinci hias suka menggosok-gosokan telinga dengan kepala',0.2),('G007','kakinya sampai menjadi kemerah-merahan.',0.6),('G008','Di sekitar mata, ujung hidung, ujung kaki, serta telinga kelinci hias terdapat kerak yang berwarna putih.',0.7),('G009','Kelinci hias sering menggarukkan badannya yang gatal ke dinding kandang atau di garuk sendiri menggunakan kakinya.',0.4),('G010','Tubuh kelinci hias menjadi kurus secara cepat.',0.8),('G011','Kelinci hias mengeluarkan kotoran berwarna hijau gelap.',0.2),('G012','kelinci hias bernafas cepat, matanya sayu, dan suka berdiri dengan posisi membungkuk.',0.6),('G013','Temperatur tubuh kelinci hias sangat dingin.',0.5),('G014','Bulu di bawa kaki kelinci hias menipis, kemudian menjadi meradang.',0.4),('G015','Proses peradangan di bawah kaki kelinci hias lama kelamaan akan membuat luka yang membentuk lingkaran berwarna kemerahan.',0.3),('G016','Kelinci hias sering mengibas-ngibaskan kakinya karena kesakitan saat berjalan.',0.8),('G017','Kelinci hias cenderung lebih banyak diam dan tidak suka banyak bergerak (karena menahan rasa sakit di bawah kakinya).',0.6);

/*Table structure for table `tb_kasus` */

DROP TABLE IF EXISTS `tb_kasus`;

CREATE TABLE `tb_kasus` (
  `kode_kasus` varchar(16) DEFAULT NULL,
  `kode_penyakit` varchar(16) DEFAULT NULL,
  `kode_gejala` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_kasus` */

insert  into `tb_kasus`(`kode_kasus`,`kode_penyakit`,`kode_gejala`) values ('K001','P05','G015'),('K001','P05','G016'),('K002','P05','G013'),('K002','P05','G014'),('K003','P02','G004'),('K003','P02','G005'),('K003','P02','G006'),('K004','P02','G003'),('K004','P02','G004'),('K005','P01','G001'),('K005','P01','G002'),('K005','P01','G010'),('K006','P01','G002'),('K006','P01','G010'),('K007','P04','G001'),('K007','P04','G002'),('K007','P04','G003'),('K008','P04','G001'),('K008','P04','G003'),('K009','P03','G004'),('K009','P03','G007'),('K009','P03','G011'),('K010','P03','G004'),('K010','P03','G011'),('K011','P01','G001'),('K011','P01','G002'),('K012','P01','G001'),('K012','P01','G002'),('K013','P05','G014'),('K013','P05','G015'),('K013','P05','G016'),('K014','P05','G003'),('K014','P05','G008'),('K014','P05','G016'),('K015','P02','G004'),('K015','P02','G005'),('K016','P03','G007'),('K017','P04','G001'),('K017','P04','G003'),('K017','P04','G012'),('K018','P01','G001'),('K019','P03','G007'),('K019','P03','G008'),('K020','P05','G014'),('K020','P05','G015'),('K021','P04','G009'),('K021','P04','G012'),('K022','P02','G003'),('K022','P02','G004'),('K022','P02','G005'),('K023','P01','G001'),('K023','P01','G012'),('K024','P01','G001'),('K024','P01','G003'),('K025','P03','G007'),('K025','P03','G008'),('K026','P02','G005'),('K027','P04','G003'),('K027','P04','G012'),('K028','P05','G013'),('K028','P05','G015'),('K028','P05','G016'),('K029','P05','G014'),('K029','P05','G015'),('K030','P03','G007'),('K030','P03','G008');

/*Table structure for table `tb_penyakit` */

DROP TABLE IF EXISTS `tb_penyakit`;

CREATE TABLE `tb_penyakit` (
  `kode_penyakit` varchar(16) NOT NULL,
  `nama_penyakit` varchar(255) DEFAULT NULL,
  `penyebab` text DEFAULT NULL,
  `solusi` text DEFAULT NULL,
  PRIMARY KEY (`kode_penyakit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_penyakit` */

insert  into `tb_penyakit`(`kode_penyakit`,`nama_penyakit`,`penyebab`,`solusi`) values ('P01','Diare','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),('P02','Kanker Telinga','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),('P03','Scabies (Kudis)','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),('P04','Kembung','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),('P05','Sore hocks','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
