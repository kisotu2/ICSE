USE ics_e;

CREATE TABLE IF NOT EXISTS  `users` (
    `userId` bigint (10) NOT  NULL  AUTO_INCREMENT,
    `fullname` varchar (50) not null default '',
    `email` varchar (70) not null default '',
   `username` varchar (70) not null default '',
    `password` varchar (70) not null default '',
    `updated` datetime not null default  current_timestamp () on update current_timestamp (),
    `created`  datetime not null default  current_timestamp (),
    `genderId` tinyint  (1) not null default 0,
    `roleId`  tinyint  (1) not null default 0,
    UNIQUE KEY (`username`),
    UNIQUE KEY (`email`),
    PRIMARY KEY (`userId`)
);


CREATE TABLE IF NOT EXISTS  `gender` (
    `genderId` tinyint (10) NOT  NULL  AUTO_INCREMENT,
    `gender` varchar (50) not null default '',
    UNIQUE KEY (`genderId`),
    PRIMARY KEY (`genderId`)
);

CREATE TABLE IF NOT EXISTS  `role` (
    `roleId` tinyint (10) NOT  NULL  AUTO_INCREMENT,
    `role` varchar (50) not null default '',
    UNIQUE KEY (`roleId`),
    PRIMARY KEY (`roleId`)
);


-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2024 at 07:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ics_e`
--
DROP DATABASE IF EXISTS `ics_e`;
CREATE DATABASE IF NOT EXISTS `ics_e` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ics_e`;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
CREATE TABLE IF NOT EXISTS `gender` (
  `genderId` tinyint(1) NOT NULL AUTO_INCREMENT,
  `gender` varchar(20) NOT NULL DEFAULT '',
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`genderId`),
  UNIQUE KEY `gender` (`gender`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`genderId`, `gender`, `updated`, `created`) VALUES
(1, 'Female', '2024-09-19 13:57:50', '2024-09-19 13:57:50'),
(2, 'Male', '2024-09-19 13:57:50', '2024-09-19 13:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `roleId` tinyint(1) NOT NULL AUTO_INCREMENT,
  `role` varchar(15) NOT NULL DEFAULT '',
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`roleId`),
  UNIQUE KEY `role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `role`, `updated`, `created`) VALUES
(1, 'Admin', '2024-09-19 13:58:03', '2024-09-19 13:58:03'),
(2, 'Editor', '2024-09-19 13:58:03', '2024-09-19 13:58:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` bigint(10) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(60) NOT NULL DEFAULT '',
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `genderId` tinyint(1) NOT NULL DEFAULT 0,
  `roleId` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `genderId` (`genderId`),
  KEY `roleId` (`roleId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `fullname`, `email`, `username`, `password`, `updated`, `created`, `genderId`, `roleId`) VALUES
(3, 'alex', 'alex@yahoo.com', 'alexuser', '', '2024-09-19 13:58:58', '2024-09-19 13:58:58', 1, 1),
(4, 'Peter', 'peter@yahoo.com', 'peteruser', '', '2024-09-19 13:59:27', '2024-09-19 13:59:27', 1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`genderId`) REFERENCES `gender` (`genderId`) ON DELETE NO ACTION,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`roleId`) REFERENCES `roles` (`roleId`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;