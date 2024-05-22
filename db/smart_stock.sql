-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 22, 2024 at 08:51 AM
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
-- Database: `smart_stock`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `calculateTotalCount` (`itemID` INT) RETURNS INT(11)  BEGIN
    DECLARE total INT DEFAULT 0;
    
    SET total := calculateTotalWorkingCount(itemID) + calculateTotalDefectCount(itemID);

    -- Return the total count
    RETURN total;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `calculateTotalDefectCount` (`itemID` INT) RETURNS INT(11)  BEGIN
    DECLARE total INT DEFAULT 0;
    
    -- Calculate the total working count for the given itemID
    SELECT COALESCE(SUM(count_defect), 0) INTO total 
    FROM tracker 
    WHERE item_id = itemID;

    -- Return the total count
    RETURN total;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `calculateTotalWorkingCount` (`itemID` INT) RETURNS INT(11)  BEGIN
    DECLARE total INT DEFAULT 0;
    
    -- Calculate the total working count for the given itemID
    SELECT COALESCE(SUM(count_working), 0) INTO total 
    FROM tracker 
    WHERE item_id = itemID;

    -- Return the total count
    RETURN total;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `item_description` varchar(50) NOT NULL,
  `item_purchase_price` decimal(10,0) NOT NULL,
  `item_purchase_year` year(4) NOT NULL,
  `item_depreciation_rate` decimal(10,0) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_description`, `item_purchase_price`, `item_purchase_year`, `item_depreciation_rate`, `image`) VALUES
(10, 'Fan', 'three legged fan', 3450, '2024', 12, 'fan.jpg'),
(13, 'AC', '5 star Onida', 2000, '2024', 12, 'ac.jpg'),
(14, 'Board', 'green board', 1000, '2021', 5, 'gb.jpg'),
(15, 'Desk', '4-members', 40000, '2020', 10, 'dc.jpg'),
(16, 'Projector', 'Sony - Projector', 10000, '2024', 5, 'proj.png'),
(17, 'System ', 'ubuntu', 200000, '2020', 5, 'pc.jpg'),
(18, 'Ups', 'Microtek ups', 2000, '2020', 5, 'ups.jpg'),
(19, 'Printer', 'Acer', 10000, '2019', 12, 'p.jpg'),
(20, 'Tube Light', 'Philips', 50, '2010', 1, 'light.jpeg'),
(22, 'chair', 'Cushion Chair', 700, '2024', 2, 'chair1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `location_name`) VALUES
(1, 'GFL'),
(2, 'SFL'),
(3, 'TFL'),
(4, 'GPU Lab'),
(5, 'ResearchSchol.Lab1'),
(6, 'ups room'),
(7, 'turing hall'),
(8, 'CPU Lab1'),
(9, 'HOD Room'),
(10, 'Department Lib'),
(11, 'Staff Cabin 1'),
(12, 'Staff Cabin 2'),
(13, 'FFL'),
(14, 'CPU Lab2'),
(15, 'Staff Room'),
(16, 'ClassRoom'),
(17, 'ResearchSchol.Lab2'),
(18, 'ResearchSchol.Lab3'),
(19, 'Staff Cabin 3');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_no` int(11) DEFAULT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`user_id`, `user_name`, `email`, `phone_no`, `password`) VALUES
(101, 'Niranjan', 'niranjank.desktop@gmail.com', 0, 'smartstock');

-- --------------------------------------------------------

--
-- Table structure for table `tracker`
--

CREATE TABLE `tracker` (
  `location_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `count_working` int(11) NOT NULL,
  `count_defect` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tracker`
--

INSERT INTO `tracker` (`location_id`, `item_id`, `count_working`, `count_defect`) VALUES
(5, 10, 15, 15),
(1, 14, 1, 0),
(3, 13, 6, 0),
(3, 10, 2, 0),
(3, 14, 2, 0),
(16, 15, 20, 0),
(16, 10, 4, 1),
(1, 17, 30, 5),
(13, 17, 40, 5),
(2, 17, 46, 6),
(3, 17, 39, 4),
(1, 16, 2, 0),
(10, 10, 7, 1),
(10, 13, 4, 0),
(15, 13, 1, 0),
(1, 13, 4, 0),
(7, 13, 4, 1),
(7, 16, 1, 0),
(6, 17, 10, 2),
(6, 18, 10, 1),
(16, 16, 1, 0),
(15, 17, 1, 0),
(15, 19, 1, 0),
(15, 20, 1, 0),
(1, 20, 10, 2),
(13, 20, 10, 1),
(2, 20, 13, 2),
(3, 20, 16, 0),
(1, 22, 50, 2),
(13, 22, 30, 0),
(2, 22, 40, 1),
(3, 22, 45, 1),
(5, 17, 20, 1),
(5, 13, 3, 0),
(9, 19, 2, 1),
(9, 17, 1, 0),
(9, 13, 2, 0),
(9, 22, 2, 0),
(9, 20, 2, 1),
(8, 17, 20, 2),
(8, 13, 2, 0),
(14, 17, 23, 0),
(14, 13, 4, 1),
(8, 22, 22, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tracker`
--
ALTER TABLE `tracker`
  ADD KEY `tracker_items_FK` (`item_id`),
  ADD KEY `tracker_locations_FK` (`location_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tracker`
--
ALTER TABLE `tracker`
  ADD CONSTRAINT `tracker_items_FK` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tracker_locations_FK` FOREIGN KEY (`location_id`) REFERENCES `locations` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
