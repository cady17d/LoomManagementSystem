-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 20, 2018 at 01:48 PM
-- Server version: 5.5.60-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Loom`
--

-- --------------------------------------------------------

--
-- Table structure for table `loomtable`
--

CREATE TABLE `loomtable` (
  `loomno` varchar(20) NOT NULL,
  `A` varchar(100) DEFAULT NULL,
  `B` varchar(100) DEFAULT NULL,
  `C` varchar(100) DEFAULT NULL,
  `production` varchar(100) DEFAULT NULL,
  `day` varchar(100) DEFAULT NULL,
  `night` varchar(100) DEFAULT NULL,
  `lastread` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loomtable`
--

INSERT INTO `loomtable` (`loomno`, `A`, `B`, `C`, `production`, `day`, `night`, `lastread`) VALUES
('1', '1997923', '4679', '1125', '2003727', '10500', '1989900', '2000500'),
('2', '', '10355', '5993', '16348', '0', '9998', '9999'),
('3', '', '', '22', '28', '0', '0', NULL),
('4', '40', '49', '12608', '12697', '527', '12170', '200'),
('5', '13377', '266', '1090', '14733', '12877', '500', '13000'),
('6', '2000', '321', '8001', '10322', '2000', '0', NULL),
('7', '', '527', '', '527', '0', '0', NULL),
('8', '5411', '', '', '5411', '0', '0', NULL),
('9', '100', '', '', '100', '0', '100', '200'),
('10', '800', '', '', '800', '0', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `name` varchar(20) NOT NULL,
  `age` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `paddress` varchar(20) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `empid` varchar(20) NOT NULL,
  `production` varchar(100) NOT NULL DEFAULT '0',
  `admin` tinyint(1) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`name`, `age`, `gender`, `dob`, `address`, `paddress`, `contact`, `email`, `empid`, `production`, `admin`, `password`) VALUES
('Ankit', '20', 'male', '17/12/1998', 'Piska More', 'Piska More', '9852388862', 'ankit532n@gmail.com', '1', '1875923', 1, '$2y$10$e9hW4GGkqgLSw8eMBvKED.EagF7MBEc6CLfz4JyTOZ8p8/OHjBZIq'),
('Aman', '21', 'male', '13/2/1997', 'Piska More', 'Piska More', '8296538852', 'amana345@gmail.com', '2', '123456', NULL, NULL),
('Avinash', '21', 'male', '1/2/1997', 'Piska More', 'Piska More', '9988776655', 'avinash@gmail.com', '3', '12317', 1, '$2y$10$UnX.lHUm1fa4JMa5O4o1xOswOzt1jHdjG9yjIOuqQRbjq.gm6CgyS');

-- --------------------------------------------------------

--
-- Table structure for table `tmp`
--

CREATE TABLE `tmp` (
  `empid` varchar(20) NOT NULL,
  `empname` varchar(20) NOT NULL,
  `loomno` varchar(20) NOT NULL,
  `sread` varchar(20) NOT NULL,
  `eread` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `shift` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp`
--

INSERT INTO `tmp` (`empid`, `empname`, `loomno`, `sread`, `eread`, `type`, `date`, `shift`) VALUES
('12', 'Avinash', '3', '200', '', 'B', '27/6/2018', 'night'),
('1234', 'Ankit', '111', '11', '', 'A', '04-07-2018', 'night'),
('3', 'Avinash', '5', '13000', '', 'A', '06-07-2018', 'day'),
('', '', '', '', '', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
