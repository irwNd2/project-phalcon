/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP DATABASE IF EXISTS `mariadbtest`;
CREATE DATABASE `mariadbtest`;

DROP TABLE IF EXISTS `patients`;
CREATE TABLE `patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


/*INSERT DUMMY DATA TO MARIADB */;
INSERT INTO `patients` (`id`, `name`, `sex`, `religion`, `phone`, `address`, `nik`) VALUES
(1, 'Irwan', 'Male', 'Islam', '086473427823', 'Jln Jalan Saja', '78274923376663');
INSERT INTO `patients` (`id`, `name`, `sex`, `religion`, `phone`, `address`, `nik`) VALUES
(2, 'Irwansyah', 'Male', 'Islam', '086473427823', 'Jln Jalan Saja', '7842749233763263');
INSERT INTO `patients` (`id`, `name`, `sex`, `religion`, `phone`, `address`, `nik`) VALUES
(3, 'Arif', 'Male', 'Kristen', '08863427823', 'Jln Jalan Saja', '78742749233763263');
INSERT INTO `patients` (`id`, `name`, `sex`, `religion`, `phone`, `address`, `nik`) VALUES
(4, 'Isla', 'Female', 'Islam', '089863427823', 'Jln Jalan Saja', '798242749233763263'),
(6, 'Mamat Syah update', 'Male', 'Islam', '873278872332', 'Jln. Meranti', '74298237943994 update');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;