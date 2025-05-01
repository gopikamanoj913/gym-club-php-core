-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2024 at 02:14 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mca23`
--

-- --------------------------------------------------------

--
-- Table structure for table `addtraine`
--

DROP TABLE IF EXISTS `addtraine`;
CREATE TABLE IF NOT EXISTS `addtraine` (
  `tid` int NOT NULL AUTO_INCREMENT,
  `tname` varchar(20) NOT NULL,
  `gymid` int NOT NULL,
  `timage` varchar(200) NOT NULL,
  `tphone` varchar(10) NOT NULL,
  `tsex` varchar(10) NOT NULL,
  `tpass` varchar(10) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `addtraine`
--

INSERT INTO `addtraine` (`tid`, `tname`, `gymid`, `timage`, `tphone`, `tsex`, `tpass`, `status`) VALUES
(6, 'ASWATHIS', 6, 'c067513e71965a0712d82a4f625aea8e_7e420bd042.jpg', '9797923349', 'm', '123', 2),
(4, 'MANOJ', 2, '6457e63da1e5f99f21eb349eb7e701ce_3f4cbc69edd08520.jpg', '9747121212', 'm', '', 2),
(5, 'ARUN', 2, '363b1fec2fa3d7127e0789b61b69a53a_d7c6eaea6ee6c347.jpg', '9747121212', 'm', '', 2),
(7, 'PRIYA PAUL', 2, 'cef8e2f5939f6cecce74217be7485794_5b5ad56a3ff0dc5cc0.jpg', '9747122024', 'f', 'PRIYA@123', 2),
(8, 'Athart Rachel', 4, '1e591403ff232de0f0f139ac51d99295_7daa84ec47d4de53.jpg', '9747122024', 'f', 'gopika@123', 1),
(9, 'Athart Kim', 2, 'dbaebce9c842f6aa7482517597c75c8c_30377a1f7908db4529.jpg', '9747122024', 'm', 'Gopika@123', 1),
(10, 'Philip', 3, '548f45be9b6c68f10bed527bce14246e_e26a87ba9f8c.jpg', '9747122024', 'm', '123456', 1),
(11, 'Priya Paul', 4, 'e982e209dbe04a35a3a0cdd444cd2a49_7c195ee2950c92782.jpg', '9747122024', 'f', '123456', 1),
(12, 'Ankitha', 2, '1558417b096b5d8e7cbe0183ea9cbf26_25865b743ecc91c4743.jpg', '9747122024', 'f', '123456', 1),
(13, 'Aswathi', 3, 'a633795cebee6473d1aae96d5a28df15_e4ef4f2089531dd5.jpg', '9747122024', 'f', '123456', 1),
(14, 'qwe', 8, '3e419386927eb1d51a93fa11444dc628_deca780532a3dd821.jpg', '1234567890', 'f', '1234', 2);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `apass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `apass`) VALUES
('admin@123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `bid` int NOT NULL AUTO_INCREMENT,
  `gid` int NOT NULL,
  `pid` int NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rate` int NOT NULL,
  `date` date NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `gname` varchar(30) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `cdate` date DEFAULT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `gid`, `pid`, `email`, `rate`, `date`, `status`, `gname`, `pname`, `cdate`) VALUES
(1, 6, 12, 'pp@gmail.c', 5000, '2024-11-18', 3, '', '', '2024-11-18'),
(2, 6, 12, 'pp@gmail.c', 5000, '2024-11-18', 1, '', '', NULL),
(3, 6, 12, 'pp@gmail.c', 5000, '2024-11-18', 1, 'GYMSTER', 'GENERAL', NULL),
(4, 6, 14, 'pp@gmail.c', 500, '2024-11-18', 1, 'GYMSTER', 'MOTHLY', NULL),
(5, 6, 14, 'pp@gmail.c', 500, '2024-11-18', 1, 'GYMSTER', 'MOTHLY', NULL),
(6, 6, 14, 'pp@gmail.com', 500, '2024-11-18', 3, 'GYMSTER', 'MOTHLY', '2024-11-18'),
(7, 2, 14, 'pp@gmail.com', 500, '2024-11-18', 3, 'FITNESS', 'MOTHLY', '2024-12-09'),
(8, 2, 14, 'pp@gmail.com', 500, '2024-11-18', 2, 'FITNESS', 'MOTHLY', NULL),
(9, 2, 14, 'pp@gmail.com', 500, '2024-11-18', 2, 'FITNESS', 'MOTHLY', NULL),
(10, 2, 14, 'pp@gmail.com', 500, '2024-11-18', 2, 'FITNESS', 'MOTHLY', NULL),
(11, 2, 14, 'pp@gmail.com', 500, '2024-11-18', 2, 'FITNESS', 'MOTHLY', NULL),
(12, 2, 14, 'pp@gmail.com', 500, '2024-11-18', 2, 'FITNESS', 'MOTHLY', NULL),
(13, 5, 15, '2', 15000, '2024-11-18', 2, 'GYMCLUB', 'ANNUALY', NULL),
(14, 5, 15, 'pp@gmail.com', 15000, '2024-11-19', 2, 'GYMCLUB', 'ANNUALY', NULL),
(15, 6, 14, 'pp@gmail.com', 500, '2024-11-19', 1, 'GYMSTER', 'MOTHLY', NULL),
(16, 7, 17, 'priya@gmail.com', 1234, '2024-12-09', 2, 'BE YOU', 'general', NULL),
(17, 5, 14, 'gokul@gmail.com', 500, '2024-12-09', 2, 'GYMCLUB', 'MOTHLY', NULL),
(18, 2, 14, 'gokul@gmail.com', 500, '2024-12-09', 3, 'FITNESS', 'MOTHLY', '2024-12-09'),
(19, 6, 12, 'gokul@gmail.com', 5000, '2024-12-09', 2, 'GYMSTER', 'GENERAL', NULL),
(20, 2, 14, 'priya@gmail.com', 500, '2024-12-09', 2, 'FITNESS', 'MOTHLY', NULL),
(21, 2, 14, 'priya@gmail.com', 500, '2024-12-09', 2, 'FITNESS', 'MOTHLY', NULL),
(22, 2, 14, 'priya@gmail.com', 500, '2024-12-09', 2, 'FITNESS', 'MOTHLY', NULL),
(23, 2, 14, 'priya@gmail.com', 500, '2024-12-09', 2, 'FITNESS', 'MOTHLY', NULL),
(24, 2, 12, 'priya@gmail.com', 5000, '2024-12-09', 2, 'FITNESS', 'GENERAL', NULL),
(25, 2, 14, '2', 500, '2024-12-09', 1, 'FITNESS', 'MOTHLY', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `cid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gym` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cid`, `name`, `email`, `gym`, `comment`) VALUES
(1, 'Aishwarya', 'gokul@gmail.com', '', 'fgdfgsdfg');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `did` int NOT NULL AUTO_INCREMENT,
  `dname` varchar(20) NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`did`, `dname`) VALUES
(101, 'mca'),
(102, 'mca'),
(103, 'bca');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
CREATE TABLE IF NOT EXISTS `district` (
  `did` int NOT NULL AUTO_INCREMENT,
  `dname` varchar(10) NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`did`, `dname`) VALUES
(101, 'Ernakulam'),
(102, 'Kollam'),
(103, 'Idukki');

-- --------------------------------------------------------

--
-- Table structure for table `gym`
--

DROP TABLE IF EXISTS `gym`;
CREATE TABLE IF NOT EXISTS `gym` (
  `gymid` int NOT NULL AUTO_INCREMENT,
  `gymname` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `did` int NOT NULL,
  `phone` varchar(10) NOT NULL,
  `gymimage` varchar(100) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `pass` int NOT NULL,
  PRIMARY KEY (`gymid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gym`
--

INSERT INTO `gym` (`gymid`, `gymname`, `location`, `did`, `phone`, `gymimage`, `status`, `pass`) VALUES
(6, 'GYMSTER', 'TODUPUZHA', 103, '1234567892', '8bb6fe84b8bba85343f415936f15e878_a63358420d88a9.jpg', 1, 0),
(2, 'FITNESS', 'KATTAPPANA', 101, '974712233', 'ad7a06fab64eb5c09c8f4e61f437e382_d6aaf65d428c89d.jpg', 1, 0),
(5, 'GYMCLUB', 'KALOOR', 101, '1234567892', '08c48adc90c8525f8ca1f8d727b5780c_b3720056a86bf0a2.png', 1, 0),
(7, 'BE YOU', 'KARINAGAPPALY', 102, '1234567892', '78719f11fa2df9917de3110133506521_88e0e8706954e2b9.jpg', 1, 0),
(8, 'qwerty', 'qwer', 101, '1234567890', '54fe7520c6d81e1d01bc9c9fa5af40bc_cd065881c867085.jpg', 2, 12345);

-- --------------------------------------------------------

--
-- Table structure for table `mreg`
--

DROP TABLE IF EXISTS `mreg`;
CREATE TABLE IF NOT EXISTS `mreg` (
  `mid` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mphone` varchar(10) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `cpass` varchar(10) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mreg`
--

INSERT INTO `mreg` (`mid`, `fname`, `lname`, `email`, `mphone`, `pass`, `status`, `cpass`) VALUES
(1, 'GOPIKA', 'MANOJ', 'gopikamanoj913@gmail.com', '7593036016', 'Gopika@123', 1, ''),
(2, 'devika', 'manoj', 'devikamanoj45@gmail.com', '7593036016', 'Gopika@123', 1, ''),
(3, 'sumalu', 'mamu', 'gokul@gmail.com', '7593036016', 'suma', 1, ''),
(4, 'ppp', 'ppp', 'pp@gmail.com', '1234567898', '123', 1, ''),
(5, 'suma', 'mano', 'priya@gmail.com', '1234567891', '1234', 1, '1234');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

DROP TABLE IF EXISTS `plan`;
CREATE TABLE IF NOT EXISTS `plan` (
  `pid` int NOT NULL AUTO_INCREMENT,
  `pname` varchar(20) NOT NULL,
  `duration` int NOT NULL,
  `rate` varchar(100) NOT NULL,
  `dis` mediumtext NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`pid`, `pname`, `duration`, `rate`, `dis`) VALUES
(12, 'GENERAL', 1, '5000', 'ON SITE ONLY'),
(14, 'MOTHLY', 1, '500', 'DEVIKA'),
(15, 'ANNUALY', 12, '15000', 'annual'),
(16, 'HALFYEAR', 6, '8000', 'GCHGFH'),
(17, 'general', 1, '1234', 'warawretsert');

-- --------------------------------------------------------

--
-- Table structure for table `planname`
--

DROP TABLE IF EXISTS `planname`;
CREATE TABLE IF NOT EXISTS `planname` (
  `ppid` int NOT NULL AUTO_INCREMENT,
  `plans` varchar(50) NOT NULL,
  PRIMARY KEY (`ppid`)
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `planname`
--

INSERT INTO `planname` (`ppid`, `plans`) VALUES
(101, 'Fundation'),
(102, 'Advanced'),
(103, 'Professional'),
(104, 'Enterprise');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `sid` int NOT NULL AUTO_INCREMENT,
  `sname` varchar(20) NOT NULL,
  `sage` int NOT NULL,
  `ssex` varchar(20) NOT NULL,
  `did` int NOT NULL,
  `sdob` date NOT NULL,
  `simage` varchar(100) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `sname`, `sage`, `ssex`, `did`, `sdob`, `simage`) VALUES
(1, 'gopika', 13, 'm', 102, '2001-11-12', '13ca2b76604602168c96ec4e4f428b17_13514d657bed5ce3.jpg'),
(2, 'gopika', 13, 'm', 102, '2001-11-12', '8720ffd2626b1d8ecef376a208169676_b75fb9de3cc9.jpg'),
(3, 'gopika', 13, 'm', 102, '2001-11-12', '2eee58f777622644adb87f92522f4881_0d8ffd29ffb.jpg'),
(4, 'devika', 22, 'f', 103, '2001-07-22', 'ee50a95ac70e4413eb24242d84ba715c_101b0816c7d04b75e348.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
