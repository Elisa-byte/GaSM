-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 10:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gasm`
--

-- --------------------------------------------------------

--
-- Table structure for table `campanii`
--

CREATE TABLE `campanii` (
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `type` enum('1','2','3') NOT NULL,
  `category` enum('1','2','3') NOT NULL,
  `duration` varchar(7) DEFAULT NULL,
  `begining` varchar(7) DEFAULT NULL,
  `hour` enum('1','2') DEFAULT NULL,
  `location` enum('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42') DEFAULT NULL,
  `location_address` varchar(100) DEFAULT NULL,
  `phone` bigint(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `event_date` date NOT NULL,
  `imageId` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campanii`
--

INSERT INTO `campanii` (`name`, `description`, `type`, `category`, `duration`, `begining`, `hour`, `location`, `location_address`, `phone`, `email`, `date`, `event_date`, `imageId`) VALUES
(' 12', 'dadadddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', '2', '1', '', '', '', '', '', 1211211211, 'szmuschi@gmail.com', '2020-06-08 10:49:34', '0000-00-00', 1),
('1', 'a', '2', '2', '12h05', '12h14', '', '5', 'dadada', 1211211211, 'szmuschi@gmail.com', '0000-00-00 00:00:00', '0000-00-00', NULL),
('11', 'a', '2', '2', '12h05', '12h14', '', '5', 'dadada', 1211211211, 'szmuschi@gmail.com', '2020-06-07 11:35:10', '0000-00-00', NULL),
('a', 'a', '2', '1', 'a', '12h14', '', '5', 'dadada', 1211211211, 'szmuschi@gmail.com', '0000-00-00 00:00:00', '0000-00-00', NULL),
('aa', 'a', '2', '1', '12h50', '', '', '', '', 1211211211, 'szmuschi@gmail.com', '2020-06-07 22:11:32', '2000-08-15', NULL),
('ab', 'a', '2', '1', '22h34', '12h14', '', '5', 'dadada', 1211211211, 'szmuschi@gmail.com', '0000-00-00 00:00:00', '0000-00-00', NULL),
('C', 'a', '1', '2', '', '', '', '', '', 1211211211, 'szmuschi@gmail.com', '2020-06-08 10:33:33', '0000-00-00', 1),
('s', 'dadadddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', '2', '1', '', '', '', '', '', 1211211211, 'szmuschi@gmail.com', '0000-00-00 00:00:00', '0000-00-00', NULL),
('saa', 'a', '2', '1', '', '', '', '', '', 1211211211, 'szmuschi@gmail.com', '2020-06-08 10:27:26', '0000-00-00', 1),
('shanti', 'dadadddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', '2', '1', '', '', '', '', '', 1211211211, 'szmuschi@gmail.com', '0000-00-00 00:00:00', '0000-00-00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campanii`
--
ALTER TABLE `campanii`
  ADD PRIMARY KEY (`name`),
  ADD KEY `imageId` (`imageId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `campanii`
--
ALTER TABLE `campanii`
  ADD CONSTRAINT `campanii_ibfk_1` FOREIGN KEY (`imageId`) REFERENCES `campanii_images` (`imageId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
