-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 16, 2022 at 05:44 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `fname`, `lname`, `email`, `password`) VALUES
(1, '', '', 'Josphat6311@gmail.com', 'admin'),
(2, '', '', 'Admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  `num_items` int NOT NULL DEFAULT '0',
  `weight` int NOT NULL DEFAULT '0',
  `price` int NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `user_email`, `name`, `product_id`, `num_items`, `weight`, `price`, `image`, `quantity`) VALUES
(129, 61, 'Joyce@gmail.com', 'Afrigas', 6, 250, 12, 3000, 'afrigas_big.jpg', 4),
(130, 61, 'Joyce@gmail.com', 'Total', 9, 100, 15, 5200, 'total_big.jpg', 1),
(131, 61, 'Joyce@gmail.com', 'Afrigas-12', 7, 250, 12, 3000, 'afrigas_big.jpg', 1),
(132, 61, 'Joyce@gmail.com', 'Progas', 10, 120, 8, 3500, 'pro_gas.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `consumer`
--

DROP TABLE IF EXISTS `consumer`;
CREATE TABLE IF NOT EXISTS `consumer` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `did` int DEFAULT NULL,
  `national_id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `dis_email` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `reg_date` date NOT NULL,
  `reg_time` time(6) NOT NULL,
  `password` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `national_id` (`national_id`),
  UNIQUE KEY `email` (`email`),
  KEY `did` (`did`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `consumer`
--

INSERT INTO `consumer` (`Id`, `did`, `national_id`, `name`, `email`, `dis_email`, `phone`, `city`, `address`, `reg_date`, `reg_time`, `password`, `image`) VALUES
(60, 19, 12345609, 'Josphat Mwendwa Erick', 'Joseph6311@gmail.com', 'Kelvin@gmail.com', '0793887040', 'Vihiga', 'P.O BOX 56', '2022-06-13', '04:59:06.000000', '81dc9bdb52d04dc20036dbd8313ed055', ''),
(61, 18, 12345638, 'Joyce Ocheing Fredrick', 'Joyce@gmail.com', 'Brian@gmail.com', '0708887248', 'Busia', '99 Akala', '2022-06-16', '06:58:47.000000', '19053d1f43416ad98dd9443425753488', '');

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

DROP TABLE IF EXISTS `distributor`;
CREATE TABLE IF NOT EXISTS `distributor` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Id_num` int NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time(5) NOT NULL,
  `password` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_num` (`Id_num`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`Id`, `Id_num`, `fullname`, `email`, `phone`, `city`, `address`, `date`, `time`, `password`, `image`) VALUES
(17, 347294847, 'Rhodah Mwangangi', 'Rhodahh@gmail.com', 739472984, 'Kakamega', 'P.O BOX 56', '2022-06-13', '04:43:56.00000', '3600ac6b9a3fb6911a3514f2fc6d4a9e', ''),
(19, 37849297, 'Kelvin Kiprotich', 'Kelvin@gmail.com', 729485738, 'Vihiga', '99 Akala', '2022-06-13', '04:46:53.00000', 'b2c6de510d584484d74c9aa9f8fa9f04', ''),
(16, 843595739, 'John Kamau', 'kamau@gmail.com', 729378479, 'Kisumu', 'p.o box 47', '2022-06-13', '04:42:13.00000', 'dda749f1f86b53d42f070c46f59324dd', ''),
(18, 374927848, 'Brian Ochieng', 'Brian@gmail.com', 793887089, 'Busia', 'P.O BOX 100', '2022-06-15', '10:34:42.00000', 'cbd44f8b5b48a51f7dab98abcdf45d4e', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_and_complaint`
--

DROP TABLE IF EXISTS `feedback_and_complaint`;
CREATE TABLE IF NOT EXISTS `feedback_and_complaint` (
  `Serial` int NOT NULL AUTO_INCREMENT,
  `cid` int DEFAULT NULL,
  `did` int DEFAULT NULL,
  `consumer_email` varchar(200) NOT NULL,
  `d_email` varchar(255) DEFAULT NULL,
  `consumer_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `type` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`Serial`),
  KEY `d_email` (`d_email`(250)),
  KEY `did` (`did`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedback_and_complaint`
--

INSERT INTO `feedback_and_complaint` (`Serial`, `cid`, `did`, `consumer_email`, `d_email`, `consumer_name`, `date`, `time`, `type`, `subject`, `description`) VALUES
(17, 61, 18, 'Joyce@gmail.com', 'Brian@gmail.com', 'Joyce Ocheing Fredrick', '2022-06-16', '08:41:13.000000', 'Feedback', 'Product related', 'Thanks for your services'),
(16, 60, 19, 'Joseph6311@gmail.com', 'Kelvin@gmail.com', 'Josphat Mwendwa Erick', '2022-06-16', '08:38:51.000000', 'Feedback', 'Product related', 'Why is it taking sooo long to get my deliveries!!!!');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `num_items` int NOT NULL DEFAULT '1',
  `weight` float NOT NULL DEFAULT '7.7',
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `num_items`, `weight`, `price`, `image`) VALUES
(6, 'Afrigas', 120, 7.7, '5200', 'afrigas.jpg'),
(7, 'Afrigas-12', 250, 12, '3000', 'afrigas_big.jpg'),
(9, 'Total', 100, 15, '5200', 'total_big.jpg'),
(10, 'Progas', 120, 7.7, '3500', 'pro_gas.jpg'),
(11, 'Men gas', 100, 7.7, '3000', 'men gas_small.jpg'),
(17, 'Olagas cylinders', 200, 8.2, '3000', 'olagas.jpg'),
(18, 'Oilibia', 50, 8.2, '3100', 'img3.jpg'),
(19, 'Complete pro gas', 50, 13, '10000', 'complete_pro.png'),
(20, 'Gas regulator + Gas hose', 30, 2, '1300', 'gas_regulator+hose.png'),
(21, 'Gas regulator', 200, 1, '500', 'gas_regulator.png'),
(22, 'Gas regulator', 200, 1, '450', 'gas_regulator1.png'),
(24, 'Gas regulator', 120, 1, '450', 'gas_regulator2.png'),
(25, 'Gas regulator', 120, 1, '450', 'gas_regulator3.png'),
(26, 'Gas hose pipe', 300, 2, '300', 'hose_gas_pipe.jpg'),
(27, 'Mid gas', 120, 8, '3500', 'mid_gas_small.jpg'),
(28, 'Mid gas-13', 340, 13, '6000', 'mid_gas_big.jpg'),
(29, 'Supa', 200, 6, '3000', 'supa.jpg'),
(30, 'Sea gas', 130, 7, '3200', 'sea_small.jpg'),
(31, 'Sea gas-13', 230, 13, '5600', 'sea_big.jpg'),
(32, 'Mpishi ', 200, 8, '3000', 'mpishi_small.jpg'),
(33, 'Mpishi-13', 200, 13, '6000', 'mpishi_big.png');

-- --------------------------------------------------------

--
-- Table structure for table `table_order`
--

DROP TABLE IF EXISTS `table_order`;
CREATE TABLE IF NOT EXISTS `table_order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number` int DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `station` varchar(50) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `total_products` varchar(255) DEFAULT NULL,
  `total_price` int DEFAULT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `table_order`
--

INSERT INTO `table_order` (`id`, `user_id`, `name`, `number`, `email`, `method`, `station`, `city`, `total_products`, `total_price`, `date`, `time`, `status`) VALUES
(22, '61', 'Joyce Ocheing Fredrick', 708887248, 'Joyce@gmail.com', 'cash on delivery', 'Station1', 'Busia', 'Afrigas (4) , Total (1) , Afrigas-12 (1) , Progas (1) ', 23700, '2022-06-16', '08:27:21', 'Running'),
(23, '61', 'Joyce Ocheing Fredrick', 708887248, 'Joyce@gmail.com', 'cash on delivery', 'Station1', 'Busia', 'Afrigas (4) , Total (1) , Afrigas-12 (1) , Progas (1) ', 23700, '2022-06-16', '08:29:40', 'Running'),
(21, '60', 'Josphat Mwendwa Erick', 793887040, 'Joseph6311@gmail.com', 'cash on delivery', 'Station1', 'Vihiga', 'Afrigas (4) , Total (1) , Olagas cylinders (3) , Men gas (1) , Gas regulator (1) ', 29650, '2022-06-15', '21:37:44', 'Running'),
(20, '60', 'Josphat Mwendwa Erick', 793887040, 'Joseph6311@gmail.com', 'cash on delivery', 'Station1', 'Vihiga', 'Afrigas (4) , Total (1) , Olagas cylinders (3) , Men gas (1) , Gas regulator (1) ', 29650, '2022-06-15', '21:31:45', 'Running');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
