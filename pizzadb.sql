-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2023 at 05:56 PM
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
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `IngredientID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `AddedPrice` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`IngredientID`, `Name`, `AddedPrice`) VALUES
(1, 'Tomato Sauce', 0),
(2, 'Mozzarella', 0),
(3, 'Salami', 1),
(4, 'Mushroom', 0),
(5, 'Soft Cheese', 2),
(6, 'Olive Oil', 0),
(7, 'Oregano', 0),
(8, 'Basil', 0),
(9, 'Sausage', 0),
(10, 'Sausage', 0),
(11, 'Pepperoni', 0),
(13, 'Red Onion', 0),
(14, 'Smoked Chicken', 0),
(15, 'Pineapple', 0),
(16, 'BBQ Sauce', 0),
(17, 'Potato', 0),
(18, 'Bread', 0),
(19, 'Garlic', 0),
(20, 'Macaroni', 0);

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
(1, 'Montanara', 'Diet Version of Montanara', 4.5, 0, 5, b'1', b'0', 1),
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
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`IngredientID`);

--
-- Indexes for table `menuitem`
--
ALTER TABLE `menuitem`
  ADD PRIMARY KEY (`MenuItemID`),
  ADD KEY `FK_CategoryID` (`CategoryID`);

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
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `IngredientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  ADD CONSTRAINT `FK_CategoryID` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`);

--
-- Constraints for table `menuitemimage`
--
ALTER TABLE `menuitemimage`
  ADD CONSTRAINT `menuitemimage_ibfk_1` FOREIGN KEY (`MenuItemID`) REFERENCES `menuitem` (`MenuItemID`);

--
-- Constraints for table `variant`
--
ALTER TABLE `variant`
  ADD CONSTRAINT `variant_ibfk_1` FOREIGN KEY (`MenuItemID`) REFERENCES `menuitem` (`MenuItemID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
