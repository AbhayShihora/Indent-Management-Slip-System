-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 03, 2025 at 11:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `project`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(6) NOT NULL,
  `uname` varchar(35) NOT NULL,
  `password` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uid`, `uname`, `password`) VALUES
(1, 'A001', 'Abhay Shihora', 'Abhay@1234');

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE IF NOT EXISTS `emp` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `empno` int(4) NOT NULL,
  `ename` varchar(20) NOT NULL,
  `mo` decimal(10,0) NOT NULL,
  `email` text NOT NULL,
  `deptno` int(2) NOT NULL,
  `psw` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`id`, `empno`, `ename`, `mo`, `email`, `deptno`, `psw`) VALUES
(1, 1234, 'Abhay Shihora', '9924636898', 'shihoraabhay@gmail.com', 10, 'Abhay@1234');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--
-- in use(#1932 - Table 'project.item' doesn't exist in engine)
-- Error reading data: (#1932 - Table 'project.item' doesn't exist in engine)

-- --------------------------------------------------------

--
-- Table structure for table `item1`
--

CREATE TABLE IF NOT EXISTS `item1` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `empno` int(4) NOT NULL,
  `ename` varchar(30) NOT NULL,
  `deptno` int(2) NOT NULL,
  `dname` varchar(20) NOT NULL,
  `mo` decimal(10,0) NOT NULL,
  `iname` varchar(30) NOT NULL,
  `quantity` int(3) NOT NULL,
  `uom` varchar(15) NOT NULL,
  `rate` int(5) NOT NULL,
  `rdate` date NOT NULL,
  `pursupplier` varchar(30) NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `item1`
--

INSERT INTO `item1` (`id`, `empno`, `ename`, `deptno`, `dname`, `mo`, `iname`, `quantity`, `uom`, `rate`, `rdate`, `pursupplier`, `purpose`, `status`) VALUES
(1, 1234, 'Abhay Shihora', 10, 'Accounting', '9924636898', 'Zero coke', 12, 'Unit', 123, '2025-03-12', 'Dishin', 'To Time pass  with...', 'Accept');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
