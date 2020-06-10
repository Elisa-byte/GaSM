-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2020 at 03:04 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(10) NOT NULL,
  `fnameAdmin` tinytext NOT NULL,
  `lnameAdmin` tinytext NOT NULL,
  `emailAdmin` tinytext NOT NULL,
  `phnAdmin` int(10) NOT NULL,
  `uidAdmin` tinytext NOT NULL,
  `pwdAdmin` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `fnameAdmin`, `lnameAdmin`, `emailAdmin`, `phnAdmin`, `uidAdmin`, `pwdAdmin`) VALUES
(1, 'Elisabeta', 'Constantin', 'croftlis@gmail.com', 752001047, 'croftlis', '$2y$10$E.bUkXMMP/P8vDIhkaMmBOhP6PLmL0/Rtz2xx5r5.N5EBrsBHTxya'),
(2, 'Shanti', 'Zmuschi', 'szmuschi@gmail.com', 722558963, 'szmuschi', '$2y$10$yJBjahBLWpOcCfOM7Wm5NOvDsLD6tfMGxM3rDVY7S7pjeO.Bj.MeW'),
(3, 'Teodor', 'Caras', 'trrenty@gmail.com', 722036450, 'trrenty', '$2y$10$c9HO9T7ONO6cOAxfwAVnHOV4J9k0E0tEiYYhBzfetVhGGfYV0XdiG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
