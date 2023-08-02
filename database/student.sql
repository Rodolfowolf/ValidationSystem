-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 05, 2023 at 02:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `homepage` varchar(50) NOT NULL,
  `password` varchar(10) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fname`, `lname`, `email`, `homepage`, `password`, `description`) VALUES
(1, '', '', '', '', NULL, ''),
(2, '', '', '', '', NULL, ''),
(3, 'a;lsdkf', 'a;lskfd', 'aaa@aaa.com', '', NULL, ''),
(4, 'teste', 'teste', 'teste@teste', '', NULL, ''),
(5, 'Rodolfo', 'Silva', 'rodolfo@silva.com', '', NULL, ''),
(6, 'first_name', 'last_name', 'email@here.com', '', NULL, ''),
(7, 'a', 'a', 'a@a', '', NULL, ''),
(8, 'a', 'a', 'a@a', '', NULL, ''),
(9, 'a', 'a', 'a@a', '', NULL, ''),
(10, 'a', 'a', 'a@a', '', NULL, ''),
(11, 'a', 'a', 'a@a', '', NULL, ''),
(12, 'a', 'a', 'a@a', '', NULL, ''),
(13, 'a', 'a', 'a@a', '', NULL, ''),
(14, 'a', 'a', 'a@a', '', NULL, ''),
(15, 'a', 'a', 'a@a', '', NULL, ''),
(16, 'a', 'a', 'a@a', '', NULL, ''),
(17, 'a', 'a', 'a@a', '', NULL, ''),
(18, 'a', 'a', 'a@a', '', NULL, ''),
(19, 'a', 'a', 'a@a', '', NULL, ''),
(20, 'a', 'a', 'a@a', '', NULL, ''),
(21, 'a', 'a', 'a@a', '', NULL, ''),
(22, 'a', 'a', 'a@a', '', NULL, ''),
(23, 'a', 'a', 'a@a', '', NULL, ''),
(24, 'a', 'a', 'a@a', '', NULL, ''),
(25, 'a', 'a', 'a@a', '', NULL, ''),
(26, 'a', 'a', 'a@a', '', NULL, ''),
(27, 'a', 'a', 'a@a', '', NULL, ''),
(28, 'a', 'a', 'a@a', '', NULL, ''),
(29, 'a', 'a', 'a@a', '', NULL, ''),
(30, 'a', 'a', 'a@a', '', NULL, ''),
(31, '', '', '', '', NULL, ''),
(32, '111', '222', '3333@333', '', NULL, ''),
(33, 'asdf', 'asf', 'asdf@asdf', '', NULL, ''),
(34, 'asdf', 'asf', 'asdf@asdf', '', NULL, ''),
(35, 'asdf', 'asf', 'asdf@asdf', '', NULL, ''),
(36, 'asdf', 'asf', 'asdf@asdf', '', NULL, ''),
(37, 'asdf', 'asf', 'asdf@asdf', '', NULL, ''),
(38, 'asdf', 'asf', 'asdf@asdf', '', NULL, ''),
(39, 'asdf', 'asf', 'asdf@asdf', '', NULL, ''),
(40, 'asdf', 'asf', 'asdf@asdf', '', NULL, ''),
(41, 'asdf', 'asf', 'asdf@asdf', '', NULL, ''),
(42, 'asdf', 'asf', 'asdf@asdf', '', NULL, ''),
(43, 'Rodolfo', 'Silva', 'rodolfo@silva.com.br', '', NULL, ''),
(44, '', '', '', '', NULL, ''),
(45, 'a', 'a', 'a@teste.com', 'http://www.pcit.com.br', 'a', ''),
(46, 'Rodolfo', 'Silva', 'rodolfo@silva.com.br', 'http://www.rodolfo.silva.com.br', '12345678', ''),
(47, 'Rodolfo', 'Silva', 'rodolfo@silva.com.br', 'http://www.rodolfo.silva.com.br', '12345678', '							Mys description is ...'),
(48, 'First_name', 'Last_name', 'email@here.com', 'http://www.rcs.com', '12345', 'Description here.							'),
(49, 'Rodolfo', 'Silva', 'r@s.ca', 'http://www.teste.com.br', '12345', '                            My description is here.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
