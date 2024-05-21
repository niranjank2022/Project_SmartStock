-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 02:03 PM
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
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `item_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `no_of_items` int(11) NOT NULL,
  `curr_condition` varchar(25) NOT NULL DEFAULT '"WORKING"'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`item_id`, `location_id`, `no_of_items`, `curr_condition`) VALUES
(108, 105, 10, 'New'),
(109, 106, 20, 'New');

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
  `item_depreciation_rate` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_description`, `item_purchase_price`, `item_purchase_year`, `item_depreciation_rate`) VALUES
(7, 'Table', 'Four-legged', 1000, '2012', 17),
(8, 'AC', 'Onida 3 star', 125000, '2022', 21),
(9, 'Desktop', 'Intel systems', 200000, '2012', 21);

-- --------------------------------------------------------

--
-- Table structure for table `items_info`
--

CREATE TABLE `items_info` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(20) NOT NULL DEFAULT '"NOT ENTERED"',
  `description` varchar(50) NOT NULL DEFAULT '"EMPTY"',
  `depreciation_rate` decimal(10,0) NOT NULL DEFAULT 0,
  `purchase_year` year(4) NOT NULL DEFAULT current_timestamp(),
  `purchase_value` decimal(10,0) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items_info`
--

INSERT INTO `items_info` (`item_id`, `item_name`, `description`, `depreciation_rate`, `purchase_year`, `purchase_value`) VALUES
(108, 'Desktop', 'Intel systems', 10, '2024', 23),
(109, 'Fan', 'Ceiling Fan', 21, '2022', 2340);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`) VALUES
(104, 'GFL'),
(105, 'SFL'),
(106, 'FFL');

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
(5, 'Research Scholars La');

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
(2, 7, 13, 4),
(3, 7, 10, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD KEY `ITEM_ID_FK` (`item_id`),
  ADD KEY `LOCATION_ID_FK` (`location_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `items_info`
--
ALTER TABLE `items_info`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

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
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `items_info`
--
ALTER TABLE `items_info`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `availability`
--
ALTER TABLE `availability`
  ADD CONSTRAINT `ITEM_ID_FK` FOREIGN KEY (`item_id`) REFERENCES `items_info` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `LOCATION_ID_FK` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
