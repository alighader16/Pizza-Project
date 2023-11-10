-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2023 at 02:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT 0,
  `birthdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `username`, `name`, `password`, `email`, `phone`, `Address`, `image`, `role`, `birthdate`) VALUES
(58, 'ali ghader 16', 'ali ghader ', '$2y$10$l/aaOzehnFsY2WP1pTsgyuAF4WtrECLeqm2Vx0u4yff6WcsGm2fwu', 'alighader@gmail.com', '70967033', 'Beirut', 'uploads/أفضل-طريقة-في- تعليم-القراءة -والكتابة- (2).PNG', 0, '2000-01-01'),
(59, '20200379', '1234', '$2y$10$OAmwnPggQRbdfJwo8n6EpuEposwW55SOm1XPqeFKuEL0MfBceh/32', '70967033@gmail.com', '123', '111', 'uploads/fast food.jpg', 0, '1990-01-01'),
(60, 'issa natour', 'issa natour', '$2y$10$EiPeNy51PH/jaXLNxHyxQeRljpHqp5tHyXqVqPm9zrVEDuTNFZTVi', 'issa@gmail.com', '12345', 'bchamoun', 'uploads/2.jpg', 0, '2000-01-01'),
(64, 'aa', 'ali', '$2y$10$PCKjU.lvygBlxZdzO5kHGejMzMVqgXmfLt4lqUbRrV6QvIcVBBAMC', 'ali.ghader200@gmail.com', '2222', '1', 'uploads/61+GSKi8QSL._AC_UF1000,1000_QL80_.jpg', 0, '2003-01-01'),
(65, 'Shash18', 'Mo Shash', '$2y$10$zWikmMS/V4IdjYcvEgeCveK11dtIB5V2a8RtGj5zhTC63aUH9zMKK', 'shash18@gmail.com', '0', 'Bau16', 'uploads/shash.jpg', 0, '2000-01-01'),
(66, 'Walter16', 'Wael Arakji', '$2y$10$xgLs/jMQeYMP8zxjw4h.VO2llUiAF5y4Wh2lxPHM6OHbz8/IZNwUi', 'waela18r@gmail.com', '70967022222336', 'Beirut', 'uploads/user.png', 0, '2000-01-01'),
(67, 'Final user', 'ali ghader', '$2y$10$6yfgqA3OAcOR59EaH.UmouT337rclgtTp5m2HWSdYSjjFiajuQPh2', 'fu@gmail.com', '123', 'tt', 'uploads/user.png', 0, '2003-01-01'),
(73, 'Amir29', 'Amir', '$2y$10$4BucsmNv.MfLmL8HcolxN.6beYiNWWnUN7cYc4MvZTgDatz3KonJi', 'AmirSaoud20@gmail.com', '707010859', 'Aramoun', 'uploads/home-img-1.png', 0, '2000-01-01'),
(74, 'ali_ghader13', 'Ali', '1234', 'ali.ghader230@gmail.com', '7060283000000000', 'Bshamounnn', 'uploads/user.png', 0, '2003-01-01'),
(75, 'Dead', 'dadddddd', '$2y$10$n/B2aJm1iKEyksAnwtKPFudJXWYEHgny0zQuuhNRetwOJMysBO0..', 'Dad@gmail.com', '90', 'kk', 'uploads/user.png', 0, '2000-01-01'),
(76, 'Steph ', '123', '0000', 'Steph@gmail.com', '90', '123', 'uploads/user.png', 0, '2003-01-01'),
(77, 'Password', 'Pass', '2', 'Password@gmail.com', '11', '11', 'uploads/user.png', 0, '2003-01-01'),
(78, 'Admin', 'Admin', '1', 'admin@gmail.com', '90', '99', 'uploads/user.png', 0, '2002-01-01'),
(79, '2', '1', '$2y$10$W1twmdKuelHfuLGZv84cE.YOlrxS/tY5J78pSnxB5v/Zt3npcZMNa', '1@gmail.com', '2', '2', 'uploads/user.png', 0, '2002-01-01'),
(80, 'Tania', 'tanin@gmail.com', '$2y$10$P6SooOMB0Sz1YQRF6nKYM.PNB9GraD13HL1HltqAeF5o8Ppze6XlW', 'tania@gmail.com', '123', 'Beiru', 'uploads/home-img-3.png', 0, '2000-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`email`, `token`) VALUES
('ali.ghader200@gmail.com', '$2y$10$4YaGoa3KZda8jg.QoQgLSuvU4Q6.oQb8vpHrMG7GnDP5g5ksCNjcy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`email`) REFERENCES `customer` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
