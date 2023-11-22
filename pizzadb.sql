-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 06:11 PM
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
-- Database: `pizzadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `IsActive` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `Name`, `IsActive`) VALUES
(1, 'Pizza', b'1'),
(2, 'Sides', b'1'),
(3, 'Dishes', b'1'),
(4, 'Beverages', b'1'),
(5, 'Desserts', b'1');

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
(79, '2', '1', '$2y$10$W1twmdKuelHfuLGZv84cE.YOlrxS/tY5J78pSnxB5v/Zt3npcZMNa', '1@gmail.com', '2', '2', 'uploads/user.png', 0, '2002-01-01'),
(80, 'Tania', 'tanin@gmail.com', '$2y$10$P6SooOMB0Sz1YQRF6nKYM.PNB9GraD13HL1HltqAeF5o8Ppze6XlW', 'tania@gmail.com', '123', 'Beirut', 'uploads/WIN_20231010_17_54_26_Pro.jpg', 0, '2000-01-01'),
(81, 'Sammy16', 'Sammy', '$2y$10$UKIopoZBYq9.vPxmVSnl6.wvevXnhJ5RFnPJ7MKJQBk4EXc5PU6qe', 'Sammy@gmail.com', '70602841', 'Mechref', 'uploads/WIN_20231010_17_54_26_Pro.jpg', 0, '2003-01-01'),
(82, 'New Users', 'User', '$2y$10$QoiSHpQ7KO/hEcXwmQLEdO9r9bCGR6n5Omgj.jSKYJsXCY5VJEmtm', 'NewUser@gmail.com', '70967033', 'Beirut', 'uploads/user.png', 0, '2003-01-01'),
(84, 'admin', 'Admin', '$2y$10$Bd.L9UJ9I9w9QC3hzrdc7upfIZ44kzOTq.iOYmlwuwUobdfhY9RQG', 'admin@gmail.com', '70967078', 'Beirut', 'uploads/restaurantBackground.png', 1, '2003-01-01'),
(85, 'smedawar', 'Rafik Hariri University', '$2y$10$Ys1nJuMBHWmOhTsK2IWMZOgdP8Yg0MC18jOiUKOHTXznCIZ91GcdG', 'sammymedawar2002@gmail.com', '76359228', 'Eli saab Building', 'uploads/garlic_bread.png', 0, '2002-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `IngredientID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`IngredientID`, `Name`) VALUES
(8, 'Basil'),
(16, 'BBQ Sauce'),
(18, 'Bread'),
(19, 'Garlic'),
(20, 'Macaroni'),
(2, 'Mozzarella'),
(4, 'Mushroom'),
(6, 'Olive Oil'),
(7, 'Oregano'),
(11, 'Pepperoni'),
(15, 'Pineapple'),
(17, 'Potato'),
(13, 'Red Onion'),
(3, 'Salami'),
(10, 'Sausage'),
(14, 'Smoked Chicken'),
(5, 'Soft Cheese'),
(9, 'Suspicious Sausage'),
(1, 'Tomato Sauce');

-- --------------------------------------------------------

--
-- Table structure for table `menuitem`
--

CREATE TABLE `menuitem` (
  `MenuItemID` int(11) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Rating` double DEFAULT NULL,
  `Discount` double DEFAULT NULL,
  `DefaultPrice` double DEFAULT NULL,
  `IsActive` bit(1) DEFAULT NULL,
  `IsFeatured` bit(1) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menuitem`
--

INSERT INTO `menuitem` (`MenuItemID`, `Title`, `Description`, `Rating`, `Discount`, `DefaultPrice`, `IsActive`, `IsFeatured`, `CategoryID`) VALUES
(1, 'Montanara', 'Diet Version of Montanara', 3.2, 0, 5, b'1', b'0', 1),
(2, 'Margarita', 'Standard Margarita', 5, 0, 2.5, b'1', b'1', 1),
(4, 'Pepperoni', 'Standard Pepperoni', 5, 0, 4, b'1', b'1', 1),
(5, 'Neapolitana', 'Neapolitana bla bla bla bla bla bla bla', 4, 0, 6, b'1', b'1', 1),
(6, 'Con Carne', 'I genuinely dont know what this is', 4, 0, 5, b'1', b'0', 1),
(7, 'Vegeterian Delight', 'The perfect pizza for vegeterians', 0, 0, 5, b'1', b'0', 1),
(8, 'Hawaiian Paradise', 'The perfect pizza for Hawaiians', 0, 0, 100, b'1', b'0', 1),
(9, 'BBQ Pizza', 'The perfect pizza for BBQ lovers', 0, 0, 100, b'1', b'0', 1),
(10, 'Fries', 'Perfectly crispy fries fit for a royalty', 0, 0, 2.5, b'1', b'0', 3),
(11, 'Garlic Bread', 'Garlic bread for if you want bad breath', 0, 0, 2.5, b'1', b'0', 3),
(12, 'Lasagna', 'Garfield would love this', 0, 0, 10, b'1', b'0', 3);

-- --------------------------------------------------------

--
-- Table structure for table `menuitemimage`
--

CREATE TABLE `menuitemimage` (
  `MenuItemImageID` int(11) NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `MenuItemID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menuitemimage`
--

INSERT INTO `menuitemimage` (`MenuItemImageID`, `Image`, `MenuItemID`) VALUES
(1, 'img/menuitem-images/montanara.png', 1),
(2, 'img/menuitem-images/margarita.png', 2),
(4, 'img/menuitem-images/pepperoni.png', 4),
(5, 'img/menuitem-images/neapolitana.png', 5),
(6, 'img/menuitem-images/concarne.png', 6),
(7, 'img/menuitem-images/vegeterian.png', 7),
(8, 'img/menuitem-images/hawaiian.png', 8),
(9, 'img/menuitem-images/bbq.png', 9),
(10, 'img/menuitem-images/fries.png', 10),
(11, 'img/menuitem-images/garlic_bread.png', 11),
(12, 'img/menuitem-images/garfield.png', 12);

-- --------------------------------------------------------

--
-- Table structure for table `menuitem_ingredient_has`
--

CREATE TABLE `menuitem_ingredient_has` (
  `MenuItemId` int(11) NOT NULL,
  `IngredientID` int(11) NOT NULL,
  `Quantity` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menuitem_ingredient_has`
--

INSERT INTO `menuitem_ingredient_has` (`MenuItemId`, `IngredientID`, `Quantity`) VALUES
(0, 17, 1),
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(1, 5, 1),
(1, 6, 1),
(1, 7, 1),
(2, 1, 1),
(2, 2, 1),
(2, 6, 1),
(2, 7, 1),
(2, 8, 1),
(4, 1, 1),
(4, 2, 1),
(4, 6, 1),
(4, 7, 1),
(4, 10, 1),
(4, 11, 1),
(5, 1, 1),
(5, 4, 1),
(5, 5, 1),
(5, 6, 1),
(5, 7, 1),
(5, 12, 1),
(6, 1, 1),
(6, 2, 1),
(6, 6, 1),
(6, 11, 1),
(6, 12, 1),
(6, 13, 1),
(6, 14, 1),
(7, 1, 1),
(7, 2, 1),
(7, 4, 1),
(7, 6, 1),
(7, 8, 1),
(7, 13, 1),
(8, 1, 1),
(8, 2, 1),
(8, 11, 1),
(8, 15, 1),
(9, 1, 1),
(9, 2, 1),
(9, 13, 1),
(9, 14, 1),
(9, 16, 1),
(10, 17, 1),
(11, 18, 1),
(11, 19, 1),
(12, 1, 1),
(12, 2, 1),
(12, 14, 1),
(12, 19, 1),
(12, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `ReviewDate` date DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `MenuItemID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ID`, `Title`, `Rating`, `Description`, `ReviewDate`, `CustomerID`, `MenuItemID`) VALUES
(1, 'lorem', 5, 'lorem ipsum blablabla', '2023-12-12', 58, 1),
(2, 'lorem', 4, 'lorem ipsum blablabla', '2023-12-12', 59, 1),
(3, 'lorem', 3, 'lorem ipsum blablabla', '2023-12-12', 60, 1),
(4, 'lorem', 2, 'lorem ipsum blablabla', '2023-12-12', 64, 1),
(5, 'lorem', 1, 'lorem ipsum blablabla', '2023-12-12', 65, 1),
(6, 'lorem', 5, 'lorem ipsum blablabla', '2023-12-12', 66, 1),
(7, 'lorem', 5, 'lorem ipsum blablabla', '2023-12-12', 67, 1),
(8, 'lorem', 4, 'lorem ipsum blablabla', '2023-12-12', 73, 1),
(9, 'lorem', 1, 'lorem ipsum blablabla', '2023-12-12', 74, 1),
(10, 'lorem', 4, 'lorem ipsum blablabla', '2023-12-12', 75, 1),
(11, 'lorem', 4, 'lorem ipsum blablabla', '2023-12-12', 76, 1),
(12, 'lorem', 2, 'lorem ipsum blablabla', '2023-12-12', 77, 1),
(13, 'lorem', 1, 'lorem ipsum blablabla', '2023-12-12', 79, 1),
(14, 'lorem', 4, 'lorem ipsum blablabla', '2023-12-12', 80, 1),
(15, 'lorem', 4, 'lorem ipsum blablabla', '2023-12-12', 85, 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `variant`
--

CREATE TABLE `variant` (
  `VariantID` int(11) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `MenuItemID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `variant`
--

INSERT INTO `variant` (`VariantID`, `Title`, `Price`, `MenuItemID`) VALUES
(1, 'Small', 2.5, 2),
(2, 'Medium', 5, 2),
(3, 'Large', 8, 2),
(4, 'Small', 4, 4),
(5, 'Medium', 8, 4),
(6, 'Large', 11, 4),
(10, 'Small', 5, 6),
(11, 'Medium', 10, 6),
(12, 'Large', 13, 6),
(13, 'Small', 5, 7),
(14, 'Medium', 7, 7),
(15, 'Large', 10, 7),
(16, 'Small', 100, 8),
(17, 'Medium', 1000, 8),
(18, 'Large', 10000, 8),
(19, 'Small', 12, 9),
(20, 'Medium', 15, 9),
(21, 'Large', 17, 9),
(22, 'Small', 2.5, 10),
(23, 'Medium', 3.5, 10),
(24, 'Large', 5, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`),
  ADD UNIQUE KEY `unique_category_name` (`Name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`IngredientID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `menuitem`
--
ALTER TABLE `menuitem`
  ADD PRIMARY KEY (`MenuItemID`),
  ADD KEY `fk_category_id` (`CategoryID`);

--
-- Indexes for table `menuitemimage`
--
ALTER TABLE `menuitemimage`
  ADD PRIMARY KEY (`MenuItemImageID`),
  ADD KEY `MenuItemID` (`MenuItemID`);

--
-- Indexes for table `menuitem_ingredient_has`
--
ALTER TABLE `menuitem_ingredient_has`
  ADD PRIMARY KEY (`MenuItemId`,`IngredientID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `MenuItemID` (`MenuItemID`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `variant`
--
ALTER TABLE `variant`
  ADD PRIMARY KEY (`VariantID`),
  ADD KEY `MenuItemID` (`MenuItemID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `IngredientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `menuitem`
--
ALTER TABLE `menuitem`
  MODIFY `MenuItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `menuitemimage`
--
ALTER TABLE `menuitemimage`
  MODIFY `MenuItemImageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `variant`
--
ALTER TABLE `variant`
  MODIFY `VariantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menuitem`
--
ALTER TABLE `menuitem`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`);

--
-- Constraints for table `menuitemimage`
--
ALTER TABLE `menuitemimage`
  ADD CONSTRAINT `menuitemimage_ibfk_1` FOREIGN KEY (`MenuItemID`) REFERENCES `menuitem` (`MenuItemID`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`ID`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`MenuItemID`) REFERENCES `menuitem` (`MenuItemID`);

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`email`) REFERENCES `customer` (`email`);

--
-- Constraints for table `variant`
--
ALTER TABLE `variant`
  ADD CONSTRAINT `variant_ibfk_1` FOREIGN KEY (`MenuItemID`) REFERENCES `menuitem` (`MenuItemID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
